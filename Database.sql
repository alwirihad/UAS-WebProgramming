-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 08:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiuser`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id_admin` int(11) NOT NULL,
  `password` varchar(8) NOT NULL,
  `nama_admin` varchar(35) NOT NULL,
  `NoTelpon` varchar(12) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id_admin`, `password`, `nama_admin`, `NoTelpon`, `Email`) VALUES
(5501, '123456', 'Jajang Mulyono S.Kom.', '085145645655', 'jajangmulyono@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_bimbingan`
--

CREATE TABLE `daftar_bimbingan` (
  `no_bimbingan` int(2) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NIDN` int(11) NOT NULL,
  `password` varchar(8) NOT NULL,
  `nama_dosen` varchar(35) NOT NULL,
  `NoTelpon` varchar(12) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIDN`, `password`, `nama_dosen`, `NoTelpon`, `Email`) VALUES
(7501, '000', 'Budi Setyo S.kom., M.Kom.', '081246546489', 'Budisetyo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idJadwal` int(11) NOT NULL,
  `NIM` int(11) NOT NULL,
  `dospen1` varchar(35) NOT NULL,
  `dospen2` varchar(35) NOT NULL,
  `dospen3` varchar(35) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `ruang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` int(11) NOT NULL,
  `password` varchar(8) NOT NULL,
  `nama_Mahasiswa` varchar(35) NOT NULL,
  `NoTelpon` varchar(12) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `password`, `nama_Mahasiswa`, `NoTelpon`, `Email`) VALUES
(2011, '1234', 'Muhammad FAKKK', '08123564658', 'Fakkk@gmail.com'),
(2055, '000', 'Muhammad Dzulkarnain', '081564849498', 'Dzulkarnain5@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `skripsi`
--

CREATE TABLE `skripsi` (
  `judulSkripsiEN` varchar(100) NOT NULL,
  `topikSkripsiEN` varchar(100) NOT NULL,
  `abstrakSkripsi` varchar(100) NOT NULL,
  `judulSkripsi` varchar(100) NOT NULL,
  `topikSkripsi` varchar(100) NOT NULL,
  `NIM` int(11) NOT NULL,
  `dosenPembimbing1` varchar(35) NOT NULL,
  `dosenPembimbing2` varchar(35) NOT NULL,
  `idSkripsi` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skripsi`
--

INSERT INTO `skripsi` (`judulSkripsiEN`, `topikSkripsiEN`, `abstrakSkripsi`, `judulSkripsi`, `topikSkripsi`, `NIM`, `dosenPembimbing1`, `dosenPembimbing2`, `idSkripsi`) VALUES
('inoo', 'inovation', 'lala', 'ino', 'inovasi', 0, 'mala', 'bala', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIDN`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idJadwal`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`idSkripsi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
