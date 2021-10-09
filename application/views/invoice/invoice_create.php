<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Create Invoice</h5>
		</div>
	</div>
	<form id="form" action="save_invoice" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					BOOKING ID <input type="text" id="booking_id" onchange="search_booking_id()" class="form-control" required name="booking_id" >
				</div>
				<!--				<div class="col-md-6">-->
				<!--					Vehicle ID <span id="user_name_result" style="color: red"></span>-->
				<!--					<input type="text" id="vehicle_id" class="form-control"-->
				<!--						   name="vehicle_id" readonly>-->
				<!--				</div>-->
				<!--				<div class="col-md-6">-->
				<!--					Customer ID-->
				<!--					<input type="text" class="form-control"  id="customer_id"-->
				<!--						   name="customer_id" readonly>-->
				<!--				</div>-->

			</div>
			<label>Minimal</label>


			<div class="container">
				<div class="row clearfix">
					<div class="col-md-12">
						<table class="table table-bordered table-hover" id="tab_logic">
							<thead>
							<tr>
								<th class="text-center"> #</th>
								<th class="text-center"> Product Code</th>
								<th class="text-center"> Product </th>
								<th class="text-center"> Qty </th>
								<th class="text-center"> Unit Price </th>
								<th class="text-center"> Total Price </th>
								<th class="text-center"> Action </th>
							</tr>
							</thead>
							<tbody>
							<tr id='addr0'>
								<td>1</td>
								<td><select class="form-control select2" required name="code_1" id="code_1" name='product_code[]' onchange="find_product(1)">

										<option value="">SELECT ITEM</option>
										<?php foreach ($item_list as $item) { ?><option   value="<?= $item['item_code'] ?>"><?= $item['item_code'] ?></option><?php } ?>
									</select>
								</td>
