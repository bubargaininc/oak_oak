<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="tabmenu">
  <?php include template('layout/submenu');?>
  <?php if(!empty($output['current_groupbuy_quota'])) { ?>
  <a href="<?php echo urlShop('store_groupbuy', 'groupbuy_add');?>" style="right:100px" class="ncsc-btn ncsc-btn-green" title="<?php echo $lang['groupbuy_index_new_group'];?>"><i class="icon-plus-sign"></i><?php echo $lang['groupbuy_index_new_group'];?></a> <a class="ncsc-btn ncsc-btn-acidblue" href="<?php echo urlShop('store_groupbuy', 'groupbuy_quota_add');?>" title="套餐续费"><i class="icon-money"></i>Renew packages</a>
  <?php } else { ?>
  <a class="ncsc-btn ncsc-btn-acidblue" href="<?php echo urlShop('store_groupbuy', 'groupbuy_quota_add');?>" title="Purchase packages"><i class="icon-money"></i>Purchase packages</a>
  <?php } ?>
</div>
<div class="alert alert-block mt10">
  <?php if(!empty($output['current_groupbuy_quota'])) { ?>
  <strong>Package expired time<?php echo $lang['nc_colon'];?></strong><strong style="color: #F00;"><?php echo date('Y-m-d H:i:s', $output['current_groupbuy_quota']['end_time']);?></strong>
  <?php } else { ?>
  <strong>There are no packages available, please buy a package</strong>
  <?php } ?>
  <ul class="mt5">
    <li>1、Buy packages and packages, click the button to renew 1 can buy or renew packages</li>
    <li>click on the new buy button to add a group to buy activities</li>
    <li>3、<strong style="color: red">Related expenses will be deducted from the account in the store</strong></li>
  </ul>
</div>
<table class="search-form">
  <form method="get">
    <input type="hidden" name="act" value="store_groupbuy" />
    <tr>
      <td>&nbsp;</td>
      <th><?php echo $lang['groupbuy_index_activity_state'];?></th>
      <td class="w100"><select name="groupbuy_state" class="w90">
          <?php if(is_array($output['groupbuy_state_array'])) { ?>
          <?php foreach($output['groupbuy_state_array'] as $key=>$val) { ?>
          <option value="<?php echo $key;?>" <?php if($key == $_GET['groupbuy_state']) { echo 'selected';}?>><?php echo $val;?></option>
          <?php } ?>
          <?php } ?>
        </select></td>
      <th><?php echo $lang['group_name'];?></th>
      <td class="w160"><input class="text" type="text" name="groupbuy_name" value="<?php echo $_GET['groupbuy_name'];?>"/></td>
      <td class="w70 tc"><label class="submit-border"><input type="submit" class="submit" value="<?php echo $lang['nc_search'];?>" /></label></td>
    </tr>
  </form>
</table>
<table class="ncsc-table-style">
  <thead>
    <tr>
      <th class="w10"></th>
      <th class="w50"></th>
      <th class="tl"><?php echo $lang['group_name'];?></th>
      <th class="w130">Start time</th>
      <th class="w130">End time</th>
      <th class="w90">Browse number</th>
      <th class="w90">Purchased</th>
      <th class="w110"><?php echo $lang['groupbuy_index_activity_state'];?></th>
    </tr>
  </thead>
  <tbody>
    <?php if(!empty($output['group']) && is_array($output['group'])){?>
    <?php foreach($output['group'] as $key=>$group){?>
    <tr class="bd-line">
      <td></td>
      <td><div class="pic-thumb"><a href="<?php echo $group['groupbuy_url'];?>" target="_blank"><img src="<?php echo gthumb($group['groupbuy_image'], 'small');?>"/></a></div></td>
      <td class="tl"><dl class="goods-name">
          <dt><a target="_blank" href="<?php echo $group['groupbuy_url'];?>"><?php echo $group['groupbuy_name'];?></a></dt>
        </dl></td>
      <td><?php echo $group['start_time_text'];?></td>
      <td><?php echo $group['end_time_text'];?></td>
      <td><?php echo $group['views'];?></td>
      <td><?php echo $group['buy_quantity'];?></td>
      <td><?php echo $group['groupbuy_state_text'];?></td>
    </tr>
    <?php }?>
    <?php }else{?>
    <tr>
      <td colspan="20" class="norecord"><div class="warning-option"><i class="icon-warning-sign"></i><span><?php echo $lang['no_record'];?></span></div></td>
    </tr>
    <?php }?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="20"><div class="pagination"><?php echo $output['show_page']; ?></div></td>
    </tr>
  </tfoot>
</table>
