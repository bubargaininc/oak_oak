<?php defined('InShopNC') or exit('Access Invalid!');?>
<link type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jcarousel/skins/tango/skin.css" rel="stylesheet" >

<style type="text/css">
.path {
	display: none;
}
.fd-media .goodsinfo dt {
	width: 300px;
}
</style>
<div class="order-cart order-contenti order-receipt">
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css">

            <h3 class="order-tit clearfix">
                <div class="order-tit-commodity">商品信息</div>
                <div class="order-tit-price tr"><span class="pr20">数量</span></div>
                <div class="order-tit-operation"><span class="pl20 order-price-show">价格</span><span class=""><div class="icheckbox_minimal-orange" style="position: relative;"></div>操作</span></div>
            </h3>
            <div class="order-receipt-list">
                           
           <div class="order-shop">
<div style="display:none">
  
      <span class="mr50 ml15">下单时间：<time>2015-10-23 09:30:41</time></span>

        <span>在线支付金额：<em>￥0.10</em></span>
        <a class="ncu-btn7 fr mr15" href="index.php?act=buy&amp;op=pay&amp;pay_sn=930498907841812001">订单支付</a></div>

                                     <div class="order-shop-tit clearfix">
                        <div class="order-shop-commodity fl">
                            <span class="shop-name mr25">店铺：<a href="http://www.shopnc.ueo/shop/index.php?act=show_store&amp;op=index&amp;store_id=8" target="_blank">beodile</a></span>
                        </div>
                        <div class="order-shop-operation fr">
                        </div>
                    </div>
                
                                        <ul class="order-shop-good-list clearfix">

                                        <?php foreach ($output['goods'] as $key => $value) {?>
                                  
                        <li class="order-shop-good clearfix">
                            <div class="osg-content  clearfix">
                            <!--商品名称-->
                                <div class="osg-tit"><a href="index.php?act=member_order&amp;op=show_order&amp;order_id=7" target="_blank"><?php echo $value['goods']['goods_name'];?></a></div>
                             <!--商品图片-->  
                                <div class="osg-pic-price">
                                
                                    <div class="osg-pic">
                                        <a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods']['goods_id']));?>" taregte="_blank">
                                            <img src="<?php echo cthumb($value['goods']['goods_image'], 233);?>" alt="">
                                        </a>
                                    </div>
                                    <div class="osg-num-operation" style="text-align:right;">1</div>
                                </div>


                                <div class="osg-operation">
                                    <div class="order-price-show-con fz16 vat">
                                        <span class="price"><?php echo $lang['currency'].$value['goods']['goods_price'];?></span>
                                    </div>
                                    <div class="osg-check-operation">
                                       
                                        <div class="order_ding">
                                       <a class="ncu-btn7 fr mr15" target="_blank" href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods']['goods_id']));?>">查看</a>
                 
                                        </div>
                                    </div>
                                </div>
                            </div><!--osg-content-->
                        </li><!--order-shop-good-->


                        <?php }?>
                    </ul>
                                    </div>

                                                    <div class="order-pagenavi">


<?php if($output['goods']) { ?>
    <div class="pagination"> <?php echo $output['show_page']; ?> </div>
    <?php } ?>

                </div>


        </div>


<style type="text/css">
.store-name {
  width: 130px;
  display: inline-block;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
</style>


