<title>PO | 1212121</title>
<!--<link rel="stylesheet" type="text/css" href="--><?//= base_url() ?><!--libraries/css/bootstrap.min.css"/>-->
<style>
	.meta_data {
		width: 100%;
		margin-left: 2%;
		margin-right: 2%;
	}

	.meta_data td {
		width: 33%;
		padding-top: 5px;
	}

	@media print {
		.user_created {
			font-style: italic;
			font-size: 10px;
			width: 100%;
			visibility: visible;
			text-align: center;
			margin-top: 10px;
		}
		.red {
			color: #ff0017 !important;
		}
		.signatures {
			font-style: italic;
			font-size: 10px;
			width: 100%;
			visibility: visible;
			text-align: center;
			margin-top: 45px;
		}
		#porder{
			width: 100%;
			margin: auto;
			-webkit-print-color-adjust: exact;
			background-color: rgba(12, 10, 10, 0.48) !important;
			color: white !important;
		}
		#poheader{
			color: #ffffff !important;
			text-align: right !important;
		}
	}

	@media screen {
		.signatures {
			visibility: hidden;
		}
	}
</style>

<div class="row">
	<div class="col-sm-12 text-right" style="padding:10px; margin-right: 1%">
		<img title="print" src="<?= base_url() ?>/libraries/images/print.png" style="width:30px;"
			 onclick="print()"/>
	</div>
</div>

<div class="container-fluid" id="po">
	<table class="table">
		<tr>
			<td colspan="9"></td>
			<td style="text-align: right !important; padding-top: 20px" id="porder">
				<h3 id="poheader" style="text-transform: uppercase;">
					GRN</h3>
			</td>
		</tr>
	</table>

	<table border="0" style="margin-bottom:-25px;margin-top:1px" class="table">
		<tr>
			<td rowspan="2" style="padding-top: 14px; padding: 20px">
				<img height="70" width="350" src="<?= base_url() ?>libraries/images/logo.png" alt="logo"><br>
				<h6>SASHINTHA SERVICE CENTER</h6>
				<h6 style="font-size: 11px"> Imaduwa Rd, Ahangama</h6>
				<h6>GRN No: <?= $grn[0]['grn_id'] ?></h6>
			</td>
		</tr>
		<tr>
			<td style="padding: 20px">
				<h5 style="font-size: 10px;text-align:end; text-transform: uppercase;"><b>P.O. <?= $grn[0]['grn_id'] ?></b></h5>
				<h5 style="font-size: 10px;text-align:end;"><b>DATE: </b>12121</h5>
				<h5 style="font-size: 10px;text-align:end;"><b>DUE DATE: </b>12121</h5>
			</td>
		</tr>
	</table>
	<hr>
	<div style="max-width: 100%;margin: auto" class="row form-horizontal small">
		<table class="table">
			<tr>
				<td style="text-align: center">
					<div class="small"><label class="control-label">SUPPLIER: </label></div>
				</td>
				<td style="text-align: center">
					<div class="small"><label class="control-label">COMPANY: </label></div>
				</td>

			</tr>
		</table>
		<table style="width: 100%">
			<tr>
				<td>
					<table class="table table-striped ">
						<tr>
							<td>
								<table style="width: 100%">
									<tr>
										<td class="text-right"><b>NAME : </b></td>
										<td style="padding-left: 10px"> <?= $grn[0]['supplier_name'] ?> </td>
									</tr>
									<tr>
										<td class="text-right" style="padding-top: 10px"><b>ADDRESS :</b></td>
										<td style="padding-top: 10px;padding-left: 10px"> <?= $grn[0]['address'] ?></td>
									</tr>

									<tr>
										<td class="text-right" style="padding-top: 10px"><b>CONTACT PERSON :</b></td>
										<td style="padding-top: 10px;padding-left: 10px"><?= $grn[0]['contact_person'] ?></td>
									</tr>

									<tr>
										<td class="text-right" style="padding-top: 10px"><b>TELEPHONE :</b></td>
										<td style="padding-top: 10px; padding-left: 10px"><?= $grn[0]['mobile1'] ?></td>
									</tr>
									<tr>
										<td class="text-right" style="padding-top: 10px"></td>
										<td style="padding-top: 10px;padding-left: 10px"><?= $grn[0]['mobile2'] ?></td>
									</tr>
									<tr>
										<td class="text-right" style="padding-top: 10px"><b>EMAIL :</b></td>
										<td style="padding-top: 10px;padding-left: 10px"><?= $grn[0]['email'] ?></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
				<td>
					<table class="table table-striped ">
							<tr>
								<td>
									<table style="width: 100%">
										<tr>
											<td class="text-right"><b>NAME : </b></td>
											<td style="padding-left: 10px"> SASHINTHA service center </td>
										</tr>
										<tr>
											<td class="text-right" style="padding-top: 10px"><b>ADDRESS :</b></td>
											<td style="padding-top: 10px;padding-left: 10px"> asasas</td>
										</tr>
										<tr>
											<td class="text-right" style="padding-top: 10px"><b>CONTACT PERSON :</b></td>
											<td style="padding-top: 10px;padding-left: 10px">Niroshan</td>
										</tr>
										<tr>
											<td class="text-right" style="padding-top: 10px"><b>TELEPHONE :</b></td>
											<td style="padding-top: 10px; padding-left: 10px">076-6449757</td>
										</tr>
										<tr>
											<td></td>
											<td style="padding-left: 10px">077-9475698</td>
										</tr>
										<tr>
											<td class="text-right" style="padding-top: 10px"><b>EMAIL :</b></td>
											<td style="padding-top: 10px;padding-left: 10px">sashinthaservice@gmail.com</td>
										</tr>
									</table>
								</td>
							</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
	<clearfix></clearfix>
	<table class="table table-striped small table-condensed table-bordered" style="font-size: 9.5px">
		<tr>
			<th>ITEM CODE</th>
			<th>BARCODE</th>
			<th>ITEM NAME</th>
			<th class="text-right">UNIT CP</th>
			<th class="text-right">QTY</th>
			<th class="text-right">TOTAL CP</th>
		</tr>
		<?php
		$grand_total = 0;
		foreach ($grn as $grn) { $total=$grn['cost_price']*$grn['qty']; $grand_total+=$total?>
		<tr>
			<th><?= $grn['item_code'] ?></th>
			<th><?= $grn['barcode'] ?></th>
			<th><?= $grn['description'] ?></th>
			<th><?= $grn['cost_price'] ?></th>
			<th><?= $grn['qty'] ?></th>
			<th><?= $total ?></th>

		</tr>
		<?php } ?>
		<tr>
			<td colspan="5">Total</td>
			<td>Rs.<?= $grand_total?></td>
		</tr>
		<!--        foreach here-->
	</table>
