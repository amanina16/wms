<?php
	class User extends CI_Controller
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
			
			$this->load->model('admin/User_model');
			$data['user'] = $this->User_model->getUser();
			$data['username_login'] = $this->session->userdata('username_login');
			$this->load->view('admin/head', $data);
			$this->load->view('admin/head2');
			$this->load->view('admin/master_user', $data);
			
		}
		
		
		function save()
		{
			$this->load->model('admin/User_model');
			$data = array(
				'user_name' => $this->input->post('user_name'),
				'user_role' => $this->input->post('user_role'),
				'user_username' => $this->input->post('user_username'),
				'user_password' => $this->input->post('user_password'),
				'user_email' => $this->input->post('user_email'),
				'user_telp' => $this->input->post('user_telp'),
				'user_status' => '1',
			);
			$this->User_model->saveUser($data);
			$this->session->set_flashdata('add_success', 'User data has been added successfully');
			redirect ('User');
			
		}
		
		function update()
		{
			$this->load->model('admin/User_model');
			$id = $this->input->post('user_id');
			$data = array(
				'user_name' => $this->input->post('user_name'),
				'user_role' => $this->input->post('user_role'),
				'user_username' => $this->input->post('user_username'),
				'user_password' => $this->input->post('user_password'),
				'user_email' => $this->input->post('user_email'),
				'user_telp' => $this->input->post('user_telp'),
			);
			$this->User_model->updateUser($data,$id);
			$this->session->set_flashdata('edit_success', 'User data has been changed successfully');
			redirect ('User');
			
		}
		
		function delete()
		{
			$this->load->model('admin/User_model');
			$id = $this->input->post('user_id');
			$status = $this->input->post('status');
			$data = array(
				'user_status' => $status,
			);
			$this->User_model->updateUser($data,$id);
			if($status == "1")
			{
				$this->session->set_flashdata('active_success', 'User data is successfully activated');
			}
			else
			{
				$this->session->set_flashdata('active_success', 'User data is successfully deactivated');
			}
			redirect('User');
		}
		
			
	}
?>