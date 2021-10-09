<?php


class VehicleModel extends CI_Model
{
	public function get_vehicle_list(){
		$sql = "SELECT * FROM vehicle";
		$return =$this->db->query($sql)->result_array();
		return $return;
	}

	public function save_vehicle($vehicle){
		$this->db->insert('vehicle',$vehicle);

	}

	public function get_vehicle_by_id($id){
		$sql = "SELECT * FROM vehicle WHERE vehicle_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

	public function update_vehicle($vehicle, $id){
		$this->db->where('vehicle_id', $id);
		$this->db->update('vehicle', $vehicle);

	}
	public function view_get_vehicle_by_id($id){
		$sql = "SELECT * FROM vehicle WHERE vehicle_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}
}
