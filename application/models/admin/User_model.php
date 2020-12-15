<?php
	//membuat class baru inherit CI_Model
	class User_model extends CI_Model
	{
		
		function getUser()
		{
				
			$tampil = $this->db->get('ms_user');
		
		
			//memeriksa jumlah row yang ditemukan pada tabel user tusernameak 0
			if($tampil->num_rows() > 0)
			{
				//perulangan untuk setiap data yang ditemukan
				//akan diletakkan pada variabel $data
				foreach ($tampil->result() as $data)
				{
					//setiap data yang ditemukan diletakkan pada array $hasil
					$hasil[]=$data;
				}
				//mengembalikan nilai data user pada array $hasil
				return $hasil;
			}
		}
		
		
		function saveUser($data)
		{
			$this->db->insert('ms_user',$data);
			
		}
		
		
		function updateUser($data, $id)
		{
			$query = $this->db->update('ms_user',$data, array('user_id' => $id));
			return $query;
		}
		
		
		function deleteUser()
		{
			$query = $this->db->update('ms_user',$data, array('user_id' => $id));
			return $query;
		}
		
	}
?>