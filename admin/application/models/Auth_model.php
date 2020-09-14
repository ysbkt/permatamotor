<?php if (! defined('BASEPATH')) exit ('No direct script access allowed');

/**
* 
*/
class Auth_model extends CI_Model{ 
  function Login($email,$pass){    
  {
    $sql = "SELECT * FROM user where email = ? and password = ?";
    $data = $this->db->query($sql, array($email,$pass));
        return ($data->result_array()) ;
  }

  }

  function User(){
  	$this->db->select('*');
  	$this->db->from('user');
  	return $this->db->get();
  }

  function Register($data, $table){
  	$this->db->insert('user',$data);
  }

  function Check($email){
  	$sql	= "SELECT * FROM user where email = ?";
  	$data	= $this->db->query($sql, array($email));
  	return ($data->result_array());
  }

  function Activate($where, $data){
  	return $this->db->update('user',$where, $data);
  }

}

 ?>