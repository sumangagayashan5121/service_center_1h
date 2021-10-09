<?php


class ItemModel extends CI_Model
{
	public function get_item_list(){
		$sql = "SELECT * FROM item";
		$this->db->join('category', 'category.category_id = item.category_id');
		$this->db->join('category', 'supplier.supplier_id = item.supplier_id');
		$return =$this->db->query($sql)->result_array();
		return $return;
	}

	public function save_item($item){
		$this->db->insert('item',$item);

	}

	public function get_item_by_id($id){
		$sql = "SELECT * FROM item WHERE item_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

	public function update_item($item, $id){
		$this->db->where('item_id', $id);
		$this->db->update('item', $item);

	}
	public function view_get_item_by_id($id){
		$sql = "SELECT * FROM item WHERE item_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}
}
