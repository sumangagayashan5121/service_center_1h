<div class="card small">
	<div class="card-header form-group">
		<div class="col-sm-6">
			<h5 class="col-xs-12">Create Service card</h5>
		</div>
	</div>
	<div class="container-fluid" id="po">
	<form action="save_service_card" id="form" method="post">
		<div class="card-body">
			<div class="row form-group">
				<div class="col-md-6">
					 BOOKING NO
					<input type="text" class="form-control" name="booking_id" id="booking_id" onchange="search_booking_id()" required autocomplete="off">
				</div>
				<div class="col-md-6">
					Status
					<select class="form-control" id="service_card_status" name="status">
						<option value="1">ACTIVE</option>
						<option value="0">INACTIVE</option>
					</select>
				</div>
			</div>
				<br><br>
				<div class="row form-group">
					<div class="col-md-6">
					What are need to fix</div>
					<div class="col-md-12">

						<textarea id="reply" name="repair" rows="9" cols="200" required autocomplete="off"></textarea>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-6">
						Previous damages in the vahicle</div>
					<div class="col-md-12">

						<textarea id="reply" name="others" rows="9" cols="200" required autocomplete="off"></textarea>
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
</div>
<script>
	function print() {
		$.print("#po");

	}

	var action = "Create";
	var module = "Service Card";
	var type = "info";
	var action_progress = "Creating";
	var action_past = "Created";

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
</script>
