<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>创建多个html文件</title>
	<style type="text/css">

		input[type='text'],textarea{
			background: lightblue;
		}
	</style>
</head>
<body>
<h1>一次创建多个文件</h1>
<form name='fform' action="#" method="post">
<label for='dir'>要创建文件的目标目录</label>
<input type="text" name = 'dir' id= 'dir' style="width: 500px;"/>
<br>
<label for='dir'>文件名列表输入，以','英文半角逗号隔开文件名，不需要带扩展</label>
<br><textarea id='fname' name = 'fname' style="width: 700px;height: 300px"></textarea><br>
<label for='ext'>文件扩展名</label>
<input type="text" name = 'ext' id= 'ext' style="width: 500px;"/>
<input type="submit" name = 'tj' value="创建文件"/>

</form>


<?php
echo '创建了以下文件：<br>';

if(@$_POST['fname']){
$dir =$_POST['dir'];
$str = str_replace(array("\r\n", "\r", "\n"), "", $_POST['fname']);
$strarr = explode(',',$str);
$ext = $_POST['ext'];
$cont ='';
file_creator($strarr,'D:\WWW\jQ\js',$ext,$cont,1);

}

// // var_dump($strarr);
// $dir = __dir__;
// $farr = array('1-1 绑定多个事件的难题',
// '1-2 二级事件绑定',
// '1-3 捕捉与冒泡',
// '1-4 实测捕捉与冒泡',
// '1-5 停止传播与阻止行为',
// '1-6 IE绑定事件的不标准之处',
// '1-7 JS作用域',
// '1-8 var的作用',
// '1-9 令人惊讶的意外',
// '1-10 词法分析',
// '1-11 函数声明与函数表达式',
// '1-12 arguments对象',
// '1-13 callee属性',
// '1-14 this 是谁(1)',
// '1-15 this 是谁(2)',
// '1-16 call 与 apply',
// '1-17 闭包概念',
// '1-18 闭包计数器',
// '1-19 对象',
// '1-20 构造方法',
// '1-21 私有属性',
// '1-22 原型继承',
// '1-23 原型冒充',
// '1-24 复制继承',
// '1-25 函数也是对象');

function file_creator($filearr,$dir,$ext='html',$content='tit',$showinfo){
	/**
	*　
	*　@param $filearr 文件名数组;
	* @param $dir 文件创建目标目录，打开Windows文件夹复制，末尾不用带反斜杠
	* @param $ext='html' 文件扩展名，默认html
	* @param $content　文件内容
	* @param $showinfo　显示创建文件列表消息
	*/
	$farrlen=(count($filearr));
	for($i=0;$i<$farrlen;$i++){

		$fname= $dir.'\\'.$filearr[$i].'.'.$ext;
		if($showinfo){
			echo '<font color=red>';
				echo $fname.'<br>';
				echo '</font>';
			}
		$fname=iconv('UTF-8','GBK',$fname);
		$content = '<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>'.$filearr[$i].'</title>
	</head>
	<body></body>
	</html>';
	file_put_contents($fname, $content);
	};

}
// file_creator($farr,'D:\WWW\jQ\js');



?>	
</body>
</html>

