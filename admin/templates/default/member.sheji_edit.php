<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>设计师管理</h3>
      <ul class="tab-base">
        <li><a href="index.php?act=member&op=sheji" ><span><?php echo $lang['nc_manage']?></span></a></li>
        <li><a href="index.php?act=member&op=sheji_add" ><span><?php echo $lang['nc_new']?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_edit'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="user_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="sheji_id" value="<?php echo $output['member_array']['sheji_id'];?>" />
    <input type="hidden" name="old_member_avatar" value="<?php echo $output['member_array']['sheji_avatar'];?>" />
    <table class="table tb-type2">
      <tbody>


<tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="member_name">名称:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['member_array']['sheji_name']?>" name="sheji_name" id="sheji_name" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
  
        <tr>
          <td colspan="2" class="required"><label class="validation" for="member_count">所在地:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['member_array']['sheji_address']?>" id="sheji_address" name="sheji_address" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>

    <tr>
          <td colspan="2" class="required"><label class="validation">国籍:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['member_array']['sheji_count']?>" id="sheji_count" name="sheji_count" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>

  <tr>

       <tr>
          <td colspan="2" class="required"><label>公司:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['member_array']['sheji_company']?>" id="sheji_company" name="sheji_company" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>


            <tr>
          <td colspan="2" class="required"><label> <?php echo $lang['member_edit_sex']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><ul>
              <li>
                <input type="radio" <?php if($output['member_array']['sheji_sex'] == 0){ ?>checked="checked"<?php } ?> value="0" name="sheji_sex" id="sheji_sex0">
                <label for="member_sex0"><?php echo $lang['member_edit_secret']?></label>
              </li>
              <li>
                <input type="radio" <?php if($output['member_array']['sheji_sex'] == 1){ ?>checked="checked"<?php } ?> value="1" name="sheji_sex" id="sheji_sex1">
                <label for="member_sex1"><?php echo $lang['member_edit_male']?></label>
              </li>
              <li>
                <input type="radio" <?php if($output['member_array']['sheji_sex'] == 2){ ?>checked="checked"<?php } ?> value="2" name="sheji_sex" id="sheji_sex2">
                <label for="member_sex2"><?php echo $lang['member_edit_female']?></label>
              </li>
            </ul></td>
          <td class="vatop tips"></td>
        </tr>



        <tr>
          <td colspan="2" class="required"><label>品牌简介:</label></td>
        </tr>
        <tr class="noborder">
        <td class="vatop rowform"><textarea rows="6" id="info" name="sheji_brand_desc" class="tarea"><?php echo $output['member_array']['sheji_brand_desc']?></textarea></td>
          <td class="vatop tips"></td>
        </tr>


            <tr>
          <td colspan="2" class="required"><label>设计师评价:</label></td>
        </tr>
        <tr class="noborder">
        <td class="vatop rowform"><textarea rows="6" id="info" name="sheji_desc" class="tarea"><?php echo $output['member_array']['sheji_desc']?></textarea></td>
          <td class="vatop tips"></td>
        </tr>






               <tr>
          <td colspan="2" class="required"><label for="site_logo">设计师小图:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <span class="type-file-show">
          <img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview">
            <img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND.'/'.$output['member_array']['sheji_avatar']; ?>">
            </div>
            </span>
            <span class="type-file-box">
            <input type='text' name='textfield2' id='textfield2' class='type-file-text' />
            <input type='button' name='button2' id='button2' value='' class='type-file-button' />
            <input name="member_logo" type="file" class="type-file-file" id="member_logo" size="30" hidefocus="true" nc_type="change_member_logo">
            </span></td>
        <td class="vatop tips"><span class="vatop rowform">233px * 195px</span></td>
        </tr>



        <tr>
          <td colspan="2" class="required"><label for="site_logo">设计师大图:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <span class="type-file-show"><img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND.'/'.$output['member_array']['sheji_max_img']; ?>"></div>
            </span>
            <span class="type-file-box">
            <input type='text' name='textfield' id='textfield1' class='type-file-text' />
            <input type='button' name='button' id='button1' value='' class='type-file-button' />
            <input name="site_logo" type="file" class="type-file-file" id="site_logo" size="30" hidefocus="true" nc_type="change_site_logo">
            </span></td>
          <td class="vatop tips"><span class="vatop rowform">470px * 238px</span></td>
        </tr>





      </tbody>
      <tfoot>
        <tr class="tfoot">
          <td colspan="15"><a href="JavaScript:void(0);" class="btn" id="submitBtn"><span><?php echo $lang['nc_submit'];?></span></a></td>
        </tr>
      </tfoot>
    </table>
  </form>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/ajaxfileupload/ajaxfileupload.js"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.Jcrop/jquery.Jcrop.js"></script>
<link href="<?php echo RESOURCE_SITE_URL;?>/js/jquery.Jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" id="cssfile2" />
<script type="text/javascript">
// 模拟网站LOGO上传input type='file'样式
$(function(){
  $("#site_logo").change(function(){
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



<script type="text/javascript">
//裁剪图片后返回接收函数
function call_back(picname){
  $('#sheji_avatar').val(picname);
  $('#view_img').attr('src','<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND;?>/'+picname);
}
$(function(){
	$('input[class="type-file-file"]').change(uploadChange);
	function uploadChange(){
		var filepatd=$(this).val();
		var extStart=filepatd.lastIndexOf(".");
		var ext=filepatd.substring(extStart,filepatd.lengtd).toUpperCase();		
		if(ext!=".PNG"&&ext!=".GIF"&&ext!=".JPG"&&ext!=".JPEG"){
			alert("file type error");
			$(this).attr('value','');
			return false;
		}
		if ($(this).val() == '') return false;
		ajaxFileUpload();
	}



  function ajaxFileUpload()
  {
    $.ajaxFileUpload
    (
      {
        url:'index.php?act=common&op=pic_upload&form_submit=ok&uploadpath=<?php echo ATTACH_BRAND;?>',
        secureuri:false,
        fileElementId:'_pic',
        dataType: 'json',
        success: function (data, status)
        {
          if (data.status == 1){
            ajax_form('cutpic','<?php echo $lang['nc_cut'];?>','index.php?act=common&op=pic_cut&type=brand&x=150&y=50&resize=1&ratio=3&url='+data.url,690);
          }else{
            alert(data.msg);
          }
          $('input[class="type-file-file"]').bind('change',uploadChange);
        },
        error: function (data, status, e)
        {
          alert('upload failed');$('input[class="type-file-file"]').bind('change',uploadChange);
        }
      }
    )
  };  





$("#submitBtn").click(function(){
    if($("#user_form").valid()){
     $("#user_form").submit();
	}
	});
    $('#user_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },


    });
});
</script> 
