<link href="<?= base_url()?>libraries/css/jquery-ui.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css"
	  href="<?= base_url() ?>libraries/css/bootstrap-datepicker.css">

<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Create Process</h5>
		</div>
	</div>
	<form id="form" action="save_holiday" method="post">
		<div class="card-body">
			<div class="row form-group">
<!--				<div class="col-md-6">-->
<!--					Month <span style="color: red">*</span>-->
<!--					<input type="text" class="form-control" required id="month" name="month">-->
<!--				</div>-->
<!--				<div class="col-md-6">-->
<!--					Remarks <span style="color: red">*</span>-->
<!--					<input type="text" class="form-control" name="remarks">-->
<!--				</div>-->
			</div>
			<div class="row form-group">
				<div class="col-md-12">
					Holiday <span style="color: red">*</span>
					<input type="text" class="form-control holidays" required name="holidays" required autocomplete="off">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-md-12 text-right">
					<a href="process_index"><input type="button" class="btn btn-success" value="go to list"></a>
					<button type="submit" class="btn btn-primary">create</button>
				</div>
			</div>
		</div>
	</form>
</div>

<script src="<?= base_url() ?>libraries/js/jquery.mtz.monthpicker.js"></script>
<script src="<?= base_url() ?>libraries/js/bootstrap-datepicker.js"></script>

<script>
	var action = "Create"
	var module = "Holidays";
	var type = "warning";
	var action_progress = "Creating";
	var action_past = "created";

	$(document).ready(function () {
		$('.holidays').datepicker({
			multidate: true,
			format: 'yyyy-mm-dd'
		});
	});

	var d = new Date()

	$('#month').monthpicker({
		pattern: 'yyyy-mm',
		selectedYear: d.getFullYear(),
		selectedMonth: d.getMonth()+1,
		startYear: 2000,
		finalYear: 2100,
	});
</script>
