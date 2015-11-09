<?php defined('InShopNC') or exit('Access Invalid!'); ?>
<div class="tabmenu">
  <?php include template('layout/submenu');?>
</div>
<div class="ncsc-form-default">
  <form id="add_form" action="<?php echo urlShop('store_groupbuy', 'groupbuy_quota_add_save');?>" method="post">
    <dl>
      <dt><i class="required">*</i>Purchase quantity</dt>
      <dd>
          <input id="groupbuy_quota_quantity" name="groupbuy_quota_quantity" type="text" class="text w30" /><em class="add-on">April</em><span></span>
        <p class="hint">Purchase units for the month (30 days), you can buy in the cycle of the purchase activity</p>
        <p class="hint"><?php echo 'Monthly (30 days) you need to pay'.$GLOBALS['setting_config']['groupbuy_price'].$lang['nc_yuan'];?> ; </p>
        <p class="hint"><strong style="color: red">Related expenses will be deducted from the account in the store</strong></p>
      </dd>
    </dl>
    <div class="bottom">
      <label class="submit-border"><input id="submit_button" type="submit" class="submit" value="<?php echo $lang['nc_submit'];?>"></label>
    </div>
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/common.js" charset="utf-8"></script> 
<script type="text/javascript">
$(document).ready(function(){
    //页面输入内容验证
    $("#add_form").validate({
        errorPlacement: function(error, element){
            var error_td = element.parent('dd').children('span');
            error_td.append(error);
        },
    	submitHandler:function(form){
            var unit_price = <?php echo C('groupbuy_price');?>;
            var quantity = $("#groupbuy_quota_quantity").val();
            var price = unit_price * quantity;
            showDialog('Confirm purchase? You need to pay a total of'+price+'<?php echo $lang['nc_yuan'];?>', 'confirm', '', function(){
            	ajaxpost('add_form', '', '', 'onerror');
            	});
    	},
        rules : {
            groupbuy_quota_quantity : {
                required : true,
                digits : true,
                min : 1
            }
        },
        messages : {
            groupbuy_quota_quantity : {
                required : "<i class='icon-exclamation-sign'></i>Number cannot be null and must be a number", 
                digits : "<i class='icon-exclamation-sign'></i>Number cannot be null and must be a number", 
                min : "<i class='icon-exclamation-sign'></i>Number cannot be null and must be a number" 
            }
        }
    });
});
</script> 
