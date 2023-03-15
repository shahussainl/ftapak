-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 10:00 AM
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
  `test_date_time` datetime NOT NULL,
  `app_is_trash` int(11) NOT NULL DEFAULT '0',
  `app_created_date` date NOT NULL,
  `app_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_test_center`
--

CREATE TABLE `applicant_test_center` (
  `app_tc_id` int(11) NOT NULL,
  `tc_center_id` int(11) NOT NULL,
  `tc_app_id` int(11) NOT NULL,
  `tc_prj_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant_test_center`
--

INSERT INTO `applicant_test_center` (`app_tc_id`, `tc_center_id`, `tc_app_id`, `tc_prj_id`) VALUES
(1, 1, 35, 8),
(2, 1, 36, 8),
(3, 1, 34, 8),
(4, 1, 3, 7),
(5, 1, 6, 1),
(6, 1, 5, 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `newsFeed_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `comment_msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `newsFeed_id`, `name`, `email`, `contact`, `comment_msg`) VALUES
(1, '2', 'khan', 'khan@gmail.com', '939393', 'ali new msg in newsFeed'),
(5, '2', 'khan', 'khan@gamil.com', '03365531217', 'new comment about '),
(6, '1', 'john', 'jhn@ghmai.com', '2348989', 'hay! this is testing');

-- --------------------------------------------------------

--
-- Table structure for table `commentsreply`
--

CREATE TABLE `commentsreply` (
  `comment_reply_id` int(11) NOT NULL,
  `comments_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `comment_msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentsreply`
--

INSERT INTO `commentsreply` (`comment_reply_id`, `comments_id`, `name`, `email`, `contact`, `comment_msg`) VALUES
(1, '1 ', 'khan', 'khan@gmil.com', '93939393', 'ali'),
(2, '6 ', 'Bradon', 'bradon@gmail.com', '89789789', 'asjfkljdskf');

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

-- --------------------------------------------------------

--
-- Table structure for table `contact_msgs`
--

CREATE TABLE `contact_msgs` (
  `sender_id` int(11) NOT NULL,
  `sender_name` varchar(50) NOT NULL,
  `sender_email` varchar(50) NOT NULL,
  `sender_msg` varchar(300) NOT NULL,
  `rec_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notify_id` int(11) NOT NULL,
  `notify_created_for` varchar(50) NOT NULL,
  `notify_operation` varchar(255) NOT NULL,
  `notify_activity_on` varchar(255) NOT NULL,
  `activity_name` varchar(500) NOT NULL,
  `modify_date` text NOT NULL,
  `notify_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `n_u_img`
--

CREATE TABLE `n_u_img` (
  `img_u_n_id` int(11) NOT NULL,
  `news_id` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL
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
  `org_logo` varchar(255) NOT NULL,
  `org_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `org_created_by` int(11) NOT NULL,
  `org_is_trash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `org_addresses`
--

CREATE TABLE `org_addresses` (
  `org_add_id` int(11) NOT NULL,
  `address1` varchar(250) DEFAULT NULL,
  `postcode` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `org_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `rollno`
--

CREATE TABLE `rollno` (
  `rollno_id` int(11) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `app_id` int(11) NOT NULL,
  `prj_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rollno_created_date` date NOT NULL,
  `rollno_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 'SETS', '3233223', 'info@sets.com', '123 Main street,<br>  PS 12345 PESHAWAR', '1475506158-new-delhi.jpg', 1, 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.google.com', 'https://www.pinterest.com', 'https://www.instagram.com', 'https://www.linkedin.com');

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

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `sub_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`sub_id`, `email`) VALUES
(1, 'khan@ggamil.com'),
(2, 'khan@gamil.com'),
(3, 'khan@ggmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `test_center`
--

CREATE TABLE `test_center` (
  `center_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(25) NOT NULL,
  `person_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_center`
--

INSERT INTO `test_center` (`center_id`, `name`, `address`, `contact`, `person_contact`) VALUES
(1, 'Nice Education System', 'University Road, Peshawar ', '2343287`', 'Alex');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_father_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_cnic` varchar(20) NOT NULL,
  `user_contact` varchar(20) NOT NULL,
  `user_telephone` varchar(15) DEFAULT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_img` varchar(255) DEFAULT NULL,
  `user_is_trash` int(11) NOT NULL DEFAULT '0',
  `user_created_date` date NOT NULL,
  `user_created_by` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_father_name`, `user_email`, `user_password`, `user_cnic`, `user_contact`, `user_telephone`, `user_address`, `user_img`, `user_is_trash`, `user_created_date`, `user_created_by`, `role_id`) VALUES
(3, 'Alex Jon', 'Mr.Jon', 'hikmatk453@gmail.com', '$2y$10$aii3jSdOebQrng6WT26OQuaXdNTPt/TM51c90wB85B8', '45665-5532122-6', '23333', NULL, 'City Tower, Spain', '', 0, '2019-11-15', 6, 3),
(4, 'Brad', 'Mark Brad', 'usmankhan.edu@gmail.com', '$2y$10$aii3jSdOebQrng6WT26OQuaXdNTPt/TM51c90wB85B8', '45665-5538524-0', '897897', NULL, 'Washington', '', 0, '2019-11-15', 6, 3),
(6, 'Mr. JohnU', 'Mr. CalklnU', 'admin@gmail.com', '$2y$10$aii3jSdOebQrng6WT26OQuaXdNTPt/TM51c90wB85B8m5eYUYtuYy', '16222-5325817-3', '321321512321', NULL, 'New York, USA', 'ashton-kutcher.jpg', 0, '2019-11-18', 6, 1),
(7, 'Naseem', 'shah', 'naseem@gmail.com', '', '45665-5533652-5', '2334324', NULL, 'peshawar', '', 0, '2019-11-15', 6, 3),
(28, 'ssksk', '', 'safk@gmail.com', NULL, '54654-6456546-5', '7787-8987897', NULL, 'wqerq3w', NULL, 0, '2019-11-25', 6, 3),
(29, 'sdhj', '', 'sldkfj@gmail.com', NULL, '44654-6546546-5', '9327-4097235', NULL, 'ioyj', NULL, 0, '2019-11-25', 6, 3),
(30, 'sfjlk', '', 'asjdfk@gmail.com', NULL, '45454-5465465-4', '8307-2057092', NULL, 'sjdfk', NULL, 0, '2019-11-25', 6, 3),
(31, 'jflkjs', '', 'aslfjk@gtmail.com', NULL, '87997-9878979-8', '7970-9700897', NULL, 'hkuj', NULL, 0, '2019-11-25', 6, 3),
(35, 'laric', '', 'laricjord@gmail.com', NULL, '64555-5555555-5', '2347-4892489', NULL, 'kljlk', NULL, 1, '2019-11-25', 6, 3),
(36, 'Johd', '', 'johd@gmail.com', NULL, '21321-2122121-2', '2342-3423422', NULL, 'Netherland', NULL, 0, '2019-11-26', 6, 3),
(37, 'Joed', '', 'jord@gmai.com', NULL, '11111-1111111-1', '8978-9709870', NULL, 'London', NULL, 0, '2019-11-26', 6, 3),
(38, 'hikmat', 'gul', 'khan@gmail.com', '$2y$10$kCTIGfY40XtoEm/oy5hlnuC.kmDX09baybVC2RsVBdiiwvU1B9YBm', '98989-8989898-9', '0908-0797797', '80809088', 'pakistan', 'app1.jpg', 0, '2019-11-27', 6, 1),
(39, 'Aldon khan', 'khan gul', 'Alex@gamil.com', '$2y$10$Ach1J1PRpUaoE96JDkeiruwUy1tOsRZLcQ1LWlD2llckH0AGWCF/q', '11116-1111111-1', '0303-0035555', '0303030', 'USA', 'app1.jpg', 0, '2019-11-28', 6, 2),
(40, 'djjd', 'gul', 'k@g.com', '$2y$10$ztdp5iK3GgyE.FCCTg2iluyZNyY10TM/Ll93X3R85MxjMlg528Zzi', '01010-1010101-0', '8888-8888888', '030303', 'kdkdk', 'testimonial-1.jpg', 0, '2019-11-28', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `user_add_id` int(11) NOT NULL,
  `address1` varchar(250) DEFAULT NULL,
  `postcode` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`user_add_id`, `address1`, `postcode`, `city`, `state`, `country`, `user_id`) VALUES
(1, NULL, '0098', NULL, 'kpk', NULL, 38),
(2, 'USA', '003303', 'peshawar', 'pakistan', 'peshwar', 39),
(3, 'kdkdk', '09000', 'dkdkkd', 'k;lfl', 'pakistan', 40);

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
-- Indexes for table `applicant_test_center`
--
ALTER TABLE `applicant_test_center`
  ADD PRIMARY KEY (`app_tc_id`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`atten_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `commentsreply`
--
ALTER TABLE `commentsreply`
  ADD PRIMARY KEY (`comment_reply_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `contact_msgs`
--
ALTER TABLE `contact_msgs`
  ADD PRIMARY KEY (`sender_id`);

--
-- Indexes for table `news_updates`
--
ALTER TABLE `news_updates`
  ADD PRIMARY KEY (`n_u_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notify_id`);

--
-- Indexes for table `n_u_img`
--
ALTER TABLE `n_u_img`
  ADD PRIMARY KEY (`img_u_n_id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `org_addresses`
--
ALTER TABLE `org_addresses`
  ADD PRIMARY KEY (`org_add_id`);

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
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `test_center`
--
ALTER TABLE `test_center`
  ADD PRIMARY KEY (`center_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`user_add_id`);

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
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant_test_center`
--
ALTER TABLE `applicant_test_center`
  MODIFY `app_tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `atten_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `commentsreply`
--
ALTER TABLE `commentsreply`
  MODIFY `comment_reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_msgs`
--
ALTER TABLE `contact_msgs`
  MODIFY `sender_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_updates`
--
ALTER TABLE `news_updates`
  MODIFY `n_u_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `n_u_img`
--
ALTER TABLE `n_u_img`
  MODIFY `img_u_n_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `org_addresses`
--
ALTER TABLE `org_addresses`
  MODIFY `org_add_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prj_img`
--
ALTER TABLE `prj_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `prj_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rollno`
--
ALTER TABLE `rollno`
  MODIFY `rollno_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_msgs`
--
ALTER TABLE `staff_msgs`
  MODIFY `stf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test_center`
--
ALTER TABLE `test_center`
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `user_add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
