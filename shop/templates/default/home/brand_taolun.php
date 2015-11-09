<link href="<?php echo SHOP_TEMPLATES_URL;?>/css/ks.css" rel="stylesheet" type="text/css">
<div class="content">
    <div class="seller mb10">
        <div class="inner1024 posr">
            <div class="seller-name" style="border:none">品牌讨论</div>
        </div>
    </div>
    <div class="order-notice baby-notice inner1024 ">
      <div class="baby-info">
            <?php if($_SESSION['is_login'] == '1'){?>
            <a href="<?php echo urlShop('member_order');?>" class="avatar">
            <img src="<?php echo getMemberAvatar($output['member_info']['member_avatar']); ?>" alt=""></a>
            <div class="name"><?php echo $_SESSION['member_name'];?></div>
                       <?php

$begin=time();
$end=$output['member_info']['member_time'];
function datedif($begin, $end, $monpay = 0){    
$mon = date('m', $end) - date('m', $begin); 
$day = date('d', $end) - date('d', $begin); 
if($day < 0 && $mon == 1){  
$day = (date('d', $end)) + (date('t', $begin) - date('d', $begin)); 
$pay = ($day * $monpay) / 30;   
}   
else    
$pay = ($mon * $monpay) + ($day * $monpay) / 30;    
$datedif = array('mon' => $mon, 'day' => $day, 'pay' => $pay);  
return $datedif;
}
$bgtime=(datedif($begin, $end, 3000));
?>


            <div class="baby-name"><?php echo $GLOBALS['setting_config']['site_name']; ?><span class="baby-year"> <?php if($bgtime['mon']!=='0'){
                        echo $bgtime['mon'].'个月';
                    }elseif($bgtime['day']!=='0'){
                        echo $bgtime['day'].'天';
                    }else{
                        echo $bgtime['pay'].'小时';
                    }
                    ?></span></div>
        <?php }else{ ?> 
               <a href="<?php echo urlShop('login');?>" class="avatar"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/default_user_portrait.gif" alt=""></a>
            <div class="baby-name" style="text-align:center;height:55px;line-height:55px;"><a href="<?php echo urlShop('login');?>" style="color:#FFF">进行登录</a></div>
        <?php }?>  
        </div>
        <span class="posr order-notice-i" style="top: 14px;">
            <span class="order-notice-content"><em class="bluetxt">消息：</em>您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></span>
            <a href="javascript:;" class="ae-order-notice has-notice"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/order/ae-order-notice.png" alt=""></a>
            <ul class="notice-sub">

            </ul>
            <a href="/" class="goanyway"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/order/ae-order-go.png" alt="">购物</a>
        </span>
        
    </div>
    <div class="inner clearfix bxsd mb28 disciussion">
        <div class="disciussion-ins fl">
            <div class="ds-banner">
<!--
                <div class="hd">
                    <ul>
                    </ul>
                </div>
