<!DOCTYPE html>
<html>
<meta charset="utf8">
<head>
<title>生成器与循环性能对比及回调函数使用</title>

</head>
<body>

<div ><p>生成器与循环性能对比及回调函数使用</p>
<p>回调函数使用示例</p></div>
<p>用microtime在程序开始和结束取出时间，用后面的时间减前面的时间：</p>
<p>for循环到999999耗时：</p>
<p>0.71-0.81</p>

<p>range到999999耗时：</p>
<p>0.67-0.69</p>

<p>xrange耗时：</p>
<p>0.90305209159851</p>
<hr>
<h2>Generator生成器应用示例</h2>
<p>如果只有1G的内容，实现读取一个2GB的文本日志，文件逐行处理</p>
<p>通常使用file_get_contents()函数，但没有足够的内存怎么办？</p>
<p>看这个示例，先声明生成器函数逐行读取readlines,再循环处理</p>
<p>读取test8.txt,逐行输出并在每行前加上前缀再写入到text.txt文件</p>

<?php
header("content-type:text/html;charset=utf8");
//***********用生成器方式读取大于内存的文件，逐行读取函数　
function readlines($path,$type){
    $fileHandler = fopen($path,$type);//只读方式打开文件
    try{
        while ($line = fgets($fileHandler)) {
            yield $line;
                    }
    }
    finally{
        fclose($fileHandler);//关闭文件
    }
}

$i=0;//设定行号
//循环处理生成器函数
foreach(readlines('Public/test8.txt','r') as $n =>$line){
    //doSomethingYouCan;
    $i++;
    echo $line."\r\n";//输出行
    $fh = fopen('Public/test.txt','a');//,以写入方式打开，将文件指针指向文件末尾，逐行处理到另一个文本文件中
    fwrite($fh,"\r\n".$i."=>"."$line");//换行（Windows下需要用双引号\r\n,而Linux下只需要\n）写入内容
    fclose($fh);//关闭文件
}

//测试程序开始时间
$t1 = microtime(true);

 function  xrange ( $start ,  $limit ,  $step  =  1 ) {
    if ( $start  <  $limit ) {
        if ( $step  <=  0 ) {
            throw new  LogicException ( 'Step must be +ve' );
        }

        for ( $i  =  $start ;  $i  <=  $limit ;  $i  +=  $step ) {
             yield $i ;
        }
    } else {
        if ( $step  >=  0 ) {
            throw new  LogicException ( 'Step must be -ve' );
        }

        for ( $i  =  $start ;  $i  >=  $limit ;  $i  +=  $step ) {
             yield $i ;
        }
    }
}

 /* 
 * 注意下面range()和xrange()输出的结果是一样的。
 */
// echo  'Single digit odd numbers from range():  <br>' ;
// foreach ( range ( 1 , 999999 ,  1 ) as  $number ) {
//     echo  " $number  " ;
// }
// echo  "\n" ;

// for($i=0;$i<99;$i++){
// 	echo  $i."\n" ;
// }


// echo  '@@@@@@@@@@@Single digit odd numbers from xrange(): <br>' ;
// foreach ( xrange ( 1 ,  999999 ,  1 ) as  $number ) {
//     echo  " $number  " ;
// }

//测试程序结束时间
$t2 = microtime(true);

$ptime = $t2-$t1;//程序耗时


 ?> 
<script type="text/javascript">
var ptime ="<?php echo $ptime ;?>"

alert(ptime);

</script>

<?php

function my_callback(){
	echo 'hellow world!!!!';
};
//普通方法回调，调用函数名
call_user_func('my_callback');


class MyClass{	
	static function mycallbackMechod()
	{
	echo 'hello world……static function……'	;}
}
//类中的静态方法回调，写入数组，第一参数为类名，第二参数为方法名
call_user_func (array( 'MyClass','mycallbackMechod' )); 

//对象方法回调
echo '<br>对象方法回调：<br>';
$obj  = new  MyClass ();
call_user_func (array( $obj ,  'mycallbackMechod' ));

echo '<br>类中的静态方法回调使用双冒号：<br>';
call_user_func ( 'MyClass::mycallbackMechod' );

//类继承中父类的方法回调
class  A  {
    public static function  who () {
        echo  "父类A\n" ;
    }
}

class  B  extends  A  {
    public static function  who () {
        echo  "子类B\n" ;
    }
}

call_user_func (array( 'B' ,  'parent::who' )); 
call_user_func (array( 'B' ,  'who' )); 

?>


</body>
</html>
