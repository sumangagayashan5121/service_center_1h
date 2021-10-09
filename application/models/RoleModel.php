<?php


class RoleModel extends CI_Model
{
	public function get_role_list(){
		$sql = "SELECT * FROM role";
		$return =$this->db->query($sql)->result_array();
		return $return;
	}

	public function save_role($role){
		$this->db->insert('role',$role);

	}

	public function get_role_by_id($id){
		$sql = "SELECT * FROM role WHERE id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

	public function update_role($role, $id){
		$this->db->where('id', $id);
		$this->db->update('role', $role);

	}
	public function view_get_role_by_id($id){
		$sql = "SELECT * FROM role WHERE id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

	public function validate_role($role)
	{
		$sql = "SELECT id FROM role where role = ?";
		$result = $this->db->query($sql, $role)->result_array();
		return count($result);
	}
}
