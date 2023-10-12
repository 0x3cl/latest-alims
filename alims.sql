-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 02:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alims`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `ig_link` varchar(255) NOT NULL,
  `twi_link` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `contact`, `address`, `province`, `city`, `birthday`, `status`, `gender`, `email`, `username`, `password`, `role`, `is_active`, `avatar`, `banner`, `bio`, `fb_link`, `ig_link`, `twi_link`, `date_updated`, `date_created`) VALUES
(11, 'CARL', 'LLEMOS', '09065003256', 'blk10a', 'Biliran', 'Biliran', '2005-12-13', 'married', 'male', 'example@email.cosm', 'superadmin01', '$2y$10$XvLuAUgaDDiu0ELUPG0DseWICOwdJie3bsctz4OKu7NS7zc2jShUy', 3, 1, '1696377534_a61e5a9844f54d925415.jpg', '1696377559_51341acc6354e2343d9f.jpg', 'hello world', '', '', '', '1696295971', ''),
(30, 'carl', 'llemos', '', '', '', '', '', '', '', 'test@email.com', 'carl01', '$2y$10$fzL1CsRgN5IQPHDQz3thvueyzPMv5lk1EdZlE2bg/Bu.TXNO1fmdO', 3, 0, 'male-default.jpg', 'banner-default.png', '', '', '', '', '1696292380', '1696292380'),
(31, 'ADMIN', 'ADMINS', '09065003256', 'Block 10', 'Aurora', 'Dingalan', '2005-12-01', 'single', 'male', 'admin01@email.com', 'admin01', '$2y$10$uuq8Vjjv3xFCfnEUSQShaOBAC9NTMmUAH8rXbWcnz5foC.GLtfCdm', 3, 0, '1696928730_f1eb2290cde0e0c441c2.jpg', '1696928566_d752eeb0d54e08764ff7.jpg', '', '', '', '', '1696320135', '1696320135'),
(32, 'admin', 'one', '1234567890', '123 main st', 'metro manila', 'quezon city', '1980-01-01', '', 'male', 'testadmin1@example.com', 'admin1', '$2y$10$ScE/.scTfP2murMEXyahpOHeYSBNoU70CdpWxvQVjHTdb8ysUr3pG', 3, 0, 'male-default.jpg', 'default-banner.png', '', '', '', '', '1696362135', '1696362135'),
(33, 'admin', 'two', '9876543210', '456 elm st', 'cebu', 'cebu city', '1981-02-02', '', 'female', 'testadmin2@example.com', 'admin2', '$2y$10$OGzRCWmOoPuyCmg0MEerYe8cTVKSiAgLB8BdzkPSVuM2HhtBMKiNq', 3, 0, 'female-default.jpg', 'default-banner.png', '', '', '', '', '1696362135', '1696362135'),
(34, 'admin', 'three', '2345678901', '789 oak st', 'metro manila', 'manila', '1979-03-03', '', 'male', 'testadmin3@example.com', 'admin3', '$2y$10$0us0ppHLU4eIpNV.9aLoJ.WJDTte9AUnGxS5Goz3uW5pXvF8vmyhG', 3, 0, 'male-default.jpg', 'default-banner.png', '', '', '', '', '1696362135', '1696362135'),
(35, 'admin', 'four', '8765432109', '321 pine st', 'laguna', 'santa rosa', '1982-04-04', '', 'female', 'testadmin4@example.com', 'admin4', '$2y$10$S34kOlHbqQCdyuUabpqbGOF42jGWQBxm9p8qcmQ81sVPeIrODvfQu', 3, 0, 'female-default.jpg', 'default-banner.png', '', '', '', '', '1696362135', '1696362135');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `post_id`, `qid`, `name`) VALUES
(1, 1, 1, '1'),
(2, 1, 2, '2'),
(3, 2, 1, 'assas'),
(4, 2, 2, 'ccasa'),
(5, 3, 1, '1'),
(6, 3, 2, 'asasas');

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `question` text NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`id`, `post_id`, `qid`, `question`, `type`) VALUES
(1, 1, 1, 'sas', 1),
(2, 1, 2, 'acsas', 1),
(3, 2, 1, 'asa', 2),
(4, 2, 2, 'ascas', 2),
(5, 3, 1, 'ascasa', 1),
(6, 3, 2, 'sasas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `post_id`, `filename`) VALUES
(9, 22, 'steam_api64.zip');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `post_id`, `qid`, `name`) VALUES
(1, 1, 1, 'asas'),
(2, 1, 1, 'asa'),
(3, 1, 1, 'asas'),
(4, 1, 2, 'scasasasas'),
(5, 1, 2, 'asas'),
(6, 1, 2, 'ccc'),
(7, 3, 1, 'asacs'),
(8, 3, 1, 'acsas'),
(9, 3, 1, 'acsas');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `name`, `date_updated`, `date_created`) VALUES
(1, 'bsit', 'bachelor of science in information technology', '2023-10-05', '2023-10-04'),
(2, 'ba', 'bachelor of arts', '2023-10-04', '2023-10-04'),
(3, 'bba', 'bachelor of business administration', '2023-10-04', '2023-10-04'),
(4, 'bscs', 'bachelor of science in computer science', '2023-10-05', '2023-10-04'),
(5, 'beng', 'bachelor of engineering', '2023-10-04', '2023-10-04'),
(6, 'bcom', 'bachelor of commerce', '2023-10-04', '2023-10-04'),
(7, 'barch', 'bachelor of architecture', '2023-10-04', '2023-10-04'),
(8, 'bpharm', 'bachelor of pharmacy', '2023-10-04', '2023-10-04'),
(9, 'bed', 'bachelor of education', '2023-10-04', '2023-10-04'),
(10, 'btech', 'bachelor of technology', '2023-10-04', '2023-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`id`, `user_id`, `course_id`, `year`, `section`, `date_updated`) VALUES
(3, 12, 1, '1', '2', '2023-10-06'),
(5, 31, 1, '1', '1', '2023-10-06'),
(6, 31, 4, '1', '2', '2023-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `ig_link` varchar(255) NOT NULL,
  `twi_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `user_id`, `firstname`, `lastname`, `contact`, `address`, `province`, `city`, `birthday`, `status`, `gender`, `avatar`, `banner`, `bio`, `fb_link`, `ig_link`, `twi_link`) VALUES
