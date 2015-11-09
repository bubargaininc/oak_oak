<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="content microshop_stores">
    <div class="chosen-item ">
        <div class="inner1024">
            <div class="chosen-item-one">
                <div class="chosen-item-tit"></div>
                <div class="chosen-item-one-list">
                    <span class="chosen-flag zc ciolbox">
                        <a class="chosenSingle"><span class="chosenSinglei"><?php echo $output['count_name']?></span><i class="arrow arrow-bottom"></i></a>
                        <ul class="chosenDrop">
                                  <?php
                         foreach ($output['count'] as $key => $value){?>
                        <li data-flag="<?php echo $value['count_name']?>">

                        <a href="<?php echo replaceParam(array('count' => $value['count_id']));?>" target="_blank"><img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$value['count_images']);?>" alt="">
                        <span><?php echo $value['count_name']?></span>
                        </a>
                        </li>
                        <?php }?>
                        </ul>
                    </span>
                    
                    <span class="chosen-item-search ciolbox">
                        <form action="">
                            <input type="text" class="ipt">
                            <input type="button" class="btn">
                        </form>
                    </span>
                </div>
            </div><!--chosen-item-one-->
            <div class="chosen-item-two">
                <div class="chosen-item-tit">品牌&amp;农场</div>
                <div class="chosen-item-two-list"> 
                    <ul class="chosen-item-two-list-top clearfix">
                        <li class="on"><a href="">搜品牌&amp;农场</a></li>
                        <li><a href="<?php echo urlShop('category', 'shang');?>">搜设计师</a></li>
                    </ul>
                </div>
            </div>
            <div class="chosen-item-three">
             <div class="chosen-item-three-i">
                    <a class="<?php echo $_GET['order']=='1'?'on':''?>" href="<?php echo replaceParam(array('order' => '1'));?>">新品</a><i>.</i>
                    <a class="<?php echo $_GET['order']=='2'?'on':''?>" href="<?php echo replaceParam(array('order' => '2'));?>">销量</a><i>.</i>
                    <a class="<?php echo $_GET['order']=='3'?'on':''?>" href="<?php echo replaceParam(array('order' => '3'));?>">人气</a><i>.</i>
                    <a class="<?php echo $_GET['order']=='4'?'on':''?>" href="<?php echo replaceParam(array('order' => '4'));?>">价格</a>
                </div>
            </div>
               
            </div>
        </div>
    </div>

    <div class="inner clearfix ">
 <?php  foreach($output['brand_r'] as $key=>$brand_r){?>
 <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc">
                <a href="<?php echo urlShop('brand', 'list', array('brand'=>$brand_r['brand_id']));?>" target="_blank">
                   <?php echo $brand_r['brand_name'];?>
                </a></h1>
                <div class="meta">
                    <div class="tc"><a href="<?php echo urlShop('brand', 'list', array('brand'=>$brand_r['brand_id']));?>" target="_blank"></a></div>
                    <em class="flag"><img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$brand_r['brand_count']);?>" alt=""></em>
                </div>
            </div>
            <a href="<?php echo urlShop('brand', 'list', array('brand'=>$brand_r['brand_id']));?>" class="cover hover" target="_blank"><img src="<?php echo brandImage($brand_r['brand_pic']);?>" target="_blank"></a>
        </div>
        <?php }?>

    </div><!---->
    <div class="inner">
        <div class="pagenav">
            <?php echo $output['show_page']; ?>
        </div>
    </div>


</div>




<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/layout.css" rel="stylesheet" type="text/css">
<div class="nch-container wrapper" style="display:none">
  <div class="nch-all-menu">
    <ul class="tab-bar">
      <li><a href="<?php echo urlShop('category', 'index');?>">全部商品分类</a></li>
      <li class="current"><a href="javascript:void(0);">全部品牌</a></li>
      <li><a href="<?php echo urlShop('search', 'index');?>">全部商品</a></li>
    </ul>
  </div>
  <?php if(!empty($output['brand_r']) && is_array($output['brand_r'])){?>
  <div class="nch-recommend-borand">
    <div class="title" title="<?php echo $lang['brand_index_recommend_brand'];?>"></div>
    <div class="nch-barnd-list">
      <ul>
        <?php foreach($output['brand_r'] as $key=>$brand_r){?>
        <li>
          <dl>
            <dt><a href="<?php echo urlShop('brand', 'list', array('brand'=>$brand_r['brand_id']));?>"><img src="<?php echo brandImage($brand_r['brand_pic']);?>" alt="<?php echo $brand_r['brand_name'];?>" /></a></dt>
            <dd><a href="<?php echo urlShop('brand', 'list', array('brand'=>$brand_r['brand_id']));?>"><?php echo $brand_r['brand_name'];?></a></dd>
          </dl>
        </li>
        <?php }?>
      </ul>
    </div>
  </div>
  <?php }?>
  <div class="nch-brand-class">
    <div class="nch-brand-class-tab">
      <?php if(!empty($output['brand_class'])){?>
      <ul class="tabs-nav">
        <?php $i = 0;foreach($output['brand_class'] as $key=>$brand){$i++;?>
        <li class="<?php if ($i == 1) { echo 'tabs-selected';} ?>"><a href="javascript:void(0);"><?php echo $brand['brand_class'];?></a></li>
        <?php }?>
      </ul>
      <?php }?>
    </div>
    <?php if(!empty($output['brand_c'])) {?>
    <?php $i = 0; foreach($output['brand_c'] as $key=>$brand_c){$i++;array_splice($brand_c, 60); // 每组只显示60个品牌?>
    <div class="nch-barnd-list tabs-panel <?php if ($i != 1) { echo 'tabs-hide';} ?>">
      <ul>
        <?php foreach($brand_c as $key=>$brand){?>
        <li>
          <dl>
            <dt><a href="<?php echo urlShop('brand', 'list', array('brand'=>$brand['brand_id']));?>" target="_blank"><img src="<?php echo brandImage($brand['brand_pic']);?>" alt="<?php echo $brand['brand_name'];?>"/></a></dt>
            <dd><a href="<?php echo urlShop('brand', 'list', array('brand'=>$brand['brand_id']));?>"><?php echo $brand['brand_name'];?></a></dd>
          </dl>
        </li>
        <?php }?>
      </ul>
    </div>
    <?php }?>
    <?php }?>
  </div>
</div>
<script>
//首页Tab标签卡滑门切换
$(".tabs-nav > li > a").live('mousedown', (function(e) {
	if (e.target == this) {
		var tabs = $(this).parents('ul:first').children("li");
		var panels = $(this).parents('.nch-brand-class:first').children(".tabs-panel");
		var index = $.inArray(this, $(this).parents('ul:first').find("a"));
		if (panels.eq(index)[0]) {
			tabs.removeClass("tabs-selected").eq(index).addClass("tabs-selected");
			panels.addClass("tabs-hide").eq(index).removeClass("tabs-hide");
		}
	}
}));
</script>