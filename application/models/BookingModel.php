<?php


class BookingModel extends CI_Model
{
	public function check($service_date)
	{
		$sql = "SELECT * FROM service_time WHERE status=1";
		$result1 = $this->db->query($sql);
		$count = $result1->num_rows();
//		echo "<pre>";
//		print_r($count_8);
//		exit();

		for ($i = 1; $i <= $count; $i++) {
//			echo "<pre>";
//			print_r($i);
//			exit();
			$sql = "SELECT no_customer FROM service_time WHERE time_id=$i";
			$result11 = $this->db->query($sql, $service_date);
			$array1 = $result11->result_array();
//			echo "<pre>";
//			print_r($array1);
//			exit();
			$no = $array1[0]['no_customer'];


			$sql = "SELECT * FROM time_date WHERE service_date = ? AND time_id=$i";
			$result1 = $this->db->query($sql, $service_date);
			$count_8 = $result1->num_rows();

			if ($count_8 > 0) {
				if ($count_8 <= $no) {
					$sql = "SELECT * FROM service_time WHERE time_id=$i";
					$result11 = $this->db->query($sql, $service_date);
					$array1 = $result11->result_array();
					$a[] = $array1[0];
				}
			} else {
				$sql = "SELECT * FROM service_time WHERE time_id=$i";
				$result12 = $this->db->query($sql, $service_date);
				$array1 = $result12->result_array();
				$a[] = $array1[0];
			}
		}

//		echo "<pre>";
//		print_r($a);
//		exit();


		return $a;

	}
	public function save_temp_booking(){
		$booking = array(
			'customer_name' => $this->input->post('customer_name'),
			'reg_no'=> $this->input->post('reg_no'),
			'service_date' => $this->input->post('service_date'),
			'status' => $this->input->post('status'),
			'nic'=> $this->input->post('nic'),
			'address' => $this->input->post('address'),
			'model_id' => $this->input->post('model_id'),
			'mobile1' => $this->input->post('mobile1'),
			'mobile2' =>$this->input->post('mobile2'),
			'created_by' => $this->session->userdata('user_id'),
			'email' => $this->input->post('email'),
			'service_time_id' => $this->input->post('service_time'),
			'created_date'=>date('Y-m-d')

		);
		$role = $this->input->post('email');
		$sql = "SELECT role_id,email FROM user WHERE email='$role'";
		$result = $this->db->query($sql);
		$array = $result->result_array();

		$this->db->insert('temp_booking',$booking);

		return $array;
	}
	public function save_booking($email){
		$sql = "SELECT * FROM temp_booking WHERE email='$email'";
		$result = $this->db->query($sql);
		$array_booking = $result->result_array();
//						echo "<pre>";
//		print_r($array);
//		exit();
		$booking = array(
			'customer_name' => $array_booking[0]['customer_name'],
			'reg_no'=> $array_booking[0]['reg_no'],
			'service_date' => $array_booking[0]['service_date'],
			'status' => $array_booking[0]['status'],
			'nic'=> $array_booking[0]['nic'],
			'address' => $array_booking[0]['address'],
			'mobile1' => $array_booking[0]['mobile1'],
			'mobile2' =>$array_booking[0]['mobile2'],
			'created_by' => $array_booking[0]['created_by'],
			'email' => $array_booking[0]['email'],
			'service_time_id' => $array_booking[0]['service_time_id'],
			'created_date'=>$array_booking[0]['created_date']

		);
		$customer_name_1 = $array_booking[0]['customer_name'];
				$reg_no_1 = $array_booking[0]['reg_no'];
		$service_date_1 = $array_booking[0]['service_date'];
		$email_1 = $array_booking[0]['email'];

		$sql = "SELECT role_id FROM user WHERE email='$email_1'";
		$result = $this->db->query($sql);
		$array = $result->result_array();
		$role_id=$array[0]['role_id'];


		$date_time=array(
			'time_id' =>$array_booking[0]['service_time_id'],
			'service_date' => $array_booking[0]['service_date']);


		$service_time=$booking['service_time_id'];
		$sql = "SELECT start_time,end_time FROM service_time WHERE time_id=$service_time";
		$result = $this->db->query($sql);
		$array = $result->result_array();

		$this->db->insert('booking',$booking);
		$booking_id = $this->db->insert_id();

		$time_id=$date_time['time_id'];
		$service_date=$date_time['service_date'];

		$date_time=array(
			'booking_id'=>$booking_id,
			'time_id'=>$time_id,
			'service_date'=>$service_date
		);

		$this->db->insert('time_date',$date_time);
		$start_time=$array[0]['start_time'];
		$end_time=$array[0]['end_time'];



		$sql = "SELECT nic,mobile1,mobile2,email,status FROM booking WHERE booking_id=$booking_id";
		$result = $this->db->query($sql);
		$array = $result->result_array();
		$customer=$array[0];

		$nic=$customer['nic'];


		$sql = "SELECT nic,customer_id FROM customer WHERE nic='$nic'";
		$result = $this->db->query($sql);
		$count = $result->num_rows();

		if($count==0){
			$this->db->insert('customer',$customer);
			$customer_id = $this->db->insert_id();
		}else{
			$array = $result->result_array();
			$customer_id=$array[0]['customer_id'];
		}
//				echo "<pre>";
//		print_r($customer_id);
//		exit();


		$vehicle=array(
			'customer_id'=>$customer_id,
			'model_id' => $array_booking[0]['model_id'],
			'reg_no'=> $array_booking[0]['reg_no'],
			'status' => $array_booking[0]['status']
		);
//						echo "<pre>";
//		print_r($vehicle);
//		exit();

		$reg_no=$array_booking[0]['reg_no'];
		$sql = "SELECT reg_no FROM vehicle WHERE reg_no='$reg_no'";
		$result = $this->db->query($sql);
		$count_1 = $result->num_rows();
//						echo "<pre>";
//		print_r($count_1);
//		exit();

		if($count_1==0){
			$this->db->insert('vehicle',$vehicle);}



		$array=array(
			'role_id'=>$role_id,
			'booking_id'=>$booking_id,
			'start_time'=>$start_time,
			'end_time'=>$end_time,
			'customer_name'=>$customer_name_1,
			'reg_no'=>$reg_no_1,
			'service_date'=>$service_date_1,
			'email'=>$email_1
		);
		$sql = "DELETE FROM temp_booking WHERE email='$email_1'";
		$this->db->query($sql);


		return $array;
	}
//	public function save_booking1($email){
//		$sql = "SELECT * FROM temp_booking WHERE email='$role'";
//		$result = $this->db->query($sql);
//		$array = $result->result_array();
//		$booking = array(
//			'customer_name' => $this->input->post('customer_name'),
//			'reg_no'=> $this->input->post('reg_no'),
//			'service_date' => $this->input->post('service_date'),
//			'status' => $this->input->post('status'),
//			'nic'=> $this->input->post('nic'),
//			'address' => $this->input->post('address'),
//			'mobile1' => $this->input->post('mobile1'),
//			'mobile2' =>$this->input->post('mobile2'),
//			'created_by' => $this->session->userdata('user_id'),
//			'email' => $this->input->post('email'),
//			'service_time_id' => $this->input->post('service_time'),
//			'created_date'=>date('Y-m-d')
//
//		);
//		$role = $this->input->post('email');
//		$sql = "SELECT role_id FROM user WHERE email='$role'";
//		$result = $this->db->query($sql);
//		$array = $result->result_array();
//		$role_id=$array[0]['role_id'];
//
//
//		$date_time=array(
//			'time_id' => $this->input->post('service_time'),
//			'service_date' => $this->input->post('service_date'));
//
//
//		$service_time=$booking['service_time_id'];
//		$sql = "SELECT start_time,end_time FROM service_time WHERE time_id=$service_time";
//		$result = $this->db->query($sql);
//		$array = $result->result_array();
//
//		$this->db->insert('booking',$booking);
//		$booking_id = $this->db->insert_id();
//
//		$time_id=$date_time['time_id'];
//		$service_date=$date_time['service_date'];
//
//		$date_time=array(
//			'booking_id'=>$booking_id,
//			'time_id'=>$time_id,
//			'service_date'=>$service_date
//		);
//
//		$this->db->insert('time_date',$date_time);
//		$start_time=$array[0]['start_time'];
//		$end_time=$array[0]['end_time'];
//
//
//
//		$sql = "SELECT nic,mobile1,mobile2,email,status FROM booking WHERE booking_id=$booking_id";
//		$result = $this->db->query($sql);
//		$array = $result->result_array();
//		$customer=$array[0];
//
//		$nic=$customer['nic'];
//
//
//		$sql = "SELECT nic,customer_id FROM customer WHERE nic='$nic'";
//		$result = $this->db->query($sql);
//		$count = $result->num_rows();
//
//		if($count==0){
//			$this->db->insert('customer',$customer);
//			$customer_id = $this->db->insert_id();
//		}else{
//			$array = $result->result_array();
//			$customer_id=$array[0]['customer_id'];
//		}
////				echo "<pre>";
////		print_r($customer_id);
////		exit();
//
//
//		$vehicle=array(
//			'customer_id'=>$customer_id,
//			'model_id' => $this->input->post('model_id'),
//			'reg_no'=> $this->input->post('reg_no'),
//			'status' => $this->input->post('status')
//		);
//
//		$reg_no=$this->input->post('reg_no');
//		$sql = "SELECT reg_no FROM vehicle WHERE reg_no='$reg_no'";
//		$result = $this->db->query($sql);
//		$count_1 = $result->num_rows();
////						echo "<pre>";
////		print_r($count_1);
////		exit();
//
//		if($count_1==0){
//			$this->db->insert('vehicle',$vehicle);}
//
//
//
//		$array=array(
//			'reg_no'=>$reg_no,
//			'booking_id'=>$booking_id,
//			'start_time'=>$start_time,
//			'end_time'=>$end_time,
//			'role_id'=>$role_id
//		);
//
//
//		return $array;
//	}



