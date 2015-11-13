<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="content pdp-content">
    <div class="order-notice inner1024 pt10">
        <span class="posr">
            <span class="order-notice-content"><em class="bluetxt">消息：</em>您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></span>
            <a href="javascript:;" class="ae-order-notice has-notice"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/order/ae-order-notice.png" alt=""></a>
            <ul class="notice-sub">
                <li class="order-notice-content">您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></li>

            </ul>
        </span>
        <a href="<?php echo urlShop('goods','taolun',array('goods_id'=>$_GET['goods_id']));?>
        " class="goanyway"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/order/ae-order-go.png" alt="">讨论</a>
    </div>
    <div class="pdp-main clearfix inner">
        <div class="adpdp" ><?php echo loadadv(35);?></a>



        </div>
        <div class="detail bxsd clearfix">
            <div class="info-gallery">
                <div class="hd">
                    <ul>
                    </ul>
                </div>
                <div class="bd">
                    <ul>
                        <?php if (!empty($output['goods_image'])) {?>
                         <?php
                             foreach ($output['goods_image'] as $key => $value) {
                         ?>
                            <li><img src="<?php echo $value?>"></li>
                         <?php }?>
                  <?php }?>

                  
                    </ul>
                </div>
            </div>
            <div class="info-property ncs-goods-summary">



                <div class="info-title"><?php echo $output['goods']['goods_name']; ?></div>
                <div class="info-box info-volume"><span>


          <a href="javascript:collect_goods('<?php echo $output['goods']['goods_id']; ?>','count','goods_collect');"><i class="ae-like-on"></i>
          <em nctype="goods_collect"><?php echo $output['goods']['goods_collect']?></em></a>


                 </span><span>月销量： <?php echo $output['goods']['goods_salenum']; ?></span></div>
                <hr>
                <div class="info-box ">
<span class="info-t" style="float:left;">直邮方式：</span>
        <!-- S 物流运费 -->
        <div style="float:left">


            <?php if ($output['goods']['goods_transfee_charge'] == 1){?>
            <?php echo $lang['goods_index_freight'].$lang['nc_colon'];?>
            <?php }else{?>
            <!-- 如果买家承担运费 --> 
            <!-- 如果使用了运费模板 -->
            <?php if ($output['goods']['transport_id'] != '0'){?>
            <?php echo $lang['goods_index_trans_to'];?><a href="javascript:void(0)" id="ncrecive"><?php echo $lang['goods_index_trans_country'];?></a><?php echo $lang['nc_colon'];?>
            <div class="ncs-freight-box" id="transport_pannel">
              <?php if (is_array($output['area_list'])){?>
              <?php foreach($output['area_list'] as $k=>$v){?>
              <a href="javascript:void(0)" nctype="<?php echo $k;?>"><?php echo $v;?></a>
              <?php }?>
              <?php }?>
            </div>
            <?php }else{?>
            <?php echo $lang['goods_index_trans_zcountry'];?><?php echo $lang['nc_colon'];?>
            <?php }?>
            <?php }?>
         </div>



            </div>
                <div class="info-box "><span class="info-t">市场价：</span><span class="de"><?php echo $lang['currency'].$output['goods']['goods_marketprice'];?></span></div>
                <div class="info-box info-price"><span class="info-t">价格：</span><span class="nowrmb"><i class="rmb"><?php echo $lang['currency']?></i>
                <?php echo $output['goods']['goods_price'];?></span><span class="drmb">（ <?php echo $output['goods']['goods_ouprice'];?>€ ）</span><a href="<?php echo $output['goods']['goods_oulink'];?>" target="_blank" class="btn-bijia">去欧洲市场比价</a></div>
                <hr>
                <div class="info-box "><span class="info-t"  style="float:left">运费参考：</span>
          <div id="transport_price" style="float:left">
            <?php if($output['group']) { ?>
            <span><?php echo $lang['goods_index_groupbuy_no_shipping_fee'];?></span>
            <?php } else { ?>
            <?php if ($output['goods']['goods_freight'] == 0){?>
            <?php echo $lang['goods_index_trans_for_seller'];?>
            <?php }else{?>
            <!-- 如果买家承担运费 --> 
            <span>运费<?php echo $lang['nc_colon'];?><em id="nc_kd"><?php echo $output['goods']['goods_freight'];?></em><?php echo $lang['goods_index_yuan'];?></span>
            <?php }?>
            <?php }?>
          </div>



          <dd style="color:red;display:none" id="loading_price">loading.....</dd>

                </div>





                <div class="info-box info-num clearfix">
                    <span class="info-t fl db">订购数量：</span>
                    <span class="numbox db"> <input type="text" name="" id="quantity" value="1" size="3" maxlength="6" class="text w30"></span>
                    <span class="add-subtract db">
                        <a class="add-order-num increase" href="javascript:void(0)">+</a>
                        <a class="subtract-order-num decrease" href="javascript:void(0)">-</a>
                    </span>
                    <span class="orangetxt fl"> <em>(<?php echo $lang['goods_index_stock'];?><strong nctype="goods_stock"><?php echo $output['goods']['goods_storage']; ?></strong><?php echo $lang['nc_jian'];?>)</em></span>
                </div>
