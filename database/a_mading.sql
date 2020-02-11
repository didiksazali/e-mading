-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2016 at 06:06 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `a_mading`
--

-- --------------------------------------------------------

--
-- Table structure for table `baca`
--

CREATE TABLE IF NOT EXISTS `baca` (
`id_baca` int(11) NOT NULL,
  `nama_baca` varchar(99) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `baca`
--

INSERT INTO `baca` (`id_baca`, `nama_baca`) VALUES
(1, 'sudah di baca'),
(2, 'belum di baca');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE IF NOT EXISTS `informasi` (
`id_informasi` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tanggal` varchar(44) NOT NULL,
  `jam` varchar(33) NOT NULL,
  `judul` varchar(77) NOT NULL,
  `file` text NOT NULL,
  `isi` text NOT NULL,
  `id_tampil` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_baca` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `id_kategori`, `tanggal`, `jam`, `judul`, `file`, `isi`, `id_tampil`, `id_status`, `id_baca`) VALUES
(29, 3, '2016-08-05', '11:33:07', 'ya', 'BADMINTON copy.JPG', '<p>h</p>\r\n', 2, 1, 1),
(30, 5, '2016-08-05', '11:34:49', 'y allah', 'asesor teknik mesin.jpg', '<p>juara</p>\r\n', 5, 1, 1),
(33, 6, '2016-08-05', '11:40:00', 'sedih', 'KRI 2016.jpg', '<p>selamat</p>\r\n', 2, 1, 1),
(34, 4, '2016-08-05', '11:41:25', 'sedia hati', 'UAS.jpg', '<p>hanya dir tu</p>\r\n', 5, 1, 1),
(35, 5, '2016-08-05', '11:43:10', 'berdikari', 'pelantikan direktur.jpg', '<p>selmat bapak</p>\r\n', 4, 1, 1),
(36, 7, '2016-08-05', '11:44:13', 'bohong', 'pmdk bidik misi copy.jpg', '<p>baca<br />\r\n&nbsp;</p>\r\n', 5, 1, 1),
(37, 4, '2016-08-05', '11:48:24', 'sendir lebih baik', 'Registrasi-ulang.png', '<p>sing</p>\r\n', 2, 1, 1),
(39, 2, '2016-08-05', '12:28:49', 'lowonan kerja', 'lowker Dosen.jpg', '<p>loker</p>\r\n', 5, 1, 1),
(40, 7, '2016-08-05', '12:30:23', 'sedih', 'jadwal martikulasi.jpg', '<p>martikulasi</p>\r\n', 4, 1, 1),
(41, 5, '2016-08-05', '12:32:12', 'uas', 'umpn polbeng 2016.jpg', '<p>2016</p>\r\n', 4, 1, 1),
(42, 2, '2016-08-05', '12:35:30', 'icari', 'jadwal kegiatan baru LDKK.jpg', '<p>ldkk</p>\r\n', 2, 1, 1),
(43, 5, '2016-08-05', '12:38:44', 'peumuman', 'asesor bib.jpg', '<p>asesor</p>\r\n', 4, 1, 1),
(44, 5, '2016-08-05', '12:40:41', 'akademik', 'lowker dosen & laboran 2016.jpg', '<p>diliat</p>\r\n', 2, 1, 1),
(45, 4, '2016-08-05', '14:10:57', 'puisi', 'audit iso.jpg', '<p>liat</p>\r\n', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(88) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'CERPEN'),
(2, 'LOWONAN KERJA'),
(3, 'ARTIKEL'),
(4, 'BERITA NONAKADEMIK'),
(5, 'BERITA AKADEMIK'),
(7, 'PUISI');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`id_status` int(11) NOT NULL,
  `nama_status` varchar(99) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'Tampilkan'),
(2, 'Tidak di tampilkan');

-- --------------------------------------------------------

--
-- Table structure for table `tampil`
--

CREATE TABLE IF NOT EXISTS `tampil` (
`id_tampil` int(11) NOT NULL,
  `nama_tampil` varchar(99) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tampil`
--

INSERT INTO `tampil` (`id_tampil`, `nama_tampil`) VALUES
(2, 'banner'),
(4, 'kanan'),
(5, 'gallery');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(5) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(66) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'sekolah'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=121 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `level`) VALUES
(119, 'hafsah', '1cbd8a395b9c6b4a7fb82e5366933fa7', 'hafsah18@mail.com', 'hafsah', 'sepahat', 'superadmin'),
(120, 'echa', 'e80b84e94d04f8840ff6f307fa10bde7', 'echa17@yahoo.com', 'echa', 'bukit btu', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baca`
--
ALTER TABLE `baca`
 ADD PRIMARY KEY (`id_baca`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
 ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tampil`
--
ALTER TABLE `tampil`
 ADD PRIMARY KEY (`id_tampil`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baca`
--
ALTER TABLE `baca`
MODIFY `id_baca` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tampil`
--
ALTER TABLE `tampil`
MODIFY `id_tampil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
