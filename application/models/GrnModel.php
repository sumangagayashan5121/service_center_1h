<?php


class GrnModel extends CI_Model
{

	public function save_grn($data){

		$grn = array(
			'invoice_number' => $data['invoice_no'],
			'supplier_id' => $data['supplier_id'],
			'total_cost' => $data['total_cost_amount'],
			'total_sell' => $data['total_selling_amount'],
			'created_date'=>date('Y-m-d'),
			'created_by' => $this->session->userdata('user_id'),
			'status' => 1
		);

		$this->db->insert('grn', $grn);
		$grn_id = $this->db->insert_id();

		for ($i = 0; $i < count($data['product_code']); $i++) {

			$grn_detail = array(
				'item_created_date'=>date('Y-m-d'),
				'grn_id' => $grn_id,
				'item_id' => $data['product_code'][$i],
				'selling_price'=>$data['selling_price'][$i],
				'cost_price'=>$data['cost_price'][$i],
				'qty'=>$data['qty'][$i]
			);

			$this->db->insert('grn_detail', $grn_detail);

		}
		return $grn_id;
	}

	public function set_qty($data){
//		echo "<pre>";
//			print_r($data['product_code']);
//			exit();
		$total=count($data['product_code']);
//		echo "<pre>";
//			print_r($total);
//			exit();

		for ($i = 0; $i < $total; $i++) {
			//			echo "<pre>";
//			print_r($qty);
//			exit();

				$item_id = $data['product_code'][$i];
				$qty=$data['qty'][$i];
//			echo "<pre>";
//			print_r($qty);
//			exit();

			$sql = "SELECT qty FROM item WHERE item_id = ?";
			$item_qty = $this->db->query($sql, $item_id)->row_array();
			$st=$item_qty['qty'];

			$datas=$qty+$st;
			$data1=array(
				'qty'=>$datas
			);
			$this->db->where('item_id', $item_id);
			$this->db->update('item', $data1);
		}
	}







	public function get_grn_details($grn_id)
	{

		$this->db->select("s.supplier_id, s.supplier_name, s.address, s.mobile1, s.mobile2, s.email, s.contact_person, 
				 		g.invoice_number, g.created_date, g.remarks, us.first_name,g.grn_id,
				 		i.item_id, i.item_code, i.barcode, gd.cost_price, gd.qty, i.description");
		$this->db->from('grn AS g');
		$this->db->join('grn_detail AS gd', 'g.grn_id = gd.grn_id');
		$this->db->join('supplier AS s', 'g.supplier_id = s.supplier_id');
		$this->db->join('user AS us', 'g.created_by = us.user_id');
		$this->db->join('item AS i', 'gd.item_id = i.item_id');
		$this->db->where('g.grn_id', $grn_id);

		return $this->db->get();

	}


	public function validate_product($product)
	{
		$sql = "SELECT * FROM item where item_code = ?";
		$result = $this->db->query($sql, $product)->result_array();
		$result['count'] = count($result);
		return $result;
	}

}
