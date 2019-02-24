-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2019 at 06:30 PM
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
(1, 'Mathematics'),
(2, 'English'),
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
(66, '1122', '9ovof3aijpgiuu9kncl4gamb77', 'program1', 0, 1, 3, '2019-02-21 18:06:02'),
(67, '1122', '9ovof3aijpgiuu9kncl4gamb77', 'program1', 1, 3, 3, '2019-02-21 18:05:56'),
(68, '1122', '9ovof3aijpgiuu9kncl4gamb77', 'program1', 3, 4, 3, '2019-02-21 18:06:15'),
(69, '1122', '9ovof3aijpgiuu9kncl4gamb77', 'program1', 2, 3, 3, '2019-02-21 18:05:52'),
(70, '1122', '34eudki4vvcidfae3d53jg2675', 'program1', 0, 1, 3, '2019-02-21 18:06:30'),
(71, '1122', '34eudki4vvcidfae3d53jg2675', 'program1', 2, 3, 3, '2019-02-21 18:06:38'),
(72, '1122', '34eudki4vvcidfae3d53jg2675', 'program1', 1, 3, 3, '2019-02-21 18:06:42'),
(73, '1122', '34eudki4vvcidfae3d53jg2675', 'program1', 3, 4, 3, '2019-02-21 18:06:47'),
(74, '1122', 't198aqi5vev0kmd3vp4ta9ff45', 'program1', 0, 4, 3, '2019-02-21 18:08:05'),
(75, '1122', 't198aqi5vev0kmd3vp4ta9ff45', 'program1', 2, 3, 3, '2019-02-21 18:08:07'),
(76, '1122', 'ur1lgd5ehmpl43bh3qud5kq8c5', 'program1', 0, 4, 3, '2019-02-23 00:36:49'),
(77, '1122', 'ur1lgd5ehmpl43bh3qud5kq8c5', 'program1', 1, 3, 3, '2019-02-23 00:36:51'),
(78, '1122', 'ur1lgd5ehmpl43bh3qud5kq8c5', 'program1', 2, 4, 3, '2019-02-23 00:36:56'),
(79, '1122', 'ur1lgd5ehmpl43bh3qud5kq8c5', 'program1', 3, 3, 3, '2019-02-23 00:36:58'),
(80, '1122', 'uicib5no5hl6n82n7e94egroh0', 'program1', 0, 4, 3, '2019-02-23 00:38:14'),
(81, '1122', 'ockmi1ug195elr3i4im9417930', 'program1', 0, 3, 3, '2019-02-23 00:38:30'),
(82, '1122', 'ockmi1ug195elr3i4im9417930', 'program1', 2, 3, 3, '2019-02-23 00:38:33'),
(83, '1122', 'offl5qemcbhuogb6h5kikq48u7', 'program1', 0, 3, 3, '2019-02-23 00:40:38'),
(84, '1122', '40dnu409j8gof16vttvn9g3eh7', 'program1', 0, 2, 3, '2019-02-23 00:41:02'),
(85, '1122', 'kd33vd7hjrlrp197lb0l6js9s5', 'program1', 0, 1, 3, '2019-02-23 01:01:43'),
(86, '1122', 'kd33vd7hjrlrp197lb0l6js9s5', 'program1', 1, 1, 3, '2019-02-23 01:01:47'),
(87, '1122', 'kd33vd7hjrlrp197lb0l6js9s5', 'program1', 2, 1, 3, '2019-02-23 01:01:50'),
(88, '1122', 'kd33vd7hjrlrp197lb0l6js9s5', 'program1', 3, 1, 3, '2019-02-23 01:01:56'),
(89, '1122', '6cng19aepam01mb8u2rroq1fv4', 'program1', 0, 3, 3, '2019-02-23 08:03:32'),
(94, '1122', '6cng19aepam01mb8u2rroq1fv4', 'program1', 2, 3, 3, '2019-02-23 08:21:17'),
(95, '1122', 'evsd5ahn14p42oebh3mnssaku2', 'program1', 0, 1, 3, '2019-02-23 08:36:40'),
(96, '1122', 'evsd5ahn14p42oebh3mnssaku2', 'program1', 2, 2, 3, '2019-02-23 08:37:01'),
(97, '1122', '466kmfba5quen0mmuineher5u4', 'program1', 0, 1, 3, '2019-02-23 16:17:57'),
(98, '1122', '466kmfba5quen0mmuineher5u4', 'program1', 2, 3, 3, '2019-02-23 16:19:05'),
(100, '1122', '466kmfba5quen0mmuineher5u4', 'program1', 3, 4, 3, '2019-02-23 16:20:08'),
(101, '1122', '466kmfba5quen0mmuineher5u4', 'program1', 1, 4, 3, '2019-02-23 16:22:27'),
(102, '1122', 'naqp8pinil9is2pn2g2lkutsu5', 'program1', 0, 4, 3, '2019-02-23 16:27:00'),
(104, '1122', 'naqp8pinil9is2pn2g2lkutsu5', 'program1', 2, 4, 3, '2019-02-23 16:27:04'),
(105, '1122', 'naqp8pinil9is2pn2g2lkutsu5', 'program1', 3, 4, 3, '2019-02-23 17:52:50'),
(106, '1122', 'l6g8gcqnhi73ebcfuode482713', 'program1', 0, 3, 3, '2019-02-23 19:22:41'),
(107, '1122', 'l6g8gcqnhi73ebcfuode482713', 'program1', 2, 2, 3, '2019-02-23 19:22:46'),
(108, '1122', 'l6g8gcqnhi73ebcfuode482713', 'program1', 2, 2, 3, '2019-02-23 19:22:49'),
(109, '1122', 'qvmlnips4ck21i7gcd96o2g8g5', 'program1', 0, 4, 3, '2019-02-23 19:24:26'),
(110, '1122', 'qvmlnips4ck21i7gcd96o2g8g5', 'program1', 2, 1, 3, '2019-02-23 19:24:30'),
(111, '1122', 'qvmlnips4ck21i7gcd96o2g8g5', 'program1', 2, 1, 3, '2019-02-23 19:24:31'),
(112, '1122', 'p5g359hqatboa322sehg0egij7', 'program1', 0, 4, 3, '2019-02-23 19:25:22'),
(113, '1122', 'p5g359hqatboa322sehg0egij7', 'program1', 1, 4, 3, '2019-02-23 19:25:25'),
(114, '1122', 'p5g359hqatboa322sehg0egij7', 'program1', 2, 1, 3, '2019-02-23 19:25:28'),
(115, '1122', 'p5g359hqatboa322sehg0egij7', 'program1', 2, 1, 3, '2019-02-23 19:25:29'),
(116, '1122', 'p5g359hqatboa322sehg0egij7', 'program1', 3, 1, 3, '2019-02-23 19:25:33'),
(117, '1122', 'p5g359hqatboa322sehg0egij7', 'program1', 3, 1, 3, '2019-02-23 19:25:34'),
(118, '1122', 'rc3mptj2nrmeups8ijh5fi3br3', 'program1', 0, 1, 3, '2019-02-23 19:26:55'),
(119, '1122', 'rc3mptj2nrmeups8ijh5fi3br3', 'program1', 1, 1, 3, '2019-02-23 19:26:59'),
(120, '1122', 'rc3mptj2nrmeups8ijh5fi3br3', 'program1', 2, 1, 3, '2019-02-23 19:27:03'),
(121, '1122', 'rc3mptj2nrmeups8ijh5fi3br3', 'program1', 3, 1, 3, '2019-02-23 19:27:06'),
(122, '1122', 'ec9p2fl10u1130g8fg8akjd1c1', 'program1', 0, 2, 3, '2019-02-23 19:28:36'),
(123, '1122', 'ec9p2fl10u1130g8fg8akjd1c1', 'program1', 1, 3, 3, '2019-02-23 19:28:31'),
(124, '1122', 'ec9p2fl10u1130g8fg8akjd1c1', 'program1', 2, 1, 3, '2019-02-23 19:28:39'),
(125, '1122', 'ec9p2fl10u1130g8fg8akjd1c1', 'program1', 3, 1, 3, '2019-02-23 19:28:42'),
(126, '1122', 'drgdormf9b2l58enqr9souqkk5', 'program1', 0, 4, 3, '2019-02-23 19:46:53'),
(127, '1122', 'drgdormf9b2l58enqr9souqkk5', 'program1', 1, 4, 3, '2019-02-23 19:46:56'),
(128, '1122', 'drgdormf9b2l58enqr9souqkk5', 'program1', 2, 4, 3, '2019-02-23 19:46:59'),
(129, '1122', 'drgdormf9b2l58enqr9souqkk5', 'program1', 3, 4, 3, '2019-02-23 19:47:03'),
(130, '1122', 'etjo183n3kdm7u5m4fbibu0dv7', 'program1', 0, 4, 3, '2019-02-23 19:50:11'),
(131, '1122', 'etjo183n3kdm7u5m4fbibu0dv7', 'program1', 1, 4, 3, '2019-02-23 19:50:14'),
(132, '1122', 'etjo183n3kdm7u5m4fbibu0dv7', 'program1', 2, 4, 3, '2019-02-23 19:50:17'),
(133, '1122', 'etjo183n3kdm7u5m4fbibu0dv7', 'program1', 3, 4, 3, '2019-02-23 19:50:20'),
(134, '1122', '6lsphe60h626akbcqmq283u7u6', 'program1', 0, 4, 0, '2019-02-23 19:52:34'),
(135, '1122', '6lsphe60h626akbcqmq283u7u6', 'program1', 2, 3, 0, '2019-02-23 19:52:38'),
(136, '1122', '6lsphe60h626akbcqmq283u7u6', 'program1', 1, 3, 0, '2019-02-23 19:52:42'),
(137, '1122', 'fmb9dqbot5jof1jb8dti24spu7', 'program1', 0, 2, 0, '2019-02-23 20:02:07'),
(138, '1122', 'fmb9dqbot5jof1jb8dti24spu7', 'program1', 1, 3, 0, '2019-02-23 20:02:10'),
(139, '1122', 'fmb9dqbot5jof1jb8dti24spu7', 'program1', 2, 2, 0, '2019-02-23 20:02:12'),
(140, '1122', 'vppc183571pk0eqo2acg3qs3n5', 'program1', 0, 3, 0, '2019-02-23 20:10:24'),
(141, '1122', 'vppc183571pk0eqo2acg3qs3n5', 'program1', 2, 4, 0, '2019-02-23 20:10:28'),
(142, '1122', 'ge5o3ldva3ncqujp28k3p6vfs6', 'program1', 0, 2, 0, '2019-02-23 20:12:25'),
(143, '1122', 'ge5o3ldva3ncqujp28k3p6vfs6', 'program1', 1, 3, 0, '2019-02-23 20:12:27'),
(144, '1122', 'ge5o3ldva3ncqujp28k3p6vfs6', 'program1', 2, 2, 0, '2019-02-23 20:12:30'),
(145, '1122', 'ruibhp001v712leln1efh1ue01', 'program1', 0, 4, 0, '2019-02-23 20:13:43'),
(146, '1122', 'ruibhp001v712leln1efh1ue01', 'program1', 1, 4, 0, '2019-02-23 20:13:46'),
(147, '1122', 'ruibhp001v712leln1efh1ue01', 'program1', 2, 4, 0, '2019-02-23 20:13:48'),
(148, '1122', 'ruibhp001v712leln1efh1ue01', 'program1', 3, 1, 0, '2019-02-23 20:13:51'),
(149, '1122', '3otsmdk9ie7jtmf72l1aq80j57', 'program1', 0, 2, 0, '2019-02-23 20:14:11'),
(150, '1122', '3otsmdk9ie7jtmf72l1aq80j57', 'program1', 1, 3, 0, '2019-02-23 20:14:13'),
(151, '1122', '3otsmdk9ie7jtmf72l1aq80j57', 'program1', 2, 1, 0, '2019-02-23 20:14:16'),
(152, '1122', '3otsmdk9ie7jtmf72l1aq80j57', 'program1', 3, 4, 0, '2019-02-23 20:14:18'),
(153, '1122', '6h6613tglp4i3f0nltl5f1u6m7', 'program1', 0, 2, 0, '2019-02-23 20:22:48'),
(154, '1122', '6h6613tglp4i3f0nltl5f1u6m7', 'program1', 1, 3, 0, '2019-02-23 20:22:50'),
(155, '1122', '6h6613tglp4i3f0nltl5f1u6m7', 'program1', 2, 1, 0, '2019-02-23 20:22:52'),
(156, '1122', '6h6613tglp4i3f0nltl5f1u6m7', 'program1', 3, 4, 0, '2019-02-23 20:22:55'),
(157, '1122', '6h6613tglp4i3f0nltl5f1u6m7', 'program1', 3, 4, 0, '2019-02-23 20:22:57'),
(158, '1122', 'bmbmcp80p4kqkoerebevrlfmd7', 'program1', 0, 4, 0, '2019-02-23 20:40:10'),
(159, '1122', 'bmbmcp80p4kqkoerebevrlfmd7', 'program1', 2, 3, 0, '2019-02-23 20:40:12'),
(160, '1122', 'bmbmcp80p4kqkoerebevrlfmd7', 'program1', 3, 4, 0, '2019-02-23 20:40:15'),
(161, '1122', 'bmbmcp80p4kqkoerebevrlfmd7', 'program1', 3, 4, 0, '2019-02-23 20:40:17'),
(162, '1122', '5p4he70fug1u7lgibruk1fg8h2', 'program1', 0, 4, 3, '2019-02-24 13:57:58'),
(163, '11222', '5p4he70fug1u7lgibruk1fg8h2', 'program1', -1, 0, 1, '2019-02-24 17:13:42'),
(164, '11222', '5p4he70fug1u7lgibruk1fg8h2', 'program1', -1, 4, 1, '2019-02-24 17:13:52'),
(165, '11222', '5p4he70fug1u7lgibruk1fg8h2', 'program1', 2, 4, 1, '2019-02-24 17:14:04'),
(166, '1122', '0b034aq1ab6idtrmi2l3rlrs56', 'program1', 0, 3, 2, '2019-02-24 17:16:57'),
(167, '1122', '0b034aq1ab6idtrmi2l3rlrs56', 'program1', 2, 3, 1, '2019-02-24 17:17:23'),
(168, '1122', '0b034aq1ab6idtrmi2l3rlrs56', 'program1', 3, 3, 4, '2019-02-24 17:17:27'),
(169, '1122', '0b034aq1ab6idtrmi2l3rlrs56', 'program1', 1, 2, 3, '2019-02-24 17:17:30'),
(170, '1122', 'p557gdfst0uva4n43j1eki6l92', 'program1', 0, 2, 2, '2019-02-24 17:17:52'),
(171, '1122', 'p557gdfst0uva4n43j1eki6l92', 'program1', 1, 3, 3, '2019-02-24 17:17:55'),
(172, '1122', 'p557gdfst0uva4n43j1eki6l92', 'program1', 2, 2, 1, '2019-02-24 17:18:04'),
(173, '1122', 'qukj1ur78fsuc2l5rp8u82rac2', 'program1', 0, 3, 0, '2019-02-24 17:21:40'),
(174, '1122', 'qukj1ur78fsuc2l5rp8u82rac2', 'program1', 2, 3, 0, '2019-02-24 17:21:42'),
(175, '1122', 'qukj1ur78fsuc2l5rp8u82rac2', 'program1', 1, 1, 0, '2019-02-24 17:21:45'),
(176, '1122', 'qukj1ur78fsuc2l5rp8u82rac2', 'program1', 1, 1, 0, '2019-02-24 17:21:48'),
(177, '1122', 'i4r8ldvfesrlt3ttm80htni9b3', 'program1', 0, 3, 0, '2019-02-24 17:22:13'),
(178, '1122', 'i4r8ldvfesrlt3ttm80htni9b3', 'program1', 2, 1, 0, '2019-02-24 17:22:15'),
(179, '11222', 'i4r8ldvfesrlt3ttm80htni9b3', 'program1', 2, 4, 1, '2019-02-24 17:25:34');

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
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `test_records`
--
ALTER TABLE `test_records`
  MODIFY `tr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
