-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2020 at 05:31 PM
-- Server version: 5.7.30
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ycstechi_hyt-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(215) NOT NULL,
  `name` text NOT NULL,
  `dob` varchar(255) NOT NULL,
  `mobile` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(215) NOT NULL,
  `password` varchar(215) NOT NULL,
  `designation` varchar(215) NOT NULL,
  `image` varchar(215) NOT NULL DEFAULT 'patient9.jpg',
  `type` varchar(255) NOT NULL DEFAULT 'admin',
  `generated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `dob`, `mobile`, `address`, `email`, `password`, `designation`, `image`, `type`, `generated_at`) VALUES
(1, 'Your Name', '09/02/1995', '9876543210', 'Pune, Maharashtra', 'super@admin.com', 'admin', 'Designation', 'patient9.jpg', 'admin', '2020-05-20 08:40:36'),
(3, '', '', '', '', 'super1@admin.com', 'admin', '', 'patient9.jpg', 'admin', '2020-06-07 19:31:52'),
(4, '', '', '', '', 'super2@admin.com', 'admin', '', 'patient9.jpg', '', '2020-06-15 05:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `booking_date` varchar(255) NOT NULL,
  `booking_time` varchar(255) NOT NULL,
  `revert_booking_date` varchar(255) DEFAULT NULL,
  `revert_booking_time` varchar(255) DEFAULT NULL,
  `booking_with` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Waiting',
  `approve_status` varchar(255) NOT NULL DEFAULT 'Pending Approval',
  `waiting_area` varchar(255) NOT NULL DEFAULT 'No',
  `waiting_time` varchar(255) DEFAULT NULL,
  `guest` varchar(255) NOT NULL DEFAULT 'no',
  `meeting_partner` varchar(255) NOT NULL DEFAULT 'Single',
  `meeting_type` varchar(255) NOT NULL,
  `meeting_status` varchar(255) NOT NULL DEFAULT 'Not Started',
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `email`, `emp_name`, `emp_code`, `booking_date`, `booking_time`, `revert_booking_date`, `revert_booking_time`, `booking_with`, `subject`, `status`, `approve_status`, `waiting_area`, `waiting_time`, `guest`, `meeting_partner`, `meeting_type`, `meeting_status`, `modified_at`) VALUES
(1, 'shubham@ycstech.in', 'Shubham Balkawade', '', '2020-10-07', '8:09 PM', '2020-10-07', '9:09 PM', 'sir@admin.com', 'test subject', 'Accepted', 'Approved', 'Yes', 'Wait For 10 Minutes', 'no', '', 'Single', 'Started', '2020-07-10 11:39:37'),
(2, 'shubham@ycstech.in', 'Shubham Balkawade', '', '2020-11-11', '7:29 PM', NULL, NULL, 'madam@admin.com', 'test', 'Waiting', 'Approved', 'No', NULL, 'no', '', 'Single', 'Not Started', '2020-07-10 11:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `authorities`
--

CREATE TABLE `authorities` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `modes` varchar(255) NOT NULL DEFAULT 'available',
  `name` varchar(255) NOT NULL DEFAULT 'User',
  `dob` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'patient.jpg',
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authorities`
--

INSERT INTO `authorities` (`id`, `email`, `password`, `type`, `modes`, `name`, `dob`, `mobile`, `address`, `designation`, `image`, `modified_at`) VALUES
(14, 'sir@admin.com', 'admin', 'authority', 'available', 'Tushar Wagh', '', '', 'Pune, Maharashtra', 'Managing Director', 'patient2.jpg', '2020-07-10 11:35:53'),
(15, 'madam@admin.com', 'admin', 'authority', 'available', 'Pradnya Wagh', '', '', 'Pune, Maharashtra', 'Director', 'patient7.jpg', '2020-07-09 09:40:19'),
(17, 'shubham@ycstech.in', 'admin', 'employee', 'available', 'Shubham Balkawade', '', '', '', 'Marketing Engineer', 'patient3.jpg', '2020-07-07 11:01:33'),
(100, 'hod@admin.com', 'admin', 'hod', 'available', 'HOD', '', '', '', 'Head Of Department', 'patient.jpg', '2020-06-15 06:46:36'),
(102, 'ceo@admin.com', 'admin', 'ceo', 'available', 'CEO', '', '', '', 'Chief Executive Officer', 'patient.jpg', '2020-06-15 07:56:59'),
(103, 'vice@admin.com', 'admin', 'vice_president', 'available', 'Vice', '', '', '', 'Vice President', 'patient.jpg', '2020-06-15 07:53:47'),
(104, 'hod1@admin.com', 'admin', 'hod', 'available', 'HOD 1', '', '', '', 'Head Of Department', 'patient.jpg', '2020-06-16 07:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_name` text NOT NULL,
  `emp_code` text NOT NULL,
  `emp_appt` text NOT NULL,
  `emp_subject` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Waiting',
  `waiting_time` varchar(255) DEFAULT NULL,
  `generated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_name`, `emp_code`, `emp_appt`, `emp_subject`, `status`, `waiting_time`, `generated_at`) VALUES
