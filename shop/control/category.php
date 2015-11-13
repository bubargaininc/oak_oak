<?php
/**
 * 前台分类
 *
 * 
 *
 *
 * @copyright  Copyright (c) 2007-2013 ShopNC Inc. (http://www.shopnc.net)
 * @license    http://www.shopnc.net
 * @link       http://www.shopnc.net
 * @since      File available since Release v1.1
 */
defined('InShopNC') or exit('Access Invalid!');

class categoryControl extends BaseHomeControl {


//每页显示商品数
    const PAGESIZE = 16;

    //模型对象
    private $_model_search;

	/**
	 * 分类列表
	 */
	public function indexOp(){
		Language::read('home_category_index');
		$lang	= Language::getLangContent();
		//导航
		$nav_link = array(
			'0'=>array('title'=>$lang['homepage'],'link'=>SHOP_SITE_URL.'/index.php'),
			'1'=>array('title'=>$lang['category_index_goods_class'])
		); 
		Tpl::output('nav_link_list',$nav_link);
		Tpl::output('html_title',C('site_name').' - '.Language::get('category_index_goods_class'));
		Tpl::showpage('category');
	}



//产品目录
    public function typeOp(){
            $this->_model_search = Model('search');
        //优先从全文索引库里查找
        list($indexer_ids,$indexer_count) = $this->_indexer_search();
        $data_attr = $this->_get_attr_list();
         
        //处理排序
        $order = 'goods_id desc';
        if (in_array($_GET['key'],array('1','2','3'))) {
            $sequence = $_GET['order'] == '1' ? 'asc' : 'desc';
            $order = str_replace(array('1','2','3'), array('goods_salenum','goods_click','goods_price'), $_GET['key']);
            $order .= ' '.$sequence;
        }
        $model_goods = Model('goods');
        if (!isset($data_attr['sign']) || $data_attr['sign'] === true) {
            // 字段
            $fields = "goods_id,goods_commonid,goods_name,goods_jingle,gc_id,store_id,store_name,goods_price,goods_marketprice,goods_storage,goods_image,goods_freight,goods_salenum,color_id,evaluation_good_star,evaluation_count,goods_count,goods_collect";

            $condition = array();
            if (is_array($indexer_ids)) {
                //商品主键搜索
                $condition['goods_id'] = array('in',$indexer_ids);
                $goods_list = $model_goods->getGoodsOnlineList($condition, $fields, 0, $order, self::PAGESIZE, null, false);
                pagecmd('setEachNum',self::PAGESIZE);
                pagecmd('setTotalNum',$indexer_count);
            } else {

                //执行正常搜索
                if (isset($data_attr['gcid_array'])) {
                    $condition['gc_id'] = array('in', $data_attr['gcid_array']);
                }

                if (intval($_GET['count']) > 0) {
                    $condition['goods_count'] = intval($_GET['count']);
                }


                if (intval($_GET['b_id']) > 0) {
                    $condition['brand_id'] = intval($_GET['b_id']);
                }
                if ($_GET['keyword'] != '') {
                    $condition['goods_name|goods_jingle'] = array('like', '%' . $_GET['keyword'] . '%');
                }
                if (intval($_GET['area_id']) > 0) {
                    $condition['areaid_1'] = intval($_GET['area_id']);
                }
                if (in_array($_GET['type'], array(1,2))) {
                    if ($_GET['type'] == 1) {
                        $condition['store_id'] = DEFAULT_PLATFORM_STORE_ID;
                    } else if ($_GET['type'] == 2) {
                        $condition['store_id'] = array('neq', DEFAULT_PLATFORM_STORE_ID);
                    }
                }

                if (isset($data_attr['goodsid_array'])){
                    $condition['goods_id'] = array('in', $data_attr['goodsid_array']);
                }
                $goods_list = $model_goods->getGoodsListByColorDistinct($condition, $fields, $order, 42);
            }

            // 商品多图
            if (!empty($goods_list)) {
                $goodsid_array = array();       // 商品id数组
                $commonid_array = array(); // 商品公共id数组
                $storeid_array = array();       // 店铺id数组
                foreach ($goods_list as $value) {
                    $goodsid_array[] = $value['goods_id'];
                    $commonid_array[] = $value['goods_commonid'];
                    $storeid_array[] = $value['store_id'];
                }
                $goodsid_array = array_unique($goodsid_array);
                $commonid_array = array_unique($commonid_array);
                $storeid_array = array_unique($storeid_array);

                // 商品多图
                $goodsimage_more = Model('goods')->getGoodsImageList(array('goods_commonid' => array('in', $commonid_array)));

 
                if (C('promotion_allow')) {
                    // 限时折扣
                    $xianshi_list = Model('p_xianshi_goods')->getXianshiGoodsListByGoodsString(implode(',', $goodsid_array));
                }

                foreach ($goods_list as $key => $value) {
                    // 商品多图
                    foreach ($goodsimage_more as $v) {
                        if ($value['goods_commonid'] == $v['goods_commonid'] && $value['store_id'] == $v['store_id'] && $value['color_id'] == $v['color_id']) {
                            $goods_list[$key]['image'][] = $v;
                        }
                    }

                    //国家
                     $goods_list[$key]['goods_count']=Model('count')->getCount($value['goods_count']);

                    // 店铺的开店会员编号
                    $store_id = $value['store_id'];
                    $goods_list[$key]['member_id'] = $store_list[$store_id]['member_id'];
                    $goods_list[$key]['store_domain'] = $store_list[$store_id]['store_domain'];
                    if (isset($xianshi_list[$value['goods_id']]) && !$goods_list[$key]['group_flag']) {
                        $goods_list[$key]['goods_price'] = $xianshi_list[$value['goods_id']]['xianshi_price'];
                        $goods_list[$key]['xianshi_flag'] = true;
                    }
                }
            }
            Tpl::output('goods_list', $goods_list);
        }
        Tpl::output('class_name',  @$data_attr['gc_name']);


        if ($_GET['keyword'] == ''){
            //不显示无商品的搜索项
            if (C('fullindexer.open')) {
                $data_attr['brand_array'] = $this->_model_search->delInvalidBrand($data_attr['brand_array']);
                $data_attr['attr_array'] = $this->_model_search->delInvalidAttr($data_attr['attr_array']);   
            }
        }
        if (intval($_GET['count']) > 0) {
        //获取国家值
        $dbs=Model('count')->getCountInfo(array('count_id'=>$_GET['count']),'count_name');
        $count_name=$dbs['count_name'];
        }else{
        $count_name='国家';
        }
         Tpl::output('count_name',$count_name);

//获取国家
        $count= Model()->table('count')->where()->order('count_id asc')->select();
        Tpl::output('count',$count);


        //抛出搜索属性
        Tpl::output('brand_array',$data_attr['brand_array']);
        Tpl::output('attr_array',$data_attr['attr_array']);
//         Tpl::output('cate_array',$data_attr['cate_array']);
        Tpl::output('checked_brand', $data_attr['checked_brand']);
        Tpl::output('checked_attr', $data_attr['checked_attr']);

        $model_goods_class = Model('goods_class');



        loadfunc('search');
    

//商品类型
        $goods_class= Model('goods_class');
        $goods_type=$model_goods_class->table('goods_class')->where(array('gc_parent_id' =>'959'))->order('gc_sort asc')->select();
        Tpl::output('goods_type',$goods_type);

//当前商品类型
        $cate_id=$_GET['cate_id'];

        if($cate_id!=='0'){
            $scate_id=$model_goods_class->where(array('gc_id'=>$cate_id))->find();
            $scate_data=$scate_id['gc_name'];
        }else{
            $scate_data='产品';
        }  

        Tpl::output('scate_data',$scate_data);

            //品牌
        $sband=Model('band');
        $brand = $sband->table('brand')->where(array('brand_apply'=>'1','class_id'=>'959'))->limit(12)->order('brand_sort asc')->select();
        TpL::output('brand',$brand);

        Tpl::output('index_sign','index');
        Tpl::showpage('category_type');
    }



