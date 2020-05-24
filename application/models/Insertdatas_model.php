<?php
defined('BASEPATH') || exit('No direct script access allowed');

class Insertdatas_model extends CI_Model{

	

//获取表中的记录
	public function listrecord($table){//查询

		$data = $this->db->get($table)->result_array();
		return $data;		
	}
	
	
//获取表中的字段
	public function showfields($table){
		$fields = $this->db->list_fields($table);
		return ($fields);
		}
//向表中插入记录	
	public function insert($table,$input){
		try {   			
			$this->db->insert($table, $input);
			$res='============循环插入数据完成OK！！！！！！！！';
			} 
				catch (Exception $e) {   
					$res= $e->getMessage();   
					}   
		 		   return $res;
				}
			
	
//创建表的方法
	public function ctable($tablename){
		$this->load->dbforge();
							$fields = array(
						'blog_id' => array(
							'type' => 'INT',
							'constraint' => 5,
							'unsigned' => TRUE,
							'auto_increment' => TRUE
						),
						'blog_title' => array(
							'type' => 'VARCHAR',
							'constraint' => '100',
					  'unique' => TRUE,
						),
						'blog_author' => array(
							'type' =>'VARCHAR',
							'constraint' => '100',
							'default' => 'King of Town',
						),
						'blog_description' => array(
							'type' => 'TEXT',
							'null' => TRUE,
						),
					);
		
				$this->dbforge->add_field($fields);  	 //添加字段
				$this->dbforge->add_key('blog_id', TRUE);//设置主键
				if($this->db->table_exists($tablename)){
					echo $tablename.'已经存在，不用创建《》<br>';}
				else{
				$this->dbforge->create_table($tablename);//创建表
				echo "创建表:<font color='#FF0000'>$tablename</font>成功";
				}
				//$this->dbforge->drop_table('test8888');//删除表
			}
//Utility的使用
		public function stable(){
		$this->load->dbutil();
		$dbs = $this->dbutil->list_databases();
		  //列出数据库名
		if($this->dbutil->database_exists('my_dbtest')){
			 echo 'AAA---' ;}else{echo 'BBB---';}
		foreach ($dbs as $db)
		{
			echo $db;
			echo '<br>';
		}
        }		
		
//循环插入数据到表的方法,设定参数从a到b的循环次数
		public function insertitems($a,$b){
				 $pdo = new  PDO("mysql:host=localhost;dbname=ci", "root", "111111");
						  for($i=$a;$i<$b;$i++){
						  $tt=time();
				$sql3="insert into client_list(
				code,
				country,
				name,
				cadd,
				rno,
				contact,
				position,
				tel,
				fax,
				email,
				site,
				bank,
				account,
				taxno,
				des,
				level,
				regtime,
				remarks
				) values(
				'000000$i',
				'country',
				'CompanyName$i',
				'address$i',
				'$i',
				'Contact$i',
				'position$i',
				'tex',
				'fax',
				'Name$i@php.com',
				'www.$i.com',
				'Bank$i',
				'ANo.$i',
				'TAXno.$i',
				'Description',
				2,
				'$tt',
				'R备注'
				)";		  
				$stmt = $pdo->prepare($sql3);
				$stmt -> execute();
					  }
				}
	}