<?php if($output['goods']['goods_state'] == 1 && $output['goods']['goods_verify'] == 1){?>
                <div class="info-box info-type ncs-key" style="height:auto;width:100%">
        <!-- S 商品规格值-->
        <?php if (is_array($output['goods']['spec_name'])) { ?>
        <?php foreach ($output['goods']['spec_name'] as $key => $val) {?>

        <dl nctype="nc-spec">
          <dt  style="padding:0px;height:40px;font-size:14px;line-height:40px;width:80px;text-align:left"><?php echo $val;?><?php echo $lang['nc_colon'];?></dt>
          <dd style="width:auto;">
            <?php if (is_array($output['goods']['spec_value'][$key]) and !empty($output['goods']['spec_value'][$key])) {?>
            <ul nctyle="ul_sign">
              <?php foreach($output['goods']['spec_value'][$key] as $k => $v) {?>
              <?php if( $key == 1 ){?>
              <!-- 图片类型规格-->
              <li class="sp-img"><a href="javascript:void(0);" class="<?php if (isset($output['goods']['goods_spec'][$k])) {echo 'hovered';}?>" data-param="{valid:<?php echo $k;?>}" title="<?php echo $v;?>"><img src="<?php echo $output['spec_image'][$k];?>"/><i></i></a></li>
              <?php }else{?>
              <!-- 文字类型规格-->
              <li class="sp-txt"><a href="javascript:void(0)" class="<?php if (isset($output['goods']['goods_spec'][$k])) { echo 'hovered';} ?>" data-param="{valid:<?php echo $k;?>}"><?php echo $v;?><i></i></a></li>
              <?php }?>
              <?php }?>
            </ul>
            <?php }?>
          </dd>
        </dl>
        <?php }?>
        <?php }?>
        <!-- E 商品规格值-->
                </div>
                
      <div class="ncs-key"> 
 

        
        <!-- S 购买按钮 -->
        <div class="ncs-btn"><!-- S 提示已选规格及库存不足无法购买 -->
          <div nctype="goods_prompt" class="ncs-point">
            <?php if (!empty($output['goods']['goods_spec'])) {?>
            <span class="yes"><?php echo $lang['goods_index_you_choose'];?> <strong><?php echo implode($lang['nc_comma'], $output['goods']['goods_spec']);?></strong></span>
            <?php }?>
            <?php if ($output['goods']['goods_storage'] <= 0) {?>
            <span class="no"><i class="icon-exclamation-sign"></i>&nbsp;<?php echo $lang['goods_index_understock_prompt'];?></span>
            <?php }?>
          </div>
          <!-- E 提示已选规格及库存不足无法购买 --> 
          <!-- 立即购买--> 
          <a href="javascript:void(0);" nctype="buynow_submit" class="buynow <?php if ($output['goods']['goods_storage'] <= 0) {?>no-buynow<?php }?>" title="<?php echo $lang['goods_index_now_buy'];?>"><?php echo $lang['goods_index_now_buy'];?></a> 
          <?php if ($output['goods']['promotion_type'] != 'groupbuy') {?>
          <!-- 加入购物车-->
          <a href="javascript:void(0);" nctype="addcart_submit" class="addcart <?php if ($output['goods']['goods_storage'] <= 0) {?>no-addcart<?php }?>" title="<?php echo $lang['goods_index_add_to_cart'];?>"><i class="icon-shopping-cart"></i><?php echo $lang['goods_index_add_to_cart'];?></a>
          <?php } ?>



          <!-- S 加入购物车弹出提示框 -->
          <div class="ncs-cart-popup">
            <dl>
              <dt><?php echo $lang['goods_index_cart_success'];?><a title="<?php echo $lang['goods_index_close'];?>" onClick="$('.ncs-cart-popup').css({'display':'none'});">X</a></dt>
              <dd><?php echo $lang['goods_index_cart_have'];?> <strong id="bold_num"></strong> <?php echo $lang['goods_index_number_of_goods'];?> <?php echo $lang['goods_index_total_price'];?><?php echo $lang['nc_colon'];?><em id="bold_mly" class="saleP"></em></dd>
              <dd class="btns"><a href="javascript:void(0);" class="ncs-btn-mini ncs-btn-green" onClick="location.href='<?php echo SHOP_SITE_URL.DS?>index.php?act=cart'"><?php echo $lang['goods_index_view_cart'];?></a> <a href="javascript:void(0);" class="ncs-btn-mini" value="" onClick="$('.ncs-cart-popup').css({'display':'none'});"><?php echo $lang['goods_index_continue_shopping'];?></a></dd>
            </dl>
          </div>
          <!-- E 加入购物车弹出提示框 -->

        </div>
        <!-- E 购买按钮 -->
   
      </div>
      <?php }else{?>
      <div class="ncs-saleout">
      <dl>
        <dt><i class="icon-info-sign"></i><?php echo $lang['goods_index_is_no_show'];?></dt>
        <dd><?php echo $lang['goods_index_is_no_show_message_one'];?></dd>
        <dd><?php echo $lang['goods_index_is_no_show_message_two_1'];?>&nbsp;<a href="<?php echo urlShop('show_store', 'index', array('store_id'=>$output['goods']['store_id']), $output['store_info']['store_domain']);?>" class="ncs-btn-mini"><?php echo $lang['goods_index_is_no_show_message_two_2'];?></a>&nbsp;<?php echo $lang['goods_index_is_no_show_message_two_3'];?> </dd>
      </dl></div>
      <?php }?>
      <!--E 商品信息 --> 


                <div style="clear:both;">
                    <a href="" class="ae-dd-weixin">
                        <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-qcode.png" alt="">
                    </a>
                    <a href="" class="ae-dd-joinyy"></a>
                    <a href="" class="ae-dd-share"></a>
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
    </div>
  <div class="inner expanded mt28"  id="content">
    <div  id="main-nav-holder">
      <div class="ncs-promotion" style="display: none;">
        <div class="ncs-goods-title-nav">
          <ul>
            <li class="current"><a href="javascript:void(0);">优惠套装</a></li>
          </ul>
        </div>
        <div class="ncs-goods-info-content"><!--S 组合销售 -->
          <div class="ncs-bundling" id="nc-bundling"> </div>
          <!--E 组合销售 --></div>
      </div>
      <nav class="tabbar pngFix" id="main-nav" style="width:100%;">
        <div class="ncs-goods-title-nav">
          <ul id="categorymenu">
            <li class="current"><a id="tabGoodsIntro" href="#content"><?php echo $lang['goods_index_goods_info'];?></a></li>
            <li><a id="tabGoodsRate" href="#content"><?php echo $lang['goods_index_evaluation'];?></a></li>
            <li><a id="tabGoodsTraded" href="#content"><?php echo $lang['goods_index_sold_record'];?></a></li>
            <li><a id="tabGuestbook" href="#content"><?php echo $lang['goods_index_goods_consult'];?></a></li>
          </ul>

        </div>
      </nav>
      <div class="ncs-intro">
        <div class="content bd" id="ncGoodsIntro"> 
          
          <!--S 满就送 -->
          <?php if($output['mansong_info']) { ?>
          <div class="nc-mansong">
            <div class="nc-mansong-ico"></div>
            <dl class="nc-mansong-content">
              <dt><?php echo $output['mansong_info']['mansong_name'];?>
                <time>( <?php echo $lang['nc_promotion_time'];?><?php echo $lang['nc_colon'];?><?php echo date('Y/m/d',$output['mansong_info']['start_time']).'--'.date('Y/m/d',$output['mansong_info']['end_time']);?> )</time>
              </dt>
              <dd>
                <?php foreach($output['mansong_info']['rules'] as $rule) { ?>
                <span><?php echo $lang['nc_man'];?><em><?php echo ncPriceFormat($rule['price']);?></em><?php echo $lang['nc_yuan'];?>
                <?php if(!empty($rule['discount'])) { ?>
                ， <?php echo $lang['nc_reduce'];?><i><?php echo ncPriceFormat($rule['discount']);?></i><?php echo $lang['nc_yuan'];?>
                <?php } ?>
                <?php if(!empty($rule['goods_id'])) { ?>
                ， <?php echo $lang['nc_gift'];?> <a href="<?php echo $rule['goods_url'];?>" title="<?php echo $rule['mansong_goods_name'];?>" target="_blank"> <img src="<?php echo cthumb($rule['goods_image'], 60);?>" alt="<?php echo $rule['mansong_goods_name'];?>"> </a>&nbsp;。
                <?php } ?>
                </span>
                <?php } ?>
              </dd>
              <dd class="nc-mansong-remark"><?php echo $output['mansong_info']['remark'];?></dd>
            </dl>
          </div>
          <?php } ?>
          <!--E 满就送 -->
          <?php if(is_array($output['goods']['goods_attr']) || isset($output['goods']['brand_name'])){?>
          <ul class="nc-goods-sort">
            <li>商家货号：<?php echo $output['goods']['goods_serial'];?></li>
            <?php if(isset($output['goods']['brand_name'])){echo '<li>'.$lang['goods_index_brand'].$lang['nc_colon'].$output['goods']['brand_name'].'</li>';}?>
            <?php if(is_array($output['goods']['goods_attr']) && !empty($output['goods']['goods_attr'])){?>
            <?php foreach ($output['goods']['goods_attr'] as $val){ $val= array_values($val);echo '<li>'.$val[0].$lang['nc_colon'].$val[1].'</li>'; }?>
            <?php }?>
          </ul>
          <?php }?>
          <div class="ncs-goods-info-content">
            <?php if (isset($output['plate_array'][1])) {?>
            <div class="top-template"><?php echo $output['plate_array'][1][0]['plate_content']?></div>
            <?php }?>
            <div class="default"><?php echo $output['goods']['goods_body']; ?></div>
            <?php if (isset($output['plate_array'][0])) {?>
            <div class="bottom-template"><?php echo $output['plate_array'][0][0]['plate_content']?></div>
            <?php }?>
          </div>
        </div>
      </div>
      <div class="ncs-comment">
        <div class="ncs-goods-title-bar hd">
          <h4><a href="javascript:void(0);"><?php echo $lang['goods_index_evaluation'];?></a></h4>
        </div>
        
        <div class="ncs-goods-info-content bd" id="ncGoodsRate">
            <div class="top">
                <div class="rate">
                    <p><strong><?php echo $output['goods_evaluate_info']['good_percent'];?></strong><sub>%</sub>好评</p>
              <span>共有<?php echo $output['goods_evaluate_info']['all'];?>人参与评分</span></div>
            <div class="percent">
              <dl>
                <dt>好评<em>(<?php echo $output['goods_evaluate_info']['good_percent'];?>%)</em></dt>
                <dd><i style="width: <?php echo $output['goods_evaluate_info']['good_percent'];?>%"></i></dd>
              </dl>
              <dl>
                <dt>中评<em>(<?php echo $output['goods_evaluate_info']['normal_percent'];?>%)</em></dt>
                <dd><i style="width: <?php echo $output['goods_evaluate_info']['normal_percent'];?>%"></i></dd>
              </dl>
              <dl>
                <dt>差评<em>(<?php echo $output['goods_evaluate_info']['bad_percent'];?>%)</em></dt>
                <dd><i style="width: <?php echo $output['goods_evaluate_info']['bad_percent'];?>%"></i></dd>
              </dl>
            </div>
            <div class="btns"><span>您可对已购商品进行评价</span>
              <p><a href="<?php echo urlShop('member_order', 'index');?>" class="ncs-btn ncs-btn-red" target="_blank"><i class="icon-comment-alt"></i>评价商品</a></p>
            </div>
          </div>
          <div class="ncs-goods-title-nav">
        <ul id="comment_tab">
            <li data-type="all" class="current"><a href="javascript:void(0);"><?php echo $lang['goods_index_evaluation'];?>(<?php echo $output['goods_evaluate_info']['all'];?>)</a></li>
            <li data-type="1"><a href="javascript:void(0);">好评(<?php echo $output['goods_evaluate_info']['good'];?>)</a></li>
            <li data-type="2"><a href="javascript:void(0);">中评(<?php echo $output['goods_evaluate_info']['normal'];?>)</a></li> 
            <li data-type="3"><a href="javascript:void(0);">差评(<?php echo $output['goods_evaluate_info']['bad'];?>)</a></li>
        </ul></div>
          <!-- 商品评价内容部分 -->
          <div id="goodseval" class="ncs-commend-main"></div>
        </div>
      </div>
      <div class="ncg-salelog">
        <div class="ncs-goods-title-bar hd">
         <h4><a href="javascript:void(0);"><?php echo $lang['goods_index_sold_record'];?></a></h4>
        </div>
        <div class="ncs-goods-info-content bd" id="ncGoodsTraded">
          <div class="top">
            <div class="price"><?php echo $lang['goods_index_goods_price'];?><strong><?php echo $output['goods']['goods_price'];?></strong><?php echo $lang['goods_index_yuan'];?><span><?php echo $lang['goods_index_price_note'];?></span></div>
          </div>
          <!-- 成交记录内容部分 -->
          <div id="salelog_demo" class="ncs-goods-title-bar"></div>
        </div>
      </div>
      <div class="ncs-consult">
        <div class="ncs-goods-title-bar hd">
          <h4><a href="javascript:void(0);"><?php echo $lang['goods_index_goods_consult'];?></a></h4>
        </div>
        <div class="ncs-goods-info-content bd" id="ncGuestbook"> 
          <!-- 咨询留言内容部分 -->
          <div class="ncs-guestbook">
            <div id="cosulting_demo" class="ncs-loading"> </div>
          </div>
        </div>
      </div>

    </div>
        
    </div>


