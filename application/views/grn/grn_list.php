<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>Grn List</h5>
			</div>
		</div>
	</div>
</div>


</div>

<div class="card-body">
	<table id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
			<th width="30">GRN NO</th>
			<th width="30">INVOICE NO</th>
			<th width="30">SUPPLIER NAME</th>
			<th width="50">REMARKS </th>
			<th width="50">ACTION</th>
		</tr>
		</thead>
		<tbody>

		<?php foreach ($grn_list as $grn) { ?>
			<tr>
				<td><?= $grn['grn_id'] ?></td>
				<td><?= $grn['invoice_number'] ?></td>
				<td><?= $grn['supplier_name'] ?></td>

				<td><?= $grn['remarks'] ?></td>
				<td class="text-center">
					<a href="<?= base_url() ?>index.php/GrnController/view_grn1?id=<?= $grn['grn_id'] ?>">
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
			<th width="30">GRN NO</th>
			<th width="30">INVOICE NO</th>
			<th width="30">SUPPLIER NAME</th>
			<th width="50">REMARKS </th>
			<th width="50">ACTION</th>
		</tr>
		</tfoot>
	</table>
</div>
</div>
