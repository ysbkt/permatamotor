<?php 

class Produk_model extends CI_model{
	function Banner(){
		$this->db->order_by("id","asc");
		return $this->db->get('banner',5);
	}

	// Home
	function Produk(){
		$this->db->select('p.*,j.*,k.*');
		$this->db->from('produk p');
		$this->db->join('jenis j','j.id = p.id_jenis','left');
		$this->db->join('kategori k','k.id = p.id_kategori','left');
		$this->db->group_by('p.id');
		$this->db->order_by('p.id','desc');
		$this->db->limit(9);
		return $this->db->get();
	}

	function getMoped(){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_kategori','1');
		$this->db->order_by('id','desc');
		$this->db->limit(5);
		return $this->db->get();
	}

	function getMatik(){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_kategori','2');
		$this->db->order_by('id','desc');
		$this->db->limit(5);
		return $this->db->get();
	}

	function getSport(){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_kategori','3');
		$this->db->order_by('id','desc');
		$this->db->limit(5);
		return $this->db->get();
	}
	

	function getJenisKategori(){
		$this->db->select('DISTINCT(jenis_kategori)');
		$this->db->from('kategori');
		$this->db->where('id_jenis','1');
		return $this->db->get();
	}

	function getKategori(){
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('id_jenis','1');
		return $this->db->get();
	}

	function Spesifikasi($where){
		$this->db->select('p.*,j.*,k.*,s.*');
		$this->db->from('produk p');
		$this->db->join('jenis j','j.id = p.id_jenis','left');
		$this->db->join('kategori k','k.id = p.id_kategori','left');
		$this->db->join('spesifikasi s','s.id_produk = p.id','left');
		// $this->db->group_by('p.id');
		$this->db->where($where);
		return $this->db->get();
	}

	//Detail
	function Detail($where){
		$this->db->select('p.*,j.*,k.*,s.*');
		$this->db->from('produk p');
		$this->db->join('jenis j','j.id = p.id_jenis','left');
		$this->db->join('kategori k','k.id = p.id_kategori','left');
		$this->db->join('spesifikasi s','s.id_produk = p.id','left');
    	$this->db->where($where);
    	return $this->db->get();
    }

	// Kategori
	function Kategori($where){
		$this->db->select('p.*,j.*,k.*,s.*');
		$this->db->from('produk p');
		$this->db->join('jenis j','j.id = p.id_jenis','left');
		$this->db->join('kategori k','k.id = p.id_kategori','left');
		$this->db->join('spesifikasi s','s.id_produk = p.id','left');
    	return $this->db->get();
    }

	function getJenisAll(){
		// $this->db->select('DISTINCT(jenis_kategori)');
		$this->db->from('jenis');
		return $this->db->get();
	}

	function getKategoriAll(){
		$this->db->select('*');
		$this->db->from('kategori');
		return $this->db->get();
	}

	function getMopedKategori(){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_kategori','1');
		$this->db->order_by('id','asc');
		return $this->db->get();
	}

	function getMatikKategori(){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_kategori','2');
		$this->db->order_by('id','asc');
		return $this->db->get();
	}

	function getSportKategori(){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_kategori','3');
		$this->db->order_by('id','asc');
		return $this->db->get();
	}


	// function listProduk(){
	// 	$this->db->select('p.*,j.*,k.*,s.*');
	// 	$this->db->from('produk p');
	// 	$this->db->join('jenis j','p.id_jenis = j.id');
	// 	$this->db->join('kategori k','k.id_jenis = j.id');
	// 	$this->db->join('spesifikasi_motor s','s.id_produk = p.id');
	// 	$this->db->group_by('p.id');
	// 	return $this->db->get();
	// }

	function listProduk(){
		$this->db->order_by("id","asc");
		return $this->db->get('produk',15);
	}

	// function listKategori(){
	// 	$this->db->from('kategori');
	// 	return $this->db->get();
	// }

	// function Spesifikasi(){
	// 	$this->db->from('spesifikasi_motor');
	// 	return $this->db->get();
	// }
	
	function get_all_produk($where){
		$this->db->select('p.*,j.*,k.*');
		$this->db->from('produk p');
		$this->db->join('jenis j','j.id = p.id_jenis','left');
		$this->db->join('kategori k','k.id = p.id_kategori','left');
		$this->db->where($where);
		return $this->db->get();
	}

	function Kredit($where,$table){
		$this->db->select(' p.id		as id_produk,
							p.id_jenis,
							p.id_kategori,
							p.nama_produk,
							p.warna_produk,
							p.gambar,
							p.harga_produk,
							p.gambar_price_list,
							p.stock,
							p.count_view,

							kr.id 		as id_kredit,
							kr.dp,
							kr.tenor_11,
							kr.tenor_17,
							kr.tenor_23,
							kr.tenor_29,
							kr.tenor_35,
						');
		$this->db->from('produk p');
		$this->db->join('kredit kr','kr.id_produk = p.id','right');
		$this->db->group_by('kr.id');
		// $this->db->where($where);
		return $this->db->get();
	}

	function listKredit($postData){ 
    // Select record
    // $this->db->select('DISTINCT(kategori)');
    $this->db->where('dp', $postData['dp']);
    $q = $this->db->get('kredit');
    $response = $q->result_array();

    return $response;
  	}

  	function Warna(){
  		$this->db->select('*');
  		$this->db->from('warna');
  		$this->db->where('id_produk');
  		return $this->db->get();
  	}

  	function View(){
  		return $this->db->get('produk')->result();
  	}

  	function Search(){
  		$cari	= $this->input->GET('cari', TRUE);
  		$data	= $this->db->query("select * from produk where nama_produk like '%$cari%' ");
  		return	$data->result();
  	}

  	function GetCounter($slug){
  		$this->db->select('count_view');
  		$this->db->from('produk');
  		$this->db->where('id',$slug);
  		return	$this->db->get();
  	}

  	function UpdateCounter($where,$data){
		$this->db->where($where);
		$this->db->update('produk',$data);
	}

	function ProdukPromo(){
		$this->db->select(' p.id		as id_produk,
							p.id_jenis,
							p.id_kategori,
							p.nama_produk,
							p.warna_produk,
							p.gambar,
							p.harga_produk,
							p.gambar_price_list,
							p.stock,
							p.count_view,

							pp.id 		as id_promo,
							pp.diskon_dp,
							pp.diskon_35,
						');
		$this->db->from('produk_promo pp');
		$this->db->join('produk p','p.id = pp.id_produk','left');
		return $this->db->get();
	}

	function BannerPromo(){
		$this->db->select('*');
		$this->db->from('banner_promo');
		return $this->db->get();
	}

}
 ?>