<style type="text/css">
  #goodseval .pr{
    display: none;

  }
</style>
        <!--attributes-list-->


<div style="display:none">
    <div class="inner mt28 ">
        <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/pdp/1.png" alt="">
    </div>
    <div class="inner mt28 bd2">
        <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/pdp/2.png" alt="">
    </div>
    <div class="inner mt28 bd2 htit">
        <div class="tit">产品信息：</div>
        <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/pdp/3.png" alt="">
    </div>
    <div class="inner mt28 bd2 htit">
        <div class="tit">营养成分：</div>
        <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/pdp/4.png" alt="">
    </div>
    <div class="inner mt28 bd2 htit">
        <div class="tit">商品特点：</div>
        <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/pdp/5.png" alt="">
    </div>

    <div class="inner mt28 bd2 htit">
        <div class="tit">关于生产：</div>
        <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/pdp/6.png" alt="">
    </div>
    <div class="inner mt28 bd2 htit">
        <div class="tit">关于物流：</div>
        <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/pdp/7.png" alt="">
    </div>
    <div class="inner mt28 bd2 htit">
        <div class="tit">商品认证：</div>
        <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/pdp/8.png" alt="">
    </div>

    <div class="inner mt28 bd2 htit">
        <div class="tit">安全标准：</div>
        <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/pdp/9.png" alt="">
    </div>
        </div>
    <div class="inner clearfix mt28 bxsd recommend">
        <h2 class="title">推荐商品：</h2>
        <p class="opensans met">YOU MIGHT ALSO BE INSTERESTED ABOUT</p>

      <?php 
      foreach($output['goods_commend'] as $goods_commend){?>
            <?php if($output['goods']['goods_id'] != $goods_commend['goods_id']){?>        
        <div class="product">
            <div class="hdr">
                <h1 class="tit">
                <a href="<?php echo urlShop('goods', 'index', array('goods_id' => $goods_commend['goods_id']));?>"><?php echo $goods_commend['goods_name'];?></a></h1>

                <div class="meta">
                    <div><a href=""><?php echo $goods_commend['brand_name']?></a></div>
                        <div><a href=""><?php echo $goods_commend['store_name']?></a></div>
                    <em class="flag"><img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$goods_commend['goods_count']);?>" alt=""></em>
                </div>
            </div>
            <div class="price">
                <div class="original"><?php echo $lang['currency'];?><?php echo $goods_commend['goods_price'];?></div>
            </div>
            <a href="<?php echo urlShop('goods', 'index', array('goods_id' => $goods_commend['goods_id']));?>" class="cover hover" target="_blank"><img src="<?php echo thumb($goods_commend, 240);?>" alt=""></a>
            <div class="ftr">
                <p class="info"><?php echo $goods_commend['goods_jingle']?> </p>
                <div class="meta">
                    <span class="like">0<i class="ae-like"></i></span> | 
                    <a class="listing" href=""><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div>
    
            <?php }?>
            <?php }?>



    </div><!--recommend-->
    <div class="oxabout mt28 bdtb2 tc">
        <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/pdp/11.png" alt="">
    </div>
