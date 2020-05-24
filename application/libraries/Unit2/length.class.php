<?php
class Length extends Unit{
	public $name="长度";
	private $u;
	private $a;
	function __construct($arr=array()){
		}

	public function form($b){//表单界面
$f = '<form name="f" id="yl" method="post" action="'.site_url('/admin/progs/converter2/length').'" >
  <label for="km">千米</label>
  <input type="text" name="km" id="kmid" value="'.$b['km'].'">
  <input type="submit" name="km0" id="km" value="转换" >
  <br>
  <label for="m">米&nbsp;&nbsp;&nbsp;</label>
  <input type="text" name="m" id="mid" value="'.$b['m'].'">
  <input type="submit" name="m0" id="m" value="转换">
  <br>
  <label for="fm">分米</label>
  <input type="text" name="fm" id="fmid" value="'.$b['fm'].'">
  <input type="submit" name="fm0" id="fm" value="转换">
  <br>
  <label for="cm">厘米</label>
  <input type="text" name="cm" id="cmid" value="'.$b['cm'].'">
  <input type="submit" name="cm0" id="cm" value="转换">
  <br>
  <label for="inch">英寸</label>
  <input type="text" name="inch" id="inchid" value="'.$b['inch'].'">
  <input type="submit" name="inch0" id="inch" value="转换">
  <br>
</form>';
    
	return $f;	
	}



	function conv($u,$a){
	$sj=array();//声明空数组用于存放返回的计算结果
	switch($u){//根据 
		
		case "km": 
				$sj['km']=$a;
				$sj['m']=$a*1000;
				$sj['fm']=$a*10000;
				$sj['cm']=$a*100000;
				$sj['inch']=$a*1000000/25.4;
					break;
		case "m":  
				$sj['km']=$a/1000;
				$sj['m']=$a;
				$sj['fm']=$a*10;
				$sj['cm']=$a*10*10;
				$sj['inch']=$a*10*10*10/25.4;
					break;
		case "fm":  
				$sj['km']=$a/10000;
				$sj['m']=$a/10;
				$sj['fm']=$a;
				$sj['cm']=$a*10;
				$sj['inch']=$a*10*10/25.4;
					break;
		case "cm": 
				$sj['km']=$a/100000;
				$sj['m']=$a/100;
				$sj['fm']=$a/10;
				$sj['cm']=$a;
				$sj['inch']=$a*10/25.4;
					break;
		case "inch": 
				$sj['km']=$a*25.4/1000000;
				$sj['m']=$a*25.4/1000;
				$sj['fm']=$a*25.4/100;
				$sj['cm']=$a*25.4/10;
				$sj['inch']=$a;
					break;
		}
		return $sj;
}	
			
			}
//		if($arr['r']!=""){$arr['dia']=$arr['r']*2;}	
//		if($arr['dia']!=""){$arr['r']=$arr['dia']/2;}	

			
			
	
	
	
	
