<?php


class StaffController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("StaffModel");
		$this->load->model("RoleModel");
		$this->load->model("PermissionModel");
	}
	public function create_staff(){
		$role_list = $this->RoleModel->get_role_list();
		$this->load->view("header");
		$this->load->view("staff/create_staff", array('role_list' => $role_list));
		$this->load->view("footer");
	}
	public function index(){
		$staff_list = $this->StaffModel->get_staff_list();
//			echo "<pre>";
//			print_r($user_list);
//			exit();

		$this->load->view("header");
		$this->load->view("staff/index",array('staff_list' => $staff_list));
		$this->load->view("footer");
	}
	public function save_staff(){
		$config['upload_path']='./uploads/';
		$config['allowed_types']        = 'gif|jpg|png';
//		$config['max_size']             = 100;
//				echo "<pre>";
//		print_r($config['upload_path']);
//		exit();

		$this->load->library('upload');
		$this->upload->initialize($config);
		if ($this->upload->do_upload('image')){
			$result=$this->upload->data();
			$path=$result['orig_name'];
		}else{
			print_r($this->upload->display_errors());
		}

		$staff=array(
			'profile_photo'=>$path,
			'role_id'=>$this->input->post('id'),
			'email'=>$this->input->post('email'),
			'first_name'=>$this->input->post('first_name'),
			'last_name'=>$this->input->post('last_name'),
			'nic'=>$this->input->post('nic'),
			'mobile'=>$this->input->post('mobile'),
			'status'=>$this->input->post('status'),
			'password'=>$this->input->post('password'),
//			'confirm_password'=>$this->input->post('confirm_password'),
			'created_date' => date('Y-m-d'),
			'created_by' => $this->session->userdata('user_id'),
		);
		$salary=array(
			'job'=>$this->input->post('job'),
			'basic_sallary'=>$this->input->post('basic_sallary')
		);
		$this->StaffModel->save_staff($staff,$salary);
		$this->index();
	}
	public function staff_edit(){
		$id = $this->input->get('id');
		$staff = $this->StaffModel->get_staff_by_id($id);
		$this->load->view("header");
		$this->load->view("staff/staff_edit", array('staff'=> $staff));
		$this->load->view("footer");
	}
	public function update_staff(){
		$id = $this->input->post('staff_id');

		$staff=array(
			'basic_sallary'=>$this->input->post('basic_sallary'),
			'over_time'=>$this->input->post('over_time'),
			'other'=>$this->input->post('other')
		);

		$this->StaffModel->update_staff($staff, $id);
		$this->index();
	}


}