(94, 's', 's', 'madam', 's', 'Accepted', 'Wait For 5 Minutes', '2020-05-21 03:47:26'),
(95, 'a', 'a', 'sir', 'a', 'Waiting', 'Wait for 20 Minutes', '2020-05-21 03:35:00'),
(96, 's', 's', 'madam', 's', 'Waiting', NULL, '2020-05-21 03:37:24'),
(97, 'a', 'a', 'madam', 'a', 'Waiting', NULL, '2020-05-21 05:21:30'),
(98, 'a', 'a', 'madam', 'a', 'Waiting', 'Wait For 15 Minutes', '2020-05-29 12:20:01'),
(99, 's', 's', 'sir', 's', 'Waiting', NULL, '2020-05-22 06:33:39'),
(100, 'a', 'sa', 'sir', 'as', 'Waiting', NULL, '2020-05-28 13:22:31'),
(101, 'a', 'o', 'sir', 'ff', 'Waiting', NULL, '2020-06-02 04:57:56'),
(102, 'u', 'u', 'madam', 'u', 'Waiting', NULL, '2020-06-02 04:58:07'),
(103, 'k', 'k', 'sir', 'k', 'Waiting', NULL, '2020-06-02 04:58:15'),
(104, 't', 't', 'sir', 't', 'Waiting', NULL, '2020-06-02 07:12:02');

-- --------------------------------------------------------

--
-- Table structure for table `employee1`
--

CREATE TABLE `employee1` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `emp_code` text NOT NULL,
  `booking_with` varchar(255) NOT NULL,
  `emp_appt` text NOT NULL,
  `subject` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Waiting',
  `waiting_time` varchar(255) DEFAULT NULL,
  `generated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee1`
--

