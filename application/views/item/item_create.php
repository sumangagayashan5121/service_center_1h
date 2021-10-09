<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Create Item</h5>
		</div>
	</div>
	<form action="save_item" id="form" method="post">
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
					Item Code <span style="color: red">*</span>
					<input type="text" class="form-control" autocomplete="off" required
						   name="item_code">
				</div>
				<div class="col-md-6">
					Barcode
					<input type="text" class="form-control" autocomplete="off"
						   name="barcode">
				</div>
				<div class="col-md-6" required>
					Category
					<select class="form-control" required name="category_id" >
						<option value="">SELECT CATEGORY</option>
						<?php foreach ($category_list as $model) { ?><option value="<?= $model['category_id'] ?>"><?= $model['description'] ?> </option><?php } ?>
					</select>
				</div>
				<div class="col-md-6">
					Description
					<input type="text" class="form-control"
						   name="description">
				</div>

				<div class="col-md-6">
					Selling Price
					<input type="text" class="form-control" autocomplete="off" required
						   name="selling_price">
				</div>
				<div class="col-md-6">
					Cost Price
					<input type="text" class="form-control" autocomplete="off" required
						   name="cost_price">
				</div>
				<div class="col-md-6" required>
					Supplier
					<select class="form-control" required name="supplier_id" >
						<option value="">SELECT SUPPLIER</option>
						<?php foreach ($supplier_list as $supplier) { ?><option value="<?= $supplier['supplier_id'] ?>"><?= $supplier['supplier_name'] ?> </option><?php } ?>
					</select>
				</div>
				<div class="col-md-6">
					Qty
					<input type="text" class="form-control"
						   name="qty">
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="user_status" name="status">
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
	var module = "Item";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "Created";
</script>
