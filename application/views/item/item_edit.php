<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Edit Item</h5>
		</div>
	</div>
	<form action="<?=base_url()?>index.php/ItemController/update_item" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Item Code
					<input type="text" class="form-control" value="<?= $item['item_code'] ?>" required id="itemname" autocomplete="off" required
						   name="item_code">
					<input type="hidden" name="id" value="<?= $item['item_id'] ?>">
				</div>
				<div class="col-md-6">
					Barcode
					<input type="text" class="form-control" value="<?= $item['barcode'] ?>" autocomplete="off"
						   name="barcode">
				</div>
				<div class="col-md-6">
					Category ID
					<select class="form-control" required name="category_id" >
						<option value="">SELECT CATEGORY</option>
						<?php foreach ($category_list as $model) { ?><option value="<?= $item['category_id'] ?>"><?= $model['description'] ?> </option><?php } ?>
					</select>
<!--					<input type="text" class="form-control" value="--><?//= $item['category_id'] ?><!--" autocomplete="off" required-->
<!--						   name="first_name">-->
				</div>
				<div class="col-md-6">
					Description
					<input type="text" class="form-control" value="<?= $item['description'] ?>" autocomplete="off" required
						   name="description">
				</div>
				<div class="col-md-6">
					Selling Price
					<input type="text" class="form-control" value="<?= $item['selling_price'] ?>" autocomplete="off" required
						   name="selling_price">
				</div>
				<div class="col-md-6">
					Cost Price
					<input type="text" class="form-control" value="<?= $item['cost_price'] ?>" autocomplete="off" required
						   name="cost_price">
				</div>
				<div class="col-md-6">
					Supplier ID
					<select class="form-control" required name="supplier_id" >
						<option value="">SELECT SUPPLIER</option>
						<?php foreach ($supplier_list as $supplier) { ?><option value="<?= $supplier['supplier_id'] ?>"><?= $supplier['supplier_name'] ?> </option><?php } ?>
					</select>
				</div>


				<div class="col-md-6">
					Qty
					<input type="text" class="form-control" value="<?= $item['qty'] ?>" autocomplete="off" required
						   name="created_by">
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="item_status" name="status">
						<option value="1">ACTIVE</option>
						<option value="0">INACTIVE</option>
					</select>
				</div>
			</div>
			<!--<div class="row form-group">
				<div class="col-md-6">
					Item Role <span style="color: red">*</span>
					<select class="form-control" required name="role_id">
						<option value="">SELECT ROLE</option>
						<?php foreach ($role_list as $role) { ?>
							<option <?= $role['id'] == $item['role_id'] ? 'selected' : '' ?> value="<?= $role['id'] ?>">
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
	var module = "Item";
	var type = "info";
	var action_progress = "Editing";
	var action_past = "Edited";
</script>
