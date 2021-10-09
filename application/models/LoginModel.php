<?php


class LoginModel extends CI_Model
{
	function can_login($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('user');


		if ($query->num_rows() > 0) {
//			echo "<pre>";
//			print_r($query->row());
//			exit();
			return $query->row();
		} else {
			return false;
		}
	}
	function set_login($status,$user_id){

		$sql = "UPDATE user SET log_status = $status  WHERE user_id = $user_id";
		$this->db->query($sql);



	}
	public function check_sign_up_email($customer)
	{
		$email=$customer['email'];
		$role_id=$customer['id'];
		$password=$customer['password'];
		$first_name=$customer['first_name'];
		$last_name=$customer['last_name'];
		$nic=$customer['nic'];
		$mobile=$customer['mobile'];
		$status=$customer['status'];
		$created_date=date('Y-m-d');
		$created_by=$this->session->userdata('user_id');

		$no = 'no';
		$sql = "SELECT user_id FROM temporary_user where email = '$email' and nic='$nic'";
		$result = $this->db->query($sql);
		$count = $result->num_rows();
		if ($count == 0) {
			$token = "habwdgaigfahbnbcznmgjjawfnfwayjjnncsvzci0123456789";
			$token = str_shuffle($token);
			$token = substr($token, 0, 10);

			$customer=array(
				'email'=>$email,
				'role_id'=>$role_id,
				'password'=>$password,
				'first_name'=>$first_name,
				'last_name'=>$last_name,
				'nic'=>$nic,
				'mobile'=>$mobile,
				'status'=>$status,
				'created_date'=>$created_date
			);
			$this->db->insert('temporary_user',$customer);
//				$array=array('token'=>$token);

			$sql = "UPDATE temporary_user SET token='$token',token_expire=DATE_ADD(NOW(),INTERVAL 5 MINUTE ) where email = '$email'";
			$this->db->query($sql);


//			echo "<pre>";
//			print_r();
//			exit();
			return $token;

		}
//		echo "<pre>";
//		print_r($no);
//		exit();

		return $no;
	}


	public function check_email($email)
	{

		$no = 'no';
		$sql = "SELECT user_id FROM user where email = ?";
		$result = $this->db->query($sql, $email);
		$count = $result->num_rows();
		if ($count > 0) {
			$token = "habwdgaigfahbnbcznmgjjawfnfwayjjnncsvzci0123456789";
			$token = str_shuffle($token);
			$token = substr($token, 0, 10);

//				$array=array('token'=>$token);

			$sql = "UPDATE user SET token='$token',token_expire=DATE_ADD(NOW(),INTERVAL 5 MINUTE ) where email = '$email'";
			$this->db->query($sql);


//			echo "<pre>";
//			print_r();
//			exit();
			return $token;

		}
//		echo "<pre>";
//		print_r($no);
//		exit();

		return $no;
	}
	public function get_id($email,$token){
		$sql = "SELECT user_id FROM user where email = '$email' and token='$token' and token_expire>NOW()";
		$result = $this->db->query($sql);
		$count = $result->num_rows();
		return $count;

	}
	public function password($password){
//				echo "<pre>";
//		print_r($password);
//		exit();
		$password_new=$password['password'];
		$email=$password['email'];

		$sql = "UPDATE user SET password='$password_new'where email = '$email'";
		$this->db->query($sql);

	}
}
