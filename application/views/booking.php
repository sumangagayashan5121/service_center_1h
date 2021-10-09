<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<link rel="icon" type="image/png" href="<?= base_url() ?>libraries/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/sweetalert2.min.css">

	<script src="<?= base_url() ?>libraries/js/sweetalert2.min.js"></script>

	<script src="<?= base_url() ?>libraries/vendor/jquery/jquery-3.2.1.min.js"></script>
	<style>
		.input101 {
			font-family: Poppins-Regular;
			font-size: 16px;
			color: #000;
			line-height: 1.2;

			display: block;
			width: 100%;
			height: 45px;
			background: transparent;
			padding: 0 5px 0 38px;
		}
	</style>
</head>
<body>

<div class="limiter">
	<div class="container-login100" style="background-image: url('<?= base_url() ?>libraries/images/bg-01.jpg');">
		<div class="wrap-login100">
			<form class="login100-form validate-form" action="<?=base_url()?>index.php/BookingController/check" method="post">
				<!--					<span class="login100-form-logo">-->
				<!--						<i class="zmdi zmdi-landscape"></i>-->
				<!--					</span>-->
				<span class="login100-form-title p-b-34 p-t-27">
						Booking
					</span>

				<div class="wrap-input100 validate-input" data-validate = "reg_no">
					<input class="input100" type="text" name="reg_no" placeholder="Vehicle Registration Num" id="reg_no" autocomplete="off" required>
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
					<input type="hidden" class="form-control" name="status" value="1">

				</div>


				<div class="wrap-input100 validate-input" data-validate = "Enter Company" required>
					<select class="input101" required name="model_id">
						<option value="">SELECT MODEL</option>
						<?php foreach ($model_list as $model) { ?><option value="<?= $model['model_id'] ?>"><?= $model['model_name'] ?> </option><?php } ?>
					</select>
					<span class="focus-input100" data-placeholder="&#xf207;"></span>

				</div>





				<div class="wrap-input100 validate-input" data-validate = "Enter Company" required>
					<select class="input101" required name="company_id">
						<option value="">SELECT COMPANY</option>
						<?php foreach ($company_list as $company) { ?><option value="<?= $company['company_id'] ?>"><?= $company['company_name'] ?> </option><?php } ?>
					</select>
					<span class="focus-input100" data-placeholder="&#xf207;"></span>

				</div>

				<div class="wrap-input100 validate-input" data-validate = "Enter Service" required>
					<select class="input101" required name="service_id">
						<option value="">SELECT SERVICE TYPE</option>
						<?php foreach ($service_list as $service) { ?><option value="<?= $service['service_id'] ?>">   <?= $service['description'] ?></option><?php } ?>
					</select>
					<span class="focus-input100" data-placeholder="&#xf207;"></span>

				</div>
				<div class="wrap-input100 validate-input" data-validate = "Enter Service date">
					<input class="input100" type="date" id="service_date"  name="service_date" required>
					<!--					<input type="date" id="start_date" value="--><?//=$start_date ?><!--" class="form-control" name="start_date"  />-->
					<span class="focus-input100" data-placeholder="&#xf207;"></span>
				</div>

<!--				<div class="wrap-input100 validate-input" data-validate = "Enter Service time">-->
<!--					<select class="form-control" required name="service_time">-->
<!--						<option value="">SELECT TIME</option>-->
<!--						--><?php //foreach ($time_list as $time) { ?><!--<option value="--><?//= $time['time_id'] ?><!--">--><?//= $time['start_time'] ?><!-----><?//= $time['end_time'] ?><!--</option>--><?php //} ?>
<!--					</select>-->

<!--					<span class="focus-input100" data-placeholder="&#xf207;"></span>-->
<!--				</div>-->



				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn" id="create">
						Confirm
					</button>
				</div>

			</form>
		</div>
	</div>
</div>


<div id="dropDownSelect1"></div>
<script>


	var service_date = document.getElementById("service_date");

	function search_service_date() {
		console.log("test");
		$.ajax({
			url: "<?= base_url()?>index.php/BookingController/validate_date",
			method: "get",
			data: {
				'service_date': $('#service_date').val()
			},
			success: function (result) {
				var obj = $.parseJSON(result);
				console.log(obj);
				if (obj > 0) {
					service_date.setCustomValidity('Date is a holiday..');
				} else {
					service_date.setCustomValidity('');
				}
			}
		});
	}

	service_date.onchange = search_service_date;


</script>



</body>
</html>
