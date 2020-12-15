<?php
	//membuat class baru inherit CI_Model
	class Item_model extends CI_Model
	{
				
		function getItem()
		{
			
			$query_str = "SELECT i.*,t.tod_id, t.tod_name, c.category_id, c.category_name,r.rack_id, r.rack_name
						 FROM tr_item i 
						JOIN ms_type_of_delivery t ON i.tod_id = t.tod_id 
						JOIN ms_category c ON c.category_id = i.category_id
						JOIN ms_rack r ON r.rack_id = i.rack_id
						";
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
		
		
		function saveItem($data)
		{
			$this->db->insert('tr_item',$data);
			
		}
		
		
		function updateItem($data, $id)
		{
			$query = $this->db->update('tr_item',$data, array('item_id' => $id));
			return $query;
		}
		
		
		function deleteItem()
		{
			$query = $this->db->update('tr_item',$data, array('item_id' => $id));
			return $query;
		}
		
	}
?>