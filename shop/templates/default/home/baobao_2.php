<link rel="stylesheet" href="<?php echo SHOP_TEMPLATES_URL;?>/css/ks.css">
<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="content order-content">
    <div class="order-menu baby-menu">
        <div class="inner1024 clearfix">
            <ul>
                <li class="fz18"><a href="">宝宝秀</a></li>
                <li class="<?php echo $output['status']=='1'?'on':'';?>"><a href="<?php echo urlShop('category', 'baobao',array('status'=>1));?>">正在进行</a></li>
                <li class="<?php echo $output['status']=='2'?'on':'';?>"><a href="<?php echo urlShop('category', 'baobao',array('status'=>2));?>">已经结束</a></li>
                <li class="<?php echo $output['status']=='3'?'on':'';?>"><a href="<?php echo urlShop('category', 'baobao',array('status'=>3));?>">奖牌榜</a></li>
                <li class="<?php echo $output['status']=='4'?'on':'';?>"><a href="<?php echo urlShop('category', 'baobao',array('status'=>4));?>">参加规则</a></li>
            </ul>
        </div>
    </div>
 <div class="order-notice baby-notice inner1024">

        <div class="baby-info">
  <?php if($_SESSION['is_login'] == '1'){?>
            <a href="<?php echo urlShop('member_order');?>" class="avatar"><img src="<?php echo getMemberAvatar($output['member_info']['member_avatar']); ?>" alt=""></a>
            <div class="name"><?php echo $_SESSION['member_name'];?></div>
            <div class="baby-name"><?php echo $GLOBALS['setting_config']['site_name']; ?><span class="baby-year">6个月</span></div>
        <?php }else{ ?> 
               <a href="<?php echo urlShop('login');?>" class="avatar"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/default_user_portrait.gif" alt=""></a>
            <div class="baby-name" style="text-align:center;height:55px;line-height:55px;"><a href="<?php echo urlShop('login');?>" style="color:#FFF">进行登录</a></div>
        <?php }?> 
        </div>
     
        <ul class="baby-notice-nav" style="display:none">
            <li><a href="">风采大赛</a></li>
            <li class="on"><a href="">游泳大赛</a></li>
            <li><a href="">满月晒照</a></li>
        </ul>
        <div class="headerSearch baby-notice-search">
            <form action="">
                <input type="text" class="ipt">
                <input type="button" class="btn">
            </form>
        </div>
        <span class="posr order-notice-i">
            <span class="order-notice-content"><em class="bluetxt">消息：</em>您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></span>
            <a href="javascript:;" class="ae-order-notice has-notice"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/order/ae-order-notice.png" alt=""></a>
            <ul class="notice-sub">
                <li class="order-notice-content">您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></li>
            </ul>
            <a href="" class="goanyway goanyway-blue"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-order-go-back.png" alt="">返回</a>
        </span>
        
    </div>
    <div class="baby-main clearfix inner  bxsd baby-ee802e ">
        <div class="f-baby-banner f-baby-banner-1"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-baby-banner-2.png" alt=""><div class="f-info"><h3>活动描述</h3><p>通过上传宝宝的相片和描述，把宝宝的动态在社区进行分享，让关注宝宝的亲朋好友第一时间分享到宝宝成长的快乐。通过上传宝宝的相片和描述，把宝宝的动态在社区进行分享，让关注宝宝的亲朋好友第一时间分享到宝宝成长的快乐。亲朋好友第一时间分享到宝宝成长的快乐</p><a class="hover f-banner-btn f-banner-btn-3" href="<?php echo urlShop('category', 'baobao',array('status'=>3));?>">进入专场</a></div></div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">0<i class="ae-like-on"></i></span>
        </div>
        
       
        
    </div>
    <div class="inner clearfix mt10 bxsd recommend ">
        <h2 class="title">推荐商品：</h2>
        <p class="opensans met">YOU MIGHT ALSO BE INSTERESTED ABOUT</p>
        <div class="pageBtn">
            <a href="javascript:;" class="next">&gt;</a>
        </div>
        <div class="bd">
                   <?php foreach($output['goods_commend'] as $goods_commend){?>
            <?php if($output['goods']['goods_id'] != $goods_commend['goods_id']){?>        
        <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="<?php echo urlShop('goods', 'index', array('goods_id' => $goods_commend['goods_id']));?>"><?php echo $goods_commend['goods_jingle'];?></a></h1>
                <div class="meta">
                    <div><a href="">BABYBIO</a></div>
                    <em class="flag"><img src="<?php echo thumb($goods_commend, 240);?>" alt=""></em>
                </div>
            </div>
            <div class="price">
                <div class="original"><?php echo $lang['currency'];?><?php echo $goods_commend['goods_price'];?></div>
            </div>
            <a href="<?php echo urlShop('goods', 'index', array('goods_id' => $goods_commend['goods_id']));?>" class="cover hover"><img src="<?php echo thumb($goods_commend, 240);?>" alt=""></a>
            <div class="ftr">
                <p class="info">采用全天然有机的食品原料精心加工而成，清新无污染，健康有保证；...    </p>
                <div class="meta">
                    <span class="like">288<i class="ae-like"></i></span> | 
                    <a class="listing" href=""><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div>
    
            <?php }?>
            <?php }?>
        </div>
    <div class="inner mb56" style="display:none">
        <div class="pagenav">
            <a href="" class="prev dis">上一页</a>
            <a href="" class="ins">1</a>
            <a href="" class="ins">2</a>
            <a href="" class="on ins">3</a>
            <a href="" class="ins">4</a>
            <a href="" class="ins">5</a>
            <a href="" class="ins">6</a>
            <a href="" class="next">下一页</a>
        </div>
    </div>
</div>


<!--返回顶部-->
<a href="javascript:;" id="J-gotop"></a>
<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_minimal-orange',
    radioClass: 'iradio_minimal-orange',
    increaseArea: '20%' // optional
  });
});
</script>