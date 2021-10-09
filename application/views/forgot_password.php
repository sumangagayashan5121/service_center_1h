<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="icon" type="image/png" href="<?= base_url() ?>libraries/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/main.css">
	<script src="<?= base_url() ?>libraries/vendor/jquery/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/sweetalert2.min.css">

	<script src="<?= base_url() ?>libraries/js/sweetalert2.min.js"></script>
</head>
<body>

<div class="limiter">
	<div class="container-login100" style="background-image: url('<?= base_url() ?>libraries/images/bg-01.jpg');">
		<div class="wrap-login100">
			<form class="login100-form validate-form" id="form" action="<?=base_url()?>index.php/LoginController/check_email" method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

				<span class="login100-form-title p-b-34 p-t-27">
						Forgot Password
					</span>

				<div class="wrap-input100 validate-input" data-validate = "Enter email">
					<input class="input100" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
						   title="Must contain valid email address" id="email" name="email" onchange="search_email()" placeholder="Email" required autocomplete="off">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>


				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						Confirm
					</button>

				</div>

			</form>
		</div>
	</div>
</div>
</body>
</html>
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
					email.setCustomValidity('');
				} else {
					email.setCustomValidity('Your email is wrong');
				}
			}
		});
	}
</script>
<script>
	var action = "Send";
	var module = "Reset password";
	var type = "info";
	var action_progress = "Sending";
	var action_past = "sent";
	$(document).ready(function () {
		$('#form').submit(function (event) {
			event.preventDefault();
			sweet_alert();
		});
	});

	function sweet_alert() {
		swal({
			title: "Please check your mail inbox to reset your password" ,
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
	var password = document.getElementById("password");
	var confirm_password = document.getElementById("confirm_password");

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



