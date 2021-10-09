<?php


class CompanyController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("CompanyModel");
		$this->load->model("PermissionModel");
	}

	public function index(){
		if ($this->PermissionModel->get_permission(MO_COMPANY_LIST)){
		$company_list = $this->CompanyModel->get_company_list();
		$this->load->view("header");
		$this->load->view("company/company_list", array('company_list' => $company_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function create_company(){
		if ($this->PermissionModel->get_permission(MO_COMPANY_CREATE)){
		$this->load->view("header");
		$this->load->view("company/company_create");
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function save_company(){
		$company = array(
			'company_name' => $this->input->post('company_name'),
			'status' => $this->input->post('status')

		);

		$this->CompanyModel->save_company($company);
		$this->index();
	}

	public function edit_company(){
		if ($this->PermissionModel->get_permission(MO_COMPANY_EDIT)){
		$id = $this->input->get('id');
		$company = $this->CompanyModel->get_company_by_id($id);
		$this->load->view("header");
		$this->load->view("company/company_edit", array('company'=> $company));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function update_company(){
		$id = $this->input->post('company_id');
		$company = array(
			'company_name' => $this->input->post('company_name'),
			'status' => $this->input->post('status')

		);
		$this->CompanyModel->update_company($company, $id);
		$this->index();
	}

	public function view_company(){
		if ($this->PermissionModel->get_permission(MO_COMPANY_VIEW)){
		$id = $this->input->get('id');
		$company = $this->CompanyModel->view_get_company_by_id($id);
		$this->load->view("header");
		$this->load->view("company/company_view", array('company'=> $company));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
}
