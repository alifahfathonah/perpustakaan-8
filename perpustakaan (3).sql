-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 06:19 PM
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
  `tahun_terbit` varchar(10) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `jml_buku` int(5) NOT NULL,
  `sisa_buku` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `judul`, `nama_penerbit`, `pengarang`, `tahun_terbit`, `gambar`, `jml_buku`, `sisa_buku`) VALUES
(14, 'PKN', 'erlangga', 'desi', '2016', '../galeri/markijar.com - teknik informatika.png', 21, 1),
(15, 'contoh', 'matahari bertemu bulan', 'ngasal', '2022', '../galeri/markijar.com - teknik informatika.png', 21, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dendaa`
--

CREATE TABLE `tbl_dendaa` (
  `id_denda` int(5) NOT NULL,
  `jml_denda` int(20) NOT NULL,
  `status_denda` int(2) NOT NULL,
  `id_pinjam` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dendaa`
--

INSERT INTO `tbl_dendaa` (`id_denda`, `jml_denda`, `status_denda`, `id_pinjam`) VALUES
(3, 50000, 0, 1),
(4, 4000, 0, 3),
(5, 4000, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hilang`
--

CREATE TABLE `tbl_hilang` (
  `id_hilang` int(12) NOT NULL,
  `no_induk` int(12) NOT NULL,
  `status_fc` int(2) NOT NULL,
  `tgl_hilang` date NOT NULL,
  `tgl_fc` date NOT NULL,
  `masa_berlaku` int(12) NOT NULL
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
-- Table structure for table `tbl_kunjungan`
--

CREATE TABLE `tbl_kunjungan` (
  `id_kunjungan` int(5) NOT NULL,
  `tgl_kunjungan` date NOT NULL,
  `no_induk` int(12) NOT NULL,
  `id_siswa` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kunjungan`
--

INSERT INTO `tbl_kunjungan` (`id_kunjungan`, `tgl_kunjungan`, `no_induk`, `id_siswa`) VALUES
(2, '2020-05-18', 34, 5),
(3, '0000-00-00', 0, 0),
(4, '0000-00-00', 0, 0),
(5, '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id_level` int(5) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `no_induk` int(12) NOT NULL,
  `status_buku` int(2) NOT NULL,
  `jml_pinjam` int(12) NOT NULL,
  `id_buku` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id_pinjam`, `tgl_pinjam`, `tgl_kembali`, `no_induk`, `status_buku`, `jml_pinjam`, `id_buku`) VALUES
(1, '2020-04-30', '2020-05-14', 88, 0, 3, 14),
(3, '2020-04-30', '2020-05-14', 88, 1, 1, 14),
(5, '2020-05-01', '2020-05-15', 213, 1, 2, 14),
(9, '2020-05-04', '2020-05-18', 666, 0, 3, 15),
(10, '2020-05-05', '2020-05-19', 88, 0, 4, 14);

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
  `tahun_masuk` int(10) NOT NULL,
  `status_siswa` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `no_induk`, `nama_siswa`, `kelas_siswa`, `jurusan`, `agama_siswa`, `alamat_siswa`, `jk_siswa`, `hp_siswa`, `email_siswa`, `tahun_masuk`, `status_siswa`) VALUES
(5, 34, 'adf', 'sddf', 'dsf', 'sdsf', 'sdf', 'on', 342, 'sd@gmail.com', 2017, 1),
(6, 0, 'd', 'sdm', 'sdmn', 'sn', 'snn', 'on', 21, 'ds@gmail.com', 23, 1),
(7, 213, 'sd', 'dsc', 'sdc', 'cd', 'sddc', 'Perempuan', 2314, 'sd@gmail.com', 23, 0),
(8, 78, 'sdn', 'sdmn', 'sdn', 'sdn', 'sdfnm', 'Perempuan', 242, 'sf@gmail.com', 24, 0),
(9, 12313, 'dasds', 'qeqe', 'dsfsf', 'weqeq', 'sdsfs', 'Perempuan', 87866, '1231', 35, 0),
(10, 123321, 'taka', '1273187``', 'qwekwl', 'dmasndk', 'asdmsa', 'Laki-Laki', 2147483647, '1231@hjaksd', 0, 0),
(11, 121, 'takeru', 'eqjwkq', 'sahdka', 'sadjak', 'askdhsak', 'Laki-Laki', 12312, '3232``', 0, 0),
(12, 311, 'takeru', 'X', 'Otomatisasi Tata Kel', 'islam', 'kasdjkadjk', 'Laki-Laki', 123131, 'ada@gmail.com', 24, 0),
(13, 234, 'dsf', 'sdf', 'sdf', 'ssfd', 'fsfer', 'Perempuan', 341, 'sd@gmail.com', 2017, 0),
(14, 213, 'sadf', 'sad', 'dasq', 'sfaw', 'sdf', 'Laki-Laki', 23084, 'sadn@gmail.com', 21300, 0),
(16, 666, 'asd', 'X', 'Otomatisasi Tata Kel', 'sad', 'asd', 'Perempuan', 234, 'sc@gmail.com', 2017, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(5) NOT NULL,
  `no_induk` int(12) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `no_induk`, `nama`, `password`, `id_level`) VALUES
(2, 88, 'Lidya', 'c3284d0f94606de1fd2af172aba15bf3', 1),
(4, 88, 'pitri', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tbl_dendaa`
--
ALTER TABLE `tbl_dendaa`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `tbl_hilang`
--
ALTER TABLE `tbl_hilang`
  ADD PRIMARY KEY (`id_hilang`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

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
-- Indexes for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

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
  ADD KEY `fk_user_levell` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_dendaa`
--
ALTER TABLE `tbl_dendaa`
  MODIFY `id_denda` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_hilang`
--
ALTER TABLE `tbl_hilang`
  MODIFY `id_hilang` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  MODIFY `id_kunjungan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id_level` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_user_level` FOREIGN KEY (`id_level`) REFERENCES `tbl_level` (`id_level`),
  ADD CONSTRAINT `fk_user_levell` FOREIGN KEY (`id_level`) REFERENCES `tbl_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
