-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2019 at 01:30 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `kd_absen` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `kd_kota` int(10) NOT NULL,
  `id_device` varchar(10) NOT NULL,
  `no_gsm` varchar(20) NOT NULL,
  `metode` varchar(20) NOT NULL,
  `jenis_wp` varchar(30) NOT NULL,
  `nama_wp` varchar(50) NOT NULL,
  `alamat_wp` varchar(100) NOT NULL,
  `tgl_absen` date NOT NULL,
  `kegiatan_absen` varchar(15) NOT NULL,
  `hasil_pengecekkan` varchar(225) NOT NULL,
  `catatan_absen` varchar(255) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `status` varchar(8) NOT NULL,
  `status_profiling` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`kd_absen`, `id_user`, `kd_kota`, `id_device`, `no_gsm`, `metode`, `jenis_wp`, `nama_wp`, `alamat_wp`, `tgl_absen`, `kegiatan_absen`, `hasil_pengecekkan`, `catatan_absen`, `vendor`, `status`, `status_profiling`) VALUES
(5, 2019001, 1, 'tanpa date', '', '', '', 'tanpa date', 'test', '2019-08-14', 'Maintenance', '', 'tanpa date', '', 'Pending', ''),
(6, 2019001, 2, 'AMB00001', '', '', '', 'TEST AMBON', 'PCI', '2019-08-14', 'Pemasangan', '', 'MASIH NUNGGU YG GAK PASTI', '', 'Solved', ''),
(8, 2019001, 1, 'kepo', '', '', '', 'kepo', 'kpo', '2019-08-21', 'Maintenance', '', 'kepo', '', 'Pending', ''),
(10, 2019001, 1, 'AMB0001', '012301230', 'Server', 'Hiburan', 'Hiburan', 'alamaat', '2019-08-21', 'Pemasangan', 'connect', '', 'Sharp', 'Pending', 'Belum'),
(12, 2019001, 1, 'TEST', '0', 'Server', 'Hiburan', 'ABABA', 'ABABA', '2019-08-22', 'Pemasangan', 'Conect', '', 'Sarap', 'Solved', 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `kd_kota` int(10) NOT NULL,
  `nama_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`kd_kota`, `nama_kota`) VALUES
(1, 'ambon'),
(2, 'bandung'),
(3, 'bogor'),
(4, 'cirebon'),
(5, 'deli serdang'),
(6, 'garut'),
(7, 'medan'),
(8, 'tasikmalaya'),
(9, 'pemakasan'),
(10, 'jember'),
(11, 'jombang'),
(12, 'mojokerto'),
(13, 'malang'),
(14, 'batu'),
(15, 'bekasi'),
(16, 'tanggerang kota'),
(17, 'medan'),
(18, 'ternate'),
(19, 'tanggerang selatan'),
(20, 'cilegon'),
(21, 'kabupaten tanggerang'),
(22, 'tulung agung'),
(23, 'tuban'),
(24, 'tanjung balai'),
(25, 'gorontalo'),
(26, 'tojo una una'),
(999, 'sakit');

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id_user` int(10) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `gender_user` varchar(15) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `hp_user` varchar(15) NOT NULL,
  `tgl_lahir_user` date NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `password_backup_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`id_user`, `nama_user`, `gender_user`, `email_user`, `hp_user`, `tgl_lahir_user`, `username_user`, `password_user`, `password_backup_user`) VALUES
(2019001, 'Hasan Fadillah', 'Laki-Laki', 'hasan.tecnic@gmail.com', '12313', '2019-08-15', 'admin1', '0192023a7bbd73250516f069df18b500', '');

-- --------------------------------------------------------

--
-- Table structure for table `poto`
--

CREATE TABLE `poto` (
  `kd_poto` int(10) NOT NULL,
  `kd_absen` int(10) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`kd_absen`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kd_kota`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `poto`
--
ALTER TABLE `poto`
  ADD PRIMARY KEY (`kd_poto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `kd_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `kd_kota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2019002;

--
-- AUTO_INCREMENT for table `poto`
--
ALTER TABLE `poto`
  MODIFY `kd_poto` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
