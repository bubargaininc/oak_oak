<?php defined('InShopNC') or exit('Access Invalid!');?>

<style type="text/css">
  .headerBar{
    border-bottom: 1px solid #FFF;
  }
  .headerBar .inner1024,.nav,.headerSearch,.headerIcon{
      display: none;
  }
</style>
<div class="login">
<div class="content content-reg clearfix ">
    <div class="login-banner fl">
        <a href=""><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/login-banner.png" alt=""></a>
    </div>
    <div class="login-module fr">
         <form id="login_form" method="post" class="loginform">
        <?php Security::getToken();?>
        <input type="hidden" name="form_submit" value="ok" />
        <input name="nchash" type="hidden" value="<?php echo getNchash();?>" />
           <div class="z clearfix">
           <span><?php echo $lang['login_index_username'];?>：</span>
           <input type="text" class="ipt value" autocomplete="off"  name="user_name" id="user_name">
        </div>
          <div class="z clearfix">
          <span><?php echo $lang['login_index_password'];?>：</span>
          <input type="password" class="ipt" name="password" autocomplete="off"  id="password">
          <span class="Validform_checktip"></span>
        </div>
        <?php if(C('captcha_status_login') == '1') { ?>
       <div class="z clearfix">
          <span><?php echo $lang['login_index_checkcode'];?>：</span>
            <input type="text" name="captcha" class="text w50 fl ipt" id="captcha" maxlength="4" size="10" />
            <img src="<?php echo SHOP_SITE_URL?>/index.php?act=seccode&op=makecode&nchash=<?php echo getNchash();?>" name="codeimage" border="0" id="codeimage" class="fl ml5"> <a href="javascript:void(0)" class="ml5" onclick="javascript:document.getElementById('codeimage').src='<?php echo SHOP_SITE_URL?>/index.php?act=seccode&op=makecode&nchash=<?php echo getNchash();?>&t=' + Math.random();"><?php echo $lang['login_index_change_checkcode'];?></a>
        </div>
        <?php } ?>
               <div class="z login-other">
        <a class="forgot-password" href="index.php?act=login&op=forget_password"><?php echo $lang['login_index_forget_password'];?></a>|
        <a href="index.php?act=login&op=register&ref_url=<?php echo urlencode($output['ref_url']);?>" class="register" target="_blank"><?php echo $lang['login_index_regist_now_2'];?></a>
        </div>
           <div class="r">
            <input type="button" class="btn btn-login" value="<?php echo $lang['login_index_login'];?>" name="Submit">
            <input type="hidden" value="<?php echo $_GET['ref_url']?>" name="ref_url">
           </div>
      </form>
        <?php if ($GLOBALS['setting_config']['qq_isuse'] == 1 || $GLOBALS['setting_config']['sina_isuse'] == 1){?>
         <div class="thirdpartner r">
            <div class="z"><p>使用其他账号登录：</p></div>
            <div class="third-login-btns">
              
  <?php if ($GLOBALS['setting_config']['qq_isuse'] == 1){?>
       <a  href="<?php echo SHOP_SITE_URL;?>/api.php?act=toqq" title="QQ" class="qq-login-btn third-login-btn" href=""><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/qq.png" alt="">用QQ账号登录</a>
          <?php } ?>
                   <?php if ($GLOBALS['setting_config']['sina_isuse'] == 1){?>
                     <a class="sina-login-btn third-login-btn" href="<?php echo SHOP_SITE_URL;?>/api.php?act=tosina" title="<?php echo $lang['nc_otherlogintip_sina']; ?>"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/sina.png" alt="">用微博账号登录</a>
          <?php } ?>
            </div>
        </div>
            <?php } ?>
        </form>
    </div>
</div>
</div>



<script>
$(document).ready(function(){
    $('input[name="Submit"]').click(function(){
        if($("#login_form").valid()){
        	$("#login_form").submit();
        } else{
        	document.getElementById('codeimage').src='<?php echo SHOP_SITE_URL?>/index.php?act=seccode&op=makecode&nchash=<?php echo getNchash();?>&t=' + Math.random();
        }
    });
	$("#login_form").validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('div');
            error_td.find('label').hide();
            error_td.append(error);
        },
		rules: {
			user_name: "required",
			password: "required"
			<?php if(C('captcha_status_login') == '1') { ?>
            ,captcha : {
                required : true,
                minlength: 4,
                remote   : {
                    url : '<?php echo SHOP_SITE_URL?>/index.php?act=seccode&op=check&nchash=<?php echo getNchash();?>',
                    type: 'get',
                    data:{
                        captcha : function(){
                            return $('#captcha').val();
                        }
                    }
                }
            }
			<?php } ?>
		},
		messages: {
			user_name: "<?php echo $lang['login_index_input_username'];?>",
			password: "<?php echo $lang['login_index_input_password'];?>"
			<?php if(C('captcha_status_login') == '1') { ?>
            ,captcha : {
                required : '<?php echo $lang['login_index_input_checkcode'];?>',
                minlength: '<?php echo $lang['login_index_input_checkcode'];?>',
				remote	 : '<?php echo $lang['login_index_wrong_checkcode'];?>'
            }
			<?php } ?>
		}
	});
});
</script>
<style type="text/css">
  .w50{
    width: 50px !important;
  }
.ipt{
  padding-left: 0px !important;
}

.z label{
  float: left;
  clear: both;
  padding-left: 137px;
  color: #FF0000;
}
</style>