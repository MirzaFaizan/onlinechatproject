<?php
class Project_Controller extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('Project_Model');
		$this->load->model('Messages_Model');

	}


	//====================================================================================================================



	function index(){
		$this->load->view('Order_Form');
	}


	//====================================================================================================================


	function order_project($type){



		//creating conversation between web developers and client
		if($type=='web_project'){
		if($this->Messages_Model->check_conversation('web_developer@gmail.com',$this->session->userdata('email'))==false){

		$data=array(
				'developer_email'=>'web_developer@gmail.com',
				'client_email'=>$this->session->userdata('email')
				);

		$this->Messages_Model->new_conversation($data);
		}

		$this->load->view('profile');

		}


		//creating conversation between mobile App developers and client
		elseif ($type=='mobile_project') {
		if($this->Messages_Model->check_conversation('mobile_developer@gmail.com',$this->session->userdata('email'))==false){

		$data=array(
				'developer_email'=>'mobile_developer@gmail.com',
				'client_email'=>$this->session->userdata('email')
				);
		$this->Messages_Model->new_conversation($data);

		}
		$this->load->view('profile');

		}


		//creating conversation between desktop developers and client
		elseif ($type=='desktop_project') {

		if($this->Messages_Model->check_conversation('desktop_developer@gmail.com',$this->session->userdata('email'))==false){

		$data=array(
				'developer_email'=>'desktop_developer@gmail.com',
				'client_email'=>$this->session->userdata('email')
				);
		 $this->Messages_Model->new_conversation($data);

		}

		$this->load->view('profile');

		}



		//creating conversation between graphic designer and client
		elseif ($type=='graphic_project') {
		if($this->Messages_Model->check_conversation('graphic_designer@gmail.com',$this->session->userdata('email'))==false){

		$data=array(
				'developer_email'=>'graphic_designer@gmail.com',
				'client_email'=>$this->session->userdata('email')
				);
		 $this->Messages_Model->new_conversation($data);

		}

		$this->load->view('profile');

		}



		else{


		}
	}
	//====================================================================================================================



	function new_project(){
		$this->load->view('developer/project_form');
	}

	//=======================================================================
	function insert_new_project(){
		if($_POST){

			$data=array(
				'project_name'=>$this->input->post('project_name'),
				'developer_email'=>$this->session->userdata('email'),
				'client_email'=>$this->input->post('client_email'),
				'project_budget'=>$this->input->post('project_budget'),
				'project_deadline'=>$this->input->post('project_deadline')
				);
			$this->Project_Model->new_project($data);
		}
		$this->load->view('profile');
	}
	function recent_projects_admin(){
		$data['project']=$this->Project_Model->recent_projects_admin();
		if($data){
			$this->load->view('Recent_Projects', $data);
		}
		else{
			echo "Server Is Not Responding";
		}
		}

	function recent_projects_developer_client(){

		if($this->session->userdata('role')=='client'){
			$data['project']=$this->Project_Model->recent_projects_client($this->session->userdata('email'));
		}
		else{
			$data['project']=$this->Project_Model->recent_projects_developer($this->session->userdata('email'));
		}
		if($data){
			$this->load->view('Recent_Projects', $data);
		}
		else{
			echo "Server Is Not Responding";
		}
	}

	function update_project(){
		
		if($this->input->post('action')=='cancelled'){
			$data=array(
				'project_completion_report'=>'cancelled'
				);
			$project_id=$this->input->post('id');
			$this->Project_Model->update_project($data,$project_id);
		}
		else
		{
			$data=array(
				'project_completion_report'=>'completed'
				);
			$project_id=$this->input->post('id');
			$this->Project_Model->update_project($data,$project_id);
		}
		$this->recent_projects_developer_client();
			}
}


?>
