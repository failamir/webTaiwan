<?php
class Admin_voter_m extends CI_Model{

	function voter_list(){
		$this->db->select('*');
        $this->db->from('voters');
		$this->db->like('is_verified', '1'); 
		$this->db->like('kpps_type', 'POS'); 
        $this->db->limit(10, 0);
        $this->db->order_by('uuid', 'DESC');
		$hasil=$this->db->get();
		return $hasil->result();
	}

	function save_voter(){
		$data = array(
				'uuid' 	=> $this->input->post('voter_uuid'), 
				'fullname' 	=> $this->input->post('voter_fullname'), 
				'address' => $this->input->post('address'), 
			);
		$result=$this->db->insert('voters',$data);
		return $result;
	}

	function update_voter(){
		$voter_uuid=$this->input->post('voter_uuid');
		$voter_fullname=$this->input->post('voter_fullname');
		$voter_address=$this->input->post('address');
		$voter_nik=$this->input->post('nik');
		$voter_passport_no=$this->input->post('passport_no');
		$voter_kode_pos=$this->input->post('kode_pos');

		$this->db->set('fullname', $voter_fullname);
		$this->db->set('address', $voter_address);
		$this->db->set('nik', $voter_nik);
		$this->db->set('passport_no', $voter_passport_no);
		$this->db->set('kode_pos', $voter_kode_pos);
		$this->db->set('is_verified', '2');
		$this->db->where('uuid', $voter_uuid);
		$result=$this->db->update('voters');
		return $result;
	}

	function delete_voter(){
		$voter_uuid=$this->input->post('voter_uuid');
		//$this->db->where('uuid', $voter_uuid);
		//$result=$this->db->delete('voters');
		//return $result;
		
		$this->db->where('uuid',$voter_uuid);
        $data = array('is_verified' => 0,'status_pemilih' => 'DATAGANDATV');    
        $result=$this->db->update('voters', $data); 
        return $result;
	}
	
}