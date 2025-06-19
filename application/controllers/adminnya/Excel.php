<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Excel extends My_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Bkd_model');
        $this->check_admin();
    }

    public function index() {
        $data['kategori'] = $this->Bkd_model->get_kategori();
        $data['tahun_akademik'] = $this->Bkd_model->get_tahun_akademik_aktif();
        $data['bkd'] = $this->Bkd_model->get_all_bkd();
        $data['dosen'] = $this->Bkd_model->get_dosen();
        $data['tahun_akademik'] = $this->Bkd_model->get_tahun_akademik();
        
        $data['v'] = 'admin/bkd/excel';
        $this->load->view('layout/view', $data);
    }

    public function export(){
        $get_thn = $this->input->get('tahun_akademik_id');
        $get_dsn = $this->input->get('dosen');
        $get_kat = $this->input->get('kategori');
        $get_subkat = $this->input->get('subkategori');

        $bkd = $this->Bkd_model->get_all_bkd_byiddosen_filter($get_dsn, $get_thn,$get_kat, $get_subkat );
        //print_r($bkd);

        // --- 2. Create a new Spreadsheet object ---
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // --- 3. Define Headers for your Excel file ---
        // Choose which properties from your objects you want as columns.
        $headers = [
            'ID BKD',
            'Nama Dosen',
            'Tahun Akademik',
            'Kategori BKD',
            'Sub Kategori BKD',
            'Nama BKD',
            'Nama File',
            'Waktu Upload',
            'Status'
        ];

        // Write headers to the first row
        $col = 1; // Column A
        foreach ($headers as $header) {
            $sheet->setCellValueByColumnAndRow($col, 1, $header);
            $col++;
        }
        // Optional: Make headers bold
        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')->getFont()->setBold(true);

        // --- 4. Populate Data Rows ---
        $row = 2; // Start data from the second row (after headers)
        foreach ($bkd as $item) {
            // Map object properties to Excel columns
            $sheet->setCellValueByColumnAndRow(1, $row, $item->id);
            $sheet->setCellValueByColumnAndRow(2, $row, $item->dosen); // Using 'dosen' property
            $sheet->setCellValueByColumnAndRow(3, $row, $item->tahun); // Using 'tahun' property
            $sheet->setCellValueByColumnAndRow(4, $row, $item->kategori); // Using 'kategori' property
            $sheet->setCellValueByColumnAndRow(5, $row, $item->subkategori); // Using 'subkategori' property
            $sheet->setCellValueByColumnAndRow(6, $row, $item->nama_bkd);
            $sheet->setCellValueByColumnAndRow(7, $row, $item->file_path);
            $sheet->setCellValueByColumnAndRow(8, $row, $item->waktu_upload);
            $sheet->setCellValueByColumnAndRow(9, $row, $item->status == 1 ? 'Aktif' : 'Non-aktif'); // Example: converting status to human-readable

            $row++;
        }

        // --- 5. Auto-size columns for better readability (optional) ---
        foreach (range('A', $sheet->getHighestColumn()) as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // --- 6. Set the Filename for Download ---
        $filename = 'data_bkd_' . date('Ymd_His') . '.xlsx';

        // --- 7. Set Headers for Download ---
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0'); // No caching

        // --- 8. Create a writer and save the spreadsheet to output ---
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output'); // Output directly to the browser

        exit; // Important: Stop further script execution after sending the file
    }

}