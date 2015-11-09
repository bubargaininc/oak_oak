/**
*@ Name:        JaneCC.js V1.0.0
*@ Author:      JaneCC
*@ Update:      2015-03-06 16:28:51
*@ Copyright:	http://www.JaneCC.com/
*@ Email:	    i@janecc.com
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
$('.chosenSingle').click(function() {
    $(this).parent().toggleClass("on");
    $(this).siblings('.chosenDrop').toggle();
    $(this).children("i").toggleClass("arrow-top").toggleClass("arrow-bottom");
});
$('.chosenDrop li').click(function() {
    var chosenDropHtml = $(this).children("span").html();
    var chosenDrop=$(this).parent('.chosenDrop');
    var chosenSingle=chosenDrop.siblings(".chosenSingle");
    var chosenSinglei=chosenSingle.children('.chosenSinglei');
    var chosenSingleAe=chosenSingle.children('i');
    chosenDrop.parent().removeClass("on");
    chosenSinglei.html(chosenDropHtml);
    chosenDrop.hide();
    chosenSingleAe.removeClass("arrow-top").addClass("arrow-bottom");
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
$('.btn-view-details').each(function(){
    $(this).bind("click",function(){
        $(this).toggleClass("greytxt").toggleClass("on").children(".ouu").toggleClass("ouu-angle-right").toggleClass("ouu-angle-down");
        $(this).parents('.osg-content').siblings('.osg-plug').slideToggle("555");
    })
//    console.log( $(this).parents('.order-shop-good-list').children().length)
})

});