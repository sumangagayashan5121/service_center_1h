<?php

class GrnController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GrnModel');
		$this->load->model('ReportModel');
		$this->load->model("SupplierModel");
		$this->load->model("PermissionModel");

	}

	public function grn_create()
	{
		if ($this->PermissionModel->get_permission(MO_GRN_CREATE)){

			$supplier_list = $this->SupplierModel->get_supplier_list();
		$this->load->view('header', array('module' => "Create GRN"));
		$this->load->view('grn/grn_create', array('supplier_list' => $supplier_list));
		$this->load->view('footer');
		}else{
			$this->load->view('403');
		}
	}

	public function save_grn(){
		$grn_id = $this->GrnModel->save_grn($this->input->post());
		$this->GrnModel->set_qty($this->input->post());
		$this->view_grn($grn_id);
	}
	public function view_grn($grn_id){
		if ($this->PermissionModel->get_permission(MO_GRN_VIEW)){
//		echo "<pre>";
//		print_r($grn_id);
//		exit();
		$grn_detail = $this->GrnModel->get_grn_details($grn_id);
		$grn=$grn_detail->result_array();
//				echo "<pre>";
//		print_r($grn);
//		exit();

		$this->load->view("header");
		$this->load->view("grn/grn_view", array('grn'=> $grn));
		$this->load->view("footer");
		} else {

			$this->load->view('403');
		}

	}

	public function view_grn1(){
			if ($this->PermissionModel->get_permission(MO_GRN_VIEW)){
		
					$grn_id = $this->input->get('id');
//					echo "<pre>";
//					print_r($grn_id);
//					exit();
					$grn_detail = $this->GrnModel->get_grn_details($grn_id);
					$grn=$grn_detail->result_array();
//							echo "<pre>";
//					print_r($grn);
//					exit();
			
					$this->load->view("header");
					$this->load->view("grn/grn_view", array('grn'=> $grn));
					$this->load->view("footer");
			} else {

				$this->load->view('403');
			}

	}

	public function grn_list(){
		if ($this->PermissionModel->get_permission(MO_GRN_LIST)){
			$grn_list = $this->ReportModel->get_grn_details();
			$this->load->view("header");
			$this->load->view("grn/grn_list", array('grn_list' => $grn_list));
			$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
	public function validate_product()
	{
		$product = $this->input->get('product');
//		echo "<pre>";
//		print_r($product);
//		exit();

		$result = $this->GrnModel->validate_product($product);
		echo json_encode($result);
	}

}
