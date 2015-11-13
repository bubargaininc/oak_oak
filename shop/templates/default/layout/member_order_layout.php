<?php defined('InShopNC') or exit('Access Invalid!');?>
<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>">
<title><?php echo ($lang['nc_member_path_'.$output['menu_sign']]==''?'':$lang['nc_member_path_'.$output['menu_sign']].'_').$output['html_title'];?></title>
<meta name="keywords" content="<?php echo C('site_keywords'); ?>" />
<meta name="description" content="<?php echo C('site_description'); ?>" />
<meta name="author" content="ShopNC">
<meta name="copyright" content="ShopNC Inc. All Rights Reserved">
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/member.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/JaneCC.css" rel="stylesheet" type="text/css">

<!--[if IE 6]><style type="text/css">
body {_behavior: url(<?php echo SHOP_TEMPLATES_URL;?>/css/csshover.htc);}
</style>
<![endif]-->
<script>
var COOKIE_PRE = '<?php echo COOKIE_PRE;?>';var _CHARSET = '<?php echo strtolower(CHARSET);?>';var SITEURL = '<?php echo SHOP_SITE_URL;?>';var SHOP_SITE_URL = '<?php echo SHOP_SITE_URL;?>';var RESOURCE_SITE_URL = '<?php echo RESOURCE_SITE_URL;?>';var RESOURCE_SITE_URL = '<?php echo RESOURCE_SITE_URL;?>';var SHOP_TEMPLATES_URL = '<?php echo SHOP_TEMPLATES_URL;?>';
</script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/common.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/member.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/nc-sideMenu.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/qtip/jquery.qtip.min.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/jquery/base/SuperSlide.2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/jquery/JaneCC.js"></script>
<script type="text/javascript">
$(function(){
    $('#formSearch').find('input[type="submit"]').click(function(){
      if ($('#keyword').val() == '') {
        return false;
      }
      $('#formSearch').submit();
    });
});
</script>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/qtip/jquery.qtip.min.css" rel="stylesheet" type="text/css">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="<?php echo RESOURCE_SITE_URL;?>/js/html5shiv.js"></script>
      <script src="<?php echo RESOURCE_SITE_URL;?>/js/respond.min.js"></script>
<![endif]-->
<!--[if IE 6]>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/IE6_PNG.js"></script>
<script>
DD_belatedPNG.fix('.pngFix');
</script>
<script> 
// <![CDATA[ 
if((window.navigator.appName.toUpperCase().indexOf("MICROSOFT")>=0)&&(document.execCommand)) 
try{ 
document.execCommand("BackgroundImageCache", false, true); 
   } 
catch(e){} 
// ]]> 
</script> 
<![endif]-->

</head>
<body>
<?php require_once template('layout/layout_top');?>

<div class="content order-content">
    <div class="order-menu">
        <div class="inner1024 clearfix">
            <i class="ae-bitch"></i>
            <ul>
              <?php 
                 if($_GET['act']=='member_order'){
              ?>
                <li class="<?php echo !isset($_GET['state_type'])?'on':''; ?>"><a href="index.php?act=member_order">我的订单</a></li>
                <?php }else{?>
                <li><a href="index.php?act=member_order">我的订单</a></li>
                <?php }?>
                <li><a href="index.php?act=cart">
                我的购物车</a></li>
                <li class="<?php echo $_GET['state_type']=='state_send'?'on':''; ?>"><a href="index.php?act=member_order&state_type=state_send">等待收货</a></li>
                <li class="<?php echo $_GET['state_type']=='state_success'?'on':''; ?>"><a href="index.php?act=member_order&state_type=state_success">已购产品</a></li>
                <li class="<?php echo $_GET['op']=='yuan'?'on':''; ?>"><a href="<?php echo urlShop('member_snsindex','yuan')?>">愿望清单</a></li>
                <li style="display:none"> class="<?php echo $_GET['op']=='liulan'?'on':''; ?>"><a href="<?php echo urlShop('member_snsindex','liulan')?>">浏览记录</a></li>
            </ul>
        </div>
    </div>
    <div class="order-notice inner1024">
        <span class="order-notice-content"><em class="bluetxt">消息：</em>您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></span>
        <img class="ae-order-notice has-notice" src="<?php echo SHOP_TEMPLATES_URL;?>/img/order/ae-order-notice.png" alt="">
        <a id="zhuye" nctype="buynow_submit" href="javascript:void(0)" class="goanyway"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/order/ae-order-go.png" alt="">主页</a>
    </div>
    <script>
            //显示分享店铺页面
        $('#zhuye').click(function(){
            ajax_form("sharestore", '<?php echo $lang['sns_sharestore'];?>', '<?php echo SHOP_SITE_URL.DS;?>index.php?act=index&op=zhuye', 500);
            return false;
        });
    </script>

    <div class="order-main clearfix inner">

        <?php require_once($tpl_file);?>
    </div>
</div>
<?php
require_once template('footer');?>
</body>
</html>
<script type="text/javascript">
$(function(){
    $(".avatar").on("mouseenter", function () {
    var $this = $(this);
    $this.find(".bianjie").show();

}).on("mouseleave", function () {
    var $this = $(this);
    $this.find(".bianjie").hide();
});
});
</script>