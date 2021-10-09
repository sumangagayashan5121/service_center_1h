<?php


class ServicecardController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("ServicecardModel");
		$this->load->model("PermissionModel");

	}

	public function create_service_card(){
		$booking_id=$this->input->get();
//								echo "<pre>";
//		print_r($booking_id);
//		exit();
		$this->load->view("header");
		$this->load->view("service_card/service_card_create");
		$this->load->view("footer");
	}
	public function save_service_card(){
		$performer_invoice=$this->input->post();


		$service_card_id=$this->ServicecardModel->save_service_card($performer_invoice);
//		$this->get_service_card_list();
//										echo "<pre>";
//		print_r($service_card_id);
//				exit();
		$this->view_service_card($service_card_id);

	}
	public function get_service_card_list(){
//		if ($this->PermissionModel->get_permission(MO_INVOICE_LIST)){

		$service_card_list = $this->ServicecardModel->get_service_card_list();
		$this->load->view("header");
		$this->load->view("service_card/service_card_list", array('service_card_list' => $service_card_list));
		$this->load->view("footer");
//		}else{
//			$this->load->view('403');
//		}
	}
	public function view_service_card($service_card_id){
		if ($this->PermissionModel->get_permission(MO_INVOICE_VIEW)){


			$service_card_detail = $this->ServicecardModel->get_service_card_details($service_card_id);
//					echo "<pre>";
//		print_r($service_card_detail);
//		exit();

			$this->load->view("header");
			$this->load->view("service_card/service_card_view", array('service_card_detail'=> $service_card_detail));
			$this->load->view("footer");
		} else {

			$this->load->view('403');
		}

	}
	public function view_service_card1(){
		if ($this->PermissionModel->get_permission(MO_INVOICE_VIEW)){

			$service_card_id = $this->input->get('id');
//								echo "<pre>";
//		print_r($service_card_id);
//		exit();

			$service_card_detail = $this->ServicecardModel->get_service_card_details($service_card_id);
//					echo "<pre>";
//		print_r($service_card_detail);
//		exit();

			$this->load->view("header");
			$this->load->view("service_card/service_card_view", array('service_card_detail'=> $service_card_detail));
			$this->load->view("footer");
		} else {

			$this->load->view('403');
		}

	}

}
