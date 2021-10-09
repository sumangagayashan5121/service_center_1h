<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>List Customer</h5>
			</div>
			<div class="col-sm-6 text-right">
				<a href="<?= base_url() ?>index.php/CustomerController/create_customer">
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
				<th width="30">CUSTOMER ID</th>
				<th width="50">FIRST NAME</th>
				<th width="50">LAST NAME</th>
				<th width="50">NIC</th>

				<th width="50">MOBILE</th>
				<th width="50">EMAIL</th>
				<th class="text-center" width="50">STATUS</th>
				<th class="text-center" width="50">ACTION</th>
			</tr>
			</thead>
			<tbody>

			<?php foreach ($customer_list as $customer) { ?>
				<tr>
					<td><?= $customer['customer_id'] ?></td>
					<td><?= $customer['first_name'] ?></td>
					<td><?= $customer['last_name'] ?></td>
					<td><?= $customer['nic'] ?></td>

					<td><?= $customer['mobile1'] ?></td>
					<td><?= $customer['email'] ?></td>
					<?php if ($customer['status'] == USER_INACTIVE) { ?>
						<td class="text-center"><span class="badge badge-secondary">inactive</span></td>
					<?php } elseif ($customer['status'] == USER_ACTIVE) { ?>
						<td class="text-center"><span class="badge badge-success">active</span></td>
					<?php } ?>

					<td class="text-center">
						<a href="<?= base_url() ?>index.php/CustomerController/view_customer?id=<?= $customer['customer_id'] ?>">
							<button type="button">
								<i class="fa fa-eye" title="view"></i>
							</button>
						</a>
						<a href="<?= base_url() ?>index.php/CustomerController/edit_customer?id=<?= $customer['customer_id'] ?>">
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
				<th width="30">CUSTOMER ID</th>
				<th width="50">FIRST NAME</th>
				<th width="50">LAST NAME</th>
				<th width="50">NIC</th>
				<th width="50">MOBILE</th>
				<th width="50">EMAIL</th>
				<th class="text-center" width="50">STATUS</th>
				<th class="text-center" width="50">ACTION</th>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
