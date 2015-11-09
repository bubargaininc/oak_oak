<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3>添加设计师</h3>
      <ul class="tab-base">
        <li><a href="index.php?act=member&op=sheji" ><span><?php echo $lang['nc_manage']?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_new']?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="user_form" enctype="multipart/form-data" method="post">
    <input type="hidden" name="form_submit" value="ok" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label class="validation" for="sheji_name">名称:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" name="sheji_name" id="sheji_name" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
  
        <tr>
          <td colspan="2" class="required"><label class="validation" for="sheji_address">所在地:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" id="sheji_address" name="sheji_address" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>

		<tr>
          <td colspan="2" class="required"><label class="validation">国籍:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" id="sheji_count" name="sheji_count" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>

	<tr>


   

     <tr>
          <td colspan="2" class="required"><label>公司:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="" id="sheji_company" name="sheji_company" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
      <tr>
          <td colspan="2" class="required"><label><?php echo $lang['member_edit_pic']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
			<span class="type-file-show">
			<img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
			<div class="type-file-preview" style="display: none;"><img id="view_img"></div>
			</span>
            <span class="type-file-box">
              <input type='text' name='sheji_avatar' id='sheji_avatar' class='type-file-text' />
              <input type='button' name='button' id='button' value='' class='type-file-button' />
              <input name="_pic" type="file" class="type-file-file" id="_pic" size="30" hidefocus="true" />
            </span>
            </td>
          <td class="vatop tips"><?php echo $lang['member_edit_support']?>gif,jpg,jpeg,png</td>
        </tr>

        <tr>
          <td colspan="2" class="required"><label> <?php echo $lang['member_edit_sex']?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><ul>
              <li>
                <label>
                  <input type="radio" checked="checked" value="0" name="sheji_sex">
                  <?php echo $lang['member_edit_secret']?></label>
              </li>
              <li>
                <label>
                  <input type="radio" value="1" name="sheji_sex">
                  <?php echo $lang['member_edit_male']?></label>
              </li>
              <li>
                <label>
                  <input type="radio" value="2" name="sheji_sex">
                  <?php echo $lang['member_edit_female']?></label>
              </li>
            </ul></td>
          <td class="vatop tips"></td>
        </tr>


     <tr>
          <td colspan="2" class="required"><label>简介:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><textarea rows="6" id="sheji_brand_desc" name="sheji_brand_desc" class="tarea"></textarea></td>
          <td class="vatop tips"></td>
        </tr>

        <tr>
           <td colspan="2" class="required"><label>设计师评价:</label></td>
        </tr>
        <tr class="noborder">
         <td class="vatop rowform"><textarea rows="6" id="sheji_desc" name="sheji_desc" class="tarea"></textarea></td>
          <td class="vatop tips"></td>
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
//裁剪图片后返回接收函数
function call_back(picname){
	$('#sheji_avatar').val(picname);
	$('#view_img').attr('src','<?php echo UPLOAD_SITE_URL.'/'.ATTACH_AVATAR;?>/'+picname);
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
            ajax_form('cutpic','<?php echo $lang['nc_cut'];?>','index.php?act=common&op=pic_cut&type=brand&x=150&y=150&resize=1&ratio=3&url='+data.url,690);
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
	//按钮先执行验证再提交表单
	$("#submitBtn").click(function(){
    if($("#user_form").valid()){
     $("#user_form").submit();
	}
	});
    $('#user_form').validate({
        errorPlacement: function(error, element){
			error.appendTo(element.parent().parent().prev().find('td:first'));
        },
        rules : {
			member_name: {
				required : true,
				minlength: 3,
				maxlength: 20,
				remote   : {
                    url :'index.php?act=member&op=ajax&branch=check_user_name',
                    type:'get',
                    data:{
                        user_name : function(){
                            return $('#member_name').val();
                        },
                        member_id : ''
                    }
                }
			},
       
        },
        messages : {
			member_name: {
				required : '<?php echo $lang['member_add_name_null']?>',
				maxlength: '<?php echo $lang['member_add_name_length']?>',
				minlength: '<?php echo $lang['member_add_name_length']?>',
				remote   : '<?php echo $lang['member_add_name_exists']?>'
			},
          
        }
    });
});
</script>
