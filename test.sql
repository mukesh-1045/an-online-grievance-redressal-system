-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2019 at 03:30 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '64cacbd499ffbc4c62a5eead6c3ed7f0', '');

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `complaintNumber` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `complaintNumber`, `status`, `remark`, `remarkDate`) VALUES
(1, 1, 'in process', 'hii', '2018-12-25 14:09:47'),
(2, 3, 'closed', 'fdbf', '2018-12-30 16:03:29'),
(3, 14, 'in process', 'xddf', '2019-01-06 05:07:39'),
(4, 16, 'closed', 'cff\r\n', '2019-01-06 05:07:58'),
(5, 6, 'in process', 'sdgxffdfd', '2019-02-20 09:49:03'),
(6, 25, 'in process', 'duridsyhuihgsui', '2019-02-20 09:53:02'),
(7, 29, 'closed', 'xdb,mfxklj', '2019-02-20 09:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `noc` varchar(255) NOT NULL,
  `complaintDetails` mediumtext NOT NULL,
  `complaintFile` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`complaintNumber`, `userId`, `type`, `usertype`, `noc`, `complaintDetails`, `complaintFile`, `status`, `regDate`, `lastUpdationDate`) VALUES
(1, 1, '', '', '1st complaint', 'hello everyone whats up  ', '', 'in process', '2018-12-25 14:08:53', '2018-12-25 14:09:47'),
(2, 1, '', '', '2nd complaint', 'its done   ', '', NULL, '2018-12-25 14:09:12', NULL),
(3, 1, '', '', 'whats', 'bmbhbhjbj	  ', '', 'closed', '2018-12-30 16:01:29', '2018-12-30 16:03:30'),
(4, 1, '', '', 'xfbx', '	xfdbfx  ', '', NULL, '2018-12-30 16:04:19', NULL),
(5, 3, '', '', 'drhwsd', '	dsbdf  ', '', NULL, '2019-01-02 15:03:17', NULL),
(6, 3, '', '', 'cxffbxcfbfds', '	sekgjbdskgvik  ', '', 'in process', '2019-01-02 15:03:25', '2019-02-20 09:49:03'),
(7, 2, '', '', 'dfgudsfh', 'sdgljjdsajgkb	  ', '', NULL, '2019-01-02 15:03:39', NULL),
(8, 2, '', '', 'dzxkvhlsdk', 'sdl;vkjdskvl	  ', '', NULL, '2019-01-02 15:03:44', NULL),
(9, 2, '', '', 'xfbxcg', 'cb f	  ', '', NULL, '2019-01-02 15:03:50', NULL),
(10, 1, '', '', 'dfzbfcnb', 'dsrrgrse	  ', '', NULL, '2019-01-02 15:12:16', NULL),
(11, 1, '', '', 'ergerh', 'srgdsf	  ', '', NULL, '2019-01-02 15:12:19', NULL),
(12, 1, '', '', 'efgerwgwerhgre', 'vcbdngdf	  ', '', NULL, '2019-01-02 15:12:23', NULL),
(13, 1, '', '', 'werewtbn', 'dffdhtrujgnscv	  ', '', NULL, '2019-01-02 15:12:29', NULL),
(14, 1, '', '', 'eer543tretgrewghrd', 'sderwhgrtew	  ', '', 'in process', '2019-01-02 15:12:39', '2019-01-06 05:07:40'),
(15, 1, '', '', 'efewrgter', 'gewqrgherqn	  ', '', NULL, '2019-01-02 15:12:43', NULL),
(16, 1, '', '', 'dsbadsb', 'sdfbtr	  ', '', 'closed', '2019-01-02 15:13:05', '2019-01-06 05:07:58'),
(17, 1, '', '', 'ewqty5444427', '2341253653	  ', '', NULL, '2019-01-02 15:13:09', NULL),
(18, 1, '', '', 'wetgrewbsdf3426246', 'qq3432fwe	  ', '', NULL, '2019-01-02 15:13:15', NULL),
(19, 1, '', '', 'xdfxbdf', '	  ', '', NULL, '2019-01-02 15:14:30', NULL),
(20, 9, '', '', 'its from prem', 'it contains a attachment	  ', 'Activite dia admin.jpg', NULL, '2019-01-27 13:27:06', NULL),
(21, 1, '', '', 'di', 'five	  ', 'PPT Format by chetna mam.ppt', NULL, '2019-01-27 13:28:25', NULL),
(22, 1, '', '', 'fc', '	cb  ', '', NULL, '2019-02-08 18:16:12', NULL),
(23, 10, 'Academic', '', 'TESTING', 'testing for select	  ', '', NULL, '2019-02-08 18:21:37', NULL),
(24, 10, 'Administration', '', 'testing 2', 'testing for selewct 2	  ', '', NULL, '2019-02-08 18:22:05', NULL),
(25, 10, 'Administration', '', 'drgd', '	dfbsdfbdb  ', '', 'in process', '2019-02-08 18:22:27', '2019-02-20 09:53:02'),
(26, 10, 'Administration', '', 'cfbd', 'dbdf	  ', '', NULL, '2019-02-14 19:20:30', NULL),
(27, 10, 'Administration', 'usertype', 'sseffgsd', '	 dvsdvsdv ', '', NULL, '2019-02-20 03:35:29', NULL),
(28, 10, 'Academic', 'Teacher', 'xfgh', 'sfdsdgds	  ', '', NULL, '2019-02-20 03:36:49', NULL),
(29, 10, 'Administration', 'Others', 'ddgs', '	dvd  ', '', 'closed', '2019-02-20 03:37:08', '2019-02-20 09:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` bigint(11) DEFAULT NULL,
  `userPic` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `userEmail`, `password`, `contactNo`, `userPic`, `regDate`, `UpdateDate`, `status`) VALUES
