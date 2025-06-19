<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Adminauth_model');

        if ($this->session->userdata('role') == 'admin') {
            // Redirect to the login page if the role does not match
            redirect('adminnya/dashboard');
        }
    }

    // Menampilkan semua data BKD
    public function index() {
        $this->load->view('admin/login');
    }

    public function login_process() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->Adminauth_model->login($username, $password);

        if ($user) {
            // Login successful
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('username', $user->username);
            $this->session->set_userdata('nama', $user->nama);
            $this->session->set_userdata('role', 'admin');
            redirect('adminnya/dashboard');
        } else {
            // Login failed
            $this->session->set_flashdata('error', 'Invalid username or password.');
            redirect('adminnya/login');
        }
    }
}
