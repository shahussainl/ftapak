-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 06:43 AM
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

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`app_id`, `prj_id`, `user_id`, `app_received_date`, `test_date_time`, `app_is_trash`, `app_created_date`, `app_created_by`) VALUES
(1, 5, 10, '2019-12-30', '2020-01-23 14:45:00', 0, '2019-11-26', 6),
(2, 5, 11, '2020-01-01', '2020-01-23 14:45:00', 0, '2019-11-26', 6),
(3, 2, 10, '2020-01-03', '2020-01-28 15:30:00', 0, '2019-11-26', 6),
(4, 2, 36, '2019-12-31', '2020-01-28 15:30:00', 0, '2019-11-26', 6),
(5, 6, 10, '2019-12-03', '2019-12-25 16:00:00', 0, '2019-11-26', 6),
(6, 6, 37, '2019-11-29', '2019-12-25 16:00:00', 0, '2019-11-26', 6);

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

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`atten_id`, `app_id`, `prj_id`, `test_date_time`, `status`) VALUES
(1, 3, 2, '2020-01-28 00:00:00', 'P'),
(2, 4, 2, '2020-01-28 00:00:00', 'P'),
(6, 5, 6, '2019-12-25 00:00:00', 'A'),
(7, 6, 6, '2019-12-25 00:00:00', 'P');

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

--
-- Dumping data for table `news_updates`
--

