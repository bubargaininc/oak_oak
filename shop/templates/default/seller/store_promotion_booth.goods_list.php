<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="tabmenu">
  <?php include template('layout/submenu');?>
  <?php if(empty($output['booth_quota'])) { ?>
  <a class="ncsc-btn ncsc-btn-acidblue" href="<?php echo urlShop('store_promotion_booth', 'booth_quota_add');?>" title="Purchase packages"><i class="icon-money"></i>Purchase packages</a>
  <?php } else { ?>
  <?php if ($output['booth_quota']['booth_state'] == 1) {?>
  <a class="ncsc-btn ncsc-btn-green" href="javascript:void(0);" nctype="select_goods" style="right:100px"><i class="icon-plus-sign"></i>Add product</a>
  <?php } ?>
  <a class="ncsc-btn ncsc-btn ncsc-btn-acidblue" href="<?php echo urlShop('store_promotion_booth', 'booth_renew');?>"><i class="icon-money"></i>Renew packages</a>
  <?php } ?>
</div>
<!-- 有可用套餐，发布活动 -->
<div class="alert alert-block mt10">
<?php if (empty($output['booth_quota']) || $output['booth_quota']['booth_state'] == 0) {?>
<?php } else {?>
  <strong>Package expired time<?php echo $lang['nc_colon'];?></strong> <strong style=" color:#F00;"><?php echo date('Y-m-d H:i:s',$output['booth_quota']['booth_quota_endtime']);?></strong>
<?php }?>
  <strong>You haven't bought a package or packages has expired, please purchase or renewal packages.</strong>
  <ul>
    <li>1, click to buy packages or renew packages can be purchased or renew packages</li>
    <li>2、<strong style="color: red">Related expenses will be deducted from the account in the store</strong>。</li>
    <li>3、Recommended products will be in the product of the classification of the goods and the list of goods on the left side of a random occurrence。</li>
    <?php if (C('promotion_booth_goods_sum') != 0) {?>
    <li>4、You can recommend the most<?php echo C('promotion_booth_goods_sum');?>Commodity。</li>
    <?php }?>
  </ul>
