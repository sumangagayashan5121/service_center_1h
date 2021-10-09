<?php

class PermissionController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PermissionModel');
		$this->load->model('RoleModel');
		$this->load->model('ModuleModel');
	}

	public function index()
	{
		if ($this->PermissionModel->get_permission(MO_PERMISSION_ASSIGN)) {
			$role_list = $this->RoleModel->get_role_list();
			$this->load->view('header', array('module' => "List Permission"));
			$this->load->view('permission/list', array('role_list' => $role_list));
			$this->load->view('footer');
		} else {
			$this->load->view('403');
		}
	}

	public function get_permission_list()
	{
		$role_id = $this->input->get('role_id');
		$role_module_list = $this->PermissionModel->get_role_module_list($role_id);
		echo json_encode($role_module_list);
	}

	public function assign()
	{
		if ($this->PermissionModel->get_permission(MO_PERMISSION_ASSIGN)) {
			$role_list = $this->RoleModel->get_role_list();
			$this->load->view('header', array('module' => "Assign Permission"));
			$this->load->view('permission/assign', array('role_list' => $role_list));
			$this->load->view('footer');
		} else {
			$this->load->view('403');
		}
	}

	public function get_role_module_list()
	{
		$role_id = $this->input->get('role_id');
		$role_module_list = $this->PermissionModel->get_role_module_list($role_id);
		$module_list = $this->ModuleModel->get_module_list();

		$data = array(
			'role_module_list' => $role_module_list,
			'module_list' => $module_list
		);
		echo json_encode($data);
	}

	public function alter_permission()
	{
		$role_id = $this->input->get('role_id');
		$module_id = $this->input->get('module_id');
		$selected = $this->input->get('selected');

		if ($selected == "true") {
			$this->PermissionModel->assign_permission($role_id, $module_id);
		} else {
			$this->PermissionModel->remove_permission($role_id, $module_id);
		}
	}

	public function alter_permission_all(){
		$role_id = $this->input->get('role_id');
		$selected = $this->input->get('selected');

		if ($selected == "true") {
			$this->PermissionModel->assign_permission_all($role_id);
		} else {
			$this->PermissionModel->remove_permission_all($role_id);
		}
	}

}
