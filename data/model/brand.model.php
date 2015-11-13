<?php
/**
 * 商品品牌模型
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

class brandModel extends Model {
    public function __construct() {
        parent::__construct('brand');
    }
    
    /**
     * 通过的品牌列表
     * 
     * @param array $condition
     * @param string $field
     * @return array
     */
    public function getBrandPassList($condition, $field = '*') {
        $condition['brand_apply'] = 1;
        return $this->where($condition)->field($field)->select();
    }
    
    /**
     * 查询品牌数量
     * @param array $condition
     * @return array
     */
    public function getBrandCount($condition) {
        return $this->where($condition)->count();
    }
    
	/**
	 * 品牌列表
	 *
	 * @param array $condition 检索条件
	 * @return array 数组结构的返回结果
	 */
	public function getBrandList($condition,$page=''){
		$condition_str = $this->_condition($condition);
		$param = array();
		$param['table'] = 'brand';
		$param['order'] = $condition['order'] ? $condition['order'] : 'brand_sort';
		$param['where'] = $condition_str;
		$param['field'] = $condition['field'];
		$param['group'] = $condition['group'];
		$param['limit'] = $condition['limit'];
		$result = Db::select($param,$page);		
		return $result;
	}
	
	/**
	 * 构造检索条件
	 *
	 * @param int $id 记录ID
	 * @return array $rs_row 返回数组形式的查询结果
	 */
	private function _condition($condition){
		$condition_str = '';
		
		if ($condition['brand_class'] != ''){
			$condition_str .= " and brand_class = '". $condition['brand_class'] ."'";
		}
		if ($condition['brand_recommend'] != ''){
			$condition_str .= " and brand_recommend = '". intval($condition['brand_recommend']) ."'";
		}
		if ($condition['no_brand_id'] != ''){
			$condition_str .= " and brand_id != '". intval($condition['no_brand_id']) ."'";
		}
		if ($condition['brand_id'] != ''){
			$condition_str .= " and brand_id = '". intval($condition['brand_id']) ."'";
		}
		if ($condition['no_in_brand_id'] != ''){
			$condition_str .= " and brand_id NOT IN( ". $condition['no_in_brand_id'] ." )";
		}
		if ($condition['brand_name'] != ''){
			$condition_str .= " and brand_name = '". $condition['brand_name'] ."'";
		}
		if ($condition['like_brand_name'] != ''){
			$condition_str .= " and brand_name like '%". $condition['like_brand_name'] ."%'";
		}
		if ($condition['like_brand_class'] != ''){
			$condition_str .= " and brand_class like '%". $condition['like_brand_class'] ."%'";
		}
		if ($condition['brand_apply'] != ''){
			$condition_str .= " and brand_apply = '". $condition['brand_apply'] ."'";
		}
		if($condition['storeid_equal'] != '') {
			$condition_str	.= " and store_id = '{$condition['storeid_equal']}'";
		}
		if($condition['store_id'] != ''){
			$condition_str	.= " and store_id in(".$condition['store_id'].")";
		}
		if($condition['brand_count'] != ''){
			$condition_str	.= " and brand_count in(".$condition['brand_count'].")";
		}
		return $condition_str;
	}
	
	/**
	 * 取单个品牌的内容
	 *
	 * @param int $brand_id 品牌ID
	 * @return array 数组类型的返回结果
	 */
	public function getOneBrand($brand_id){
		if (intval($brand_id) > 0){
			$param = array();
			$param['table'] = 'brand';
			$param['field'] = 'brand_id';
			$param['value'] = intval($brand_id);
			$result = Db::getRow($param);
			return $result;
		}else {
			return false;
		}
	}


	/**
	 * 取单个品牌的名称 
	 *
	 * @param int $brand_id 品牌ID
	 * @return array 数组类型的返回结果
	 */
	public function getOneBrand_name($brand_id){
		if (intval($brand_id) > 0){
			$param = array();
			$param['table'] = 'brand';
			$param['field'] = 'brand_id';
			$param['value'] = intval($brand_id);
			$result = Db::getRow($param);
			return $result['brand_name'];
		}else {
			return false;
		}
	}

	
	/**
	 * 新增
	 *
	 * @param array $param 参数内容
	 * @return bool 布尔类型的返回结果
	 */
	public function add($param){
		if (empty($param)){
			return false;
		}
		if (is_array($param)){
			$tmp = array();
			foreach ($param as $k => $v){
				$tmp[$k] = $v;
			}
			$result = Db::insert('brand',$tmp);
			return $result;
		}else {
			return false;
		}
	}
	
    /**
     * 获取单条商品SKU信息
     * 
     * @param array $condition
     * @param string $field
     * @return array
     */
    public function getbrandInfo($condition, $field = '*') {
        return $this->table('brand')->field($field)->where($condition)->find();
    }

	/**
	 * 查询店铺列表
     *
	 * @param array $condition 查询条件
	 * @param int $page 分页数
	 * @param string $order 排序
	 * @param string $field 字段
	 * @param string $limit 取多少条
     * @return array
	 */
    public function getStoreList($condition, $page = null, $order = '', $field = '*', $limit = '') {
        $result = $this->field($field)->where($condition)->order($order)->limit($limit)->page($page)->select();
        return $result;
    }




		/*
	 * 编辑店铺
     *
	 * @param array $update 更新信息
	 * @param array $condition 条件
	 * @return bool
	 */
    public function editbrand($update, $condition){

        //清空缓存
        $store_list = $this->getStoreList($condition);
        foreach ($store_list as $value) {
            wcache($value['brand_id'], array(), 'store_info');
        }

        return $this->where($condition)->update($update);
    }


	/**
	 * 更新信息
	 *
	 * @param array $param 更新数据
	 * @return bool 布尔类型的返回结果
	 */
	public function edit($param){
		if (empty($param)){
			return false;
		}
		if (is_array($param)){
			$tmp = array();
			foreach ($param as $k => $v){
				$tmp[$k] = $v;
			}
			$where = " brand_id = '". $param['brand_id'] ."'";
			$result = Db::update('brand',$tmp,$where);
			return $result;
		}else {
			return false;
		}
	}
	
	/**
	 * 删除品牌
	 *
	 * @param int $id 记录ID
	 * @return bool 布尔类型的返回结果
	 */
	public function del($id){
		if (intval($id) > 0){
			$where = " brand_id = '". intval($id) ."'";
			$result = Db::delete('brand',$where);
			return $result;
		}else {
			return false;
		}
	}
}