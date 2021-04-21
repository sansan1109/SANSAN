-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Mar 2020 pada 02.00
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `butik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
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
  `status_profiling` varchar(15) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`kd_absen`, `id_user`, `kd_kota`, `id_device`, `no_gsm`, `metode`, `jenis_wp`, `nama_wp`, `alamat_wp`, `tgl_absen`, `kegiatan_absen`, `hasil_pengecekkan`, `catatan_absen`, `vendor`, `status`, `status_profiling`, `gambar`) VALUES
(57, 2019002, 999, '-', '-', '-', '-', '-', '-', '2019-08-02', 'Sakit', '-', '-', '-', '-', '-', '2019-08-02-Hasan_Fadillah.png'),
(58, 2019002, 1005, '12121', '5675678', 'Server', 'Wajib', 'IT Cinema XXI', 'Sarap', '2019-09-08', 'Pemasangan', 'Connect', 'cgvhbjnkm', 'Sharp', 'Solved', 'Belum', 'IT_Cinema_XXI.png'),
(59, 2019002, 1005, 'fcghbjn', '5675678', 'Server', 'hkjfhkjfh', 'Mul', 'Sarap', '2020-03-21', 'Pemasangan', 'Connect', 'OK BANGET', 'dshfkj', 'Solved', 'Belum', '0.png'),
(61, 2019002, 1005, '12121', '5675678', 'Server', 'Wajib', 'IT Cinema XXI', 'Sarap', '2020-03-03', 'Maintenance', 'Connect', '-', 'Sharp', 'Solved', 'Belum', '0.png'),
(64, 2019002, 1006, '12121', '5675678', 'Server', 'Wajib', 'IT Cinema XXI', 'Sarap', '2020-01-26', 'Maintenance', 'cvhbjk', '-', 'Sharp', 'Solved', 'Belum', '0.png'),
(65, 2019002, 1005, 'fcghbjn', '5675678', 'Server', 'hkjfhkjfh', 'Mul', 'Sarap', '2019-08-02', 'Maintenance', 'cvhbjk', '-', 'dshfkj', 'Solved', 'Belum', '0.png'),
(66, 2019002, 1005, '12121', '5675678', 'Server', 'Wajib', 'IT Cinema XXI', 'Sarap', '2019-08-31', 'Maintenance', 'Ok', '-', 'Sharp', 'Solved', 'Belum', '0.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(10) NOT NULL,
  `pengirim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `teks` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id_chat`, `pengirim`, `waktu`, `teks`) VALUES
(1, 'Hasan Fadillah', '2020-03-13 00:58:52', 'test'),
(2, 'Hasan Fadillah', '2020-03-13 01:00:18', 'haai '),
(3, 'Hasan Fadillah', '2020-03-13 14:59:47', 'heey');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daily`
--

