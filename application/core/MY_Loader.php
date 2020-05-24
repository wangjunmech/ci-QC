<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Loader extends CI_Loader {
	public function __construct()
	{
	}
	protected $_theme='default/';	
#开启皮肤功能
	public function switch_theme_on()
	{
		$this->_ci_view_paths = array(FCPATH.THEMES_DIR.$this->_theme=>TRUE);
		//var_dump($this->_ci_view_paths);
		
	}
}