<div>
	<div class="col-xs-7">
		<div class="panel">
			<div class="panel-body">
				<p style="font-style: italic;font-size: 10px">1. Please bring receipt to receive your car.</p>
				<p style="font-style: italic;font-size: 10px">2. Send all correspondence to :  Imaduwa Rd, Ahangama</p>
			</div>
		</div>
	</div>
	<div style="font-style: italic;font-size: 10px" class="col-xs-5">
		<label class="control-label">Notes</label>
		<div class="card small">
			<div class="card-body">
				<p></p>
			</div>
		</div>
		<div>
		</div>
		<?php if (1==1) { ?>
			<table class="table user_created">
				<tr>
					<td style="font-style: italic;font-size: 10px">Created By : test</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td class="text-right" style="text-align:right;font-style: italic;font-size: 10px">Approved By : test</td>
				</tr>
			</table>
			<table class="signatures">
				<tr>
					<td>-------------------------------------------------------</td>
				</tr>
				<tr>
					<td>Authorized</td>
				</tr>
			</table>
		<?php } else { ?>
			<table class="user_created">
				<tr>
					<td style="font-style: italic;font-size: 10px">Created By : test</td>
				</tr>
			</table>
			<h6 style="color: #ff0017" class="user_created red">This document is not valid until approved by the Purchasing Department of Best Life International (Pvt) Ltd.</h6>
		<?php } ?>
	</div>
</div>
<hr>

</div>

<style>
	#printOnly {
		display: none;
	}

	@media print {
		#printOnly {
			display: block;
		}
	}
</style>

<script>
	function print() {
		$.print("#po");

		// var divToPrint=document.getElementById('po');
		//
		// var newWin=window.open('','Print-Window');
		//
		// newWin.document.open();
		//
		// newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
		//
		// newWin.document.close();
		//
		// setTimeout(function(){newWin.close();},10);
	}
</script>
