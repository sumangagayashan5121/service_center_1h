<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Edit Service</h5>
		</div>
	</div>
	<form action="<?=base_url()?>index.php/ServiceController/update_service" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					description
					<input type="text" class="form-control" name="description" value="<?= $service['description'] ?>" autocomplete="off" required>
					<input type="hidden" name="service_id" value="<?= $service['service_id'] ?>">
				</div>
				<div class="col-md-6">
					Reg no
					<input type="text" class="form-control" value="<?= $service['price'] ?>" autocomplete="off" required
						   name="price">
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="category_status" name="status">
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
var action = "Create"
var module = "Service";
var type = "info";
var action_progress = "Creating";
var action_past = "created";
</script>
