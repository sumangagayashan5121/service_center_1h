<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Service Center</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/sweetalert2.min.css">
	<link rel="stylesheet" type="text/css"
		  href="<?= base_url() ?>libraries/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/vendor/datatables/dataTables.bootstrap4.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>libraries/css/sb-admin.css">

	<link rel="stylesheet" href="<?= base_url() ?>libraries/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>libraries/css/select2-bootstrap4.min.css">












	<script src="<?= base_url() ?>libraries/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url() ?>libraries/js/sweetalert2.min.js"></script>
	<script src="<?= base_url() ?>libraries/js/jQuery.print.js"></script>
	<style>
		.s {
			border-radius: 50%;
		}
	</style>
<!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->

	<script src="<?= base_url() ?>libraries/js/bootstrap.min.js"></script>
<!--	<script src="--><?//= base_url() ?><!--libraries/vendor/jquery/jquery-3.2.1.min.js"></script>-->

	<style>
		.sidenav-second-level {
			background-color: rgba(2, 1, 1, 0.13) !important;
		}
		.sidenav-third-level {
			background-color: rgba(0, 0, 0, 0.16) !important;
		}
		.navbar{
			background-color: #7f5185 !important;
		}
		.navbar-nav {
			background-color: #7f5185 !important;
		}
		#mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item > .nav-link {
			color: white; !important;
		}
		#mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-second-level > li > a, #mainNav.navbar-dark .navbar-collapse .navbar-sidenav > .nav-item .sidenav-third-level > li > a {
			color: rgba(227,227,227,1);
		}
		.navbar-dark .navbar-nav .nav-link {
			color: white; !important;
		}
	</style>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top" style="color: rgba(6,6,6,0.74)">

<!-- navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
	<a class="navbar-brand" href="<?= base_url() ?>index.php/LoginController/home">
		<img src="<?= base_url()?>libraries/images/ssssssss.png" width="13%"><span style="margin-left: 7px">Service Center</span></a>
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
			data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
			aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarResponsive">
		<ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="overflow: auto">
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
				<a class="nav-link" href="<?= base_url() ?>index.php/LoginController/home">
					<i class="fa fa-fw fa-home"></i>
					<span class="nav-link-text">Dashboard</span>
				</a>
			</li>

			<!--			receipt-->