   public function shangOp(){

        $this->_model_search = Model('search');
        //优先从全文索引库里查找
        list($indexer_ids,$indexer_count) = $this->_indexer_search();
        $data_attr = $this->_get_attr_list();

        //处理排序
        $order = 'sheji_order desc';
        if (in_array($_GET['key'],array('1','2','3'))) {
            $sequence = $_GET['order'] == '1' ? 'asc' : 'desc';
            $order = str_replace(array('1','2','3'), array('goods_salenum','goods_click','goods_price'), $_GET['key']);
            $order .= ' '.$sequence;
        }

        $model_goods = Model('goods_sheji');
        if (!isset($data_attr['sign']) || $data_attr['sign'] === true) {
            // 字段

            $condition = array();
            if (is_array($indexer_ids)) {
                //商品主键搜索
                $condition['sheji_id'] = array('in',$indexer_ids);
                $goods_list = $model_goods->getMemberList($condition, '*', 16, $order);
                pagecmd('setEachNum',self::PAGESIZE);
                pagecmd('setTotalNum',$indexer_count);
            } else {
                $goods_list =  $model_goods->getMemberList($condition, '*', 16, $order);
            }

            Tpl::output('show_page', $model_goods->showpage(6));

            Tpl::output('goods_list', $goods_list);
        }



        Tpl::output('class_name',  @$data_attr['gc_name']);
//获取国家
        $count= Model()->table('count')->order('count_id asc')->select();


        Tpl::output('count',$count);

        loadfunc('search');

    if(empty($_GET['she'])){
        $she='1';
         $string='品牌&农场';
    }else{
        $she=$_GET['she'];
           $string='设计师';
    }




    Tpl::output('she',$she);
    Tpl::output('string',$string);

   	Tpl::output('index_sign','shang');
   	Tpl::showpage('shang');
   }

//愿望单
public function yuanOp(){
    
   $yuan_model= Model("yuan");
   $condition=array('member_id' => $_SESSION['member_id']);
   $yuan_goods=$yuan_model->getFavoritesList($condition,'goods_id');
   //获取个人愿望单
   foreach ($yuan_goods as $value) {
       $str.=$value['goods_id'].',';
   }
  $newstr = substr($str,0,strlen($str)-1); 
  $goods_model=Model('goods'); 
  $goods_list=$goods_model->getGoodsOnlineList(array('goods_id'=>array('in',$newstr)));
  Tpl::output('goods_list',$goods_list);
  Tpl::showpage('yuan');
}   

//宝宝秀
public function baobaoOp(){

        $model_goods = Model('goods');
     //优先得到推荐商品
        $goods_commend_list = $model_goods->getGoodsOnlineList(array('goods_commend' => 1), 'goods_id,goods_name,goods_jingle,goods_image,store_id,goods_price', 0, 'rand()', 20, 'goods_commonid');
        Tpl::output('goods_commend',$goods_commend_list);



    if(empty($_GET['status'])){ 
         $status='0';       
    }else{
        $status=$_GET['status'];
    }    
      Tpl::output('status',$status);
    switch ($status) {
              //正在进行
        case '1':
            Tpl::showpage('baobao_1');
            break;
        //已经结束
        case '2':
            Tpl::showpage('baobao_2');
            break;
        //奖牌榜   
        case '3':
            Tpl::showpage('baobao_3');    
            break;
        //参加规则    
        case '4':
            Tpl::showpage('baobao_3');    
            break;
        //默认    
        default:
            Tpl::showpage('baobao');
            break;
    }   
}


public function baobaoAddOp(){
    
   Tpl::showpage('baobao_add', 'null_layout');
}

public function postbaoOp(){
 $model= Model('baobao');
 $data = array();
 $data['bao_title'] = intval($_POST['bao_title']);
 $data['bao_time'] = time();
 $data['bao_uid'] = $_SESSION['uid'];
 $sdata=$model->addMember($data);
 if($sdata){
    echo "true";
 }else{
    echo "false";
 }
}


//设计师单独页面
public function shejiOp(){
  
    $this->_model_search = Model('search');
        //优先从全文索引库里查找
    list($indexer_ids,$indexer_count) = $this->_indexer_search();
    $data_attr = $this->_get_attr_list();
    $model_goods = Model('goods_sheji');
    $condition = array();
   if ($_GET['sheji_id'] != '') {
       $condition['sheji_id'] = intval($_GET['sheji_id']);
       $sheji_class = $model_goods->getMemberInfo($condition, '*');
    }

    $goods=Model('goods');
    $order = 'goods_id desc';
    // 字段
  $fields = "goods_id,goods_commonid,goods_collect,goods_name,goods_jingle,gc_id,store_id,store_name,goods_price,goods_marketprice,goods_storage,goods_image,goods_freight,goods_salenum,color_id,evaluation_good_star,evaluation_count";

   $goods_condition['goods_sheji']=intval($_GET['sheji_id']);
   $goods_list = $goods->getGoodsListByColorDistinct($goods_condition, $fields, $order,'5');      


    Tpl::output('show_page', $goods->showpage(6));
    Tpl::output('goods_list', $goods_list);

    Tpl::output('sheji_class',$sheji_class);
    Tpl::output('index_sign','shang');
    Tpl::showpage('sheji');
}


public function shangdianOp(){
            $this->_model_search = Model('search');
        //优先从全文索引库里查找
        list($indexer_ids,$indexer_count) = $this->_indexer_search();
        $data_attr = $this->_get_attr_list();

        //处理排序
        $order = 'sheji_order desc';
        if (in_array($_GET['key'],array('1','2','3'))) {
            $sequence = $_GET['order'] == '1' ? 'asc' : 'desc';
            $order = str_replace(array('1','2','3'), array('goods_salenum','goods_click','goods_price'), $_GET['key']);
            $order .= ' '.$sequence;
        }

        $model_goods = Model('goods_sheji');
        if (!isset($data_attr['sign']) || $data_attr['sign'] === true) {
            // 字段

            $condition = array();
            if (is_array($indexer_ids)) {
                //商品主键搜索
                $condition['sheji_id'] = array('in',$indexer_ids);
                $goods_list = $model_goods->getMemberList($condition, '*', 16, $order);
                pagecmd('setEachNum',self::PAGESIZE);
                pagecmd('setTotalNum',$indexer_count);
            } else {
                $goods_list =  $model_goods->getMemberList($condition, '*', 16, $order);
            }

            Tpl::output('show_page', $model_goods->showpage(6));

            Tpl::output('goods_list', $goods_list);
        }

        Tpl::output('class_name',  @$data_attr['gc_name']);

        loadfunc('search');

        if(empty($_GET['she'])){
            $she='1';
             $string='品牌&农场';
        }else{
            $she=$_GET['she'];
               $string='设计师';
        }

        Tpl::output('she',$she);
        Tpl::output('string',$string);

        Tpl::output('index_sign','shang');
        Tpl::showpage('shang');
}

