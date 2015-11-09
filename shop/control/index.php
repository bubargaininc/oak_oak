<?php
/**
 * 默认展示页面
 *
 *
 *
 * @copyright  Copyright (c) 2007-2013 ShopNC Inc. (http://www.shopnc.net)
 * @license    http://www.shopnc.net
 * @link       http://www.shopnc.net
 * @since      File available since Release v1.1
 */
defined('InShopNC') or exit('Access Invalid!');
class indexControl extends BaseHomeControl{
	public function indexOp(){
		Language::read('home_index_index');
	/**	Tpl::output('index_sign','index');*/

		//团购专区
		Language::read('member_groupbuy');
        $model_groupbuy = Model('groupbuy');
        $group_list = $model_groupbuy->getGroupbuyCommendedList(array(), null, '', '*', 4);
		Tpl::output('group_list', $group_list);

		//限时折扣
        $model_xianshi_goods = Model('p_xianshi_goods');
        $xianshi_item = $model_xianshi_goods->getXianshiGoodsCommendList(4);
		Tpl::output('xianshi_item', $xianshi_item);

		//板块信息
		$model_web_config = Model('web_config');
		$web_html = $model_web_config->getWebHtml('index');
		Tpl::output('web_html',$web_html);

		Model('seo')->type('index')->show();

       //新品汇
		$news=model()->table('goods,store')->join('left')->on('goods.store_id=store.store_id')->where(array('grade_id'=>'3'))->limit('6')->select();
	 /**获取品牌国籍*/
        foreach ($news as $key => $value) {
        	  $news[$key]['goods_count']=Model('count')->getCount($value['goods_count']);
        	  $news[$key]['brand_name']=Model('brand')->getOneBrand_name($value['brand_id']);
        }
		$news_first=array_shift($news);

    //欧洲潮流
		$chaoliu=model()->table('goods,store')->join('left')->on('goods.store_id=store.store_id')->where(array('grade_id'=>'3'))->limit('6')->select();
	 /**获取品牌国籍*/
        foreach ($chaoliu as $key => $value) {
        	  $chaoliu[$key]['brand_name']=Model('brand')->getOneBrand_name($value['brand_id']);
        	  $chaoliu[$key]['goods_count']=Model('count')->getCount($value['goods_count']);
        }

		TpL::output('news_first',$news_first);
        TpL::output('news',$news);
		
		TpL::output('chaoliu',$chaoliu);
		//欧洲潮 搜索商店
        $shangdian=model()->table('store')->limit('6');
	 	$model = Model();
		//安心农场
		//设计师作品
		$sheji_pl=Model()->table('goods_sheji')->order('sheji_order desc')->select();
		//判断设计师是否有作品
		$sheji = $model->table('goods_sheji,goods')->join('left')->on('goods_sheji.sheji_id = goods.goods_sheji')->where('goods.goods_state=1')->order('goods_sheji.sheji_order desc')->limit(6)->select();
    //品牌
    	foreach ($sheji as $key => $value) {
        	  $sheji[$key]['goods_count']=Model('count')->getCount($value['goods_count']);
        	  $sheji[$key]['brand_name']=Model('brand')->getOneBrand_name($value['brand_id']);
        }

TpL::output('sheji',$sheji);
		//个人代购

     //$daigou=$model->table('goods,store')->join('left')->on('goods.store_id=store.store_id')->where(array('grade_id'=>'2'))->limit('6')->select();
$daigou=$model->table('store')->where(array('grade_id'=>'2','store_state'=>'1'))->limit('6')->select();
	TpL::output('daigou',$daigou);

//SELECT * FROM `shopnc_goods` as g LEFT JOIN `shopnc_store` as u on g.store_id=u.store_id where u.grade_id=2;
/*	$tagmember_list = $model->table('sns_mtagmember,member')
									->field('sns_mtagmember.*,member.member_avatar,member.member_name')
									->join('left')->on('sns_mtagmember.member_id=member.member_id')
									->where($where)
									->order('sns_mtagmember.recommend desc, sns_mtagmember.member_id asc')
									->limit(count($mtagid_array)*20)->select();
*/
//$orderprod_list = $model->table('points_ordergoods,points_order')->join('left')->on('points_ordergoods.point_orderid = points_order.point_orderid')->where(array('point_orderstate'=>array('gt',10)))->order('points_ordergoods.point_recid desc')->limit(5)->select();
	
      	//品牌
      	$sband=Model('band');
      	$brand = $sband->table('brand')->where(array('brand_apply'=>'1','class_id'=>'959'))->limit(12)->order('brand_recommend desc,brand_sort asc')->select();
      	TpL::output('brand',$brand);

      		$svbrand = $sband->table('brand')->where(array('brand_apply'=>'1','class_id'=>'959'))->limit(6)->order('brand_recommend desc,brand_sort asc')->select();
	 /**获取品牌国籍*/
        foreach ($svbrand as $key => $value) {
        	  $svbrand[$key]['goods_count']=Model('count')->getCount($value['brand_count']);
        }
      //首页广告图
		$adv=$model->table('adv')->where(array('ap_id'=>'376'))->select();
	
		TpL::output('adv',$adv);
      	TpL::output('svbrand',$svbrand);
		TpL::output('index','index');
		Tpl::showpage('index');
	}

