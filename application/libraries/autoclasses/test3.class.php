<?php
class Test3{
	public $name;

	function __construct($name){
		$this->name = $name;
		echo 'This is test3 class…………!'.$this->name.'的构造方法！……<br>';
		}
	

function __destruct(){
	echo "{$this->name}test3的析构方法!<br>";}
		
	}



	
