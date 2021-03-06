-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2015 at 05:32 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `ProjectID`, `JobType`, `JobName`, `JobDescription`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`, `Status`) VALUES
(1, 1, '1', '', 'รื้อถอน พื้น  ฝ้า  ผนัง  ประตู  พร้อมขนย้าย', 'Administrator', '2014-03-11 15:12:52', 'Administrator', '2014-12-21 23:56:39', 'Y'),
(2, 1, '2', 'F-1', 'พื้น คสล  ปูพรมขนาด 60 * 60  รหัส 909865', 'Administrator', '2014-04-09 01:56:25', 'Administrator', '2014-12-23 01:33:44', 'Y'),
(10, 1, '2', 'F-2', 'พื้น คสล  ปูพรมขนาด 60 * 60  รหัส 909865', 'Administrator', '2014-04-09 05:22:02', 'Administrator', '2014-07-07 09:39:37', 'Y'),
(9, 1, '3', 'C-1', 'ฝ้าโครงเคร่าเหล็กชุบสังกะสีกรุยิปซั่มบอร์ดหนา 9 มม', 'Administrator', '2014-04-09 05:21:17', 'Administrator', '2014-07-07 09:38:14', 'Y'),
(8, 1, '3', 'Job003', '', 'Administrator', '2014-04-09 05:15:27', 'Administrator', '2014-04-09 05:19:37', 'N'),
(7, 1, '3', 'F-2', 'Drop ฝ้าเพดานสูง 10 ซม', 'Administrator', '2014-04-09 04:05:05', 'Administrator', '2014-07-07 09:38:09', 'Y'),
(11, 1, '4', 'C-1', 'ผนังกระจกใสหนา 8 มม พร้อมกรอบอลูมิเนียมสีธรรมชาติขนาด 2 * 4 ของ ALLOY', 'Administrator', '2014-07-07 09:30:01', 'Administrator', '2014-07-07 09:39:47', 'Y'),
(12, 1, '5', '', 'ทาสีผนังทั่วไป', 'Administrator', '2014-07-07 09:36:37', 'Administrator', '2014-07-07 09:36:37', 'Y'),
(13, 1, '5', '', 'ผนังกรุกระเบื้องขนาด 300x300 มม', 'Administrator', '2014-07-07 09:36:46', 'Administrator', '2014-07-07 09:36:46', 'Y'),
(14, 1, '1', 'F-2', '', 'Administrator', '2014-11-26 21:20:10', 'Administrator', '2014-11-26 21:20:10', 'Y'),
(15, 1, '1', 'F-2', '', 'Administrator', '2014-11-27 22:54:28', 'Administrator', '2014-11-27 22:54:28', 'Y'),
(16, 1, '1', 'F-2', '', 'Administrator', '2014-12-15 13:00:26', 'Administrator', '2014-12-15 13:00:26', 'Y'),
(17, 1, '', '', '', 'Administrator', '2015-01-06 01:22:44', 'Administrator', '2015-01-06 01:22:44', 'Y'),
(18, 4, '2', 'a-01', 'test', 'Administrator', '2015-01-12 23:01:26', 'Administrator', '2015-01-12 23:01:26', 'N');

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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `MaterialCode`, `MaterialName`, `MaterialWidth`, `MaterialHeight`, `MaterialType`, `MaterialPrice`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`, `Status`) VALUES
(1, '', 'Basic Tile', '10', '10', 0, 0, 'System', '2014-03-10 15:59:01', 'Administrator', '2014-04-28 11:13:51', 'N'),
(2, '', 'Large Tile', '50', '50', 0, 0, 'System', '2014-03-10 15:59:01', 'System', '2014-03-10 15:59:01', 'N'),
(3, '909865', 'พรมขนาด 60 * 60 ซม', '60', '60', 3, 20, 'System', '2014-03-10 15:59:23', 'Administrator', '2014-12-21 21:31:23', 'Y'),
(5, '906-5', 'พื้นไวนิลของ WDT', '10', '10', 0, 10, 'Administrator', '2014-03-13 10:22:33', 'Administrator', '2014-07-07 09:33:40', 'Y'),
(6, 'LA-1', 'Laminate', '1200', '2400', 0, 0, 'Administrator', '2014-03-31 11:20:29', 'Administrator', '2014-07-07 09:33:49', 'Y'),
(7, 'G-5', 'Glass', '1200', '2400', 0, 0, 'Administrator', '2014-03-31 11:22:17', 'Administrator', '2014-07-07 09:33:58', 'Y'),
(8, '1005', 'ฝ้ามาตรฐาน', '100', '100', 0, 5, 'Administrator', '2014-04-09 01:54:32', 'Administrator', '2014-07-07 05:32:49', 'N'),
(9, '1006', 'Demoe06', '100', '100', 0, 0, 'Administrator', '2014-07-07 05:32:58', 'Administrator', '2014-07-07 05:32:58', 'N'),
(12, '1111', '1111', '11', '11', 2, 111, 'Administrator', '2014-11-26 21:16:32', 'Administrator', '2014-11-26 21:16:37', 'Y'),
(13, '', 'ไม้โครงทุเรียนจ๊อยส์ 1"x2"x2.50ม.', '', '', 0, 27.5, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 'Y'),
(14, '', 'ไม้โครงทุเรียนจ๊อยส์ 1"x2"x3.00ม.', '', '', 0, 37, '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 'Y'),
(15, '', 'ไม้โครงสักจ้อยส์ 1"x2"x2.50ม.', '', '', 4, 48, 'Administrator', '2015-01-12 23:25:48', 'Administrator', '2015-01-12 23:25:48', 'Y'),
(16, '', 'ไม้โครงสักจ้อยส์ 1"x2"x3.00ม.', '', '', 4, 58, 'Administrator', '2015-01-12 23:26:37', 'Administrator', '2015-01-12 23:26:37', 'Y'),
(17, '', 'ไม้อัดยาง 4 มม. เกรดA', '', '', 4, 230, 'Administrator', '2015-01-12 23:26:51', 'Administrator', '2015-01-12 23:26:51', 'Y'),
(18, '', 'ไม้อัดยาง 6 มม.เกรดA', '', '', 4, 250, 'Administrator', '2015-01-12 23:27:04', 'Administrator', '2015-01-12 23:27:04', 'Y'),
(19, '', 'ไม้อัดยาง 10 มม.เกรดA', '', '', 4, 430, 'Administrator', '2015-01-12 23:27:18', 'Administrator', '2015-01-12 23:27:18', 'Y'),
(20, '', 'ไม้อัดยาง 15 มม. เกรดA', '', '', 4, 630, 'Administrator', '2015-01-12 23:27:30', 'Administrator', '2015-01-12 23:27:30', 'Y'),
(21, '', 'ไม้อัดยาง 20 มม.เกรดA', '', '', 4, 850, 'Administrator', '2015-01-12 23:27:46', 'Administrator', '2015-01-12 23:27:46', 'Y'),
(22, '', 'ไม้อัดยาง 4 มม. มอก.', '', '', 4, 395, 'Administrator', '2015-01-12 23:27:58', 'Administrator', '2015-01-12 23:27:58', 'Y'),
(23, '', 'ไม้อัดยาง 6 มม. มอก.', '', '', 4, 585, 'Administrator', '2015-01-12 23:28:08', 'Administrator', '2015-01-12 23:28:08', 'Y'),
(24, '', 'ไม้อัดยาง 10 มม. มอก.', '', '', 4, 915, 'Administrator', '2015-01-12 23:28:21', 'Administrator', '2015-01-12 23:28:21', 'Y'),
(25, '', 'ไม้อัดยาง 15 มม. มอก.', '', '', 4, 1290, 'Administrator', '2015-01-12 23:28:33', 'Administrator', '2015-01-12 23:28:33', 'Y'),
(26, '', 'ไม้อัดยาง 20 มม. มอก.', '', '', 4, 1730, 'Administrator', '2015-01-12 23:28:57', 'Administrator', '2015-01-12 23:28:57', 'Y'),
(27, '', 'MDF 4 มม. 4''x8'' E-1', '', '', 4, 155, 'Administrator', '2015-01-12 23:30:06', 'Administrator', '2015-01-12 23:30:06', 'Y'),
(28, '', 'MDF 6 มม. 4''x8'' E-1', '', '', 4, 185, 'Administrator', '2015-01-12 23:30:17', 'Administrator', '2015-01-12 23:30:17', 'Y'),
(29, '', 'MDF 9 มม. 4''x8'' E-1', '', '', 4, 255, 'Administrator', '2015-01-12 23:30:27', 'Administrator', '2015-01-12 23:30:27', 'Y'),
(30, '', 'MDF 12 มม. 4''x8'' E-1', '', '', 4, 350, 'Administrator', '2015-01-12 23:30:40', 'Administrator', '2015-01-12 23:30:40', 'Y'),
(31, '', 'MDF 16 มม. 4''x8'' E-1', '', '', 4, 455, 'Administrator', '2015-01-12 23:30:53', 'Administrator', '2015-01-12 23:30:53', 'Y'),
(32, '', 'MDF 19 มม. 4''x8'' E-1', '', '', 4, 530, 'Administrator', '2015-01-12 23:31:08', 'Administrator', '2015-01-12 23:31:08', 'Y'),
(33, '', 'MDF9mm.เคลือบดำผิวส้ม1ด้าน', '', '', 4, 510, 'Administrator', '2015-01-12 23:31:23', 'Administrator', '2015-01-12 23:31:23', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `material_type`
--

CREATE TABLE `material_type` (
`type_id` int(11) NOT NULL,
  `type_name` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material_type`
--

INSERT INTO `material_type` (`type_id`, `type_name`) VALUES
(1, 'กระเบื้อง'),
(2, 'wallpaper'),
(3, 'ปูพื้น\r\n'),
(4, 'ไม้\r\n');

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
(6, 'งานรื้อถอน', 'RazeJob', 'N'),
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
  `Status` char(1) NOT NULL,
  `wageDesc` text NOT NULL,
  `wagePrice` double NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `ProjectName`, `ProjectDescription`, `Start`, `End`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`, `Status`, `wageDesc`, `wagePrice`) VALUES
(1, 'อาคารพญาไทพลาซ่า', '', '12/01/2014', '14/01/2015', 'System', '2014-03-10 15:57:45', 'Administrator', '2014-03-10 15:57:45', 'Y', 'TEST', 20000),
(3, 'Demo Project3', 'Demo Project3', '07/01/2014', '07/30/2014', 'Administrator', '2014-07-07 04:44:02', 'Administrator', '2014-07-07 04:44:02', 'N', '', 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_material`
--

INSERT INTO `project_material` (`id`, `ProjectID`, `MaterialID`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`) VALUES
(47, 4, 5, 'Administrator', '2015-01-12 23:00:42', 'Administrator', '2015-01-12 23:00:42'),
(9, 2, 5, 'Administrator', '2014-03-13 10:24:30', 'Administrator', '2014-03-13 10:24:30'),
(11, 2, 6, 'Administrator', '2014-03-31 11:20:29', 'Administrator', '2014-03-31 11:20:29'),
(13, 2, 7, 'Administrator', '2014-03-31 11:22:17', 'Administrator', '2014-03-31 11:22:17'),
(46, 1, 5, 'Administrator', '2014-11-27 20:14:01', 'Administrator', '2014-11-27 20:14:01'),
(16, 2, 8, 'Administrator', '2014-04-09 01:54:32', 'Administrator', '2014-04-09 01:54:32'),
(18, 2, 1, 'Administrator', '2014-04-28 11:13:51', 'Administrator', '2014-04-28 11:13:51'),
(45, 1, 3, 'Administrator', '2014-11-27 20:14:01', 'Administrator', '2014-11-27 20:14:01'),
(48, 4, 6, 'Administrator', '2015-01-12 23:00:42', 'Administrator', '2015-01-12 23:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
`id` int(11) NOT NULL,
  `JobName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `work_ceil`
--

CREATE TABLE `work_ceil` (
`CeilID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `JobID` int(11) NOT NULL,
  `JobName` varchar(300) NOT NULL,
  `widthEstimate` int(11) NOT NULL,
  `longEstimate` int(11) NOT NULL,
  `StartPointX` int(11) NOT NULL,
  `StartPointY` int(11) NOT NULL,
  `MaterialID` int(11) NOT NULL,
  `ObjectWall` text NOT NULL,
  `ReservePercent` double NOT NULL,
  `ReserveValue` double NOT NULL,
  `CreatedBy` varchar(100) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `UpdatedBy` varchar(100) NOT NULL,
  `UpdatedDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_ceil`
--

INSERT INTO `work_ceil` (`CeilID`, `ProjectID`, `JobID`, `JobName`, `widthEstimate`, `longEstimate`, `StartPointX`, `StartPointY`, `MaterialID`, `ObjectWall`, `ReservePercent`, `ReserveValue`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`) VALUES
(1, 1, 9, 'C-1', 200, 300, 0, 0, 5, 'test2345', 4, 601.123, 'Administrator', '2014-12-24 02:15:13', 'Administrator', '2014-12-24 02:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `work_floor`
--

CREATE TABLE `work_floor` (
`FloorID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `JobID` int(11) NOT NULL,
  `JobName` varchar(300) NOT NULL,
  `widthEstimate` int(11) NOT NULL,
  `longEstimate` int(11) NOT NULL,
  `StartPointX` int(11) NOT NULL,
  `StartPointY` int(11) NOT NULL,
  `MaterialID` int(11) NOT NULL,
  `ObjectWall` text NOT NULL,
  `ReservePercent` double NOT NULL,
  `ReserveValue` double NOT NULL,
  `CreatedBy` varchar(100) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `UpdatedBy` varchar(100) NOT NULL,
  `UpdatedDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_floor`
--

INSERT INTO `work_floor` (`FloorID`, `ProjectID`, `JobID`, `JobName`, `widthEstimate`, `longEstimate`, `StartPointX`, `StartPointY`, `MaterialID`, `ObjectWall`, `ReservePercent`, `ReserveValue`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`) VALUES
(1, 1, 2, 'F-1', 109, 100, 1, 2, 3, 'test', 10, 15, 'Administrator', '2014-12-23 23:55:53', 'Administrator', '2014-12-24 00:58:48'),
(3, 4, 18, 'a-01', 100, 100, 0, 0, 3, '', 0, 4, 'Administrator', '2015-01-12 23:01:49', 'Administrator', '2015-01-12 23:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `work_wall`
--

CREATE TABLE `work_wall` (
`WallID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `JobID` int(11) NOT NULL,
  `JobName` varchar(300) NOT NULL,
  `MaterialID` int(11) NOT NULL,
  `Height` double NOT NULL,
  `Width` double NOT NULL,
  `Slot` int(11) NOT NULL,
  `CreatedBy` varchar(300) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `UpdatedBy` varchar(300) NOT NULL,
  `UpdatedDate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `work_wall`
--

INSERT INTO `work_wall` (`WallID`, `ProjectID`, `JobID`, `JobName`, `MaterialID`, `Height`, `Width`, `Slot`, `CreatedBy`, `CreatedDate`, `UpdatedBy`, `UpdatedDate`) VALUES
(1, 1, 13, '', 8, 10, 20, 2, 'Administrator', '2014-12-24 02:53:44', 'Administrator', '2014-12-24 03:04:35');

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
-- Indexes for table `test`
--
ALTER TABLE `test`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_ceil`
--
ALTER TABLE `work_ceil`
 ADD PRIMARY KEY (`CeilID`);

--
-- Indexes for table `work_floor`
--
ALTER TABLE `work_floor`
 ADD PRIMARY KEY (`FloorID`);

--
-- Indexes for table `work_wall`
--
ALTER TABLE `work_wall`
 ADD PRIMARY KEY (`WallID`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `job_status`
--
ALTER TABLE `job_status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `material_type`
--
ALTER TABLE `material_type`
MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project_job_material`
--
ALTER TABLE `project_job_material`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project_material`
--
ALTER TABLE `project_material`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_ceil`
--
ALTER TABLE `work_ceil`
MODIFY `CeilID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `work_floor`
--
ALTER TABLE `work_floor`
MODIFY `FloorID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `work_wall`
--
ALTER TABLE `work_wall`
MODIFY `WallID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
