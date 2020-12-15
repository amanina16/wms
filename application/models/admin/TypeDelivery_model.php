<?php
	//membuat class baru inherit CI_Model
	class TypeDelivery_model extends CI_Model
	{
		
		function getTypeDelivery()
		{
				
			$tampil = $this->db->get('ms_type_of_delivery');
		
		
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
		
		
		function saveTypeDelivery($data)
		{
			$this->db->insert('ms_type_of_delivery',$data);
			
		}
		
		
		function updateTypeDelivery($data, $id)
		{
			$query = $this->db->update('ms_type_of_delivery',$data, array('tod_id' => $id));
			return $query;
		}
		
		
		function deleteTypeDelivery()
		{
			$query = $this->db->update('ms_type_of_delivery',$data, array('tod_id' => $id));
			return $query;
		}
		
	}
?>