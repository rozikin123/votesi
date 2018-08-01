-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2018 at 01:13 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `level`) VALUES
('admin', 'admin', 'admin'),
('user', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `poling`
--

CREATE TABLE `poling` (
  `id_poling` int(5) NOT NULL,
  `nama` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `Jurusan` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `VM` text COLLATE latin1_general_ci NOT NULL,
  `pilihan` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `rating` int(5) NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `poling`
--

INSERT INTO `poling` (`id_poling`, `nama`, `Jurusan`, `VM`, `pilihan`, `rating`, `aktif`) VALUES
(2, 'Alex Junardi', 'Sarjana Pusing', 'Menghilang kan penyakit pusing yang diderita mahasiswa', 'Pilih no 1', 2, 'Y'),
(3, 'Smith Darno', 'Sarjana Cekot', 'Meningkatkan perasaan cekot cekot dalam mengerjakan sesuatu', 'Pilih saya untuk kemajuan', 15, 'Y'),
(4, 'Elisa Darmi', 'Sarjana Susah', 'Mengurangi tingkat kesusuhan mahasiswa dalam mengerjakan tugas', 'Pilih saya untuk menghilangkan tugas', 1, 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poling`
--
ALTER TABLE `poling`
  ADD PRIMARY KEY (`id_poling`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poling`
--
ALTER TABLE `poling`
  MODIFY `id_poling` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
