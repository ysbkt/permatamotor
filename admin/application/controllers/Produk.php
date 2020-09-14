<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

	class Produk extends CI_controller
	{
		
		function __construct()
		{
			parent:: __Construct();
			$this->load->model('Produk_model');
		}


		function Index(){			
			$content = array (	'title'		=> 'Tambah Motor',
								'content'	=> 'pages/Motor',
								'jenisMotor'=> $this->Produk_model->getJenisMotor()->result(),
								'jenisHelm'	=> $this->Produk_model->getJenisHelm()->result(),

							);
			$this->load->view('layout/Wrapper',$content);
		}

		function tambahMotor(){
		    $kategori 			= $this->input->post('kategori');
		    $id_kategori		= substr($kategori,0,1);
		    $jenis_kategori		= substr($kategori,1);
			$namaproduk    		= $this->input->post('namaproduk');
		    $jenisproduk		= $this->input->post('jenisproduk');
		    $warnaproduk 	  	= $this->input->post('warnaproduk');
		    $harga				= $this->input->post('harga');
		    $gambar				= $this->input->post('image');
		    $thumb1				= $this->input->post('thumbnail1');
			$thumb2				= $this->input->post('thumbnail2');
			$thumb3				= $this->input->post('thumbnail3');
			$warna1				= $this->input->post('warna1');
			$warna2				= $this->input->post('warna2');
			$warna3				= $this->input->post('warna3');
			$slug				= url_title($namaproduk,'dash',TRUE);

			$tipemesin			= $this->input->post('tipemesin');
		    $silinder			= $this->input->post('susunansilinder');
		    $diameterxlangkah 	= $this->input->post('diameterxlangkah');
		    $kompresi			= $this->input->post('kompresi');
		    $volumesilinder		= $this->input->post('volumesilinder');
		    $dayamaksimum		= $this->input->post('dayamaksimum');
		    $torsi				= $this->input->post('torsi');
		    $sistemstarter		= $this->input->post('sistemstarter');
		    $sistempelumasan	= $this->input->post('sistempelumasan');
		    $olimesin			= $this->input->post('olimesin');
		    $kopling			= $this->input->post('kopling');
		    $transmisi			= $this->input->post('transmisi');
		    $sistembahanbakar	= $this->input->post('sistembahanbakar');
		    $pxlxt				= $this->input->post('pxlxt');
		    $sumburoda			= $this->input->post('sumburoda');
		    $jarakketanah		= $this->input->post('jarakketanah');
		    $tinggitempatduduk	= $this->input->post('tinggitempatduduk');
		    $tangkibensin 		= $this->input->post('tangkibensin');
		    $beratisi			= $this->input->post('beratisi');
		    $tiperangka			= $this->input->post('tiperangka');
		    $suspensidepan		= $this->input->post('suspensidepan');
		    $suspensibelakang	= $this->input->post('suspensibelakang');
		    $tipeban			= $this->input->post('tipeban');
		    $bandepan			= $this->input->post('bandepan');
		    $banbelakang		= $this->input->post('banbelakang');
		    $remdepan			= $this->input->post('remdepan');
		    $rembelakang		= $this->input->post('rembelakang');
		    $sistempengapian	= $this->input->post('sistempengapian');
		    $battery			= $this->input->post('battery');
		    $tipebusi			= $this->input->post('tipebusi');

		    if (!$_FILES['image']['name'] == 0) {
		    $filePath = './assets/img/produk/Motor/'.$jenis_kategori;
		    $new_photo = $namaproduk."-".$warnaproduk;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('image');
		    $data_upload_files = $this->upload->data();
		    $image = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $gambar = $image;
		    }else{
		    	$gambar= "none";
		    }

		    if (!$_FILES['image']['name'] == 0) {
		    $filePath = './assets/img/produk/Thumbnail';
		    $new_photo = $namaproduk."-".$warnaproduk;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('image');
		    $data_upload_files = $this->upload->data();
		    $image = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $gambar = $image;
		    }else{
		    	$gambar= "none";
		    }

			if (!$_FILES['thumbnail1']['name'] == 0) {
		    $filePath = './assets/img/produk/Thumbnail/';
		    $new_photo = $namaproduk."-".$warna1;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('thumbnail1');
		    $data_upload_files = $this->upload->data();
		    $thumbnail1 = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $thumb1= $thumbnail1;
		    }else{
		    	$thumb1= "none";
		    }

		    if (!$_FILES['thumbnail2']['name'] == 0) {
		    $filePath = './assets/img/produk/Thumbnail/';
		    $new_photo = $namaproduk."-".$warna2;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('thumbnail2');
		    $data_upload_files = $this->upload->data();
		    $thumbnail2 = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $thumb2 = $thumbnail2;
		    }else{
		    	$thumb2= "none";
		    }

		    if (!$_FILES['thumbnail3']['name'] == 0) {
		    $filePath = './assets/img/produk/Thumbnail/';
		    $new_photo = $namaproduk."-".$warna3;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('thumbnail3');
		    $data_upload_files = $this->upload->data();
		    $thumbnail3 = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $thumb3 = $thumbnail3;
		    }else{
		    	$thumb3= "none";
		    }

		    $data 		= array('nama_produk'	=> $namaproduk,
								'id_jenis'		=> $jenisproduk,
								'id_kategori'	=> $id_kategori,							
								'warna_produk'	=> $namaproduk." - ".$warnaproduk,
								'harga_produk'	=> $harga,
								'gambar'		=> $gambar,
								'slug'			=> $slug,
								'count_view'	=> 0
								
								);
			$id_produk = $this->Produk_model->tambahProduk($data,'produk');

		    $thumbnail	= array('id_produk'		=> $id_produk,
		    					'thumbnail_1'	=> $thumb1,
								'thumbnail_2'	=> $thumb2,
								'thumbnail_3'	=> $thumb3,
		    					);
		    $this->Produk_model->addThumbnail($thumbnail,'gambar');

		    $warna		= array('id_produk'		=> $id_produk,
		    					'warna'			=> $warnaproduk,
		    					'warna_1'		=> $warna1,
								'warna_2'		=> $warna2,
								'warna_3'		=> $warna3,
								);
		    $this->Produk_model->addWarna($warna,'warna');

		    $spesifikasi= array('id_produk'				=>$id_produk,
		    					'tipe_mesin'			=>$tipemesin,
								'susunan_silinder'		=>$silinder,
								'diameterxlangkah'		=>$diameterxlangkah,
								'kompresi'				=>$kompresi,
								'volume_silinder'		=>$volumesilinder,
								'daya_maksimum'			=>$dayamaksimum,
								'torsi'					=>$torsi,
								'sistem_starter'		=>$sistemstarter,
								'sistem_pelumasan'		=>$sistempelumasan,
								'kapasitas_oli'			=>$olimesin,
								'tipe_kopling'			=>$kopling,
								'transmisi'				=>$transmisi,
								'sistem_bhn_bkr'		=>$sistembahanbakar,
								'pxlxt'					=>$pxlxt,
								'jarak_sumbu_roda'		=>$sumburoda,
								'jarak_terendah'		=>$jarakketanah,
								'tinggi_tempat_duduk'	=>$tinggitempatduduk,
								'tangki_bensin'			=>$tangkibensin,
								'berat_isi'				=>$beratisi,
								'tipe_rangka'			=>$tiperangka,
								'suspensi_depan'		=>$suspensidepan,
								'suspensi_belakang'		=>$suspensibelakang,
								'tipe_ban'				=>$tipeban,
								'ban_depan'				=>$bandepan,
								'ban_belakang'			=>$banbelakang,
								'rem_depan'				=>$remdepan,
								'rem_belakang'			=>$rembelakang,
								'sistem_pengapian'		=>$sistempengapian,
								'tipe_battery'			=>$battery,
								'tipe_busi'				=>$tipebusi
								);
		    $this->Produk_model->addSpesifikasi($spesifikasi,'spesifikasi');
			$this->session->set_flashdata('status','<div class="alert alert-success alert-dismissable text-center"><a href="#" data-dismiss="alert" aria-label="close"></a>Anda berhasil menambahkan produk</div>');
		    redirect('Produk');

		  }

		  function Helm(){
		  	$content = array (	'title'		=> 'Tambah Motor',
								'content'	=> 'pages/Helm',
								'jenisHelm'	=> $this->Produk_model->getJenisHelm()->result(),

							);
			$this->load->view('layout/Wrapper',$content);
		  }

		  function tambahHelm(){
			$namaproduk    		= $this->input->post('namaproduk');
		    $jenisproduk		= $this->input->post('jenisproduk');
		    $kategori 			= $this->input->post('kategori');
		    $id_kategori		= substr($kategori,0,2);
		    $jenis_kategori		= substr($kategori,2);
		    $warnaproduk 	  	= $this->input->post('warnaproduk');
		    $harga				= $this->input->post('harga');
		    $gambar				= $this->input->post('image');

		    if (!$_FILES['image']['name'] == 0) {
		    $filePath = './img/produk/Helm/'.$jenis_kategori;
		    $new_photo = $gambar;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('image');
		    $data_upload_files = $this->upload->data();
		    $image = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $gambar = $image;
		    }else{
		    	$gambar= "none";
		    }

		    $data = array(
		    				'nama_produk'		=>$namaproduk,
							'id_jenis'			=>$jenisproduk,
							'id_kategori'		=>$id_kategori,							
							'warna_produk'		=>$warnaproduk,
							'harga_produk'		=>$harga,
							'gambar'			=>$gambar
							);
			$this->Produk_model->tambahProduk($data,'produk');
			$this->session->set_flashdata('status','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Berhasil Menambahkan Produk, Silahkan Masukkan Spesifikasi</div>');
		    redirect('Produk/Spesifikasi');
		}

		  function Spesifikasi(){
		  	$id_produk = "";
			// $where = array('' => $slug);
			$produk = $this->Produk_model->getSpekProduk()->result();
			foreach ($produk as $item) {
					$spekProduk = $item->id;

			}

		  	$content = array (	'title'			=> 'Tambah Spesifikasi',
		  						'content'		=> 'pages/Spesifikasi',
		  						'spesifikasi'	=> $this->Produk_model->getSpekProduk()->result(),
								'idProduk'		=> $spekProduk,


		  					);
		  	$this->load->view('layout/Wrapper',$content);
		  }

		  function tambahSpesifikasi(){
		  	$idProduk 			= $this->input->post('idProduk');
		  	$tipemesin			= $this->input->post('tipemesin');
		    $silinder			= $this->input->post('silinder');
		    $diameterxlangkah 	= $this->input->post('diameterxlangkah');
		    $kompresi			= $this->input->post('kompresi');
		    $volumesilinder		= $this->input->post('volumesilinder');
		    $dayamaksimum		= $this->input->post('dayamaksimum');
		    $torsi				= $this->input->post('torsi');
		    $starter			= $this->input->post('starter');
		    $pelumasan			= $this->input->post('pelumasan');
		    $olimesin			= $this->input->post('olimesin');
		    $kopling			= $this->input->post('kopling');
		    $transmisi			= $this->input->post('transmisi');
		    $sistembb			= $this->input->post('sistembb');
		    $pxlxt				= $this->input->post('pxlxt');
		    $sumburoda			= $this->input->post('sumburoda');
		    $jarakketanah		= $this->input->post('jarakketanah');
		    $jok 				= $this->input->post('jok');
		    $tangkibensin 		= $this->input->post('tangkibensin');
		    $beratisi			= $this->input->post('beratisi');
		    $tiperangka			= $this->input->post('tiperangka');
		    $suspensidepan		= $this->input->post('suspensidepan');
		    $suspensibelakang	= $this->input->post('suspensibelakang');
		    $tipeban			= $this->input->post('tipeban');
		    $bandepan			= $this->input->post('bandepan');
		    $banbelakang		= $this->input->post('banbelakang');
		    $remdepan			= $this->input->post('remdepan');
		    $rembelakang		= $this->input->post('rembelakang');
		    $pengapian			= $this->input->post('pengapian');
		    $battery			= $this->input->post('battery');
		    $busi				= $this->input->post('busi');

			$spek = array(
							'id_produk'				=>$idProduk,				
							'tipe_mesin'			=>$tipemesin,
							'susunan_silinder'		=>$silinder,
							'diameterxlangkah'		=>$diameterxlangkah,
							'kompresi'				=>$kompresi,
							'volume_silinder'		=>$volumesilinder,
							'daya_maksimum'			=>$dayamaksimum,
							'torsi'					=>$torsi,
							'sistem_starter'		=>$starter,
							'sistem_pelumasan'		=>$pelumasan,
							'kapasitas_oli'			=>$olimesin,
							'tipe_kopling'			=>$kopling,
							'transmisi'				=>$transmisi,
							'sistem_bhn_bkr'		=>$sistembb,
							'pxlxt'					=>$pxlxt,
							'jarak_sumbu_roda'		=>$sumburoda,
							'jarak_terendah'		=>$jarakketanah,
							'tinggi_tempat_duduk'	=>$jok,
							'tangki_bensin'			=>$tangkibensin,
							'berat_isi'				=>$beratisi,
							'tipe_rangka'			=>$tiperangka,
							'suspensi_depan'		=>$suspensidepan,
							'suspensi_belakang'		=>$suspensibelakang,
							'tipe_ban'				=>$tipeban,
							'ban_depan'				=>$bandepan,
							'ban_belakang'			=>$banbelakang,
							'rem_depan'				=>$remdepan,
							'rem_belakang'			=>$rembelakang,
							'sistem_pengapian'		=>$pengapian,
							'tipe_battery'			=>$battery,
							'tipe_busi'				=>$busi
							);

		    $this->Produk_model->tambahSpek($spek,'spesifikasi_motor');
		    $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Upload has been successfull!</div>');
		    redirect(base_url('Produk'));

		  }

		function listKategori(){
		// POST data 
	    $postData = $this->input->post();
	    
	    // get data 
	    $content = $this->Produk_model->listKategori($postData);
	    echo json_encode($content); 
		
		}


		function List(){
			$content = array (
								'title'			=> 'Admin Permata Motor',
								'content'		=> 'pages/List',
								// 'produk'		=> $this->Produk_model->listProduk()->result(),
								// 'spesifikasi'	=> $this->Produk_model->Spesifikasi()->result(),
								'produk' 		=> $this->Produk_model->Produk()->result(),
								'Kategori'		=> $this->Produk_model->getJenisKategoriAll()->result(),
								// 'listKategori'	=> $this->listKategori()

							);
			$this->load->view('layout/Wrapper',$content);
		}

		function showSpesifikasi($id){
			$where	= array('id_produk' => $id);
		  	$data	= $this->Produk_model->Spesifikasi($where);
			echo json_encode($data);
		  }

		function saveEditSpesifikasi(){
			$id_produk 			= $this->input->post('id_produk');
		  	$tipemesin			= $this->input->post('tipemesin');
		    $silinder			= $this->input->post('susunansilinder');
		    $diameterxlangkah 	= $this->input->post('diameterxlangkah');
		    $kompresi			= $this->input->post('kompresi');
		    $volumesilinder		= $this->input->post('volumesilinder');
		    $dayamaksimum		= $this->input->post('dayamaksimum');
		    $torsi				= $this->input->post('torsi');
		    $sistemstarter		= $this->input->post('sistemstarter');
		    $sistempelumasan	= $this->input->post('sistempelumasan');
		    $olimesin			= $this->input->post('olimesin');
		    $kopling			= $this->input->post('kopling');
		    $transmisi			= $this->input->post('transmisi');
		    $sistembahanbakar	= $this->input->post('sistembahanbakar');
		    $pxlxt				= $this->input->post('pxlxt');
		    $sumburoda			= $this->input->post('sumburoda');
		    $jarakketanah		= $this->input->post('jarakketanah');
		    $tinggitempatduduk	= $this->input->post('tinggitempatduduk');
		    $tangkibensin 		= $this->input->post('tangkibensin');
		    $beratisi			= $this->input->post('beratisi');
		    $tiperangka			= $this->input->post('tiperangka');
		    $suspensidepan		= $this->input->post('suspensidepan');
		    $suspensibelakang	= $this->input->post('suspensibelakang');
		    $tipeban			= $this->input->post('tipeban');
		    $bandepan			= $this->input->post('bandepan');
		    $banbelakang		= $this->input->post('banbelakang');
		    $remdepan			= $this->input->post('remdepan');
		    $rembelakang		= $this->input->post('rembelakang');
		    $sistempengapian	= $this->input->post('sistempengapian');
		    $battery			= $this->input->post('battery');
		    $tipebusi			= $this->input->post('tipebusi');

			$spek = array(	'tipe_mesin'			=>$tipemesin,
							'susunan_silinder'		=>$silinder,
							'diameterxlangkah'		=>$diameterxlangkah,
							'kompresi'				=>$kompresi,
							'volume_silinder'		=>$volumesilinder,
							'daya_maksimum'			=>$dayamaksimum,
							'torsi'					=>$torsi,
							'sistem_starter'		=>$sistemstarter,
							'sistem_pelumasan'		=>$sistempelumasan,
							'kapasitas_oli'			=>$olimesin,
							'tipe_kopling'			=>$kopling,
							'transmisi'				=>$transmisi,
							'sistem_bhn_bkr'		=>$sistembahanbakar,
							'pxlxt'					=>$pxlxt,
							'jarak_sumbu_roda'		=>$sumburoda,
							'jarak_terendah'		=>$jarakketanah,
							'tinggi_tempat_duduk'	=>$tinggitempatduduk,
							'tangki_bensin'			=>$tangkibensin,
							'berat_isi'				=>$beratisi,
							'tipe_rangka'			=>$tiperangka,
							'suspensi_depan'		=>$suspensidepan,
							'suspensi_belakang'		=>$suspensibelakang,
							'tipe_ban'				=>$tipeban,
							'ban_depan'				=>$bandepan,
							'ban_belakang'			=>$banbelakang,
							'rem_depan'				=>$remdepan,
							'rem_belakang'			=>$rembelakang,
							'sistem_pengapian'		=>$sistempengapian,
							'tipe_battery'			=>$battery,
							'tipe_busi'				=>$tipebusi
							);
			$where	= array('id_produk'				=>$id_produk);
			$this->Produk_model->updateHargaKredit($where,$spek,'spesifikasi');
			$this->session->set_flashdata('spesifikasi','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Anda berhasil merubah spesifikasi</div>');
			redirect('Produk/List','refresh');
		}

		function priceList($id){
			$where		= array( 'p.id' => $id);
			$id_produk	= $id;
			$content	= array( 'title'	=> 'Price List',
								 'content'	=> 'pages/Price',
								 'produk'	=> $this->Produk_model->get_produk_id($id)->result(),
								 'harga'	=> $this->Produk_model->Kredit($where,'kredit')->result(),
								 'id_produk'=> $id_produk
								 // 'produks'	=> $this->Produk_model->priceListProduk($where,'produk')->result(),

								);
			$this->load->view('layout/Wrapper',$content);
		}

		function showPrice($id){
			$data	= $this->Produk_model->showPrice($id);
			echo json_encode($data);
		}

		function editHargaKredit(){
			$id_kredit	= $this->input->post('id_kredit');
			$id_produk	= $this->input->post('id_produk');
			$dp			= $this->input->post('dp');
			$bulan11	= $this->input->post('11bulan');
			$bulan17	= $this->input->post('17bulan');
			$bulan23	= $this->input->post('23bulan');
			$bulan29	= $this->input->post('29bulan');
			$bulan35	= $this->input->post('35bulan');

			$data		= array('dp'		=> $dp,
								'tenor_11'	=> $bulan11,
								'tenor_17'	=> $bulan17,
								'tenor_23'	=> $bulan23,
								'tenor_29'	=> $bulan29,
								'tenor_35'	=> $bulan35,

								);
			$where		= array('id'		=> $id_kredit);

			$this->Produk_model->updateHargaKredit($where,$data,'kredit');
			$this->session->set_flashdata('kredit','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Anda berhasil merubah harga kredit</div>');
			redirect('Produk/priceList/'.$id_produk);
		}

		function showHargaKredit(){
			$data = $this->Produk_model->showHargaKredit($id);
			echo json_encode($data);
		}

		function tambahHargaKredit(){
			$id_produk	= $this->input->post('id_produk');
			$dp			= $this->input->post('dp');
			$bulan11	= $this->input->post('11_bulan');
			$bulan17	= $this->input->post('17_bulan');
			$bulan23	= $this->input->post('23_bulan');
			$bulan29	= $this->input->post('29_bulan');
			$bulan35	= $this->input->post('35_bulan');

			$kredit		= array('id_produk'	=> $id_produk,
								'dp'		=> $dp,
								'tenor_11'	=> $bulan11,
								'tenor_17'	=> $bulan17,
								'tenor_23'	=> $bulan23,
								'tenor_29'	=> $bulan29,
								'tenor_35'	=> $bulan35,
								);
			$this->Produk_model->tambahHargaKredit($kredit,'kredit');
			 $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Upload has been successfull!</div>');
		    redirect('Produk/priceList/'.$id_produk,'refresh');
		}

		function HapusHargaKredit(){
			$id	= $this->input->post('id');
			$where = array('id' => $id);
			$this->Produk_model->hapusHargaKredit($where);
			$this->session->set_flashdata('delete','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Anda berhasil Menghapus List Harga!</div>');
			redirect('Produk/priceList/'.$id,'refresh');
		}

		function HapusBanner(){
				$id	= $this->input->post('id');
				$this->Produk_model->HapusBanner($id);
				$this->session->set_flashdata('delete','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Anda berhasil Menghapus Produk</div>');
				redirect('Home/Banner');
			}

		function GambarPriceList($id){
			$where		= array('p.id'		=> $id);
			$content	= array('title' 	=> 'Edit Motor',
								'content'	=> 'pages/Input_Price_List',
								'produk'	=> $this->Produk_model->editMotor($where,'produk')->result(),
								'jenisMotor'=> $this->Produk_model->getJenisMotor()->result(),

								);
			$this->load->view('layout/Wrapper',$content);
		}

		function TambahGambarPricelist(){
			$id_kredit	= $this->input->post('id_kredit');
			$id_produk	= $this->input->post('id_produk');
			$gambar		= $this->input->post('image');

			if (!$_FILES['image']['name'] == 0) {
		    $filePath = './assets/img/produk/Motor/Price_List';
		    $new_photo = $gambar;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('image');
		    $data_upload_files = $this->upload->data();
		    $image = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $gambar = $image;
		    }else{
		    	$gambar= "none";
		    }

		    $data		= array('gambar_price_list'	=> $gambar);
		    $where		= array('id'				=> $id_produk);
			$this->Produk_model->saveEditMotor($where,$data,'produk');
			$this->session->set_flashdata('kredit','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Anda berhasil merubah harga kredit</div>');
			redirect('Produk/priceList/'.$id_produk);
		}

		function DeleteMotor(){
			$id	= $this->input->post('id_produk');
			// $where	= array('id_produk' => $id);
			$this->Produk_model->hapusMotor($id);
			$this->Produk_model->hapusHarga($id);
			$this->Produk_model->hapusSpek($id);
			$this->session->set_flashdata('delete','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Anda berhasil Menghapus Produk</div>');
			redirect('Produk/List');
		}

		function editMotor($id){
			$where		= array('p.id'		=> $id);
			$content	= array('title' 	=> 'Edit Motor',
								'content'	=> 'pages/Edit_Motor',
								'produk'	=> $this->Produk_model->editMotor($where,'produk')->result(),
								'jenisMotor'=> $this->Produk_model->getJenisMotor()->result(),

								);
			$this->load->view('layout/Wrapper',$content);
		}

		function saveEditMotor(){
			$id_produk		= $this->input->post('id_produk');
			$kategori 		= $this->input->post('kategori');
		    $id_kategori	= substr($kategori,0,1);
		    $jenis_kategori	= substr($kategori,1);
			$namaproduk    	= $this->input->post('namaproduk');
		    $jenisproduk	= $this->input->post('jenisproduk');
		    $warnaproduk 	= $this->input->post('warnaproduk');
		    $harga			= $this->input->post('harga');
		    $gambar			= $this->input->post('image');

		    $warna1			= $this->input->post('warna1');
			$warna2			= $this->input->post('warna2');
			$warna3			= $this->input->post('warna3');

		    $thumb1			= $this->input->post('thumbnail1');
			$thumb2			= $this->input->post('thumbnail2');
			$thumb3			= $this->input->post('thumbnail3');

			if (!$_FILES['image']['name'] == 0) {
		    $filePath = './assets/img/produk/Motor/'.$jenis_kategori;
		    $new_photo = $gambar;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('image');
		    $data_upload_files = $this->upload->data();
		    $image = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $gambar = $image;
		    }else{
		    	$gambar= $this->input->post('image_hide');
		    }

		    if (!$_FILES['image']['name'] == 0) {
		    $filePath = './assets/img/produk/Thumbnail/';
		    $new_photo = $gambar;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('image');
		    $data_upload_files = $this->upload->data();
		    $image = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $gambar = $image;
		    }else{
		    	$gambar= $this->input->post('image_hide');
		    }

		    if (!$_FILES['thumbnail1']['name'] == 0) {
		    $filePath = './assets/img/produk/Thumbnail/';
		    $new_photo = $thumb1;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('thumbnail1');
		    $data_upload_files = $this->upload->data();
		    $thumbnail1 = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $thumb1= $thumbnail1;
		    }else{
		    	$thumb1= $this->input->post('thumbnail1_hide');
		    }

		    if (!$_FILES['thumbnail2']['name'] == 0) {
		    $filePath = './assets/img/produk/Thumbnail/';
		    $new_photo = $thumb2;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('thumbnail2');
		    $data_upload_files = $this->upload->data();
		    $thumbnail2 = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $thumb2 = $thumbnail2;
		    }else{
		    	$thumb2= $this->input->post('thumbnail2_hide');
		    }

		    if (!$_FILES['thumbnail3']['name'] == 0) {
		    $filePath = './assets/img/produk/Thumbnail/';
		    $new_photo = $thumb3;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('thumbnail3');
		    $data_upload_files = $this->upload->data();
		    $thumbnail3 = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $thumb3 = $thumbnail3;
		    }else{
		    	$thumb3= $this->input->post('thumbnail3_hide');
		    }

		    $data = array(	'nama_produk'	=>$namaproduk,
							'id_jenis'		=>$jenisproduk,
							'id_kategori'	=>$id_kategori,							
							'warna_produk'	=>$namaproduk." - ".$warnaproduk,
							'harga_produk'	=>$harga,
							'gambar'		=>$gambar
							);
		    $where = array('id'	=>$id_produk);
			$this->Produk_model->saveEditMotor($where,$data,'produk');

			$warna		= array('warna'			=> $warnaproduk,
		    					'warna_1'		=> $warna1,
								'warna_2'		=> $warna2,
								'warna_3'		=> $warna3,
								);
			$where		= array('id_produk'		=> $id_produk);
		    $this->Produk_model->editWarna($where,$warna,'warna');

		    $thumbnail	= array('id_produk'		=> $id_produk,
								'thumbnail_1'	=> $thumb1,
								'thumbnail_2'	=> $thumb2,
								'thumbnail_3'	=> $thumb3,
							);
		    $where		= array('id_produk'		=> $id_produk);
			$this->Produk_model->editThumbnail($where,$thumbnail,'gambar');
			$this->session->set_flashdata('status','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Anda berhasil merubah produk</div>');
		    redirect(base_url('Produk/List'));

		}

		function Thumbnail($id){
			$where = array('id' => $id);
			$content	= array( 'title'	=> 'Thumbnail',
								 'content'	=> 'pages/Thumbnail',
								 // 'produk'	=> $this->Produk_model->Produk()->result(),
								 'produk'	=> $this->Produk_model->Thumbnail($where,'produk')->result(),

								);
			$this->load->view('layout/Wrapper',$content);
		}

		function tambahThumbnail(){
			$id_produk	= $this->input->post('id_produk');
			$thumb1		= $this->input->post('thumbnail1');
			$thumb2		= $this->input->post('thumbnail2');
			$thumb3		= $this->input->post('thumbnail3');

			if (!$_FILES['thumbnail1']['name'] == 0) {
		    $filePath = './assets/img/produk/Thumbnail/';
		    $new_photo = $thumb1;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('thumbnail1');
		    $data_upload_files = $this->upload->data();
		    $thumbnail1 = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $thumb1= $thumbnail1;
		    }else{
		    	$thumb1= "none";
		    }

		    if (!$_FILES['thumbnail2']['name'] == 0) {
		    $filePath = './assets/img/produk/Thumbnail/';
		    $new_photo = $thumb2;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('thumbnail2');
		    $data_upload_files = $this->upload->data();
		    $thumbnail2 = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $thumb2 = $thumbnail2;
		    }else{
		    	$thumb2= "none";
		    }

		    if (!$_FILES['thumbnail3']['name'] == 0) {
		    $filePath = './assets/img/produk/Thumbnail/';
		    $new_photo = $thumb3;
		    $config ['file_name'] = $new_photo;
		    $config ['overwrite'] = TRUE; 
		    $config['upload_path'] = $filePath;
		    $config ['allowed_types'] = 'jpg|png|jpeg|gif|JPG|PNG|JPEG|GIF';
		    $config['max_size'] = '2048';
		    $this->load->library('upload', $config);
		    $this->upload->initialize($config); 
		    $this->upload->do_upload('thumbnail3');
		    $data_upload_files = $this->upload->data();
		    $thumbnail3 = $data_upload_files['file_name'];
		    $error_photo= $this->upload->display_errors();
		    echo $error_photo;
		    $thumb3 = $thumbnail3;
		    }else{
		    	$thumb3= "none";
		    }

		    $data = array(	'id_produk'		=> $id_produk,
							'thumbnail_1'	=> $thumb1,
							'thumbnail_2'	=> $thumb2,
							'thumbnail_3'	=> $thumb3,

							);

			$this->Produk_model->addThumbnail($data,'gambar');
			$this->session->set_flashdata('status','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Anda berhasil menambahkan Thumbnail</div>');
		    redirect(base_url('Produk/List'));
		}

		function Promo(){
			$content	= array( 'title'	=> 'Thumbnail',
								 'content'	=> 'pages/Promo',
								 'produk'	=> $this->Produk_model->Promo()->result()
								);
			$this->load->view('layout/Wrapper',$content);
		}

		function EditPromosi($id){
			$where	= array('pp.id' => $id);
			$data	= $this->Produk_model->EditPromosi($where);
			echo json_encode($data);
		}

		function editHargaPromo(){
			$id_promo	= $this->input->post('id_promo');
			$id_produk	= $this->input->post('id_produk');
			$dp			= $this->input->post('dp');
			$diskon_35	= $this->input->post('diskon35');

			$data		= array('diskon_dp'	=> $dp,
								'diskon_35'	=> $diskon_35,

								);
			$where		= array('id'		=> $id_promo);

			$this->Produk_model->editHargaPromo($where,$data,'produk_promo');
			$this->session->set_flashdata('edit','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Anda berhasil merubah harga promosi</div>');
			redirect('Produk/Promo');
		}

		function HapusProdukPromo(){
			$id	= $this->input->post('id');
			// $where	= array('id_produk' => $id);
			$this->Produk_model->HapusProdukPromo($id);
			$this->session->set_flashdata('delete','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Anda berhasil Menghapus list promo</div>');
			redirect('Produk/Promo');
		}

		function getProdukPromo(){
			$data	= $this->Produk_model->getProdukPromo()->result();
			echo json_encode($data);
		}

		function addPromo(){
			$judul		= $this->input->post('judul');
			$bulan		= $this->input->post('bulan');
			$tahun		= $this->input->post('tahun');
			$deskripsi	= $this->input->post('deskripsi');

			$data		= array('judul'		=> $judul,
								'bulan'		=> $bulan,
								'tahun'		=> $tahun,
								'deskripsi'	=> $deskripsi,

								);
			$this->Produk_model->addPromo($data,'banner_promo');
			$this->session->set_flashdata('promo','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Anda berhasil menambahkan deskripsi promo</div>');
			redirect(base_url('Produk/Promo'));
		}

		function addProdukPromo(){
			$id_produk		= $this->input->post('nama_produk');

			$data		= array('id_produk'	=> $id_produk,
								);
			$this->Produk_model->addProdukPromo($data,'promo');
			$this->session->set_flashdata('status','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Anda berhasil menambahkan produk promo</div>');
		    redirect(base_url('Produk/Promo'));
		}

		function ShowMotor($id){
			$where	= array('p.id'	=> $id);
			$data	= $this->Produk_model->ShowMotor($where);
			echo json_encode($data);
		}

		function Stock($id){
				$data	= array('stock'	=> 'Ready Stock');
				$where	= array('id'	=> $id);

				$this->Produk_model->Stock($data,$where);
				$this->session->set_flashdata('stock','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Data berhasil Dirubah</div>');
				redirect('Produk/List');
			}

		function OutOfStock($id){
			$data	= array('stock'	=> 'Out of Stock');
			$where	= array('id'	=> $id);

			$this->Produk_model->Stock($data,$where);
			$this->session->set_flashdata('stock','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Data berhasil Dirubah</div>');
			redirect('Produk/List', 'refresh');
		}

	}

 ?>