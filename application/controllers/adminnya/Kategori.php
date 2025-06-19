<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_model');
        $this->check_admin();
    }

    public function index() {
        $data['kategoris'] = $this->Kategori_model->get_all();
        $data['v'] = 'admin/kategori/index';
        $this->load->view('layout/view', $data);
    }

    public function add() {
        $this->form_validation->set_rules('kategori', 'kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['kategoris'] = $this->Kategori_model->get_all();
            $data['v'] = 'admin/kategori/index';
            $this->load->view('layout/view', $data);
        } else {
            $data = [
                'nama_katbkd' => $this->input->post('kategori')
            ];
            $this->Kategori_model->insert($data);
            $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan.');
            redirect('adminnya/kategori');
        }
    }

    public function edit($id) {
        $data['kategori'] = $this->Kategori_model->get_by_id($id);

        if (!$data['kategori']) {
            show_404();
        }

        $this->form_validation->set_rules('kategori', 'kategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['kategoris'] = $this->Kategori_model->get_all();
            $data['v'] = 'admin/kategori/edit';
            $this->load->view('layout/view', $data);
        } else {
            $data = [
                'nama_katbkd' => $this->input->post('kategori')
            ];
            $this->Kategori_model->update($id, $data);
            $this->session->set_flashdata('success', 'Kategori berhasil diperbarui.');
            redirect('adminnya/kategori');
        }
    }

    public function delete($id) {        
        $data = [
            'status' => 0
        ];
        $this->Kategori_model->update($id, $data);
        $this->session->set_flashdata('success', 'Kategori berhasil dihapus.');

        redirect('adminnya/kategori');
    }
}
