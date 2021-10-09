<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Create Supplier</h5>
		</div>
	</div>
	<form action="save_supplier" id="form" method="post">
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
					Supplier Name <span style="color: red">*</span>
					<input type="text" class="form-control" autocomplete="off" required
						   name="supplier_name">
				</div>
				<div class="col-md-6">
					Address
					<input type="text" class="form-control" autocomplete="off" required
						   name="address">
				</div>
				<div class="col-md-6">
					Mobile num 1
					<input type="text" class="form-control" autocomplete="off" required
						   pattern="[0-9]{10}" autocomplete="off"
						   title="Please enter valid mobile number with ten numbers" name="mobile1">
				</div>
				<div class="col-md-6">
					Mobile num 2
					<input type="text" class="form-control" autocomplete="off" required
						   pattern="[0-9]{10}" autocomplete="off"
						   title="Please enter valid mobile number with ten numbers" name="mobile2">
				</div>

				<div class="col-md-6">
					Email
					<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
						   title="Must contain valid email address" class="form-control" autocomplete="off" required
						   name="email">
				</div>
				<div class="col-md-6">
					Contact person
					<input type="text" class="form-control" autocomplete="off" required
						   name="contact_person">
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="supplier_status" name="status">
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
	var module = "Supplier";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "Created";
</script>
