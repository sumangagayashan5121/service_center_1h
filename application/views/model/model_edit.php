<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Edit Model</h5>
		</div>
	</div>
	<form action="<?=base_url()?>index.php/ModelController/update_model" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Company id
					<input type="text" class="form-control" name="company_id" value="<?= $model['company_id'] ?>"> autocomplete="off" required
					<input type="hidden" name="model_id" value="<?= $model['model_id'] ?>">
				</div>
				<div class="col-md-6">
					Model Name
					<input type="text" class="form-control" value="<?= $model['model_name'] ?>" autocomplete="off" required
						   name="model_name">
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="model_status" name="status">
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
	var module = "Model";
	var type = "info";
	var action_progress = "Editing";
	var action_past = "Edited";
</script>


