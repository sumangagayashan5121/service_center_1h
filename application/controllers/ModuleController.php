<?php


class ModuleController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("ModuleModel");
		$this->load->model("PermissionModel");
	}

	public function index(){
		if ($this->PermissionModel->get_permission(MO_MODULE_LIST)){
		$module_list = $this->ModuleModel->get_module_list();
		$this->load->view("header");
		$this->load->view("module/module_list", array('module_list' => $module_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function create_module(){
		if ($this->PermissionModel->get_permission(MO_MODULE_CREATE)){
		$this->load->view("header");
		$this->load->view("module/module_create");
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function save_module(){
		$module = array(
			'module' =>$this->input->post('module'),
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status')
		);

		$this->ModuleModel->save_module($module);
		$this->index();
	}

	public function edit_module(){
		if ($this->PermissionModel->get_permission(MO_MODULE_EDIT)){
		$id = $this->input->get('id');
		$module = $this->ModuleModel->get_module_by_id($id);
		$this->load->view("header");
		$this->load->view("module/module_edit", array('module'=> $module));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function update_module(){
		$id = $this->input->post('id');
		$module = array(
			'module' =>$this->input->post('module'),
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status')

		);
		$this->ModuleModel->update_module($module, $id);
		$this->index();
	}

	public function view_module(){
		if ($this->PermissionModel->get_permission(MO_MODULE_VIEW)){
		$id = $this->input->get('id');
		$module = $this->ModuleModel->view_get_module_by_id($id);
		$this->load->view("header");
		$this->load->view("module/module_view", array('module'=> $module));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function validate_module()
	{
		$module = $this->input->get('module');
		$count = $this->ModuleModel->validate_module($module);
		echo json_encode($count);
	}
}