</div>

<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/qtip/jquery.qtip.min.js"></script>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/qtip/jquery.qtip.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/home_goods.css" rel="stylesheet" type="text/css">
<style type="text/css">
.ncs-goods-picture .levelB, .ncs-goods-picture .levelC {
cursor: url(<?php echo SHOP_TEMPLATES_URL;
?>/images/shop/zoom.cur), pointer;
}
.ncs-goods-picture .levelD {
cursor: url(<?php echo SHOP_TEMPLATES_URL;
?>/images/shop/hand.cur), move\9;
}
</style>


</div>
<form id="buynow_form" method="post" action="<?php echo SHOP_SITE_URL;?>/index.php">
  <input id="act" name="act" type="hidden" value="buy" />
  <input id="op" name="op" type="hidden" value="buy_step1" />
  <input id="cart_id" name="cart_id[]" type="hidden"/>
</form>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.charCount.js"></script> 
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.ajaxContent.pack.js" type="text/javascript"></script> 
<script src="<?php echo RESOURCE_SITE_URL;?>/js/sns.js" type="text/javascript" charset="utf-8"></script> 
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.F_slider.js" type="text/javascript" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/waypoints.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.raty/jquery.raty.min.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.nyroModal/custom.min.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.poshytip.min.js" charset="utf-8"></script>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/jquery.nyroModal/styles/nyroModal.css" rel="stylesheet" type="text/css" id="cssfile2" />

