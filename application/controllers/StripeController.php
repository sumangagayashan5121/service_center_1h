<?php


class StripeController extends CI_Controller {


	public function Payment(){
		require_once('application/views/stripe-php-master/init.php');


		require_once  "application/views/payment.php";

// Token is created using Stripe Checkout or Elements!
// Get the payment token ID submitted by the form:
		$token = $_POST['stripeToken'];
//		echo "<pre>";
//		var_dump($_POST);
//		exit();
		$charge = \Stripe\Charge::create(array(
			'amount' => 500,
			'currency' => 'usd',
			'description' => 'Booking charge',
			'source' => $token,
		));

//		$output=$this->input->post();



	}
}
