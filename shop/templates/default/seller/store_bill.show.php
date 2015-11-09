<?php defined('InShopNC') or exit('Access Invalid!');?>
<style>
.bill-alert-block {
    padding-bottom: 14px;
    padding-top: 14px;
}
.bill_alert {
    background-color: #F9FAFC;
    border: 1px solid #F1F1F1;
    margin-bottom: 20px;
    padding: 8px 35px 8px 14px;
    text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
	line-height:30px;
}
</style>
  <div class="bill_alert bill-alert-block mt10">
    <div style="width:800px"><h3 style="float:left">Current settlement</h3><div style="float:right;">
    <?php if ($output['bill_info']['ob_state'] == BILL_STATE_CREATE){?>
    <a class="ncsc-btn mt5" onclick="ajax_get_confirm('Once confirmed will not be restored, the system will automatically enter the settlement link,<BR/>Do you have a confirmation system for the calculation of the bill?', 'index.php?act=store_bill&op=confirm_bill&ob_no=<?php echo $_GET['ob_no'];?>');" href="javascript:void(0)">The settlement is no mistake, I want to confirm</a>
    <?php } elseif ($output['bill_info']['ob_state'] == BILL_STATE_SUCCESS) {?>
    <a class="ncsc-btn mt5" target="_blank" href="index.php?act=store_bill&op=bill_print&ob_no=<?php echo $_GET['ob_no'];?>">Print balance sheet</a>
    <?php } ?>
    </div>
    <div style="clear:both"></div>
    </div>
    <ul>
      <li>Settlement number:<?php echo $output['bill_info']['ob_no'];?>&emsp;
      <?php echo date('Y-m-d',$output['bill_info']['ob_start_date']);?> &nbsp;To&nbsp; <?php echo date('Y-m-d',$output['bill_info']['ob_end_date']);?></li>
      <li>Account time:<?php echo date('Y-m-d',$output['bill_info']['ob_create_date']);?></li>
      <li>Current accounts receivable:<?php echo $output['bill_info']['ob_result_totals'];?> = <?php echo $output['bill_info']['ob_order_totals'];?> (Order amount) - <?php echo $output['bill_info']['ob_commis_totals'];?> (Commission amount) - <?php echo $output['bill_info']['ob_order_return_totals'];?> (Refund amount) + <?php echo $output['bill_info']['ob_commis_return_totals'];?> (Refund Commission) - <?php echo $output['bill_info']['ob_store_cost_totals'];?> (Promotion expenses)</li>
      <li>Settlement status:<?php echo billState($output['bill_info']['ob_state']);?>
      <?php if ($output['bill_info']['ob_state'] == BILL_STATE_SUCCESS){?>
      	, settlement date:<?php echo date('Y-m-d',$output['bill_info']['ob_pay_date']);?>
      <?php }?> 
      </li>
    </ul>
  </div>
  <div class="tabmenu">
  	<?php include template('layout/submenu');?>
  </div>
<?php include template('seller/'.$output['sub_tpl_name']);?>
<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_SITE_URL."/js/jquery-ui/themes/ui-lightness/jquery.ui.css";?>"/>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/i18n/zh-CN.js" charset="utf-8" ></script> 
<script type="text/javascript">
$(document).ready(function(){
	$('#query_start_date').datepicker();
	$('#query_end_date').datepicker();
});
</script>