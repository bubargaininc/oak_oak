<?php defined('InShopNC') or exit('Access Invalid!');?>

<div class="footer">
    <div class="footer-info inner">
        <div class="bluetxt inner"><span>We certified all products are exclusively imported from Europe  </span><span>我们确保所有的产品均源自欧洲</span></div>
        <img class="img" src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-footer-info.png" alt="">
    </div>
    <div class="footer-con inner">
    <?php 

    if(is_array($output['article_list']) && !empty($output['article_list'])){ ?><ul>
    <?php foreach ($output['article_list'] as $k=> $article_class){ ?>
    <?php if(!empty($article_class)){ ?>
    
    <dl class="s<?php echo ''.$k+1;?>" style="display:<?php echo $k+1>='6'?"none":""?>">
      <dt>
        <?php if(is_array($article_class['class'])) echo $article_class['class']['ac_name'];?>
      </dt>
      <?php if(is_array($article_class['list']) && !empty($article_class['list'])){ ?>
      <?php foreach ($article_class['list'] as $article){ ?>
      <dd><i></i><a href="<?php if($article['article_url'] != '')echo $article['article_url'];else echo urlShop('article', 'show',array('article_id'=> $article['article_id']));?>" title="<?php echo $article['article_title']; ?>"> <?php echo $article['article_title'];?> </a></dd>
      <?php }?>
      <?php }?>
    </dl>
    <?php }?>
    <?php }?>
    <?php }?>
        <dl>
            <img class="ae-qrcode" src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-qcode.png" alt="">
        </dl>

       
        <dl class="callus">
            <dt>联系我们</dt>
            <dd>地址：上海市黄浦区陆家浜路976号富南大厦1607室</dd>
            <dd>电话： 021－60491776</dd>
            <dd>微信号： oak&knight</dd>
        </dl>
    </div>
</div>
<!--返回顶部-->
<a href="javascript:;" id="J-gotop"></a>
</body>
</html>


<?php //echo getChat($layout);?>


