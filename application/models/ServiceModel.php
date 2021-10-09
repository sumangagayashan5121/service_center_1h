<?php


class ServiceModel extends CI_Model
{
	public function get_service_list(){
		$sql = "SELECT * FROM service";
		$return =$this->db->query($sql)->result_array();
		return $return;
	}

	public function save_service($service){
		$this->db->insert('service',$service);

	}

	public function get_service_by_id($id){
		$sql = "SELECT * FROM service WHERE service_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

	public function update_service($service, $id){
		$this->db->where('service_id', $id);
		$this->db->update('service', $service);

	}
	public function view_get_service_by_id($id){
		$sql = "SELECT * FROM service WHERE service_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}
}

