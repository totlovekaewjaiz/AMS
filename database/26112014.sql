-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2014 at 04:59 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ams_yoohui`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
`id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `CreatedBy` varchar(100) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `UpdatedBy` varchar(100) NOT NULL,
  `UpdatedDate` datetime NOT NULL,
  `Status` varchar(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `Username`, `Password`, `Firstname`, `Lastname`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`, `Status`) VALUES
(1, 'Administrator', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrator', 'RT', 'System', '2014-03-13 15:27:00', 'System', '2014-03-13 15:27:00', 'Y'),
(3, 'Estimate', 'd41d8cd98f00b204e9800998ecf8427e', 'Estimate', '01', 'Administrator', '2014-07-07 08:35:09', 'Administrator', '2014-07-07 14:43:27', 'Y'),
(4, 'Marketing', '81dc9bdb52d04dc20036dbd8313ed055', 'Marketing', '01', 'Administrator', '2014-07-07 08:43:13', 'Administrator', '2014-07-07 15:22:59', 'Y'),
(5, 'Accounting', '81dc9bdb52d04dc20036dbd8313ed055', 'Accounting', '01', 'Administrator', '2014-07-07 08:43:24', 'Administrator', '2014-07-07 14:04:07', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `account_status`
--

CREATE TABLE `account_status` (
`id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `StatusName` varchar(100) NOT NULL,
  `StatusValue` varchar(100) NOT NULL,
  `AdditionValue` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_status`
--

INSERT INTO `account_status` (`id`, `Username`, `StatusName`, `StatusValue`, `AdditionValue`) VALUES
(1, 'Administrator', 'AccountMenu', '1', ''),
(2, 'Administrator', 'AccountMenu', '2', ''),
(3, 'Administrator', 'AccountMenu', '3', ''),
(4, 'Administrator', 'AccountMenu', '4', ''),
(5, 'Administrator', 'AccountMenu', '5', ''),
(6, 'Administrator', 'AccountMenu', '6', ''),
(7, 'Administrator', 'AccountMenu', '7', ''),
(8, 'Administrator', 'AccountMenu', '8', ''),
(9, 'Administrator', 'AccountMenu', '9', ''),
(10, 'Administrator', 'AccountMenu', '10', ''),
(11, 'Administrator', 'AccountMenu', '11', ''),
(12, 'Administrator', 'AccountMenu', '12', ''),
(13, 'Administrator', 'AccountMenu', '13', ''),
(37, 'Accounting', 'AccountMenu', '13', ''),
(58, 'Marketing', 'AccountMenu', '12', ''),
(57, 'Marketing', 'AccountMenu', '5', ''),
(45, 'Estimate', 'AccountMenu', '9', ''),
(44, 'Estimate', 'AccountMenu', '7', ''),
(43, 'Estimate', 'AccountMenu', '6', ''),
(56, 'Marketing', 'AccountMenu', '4', ''),
(55, 'Marketing', 'AccountMenu', '3', ''),
(54, 'Marketing', 'AccountMenu', '2', ''),
(46, 'Estimate', 'AccountMenu', '10', ''),
(53, 'Marketing', 'AccountMenu', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
`id` int(11) NOT NULL,
  `ProjectID` int(11) DEFAULT NULL,
  `JobType` varchar(1) NOT NULL,
  `JobName` varchar(100) NOT NULL,
  `JobDescription` text NOT NULL,
  `CreatedBy` varchar(100) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `UpdatedBy` varchar(100) NOT NULL,
  `UpdatedDate` datetime NOT NULL,
  `Status` varchar(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `ProjectID`, `JobType`, `JobName`, `JobDescription`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`, `Status`) VALUES
