<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">User Profile</h5>
		</div>
	</div>
	<form action="<?=base_url()?>index.php/UserController/update_user" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					User Name
					<input type="text" class="form-control" value="<?= $this->session->userdata('user_name');?>" required id="username"
						   name="user_name">
					<input type="hidden" name="id" value="<?= $this->session->userdata('user_id');?>">
				</div>
				<div class="col-md-6">
					Role ID
					<input type="text" class="form-control" value="<?= $this->session->userdata('role_id');?>"
						   name="role_id">
				</div>
				<div class="col-md-6">
					First Name
					<input type="text" class="form-control" value="<?= $this->session->userdata('first_name');?>"
						   name="first_name">
				</div>
				<div class="col-md-6">
					Last Name
					<input type="text" class="form-control" value="<?= $this->session->userdata('last_name');?>"
						   name="last_name">
				</div>
				<div class="col-md-6">
					NIC
					<input type="text" class="form-control" value="<?= $this->session->userdata('nic');?>"
						   name="nic">
				</div>
				<div class="col-md-6">
					Created Date
					<input type="text" class="form-control" value="<?= $this->session->userdata('created_date');?>"
						   name="created_date">
				</div>
				<div class="col-md-6">
					Created By
					<input type="text" class="form-control" value="<?= $this->session->userdata('created_by');?>"
						   name="created_by">
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
					Password
					<input type="password" disabled class="form-control" id="password" required name="password">
				</div>
				<div class="col-md-6">
					Confirm Password
					<input type="password" disabled class="form-control" id="confirm_password" required>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12 text-right">
					<!--<a href="index"><input type="button" class="btn btn-success" value="go to list"></a>-->
					<input type="submit" class="btn btn-primary" value="update">
				</div>
			</div>
		</div>
	</form>
</div>

<script>
	$("#change_password").change(function () {
		if (document.getElementById("change_password").checked) {
			$("#password").attr("disabled", false)
			$("#confirm_password").attr("disabled", false)
		} else {
			$("#password").val("");
			$("#confirm_password").val("");
			$("#password").attr("disabled", true)
			$("#confirm_password").attr("disabled", true)
		}
	});
</script>
