<?php


class TimeModel extends CI_Model
{
	public function get_time_list(){
		$sql = "SELECT * FROM service_time";
		$return =$this->db->query($sql)->result_array();
		return $return;
	}

	public function save_time($time){
		$this->db->insert('service_time',$time);

	}

	public function get_time_by_id($id){
		$sql = "SELECT * FROM service_time WHERE time_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

	public function update_time($time, $id){
		$this->db->where('time_id', $id);
		$this->db->update('service_time', $time);

	}
	public function view_get_time_by_id($id){
		$sql = "SELECT * FROM service_time WHERE time_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

}
