<!DOCTYPE html>
<html>
<meta charset="utf8">
<head>
<title>字符串处理常用函数</title>

</head>
<body>

<h2>字符串处理常用函数</h2>
<p>关于数据存储单位的简单说明</p>
<p>计算机数据存储基本单位是字节（Byte，简称B），数据传输的基本单位是“位”（bit，简称b），一个字节等于8位二进制，一个位表示一个0或1。</p>

<p>一个字节的取值范围为0~255 （2^8）。</p>
<p>1B=8b</p>
<p>1KB=1024B=2^10B</p>
<p>1MB=1024KB=2^20B</p>
<p>1GB=1024MB=2^30B</p>
<p>1TB=1024GB=2^40B</p>
</p>
1PB=1024TB=2^50B

<?php

echo 'PHP自带的函数如strlen()、mb_strlen()都是通过计算字符串所占字节数来统计字符串长度的，一个英文字符占1字节。例：<br>';

$Str = 'H';
$Str2 = 'a';
$Str3 = 'H';
$Str4 = 'H';
$Str5 = 'H';
echo $Str.'=====>'.strlen($Str2).'<br>'; // 输出：1

$enStr = 'Hello,China!';
echo $enStr.'=====>'.strlen($enStr).'<br>'; // 输出：12

echo '而中文则不然，做中文网站一般会选择两种编码：gbk/gb2312或是utf-8。utf-8能兼容更多的字符，所以受到很多站长的喜爱。gbk与utf-8对中文的编码不同，导致中文在gbk与utf-8编码下所占字节也有差异。
<br>
gbk编码下每个中文字符所占字节为2，例：<br>';

$zhStr = '您好，中国！';
echo $enStr.'==++==>'.strlen($zhStr).'<br>'; // 输出：18

echo 'utf-8编码下每个中文字符所占字节为3，例：<br>';

$zhStr = '您好，中国！';
// 输出：18

echo $enStr.'=====>'.strlen($zhStr).'<br>'; // 输出：12

echo '那么如何计算这组中文字符串的长度呢？有人可能会说gbk下获取中文字符串长度除以2，utf-8编码下除以3不就行了吗？但是您要考虑字符串并不老实，99%的情况会以中英混合的情况出现。<br>

这是WordPress中的一段代码，主要思想就是先用正则将字符串分解为个体单元，然后再计算单元的个数即字符串的长度，代码如下（只能处理utf-8编码下的字符串）：<br>';

$zhStr = '您好，中国！<br>';
$str = 'Hello,中国！<br>';

// 计算中文字符串长度
function utf8_strlen($string = null) {
// 将字符串分解为单元
preg_match_all("/./us", $string, $match);
// 返回单元个数
return count($match[0]);
}
echo utf8_strlen($zhStr); // 输出：6
echo utf8_strlen($str); // 输出：9

echo 'utf8_strlen – 获得UTF8编码的字符串的长度<br>';


echo '<hr>';
echo '<h2>自定义函数字符串长度计算</h2>';
function utf8strlen($str){
$count = 0;
for($i = 0; $i < strlen($str); $i++){
$value = ord($str[$i]);
if($value > 127) {
$count++;
if($value >= 192 && $value <= 223) $i++;
elseif($value >= 224 && $value <= 239) $i = $i + 2;
elseif($value >= 240 && $value <= 247) $i = $i + 3;
else die('Not a UTF-8 compatible string');
}
$count++;
}
return $count;
};


echo utf8strlen("xxxx").'<<<<<br>';

echo '<hr>';

echo  '<h2>byte数组与字符串转化类</h2><br>';


/** 
* byte数组与字符串转化类 
*/
class Bytes { 
/** 
* 转换一个String字符串为byte数组 
* @param $str 需要转换的字符串 
* @param $bytes 目标byte数组 
* @author Zikie 
*/
public static function getBytes($string) { 
$bytes = array(); 
for($i = 0; $i < strlen($string); $i++){ 
$bytes[] = ord($string[$i]); 
} 
return $bytes; 
} 
/** 
* 将字节数组转化为String类型的数据 
* @param $bytes 字节数组 
* @param $str 目标字符串 
* @return 一个String类型的数据 
*/
public static function toStr($bytes) { 
$str = ''; 
foreach($bytes as $ch) { 
$str .= chr($ch); 
} 
return $str; 
} 
/** 
* 转换一个int为byte数组 
* @param $byt 目标byte数组 
* @param $val 需要转换的字符串 
* 
*/
public static function integerToBytes($val) { 
$byt = array(); 
$byt[0] = ($val & 0xff); 
$byt[1] = ($val >> 8 & 0xff); 
$byt[2] = ($val >> 16 & 0xff); 
$byt[3] = ($val >> 24 & 0xff); 
return $byt; 
} 
/** 
* 从字节数组中指定的位置读取一个Integer类型的数据 
* @param $bytes 字节数组 
* @param $position 指定的开始位置 
* @return 一个Integer类型的数据 
*/
public static function bytesToInteger($bytes, $position) { 
$val = 0; 
$val = $bytes[$position + 3] & 0xff; 
$val <<= 8; 
$val |= $bytes[$position + 2] & 0xff; 
$val <<= 8; 
$val |= $bytes[$position + 1] & 0xff; 
$val <<= 8; 
$val |= $bytes[$position] & 0xff; 
return $val; 
} 
/** 
* 转换一个shor字符串为byte数组 
* @param $byt 目标byte数组 
* @param $val 需要转换的字符串 
* 
*/
public static function shortToBytes($val) { 
$byt = array(); 
$byt[0] = ($val & 0xff); 
$byt[1] = ($val >> 8 & 0xff); 
return $byt; 
} 
/** 
* 从字节数组中指定的位置读取一个Short类型的数据。 
* @param $bytes 字节数组 
* @param $position 指定的开始位置 
* @return 一个Short类型的数据 
*/
public static function bytesToShort($bytes, $position) { 
$val = 0; 
$val = $bytes[$position + 1] & 0xFF; 
$val = $val << 8; 
$val |= $bytes[$position] & 0xFF; 
return $val; 
} 
}

$b = new Bytes();

echo '<hr><br>';
$res= $b->getBytes('在');
print_r($res);
echo '<br>';
echo '<hr><br>';


$arr = Array ( 229,156,168 ) ;
echo 'toStr====<br>';
$res= $b->toStr($arr);
print_r($res);

echo '<hr><br>';

$res= $b->integerToBytes(80);
echo 'integerToBytes====<br>';
print_r($res);
echo '<hr><br>';

$arr2=Array (80,0,0,0);
$res= $b->bytesToInteger($arr2,0);
echo 'bytesToInteger====<br>';
print_r($res);
echo '<hr><br>';

$res= $b->shortToBytes($arr2,0);
echo 'shortToBytes====<br>';
print_r($res);
echo '<hr><br>';

$res= $b->bytesToShort(2,2);
echo 'bytesToShort====<br>';
print_r($res);
echo '<br>';

?>


</body>
</html>
