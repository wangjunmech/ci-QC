<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(2);
class trading extends Admin_Controller{
	
public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

public function index(){
		$this->load->view('admin/tradingindex.html');
	 }

//***********************************************************************
//***********************************************************************
//namemodifier，批量文件名修改器，对指定目录下的文件名进行批量处理
public function t1() {
	$this->load->view('admin/trading/tr1.html');

	}
public function t2() {

var_dump($_POST);


$this->load->view('admin/trading/tr2.html');

}
public function t3() {
$this->load->view('admin/trading/tr3.html');

}

public function t4() {
$this->load->view('admin/trading/tr4.html');
}

public function t5() {
$this->load->view('admin/trading/tr5.html');
}
public function t6() {
$this->load->view('admin/trading/tr6.html');
}
public function t7() {
$this->load->view('admin/trading/tr7.html');
}
public function t8() {
$this->load->view('admin/trading/tr8.html');
}
public function t9() {
$this->load->view('admin/trading/tr9.html');
}
public function t10() {
$this->load->view('admin/trading/tr10.html');
}
public function t11() {
$this->load->view('admin/trading/tr11.html');
}
public function t13() {
$this->load->view('admin/trading/tr13.html');
}
public function t14() {
$this->load->view('admin/trading/tr14.html');
}
public function t15() {
$this->load->view('admin/trading/tr15.html');
}
public function t16() {
$this->load->view('admin/trading/tr16.html');
}
public function t17() {
$this->load->view('admin/trading/tr17.html');
}
public function t18() {
$this->load->view('admin/trading/tr18.html');
}
public function t19() {
$this->load->view('admin/trading/tr19.html');
}
public function t20() {
$this->load->view('admin/trading/tr20.html');
}
public function t21() {
$this->load->view('admin/trading/tr21.html');
}

}
