<?php
/**
 * Created by PhpStorm.
 * User: Cyber2-PPLN Taipei
 * Date: 5/22/2018
 * Time: 10:32 AM
 */

class Auth_m extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public $username;
    public $password;
    public $email;
    public $gender;
    public $date_created;
    public $phone;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
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
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function login($username,$password) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('username' => $username, 'password' => $password));
        $query = $this->db->get();

        $user = $query->row();
        return $user;

    }

    public function insert($data) {
        $success = $this->db->insert('users', $data);
        if ($success) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }

}