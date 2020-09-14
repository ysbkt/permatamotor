<?php 
 
class StockCard_models extends CI_Model{

var $table = 'tbl_stok'; //set column field database for datatable orderable     

	public function view_data(){
		return $this->db->get('tbl_stok');
	}

	public function view_barang(){
		return $this->db->get('tbl_barang');
	}
 
	public function insert_data($data,$table){
		$this->db->insert($table,$data);

	}

	public function delete($where, $table){
		$this->db->where($where);
		$this->db->delete($table);
	}


	public function edit_att($where,$table){
	return $this->db->get_where($table,$where);
	}


    public function update_data($where, $data){
    $this->db->update($this->table, $data, $where);
    return $this->db->affected_rows();
    }


    public function view_att(){  


		$this->db->select('DISTINCT(nama_toko),slug1');
		//$this->db->group_by('nama_toko');
		$this->db->order_by('nama_toko','DESC');
		return $this->db->get('tbl_stok');
		//echo $this->db->last_query();
  		
}


    public function view_list_toko(){  


		$this->db->select('DISTINCT(nama_toko)');
		//$this->db->group_by('nama_toko');
		//$this->db->order_by('nama_toko','DESC');
		return $this->db->get('tbl_stok');
		//echo $this->db->last_query();
  		
}



	public function today_att($where,$table)

	{


	$this->db->select('DISTINCT(cabang_toko),nama_toko,slug1,slug2');
	//$this->db->group_by('cabang_toko');			
	$this->db->order_by('nama_toko','DESC');		
	return $this->db->get_where($table,$where);
	}



public function today_program($where)

	{


				
	$this->db->order_by('id_stok','DESC');
	$this->db->limit('1');	
	return $this->db->get_where('tbl_stok',$where);
	}





public function today_sales_list($where)

	{








	$this->db->select('nama_stok,jml_stok,code_stok,size_stok,tanggal_sekarang,id_stok,cabang_toko,jml_stok_edit');		
	//$this->db->group_by('cabang_toko');	
	$this->db->order_by('tanggal_sekarang','DESC');		
	return $this->db->get_where('tbl_stok2',$where);
	}



public function today_sales_list2($where)

	{








	$this->db->select('nama_stok,jml_stok,code_stok,size_stok,tanggal_sekarang,id_stok,cabang_toko,jml_stok_edit,slug1,slug2,slug3');		
	//$this->db->group_by('cabang_toko');	
	//$this->db->order_by('tanggal_sekarang','DESC');		
	return $this->db->get_where('tbl_stok',$where);
	}


public function histories_sales($where,$table){


	$this->db->select('DISTINCT(tanggal_sekarang),cabang_toko,nama_toko,nama_stok,jml_stok,code_stok,size_stok');
	$this->db->group_by('nama_stok');	
	$this->db->order_by('tanggal_sekarang','DESC');		
	return $this->db->get_where($table,$where);
	}



  
  public function getStoreName(){

 
    // Select record
    $this->db->select('DISTINCT(nama_toko)');
    $q = $this->db->get('tbl_toko');
    $response = $q->result_array();

    return $response;
  }




  public function getStoreBranch($postData){
 
    // Select record
    $this->db->select('DISTINCT(cabang_toko)');
    $this->db->where('nama_toko', $postData['storename']);
    $q = $this->db->get('tbl_toko');
    $response = $q->result_array();

    return $response;
  }	



 public function getStoreAddress($postData,$postData2){
 
    // Select record
    $this->db->select('*');
    $this->db->where('cabang_toko', $postData['address']);
    $this->db->where('nama_toko', $postData2['name']);
    $q = $this->db->get('tbl_toko');
    $response = $q->result_array();

    return $response;
  }



  public function view_all_store($where,$table)

	{

	$this->db->select('DISTINCT(nama_toko),alamat,slug1,slug2,slug3');
	//$this->db->select('DISTINCT(nama_toko),alamat,slug1,slug2,slug3,jml_stok_edit');
	
	//$this->db->where('lap_minggu')->('week1');
	//$this->db->group_by('nama_toko');	
	//$this->db->order_by('nama_toko','ASC');	
	return $this->db->get_where($table,$where);


	}

}