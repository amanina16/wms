<?php
	//membuat class baru inherit CI_Model
	class Category_model extends CI_Model
	{
		
		function getCategory()
		{
				
			$tampil = $this->db->get('ms_category');
		
		
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
		
		
		function saveCategory($data)
		{
			$this->db->insert('ms_category',$data);
			
		}
		
		
		function updateCategory($data, $id)
		{
			$query = $this->db->update('ms_category',$data, array('category_id' => $id));
			return $query;
		}
		
		
		function deleteCategory()
		{
			$query = $this->db->update('ms_category',$data, array('category_id' => $id));
			return $query;
		}
		
	}
?>