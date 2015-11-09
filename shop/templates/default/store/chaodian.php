<div class="content">
    <div class="seller mb10">
        <div class="inner1024 posr">

            <div class="seller-name"><?php echo $output['store_info']['store_name'] ?></div>
            <div class="seller-cat">欧洲潮流</div>
            <div class="seller-country"><?php echo $output['store_info']['store_address']?></div>
        </div>
    </div>
    
    <div class="order-notice notice inner1024">
        <span class="posr">
            <span class="order-notice-content"><em class="bluetxt">消息：</em>您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></span>
            <a href="javascript:;" class="ae-order-notice has-notice"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/order/ae-order-notice.png" alt=""></a>
            <ul class="notice-sub">
                <li class="order-notice-content">您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></li>
            </ul>
        </span>
        <a href="<?php echo urlShop('show_store','taolun',array('store_id'=>$output['store_info']['store_id']));?>" class="goanyway"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/order/ae-order-go.png" alt="">讨论</a>
    </div>
    <div class="inner clearfix">
        <div class="mstore designer-mstore brandpage-mstore bxsd">
            <div class="ds-banner">
                <div class="hd">
                    <ul>
                    </ul>
                </div>
                <div class="bd">
                    <ul>
                    <?php
                     if(empty($output['store_info']['store_logo'])){?>
                        <li><img src="<?php echo getMemberAvatar($output['member']['member_avatar']); ?>" /></li>
                    <?php }else{?>
                        <li><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND.'/'.$output['store_info']['store_logo']; ?>">/li>
                    <?php }?>   
                    </ul>
                </div>
            </div><!--ds-banner-->
            <div class="minfo">
                <div class="">

                    <h3 class="title">商店简介：</h3>
                    <p style="height:120px;width:100%;overflow:hidden">
                        <?php echo empty($output['store_info']['store_text'])?"暂无简介":$output['store_info']['store_text']?>
                    </p>
                    <div class="button clearfix">
                    <a href="javascript:collect_store(<?php echo $output['store_info']['store_id']?>,'count','store_collect')" class="ae-likenum mr15"><?php echo $output['store_info']['store_collect'];?></a>
                    <a href="javascript:;" class="ae-taik-seler ml15 mr15"><div class="qcode"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-qcode.png" alt=""></div></a>
                    <div href="javascript:;" class="ae-share ml15">
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
                    <h3 class="tit">商店讨论:</h3>
                    <ul>
                   <?php echo empty($output['store_info']['store_ping'])?"暂无讨论":$output['store_info']['store_ping']?>
                        
                    </ul>
                </div>
            </div>
        </div><!--mstore-->
    <?php          if(!empty($output['new_goods_list']) && is_array($output['new_goods_list'])){?>
  <?php foreach($output['new_goods_list'] as $value){?>
        <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['store_id']));?>"><?php echo $value['goods_name'];?></a></h1>
                <div class="meta">
                    <div class="tc"><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>"><?php echo $value['store_name']?></a></div>
                    <em class="flag"><img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$value['goods_count']);?>" alt=""></em>
                </div>
            </div>
            <div class="price">
                <div class="original"><?php echo $lang['currency'].$value['goods_price'];?></div>
            </div>

            <a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>" class="cover hover"><img src="<?php echo thumb($value, 233);?>" alt=""></a>

                <div class="ftr">
                <p class="info"><?php echo $value['goods_jingle']?> </p>
                   <div class="meta">
                    <span class="like"><a href="javascript:collect_goods('<?php echo $value['goods_id']; ?>','count','goods_collect');"><em nctype="goods_collect">
                    <?php echo $value['goods_collect']?></em><i class="ae-like"></i></a></span>|
                    <a class="listing" href="javascript:collect_yuan('<?php echo $value['goods_id']; ?>','count','goods_collect');">
          <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div> 
     <?php }?>
            <?php }else{?>
           <div class="squares" nc_type="current_display_mode">
    <div id="no_results" class="no-results"><i></i>没有找到符合条件的商品</div>
  </div>
            <?php }?>

        
    </div><!---->
    <div class="inner">
        <div class="pagenav">
            <a href="" class="prev dis">上一页</a>
            <a href="" class="on ins">1</a>
            <a href="" class="next">下一页</a>
        </div>
    </div>
</div>

<style type="text/css">
    .no-results {
    color: #AAA;
    padding: 200px 0;
    text-align: center;
}
</style>