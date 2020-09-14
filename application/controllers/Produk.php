<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

	class Produk extends CI_Controller
	{
		
		function __construct(){
			parent::__construct();
			$this->load->library('cart');
			$this->load->model('Produk_model');
			$this->load->model('Keranjang_model');

		}

		public function Index(){
			// $kategori	= ($this->uri->segment(3))?$this->uri->segment(3):0;
			$content	= array (	'title'		=> 'Permata Motor | Produk',
									'content'	=> 'pages/List_produk',
									'produk'	=> $this->Keranjang_model->get_produk_all(),
									'kategori'	=> $this->Keranjang_model->get_kategori_all(),
								);
			$this->load->view('layout/Wrapper',$content);
		}

		function Kategori(){
			$kategori	= ($this->uri->segment(3))?$this->uri->segment(3):0;
			$content	= array(	'title'		=> 'Permata Motor | Produk',
									'content'	=> 'pages/List_produk',
									'produk'	=> $this->Keranjang_model->get_produk_kategori($kategori),
									'kategori'	=> $this->Keranjang_model->get_kategori_all(),
									'jenis'		=> $this->Keranjang_model->get_jenis_all(),

								);
			$this->load->view('layout/Wrapper',$content);
		}

		function Detail(){
			$id			= ($this->uri->segment(3))?$this->uri->segment(3):0;
			$where		= array('p.id',$id);
			$content	= array(	'title'		=> 'Permata Motor | Detail Motor',
									'content'	=> 'pages/Detail',
									'kategori'	=> $this->Keranjang_model->get_kategori_all(),
									'detail'	=> $this->Keranjang_model->get_produk_id($id)->result(),
									'harga'		=> $this->Produk_model->Kredit($where,'kredit')->result(),
								);

			$view		= $this->Produk_model->GetCounter($id)->result();
			foreach ($view as $data) {
				$counter = $data->count_view;
				$counter = $counter + 1;
			}
			$data			= array('count_view'	=> $counter);
			$where_count	= array('id'			=> $id);
			$this->Produk_model->UpdateCounter($where_count,$data);
			$this->load->view('layout/Wrapper',$content);
		}

		function Search(){
			$kategori	= ($this->uri->segment(3))?$this->uri->segment(3):0;
			// $data2['cari']	= $this->Produk_model->Search();
			$content		= array('title'		=> 'Hasil Pencarian',
									'content'	=> 'pages/Hasil',
									'produk'	=> $this->Keranjang_model->get_produk_kategori($kategori),
									'kategori'	=> $this->Keranjang_model->get_kategori_all(),
									'jenis'		=> $this->Keranjang_model->get_jenis_all(),
									'cari'		=> $this->Produk_model->Search()
									);
			$this->load->view('layout/Wrapper',$content);
		}

		function AddCount($slug){
			$check_visitor	= $this->input->cookie(urlcode($slug), FALSE);
			$ip				= $this->input->ip_address();

			if ($check_visitor == false){
				$cookie	= array('name'		=> urlcode($slug),
								'value'		=> "$ip",
								'expire'	=> time() + 7200,
								'secure'	=> false
							);
				$this->input->set_cookie($cookie);
				$this->Produk_model->UpdateCounter(urlcode($slug));
			}
		}

	}

?>