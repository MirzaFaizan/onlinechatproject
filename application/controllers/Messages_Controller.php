<?php

	class Messages_Controller extends CI_Controller
	{
		function __construct(){
			parent::__construct();
			$this->load->model('Messages_Model');
		}

		//======================================================================================================


		function index(){
			if($_POST){
				$conversation_id=$this->input->post('conversation_id');
				$data['results']=$this->Messages_Model->get_messages($conversation_id);
		}
			$this->load->view('Messages_Snippet',$data);
		}
		//========================================================================================================



		function get_conversation_controller(){
			$data['conversation']=$this->Messages_Model->get_conversation_model($this->session->userdata('email'));
			$this->load->view('Messages_Form',$data);

		}
		//========================================================================================================



		function messages($conversation_id,$receiver){
			$data = array('conversation_id' => $conversation_id ,
			'receiver'=>$receiver );
			$this->load->view('Messages_Form',$data);
		}

	
		//=========================================================================================================


		
		function send_message(){
			if($_POST){
				$conversation_id=$this->input->post('con');
				$sender=$this->session->userdata('email');
				$message=$this->input->post('msg');
				$con_detail=$this->Messages_Model->get_conversation_atomic($conversation_id);
				if($this->session->userdata('email')==$con_detail[0]['developer_email']){
					$receiver=$con_detail[0]['client_email'];
				}
				else{
					$receiver=$con_detail[0]['developer_email'];
				}
				$data=array(
					'sender'=>$sender,
					'receiver'=>$receiver,
					'message'=>$message,
					'conversation_id'=>$conversation_id
					);
				$this->Messages_Model->send_message_model($data);

				}
			}
		
			//=========================================================================================================

	}


?>