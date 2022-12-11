-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.33 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk stok-barang
CREATE DATABASE IF NOT EXISTS `stok-barang` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `stok-barang`;

-- membuang struktur untuk table stok-barang.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` enum('pcs','lb','btg') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel stok-barang.barang: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `jumlah`, `stok_awal`, `keterangan`, `satuan`, `created_at`, `updated_at`) VALUES
	(2, 'BRG0001', 'coba', 15, 10, '-', 'pcs', '2022-10-13 14:35:48', '2022-10-13 14:40:00');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- membuang struktur untuk table stok-barang.barang_keluar
CREATE TABLE IF NOT EXISTS `barang_keluar` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `buat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_keluar` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat_jalan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yg_mengeluarkan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel stok-barang.barang_keluar: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `barang_keluar` DISABLE KEYS */;
INSERT INTO `barang_keluar` (`id`, `buat`, `no_keluar`, `no_surat_jalan`, `yg_mengeluarkan`, `created_at`, `updated_at`) VALUES
	(5, 'buat apa', 'PO-0001', 'CLS-0001', 'imam', '2022-10-13 14:40:00', '2022-10-13 14:40:00');
/*!40000 ALTER TABLE `barang_keluar` ENABLE KEYS */;

-- membuang struktur untuk table stok-barang.barang_masuk
CREATE TABLE IF NOT EXISTS `barang_masuk` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_barang` bigint(20) NOT NULL,
  `id_supplier` bigint(20) NOT NULL,
  `satuan` enum('pcs','lb','btg') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `no_surat_jalan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_sebelumnya` int(11) NOT NULL,
  `total_stok` int(11) NOT NULL,
  `penerima` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel stok-barang.barang_masuk: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `barang_masuk` DISABLE KEYS */;
INSERT INTO `barang_masuk` (`id`, `id_barang`, `id_supplier`, `satuan`, `jumlah`, `no_surat_jalan`, `jumlah_sebelumnya`, `total_stok`, `penerima`, `created_at`, `updated_at`) VALUES
	(2, 2, 1, 'pcs', 12, 'COBA001', 10, 22, 'imam', '2022-10-13 14:37:49', '2022-10-13 14:37:49');
/*!40000 ALTER TABLE `barang_masuk` ENABLE KEYS */;

-- membuang struktur untuk table stok-barang.customer
CREATE TABLE IF NOT EXISTS `customer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomer_tlpn` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel stok-barang.customer: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`, `nama`, `alamat`, `nomer_tlpn`, `created_at`, `updated_at`) VALUES
	(1, 'PT. subuh eek', 'bekasi', '0238928932', '2022-10-09 01:51:22', '2022-10-09 01:51:22');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;

-- membuang struktur untuk table stok-barang.detail_barang_keluar
CREATE TABLE IF NOT EXISTS `detail_barang_keluar` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_barang_keluar` bigint(20) NOT NULL,
  `id_barang` bigint(20) NOT NULL,
  `satuan` enum('pcs','lb','btg') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sisa_stok` int(11) NOT NULL,
  `jumlah_sebelumnya` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel stok-barang.detail_barang_keluar: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `detail_barang_keluar` DISABLE KEYS */;
INSERT INTO `detail_barang_keluar` (`id`, `id_barang_keluar`, `id_barang`, `satuan`, `jumlah`, `sisa_stok`, `jumlah_sebelumnya`, `created_at`, `updated_at`) VALUES
	(5, 5, 2, 'pcs', 7, 15, 22, '2022-10-13 14:40:00', '2022-10-13 14:40:00');
/*!40000 ALTER TABLE `detail_barang_keluar` ENABLE KEYS */;

-- membuang struktur untuk table stok-barang.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel stok-barang.migrations: ~9 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(3, '2021_10_27_064750_create_supplier_table', 1),
	(4, '2021_10_27_065219_create_customer_table', 1),
	(5, '2021_10_27_065244_create_barang_keluar_table', 1),
	(6, '2021_10_27_065252_create_barang_masuk_table', 1),
	(7, '2021_10_27_065337_create_barang_table', 1),
	(8, '2021_11_06_170151_create_table_order', 1),
	(9, '2021_12_01_151952_create_detail_barang_keluar_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table stok-barang.personal_access_tokens
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

-- Membuang data untuk tabel stok-barang.personal_access_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- membuang struktur untuk table stok-barang.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomer_tlpn` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel stok-barang.supplier: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`id`, `nama`, `nomer_tlpn`, `alamat`, `created_at`, `updated_at`) VALUES
	(1, 'PT. subuh utama', '0238928932', 'bekasi', '2022-10-09 01:51:02', '2022-10-09 01:51:02');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

-- membuang struktur untuk table stok-barang.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','super-admin','gudang','sales') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `status_aktif` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel stok-barang.users: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `status_aktif`, `avatar`, `created_at`, `updated_at`) VALUES
	(1, 'superadmin', 'superadmin@gmail.com', '$2y$10$I1rJRR/A8Rrc6rBaQD90ruBYculvjQtVhErD0g5L0/yPt1Sqj2/dO', 'super-admin', 'aktif', 'assets/image/user/1665421729-Oct.png', '2022-10-09 01:50:27', '2022-10-11 00:08:49'),
	(2, 'admin', 'admin@gmail.com', '$2y$10$9ZmnN9P./cfEWTnHN4YfBe7/aVrDXsQ6aGkqA/IRw0rHQmp3HjlkC', 'admin', 'aktif', 'assets/image/user/1665725507-Oct.jpg', '2022-10-14 12:31:47', '2022-10-14 12:31:47');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