-->
                <div class="bd">
                    <ul>
                        <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-frendship.png" /></li>
                    </ul>
                </div>
            </div><!--ds-banner-->
        </div><!--disciussion-ins-->
        <div class="disciussion-info1 fl">
            <div class="dcsii">
                <span><b class=" opensans"><?php echo $output['brand_lise']['brand_collect']?></b><i class="ae-like-on"></i></span>
                <span>评论：<b class=" opensans"><?php echo count($output['taolun'])?></b> 人</span>
            </div>
            <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/rules/06.png" alt="">
        </div>
        <div class="disciussion-info5 fl ">
            <h3 class="bbp">本店明星商品：</h3>
            <div class="clearfix recommend">
                <div class="pageBtn">
                    <a href="javascript:;" class="next">&gt;</a>
                </div>
                <div class="bd">
                   


              <?php foreach ($output['goods_list'] as $key => $value){?>
                            <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>"><?php echo $value['goods_name']?></a></h1>
                <div class="meta">
                    <div><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>"><?php echo $value['member_name']?></a></div>
                    <em class="flag"><img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$value['goods_count']);?>" alt=""></em>
                </div>
            </div>
            <div class="price">
                <div class="original"><?php echo $lang['currency'].$value['goods_price']?></div>
            </div>
            <a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>" class="cover hover"><img src="<?php echo cthumb($value['goods_image'], 233);?>" alt=""></a>
            <div class="ftr">
                <p class="info"><?php echo empty($value['goods_jingle'])?"未有描述":$value['goods_jingle']?></p>
                <div class="meta">
                    <span class="like"><a href="javascript:collect_goods('<?php echo $value['goods_id']; ?>','count','goods_collect');"><em nctype="goods_collect"><?php echo $value['goods_collect']?></em><i class="ae-like"></i></a></span>|
                    <a class="listing" href="javascript:collect_yuan('<?php echo $output['goods']['goods_id']; ?>','count','goods_collect');">
          <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div>
    <?php }?>

                </div>
            </div>
        </div>
        
    </div><!---->
    <div class="inner clearfix disciussion2 mb28">
        <div class="dil bxsd clearfix">
            <h3 class="tts">买家讨论：</h3>
            <ul class="commetlist">
              <?php
               if(!empty($output['taolun'] )){?>
            <?php foreach ($output['taolun'] as $key => $value) {?>
                <li>
                    <a class="cover"><img src="<?php echo cthumb($value['img_1'], 240);?>" alt=""></a>
                    <a class="cover"><img src="<?php echo cthumb($value['img_2'], 240);?>" alt=""></a>
                    <div class="commetcos"><a href="" class="avatar"><img src="<?php echo getMemberAvatar($value['mem_name']['member_avatar']); ?>" alt=""><div class=""><?php echo $value['mem_name']['member_name']?></div></a><?php echo $value['text_name'];?></div>
                    
                    <?php 
                    if($output['member_info']['member_id']==$value['user_id']){
                    ?>
                    <a href="javascript:void(0)"  id="<?php echo $value['id']?>" onclick="javascript:test(this);"  class="orangetxt fr mr28">删除</a>
                  
                    <?php }else{ ?>
                   <a href="javascript:void(0)" id="huifu" sid="<?php echo $value['user_id']?>"  value="<?php echo $value['mem_name']['member_name']?>" class="orangetxt fr mr28">回复</a>
                    <?php }?>
                </li>
                <?php }?>
   <?php }else{?>
                <li>暂无评论</li>
   <?php }?>
   
            </ul>
            
<script type="text/javascript">
    function test(obj){ 
        var id=obj.id;
        if(id!==''){
            if(confirm("确定要删除这条评论嘛")){
                      $.ajax({  
            type: "post",
            url:'<?php echo urlShop('brand', 'taolundel');?>',  
            dataType : 'json',
            data:{id:id},  
            success : function (data, status) {
                if(data == '1') {
                       alert("删除成功");
                       window.location.reload();
                    }else{
                       alert("删除失败");
                    }
                }  
            }); 
            }
        } 
} 


    $("#huifu").toggle(
     function(){
     var val=$(this).attr("value");
     var sid=$(this).attr("sid");
     $(this).text('取消回复');
     $("#hui").text('@'+val);
     },
     function(){
     $(this).text('回复')
     $("#hui").text('');
     }
    )

</script>

            <div class="order-pagenavi">
               <?php if(!empty($output['taolun'] )){?>
             <?php echo $output['show_page'];?>
             <?php }?>
            </div>
            <div class="commetform">
 

    
                <?php if($_SESSION['is_login'] == '1'){?>
            <a href="<?php echo urlShop('member_order');?>" class="avatar"><img src="<?php echo getMemberAvatar($output['member_info']['member_avatar']); ?>" alt=""></a>
            
        <?php }else{ ?> 
               <a href="<?php echo urlShop('login');?>" class="avatar"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/default_user_portrait.gif" alt=""></a>
         
        <?php }?>  




                <form action="<?php echo urlShop('brand','taolunad')?>" method="post">
                <input type="hidden" name="goods_id">
                    <textarea name="text_name" id="text_name" class="txtipt" cols="30" rows="1"></textarea>
                    <div class="altname"><span id="hui"></span></div>
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

 <li class="ncsc-goodspic-upload">
            <div class="upload-thumb"><img src="<?php echo cthumb($output['img'][$value['sp_value_id']][$i]['goods_image'], 240);?>" nctype="file_2">
              <input type="hidden" name="img_2" id="img_2" nctype="file_2">
            </div>
            <div class="show-default">
              <p><i class="icon-ok-circle"></i>Default master
                <input type="hidden" name="" value="">
              </p><a href="javascript:void(0)" nctype="del" class="del" title="移除">X</a>
            </div>
            <div class="ncsc-upload-btn">
            <a href="javascript:void(0);"><span>
            <input type="file" hidefocus="true" size="1" class="input-file" name="file_2" id="file_2"></span><p><i class="icon-upload-alt"></i>上传</p>
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
                        <input type="button" class="btn-commet fr" id="ddd" value="提交">
                    </div>
                </form>

            </div>
        </div>


        <div class="dir">
            <h3 class="tts">买家讨论：</h3>
            <ul class="commetlist clearfix">

           <?php 
