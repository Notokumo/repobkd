Manajemen laporan Beban Kerja Dosen (BKD) jadi lebih mudah dan terstruktur! Aplikasi ini dirancang khusus untuk memfasilitasi dosen dalam mengunggah dan mengelola dokumen-dokumen penting terkait laporan BKD mereka.

✨ Fitur Unggulan
Unggah Dokumen Mudah: Antarmuka intuitif untuk mengunggah berbagai format dokumen.
Organisasi Terpusat: Semua laporan BKD tersimpan rapi dalam satu tempat, mudah diakses kapan saja.
Akses Cepat: Temukan dokumen yang Anda butuhkan dengan cepat melalui fitur pencarian.
Keamanan Terjamin: Dokumen Anda tersimpan dengan aman.
🛠️ Cara Menggunakan (Panduan Singkat)
Daftar/Masuk: Buat akun atau masuk jika Anda sudah memiliki akun.
Unggah File: Klik tombol "Unggah" dan pilih dokumen BKD yang ingin Anda simpan.
Kelola Dokumen: Anda bisa melihat, mengunduh, atau menghapus dokumen yang sudah diunggah.
💻 Instalasi (Untuk Pengembang)
Aplikasi ini dibangun menggunakan CodeIgniter 3 dan membutuhkan PHP 7.4 untuk berjalan optimal.

Untuk menjalankan proyek ini secara lokal:

Clone repositori:
Bash

git clone https://github.com/namapengguna/nama-repo-anda.git
cd nama-repo-anda
Konfigurasi Web Server: Pastikan Anda memiliki server web seperti Apache atau Nginx yang telah terkonfigurasi untuk PHP 7.4. Arahkan document root server Anda ke folder proyek ini.
Konfigurasi Database:
Buat database baru (misalnya bkd_repo).
Impor skema database Anda (jika ada) ke database yang baru dibuat.
Buka file application/config/database.php dan sesuaikan pengaturan koneksi database Anda:
PHP

'hostname' => 'localhost',
'username' => 'user_database_anda',
'password' => 'password_database_anda',
'database' => 'nama_database_anda',
'dbdriver' => 'mysqli',
Konfigurasi URL Dasar: Buka file application/config/config.php dan sesuaikan $config['base_url'] dengan URL aplikasi Anda:
PHP

$config['base_url'] = 'http://localhost/nama-folder-aplikasi/';
Akses Aplikasi: Buka browser Anda dan akses URL yang telah Anda konfigurasikan (misalnya http://localhost/nama-folder-aplikasi/).
🤝 Kontribusi
Kami sangat terbuka untuk kontribusi! Jika Anda punya ide atau menemukan bug, silakan:

Fork repositori ini.
Buat cabang baru (git checkout -b fitur/nama-fitur).
Lakukan perubahan Anda.
Commit perubahan (git commit -m 'Tambahkan fitur baru').
Push ke cabang Anda (git push origin fitur/nama-fitur).
Buka Pull Request.
📄 Lisensi
Proyek ini dilisensikan di bawah [Nama Lisensi Anda, contoh: MIT License]. Lihat file LICENSE untuk detail lebih lanjut.
