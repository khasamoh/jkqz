-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 27, 2023 at 09:10 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jkqz2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compertition`
--

DROP TABLE IF EXISTS `tbl_compertition`;
CREATE TABLE IF NOT EXISTS `tbl_compertition` (
  `compertition_id` int(11) NOT NULL AUTO_INCREMENT,
  `compertition_name` varchar(50) DEFAULT NULL,
  `compertition_date` varchar(30) DEFAULT NULL,
  `compertition_address` varchar(50) DEFAULT NULL,
  `compertition_added_by` int(11) DEFAULT NULL,
  `compertition_added_date` varchar(30) DEFAULT NULL,
  `compertition_modify_by` int(11) DEFAULT NULL,
  `compertition_modify_date` varchar(30) DEFAULT NULL,
  `compertition_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`compertition_id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_compertition`
--

INSERT INTO `tbl_compertition` (`compertition_id`, `compertition_name`, `compertition_date`, `compertition_address`, `compertition_added_by`, `compertition_added_date`, `compertition_modify_by`, `compertition_modify_date`, `compertition_status`) VALUES
(1, 'JKQZ ONE', 'Sunday 20 March 2022', 'Mzizini', 1, '1646461832', NULL, NULL, 'active'),
(59, 'test1', 'Friday 21 April 2023', 'address1', 1, '1682068047', NULL, NULL, 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_envelope`
--

DROP TABLE IF EXISTS `tbl_envelope`;
CREATE TABLE IF NOT EXISTS `tbl_envelope` (
  `envelope_id` int(11) NOT NULL AUTO_INCREMENT,
  `envelope_juzuu` int(11) DEFAULT NULL,
  `envelope_number` int(11) DEFAULT NULL,
  `envelope_type` varchar(20) DEFAULT NULL,
  `envelope_added_by` varchar(30) DEFAULT NULL,
  `envelope_added_date` varchar(20) DEFAULT NULL,
  `envelope_modified_by` varchar(30) DEFAULT NULL,
  `envelope_modified_date` varchar(20) DEFAULT NULL,
  `envelope_deleted_by` varchar(30) DEFAULT NULL,
  `envelope_deleted_date` varchar(20) DEFAULT NULL,
  `compertition_id` int(11) DEFAULT NULL,
  `envelope_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`envelope_id`),
  UNIQUE KEY `envelope_added_date` (`envelope_added_date`),
  UNIQUE KEY `envelope_modified_date` (`envelope_modified_date`),
  UNIQUE KEY `envelope_deleted_date` (`envelope_deleted_date`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_envelope`
--

INSERT INTO `tbl_envelope` (`envelope_id`, `envelope_juzuu`, `envelope_number`, `envelope_type`, `envelope_added_by`, `envelope_added_date`, `envelope_modified_by`, `envelope_modified_date`, `envelope_deleted_by`, `envelope_deleted_date`, `compertition_id`, `envelope_status`) VALUES
(1, 30, 1, 'hifdhi', '1', '1681551443', NULL, NULL, NULL, NULL, 1, 'waiting'),
(2, 30, 2, 'hifdhi', '1', '1681558258', NULL, NULL, NULL, NULL, 1, 'ready'),
(3, 30, 3, 'hifdhi', '1', '1681558288', NULL, NULL, NULL, NULL, 1, 'ready'),
(4, 30, 4, 'hifdhi', '1', '1681558322', NULL, NULL, NULL, NULL, 1, 'waiting'),
(5, 30, 5, 'hifdhi', '1', '1681558352', NULL, NULL, NULL, NULL, 1, 'waiting'),
(6, 30, 6, 'hifdhi', '1', '1681558397', NULL, NULL, NULL, NULL, 1, 'waiting'),
(7, 30, 1, 'tashjii', '1', '1681558495', NULL, NULL, NULL, NULL, 1, 'waiting'),
(8, 30, 2, 'tashjii', '1', '1681558813', NULL, NULL, NULL, NULL, 1, 'waiting'),
(9, 30, 3, 'tashjii', '1', '1681560610', NULL, NULL, NULL, NULL, 1, 'waiting'),
(10, 30, 4, 'tashjii', '1', '1681561033', NULL, NULL, NULL, NULL, 1, 'waiting'),
(11, 30, 5, 'tashjii', '1', '1681561192', NULL, NULL, NULL, NULL, 1, 'waiting'),
(12, 30, 6, 'tashjii', '1', '1681566048', NULL, NULL, NULL, NULL, 1, 'waiting');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

DROP TABLE IF EXISTS `tbl_log`;
CREATE TABLE IF NOT EXISTS `tbl_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) DEFAULT NULL,
  `logout` varchar(30) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `fk3` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`log_id`, `login`, `logout`, `user_id`) VALUES
