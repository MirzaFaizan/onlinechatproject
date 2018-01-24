<?php
/**
* 
*/
class Project_Model extends CI_Model
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}
	function new_project($data){

		$this->db->insert('project', $data);
		
	}
	function recent_projects_admin(){
		$this->db->select();
		$this->db->from('project');
		$data=$this->db->get();
		return $data->result_array();
	}
	function recent_projects_developer($email){
		$this->db->select();
		$this->db->from('project');
		$this->db->where('developer_email',$email);
		$data=$this->db->get();
		return $data->result_array();
	}
	
	function recent_projects_client($email){
		$this->db->select();
		$this->db->from('project');
		$this->db->where('client_email',$email);
		$data=$this->db->get();
		return $data->result_array();
	}

	function update_project($data,$project_id){
		$this->db->where('project_id',$project_id);
		$this->db->update('project',$data);
	}
	
		
}


?>