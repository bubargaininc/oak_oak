<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="content page-content clearfix">
    <div class="page-sidebar fl">
        <ul>
    <?php

     if(is_array($output['article_list']) && !empty($output['article_list'])){ ?><ul>

    <?php foreach ($output['article_list'] as $k=> $article_class){ ?>
    <?php if(!empty($article_class)){ ?>
    
    <li class="<?php echo $article_class['ac_id']==$output['class_name']['ac_id']?"on":""?>">
      <a>
        <i class="ouu ouu-you"></i><?php if(is_array($article_class['class'])) echo $article_class['class']['ac_name'];?>
      </a>
       <ol class="subi">
      <?php if(is_array($article_class['list']) && !empty($article_class['list'])){ ?>
      <?php foreach ($article_class['list'] as $article){ ?>
      <li class="in"><a href="<?php if($article['article_url'] != '')echo $article['article_url'];else echo urlShop('article', 'show',array('article_id'=> $article['article_id']));?>" title="<?php echo $article['article_title']; ?>"> <?php echo $article['article_title'];?> </a></li>
      <?php }?>
      <?php }?>
      </ol>
    </li>
    <?php }?>
    <?php }?>
    <?php }?>
        </ul>
    </div>
    <div class="page-main">
        <div class="pagebox">
            <div class="callus"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/call.png" alt=""><div>联系我们</div><div>400-855-855</div></div>
            <div class="pageSearch">
                <form action="">
                    <input type="text" class="ipt">
                    <button type="submit" class="btn"></button>
                </form>
            </div>
        </div><!--pagebox-->
        <div class="pagebox hmin688 mb56">
            <div class="tit"><a href=""><?php echo $output['class_name']['ac_name'];?></a>  &gt; <a href="#"><?php echo $output['article']['article_title'];?></a></div>
            <div class="pageboxcontent">
                <div class="contentx">
               <?php echo $output['article']['article_content'];?>
                </div>
            </div>
        </div><!--pagebox-->
    </div>
</div>


<style type="text/css">
  .nav{
    display:none !important;
  }
</style>