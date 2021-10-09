<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Create Module</h5>
		</div>
	</div>
	<form action="save_module" id="form" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Module
					<input type="text" class="form-control" name="module" id="module" autocomplete="off" required>
				</div>
				<div class="col-md-6">
					Module Description
					<input type="text" class="form-control" name="description" autocomplete="off" required>
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="module_status" name="status">
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

	var module = document.getElementById("module")

	function search_module() {
		$.ajax({
			url: "<?= base_url()?>index.php/ModuleController/validate_module",
			method: "get",
			data: {
				'module': $('#module').val()
			},
			success: function (result) {
				var obj = $.parseJSON(result);
				if (obj > 0) {
					module.setCustomValidity('Module already exists..');
				} else {
					module.setCustomValidity('');
				}
			}
		});
	}

	module.onkeyup = search_module;

</script>
<script>
	var action = "Create";
	var module = "Module";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "Created";
</script>
