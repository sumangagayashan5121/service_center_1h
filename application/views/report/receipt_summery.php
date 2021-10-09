<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>Summery Receipt Report</h5>
			</div>
		</div>
	</div>
		<form action="search_receipt_summery" method="post">
			<div class="col-md-12 card-header form-group">
				<div class="row form-group">
					<div class="col-md-6">
						<input type="text" id="search_text" value="<?=$search_text ?>" class="form-control"
							   name="search_text" placeholder="Vehicle Reg no, customer name">

					</div>
					<div class="col-md-6 text-right">

						<input type="date" id="start_date" class="form-control"value="<?php echo isset($itemOutData->date_out) ? set_value('date_out',
							date('m/d/Y', strtotime($itemOutData->date_out))) : set_value('date_out'); ?> name="start_date"  />
						<label class="control-label">From</label>
						<input type="date" id="end_date" class="form-control"value="<?php echo isset($itemOutData->date_out) ? set_value('date_out',
							date('m/d/Y', strtotime($itemOutData->date_out))) : set_value('date_out'); ?> name="end_date" />
						<label class="control-label">To</label>
					</div>

				</div>
				<div class="row form-group">
					<div class="col-md-12 text-right">
					<span class="input-group-append">
					<button id="search_button" name="search_button" class="btn btn-primary" type="submit">search</button>
						</span>
					</div>
				</div>

			</div>
		</form>

		<div class="col-md-6">
			<label class="control-label" id="notice"></label>
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
				<th width="50">DESCRIPTION</th>
				<th width="50">DELIVERY DATE</th>
			</tr>
			</thead>
			<tbody>

			<?php foreach ($receipt_list->result_array() as $receipt) { ?>
				<tr>
					<td><?= $receipt['receipt_id'] ?></td>
					<td><?= $receipt['customer_id'] ?></td>
					<td><?= $receipt['customer_name'] ?></td>
					<td><?= $receipt['nic'] ?></td>
					<td><?= $receipt['mobile1'] ?></td>
					<td><?= $receipt['description'] ?></td>
					<td><?= $receipt['deliver_date'] ?></td>


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
			<th width="50">DESCRIPTION</th>
			<th width="50">DELIVERY DATE</th>
		</tr>
		</tfoot>
		</table>
	</div>
</div>
