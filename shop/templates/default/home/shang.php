<?php defined('InShopNC') or exit('Access Invalid!');?>
<script src="<?php echo SHOP_RESOURCE_SITE_URL.'/js/search_goods.js';?>"></script>
<script src="<?php echo RESOURCE_SITE_URL.'/js/class_area_array.js';?>"></script>
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/layout.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {
_behavior: url(<?php echo SHOP_TEMPLATES_URL;
?>/css/csshover.htc);
}
</style>

<div class="content microshop_stores">
    <div class="chosen-item ">
        <div class="inner1024">
            <div class="chosen-item-one">
                <div class="chosen-item-tit"></div>
                <div class="chosen-item-one-list">
                    <span class="chosen-flag zc ciolbox">
                        <a class="chosenSingle"><span class="chosenSinglei">国家</span><i class="arrow arrow-bottom"></i></a>
                        <ul class="chosenDrop">
                          <?php
                         foreach ($output['count'] as $key => $value){?>
                        <li data-flag="<?php echo $value['count_name']?>"><img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$value['count_images']);?>" alt="">
                        <span><?php echo $value['count_name']?></span>
                        </li>
                        <?php }?>
                        </ul>
                    </span>
                  
                </div>
            </div><!--chosen-item-one-->
            <div class="chosen-item-two">
                <div class="chosen-item-tit"><?php echo $output['string'];?></div>
                <div class="chosen-item-two-list">
                    <ul class="chosen-item-two-list-top clearfix">
                        <li><a href="<?php echo urlShop('brand', 'index');?>">搜品牌&农场</a></li>
                        <li class="on"><a href="<?php echo replaceParam(array('she' => '2'));?>">搜设计师</a></li>
                    </ul>
                </div>
            </div>
            <div class="chosen-item-three">
                <div class="chosen-item-three-i">

<a <?php if(!$_GET['key']){?>class="on"<?php }?>  href="<?php echo dropParam(array('order', 'key'));?>"  title="<?php echo $lang['goods_class_index_default_sort'];?>">新品</a><i>.</i>

            <a <?php if($_GET['key'] == '1'){?>class="on"<?php }?> href="<?php echo ($_GET['order'] == '2' && $_GET['key'] == '1') ? replaceParam(array('key' => '1', 'order' => '1')):replaceParam(array('key' => '1', 'order' => '2')); ?>" <?php if($_GET['key'] == '1'){?>class="<?php echo $_GET['order'] == 1 ? 'asc' : 'desc';?>"<?php }?> title="<?php echo ($_GET['order'] == '2' && $_GET['key'] == '1')?$lang['goods_class_index_sold_asc']:$lang['goods_class_index_sold_desc']; ?>">销量</a><i></i>


            <a  <?php if($_GET['key'] == '2'){?>class="on"<?php }?> href="<?php echo ($_GET['order'] == '2' && $_GET['key'] == '2') ? replaceParam(array('key' => '2', 'order' => '1')):replaceParam(array('key' => '2', 'order' => '2')); ?>" <?php if($_GET['key'] == '2'){?>class="<?php echo $_GET['order'] == 1 ? 'asc' : 'desc';?>"<?php }?> title="<?php  echo ($_GET['order'] == '2' && $_GET['key'] == '2')?$lang['goods_class_index_click_asc']:$lang['goods_class_index_click_desc']; ?>">人气</a><i>.</i>


            <a <?php if($_GET['key'] == '3'){?>class="on"<?php }?> href="<?php echo ($_GET['order'] == '2' && $_GET['key'] == '3') ? replaceParam(array('key' => '3', 'order' => '1')):replaceParam(array('key' => '3', 'order' => '2')); ?>" <?php if($_GET['key'] == '3'){?>class="<?php echo $_GET['order'] == 1 ? 'asc' : 'desc';?>"<?php }?> title="<?php echo ($_GET['order'] == '2' && $_GET['key'] == '3')?$lang['goods_class_index_price_asc']:$lang['goods_class_index_price_desc']; ?>">价格</a>


                </div>
            </div>
        </div>
    </div>
    <div class="inner clearfix ">
            
  <?php if(!empty($output['goods_list']) && is_array($output['goods_list'])){?>
  <?php 
  foreach($output['goods_list'] as $value){?>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="<?php echo urlShop('category','sheji',array('sheji_id'=>$value['sheji_id']));?>"><?php echo $value['sheji_name'];?></a></h1>
                <div class="meta">
                    <div class="tc"><a href="<?php echo urlShop('category','sheji',array('sheji_id'=>$value['sheji_id']));?>"><?php echo $value['store_name'];?></a></div>
 
                </div>
            </div>

            <a href="<?php echo urlShop('category','sheji',array('sheji_id'=>$value['sheji_id']));?>" class="cover hover"><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND.'/'.$value['sheji_avatar']; ?>" alt=""></a>
        </div> 
     <?php }?>
    <?php }?>
    </div><!---->

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