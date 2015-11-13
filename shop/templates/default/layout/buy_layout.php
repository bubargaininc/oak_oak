<?php defined('InShopNC') or exit('Access Invalid!');?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>">
<title><?php echo $output['html_title'];?></title>
<meta name="keywords" content="<?php echo $output['seo_keywords']; ?>" />
<meta name="description" content="<?php echo $output['seo_description']; ?>" />
<meta name="author" content="ShopNC">
<meta name="copyright" content="ShopNC Inc. All Rights Reserved">
<style type="text/css">
body {
_behavior: url(<?php echo SHOP_TEMPLATES_URL;
?>/css/csshover.htc);
}
</style>
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/home_cart.css" rel="stylesheet" type="text/css">
<link href="<?php echo SHOP_RESOURCE_SITE_URL;?>/font/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/JaneCC.css" rel="stylesheet" type="text/css">
<!--[if IE 7]>
  <link rel="stylesheet" href="<?php echo SHOP_RESOURCE_SITE_URL;?>/font/font-awesome/css/font-awesome-ie7.min.css">
<![endif]-->
<script>
var COOKIE_PRE = '<?php echo COOKIE_PRE;?>';var _CHARSET = '<?php echo strtolower(CHARSET);?>';var SITEURL = '<?php echo SHOP_SITE_URL;?>';var RESOURCE_SITE_URL = '<?php echo RESOURCE_SITE_URL;?>';var RESOURCE_SITE_URL = '<?php echo RESOURCE_SITE_URL;?>';var SHOP_TEMPLATES_URL = '<?php echo SHOP_TEMPLATES_URL;?>';var PRICE_FORMAT = '<?php echo $lang['currency'];?>%s';
</script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/common.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.validation.min.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.poshytip.min.js"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/goods_cart.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>



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
<?php defined('InShopNC') or exit('Access Invalid!');?>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="header">
<!--
    <div class="headerBar" >
        <div class="inner">
            <a href="" class="orangetxt">Welcome Yingying!</a><span class="bluetxt"> | </span>
            <a href="" class="bluetxt">Merchants info</a>
        </div>
      
    </div> --> 
    <div class="headerBar">
        <!--中文版顶部-->
        <div class="inner1024">
            <span class="orangetxt">欢迎来到欧橡</span>
             <?php if($_SESSION['is_login'] == '1'){?>
       <?php echo $lang['nc_hello'];?><span><a href="<?php echo urlShop('member_order');?>"><?php echo $_SESSION['member_name'];?></a></span><?php echo $lang['nc_comma'],$lang['welcome_to_site'];?>
      <a href="<?php echo SHOP_SITE_URL;?>"  title="<?php echo $lang['homepage'];?>" alt="<?php echo $lang['homepage'];?>"><span><?php echo $GLOBALS['setting_config']['site_name']; ?></span></a>
      <span>[<a href="<?php echo urlShop('login','logout');?>"><?php echo $lang['nc_logout'];?></a>]</span>


            <?php }else{?>

          <a href="<?php echo urlShop('login');?>" class="login orangetxt"><?php echo $lang['nc_login'];?></a>
            <a href="<?php echo urlShop('login','register');?>" class="login orangetxt"><?php echo $lang['nc_register'];?> !</a>
            <span class="bluetxt"> | </span>
            <a href="<?php echo urlShop('seller_login','show_login');?>" class="bluetxt merchants">商家管理中心</a>
    <?php }?>


        </div>
        <!---->
    </div>

</div>


 <header class="ncc-head-layout">
    <div class="site-logo"><a href="<?php echo SHOP_SITE_URL;?>"><img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_COMMON.DS.$GLOBALS['setting_config']['site_logo']; ?>" class="pngFix"></a></div>
    <ul class="ncc-flow">
      <li class="<?php echo $output['buy_step'] == 'step1' ? 'current' : '';?>"><i class="step1"></i>
        <p><?php echo $lang['cart_index_ensure_order'];?></p>
        <sub></sub>
        <div class="hr"></div>
      </li>
      <li class="<?php echo $output['buy_step'] == 'step2' ? 'current' : '';?>"><i class="step2"></i>
        <p><?php echo $lang['cart_index_ensure_info'];?></p>
        <sub></sub>
        <div class="hr"></div>
      </li>
      <li class="<?php echo $output['buy_step'] == 'step3' ? 'current' : '';?>"><i class="step3"></i>
        <p><?php echo $lang['cart_index_payment'];?></p>
        <sub></sub>
        <div class="hr"></div>
      </li>
      <li class="<?php echo $output['buy_step'] == 'step4' ? 'current' : '';?>"><i class="step4"></i>
        <p><?php echo $lang['cart_index_buy_finish'];?></p>
        <sub></sub>
        <div class="hr"></div>
      </li>
    </ul>
  </header>
<div class="ncc-wrapper">

  <?php require_once($tpl_file);?>
  
</div><?php require_once template('footer');?>
<script>
//提示信息
$('.tip').poshytip({
	className: 'tip-yellowsimple',
	showOn: 'hover',
	alignTo: 'target',
	alignX: 'center',
	alignY: 'top',
	offsetX: 0,
	offsetY: 5,
	allowTipHover: false
});
</script>
</body>
</html>

