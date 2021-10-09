<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Edit User</h5>
		</div>
	</div>
	<form action="<?=base_url()?>index.php/StaffController/update_staff" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Basic Salary
					<input type="text" class="form-control" value="<?php if(isset($staff)){echo $staff['basic_sallary'];}?>"
						   autocomplete="off"  id="basic_sallary"  name="basic_sallary">
					<input type="hidden" name="staff_id" value="<?php if(isset( $staff)){ echo $staff['staff_id'];}?> " autocomplete="off" required>

				</div>
				<div class="col-md-6">
					Overtime
					<input type="text" class="form-control" value="<?php if(isset( $staff)){ echo $staff['over_time'];}?>" autocomplete="off"
						   name="over_time">
				</div>
				<div class="col-md-6">
					Others
					<input type="text" class="form-control" value="<?php if(isset( $staff)){ echo $staff['other'];}?>" autocomplete="off"
						   name="other">
				</div>


			</div>


			<div class="row form-group">
				<div class="col-md-12 text-right">
					<a href="index"><input type="button" class="btn btn-success" value="go to list"></a>
					<input type="submit" class="btn btn-primary" value="update">
				</div>
			</div>
		</div>
	</form>
</div>

