<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Edit Role</h5>
		</div>
	</div>
	<form action="<?=base_url()?>index.php/RoleController/update_role" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Role<span id="role_name_result" style="color: red"></span>
					<input type="text" class="form-control" value="<?= $role['role'] ?>" autocomplete="off" required
						   name="role">
					<input type="hidden" name="id" value="<?= $role['id'] ?>">
				</div>
				<div class="col-md-6">
					Description
					<input type="text" class="form-control" value="<?= $role['description'] ?>" autocomplete="off" required
						   name="description">
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
					<input type="submit" class="btn btn-primary" value="update">
				</div>
			</div>
		</div>
	</form>
</div>

<script>
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
</script>
<script>
var action = "Edit";
var module = "Role";
var type = "info";
var action_progress = "Editing";
var action_past = "Edited";
</script>
