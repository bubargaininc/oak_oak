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
class baobaoModel extends Model {

    public function __construct(){
        parent::__construct('baobao');
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

    /*
    *相差时间 
    */
    protected function format($a,$b){
        //检查两个日期大小，默认前小后大，如果前大后小则交换位置以保证前小后大
        if(strtotime($a)>strtotime($b)) list($a,$b)=array($b,$a);
        $start  = strtotime($a);
        $stop   = strtotime($b);
        $extend = ($stop-$start)/86400;
        $result['extends'] = $extend;
        if($extend<7){                //如果小于7天直接返回天数
            $result['daily'] = $extend;
        }elseif($extend<=31){        //小于28天则返回周数，由于闰年2月满足了
            if($stop==strtotime($a.'+1 month')){
                $result['monthly'] = 1;
            }else{
                $w = floor($extend/7);
                $d = ($stop-strtotime($a.'+'.$w.' week'))/86400;
                $result['weekly']  = $w;
                $result['daily']   = $d;
            }
        }else{
            $y=    floor($extend/365);
            if($y>=1){                //如果超过一年
                $start = strtotime($a.'+'.$y.'year');
                $a     = date('Y-m-d',$start);
                //判断是否真的已经有了一年了，如果没有的话就开减
                if($start>$stop){
                    $a = date('Y-m-d',strtotime($a.'-1 month'));
                    $m =11;
                    $y--;    
                }
                $extend = ($stop-strtotime($a))/86400;
            }
            if(isset($m)){
                $w = floor($extend/7);
                $d = $extend-$w*7;
            }else{
                $m = isset($m)?$m:round($extend/30);
                $stop>=strtotime($a.'+'.$m.'month')?$m:$m--;
                if($stop>=strtotime($a.'+'.$m.'month')){
                    $d=$w=($stop-strtotime($a.'+'.$m.'month'))/86400;
                    $w = floor($w/7);
                    $d = $d-$w*7;
                }
            }
            $result['yearly']  = $y;
            $result['monthly'] = $m;
            $result['weekly']  = $w;
            $result['daily']   = isset($d)?$d:null;
        }
        return array_filter($result);
    }

    /**
     * 会员列表
     * @param array $condition
     * @param string $field
     * @param number $page
     * @param string $order
     */
    public function getMemberList($condition = array(), $field = '*', $page = 0, $order = 'member_id desc') {
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
		$member_info['bao_title']			= $param['bao_title'];
		$member_info['bao_time']			= $param['bao_time'];
		$member_info['bao_order']			= $param['bao_order'];
		$member_info['bao_images']			= $param['bao_images'];
		$member_info['bao_uid']            = $param['bao_uid'];
		$result	= Db::insert('baobao',$member_info);
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
		$param['table']	= 'member';
		$param['where']	= $condition_str;
		$param['field']	= $field;
		$param['limit'] = 1;
		$member_list	= Db::select($param);
		$member_info	= $member_list[0];
		if (intval($member_info['store_id']) > 0){
	      $param	= array();
	      $param['table']	= 'store';
	      $param['field']	= 'store_id';
	      $param['value']	= $member_info['store_id'];
	      $field	= 'store_id,store_name,grade_id';
	      $store_info	= Db::getRow($param,$field);
	      if (!empty($store_info) && is_array($store_info)){
		      $member_info['store_name']	= $store_info['store_name'];
		      $member_info['grade_id']	= $store_info['grade_id'];
	      }
		}
		return $member_info;
	}

	/**
	 * 更新会员信息
	 *
	 * @param	array $param 更改信息
	 * @param	int $member_id 会员条件 id
	 * @return	array 数组格式的返回结果
	 */
	public function updateMember($param,$member_id) {
		if(empty($param)) {
			return false;
		}
		$update		= false;
		//得到条件语句
		$condition_str	= " member_id='{$member_id}' ";
		$update		= Db::update('member',$param,$condition_str);
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
		if($conditon_array['member_id'] != '') {
			$condition_sql	.= " and member_id= '" .intval($conditon_array['member_id']). "'";
		}
		if($conditon_array['member_name'] != '') {
			$condition_sql	.= " and member_name='".$conditon_array['member_name']."'";
		}
		if($conditon_array['member_passwd'] != '') {
			$condition_sql	.= " and member_passwd='".$conditon_array['member_passwd']."'";
		}
		//是否允许举报
		if($conditon_array['inform_allow'] != '') {
			$condition_sql	.= " and inform_allow='{$conditon_array['inform_allow']}'";
		}
		//是否允许购买
		if($conditon_array['is_buy'] != '') {
			$condition_sql	.= " and is_buy='{$conditon_array['is_buy']}'";
		}
		//是否允许发言
		if($conditon_array['is_allowtalk'] != '') {
			$condition_sql	.= " and is_allowtalk='{$conditon_array['is_allowtalk']}'";
		}
		//是否允许登录
		if($conditon_array['member_state'] != '') {
			$condition_sql	.= " and member_state='{$conditon_array['member_state']}'";
		}
		if($conditon_array['friend_list'] != '') {
			$condition_sql	.= " and member_name IN (".$conditon_array['friend_list'].")";
		}
		if($conditon_array['member_email'] != '') {
			$condition_sql	.= " and member_email='".$conditon_array['member_email']."'";
		}
		if($conditon_array['no_member_id'] != '') {
			$condition_sql	.= " and member_id != '".$conditon_array['no_member_id']."'";
		}
		if($conditon_array['like_member_name'] != '') {
			$condition_sql	.= " and member_name like '%".$conditon_array['like_member_name']."%'";
		}
		if($conditon_array['like_member_email'] != '') {
			$condition_sql	.= " and member_email like '%".$conditon_array['like_member_email']."%'";
		}
		if($conditon_array['like_member_truename'] != '') {
			$condition_sql	.= " and member_truename like '%".$conditon_array['like_member_truename']."%'";
		}
		if($conditon_array['in_member_id'] != '') {
			$condition_sql	.= " and member_id IN (".$conditon_array['in_member_id'].")";
		}
		if($conditon_array['in_member_name'] != '') {
			$condition_sql	.= " and member_name IN (".$conditon_array['in_member_name'].")";
		}
		if($conditon_array['member_qqopenid'] != '') {
			$condition_sql	.= " and member_qqopenid = '{$conditon_array['member_qqopenid']}'";
		}
		if($conditon_array['member_sinaopenid'] != '') {
			$condition_sql	.= " and member_sinaopenid = '{$conditon_array['member_sinaopenid']}'";
		}
		
		return $condition_sql;
	}
	
// 	/**
// 	 * 会员列表
// 	 *
// 	 * @param array $condition 检索条件
// 	 * @param obj $obj_page 分页对象
// 	 * @return array 数组类型的返回结果
// 	 */
// 	public function getMemberList($condition,$obj_page='',$field='*'){
// 		$condition_str = $this->getCondition($condition);
// 		$param = array();
// 		$param['table'] = 'member';
// 		$param['where'] = $condition_str;
// 		$param['order'] = $condition['order'] ? $condition['order'] : 'member_id desc';
// 		$param['field'] = $field;
// 		$param['limit'] = $condition['limit'];
// 		$member_list = Db::select($param,$obj_page);
// 		return $member_list;
// 	}
	
	/**
	 * 删除会员
	 *
	 * @param int $id 记录ID
	 * @return array $rs_row 返回数组形式的查询结果
	 */
	public function del($id){
		if (intval($id) > 0){
			$where = " member_id = '". intval($id) ."'";
			$result = Db::delete('member',$where);
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
