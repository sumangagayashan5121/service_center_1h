<?php


class ItemController extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model("ItemModel");
		$this->load->model("PermissionModel");
		$this->load->model("CategoryModel");
		$this->load->model("SupplierModel");

	}

	public function index(){
		if ($this->PermissionModel->get_permission(MO_ITEM_LIST)){
		$item_list = $this->ItemModel->get_item_list();
		$this->load->view("header");
		$this->load->view("item/item_list", array('item_list' => $item_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function create_item(){
		if ($this->PermissionModel->get_permission(MO_ITEM_CREATE)){
			$category_list = $this->CategoryModel->get_category_list();
			$supplier_list = $this->SupplierModel->get_supplier_list();

		$this->load->view("header");
		$this->load->view("item/item_create", array('category_list' => $category_list,'supplier_list' => $supplier_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}

	}

	public function save_item(){
		$item = array(
			'item_code' => $this->input->post('item_code'),
			'barcode' => $this->input->post('barcode'),
			'category_id' => $this->input->post('category_id'),
			'description'=> $this->input->post('description'),
			'selling_price' => $this->input->post('selling_price'),
			'cost_price' => $this->input->post('cost_price'),
			'supplier_id' => $this->input->post('supplier_id'),
			'created_date' => date('Y-m-d h:i:s'),
			'created_user_id' => $this->session->userdata('user_id'),
			'status' => $this->input->post('status'),
			'qty' => $this->input->post('qty')

		);
		$this->ItemModel->save_item($item);
		$this->index();
	}

	public function edit_item(){
		if ($this->PermissionModel->get_permission(MO_ITEM_EDIT)){
			$category_list = $this->CategoryModel->get_category_list();
			$supplier_list = $this->SupplierModel->get_supplier_list();
		$id = $this->input->get('id');
		$item = $this->ItemModel->get_item_by_id($id);
		$this->load->view("header");
		$this->load->view("item/item_edit",array('item'=>$item,'category_list' => $category_list,'supplier_list' => $supplier_list));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}

	public function update_item(){
		$id = $this->input->post('id');
		$item = array(
			'item_code' => $this->input->post('item_code'),
			'barcode' => $this->input->post('barcode'),
			'category_id' => $this->input->post('category_id'),
			'description'=> $this->input->post('description'),
			'selling_price' => $this->input->post('selling_price'),
			'cost_price' => $this->input->post('cost_price'),
			'supplier_id' => $this->input->post('supplier_id'),
			'created_date' => date('Y-m-d h:i:s'),
			'created_user_id' => $this->session->userdata('user_id'),
			'status' => $this->input->post('status'),
			'qty' => $this->input->post('qty')

		);
		$this->ItemModel->update_item($item, $id);
		$this->index();
	}
	public function view_item(){
		if ($this->PermissionModel->get_permission(MO_ITEM_VIEW)){
		$id = $this->input->get('id');
		$item = $this->ItemModel->view_get_item_by_id($id);
		$this->load->view("header");
		$this->load->view("item/item_view", array('item'=> $item));
		$this->load->view("footer");
		}else{
			$this->load->view('403');
		}
	}
}
