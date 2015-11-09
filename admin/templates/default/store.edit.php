<?php defined('InShopNC') or exit('Access Invalid!');?>
<style type="text/css">
.d_inline {
	display:inline;
}
</style>

<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <h3><?php echo $lang['store'];?></h3>
      <ul class="tab-base">
        <li><a href="index.php?act=store&op=store"><span><?php echo $lang['manage'];?></span></a></li>
        <li><a href="index.php?act=store&op=store_joinin"><span><?php echo $lang['pending'];?></span></a></li>
        <li><a href="JavaScript:void(0);" class="current"><span><?php echo $lang['nc_edit'];?></span></a></li>
      </ul>
    </div>
  </div>
  <div class="fixed-empty"></div>
  <form id="store_form" method="post" enctype="multipart/form-data">
    <input type="hidden" name="form_submit" value="ok" />
    <input type="hidden" name="store_id" value="<?php echo $output['store_array']['store_id'];?>" />
    <table class="table tb-type2">
      <tbody>
        <tr class="noborder">
          <td colspan="2" class="required"><label><?php echo $lang['store_user_name'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><?php echo $output['store_array']['member_name'];?></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label class="validation" for="store_name"> <?php echo $lang['store_name'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['store_array']['store_name'];?>" id="store_name" name="store_name" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>
        <tr>
          <td colspan="2" class="required"><label><?php echo $lang['belongs_class'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><select name="sc_id">
              <option value="0"><?php echo $lang['nc_please_choose'];?>...</option>
              <?php if(is_array($output['class_list'])){ ?>
              <?php foreach($output['class_list'] as $k => $v){ ?>
              <option <?php if($output['store_array']['sc_id'] == $v['sc_id']){ ?>selected="selected"<?php } ?> value="<?php echo $v['sc_id']; ?>"><?php echo $v['sc_name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tbody>
        <tr>
          <td colspan="2" class="required"><label>
            <label for="grade_id"> <?php echo $lang['belongs_level'];?>: </label>
            </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><select id="grade_id" name="grade_id">
              <?php if(is_array($output['grade_list'])){ ?>
              <?php foreach($output['grade_list'] as $k => $v){ ?>
              <option <?php if($output['store_array']['grade_id'] == $v['sg_id']){ ?>selected="selected"<?php } ?> value="<?php echo $v['sg_id']; ?>"><?php echo $v['sg_name']; ?></option>
              <?php } ?>
              <?php } ?>
            </select></td>
          <td class="vatop tips"></td>
        </tr>



        <tr>
          <td colspan="2" class="required"><label for="site_logo">店铺LOGO:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
            <span class="type-file-show"><img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND.'/'.$output['store_array']['store_label']; ?>"></div>
            </span>
            <span class="type-file-box">
            <input type='text' name='textfield' id='textfield1' class='type-file-text' />
            <input type='button' name='button' id='button1' value='' class='type-file-button' />
            <input name="site_logo" type="file" class="type-file-file" id="site_logo" size="30" hidefocus="true" nc_type="change_site_logo">
            </span></td>
          <td class="vatop tips"><span class="vatop rowform">150px * 50px</span></td>
        </tr>


    
        <tr>
          <td colspan="2" class="required"><label for="site_logo">店铺内页LOGO:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <span class="type-file-show">
          <img class="show_image" src="<?php echo ADMIN_TEMPLATES_URL;?>/images/preview.png">
            <div class="type-file-preview">
            <img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND.'/'.$output['store_array']['store_logo']; ?>">
            </div>
            </span>
            <span class="type-file-box">
            <input type='text' name='textfield2' id='textfield2' class='type-file-text' />
            <input type='button' name='button2' id='button2' value='' class='type-file-button' />
            <input name="member_logo" type="file" class="type-file-file" id="member_logo" size="30" hidefocus="true" nc_type="change_member_logo">
            </span></td>
        <td class="vatop tips"><span class="vatop rowform">470px * 258px</span></td>
        </tr>


        <tr>
          <td colspan="2" class="required"><label>
            <label for="grade_id">所在地: </label>
            </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform">
          <input type="text" value="<?php echo $output['store_array']['store_add'];?>" id="store_add" name="store_add" class="txt"></td>
          <td class="vatop tips"></td>
        </tr>



            <tr>
          <td colspan="2" class="required"><label>
            <label for="grade_id">店铺简介: </label>
            </label></td>
        </tr>

            <tr class="noborder">
          <td class="vatop rowform">

<textarea id="store_text" rows="6" class="tarea valid" name="store_text"><?php echo $output['store_array']['store_text'];?></textarea>
          </td>
          <td class="vatop tips"></td>
        </tr>



     <tr class="noborder">
          <td colspan="2" class="required"><label>工作状况:</label></td>
        </tr>
         <tr class="noborder">
          <td class="vatop rowform">
             <input type="text" value="<?php echo $output['store_array']['store_work'];?>" id="store_work" name="store_work" class="txt">
          

          </td>
          <td class="vatop tips"></td>
        </tr>

           <tr class="noborder">
          <td colspan="2" class="required"><label>婚姻状况:</label></td>
        </tr>
    <tr class="noborder">
          <td class="vatop rowform">
 <input type="text" value="<?php echo $output['store_array']['store_hun'];?>" id="store_hun" name="store_hun" class="txt">
          

          </td>
          <td class="vatop tips"></td>
        </tr>



          <tr class="noborder">
          <td colspan="2" class="required"><label>居住状况:</label></td>
        </tr>
     

         <tr class="noborder">
          <td class="vatop rowform">
 <input type="text" value="<?php echo $output['store_array']['store_juzhu'];?>" id="store_juzhu" name="store_juzhu" class="txt">  
          </td>
          <td class="vatop tips"></td>
        </tr>



          <tr class="noborder">
          <td colspan="2" class="required"><label>自我介绍:</label></td>
        </tr>
     

         <tr class="noborder">
          <td class="vatop rowform">
<textarea id="store_ziwo" rows="6" class="tarea valid" name="store_ziwo"><?php echo $output['store_array']['store_ziwo'];?></textarea>
          
          </td>
          <td class="vatop tips"></td>
        </tr>


    <tr class="noborder">
          <td colspan="2" class="required"><label>店铺评论:</label></td>
        </tr>
   <tr class="noborder">
          <td class="vatop rowform">
<textarea id="store_ping" rows="6" class="tarea valid" name="store_ping"><?php echo $output['store_array']['store_ping'];?></textarea>
          
          </td>
          <td class="vatop tips"></td>
        </tr>



        <tr>
          <td colspan="2" class="required"><label><?php echo $lang['period_to'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><input type="text" value="<?php echo $output['store_array']['store_end_time'];?>" id="end_time" name="end_time" class="txt date"></td>
          <td class="vatop tips"><?php echo $lang['formart'];?></td>
        </tr>



        <tr>
          <td colspan="2" class="required"><label>
            <label for="state"><?php echo $lang['state'];?>:</label>
            </label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform onoff"><label for="store_state1" class="cb-enable <?php if($output['store_array']['store_state'] == '1'){ ?>selected<?php } ?>" ><span><?php echo $lang['open'];?></span></label>
            <label for="store_state0" class="cb-disable <?php if($output['store_array']['store_state'] == '0'){ ?>selected<?php } ?>" ><span><?php echo $lang['close'];?></span></label>
            <input id="store_state1" name="store_state" <?php if($output['store_array']['store_state'] == '1'){ ?>checked="checked"<?php } ?> onclick="$('#tr_store_close_info').hide();" value="1" type="radio">
            <input id="store_state0" name="store_state" <?php if($output['store_array']['store_state'] == '0'){ ?>checked="checked"<?php } ?> onclick="$('#tr_store_close_info').show();" value="0" type="radio"></td>
          <td class="vatop tips"></td>
        </tr>
      </tbody>
      <tbody id="tr_store_close_info">
        <tr >
          <td colspan="2" class="required"><label for="store_close_info"><?php echo $lang['close_reason'];?>:</label></td>
        </tr>
        <tr class="noborder">
          <td class="vatop rowform"><textarea name="store_close_info" rows="6" class="tarea" id="store_close_info"><?php echo $output['store_array']['store_close_info'];?></textarea></td>
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
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/common_select.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/jquery.ui.js"></script>
<script src="<?php echo RESOURCE_SITE_URL."/js/jquery-ui/i18n/zh-CN.js";?>" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="<?php echo RESOURCE_SITE_URL;?>/js/jquery-ui/themes/ui-lightness/jquery.ui.css"  />

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
var SITEURL = "<?php echo SHOP_SITE_URL; ?>";
function del_auth(key){
var store_id='<?php echo $output['store_array']['store_id'];?>';
	$.get("index.php?act=store&&op=del_auth",{'key':key,'store_id':store_id},function(date){
		if(date){
			$("#"+key).remove();
			$("#"+key+"_del").remove();
			alert('<?php echo $lang['certification_del_success'];?>');
		}
		else{
			alert('<?php echo $lang['certification_del_fail'];?>');
		}
	});
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



	$('#end_time').datepicker();
	$('input[name=store_state][value=<?php echo $output['store_array']['store_state'];?>]').trigger('click');
	regionInit("region");
	$('input[class="edit_region"]').click(function(){
		$(this).css('display','none');
		$(this).parent().children('select').css('display','');
		$(this).parent().children('span').css('display','none');
	});
//按钮先执行验证再提交表单

	$("#submitBtn").click(function(){
    	if($("#store_form").valid()){
    		$("#store_form").submit();
		}
	});

//
	$('#store_form').validate({
		errorPlacement: function(error, element){
			error.appendTo(element.parentsUntil('tr').parent().prev().find('td:first'));
        },

		rules : {
			store_name: {
				required : true
			}
		},
		messages : {
			store_name: {
				required: '<?php echo $lang['please_input_store_name'];?>'
			}
		}
	});
});
</script>
