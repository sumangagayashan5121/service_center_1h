<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>List Vehicle</h5>
			</div>
			<div class="col-sm-6 text-right">
				<a href="<?= base_url() ?>index.php/VehicleController/create_vehicle">
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
				<th width="30">VEHICLE ID</th>
				<th width="30">CUSTOMER ID</th>
				<th width="50">REG NO</th>
				<th width="50">MODEL ID</th>
				<th width="50">STATUS</th>
				<th class="text-center" width="50">ACTION</th>
			</tr>
			</thead>
			<tbody>

			<?php foreach ($vehicle_list as $vehicle) { ?>
				<tr>
					<td><?= $vehicle['vehicle_id'] ?></td>
					<td><?= $vehicle['customer_id'] ?></td>
					<td><?= $vehicle['reg_no'] ?></td>
					<td><?= $vehicle['model_id'] ?></td>
					<?php if ($vehicle['status'] == USER_INACTIVE) { ?>
						<td class="text-center"><span class="badge badge-secondary">inactive</span></td>
					<?php } elseif ($vehicle['status'] == USER_ACTIVE) { ?>
						<td class="text-center"><span class="badge badge-success">active</span></td>
					<?php } ?>



					<td class="text-center">
						<a href="<?= base_url() ?>index.php/VehicleController/view_vehicle?id=<?= $vehicle['vehicle_id'] ?>">
							<button type="button">
								<i class="fa fa-eye" title="view"></i>
							</button>
						</a>
						<a href="<?= base_url() ?>index.php/VehicleController/edit_vehicle?id=<?= $vehicle['vehicle_id'] ?>">
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
				<th width="30">VEHICLE ID</th>
				<th width="30">CUSTOMER ID</th>
				<th width="50">REG NO</th>
				<th width="50">MODEL ID</th>
				<th width="50">STATUS</th>

				<th class="text-center" width="50">ACTION</th>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
