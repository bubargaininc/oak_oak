<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="content">
    <div class="chosen-item ">
        <div class="inner1024">
            <div class="chosen-item-one">
                <div class="chosen-item-tit"></div>
                <div class="chosen-item-one-list">
                    <span class="chosen-flag zc ciolbox">
                        <a class="chosenSingle"><span class="chosenSinglei"><?php echo $output['count_name']?></span><i class="arrow arrow-bottom"></i></a>
                        <ul class="chosenDrop">
                                  <?php
                         foreach ($output['count'] as $key => $value){?>
                        <li data-flag="<?php echo $value['count_name']?>">

                        <a href="<?php echo replaceParam(array('count' => $value['count_id']));?>"><img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$value['count_images']);?>" alt="">
                        <span><?php echo $value['count_name']?></span>
                        </a>
                        </li>
                        <?php }?>
                        </ul>
                    </span>
                            <span class="chosen-flag zc ciolbox">
                        <a class="chosenSingle"><span class="chosenSinglei">时间</span><i class="arrow arrow-bottom"></i></a>
                        <ul class="chosenDrop">
                            <li data-month="0～3个月"><span class="ls0">0～3个月</span></li>
                            <li data-month="3～6个月"><span class="ls0">3～6个月</span></li>
                            <li data-month="6～9个月"><span class="ls0">6～9个月</span></li>
                            <li data-month="9～12个月"><span class="ls0">9～12个月</span></li>
                        </ul>
                    </span>
<!--                    <span class="month ciolbox"><em>0～3个月</em><i class="x">X</i></span>-->
                   <span class="chosen-flag zc ciolbox">
                        <a class="chosenSingle"><span class="chosenSinglei">性别</span><i class="arrow arrow-bottom"></i></a>
                        <ul class="chosenDrop smin_left">
                            <li data-month="女"><span class="ls0">女</span></li>
                            <li data-month="男"><span class="ls0">男</span></li>
                        </ul>
                    </span>
                    
                    <span class="chosen-item-search ciolbox">
                            <input type="text" class="ipt" name="keywords" id="stkey">
                            <input type="button" class="btn" id="key">
                    </span>
                </div>
            </div><!--chosen-item-one-->
            <div class="chosen-item-two">
                <div class="chosen-item-tit"><?php echo $output['scate_data'];?></div>
                <div class="chosen-item-two-list">
                    <ul class="chosen-item-two-list-top clearfix">
                        <li class="on"><a href="<?php echo urlShop('category', 'type');?>">纯天然</a></li>
                    </ul>
                    <ul class="chosen-item-two-list-bottom clearfix">
                         <?php
                      foreach ($output['goods_type'] as $key => $value) {
                    ?>
                        <li class="<?php echo $_GET['cate_id']==$value['gc_id']?'on':''?>"><a  href="<?php echo replaceParam(array('cate_id' => $value['gc_id']));?>"><?php echo $value['gc_name']?></a></li>
                    <?php } ?> 
                    </ul>
                    
                </div>
            </div>
            <div class="chosen-item-three">
                <div class="chosen-item-three-i">
                    <a class="<?php echo $_GET['order']=='1'?'on':''?>" href="<?php echo replaceParam(array('order' => '1'));?>">新品</a><i>.</i>
                    <a class="<?php echo $_GET['order']=='2'?'on':''?>" href="<?php echo replaceParam(array('order' => '2'));?>">销量</a><i>.</i>
                    <a class="<?php echo $_GET['order']=='3'?'on':''?>" href="<?php echo replaceParam(array('order' => '3'));?>">人气</a><i>.</i>
                    <a class="<?php echo $_GET['order']=='4'?'on':''?>" href="<?php echo replaceParam(array('order' => '4'));?>">价格</a>
                </div>
            </div>
        </div>
    </div>
    <div class="brand-logo inner1024 clearfix">
        <div class="bd">
            <ul class="brandlist">
        <?php 

        foreach($output['brand'] as $key=>$brand_r){?>
        <li><a href="<?php echo urlShop('brand', 'list',array('brand'=>$brand_r['brand_id']));?>" target="_blank"><img src="<?php echo brandImage($brand_r['brand_pic_sm']);?>" alt=""></a></li>
        <?php }?>
            </ul>
            <div class="pageBtn">
                <span class="prev"></span>
                <span class="next"></span>
<!--                <ul class="list"><li>0</li><li>1</li><li>2</li></ul>-->
            </div>
        </div>
    </div>
    <div class="inner clearfix">

        <?php 
        foreach ($output['goods_list'] as $key => $value):?>
            <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>" target="_blank"><?php echo $value['goods_name']?></a></h1>
                <div class="meta">
                    <div><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>"><?php echo $value['store_name']?></a></div>
                    <em class="flag"><img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$value['goods_count']);?>" alt=""></em>
                </div>
            </div>
            <div class="price">
                <div class="original"><?php echo $lang['currency'].$value['goods_price']?></div>
            </div>
            <a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>" class="cover hover" target="_blank"><img src="<?php echo cthumb($value['goods_image'], 233);?>"></a>
            <div class="ftr">
                <p class="info"> <?php echo empty($value['goods_jingle'])?"未有描述":$value['goods_jingle']?></p>
                <div class="meta">
                    <span class="like"><a href="javascript:collect_goods('<?php echo $value['goods_id']; ?>','count','goods_collect');"><em nctype="goods_collect"><?php echo $value['goods_collect']?></em><i class="ae-like"></i></a></span>|
                    <a class="listing" href="javascript:collect_yuan('<?php echo $value['goods_id']; ?>','count','goods_collect');">
          <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div>

        <?php if($key=='7'){?>
        <div class="f-banner"><?php echo loadadv(373);?></div>
        <?php } ?>

         <?php if($key=='18'){?>
        <div class="f-banner f-banner-four"><?php echo loadadv(374);?></div>
        <?php } ?>

        <?php if($key=='31'){?>
        <div class="f-banner f-banner-one"><?php echo loadadv(375);?></div>
        <?php } ?>  
 
    <?php endforeach;?>



    </div><!---->
</div>
<script type="text/javascript">
   $("#key").click(function(){
       var key=$("#stkey").val();
       if(key==''){
        alert('请填写参数');
       }else{
        var url="<?php echo replaceParam(array('keyword' =>''));?>";
        var surl=url+key;
       window.location.href=surl; 
       }
   });
</script>
