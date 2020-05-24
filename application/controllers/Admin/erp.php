<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(2);
class Erp extends Admin_Controller{
	
public function __construct(){
		parent::__construct();
	}

public function index(){
	echo md5('111111');
		$this->load->view('admin/erpinfo/index.html');
	 }

public function fun1(){

		$this->load->view('admin/erpinfo/erp1.html');
	 }




}