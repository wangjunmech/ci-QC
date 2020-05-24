<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(2);
class mech extends Admin_Controller{
	
public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

public function index(){
		$this->load->view('admin/mech.html');
	 }

//***********************************************************************
//***********************************************************************
//namemodifier，批量文件名修改器，对指定目录下的文件名进行批量处理
public function pcr() {
	$this->load->view('admin/mech/plastic-chemchart.html');

	}
public function m1() {
	$this->load->view('admin/mech/m1.html');

	}
public function m2() {

// var_dump($_POST);


$this->load->view('admin/mech/m2.html');

}
public function m3() {
$this->load->view('admin/mech/m3.html');

}

public function m4() {
$this->load->view('admin/mech/m4.html');
}

public function m5() {
$this->load->view('admin/mech/m5.html');
}
public function m6() {
$this->load->view('admin/mech/m6.html');
}
public function m7() {
$this->load->view('admin/mech/m7.html');
}
public function m8() {
$this->load->view('admin/mech/m8.html');
}
public function m9() {
$this->load->view('admin/mech/m9.html');
}
public function m10() {
$this->load->view('admin/mech/m10.html');
}
public function m11() {
$this->load->view('admin/mech/m11.html');
}
public function m12() {
$this->load->view('admin/mech/m12.html');
}
public function m13() {
$this->load->view('admin/mech/m13.html');
}
public function m14() {
$this->load->view('admin/mech/m14.html');
}
public function m15() {
$this->load->view('admin/mech/m15.html');
}
public function m16() {
$this->load->view('admin/mech/m16.html');
}
public function m17() {
$this->load->view('admin/mech/m17.html');
}
public function m18() {
$this->load->view('admin/mech/m18.html');
}
public function m19() {
$this->load->view('admin/mech/m19.html');
}
public function m20() {
$this->load->view('admin/mech/m20.html');
}
public function m21() {
$this->load->view('admin/mech/m21.html');
}
// **********************
public function m111() {
$this->load->view('admin/mech/metals/304.html');
}
public function m222() {
$this->load->view('admin/mech/metals/al.html');
}

}
