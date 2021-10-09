<?php


class RoleController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("RoleModel");
		$this->load->model("PermissionModel");
	}

	public function index(){
		if ($this->PermissionModel->get_permission(MO_ROLE_LIST)){
			$role_list = $this->RoleModel->get_role_list();
			$this->load->view("header");
			$this->load->view("role/role_list", array('role_list' => $role_list));
			$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function create_role(){
		if ($this->PermissionModel->get_permission(MO_ROLE_CREATE)){
			$this->load->view("header");
			$this->load->view("role/role_create");
			$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function save_role(){
		$role = array(
			'role' =>$this->input->post('role'),
			'description' => $this->input->post('password'),
			'status' => $this->input->post('status')

		);

		$this->RoleModel->save_role($role);
		$this->index();
	}

	public function edit_role(){
		if ($this->PermissionModel->get_permission(MO_ROLE_EDIT)){
			$id = $this->input->get('id');
			$role = $this->RoleModel->get_role_by_id($id);
			$this->load->view("header");
			$this->load->view("role/role_edit", array('role'=> $role));
			$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
			
	}

	public function update_role(){
		$id = $this->input->post('id');
		$role = array(
			'role' =>$this->input->post('role'),
			'description' => $this->input->post('description'),
			'status' => $this->input->post('status')

		);
		$this->RoleModel->update_role($role, $id);
		$this->index();
	}

	public function view_role(){
		if ($this->PermissionModel->get_permission(MO_ROLE_VIEW)){
			$id = $this->input->get('id');
			$role = $this->RoleModel->view_get_role_by_id($id);
			$this->load->view("header");
			$this->load->view("role/role_view", array('role'=> $role));
			$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function validate_role()
	{
		$role = $this->input->get('role');
		$count = $this->RoleModel->validate_role($role);
		echo json_encode($count);
	}
}
