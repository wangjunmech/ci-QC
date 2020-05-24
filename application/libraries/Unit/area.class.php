<?php
class Area extends Unit{
	public $name="面积";
	private $u;
	private $a;
	function __construct($arr=array()){
		}
	public function form($res=''){//表单界面//表单提交给converter.php,

$f ='
<form name="w" id="wt" method="post" action="'.site_url('/admin/progs/converter/area').'" >

  <label for="km2">平方千米</label>
  <input type="text" name="km2" id="km2id" value="'.$res['km2'].'" >
  <input type="submit" name="km20" id="tid" value="转换" >
  <br>
  <label for="m2">平方米</label>
  <input type="text" name="m2" id="m2id" value="'.$res['m2'].'">
  <input type="submit" name="m20" id="m2id" value="转换">
  <br>
  <label for="cm2">平方厘米</label>
  <input type="text" name="cm2" id="cm2id" value="'.$res['cm2'].'">
  <input type="submit" name="cm20" id="dm2id" value="转换">
  <br>
</form>
';
    
	return $f;
	}


function conv($u,$a){//转换计算 
$sj=array();//声明空数组用于存放返回的计算结果
switch($u){//根据 
	
	case "km2": 
			$sj['km2']=$a;
			$sj['m2']=$a*1000000;
			$sj['cm2']=$a*1000000*1000000;
				break;
	case "m2":  
			$sj['km2']=$a/1000000;
			$sj['m2']=$a;
			$sj['cm2']=$a*1000000;
				break;
	case "cm2":  
			$sj['km2']=$a/1000000/1000000;
			$sj['m2']=$a/1000000;
			$sj['cm2']=$a;
				break;
	}
	return $sj;
}

	
	
	}