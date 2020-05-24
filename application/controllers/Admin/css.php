<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(2);
class Css extends Admin_Controller{
	
public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}


//***********************************************************************
//***********************************************************************
//namemodifier，批量文件名修改器，对指定目录下的文件名进行批量处理
public function c1() {
	$this->load->view('admin/css/c1.html');

	}
}