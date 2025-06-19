<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminauth_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($username, $inputPassword) {
        // Retrieve the user from the database
        $this->db->where('username', $username);
        $query = $this->db->get('ADMIN');
    
        if ($query->num_rows() == 1) {
            $user = $query->row();
            $hashedPassword = $user->password;
    
            // Verify the password
            if (password_verify($inputPassword, $hashedPassword)) {
                return $user; // Return user data if password is valid
            } else {
                return false; // Invalid password
            }
        } else {
            return false; // Username not found
        }
    }

    public function verify_password($user_id, $password) {
        $this->db->select('password');
        $this->db->where('id', $user_id);
        $query = $this->db->get('ADMIN');

        if ($query->num_rows() == 1) {
            $hashed_password = $query->row()->password;
            return password_verify($password, $hashed_password);
        }
        return false;
    }

    public function update_password($user_id, $new_password) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $this->db->set('password', $hashed_password);
        $this->db->where('id', $user_id);
        return $this->db->update('ADMIN');
    }
}
