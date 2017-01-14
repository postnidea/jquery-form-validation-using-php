-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 05:56 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `validation`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`) VALUES
(1, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(2, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(3, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(4, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(5, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(6, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(7, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(8, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(9, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(10, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(11, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(12, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(13, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(14, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(15, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(16, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(17, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(18, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(19, '', 'd41d8cd98f00b204e9800998ecf8427e', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
