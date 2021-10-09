<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Edit User</h5>
		</div>
	</div>
	<form action="<?=base_url()?>index.php/UserController/update_user" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Email(user name)
					<input type="text" class="form-control" value="<?= $user['email'] ?>" type="email"
						   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
						   title="Must contain valid email address"  autocomplete="off" required id="email" onchange="search_email()
						   name="email">
					<input type="hidden" name="id" value="<?= $user['user_id'] ?>" autocomplete="off" required>

				</div>
				<div class="col-md-6">
					Role ID
					<input type="text" class="form-control" value="<?= $user['role_id'] ?>" autocomplete="off" required
						   name="role_id">
				</div>
				<div class="col-md-6">
					First Name
					<input type="text" class="form-control" value="<?= $user['first_name'] ?>" autocomplete="off" required
						   name="first_name">
				</div>
				<div class="col-md-6">
					Last Name
					<input type="text" class="form-control" value="<?= $user['last_name'] ?>" autocomplete="off" required
						   name="last_name">
				</div>
				<div class="col-md-6">
					NIC Name
					<input type="text" class="form-control" value="<?= $user['nic'] ?>" pattern="[0-9]{9}[x|X|v|V]$" autocomplete="off"
						   title="Must contain nine numbers and V letter or X letter" autocomplete="off" required
						   name="nic">
				</div>
				<div class="col-md-6">
					Mobile
					<input type="text" class="form-control" value="<?= $user['mobile'] ?>" autocomplete="off" required
						   pattern="[0-9]{10}" autocomplete="off"
						   title="Please enter valid mobile number with ten numbers" name="mobile">
				</div>
				<div class="col-md-6">
					Upload profile photo
					<input class="form-control"  type="file" name="image" id="image">
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="user_status" name="user_status">
						<option value="1">ACTIVE</option>
						<option value="0">INACTIVE</option>
					</select>
				</div>
			</div>
			<!--<div class="row form-group">
				<div class="col-md-6">
					User Role <span style="color: red">*</span>
					<select class="form-control" required name="role_id">
						<option value="">SELECT ROLE</option>
						<?php foreach ($role_list as $role) { ?>
							<option <?= $role['id'] == $user['role_id'] ? 'selected' : '' ?> value="<?= $role['id'] ?>">
								<?= $role['role'] ?>
							</option>
						<?php } ?>
					</select>
				</div>
			</div>-->
			<div class="row form-group" style="margin-top: 2%">
				<div class="col-md-6">
					<label class="text-muted">Change password? </label>
					<input style="margin-left: 10px;" type="checkbox" id="change_password">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-6">
					New Password
					<input type="password" disabled class="form-control" id="password" required name="password">
				</div>
				<div class="col-md-6">
					Confirm New Password
					<input type="password" disabled class="form-control" id="confirm_password" required>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12 text-right">
					<a href="index"><input type="button" class="btn btn-success" value="go to list"></a>
					<input type="submit" class="btn btn-primary" value="update">
				</div>
			</div>
		</div>
	</form>
</div>

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
