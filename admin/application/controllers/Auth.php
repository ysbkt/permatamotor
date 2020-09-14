<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    function __construct(){
    	parent::__construct();
		$this->load->model('Auth_model');
	}

	function Index(){
		$content = array ('title' 	=> 'Admin Permata Motor');
		$this->load->view('pages/Login',$content);
	}

	function Login(){
        $email  = $this->input->post('email');
        $pass   = md5($this->input->post('password'));
        {
        $res = $this->Auth_model->Login($email,$pass);
        if(!empty($res))
        {
            if($res[0]['status'] == '1')
            {
                $email  = $res[0]['nama'];
                $level  = $res[0]['level'];
                // $this->setSession($res[0]['user_name'],$res[0]['user_email'],$res[0]['user_status']);  
        		// $this->rat->log('Login');
                $data_session = array(
                    'email'         => $email,
                    'status_login'  => "login",
                    'level'         => $level
                );              
                $this->session->set_userdata($data_session);
        		redirect(base_url().'Home', $data);
            }
            else
            {
          		$this->session->set_flashdata('message','<div class="alert alert-danger text-center">Akun anda tidak aktif.</div>');
        		redirect(base_url().'Auth');
            }
        }
        else
        {
            $this->session->set_flashdata('message','<div class="alert alert-danger text-center">Email atau Password salah !!</div>');
        	redirect(base_url().'Auth');
        }
    }
       
    }

    function Logout(){
    // $this->rat->log('Log Out');
    $this->session->sess_destroy();
    redirect(base_url().'Auth', 'refresh');
}

}