(1, 'mukeshbuldak', 'mukeshbuldak@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2147483647, 'cecc550998c3e92b80fcb1b77121435f.jpg', '2018-12-25 14:07:10', '2018-12-25 14:08:19', 1),
(3, 'dhano', 'dhano@123', '202cb962ac59075b964b07152d234b70', 2147483647, NULL, '2019-01-02 15:02:57', '0000-00-00 00:00:00', 1),
(4, 'dhanshree', 'dhano@02', '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, '2019-01-02 16:18:35', '0000-00-00 00:00:00', 1),
(5, 'mukeshbuldak', 'mukeshkbuldak@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, NULL, '2019-01-15 10:29:10', '0000-00-00 00:00:00', 1),
(6, 'mukesh', 'muke@gmail.com', 'c6cdd77bd9f07950e60bfffa2b6017d4', 0, NULL, '2019-01-22 10:06:24', '0000-00-00 00:00:00', 1),
(7, 'dhano', 'dhano@123', '202cb962ac59075b964b07152d234b70', 7888047251, NULL, '2019-01-27 12:59:42', '0000-00-00 00:00:00', 1),
(8, 'shrikant', 'shrikant@123', '202cb962ac59075b964b07152d234b70', 5252525252, NULL, '2019-01-27 13:17:06', '0000-00-00 00:00:00', 1),
(9, 'prem', 'prem@123', '827ccb0eea8a706c4c34a16891f84e7b', 7558418411, NULL, '2019-01-27 13:21:26', '0000-00-00 00:00:00', 1),
(10, 'hunter', 'hunter@123', '7815696ecbf1c96e6894b779456d330e', 7558418411, '76b08d8c2e85fd73ce40d04ab98e5cd8.jpg', '2019-02-08 17:37:33', '2019-02-14 19:20:14', 1),
(11, 'manoj', 'manoj@123', '5e81f9859d223ea420aca993c647b839', 7709242433, NULL, '2019-02-11 19:02:50', '0000-00-00 00:00:00', 1),
(12, 'mukeshbuldak11', 'mukeshkbuldak@gmail.com', '202cb962ac59075b964b07152d234b70', 1111111111, NULL, '2019-02-11 19:09:40', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 1, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2018-12-25 14:07:21', '25-12-2018 07:39:21 PM', 1),
(2, 1, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2018-12-30 16:01:18', '30-12-2018 09:34:45 PM', 1),
(3, 3, 'dhano@123', 0x3a3a3100000000000000000000000000, '2019-01-02 15:03:11', '02-01-2019 08:33:28 PM', 1),
(4, 2, 'shri@123', 0x3a3a3100000000000000000000000000, '2019-01-02 15:03:33', '02-01-2019 08:33:53 PM', 1),
(5, 1, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2019-01-02 15:12:10', '02-01-2019 08:44:34 PM', 1),
(6, 0, 'dhano@0212345', 0x3a3a3100000000000000000000000000, '2019-01-02 16:20:51', '', 0),
(7, 0, 'dhano@02', 0x3a3a3100000000000000000000000000, '2019-01-02 16:21:02', '', 0),
(8, 3, 'dhano@123', 0x3a3a3100000000000000000000000000, '2019-01-02 16:21:14', '02-01-2019 09:51:24 PM', 1),
(9, 1, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2019-01-06 05:15:29', '06-01-2019 10:46:07 AM', 1),
(10, 1, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2019-01-20 16:46:04', '20-01-2019 10:18:28 PM', 1),
(11, 6, 'muke@gmail.com', 0x3a3a3100000000000000000000000000, '2019-01-22 10:08:08', '', 1),
(12, 3, 'dhano@123', 0x3a3a3100000000000000000000000000, '2019-01-27 13:00:20', '27-01-2019 06:30:39 PM', 1),
(13, 3, 'dhano@123', 0x3a3a3100000000000000000000000000, '2019-01-27 13:00:57', '', 1),
(14, 1, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2019-01-27 13:06:51', '27-01-2019 06:37:20 PM', 1),
(15, 3, 'dhano@123', 0x3a3a3100000000000000000000000000, '2019-01-27 13:07:37', '27-01-2019 06:38:50 PM', 1),
(16, 1, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2019-01-27 13:11:02', '27-01-2019 06:41:11 PM', 1),
(17, 0, 'shrkant@123', 0x3a3a3100000000000000000000000000, '2019-01-27 13:17:16', '', 0),
(18, 8, 'shrikant@123', 0x3a3a3100000000000000000000000000, '2019-01-27 13:17:29', '27-01-2019 06:47:35 PM', 1),
(19, 9, 'prem@123', 0x3a3a3100000000000000000000000000, '2019-01-27 13:21:38', '27-01-2019 06:51:40 PM', 1),
(20, 0, 'prem@123', 0x3a3a3100000000000000000000000000, '2019-01-27 13:21:47', '', 0),
(21, 0, 'prem@123', 0x3a3a3100000000000000000000000000, '2019-01-27 13:23:33', '', 0),
(22, 0, 'prem@123', 0x3a3a3100000000000000000000000000, '2019-01-27 13:23:43', '', 0),
(23, 0, 'prem@123', 0x3a3a3100000000000000000000000000, '2019-01-27 13:25:18', '', 0),
(24, 9, 'prem@123', 0x3a3a3100000000000000000000000000, '2019-01-27 13:25:26', '27-01-2019 06:55:28 PM', 1),
(25, 9, 'prem@123', 0x3a3a3100000000000000000000000000, '2019-01-27 13:26:07', '27-01-2019 06:56:17 PM', 1),
(26, 9, 'prem@123', 0x3a3a3100000000000000000000000000, '2019-01-27 13:26:25', '27-01-2019 06:59:10 PM', 1),
(27, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-08 17:37:44', '', 1),
(28, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-08 17:58:31', '', 0),
(29, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-08 17:58:58', '08-02-2019 11:29:34 PM', 1),
(30, 0, 'mukesh@123', 0x3a3a3100000000000000000000000000, '2019-02-08 18:02:30', '', 0),
(31, 0, 'mukesh@dffvdf', 0x3a3a3100000000000000000000000000, '2019-02-08 18:03:01', '', 0),
(32, 0, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2019-02-08 18:03:27', '', 0),
(33, 1, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2019-02-08 18:03:41', '08-02-2019 11:50:32 PM', 1),
(34, 10, 'HUNTER@123', 0x3a3a3100000000000000000000000000, '2019-02-08 18:20:52', '08-02-2019 11:59:57 PM', 1),
(35, 0, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2019-02-09 18:06:11', '', 0),
(36, 1, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2019-02-09 18:06:26', '09-02-2019 11:50:23 PM', 1),
(37, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-11 18:20:29', '', 0),
(38, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-11 18:20:36', '11-02-2019 11:56:54 PM', 1),
(39, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-11 18:28:11', '', 0),
(40, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-11 18:29:02', '', 0),
(41, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-11 18:34:16', '12-02-2019 12:04:18 AM', 1),
(42, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-11 18:37:12', '12-02-2019 12:07:14 AM', 1),
(43, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-11 19:13:04', '12-02-2019 12:44:28 AM', 1),
(44, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-11 19:14:39', '12-02-2019 12:44:41 AM', 1),
(45, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-11 19:14:57', '12-02-2019 12:45:04 AM', 1),
(46, 0, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2019-02-12 06:57:27', '', 0),
(47, 1, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2019-02-12 06:57:41', '12-02-2019 12:29:01 PM', 1),
(48, 1, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2019-02-12 07:21:35', '12-02-2019 12:52:53 PM', 1),
(49, 1, 'mukeshbuldak@gmAIL.COM', 0x3a3a3100000000000000000000000000, '2019-02-12 09:21:49', '', 1),
(50, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 17:14:43', '12-02-2019 10:45:08 PM', 1),
(51, 1, 'mukeshbuldak@gmail.com', 0x3a3a3100000000000000000000000000, '2019-02-12 17:15:22', '12-02-2019 10:45:32 PM', 1),
(52, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:26:13', '12-02-2019 11:56:40 PM', 1),
(53, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:26:47', '', 0),
(54, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:27:22', '12-02-2019 11:57:35 PM', 1),
(55, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:27:43', '', 0),
(56, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:29:32', '13-02-2019 12:02:54 AM', 1),
(57, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:33:01', '', 0),
(58, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:33:13', '13-02-2019 12:03:15 AM', 1),
(59, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:45:13', '', 0),
(60, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:45:19', '13-02-2019 12:15:31 AM', 1),
(61, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:45:37', '', 0),
(62, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:48:32', '', 0),
(63, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:48:38', '13-02-2019 12:18:49 AM', 1),
(64, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:48:53', '', 0),
(65, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:49:00', '13-02-2019 12:19:11 AM', 1),
(66, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:49:31', '13-02-2019 12:27:46 AM', 1),
(67, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:57:51', '', 0),
(68, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 18:59:09', '13-02-2019 12:33:50 AM', 1),
(69, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 19:03:56', '13-02-2019 12:35:28 AM', 1),
(70, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-12 19:05:33', '13-02-2019 12:38:01 AM', 1),
(71, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-13 17:43:49', '13-02-2019 11:39:26 PM', 1),
(72, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-13 18:09:32', '13-02-2019 11:42:59 PM', 1),
(73, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-13 18:13:05', '13-02-2019 11:59:16 PM', 1),
(74, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-13 18:29:27', '', 0),
(75, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-13 18:29:34', '', 0),
(76, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-13 18:29:40', '13-02-2019 11:59:42 PM', 1),
(77, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-14 19:16:55', '', 0),
(78, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-14 19:17:02', '', 0),
(79, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-14 19:19:02', '15-02-2019 12:50:50 AM', 1),
(80, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-14 19:23:46', '15-02-2019 01:01:28 AM', 1),
(81, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-20 03:30:09', '', 0),
(82, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-20 03:30:16', '', 0),
(83, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-20 03:30:22', '20-02-2019 09:35:20 AM', 1),
(84, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-20 04:05:25', '', 1),
(85, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-20 09:51:19', '20-02-2019 03:21:21 PM', 1),
(86, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-20 09:51:29', '', 0),
(87, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-20 09:51:40', '20-02-2019 03:21:43 PM', 1),
(88, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-20 09:51:57', '', 1),
(89, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-20 09:53:45', '20-02-2019 03:24:04 PM', 1),
(90, 0, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-22 09:58:48', '', 0),
(91, 10, 'hunter@123', 0x3a3a3100000000000000000000000000, '2019-02-22 09:58:56', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
