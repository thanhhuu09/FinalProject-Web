-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2022 lúc 03:54 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
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
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `password`, `activated`, `name`, `position`, `department`, `avatar`) VALUES
('admin', '$2y$10$JcxFn78tS5.xWIROqi3L.OoJPotN5sFKZAknQuQqSRZ2.MqCBhRSW', b'1', 'Nguyễn Hữu Huy', 'Giám đốc', NULL, 'avatar.jpg'),
('hellboy', '$2y$10$j3RozlxPq3lK25GeHDXahOVL.CBjzYMQSIDcuRLDrxweaySjTS/wC', b'0', 'Alice Nguyen', 'Trưởng phòng', 'Kế toán', 'avatar.jpg'),
('sangsinh', '$2y$10$FuzLtAgsZ6ke/sKArGht..5mhZvSqgkp/OuDPjTGDF7m1aqwZRE7.', b'1', 'Sang Sinh', 'Trưởng phòng', 'Nhân sự', 'avatar.jpg'),
('tommy', '$2y$10$yEOA4SPfJgeXL/bPvsB7auqeRkp1PUfQkex8l/L9zdY9XUkgKqE6a', b'1', 'Tommy Thach', 'Nhân viên', 'Công nghệ thông tin', 'avatar.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
