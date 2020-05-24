<?php
abstract class Unit{
	public $name='单位';
	function __construct($arr){
				}	
	abstract function form($arr);//表单界面//表单提交给converter.php,后面的参数s=类名
	abstract function conv($u,$a);//计算
	}
	