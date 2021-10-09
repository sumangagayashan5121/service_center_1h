<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>List User</h5>
			</div>
			<div class="col-sm-6 text-right">
				<a href="<?= base_url() ?>index.php/ServicecardController/create_service_card">
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
				<th>CUSTOMER NAME</th>
				<th>EMAIL</th>
				<th>REG NO</th>
				<th>ACTION</th>

			</tr>
			</thead>
			<tbody>

			<?php foreach ($service_card_list as $service_card) { ?>
				<tr>
					<td><?= $service_card['service_card_id'] ?></td>
					<td><?= $service_card['booking_id'] ?></td>
					<td><?= $service_card['customer_name'] ?></td>
					<td><?= $service_card['email'] ?></td>
					<td><?= $service_card['reg_no'] ?></td>

<!---->
<!--					--><?php //if ($service_card['status'] == USER_INACTIVE) { ?>
<!--						<td class="text-center"><span class="badge badge-secondary">inactive</span></td>-->
<!--					--><?php //} elseif ($service_card['status'] == USER_ACTIVE) { ?>
<!--						<td class="text-center"><span class="badge badge-success">active</span></td>-->
<!--					--><?php //} ?>

					<td class="text-center">
						<a href="<?= base_url() ?>index.php/ServicecardController/view_service_card1?id=<?= $service_card['service_card_id'] ?>">
							<button type="button">
								<i class="fa fa-eye" title="view"></i>
							</button>
						</a>
						<!--						<a href="--><?//= base_url() ?><!--index.php/UserController/edit_user?id=--><?//= $service_card['user_id'] ?><!--">-->
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
				<th>CUSTOMER NAME</th>
				<th>EMAIL</th>
				<th>REG NO</th>
				<th>ACTION</th>
			</tr>
			</tfoot>
		</table>
	</div>

</div>
<!-- jQuery -->
<!--<script src="../../plugins/jquery/jquery.min.js"></script>-->
<!-- Bootstrap 4 -->


