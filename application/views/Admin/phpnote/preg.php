<!DOCTYPE html>
<html>
<meta charset="utf8">
<head>
<title>正则知识</title>

</head>
<body>

<h2>正则知识</h2>
<p>匹配以XX关键字开头的单词</p>
<p>匹配以XX关键字结尾的单词</p>
<p>匹配不以XX关键字开头的单词</p>
<p>匹配不以XX关键字结尾的单词</p>

<p>把ing结尾的单词词根部分找出来,例如working,coming会找到work,com</p>

<?php
header("content-type:text/html;charset=utf8");
//***********用生成器方式读取大于内存的文件，逐行读取函数　
function readlines($path,$type){
    $fileHandler = fopen($path,$type);//只读方式打开文件
    try{
        while ($line = fgets($fileHandler)) {
            yield $line;
                    }
    }finally{
        fclose($fileHandler);//关闭文件
    }
}

$str = 'hellow, when i am working, do not coming, this question is really ,let us test some words complex,luck,unlucky,state,unhappy,test,generator,unset';

echo '<h3><font color=red> hellow, when i am working, do not coming, this question is really ,let us test some words complex,luck,unlucky,state,unhappy,test,generator,unset </font></h3>';

//把ing结尾的单词词根部分找出来,找到work,com
//前瞻，断言，零宽度，正预测
$patn = '/\b\w+(?=ing\b)/';
// preg_match_all($patn,$str,$res);

//把不是ing结尾的单词找出来,但单词长度必须大于3(ing长度)
//前瞻，断言，零宽度，负预测
$patn2 = '/\b\w+(?!ing)\w{3}\b/';
// preg_match_all($patn2,$str,$res);


//把un开头的单词词根部分找出来
//回顾，断言，零宽度，正预测
$patn1 = '/(?<=\bun)\w+\b/';
// preg_match_all($patn1,$str,$res);

//把不是un开头的单词找出来
//断言，零宽度，负预测,回顾
$patn3 = '/\b(?!un)\w+\b/';




preg_match_all($patn,$str,$res);
echo '<br><hr>把ing结尾的单词词根部分找出来,找到work,com<pre>';
print_r($res);
echo '</pre>';

preg_match_all($patn1,$str,$res);
echo '<br><hr>把不是ing结尾的单词找出来,但单词长度必须大于3(ing长度)
<pre>';
print_r($res);
echo '</pre>';

preg_match_all($patn2,$str,$res);
echo '<br><hr>把un开头的单词词根部分找出来<pre>';
print_r($res);
echo '</pre>';

preg_match_all($patn3,$str,$res);
echo '<br><hr>把不是un开头的单词找出来<pre>';
print_r($res);
echo '</pre>';

?>


</body>
</html>
