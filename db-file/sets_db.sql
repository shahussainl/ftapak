-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 11:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `abt_desc` text NOT NULL,
  `abt_is_trash` int(11) NOT NULL DEFAULT 0,
  `abt_created_date` date NOT NULL,
  `abt_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`abt_id`, `abt_title`, `abt_file`, `abt_desc`, `abt_is_trash`, `abt_created_date`, `abt_created_by`) VALUES
(1, 'Write about us Title here?', 'cats.jpg', 'Description of about us should be written here.', 0, '0000-00-00', 46),
(2, 'we use it?', '3c2aaf00-8ee.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ', 1, '0000-00-00', 6);

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
  `app_is_trash` int(11) NOT NULL DEFAULT 0,
  `app_created_date` date NOT NULL,
  `app_created_by` int(11) NOT NULL,
  `remarks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`app_id`, `prj_id`, `user_id`, `app_received_date`, `test_date_time`, `app_is_trash`, `app_created_date`, `app_created_by`, `remarks`) VALUES
(12, 13, 58, '2023-05-30', '2023-05-31 23:45:00', 0, '2023-05-30', 46, 'ELigible'),
(13, 13, 59, '1970-01-01', '2023-05-31 23:45:00', 0, '2023-05-30', 46, 'Rejected'),
(14, 12, 60, '2023-04-02', '2023-06-30 23:45:00', 0, '2023-05-30', 46, 'Eligible'),
(15, 12, 61, '1970-01-01', '2023-06-30 23:45:00', 0, '2023-05-30', 46, 'Eligible');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_education`
--

CREATE TABLE `applicant_education` (
  `education_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `qualification` text DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `institute` text DEFAULT NULL,
  `obtained` varchar(20) DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL,
  `percentage` varchar(20) DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_education`
--

INSERT INTO `applicant_education` (`education_id`, `applicant_id`, `qualification`, `subject`, `institute`, `obtained`, `total`, `percentage`, `updated_on`) VALUES
(1, 45, 'Matric/SSC/Equivalent', 'ss', 'dd', '33', '4', '78', '2023-04-16 15:44:17'),
(2, 47, 'Matric/SSC/Equivalent', 'Science', 'BISEM', '583', '900', '68', '2023-05-02 12:51:28'),
(3, 47, 'Matric/SSC/Equivalent', 'Science', 'BISEM', '583', '900', '68', '2023-05-02 12:52:40'),
(4, 47, 'fsc/HSSC/Equivalent', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', '2023-05-02 14:50:10'),
(5, 47, 'Bachlor/Mphl/Equivalent', 'sdf', 'sdf', 'sdf', 'sdf', 'df', '2023-05-03 13:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_experience`
--