<!--			<li class="nav-item" data-toggle="tooltip" data-placement="right">-->
<!--				<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseReceipt"-->
<!--				   data-parent="#exampleAccordion">-->
<!--					<i class="fa fa-fw fa-user"></i>-->
<!--					<span class="nav-link-text">Receipt</span>-->
<!--				</a>-->
<!--				<ul class="sidenav-second-level collapse" id="collapseReceipt">-->
<!--					<li>-->
<!--						<a href="--><?//= base_url() ?><!--index.php/ReceiptController/create_receipt">create</a>-->
<!--						<a href="--><?//= base_url() ?><!--index.php/ReceiptController/index">list</a>-->
<!---->
<!--					</li>-->
<!--				</ul>-->
<!--			</li>-->
			<!--			end receipt-->
			<!--			receipt-->
			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseBooking"
				   data-parent="#exampleAccordion">
					<i class="fa fa-fw fa-user"></i>
					<span class="nav-link-text">Booking</span>
				</a>
				<ul class="sidenav-second-level collapse" id="collapseBooking">
					<li>
						<a href="<?= base_url() ?>index.php/BookingController/create_holiday">add holidays</a>
						<a href="<?= base_url() ?>index.php/BookingController/holiday_list">holiday list</a>
						<a href="<?= base_url() ?>index.php/LoginController/booking">create</a>
						<a href="<?= base_url() ?>index.php/BookingController/booking_list">list</a>

					</li>
				</ul>
			</li>
			<!--			end receipt-->
			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseServicecard"
				   data-parent="#exampleAccordion">
					<i class="fa fa-fw fa-user"></i>
					<span class="nav-link-text">Service Card</span>
				</a>
				<ul class="sidenav-second-level collapse" id="collapseServicecard">
					<li>
						<a href="<?= base_url() ?>index.php/ServicecardController/create_service_card">create</a>
						<a href="<?= base_url() ?>index.php/ServicecardController/get_service_card_list">list</a>

					</li>
				</ul>
			</li>
			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePerformerinvoice"
				   data-parent="#exampleAccordion">
					<i class="fa fa-fw fa-user"></i>
					<span class="nav-link-text">Performer Invoice</span>
				</a>
				<ul class="sidenav-second-level collapse" id="collapsePerformerinvoice">
					<li>
						<a href="<?= base_url() ?>index.php/PerformerinvoiceController/create_performer_invoice">create</a>
						<a href="<?= base_url() ?>index.php/PerformerinvoiceController/get_performer_invoice_list">list</a>

					</li>
				</ul>
			</li>

			<!--			invoice-->
			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseInvoice"
				   data-parent="#exampleAccordion">
					<i class="fa fa-fw fa-user"></i>
					<span class="nav-link-text">Invoice</span>
				</a>
				<ul class="sidenav-second-level collapse" id="collapseInvoice">
					<li>
						<a href="<?= base_url() ?>index.php/InvoiceController/invoice_create">create</a>
						<a href="<?= base_url() ?>index.php/InvoiceController/invoice_list">list</a>

					</li>
				</ul>
			</li>
			<!--			end receipt-->
			<!--			grn-->
			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseGRN"
				   data-parent="#exampleAccordion">
					<i class="fa fa-fw fa-bar-chart"></i>
					<span class="nav-link-text">Grn</span>
				</a>
				<ul class="sidenav-second-level collapse" id="collapseGRN">
					<li>
						<a href="<?= base_url() ?>index.php/GrnController/grn_create">create</a>
						<a href="<?= base_url() ?>index.php/GrnController/grn_list">list</a>
					</li>
				</ul>
			</li>
			<!--			grn-->






			<!--			organization-->
			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseOrganization"
				   data-parent="#exampleAccordion">
					<i class="fa fa-fw fa-cogs"></i>
					<span class="nav-link-text">Organization</span>
				</a>
				<ul class="sidenav-second-level collapse" id="collapseOrganization">
					<!--			user-->
					<li class="nav-item" data-toggle="tooltip" data-placement="right">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseUser"
						   data-parent="#exampleAccordion">
							<i class="fa fa-fw fa-user"></i>
							<span class="nav-link-text">User</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapseUser">
							<li>
								<a href="<?= base_url() ?>index.php/UserController/index">List</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/UserController/create_user">Create</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/UserController/edit_profile">Profile</a>
							</li>
						</ul>
					</li>
					<!--			end user-->

					<!--			customer-->
					<li class="nav-item" data-toggle="tooltip" data-placement="right">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCustomer"
						   data-parent="#exampleAccordion">
							<i class="fa fa-fw fa-user"></i>
							<span class="nav-link-text">Customer</span>
						</a>
						<ul class="sidenav-third-level collapse" id="collapseCustomer">
							<li>
								<a href="<?= base_url() ?>index.php/CustomerController/index">List</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/LoginController/sign_up">Create</a>
							</li>
						</ul>
					</li>
					<!--			end customer-->
					<li class="nav-item" data-toggle="tooltip" data-placement="right">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseStaff"
						   data-parent="#exampleAccordion">
							<i class="fa fa-fw fa-user"></i>
							<span class="nav-link-text">Staff</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapseStaff">
							<li>
								<a href="<?= base_url() ?>index.php/StaffController/index">list</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/StaffController/create_staff">create</a>
							</li>
						</ul>
					</li>


					<!--			item-->
					<li class="nav-item" data-toggle="tooltip" data-placement="right">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseItem"
						   data-parent="#exampleAccordion">
							<i class="fa fa-tags" aria-hidden="true"></i>
							<span class="nav-link-text">Item</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapseItem">
							<li>
								<a href="<?= base_url() ?>index.php/ItemController/index">List</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/ItemController/create_item">Create</a>
							</li>

						</ul>
					</li>
					<!--			end item-->

					<!--			supplier-->
					<li class="nav-item" data-toggle="tooltip" data-placement="right">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSupplier"
						   data-parent="#exampleAccordion">
							<i class="fa fa-fw fa-user"></i>
							<span class="nav-link-text">Supplier</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapseSupplier">
							<li>
								<a href="<?= base_url() ?>index.php/SupplierController/index">List</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/SupplierController/create_supplier">Create</a>
							</li>
						</ul>
					</li>
					<!--			end supplier-->

					<!--			category-->
					<li class="nav-item" data-toggle="tooltip" data-placement="right">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsecategory"
						   data-parent="#exampleAccordion">
							<i class="fa fa-bars" aria-hidden="true"></i>
							<span class="nav-link-text">Category</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapsecategory">
							<li>
								<a href="<?= base_url() ?>index.php/CategoryController/index">List</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/CategoryController/create_category">Create</a>
							</li>
						</ul>
					</li>
					<!--			end category-->

					<!--			company-->
					<li class="nav-item" data-toggle="tooltip" data-placement="right">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsecompany"
						   data-parent="#exampleAccordion">
							<i class="fa fa-building" aria-hidden="true"></i>
							<span class="nav-link-text">Company</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapsecompany">
							<li>
								<a href="<?= base_url() ?>index.php/CompanyController/index">List</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/CompanyController/create_company">Create</a>
							</li>
						</ul>
					</li>
					<!--			end company-->

					<!--			model-->
					<li class="nav-item" data-toggle="tooltip" data-placement="right">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsemodel"
						   data-parent="#exampleAccordion">
							<i class="fa fa-cog" aria-hidden="true"></i>
							<span class="nav-link-text">Model</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapsemodel">
							<li>
								<a href="<?= base_url() ?>index.php/ModelController/index">List</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/ModelController/create_model">Create</a>
							</li>
						</ul>
					</li>
					<!--			end model-->

					<!--			vehicle-->
					<li class="nav-item" data-toggle="tooltip" data-placement="right">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsevehicle"
						   data-parent="#exampleAccordion">
							<i class="fa fa-car" aria-hidden="true"></i>
							<span class="nav-link-text">Vehicle</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapsevehicle">
							<li>
								<a href="<?= base_url() ?>index.php/VehicleController/index">List</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/VehicleController/create_vehicle">Create</a>
							</li>

						</ul>
					</li>
					<!--			end vehicle-->

					<!--			service-->
					<li class="nav-item" data-toggle="tooltip" data-placement="right">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseservice"
						   data-parent="#exampleAccordion">
							<i class="fa fa-car" aria-hidden="true"></i>
							<span class="nav-link-text">Service</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapseservice">
							<li>
								<a href="<?= base_url() ?>index.php/ServiceController/index">List</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/ServiceController/create_service">Create</a>
							</li>
						</ul>
					</li>
					<!--			end vehicle-->
					<li class="nav-item" data-toggle="tooltip" data-placement="right">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePromo"
						   data-parent="#exampleAccordion">
							<i class="fa fa-exclamation" aria-hidden="true"></i>
							<span class="nav-link-text">Promotion</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapsePromo">
							<li>
								<a href="<?= base_url() ?>index.php/DashboardController/promotion_create">create</a>

							</li>
							<li>
								<a href="<?= base_url() ?>index.php/DashboardController/promotion_list">list</a>

							</li>
						</ul>
					</li>


					<!--			time-->
					<li class="nav-item" data-toggle="tooltip" data-placement="right">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsetime"
						   data-parent="#exampleAccordion">
							<i class="fa fa-clock-o" aria-hidden="true"></i>

							<span class="nav-link-text">Time</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapsetime">
							<li>
								<a href="<?= base_url() ?>index.php/TimeController/index">List</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/TimeController/create_time">Create</a>
							</li>
						</ul>
					</li>
					<!--			end vehicle-->



				</ul>
			</li>


			<!--			settings-->
			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSettings"
				   data-parent="#exampleAccordion">
					<i class="fa fa-fw fa-cogs"></i>
					<span class="nav-link-text">Settings</span>
				</a>
				<ul class="sidenav-second-level collapse" id="collapseSettings">
					<li>
						<a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseRoleSub">Role</a>
						<ul class="sidenav-third-level collapse" id="collapseRoleSub">
							<li>
								<a href="<?= base_url() ?>index.php/RoleController/index">List</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/RoleController/create_role">Create</a>
							</li>
						</ul>
					</li>
					<li>
						<a class="nav-link-collapse collapsed" data-toggle="collapse"
						   href="#collapseModuleSub">Module</a>
						<ul class="sidenav-third-level collapse" id="collapseModuleSub">
							<li>
								<a href="<?= base_url() ?>index.php/ModuleController/index">List</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/ModuleController/create_module">Create</a>
							</li>
						</ul>
					</li>
					<li>
						<a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePermissionSub">Permission</a>
						<ul class="sidenav-third-level collapse" id="collapsePermissionSub">
							<li>
								<a href="<?= base_url() ?>index.php/PermissionController/index">List</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/PermissionController/assign">Assign</a>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<!--			end settings-->

			<!--			reports-->
			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseReport"
				   data-parent="#exampleAccordion">
					<i class="fa fa-fw fa-cogs"></i>
					<span class="nav-link-text">Report</span>
				</a>
				<ul class="sidenav-second-level collapse" id="collapseReport">
					<li>
						<a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseBookingReport">Booking</a>
						<ul class="sidenav-third-level collapse" id="collapseBookingReport">
							<li>
								<a href="<?= base_url() ?>index.php/ReportController/booking_summery">Summery</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/ReportController/booking_detail">Details</a>
							</li>
						</ul>
					</li>