if($output['taolun']){
           foreach ($output['taolun'] as $key => $value) {?>
                <li>
                    <a class="cover"><img src="<?php echo cthumb($value['img_1'], 240);?>" alt=""></a>
                    <div class="commetcos"><a href="" class="avatar"><img src="<?php echo getMemberAvatar($value['mem_name']['member_avatar']); ?>" alt=""><div class=""><?php echo $value['mem_name']['member_name']?></div></a><?php echo $value['text_name'];?></div>
                    <a  style="display:none" href="" class="orangetxt fr mr28">回复</a>
                </li>
                <?php 
            }
                }?>
            </ul>
        </div>
    </div><!---->
    <div class="inner clearfix mt10 bxsd recommend mb56">
        <h2 class="title">推荐商品：</h2>
        <p class="opensans met">YOU MIGHT ALSO BE INSTERESTED ABOUT</p>
        <div class="pageBtn">
            <a href="javascript:;" class="next">&gt;</a>
        </div>
        <div class="bd">
         
         <?php if(is_array($output['hot_collect']) && !empty($output['hot_collect'])){?>

         <?php
          foreach($output['hot_collect'] as $val){?>
            <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="<?php echo urlShop('goods', 'index', array('goods_id'=>$val['goods_id']));?>"><?php echo $val['goods_name']?></a></h1>
                <div class="meta">
                    <div><a href="<?php echo urlShop('goods', 'index', array('goods_id'=>$val['goods_id']));?>" target="_blank"><?php echo $val['store_name']?></a></div>
                    <em class="flag"><img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$val['goods_count']);?>" alt=""></em>
                </div>
            </div>
            <div class="price">
                <div class="original"><?php echo $val['goods_price']?></div>
            </div>
            <a href="<?php echo urlShop('goods', 'index', array('goods_id'=>$val['goods_id']));?>" class="cover hover" target="_blank"><img src="<?php echo thumb($val, 240);?>" alt=""></a>
            <div class="ftr" style="display: none;">
                <p class="info"><?php echo $val['goods_jingle']?></p>
                <div class="meta">
                    <span class="like"></span> 
                    <a class="listing" href=""><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div>
            <?php }?>
            <?php }?>
        </div>
    </div>
    
<!--
    <div class="inner">
        <div class="pagenav">
            <a href="" class="prev dis">上一页</a>
            <a href="" class="ins">1</a>
            <a href="" class="ins">2</a>
            <a href="" class="on ins">3</a>
            <a href="" class="ins">4</a>
            <a href="" class="ins">5</a>
            <a href="" class="ins">6</a>
            <a href="" class="next">下一页</a>
        </div>
    </div>
-->
</div>


<script type="text/javascript">

  $('#ddd').click(function(){ 
var se="<?php echo $_SESSION['is_login'];?>";
var goods_id="<?php echo $_GET['id'];?>";
if(se!=='1'){
  alert('请先登录');
  return false;
}
var text_name=$('#text_name').val();
var img_1=$('#img_1').val();
var img_2=$('#img_2').val();
var type='2';
//type:1品牌，2商店，3产品，4个人主页
if(text_name==''){
    alert("请填写留言");
    return false;
}
if(img_1==''){
    alert("请上传第一张图片");
    return false;
}
if(img_2==''){
    alert("请上传第二张图片");
    return false;
}
       $.ajax({  
            type: "post",
            url:'<?php echo urlShop('brand', 'taolunad');?>',  
            dataType : 'json',
            data:{text_name:text_name,goods_id,type:type,goods_id,img_1:img_1,img_2:img_2},  
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