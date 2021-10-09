<?php

class PermissionModel extends CI_Model
{

	public function get_permission($module)
	{
		$user_data = $this->session->all_userdata();
		$role_id = $user_data['role_id'];
		$logged_in = $user_data['logged_in'];

		if ($logged_in) {
			$sql_0 = "SELECT id 
					from module 
					WHERE module = ?";
			$result_0 = $this->db->query($sql_0, $module)->row_array();

			$sql = "SELECT rm.role_id
				FROM role_module rm
				INNER JOIN role r ON rm.role_id = r.id  
				INNER JOIN module m ON rm.module_id = m.id  
				WHERE rm.role_id = ? AND rm.module_id = ? AND r.status = ? AND m.status = ?";
			$result = $this->db->query($sql, array($role_id, $result_0['id'], ROLE_ACTIVE, MODULE_ACTIVE))->result_array();

			if (count($result) > 0) {
				return true;
			} else {
				return false;
			}
		} else {
			redirect('LoginController/index');
		}
	}

	public function get_role_module_list($role_id)
	{
		$sql = "SELECT 
				m.id as module_id, 
				m.module as module, 
				m.description as module_description 
				FROM role_module rm
				INNER JOIN role r ON rm.role_id = r.id 
				INNER JOIN module m ON rm.module_id = m.id 
				WHERE rm.role_id = ?";
		$result = $this->db->query($sql, $role_id)->result_array();
		return $result;
	}

	public function assign_permission($role_id, $module_id)
	{
		try {
			$this->db->trans_start();
			$sql = "SELECT * FROM role_module WHERE role_id = ? AND module_id = ?";
			$result = $this->db->query($sql, array($role_id, $module_id))->result_array();

			if (count($result) == 0) {
				$this->db->insert('role_module', array('role_id' => $role_id, 'module_id' => $module_id));
			}
			$this->db->trans_complete();
		} catch (Exception $e) {
			$this->db->trans_rollback();
		}
	}

	public function remove_permission($role_id, $module_id)
	{
		try {
			$this->db->trans_start();
			$this->db->where('role_id', $role_id);
			$this->db->where('module_id', $module_id);
			$this->db->delete('role_module');
			$this->db->trans_complete();
		} catch (Exception $e) {
			$this->db->trans_rollback();
		}
	}

	public function assign_permission_all($role_id)
	{
		try {
			$this->db->trans_start();

			$this->db->where('role_id', $role_id);
			$this->db->delete('role_module');

			$sql = "SELECT id FROM module ORDER BY id ASC";
			$modules = $this->db->query($sql)->result_array();

			foreach ($modules as $module) {
				$role_module = array(
					'role_id' => $role_id,
					'module_id' => $module['id']
				);
				$this->db->insert('role_module', $role_module);
			}

			$this->db->trans_complete();
		} catch (Exception $e) {
			$this->db->trans_rollback();
		}
	}

	public function remove_permission_all($role_id)
	{
		try {
			$this->db->trans_start();
			$this->db->where('role_id', $role_id);
			$this->db->delete('role_module');
			$this->db->trans_complete();
		} catch (Exception $e) {
			$this->db->trans_rollback();
		}
	}
}
