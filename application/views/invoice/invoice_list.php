<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>Invoice List</h5>
			</div>
		</div>
	</div>

</div>


<div style="clear:both"></div>
</div>
<div id="result"></div>
<div class="card-body">
	<table id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
			<th width="30">INVOICE NO</th>
			<th width="30">BOOKING NO</th>
			<th width="30">VEHICLE REG</th>
			<th width="30">CUSTOMER ID</th>
			<th width="50">FIRST NAME</th>
			<th width="50">LAST NAME</th>

			<th width="50">CUSTOMER NIC</th>
			<th width="50">CUSTOMER MOBILE</th>
<!--			<th width="50">DESCRIPTION</th>-->
			<th width="50">DELIVERY DATE</th>
			<th width="50">ACTION</th>
		</tr>
		</thead>
		<tbody>

		<?php
		$grand_total = 0;
		foreach ($invoice_list->result_array() as $invoice) {
			$grand_total += $invoice['total_price'];
			?>
			<tr>
				<td><?= $invoice['invoice_id'] ?></td>
				<td><?= $invoice['booking_id'] ?></td>
				<td><?= $invoice['reg_no'] ?></td>
				<td><?= $invoice['customer_id'] ?></td>
				<td><?= $invoice['first_name'] ?></td>
				<td><?= $invoice['last_name'] ?></td>

				<td><?= $invoice['nic'] ?></td>
				<td><?= $invoice['mobile1'] ?></td>
<!--				<td>--><?//= $invoice['description'] ?><!--</td>-->
				<td><?= $invoice['service_date'] ?></td>
				<td class="text-center">
					<a href="<?= base_url() ?>index.php/InvoiceController/view_invoice1?id=<?= $invoice['invoice_id'] ?>">
						<button type="button">
							<i class="fa fa-eye" title="view"></i>
						</button>
					</a>
					<!--						<a href="--><?//= base_url() ?><!--index.php/ReceiptController/edit_receipt?id=--><?//= $receipt['receipt_id'] ?><!--">-->
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
			<th width="30">INVOICE NO</th>
			<th width="30">RECEIPT NO</th>
			<th width="30">VEHICLE REG</th>
			<th width="30">CUSTOMER ID</th>
			<th width="50">FIRST NAME</th>
			<th width="50">LAST NAME</th>
			<th width="50">CUSTOMER NIC</th>
			<th width="50">CUSTOMER MOBILE</th>
<!--			<th width="50">DESCRIPTION</th>-->
			<th width="50">DELIVERY DATE</th>
			<th width="50">ACTION</th>
		</tr>
		</tfoot>
	</table>
</div>
</div>
