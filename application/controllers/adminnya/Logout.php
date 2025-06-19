<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        // Unset all session data
        $this->session->sess_destroy();

        // Redirect to the login page
        redirect('adminnya/login'); // Assuming your login page is at 'login'
    }

}
