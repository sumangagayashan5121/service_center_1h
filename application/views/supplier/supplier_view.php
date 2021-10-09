<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">View User</h5>
		</div>
	</div>
	<form >
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Customer Name is <?= $supplier['supplier_name'] ?>

				</div>
				<div class="col-md-6">
					Address is <?= $supplier['address'] ?>

				</div>
				<div class="col-md-6">
					Mobile num 1 is  <?= $supplier['mobile1'] ?>

				</div>
				<div class="col-md-6">
					Mobile num 2 is <?= $supplier['mobile2'] ?>

				</div>
				<div class="col-md-6">
					Email is  <?= $supplier['email'] ?>

				</div>
				<div class="col-md-6">
					Contact person is  <?= $supplier['contact_person'] ?>

				</div>

			</div>


		</div>
	</form>
</div>


