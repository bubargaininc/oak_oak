<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="content <?php echo $output['stype']=='1'?'microshop_stores':''?>">
    <div class="chosen-item ">
        <div class="inner1024">
            <div class="chosen-item-one">
                <div class="chosen-item-tit"></div>
                <div class="chosen-item-one-list ">
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
                     <?php if($output['stype']=='2'):?>
<!--                    <span class="sex ciolbox"><em>女</em><i class="x">X</i></span>-->
                    <span class="chosen-item-search ciolbox">
                        <form action="">
                            <input type="text" class="ipt">
                            <input type="button" class="btn">
                        </form>
                    </span>
                       <?php endif;?>
                </div>
            </div><!--chosen-item-one-->
</script>

            <div class="chosen-item-two" >
                <div class="chosen-item-tit"><?php echo $output['scate_data'];?></div>
                <div class="chosen-item-two-list">
                    <ul class="chosen-item-two-list-top clearfix">
                        <li class="<?php echo $output['stype']=='1'?'on':''?>"><a href="<?php echo urlShop('category','sd',array('stype'=>'1'))?>">搜商店</a></li>
                        <li class="<?php echo $output['stype']=='2'?'on':''?>"><a href="<?php echo urlShop('category','chao',array('stype'=>'2'));?>">搜产品</a></li>
                    </ul>
                    <?php if($output['stype']=='2'):?>
                    <ul class="chosen-item-two-list-bottom clearfix">
                    <?php
                      foreach ($output['goods_type'] as $key => $value) {
                    ?>
                        <li class="<?php echo $_GET['cate_id']==$value['gc_id']?'on':''?>"><a  href="<?php echo replaceParam(array('cate_id' => $value['gc_id']));?>"><?php echo $value['gc_name']?></a></li>
                    <?php } ?>    

                    </ul>
                <?php endif;?>
                    
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
<?php if(!empty($output['store_list'])){?>
    <div class="inner clearfix">
         <?php if(!empty($output['store_list']) && is_array($output['store_list'])){?>


  <?php 
  foreach($output['store_list'] as $value){?>
        <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="<?php echo urlShop('show_store','index',array('store_id'=>$value['store_id'],'type'=>'2'));?>"><?php echo $value['store_name'];?></a></h1>
                <div class="meta">
                    <div class="tc"><a href="<?php echo urlShop('show_store','index',array('store_id'=>$value['store_id'],'type'=>'2'));?>"><?php echo $value['seller_name']?></a></div>
                   
                </div>
            </div>
            <a href="<?php echo urlShop('show_store','index',array('store_id'=>$value['store_id'],'type'=>'2'));?>" class="cover hover" target="_blank">
            
<?php if(empty($value['store_label'])) { ?>
            <img src="<?php echo UPLOAD_SITE_URL.'/shop/common/default_store_logo.gif'?>">
            <?php }else{ ?>
            <img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND.'/'.$value['store_label']; ?>">
            <?php }?>

            </a>

                <div class="ftr">
                <p class="info"><?php echo $value['goods_jingle']?> </p>
        


   <div class="meta">
                    <span class="like"><a href="javascript:collect_store('<?php echo $value['store_id']; ?>','count','store_collect');">
                    <em nctype="goods_collect"><?php echo $value['store_collect']?></em><i class="ae-like"></i></a></span>
                 
                </div>

            </div>
        </div> 
     <?php }?>
    <?php }?>
        
    </div><!---->
    <div class="inner">
        <div class="pagenav">
            <?php echo $output['show_page']; ?>
        </div>
    </div>
    <?php }else{?>
        <div class="inner clearfix ">
    <div class="nodate">没有找到符合条件的商店</div>
    </div>
    <?php }?>
</div>

