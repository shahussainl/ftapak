-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 10:34 AM
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
  `abt_desc` text NOT NULL,
  `abt_is_trash` int(11) NOT NULL DEFAULT '0',
  `abt_created_date` date NOT NULL,
  `abt_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`abt_id`, `abt_title`, `abt_file`, `abt_desc`, `abt_is_trash`, `abt_created_date`, `abt_created_by`) VALUES
(1, 'What is Lorem Ipsum?', 'cats.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ', 0, '0000-00-00', 6),
(2, 'we use it?', '3c2aaf00-8ee.jpg', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ', 0, '0000-00-00', 6);

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
(1, 'Quick Address', '(091)-787-989', 'info@sets.com', 'Peshawar', 1, 0, '0000-00-00', 0),
(2, 'University Road Branch', '(091)-555-221', 'info@sets.com', 'Peshawar, KPK', 0, 0, '0000-00-00', 0);

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
(1, 'Foreign Visitors', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', '', '2019-12-26', 0, '0000-00-00', 6),
(2, 'Job Advertisement Procedures ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. ', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', '', '2019-12-25', 0, '0000-00-00', 6),
(3, 'Test Results ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', '', '2019-12-19', 0, '0000-00-00', 6);

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

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notify_id`, `notify_created_for`, `notify_operation`, `notify_activity_on`, `activity_name`, `modify_date`, `notify_status`) VALUES
(1, '6', 'delete', '1', 'deleteSender', '2019-11-30 14:19:22', 0),
(2, '6', 'insert_update', '2', 'addSitting', '2019-11-30 15:20:40', 0),
(3, '6', 'AddContactData', '5', 'AddContactData', '2019-11-30 16:12:28', 0),
(4, '6', 'AddContactData', '5', 'AddContactData', '2019-11-30 16:13:38', 0),
(5, '6', 'update_Contact_Data', '2', 'updateContactData', '2019-11-30 16:14:25', 0),
(6, '6', 'update_Contact_Data', '1', 'updateContactData', '2019-11-30 16:14:36', 0),
(7, '6', 'AddContactData', '5', 'AddContactData', '2019-11-30 16:43:06', 0),
(8, '6', 'update_Contact_Data', '1', 'updateContactData', '2019-11-30 16:43:18', 0),
(9, '6', 'update_Contact_Data', '2', 'updateContactData', '2019-11-30 16:43:28', 0),
(10, '6', 'login', 'Admin', 'AdminVerify', '2019-12-02 10:32:58', 0),
(11, '6', 'insert_update', '2', 'addSitting', '2019-12-02 11:49:30', 0),
(12, '6', 'project_Add_Data', '3', 'projectAddData', '2019-12-02 15:07:57', 0),
(13, '6', 'Insert_Applicants_Results', '7', 'InsertApplicantsResults', '2019-12-02 16:06:57', 0),
(14, '6', 'login', 'Admin', 'AdminVerify', '2019-12-03 10:34:29', 0),
(15, '6', 'insert_Update_Applicants', '11', 'insertUpdateApplicants', '2019-12-03 11:00:01', 0),
(16, '6', 'logout', 'Admin', 'logout', '2019-12-03 11:00:28', 0),
(17, '6', 'login', 'Admin', 'AdminVerify', '2019-12-03 11:04:46', 0),
(18, '6', 'AddContactData', '5', 'AddContactData', '2019-12-03 13:03:58', 0),
(19, '6', 'AddContactData', '5', 'AddContactData', '2019-12-03 13:04:53', 0),
(20, '6', 'add_AboutData', '2', 'addAboutData', '2019-12-03 13:11:28', 0),
(21, '6', 'add_AboutData', '2', 'addAboutData', '2019-12-03 13:13:15', 0),
(22, '6', 'insert_update', '2', 'addSitting', '2019-12-03 13:14:42', 0),
(23, '6', 'insert_update', '2', 'addSitting', '2019-12-03 13:15:55', 0),
(24, '6', 'insert_update', '2', 'addSitting', '2019-12-03 13:18:25', 0),
(25, '6', 'addNews&updatesData', '2', 'addNewsData', '2019-12-03 13:19:39', 0),
(26, '6', 'addNews&updatesData', '2', 'addNewsData', '2019-12-03 13:20:53', 0),
(27, '6', 'addNews&updatesData', '2', 'addNewsData', '2019-12-03 13:22:25', 0),
(28, '6', 'updateNews&UpdatesData', '1', 'updateNewsData', '2019-12-03 13:26:14', 0),
(29, '6', 'updateNews&UpdatesData', '1', 'updateNewsData', '2019-12-03 13:58:11', 0),
(30, '6', 'add_Org_data', '5', 'addOrgData', '2019-12-03 14:01:13', 0),
(31, '6', 'add_Org_data', '5', 'addOrgData', '2019-12-03 14:02:38', 0),
(32, '6', 'add_Org_data', '5', 'addOrgData', '2019-12-03 14:04:44', 0),
(33, '6', 'add_Org_data', '5', 'addOrgData', '2019-12-03 14:06:23', 0),
(34, '6', 'project_Add_Data', '3', 'projectAddData', '2019-12-03 14:08:21', 0),
(35, '6', 'project_Add_Data', '3', 'projectAddData', '2019-12-03 14:09:55', 0),
(36, '6', 'project_Add_Data', '3', 'projectAddData', '2019-12-03 14:11:41', 0),
(37, '6', 'project_Add_Data', '3', 'projectAddData', '2019-12-03 14:14:02', 0),
(38, '6', 'project_Add_Data', '3', 'projectAddData', '2019-12-03 14:15:11', 0);

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
(1, '2', '3c2aaf00-8ee1.jpg'),
(2, '2', '8-copy-1900x1200.jpg'),
(3, '3', 'exterior.jpg'),
(4, '1', '3c2aaf00-8ee2.jpg');

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
(1, 'Law & Chamber KPK', '0311-3473883', 'info@lawchamberkpk.com', '(465)-989-798', 'Peshawar', 'Goverment', 'download.jpg', '2019-12-03 09:01:12', 6, 0),
(2, 'Next Bridge', '8999-8098000', 'info@nextbridge.com', '(445)-089-980', 'Lahore', 'Private', 'nextbridge.png', '2019-12-03 09:02:38', 6, 0),
(3, 'Netsol', '8989-8789798', 'info@netsol.com.pk', '(545)-899-878', 'Islamabad', 'Private', 'download.png', '2019-12-03 09:04:44', 6, 0),
(4, 'Mind Gig', '9098-897989', 'info@mindgigs.com', '(445)-899-899', 'peshawar', 'Semi_goverment', 'images.png', '2019-12-03 09:06:23', 6, 0);

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

