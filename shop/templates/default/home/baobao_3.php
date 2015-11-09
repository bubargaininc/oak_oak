<link rel="stylesheet" href="<?php echo SHOP_TEMPLATES_URL;?>/css/ks.css">
<?php defined('InShopNC') or exit('Access Invalid!');?>
<div class="content order-content">
    <div class="order-menu baby-menu">
        <div class="inner1024 clearfix">
            <ul>
                <li class="fz18"><a href="">宝宝秀</a></li>
                <li class="<?php echo $output['status']=='1'?'on':'';?>"><a href="<?php echo urlShop('category', 'baobao',array('status'=>1));?>">正在进行</a></li>
                <li class="<?php echo $output['status']=='2'?'on':'';?>"><a href="<?php echo urlShop('category', 'baobao',array('status'=>2));?>">已经结束</a></li>
                <li class="<?php echo $output['status']=='3'?'on':'';?>"><a href="<?php echo urlShop('category', 'baobao',array('status'=>3));?>">奖牌榜</a></li>
                <li class="<?php echo $output['status']=='4'?'on':'';?>"><a href="<?php echo urlShop('category', 'baobao',array('status'=>4));?>">参加规则</a></li>
            </ul>
        </div>
    </div>
    <div class="order-notice baby-notice inner1024">
        <div class="baby-info">
             <?php if($_SESSION['is_login'] == '1'){?>
            <a href="<?php echo urlShop('member_order');?>" class="avatar"><img src="<?php echo getMemberAvatar($output['member_info']['member_avatar']); ?>" alt=""></a>
            <div class="name"><?php echo $_SESSION['member_name'];?></div>
            <div class="baby-name"><?php echo $GLOBALS['setting_config']['site_name']; ?><span class="baby-year">6个月</span></div>
        <?php }else{ ?> 
               <a href="<?php echo urlShop('login');?>" class="avatar"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/default_user_portrait.gif" alt=""></a>
            <div class="baby-name" style="text-align:center;height:55px;line-height:55px;"><a href="<?php echo urlShop('login');?>" style="color:#FFF">进行登录</a></div>
        <?php }?> 
        </div>

        <div class="headerSearch baby-notice-search">
            <form action="">
                <input type="text" class="ipt">
                <input type="button" class="btn">
            </form>
        </div>
        <span class="posr order-notice-i">
            <span class="order-notice-content"><em class="bluetxt">消息：</em>您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></span>
            <a href="javascript:;" class="ae-order-notice has-notice"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/order/ae-order-notice.png" alt=""></a>
            <ul class="notice-sub">
                <li class="order-notice-content">您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></li>
                <li class="order-notice-content">您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></li>
                <li class="order-notice-content">您关注的Selena的小铺又有新的产品上架了....<em class="bluetxt">2 min ago</em></li>
            </ul>
            <a href="" class="goanyway goanyway-blue"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-order-go-back.png" alt="">返回</a>
        </span>
        
    </div>

    <div class="inner clearfix bxsd mb56 rules">
        <h3>一：关于宝宝秀模块</h3>
        <p>宝宝秀模块为欧橡为各位宝妈展示自己宝宝日常照片的一个活动版块，我们会定期推出一系列的活动，活动公开征集照片的时间一般为2周左右
所以该版块我们分为正在进行的活动、已经结束的活动和奖牌榜三个部分。</p>
        <h3>二：如何参加活动</h3>
        <p>在活动开放的时间内，各位宝妈宝爸可以通过“正在进行”进入活动页面，进行选择想要参加的某项活动，点击该部分的任意一处，即可进入对应的该项活动页，在此处可以看到所有参加该项活动的宝宝的照片，点击“立即参加”按钮即可上传宝宝的照片，参与此次活动。</p>
        <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/rules/20150511_RULES_NC-_03.gif" alt="">
        <h3>三：浏览已经结束的活动</h3>
        <p>通过“已经结束”按钮即可进入已经关闭的活动页面，每一项活动仅显示获胜的前6名宝贝的照片，其余前十二名获胜者的照片在活动介绍处以弹窗的形式统一展示。</p>
        <img src="<?php echo SHOP_TEMPLATES_URL;?>/img/rules/20150511_RULES_NC-_06.gif" alt="">
        <h3>四：奖牌榜</h3>
        <p>对于参与者较多主题最火的活动，欧橡将为您邀请设计界最有名的设计师，和微博上最知名的育儿专家，对获胜的前三名进行点评。
该奖励也将一直显示在您的个人账户中，区别与其他用户。</p>
        <h3>五：其他说明</h3>
        <p>欧橡声明，宝宝树版块各位用户所上传的宝宝照片将仅在欧橡网站上进行展示，不会用于其他商业用途，各位用户可放心使用该功能。
任何商家未经允许均不可转载盗用该模块的照片。</p>
    </div>
</div>


<!--返回顶部-->
<a href="javascript:;" id="J-gotop"></a>
<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_minimal-orange',
    radioClass: 'iradio_minimal-orange',
    increaseArea: '20%' // optional
  });
});
</script>