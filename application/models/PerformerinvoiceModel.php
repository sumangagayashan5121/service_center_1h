<?php


class PerformerinvoiceModel extends CI_Model
{
	public function validate_booking_id($booking_id)
	{
		$sql = "SELECT booking_id FROM booking where booking_id = '$booking_id'";
		$result = $this->db->query($sql)->result_array();
		return count($result);
	}
	public function save_performer_invoice($performer_invoice){
		$performer_invoice_add = array(
			'booking_id' => $performer_invoice['booking_id'],
			'status'=>1
		);
		$this->db->insert('performer_invoice', $performer_invoice_add);
		$performer_invoice_id = $this->db->insert_id();


		for ($i = 0; $i < count($performer_invoice['product_code']); $i++) {

			$performer_invoice_detail = array(
				'performer_invoice_id' => $performer_invoice_id,
				'item_id' => $performer_invoice['product_code'][$i],
				'price' => $performer_invoice['cost_price'][$i],
				'qty' => $performer_invoice['qty'][$i],
				'total_item_price' => $performer_invoice['cost_total'][$i],
				'status' => 1
			);

			$this->db->insert('performer_invoice_detail', $performer_invoice_detail);
		}
		return $performer_invoice_id;
	}
	public function get_performer_invoice_list(){
		$sql = "SELECT * FROM performer_invoice";
		$result = $this->db->query($sql)->result_array();
		return $result;
	}

	public function get_performer_invoice_details($performer_invoice_id)
	{
//				echo "<pre>";
//		print_r($performer_invoice_id);
//		exit();
		$sql = "SELECT * FROM performer_invoice WHERE performer_invoice_id = ?";
		$item_qty = $this->db->query($sql, $performer_invoice_id)->result_array();
		$nic=$item_qty[0]['booking_id'];
		$sql = "SELECT * FROM booking WHERE booking_id = ?";
		$customer = $this->db->query($sql, $nic)->result_array();


		$sql = "SELECT i.item_code,itd.item_id,itd.price,itd.qty,itd.total_item_price
				FROM item as i
				JOIN performer_invoice_detail AS itd WHERE i.item_id=itd.item_id AND itd.performer_invoice_id=$performer_invoice_id";
		$item = $this->db->query($sql)->result_array();



		$item_qty[0][0]=$item;
//		$item_qty[0][1]=$service;
		$item_qty[]=$customer;


//		echo "<pre>";
//		print_r($item_qty);
//		exit();
		return $item_qty;


	}

}
