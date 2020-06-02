-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 05:02 PM
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
  `isbn` varchar(100) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `nama_penerbit` varchar(30) NOT NULL,
  `pengarang` varchar(30) NOT NULL,
  `tahun_terbit` varchar(10) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `jml_buku` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `isbn`, `judul`, `nama_penerbit`, `pengarang`, `tahun_terbit`, `gambar`, `jml_buku`) VALUES
(2, 'p122', 'bahasa inggris', 'erlanggaa', 'desi', '2014', '../galeri/markijar.com - teknik informatika.png', 100),
(3, 'p11', 'matematika', 'erlangga', 'andri', '2017', '../galeri/markijar.com - teknik informatika.png', 200),
(4, 'p12', 'PKN', 'Airlangga', 'sumiati', '2016', '../galeri/Header_Anugerah.png', 200),
(5, 'p13', 'Bahasa Indonesia', 'Ardilla Books', 'sasa', '2016', '../galeri/Header_Anugerah.png', 200),
(6, 'p14', 'Seni Budaya', 'Aya Media Pustaka', 'mia', '2015', '../galeri/markijar.com - teknik informatika.png', 200),
(7, 'p15', 'Sejarah', 'Aulia Cendekia Press', 'Andila', '2014', '../galeri/markijar.com - teknik informatika.png', 100),
(8, 'p16', 'Agama Islam', 'Azet Media Paramitra', 'Kian', '2017', '../galeri/markijar.com - teknik informatika.png', 200),
(9, 'p17', 'Kewirausahaan', 'Azka Mulia Media', 'Kiki', '2018', '../galeri/Header_Anugerah.png', 200),
(10, 'p18', 'Pendidikan Olahraga', 'Bahana Mestika Karya', 'Jia', '2019', '../galeri/markijar.com - teknik informatika.png', 200);

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hilang`
--

CREATE TABLE `tbl_hilang` (
  `id_hilang` int(12) NOT NULL,
  `no_induk` varchar(12) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `status_fc` int(2) NOT NULL,
  `tgl_hilang` date NOT NULL,
  `tgl_fc` varchar(20) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hilang`
--

INSERT INTO `tbl_hilang` (`id_hilang`, `no_induk`, `nama_siswa`, `isbn`, `judul`, `status_fc`, `tgl_hilang`, `tgl_fc`, `masa_berlaku`, `keterangan`) VALUES
(15, '90', 'anggrai', 'p122', 'bahasa inggris ', 0, '2020-05-31', '2020-06-02', '2020-06-07', ''),
(16, '89', 'pitri', 'p122', 'bahasa inggris ', 1, '2020-05-31', '2020-05-31', '2020-06-07', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kunjungan`
--

CREATE TABLE `tbl_kunjungan` (
  `id_kunjungan` int(5) NOT NULL,
  `tgl_kunjungan` date NOT NULL,
  `no_induk` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kunjungan`
--

INSERT INTO `tbl_kunjungan` (`id_kunjungan`, `tgl_kunjungan`, `no_induk`) VALUES
(2, '2020-05-18', '34'),
(9, '2020-05-19', '86745893'),
(10, '2020-05-20', '3'),
(11, '2020-05-27', '990'),
(12, '2020-05-29', '123321'),
(13, '2020-05-29', '123321'),
(14, '2020-05-30', '86745893'),
(15, '2020-05-30', '86745893'),
(16, '2020-05-30', '86745893'),
(17, '2020-05-30', '86745893'),
(18, '2020-05-30', '34'),
(19, '2020-05-30', '2147483647'),
(21, '2020-05-31', '89'),
(22, '2020-05-31', '8'),
(23, '2020-05-31', '666'),
(24, '2020-05-31', '666'),
(25, '0000-00-00', '89'),
(26, '0000-00-00', '666'),
(27, '2020-06-01', '89'),
(28, '2020-06-01', '666'),
(29, '2020-06-01', '666'),
(30, '2020-06-01', '666'),
(31, '2020-06-01', '666'),
(32, '2020-06-01', '666'),
(33, '2020-06-02', '90'),
(34, '2020-06-02', '666'),
(35, '2020-06-02', '666'),
(36, '2020-06-02', '666'),
(37, '2020-06-02', '666');

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
  `no_induk` varchar(12) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `status_buku` int(2) NOT NULL,
  `jml_pinjam` int(12) NOT NULL,
  `isbn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id_pinjam`, `tgl_pinjam`, `tgl_kembali`, `no_induk`, `nama_siswa`, `judul`, `status_buku`, `jml_pinjam`, `isbn`) VALUES