CREATE TABLE `applicant_experience` (
  `experience_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `org` text DEFAULT NULL,
  `designation` text DEFAULT NULL,
  `duration` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_test_center`
--

CREATE TABLE `applicant_test_center` (
  `app_tc_id` int(11) NOT NULL,
  `tc_center_id` int(11) NOT NULL,
  `tc_app_id` int(11) NOT NULL,
  `tc_prj_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `applicant_test_center`
--

INSERT INTO `applicant_test_center` (`app_tc_id`, `tc_center_id`, `tc_app_id`, `tc_prj_id`) VALUES
(9, 1, 13, 13),
(10, 2, 12, 13);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`atten_id`, `app_id`, `prj_id`, `test_date_time`, `status`) VALUES
(3, 12, 13, '2023-05-31 00:00:00', 'P'),
(4, 13, 13, '2023-05-31 00:00:00', 'A');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `con_is_trash` int(11) NOT NULL DEFAULT 0,
  `con_created_date` date NOT NULL,
  `con_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `con_title`, `con_mob`, `con_email`, `con_address`, `con_primary`, `con_is_trash`, `con_created_date`, `con_created_by`) VALUES
(2, 'Islamabad Branch', '(051)-561233', 'finetestingagency@gmail.com', 'Islamabad, Pakistan', 0, 0, '0000-00-00', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `n_u_is_trash` int(11) NOT NULL DEFAULT 0,
  `n_u_created_date` date NOT NULL,
  `n_u_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `news_updates`
--

INSERT INTO `news_updates` (`n_u_id`, `n_u_title`, `n_u_short_desc`, `n_u_long_desc`, `n_u_file`, `n_u_date`, `n_u_is_trash`, `n_u_created_date`, `n_u_created_by`) VALUES
(5, 'Test Result Announced', 'Test result is announced for the post of UDC and LDC', '<p>Long Description Test result is announced for the post of UDC and LDC</p>\r\n', '', '2023-05-30', 0, '0000-00-00', 46);

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
  `notify_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notify_id`, `notify_created_for`, `notify_operation`, `notify_activity_on`, `activity_name`, `modify_date`, `notify_status`) VALUES
(170, '46', 'login', 'Admin', 'AdminVerify', '2023-05-30 22:37:12', 0),
(171, '46', 'insertion', '3', 'AddTestCenterData', '2023-05-30 22:37:43', 0),
(172, '46', 'addNews&updatesData', '2', 'addNewsData', '2023-05-30 22:38:41', 0),
(173, '46', 'update_Org_Data', '6', 'updateOrgData', '2023-05-30 22:42:07', 0),
(174, '46', 'project_Add_Data', '3', 'projectAddData', '2023-05-30 22:43:12', 0),
(175, '46', 'delete_Org_Img', '6', 'deleteOrgImg', '2023-05-30 22:43:50', 0),
(176, '46', 'update_Org_Data', '6', 'updateOrgData', '2023-05-30 22:44:05', 0),
(177, '46', 'update_Org_Data', '6', 'updateOrgData', '2023-05-30 22:44:20', 0),
(178, '46', 'update_Org_Data', '6', 'updateOrgData', '2023-05-30 22:44:42', 0),
(179, '46', 'delete_Org_Img', '6', 'deleteOrgImg', '2023-05-30 22:44:58', 0),
(180, '46', 'update_Org_Data', '6', 'updateOrgData', '2023-05-30 22:45:16', 0),
(181, '46', 'project_Add_Data', '3', 'projectAddData', '2023-05-30 22:46:40', 0),
(182, '46', 'project_Add_Data', '3', 'projectAddData', '2023-05-30 22:47:42', 0),
(183, '46', 'insert_Update_Applicants', '11', 'insertUpdateApplicants', '2023-05-30 23:35:53', 0),
(184, '46', 'insert_Update_Applicants', '11', 'insertUpdateApplicants', '2023-05-30 23:36:07', 0),
(185, '46', 'checkedApplicant', '13', 'checkedApplicant', '2023-05-30 23:36:41', 0),
(186, '46', 'checkedApplicant', '13', 'checkedApplicant', '2023-05-30 23:36:56', 0),
(187, '46', 'GenerateRollNo', '13', 'GenerateRollNo', '2023-05-30 23:37:42', 0),
(188, '46', 'insert_Update_Applicants', '11', 'insertUpdateApplicants', '2023-05-30 23:38:24', 0),
(189, '46', 'insertAttendence', '13 ', 'insert_Attendence', '2023-05-30 23:42:19', 0),
(190, '46', 'insertAttendence', '13 ', 'insert_Attendence', '2023-05-30 23:43:06', 0),
(191, '46', 'Insert_Applicants_Results', '13 ', 'InsertApplicantsResults', '2023-05-30 23:43:38', 0),
(192, '46', 'insert_Update_Applicants', '11', 'insertUpdateApplicants', '2023-05-30 23:47:11', 0),
(193, '46', 'GenerateRollNo', '12', 'GenerateRollNo', '2023-05-30 23:47:26', 0),
(194, '46', 'update_Org_Data', '7', 'updateOrgData', '2023-05-31 01:45:44', 0),
(195, '46', 'update_Org_Data', '7', 'updateOrgData', '2023-05-31 01:45:53', 0),
(196, '46', 'update_Org_Data', '7', 'updateOrgData', '2023-05-31 01:46:11', 0),
(197, '46', 'update_Org_Data', '7', 'updateOrgData', '2023-05-31 01:47:23', 0),
(198, '46', 'update_About', '2', 'updateAboutData', '2023-05-31 02:07:45', 0),
(199, '46', 'project_Add_Data', '3', 'projectAddData', '2023-05-31 02:08:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `n_u_img`
--

CREATE TABLE `n_u_img` (
  `img_u_n_id` int(11) NOT NULL,
  `news_id` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `n_u_img`
--

INSERT INTO `n_u_img` (`img_u_n_id`, `news_id`, `img`) VALUES
(7, '5', 'WhatsApp_Image_2023-01-05_at_12_08_03_PM.jpeg');

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
  `org_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `org_created_by` int(11) NOT NULL,
  `org_is_trash` int(11) NOT NULL DEFAULT 0,
  `org_desc` text DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `expirydate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`org_id`, `org_name`, `org_contact`, `org_email`, `org_fax`, `org_address`, `org_type`, `org_logo`, `org_created_date`, `org_created_by`, `org_is_trash`, `org_desc`, `startdate`, `expirydate`) VALUES
(6, 'New Project Title', 'asdfasdf', 'newproject@gmail.com', 'asdf', 'Moh Ismail khel, VPO Sheikh Jana, Distt Swabi, KPK, Pakistan', 'Private', 'icon3.png', '2023-05-30 17:45:16', 46, 0, '<p>Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;</p>\r\n', '2023-05-30', '2023-06-30'),
(7, 'Second Project', 'asdf', 'sec@gmail.com', 'asdf', 'asdfasdf asdf sadf', 'Semi_goverment', 'icon3 (1).png', '2023-05-30 20:44:51', 46, 0, '<p>Test result is announced for the post of UDC and LDC</p>\r\n', '2023-05-31', '2023-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `orgp_img`
--

CREATE TABLE `orgp_img` (
  `img_id` int(11) NOT NULL,
  `orgp_file` varchar(255) NOT NULL,
  `orgp_id` varchar(255) NOT NULL,
  `img_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orgp_img`
--

INSERT INTO `orgp_img` (`img_id`, `orgp_file`, `orgp_id`, `img_title`) VALUES
(1, 'Programmer.pdf', '1', 'ad-1'),
(2, 'SETS.pdf', '1', 'ad-2'),
(3, 'SETS1.pdf', '2', 'pdf-ad'),
(4, 'cats1.jpg', '2', 'img-ad'),
(5, 'Programmer1.pdf', '3', 'internship-ad'),
(6, 'best-luxur.jpg', '4', 'job-ad'),
(7, 'Programmer2.pdf', '5', 'job- ad'),
(9, 'laptop_cond3.png', '5', '3e3'),
(10, 'sealed.png', '5', 'asfdafd'),
(11, 'wsealed.jpeg', '5', 'dsf'),
(12, 'WhatsApp_Image_2023-01-05_at_12_11_29_PM.jpeg', '6', 'Advertisement'),
(13, 'WhatsApp_Image_2023-01-05_at_1_41_04_PM.jpeg', '6', 'Advertisement1'),
(14, 'FAZAL_HUSSAIN_TKT_(1)1.pdf', '6', 'Form'),
(17, 'Application_Form-merged.pdf', '7', 'asdfasdf'),
(18, 'awaz-e-shehr_7-1-2023.pdf', '7', 'news');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `org_addresses`
--

INSERT INTO `org_addresses` (`org_add_id`, `address1`, `postcode`, `city`, `state`, `country`, `org_id`) VALUES
(6, 'Moh Ismail khel, VPO Sheikh Jana, Distt Swabi, KPK, Pakistan', '23422', 'Swabi', 'asdf', 'Pakistan', 6),
(7, 'asdfasdf asdf sadf', 'asdf', ' sadf asdf', 'as df', 'asdf ', 7);

-- --------------------------------------------------------

--
-- Table structure for table `prj_img`
--

CREATE TABLE `prj_img` (
  `img_id` int(11) NOT NULL,
  `prj_file` varchar(255) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `img_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `prj_img`
--

INSERT INTO `prj_img` (`img_id`, `prj_file`, `project_id`, `img_title`) VALUES
(14, 'WhatsApp_Image_2023-01-05_at_12_11_29_PM1.jpeg', '11', 'Advertisement'),
(15, 'iconold.png', '12', 'Advertisement'),
(16, 'icon3_(1).png', '13', 'Advertisement');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`prj_id`, `prj_name`, `org_id`, `prj_desc`, `prj_total_marks`, `prj_file`, `prj_start_date`, `prj_end_date`, `prj_created_date`, `prj_created_by`) VALUES
(11, 'UDC', 6, '<p>Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;</p>\r\n', 100, '', '2023-05-30', '2023-06-30', '2023-05-30', 46),
(12, 'LDC', 6, '<p>Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;Short Description&nbsp;</p>\r\n', 100, '', '2023-05-30', '2023-06-30', '2023-05-30', 46),
(13, 'Sweeper', 6, '<p>Short Description&nbsp;Short Description&nbsp;</p>\r\n', 100, '', '2023-05-30', '2023-05-31', '2023-05-30', 46),
(14, 'second project first port', 7, '<p>Upload Advertisenment and Application with Title</p>\r\n', 100, '', '2023-05-31', '2023-06-14', '2023-05-31', 46);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`res_id`, `rollno_id`, `prj_id`, `user_id`, `obt_marks`, `percentage`, `app_id`, `res_created_date`, `res_created_by`) VALUES
(3, 10, 13, 58, 65, '65.00', 12, '2023-05-30', 46),
(4, 11, 13, 59, 0, '0', 13, '2023-05-30', 46);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rollno`
--

INSERT INTO `rollno` (`rollno_id`, `roll_no`, `app_id`, `prj_id`, `user_id`, `rollno_created_date`, `rollno_created_by`) VALUES
(10, '0001', 12, 13, 58, '2023-05-30', 46),
(11, '0002', 13, 13, 59, '2023-05-30', 46),
(12, '0001', 14, 12, 60, '2023-05-30', 46),
(13, '0002', 15, 12, 61, '2023-05-30', 46);

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
  `map_embed_code` text NOT NULL,
  `company_status` int(1) DEFAULT 1,
  `fb_link` text NOT NULL,
  `twitter_link` text NOT NULL,
  `google_link` text NOT NULL,
  `pinterest_link` text NOT NULL,
  `instagram_link` text NOT NULL,
  `linkedin_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`company_id`, `company_name`, `company_contact`, `company_email`, `company_address`, `company_logo`, `map_embed_code`, `company_status`, `fb_link`, `twitter_link`, `google_link`, `pinterest_link`, `instagram_link`, `linkedin_link`) VALUES
