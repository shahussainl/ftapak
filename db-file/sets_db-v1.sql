-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2019 at 12:39 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sets_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `abt_id` int(11) NOT NULL,
  `abt_title` varchar(255) NOT NULL,
  `abt_file` varchar(255) NOT NULL,
  `abt_desc` varchar(255) NOT NULL,
  `abt_is_trash` int(11) NOT NULL DEFAULT '0',
  `abt_created_date` date NOT NULL,
  `abt_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `app_id` int(11) NOT NULL,
  `prj_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_received_date` date NOT NULL,
  `test_date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `app_is_trash` int(11) NOT NULL DEFAULT '0',
  `app_created_date` date NOT NULL,
  `app_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`app_id`, `prj_id`, `user_id`, `app_received_date`, `test_date_time`, `app_is_trash`, `app_created_date`, `app_created_by`) VALUES
(6, 1, 2, '2019-11-13', '2019-11-19 00:00:00', 0, '2019-11-09', 1),
(7, 1, 3, '2019-11-20', '2019-11-07 00:00:00', 0, '2019-11-09', 1),
(8, 1, 4, '2019-11-15', '2019-11-12 00:00:00', 0, '2019-11-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(11) NOT NULL,
  `con_title` varchar(255) NOT NULL,
  `con_mob` varchar(20) NOT NULL,
  `con_email` varchar(50) NOT NULL,
  `con_address` varchar(255) NOT NULL,
  `con_primary` int(11) NOT NULL,
  `con_is_trash` int(11) NOT NULL DEFAULT '0',
  `con_created_date` date NOT NULL,
  `con_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `con_title`, `con_mob`, `con_email`, `con_address`, `con_primary`, `con_is_trash`, `con_created_date`, `con_created_by`) VALUES
(1, 'hikmat khan', '03363030465', 'hiik@gmail.com', 'hayatabad', 0, 0, '0000-00-00', 0),
(2, 'hikmat khan', '03363030465', 'hiik@gmail.com', 'hayatabad', 0, 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_updates`
--

CREATE TABLE `news_updates` (
  `n_u_id` int(11) NOT NULL,
  `n_u_title` varchar(255) NOT NULL,
  `n_u_short_desc` varchar(300) NOT NULL,
  `n_u_long_desc` text NOT NULL,
  `n_u_file` varchar(255) NOT NULL,
  `n_u_date` date NOT NULL,
  `n_u_is_trash` int(11) NOT NULL DEFAULT '0',
  `n_u_created_date` date NOT NULL,
  `n_u_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `org_id` int(11) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `org_contact` varchar(20) NOT NULL,
  `org_email` varchar(50) NOT NULL,
  `org_fax` varchar(255) NOT NULL,
  `org_address` varchar(255) NOT NULL,
  `org_type` varchar(255) NOT NULL,
  `org_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `org_created_by` int(11) NOT NULL,
  `org_is_trash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `org_name`, `org_contact`, `org_email`, `org_fax`, `org_address`, `org_type`, `org_created_date`, `org_created_by`, `org_is_trash`) VALUES
(3, 'khnaU', '03030305', 'hinaU@gmail.com', 'khanU@gamil.co', 'HyatabadU', 'public', '2019-11-09 09:15:54', 0, 0),
(6, 'ali', '090909', 'hikmat@gmail.com', '', 'Hyatabad', 'public', '2019-11-07 18:48:50', 0, 0),
(7, 'khna', '090909', 'hina@gmail.com', 'khan@gamil.co', 'khan', 'private', '2019-11-07 18:49:04', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prj_img`
--

CREATE TABLE `prj_img` (
  `img_id` int(11) NOT NULL,
  `prj_file` varchar(255) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `img_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prj_img`
--

INSERT INTO `prj_img` (`img_id`, `prj_file`, `project_id`, `img_title`) VALUES
(6, '87123-plasticjpg-1566905349-986-640x48011.jpg', '5', ''),
(8, '87123-plasticjpg-1566905349-986-640x48012.jpg', '5', '1');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `prj_id` int(11) NOT NULL,
  `prj_name` varchar(255) NOT NULL,
  `org_id` int(11) NOT NULL,
  `prj_desc` text NOT NULL,
  `prj_total_marks` int(11) NOT NULL,
  `prj_file` varchar(255) NOT NULL,
  `prj_start_date` varchar(55) NOT NULL,
  `prj_end_date` varchar(255) NOT NULL,
  `prj_created_date` date NOT NULL,
  `prj_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`prj_id`, `prj_name`, `org_id`, `prj_desc`, `prj_total_marks`, `prj_file`, `prj_start_date`, `prj_end_date`, `prj_created_date`, `prj_created_by`) VALUES
