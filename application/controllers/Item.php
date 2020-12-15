<?php
	class Item extends CI_Controller
	{
		function __construct(){
		parent::__construct();
		
		if($this->session->userdata('status') != "loginadmin"){
			redirect(base_url("loginadmin"));
		}
		}
		
		//fungsi yang pertama kali diload ketika memanggil controller karyawan
		function index()
		{
			
			$this->load->model('admin/Item_model');
			$this->load->model('admin/Category_model');
			$this->load->model('admin/TypeDelivery_model');
			$this->load->model('admin/City_model');
			$data['item'] = $this->Item_model->getItem();
			$data['category'] = $this->Category_model->getCategory();
			$data['tod'] = $this->TypeDelivery_model->getTypeDelivery();
			$data['city'] = $this->City_model->getCity();
			$datas['username_login'] = $this->session->userdata('username_login');
			$this->load->view('admin/head', $datas);
			$this->load->view('admin/head2');
			$this->load->view('admin/incoming_item', $data);
			
		}
		
		
		function save()
		{
			$this->load->model('admin/Item_model');
			$data = array(
				'item_entry_date' => $this->input->post('item_entry_date'),
				'item_sender_name' => $this->input->post('item_sender_name'),
				'item_sender_address' => $this->input->post('item_sender_address'),
				'item_sender_city' => $this->input->post('item_sender_city'),
				'item_sender_province' => $this->input->post('item_sender_province'),
				'item_sender_postal_code' => $this->input->post('item_sender_postal_code'),
				'item_sender_telp' => $this->input->post('item_sender_telp'),
				'item_receiver_name' => $this->input->post('item_receiver_name'),
				'item_receiver_address' => $this->input->post('item_receiver_address'),
				'item_receiver_city' => $this->input->post('item_receiver_city'),
				'item_receiver_province' => $this->input->post('item_receiver_province'),
				'item_receiver_postal_code' => $this->input->post('item_receiver_postal_code'),
				'item_receiver_telp' => $this->input->post('item_receiver_telp'),
				'item_weight' => $this->input->post('item_weight'),
				'item_length' => $this->input->post('item_length'),
				'item_width' => $this->input->post('item_width'),
				'item_height' => $this->input->post('item_height'),
				'category_id' => $this->input->post('category_id'),
				'item_desc' => $this->input->post('item_desc'),
				'tod_id' => $this->input->post('tod_id'),
			);
			$this->Item_model->saveUser($data);
			$this->session->set_flashdata('add_success', 'Item data has been added successfully');
			redirect ('User');
			
		}
		
	
			
	}
?>