<?php
	//membuat class baru inherit CI_Model
	class Sector_model extends CI_Model
	{
		
		function getSector()
		{
			$query_str = "SELECT s.*,t.tod_name, t.tod_id FROM ms_sector s JOIN ms_type_of_delivery t ON s.tod_id = t.tod_id";
			$tampil = $this->db->query($query_str);
		
		
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
		
		
		function saveSector($data)
		{
			$this->db->insert('ms_sector',$data);
			
		}
		
		
		function updateSector($data, $id)
		{
			$query = $this->db->update('ms_sector',$data, array('sector_id' => $id));
			return $query;
		}
		
		
		function deleteSector()
		{
			$query = $this->db->update('ms_sector',$data, array('sector_id' => $id));
			return $query;
		}
		
	}
?>