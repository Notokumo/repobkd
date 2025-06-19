<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bkd extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Bkd_model');
        $this->load->library('upload');
        $this->load->helper('security');

        $this->check_admin();
    }

    // Menampilkan semua data BKD
    public function index() {
        $data['kategori'] = $this->Bkd_model->get_kategori();
        $data['tahun_akademik'] = $this->Bkd_model->get_tahun_akademik_aktif();
        $data['bkd'] = $this->Bkd_model->get_all_bkd();
        $data['dosen'] = $this->Bkd_model->get_dosen();
        $data['tahun_akademik'] = $this->Bkd_model->get_tahun_akademik();
        
        $data['v'] = 'admin/bkd/index';
        $this->load->view('layout/view', $data);
    }

    public function dosen($id_dosen) {
        $data['kategori'] = $this->Bkd_model->get_kategori();
        $data['tahun_akademik'] = $this->Bkd_model->get_tahun_akademik_aktif();
        $data['bkd'] = $this->Bkd_model->get_all_bkd_byiddosen($id_dosen);
        $data['dosen'] = $this->Bkd_model->get_dosen();
        $data['tahun_akademik'] = $this->Bkd_model->get_tahun_akademik();
        
        $data['v'] = 'admin/bkd/index';
        $this->load->view('layout/view', $data);
    }

    public function filter() {
        $data['get_thn'] = $this->input->get('tahun_akademik_id');
        $data['get_dsn'] = $this->input->get('dosen');
        $data['get_kat'] = $this->input->get('kategori');
        $data['get_subkat'] = $this->input->get('subkategori');

        $data['kategori'] = $this->Bkd_model->get_kategori();
        $data['subkategori'] = $this->Bkd_model->get_subkategori_by_kategori($data['get_kat']);
        $data['tahun_akademik'] = $this->Bkd_model->get_tahun_akademik_aktif();
        $data['dosen'] = $this->Bkd_model->get_dosen();
        $data['bkd'] = $this->Bkd_model->get_all_bkd_byiddosen_filter($data['get_dsn'], $data['get_thn'],$data['get_kat'], $data['get_subkat'] );

        $data['v'] = 'admin/bkd/index_filter';
        $this->load->view('layout/view', $data);
    }

    public function tambah() {
        // Validate form input
        $this->form_validation->set_rules('nama_bkd', 'Nama BKD', 'required');
        $this->form_validation->set_rules('file', 'File', 'callback_file_check');
        $this->form_validation->set_rules('tahun_akademik_id', 'Tahun Akademik', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('subkategori', 'Subkategori', 'required');

        if ($this->form_validation->run() == FALSE) {
            // If validation fails, reload the form with validation errors
            $data['tahun_akademik'] = $this->Bkd_model->get_tahun_akademik();
            $data['kategori'] = $this->Bkd_model->get_kategori();
            $data['dosen'] = $this->Bkd_model->get_dosen();
            $data['v'] = 'admin/bkd/tambah_bkd';
            $this->load->view('layout/view', $data);
        } else {
            // If validation passes, proceed with file upload and data insertion
            $upload_path = './bkd/';
            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0777, TRUE);
            }

            // Get the uploaded file name
            $filename = sanitize_filename($_FILES['file']['name']);
            // Generate a timestamp
            $timestamp = time();
            // Rename the file by combining the filename and timestamp
            $newFilename = $timestamp . '_' . $filename;

            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx|jpg|jpeg|png|gif';
            $config['max_size'] = 50000; // 2MB
            $config['file_name'] = $newFilename;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('file')) {
                // If file upload fails, reload the form with upload errors
                $data['error'] = $this->upload->display_errors();
                $data['tahun_akademik'] = $this->Bkd_model->get_tahun_akademik();
                $data['kategori'] = $this->Bkd_model->get_kategori();
                $data['dosen'] = $this->Bkd_model->get_dosen();
                $data['v'] = 'admin/bkd/tambah_bkd';
            $this->load->view('layout/view', $data);
            } else {
                // If file upload succeeds, proceed with data insertion
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];

                $data = array(
                    'dosen_id' => $this->session->userdata('user_id'),
                    'nama_bkd' => $this->input->post('nama_bkd'),
                    'file_path' => $file_name,
                    'tahun_akademik_id' => $this->input->post('tahun_akademik_id'),
                    'kategori_id' => $this->input->post('kategori'),
                    'subkategori_id' => $this->input->post('subkategori')
                );

                if ($this->Bkd_model->insert_bkd($data)) {
                    // If data insertion succeeds, show success message
                    $this->session->set_flashdata('success', 'Data berhasil disimpan.');
                    redirect('adminnya/bkd/');
                } else {
                    // If data insertion fails, show error message
                    $this->session->set_flashdata('error', 'Gagal menyimpan data.');
                    redirect('adminnya/bkd/tambah/');
                }
            }
        }
    }

    public function edit($id_bkd){
        $data['bkd'] = $this->Bkd_model->get_bkd_by_id($id_bkd);

        if (!$data['bkd']) {
            show_404();
        }

        $data['subkategori'] = $this->Bkd_model->get_subkategori_by_kategori($data['bkd']->kategori_id);
        $data['kategori'] = $this->Bkd_model->get_kategori();
        $data['tahun_akademik'] = $this->Bkd_model->get_tahun_akademik_aktif();

        $data['v'] = 'admin/bkd/edit_bkd';
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
                redirect('adminnya/bkd/edit/' . $id);
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
        redirect('adminnya/bkd');
    }

    // Menghapus data BKD
    public function delete($id) {
        $data = [
            'status' => 0,
        ];
        $this->Bkd_model->update_bkd($id, $data);
        $this->session->set_flashdata('success', 'Data BKD berhasil dihapus.');
        redirect('adminnya/bkd');
    }

    // Mengambil subkategori berdasarkan kategori
    public function get_subkategori() {
        $kategori_id = $this->input->get('kategori');
        $subkategori = $this->Bkd_model->get_subkategori_by_kategori($kategori_id);
        echo json_encode($subkategori);
    }

    public function file_check($str) {
        if (empty($_FILES['file']['name'])) {
            $this->form_validation->set_message('file_check', 'File harus diunggah.');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
