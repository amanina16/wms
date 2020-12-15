<?php
	//membuat class baru inherit CI_Model
	class cart extends CI_Model
	{
		//fungsi untuk melakukan penambahan data pada database
		function tambahcart()
		{
			
			$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => $this->input->post('qty'),
			'price'   => $this->input->post('price'),
			'name'    => $this->input->post('name'),
			'options' =>array('subtotal'=> $this->input->post('subtotal'),)
			);

			$this->cart->insert($data);
			redirect('shopping');
		}
		
		//fungsi untuk membaca data dari database
		function tampilcart()
		{
			$tampilkancart = $this->cart->contents();
			return $tampilkancart;
			
			
		}
		
		
		function hapuscart($rowid) {
		// Check rowid value.
		if ($rowid==="all"){
		// Destroy data which store in session.
		$this->cart->destroy();
		}else{
		// Destroy selected rowid in session.
		$data = array(
		'rowid' => $rowid,
		'qty' => 0
		);
		// Update cart data, after cancel.
		$this->cart->update($data);
		}

		// This will show cancel data in cart.
		redirect('shopping');
		}
		
	
		
		
		//fungsi untuk mengubah data pada database dengan parameter $username
		function ubahcart()
		{
			
			$data = array(
			'id'      => $this->input->post('id'),
			'qty'     => $this->input->post('qty'),
			'options' =>array('subtotal'=> $this->input->post('subtotal'),)
			);

			$this->cart->update($data);
		}
		
		function totalcart()
		{
			return $this->cart->total();
		
		}
		
		function batalcart()
		{
			$this->cart->destroy();
		}
		
	}
?>