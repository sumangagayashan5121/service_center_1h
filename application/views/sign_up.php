<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?= base_url() ?>libraries/images/icons/favicon.ico"/>
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
			<form class="login100-form validate-form" id="form" action="<?=base_url()?>index.php/LoginController/check_sign_up_email" method="post">
<!--					<span class="login100-form-logo">-->
<!--						<i class="zmdi zmdi-landscape"></i>-->
<!--					</span>-->
				<span class="login100-form-title p-b-34 p-t-27">
						Create an Account
					</span>
				<div class="wrap-input100 validate-input" data-validate = "Enter Email">
					<input class="input100" type="email"  name="email" placeholder="Email"
						   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
						   title="Must contain valid email address" id="email" name="email"required autocomplete="off" onchange="search_email()">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
					<input type="hidden" id="id" class="form-control" name="id" value="4">
					<input type="hidden" class="form-control" name="status" value="1">

				</div>

				<div class="wrap-input100 validate-input" data-validate = "Enter First name">
					<input class="input100" type="text" name="first_name" placeholder="First name" autocomplete="off" required>
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Enter Last name">
					<input class="input100" type="text" name="last_name" placeholder="Last name" autocomplete="off" required>
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>


				<div class="wrap-input100 validate-input" data-validate = "Enter NIC">
					<input class="input100" type="text" name="nic" placeholder="NIC"
						   pattern="[0-9]{9}[x|X|v|V]$"
						   title="Must contain nine numbers and V letter or X letter" required autocomplete="off">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate = "Enter Mobile">
					<input class="input100" type="mobile" name="mobile" placeholder="Mobile"
						   pattern="[0-9]{10}"
						   title="Please enter valid mobile number with ten numbers" required autocomplete="off">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>


				<div class="wrap-input100 validate-input" data-validate = "Enter password">
					<input class="input100" type="password" required id="password" name="password" placeholder="Password"
						   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
						   title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
					<span class="focus-input100" data-placeholder="&#xf191;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Enter Confirm password">
					<input class="input100" type="password" required id="confirm_password" name="confirm_password" placeholder="Confirm password">
					<span class="focus-input100" data-placeholder="&#xf191;"></span>
				</div>


				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn" id="create">
						Create
					</button>
				</div>

			</form>
		</div>
	</div>
</div>


<div id="dropDownSelect1"></div>
<script>

	var password = document.getElementById("password");
	var confirm_password = document.getElementById("confirm_password");
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

	function validatePassword() {
		if (password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords don't match");
		} else {
			confirm_password.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;

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
	var action = "Create";
	var module = "Account";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "created";
	$(document).ready(function () {
		$('#form').submit(function (event) {
			event.preventDefault();
			sweet_alert();
		});
	});

	function sweet_alert() {
		swal({
			title: "Please check your mail inbox to activate account" ,
			// text: "",
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
					text: "Please stand by until the mail is being send..",
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
