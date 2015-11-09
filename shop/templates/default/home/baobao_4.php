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
            <a href="" class="avatar"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></a>
            <div class="name">毛小琴</div>
            <div class="baby-name">王宇帆<span class="baby-year">6个月</span></div>
        </div>
        <ul class="baby-notice-nav">
            <li><a href="">风采大赛</a></li>
            <li class="on"><a href="">游泳大赛</a></li>
            <li><a href="">满月晒照</a></li>
        </ul>
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
    <div class="banner banner-chanllege">
        <div class="banneri">
            <div class="bd">
                <ul>
                    <li style="background:url(<?php echo SHOP_TEMPLATES_URL;?>/img/banner-chanllege.png) #FCF5EC center 0 no-repeat;"><a href=""></a></li>
                    <li style="background:url(<?php echo SHOP_TEMPLATES_URL;?>/img/banner-chanllege.png) #FCF5EC center 0 no-repeat;"><a href=""></a></li>
                    <li style="background:url(<?php echo SHOP_TEMPLATES_URL;?>/img/banner-chanllege.png) #FCF5EC center 0 no-repeat;"><a href=""></a></li>
                    <li style="background:url(<?php echo SHOP_TEMPLATES_URL;?>/img/banner-chanllege.png) #FCF5EC center 0 no-repeat;"><a href=""></a></li>
                </ul>
            </div>
            <a class="prev"></a>
            <a class="next"></a>
            <div class="hd">
                <ul>
                </ul>
            </div>
        </div>
    </div>
    <div class="baby-main clearfix inner">
        <div class="avatarbox">
            <ul class="avatarlist">
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
            </ul>
            <div class="a-info">
                <h3>清新一夏  秀出你的风采</h3>
                <h4>奖牌榜</h4>
                <p><span>活动介绍：</span>通过上传宝宝的相片和描述，把宝宝的动态在社区进行分享，让关注宝宝的亲朋好友第一时间分享到宝宝成长的快乐。通过上传宝宝的相片和...</p>
            </div>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="avatarbox">
            <ul class="avatarlist">
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
            </ul>
            <div class="a-info">
                <h3>清新一夏  秀出你的风采</h3>
                <h4>奖牌榜</h4>
                <p><span>活动介绍：</span>通过上传宝宝的相片和描述，把宝宝的动态在社区进行分享，让关注宝宝的亲朋好友第一时间分享到宝宝成长的快乐。通过上传宝宝的相片和...</p>
            </div>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="avatarbox">
            <ul class="avatarlist">
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
            </ul>
            <div class="a-info">
                <h3>清新一夏  秀出你的风采</h3>
                <h4>奖牌榜</h4>
                <p><span>活动介绍：</span>通过上传宝宝的相片和描述，把宝宝的动态在社区进行分享，让关注宝宝的亲朋好友第一时间分享到宝宝成长的快乐。通过上传宝宝的相片和...</p>
            </div>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="avatarbox">
            <ul class="avatarlist">
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
            </ul>
            <div class="a-info">
                <h3>清新一夏  秀出你的风采</h3>
                <h4>奖牌榜</h4>
                <p><span>活动介绍：</span>通过上传宝宝的相片和描述，把宝宝的动态在社区进行分享，让关注宝宝的亲朋好友第一时间分享到宝宝成长的快乐。通过上传宝宝的相片和...</p>
            </div>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="avatarbox">
            <ul class="avatarlist">
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
            </ul>
            <div class="a-info">
                <h3>清新一夏  秀出你的风采</h3>
                <h4>奖牌榜</h4>
                <p><span>活动介绍：</span>通过上传宝宝的相片和描述，把宝宝的动态在社区进行分享，让关注宝宝的亲朋好友第一时间分享到宝宝成长的快乐。通过上传宝宝的相片和...</p>
            </div>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="avatarbox">
            <ul class="avatarlist">
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
                <li><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ff-avatar.png" alt=""></li>
            </ul>
            <div class="a-info">
                <h3>清新一夏  秀出你的风采</h3>
                <h4>奖牌榜</h4>
                <p><span>活动介绍：</span>通过上传宝宝的相片和描述，把宝宝的动态在社区进行分享，让关注宝宝的亲朋好友第一时间分享到宝宝成长的快乐。通过上传宝宝的相片和...</p>
            </div>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
        <div class="product pdc_scd">
            <div class="hdr">
                <h1 class="tit tc"><a href="">第二名的宝贝</a></h1>
                <div class="meta">
                    <div class="tc"><a href="">王小贝</a></div>
