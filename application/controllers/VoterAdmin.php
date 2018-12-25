<?php
class VoterAdmin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin_voter_m');
	}
	function index(){
		//pemblokiran
	    if (isset($_SESSION['user_logged'])) {
	         
		$this->load->view('layout/header');
		$this->load->view('voter/admin_voter');
		$this->load->view('layout/footer');
		
		//penutup pemblokiran
		}else{
	        	$this->load->view('welcome_message'); 
	    }
	}

	function voter_data(){
		$data=$this->admin_voter_m->voter_list();
		echo json_encode($data);
	}

	function save(){
		$data=$this->admin_voter_m->save_voter();
		echo json_encode($data);
	}

	function update(){
		$data=$this->admin_voter_m->update_voter();
		echo json_encode($data);
	}

	function delete(){
		$data=$this->admin_voter_m->delete_voter();
		echo json_encode($data);
	}

}