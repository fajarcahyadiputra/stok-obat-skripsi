-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2021 pada 05.23
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stok-barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumblah` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` enum('pcs','lb','btg') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stok_awal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `jumblah`, `keterangan`, `satuan`, `created_at`, `updated_at`, `stok_awal`) VALUES
(1, 'BRG0001', 'Akrilik Bening', 120, 'CLS-0001', 'lb', '2021-11-12 12:49:12', '2021-12-01 13:54:39', 20),
(3, 'BRG0003', 'End Cap', 10661, 'CLS-0003', 'btg', '2021-11-13 12:27:47', '2021-12-01 13:55:21', 10641),
(10, 'BRG0004', 'Joint HJ-1', 3470, 'CLS-0004', 'pcs', '2021-11-16 02:56:30', '2021-12-01 13:55:51', 3450),
(11, 'BRG0005', 'Joint HJ-2', 9559, 'CLS-0005', 'pcs', '2021-11-16 02:57:05', '2021-12-01 13:56:27', 9683),
(12, 'BRG0006', 'Joint HJ-4', 2310, 'CLS-0006', 'pcs', '2021-11-16 02:57:29', '2021-12-02 03:41:22', 2300),
(13, 'BRG0007', 'Joint HJ-7', 665, 'CLS-0007', 'pcs', '2021-11-16 02:58:09', '2021-12-01 13:47:10', 850),
(14, 'BRG0008', 'Pipa I-Lite', 100, 'CLS-0008', 'btg', '2021-11-16 02:59:32', '2021-12-01 17:31:24', 180),
(15, 'BRG0009', 'Pipa Ivory', 33, 'CLS-0009', 'btg', '2021-11-16 03:01:46', '2021-12-01 12:57:17', 45),
(16, 'BRG0010', 'Placon Mount A', 30, 'CLS-0010', 'btg', '2021-11-16 03:02:49', '2021-12-01 12:56:34', 70),
(17, 'BRG0011', 'Placon Mount B', 95, 'CLS-0011', 'btg', '2021-11-16 03:03:23', '2021-12-02 03:41:22', 135),
(18, 'BRG0012', 'PVC End Cap', 2118, 'CLS-0012', 'pcs', '2021-11-16 03:04:43', '2021-12-02 03:41:22', 2140),
(28, 'BRG0013', 'Plastik', 234, 'CLS-123', 'pcs', '2021-11-23 03:26:34', '2021-12-01 13:47:10', 250),
(32, 'BRG0002', 'Akrilik Hijau', 294, 'CLS-002', 'lb', '2021-12-01 13:53:22', '2021-12-01 17:31:23', 104),
(33, 'BRG0014', 'coba', 50, '-', 'btg', '2021-12-02 03:44:01', '2021-12-02 03:45:03', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` int(11) NOT NULL,
  `no_po` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_surat_jalan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yg_mengeluarkan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `id_customer`, `no_po`, `no_surat_jalan`, `yg_mengeluarkan`, `created_at`, `updated_at`) VALUES
(15, 1, 'PO-0002', 'CLS-0002', 'imam', '2021-12-01 12:56:34', '2021-12-01 12:56:34'),
(16, 1, 'PO-0003', 'CLS-0003', 'imam', '2021-12-01 12:57:17', '2021-12-01 12:57:17'),
(27, 1, 'PO-0004', 'CLS-0004', 'imam', '2021-12-01 13:42:00', '2021-12-01 13:42:00'),
(28, 1, 'PO-0005', 'CLS-0005', 'imam', '2021-12-01 13:47:10', '2021-12-01 13:47:10'),
(29, 1, 'PO-0006', 'CLS-0006', 'imam', '2021-12-01 17:31:23', '2021-12-01 17:31:23'),
(30, 1, 'PO-0007', 'CLS-0007', 'imam', '2021-12-02 03:41:22', '2021-12-02 03:41:22'),
(31, 1, 'PO-0008', 'CLS-0008', 'imam', '2021-12-02 03:45:03', '2021-12-02 03:45:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `satuan` enum('pcs','lb','btg') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumblah` int(11) NOT NULL,
  `no_surat_jalan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerima` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jumblah_sebelumnya` int(11) NOT NULL,
  `total_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `id_barang`, `id_supplier`, `satuan`, `jumblah`, `no_surat_jalan`, `penerima`, `created_at`, `updated_at`, `jumblah_sebelumnya`, `total_stok`) VALUES
