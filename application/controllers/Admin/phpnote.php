<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(2);
class Phpnote extends Admin_Controller{
	
public function __construct(){
		parent::__construct();
	}

public function func(){
		$this->load->view('admin/phpnote/func.html');
	 }
public function index(){
		$this->load->view('admin/phpindex.html');
	 }

public function pgenerator(){
		$this->load->view('admin/phpnote/pgenerator');
	 }
public function pautoload(){
		$this->load->view('admin/phpnote/pautoload');
	 }

public function parameters(){
		$this->load->view('admin/phpnote/parameters');
	 }

public function imgcapture(){
		$this->load->view('admin/phpnote/imgcapture');
	 }
public function simple_mvc(){
		$this->load->view('admin/phpnote/phpMVC.html');
	 }

public function urlparse(){
		$this->load->view('admin/phpnote/urlparse');
	 }

public function preg(){
		$this->load->view('admin/phpnote/preg');
	 }

public function str(){
		$this->load->view('admin/phpnote/str');
	 }


public function test(){
		$this->load->view('admin/phpnote/test');
	 }



}
