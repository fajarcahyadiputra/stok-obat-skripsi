-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table stok_obat.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomer_tlpn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stok_obat.customer: ~4 rows (approximately)
DELETE FROM `customer`;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`nik`, `nama`, `nomer_tlpn`, `alamat`, `created_at`, `updated_at`) VALUES
	('3275072410980022', 'Dadang', '023892893212', 'Bekasi', '2022-12-12 14:49:56', '2022-12-19 16:32:15'),
	('3275072410980077', 'Asep', '0238928932', 'bekasi', '2022-12-11 21:35:55', '2022-12-21 15:36:55'),
	('3275072410986767', 'Idoy', '0858872487248', 'Jakarta', '2022-12-21 15:42:44', '2022-12-21 15:42:44'),
	('4153176361556165', 'Imel', '0876523712631', 'Bekasi', '2022-12-21 15:43:13', '2022-12-21 15:43:13');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- Dumping structure for table stok_obat.detail_transaksi
CREATE TABLE IF NOT EXISTS `detail_transaksi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_obat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomer_faktur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan_id` bigint(20) unsigned NOT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `stok_sebelumnya` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sisa_stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_transaksi_kode_obat_foreign` (`kode_obat`),
  KEY `detail_transaksi_nomer_faktur_foreign` (`nomer_faktur`),
  KEY `detail_transaksi_satuan_id_foreign` (`satuan_id`),
  CONSTRAINT `detail_transaksi_kode_obat_foreign` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE,
  CONSTRAINT `detail_transaksi_nomer_faktur_foreign` FOREIGN KEY (`nomer_faktur`) REFERENCES `transaksi` (`nomer_faktur`) ON DELETE CASCADE,
  CONSTRAINT `detail_transaksi_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stok_obat.detail_transaksi: ~6 rows (approximately)
DELETE FROM `detail_transaksi`;
/*!40000 ALTER TABLE `detail_transaksi` DISABLE KEYS */;
INSERT INTO `detail_transaksi` (`id`, `kode_obat`, `nomer_faktur`, `satuan_id`, `nama_obat`, `harga_satuan`, `total_harga`, `stok_sebelumnya`, `jumlah`, `sisa_stok`, `created_at`, `updated_at`) VALUES
	(7, 'OB0001', 'FKR-0001-1671612055', 3, 'Sucralfat syr', 10000, 200000, 1010, 20, 990, '2022-12-21 15:41:05', '2022-12-21 15:41:05'),
	(8, 'OB0003', 'FKR-0001-1671612055', 2, 'Cefixime', 30000, 360000, 1300, 12, 1288, '2022-12-21 15:41:05', '2022-12-21 15:41:05'),
	(9, 'OB0005', 'FKR-2056-1671612240', 2, 'Lansoprazole', 10000, 10000, 1000, 1, 999, '2022-12-21 15:44:08', '2022-12-21 15:44:08'),
	(10, 'OB0002', 'FKR-2056-1671612240', 2, 'Paracetamol 500mg', 20000, 80000, 1100, 4, 1096, '2022-12-21 15:44:08', '2022-12-21 15:44:08'),
	(11, 'OB0003', 'FKR-2241-1671612428', 4, 'Cefixime', 30000, 1080000, 1288, 3, 1252, '2022-12-21 15:47:24', '2022-12-21 15:47:24'),
	(12, 'OB0001', 'FKR-2429-1671616265', 4, 'Sucralfat syr', 10000, 360000, 990, 3, 954, '2022-12-21 16:51:11', '2022-12-21 16:51:11');
/*!40000 ALTER TABLE `detail_transaksi` ENABLE KEYS */;

