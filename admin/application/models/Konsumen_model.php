<?php 

class Konsumen_model extends CI_model{
	function dataKonsumen(){
		$this->db->select('	pl.id		as id_pelanggan,
							pl.nama,
							pl.email,
							pl.alamat,
							pl.kelurahan,
							pl.kecamatan,
							pl.kota,
							pl.kodepos,
							pl.telepon,
							pl.metode_pembayaran,
							pl.tenor,

							d.id		as id_detail_order,
							d.id_produk	as id_detail_produk,
							d.qty,
							d.harga,
							d.tanggal,
							d.id_pelanggan as id_pembeli,
							d.status,
							d.surveyor,
							d.keterangan,

							p.id		as id_produk,
							p.id_jenis,
							p.id_kategori,
							p.nama_produk,
							p.warna_produk,
							p.gambar,
							p.harga_produk,
							p.gambar_price_list,

							j.id		as id_jenis_produk,
							j.jenis_produk,

							k.id		as id_kategori_produk,
							k.id_jenis	as id_jenis_kategori,
							k.jenis_kategori,

							');
		$this->db->from('pelanggan pl');
		$this->db->join('detail_order d','d.id_pelanggan = pl.id','left');
		$this->db->join('produk p','p.id = d.id_pelanggan','left');
		$this->db->join('jenis j','j.id = p.id_jenis','left');
		$this->db->join('kategori k','k.id = p.id_kategori','left');
		// $this->db->join('detail_order d','d.id_produk = p.id','left');
		$this->db->order_by("p.id","desc");
		return $this->db->get();
	}

	function Konsumen($where){
		$this->db->where($where);
		$this->db->from('pelanggan');
		$query = $this->db->get();
		return $query->row();
	}

	function detailOrder($id){
		$this->db->select('	pl.id		as id_pelanggan,
							pl.nama,
							pl.email,
							pl.alamat,
							pl.kelurahan,
							pl.kecamatan,
							pl.kota,
							pl.kodepos,
							pl.telepon,
							pl.metode_pembayaran,
							pl.tenor,

							d.id		as id_detail_order,
							d.id_produk	as id_detail_produk,
							d.qty,
							d.harga,
							d.tanggal,
							d.id_pelanggan as id_pembeli,
							d.status,

							p.id		as id_produk,
							p.id_jenis,
							p.id_kategori,
							p.nama_produk,
							p.warna_produk,
							p.gambar,
							p.harga_produk,
							p.gambar_price_list,


							');
		$this->db->from('pelanggan pl');
		$this->db->join('detail_order d','d.id_pelanggan = pl.id','left');
		$this->db->join('produk p','p.id = d.id_produk','left');
		// $this->db->join('jenis j','j.id = p.id_jenis','left');
		// $this->db->join('kategori k','k.id = p.id_kategori','left');
		$this->db->where('pl.id',$id);
		// $this->db->group_by('pl.id');
		return $query = $this->db->get();
	}
}

 ?>