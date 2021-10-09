<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>List Booking</h5>
			</div>
			<div class="col-sm-6 text-right">
				<a href="<?= base_url() ?>index.php/LoginController/booking">
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
				<th >BOOKING NO</th>
				<th >CUSTOMER NAME</th>
				<th >CUSTOMER NIC</th>
				<th >CUSTOMER MOBILE</th>
				<th >CUSTOMER ADDRESS</th>
				<th>EMAIL</th>
				<th>DELIVERY DATE</th>
				<th>START TIME</th>
				<th>END TIME</th>
				<th >ACTION</th>
			</tr>
			</thead>
			<tbody>

			<?php foreach ($booking_list as $booking) { ?>
				<tr>
					<td><?= $booking['booking_id'] ?></td>
					<td><?= $booking['customer_name'] ?></td>
					<td><?= $booking['nic'] ?></td>
					<td><?= $booking['mobile1'] ?></td>
					<td><?= $booking['address'] ?></td>
					<td><?= $booking['email'] ?></td>
					<td><?= $booking['0'] ?></td>
					<td><?= $booking['1'] ?></td>
					<td><?= $booking['2'] ?></td>



					<td class="text-center">
						<a href="<?= base_url() ?>index.php/BookingController/view_booking1?id=<?= $booking['booking_id'] ?>">
							<button type="button">
								<i class="fa fa-eye" title="view"></i>
							</button>
						</a>
<!--						<a href="--><?//= base_url() ?><!--index.php/BookingController/create_service_card?id=--><?//= $booking['booking_id'] ?><!--">-->
<!--							<button type="button">-->
<!--								<i class="fa fa-eye" title="view"></i>-->
<!--							</button>-->
<!--						</a>-->
						<!--						<a href="--><?//= base_url() ?><!--index.php/BookingController/edit_booking?id=--><?//= $booking['booking_id'] ?><!--">-->
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
				<th >BOOKING NO</th>
				<th >CUSTOMER NAME</th>
				<th >CUSTOMER NIC</th>
				<th >CUSTOMER MOBILE</th>
				<th >CUSTOMER ADDRESS</th>
				<th>EMAIL</th>
				<th>DELIVERY DATE</th>
				<th>START TIME</th>
				<th>END TIME</th>
				<th >ACTION</th>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