  public function sdOp(){
        if(empty($_GET['stype'])){
        $s_type='1';
    }else{
        $s_type=$_GET['stype'];
    }

if($s_type=='1'){
    $string='商店';
}else{
    $string='产品';
}
    Tpl::output('string',$string);
    Tpl::output('stype',$s_type);


        if (intval($_GET['count']) > 0) {
        //获取国家值
        $dbs=Model('count')->getCountInfo(array('count_id'=>$_GET['count']),'count_name');
        $count_name=$dbs['count_name'];
        }else{
        $count_name='国家';
        }
         Tpl::output('count_name',$count_name);
         
      $this->_model_search = Model('search');
        //优先从全文索引库里查找
        list($indexer_ids,$indexer_count) = $this->_indexer_search();
        $data_attr = $this->_get_attr_list();

        //处理排序
        $order = 'store_id desc';
        if (in_array($_GET['key'],array('1','2','3'))) {
            $sequence = $_GET['order'] == '1' ? 'asc' : 'desc';
            $order = str_replace(array('1','2','3'), array('goods_salenum','goods_click','goods_price'), $_GET['key']);
            $order .= ' '.$sequence;
        }
        $model_goods = Model('store');
        if (!isset($data_attr['sign']) || $data_attr['sign'] === true) {
            // 字段
            $fields = "*";

            $condition = array();
            if (is_array($indexer_ids)) {
                //商品主键搜索
                $condition['store_id'] = array('in',$indexer_ids);
                $goods_list = $model_goods->getStoreList($condition,0, $order,  $fields,  self::PAGESIZE, null, false);
                pagecmd('setEachNum',self::PAGESIZE);
                pagecmd('setTotalNum',$indexer_count);
            } else {
                if (intval($_GET['count']) > 0) {
                    $condition['goods_count'] = intval($_GET['count']);
                }

                //执行正常搜索

                if ($_GET['keyword'] != '') {
                    $condition['goods_name|goods_jingle'] = array('like', '%' . $_GET['keyword'] . '%');
                }
                $condition['store_state'] = '1';
             //潮流商家
                $condition['grade_id'] = '3';

                if (isset($data_attr['goodsid_array'])){
                    $condition['goods_id'] = array('in', $data_attr['goodsid_array']);
                }
               $store_list = $model_goods->getStoreList($condition,0, $order,  $fields,  self::PAGESIZE, null, false);
            }
            Tpl::output('show_page1', $model_goods->showpage(4));

        }
                Tpl::output('class_name',  @$data_attr['gc_name']);

        loadfunc('search');

            //品牌
      $model =  Model('brand');
      $brand = $model->table('brand')->where(array('brand_apply'=>'1','class_id'=>'959'))->order('brand_sort asc')->select();
     // print_r($brand);
      Tpl::output('store_list', $store_list);


//获取国家
        $count= Model()->table('count')->where()->order('count_id asc')->select();
        Tpl::output('count',$count);


    Tpl::output('brand',$brand);
    Tpl::output('index_sign','chao');
    Tpl::showpage('sd');
  }



