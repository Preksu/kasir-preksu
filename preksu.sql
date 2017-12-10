-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 10 Des 2017 pada 10.17
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `preksu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `id_inventory` int(11) NOT NULL,
  `nama_inventory` varchar(20) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `bahan`, `harga`) VALUES
(1, 'ayam geprek original', 'a', 10000),
(2, 'ayam geprek spesial', '', 12000),
(3, 'ayam geprek susu', '', 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `tanggal_pesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_pesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `tanggal_pesanan`, `total_pesanan`) VALUES
(1, '2017-12-09 17:00:00', 27000),
(2, '2017-12-10 01:02:55', 27000),
(3, '2017-12-10 01:06:18', 54000),
(4, '2017-12-10 02:42:40', 42000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_menu`
--

CREATE TABLE `rincian_menu` (
  `id_rincian_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_inventory` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_pesanan`
--

CREATE TABLE `rincian_pesanan` (
  `id_rincian_pesanan` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `nama_menu` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `rincian_pesanan`
--

INSERT INTO `rincian_pesanan` (`id_rincian_pesanan`, `id_pesanan`, `nama_menu`, `harga`, `quantity`, `jumlah_harga`) VALUES
(1, 1, 'ayam geprek spesial', 12000, 1, 12000),
(2, 1, 'ayam geprek susu', 15000, 1, 15000),
(3, 2, 'ayam geprek spesial', 12000, 1, 12000),
(4, 2, 'ayam geprek susu', 15000, 1, 15000),
(5, 3, 'ayam geprek spesial', 12000, 2, 24000),
(6, 3, 'ayam geprek susu', 15000, 2, 30000),
(7, 4, 'ayam geprek original', 10000, 1, 10000),
(8, 4, 'ayam geprek original', 10000, 1, 10000),
(9, 4, 'ayam geprek original', 10000, 1, 10000),
(10, 4, 'ayam geprek spesial', 12000, 1, 12000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id_inventory`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `rincian_menu`
--
ALTER TABLE `rincian_menu`
  ADD PRIMARY KEY (`id_rincian_menu`);

--
-- Indexes for table `rincian_pesanan`
--
ALTER TABLE `rincian_pesanan`
  ADD PRIMARY KEY (`id_rincian_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id_inventory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rincian_menu`
--
ALTER TABLE `rincian_menu`
  MODIFY `id_rincian_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rincian_pesanan`
--
ALTER TABLE `rincian_pesanan`
  MODIFY `id_rincian_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
