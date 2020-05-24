<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(2);
class Vue extends Admin_Controller{
	
public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

public function index(){
		$this->load->view('admin/vindex.html');
	 }

//***********************************************************************
//***********************************************************************
//namemodifier，批量文件名修改器，对指定目录下的文件名进行批量处理
public function v1() {
	$this->load->view('admin/vue/v1.html');

	}
public function v2() {

var_dump($_POST);


$this->load->view('admin/vue/v2.html');

}
public function v3() {
$this->load->view('admin/vue/v3.html');

}

public function v4() {
$this->load->view('admin/vue/v4.html');
}

public function v5() {
$this->load->view('admin/vue/v5.html');
}
public function v6() {
$this->load->view('admin/vue/v6.html');
}
public function v7() {
$this->load->view('admin/vue/v7.html');
}
public function v8() {
$this->load->view('admin/vue/v8.html');
}
public function v9() {
$this->load->view('admin/vue/v9.html');
}
public function v10() {
$this->load->view('admin/vue/v10.html');
}
public function v11() {
$this->load->view('admin/vue/v11.html');
}
public function v13() {
$this->load->view('admin/vue/v13.html');
}
public function v14() {
$this->load->view('admin/vue/v14.html');
}
public function v15() {
$this->load->view('admin/vue/v15.html');
}
public function v16() {
$this->load->view('admin/vue/v16.html');
}
public function v17() {
$this->load->view('admin/vue/v17.html');
}
public function v18() {
$this->load->view('admin/vue/v18.html');
}
public function v19() {
$this->load->view('admin/vue/v19.html');
}
public function v20() {
$this->load->view('admin/vue/v20.html');
}

}
