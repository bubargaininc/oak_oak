<?php
defined('InShopNC') or exit('Access Invalid!');

$lang['store_goods_index_goods_limit']			= 'You have reached the upper limit of the Add item';
$lang['store_goods_index_goods_limit1']			= 'If you want to continue to increase, please go to the "store settings" upgrade shop';
$lang['store_goods_index_pic_limit']			= 'You have reached the upper limit of the picture space';
$lang['store_goods_index_pic_limit1']			= 'M, if you want to raise, please go to the "store settings" upgrade shop';
$lang['store_goods_index_time_limit']			= 'You have reached the stores use the term, if you want to continue to increase, please go to the "store settings" upgrade shop';
$lang['store_goods_index_no_pay_type']			= 'Platform for payment has not been set, please contact platform';
/**
 * Picture upload
 */
$lang['store_goods_upload_pic_limit']			= 'You have reached the upper limit of the picture space';
$lang['store_goods_upload_pic_limit1']			= 'M, if you want to raise, please go to the "store settings" upgrade shop';
$lang['store_goods_upload_fail']				= 'Upload failed';
$lang['store_goods_upload_upload']				= 'Upload';
$lang['store_goods_upload_normal']				= 'Regular upload';
$lang['store_goods_upload_del_fail']			= 'Failed to delete pictures';
$lang['store_goods_img_upload']					= 'Picture upload';

/**
 * Taobao import
 */
$lang['store_goods_import_choose_file']		= 'Please select a file to upload CSV';
$lang['store_goods_import_unknown_file']	= 'Files from unknown sources';
$lang['store_goods_import_wrong_type']		= 'File type must be CSV, you can upload files of type:';
$lang['store_goods_import_size_limit']		= 'File size must be '.ini_get ('upload_max_filesize'). ' Within ';
$lang['store_goods_import_wrong_class']		= 'Please select a product category (must be selected to the final level)';
$lang['store_goods_import_wrong_class1']	= 'The classification of goods is not available, please select a product category (must be selected to the final level)';
$lang['store_goods_import_wrong_class2']	= 'Must be selected to the last level';
$lang['store_goods_import_wrong_column']	= 'File field and the field does not match the system requirements, please read the importing description';
$lang['store_goods_import_choose']			= 'Please select ...';
$lang['store_goods_import_step1']			= 'The first step: importing CSV files';
$lang['store_goods_import_choose_csv']		= 'The first step: importing CSV files';
$lang['store_goods_import_title_csv']		= 'Import default import program from a second row, leave the first line of the CSV file header row, the greatest '.ini_get('upload_max_filesize');
$lang['store_goods_import_goods_class']		= 'Classification of goods：';
$lang['store_goods_import_store_goods_class']	= 'Shop category：';
$lang['store_goods_import_new_class']			= 'Add classification';
$lang['store_goods_import_belong_multiple_store_class']	= 'Can belong to more than one shop categories';
$lang['store_goods_import_unicode']			= 'Character encoding：';
$lang['store_goods_import_file_type']		= 'File format:';
$lang['store_goods_import_file_csv']		= 'CSV file';
$lang['store_goods_import_desc']			= 'Import description：';
$lang['store_goods_import_csv_desc']		= '1. If you modify Microsoft Excel CSV file be sure to use the software, and must ensure that the first row header names containing the following items:
Baby names, baby items, new or old, baby, baby price, quantity, validity period, freight commitment, by surface mail, EMS, express, Windows recommendation, description of the baby, the new picture. <br/>
2. If because of discrepancies in Taobao Assistant version differences in header name, please modify the above names can be imported, does not differentiate between new and used, idle, new or old, after importing the types of goods are brand new.<br/>
3.If the CSV file over'.ini_get('upload_max_filesize').'Please edit a split into multiple files to be imported by Excel software.<br/>
4.Import each product supports up to 5 pictures。';
$lang['store_goods_import_submit']			= 'Import';
$lang['store_goods_import_step2']			= 'Step two: upload product images';
$lang['store_goods_import_tbi_desc']		= 'Please upload the images directory at the same level with the CSV file (or a directory with the same name as the CSV file) within the TBI files';
$lang['store_goods_import_upload_complete'] = "Upload completed";
$lang['store_goods_import_doing'] 			= "Importing ...";
$lang['store_goods_import_step3']			= 'The third step: data processing';
$lang['store_goods_import_remind']			= 'Data processing can be carried out only after the first two steps, confirm data ';
$lang['store_goods_import_remind2']			= '（If the picture several times to upload, please upload all pictures to complete finishing）';
$lang['store_goods_import_pack']			= 'The data processing';
$lang['store_goods_pack_wrong1']			= 'Please import a CSV file';
$lang['store_goods_pack_wrong2']			= 'Please import the correct CSV file';
$lang['store_goods_pack_success']			= 'Data consolidation success';
$lang['store_goods_import_end']				= '，At last';
$lang['store_goods_import_products_no_import']	= 'Products not imported';
$lang['store_goods_import_area']			= 'Location：';

/*Taobao file import*/
$lang['store_goods_import_upload_album'] = 'Import album select';
$lang['store_goods_index_batch_upload']	 = 'Bulk upload';

/**
 * ajaxModify product titles
 */
$lang['store_goods_title_change_tip']		= 'Click the title name of the item, the length of <br/> at least 3 characters and a maximum of 50 characters';

/**
 * ajaxModify product inventory
 */
$lang['store_goods_stock_change_stock']		= 'Modify the inventory';
$lang['store_goods_stock_change_tip']		= 'Click the modify inventory';
$lang['store_goods_stock_stock_sum']		= 'Total inventory';
$lang['store_goods_stock_change_more_stock']= 'Modify the additional inventory information';
$lang['store_goods_stock_input_error']		= 'Please fill in the number is not less than zero!';

/**
 * ajaxModify product inventory
 */
$lang['store_goods_price_change_price']		= 'Modify the price';
$lang['store_goods_price_change_tip']		= 'Click the modify price ';
$lang['store_goods_price_change_more_price']= 'Modify more price information';
$lang['store_goods_price_input_error']		= 'Please fill in the correct price!';

/**
 * ajaxModify product recommendation
 */
$lang['store_goods_commend_change_tip']		= 'Choose whether to store featured products ';

?>
