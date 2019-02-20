<?php
class UnverifiedAdmin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('admin_unverified_m');
	}
	function index(){
		//pemblokiran
	    if (isset($_SESSION['user_logged']) && ($_SESSION['privilege']==9)) {
	         
		$this->load->view('layout/header');
		$this->load->view('voter/admin_unverified');
		$this->load->view('layout/footer');
		
		//penutup pemblokiran
		}else{
	        	$this->load->view('welcome_message'); 
	    }
	}

	function voter_data(){
		$data=$this->admin_unverified_m->voter_list();
		echo json_encode($data);
	}

	function save(){
		$data=$this->admin_unverified_m->save_voter();
		echo json_encode($data);
	}

	function update(){
		$data=$this->admin_unverified_m->update_voter();
		echo json_encode($data);
	}

	function delete(){
		$data=$this->admin_unverified_m->delete_voter();
		echo json_encode($data);
	}
	
	function menyerah(){
		$data=$this->admin_unverified_m->menyerah_voter();
		echo json_encode($data);
	}

}