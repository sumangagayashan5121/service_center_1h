<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Edit Vehicle</h5>
		</div>
	</div>
	<form action="<?=base_url()?>index.php/VehicleController/update_vehicle" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Customer id
					<input type="text" class="form-control" name="customer_id" value="<?= $vehicle['customer_id'] ?>" autocomplete="off" required>
					<input type="hidden" name="vehicle_id" value="<?= $vehicle['vehicle_id'] ?>">
				</div>
				<div class="col-md-6">
					Reg no
					<input type="text" class="form-control" value="<?= $vehicle['reg_no'] ?>" autocomplete="off" required
						   name="reg_no">
				</div>
				<div class="col-md-6">
					Model id
					<input type="text" class="form-control" name="model_id" value="<?= $vehicle['model_id'] ?>">
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="status" name="status">
						<option value="1">ACTIVE</option>
						<option value="0">INACTIVE</option>
					</select>
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
	var action = "Edit";
	var module = "Vehicle";
	var type = "info";
	var action_progress = "Editing";
	var action_past = "Edited";
</script>

