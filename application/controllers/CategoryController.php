<?php


class CategoryController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("CategoryModel");
		$this->load->model("PermissionModel");
	}

	public function index(){
		if ($this->PermissionModel->get_permission(MO_CATEGORY_LIST)){
		$category_list = $this->CategoryModel->get_category_list();
		$this->load->view("header");
		$this->load->view("category/category_list", array('category_list' => $category_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

//	public function index(){
//		$this->load->view("header");
//		$this->load->view("category/category_list",array('category'=> $category));
//		$this->load->view("footer");
//	}

	public function create_category(){
		if ($this->PermissionModel->get_permission(MO_CATEGORY_CREATE)){
		$this->load->view("header");
		$this->load->view("category/category_create");
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function save_category(){

//		echo "<pre>";
//		print_r($this->input->post());
//		exit();

		$category = array(
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status')

		);

		$this->CategoryModel->save_category($category);
		$this->index();
	}

	public function edit_category(){
		if ($this->PermissionModel->get_permission(MO_CATEGORY_EDIT)){
		$id = $this->input->get('id');
		$category = $this->CategoryModel->get_category_by_id($id);
		$this->load->view("header");
		$this->load->view("category/category_edit", array('category'=> $category));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function update_category(){
		$id = $this->input->post('category_id');
		$category = array(
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status')

		);
		$this->CategoryModel->update_category($category, $id);
		$this->index();
	}

	public function view_category(){
		if ($this->PermissionModel->get_permission(MO_CATEGORY_VIEW)){
		$id = $this->input->get('id');
		$category = $this->CategoryModel->view_get_category_by_id($id);
		$this->load->view("header");
		$this->load->view("category/category_view", array('category'=> $category));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

}