<script>
    //收藏分享处下拉操作
    jQuery.divselect = function(divselectid,inputselectid) {
      var inputselect = $(inputselectid);
      $(divselectid).mouseover(function(){
          var ul = $(divselectid+" ul");
          ul.slideDown("fast");
          if(ul.css("display")=="none"){
              ul.slideDown("fast");
          }
      });
      $(divselectid).live('mouseleave',function(){
          $(divselectid+" ul").hide();
      });
    };
$(function(){
    // 加入购物车
    $('a[nctype="addcart_submit"]').click(function(){
        addcart(<?php echo $output['goods']['goods_id'];?>, checkQuantity());
    });
    // 立即购买
    $('a[nctype="buynow_submit"]').click(function(){
        buynow(<?php echo $output['goods']['goods_id']?>,checkQuantity());
    });

    //浮动导航  waypoints.js
    $('#main-nav').waypoint(function(event, direction) {
        $(this).parent().parent().parent().toggleClass('sticky', direction === "down");
        event.stopPropagation();
    });

    // 分享收藏下拉操作
    $.divselect("#handle-l");
    $.divselect("#handle-r");

    // 规格选择
    $('dl[nctype="nc-spec"]').find('a').each(function(){
        $(this).click(function(){
            if ($(this).hasClass('hovered')) {
                return false;
            }
            $(this).parents('ul:first').find('a').removeClass('hovered');
            $(this).addClass('hovered');
            checkSpec();
        });
    });

});

