<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>List User</h5>
			</div>
			<div class="col-sm-6 text-right">
				<a href="<?= base_url() ?>index.php/PerformerinvoiceController/create_performer_invoice">
					<button type="button" class="btn btn-primary">
						<i class="fa fa-plus"></i> Create
					</button>
				</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table id="example2" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th >SERVICE CARD ID</th>
				<th>BOOKING NO</th>
				<th>STAUS</th>
				<th>ACTION</th>

			</tr>
			</thead>
			<tbody>

			<?php foreach ($performer_invoice_list as $performer_invoice) { ?>
				<tr>
					<td><?= $performer_invoice['performer_invoice_id'] ?></td>
					<td><?= $performer_invoice['booking_id'] ?></td>


					<?php if ($performer_invoice['status'] == USER_INACTIVE) { ?>
						<td class="text-center"><span class="badge badge-secondary">inactive</span></td>
					<?php } elseif ($performer_invoice['status'] == USER_ACTIVE) { ?>
						<td class="text-center"><span class="badge badge-success">active</span></td>
					<?php } ?>

					<td class="text-center">
						<a href="<?= base_url() ?>index.php/PerformerinvoiceController/view_performer_invoice1?id=<?= $performer_invoice['performer_invoice_id'] ?>">
							<button type="button">
								<i class="fa fa-eye" title="view"></i>
							</button>
						</a>
<!--						<a href="--><?//= base_url() ?><!--index.php/UserController/edit_user?id=--><?//= $performer_invoice['user_id'] ?><!--">-->
<!--							<button type="button">-->
<!--								<i class="fa fa-pencil" title="edit"></i>-->
<!--							</button>-->
<!--						</a>-->
					</td>
				</tr>
			<?php } ?>
			</tbody>
			<tfoot>
			<tr>
				<th >SERVICE CARD ID</th>
				<th>BOOKING NO</th>
				<th>STAUS</th>
				<th>ACTION</th>
			</tr>
			</tfoot>
		</table>
	</div>

</div>
<!-- jQuery -->
<!--<script src="../../plugins/jquery/jquery.min.js"></script>-->
<!-- Bootstrap 4 -->


