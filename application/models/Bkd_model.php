<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bkd_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Menyimpan data BKD
    public function insert_bkd($data) {
        return $this->db->insert('ENTRI_BKD', $data);
    }

    // Mengambil semua data BKD
    public function get_all_bkd() {
        $this->db->select('ENTRI_BKD.*, DOSEN.nama_dosen as dosen, KAT_BKD.nama_katbkd AS kategori, SUBKAT_BKD.nama_subkatbkd AS subkategori, THN_AKADEMIK.nama_thnakademik AS tahun');
        $this->db->from('ENTRI_BKD');
        $this->db->join('KAT_BKD', 'ENTRI_BKD.kategori_id = KAT_BKD.id');
        $this->db->join('SUBKAT_BKD', 'ENTRI_BKD.subkategori_id = SUBKAT_BKD.id');
        $this->db->join('THN_AKADEMIK', 'ENTRI_BKD.tahun_akademik_id = THN_AKADEMIK.id');
        $this->db->join('DOSEN', 'ENTRI_BKD.dosen_id = DOSEN.id');
        $this->db->where('ENTRI_BKD.status', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    // Mengambil semua data BKD
    public function get_all_bkd_byiddosen($dosen_id) {
        $this->db->select('ENTRI_BKD.*, DOSEN.nama_dosen as dosen, KAT_BKD.nama_katbkd AS kategori, SUBKAT_BKD.nama_subkatbkd AS subkategori, THN_AKADEMIK.nama_thnakademik AS tahun');
        $this->db->from('ENTRI_BKD');
        $this->db->join('KAT_BKD', 'ENTRI_BKD.kategori_id = KAT_BKD.id');
        $this->db->join('SUBKAT_BKD', 'ENTRI_BKD.subkategori_id = SUBKAT_BKD.id');
        $this->db->join('THN_AKADEMIK', 'ENTRI_BKD.tahun_akademik_id = THN_AKADEMIK.id');
        $this->db->join('DOSEN', 'ENTRI_BKD.dosen_id = DOSEN.id');
        $this->db->where('dosen_id', $dosen_id);
        $this->db->where('ENTRI_BKD.status', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    // Mengambil semua data BKD
    public function get_all_bkd_byiddosen_filter($dosen_id, $tahun_akademik_id, $kategori_id, $subkategori_id) {
        $this->db->select('ENTRI_BKD.*, DOSEN.nama_dosen as dosen, KAT_BKD.nama_katbkd AS kategori, SUBKAT_BKD.nama_subkatbkd AS subkategori, THN_AKADEMIK.nama_thnakademik AS tahun');
        $this->db->from('ENTRI_BKD');
        $this->db->join('KAT_BKD', 'ENTRI_BKD.kategori_id = KAT_BKD.id');
        $this->db->join('SUBKAT_BKD', 'ENTRI_BKD.subkategori_id = SUBKAT_BKD.id');
        $this->db->join('THN_AKADEMIK', 'ENTRI_BKD.tahun_akademik_id = THN_AKADEMIK.id');
        $this->db->join('DOSEN', 'ENTRI_BKD.dosen_id = DOSEN.id');
        $this->db->where('ENTRI_BKD.status', 1);

        if($dosen_id !== 'all'){
            $this->db->where('dosen_id', $dosen_id);
        }


        if($tahun_akademik_id !== 'all'){
            $this->db->where('tahun_akademik_id', $tahun_akademik_id);
        }

        if($kategori_id !== 'all'){
            $this->db->where('ENTRI_BKD.kategori_id', $kategori_id);
        }

        if($subkategori_id !== 'all'){
            $this->db->where('ENTRI_BKD.subkategori_id', $subkategori_id);
        }

        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    // Mengambil data BKD berdasarkan ID
    public function get_bkd_by_id($id) {
        return $this->db->get_where('ENTRI_BKD', ['id' => $id])->row();
    }

    // Memperbarui data BKD
    public function update_bkd($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('ENTRI_BKD', $data);
    }

    // Menghapus data BKD
    public function delete_bkd($id) {
        return $this->db->delete('ENTRI_BKD', ['id' => $id]);
    }

    // Mengambil kategori
    public function get_kategori() {
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->get('KAT_BKD')->result();
    }

    // Mengambil subkategori berdasarkan kategori
    public function get_subkategori_by_kategori($kategori_id) {
        return $this->db->get_where('SUBKAT_BKD', ['kategori_id' => $kategori_id, 'status' => 1])->result();
    }

    // Mengambil tahun akademik aktif
    public function get_tahun_akademik_aktif() {
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->get('THN_AKADEMIK')->result();
    }

    public function get_dosen() {
        $this->db->order_by('id', 'desc');
        return $this->db->get('DOSEN')->result();
    }

    public function get_tahun_akademik() {
        return $this->db->get_where('THN_AKADEMIK', array('status' => 1))->result();
    }
}
