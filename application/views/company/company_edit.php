<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Edit Company</h5>
		</div>
	</div>
	<form action="<?=base_url()?>index.php/CompanyController/update_company" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Company Name
					<input type="text" class="form-control" value="<?= $company['company_name'] ?>" required autocomplete="off"
						   name="company_name">
					<input type="hidden" name="company_id" value="<?= $company['company_id'] ?>">
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
					<input type="submit" class="btn btn-primary" value="update">
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	var action = "Edit";
	var module = "Company";
	var type = "info";
	var action_progress = "Editing";
	var action_past = "Edited";
</script>

