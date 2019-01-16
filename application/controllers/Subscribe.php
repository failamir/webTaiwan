<?php
class Subscribe extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('subs_m');
    }
    function index(){
		//pemblokiran
	    if (isset($_SESSION['user_logged'])) {
			
			$this->load->view('layout/header');
			$this->load->view('subscribe/subscribe_v');
			$this->load->view('layout/footer');
			//penutup pemblokiran
		}else{
	        	$this->load->view('welcome_message'); 
	    }
    }
 
    function subscriber_data(){
        $data=$this->subs_m->subscriber_list();
        echo json_encode($data);
    }
 
    function save(){
        $data=$this->subs_m->save_subscriber();
        echo json_encode($data);
    }
 
    function update(){
        $data=$this->subs_m->update_subscriber();
        echo json_encode($data);
    }
 
    function delete(){
        $data=$this->subs_m->delete_subscriber();
        echo json_encode($data);
    }
 
}