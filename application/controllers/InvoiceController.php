<?php

class InvoiceController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('InvoiceModel');
		$this->load->model('ServiceModel');
		$this->load->model("ItemModel");
		$this->load->model("ReportModel");
		$this->load->model("PermissionModel");

	}

	public function invoice_list(){
		if ($this->PermissionModel->get_permission(MO_INVOICE_LIST)){

			$invoice_list = $this->ReportModel->get_invoice_summery();
//						echo "<pre>";
//		print_r($invoice_list->result_array());
//		exit();
		$this->load->view("header");
		$this->load->view("invoice/invoice_list", array('invoice_list' => $invoice_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function invoice_create()
	{
		if ($this->PermissionModel->get_permission(MO_INVOICE_CREATE)){

			$service_list = $this->ServiceModel->get_service_list();
		$item_list = $this->ItemModel->get_item_list();
		$this->load->view('header', array('module' => "Create Invoice"));
		$this->load->view('invoice/invoice_create', array('service_list' => $service_list,'item_list' => $item_list));
		$this->load->view('footer');
		} else {
			$this->load->view('403');
		}
	}

	public function save_invoice(){
		$invoice=$this->input->post();
//				echo "<pre>";
//		print_r($invoice);
//		exit();
		$receipt=$this->InvoiceModel->get_booking($invoice);
		$invoice_id=$this->InvoiceModel->save_invoice($receipt,$invoice);
		$invoice['invoice_id']=$invoice_id;
		$this->InvoiceModel->save_invoice_details($invoice);
		$this->InvoiceModel->set_qty($invoice);
		$this->view_invoice($invoice_id);

	}

	public function view_invoice($invoice_id){
		if ($this->PermissionModel->get_permission(MO_INVOICE_VIEW)){

//		echo "<pre>";
//		print_r($invoice_id);
//		exit();
			$invoice = $this->InvoiceModel->get_invoice_details($invoice_id);
//		echo "<pre>";
//			echo "<pre>";
//			print_r($invoice_detail);
//			exit();
//		$invoice=$invoice_detail->result_array();

		$this->load->view("header");
		$this->load->view("invoice/invoice_view", array('invoice'=> $invoice));
		$this->load->view("footer");
		} else {

			$this->load->view('403');
		}

	}
	public function view_invoice1(){
		if ($this->PermissionModel->get_permission(MO_INVOICE_VIEW)){

			$invoice_id = $this->input->get('id');
//		echo "<pre>";
//		print_r($invoice_id);
//		exit();
			$invoice = $this->InvoiceModel->get_invoice_details($invoice_id);
//		echo "<pre>";
//		echo "<pre>";
//		print_r($invoice);
//		exit();
		$this->load->view("header");
		$this->load->view("invoice/invoice_view", array('invoice'=> $invoice));
		$this->load->view("footer");
		} else {

			$this->load->view('403');
		}

	}

	public function validate_service()
	{
		$service = $this->input->get('service');
//		echo "<pre>";
//		print_r($product);
//		exit();

		$result = $this->InvoiceModel->validate_service($service);
//		$des = $this->InvoiceModel->description($service);

		echo json_encode($result);
	}
	public function validate_qty()
	{
		$qty = $this->input->get('qty');
		$product = $this->input->get('product');
//		echo "<pre>";
//		print_r($product);
//		exit();

		$result = $this->InvoiceModel->validate_qty($qty,$product);
//		$des = $this->InvoiceModel->description($service);

		echo json_encode($result);
	}

//	public function description()
//	{
//		$service = $this->input->get('service');
////		echo "<pre>";
////		print_r($product);
////		exit();
//
////		$count = $this->InvoiceModel->validate_service($service);
//		$des = $this->InvoiceModel->description($service);
//
//
//		echo json_encode($des);
//	}



}
