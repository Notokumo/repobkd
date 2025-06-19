<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ganti_password extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dosenauth_model');
        $this->check_dosen();
    }

    // Menampilkan semua data BKD
    public function index() {
        $data['v'] = 'dosen/ubah_password';
        $this->load->view('layout/view', $data);
    }

    public function update() {
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|trim|min_length[8]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $data['v'] = 'dosen/ubah_password';
            $this->load->view('layout/view', $data);
        } else {
            $user_id = $this->session->userdata('user_id'); // Assuming user_id is stored in session
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password');

            if ($this->Dosenauth_model->verify_password($user_id, $current_password)) {
                if ($this->Dosenauth_model->update_password($user_id, $new_password)) {
                    $this->session->set_flashdata('success', 'Password changed successfully.');
                } else {
                    $this->session->set_flashdata('error', 'Failed to update password.');
                }
            } else {
                $this->session->set_flashdata('error', 'Current password is incorrect.');
            }
            redirect('dosen/ganti_password/');
        }
    }

}
