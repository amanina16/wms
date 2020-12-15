<?php
	class Rack extends CI_Controller
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
			$this->load->model('admin/Sector_model');
			$this->load->model('admin/Rack_model');
			$this->load->model('admin/Droppoint_model');
			$data['rack'] = $this->Rack_model->getRack();
			$data['sector'] = $this->Sector_model->getSector();
			$data['dp'] = $this->Droppoint_model->getDroppoint();
			$datas['username_login'] = $this->session->userdata('username_login');
			$this->load->view('admin/head', $datas);
			$this->load->view('admin/head2');
			$this->load->view('admin/master_rack', $data);
			
		}
		
		
		function save()
		{
			$this->load->model('admin/Rack_model');
			$data = array(
				'rack_name' => $this->input->post('rack_name'),
				'rack_capacity' => $this->input->post('rack_capacity'),
				'rack_actual' => $this->input->post('rack_actual'),
				'sector_id' => $this->input->post('sector_id'),
				'dp_id' => $this->input->post('dp_id'),
				'rack_status' => '1',
			);
			$this->Rack_model->saveRack($data);
			$this->session->set_flashdata('add_success', 'Rack data has been added successfully');
			redirect ('Rack');
			
		}
		
		function update()
		{
			$this->load->model('admin/Rack_model');
			$id = $this->input->post('rack_id');
			$data = array(
				'rack_name' => $this->input->post('rack_name'),
				'rack_capacity' => $this->input->post('rack_capacity'),
				'rack_actual' => $this->input->post('rack_actual'),
				'sector_id' => $this->input->post('sector_id'),
				'dp_id' => $this->input->post('dp_id'),
			);
			$this->Rack_model->updateRack($data,$id);
			$this->session->set_flashdata('edit_success', 'Rack data has been changed successfully');
			redirect ('Rack');
			
		}
		
		function delete()
		{
			$this->load->model('admin/Rack_model');
			$id = $this->input->post('rack_id');
			$status = $this->input->post('status');
			$data = array(
				'rack_status' => $status,
			);
			$this->Rack_model->updateRack($data,$id);
			if($status == "1")
			{
				$this->session->set_flashdata('active_success', 'Rack data is successfully activated');
			}
			else
			{
				$this->session->set_flashdata('active_success', 'Rack data is successfully deactivated');
			}
			redirect('Rack');
		}
		
			
	}
?>