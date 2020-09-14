<?php 
defined('BASEPATH') OR exit('No direct script allowed');

/**
* 
*/
class Promo extends CI_Controller{
	function __Construct()
	{
		parent ::__Construct();
		$this->load->model('Produk_model');
		$this->load->model('Keranjang_model');
	}

	function Index(){
		$content = array (	'title'		=> 'Promo | Permata Motor',
								'content'	=> 'Pages/Promo',
								'kategori'	=> $this->Keranjang_model->get_kategori_all(),
								'promo'		=> $this->Produk_model->ProdukPromo()->result(),
								'banner'	=> $this->Produk_model->BannerPromo()->result(),

								);
			$this->load->view('layout/Wrapper',$content);
	}
}
?>