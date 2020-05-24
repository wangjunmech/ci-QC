<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(2);

class Register extends CI_Controller{

//----------------------------------------------------------
	//构造方法
//----------------------------------------------------------	
public function __construct(){
		parent::__construct();
		$this->load->helper('captcha');
		$this->load->helper('form');
		$this->load->library('form_validation');

	}

//----------------------------------------------------------
//登录注册方法
//----------------------------------------------------------
public function index(){
//	echo '<pre>';
var_dump($_POST);
//    echo '</pre>';
	$data['username'] = $this->input->post('username');
	$this->load->view('register.html',$data);
	}

}

