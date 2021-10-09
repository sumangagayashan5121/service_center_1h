<!--<div class="card">-->
<!--	<div class="card-header">-->
<!--		<div class="row">-->
<!--			<div class="col-sm-6">-->
<!--				<h5>Summery Booking Report</h5>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->
<!--	<form action="search_booking_detail" method="post">-->
<!--		<div class="row">-->
<!--			<div class="col-md-3"><center><input name="search_text" class="form-control" type="text" placeholder="search"></center></div>-->
<!--			Date<div class="col-md-3"><input type="date" id="start_date"  class="form-control" name="start_date" onkeyup="start()"  /></div>-->
<!--<!--			End<div class="col-md-3"><input type="date" id="end_date"  class="form-control" name="end_date" /></div>-->-->
<!--			<div class="col-md-2"><button id="search_button" name="search_button" class="btn btn-primary" type="submit">search</button></div>-->
<!---->
<!--		</div>-->
<!--	</form>-->
<!--</div>-->


</div>

<div class="card-body">
	<table id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
			<th width="30">BOOKING NO</th>
			<th width="30">CUSTOMER NAME</th>
			<th width="50">ADDRESS</th>
			<th width="50">CUSTOMER NIC</th>
			<th width="50">CUSTOMER MOBILE</th>
			<th width="50">EMAIL</th>
			<th width="50">REG NO</th>
			<th width="50">MODEL NAME</th>
			<th width="50">SERVICE DATE</th>
			<th width="50">START TIME</th>
			<th width="50">END TIME</th>

		</tr>
		</thead>
		<tbody>

		<?php foreach ($booking_list->result_array() as $receipt) { ?>
			<tr>
				<td><?= $receipt['booking_id'] ?></td>
				<td><?= $receipt['customer_name'] ?></td>
				<td><?= $receipt['address'] ?></td>
				<td><?= $receipt['nic'] ?></td>
				<td><?= $receipt['mobile1'] ?></td>
				<td><?= $receipt['email'] ?></td>
				<td><?= $receipt['reg_no'] ?></td>
				<td><?= $receipt['model_name'] ?></td>
				<td><?= $receipt['service_date'] ?></td>
				<td><?= $receipt['start_time'] ?></td>
				<td><?= $receipt['end_time'] ?></td>

			</tr>
		<?php } ?>
		</tbody>
		<tfoot>
		<tr>
			<th width="30">BOOKING NO</th>
			<th width="30">CUSTOMER NAME</th>
			<th width="50">ADDRESS</th>
			<th width="50">CUSTOMER NIC</th>
			<th width="50">CUSTOMER MOBILE</th>
			<th width="50">EMAIL</th>
			<th width="50">REG NO</th>
			<th width="50">MODEL NAME</th>
			<th width="50">SERVICE DATE</th>
			<th width="50">START TIME</th>
			<th width="50">END TIME</th>

		</tr>
		</tfoot>
	</table>
</div>
</div>