<!--								<td><input type="text" onkeyup="find_product(1)" id="code_1" name='product_code[]'  placeholder='Enter Product Code' class="form-control"/></td>-->

								<td><input type="number" onkeyup="qty(1)" id="qty_1" name='qty[]' placeholder='Qty' class="form-control qty" step="0" min="0"/></td>
								<td><input type="text" id="product_1" name='product[]'  placeholder='Product Name' class="form-control"/></td><td><input type="number" id="cost_price_1" name='cost_price[]' placeholder='Unit Cost Price' class="form-control cost_price" step="0.00" min="0"/></td>
								<td><input type="number" name='cost_total[]' placeholder='0.00' class="form-control cost_total" readonly/></td>
								<td><button onclick="delete_row(1)" class="pull-right btn btn-danger">Delete</button></td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="row clearfix">
						<div class="col-md-12">
							<button id="add_row" type="button" class="btn btn-success pull-left">Add Row</button>
						</div>
					</div>
					<div class="col-md-12" style="margin-top:20px">
						<table class="table table-bordered table-hover" id="tab_logic_1">
							<thead>
							<tr>
								<th class="text-center"> #</th>
								<th class="text-center"> Service Code</th>
								<th class="text-center"> Service </th>
								<th class="text-center"> Unit Price </th>
								<th class="text-center"> Total Price </th>
								<th class="text-center"> Action </th>
							</tr>
							</thead>
							<tbody>
							<tr id='add0'>
								<td>1</td>
								<td><input type="text" onkeyup="find_service(1)" id="cod_1" name='service_code[]'  placeholder='Enter service Code' class="form-control"/></td>
								<td><input type="text" id="service_1" name='service[]'  placeholder='Service Name' class="form-control"/></td>
								<td><input type="number" id="service_price_1" name='service_price[]' placeholder='Unit Service Price' class="form-control service_price" step="0.00" min="0"/></td>
								<td><input type="number" id="service_total_1" name='service_total[]' placeholder='0.00' class="form-control service_total" readonly/></td>
								<td><button onclick="delete_row1(1)" class="pull-right btn btn-danger">Delete</button></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-md-12">
						<button id="add_row_1" type="button" class="btn btn-success pull-left">Add Row</button>
					</div>
				</div>

				<div class="row clearfix" style="margin-top:20px">
					<div class="pull-right col-md-4">
						<table class="table table-bordered table-hover" id="tab_logic_cost_total">
							<tbody>
							<tr>
								<th class="text-center">Sub Cost Total</th>
								<td class="text-center"><input type="number" name='sub_cost_total' placeholder='0.00' class="form-control" id="sub_cost_total" readonly/></td>
							</tr>
							<tr>
								<th class="text-center">Cost Tax</th>
								<td class="text-center"><div class="input-group mb-2 mb-sm-0">
										<input type="number" class="form-control" id="cost_tax" placeholder="0">
										<div class="input-group-addon">%</div>
									</div></td>
							</tr>
							<tr>
								<th class="text-center">Tax Amount</th>
								<td class="text-center"><input type="number" name='tax_cost_amount' id="tax_cost_amount" placeholder='0.00' class="form-control" readonly/></td>
							</tr>
							<tr>
								<th class="text-center">Grand Cost Total</th>
								<td class="text-center"><input type="number" name='total_cost_amount' id="total_cost_amount" placeholder='0.00' class="form-control" readonly/></td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="pull-right col-md-4">
						<table class="table table-bordered table-hover" id="tab_logic_1_service_total">
							<tbody>
							<tr>
								<th class="text-center">Sub service Total</th>
								<td class="text-center"><input type="number" name='sub_service_total' placeholder='0.00' class="form-control" id="sub_service_total" readonly/></td>
							</tr>
							<tr>
								<th class="text-center">Service Tax</th>
								<td class="text-center"><div class="input-group mb-2 mb-sm-0">
										<input type="number" class="form-control" id="service_tax" placeholder="0">
										<div class="input-group-addon">%</div>
									</div></td>
							</tr>
							<tr>
								<th class="text-center">Tax Amount</th>
								<td class="text-center"><input type="number" name='tax_service_amount' id="tax_service_amount" placeholder='0.00' class="form-control" readonly/></td>
							</tr>
							<tr>
								<th class="text-center">Grand Cost Total</th>
								<td class="text-center"><input type="number" name='total_service_amount' id="total_service_amount" placeholder='0.00' class="form-control" readonly/></td>
								<input type="hidden" name='total_amount' id="total_amount">
							</tr>
							</tbody>
						</table>
					</div>
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
	$(document).ready(function(){
		var i=1;
		$("#add_row").click(function(){
			b=i-1;
			x = i+1;
			// $('#addr'+i).html($('#addr'+b).html()).find('td:last-child').html('<button onclick="delete_row('+i+')" class="pull-right btn btn-default">Delete</button>');

			$('#tab_logic').append('<tr id="addr'+(i)+'">' +
				'<td>'+x+'</td>\n' +
				'<td><select class="form-control" required name="code_'+x+'" id="code_'+x+'" name=\'product_code[]\' onchange="find_product('+x+')">' +
				'<option value="">SELECT ITEM</option>'+
				<?php foreach ($item_list as $item) { ?>
				'<option value="<?= $item[ "item_code"] ?>"> <?= $item["item_code"] ?> </option>'+
				<?php } ?>

				'</select></td>\n' +
				'<td><input type="number" onkeyup="qty('+x+')" id="qty_'+x+'" name="qty[]" placeholder="Qty" class="form-control qty" step="0" min="0"/></td>'+
			'<td><input type="text" id="product_'+x+'" name="product[]"  placeholder="Product Name" class="form-control"/></td>' +
				'<td><input type="number" id="cost_price_'+x+'" name="cost_price[]" placeholder="Unit Cost Price" class="form-control cost_price" step="0.00" min="0"/></td>' +
				' <td><input type="number" name="cost_total[]" placeholder="0.00" class="form-control cost_total" readonly/></td>' +
				'<td><button onclick="delete_row('+x+')" class="pull-right btn btn-danger">Delete</button></td></tr>');

			i++;
		});

		$('#tab_logic tbody').on('keyup change',function(){
			calc();
		});

		$('#cost_tax').on('keyup change',function(){
			calc_total();
		});


	});



	$(document).ready(function(){
		var i=1;
		$("#add_row_1").click(function(){
			b=i-1;
			x = i+1;
			// $('#add'+i).html($('#add'+b).html()).find('td:last-child').html('<button onclick="delete_row('+i+')" class="pull-right btn btn-default">Delete</button>');

			$('#tab_logic_1').append('<tr id="add'+(i)+'">' +
				'<td>'+x+'</td>\n' +
				'<td><input type="text"  onkeyup="find_service('+x+')" id="cod_'+x+'" name=\'service_code[]\'  placeholder=\'Enter service Code\' class="form-control"/></td>\n' +
				'<td><input type="text"  name=\'service[]\' id="service_'+x+'" placeholder=\'Service Name\' class="form-control"/></td>\n' +
				'<td><input onchange="calc_service()" type="number"id="service_price_'+x+'" name=\'service_price[]\' placeholder=\'Unit Service Price\' class="form-control service_price" step="0.00" min="0"/></td>\n' +
				'<td><input type="number" id="service_total_'+x+'" name=\'service_total[]\' placeholder=\'0.00\' class="form-control service_total" readonly/></td>\n' +
				'<td><button onclick="delete_row1('+x+')" class="pull-right btn btn-danger">Delete</button></td></tr>');

			i++;
		});

		$('#tab_logic_1 tbody').on('keyup change',function(){
			calc_service();
		});

		$('#service_tax').on('keyup change',function(){
			calc_service_total();
		});


	});


	function calc_service()
	{
		$('#tab_logic_1 tbody tr').each(function(i, element) {
			var html = $(this).html();
			if(html!='')
			{
				var service_price = $(this).find('.service_price').val();
				$(this).find('.service_total').val(1*service_price);


				calc_service_total();
			}
		});
	}

	function calc_service_total()
	{
		service_total=0;
		$('.service_total').each(function() {
			service_total += parseInt($(this).val());
		});
		$('#sub_service_total').val(service_total.toFixed(2));
		tax_service_sum=service_total/100*$('#service_tax').val();
		$('#tax_service_amount').val(tax_service_sum.toFixed(2));
		$('#total_service_amount').val((tax_service_sum+service_total).toFixed(2));}


	function calc()
	{
		$('#tab_logic tbody tr').each(function(i, element) {
			var html = $(this).html();
			if(html!='')
			{
				var qty = $(this).find('.qty').val();
				var cost_price = $(this).find('.cost_price').val();
				$(this).find('.cost_total').val(qty*cost_price);


				calc_total();
			}
		});
	}

	function calc_total()
	{
		cost_total=0;
		$('.cost_total').each(function() {
			cost_total += parseInt($(this).val());
		});
		$('#sub_cost_total').val(cost_total.toFixed(2));
		tax_cost_sum=cost_total/100*$('#cost_tax').val();
		$('#tax_cost_amount').val(tax_cost_sum.toFixed(2));
		$('#total_cost_amount').val((tax_cost_sum+cost_total).toFixed(2));



	}
	var itemArray = [];
	function delete_row(i) {
		console.log(i);
		i = i-1;

		if(i>0){
			$("#addr"+(i)).html('');
			itemArray.pop(i);
		}
		calc();
	}
	var itemArray1 = [];
	function delete_row1(i) {
		console.log(i);
		i = i-1;

		if(i>0){
			$("#add"+(i)).html('');
			itemArray1.pop(i);
		}
		calc();
	}



	function find_product(i) {
		var code = document.getElementById("code_"+i);
		if($('#code_'+i).val() != null) {
			console.log($('#code_'+i).val())
			$.ajax({
				url: "<?= base_url()?>index.php/GrnController/validate_product",
				method: "get",
				data: {
					'product': $('#code_'+i).val()
				},
				success: function (result) {
					var obj = $.parseJSON(result);
					var flag = true;
					console.log(obj[0])

					if (obj != null && obj.count > 0) {

						$.each(itemArray, function (i, val) {

							console.log(val)
							if (val == obj[0].item_id){
								flag = false;
							}
						});

						if (flag){
							itemArray.push(obj[0].item_id);
							$('#product_'+i).val(obj[0].description);
							$('#cost_price_'+i).val(obj[0].selling_price);
							// $('#selling_price_'+i).val(obj[0].selling_price);
							code.setCustomValidity('');
						}else{
							// alert("item already added!")
						}

						console.log(itemArray);
					} else {
						$('#product_'+i).val('');
						itemArray.pop(i);
						code.setCustomValidity("Product doesn't  exists..");
					}
				}
			});
		}
	}



	function find_service(i) {
		var service = document.getElementById("cod_"+i);
		console.log($('#cod_'+i).val());
		if($('#cod_'+i).val() != null){
			$.ajax({
				url: "<?= base_url()?>index.php/InvoiceController/validate_service",
				method: "get",
				data: {
					'service': $('#cod_'+i).val()

				},
				success: function (result) {
					var obj = $.parseJSON(result);
					var flag = true;
					console.log(obj[0]);

					if (obj != null && obj.count > 0) {

						$.each(itemArray1, function (i, val) {

							console.log(val)
							if (val == obj[0].service_id){
								flag = false;
							}
						});

						if (flag){
							itemArray1.push(obj[0].service_id);
							$('#service_'+i).val(obj[0].description);
							$('#service_price_'+i).val(obj[0].service_price);
							$('#service_total_'+i).val(obj[0].selling_price);
							service.setCustomValidity('');
						}else{
							alert("item already added!")
						}

						console.log(itemArray1);
					} else {
						$('#cod_'+i).val('');
						itemArray1.pop(i);
						service.setCustomValidity("Product doesn't  exists..");
					}
				}
			});
		}
	}

	//function qty(i){
	//	// var code = document.getElementById("code_"+i);
	//	var qty = document.getElementById("qty_"+i);
	//	if($('#qty_'+i).val() != null){
	//		$.ajax({
	//			url: "<?//= base_url()?>//index.php/GrnController/validate_product",
	//			method: "get",
	//			data: {
	//				'product': $('#code_'+i).val()
	//			},
	//			success: function (result) {
	//				var obj = $.parseJSON(result);
	//				// var flag = true;
	//				$new_qty=$('#qty_'+i).val()
	//				$qty=obj[0]['qty']
	//				console.log($new_qty)
	//				console.log($qty)
	//			if ($new_qty > $qty) {
	//				qty.setCustomValidity('Item is not enough');
	//				}
	//				}
	//			});
	//		}
	//	}

	$(document).ready(function() {
		$(window).keydown(function(event){
			if(event.keyCode == 13) {
				event.preventDefault();
				return false;
			}
		});
	});
	var booking_id = document.getElementById("booking_id");

	function search_booking_id() {
		var booking_id = document.getElementById("booking_id");
		console.log(booking_id);
		$.ajax({
			url: "<?= base_url()?>index.php/PerformerinvoiceController/validate_booking_id",
			method: "get",
			data: {
				'booking_id': $('#booking_id').val()

			},
			success: function (result) {
				var obj = $.parseJSON(result);
				console.log(obj);
				if (obj > 0) {
					booking_id.setCustomValidity('');
				} else {
					booking_id.setCustomValidity('Booking no doesn\'t exists..');
				}
			}
		});
	}



	var action = "Create"
	var module = "Invoice";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "created";




</script>
<script>
	$(function () {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})


	})
</script>
