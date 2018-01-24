<?php 
/**
 * 
 */
 class Admin_Model extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}

 	function check_credentials_admin($email,$password){
 		$this->db->select();
 		$this->db->from('admin');
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
 	//-------------------------------------------------------------------------------------------------------
		function  get_conversation(){
		$this->db->select();
		$this->db->from('conversation');
		$data=$this->db->get();
		return $data->result_array();
	}

		//===============================================================================


		//function to retrive all the messages by specifying conversation id from db
		function get_messages($conversation_id){
			$this->db->select();
			$this->db->from('sms');
			$this->db->where('conversation_id',$conversation_id);
			$query=$this->db->get();
			return $query->result_array();
		}

		//==================================================================================
		
		function get_conversation_atomic($conversation_id){
			$this->db->select();
			$this->db->from('conversation');
			$this->db->where('conversation_id',$conversation_id);
			$query=$this->db->get();
			return $query->result_array();
		}

		//==================================================================================


		function check_conversation($developer,$client){
			$this->db->select();
			$this->db->from('conversation');
			$this->db->where('developer_email',$developer);
			$this->db->where('client_email',$client);
			$query=$this->db->get();
			if($query->num_rows()==1){
				return true;
			}
			else{
				return false;
			}
		}


		//====================================================================================

		function  get_conversation_model(){
			$this->db->select();
			$this->db->from('conversation');
			$data=$this->db->get();
			return $data->result_array();
		}
		//====================================================================================





 } ?>