<!--					<li>-->
<!--						<a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseRecieptReport">Receipt</a>-->
<!--						<ul class="sidenav-third-level collapse" id="collapseRecieptReport">-->
<!--							<li>-->
<!--								<a href="--><?//= base_url() ?><!--index.php/ReportController/receipt_summery">Summery</a>-->
<!--							</li>-->
<!--							<li>-->
<!--								<a href="--><?//= base_url() ?><!--index.php/ReportController/receipt_detail">Details</a>-->
<!--							</li>-->
<!--						</ul>-->
<!--					</li>-->
					<li>
						<a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseInvoiceReport">Invoice</a>
						<ul class="sidenav-third-level collapse" id="collapseInvoiceReport">
							<li>
								<a href="<?= base_url() ?>index.php/ReportController/invoice_summery">Summery</a>
							</li>
							<li>
								<a href="<?= base_url() ?>index.php/ReportController/invoice_detail">Details</a>
							</li>
						</ul>
					</li>
					<li>
						<a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapsegrnReport">Grn</a>
						<ul class="sidenav-third-level collapse" id="collapsegrnReport">
														<li>
															<a href="<?= base_url() ?>index.php/ReportController/grn_summery">Summery</a>
														</li>
							<li>
								<a href="<?= base_url() ?>index.php/ReportController/grn_detail">Details</a>
							</li>
						</ul>
					</li>
