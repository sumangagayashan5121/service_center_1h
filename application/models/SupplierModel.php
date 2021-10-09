<?php


class SupplierModel extends CI_Model
{
	public function get_supplier_list(){
		$sql = "SELECT * FROM supplier";
		$return =$this->db->query($sql)->result_array();
		return $return;
	}

	public function save_supplier($supplier){
		$this->db->insert('supplier',$supplier);

	}

	public function get_supplier_by_id($id){
		$sql = "SELECT * FROM supplier WHERE supplier_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

	public function update_supplier($supplier, $id){
		$this->db->where('supplier_id', $id);
		$this->db->update('supplier', $supplier);

	}
	public function view_get_supplier_by_id($id){
		$sql = "SELECT * FROM supplier WHERE supplier_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}
}
