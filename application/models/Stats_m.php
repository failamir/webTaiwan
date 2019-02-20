<?php
class Stats_m extends CI_Model{

	function data_part_timer(){
		$hasil=$this->db->query("SELECT `validator`, COUNT(`kpps_type`) as jumlah FROM `voters` GROUP by validator");
		return $hasil->result();
	}
	
	function data_a3(){
		$hasil=$this->db->query("SELECT `kpps_type`, COUNT(`kpps_type`) as jumlah FROM `voters` GROUP by kpps_type");
		return $hasil->result();
	}
	
	
	function data_permetodedankota(){
		$hasil=$this->db->query("SELECT city , COUNT(`kpps_type`) as jumlah FROM `voters` GROUP by city");
		return $hasil->result();
	}
	


}
 