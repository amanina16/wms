<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); 


	class Login extends CI_Controller
	{
		function __construct(){
		parent::__construct();
				
		$this->load->model('Login_model');
		}
		
		
		//fungsi yang pertama kali diload ketika memanggil controller karyawan
		function index()
		{
			$this->load->view('login');
		}
		
		function register()
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
			redirect ('Login');
			
		}
		function aksi_login(){
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = array(
				'username' => $username,
				'password' => md5($password)
				);
			$cek = $this->Login_model->cek_login($username,$password,'1');
			if($cek->num_rows() > 0){
				$role = $cek->row()->user_role;				
				if( $role == 'Admin')
				{
					$data_session = array(
					'status' => "loginadmin",
					'id_login' => $cek->row()->user_id,
					'name_login' => $cek->row()->user_name,
					'username_login' => $cek->row()->user_username,
					'email_login' => $cek->row()->user_email,
					);
					$this->load->library('session');
					$this->session->set_userdata($data_session);
					redirect(base_url("Admin"));
				}
				else if ($role == 'Checker')
				{
					$data_session = array(
					'status' => "loginchecker",
					'id_login' => $cek->row()->user_id,
					'name_login' => $cek->row()->user_name,
					'username_login' => $cek->row()->user_username,
					'email_login' => $cek->row()->user_email,
					);
					$this->load->library('session');
					$this->session->set_userdata($data_session);
					redirect(base_url("Checker"));
				}
				else if ($role == 'Driver')
				{
					$data_session = array(
					'status' => "logindriver",
					'id_login' => $cek->row()->user_id,
					'name_login' => $cek->row()->user_name,
					'username_login' => $cek->row()->user_username,
					'email_login' => $cek->row()->user_email,
					);
					$this->load->library('session');
					$this->session->set_userdata($data_session);
					redirect(base_url("Driver"));
				}
				else if ($role == 'Manager')
				{
					$data_session = array(
					'status' => "logindriver",
					'id_login' => $cek->row()->user_id,
					'name_login' => $cek->row()->user_name,
					'username_login' => $cek->row()->user_username,
					'email_login' => $cek->row()->user_email,
					);
					$this->load->library('session');
					$this->session->set_userdata($data_session);
					redirect(base_url("Manager"));
				}
				else{
					//redirect(base_url("Login"));
				}
				
			}else{
				echo '<script language="javascript">';
				echo 'alert("Username dan password salah !")';
				echo '</script>';
				$this->load->view('login');
			}
		}
	 
		function logout(){
			
			$this->session->sess_destroy();
			redirect(base_url('login'));
		}
		
		function reset_password(){
		
		
		}
		

	
	}
?>