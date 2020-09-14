<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockCard extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('StockCard_models');
		$this->load->helper('url');
		

 
	}
    
public function Index() {
		$content = array(	'title'		=>'Onda Sales Monitoring',
							'content'  		=>'pages/StockCard',
							'sales'		=>$this->StockCard_models->view_att()->result()						
					);

		$this->load->view('layout/Wrapper',$content);	
	}



public function ViewBranch($slug1) {


	
		$where = array('slug1' => $slug1);

		$content = array(	'title'			=>'Onda Sales Monitoring',
							'content'  		=>'pages/StockBranch',
							'sales' 	=> $this->StockCard_models->today_att($where,'tbl_stok')->result(),
							
													
					);

		$this->load->view('layout/Wrapper',$content);	
	}




public function ViewStore($slug1,$slug2) {


	
		$where = array('slug1' => $slug1,'slug2' =>$slug2

	);

		$content = array(	'title'			=>'Onda Sales Monitoring',
							'content'  		=>'pages/StockCardStore',
							'sales' 	=> $this->StockCard_models->view_all_store($where,'tbl_stok')->result()


														);

		$this->load->view('layout/Wrapper',$content);	
	}


public function ViewProgram($slug1) {


	
		$where = array('slug1' => $slug1);


		$content = array(	'title'			=>'Onda Sales Monitoring',
							'content'  		=>'pages/StockCardDetails',
							'sales' 		=> $this->StockCard_models->today_program($where,'tbl_stok')->result(),
							'list' 			=> $this->StockCard_models->today_sales_list($where,'tbl_stok2')->result()
							
														);

		$this->load->view('layout/Wrapper',$content);	
	}


public function ViewList($slug1) {


	
		$where = array('slug1' => $slug1);


		$content = array(	'title'			=>'Onda Sales Monitoring',
							'content'  		=>'pages/StockCardList',
							'sales' 		=> $this->StockCard_models->today_program($where,'tbl_stok')->result(),
							'list' 			=> $this->StockCard_models->today_sales_list2($where,'tbl_stok')->result()
							
														);

		$this->load->view('layout/Wrapper',$content);	
	}


public function ViewAll($id,$tk) {


		$where = array('nama_toko' => $id,'cabang_toko' =>$tk );

		$content = array(	'title'		=>'Onda Sales Monitoring',
							'content'  		=>'pages/StockAll',
							'sales' 	=> $this->StockCard_models->histories_sales($where,'tbl_stok')->result(),
							'list' 			=> $this->StockCard_models->today_sales_list($where,'tbl_stok')->result()
										
					);

		$this->load->view('layout/Wrapper',$content);	
	}




public function ManageStockCard() {

		$postData = $this->input->post('nama_toko');

		$content = array(	'title'		=>'Onda Sales Monitoring',
							'content'  		=>'pages/AddStockCard',
							 'storename' =>$this->StockCard_models->getStoreName(),
							 'branch'	=>$this->StockCard_models->getStoreBranch($postData),
							 'barang'	=>$this->StockCard_models->view_barang()->result()
							 // 'address'	=>$this->StockCard_models->getStoreAddress($postData)				
					);
		$this->load->model('StockCard_models');


		//$data['storename'] = $this->StockCard_models->getStoreName();

		$this->load->view('layout/Wrapper',$content);	
	}






