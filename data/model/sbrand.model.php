<?php
/**
 * 买家收藏
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
class sbrandModel extends Model{
    public function __construct() {
        parent::__construct('sbrand');
    }
    
    /**
     * 收藏列表
     * 
     * @param array $condition
     * @param treing $field
     * @param int $page
     * @param string $order
     * @return array
     */
    public function getFavoritesList($condition, $field = '*', $page = 0 , $order = 'add_time desc') {
        return $this->where($condition)->order($order)->field($field)->page($page)->select();
    }
    
    /**
     * 收藏商品列表
     * @param array $condition
     * @param treing $field
     * @param int $page
     * @param string $order
     * @return array
     */
    public function getGoodsFavoritesList($condition, $field = '*', $page = 0, $order = 'add_time desc') {
        return $this->getFavoritesList($condition,$field,$page, $order);
    }
    
    /**
     * 收藏店铺列表
     * @param array $condition
     * @param treing $field
     * @param int $page
     * @param string $order
     * @return array
     */
    public function getStoreFavoritesList($condition, $field = '*', $page = 0, $order = 'add_time desc') {
        return $this->getFavoritesList($condition, $page, $order);
    }
// 	/**
// 	 * 收藏列表
// 	 *
// 	 * @param array $condition 检索条件
// 	 * @param obj $obj_page 分页对象
// 	 * @return array 数组类型的返回结果
// 	 */
// 	public function getFavoritesList($condition,$page = ''){
// 		$condition_str = $this->_condition($condition);
// 		$param = array(
// 					'table'=>'favorites',
// 					'where'=>$condition_str,
// 					'order'=>$condition['order'] ? $condition['order'] : 'fav_time desc'
// 				);		
// 		$result = Db::select($param,$page);
// 		return $result;
// 	}	
	/**
	 * 取单个收藏的内容
	 *
	 * @param array $condition 查询条件
	 * @param string $field 查询字段
	 * @return array 数组类型的返回结果
	 */
	public function getOneFavorites($condition,$field='*'){
		$param = array();
		$param['table'] = 'sbrand';
		$param['field'] = array_keys($condition);
		$param['value'] = array_values($condition);
		return Db::getRow($param,$field);
	}
	
	/**
	 * 新增收藏
	 *
	 * @param array $param 参数内容
	 * @return bool 布尔类型的返回结果
	 */
	public function addFavorites($param){
		if (empty($param)){
			return false;
		}

		return Db::insert('sbrand',$param);
	}
	
	/**
	 * 更新收藏数量
	 * 
	 * 
	 * @param string $table 表名
	 * @param array  $update 更新内容
	 * @param array  $param  相应参数
	 * @return bool 布尔类型的返回结果
	 */
	public function updateFavoritesNum($table, $update, $param){
		$where = $this->_condition($param);
		return Db::update($table,$update,$where);
	}
	
	/**
	 * 验证是否为当前用户收藏
	 *
	 * @param array $param 条件数据
	 * @return bool 布尔类型的返回结果
	 */
	public function checkFavorites($fav_id,$fav_type,$member_id){
		if (intval($fav_id) == 0 || empty($fav_type) || intval($member_id) == 0){
			return true;
		}
		$result = self::getOneFavorites($fav_id,$fav_type,$member_id);
		if ($result['member_id'] == $member_id){
			return true;
		}else {
			return false;
		}
	}
	
	/**
	 * 删除
	 *
	 * @param int $id 记录ID
	 * @return array $rs_row 返回数组形式的查询结果
	 */
	public function delFavorites($condition){
		if (empty($condition)){
			return false;
		}
		$condition_str = '';	
		if ($condition['yuan_id'] != ''){
			$condition_str .= " and yuan_id='{$condition['fav_id']}' ";
		}
		if ($condition['member_id'] != ''){
			$condition_str .= " and member_id='{$condition['member_id']}' ";
		}

		return Db::delete('yuan',$condition_str);
	}
	/**
	 * 构造检索条件
	 *
	 * @param array $condition 检索条件
	 * @return string 字符串类型的返回结果
	 */
	public function _condition($condition){
		$condition_str = '';
		
		if ($condition['yuan_id'] != ''){
			$condition_str .= " and yuan_id = '".$condition['yuan_id']."'";
		}


		if ($condition['member_id'] != ''){
			$condition_str .= " and member_id = '".$condition['member_id']."'";
		}
		if ($condition['goods_id'] != ''){
			$condition_str .= " and goods_id = '".$condition['goods_id']."'";
		}

		return $condition_str;
	}
}
