<?php

class Users_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    // register input data
    public function registerUser($data)
    {
        $register = $this->db->insert('users', $data);
        if ($register) {
            return true;
        } else {
            return false;
        }
    }

    // look for existing email
    public function findUserByEmail($email)
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("email", $email);
        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return true;
        } else {
            return false;
        }
    }
    // login check
    public function login($email, $password)
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where("email", $email);
        $query = $this->db->get();
        $row = $query->row_array();
        $hashpass = $row['password'];
        // echo '<prev>';
        // print_r($hashpass);
        // echo '</prev>';
        if (password_verify($password, $hashpass)) {
            return $row;
        } else {
            return false;
        }
    }
}