   public function chaoOp(){
    if(empty($_GET['stype'])){
        $s_type='1';
    }else{
        $s_type=$_GET['stype'];
    }
if($s_type=='1'){
    $string='商店';
}else{
    $string='产品';
}

        if (intval($_GET['count']) > 0) {
        //获取国家值
        $dbs=Model('count')->getCountInfo(array('count_id'=>$_GET['count']),'count_name');
        $count_name=$dbs['count_name'];
        }else{
        $count_name='国家';
        }
         Tpl::output('count_name',$count_name);
    Tpl::output('string',$string);
    Tpl::output('stype',$s_type);

    $this->_model_search = Model('search');
        //优先从全文索引库里查找
        list($indexer_ids,$indexer_count) = $this->_indexer_search();
        $data_attr = $this->_get_attr_list();

        //处理排序
        $order = 'goods_id desc';
        if (in_array($_GET['key'],array('1','2','3'))) {
            $sequence = $_GET['order'] == '1' ? 'asc' : 'desc';
            $order = str_replace(array('1','2','3'), array('goods_salenum','goods_click','goods_price'), $_GET['key']);
            $order .= ' '.$sequence;
        }
        $model_goods = Model('goods');
        if (!isset($data_attr['sign']) || $data_attr['sign'] === true) {
            // 字段
            $fields = "goods_id,goods_commonid,goods_name,goods_jingle,gc_id,store_id,store_name,goods_price,goods_marketprice,goods_storage,goods_image,goods_freight,goods_salenum,color_id,evaluation_good_star,evaluation_count,goods_count";

            $condition = array();
            if (is_array($indexer_ids)) {
                //商品主键搜索
                $condition['goods_id'] = array('in',$indexer_ids);
                $goods_list = $model_goods->getGoodsOnlineList($condition, $fields, 0, $order, self::PAGESIZE, null, false);
                pagecmd('setEachNum',self::PAGESIZE);
                pagecmd('setTotalNum',$indexer_count);
            } else {
               
                if (intval($_GET['count']) > 0) {
                    $condition['goods_count'] = intval($_GET['count']);
                }  

                //执行正常搜索
                if (isset($data_attr['gcid_array'])) {
                    $condition['gc_id'] = array('in', $data_attr['gcid_array']);
                }
                if (intval($_GET['b_id']) > 0) {
                    $condition['brand_id'] = intval($_GET['b_id']);
                }
                if ($_GET['keyword'] != '') {
                    $condition['goods_name|goods_jingle'] = array('like', '%' . $_GET['keyword'] . '%');
                }
                if (intval($_GET['area_id']) > 0) {
                    $condition['areaid_1'] = intval($_GET['area_id']);
                }
                if (in_array($_GET['type'], array(1,2))) {
                    if ($_GET['type'] == 1) {
                        $condition['store_id'] = DEFAULT_PLATFORM_STORE_ID;
                    } else if ($_GET['type'] == 2) {
                        $condition['store_id'] = array('neq', DEFAULT_PLATFORM_STORE_ID);
                    }
                }
                if (isset($data_attr['goodsid_array'])){
                    $condition['goods_id'] = array('in', $data_attr['goodsid_array']);
                }
                $goods_list = $model_goods->getGoodsListByColorDistinct($condition, $fields, $order, self::PAGESIZE);
            }


            Tpl::output('show_page1', $model_goods->showpage(4));
            Tpl::output('show_page', $model_goods->showpage(6));

            // 商品多图
            if (!empty($goods_list)) {
                $goodsid_array = array();       // 商品id数组
                $commonid_array = array(); // 商品公共id数组
                $storeid_array = array();       // 店铺id数组
                foreach ($goods_list as $value) {
                    $goodsid_array[] = $value['goods_id'];
                    $commonid_array[] = $value['goods_commonid'];
                    $storeid_array[] = $value['store_id'];
                }
                $goodsid_array = array_unique($goodsid_array);
                $commonid_array = array_unique($commonid_array);
                $storeid_array = array_unique($storeid_array);

                // 商品多图
                $goodsimage_more = Model('goods')->getGoodsImageList(array('goods_commonid' => array('in', $commonid_array)));

                // 店铺
                $store_list = Model('store')->getStoreMemberIDList($storeid_array);
                

                foreach ($goods_list as $key => $value) {
                    // 商品多图
                    foreach ($goodsimage_more as $v) {
                        if ($value['goods_commonid'] == $v['goods_commonid'] && $value['store_id'] == $v['store_id'] && $value['color_id'] == $v['color_id']) {
                            $goods_list[$key]['image'][] = $v;
                        }
                    }
                    // 店铺的开店会员编号
                    $store_id = $value['store_id'];
                    $goods_list[$key]['member_id'] = $store_list[$store_id]['member_id'];
                    $goods_list[$key]['store_domain'] = $store_list[$store_id]['store_domain'];
                    // 团购
                    if (isset($groupbuy_list[$value['goods_commonid']])) {
                        $goods_list[$key]['goods_price'] = $groupbuy_list[$value['goods_commonid']]['groupbuy_price'];
                        $goods_list[$key]['group_flag'] = true;
                    }
                    if (isset($xianshi_list[$value['goods_id']]) && !$goods_list[$key]['group_flag']) {
                        $goods_list[$key]['goods_price'] = $xianshi_list[$value['goods_id']]['xianshi_price'];
                        $goods_list[$key]['xianshi_flag'] = true;
                    }
                    //国家
                     $goods_list[$key]['goods_count']=Model('count')->getCount($value['goods_count']);
                }
            }
            Tpl::output('goods_list', $goods_list);
        }

        Tpl::output('class_name',  @$data_attr['gc_name']);

        //显示左侧分类
        if (intval($_GET['cate_id']) > 0) {
            $goods_class_array = $this->_model_search->getLeftCategory(array($_GET['cate_id']));
        } elseif ($_GET['keyword'] != '') {
            $goods_class_array = $this->_model_search->getTagCategory($_GET['keyword']);
        }
        Tpl::output('goods_class_array', $goods_class_array);

        if ($_GET['keyword'] == ''){
            //不显示无商品的搜索项
            if (C('fullindexer.open')) {
                $data_attr['brand_array'] = $this->_model_search->delInvalidBrand($data_attr['brand_array']);
                $data_attr['attr_array'] = $this->_model_search->delInvalidAttr($data_attr['attr_array']);   
            }
        }

        //抛出搜索属性
        Tpl::output('brand_array',$data_attr['brand_array']);
        Tpl::output('attr_array',$data_attr['attr_array']);
//         Tpl::output('cate_array',$data_attr['cate_array']);
        Tpl::output('checked_brand', $data_attr['checked_brand']);
        Tpl::output('checked_attr', $data_attr['checked_attr']);

        $model_goods_class = Model('goods_class');



        loadfunc('search');

        // 浏览过的商品
        $viewed_goods = $model_goods->getViewedGoodsList();
        Tpl::output('viewed_goods',$viewed_goods);
        

//商品类型
        $goods_class= Model('goods_class');
        $goods_type=$model_goods_class->table('goods_class')->where(array('gc_parent_id' =>'959'))->order('gc_sort asc')->select();
        Tpl::output('goods_type',$goods_type);

//当前商品类型
        $cate_id=$_GET['cate_id'];

        if($cate_id!=='0'){
            $scate_id=$model_goods_class->where(array('gc_id'=>$cate_id))->find();
            $scate_data=$scate_id['gc_name'];
        }else{
            $scate_data='产品';
        }  

        Tpl::output('scate_data',$scate_data);


//获取国家
        $count= Model()->table('count')->order('count_id asc')->select();
        Tpl::output('count',$count);


    //品牌
      $model =  Model('brand');
      $brand = $model->table('brand')->where(array('brand_apply'=>'1','class_id'=>'959'))->order('brand_sort asc')->select();
     // print_r($brand);
    Tpl::output('brand',$brand);
   	Tpl::output('index_sign','chao');
   	Tpl::showpage('chao');
   }

/*代沟商店*/
      public function daigouOp(){
    if(empty($_GET['type'])){
        $s_type='1';
    }else{
        $s_type=$_GET['type'];
    }



if($s_type=='1'){
    $string='商店';
}else{
    $string='产品';
}
    Tpl::output('string',$string);
    Tpl::output('stype',$s_type);
      $this->_model_search = Model('search');
        //优先从全文索引库里查找
        list($indexer_ids,$indexer_count) = $this->_indexer_search();
        $data_attr = $this->_get_attr_list();

        //处理排序
        $order = 'store_id desc';
        if (in_array($_GET['key'],array('1','2','3'))) {
            $sequence = $_GET['order'] == '1' ? 'asc' : 'desc';
            $order = str_replace(array('1','2','3'), array('goods_salenum','goods_click','goods_price'), $_GET['key']);
            $order .= ' '.$sequence;
        }
        $model_goods = Model('store');
        if (!isset($data_attr['sign']) || $data_attr['sign'] === true) {
            // 字段
            $fields = "*";

            $condition = array();
            if (is_array($indexer_ids)) {
                //商品主键搜索
                $condition['store_id'] = array('in',$indexer_ids);
                $goods_list = $model_goods->getStoreList($condition,0, $order,  $fields,  self::PAGESIZE, null, false);
                pagecmd('setEachNum',self::PAGESIZE);
                pagecmd('setTotalNum',$indexer_count);
            } else {
                if (intval($_GET['count']) > 0) {
                    $condition['goods_count'] = intval($_GET['count']);
                }

                //执行正常搜索

                if ($_GET['keyword'] != '') {
                    $condition['store_name|store_company_name'] = array('like', '%' . $_GET['keyword'] . '%');
                }
                  $condition['store_state'] = '1';
                //代沟 白金商家
                $condition['grade_id'] = '2';
                if (isset($data_attr['goodsid_array'])){
                    $condition['goods_id'] = array('in', $data_attr['goodsid_array']);
                }
               $store_list = $model_goods->getstoreList($condition,$page);

                        $page   = new Page();
                $page->setEachNum(16);
                $page->setStyle('admin');
                
               $store_list = $model_goods->getdianpuList($condition,$page);

            
            }

        //$taolun=Model('taolun')->getshou($swhere,$page);
        Tpl::output('show_page', $page->show(6));

        }
        Tpl::output('class_name',  @$data_attr['gc_name']);

        loadfunc('search');



        if (intval($_GET['count']) > 0) {
        //获取国家值
        $dbs=Model('count')->getCountInfo(array('count_id'=>$_GET['count']),'count_name');
        $count_name=$dbs['count_name'];
        }else{
        $count_name='国家';
        }
         Tpl::output('count_name',$count_name);


//商品类型
        $goods_class= Model('goods_class');
        $goods_type=$goods_class->table('goods_class')->where(array('gc_parent_id' =>'959'))->order('gc_sort asc')->select();
        Tpl::output('goods_type',$goods_type);


            //品牌
      $model =  Model('brand');
      $brand = $model->table('brand')->where(array('brand_apply'=>'1','class_id'=>'959'))->order('brand_sort asc')->select();
     // print_r($brand);
      Tpl::output('store_list', $store_list);


//获取国家
        $count= Model()->table('count')->where()->order('count_id asc')->select();
        Tpl::output('count',$count);


    Tpl::output('brand',$brand);
    Tpl::output('index_sign','daigou');
    Tpl::showpage('daigou');
   }




