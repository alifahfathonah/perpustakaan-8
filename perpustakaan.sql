-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 04:20 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(5) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `nama_penerbit` varchar(30) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `tahun_penerbit` varchar(10) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `jml_buku` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_denda`
--

CREATE TABLE `tbl_denda` (
  `id_denda` int(5) NOT NULL,
  `jml_denda` int(20) NOT NULL,
  `status_denda` int(2) NOT NULL,
  `id_peminjaman` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(5) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `no_induk` int(12) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `agama_karyawan` varchar(20) NOT NULL,
  `alamat_karyawan` varchar(50) NOT NULL,
  `jk_karyawan` varchar(10) NOT NULL,
  `hp_karyawan` int(12) NOT NULL,
  `email_karyawan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kehilangan`
--

CREATE TABLE `tbl_kehilangan` (
  `id_kehilangan` int(5) NOT NULL,
  `status_fc` int(2) NOT NULL,
  `tgl_hilang` date NOT NULL,
  `tgl_fc` date NOT NULL,
  `masa_berlaku` int(5) NOT NULL,
  `id_peminjaman` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kunjungan`
--

CREATE TABLE `tbl_kunjungan` (
  `id_kunjungan` int(5) NOT NULL,
  `tgl_kunjungan` date NOT NULL,
  `no_induk` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id_level` int(5) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjaman` int(5) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `no_induk` int(12) NOT NULL,
  `status_buku` int(2) NOT NULL,
  `id_buku` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(5) NOT NULL,
  `no_induk` int(12) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `kelas_siswa` varchar(10) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `agama_siswa` varchar(20) NOT NULL,
  `alamat_siswa` varchar(50) NOT NULL,
  `jk_siswa` varchar(10) NOT NULL,
  `hp_siswa` int(12) NOT NULL,
  `email_siswa` varchar(30) NOT NULL,
  `tahun_masuk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(5) NOT NULL,
  `no_induk` int(12) NOT NULL,
  `password` varchar(10) NOT NULL,
  `id_level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD PRIMARY KEY (`id_denda`),
  ADD KEY `fk_denda_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_kehilangan`
--
ALTER TABLE `tbl_kehilangan`
  ADD PRIMARY KEY (`id_kehilangan`),
  ADD KEY `fk_kehilangan_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `fk_peminjaman_buku` (`id_buku`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id_denda` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kehilangan`
--
ALTER TABLE `tbl_kehilangan`
  MODIFY `id_kehilangan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  MODIFY `id_kunjungan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id_level` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjaman` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD CONSTRAINT `fk_denda_peminjaman` FOREIGN KEY (`id_peminjaman`) REFERENCES `tbl_denda` (`id_denda`);

--
-- Constraints for table `tbl_kehilangan`
--
ALTER TABLE `tbl_kehilangan`
  ADD CONSTRAINT `fk_kehilangan_peminjaman` FOREIGN KEY (`id_peminjaman`) REFERENCES `tbl_peminjaman` (`id_peminjaman`);

--
-- Constraints for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD CONSTRAINT `fk_peminjaman_buku` FOREIGN KEY (`id_buku`) REFERENCES `tbl_buku` (`id_buku`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_user_level` FOREIGN KEY (`id_level`) REFERENCES `tbl_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