(5, '2020-05-29', '2020-05-30', '90', 'anggrai', 'bahasa inggris ', 0, 1, 'p122'),
(6, '2020-04-29', '2020-05-30', '91', 'Sapitri Anggraini', 'matematika ', 0, 1, 'p11'),
(7, '2020-05-29', '2020-05-30', '93', 'nadiah', 'matematika ', 0, 1, 'p11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(5) NOT NULL,
  `no_induk` varchar(12) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `kelas_siswa` varchar(10) NOT NULL,
  `jurusan` varchar(40) NOT NULL,
  `agama_siswa` varchar(20) NOT NULL,
  `alamat_siswa` varchar(50) NOT NULL,
  `jk_siswa` varchar(10) NOT NULL,
  `hp_siswa` varchar(12) NOT NULL,
  `email_siswa` varchar(30) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `tahun_masuk` int(10) NOT NULL,
  `status_siswa` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `no_induk`, `nama_siswa`, `kelas_siswa`, `jurusan`, `agama_siswa`, `alamat_siswa`, `jk_siswa`, `hp_siswa`, `email_siswa`, `gambar`, `tahun_masuk`, `status_siswa`) VALUES
(1, '89', 'pitri', 'X', 'Otomatisasi Tata Kelola Perkantoran', 'Islam', 'ciketing', 'Laki-laki', '2147483647', 'sapitrianggraini74@gmail.com', '../foto/img_20170204_191842.jpg', 2019, 0),
(2, '90', 'anggrai', 'XII', 'Otomatisasi Tata Kelola Perkantoran', 'Islam', 'ciketing', 'Laki-laki', '2147483647', 'sapitrianggraini74@gmail.com', '../foto/91517624_2703078669812037_1448653285954158592_o.jpg', 2019, 1),
(3, '91', 'Sapitri Anggraini', 'X', 'Otomatisasi Tata Kelola Perkantoran', 'Islam', 'ciketing', 'Perempuan', '2147483647', 'sapitrianggraini74@gmail.com', '../foto/20190609_140921.jpg', 2019, 1),
(4, '92', 'afif', 'X', 'Otomatisasi Tata Kelola Perkantoran', 'Islam', 'kranji', 'Laki-Laki', '2147483647', 'sapitrianggraini74@gmail.com', '../foto/img_20170204_191842.jpg', 2019, 1),
(5, '93', 'nadiah', 'X', 'Otomatisasi Tata Kelola Perkantoran', 'Islam', 'ratna', 'Perempuan', '2147483647', 'nadiah@gmail.com', '../foto/img_20170204_191842.jpg', 2019, 1),
(6, '93', 'isnainy', 'XI', 'Bisnis Daring dan Pemasaran', 'Islam', 'tambun', 'Perempuan', '08678738912', 'isna@gmail.com', '../foto/img_20170204_191842.jpg', 2019, 1),
(9, '123456789012', 'pp', 'X', 'Otomatisasi Tata Kelola Perkantoran', 'Islam', 'sdf', 'Perempuan', '08588324121', 'sad@gmail.com', '../foto/Header_Anugerah.png', 2019, 1),
(11, '234', 'dsf', 'X', 'Otomatisasi Tata Kelola Perkantoran', 'Islam', 'sdf', 'Perempuan', '08588324121', 'sf@gmail.com', '../foto/img_20170204_191842.jpg', 2019, 0),
(12, '627134', 'isn', 'X', 'Otomatisasi Tata Kelola Perkantoran', 'Islam', 'tambun', 'Perempuan', '08588324121', 'isna@gmail.com', '../foto/Header_Anugerah.png', 2019, 1);

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
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_dendaa`
--
ALTER TABLE `tbl_dendaa`
  MODIFY `id_denda` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_hilang`
--
ALTER TABLE `tbl_hilang`
  MODIFY `id_hilang` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  MODIFY `id_kunjungan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_level`
--
ALTER TABLE `tbl_level`
  MODIFY `id_level` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
