<?php
class Login_Controller extends CI_Controller
	{

		function __construct(){
			parent::__construct();
			$this->load->helper('form');
			$this->load->model('Login_Model');
			$this->load->model('Messages_Model');
		}

		
		function index(){

			if($_POST){
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$role=$this->input->post('role');
				if($role=='client'){

						$result = $this->Login_Model->check_credentials_client($email,$password,$role);

				}
				else{

						$result = $this->Login_Model->check_credentials_developer($email,$password,$role);

				}

				if($result){

				$data=array(
						'name'=>$result[0]['name'],
						'email'=>$result[0]['email'],
						'role'=>$result[0]['role']
						);

				$this->session->set_userdata($data);

				$content['conversation']=$this->Messages_Model->get_conversation($this->session->userdata('email'));

				//echo print_r($content);

				$this->load->view('profile',$content);		}
				else{

				$this->load->view('Login_Form',$message = array('error' => 'sorry login credendentials are not matching'));
			}
			}
			else{

				$this->load->view('Login_Form');
		} 

}

		function login(){
			if($_POST){
				$email=$this->input->post('email');
				$password=$this->input->post('password');
				$role=$this->input->post('role');
				if($role=='client'){

						$result = $this->Login_Model->check_credentials_client($email,$password,$role);

				}
				else{

						$result = $this->Login_Model->check_credentials_developer($email,$password,$role);

				}

				if($result){

				$data=array(
						'name'=>$result[0]['name'],
						'email'=>$result[0]['email'],
						'role'=>$result[0]['role']
						);

				$this->session->set_userdata($data);

				$content['conversation']=$this->Messages_Model->get_conversation($this->session->userdata('email'));

				//echo print_r($content);

				$this->load->view('profile',$content);		}
				else{

				$this->load->view('Login_Form',$message = array('error' => 'sorry login credendentials are not matching'));
			}
			}
			else{

				$this->load->view('Login_Form');
		}
		}


		function logout(){
		$this->session->sess_destroy();
		echo redirect('Welcome/index','refresh');
	}

	}

	/*
		$this->load->library('email');	
		$config = array(
    	'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
    	'smtp_host' => 'your_host',
    	'smtp_port' => your_port,
    	'smtp_user' => 'reachdeveloper110@gmail.com',
    	'smtp_pass' => 'reachdeveloper123',
    	'smtp_crypto' => 'security', //can be 'ssl' or 'tls' for example
    	'mailtype' => 'html', //plaintext 'text' mails or 'html'
    	'smtp_timeout' => '4', //in seconds
    	'charset' => 'iso-8859-1',
    	'wordwrap' => TRUE
		);
		$this->email->initialize($config);
		$this->email->from('localserver@gmail.com','Mazahir Hussain');
		$this->email->to('mazahir1109@gmail.com');
		$this->email->subject('This is check email');
		$this->email->message('Hi Mazahir How are you???????');
		if($this->email->send()){
			echo "Email has been sent";
		}
		else{
			echo $this->email_debugger();
		}
*/
