<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Create Company</h5>
		</div>
	</div>
	<form action="save_company" id="form" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Company Name
					<input type="text" class="form-control" name="company_name" required autocomplete="off">
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="company_status" name="status">
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
	var module = "Company";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "Created";
</script>
