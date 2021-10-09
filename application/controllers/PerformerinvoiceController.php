<?php


class PerformerinvoiceController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("PerformerinvoiceModel");
		$this->load->model("PermissionModel");

	}

	public function create_performer_invoice(){
		$booking_id=$this->input->get();
//								echo "<pre>";
//		print_r($booking_id);
//		exit();
		$this->load->view("header");
		$this->load->view("necessary/performer_invoice",array('booking_id' => $booking_id));
		$this->load->view("footer");
	}
	public function save_performer_invoice(){
		$performer_invoice=$this->input->post();
//								echo "<pre>";
//		print_r($performer_invoice['booking_id']);
		$performer_invoice_id=$this->PerformerinvoiceModel->save_performer_invoice($performer_invoice);
		$this->view_performer_invoice($performer_invoice_id);

	}
	public function get_performer_invoice_list(){
//		if ($this->PermissionModel->get_permission(MO_INVOICE_LIST)){

		$performer_invoice_list = $this->PerformerinvoiceModel->get_performer_invoice_list();
		$this->load->view("header");
		$this->load->view("necessary/performer_invoice_list", array('performer_invoice_list' => $performer_invoice_list));
		$this->load->view("footer");
//		}else{
//			$this->load->view('403');
//		}
	}
	public function view_performer_invoice($performer_invoice_id){
		if ($this->PermissionModel->get_permission(MO_INVOICE_VIEW)){

//		echo "<pre>";
//		print_r($performer_invoice_id);
//		exit();
			$performer_invoice_detail = $this->PerformerinvoiceModel->get_performer_invoice_details($performer_invoice_id);

			$this->load->view("header");
			$this->load->view("necessary/performer_invoice_view", array('performer_invoice_detail'=> $performer_invoice_detail));
			$this->load->view("footer");
		} else {

			$this->load->view('403');
		}

	}
	public function view_performer_invoice1(){
		if ($this->PermissionModel->get_permission(MO_INVOICE_VIEW)){

			$performer_invoice_id = $this->input->get('id');
//		echo "<pre>";
//		print_r($performer_invoice_id);
//		exit();
			$performer_invoice_detail = $this->PerformerinvoiceModel->get_performer_invoice_details($performer_invoice_id);

			$this->load->view("header");
			$this->load->view("necessary/performer_invoice_view", array('performer_invoice_detail'=> $performer_invoice_detail));
			$this->load->view("footer");
		} else {

			$this->load->view('403');
		}

	}
	public function validate_booking_id()
	{
		$booking_id = $this->input->get('booking_id');
		$count = $this->PerformerinvoiceModel->validate_booking_id($booking_id);
		echo json_encode($count);
	}

}
