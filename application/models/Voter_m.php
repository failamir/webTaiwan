<?php
/**
 * Created by PhpStorm.
 * User: Cyber2-PPLN Taipei
 * Date: 5/23/2018
 * Time: 2:58 PM
 */

class Voter_m extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public $nik;
    public $passport_no;
    public $photo;
    public $fullname;
    public $birthdate;
    public $birthplace;
    public $phone_number;
    public $line_id;
    public $email;
    public $gender;
    public $marital_status;
    public $city;
    public $address;
    public $disability_type;
    public $kpps_type;
    public $is_verified;
    public $date_created;
    public $date_modified;

    /**
     * @return mixed
     */
    public function getNik()
    {
        return $this->nik;
    }

    /**
     * @param mixed $nik
     */
    public function setNik($nik)
    {
        $this->nik = $nik;
    }

    /**
     * @return mixed
     */
    public function getPassportNo()
    {
        return $this->passport_no;
    }

    /**
     * @param mixed $passport_no
     */
    public function setPassportNo($passport_no)
    {
        $this->passport_no = $passport_no;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @param mixed $fullname
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * @return mixed
     */
    public function getBirthplace()
    {
        return $this->birthplace;
    }

    /**
     * @param mixed $birthplace
     */
    public function setBirthplace($birthplace)
    {
        $this->birthplace = $birthplace;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return mixed
     */
    public function getLineId()
    {
        return $this->line_id;
    }

    /**
     * @param mixed $line_id
     */
    public function setLineId($line_id)
    {
        $this->line_id = $line_id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getMaritalStatus()
    {
        return $this->marital_status;
    }

    /**
     * @param mixed $marital_status
     */
    public function setMaritalStatus($marital_status)
    {
        $this->marital_status = $marital_status;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getDisabilityType()
    {
        return $this->disability_type;
    }

    /**
     * @param mixed $disability_type
     */
    public function setDisabilityType($disability_type)
    {
        $this->disability_type = $disability_type;
    }

    /**
     * @return mixed
     */
    public function getKppsType()
    {
        return $this->kpps_type;
    }

    /**
     * @param mixed $kpps_type
     */
    public function setKppsType($kpps_type)
    {
        $this->kpps_type = $kpps_type;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @param mixed $date_created
     */
    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
    }
    /**
     * @return mixed
     */
    public function getisVerified()
    {
        return $this->is_verified;
    }/**
     * @param mixed $is_verified
     */
    public function setIsVerified($is_verified)
    {
        $this->is_verified = $is_verified;
    }/**
     * @return mixed
     */
    public function getDateModified()
    {
        return $this->date_modified;
    }/**
     * @param mixed $date_modified
     */
    public function setDateModified($date_modified)
    {
        $this->date_modified = $date_modified;
    }

    public function exist($uuid) {
        $this->db->select('*');
        $this->db->from('voters');
        $this->db->where(array('uuid' => $uuid));
        $query = $this->db->get();

        $user = $query->row();
        return $user;

    }
	
  public function existpassport($passport_no) {
        $this->db->select('*');
        $this->db->from('voters');
        $this->db->where(array('passport_no' => $passport_no));
        $query = $this->db->get();

        $user = $query->row();
        return $user;

    }

    public function insert($data) {
        $success = $this->db->insert('voters', $data);
        if ($success) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

	public function update($data) {
		$this->db->where('uuid', $data['uuid']);
		$this->db->update('voters', $data);
		$updated_status = $this->db->affected_rows();

		if($updated_status):
			return $data['uuid'];
		else:
			return false;
		endif;
	}

    public  function getAllData($limit, $page, $name, $passport_no, $birthdate, $birthplace ) {
        $this->db->select('*');
        $this->db->from('voters');
        $this->db->limit($limit, $page);
        $this->db->like(array('fullname' => $name,'passport_no' => $passport_no, 'birthdate' => $birthdate, 'birthplace' => $birthplace));
        $this->db->order_by('fullname', 'ASC');
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $query->result();
        }
        return FALSE;
    }

    public function record_count($name, $passport_no, $birthdate, $birthplace ) {
        $this->db->select('*');
        $this->db->from('voters');
       $this->db->like(array('fullname' => $name,'passport_no' => $passport_no, 'birthdate' => $birthdate, 'birthplace' => $birthplace));
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function delete($uuid){
        // $this->db->where('uuid',$uuid);
        // $this->db->delete('voters');
        //     if($this->db->affected_rows() >0){
        //     return true;
        // }else{
        //     return false;
        // }
        $this->db->where('uuid',$uuid);
        $data = array('is_verified' => 0,'status_pemilih' => 'DATAGANDA');    
        $this->db->update('voters', $data); 
            if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
    
    }

    public function verifyVoter($uuid){
        $this->db->where('uuid',$uuid);
        $data = array('is_verified' => 2,'status_pemilih' => 'DPTHPLN');    
        $this->db->update('voters', $data); 
            if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
    
    }
    
      public function pulangKeIndo($uuid){
        $this->db->where('uuid',$uuid);
        $data = array('is_verified' => 0,'status_pemilih' => 'PINDAHDN');    
        $this->db->update('voters', $data); 
            if($this->db->affected_rows() >0){
            return true;
        }else{
            return false;
        }
    
    }

     public  function getAllReferral() {
         $query = $this->db->query("SELECT editor_phone, count(*) as jumlah FROM voters WHERE editor_phone is not null GROUP BY editor_phone");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $query->result();
        }
        return FALSE;
    }
    
     //ambil data pemilih dari database
    public function getPemilihVerifikasi($limit, $start){
        $this->db->select('*');
        $this->db->from('voters');
        $this->db->limit($limit, $start);
        //$this->db->where('photo', 1);
        $this->db->like('is_verified', '1'); 
        $query = $this->db->get();
     
        return $query;
    }
    
    //autocomplete things
	function search_name($title){
        $this->db->like('fullname', $title , 'both');
        $this->db->order_by('fullname', 'ASC');
        $this->db->limit(10);
        return $this->db->get('voters')->result();
    }
}
