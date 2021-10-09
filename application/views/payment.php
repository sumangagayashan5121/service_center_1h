<?php

require_once "application/views/stripe-php-master/init.php";
//require_once "application/views/booking1.php";

$stripeDetails=array(
	"secretKey"=>"sk_test_XEQ9mkw9sA5eFyhOrIvlM4fu00hWwzad6P",
	"publishKey"=>"pk_test_FjWGKnE74glY0o3M2MyFYJuo00aOYbj9w5"
);

// Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys

\Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
