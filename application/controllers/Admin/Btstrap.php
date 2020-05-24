<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(2);
class btstrap extends Admin_Controller{
	
public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

public function index(){
		$this->load->view('admin/btindex.html');
	 }

//***********************************************************************
//***********************************************************************

public function bt1() {
	$this->load->view('admin/btstrap/bt1.html');
	}

public function bt2() {
	$this->load->view('admin/btstrap/bt2.html');
	}
public function bt3() {
	$this->load->view('admin/btstrap/bt3.html');
	}
public function bt4() {
	$this->load->view('admin/btstrap/bt4.html');
	}
public function bt5() {
	$this->load->view('admin/btstrap/bt5.html');
	}
public function bt6() {
	$this->load->view('admin/btstrap/bt6.html');
	}
public function bt7() {
	$this->load->view('admin/btstrap/bt7.html');
	}
public function bt8() {
	$this->load->view('admin/btstrap/bt8.html');
	}
public function bt9() {
	$this->load->view('admin/btstrap/bt9.html');
	}
public function bt10() {
	$this->load->view('admin/btstrap/bt10.html');
	}
public function bt11() {
	$this->load->view('admin/btstrap/bt11.html');
	}
public function bt12() {
	$this->load->view('admin/btstrap/bt12.html');
	}
public function bt13() {
	$this->load->view('admin/btstrap/bt13.html');
	}











}
