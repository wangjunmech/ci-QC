<!DOCTYPE html>
<html>
<head>
<title>函数参数的处理</title>
<meta charset="utf-8">
</head>
<body>

<div ><p>函数参数的处理</p>

<?php

//数组参数
$dt = array('a' => 1,'b' => 2,'c' => 3,'d' => 4, );
$wd='AAAAA';
echo "<br>变量\$dt是不是为数组：".is_array($dt);
echo "<br>变量\$wd是不是为数组：".is_array($wd);
echo "<br>";
$dt2 = array(
			'word'		=> '8888',
			'img_path'	=> '7777',
			'img_url'	=> '6666',
			'img_width'	=> '5555',
			'img_height'	=> '4444',
	);
function para($data = '', $img_path = '', $img_url = '', $font_path = '')
	{
		$defaults = array(
			'word'		=> '9999',
			'img_path'	=> '',
			'img_url'	=> '',
			'img_width'	=> '150',
			'img_height'	=> '30',
			'font_path'	=> '',
			'expiration'	=> 7200,
			'word_length'	=> 8,
			'font_size'	=> 16,
			'img_id'	=> '',
			'pool'		=> '0123456789abcdefghjkmnprstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ',
			'colors'	=> array(
				'background'	=> array(255,255,255),
				'border'	=> array(153,102,102),
				'text'		=> array(204,153,153),
				'grid'		=> array(255,182,182)
			)
		);

		foreach ($defaults as $key => $val)
		{			
			//如果参数$data不是数组并且此变量不存在，则把它转为变量
			if ( ! is_array($data) && empty($$key))
			{
				$$key = $val;
			}else{
			//否则检查是检查变量值是否为数组中的值
				$$key = isset($data[$key]) ? $val : $data[$key];
			}
		//输出变量和值出来看看			
		echo $key."====".$val."<br>";
		}

		//如果参数$data有传入并为数组，则把传入的数组拆解为变量
		if(isset($data) && is_array($data)){
		foreach ($data as $key => $val){
			$$key = $val;
			//echo $key."====".$val."<br>";
			echo '方法中的变量'.$key.'的值为：'.$$key.'<br>';

		}
		}

	}

//方法外将数组转为变量	
if(isset($dt2) && is_array($dt2)){
		foreach ($dt2 as $key => $val){
			$$key = $val;
			//echo $key."====".$val."<br>";
			echo '方法外的变量'.$key.'的值为：'.$$key.'<br>';

		}
		}


para($dt2);	


//看看变量是否存在？
echo '输出变量:<br>';
echo '调用函数后变量img_path存不存在：'.$img_path;
echo '<br>';
echo $word;
//$word=555;
echo isset($word);	


 ?> 

<!--  ************** -->
<script type="text/javascript">
//PHP变量转为JS变量
// var ptime ="<?php echo $ptime ;?>"
// alert(typeof(ptime));
</script>
<!--  ************** -->




</body>
</html>
