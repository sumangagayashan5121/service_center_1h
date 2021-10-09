<?php


class CustomerModel extends CI_Model
{
	public function get_customer_list(){
		$sql = "SELECT * FROM customer";
		$return =$this->db->query($sql)->result_array();
		return $return;
	}

	public function save_customer($customer){
		$this->db->insert('customer',$customer);

	}

	public function get_customer_by_id($id){
		$sql = "SELECT * FROM customer WHERE customer_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

	public function update_customer($customer, $id){
		$this->db->where('customer_id', $id);
		$this->db->update('customer', $customer);

	}
	public function view_get_customer_by_id($id){
		$sql = "SELECT * FROM customer WHERE customer_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}
}
