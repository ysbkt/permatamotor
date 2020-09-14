<?php
defined('BASEPATH') OR exit ('No direct script access allowed'); 

class Profile_model extends CI_model{

	function Profile(){
		$this->db->from('user');
		// $this->db->where('id',$id);
		return $this->db->get();
	}

}

 ?>