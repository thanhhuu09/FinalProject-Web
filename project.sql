-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 02:52 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` bit(1) DEFAULT b'0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `activated`, `name`, `position`, `department`, `avatar`) VALUES
('admin', '$2y$10$JcxFn78tS5.xWIROqi3L.OoJPotN5sFKZAknQuQqSRZ2.MqCBhRSW', b'1', 'Nguyễn Hữu Huy', 'Giám đốc', NULL, 'avatar.jpg'),
('hellboy', '$2y$10$j3RozlxPq3lK25GeHDXahOVL.CBjzYMQSIDcuRLDrxweaySjTS/wC', b'0', 'Alice Nguyen', 'Trưởng phòng', 'Kế toán', 'avatar.jpg'),
('sangsinh', '$2y$10$FuzLtAgsZ6ke/sKArGht..5mhZvSqgkp/OuDPjTGDF7m1aqwZRE7.', b'1', 'Sang Sinh', 'Trưởng phòng', 'Nhân sự', 'avatar.jpg'),
('tommy', '$2y$10$yEOA4SPfJgeXL/bPvsB7auqeRkp1PUfQkex8l/L9zdY9XUkgKqE6a', b'1', 'Tommy Thach', 'Nhân viên', 'Công nghệ thông tin', 'avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deadline` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deadtime` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `describ` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `process` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `name`, `employee`, `deadline`, `deadtime`, `describ`, `file`, `process`) VALUES
(11, 'Thêm giao diện đi ba', '1', '2022-01-05', '11:59', 'Không có m', '', 0),
(12, 'Thêm giao diện đi ba', '1', '2022-01-05', '11:59', 'Không có m', '../task_data/Công nhân, tư sản, tiểu tư sản.docx', 0),
(13, 'Thêm giao diện đi ba', '1', '2022-01-05', '11:59', 'Không có m', 'D:/XAMPP/htdocs../task_data/Công nhân, tư sản, tiểu tư sản.docx', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
