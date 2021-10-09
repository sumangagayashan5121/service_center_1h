<?php


class ReceiptModel extends CI_Model
{
	public function get_receipt_list(){
//		$this->db->select('receipt.*,receipt_detail.*');
//		$this->db->from('receipt_detail');
//		$this->db->join('receipt', 'receipt.receipt_id = receipt_detail.receipt_id');
//		$query = $this->db->get();
		$sql = "SELECT rp.receipt_id, rp.description, rp.deliver_date, cus.customer_id, cus.customer_name, 
				cus.nic, cus.address, cus.mobile1
				FROM receipt rp
				INNER JOIN receipt_detail rd ON rp.receipt_id = rd.receipt_id
				INNER JOIN customer cus ON rp.customer_id = cus.customer_id
				INNER JOIN vehicle vh ON rp.vehicle_id = vh.vehicle_id
				INNER JOIN service sv ON rd.service_id = sv.service_id";
		$result = $this->db->query($sql)->result_array();
		return $result;
	}


	public function search_customer_by_nic($nic)
	{
		$this->db->where("nic", $nic);
		$query=$this->db->get('customer');
		return $query->row_array();
	}
	public function search_vehicle_by_reg($reg_no)
	{
		$this->db->select('vehicle.*,model.*');
		$this->db->from('model');
		$this->db->join('vehicle', 'vehicle.model_id = model.model_id');
		$this->db->where("reg_no", $reg_no);

		$query = $this->db->get();
		return $query->row_array();
	}


	public function save_customer($customer, $customer_status, $customer_id){

		if ($customer_status == 0){
			$this->db->insert('customer', $customer);
			$customer_id = $this->db->insert_id();
		}else{
			$this->db->update('customer', $customer);
			$this->db->where('customer_id', $customer_id);
		}
		return $customer_id;
	}




	public function save_model($model, $vehicle_status, $model_id){
		if ($vehicle_status == 0){
			$this->db->insert('model', $model);
			$model_id = $this->db->insert_id();
		}else{
			$this->db->update('model', $model);
			$this->db->where('model_id', $model_id);
		}
		return $model_id;
	}


	public function save_vehicle($vehicle, $vehicle_status, $vehicle_id){
		if ($vehicle_status == 0){
			$this->db->insert('vehicle', $vehicle);
			$vehicle_id = $this->db->insert_id();
		}else{
			$this->db->update('vehicle', $vehicle);
			$this->db->where('vehicle_id', $vehicle_id);
		}
		return $vehicle_id;
	}

	public function save_reciept($receipt){
		$this->db->insert('receipt', $receipt);
		$receipt_id = $this->db->insert_id();
		return $receipt_id;
	}

	public function save_recieptdetails($receiptdetails){
		$this->db->insert('receipt_detail', $receiptdetails);
		$receipt_detail_id = $this->db->insert_id();
		return $receipt_detail_id;
	}

	public function get_receipt_by_id($id){
		$sql = "SELECT * FROM receipt WHERE receipt_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}


	public function get_receipt_details($receipt_id_n)
	{

		$this->db->select("rp.receipt_id, rp.description, rp.deliver_date, cus.customer_id, cus.customer_name, 
				cus.nic, cus.address, cus.mobile1, vh.reg_no, sv.description, md.model_name, rd.receipt_created_date, us.user_name");
		$this->db->from('receipt AS rp');
		$this->db->join('receipt_detail AS rd', 'rp.receipt_id = rd.receipt_id');
		$this->db->join('customer AS cus', 'rp.customer_id = cus.customer_id');
		$this->db->join('vehicle AS vh', 'rp.vehicle_id = vh.vehicle_id');
		$this->db->join('service AS sv', 'rd.service_id = sv.service_id');
		$this->db->join('model AS md', 'vh.model_id = md.model_id');
		$this->db->join('user AS us', 'rp.created_by = us.user_id');
		$this->db->where('rp.receipt_id', $receipt_id_n);

		return $this->db->get();

	}


}
