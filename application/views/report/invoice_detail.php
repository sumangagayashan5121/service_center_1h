<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>Detail Invoice Report</h5>
			</div>
		</div>
	</div>
<!--	<form action="search_invoice_detail" method="post">-->
<!--		<div class="col-md-12 card-header form-group">-->
<!--			<div class="row form-group">-->
<!--				<div class="col-md-6">-->
<!--					<input type="text" id="search_text" value="--><?//=$search_text ?><!--" class="form-control"-->
<!--						   name="search_text" placeholder="Vehicle Reg no, customer name">-->
<!---->
<!--				</div>-->
<!--				<div class="col-md-6 text-right">-->
<!---->
<!--					<input type="date" id="start_date"  class="form-control" name="start_date"  />-->
<!--					<label class="control-label">From</label>-->
<!--					<input type="date" id="end_date"  class="form-control" name="end_date" />-->
<!--					<label class="control-label">To</label>-->
<!--				</div>-->
<!---->
<!--			</div>-->
<!--			<div class="row form-group">-->
<!--				<div class="col-md-12 text-right">-->
<!--					<span class="input-group-append">-->
<!--					<button id="search_button" name="search_button" class="btn btn-primary" type="submit">search</button>-->
<!--						</span>-->
<!--				</div>-->
<!--			</div>-->
<!---->
<!--		</div>-->
<!--	</form>-->
<!--	<div class="col-md-6">-->
<!--		<label class="control-label" id="notice"></label>-->
<!--	</div>-->
<!--</div>-->
</div>
<!--<form action="search_invoice_detail" method="post">-->
<!--	<div class="row">-->
<!--		<div class="col-md-3"><center><input name="search_text" class="form-control" type="text" placeholder="search"></center></div>-->
<!--		Start<div class="col-md-3"><input type="date" id="start_date"  class="form-control" name="start_date" onkeyup="start()"  /></div>-->
<!--		End<div class="col-md-3"><input type="date" id="end_date"  class="form-control" name="end_date" /></div>-->
<!--		<div class="col-md-2"><button id="search_button" name="search_button" class="btn btn-primary" type="submit">search</button></div>-->
<!---->
<!--	</div>-->
<!--</form>-->

<div class="card-body">
	<table id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
			<th width="30">INVOICE NO</th>
			<th width="30">BOOKING NO</th>
			<th width="30">VEHICLE REG</th>
<!--			<th width="30">CUSTOMER ID</th>-->
<!--			<th width="50">FIRST NAME</th>-->
<!--			<th width="50">LAST NAME</th>-->
			<th width="50">CUSTOMER NIC</th>
<!--			<th width="50">CUSTOMER MOBILE</th>-->
			<th width="50">SERVICE TYPE</th>

			<th width="50">ITEM CODE</th>

			<th width="50">DELIVERY DATE</th>
			<th width="30">TOTAL PRICE</th>
		</tr>
		</thead>
		<tbody>

		<?php
		$grand_total = 0;
		foreach ($invoice_list as $invoice) {
			$grand_total += $invoice['total_price'];?>
			<tr>
				<td><?= $invoice['invoice_id'] ?></td>
				<td><?= $invoice['booking_id'] ?></td>
				<td><?= $invoice['reg_no'] ?></td>
<!--				<td>--><?//= $invoice['customer_id'] ?><!--</td>-->
<!--				<td>--><?//= $invoice['first_name'] ?><!--</td>-->
<!--				<td>--><?//= $invoice['last_name'] ?><!--</td>-->
				<td><?= $invoice['nic'] ?></td>
<!--				<td>--><?//= $invoice['mobile1'] ?><!--</td>-->
				<td><?= $invoice[1]['service_id'] ?></td>

				<td><?= $invoice[0]['item_id'] ?></td>

				<td><?= $invoice['service_date'] ?></td>
				<td>Rs.<?= $invoice['total_price'] ?>.00</td>


			</tr>
		<?php } ?>
<!--		<tr>-->
<!--			<td colspan="11">Total</td>-->
<!--			<td></td>-->
<!--		</tr>-->
		</tbody>
		<tfoot>
		<tr>
			<th width="30">INVOICE NO</th>
			<th width="30">BOOKING NO</th>
			<th width="30">VEHICLE REG</th>
<!--			<th width="30">CUSTOMER ID</th>-->
<!--			<th width="50">FIRST NAME</th>-->
<!--			<th width="50">LAST NAME</th>-->
			<th width="50">CUSTOMER NIC</th>
<!--			<th width="50">CUSTOMER MOBILE</th>-->
			<th width="50">SERVICE TYPE</th>

			<th width="50">ITEM CODE</th>

			<th width="50">DELIVERY DATE</th>
			<th width="30">Rs.<?= $grand_total?>.00</th>
		</tr>
		</tfoot>
	</table>
</div>
</div>
