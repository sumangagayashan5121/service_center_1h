<?php


class ModelController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("ModelModel");
		$this->load->model("PermissionModel");
		$this->load->model("CompanyModel");
	}

	public function index(){
		if ($this->PermissionModel->get_permission(MO_MODEL_LIST)){
		$model_list = $this->ModelModel->get_model_list();
		$this->load->view("header");
		$this->load->view("model/model_list", array('model_list' => $model_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function create_model(){
		if ($this->PermissionModel->get_permission(MO_MODEL_CREATE)){
			$company_list = $this->CompanyModel->get_company_list();
		$this->load->view("header");
		$this->load->view("model/model_create", array('company_list' => $company_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function save_model(){
		$model = array(
			'company_id' => $this->input->post('company_id'),
			'model_name' => $this->input->post('model_name'),
			'status' => $this->input->post('status')

		);

		$this->ModelModel->save_model($model);
		$this->index();
	}

	public function edit_model(){
		if ($this->PermissionModel->get_permission(MO_MODEL_EDIT)){
		$id = $this->input->get('id');
		$model = $this->ModelModel->get_model_by_id($id);
		$this->load->view("header");
		$this->load->view("model/model_edit", array('model'=> $model));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function update_model(){
		$id = $this->input->post('model_id');
		$model = array(
			'company_id' => $this->input->post('company_id'),
			'model_name' => $this->input->post('model_name'),
			'status' => $this->input->post('status')

		);
		$this->ModelModel->update_model($model, $id);
		$this->index();
	}

	public function view_model(){
		if ($this->PermissionModel->get_permission(MO_MODEL_VIEW)){
		$id = $this->input->get('id');
		$model = $this->ModelModel->view_get_model_by_id($id);
		$this->load->view("header");
		$this->load->view("model/model_view", array('model'=> $model));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
}
