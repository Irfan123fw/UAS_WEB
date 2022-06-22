-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 07:01 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: perpuss
--

-- --------------------------------------------------------

--
-- Table structure for table anggota
--

CREATE TABLE anggota (
  user_id int(2) NOT NULL,
  username varchar(15) NOT NULL,
  password varchar(50) NOT NULL,
  fullname varchar(50) NOT NULL,
  gambar varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table anggota
--

INSERT INTO anggota (user_id, username, password, fullname, gambar) VALUES
(1, 'anggota', 'anggota', 'Irfansyah', '');

-- --------------------------------------------------------

--
-- Table structure for table data_anggota
--

CREATE TABLE data_anggota (
  id int(4) NOT NULL,
  no_induk varchar(5) NOT NULL,
  nama varchar(150) NOT NULL,
  jk varchar(2) NOT NULL,
  kelas varchar(5) NOT NULL,
  ttl varchar(100) NOT NULL,
  alamat varchar(250) NOT NULL,
  foto varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table data_anggota
--

INSERT INTO data_anggota (id, no_induk, nama, jk, kelas, ttl, alamat, foto) VALUES
(17, '12050', 'Irfan Syah', 'L', '12', 'Pekanbaru', 'Jl kenanga perum dki1', 'gambar_anggota/codingan-5.jpeg'),
(18, '12345', 'sarjana', 'L', '12', 'Pekanbaru', 'aceh', 'gambar_anggota/4.jpg'),
(19, '12377', 'Susi', 'P', '9', 'Pekanbaru', 'aceh', 'gambar_anggota/4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table data_buku
--

CREATE TABLE data_buku (
  id int(5) NOT NULL,
  judul varchar(250) NOT NULL,
  pengarang varchar(250) NOT NULL,
  th_terbit varchar(4) NOT NULL,
  penerbit varchar(250) NOT NULL,
  isbn varchar(25) NOT NULL,
  kategori varchar(50) NOT NULL,
  kode_klas varchar(20) NOT NULL,
  jumlah_buku int(2) NOT NULL,
  lokasi varchar(50) NOT NULL,
  asal varchar(50) NOT NULL,
  jum_temp int(4) NOT NULL,
  tgl_input varchar(75) NOT NULL,
  gambar text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table data_buku
--

INSERT INTO data_buku (id, judul, pengarang, th_terbit, penerbit, isbn, kategori, kode_klas, jumlah_buku, lokasi, asal, jum_temp, tgl_input, gambar) VALUES
(2, 'Membangun Toko Online Dengan PHP dan MySQL', 'Irfan syah', '2015', 'Gagal Koding', 'QWERT122345566', '1300', 'XII-Utama', 10, 'Rak A1', 'Pembelian', 0, '2015-10-10 07:47:40', 'gambar_buku/codingan-6.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table pengunjung
--

CREATE TABLE pengunjung (
  id int(6) NOT NULL,
  nama varchar(255) NOT NULL,
  jk varchar(2) NOT NULL,
  kelas varchar(17) NOT NULL,
  perlu1 varchar(15) NOT NULL,
  cari varchar(255) NOT NULL,
  saran varchar(255) NOT NULL,
  tgl_kunjung date NOT NULL,
  jam_kunjung time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table pengunjung
--

INSERT INTO pengunjung (id, nama, jk, kelas, perlu1, cari, saran, tgl_kunjung, jam_kunjung) VALUES
(10, 'irfan syah', 'L', 'XII5', 'baca', 'buku', 'y', '2022-06-20', '14:20:59'),
(11, 'sarjana', 'P', 'X1', 'baca', 'buku', 't', '2022-06-21', '07:16:23'),
(12, 'apa', 'L', 'X2', 'baca', 'buku', 'y', '2022-06-21', '07:16:50');

-- --------------------------------------------------------

--
-- Table structure for table trans_pinjam
--

CREATE TABLE trans_pinjam (
  id int(5) NOT NULL,
  judul_buku varchar(250) NOT NULL,
  id_peminjam int(4) NOT NULL,
  nama_peminjam varchar(100) NOT NULL,
  tgl_pinjam varchar(15) NOT NULL,
  tgl_kembali varchar(15) NOT NULL,
  status varchar(10) NOT NULL,
  ket varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table trans_pinjam
--

INSERT INTO trans_pinjam (id, judul_buku, id_peminjam, nama_peminjam, tgl_pinjam, tgl_kembali, status, ket) VALUES
(2, 'Membangun', 2, 'AHMAD', '31-10-2015', '07-11-2015', 'kembali', 'buku'),
(3, 'Membangun', 4, 'ANTON', '31-10-2015', '07-11-2015', 'kembali', 'pinjam donk'),
(4, 'Membangun', 5, 'SARJANA', '03-11-2015', '10-11-2015', 'pinjam', 'Referensi Skripsi'),
(5, 'Membangun', 5, 'ANTON', '20-06-2022', '27-06-2022', 'kembali', '27-06-2002');

-- --------------------------------------------------------

--
-- Table structure for table user
--

CREATE TABLE user (
  user_id int(2) NOT NULL,
  username varchar(15) NOT NULL,
  password varchar(15) NOT NULL,
  fullname varchar(30) NOT NULL,
  gambar varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table user
--

INSERT INTO user (user_id, username, password, fullname, gambar) VALUES
(1, 'operator', 'operator', 'Irfansyah', 'gambar_admin/avatar5.png'),
(2, 'admin', 'admin', 'Irfansyah', 'gambar_admin/face29.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table anggota
--
ALTER TABLE anggota
  ADD PRIMARY KEY (user_id);

--
-- Indexes for table data_anggota
--
ALTER TABLE data_anggota
  ADD PRIMARY KEY (id);

--
-- Indexes for table data_buku
--
ALTER TABLE data_buku
  ADD PRIMARY KEY (id);

--
-- Indexes for table pengunjung
--
ALTER TABLE pengunjung
  ADD PRIMARY KEY (id);

--
-- Indexes for table trans_pinjam
--
ALTER TABLE trans_pinjam
  ADD PRIMARY KEY (id);

--
-- Indexes for table user
--
ALTER TABLE user
  ADD PRIMARY KEY (user_id);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table anggota
--
ALTER TABLE anggota
  MODIFY user_id int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table data_anggota
--
ALTER TABLE data_anggota
  MODIFY id int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table data_buku
--
ALTER TABLE data_buku
  MODIFY id int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table pengunjung
--
ALTER TABLE pengunjung
  MODIFY id int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table trans_pinjam
--
ALTER TABLE trans_pinjam
  MODIFY id int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table user
--
ALTER TABLE user
  MODIFY user_id int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
