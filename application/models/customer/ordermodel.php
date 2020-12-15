<?php
	//membuat class baru inherit CI_Model
	class ordermodel extends CI_Model
	{
		
		//fungsi untuk membaca data dari database
		function tampil()
		{
			//mengambil data dari tabel user di db
			//diletakkan pada variabel $tampil
			
			$tampil = $this->db->get('tr_pemesanan');
			
			
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
		
		function tampilid($id_pemesanan){
			//membaca data pada tabel komentar sesuai dengan id yang ditampilkan
			return $this->db->get_where('tr_pemesanan',array('id_pemesanan'=>$id_pemesanan))->row();
		}
		
		//fungsi untuk menghapus data pada database dengan parameter $username
		function hapus($id_pemesanan)
		{
			//menghapus data pada database di tabel user
			//dengan username sesuai dengan isi data pada variabel $username
			$data = array(
			'status_pemesanan'=>$status_pemesanan);
			
			//memberikan kondisi bahwa username yang diubah pada database
			//adalah username yang diberikan pada variabel $username
			$this->db->where('id_pemesanan',$id_pemesanan);
			
			
			//mengupdate tabel user sesuai dengan isian array data
			//dan parameter username pada where
			$this->db->update('tr_pemesanan',$data);
			//mengarahkan file ke controller user
			//artinya mengarah ke user/index
			redirect('order');
		}
		
		
		
		
		
		//fungsi untuk mengubah data pada database dengan parameter $username
		function ubahstatusbayar($id_pemesanan)
		{
			//$id_pengguna = $this->input->post('id_pengguna');
			
			$statusbayar_pemesanan = 'Belum Lunas';
			//meletakkan isi dari variabelke tr_pemesanan
			$data = array(
			'statusbayar_pemesanan'=>$statusbayar_pemesanan
			);
			
			
			//menginput array $data ke dalam tabel user pada database
			$this->db->insert('tr_pemesanan',$data);
			
			//memberikan kondisi bahwa username yang diubah pada database
			//adalah username yang diberikan pada variabel $username
			$this->db->where('id_pemesanan',$id_pemesanan);
			
			
			//mengupdate tabel user sesuai dengan isian array data
			//dan parameter username pada where
			$this->db->update('tr_pemesanan',$data);
		}
		
		function ubahstatuspemesanan($id_pemesanan)
		{
			//$id_pengguna = $this->input->post('id_pengguna');
			
			$status_pemesanan= 'Aktif';
			//meletakkan isi dari variabelke tr_pemesanan
			$data = array(
			'status_pemesanan'=>$status_pemesanan
			);
			
			
			//menginput array $data ke dalam tabel user pada database
			$this->db->insert('tr_pemesanan',$data);
			
			//memberikan kondisi bahwa username yang diubah pada database
			//adalah username yang diberikan pada variabel $username
			$this->db->where('id_pemesanan',$id_pemesanan);
			
			
			//mengupdate tabel user sesuai dengan isian array data
			//dan parameter username pada where
			$this->db->update('tr_pemesanan',$data);
		}
		
		
	}
?>