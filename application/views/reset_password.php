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
	<!--===============================================================================================-->
</head>
<body>

<div class="limiter">
	<div class="container-login100" style="background-image: url('<?= base_url() ?>libraries/images/bg-01.jpg');">
		<div class="wrap-login100">
			<form class="login100-form validate-form" action="<?=base_url()?>index.php/LoginController/password" method="post">
				<!--					<span class="login100-form-logo">-->
				<!--						<i class="zmdi zmdi-landscape"></i>-->
				<!--					</span>-->
				<span class="login100-form-title p-b-34 p-t-27">
						Reset Password
					</span>



				<input type="hidden" name="email" value="<?= $list['email'] ?>">
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
	var action = "Update"
	var module = "Reset passwword";
	var type = "info";
	var action_progress = "Updating";
	var action_past = "updated";

	var password = document.getElementById("password");
	var confirm_password = document.getElementById("confirm_password");
	var username = document.getElementById("username")



	username.onkeyup = search_username;

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

</body>
</html>
