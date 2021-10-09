<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>List Time</h5>
			</div>
			<div class="col-sm-6 text-right">
				<a href="<?= base_url() ?>index.php/TimeController/create_time">
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
				<th >HOLIDAY DATE</th>
				<th >STATUS</th>
				<th >ACTION</th>
			</tr>
			</thead>
			<tbody>

			<?php foreach ($holiday_list as $holiday) { ?>
				<tr>
					<td><?= $holiday['holiday_date'] ?></td>
					<?php if ($holiday['status'] == USER_INACTIVE) { ?>
						<td class="text-center"><span class="badge badge-secondary">inactive</span></td>
					<?php } elseif ($holiday['status'] == USER_ACTIVE) { ?>
						<td class="text-center"><span class="badge badge-success">active</span></td>
					<?php } ?>


					<td class="text-center">
						<a href="<?= base_url() ?>index.php/BookingController/update_holiday?holiday_id=<?= $holiday['holiday_id'] ?>&status=<?= $holiday['status'] ?>">
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
				<th >HOLIDAY DATE</th>
				<th >STATUS</th>
				<th >ACTION</th>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
