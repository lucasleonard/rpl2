-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2016 at 12:15 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `password`) VALUES
(1, 'admin', '123'),
(2, 'fadhil', '123');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `npk` varchar(9) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`npk`, `nama`, `password`, `status`, `jabatan`) VALUES
('998800', 'dosen', '123', 1, 'Dosen'),
('998801', 'faishal', '123', 1, 'dosen'),
('998802', 'fadhil', '123', 1, 'Dosen'),
('998803', 'lucas', '123', 1, 'dosen'),
('998804', 'adit', '123', 1, 'dosen');

-- --------------------------------------------------------

--
-- Table structure for table `hub_dosen&jadwal_kegiatan_dosen`
--

CREATE TABLE `hub_dosen&jadwal_kegiatan_dosen` (
  `npk` int(9) NOT NULL,
  `id` int(9) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hub_dosen&jadwal_sidang_tugas_akhir`
--

CREATE TABLE `hub_dosen&jadwal_sidang_tugas_akhir` (
  `npk` int(9) NOT NULL,
  `id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kegiatan_dosen`
--

CREATE TABLE `jadwal_kegiatan_dosen` (
  `id` int(9) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `npk` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_kegiatan_dosen`
--

INSERT INTO `jadwal_kegiatan_dosen` (`id`, `tgl`, `jam`, `tanggal_mulai`, `tanggal_akhir`, `npk`) VALUES
(1, 'Thursday', '00:00:00', '0000-00-00', '0000-00-00', ''),
(2, 'Tuesday', '00:00:00', '0000-00-00', '0000-00-00', ''),
(3, '2016-11-14', '07.00-08.30', '0000-00-00', '0000-00-00', ''),
(4, '2016-11-15', '08.30-10.00', '0000-00-00', '0000-00-00', ''),
(5, '2016-11-16', '10.00-11.30', '0000-00-00', '0000-00-00', ''),
(6, '2016-11-17', '11.30-13.00', '0000-00-00', '0000-00-00', ''),
(7, '2016-11-18', '13.00-14.30', '0000-00-00', '0000-00-00', ''),
(8, '2016-11-19', '16.00-17.00', '0000-00-00', '0000-00-00', ''),
(9, '2016-11-14', '08.30-10.00', '0000-00-00', '0000-00-00', '998802'),
(10, '2016-11-16', '08.30-10.00', '0000-00-00', '0000-00-00', '998802'),
(11, '2016-11-17', '11.30-13.00', '0000-00-00', '0000-00-00', '998802'),
(12, '2016-11-18', '14.30-16.00', '0000-00-00', '0000-00-00', '998802');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_sidang_tugas_akhir`
--

CREATE TABLE `jadwal_sidang_tugas_akhir` (
  `id` int(9) NOT NULL,
  `nrp` int(9) NOT NULL,
  `anggota` varchar(100) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `ruang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_sidang_tugas_akhir`
--

INSERT INTO `jadwal_sidang_tugas_akhir` (`id`, `nrp`, `anggota`, `hari`, `jam`, `tanggal`, `ruang`) VALUES
(1, 160414040, 'Lucas Leonard', 'Senin', '07:16:26', '2016-11-23', 'TF 2.2');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nrp` varchar(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `hp` varchar(13) NOT NULL,
  `judul_ta` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `npk1` varchar(9) NOT NULL,
  `npk2` varchar(9) NOT NULL,
  `pra1` tinyint(1) NOT NULL,
  `pra2` tinyint(1) NOT NULL,
  `pra3` tinyint(1) NOT NULL,
  `pra4` tinyint(1) NOT NULL,
  `pra5` tinyint(1) NOT NULL,
  `pra6` tinyint(1) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nrp`, `nama`, `hp`, `judul_ta`, `status`, `npk1`, `npk2`, `pra1`, `pra2`, `pra3`, `pra4`, `pra5`, `pra6`, `password`) VALUES
('160414039', 'Putu Aditya', '08977348xxx', 'Judul Tugas Akhir', 1, '998801', '998802', 0, 0, 0, 0, 0, 0, ''),
('160414040', 'Lucas Leonard', '08977348xxx', 'Judul Tugas Akhir', 0, '998803', '998804', 1, 1, 1, 1, 1, 1, ''),
('160414053', 'Faishal Hendaryawan', '08977348xxx', 'Judul Tugas Akhir', 1, '998801', '998802', 0, 0, 0, 0, 0, 0, ''),
('160414063', 'Fadhil Amadan', '08977348xxx', 'Judul Tugas Akhir', 1, '998803', '998804', 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_ujian_tugas_akhir`
--

CREATE TABLE `pendaftaran_ujian_tugas_akhir` (
  `nomor` int(10) NOT NULL,
  `nrp` int(9) DEFAULT NULL,
  `periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id` int(11) NOT NULL,
  `buka` date NOT NULL,
  `tutup` date NOT NULL,
  `nama` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `buka`, `tutup`, `nama`, `status`) VALUES
(2, '2016-11-14', '2016-11-18', '2016/2017', 1),
(3, '2016-11-21', '2016-11-25', '2016/2017', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`npk`);

--
-- Indexes for table `hub_dosen&jadwal_kegiatan_dosen`
--
ALTER TABLE `hub_dosen&jadwal_kegiatan_dosen`
  ADD PRIMARY KEY (`npk`,`id`),
  ADD UNIQUE KEY `npk` (`npk`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `hub_dosen&jadwal_sidang_tugas_akhir`
--
ALTER TABLE `hub_dosen&jadwal_sidang_tugas_akhir`
  ADD PRIMARY KEY (`npk`,`id`),
  ADD UNIQUE KEY `npk` (`npk`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `jadwal_kegiatan_dosen`
--
ALTER TABLE `jadwal_kegiatan_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_sidang_tugas_akhir`
--
ALTER TABLE `jadwal_sidang_tugas_akhir`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nrp` (`nrp`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `pendaftaran_ujian_tugas_akhir`
--
ALTER TABLE `pendaftaran_ujian_tugas_akhir`
  ADD PRIMARY KEY (`nomor`),
  ADD UNIQUE KEY `nrp` (`nrp`),
  ADD UNIQUE KEY `nrp_2` (`nrp`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_kegiatan_dosen`
--
ALTER TABLE `jadwal_kegiatan_dosen`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `jadwal_sidang_tugas_akhir`
--
ALTER TABLE `jadwal_sidang_tugas_akhir`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pendaftaran_ujian_tugas_akhir`
--
ALTER TABLE `pendaftaran_ujian_tugas_akhir`
  MODIFY `nomor` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