<!--					<li>-->
<!--						<a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAllReport">All</a>-->
<!--						<ul class="sidenav-third-level collapse" id="collapseAllReport">-->
<!--							<li>-->
<!--								<a href="--><?//= base_url() ?><!--index.php/ReportController/get_invoice_grn">Summery</a>-->
<!--							</li>-->
<!---->
<!--						</ul>-->
<!--					</li>-->
				</ul>
			</li>
			<!--			invoice-->
			<li class="nav-item" data-toggle="tooltip" data-placement="right">
				<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseContact"
				   data-parent="#exampleAccordion">
					<i class="fa fa-fw fa-user"></i>
					<span class="nav-link-text">Contact</span>
				</a>
				<ul class="sidenav-second-level collapse" id="collapseContact">
					<li>
						<a href="<?= base_url() ?>index.php/DashboardController/index_all">list</a>

					</li>
				</ul>
			</li>

			<!--			end receipt-->

<!--			<li class="nav-item" data-toggle="tooltip" data-placement="right">-->
<!--				<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseprofit"-->
<!--				   data-parent="#exampleAccordion">-->
<!--					<i class="fa fa-fw fa-user"></i>-->
<!--					<span class="nav-link-text">Profit</span>-->
<!--				</a>-->
<!--				<ul class="sidenav-second-level collapse" id="collapseprofit">-->
<!--					<li>-->
<!--						<a href="--><?//= base_url() ?><!--index.php/ReportController/get_invoice_grn_month">list</a>-->
<!--					</li>-->
<!---->
<!--				</ul>-->
<!--			</li>-->
			<!--			reports-->

		</ul>

		<ul class="navbar-nav sidenav-toggler">
			<li class="nav-item">
				<a class="nav-link text-center" id="sidenavToggler">
					<i class="fa fa-fw fa-angle-left"></i>
				</a>
			</li>
		</ul>

		<!--		user profile-->

		<ul  class="navbar-nav ml-auto">

			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown"
				   aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-fw fa-user"></i>
					<span class="indicator text-success d-none d-lg-block">
              				<i class="fa fa-fw fa-circle"></i>
					</span>
				</a>

				<div class="dropdown-menu" aria-labelledby="messagesDropdown">

					<a style="color:rgba(3,3,3,0.62);" class="dropdown-item" href="#">

