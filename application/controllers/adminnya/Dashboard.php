<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->check_admin();
    }

    // Menampilkan semua data BKD
    public function index() {
        $data['v'] = 'admin/dashboard';
        $this->load->view('layout/view', $data);
    }

}
