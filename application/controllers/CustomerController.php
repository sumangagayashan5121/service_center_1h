<?php


class CustomerController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("CustomerModel");
		$this->load->model("UserModel");
		$this->load->model("PermissionModel");
	}

	public function index(){
		if ($this->PermissionModel->get_permission(MO_CUSTOMER_LIST)){
		$customer_list = $this->CustomerModel->get_customer_list();
		$this->load->view("header");
		$this->load->view("customer/customer_list", array('customer_list' => $customer_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function create_customer(){
		if ($this->PermissionModel->get_permission(MO_CUSTOMER_CREATE)){
		$this->load->view("header");
		$this->load->view("customer/customer_create");
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function save_customer(){
		$customer = array(
			'first_name' => $this->input->post('first_name'),
			'nic' => $this->input->post('nic'),
			'last_name' => $this->input->post('last_name'),
			'status'=> $this->input->post('status'),
			'mobile1' => $this->input->post('mobile'),
			'email' => $this->input->post('email'),
			'role_id'=>4,
			'created_date' => date('Y-m-d'),
			'created_by' => $this->session->userdata('user_id'),

		);
		$this->UserModel->save_user($customer);
		$this->index();
	}

	public function edit_customer(){
		if ($this->PermissionModel->get_permission(MO_CUSTOMER_EDIT)){
		$id = $this->input->get('id');
		$customer = $this->CustomerModel->get_customer_by_id($id);
		$this->load->view("header");
		$this->load->view("customer/customer_edit", array('customer'=> $customer));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function update_customer(){
//		$id = $this->input->post('id');
		$customer = array(
			'first_name' => $this->input->post('first_name'),
			'nic' => $this->input->post('nic'),
			'last_name' => $this->input->post('last_name'),
			'status'=> $this->input->post('status'),
			'mobile1' => $this->input->post('mobile'),
			'email' => $this->input->post('email'),
//			'created_date' => date('Y-m-d'),
//			'created_by' => $this->session->userdata('user_id'),

		);
		$id=$customer['nic'];
		$this->CustomerModel->update_customer($customer, $id);
		$this->index();
	}
	public function view_customer(){
		if ($this->PermissionModel->get_permission(MO_CUSTOMER_VIEW)){
		$id = $this->input->get('id');
		$customer = $this->CustomerModel->view_get_customer_by_id($id);
		$this->load->view("header");
		$this->load->view("customer/customer_view", array('customer'=> $customer));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
}
