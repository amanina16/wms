<?php
	//membuat class baru inherit CI_Model
	class City_model extends CI_Model
	{
				
		function getCity()
		{
			
			$query_str = "SELECT c.*,d.dp_name, d.dp_code FROM ms_city c JOIN ms_droppoint d ON d.dp_id = c.dp_id";
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
		
		
		function saveCity($data)
		{
			$this->db->insert('ms_city',$data);
			
		}
		
		
		function updateCity($data, $id)
		{
			$query = $this->db->update('ms_city',$data, array('city_id' => $id));
			return $query;
		}
		
		
		function deleteCity()
		{
			$query = $this->db->update('ms_city',$data, array('city_id' => $id));
			return $query;
		}
		
	}
?>