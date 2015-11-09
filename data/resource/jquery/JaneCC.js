/**
*@ Name:        JaneCC.js V1.0.0
*@ Author:      JaneCC
*@ Update:      2015-03-06 16:28:51
*@ Copyright:   http://www.JaneCC.com/
*@ Email:       i@janecc.com
*/

$(document).ready(function () {
//banner  
$(".banneri").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:false, autoPage:true});
//喜欢按钮
$(".ae-like").bind("click",function(){
    $(this).toggleClass("on")
});
$('.product').hover(function () {
    $(this).children(".ftr").slideToggle(500);
});
//nav bg li效果去除
$(".nav li.on").prev().addClass("nobd");

/*返回顶部*/
$('#J-gotop').hide();
$(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
        $('#J-gotop').fadeIn(400); //当滑动栏向下滑动时，按钮渐现的时间
    } else {
        $('#J-gotop').fadeOut(0); //当页面回到顶部第一屏时，按钮渐隐的时间
    }
});
$('#J-gotop').click(function() {
    $('html,body').animate({
        scrollTop: '0px'
    }, 300); //返回顶部所用的时间 返回顶部也可调用goto()函数
});   

//Input框的提示文字 获得焦点以后需要消失，失去焦点没输入文字需要再显示
//$('.value').focusin(function() {
//    $(this).attr("data-value", function() {
//        return $(this).attr("value");
//    })
//    $(this).removeAttr("value");
//});
//$('.value').focusout(function() {
//    $(this).attr("value", function() {
//        return $(this).attr("data-value");
//    })
//});
  
/*
*   KNIGHT_CATEGORIES_NC
*/

$(".brand-logo").slide({ mainCell:".brandlist", effect:"leftLoop",vis:6,scroll:1,delayTime:300,trigger:"click",easing:"easeOutCirc",pnLoop:true,});

/*
 * 仿select选择效果
 */
$('.ciolbox').bind("mouseenter",function(e) {
    $(this).addClass("on");
    $(this).children('.chosenDrop').show();
    $(this).children().children("i").addClass("arrow-top").removeClass("arrow-bottom");
    if($('.ciolbox').hasClass("on")){
        $('.chosenDrop li').click(function(){
            var chosenDropHtml = $(this).children("span").html();
            var chosenDrop=$(this).parent('.chosenDrop');
            var chosenSingle=chosenDrop.siblings(".chosenSingle");
            var chosenSinglei=chosenSingle.children('.chosenSinglei');
            var chosenSingleAe=chosenSingle.children('i');
            chosenDrop.parent().toggleClass("on");
            chosenDrop.hide();
            chosenSinglei.html(chosenDropHtml);
            chosenSingleAe.removeClass("arrow-top").addClass("arrow-bottom");
        });
        $('.ciolbox').bind("mouseleave",function(e) {
            $(this).removeClass("on");
            $(this).children('.chosenDrop').hide();
            $(this).children().children("i").removeClass("arrow-top").addClass("arrow-bottom");
        });
    }
});

$('.ciolbox i.x').bind("click",function(){
    $(this).parent().hide();
});

//search.html
$(".close_search_item").bind("click",function(){
$(this).toggleClass("otxt").children(".omore").toggle().siblings(".oclose").toggle().siblings("i").toggleClass("ouu-angle-up").toggleClass("ouu-angle-down");
$(this).siblings(".csil-pp").toggleClass("csi_t");
});



//order.js
//打开关闭快递进度
$('.btn-view-details').each(function(){
    $(this).bind("click",function(){
        $(this).toggleClass("greytxt").toggleClass("on").children(".ouu").toggleClass("ouu-angle-right").toggleClass("ouu-angle-down");
        $(this).parents('.osg-content').siblings('.osg-plug').slideToggle("555");
    })
//    console.log( $(this).parents('.order-shop-good-list').children().length)
});

//删除订单
$('.btn-order-delete').each(function(){
    $(this).bind("click",function(){
        var orderDeleteGood = $(this).parents(".order-shop-good");
        var orderDeleteGoodList = $(this).parents(".order-shop-good-list");
        var orderDeleteShop = $(this).parents(".order-shop");
        if(orderDeleteGoodList.children("li").length>1){
//            console.log(orderDeleteGoodList.children("li").length);
            orderDeleteGood.remove();
        }else{
//            console.log(orderDeleteGoodList.children("li").length);
            orderDeleteShop.hide();
        }
    })
});


//加减
//删除
//选择
//多少件


//我们的零售商
$('.vendors-logo li:nth-child(6n)').css("margin-right","0");
$('.vendors-logo img').each(function(){
    var imgBase = $(this).attr("src"),imgHover = $(this).attr("data_src");
    $(this).bind("mouseenter",function(){
        $(this).attr("src",imgHover);
        $(this).attr("data_src_base",imgBase);
    })
    $(this).bind("mouseleave",function(){
        $(this).attr("src",function() {
            return $(this).attr("data_src_base");
        }).removeAttr("data_src_base");
    })
});
$(".vendors-logo").each(function(){
    if($(this).children("li").length>12){
        $(this).siblings('.vendors-logo-btn').children(".more").click(function(){
            $(this).toggle().siblings(".close").toggle();
            $(this).parent().siblings('.vendors-logo').toggleClass('v12');
        });
        $(this).siblings('.vendors-logo-btn').children(".close").click(function(){
            $(this).toggle().siblings(".more").toggle();
            $(this).parent().siblings('.vendors-logo').toggleClass('v12');
        });
    }
});


//page-sidebar

$('.page-sidebar ul>li').bind("click",function(){
    $(this).toggleClass("on").siblings().removeClass("on");
});



//愿望清单
$(".wish-list-con").each(function(){
    if($(this).children(".product").length>12){
        $(this).siblings('.wish-more-btn').children(".more").click(function(){
            $(this).toggle().siblings(".close").toggle();
            $(this).parent().siblings('.wish-list-con').toggleClass('v12');
        });
        $(this).siblings('.wish-more-btn').children(".close").click(function(){
            $(this).toggle().siblings(".more").toggle();
            $(this).parent().siblings('.wish-list-con').toggleClass('v12');
        });
    }
});


//弹出notice
$('.ae-order-notice').each(function(){
    $(this).bind("click",function(){
        $(this).siblings(".notice-sub").slideToggle(200);
    });
});
//商品详情页产品图
$(".info-gallery,.ds-banner").slide({titCell:".hd", mainCell:".bd ul",effect:"fold",autoPlay:false,delayTime:300 ,autoPage:true});

    $('.ae-dd-share').hover(function(){
        $(this).siblings('.sharebox').toggle(200)
    })





$(".recommend").slide({ mainCell:".bd", effect:"leftLoop",vis:4,scroll:1,delayTime:300,trigger:"click",easing:"easeOutCirc",pnLoop:true,});





});