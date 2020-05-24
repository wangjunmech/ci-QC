<?php
class Area extends Unit{
	public $name="面积";
	private $u;
	private $a;
	function __construct($arr=array()){
		}
	public function form($b){//表单界面//表单提交给converter.php,后面的参数s=类名

$f[2] = '
<form name="w" id="wt" method="post" action="converter.php?s=area" >

  <label for="km2">平方千米</label>
  <input type="text" name="km2" id="km2id" value="'.$b['km2'].'" >
  <input type="submit" name="km20" id="tid" value="转换" >
  <br>
  <label for="m2">平方米</label>
  <input type="text" name="m2" id="m2id" value="'.$b['m2'].'">
  <input type="submit" name="m20" id="m2id" value="转换">
  <br>
  <label for="cm2">平方厘米</label>
  <input type="text" name="cm2" id="cm2id" value="'.$b['cm2'].'">
  <input type="submit" name="cm20" id="dm2id" value="转换">
  <br>
</form>
';
    
	echo $f[2];
	return $f;
	}

public function verif($arr){//表单验证
		$flag='';
		if(is_numeric($arr)){	//判断提交的是否为数值
		$flag= true;
		  }else{
			  echo '<font size="+2" color="red">输入必须为数值！</font>';
			  $flag= false;}
			return $flag;
		}//表单验证	
	
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