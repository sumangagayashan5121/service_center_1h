<?php


class ServiceController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("ServiceModel");
		$this->load->model("PermissionModel");
	}

	public function index(){
		if ($this->PermissionModel->get_permission(MO_SERVICE_LIST)){
		$service_list = $this->ServiceModel->get_service_list();
		$this->load->view("header");
		$this->load->view("service/service_list", array('service_list' => $service_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function create_service(){
		if ($this->PermissionModel->get_permission(MO_SERVICE_CREATE)){
		$this->load->view("header");
		$this->load->view("service/service_create");
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function save_service(){
		$service = array(
			'description' => $this->input->post('description'),
			'service_price' => $this->input->post('service_price'),
			'status' => $this->input->post('status')

		);

		$this->ServiceModel->save_service($service);
		$this->index();
	}

	public function edit_service(){
		if ($this->PermissionModel->get_permission(MO_SERVICE_EDIT)){
		$id = $this->input->get('id');
		$service = $this->ServiceModel->get_service_by_id($id);
		$this->load->view("header");
		$this->load->view("service/service_edit", array('service'=> $service));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function update_service(){
		$id = $this->input->post('service_id');
		$service = array(
			'description' => $this->input->post('description'),
			'price' => $this->input->post('service_price'),
			'status' => $this->input->post('status')

		);
		$this->ServiceModel->update_service($service, $id);
		$this->index();
	}

	public function view_service(){
		if ($this->PermissionModel->get_permission(MO_SERVICE_VIEW)){
		$id = $this->input->get('id');
		$service = $this->ServiceModel->view_get_service_by_id($id);
		$this->load->view("header");
		$this->load->view("service/service_view", array('service'=> $service));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
}
