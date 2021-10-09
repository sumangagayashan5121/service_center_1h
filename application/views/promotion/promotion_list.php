<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>List Contact</h5>
			</div>

		</div>
	</div>

	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th width="30">PROMOTION ID</th>
				<th width="50">SUBJECT</th>
				<th width="50">MESSAGE</th>
				<th width="50">STATUS</th>

			</tr>
			</thead>
			<tbody>

			<?php foreach ($category_list as $promotion) { ?>
				<tr>
					<td><?= $promotion['promotion_id'] ?></td>
					<td><?= $promotion['subject'] ?></td>
					<td><?= $promotion['content'] ?></td>
					<?php if ($promotion['status'] == USER_INACTIVE) { ?>
						<td class="text-center"><span class="badge badge-secondary">status</span></td>
					<?php } elseif ($promotion['status'] == USER_ACTIVE) { ?>
						<td class="text-center"><span class="badge badge-success">status</span></td>
					<?php } ?>

				</tr>
			<?php } ?>
			</tbody>
			<tfoot>
			<tr>
				<th width="30">PROMOTION ID</th>
				<th width="50">SUBJECT</th>
				<th width="50">MESSAGE</th>
				<th width="50">STATUS</th>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
