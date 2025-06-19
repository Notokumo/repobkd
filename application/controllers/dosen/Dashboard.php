<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dosenauth_model');
        $this->check_dosen();
    }

    // Menampilkan semua data BKD
    public function index() {
        $data['v'] = 'dosen/dashboard';
        $this->load->view('layout/view', $data);
    }

}
