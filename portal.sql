-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2019 at 06:08 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `sno` int(11) NOT NULL,
  `Adminid` varchar(1000) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `Contact` int(10) NOT NULL,
  `Super` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`sno`, `Adminid`, `Email`, `password`, `Fname`, `Lname`, `Contact`, `Super`) VALUES
(1, 'ad12', 'ranajoydutta7@gmail.com', 'hello12', 'Ranajoyo', 'Dutta', 2147483647, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `que_id` int(11) NOT NULL,
  `test_id` varchar(100) NOT NULL,
  `que_desc` mediumtext NOT NULL,
  `choice1` varchar(10000) NOT NULL,
  `choice2` varchar(10000) NOT NULL,
  `choice3` varchar(10000) NOT NULL,
  `choice4` varchar(10000) NOT NULL,
  `correct_answer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`que_id`, `test_id`, `que_desc`, `choice1`, `choice2`, `choice3`, `choice4`, `correct_answer`) VALUES
(1, 'program1', 'What Default Data Type ?', 'String', 'Variant', 'Integer', 'Boolean', 2),
(2, 'program1', 'What is Default Form Border Style ?', 'Fixed Single', 'None', 'Sizeable', 'Fixed Diaglog', 3),
(3, 'program1', 'Which is not type of Control ?', 'Text', 'Label', 'Check Box', 'Option button', 1),
(4, 'program1', 'You application creates an instance of a form. What is the first event that will be triggered in the from?', 'Load', 'GotFocus', 'Instance', 'Initialise', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `sno` int(11) NOT NULL,
  `SID` varchar(50) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stores Student Login Credentials';

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`sno`, `SID`, `username`, `password`) VALUES
(1, '1122', 'Ranajoy', 'hello12'),
(2, '1233', 'Anant', 'hello12');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_name`) VALUES
(2, 'Mathematics'),
(3, 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `sno` int(11) NOT NULL,
  `user_id` varchar(10000) NOT NULL,
  `session_id` varchar(10000) NOT NULL,
  `test_id` varchar(50) NOT NULL,
  `quesnum` int(7) NOT NULL,
  `sub_ans` int(1) NOT NULL,
  `correct_ans` int(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`sno`, `user_id`, `session_id`, `test_id`, `quesnum`, `sub_ans`, `correct_ans`, `time`) VALUES
(214, '1122', 'fu52vkbk8i5ev3am0m56dldng0', 'program1', 0, 4, 0, '2019-04-03 16:01:39'),
(215, '1122', 'fu52vkbk8i5ev3am0m56dldng0', 'program1', 1, 3, 0, '2019-04-03 16:01:42'),
(216, '1122', 'fu52vkbk8i5ev3am0m56dldng0', 'program1', 2, 3, 0, '2019-04-03 16:01:47'),
(217, '1122', 'fu52vkbk8i5ev3am0m56dldng0', 'program1', 3, 3, 0, '2019-04-03 16:01:51'),
(218, '1122', '57i631dpb6vlg365000j7dika7', 'program1', 0, 3, 0, '2019-04-03 16:18:50'),
(219, '1122', 'goa1hqehtuo4s0rdejo8ohb4f1', 'program1', 0, 3, 0, '2019-04-03 16:19:48'),
(220, '1122', '1h8u1559nt9u8e4ujiq5730qs3', 'program1', 0, 4, 0, '2019-04-03 16:20:16'),
(221, '1122', '1h8u1559nt9u8e4ujiq5730qs3', 'program1', 0, 4, 0, '2019-04-03 16:20:17'),
(222, '1122', '1h8u1559nt9u8e4ujiq5730qs3', 'program1', 1, 4, 0, '2019-04-03 16:20:20'),
(223, '1122', '2646gmvncbsuhr6oa35dllkjn4', 'program1', 0, 3, 0, '2019-04-03 16:23:26'),
(224, '1122', '2646gmvncbsuhr6oa35dllkjn4', 'program1', 0, 3, 0, '2019-04-03 16:23:27'),
(225, '1122', '2646gmvncbsuhr6oa35dllkjn4', 'program1', 2, 3, 0, '2019-04-03 16:23:30'),
(226, '1122', '2646gmvncbsuhr6oa35dllkjn4', 'program1', 1, 4, 0, '2019-04-03 16:23:33'),
(227, '1122', 'r32c56247d7nt5aub7qhld5ob3', 'program1', 0, 4, 0, '2019-04-04 01:44:37'),
(228, '1122', 'r32c56247d7nt5aub7qhld5ob3', 'program1', 1, 4, 0, '2019-04-04 01:44:41'),
(229, '1122', 'r32c56247d7nt5aub7qhld5ob3', 'program1', 1, 4, 0, '2019-04-04 01:44:43'),
(230, '1122', 'r32c56247d7nt5aub7qhld5ob3', 'program1', 2, 3, 0, '2019-04-04 01:44:46'),
(231, '1122', 'r32c56247d7nt5aub7qhld5ob3', 'program1', 3, 4, 0, '2019-04-04 01:44:49'),
(232, '1122', 'dj0hprm3qeeismeii9dii3bct2', 'program1', 0, 4, 0, '2019-04-04 03:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` varchar(50) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `total_ques` int(7) NOT NULL,
  `duration` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `sub_id`, `test_name`, `total_ques`, `duration`) VALUES
('program1', 3, 'programming', 4, 1800);

-- --------------------------------------------------------

--
-- Table structure for table `test_records`
--

CREATE TABLE `test_records` (
  `tr_id` int(11) NOT NULL,
  `SID` varchar(50) NOT NULL,
  `session_id` varchar(10000) NOT NULL,
  `mks_obtained` varchar(10000) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_records`
--

INSERT INTO `test_records` (`tr_id`, `SID`, `session_id`, `mks_obtained`, `time_stamp`) VALUES
(1, '1122', 'fhs586btaobbnum1tmga8j1142', NULL, '2019-02-18 07:23:59'),
(2, '1122', '9dcif9dr74ir9f9p58oafm0u63', NULL, '2019-02-18 07:24:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`SID`),
  ADD UNIQUE KEY `SID` (`sno`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test_records`
--
ALTER TABLE `test_records`
  ADD PRIMARY KEY (`tr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_login`
--
ALTER TABLE `student_login`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `test_records`
--
ALTER TABLE `test_records`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
