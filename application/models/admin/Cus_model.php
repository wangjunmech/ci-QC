<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Cus_model extends CI_Model{
	private $t="client_list";
	private $id= 'id';
	private $client_code= 'client_code';
	private $sales= 'sales';
	private $contry= 'contry';
	private $company= 'company';
	private $site= 'site';
	private $des= 'des';
	private $regtime= 'regtime';
	
	
//获取表中的记录
	public function printcus($workid){//查询
//获取表中记录的两种写法
		//$cuslist=$this->db->query('select '.$this->email.', '.$this->des.' from '.$this->t)->result_array();
		//$this->db->select($this->id.','.$this->email.','.$this->des.','.$this->name.','.$this->site);
		$condition['sales']=$workid;
		$data = $this->db->where($condition)->get($this->t)->result_array();
		//$cuslist1= $this->db->select()->from()->join()->order_by()->get()->result_array();
		//$data= $this->db->select($this->id.','.$this->email.','.$this->des.','.$this->name.','.$this->site)->from($this->t)->order_by('id','asc')->get()->result_array();
		return $data;		
	}
	
//获取表中的字段
	public function showfields(){
		$fields = $this->db->list_fields($this->t);
		return ($fields);
		}	

public function edit($id){//修改编辑
	//$this->db->select($this->id.','.$this->email.','.$this->des.','.$this->name.','.$this->site);
	$data['cinfo'] = $this->db->get_where('client_list',array('client_code'=>$id))->result_array();
		return $data;
		}
		
public function update($id,$data){//修改记录
			
		$condition['id'] = $id;
		return $this->db->where($condition)->update($this->t,$data);
		}
	
		
//向表中插入记录
	public function clietinsert($data){
		return $this->db->insert($this->t, $data);
	}
}