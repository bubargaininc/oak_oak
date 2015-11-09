<?php defined('InShopNC') or exit('Access Invalid!');?>
<?php if ($output['edit_goods_sign']) {?>
<div class="tabmenu">
  <?php include template('layout/submenu');?>
</div>
<?php } else {?>
<ul class="add-goods-step">
  <li><i class="icon icon-list-alt"></i>
    <h6>STIP.1</h6>
    <h2>Select goods category</h2>
    <i class="arrow icon-angle-right"></i> </li>
  <li><i class="icon icon-edit"></i>
    <h6>STIP.2</h6>
   <h2>Fill in the details of the goods</h2>
    <i class="arrow icon-angle-right"></i> </li>
  <li class="current"><i class="icon icon-camera-retro "></i>
    <h6>STIP.3</h6>
    <h2>Upload pictures</h2>
    <i class="arrow icon-angle-right"></i> </li>
  <li><i class="icon icon-ok-circle"></i>
    <h6>STIP.4</h6>
   <h2>Commodity Publishing Success</h2>
  </li>
</ul>
<?php }?>
<form method="post" id="goods_image" action="<?php if ($output['edit_goods_sign']) { echo urlShop('store_goods_online', 'edit_save_image'); } else { echo urlShop('store_goods_add', 'save_image');}?>">
  <input type="hidden" name="form_submit" value="ok">
  <input type="hidden" name="commonid" value="<?php echo $output['commonid'];?>">
  <input type="hidden" name="ref_url" value="<?php echo $_GET['ref_url'];?>" />
  <?php if (!empty($output['value_array'])) {?>
  <div class="ncsc-form-goods-pic">
    <div class="container">
      <?php foreach ($output['value_array'] as $value) {?>
      <div class="ncsc-goodspic-list">
        <div class="title">
          <h3>Color:<?php if (isset($output['value'][$value['sp_value_id']])) { echo $output['value'][$value['sp_value_id']];} else {echo $value['sp_value_name'];}?></h3></div>
        <ul nctype="ul<?php echo $value['sp_value_id'];?>">
          <?php for ($i = 0; $i < 5; $i++) {?>
          <li class="ncsc-goodspic-upload">
            <div class="upload-thumb"><img src="<?php echo cthumb($output['img'][$value['sp_value_id']][$i]['goods_image'], 240);?>" nctype="file_<?php echo $value['sp_value_id'] . $i;?>">
              <input type="hidden" name="img[<?php echo $value['sp_value_id'];?>][<?php echo $i;?>][name]" value="<?php echo $output['img'][$value['sp_value_id']][$i]['goods_image'];?>" nctype="file_<?php echo $value['sp_value_id'] . $i;?>">
            </div>
            <div class="show-default<?php if ($output['img'][$value['sp_value_id']][$i]['is_default'] == 1) {echo ' selected';}?>" nctype="file_<?php echo $value['sp_value_id'] . $i;?>">
              <p><i class="icon-ok-circle"></i>Default master
                <input type="hidden" name="img[<?php echo $value['sp_value_id'];?>][<?php echo $i;?>][default]" value="<?php if ( $output['img'][$value['sp_value_id']][$i]['is_default'] == 1) {echo '1';}else{echo '0';}?>">
              </p><a href="javascript:void(0)" nctype="del" class="del" title="移除">X</a>
            </div>
            <div class="show-sort">Sort:<input name="img[<?php echo $value['sp_value_id'];?>][<?php echo $i;?>][sort]" type="text" class="text" value="<?php echo intval($output['img'][$value['sp_value_id']][$i]['goods_image_sort']);?>" size="1" maxlength="1">
            </div>
            <div class="ncsc-upload-btn"><a href="javascript:void(0);"><span><input type="file" hidefocus="true" size="1" class="input-file" name="file_<?php echo $value['sp_value_id'] . $i;?>" id="file_<?php echo $value['sp_value_id'] . $i;?>"></span><p><i class="icon-upload-alt"></i>上传</p>
              </a></div>
          </li>
          <?php }?>
        </ul>
        <div class="ncsc-select-album">
          <a class="ncsc-btn" href="index.php?act=store_album&op=pic_list&item=goods_image&color_id=<?php echo $value['sp_value_id'];?>" nctype="select-<?php echo $value['sp_value_id'];?>"><i class="icon-picture"></i>From image space selection</a>
          <a href="javascript:void(0);" nctype="close_album" class="ncsc-btn ml5" style="display: none;"><i class=" icon-circle-arrow-up"></i>关闭相册</a>
        </div>
        <div nctype="album-<?php echo $value['sp_value_id'];?>"></div>
      </div>
      <?php }?>
    </div>
    <div class="sidebar"><div class="alert alert-info alert-block" id="uploadHelp">
    <div class="faq-img"></div>
    <h4>Upload requirements:</h4><ul>
    <li>1. Please use the format of jpg\jpeg\png, the size of the sheet is not more than<?php echo intval(C('image_max_filesize'))/1024;?>M square picture.</li>
    <li>2. The maximum size of the uploaded image will be reserved for 1280 pixels。</li>
    <li>3. Each color can upload up to 5 pictures or choose from the image space to the existing picture, after uploading the picture will be saved in the store picture space for other use。</li>
    <li>4. Modifying the order of the commodity pictures by changing the order of the sort。</li>
    <li>5. Picture quality should be clear, can not be empty, to ensure the full brightness。</li>
    <li>6. After the completion of the operation, please point the next step, otherwise it can not be effective in the site。</li>
    </ul><h4>建议:</h4><ul><li>1. Master plan for white background。</li><li>2.Order is the front view - >  side - > view - >  picture - > detail。</li></ul></div></div>
  </div>
  <?php }?>
  <div class="bottom tc hr32"><label class="submit-border"><input type="submit" class="submit" value="<?php if ($output['edit_goods_sign']) { echo '提交'; } else { ?><?php echo $lang['store_goods_add_next'];?>, confirm the product release<?php }?>" /></label></div>
</form>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/ajaxfileupload/ajaxfileupload.js" charset="utf-8"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.ajaxContent.pack.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo SHOP_RESOURCE_SITE_URL;?>/js/store_goods_add.step3.js" charset="utf-8"></script>
<script>
var SITEURL = "<?php echo SHOP_SITE_URL; ?>";
var DEFAULT_GOODS_IMAGE = "<?php echo UPLOAD_SITE_URL.DS.defaultGoodsImage(240);?>";
var SHOP_RESOURCE_SITE_URL = "<?php echo SHOP_RESOURCE_SITE_URL;?>";
$(function(){
    <?php if ($output['edit_goods_sign']) {?>
    $('input[type="submit"]').click(function(){
        ajaxpost('goods_image', '', '', 'onerror');
    });
    <?php }?>
    /* ajax打开图片空间 */
    <?php foreach ($output['value_array'] as $value) {?>
    $('a[nctype="select-<?php echo $value['sp_value_id'];?>"]').ajaxContent({
        event:'click', //mouseover
        loaderType:"img",
        loadingMsg:SHOP_TEMPLATES_URL+"/images/loading.gif",
        target:'div[nctype="album-<?php echo $value['sp_value_id'];?>"]'
    }).click(function(){
        $(this).hide();
        $(this).next().show();
    });
    <?php }?>
});
</script> 
