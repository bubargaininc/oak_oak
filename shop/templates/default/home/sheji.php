<link rel="stylesheet" href="<?php echo SHOP_TEMPLATES_URL;?>/css/ks.css">
<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="content">
      <div class="seller mb10">
        <div class="inner1024 posr">
            <div class="seller-name"><?php echo $output['sheji_class']['sheji_name']?></div>
            <div class="seller-cat">设计师</div>
            <div class="seller-country"><?php echo $output['sheji_class']['sheji_count']?></div>
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
    <div class="inner clearfix designerstore">
        <div class="mstore designer-mstore bxsd">
            <div class="ds-banner">
                <div class="hd">
                    <ul>
                    </ul>
                </div>
                <div class="bd">
                    <ul>
                    <?php if(empty($output['sheji_class']['sheji_max_img'])){?>
                    
                        <li><img src="<?php echo UPLOAD_SITE_URL;?>/common/default_user_portrait.gif" /></li>
                        <?php }else{?>
                        <li><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND.'/'.$output['sheji_class']['sheji_max_img']; ?>" /></li>
                        <?php }?>
                    </ul>
                </div>
            </div><!--ds-banner-->
            <div class="minfo">
                <div class="">
                    <h3 class="title">品牌简介:</h3>
                    <p>
 <?php echo !empty($output['sheji_class']['sheji_brand_desc'])?$output['sheji_class']['sheji_brand_desc']:"暂无简介"?>
                    </p>
                    <div class="button clearfix">

                    <div href="javascript:;" class="ae-share ml15" style="display:none">
                        <div class="sharebox">
                            <div>分享到：</div>
                            <div class="sharebtn">
                                <a href="" class="ae-share-qq"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-share-qq.png" alt="">QQ</a>
                                <a href="" class="ae-share-sina"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-share-sina.png" alt="">微博</a>
                                <a href="" class="ae-share-weixin"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-share-weixin.png" alt="">微信</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="ppjj">
                    <h3 class="tit">设计师评价:</h3>
                    <ul>
                   <?php echo !empty($output['sheji_class']['sheji_desc'])?$output['sheji_class']['sheji_desc']:"暂无评价"?>
                    </ul>
                </div>
            </div>
        </div><!--mstore-->
       <?php if(!empty($output['goods_list']) && is_array($output['goods_list'])){?>
  <?php 

  foreach($output['goods_list'] as $value){?>
        <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>"></a></h1>
                <div class="meta">
                    <div><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>"><?php echo $value['goods_name'];?></a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <div class="price">
                <div class="original"><?php echo $lang['currency'].$value['goods_price'];?></div>
            </div>
            <a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>" class="cover hover"><img src="<?php echo thumb($value, 1280);?>" alt=""></a>
            <div class="ftr">
                <p class="info"><?php echo empty($value['goods_jingle'])?"没有填写":$value['goods_jingle']?></p>
                <div class="meta">
                    <span class="like">  <a href="javascript:collect_goods('<?php echo $output['goods']['goods_id']; ?>','count','goods_collect');"><i class="ae-like-on"></i>

          <em nctype="goods_collect"><?php echo $value['goods_collect']?></em></a></span> | 
                    <a class="listing" href=""><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
<!--            <i class="ae ae-new"></i>-->
        </div>

        <?php }?>
         <?php }?>
       
    </div><!---->
    <div class="inner">
        <div class="pagenav">
          <?php echo $output['show_page']; ?>
        </div>
    </div>
</div>