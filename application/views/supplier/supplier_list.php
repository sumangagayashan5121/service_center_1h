<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>List Supplier</h5>
			</div>
			<div class="col-sm-6 text-right">
				<a href="<?= base_url() ?>index.php/SupplierController/create_supplier">
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
				<th width="30">SUPPLIER ID</th>
				<th width="50">SUPPLIER NAME</th>
				<th width="50">ADDRESS</th>
				<th width="50">MOBILE NUM 1</th>
				<th width="50">MOBILE NUM 2</th>
				<th width="50">EMAIL</th>
				<th width="50">CONTACT PERSON</th>
				<th class="text-center" width="50">STATUS</th>
				<th class="text-center" width="50">ACTION</th>
			</tr>
			</thead>
			<tbody>

			<?php foreach ($supplier_list as $supplier) { ?>
				<tr>
					<td><?= $supplier['supplier_id'] ?></td>
					<td><?= $supplier['supplier_name'] ?></td>
					<td><?= $supplier['address'] ?></td>
					<td><?= $supplier['mobile1'] ?></td>
					<td><?= $supplier['mobile2'] ?></td>
					<td><?= $supplier['email'] ?></td>
					<td><?= $supplier['contact_person'] ?></td>
					<?php if ($supplier['status'] == USER_INACTIVE) { ?>
						<td class="text-center"><span class="badge badge-secondary">inactive</span></td>
					<?php } elseif ($supplier['status'] == USER_ACTIVE) { ?>
						<td class="text-center"><span class="badge badge-success">active</span></td>
					<?php } ?>


					<td class="text-center">
						<a href="<?= base_url() ?>index.php/SupplierController/view_supplier?id=<?= $supplier['supplier_id'] ?>">
							<button type="button">
								<i class="fa fa-eye" title="view"></i>
							</button>
						</a>
						<a href="<?= base_url() ?>index.php/SupplierController/edit_supplier?id=<?= $supplier['supplier_id'] ?>">
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
				<th width="30">SUPPLIER ID</th>
				<th width="50">SUPPLIER NAME</th>
				<th width="50">ADDRESS</th>
				<th width="50">MOBILE NUM 1</th>
				<th width="50">MOBILE NUM 2</th>
				<th width="50">EMAIL</th>
				<th width="50">CONTACT PERSON</th>
				<th class="text-center" width="50">STATUS</th>
				<th class="text-center" width="50">ACTION</th>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
