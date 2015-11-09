<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="home-focus-layout">
     <?php echo $output['web_html']['index_pic'];?>
</div>        
<div class="content" id="content">
    <div class="floor floorOne inner clearfix">
        <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="<?php echo urlShop('goods','index',array('goods_id'=>$output['news_first']['goods_id']));?>">
                <?php echo $output['news_first']['goods_name']?></a></h1>
                <div class="meta">
                    <div><a><?php echo $output['news_first']['brand_name']?></a></div>
                          <em class="flag"><img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$output['news_first']['goods_count']);?>" alt=""></em>
                </div>
            </div>
            <div class="price">
                <div class="original"><?php echo $lang['currency'].$output['news_first']['goods_price']?></div>
            </div>
            <a href="<?php echo urlShop('goods','index',array('goods_id'=>$output['news_first']['goods_id']));?>" class="cover hover"><img src="<?php echo cthumb($output['news_first']['goods_image'], 233);?>" alt=""></a>
            <div class="ftr">
                <p class="info"><?php echo $lang['currency'].$output['news_first']['goods_price']?> </p>
                <div class="meta">
                 <span class="like"><a href="javascript:collect_goods('<?php echo $value['goods_id']; ?>','count','goods_collect');"><em nctype="goods_collect"><?php echo $value['goods_collect']?></em><i class="ae-like"></i></a></span>|
                    <a class="listing" href="javascript:collect_yuan('<?php echo $output['goods']['goods_id']; ?>','count','goods_collect');">
          <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div>

        <div class="f-banner">
        <?php
        //新品汇
        $xinpinghui=unserialize($output['adv']['0']['adv_content']);
        ?>
        <img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_ADV.'/'.$xinpinghui['adv_pic']);?>" alt="">
        <a class="hover f-banner-btn" href="
        <?php echo $xinpinghui['adv_pic_url'];?>
        ">进入专场</a>
        </div>

                 <?php 
                 foreach ($output['news'] as $key => $value):?>
                            <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>"><?php echo $value['goods_name']?></a></h1>
                <div class="meta">
                    <div><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>"><?php echo $value['store_name']?></a></div>
                    <em class="flag"><img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$value['goods_count']);?>" alt=""></em>
                </div>
            </div>
            <div class="price">
                <div class="original"><?php echo $lang['currency'].$value['goods_price']?></div>
            </div>
            <a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>" class="cover hover"><img src="<?php echo cthumb($value['goods_image'], 233);?>" alt=""></a>
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
    <?php endforeach;?>

    </div><!--floorOne-->
    <div class="floor floorTwo inner">
        <div class="f-banner">
        <?php
        //欧洲潮
        $ouzhou=unserialize($output['adv']['1']['adv_content']);
        ?>
        <img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_ADV.'/'.$ouzhou['adv_pic']);?>" alt="">
        <a class="hover f-banner-btn" href="
        <?php echo $ouzhou['adv_pic_url'];?>
        ">进入专场</a>
        </div>
                  <?php foreach ($output['chaoliu'] as $key => $value):?>
                            <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>"><?php echo $value['goods_name']?></a></h1>
                <div class="meta">
                    <div><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>"><?php echo $value['store_name']?></a></div>
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
                    <span class="like"><a href="javascript:collect_goods('<?php echo $value['goods_id']; ?>','count','goods_collect');">
                    <em nctype="goods_collect"><?php echo $value['goods_collect']?></em><i class="ae-like"></i></a></span>|
                    <a class="listing" href="javascript:collect_yuan('<?php echo $value['goods_id']; ?>','count','goods_collect');">
          <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div>
    <?php endforeach;?>


    </div><!--floorTwo-->
    <div class="floor floorThree inner">
        <div class="f-banner">
        <?php
        //最潮大牌
        $zuida=unserialize($output['adv']['2']['adv_content']);
        ?>
        <img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_ADV.'/'.$zuida['adv_pic']);?>" alt="">
        <a class="hover f-banner-btn" href="
        <?php echo $zuida['adv_pic_url'];?>
        ">进入专场</a>
        </div>

        <?php
        foreach ($output['svbrand'] as $key => $value):?>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="<?php echo urlShop('brand', 'list', array('brand'=>$value['brand_id']));?>"><?php echo $value['brand_name']?></a></h1>
                <div class="meta">
                    <div class="tc"><a href="<?php echo urlShop('brand', 'list', array('brand'=>$value['brand_id']));?>"><?php echo $value['brand_class']?></a></div>
                    <em class="flag"><img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_COMMON.DS.$value['goods_count']);?>" alt=""></em>
                </div>
            </div>
            <a href="<?php echo urlShop('brand', 'list', array('brand'=>$value['brand_id']));?>" class="cover hover">
            <img src="<?php echo brandImage($value['brand_pic']);?>" alt=""></a>
        </div>
        <?php endforeach;?>   

   
    </div><!--floorThree-->
    <div class="floor floorFour inner">
        <div class="f-banner">

        <?php
        //个人设计
        $gerendaigou=unserialize($output['adv']['3']['adv_content']);
        ?>
        <img src="<?php echo UPLOAD_SITE_URL.'/'.(ATTACH_ADV.'/'.$gerendaigou['adv_pic']);?>" alt="">
        <a class="hover f-banner-btn" href="
        <?php echo $gerendaigou['adv_pic_url'];?>
        ">进入专场</a>
        </div>

              <?php
               foreach ($output['sheji'] as $key => $value):?>
                            <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>"><?php echo $value['goods_name']?></a></h1>
                <div class="meta">
                    <div><a href="<?php echo urlShop('goods','index',array('goods_id'=>$value['goods_id']));?>"><?php echo $value['store_name']?></a></div>
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
                    <a class="listing" href="javascript:collect_yuan('<?php echo $value['goods_id']; ?>','count','goods_collect');">
          <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div>
    <?php endforeach;?>



        
    </div><!--floorFour-->
    <div class="floor floorFive inner">
        <div class="f-banner"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-floor-five.png" alt=""><a class="hover f-banner-btn" href="index.php?act=category&op=daigou">进入专场</a></div>
        
         <?php 
         //代沟
         foreach ($output['daigou'] as $key => $value):?>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="
