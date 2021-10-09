<?php


class ReportModel extends CI_Model
{
	public function get_receipt_summery()
	{
		$this->db->select("rp.receipt_id, rp.description, rp.deliver_date, cus.customer_id, cus.customer_name, 
				cus.nic, cus.address, cus.mobile1, vh.reg_no, sv.description");
		$this->db->from('receipt AS rp');
		$this->db->join('receipt_detail AS rd', 'rp.receipt_id = rd.receipt_id');
		$this->db->join('customer AS cus', 'rp.customer_id = cus.customer_id');
		$this->db->join('vehicle AS vh', 'rp.vehicle_id = vh.vehicle_id');
		$this->db->join('service AS sv', 'rd.service_id = sv.service_id');

		return $this->db->get();

	}
	public function get_receipt_details()
	{

		$this->db->select("rp.receipt_id, rp.description, rp.deliver_date, cus.customer_id, cus.customer_name, 
				cus.nic, cus.address, cus.mobile1, vh.reg_no, sv.description");
		$this->db->from('receipt AS rp');
		$this->db->join('receipt_detail AS rd', 'rp.receipt_id = rd.receipt_id');
		$this->db->join('customer AS cus', 'rp.customer_id = cus.customer_id');
		$this->db->join('vehicle AS vh', 'rp.vehicle_id = vh.vehicle_id');
		$this->db->join('service AS sv', 'rd.service_id = sv.service_id');

		return $this->db->get();

	}

	public function get_invoice_summery()
	{

		$this->db->select("iv.invoice_id, iv.booking_id, b.service_date, cus.customer_id, cus.first_name,cus.nic, 
				cus.last_name, cus.mobile1, vh.reg_no,iv.total_price");
		$this->db->from('invoice AS iv');
		$this->db->join('booking AS b', 'iv.booking_id = b.booking_id');
		$this->db->join('customer AS cus', 'iv.nic = cus.nic');
		$this->db->join('vehicle AS vh', 'iv.reg_no = vh.reg_no');

		return $this->db->get();

	}
	public function get_invoice_details()
	{
		$this->db->select("iv.invoice_id, iv.booking_id, b.service_date, cus.customer_id, cus.first_name,cus.nic, 
				cus.last_name, cus.mobile1, vh.reg_no,iv.total_price,group_concat(concat(iid.item_id)) as item_code,
				group_concat(concat(isd.service_id)) as description");
		$this->db->from('invoice AS iv');
		$this->db->join('booking AS b', 'iv.booking_id = b.booking_id');
		$this->db->join('customer AS cus', 'iv.nic = cus.nic');
		$this->db->join('invoice_service_detail AS isd', 'iv.invoice_id = isd.invoice_id');
		$this->db->join('invoice_item_detail AS iid', 'iv.invoice_id = iid.invoice_id');
		$this->db->join('service AS sv', 'isd.service_id = sv.service_id');
		$this->db->join('item AS it', 'iid.item_id = it.item_id');
		$this->db->join('vehicle AS vh', 'iv.reg_no = vh.reg_no');
		return $this->db->get();

	}

	public function search_grn_detail($search_text,$start_date,$end_date)
	{
		$sql = "SELECT grn_id FROM grn";
		$return =$this->db->query($sql);

		if($start_date != null && $end_date != null){
			$sql = "SELECT g.grn_id,g.invoice_number, g.total_cost,  sp.supplier_name, sp.address,sp.email,  sp.mobile1, g.created_date
                FROM grn as g, supplier AS  sp
				WHERE g.supplier_id = sp.supplier_id and  '$search_text' like g.total_cost or '$search_text' like sp.address or 
				'$search_text' like sp.mobile1 or '$search_text' like g.grn_id or g.created_date>=  '$start_date' and g.created_date<= '$end_date'";
			$return =$this->db->query($sql);
			$array=$return->result_array();}
		elseif($start_date != null || $end_date != null){
		$sql = "SELECT g.grn_id,g.invoice_number, g.total_cost,  sp.supplier_name, sp.address,sp.email,  sp.mobile1, g.created_date
                FROM grn as g, supplier AS  sp
				WHERE g.supplier_id = sp.supplier_id and  '$search_text' like g.total_cost or '$search_text' like sp.address or 
				'$search_text' like sp.mobile1 or '$search_text' like g.grn_id or g.created_date>=  '$start_date' or g.created_date<= '$end_date'";
		$return =$this->db->query($sql);
		$array=$return->result_array();}else{
			$sql = "SELECT g.grn_id,g.invoice_number, g.total_cost,  sp.supplier_name, sp.address,sp.email,  sp.mobile1, g.created_date
                FROM grn as g, supplier AS  sp
				WHERE g.supplier_id = sp.supplier_id and  '$search_text' like g.total_cost or '$search_text' like sp.address or 
				'$search_text' like sp.mobile1 or '$search_text' like g.grn_id";
			$return =$this->db->query($sql);
			$array=$return->result_array();
		}
		for ($i = 1; $i <= $return->num_rows(); $i++) {

			$sql = "SELECT group_concat(concat(item_id)) as item_id,group_concat(concat('item id ',item_id,'\n')) as item_id,
					group_concat(concat(cost_price)) as cost_price,group_concat(concat('cost price ',cost_price,'\n')) as cost_price ,
					group_concat(concat(selling_price)) as selling_price,group_concat(concat('selling price ',selling_price,'\n')) as selling_price,
					group_concat(concat(qty)) as qty,group_concat(concat('qty ',qty,'\n')) as qty 	
					FROM grn_detail where grn_id=$i";
			$item =$this->db->query($sql);
			$item=$item->result_array();
			$item=$item[0];

			$array[$i-1][]=$item;


		}

		return $array;

	}
	public function get_grn_details()
	{
		$sql = "SELECT grn_id FROM grn";
		$return =$this->db->query($sql);
//				echo "<pre>";
//		print_r($return->num_rows());
//		exit();
		$sql = "SELECT g.grn_id,g.invoice_number, g.total_cost,  sp.supplier_name, sp.address,sp.email,  sp.mobile1, g.created_date, g.remarks, g.created_date
                FROM grn as g, supplier AS  sp
				WHERE g.supplier_id = sp.supplier_id ";
		$return =$this->db->query($sql);
		$array=$return->result_array();
		for ($i = 1; $i <= $return->num_rows(); $i++) {



			$sql = "SELECT group_concat(concat(item_id)) as item_id,group_concat(concat('item id ',item_id,'\n')) as item_id,
					group_concat(concat(cost_price)) as cost_price,group_concat(concat('cost price ',cost_price,'\n')) as cost_price ,
					group_concat(concat(selling_price)) as selling_price,group_concat(concat('selling price ',selling_price,'\n')) as selling_price,
					group_concat(concat(qty)) as qty,group_concat(concat('qty ',qty,'\n')) as qty 	
					FROM grn_detail where grn_id=$i";
			$item =$this->db->query($sql);
			$item=$item->result_array();
			$item=$item[0];

			$array[$i-1][]=$item;


		}

		return $array;
	}
		public function invoice_grn_summery_1()
	{
		$sql = "SELECT grn_id FROM grn";
		$return =$this->db->query($sql);
//				echo "<pre>";
//		print_r($return->num_rows());
//		exit();
		$sql = "SELECT g.grn_id,g.invoice_number, g.total_cost,  sp.supplier_name, sp.address,sp.email,  sp.mobile1
                FROM grn as g, supplier AS  sp
				WHERE g.supplier_id = sp.supplier_id ";
		$return =$this->db->query($sql);
		$array=$return->result_array();
		for ($i = 1; $i <= $return->num_rows(); $i++) {



//			,'; cost price ',cost_price,'; selling price ',selling_price,'; qty ',qty
			$sql = "SELECT group_concat(concat(item_id)) as item_id,group_concat(concat('\n','item id ',item_id)) as item_id,
					group_concat(concat(cost_price)) as cost_price,group_concat(concat('\n','cost price ',cost_price)) as cost_price ,
					group_concat(concat(selling_price)) as selling_price,group_concat(concat('\n','selling price ',selling_price)) as selling_price,
					group_concat(concat(qty)) as qty,group_concat(concat('\n','qty ',qty)) as qty 	
					FROM grn_detail where grn_id=$i";
			$item =$this->db->query($sql);
			$item=$item->result_array();
			$item=$item[0];

			$array[$i-1][]=$item;


		}
						echo "<pre>";
		print_r($array);
		exit();



		return $array;

	}
	public function invoice_grn_summery_2(){
		$sql = "SELECT invoice_id FROM invoice";
		$return =$this->db->query($sql);
//				echo "<pre>";
//		print_r($return->num_rows());
//		exit();
		$sql = "SELECT iv.invoice_id, iv.booking_id, b.service_date, cus.customer_id, cus.first_name,cus.nic, 
				cus.last_name, cus.mobile1, vh.reg_no,iv.total_price 
                FROM invoice as iv,booking AS  b,customer AS cus,vehicle AS  vh
				WHERE iv.booking_id = b.booking_id AND
				 iv.nic = cus.nic AND
				 iv.reg_no = vh.reg_no";
		$return =$this->db->query($sql);
		$array=$return->result_array();
		for ($i = 1; $i <= $return->num_rows(); $i++) {




			$sql = "SELECT group_concat(concat('\n',i.item_code)) as item_code FROM invoice_item_detail as isd
 					join item i where isd.item_id=i.item_id and isd.invoice_id=$i";
			$item =$this->db->query($sql);
			$item=$item->result_array();
			$item=$item[0];
			$sql = "SELECT group_concat(concat('\n',s.description)) as service_id FROM invoice_service_detail as isd
 					join service s where isd.service_id=s.service_id and isd.invoice_id=$i";
			$service =$this->db->query($sql);
			$service=	$service->result_array();
			$service=$service[0];
			$array[$i-1][]=$item;
			$array[$i-1][]=$service;


		}
						echo "<pre>";
		print_r($array);
		exit();
		return $array;
	}

	public function search_receipt_summery($search_text, $start_date, $end_date){
		$this->db->select("b.booking_id,  rp.deliver_date, cus.customer_id, cus.customer_name, 
				cus.nic, cus.address, cus.mobile1, vh.reg_no, sv.description");
		$this->db->from('receipt AS rp');
		$this->db->join('receipt_detail AS rd', 'rp.receipt_id = rd.receipt_id');
		$this->db->join('customer AS cus', 'rp.customer_id = cus.customer_id');
		$this->db->join('vehicle AS vh', 'rp.vehicle_id = vh.vehicle_id');
		$this->db->join('service AS sv', 'rd.service_id = sv.service_id');
		if(($search_text) != '')
		{
			$this->db->like('vh.reg_no', $search_text);
			$this->db->or_like('cus.customer_name', $search_text);
			$this->db->or_like('rp.receipt_id', $search_text);
			$this->db->or_like('rp.receipt_id', $search_text);
			$this->db->or_like('cus.nic', $search_text);
		}
		if ($start_date != null && $end_date != null){
			$this->db->where('rd.receipt_created_date >=', $start_date);
			$this->db->where('rd.receipt_created_date <=', $end_date);
		}
		return $this->db->get();
	}
	public function search_receipt_detail($search_text, $start_date, $end_date){
		$this->db->select("b.booking,  rp.deliver_date, cus.customer_id, cus.customer_name, 
				cus.nic, cus.address, cus.mobile1, vh.reg_no, sv.description");
		$this->db->from('receipt AS rp');
		$this->db->join('receipt_detail AS rd', 'rp.receipt_id = rd.receipt_id');
		$this->db->join('customer AS cus', 'rp.customer_id = cus.customer_id');
		$this->db->join('vehicle AS vh', 'rp.vehicle_id = vh.vehicle_id');
		$this->db->join('service AS sv', 'rd.service_id = sv.service_id');
		if(($search_text) != '')
		{
			$this->db->like('vh.reg_no', $search_text);
			$this->db->or_like('cus.customer_name', $search_text);
			$this->db->like('iv.invoice_id', $search_text);
			$this->db->or_like('rp.receipt_id', $search_text);
			$this->db->or_like('cus.nic', $search_text);
		}
		if ($start_date != null && $end_date != null){
			$this->db->where('rd.receipt_created_date >=', $start_date);
			$this->db->where('rd.receipt_created_date <=', $end_date);
		}

		return $this->db->get();
	}

	public function search_invoice_summery($search_text, $start_date){
//				echo "<pre>";
//		print_r($start_date);
//		exit();
		$this->db->select("iv.invoice_id, iv.booking_id, b.service_date, cus.customer_id, cus.first_name,cus.nic, 
				cus.last_name, cus.mobile1, vh.reg_no,iv.total_price");
		$this->db->from('invoice AS iv');
		$this->db->join('booking AS b', 'iv.booking_id = b.booking_id');
		$this->db->join('customer AS cus', 'iv.nic = cus.nic');
		$this->db->join('vehicle AS vh', 'iv.reg_no = vh.reg_no');
		if(($search_text) != '')
		{
			$this->db->like('vh.reg_no', $search_text);
			$this->db->or_like('cus.first_name', $search_text);
			$this->db->or_like('cus.last_name', $search_text);
			$this->db->or_like('iv.invoice_id', $search_text);
			$this->db->or_like('iv.booking_id', $search_text);
			$this->db->or_like('cus.nic', $search_text);
		}

		if ($start_date != null ){
			$this->db->where('b.service_date =', $start_date);
//			$this->db->or_where('b.service_date <=', $end_date);
		}
//		$this->db->order_by('iv.invoice_id', 'DESC');
		return $this->db->get();
	}

	public function search_invoice_detail($search_text, $start_date, $end_date){
		$sql = "SELECT invoice_id FROM invoice";
		$return =$this->db->query($sql);

		if($start_date != null && $end_date != null){
			$sql = "SELECT iv.invoice_id, iv.booking_id, b.service_date,iv.nic,  iv.reg_no,iv.total_price 
                FROM invoice as iv,booking AS  b
				WHERE iv.booking_id = b.booking_id and '$search_text' like iv.invoice_id 
				or '$search_text' like iv.booking_id  or '$search_text' like iv.nic 
				 or '$search_text' like iv.reg_no or '$search_text' like iv.total_price
				or b.service_date >=  '$start_date' and b.service_date <= '$end_date'";
			$return =$this->db->query($sql);
			$array=$return->result_array();}

		elseif($start_date != null || $end_date != null){
		$sql = "SELECT iv.invoice_id, iv.booking_id, b.service_date,iv.nic,  iv.reg_no,iv.total_price 
                FROM invoice as iv,booking AS  b
				WHERE iv.booking_id = b.booking_id and '$search_text' like iv.invoice_id 
				or '$search_text' like iv.booking_id  or '$search_text' like iv.nic 
				 or '$search_text' like iv.reg_no or '$search_text' like iv.total_price
				or b.service_date >=  '$start_date' or b.service_date <= '$end_date'";
		$return =$this->db->query($sql);
		$array=$return->result_array();}
		else{
			$sql = "SELECT iv.invoice_id, iv.booking_id, b.service_date,iv.nic,  iv.reg_no,iv.total_price 
                FROM invoice as iv,booking AS  b
				WHERE iv.booking_id = b.booking_id and '$search_text' like iv.invoice_id 
				or '$search_text' like iv.booking_id   or '$search_text' like iv.nic 
				 or '$search_text' like iv.reg_no or '$search_text' like iv.total_price";
		$return =$this->db->query($sql);
		$array=$return->result_array();
		}
		for ($i = 1; $i <= $return->num_rows(); $i++) {




			$sql = "SELECT group_concat(concat(item_id)) as item_id FROM invoice_item_detail where invoice_id=$i";
			$item =$this->db->query($sql);
			$item=$item->result_array();
			$item=$item[0];
			$sql = "SELECT group_concat(concat(service_id)) as service_id FROM invoice_service_detail where invoice_id=$i";
			$service =$this->db->query($sql);
			$service=	$service->result_array();
			$service=$service[0];
			$array[$i-1][]=$item;
			$array[$i-1][]=$service;


		}

		return $array;
	}
	public function get_booking_summery()
	{
		$this->db->select("b.booking_id, b.email, b.service_date, b.service_time_id, b.customer_name, 
				b.nic, b.address, b.mobile1, b.reg_no");
		$this->db->from('booking AS b');

		return $this->db->get();

	}
	public function search_booking_summery($search_text, $start_date){
//		echo "<pre>";
//		print_r($search_text);
//		exit();

		$this->db->select("b.booking_id, b.email, b.service_date, b.service_time_id, b.customer_name, 
				b.nic, b.address, b.mobile1, b.reg_no");
		$this->db->from('booking AS b');
		if(($search_text) != '')
		{
			$this->db->like('b.reg_no', $search_text);
			$this->db->or_like('b.customer_name', $search_text);
			$this->db->or_like('b.booking_id', $search_text);
			$this->db->or_like('b.nic', $search_text);
			$this->db->or_like('b.email', $search_text);
			$this->db->or_like('b.service_time_id', $search_text);
			$this->db->or_like('b.address', $search_text);
		}
		if ($start_date != null ){
			$this->db->where('b.service_date =', $start_date);
//			$this->db->or_where('b.service_date <=', $end_date);
		}
		//		echo "<pre>";
//		print_r($this->db->get());
//		exit();
		return $this->db->get();
	}
	public function booking_detail()
	{
		$this->db->select("b.booking_id, b.email, b.service_date, b.service_time_id, b.customer_name, 
				b.nic, b.address, b.mobile1, b.reg_no, m.model_name, t.start_time, t.end_time");
		$this->db->from('booking AS b');
		$this->db->join('time_date AS td', 'b.booking_id = td.booking_id');
		$this->db->join('service_time AS t', 'td.time_id = t.time_id');
		$this->db->join('vehicle AS vh', 'b.reg_no = vh.reg_no');
		$this->db->join('model AS m', 'vh.model_id = m.model_id');



		return $this->db->get();

	}
	public function search_booking_detail($search_text, $start_date){
		$this->db->select("b.booking_id, b.email, b.service_date, b.service_time_id, b.customer_name, 
				b.nic, b.address, b.mobile1, b.reg_no, m.model_name, t.start_time, t.end_time");
		$this->db->from('booking AS b');
		$this->db->join('time_date AS td', 'b.booking_id = td.booking_id');
		$this->db->join('service_time AS t', 'td.time_id = t.time_id');
		$this->db->join('vehicle AS vh', 'b.reg_no = vh.reg_no');
		$this->db->join('model AS m', 'vh.model_id = m.model_id');
		if(($search_text) != '')
		{
			$this->db->like('b.reg_no', $search_text);
			$this->db->or_like('b.customer_name', $search_text);
			$this->db->or_like('b.booking_id', $search_text);
			$this->db->or_like('b.nic', $search_text);
			$this->db->or_like('b.email', $search_text);
			$this->db->or_like('b.service_time_id', $search_text);
			$this->db->or_like('b.address', $search_text);
		}
		if ($start_date != null){
			$this->db->where('b.service_date =', $start_date);
//			$this->db->or_where('b.service_date <=', $end_date);
		}
		return $this->db->get();

	}

	public function get_invoice_details11()
	{
		$sql = "SELECT invoice_id FROM invoice";
		$return =$this->db->query($sql);
//				echo "<pre>";
//		print_r($return->num_rows());
//		exit();
		$sql = "SELECT iv.invoice_id, iv.booking_id, b.service_date,iv.nic,  iv.reg_no,iv.total_price
                FROM invoice as iv,booking as b
				WHERE iv.booking_id = b.booking_id
				 ";
		$return =$this->db->query($sql);
		$array=$return->result_array();
		for ($i = 1; $i <= $return->num_rows(); $i++) {




		$sql = "SELECT group_concat(concat(item_id)) as item_id FROM invoice_item_detail where invoice_id=$i";
		$item =$this->db->query($sql);
		$item=$item->result_array();
			$item=$item[0];
		$sql = "SELECT group_concat(concat(service_id)) as service_id FROM invoice_service_detail where invoice_id=$i";
		$service =$this->db->query($sql);
		$service=	$service->result_array();
		$service=$service[0];
			$array[$i-1][]=$item;
			$array[$i-1][]=$service;


		}
//				echo "<pre>";
//		print_r($array);
//		exit();


		return $array;

	}





}
