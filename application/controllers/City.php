<?php
	class City extends CI_Controller
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
			$this->load->model('admin/City_model');
			$data['city'] = $this->City_model->getCity();
			$data['dp'] = $this->Droppoint_model->getDroppoint();
			$datas['username_login'] = $this->session->userdata('username_login');
			$this->load->view('admin/head', $datas);
			$this->load->view('admin/head2');
			$this->load->view('admin/master_city', $data);
			
		}
		
		
		function save()
		{
			$this->load->model('admin/City_model');
			$data = array(
				'city_name' => $this->input->post('city_name'),
				'city_code' => $this->input->post('city_code'),
				'dp_id' => $this->input->post('dp_id'),
				'city_status' => '1',
			);
			$this->City_model->saveCity($data);
			$this->session->set_flashdata('add_success', 'City data has been added successfully');
			redirect ('City');
			
		}
		
		function update()
		{
			$this->load->model('admin/City_model');
			$id = $this->input->post('city_id');
			$data = array(
				'city_name' => $this->input->post('city_name'),
				'city_code' => $this->input->post('city_code'),
				'dp_id' => $this->input->post('dp_id'),
			);
			$this->City_model->updateCity($data,$id);
			$this->session->set_flashdata('edit_success', 'City data has been changed successfully');
			redirect ('City');
			
		}
		
		function delete()
		{
			$this->load->model('admin/City_model');
			$id = $this->input->post('city_id');
			$status = $this->input->post('status');
			$data = array(
				'city_status' => $status,
			);
			$this->City_model->updateCity($data,$id);
			if($status == "1")
			{
				$this->session->set_flashdata('active_success', 'City data is successfully activated');
			}
			else
			{
				$this->session->set_flashdata('active_success', 'City data is successfully deactivated');
			}
			redirect('City');
		}
		
			
	}
?>