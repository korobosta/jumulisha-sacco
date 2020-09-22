-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2018 at 05:49 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kenversity`
--
CREATE DATABASE IF NOT EXISTS `codenetc_sacco` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `codenetc_sacco`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `phonenumber`, `city`, `username`, `password`) VALUES
(1, 'kevin', 'korobosta', 'kevinkorobosta@gmail.com', '0713887070', 'nairobi', 'admin', 'adminkoro');

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE IF NOT EXISTS `balance` (
  `memberID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--

INSERT INTO `balance` (`memberID`, `amount`) VALUES
(1, 1000),
(12, 1870);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `sentto` varchar(50) NOT NULL DEFAULT 'admin',
  `reply` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `sentto`, `reply`) VALUES
(1, 'KEVIN INDECHE', 'kevinkorobost@gmail.com', '', '', 'admin', ''),
(2, 'KEVIN INDECHE', 'kevinkorobost@gmail.com', '', '', 'admin', ''),
(3, 'KEVIN INDECHE', 'kevinkorobost@gmail.com', '', '', 'admin', ''),
(4, 'KEVIN INDECHE', 'kevinkorobost@gmail.com', '', '', 'admin', ''),
(5, 'KEVIN INDECHE', 'kevinkorobost@gmail.com', '', 'ojdjkasdjkas', 'admin', ''),
(6, 'KEVIN INDECHE', 'kevinkorobost@gmail.com', 'loans', 'i love you?', 'admin', ''),
(7, 'KEVIN INDECHE', 'kevinkorobost@gmail.com', 'loans', 'jkahdj.jkahs', 'admin', ''),
(8, 'KEVIN INDECHE', 'kevinkorobost@gmail.com', 'loans', 'hjhdjkdlkkl', 'admin', ''),
(9, 'jk', '', 'loans', '', 'admin', ''),
(10, 'mattress', 'wanguikaris@gmail.com', 'loans', 'hhhh', 'admin', ''),
(11, 'edwin chep', 'edwinchep@gmail.com', 'loans', 'how much do you charge as interest', 'admin', ''),
(12, ' ', '', 'savings', 'How much is your interest?', 'management', 'loan or savings interest?clarify'),
(13, 'kevin ongulu', 'kevinkorobost@gmail.com', 'loans', 'which loans do you offer', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `defaulters`
--

CREATE TABLE IF NOT EXISTS `defaulters` (
  `idNo` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `loanIssuer` varchar(20) NOT NULL,
  `applicationDate` date NOT NULL,
  PRIMARY KEY (`idNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE IF NOT EXISTS `docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc` longblob NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploadedBy` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `folder` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `doc`, `created`, `uploadedBy`, `folder`) VALUES
(4, 0x49442e706466, '2018-07-23 18:50:06', 'kevin', 'docs/');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `memberID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `surname` varchar(255) NOT NULL COMMENT 'surname',
  `othernames` varchar(34) NOT NULL COMMENT 'othernames',
  `email` varchar(100) NOT NULL COMMENT 'email',
  `address` varchar(50) NOT NULL,
  `joinDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mobilenumber` varchar(20) NOT NULL,
  `idno` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='datatable demo table' AUTO_INCREMENT=58 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`memberID`, `surname`, `othernames`, `email`, `address`, `joinDate`, `mobilenumber`, `idno`, `dob`, `gender`, `username`, `password`) VALUES
(1, 'Tiger Nixon', '320800', '61', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(2, 'Garrett Winters', '170750', '63', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(3, 'Ashton Cox', '86000', '66', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(4, 'Cedric Kelly', '433060', '22', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(5, 'Airi Satou', '162700', '33', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(6, 'Brielle Williamson', '372000', '61', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(7, 'Herrod Chandler', '137500', '59', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(8, 'Rhona Davidson', '327900', '55', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(9, 'Colleen Hurst', '205500', '39', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(10, 'Sonya Frost', '103600', '23', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(11, 'Jena Gaines', '90560', '30', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(12, 'Quinn Flynn', '342000', '22', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(13, 'Charde Marshall', '470600', '36', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(14, 'Haley Kennedy', '313500', '43', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(15, 'Tatyana Fitzpatrick', '385750', '19', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(16, 'Michael Silva', '198500', '66', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(17, 'Paul Byrd', '725000', '64', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(18, 'Gloria Little', '237500', '59', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(19, 'Bradley Greer', '132000', '41', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(20, 'Dai Rios', '217500', '35', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(21, 'Jenette Caldwell', '345000', '30', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(22, 'Yuri Berry', '675000', '40', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(23, 'Caesar Vance', '106450', '21', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(24, 'Doris Wilder', '85600', '23', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(25, 'Angelica Ramos', '1200000', '47', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(26, 'Gavin Joyce', '92575', '42', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(27, 'Jennifer Chang', '357650', '28', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(28, 'Brenden Wagner', '206850', '28', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(29, 'Fiona Green', '850000', '48', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(30, 'Shou Itou', '163000', '20', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(31, 'Michelle House', '95400', '37', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(32, 'Suki Burks', '114500', '53', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(33, 'Prescott Bartlett', '145000', '27', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(34, 'Gavin Cortez', '235500', '22', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(35, 'Martena Mccray', '324050', '46', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(36, 'Unity Butler', '85675', '47', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(37, 'Howard Hatfield', '164500', '51', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(38, 'Hope Fuentes', '109850', '41', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(39, 'Vivian Harrell', '452500', '62', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(40, 'Timothy Mooney', '136200', '37', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(41, 'Jackson Bradshaw', '645750', '65', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(42, 'Olivia Liang', '234500', '64', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(43, 'Bruno Nash', '163500', '38', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(44, 'Sakura Yamamoto', '139575', '37', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(45, 'Thor Walton', '98540', '61', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(46, 'Finn Camacho', '87500', '47', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(47, 'Serge Baldwin', '138575', '64', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(48, 'Zenaida Frank', '125250', '63', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(49, 'Zorita Serrano', '115000', '56', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(50, 'Jennifer Acosta', '75650', '43', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(51, 'Cara Stevens', '145600', '46', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(52, 'Hermione Butler', '356250', '47', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(53, 'Lael Greer', '103500', '21', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(54, 'Jonas Alexander', '86500', '30', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(55, 'Shad Decker', '183000', '51', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(56, 'Michael Bruce', '183000', '29', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', ''),
(57, 'Donna Snider', '112000', '27', '', '2018-07-16 18:45:32', '', '', '0000-00-00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `guarantors`
--

CREATE TABLE IF NOT EXISTS `guarantors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberID` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `idno` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `dateofinsert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `guarantors`
--

INSERT INTO `guarantors` (`id`, `memberID`, `name`, `dob`, `idno`, `phone`, `address`, `occupation`, `dateofinsert`) VALUES
(2, '4', 'uunye ', '1963-04-08', '3246776348', '0786579878', 'p.o box 63 statehouse', 'prezo', '2018-07-24 15:43:08'),
(3, '4', 'kandiri jonh', '1970-09-09', '24567853', '0724568792', 'p.o 43844-00100', 'lecturer', '2018-07-24 15:54:22'),
(4, '4', 'kandiri jonh', '1970-09-09', '24567853', '0724568792', 'p.o 43844-00100', 'lecturer', '2018-07-24 15:54:29'),
(5, '4', 'kandiri jonh', '1970-09-09', '24567853', '0724568792', 'p.o 43844-00100', 'lecturer', '2018-07-24 15:54:33'),
(6, '4', 'kandiri jonh', '1970-09-09', '24567853', '0724568792', 'p.o 43844-00100', 'lecturer', '2018-07-24 15:54:38'),
(7, '11', 'madividi musalia', '1960-05-07', '25789432', '0712567834', 'p.o box 7456', 'politician', '2018-07-27 23:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` longblob NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploadedBy` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `folder` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image`, `created`, `uploadedBy`, `folder`) VALUES
(12, 0x494d475f32303137303832375f3039353334382e6a7067, '2018-07-21 11:09:23', 'kevin', 'images/');

-- --------------------------------------------------------

--
-- Table structure for table `kenversityaccount`
--

CREATE TABLE IF NOT EXISTS `kenversityaccount` (
  `id` int(11) NOT NULL,
  `cashBalance` int(11) NOT NULL,
  `bankBalance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kenversityaccount`
--

INSERT INTO `kenversityaccount` (`id`, `cashBalance`, `bankBalance`) VALUES
(1, 87000, 988000);

-- --------------------------------------------------------

--
-- Table structure for table `loanbalance`
--

CREATE TABLE IF NOT EXISTS `loanbalance` (
  `memberID` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`memberID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanbalance`
--

INSERT INTO `loanbalance` (`memberID`, `balance`) VALUES
(4, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `loanrepayment`
--

CREATE TABLE IF NOT EXISTS `loanrepayment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberID` int(10) NOT NULL,
  `loanID` varchar(100) NOT NULL,
  `month` int(10) NOT NULL,
  `interest` double NOT NULL,
  `monthlyPrincipal` double NOT NULL,
  `monthlyPayment` double NOT NULL,
  `loanBalance` double NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'unpaid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `loanrepayment`
--

INSERT INTO `loanrepayment` (`id`, `memberID`, `loanID`, `month`, `interest`, `monthlyPrincipal`, `monthlyPayment`, `loanBalance`, `status`) VALUES
(3, 4, '5b27636ef1c2a ', 1, 600, 5000, 5600, 5000, 'unpaid'),
(4, 4, '5b27636ef1c2a ', 2, 300, 5000, 5300, 0, 'unpaid'),
(5, 9, '5b4deb03812f9 ', 0, 600, 10000, 10600, 10000, 'unpaid'),
(6, 11, '5b5c19f1e20b1 ', 0, 60, 1000, 1060, 1000, 'unpaid'),
(7, 4, '5b508aef60804 ', 1, 60, 166.66666666667, 226.66666666667, 833.33333333333, 'unpaid'),
(8, 4, '5b508aef60804 ', 2, 50, 166.66666666667, 216.66666666667, 666.66666666667, 'unpaid'),
(9, 4, '5b508aef60804 ', 3, 40, 166.66666666667, 206.66666666667, 500, 'unpaid'),
(10, 4, '5b508aef60804 ', 4, 30, 166.66666666667, 196.66666666667, 333.33333333333, 'unpaid'),
(11, 4, '5b508aef60804 ', 5, 20, 166.66666666667, 186.66666666667, 166.66666666667, 'unpaid'),
(12, 4, '5b508aef60804 ', 6, 10, 166.66666666667, 176.66666666667, 0.00000000000017053025658242, 'unpaid'),
(13, 4, '5b508aef60804 ', 7, 0.000000000000010231815394945, 166.66666666667, 166.66666666667, -166.66666666667, 'unpaid'),
(14, 12, '5b5f7a6fdfab8 ', 1, 60, 500, 560, 500, 'unpaid'),
(15, 12, '5b5f7a6fdfab8 ', 2, 30, 500, 530, 0, 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
  `loanID` varchar(40) NOT NULL,
  `memberID` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `months` int(11) NOT NULL,
  `loantype` varchar(20) NOT NULL,
  `modeOfPayment` varchar(20) NOT NULL,
  `dueDate` date NOT NULL,
  `security` varchar(20) NOT NULL,
  `reason` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `applicationDate` datetime NOT NULL,
  PRIMARY KEY (`loanID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`loanID`, `memberID`, `name`, `amount`, `months`, `loantype`, `modeOfPayment`, `dueDate`, `security`, `reason`, `status`, `applicationDate`) VALUES
('5b27636ef1c2a', 4, 'kevin ongulu', 10000, 2, 'Normal Loan', 'Cash', '2018-08-18', 'Salary', 'pesa pap', 'disbursed', '2018-06-18 10:46:55'),
('5b2764c9b0c8a', 4, 'kevin ongulu', 100000, 9, 'Normal Loan', 'Cash', '2019-03-18', 'Salary', 'kusota brathee', 'disapprove', '2018-06-18 10:52:41'),
('5b3dd1c3a9c22', 6, 'guru titus', 599999, 2, 'Normal Loan', 'Cash', '2018-09-05', 'Salary', 'i need money to pay rent', 'disapprove', '2018-07-05 11:07:31'),
('5b3dd9ca0d15d', 4, 'kevin ongulu', 1000, 1, 'Normal Loan', 'Cash', '2018-08-05', 'Salary', 'emergency', 'disapprove', '2018-07-05 11:41:46'),
('5b3dd9ceaec70', 4, 'kevin ongulu', 1000, 1, 'Normal Loan', 'Cash', '2018-08-05', 'Salary', 'emergency', 'disapprove', '2018-07-05 11:41:50'),
('5b3dd9d2b30b4', 4, 'kevin ongulu', 1000, 1, 'Normal Loan', 'Cash', '2018-08-05', 'Salary', 'emergency', 'disapprove', '2018-07-05 11:41:54'),
('5b3ddbba68e85', 6, 'guru titus', 1000, 1, 'Emergency', 'Cash', '2018-08-05', 'Salary', 'medical bills', 'disapprove', '2018-07-05 11:50:02'),
('5b44a7a5afa1f', 4, 'kevin ongulu', 1000, 1, 'Normal Loan', 'Cash', '2018-08-10', 'Salary', 'lack of funds', 'disapprove', '2018-07-10 15:33:41'),
('5b4deb03812f9', 9, 'victor kipruto', 10000, 1, 'School Fee Loan', 'super', '2018-08-17', 'Other', 'sitaki ujinga', 'disbursed', '2018-07-17 16:11:31'),
('5b508aef60804', 4, 'kevin ongulu', 1000, 6, 'School Fee Loan', 'Cash', '2019-01-19', 'Salary', 'to pay for fees', 'disbursed', '2018-07-19 15:58:23'),
('5b5c17274a332', 11, 'joseph omondi', 1000, 5, 'Normal Loan', 'Cash', '2018-12-28', 'Salary', 'rttyuio', 'disapprove', '2018-07-28 10:11:35'),
('5b5c19f1e20b1', 11, 'joseph omondi', 1000, 1, 'Normal Loan', 'Cash', '2018-08-28', 'Salary', 'sdf', 'disbursed', '2018-07-28 10:23:29'),
('5b5f7a6fdfab8', 12, 'omondi bolton', 1000, 2, 'Normal Loan', 'Cash', '2018-09-30', 'Salary', 'for emergency\r\n', 'disbursed', '2018-07-30 23:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `loan_types`
--

CREATE TABLE IF NOT EXISTS `loan_types` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` int(100) NOT NULL,
  `interest_rate` double NOT NULL,
  `minimum_amount` double NOT NULL,
  `maximum_amount` double NOT NULL,
  `no_of_guarantors` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `memberID` int(10) NOT NULL AUTO_INCREMENT,
  `surname` varchar(50) NOT NULL,
  `othernames` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `idno` varchar(50) NOT NULL,
  `mobilenumber` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT 'male',
  `joinDate` datetime NOT NULL DEFAULT '2018-07-03 17:30:12',
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`memberID`),
  FULLTEXT KEY `address` (`address`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`memberID`, `surname`, `othernames`, `dob`, `idno`, `mobilenumber`, `email`, `address`, `gender`, `joinDate`, `username`, `password`) VALUES
(1, 'valarie', 'achiengo', '1995-12-07', '3256748935', '0733333333', 'valaryachieng@gmail.com', 'p.o box 7899', 'female', '0000-00-00 00:00:00', 'valary', '168cc3a8722d32a189807c7bbe9516ef'),
(2, 'uhuru', 'muigai', '0000-00-00', '4444444444', '0734434435', 'uhurukenyatta@gmail.com', 'p.o box 7456', 'male', '0000-00-00 00:00:00', 'uhuru', '168cc3a8722d32a189807c7bbe9516ef'),
(3, 'kirui', 'kipkemoi', '0000-00-00', '324354', '0736235657', 'kiruikipkemoi@gmail.com', 'p.o box4567', 'male', '0000-00-00 00:00:00', 'kirui', '168cc3a8722d32a189807c7bbe9516ef'),
(4, 'kevin', 'ongulu', '1990-09-08', '3246776348', '07138870703', 'kevinkorobost@gmail.com', 'p.o  box 21', 'male', '2018-07-08 06:15:16', 'kevin', '168cc3a8722d32a189807c7bbe9516ef'),
(5, 'omushibo', 'joseph', '1989-09-08', '2745908769', '0704678909', 'kevinongulu@gmail.com', 'p.o box khwisero', 'male', '0000-00-00 00:00:00', 'omushibo', '168cc3a8722d32a189807c7bbe9516ef'),
(6, 'guru', 'titus', '1964-08-09', '2346789675', '0767734787', 'i.kevin@students.ku.ac.ke', 'p.o box khwisero', 'male', '2018-07-02 00:00:00', 'guru', '168cc3a8722d32a189807c7bbe9516ef'),
(7, 'mary', 'joseph', '1970-12-17', '3455565652', '0767734787', 'wanguikari@gmail.com', 'p.o box vihiga', 'female', '2018-07-01 00:00:00', 'kevin', '168cc3a8722d32a189807c7bbe9516ef'),
(9, 'victor', 'kipruto', '2018-06-13', '324124900', '07123567767', 'kiprutovictor@gmail.com', 'p.o box 7456', 'male', '2018-06-13 16:13:30', 'victor', '168cc3a8722d32a189807c7bbe9516ef'),
(10, 'shitela', 'electine', '1978-08-06', '26789089', '0728268443', 'electineshitela@gmail.com', 'p.o box nairobi', 'female', '2018-07-03 17:30:12', 'shitela', '168cc3a8722d32a189807c7bbe9516ef'),
(11, 'joseph', 'omondi', '1989-07-09', '2978432556', '0713888888', 'josephkimondi@gmail.com', 'p.o box 7456', 'male', '2018-07-03 17:30:12', 'joseph', '2f889606e5bca5ac275e731b63e9a51a'),
(12, 'omondi', 'bolton', '2018-07-28', '32457769', '0713887070', 'omondibolton@gmail.com', 'p.o box vihiga', 'male', '2018-07-03 17:30:12', 'omondi', 'c65d33237dc2ab50332e8791b4b885bb');

-- --------------------------------------------------------

--
-- Table structure for table `mpesaapi`
--

CREATE TABLE IF NOT EXISTS `mpesaapi` (
  `Auto` int(255) NOT NULL AUTO_INCREMENT,
  `TransactionType` varchar(40) DEFAULT NULL,
  `TransID` varchar(40) DEFAULT NULL,
  `TransTime` varchar(40) DEFAULT NULL,
  `TransAmount` double DEFAULT NULL,
  `BusinessShortCode` varchar(15) DEFAULT NULL,
  `BillRefNumber` varchar(40) DEFAULT NULL,
  `InvoiceNumber` varchar(40) DEFAULT NULL,
  `ThirdPartyTransID` varchar(40) DEFAULT NULL,
  `MSISDN` varchar(20) DEFAULT NULL,
  `FirstName` varchar(60) DEFAULT NULL,
  `MiddleName` varchar(60) DEFAULT NULL,
  `LastName` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Auto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nextofkin`
--

CREATE TABLE IF NOT EXISTS `nextofkin` (
  `memberID` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `relationship` varchar(10) NOT NULL,
  `dateofinsert` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nextofkin`
--

INSERT INTO `nextofkin` (`memberID`, `name`, `dob`, `address`, `relationship`, `dateofinsert`, `id`) VALUES
('4', 'korobosta', '1998-08-09', 'p.o box vihiga', 'son', '2018-07-24 15:21:09', 4),
('4', 'kdf', '2018-07-11', 'p.o box kisumu', 'DAUGHTER', '2018-07-24 15:21:09', 5),
('11', 'kevo junior', '1990-01-07', 'p.o box 43', 'son', '2018-07-27 23:49:03', 6),
('12', 'KEVIN INDECHE', '2018-07-18', 'p.o  box 21', 'son', '2018-07-30 20:55:19', 7);

-- --------------------------------------------------------

--
-- Table structure for table `savings`
--

CREATE TABLE IF NOT EXISTS `savings` (
  `savingsID` varchar(100) NOT NULL,
  `memberID` int(10) NOT NULL,
  `amount` int(50) NOT NULL,
  `paymentmethod` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `accountNumber` int(20) DEFAULT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`savingsID`),
  UNIQUE KEY `savingsID` (`savingsID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savings`
--

INSERT INTO `savings` (`savingsID`, `memberID`, `amount`, `paymentmethod`, `date`, `phone`, `accountNumber`, `time`) VALUES
('10', 4, 3456, 'CASH', '2018-07-12', NULL, NULL, '03:58:00'),
('1531390001', 4, 2500, 'CASH', '2018-07-12', NULL, NULL, '14:56:00'),
('1531390031', 1, 3567, 'CASH', '2018-07-03', NULL, NULL, '03:56:00'),
('1532804757', 3, 400, 'CASH', '0000-00-00', NULL, NULL, '06:07:00'),
('ME3CX4545', 1, 238, 'BANK', '2018-07-12', '0787303099', NULL, '16:46:00'),
('ME3CX457', 2, 100, 'BANK', '2018-07-12', '0787303099', NULL, '10:09:00'),
('REF2453355', 2, 400, 'MPESA', '2018-07-11', NULL, 178997654, '12:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `occupation` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `idno` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `doe` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `occupation`, `address`, `phone`, `idno`, `dob`, `doe`, `username`, `password`) VALUES
(1, 'kevin ongulu', 'kevinongulu@gmail.com', 'management', 'p.o box 31', '0713887070', '324143456', '1990-09-08', '2018-06-18', 'KEVIN', '77f6831f766be75b4da32abc0b6c975d'),
(3, 'Ambrose Jagongo', 'ambrosejagongo@gmail.com', 'accountant', 'p.o box 3456-00100 nairobi', '0704233355', '56787854', '1970-07-10', '2018-07-10', 'ambrose', '9f24b96907198db20b902e481e6c3108'),
(4, 'KEVIN INDECHE', 'kevinindeche@gmail.com', 'admin', 'p.o box 67', '0713887070', '32456789', '1990-03-09', '2018-07-10', 'admin', 'a95e542fe988abac32ffe5c87a615820');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE IF NOT EXISTS `withdrawals` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `memberID` int(20) NOT NULL,
  `paymentMode` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `memberID`, `paymentMode`, `amount`, `date`, `time`) VALUES
(1, 12, 'mpesa', 100, '2018-07-30', '00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