function checkSpec() {
    var spec_param = <?php echo $output['spec_list'];?>;
    var spec = new Array();
    $('ul[nctyle="ul_sign"]').find('.hovered').each(function(){
        var data_str = ''; eval('data_str =' + $(this).attr('data-param'));
        spec.push(data_str.valid);
    });
    spec1 = spec.sort(function(a,b){
        return a-b;
    });
    var spec_sign = spec1.join('|');
    $.each(spec_param, function(i, n){
        if (n.sign == spec_sign) {
            window.location.href = n.url;
        }
    });
}

// 验证购买数量
function checkQuantity(){
    var quantity = parseInt($("#quantity").val());
    if (quantity < 1) {
        alert("<?php echo $lang['goods_index_pleaseaddnum'];?>");
        $("#quantity").val('1');
        return false;
    }
    max = parseInt($('[nctype="goods_stock"]').text());
    if(quantity > max){
        alert("<?php echo $lang['goods_index_add_too_much'];?>");
        return false;
    }
    return quantity;
}

// 规格页面跳转
// function 

// 立即购买js
function buynow(goods_id,quantity){
<?php if ($_SESSION['is_login'] !== '1'){?>
	login_dialog();
<?php }else{?>
    if (!quantity) {
        return;
    }
    $("#cart_id").val(goods_id+'|'+quantity);
    $("#buynow_form").submit();
<?php }?>
}
$(function(){
    //选择地区查看运费
    $('#transport_pannel>a').click(function(){
    	var id = $(this).attr('nctype');
    	if (id=='undefined') return false;
    	var _self = this,tpl_id = '<?php echo $output['goods']['transport_id'];?>';
	    var url = 'index.php?act=goods&op=calc&rand='+Math.random();
	    $('#transport_price').css('display','none');
	    $('#loading_price').css('display','');
	    $.getJSON(url, {'id':id,'tid':tpl_id}, function(data){
	    	if (data == null) return false;
	        if(data != 'undefined') {$('#nc_kd').html(data);}else{$('#nc_kd').html('');}
	        $('#transport_price').css('display','');
	    	$('#loading_price').css('display','none');
	        $('#ncrecive').html($(_self).html());
	    });
    });
    <?php if($output['goods']['goods_show'] == '1'){?>
    $("#nc-bundling").load('index.php?act=goods&op=get_bundling&goods_id=<?php echo $output['goods']['goods_id'];?>&store_id=<?php echo $output['goods']['store_id'];?>', function(){
        if($(this).html() != '') {
            $(this).parents('.ncs-promotion:first').show();
        }
    });
    <?php }?>
    $("#salelog_demo").load('index.php?act=goods&op=salelog&goods_id=<?php echo $output['goods']['goods_id'];?>&store_id=<?php echo $output['goods']['store_id'];?>', function(){
        // Membership card
        $(this).find('[nctype="mcard"]').membershipCard({type:'shop'});
    });
	$("#cosulting_demo").load('index.php?act=goods&op=cosulting&goods_id=<?php echo $output['goods']['goods_id'];?>&store_id=<?php echo $output['goods']['store_id'];?>', function(){
		// Membership card
		$(this).find('[nctype="mcard"]').membershipCard({type:'shop'});
	});
});

