<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">View Item</h5>
		</div>
	</div>
	<form >
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Item code is <?= $item['item_code'] ?>

				</div>
				<div class="col-md-6">
					Barcode is  <?= $item['barcode'] ?>

				</div>
				<div class="col-md-6">
					Category ID is  <?= $item['category_id'] ?>

				</div>
				<div class="col-md-6">
					Description is <?= $item['description'] ?>

				</div>
				<div class="col-md-6">
					Selling price is  <?= $item['selling_price'] ?>

				</div>
				<div class="col-md-6">
					Cost price is <?= $item['cost_price'] ?>

				</div>
				<div class="col-md-6">
					Supplier ID is  <?= $item['supplier_id'] ?>

				</div>
				<div class="col-md-6">
					Created date is  <?= $item['created_date'] ?>

				</div>
				<div class="col-md-6">
					Created user ID is  <?= $item['created_user_id'] ?>

				</div>
				<div class="col-md-6">
					Qty is  <?= $item['qty'] ?>

				</div>

			</div>


		</div>
	</form>
</div>


