<?php
/**
 * 账号同步
 *
 *
 *
 *
 * @copyright  Copyright (c) 2007-2013 ShopNC Inc. (http://www.shopnc.net)
 * @license    http://www.shopnc.net
 * @link       http://www.shopnc.net
 * @since      File available since Release v1.1
 */
defined('InShopNC') or exit('Access Invalid!');
class accountControl extends SystemControl{
	private $links = array(
		array('url'=>'act=account&op=qq','lang'=>'qqSettings'),
		array('url'=>'act=account&op=sina','lang'=>'sinaSettings')
	);
	public function __construct(){
		parent::__construct();
		Language::read('setting');
	}



	/**
	 * QQ互联
	 */
	public function qqOp(){
		$model_setting = Model('setting');
		if (chksubmit()){
			$obj_validate = new Validate();
			if (trim($_POST['qq_isuse']) == '1'){
				$obj_validate->validateparam = array(
					array("input"=>$_POST["qq_appid"], "require"=>"true","message"=>Language::get('qq_appid_error')),
					array("input"=>$_POST["qq_appkey"], "require"=>"true","message"=>Language::get('qq_appkey_error'))
				);
			}
			$error = $obj_validate->validate();
			if ($error != ''){
				showMessage($error);
			}else {
				$update_array = array();
				$update_array['qq_isuse'] 	= $_POST['qq_isuse'];
				$update_array['qq_appcode'] = $_POST['qq_appcode'];
				$update_array['qq_appid'] 	= $_POST['qq_appid'];
				$update_array['qq_appkey'] 	= $_POST['qq_appkey'];
				$result = $model_setting->updateSetting($update_array);
				if ($result === true){
					$this->log(L('nc_edit,qqSettings'),1);
					showMessage(Language::get('nc_common_save_succ'));
				}else {
					$this->log(L('nc_edit,qqSettings'),0);
					showMessage(Language::get('nc_common_save_fail'));
				}
			}
		}

		$list_setting = $model_setting->getListSetting();
		Tpl::output('list_setting',$list_setting);

		//输出子菜单
		Tpl::output('top_link',$this->sublink($this->links,'qq'));
		Tpl::showpage('setting.qq_setting');
	}

	/**
	 * sina微博设置
	 */
	public function sinaOp(){
		$model_setting = Model('setting');
		if (chksubmit()){
			$obj_validate = new Validate();
			if (trim($_POST['sina_isuse']) == '1'){
				$obj_validate->validateparam = array(
					array("input"=>$_POST["sina_wb_akey"], "require"=>"true","message"=>Language::get('sina_wb_akey_error')),
					array("input"=>$_POST["sina_wb_skey"], "require"=>"true","message"=>Language::get('sina_wb_skey_error'))
				);
			}
			$error = $obj_validate->validate();
			if ($error != ''){
				showMessage($error);
			}else {
				$update_array = array();
				$update_array['sina_isuse'] 	= $_POST['sina_isuse'];
				$update_array['sina_wb_akey'] 	= $_POST['sina_wb_akey'];
				$update_array['sina_wb_skey'] 	= $_POST['sina_wb_skey'];
				$update_array['sina_appcode'] 	= $_POST['sina_appcode'];
				$result = $model_setting->updateSetting($update_array);
				if ($result === true){
					$this->log(L('nc_edit,sinaSettings'),1);
					showMessage(Language::get('nc_common_save_succ'));
				}else {
					$this->log(L('nc_edit,sinaSettings'),0);
					showMessage(Language::get('nc_common_save_fail'));
				}
			}
		}
		$is_exist = function_exists('curl_init');
		if ($is_exist){
			$list_setting = $model_setting->getListSetting();
			Tpl::output('list_setting',$list_setting);
		}
		Tpl::output('is_exist',$is_exist);

		//输出子菜单
		Tpl::output('top_link',$this->sublink($this->links,'sina'));

		Tpl::showpage('setting.sina_setting');
	}



	/**
	 * 删除品牌
	 */
	public function count_delOp(){
		$lang	= Language::getLangContent();
		$model_brand = Model('count');
		if (intval($_GET['del_count_id']) > 0){
			$model_brand->del(intval($_GET['del_count_id']));
			$this->log(L('nc_delete,brand_index_brand').'[ID:'.intval($_GET['del_count_id']).']',1);
			showMessage($lang['nc_common_del_succ'],'index.php?act=account&op=count');
		}else {
			$this->log(L('nc_delete,brand_index_brand').'[ID:'.intval($_GET['del_count_id']).']',0);
			showMessage($lang['nc_common_del_fail'],'index.php?act=account&op=count');
		}
	}



