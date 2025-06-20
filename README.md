# 🚀 Aplikasi Repositori BKD Dosen

Manajemen laporan Beban Kerja Dosen (BKD) jadi lebih mudah dan terstruktur! Aplikasi ini dirancang khusus untuk memfasilitasi dosen dalam mengunggah dan mengelola dokumen-dokumen penting terkait laporan BKD mereka.

## ✨ Fitur Utama

### 1. Manajemen Pengguna
* **Admin**: Pengelolaan akun administrator sistem, termasuk detail nama, username, dan password. Fitur ini juga melacak waktu pembuatan dan pembaruan akun admin.
* **Dosen**: Pengelolaan data dosen, meliputi nama, email, dan password. Status dosen (aktif/tidak aktif) dapat diatur.

### 2. Manajemen Data Akademik
* **Tahun Akademik**: Pengelolaan daftar tahun akademik dan semester (misalnya, Ganjil, Genap). Sistem mendukung penandaan tahun akademik yang sedang aktif untuk proses entri data.
* **Kategori BKD**: Definisi dan pengelolaan kategori utama aktivitas BKD (misalnya, Pelaksanaan Pendidikan, Pelaksanaan Penelitian, Pelaksanaan Pengabdian Masyarakat, Pelaksanaan Penunjang, Laporan BKD/LKD, Dokumen dan Laporan Kemajuan Dosen yang sedang Studi Lanjut). Kategori dapat diaktifkan atau dinonaktifkan.
* **Sub-Kategori BKD**: Definisi dan pengelolaan sub-kategori yang lebih spesifik di bawah setiap kategori BKD (misalnya, SK Mengajar, Jurnal Perkuliahan di bawah Pelaksanaan Pendidikan; Laporan Hasil Penelitian di bawah Pelaksanaan Penelitian). Sub-kategori juga memiliki status aktif/tidak aktif.

### 3. Entri dan Repositori BKD
* **Pengajuan BKD**: Dosen dapat mengajukan entri BKD dengan memilih tahun akademik, kategori, dan sub-kategori yang sesuai.
* **Unggah Dokumen**: Setiap entri BKD memungkinkan pengunggahan file atau dokumen pendukung. Jalur file (`file_path`) disimpan dalam database.
* **Stempel Waktu**: Setiap entri dilengkapi dengan informasi waktu unggah.
* **Status Entri**: Entri BKD memiliki status, yang dapat digunakan untuk melacak proses verifikasi atau persetujuan.

---

## 💻 Instalasi (Untuk Pengembang)

Aplikasi ini dibangun menggunakan **CodeIgniter 3** dan membutuhkan **PHP 7.4** untuk berjalan optimal.

Untuk menjalankan proyek ini secara lokal:

1.  **Clone repositori:**
    ```bash
    git clone [https://github.com/Notokumo/repobkd.git](https://github.com/Notokumo/repobkd.git])
    cd repobkd
    ```
2.  **Konfigurasi Web Server:**
    Pastikan Anda memiliki server web seperti Apache atau Nginx yang telah terkonfigurasi untuk **PHP 7.4**. Arahkan *document root* server Anda ke folder proyek ini.
3.  **Konfigurasi Database:**
    * Buat database baru (misalnya `bkd_repo`).
    * Impor skema database Anda (jika ada) ke database yang baru dibuat.
    * Buka file `application/config/database.php` dan sesuaikan pengaturan koneksi database Anda:
        ```php
        'hostname' => 'localhost',
        'username' => 'user_database_anda',
        'password' => 'password_database_anda',
        'database' => 'nama_database_anda',
        'dbdriver' => 'mysqli',
        ```
4.  **Akses Aplikasi:**
    Buka browser Anda dan akses URL yang telah Anda konfigurasikan (misalnya `http://localhost/repobkd/`).

---

## Kontribusi

Kami menyambut kontribusi! Jika Anda memiliki ide untuk fitur baru, perbaikan bug, atau peningkatan performa, silakan buka *issue* atau kirimkan *pull request*.

---

## Lisensi

Karya ini dilisensikan di bawah **Creative Commons Attribution-NonCommercial 4.0 International (CC BY-NC 4.0) License**.

Anda bebas untuk:
* **Berbagi** — menyalin dan menyebarluaskan kembali materi ini dalam bentuk atau format apa pun.
* **Mengadaptasi** — menggubah, mengubah, dan membuat turunan dari materi ini untuk tujuan apa pun.

Di bawah ketentuan berikut:
* **Atribusi** — Anda harus mencantumkan nama yang sesuai, memberikan tautan ke lisensi, dan menyatakan apakah ada perubahan yang dilakukan. Anda dapat melakukan cara yang wajar, tetapi tidak mengindikasikan bahwa pemberi lisensi mendukung Anda atau penggunaan Anda.
* **NonKomersial** — Anda tidak boleh menggunakan materi ini untuk tujuan komersial.

Untuk melihat salinan lengkap lisensi ini, kunjungi: [https://creativecommons.org/licenses/by-nc/4.0/](https://creativecommons.org/licenses/by-nc/4.0/)

---
