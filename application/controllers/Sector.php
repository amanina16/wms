<?php
	class Sector extends CI_Controller
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
			$this->load->model('admin/TypeDelivery_model');
			$data['sector'] = $this->Sector_model->getSector();
			$data['tod'] = $this->TypeDelivery_model->getTypeDelivery();
			$datas['username_login'] = $this->session->userdata('username_login');
			$this->load->view('admin/head', $datas);
			$this->load->view('admin/head2');
			$this->load->view('admin/master_sector', $data);
			
		}
		
		
		function save()
		{
			$this->load->model('admin/Sector_model');
			$data = array(
				'sector_name' => $this->input->post('sector_name'),
				'sector_desc' => $this->input->post('sector_desc'),
				'tod_id' => $this->input->post('tod_id'),
				'sector_status' => '1',
			);
			$this->Sector_model->saveSector($data);
			$this->session->set_flashdata('add_success', 'Sector data has been added successfully');
			redirect ('Sector');
			
		}
		
		function update()
		{
			$this->load->model('admin/Sector_model');
			$id = $this->input->post('sector_id');
			$data = array(
				'sector_name' => $this->input->post('sector_name'),
				'sector_desc' => $this->input->post('sector_desc'),
				'tod_id' => $this->input->post('tod_id'),
			);
			$this->Sector_model->updateSector($data,$id);
			$this->session->set_flashdata('edit_success', 'Sector data has been changed successfully');
			redirect ('Sector');
			
		}
		
		function delete()
		{
			$this->load->model('admin/Sector_model');
			$id = $this->input->post('sector_id');
			$status = $this->input->post('status');
			$data = array(
				'sector_status' => $status,
			);
			$this->Sector_model->updateSector($data,$id);
			if($status == "1")
			{
				$this->session->set_flashdata('active_success', 'Sector data is successfully activated');
			}
			else
			{
				$this->session->set_flashdata('active_success', 'Sector data is successfully deactivated');
			}
			redirect('Sector');
		}
		
			
	}
?>