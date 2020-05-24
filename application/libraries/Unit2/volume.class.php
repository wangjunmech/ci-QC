<?php
class Volume extends Unit{
	public $name="体积";
	private $u;
	private $a;
	function __construct($arr=array()){
		}
		

	public function form($b){//表单界面

$f = '
<form name="w" id="wt" method="post" action="'.site_url('/admin/progs/converter2/volume').'" >

  <label for="vm">立方米</label>
  <input type="text" name="vm" id="vmid" value="'.$b['vm'].'" >
  <input type="submit" name="vm0" id="vmid" value="转换" >
  <br>
  <label for="vfm">立方分米</label>
  <input type="text" name="vfm" id="vfmid" value="'.$b['vfm'].'">
  <input type="submit" name="vfm0" id="vfmid" value="转换">
  <br>
  <label for="vcm">立方厘米</label>
  <input type="text" name="vcm" id="vcmid" value="'.$b['vcm'].'">
  <input type="submit" name="vcm0" id="vcmid" value="转换">
  <br>
</form>
';
    
	return $f;
	}


function conv($u,$a){//转换计算 
$sj=array();//声明空数组用于存放返回的计算结果
switch($u){//根据 
	
	case "vm": 
			$sj['vm']=$a;
			$sj['vfm']=$a*1000;
			$sj['vcm']=$a*1000*1000;
				break;
	case "vfm":  
			$sj['vm']=$a/1000;
			$sj['vfm']=$a;
			$sj['vcm']=$a*1000;
				break;
	case "vcm":  
			$sj['vm']=$a/1000/1000;
			$sj['vfm']=$a/1000;
			$sj['vcm']=$a;
				break;
	}
	return $sj;
}

	
	
	}