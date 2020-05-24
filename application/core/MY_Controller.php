<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

#定义前台总控制器
class Home_Controller extends CI_Controller {



	public function __construct(){
		parent::__construct();
				echo '继承自MY_controller下面的Home控制器<br>';

		#开启皮肤功能
		$this->load->switch_theme_on();
	}
}
#定义后台总控制器
class Admin_Controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//echo '继承自MY_controller下面的admin控制器<br>';
		//权限验证
		//echo $this->session->userdata('username');
		//var_dump($this->session->userdata('username'));

		//需要先判断如果请示页是不是登录页，如果请求页为登录页则不用记录保存
		//设置请求页面的地址到session中，在登录页中验证通过后跳转到此地址
	    // echo $_SERVER['REQUEST_URI'];die();	
	    var_dump($_SESSION['refreshadd']);
		$loginurl='/qc/index.php/admin/login/signin';		
		if($_SESSION['refreshadd']===$loginurl){
				}else{
	    $this->session->set_userdata('refreshadd', $_SERVER['REQUEST_URI']);
	    }
		//echo '============'.$_SESSION['refreshadd'];

		$ud=$this->session->userdata('name');
		echo'<br>ttttttttttttttt';
		echo '<pre>';
		var_dump($ud);
		echo '</pre>';
		
		if(! $this->session->userdata('name')){	
			redirect(site_url('admin/login'));
				}

		
	}
}
