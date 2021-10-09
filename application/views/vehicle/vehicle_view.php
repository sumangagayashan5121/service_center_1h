<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">View Vehicle</h5>
		</div>
	</div>
	<form >
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					<font size="3"><i class="fa fa-vehicle-circle" aria-hidden="true"></i>
						Vehicle ID <?= $vehicle['vehicle_id'] ?></font>

				</div>
				<div class="col-md-6">
					<font size="3"><i class="fa fa-vehicle-circle" aria-hidden="true"></i>
						Customer ID <?= $vehicle['customer_id'] ?></font>

				</div>
				<div class="col-md-6">
					<font size="3"><i class="fa fa-hand-o-right" aria-hidden="true"></i>
						Reg no <?= $vehicle['reg_no'] ?></font>

				</div>
				<div class="col-md-6">
					<font size="3"><i class="fa fa-vehicle-circle" aria-hidden="true"></i>
						Model ID <?= $vehicle['model_id'] ?></font>

				</div>

			</div>


		</div>
	</form>
</div>

