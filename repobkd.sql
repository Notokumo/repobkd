/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.5.6-MariaDB-log : Database - dev_repobkd
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dev_repobkd` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dev_repobkd`;

/*Table structure for table `ADMIN` */

DROP TABLE IF EXISTS `ADMIN`;

CREATE TABLE `ADMIN` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `ADMIN` */

insert  into `ADMIN`(`id`,`nama`,`username`,`password`,`created_at`,`updated_at`) values (1,'Admin Repository BKD','admin','$2y$10$vdr87L.ZZ9Zfi2BfwqlgnunOqj7SyycY4Fa.xAr.q6Z3zT3FqesCW','2025-03-20 11:31:26','2025-06-19 09:48:30');

/*Table structure for table `DOSEN` */

DROP TABLE IF EXISTS `DOSEN`;

CREATE TABLE `DOSEN` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dosen` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `DOSEN` */

insert  into `DOSEN`(`id`,`nama_dosen`,`email`,`password`,`status`) values (1,'Dr. Andi Wijaya','andi.wijaya@univ.ac.id','$2y$10$H8V4kau03kIlOfTfcXKgk.gx9ICZi2tEmEJ6DoGy.eZ.wkZAJN4K.',1),(2,'Prof. Siti Aminah','siti.aminah@univ.ac.id','$2y$10$H8V4kau03kIlOfTfcXKgk.gx9ICZi2tEmEJ6DoGy.eZ.wkZAJN4K.',1),(3,'Budi Santoso','budi.santoso@univ.ac.id','$2y$10$H8V4kau03kIlOfTfcXKgk.gx9ICZi2tEmEJ6DoGy.eZ.wkZAJN4K.',1),(4,'Ibu Rina Sari','rina.sari@univ.ac.id','$2y$10$H8V4kau03kIlOfTfcXKgk.gx9ICZi2tEmEJ6DoGy.eZ.wkZAJN4K.',1),(5,'Pak Joko Prasetyo','joko.prasetyo@univ.ac.id','$2y$10$H8V4kau03kIlOfTfcXKgk.gx9ICZi2tEmEJ6DoGy.eZ.wkZAJN4K.',1),(6,'Dr. Lila Hartati','lila.hartati@univ.ac.id','$2y$10$H8V4kau03kIlOfTfcXKgk.gx9ICZi2tEmEJ6DoGy.eZ.wkZAJN4K.',1),(7,'Prof. Ahmad Zulkarnain','ahmad.zulkarnain@univ.ac.id','$2y$10$H8V4kau03kIlOfTfcXKgk.gx9ICZi2tEmEJ6DoGy.eZ.wkZAJN4K.',1),(8,'Ibu Nia Kurniawati','nia.kurniawati@univ.ac.id','$2y$10$H8V4kau03kIlOfTfcXKgk.gx9ICZi2tEmEJ6DoGy.eZ.wkZAJN4K.',1),(9,'Pak Rudi Setiawan','rudi.setiawan@univ.ac.id','$2y$10$H8V4kau03kIlOfTfcXKgk.gx9ICZi2tEmEJ6DoGy.eZ.wkZAJN4K.',1),(10,'Dr. Tia Melati','tia.melati@univ.ac.id','$2y$10$H8V4kau03kIlOfTfcXKgk.gx9ICZi2tEmEJ6DoGy.eZ.wkZAJN4K.',1);

/*Table structure for table `ENTRI_BKD` */

DROP TABLE IF EXISTS `ENTRI_BKD`;

CREATE TABLE `ENTRI_BKD` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dosen_id` int(11) NOT NULL,
  `tahun_akademik_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `subkategori_id` int(11) NOT NULL,
  `nama_bkd` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `waktu_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ENTRI_BKD` */

/*Table structure for table `KAT_BKD` */

DROP TABLE IF EXISTS `KAT_BKD`;

CREATE TABLE `KAT_BKD` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_katbkd` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `KAT_BKD` */