/** goods.php **/
$(function(){	
	// 商品内容部分折叠收起侧边栏控制
	$('#fold').click(function(){
  		$('.ncs-goods-layout').toggleClass('expanded');
	});
	// 商品内容介绍Tab样式切换控制
	$('#categorymenu').find("li").click(function(){
		$('#categorymenu').find("li").removeClass('current');
		$(this).addClass('current');
	});
	// 商品详情默认情况下显示全部
	$('#tabGoodsIntro').click(function(){
		$('.bd').css('display','');
		$('.hd').css('display','');	
	});
	// 点击评价隐藏其他以及其标题栏
	$('#tabGoodsRate').click(function(){
		$('.bd').css('display','none');
		$('#ncGoodsRate').css('display','');
		$('.hd').css('display','none');
	});
	// 点击成交隐藏其他以及其标题
	$('#tabGoodsTraded').click(function(){
		$('.bd').css('display','none');
		$('#ncGoodsTraded').css('display','');
		$('.hd').css('display','none');
	});
	// 点击咨询隐藏其他以及其标题
	$('#tabGuestbook').click(function(){
		$('.bd').css('display','none');
		$('#ncGuestbook').css('display','');
		$('.hd').css('display','none');
	});
	//商品排行Tab切换
	$(".ncs-top-tab > li > a").mouseover(function(e) {
		if (e.target == this) {
			var tabs = $(this).parent().parent().children("li");
			var panels = $(this).parent().parent().parent().children(".ncs-top-panel");
			var index = $.inArray(this, $(this).parent().parent().find("a"));
			if (panels.eq(index)[0]) {
				tabs.removeClass("current ").eq(index).addClass("current ");
				panels.addClass("hide").eq(index).removeClass("hide");
			}
		}
	});
	//信用评价动态评分打分人次Tab切换
	$(".ncs-rate-tab > li > a").mouseover(function(e) {
		if (e.target == this) {
			var tabs = $(this).parent().parent().children("li");
			var panels = $(this).parent().parent().parent().children(".ncs-rate-panel");
			var index = $.inArray(this, $(this).parent().parent().find("a"));
			if (panels.eq(index)[0]) {
				tabs.removeClass("current ").eq(index).addClass("current ");
				panels.addClass("hide").eq(index).removeClass("hide");
			}
		}
	});
		
//触及显示缩略图	
	$('.goods-pic > .thumb').hover(
		function(){
			$(this).next().css('display','block');
		},
		function(){
			$(this).next().css('display','none');
		}
	);
	
	/* 商品购买数量增减js */
	// 增加
	$('.increase').click(function(){
		num = parseInt($('#quantity').val());
	    <?php if (!empty($output['goods']['upper_limit'])) {?>
	    max = <?php echo $output['goods']['upper_limit'];?>;
	    if(num >= max){
	        alert('最多限购'+max+'件');
	        return false;
	    }
	    <?php } ?>
		max = parseInt($('[nctype="goods_stock"]').text());
		if(num < max){
			$('#quantity').val(num+1);
		}
	});
	//减少
	$('.decrease').click(function(){
		num = parseInt($('#quantity').val());
		if(num > 1){
			$('#quantity').val(num-1);
		}
	});
	
	// 搜索价格不能填写非数字。
	var re = /^[1-9]+[0-9]*(\.\d*)?$|^0(\.\d*)?$/;
	$('input[name="start_price"]').change(function(){
		if(!re.test($(this).val())){
			$(this).val('');
		}
	});
	$('input[name="end_price"]').change(function(){
		if(!re.test($(this).val())){
			$(this).val('');
		}
	});
});

