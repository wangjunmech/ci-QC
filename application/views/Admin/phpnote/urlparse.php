<!DOCTYPE html>
<html>
<head>
<title>地址栏参数的处理</title>
<meta charset="utf-8">
</head>
<body>

<div ><p>地址栏参数的处理</p>

<?php

//获取域名或主机地址 
echo '<br>获取域名或主机地址<br>';
echo $_SERVER['HTTP_HOST']."<br>"; #localhost

//获取网页地址 
echo '<br>获取网页地址<br>';
echo $_SERVER['PHP_SELF']."<br>"; #/blog/testurl.php

//获取网址参数 
echo '<br>获取网址参数<br>';
echo $_SERVER["QUERY_STRING"]."<br>";

//获取端口号 
echo '<br>获取端口号<br>';
echo $_SERVER["SERVER_PORT"]."<br>"; #id=5

//获取用户代理 
echo '<br>获取用户代理<br>';
echo !empty($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'没有代理'."<br>"; 

//获取完整的url
echo '<br>获取完整的url<br>';
echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."<br>";
echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']."<br>";
#http://localhost/blog/testurl.php?id=5

//包含端口号的完整url
echo '<br>包含端口号的完整url';
echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"]."<br>"; 
#http://localhost:80/blog/testurl.php?id=5

//只取路径
$url='<br>http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]."<br>"; 
echo dirname($url);
#http://localhost/blog


$url='用JS输出PHP变量。'

 ?> 

<!--  ************** -->
<script type="text/javascript">
//PHP变量转为JS变量
var url ="<?php echo $url ;?>"
alert(typeof(url));
</script>
<!--  ************** -->




</body>
</html>
