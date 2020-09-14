<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('keranjang_model');
		$this->load->model('Produk_model');
	}

	public function index()
	{
		$kategori=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['produk'] = $this->keranjang_model->get_produk_kategori($kategori);
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$this->load->view('themes/header',$data);
		// $this->load->view('themes/side_menu',$data);
		$this->load->view('shopping/list_produk',$data);
		$this->load->view('themes/footer');
	}
	public function tampil_cart()
	{
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$this->load->view('themes/header',$data);
		$this->load->view('shopping/tampil_cart',$data);
		$this->load->view('themes/footer');
	}
	
	public function check_out()
	{
		// $where = array('id_produk' => $cart );
		$data['kategori']	= $this->keranjang_model->get_kategori_all();
		$data['kredit']		= $this->Produk_model->Kredit();
		$this->load->view('themes/header',$data);
		$this->load->view('shopping/check_out',$data);
		$this->load->view('themes/footer');
	}

	function listKredit(){
		// POST data 
	    $postData = $this->input->post();
	    
	    // get data 
	    $content = $this->Produk_model->listKredit($postData);
	    echo json_encode($content); 
		
		}
	
	public function detail_produk()
	{
		$id=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$data['detail'] = $this->keranjang_model->get_produk_id($id)->result();
		$this->load->view('themes/header',$data);
		// $this->load->view('themes/Side_menu',$data);
		$this->load->view('pages/Detail',$data);
		$this->load->view('themes/footer');
	}
	
	
	function tambah()
	{
		$data_produk= array('id' => $this->input->post('id'),
							 'name' => $this->input->post('nama'),
							 'price' => $this->input->post('harga'),
							 'qty' =>$this->input->post('qty'),
							 'gambar' => $this->input->post('gambar'),
							 'jenis_produk'		=> $this->input->post('jenis_produk'),
							 'jenis_kategori'	=> $this->input->post('jenis_kategori'),
							 'warna_produk'		=> $this->input->post('warna_produk'),
							);
		$this->cart->insert($data_produk);
		// print_r($this->cart->contents());
		redirect('shopping');
	}

	function hapus($rowid) 
	{
		if ($rowid=="all")
			{
				$this->cart->destroy();
			}
		else
			{
				$data = array('rowid' => $rowid,
			  				  'qty' =>0);
				$this->cart->update($data);
			}
		redirect('shopping/check_out');
	}

	function ubah_cart()
	{
		$cart_info = $_POST['cart'] ;
		foreach( $cart_info as $id => $cart)
		{
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$gambar = $cart['gambar'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$data = array('rowid' => $rowid,
							'price' => $price,
							'gambar' => $gambar,
							'amount' => $amount,
							'qty' => $qty);
			$this->cart->update($data);
		}
		redirect('shopping/check_out');
	}

	public function proses_order()
	{
		//-------------------------Input data pelanggan--------------------------
		$data_pelanggan = array('nama'		=> $this->input->post('nama'),
								'email'		=> $this->input->post('email'),
								'alamat'	=> $this->input->post('alamat'),
								'kelurahan'	=> $this->input->post('kelurahan'),
								'kecamatan'	=> $this->input->post('kecamatan'),
								'kota'		=> $this->input->post('kota'),
								'kodepos'	=> $this->input->post('kodepos'),
								'telepon'	=> $this->input->post('telepon'));
		$id_pelanggan = $this->keranjang_model->tambah_pelanggan($data_pelanggan);
		//-------------------------Input data order------------------------------
		$data_order = array('tanggal' => date('Y-m-d'),
					   		'pelanggan' => $id_pelanggan);
		$id_order = $this->keranjang_model->tambah_order($data_order);
		//-------------------------Input data detail order-----------------------		
		if ($cart = $this->cart->contents())
			{
				foreach ($cart as $item)
					{
						$data_detail = array('order_id' =>$id_order,
										'produk' => $item['id'],
										'qty' => $item['qty'],
										'harga' => $item['price']);			
						$proses = $this->keranjang_model->tambah_detail_order($data_detail);
					}
			}
		//-------------------------Hapus shopping cart--------------------------		
		$this->cart->destroy();
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		// $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Terimakasih sudah belanja di dealer kami, pesanan anda akan segera kami proses dalam waktu 2x24 jam.</div>');
		    // redirect('shopping/suskses');
		$this->load->view('themes/header',$data);
		$this->load->view('shopping/sukses',$data);
		$this->load->view('themes/footer');
	}

	public function Sendemail($nama,$email){

    // configure the email setting
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "ssl://smtp.gmail.com";
        $config['smtp_port'] = "465";
        $config['smtp_user'] = "09febrian@gmail.com";
        $config['smtp_pass'] = "febrian111";
        $config['charset'] = "utf-8";
        $config['mailtype'] = "html";
        $config['newline'] = "\r\n";
        $this->email->initialize($config);
      $year = date('Y');
      // $url = base_url()."events/confirmation/".$Saltid;
      $this->email->from($email);
      $this->email->to('09febrian@gmail.com');   
      $this->email->subject('Pertanyaan Masuk');
      $Message = "<html>
      <head>
      </head>
      <body style=' font-family:&quot;Arial&quot;,sans-serif;color:#000;line-height:1.5;margin:0;padding:0'>
      <div style='margin:auto; width: 100%;'>
      <img width= '100' height='100' src='https://pbs.twimg.com/profile_images/3621487086/99aa1ae945944c7621216cd07a64bf58_400x400.png'>
      <p>Hi, Admin<br>
      <p>Ada pertanyaan masuk dari ".$email."</p>
      <br/>
      <p>Salam Hangat,</p>
      <p>Global Top Career</p>
      <br>
      <br>
      <tr>
      <td width='25%'><font color='#999' size='2'>Copyright &copy; ".$year." Global Top Career<br>Gd.Permata Indonesia,<br> Jl. Raya Kebayoran Lama No.226 <br>Jakarta Selatan 12220.</font></td>
      </tr>
      <table>
      <hr style='color:#0d70b4;'>
      <div style='margin: auto;width:50%;'>
      <table style='text-align:center;'>
      <tr>
      	<td>
      		<font size='1'>Harap jangan membalas e-mail ini, karena e-mail ini dikirimkan secara otomatis oleh sistem. </font>
      	</td>
      </tr>
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

}
?>