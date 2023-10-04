-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2023 at 02:31 AM
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
(11, 'CARL', 'LLEMOS', '09065003256', 'blk10a', 'rizal', 'taytay', '2005-12-13', 'single', 'male', 'example@email.com', 'superadmin01', '$2y$10$XvLuAUgaDDiu0ELUPG0DseWICOwdJie3bsctz4OKu7NS7zc2jShUy', 3, 1, '1696377534_a61e5a9844f54d925415.jpg', '1696377559_51341acc6354e2343d9f.jpg', '...', '', '', '', '1696295971', ''),
(30, 'carl', 'llemos', '', '', '', '', '', '', '', 'test@email.com', 'carl01', '$2y$10$fzL1CsRgN5IQPHDQz3thvueyzPMv5lk1EdZlE2bg/Bu.TXNO1fmdO', 3, 0, 'male-default.jpg', 'banner-default.png', '', '', '', '', '1696292380', '1696292380'),
(31, 'admin', 'admins', '', '', '', '', '', '', '', 'admin01@email.com', 'admin01', '$2y$10$uuq8Vjjv3xFCfnEUSQShaOBAC9NTMmUAH8rXbWcnz5foC.GLtfCdm', 3, 0, 'male-default.jpg', 'banner-default.png', '', '', '', '', '1696320135', '1696320135'),
(32, 'admin', 'one', '1234567890', '123 main st', 'metro manila', 'quezon city', '1980-01-01', '', 'male', 'testadmin1@example.com', 'admin1', '$2y$10$ScE/.scTfP2murMEXyahpOHeYSBNoU70CdpWxvQVjHTdb8ysUr3pG', 3, 0, 'male-default.jpg', 'default-banner.png', '', '', '', '', '1696362135', '1696362135'),
(33, 'admin', 'two', '9876543210', '456 elm st', 'cebu', 'cebu city', '1981-02-02', '', 'female', 'testadmin2@example.com', 'admin2', '$2y$10$OGzRCWmOoPuyCmg0MEerYe8cTVKSiAgLB8BdzkPSVuM2HhtBMKiNq', 3, 0, 'female-default.jpg', 'default-banner.png', '', '', '', '', '1696362135', '1696362135'),
(34, 'admin', 'three', '2345678901', '789 oak st', 'metro manila', 'manila', '1979-03-03', '', 'male', 'testadmin3@example.com', 'admin3', '$2y$10$0us0ppHLU4eIpNV.9aLoJ.WJDTte9AUnGxS5Goz3uW5pXvF8vmyhG', 3, 0, 'male-default.jpg', 'default-banner.png', '', '', '', '', '1696362135', '1696362135'),
(35, 'admin', 'four', '8765432109', '321 pine st', 'laguna', 'santa rosa', '1982-04-04', '', 'female', 'testadmin4@example.com', 'admin4', '$2y$10$S34kOlHbqQCdyuUabpqbGOF42jGWQBxm9p8qcmQ81sVPeIrODvfQu', 3, 0, 'female-default.jpg', 'default-banner.png', '', '', '', '', '1696362135', '1696362135');

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
(1, 'bsit', 'bachelor of science in information technology', '2023-10-04', '2023-10-04'),
(2, 'ba', 'bachelor of arts', '2023-10-04', '2023-10-04'),
(3, 'bba', 'bachelor of business administration', '2023-10-04', '2023-10-04'),
(4, 'bsc', 'bachelor of science', '2023-10-04', '2023-10-04'),
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
(1, 21, 1, '1', '1', '2023-10-04');

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
(1, 38, 'Robert', 'Johnson', '1234567890', '123 Main St', 'Metro Manila', 'Quezon City', '1970-01-01', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(2, 39, 'Michelle', 'Smith', '9876543210', '456 Elm St', 'Cebu', 'Cebu City', '1965-02-02', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(3, 40, 'Thomas', 'Davis', '2345678901', '789 Oak St', 'Metro Manila', 'Manila', '1975-03-03', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(4, 41, 'Amanda', 'Clark', '8765432109', '321 Pine St', 'Laguna', 'Santa Rosa', '1982-04-04', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(5, 42, 'William', 'Johnson', '3456789012', '654 Maple St', 'Metro Manila', 'Makati', '1978-05-05', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(6, 43, 'Elizabeth', 'White', '7654321098', '987 Cedar St', 'Batangas', 'Batangas City', '1985-06-06', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(7, 44, 'Christopher', 'Thomas', '4567890123', '210 Walnut St', 'Metro Manila', 'Caloocan', '1973-07-07', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(8, 45, 'Sarah', 'Miller', '6543210987', '543 Birch St', 'Metro Manila', 'Parañaque', '1990-08-08', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(9, 46, 'Michael', 'Anderson', '7890123456', '876 Ash St', 'Cavite', 'Dasmarinas', '1987-09-09', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(10, 47, 'Jessica', 'Moore', '2109876543', '1098 Oakwood St', 'Rizal', 'Antipolo', '1984-10-10', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(11, 21, 'Robert', 'Johnson', '1234567890', '123 Main St', 'Metro Manila', 'Quezon City', '1970-01-01', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(12, 22, 'Michelle', 'Smith', '9876543210', '456 Elm St', 'Cebu', 'Cebu City', '1965-02-02', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(13, 23, 'Thomas', 'Davis', '2345678901', '789 Oak St', 'Metro Manila', 'Manila', '1975-03-03', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(14, 24, 'Amanda', 'Clark', '8765432109', '321 Pine St', 'Laguna', 'Santa Rosa', '1982-04-04', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(15, 25, 'William', 'Johnson', '3456789012', '654 Maple St', 'Metro Manila', 'Makati', '1978-05-05', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(16, 26, 'Elizabeth', 'White', '7654321098', '987 Cedar St', 'Batangas', 'Batangas City', '1985-06-06', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(17, 27, 'Christopher', 'Thomas', '4567890123', '210 Walnut St', 'Metro Manila', 'Caloocan', '1973-07-07', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(18, 28, 'Sarah', 'Miller', '6543210987', '543 Birch St', 'Metro Manila', 'Parañaque', '1990-08-08', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(19, 29, 'Michael', 'Anderson', '7890123456', '876 Ash St', 'Cavite', 'Dasmarinas', '1987-09-09', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(20, 30, 'Jessica', 'Moore', '2109876543', '1098 Oakwood St', 'Rizal', 'Antipolo', '1984-10-10', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', '');

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
(1, 'section 1', '2023-10-04', '2023-10-04'),
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
(1, 1, 'John', 'Doe', '1234567890', '123 Main St', 'Metro Manila', 'Quezon City', '2000-01-01', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(2, 2, 'Jane', 'Smith', '9876543210', '456 Elm St', 'Cebu', 'Cebu City', '2001-02-02', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(3, 3, 'Mark', 'Johnson', '2345678901', '789 Oak St', 'Metro Manila', 'Manila', '1999-03-03', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(4, 4, 'Sarah', 'Williams', '8765432109', '321 Pine St', 'Laguna', 'Santa Rosa', '2002-04-04', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(5, 5, 'Michael', 'Brown', '3456789012', '654 Maple St', 'Metro Manila', 'Makati', '1998-05-05', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(6, 6, 'Lisa', 'Miller', '7654321098', '987 Cedar St', 'Batangas', 'Batangas City', '2003-06-06', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(7, 7, 'David', 'Davis', '4567890123', '210 Walnut St', 'Metro Manila', 'Caloocan', '1997-07-07', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(8, 8, 'Amy', 'Anderson', '6543210987', '543 Birch St', 'Metro Manila', 'Parañaque', '2004-08-08', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(9, 9, 'James', 'Wilson', '5678901234', '876 Ash St', 'Cavite', 'Dasmarinas', '1996-09-09', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(10, 10, 'Emily', 'Thomas', '4321098765', '1098 Oakwood St', 'Rizal', 'Antipolo', '2005-10-10', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
(11, 11, 'John', 'Doe', '1234567890', '123 Main St', 'Metro Manila', 'Quezon City', '2000-01-01', '', 'male', 'male-default.jpg', 'default-banner.png', '', '', '', ''),
(12, 12, 'Jane', 'Smith', '9876543210', '456 Elm St', 'Cebu', 'Cebu City', '2001-02-02', '', 'female', 'female-default.jpg', 'default-banner.png', '', '', '', ''),
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
(1, 'itc123', 1, 1, 1, 'intro to web design', '', '2023-10-04', '');

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
(11, 2, 'student1', 'test1@example.com', '$2y$10$VzZng8qafgUnueC3oypLG.jLZr0N.ZriyvSrngjEBHaHpFF2Uaitu', 0, 0, '2023-10-04', '2023-10-04'),
(12, 2, 'student2', 'test2@example.com', '$2y$10$I8GI.ja2A47oL2VQ05H.xeRvEW3pkJiSpGkShFsWPZruM0FQl.qYm', 0, 0, '2023-10-04', '2023-10-04'),
(13, 2, 'student3', 'test3@example.com', '$2y$10$16/X/JAKFBKqjKFt5SJr4.3EsNhgcr1n9I5jS6kwUEoI23FCVb3Wq', 0, 0, '2023-10-04', '2023-10-04'),
(14, 2, 'student4', 'test4@example.com', '$2y$10$eJ0jozct0GQZu5qJf7W0F.ioJeGv2fyqRpshLflXjRaUN.XnwUgDq', 0, 0, '2023-10-04', '2023-10-04'),
(15, 2, 'student5', 'test5@example.com', '$2y$10$DLnK/tYKjEwsinpyCjOgsutYajCI02Ol/2eXNDvmnywazsOJqitnm', 0, 0, '2023-10-04', '2023-10-04'),
(16, 2, 'student6', 'test6@example.com', '$2y$10$HooaR8ZbMEY10TKaxxeO8eZw1Yr1LiiTMiooFmxdaSoGzg6E6C6Tq', 0, 0, '2023-10-04', '2023-10-04'),
(17, 2, 'student7', 'test7@example.com', '$2y$10$cYzaBYDUjj75XKcUuZU8Puymk0weY74A1bpG.R..aOA4ulfgPh/9O', 0, 0, '2023-10-04', '2023-10-04'),
(18, 2, 'student8', 'test8@example.com', '$2y$10$7iemAGsmGT0frpobumZz.ugeo.SYJl8CaYI0o7Bh0d.7mnVH.2kAO', 0, 0, '2023-10-04', '2023-10-04'),
(19, 2, 'student9', 'test9@example.com', '$2y$10$8srJQI4j2mg6uXMU2U8s1u5vyxjCzrJgbJSym8LvpKuEHfwQ6E2fu', 0, 0, '2023-10-04', '2023-10-04'),
(20, 2, 'student10', 'test10@example.com', '$2y$10$K7G/rb85thRPgn/TE/wWtO9Sp0mEZzCQmoA6RU.jKrFmeRnOb1j9C', 0, 0, '2023-10-04', '2023-10-04'),
(21, 1, 'instructor01', 'test11@example.com', '$2y$10$XvLuAUgaDDiu0ELUPG0DseWICOwdJie3bsctz4OKu7NS7zc2jShUy', 0, 1, '2023-10-04', '2023-10-04'),
(22, 1, 'instructor2', 'test12@example.com', '$2y$10$ruaEcc685gmyZ6ApBnVzn.HaRxPIVvJ5LvyKLK.sKc.TNE2VnxmjK', 0, 0, '2023-10-04', '2023-10-04'),
(23, 1, 'instructor3', 'test13@example.com', '$2y$10$FwK.KUgHGZh42dAx1OukPuFf1LyHrsI8l/IIrUywhvqzL61H0hMN.', 0, 0, '2023-10-04', '2023-10-04'),
(24, 1, 'instructor4', 'test14@example.com', '$2y$10$.OcbN/M/IdiB8qkCVwrzEuhW7cvy8j.glvnpG3bEbUxwrCJuXyhRS', 0, 0, '2023-10-04', '2023-10-04'),
(25, 1, 'instructor5', 'test15@example.com', '$2y$10$6WBYEUQQqKbMA2RSE1/.O.KReNQUc7t52k.OlzSHgX6wwhUHqWDgC', 0, 0, '2023-10-04', '2023-10-04'),
(26, 1, 'instructor6', 'test16@example.com', '$2y$10$WQV2YQ7J67eG0Agwos5Rp.Gm8pMvhUmDEEneHsL3QCeSENu6ofThC', 0, 0, '2023-10-04', '2023-10-04'),
(27, 1, 'instructor7', 'test17@example.com', '$2y$10$znyylciWW/TJckAUY4GfU.caY7spW1PhojIsyXl4BlVrIcN6c9apy', 0, 0, '2023-10-04', '2023-10-04'),
(28, 1, 'instructor8', 'test18@example.com', '$2y$10$HoiZWBio8jyFuUuvkbfv5u6OOFbdBAMJ0lmX3Sm3Z3AbTmeS3hTTO', 0, 0, '2023-10-04', '2023-10-04'),
(29, 1, 'instructor9', 'test19@example.com', '$2y$10$CrfCHYp5JudvOiZugoHW8OuOdvLDxjq09p4E32OzPBPABLjRR5knW', 0, 0, '2023-10-04', '2023-10-04'),
(30, 1, 'instructor10', 'test20@example.com', '$2y$10$mt8wEAXl7gPK2DfO3HM7TexglqG/K1DXnfAVAPeFoC6hI0kmtkeHG', 0, 0, '2023-10-04', '2023-10-04');

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
(1, 'first year', '2023-10-04', '2023-10-04'),
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
