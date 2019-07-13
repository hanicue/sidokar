-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 09:18 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sidokar`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsipkeluar`
--

CREATE TABLE IF NOT EXISTS `arsipkeluar` (
`id_arsipkeluar` int(3) NOT NULL,
  `id_keluar` int(3) NOT NULL,
  `tgl_arsip` date DEFAULT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arsipkeluar`
--

INSERT INTO `arsipkeluar` (`id_arsipkeluar`, `id_keluar`, `tgl_arsip`, `file`) VALUES
(3, 3, '2019-02-17', 'IMG_20160208_230913.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `arsipmasuk`
--

CREATE TABLE IF NOT EXISTS `arsipmasuk` (
`id_arsipmasuk` int(3) NOT NULL,
  `id_disposisi` int(3) NOT NULL,
  `tgl_arsip` date NOT NULL,
  `file` text
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arsipmasuk`
--

INSERT INTO `arsipmasuk` (`id_arsipmasuk`, `id_disposisi`, `tgl_arsip`, `file`) VALUES
(6, 6, '2019-02-17', 'IMG_20151212_112037.jpg'),
(7, 7, '2019-02-17', 'IMG_20160102_232059.jpg'),
(8, 8, '2019-02-26', 'photo_2019-02-25_12-41-01.jpg'),
(9, 9, '2019-03-08', 'photo_2019-02-25_12-41-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE IF NOT EXISTS `bagian` (
`id_bagian` int(3) NOT NULL,
  `kode_bagian` varchar(15) NOT NULL,
  `bagian` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `kode_bagian`, `bagian`) VALUES
(1, 'K001', 'Sekreataris Camat'),
(2, 'K002', 'Kasi Pemerintahan'),
(3, 'K003', 'Kasi Ekbag'),
(4, 'K004', 'Kasi Kesos'),
(5, 'K005', 'Kasi Trantib'),
(6, 'K006', 'Kasubag PAT'),
(7, 'K007', 'Camat'),
(8, 'K008', 'Bendahara'),
(9, 'K009', 'Bendahara Kasi');

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE IF NOT EXISTS `disposisi` (
`id_disposisi` int(3) NOT NULL,
  `id_masuk` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_bagian` int(3) NOT NULL,
  `denganhormat` varchar(50) NOT NULL,
  `catatan` varchar(50) NOT NULL,
  `files` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `id_masuk`, `id_user`, `id_bagian`, `denganhormat`, `catatan`, `files`) VALUES
(4, 5, 1, 1, 'tanggapan dan saran', 'diperbolehkan mahasiswa tersebut magang di kecamat', 'img010.jpg'),
(6, 6, 1, 2, 'ditindak lanjuti', 'lanjutkan', 'img008.jpg'),
(7, 7, 1, 1, 'tanggapan dan saran', 'lanjutkan', 'avatar-2.jpg'),
(8, 9, 1, 2, 'ditindak lanjuti', 'lanjutkan', 'icon.png'),
(9, 10, 1, 2, 'lanjutkan', 'lanjutkan', 'img008.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `suratkeluar`
--

CREATE TABLE IF NOT EXISTS `suratkeluar` (
`id_keluar` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_bagian` int(3) NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `kode_surat` varchar(12) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `lampiran` text,
  `ket` text,
  `file` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suratkeluar`
--

INSERT INTO `suratkeluar` (`id_keluar`, `id_user`, `id_bagian`, `tgl_keluar`, `kode_surat`, `perihal`, `kepada`, `nomor_surat`, `tgl_surat`, `lampiran`, `ket`, `file`) VALUES
(1, 1, 8, '2019-02-17', '808', 'PKK', 'Darma Wanita Wonosobo ', '808/344/II/2019', '2019-02-16', '1 lembar', 'diharapkan hadir tepat waktu', 'IMG_20160209_210557.jpg'),
(3, 1, 8, '2019-02-17', '818', 'Pendanaan desa sojopuro dan desa blederan', 'Badan Keuangan Daerah', '818/123/II/2019', '2019-02-16', '1 lembar', 'segera di konfirmasi', 'IMG_20160208_230913.jpg'),
(4, 1, 4, '2019-02-17', '900', 'PKK', 'Darma Wanita Wonosobo ', '900/4/II/2019', '2019-02-16', '-', 'memakai pakaian batik', 'IMG_20160225_221111.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `suratmasuk`
--

CREATE TABLE IF NOT EXISTS `suratmasuk` (
`id_masuk` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_bagian` int(3) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kode_surat` varchar(12) NOT NULL,
  `asal_surat` varchar(50) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `tgl_surat` date NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `ket` text NOT NULL,
  `sifat` enum('amat segera','penting','segera','biasa') NOT NULL,
  `file` text
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suratmasuk`
--

INSERT INTO `suratmasuk` (`id_masuk`, `id_user`, `id_bagian`, `tgl_masuk`, `kode_surat`, `asal_surat`, `nomor_surat`, `tgl_surat`, `perihal`, `ket`, `sifat`, `file`) VALUES
(5, 1, 1, '2019-02-17', '834.1', 'FastikomUNSIQ', '834.1/345/II/2019', '2019-02-16', 'Kerja Praktek Mahasiswa', 'Perizinan mahasiswakerja praktek di kecamatan mojotengah', 'biasa', 'photo_2019-02-25_12-41-01.jpg'),
(6, 1, 9, '2019-02-17', '818', 'keluarahan kalibeber', '431/23/I/2019', '2019-02-09', 'rapat paripurna', 'segera di konfirmasi', 'penting', 'photo_2019-02-25_12-41-14.jpg'),
(7, 1, 7, '2019-02-17', '834', 'keluarahan kalibeber', '03/II/2019', '2019-02-15', 'rapat paripurna', 'segera di konfirmasi', 'penting', 'photo_2019-02-25_12-41-01.jpg'),
(8, 1, 1, '2019-02-25', '834', 'Dinas Sosial ', '834/45/II/2019', '2019-02-23', 'undangan', 'pakaian dinas', 'penting', 'photo_2019-02-25_12-41-01.jpg'),
(9, 1, 4, '2019-02-26', '005', 'Dinas Kesehatan', '005/455/II/2019', '2019-02-22', 'sosialisasi penyakit menular', 'diharapkan hadir tepat waktu', 'segera', 'photo_2019-02-25_12-41-01.jpg'),
(10, 1, 2, '2019-03-08', '456', 'sekda', '456/34/ii/2019', '2019-03-08', 'rapat paripurna', 'pakaian dinas', 'penting', 'photo_2019-02-25_12-41-01.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(3) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('admin','user') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin123', 'admin'),
(7, 'user', 'user123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsipkeluar`
--
ALTER TABLE `arsipkeluar`
 ADD PRIMARY KEY (`id_arsipkeluar`), ADD KEY `id_keluar` (`id_keluar`);

--
-- Indexes for table `arsipmasuk`
--
ALTER TABLE `arsipmasuk`
 ADD PRIMARY KEY (`id_arsipmasuk`), ADD KEY `id_disposisi` (`id_disposisi`);

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
 ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
 ADD PRIMARY KEY (`id_disposisi`), ADD KEY `id_masuk` (`id_masuk`), ADD KEY `id_bagian` (`id_bagian`);

--
-- Indexes for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
 ADD PRIMARY KEY (`id_keluar`), ADD KEY `id_bagian` (`id_bagian`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
 ADD PRIMARY KEY (`id_masuk`), ADD KEY `id_bagian` (`id_bagian`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsipkeluar`
--
ALTER TABLE `arsipkeluar`
MODIFY `id_arsipkeluar` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `arsipmasuk`
--
ALTER TABLE `arsipmasuk`
MODIFY `id_arsipmasuk` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
MODIFY `id_bagian` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
MODIFY `id_disposisi` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
MODIFY `id_keluar` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
MODIFY `id_masuk` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `arsipkeluar`
--
ALTER TABLE `arsipkeluar`
ADD CONSTRAINT `arsipkeluar_ibfk_1` FOREIGN KEY (`id_keluar`) REFERENCES `suratkeluar` (`id_keluar`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `arsipmasuk`
--
ALTER TABLE `arsipmasuk`
ADD CONSTRAINT `arsipmasuk_ibfk_1` FOREIGN KEY (`id_disposisi`) REFERENCES `disposisi` (`id_disposisi`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `disposisi`
--
ALTER TABLE `disposisi`
ADD CONSTRAINT `disposisi_ibfk_1` FOREIGN KEY (`id_masuk`) REFERENCES `suratmasuk` (`id_masuk`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `disposisi_ibfk_2` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
ADD CONSTRAINT `suratkeluar_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `suratkeluar_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
ADD CONSTRAINT `suratmasuk_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `suratmasuk_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
