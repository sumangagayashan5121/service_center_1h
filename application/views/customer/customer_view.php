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
					Customer Name is <?= $customer['customer_name'] ?>

				</div>
				<div class="col-md-6">
					NIC is  <?= $customer['nic'] ?>

				</div>
				<div class="col-md-6">
					Address is <?= $customer['address'] ?>

				</div>
				<div class="col-md-6">
					Mobile num 1 is  <?= $customer['mobile1'] ?>

				</div>
				<div class="col-md-6">
					Mobile num 2 is <?= $customer['mobile2'] ?>

				</div>

			</div>


		</div>
	</form>
</div>


