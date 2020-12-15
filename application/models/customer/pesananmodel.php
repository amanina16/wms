<?php
	//membuat class baru inherit CI_Model
	class pesananmodel extends CI_Model
	{
		//fungsi untuk melakukan penambahan data pada database
		function tambah()
		{
			//memasukkan data ke tr_pemesanan
			//$id_pengguna = $this->input->post('id_pengguna');
			$id_pemesanan = $this->input->post('id_pemesanan');
			$id_pengguna = $this->session->userdata('id_pengguna');
			$tanggal_transaksi =   date('Y-m-d H:i:s');
			$tanggal_pemesanan	= $this->input->post('tanggal_pemesanan');;
			$waktu_pemesanan	= $this->input->post('waktu_pemesanan');
			$jenisbangunan_pemesanan = $this->input->post('jenisbangunan_pemesanan');
			$provinsi_pemesanan = $this->input->post('provinsi_pemesanan');
			$kota_pemesanan = $this->input->post('kota_pemesanan');
			$kecamatan_pemesanan = $this->input->post('kecamatan_pemesanan');
			$keteranganalamat_pemesanan = $this->input->post('keteranganalamat_pemesanan');
			$kodepos_pemesanan = $this->input->post('kodepos_pemesanan');
			$telepon_pemesanan = $this->input->post('telepon_pemesanan');
			$jumlahmaid_pemesanan = $this->input->post('jumlahmaid_pemesanan');
			$pesan_pemesanan = $this->input->post('pesan_pemesanan');
			$ijinpetugaslaki_pemesanan = $this->input->post('ijinpetugaslaki_pemesanan');
			$hewanpeliharaan_pemesanan= $this->input->post('hewanpeliharaan_pemesanan');
			$agreeterm_pemesanan = $this->input->post('agreeterm_pemesanan');
			$totalbayar_pemesanan = $this->input->post('totalbayar_pemesanan');
			
			$status_pemesanan= 'Belum Bayar';
			//meletakkan isi dari variabelke tr_pemesanan
			$data = array(
			'id_pemesanan'=>$id_pemesanan,
			'id_pengguna'=>$id_pengguna,
			'tanggal_transaksi'=>$tanggal_transaksi,
			'tanggal_pemesanan'=>$tanggal_pemesanan,
			'waktu_pemesanan'=>$waktu_pemesanan,
			'jenisbangunan_pemesanan'=>$jenisbangunan_pemesanan,
			'provinsi_pemesanan'=>$provinsi_pemesanan,
			'kota_pemesanan'=>$kota_pemesanan,
			'kecamatan_pemesanan'=>$kecamatan_pemesanan,
			'keteranganalamat_pemesanan'=>$keteranganalamat_pemesanan,
			'kodepos_pemesanan'=>$kodepos_pemesanan,
			'telepon_pemesanan'=>$telepon_pemesanan,
			'jumlahmaid_pemesanan'=>$jumlahmaid_pemesanan,
			'pesan_pemesanan'=>$pesan_pemesanan,
			'ijinpetugaslaki_pemesanan'=>$ijinpetugaslaki_pemesanan,
			'hewanpeliharaan_pemesanan'=>$hewanpeliharaan_pemesanan,
			'agreeterm_pemesanan'=>$agreeterm_pemesanan,
			'totalbayar_pemesanan'=> $this->cart->total(),
			'status_pemesanan'=>$status_pemesanan
			);
			
			
			//menginput array $data ke dalam tabel user pada database
			$this->db->insert('tr_pemesanan',$data);
			
			
			//menyimpan data detail layanan yang disimpan
			 $cart = $this->cart->contents();
				  foreach ($cart as $contents) {
					   $id = $contents['id'];
					   $quantity = $contents['qty'];
					   $subtotal = $contents['subtotal'];
					     $datadetail = array(
							'id_pemesanan'=>$id_pemesanan,
							'id_layanan'=>$id,
							'quantity'=>$quantity,
							'subtotal'=>$subtotal);
				  $this->db->insert('detail_trpemesanan',$datadetail);
				  }
				
			 
			
			
			
		}
		
		
		function tambahcustom()
		{
			//memasukkan data ke tr_pemesanan
			//$id_pengguna = $this->input->post('id_pengguna');
			$id_pemesanan = $this->input->post('id_pemesanan');
			$id_pengguna = $this->session->userdata('id_pengguna');
			$tanggal_transaksi =   date('Y-m-d H:i:s');
			$tanggal_pemesanan	= $this->input->post('tanggal_pemesanan');;
			$waktu_pemesanan	= $this->input->post('waktu_pemesanan');
			$jenisbangunan_pemesanan = $this->input->post('jenisbangunan_pemesanan');
			$provinsi_pemesanan = $this->input->post('provinsi_pemesanan');
			$kota_pemesanan = $this->input->post('kota_pemesanan');
			$kecamatan_pemesanan = $this->input->post('kecamatan_pemesanan');
			$keteranganalamat_pemesanan = $this->input->post('keteranganalamat_pemesanan');
			$kodepos_pemesanan = $this->input->post('kodepos_pemesanan');
			$telepon_pemesanan = $this->input->post('telepon_pemesanan');
			$jumlahmaid_pemesanan = $this->input->post('jumlahmaid_pemesanan');
			$pesan_pemesanan = $this->input->post('pesan_pemesanan');
			$ijinpetugaslaki_pemesanan = $this->input->post('ijinpetugaslaki_pemesanan');
			$hewanpeliharaan_pemesanan= $this->input->post('hewanpeliharaan_pemesanan');
			$agreeterm_pemesanan = $this->input->post('agreeterm_pemesanan');
			$totalbayar_pemesanan = $this->input->post('totalbayar_pemesanan');
			$status_pemesanan= 'Belum Bayar';
			//meletakkan isi dari variabelke tr_pemesanan
			$data = array(
			'id_pemesanan'=>$id_pemesanan,
			'id_pengguna'=>$id_pengguna,
			'tanggal_transaksi'=>$tanggal_transaksi,
			'tanggal_pemesanan'=>$tanggal_pemesanan,
			'waktu_pemesanan'=>$waktu_pemesanan,
			'jenisbangunan_pemesanan'=>$jenisbangunan_pemesanan,
			'provinsi_pemesanan'=>$provinsi_pemesanan,
			'kota_pemesanan'=>$kota_pemesanan,
			'kecamatan_pemesanan'=>$kecamatan_pemesanan,
			'keteranganalamat_pemesanan'=>$keteranganalamat_pemesanan,
			'kodepos_pemesanan'=>$kodepos_pemesanan,
			'telepon_pemesanan'=>$telepon_pemesanan,
			'jumlahmaid_pemesanan'=>$jumlahmaid_pemesanan,
			'pesan_pemesanan'=>$pesan_pemesanan,
			'ijinpetugaslaki_pemesanan'=>$ijinpetugaslaki_pemesanan,
			'hewanpeliharaan_pemesanan'=>$hewanpeliharaan_pemesanan,
			'agreeterm_pemesanan'=>$agreeterm_pemesanan,
			'totalbayar_pemesanan'=> $this->cart->total() * 80/100,
		
			'status_pemesanan'=>$status_pemesanan
			);
			
			
			//menginput array $data ke dalam tabel user pada database
			$this->db->insert('tr_pemesanan',$data);
			
			
			//menyimpan data detail layanan yang disimpan
			 $cart = $this->cart->contents();
				  foreach ($cart as $contents) {
					   $id = $contents['id'];
					   $quantity = $contents['qty'];
					   $subtotal = $contents['subtotal'];
					     $datadetail = array(
							'id_pemesanan'=>$id_pemesanan,
							'id_layanan'=>$id,
							'quantity'=>$quantity,
							'subtotal'=>$subtotal);
				  $this->db->insert('detail_trpemesanan',$datadetail);
				  }
				
			 
			
			
			
		}
		
		
		
		//fungsi untuk membaca data dari database
		function tampil()
		{
			//mengambil data dari tabel user di db
			//diletakkan pada variabel $tampil
			$id_pengguna = $this->session->userdata('id_pengguna');
			$tampil = $this->db->get_where('tr_pemesanan',array('id_pengguna'=>$id_pengguna));
			
			
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
		
		function tampilsemua()
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
		
		function tampilkonfirmasi()
		{
			//mengambil data dari tabel user di db
			//diletakkan pada variabel $tampil
			$tampil = $this->db->query("SELECT tr_pemesanan.id_pemesanan, tr_pemesanan.tanggal_transaksi, ms_pengguna.namalengkap_pengguna,
			tr_pemesanan.bank_cust, tr_pemesanan.bank_themaids, tr_pemesanan.totalbayar_pemesanan, tr_pemesanan.foto, tr_pemesanan.status_pemesanan from tr_pemesanan JOIN ms_pengguna 
			ON ms_pengguna.id_pengguna = tr_pemesanan.id_pengguna");
			
			
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
		
		function tampilbyid($id_pemesanan)
		{
			
			return $this->db->get_where('tr_pemesanan',array('id_pemesanan'=>$id_pemesanan))->row();
		}
		
		
		
		//fungsi untuk menghapus data pada database dengan parameter $username
		function hapus($id_pemesanan)
		{
			
			//menghapus data pada database di tabel user
			//dengan username sesuai dengan isi data pada variabel $username
			$data = array(
			'status_pemesanan'=>'Pesanan Dibatalkan');
			
			//memberikan kondisi bahwa username yang diubah pada database
			//adalah username yang diberikan pada variabel $username
			$this->db->where('id_pemesanan',$id_pemesanan);
			
			
			//mengupdate tabel user sesuai dengan isian array data
			//dan parameter username pada where
			$this->db->update('tr_pemesanan',$data);
			//mengarahkan file ke controller user
			//artinya mengarah ke user/index
			
		}
		
		
		
		
		function uploadbuktipembayaran($id_pemesanan)
		{
			
			if($_POST['submit']){
				$extensi = array('png', 'PNG', 'jpg', 'jpeg', 'gif', 'BMG', 'TIFF');
				$nama_file = $_FILES['foto']['name'];
				$x = explode(".", $nama_file);
				$ext = strtolower(end($x));
				$ukuran = $_FILES['foto']['size'];
				$file_tmp = $_FILES["foto"]["tmp_name"];
				if(in_array($ext, $extensi) === true){
		 		if($ukuran < 999999999999){
					//move_uploaded_file($file_tmp, "assets/Photo/".$nama);
					$pathFileTujuan = "C:\\xampp\\htdocs\\THEMAIDS\\assets\\image\\bukti_pembayaran\\".$_FILES["foto"]["name"];
					copy($file_tmp, $pathFileTujuan);
					$foto = $nama_file;
				}
			}
			}
			
			$status_pemesanan = 'Menunggu Konfirmasi';
			$bank_themaids = $this->input->post('bank_themaids');
			$bank_cust = $this->input->post('bank_cust');
			
			
			$data = array(
			'status_pemesanan'=>$status_pemesanan,'foto'=>$foto,'bank_cust'=>$bank_cust,'bank_themaids'=>$bank_themaids
			);
			$this->db->where('id_pemesanan',$id_pemesanan);
			$this->db->update('tr_pemesanan',$data);
		}
		
		
		  function idOtomatis1(){
          include "C:\\xampp\\htdocs\\THEMAIDS\\application\\models\\admin\\koneksi.php";
          $hasil = mysqli_query($connection,"select max(id_pemesanan) as maxid from tr_pemesanan");
          $data = mysqli_fetch_array($hasil);
		  $id_transaksi = $data['maxid'];
			$nourut = (int)substr($id_transaksi, 9, 3);
			$nourut++;
			$char = date("dmY");
			$id_transaksi = $char . "-" . sprintf("%03s", $nourut);
			return $id_transaksi;
         }
		 
		 
		function konfirmasiadmin($id_pemesanan)
		{
		
			$status_pemesanan = $this->input->post('status_pemesanan');
			
			$data = array(
			'status_pemesanan'=>$status_pemesanan
			);
			$this->db->where('id_pemesanan',$id_pemesanan);
			$this->db->update('tr_pemesanan',$data);
		}
		
		 function tampil_tahun()
		{
			$query = $this->db->query('select distinct year(t.tanggal_transaksi) as tahun from tr_pemesanan t where t.status_pemesanan = "Pesanan Dikonfirmasi"');
			return $query->result();
		}

		function tampil_grafik_bulan($tahun)
		{
			$query = $this->db->query("SELECT MONTH(t.tanggal_transaksi) as bulan, sum(t.totalbayar_pemesanan) as total FROM `tr_pemesanan` t WHERE t.status_pemesanan = 'Pesanan Dikonfirmasi' AND Year(t.tanggal_transaksi) = '$tahun' group by (month(t.tanggal_transaksi))");

			return $query->result();
		}
		 
		 
	}
?>