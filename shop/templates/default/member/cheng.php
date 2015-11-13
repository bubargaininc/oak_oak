<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="personal-contenti fr">
            <div class="todaysay bxsd">
                <div class="date">今天</div>
                <div class="sayform">
           

                                    <form action="<?php echo urlShop('brand','taolunad')?>" method="post">
                <input type="hidden" name="goods_id">
                    <textarea name="text_name" id="text_name" class="txtipt" cols="30" rows="1"></textarea>

                    <div class="z clearfix">
                        <div class="fl posr">
                            <a class="uploadimg ouu ouu-uploadimg" href="javascript:;"></a>
                            <div class="imgupfilebox bxsd" style="display:none">
                                <div class="imgfilebox">
<div class="ncsc-goodspic-list">
       <ul>
          <li class="ncsc-goodspic-upload">
            <div class="upload-thumb"><img src="<?php echo cthumb($output['img'][$value['sp_value_id']][$i]['goods_image'], 240);?>" nctype="file_1">
              <input type="hidden" name="img_1"  id="img_1" nctype="file_1">
            </div>
            <div class="show-default">
              <p><i class="icon-ok-circle"></i>Default master
                <input type="hidden" name="" value="">
              </p><a href="javascript:void(0)" nctype="del" class="del" title="移除">X</a>
            </div>
            <div class="ncsc-upload-btn">
            <a href="javascript:void(0);"><span>
            <input type="file" hidefocus="true" size="1" class="input-file" name="file_1" id="file_1"></span><p><i class="icon-upload-alt"></i>上传</p>
              </a></div>
          </li>

    </ul>
</div>
                                </div>
                                <ul class="clearfix">
                                    <li></li>
                                    <li></li>
                                </ul>
                           
                            </div>
                        </div>
                        <input type="button" class="btn-commet fr" id="ddd" value="发送">
                    </div>
                </form>

                </div>
            </div><!--todaysay-->
            <div class="saylist ">
                <ul class="clearfix">
               <?php foreach ($output['taolun'] as $key => $value){


                ?> 
                <li>
                    <div class="saylist-date">
                        <div class="month"><?php echo date('m',$value['add_time'])?></div>
                        <div class="day"><?php echo date('d',$value['add_time'])?></div>
                    </div>
                    <div class="saylist-info">
                        <div class="coverbox">
                            <a href="" class="cover"><img src="<?php echo cthumb($value['img_1'], 240);?>" alt=""></a>
                        </div>
                        <div class="saycont">
                         
                            <div class="sayins">
                                <p><?php echo $value['text_name']?></p>
                              
                            </div>
                        </div>

                    </div>
                </li>
               <?php }?>
                </ul>
            </div><!--todaysay-->
            <div class="order-pagenavi">
                <span>上一页</span>
                <span class="all"><em class="orangetxt">1</em>/<em>1</em></span>
                <a href="">下一页</a>
            </div>
        </div>



<script type="text/javascript">
  $('#ddd').click(function(){ 
var se="<?php echo $_SESSION['is_login'];?>";
var goods_id="<?php $_GET['id'];?>";
if(se!=='1'){
  alert('请先登录');
  return false;
}
var text_name=$('#text_name').val();
var img_1=$('#img_1').val();
var img_2=$('#img_2').val();
if(text_name==''){
    alert("请填写内容");
    return false;
}
if(img_1==''){
    alert("请上传图片");
    return false;
}

       $.ajax({  
            type: "post",
            url:'<?php echo urlShop('home', 'taolunad');?>',  
            dataType : 'json',
            data:{text_name:text_name,goods_id,goods_id,img_1:img_1,img_2:img_2},  
            success : function (data, status) {
            if(data == '1') {
                   alert("上传成功");
                   window.location.reload();
                }else{
                   alert("上传失败");
                }
            }  

        }); 
});


      $('.uploadimg').click(function(){
        if($('.imgupfilebox').css('display') == 'none'){
            $('.imgupfilebox').show();
            $(this).find('.hide').attr('class','show');
        }else{
            $('.imgupfilebox').hide();
            $(this).find('.show').attr('class','hide');
        }
    });

</script>

<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/ajaxfileupload/ajaxfileupload.js" charset="utf-8"></script>
<script src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.ajaxContent.pack.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo SHOP_RESOURCE_SITE_URL;?>/js/store_goods_taolun.js" charset="utf-8"></script>
|<style type="text/css">
 .ncsc-goodspic-list ul { font-size: 0; *word-spacing:-1px/*IE6、7*/; margin-left: -1px;}
