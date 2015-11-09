<?php defined('InShopNC') or exit('Access Invalid!');?>
 <link href="<?php echo SHOP_TEMPLATES_URL;?>/css/home_login.css" rel="stylesheet" type="text/css">
<div class="content">
    <div class="seller mb10">
        <div class="inner1024 posr">
            <div class="seller-name"><?php echo $output['store_info']['store_name'] ?></div>
            <div class="seller-cat">个人代购</div>
            <div class="seller-country"><?php echo empty($output['store_info']['store_add'])?'暂无描述':$output['store_info']['store_add']?></div>
        </div>
    </div>
    
    <div class="order-notice notice inner1024">
        <span class="posr">
            <span class="order-notice-content"><em class="bluetxt">消息：</em>您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></span>
            <a href="javascript:;" class="ae-order-notice has-notice"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/order/ae-order-notice.png" alt=""></a>
            <ul class="notice-sub">
                <li class="order-notice-content">您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></li>
                <li class="order-notice-content">您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></li>
                <li class="order-notice-content">您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></li>
            </ul>
        </span>
        <a href="<?php echo urlShop('home','cheng');?>" class="goanyway"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/order/ae-order-go.png" alt="">主页</a>
    </div>
    <div class="inner clearfix">
        <div class="mstore bxsd clearfix">
            <div class="describe clearfix">
                <div class="avatar">
                    <img src="<?php echo getMemberAvatar($output['member']['member_avatar']); ?>" alt="">
                    <a class="avatar-edit" href="javascript:;" style="display:none">编辑信息<i class="ae-order-edit"></i></a>
                </div>
                <div class="name"><?php echo $output['member']['member_name'] ?></div>
                <div class="info"><span>所在地：</span><?php echo empty($output['store_info']['store_add'])?'暂无描述':$output['store_info']['store_add']?></div>
                <div class="info"><span>工作状况：</span><?php echo empty($output['store_info']['store_work'])?'暂无描述':$output['store_info']['store_work']?></div>
                <div class="info"><span>婚姻状况：</span><div class="dib"><?php echo empty($output['store_info']['store_hun'])?'暂无描述':$output['store_info']['store_hun']?></div></div>
                <div class="info"><span>自我介绍：</span><?php echo empty($output['store_info']['store_ziwo'])?'暂无描述':$output['store_info']['store_ziwo']?></div>
                <div class="info"><span>主要经营：</span>
                   暂无数据
                <a style="display:none" href=""><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/order/ae-logo-hipp.png" alt=""></a>
                </div>
            </div>
            <div class="minfo">
                <div class="">
                    <h3 class="title">店铺简介:</h3>
                    <p style="height:200px;width:100%;overflow:hidden"><?php echo empty($output['store_info']['store_text'])?'暂无描述':$output['store_info']['store_text']?></p>
                    <div class="button clearfix">
                    <a href="javascript:collect_store(<?php echo $output['store_info']['store_id'];?>,'count','store_collect')" class="ae-likenum mr15"><?php echo $output['store_info']['store_collect'];?></a>
                    <a href="javascript:;" class="ae-taik-seler ml15"></a>
                    </div>
                    
                </div>
                <div class="">
                    <h3 class="tit">店铺评论:</h3>
                    <?php echo $output['store_info']['store_ping'];?>
                </div>
            </div>
        </div><!---->

         <?php 
         if(!empty($output['new_goods_list']) && is_array($output['new_goods_list'])){?>

  <?php foreach($output['new_goods_list'] as $value){?>
        <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['store_id']));?>" target="_blank"><?php echo $value['goods_name'];?></a></h1>
                <div class="meta">
                    <div class="tc"><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>"><?php echo $value['store_name']?></a></div>
                    <em class="flag"><img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$value['goods_count']);?>" alt=""></em>
                </div>
            </div>
            <div class="price">
                <div class="original"><?php echo $lang['currency'].$value['goods_price'];?></div>
            </div>

            <a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>" class="cover hover" target="_blank"><img src="<?php echo thumb($value, 233);?>" alt=""></a>

                <div class="ftr">
                <p class="info"><?php echo $value['goods_jingle']?> </p>
                <div class="meta">
                    <span class="like">0<i class="ae-like"></i></span> | 
                    <a class="listing" href=""><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div> 
     <?php }?>
            <?php }else{?>
            <div class="no_results">
              <p><?php echo $lang['show_store_index_no_record'];?></p>
            </div>
            <?php }?>

    </div><!---->
