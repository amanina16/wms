<?php
	class Droppoint extends CI_Controller
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
			
			$this->load->model('admin/Droppoint_model');
			$data['dp'] = $this->Droppoint_model->getDroppoint();
			$data['username_login'] = $this->session->userdata('username_login');
			$this->load->view('admin/head', $data);
			$this->load->view('admin/head2');
			$this->load->view('admin/master_droppoint', $data);
			
		}
		
		
		function save()
		{
			$this->load->model('admin/Droppoint_model');
			$data = array(
				'dp_name' => $this->input->post('dp_name'),
				'dp_code' => $this->input->post('dp_code'),
				'dp_status' => '1',
			);
			$this->Droppoint_model->saveDroppoint($data);
			$this->session->set_flashdata('add_success', 'Droppoint data has been added successfully');
			redirect ('Droppoint');
			
		}
		
		function update()
		{
			$this->load->model('admin/Droppoint_model');
			$id = $this->input->post('dp_id');
			$data = array(
				'dp_name' => $this->input->post('dp_name'),
				'dp_code' => $this->input->post('dp_code'),
			);
			$this->Droppoint_model->updateDroppoint($data,$id);
			$this->session->set_flashdata('edit_success', 'Droppoint data has been changed successfully');
			redirect ('Droppoint');
			
		}
		
		function delete()
		{
			$this->load->model('admin/Droppoint_model');
			$id = $this->input->post('dp_id');
			$status = $this->input->post('status');
			$data = array(
				'dp_status' => $status,
			);
			$this->Droppoint_model->updateDroppoint($data,$id);
			if($status == "1")
			{
				$this->session->set_flashdata('active_success', 'Droppoint data is successfully activated');
			}
			else
			{
				$this->session->set_flashdata('active_success', 'Droppoint data is successfully deactivated');
			}
			redirect('Droppoint');
		}
		
			
	}
?>