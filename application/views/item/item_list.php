<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>List Item</h5>
			</div>
			<div class="col-sm-6 text-right">
				<a href="<?= base_url() ?>index.php/ItemController/create_item">
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
				<th width="30">ITEM ID</th>
				<th width="50">ITEM CODE</th>
				<th width="50">BARCODE</th>
				<th width="50">CATEGORY ID</th>
				<th width="50">DESCRIPTION</th>
				<th width="50">SELLING PRICE</th>
				<th width="50">COST PRICE</th>
				<th width="50">SUPPLIER ID</th>
				<th width="50">CREATED DATE</th>
				<th width="50">CREATED USER  ID</th>
				<th width="50">QTY</th>
				<th class="text-center" width="50">STATUS</th>
				<th class="text-center" width="50">ACTION</th>
			</tr>
			</thead>
			<tbody>

			<?php foreach ($item_list as $item) { ?>
				<tr>
					<td><?= $item['item_id'] ?></td>
					<td><?= $item['item_code'] ?></td>
					<td><?= $item['barcode'] ?></td>
					<td><?= $item['category_id'] ?></td>
					<td><?= $item['description'] ?></td>
					<td><?= $item['selling_price'] ?></td>
					<td><?= $item['cost_price'] ?></td>
					<td><?= $item['supplier_id'] ?></td>
					<td><?= $item['created_date'] ?></td>
					<td><?= $item['created_user_id'] ?></td>
					<td><?= $item['qty'] ?></td>
					<?php if ($item['status'] == USER_INACTIVE) { ?>
						<td class="text-center"><span class="badge badge-secondary">inactive</span></td>
					<?php } elseif ($item['status'] == USER_ACTIVE) { ?>
						<td class="text-center"><span class="badge badge-success">active</span></td>
					<?php } ?>

					<td class="text-center">
						<a href="<?= base_url() ?>index.php/ItemController/view_item?id=<?= $item['item_id'] ?>">
							<button type="button">
								<i class="fa fa-eye" title="view"></i>
							</button>
						</a>
						<a href="<?= base_url() ?>index.php/ItemController/edit_item?id=<?= $item['item_id'] ?>">
							<button type="button">
								<i class="fa fa-pencil" title="edit"></i>
							</button>
						</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
			<tfoot>
			<tr>
				<th width="30">ITEM ID</th>
				<th width="50">ITEM CODE</th>
				<th width="50">BARCODE</th>
				<th width="50">CATEGORY ID</th>
				<th width="50">DESCRIPTION</th>
				<th width="50">SELLING PRICE</th>
				<th width="50">COST PRICE</th>
				<th width="50">SUPPLIER ID</th>
				<th width="50">CREATED DATE</th>
				<th width="50">CREATED USER  ID</th>
				<th width="50">QTY</th>
				<th class="text-center" width="50">STATUS</th>
				<th class="text-center" width="50">ACTION</th>
			</tr>
			</tfoot>
		</table>
	</div>
</div>
