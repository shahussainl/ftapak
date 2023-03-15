-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 01:27 PM
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
(1, 7, 10, '2019-11-18', '2019-11-28 15:15:00', 0, '2019-11-18', 6),
(2, 7, 11, '2019-11-18', '2019-11-28 15:15:00', 0, '2019-11-18', 6),
(3, 7, 12, '2019-11-18', '2019-11-28 15:15:00', 0, '2019-11-18', 6),
(4, 7, 13, '2019-11-18', '2019-11-28 15:15:00', 0, '2019-11-18', 6),
(5, 7, 14, '2019-11-18', '2019-11-28 15:15:00', 0, '2019-11-18', 6),
(6, 6, 15, '2019-11-18', '2019-11-25 15:30:00', 0, '2019-11-18', 6),
(7, 6, 16, '2019-11-18', '2019-11-25 15:30:00', 0, '2019-11-18', 6),
(8, 6, 17, '2019-11-18', '2019-11-25 15:30:00', 0, '2019-11-18', 6),
(9, 6, 18, '2019-11-18', '2019-11-25 15:30:00', 0, '2019-11-18', 6),
(10, 6, 19, '2019-11-18', '2019-11-25 15:30:00', 0, '2019-11-18', 6),
(11, 5, 10, '2019-11-18', '2019-11-26 15:30:00', 0, '2019-11-18', 6),
(12, 5, 12, '2019-11-18', '2019-11-26 15:30:00', 0, '2019-11-18', 6),
(13, 5, 11, '2019-11-18', '2019-11-26 15:30:00', 0, '2019-11-18', 6),
(14, 5, 13, '2019-11-18', '2019-11-26 15:30:00', 0, '2019-11-18', 6),
(15, 5, 14, '2019-11-18', '2019-11-26 15:30:00', 0, '2019-11-18', 6),
(16, 4, 15, '2019-11-18', '2019-11-26 15:30:00', 0, '2019-11-18', 6),
(17, 4, 16, '2019-11-18', '2019-11-26 15:30:00', 0, '2019-11-18', 6),
(18, 4, 17, '2019-11-18', '2019-11-26 15:30:00', 0, '2019-11-18', 6),
(19, 4, 18, '2019-11-18', '2019-11-26 15:30:00', 0, '2019-11-18', 6),
(20, 4, 20, '2019-11-19', '2019-11-26 15:30:00', 0, '2019-11-18', 6),
(21, 3, 10, '2019-11-18', '2019-11-26 15:30:00', 0, '2019-11-18', 6),
(22, 3, 11, '2019-11-18', '2019-11-26 15:30:00', 0, '2019-11-18', 6),
(23, 3, 12, '2019-11-18', '2019-11-26 15:30:00', 0, '2019-11-18', 6),
(24, 3, 13, '2019-11-18', '2019-11-26 15:30:00', 0, '2019-11-18', 6),
(28, 7, 10, '2019-11-25', '2019-11-20 16:15:00', 0, '2019-11-18', 6),
(29, 7, 11, '2019-11-18', '2019-11-22 16:15:00', 0, '2019-11-18', 6),
(34, 8, 10, '1970-01-01', '2019-11-19 11:00:00', 0, '2019-11-19', 6),
(35, 8, 21, '2019-11-28', '2019-11-19 11:00:00', 0, '2019-11-19', 6),
(36, 8, 11, '2019-11-26', '2019-11-19 11:00:00', 0, '2019-11-19', 6),
(37, 8, 10, '2019-11-19', '2019-11-19 11:00:00', 0, '2019-11-19', 6);

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
(3, 1, 34, 8);

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
(1, 25, 8, '2019-11-18 00:00:00', 'P'),
(2, 26, 8, '2019-11-18 00:00:00', 'A'),
(3, 27, 8, '2019-11-18 00:00:00', 'P');

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
-- Table structure for table `n_u_img`
--

