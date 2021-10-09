<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Edit Supplier</h5>
		</div>
	</div>
	<form action="<?=base_url()?>index.php/SupplierController/update_supplier" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Supplier Name
					<input type="text" class="form-control" value="<?= $supplier['supplier_name'] ?>" required id="suppliername"
						   name="supplier_name">
					<input type="hidden" name="id" value="<?= $supplier['supplier_id'] ?>">
				</div>
				<div class="col-md-6">
					Address
					<input type="text" class="form-control" value="<?= $supplier['address'] ?>" autocomplete="off" required
						   name="address">
				</div>
				<div class="col-md-6">
					Mobile num 1
					<input type="text" class="form-control" value="<?= $supplier['mobile1'] ?>" pattern="[0-9]{10}" autocomplete="off"
						   title="Please enter valid mobile number with ten numbers" required
						   name="mobile1">
				</div>
				<div class="col-md-6">
					Mobile num 2
					<input type="text" class="form-control" value="<?= $supplier['mobile2'] ?>" pattern="[0-9]{10}" autocomplete="off"
						   title="Please enter valid mobile number with ten numbers" required
						   name="mobile2">
				</div>
				<div class="col-md-6">
					Email
					<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
						   title="Must contain valid email address"
						   class="form-control" value="<?= $supplier['email'] ?>" autocomplete="off" required
						   name="email">
				</div>
				<div class="col-md-6">
					Contact person
					<input type="text" class="form-control" value="<?= $supplier['contact_person'] ?>" autocomplete="off" required
						   name="contact_person">
				</div>
			</div>
			<div class="col-md-6">
				Status
				<select class="form-control" id="category_status" name="status">
					<option value="1">ACTIVE</option>
					<option value="0">INACTIVE</option>
				</select>
			</div>
			<!--<div class="row form-group">
				<div class="col-md-6">
					Supplier Role <span style="color: red">*</span>
					<select class="form-control" required name="role_id">
						<option value="">SELECT ROLE</option>
						<?php foreach ($role_list as $role) { ?>
							<option <?= $role['id'] == $supplier['role_id'] ? 'selected' : '' ?> value="<?= $role['id'] ?>">
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
	var module = "Supplier";
	var type = "info";
	var action_progress = "Editing";
	var action_past = "Edited";
</script>