--
-- Dumping data for table `org_addresses`
--

INSERT INTO `org_addresses` (`org_add_id`, `address1`, `postcode`, `city`, `state`, `country`, `org_id`) VALUES
(1, 'Peshawar', '23434', 'Peshawar', 'KPK', 'Pakistan', 1),
(2, 'Lahore', '348398', 'Lahore', 'Punjab', 'Pakistan', 2),
(3, 'Islamabad', '83249', 'Islamabad', 'Capital', 'Pakistan', 3),
(4, 'peshawar', '8343294', 'Peshawar', 'KPK', 'Pakistan', 4);

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
(1, 'Programmer.pdf', '1', 'ad-1'),
(2, 'SETS.pdf', '1', 'ad-2'),
(3, 'SETS1.pdf', '2', 'pdf-ad'),
(4, 'cats1.jpg', '2', 'img-ad'),
(5, 'Programmer1.pdf', '3', 'internship-ad'),
(6, 'best-luxur.jpg', '4', 'job-ad'),
(7, 'Programmer2.pdf', '5', 'job- ad');

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
(1, 'Android Developer', 2, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2><strong>Eligibility criteria</strong></h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 110, '', '2019-12-28', '2020-01-03', '2019-12-03', 6),
(2, 'Junior Programmer', 4, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2><strong>Criteria</strong></h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 100, '', '2019-12-05', '2019-12-31', '2019-12-03', 6),
(3, 'Internships', 1, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2><strong>Criteria</strong></h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<ul>\r\n	<li><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,</li>\r\n	<li>when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li>\r\n	<li>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</li>\r\n	<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</li>\r\n	<li>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</li>\r\n</ul>\r\n', 90, '', '2019-12-06', '2019-12-31', '2019-12-03', 6),
(4, 'Security Guard', 1, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2><strong>Criteria</strong></h2>\r\n\r\n<ul>\r\n	<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</li>\r\n	<li>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable.</li>\r\n	<li>English. Many desktop publishing packages and web page editors now use.</li>\r\n	<li>Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.</li>\r\n	<li>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</li>\r\n</ul>\r\n', 50, '', '2019-12-25', '2020-01-04', '2019-12-03', 6),
(5, 'UI Tester', 3, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2><strong>Criteria</strong></h2>\r\n\r\n<ul>\r\n	<li>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</li>\r\n	<li>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable.</li>\r\n	<li>English. Many desktop publishing packages and web page editors now use.</li>\r\n	<li>Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy.</li>\r\n	<li>Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</li>\r\n</ul>\r\n', 150, '', '2019-12-26', '2020-01-07', '2019-12-03', 6);

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
  `map_embed_code` text NOT NULL,
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

INSERT INTO `settings` (`company_id`, `company_name`, `company_contact`, `company_email`, `company_address`, `company_logo`, `map_embed_code`, `company_status`, `fb_link`, `twitter_link`, `google_link`, `pinterest_link`, `instagram_link`, `linkedin_link`) VALUES
(2, 'SETS', '3233223', 'info@sets.com', '123 Main street,<br>  PS 12345 PESHAWAR', 'nextbridge.png', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13230.68844417192!2d71.48958650497505!3d34.0009549064357!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xca04f0b7a1db018e!2sAl-Syed%20Plaza!5e0!3m2!1sen!2s!4v1575269025266!5m2!1sen!2s\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>\r\n', 1, 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.google.com', 'https://www.pinterest.com', 'https://www.instagram.com', 'https://www.linkedin.com');

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
(1, 'Mr. Alex', 'CEO', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2><strong>Why do we use it?</strong></h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 'ceo@sets.com', 'bill-gates.jpg', 0, '0000-00-00', 6),
(2, 'Mr. Johnithen', 'Managing Director', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 'md@sets.com', 'rasmus-lerdorf.jpg', 0, '0000-00-00', 6),
(3, 'Ms. Sirhaa Tanc', 'HR Manager', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', 'hrm@sets.com', 'afgasd.jpg', 0, '0000-00-00', 6);

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
(6, 'Mr. JohnU', 'Mr. CalklnU', 'admin@gmail.com', '$2y$10$aii3jSdOebQrng6WT26OQuaXdNTPt/TM51c90wB85B8m5eYUYtuYy', '16222-5325817-3', '321321512321', NULL, 'New York, USA', 'ashton-kutcher.jpg', 0, '2019-11-18', 6, 1);

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
  MODIFY `abt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicant_test_center`
--
ALTER TABLE `applicant_test_center`
  MODIFY `app_tc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `atten_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `n_u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notify_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `n_u_img`
--
ALTER TABLE `n_u_img`
  MODIFY `img_u_n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `org_addresses`
--
ALTER TABLE `org_addresses`
  MODIFY `org_add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prj_img`
--
ALTER TABLE `prj_img`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `prj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `user_add_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
