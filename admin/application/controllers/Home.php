<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

		class Home extends CI_controller
		{		
			function __Construct(){
				parent::__construct();
				$this->load->library('cart');
				$this->load->model('Konsumen_model');
				$this->load->model('Produk_model');
			}

			public function Index(){
				$content = array (	'title' 			=> 'Admin Permata Motor',
									'content'			=> 'pages/Home',
									'count_produk'		=> $this->Produk_model->countProduk(),
									'count_konsumen'	=> $this->Produk_model->countPelanggan(),
									'count_order'		=> $this->Produk_model->countOrder(),

								);
				$this->load->view('layout/Wrapper',$content);
			}

			function Banner(){
				$content	= array( 'title'	=> 'List Banner',
									 'content'	=> 'pages/Banner',
									 'banner'	=> $this->Produk_model->Banner()->result(),

									);
				$this->load->view('layout/Wrapper',$content);
			}

			function TambahBanner(){
				$content		= array( 'title'	=> 'Tambah Banner',
									 'content'	=> 'pages/Tambah_Banner',

									);
				$this->load->view('layout/Wrapper',$content);
			}

			function SaveTambahbanner(){
				$title	= $this->input->post('title');
				$gambar	= $this->input->post('image');

				if (!$_FILES['image']['name'] == 0) {
			    $filePath = './assets/img/banner/';
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

			    $data	= array('image'	=> $gambar,
								'title'	=> $title,

								);
			    $this->Produk_model->TambahBanner($data,'banner');
			    $this->session->set_flashdata('addbanner','<div class="alert alert-success alert-dismissable text-center"><a href="#" data-dismiss="alert" aria-label="close"></a>Banner berhasil ditambahkan</div>');
		    redirect('Home/TambahBanner','refresh');
			}

			function editBanner($id){
				$where		= array('id'	=> $id);
				$content	= array( 'title'	=> 'Edit Banner',
									 'content'	=> 'pages/Edit_Banner',
									 'banner'	=> $this->Produk_model->EditBanner($where,'banner')->result(),
									);
				$this->load->view('layout/Wrapper',$content);
			}

			function SaveEditBanner(){
				$id		= $this->input->post('id');
				$gambar	= $this->input->post('image');

				if (!$_FILES['image']['name'] == 0) {
			    $filePath = './assets/img/banner/';
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
			    	$gambar= $this->input->post('banner_hide');
			    }

			    $data	= array('image'	=> $gambar);

			    $where	= array('id'	=> $id);
			$this->Produk_model->SaveEditBanner($where,$data,'banner');
			$this->session->set_flashdata('banner','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Anda berhasil merubah produk</div>');
		    redirect('Home/Banner');

			}

			function HapusBanner(){
				$id	= $this->input->post('id');
				$this->Produk_model->HapusBanner($id);
				$this->session->set_flashdata('delete','<div class="alert alert-success alert-dismissable text-center"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a>Anda berhasil Menghapus Produk</div>');
				redirect('Home/Banner');
			}

			function Tables(){
				$content = array (	'title'		=> 'Admin Permata Motor',
									'content'	=> 'pages/Tables',
									'konsumen'	=> $this->Konsumen_model->dataKonsumen()->result(),
									'produk'	=> $this->Produk_model->Produk()->result(),

								);
				$this->load->view('layout/Wrapper',$content);
			}

			function Survey(){
				$data = $this->Produk_model->Survey($id);
				echo json_encode($data);
			}

			function TambahSurvey(){
				$id		= $this->input->post('id');

				$data	= array('status'	=> 'Survey',
								'surveyor'	=> $this->input->post('surveyor'));
				$where	= array('id'		=> $id);

				$this->Produk_model->Survey($data,$where);
				redirect('Home/Tables');
			}

			function Terima($id){
				$data	= array('status'	=> 'Terima');
				$where	= array('id'		=> $id);

				$this->Produk_model->Survey($data,$where);
				redirect('Home/Tables');
			}

			function Tolak(){
				$data = $this->Produk_model->Survey($id);
				echo json_encode($data);
			}

			function AlasanTolak(){
				$id		= $this->input->post('id');

				$data	= array('status'	=> 'Tolak',
								'keterangan'=> $this->input->post('tolak'));
				$where	= array('id'		=> $id);

				$this->Produk_model->Survey($data,$where);
				redirect('Home/Tables');
			}

			function OrderInfo($id){
				$content = array (	'title'		=> 'Order Info',
									'content'	=> 'pages/Table_Order',
									'konsumen'	=> $this->Konsumen_model->dataKonsumen()->result(),
									'produk'	=> $this->Produk_model->Produk()->result(),
									'detail'	=> $this->Konsumen_model->detailOrder($id)->result(),
								);
				$this->load->view('layout/Wrapper',$content);
			}

			function Show($id){
				$data	= $this->Konsumen_model->detailOrder($id);
				echo json_encode($data);
			}

			function DataKonsumen($id){
				$where	= array('id'	=> $id);
				$data	= $this->Konsumen_model->Konsumen($where);
				echo json_encode($data);
			}

			function Profile($id){
				$content	= array('title'		=> 'Profile',
									'content'	=> 'pages/Profile',
									'profile'	=> $this->Profile_model->Profile($id)->result(),

									);
				$this->load->view('layout/Wrapper',$content);
			}
		}	
 ?>