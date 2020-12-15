<?php
	class TypeDelivery extends CI_Controller
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
			
			$this->load->model('admin/TypeDelivery_model');
			$data['tod'] = $this->TypeDelivery_model->getTypeDelivery();
			$data['username_login'] = $this->session->userdata('username_login');
			$this->load->view('admin/head', $data);
			$this->load->view('admin/head2');
			$this->load->view('admin/master_tod', $data);
			
		}
		
		
		function save()
		{
			$this->load->model('admin/TypeDelivery_model');
			$data = array(
				'tod_name' => $this->input->post('tod_name'),
				'tod_code' => $this->input->post('tod_code'),
				'tod_desc' => $this->input->post('tod_desc'),
				'tod_day' => $this->input->post('tod_day'),
				'tod_status' => '1',
			);
			$this->TypeDelivery_model->saveTypeDelivery($data);
			$this->session->set_flashdata('add_success', 'Type of Delivery data has been added successfully');
			redirect ('TypeDelivery');
			
		}
		
		function update()
		{
			$this->load->model('admin/TypeDelivery_model');
			$id = $this->input->post('tod_id');
			$data = array(
				'tod_name' => $this->input->post('tod_name'),
				'tod_code' => $this->input->post('tod_code'),
				'tod_desc' => $this->input->post('tod_desc'),
				'tod_day' => $this->input->post('tod_day'),
			);
			$this->TypeDelivery_model->updateTypeDelivery($data,$id);
			$this->session->set_flashdata('edit_success', 'Type of Delivery data has been changed successfully');
			redirect ('TypeDelivery');
			
		}
		
		function delete()
		{
			$this->load->model('admin/TypeDelivery_model');
			$id = $this->input->post('tod_id');
			$status = $this->input->post('status');
			$data = array(
				'tod_status' => $status,
			);
			$this->TypeDelivery_model->updateTypeDelivery($data,$id);
			if($status == "1")
			{
				$this->session->set_flashdata('active_success', 'Type of Delivery data is successfully activated');
			}
			else
			{
				$this->session->set_flashdata('active_success', 'Type of Delivery data is successfully deactivated');
			}
			redirect('TypeDelivery');
		}
		
			
	}
?>