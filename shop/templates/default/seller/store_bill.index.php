<?php defined('InShopNC') or exit('Access Invalid!');?>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"  />
<div class="tabmenu">
  <?php include template('layout/submenu');?>
</div>
<form method="get" action="index.php" target="_self">
  <table class="search-form">
    <input type="hidden" name="act" value="store_bill" />
    <input type="hidden" name="op" value="index" />
    <tr>
      <td></td>
      <th>Billing status</th>
      <td class="w160"><select name="bill_state">
          <option><?php echo L('nc_please_choose');?></option>
          <option <?php if ($_GET['bill_state'] == BILL_STATE_CREATE) {?>selected<?php } ?> value="<?php echo BILL_STATE_CREATE;?>">Already out of account</option>
          <option <?php if ($_GET['bill_state'] == BILL_STATE_STORE_COFIRM) {?>selected<?php } ?> value="<?php echo BILL_STATE_STORE_COFIRM;?>">Businesses have confirmed</option>
          <option <?php if ($_GET['bill_state'] == BILL_STATE_SYSTEM_CHECK) {?>selected<?php } ?> value="<?php echo BILL_STATE_SYSTEM_CHECK?>">Platform has been audited</option>
          <option <?php if ($_GET['bill_state'] == BILL_STATE_SUCCESS) {?>selected<?php } ?> value="<?php echo BILL_STATE_SUCCESS?>">Settlement</option>
        </select></td>
      <th>Settlement number</th>
      <td class="w160"><input type="text" class="text w150" name="ob_no" value="<?php echo $_GET['ob_no']; ?>" /></td>
      <td class="w70 tc"><label class="submit-border">
          <input type="submit" class="submit" value="<?php echo $lang['nc_common_search'];?>" />
        </label></td>
    </tr>
  </table>
</form>
<table class="ncsc-table-style">
  <thead>
    <tr>
      <th class="w10"></th>
      <th>Settlement number</th>
      <th>Starting and ending time</th>
      <th>Current accounts receivable</th>
      <th>Settlement status</th>
      <th>Payment date</th>
      <th class="w120"><?php echo $lang['nc_handle'];?></th>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($output['bill_list']) && is_array($output['bill_list'])) { ?>
    <?php foreach($output['bill_list'] as $bill_info) { ?>
    <tr class="bd-line">
      <td></td>
      <td><?php echo $bill_info['ob_no'];?></td>
      <td><?php echo date('Y-m-d',$bill_info['ob_start_date']).' - '.date('Y-m-d',$bill_info['ob_end_date']);?></td>
      <td><?php echo $bill_info['ob_result_totals'];?></td>
      <td><?php echo billState($bill_info['ob_state']);?></td>
      <td><?php echo $bill_info['ob_state'] == BILL_STATE_SUCCESS ? date('Y-m-d',$bill_info['ob_pay_date']) : '';?></td>
      <td><a href="index.php?act=store_bill&op=show_bill&ob_no=<?php echo $bill_info['ob_no'];?>"><?php echo $lang['nc_view'];?></a></td>
    </tr>
    <?php }?>
    <?php } else { ?>
    <tr>
      <td colspan="20" class="norecord"><div class="warning-option"><i class="icon-warning-sign"></i><span><?php echo $lang['no_record'];?></span></div></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <?php if (!empty($output['bill_list']) && is_array($output['bill_list'])) { ?>
    <tr>
      <td colspan="20"><div class="pagination"><?php echo $output['show_page']; ?></div></td>
    </tr>
    <?php } ?>
  </tfoot>
</table>
<script charset="utf-8" type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" ></script> 
<script type="text/javascript">
$(function(){
    $('#query_start_date').datepicker({dateFormat: 'yy-mm-dd'});
    $('#query_end_date').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>