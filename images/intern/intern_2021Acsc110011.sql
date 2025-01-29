-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 05:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nit_college`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assign_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assign_id`, `class_id`, `course_id`, `tid`, `description`, `status`) VALUES
(4, 7, 5, 5, 'Write a document', 1),
(6, 7, 5, 5, 'Write a Report on EEIM', 1),
(7, 8, 6, 5, 'Create a Website', 1),
(8, 8, 6, 5, 'Enter a DOM project', 0),
(10, 4, 4, 5, 'Create a DB schema for univ', 1),
(11, 4, 6, 6, 'Create a Website', 1),
(12, 4, 6, 6, 'Task 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assignment_complete`
--

CREATE TABLE `assignment_complete` (
  `sid` varchar(255) NOT NULL,
  `assign_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment_complete`
--

INSERT INTO `assignment_complete` (`sid`, `assign_id`, `status`) VALUES
('ACSC1108108', 6, 1),
('ACSCS1122345', 8, 1),
('ACSCS1122345', 7, 1),
('12112', 10, 0),
('12112', 11, 1),
('12112', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `sid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `course_id` int(11) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Absent'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`sid`, `date`, `course_id`, `tid`, `status`) VALUES
('ACSC1108108', '2023-10-23', 5, '6', 'Present'),
('ACSCS1122345', '2023-10-23', 6, '6', 'Present'),
('ACSC1108108', '2023-10-24', 0, '6', 'yes'),
('ACSC1108108', '2023-10-25', 5, '6', 'Absent'),
('ACSCS1122345', '2023-10-25', 6, '5', 'Present'),
('ACSC1108108', '2023-10-25', 4, '4', 'Present'),
('12112', '2023-10-26', 4, '4', 'Present'),
('ACSC1108108', '2023-10-26', 5, '4', 'Present'),
('ACSC1108108', '2023-10-26', 4, '4', 'Absent'),
('ACSCS1122345', '2023-10-26', 6, '4', 'Present'),
('12112', '2023-10-26', 6, '4', 'Present'),
('ESC1101', '2023-12-07', 5, '5', 'Present'),
('ESC1101', '2023-12-27', 5, '5', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `dept` int(11) NOT NULL,
  `sec` varchar(15) NOT NULL,
  `sem` int(11) NOT NULL,
  `class_teacher` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `dept`, `sec`, `sem`, `class_teacher`) VALUES
(4, 4, 'A', 3, 6),
(5, 4, 'B', 3, 4),
(6, 5, 'A', 3, 4),
(7, 6, 'A', 3, 5),
(8, 6, 'B', 3, 7),
(9, 5, 'A', 5, 7),
(10, 7, 'A', 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `clearance_check`
--

CREATE TABLE `clearance_check` (
  `sid` varchar(25) NOT NULL,
  `course_id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `clearance` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clearance_check`
--

INSERT INTO `clearance_check` (`sid`, `course_id`, `tid`, `clearance`) VALUES
('ACSC1108108', 5, 5, 1),
('12112', 4, 5, 1),
('12112', 6, 6, 1),
('ACSC1108108', 4, 6, 1),
('12112', 9, 6, 1),
('2021Acsc110011', 9, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('Theory','Practical') NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `name`, `type`, `course_code`, `status`) VALUES
(4, 'DBMS', 'Theory', 'UIH1010', 1),
(5, 'EEIM', 'Theory', 'UNLP124', 1),
(6, 'WD', 'Theory', 'UMP49', 1),
(7, 'EG', 'Theory', 'UHI1015', 1),
(8, 'AI', 'Theory', 'UCL1125', 1),
(9, 'DBMS', 'Practical', 'HHML125', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE `dept` (
  `dept_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `intake` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`dept_id`, `name`, `intake`) VALUES
(2, 'CSE', '120'),
(4, 'CSE AI', '120'),
(5, 'CSE DS', '60'),
(6, 'ECE', '120'),
(7, 'Electronics', '60');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `salary` varchar(25) NOT NULL,
  `role` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `salary`, `role`, `email`) VALUES
(3, 'Abhishek', '20000', 'Sports Inccharge', 'ab@gmail.com'),
(4, 'Safal', '25660', 'Forum Incharge', 'sa@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_clearance`
--

CREATE TABLE `faculty_clearance` (
  `sid` varchar(255) NOT NULL,
  `fid` int(11) NOT NULL,
  `clearance` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty_clearance`
--

INSERT INTO `faculty_clearance` (`sid`, `fid`, `clearance`) VALUES
('12112', 0, 1),
('2021Acsc110011', 0, 1),
('12112', 3, 1),
('2021Acsc110011', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `rid` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rid`, `role`) VALUES
(1, 'admin'),
(2, 'teacher'),
(3, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `father_name` text NOT NULL,
  `mother_name` text NOT NULL,
  `email` text DEFAULT NULL,
  `personal_mobile` text DEFAULT NULL,
  `father_mobile` text DEFAULT NULL,
  `mother_mobile` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `birth_day` varchar(15) DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `religion` text DEFAULT NULL,
  `ssc_school` text DEFAULT NULL,
  `ssc_roll` varchar(11) DEFAULT NULL,
  `ssc_board` text DEFAULT NULL,
  `ssc_year` varchar(255) NOT NULL,
  `ssc_result` double DEFAULT NULL,
  `hsc_school` text DEFAULT NULL,
  `hsc_roll` varchar(11) DEFAULT NULL,
  `hsc_board` text DEFAULT NULL,
  `hsc_year` varchar(255) NOT NULL,
  `hsc_result` double DEFAULT NULL,
  `date` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `father_name`, `mother_name`, `email`, `personal_mobile`, `father_mobile`, `mother_mobile`, `address`, `birth_day`, `gender`, `religion`, `ssc_school`, `ssc_roll`, `ssc_board`, `ssc_year`, `ssc_result`, `hsc_school`, `hsc_roll`, `hsc_board`, `hsc_year`, `hsc_result`, `date`) VALUES
('ACSC1108108', 'Abhishek Bante', 'Eknath Bante', 'Savita Bante', 'abhishekbante01@gmail.com', '+919860409222', '09860409222', '+918459722098', 'Plotno.27 niwara society,godhani road, zingabai takli,nagpur\r\nMaharashtra 440030', '2004-01-01', 'male', 'Hindu', 'Ashirwwad', '0', 'State', '2019', 86, 'SFS', '0', 'State', '2021', 96, '2023-10-21 00:00:00'),
('ACSCS1122345', 'Safal Patil', 'Arun Patil', 'Mother patil', 'safalp01@gmail.com', '9865741230', '6985471230', '3216549870', 'Takli', '0200-03-27', 'male', 'HINDu', '', '', '', '', 0, '', '', '', '', 0, ''),
('12112', 'Tanuj Shukla', 'Papaji shukla', 'mummaji shukla', 'pittarparkar56@gmail.com', '+918459722098', '+918459722098', '09860409222', 'Plotno.27 niwara society,godhani road,nagpur, Maharashtra', '1998-01-01', 'male', 'Hindu', 'GHRCE', 'J0586497', 'State', '2014', 100, 'GHRCE', 'N02356', 'State', '2016', 101, '2023-10-25'),
('ESC1101', 'Ramesh', 'Father', 'mother', 'ramesh@gmail.com', '9865741230', '9874563210', '321987466', 'nksjfvhjdbckds ,', '2004-01-01', 'male', 'Hindu', 'cdcwd', 'vv', ' hg n', ' 2016', 36, 'cfgcjcgfc', '25688', 'vgvhgch', '2017', 98, '2023-10-26'),
('2021Acsc110011', 'Abhishek Bante', 'Eknath bante', 'Savita Bante', 'abhishekbante01@gmail.com', '+919860409222', '9865741230', '6598741230', 'Plotno.27 niwara society,godhani road, zingabai takli,nagpur\r\nMaharashtra 440030', '2004-01-01', 'male', 'Hindu', 'Ashirwad', 'mkfd2122', 'State', '2017', 86, 'SFS', 'N0wefdwe', 'State', '2019', 96, '2023-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `stud_class`
--

CREATE TABLE `stud_class` (
  `sid` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `clearance` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stud_class`
--

INSERT INTO `stud_class` (`sid`, `class_id`, `clearance`) VALUES
('', 0, 0),
('', 0, 0),
('ACSC1108108', 7, 0),
('ACSCS1122345', 8, 0),
('12112', 4, 0),
('ESC1101', 10, 0),
('2021Acsc110011', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `name`, `email`, `phone`, `salary`) VALUES
(3, 'Abhishek Bante', 'abhishekbante01@gmail.com', '9860409222', 250000),
(4, 'Abhi', 'abhishek.bante.cse@ghrce.raisoni.net', '9865741230', 600000),
(5, 'Safal', 'safalp@gmail.com', '986574123', 256489),
(6, 'Nehal Khade', 'nehal@gmail.com', '9685743210', 200),
(7, 'Aniket Atkari', 'aniket@gmail.com', '9865741230', 50000),
(8, 'Mangesh Bhau', 'mangesh@bhau.com', '9856742310', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_course`
--

CREATE TABLE `teacher_course` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_course`
--

INSERT INTO `teacher_course` (`id`, `tid`, `course_id`, `class_id`) VALUES
(2, 4, 5, 5),
(4, 5, 5, 7),
(5, 5, 6, 8),
(6, 5, 4, 4),
(7, 3, 4, 7),
(8, 5, 4, 7),
(9, 6, 6, 4),
(10, 6, 4, 7),
(11, 7, 6, 10),
(12, 8, 5, 10),
(13, 6, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `pass`, `role`) VALUES
('12112', '213', 'student'),
('2021Acsc110011', 'Nit@123', 'student'),
('ab@gmail.com', 'faculty@123', 'faculty'),
('ACSC112025', 'Nit@123', 'student'),
('ACSCS1122345', 'Nit@123', 'student'),
('ad1101', 'admin', 'admin'),
('aniket@gmail.com', 'teacher@123', 'teacher'),
('ESC1101', 'Nit@123', 'student'),
('mangesh@bhau.com', 'teacher@123', 'teacher'),
('nehal@gmail.com', '123', 'teacher'),
('sa@gmail.com', 'faculty@123', 'faculty'),
('safalp@gmail.com', 'teacher@123', 'teacher'),
('st1101', 'student', 'student'),
('t1101', 'teacher', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `ForiegnKey` (`dept`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `UNIQUE` (`course_code`);

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD UNIQUE KEY `tid` (`tid`);

--
-- Indexes for table `teacher_course`
--
ALTER TABLE `teacher_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dept`
--
ALTER TABLE `dept`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher_course`
--
ALTER TABLE `teacher_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `ForiegnKey` FOREIGN KEY (`dept`) REFERENCES `dept` (`dept_id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