(1, '1681499841', '1681499964', 1),
(2, '1681499973', '1681501044', 1),
(3, '1681547786', '1681548953', 1),
(4, '1681548957', '1681552276', 1),
(5, '1681558208', '1681558212', 2),
(6, '1681558220', '1681559303', 1),
(7, '1681559438', '1681562160', 1),
(8, '1681565649', '1681565811', 1),
(9, '1681565837', '1681565982', 1),
(10, '1681565987', '1681589417', 1),
(11, '1681566407', '1681590322', 2),
(12, '1681566487', '1681581417', 4),
(13, '1681621981', '1681626774', 1),
(14, '1681622024', '1681629194', 3),
(15, '1681629222', '1681629427', 2),
(16, '1681629432', '1681631595', 3),
(17, '1681631608', '1681631857', 2),
(18, '1681631866', '1681632143', 3),
(19, '1681673279', '1681675419', 1),
(20, '1681674110', '1681674244', 3),
(21, '1681674251', '1681674264', 2),
(22, '1681674380', '1681675383', 5),
(23, '1681675391', '1681675678', 2),
(24, '1681675452', '1681675509', 5),
(25, '1681675515', '1681678936', 1),
(26, '1681675714', '1681675758', 6),
(27, '1681675765', '1681675774', 5),
(28, '1681675903', '1681675950', 7),
(29, '1681676016', '1681680591', 7),
(30, '1681678804', '1681680019', 2),
(31, '1681678945', '1681680595', 5),
(32, '1681680028', '1681680123', 4),
(33, '1681680130', '1681680165', 2),
(34, '1681680183', '1681680192', 4),
(35, '1681680200', '1681680216', 3),
(36, '1681680224', '1681680592', 2),
(37, '1681724803', '1681734517', 1),
(38, '1681724825', '1681734534', 7),
(39, '1681724839', '1681725235', 2),
(40, '1681725243', '1681725636', 4),
(41, '1681725643', '1681731001', 2),
(42, '1681731256', '1681731516', 2),
(43, '1681731522', '1681732399', 3),
(44, '1681732405', '1681732495', 2),
(45, '1681732502', '1681732626', 5),
(46, '1681732632', '1681732765', 6),
(47, '1681732780', '1681734351', 5),
(48, '1681734358', '1681734380', 2),
(49, '1681748069', '1681749403', 2),
(50, '1681748631', '1681759609', 1),
(51, '1681748805', '1681748831', 3),
(52, '1681748840', '1681750055', 3),
(53, '1681749410', '1681755141', 2),
(54, '1681750820', '1681750891', 7),
(55, '1681751009', '1681759592', 7),
(56, '1681755148', '1681755213', 2),
(57, '1681755223', '1681758612', 5),
(58, '1681758627', '1681759306', 4),
(59, '1681759318', '1681759453', 3),
(60, '1681794870', '1681796523', 1),
(61, '1681796329', '1681796833', 7),
(62, '1681796657', '1681796833', 1),
(63, '1681801289', '1681808917', 1),
(64, '1681801437', '1681801454', 2),
(65, '1681801460', '1681801467', 3),
(66, '1681801474', '1681801477', 5),
(67, '1681801485', '1681801489', 6),
(68, '1681801778', '1681820769', 10),
(69, '1681801928', '1681819930', 8),
(70, '1681808921', '1681820761', 1),
(71, '1681888626', '1681896538', 1),
(72, '1681896489', '1681907305', 2),
(73, '1681896547', '1681907299', 1),
(74, '1681898915', '1681900705', 5),
(75, '1681900747', '1681900858', 6),
(76, '1681910144', '1682068729', 1),
(77, '1682083063', '1682085090', 1),
(78, '1682083788', '1682084469', 2),
(79, '1682084526', NULL, 2),
(80, '1682084552', '1682085069', 2),
(81, '1682184649', '1682187036', 1),
(82, '1682187044', '1682187281', 1),
(83, '1682187293', '1682188172', 1),
(84, '1682231623', '1682237683', 1),
(85, '1682235679', '1682237034', 2),
(86, '1682237044', '1682237077', 3),
(87, '1682237090', '1682237103', 5),
(88, '1682237112', '1682237128', 6),
(89, '1682237135', '1682237144', 8),
(90, '1682237160', '1682237165', 8),
(91, '1682237172', '1682237188', 9),
(92, '1682239633', '1682416060', 1),
(93, '1682372243', '1682372257', 2),
(94, '1682372265', '1682372274', 3),
(95, '1682372281', '1682372290', 13),
(96, '1682372301', '1682372318', 5),
(97, '1682372328', '1682372338', 6),
(98, '1682372348', '1682372357', 8),
(99, '1682372368', '1682416082', 9),
(100, '1682418887', '1682424292', 1),
(101, '1682419375', '1682419762', 11),
(102, '1682419388', '1682419752', 12),
(103, '1682421865', '1682421907', 2),
(104, '1682421874', '1682421888', 3),
(105, '1682421966', '1682421984', 5),
(106, '1682421977', '1682421982', 6),
(107, '1682421990', '1682422007', 8),
(108, '1682422000', '1682422029', 9),
(109, '1682427646', '1682503564', 1),
(110, '1682498748', '1682498833', 2),
(111, '1682498765', '1682498838', 3),
(112, '1682498844', '1682498877', 5),
(113, '1682498860', '1682498866', 6),
(114, '1682498872', '1682500099', 8),
(115, '1682498887', '1682500104', 9),
(116, '1682500111', '1682500130', 2),
(117, '1682500119', '1682500135', 3),
(118, '1682500141', '1682500451', 5),
(119, '1682500345', '1682500434', 6),
(120, '1682500445', '1682500476', 2),
(121, '1682500458', '1682500471', 3),
(122, '1682500483', '1682503574', 8),
(123, '1682500539', '1682503568', 9),
(124, '1682539439', '1682539582', 7),
(125, '1682539594', '1682542108', 1),
(126, '1682580986', '1682586655', 1),
(127, '1682581050', '1682581196', 2),
(128, '1682582919', '1682582928', 2),
(129, '1682582963', '1682583802', 11),
(130, '1682583147', '1682585042', 2),
(131, '1682583808', '1682583818', 5),
(132, '1682583831', '1682585034', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participant`
--

DROP TABLE IF EXISTS `tbl_participant`;
CREATE TABLE IF NOT EXISTS `tbl_participant` (
  `participant_id` int(11) NOT NULL AUTO_INCREMENT,
  `participant_fname` varchar(30) DEFAULT NULL,
  `participant_mname` varchar(30) DEFAULT NULL,
  `participant_lname` varchar(30) DEFAULT NULL,
  `participant_gender` varchar(30) DEFAULT NULL,
  `participant_dob` varchar(30) DEFAULT NULL,
  `participant_image` varchar(255) DEFAULT NULL,
  `participant_address` varchar(30) DEFAULT NULL,
  `participant_juzuu` int(11) DEFAULT NULL,
  `participant_type` varchar(10) DEFAULT NULL,
  `participant_school` varchar(30) DEFAULT NULL,
  `participant_education_level` varchar(30) DEFAULT NULL,
  `participant_madrasa` varchar(30) DEFAULT NULL,
  `participant_country` varchar(30) DEFAULT NULL,
  `participant_added_by` varchar(30) DEFAULT NULL,
  `participant_added_date` varchar(20) DEFAULT NULL,
  `participant_modified_by` varchar(30) DEFAULT NULL,
  `participant_modified_date` varchar(20) DEFAULT NULL,
  `participant_deleted_by` varchar(30) DEFAULT NULL,
  `participant_deleted_date` varchar(20) DEFAULT NULL,
  `participant_status` varchar(30) DEFAULT NULL,
  `compertition_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`participant_id`),
  UNIQUE KEY `participant_added_date` (`participant_added_date`),
  UNIQUE KEY `participant_modified_date` (`participant_modified_date`),
  UNIQUE KEY `participant_deleted_date` (`participant_deleted_date`),
  KEY `fk5` (`compertition_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_participant`
--

INSERT INTO `tbl_participant` (`participant_id`, `participant_fname`, `participant_mname`, `participant_lname`, `participant_gender`, `participant_dob`, `participant_image`, `participant_address`, `participant_juzuu`, `participant_type`, `participant_school`, `participant_education_level`, `participant_madrasa`, `participant_country`, `participant_added_by`, `participant_added_date`, `participant_modified_by`, `participant_modified_date`, `participant_deleted_by`, `participant_deleted_date`, `participant_status`, `compertition_id`) VALUES
(1, 'ALI', ' JUMA', 'HAMAD', 'male', 'Wednesday 13 January 2010', NULL, NULL, 30, 'hifdhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ready', 1),
(2, 'omar', 'hajji', 'mussa', 'male', 'Monday 25 April 2016', '', '', 30, 'tashjii', '', '', '', 'Tanzania', '1', '1682418891', NULL, NULL, NULL, NULL, 'waiting', 1),
(3, 'hamdan', 'ali', 'ahmad', 'male', 'Tuesday 25 April 2017', '', '', 30, 'hifdhi', '', '', '', 'Tanzania', '1', '1682419569', NULL, NULL, NULL, NULL, 'ready', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participant_envelope`
--

DROP TABLE IF EXISTS `tbl_participant_envelope`;
CREATE TABLE IF NOT EXISTS `tbl_participant_envelope` (
  `participant_envelope_id` int(11) NOT NULL AUTO_INCREMENT,
  `participant_id` int(11) DEFAULT NULL,
  `envelope_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`participant_envelope_id`),
  KEY `fk7` (`participant_id`),
  KEY `fk8` (`envelope_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_participant_envelope`
--

INSERT INTO `tbl_participant_envelope` (`participant_envelope_id`, `participant_id`, `envelope_id`) VALUES
(16, 3, 2),
(15, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privellege`
--

DROP TABLE IF EXISTS `tbl_privellege`;
CREATE TABLE IF NOT EXISTS `tbl_privellege` (
  `privellege_id` int(11) NOT NULL AUTO_INCREMENT,
  `privellege_name` varchar(30) DEFAULT NULL,
  `privellege_option` varchar(30) DEFAULT NULL,
  `privellege_added_date` varchar(30) DEFAULT NULL,
  `privellege_added_by` int(11) DEFAULT NULL,
  `privellege_modified_date` varchar(30) DEFAULT NULL,
  `privellege_modified_by` int(11) DEFAULT NULL,
  `privellege_deleted_date` varchar(30) DEFAULT NULL,
  `privellege_deleted_by` int(11) DEFAULT NULL,
  `privellege_status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`privellege_id`),
  UNIQUE KEY `privellege_name` (`privellege_name`),
  UNIQUE KEY `privellege_option` (`privellege_option`),
  UNIQUE KEY `privellege_added_date` (`privellege_added_date`),
  UNIQUE KEY `privellege_modified_date` (`privellege_modified_date`),
  UNIQUE KEY `privellege_deleted_date` (`privellege_deleted_date`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_privellege`
--

INSERT INTO `tbl_privellege` (`privellege_id`, `privellege_name`, `privellege_option`, `privellege_added_date`, `privellege_added_by`, `privellege_modified_date`, `privellege_modified_by`, `privellege_deleted_date`, `privellege_deleted_by`, `privellege_status`) VALUES
(1, 'Administrator', 'admin', '1621442513', 1, NULL, NULL, NULL, NULL, 'active'),
(2, 'Envelope', 'envelope', '1621442514', 1, NULL, NULL, NULL, NULL, 'active'),
(3, 'Jaji Kiongozi', 'jaji kiongozi', '1621442515', 1, NULL, NULL, NULL, NULL, 'active'),
(4, 'Audience', 'audience', '1621442537', 1, NULL, NULL, NULL, NULL, 'active'),
(5, 'Jaji Hifdhi', 'jaji hifdhi', '1621508183', 2, NULL, NULL, NULL, NULL, 'active'),
(6, 'Jaji Tashjii', 'jaji tashjii', '1621508202', 2, NULL, NULL, NULL, NULL, 'active'),
(7, 'Jaji Tajwid', 'jaji tajwid', '1621508223', 2, NULL, NULL, NULL, NULL, 'active'),
(8, 'Jaji Makharij', 'jaji makharij', '1621508249', 2, NULL, NULL, NULL, NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

DROP TABLE IF EXISTS `tbl_question`;
CREATE TABLE IF NOT EXISTS `tbl_question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_path` varchar(300) DEFAULT NULL,
  `question_added_by` varchar(30) DEFAULT NULL,
  `question_added_date` varchar(20) DEFAULT NULL,
  `question_modified_by` varchar(30) DEFAULT NULL,
  `question_modified_date` varchar(20) DEFAULT NULL,
  `question_deleted_by` varchar(30) DEFAULT NULL,
  `question_deleted_date` varchar(20) DEFAULT NULL,
  `question_status` varchar(30) DEFAULT NULL,
  `envelope_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`question_id`),
  UNIQUE KEY `question_added_date` (`question_added_date`),
  UNIQUE KEY `question_modified_date` (`question_modified_date`),
  UNIQUE KEY `question_deleted_date` (`question_deleted_date`),
  KEY `fk6` (`envelope_id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`question_id`, `question_path`, `question_added_by`, `question_added_date`, `question_modified_by`, `question_modified_date`, `question_deleted_by`, `question_deleted_date`, `question_status`, `envelope_id`) VALUES
(1, 'assets/images/envelope/1681551714_1_1649030668_1_1.jpg', '1', '1681551679_1', NULL, NULL, NULL, NULL, 'active', 1),
(2, 'assets/images/envelope/1681551714_2_1649030668_2_2.jpg', '1', '1681551679_2', NULL, NULL, NULL, NULL, 'active', 1),
(3, 'assets/images/envelope/1681551714_3_1649030668_3_3.jpg', '1', '1681551679_3', NULL, NULL, NULL, NULL, 'active', 1),
(4, 'assets/images/envelope/1681551714_4_1649030710_1_1.jpg', '1', '1681551679_4', NULL, NULL, NULL, NULL, 'active', 1),
(5, 'assets/images/envelope/1681558288_1_1649030710_2_2.jpg', '1', '1681558269_1', NULL, NULL, NULL, NULL, 'active', 2),
(6, 'assets/images/envelope/1681558288_2_1649030710_3_3.jpg', '1', '1681558269_2', NULL, NULL, NULL, NULL, 'active', 2),
(7, 'assets/images/envelope/1681558288_3_1649030733_1_1.jpg', '1', '1681558269_3', NULL, NULL, NULL, NULL, 'active', 2),
(8, 'assets/images/envelope/1681558288_4_1649030733_2_2.jpg', '1', '1681558269_4', NULL, NULL, NULL, NULL, 'active', 2),
(9, 'assets/images/envelope/1681558322_1_1649030733_3_3.jpg', '1', '1681558300_1', NULL, NULL, NULL, NULL, 'active', 3),
(10, 'assets/images/envelope/1681558322_2_1649030761_1_1.jpg', '1', '1681558300_2', NULL, NULL, NULL, NULL, 'active', 3),
(11, 'assets/images/envelope/1681558322_3_1649030761_2_2.jpg', '1', '1681558300_3', NULL, NULL, NULL, NULL, 'active', 3),
(12, 'assets/images/envelope/1681558322_4_1649030761_3_3.jpg', '1', '1681558300_4', NULL, NULL, NULL, NULL, 'active', 3),
(13, 'assets/images/envelope/1681558352_1_1649030788_1_1.jpg', '1', '1681558333_1', NULL, NULL, NULL, NULL, 'active', 4),
(14, 'assets/images/envelope/1681558352_2_1649030788_2_2.jpg', '1', '1681558333_2', NULL, NULL, NULL, NULL, 'active', 4),
(15, 'assets/images/envelope/1681558352_3_1649030788_3_3.jpg', '1', '1681558333_3', NULL, NULL, NULL, NULL, 'active', 4),
(16, 'assets/images/envelope/1681558352_4_1649030813_1_1.jpg', '1', '1681558333_4', NULL, NULL, NULL, NULL, 'active', 4),
(17, 'assets/images/envelope/1681558397_1_1649030838_3_3.jpg', '1', '1681558369_1', NULL, NULL, NULL, NULL, 'active', 5),
(18, 'assets/images/envelope/1681558397_2_1649030865_1_1.jpg', '1', '1681558369_2', NULL, NULL, NULL, NULL, 'active', 5),
(19, 'assets/images/envelope/1681558397_3_1649030865_2_2.jpg', '1', '1681558369_3', NULL, NULL, NULL, NULL, 'active', 5),
(20, 'assets/images/envelope/1681558397_4_1649030865_3_3.jpg', '1', '1681558369_4', NULL, NULL, NULL, NULL, 'active', 5),
(21, 'assets/images/envelope/1681558495_1_1649030813_2_2.jpg', '1', '1681558427_1', NULL, NULL, NULL, NULL, 'active', 6),
(22, 'assets/images/envelope/1681558495_2_1649030813_3_3.jpg', '1', '1681558427_2', NULL, NULL, NULL, NULL, 'active', 6),
(23, 'assets/images/envelope/1681558495_3_1649030838_1_1.jpg', '1', '1681558427_3', NULL, NULL, NULL, NULL, 'active', 6),
(24, 'assets/images/envelope/1681558495_4_1649030838_2_2.jpg', '1', '1681558427_4', NULL, NULL, NULL, NULL, 'active', 6),
(25, 'assets/images/envelope/1681558656_1_1649543420_1_1.jpg', '1', '1681558516_1', NULL, NULL, NULL, NULL, 'active', 7),
(26, 'assets/images/envelope/1681558656_2_1649543420_2_2.jpg', '1', '1681558516_2', NULL, NULL, NULL, NULL, 'active', 7),
(27, 'assets/images/envelope/1681558656_3_1649543420_3_3.jpg', '1', '1681558516_3', NULL, NULL, NULL, NULL, 'active', 7),
(28, 'assets/images/envelope/1681558656_4_1649543420_4_4.jpg', '1', '1681558516_4', NULL, NULL, NULL, NULL, 'active', 7),
(29, 'assets/images/envelope/1681558656_5_1649543420_5_5.jpg', '1', '1681558516_5', NULL, NULL, NULL, NULL, 'active', 7),
(30, 'assets/images/envelope/1681558656_6_1649543420_6_6.jpg', '1', '1681558516_6', NULL, NULL, NULL, NULL, 'active', 7),
(31, 'assets/images/envelope/1681558656_7_1649543420_7_7.jpg', '1', '1681558516_7', NULL, NULL, NULL, NULL, 'active', 7),
(32, 'assets/images/envelope/1681558656_8_1649543420_8_8.jpg', '1', '1681558516_8', NULL, NULL, NULL, NULL, 'active', 7),
(33, 'assets/images/envelope/1681558656_9_1649543420_9_9.jpg', '1', '1681558516_9', NULL, NULL, NULL, NULL, 'active', 7),
(34, 'assets/images/envelope/1681558656_10_1649543420_10_10.jpg', '1', '1681558516_10', NULL, NULL, NULL, NULL, 'active', 7),
(35, 'assets/images/envelope/1681558656_11_1649543420_11_11.jpg', '1', '1681558516_11', NULL, NULL, NULL, NULL, 'active', 7),
(36, 'assets/images/envelope/1681558656_12_1649543420_12_12.jpg', '1', '1681558516_12', NULL, NULL, NULL, NULL, 'active', 7),
(37, 'assets/images/envelope/1681558656_13_1649543420_13_13.jpg', '1', '1681558516_13', NULL, NULL, NULL, NULL, 'active', 7),
(38, 'assets/images/envelope/1681558656_14_1649543420_14_14.jpg', '1', '1681558516_14', NULL, NULL, NULL, NULL, 'active', 7),
(39, 'assets/images/envelope/1681558656_15_1649543420_15_15.jpg', '1', '1681558516_15', NULL, NULL, NULL, NULL, 'active', 7),
(40, 'assets/images/envelope/1681559023_1_1649543316_1_1.jpg', '1', '1681558915_1', NULL, NULL, NULL, NULL, 'active', 8),
(41, 'assets/images/envelope/1681559023_2_1649543316_2_2.jpg', '1', '1681558915_2', NULL, NULL, NULL, NULL, 'active', 8),
(42, 'assets/images/envelope/1681559023_3_1649543316_3_3.jpg', '1', '1681558915_3', NULL, NULL, NULL, NULL, 'active', 8),
(43, 'assets/images/envelope/1681559023_4_1649543316_4_4.jpg', '1', '1681558915_4', NULL, NULL, NULL, NULL, 'active', 8),
(44, 'assets/images/envelope/1681559023_5_1649543316_5_5.jpg', '1', '1681558915_5', NULL, NULL, NULL, NULL, 'active', 8),
(45, 'assets/images/envelope/1681559023_6_1649543316_6_6.jpg', '1', '1681558915_6', NULL, NULL, NULL, NULL, 'active', 8),
(46, 'assets/images/envelope/1681559023_7_1649543316_7_7.jpg', '1', '1681558915_7', NULL, NULL, NULL, NULL, 'active', 8),
(47, 'assets/images/envelope/1681559023_8_1649543316_8_8.jpg', '1', '1681558915_8', NULL, NULL, NULL, NULL, 'active', 8),
(48, 'assets/images/envelope/1681559023_9_1649543316_9_9.jpg', '1', '1681558915_9', NULL, NULL, NULL, NULL, 'active', 8),
(49, 'assets/images/envelope/1681559023_10_1649543316_10_10.jpg', '1', '1681558915_10', NULL, NULL, NULL, NULL, 'active', 8),
(50, 'assets/images/envelope/1681559023_11_1649543316_11_11.jpg', '1', '1681558915_11', NULL, NULL, NULL, NULL, 'active', 8),
(51, 'assets/images/envelope/1681559023_12_1649543316_12_12.jpg', '1', '1681558915_12', NULL, NULL, NULL, NULL, 'active', 8),
(52, 'assets/images/envelope/1681559023_13_1649543316_13_13.jpg', '1', '1681558915_13', NULL, NULL, NULL, NULL, 'active', 8),
(53, 'assets/images/envelope/1681559023_14_1649543316_14_14.jpg', '1', '1681558915_14', NULL, NULL, NULL, NULL, 'active', 8),
(54, 'assets/images/envelope/1681559023_15_1649543316_15_15.jpg', '1', '1681558915_15', NULL, NULL, NULL, NULL, 'active', 8),
(55, 'assets/images/envelope/1681561033_1_1649543168_11_11.jpg', '1', '1681560939_1', NULL, NULL, NULL, NULL, 'active', 9),
(56, 'assets/images/envelope/1681561033_2_1649543168_12_12.jpg', '1', '1681560939_2', NULL, NULL, NULL, NULL, 'active', 9),
(57, 'assets/images/envelope/1681561033_3_1649543306_3_3.jpg', '1', '1681560939_3', NULL, NULL, NULL, NULL, 'active', 9),
(58, 'assets/images/envelope/1681561033_4_1649543306_4_4.jpg', '1', '1681560939_4', NULL, NULL, NULL, NULL, 'active', 9),
(59, 'assets/images/envelope/1681561033_5_1649543306_5_5.jpg', '1', '1681560939_5', NULL, NULL, NULL, NULL, 'active', 9),
(60, 'assets/images/envelope/1681561033_6_1649543306_6_6.jpg', '1', '1681560939_6', NULL, NULL, NULL, NULL, 'active', 9),
(61, 'assets/images/envelope/1681561033_7_1649543306_7_7.jpg', '1', '1681560939_7', NULL, NULL, NULL, NULL, 'active', 9),
(62, 'assets/images/envelope/1681561033_8_1649543306_8_8.jpg', '1', '1681560939_8', NULL, NULL, NULL, NULL, 'active', 9),
(63, 'assets/images/envelope/1681561033_9_1649543306_9_9.jpg', '1', '1681560939_9', NULL, NULL, NULL, NULL, 'active', 9),
(64, 'assets/images/envelope/1681561033_10_1649543306_10_10.jpg', '1', '1681560939_10', NULL, NULL, NULL, NULL, 'active', 9),
(65, 'assets/images/envelope/1681561033_11_1649543306_11_11.jpg', '1', '1681560939_11', NULL, NULL, NULL, NULL, 'active', 9),
(66, 'assets/images/envelope/1681561033_12_1649543306_12_12.jpg', '1', '1681560939_12', NULL, NULL, NULL, NULL, 'active', 9),
(67, 'assets/images/envelope/1681561033_13_1649543306_13_13.jpg', '1', '1681560939_13', NULL, NULL, NULL, NULL, 'active', 9),
(68, 'assets/images/envelope/1681561033_14_1649543306_14_14.jpg', '1', '1681560939_14', NULL, NULL, NULL, NULL, 'active', 9),
(69, 'assets/images/envelope/1681561033_15_1649543306_15_15.jpg', '1', '1681560939_15', NULL, NULL, NULL, NULL, 'active', 9),
(70, 'assets/images/envelope/1681561192_1_1649543154_14_14.jpg', '1', '1681561062_1', NULL, NULL, NULL, NULL, 'active', 10),
(71, 'assets/images/envelope/1681561192_2_1649543154_15_15.jpg', '1', '1681561062_2', NULL, NULL, NULL, NULL, 'active', 10),
(72, 'assets/images/envelope/1681561192_3_1649543168_1_1.jpg', '1', '1681561062_3', NULL, NULL, NULL, NULL, 'active', 10),
(73, 'assets/images/envelope/1681561192_4_1649543168_2_2.jpg', '1', '1681561062_4', NULL, NULL, NULL, NULL, 'active', 10),
(74, 'assets/images/envelope/1681561192_5_1649543168_3_3.jpg', '1', '1681561062_5', NULL, NULL, NULL, NULL, 'active', 10),
(75, 'assets/images/envelope/1681561192_6_1649543168_6_6.jpg', '1', '1681561062_6', NULL, NULL, NULL, NULL, 'active', 10),
(76, 'assets/images/envelope/1681561192_7_1649543168_7_7.jpg', '1', '1681561062_7', NULL, NULL, NULL, NULL, 'active', 10),
(77, 'assets/images/envelope/1681561192_8_1649543168_8_8.jpg', '1', '1681561062_8', NULL, NULL, NULL, NULL, 'active', 10),
(78, 'assets/images/envelope/1681561192_9_1649543168_9_9.jpg', '1', '1681561062_9', NULL, NULL, NULL, NULL, 'active', 10),
(79, 'assets/images/envelope/1681561192_10_1649543168_10_10.jpg', '1', '1681561062_10', NULL, NULL, NULL, NULL, 'active', 10),
(80, 'assets/images/envelope/1681561192_11_1649543168_13_13.jpg', '1', '1681561062_11', NULL, NULL, NULL, NULL, 'active', 10),
(81, 'assets/images/envelope/1681561192_12_1649543168_14_14.jpg', '1', '1681561062_12', NULL, NULL, NULL, NULL, 'active', 10),
(82, 'assets/images/envelope/1681561192_13_1649543168_15_15.jpg', '1', '1681561062_13', NULL, NULL, NULL, NULL, 'active', 10),
(83, 'assets/images/envelope/1681561192_14_1649543306_1_1.jpg', '1', '1681561062_14', NULL, NULL, NULL, NULL, 'active', 10),
(84, 'assets/images/envelope/1681561192_15_1649543306_2_2.jpg', '1', '1681561062_15', NULL, NULL, NULL, NULL, 'active', 10),
(85, 'assets/images/envelope/1681561362_1_1649543154_1_1.jpg', '1', '1681561245_1', NULL, NULL, NULL, NULL, 'active', 11),
(86, 'assets/images/envelope/1681561362_2_1649543154_2_2.jpg', '1', '1681561245_2', NULL, NULL, NULL, NULL, 'active', 11),
(87, 'assets/images/envelope/1681561362_3_1649543154_3_3.jpg', '1', '1681561245_3', NULL, NULL, NULL, NULL, 'active', 11),
(88, 'assets/images/envelope/1681561362_4_1649543154_4_4.jpg', '1', '1681561245_4', NULL, NULL, NULL, NULL, 'active', 11),
(89, 'assets/images/envelope/1681561362_5_1649543154_5_5.jpg', '1', '1681561245_5', NULL, NULL, NULL, NULL, 'active', 11),
(90, 'assets/images/envelope/1681561362_6_1649543154_6_6.jpg', '1', '1681561245_6', NULL, NULL, NULL, NULL, 'active', 11),
(91, 'assets/images/envelope/1681561362_7_1649543154_7_7.jpg', '1', '1681561245_7', NULL, NULL, NULL, NULL, 'active', 11),
(92, 'assets/images/envelope/1681561362_8_1649543154_8_8.jpg', '1', '1681561245_8', NULL, NULL, NULL, NULL, 'active', 11),
(93, 'assets/images/envelope/1681561362_9_1649543154_9_9.jpg', '1', '1681561245_9', NULL, NULL, NULL, NULL, 'active', 11),
(94, 'assets/images/envelope/1681561362_10_1649543154_10_10.jpg', '1', '1681561245_10', NULL, NULL, NULL, NULL, 'active', 11),
(95, 'assets/images/envelope/1681561362_11_1649543154_11_11.jpg', '1', '1681561245_11', NULL, NULL, NULL, NULL, 'active', 11),
(96, 'assets/images/envelope/1681561362_12_1649543154_12_12.jpg', '1', '1681561245_12', NULL, NULL, NULL, NULL, 'active', 11),
(97, 'assets/images/envelope/1681561362_13_1649543154_13_13.jpg', '1', '1681561245_13', NULL, NULL, NULL, NULL, 'active', 11),
(98, 'assets/images/envelope/1681561362_14_1649543168_4_4.jpg', '1', '1681561245_14', NULL, NULL, NULL, NULL, 'active', 11),
(99, 'assets/images/envelope/1681561362_15_1649543168_5_5.jpg', '1', '1681561245_15', NULL, NULL, NULL, NULL, 'active', 11),
(100, 'assets/images/envelope/1681566168_1_1649543058_1_1.jpg', '1', '1681566074_1', NULL, NULL, NULL, NULL, 'active', 12),
(101, 'assets/images/envelope/1681566168_2_1649543058_2_2.jpg', '1', '1681566074_2', NULL, NULL, NULL, NULL, 'active', 12),
(102, 'assets/images/envelope/1681566168_3_1649543058_3_3.jpg', '1', '1681566074_3', NULL, NULL, NULL, NULL, 'active', 12),
(103, 'assets/images/envelope/1681566168_4_1649543058_4_4.jpg', '1', '1681566074_4', NULL, NULL, NULL, NULL, 'active', 12),
(104, 'assets/images/envelope/1681566168_5_1649543058_5_5.jpg', '1', '1681566074_5', NULL, NULL, NULL, NULL, 'active', 12),
(105, 'assets/images/envelope/1681566168_6_1649543058_6_6.jpg', '1', '1681566074_6', NULL, NULL, NULL, NULL, 'active', 12),
(106, 'assets/images/envelope/1681566168_7_1649543058_7_7.jpg', '1', '1681566074_7', NULL, NULL, NULL, NULL, 'active', 12),
(107, 'assets/images/envelope/1681566168_8_1649543058_8_8.jpg', '1', '1681566074_8', NULL, NULL, NULL, NULL, 'active', 12),
(108, 'assets/images/envelope/1681566168_9_1649543058_9_9.jpg', '1', '1681566074_9', NULL, NULL, NULL, NULL, 'active', 12),
(109, 'assets/images/envelope/1681566168_10_1649543058_10_10.jpg', '1', '1681566074_10', NULL, NULL, NULL, NULL, 'active', 12),
(110, 'assets/images/envelope/1681566168_11_1649543058_11_11.jpg', '1', '1681566074_11', NULL, NULL, NULL, NULL, 'active', 12),
(111, 'assets/images/envelope/1681566168_12_1649543058_12_12.jpg', '1', '1681566074_12', NULL, NULL, NULL, NULL, 'active', 12),
(112, 'assets/images/envelope/1681566168_13_1649543058_13_13.jpg', '1', '1681566074_13', NULL, NULL, NULL, NULL, 'active', 12),
(113, 'assets/images/envelope/1681566168_14_1649543058_14_14.jpg', '1', '1681566074_14', NULL, NULL, NULL, NULL, 'active', 12),
(114, 'assets/images/envelope/1681566168_15_1649543058_15_15.jpg', '1', '1681566074_15', NULL, NULL, NULL, NULL, 'active', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

DROP TABLE IF EXISTS `tbl_setting`;
CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(30) DEFAULT NULL,
  `setting_value1` varchar(30) DEFAULT NULL,
  `setting_value2` varchar(30) DEFAULT NULL,
  `setting_value3` varchar(30) DEFAULT NULL,
  `setting_value4` varchar(30) DEFAULT NULL,
  `setting_value5` varchar(30) DEFAULT NULL,
  `setting_value6` varchar(30) DEFAULT NULL,
  `setting_value7` varchar(30) DEFAULT NULL,
  `setting_added_by` int(11) DEFAULT NULL,
  `setting_added_date` varchar(30) DEFAULT NULL,
  `setting_modify_by` int(11) DEFAULT NULL,
  `setting_modify_date` varchar(30) DEFAULT NULL,
  `setting_deleted_by` int(11) DEFAULT NULL,
  `setting_deleted_date` varchar(30) DEFAULT NULL,
  `setting_status` varchar(30) DEFAULT NULL,
  `compertition_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`setting_id`),
  UNIQUE KEY `setting_added_date` (`setting_added_date`),
  UNIQUE KEY `setting_modify_date` (`setting_modify_date`),
  UNIQUE KEY `setting_deleted_date` (`setting_deleted_date`),
  KEY `fk4` (`compertition_id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`setting_id`, `setting_name`, `setting_value1`, `setting_value2`, `setting_value3`, `setting_value4`, `setting_value5`, `setting_value6`, `setting_value7`, `setting_added_by`, `setting_added_date`, `setting_modify_by`, `setting_modify_date`, `setting_deleted_by`, `setting_deleted_date`, `setting_status`, `compertition_id`) VALUES
(1, 'active_type', 'tashjii', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(2, 'envelope_questions', 'hifdhi', '30', '4', NULL, NULL, NULL, NULL, 1, '1681500076', NULL, NULL, NULL, NULL, 'active', 1),
(3, 'envelope_questions', 'tashjii', '30', '15', NULL, NULL, NULL, NULL, 1, '1681500094', NULL, NULL, NULL, NULL, 'active', 1),
(4, 'saka', '4', '1', 'KUKOSA/KURUSHA AYA', 'jaji hifdhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(5, 'KIB', '3', '2', 'KUKOSA KIBWAGIZO', 'jaji hifdhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(6, 'neno', '2', '3', 'KURUKA / KUKOSA NENO', 'jaji hifdhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(7, 'kzh', '1', '4', 'KURUKA / KUKOSA herufi', 'jaji hifdhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(8, 'tan', '0.25', '5', 'kukosa na kukumbuka', 'jaji hifdhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(9, 'ree', '2', '1', 'kukosea hukmu za ree', 'jaji makharij', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(10, 'makh', '2', '3', 'kukosea makaarij', 'jaji makharij', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(11, 'sifaat', '2', '4', 'kukosea sifa za herufi', 'jaji makharij', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(56, 'mim_saka', '2', '1', 'kosa la mim  sakina', 'jaji tajwid', NULL, NULL, NULL, 1, '1682068053', NULL, NULL, NULL, NULL, 'active', 59),
(55, 'kib', '3', '2', 'kukosa kibwagizo', 'jaji hifdhi', NULL, NULL, NULL, 1, '1682068052', NULL, NULL, NULL, NULL, 'active', 59),
(52, 'envelope_questions', 'tashjii', '2', '2', NULL, NULL, NULL, NULL, 1, '1682068049', NULL, NULL, NULL, NULL, 'active', 59),
(54, 'saka', '4', '1', 'kukosa au kurusha aya', 'jaji hifdhi', NULL, NULL, NULL, 1, '1682068051', NULL, NULL, NULL, NULL, 'active', 59),
(53, 'envelope_questions', 'tashjii', '3', '3', NULL, NULL, NULL, NULL, 1, '1682068050', NULL, NULL, NULL, NULL, 'active', 59),
(51, 'envelope_questions', 'tashjii', '1', '1', NULL, NULL, NULL, NULL, 1, '1682068048', NULL, NULL, NULL, NULL, 'active', 59),
(57, 'ree', '1', '1', 'kosa la ree', 'jaji makharij', NULL, NULL, NULL, 1, '1682068054', NULL, NULL, NULL, NULL, 'active', 59),
(58, 'nu_ta', '2', '1', NULL, 'jaji tajwid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(59, 'mim_sak', '2', '2', NULL, 'jaji tajwid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(60, 'idgh', '2', '3', NULL, 'jaji tajwid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(61, 'kz_mad', '2', '4', NULL, 'jaji tajwid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(62, 'wa_ib', '2', '5', NULL, 'jaji tajwid', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(63, 'qal', '1', '2', NULL, 'jaji makharij', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(64, 'shakli', '1', '5', NULL, 'jaji makharij', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(65, 'saka', '4', '1', NULL, 'jaji tashjii', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(66, 'kib', '3', '2', NULL, 'jaji tashjii', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(67, 'neno', '2', '3', NULL, 'jaji tashjii', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(68, 'shakli', '1', '4', NULL, 'jaji tashjii', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1),
(69, 'tajwid', '2', '5', NULL, 'jaji tashjii', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting_question`
--

DROP TABLE IF EXISTS `tbl_setting_question`;
CREATE TABLE IF NOT EXISTS `tbl_setting_question` (
  `setting_question_id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `value` int(10) NOT NULL,
  PRIMARY KEY (`setting_question_id`),
  KEY `fk9` (`setting_id`),
  KEY `fk10` (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2531 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting_question`
--

INSERT INTO `tbl_setting_question` (`setting_question_id`, `setting_id`, `question_id`, `user_id`, `value`) VALUES
(1702, 5, 11, 3, 0),
(1738, 10, 6, 6, 0),
(1716, 9, 10, 5, 0),
(1676, 4, 10, 2, 0),
(1723, 10, 11, 5, 0),
(1728, 10, 12, 5, 0),
(1722, 63, 11, 5, 0),
(1721, 9, 11, 5, 0),
(1701, 4, 11, 3, 0),
(1732, 63, 5, 6, 0),
(1790, 8, 8, 2, 0),
(1719, 11, 10, 5, 0),
(1789, 7, 8, 2, 0),
(1718, 10, 10, 5, 0),
(1717, 63, 10, 5, 0),
(1700, 8, 10, 3, 0),
(1711, 9, 9, 5, 0),
(1712, 63, 9, 5, 0),
(1699, 7, 10, 3, 0),
(1698, 6, 10, 3, 0),
(1713, 10, 9, 5, 0),
(1714, 11, 9, 5, 0),
(1715, 64, 9, 5, 0),
(1677, 5, 10, 2, 0),
(1731, 9, 5, 6, 0),
(1781, 4, 7, 2, 0),
(1782, 5, 7, 2, 0),
(1678, 6, 10, 2, 0),
(1725, 64, 11, 5, 0),
(1783, 6, 7, 2, 0),
(1679, 7, 10, 2, 0),
(1697, 5, 10, 3, 0),
(1786, 4, 8, 2, 0),
(1696, 4, 10, 3, 0),
(1692, 5, 9, 3, 0),
(1726, 9, 12, 5, 0),
(1693, 6, 9, 3, 0),
(1740, 64, 6, 6, 0),
(1739, 11, 6, 6, 0),
(1694, 7, 9, 3, 0),
(1735, 64, 5, 6, 0),
(1734, 11, 5, 6, 1),
(1695, 8, 9, 3, 0),
(1691, 4, 9, 3, 0),
(1703, 6, 11, 3, 0),
(1705, 8, 11, 3, 0),
(1704, 7, 11, 3, 0),
(1706, 4, 12, 3, 0),
(1737, 63, 6, 6, 0),
(1736, 9, 6, 6, 0),
(1733, 10, 5, 6, 0),
(1788, 6, 8, 2, 0),
(1729, 11, 12, 5, 0),
(1730, 64, 12, 5, 0),
(1784, 7, 7, 2, 0),
(1727, 63, 12, 5, 0),
(1707, 5, 12, 3, 0),
(1708, 6, 12, 3, 0),
(1709, 7, 12, 3, 0),
(1785, 8, 7, 2, 0),
(1787, 5, 8, 2, 0),
(1720, 64, 10, 5, 0),
(1724, 11, 11, 5, 0),
(1710, 8, 12, 3, 0),
(1675, 8, 9, 2, 0),
(1674, 7, 9, 2, 0),
(1673, 6, 9, 2, 0),
(1672, 5, 9, 2, 0),
(1671, 4, 9, 2, 0),
(1680, 8, 10, 2, 0),
(1681, 4, 11, 2, 0),
(1688, 6, 12, 2, 0),
(1689, 7, 12, 2, 0),
(1690, 8, 12, 2, 0),
(1687, 5, 12, 2, 0),
(1686, 4, 12, 2, 0),
(1685, 8, 11, 2, 0),
(1684, 7, 11, 2, 0),
(1683, 6, 11, 2, 0),
(1682, 5, 11, 2, 0),
(1659, 61, 10, 9, 0),
(1658, 60, 10, 9, 0),
(1657, 59, 10, 9, 0),
(1656, 58, 10, 9, 0),
(1655, 62, 9, 9, 0),
(1654, 61, 9, 9, 0),
(1653, 60, 9, 9, 0),
(1652, 59, 9, 9, 0),
(1651, 58, 9, 9, 0),
(1660, 62, 10, 9, 0),
(1661, 58, 11, 9, 0),
(1670, 62, 12, 9, 0),
(1669, 61, 12, 9, 0),
(1668, 60, 12, 9, 0),
(1667, 59, 12, 9, 0),
(1666, 58, 12, 9, 0),
(1665, 62, 11, 9, 0),
(1664, 61, 11, 9, 0),
(1663, 60, 11, 9, 0),
(1662, 59, 11, 9, 0),
(1639, 61, 10, 8, 0),
(1638, 60, 10, 8, 0),
(1637, 59, 10, 8, 0),
(1636, 58, 10, 8, 0),
(1635, 62, 9, 8, 0),
(1634, 61, 9, 8, 0),
(1633, 60, 9, 8, 0),
(1632, 59, 9, 8, 0),
(1640, 62, 10, 8, 0),
(1641, 58, 11, 8, 0),
(1642, 59, 11, 8, 0),
(1650, 62, 12, 8, 0),
(1649, 61, 12, 8, 0),
(1648, 60, 12, 8, 0),
(1647, 59, 12, 8, 0),
(1646, 58, 12, 8, 0),
(1645, 62, 11, 8, 0),
(1644, 61, 11, 8, 0),
(1643, 60, 11, 8, 0),
(1631, 58, 9, 8, 0),
(1741, 9, 7, 6, 0),
(1742, 63, 7, 6, 0),
(1743, 10, 7, 6, 0),
(1744, 11, 7, 6, 0),
(1745, 64, 7, 6, 0),
(1746, 9, 8, 6, 0),
(1747, 63, 8, 6, 0),
(1748, 10, 8, 6, 0),
(1749, 11, 8, 6, 0),
(1750, 64, 8, 6, 0),
(1751, 9, 5, 5, 0),
(1752, 63, 5, 5, 0),
(1753, 10, 5, 5, 0),
(1754, 11, 5, 5, 1),
(1755, 64, 5, 5, 0),
(1756, 9, 6, 5, 0),
(1757, 63, 6, 5, 0),
(1758, 10, 6, 5, 0),
(1759, 11, 6, 5, 0),
(1760, 64, 6, 5, 0),
(1761, 9, 7, 5, 0),
(1762, 63, 7, 5, 0),
(1763, 10, 7, 5, 0),
(1764, 11, 7, 5, 0),
(1765, 64, 7, 5, 0),
(1766, 9, 8, 5, 0),
(1767, 63, 8, 5, 0),
(1768, 10, 8, 5, 0),
(1769, 11, 8, 5, 0),
(1770, 64, 8, 5, 0),
(1771, 4, 5, 2, 0),
(1772, 5, 5, 2, 0),
(1773, 6, 5, 2, 0),
(1774, 7, 5, 2, 0),
(1775, 8, 5, 2, 0),
(1776, 4, 6, 2, 0),
(1777, 5, 6, 2, 0),
(1778, 6, 6, 2, 0),
(1779, 7, 6, 2, 0),
(1780, 8, 6, 2, 0),
(1791, 4, 5, 3, 0),
(1792, 5, 5, 3, 0),
(1793, 6, 5, 3, 0),
(1794, 7, 5, 3, 0),
(1795, 8, 5, 3, 0),
(1796, 4, 6, 3, 0),
(1797, 5, 6, 3, 0),
(1798, 6, 6, 3, 0),
(1799, 7, 6, 3, 0),
(1800, 8, 6, 3, 0),
(1801, 4, 7, 3, 0),
(1802, 5, 7, 3, 0),
(1803, 6, 7, 3, 0),
(1804, 7, 7, 3, 0),
(1805, 8, 7, 3, 0),
(1806, 4, 8, 3, 0),
(1807, 5, 8, 3, 0),
(1808, 6, 8, 3, 0),
(1809, 7, 8, 3, 0),
(1810, 8, 8, 3, 0),
(1811, 58, 5, 8, 0),
(1812, 59, 5, 8, 0),
(1813, 60, 5, 8, 0),
(1814, 61, 5, 8, 1),
(1815, 62, 5, 8, 0),
(1816, 58, 6, 8, 0),
(1817, 59, 6, 8, 0),
(1818, 60, 6, 8, 0),
(1819, 61, 6, 8, 0),
(1820, 62, 6, 8, 0),
(1821, 58, 7, 8, 0),
(1822, 59, 7, 8, 0),
(1823, 60, 7, 8, 0),
(1824, 61, 7, 8, 0),
(1825, 62, 7, 8, 0),
(1826, 58, 8, 8, 0),
(1827, 59, 8, 8, 0),
(1828, 60, 8, 8, 0),
(1829, 61, 8, 8, 0),
(1830, 62, 8, 8, 0),
(1831, 58, 5, 9, 0),
(1832, 59, 5, 9, 0),
(1833, 60, 5, 9, 0),
(1834, 61, 5, 9, 1),
(1835, 62, 5, 9, 0),
(1836, 58, 6, 9, 0),
(1837, 59, 6, 9, 0),
(1838, 60, 6, 9, 0),
(1839, 61, 6, 9, 0),
(1840, 62, 6, 9, 0),
(1841, 58, 7, 9, 0),
(1842, 59, 7, 9, 0),
(1843, 60, 7, 9, 0),
(1844, 61, 7, 9, 0),
(1845, 62, 7, 9, 0),
(1846, 58, 8, 9, 0),
(1847, 59, 8, 9, 0),
(1848, 60, 8, 9, 0),
(1849, 61, 8, 9, 0),
(1850, 62, 8, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fname` varchar(30) DEFAULT NULL,
  `user_mname` varchar(30) DEFAULT NULL,
  `user_lname` varchar(30) DEFAULT NULL,
  `user_gender` varchar(30) DEFAULT NULL,
  `user_phone` varchar(30) DEFAULT NULL,
  `user_address` varchar(30) DEFAULT NULL,
  `user_nationality` varchar(30) DEFAULT NULL,
  `user_email` varchar(40) DEFAULT NULL,
  `username` varchar(40) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `user_added_by` varchar(30) DEFAULT NULL,
  `user_added_date` varchar(20) DEFAULT NULL,
  `user_modified_by` varchar(30) DEFAULT NULL,
  `user_modified_date` varchar(20) DEFAULT NULL,
  `user_deleted_by` varchar(30) DEFAULT NULL,
  `user_deleted_date` varchar(20) DEFAULT NULL,
  `user_status` varchar(30) DEFAULT NULL,
  `user_temp_privellege` varchar(30) DEFAULT NULL,
  `privellege_id` int(11) DEFAULT NULL,
  `compertition_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_added_date` (`user_added_date`),
  UNIQUE KEY `user_modified_date` (`user_modified_date`),
  UNIQUE KEY `user_deleted_date` (`user_deleted_date`),
  KEY `fk1` (`privellege_id`),
  KEY `fk2` (`compertition_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `user_gender`, `user_phone`, `user_address`, `user_nationality`, `user_email`, `username`, `user_password`, `user_added_by`, `user_added_date`, `user_modified_by`, `user_modified_date`, `user_deleted_by`, `user_deleted_date`, `user_status`, `user_temp_privellege`, `privellege_id`, `compertition_id`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'male', NULL, NULL, 'Tanzania', NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '1621442555', NULL, NULL, NULL, NULL, 'active', NULL, 1, 1),
(2, 'hifdhi', 'hifdhi', 'hifdhi', 'male', '', '', '', '', 'hifdhi1', '202cb962ac59075b964b07152d234b70', '1', '1681551852', NULL, NULL, NULL, NULL, 'active', '', 5, 1),
(3, 'hifdhi', 'hifdhi', 'hifdhi', 'male', '', '', '', '', 'hifdhi2', '202cb962ac59075b964b07152d234b70', '1', '1681551885', NULL, NULL, NULL, NULL, 'active', NULL, 5, 1),
(4, 'env', '', 'elope', 'male', '', '', '', '', 'envelope', '202cb962ac59075b964b07152d234b70', '1', '1681566453', NULL, NULL, NULL, NULL, 'active', NULL, 2, 1),
(5, 'makh', '', 'makh', 'male', '', '', '', '', 'makharij1', '202cb962ac59075b964b07152d234b70', '1', '1681674306', NULL, NULL, NULL, NULL, 'active', NULL, 8, 1),
(6, 'makh', '', 'makh', 'male', '', '', '', '', 'makharij2', '202cb962ac59075b964b07152d234b70', '1', '1681674345', NULL, NULL, NULL, NULL, 'active', NULL, 8, 1),
(7, 'kiongozi', '', 'kiongozi', 'male', '', '', '', '', 'kiongozi1', '202cb962ac59075b964b07152d234b70', '1', '1681675815', NULL, NULL, NULL, NULL, 'active', '', 3, 1),
(8, 'tajwid', '', 'Tajwid', 'male', '', '', '', '', 'tajwid1', '202cb962ac59075b964b07152d234b70', '1', '1681801550', NULL, NULL, NULL, NULL, 'active', NULL, 7, 1),
(9, 'Tah', '', 'uyuiyiuy', 'male', '', '', '', '', 'tajwid2', '202cb962ac59075b964b07152d234b70', '1', '1681801587', NULL, NULL, NULL, NULL, 'active', NULL, 7, 1),
(10, 'audience', '', 'audience', 'male', '', '', '', '', 'audience', '202cb962ac59075b964b07152d234b70', '1', '1681801613', NULL, NULL, NULL, NULL, 'active', NULL, 4, 1),
(11, 'tashjii', '', 'tashjii', 'male', '', '', '', '', 'tashjii1', '202cb962ac59075b964b07152d234b70', '1', '1681801647', NULL, NULL, NULL, NULL, 'active', NULL, 6, 1),
(12, 'Ali', '', 'Hamad', 'male', '', '', '', '', 'tashjii2', '202cb962ac59075b964b07152d234b70', '1', '1681801705', NULL, NULL, NULL, NULL, 'active', NULL, 6, 1),
(13, 'hifdhi3', '', 'hifdhi', 'male', '', '', '', '', 'hifdhi3', '202cb962ac59075b964b07152d234b70', '1', '1682372179', NULL, NULL, NULL, NULL, 'active', NULL, 5, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
