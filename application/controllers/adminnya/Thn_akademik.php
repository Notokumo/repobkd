<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thn_Akademik extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Thn_akademik_model');
        $this->check_admin();
    }

    public function index() {
        $data['thn_akademik'] = $this->Thn_akademik_model->get_all();
        $data['v'] = 'admin/thn_akademik/index';
        $this->load->view('layout/view', $data);
    }

    public function add() {
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|max_length[9]');
        $this->form_validation->set_rules('aktif', 'Aktif', 'required|in_list[0,1]');

        if ($this->form_validation->run() === FALSE) {
            $data['thn_akademik'] = $this->Thn_akademik_model->get_all();
            $data['v'] = 'admin/thn_akademik/index';
            $this->load->view('layout/view', $data);
        } else {
            if($this->input->post('aktif') == 1){
                $this->Thn_akademik_model->update_statusaktif();
            }          
            $data = array(
                'nama_thnakademik' => $this->input->post('tahun'),
                'aktif' => $this->input->post('aktif')
            );
            $this->Thn_akademik_model->insert($data);
            $this->session->set_flashdata('success', 'Data Tahun Akademik berhasil ditambahkan.');
            redirect('adminnya/thn_akademik');
        }
    }

    public function edit($id) {
        $data['thn_akademik'] = $this->Thn_akademik_model->get_by_id($id);

        if (empty($data['thn_akademik'])) {
            show_404();
        }

        $this->form_validation->set_rules('tahun', 'Tahun', 'required|max_length[9]');
        $this->form_validation->set_rules('aktif', 'Aktif', 'required|in_list[0,1]');

        if ($this->form_validation->run() === FALSE) {
            $data['thn_akademiks'] = $this->Thn_akademik_model->get_all();
            $data['v'] = 'admin/thn_akademik/edit';
            $this->load->view('layout/view', $data);
        } else {
            if($this->input->post('aktif') == 1){
                $this->Thn_akademik_model->update_statusaktif();
            }
            $data = array(
                'nama_thnakademik' => $this->input->post('tahun'),
                'aktif' => $this->input->post('aktif')
            );
            $this->Thn_akademik_model->update($id, $data);
            $this->session->set_flashdata('success', 'Data Tahun Akademik berhasil diperbarui.');
            redirect('adminnya/thn_akademik');
        }
    }

    public function delete($id) {
        $data = array(
            'status' => 0
        );
        $this->Thn_akademik_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data Tahun Akademik berhasil dihapus.');
        redirect('adminnya/thn_akademik');
    }

    public function aktif($id) {
        $this->Thn_akademik_model->update_statusaktif();
        $data = array(
            'aktif' => 1
        );
        $this->Thn_akademik_model->update($id, $data);
        $this->session->set_flashdata('success', 'Data Tahun Akademik berhasil diaktifkan.');
        redirect('adminnya/thn_akademik');
    }
}
