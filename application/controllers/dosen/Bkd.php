<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bkd extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Bkd_model');
        $this->load->library('upload');
        $this->load->helper('security');
        $this->check_dosen();
    }

    // Menampilkan semua data BKD
    public function index() {
        $data['kategori'] = $this->Bkd_model->get_kategori();
        $data['tahun_akademik'] = $this->Bkd_model->get_tahun_akademik_aktif();
        $data['bkd'] = $this->Bkd_model->get_all_bkd_byiddosen($this->session->userdata('user_id'));

        $data['v'] = 'dosen/bkd';
        $this->load->view('layout/view', $data);
    }

    public function filter() {
        $data['get_thn'] = $this->input->get('tahun_akademik_id');
        $data['get_kat'] = $this->input->get('kategori');
        $data['get_subkat'] = $this->input->get('subkategori');

        $data['kategori'] = $this->Bkd_model->get_kategori();
        $data['subkategori'] = $this->Bkd_model->get_subkategori_by_kategori($data['get_kat']);
        $data['tahun_akademik'] = $this->Bkd_model->get_tahun_akademik_aktif();
        $data['bkd'] = $this->Bkd_model->get_all_bkd_byiddosen_filter($this->session->userdata('user_id'), $data['get_thn'],$data['get_kat'], $data['get_subkat'] );

        $data['v'] = 'dosen/bkd_filter';
        $this->load->view('layout/view', $data);
    }

    public function edit($id_bkd) {
        $data['bkd'] = $this->Bkd_model->get_bkd_by_id($id_bkd);

        if (!$data['bkd']) {
            show_404();
        }

        $data['subkategori'] = $this->Bkd_model->get_subkategori_by_kategori($data['bkd']->kategori_id);
        $data['kategori'] = $this->Bkd_model->get_kategori();
        $data['tahun_akademik'] = $this->Bkd_model->get_tahun_akademik_aktif();

        $data['v'] = 'dosen/edit_bkd';
        $this->load->view('layout/view', $data);
    }

    public function update($id) {
        

        // Cek apakah ada file yang diupload
        if ($_FILES['file']['name']) {

            // Get the uploaded file name
            $filename = sanitize_filename($_FILES['file']['name']);
            // Generate a timestamp
            $timestamp = time();
            // Rename the file by combining the filename and timestamp
            $newFilename = $timestamp . '_' . $filename;


            $config['upload_path'] = './bkd/';
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|jpg|jpeg|png|gif';
            $config['max_size'] = 50000; // 2MB
            $config['file_name'] = $newFilename;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('file')) {
                $upload_data = $this->upload->data();

                $data_file = [
                    'file_path' => $upload_data['file_name']
                ];
                $this->Bkd_model->update_bkd($id, $data_file);
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('dosen/bkd/edit/' . $id);
            }
        }

        $data = [
            'tahun_akademik_id' => $this->input->post('tahun_akademik_id'),
            'kategori_id' => $this->input->post('kategori'),
            'subkategori_id' => $this->input->post('subkategori'),
            'nama_bkd' => $this->input->post('nama_bkd'),
        ];
        
        $this->Bkd_model->update_bkd($id, $data);
        $this->session->set_flashdata('success', 'Data BKD berhasil diperbarui.');
        redirect('dosen/bkd');
    }

    // Menghapus data BKD
    public function delete($id) {
        $data = [
            'status' => 0,
        ];
        $this->Bkd_model->update_bkd($id, $data);
        $this->session->set_flashdata('success', 'Data BKD berhasil dihapus.');
        redirect('dosen/bkd');
    }
}