CREATE TABLE `n_u_img` (
  `n_u_id` int(11) NOT NULL,
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
  `org_created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `org_created_by` int(11) NOT NULL,
  `org_is_trash` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `org_name`, `org_contact`, `org_email`, `org_fax`, `org_address`, `org_type`, `org_created_date`, `org_created_by`, `org_is_trash`) VALUES
(10, 'buraq', '324234234', 'info@gmail.com', '12334', 'Peshawar', 'Private', '2019-11-20 11:30:43', 0, 0);

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
(1, 'alharamdfsd3.pdf', '1', 'driver ads'),
(2, 'exterior3.jpg', '2', 'office boy'),
(3, 'Webslesson_Demo_Export_jQuery_Datatables_Data_to_Excel,_CSV,_PDF_using_PHP_Ajax1.pdf', '3', 'junior web developer ads'),
(4, 'pdf-icon.jpg', '4', 'accountant 1 post-ads'),
(5, 'type-pc.jpg', '5', 'receptionist-ads'),
(6, 'Coders-communicate-880x4991.jpg', '6', 'android-ads'),
(7, 'code,_coder,_coding,_coffee,_computer,_copy,_hands,_js,_keyboard,_laptop,_note,_php,_programmer,_programming,_writing,_work,_office.jpg', '7', 'record keeper- ads'),
(8, 'pdf-icon1.jpg', '8', 'dve-ads'),
(9, 'alharamdfsd4.pdf', '9', 'pdf');

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
(1, 'Bus Drivers', 4, '3 post for bus drivers ', 100, '', '2019-11-20', '2019-11-30', '0000-00-00', 6),
(2, 'Office boy  ', 3, '1 office boy needed', 100, '', '2019-11-22', '2019-11-29', '0000-00-00', 6),
(3, 'Junior Web Developer', 3, '3 posts for junior web developer (having experience on laravel or codeigniter)', 100, '', '2019-11-22', '2019-11-27', '0000-00-00', 6),
(4, 'Accountant ', 2, 'accountant  1 post having minimum 1 year post qualification  experience', 100, '', '2019-11-21', '2019-11-29', '0000-00-00', 6),
(5, 'Receptionist  ', 1, '1 female receptionist required , no need of experience', 100, '', '2019-11-22', '2019-11-28', '0000-00-00', 6),
(6, 'Android Developer', 1, '3 android developers required ', 90, '', '2019-11-20', '2019-11-30', '0000-00-00', 6),
(7, 'Record Keeper ', 2, '2 Record keeper are required', 75, '', '2019-11-28', '2019-11-30', '0000-00-00', 6),
(8, 'junior developer', 5, ' developer required', 90, '', '2019-11-27', '2019-12-21', '0000-00-00', 6),
(9, 'Programmer', 10, 'job ads', 100, '', '2019-11-22', '2019-11-29', '0000-00-00', 6);

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
(1, 1, 8, 10, 40, '44.44', 25, '2019-11-18', 6),
(2, 3, 8, 11, 45, '50.00', 27, '2019-11-18', 6);

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
(1, 85680, 25, 8, 10, '2019-11-18', 6),
(2, 80281, 26, 8, 21, '2019-11-18', 6),
(3, 80882, 27, 8, 11, '2019-11-18', 6),
(4, 70770, 1, 7, 10, '2019-11-18', 6),
(5, 71371, 2, 7, 11, '2019-11-18', 6),
(6, 71872, 3, 7, 12, '2019-11-18', 6),
(7, 72473, 4, 7, 13, '2019-11-18', 6),
(8, 72974, 5, 7, 14, '2019-11-18', 6),
(9, 73575, 28, 7, 10, '2019-11-18', 6);

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
(2, 'alharamdfsd', '3233223', '', '123 Main street,<br>  PS 12345 PESHAWAR', '1475506158-new-delhi.jpg', 1, '', '', '', '', '', ''),
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
  `user_password` varchar(50) DEFAULT NULL,
  `user_cnic` varchar(255) NOT NULL,
  `user_contact` varchar(255) NOT NULL,
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

INSERT INTO `users` (`user_id`, `user_fullname`, `user_father_name`, `user_email`, `user_password`, `user_cnic`, `user_contact`, `user_address`, `user_img`, `user_is_trash`, `user_created_date`, `user_created_by`, `role_id`) VALUES
(3, 'Alex Jon', 'Mr.Jon', 'hikmatk453@gmail.com', '$2y$10$aii3jSdOebQrng6WT26OQuaXdNTPt/TM51c90wB85B8', '45665-5532122-6', '23333', 'City Tower, Spain', '', 0, '2019-11-15', 6, 3),
(4, 'Brad', 'Mark Brad', 'usmankhan.edu@gmail.com', '$2y$10$aii3jSdOebQrng6WT26OQuaXdNTPt/TM51c90wB85B8', '45665-5538524-0', '897897', 'Washington', '', 0, '2019-11-15', 6, 3),
(5, 'khan', 'ali', 'usmansajid60@yahoo.com', '$2y$10$aii3jSdOebQrng6WT26OQuaXdNTPt/TM51c90wB85B8', '21204-5802012-1', '292929', 'peshwar pakistan', '', 0, '2019-11-15', 6, 3),
(6, 'Mr. JohnU', 'Mr. CalklnU', 'admin@gmail.com', '$2y$10$aii3jSdOebQrng6WT26OQuaXdNTPt/TM51c90wB85B8', '16222-5325817-3', '321321512321', 'New York, USA', 'ashton-kutcher.jpg', 0, '2019-11-18', 6, 3),
(7, 'Naseem', 'shah', 'naseem@gmail.com', '', '45665-5533652-5', '2334324', 'peshawar', '', 0, '2019-11-15', 6, 3),
(8, 'ali', 'khan', 'ali@gmail.com', '', '15102-7359986-3', '32432', 'peshawar', '', 0, '2019-11-15', 6, 3),
(9, 'Alex', 'Coln', 'alex@gmail.com', '', '45665-5532152-5', '234324243', 'Washington', '', 0, '2019-11-16', 6, 3),
(10, 'Alex', 'Zender', 'Alex@gamil.com', '', '11111-1111111-1', '0303-003____', 'USA', '', 0, '2019-11-19', 6, 3),
(11, 'Rock', 'Hill', 'rock@gamil.com', '', '22222-2222222-2', '9494-949____', 'US', '', 0, '2019-11-19', 6, 3),
(12, 'Roy', 'Bill Gates', 'roy@gmail.com', '', '33333-3333333-3', '37373773', 'Swiss', '', 0, '2019-11-18', 6, 3),
(13, 'Jonseena', 'Biber', 'jon@gmail.com', '', '44444-4444444-4', '5566778', 'USA', '', 0, '2019-11-18', 6, 3),
(14, 'Trum', 'Biebar', 'trum@gamil.com', '', '55555-5555555-5', '7373737', 'US', '', 0, '2019-11-18', 6, 3),
(15, 'Arsalan', 'khan', 'arsaln@gmail.com', '', '66666-6666666-6', '0404040', 'peshawar,DaraAdmkhel', '', 0, '2019-11-18', 6, 3),
(16, 'Abubakkar', 'Gul', 'abu@gamil.com', '', '77777-7777777-7', '444456788', 'peshwar', '', 0, '2019-11-18', 6, 3),
(17, 'Faheem', 'shahid', 'faheem@gamil.com', '', '88888-8888888-8', '44555666777', 'tehkal', '', 0, '2019-11-18', 6, 3),
(18, 'Raees', 'jan', 'GulMarjan@gmail.com', '', '99999-9999999-9', '2223344556676', 'peshawar,Bord ', '', 0, '2019-11-18', 6, 3),
(19, 'rasheed', 'kskks', 'JnaGul@gamil.com', '', '10101-0100101-0', '29292992', 'Malakand', '', 0, '2019-11-18', 6, 3),
(20, 'kahlil', 'khalii', 'jan@gamail.com', '', '01010-1010101-0', '444444', 'Bord BZAR', '', 0, '2019-11-18', 6, 3),
(21, 'Waqas khan', 'khan', 'waqas@gmail.com', '', '19301-8338837-5', '0311-155____', 'peshawar', '', 0, '2019-11-19', 6, 3),
(22, 'jhon', 'coln', 'jhon@gmail.com', '$2y$10$AoPvT7qL14hIVTwveIgx/uj4K16Jl7ePeWJKT2gwBAp', '29888-8888888-8', '0222-2222222', 'asdfqw  eafras', 'd s fd s.jpg', 0, '2019-11-20', 6, 3);

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
-- Indexes for table `n_u_img`
--
ALTER TABLE `n_u_img`
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
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `applicant_test_center`
--
ALTER TABLE `applicant_test_center`
  MODIFY `app_tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `atten_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_updates`
--
ALTER TABLE `news_updates`
  MODIFY `n_u_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `n_u_img`
--
ALTER TABLE `n_u_img`
  MODIFY `n_u_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prj_img`
--
ALTER TABLE `prj_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `prj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rollno`
--
ALTER TABLE `rollno`
  MODIFY `rollno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
