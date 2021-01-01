-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 10:59 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlysinhvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `score1` int(11) NOT NULL,
  `score2` int(11) NOT NULL,
  `scoretotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `fullname` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fullname`, `birthday`, `address`) VALUES
(6, 'trà', '2020-12-16', 'hà Nội'),
(7, 'Phuong', '1997-08-25', 'Ha Noi');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `id_subject` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_subject` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `id_subject`, `name_subject`) VALUES
(1, '111', '111'),
(2, '111', '111'),
(3, '111', '111\r\n'),
(4, '111', '111\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_student` (`id_student`),
  ADD KEY `id_subject` (`id_subject`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `id_student` FOREIGN KEY (`id_student`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `id_subject` FOREIGN KEY (`id_subject`) REFERENCES `subject` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
