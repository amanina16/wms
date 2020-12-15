<?php
	//membuat class baru inherit CI_Model
	class Droppoint_model extends CI_Model
	{
		
		function getDroppoint()
		{
				
			$tampil = $this->db->get('ms_droppoint');
		
		
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
		
		
		function saveDroppoint($data)
		{
			$this->db->insert('ms_droppoint',$data);
			
		}
		
		
		function updateDroppoint($data, $id)
		{
			$query = $this->db->update('ms_droppoint',$data, array('dp_id' => $id));
			return $query;
		}
		
		
		function deleteDroppoint()
		{
			$query = $this->db->update('ms_droppoint',$data, array('dp_id' => $id));
			return $query;
		}
		
	}
?>