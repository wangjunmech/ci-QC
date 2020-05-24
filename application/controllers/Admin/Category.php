<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(2);

class Category extends Admin_Controller{

//----------------------------------------------------------
	//构造方法
//----------------------------------------------------------	
public function __construct(){
		parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('cate/category_model',cate);
	}

//----------------------------------------------------------
//默认方法显示分类信息
//----------------------------------------------------------
public function index(){

	$data['cates']=$this->cate->list_cate();
	// var_dump($data);


	$this->load->view('cate/cat_list.html',$data);
	}

//----------------------------------------------------------
//显示添加表单
//----------------------------------------------------------	
public function add(){
	$data['cates']=$this->cate->list_cate();

	$this->load->view('cate/cat_add.html',$data);

}

//----------------------------------------------------------
//显示分类
//----------------------------------------------------------	
public function insert(){
	$this->form_validation->set_rules('cat_name','分类名称','trim|required');
	if($this->form_validation->run()==false){
		#如果没有通过验证
	}else{
		#如果通过验证
		$data['cat_name']=$this->input->post('cat_name',true);
		$data['parent_id']=$this->input->post('parent_id');
		$data['measure_unit']=$this->input->post('measure_unit',true);
		$data['sort_order']=$this->input->post('sort_order',true);
		$data['cat_desc']=$this->input->post('cat_desc',true);
		$data['is_show']=$this->input->post('is_show');
		#调用model方法完成插入
		if($this->cate->add_category($data)){
		$data['url'] = site_url('admin/category');
		$data['wait'] = 2 ;
		$data['message'] = '添加类别成功！';
		$this->load->view('message.html',$data);
			}else{
			$data['message'] = '添加类别失败！';
			$data['wait'] = 2 ;
			$data['url'] = site_url('admin/category/add');
			$this->load->view('message.html',$data);			
			}
	}
}

//----------------------------------------------------------
//显示编辑表单
//----------------------------------------------------------	
public function edit(){
	$id=$this->uri->segment(4);
	$data['cates']=$this->cate->list_cate();//获取所有分类的信息
	$data['current_cat']=$this->cate->get_cate($id);//获取当前记录的信息
	$this->load->view('cate/cat_edit.html',$data);
echo '<pre>';
//var_dump($data);
echo '</pre>';
}

//----------------------------------------------------------
//编辑更新操作
//----------------------------------------------------------	
public function update(){
	
	$data['current_cat']=$this->input->post(array('cat_name', 'parent_id','measure_unit','sort_order','is_show','cat_desc','cat_id'));
	var_dump($data['current_cat']);
	
$cat_id=$this->input->post('cat_id');#从隐藏域获取当前编辑的cat_id
$parent_id=$this->input->post('parent_id');#用户选择的分类

//$cat_id=intval($cat_id);//如果表单中value值加了“”号，则传过来的值类型为字符串，需要转为整形传给list_cate方法
#调用list_cate方法查找当前编辑项的cat_id及其子类的cat_id;
	$sub_cate = $this->cate->list_cate($cat_id);

	#从查找的结果数组中取出cat_id放入数组subcate_id中
	$subcate_id=array();
	foreach($sub_cate as $v){
		$subcate_id[]=$v['cat_id'];
	}
	
#判断当前所选的父分类是否为当前编辑的分类或其子类
	$this->form_validation->set_rules('cat_name','分类名称','trim|required');
	$this->form_validation->set_rules('measure_unit','数量单位','trim|required|numeric');
	$this->form_validation->set_rules('sort_order','排序','trim|numeric');
	$this->form_validation->set_rules('cat_desc','分类描述','trim|required');
	$this->load->helper('form');
		$states=$this->form_validation->run();
		if($this->form_validation->run()==false){
			#如果没有通过验证，回到表单,在视图中使用form_error取出错误提示，并且要在表单元素中保存用户已填入的内容
				$data['cates']=$this->cate->list_cate();
				$this->load->view('cate/cat_edit.html',$data);
			}else{
			#如果通过验证
				#判断所先分类是否为当前编辑的分类或其了类，避免将分类放置到自己或其子分类下，否则递归列出分类会是死循环
				if($parent_id==$cat_id || in_array($parent_id, $subcate_id)){
					$data['url'] = site_url('admin/category/edit').'/'.$cat_id;
					$data['wait'] = 2 ;
					$data['message'] = '不能将分类放置到自己或其子分类下面！';
					$this->load->view('message.html',$data);
					}else{
						#如果选择的分类不是编辑的分类或其子分类，进行更新操作
						if ($this->cate->update_cate($data['current_cat'],$cat_id)) {
							$data['message'] = '更新操作成功！';
							$data['wait'] = 3 ;
							$data['url'] = site_url('admin/category');
							$this->load->view('message.html',$data);
					}else{

							$data['message'] = '更新操作失败！';
							$data['wait'] = 2 ;
							$data['url'] = site_url('admin/category/edit');
							$this->load->view('message.html',$data);

					}

						
					}

		}

echo '<pre>';
// var_dump($subcate_id);
echo '</pre>';

}




//----------------------------------------------------------
//删除分类操作
//----------------------------------------------------------	
public function delete(){
		$id=$this->uri->segment(4);
		$data=$this->cate->list_cate();#取得所有分类信息
		$subcate=$this->cate->cate_list($data,$id);#从所有分类信息中查找所选择的分类及其子分类的住处
		#从取得的子类所有信息中取出cat_id;

		#取出所要删除的记录的所有后代分类的函数
		function getprogeny($arr,$key){
		static $subcate_id=array();
		foreach($arr as $v){
			if(is_array($v)){					
				getprogeny($v,$key);
				if($v[$key]!=NULL){$subcate_id[]=$v[$key];}//去除空值
					}
				}
				return $subcate_id;
		}
		$sub=getprogeny($subcate,"cat_id");//调用函数，取出所有关联的cat_id;

				echo '<pre>';
		//var_dump($sub);	
				echo '</pre>';
		$this->cate->delete_cate($id);
		for($i=0;$i<count($sub);$i++){
		$this->cate->delete_cate($sub[$i]);
		}

		$data['message'] = '删除操作成功！';
		$data['wait'] = 22 ;
		$data['url'] = site_url('admin/category/');
		$this->load->view('message.html',$data);

}


}

