<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkategori extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Subkategori_model');
        $this->check_admin();
    }

    public function index() {
        $data['subkategori'] = $this->Subkategori_model->get_all();
        $data['kategori'] = $this->Subkategori_model->get_kategori();
        $data['v'] = 'admin/subkategori/index';
        $this->load->view('layout/view', $data);
    }

    // Menyimpan subkategori baru
    public function add() {
        $this->form_validation->set_rules('subkategori', 'subkategori', 'required');
        $this->form_validation->set_rules('kategori_id', 'kategori_id', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['subkategori'] = $this->Subkategori_model->get_all();
            $data['kategori'] = $this->Subkategori_model->get_kategori();
            $data['v'] = 'admin/subkategori/index';
            $this->load->view('layout/view', $data);
        } else {
            $data = [
                'nama_subkatbkd' => $this->input->post('subkategori'),
                'kategori_id' => $this->input->post('kategori_id')
            ];
            $this->Subkategori_model->insert($data);
            $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan.');
            redirect('adminnya/subkategori');
        }
    }

    // Menampilkan form untuk mengedit subkategori
    public function edit($id) {
        $data['subkategori'] = $this->Subkategori_model->get_by_id($id);
        $data['kategori'] = $this->Subkategori_model->get_kategori();

        if (!$data['subkategori']) {
            show_404();
        }

        $this->form_validation->set_rules('subkategori', 'subkategori', 'required');
        $this->form_validation->set_rules('kategori_id', 'kategori_id', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['subkategoris'] = $this->Subkategori_model->get_all();
            $data['v'] = 'admin/subkategori/edit';
            $this->load->view('layout/view', $data);
        } else {
            $data = [
                'nama_subkatbkd' => $this->input->post('subkategori'),
                'kategori_id' => $this->input->post('kategori_id')
            ];
            $this->Subkategori_model->update($id, $data);
            $this->session->set_flashdata('success', 'Kategori berhasil diperbarui.');
            redirect('adminnya/subkategori');
        }
    }

    // Menghapus subkategori
    public function delete($id) {
        $data = [
            'status' => 0
        ];
        $this->Subkategori_model->update($id, $data);
        $this->session->set_flashdata('success', 'Kategori berhasil dihapus.');

        redirect('adminnya/subkategori');
    }
}
