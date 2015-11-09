<?php
defined('InShopNC') or exit('Access Invalid!');
/**
 * Taobao import
 */

$lang['taobao_import_online_skey_tip1']	 		= 'SessionKey associated sellers store an identity through Taobao open platform is assigned to a user.';
$lang['taobao_import_online_skey_tip2']	 		= 'Click here to sign up for authorized ';
$lang['taobao_import_online_skey_tip3']	 		= 'After getting the SessionKey authorized, set the SessionKey paste it into the input box, the Mall does not save the value, please keep the <br/> SessionKey survivalTime of about a day or so, if the value is out of date, you need to log in again to get an authorization.';
$lang['taobao_import_online_pageno']	 		= 'Grab the first few pages ';
$lang['taobao_import_online_pagesize']	 		= 'Number of crawl products per page';
$lang['taobao_import_online_tip4']	 			= 'Defaults to 1. Usage scenario: my shop sells merchandise total to 260, the import process: <br/> the first step: grab the first few pages to fill "1", enter additional item submitted, waiting for all the import completes. <Br/> the second step: at this point, importing a total of 100, refresh the page and get ready for the next import. <Br/> step three: grab the first few pages to fill "2", enter additional item submitted, waiting for all the import completes. <Br/> fourth step: at this point, importing a total of 200, refresh the page, for the third time to import. <Br/> fifth step: grab the first few pages fills "3", enter additional item submitted, waiting for all the import completes. <Br/> at this point, importing a total of 260. Import is complete.';
//$lang['taobao_import_online_begintime']	 		= 'Start time';
//$lang['taobao_import_online_endtime']	 		= 'End time';
$lang['taobao_import_online_spec_key']	 		= 'Specification name';
$lang['taobao_import_online_tip5']	 			= 'Specifications name to English comma separated, <a href= "%s" target= "_blank" > not determine what is specifications name, click here </a>, dang mall cannot distinguish Taobao data source of commodity property in the which for specifications Shi, contains above name of property will as specifications save, other as property save, if not fill in, system will automatically distinguish specifications and property, but accuracy will reduced.';
$lang['taobao_import_online_spec_key_value']	= 'Color, color, size';
$lang['taobao_import_online_tip6']	 			= 'Commodity import finished, important tips: <br/> commodity import completed Hou, please must check import Hou each commodity of detailed information whether right, as import Hou of information and Taobao information inconsistent, please manual itself change, commodity where classification was placed to name for "Taobao" of top classification Xia, as need adjustment classification, please and system administrator contact, if appeared individual import failed of commodity, please itself manual import.';
$lang['taobao_import_online_allow_import']	 	= 'System platform does not currently support \r\n Taobao Taobao commodity import goods import system requirements platform: \r\n 1. Set up Taobao taobao_app_key and taobao_secret_key\r\n 2. Synchronous Taobao commodity categories \r\n if any questions please contact the administrator ';
$lang['taobao_import_online_importing']	 		= 'Importing ...';
$lang['taobao_import_online_input_sessionkey']	= 'SessionKey required items';
$lang['taobao_import_online_type_error']	 	= 'Not in the correct format';
$lang['taobao_import_online_import_success']	= 'The import was successful';
$lang['taobao_import_online_import_fail']	 	= 'Import failed';
$lang['taobao_import_online_import_ok']	 		= 'All import completed';
$lang['taobao_import_online_goods_limit']		= 'Your published product is full, please go to the "store settings" upgrade shop for more publishing rights';
$lang['taobao_import_online_time_limit']		= 'You have reached the stores use the term, if you want to continue to increase, please go to the "store settings" upgrade shop';
$lang['taobao_import_online_goods_none']		= 'Not found products';
?>