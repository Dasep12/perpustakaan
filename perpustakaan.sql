-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 07:54 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(60) NOT NULL,
  `admin` varchar(60) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `level` varchar(60) NOT NULL,
  `id_anggota` varchar(60) NOT NULL,
  `no_telepon` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `profile` varchar(60) NOT NULL,
  `folder` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `admin`, `pass`, `level`, `id_anggota`, `no_telepon`, `email`, `profile`, `folder`) VALUES
(37, 'Sri Wahyuni', '555', 'User', '005', '0838256220', 'sri@gmail.com', 'images (1).jpeg', 'profile/'),
(38, 'Dasep Depiyawan', '123', 'User', '001', '083821619460', 'dasep@gmail.com', 'IMG-20180920-WA0010.jpg', 'profile/'),
(39, 'Rika Nurjanah', '123', 'User', '056', '08180896650', 'Rika@gmail.com', 'Screenshot_20190123-062605.png', 'profile/'),
(40, 'Andi Gunawan', '123', 'User', '896', '0896565656', 'Andi@gmail.com', 'logo-perpus.png', 'profile/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
