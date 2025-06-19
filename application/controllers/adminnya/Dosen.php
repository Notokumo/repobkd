<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->check_admin();
    }

    public function index() {
        $data['dosens'] = $this->Dosen_model->get_all();
        $data['v'] = 'admin/dosen/index';
        $this->load->view('layout/view', $data);
    }

    public function add() {
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['dosens'] = $this->Dosen_model->get_all();
            $data['v'] = 'admin/dosen/index';
            $this->load->view('layout/view', $data);
        } else {
            $data = [
                'nama_dosen' => $this->input->post('nama'),
                'email' => $this->input->post('email'),   
                'password' => $this->generate_hash($this->input->post('password'))
            ];
            $this->Dosen_model->insert($data);
            $this->session->set_flashdata('success', 'dosen berhasil ditambahkan.');
            redirect('adminnya/dosen');
        }
    }

    public function edit($id) {
        $data['dosen'] = $this->Dosen_model->get_by_id($id);

        if (!$data['dosen']) {
            show_404();
        }

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['dosens'] = $this->Dosen_model->get_all();
            $data['v'] = 'admin/dosen/edit';
            $this->load->view('layout/view', $data);
        } else {
            $data = [
                'nama_dosen' => $this->input->post('nama'),
                'email' => $this->input->post('email'),   
                'password' => $this->generate_hash($this->input->post('password'))
            ];
            $this->Dosen_model->update($id, $data);
            $this->session->set_flashdata('success', 'dosen berhasil diperbarui.');
            redirect('adminnya/dosen');
        }
    }

    public function nonaktif($id) {        
        $data = [
            'status' => 0
        ];
        $this->Dosen_model->update($id, $data);
        $this->session->set_flashdata('success', 'dosen berhasil dinonaktifkan.');

        redirect('adminnya/dosen');
    }

    public function aktif($id) {        
        $data = [
            'status' => 1
        ];
        $this->Dosen_model->update($id, $data);
        $this->session->set_flashdata('success', 'dosen berhasil diaktifkan.');

        redirect('adminnya/dosen');
    }

    public function generate_hash($password){
        // Hash the password using Argon2i
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        return $hashedPassword;
    }
}
