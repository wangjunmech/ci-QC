<?php
class Test{
	public $name;
	public $age;
	public $sex;	
	function __construct($name,$age,$sex="BOY"){
		echo 'This is Test class …………'.$this->name.'第一测试类的构造方法…………!';
		$this->name = $name;
		$this->age = $age;
		$this->sex = $sex;
		}
	
//"析构函数（方法）function __destruct()，对象在消失之前最后一次自动调用的函数。<br>";
function __destruct(){
	echo "{$this->name}的析构函数<font color='red'>最后执行完</font>。再见!<br>";}
		
	}



	
