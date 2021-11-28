-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 05:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wad_modul4`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `nama_tempat`, `lokasi`, `harga`, `tanggal`) VALUES
(22, 7, 'Raja Ampat', 'Papua', 7000000, '2021-11-28'),
(23, 7, 'Gunung Bromo', 'Malang', 2000000, '2021-11-29'),
(28, 7, 'Tanah Lot', 'Bali', 5000000, '2021-11-28'),
(29, 11, 'Raja Ampat', 'Papua', 7000000, '2021-11-28'),
(37, 11, 'Gunung Bromo', 'Malang', 2000000, '2021-11-25'),
(38, 11, 'Tanah Lot', 'Bali', 5000000, '2021-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `no_hp`) VALUES
(2, 'Asep Solihudin', 'asep12@gmail.com', '$2y$10$vCNuqgoIH2Am6y8n0xYrAeHQhGhTUDAMqmrO4BuQnl1smf86IjZfq', '087722669966'),
(7, 'Komarudin', 'komar07@gmail.com', '$2y$10$20A9IltfJhP/Q5iY0ZZoiOg5svwKhtGm52l1NORj0S9tHviZ.J2kK', '087722332233'),
(11, 'Fakhri Hassan Maulana', 'fakhrihassanm12@gmail.com', '$2y$10$UGU3/MUp4UtcHQ60Xj8VfOi2ngFXLBBZy8RldlAwFa20R/K7stAQy', '087722664906');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
