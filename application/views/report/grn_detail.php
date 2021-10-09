<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>Detail Grn Report</h5>
			</div>
		</div>
	</div>
<!--	<form action="search_grn_detail" method="post">-->
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
<!--<form action="search_grn_detail" method="post">-->
<!--<div class="row">-->
<!--		<div class="col-md-3"><center><input name="search_text" class="form-control" type="text" placeholder="search"></center></div>-->
<!--		Start<div class="col-md-3"><input type="date" id="start_date"  class="form-control" name="start_date" onkeyup="start()"  /></div>-->
<!--	End<div class="col-md-3"><input type="date" id="end_date"  class="form-control" name="end_date" /></div>-->
<!--		<div class="col-md-2"><button id="search_button" name="search_button" class="btn btn-primary" type="submit">search</button></div>-->
<!---->
<!--</div>-->
<!--</form>-->
<script>
	function start() {
		var x = document.getElementById("end_date");
		if (x == null) {
			x.setCustomValidity('Please enter end date');
		}
	}
</script>
<div class="card-body">
	<table id="example1" class="table table-bordered table-striped">
		<thead>
		<tr>
			<th width="30">GRN NO</th>
			<th width="30">INVOICE NO</th>
			<th width="30">SUPPLIER ID</th>
			<th width="30">S.ADDRESS</th>
			<th width="50">S.EMAIL</th>
			<th width="50">S.MOBILE</th>
			<th width="50">ITEM ID </th>
			<th width="50">ITEM COST PRICE </th>
			<th width="50">ITEM SELLING PRICE </th>
			<th width="50">QTY</th>
			<th width="50">CREATED DATE</th>
			<th width="50">TOTAL COST</th>
<!--			<th width="50">TOTAL</th>-->



		</tr>
		</thead>
		<tbody>

		<?php
		$grand_total = 0;
		foreach ($grn_list as $grn) {
			$grand_total += $grn['total_cost'];?>
			<tr>
				<td><?= $grn['grn_id'] ?></td>
				<td><?= $grn['invoice_number'] ?></td>
				<td><?= $grn['supplier_name'] ?></td>
				<td><?= $grn['address'] ?></td>
				<td><?= $grn['email'] ?></td>
				<td><?= $grn['mobile1'] ?></td>
				<td><?= $grn[0]['item_id'] ?></td>
				<td><?= $grn[0]['cost_price'] ?></td>
				<td><?= $grn[0]['selling_price'] ?></td>
				<td><?= $grn[0]['qty'] ?></td>
				<td><?= $grn['created_date'] ?></td>
				<td>Rs.<?= $grn['total_cost'] ?>.00</td>




			</tr>
		<?php } ?>
<!--		<tr>-->
<!--			<td colspan="10">Total</td>-->
<!--		</tr>-->
		</tbody>
		<tfoot>
		<tr>
			<th width="30">GRN NO</th>
			<th width="30">INVOICE NO</th>
			<th width="30">SUPPLIER ID</th>
			<th width="30">S.ADDRESS</th>
			<th width="50">S.EMAIL</th>
			<th width="50">S.MOBILE</th>
			<th width="50">ITEM ID </th>
			<th width="50">ITEM COST PRICE </th>
			<th width="50">ITEM SELLING PRICE </th>
			<th width="50">QTY</th>
			<th width="50">CREATED DATE</th>

			<th width="50">Rs.<?= $grand_total?>.00</th>
		</tr>
		</tfoot>
	</table>
</div>
</div>

