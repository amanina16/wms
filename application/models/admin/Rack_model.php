<?php
	//membuat class baru inherit CI_Model
	class Rack_model extends CI_Model
	{
				
		function getRack()
		{
			
			$query_str = "SELECT r.*,s.sector_name, d.dp_code, d.dp_name FROM ms_rack r JOIN ms_sector s ON s.sector_id = r.sector_id JOIN ms_droppoint d ON d.dp_id = r.dp_id";
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
		
		
		function saveRack($data)
		{
			$this->db->insert('ms_rack',$data);
			
		}
		
		
		function updateRack($data, $id)
		{
			$query = $this->db->update('ms_rack',$data, array('rack_id' => $id));
			return $query;
		}
		
		
		function deleteRack()
		{
			$query = $this->db->update('ms_rack',$data, array('rack_id' => $id));
			return $query;
		}
		
	}
?>