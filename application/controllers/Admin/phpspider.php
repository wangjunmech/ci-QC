<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(2);
class Phpspider extends Admin_Controller{
	
public function __construct(){
		parent::__construct();

	}

public function index(){
	echo '开始spider@';
		// $aaa=$this->get_url_content('http://www.duramold.net/');
		$aaa=$this->get_url_content('http://www.soho.com/');
		$bbb=$this->content_filter($aaa['content']);
		// $ccc=$this->revise_url('http://www.baidu.com',$bbb);
		// $ddd=$this->crawler($ccc);
		echo '<pre>';
		var_dump($bbb);
		echo '</pre>';
		echo '完成spider';
		//$this->load->view('progs/phpspider.html');
	 }


// 
//**********************************************************	
//从给定URL中取得内容并返回
	/**
	 * @param string $url
	 * @return string 
	 */
private function get_url_content($url){
		$handle = fopen($url,'r');
		if($handle){
			$content['content'] = stream_get_contents($handle,1024*1024);
			$content['msg'] = '有网址内容返回!';
			return $content;
		}else{
			$content['msg'] = '没有打开网址!';
			return $content;
		}
	 }

//从取得内容中筛选内容并返回
	 	/**
	 * @param string $webcontent
	 * @return array 
	 */
private function content_filter($webcontent){
		$reg_tag_a = '/<[a|A].*?href=[\'\"]{0,1}([^>\'\"\ ]*).*?>/';
		$result = preg_match_all($reg_tag_a, $webcontent, $matches);
		if($result){
			return $matches[1];
		}
	 }

//修正相对路径
	 /**
	 * @param string $base_url
	 * @return array $url_list
	 * @return array 
	 */
private function revise_url($base_url,$url_list){
		$url_info = parse_url($base_url);
		$base_url = $url_info["scheme"].'://';
		if($url_info["user"] && $url_info["pass"]){
			$base_url .= $url_info["user"].":".$url_info["pass"]."@";
		}
		$base_url .= $url_info["host"];
		if($url_info["port"]){
			$base_url .= ":".$url_info["port"];
		}
		$base_url .= $url_info["path"];
		print_r($base_url);
		if(is_array($url_list)){
			foreach ($url_list as $url_item) {
				if(preg_match('/^http/',$url_item)){
					//已经是完整的url
					$result[] = $url_item;
				}else{
					//不完整的URL
					$real_url = $base_url . '/'.$url_item;
					$result[] = $real_url;
				}
				}
				return $result;
			}else{
				return ;
			}
	 }

//爬虫
	 	/**
	 * @param string $url
	 * @return array 
	 */
private function crawler($url){
		$content = get_url_content($url);
		if($content){
			$url_list = revise_url($url,content_filter($content));
			if($url_list){
			return $url_list;
		}else{
			return;
		}
		}else{
			return;
		}
	 }


//测试用主程序

private function main(){
		$current_url = 'http://www.163.com';
		$fp_puts = fopen('url.txt', 'ab');
		$fp_gets = fopen('url.txt', 'r');
		do{
			$revise_url_arr = crawler($current_url);
			if($revise_url_arr){
				foreach ($revise_url_arr as $url) {
					fputs($fp_puts,$url."\r\n");
				}
			}
		}while ($current_url = fgets($fp_gets,1024)); //不断获得url
}

}


