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
        <a href=""><img src="<?php echo $output['lpic'];?>" alt=""></a>
    </div>
    <div class="login-module fr">
        <form class="regform" action="index.php?act=login&op=find_password" method="POST" id="find_password_form">
          <?php Security::getToken();?>
          <input type="hidden" name="form_submit" value="ok" />
        <input name="nchash" type="hidden" value="<?php echo getNchash();?>" />

        <div class="z clearfix">
            <span for="fm-login-id"><?php echo $lang['login_password_you_account'];?>：</span>
            <input type="text" class="text ipt" name="username"/>
        </div>
        <div class="z clearfix">
            <span for="fm-login-id"><?php echo $lang['login_password_you_email'];?>：</span>
            <input type="text" class="text ipt" name="email"/>
        </div>
        
        <div class="z clearfix">
           
          <span><?php echo $lang['login_register_code'];?>：</span>
        
            <input type="text" name="captcha" class="text w50 fl" id="captcha" maxlength="4" size="10" />
            <img src="index.php?act=seccode&op=makecode&nchash=<?php echo getNchash();?>" title="<?php echo $lang['login_index_change_checkcode'];?>" name="codeimage" border="0" id="codeimage" class="fl ml5"> <a href="javascript:void(0);" class="ml5" onclick="javascript:document.getElementById('codeimage').src='index.php?act=seccode&op=makecode&nchash=<?php echo getNchash();?>&t=' + Math.random();"><?php echo $lang['login_password_change_code']; ?></a>
            <label></label>



        </div>
       
        <div class="r">
            <input type="submit" class="btn btn-login" value="重置密码" name="Submit" id="Submit">
        </div>
        <div class="r agreement">
         <input type="hidden" value="<?php echo $output['ref_url']?>" name="ref_url">
          
        </div>
        </form>
    </div>
</div>


</div>


<script type="text/javascript">
$(function(){
    $('#Submit').click(function(){
        if($("#find_password_form").valid()){
        	ajaxpost('find_password_form', '', '', 'onerror');
        } else{
        	document.getElementById('codeimage').src='<?php echo SHOP_SITE_URL?>/index.php?act=seccode&op=makecode&nchash=<?php echo getNchash();?>&t=' + Math.random();
        }
    });
    $('#find_password_form').validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('div');
            error_td.find('label').hide();
            error_td.append(error);
        },
        rules : {
            username : {
                required : true
            },
            email : {
                required : true,
                email : true
            },
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
            } 
        },
        messages : {
            username : {
                required : '<?php echo $lang['login_usersave_login_usersave_username_isnull'];?>'
            },
            email  : {
                required : '<?php echo $lang['login_password_input_email'];?>',
                email : '<?php echo $lang['login_password_wrong_email'];?>'
            },
            captcha : {
                required : '<?php echo $lang['login_usersave_code_isnull']	;?>',
                minlength : '<?php echo $lang['login_usersave_wrong_code'];?>',
                remote   : '<?php echo $lang['login_usersave_wrong_code'];?>'
            }
        }
    });
});
</script> 

<style type="text/css">
  .w50{
    width: 50px !important;
    border-color: #b9b2b1;
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