<?php 
defined('BASEPATH') OR exit('No direct script allowed');

/**
* 
*/
class Home extends CI_Controller
{
	
	function __Construct(){
		parent ::__Construct();
		$this->load->model('Produk_model');
		$this->load->model('Keranjang_model');
	}

	public function Index(){
			$kategori	= ($this->uri->segment(3))?$this->uri->segment(3):0;
			$content	= array (	'title'		=> 'Permata Motor',
								'content'	=> 'pages/Home',
								'banner'	=> $this->Produk_model->Banner()->result(),
								'moped'		=> $this->Produk_model->getMoped()->result(),
								'matik'		=> $this->Produk_model->getMatik()->result(),
								'sport'		=> $this->Produk_model->getSport()->result(),
								'kategori'	=> $this->Keranjang_model->get_kategori_all(),
								'produk'	=> $this->Keranjang_model->get_produk_kategori($kategori),

							);
			$this->load->view('layout/Wrapper',$content);
		}

		function listKategori(){
			return $this->Produk_model->getKategori()->result();
		}

		function Detail(){
			$content = array (	'title'			=> 'Permata Motor',
								'content'		=> 'Pages/Detail',
								'spesifikasi'	=>	$this->Produk_model->Spesifikasi()->result(),

								);
			$this->load->view('layout/Wrapper',$content); 
		}
		
}

 ?>