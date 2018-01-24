<?php
	class Messages_Model extends CI_Model
	{
		function __construct(){
			parent::__construct();
		}

		//-------------------------------------------------------------------------------------------------------
		function  get_conversation($email){
		$this->db->select();
		$this->db->from('conversation');
		$this->db->where('client_email',$email);
		$data=$this->db->get();
		return $data->result_array();
	}


		function new_conversation($data){
			 $this->db->insert('conversation',$data);
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



		//===================================================================================

			function send_message_model($data){
				$this->db->insert('sms',$data);
		}


		//====================================================================================

		function  get_conversation_model($email){
			$this->db->select();
			$this->db->from('conversation');
			$this->db->or_where('developer_email',$email);
			$this->db->or_where('client_email',$email);
			$data=$this->db->get();
			return $data->result_array();
		}
		//====================================================================================
	}

?>