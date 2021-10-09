<?php


class SupplierController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("SupplierModel");
		$this->load->model("PermissionModel");
	}

	public function index(){
		if ($this->PermissionModel->get_permission(MO_SUPPLIER_LIST)){
		$supplier_list = $this->SupplierModel->get_supplier_list();
		$this->load->view("header");
		$this->load->view("supplier/supplier_list", array('supplier_list' => $supplier_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function create_supplier(){
		if ($this->PermissionModel->get_permission(MO_SUPPLIER_CREATE)){
		$this->load->view("header");
		$this->load->view("supplier/supplier_create");
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function save_supplier(){
		$supplier = array(
			'supplier_name' => $this->input->post('supplier_name'),
			'address' => $this->input->post('address'),
			'status'=> $this->input->post('status'),
			'mobile1' => $this->input->post('mobile1'),
			'mobile2' => $this->input->post('mobile2'),
			'email' => $this->input->post('email'),
			'contact_person' => $this->input->post('contact_person')

		);
		$this->SupplierModel->save_supplier($supplier);
		$this->index();
	}

	public function edit_supplier(){
			if ($this->PermissionModel->get_permission(MO_SUPPLIER_EDIT)){
				$id = $this->input->get('id');
				$supplier = $this->SupplierModel->get_supplier_by_id($id);
				$this->load->view("header");
				$this->load->view("supplier/supplier_edit",array('supplier'=>$supplier));
				$this->load->view("footer");
			}else{
				$this->load->view('403');
			}

		}

	public function update_supplier(){
		$id = $this->input->post('id');
		$supplier = array(
			'supplier_name' => $this->input->post('supplier_name'),
			'address' => $this->input->post('address'),
			'status'=> $this->input->post('status'),
			'mobile1' => $this->input->post('mobile1'),
			'mobile2' => $this->input->post('mobile2'),
			'email' => $this->input->post('email'),
			'contact_person' => $this->input->post('contact_person')

		);
		$this->SupplierModel->update_supplier($supplier, $id);
		$this->index();
	}
	public function view_supplier(){
			if ($this->PermissionModel->get_permission(MO_SUPPLIER_VIEW)){
				$id = $this->input->get('id');
				$supplier = $this->SupplierModel->view_get_supplier_by_id($id);
				$this->load->view("header");
				$this->load->view("supplier/supplier_view", array('supplier'=> $supplier));
				$this->load->view("footer");
			}else{
				$this->load->view('403');
			}
		}
}