CREATE TABLE `daily` (
  `kd_daily` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `tgl_daily` date NOT NULL,
  `nama_kota` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `aktivitas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ket_aktivitas` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE `kontak` (
  `no` int(10) NOT NULL,
  `nama_kontak` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nomor_kontak` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama_wp` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kota` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`no`, `nama_kontak`, `nomor_kontak`, `nama_wp`, `kota`) VALUES
(2, 'Yudhi', '089512734651', 'IT Mika Parking Pasar Modern BSD', 'Tanggerang Selatan'),
(3, 'Herman', '081326927021', 'IT Gold\'s Gym BXC', 'Tanggerang Selatan'),
(4, 'Yadi', '081808827606', 'IT Hotel Aviary BSD', 'Tanggerang Selatan'),
(5, 'Yanto', '08568369492', 'IT Parkir Ezitama', 'Random'),
(6, 'Raka', '081573906979', 'IT Ammerican Hamburger', 'Random'),
(7, 'Andre', '081806725972', 'Leader Chattime Pondok Melati', 'Bekasi Pondok Melati'),
(8, 'Bobby', '082229464234', 'Manager Anang Karaoke', 'Cilegon'),
(9, 'Dika', '08568090178', 'IT HollyCow Sektor 5 Bintaro Jaya', 'Tanggerang Selatan'),
(10, 'Sali', '087878830996', 'IT Mister Bakso', 'Cilegon'),
(11, 'Adnan', '082261662775', 'IT Shabu Hachi', 'Tanggerang Selatan'),
(12, 'Teguh', '081213058483', 'IT JCO', 'Bekasi'),
(13, 'Anwar', '081286992337', 'IT Cafe XXI', 'Random'),
(14, 'Rio Septian', '085714445878', 'IT Abuba', 'Bekasi'),
(15, 'Deddy', '085220240435', 'IT Karniv012', 'Bekasi Medan Satria'),
(16, 'Rahmat', '082240103168', 'IT Bakso Boedjangan ', 'Bekasi'),
(17, 'Lukman', '08569908838', 'IT Parkir Ezitama', 'Random'),
(18, 'Ibrahim', '08174957611', 'IT Dunkins Donut\'s', 'Random'),
(19, 'Andika', '085213244448', 'IT Secure Parking', 'Random'),
(20, 'Roy', '082122762076', 'IT KFC', 'Random'),
(21, 'Khairul', '087883341881', 'IT A&W', 'Random'),
(22, 'Anizar', '08972400570', 'IT Subaga', 'Random'),
(23, 'Hasan Fadillah', '08231114786', 'IT SUBAGA', 'Random'),
(24, 'Romanto', '082297361847', 'CPM Naga Pondok Melati', 'BEKASI'),
(25, 'Yoyo', '082112950801', 'IT Chattime', 'Random'),
(26, 'Jarwo', '08118169797', 'IT Baso A Fung', 'Random'),
(27, 'Adi', '081299216262', 'IT Cinema XXI', 'Random');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `kd_kota` int(10) NOT NULL,
  `nama_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`kd_kota`, `nama_kota`) VALUES
(999, 'sakit'),
(1005, 'Bekasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_user`
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
-- Dumping data untuk tabel `login_user`
--

INSERT INTO `login_user` (`id_user`, `nama_user`, `gender_user`, `email_user`, `hp_user`, `tgl_lahir_user`, `username_user`, `password_user`, `password_backup_user`) VALUES
(2019001, 'Administator', 'Laki-Laki', 'admin@gmail.com', '12313', '2019-08-15', 'administator', '0192023a7bbd73250516f069df18b500', 'Agomy6bWRuhd83U1q7Zv9pGs4cxntjBMFNlrVfIK'),
(2019002, 'Hasan Fadillah', 'Laki-Laki', 'hasan.tecnic@gmail.com', '082311147586', '1999-08-05', 'hasan', '25d55ad283aa400af464c76d713c07ad', '8Hm6b7poXg0r2FLOVA4kWNzGnETwDIChMcutRi15'),
(2019003, 'Nur Faizin', 'Laki-Laki', 'faizin@subaga.co.id', '085727022512', '1970-01-01', 'nfai', '25d55ad283aa400af464c76d713c07ad', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rembesan`
--

CREATE TABLE `rembesan` (
  `kd_r` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `excel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nominal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgl_input` date NOT NULL,
  `tgl_tf` date DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `rembesan`
--

INSERT INTO `rembesan` (`kd_r`, `id_user`, `excel`, `nominal`, `tgl_input`, `tgl_tf`, `gambar`, `status`) VALUES
(5, 2019002, '1583391682.xlsx', '250000', '2020-03-05', '2020-03-05', '1583403810.png', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`status`) VALUES
(1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`kd_absen`);

--
-- Indeks untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indeks untuk tabel `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`kd_daily`);

--
-- Indeks untuk tabel `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`kd_kota`);

--
-- Indeks untuk tabel `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `rembesan`
--
ALTER TABLE `rembesan`
  ADD PRIMARY KEY (`kd_r`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `kd_absen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `daily`
--
ALTER TABLE `daily`
  MODIFY `kd_daily` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kontak`
--
ALTER TABLE `kontak`
  MODIFY `no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `kd_kota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT untuk tabel `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2019005;

--
-- AUTO_INCREMENT untuk tabel `rembesan`
--
ALTER TABLE `rembesan`
  MODIFY `kd_r` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
