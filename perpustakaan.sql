-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.33-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table perpustakaan.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perpustakaan.migrations: ~2 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perpustakaan.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_anggota
CREATE TABLE IF NOT EXISTS `tb_anggota` (
  `kd_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `no_anggota` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tempat` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` int(1) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `telp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `foto` text,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_anggota`),
  UNIQUE KEY `no_anggota` (`no_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table perpustakaan.tb_anggota: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_anggota` DISABLE KEYS */;
INSERT INTO `tb_anggota` (`kd_anggota`, `no_anggota`, `nama`, `tempat`, `tgl_lahir`, `jk`, `alamat`, `kota`, `telp`, `email`, `user_name`, `user_password`, `foto`, `status`) VALUES
	(6, 'A0006012019', 'Shina', 'Tokyo', '1986-08-06', 2, 'Tokyo', 'Tokyo', '076134123', 'Shina@a.com', 'shina', 'a87ff679a2f3e71d9181a67b7542122c', '01-2019-01-2019-th (1).jpg', '1'),
	(7, 'A0007012019', 'boboiboy angin', 'malay', '1995-07-12', 1, 'johor', 'johor', '007', 'contoh@example.com', 'bobo', '202cb962ac59075b964b07152d234b70', NULL, '1'),
	(8, 'A0008012019', 'fas', 'asdasd', '1989-02-07', 1, 'das', 'asd', '24523', 'adsw@a.com', 'asd', '7815696ecbf1c96e6894b779456d330e', NULL, '1');
/*!40000 ALTER TABLE `tb_anggota` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_buku
CREATE TABLE IF NOT EXISTS `tb_buku` (
  `kd_buku` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL DEFAULT '0',
  `kd_pengarang` int(11) NOT NULL DEFAULT '0',
  `kd_penerbit` int(11) NOT NULL DEFAULT '0',
  `tempat_terbit` varchar(50) NOT NULL DEFAULT '0',
  `tahun_terbit` varchar(50) NOT NULL DEFAULT '0',
  `kd_kategori` int(11) NOT NULL DEFAULT '0',
  `halaman` varchar(50) NOT NULL DEFAULT '0',
  `edisi` varchar(50) NOT NULL DEFAULT '0',
  `ISBN` varchar(50) NOT NULL DEFAULT '0',
  `cover` longtext,
  PRIMARY KEY (`kd_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table perpustakaan.tb_buku: ~4 rows (approximately)
/*!40000 ALTER TABLE `tb_buku` DISABLE KEYS */;
INSERT INTO `tb_buku` (`kd_buku`, `judul`, `kd_pengarang`, `kd_penerbit`, `tempat_terbit`, `tahun_terbit`, `kd_kategori`, `halaman`, `edisi`, `ISBN`, `cover`) VALUES
	(1, 'Kimi No Nawa', 1, 1, 'Tokyo', '2016', 9, '216', '1', '9786028519939', '01-2019-Your_Name_poster.png'),
	(3, 'strix', 1, 1, 'taiwan', '2016', 2, '200', '2', '097541512166415', '01-2019-static (1).png'),
	(6, 'ML', 3, 1, 'Hongkong', '2009', 9, '50', '2', '9786028519111', NULL),
	(7, 'The Story Of Sakura', 4, 1, 'akihabara', '2015', 9, '100', '1', '11111111111111111111', '01-2019-picture.jpg');
/*!40000 ALTER TABLE `tb_buku` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_hextris
CREATE TABLE IF NOT EXISTS `tb_hextris` (
  `kd_game` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_main` date DEFAULT NULL,
  `score` char(20) DEFAULT NULL,
  PRIMARY KEY (`kd_game`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table perpustakaan.tb_hextris: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_hextris` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_hextris` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_kategori
CREATE TABLE IF NOT EXISTS `tb_kategori` (
  `kd_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT '0',
  `singkatan` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`kd_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table perpustakaan.tb_kategori: ~2 rows (approximately)
/*!40000 ALTER TABLE `tb_kategori` DISABLE KEYS */;
INSERT INTO `tb_kategori` (`kd_kategori`, `nama_kategori`, `singkatan`) VALUES
	(1, 'Tanaman atau Peternakan', 'TNM'),
	(2, 'Teknologi', 'TEK');
/*!40000 ALTER TABLE `tb_kategori` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_koleksi_buku
CREATE TABLE IF NOT EXISTS `tb_koleksi_buku` (
  `kd_koleksi` int(11) NOT NULL AUTO_INCREMENT,
  `no_induk_buku` varchar(50) NOT NULL,
  `kd_buku` int(11) DEFAULT NULL,
  `kd_user` int(11) DEFAULT NULL,
  `tgl_pengadaan` date DEFAULT NULL,
  `akses` varchar(50) DEFAULT NULL,
  `kd_rak` int(11) DEFAULT NULL,
  `sumber` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_koleksi`),
  UNIQUE KEY `no_induk_buku` (`no_induk_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table perpustakaan.tb_koleksi_buku: ~6 rows (approximately)
/*!40000 ALTER TABLE `tb_koleksi_buku` DISABLE KEYS */;
INSERT INTO `tb_koleksi_buku` (`kd_koleksi`, `no_induk_buku`, `kd_buku`, `kd_user`, `tgl_pengadaan`, `akses`, `kd_rak`, `sumber`, `status`) VALUES
	(1, 'B-0007-ANIM-000001', 7, 1, '2019-01-02', 'Boleh Dipinjam', 1, 'Lelang', 0),
	(2, 'B-0007-ANIM-000002', 7, 1, '2019-01-02', 'Boleh Dipinjam', 1, 'Lelang', 0),
	(3, 'B-0007-ANIM-000003', 7, 1, '2019-01-02', 'Boleh Dipinjam', 1, 'Lelang', 0),
	(4, 'B-0007-ANIM-000004', 7, 1, '2019-01-02', 'Boleh Dipinjam', 1, 'Lelang', 0),
	(5, 'B-0007-ANIM-000005', 7, 1, '2019-01-02', 'Boleh Dipinjam', 1, 'Lelang', 1),
	(6, 'B-0006--000006', 6, 1, '2019-01-10', 'Boleh Dipinjam', 1, 'Pembelian', 1);
/*!40000 ALTER TABLE `tb_koleksi_buku` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_peminjaman
CREATE TABLE IF NOT EXISTS `tb_peminjaman` (
  `kd_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `no_pinjam` varchar(50) DEFAULT '0',
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `no_induk_buku` varchar(50) DEFAULT '0',
  `no_anggota` varchar(50) DEFAULT '0',
  `denda` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`kd_pinjam`),
  KEY `no_pinjam` (`no_pinjam`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table perpustakaan.tb_peminjaman: ~10 rows (approximately)
/*!40000 ALTER TABLE `tb_peminjaman` DISABLE KEYS */;
INSERT INTO `tb_peminjaman` (`kd_pinjam`, `no_pinjam`, `tgl_pinjam`, `tgl_kembali`, `no_induk_buku`, `no_anggota`, `denda`, `status`) VALUES
	(2, 'P000002', '2019-01-29', '2019-02-01', 'B-0007-ANIM-000001', 'A0006012019', 0, 1),
	(3, 'P000003', '2019-01-29', '2019-02-01', 'B-0006--000006', 'A0006012019', 4000, 1),
	(4, 'P000004', '2019-02-07', '2019-02-04', 'B-0007-ANIM-000001', 'A0007012019', 6000, 1),
	(6, 'P000006', '2019-02-07', '2019-02-10', 'B-0007-ANIM-000002', 'A0007012019', 4000, 1),
	(9, 'P000008', '2019-02-07', '2019-02-10', 'B-0007-ANIM-000004', 'A0007012019', 4000, 1),
	(10, 'P000010', '2019-02-07', '2019-02-10', 'B-0007-ANIM-000001', 'A0006012019', 4000, 1),
	(12, 'P000012', '2019-02-07', '2019-02-10', 'B-0007-ANIM-000001', 'A0006012019', 4000, 1),
	(13, 'P000012', '2019-02-07', '2019-02-10', 'B-0007-ANIM-000002', 'A0006012019', 4000, 1),
	(14, 'P000014', '2019-02-07', '2019-02-10', 'B-0006--000006', 'A0006012019', 0, 0),
	(15, 'P000014', '2019-02-07', '2019-02-10', 'B-0007-ANIM-000005', 'A0006012019', 0, 0);
/*!40000 ALTER TABLE `tb_peminjaman` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_penerbit
CREATE TABLE IF NOT EXISTS `tb_penerbit` (
  `kd_penerbit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penerbit` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_penerbit`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table perpustakaan.tb_penerbit: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_penerbit` DISABLE KEYS */;
INSERT INTO `tb_penerbit` (`kd_penerbit`, `nama_penerbit`) VALUES
	(1, 'Erlangga SS');
/*!40000 ALTER TABLE `tb_penerbit` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_pengarang
CREATE TABLE IF NOT EXISTS `tb_pengarang` (
  `kd_pengarang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengarang` varchar(50) DEFAULT '0',
  PRIMARY KEY (`kd_pengarang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table perpustakaan.tb_pengarang: ~3 rows (approximately)
/*!40000 ALTER TABLE `tb_pengarang` DISABLE KEYS */;
INSERT INTO `tb_pengarang` (`kd_pengarang`, `nama_pengarang`) VALUES
	(1, 'Makoto Shinkai'),
	(3, 'Shinosuke'),
	(4, 'Kana Akatsuki');
/*!40000 ALTER TABLE `tb_pengarang` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_rak
CREATE TABLE IF NOT EXISTS `tb_rak` (
  `kd_rak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kd_rak`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table perpustakaan.tb_rak: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_rak` DISABLE KEYS */;
INSERT INTO `tb_rak` (`kd_rak`, `nama_rak`) VALUES
	(1, 'A-1');
/*!40000 ALTER TABLE `tb_rak` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `kd_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `avatar` longtext NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`kd_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table perpustakaan.tb_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;

-- Dumping structure for table perpustakaan.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` longtext COLLATE utf8mb4_unicode_ci,
  `level` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table perpustakaan.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `alamat`, `telp`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `avatar`, `level`) VALUES
	(1, 'example', NULL, NULL, 'a@a.com', NULL, '$2y$10$HtjDhL.zcuMHW8aP4JdM/OQZrdpsrFbtZ4FxDDsxqYwTpXClV5n5C', '2d5XiO9mlTpXko3F7jRjU1u1plQ0lUpgr3A4Nl27vlMH23uDMj7R7CmjIWkr', '2019-02-07 11:53:33', '2019-02-07 11:53:33', NULL, 1),
	(3, 'mokuton', NULL, NULL, 'hokage@a.com', NULL, '$2y$10$B4K8Fx.W/TlUX.dtRcORR.4izkATnLi9r39u2lagZ7kXp3qDe0216', 'q9GqbIYt5iUyRWwkGaEHcqBl7QfyyEKzna5wGDkaXX8IG4xAZ3QpkxoVKQtt', '2019-02-11 03:25:57', '2019-02-11 03:25:57', NULL, 1),
	(4, 'Hokage', 'jalan ninjaku', '0811111111', 'admin@a.com', NULL, '$2y$10$3fQxe3EIYeOjz7fov/hziOF3kp6YOmvV0lXojYHzps0X7QCkMcb8y', 'YuRurGrOVdnxNTftWjSitIHJJI2lRwVK7saCauOPhpxr8UxeMW1vFehboC5h', '2019-02-11 03:43:49', '2019-02-11 03:43:49', NULL, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
