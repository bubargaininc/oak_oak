<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="tabmenu">
  <?php include template('layout/submenu');?>
</div>
<div class="ncsc-form-default">
  <form id="add_form" action="<?php echo urlShop('store_account', 'account_save');?>" method="post">
    <dl>
      <dt><i class="required">*</i>Foreground user name<?php echo $lang['nc_colon'];?></dt>
      <dd><input class="w120 text" name="member_name" type="text" id="member_name" value="" />
          <span></span>
        <p class="hint"></p>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i>User password<?php echo $lang['nc_colon'];?></dt>
      <dd><input class="w120 text" name="password" type="password" id="password" value="" />
          <span></span>
        <p class="hint"></p>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i>Logon account<?php echo $lang['nc_colon'];?></dt>
      <dd><input class="w120 text" name="seller_name" type="text" id="seller_name" value="" />
          <span></span>
        <p class="hint">The new account login Merchant Center user name, password and the same account password</p>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i>Account group<?php echo $lang['nc_colon'];?></dt>
      <dd><select name="group_id">
            <?php foreach($output['seller_group_list'] as $value) { ?>
            <option value="<?php echo $value['group_id'];?>"><?php echo $value['group_name'];?></option>
            <?php } ?>
          </select>
          <span></span>
        <p class="hint"></p>
      </dd>
    </dl>
    <div class="bottom">
      <label class="submit-border">
        <input type="submit" class="submit" value="<?php echo $lang['nc_submit'];?>">
      </label>
    </div>
  </form>
</div>
<script>
$(document).ready(function(){
    jQuery.validator.addMethod("seller_name_exist", function(value, element, params) { 
        var result = true;
        $.ajax({  
            type:"GET",  
            url:'<?php echo urlShop('store_account', 'check_seller_name_exist');?>',  
            async:false,  
            data:{seller_name: $('#seller_name').val()},  
            success: function(data){  
                if(data == 'true') {
                    $.validator.messages.seller_name_exist = "Seller account already exists";
                    result = false;
                }
            }  
        });  
        return result;
    }, '');

    jQuery.validator.addMethod("check_member_password", function(value, element, params) { 
        var result = true;
        $.ajax({  
            type:"GET",  
            url:'<?php echo urlShop('store_account', 'check_seller_member');?>',  
            async:false,  
            data:{member_name: $('#member_name').val(), password: $('#password').val()},  
            success: function(data){  
                if(data != 'true') {
                    $.validator.messages.check_member_password = "Foreground user authentication failed";
                    result = false;
                }
            }  
        });  
        return result;
    }, '');

    $('#add_form').validate({
        onkeyup: false,
        errorPlacement: function(error, element){
            element.nextAll('span').first().after(error);
        },
    	submitHandler:function(form){
    		ajaxpost('add_form', '', '', 'onerror');
    	},
        rules: {
            member_name: {
                required: true
            },
            password: {
                required: true,
                check_member_password: true
            },
            seller_name: {
                required: true,
                maxlength: 50, 
                seller_name_exist: true
            },
            group_id: {
                required: true
            }
        },
        messages: {
            member_name: {
                required: '<i class="icon-exclamation-sign"></i>The foreground user name can not be empty'
            },
            password: {
                required: '<i class="icon-exclamation-sign"></i>User password can not be empty',
                remote: '<i class="icon-exclamation-sign"></i>User name password error'
            },
            seller_name: {
                required: '<i class="icon-exclamation-sign"></i>Seller account can not be empty',
                maxlength: '<i class="icon-exclamation-sign"></i>Seller account up to 50 words'
            },
            group_id: {
                required: '<i class="icon-exclamation-sign"></i>Select account group'
            }
        }
    });
});
</script> 
