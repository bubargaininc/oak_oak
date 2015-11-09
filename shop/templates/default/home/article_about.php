<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="content order-content">
        <div class="slideGroup">
        <div class="about-nav">
            <div class="parHd inner1024 clearfix">
                <ul>
<?php 
if(isset($output['article_class'])){
foreach ($output['article_class'] as $k=>$v){?>
              <li><a><?php echo $v['article_title']?></a></li>
   <?php }?>
                
                </ul>
            </div>
        </div>    
            <div class="parBd">
          <?php  foreach ($output['article_class'] as $k=>$v){?>
               <div class="slideBox"> <div class="content-about about-us"><?php echo $v['article_content']?></div></div>
         <?php }?>
            </div>
                    <?php }?>
</div>
</div>

<script type="text/javascript">
    /* 外层tab切换 */
jQuery(".slideGroup").slide({titCell:".parHd li",mainCell:".parBd",trigger:"click"});
</script>
<style type="text/css">
    .content-v{
        width:936px !important;
    }
</style>