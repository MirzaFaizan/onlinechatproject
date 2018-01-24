<?php
class Signup_Model extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	function insertInfo($data){
		$res=$this->db->insert('clients',$data);
		return $res;
	}
}
?>