(21, 31, 'LANZ', 'RAYOS', '09065003256', 'block 10', 'fourth district', 'city of taguig', '2005-12-25', 'married', 'male', '1696930605_4ae675db4b07ddcca53f.jpg', '1696930600_7e2cca70c6bdbb4a918b.jpg', '33333', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `is_assessment` int(11) NOT NULL,
  `enroll_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `post_group` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `is_scheduled` int(11) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `accept_submission` int(11) NOT NULL,
  `restrict_submission` int(11) NOT NULL,
  `date_submission` varchar(255) NOT NULL,
  `time_submission` varchar(255) NOT NULL,
  `date_posted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `is_assessment`, `enroll_id`, `subject_id`, `title`, `post_group`, `content`, `is_scheduled`, `schedule`, `accept_submission`, `restrict_submission`, `date_submission`, `time_submission`, `date_posted`) VALUES
(4, 0, 5, 1, 'asas', 2, '<p>test</p>', 0, '1697028373', 0, 0, '', '', '2023-10-11');

-- --------------------------------------------------------

--
-- Table structure for table `post_group`
--

CREATE TABLE `post_group` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_group`
--

INSERT INTO `post_group` (`id`, `name`) VALUES
(1, 'announcements'),
(2, 'syllabus'),
(3, 'prelim'),
(4, 'midterm'),
(5, 'semi-finals'),
(6, 'finals');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `date_updated`, `date_created`) VALUES
(1, 'section 1', '2023-10-06', '2023-10-04'),
(2, 'section 2', '2023-10-04', '2023-10-04'),
(3, 'section 3', '2023-10-04', '2023-10-04'),
(4, 'section 4', '2023-10-04', '2023-10-04'),
(5, 'section 5', '2023-10-04', '2023-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `smtp`
--

CREATE TABLE `smtp` (
  `id` int(11) NOT NULL,
  `server` varchar(255) NOT NULL,
  `port` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smtp`
--

