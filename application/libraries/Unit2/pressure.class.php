<?php
class Pressure extends Unit{
	public $name="压力";
	private $u;
	private $a;
	function __construct($arr=array()){
		}
		

	public function form($b){//表单界面

$f = '
<form name="w" id="wt" method="post" action="'.site_url('/admin/progs/converter2/pressure').'" >

  <label for="t">吨</label>
  <input type="text" name="t" id="tid" value="'.$b['t'].'" >
  <input type="submit" name="t0" id="tid" value="转换" >
  <br>
  <label for="kg">千克</label>
  <input type="text" name="kg" id="kgid" value="'.$b['kg'].'">
  <input type="submit" name="kg0" id="kgid" value="转换">
  <br>
  <label for="g">克</label>
  <input type="text" name="g" id="gid" value="'.$b['g'].'">
  <input type="submit" name="g0" id="gid" value="转换">
  <br>
</form>
';
    
	return $f;
	}

	
function conv($u,$a){//转换计算 
$sj=array();//声明空数组用于存放返回的计算结果
switch($u){//根据 
	
	case "t": 
			$sj['t']=$a;
			$sj['kg']=$a*1000;
			$sj['g']=$a*1000*1000;
				break;
	case "kg":  
			$sj['t']=$a/1000;
			$sj['kg']=$a;
			$sj['g']=$a*1000;
				break;
	case "g":  
			$sj['t']=$a/1000/1000;
			$sj['kg']=$a/1000;
			$sj['g']=$a;
				break;
	}
	return $sj;
}

	
	
	}