	public function view_booking($booking_id){
//		$sql = "SELECT * FROM booking WHERE booking_id=$booking_id";
//		$result = $this->db->query($sql);
//		$array = $result->result_array();
//		return $array;

		$this->db->select("b.booking_id, b.email, b.service_date, b.service_time_id, b.customer_name, 
				b.nic, b.address, b.mobile1, b.reg_no, m.model_name, t.start_time, t.end_time,b.created_date");
		$this->db->from('booking AS b');
		$this->db->join('time_date AS td', 'b.booking_id = td.booking_id');
		$this->db->join('service_time AS t', 'td.time_id = t.time_id');
		$this->db->join('vehicle AS vh', 'b.reg_no = vh.reg_no');
		$this->db->join('model AS m', 'vh.model_id = m.model_id');
		$this->db->where('b.booking_id', $booking_id);
		$s=$this->db->get();
		$result=$s->result_array();
//		echo "<pre>";
//		print_r($result);
//		exit();


		return $result;
	}
	public function get_booking_list(){
		$sql = "SELECT * FROM booking";
		$result1 = $this->db->query($sql);
		$result = $result1->result_array();
		$count = $result1->num_rows();
//					echo "<pre>";
//			print_r($count);
//			exit();
		for ($i = 0; $i < $count; $i++) {
			$booking_id = $result[$i]['booking_id'];
			$reg_no = $result[$i]['reg_no'];
//								echo "<pre>";
//			print_r($reg_no);
//			exit();

			$sql = "SELECT time_id,service_date FROM time_date WHERE booking_id=$booking_id";
			$date_time = $this->db->query($sql);
			$array = $date_time->result_array();

			$time_id = $array[0]['time_id'];
			$service_date = $array[0]['service_date'];

//			echo "<pre>";
//			print_r($service_date);
//			exit();


			$sql = "SELECT start_time,end_time FROM service_time WHERE time_id='$time_id'";
			$date_time = $this->db->query($sql);
			$array = $date_time->result_array();
			$start_time = $array[0]['start_time'];
			$end_time = $array[0]['end_time'];


			$sql = "SELECT vehicle_id,model_id FROM vehicle WHERE reg_no='$reg_no'";
			$date_time = $this->db->query($sql);
			$array = $date_time->result_array();
			$model_id = $array[0]['model_id'];
			$vehicle_id = $array[0]['vehicle_id'];


			$result[$i][] = $service_date;
			$result[$i][] = $start_time;
			$result[$i][] = $end_time;
			$result[$i][] = $model_id;
			$result[$i][] = $vehicle_id;


		}
//		echo "<pre>";
//		print_r($result);
//		exit();



		return $result;





	}
	public function validate_date($date)
	{
		$sql = "SELECT holiday_id FROM holiday where holiday_date = ?";
		$result = $this->db->query($sql, $date)->result_array();
		return count($result);
	}
	public function save_holiday($holiday_array){

		foreach ($holiday_array as $holiday) {
			$arr = array(
				'holiday_date' => $holiday,
				'status' => ACTIVE
			);
			$this->db->insert('holiday',$arr);
		}

	}
	public function get_holiday_list(){
		$sql = "SELECT * FROM holiday";
		$result1 = $this->db->query($sql);
		$result = $result1->result_array();

		return $result;}
	public function update_holiday($id){
		$status=$id['status'];
		$holiday_id=$id['holiday_id'];
//		echo "<pre>";
//		print_r($status);
//		exit();
		if($status==1){
			$sql = "UPDATE holiday SET status=0 WHERE holiday_id=$holiday_id";
			$this->db->query($sql);
		}else{
			$sql = "UPDATE holiday SET status=1 WHERE holiday_id=$holiday_id";
			$this->db->query($sql);
		}


	}
	public function validate_booking_id($booking_id)
	{
		$sql = "SELECT booking_id FROM booking where booking_id = '$booking_id' and booking_id=1";
		$result = $this->db->query($sql)->result_array();
		return count($result);
	}
	public function save_performer_invoice($performer_invoice){
		$performer_invoice_add = array(
			'booking_id' => $performer_invoice['booking_id'],
			'status'=>1
		);
		$this->db->insert('performer_invoice', $performer_invoice_add);
		$performer_invoice_id = $this->db->insert_id();


		for ($i = 0; $i < count($performer_invoice['product_code']); $i++) {

			$performer_invoice_detail = array(
				'performer_invoice_id' => $performer_invoice_id,
				'item_id' => $performer_invoice['product_code'][$i],
				'price' => $performer_invoice['cost_price'][$i],
				'qty' => $performer_invoice['qty'][$i],
				'total_item_price' => $performer_invoice['cost_total'][$i],
				'status' => 1
			);

			$this->db->insert('performer_invoice_detail', $performer_invoice_detail);
		}
		return $performer_invoice_id;
	}
	public function get_performer_invoice_list(){
		$sql = "SELECT * FROM performer_invoice";
		$result = $this->db->query($sql)->result_array();
		return $result;
	}

	public function get_performer_invoice_details($performer_invoice_id)
	{
		$sql = "SELECT * FROM performer_invoice WHERE performer_invoice_id = ?";
		$item_qty = $this->db->query($sql, $performer_invoice_id)->result_array();
		$nic=$item_qty[0]['booking_id'];
		$sql = "SELECT * FROM booking WHERE booking_id = ?";
		$customer = $this->db->query($sql, $nic)->result_array();


		$sql = "SELECT i.item_code,itd.item_id,itd.price,itd.qty,itd.total_item_price
				FROM item as i
				JOIN performer_invoice_detail AS itd WHERE i.item_id=itd.item_id AND itd.performer_invoice_id=$performer_invoice_id";
		$item = $this->db->query($sql)->result_array();



		$item_qty[0][0]=$item;
//		$item_qty[0][1]=$service;
		$item_qty[]=$customer;


//		echo "<pre>";
//		print_r($item_qty);
//		exit();
		return $item_qty;


	}



}