<!--							<i style="font-size: 50px" class="fa fa-user-circle-o"></i>-->
						<center><img src="<?= base_url() ?>uploads/<?= $this->session->userdata('profile_photo');?>"  class="avatar" alt="Avatar" width="60%" height="50%" ></center>

						<div style="padding: 10px" class="dropdown-message small">
							<H6>
								<font color="#00008b">
							<table class="table table-striped small">
								<tr>
									<td>Email</td>
									<td><?= $this->session->userdata('email');?></td>
								</tr>
								<tr>
									<td>User Id</td>
									<td><?= $this->session->userdata('user_id');?></td>
								</tr>
								<tr>
									<td>First Name</td>
									<td><?= $this->session->userdata('first_name');?></td>
								</tr>
								<tr>
									<td>Last Name</td>
									<td><?= $this->session->userdata('last_name');?></td>
								</tr>
							</table>

								</font>
							</H6>
						</div>
					</a>
					<div class="dropdown-divider"></div>
					<div class="dropdown-divider"></div>
					<a style="color:rgba(3,3,3,0.62);" class="dropdown-item small" href="<?= base_url() ?>index.php/UserController/edit_profile"><font color="green">
							<H6>Update User Profile</H6></font></a>
						<div class="dropdown-divider"></div>
				</div>
			</li>

			<li class="nav-item">
				<form class="form-inline my-2 my-lg-0 mr-lg-2">
					<div class="input-group">
						<input class="form-control" type="text" placeholder="Search for...">
						<span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
					</div>
				</form>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url() ?>index.php/LoginController/logout">
					<i class="fa fa-fw fa-sign-out"></i>Logout</a>
			</li>


		</ul>
		<!--		end user profile-->

	</div>
</nav>
<!--end navigation-->


<div class="content-wrapper">
	<div class="container-fluid">

		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="<?= base_url() ?>index.php/LoginController/home">Dashboard</a>
			</li>
			<?php if (isset($module)) { ?>
				<li class="breadcrumb-item active"><?= $module ?></li>
			<?php } ?>
		</ol>

