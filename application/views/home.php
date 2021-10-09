<link rel="stylesheet" href="<?= base_url() ?>libraries/css/other.css">


<style>
	.list-group-item {
		position: relative;
		display: block;
		padding: 10px 15px;
		margin-bottom: -1px;
		background-color: #fff;
		border: 1px solid #ddd;
	}
	a.list-group-item {
		color: #555;
	}
	a {
		color: #337ab7;
		text-decoration: none;
	}
	.quick {
		font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
		font-size: 14px;
		line-height: 1.42857143;
		color: #333;
		background-color: #fff;
	}

	#table-wrapper {
		height: 200px;
		overflow: auto;
	}

	table {
		max-height: 200px;
		text-align: left;
		border-collapse: collapse;
	}
	table > tbody > tr {
		font-size: 14px;
		color: #474747;
		background-color: #E2E2E2;
	}

	table > tbody > tr > th {padding: 5px 10px;}
	table > tbody > tr > th:nth-child(1),
	table > tbody > tr > th:nth-child(2) {border-right: 1px solid #717171;}
	table > tbody > tr > td {padding:2px 5px 2px 10px;}
</style>

<div class="row">
	<div class="col-lg-3 col-6">
		<div class="small-box bg-info">
			<div class="inner">
				<h3><?= count($booking_list);?></h3>

				<p>New Orders</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="<?= base_url() ?>index.php/BookingController/booking_list">More info
				<i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3><?= count($customer_list);?><sup style="font-size: 20px"></sup></h3>

				<p> Customers</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="<?= base_url() ?>index.php/StaffController/index">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->



	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3><?= count($user_list);?></h3>

				<p>User Registrations</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="<?= base_url() ?>index.php/UserController/index">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<?php
				$grand_total = 0;
				foreach ($invoice_list as $invoice) {
					$grand_total += $invoice['total_price'];
				}?>
				<h3>LKR.<?= $grand_total?></h3>

				<p>Total income</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="<?= base_url() ?>index.php/ReportController/invoice_summery">More info <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>



<div class="row">
	<div class="col-md-6">
		<h3><u><center><font color="black"> Customer Query</font></center></u></h3>
	</div>
</div>
<div id="table-wrapper">

	<table id="process-manager-table" class="table table-bordered small" style="margin-top: 1%">
		<thead>
		<tr>
			<th class="text-center" width="10"><font color="black">CONTACT ID</font></th>
			<th width="100"><font color="black">CONTACT NAME</font></th>
			<th width="50"><font color="black">CONTACT MOBILE</font></th>
			<th width="50"><font color="black">CONTACT EMAIL</font></th>
			<th width="50"><font color="black">CONTACT MESSAGE</font></th>
			<th class="text-center" width="50"><font color="black">REPLY</font></th>
			<th class="text-center" width="50"><font color="black">ACTION</font></th>

		</tr>
		</thead>
		<tbody>
		<?php foreach ($contact_list as $contact) { ?>
		<tr>
			<td class="text-center"><?= $contact['contact_id'] ?></td>
			<td class="text-center" width="50"><?= $contact['contact_name'] ?></td>
			<td><?= $contact['contact_mobile'] ?></td>
			<td class="text-center" width="50"><?= $contact['contact_email'] ?></td>
			<td class="text-center" width="50"><?= $contact['contact_message'] ?></td>
			<td class="text-center"><?= $contact['reply'] ?></td>
			<td class="text-center">
				<a href="<?= base_url() ?>index.php/DashboardController/reply?id=<?= $contact['contact_id'] ?>">
					Reply</a></td>


		</tr>
		<?php } ?>
		</tbody>
	</table>
</div>

