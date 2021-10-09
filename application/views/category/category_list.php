<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>List Category</h5>
			</div>
			<div class="col-sm-6 text-right">
				<a href="<?= base_url() ?>index.php/CategoryController/create_category">
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
				<th width="30">CATEGORY ID</th>
				<th width="50">DESCRIPTION</th>
				<th class="text-center" width="50">STATUS</th>
				<th class="text-center" width="50">ACTION</th>
			</tr>
			</thead>
			<tbody>

			<?php foreach ($category_list as $category) { ?>
				<tr>
					<td><?= $category['category_id'] ?></td>
					<td><?= $category['description'] ?></td>
					<?php if ($category['status'] == USER_INACTIVE) { ?>
						<td class="text-center"><span class="badge badge-secondary">inactive</span></td>
					<?php } elseif ($category['status'] == USER_ACTIVE) { ?>
						<td class="text-center"><span class="badge badge-success">active</span></td>
					<?php } ?>

					<td class="text-center">
						<a href="<?= base_url() ?>index.php/CategoryController/view_category?id=<?= $category['category_id'] ?>">
							<button type="button">
								<i class="fa fa-eye" title="view"></i>
							</button>
						</a>
						<a href="<?= base_url() ?>index.php/CategoryController/edit_category?id=<?= $category['category_id'] ?>">
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
				<th width="30">CATEGORY ID</th>
				<th width="50">DESCRIPTION</th>
				<th class="text-center" width="50">STATUS</th>
				<th class="text-center" width="50">ACTION</th>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
