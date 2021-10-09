<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">View Role</h5>
		</div>
	</div>
	<form >
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					<font size="3"><i class="fa fa-role-circle" aria-hidden="true"></i>
						Role ID <?= $role['id'] ?></font>

				</div>
				<div class="col-md-6">
					<font size="3"><i class="fa fa-address-card-o" aria-hidden="true"></i>
						Role <?= $role['role'] ?></font>

				</div>
				<div class="col-md-6">
					<font size="3"><i class="fa fa-hand-o-right" aria-hidden="true"></i>
						Description <?= $role['description'] ?></font>

				</div>

			</div>


		</div>
	</form>
</div>

