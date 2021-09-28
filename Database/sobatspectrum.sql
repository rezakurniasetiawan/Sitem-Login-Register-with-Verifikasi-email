-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 02:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sobatspectrum`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hakakses` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`id`, `username`, `email`, `hakakses`, `date`) VALUES
(2, 'rezakurniasetiawan', 'rezakurniasetiawan@gmail.com', 'murid', '2021-09-28 13:13:21'),
(3, 'admin', 'rezanyutnyut@gmail.com', 'admin', '2021-09-28 13:14:22'),
(4, 'rezakurniasetiawan', 'rezakurniasetiawan@gmail.com', 'murid', '2021-09-28 13:36:37'),
(11, 'admin', 'rezanyutnyut@gmail.com', 'admin', '2021-09-28 14:02:16'),
(12, 'indriana', 'hairezanyut@gmail.com', 'tentor', '2021-09-28 14:05:07'),
(13, 'rendiherley', 'rezakurniabot1@gmail.com', 'murid', '2021-09-28 14:21:00'),
(14, 'admin', 'rezanyutnyut@gmail.com', 'admin', '2021-09-28 14:21:36'),
(15, 'indriana', 'hairezanyut@gmail.com', 'tentor', '2021-09-28 14:22:10'),
(16, 'rendiherley', 'rezakurniabot1@gmail.com', 'murid', '2021-09-28 14:25:52'),
(17, 'admin', 'rezanyutnyut@gmail.com', 'admin', '2021-09-28 14:25:59'),
(18, 'rezakurniasetiawan', 'rezakurniasetiawan@gmail.com', 'murid', '2021-09-28 14:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `resetpasswords`
--

CREATE TABLE `resetpasswords` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resetpasswords`
--

INSERT INTO `resetpasswords` (`id`, `code`, `email`) VALUES
(1, '16152d00d2245e', 'hairezanyut@gmail.com'),
(2, '16152d06772e5e', 'hairezanyut@gmail.com'),
(3, '16152d08a0655e', 'hairezanyut@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hakakses` varchar(100) NOT NULL,
  `verif_code` text NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `username`, `password`, `hakakses`, `verif_code`, `is_verified`) VALUES
(25, 'Reza', 'rezanyutnyut@gmail.com', 'admin', '$2y$10$qQs/41SM12aOh6rLTjGsRORS2TEwonF1OTKk/ENDLczILXrGifO3K', 'admin', '294959129aef7b6b48287d6ce22020d8', 1),
(26, 'Reza Kurnia Setiawan', 'rezakurniasetiawan@gmail.com', 'rezakurniasetiawan', '$2y$10$PQoFYQH0KTkuudeuSjYUAuqDAxEaqZQmFFQ.hDA3MTKAJsoQnJKuy', 'murid', '2723cd2cb6f31a7b1206319fd29613c6', 1),
(27, 'Sri Wiji Indriana', 'hairezanyut@gmail.com', 'indriana', '$2y$10$XNxbPQMHe78uCi53ecXiruyU0cERiz9EjoAF8HP/iEGyktzK3zx7K', 'tentor', '25279407401792a07f7ba53ed9754c40', 1),
(28, 'Rendy Herley', 'rezakurniabot1@gmail.com', 'rendiherley', '$2y$10$UK02moQwH7H/e0pHPNX6vuG4QGBPRMS55OKmqh7MlXHp43WusdI/W', 'murid', '15a4c1ea203738a7badc68ce010f462f', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resetpasswords`
--
ALTER TABLE `resetpasswords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `resetpasswords`
--
ALTER TABLE `resetpasswords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
