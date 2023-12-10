-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2023 at 11:48 AM
-- Server version: 8.0.33-0ubuntu0.20.04.2
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workers_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `name_admin` varchar(50) NOT NULL,
  `pass_admin` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `pass_admin`) VALUES
(13, 'admin', '0c7540eb7e65b553ec1ba6b20de79608');

-- --------------------------------------------------------

--
-- Table structure for table `career_place`
--

CREATE TABLE `career_place` (
  `id` int UNSIGNED NOT NULL,
  `career_place_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `career_place`
--

INSERT INTO `career_place` (`id`, `career_place_name`) VALUES
(1, 'طولكرم'),
(2, 'نابلس'),
(3, 'طوباس'),
(4, 'قلقيلية'),
(5, 'جنين');

-- --------------------------------------------------------

--
-- Table structure for table `career_type`
--

CREATE TABLE `career_type` (
  `id` int NOT NULL,
  `career_type_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `career_type`
--

INSERT INTO `career_type` (`id`, `career_type_name`) VALUES
(1, 'نجار'),
(2, 'كهربجي'),
(3, 'طوبرجي'),
(4, 'حداد'),
(5, 'بليط');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `loginname` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tel` varchar(60) DEFAULT NULL,
  `act` int DEFAULT '1',
  `city` varchar(100) DEFAULT NULL,
  `address` mediumtext,
  `email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `fname`, `lname`, `loginname`, `password`, `date`, `tel`, `act`, `city`, `address`, `email`) VALUES
(182, 'علي', 'حسين', 'ali', '148bd547e13eebfb8511a181a03df0b3', '2019-01-05 21:29:39', '0568000000', 1, 'رام الله', 'شارع القدس', '1@1.2'),
(194, 'خلدون', 'مصطفى', 'cc', '86f0df443bf4127d8aa6432a914a0616', '2019-04-19 08:01:55', '0569000000', 1, 'جنين', 'الشارع الرئيسي', 'c@c.c'),
(195, 'معاذ', 'السيد', 'c', 'e4580e1569bfa4b721763ba590ea34fc', '2023-05-15 08:55:07', '0562000000', 1, 'طولكرم', 'قرب السوق', 'c@c.c'),
(196, 'محمد', 'عيسى', 'mm', '39ff958d88de201adb731e7eb547d8bb', '2023-05-20 12:51:05', '056833333', 1, 'الخليل', 'فلسطين', 't4523523@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int UNSIGNED NOT NULL,
  `worker_free_time_schedule_id` int DEFAULT NULL,
  `clients_id` int DEFAULT NULL,
  `work_date` date DEFAULT NULL,
  `is_approved` int NOT NULL DEFAULT '0',
  `assessment` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `worker_free_time_schedule_id`, `clients_id`, `work_date`, `is_approved`, `assessment`) VALUES
(21, 88, 194, '2023-05-18', 0, 1),
(22, 89, 194, '2023-05-18', 1, 0),
(24, 85, 194, '2023-05-18', 0, 1),
(25, 90, 194, '2023-05-18', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int UNSIGNED NOT NULL,
  `attribute` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `value` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `attribute`, `value`) VALUES
(10, 'site_main_title', 'منصة العمال والمهنيين'),
(11, 'site_sub_title', 'وظائف عامة'),
(12, 'site_copywrite', 'جميع الحقوق محفوظة ©'),
(13, 'site_head_title', 'الموقع الاول فلسطينيا'),
(15, 'note', 'اهلا بكم على مدار 24 ساعة'),
(16, 'phone', '02-2212345'),
(17, 'mobile', '0568000000'),
(18, 'email', 'admin@gmail.com'),
(19, 'fb', 'https://www.facebook.com/');

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `id` int NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `loginname` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tel` varchar(60) DEFAULT NULL,
  `act` int DEFAULT '1',
  `city` varchar(100) DEFAULT NULL,
  `address` mediumtext,
  `email` varchar(200) DEFAULT NULL,
  `confirm_worker_file` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`id`, `fname`, `lname`, `loginname`, `password`, `date`, `tel`, `act`, `city`, `address`, `email`, `confirm_worker_file`) VALUES
(182, 'محمد', 'حسان', 'ww', 'af4e816754b8ad671494751479b195ee', '2019-01-05 21:29:39', '22', 1, 'ramallh', '', '1@1.2', NULL),
(194, 'يوسف', 'محمود', 'w', '97475dfc2b5ef8996701a34496da1ccd', '2019-04-19 11:55:46', '', 1, 'bablus', '', '1@1.2', NULL),
(200, 'h', 'h', 'h', '7737e30ff1df1a730bdaef495847f567', '2023-06-14 11:37:04', 'h', 1, 'h', 'h', 'h@h.h', '1907455090_file_upload_1686742624.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `worker_free_time_schedule`
--

CREATE TABLE `worker_free_time_schedule` (
  `id` int NOT NULL,
  `daily_cost` float DEFAULT NULL,
  `worker_id` int DEFAULT NULL,
  `career_place_id` int DEFAULT NULL,
  `career_type_id` int DEFAULT NULL,
  `act` int NOT NULL DEFAULT '1',
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `worker_free_time_schedule`
--

INSERT INTO `worker_free_time_schedule` (`id`, `daily_cost`, `worker_id`, `career_place_id`, `career_type_id`, `act`, `from_date`, `to_date`) VALUES
(85, 0, 182, 4, 5, 1, '2023-05-26', '2023-05-30'),
(86, 0, 182, 4, 2, 1, '2019-04-08', '2019-04-29'),
(87, 0, 182, 3, 4, 1, '2019-04-01', '2019-04-30'),
(90, 44, 194, 4, 5, 1, '2023-05-03', '2023-06-01'),
(91, 66, 200, 3, 5, 1, '2023-06-14', '2023-06-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `career_place`
--
ALTER TABLE `career_place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_type`
--
ALTER TABLE `career_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worker_free_time_schedule`
--
ALTER TABLE `worker_free_time_schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `career_place`
--
ALTER TABLE `career_place`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `career_type`
--
ALTER TABLE `career_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `worker_free_time_schedule`
--
ALTER TABLE `worker_free_time_schedule`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
