<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thn_akademik_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_all() {
        return $this->db->get_where('THN_AKADEMIK', array('status' => 1))->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('THN_AKADEMIK', array('id' => $id))->row();
    }

    public function insert($data) {
        return $this->db->insert('THN_AKADEMIK', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('THN_AKADEMIK', $data);
    }

    public function update_statusaktif() {
        return $this->db->update('THN_AKADEMIK', ['aktif' => 0]);
    }    

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('THN_AKADEMIK');
    }
}
