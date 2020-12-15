<?php
	class Category extends CI_Controller
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
			
			$this->load->model('admin/Category_model');
			$data['category'] = $this->Category_model->getCategory();
			$data['username_login'] = $this->session->userdata('username_login');
			$this->load->view('admin/head', $data);
			$this->load->view('admin/head2');
			$this->load->view('admin/master_category', $data);
			
		}
		
		
		function save()
		{
			$this->load->model('admin/Category_model');
			$data = array(
				'category_name' => $this->input->post('category_name'),
				'category_row_rack' => $this->input->post('category_row_rack'),
				'category_status' => '1',
			);
			$this->Category_model->saveCategory($data);
			$this->session->set_flashdata('add_success', 'Category data has been added successfully');
			redirect ('Category');
			
		}
		
		function update()
		{
			$this->load->model('admin/Category_model');
			$id = $this->input->post('category_id');
			$data = array(
				'category_name' => $this->input->post('category_name'),
				'category_row_rack' => $this->input->post('category_row_rack'),
			);
			$this->Category_model->updateCategory($data,$id);
			$this->session->set_flashdata('edit_success', 'Category data has been changed successfully');
			redirect ('Category');
			
		}
		
		function delete()
		{
			$this->load->model('admin/Category_model');
			$id = $this->input->post('category_id');
			$status = $this->input->post('status');
			$data = array(
				'category_status' => $status,
			);
			$this->Category_model->updateCategory($data,$id);
			if($status == "1")
			{
				$this->session->set_flashdata('active_success', 'Category data is successfully activated');
			}
			else
			{
				$this->session->set_flashdata('active_success', 'Category data is successfully deactivated');
			}
			redirect('Category');
		}
		
			
	}
?>