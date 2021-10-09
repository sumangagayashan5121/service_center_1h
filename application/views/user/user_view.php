<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">View User</h5>
		</div>
	</div>
	<table class="table table-striped small">
		<tr>
			<td>User Name</td>
			<td><?= $user['email'] ?></td>
		</tr>
		<tr>
			<td>Role ID</td>
			<td><?= $user['role_id'] ?></td>
		</tr>
		<tr>
			<td>Name</td>
			<td><?= $user['first_name'] ?> <?= $user['last_name'] ?></td>
		</tr>
		<tr>
			<td>NIC</td>
			<td><?= $user['nic'] ?></td>
		</tr>
		<tr>
			<td>Created Date</td>
			<td><?= $user['created_date'] ?></td>
		</tr>
		<tr>
			<td>Created By</td>
			<td><<?= $user['created_by'] ?>/td>
		</tr>
	</table>
<!--	<form >-->
<!--		<div class="card-body">-->
<!--			<div class="row form-group">-->
<!---->
<!--				<div class="col-md-6">-->
<!--					<font size="3"><i class="fa fa-user-circle" aria-hidden="true"></i>-->
<!--					User Name is --><?//= $user['user_name'] ?><!--</font>-->
<!---->
<!--				</div>-->
<!--				<div class="col-md-6">-->
<!--					<font size="3"><i class="fa fa-address-card-o" aria-hidden="true"></i>-->
<!--					Role ID --><?//= $user['role_id'] ?><!--</font>-->
<!---->
<!--				</div>-->
<!--				<div class="col-md-6">-->
<!--					<font size="3"><i class="fa fa-hand-o-right" aria-hidden="true"></i>-->
<!--					Name --><?//= $user['first_name'] ?><!----><?//= $user['last_name'] ?><!--</font>-->
<!---->
<!--				</div>-->
<!--				<div class="col-md-6">-->
<!--					<font size="3"><i class="fa fa-id-card" aria-hidden="true"></i>-->
<!--					NIC Name --><?//= $user['nic'] ?><!--</font>-->
<!---->
<!--				</div>-->
<!--				<div class="col-md-6">-->
<!--					<font size="3"><i class="fa fa-calendar" aria-hidden="true"></i>-->
<!--					Created Date --><?//= $user['created_date'] ?><!--</font>-->
<!---->
<!--				</div>-->
<!--				<div class="col-md-6">-->
<!--					<font size="3"><i class="fa fa-user-o" aria-hidden="true"></i>-->
<!--					Created By --><?//= $user['created_by'] ?><!--</font>-->
<!---->
<!--				</div>-->
<!---->
<!--			</div>-->
<!---->
<!---->
<!--		</div>-->
<!--	</form>-->
</div>

