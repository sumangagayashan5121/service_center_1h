<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>List Model</h5>
			</div>
			<div class="col-sm-6 text-right">
				<a href="<?= base_url() ?>index.php/ModelController/create_model">
					<button type="button" class="btn btn-primary">
						<i class="fa fa-plus"></i> Create
					</button>
				</a>
			</div>
		</div>
	</div>

	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th width="30">MODEL ID</th>
				<th width="30">COMPANY ID</th>
				<th width="50">MODEL NAME</th>
				<th class="text-center" width="50">STATUS</th>
				<th class="text-center" width="50">ACTION</th>
			</tr>
			</thead>
			<tbody>

			<?php foreach ($model_list as $model) { ?>
				<tr>
					<td><?= $model['model_id'] ?></td>
					<td><?= $model['company_id'] ?></td>
					<td><?= $model['model_name'] ?></td>
					<?php if ($model['status'] == USER_INACTIVE) { ?>
						<td class="text-center"><span class="badge badge-secondary">inactive</span></td>
					<?php } elseif ($model['status'] == USER_ACTIVE) { ?>
						<td class="text-center"><span class="badge badge-success">active</span></td>
					<?php } ?>

					<td class="text-center">
						<a href="<?= base_url() ?>index.php/ModelController/view_model?id=<?= $model['model_id'] ?>">
							<button type="button">
								<i class="fa fa-eye" title="view"></i>
							</button>
						</a>
						<a href="<?= base_url() ?>index.php/ModelController/edit_model?id=<?= $model['model_id'] ?>">
							<button type="button">
								<i class="fa fa-pencil" title="edit"></i>
							</button>
						</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
			<tfoot>
			<tr>
				<th width="30">MODEL ID</th>
				<th width="30">COMPANY ID</th>
				<th width="50">MODEL NAME</th>
				<th class="text-center" width="50">STATUS</th>
				<th class="text-center" width="50">ACTION</th>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
