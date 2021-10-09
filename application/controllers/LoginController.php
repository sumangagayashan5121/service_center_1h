<?php


class LoginController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("LoginModel");
		$this->load->model("PermissionModel");
		$this->load->model("UserModel");
		$this->load->model("TimeModel");
		$this->load->model("ServiceModel");
		$this->load->model("CompanyModel");
		$this->load->model("ModelModel");
		$this->load->model("DashboardModel");
		$this->load->model("ReportModel");
		$this->load->model("BookingModel");
		$this->load->model("CustomerModel");




	}
	function login($booking = 0){
		$this->load->view("login", array('booking' => $booking));
	}

	function login_validation(){
		$user_data = $this->session->all_userdata();
		$count=count($user_data);
		$booking = $this->input->post('booking');
		if($count>2){
			$logged_in = $user_data['logged_in'];
			$logged_out = $user_data['logged_out'];

			if ($logged_in==1 and $logged_out==0) {
				$this->logout();}

		}
		$this->load->library("form_validation");
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()){
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			if($result=$this->LoginModel->can_login($email,$password)){
				$session_data=array(
					'logged_in' => true,
					'logged_out'=>0,
					'email'	=>$email,
					'user_id'=>$result->user_id,
					'first_name'=>$result->first_name,
					'last_name'	=>$result->last_name,
					'role_id'	=>$result->role_id,
					'profile_photo'	=>$result->profile_photo
				);
				$this->session->set_userdata($session_data);

				$logged_in=$this->session->userdata;
//							echo "<pre>";
//							print_r($logged_in);
//							exit();
				if ($booking==1){
					redirect('/LoginController/booking');
//					$this->booking();
				}else{
					redirect('/LoginController/home');
//					$this->home();
				}
			}
			else{
				$this->form_validation->set_message('is_unique', 'The %s is already taken');
				$this->login();

			}
		}
		else{
			$this->login();
		}}


	function home(){
		if ($this->PermissionModel->get_permission(MO_DASHBOARD)){
			$contact_list = $this->DashboardModel->get_contact_list();
			$invoice_list = $this->ReportModel->get_invoice_summery();
			$user_list = $this->UserModel->get_user_list();
			$booking_list = $this->ReportModel->get_booking_summery();
			$customer_list = $this->CustomerModel->get_customer_list();



			$invoice_list=$invoice_list->result_array();
			$booking_list=$booking_list->result_array();

//			$booking_list=count($booking_list);
//			$booking_list=array(
//				'booking_list'=>$booking_list
//			);

//												echo "<pre>";
//			print_r($booking_list);
//			exit();
			$this->load->view("header");
			$this->load->view("home",array('customer_list'=>$customer_list,'contact_list'=>$contact_list,'invoice_list' => $invoice_list,'user_list'=>$user_list,'booking_list'=>$booking_list));
			$this->load->view("footer");
		}else{
			$this->home_customer();
		}
	}
	function home_customer(){
//			$array_items = array('logged_out'=>true,'logged_in'=>0);
//			$this->session->set_userdata($array_items);
		$user_data = $this->session->all_userdata();

		$logged_in = $user_data['logged_in'];
		$logged_out = $user_data['logged_out'];

		if ($logged_in==1 and $logged_out==0) {
//				$array_items = array('logged_in'=>true,'logged_out'=>0);
//				$this->session->set_userdata($array_items);
			$data["log"] = "Logout";
			$this->load->view("home_customer", $data);
		}else{
			$data["log"] = "Login";
			$this->load->view("home_customer", $data);
		}
	}
	function customer(){
		$array_items = array('logged_out'=>true,'logged_in'=>0);
		$this->session->set_userdata($array_items);

		$data["log"] = "Login";
		$this->load->view("home_customer", $data);
	}



	public function booking(){

			$user_data = $this->session->all_userdata();
		$logged_in = $user_data['logged_in'];
		$logged_out = $user_data['logged_out'];


		if ($logged_in==1 && $logged_out==0) {

			$model_list = $this->ModelModel->get_model_list();
			$time_list = $this->TimeModel->get_time_list();
			$service_list = $this->ServiceModel->get_service_list();
			$company_list = $this->CompanyModel->get_company_list();
			$this->load->view("booking", array('time_list' => $time_list,'service_list' => $service_list,'company_list' => $company_list,'model_list' => $model_list));
		}else{
			$this->login(1);
		}
	}

	function logout(){
		$array_items = array('logged_in', 'email', 'user_id', 'first_name', 'last_name', 'role_id');
		$this->session->unset_userdata($array_items);
		$logged_in=$this->session->userdata;
		$array_items = array('logged_out'=>true,'logged_in'=>0);
		$this->session->set_userdata($array_items);
		$logged_in=$this->session->userdata;
//			echo "<pre>";
//			print_r($logged_in);
//			exit();



		$this->login();
	}
	function sign_up(){
		$this->load->view("sign_up");
	}
	public function check_sign_up_email()
	{
		$customer = $this->input->post();
		$email=$customer['email'];
		$no='no';
//			echo "<pre>";
//			print_r($email);
//			exit();

//			echo "1";

		$token = $this->LoginModel->check_sign_up_email($customer);
		if($token!=$no){
//				echo "<pre>";
//			print_r($token);
//			exit();
			$this->send_validate_email($token,$customer);

		}

		$this->login();

	}
	function send_validate_email($token,$customer){

		$email=$customer['email'];
		$role_id=$customer['id'];
		$password=$customer['password'];
		$first_name=$customer['first_name'];
		$last_name=$customer['last_name'];
		$nic=$customer['nic'];
		$mobile=$customer['mobile'];
		$status=$customer['status'];
		$created_date=date('Y-m-d');
		$created_by=$this->session->userdata('user_id');

		// Load PHPMailer library
		$this->load->library('phpmailer_lib');

		// PHPMailer object
		$mail = $this->phpmailer_lib->load();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'sumangagayashan98@gmail.com';
		$mail->Password = 'Sumanga5121';
		$mail->SMTPSecure = 'tls';
		$mail->Port     = 587;

		$mail->setFrom('sumangagayashan98@gmail.com', 'Sashintha service center');
		$mail->addReplyTo('sumangagayashan98@gmail.com', 'Sashintha service center');

		// Add a recipient
		$mail->addAddress($email);

		// Add cc or bcc
//		$mail->addCC('cc@example.com');
//		$mail->addBCC('bcc@example.com');

		// Email subject
		$mail->Subject = 'Confirm email';

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "Hi<br><br>
						in order to confirm your email,Please click on link below:<br>
						<a href='http://localhost/service_center_1/index.php/LoginController/save_customer?email=$email&token=$token&role_id=$role_id
						&password=$password&first_name=$first_name&last_name=$last_name&nic=$nic&mobile=$mobile&status=$status
						&created_date=$created_date&created_by=$created_by'> 
						http://localhost/service_center_1/index.php/LoginController/reset_password?email=$email&token=$token</a><br><br>
						Kind Regards<br>
						ssg";
		$mail->Body = $mailContent;

		// Send email
		if(!$mail->send()){
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}else{
			$this->login();
		}
	}

	public function save_customer(){
		$token=$this->input->get();


		$this->UserModel->save_user($token);
		$this->login();
	}

	function forgot_password(){
		$this->load->view("forgot_password");

	}
	public function check_email()
	{
		$email = $this->input->post();
		$email1=$email['email'];
		$no='no';
//			echo "<pre>";
//			print_r($email);
//			exit();

//			echo "1";

		$token = $this->LoginModel->check_email($email1);
		if($token!=$no){
//				echo "<pre>";
//			print_r($token);
//			exit();
			$this->send($token,$email1);

		}

		$this->login();

	}
	function send($token,$email1){


		// Load PHPMailer library
		$this->load->library('phpmailer_lib');

		// PHPMailer object
		$mail = $this->phpmailer_lib->load();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'sumangagayashan98@gmail.com';
		$mail->Password = 'Sumanga5121';
		$mail->SMTPSecure = 'tls';
		$mail->Port     = 587;

		$mail->setFrom('sumangagayashan98@gmail.com', 'CodexWorld');
		$mail->addReplyTo('sumangagayashan98@gmail.com', 'CodexWorld');

		// Add a recipient
		$mail->addAddress($email1);

		// Add cc or bcc
//		$mail->addCC('cc@example.com');
//		$mail->addBCC('bcc@example.com');

		// Email subject
		$mail->Subject = 'Reset password';

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "Hi<br><br>
						in order to reset your password,Please click on link below:<br>
						<a href='http://localhost/service_center_1/index.php/LoginController/reset_password?email=$email1&token=$token'> 
						http://localhost/service_center_1/index.php/LoginController/reset_password?email=$email1&token=$token</a><br><br>
						Kind Regards<br>
						ssg";
		$mail->Body = $mailContent;

		// Send email
		if(!$mail->send()){
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}else{
			$this->login();
//			echo 'Message has been sent';
		}
	}
	public function reset_password(){

		$token=$this->input->get('token');
		$email=$this->input->get('email');
//		echo "<pre>";
//		print_r($this->input->get());
//		exit();
		$list=$this->input->get();
		$count = $this->LoginModel->get_id($email,$token);
		if($count>0){
			$this->load->view("reset_password", array('list' => $list));

		}else{
			$this->forgot_password();
		}

	}
	public function password(){
		$password=$this->input->post();
		$this->LoginModel->password($password);
		$this->login();
	}



}