-- Dumping structure for table stok_obat.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stok_obat.migrations: ~16 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(3, '2021_10_27_064750_create_supplier_table', 1),
	(4, '2022_10_06_190711_create_customer_table', 1),
	(5, '2022_12_01_133152_create_obat_table', 1),
	(6, '2022_12_01_135240_create_obat_satuan_table', 1),
	(7, '2022_12_01_135435_create_obatt_masuk_table', 1),
	(8, '2022_12_01_135620_create_transaksi_table', 1),
	(9, '2022_12_01_141015_create_detail_transaksi_table', 1),
	(10, '2022_12_01_144416_add_column_pic_to_obat_table', 1),
	(11, '2022_12_02_135448_add_column_keterangan_on_transaksi_table', 1),
	(12, '2022_12_02_153137_add_column_stok_sebelumnya_and_stok_akhir_on_detail_transaksi_table', 1),
	(13, '2022_12_02_154257_add_column_harga_satuan_in_obat_table', 1),
	(14, '2022_12_02_162951_add_column_harga_total_harga_in_detail_transaksi_table', 1),
	(15, '2022_12_02_163158_change_column_harga_total_harga_in_transaksi_table', 1),
	(16, '2022_12_06_204038_add_aturan_pakai_column_to_obat_table', 1),
	(17, '2022_12_12_122857_add_stok_awal_column_in_obat_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table stok_obat.obat
CREATE TABLE IF NOT EXISTS `obat` (
  `kode_obat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aturan_pakai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `satuan_id` bigint(20) unsigned NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `khasiat_obat` text COLLATE utf8mb4_unicode_ci,
  `pic` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`kode_obat`),
  UNIQUE KEY `obat_kode_obat_unique` (`kode_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stok_obat.obat: ~4 rows (approximately)
DELETE FROM `obat`;
/*!40000 ALTER TABLE `obat` DISABLE KEYS */;
INSERT INTO `obat` (`kode_obat`, `nama`, `aturan_pakai`, `stok_awal`, `jumlah`, `keterangan`, `satuan_id`, `harga_satuan`, `khasiat_obat`, `pic`, `tanggal_kadaluarsa`, `created_at`, `updated_at`) VALUES
	('OB0001', 'Sucralfat syr', 'di minum 1 hari sekali', 1000, 954, '-', 3, 10000, 'obat lambung', 'assets/image/obat/1671440390-Dec.jpg', '2024-06-19', '2022-12-19 15:59:50', '2022-12-21 16:51:11'),
	('OB0002', 'Paracetamol 500mg', 'minum 1 hari tiga kali', 1000, 1096, '-', 2, 20000, 'analgetik antipiretik', 'assets/image/obat/1671440467-Dec.jpg', '2023-10-19', '2022-12-19 16:01:07', '2022-12-21 15:44:08'),
	('OB0003', 'Cefixime', 'minum sehari dua kali', 1000, 1252, '-', 2, 30000, 'antibiotik', 'assets/image/obat/1671440535-Dec.jpg', '2024-09-19', '2022-12-19 16:02:15', '2022-12-21 15:47:24'),
	('OB0004', 'Tempra', 'di minum 1 hari 2 kali', 1000, 1092, '-', 3, 50000, 'analgetik antipiretik', 'assets/image/obat/1671440834-Dec.jpg', '2023-10-19', '2022-12-19 16:07:14', '2022-12-21 15:40:16'),
	('OB0005', 'Lansoprazole', '1 hari 2 kali', 1000, 999, '-', 2, 10000, 'obat lambung', 'assets/image/obat/1671441173-Dec.jpg', '2023-06-19', '2022-12-19 16:12:53', '2022-12-21 15:44:08');
/*!40000 ALTER TABLE `obat` ENABLE KEYS */;

-- Dumping structure for table stok_obat.obat_masuk
CREATE TABLE IF NOT EXISTS `obat_masuk` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_obat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint(20) unsigned NOT NULL,
  `satuan_id` bigint(20) unsigned NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_sebelumnya` int(11) NOT NULL,
  `total_stok` int(11) NOT NULL,
  `penerima` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `obat_masuk_kode_obat_foreign` (`kode_obat`),
  KEY `obat_masuk_supplier_id_foreign` (`supplier_id`),
  KEY `obat_masuk_satuan_id_foreign` (`satuan_id`),
  CONSTRAINT `obat_masuk_kode_obat_foreign` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE,
  CONSTRAINT `obat_masuk_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`) ON DELETE CASCADE,
  CONSTRAINT `obat_masuk_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stok_obat.obat_masuk: ~4 rows (approximately)
DELETE FROM `obat_masuk`;
/*!40000 ALTER TABLE `obat_masuk` DISABLE KEYS */;
INSERT INTO `obat_masuk` (`id`, `kode_obat`, `supplier_id`, `satuan_id`, `jumlah`, `jumlah_sebelumnya`, `total_stok`, `penerima`, `created_at`, `updated_at`) VALUES
	(2, 'OB0001', 1, 3, 10, 1000, 1010, 'asep', '2022-12-19 16:31:50', '2022-12-19 16:31:50'),
	(3, 'OB0002', 1, 2, 100, 1000, 1100, 'Asep', '2022-12-21 15:37:21', '2022-12-21 15:37:21'),
	(4, 'OB0003', 1, 2, 300, 1000, 1300, 'Asep', '2022-12-21 15:37:41', '2022-12-21 15:37:41'),
	(5, 'OB0004', 1, 3, 100, 992, 1092, 'Asep', '2022-12-21 15:40:16', '2022-12-21 15:40:16');
/*!40000 ALTER TABLE `obat_masuk` ENABLE KEYS */;

-- Dumping structure for table stok_obat.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stok_obat.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table stok_obat.satuan
CREATE TABLE IF NOT EXISTS `satuan` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `satuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_persatuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `satuan_satuan_unique` (`satuan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stok_obat.satuan: ~4 rows (approximately)
DELETE FROM `satuan`;
/*!40000 ALTER TABLE `satuan` DISABLE KEYS */;
INSERT INTO `satuan` (`id`, `satuan`, `jumlah_persatuan`, `created_at`, `updated_at`) VALUES
	(1, 'tablet', 1, '2022-12-08 10:13:05', '2022-12-08 10:13:05'),
	(2, 'strip-10', 10, '2022-12-08 10:13:05', '2022-12-08 10:13:05'),
	(3, 'botol', 1, '2022-12-08 10:13:05', '2022-12-08 10:13:05'),
	(4, 'box', 12, '2022-12-08 10:13:05', '2022-12-08 10:13:05');
/*!40000 ALTER TABLE `satuan` ENABLE KEYS */;

-- Dumping structure for table stok_obat.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomer_tlpn` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stok_obat.supplier: ~0 rows (approximately)
DELETE FROM `supplier`;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`id`, `nama`, `nomer_tlpn`, `alamat`, `created_at`, `updated_at`) VALUES
	(1, 'pt obat', '0238928932', 'jakarta selatan', '2022-12-11 21:36:58', '2022-12-11 21:36:58');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

-- Dumping structure for table stok_obat.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `nomer_faktur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kasir` bigint(20) unsigned NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `sub_total` int(11) NOT NULL,
  `status_transaksi` enum('pending','success','cancle') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`nomer_faktur`),
  UNIQUE KEY `transaksi_nomer_faktur_unique` (`nomer_faktur`),
  KEY `transaksi_kasir_foreign` (`kasir`),
  KEY `transaksi_nik_foreign` (`nik`),
  CONSTRAINT `transaksi_kasir_foreign` FOREIGN KEY (`kasir`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transaksi_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `customer` (`nik`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stok_obat.transaksi: ~4 rows (approximately)
DELETE FROM `transaksi`;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`nomer_faktur`, `nik`, `kasir`, `tanggal_transaksi`, `sub_total`, `status_transaksi`, `keterangan`, `created_at`, `updated_at`) VALUES
	('FKR-0001-1671612055', '3275072410980022', 18, '2022-12-21', 560000, 'pending', '-', '2022-12-21 15:41:05', '2022-12-21 15:41:05'),
	('FKR-2056-1671612240', '4153176361556165', 18, '2022-12-21', 90000, 'pending', '-', '2022-12-21 15:44:08', '2022-12-21 15:44:08'),
	('FKR-2241-1671612428', '3275072410986767', 18, '2022-12-21', 1080000, 'pending', '-', '2022-12-21 15:47:24', '2022-12-21 15:47:24'),
	('FKR-2429-1671616265', '3275072410986767', 18, '2022-12-21', 360000, 'pending', '-', '2022-12-21 16:51:11', '2022-12-21 16:51:11');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

-- Dumping structure for table stok_obat.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('administrasi','apoteker','manager','kasir') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'apoteker',
  `status_aktif` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nomer_tlpn` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stok_obat.users: ~4 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `status_aktif`, `avatar`, `created_at`, `updated_at`, `nomer_tlpn`) VALUES
	(16, 'Administrasi', 'administrasi', '$2y$10$kqO2VrpKDa37X5yyutcvLudgAoXDf9uakvllWakwef4.EtF02ESOy', 'administrasi', 'aktif', '', '2022-12-20 11:00:26', '2022-12-20 11:00:26', '0896726478264'),
	(17, 'Apoteker', 'apoteker', '$2y$10$bNe966iWe4/uRto8JhuMq.yP95APT4gzh.wMG9AWbQuKcDlMhkBwG', 'apoteker', 'aktif', '', '2022-12-20 11:00:26', '2022-12-20 11:00:26', '0896728274'),
	(18, 'Manager', 'manager', '$2y$10$M1.tKBOlus3u1qjnb9D9Re7VmGqKSR/CaVO9DJfqwQe737r0hWWhi', 'manager', 'aktif', '', '2022-12-20 11:00:26', '2022-12-20 11:00:26', '089672884033'),
	(19, 'Kasir', 'kasir', '$2y$10$G1V1swXvMBxQuX7C75m0jOdCuUudSRUGxUjHtOyKxrzbjS3QpqWau', 'kasir', 'aktif', '', '2022-12-20 11:00:26', '2022-12-21 15:36:32', '089673434334');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
