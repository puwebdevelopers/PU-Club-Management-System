-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2019 at 12:55 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `photo`) VALUES
(1, 'Web Development', 'a.jpg'),
(2, 'Android Development', 'b.jpg'),
(3, 'Cyber Security', 'c.jpg'),
(4, 'Animation', 'd.jpg'),
(5, 'Hardware', 'e.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `department_heads`
--

CREATE TABLE `department_heads` (
  `id` int(11) NOT NULL,
  `member_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_heads`
--

INSERT INTO `department_heads` (`id`, `member_id`) VALUES
(1, '22');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `email`, `password`, `username`, `status`, `created_on`, `department_id`) VALUES
(22, 'admin@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900', 'admin', '1', '2019-08-21 22:25:05', 0),
(23, 'one@gmail.com', '202cb962ac59075b964b07152d234b70', 'one', '1', '2019-08-21 22:25:55', 0),
(24, 'two@gmail.com', '202cb962ac59075b964b07152d234b70', 'two', '1', '2019-08-21 22:26:13', 0),
(25, 'three@gmail.com', '202cb962ac59075b964b07152d234b70', 'three', '1', '2019-08-21 22:26:31', 0),
(26, 'four@gmail.com', '202cb962ac59075b964b07152d234b70', 'four', '1', '2019-08-21 22:26:49', 0),
(27, 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 'test', '1', '2019-08-21 22:27:09', 0),
(28, 'five@gmail.com', '202cb962ac59075b964b07152d234b70', 'five', '1', '2019-08-21 22:27:25', 0),
(29, 'six@gmail.com', '202cb962ac59075b964b07152d234b70', 'six', '1', '2019-08-21 22:27:44', 0),
(30, 'seven@gmail.com', '202cb962ac59075b964b07152d234b70', 'seven', '1', '2019-08-21 22:28:00', 0),
(31, 'eight@gmail.com', '202cb962ac59075b964b07152d234b70', 'eight', '1', '2019-08-21 22:28:20', 0),
(32, 'nine@gmail.com', '202cb962ac59075b964b07152d234b70', 'nine', '1', '2019-08-21 22:28:40', 0),
(33, 'ten@gmail.com', '202cb962ac59075b964b07152d234b70', 'ten', '1', '2019-08-21 22:28:56', 0),
(34, 'new@gmail.com', '202cb962ac59075b964b07152d234b70', 'new', '1', '2019-08-21 22:29:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year_of_study` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `member_id`, `course`, `year_of_study`, `skills`, `notes`, `photo`) VALUES
(1, '22', 'Comp', '1', 'php', 'I love codig', '1.jpg'),
(2, '23', 'IT', '1', 'java', 'code for life', '2.jpg'),
(3, '24', 'Comp', '2', 'javascript', 'ever coding', '3.jpg'),
(4, '25', 'IT', '3', 'python', 'code code code', '4.jpg'),
(5, '26', 'IT', '1', 'PHP', 'Code code', '5.jpg'),
(6, '27', 'Comp', '1', 'PHP', 'Write code', '6.jpg'),
(7, '28', 'BBIT', '2', 'JAVA', 'always coding', '7.jpg'),
(8, '29', 'TELCOM', '2', 'JavaScript', 'coding for life', '8.jpg'),
(9, '30', 'Comp', '3', 'JavaScript', 'I love coding', '9.jpg'),
(10, '31', 'BBIT', '3', 'Ruby', 'coding is my thing', '10.jpg'),
(11, '32', 'BBIT', '4', 'Python', 'code for ever', '11.jpg'),
(12, '33', 'TELCOM', '4', 'Python', 'code  code', '12.jpg'),
(13, '34', 'TELCOM', '3', 'Python', 'code code code', '13.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_heads`
--
ALTER TABLE `department_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department_heads`
--
ALTER TABLE `department_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
