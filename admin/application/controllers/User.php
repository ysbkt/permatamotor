<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

	/**
	* 
	*/
	class User extends CI_controller
	{
		
		function __Construct()
		{
			parent::__construct();
			$this->load->model('Auth_model');
		}

		public function Index(){
			$content	= array('title'		=> 'Tambah Akun',
								'content'	=> 'pages/Tambah_user',

								);
			$this->load->view('layout/Wrapper',$content);
		}

		function Register(){
			$nama		= $this->input->post('nama');
			$email		= $this->input->post('email');
			$username	= $this->input->post('username');
			$level		= $this->input->post('level');
			$password	= $this->input->post('password');
			$hash		= md5($password);

			$this->input->post('nama','required');
			$this->input->post('email','required');
			$this->input->post('username','required');
			$this->input->post('level','required');
			$this->input->post('password','required|min_length[6]');
			$this->input->post('confirm','required|matches[password]');
			if ($this->input->post() == FALSE)
			{
				$this->load->view('User');
			}
		else
		{
			$nama		= $_POST['nama'];
			$email		= $_POST['email'];
			$username	= $_POST['username'];
			$level		= $_POST['level'];
			$password	= $_POST['password'];
			$hash		= hash('md5',$password);

			$data		= array('nama'		=> $nama,
								'email'		=> $email,
								'username'	=> $username,
								'level'		=> $level,
								'password'	=> $hash,
								'status'	=> '0'
								);
			$usercheck	= $this->Auth_model->Check($email);
			if (!empty($usercheck)) {
				$this->session->set_flashdata('user', '<div class="alert-danger text-center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Email sudah digunakan. Silahkan gunakan yang lain.</div>');
				redirect(base_url('User'));
			}else{
				if ($this->Auth_model->Register($data,'user')){
					$this->session->set_flashdata('user', '<div class="alert-danger text-center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Akun Berhasil ditambahkan.</div>');
				redirect(base_url('User'));
				}
			}
		}
	}

		function Activate($id){
			$data	= array('status'	=> 1);
			$where	= array('id'		=> $id);

			$this->Auth_model->Activate($data, $where);
			$this->session->set_flashdata('user', '<div class="alert-success text-center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Akun Berhasil diaktifkan.</div>');
			redirect('User/ManageUser');
		}

		function Deactivate($id){
			$data	= array('status'	=> 0);
			$where	= array('id'		=> $id);

			$this->Auth_model->Activate($data, $where);
			$this->session->set_flashdata('user', '<div class="alert-success text-center">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Akun Berhasil di non-aktifkan.</div>');
			redirect('User/ManageUser');
		}


		function ManageUser(){
			$content	= array('title'		=> 'Manage Akun',
								'content'	=> 'pages/Manage_user',
								'user'		=> $this->Auth_model->User()->result(),

								);
			$this->load->view('layout/Wrapper',$content);
		}

}

 ?>