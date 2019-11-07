-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 02:30 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama`, `password`, `email`) VALUES
('155150201111310', 'shafitri', '827ccb0eea8a706c4c34a16891f84e7b', 'hdkjas@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `judul_tugas`
--

CREATE TABLE `judul_tugas` (
  `id_jTugas` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `id_kelas` varchar(20) NOT NULL,
  `id_mapel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judul_tugas`
--

INSERT INTO `judul_tugas` (`id_jTugas`, `judul`, `id_kelas`, `id_mapel`) VALUES
(32, 'Tugas 1 Sejarah indonesia', 'KLS0006', 'MPU0004'),
(34, 'tugas 3 algoritma dasar', 'KLS0001', 'MPU0001'),
(35, 'tugas 4 agama', 'KLS0001', 'MPU0002'),
(36, 'algoritma', 'KLS0002', 'MPU0001'),
(37, 'Tugas 5 Statistika', 'KLS0001', 'MPU0001'),
(38, 'kuis 3', 'KLS0003', 'MPU0002');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(20) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
('id_kelas', '10 IPS 1'),
('KLS0001', '10 IPA 1'),
('KLS0002', '10 IPA 2'),
('KLS0003', '11 IPS 3'),
('KLS0005', '11 IPS 1'),
('KLS0006', '12 IPS 3');

-- --------------------------------------------------------

--
-- Table structure for table `kessay`
--

CREATE TABLE `kessay` (
  `id_kEssay` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kpilihan`
--

CREATE TABLE `kpilihan` (
  `id_kpilihan` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `pilihan_a` text NOT NULL,
  `pilihan_b` text NOT NULL,
  `pilihan_c` text NOT NULL,
  `pilihan_d` text NOT NULL,
  `kunci_jawaban` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nilai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` varchar(20) NOT NULL,
  `nama_mapel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
('MPU0001', 'Matematika'),
('MPU0002', 'Bahasa Indonesia'),
('MPU0003', 'Bahasa Inggris'),
('MPU0004', 'Seni Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(20) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `password`, `email`, `id_kelas`) VALUES
('12345', 'Shasa', ' 78b318cfbc9c02945a5f7a39af4e72d7', 'shasa@ky.com', 'KLS0002'),
('9972364759', 'Tasya', '202cb962ac59075b964b07152d234b70', 'hdkjas@gmail.com', 'KLS0001'),
('9978078458', 'Anita Rizky', '83349cbdac695f3943635a4fd1aaa7d0', 'anita@gmail.com', 'KLS0001');

-- --------------------------------------------------------

--
-- Table structure for table `tessay`
--

CREATE TABLE `tessay` (
  `id_tEssay` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `id_jTugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tessay`
--

INSERT INTO `tessay` (`id_tEssay`, `pertanyaan`, `id_jTugas`) VALUES
(12, '<p>dsyy</p>\r\n', 34),
(13, '<p>12sghs</p>\r\n', 35),
(14, '<p>sawhsej</p>\r\n', 37);

-- --------------------------------------------------------

--
-- Table structure for table `tpilihan`
--

CREATE TABLE `tpilihan` (
  `id_tpilihan` int(11) NOT NULL,
  `id_jTugas` int(11) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `pilihan_a` varchar(255) NOT NULL,
  `pilihan_b` varchar(255) NOT NULL,
  `pilihan_c` varchar(255) NOT NULL,
  `pilihan_d` varchar(255) NOT NULL,
  `jawaban` varchar(5) NOT NULL,
  `tgl_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `judul_tugas`
--
ALTER TABLE `judul_tugas`
  ADD PRIMARY KEY (`id_jTugas`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kessay`
--
ALTER TABLE `kessay`
  ADD PRIMARY KEY (`id_kEssay`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tessay`
--
ALTER TABLE `tessay`
  ADD PRIMARY KEY (`id_tEssay`),
  ADD KEY `id_jTugas` (`id_jTugas`);

--
-- Indexes for table `tpilihan`
--
ALTER TABLE `tpilihan`
  ADD PRIMARY KEY (`id_tpilihan`),
  ADD KEY `id_jTugas` (`id_jTugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `judul_tugas`
--
ALTER TABLE `judul_tugas`
  MODIFY `id_jTugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `kessay`
--
ALTER TABLE `kessay`
  MODIFY `id_kEssay` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tessay`
--
ALTER TABLE `tessay`
  MODIFY `id_tEssay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tpilihan`
--
ALTER TABLE `tpilihan`
  MODIFY `id_tpilihan` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `judul_tugas`
--
ALTER TABLE `judul_tugas`
  ADD CONSTRAINT `judul_tugas_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `judul_tugas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tessay`
--
ALTER TABLE `tessay`
  ADD CONSTRAINT `tessay_ibfk_1` FOREIGN KEY (`id_jTugas`) REFERENCES `judul_tugas` (`id_jTugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tpilihan`
--
ALTER TABLE `tpilihan`
  ADD CONSTRAINT `tpilihan_ibfk_1` FOREIGN KEY (`id_jTugas`) REFERENCES `judul_tugas` (`id_jTugas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
