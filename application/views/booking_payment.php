<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/sweetalert2.min.css">

	<script src="<?= base_url() ?>libraries/js/sweetalert2.min.js"></script>
	<!--===============================================================================================-->
</head>
<body>

<div class="limiter">
	<div class="container-login100" style="background-image: url('<?= base_url() ?>libraries/images/bg-01.jpg');">
		<div class="wrap-login100">



			<form  action="<?=base_url()?>index.php/BookingController/payment" method="POST">
				<span class="login100-form-logo">
										<i class="zmdi zmdi-landscape"></i>
									</span>
				<span class="login100-form-title p-b-34 p-t-27">
						Payment
					</span>
				<script
					src="https://checkout.stripe.com/checkout.js" class="stripe-button"
					data-key="pk_test_FjWGKnE74glY0o3M2MyFYJuo00aOYbj9w5"
					data-amount="500"
					data-name="Booking Payment"
					data-description="Sashintha Service Center"
					data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
					data-locale="auto">
				</script>
			</form>

		</div>
	</div>
</div>


<div id="dropDownSelect1"></div>
<script>

	//var service_date = document.getElementById("service_date")
	//
	//function search_username() {
	//	console.log(service_date);
	//
	//
	//	$.ajax({
	//		url: "<?//= base_url()?>//index.php/BookingController/check",
	//		method: "get",
	//		data: {
	//			'service_date': $('#service_date').val()
	//		},
	//		success: function (result) {
	//			console.log(result);
	//
	//		}
	//	});
	//}
	//
	//service_date.onkeyup = search_username;





</script>

<!--===============================================================================================-->
<script src="<?= base_url() ?>libraries/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url() ?>libraries/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url() ?>libraries/vendor/bootstrap/js/popper.js"></script>
<script src="<?= base_url() ?>libraries/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url() ?>libraries/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url() ?>libraries/vendor/daterangepicker/moment.min.js"></script>
<script src="<?= base_url() ?>libraries/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url() ?>libraries/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url() ?>libraries/js/main.js"></script>
<script>

	var action = "Pay";
	var module = "Booking";
	var type = "info";
	var action_progress = "Paying";
	var action_past = "Payed";
	$(document).ready(function () {
		$('#form').submit(function (event) {
			event.preventDefault();
			sweet_alert();
		});
	});

	function sweet_alert() {
		swal({
			title: "Please check your mail inbox" ,
			text: "Please check your mail inbox",
			type: "question",
			showCancelButton: true,
			confirmButtonColor: "#00c853",
			cancelButtonColor: "#e53935",
			confirmButtonText: '<i class="fa fa-plus-circle"></i> ' + action,
			cancelButtonText: '<i class="fa fa-times-circle"></i> Close',
			animation: true,
			buttonsStyling: true
		}).then(function (isConfirm) {
			if (isConfirm) {
				swal({
					title:  "Sending mail ",
					text: "Please stand by until the " + module + " is being " + action_past + "..",
					type: type,
					timer: 2000,
					onOpen: function () {
						swal.showLoading()
					}
				}).then(
					function () {
					},
					function (dismiss) {
						if (dismiss === 'timer') {
							var myForm = document.getElementById("form");
							setTimeout(function () {
								myForm.submit();
							}, 1000);

							swal("Successful!", module + " has been " + action_past, "success");
							setTimeout(function () {
							}, 1000);
						}
					}
				)
			} else {
				swal("Cancelled", "", "error");
			}
		}, function (dismiss) {
			if (dismiss === 'cancel') {
				swal("Cancelled", "", "error");
			}
		})
	}
</script>


</body>
</html>
