<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['account_syn'];?></h3>
	<?php echo $output['top_link'];?>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form method="post" enctype="multipart/form-data" name="settingForm">
    <input type="hidden" name="form_submit" value="ok" />
	<input type="hidden" name="count_id" value="<?php echo $output['list_setting']['count_id'];?>" />
    <table class="table tb-type2">
      <tbody>
       <tr>
          <td colspan="2" class="required"><label class="validation" for="count_name">国籍名称:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="count_name" name="count_name" value="<?php echo $output['list_setting']['count_name'];?>" class="txt" type="text"></td>
          <td class="vatop tips">&nbsp;</td>
        </tr>

		
				      <tr>
          <td colspan="2" class="required"><label for="site_logo">国籍图标:
		  
		</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><span class="type-file-show"><img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$output['list_setting']['count_images']);?>"></div>
            </span><span class="type-file-box"><input type='text' name='textfield' id='textfield1' class='type-file-text' />
			<input type='button' name='button' id='button1' value='' class='type-file-button' />
            <input name="count_images" type="file" class="type-file-file" id="count_images" size="30" hidefocus="true" nc_type="change_site_logo">
            </span></td>
          <td class="vatop tips"><span class="vatop rowform">180px * 50px</span></td>
        </tr>
		
		
		
		       <tr>
          <td colspan="2" class="required"><label class="validation" for="qq_appkey">排序:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input id="count_sort" name="count_sort" value="<?php echo $output['list_setting']['count_sort'];?>" class="txt" type="text"></td>
          <td class="vatop tips">&nbsp;</td>
        </tr>
		
		

		      
		
      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="2" ><a href="JavaScript:void(0);" class="btn" onclick="document.settingForm.submit()"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>


<script type="text/javascript">
// 模拟网站LOGO上传input type='file'样式
$(function(){
	$("#count_images").change(function(){
		$("#textfield1").val($(this).val());
	});
	$("#member_logo").change(function(){
		$("#textfield2").val($(this).val());
	});
	$("#seller_center_logo").change(function(){
		$("#textfield3").val($(this).val());
	});
// 上传图片类型
$('input[class="type-file-file"]').change(function(){
	var filepatd=$(this).val();
	var extStart=filepatd.lastIndexOf(".");
	var ext=filepatd.substring(extStart,filepatd.lengtd).toUpperCase();		
		if(ext!=".PNG"&&ext!=".GIF"&&ext!=".JPG"&&ext!=".JPEG"){
			alert("<?php echo $lang['default_img_wrong'];?>");
				$(this).attr('value','');
			return false;
		}
	});
$('#time_zone').attr('value','<?php echo $output['list_setting']['time_zone'];?>');	
});
</script>
