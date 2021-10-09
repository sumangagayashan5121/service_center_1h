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
			<form class="login100-form validate-form" action="<?=base_url()?>index.php/LoginController/login_validation" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

				<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

				<div class="wrap-input100 validate-input" data-validate = "Enter email">
					<input class="input100"  name="email" placeholder="Email"
						   type="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
						   title="Must contain valid email address"autocomplete="off" onchange="search_email()" required>

					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<input class="input100" type="password" name="password" placeholder="Password" id="password" autocomplete="off" required>
					<span class="focus-input100" data-placeholder="&#xf191;"></span>
				</div>
				<input type="hidden" name="booking" value="<?=$booking?>">

<!--				<div class="contact100-form-checkbox">-->
<!--					<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">-->
<!--					<label class="label-checkbox100" for="ckb1">-->
<!--						Remember me-->
<!--					</label>-->
<!--				</div>-->
				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						Login
					</button>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--					<button class="login100-form-btn" href="--><?//= base_url() ?><!--index.php/LoginController/sign_up">-->
<!--						Sign up-->
<!--					</button>-->
					<div class="login100-form-btn">
						<a class="txt" href="<?= base_url() ?>index.php/LoginController/sign_up">
							Sign up
						</a>
					</div>
				</div>

				<div class="text-center p-t-90">
					<a class="txt1" href="<?= base_url() ?>index.php/LoginController/forgot_password">
						Forgot Password?
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	var password = document.getElementById("password");
	var email = document.getElementById("email");
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
					password.setCustomValidity('');
				} else {
					password.setCustomValidity('Please enter correct password');
				}
			}
		});
	}
</script>

<div id="dropDownSelect1"></div>

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

</body>
</html>