</div>
<?php if (!empty($output['booth_quota']) && $output['booth_quota']['booth_state'] == 1) { ?>
<!-- 商品搜索 -->
<div nvtype="div_goods_select" class="div-goods-select" style="display: none;">
    <table class="search-form">
      <tr><th class="w150"><strong>The first step: search for goods in the store</strong></th><td class="w160"><input nctype="search_goods_name" type="text w150" class="text" name="goods_name" value=""/></td>
        <td class="w70 tc"><label class="submit-border"><input nctype="btn_search_goods" type="button" value="<?php echo $lang['nc_search'];?>" class="submit"/></label></td><td class="w10"></td><td><p class="hint">Do not enter the name of the direct search will show all the stores in the sale of goods</p></td>
      </tr>
    </table>
  <div nctype="div_goods_search_result" class="search-result"></div>
  <a nctype="btn_hide_goods_select" class="close" href="javascript:void(0);">X</a> </div>
<table class="ncsc-table-style">
  <thead>
    <tr>
      <th class="w10"></th>
      <th class="w50"></th>
      <th class="tl">Commodity name</th>
      <th class="w180">Price</th>
      <th class="w110"><?php echo $lang['nc_handle'];?></th>
    </tr>
  </thead>
  
  <tbody nctype="choose_goods_list">
    <tr nctype="tr_no_promotion" style="display:none;">
      <td colspan="20" class="norecord"><div class="no-promotion"><i class="zw"></i><span>A list of recommended booth, please select Add platform recommended merchandise booth。</span></div></td>
    </tr>
    <?php if(!empty($output['goods_list'])) { ?>
    <?php foreach($output['goods_list'] as $key=>$val){?>
    <tr class="bd-line">
      <td></td>
      <td><div class="pic-thumb"><a href="<?php echo $val['url'];?>" target="black"><img src="<?php echo $val['goods_image'];?>"/></a></div></td>
      <td class="tl">
        <dl class="goods-name">
          <dt><a href="<?php echo $val['url'];?>" target="_blank"><?php echo $val['goods_name'];?></a></dt>
          <dd><?php echo $output['goodsclass_list'][$val['gc_id']]['gc_name'];?></dd>
        </dl>
      </td>
      <td class="goods-price">￥<?php echo $val['goods_price'];?></td>
      <td class="nscs-table-handle">
        <span><a class="btn-red" href='javascript:void(0);' nctype="del_choosed" data-param="{gid:<?php echo $val['goods_id'];?>}"><i class="icon-trash"></i><p><?php echo $lang['nc_del'];?></p></a></span></td>
    </tr>
    <?php }?>
    <?php } ?>
  </tbody>
</table>
<?php }else{?>
<!-- 没有可用套餐，购买 -->
<table class="ncsc-table-style ncm-promotion-buy">
  <tbody>
    <tr>
      <td colspan="20" class="norecord"><div class="no-promotion"><i class="zw"></i><span>您还没有购买套餐，或该促销活动已经关闭。<br />请先购买套餐，再查看活动列表。</span></div></td>
    </tr>
  </tbody>
</table>
<?php }?>
<script>
$(function(){
    // 验证是否已经选择商品
    choosed_goods();
    
    // 显示搜索框
    $('a[nctype="select_goods"]').click(function(){
        $('div[nvtype="div_goods_select"]').show();
    });
    // 隐藏搜索框
    $('a[nctype="btn_hide_goods_select"]').click(function(){
        $('div[nvtype="div_goods_select"]').hide();
    });

    // 搜索商品
    $('input[nctype="btn_search_goods"]').click(function(){
        _url = '<?php echo urlShop('store_promotion_booth', 'booth_select_goods');?>';
        $('div[nctype="div_goods_search_result"]').html('').load(_url, {'goods_name':$('input[nctype="search_goods_name"]').val()});
    });
    $('div[nvtype="div_goods_select"]').on('click', '.demo', function(){
        $('div[nctype="div_goods_search_result"]').load($(this).attr('href'));
        return false;
    });

    // 选择商品
    $('div[nvtype="div_goods_select"]').on('click', 'a[nctype="a_choose_goods"]', function(){
        _url = '<?php echo urlShop('store_promotion_booth', 'choosed_goods');?>';
        eval('var data_str = ' + $(this).attr('data-param'));
        $.getJSON(_url, {gid : data_str.gid}, function(data){
            if (data.result == 'true') {
                // 插入数据
                $('<tr></tr>')
                    .append('<td></td>')
                    .append('<td><div class="pic-thumb"><a target="_blank" href="' + data.url + '"><img src="' + data.goods_image + '"></a></div></td>')
                    .append('<td class="tl"><dl class="goods-name"><dt><a target="_blank" href="' + data.url + '">' + data.goods_name + '</a></dt><dd>' + data.gc_name + '</dd></dl></td>')
                    .append('<td>' + data.goods_price + '</td>')
                    .append('<td class="nscs-table-handle"><span><a class="btn-red" href="javascript:void(0);" data-param="{gid:'+ data.goods_id +'}" nctype="del_choosed"><i class="icon-trash"></i><p>删除</p></a></span></td>')
                    .appendTo('tbody[nctype="choose_goods_list"]');
                // 验证是否已经选择商品
                choosed_goods();
            } else {
                showError(data.msg);
            }
        });
    });

    // 删除商品
    $('tbody[nctype="choose_goods_list"]').on('click','a[nctype="del_choosed"]', function(){
        $this = $(this);
        _url = '<?php echo urlShop('store_promotion_booth', 'del_choosed_goods');?>';
        eval('var data_str = ' + $(this).attr('data-param'));
        $.getJSON(_url, {gid : data_str.gid}, function(data){
            if (data.result == 'true') {
                $this.parents('tr:first').fadeOut("slow",function(){
                    $(this).remove();
                    choosed_goods();
                });
            } else {
                showErroe(data.msg);
            }
        });
    });
});

// 验证是否已经选择商品
function choosed_goods() {
    if ($('tbody[nctype="choose_goods_list"]').children('tr').length == 1) {
        $('tr[nctype="tr_no_promotion"]').show();
    } else {
        $('tr[nctype="tr_no_promotion"]').hide();
    }
}
</script>