INSERT INTO `smtp` (`id`, `server`, `port`, `username`, `password`, `date_updated`) VALUES
(1, 'smtp.gmail.com', 5762, 'test021@email.com', 'password', '2023-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `fb_link` varchar(255) NOT NULL,
  `ig_link` varchar(255) NOT NULL,
  `twi_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `firstname`, `lastname`, `contact`, `address`, `province`, `city`, `birthday`, `status`, `gender`, `avatar`, `banner`, `bio`, `fb_link`, `ig_link`, `twi_link`) VALUES
(11, 11, 'carl', 'llemos', '09065003256', 'test', 'batanes', 'basco', '2005-11-29', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(12, 12, 'jane', 'smith', '09065003256', '456 elm st', 'cebu', 'cebu city', '2001-02-02', '', 'male', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(13, 13, 'Mark', 'Johnson', '2345678901', '789 Oak St', 'Metro Manila', 'Manila', '1999-03-03', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(14, 14, 'Sarah', 'Williams', '8765432109', '321 Pine St', 'Laguna', 'Santa Rosa', '2002-04-04', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(15, 15, 'Michael', 'Brown', '3456789012', '654 Maple St', 'Metro Manila', 'Makati', '1998-05-05', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(16, 16, 'Lisa', 'Miller', '7654321098', '987 Cedar St', 'Batangas', 'Batangas City', '2003-06-06', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(17, 17, 'David', 'Davis', '4567890123', '210 Walnut St', 'Metro Manila', 'Caloocan', '1997-07-07', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(18, 18, 'Amy', 'Anderson', '6543210987', '543 Birch St', 'Metro Manila', 'Parañaque', '2004-08-08', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(19, 19, 'James', 'Wilson', '5678901234', '876 Ash St', 'Cavite', 'Dasmarinas', '1996-09-09', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(20, 20, 'Emily', 'Thomas', '4321098765', '1098 Oakwood St', 'Rizal', 'Antipolo', '2005-10-10', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `course` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `code`, `course`, `section`, `year`, `name`, `description`, `date_updated`, `date_created`) VALUES
(1, 'itc123', 1, 1, 1, 'intro to web design', '', '2023-10-06', ''),
(2, 'itc122', 1, 1, 1, 'introduction to python programming', '', '2023-10-06', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_enrolled` int(11) NOT NULL,
  `date_updated` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `email`, `password`, `is_active`, `is_enrolled`, `date_updated`, `date_created`) VALUES
(11, 2, 'student1', 'test@email.com', '$2y$10$VzZng8qafgUnueC3oypLG.jLZr0N.ZriyvSrngjEBHaHpFF2Uaitu', 1, 1, '2023-10-06', '2023-10-04'),
(12, 2, 'student2', 'test2@example.com', '$2y$10$I8GI.ja2A47oL2VQ05H.xeRvEW3pkJiSpGkShFsWPZruM0FQl.qYm', 1, 1, '2023-10-05', '2023-10-04'),
(13, 2, 'student3', 'test3@example.com', '$2y$10$16/X/JAKFBKqjKFt5SJr4.3EsNhgcr1n9I5jS6kwUEoI23FCVb3Wq', 1, 0, '2023-10-04', '2023-10-04'),
(14, 2, 'student4', 'test4@example.com', '$2y$10$eJ0jozct0GQZu5qJf7W0F.ioJeGv2fyqRpshLflXjRaUN.XnwUgDq', 1, 0, '2023-10-04', '2023-10-04'),
(15, 2, 'student5', 'test5@example.com', '$2y$10$DLnK/tYKjEwsinpyCjOgsutYajCI02Ol/2eXNDvmnywazsOJqitnm', 1, 0, '2023-10-04', '2023-10-04'),
(16, 2, 'student6', 'test6@example.com', '$2y$10$HooaR8ZbMEY10TKaxxeO8eZw1Yr1LiiTMiooFmxdaSoGzg6E6C6Tq', 1, 0, '2023-10-04', '2023-10-04'),
(17, 2, 'student7', 'test7@example.com', '$2y$10$cYzaBYDUjj75XKcUuZU8Puymk0weY74A1bpG.R..aOA4ulfgPh/9O', 1, 0, '2023-10-04', '2023-10-04'),
(18, 2, 'student8', 'test8@example.com', '$2y$10$7iemAGsmGT0frpobumZz.ugeo.SYJl8CaYI0o7Bh0d.7mnVH.2kAO', 1, 0, '2023-10-04', '2023-10-04'),
(19, 2, 'student9', 'test9@example.com', '$2y$10$8srJQI4j2mg6uXMU2U8s1u5vyxjCzrJgbJSym8LvpKuEHfwQ6E2fu', 1, 0, '2023-10-04', '2023-10-04'),
(20, 2, 'student10', 'test10@example.com', '$2y$10$K7G/rb85thRPgn/TE/wWtO9Sp0mEZzCQmoA6RU.jKrFmeRnOb1j9C', 1, 0, '2023-10-04', '2023-10-04'),
(31, 1, 'lanzy01', 'lanzzy01@email.com2', '$2y$10$vY1srN2bCak9XoA862FtreqhoMEuNGJNjyQ1Bj0luOWCgLBrSZdvq', 0, 1, '2023-10-06', '2023-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `role_name`, `date_updated`) VALUES
(1, 1, 'instructor', ''),
(2, 2, 'student', ''),
(3, 3, 'administrator', '');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL,
  `date_created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `name`, `date_updated`, `date_created`) VALUES
(1, 'first year', '2023-10-06', '2023-10-04'),
(2, 'second year', '2023-10-04', '2023-10-04'),
(3, 'third year', '2023-10-04', '2023-10-04'),
(4, 'fourth year', '2023-10-04', '2023-10-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_group`
--
ALTER TABLE `post_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp`
--
ALTER TABLE `smtp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_group`
--
ALTER TABLE `post_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `smtp`
--
ALTER TABLE `smtp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
