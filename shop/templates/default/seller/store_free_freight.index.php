<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="tabmenu">
  <?php include template('layout/submenu');?>
</div>
<div class="ncsc-form-default">
  <form method="post"  action="index.php?act=store_free_freight&op=store_setting" id="my_store_form">
    <input type="hidden" name="form_submit" value="ok" />
    <dl>
      <dt>Free shipping amount<?php echo $lang['nc_colon'];?></dt>
      <dd>
        <input class="text w60" name="store_free_price" maxlength="10" type="text"  id="store_free_price" value="<?php echo $output['store_free_price'];?>" /><em class="add-on">
<i class="icon-renminbi"></i>
</em>
        <p class="hint">Default is 0, that is not set free shipping lines, more than 0 indicates that the purchase amount exceeds the value will be free shipping</p>
      </dd>
    </dl>
    <div class="bottom">
        <label class="submit-border"><input type="submit" class="submit" value="<?php echo $lang['nc_common_button_save'];?>" /></label>
      </div>
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/common_select.js" charset="utf-8"></script> 
<script type="text/javascript">
var SITEURL = "<?php echo SHOP_SITE_URL; ?>";
$(function(){
	$('#my_store_form').validate({
    	submitHandler:function(form){
    		ajaxpost('my_store_form', '', '', 'onerror')
    	},
		rules : {
			store_free_price: {
			required : true,
			number : true
			}
        },
        messages : {
        	store_free_price: {
				required : 'Please fill in the amount',
				number : 'Please fill in'
			}
        }
    });    
    
});
</script> 
