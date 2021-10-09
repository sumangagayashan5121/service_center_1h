<?php


class BookingController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("BookingModel");
		$this->load->model("PermissionModel");
		$this->load->model("ReportModel");


	}

//	public function create_performer_invoice(){
//		$booking_id=$this->input->get();
////								echo "<pre>";
////		print_r($booking_id);
////		exit();
//		$this->load->view("header");
//		$this->load->view("necessary/performer_invoice",array('booking_id' => $booking_id));
//		$this->load->view("footer");
//	}
//	public function save_performer_invoice(){
//		$performer_invoice=$this->input->post();
////								echo "<pre>";
////		print_r($performer_invoice['booking_id']);
//		$performer_invoice_id=$this->BookingModel->save_performer_invoice($performer_invoice);
//		$this->view_performer_invoice($performer_invoice_id);
//
//	}
//	public function get_performer_invoice_list(){
////		if ($this->PermissionModel->get_permission(MO_INVOICE_LIST)){
//
//		$performer_invoice_list = $this->BookingModel->get_performer_invoice_list();
//		$this->load->view("header");
//		$this->load->view("necessary/performer_invoice_list", array('performer_invoice_list' => $performer_invoice_list));
//		$this->load->view("footer");
////		}else{
////			$this->load->view('403');
////		}
//	}
//	public function view_performer_invoice($performer_invoice_id){
//		if ($this->PermissionModel->get_permission(MO_INVOICE_VIEW)){
//
////		echo "<pre>";
////		print_r($performer_invoice_id);
////		exit();
//			$performer_invoice_detail = $this->BookingModel->get_performer_invoice_details($performer_invoice_id);
//
//			$this->load->view("header");
//			$this->load->view("necessary/performer_invoice_view", array('performer_invoice_detail'=> $performer_invoice_detail));
//			$this->load->view("footer");
//		} else {
//
//			$this->load->view('403');
//		}
//
//	}
//	public function view_performer_invoice1(){
//		if ($this->PermissionModel->get_permission(MO_INVOICE_VIEW)){
//
//			$performer_invoice_id = $this->input->get('id');
////		echo "<pre>";
////		print_r($performer_invoice_id);
////		exit();
//			$performer_invoice_detail = $this->BookingModel->get_performer_invoice_details($performer_invoice_id);
//
//			$this->load->view("header");
//			$this->load->view("necessary/performer_invoice_view", array('performer_invoice_detail'=> $performer_invoice_detail));
//			$this->load->view("footer");
//		} else {
//
//			$this->load->view('403');
//		}
//
//	}
//


	public function check(){

		$booking = $this->input->post();
//						echo "<pre>";
//		print_r($this->input->post());
//		exit();
		$service_time=$this->BookingModel->check($booking['service_date']);

		$this->load->view("booking1",array('service_time' => $service_time,'booking'=>$booking));

	}
	public function create_holiday(){
		if ($this->PermissionModel->get_permission(MO_HOLIDAY_CREATE)){

			$this->load->view("header");
			$this->load->view("booking/create_holiday");
			$this->load->view("footer");
		} else {
			$this->load->view('403');
		}

//				echo "<pre>";
//		print_r($this->input->get());
//		exit();
	}

	public function save_holiday(){

		$holidays = $this->input->post("holidays");
		$holiday_array = explode(',', $holidays);

//						echo "<pre>";
//		print_r($holiday_array);
//		exit();

		$this->BookingModel->save_holiday($holiday_array);
	}

	public function save_temp_booking(){
//		echo "<pre>";
//		print_r($this->input->post());
//		exit();

//		$email=array(
//			'customer_name' => $this->input->post('customer_name'),
//			'service_date' => $this->input->post('service_date'),
//			'email' => $this->input->post('email'),
//			'reg_no'=> $this->input->post('reg_no')
//		);


		$array=$this->BookingModel->save_temp_booking($this->input->post());
//				echo "<pre>";
//		print_r($array[0]['email']);
//		exit();
		$role_id=$array[0]['role_id'];
		$email=$array[0]['email'];


//		$this->send($email,$array);
		if($role_id==4){

			redirect('/BookingController/finish_booking');

		}else{
			$array=$this->BookingModel->save_booking($email);
			$this->send($array);
		}



	}
	public function Payment(){
		require_once('application/views/stripe-php-master/init.php');
		require_once  "application/views/payment.php";


		$token = $_POST['stripeToken'];
		$email= $_POST['stripeEmail'];

		$charge = \Stripe\Charge::create(array(
			'amount' => 500,
			'currency' => 'usd',
			'description' => 'Booking charge',
			'source' => $token,
		));
		$array=$this->BookingModel->save_booking($email);
		$this->send($array);
	}

	public function finish_booking(){
		$this->load->view('finish_booking');
	}


	function send($array){
		$role_id=$array['role_id'];
		$reg_no=$array['reg_no'];
		$start_time=$array['start_time'];
		$end_time=$array['end_time'];
		$booking_id=$array['booking_id'];
		$email1=$array['email'];
		$customer_name=$array['customer_name'];
		$service_date=$array['service_date'];
		$date=date('Y-m-d');
		$time=date('h:i:s');


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
		$mail->Subject = 'Booking for service';

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "

<style>
	
</style>

<div class=\"container-fluid\" id=\"po\">
	<table class=\"table\">
		<tr>
			<td colspan=\"9\"></td>
			<td style=\"text-align: right !important; padding-top: 20px\" id=\"porder\">
				<h3 id=\"poheader\" style=\"text-transform: uppercase;\">
					Booking  for service</h3>
			</td>
		</tr>
	</table>

	<table border=\"0\" style=\"margin-bottom:-25px;margin-top:1px\" class=\"table\">
		
			<td  >
				<h6>SASHINTHA SERVICE CENTER</h6>
				<h6 style=\"font-size: 11px\"> Imaduwa Rd, Ahangama</h6>
				<h6> Booking No: ".$booking_id."</h6>
			</td>
		
		
			<td style=\"padding: 20px\">
				
				<h5 style=\"font-size: 10px;text-align:end;\"><b>DATE: </b>".$date."  </h5>
				<h5 style=\"font-size: 10px;text-align:end;\"><b>DATE: </b>".$time."  </h5>
				
			</td>
		
	</table>
	<hr>
	<table class=\"table table-striped small table-condensed table-bordered\" style=\"font-size: 9.5px\">
		<tr>
			<th>CUSTOMER NAME</th>
			<th>VEHICLE NUM</th>
			<th>SERVICE DATE</th>
			<th>SERVICE START TIME</th>
			<th>SERVICE END TIME</th>

		</tr>
		<tr>
			<th>".$customer_name."</th>
			<th>".$reg_no."</th>
			<th>".$service_date."</th>
			<th>".$start_time."</th>
			<th>".$end_time."</th>

		</tr>
		
	</table>


	<clearfix></clearfix>
	
	
	<hr>

</div>


";



		$mail->Body = $mailContent;

		// Send email
		if(!$mail->send()){
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}else{
			if($role_id==4){

				redirect('LoginController/customer');
			}else{
				$this->view_booking($booking_id);}
		}
	}

	public function view_booking($booking_id){
		if ($this->PermissionModel->get_permission(MO_BOOKING_VIEW)){
			$receipt_view = $this->BookingModel->view_booking($booking_id);
			$approve=array(
				'user'=>$this->session->userdata('user_name'),
				'date'=>date('Y-m-d')
			);
			$this->load->view("header");
			$this->load->view("receipt/receipt_view", array('receipt_view'=> $receipt_view,'approve'=>$approve));
			$this->load->view("footer");
		} else {

			$this->load->view('403');
		}
	}
	public function view_booking1(){
		if ($this->PermissionModel->get_permission(MO_BOOKING_VIEW)){

			$booking_id = $this->input->get('id');
			$receipt_view = $this->BookingModel->view_booking($booking_id);
			$approve=array(
				'user'=>$this->session->userdata('user_name'),
				'date'=>date('Y-m-d')
			);
//				echo "<pre>";
//		print_r($approve);
//		exit();

			$this->load->view("header");
			$this->load->view("receipt/receipt_view", array('receipt_view'=> $receipt_view,'approve'=>$approve));
			$this->load->view("footer");
		} else {

			$this->load->view('403');
		}
	}
	function index(){
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
	public function booking_list(){
		if ($this->PermissionModel->get_permission(MO_BOOKING_LIST)){
			$booking_list = $this->BookingModel->get_booking_list();

			$this->load->view("header");
			$this->load->view("booking/booking_list", array('booking_list' => $booking_list));
			$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
	public function validate_date()
	{
		$date = $this->input->get('service_date');
		$count = $this->BookingModel->validate_date($date);
		echo json_encode($count);
	}
	public function holiday_list(){
		if ($this->PermissionModel->get_permission(MO_HOLIDAY_LIST)){

			$holiday_list = $this->BookingModel->get_holiday_list();


			$this->load->view("header");
			$this->load->view("booking/holiday_list", array('holiday_list' => $holiday_list));
			$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
	public function update_holiday(){
		if ($this->PermissionModel->get_permission(MO_HOLIDAY_EDIT)){
			$id = $this->input->get();

			$this->BookingModel->update_holiday($id);
			$this->holiday_list();
		}else{
			$this->load->view('403');
		}
	}


}