   public function daigousdOp(){
    if(empty($_GET['stype'])){
        $s_type='1';
    }else{
        $s_type=$_GET['stype'];
    }
if($s_type=='1'){
    $string='商店';
}else{
    $string='产品';
}

        if (intval($_GET['count']) > 0) {
        //获取国家值
        $dbs=Model('count')->getCountInfo(array('count_id'=>$_GET['count']),'count_name');
        $count_name=$dbs['count_name'];
        }else{
        $count_name='国家';
        }
         Tpl::output('count_name',$count_name);

         
    Tpl::output('string',$string);
    Tpl::output('stype',$s_type);

    $this->_model_search = Model('search');
        //优先从全文索引库里查找
        list($indexer_ids,$indexer_count) = $this->_indexer_search();
        $data_attr = $this->_get_attr_list();

        //处理排序
        $order = 'goods_id desc';
        if (in_array($_GET['key'],array('1','2','3'))) {
            $sequence = $_GET['order'] == '1' ? 'asc' : 'desc';
            $order = str_replace(array('1','2','3'), array('goods_salenum','goods_click','goods_price'), $_GET['key']);
            $order .= ' '.$sequence;
        }
        $model_goods = Model('goods');
        if (!isset($data_attr['sign']) || $data_attr['sign'] === true) {
            // 字段
            $fields = "goods_id,goods_commonid,goods_name,goods_jingle,gc_id,store_id,store_name,goods_price,goods_marketprice,goods_storage,goods_image,goods_freight,goods_salenum,color_id,evaluation_good_star,evaluation_count";

            $condition = array();
            if (is_array($indexer_ids)) {
                //商品主键搜索
                $condition['goods_id'] = array('in',$indexer_ids);
                $goods_list = $model_goods->getGoodsOnlineList($condition, $fields, 0, $order, self::PAGESIZE, null, false);
                pagecmd('setEachNum',self::PAGESIZE);
                pagecmd('setTotalNum',$indexer_count);
            } else {

        if (intval($_GET['count']) > 0) {
                    $condition['goods_count'] = intval($_GET['count']);
                }  

                //执行正常搜索
                if (isset($data_attr['gcid_array'])) {
                    $condition['gc_id'] = array('in', $data_attr['gcid_array']);
                }
                if (intval($_GET['b_id']) > 0) {
                    $condition['brand_id'] = intval($_GET['b_id']);
                }
                if ($_GET['keyword'] != '') {
                    $condition['goods_name|goods_jingle'] = array('like', '%' . $_GET['keyword'] . '%');
                }
                if (intval($_GET['area_id']) > 0) {
                    $condition['areaid_1'] = intval($_GET['area_id']);
                }
               $condition['store_id'] = '3';

                if (isset($data_attr['goodsid_array'])){
                    $condition['goods_id'] = array('in', $data_attr['goodsid_array']);
                }
                $goods_list = $model_goods->getGoodsListByColorDistinct($condition, $fields, $order, self::PAGESIZE);
            }

            Tpl::output('show_page1', $model_goods->showpage(4));
            Tpl::output('show_page', $model_goods->showpage(6));

            // 商品多图
            if (!empty($goods_list)) {
                $goodsid_array = array();       // 商品id数组
                $commonid_array = array(); // 商品公共id数组
                $storeid_array = array();       // 店铺id数组
                foreach ($goods_list as $value) {
                    $goodsid_array[] = $value['goods_id'];
                    $commonid_array[] = $value['goods_commonid'];
                    $storeid_array[] = $value['store_id'];
                }
                $goodsid_array = array_unique($goodsid_array);
                $commonid_array = array_unique($commonid_array);
                $storeid_array = array_unique($storeid_array);

                // 商品多图
                $goodsimage_more = Model('goods')->getGoodsImageList(array('goods_commonid' => array('in', $commonid_array)));

                // 店铺
                $store_list = Model('store')->getStoreMemberIDList($storeid_array);
                

                foreach ($goods_list as $key => $value) {
                    // 商品多图
                    foreach ($goodsimage_more as $v) {
                        if ($value['goods_commonid'] == $v['goods_commonid'] && $value['store_id'] == $v['store_id'] && $value['color_id'] == $v['color_id']) {
                            $goods_list[$key]['image'][] = $v;
                        }
                    }
                    // 店铺的开店会员编号
                    $store_id = $value['store_id'];
                    $goods_list[$key]['member_id'] = $store_list[$store_id]['member_id'];
                    $goods_list[$key]['store_domain'] = $store_list[$store_id]['store_domain'];
                    // 团购
                    if (isset($groupbuy_list[$value['goods_commonid']])) {
                        $goods_list[$key]['goods_price'] = $groupbuy_list[$value['goods_commonid']]['groupbuy_price'];
                        $goods_list[$key]['group_flag'] = true;
                    }
                    if (isset($xianshi_list[$value['goods_id']]) && !$goods_list[$key]['group_flag']) {
                        $goods_list[$key]['goods_price'] = $xianshi_list[$value['goods_id']]['xianshi_price'];
                        $goods_list[$key]['xianshi_flag'] = true;
                    }
                }
            }
            Tpl::output('goods_list', $goods_list);
        }
        Tpl::output('class_name',  @$data_attr['gc_name']);

        //显示左侧分类
        if (intval($_GET['cate_id']) > 0) {
            $goods_class_array = $this->_model_search->getLeftCategory(array($_GET['cate_id']));
        } elseif ($_GET['keyword'] != '') {
            $goods_class_array = $this->_model_search->getTagCategory($_GET['keyword']);
        }
        Tpl::output('goods_class_array', $goods_class_array);

        if ($_GET['keyword'] == ''){
            //不显示无商品的搜索项
            if (C('fullindexer.open')) {
                $data_attr['brand_array'] = $this->_model_search->delInvalidBrand($data_attr['brand_array']);
                $data_attr['attr_array'] = $this->_model_search->delInvalidAttr($data_attr['attr_array']);   
            }
        }

        //抛出搜索属性
        Tpl::output('brand_array',$data_attr['brand_array']);
        Tpl::output('attr_array',$data_attr['attr_array']);
//         Tpl::output('cate_array',$data_attr['cate_array']);
        Tpl::output('checked_brand', $data_attr['checked_brand']);
        Tpl::output('checked_attr', $data_attr['checked_attr']);

        $model_goods_class = Model('goods_class');
         loadfunc('search');

//商品类型
        $goods_class= Model('goods_class');
        $goods_type=$model_goods_class->table('goods_class')->where(array('gc_parent_id' =>'959'))->order('gc_sort asc')->select();
        Tpl::output('goods_type',$goods_type);

//当前商品类型
        $cate_id=$_GET['cate_id'];

        if($cate_id!=='0'){
            $scate_id=$model_goods_class->where(array('gc_id'=>$cate_id))->find();
            $scate_data=$scate_id['gc_name'];
        }else{
            $scate_data='产品';
        }  

        Tpl::output('scate_data',$scate_data);



//获取国家
        $count= Model()->table('count')->where()->order('count_id asc')->select();
        Tpl::output('count',$count);

        
    //品牌
      $model =  Model('brand');
      $brand = $model->table('brand')->where(array('brand_apply'=>'1','class_id'=>'959'))->order('brand_sort asc')->select();
     // print_r($brand);
    Tpl::output('brand',$brand);
    Tpl::output('index_sign','daigou');
    Tpl::showpage('daigou2');
   }

