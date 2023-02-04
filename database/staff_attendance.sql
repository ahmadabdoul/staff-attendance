-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 05:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `staff_attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `year` varchar(50) NOT NULL,
  `month` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL,
  `status` enum('absent','present') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `staff_id`, `date`, `year`, `month`, `day`, `status`) VALUES
(3, 2, '2023-02-21', '2023', '02', '21', 'absent'),
(4, 2, '2023-02-22', '2023', '02', '22', 'absent'),
(5, 1, '2023-01-01', '2023', '1', '1', 'present'),
(6, 2, '2023-01-01', '2023', '1', '1', 'present'),
(7, 3, '2023-01-01', '2023', '1', '1', 'absent'),
(8, 4, '2023-01-01', '2023', '1', '1', 'present'),
(9, 5, '2023-01-01', '2023', '1', '1', 'present'),
(10, 1, '2023-01-02', '2023', '1', '2', 'present'),
(11, 2, '2023-01-02', '2023', '1', '2', 'present'),
(12, 3, '2023-01-02', '2023', '1', '2', 'present'),
(13, 4, '2023-01-02', '2023', '1', '2', 'absent'),
(14, 5, '2023-01-02', '2023', '1', '2', 'present'),
(15, 1, '2023-01-03', '2023', '1', '3', 'present'),
(16, 2, '2023-01-03', '2023', '1', '3', 'absent'),
(17, 3, '2023-01-03', '2023', '1', '3', 'present'),
(18, 4, '2023-01-03', '2023', '1', '3', 'present'),
(19, 5, '2023-01-03', '2023', '1', '3', 'present'),
(20, 1, '2023-01-04', '2023', '1', '4', 'present'),
(21, 2, '2023-01-04', '2023', '1', '4', 'absent'),
(22, 3, '2023-01-04', '2023', '1', '4', 'present'),
(23, 4, '2023-01-04', '2023', '1', '4', 'absent'),
(24, 5, '2023-01-04', '2023', '1', '4', 'present'),
(25, 1, '2023-01-05', '2023', '1', '5', 'present'),
(26, 2, '2023-01-05', '2023', '1', '5', 'present'),
(27, 3, '2023-01-05', '2023', '1', '5', 'absent'),
(28, 4, '2023-01-05', '2023', '1', '5', 'absent'),
(29, 5, '2023-01-05', '2023', '1', '5', 'present'),
(30, 2, '2023-01-27', '2023', '01', '27', 'absent'),
(31, 2, '2023-02-04', '2023', '02', '04', 'present'),
(32, 3, '2023-02-04', '2023', '02', '04', 'present');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `salary` int(11) NOT NULL,
  `position` varchar(100) NOT NULL,
  `date_hired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `salary`, `position`, `date_hired`) VALUES
(1, 'John Doe', 10000, 'Manager', '2022-01-01'),
(2, 'Jane Doe', 10000, 'Developer', '2022-02-01'),
(3, 'Jim Smith', 10000, 'Designer', '2022-03-01'),
(4, 'Sara Lee', 10000, 'Tester', '2022-04-01'),
(5, 'Tom Davis', 10000, 'Support', '2022-05-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
