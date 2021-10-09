<?php


class CategoryModel extends CI_Model
{

	public function get_category_list(){
		$sql = "SELECT * FROM category";
		$return =$this->db->query($sql)->result_array();
		return $return;
	}

	public function save_category($category){
		$this->db->insert('category',$category);
//		$id = $this->db->insert_id();
	}

	public function get_category_by_id($id){
		$sql = "SELECT * FROM category WHERE category_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

	public function update_category($category, $id){
		$this->db->where('category_id', $id);
		$this->db->update('category', $category);

	}
	public function view_get_category_by_id($id){
		$sql = "SELECT * FROM category WHERE category_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

}