insert  into `KAT_BKD`(`id`,`nama_katbkd`,`status`) values (1,'Pelaksanaan Pendidikan',1),(2,'Pelaksanaan Pendidikan (Pengajaran)',1),(3,'Pelaksanaan Penelitian',1),(4,'Pelaksanaan Pengabdian Masyarakat',1),(5,'Pelaksanaan Penunjang',1),(6,'Laporan BKD/LKD',1),(7,'Dokumen dan Laporan Kemajuan Dosen yang sedang Studi Lanjut',1);

/*Table structure for table `SUBKAT_BKD` */

DROP TABLE IF EXISTS `SUBKAT_BKD`;

CREATE TABLE `SUBKAT_BKD` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subkatbkd` varchar(255) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

/*Data for the table `SUBKAT_BKD` */

insert  into `SUBKAT_BKD`(`id`,`nama_subkatbkd`,`kategori_id`,`status`) values (1,'Ijasah',1,1),(2,'Transkrip',1,1),(3,'SK Mengajar',2,1),(4,'Jurnal Perkuliahan',2,1),(5,'Kontrak Perkuliahan',2,1),(6,'Daftar Hadir / Absensi',2,1),(7,'RPP',2,1),(8,'RPS',2,1),(9,'Laporan skripsi / KTI',2,1),(10,'Rencana Evaluasi',2,1),(11,'Laporan Praktek Lapangan',2,1),(12,'Aktivitas Partisipatif',2,1),(13,'Bimbingan PA',2,1),(14,'Hasil Proyek',2,1),(15,'Buku Ajar',2,1),(16,'Kognitif - Tugas',2,1),(17,'Absensi Mahasiswa',2,1),(18,'Kognitif - Quiz',2,1),(19,'Soal UTS',2,1),(20,'Kognitif - Ujian Tengah Semester',2,1),(21,'Soal UAS',2,1),(22,'Kognitif - Ujian Akhir Semester',2,1),(23,'Nilai Akhir',2,1),(24,'HaKI Pembelajaran',2,1),(25,'Laporan Hasil Penelitian',3,1),(26,'Jurnal Penelitian',3,1),(27,'Surat Tugas Penelitian',3,1),(28,'Turnityn / Cek Plagiasi',3,1),(29,'Buku Penelitian',3,1),(30,'HaKI Penelitian',3,1),(31,'Laporan Hasil Pengabdian Masyarakat',4,1),(32,'Jurnal Pengabdian Masyarakat',4,1),(33,'Surat Tugas Pengabdian Masyarakat',4,1),(34,'HaKI Abdimas',4,1),(35,'Surat Tugas / Surat Keputusan',5,1),(36,'Sertifikat',5,1),(37,'Laporan BKD',6,1),(38,'Laporan LKD',6,1),(39,'Surat Tubel/Ijbel',7,1),(40,'Kontrak Tubel/Ijbel',7,1),(41,'KRS',7,1),(42,'KHS',7,1),(43,'Disertasi',7,1);

/*Table structure for table `THN_AKADEMIK` */

DROP TABLE IF EXISTS `THN_AKADEMIK`;

CREATE TABLE `THN_AKADEMIK` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_thnakademik` varchar(255) NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `THN_AKADEMIK` */

insert  into `THN_AKADEMIK`(`id`,`nama_thnakademik`,`aktif`,`status`) values (1,'2023/2024 GANJIL',0,1),(2,'2023/2024 GENAP',0,1),(3,'2022/2023 GANJIL',0,1),(4,'2022/2023 GENAP',0,1),(5,'2021/2022 GANJIL',0,1),(6,'2021/2022 GENAP',0,1),(7,'2020/2021 GANJIL',0,1),(8,'2020/2021 GENAP',0,1),(9,'2019/2020 GANJIL',0,1),(10,'2019/2020 GENAP',0,1),(11,'2018/2019 GANJIL',0,1),(12,'2018/2019 GENAP',0,1),(13,'2024/2025 GANJIL',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
