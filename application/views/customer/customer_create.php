<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Create Customer</h5>
		</div>
	</div>
	<form action="save_customer" id="form" method="post">
		<div class="card-body">
			<div class="row form-group">
				<!--<div class="col-md-6">
					User Role <span style="color: red">*</span>
					<select class="form-control" required name="role_id">
						<option value="">SELECT ROLE</option>
						<?php foreach ($role_list as $role) { ?>
							<option value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
						<?php } ?>
					</select>
				</div>-->
				<div class="col-md-6">
					First Name <span style="color: red">*</span>
					<input type="text" class="form-control" autocomplete="off" required
						   name="first_name">
				</div>
				<div class="col-md-6">
					Last Name
					<input type="text" class="form-control" autocomplete="off" required
						   name="last_name">
				</div>
				<div class="col-md-6">
					Mobile
					<input type="text" class="form-control" pattern="[0-9]{10}"
						   autocomplete="off" required  title="Please enter valid mobile number with ten numbers" name="mobile">
				</div>

				<div class="col-md-6">
					NIC
					<input type="text" class="form-control"  pattern="[0-9]{9}[x|X|v|V]$" autocomplete="off"
						   title="Must contain nine numbers and V letter or X letter" name="nic" required>
				</div>
				<div class="col-md-6">
					Email
					<input class="form-control"  type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
						   title="Must contain valid email address" name="email" required autocomplete="off">
				</div>
				<div class="col-md-6">
					Mobile
					<input class="form-control"  type="text" pattern="[0-9]{10}"
						   name="mobile" autocomplete="off" required>
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="customer_status" name="status">
						<option value="1">ACTIVE</option>
						<option value="0">INACTIVE</option>
					</select>
				</div>
			</div>

			<div class="row form-group">
				<div class="col-md-12 text-right">
					<a href="index"><input type="button" class="btn btn-success" value="go to list"></a>
					<button type="submit" class="btn btn-primary">create</button>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	var action = "Create";
	var module = "Customer";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "created";
</script>
