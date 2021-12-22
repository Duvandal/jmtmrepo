-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 11:55 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repo`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `KodePelaksana` varchar(255) NOT NULL,
  `Indeks` varchar(255) DEFAULT NULL,
  `Klasifikasi` varchar(255) DEFAULT NULL,
  `Unit` varchar(255) DEFAULT NULL,
  `Perihal` varchar(255) DEFAULT NULL,
  `Tahun` varchar(255) DEFAULT NULL,
  `TingkatPerkembangan` varchar(255) DEFAULT NULL,
  `Media` varchar(255) DEFAULT NULL,
  `Kondisi` varchar(255) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Lokasi` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `Retensi` varchar(255) DEFAULT NULL,
  `ARetensi` varchar(255) DEFAULT NULL,
  `TglDesk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`KodePelaksana`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