	//json输出商品分类
	public function josn_classOp() {
		/**
		 * 实例化商品分类模型
		 */
		$model_class		= Model('goods_class');
		$goods_class		= $model_class->getClassList(array('gc_parent_id'=>intval($_GET['gc_id']),'order'=>'gc_parent_id asc,gc_sort asc,gc_id asc'));
		$array				= array();
		if(is_array($goods_class) and count($goods_class)>0) {
			foreach ($goods_class as $val) {
				$array[$val['gc_id']] = array('gc_id'=>$val['gc_id'],'gc_name'=>htmlspecialchars($val['gc_name']),'gc_parent_id'=>$val['gc_parent_id'],'gc_sort'=>$val['gc_sort']);
			}
		}
		/**
		 * 转码
		 */
		if (strtoupper(CHARSET) == 'GBK'){
			$array = Language::getUTF8(array_values($array));//网站GBK使用编码时,转换为UTF-8,防止json输出汉字问题
		} else {
			$array = array_values($array);
		}
		echo $_GET['callback'].'('.json_encode($array).')';
	}

	//判断是否登录
	public function loginOp(){
		echo ($_SESSION['is_login'] == '1')? '1':'0';
	}


    public function zhuyeOp(){
    	$order=urlShop('member_order','index');
    	$home =urlShop('home','cheng');
    	echo '<div class="popup-wrap" id="popup-wrap">
    <div class="popup-content">
        <div class="clearfix">
            <a href="'.$order.'" class="ae-order-popup">我的订单</a>
            <span class="ae-go-popup"></span>
            <a href="'.$home.'" class="ae-user-popup">我的主页</a>
        </div>
        <p class="p">选择您要去的页面</p>
    </div>
</div>';
    }

	/**
	 * 头部最近浏览的商品
	 */
	public function viewed_infoOp(){
	    $info = array();
		if ($_SESSION['is_login'] == '1') {
		    $member_id = $_SESSION['member_id'];
		    $info['m_id'] = $member_id;
		    if (C('voucher_allow') == 1) {
		        $time_to = time();//当前日期
    		    $info['voucher'] = Model()->table('voucher')->where(array('voucher_owner_id'=> $member_id,'voucher_state'=> 1,
    		    'voucher_start_date'=> array('elt',$time_to),'voucher_end_date'=> array('egt',$time_to)))->count();
		    }
    		$time_to = strtotime(date('Y-m-d'));//当前日期
    		$time_from = date('Y-m-d',($time_to-60*60*24*7));//7天前
		    $info['consult'] = Model()->table('consult')->where(array('member_id'=> $member_id,
		    'consult_reply_time'=> array(array('gt',strtotime($time_from)),array('lt',$time_to+60*60*24),'and')))->count();
		}
	    $model_goods = Model('goods');
		$goods_list = $model_goods->getViewedGoodsList();
		if(is_array($goods_list) && !empty($goods_list)) {
		    $viewed_goods = array();
		    foreach ($goods_list as $key => $val) {
		        $goods_id = $val['goods_id'];
		        $val['url'] = urlShop('goods', 'index', array('goods_id' => $goods_id));
		        $val['goods_image'] = thumb($val, 60);
		        $viewed_goods[$goods_id] = $val;
		    }
		    $info['viewed_goods'] = $viewed_goods;
		}
		if (strtoupper(CHARSET) == 'GBK'){
			$info = Language::getUTF8($info);
		}
		echo json_encode($info);
	}
}
