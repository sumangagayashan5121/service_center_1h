<?php


class ServicecardModel extends CI_Model
{
	public function save_service_card($service_card){
			$this->db->insert('service_card',$service_card);
		$id = $this->db->insert_id();
		return $id;

	}
	public function get_service_card_details($service_card_id)
	{


		$sql = "SELECT b.booking_id,sc.repair,sc.others,b.customer_name,b.nic,b.email,b.service_date,b.reg_no,sc.service_card_id,sc.repair,sc.others
				FROM booking as b
				JOIN service_card AS sc WHERE b.booking_id=sc.booking_id AND sc.service_card_id='$service_card_id' and b.status='1'";
		$item = $this->db->query($sql)->result_array();




		return $item;


	}
	public function get_service_card_list()
	{


		$sql = "SELECT b.booking_id,sc.repair,sc.others,b.customer_name,b.nic,b.email,b.service_date,b.reg_no,sc.service_card_id
				FROM booking as b
				JOIN service_card AS sc WHERE b.booking_id=sc.booking_id And b.status='1'";
		$item = $this->db->query($sql)->result_array();




		return $item;


	}

}
