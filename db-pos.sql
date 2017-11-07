-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for resto-pos
CREATE DATABASE IF NOT EXISTS `resto-pos` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `resto-pos`;

-- Dumping structure for table resto-pos.barangs
CREATE TABLE IF NOT EXISTS `barangs` (
  `id_barang` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table resto-pos.barangs: ~3 rows (approximately)
/*!40000 ALTER TABLE `barangs` DISABLE KEYS */;
INSERT INTO `barangs` (`id_barang`, `kode_barang`, `nama_barang`, `ket`, `harga`, `id_kategori`, `id_rak`, `id_satuan`, `qty`, `created_at`, `updated_at`) VALUES
	(1, 'BRG-0001', 'Nasi Goreng', 'Menu Makanan 1', 13000, 1, 1, 1, 13, '2017-11-05 07:03:44', '2017-11-05 07:03:44'),
	(2, 'BRG-0002', 'Nasi Mawut', 'Menu Makanan 2', 13000, 1, 1, 1, 13, '2017-11-05 07:03:44', '2017-11-05 07:03:44'),
	(3, 'BRG-0003', 'Nasi Sop', 'Menu Makanan 3', 13000, 1, 1, 1, 13, '2017-11-05 07:03:44', '2017-11-05 07:03:44');
/*!40000 ALTER TABLE `barangs` ENABLE KEYS */;

-- Dumping structure for table resto-pos.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table resto-pos.migrations: ~4 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2014_10_12_000000_create_users_table', 1),
	(6, '2014_10_12_100000_create_password_resets_table', 1),
	(7, '2017_11_04_235850_create_barangs_table', 1),
	(8, '2017_11_05_053538_create_transaksis_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table resto-pos.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table resto-pos.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table resto-pos.transaksis
CREATE TABLE IF NOT EXISTS `transaksis` (
  `id_transaksi` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_type_bayar` int(11) NOT NULL,
  `diskon_persen` int(11) DEFAULT NULL,
  `diskon_rupiah` int(11) DEFAULT NULL,
  `diskon_belanja` int(11) DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table resto-pos.transaksis: ~2 rows (approximately)
/*!40000 ALTER TABLE `transaksis` DISABLE KEYS */;
INSERT INTO `transaksis` (`id_transaksi`, `invoice`, `id_pelanggan`, `id_type_bayar`, `diskon_persen`, `diskon_rupiah`, `diskon_belanja`, `jumlah_bayar`, `keterangan`, `status`, `id_karyawan`, `created_at`, `updated_at`) VALUES
	(5, 'INVO-0001', 1, 1, NULL, NULL, NULL, NULL, NULL, 'pending', 2, '2017-11-06 13:49:53', '2017-11-06 13:49:53'),
	(6, 'INVO-0002', 1, 1, NULL, NULL, NULL, NULL, NULL, 'pending', 2, '2017-11-06 14:12:48', '2017-11-06 14:12:48');
/*!40000 ALTER TABLE `transaksis` ENABLE KEYS */;

-- Dumping structure for table resto-pos.transaksis_detail
CREATE TABLE IF NOT EXISTS `transaksis_detail` (
  `id_transaksi_detail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `qty_jual` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `diskon_jual` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_transaksi_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table resto-pos.transaksis_detail: ~2 rows (approximately)
/*!40000 ALTER TABLE `transaksis_detail` DISABLE KEYS */;
INSERT INTO `transaksis_detail` (`id_transaksi_detail`, `id_transaksi`, `id_barang`, `qty_jual`, `id_satuan`, `diskon_jual`, `harga_jual`, `created_at`, `updated_at`) VALUES
	(1, 5, 1, 1, 2, 0, 13000, '2017-11-06 13:49:53', '2017-11-06 13:49:53'),
	(2, 6, 2, 2, 2, 0, 13000, '2017-11-06 14:12:48', '2017-11-06 14:12:48');
/*!40000 ALTER TABLE `transaksis_detail` ENABLE KEYS */;

-- Dumping structure for table resto-pos.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table resto-pos.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
