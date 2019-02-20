<?php
/**
 * Created by PhpStorm.
 * User: Cyber2-PPLN Taipei
 * Date: 5/22/2018
 * Time: 2:41 PM
 */

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['user_logged'])) {
            $this->session->set_flashdata("error", "Harap login terlebih dahulu.");
            redirect(base_url()."auth/login", "refresh");
        }
    }

    public function profile() {
		
        if (isset($_SESSION['user_logged'])) {
			$this->load->model("Stats_m");
			$result['data']=$this->Stats_m->data_part_timer();
			$result['a3']=$this->Stats_m->data_a3();
			$result['perkotadanmetode']=$this->Stats_m->data_permetodedankota();
            $this->load->view('admin/profile',$result);
        } else {
            $this->load->view('admin/login');
        }
    }

}