   /**
   *设计师添加
   */
   public function count_addOp(){
 	Language::read('member');
		$lang	= Language::getLangContent();
		$model_member = Model('count');
		/**
		 * 保存
		 */
		if (chksubmit()){
			/**
			 * 验证
			 */
			$obj_validate = new Validate();
			$obj_validate->validateparam = array(
			array("input"=>$_POST["count_name"], "require"=>"true", "message"=>'请填写国家名称'),
			);

			if (!empty($_FILES['count_images']['name'])){
				$upload = new UploadFile();
				$upload->set('default_dir',ATTACH_COMMON);
				$result = $upload->upfile('count_images');
				if ($result){
					$_POST['count_images'] = $upload->file_name;
				}else {
					showMessage($upload->error,'','','error');
				}
			}

			
			$error = $obj_validate->validate();
			if ($error != ''){
				showMessage($error);
			}else {
				$insert_array = array();
				$insert_array['count_name']	= trim($_POST['count_name']);
				$insert_array['count_sort']	= trim($_POST['count_sort']);
                //默认允许举报商品
                $insert_array['inform_allow'] 	= '1';
				if (!empty($_POST['count_images'])){
					$insert_array['count_images'] = $_POST['count_images'];
			}


				$result = $model_member->addCount($insert_array);
				if ($result){
					$url = array(
					array(
					'url'=>'index.php?act=account&op=count',
					'msg'=>$lang['member_add_back_to_list'],
					),
					array(
					'url'=>'index.php?act=account&op=count_add',
					'msg'=>$lang['member_add_again'],
					),
					);
					$this->log(L('nc_add,member_index_name').'[	'.$_POST['member_name'].']',1);
					showMessage('添加成功',$url);
				}else {
					showMessage('添加失败');
				}
			}
		}
		Tpl::showpage('setting.count_add');
   }


   	/**
	 * 设计师修改
	 */
	public function count_editOp(){
		Language::read('member');
		$lang	= Language::getLangContent();
		$model_member = Model('count');
		/**
		 * 保存
		 */
		if (chksubmit()){
			/**
			 * 验证
			 */
			$obj_validate = new Validate();
			$obj_validate->validateparam = array(
			array("input"=>$_POST["count_name"], "require"=>"true"),
			);

			if (!empty($_FILES['count_images']['name'])){
				$upload = new UploadFile();
				$upload->set('default_dir',ATTACH_COMMON);
				$result = $upload->upfile('count_images');
				if ($result){
					$_POST['count_images'] = $upload->file_name;
				}else {
					showMessage($upload->error,'','','error');
				}
			}



			$error = $obj_validate->validate();
			if ($error != ''){
				showMessage($error);
			}else {
				$update_array = array();
				$update_array['count_id']			= intval($_POST['count_id']);
				$update_array['count_name']			= trim($_POST['count_name']);
				//exit();
			
				if (!empty($_POST['count_images'])){
					$update_array['count_images'] = $_POST['count_images'];
			}


				$result = $model_member->updateMember($update_array,intval($_POST['count_id']));
				if ($result){
					$url = array(
					array(
					'url'=>'index.php?act=account&op=count',
					'msg'=>$lang['member_edit_back_to_list'],
					),
					array(
					'url'=>'index.php?act=account&op=count_edit&count_id='.intval($_POST['count_id']),
					'msg'=>$lang['member_edit_again'],
					),
					);
					$this->log(L('nc_edit,member_index_name').'[ID:'.$_POST['sheji_id'].']',1);
					showMessage($lang['member_edit_succ'],$url);
				}else {
					showMessage($lang['member_edit_fail']);
				}
			}
		}
		$condition['count_id'] = intval($_GET['count_id']);
		$member_array = $model_member->getCountInfo($condition);

		Tpl::output('list_setting',$member_array);
		Tpl::showpage('setting.count_setting');
	}




	/**
	*国家
	*/
	public function countOp(){
		   $model_member = Model('count');
	/**
		 * 检索条件
		 */
		if ($_GET['search_field_value'] != '') {
    		switch ($_GET['search_field_name']){
    			case 'count_name':
    				$condition['count_name'] = array('like', '%' . trim($_GET['search_field_value']) . '%');
    				break;
    			case 'member_email':
    				$condition['member_email'] = array('like', '%' . trim($_GET['search_field_value']) . '%');
    				break;
    			case 'member_truename':
    				$condition['member_truename'] = array('like', '%' . trim($_GET['search_field_value']) . '%');
    				break;
    		}
		}

		/**
		 * 排序
		 */
		$order = trim($_GET['search_sort']);
		if (empty($order)) {
		    $order = 'count_id desc';
		}

		$member_list = $model_member->getList($condition,10, '*');
		Tpl::output('search_field_value',trim($_GET['search_field_value']));
		Tpl::output('member_list',$member_list);
		Tpl::output('page',$model_member->showpage());
		Tpl::showpage('setting.count_list');
	}
}