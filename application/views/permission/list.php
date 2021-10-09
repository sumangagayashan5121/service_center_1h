<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>List Permission </h5>
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
			</tr>
			</thead>
			<tbody id="tbody">

			</tbody>
		</table>
	</div>
</div>

<script>

	$('#role').change(function () {

		$.getJSON("<?=base_url()?>index.php/PermissionController/get_permission_list?role_id=" + $('#role').val(), function (result) {
			$('#tbody').html("");
			$.each(result, function (i, val) {
				$('#tbody').append("<tr>" +
					"<td>" + val.module_id + "</td>" +
					"<td>" + val.module + "</td>" +
					"<td>" + val.module_description + "</td>" +
					"</tr>");
			});
		});

	});

</script>
