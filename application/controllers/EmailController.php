<?php


class EmailController extends CI_Controller
{
	function  __construct(){
		parent::__construct();
	}

	function send(){
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
		$mail->addAddress('arunimadushani97@gmail.com');

		// Add cc or bcc
		$mail->addCC('cc@example.com');
		$mail->addBCC('bcc@example.com');

		// Email subject
		$mail->Subject = 'Send Email via SMTP using PHPMailer in CodeIgniter';

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "<h1>Send HTML Email using SMTP in CodeIgniter</h1>
            <p>This is a test email sending using SMTP mail server with PHPMailer.</p>";
		$mail->Body = $mailContent;

		// Send email
		if(!$mail->send()){
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		}else{
			echo 'Message has been sent';
		}
	}

}
