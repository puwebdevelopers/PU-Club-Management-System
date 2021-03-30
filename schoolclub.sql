-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 04:28 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
-- Table structure for table `access_logs`
--

CREATE TABLE `access_logs` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_logs`
--

INSERT INTO `access_logs` (`id`, `email`, `date`, `time`) VALUES
(1, 'vic@gmail.com', '2019-09-17', '22:37:37'),
(2, 'ten@gmail.com', '2019-09-17', '22:38:07'),
(3, 'ten@gmail.com', '2019-09-17', '22:38:17'),
(4, 'vic@gmail.com', '2019-09-17', '22:39:07'),
(5, 'vic@gmail.com', '2019-09-17', '22:40:01'),
(6, 'ten@gmail.com', '2019-09-17', '22:40:34'),
(7, 'ten@gmail.com', '2019-09-17', '22:41:09'),
(8, 'vic@gmail.com', '2019-09-17', '22:49:31'),
(10, 'ten@gmail.com', '2019-09-17', '22:55:27'),
(11, 'vic@gmail.com', '2019-09-17', '22:55:32'),
(12, 'vic@gmail.com', '2019-09-17', '22:56:49'),
(13, 'vic@gmail.com', '2019-09-19', '20:44:52'),
(14, 'vic@gmail.com', '2019-09-20', '15:56:52'),
(15, 'vic@gmail.com', '2019-09-20', '16:20:10'),
(16, 'vic@gmail.com', '2019-09-20', '16:20:16'),
(17, 'vic@gmail.com', '2019-09-20', '16:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `to_user` varchar(10) NOT NULL,
  `from_user` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
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
  `member_id` varchar(255) NOT NULL,
  `dept_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_heads`
--

INSERT INTO `department_heads` (`id`, `member_id`, `dept_id`) VALUES
(1, '22', ''),
(6, '22', '8');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL DEFAULT 1,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `department_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `adm` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `email`, `password`, `username`, `status`, `created_on`, `department_id`, `year`, `location`, `photo`, `course`, `adm`) VALUES
(22, 'admin@gmail.com', 'd81f9c1be2e08964bf9f24b15f0e4900', 'admin', 1, '2019-08-21 22:25:05', 1, 1, '', '', NULL, NULL),
(23, 'nae@gmail.com', '202cb962ac59075b964b07152d234b70', 'Vic', 1, '2019-08-21 22:25:55', 2, 2, '127.0.0.1', '', NULL, NULL),
(24, 'two@gmail.com', '202cb962ac59075b964b07152d234b70', 'two', 1, '2019-08-21 22:26:13', 3, 3, '', '', NULL, NULL),
(25, 'three@gmail.com', '202cb962ac59075b964b07152d234b70', 'three', 1, '2019-08-21 22:26:31', 4, 4, '', '', NULL, NULL),
(26, 'four@gmail.com', '202cb962ac59075b964b07152d234b70', 'four', 1, '2019-08-21 22:26:49', 5, 1, '', '', NULL, NULL),
(27, 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 'test', 1, '2019-08-21 22:27:09', 1, 2, '', '', NULL, NULL),
(28, 'five@gmail.com', '202cb962ac59075b964b07152d234b70', 'five', 1, '2019-08-21 22:27:25', 2, 3, '', '', NULL, NULL),
(29, 'six@gmail.com', '202cb962ac59075b964b07152d234b70', 'six', 1, '2019-08-21 22:27:44', 3, 4, '', '', NULL, NULL),
(30, 'seven@gmail.com', '202cb962ac59075b964b07152d234b70', 'seven', 1, '2019-08-21 22:28:00', 4, 1, '', '', NULL, NULL),
(31, 'eight@gmail.com', '202cb962ac59075b964b07152d234b70', 'eight', 1, '2019-08-21 22:28:20', 5, 2, '', '', NULL, NULL),
(32, 'nine@gmail.com', '202cb962ac59075b964b07152d234b70', 'nine', 1, '2019-08-21 22:28:40', 1, 3, '', '', NULL, NULL),
(33, 'ten@gmail.com', '202cb962ac59075b964b07152d234b70', 'ten', 1, '2019-08-21 22:28:56', 2, 4, '', '', NULL, NULL),
(34, 'new@gmail.com', '202cb962ac59075b964b07152d234b70', 'new', 1, '2019-08-21 22:29:16', 3, 1, '', '', NULL, NULL),
(39, 'vic@gmail.com', '$2y$10$EN9yijuOW85WCXeOTea31OhtXplSr1kTvxJfNRizE/H7.tHw04B6y', 'Vic', 1, '2019-09-05 12:18:33', 1, 1, '127.0.0.1', 'includes/profiles/39.png', 'BSc. Computer Science', '2589632');

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

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `uid` varchar(10) NOT NULL,
  `skill` varchar(200) NOT NULL,
  `level` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `uid`, `skill`, `level`, `date`) VALUES
(7, '23', 'Android', 'Begginer', '2019-08-29 16:15:55'),
(8, '23', 'Android', 'Begginer', '2019-08-29 16:16:54'),
(9, '23', 'Web', 'Begginer', '2019-08-30 23:53:00'),
(10, '23', 'and', 'Begginer', '2019-08-30 23:54:04'),
(11, '23', 'an', 'Begginer', '2019-08-30 23:59:26'),
(12, '23', 'Web', 'Begginer', '2019-08-31 00:00:07'),
(13, '23', 'Web', 'Begginer', '2019-08-31 00:00:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_logs`
--
ALTER TABLE `access_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_logs`
--
ALTER TABLE `access_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department_heads`
--
ALTER TABLE `department_heads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
