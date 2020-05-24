<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(2);
class javascriptex extends Admin_Controller{
	
public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

public function index(){
		$this->load->view('admin/js.html');
	 }

//***********************************************************************
//***********************************************************************
//namemodifier，批量文件名修改器，对指定目录下的文件名进行批量处理
public function Jsstring() {
	$this->load->view('admin/javascriptex/Jsstring.html');

	}
public function jszz() {
	$this->load->view('admin/javascriptex/jszz.html');

	}
public function promise() {
	$this->load->view('admin/javascriptex/promise.html');

	}
public function ajax() {
$this->load->view('admin/javascriptex/AJAX.html');

}
public function js1() {
	$this->load->view('admin/javascriptex/js1.html');

	}
public function js2() {

var_dump($_POST);


$this->load->view('admin/javascriptex/js2.html');

}
public function js3() {
$this->load->view('admin/javascriptex/js3.html');

}

public function js4() {
$this->load->view('admin/javascriptex/js4.html');
}

public function js5() {
$this->load->view('admin/javascriptex/js5.html');
}
public function js6() {
$this->load->view('admin/javascriptex/js6.html');
}
public function js7() {
$this->load->view('admin/javascriptex/js7.html');
}
public function js8() {
$this->load->view('admin/javascriptex/js8.html');
}
public function js9() {
$this->load->view('admin/javascriptex/js9.html');
}
public function js10() {
$this->load->view('admin/javascriptex/js10.html');
}
public function js11() {
$this->load->view('admin/javascriptex/js11.html');
}
public function js12() {
$this->load->view('admin/javascriptex/js12.html');
}
public function js13() {
$this->load->view('admin/javascriptex/js13.html');
}
public function js14() {
$this->load->view('admin/javascriptex/js14.html');
}
public function js15() {
$this->load->view('admin/javascriptex/js15.html');
}
public function js16() {
$this->load->view('admin/javascriptex/js16.html');
}
public function js17() {
$this->load->view('admin/javascriptex/js17.html');
}
public function js18() {
$this->load->view('admin/javascriptex/js18.html');
}
public function js19() {
$this->load->view('admin/javascriptex/js19.html');
}
public function js20() {
$this->load->view('admin/javascriptex/js20.html');
}
public function js21() {
$this->load->view('admin/javascriptex/js21.html');
}
public function js22() {
$this->load->view('admin/javascriptex/js22.html');
}
public function js23() {
$this->load->view('admin/javascriptex/js23.html');
}
public function js24() {
$this->load->view('admin/javascriptex/js24.html');
}
public function js25() {
$this->load->view('admin/javascriptex/typing.html');
}
public function js26() {
$this->load->view('admin/javascriptex/js26.html');
}
public function js27() {
$this->load->view('admin/javascriptex/js27.html');
}
public function js28() {
$this->load->view('admin/javascriptex/js28.html');
}
public function js29() {
$this->load->view('admin/javascriptex/js29.html');
}
public function js30() {
$this->load->view('admin/javascriptex/js30.html');
}
public function js31() {
$this->load->view('admin/javascriptex/js31.html');
}

}
