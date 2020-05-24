<?php
class Test2{
	public $name;

	function __construct($name){
		$this->name = $name;
		echo 'This is test2 class…………!'.$this->name.'的构造方法！……<br>';
		}
	

function __destruct(){
	echo "{$this->name}Test2的析构方法!<br>";}
		
	}



	
