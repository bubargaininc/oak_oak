<?php
/**
 * 会员管理
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
class goods_shejiModel extends Model {

    public function __construct(){
        parent::__construct('goods_sheji');
    }
    
    /**
     * 会员详细信息
     * @param array $condition
     * @param string $field
     * @return array
     */
    public function getMemberInfo($condition, $field = '*') {
        return $this->field($field)->where($condition)->find();
    }

    /**
     * 会员列表
     * @param array $condition
     * @param string $field
     * @param number $page
     * @param string $order
     */
    public function getMemberList($condition = array(), $field = '*', $page = 0, $order = 'sheji_id desc') {
       return $this->where($condition)->page($page)->order($order)->select();
    }

    /**
     * 会员数量
     * @param array $condition
     * @return int
     */
    public function getMemberCount($condition) {
        return $this->where($condition)->count();
    }

    /**
     * 登录时创建会话SESSION
     *
     * @param array $member_info 会员信息
     */
    public function createSession($member_info = array()) {
        if (empty($member_info) || !is_array($member_info)) return ;
		$_SESSION['is_login']	= '1';
		$_SESSION['member_id']	= $member_info['member_id'];
		$_SESSION['member_name']= $member_info['member_name'];
		$_SESSION['member_email']= $member_info['member_email'];
		$_SESSION['is_buy']		= $member_info['is_buy'];
		$_SESSION['avatar'] 	= $member_info['member_avatar'];
		$seller_info = Model('seller')->getSellerInfo(array('member_id'=>$_SESSION['member_id']));
		$_SESSION['store_id'] = $seller_info['store_id'];
		if (trim($member_info['member_qqopenid'])){
			$_SESSION['openid']		= $member_info['member_qqopenid'];
		}
		if (trim($member_info['member_sinaopenid'])){
			$_SESSION['slast_key']['uid'] = $member_info['member_sinaopenid'];
		}
		if(!empty($member_info['member_login_time'])) {//登录时间更新
    		$update_info	= array(
    		'member_login_num'=> ($member_info['member_login_num']+1),
    		'member_login_time'=> time(),
    		'member_old_login_time'=> $member_info['member_login_time'],
    		'member_login_ip'=> getIp(),
    		'member_old_login_ip'=> $member_info['member_login_ip']);
    		$this->updateMember($update_info,$member_info['member_id']);
		}
    }

    /**
     * 注册
     */
    public function register($register_info) {
		// 注册验证
		$obj_validate = new Validate();
		$obj_validate->validateparam = array(
		array("input"=>$register_info["username"],		"require"=>"true",		"message"=>'用户名不能为空'),
		array("input"=>$register_info["password"],		"require"=>"true",		"message"=>'密码不能为空'),
		array("input"=>$register_info["password_confirm"],"require"=>"true",	"validator"=>"Compare","operator"=>"==","to"=>$register_info["password"],"message"=>'密码与确认密码不相同'),
		array("input"=>$register_info["email"],			"require"=>"true",		"validator"=>"email", "message"=>'电子邮件格式不正确'),
		);
		$error = $obj_validate->validate();
		if ($error != ''){
            return array('error' => $error);
		}

        // 验证用户名是否重复
		$check_member_name	= $this->infoMember(array('member_name'=>trim($register_info['username'])));
		if(is_array($check_member_name) and count($check_member_name) > 0) {
            return array('error' => '用户名已存在');
		}

        // 验证邮箱是否重复
		$check_member_email	= $this->infoMember(array('member_email'=>trim($register_info['email'])));
		if(is_array($check_member_email) and count($check_member_email)>0) {
            return array('error' => '邮箱已存在');
		}

		// 会员添加
		$member_info	= array();
		$member_info['member_name']		= $register_info['username'];
		$member_info['member_passwd']	= $register_info['password'];
		$member_info['member_email']		= $register_info['email'];
		$insert_id	= $this->addMember($member_info);
		if($insert_id) {
			//添加会员积分
			if ($GLOBALS['setting_config']['points_isuse'] == 1){
				$points_model = Model('points');
				$points_model->savePointsLog('regist',array('pl_memberid'=>$insert_id,'pl_membername'=>$register_info['username']),false);
			}

            // 添加默认相册
            $insert['ac_name']      = '买家秀';
            $insert['member_id']    = $insert_id;
            $insert['ac_des']       = '买家秀默认相册';
            $insert['ac_sort']      = 1;
            $insert['is_default']   = 1;
            $insert['upload_time']  = TIMESTAMP;
            Model()->table('sns_albumclass')->insert($insert);

            $member_info['member_id'] = $insert_id;
            $member_info['is_buy'] = 1;

            return $member_info;
		} else {
            return array('error' => '注册失败');
		}

    }

	/**
	 * 注册商城会员
	 *
	 * @param	array $param 会员信息
	 * @return	array 数组格式的返回结果
	 */
	public function addMember($param) {
		if(empty($param)) {
			return false;
		}
		$member_info	= array();
		$member_info['sheji_id']			= $param['sheji_id'];
		$member_info['sheji_name']			= $param['sheji_name'];
		$member_info['sheji_count']			= $param['sheji_count'];
		$member_info['sheji_address']		= $param['sheji_address'];
		$member_info['sheji_company']			= $member_info['sheji_company'];
		
		$member_info['sheji_desc']		= $param['sheji_desc'];
		$member_info['sheji_avatar']			= $param['sheji_avatar'];
		$member_info['sheji_order']			= $param['sheji_order'];
		$member_info['sheji_sex']		= $param['sheji_sex'];	
		$result	= Db::insert('goods_sheji',$member_info);
		if($result) {
			return Db::getLastId();
		} else {
			return false;
		}
	}
	/**
	 * 获取会员信息
	 *
	 * @param	array $param 会员条件
	 * @param	string $field 显示字段
	 * @return	array 数组格式的返回结果
	 */
	public function infoMember($param, $field='*') {
		if (empty($param)) return false;

		//得到条件语句
		$condition_str	= $this->getCondition($param);
		$param	= array();
		$param['table']	= 'goods_sheji';
		$param['where']	= $condition_str;
		$param['field']	= $field;
		$param['limit'] = 1;
		$member_list	= Db::select($param);
		$member_info	= $member_list[0];

		return $member_info;
	}

	/**
	 * 更新会员信息
	 *
	 * @param	array $param 更改信息
	 * @param	int $member_id 会员条件 id
	 * @return	array 数组格式的返回结果
	 */
	public function updateMember($param,$sheji_id) {
		if(empty($param)) {
			return false;
		}
		$update		= false;
		//得到条件语句
		$condition_str	= "sheji_id='{$sheji_id}'";
		$update		= Db::update('goods_sheji',$param,$condition_str);
		return $update;
	}
	/**
	 * 会员登录检查
	 *
	 */
	public function checkloginMember() {
		if($_SESSION['is_login'] == '1') {
			@header("Location: index.php");
			exit();
		}
	}

    /**
	 * 检查会员是否允许举报商品
	 *
	 */
	public function isMemberAllowInform($member_id) {
        
        $condition = array();
        $condition['member_id'] = $member_id; 
        $member_info = $this->infoMember($condition,'inform_allow');
        if(intval($member_info['inform_allow']) === 1) {
            return true;
        }
        else {
            return false;
        }
	}


	/**
	 * 将条件数组组合为SQL语句的条件部分
	 *
	 * @param	array $conditon_array
	 * @return	string
	 */
	private function getCondition($conditon_array){
		$condition_sql = '';
		if($conditon_array['sheji_id'] != '') {
			$condition_sql	.= " and sheji_id= '" .intval($conditon_array['sheji_id']). "'";
		}
		if($conditon_array['sheji_name'] != '') {
			$condition_sql	.= " and sheji_name='".$conditon_array['sheji_name']."'";
		}
		if($conditon_array['sheji_desc'] != '') {
			$condition_sql	.= " and sheji_desc='".$conditon_array['sheji_desc']."'";
        }
		
		return $condition_sql;
	}
	
 	/**
	 * 会员列表
	 *
	 * @param array $condition 检索条件
	 * @param obj $obj_page 分页对象
	 * @return array 数组类型的返回结果
	 */
public function getList($condition,$obj_page='',$field='*'){
		$condition_str = $this->getCondition($condition);
	$param = array();
	$param['table'] = 'goods_sheji';
	$param['where'] = $condition_str;
	$param['order'] = $condition['order'] ? $condition['order'] : 'sheji_id desc';
	$param['field'] = $field;
 	$param['limit'] = $condition['limit'];
	$member_list = Db::select($param,$obj_page);
	return $member_list;
}
	
	/**
	 * 删除会员
	 *
	 * @param int $id 记录ID
	 * @return array $rs_row 返回数组形式的查询结果
	 */
	public function del($id){
		if (intval($id) > 0){
			$where = "sheji_id = '". intval($id) ."'";
			$result = Db::delete('goods_sheji',$where);
			return $result;
		}else {
			return false;
		}
	}
	/**
	 * 查询会员总数
	 */
	public function countMember($condition){
		//得到条件语句
		$condition_str	= $this->getCondition($condition);
		$count = Db::getCount('member',$condition_str);
		return $count;
	}
}