(23, 1, 1, 'lb', 100, 'SJ-001', 'imam', '2021-12-01 13:54:39', '2021-12-01 13:54:39', 20, 120),
(24, 3, 2, 'btg', 20, 'SJ-002', 'imam', '2021-12-01 13:55:21', '2021-12-01 13:55:21', 10641, 10661),
(25, 10, 3, 'pcs', 20, 'SJ-003', 'imam', '2021-12-01 13:55:51', '2021-12-01 13:55:51', 3450, 3470),
(26, 11, 3, 'pcs', 20, 'SJ-004', 'imam', '2021-12-01 13:56:27', '2021-12-01 13:56:27', 9539, 9559),
(27, 12, 3, 'pcs', 20, 'SJ-005', 'imam', '2021-12-01 13:56:58', '2021-12-01 13:56:58', 2300, 2320),
(28, 32, 1, 'lb', 200, 'SJ-006', 'imam', '2021-12-01 17:28:12', '2021-12-01 17:28:12', 104, 304),
(29, 17, 3, 'btg', 40, 'SJ-007', 'imam', '2021-12-01 17:29:19', '2021-12-01 17:29:19', 75, 115),
(30, 14, 2, 'btg', 20, 'SJ-008', 'imam', '2021-12-01 17:30:23', '2021-12-01 17:30:23', 180, 200),
(31, 33, 1, 'btg', 100, 'SJ-0010', 'imam', '2021-12-02 03:44:31', '2021-12-02 03:44:31', 50, 150);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomer_tlpn` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alamat`, `nomer_tlpn`, `created_at`, `updated_at`) VALUES
(1, 'PT. ARAI INDONESIA MANUFACTURING', 'Jl. Mitra Selatan VI, Parungmulya, Kec. Caimpel, Kabupaten Karawang , Jawa Barat 41363', '-', '2021-11-12 12:53:11', '2021-11-13 12:46:45'),
(2, 'PT. SUMI INDO WIRING SYSTEM PLANT 2', 'Kawasan Kota Bukit Indah, Jl Bukit Damar II, Dangdeur, Kec. Bungursari, Kabupaten Purwakarta, Jawa Barat 41181', '-', '2021-11-13 12:49:57', '2021-11-13 12:49:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_barang_keluar`
--

CREATE TABLE `detail_barang_keluar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_barang_keluar` bigint(12) NOT NULL,
  `id_barang` bigint(12) NOT NULL,
  `satuan` enum('pcs','lb','btg') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumblah` int(11) NOT NULL,
  `sisa_stok` int(11) NOT NULL,
  `jumblah_sebelumnya` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_barang_keluar`
--

INSERT INTO `detail_barang_keluar` (`id`, `id_barang_keluar`, `id_barang`, `satuan`, `jumblah`, `sisa_stok`, `jumblah_sebelumnya`, `created_at`, `updated_at`) VALUES
(9, 15, 16, 'pcs', 40, 30, 70, '2021-12-01 12:56:34', '2021-12-01 12:56:34'),
(10, 15, 28, 'pcs', 12, 238, 250, '2021-12-01 12:56:34', '2021-12-01 12:56:34'),
(11, 16, 11, 'pcs', 12, 9651, 9663, '2021-12-01 12:57:17', '2021-12-01 12:57:17'),
(12, 16, 15, 'pcs', 12, 33, 45, '2021-12-01 12:57:17', '2021-12-01 12:57:17'),
(23, 27, 11, 'pcs', 12, 9639, 9651, '2021-12-01 13:42:00', '2021-12-01 13:42:00'),
(24, 27, 28, 'pcs', 2, 236, 238, '2021-12-01 13:42:00', '2021-12-01 13:42:00'),
(25, 28, 13, 'pcs', 100, 665, 765, '2021-12-01 13:47:10', '2021-12-01 13:47:10'),
(26, 28, 11, 'pcs', 100, 9539, 9639, '2021-12-01 13:47:10', '2021-12-01 13:47:10'),
(27, 28, 18, 'pcs', 12, 2128, 2140, '2021-12-01 13:47:10', '2021-12-01 13:47:10'),
(28, 28, 28, 'pcs', 2, 234, 236, '2021-12-01 13:47:10', '2021-12-01 13:47:10'),
(29, 29, 17, 'pcs', 10, 105, 115, '2021-12-01 17:31:23', '2021-12-01 17:31:23'),
(30, 29, 32, 'pcs', 10, 294, 304, '2021-12-01 17:31:23', '2021-12-01 17:31:23'),
(31, 29, 14, 'pcs', 100, 100, 200, '2021-12-01 17:31:24', '2021-12-01 17:31:24'),
(32, 30, 17, 'pcs', 10, 95, 105, '2021-12-02 03:41:22', '2021-12-02 03:41:22'),
(33, 30, 18, 'pcs', 10, 2118, 2128, '2021-12-02 03:41:22', '2021-12-02 03:41:22'),
(34, 30, 12, 'pcs', 10, 2310, 2320, '2021-12-02 03:41:22', '2021-12-02 03:41:22'),
(35, 31, 33, 'btg', 100, 50, 150, '2021-12-02 03:45:03', '2021-12-02 03:45:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_10_27_064750_create_supplier_table', 1),
(4, '2021_10_27_065219_create_customer_table', 1),
(5, '2021_10_27_065244_create_barang_keluar_table', 1),
(6, '2021_10_27_065252_create_barang_masuk_table', 1),
(7, '2021_10_27_065337_create_barang_table', 1),
(8, '2021_11_06_170151_create_table_order', 1),
(10, '2021_12_01_151952_create_detail_barang_keluar_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_barang`
--

CREATE TABLE `order_barang` (
  `id` bigint(20) NOT NULL,
  `invoice` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_barang` bigint(20) NOT NULL,
  `id_customer` bigint(20) NOT NULL,
  `jumblah` int(11) NOT NULL,
  `status` enum('stok-tersedia','stok-kosong','pending','close') COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_barang`
--

INSERT INTO `order_barang` (`id`, `invoice`, `id_barang`, `id_customer`, `jumblah`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'INV0001', 17, 1, 50, 'close', 'order close', '2021-12-02 02:19:43', '2021-12-02 07:47:42'),
(2, 'INV0002', 15, 1, 80, 'stok-kosong', 'stok kosong', '2021-12-02 03:50:46', '2021-12-02 03:51:53'),
(3, 'INV0003', 18, 1, 40, 'stok-kosong', 'stok kosong', '2021-12-02 04:05:47', '2021-12-02 04:08:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomer_tlpn` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `nomer_tlpn`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'PT. INFINITI GLOBAL ASIA', '-', 'Blok B2, Ruko Demansion, RT.001/014. Kunciran, Pinang, Tangerang City, Banten 15144', '2021-11-12 12:52:22', '2021-11-13 12:39:11'),
(2, 'PT. INFINITIGROUP', '-', 'Jl. Angsana 3, Blok AE No 31-32, Delta Silicon, Cikarang, Bekasi Jawa Barat 17530', '2021-11-16 03:13:49', '2021-11-16 03:13:49'),
(3, 'PT. INFINITI NUANSA INTERNATIONAL', '-', 'Kawasan Industri  Tunas 2 Blok 6C Batam  Centre Indonesia, Batam, Riau, Indonesia 2943', '2021-11-16 03:16:20', '2021-11-16 03:16:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','super-admin','gudang','sales','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status_aktif` enum('aktif','tidak') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'aktif',
  `avatar` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `status_aktif`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Nurokta', 'Nurokta543@gmail.com', '$2y$10$4vqB39YZlWZioVF9V4bcAO/bPkuQOdpRGHb4TTCFKMT2RHQaq4qG2', 'super-admin', 'aktif', 'assets/image/user/1636896416-Nov.jpg', '2021-11-09 13:10:32', '2021-11-14 13:26:56'),
(3, 'gudang', 'gudang@gmail.com', '$2y$10$3mgyoGT9KTdXEhkqWtgyEuF8LQTmUuaI/W92R6zgv4wClrjrlNrWW', 'gudang', 'aktif', 'assets/image/user/1638411468-Dec.png', '2021-12-02 02:17:48', '2021-12-02 04:06:33'),
(4, 'sales', 'sales@gmail.com', '$2y$10$WLdBn3KVKBcYsHZANXRFZO6vMXevwHjnanQo93aqqmQDzJpgLx9Me', 'sales', 'aktif', 'assets/image/user/1638411536-Dec.png', '2021-12-02 02:18:56', '2021-12-02 02:18:56'),
(5, 'admin', 'admin@gmail.com', '$2y$10$HNh5KF7CFRzF8MmM.U6UuOp2YRV7bX3qIJmCDRYFcJ8sGy93gTHzi', 'admin', 'aktif', 'assets/image/user/1638417307-Dec.jpg', '2021-12-02 03:55:07', '2021-12-02 03:55:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_barang_keluar`
--
ALTER TABLE `detail_barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_barang`
--
ALTER TABLE `order_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_barang_keluar`
--
ALTER TABLE `detail_barang_keluar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `order_barang`
--
ALTER TABLE `order_barang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
