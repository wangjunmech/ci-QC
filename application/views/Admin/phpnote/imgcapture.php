<html>
<head>
<title>PHP网页图片抓取器</title>
<meta charset="utf-8">
</head>
<body>

<div ><p>图片抓取说明</p>
<span>测试链接： $site_name = "http://image.baidu.com/search/index?tn=baiduimage&ps=1&ct=201326592&lm=-1&cl=2&nc=1&ie=utf-8&word=%E6%89%8B%E8%A1%A8"; </span>

</div>

<p>第一个可以抓取普通页面，但抓不到百度搜索结果</p>
<?php 
// /*完成网页内容捕获功能*/
// function get_img_url($site_name){ 
//  $site_fd = fopen($site_name, "r"); 
//  $site_content = ""; 
//  while (!feof($site_fd)) { 
//   $site_content .= fread($site_fd, 1024); 
//  } 
// // //  /*利用正则表达式得到图片链接*/
 $reg_tag = '/<img.*?\"([^\"]*(jpg|bmp|jpeg|gif)).*?>/'; 
//  $ret = preg_match_all($reg_tag, $site_content, $match_result); 
//  fclose($site_fd); 
//  return $match_result[1]; 
// } 
  
// /* 对图片链接进行修正 */
// function revise_site($site_list, $base_site){ 
//  foreach($site_list as $site_item) { 
//   if (preg_match('/^http/', $site_item)) { 
//    $return_list[] = $site_item; 
//   }else{ 
//    $return_list[] = $base_site."/".$site_item; 
//  } 
//  } 
//  return $return_list; 
// } 
  
// /*得到图片名字，并将其保存在指定位置*/
// function get_pic_file($pic_url_array, $pos){ 
//  $reg_tag = '/.*\/(.*?)$/'; 
//  $count = 0; 
//  foreach($pic_url_array as $pic_item){ 
//   $ret = preg_match_all($reg_tag,$pic_item,$t_pic_name); 
//   $pic_name = $pos.$t_pic_name[1][0]; 
//   $pic_url = $pic_item; 
//  print("<br>Downloading ".$pic_url." "); 
//   $img_read_fd = fopen($pic_url,"r"); 
//   $img_write_fd = fopen($pic_name,"w"); 
//   $img_content = ""; 
//   while(!feof($img_read_fd)){ 
//    $img_content .= fread($img_read_fd,1024); 
    
//   } 
//   fwrite($img_write_fd,$img_content); 
//   fclose($img_read_fd); 
//   fclose($img_write_fd); 
//   print("[OK] "); 
//  } 
//  return 0; 
// } 
  
// function main(){ 
// /* 待抓取图片的网页地址 */
//  // $site_name = "http://www.jb51.net/sheying/391528.html"; 
//  // $site_name = "http://www.jb51.net/photoshop/587285.html"; 
//  // $site_name = "http://blog.sina.com.cn/iebookieshop"; 
//  $img_url = get_img_url($site_name); 
//  $img_url_revised = revise_site($img_url, $site_name); 
//  $img_url_unique = array_unique($img_url_revised); //unique array 
//  get_pic_file($img_url_unique,"./Public/images/capt3/"); 
// } 
  
// main(); 


?>  

<p>第2个用关键字爬百度搜索的图片</p>

<?php

        // //搜索指定关键词的百度图片并显示  
        // $keyword = "手表";  
        // $keyword = urlencode($keyword);  
        // $url = "http://image.baidu.com/search/index?tn=baiduimage&word=" . $keyword;  
        // $html = file_get_contents($url);  
        // preg_match_all("/\"[^\"]*[^0]\.jpg\"/", $html, $text);  
        // foreach ($text as $key => $value) {  
        //       foreach ($value as $img) {  
        //         $pos=strpos($img,'baidu.com');//如果链接中含有关键字说明链接为百度内部链接，图片被屏蔽
        //         //echo '<br>'.$pos.'<br>'.$img;//输出strpos查找的位置值与图片链接地址
        //         if(!$pos){
        //         print "<img src=" . $img . " />";  
        //         }
        //     }  
        // } 

        // echo $keyword;




?>

<p>第3个</p>
<?php

// $url='https://search.jd.com/Search?keyword=%E7%94%B5%E7%AD%92&enc=utf-8&wq=%E7%94%B5%E7%AD%92&pvid=f2dfadb0e0e940e082466871ae52df92';
// // 创建一个新cURL资源
// $ch = curl_init();
// // 设置URL和相应的选项
// curl_setopt($ch, CURLOPT_URL, "http://www.baidu.com/");
// curl_setopt($ch, CURLOPT_HEADER, false);
// // 抓取URL并把它传递给浏览器
// $data = curl_exec($ch);
// echo $data;
// //关闭cURL资源，并且释放系统资源
// curl_close($ch);

// $keyword2=urlencode('电铸');
//  $keyword2='光电';

// $szUrl = "https://product.gongchang.com/sp?wd=".$keyword2;
// $UserAgent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; .NET CLR 3.5.21022; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, $szUrl);
// curl_setopt($curl, CURLOPT_HEADER, 0);  //0表示不输出Header，1表示输出
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($curl, CURLOPT_ENCODING, '');
// curl_setopt($curl, CURLOPT_USERAGENT, $UserAgent);
// curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
// $data = curl_exec($curl);
// echo gettype($data).'************************'; 
// echo $data;
// echo curl_errno($curl); //返回0时表示程序执行成功 如何从curl_errno返回值获取错误信息
// exit();


$a=5;
echo ++$a;
echo '****<br>';
echo $a++;
echo '****<br>';

echo '<br>递归<br>';

function tet($k){
  static $count=0;
  $count++;
  echo $count.'<br>';
  if($count<$k){
    tet($k);
    }
  if($count>0){     
    echo $count.'<br>';
     $count--;
  }
};


tet(8);



?>




</body>
</html>
