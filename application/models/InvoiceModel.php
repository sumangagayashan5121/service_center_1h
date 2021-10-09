<?php


class InvoiceModel extends CI_Model
{
	public function get_booking($data)
	{
		$receipt_no = $data['booking_id'];
		$sql = "SELECT * FROM booking WHERE booking_id = ?";
		$result = $this->db->query($sql, $receipt_no)->row_array();
		return $result;
	}

	public function save_invoice($data, $sd){//$receipt,$invoice
		if (($sd['total_service_amount'] and $sd['total_cost_amount']) != 0) {
			$datas = $sd['total_cost_amount'] + $sd['total_service_amount'];
		} elseif ($sd['total_service_amount'] != 0) {
			$datas = $sd['total_service_amount'];
		} else {
			$datas = $sd['total_cost_amount'];
		}
		$invoice = array(
			'booking_id' => $data['booking_id'],
			'reg_no' => $data['reg_no'],
			'nic' => $data['nic'],
			'status' => 1,
			'created_date' => date('Y-m-d'),
			'created_user_id' => $this->session->userdata('user_id'),
			'total_price' => $datas,

		);
//						echo "<pre>";
//		print_r($invoice);
//		exit();
		$this->db->insert('invoice', $invoice);
		$invoice_id = $this->db->insert_id();
		return $invoice_id;
	}

	public function save_invoice_details($data)
	{
		for ($i = 0; $i < count($data['product_code']); $i++) {

			$item_detail = array(
				'item_created_date'=>date('Y-m-d'),
				'invoice_id' => $data['invoice_id'],
				'item_id' => $data['product_code'][$i],
				'price' => $data['cost_price'][$i],
				'qty' => $data['qty'][$i],
				'total_item_price' => $data['cost_total'][$i]
			);
			$this->db->insert('invoice_item_detail', $item_detail);
		}
		for ($i = 0; $i < count($data['service_code']); $i++) {

			$service_detail = array(
				'service_created_date'=>date('Y-m-d'),
				'invoice_id' => $data['invoice_id'],
				'service_id' => $data['service_code'][$i],
				'service_price' => $data['service_total'][$i]
			);


			$this->db->insert('invoice_service_detail', $service_detail);
		}

	}

	public function set_qty($data)
	{


		$total = count($data['product_code']);
//		echo "<pre>";
//		print_r($total);
//		exit();


		for ($i = 0; $i < $total; $i=$i+1) {

//			echo "<pre>";
//			print_r($data['product_code'][$i]);
//			exit();

			$item_id = $data['product_code'][$i];

			$qty = $data['qty'][$i];


			$sql = "SELECT qty FROM item WHERE item_id = ?";
			$item_qty = $this->db->query($sql, $item_id)->row_array();
			$st = $item_qty['qty'];

			$datac = $st - $qty;
			$data1 = array(
				'qty' => $datac
			);


			$this->db->where('item_id', $item_id);
			$this->db->update('item', $data1);
		}
	}


	public function get_invoice_details($invoice_id)
	{
		$sql = "SELECT * FROM invoice WHERE invoice_id = ?";
		$item_qty = $this->db->query($sql, $invoice_id)->result_array();
		$nic=$item_qty[0]['nic'];
		$sql = "SELECT * FROM customer WHERE nic = ?";
		$customer = $this->db->query($sql, $nic)->result_array();


		$sql = "SELECT i.item_code,itd.item_id,itd.price,itd.qty,itd.total_item_price
				FROM item as i
				JOIN invoice_item_detail AS itd WHERE i.item_id=itd.item_id AND itd.invoice_id=$invoice_id";
		$item = $this->db->query($sql)->result_array();

		$sql = "SELECT s.service_id,s.description,itd.service_price
FROM service as s
JOIN invoice_service_detail AS itd WHERE s.service_id=itd.service_id AND itd.invoice_id=$invoice_id";
		$service = $this->db->query($sql)->result_array();

		$item_qty[0][0]=$item;
		$item_qty[0][1]=$service;
		$item_qty[]=$customer;


//		echo "<pre>";
//		print_r($item_qty);
//		exit();
		return $item_qty;


	}
	public function get_invoice_summery()
	{

		$this->db->select("iv.invoice_id, iv.booking_id, b.service_date, cus.customer_id, cus.first_name,cus.nic, 
				cus.last_name, cus.mobile1, vh.reg_no,iv.total_price,sv.description,isd.service_price,itd,total_item_price");
		$this->db->from('invoice AS iv');
		$this->db->join('booking AS b', 'iv.booking_id = b.booking_id');
		$this->db->join('customer AS cus', 'iv.nic = cus.nic');
		$this->db->join('vehicle AS vh', 'iv.reg_no = vh.reg_no');
		$this->db->join('invoice_service_detail AS isd', 'iv.invoice_id = isd.invoice_id');
		$this->db->join('invoice_item_detail AS itd', 'iv.invoice_id = itd.invoice_id');
		$this->db->join('service AS sv', 'isd.service_id = sv.service_id');

		return $this->db->get();

	}

	public function validate_service($service)
	{
		$sql = "SELECT * FROM service where service_id = ?";
		$result = $this->db->query($sql, $service)->result_array();
		$result['count'] = count($result);
		return $result;
	}
	public function validate_qty($qty,$product)
	{
		$sql = "SELECT qty FROM item where item_code = ?";
		$result = $this->db->query($sql, $product)->result_array();
		$result=$result['qty'];
		if($result>$qty){
			return 1;

		}else{
			return 0;
		}

	}
}
