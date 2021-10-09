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
				<th width="30">CONTACT ID</th>
				<th width="50">CONTACT NAME</th>
				<th width="30">CONTACT MOBILE</th>
				<th width="50">CONTACT EMAIL</th>
				<th width="50">CONTACT MESSAGE</th>
				<th width="50">REPLY</th>
				<th width="50">ACTION</th>

			</tr>
			</thead>
			<tbody>

			<?php foreach ($contact_list as $contact) { ?>
				<tr>
					<td><?= $contact['contact_id'] ?></td>
					<td><?= $contact['contact_name'] ?></td>
					<td><?= $contact['contact_mobile'] ?></td>
					<td><?= $contact['contact_email'] ?></td>
					<td><?= $contact['contact_message'] ?></td>
					<?php if ($contact['reply'] == USER_INACTIVE) { ?>
						<td class="text-center"><span class="badge badge-secondary">Did reply</span></td>
					<?php } elseif ($contact['reply'] == USER_ACTIVE) { ?>
						<td class="text-center"><span class="badge badge-success">Please Reply</span></td>
					<?php } ?>


					<td class="text-center">
						<a href="<?= base_url() ?>index.php/DashboardController/reply?id=<?= $contact['contact_id'] ?>">
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
				<th width="30">CONTACT ID</th>
				<th width="50">CONTACT NAME</th>
				<th width="30">CONTACT MOBILE</th>
				<th width="50">CONTACT EMAIL</th>
				<th width="50">CONTACT MESSAGE</th>
				<th width="50">REPLY</th>
				<th width="50">ACTION</th>

			</tr>
			</tfoot>
		</table>
	</div>
</div>