<?php echo urlShop('show_store','index',array('store_id'=>$value['store_id']));?>
            "><?php echo $value['store_name']?></a></h1>
                <div class="meta">
                    <div class="tc"><a href=""><?php echo $value['store_recommend']?>粉丝</a></div>
                    <em class="flag" style="display:none"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>
                </div>
            </div>
            <a href="<?php echo urlShop('show_store','index',array('store_id'=>$value['store_id']));?>" class="cover hover">
            <!--<img src="<?php echo getStoreLogo($value['store_label']);?>" alt="">-->
                <?php if(empty($value['store_label'])) { ?>
            <img src="<?php echo UPLOAD_SITE_URL.'/shop/common/default_store_logo.gif'?>">
            <?php }else{ ?>
            <img src="<?php echo UPLOAD_SITE_URL.'/'.ATTACH_BRAND.'/'.$value['store_label']; ?>">
            <?php }?>
            </a>
        </div>
    <?php endforeach;?>

        
    </div><!--floorFive-->
    <div class="link inner wedget">
        <h3 class="title">友情链接</h3>
        <div class="links">
           <?php echo loadadv(9);?>
        </div>
    </div><!--link-->
    <div class="hotbrand inner wedget">
        <h3 class="title">热门品牌</h3>
        <ul class="hotbrands">
         <?php foreach($output['brand'] as $key=>$brand_r){?>
        <li><a href="<?php echo urlShop('brand', 'list',array('brand'=>$brand_r['brand_id']));?>" target="_blank"><img src="<?php echo brandImage($brand_r['brand_pic_sm']);?>" alt=""></a></li>
        <?php }?>

        </ul>
    </div><!--hotbrand-->
    <div style="height:14px;width:100%;clear:Both"></div>
    
</div>
<style type="text/css">
.hotbrand{
    margin-bottom: 0px;
}
/* 首页焦点区域
-------------------------------------- */
.home-focus-layout { width: 100%; height: 448px; position: relative; z-index: 1;}
/* 满屏背静切换焦点图 */
.full-screen-slides { width: 100%; height: 448px; position: relative; z-index: 1;}
.full-screen-slides li { width: 100%; height: 100%; position: absolute; z-index: 1; top: 0; left: 0;}
.full-screen-slides li a { display: block; width:776px; height:270px; text-indent:-9999px; margin-left: -388px; position: absolute; z-index: 2; left: 50%;}
.full-screen-slides-pagination{ font-size: 0; *word-spacing:-1px/*IE6、7*/; filter: progid:DXImageTransform.Microsoft.gradient(enabled='true',startColorstr='#33FFFFFF', endColorstr='#33FFFFFF'); text-align: right; display:block; list-style:none; width: 760px; height: 6px; padding:7px 8px ; margin-left: -388px; position:absolute; left:61%; top: 420px; z-index: 9;}
.full-screen-slides-pagination li { vertical-align: top; letter-spacing: normal; word-spacing: normal; display: inline-block; *display:inline/*IE6、7*/; list-style:none; width:10px;margin: 0 7px; height:10px; margin-left:4px; filter:progid:DXImageTransform.Microsoft.gradient(enabled='true',startColorstr='#3F000000', endColorstr='#3F000000');background:#FFFFFF;  overflow: hidden; cursor: pointer; *zoom:1;  border-radius: 50%;}
.full-screen-slides-pagination a { 
    display: block; width:100%; height:100%; padding:0; margin:0; text-indent:-9999px;


}
.full-screen-slides-pagination .current { background: #6fc5d3;}
.hotbrand{
    padding: 14px 14px 0px 14px;
}

    .jfocus-trigeminy{

        display: none;
    }
</style>




<script type="text/javascript" src="<?php echo SHOP_RESOURCE_SITE_URL;?>/js/home_index.js" charset="utf-8"></script>