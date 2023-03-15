-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 01:05 PM
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

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`abt_id`, `abt_title`, `abt_file`, `abt_desc`, `abt_is_trash`, `abt_created_date`, `abt_created_by`) VALUES
(1, 'About', '123597_shutterstock_626435660.jpg', 'lorem ipsum', 0, '2019-11-09', 1),
(2, 'NeDAta', 'accountlogin-icon.png', '<p>lorem ipsum lorem ipsum</p>\r\n', 0, '0000-00-00', 1);

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
(1, 3, 3, '2019-11-19', '2019-11-14 00:00:00', 0, '2019-11-12', 1),
(2, 3, 5, '2019-11-25', '2019-11-14 00:00:00', 0, '2019-11-12', 1),
(3, 3, 6, '2019-11-16', '2019-11-14 00:00:00', 0, '2019-11-12', 1),
(4, 4, 3, '2019-11-26', '2019-11-20 00:00:00', 0, '2019-11-13', 6),
(5, 4, 5, '2019-11-29', '2019-11-20 00:00:00', 0, '2019-11-13', 6);

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `atten_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `prj_id` int(11) NOT NULL,
  `test_date_time` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`atten_id`, `app_id`, `prj_id`, `test_date_time`, `status`) VALUES
(1, 1, 3, '2019-11-14 00:00:00', 'P'),
(2, 2, 3, '2019-11-14 00:00:00', 'A'),
(3, 3, 3, '2019-11-14 00:00:00', 'P'),
(4, 1, 3, '2019-11-14 00:00:00', 'P'),
(5, 2, 3, '2019-11-14 00:00:00', 'A'),
(6, 3, 3, '2019-11-14 00:00:00', 'A'),
(7, 1, 3, '2019-11-14 00:00:00', 'P'),
(8, 2, 3, '2019-11-14 00:00:00', 'A'),
(9, 3, 3, '2019-11-14 00:00:00', 'P');

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
(1, 'hikmat khan', '03363030465', 'hiik@gmail.com', 'hayatabad', 0, 1, '0000-00-00', 0),
(2, 'hikmat khan', '03363030465', 'hiik@gmail.com', 'hayatabad', 0, 0, '0000-00-00', 0),
(3, 'Peshawar Address', '7979789', 'info@buraq.com', 'peshawar kpk', 0, 0, '0000-00-00', 0),
(4, 'NEw address', '8978979', 'test@gmail.com', 'new address', 0, 0, '0000-00-00', 0),
(5, 'New test', '2222', 'new@gmail.com', 'new york', 1, 0, '0000-00-00', 0);

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

--
-- Dumping data for table `news_updates`
--

INSERT INTO `news_updates` (`n_u_id`, `n_u_title`, `n_u_short_desc`, `n_u_long_desc`, `n_u_file`, `n_u_date`, `n_u_is_trash`, `n_u_created_date`, `n_u_created_by`) VALUES
(1, 'Newest news', 'short description lorem ipsum lorem ipsum', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</p>\r\n', '1453233859568.jpg', '2019-11-21', 0, '0000-00-00', 0);

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
(8, 'BuraqU', '55565465', 'info@buraq.com', '7797985', 'Peshawar KPKU', 'private', '2019-11-09 11:48:22', 0, 0),
(10, 'Newest', '0313213215', 'info@newest.com', '13221', 'Peshawar city', 'other', '2019-11-11 09:29:03', 0, 0),
(11, 'Newest', '0651222', 'info@newest.com', '45455', 'new York', 'goverment', '2019-11-11 10:53:13', 0, 0);

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
(8, '87123-plasticjpg-1566905349-986-640x48012.jpg', '5', '1'),
(11, 'Coders-And-Designers.jpg', '2', 'web developer'),
(12, 'Coders-communicate-880x499.jpg', '2', ''),
(13, '4k-wallpaper-coder-coder-laptop-15276411.jpg', '3', 'Manage Adds'),
(14, '7157d6fba5585ec3adcaf2da5f3410432.png', '4', 'web2 '),
(15, '4997871.png', '4', 'dfg'),
(16, '511052.jpg', '4', 'gdf');

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
(1, 'Buraq Job', 1, 'this is short term', 100, '', '11/13/2019', '11/04/2019', '0000-00-00', 0),
(2, 'Web Developer', 1, 'lorem ipsum ', 100, '', '2019-11-13', '1903-03-03', '0000-00-00', 0),
(3, 'Manager', 10, 'lorem ipsum is lorem ipsum  merol muspi', 100, '', '2019-11-11', '2019-11-30', '0000-00-00', 0),
(4, 'Web Developer', 11, 'lorem ipsum', 90, '', '2019-11-11', '2019-11-18', '0000-00-00', 0);

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
  `percentage` varchar(255) NOT NULL,
  `app_id` int(11) NOT NULL,
  `res_created_date` date NOT NULL,
  `res_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`res_id`, `rollno_id`, `prj_id`, `user_id`, `obt_marks`, `percentage`, `app_id`, `res_created_date`, `res_created_by`) VALUES
