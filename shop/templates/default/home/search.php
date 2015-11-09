<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="content search">
    <div class="chosen-item ">
        <div class="inner1024 clearfix">
            <div class="chosen-item-one">
                <div class="chosen-item-tit"></div>
                <div class="chosen-item-one-list fr">
                    <span class="chosen-flag zc ciolbox">
                        <a class="chosenSingle"><span class="chosenSinglei">德国</span><i class="arrow arrow-bottom"></i></a>
                        <ul class="chosenDrop">
                            <li data-flag="德国"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""><span>德国</span></li>
                            <li data-flag="法国"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""><span>法国</span></li>
                            <li data-flag="英国"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""><span>英国</span></li>
                            <li data-flag="荷兰"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""><span>荷兰</span></li>
                            <li data-flag="意大利"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""><span class="ls0">意大利</span></li>
                        </ul>
                    </span>
                    <span class="month ciolbox"><em>0～3个月</em><i class="x">X</i></span>
                    <span class="sex ciolbox"><em>女</em><i class="x">X</i></span>
                </div>
            </div><!--chosen-item-one-->
            <div class="chosen-search-item clearfix" style="display:none">
                <a href="javascript:;" class="close_search_item"><span class="oclose hide">收起</span><span class="omore">更多</span><i class="ouu ouu-angle-down"></i></a>
                <div class="chosen-search-item-list csi_t csil-pp clearfix">
                    <div class="csil-tit">品牌：</div>
                    <ul class="csil-con clearfix">
                    <li><a href="">Nutrilon/诺优能</a></li>
                    </ul>
                </div>
                <div class="chosen-search-item-list csil-zl clearfix">
                    <div class="csil-tit">种类：</div>
                    <ul class="csil-con clearfix"><li><a href="">一段</a></li><li><a href="">二段</a></li><li class="on"><a href="">三段</a></li><li><a href="">四段</a></li></ul>
                </div>
                <div class="chosen-search-item-list csil-gjc clearfix">
                    <div class="csil-tit">关键词：</div>
                    <ul class="csil-con clearfix"><li><a href="">无添加</a></li><li><a href="">高钙</a></li><li class="on"><a href="">补锌</a></li><li><a href="">维他命</a></li><li><a href="">DHA</a></li><li><a href="">叶酸</a></li></ul>
                </div>
            </div>
            <div class="chosen-item-three">
                <div class="chosen-item-three-i">

          <a  <?php if(!$_GET['key']){?>class="on"<?php }?>  href="<?php echo dropParam(array('order', 'key'));?>"  title="<?php echo $lang['goods_class_index_default_sort'];?>"><?php echo $lang['goods_class_index_default'];?></a><i>.</i>

            <a <?php if($_GET['key'] == '1'){?>class="on"<?php }?> href="<?php echo ($_GET['order'] == '2' && $_GET['key'] == '1') ? replaceParam(array('key' => '1', 'order' => '1')):replaceParam(array('key' => '1', 'order' => '2')); ?>" <?php if($_GET['key'] == '1'){?>class="<?php echo $_GET['order'] == 1 ? 'asc' : 'desc';?>"<?php }?> title="<?php echo ($_GET['order'] == '2' && $_GET['key'] == '1')?$lang['goods_class_index_sold_asc']:$lang['goods_class_index_sold_desc']; ?>"><?php echo $lang['goods_class_index_sold'];?></a><i></i>


            <a  <?php if($_GET['key'] == '2'){?>class="on"<?php }?> href="<?php echo ($_GET['order'] == '2' && $_GET['key'] == '2') ? replaceParam(array('key' => '2', 'order' => '1')):replaceParam(array('key' => '2', 'order' => '2')); ?>" <?php if($_GET['key'] == '2'){?>class="<?php echo $_GET['order'] == 1 ? 'asc' : 'desc';?>"<?php }?> title="<?php  echo ($_GET['order'] == '2' && $_GET['key'] == '2')?$lang['goods_class_index_click_asc']:$lang['goods_class_index_click_desc']; ?>"><?php echo $lang['goods_class_index_click']?></a><i>.</i>
            <a <?php if($_GET['key'] == '3'){?>class="on"<?php }?> href="<?php echo ($_GET['order'] == '2' && $_GET['key'] == '3') ? replaceParam(array('key' => '3', 'order' => '1')):replaceParam(array('key' => '3', 'order' => '2')); ?>" <?php if($_GET['key'] == '3'){?>class="<?php echo $_GET['order'] == 1 ? 'asc' : 'desc';?>"<?php }?> title="<?php echo ($_GET['order'] == '2' && $_GET['key'] == '3')?$lang['goods_class_index_price_asc']:$lang['goods_class_index_price_desc']; ?>"><?php echo $lang['goods_class_index_price'];?></a>


                
                </div>
            </div>
        </div>
    </div>
    <div class="inner clearfix">
      <?php require_once (BASE_TPL_PATH.'/home/goods.squares.php');?>
   
        
    </div><!---->
    <div class="inner">
        <div class="pagenav">
           <?php echo $output['show_page']; ?>
        </div>
    </div>
