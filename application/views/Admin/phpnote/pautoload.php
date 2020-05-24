<!DOCTYPE html>
<html>
<head>
<title>自动加载类SPL函数</title>
<meta charset="utf-8">
</head>
<body>

<div ><p>自动加载类SPL函数</p>

<?php


class LOAD{ 
static function loadClass($class_name){ 
    $filename = './application/libraries/autoclasses/'.$class_name.".class.php"; 
    // $filename = $class_name.".class.php"; 
    echo "<br>".$filename."<br>";
    if (is_file($filename)) return include_once $filename; 
    } 
} 
/** 
* 设置对象的自动载入 
* spl_autoload_register — Register given function as __autoload() implementation 
*/ 
spl_autoload_register(array('LOAD', 'loadClass')); 

$a = new Test('第一测试类','',''); //实现自动加载，很多框架就用这种方法自动加载类 
echo '<br>######################<br>';
$b = new Test2('第二测试类'); 
$c = new Test3('第三测试类'); 

exec("mkdir d:\\test",$outarr,$result);

// exec("rmdir /s/q d:\\test",$outarr,$result);

// passthru("ping 192.168.1.1",$outarr);
echo '(((((';
var_dump($outarr);
echo '==========';
echo $result;
echo ')))))))';

// var_dump($out1);
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
