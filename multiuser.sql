-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2023 pada 03.17
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `Id_admin` int(11) NOT NULL,
  `password` varchar(8) NOT NULL,
  `nama_admin` varchar(35) NOT NULL,
  `NoTelpon` varchar(12) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`Id_admin`, `password`, `nama_admin`, `NoTelpon`, `Email`) VALUES
(5501, '123456', 'Jajang Mulyono S.Kom.', '085145645655', 'jajangmulyono@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_bimbingan`
--

CREATE TABLE `daftar_bimbingan` (
  `no_bimbingan` int(2) NOT NULL,
  `NIM` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daftar_bimbingan`
--

INSERT INTO `daftar_bimbingan` (`no_bimbingan`, `NIM`, `tanggal`, `keterangan`) VALUES
(1, 2055, '2023-07-12', 'bimbingan sampai pintar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `NIDN` int(11) NOT NULL,
  `password` varchar(8) NOT NULL,
  `nama_dosen` varchar(35) NOT NULL,
  `NoTelpon` varchar(12) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`NIDN`, `password`, `nama_dosen`, `NoTelpon`, `Email`) VALUES
(2000, '111', 'Sukijan', '0811223344', 'sukijan23@gmail.com'),
(7501, '000', 'Budi Setyo S.kom., M.Kom.', '081246546489', 'Budisetyo@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `idJadwal` int(11) NOT NULL,
  `NIM` int(11) NOT NULL,
  `idskripsi` int(11) NOT NULL,
  `NIDN1` int(11) NOT NULL,
  `NIDN2` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `sesi` varchar(5) NOT NULL,
  `ruang` varchar(5) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`idJadwal`, `NIM`, `idskripsi`, `NIDN1`, `NIDN2`, `tanggal`, `sesi`, `ruang`, `detail`, `status`) VALUES
(1, 2055, 1, 2000, 7501, '2023-07-21', '1', '701', 'butuh duit', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NIM` int(11) NOT NULL,
  `password` varchar(8) NOT NULL,
  `nama_Mahasiswa` varchar(35) NOT NULL,
  `NoTelpon` varchar(12) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `password`, `nama_Mahasiswa`, `NoTelpon`, `Email`) VALUES
(2055, '000', 'Muhammad Dzulkarnain', '081564849498', 'Dzulkarnain5@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE `skripsi` (
  `idskripsi` int(11) NOT NULL,
  `NIM` int(11) NOT NULL,
  `NIDN1` int(11) NOT NULL,
  `NIDN2` int(11) NOT NULL,
  `judulSkripsiEN` varchar(100) NOT NULL,
  `topikSkripsiEN` varchar(100) NOT NULL,
  `abstrakSkripsi` varchar(100) NOT NULL,
  `judulSkripsi` varchar(100) NOT NULL,
  `topikSkripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `skripsi`
--

INSERT INTO `skripsi` (`idskripsi`, `NIM`, `NIDN1`, `NIDN2`, `judulSkripsiEN`, `topikSkripsiEN`, `abstrakSkripsi`, `judulSkripsi`, `topikSkripsi`) VALUES
(1, 2055, 2000, 7501, 'inoo', 'inovation', 'lala', 'ino', 'inovasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id_admin`);

--
-- Indeks untuk tabel `daftar_bimbingan`
--
ALTER TABLE `daftar_bimbingan`
  ADD KEY `NIM` (`NIM`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIDN`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idJadwal`),
  ADD KEY `NIM` (`NIM`),
  ADD KEY `idskripsi` (`idskripsi`),
  ADD KEY `NIDN1` (`NIDN1`),
  ADD KEY `NIDN2` (`NIDN2`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Indeks untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`idskripsi`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `daftar_bimbingan`
--
ALTER TABLE `daftar_bimbingan`
  ADD CONSTRAINT `daftar_bimbingan_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`);

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`idskripsi`) REFERENCES `skripsi` (`idskripsi`),
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`NIDN1`) REFERENCES `dosen` (`NIDN`),
  ADD CONSTRAINT `jadwal_ibfk_5` FOREIGN KEY (`NIDN2`) REFERENCES `dosen` (`NIDN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