<!--                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>-->
                </div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/Layer 129.png" alt=""></a>
            <span class="dpc_like">288<i class="ae-like-on"></i></span>
        </div>
    </div>
    <div class="inner clearfix mt10 bxsd recommend ">
        <h2 class="title">推荐商品：</h2>
        <p class="opensans met">YOU MIGHT ALSO BE INSTERESTED ABOUT</p>
        <div class="pageBtn">
            <a href="javascript:;" class="next">&gt;</a>
        </div>
        <div class="bd">
            <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="">德国喜宝有机免敏胡萝卜泥</a></h1>
                <div class="meta">
                    <div><a href="">BABYBIO</a></div>
                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>
                </div>
            </div>
            <div class="price">
                <div class="original">20.5 €</div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/img022.png" alt=""></a>
            <div class="ftr" style="display: none;">
                <p class="info">采用全天然有机的食品原料精心加工而成，清新无污染，健康有保证；...    </p>
                <div class="meta">
                    <span class="like">288<i class="ae-like"></i></span> | 
                    <a class="listing" href=""><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div>
            <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="">德国喜宝有机免敏胡萝卜泥</a></h1>
                <div class="meta">
                    <div><a href="">BABYBIO</a></div>
                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>
                </div>
            </div>
            <div class="price">
                <div class="original">20.5 €</div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/img022.png" alt=""></a>
            <div class="ftr" style="display: none;">
                <p class="info">采用全天然有机的食品原料精心加工而成，清新无污染，健康有保证；...    </p>
                <div class="meta">
                    <span class="like">288<i class="ae-like"></i></span> | 
                    <a class="listing" href=""><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div>
        <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="">德国喜宝有机免敏胡萝卜泥</a></h1>
                <div class="meta">
                    <div><a href="">BABYBIO</a></div>
                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>
                </div>
            </div>
            <div class="price">
                <div class="original">20.5 €</div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/img022.png" alt=""></a>
            <div class="ftr">
                <p class="info">采用全天然有机的食品原料精心加工而成，清新无污染，健康有保证；...    </p>
                <div class="meta">
                    <span class="like">288<i class="ae-like"></i></span> | 
                    <a class="listing" href=""><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div>
        <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="">德国喜宝有机免敏胡萝卜泥</a></h1>
                <div class="meta">
                    <div><a href="">BABYBIO</a></div>
                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>
                </div>
            </div>
            <div class="price">
                <div class="original">20.5 €</div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/img022.png" alt=""></a>
            <div class="ftr">
                <p class="info">采用全天然有机的食品原料精心加工而成，清新无污染，健康有保证；...    </p>
                <div class="meta">
                    <span class="like">288<i class="ae-like"></i></span> | 
                    <a class="listing" href=""><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div>
        <div class="product">
            <div class="hdr">
                <h1 class="tit"><a href="">德国喜宝有机免敏胡萝卜泥</a></h1>
                <div class="meta">
                    <div><a href="">BABYBIO</a></div>
                    <em class="flag"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-flag.png" alt=""></em>
                </div>
            </div>
            <div class="price">
                <div class="original">20.5 €</div>
            </div>
            <a href="" class="cover hover"><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/img022.png" alt=""></a>
            <div class="ftr">
                <p class="info">采用全天然有机的食品原料精心加工而成，清新无污染，健康有保证；...    </p>
                <div class="meta">
                    <span class="like">288<i class="ae-like"></i></span> | 
                    <a class="listing" href=""><img src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-listing.png" alt=""></a>
                </div>
            </div>
            <i class="ae ae-new"></i>
        </div>
        </div>
    <div class="inner mb56">
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
</div>

<div class="footer">
    <div class="footer-info inner">
        <div class="bluetxt inner"><span>We certified all products are exclusively imported from Europe  </span><span>我们确保所有的产品均源自欧洲</span></div>
        <img class="img" src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-footer-info.png" alt="">
    </div>
    <div class="footer-con inner">
        <dl>
            <dt>购物指南</dt>
            <dd><a href="">购物流程</a></dd>
            <dd><a href="">免费注册</a></dd>
            <dd><a href="">常见问题</a></dd>
            <dd><a href="">联系客服</a></dd>
        </dl>
        <dl>
            <dt>配送方式</dt>
            <dd><a href="">关于物流</a></dd>
            <dd><a href="">欧橡保证</a></dd>
        </dl>
        <dl>
            <dt>支付方式</dt>
            <dd><a href="">在线支付</a></dd>
            <dd><a href="">货到付款</a></dd>
            <dd><a href="">邮局汇款</a></dd>
            <dd><a href="">支付宝付款</a></dd>
        </dl>
        <dl>
            <dt>售后服务</dt>
            <dd><a href="">退换货物</a></dd>
            <dd><a href="">物流信息</a></dd>
            <dd><a href="">售后政策</a></dd>
            <dd><a href="">取消订单</a></dd>
        </dl>
        <dl>
            <dt class="opensans">VENDORS</dt>
            <dd><a href="">About us</a></dd>
            <dd><a href="">Guide book</a></dd>
            <dd><a href="">News</a></dd>
        </dl>
        <dl>
            <img class="ae-qrcode" src="<?php echo SHOP_TEMPLATES_URL;?>/img/ae-qcode.png" alt="">
        </dl>
        <dl class="callus">
            <dt>联系我们</dt>
            <dd>地址：上海市静安区江宁77号7楼</dd>
            <dd>电话： 021－7878788</dd>
            <dd>微信号： oak&knight</dd>
        </dl>
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