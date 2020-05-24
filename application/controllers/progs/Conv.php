<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conv extends CI_Controller {
    public $calcdir ='D:/WWW/QC/Public/Progs/Unit';

	public function index()
	{
	
//include base_url('Public/Progs/Unit/test.php');		

//$dirname = base_url('Public/Progs/Unit/test.php');
//echo $dirname;
function listdir($dirname=""){	


$dir = opendir ($dirname);//打开目录返回资源给变量$dir
readdir($dir);//打开一次为当前目录
readdir($dir);//打开第二次才到指定目录下
$arr=array();
$arrname=array();
$arrcname=array();
$i=0;
while($file = readdir($dir)){	
$filename=$dirname.'/'.$file; 
   	 if(is_dir($filename)===true){
	 //echo "目录：".$filename."<br />";	 
	 listdir($filename);//如果是目录用递归遍历
	}else{
	//echo "文件：".$filename."<br />"; 
	
	$i++;
	$arr[$i]= $filename;
	}  }	
	closedir($dir);//关闭目录资源
	return $arr;//返回数组
	}

echo '<pre>';

var_dump(listdir($this->calcdir));echo '</pre>';



		$this->load->view('progs/converter');
	}
}
