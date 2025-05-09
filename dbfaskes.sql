-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 12:54 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfaskes`
--

-- --------------------------------------------------------

--
-- Table structure for table `faskes`
--

CREATE TABLE `faskes` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_pengelola` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `kabkota_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `jenis_faskes_id` int(11) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_faskes`
--

CREATE TABLE `jenis_faskes` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis_faskes`
--

INSERT INTO `jenis_faskes` (`id`, `nama`) VALUES
(1, 'Puskesmas'),
(2, 'Rumah sakit');

-- --------------------------------------------------------

--
-- Table structure for table `kabkota`
--

CREATE TABLE `kabkota` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `provinsi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kabkota`
--

INSERT INTO `kabkota` (`id`, `nama`, `latitude`, `longitude`, `provinsi_id`) VALUES
(2, 'fwef', 0, 0, 1),
(3, 'dada', 9140938408, 124103401, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(3, 'Poli Umum'),
(4, 'Poli Gigi');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `ibukota` varchar(45) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`, `ibukota`, `latitude`, `longitude`) VALUES
(1, 'dasd', 'dad', 35235, 424324);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faskes`
--
ALTER TABLE `faskes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_faskes_kategori` (`kategori_id`),
  ADD KEY `fk_faskes_kabkota1` (`kabkota_id`),
  ADD KEY `fk_jenis_faskes` (`jenis_faskes_id`);

--
-- Indexes for table `jenis_faskes`
--
ALTER TABLE `jenis_faskes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabkota`
--
ALTER TABLE `kabkota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kabkota_provinsi1` (`provinsi_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faskes`
--
ALTER TABLE `faskes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_faskes`
--
ALTER TABLE `jenis_faskes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kabkota`
--
ALTER TABLE `kabkota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faskes`
--
ALTER TABLE `faskes`
  ADD CONSTRAINT `fk_faskes_kabkota1` FOREIGN KEY (`kabkota_id`) REFERENCES `kabkota` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_faskes_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jenis_faskes` FOREIGN KEY (`jenis_faskes_id`) REFERENCES `jenis_faskes` (`id`);

--
-- Constraints for table `kabkota`
--
ALTER TABLE `kabkota`
  ADD CONSTRAINT `fk_kabkota_provinsi1` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
