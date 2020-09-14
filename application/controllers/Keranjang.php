<?php 
	if (!defined('BASEPATH')) exit ('No derict script access allowed');

	class Keranjang extends CI_Controller{

		public function __construct(){
			parent:: __construct();
			$this->load->library('cart');
			$this->load->model('Keranjang_model');
			$this->load->model('Produk_model');
		}

		public function Index(){
			$data = array(	'title'		=> 'Permata Motor | Keranjang',
							'content'	=> 'Pages/Check_out',
							'kategori'	=> $this->Keranjang_model->get_kategori_all(),
							'warna'		=> $this->Produk_model->Warna(),
						);
			$this->load->view('layout/Wrapper',$data);
		}

		function Tambah(){
			$data_produk	= array( 'id'				=> $this->input->post('id'),
									 'name'				=> $this->input->post('nama'),
									 'price'			=> $this->input->post('harga'),
									 'qty'				=> $this->input->post('qty'),
									 'gambar'			=> $this->input->post('gambar'),
									 'jenis_produk'		=> $this->input->post('jenis_produk'),
									 'jenis_kategori'	=> $this->input->post('jenis_kategori'),
									 'warna_produk'		=> $this->input->post('warna_produk'),
									);
			$this->cart->insert($data_produk);
			$this->session->set_flashdata('status','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Produk berhasil ditambahkan ke keranjang belanja</div>');
			redirect('Produk');
		}

		function Hapus($rowid){
			if	($rowid=="all"){
				$this->cart->destroy();
			}
		else
			{
				$data = array(	'rowid' => $rowid,
								'qty'	=> 0);
				$this->cart->update($data);
			}
			redirect('Keranjang');
		}

		function Edit(){
			$cart_info	= $_POST['cart'];
			foreach($cart_info as $id => $cart){
				$rowid	= $cart['rowid'];
				$price	= $cart['price'];
				$gambar = $cart['gambar'];
				$amount	= $price * $cart['qty'];
				$qty	= $cart['qty'];
				$data	= array(	'rowid'		=> $rowid,
									'price'		=> $price,
									'gambar'	=> $gambar,
									'amount'	=> $amount,
									'qty'		=> $qty,
								);
				$this->cart->update($data);
			}
			redirect('Keranjang');
		}

		function Order(){
			$email			= $this->input->post('email');
			$nama			= $this->input->post('nama');

			$data_pelanggan = array('nama'				=> $this->input->post('nama'),
									'email'				=> $this->input->post('email'),
									'alamat'			=> $this->input->post('alamat'),
									'kelurahan'			=> $this->input->post('kelurahan'),
									'kecamatan'			=> $this->input->post('kecamatan'),
									'kota'				=> $this->input->post('kota'),
									'kodepos'			=> $this->input->post('kodepos'),
									'telepon'			=> $this->input->post('telepon'),
									'metode_pembayaran'	=> $this->input->post('metode_pembayaran'),
									'tenor'				=> $this->input->post('tenor')
									);
			$id_pelanggan = $this->Keranjang_model->tambah_pelanggan($data_pelanggan);
			//-------------------------Input data order------------------------------
			// $data_order = array('tanggal' => date('Y-m-d'),
			// 			   		'pelanggan' => $id_pelanggan);
			// $id_order = $this->Keranjang_model->tambah_order($data_order);
			//-------------------------Input data detail order-----------------------		
			if ($cart = $this->cart->contents())
				{
					foreach ($cart as $item)
						{
							$data_detail = array(	'id_produk' 	=> $item['id'],
													'qty'			=> $item['qty'],
													'harga'			=> $item['price'],
													'tanggal'		=> date('Y-m-d'),
													'id_pelanggan'	=> $id_pelanggan,
													'status'		=> 'Pending',
													'surveyor'		=> '-',
													'keterangan'	=> '-'
												);			
							$proses = $this->Keranjang_model->tambah_detail_order($data_detail);
							if ($proses) {
								if($this->Sendemail($nama,$email))
				              {
				                $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Pertanyaan Anda Sedang Menunggu Persetujuan Moderator</div>');
				               $this->cart->destroy();
				               $data['kategori'] = $this->Keranjang_model->get_kategori_all();
				               redirect('Keranjang/Sukses');
				              }
				              else
				              {
				                $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Pertanyaan Anda Sedang Menunggu Persetujuan Moderator</div>');
				               redirect('Keranjang/Sukses');
				              }
							}else{
								echo "horeeee";
							}
						}
				}
			//-------------------------Hapus shopping cart--------------------------		
			// $this->cart->destroy();
			// $data['kategori'] = $this->Keranjang_model->get_kategori_all();
			// redirect('Keranjang/Sukses');
		}

		function SendEmail($nama,$email){
				// configure the email setting
	        $config['protocol'] = "smtp";
	        $config['smtp_host'] = "ssl://smtp.gmail.com";
	        $config['smtp_port'] = "465";
	        $config['smtp_user'] = "globaltopcareer.event@gmail.com";
	        $config['smtp_pass'] = "gtcevent123";
	        $config['charset'] = "utf-8";
	        $config['mailtype'] = "html";
	        $config['newline'] = "\r\n";
	        $this->email->initialize($config);
	      $year = date('Y');
	      // $url = base_url()."events/confirmation/".$Saltid;
	      $this->email->from($email);
	      $this->email->to('globaltopcareer.event@gmail.com');   
	      $this->email->subject('Pertanyaan Masuk');
	      $Message = "
	      <html>
	      <head>
	      </head>
	      <body style=' font-family:&quot;Arial&quot;,sans-serif;color:#000;line-height:1.5;margin:0;padding:0'>
	      <div style='margin:auto; width: 100%;'>
	      <img width= '100' height='100' src='https://pbs.twimg.com/profile_images/3621487086/99aa1ae945944c7621216cd07a64bf58_400x400.png'>
	      <p>Hi, Admin<br>
	      <p>Ada pertanyaan masuk dari ".$email."</p><br/><p>Salam Hangat,</p><p>Global Top Career</p><br><br>
	      <table>
	      <tr>
	      <td width='25%'><font color='#999' size='2'>Copyright &copy; ".$year." Global Top Career<br>Gd.Permata Indonesia,<br> Jl. Raya Kebayoran Lama No.226 <br>Jakarta Selatan 12220.</font></td>
	      </tr>
	      </table>
	      <hr style='color:#0d70b4;'>
	  <div style='margin: auto;width:50%;'>
	  <table style='text-align:center;'>
	  <tr>
	      <td>
	  <font size='1'>

	  Harap jangan membalas e-mail ini, karena e-mail ini dikirimkan secara otomatis oleh sistem. </font>
	  </td></tr>

	  </table>
	  </div>
	  </div>    



	      </body>
	      </html>";
	      $this->email->message($Message);
	      if($this->email->send()){
	        return true;
	      }else{
	        echo $this->email->print_debugger();
	      }
		}

		function Sukses(){
			$content	= array(	'title'		=> 'Permata Motor | Sukses',
									'content'	=> 'pages/Sukses',
									'kategori'	=> $this->Keranjang_model->get_kategori_all(),
								);
			$this->load->view('layout/Wrapper',$content);
		}
	}

 ?>