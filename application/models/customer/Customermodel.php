<?php
	//membuat class baru inherit CI_Model
	class Customermodel extends CI_Model
	{
		//fungsi untuk melakukan penambahan data pada database
		function tambah()
		{
			//mengambil namalengkap_pengguna, email_pengguna, dan pesan dari View
			//lalu diletakkan pada variabel $namalengkap_pengguna, $email_pengguna, $pesan
			//$id_pengguna = $this->input->post('id_pengguna');
			$namalengkap_pengguna = $this->input->post('namalengkap_pengguna');
			$no_KTP	= '';
			$jeniskelamin_pengguna	= $this->input->post('jeniskelamin_pengguna');
			$alamat_pengguna = $this->input->post('alamat_pengguna');
			$telp_pengguna = $this->input->post('telp_pengguna');
			$email_pengguna = $this->input->post('email_pengguna');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$role = 'Pelanggan';
			$totalgaji_pengguna = '';
			$status_pengguna= 'Aktif';
			//meletakkan isi dari variabel $namalengkap_pengguna, $email_pengguna, dan $pesan dalam array//'namalengkap_pengguna. 'email_pengguna, 'pesan' adalah namalengkap_pengguna kolom di tabel pada database
			$data = array('namalengkap_pengguna'=>$namalengkap_pengguna,'jeniskelamin_pengguna'=>$jeniskelamin_pengguna,
			'no_KTP'=>$no_KTP,'alamat_pengguna'=>$alamat_pengguna,
			'telp_pengguna'=>$telp_pengguna,'email_pengguna'=>$email_pengguna,'username'=>$username,
			'password'=>$password,'role'=>$role,'totalgaji_pengguna'=>$totalgaji_pengguna,
			'status_pengguna'=>$status_pengguna);
			
			
			//menginput array $data ke dalam tabel user pada database
			$this->db->insert('ms_pengguna',$data);
		}
		
		//fungsi untuk membaca data dari database
		function tampil()
		{
			//mengambil data dari tabel user di db
			//diletakkan pada variabel $tampil
			$role = 'Pelanggan';
			$tampil = $this->db->get_where('ms_pengguna',array('role'=>$role));
			
			
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
		
		//fungsi untuk menghapus data pada database dengan parameter $username
	}
?>