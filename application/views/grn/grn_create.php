<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Create Grn</h5>
		</div>
	</div>
	<form id="form" action="save_grn" method="post">
		<div class="card-body">
			<div class="row form-group">

				<div class="col-md-6" required>
					Supplier
					<select class="form-control" required name="supplier_id">
						<option value="">SELECT SUPPLIER</option>
						<?php foreach ($supplier_list as $supplier) { ?><option value="<?= $supplier['supplier_id'] ?>"><?= $supplier['supplier_name'] ?> </option><?php } ?>
					</select>
				</div>
				<div class="col-md-6">
					Invoice No <span style="color: red">*</span>
					<input type="text" class="form-control" id="invoice_no" required name="invoice_no">
				</div>
			</div>

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
								<th class="text-center"> Cost Price </th>
								<th class="text-center"> Selling Price </th>
								<th class="text-center"> Cost Total </th>
								<th class="text-center"> Selling Total </th>
								<th class="text-center"> Action </th>
							</tr>
							</thead>
							<tbody>
							<tr id='addr0'>
								<td>1</td>
								<td><input type="text" onkeyup="find_product(1)" id="code_1" name='product_code[]'  placeholder='Enter Product Code' class="form-control"/></td>
								<td><input type="text" id="product_1" name='product[]'  placeholder='Product Name' class="form-control"/></td>
								<td><input type="number" name='qty[]' placeholder='Qty' class="form-control qty" step="0" min="0"/></td>
								<td><input type="number" id="cost_price_1" name='cost_price[]' placeholder='Unit Cost Price' class="form-control cost_price" step="0.00" min="0"/></td>
								<td><input type="number" id="selling_price_1" name='selling_price[]' placeholder='Unit Selling Price' class="form-control selling_price" step="0.00" min="0"/></td>
								<td><input type="number" name='cost_total[]' placeholder='0.00' class="form-control cost_total" readonly/></td>
								<td><input type="number" name='selling_total[]' placeholder='0.00' class="form-control selling_total" readonly/></td>
								<td><button type="button" onclick="delete_row(1)" class="pull-right btn btn-danger">Delete</button></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-md-12">
						<button id="add_row" type="button" class="btn btn-success pull-left">Add Row</button>
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
						<table class="table table-bordered table-hover" id="tab_logic_selling_total">
							<tbody>
							<tr>
								<th class="text-center">Sub Selling Total</th>
								<td class="text-center"><input type="number" name='sub_selling_total' placeholder='0.00' class="form-control" id="sub_selling_total" readonly/></td>
							</tr>
							<tr>
								<th class="text-center">Selling Tax</th>
								<td class="text-center"><div class="input-group mb-2 mb-sm-0">
										<input type="number" class="form-control" id="selling_tax" placeholder="0">
										<div class="input-group-addon">%</div>
									</div></td>
							</tr>
							<tr>
								<th class="text-center">Tax Amount</th>
								<td class="text-center"><input type="number" name='tax_selling_amount' id="tax_selling_amount" placeholder='0.00' class="form-control" readonly/></td>
							</tr>
							<tr>
								<th class="text-center">Grand Selling Total</th>
								<td class="text-center"><input type="number" name='total_selling_amount' id="total_selling_amount" placeholder='0.00' class="form-control" readonly/></td>
							</tr>
							</tbody>
						</table>
					</div>
					<div class="pull-right col-md-4">
						Ramarks
						<textarea id="remarks" rows="4" cols="50"></textarea>
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
				'<td><input type="text" onkeyup="find_product('+x+')" id="code_'+x+'" name=\'product_code[]\'  placeholder=\'Enter Product Code\' class="form-control"/></td>\n' +
				'<td><input type="text" name=\'product[]\' id="product_'+x+'" placeholder=\'Product Name\' class="form-control"/></td>\n' +
				'<td><input type="number" name=\'qty[]\' placeholder=\'Qty\' class="form-control qty" step="0" min="0"/></td>\n' +
				'<td><input type="number"id="cost_price_'+x+'" name=\'cost_price[]\' placeholder=\'Unit Cost Price\' class="form-control cost_price" step="0.00" min="0"/></td>\n' +
				'<td><input type="number"id="selling_price_'+x+'" name=\'selling_price[]\' placeholder=\'Unit Selling Price\' class="form-control selling_price" step="0.00" min="0"/></td>\n' +
				'<td><input type="number" name=\'cost_total[]\' placeholder=\'0.00\' class="form-control cost_total" readonly/></td>\n' +
				'<td><input type="number" name=\'selling_total[]\' placeholder=\'0.00\' class="form-control selling_total" readonly/></td>\n' +
				'<td><button type="button" onclick="delete_row('+x+')" class="pull-right btn btn-danger">Delete</button></td></tr>');

			i++;
		});

		$('#tab_logic tbody').on('keyup change',function(){
			calc();
		});

		$('#cost_tax').on('keyup change',function(){
			calc_total();
		});
		$('#selling_tax').on('keyup change',function(){
			calc_total();
		});

	});

	function calc()
	{
		$('#tab_logic tbody tr').each(function(i, element) {
			var html = $(this).html();
			if(html!='')
			{
				var qty = $(this).find('.qty').val();
				var cost_price = $(this).find('.cost_price').val();
				$(this).find('.cost_total').val(qty*cost_price);

				var qty = $(this).find('.qty').val();
				var selling_price = $(this).find('.selling_price').val();
				$(this).find('.selling_total').val(qty*selling_price);

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


		selling_total=0;
		$('.selling_total').each(function() {
			selling_total += parseInt($(this).val());
		});
		$('#sub_selling_total').val(selling_total.toFixed(2));
		tax_selling_sum=selling_total/100*$('#selling_tax').val();
		$('#tax_selling_amount').val(tax_selling_sum.toFixed(2));
		$('#total_selling_amount').val((tax_selling_sum+selling_total).toFixed(2));
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

	function find_product(i) {
		var code = document.getElementById("code_"+i);
		if($('#code_'+i).val() != null){
			$.ajax({
				url: "<?= base_url()?>index.php/GrnController/validate_product",
				method: "get",
				data: {
					'product': $('#code_'+i).val()
				},
				success: function (result) {
					var obj = $.parseJSON(result);
					var flag = true;
					console.log(obj[0].selling_price)

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
							$('#cost_price_'+i).val(obj[0].cost_price);
							$('#selling_price_'+i).val(obj[0].selling_price);
							code.setCustomValidity('');
						}else{
							alert("item already added!")
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

	var action = "Create"
	var module = "Grn";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "created";

	$(document).ready(function() {
		var itemArray = [];
		$(window).keydown(function(event){
			if(event.keyCode == 13) {
				event.preventDefault();
				return false;
			}
		});
	});

</script>
