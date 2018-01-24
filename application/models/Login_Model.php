<?php
class Login_Model extends CI_Model
{

	function __construct(){

		parent::__construct();

	}
	//function to check the existence of  client in database
	function check_credentials_client($email,$password){

		$this->db->select();

		$this->db->from('clients');

		$this->db->where('email',$email);

		$this->db->where('password',$password);

		$query=$this->db->get();

		if($query->num_rows()==1){

			return $query->result_array();
		}
		else{

			return false;
		}
	}


	//function to check the existence of  developer/admin in database
	function check_credentials_developer($email,$password){

		$this->db->select();

		$this->db->from('admin_developers');

		$this->db->where('email',$email);

		$this->db->where('password',$password);

		$query=$this->db->get();

		if($query->num_rows()==1){

			return $query->result_array();
		}
		else{

			return false;
		}
	}
}

?>