INSERT INTO `employee1` (`id`, `name`, `email`, `emp_code`, `booking_with`, `emp_appt`, `subject`, `status`, `waiting_time`, `generated_at`) VALUES
(1, 'ss', '', 'ss', '', 'sir', 's', 'Waiting', NULL, '2020-06-02 11:57:42'),
(2, 'sdsdsdssds', '', 'ss', '', 'sir', 's', 'Waiting', NULL, '2020-06-02 11:58:10'),
(3, 's', '', 's', '', 'sir', 's', 'Waiting', NULL, '2020-06-02 11:59:17'),
(4, 'a', '', 'a', '', 'sir', 'a', 'Waiting', NULL, '2020-06-02 12:02:06'),
(5, 's', '', 's', '', 'sir', '', 'Waiting', NULL, '2020-06-02 12:25:25'),
(6, 'Your Name', '', 'sss', '', 'sir', '', 'Waiting', NULL, '2020-06-02 12:26:49'),
(7, 'd', '', 'd', 'sir@admin.com', '', '', 'Waiting', NULL, '2020-06-02 12:29:25'),
(8, 'f', '', 'f', 'sir@admin.com', '', 'f', 'Waiting', NULL, '2020-06-02 12:30:34'),
(9, 't', '', 't', 'sir@admin.com', '', 't', 'Waiting', NULL, '2020-06-02 12:34:00'),
(10, '', 'dd', 'dd', 'sir@admin.com', '', 'dd', 'Waiting', NULL, '2020-06-02 12:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `email`, `password`, `name`, `dob`, `mobile`, `address`, `designation`, `image`, `modified_at`) VALUES
(8, 'employee@admin.com', 'admin', 'h', '', '', '', '', '', '2020-05-29 12:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `group_appointments`
--

CREATE TABLE `group_appointments` (
  `id` int(255) NOT NULL,
  `meeting_id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_code` varchar(255) NOT NULL,
  `booking_date` varchar(255) NOT NULL,
  `booking_time` varchar(255) NOT NULL,
  `revert_booking_date` varchar(255) DEFAULT NULL,
  `revert_booking_time` varchar(255) DEFAULT NULL,
  `booking_with` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Waiting',
  `approve_status` varchar(255) NOT NULL DEFAULT 'Pending Approval',
  `waiting_area` varchar(255) NOT NULL DEFAULT 'No',
  `permission` varchar(255) NOT NULL DEFAULT 'No',
  `waiting_time` varchar(255) DEFAULT NULL,
  `guest` varchar(255) NOT NULL DEFAULT 'no',
  `meeting_partner` varchar(255) NOT NULL DEFAULT 'Single',
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_control`
--

CREATE TABLE `user_control` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `dashboard` varchar(255) NOT NULL DEFAULT '1',
  `profile_setting` varchar(255) NOT NULL DEFAULT '1',
  `change_password` varchar(255) NOT NULL DEFAULT '1',
  `logout` varchar(255) NOT NULL DEFAULT '1',
  `book_appointments` varchar(255) NOT NULL DEFAULT '1',
  `book_other_appointments` varchar(255) NOT NULL DEFAULT '0',
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_control`
--

INSERT INTO `user_control` (`id`, `email`, `type`, `dashboard`, `profile_setting`, `change_password`, `logout`, `book_appointments`, `book_other_appointments`, `modified_at`) VALUES
(4, 'omkar@ycstech.in', 'employee', '1', '1', '1', '1', '1', '0', '2020-06-01 12:01:27'),
(5, 'sir@admin.com', 'authority', '1', '1', '1', '1', '0', '0', '2020-06-01 08:48:15'),
(6, 'madam@admin.com', 'authority', '1', '1', '1', '1', '0', '0', '2020-06-01 08:48:33'),
(7, 'manoj@ycstech.in', 'employee', '1', '1', '1', '1', '1', '0', '2020-06-02 05:01:46'),
(8, 'shubham@ycstech.in', 'employee', '1', '1', '1', '1', '1', '0', '2020-06-02 05:01:34'),
(9, 'sneha@ycstech.in', 'employee', '1', '1', '1', '1', '1', '0', '2020-06-02 05:07:18'),
(14, 'amey@ycstech.in', 'employee', '1', '1', '1', '1', '1', '0', '2020-06-09 07:30:59'),
(15, 'aditya@ycstech.in', 'employee', '1', '1', '1', '1', '1', '0', '2020-06-10 11:24:47'),
(35, 'ceo@admin.com', 'ceo', '1', '1', '1', '1', '1', '0', '2020-06-15 10:48:44'),
(37, 'hod@admin.com', 'hod', '1', '1', '1', '1', '1', '0', '2020-06-15 10:23:52'),
(39, 'ceo@admin.com', 'ceo', '1', '1', '1', '1', '1', '0', '2020-06-15 10:48:44'),
(40, 'vice@admin.com', 'vice_president', '1', '1', '1', '1', '0', '0', '2020-06-15 07:52:27'),
(41, 'hod1@admin.com', 'hod', '1', '1', '1', '1', '0', '0', '2020-06-15 16:11:16'),
(42, 'hod@admin.com', 'hod', '1', '1', '1', '1', '0', '0', '2020-07-01 11:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_screen`
--

CREATE TABLE `user_screen` (
  `id` int(215) NOT NULL,
  `name` text NOT NULL,
  `dob` varchar(255) NOT NULL,
  `mobile` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(215) NOT NULL,
  `password` varchar(215) NOT NULL,
  `designation` varchar(215) NOT NULL,
  `image` varchar(215) NOT NULL DEFAULT 'patient9.jpg',
  `type` varchar(255) NOT NULL DEFAULT 'user',
  `generated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_screen`
--

INSERT INTO `user_screen` (`id`, `name`, `dob`, `mobile`, `address`, `email`, `password`, `designation`, `image`, `type`, `generated_at`) VALUES
(1, '', '', '', '', 'user@admin.com', 'admin', '', 'patient9.jpg', 'user', '2020-06-15 05:25:35'),
(2, '', '', '', '', 'user1@admin.com', 'admin', '', 'patient9.jpg', '', '2020-06-19 05:20:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authorities`
--
ALTER TABLE `authorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee1`
--
ALTER TABLE `employee1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_appointments`
--
ALTER TABLE `group_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_control`
--
ALTER TABLE `user_control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_screen`
--
ALTER TABLE `user_screen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(215) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `authorities`
--
ALTER TABLE `authorities`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `employee1`
--
ALTER TABLE `employee1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `group_appointments`
--
ALTER TABLE `group_appointments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_control`
--
ALTER TABLE `user_control`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_screen`
--
ALTER TABLE `user_screen`
  MODIFY `id` int(215) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
