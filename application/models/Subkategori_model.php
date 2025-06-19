<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkategori_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Mendapatkan semua subkategori
    public function get_all() {
        $this->db->select('SUBKAT_BKD.*, KAT_BKD.nama_katbkd AS kategori_nama');
        $this->db->from('SUBKAT_BKD');
        $this->db->where('SUBKAT_BKD.status', 1);
        $this->db->join('KAT_BKD', 'SUBKAT_BKD.kategori_id = KAT_BKD.id');
        $this->db->order_by('KAT_BKD.id', 'ASC');
        return $this->db->get()->result();
    }

    // Menambahkan subkategori baru
    public function insert($data) {
        return $this->db->insert('SUBKAT_BKD', $data);
    }

    // Mengupdate subkategori
    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('SUBKAT_BKD', $data);
    }

    // Menghapus subkategori
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('SUBKAT_BKD');
    }

    // Mendapatkan subkategori berdasarkan ID
    public function get_by_id($id) {
        return $this->db->get_where('SUBKAT_BKD', ['id' => $id])->row();
    }

    // Mendapatkan semua kategori untuk dropdown
    public function get_kategori() {
        return $this->db->get('KAT_BKD')->result();
    }
}
