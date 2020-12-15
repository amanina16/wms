<?php
	//membuat class baru inherit CI_Model
	class Login_model extends CI_Model
	{
		function cek_login($username,$password,$status){
			
		return $this->db->get_where('ms_user',array('user_username'=>$username,'user_password'=>$password,'user_status'=>$status));
		
		}	
		
		
		
		
		
    }  
	
?>