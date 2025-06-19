<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dosenauth_model');

        if ($this->session->userdata('role') == 'dosen') {
            // Redirect to the login page if the role does not match
            redirect('dosen/dashboard');
        }
    }

    // Menampilkan semua data BKD
    public function index() {
        $this->load->view('dosen/login');
    }

    public function login_process() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->Dosenauth_model->login($email, $password);
        if ($user) {
            // Set session data
            $this->session->set_userdata([
                'user_id' => $user->id,
                'nama_dosen' => $user->nama_dosen,
                'email' => $user->email,
                'role' => 'dosen'
            ]);
            redirect('dosen/dashboard'); // Redirect to dashboard or home page
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password');
            redirect('dosen/login');
        }
    }
    
}
