<?php


class ReceiptController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("ServiceModel");
		$this->load->model("ReceiptModel");
		$this->load->model("CompanyModel");
		$this->load->model("PermissionModel");

	}
	public function index(){
		$receipt_list = $this->ReceiptModel->get_receipt_list();
//		echo "<pre>";
//		print_r($receipt_list);
//		exit();

		$this->load->view("header");
		$this->load->view("receipt/receipt_list", array('receipt_list' => $receipt_list));
		$this->load->view("footer");

	}
	public function create_receipt()
	{
		$service_list = $this->ServiceModel->get_service_list();
		$company_list = $this->CompanyModel->get_company_list();
		$this->load->view("header");
		$this->load->view("receipt/receipt", array('service_list' => $service_list,'company_list' => $company_list));
		$this->load->view("footer");
	}


	public function search_customer_by_nic()
	{
		$output = $this->ReceiptModel->search_customer_by_nic($this->input->get("searchtext"));
		echo json_encode($output);
	}
	public function search_vehicle_by_reg()
	{

		$veh_result = $this->ReceiptModel->search_vehicle_by_reg($this->input->get("searchreg"));
		echo json_encode($veh_result);
	}



	public function save_receipt()
	{
		$nic = $this->input->post('inic');
		if(($nic) != null){
			$customer_status = 1;
		}else{
			$customer_status = $this->input->post("customer_status");
		}

		$customer_id = $this->input->post("customer_id");
		$model_id = $this->input->post('model_id');
		$vehicle_id = $this->input->post('vehicle_id');
		$vehicle_status= $this->input->post('vehicle_status');

		$customer = array(
			'customer_name' => $this->input->post('customer_name'),
			'nic' => $this->input->post('inic'),
			'address' => $this->input->post('address'),
			'mobile1' => $this->input->post('mobile1'),
			'mobile2' => $this->input->post('mobile2'),
			'status' => $this->input->post('cus_status')
		);
		$customer_id_n = $this->ReceiptModel->save_customer($customer, $customer_status, $customer_id);


		$model = array(
			'model_name' => $this->input->post('model_name'),
			'company_id' => $this->input->post('company_id'),
			'status' => $this->input->post('model_status'));
		$model_id_n = $this->ReceiptModel->save_model($model, $vehicle_status, $model_id);

		$vehicle = array(
			'reg_no' => $this->input->post('reg_no'),
			'model_id' => $model_id_n
		);
		$vehicle_id_n = $this->ReceiptModel->save_vehicle($vehicle, $vehicle_status, $vehicle_id);


		$receipt = array(
			'description' => $this->input->post('description'),
			'deliver_date' => $this->input->post('delivery_date'),
			'status' => $this->input->post('receipt_status'),
			'customer_id' => $customer_id_n,
			'vehicle_id' => $vehicle_id_n,
			'created_by' => $this->session->userdata('user_id'),
		);
		$receipt_id_n =$this->ReceiptModel->save_reciept($receipt);

		$receiptdetails = array(
			'receipt_id' => $receipt_id_n,
			'description' => $this->input->post('description'),
			'service_id' => $this->input->post('service_id'),
			'status' => $this->input->post('receipt_status'),
			'receipt_created_date'=>date('Y-m-d')

		);
		$this->ReceiptModel->save_recieptdetails($receiptdetails);
		$this->view_receipt($receipt_id_n);
	}

	public function view_receipt($receipt_id_n){
		$receipt_detail = $this->ReceiptModel->get_receipt_details($receipt_id_n);
		$receipt_view=$receipt_detail->result_array();
//		$approve=array(
//			'user'=>$this->session->userdata('user_id')
//		);
//				echo "<pre>";
//		print_r($receipt_view);
//		exit();

		$this->load->view("header");
		$this->load->view("receipt/receipt_view", array('receipt_view'=> $receipt_view));
		$this->load->view("footer");

	}

	public function view_receipt1(){
		$receipt_id_n = $this->input->get('id');
//						echo "<pre>";
//		print_r($receipt_id_n);
//		exit();
		$receipt_detail = $this->ReceiptModel->get_receipt_details($receipt_id_n);
		$receipt_view=$receipt_detail->result_array();
		$approve=array(
			'user'=>$this->session->userdata('user_id')
		);

//		echo "<pre>";
//		print_r($receipt_view);
//		exit();

		$this->load->view("header");
		$this->load->view("receipt/receipt_view", array('receipt_view'=> $receipt_view),array('approve'=>$approve));
		$this->load->view("footer");

	}



}
