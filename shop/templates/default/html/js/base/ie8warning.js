var ie8warning = '<div id="outer"><div id="inner"><span onclick="closeme()">&times;</span><h6>系统检测到您浏览器版本太低，黑客容易利用其植入木马或病毒，</h6><h6>从而对您的账户构成威胁。建议您下载：</h6><div id="links"><a href="http://rj.baidu.com/soft/detail/14744.html" target="_blank"><img src="http://img3sw.baidu.com/soft/9d/14744/b746f41a61876795b7980f56a07a4e47.png">Chrome</a><a href="http://www.uc.cn/" target="_blank"><img src="http://www.uc.cn/favicon.ico">UC浏览器</a><a href="http://www.firefox.com.cn/download/" target="_blank"><img src="http://www.firefox.com.cn/favicon.ico">Firefox</a><a href="http://chrome.360.cn/" target="_blank"><img src="http://chrome.360.cn/favicon.ico">360极速浏览器</a></div></div></div>';

var ie8css = "#ie8-warning {background: #F2DEDE;color: #a94442;position: fixed;bottom: 0;left: 0;width: 100%;text-align: center;font-size: 14px;line-height: 1;z-index: 9999;font-family: 'Microsoft YaHei', sans-serif;display: table;padding: 10px 0 20px 0;border-top: 2px solid #a94442;}#ie8-warning span {position: absolute;cursor: pointer;right: 40px;top: 0;font-size: 40px;line-height: 40px;color: #000;}#ie8-warning h6 {margin: 15px;font-size: 18px;text-align: center;cursor: default;font-weight:bold;}#ie8-warning a {text-decoration: none;font-size: 16px;color: #a94442;position: relative;margin-left:5px;margin-right:5px;}#ie8-warning a img{width:20px;height:20px;margin-right:3px;margin-top:-2px;vertical-align:top;border:0;}#ie8-warning a:hover {text-decoration: none;}#ie8-warning a:active {color: maroon;top: 1px;}#ie8-warning #outer {display: table-cell;vertical-align: middle;text-align: center;position: relative;}";

var warningShow = getCookie('warningShow');

if (window.$) {
  $(document).ready(function () {
    Main();
  })
} else {
  Main();
}

function getCookie(name) {
  var strCookie = document.cookie;
  var arrCookie = strCookie.split("; ");
  for (var i = 0; i < arrCookie.length; i++) {
    var arr = arrCookie[i].split("=");
    if (arr[0] == name) return arr[1];
  }
  return "";
}

function addCookie(name, value, expiresHours) {
  var cookieString = name + "=" + escape(value);
  if (expiresHours > 0) {
    var date = new Date();
    date.setTime(date.getTime + expiresHours * 3600 * 1000);
    cookieString = cookieString + "; expires=" + date.toGMTString();
  }
  document.cookie = cookieString;
}

function closeme() {
  var div = document.getElementById("ie8-warning");
  div.parentNode.removeChild(div);
  addCookie('warningShow', 'true');
}

function Main() {
  if (!warningShow) {
    addCookie('warningShow', 'false');
  }
  if (warningShow === "false" || warningShow === "") {
    isIE = !-[1, ];
    if (isIE) {
      if (document.styleSheets[0]) {
        var style = document.styleSheets[0];
        style.cssText += ie8css;
      } else {
        var style = document.createElement('style');
        document.getElementsByTagName('head')[0].appendChild(style);
        style.cssText = ie8css;
      }
    } else {
      var style = document.createElement('style');
      style.innerHTML = ie8css;
      document.getElementsByTagName('head')[0].appendChild(style);
    }
    var content = document.createElement('div');
    content.setAttribute('id', 'ie8-warning');
    content.innerHTML = ie8warning;
    var first = document.body.firstChild;
    document.body.insertBefore(content, first);
  }
}
