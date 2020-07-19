-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2020 at 11:54 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `language1` varchar(255) NOT NULL,
  `language2` varchar(255) NOT NULL,
  `language3` varchar(255) NOT NULL,
  `phoneno` bigint(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `gender`, `language1`, `language2`, `language3`, `phoneno`, `address`, `password`) VALUES
(7, 'eerer', 'ggdh@gmail.com', 'male', 'spanish', 'german', 'latin', 9247225957, 'a@gmail.com ', 'c0cb50685a77f4af75ae36e473b1bfaeaecbd40b6addc1c1e7bcfd1d4fc3d653d1c2ca8986511a94e0890aa082bd45948b734d9241c514a1a02bc173e9349f61'),
(8, 'saewjsn', 'csr@gmail.com', 'male', 'spanish', 'german', 'latin', 9247225957, 'a@gmail.com ', 'c0cb50685a77f4af75ae36e473b1bfaeaecbd40b6addc1c1e7bcfd1d4fc3d653d1c2ca8986511a94e0890aa082bd45948b734d9241c514a1a02bc173e9349f61'),
(9, 'saewjsn', 'cs@gmail.com', 'male', 'spanish', 'german', 'latin', 9247225957, 'a@gmail.com ', 'c0cb50685a77f4af75ae36e473b1bfaeaecbd40b6addc1c1e7bcfd1d4fc3d653d1c2ca8986511a94e0890aa082bd45948b734d9241c514a1a02bc173e9349f61');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