</div>




  <article id="content" style="display:none">
    <section class="layout expanded mt10" >
      <article class="nc-goods-main">
        <div class="flexslider">
          <ul class="slides">
            <?php if(!empty($output['store_slide']) && is_array($output['store_slide'])){?>
            <?php for($i=0;$i<5;$i++){?>
            <?php if($output['store_slide'][$i] != ''){?>
            <li><a <?php if($output['store_slide_url'][$i] != '' && $output['store_slide_url'][$i] != 'http://'){?>href="<?php echo $output['store_slide_url'][$i];?>"<?php }?>><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS.$output['store_slide'][$i];?>"></a></li>
            <?php }?>
            <?php }?>
            <?php }else{?>
            <li><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>f01.jpg"></li>
            <li><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>f02.jpg"></li>
            <li><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>f03.jpg"></li>
            <li><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_SLIDE.DS;?>f04.jpg"></li>
            <?php }?>
          </ul>
        </div>
        <div class="nc-s-c-s3 ncg-list mt10">
          <div class="title pngFix"> <span><a href="<?php echo urlShop('show_store', 'goods_all', array('store_id' => $_GET['store_id']));?>" class="more"><?php echo $lang['nc_more'];?></a></span>
            <h4> <?php echo $lang['show_store_index_recommend'];?></h4>
          </div>
          <div class="content pt20">
            <?php if(!empty($output['recommended_goods_list']) && is_array($output['recommended_goods_list'])){?>
            <ul>
              <?php foreach($output['recommended_goods_list'] as $value){?>
              <li>
                <dl>
                  <dt><a href="<?php echo urlShop('goods', 'index', array('goods_id'=>$value['goods_id']));?>" target="_blank"><?php echo $value['goods_name']?></a></dt>
                  <dd class="ncg-pic pngFix"><a href="<?php echo urlShop('goods', 'index', array('goods_id'=>$value['goods_id']));?>" target="_blank" class="thumb"><i></i><img src="<?php echo thumb($value, 240);?>" onload="javascript:DrawImage(this,160,160);" title="<?php echo $value['goods_name'];?>" alt="<?php echo $value['goods_name'];?>" /></a></dd>
                  <dd class="ncg-price"><em class="price"><i><?php echo $lang['currency'];?></i>
                      <?php if(intval($value['group_flag']) === 1) { ?>
                      <?php echo $value['group_price']?>
                      <?php } elseif(intval($value['xianshi_flag']) === 1) { ?>
                      <?php echo ncPriceFormat($value['goods_price'] * $value['xianshi_discount'] / 10);?>
                      <?php } else { ?>
                      <?php echo $value['goods_price']?>
                      <?php } ?>
                  </em></dd>
                  <dd class="ncg-sold"><?php echo $lang['show_store_index_be_sold'];?><strong><?php echo $value['goods_salenum'];?></strong> <?php echo $lang['nc_jian'];?></dd>
                </dl>
              </li>
              <?php }?>
            </ul>
            <?php }else{?>
            <div class="nothing">
              <p><?php echo $lang['show_store_index_no_record'];?></p>
            </div>
            <?php }?>
          </div>
        </div>
        <div class="nc-s-c-s3 ncg-list mt10">
          <div class="title pngFix"><span><a href="<?php echo urlShop('show_store', 'goods_all', array('store_id' => $_GET['store_id']));?>" class="more"><?php echo $lang['nc_more'];?></a></span>
            <h4><?php echo $lang['show_store_index_new_goods'];?></h4>
          </div>
          <div class="content pt20">
         
          </div>
        </div>
      </article>
      <aside class="nc-sidebar">
        <?php include template('store/info');?>
        <?php include template('store/left');?>
      </aside>
    </section>
  </article>
<!-- 引入幻灯片JS --> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.flexslider-min.js"></script> 
<!-- 绑定幻灯片事件 --> 
<script type="text/javascript">
	$(window).load(function() {
		$('.flexslider').flexslider();
	});
</script>
