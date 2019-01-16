<?php
class Subs_m extends CI_Model{
 
    function subscriber_list(){
        $hasil=$this->db->get('pplnsubscribe');
        return $hasil->result();
    }
 
    function save_subscriber(){
        $data = array(
                'subsid'  => $this->input->post('subscriber_code'), 
                'subsname'  => $this->input->post('subscriber_name'), 
                'subscontact' => $this->input->post('subscriber_contact'), 
            );
        $result=$this->db->insert('pplnsubscribe',$data);
        return $result;
    }
 
    function update_subscriber(){
        $subscriber_code=$this->input->post('subscriber_code');
        $subscriber_name=$this->input->post('subscriber_name');
        $subscriber_contact=$this->input->post('subscriber_contact');
 
        $this->db->set('subsname', $subscriber_name);
        $this->db->set('subscontact', $subscriber_contact);
        $this->db->where('subsid', $subscriber_code);
        $result=$this->db->update('pplnsubscribe');
        return $result;
    }
 
    function delete_subscriber(){
        $subscriber_code=$this->input->post('subscriber_code');
        $this->db->where('subsid', $subscriber_code);
        $result=$this->db->delete('pplnsubscribe');
        return $result;
    }
     
}