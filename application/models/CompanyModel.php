<?php


class CompanyModel extends CI_Model
{
	public function get_company_list(){
		$sql = "SELECT * FROM company";
		$return =$this->db->query($sql)->result_array();
		return $return;
	}

	public function save_company($company){
		$this->db->insert('company',$company);

	}

	public function get_company_by_id($id){
		$sql = "SELECT * FROM company WHERE company_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}

	public function update_company($company, $id){
		$this->db->where('company_id', $id);
		$this->db->update('company', $company);

	}
	public function view_get_company_by_id($id){
		$sql = "SELECT * FROM company WHERE company_id = ?";
		$result = $this->db->query($sql, $id)->row_array();
		return $result;

	}
}
