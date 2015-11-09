<?php defined('InShopNC') or exit('Access Invalid!');?>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="header">
<!--
    <div class="headerBar" >
        <div class="inner">
            <a href="" class="orangetxt">Welcome Yingying!</a><span class="bluetxt"> | </span>
            <a href="" class="bluetxt">Merchants info</a>
        </div>
      
    </div> --> 
    <div class="headerBar">
        <!--中文版顶部-->
        <div class="inner1024" style="font-size:14px;">
     
             <?php if($_SESSION['is_login'] == '1'){?>
       <?php echo $lang['nc_hello'];?><span><a href="<?php echo urlShop('member_order');?>"><?php echo $_SESSION['member_name'];?></a></span><?php echo $lang['nc_comma'],$lang['welcome_to_site'];?>
      <a href="<?php echo SHOP_SITE_URL;?>"  title="<?php echo $lang['homepage'];?>" alt="<?php echo $lang['homepage'];?>"><span><?php echo $GLOBALS['setting_config']['site_name']; ?></span></a>
      <span>[<a href="<?php echo urlShop('login','logout');?>"><?php echo $lang['nc_logout'];?></a>]</span>
            <?php }else{?>
                   <span class="orangetxt">欢迎来到欧橡</span>
          <a href="<?php echo urlShop('login');?>" class="login orangetxt"><?php echo $lang['nc_login'];?></a>
            <a href="<?php echo urlShop('login','register');?>" class="login orangetxt"><?php echo $lang['nc_register'];?> !</a>
            <span class="bluetxt"> | </span>
           
    <?php }?>
 <a href="<?php echo urlShop('seller_login','show_login');?>" class="bluetxt merchants">商家管理中心</a>

        </div>
        <!---->
    </div>
    <div class="headerCon inner1024 clearfix">
        <a href="<?php echo SHOP_SITE_URL;?>"><img src="<?php echo UPLOAD_SITE_URL.DS.ATTACH_COMMON.DS.$GLOBALS['setting_config']['site_logo']; ?>" class="logo"></a>
        <div class="headerSearch">
          
       <form action="<?php echo SHOP_SITE_URL;?>" method="get" class="search-form">
        <input name="act" id="search_act" value="search" type="hidden">
        <input name="keyword" id="keyword" type="text"  class="ipt"  value="<?php echo $_GET['keyword'];?>" maxlength="60" x-webkit-speech lang="zh-CN" onwebkitspeechchange="foo()" placeholder="请输入您要搜索的商品关键字" x-webkit-grammar="builtin:search" />
        <input type="submit" id="button" value="" class="btn">
      </form>


      <div class="keyword" style="display:none"><?php echo $lang['hot_search'].$lang['nc_colon'];?>
        <ul>
          <?php if(is_array($output['hot_search']) && !empty($output['hot_search'])) { foreach($output['hot_search'] as $val) { ?>
          <li><a href="<?php echo urlShop('search', 'index', array('keyword' => $val));?>"><?php echo $val; ?></a></li>
          <?php } }?>
        </ul>
      </div>


        </div>
        <div class="headerIcon">
            <ul class="clearfix">
                <li><a href="<?php echo urlShop('cart');?>"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-cart.png" alt=""><span>购物车</span></a></li><!--登陆后改变img地址ae-cart-login-->
                <li><a href="
<?php echo urlShop('member_snsindex', 'yuan');?>">
<img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-wish.png" alt=""><span>愿望单</span></a>
</li>
                <li style="display:none"><a class="qcode" href="<?php echo urlShop('category', 'baobao');?>"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-babyshow.png" alt=""><span>宝宝秀</span></a></li><!--登陆后改变img地址ae-babyshow-login-->

                <li style="display:none">
                <a class="qcode" href="/">
                <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-babyshow.png" alt=""><span>宝宝秀</span>
                <div class="qcode-oux"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/baobaoxiu.jpg" alt=""></div>
                </a></li>



                <li>
                <a class="qcode" href="<?php echo urlShop('article', 'show', array('article_id' => 23));?>">
                <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-weixin.png" alt=""><span>联系欧橡</span>
                <div class="qcode-oux"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-qcode.png" alt=""></div>
                </a></li>
            </ul>
        </div>
    </div>
</div>
<div class="nav">
     <ul class="inner clearfix">
      <li <?php if($output['index_sign'] == 'index' && $output['index_sign'] != '0') {echo 'class="on"';} ?>><a href="<?php echo urlShop('category', 'type');?>" ><?php echo $lang['nc_product'];?></a></li>
      <?php if (C('groupbuy_allow')){ ?>
      <li <?php if($output['index_sign'] == 'shang' && $output['index_sign'] != '0') {echo 'class="on"';} ?> ><a href="<?php echo urlShop('brand', 'index');?>"> <?php echo $lang['nc_ouzhou'];?></a></li>
      <?php } ?>
      <li <?php if($output['index_sign'] == 'chao' && $output['index_sign'] != '0') {echo 'class="on"';} ?>><a href="<?php echo urlShop('category', 'sd');?>" > <?php echo $lang['nc_ouzhou_chao'];?></a></li>
      <li <?php if($output['index_sign'] == 'daigou' && $output['index_sign'] != '0') {echo 'class="on"';} ?>><a href="<?php echo urlShop('category', 'daigou');?>" > <?php echo $lang['nc_ouzhou_daigou'];?></a></li>
      

      <?php if(!empty($output['nav_list']) && is_array($output['nav_list'])){?>
      <?php foreach($output['nav_list'] as $nav){?>
      <?php if($nav['nav_location'] == '1'){?>
      <li <?php if($output['index_sign'] == 'about' && $output['index_sign'] != '0') {echo 'class="on"';} ?>><a
        <?php
        if($nav['nav_new_open']) {
            echo ' target="_blank"';
        }
        switch($nav['nav_type']) {
            case '0':
                echo ' href="' . $nav['nav_url'] . '"';
                break;
            case '1':
                echo ' href="' . urlShop('search', 'index',array('cate_id'=>$nav['item_id'])) . '"';
                if (isset($_GET['cate_id']) && $_GET['cate_id'] == $nav['item_id']) {
                    echo ' class="current"';
                }
                break;
            case '2':
                echo ' href="' . urlShop('article', 'article',array('ac_id'=>$nav['item_id'])) . '"';
                if (isset($_GET['ac_id']) && $_GET['ac_id'] == $nav['item_id']) {
                    echo ' class="current"';
                }
                break;
            case '3':
                echo ' href="' . urlShop('activity', 'index', array('activity_id'=>$nav['item_id'])) . '"';
                if (isset($_GET['activity_id']) && $_GET['activity_id'] == $nav['item_id']) {
                    echo ' class="current"';
                }
                break;
        }
        ?>><?php echo $nav['nav_title'];?></a></li>
      <?php }?>
      <?php }?>
      <?php }?>
    </ul>

</div>