(1, 1, '1', '', 'รื้อถอน พื้น  ฝ้า  ผนัง  ประตู  พร้อมขนย้าย', 'Administrator', '2014-03-11 15:12:52', 'Administrator', '2014-11-06 22:44:13', 'Y'),
(2, 1, '2', 'F-1', 'พื้น คสล  ปูพื้นไวนิล รหัส 906-5ของ WDT', 'Administrator', '2014-04-09 01:56:25', 'Administrator', '2014-07-07 09:38:21', 'Y'),
(10, 1, '2', 'F-2', 'พื้น คสล  ปูพรมขนาด 60 * 60  รหัส 909865', 'Administrator', '2014-04-09 05:22:02', 'Administrator', '2014-07-07 09:39:37', 'Y'),
(9, 1, '3', 'C-1', 'ฝ้าโครงเคร่าเหล็กชุบสังกะสีกรุยิปซั่มบอร์ดหนา 9 มม', 'Administrator', '2014-04-09 05:21:17', 'Administrator', '2014-07-07 09:38:14', 'Y'),
(8, 1, '3', 'Job003', '', 'Administrator', '2014-04-09 05:15:27', 'Administrator', '2014-04-09 05:19:37', 'N'),
(7, 1, '3', 'F-2', 'Drop ฝ้าเพดานสูง 10 ซม', 'Administrator', '2014-04-09 04:05:05', 'Administrator', '2014-07-07 09:38:09', 'Y'),
(11, 1, '4', 'C-1', 'ผนังกระจกใสหนา 8 มม พร้อมกรอบอลูมิเนียมสีธรรมชาติขนาด 2 * 4 ของ ALLOY', 'Administrator', '2014-07-07 09:30:01', 'Administrator', '2014-07-07 09:39:47', 'Y'),
(12, 1, '5', '', 'ทาสีผนังทั่วไป', 'Administrator', '2014-07-07 09:36:37', 'Administrator', '2014-07-07 09:36:37', 'Y'),
(13, 1, '5', '', 'ผนังกรุกระเบื้องขนาด 300x300 มม', 'Administrator', '2014-07-07 09:36:46', 'Administrator', '2014-07-07 09:36:46', 'Y'),
(14, 1, '1', 'F-2', '', 'Administrator', '2014-11-26 21:20:10', 'Administrator', '2014-11-26 21:20:10', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `job_status`
--

CREATE TABLE `job_status` (
`id` int(11) NOT NULL,
  `JobID` int(11) NOT NULL,
  `StatusName` varchar(100) NOT NULL,
  `StatusValue` varchar(100) NOT NULL,
  `AdditionValue` varchar(100) NOT NULL,
  `Width` varchar(100) NOT NULL,
  `Height` varchar(100) NOT NULL,
  `Long` varchar(100) NOT NULL,
  `LocationX` varchar(100) NOT NULL,
  `LocationY` varchar(100) NOT NULL,
  `Status` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_status`
--

INSERT INTO `job_status` (`id`, `JobID`, `StatusName`, `StatusValue`, `AdditionValue`, `Width`, `Height`, `Long`, `LocationX`, `LocationY`, `Status`) VALUES
(51, 7, 'MainArea', 'Material', '6', '200', '150', '', '', '', 'N'),
(52, 7, 'MainArea', 'Material', '6', '200', '150', '', '', '', 'N'),
(42, 2, 'MainArea', 'ObjectAmount', '', '', '', '', '', '', 'Y'),
(41, 2, 'MainArea', 'Area', '', '500', '', '500', '0', '0', 'Y'),
(40, 2, 'MainArea', 'MaterialAmount', '25', '', '', '', '', '', 'Y'),
(39, 2, 'MainArea', 'Material', '8', '', '', '', '', '', 'Y'),
(38, 1, 'MainArea', 'Object', '', '40', '', '40', '0', '0', 'N'),
(37, 1, 'MainArea', 'ObjectAmount', '1', '', '', '', '', '', 'N'),
(36, 1, 'MainArea', 'Area', '', '300', '', '100', '10', '10', 'N'),
(35, 1, 'MainArea', 'MaterialAmount', '92', '', '', '', '', '', 'N'),
(34, 1, 'MainArea', 'Material', '1', '', '', '', '', '', 'N'),
(33, 1, 'MainArea', 'Object', '', '40', '', '40', '0', '0', 'N'),
(32, 1, 'MainArea', 'ObjectAmount', '1', '', '', '', '', '', 'N'),
(31, 1, 'MainArea', 'Area', '', '300', '', '100', '10', '10', 'N'),
(30, 1, 'MainArea', 'MaterialAmount', '62', '', '', '', '', '', 'N'),
(29, 1, 'MainArea', 'Material', '3', '', '', '', '', '', 'N'),
(24, 1, 'MainArea', 'Material', '1', '', '', '', '', '', 'N'),
(25, 1, 'MainArea', 'MaterialAmount', '92', '', '', '', '', '', 'N'),
(26, 1, 'MainArea', 'Area', '', '300', '', '100', '10', '10', 'N'),
(27, 1, 'MainArea', 'ObjectAmount', '1', '', '', '', '', '', 'N'),
(28, 1, 'MainArea', 'Object', '', '40', '', '40', '0', '0', 'N'),
(45, 4, 'MainArea', 'Material', '6', '200', '150', '', '', '', 'Y'),
(46, 4, 'MainArea', 'Material', '6', '200', '150', '', '', '', 'Y'),
(47, 5, 'MainArea', 'Material', '7', '200', '150', '', '', '', 'Y'),
(48, 5, 'MainArea', 'Material', '6', '200', '150', '', '', '', 'Y'),
(49, 6, 'MainArea', 'Material', '6', '200', '150', '', '', '', 'Y'),
(50, 6, 'MainArea', 'Material', '6', '200', '150', '', '', '', 'Y'),
(53, 7, 'MainArea', 'Slot', '2', '200', '300', '', '', '', 'N'),
(54, 7, 'MainArea', 'Material', '6', '200', '150', '', '', '', 'N'),
(55, 7, 'MainArea', 'Material', '6', '200', '150', '', '', '', 'N'),
(56, 7, 'MainArea', 'Slot', '2', '200', '300', '', '', '', 'N'),
(57, 7, 'MainArea', 'Material', '7', '200', '150', '', '', '', 'N'),
(58, 7, 'MainArea', 'Material', '7', '200', '150', '', '', '', 'N'),
(59, 7, 'MainArea', 'Slot', '2', '200', '400', '', '', '', 'Y'),
(60, 7, 'MainArea', 'Material', '7', '200', '200', '', '', '', 'Y'),
(61, 7, 'MainArea', 'Material', '7', '200', '200', '', '', '', 'Y'),
(62, 8, 'MainArea', 'Material', '', '', '', '', '', '', 'N'),
(63, 8, 'MainArea', 'MaterialAmount', '', '', '', '', '', '', 'N'),
(64, 8, 'MainArea', 'Area', '', '', '', '', '', '', 'N'),
(65, 8, 'MainArea', 'ObjectAmount', '', '', '', '', '', '', 'N'),
(66, 8, 'MainArea', 'Material', '8', '', '', '', '', '', 'Y'),
(67, 8, 'MainArea', 'MaterialAmount', '5', '', '', '', '', '', 'Y'),
(68, 8, 'MainArea', 'Area', '', '500', '', '100', '0', '0', 'Y'),
(69, 8, 'MainArea', 'ObjectAmount', '', '', '', '', '', '', 'Y'),
(70, 9, 'MainArea', 'Material', '2', '', '', '', '', '', 'Y'),
(71, 9, 'MainArea', 'MaterialAmount', '60', '', '', '', '', '', 'Y'),
(72, 9, 'MainArea', 'Area', '', '500', '', '300', '0', '0', 'Y'),
(73, 9, 'MainArea', 'ObjectAmount', '', '', '', '', '', '', 'Y'),
(74, 10, 'MainArea', 'Material', '1', '', '', '', '', '', 'Y'),
(75, 10, 'MainArea', 'MaterialAmount', '90', '', '', '', '', '', 'Y'),
(76, 10, 'MainArea', 'Area', '', '100', '', '90', '0', '0', 'Y'),
(77, 10, 'MainArea', 'ObjectAmount', '', '', '', '', '', '', 'Y'),
(78, 1, 'MainArea', 'Material', '1', '', '', '', '', '', 'Y'),
(79, 1, 'MainArea', 'MaterialAmount', '284', '', '', '', '', '', 'Y'),
(80, 1, 'MainArea', 'Area', '', '300', '', '100', '10', '10', 'Y'),
(81, 1, 'MainArea', 'ObjectAmount', '1', '', '', '', '', '', 'Y'),
(82, 1, 'MainArea', 'Object', '', '40', '', '40', '0', '0', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
`id` int(11) NOT NULL,
  `MaterialCode` varchar(100) NOT NULL,
  `MaterialName` varchar(100) NOT NULL,
  `MaterialWidth` varchar(100) NOT NULL,
  `MaterialHeight` varchar(100) NOT NULL,
  `MaterialType` int(11) NOT NULL,
  `MaterialPrice` double NOT NULL,
  `CreatedBy` varchar(100) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `UpdatedBy` varchar(100) NOT NULL,
  `UpdatedDate` datetime NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `MaterialCode`, `MaterialName`, `MaterialWidth`, `MaterialHeight`, `MaterialType`, `MaterialPrice`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`, `Status`) VALUES
(1, '', 'Basic Tile', '10', '10', 0, 0, 'System', '2014-03-10 15:59:01', 'Administrator', '2014-04-28 11:13:51', 'N'),
(2, '', 'Large Tile', '50', '50', 0, 0, 'System', '2014-03-10 15:59:01', 'System', '2014-03-10 15:59:01', 'N'),
(3, '909865', 'พรมขนาด 60 * 60 ซม', '60', '60', 2, 0, 'System', '2014-03-10 15:59:23', 'Administrator', '2014-11-26 21:15:37', 'Y'),
(5, '906-5', 'พื้นไวนิลของ WDT', '10', '10', 0, 0, 'Administrator', '2014-03-13 10:22:33', 'Administrator', '2014-07-07 09:33:40', 'Y'),
(6, 'LA-1', 'Laminate', '1200', '2400', 0, 0, 'Administrator', '2014-03-31 11:20:29', 'Administrator', '2014-07-07 09:33:49', 'Y'),
(7, 'G-5', 'Glass', '1200', '2400', 0, 0, 'Administrator', '2014-03-31 11:22:17', 'Administrator', '2014-07-07 09:33:58', 'Y'),
(8, '1005', 'ฝ้ามาตรฐาน', '100', '100', 0, 0, 'Administrator', '2014-04-09 01:54:32', 'Administrator', '2014-07-07 05:32:49', 'N'),
(9, '1006', 'Demoe06', '100', '100', 0, 0, 'Administrator', '2014-07-07 05:32:58', 'Administrator', '2014-07-07 05:32:58', 'N'),
(12, '1111', '1111', '11', '11', 2, 111, 'Administrator', '2014-11-26 21:16:32', 'Administrator', '2014-11-26 21:16:37', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `material_type`
--

CREATE TABLE `material_type` (
`type_id` int(11) NOT NULL,
  `type_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material_type`
--

INSERT INTO `material_type` (`type_id`, `type_name`) VALUES
(1, 'กระเบื้อง'),
(2, 'wallpaper');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
`id` int(11) NOT NULL,
  `MenuName` varchar(100) NOT NULL,
  `MenuCode` varchar(100) NOT NULL,
  `Status` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `MenuName`, `MenuCode`, `Status`) VALUES
(1, 'โครงการ', 'Project', 'Y'),
(2, 'วัสดุที่ใช้', 'Material', 'Y'),
(3, 'วัสดุในโครงการ', 'MaterialProject', 'Y'),
(4, 'รายการค่าใช้จ่ายในโครงการ', 'MaterialPrice', 'Y'),
(5, 'งานในโครงการ', 'JobProject', 'Y'),
(6, 'งานรื้อถอน', 'RazeJob', 'Y'),
(7, 'งานพื้น', 'FloorJob', 'Y'),
(8, 'งานผนังโครงสร้าง', 'WallStructureJob', 'N'),
(9, 'งานผนังตกแต่ง', 'WallFinishingJob', 'Y'),
(10, 'งานฝ้าเพดาน', 'CeilJob', 'Y'),
(11, 'งานประตู', 'DoorJob', 'N'),
(12, 'แสดง BOQ', 'Report', 'Y'),
(13, 'ผู้ใช้งาน', 'UserAccount', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
`id` int(11) NOT NULL,
  `ProjectName` varchar(100) NOT NULL,
  `ProjectDescription` text NOT NULL,
  `Start` varchar(100) NOT NULL,
  `End` varchar(100) NOT NULL,
  `CreatedBy` varchar(100) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `UpdatedBy` varchar(100) NOT NULL,
  `UpdatedDate` datetime NOT NULL,
  `Status` varchar(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `ProjectName`, `ProjectDescription`, `Start`, `End`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`, `Status`) VALUES
(1, 'อาคารพญาไทยพลาซ่า', 'อาคารพญาไทยพลาซ่า', '03/04/2014', '03/27/2014', 'System', '2014-03-10 15:57:45', 'Administrator', '2014-03-10 15:57:45', 'Y'),
(2, 'DemoProject 2', 'Demo Description', '03/05/2014', '03/21/2014', 'Administrator', '2014-03-12 06:52:04', 'Administrator', '2014-03-12 06:52:04', 'N'),
(3, 'Demo Project3', 'Demo Project3', '07/01/2014', '07/30/2014', 'Administrator', '2014-07-07 04:44:02', 'Administrator', '2014-07-07 04:44:02', 'N'),
(5, '', '', '', '', 'Administrator', '2014-07-07 06:12:48', 'Administrator', '2014-07-07 06:12:48', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `project_job_material`
--

CREATE TABLE `project_job_material` (
`id` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `MaterialID` int(11) NOT NULL,
  `MaterialAmount` varchar(100) NOT NULL,
  `EstimateAmount` varchar(100) NOT NULL,
  `PricePerUnit` varchar(100) NOT NULL,
  `MaterialPrice` varchar(100) NOT NULL,
  `EstimateMaterialPrice` varchar(100) NOT NULL,
  `CreatedBy` varchar(100) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `UpdatedBy` varchar(100) NOT NULL,
  `UpdatedDate` datetime NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_material`
--

CREATE TABLE `project_material` (
`id` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `MaterialID` int(11) NOT NULL,
  `CreatedBy` varchar(100) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `UpdatedBy` varchar(100) NOT NULL,
  `UpdatedDate` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_material`
--

INSERT INTO `project_material` (`id`, `ProjectID`, `MaterialID`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`) VALUES
(34, 1, 5, 'Administrator', '2014-07-07 09:34:10', 'Administrator', '2014-07-07 09:34:10'),
(9, 2, 5, 'Administrator', '2014-03-13 10:24:30', 'Administrator', '2014-03-13 10:24:30'),
(11, 2, 6, 'Administrator', '2014-03-31 11:20:29', 'Administrator', '2014-03-31 11:20:29'),
(13, 2, 7, 'Administrator', '2014-03-31 11:22:17', 'Administrator', '2014-03-31 11:22:17'),
(33, 1, 3, 'Administrator', '2014-07-07 09:34:10', 'Administrator', '2014-07-07 09:34:10'),
(16, 2, 8, 'Administrator', '2014-04-09 01:54:32', 'Administrator', '2014-04-09 01:54:32'),
(18, 2, 1, 'Administrator', '2014-04-28 11:13:51', 'Administrator', '2014-04-28 11:13:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `account_status`
--
ALTER TABLE `account_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_status`
--
ALTER TABLE `job_status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_type`
--
ALTER TABLE `material_type`
 ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_job_material`
--
ALTER TABLE `project_job_material`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_material`
--
ALTER TABLE `project_material`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `account_status`
--
ALTER TABLE `account_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `job_status`
--
ALTER TABLE `job_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `material_type`
--
ALTER TABLE `material_type`
MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `project_job_material`
--
ALTER TABLE `project_job_material`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_material`
--
ALTER TABLE `project_material`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
