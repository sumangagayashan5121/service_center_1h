<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Edit Time</h5>
		</div>
	</div>
	<form action="<?=base_url()?>index.php/TimeController/update_time" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Start time
					<input type="text" class="form-control" name="start_time" value="<?= $time['start_time'] ?>" autocomplete="off" required>
					<input type="hidden" name="time_id" value="<?= $time['time_id'] ?>">
				</div>
				<div class="col-md-6">
					End time
					<input type="text" class="form-control" value="<?= $time['end_time'] ?>"  name="end_time" autocomplete="off" required>
				</div>
				<div class="col-md-6">
					No of customer
					<input type="text" class="form-control" value="<?= $time['no_customer'] ?>"  name="no_customer" autocomplete="off" required>
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
	var module = "Time";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "created";
</script>


