<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function check_dosen() {
        // Check if the session 'role' matches the expected role
        if ($this->session->userdata('role') !== 'dosen') {
            // Redirect to the login page if the role does not match
            redirect('dosen/login');
        }
    }

    public function check_admin() {
        // Check if the session 'role' matches the expected role
        if ($this->session->userdata('role') !== 'admin') {
            // Redirect to the login page if the role does not match
            redirect('adminnya/login');
        }
    }

    // Add common methods or properties for dosen controllers here
}
