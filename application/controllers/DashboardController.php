<?php


class DashboardController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("DashboardModel");
		$this->load->model("PermissionModel");
		$this->load->model("ReportModel");


	}
	public function index_all(){
		if ($this->PermissionModel->get_permission(MO_CONTACT_LIST)){


			$contact_list = $this->DashboardModel->get_all_contact_list();
			$this->load->view("header");
			$this->load->view("contact/contact_list", array('contact_list' => $contact_list));
			$this->load->view("footer");
		}else{
			$this->load->view('403');
		}


	}
	public function save_image(){
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
//			echo "<pre>";
//			print_r($path);
//			exit();
		}else{
			print_r($this->upload->display_errors());
		}
	}
	function send(){

		$email=$this->input->post();

		$email1=$email['email'];

		$customer_name=$email['name'];
		$mobile=$email['mobile'];
		$content=$email['content'];


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

		$mail->setFrom($email1, 'Sashintha service center');
		$mail->addReplyTo($email1, 'Sashintha service center');

		// Add a recipient
		$mail->addAddress('sumangagayashan98@gmail.com');

		// Add cc or bcc
//		$mail->addCC('cc@example.com');
//		$mail->addBCC('bcc@example.com');

		// Email subject
		$mail->Subject = 'Please contact';

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "<h1>Contact details</h1>".
			"Customer name= " .$customer_name. "<br>".
			"Mobile= " .$mobile. "<br>".
			"Content= ".$content;


		$mail->Body = $mailContent;

		// Send email
		if(!$mail->send()){
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}else{
			$this->save_contact($email);
		}
	}
	function save_contact($email){
		$email1=$email['email'];
		$customer_name=$email['name'];
		$mobile=$email['mobile'];
		$content=$email['content'];

		$contact=array(
			'contact_name'=>$customer_name,
			'contact_email'=>$email1,
			'contact_mobile'=>$mobile,
			'contact_message'=>$content,
			'reply'=>"did not"
		);

		$this->DashboardModel->save_contact($contact);
		$this->home_customer();


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
	


	public function reply(){
		if ($this->PermissionModel->get_permission(MO_CONTACT_REPLY)){
		$id = $this->input->get('id');

		$id_list=array(
			'id'=>$id
		);

		$this->load->view("header");
		$this->load->view("contact/reply", array('id_list' => $id_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
	public function reply_contact(){
		$reply=$this->input->post();
//								echo "<pre>";
//		print_r($reply['contact_id']);
//		exit();
		$contact_id=$reply['contact_id'];
		$contact = $this->DashboardModel->contact_set($contact_id);
		$this->reply_mail($reply,$contact);
	}
	public function reply_mail($reply,$contact){



		$email1=$contact['contact_email'];

		$subject=$reply['subject'];
		$content=$reply['reply'];
//		echo "<pre>";
//		print_r($subject);
//		exit();


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
		$mail->addAddress($email1);

		// Add cc or bcc
//		$mail->addCC('cc@example.com');
//		$mail->addBCC('bcc@example.com');

		// Email subject
		$mail->Subject = $subject;

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
//		$mailContent = "<h1>Contact details</h1>".
//			"Customer name= " .$customer_name. "<br>".
//			"Mobile= " .$mobile. "<br>".
//			"Content= ".$content;


		$mail->Body = $content;

		// Send email
		if(!$mail->send()){
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}else{
			$this->index_all();
		}
	}
	public function promotion_create(){
		$this->load->view("header");
		$this->load->view("promotion/promotion_create");
		$this->load->view("footer");
	}
	public function promotion_list(){
		$category_list = $this->DashboardModel->promotion_list();
		$this->load->view("header");
		$this->load->view("promotion/promotion_list", array('category_list' => $category_list));
		$this->load->view("footer");
	}
	public function promotion_save(){
//				echo "<pre>";
//		print_r($this->input->post());
//		exit();
		$array=array(
			'subject'=>$this->input->post('subject'),
			'content'=>$this->input->post('Content')
		);
		$array=$this->DashboardModel->promotion_save($array);
		$this->promotion_send($array);
	}
	public function promotion_send($array){
		$this->DashboardModel->promotion_send($array);
	}
}