(2, 'FTAPAK', '03331234567', 'finetestingagency@gmail.com', 'Islamabad Pakistan', 'logo.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d415.4033219661124!2d73.21315074959868!3d33.599425200000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38dfef927fc53367%3A0x1b6694d4d12a3ed2!2sOpal%20Square%20By%20Edgestone!5e0!3m2!1sen!2s!4v1683797411198!5m2!1sen!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 1, 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.google.com', 'https://www.pinterest.com', 'https://www.instagram.com', 'https://www.linkedin.com');

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
  `stf_is_trash` int(11) NOT NULL DEFAULT 0,
  `stf_created_date` date NOT NULL,
  `stf_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff_msgs`
--

INSERT INTO `staff_msgs` (`stf_id`, `stf_name`, `stf_designation`, `stf_desc`, `stf_email`, `staff_img`, `stf_is_trash`, `stf_created_date`, `stf_created_by`) VALUES
(1, 'Mr. Shahzad', 'CEO', 'Long description and messages here Long description and messages here Long description and messages here Long description and messages here Long description and messages here Long description and messages here Long description and messages here Long description and messages here ', 'shahzad@gmail.com', 'DSC00273.jpg', 0, '0000-00-00', 46),
(2, 'Mr. Aman Ullah', 'Managing Director', 'Long description and messages here Long description and messages here Long description and messages here Long description and messages here Long description and messages here Long description and messages here Long description and messages here Long description and messages here Long description and messages here ', 'aman@gmail.com', 'rasmus-lerdorf.jpg', 0, '0000-00-00', 46),
(3, 'Mr. Shah Hussain', 'IT Incharge', 'Long description and messages here Long description and messages here Long description and messages here Long description and messages here Long description and messages here ', 'shahhussinf@gmail.com', 'DSC00273.jpg', 0, '0000-00-00', 46);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `sub_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `test_center`
--

INSERT INTO `test_center` (`center_id`, `name`, `address`, `contact`, `person_contact`) VALUES
(1, 'hssc school pesh', 'peshawar', '1233-5520555', 'khan'),
(2, 'GHSS Swabi', 'Main swabi, KPK, Pakistan', '0333-1234567', 'Ahmad Ali'),
(3, 'New Test Center Name', 'Islamabad', '0301-6266565', 'Shah');

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
  `user_is_trash` int(11) NOT NULL DEFAULT 0,
  `user_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_created_by` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(100) NOT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `last_degree` varchar(100) DEFAULT NULL,
  `disability` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fullname`, `user_father_name`, `user_email`, `user_password`, `user_cnic`, `user_contact`, `user_telephone`, `user_address`, `user_img`, `user_is_trash`, `user_created_date`, `user_created_by`, `role_id`, `dob`, `gender`, `religion`, `district`, `province`, `last_degree`, `disability`) VALUES
