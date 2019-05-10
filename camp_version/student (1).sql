-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2019 at 10:52 AM
-- Server version: 5.6.38
-- PHP Version: 7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camp_s60_60160027`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(10) UNSIGNED NOT NULL,
  `std_code` varchar(10) DEFAULT NULL,
  `std_pf_id` int(11) DEFAULT NULL COMMENT 'คำนำหน้าชื่อ Prefix',
  `std_name` varchar(50) NOT NULL,
  `std_lname` varchar(50) NOT NULL,
  `std_dob` date DEFAULT NULL COMMENT 'Date Of Birth',
  `std_age` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'อายุ',
  `std_gd_id` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'เพศ',
  `std_ms_id` tinyint(3) UNSIGNED DEFAULT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_code`, `std_pf_id`, `std_name`, `std_lname`, `std_dob`, `std_age`, `std_gd_id`, `std_ms_id`) VALUES
(1, '62160034', 2, 'Min-ju', 'Kim', '2001-02-05', 18, 2, 1),
(2, '62160035', 2, 'Tzu-yu', 'Chou', '1999-06-14', 19, 2, 1),
(3, '62160075', 2, 'Ji-heon', 'Baek', '2003-04-17', 15, 2, 1),
(4, '62160023', 1, 'Jackson', 'Wang', '1994-03-28', 24, 1, 2),
(5, '62160048', 1, 'Jin-hwan', 'Kim', '1994-02-07', 25, 1, 2),
(6, '11111', 0, 'werwe', 'หกฟดฟกหด', '2019-04-05', 0, 1, 2),
(7, '<br>', 0, '', '', '2019-05-05', 0, NULL, 0),
(8, '', 0, '', '', '2019-04-10', 0, NULL, 0),
(9, '', 0, '', '', '2019-04-10', 0, NULL, 0),
(10, '', 0, '', '', '2019-04-10', 0, NULL, 0),
(11, '', 0, '', '', '2019-04-10', 0, NULL, 0),
(12, '', 0, '', '', '2019-04-10', 0, NULL, 0),
(13, '', 0, '', '', '2019-04-10', 0, NULL, 0),
(14, '', 0, '', '', '2019-04-10', 0, NULL, 0),
(15, '<br>', 0, '', '', '2019-04-10', 0, NULL, 0),
(16, '', 0, '', '', '2019-04-10', 0, NULL, 0),
(17, '', 0, '', '', '2019-04-10', 0, NULL, 1),
(18, '', 0, '', '', '0000-00-00', 0, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`),
  ADD KEY `fk_student_gender1_idx` (`std_gd_id`),
  ADD KEY `fk_student_marital_status1_idx` (`std_ms_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
