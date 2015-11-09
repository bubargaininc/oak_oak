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


<div class="content content-reg clearfix">
    <div class="login-banner fl">
        <a href=""><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/login-banner.png" alt=""></a>
    </div>
    <div class="login-module fr">
     <form id="register_form" method="post"   class="regform" action="<?php echo SHOP_SITE_URL;?>/index.php?act=login&op=usersave">
      <?php Security::getToken();?>

        <div class="z clearfix">
            <span for="fm-login-id"><?php echo $lang['login_register_username'];?>：</span>
            <input type="text" id="user_name" name="user_name" class="ipt value tip" title="<?php echo $lang['login_register_username_to_login'];?>"/>

        </div>
        <div class="z clearfix">
            <span for="fm-login-id"><?php echo $lang['login_register_email'];?>：</span>
            <input type="text" id="email" name="email" class="ipt tip" title="<?php echo $lang['login_register_input_valid_email'];?>" />
        </div>
        
        <div class="z clearfix">
            <span for="fm-login-id"><?php echo $lang['login_register_pwd'];?>：</span>
             <input type="password" id="password" name="password" class="ipt tip" title="<?php echo $lang['login_register_password_to_login'];?>" />
        </div>
        <div class="z clearfix">
            <span for="fm-login-id"><?php echo $lang['login_register_ensure_password'];?>：</span>
            <input type="password" id="password_confirm" name="password_confirm" class="ipt tip" title="<?php echo $lang['login_register_input_password_again'];?>"/>
        </div>

        <?php if(C('captcha_status_register') == '1') { ?>
      <div class="z clearfix">
          <span><?php echo $lang['login_register_code'];?>：</span>
         
            <input type="text" id="captcha" name="captcha" class="text w50 fl tip" maxlength="4" size="10" title="<?php echo $lang['login_register_input_code'];?>" />
            <img src="index.php?act=seccode&op=makecode&nchash=<?php echo getNchash();?>" title="" name="codeimage" border="0" id="codeimage" class="fl ml5"/> <a href="javascript:void(0)" class="ml5" onclick="javascript:document.getElementById('codeimage').src='index.php?act=seccode&op=makecode&nchash=<?php echo getNchash();?>&t=' + Math.random();"><?php echo $lang['login_register_click_to_change_code'];?></a>
        </div>
        <?php } ?>


        <div class="r">
         
         <input type="button" id="Submit" value="<?php echo $lang['login_register_regist_now'];?>" class="submit btn btn-login" title="<?php echo $lang['login_register_regist_now'];?>" />
          
           
           <input type="hidden" value="<?php echo $_GET['ref_url']?>" name="ref_url">
            <input name="nchash" type="hidden" value="<?php echo getNchash();?>" />
        </div>
        <div class="r agreement">
          <input name="agree" type="checkbox" class="agree-check" id="clause" value="1" checked="checked" />
        我同意并已阅读《<a href="<?php echo urlShop('document', 'index',array('code'=>'agreement'));?>" target="_blank" class="agreement" title="<?php echo $lang['login_register_agreed'];?>"><?php echo $lang['login_register_agreement'];?></a>》
         <label></label>
        </div>
        </form>
    </div>
</div>



</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.poshytip.min.js" charset="utf-8"></script> 
<script>
//注册表单提示
$('.tip').poshytip({
    className: 'tip-yellowsimple',
    showOn: 'focus',
    alignTo: 'target',
    alignX: 'center',
    alignY: 'top',
    offsetX: 0,
    offsetY: 5,
    allowTipHover: false
});

//注册表单验证
$(function(){
    $('#Submit').click(function(){
        if($("#register_form").valid()){
            ajaxpost('register_form', '', '', 'onerror');
        } else{
            document.getElementById('codeimage').src='<?php echo SHOP_SITE_URL?>/index.php?act=seccode&op=makecode&nchash=<?php echo getNchash();?>&t=' + Math.random();
        }
    });
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[^:%,'\*\"\s\<\>\&]+$/i.test(value);
        }, "Letters only please"); 
        jQuery.validator.addMethod("lettersmin", function(value, element) {
            return this.optional(element) || ($.trim(value.replace(/[^\u0000-\u00ff]/g,"aa")).length>=3);
        }, "Letters min please"); 
        jQuery.validator.addMethod("lettersmax", function(value, element) {
            return this.optional(element) || ($.trim(value.replace(/[^\u0000-\u00ff]/g,"aa")).length<=15);
        }, "Letters max please");
    $("#register_form").validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('div');
            error_td.find('label').hide();
            error_td.append(error);
        },
        submitHandler:function(form){
            ajaxpost('register_form', '', '', 'onerror') 
        },
        rules : {
            user_name : {
                required : true,
                lettersmin : true,
                lettersmax : true,
                lettersonly : true,
                remote   : {
                    url :'index.php?act=login&op=check_member&column=ok',
                    type:'get',
                    data:{
                        user_name : function(){
                            return $('#user_name').val();
                        }
                    }
                }
            },
            password : {
                required : true,
                minlength: 6,
                maxlength: 20
            },
            password_confirm : {
                required : true,
                equalTo  : '#password'
            },
            email : {
                required : true,
                email    : true,
                remote   : {
                    url : 'index.php?act=login&op=check_email',
                    type: 'get',
                    data:{
                        email : function(){
                            return $('#email').val();
                        }
                    }
                }
            },
            <?php if(C('captcha_status_register') == '1') { ?>
            captcha : {
                required : true,
                minlength: 4,
                remote   : {
                    url : 'index.php?act=seccode&op=check&nchash=<?php echo getNchash();?>',
                    type: 'get',
                    data:{
                        captcha : function(){
                            return $('#captcha').val();
                        }
                    }
                }
            },
            <?php } ?>
            agree : {
                required : true
            }
        },
        messages : {
            user_name : {
                required : '<?php echo $lang['login_register_input_username'];?>',
                lettersmin : '<?php echo $lang['login_register_username_range'];?>',
                lettersmax : '<?php echo $lang['login_register_username_range'];?>',
                lettersonly: '<?php echo $lang['login_register_username_lettersonly'];?>',
                remote   : '<?php echo $lang['login_register_username_exists'];?>'
            },
            password  : {
                required : '<?php echo $lang['login_register_input_password'];?>',
                minlength: '<?php echo $lang['login_register_password_range'];?>',
                maxlength: '<?php echo $lang['login_register_password_range'];?>'
            },
            password_confirm : {
                required : '<?php echo $lang['login_register_input_password_again'];?>',
                equalTo  : '<?php echo $lang['login_register_password_not_same'];?>'
            },
            email : {
                required : '<?php echo $lang['login_register_input_email'];?>',
                email    : '<?php echo $lang['login_register_invalid_email'];?>',
                remote   : '<?php echo $lang['login_register_email_exists'];?>'
            },
            <?php if(C('captcha_status_register') == '1') { ?>
            captcha : {
                required : '<?php echo $lang['login_register_input_text_in_image'];?>',
                minlength: '<?php echo $lang['login_register_code_wrong'];?>',
                remote   : '<?php echo $lang['login_register_code_wrong'];?>'
            },
            <?php } ?>
            agree : {
                required : '<?php echo $lang['login_register_must_agree'];?>'
            }
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