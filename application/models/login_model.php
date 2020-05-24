<?php
defined('BASEPATH') || exit('No direct script access allowed');
class Login_model extends CI_Model{
	const T = 'user';
        public function __construct(){
       		parent::__construct();
    }

//根据传入的参数获取表中的记录，login输入
public function get_user($udata){
	#表中的字段 ======= 传入的参数
	$condition['username'] = $udata['username'];
	$condition['password'] = $udata['password'];
	$query = $this->db->where($condition)->get(self::T);
	#返回单条记录
	return $query->row_array();
}
		
}
	