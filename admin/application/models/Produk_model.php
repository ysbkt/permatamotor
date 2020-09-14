<?php
defined('BASEPATH') OR exit ('No direct script access allowed'); 

class Produk_model extends CI_model{

	function countProduk(){
		$this->db->from('produk');
		$this->db->order_by('id','desc');
		return $this->db->get()->num_rows();
	}

	function countPelanggan(){
		$this->db->from('pelanggan');
		$this->db->order_by('id','desc');
		return $this->db->get()->num_rows();
	}

	public function countOrder() {	
		$this->db->from('detail_order');
		$this->db->where('status','pending');
		$this->db->order_by('status','desc');
		return $this->db->get()->num_rows();
	}

	function Banner(){
		$this->db->from('banner');
		$this->db->order_by('id');
		return $this->db->get();
	}

	function TambahBanner($data,$table){
		$this->db->insert('banner',$data);
	}

	function EditBanner($where,$table){
		return $this->db->get_where($table,$where);
	}

	function SaveEditBanner($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function HapusBanner($id,$where){
		$where	= array('id' => $id);
		$this->db->where($where);
		return $this->db->delete('banner');
	}

	function Produk(){
		$this->db->select('
							p.id		as id_produk,
							p.id_jenis,
							p.id_kategori,
							p.nama_produk,
							p.warna_produk,
							p.gambar,
							p.harga_produk,
							p.gambar_price_list,
							p.stock,
							p.count_view,

							j.id		as id_jenis_produk,
							j.jenis_produk,

							k.id		as id_kategori_produk,
							k.id_jenis	as id_jenis_kategori,
							k.jenis_kategori,

							kr.id 		as id_kredit,
							kr.dp,
							kr.tenor_11,
							kr.tenor_17,
							kr.tenor_23,
							kr.tenor_29,
							kr.tenor_35,
						');
		$this->db->from('produk p');
		$this->db->join('jenis j','j.id = p.id_jenis','left');
		$this->db->join('kategori k','k.id = p.id_kategori','left');
		$this->db->join('kredit kr','kr.id_produk = p.id','left');
		$this->db->group_by('p.id');
		return $this->db->get();
	// function listProduk(){
	// 	$this->db->select('p.*,j.*,k.*,s.*');
	// 	$this->db->from('produk p');
	// 	$this->db->join('jenis j','p.id_jenis = j.id');
	// 	$this->db->join('kategori k','k.id_jenis = j.id');
	// 	$this->db->join('spesifikasi_motor s','s.id_produk = p.id');
	// 	$this->db->group_by('p.id');
	// 	return $this->db->get();

		// $this->db->join('produk','jenis.id_jenis = produk.id_produk','kategori.id_kategori = produk.id');

		// $query = $this->db->get();
		// 	if ($query->num_rows()>0){
		// 		foreach ($query->result() as $data) {
		// 			$produk[] = $data;
		// 		}
		// 		return $hasilProduk;
		// 	}
		// $this->db->order_by("id","desc");
		// return $this->db->get('produk');
	}

	function getJenisKategoriAll(){
		$this->db->select('DISTINCT(jenis_kategori)');
		$this->db->from('kategori');
		return $this->db->get();
	}

	function getJenisMotor(){
		$this->db->where('id','1');
		return $this->db->get('jenis');
	}

	function getJenisHelm(){
		$this->db->where('id','2');
		return $this->db->get('jenis');
	}

	function listKategori($postData){ 
    // Select record
    // $this->db->select('DISTINCT(kategori)');
    $this->db->where('id_jenis', $postData['jenisproduk']);
    $q = $this->db->get('kategori');
    $response = $q->result_array();

    return $response;
  	}

	function Spesifikasi($where){
		$this->db->where($where);
		$this->db->from('spesifikasi');
		$query = $this->db->get();
		return $query->row();
	}
	
	function getSpekProduk(){
		$this->db->select('id');
		$this->db->from('produk');
		$this->db->order_by("id","desc");
		$this->db->limit(1);
		return $this->db->get();
	}

	function tambahProduk($produk,$table){
		$this->db->insert('produk',$produk);
		$insert_id = $this->db->insert_id();

		return $insert_id;
	}

	function addSpesifikasi($spesifikasi,$table){
		$this->db->insert('spesifikasi',$spesifikasi);
	}

	function addThumbnail($thumbnail,$table){
		$this->db->insert('gambar',$thumbnail);
	}

	function addWarna($warna,$table){
		$this->db->insert('warna',$warna);
	}

	function saveEditSpesifikasi($where,$spek,$table){
		$this->db->where($where);
		$this->db->update($table,$spek);
	}

	function hapusMotor($id){
		$this->db->where('id',$id);
		return $this->db->delete('produk');
	}

	function hapusHarga($id){
		$this->db->where('id_produk',$id);
		return $this->db->delete('kredit');
	}

	function hapusSpek($id){
		$this->db->where('id_produk',$id);
		return $this->db->delete('spesifikasi');
	}

	function Thumbnail($where,$table){
		return $this->db->get_where($table,$where);
	}

	function editMotor($where,$table){
		$this->db->select('
							p.id		as id_produk,
							p.id_jenis,
							p.id_kategori,
							p.nama_produk,
							p.warna_produk,
							p.gambar,
							p.harga_produk,
							p.gambar_price_list,
							p.stock,
							p.count_view,

							j.id		as id_jenis_produk,
							j.jenis_produk,

							k.id		as id_kategori_produk,
							k.id_jenis	as id_jenis_kategori,
							k.jenis_kategori,

							g.id		as id_gambar,
							g.id_produk,
							g.thumbnail_1,
							g.thumbnail_2,
							g.thumbnail_3,

							w.id		as id_warna,
							w.id_produk,
							w.warna,
							w.warna_1,
							w.warna_2,
							w.warna_3,

						');
		$this->db->from('produk p');
		$this->db->join('jenis j','j.id = p.id_jenis','left');
		$this->db->join('kategori k','k.id = p.id_kategori','left');
		$this->db->join('gambar g','g.id_produk = p.id','left');
		$this->db->join('warna w','w.id_produk = p.id','left');
		$this->db->order_by('p.id');
		$this->db->where($where);
		return $this->db->get();
	}

	function saveEditMotor($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function editWarna($where,$warna,$table){
		$this->db->where($where);
		$this->db->update($table,$warna);
	}

	function editThumbnail($where,$thumbnail,$table){
		$this->db->where($where);
		$this->db->update($table,$thumbnail);
	}

	function Kredit($where,$table){
		$this->db->select('
							p.id		as id_produk,
							p.id_jenis,
							p.id_kategori,
							p.nama_produk,
							p.warna_produk,
							p.gambar,
							p.harga_produk,
							p.gambar_price_list,
							p.stock,
							p.count_view,

							j.id		as id_jenis_produk,
							j.jenis_produk,

							k.id		as id_kategori_produk,
							k.id_jenis	as id_jenis_kategori,
							k.jenis_kategori,

							kr.id 		as id_kredit,
							kr.dp,
							kr.tenor_11,
							kr.tenor_17,
							kr.tenor_23,
							kr.tenor_29,
							kr.tenor_35,
						');
		$this->db->from('produk p');
		$this->db->join('jenis j','j.id = p.id_jenis','right');
		$this->db->join('kategori k','k.id = p.id_kategori','right');
		$this->db->join('kredit kr','kr.id_produk = p.id','right');
		$this->db->group_by('kr.dp');
		$this->db->order_by('kr.id','asc');
		$this->db->where($where);
		return $this->db->get();
	}

	function get_produk_id($id)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('Jenis', 'produk.id_jenis = jenis.id','left');
		$this->db->join('Kategori', 'produk.id_kategori = Kategori.id','left');
		$this->db->join('spesifikasi', 'spesifikasi.id_produk = Produk.id','left');
		$this->db->join('warna','warna.id_produk = produk.id','left');
		$this->db->join('gambar','gambar.id_produk = produk.id');
   		$this->db->where('produk.id',$id);
        return $this->db->get();
    }	

	function showPrice($id){
		$this->db->select('
							p.id		as id_produk,
							p.id_jenis,
							p.id_kategori,
							p.nama_produk,
							p.warna_produk,
							p.gambar,
							p.harga_produk,
							p.gambar_price_list,
							p.stock,
							p.count_view,

							j.id		as id_jenis_produk,
							j.jenis_produk,

							k.id		as id_kategori_produk,
							k.id_jenis	as id_jenis_kategori,
							k.jenis_kategori,

							kr.id 		as id_kredit,
							kr.dp,
							kr.tenor_11,
							kr.tenor_17,
							kr.tenor_23,
							kr.tenor_29,
							kr.tenor_35,
						');
		$this->db->from('produk p');
		$this->db->join('jenis j','j.id = p.id_jenis','left');
		$this->db->join('kategori k','k.id = p.id_kategori','left');
		$this->db->join('kredit kr','kr.id_produk = p.id','left');
		$this->db->where('kr.id',$id);
		$this->db->group_by('kr.id');
		$query = $this->db->get();

		return $query->row();
	}

	function showHargaKredit($id){
		$this->db->select('
							p.id		as id_produk,
							p.id_jenis,
							p.id_kategori,
							p.id_spesifikasi,
							p.nama_produk,
							p.warna_produk,
							p.gambar,
							p.harga_produk,
							p.gambar_price_list,
							p.stock,
							p.count_view,

							j.id		as id_jenis_produk,
							j.jenis_produk,

							k.id		as id_kategori_produk,
							k.id_jenis	as id_jenis_kategori,
							k.jenis_kategori,

							kr.id 		as id_kredit,
							kr.dp,
							kr.tenor_11,
							kr.tenor_17,
							kr.tenor_23,
							kr.tenor_29,
							kr.tenor_35,
						');
		$this->db->from('produk p');
		$this->db->join('jenis j','j.id = p.id_jenis','left');
		$this->db->join('kategori k','k.id = p.id_kategori','left');
		$this->db->join('kredit kr','kr.id_produk = p.id','left');
		$this->db->where('kr.id',$id);
		$this->db->group_by('kr.id');
		$this->db->order_by('kr.id','desc');
		$query = $this->db->get();

		return $query->row();
	}

	function tambahHargaKredit($kredit,$table){
		$this->db->insert('kredit',$kredit);
	}

	function updateHargaKredit($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function priceListProduk($where,$table){
		return $this->db->get_where($table,$where);
	}

	function hapusHargaKredit($where){
		$this->db->where($where);
		return $this->db->delete('kredit');
	}

	function Promo(){
		$this->db->select('	p.id		as id_produk,
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
		$this->db->group_by('pp.id');
		return $this->db->get();
	}

	function addPromo($data,$table){
		$this->db->insert('banner_promo',$data);
	}

	function getProdukPromo(){
		$this->db->select('*');
		$this->db->from('produk');
		return $this->db->get();
	}

	function addProdukPromo($data,$table){
		$this->db->insert('produk_promo',$data);
	}

	function EditPromosi($where){
		$this->db->select('	p.id		as id_produk,
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
		$this->db->where($where);
		$query = $this->db->get();

		return $query->row();
	}

	function EditHargaPromo($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function HapusProdukPromo($id){
		$this->db->where('id',$id);
		return $this->db->delete('produk_promo');
	}

	function Survey($data,$where){
		return $this->db->update('detail_order',$data,$where);
	}

	function ShowMotor($where){
		$this->db->where($where);
		$this->db->from('produk p');
		$this->db->join('jenis j','j.id = p.id_jenis','left');
		$this->db->join('kategori k','k.id = p.id_kategori','left');
		$query = $this->db->get();
		return $query->row();
	}

	function Stock($data,$where){
		return $this->db->update('produk',$data,$where);
	}

}

 ?>