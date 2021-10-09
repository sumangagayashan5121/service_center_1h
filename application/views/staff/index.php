<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col-sm-6">
				<h5>List Staff</h5>
			</div>
			<div class="col-sm-6 text-right">
				<a href="<?= base_url() ?>index.php/StaffController/create_staff">
					<button type="button" class="btn btn-primary">
						<i class="fa fa-plus"></i> Create
					</button>
				</a>
			</div>
		</div>
	</div>
	<div class="card-body">
		<table id="example2" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th >USER ID</th>
				<th>EMAIL</th>
				<th >FIRST NAME</th>
				<th >LAST NAME</th>
				<th >NIC</th>
				<th >CREATED DATE</th>
				<th >CREATED BY</th>
				<th >ROLE</th>
<!--				<th >JOB</th>-->
<!--				<th >BASIC SALARY</th>-->
				<th >STATUS</th>
<!--				<th >ACTION</th>-->
			</tr>
			</thead>
			<tbody>

			<?php foreach ($staff_list as $staff) { ?>
				<tr>
					<td><?= $staff['user_id'] ?></td>
					<td><?= $staff['email'] ?></td>
					<td><?= $staff['first_name'] ?></td>
					<td><?= $staff['last_name'] ?></td>
					<td><?= $staff['nic'] ?></td>
					<td><?= $staff['created_date'] ?></td>
					<td><?= $staff['created_by'] ?></td>
					<td><?= $staff['role_id'] ?></td>
<!--					<td>--><?//= $staff['job'] ?><!--</td>-->
<!--					<td>--><?//= $staff['basic_sallary'] ?><!--</td>-->
					

					<?php if ($staff['status'] == USER_INACTIVE) { ?>
						<td class="text-center"><span class="badge badge-secondary">inactive</span></td>
					<?php } elseif ($staff['status'] == USER_ACTIVE) { ?>
						<td class="text-center"><span class="badge badge-success">active</span></td>
					<?php } ?>
<!---->
<!--					<td class="text-center">-->
<!--						<a href="--><?//= base_url() ?><!--index.php/StaffController/view_staff?id=--><?//= $staff['user_id'] ?><!--">-->
<!--							<button type="button">-->
<!--								<i class="fa fa-eye" title="view"></i>-->
<!--							</button>-->
<!--						</a>-->
<!--						<a href="--><?//= base_url() ?><!--index.php/StaffController/staff_edit?id=--><?//= $staff['user_id'] ?><!--">-->
<!--							<button type="button">-->
<!--								<i class="fa fa-pencil" title="edit"></i>-->
<!--							</button>-->
<!--						</a>-->
<!--					</td>-->
				</tr>
			<?php } ?>
			</tbody>
			<tfoot>
			<tr>
				<th >USER ID</th>
				<th>EMAIL</th>
				<th >FIRST NAME</th>
				<th >LAST NAME</th>
				<th >NIC</th>
				<th >CREATED DATE</th>
				<th >CREATED BY</th>
				<th >ROLE</th>
<!--				<th >JOB</th>-->
<!--				<th >BASIC SALARY</th>-->
				<th >STATUS</th>
<!--				<th >ACTION</th>-->
			</tr>
			</tfoot>
		</table>
	</div>
	<!--	<div class="card-body small">-->
	<!--		<table class="table table-bordered">-->
	<!--			<thead>-->
	<!--			<tr>-->
	<!--				<th width="30">USER ID</th>-->
	<!--				<th width="50">USERNAME</th>-->
	<!--				<th width="50">FIRST NAME</th>-->
	<!--				<th width="50">LAST NAME</th>-->
	<!--				<th width="50">NIC</th>-->
	<!--				<th width="50">CREATED DATE</th>-->
	<!--				<th width="50">CREATED BY</th>-->
	<!--				<th width="50">ROLE</th>-->
	<!--				<th class="text-center" width="50">STATUS</th>-->
	<!--				<th class="text-center" width="50">ACTION</th>-->
	<!--			</tr>-->
	<!--			</thead>-->
	<!--			<tbody>-->
	<!---->
	<!--			--><?php //foreach ($staff_list as $staff) { ?>
	<!--				<tr>-->
	<!--					<td>--><?//= $staff['staff_id'] ?><!--</td>-->
	<!--					<td>--><?//= $staff['staff_name'] ?><!--</td>-->
	<!--					<td>--><?//= $staff['first_name'] ?><!--</td>-->
	<!--					<td>--><?//= $staff['last_name'] ?><!--</td>-->
	<!--					<td>--><?//= $staff['nic'] ?><!--</td>-->
	<!--					<td>--><?//= $staff['created_date'] ?><!--</td>-->
	<!--					<td>--><?//= $staff['created_by'] ?><!--</td>-->
	<!--					<td>--><?//= $staff['role_id'] ?><!--</td>-->
	<!---->
	<!--					--><?php //if ($staff['status'] == USER_INACTIVE) { ?>
	<!--						<td class="text-center"><span class="badge badge-secondary">inactive</span></td>-->
	<!--					--><?php //} elseif ($staff['status'] == USER_ACTIVE) { ?>
	<!--						<td class="text-center"><span class="badge badge-success">active</span></td>-->
	<!--					--><?php //} ?>
	<!---->
	<!--					<td class="text-center">-->
	<!--						<a href="--><?//= base_url() ?><!--index.php/StaffController/view_staff?id=--><?//= $staff['staff_id'] ?><!--">-->
	<!--							<button type="button">-->
	<!--								<i class="fa fa-eye" title="view"></i>-->
	<!--							</button>-->
	<!--						</a>-->
	<!--						<a href="--><?//= base_url() ?><!--index.php/StaffController/edit_staff?id=--><?//= $staff['staff_id'] ?><!--">-->
	<!--							<button type="button">-->
	<!--								<i class="fa fa-pencil" title="edit"></i>-->
	<!--							</button>-->
	<!--						</a>-->
	<!--					</td>-->
	<!--				</tr>-->
	<!--			--><?php //} ?>
	<!--			</tbody>-->
	<!--		</table>-->
	<!--	</div>-->
</div>
<!-- jQuery -->
<!--<script src="../../plugins/jquery/jquery.min.js"></script>-->
<!-- Bootstrap 4 -->


