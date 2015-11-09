<?php defined('InShopNC') or exit('Access Invalid!');?>
<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/base.css" rel="stylesheet" type="text/css">
<table style="width:600px;font-size:15px;line-height:40px;margin-top:50px;" align="center">
<tr><td colspan="2"><img height="32" src="<?php echo C('member_logo') == ''?UPLOAD_SITE_URL.DS.ATTACH_COMMON.DS.C('site_logo'):UPLOAD_SITE_URL.DS.ATTACH_COMMON.DS.C('member_logo'); ?>"></td></tr>
<tr><td colspan="4" style="border-bottom:1px solid #ccc"><h3 style="font-size:20px;line-height:60px"><?php echo C('site_name');?> - Merchant clearing</h3></td></tr>
<tr>
<td width="80px">Merchant</td><td colspan="3"><?php echo $output['bill_info']['ob_store_name'];?></td>
</tr>
<tr><td>Settlement number</td><td width="130px"><?php echo $output['bill_info']['ob_no'];?></td><td width="100px">Settlement range</td><td><?php echo date('Y-m-d',$output['bill_info']['ob_start_date']);?> &nbsp;To&nbsp; <?php echo date('Y-m-d',$output['bill_info']['ob_end_date']);?></td></tr>
<tr><td>Account time</td><td><?php echo date('Y-m-d',$output['bill_info']['ob_create_date']);?></td>
<td>Settlement status</td><td><?php echo billState($output['bill_info']['ob_state']);?></td></tr>
<?php if ($output['bill_info']['ob_state'] == BILL_STATE_SUCCESS){?>
<tr>
<td>
Settlement date</td><td><?php echo date('Y-m-d',$output['bill_info']['ob_pay_date']);?>
</td>
</tr>
<?php }?>
<tr><td>Business accounts receivable</td><td colspan="3"><?php echo $output['bill_info']['ob_result_totals'];?></td></tr>
<tr><td>Settlement details</td><td colspan="3"></td></tr>
<tr><td colspan="4"><?php echo $output['bill_info']['ob_order_totals'];?> (Order amount) - <?php echo $output['bill_info']['ob_commis_totals'];?> (Commission amount) - <?php echo $output['bill_info']['ob_order_return_totals'];?> (Refund amount) + <?php echo $output['bill_info']['ob_commis_return_totals'];?> (Refund Commission)</td></tr>
</table>