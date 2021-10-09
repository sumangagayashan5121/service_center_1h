<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/wizard.css">
<script src="<?= base_url() ?>libraries/js/wizard.js"></script>

<div class="container">
	<div class="stepwizard">
		<div class="stepwizard-row setup-panel">
			<div class="stepwizard-step">
				<a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
				<p>Step 1</p>
			</div>
			<div class="stepwizard-step">
				<a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
				<p>Step 2</p>
			</div>
			<div class="stepwizard-step">
				<a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
				<p>Finish</p>
			</div>
		</div>
	</div>
	<form role="form" action="save_receipt" id="form" method="post">
		<div class="row setup-content" id="step-1">
			<div class="col-xs-12">
				<div class="col-md-12 ">
					<h3> Customer details</h3>
					<div class="row form-group">
						<div class="col-md-12 card-header form-group">
							<label class="control-label">Search by Customer NIC</label>
								<div class="col-md-6 input-group">
									<input class="form-control" type="text" name="inic" id="inic" >
									<span class="input-group-append">
											<button id="button_nic" class="btn btn-primary" type="button">
											  <i class="fa fa-search"></i>
											</button>
									</span>
								</div>
							<div class="col-md-6">
								<label class="control-label" id="notice"></label>
							</div>


						</div>
						<div class="col-md-6">
							<label class="control-label">Customer Name</label>
							<input  maxlength="100" type="text" name="customer_name" id="customer_name" required="required" class="form-control"   />
							<input type="hidden" name="customer_status" id="customer_status" value="0">
							<input type="hidden" name="customer_id" id="customer_id" value="0">
						</div>
						<div class="col-md-6">
							<label class="control-label">NIC</label>
							<input maxlength="100" type="text" name="nic" id="nic" required="required" class="form-control"  />
						</div>
						<div class="col-md-6">
							<label class="control-label">Address</label>
							<input maxlength="100" type="text" name="address" id="address" required="required" class="form-control"  />
						</div>
						<div class="col-md-6">
							<label class="control-label">Mobile num 1</label>
							<input maxlength="100" type="text" name="mobile1" id="mobile1" required="required" class="form-control"  />
						</div>
						<div class="col-md-6">
							<label class="control-label">Mobile num 2</label>
							<input maxlength="100" type="text" name="mobile2" id="mobile2"  class="form-control"  />
						</div>
						<div class="col-md-6">
							<label class="control-label">Customer Status</label>
							<select class="form-control" id="cus_status" name="cus_status">
								<option value="1">ACTIVE</option>
								<option value="0">INACTIVE</option>
							</select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12 text-right">
							<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row setup-content" id="step-2">
			<div class="col-xs-12">
				<div class="col-md-12">
					<h3> Vehicle details</h3>
					<div class="row form-group">

						<div class="col-md-12 card-header form-group">
							<label class="control-label">Search by Vehicle Registration number</label>
							<div class="col-md-6 input-group">
								<input class="form-control" type="text" name="reg_no" id="reg_no">
								<span class="input-group-append">
									<button id="button_reg" class="btn btn-primary" type="button">
											  <i class="fa fa-search"></i>
									</button>
								</span>
							</div>
							<div class="input-group">

							</div>
						</div>
						<div class="col-md-6">
							<label class="control-label">Model name</label>
							<input maxlength="100" type="text" name="model_name"  id="model_name"required="required" class="form-control"  />
							<input type="hidden" name="vehicle_status" id="vehicle_status" value="0">
						</div>
						<div class="col-md-6">
							<label class="control-label">Company name</label>
							<select class="form-control" name="company_id">
								<option value="">SELECT COMPANY</option>
								<?php foreach ($company_list as $company) { ?>
									<option value="<?= $company['company_id'] ?>">   <?= $company['company_name'] ?>     </option>
								<?php } ?>
							</select>


						</div>
						<div class="col-md-6">
							<label class="control-label">Model Status</label>

							<select class="form-control" id="model_status" name="model_status">
								<option value="1">ACTIVE</option>
								<option value="0">INACTIVE</option>
							</select>
							<input type="hidden" name="vehicle_status" id="vehicle_status" value="0">
							<input type="hidden" name="model_id" id="model_id">
							<input type="hidden" name="vehicle_id" id="vehicle_id">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12 text-right">
							<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row setup-content" id="step-3">
			<div class="col-xs-12">
				<div class="col-md-12">
					<h3> Other Details</h3>
					<div class="row form-group">
						<div class="col-md-6">
							<label class="control-label">Service type</label>
							<select class="form-control" name="service_id">
								<option value="">SELECT SERVICE TYPE</option>
								<?php foreach ($service_list as $service) { ?>
									<option value="<?= $service['service_id'] ?>">   <?= $service['description'] ?>     </option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-6">
							<label class="control-label">Receipt description</label>
							<input maxlength="100" type="text" name="description"  class="form-control"  />
						</div>
						<div class="col-md-6">
							<label class="control-label">Delivery date</label>
							<input type="date" class="form-control" name="delivery_date" />
						</div>
						<div class="col-md-6">
							Receipt Status
							<select class="form-control" id="receipt_status" name="receipt_status">
								<option value="1">ACTIVE</option>
								<option value="0">INACTIVE</option>
							</select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12 text-right">
							<button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<script>
	var action = "Create"
	var module = "Receipt";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "created";

	var searchtext = document.getElementById("button_nic")
	function search_customer_by_nic() {
		$.ajax({
			url: "<?= base_url()?>index.php/ReceiptController/search_customer_by_nic",
			method: "get",
			data: {
				'searchtext': $('#inic').val()
			},
			success: function (result) {
				var obj = $.parseJSON(result);
				if (obj != null && obj.customer_name != null) {
					$('#customer_name').val(obj.customer_name);
					$('#nic').val(obj.nic);
					$('#address').val(obj.address);
					$('#mobile1').val(obj.mobile1);
					$('#mobile2').val(obj.mobile2);
					$('#cus_status').val(obj.status);
					$('#customer_status').val(1);
					$('#customer_id').val(obj.customer_id);
				}else{
					$('#customer_name').val("");
					$('#address').val("");
					$('#mobile1').val("");
					$('#mobile2').val("");
					$('#cus_status').val("");
					$('#customer_status').val(0);
					$('#customer_id').val("");


				}
			}
		});
	}
	searchtext.onclick = search_customer_by_nic;







	var searchreg = document.getElementById("button_reg")
	function search_vehicle_by_reg() {
		$.ajax({
			url: "<?= base_url()?>index.php/ReceiptController/search_vehicle_by_reg",
			method: "get",
			data: {
				'searchreg': $('#reg_no').val()
			},
			success: function (veh_result) {
				var objs = $.parseJSON(veh_result);
				if (objs.reg_no != null) {
					$('#vehicle_id').val(objs.vehicle_id);
					$('#reg_no').val(objs.reg_no);
					$('#model_name').val(objs.model_name);
					$('#model_id').val(objs.model_id);
					$('#company_id').val(objs.company_id);
					$('#model_status').val(objs.status);
					$('#vehicle_status').val(1);
				}else{
					$('#vehicle_id').val(objs.vehicle_id);
					$('#model_name').val(objs.model_name);
					$('#model_id').val(objs.model_id);
					$('#company_id').val(objs.company_id);
					$('#model_status').val(objs.status);
					$('#vehicle_status').val(0);
				}
			}
		});
	}
	searchreg.onclick = search_vehicle_by_reg;






</script>