/* add cart */
function addcart(goods_id, quantity)
{
	if (!quantity) return false;
    var url = 'index.php?act=cart&op=add';
    $.getJSON(url, {'goods_id':goods_id, 'quantity':quantity}, function(data){
    	if(data != null){
    		if (data.state)
            {
                $('#bold_num').html(data.num);
                $('#bold_mly').html(price_format(data.amount));
                $('.ncs-cart-popup').fadeIn('fast');
//                 setTimeout(slideUp_fn, 5000);
                // 头部加载购物车信息
                load_cart_information();
            }
            else
            {
                alert(data.msg);
            }
    	}
    });
}
// 显示举报下拉链接
$(document).ready(function() {
	$(".ncs-inform").hover(function() {
		$(this).addClass("hover");
	},
	function() {
		$(this).removeClass("hover");
	});
})

//评价列表
$(document).ready(function(){
    $('#comment_tab').on('click', 'li', function() {
        $('#comment_tab li').removeClass('current');
        $(this).addClass('current');
        load_goodseval($(this).attr('data-type'));
    });

    load_goodseval('all');

    function load_goodseval(type) {
        var url = '<?php echo urlShop('goods', 'comments', array('goods_id' => $output['goods']['goods_id']));?>';
        url += '&type=' + type;
        $("#goodseval").load(url, function(){
            $(this).find('[nctype="mcard"]').membershipCard({type:'shop'});
        });
    }
});
</script> 
