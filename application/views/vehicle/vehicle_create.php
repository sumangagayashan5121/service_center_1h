<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Create Vehicle</h5>
		</div>
	</div>
	<form action="save_vehicle" id="form" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					Customer id
					<input type="text" class="form-control" name="customer_id" autocomplete="off" required>
				</div>
				<div class="col-md-6">
					Reg no
					<input type="text" class="form-control" name="reg_no" autocomplete="off" required>
				</div>
<!--				<div class="col-md-6">-->
<!--					Model id-->
<!--					<input type="text" class="form-control" name="model_id">-->
<!--				</div>-->
				<div class="col-md-6" required>
					Model id
					<select class="form-control" required name="model_id">
						<option value="">SELECT MODEL</option>
						<?php foreach ($model_list as $model) { ?><option value="<?= $model['model_id'] ?>"><?= $model['model_name'] ?> </option><?php } ?>
					</select>
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="status" name="status">
						<option value="1">ACTIVE</option>
						<option value="0">INACTIVE</option>
					</select>
				</div>


			</div>


			<div class="row form-group">
				<div class="col-md-12 text-right">
					<a href="index"><input type="button" class="btn btn-success" value="go to list"></a>
					<button type="submit" class="btn btn-primary">create</button>
				</div>
			</div>
		</div>
	</form>
</div>


<script>
	/* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
	function myFunction() {
		document.getElementById("myDropdown").classList.toggle("show");
	}

	function filterFunction() {
		var input, filter, ul, li, a, i;
		input = document.getElementById("myInput");
		filter = input.value.toUpperCase();
		div = document.getElementById("myDropdown");
		a = div.getElementsByTagName("OPTION");
		for (i = 0; i < a.length; i++) {
			txtValue = a[i].textContent || a[i].innerText;
			if (txtValue.toUpperCase().indexOf(filter) > -1) {
				a[i].style.display = "";
			} else {
				a[i].style.display = "none";
			}
		}
	}
</script>
<script>
	var action = "Create";
	var module = "Vehicle";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "Created";
</script>
