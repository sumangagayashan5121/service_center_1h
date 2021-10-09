<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?><div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Create Staff</h5>
		</div>
	</div>

	<form action="save_staff" id="form"  method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="row form-group">

				<div class="col-md-6">
					Staff Role
					<select class="form-control" required name="id">
						<option value="">SELECT ROLE</option>
						<?php foreach ($role_list as $role) { ?><option value="<?= $role['id'] ?>"><?= $role['role'] ?></option><?php } ?>
					</select>
				</div>
				<div class="col-md-6">
					Email(user name)
					<input class="form-control"  type="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
						   title="Must contain valid email address" name="email" required autocomplete="off" onchange="search_email()">
				</div>
				<div class="col-md-6">
					First Name
					<input type="text" class="form-control"
						   name="first_name" autocomplete="off" required>
				</div>
				<div class="col-md-6">
					Last Name
					<input type="text" class="form-control" autocomplete="off"
						   name="last_name" required>
				</div>

				<div class="col-md-6">
					NIC
					<input type="text" class="form-control"  pattern="[0-9]{9}[x|X|v|V]$" autocomplete="off"
						   title="Must contain nine numbers and V letter or X letter" name="nic" required>
				</div>

				<div class="col-md-6">
					Mobile
					<input class="form-control"  type="text" pattern="[0-9]{10}"
						   title="Please enter valid mobile number with ten numbers" name="mobile" autocomplete="off" required>
				</div>
				<div class="col-md-6">
					Job
					<input type="text" class="form-control" autocomplete="off"
						   name="job" required>
				</div>
<!--				<div class="col-md-6">-->
<!--					Payment-->
<!--					<input type="text" class="form-control" autocomplete="off"-->
<!--						   name="payment type" required>-->
<!--				</div>-->
				<div class="col-md-6">
					Basic Sallary
					<input type="text" class="form-control" autocomplete="off"
						   name="basic_sallary" required>
				</div>
				<div class="col-md-6">
					Upload profile photo
					<input class="form-control"  type="file" name="image" id="image">
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="staff_status" name="status">
						<option value="1">ACTIVE</option>
						<option value="0">INACTIVE</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
					Password <span style="color: red">*</span>
					<input type="password" class="form-control" required id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
						   title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
					<input type="checkbox" onclick="myFunction()">Show Password
				</div>
				<div class="col-md-6">
					Confirm Password <span style="color: red">*</span>
					<input type="password" class="form-control" required id="confirm_password" name="confirm_password">
					<input type="checkbox" onclick="myFunction1()">Show Password
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-12 text-right">
					<a href="index"><input type="button" class="btn btn-success" value="go to list"></a>
					<button type="submit" class="btn btn-primary" id="create">create</button>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	function myFunction() {
		var x = document.getElementById("password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
	function myFunction1() {
		var x = document.getElementById("confirm_password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}
	var myInput = document.getElementById("password");


	var action = "Create";
	var module = "Staff";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "created";

	var confirm_password = document.getElementById("confirm_password");
	var email = document.getElementById("email");

	function search_email() {
		var email = document.getElementById("email");
		console.log(email);
		$.ajax({
			url: "<?= base_url()?>index.php/StaffController/validate_email",
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

	// email.onchange = search_email;

	function validatePassword() {
		if (myInput.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords don't match");
		} else {

			confirm_password.setCustomValidity('');
		}

	}

	myInput.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;

</script>
