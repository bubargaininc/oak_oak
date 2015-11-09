<link rel="stylesheet" href="<?php echo SHOP_TEMPLATES_URL;?>/css/ks.css">
<script src="https://cdn.janecc.com/libs/fancyBox/jquery.fancybox.js"></script>
<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="content order-content">
    <div class="order-menu baby-menu">
        <div class="inner1024 clearfix">
            <ul>
                   <li class="fz18 <?php echo $output['status']=='0'?'on':'';?>"><a href="<?php echo urlShop('category', 'baobao');?>">宝宝秀</a></li>
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
                <li class="order-notice-content">您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></li>
                <li class="order-notice-content">您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></li>
            </ul>
            <a href="" class="goanyway goanyway-blue"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-order-go-back.png" alt="">返回</a>
        </span>
        
    </div>
    <div class="baby-main clearfix inner  ">
        <div class="f-baby-banner f-baby-banner-1 bgop"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-baby-banner.png" alt=""><div class="f-info"><h3>活动描述</h3><p>通过上传宝宝的相片和描述，把宝宝的动态在社区进行分享，让关注宝宝的亲朋好友第一时间分享到宝宝成长的快乐。通过上传宝宝的相片和描述，把宝宝的动态在社区进行分享，让关注宝宝的亲朋好友第一时间分享到宝宝成长的快乐。亲朋好友第一时间分享到宝宝成长的快乐</p
        ><a nctype="buynow_submit" class="hover f-banner-btn f-banner-btn-3 pop" href="#popup-openingcha-wrap">立即参加</a></div></div>
        
        <div class="product pdc_scd" style="display:none">
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

        <div class="f-baby-banner f-baby-banner-3 bgop" style="display:none"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-baby-banner.png" alt=""><div class="f-info"><h3>活动描述</h3><p>通过上传宝宝的相片和描述，把宝宝的动态在社区进行分享，让关注宝宝的亲朋好友第一时间分享到宝宝成长的快乐。通过上传宝宝的相片和描述，把宝宝的动态在社区进行分享，让关注宝宝的亲朋好友第一时间分享到宝宝成长的快乐。亲朋好友第一时间分享到宝宝成长的快乐</p><a class="hover f-banner-btn f-banner-btn-2" href="#popup-openingcha-wrap">立即参加</a></div></div>
       
      
        <div class="product pdc_scd" style="display:none">
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
    <div class="inner mb56">
        <div class="pagenav">
            <a href="" class="prev dis">上一页</a>
            <a href="" class="ins on">1</a>
            <a href="" class="next">下一页</a>
        </div>
    </div>
</div>

<div >
<!--返回顶部-->
<a href="javascript:;" id="J-gotop"></a>

<script>
    $(document).ready(function() {
        $(".pop").fancybox();

       
    })
</script>

<div class="popup-wrap popup-openingcha hide" id="popup-openingcha-wrap">
    <div class="popup-content">
        <div class="popup-s-title clearfix">
            <a href="" class="avatar avatar-winners"><img src="<?php echo getMemberAvatar($output['member_info']['member_avatar']); ?>" alt=""></a>
            <p class="k-meta-openingcha"><span class="k-name-winners bluetxt">宝贝介绍：</span>通过上传宝宝的相片和描述，把宝宝的动态在社区进行分享，让关注宝的相片和描述，把宝宝的动态在社区进行分享，让关注宝宝的亲朋好友第一时间分享到宝宝成长的快乐通过...</p>
        </div>
        <div class="imgwrap clearfix">
            <div class="imgcon"><div class="imgz">
                <input name="bao_images" type="file" id="bao_images">
            </div>
            <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-baby-banner.png" alt=""></div>
            <div class="btncon ">
                <a href="" class="ae-refrash"></a>
                <a href="javascript:myclose();" class="ae-delete"></a>
            </div>
        </div>
        <div class="shareformwrap">
            <form>
            <div class="bd2px">
                <label for="">标题：

                </label>
                <textarea name="bao_title" id="bao_title"  cols="30" rows="3"></textarea>
            </div>

            <a  class="btn-quxiao"  href="javascript:myclose();" style="text-align:center;">取消</a>
            <input type="button" class="btn-upfiles"  value="上传" id="ddd">
            </form>
        </div>
    </div>
</div>



<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_minimal-orange',
    radioClass: 'iradio_minimal-orange',
    increaseArea: '20%' // optional
  });
});

function myclose(){
    parent.$.fancybox.close();
}




$('#ddd').click(function(){ 
var bao_images=$('#bao_images').val();
var bao_title=$('#bao_title').val();
if(bao_title==''){
    alert("请填写标题");
    return false;
}
       $.ajax({  
           type: "post",
            url:'<?php echo urlShop('category', 'postbao');?>',  
            data:{bao_title:bao_title},  
            success:function(data){    
            if(data == 'true') {
                   alert("上传成功");
                }else{
                   alert("上传失败");
                }
            }  

        }); 
});

            //显示分享店铺页面
        $('.addboo').click(function(){
            ajax_form("sharestore", '分享店舖', 'http://www.shopnc.ueo/shop/index.php?act=index&op=zhuye', 500);
            return false;
        });
</script>