public function AddNew(){
	setlocale(LC_TIME, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID');
	$dayList = array(
		'Jan' => 'Januari',
		'Feb' => 'Februari',
		'Mar' => 'Maret',
		'Apr' => 'April',
		'Mey' => 'Mei',
		'Jun' => 'Juni',
		'Jul' => 'Juli',
		'Aug' => 'Agustus',
		'Sep' => 'September',
		'Oct' => 'Oktober',
		'Nov' => 'November',
		'Dec' => 'Desember');
	$nama_toko = $this->input->post('nama_toko');
	$cabang = $this->input->post('cabang_toko');
	$alamat = $this->input->post('alamat');
	$jumlah = $this->input->post('jumlah');
	$jml 	= $this->input->post('jml');
	$bln=date("M");

	$slug1 = url_title($nama_toko, 'dash', true);
	$slug2 = url_title($cabang, 'dash', true);
	$slug3 = url_title($alamat, 'dash', true);
	
	for($i = 0; $i<$jml; $i++){

		$kode[$i] =  $this->input->post('kode_barang_'.$i);
		$nama[$i] =  $this->input->post('nama_barang_'.$i);
		$size[$i] =  $this->input->post('ukuran_barang_'.$i);
		$jumlah[$i] = $this->input->post('jumlah_barang_'.$i);

		// echo $kode[$i];
		// echo $nama[$i];
		// echo $size[$i];
		// echo $jumlah[$i];
		$data = array(	'nama_toko' 	=> $nama_toko,
						'cabang_toko' 	=> $cabang,
						'code_stok' 	=> $kode[$i],
						'nama_stok'		=> $nama[$i],
						'size_stok'		=> $size[$i],
						'jml_stok'		=> $jumlah[$i],
						'slug1'			=> $slug1,
						'slug2'			=> $slug2,
						'slug3'			=> $slug3,
						'user_spg'		=> 'byadmin',
						'id_spg'		=> 'byadmin',
						'nama_spg'		=> 'byadmin',
						'alamat'		=> $alamat,
						'jml_stok_edit' => $jumlah[$i],
						'tanggal'		=> date('d/m/Y'),
						'bulan'			=> $dayList[$bln]	

					);


		// print_r($data);
		$this->StockCard_models->insert_data($data,'tbl_stok');
	}
		redirect('StockCard/ManageStockCard');
	
	// $nama_brand = $this->input->post('nama_brand');
	// $jml_penjualan_harian = $this->input->post('jml_penjualan_harian');
	// $nama_toko = $this->input->post('nama_toko');
	// $cabang_toko = $this->input->post('cabang_toko');
	// $alamat = $this->input->post('alamat');

	// $lap_minggu = $this->input->post('lap_minggu');
	
	// $slug1 = url_title($nama_toko, 'dash', true);
	// $slug2 = url_title($cabang_toko, 'dash', true);
	// $slug3 = url_title($alamat, 'dash', true);


	// $data = array(

	// 		'nama_brand'			=> $nama_brand,
	// 		'jml_penjualan_harian'	=> $jml_penjualan_harian,
	// 		'nama_toko'				=> $nama_toko,
	// 		'cabang_toko'			=> $cabang_toko,
	// 		'tanggal'				=> date('d/m/y'),
	// 		'bulan'					=> date('M'),
	// 		'lap_minggu'			=> $lap_minggu,
	// 		'slug1'					=> $slug1,
	// 		'slug2'					=> $slug2,
	// 		'slug3'					=> $slug3,
	// 		'user_spg'				=> 'byadmin',
	// 		'id_spg'				=> 'byadmin',
	// 		'nama_spg'				=> 'byadmin',
	// 		'alamat'				=>$alamat
			
	// );


	// 	$this->StockCard_models->insert_data($data,'tbl_penjualan_harian ');
		
	// 	$this->session->set_flashdata('msg', 
 //                '<div class="alert alert-warning">
 //                    <h4>Success</h4>
 //                    <p>Input Data Success</p>
 //                </div>');

		
	// redirect('SalesReport/AddSalesReport');
}


public function getBranch(){ 
    // POST data 
    $postData = $this->input->post();
      
    // get data 
    $data = $this->StockCard_models->getStoreBranch($postData);
    echo json_encode($data); 
  }

  public function getAddress(){ 
    // POST data 
    $postData = $this->input->post();
    $postData2 = $this->input->post();
      
    // get data 
    $data = $this->StockCard_models->getStoreAddress($postData,$postData2);
    echo json_encode($data); 
  }


public function getStoreBranch(){ 
    // POST data 
    $postData = $this->input->post();
    
    // get data 
    $content = $this->StockCard_models->getStoreBranch($postData);
    echo json_encode($content); 
  }


  public function getStoreAddress($postData){ 
    // POST data 
    $postData = $this->input->post();

    // get data 
    $data = $this->StockCard_models->getStoreAddress($postData);
    echo json_encode($data); 
  }







}
