-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2017 at 06:53 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `role` varchar(5) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_developers`
--

CREATE TABLE `admin_developers` (
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` enum('mobile_developer','desktop_developer','web_developer','graphic_designer') DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `active` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_developers`
--

INSERT INTO `admin_developers` (`name`, `email`, `role`, `password`, `active`) VALUES
('Desktop Developer', 'desktop_developer@gmail.com', 'desktop_developer', '12345', 'N'),
('Graphic Designer', 'graphic_designer@gmail.com', 'graphic_designer', '12345', 'N'),
('Mobile App Developer', 'mobile_developer@gmail.com', 'mobile_developer', '12345', 'N'),
('Web Developer', 'web_developer@gmail.com', 'web_developer', '12345', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(35) NOT NULL,
  `role` varchar(40) NOT NULL DEFAULT 'client',
  `password` varchar(20) NOT NULL,
  `acc_creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `active` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`name`, `email`, `dob`, `country`, `role`, `password`, `acc_creation_date`, `active`) VALUES
('Khawer Khan', 'kk123@gmail.com', '0000-00-00', 'Pakistan', 'client', '12345', '2017-08-23 13:38:25', 'N'),
('Muhammad Hassan', 'm.hassan@hotmail.com', '1988-08-07', 'Pakistan', 'client', '12345', '2017-08-12 18:19:21', 'N'),
('Zahid Khan', 'zahir232@gmail.com', '1992-08-06', 'Pakistan', 'client', '12345', '2017-08-12 18:19:21', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `conversation`
--

CREATE TABLE `conversation` (
  `conversation_id` int(11) NOT NULL,
  `developer_email` varchar(30) NOT NULL,
  `client_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation`
--

INSERT INTO `conversation` (`conversation_id`, `developer_email`, `client_email`) VALUES
(6, 'desktop_developer@gmail.com', 'm.hassan@hotmail.com'),
(7, 'mobile_developer@gmail.com', 'm.hassan@hotmail.com'),
(8, 'graphic_designer@gmail.com', 'm.hassan@hotmail.com'),
(9, 'web_developer@gmail.com', 'm.hassan@hotmail.com'),
(10, 'desktop_developer@gmail.com', 'zahir232@gmail.com'),
(11, 'mobile_developer@gmail.com', 'zahir232@gmail.com'),
(12, 'desktop_developer@gmail.com', 'kk123@gmail.com'),
(13, 'graphic_designer@gmail.com', 'kk123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(250) NOT NULL,
  `developer_email` varchar(30) NOT NULL,
  `client_email` varchar(30) NOT NULL,
  `project_budget` float NOT NULL,
  `project_completion_report` enum('progress','cancelled','completed','') NOT NULL DEFAULT 'progress',
  `project_order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `project_deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `developer_email`, `client_email`, `project_budget`, `project_completion_report`, `project_order_date`, `project_deadline`) VALUES
(9, 'Online Quiz System', 'desktop_developer@gmail.com', 'm.hassan@hotmail.com', 111111000, 'completed', '2017-08-25 15:20:41', '2017-09-13 00:00:00'),
(11, 'Freelance Website', 'web_developer@gmail.com', 'zahir232@gmail.com', 20000000000, 'progress', '2017-08-23 07:20:41', '2017-08-23 00:00:00'),
(12, 'Quiz System', 'web_developer@gmail.com', 'm.hassan@hotmail.com', 560000, 'progress', '2017-08-23 07:20:41', '2017-08-31 00:00:00'),
(13, 'abc', 'desktop_developer@gmail.com', 'kk123@gmail.com', 10000, 'cancelled', '2017-08-25 15:20:44', '2017-08-25 00:00:00'),
(14, 'Online Quiz System', 'desktop_developer@gmail.com', 'm.hassan@hotmail.com', 234, 'progress', '2017-08-23 15:15:11', '2017-08-16 00:00:00'),
(15, 'Freelance Website', 'desktop_developer@gmail.com', 'kk123@gmail.com', 23453400, 'progress', '2017-08-23 15:14:40', '2017-08-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_read` char(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `sender`, `receiver`, `message`, `conversation_id`, `time`, `is_read`) VALUES
(1, 'm.hassan@hotmail.com', 'desktop_developer@gmail.com', 'hi', 6, '2017-08-22 08:44:54', 'no'),
(2, 'm.hassan@hotmail.com', 'mobile_developer@gmail.com', 'hey mobile developer', 7, '2017-08-23 09:05:50', 'no'),
(3, 'mobile_developer@gmail.com', 'm.hassan@hotmail.com', 'hi hassan', 7, '2017-08-23 09:07:47', 'no'),
(4, 'desktop_developer@gmail.com', 'zahir232@gmail.com', 'hi\n', 10, '2017-08-23 14:34:44', 'no'),
(5, 'desktop_developer@gmail.com', 'm.hassan@hotmail.com', 'hello how are you?', 6, '2017-08-25 08:22:07', 'no'),
(6, 'm.hassan@hotmail.com', 'desktop_developer@gmail.com', 'i\'m fine i need a ERP system\n', 6, '2017-08-25 08:26:57', 'no'),
(7, 'm.hassan@hotmail.com', 'mobile_developer@gmail.com', 'when he selects a type of project he is then enabled to chat with the required developer now i had tested this account on all so ', 7, '2017-08-25 15:16:12', 'no'),
(8, 'm.hassan@hotmail.com', 'mobile_developer@gmail.com', 'teh recent projects that he orderd there ending result etc so now ', 7, '2017-08-25 15:16:51', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_developers`
--
ALTER TABLE `admin_developers`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`conversation_id`),
  ADD KEY `developer_email` (`developer_email`),
  ADD KEY `client_email` (`client_email`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `developer_email` (`developer_email`),
  ADD KEY `client_email` (`client_email`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversation_id` (`conversation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `conversation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `conversation`
--
ALTER TABLE `conversation`
  ADD CONSTRAINT `conversation_ibfk_1` FOREIGN KEY (`client_email`) REFERENCES `clients` (`email`),
  ADD CONSTRAINT `conversation_ibfk_2` FOREIGN KEY (`developer_email`) REFERENCES `admin_developers` (`email`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`developer_email`) REFERENCES `admin_developers` (`email`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`client_email`) REFERENCES `clients` (`email`);

--
-- Constraints for table `sms`
--
ALTER TABLE `sms`
  ADD CONSTRAINT `sms_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`conversation_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
