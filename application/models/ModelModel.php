<?php


class ModelModel extends CI_Model
{
	public function get_model_list(){
		$sql = "SELECT * FROM model";
		$return =$this->db->query($sql)->result_array();
		return $return;
	}

	public function save_model($model){
		$this->db->insert('model',$model);

	}

	public function get_model_by_id($id){
		$sql = "SELECT * FROM model WHERE model_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

	public function update_model($model, $id){
		$this->db->where('model_id', $id);
		$this->db->update('model', $model);

	}
	public function view_get_model_by_id($id){
		$sql = "SELECT * FROM model WHERE model_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}
}
