<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>Assign Permission</h5>
			</div>
		</div>
	</div>

	<div class="card-body small">

		<div class="row form-group text-right">
			<div style="margin-top: 8px" class="col-sm-8">
				ROLE
			</div>
			<div class="col-sm-4 text-right">
				<select id="role" name="role" class="form-control">
					<option value="">SELECT ROLE</option>
					<?php foreach ($role_list as $role) { ?>
						<option value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<table class="table table-bordered">
			<thead>
			<tr>
				<th width="30">MODULE ID</th>
				<th width="50">MODULE</th>
				<th width="50">DESCRIPTION</th>
				<th class="text-center" width="50"><input type="checkbox" onchange="assign_all()" id="select_all" title="Select all"></th>
			</tr>
			</thead>
			<tbody id="tbody">

			</tbody>
		</table>

	</div>
</div>

<script>

	$('#role').change(function () {
		$.getJSON("<?=base_url()?>index.php/PermissionController/get_role_module_list?role_id=" + $('#role').val(), function (result) {

			$('#tbody').html("");

			$.each(result.module_list, function (i, val) {
				$('#tbody').append("<tr>" +
					"<td>" + val.id + "</td>" +
					"<td>" + val.module + "</td>" +
					"<td>" + val.description + "</td>" +
					"<td class='text-center'><input type='checkbox' onclick='assign(" + val.id + ")' id=" + val.id + "></td>" +
					"</tr>");
			});

			$.each(result.role_module_list, function (i, val) {
				$('#' + val.module_id).attr('checked', true);
			});
		});
	});

	function assign(id) {
		$role = $('#role').val();
		var selected = document.getElementById(id).checked;
		if ($role != null && $role != "") {
			$.ajax({
				url: '<?=base_url()?>index.php/PermissionController/alter_permission',
				method: 'get',
				data: {
					'role_id': $role,
					'module_id': id,
					'selected': selected
				},
				success: function (response) {
				}
			});
		}
	}

	function assign_all() {
		$role = $('#role').val();
		var selected = document.getElementById('select_all').checked;
		if ($role != null && $role != "") {

			if(selected) {
				$(':checkbox').each(function() {
					this.checked = true;
				});
			}else{
				$(':checkbox').each(function() {
					this.checked = false;
				});
			}

			$.ajax({
				url: '<?=base_url()?>index.php/PermissionController/alter_permission_all',
				method: 'get',
				data: {
					'role_id': $role,
					'selected': selected
				},
				success: function (response) {
				}
			});
		}
	}

</script>