(46, 'FTAPAK', 'Administrator', 'finetestingagency@gmail.com', '$2y$10$b4sP39pg61cOwWPZ72YxYeufGyqzhKX8la6wFcxyBbWeNqPVv1WFW', '16202-1234567-8', '0333-1234567', '', 'Islamabad, Pakistan', 'logo.png', 0, '2023-04-18 19:00:00', 46, 1, NULL, '', NULL, NULL, NULL, NULL, NULL),
(58, 'sweeper1', 'swerf', '111@gmail.com', NULL, '11111-1111111-1', '1111-1111111', NULL, '', NULL, 0, '2023-05-29 19:00:00', 46, 3, '1970-01-01', 'Male', 'Muslim', 'Swabi', 'Punjab', 'gf', 'No'),
(59, 'sweeper2', 'asdf', '222@gmail.com', NULL, '22222-2222222-2', '2222-2222222', NULL, '', NULL, 0, '2023-05-29 19:00:00', 46, 3, '1970-01-01', 'Female', 'Jew', 'Sfd', 'Punjab', 'gf', 'Yes'),
(60, 'LDC1', 'ldcfather', '333@gmail.com', NULL, '33333-3333333-3', '3333-3333333', NULL, '444', NULL, 0, '2023-05-29 19:00:00', 46, 3, '2023-05-10', 'Male', 'Christian', 'Swabi', 'Punjab', 'gf', 'Yes'),
(61, 'LDC2', 'sdf', '444@gmail.com', NULL, '44444-4444444-4', '4444-4444444', NULL, 'swabi', NULL, 0, '2023-05-29 19:00:00', 46, 3, '2023-05-02', 'Female', 'Christian', 'Sfd', 'Punjab', 'asdf', 'No');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`user_add_id`, `address1`, `postcode`, `city`, `state`, `country`, `user_id`) VALUES
(13, NULL, NULL, '', NULL, NULL, 58),
(14, NULL, NULL, '', NULL, NULL, 59),
(15, NULL, NULL, '444', NULL, NULL, 60),
(16, NULL, NULL, 'swabi', NULL, NULL, 61);

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
-- Indexes for table `applicant_education`
--
ALTER TABLE `applicant_education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `applicant_experience`
--
ALTER TABLE `applicant_experience`
  ADD PRIMARY KEY (`experience_id`);

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
-- Indexes for table `orgp_img`
--
ALTER TABLE `orgp_img`
  ADD PRIMARY KEY (`img_id`);

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
  MODIFY `abt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `applicant_education`
--
ALTER TABLE `applicant_education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `applicant_experience`
--
ALTER TABLE `applicant_experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applicant_test_center`
--
ALTER TABLE `applicant_test_center`
  MODIFY `app_tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `atten_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commentsreply`
--
ALTER TABLE `commentsreply`
  MODIFY `comment_reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_msgs`
--
ALTER TABLE `contact_msgs`
  MODIFY `sender_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_updates`
--
ALTER TABLE `news_updates`
  MODIFY `n_u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `n_u_img`
--
ALTER TABLE `n_u_img`
  MODIFY `img_u_n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orgp_img`
--
ALTER TABLE `orgp_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `org_addresses`
--
ALTER TABLE `org_addresses`
  MODIFY `org_add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `prj_img`
--
ALTER TABLE `prj_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `prj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rollno`
--
ALTER TABLE `rollno`
  MODIFY `rollno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_msgs`
--
ALTER TABLE `staff_msgs`
  MODIFY `stf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test_center`
--
ALTER TABLE `test_center`
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `user_add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
