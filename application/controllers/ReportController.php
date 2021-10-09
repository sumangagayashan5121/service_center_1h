<?php


class ReportController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("ReportModel");
		$this->load->model("PermissionModel");

	}
	public function receipt_summery(){
		if ($this->PermissionModel->get_permission(MO_RECEIPT_SUMMERY)){

			$receipt_list = $this->ReportModel->get_receipt_summery();
		$this->load->view("header");
		$this->load->view("report/receipt_summery", array('receipt_list' => $receipt_list, 'search_text'=>""));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
	public function receipt_detail(){
		if ($this->PermissionModel->get_permission(MO_RECEIPT_DETAIL)){

			$receipt_list = $this->ReportModel->get_receipt_details();
		$this->load->view("header");
		$this->load->view("report/receipt_detail", array('receipt_list' => $receipt_list, 'search_text'=>""));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
		
	}
//	public function get_invoice_grn_month(){
//		if ($this->PermissionModel->get_permission(MO_INVOICE_SUMMERY)){
//			$grn_list = $this->ReportModel->invoice_grn_summery_2();
//			$grn_list = $this->ReportModel->invoice_grn_summery_1();
//
////			$invoice_list[0]
////			echo "<pre>";
////		print_r($invoice_list);
////		exit();
//			$this->load->view("header");
//			$this->load->view("report/invoice_summery", array('invoice_list' => $invoice_list, 'search_text'=>"","start_date"=>"","end_date"=>""));
//			$this->load->view("footer");
//		}else{
//			$this->load->view('403');
//		}
//	}
	public function invoice_summery(){
		if ($this->PermissionModel->get_permission(MO_INVOICE_SUMMERY)){

			$invoice_list = $this->ReportModel->get_invoice_summery();
//			$invoice_list[0]
//			echo "<pre>";
//		print_r($invoice_list);
//		exit();
		$this->load->view("header");
		$this->load->view("report/invoice_summery", array('invoice_list' => $invoice_list, 'search_text'=>"","start_date"=>"","end_date"=>""));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
	public function invoice_detail(){
		if ($this->PermissionModel->get_permission(MO_INVOICE_DETAIL)){

			$invoice_list = $this->ReportModel->get_invoice_details11();
//						echo "<pre>";
//		print_r($invoice_list->result_array());
//		exit();
		$this->load->view("header");
		$this->load->view("report/invoice_detail", array('invoice_list' => $invoice_list, 'search_text'=>""));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
	public function grn_detail(){
		if ($this->PermissionModel->get_permission(MO_GRN_DETAIL)){
		$grn_list = $this->ReportModel->get_grn_details();
//		echo "<pre>";
//		print_r($grn_list->result_array());
//		exit();

		$this->load->view("header");
		$this->load->view("report/grn_detail", array('grn_list' => $grn_list, 'search_text'=>""));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
	public function grn_summery(){
		if ($this->PermissionModel->get_permission(MO_GRN_DETAIL)){
			$grn_list = $this->ReportModel->get_grn_details();
//		echo "<pre>";
//		print_r($grn_list->result_array());
//		exit();

			$this->load->view("header");
			$this->load->view("report/grn_summery", array('grn_list' => $grn_list, 'search_text'=>""));
			$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
	public function booking_summery(){
		if ($this->PermissionModel->get_permission(MO_BOOKING_SUMMERY)){
		$booking_list = $this->ReportModel->get_booking_summery();
		$this->load->view("header");
		$this->load->view("report/booking_summery", array('booking_list' => $booking_list, 'search_text'=>""));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
	public function booking_detail(){
		if ($this->PermissionModel->get_permission(MO_BOOKING_DETAIL)){

			$booking_list = $this->ReportModel->booking_detail();
		$this->load->view("header");
		$this->load->view("report/booking_detail", array('booking_list' => $booking_list, 'search_text'=>""));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function search_receipt_summery(){
		if ($this->PermissionModel->get_permission(MO_BOOKING_SEARCH_SUMMERY)){
		$search_text = $this->input->post("search_text");
		$start_date = $this->input->post("start_date");
		$end_date = $this->input->post("end_date");

		$result = $this->ReportModel->search_receipt_summery($search_text,$start_date,$end_date);

		$this->load->view("header");
		$this->load->view("report/receipt_summery", array('receipt_list' => $result, 'search_text'=>$search_text,"start_date"=>$start_date,"end_date"=>$end_date));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function search_receipt_detail(){
		if ($this->PermissionModel->get_permission(MO_BOOKING_SEARCH_DETAIL)){

			$search_text = $this->input->post("search_text");
		$start_date = $this->input->post("start_date");
		$end_date = $this->input->post("end_date");

		$result = $this->ReportModel->search_receipt_detail($search_text,$start_date,$end_date);

//		echo "<pre>";
//		print_r($result);
//		exit();

		$this->load->view("header");
		$this->load->view("report/receipt_detail", array('receipt_list' => $result, 'search_text'=>$search_text,"start_date"=>$start_date,"end_date"=>$end_date));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}


	public function search_invoice_summery(){
		if ($this->PermissionModel->get_permission(MO_INVOICE_SEARCH_SUMMERY)){

			$search_text = $this->input->post("search_text");
		$start_date = $this->input->post("start_date");
		$end_date = $this->input->post("end_date");

		$result = $this->ReportModel->search_invoice_summery($search_text,$start_date,$end_date);

		$this->load->view("header");
		$this->load->view("report/invoice_summery", array('invoice_list' => $result, 'search_text'=>$search_text,"start_date"=>$start_date,"end_date"=>$end_date));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function search_invoice_detail(){
		if ($this->PermissionModel->get_permission(MO_INVOICE_SEARCH_DETAIL)){

			$search_text = $this->input->post("search_text");
		$start_date = $this->input->post("start_date");
		$end_date = $this->input->post("end_date");

		$result = $this->ReportModel->search_invoice_detail($search_text,$start_date,$end_date);

//		echo "<pre>";
//		print_r($result);
//		exit();

		$this->load->view("header");
		$this->load->view("report/invoice_detail", array('invoice_list' => $result, 'search_text'=>$search_text,"start_date"=>$start_date,"end_date"=>$end_date));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}


	public function search_grn_detail(){
		if ($this->PermissionModel->get_permission(MO_GRN_SEARCH_DETAIL)){

			$search_text = $this->input->post("search_text");
		$start_date = $this->input->post("start_date");
		$end_date = $this->input->post("end_date");
//			$field  = $this->input->post('field');

		$result = $this->ReportModel->search_grn_detail($search_text,$start_date,$end_date);

//		echo "<pre>";
//		print_r($result);
//		exit();

		$this->load->view("header");
		$this->load->view("report/grn_detail", array('grn_list' => $result, 'search_text'=>$search_text,"start_date"=>$start_date,"end_date"=>$end_date));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}
	
	public function search_booking_summery(){
//		if ($this->PermissionModel->get_permission(MO_BOOKING_SEARCH_SUMMERY)){

			$search_text = $this->input->post("search_text");
		$start_date = $this->input->post("start_date");
//		$end_date = $this->input->post("end_date");
//			echo "<pre>";
//			print_r($end_date);
//			exit();

		$booking_list = $this->ReportModel->search_booking_summery($search_text,$start_date);

		$this->load->view("header");
		$this->load->view("report/booking_summery", array('booking_list' => $booking_list, 'search_text'=>$search_text,"start_date"=>$start_date));
		$this->load->view("footer");
//		}else{
//			$this->load->view('403');
//		}

	}
	
	public function search_booking_detail(){
		if ($this->PermissionModel->get_permission(MO_BOOKING_SEARCH_DETAIL)){

			$search_text = $this->input->post("search_text");
		$start_date = $this->input->post("start_date");
//		$end_date = $this->input->post("end_date");

		$booking_list = $this->ReportModel->search_booking_detail($search_text,$start_date);

		$this->load->view("header");
		$this->load->view("report/booking_detail", array('booking_list' => $booking_list, 'search_text'=>$search_text,"start_date"=>$start_date));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}
//	public function get_invoice_grn(){
////		$search_text = $this->input->post("search_text");
////		$start_date = $this->input->post("start_date");
////		$end_date = $this->input->post("end_date");
//			$invoice_item=$this->ReportModel->get_invoice_item();
//			$grn=$this->ReportModel->get_grn();
//			$invoice_service=$this->ReportModel->get_invoice_service();
////		}else{
////			$invoice_item=$this->ReportModel->get_invoice_day($day);
////			$grn=$this->ReportModel->get_grn_day($day);
////			$invoice_service=$this->ReportModel->get_service_day($day);
////		}
//			echo "<pre>";
//			print_r($invoice_item);
//			exit();
//
//		$this->load->view("header");
//		$this->load->view("report/all",array('invoice_item' => $invoice_item,'grn' => $grn,'invoice_service' => $invoice_service));
//		$this->load->view("footer");
//	}




}

