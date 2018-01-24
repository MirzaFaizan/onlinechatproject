<?php 
class Admin_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Admin_Model');
	}

	//===============================================================================
	function login(){
		if($_POST){
			$username=$this->input->post('email');
			$password=$this->input->post('password');
			$result=$this->Admin_Model->check_credentials_admin($username,$password);

			if($result){

					$data=array(
							'name'=>$result[0]['name'],
							'email'=>$result[0]['email'],
							'role'=>$result[0]['role']
							);

					$this->session->set_userdata($data);

					$content['conversation']=$this->Admin_Model->get_conversation();

					//echo print_r($content);

					$this->load->view('Admin_Profile',$content);}
					else{

					$this->load->view('Admin_Login',$message = array('error' => 'sorry login credendentials are not matching'));
				}

			}
			else{

					$this->load->view('Admin_Login');
			} 



	}
	//===============================================================================
	function get_messages(){
			if($_POST){
				$conversation_id=$this->input->post('conversation_id');
				$data['results']=$this->Admin_Model->get_messages($conversation_id);
		}
			$this->load->view('Messages_Snippet',$data);
			//$this->load->view('Messages_Form');
		}
		//===========================================================================



		function get_conversation_controller(){
			$data['conversation']=$this->Admin_Model->get_conversation_model();
			$this->load->view('Messages_Form',$data);

		}
		//===========================================================================



		function messages($conversation_id,$receiver){
			$data = array('conversation_id' => $conversation_id ,
			'receiver'=>$receiver );
			$this->load->view('Messages_Form',$data);
		}

	
		//===========================================================================




}



 ?>