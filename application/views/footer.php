</div>
<!-- /.container-fluid-->

</div>
<!-- /.content-wrapper-->

<footer class="sticky-footer" style="position:">
	<div class="container">
		<div class="text-center row">
			<div class="col-md-6">
				<img src="<?= base_url() ?>libraries/images/logo_11.png" width="60%" height="50%">
			</div>
			<div class="col-md-6">
				<i class="fa fa-map-marker" aria-hidden="true"></i>
				<small  50px">Sashintha Service Center,Eluketiya,Ahangama</small>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<i class="fa fa-phone" aria-hidden="true"></i>
				<small  50px">076-6449757</small>

			</div>
		</div>
	</div>




</footer>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fa fa-angle-up"></i>
</a>
<script src="<?= base_url() ?>libraries/js/select2.full.min.js"></script>

<script src="<?= base_url() ?>libraries/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>libraries/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url() ?>libraries/js/sb-admin.min.js"></script>
<script src="<?= base_url() ?>libraries/js/Chart.min.js"></script>
<script src="<?= base_url() ?>libraries/js/spark.js"></script>
<script src="<?= base_url() ?>libraries/js/map1.js"></script>
<script src="<?= base_url() ?>libraries/js/map2.js"></script>
<script src="<?= base_url() ?>libraries/js/jquery.knob.min.js"></script>
<script src="<?= base_url() ?>libraries/js/moment.min.js"></script>
<script src="<?= base_url() ?>libraries/js/date.js"></script>
<script src="<?= base_url() ?>libraries/js/sss.js"></script>
<script src="<?= base_url() ?>libraries/js/note.js"></script>
<script src="<?= base_url() ?>libraries/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url() ?>libraries/js/new.js"></script>
<script src="<?= base_url() ?>libraries/js/dashboard.js"></script>
<script src="<?= base_url() ?>libraries/js/demo.js"></script>

<script>
	$(document).ready(function () {
		$('#form').submit(function (event) {
			event.preventDefault();
			sweet_alert();
		});
	});

	function sweet_alert() {
		swal({
			title: action + " " + module,
			text: "Are you sure?",
			type: "question",
			showCancelButton: true,
			confirmButtonColor: "#00c853",
			cancelButtonColor: "#e53935",
			confirmButtonText: '<i class="fa fa-plus-circle"></i> ' + action,
			cancelButtonText: '<i class="fa fa-times-circle"></i> Close',
			animation: true,
			buttonsStyling: true
		}).then(function (isConfirm) {
			if (isConfirm) {
				swal({
					title: action_progress + " " + module,
					text: "Please stand by until the " + module + " is being " + action_past + "..",
					type: type,
					timer: 2000,
					onOpen: function () {
						swal.showLoading()
					}
				}).then(
					function () {
					},
					function (dismiss) {
						if (dismiss === 'timer') {
							var myForm = document.getElementById("form");
							setTimeout(function () {
								myForm.submit();
							}, 1000);

							swal("Successful!", module + " has been " + action_past, "success");
							setTimeout(function () {
							}, 1000);
						}
					}
				)
			} else {
				swal("Cancelled", "", "error");
			}
		}, function (dismiss) {
			if (dismiss === 'cancel') {
				swal("Cancelled", "", "error");
			}
		})
	}
</script>
<script src="<?= base_url() ?>libraries/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>libraries/js/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>libraries/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>libraries/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>libraries/js/demo.js"></script>
<!-- page script -->
<script>
	$(function () {
		$("#example1").DataTable();
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
		});
	});
</script>

</body>

</html>