.ncsc-goodspic-list ul li { font-size: 12px; vertical-align: top; letter-spacing: normal; word-spacing: normal; display: inline-block; *display: inline/*IE6,7*/; width: 140px; height: 180px; position: relative; z-index: 1; zoom: 1;}
.ncsc-goodspic-list:hover ul li { border-color: #CCC;}
.ncsc-goodspic-list ul li .upload-thumb { line-height: 0; background-color: #FFF; text-align: center; vertical-align: middle; display: table-cell; *display: block; width: 120px; height: 120px; border: solid 1px #F5F5F5; position: absolute; z-index: 1; top: 10px; left: 10px; overflow: hidden;}
.ncsc-goodspic-list ul li .upload-thumb img { max-width: 120px; max-height: 120px; margin-top:expression(120-this.height/2); *margin-top:expression(60-this.height/2)/*IE6,7*/;}
.ncsc-goodspic-list ul li .show-default { display: block; width: 120px; height: 30px; padding: 90px 0 0; border: solid 1px #F5F5F5; position: absolute; z-index: 2; top: 10px; left: 10px; cursor: pointer;}

.ncsc-goodspic-list ul li .show-default:hover { border-color: #27A9E3;}
.ncsc-goodspic-list ul li .show-default.selected,
.ncsc-goodspic-list ul li .show-default.selected:hover { border-color: #28B779;}
.ncsc-goodspic-list ul li .show-default p { color: #28B779; line-height: 20px; filter:progid:DXImageTransform.Microsoft.gradient(enabled='true',startColorstr='#E5FFFFFF', endColorstr='#E5FFFFFF');background:rgba(255,255,255,0.9); display: none; height: 20px; padding: 5px;}
.ncsc-goodspic-list ul li .show-default:hover p { color: #27A9E3; display: block;}
.ncsc-goodspic-list ul li .show-default.selected p { color: #28B779; display: block;}
.ncsc-goodspic-list ul li .show-default p i { font-size: 14px; margin-right: 4px;}
.ncsc-goodspic-list ul li a.del { font-family:Tahoma, Geneva, sans-serif; font-size: 9px; font-weight: lighter; background-color: #FFF; line-height: 14px; text-align: center; display: none; width: 14px; height: 14px; border-style: solid; border-width: 1px; border-radius: 8px; position: absolute; z-index: 3; top: -8px; right: -8px;}
.ncsc-goodspic-list ul li .show-default:hover a.del { color: #27A9E3; display: block;}
.ncsc-goodspic-list ul li .show-default.selected:hover a.del { color: #28B779;}
.ncsc-goodspic-list ul li .show-default:hover a.del:hover { text-decoration: none;}


.ncsc-goodspic-upload .show-sort { line-height: 20px; color: #999; width: 55px; height: 20px; padding: 4px 0 4px 4px; border-style: solid; border-color: #E6E6E6; border-width: 1px 0 1px 1px; position: absolute; z-index: 2; left: 10px; top: 140px;}
.ncsc-goodspic-upload .show-sort .text { font-size: 12px; font-weight: bold; line-height: 20px; vertical-align: middle; width: 10px; height: 20px; padding: 0; border: none 0;}
.ncsc-goodspic-upload .show-sort .text:focus { color: #28B779; text-decoration: underline; box-shadow: none;}
.ncsc-goodspic-upload .ncsc-upload-btn { width: 60px; height: 30px; position: absolute; z-index: 1px; left: 70px; top: 140px;}
.ncsc-goodspic-upload .ncsc-upload-btn span { width: 60px; height: 30px;padding-left: 0px;}
.ncsc-goodspic-upload .ncsc-upload-btn .input-file { width: 60px; height: 30px;}
.ncsc-goodspic-upload .ncsc-upload-btn p { width: 58px; height: 20px;}
.ncsc-select-album { background-color: #FFF; border-top: solid 1px #E6E6E6; padding: 10px;}
.ncsc-goodspic-list:hover .ncsc-select-album { border-color: #CCC;}

.ncsc-form-radio-list { font-size: 0; *word-spacing:-1px/*IE6、7*/;}
.ncsc-form-radio-list li { font-size: 12px; vertical-align: top; letter-spacing: normal; word-spacing: normal; display: inline-block; margin-right: 30px;}
.ncsc-form-radio-list li { *display: inline/*IE6,7*/;}
.ncsc-form-radio-list li label { cursor: pointer;}
.ncsc-form-radio-list li input[type="radio"],
.ncsc-form-radio-list li .radio { vertical-align: middle; margin-right: 4px;}
.ncsc-form-radio-list li .transport-name { line-height: 20px; color: #555; background-color:#F5F5F5; display: none; height: 20px; padding: 4px; margin-right: 4px; border: dotted 1px #DCDCDC;}
.select-template { line-height: 24px; color: #FFFFFF; background: #4AA5FF; height: 24px; padding: 0 6px; margin-left: 10px; border: solid #39F 1px; border-radius: 4px; cursor: pointer;}

.ncsc-upload-btn .input-file {
  width: 80px;
  height: 30px;
  padding: 0;
  margin: 0;
  border: none 0;
  opacity: 0;
  filter: alpha(opacity=0);
  cursor: pointer;
}

.ncsc-upload-btn p {
  font-size: 12px;
  line-height: 20px;
  background-color: #F5F5F5;
  color: #999;
  text-align: center;
  color: #666;
  width: 100%;
  height: 20px;
  padding: 4px 0;
  border: solid 1px;
  border-color: #DCDCDC #DCDCDC #B3B3B3 #DCDCDC;
  position: absolute;
  left: 0;
  top: 0;
  z-index: 1;
}

.ncsc-upload-btn span {
  position: absolute;
  left: 0;
  top: 0;
  z-index: 2;
  cursor: pointer;
}
/*运费*/
</style>