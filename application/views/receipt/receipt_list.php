<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>List Receipt</h5>
			</div>
			<div class="col-sm-6 text-right">
				<a href="<?= base_url() ?>index.php/ReceiptController/create_receipt">
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
				<th width="30">RECEIPT NO</th>
				<th width="30">CUSTOMER ID</th>
				<th width="50">CUSTOMER NAME</th>
				<th width="50">CUSTOMER NIC</th>
				<th width="50">CUSTOMER MOBILE</th>
				<th width="50">CUSTOMER ADDRESS</th>
				<th width="50">DESCRIPTION</th>
				<th width="50">DELIVERY DATE</th>
				<th width="50">ACTION</th>
			</tr>
			</thead>
			<tbody>

			<?php foreach ($receipt_list as $receipt) { ?>
				<tr>
					<td><?= $receipt['receipt_id'] ?></td>
					<td><?= $receipt['customer_id'] ?></td>
					<td><?= $receipt['customer_name'] ?></td>
					<td><?= $receipt['nic'] ?></td>
					<td><?= $receipt['mobile1'] ?></td>
					<td><?= $receipt['address'] ?></td>
					<td><?= $receipt['description'] ?></td>
					<td><?= $receipt['deliver_date'] ?></td>


					<td class="text-center">
						<a href="<?= base_url() ?>index.php/ReceiptController/view_receipt1?id=<?= $receipt['receipt_id'] ?>">
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
				<th width="30">RECEIPT NO</th>
				<th width="30">CUSTOMER ID</th>
				<th width="50">CUSTOMER NAME</th>
				<th width="50">CUSTOMER NIC</th>
				<th width="50">CUSTOMER MOBILE</th>
				<th width="50">CUSTOMER ADDRESS</th>
				<th width="50">DESCRIPTION</th>
				<th width="50">DELIVERY DATE</th>
				<th width="50">ACTION</th>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
