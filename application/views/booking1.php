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

	<script src="<?=base_url() ?>libraries/js/sweetalert2.min.js"></script>
	<!--===============================================================================================-->
</head>
<body>

<div class="limiter">
	<div class="container-login100" style="background-image: url('<?= base_url() ?>libraries/images/bg-01.jpg');">
		<div class="wrap-login100">
<!--			<form action="" method="">-->

			<form class="login100-form validate-form" id="form" action="<?=base_url()?>index.php/BookingController/save_temp_booking" method="POST">
								<span class="login100-form-logo">
										<i class="zmdi zmdi-landscape"></i>
									</span>
				<span class="login100-form-title p-b-34 p-t-27">
						Booking
					</span>

				<div class="wrap-input100 validate-input" data-validate = "customer_name">
					<input class="input100" type="text" name="customer_name" placeholder="Customer name" id="customer_name" required>
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
					<input type="hidden" class="form-control" name="reg_no" value="<?php if(isset($booking)){echo $booking['reg_no'];}?>">
					<input type="hidden" class="form-control" name="service_date" value="<?php if(isset($booking)){echo $booking['service_date'];}?>">
					<input type="hidden" class="form-control" name="model_id" value="<?php if(isset($booking)){echo $booking['model_id'];}?>">
					<input type="hidden" class="form-control" name="company_id" value="<?php if(isset($booking)){echo $booking['company_id'];}?>">
					<input type="hidden" class="form-control" name="service_id" value="<?php if(isset($booking)){echo $booking['service_id'];}?>">
					<input type="hidden" class="form-control" name="status" value="1">
				</div>

				<div class="wrap-input100 validate-input" data-validate = "nic">
					<input class="input100" type="text" name="nic" placeholder="NIC" id="nic"
						   pattern="[0-9]{9}[x|X|v|V]$" autocomplete="off"
						   title="Must contain nine numbers and V letter or X letter" required>
					<span class="focus-input100" data-placeholder="&#xf207;"></span>

				</div>

				<div class="wrap-input100 validate-input" data-validate = "address">
					<input class="input100" type="text" name="address" placeholder="Address" id="address" autocomplete="off" required>
					<span class="focus-input100" data-placeholder="&#xf207;"></span>

				</div>

				<div class="wrap-input100 validate-input" data-validate = "mobile1">
					<input class="input100" type="text" name="mobile1" placeholder="Mobile number" id="mobile1" autocomplete="off"
						   title="Please enter valid mobile number with ten numbers" required>
					<span class="focus-input100" data-placeholder="&#xf207;"></span>

				</div>

				<div class="wrap-input100 validate-input" data-validate = "mobile2">
					<input class="input100" type="text" name="mobile2" placeholder="Mobile number(optional)" autocomplete="off" pattern="[0-9]{10}"
						   title="Please enter valid mobile number with ten numbers" id="mobile2">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>

				</div>

				<div class="wrap-input100 validate-input" data-validate = "email">
					<input class="input100"  name="email" placeholder="Email" id="email"
						   type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
						   title="Must contain valid email address"required autocomplete="off">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>

				</div>

				<div class="wrap-input100 validate-input" data-validate = "Enter Service time" required>
					<select class="form-control" required name="service_time">
						<option value="">SELECT TIME</option>
						<?php foreach ($service_time as $time) { ?><option value="<?= $time['time_id'] ?>"><?= $time['start_time'] ?>-<?= $time['end_time'] ?></option><?php } ?>
					</select>
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>
<!--				<script-->
<!--					src="https://checkout.stripe.com/checkout.js" class="stripe-button"-->
<!--					data-key="pk_test_FjWGKnE74glY0o3M2MyFYJuo00aOYbj9w5"-->
<!--					data-amount="500"-->
<!--					data-name="Booking Payment"-->
<!--					data-description="Sashintha Service Center"-->
<!--					data-image="https://stripe.com/img/documentation/checkout/marketplace.png"-->
<!--					data-locale="auto">-->
<!--				</script>-->





				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn" id="create">
						Confirm
					</button>
				</div>

			</form>


		</div>
	</div>
</div>


<div id="dropDownSelect1"></div>
<script>



	$(document).ready(function(){
		$('#service_date').change(function(){
			var service_date = $('#service_date').val();
			console.log(service_date);
			$.ajax({
				type: 'POST',
				url: '<?=base_url();?>index.php/BookingController/check',
				dataType: 'json',
				data: {list: service_date},
				success: function($service_time){
					$('#result').html($service_time.list);
				}
			});
		});
	});



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
	function search_email() {
		var email = document.getElementById("email");
		console.log(email);
		$.ajax({
			url: "<?= base_url()?>index.php/UserController/validate_email",
			method: "get",
			data: {
				'email': $('#email').val()

			},
			success: function (result) {
				var obj = $.parseJSON(result);
				console.log(obj);
				if (obj > 0) {
					email.setCustomValidity('Email already exists..');
				} else {
					email.setCustomValidity('');
				}
			}
		});
	}
	var action = "Book";
	var module = "Booking";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "Done";
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
