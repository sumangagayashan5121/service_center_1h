<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Edit Customer</h5>
		</div>
	</div>
	<form action="<?=base_url()?>index.php/CustomerController/update_customer" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					First Name
					<input type="text" class="form-control" value="<?= $customer['first_name'] ?>" required id="customername"
						   name="first_name">
					<input type="hidden" name="id" value="<?= $customer['customer_id'] ?>">
				</div>
				<div class="col-md-6">
					Last Name
					<input type="text" class="form-control" value="<?= $customer['last_name'] ?>"
						   name="last_name">
				</div>
				<div class="col-md-6">
					NIC Name
					<input type="text" class="form-control" value="<?= $customer['nic'] ?>" pattern="[0-9]{9}[x|X|v|V]$" autocomplete="off"
						   title="Must contain nine numbers and V letter or X letter" autocomplete="off" required
						   name="nic">
				</div>

				<div class="col-md-6">
					Mobile
					<input type="text" class="form-control" value="<?= $customer['mobile1'] ?>" autocomplete="off" required
						   pattern="[0-9]{10}" autocomplete="off"
						   title="Please enter valid mobile number with ten numbers" name="mobile">
					<input type="hidden"  value="<?= $customer['email'] ?>"
						   name="email">
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="customer_status" name="status">
						<option value="1">ACTIVE</option>
						<option value="0">INACTIVE</option>
					</select>
				</div>
			</div>
			<!--<div class="row form-group">
				<div class="col-md-6">
					Customer Role <span style="color: red">*</span>
					<select class="form-control" required name="role_id">
						<option value="">SELECT ROLE</option>
						<?php foreach ($role_list as $role) { ?>
							<option <?= $role['id'] == $customer['role_id'] ? 'selected' : '' ?> value="<?= $role['id'] ?>">
								<?= $role['role'] ?>
							</option>
						<?php } ?>
					</select>
				</div>
			</div>-->
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
<script>
	var action = "Edit";
	var module = "Customer";
	var type = "info";
	var action_progress = "Editing";
	var action_past = "Edited";
</script>
