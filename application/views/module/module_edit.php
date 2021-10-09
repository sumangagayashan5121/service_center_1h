<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Edit Module</h5>
		</div>
	</div>
	<form action="<?=base_url()?>index.php/ModuleController/update_module" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Module<span id="module_name_result" style="color: red"></span>
					<input type="text" class="form-control" value="<?= $module['module'] ?>" autocomplete="off" required
						   name="module">
					<input type="hidden" name="id" value="<?= $module['id'] ?>">
				</div>
				<div class="col-md-6">
					Description
					<input type="text" class="form-control" value="<?= $module['description'] ?>" autocomplete="off" required
						   name="description">
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
					<input type="submit" class="btn btn-primary" value="update">
				</div>
			</div>
		</div>
	</form>
</div>

<script>
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
</script>
<script>
var action = "Edit";
var module = "Module";
var type = "info";
var action_progress = "Editing";
var action_past = "Edited";
</script>
