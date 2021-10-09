<?php


class UserModel extends CI_Model
{
	public function get_user_list(){
		$sql = "SELECT * FROM user ";
		$result =$this->db->query($sql);
		$result=$result->result_array();

//		$count = $result->num_rows();
//		array_push($sql, $offset * 30);



		return $result;
	}

	public function save_user($user){
		md5($this->db->insert('user',$user));
		$role_id=$user['role_id'];
//					echo "<pre>";
//			print_r($role_id);
//			exit();

		if($role_id==4){
			$array=array(
			'email'=>$user['email'],
			'first_name'=>$user['first_name'],
			'mobile1'=>$user['mobile'],
//			'mobile2'=>$user['mobile'],
			'nic'=>$user['nic'],
			'last_name'=>$user['last_name'],
			'status'=>$user['status']
			);
			$this->db->insert('customer',$array);

		}

	}

	public function get_user_by_id($id){
		$sql = "SELECT * FROM user WHERE user_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

	public function update_user($user, $id){
//							echo "<pre>";
//			print_r($user);
//			exit();
		$this->db->where('nic', $id);
		$this->db->update('user', $user);
		$role_id=$user['role_id'];
//					echo "<pre>";
//			print_r($role_id);
//			exit();

		if($role_id==4){
			$array=array(
				'email'=>$user['email'],
				'first_name'=>$user['first_name'],
				'mobile1'=>$user['mobile'],
//			'mobile2'=>$user['mobile'],
				'nic'=>$user['nic'],
				'last_name'=>$user['last_name'],
				'status'=>$user['status']
			);
			$this->db->where('nic', $id);
			$this->db->update('customer', $array);

	}
	}
	public function view_get_user_by_id($id){
		$sql = "SELECT * FROM user WHERE user_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}
	public function get_profile($user_name){
		$sql = "SELECT * FROM user WHERE user_name = ?";
		$result = $this->db->query($sql, $user_name)->row_array();
		return $result;

	}

	function is_username_available($user_name)
	{
		$this->db->where('user_name', $user_name);
		$query = $this->db->get("user");
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function validate_email($email)
	{
		$sql = "SELECT user_id FROM user where email = '$email'";
		$result = $this->db->query($sql)->result_array();
		return count($result);
	}
}
