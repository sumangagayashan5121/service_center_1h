<?php


class StaffModel extends CI_Model
{
	public function save_staff($staff,$salary){
		$this->db->insert('user',$staff);
		$user_id = $this->db->insert_id();

		$job=$salary['job'];
		$basic_sallary=$salary['basic_sallary'];

		$salary=array(
			'job'=>$job,
			'basic_sallary'=>$basic_sallary,
			'user_id'=>$user_id
		);
		$this->db->insert('staff',$salary);

	}
	public function get_staff_list(){
		$sql = "SELECT * FROM user where role_id=(1||2||3) ";
		$result =$this->db->query($sql);
		$result=$result->result_array();

//		$count = $result->num_rows();
//		array_push($sql, $offset * 30);



		return $result;
	}
	public function get_staff_by_id($id){
		$sql = "SELECT * FROM staff WHERE staff_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}
	public function update_staff($staff, $id){
//						echo "<pre>";
//		print_r($id);
//		exit();
		$this->db->where('staff_id',$id);
		$this->db->update('staff',$staff);

	}

}