</div>




<script src="<?php echo SHOP_RESOURCE_SITE_URL.'/js/search_goods.js';?>"></script>
<script src="<?php echo RESOURCE_SITE_URL.'/js/class_area_array.js';?>"></script>
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/layout.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
_behavior: url(<?php echo SHOP_TEMPLATES_URL;
?>/css/csshover.htc);
}
</style>
<div class="nch-container wrapper"  style="display:none">
  <div class="left">
    <?php if (!empty($output['goods_class_array'])) {?>
    <div class="nch-module nch-module-style02">
      <div class="title">
        <h3>分类筛选</h3>
      </div>
      <div class="content">
        <ul id="files" class="tree">
          <?php foreach ($output['goods_class_array'] as $value) {?>
          <li><i class="tree-parent tree-parent-collapsed"></i><a href="<?php echo urlShop('search', 'index', array('cate_id' => $value['gc_id']));?>" <?php if ($value['gc_id'] == $_GET['cate_id']) {?>class="selected"<?php }?>><?php echo $value['gc_name']?></a>
            <?php if (!empty($value['class2'])) {?>
            <ul>
              <?php foreach ($value['class2'] as $val) {?>
              <li><i class="tree-parent tree-parent-collapsed"></i><a href="<?php echo urlShop('search', 'index', array('cate_id' => $val['gc_id']));?>" <?php if ($val['gc_id'] == $_GET['cate_id']) {?>class="selected"<?php }?>><?php echo $val['gc_name']?></a>
                <?php if (!empty($val['class3'])) {?>
                <ul>
                  <?php foreach ($val['class3'] as $v) {?>
                  <li class="tree-parent tree-parent-collapsed"><i></i><a href="<?php echo urlShop('search', 'index', array('cate_id' => $v['gc_id']));?>" <?php if ($v['gc_id'] == $_GET['cate_id']) {?>class="selected"<?php }?>><?php echo $v['gc_name']?></a></li>
                  <?php }?>
                </ul>
                <?php }?>
              </li>
              <?php }?>
            </ul>
            <?php }?>
          </li>
          <?php }?>
        </ul>
      </div>
    </div>
    <?php }?>
    <!-- S 推荐展位 -->
    <div nctype="booth_goods" class="nch-module" style="display:none;"> </div>
    <!-- E 推荐展位 -->
    <div class="nch-module-sidebar"> <?php echo loadadv(37,'html');?>
      <div class="clear"></div>
    </div>
    <div class="nch-module nch-module-style03">
      <div class="title">
        <h3><?php echo $lang['goods_class_viewed_goods']; ?></h3>
      </div>
      <div class="content">
        <?php foreach ($output['viewed_goods'] as $k=>$v){?>
        <dl class="nch-sidebar-bowers">
          <dt class="goods-name"><a href="<?php echo urlShop('goods','index',array('goods_id'=>$v['goods_id'])); ?>"><?php echo $v['goods_name']; ?></a></dt>
          <dd class="goods-pic"><a href="<?php echo urlShop('goods','index',array('goods_id'=>$v['goods_id'])); ?>"><img src="<?php echo thumb($v, 60); ?>" title="<?php echo $v['goods_name']; ?>" alt="<?php echo $v['goods_name']; ?>" ></a></dd>
          <dd class="goods-price"><?php echo $lang['currency'];?><?php echo $v['goods_price']; ?></dd>
        </dl>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="right">
    <?php if(!isset($output['goods_class_array']['child']) && empty($output['goods_class_array']['child']) && !empty($output['goods_class_array'])){?>
    <?php $dl=1;  //dl标记?>
    <?php if((!empty($output['brand_array']) && is_array($output['brand_array'])) || (!empty($output['attr_array']) && is_array($output['attr_array']))){?>
    <div class="nch-module nch-module-style01">
      <div class="title">
        <h3>
          <?php if (!empty($output['class_name'])) {?>
          <em><?php echo $output['class_name'];?></em> -
          <?php }?>
          商品筛选</h3>
      </div>
      <div class="content">
        <div class="nch-module-filter">
          <?php if((isset($output['checked_brand']) && is_array($output['checked_brand'])) || (isset($output['checked_attr']) && is_array($output['checked_attr']))){?>
          <dl nc_type="ul_filter">
            <dt><?php echo $lang['goods_class_index_selected'].$lang['nc_colon'];?></dt>
            <dd class="list">
              <?php if(isset($output['checked_brand']) && is_array($output['checked_brand'])){?>
              <?php foreach ($output['checked_brand'] as $key=>$val){?>
              <span class="selected" nctype="span_filter"><?php echo $lang['goods_class_index_brand'];?>:<em><?php echo $val['brand_name']?></em><i data-uri="<?php echo removeParam(array('b_id' => $key));?>">X</i></span>
              <?php }?>
              <?php }?>
              <?php if(isset($output['checked_attr']) && is_array($output['checked_attr'])){?>
              <?php foreach ($output['checked_attr'] as $val){?>
              <span class="selected" nctype="span_filter"><?php echo $val['attr_name'].':<em>'.$val['attr_value_name'].'</em>'?><i data-uri="<?php echo removeParam(array('a_id' => $val['attr_value_id']));?>">X</i></span>
              <?php }?>
              <?php }?>
            </dd>
          </dl>
          <?php }?>
          <?php if (!isset($output['checked_brand']) || empty($output['checked_brand'])){?>
          <?php if(!empty($output['brand_array']) && is_array($output['brand_array'])){?>
          <dl <?php if($dl>3){?>class="dl_hide"<?php }?>>
            <dt><?php echo $lang['goods_class_index_brand'].$lang['nc_colon'];?></dt>
            <dd class="list">
              <ul>
                <?php $i = 0;foreach ($output['brand_array'] as $k=>$v){$i++;?>
                <li <?php if ($i>10){?>style="display:none" nc_type="none"<?php }?>><a href="<?php $b_id = (($_GET['b_id'] != '' && intval($_GET['b_id']) != 0)?$_GET['b_id'].'_'.$k:$k); echo replaceParam(array('b_id' => $b_id));?>"><?php echo $v['brand_name'];?></a></li>
                <?php }?>
              </ul>
            </dd>
            <?php if (count($output['brand_array']) > 10){?>
            <dd class="all"><span nc_type="show"><i class="icon-angle-down"></i><?php echo $lang['goods_class_index_more'];?></span></dd>
            <?php }?>
          </dl>
          <?php $dl++;}?>
          <?php }?>

          <?php if(!empty($output['cate_array']) && is_array($output['cate_array'])){?>
          <dl <?php if($dl>3){?>class="dl_hide"<?php }?>>
            <dt><?php echo $lang['goods_class_index_goods_class'].$lang['nc_colon'];?></dt>
            <dd class="list">
              <ul>
                <?php $i = 0;foreach ($output['cate_array'] as $k=>$v){$i++;?>
                <li <?php if ($i>10){?>style="display:none" nc_type="none"<?php }?>><a href="<?php $b_id = (($_GET['cate_id'] != '' && intval($_GET['cate_id']) != 0)?$_GET['cate_id'].'_'.$k:$k); echo replaceParam(array('cate_id' => $b_id));?>"><?php echo $v['gc_name'];?></a></li>
                <?php }?>
              </ul>
            </dd>
            <?php if (count($output['brand_array']) > 10){?>
            <dd class="all"><span nc_type="show"><i class="icon-angle-down"></i><?php echo $lang['goods_class_index_more'];?></span></dd>
            <?php }?>
          </dl>
          <?php $dl++;?>
          <?php }?>

          <?php if(!empty($output['attr_array']) && is_array($output['attr_array'])){?>
          <?php $j = 0;foreach ($output['attr_array'] as $key=>$val){$j++;?>
          <?php if(!isset($output['checked_attr'][$key]) && !empty($val['value']) && is_array($val['value'])){?>
          <dl>
            <dt><?php echo $val['name'].$lang['nc_colon'];?></dt>
            <dd class="list">
              <ul>
                <?php $i = 0;foreach ($val['value'] as $k=>$v){$i++;?>
                <li <?php if ($i>10){?>style="display:none" nc_type="none"<?php }?>><a href="<?php $a_id = (($_GET['a_id'] != '' && $_GET['a_id'] != 0)?$_GET['a_id'].'_'.$k:$k); echo replaceParam(array('a_id' => $a_id));?>"><?php echo $v['attr_value_name'];?></a></li>
                <?php }?>
              </ul>
            </dd>
            <?php if (count($val['value']) > 10){?>
            <dd class="all"><span nc_type="show"><i class="icon-angle-down"></i><?php echo $lang['goods_class_index_more'];?></span></dd>
            <?php }?>
          </dl>
          <?php }?>
          <?php $dl++;} ?>
          <?php }?>      

        </div>
      </div>
    </div>
    <?php }?>
    <?php }?>
    <div class="shop_con_list" id="main-nav-holder">
      <nav class="sort-bar" id="main-nav">
      <div class="pagination"><?php echo $output['show_page1']; ?> </div>
      <div class="nch-all-category">
        <div class="all-category">
            <?php require template('layout/home_goods_class');?>
        </div>
      </div>
        <div class="nch-sortbar-array"> 排序方式：
          <ul>
            
          </ul>
        </div>
        <div class="nch-sortbar-owner">商品类型： <span>
        <a href="<?php echo dropParam(array('type'));?>" <?php if (!isset($_GET['type']) || !in_array($_GET['type'], array(1,2))) {?>class="selected"<?php }?>><i></i>全部</a>

        </span> <span>
        <a href="<?php echo replaceParam(array('type' => '1'));?>" <?php if ($_GET['type'] == 1) {?>class="selected"<?php }?>><i></i>商城自营</a>

        </span> <span><a href="<?php echo replaceParam(array('type' => '2'));?>" <?php if ($_GET['type'] == 2) {?>class="selected"<?php }?>><i></i>商家加盟</a></span> </div>
        <div class="nch-sortbar-location">商品所在地：
          <div class="select-layer">
            <div class="holder"><em nc_type="area_name"><?php echo $lang['goods_class_index_area']; ?><!-- 所在地 --></em></div>
            <div class="selected"><a nc_type="area_name"><?php echo $lang['goods_class_index_area']; ?><!-- 所在地 --></a></div>
            <i class="direction"></i>
            <ul class="options">
              <?php require(BASE_TPL_PATH.'/home/goods_class_area.php');?>
            </ul>
          </div>
        </div>

      </nav>
      <!-- 商品列表循环  -->

      <div>
      
      </div>
      <div class="tc mt20 mb20">
        <div class="pagination"> <?php echo $output['show_page']; ?> </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/waypoints.js"></script>
<script src="<?php echo SHOP_RESOURCE_SITE_URL;?>/js/search_category_menu.js"></script>
<script type="text/javascript">
var defaultSmallGoodsImage = '<?php echo defaultGoodsImage(240);?>';
var defaultTinyGoodsImage = '<?php echo defaultGoodsImage(60);?>';

$(function(){
    $('#files').tree({
        expanded: 'li:lt(2)'
    });

    //浮动导航  waypoints.js
    $('#main-nav-holder').waypoint(function(event, direction) {
        $(this).parent().toggleClass('sticky', direction === "down");
        event.stopPropagation();
    });
	// 单行显示更多
	$('span[nc_type="show"]').click(function(){
		s = $(this).parents('dd').prev().find('li[nc_type="none"]');
		if(s.css('display') == 'none'){
			s.show();
			$(this).html('<i class="icon-angle-up"></i><?php echo $lang['goods_class_index_retract'];?>');
		}else{
			s.hide();
			$(this).html('<i class="icon-angle-down"></i><?php echo $lang['goods_class_index_more'];?>');
		}
	});

	<?php if(isset($_GET['area_id']) && intval($_GET['area_id']) > 0){?>
	// 选择地区后的地区显示
	$('[nc_type="area_name"]').html(nc_class_a[<?php echo intval($_GET['area_id']);?>]);
	<?php }?>

	<?php if(isset($_GET['cate_id']) && intval($_GET['cate_id']) > 0){?>
	// 推荐商品异步显示
    $('div[nctype="booth_goods"]').load('<?php echo urlShop('search', 'get_booth_goods', array('cate_id' => $_GET['cate_id']))?>', function(){
        $(this).show();
    });
	<?php }?>
});
</script>