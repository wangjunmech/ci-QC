<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(2);

class Login extends CI_Controller{

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
//登录默认方法
//----------------------------------------------------------
public function index(){

// 	//验证码配置
// 	$vals = array(
//         'img_path'      => './Public/captcha/', //需要设置,./表示站点根目录
//         'img_url'       => base_url('Public/captcha/'), //需要设置正确
//         //'font_path'     => './path/to/fonts/texb.ttf',//如有字体文件可设置
//         'img_width'     => '150',
//         'img_height'    => 30,
//         'expiration'    => 7200, //验证图片自动清理时间，7200’s=2H
//         'word_length'   => 2,
//         'font_size'     => 36,
//         'img_id'        => 'Imageid',
//         'pool'          => '0123456789abcdefghjkmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

//         // White background and border, black text and red grid
//         'colors'        => array(
//                 'background' => array(255, 255, 255),
//                 'border' => array(255, 255, 255),
//                 'text' => array(0, 0, 0),
//                 'grid' => array(255, 40, 40)
//         )
// );

// $data = create_captcha($vals);
// echo '<pre>';
// var_dump($cap);
// echo '</pre>';




	$this->load->view('login.html');
	}

//----------------------------------------------------------
//扩展了MY_captcha_helper辅助函数后，直接调用函数生成验证码的方法
//----------------------------------------------------------	
public function code(){

	#加载自定义类\application\libraries下面的Code类。注意需要\system\fonts下的文件支持
		$captconfig= array(
        'width' => 140,
        'height' => 50,
        'codeLen' =>2 ,
        'fontSize' => 23,
        // 'bgColor' => 'blue',
        'fontColor' => 'red'
			);
		$this->load->library('code',$captconfig);
		$this->code->show();
		$captcode=$this->code->getCode();
		$this->load->library('session');
		$newdata = array(
        'captchacode'  => $captcode,
        );
		$this->session->set_userdata($newdata);

}


//----------------------------------------------------------
//处理登录请求
//----------------------------------------------------------	
public function signin(){
	#获取表单数据
	#设置验证规则,先在构造函数中加载类库,form_validation
	//$thid->load->veiw('admin/login');

	$this->form_validation->set_rules('username','用户名','required');
	$this->form_validation->set_rules('password','用户密码','required');
	$this->form_validation->set_rules('captcha','验证码','required');
	$status=$this->form_validation->run(); #调用验证规则验证
	

	if($status){#通过验证规则

// echo '处理登录请求';
$inputcaptcha = strtolower($this->input->post('captcha'));
$sesscaptcha = strtolower($this->session->userdata('code'));
	//判断验证码
if($inputcaptcha==$sesscaptcha){
		$udata['username']=$this->input->post('username');
		$udata['password']=$this->input->post('password');

			#调用模型中的方法返回用户信息,如用户名和密码正确会返回一条记录
			$this->load->model('Login_model','lg');
  			$userinfo=$this->lg->get_user($udata);
  			
		//如果模型有记录返回说明用户名和密码正确， 
		if($userinfo){
			//保存用户信息到session				
				$this->session->set_userdata($userinfo);
				

				//验证通过跳转到相应页面
				//redirect(site_url('admin/progs'));			
			if($_SESSION['refreshadd']){
					$url=($_SESSION['refreshadd']);
					echo "<meta http-equiv=\"refresh\" content=\"0.5;url=$url\">"; 
					}else{redirect(site_url('admin/progs'));}
			
			}else{
		$data['url'] = site_url('admin/login');
		$data['wait'] = 3 ;
		$data['message'] = '用户名或密码错误！';
		$this->load->view('message.html',$data);
			}

			}else{
		$data['url'] = site_url('admin/login');
		$data['wait'] = 3 ;
		$data['message'] = '验证码错误！';
		$this->load->view('message.html',$data);
	};
	}else{#未通过表单验证规则
		$this->load->view('login.html');
	}

}


public function logout(){
	// echo '<pre>';
	// var_dump($_SESSION);
	// echo '</pre>';
	// echo '成功登出！2秒后到登录页面！';
	$arr=array_keys($_SESSION);//从session数组中取出键名到数组
	$this->session->unset_userdata($arr);//设置数组的值为空
	$this->session->sess_destroy();
			$data['message'] = '成功登出！2秒后到登录页面！';
			$data['wait'] = 2 ;
			$data['url'] = site_url('/admin/login');
			$this->load->view('message.html',$data);	



	// redirect(site_url('admin/login'));

}

}

