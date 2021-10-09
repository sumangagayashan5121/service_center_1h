<?php


class UserController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("UserModel");
		$this->load->model("RoleModel");
		$this->load->model("PermissionModel");
	}

	public function index(){
		if ($this->PermissionModel->get_permission(MO_USER_LIST)){
			$user_list = $this->UserModel->get_user_list();
//			echo "<pre>";
//			print_r($user_list);
//			exit();

			$this->load->view("header");
			$this->load->view("user/user_list",array('user_list' => $user_list));
			$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function create_user(){
		if ($this->PermissionModel->get_permission(MO_USER_CREATE)){
			$role_list = $this->RoleModel->get_role_list();
			$this->load->view("header");
			$this->load->view("user/user_create", array('role_list' => $role_list));
			$this->load->view("footer");
		} else {
			$this->load->view('403');
		}
	}

	public function save_user(){
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


			$user = array(
				'profile_photo'=>$path,
				'role_id' => $this->input->post('id'),
				'password' => $this->input->post('password'),
				'first_name' => $this->input->post('first_name'),
				'last_name'=> $this->input->post('last_name'),
				'nic' => $this->input->post('nic'),
				'email' => $this->input->post('email'),
				'mobile' => $this->input->post('mobile'),
				'created_date' => date('Y-m-d'),
				'created_by' => $this->session->userdata('user_id'),
				'status' => $this->input->post('status')

			);

			$this->UserModel->save_user($user);
			$this->index();


	}
	public function is_password_strong($password)
	{
		if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password)) {
			return TRUE;
		}
		$this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
		return FALSE;
	}



	public function edit_user(){
		if ($this->PermissionModel->get_permission(MO_USER_EDIT)){
			$id = $this->input->get('id');
			$user = $this->UserModel->get_user_by_id($id);
			$this->load->view("header");
			$this->load->view("user/user_edit", array('user'=> $user));
			$this->load->view("footer");
		} else {
			$this->load->view('403');
		}
	}

	public function update_user(){
		$id = $this->input->post('id');
		$user = array(
			'role_id'=>$this->input->post('role_id'),
			'password' => $this->input->post('password'),
			'first_name' => $this->input->post('first_name'),
			'last_name'=> $this->input->post('last_name'),
			'nic' => $this->input->post('nic'),
			'mobile' => $this->input->post('mobile'),
			'email' => $this->input->post('email'),
			'created_date' => date('Y-m-d h:i:s'),
			'created_by' => $this->input->post('created_by'),
			'status' => $this->input->post('status')

		);
		$this->UserModel->update_user($user, $id);
		$this->index();
	}
	public function view_user(){
		if ($this->PermissionModel->get_permission(MO_USER_VIEW)){
		$id = $this->input->get('id');
		$user = $this->UserModel->view_get_user_by_id($id);
		$this->load->view("header");
		$this->load->view("user/user_view", array('user'=> $user));
		$this->load->view("footer");
		} else {

			$this->load->view('403');
		}
	}

	function edit_profile(){
		$this->load->view("header");
		$this->load->view('user/user_profile');
		$this->load->view("footer");

	}

	public function validate_email()
	{
		$email = $this->input->get('email');
		$count = $this->UserModel->validate_email($email);
		echo json_encode($count);
	}

}
