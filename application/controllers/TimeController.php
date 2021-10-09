<?php


class TimeController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("TimeModel");
		$this->load->model("PermissionModel");
	}

	public function index()
	{
		if ($this->PermissionModel->get_permission(MO_TIME_LIST)) {
			$time_list = $this->TimeModel->get_time_list();
			$this->load->view("header");
			$this->load->view("time/time_list", array('time_list' => $time_list));
			$this->load->view("footer");
		} else {
			$this->load->view('403');
		}

	}

	public function create_time()
	{
		if ($this->PermissionModel->get_permission(MO_TIME_CREATE)) {
			$this->load->view("header");
			$this->load->view("time/time_create");
			$this->load->view("footer");
		} else {
			$this->load->view('403');
		}

	}

	public function save_time()
	{
		$time = array(
			'start_time' => $this->input->post('start_time'),
			'end_time' => $this->input->post('end_time'),
			'no_customer' => $this->input->post('no_customer'),
			'status' => $this->input->post('status')

		);

		$this->TimeModel->save_time($time);
		$this->index();
	}

	public function edit_time()
	{
		if ($this->PermissionModel->get_permission(MO_TIME_EDIT)) {
			$id = $this->input->get('id');
			$time = $this->TimeModel->get_time_by_id($id);
			$this->load->view("header");
			$this->load->view("time/time_edit", array('time' => $time));
			$this->load->view("footer");
		} else {
			$this->load->view('403');
		}
	}

	public function update_time()
	{
		$id = $this->input->post('time_id');
		$time = array(
			'start_time' => $this->input->post('start_time'),
			'end_time' => $this->input->post('end_time'),
			'no_customer' => $this->input->post('no_customer'),
			'status' => $this->input->post('status')

		);
		$this->TimeModel->update_time($time, $id);
		$this->index();
	}

	public function view_time()
	{
		if ($this->PermissionModel->get_permission(MO_TIME_VIEW)) {
			$id = $this->input->get('id');
			$time = $this->TimeModel->view_get_time_by_id($id);
			$this->load->view("header");
			$this->load->view("time/time_view", array('time' => $time));
			$this->load->view("footer");
		} else {
			$this->load->view('403');
		}

}


}
