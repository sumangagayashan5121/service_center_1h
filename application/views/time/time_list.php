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
				<th >SERVICE ID</th>
				<th >START TIME</th>
				<th >END TIME</th>
				<th >NO OF CUSTOMER</th>
				<th >STATUS</th>
				<th >ACTION</th>
			</tr>
			</thead>
			<tbody>

			<?php foreach ($time_list as $time) { ?>
				<tr>
					<td><?= $time['time_id'] ?></td>
					<td><?= $time['start_time'] ?></td>
					<td><?= $time['end_time'] ?></td>
					<td><?= $time['no_customer'] ?></td>
					<?php if ($time['Status'] == USER_INACTIVE) { ?>
						<td class="text-center"><span class="badge badge-secondary">inactive</span></td>
					<?php } elseif ($time['Status'] == USER_ACTIVE) { ?>
						<td class="text-center"><span class="badge badge-success">active</span></td>
					<?php } ?>


					<td class="text-center">
						<a href="<?= base_url() ?>index.php/TimeController/view_time?id=<?= $time['time_id'] ?>">
							<button type="button">
								<i class="fa fa-eye" title="view"></i>
							</button>
						</a>
						<a href="<?= base_url() ?>index.php/TimeController/edit_time?id=<?= $time['time_id'] ?>">
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
				<th>SERVICE ID</th>
				<th>START TIME</th>
				<th>END TIME</th>
				<th>NO OF CUSTOMER</th>
				<th >STATUS</th>
				<th>ACTION</th>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
