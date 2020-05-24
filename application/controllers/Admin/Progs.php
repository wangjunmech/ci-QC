<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(2);
class Progs extends Admin_Controller{
	
public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
public function index(){
		$this->load->view('admin/index.html');
	 }
// 
//**********************************************************	




public function godaddy(){
		$this->load->view('progs/godaddy.html');
	 }
public function keycode(){
		$this->load->view('progs/keycode.html');
	 }

public function webcolor(){
		$this->load->view('progs/web-color.htm');
	 }


public function qrcode(){
		$this->load->view('progs/qrdemo');
	 }


public function info(){
		$this->load->view('progs/info.html');
	 }

public function mech(){
		$this->load->view('admin/mech.html');
	 }
public function css(){
		$this->load->view('admin/css.html');
	 }	 
//***********************************************************************
//***********************************************************************
//converter单位转换器	
public function converter(){
		//header("Content-type: text/html; charset=utf-8");
		//*****************************************
		function listdir($dirname=""){	
		  $dir = opendir ($dirname);//打开目录返回资源给变量$dir
		  readdir($dir);//打开一次为当前目录
		  readdir($dir);//打开第二次才到指定目录下
		  $arr=array();
		  $arrname=array();
		  $arrcname=array();
		  $i=0;
		  require_once($dirname.'/'.'unit.class.php');
		  while($file = readdir($dir)){	
		  $filename=$dirname.'/'.$file; 
			   if(is_dir($filename)===true){
			   //echo "目录：".$filename."<br />";	 
			   listdir($filename);//如果是目录用递归遍历
			  }else{
			  //echo "文件：".$filename."<br />"; 

			  $i++;
			  $arr[$i]= substr($filename,37,-10);//将从unit目录中遍历出的文件名处理取出类名放到数组中
				if(strpos($file,'class.php')){require_once($dirname.'/'.$file);};
//			  print_r(get_class_vars($arr[$i]));die();
			  
			  	if(is_array(get_class_vars($arr[$i]))){
			  $arrname =(array_values(get_class_vars($arr[$i])));//从类获取属性值给到数组
				};
			   
			  $arrcname[$i]=($arrname[0]);//从数组中取出类的中文名并加到新一数组中
			  }  }	
			  closedir($dir);//关闭目录资源
			  $arr2=array_combine($arr,$arrcname);//将类名与类中的中文单位名两个数组组合为一个新数组
			  return $arr2;//返回数组
			  }
			  
		  $fnamelist=listdir('D:\WWW\QC\application\libraries\Unit');//从unit目录中遍历出的类名和单位名形成的数组
		  //循环删除数组中空值的项目,Unit目录下的其它文件里没有设置name属性所有没有值
			foreach( $fnamelist as $k=>$v){  
				if( !$k ||$k='unit' )  
					unset( $fnamelist[$k] );  
			} 

		//判断用户是否有点击单位链接
			$link = $this->uri->segment(4);
			if(!empty($link)){//如果get中参数不为空表示用户点了单位链接
				$uname = $this->uri->segment(4);//地址栏get中s参数为要计算的单位名字
				$data['msg']='';				
				$unit=$this->uri->segment(4);
				$c=new $uname($unit);//根据GET参数名来创建相应的对象


//判断用户是否提交表单
		if(!empty($_POST)){//*******是否有提交
			$key  =  array_search("转换",$_POST); //查找是哪个提交数据,返回键值
				$u =  substr($key,0,-1); //去除键值最后一位,可以得到单位km,m,fm,cm等,得到单位标识
				$arrk=array_flip($_POST);//反转键名和键值
				$a= array_search($u,$arrk);//在反转后的数组中查找键值为$rest的，返回结果给需要计算的变量a，得到用户输入需要计算的数值
		
		
//***********判断输出的是否为数值，如果不为数值则给出提示
			if($a !=''){//**********提交是否有输入值
				if(is_numeric($a)){	//判断提交的是否为数值
					$data['msg1']='';
					  }else{
						  $data['msg1']='<font size="+2" color="red">输入必须为数值！</font>';
						   }
					$data['res']=$c->conv($u,$a);//**************转换计算,调用类中的方法
				};
			};
//处理POST数据
//				echo "变量a=".$a."为要换算的值！<br>";
//				echo "变量u=".$u."为换算基本单位！<br>";
				$data['form']=$c->form($data['res']);
				}else{$data['msg']='<font size="+2" color="red">请选择要换算的单位链接！</font>';};			
//*************************
		$data['items']= $fnamelist;
		
		$this->load->view('admin/converter.html',$data);
	}
	
//**********************************************************	
//**********************************************************	
//converter单位转换器2.0
public function converter2() {
		//header("Content-type: text/html; charset=utf-8");
		//*****************************************
		
		$files=scandir('D:\WWW\QC\application\libraries\Unit2');
		$files1=array_slice($files,2);
		echo '<pre>';
		print_r($files1);
		
		echo '</pre>';
		echo '<br>';
		echo '@@@@@@@@@@@';
		function listdir($dirname=""){	
		  $dir = opendir ($dirname);//打开目录返回资源给变量$dir
		  readdir($dir);//打开一次为当前目录
		  readdir($dir);//打开第二次才到指定目录下
		  $arr=array();
		  $arrname=array();
		  $arrcname=array();
		  $i=0;
		  require_once($dirname.'/'.'unit.class.php');
		  while($file = readdir($dir)){	
		  $filename=$dirname.'/'.$file; 
			   if(is_dir($filename)===true){
			   //echo "目录：".$filename."<br />";	 
			   listdir($filename);//如果是目录用递归遍历
			  }else{
			  //echo "文件：".$filename."<br />"; 

			  $i++;
			  $arr[$i]= substr($filename,38,-10);//将从unit目录中遍历出的文件名处理取出类名放到数组中
				if(strpos($file,'class.php')){require_once($dirname.'/'.$file);};
//			  print_r(get_class_vars($arr[$i]));die();
			  
			  	if(is_array(get_class_vars($arr[$i]))){
			  $arrname =(array_values(get_class_vars($arr[$i])));//从类获取属性值给到数组
				};
			   
			  $arrcname[$i]=($arrname[0]);//从数组中取出类的中文名并加到新一数组中
			  }  }	
			  closedir($dir);//关闭目录资源
			  $arr2=array_combine($arr,$arrcname);//将类名与类中的中文单位名两个数组组合为一个新数组
			  return $arr2;//返回数组
			  }
			  
		  $fnamelist=listdir('D:\WWW\QC\application\libraries\Unit2');//从unit目录中遍历出的类名和单位名形成的数组
		  //循环删除数组中空值的项目,Unit目录下的其它文件里没有设置name属性所有没有值
			foreach( $fnamelist as $k=>$v){  
				if( !$k ||$k='unit' )  
					unset( $fnamelist[$k] );  
			} 

		//判断用户是否有点击单位链接
			$link = $this->uri->segment(4);
			if(!empty($link)){//如果get中参数不为空表示用户点了单位链接
				$uname = $this->uri->segment(4);//地址栏get中s参数为要计算的单位名字
				$data['msg']='';
				
				$unit=$this->uri->segment(4);
				$c=new $uname($unit);//根据GET参数名来创建相应的对象


//判断用户是否提交表单
		if(!empty($_POST)){//*******是否有提交
			$key  =  array_search("转换",$_POST); //查找是哪个提交数据,返回键值
				$u =  substr($key,0,-1); //去除键值最后一位,可以得到单位km,m,fm,cm等,得到单位标识
				$arrk=array_flip($_POST);//反转键名和键值
				$a= array_search($u,$arrk);//在反转后的数组中查找键值为$rest的，返回结果给需要计算的变量a，得到用户输入需要计算的数值
		
		
//***********判断输出的是否为数值，如果不为数值则给出提示
			if($a !=''){//**********提交是否有输入值
				if(is_numeric($a)){	//判断提交的是否为数值
					$data['msg1']='';
					  }else{
						  $data['msg1']='<font size="+2" color="red">输入必须为数值！</font>';
						   }
					$data['res']=$c->conv($u,$a);//**************转换计算,调用类中的方法
				};
			};
//处理POST数据
//				echo "变量a=".$a."为要换算的值！<br>";
//				echo "变量u=".$u."为换算基本单位！<br>";
				$data['form']=$c->form($data['res']);
				}else{$data['msg']='<font size="+2" color="red">请选择要换算的单位链接！</font>';};			
//*************************
		$data['items']= $fnamelist;
		
		$this->load->view('admin/converter2.html',$data);
	}
	

///***************************************************************
///***************************************************

//网页信息抓取
public function webspider() {

	echo '网页信息抓取';
//------------------------------
// 1.使用file_get)contents
	header("Content-type:text/html;charset=utf-8");
	$keyword='煤层';
	$keyword=iconv("utf-8","GB2312",$keyword);
	$url="http://www.baidu.com/s?f=8&wd=$keyword";
	$html=file_get_contents($url);
	//如果出现乱码请使用下面的代码
	//$html=iconv("GB2312","utf-8//IGNORE",$html);
	$str=array('音乐'=>'MUSIC');
	$str=array('新闻'=>'NEWS');
	$html=strtr($html,$str);
	echo $html;
//------------------------------

// // 2.使用curl
// 	//$url="http://www.baidu.net";
// 	$url="http://www.baidu.com";
// 	$ch=curl_init();
// 	$timeout=5;
// 	curl_setopt($ch, CURLOPT_URL,$url);
// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
// 	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,$timeout);
// 	//在需要用户检测的网页里需要增加下面两行
// 	// curl_setopt($ch, CURLOPT_HTTPAUTH,CURLAUTH_ANY);
// 	// curl_setopt($ch, CURLOPT_USERPWD,US_NAME.":".US_PWD);
// 	$contents =curl_exec($ch);
// 	curl_close($ch);
// 	echo $contents;
//------------------------------
// // 3.使用fopen->fread->fclose
// 	//$handle=fopen("http://www.baidu.net","rb");
// 	$handle=fopen("http://www.baidu.com","rb");
// 	$contents='';
// 		do{
// 			$data = fread($handle,1024);
// 			if(strlen($data)==0){
// 				break;}
// 			$contents .= $data;
// 				}while(true);
// 	fclose($handle);
// 	echo $contents;
//--------------------------
 }

///***************************************************************
///***************************************************

//copyname,复制文件名，把一个目录下的文件名全部取出，在新目录下创建相同名的文件，用于文件名修改测试
public function copyname() {
//判断用户是否提交表单
	$msg='';
		if(!empty($_POST)){//*******是否有提交
			$msg .= '提交了表单！';
			$olddir=$this->input->post('odir');
			$newdir=$this->input->post('ndir');
			$msg .= '<br>源目录为：'.$olddir;
			$msg .= '<br>新目录为：'.$newdir;

			if(!empty($olddir) && !empty($newdir)){
				$msg .= '<br>源目录和新目录都有设置了！';
				#检查设置的新目录，如果不存在则创建
				if(! is_dir($newdir)){
				$msg .= '<br>新目录："'.$newdir.'"不存在,程序自动给创建了';

				#检查一下看看输入的路径字符是什么格式
				$encode = mb_detect_encoding($newdir, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5')); 
				//$msg .= '<br>编码为：'.$encode;	
				$newdir=iconv ( "UTF-8", "GBK",$newdir);
				//echo $newdir;
				mkdir ($newdir);#创建目录，需要把字符格式UTF-8转为GBK创建出来的文件夹名才不会乱码

				#然后需要再转回来下面读取目录名才能正常
				$newdir=iconv ("GBK","UTF-8",$newdir);
					}

			////开始处理

				
				$path=iconv ( "UTF-8", "GBK",$olddir);//源目录
				//$path=$olddir;//源目录
				$namelist=scandir($path);


				//echo $olddir.'-------<br>';//可显示目录路径

				$filename=(iconv ("GBK","UTF-8", $namelist[6]));//转回GBK编码才能打印出来
				//echo $filename;//可显示文件名
				$num=count($namelist);//计算目录内的文件总数（应该减掉2,因为文件读取前两个是点点）

					//处理输入的新目录路径，如果没带斜杠，自动在尾加上\
					function autoadd_slash_end($dir){
						$endstr = substr($dir,-1);//查找最后一位
						if($endstr == '/' || $endstr == '\\' ){//如果有正或反斜杠只需要加*号，否则加上\*
									$dir=$dir;
									}else{
									$dir=$dir.'\\';
								}
							return $dir;
					}
					$newdir=autoadd_slash_end($newdir);
					$olddir=autoadd_slash_end($olddir);
								
				//************
				//echo $newdir.iconv ("GBK", "UTF-8",$namelist[5]);//文件名为新目录加上源文件中的文件名

				// $convdir1=iconv ("UTF-8","GBK", $olddir.iconv ("GBK", "UTF-8",$namelist[5]));
				// var_dump(is_file($convdir1));
				
				$wpath=iconv ("UTF-8", "GBK",$newdir);//新目录
				if(is_dir($wpath)) {

				$res=opendir($wpath);//打开新目录,循环执行写入				
						for($i=2;$i<$num;$i++){//循环写入文件
							//检查读取到的原文件是否是文件
							if(is_file( iconv ("UTF-8","GBK", $olddir.iconv ("GBK", "UTF-8",$namelist[$i])) )){
								$filename1  = $newdir.iconv ("GBK", "UTF-8",$namelist[$i]);//可显示的，文件名为新目录加上源文件中的文件名
								$filename2 = iconv ( "UTF-8","GBK",$filename1);//转换为原GBK码以便写入回去
								$current=$i;//写入文件的内容为自增长数字

								file_put_contents($filename2 ,$current );//写入文件
								}

						}
				closedir($res);//关闭目录
				$msg .=  "写入操作成功！";
				}

				$data['msg']=$msg;

			}else{
				echo '<br><font color="red">源目录和新目录都要指定才能操作！</font>';}

			}		

	$this->load->view('admin/copyname.html',$data);

	}


//***********************************************************************
//***********************************************************************
//namemodifier，批量文件名修改器，对指定目录下的文件名进行批量处理
public function namemodifier() {
			function countstr($str){//计算字符数
					$str =iconv_strlen($str,"UTF-8");
					return $str;
					};
			function str_insert($str, $pos, $substr){//在指定位置插入字符串str_insert("0123456789",指定位置,'插入内容');
				$startstr='';
											for($j=0; $j<$pos; $j++){
											$startstr .= $str[$j];
											}
				$laststr='';
											for ($j=$pos; $j<strlen($str); $j++){
											$laststr .= $str[$j];
											}
											$str = ($startstr . $substr . $laststr);
											return $str;
											} 
			//*********获取文件扩展名
			function get_extension($file){
					return pathinfo($file, PATHINFO_EXTENSION);
								}							
			//*********获取文件扩展名

			//
			function get_basename($filename){  
			         return preg_replace('/^.+[\\\\\\/]/', '', $filename);  
			        }  
					$resultinfo='';	
				//判断用户是否提交表单
	 
			if(!empty($_POST['btn'])){
	$resultinfo.= '<span class="a1">提交了数据！</span><br>';
		if(strlen($_POST['path'])==0){
			$resultinfo.= '<span class="a1">路径未填写............!</span><br>';
			}else{
			
			/*****************************************************/			
			$path = $_POST['path'];//从post获取路径给变量
			
			$dirflag=is_dir(iconv('UTF-8','GB2312',$path));//判断路径是否存在，用iconv才能判断中文目录
			
			
			if(!($dirflag)){$resultinfo.= '<span class="a1">请输入正确的文件路径！</span><br>';}
			$endstr = substr($path,-1);//查找路径最后一个字符
			//路径处理，如果路径最后没有斜杠或反斜杠，加上/*或只加*
				if(strlen($path)>0 && $path!='/' && $path!='\\'){ //有路径提交上来并且路径不等于会影响路径操作glob(参数)的正或反斜杠,处理路径，加上*号或加上\*以便作为glob参数遍历目录
					if($endstr == '/' || $endstr == '\\' ){//如果有正或反斜杠只需要加*号，否则加上\*
								$path=$path.'*';
								}else{
								$path=$path.'\*';
								}
				}
	
			$da=$_POST['da'];
			$aa=$_POST['aa'];
			$db=$_POST['db'];
			$ab=$_POST['ab'];
			$m=$_POST['m'];
			$extin=$_POST['ext'];
			
			$resultinfo.='<span class="a1">操作处理结果：</span><br>';
			//$s = mb_strlen($da);
			$path=iconv("utf-8",'GBK',$path);//路径字符格式为utf-8转为GBK才能用glob()

			$lis =(glob($path));//用glob()方便地替代 opendir()和相关函数读取文件
			//print_r($lis);
			$filenum = count($lis);//计算目录下面文件和子目录的条数
			//循环处理目录中的内容
			//$testname=$lis[1];//单个文件完整路径名
//				echo '<pre>'; 
//				var_dump(mb_convert_encoding($lis[2], "UTF-8", "GBK")); 
//				echo '</pre>';

				$lisc=array();//下面循环将数组无数字符转换，否则不能正确显示
				for($i=0;$i<$filenum;$i++){
					
					$ext= get_extension($lis[$i]);//读取文件扩展名
					if($extin !='' && $extin==$ext){//如果有指定扩展名
						$lisc[$i]=$lis[$i];
						}
					if($extin =='' && $ext!=""){//如果没有指定提扩展名则选择所有的文件进行操作
						$lisc[$i]=$lis[$i];
						}												
					}//循环结束
					
					
				echo '<pre>';
				//var_dump($lisc);//打印结果集数组;
				echo '</pre>';
				$resnum = count($lisc).'<br>';
				
			
			
				for($i=0;$i<$filenum;$i++){	
					if(!empty($lisc[$i])){				
						$oldname=iconv('GBK','UTF-8',$lisc[$i]);//转换为UTF-8才能在浏览器中正常显示。
						$ext1=get_extension($oldname);//获取文件扩展名
						$leng=strlen($oldname);//文件名总长字数（包含路径字符）
						$oldfilename=get_basename($oldname);//获得文件名
						$oldpath = substr($oldname,0,$leng-strlen($oldfilename));//取得文件名前面的路径
			///操作**********************************************************/												
				if(!empty($aa)){//如果是增加字符串前缀
					 $newname=$oldpath.$aa.$oldfilename;
					 $oldname1=iconv('UTF-8','GBK',$oldname);//转回GBK才能用rename函数
					 $newname1=iconv('UTF-8','GBK',$newname);//转回GBK才能用rename函数
					 $resultinfo .= $oldfilename.'-----增加了前缀"<font color=red>'.$aa.'</font>"----->'.get_basename($newname).'<br>';
					 //echo $newname.'<br>';
					 rename($oldname1,$newname1);		
					}
				if(!empty($ab)){//如果是增加字符串后缀
					 $newname=$oldpath.substr($oldfilename,0,($oldfilename-strlen($ext1)-1)).$ab.'.'.$ext1;
					 //echo $newname.'<br>';
					 $oldname1=iconv('UTF-8','GBK',$oldname);//转回GBK才能用rename函数
					 $newname1=iconv('UTF-8','GBK',$newname);//转回GBK才能用rename函数
					 $resultinfo .= $oldfilename.'-----增加了后缀"<font color=red>'.$ab.'</font>"----->'.get_basename($newname).'<br>';
					 rename($oldname1,$newname1);		
					}
				if(!empty($da)){//如果是删除字符串前缀
					if($da == substr($oldfilename,0,strlen($da))){
					 $newname=$oldpath.substr($oldfilename,strlen($da));
					 $resultinfo .= $oldfilename.'-----删除了前缀"<font color=red>'.$da.'</font>"----->'.get_basename($newname).'<br>';
					 $oldname1=iconv('UTF-8','GBK',$oldname);//转回GBK才能用rename函数
					 $newname1=iconv('UTF-8','GBK',$newname);//转回GBK才能用rename函数
					 rename($oldname1,$newname1);							
						};
	
					}
			
				if(!empty($db)){//如果是删除字符串后缀
					$middlename=substr($oldfilename,0,($oldfilename-strlen($ext1)-1));
					if($db == substr($middlename,-(strlen($db)))){
					 $newname=$oldpath.substr($oldfilename,0,strlen($middlename)-strlen($db)).'.'.$ext1;
					 $resultinfo .= $oldfilename.'-----删除了后缀"<font color=red>'.$db.'</font>"----->'.get_basename($newname).'<br>';
				 
					 
					 
					 
					 $oldname1=iconv('UTF-8','GBK',$oldname);//转回GBK才能用rename函数
					 $newname1=iconv('UTF-8','GBK',$newname);//转回GBK才能用rename函数
					 rename($oldname1,$newname1);							
						};
	
					}
					
				if(!empty($m)){//如果是删除文件名中间的指定字符串
				
					if(strpos($oldfilename,$m)== true){
					echo $m;	
					$middlename=substr($oldfilename,0,(strlen($oldfilename)-strlen($ext1)-1));
					$newname=$oldpath.str_replace($m,'',$middlename).'.'.$ext1;
////				echo '<pre>';
////				echo  '<br>$oldfilename======='.$oldfilename;
////				echo  '<br>$middlename======='.$middlename;
////				echo '<br>oldname======='.$oldname;
////				echo '<br>newname======='.$newname;
////				echo '</pre>';	
					 $resultinfo .= $oldfilename.'-----删除了中间的"<font color=red>'.$m.'</font>"----->'.get_basename($newname).'<br>';
					 
					 $oldname1=iconv('UTF-8','GBK',$oldname);//转回GBK才能用rename函数
					 $newname1=iconv('UTF-8','GBK',$newname);//转回GBK才能用rename函数
					 rename($oldname1,$newname1);	
					 						
								};
							}
						}
					}
				}
					//echo '提交了路径！<br>';
			}else{		
				$resultinfo .= '请按说明填写入内容进行操作！<br>';
		}
		$data['resultinfo']=$resultinfo;

	$this->load->view('admin/namemodifier.html',$data);

	}


//***********************************************************************
//***********************************************************************
//namemodifier，批量文件名修改器，对指定目录下的文件名进行批量处理
public function mailsender() {


//filter_var是PHP内置的一个变量过滤的方法， 提供了很多实用的过滤器， 可以用来校验整数、浮点数、邮箱、URL、MAC地址等。
echo '在控制器中进行邮箱验证，只能验证到域名是否存在<br>';
$email = "lastchiliarch@163.com";
var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
echo '<br>';
$email = "asb";
var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
echo '<br>';
$email = "1@a.com";//对于asb这种非法邮箱格式返回了false, 但对于1@a.com则通过了，还是略有瑕疵啊。
var_dump(filter_var($email, FILTER_VALIDATE_EMAIL));
echo '<br>';

//checkdnsrr其实是用来查询指定的主机的DNS记录的，我们可以借用它来验证邮箱是否存在。
 $email = "lastchiliarch@163.com";
 var_dump(checkdnsrr(array_pop(explode("@",$email)),"MX"));
 echo '<br>';

 $email = "1@a.com";
 var_dump(checkdnsrr(array_pop(explode("@",$email)),"MX"));
 echo '<br>';


 //接合filter_var和checkdnsrr做校验，对于绝大多数的非法邮箱肯定会在filter_var的时候就挂掉了， 剩下的再用checkdnsrr进一步判断。但要注意的是，由于只是检查MX记录，所以只能判断163.com是存在的， 但不能说明lastchiliarch这个用户是存在的。
$email_arr = array("lastchiliarch@163.com", "1@a.com");
  foreach($email_arr as $email) {
    if (filter_var($email) === false) {
      echo "<br>invalid email: $email \n";
      continue;
    }
  
    if(checkdnsrr(array_pop(explode("@",$email)),"MX") === false) {
      echo "invalid email: $email \n";
      continue;
    }
  }
  
  $foo  =  5  +  "10 Little Piggies" ;
  echo '$foo的值为:'.$foo;


	$this->load->view('admin/mailsender.html',$data);



	}



//***********************************************************************
//***********************************************************************
//程序功能----批量创建文件
public function filecreator() {
	$this->load->view('admin/create Files');

}
//***********************************************************************
//***********************************************************************
//程序功能----循环插入数据到数据表，以用于测试
public function insertdatas() {
	$dbconn= array(
	'dsn'	=> 'mysql:host=127.0.0.1;port=3306;',
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '111111',
	'database' => 'cishop',
	'dbdriver' => 'pdo',
	'dbprefix' => 'ci_',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
// $this->load->database($db['conn1']);	

#原生PHP代码PDO连接----------------------------------------
try {
$pdo = new PDO("mysql:host=localhost;dbname=xsphp", "root", "111111", array(PDO::ATTR_AUTOCOMMIT=>false,PDO::ATTR_PERSISTENT=>1 ));
}catch(PDOException $e) {
echo "数据库连接失败：".$e->getMessage();
exit;
}
// var_dump($pdo);
#end原生PHP代码PDO连接---------------------------------------


// //	$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, false);

// 	echo "<br>PDO是否关闭自动提交功能：". $pdo->getAttribute(PDO::ATTR_AUTOCOMMIT);
// 	echo "<br>当前PDO的错误处理的模式：". $pdo->getAttribute(PDO::ATTR_ERRMODE); 
// 	echo "<br>表字段字符的大小写转换： ". $pdo->getAttribute(PDO::ATTR_CASE); 
// 	echo "<br>与连接状态相关特有信息： ". $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS); 
// 	echo "<br>空字符串转换为SQL的null：". $pdo->getAttribute(PDO::ATTR_ORACLE_NULLS); 
// 	echo "<br>应用程序提前获取数据大小：".$pdo->getAttribute(PDO::ATTR_PERSISTENT); 
// 	echo "<br>与数据库特有的服务器信息：".$pdo->getAttribute(PDO::ATTR_SERVER_INFO); 
// 	echo "<br>数据库服务器版本号信息：". $pdo->getAttribute(PDO::ATTR_SERVER_VERSION);
// 	echo "<br>数据库客户端版本号信息：". $pdo->getAttribute(PDO::ATTR_CLIENT_VERSION); 

#例用数据库工具类查询出所有的数据库名----------------------------
 $this->load->dbutil();#加载数据库工具类
 $conn = $this->load->dbutil();
 $dbs = $this->dbutil->list_databases();
//var_dump($dbs);echo '<br><br><br>';
if (! $this->dbutil->database_exists('cishop')){
	echo '您指定的数据库不存在哦！';
}
#end例用数据库工具类查询出所有的数据库名----------------------------


		$this->load->model('/Insertdatas_model','Ins');	//调用模型

		$list = $this->Ins->listrecord('user');//调用模型中的方法获取记录数据
		$data['fields'] = $this->Ins->showfields('user');	//调用模型中的方法获取字段名	
	
		if(!empty($_POST['ins'])){//检查提交按钮是否有值过来
			$resultinfo.= '<span class="a1">提交了数据！</span><br>';
			if(is_numeric($_POST['m']) && $_POST['m']!=0){//检查插入记录条数输入是否为有效数字
			echo '开始处理！<br>';
			$data['input']=array_slice($_POST,6,-1);//把数组前面6项和最后一项去掉
				echo '<pre>';
				echo '###############';
				var_dump($data['input']);
				echo '</pre>';
			echo count($data['fields']);
			$inresult=$this->Ins->insert('user',$data['input']);//调用模型中的方法获取数据
			echo $inresult;
			

				echo '</pre>';
			 
			  mysql_connect("localhost","root","111111");
			  mysql_select_db("ci");
			  $query = "desc user";//查询表的详细信息
			  $result = mysql_query($query);//返回结果集
			  $f=array();//声明空数组用于存放字段名
			  $i=0;
				  while($row=mysql_fetch_assoc($result)){
				  $key=array_search(auto_increment, $row);//查找自动增长的字段
				    if(!$key){//如果不是自动增长的字段，则放入数组中也，这里也可以用array_push.
				 	$f[$i]=$row['Field'];
				 	$i++;
				      };				 
					}
				//print_r($f);




			}else{
				$resultinfo.= '<span class="a1">请输入插入记录的条数，必须为数字............!</span><br>';
			}
		}




		// for($i=29;$i<31;$i++){ 
		// //循环插入数据
		// $sqlin="insert into user(name,pass,sex,age,email) values('Name$i','111',0,'','Name$i@php.com')";		 
		// $sql='select id,name,pass,sex,age,email from user';		  
		// $tt=time();		 
		// echo '现在时间是：'.$tt;		 
		// $sql2="insert into client_list1(name) values('Name$i')";
		// $sql3="insert into client_list(code,country,name,cadd,rno,contact,position,tel,fax,email,site,bank,account,taxno,des,level,regtime,remarks) values('000000$i','country','CompanyName$i','address$i','$i','Contact$i','position$i','tex','fax','Name$i@php.com','www.$i.com','Bank$i','ANo.$i','TAXno.$i','Description',2,'$tt','R备注')";		  		  			$stmt = $pdo->prepare($sql3);			
		// 	echo 'PDO操作输出：';	
		// 	p($stmt -> execute());	


		// 		  }




	$this->load->view('admin/insertdatas.html',$data);
	}



//***********************************************************************
//客户列表	//************列出客户清单

public function clientlist() {
	
	//加载分页类
	$this->load->library('pagination');
	$perPage=2;//每页显示条数自定可修改
	$config['base_url']= site_url('admin/progs/clientlist');//URL设置
	//$config['total_rows']= $this->db->count_all_results('client_list');//表中总记录条数
	#我们需要当前员工录入的条数
	$condition['sales']=$_SESSION['workid'];#设置条件sales字段值等于当前用户的workid
	$query = $this->db->where($condition)->get('client_list')->num_rows();#查询表得到记录条数
	$config['total_rows']=$query;//	
	$config['per_page']=$perPage;//每页显示条数,系统默认为10条
	$config['uri_segment']=4;//url片断的位置（记录指针的位置），默认为3,加了一层文件夹后改为4，随文件层级增加
//分页链接翻译;
//	$config['first_link']= '第一页';
//	$config['prev_link']= '上一页';
//	$config['next_link']= '下一页';
//	$config['last_link']= '最后一页';
	
	//分页样式设置
		//$config['num_links'] = 3;
        $config['full_tag_open'] = '<ul class="pagination">';  
        $config['full_tag_close'] = '</ul>';  
        $config['first_tag_open'] = '<li>';  
        $config['first_tag_close'] = '</li>';  
        $config['prev_tag_open'] = '<li>';  
        $config['prev_tag_close'] = '</li>';  
        $config['next_tag_open'] = '<li>';  
        $config['next_tag_close'] = '</li>';  
        $config['cur_tag_open'] = '<li class="active"><a>';  
        $config['cur_tag_close'] = '</a></li>';  
        $config['last_tag_open'] = '<li>';  
        $config['last_tag_close'] = '</li>';  
        $config['num_tag_open'] = '<li>';  
        $config['num_tag_close'] = '</li>'; 
		$config['attributes'] = array('class' => 'myclass');//给所有<a>标签加上class  
	
	
	$this->pagination->initialize($config);//初始化分页
	$data['links'] = $this->pagination->create_links();//创建分页链接并赋给传递数据
	$offset = $this->uri->segment(4);//获取偏移基准
	$this->db->limit($perPage,$offset);//第一个参数为每页的条数（偏移量），第二个为偏移基准（从第几条记录偏移）
	$this->load->model('admin/Cus_model','Cus');
  	$data['list']=$this->Cus->printcus($_SESSION['workid']);
	$data['offset']=$offset;

	$this->load->view('admin/clientlist.html',$data);
	}

//***********************************************************************
//客户录入
public function clientreg() {
	//var_dump($_SESSION);
	//echo $_SESSION['username'];
	
	$this->load->model('admin/Cus_model','Cus');
	echo 'UUUUUUUUUUUU';
	$data['username'] = $_SESSION['name'];
	$data['workid'] = $_SESSION['workid'];

	//var_dump($data);
    $this->load->view('admin/clientedit.html',$data);
	}

//录入动作
public function clientrega() {
	//var_dump($_SESSION);
	echo '处理录入信息';
	$data['v']=($_POST);
	$data['username']=$_SESSION['name'];
	$data['workid']=$_SESSION['workid'];

#设置表单验证规则
//$this->form_validation->set_rules('field表单名','label表单标签','trim|required');
$config = array(
        array(
                'field' => 'client_code',
                'label' => '客户编号',
                'rules' => 'required|numeric'
                       ),
        array(
                'field' => 'des',
                'label' => '业务描述',
                'rules' => 'required',
                       ),
        array(
                'field' => 'company',
                'label' => '公司名称',
                'rules' => 'required'
                       ),
        // array(
        //         'field' => 'contry',
        //         'label' => '国家名称',
        //         'rules' => 'required'
        //                ),
        array(
                'field' => 'addr',
                'label' => '公司地址',
                'rules' => 'required'
        			   ),

        array(
                'field' => 'telphone',
                'label' => '公司电话',
                'rules' => 'required'
       				   )

);

$this->form_validation->set_rules($config);
	if($this->form_validation->run()==false){
		#如果没有通过验证

     $this->load->view('admin/clientedit.html',$data);
	 		

	}else{
    echo '<pre>';
    //var_dump( $_POST);
    echo '</pre>';

		#如果通过验证

		$data['reg']['client_code']=$this->input->post('client_code',true);
		$data['reg']['des']=$this->input->post('des',true);
		$data['reg']['company']=$this->input->post('company',true);
		$data['reg']['contry']=$this->input->post('country');
		$data['reg']['contry'].='.'.$this->input->post('state');
		$data['reg']['addr']=$this->input->post('addr',true);
		$data['reg']['site']=$this->input->post('site',true);
		$data['reg']['telphone']=$this->input->post('telphone',true);
		$data['reg']['sales']=$_SESSION['workid'];
		$data['reg']['regtime']=time();
		$data['reg']['remark']=$this->input->post('remark',true);

		#调用model方法完成插入
		$this->load->model('admin/Cus_model','Cus');
		

		if($this->Cus->clietinsert($data['reg'])){

		$data['url'] = site_url('admin/progs/clientlist');
		$data['wait'] = 1 ;
		$data['message'] = '录入客户成功！';
		$this->load->view('message.html',$data);
			}else{
			$data['message'] = '录入客户失败！';
			$data['wait'] = 2 ;
			$data['url'] = site_url('admin/progs/clientreg');
			$this->load->view('message.html',$data);			
			}
	}
	}
//***********************************************************************
//客户编辑
public function clientedit() {
	$client_code = $this->uri->segment(4, 0);
	$this->load->model('admin/Cus_model','Cus');
	$data=$this->Cus->edit($client_code);
	$this->load->view('admin/clientedit.html',$data);
	}
//编辑动作
public function clientedita() {
	//设置输入过滤，以下是需要修改更新的项
	//echo '@@@@@@编辑运用<br>@@@@@@编辑运用';
	//要注意数据库中的国家一栏用的是contry
	$arr['client_code']= $this->input->post('client_code');
	$arr['des']= $this->input->post('des');
	$arr['company']= $this->input->post('company');
	if($_POST['state']!='' && $_POST['country']!=''){
		$arr['contry']= $this->input->post('country');
		$arr['contry'] .='.'.$this->input->post('state');
	}elseif($_POST['country']!='' ){
		$arr['contry'] = $this->input->post('country');
		
	}else{};


	$arr['addr']= $this->input->post('addr');
	$arr['site']= $this->input->post('site');
	$arr['telphone']= $this->input->post('telphone');
	$arr['sales']= $_SESSION['workid'];
	$arr['regtime']= $this->input->post('regtime');
	$arr['remark']= $this->input->post('remark');
	$data['input']=$arr;
	// echo '<pre>';
	// echo $_POST['id'];
	// var_dump($arr);
	// echo '</pre>';
	$this->load->model('admin/Cus_model','Cus');
	if($this->Cus->update($_POST['id'],$arr)){

		$data['url'] = site_url('admin/progs/clientlist');
		$data['wait'] = 1 ;
		$data['message'] = '编辑客户成功！';
		$this->load->view('message.html',$data);
			}else{
			$data['message'] = '编辑客户失败！';
			$data['wait'] = 2 ;
			$data['url'] = site_url('admin/clientedit.html');
			$this->load->view('message.html',$data);			
			}

	}

//***********************************************************************
//客户删除
public function clientdel() {#删除单条
	echo "<pre>";
	var_dump($_POST);
	echo "</pre>";
	echo '要删除的数据！！！！！！！！';


	//$this->load->view('admin/clientdel.html');
	}
public function clientdelm() {#删除多条
	echo "<pre>";
	var_dump($_POST);
	echo "</pre>";
	echo '要删除的数据！！！！！！！！';


	//$this->load->view('admin/clientdel.html');
	}


//***********************************************************************
//	
public function xxxx() {


	}
//***********************************************************************
//***********************************************************************
//namemodifier，批量文件名修改器，对指定目录下的文件名进行批量处理
public function js() {
	$this->load->view('admin/javascriptex/js.html');

	}
public function js2() {
$this->load->view('admin/javascriptex/js2.html');

}

public function colorpicker(){
		$this->load->view('Progs/colorpicker.html');
	 }

public function clipboard(){
		$this->load->view('Progs/clipboard.html');
	 }

//PHP生成器
public function pgenerator(){
		$this->load->view('Admin/phpnote/pgenerator');
	 }

//字符数统计
public function wordscounter(){
		$this->load->view('Progs/wordscounter.html');
	 }


//监控安装摘录
public function monitor(){
		$this->load->view('Admin/e-info/monitor.html');
	 }

//Voip电话
public function vphone(){
		$this->load->view('Admin/e-info/vphone.html');
	 }

//数据库相关知识
public function dbs(){
		$this->load->view('Admin/dbs/dbs.html');
	 }


//外贸相关知识
public function trading(){
		$this->load->view('Admin/tradingindex.html');
	 }



}
