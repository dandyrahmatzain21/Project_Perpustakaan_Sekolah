-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2017 at 07:43 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `username` varchar(200) NOT NULL,
  `nama_admin` varchar(200) NOT NULL,
  `password` char(32) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE IF NOT EXISTS `tbl_anggota` (
  `kode_anggota` char(4) NOT NULL,
  `nama_anggota` varchar(150) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk_anggota` enum('L','P') NOT NULL,
  `tlp_anggota` varchar(15) NOT NULL,
  `alamat_anggota` varchar(250) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  PRIMARY KEY (`kode_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`kode_anggota`, `nama_anggota`, `tempat_lahir`, `tanggal_lahir`, `jk_anggota`, `tlp_anggota`, `alamat_anggota`, `tanggal_daftar`) VALUES
('A001', 'Muhammad Ridwan Farhan', 'Kuningan', '1999-04-02', 'L', '0980987798', 'Bayuning', '2017-04-21'),
('A002', 'Zaki', 'Kuningan', '1999-09-08', 'L', '097987877', 'Kadugede', '2017-08-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE IF NOT EXISTS `tbl_buku` (
  `kode_buku` char(15) NOT NULL,
  `kode_kategori` char(4) NOT NULL,
  `kode_pengarang` char(4) NOT NULL,
  `kode_penerbit` char(4) NOT NULL,
  `judul_buku` varchar(250) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `jumlah_buku` tinyint(4) NOT NULL,
  `file_cover` varchar(250) NOT NULL,
  `tgl_diterima` date NOT NULL,
  PRIMARY KEY (`kode_buku`),
  KEY `kode_penerbit` (`kode_penerbit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`kode_buku`, `kode_kategori`, `kode_pengarang`, `kode_penerbit`, `judul_buku`, `tahun_terbit`, `jumlah_buku`, `file_cover`, `tgl_diterima`) VALUES
('002', '1239', '1444', '123', 'Indah', 2009, 7, 'Tulips.jpg', '2017-02-25'),
('B001', '000', '1444', '003', 'Hacking dan Tweaking Windows 8', 2014, 10, 'Hacking dan Tweaking Windows 8m.jpg', '2017-01-06'),
('B002', '000', '1444', '003', 'Super Kilat Kuasai Photoshop dan CorelDraw', 2017, 5, 'Super Kilat Kuasai Photoshop dan CorelDraw.JPG', '2017-02-03'),
('B003', '000', '1444', '003', 'Dahsyatnya Photoshop untuk Fotografer Pemula', 2017, 5, 'Dahsyatnya Photoshop untuk Fotografer Pemula.JPG', '2017-05-16'),
('B004', '000', 'P001', '005', 'Wordpress', 2010, 5, 'buku1.jpg', '2011-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE IF NOT EXISTS `tbl_kategori` (
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL,
  `deskripsi_kategori` mediumtext NOT NULL,
  PRIMARY KEY (`kode_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kode_kategori`, `nama_kategori`, `deskripsi_kategori`) VALUES
('000', 'Pekerjaan umum, Ilmu Komputer dan Informasi', ''),
('100', 'Filsafat dan psikologi', ''),
('200', 'Agama', ''),
('300', 'Ilmu sosial', ''),
('400', 'Bahasa', ''),
('500', 'Ilmu Pengetahuan Murni', ''),
('600', 'Teknologi', ''),
('700', 'Seni & rekreasi', ''),
('800', 'Sastra', ''),
('900', 'Sejarah & geografi', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE IF NOT EXISTS `tbl_peminjaman` (
  `kode_pinjaman` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pinjaman` date NOT NULL,
  `tgl_harus_kembali` date NOT NULL,
  `kode_anggota` char(4) NOT NULL,
  `kode_buku` char(15) NOT NULL,
  `kembali` enum('Y','T') NOT NULL DEFAULT 'T',
  PRIMARY KEY (`kode_pinjaman`),
  KEY `kode_anggota` (`kode_pinjaman`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`kode_pinjaman`, `tgl_pinjaman`, `tgl_harus_kembali`, `kode_anggota`, `kode_buku`, `kembali`) VALUES
(6, '2017-03-27', '2017-03-30', 'A001', '001', 'Y'),
(7, '2017-04-21', '2017-04-24', 'A001', '002', 'Y'),
(8, '2017-04-21', '2017-04-24', 'A001', '002', 'Y'),
(9, '2017-05-17', '2017-05-20', 'A001', '002', 'Y'),
(10, '2017-08-07', '2017-08-10', 'A001', 'B003', 'Y'),
(11, '2017-08-07', '2017-08-10', 'A002', 'B003', 'T'),
(12, '2017-08-14', '2017-08-17', 'A001', 'B003', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penerbit`
--

CREATE TABLE IF NOT EXISTS `tbl_penerbit` (
  `kode_penerbit` char(4) NOT NULL,
  `nama_penerbit` varchar(150) NOT NULL,
  `alamat_penerbit` varchar(250) NOT NULL,
  `telp_fax` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `website` varchar(150) NOT NULL,
  PRIMARY KEY (`kode_penerbit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penerbit`
--

INSERT INTO `tbl_penerbit` (`kode_penerbit`, `nama_penerbit`, `alamat_penerbit`, `telp_fax`, `email`, `website`) VALUES
('001', 'Andi Publisher', 'Yogyakarta', '0232154554', 'info@andipublisher.com', 'http://www.andipublisher.com'),
('002', 'Pusat Perbukuan', 'Jalan Sukarno Hata - Bandung', '022 223012', 'info@pusbuk.or.id', 'http://www.pusbuk.or.id'),
('003', 'Elex Media Komputindo', 'Jakarta', '021-0215554', 'info@gramedia.com', 'http://www.elexmedia.id'),
('004', 'Biobses', 'Komplek Pasar Palasari Bandung', '022 02153213', 'info@biobses.com', 'http://www.biobses.com'),
('005', 'Gramedia', 'Jalan Cakung 56 - Jakarta Timur', '0219887871', 'info@gramedia.com', 'http://gramedia.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengarang`
--

CREATE TABLE IF NOT EXISTS `tbl_pengarang` (
  `kode_pengarang` char(4) NOT NULL,
  `nama_pengarang` varchar(250) NOT NULL,
  `email_pengarang` varchar(150) NOT NULL,
  `website_pengarang` varchar(200) NOT NULL,
  PRIMARY KEY (`kode_pengarang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengarang`
--

INSERT INTO `tbl_pengarang` (`kode_pengarang`, `nama_pengarang`, `email_pengarang`, `website_pengarang`) VALUES
('1444', 'Dida', 'dida@gmail.com', 'www.gramedia.com'),
('P001', 'Oya Suryana', 'oyasuryana@yahoo.com', 'http://ozs.web.id');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengembalian`
--

CREATE TABLE IF NOT EXISTS `tbl_pengembalian` (
  `kode_pengembalian` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pinjaman` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `kode_anggota` char(5) NOT NULL,
  `kode_buku` char(15) NOT NULL,
  `jml_hari_telat` mediumint(9) NOT NULL,
  `denda` mediumint(9) NOT NULL,
  PRIMARY KEY (`kode_pengembalian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_pengembalian`
--

INSERT INTO `tbl_pengembalian` (`kode_pengembalian`, `kode_pinjaman`, `tgl_kembali`, `kode_anggota`, `kode_buku`, `jml_hari_telat`, `denda`) VALUES
(1, 8, '2017-08-07', 'A001', '002', 105, 52500),
(2, 9, '2017-08-07', 'A001', '002', 79, 39500),
(3, 10, '2017-08-14', 'A001', 'B003', 4, 2000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
