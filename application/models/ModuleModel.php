<?php


class ModuleModel extends CI_Model
{
	public function get_module_list(){
		$sql = "SELECT * FROM module";
		$return =$this->db->query($sql)->result_array();
		return $return;
	}

	public function save_module($module){
		$this->db->insert('module',$module);

	}

	public function get_module_by_id($id){
		$sql = "SELECT * FROM module WHERE id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

	public function update_module($module, $id){
		$this->db->where('id', $id);
		$this->db->update('module', $module);

	}
	public function view_get_module_by_id($id){
		$sql = "SELECT * FROM module WHERE id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

	public function validate_module($module)
	{
		$sql = "SELECT id FROM module where module = ?";
		$result = $this->db->query($sql, $module)->result_array();
		return count($result);
	}
}