    /**
     * 全文搜索
     * @return array 商品主键，搜索结果总数
     */
    private function _indexer_search() {
        if (!C('fullindexer.open')) return array(null,0);

        $condition = array();

        //拼接条件
        if (intval($_GET['cate_id']) > 0) {
            $cate_id = intval($_GET['cate_id']);
            $goods_class = H('goods_class') ? H('goods_class') : H('goods_class', true);
            $depth = $goods_class[$cate_id]['depth'];
            $cate_field = 'cate_'.$depth;
            $condition['cate']['key'] = $cate_field;
            $condition['cate']['value'] = $cate_id;
        }
        if ($_GET['keyword'] != '') {
            $condition['keyword'] = $_GET['keyword'];
        }
        if (intval($_GET['b_id']) > 0) {
            $condition['brand_id'] = intval($_GET['b_id']);
        }
        if (preg_match('/^[\d_]+$/',$_GET['a_id'])) {
            $attr_ids = explode('_',$_GET['a_id']);
            if (is_array($attr_ids)){
                foreach ($attr_ids as $v) {
                    if (intval($v) > 0) {
                        $condition['attr_id'][] = intval($v);
                    }
                }
            }
        }
        if (in_array($_GET['type'],array('1','2'))) {
            $condition['store_id'] = $_GET['type'];
        }
        if (intval($_GET['area_id']) > 0) {
            $condition['area_id'] = intval($_GET['area_id']);
        }

        //拼接排序(销量,浏览量,价格)
        $order = array();
        $order['key'] = 'goods_id';
        $order['value'] = false;
        if (in_array($_GET['key'],array('1','2','3'))) {
            $order['value'] = $_GET['order'] == '1' ? true : false;
            $order['key'] = str_replace(array('1','2','3'), array('goods_salenum','goods_click','goods_price'), $_GET['key']);
        }

        //取得商品主键等信息
        $result = $this->_model_search->getIndexerList($condition,$order,self::PAGESIZE);
        if ($result !== false) {
            list($indexer_ids,$indexer_count) = $result;
            //如果全文搜索发生错误，后面会再执行数据库搜索
        } else {
            $indexer_ids = null;
            $indexer_count = 0;
        }

        return array($indexer_ids,$indexer_count);
    }




    /**
     * 取得商品属性
     */
    private function _get_attr_list() {
        if (intval($_GET['cate_id']) > 0) {
            $data = $this->_model_search->getAttrList();
        } else {
            $data = array();
        }
        return $data;
    }



}
