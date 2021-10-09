<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Create Role</h5>
		</div>
	</div>
	<form action="save_role" id="form" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Role
					<input type="text" class="form-control" name="role" id="role" autocomplete="off" required>
				</div>
				<div class="col-md-6">
					Role Description
					<input type="text" class="form-control" name="description" autocomplete="off" required>
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="role_status" name="status">
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

	var role = document.getElementById("role")

	function search_role() {
		$.ajax({
			url: "<?= base_url()?>index.php/RoleController/validate_role",
			method: "get",
			data: {
				'role': $('#role').val()
			},
			success: function (result) {
				var obj = $.parseJSON(result);
				if (obj > 0) {
					role.setCustomValidity('Role already exists..');
				} else {
					role.setCustomValidity('');
				}
			}
		});
	}

	role.onkeyup = search_role;

</script>
<script>
	var action = "Create";
	var module = "Role";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "Created";
</script>
