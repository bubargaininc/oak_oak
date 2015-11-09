
	DialogManager.close = function(id) {
		__DIALOG_WRAPPER__[id].hide();
		ScreenLocker.unlock();
  }
	DialogManager.show = function(id) {
		if (__DIALOG_WRAPPER__[id]) {
			__DIALOG_WRAPPER__[id].show();
			ScreenLocker.lock();
			return true;
		}
		return false;
  }
  var recommend_max = 4;//推荐数
  var goods_max = 8;//商品数
  var brand_max = 12;//品牌限制
  var recommend_show = 1;//当前选择的商品推荐
  var slide_pic_max = 5;//切换广告图片限制
  var sale_max = 5;//促销区组数
  var sale_goods_max = 5;//商品数
	var titles = new Array();
	titles["category_list"] = '推荐分类';
	titles["brand_list"] = '推荐品牌';
	titles["recommend_list"] = '商品推荐';
	titles["upload_tit"] = '标题设置';
	titles["upload_act"] = '活动图片';
	titles["recommend_pic"] = '推荐模块';
	titles["upload_adv"] = '切换广告图片';
	titles["sale_list"] = '促销商品推荐';

$(function(){
    //自定义滚定条
    $('.middle').perfectScrollbar();
    //随Y轴滚动固定层定位
    $('.middle').waypoint(function(event, direction) {
    	$(this).parent().toggleClass('sticky', direction === "down");
            event.stopPropagation();
    });
    $(".middle").sortable({
        items: 'dl',
        update: function(event, ui) {//推荐拖动排序保存
            $("#recommend_input_list").html('');
            $(".middle dl").each(func