(1, 'Buraq Job', 1, 'this is short term', 100, '', '11/13/2019', '11/04/2019', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `res_id` int(11) NOT NULL,
  `rollno_id` int(11) NOT NULL,
  `prj_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `obt_marks` int(11) NOT NULL,
  `percentage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rollno`
--

CREATE TABLE `rollno` (
  `rollno_id` int(11) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `prj_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rollno_created_date` date NOT NULL,
  `rollno_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rollno`
--

INSERT INTO `rollno` (`rollno_id`, `roll_no`, `app_id`, `prj_id`, `user_id`, `rollno_created_date`, `rollno_created_by`) VALUES
(1, 10111, 1, 1, 1, '2019-11-09', 1),
(2, 11111, 2, 1, 1, '2019-11-09', 1),
(3, 12111, 3, 1, 1, '2019-11-09', 1),
(4, 13111, 4, 1, 1, '2019-11-09', 1),
(5, 14111, 5, 1, 1, '2019-11-09', 1),
(6, 15111, 6, 1, 2, '2019-11-09', 1),
(7, 16111, 7, 1, 3, '2019-11-09', 1),
(8, 17111, 8, 1, 4, '2019-11-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff_msgs`
--

CREATE TABLE `staff_msgs` (
  `stf_id` int(11) NOT NULL,
  `stf_name` varchar(255) NOT NULL,
  `stf_designation` varchar(255) NOT NULL,
  `stf_desc` varchar(11500) NOT NULL,
  `stf_email` varchar(50) NOT NULL,
  `staff_img` varchar(255) NOT NULL,
  `stf_is_trash` int(11) NOT NULL DEFAULT '0',
  `stf_created_date` date NOT NULL,
  `stf_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_msgs`
--

INSERT INTO `staff_msgs` (`stf_id`, `stf_name`, `stf_designation`, `stf_desc`, `stf_email`, `staff_img`, `stf_is_trash`, `stf_created_date`, `stf_created_by`) VALUES
(1, 'ali', 'peshwar', 'warshah taa', 'khan@gmail.com', 'img.jpg', 1, '0000-00-00', 0),
(2, 'ali', 'peshwar', 'warshah taa', 'khan@gmail.com', 'img.jpg', 1, '0000-00-00', 0),
(3, 'hikmat', 'peshwar', 'lakaaa', 'hikmat@gmail.com', '59106121_818762501829931_6076433852509716480_n.jpg', 0, '2019-11-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_father_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_cnic` varchar(255) NOT NULL,
  `user_contact` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_is_trash` int(11) NOT NULL DEFAULT '0',
  `user_created_date` date NOT NULL,
  `user_created_by` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_father_name`, `user_email`, `user_cnic`, `user_contact`, `user_address`, `user_is_trash`, `user_created_date`, `user_created_by`, `role_id`) VALUES
(3, 'Alex Jon', 'Mr.Jon', 'Alex@gmail.com', '4566', '23333', 'City Tower, Spain', 0, '2019-11-09', 1, 3),
(4, 'Brad', 'Mark Brad', 'brad@gmail.com', '4555', '897897', 'Washington', 0, '2019-11-09', 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`abt_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `news_updates`
--
ALTER TABLE `news_updates`
  ADD PRIMARY KEY (`n_u_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `prj_img`
--
ALTER TABLE `prj_img`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`prj_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`res_id`);

--
-- Indexes for table `rollno`
--
ALTER TABLE `rollno`
  ADD PRIMARY KEY (`rollno_id`);

--
-- Indexes for table `staff_msgs`
--
ALTER TABLE `staff_msgs`
  ADD PRIMARY KEY (`stf_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `abt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news_updates`
--
ALTER TABLE `news_updates`
  MODIFY `n_u_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prj_img`
--
ALTER TABLE `prj_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `prj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rollno`
--
ALTER TABLE `rollno`
  MODIFY `rollno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff_msgs`
--
ALTER TABLE `staff_msgs`
  MODIFY `stf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
