-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2020 at 06:40 PM
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
-- Database: `db_ujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `token`) VALUES
(1, 'fadil', 'fadil123', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jawab`
--

CREATE TABLE `tb_jawab` (
  `id_jawab` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawab` tinyint(1) NOT NULL,
  `txt_jawab` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jawab`
--

INSERT INTO `tb_jawab` (`id_jawab`, `id_soal`, `jawab`, `txt_jawab`) VALUES
(1, 10, 1, 'jawab1'),
(2, 10, 0, 'jawab2'),
(3, 9, 1, 'jawab a'),
(4, 9, 0, 'jawab b');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matpel`
--

CREATE TABLE `tb_matpel` (
  `id_matpel` int(11) NOT NULL,
  `matpel` varchar(50) NOT NULL,
  `waktu_ujian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_matpel`
--

INSERT INTO `tb_matpel` (`id_matpel`, `matpel`, `waktu_ujian`) VALUES
(1, 'bahasa indonesia', 90),
(2, 'bahasa inggris', 60),
(3, 'matematika', 75),
(4, 'ipa', 60);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_matpel` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_user`, `id_matpel`, `nilai`) VALUES
(1, 32, 1, 15),
(3, 29, 4, 15),
(4, 32, 2, 15),
(5, 32, 3, 20),
(6, 32, 4, 10),
(7, 26, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nis`
--

CREATE TABLE `tb_nis` (
  `id_nis` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nis`
--

INSERT INTO `tb_nis` (`id_nis`, `nis`, `nama_siswa`) VALUES
(1, '2018', 'Hidayatul'),
(2, '1025', ''),
(5, '2020', 'sayatul'),
(6, '2027', 'Dilo Pufa Hio'),
(7, '2015', 'Riguntal'),
(8, '9999', 'unstoppable'),
(18, '666', 'Soleh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_soal`
--

CREATE TABLE `tb_soal` (
  `id_soal` int(11) NOT NULL,
  `image_soal` varchar(100) DEFAULT NULL,
  `id_matpel` int(11) NOT NULL,
  `txt_soal` varchar(256) NOT NULL,
  `jawab_a` varchar(50) NOT NULL,
  `jawab_b` varchar(50) NOT NULL,
  `jawab_c` varchar(50) NOT NULL,
  `jawab_d` varchar(50) NOT NULL,
  `kunci` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_soal`
--

INSERT INTO `tb_soal` (`id_soal`, `image_soal`, `id_matpel`, `txt_soal`, `jawab_a`, `jawab_b`, `jawab_c`, `jawab_d`, `kunci`) VALUES
(7, '/ujianTA/soal/img/b.ing/obj_ipa.png', 2, 'what is that?', 'atom', 'molecule', 'fluid', 'stone', 'atom'),
(9, NULL, 4, 'Tumbuhan bernafas dengan?', 'paru paru', 'insang', 'fotosintesis', 'kulit', 'fotosintesis'),
(10, '/ujianTA/soal/img/b.ing/4bf9205efe5e302c08fd0d251c97b518.jpg', 4, 'soal dari neraka', 'a', 'c', 'd', 'a', 'a'),
(12, '/ujianTA/soal/img/matematika/home-outline.png', 3, 'lai pandai ang', 'lai', 'kurang pandai', 'pandai bana', 'tanyo amak lu', 'lai'),
(13, NULL, 3, '3 + 1', '2', '4', '6', '10', '4'),
(14, NULL, 2, 'what are you doing?', 'i\'m fine', 'i\'m here with you', 'i have some work in garage', 'ok let go', 'i have some work in garage'),
(15, NULL, 4, 'fotosintesis adalah...', 'pernafasan', 'perapian', 'pengembangan', 'studi kasus', 'pernafasan'),
(17, '/ujianTA/soal/img/b.indo/obj_bing.png', 1, 'apa nama benda diatas dalam bahasa indonesia?', 'globe', 'bola dunia', 'map', 'peta', 'bola dunia'),
(18, '/ujianTA/soal/img/matematika/compass.jpg', 3, 'berapa nomor sepatu diatas', '30', '34', '42', '40', '40'),
(19, '/ujianTA/soal/img/b.ing/cellphone-android.png', 2, 'what is that thing?', 'phone', 'cell', 'shoes', 'sword', 'phone'),
(20, '/ujianTA/soal/img/b.indo/obj_mm.png', 1, 'apa ini?', 'penggaris', 'roller', 'pena', 'pensil', 'penggaris'),
(21, NULL, 1, 'Jika juara akan mendapatkan?', 'penggaris', 'sertifikat tanah', 'hadiah', 'minyak goreng', 'hadiah'),
(22, '/ujianTA/soal/img/matematika/home-outline.png', 3, 'Berapa hektar luas rumah diatas?', '3cm', '100 Ha', 'Seluas langit dan bumi', 'Tidak ada penggaris', '3cm'),
(23, NULL, 2, 'Where is your house?', 'I live in bandung', 'I dont have any pencil', 'Alright, let\'s go then', 'I love you', 'I live in bandung'),
(25, NULL, 3, 'apa saja yang tidak dibutuhkan untuk mengukur luas lingkaran?', 'phi', 'r', 'd', 'luas', 'luas'),
(28, '/ujianTA/soal/img/ipa/2c458366f207704e59808b6e7f25cf0e.jpg', 4, 'Bagaimana mereka bertahan hidup?', 'Memakan tumbuhan', 'Memakan sesamanya', 'Memakan manusia', 'Beradaptasi di dalam es', 'Memakan manusia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `nis`, `password`, `token`) VALUES
(1, 'fadil', 'fadil@gmail.com', '123456789', ''),
(22, 'fad', 'fad@gmail.com', '$2y$10$NPikf/cG0GRJ1', ''),
(26, 'fadil', '2018', '$2y$10$2qq4fKE5ItdK6CBRARZQuuspZdSAL6UiZzzosfjW8goqGs/BulCES', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE1OTgyMTMxODMsImV4cCI6MTU5ODIxMzI0MywiZGF0YSI6eyJ1c2VyX2lkIjoiMjYifX0.it0L5MjhFQqf5N-j42bmaTrjtgOmEAjLDfRZDjPHQGM'),
(27, 'nova', '1025', '$2y$10$cM2MCzReFb52zESp7hLhl.0sibRcL50jquqy6jj1.MBugmA3SRtCK', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE1OTc4NTM4MzAsImV4cCI6MTU5Nzg1Mzg5MCwiZGF0YSI6eyJ1c2VyX2lkIjoiMjcifX0.7jg9LcrDSpgeo5AQN0EIRaIEfYdNVjD8Hy2EAMfrIBk'),
(28, 'Dilo', '2027', '$2y$10$Em0XQuSiXD.AuJAsH5jHHut64Y7vq9mXdSXE//r22u2oykKSfoAku', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE1OTc4NTM4MDcsImV4cCI6MTU5Nzg1Mzg2NywiZGF0YSI6eyJ1c2VyX2lkIjoiMjgifX0.GOlfXqo1R0HKIxqEAEbD1ktvZSh2mf5VKdxcUctPZCk'),
(29, 'Mantan', '2015', '$2y$10$rSU/slU2j2n4uJsTDGjv8Omr9AQ.fSqmeJhO7ez9LA3mdhLA7TCLW', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE1OTc4NTYyMzMsImV4cCI6MTU5Nzg1NjI5MywiZGF0YSI6eyJ1c2VyX2lkIjoiMjkifX0.YPIuY3oGMigB-HeotuuwZD1_A3XfGRjjlIv-2Dpm_I0'),
(32, 'spongebob', '9999', '$2y$10$5t0pUiEkp1M5/LV1jCrx2e63ovXSrq/KxOE2XbrFqndiBK/lUmnKC', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE1OTgyODk5MTAsImV4cCI6MTU5ODI4OTk3MCwiZGF0YSI6eyJ1c2VyX2lkIjoiMzIifX0.OTpPfaNJqqY1c1bRHbV2_GmzkedGNYZ-hOgluMco130');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_jawab`
--
ALTER TABLE `tb_jawab`
  ADD PRIMARY KEY (`id_jawab`);

--
-- Indexes for table `tb_matpel`
--
ALTER TABLE `tb_matpel`
  ADD PRIMARY KEY (`id_matpel`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_nis`
--
ALTER TABLE `tb_nis`
  ADD PRIMARY KEY (`id_nis`);

--
-- Indexes for table `tb_soal`
--
ALTER TABLE `tb_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jawab`
--
ALTER TABLE `tb_jawab`
  MODIFY `id_jawab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_matpel`
--
ALTER TABLE `tb_matpel`
  MODIFY `id_matpel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_nis`
--
ALTER TABLE `tb_nis`
  MODIFY `id_nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_soal`
--
ALTER TABLE `tb_soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;