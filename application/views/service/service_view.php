<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">View Service</h5>
		</div>
	</div>
	<form >
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					<font size="3"><i class="fa fa-service-circle" aria-hidden="true"></i>
						Service ID <?= $service['service_id'] ?></font>

				</div>
				<div class="col-md-6">
					<font size="3"><i class="fa fa-service-circle" aria-hidden="true"></i>
						Description <?= $service['description'] ?></font>

				</div>
				<div class="col-md-6">
					<font size="3"><i class="fa fa-hand-o-right" aria-hidden="true"></i>
						Price <?= $service['price'] ?></font>

				</div>

			</div>


		</div>
	</form>
</div>

