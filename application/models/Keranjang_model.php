<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Keranjang_model extends CI_Model {

	public function get_produk_all()
	{
		$query = $this->db->get('Produk');
		return $query->result_array();
	}
	
	// public function get_produk_kategori($kategori)
	// {
	// 			$this->db->select('*');
	// 			$this->db->from('produk p');
	// 			$this->db->join('kategori k','p.id_kategori = k.id','left');
	// 			$this->db->where('jenis_kategori',$kategori);
	// 			$query = $this->db->get();
	// 			return $query->result_array();
	// }
	
	// public function get_kategori_all()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('produk p');
	// 	$this->db->join('kategori k','p.id_kategori = k.id','left');
	// 	$this->db->group_by('jenis_kategori');
		// $this->db->where('jenis_kategori',$kategori);
		// $query = $this->db->get();
		// return $query->result_array();

		// $query = $this->db->get('Kategori');
		// return $query->result_array();
	// }

	public function get_produk_kategori($kategori)
	{
		if($kategori>0)
			{
				$this->db->where('id_kategori',$kategori);
			}
		$query = $this->db->get('Produk');
		return $query->result_array();
	}

	// public function getKategoriMoped($moped)
	// {
	// 	if($moped>0)
	// 		{
	// 			$this->db->where('id_kategori',$moped);
	// 		}
	// 	$query = $this->db->where('id_kategori',1);
	// 	$query = $this->db->get('Produk');
	// 	return $query->result_array();
	// }

	// public function getKategoriMatik($matik)
	// {
	// 	if($matik>0)
	// 		{
	// 			$this->db->where('id_kategori',$matik);
	// 		}
	// 	$query = $this->db->where('id_kategori',2);
	// 	$query = $this->db->get('Produk');
	// 	return $query->result_array();
	// }

	// public function getKategoriSport($sport)
	// {
	// 	if($sport>0)
	// 		{
	// 			$this->db->where('id_kategori',$sport);
	// 		}
	// 		$query = $this->db->where('id_kategori',3);
	// 	$query = $this->db->get('Produk');
	// 	return $query->result_array();
	// }
	
	public function get_kategori_all()
	{
		$query = $this->db->get('kategori');
		return $query->result_array();
	}

	public function get_jenis_all()
	{
		$query = $this->db->get('jenis');
		return $query->result_array();
	}
	
	public  function get_produk_id($id)
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
	
	public function tambah_pelanggan($data)
	{
		$this->db->insert('pelanggan', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	
	// public function tambah_order($data)
	// {
	// 	$this->db->insert('order', $data);
	// 	$id = $this->db->insert_id();
	// 	return (isset($id)) ? $id : FALSE;
	// }
	
	public function tambah_detail_order($data)
	{
		return $this->db->insert('detail_order', $data);
	}

}
?>