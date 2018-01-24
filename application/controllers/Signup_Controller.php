<?php
class Signup_Controller extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Signup_Model');
	}
	function index(){

		if($_POST){
			$data=array(
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email'),
				'dob'=>$this->input->post('dob'),
				'country'=>$this->input->post('country'),
				'password'=>$this->input->post('password')
				);
			 $res=$this->Signup_Model->insertInfo($data);
			 if($res){
			 	echo '<script>alert("Account created successfully")</script>';
			 	$this->load->view('Login_Form');
			 }
			 else{
			 	echo '<script>alert("Sorry!could not create account.Try again")</script>';
			 	$this->load->view('signup_form');
			 }
			 
		}
		else{
		$this->load->view('signup_form');
			}
	}
}

?>