<?php


class VehicleController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("VehicleModel");
		$this->load->model("PermissionModel");
		$this->load->model("ModelModel");
	}

	public function index(){
		if ($this->PermissionModel->get_permission(MO_CUSTOMER_LIST)){
		$vehicle_list = $this->VehicleModel->get_vehicle_list();
		$this->load->view("header");
		$this->load->view("vehicle/vehicle_list", array('vehicle_list' => $vehicle_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function create_vehicle(){
		if ($this->PermissionModel->get_permission(MO_CUSTOMER_CREATE)){
			$model_list = $this->ModelModel->get_model_list();
		$this->load->view("header");
		$this->load->view("vehicle/vehicle_create", array('model_list' => $model_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function save_vehicle(){
		$vehicle = array(
			'customer_id' => $this->input->post('customer_id'),
			'reg_no' => $this->input->post('reg_no'),
			'model_id' => $this->input->post('model_id'),
			'status'=>1

		);

		$this->VehicleModel->save_vehicle($vehicle);
		$this->index();
	}

	public function edit_vehicle(){
		if ($this->PermissionModel->get_permission(MO_CUSTOMER_EDIT)){
		$id = $this->input->get('id');
		$vehicle = $this->VehicleModel->get_vehicle_by_id($id);
		$this->load->view("header");
		$this->load->view("vehicle/vehicle_edit", array('vehicle'=> $vehicle));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function update_vehicle(){
		$id = $this->input->post('vehicle_id');
		$vehicle = array(
			'customer_id' => $this->input->post('customer_id'),
			'reg_no' => $this->input->post('reg_no'),
			'model_id' => $this->input->post('model_id')

		);
		$this->VehicleModel->update_vehicle($vehicle, $id);
		$this->index();
	}

	public function view_vehicle(){
			if ($this->PermissionModel->get_permission(MO_CUSTOMER_VIEW)){
				$id = $this->input->get('id');
				$vehicle = $this->VehicleModel->view_get_vehicle_by_id($id);
				$this->load->view("header");
				$this->load->view("vehicle/vehicle_view", array('vehicle'=> $vehicle));
				$this->load->view("footer");
			}else{
				$this->load->view('403');
			}

		}
}
