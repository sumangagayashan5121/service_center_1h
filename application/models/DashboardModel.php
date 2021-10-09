<?php


class DashboardModel extends CI_Model
{
	public function save_contact($contact){
		$this->db->insert('contact',$contact);

	}
	public function get_contact_list(){
		$sql = "SELECT * FROM contact WHERE reply=1 ";
		$return =$this->db->query($sql)->result_array();
		return $return;
	}
	public function get_all_contact_list(){
		$sql = "SELECT * FROM contact";
		$return =$this->db->query($sql)->result_array();
		return $return;
	}

	public function contact_set($contact_id){
		$sql = "UPDATE contact SET reply=0 WHERE contact_id=$contact_id";
		$this->db->query($sql);

		$sql = "SELECT * FROM contact WHERE contact_id=$contact_id";
		$return =$this->db->query($sql)->result_array();
		$return=$return[0];
//										echo "<pre>";
//		print_r($return);
//		exit();
		return $return;

	}
	public function promotion_save($array){
			$this->db->insert('promotion',$array);
		return $array;
	}
	public function promotion_send($array){
		$sql = "SELECT * FROM customer";
		$count =$this->db->query($sql)->num_rows();
//		echo "<pre>";
//		print_r($return);
//		exit();
		for($a=1;$a<=$count;++$a){
			$sql = "SELECT email FROM customer WHERE customer_id='$a' ";
			$return =$this->db->query($sql)->result_array();

			$email=$return[0]['email'];
			$subject=$array['subject'];
			$content=$array['content'];
//					echo "<pre>";
//		print_r($email);
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
			$mail->addAddress($email);

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
//				echo 'Message could not be sent.';
//				echo 'Mailer Error: ' . $mail->ErrorInfo;
				return;
			}
		};
		return;
	}
	public function promotion_list(){
		$sql = "SELECT * FROM promotion";
		$return =$this->db->query($sql)->result_array();
		return $return;
	}

}