INSERT INTO `news_updates` (`n_u_id`, `n_u_title`, `n_u_short_desc`, `n_u_long_desc`, `n_u_file`, `n_u_date`, `n_u_is_trash`, `n_u_created_date`, `n_u_created_by`) VALUES
(1, 'Visit next year', 'lorem lorem ipsum lorem ipsum', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '', '2019-11-28', 0, '0000-00-00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `n_u_img`
--

CREATE TABLE `n_u_img` (
  `img_u_n_id` int(11) NOT NULL,
  `news_id` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `n_u_img`
--

INSERT INTO `n_u_img` (`img_u_n_id`, `news_id`, `img`) VALUES
(1, '1', 'app122.jpg'),
(2, '2', 'about-plan30.jpg'),
(3, '1', 'cats4.jpg');

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

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `org_name`, `org_contact`, `org_email`, `org_fax`, `org_address`, `org_type`, `org_logo`, `org_created_date`, `org_created_by`, `org_is_trash`) VALUES
(1, 'Mind Gigs', '3243242', 'info@mindgig.com', '23423423', 'Peshawar, Pakistan', 'Private', 'images.png', '2019-11-26 08:31:01', 0, 0),
(2, 'Code Worms', '734887809', 'info@codeworms.com', '780976875', 'Islamabad, Pakistan', 'Private', 'Spyware-Ninja.png', '2019-11-26 09:02:17', 0, 0),
(3, 'Next Bridge Technologies', '3243243', 'info@nextbridge.pk', '4234235', 'Lahore', 'semi_goverment', 'nextbridge.png', '2019-11-26 11:12:01', 0, 0),
(4, 'Z Tech', '3432432', 'info@ztech.gov.pk', '532432', 'KPK, Pakistan', 'Goverment', 'z-soft.jpg', '2019-11-26 09:06:27', 0, 0);

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

--
-- Dumping data for table `prj_img`
--

INSERT INTO `prj_img` (`img_id`, `prj_file`, `project_id`, `img_title`) VALUES
(1, 'codersTOP-800x534.jpg', '1', 'ads'),
(2, 'Webslesson_Demo_Export_jQuery_Datatables_Data_to_Excel,_CSV,_PDF_using_PHP_Ajax2.pdf', '1', 'ads'),
(3, 'Webslesson_Demo_Export_jQuery_Datatables_Data_to_Excel,_CSV,_PDF_using_PHP_Ajax3.pdf', '2', 'job-ad'),
(4, 'Webslesson_Demo_Export_jQuery_Datatables_Data_to_Excel,_CSV,_PDF_using_PHP_Ajax4.pdf', '3', 'ui-ad'),
(5, '1475506158-new-delhi1.jpg', '4', 'job-ad'),
(6, 'cocooo.jpg', '5', 'job-ad'),
(7, 'cats3.jpg', '6', 'job-ad12'),
(8, 'Webslesson_Demo_Export_jQuery_Datatables_Data_to_Excel,_CSV,_PDF_using_PHP_Ajax5.pdf', '6', 'job-ad');

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
(1, 'Android Developer', 2, '<p><strong>Eligibility Criteria:&nbsp;</strong></p>\r\n\r\n<p>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 100, '', '2019-11-28', '2019-12-07', '0000-00-00', 6),
(2, 'Game Developer', 4, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 150, '', '2019-12-06', '2020-01-04', '0000-00-00', 6),
(3, 'UI Tester', 2, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h1><strong>Lorem Ipsum&nbsp;is simply dummy</strong></h1>\r\n\r\n<p>text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 10, '', '2019-11-29', '2019-12-07', '0000-00-00', 6),
(4, 'PSD designer', 1, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h1>Lorem Ipsum&nbsp;is simply</h1>\r\n\r\n<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1><strong>How to Apply</strong></h1>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>\r\n\r\n<p>Job Requirements</p>\r\n\r\n<ul>\r\n	<li>The DexignLab Privacy Policy was updated on 25 June 2018.</li>\r\n	<li>Who We Are and What This Policy Covers</li>\r\n	<li>Remaining essentially unchanged It was popularised in the 1960s</li>\r\n	<li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,</li>\r\n	<li>DexignLab standard dummy text ever since</li>\r\n</ul>\r\n', 125, '', '2019-11-30', '2019-12-07', '0000-00-00', 6),
(5, 'Web Developer', 3, '<h2><strong>Lorem Ipsum</strong>&nbsp;</h2>\r\n\r\n<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p><tt><strong>Lorem Ipsum</strong></tt></p>\r\n\r\n<p>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 122, '', '2019-12-06', '2020-01-04', '0000-00-00', 6),
(6, 'Back end developer', 2, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1><strong>Lorem Ipsum</strong>&nbsp;is simply</h1>\r\n\r\n<h1>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h1>\r\n', 120, '', '2019-11-29', '2019-12-07', '0000-00-00', 6);

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
(1, 5, 6, 10, 0, '0', 5, '2019-11-26', 6),
(2, 6, 6, 37, 25, '20.83', 6, '2019-11-26', 6);

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

--
-- Dumping data for table `rollno`
--

INSERT INTO `rollno` (`rollno_id`, `roll_no`, `app_id`, `prj_id`, `user_id`, `rollno_created_date`, `rollno_created_by`) VALUES
(1, '0001', 1, 5, 10, '2019-11-26', 6),
(2, '0002', 2, 5, 11, '2019-11-26', 6),
(3, '0001', 3, 2, 10, '2019-11-26', 6),
(4, '0002', 4, 2, 36, '2019-11-26', 6),
(5, '0001', 5, 6, 10, '2019-11-26', 6),
(6, '0002', 6, 6, 37, '2019-11-26', 6);

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
(5, 'khan', 'ali', 'usmansajid60@yahoo.com', '$2y$10$aii3jSdOebQrng6WT26OQuaXdNTPt/TM51c90wB85B8', '21204-5802012-1', '292929', NULL, 'peshwar pakistan', '', 0, '2019-11-15', 6, 3),
(6, 'Mr. JohnU', 'Mr. CalklnU', 'admin@gmail.com', '$2y$10$aii3jSdOebQrng6WT26OQuaXdNTPt/TM51c90wB85B8m5eYUYtuYy', '16222-5325817-3', '321321512321', NULL, 'New York, USA', 'ashton-kutcher.jpg', 0, '2019-11-18', 6, 1),
(7, 'Naseem', 'shah', 'naseem@gmail.com', '', '45665-5533652-5', '2334324', NULL, 'peshawar', '', 0, '2019-11-15', 6, 3),
(8, 'ali', 'khan', 'ali@gmail.com', '', '15102-7359986-3', '32432', NULL, 'peshawar', '', 0, '2019-11-15', 6, 3),
(9, 'Alex', 'Coln', 'alex@gmail.com', '', '45665-5532152-5', '234324243', NULL, 'Washington', '', 0, '2019-11-16', 6, 3),
(10, 'Aldon', '', 'Alex@gamil.com', '', '11111-1111111-1', '0303-0035555', NULL, 'USA', '', 0, '2019-11-26', 6, 3),
(11, 'Rock', '', 'rock@gamil.com', '', '22222-2222222-2', '9494-9495555', NULL, 'US', '', 0, '2019-11-26', 6, 3),
(12, 'Roy', 'Bill Gates', 'roy@gmail.com', '', '33333-3333333-3', '37373773', NULL, 'Swiss', '', 0, '2019-11-18', 6, 3),
(13, 'Jonseena', 'Biber', 'jon@gmail.com', '', '44444-4444444-4', '5566-7785555', NULL, 'USA', '', 0, '2019-11-23', 6, 3),
(14, 'Trum', 'Biebar', 'trum@gamil.com', '', '55555-5555555-5', '7373737', NULL, 'US', '', 0, '2019-11-18', 6, 3),
(15, 'Arsalan', 'khan', 'arsaln@gmail.com', '', '66666-6666666-6', '0404040', NULL, 'peshawar,DaraAdmkhel', '', 0, '2019-11-18', 6, 3),
(16, 'Abubakkar', 'Gul', 'abu@gamil.com', '', '77777-7777777-7', '444456788', NULL, 'peshwar', '', 0, '2019-11-18', 6, 3),
(17, 'Faheem', 'shahid', 'faheem@gamil.com', '', '88888-8888888-8', '44555666777', NULL, 'tehkal', '', 0, '2019-11-18', 6, 3),
(18, 'Raees', 'jan', 'GulMarjan@gmail.com', '', '99999-9999999-9', '2223344556676', NULL, 'peshawar,Bord ', '', 0, '2019-11-18', 6, 3),
(19, 'rasheed', 'kskks', 'JnaGul@gamil.com', '', '10101-0100101-0', '29292992', NULL, 'Malakand', '', 0, '2019-11-18', 6, 3),
(20, 'kahlil', 'khalii', 'jan@gamail.com', '', '01010-1010101-0', '4444-4422222', '68799807809', 'Bord BZAR', '', 0, '2019-11-21', 6, 3),
(21, 'Waqas khan', 'khan', 'waqas@gmail.com', '', '19301-8338837-5', '0311-155____', NULL, 'peshawar', '', 0, '2019-11-19', 6, 3),
(22, 'jhon', 'colnU', 'jhon@gmail.com', '$2y$10$AoPvT7qL14hIVTwveIgx/uj4K16Jl7ePeWJKT2gwBAp', '29888-8888888-8', '0222-2222222', '', 'asdfqw  eafras', 'accountlogin-icon.png', 0, '2019-11-21', 6, 3),
(23, 'Jodr', '', 'jod@gmaill.com', NULL, '35454-5464654-6', '3246-5464654', NULL, 'UK', NULL, 0, '2019-11-23', 6, 3),
(24, 'zendaaar', '', 'zend@gmail.com', NULL, '11252-6322222-2', '3465-4654313', NULL, 'New York', NULL, 0, '2019-11-23', 6, 3),
(25, 'akldfjkl', '', 'jdsafk@gmail.com', NULL, '11111-1111212-1', '6576-4354654', NULL, 'asjl', NULL, 0, '2019-11-23', 6, 3),
(26, 'asjfkl', '', 'Jami@gmail.com', NULL, '54555-5555555-5', '3479-3758923', NULL, 'UK', NULL, 0, '2019-11-25', 6, 3),
(27, 'dkfjla', '', 'asldj@gmail.com', NULL, '46545-6654654-6', '4654-6546546', NULL, 'kasdfjk', NULL, 0, '2019-11-25', 6, 3),
(28, 'ssksk', '', 'safk@gmail.com', NULL, '54654-6456546-5', '7787-8987897', NULL, 'wqerq3w', NULL, 0, '2019-11-25', 6, 3),
(29, 'sdhj', '', 'sldkfj@gmail.com', NULL, '44654-6546546-5', '9327-4097235', NULL, 'ioyj', NULL, 0, '2019-11-25', 6, 3),
(30, 'sfjlk', '', 'asjdfk@gmail.com', NULL, '45454-5465465-4', '8307-2057092', NULL, 'sjdfk', NULL, 0, '2019-11-25', 6, 3),
(31, 'jflkjs', '', 'aslfjk@gtmail.com', NULL, '87997-9878979-8', '7970-9700897', NULL, 'hkuj', NULL, 0, '2019-11-25', 6, 3),
(35, 'laric', '', 'laricjord@gmail.com', NULL, '64555-5555555-5', '2347-4892489', NULL, 'kljlk', NULL, 1, '2019-11-25', 6, 3),
(36, 'Johd', '', 'johd@gmail.com', NULL, '21321-2122121-2', '2342-3423422', NULL, 'Netherland', NULL, 0, '2019-11-26', 6, 3),
(37, 'Joed', '', 'jord@gmai.com', NULL, '54556-5155656-5', '8978-9709870', NULL, 'London', NULL, 0, '2019-11-26', 6, 3);

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
  MODIFY `abt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `applicant_test_center`
--
ALTER TABLE `applicant_test_center`
  MODIFY `app_tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `atten_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `n_u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `n_u_img`
--
ALTER TABLE `n_u_img`
  MODIFY `img_u_n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `org_addresses`
--
ALTER TABLE `org_addresses`
  MODIFY `org_add_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prj_img`
--
ALTER TABLE `prj_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `prj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rollno`
--
ALTER TABLE `rollno`
  MODIFY `rollno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff_msgs`
--
ALTER TABLE `staff_msgs`
  MODIFY `stf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_center`
--
ALTER TABLE `test_center`
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `user_add_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