(1, 4, 4, 3, 52, '57.78', 4, '2019-11-13', 6),
(2, 5, 4, 5, 33, '36.67', 5, '2019-11-13', 6),
(3, 1, 3, 3, 12, '12.00', 1, '2019-11-13', 6),
(4, 2, 3, 5, 66, '66.00', 2, '2019-11-13', 6),
(5, 3, 3, 6, 87, '87.00', 3, '2019-11-13', 6);

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
(1, 31230, 1, 3, 3, '2019-11-12', 1),
(2, 31231, 2, 3, 5, '2019-11-12', 1),
(3, 31232, 3, 3, 6, '2019-11-12', 1),
(4, 43440, 4, 4, 3, '2019-11-13', 6),
(5, 43441, 5, 4, 5, '2019-11-13', 6);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_contact` varchar(255) NOT NULL,
  `company_email` text NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `company_status` int(1) DEFAULT '1',
  `fb_link` text NOT NULL,
  `twitter_link` text NOT NULL,
  `google_link` text NOT NULL,
  `pinterest_link` text NOT NULL,
  `instagram_link` text NOT NULL,
  `linkedin_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`company_id`, `company_name`, `company_contact`, `company_email`, `company_address`, `company_logo`, `company_status`, `fb_link`, `twitter_link`, `google_link`, `pinterest_link`, `instagram_link`, `linkedin_link`) VALUES
(1, 'D-MART', '0977665443', 'info@dmart.com', '123 Main street,<br> \r\nUni Road, PESHAWAR', '09IMG-20190731-WA0001.jpg', 0, 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.google.com', 'https://www.pinterest.com', 'https://www.twitter.com', 'https://www.linkedin.com'),
(2, 'alharamdfsd', '3233223', '', '123 Main street,<br> \r\n PS 12345 PESHAWAR', '35images.jpg', 1, '', '', '', '', '', ''),
(3, 'sdfsdddsf', 'sdfsd', '', 'sdfsd', '11img.jpg', 0, '', '', '', '', '', '');

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
(3, 'hikmat', 'peshwar', 'lakaaa', 'hikmat@gmail.com', '59106121_818762501829931_6076433852509716480_n.jpg', 0, '2019-11-09', 1),
(4, 'jkllj', 'jk;ljlkj', 'lorem ipsum lorem ipsum lorem ipsumlkjklj', 'info@gmail.com', '7157d6fba5585ec3adcaf2da5f341043.png', 1, '2019-11-11', 1),
(5, 'NewData', 'lorme ispum lorem ipsum', 'this is lorem ipsum lorem is ipsum', 'lorem@gmail.com', '499787.png', 0, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_father_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `user_cnic` varchar(255) NOT NULL,
  `user_contact` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `user_is_trash` int(11) NOT NULL DEFAULT '0',
  `user_created_date` date NOT NULL,
  `user_created_by` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_father_name`, `user_email`, `user_password`, `user_cnic`, `user_contact`, `user_address`, `user_img`, `user_is_trash`, `user_created_date`, `user_created_by`, `role_id`) VALUES
(3, 'Alex Jon', 'Mr.Jon', 'Alex@gmail.com', '$2y$10$aii3jSdOebQrng6WT26OQuaXdNTPt/TM51c90wB85B8m5eYUYtuYy', '4566', '23333', 'City Tower, Spain', '', 0, '2019-11-13', 6, 3),
(4, 'Brad', 'Mark Brad', 'brad@gmail.com', '$2y$10$aii3jSdOebQrng6WT26OQuaXdNTPt/TM51c90wB85B8m5eYUYtuYy', '4555', '897897', 'Washington', '', 0, '2019-11-09', 1, 3),
(5, 'khan', 'ali', 'khan@gmail.com', '$2y$10$aii3jSdOebQrng6WT26OQuaXdNTPt/TM51c90wB85B8m5eYUYtuYy', '21204-5802012-1', '292929', 'peshwar pakistan', '', 0, '2019-11-13', 6, 3),
(6, 'Mr. JohnU', 'Mr. CalklnU', 'admin@gmail.com', '$2y$10$aii3jSdOebQrng6WT26OQuaXdNTPt/TM51c90wB85B8m5eYUYtuYy', '16222-5325817-3', '321321512321', 'New York, USA', '', 0, '2019-11-12', 1, 3);

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
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`atten_id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`company_id`);

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
  MODIFY `abt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `atten_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news_updates`
--
ALTER TABLE `news_updates`
  MODIFY `n_u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `prj_img`
--
ALTER TABLE `prj_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `prj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rollno`
--
ALTER TABLE `rollno`
  MODIFY `rollno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff_msgs`
--
ALTER TABLE `staff_msgs`
  MODIFY `stf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
