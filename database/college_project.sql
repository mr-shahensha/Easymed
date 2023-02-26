-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 02:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `sid` int(255) NOT NULL,
  `docpostid` varchar(255) NOT NULL,
  `doc_id` varchar(255) NOT NULL,
  `cust_id` varchar(255) NOT NULL,
  `bookingdate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `canceldate` varchar(255) NOT NULL DEFAULT 'not cancelled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`sid`, `docpostid`, `doc_id`, `cust_id`, `bookingdate`, `status`, `canceldate`) VALUES
(1, '1', '9876543210', '1234567890', '07/06/2022', '50', '07/06/2022'),
(2, '1', '9876543210', '1234567890', '07/06/2022', '0', 'not cancelled'),
(3, '1', '9876543210', '1234567890', '07/06/2022', '0', 'not cancelled'),
(4, '1', '9876543210', '1234567890', '07/06/2022', '50', '07/06/2022'),
(5, '1', '9876543210', '1234567890', '07/06/2022', '50', '07/06/2022'),
(6, '1', '9876543210', '1234567890', '07/06/2022', '50', '07/06/2022'),
(7, '1', '9876543210', '1234567890', '07/06/2022', '50', '07/06/2022'),
(8, '', '9876543210', '1234567890', '12/06/2022', '0', 'not cancelled'),
(9, '3', '9876543210', '1234567890', '12/06/2022', '10', 'not cancelled'),
(10, '', '9876543210', '1234567890', '12/06/2022', '0', 'not cancelled'),
(11, '4', '9876543210', '1234567890', '12/06/2022', '0', 'not cancelled'),
(12, '4', '9876543210', '1234567890', '12/06/2022', '0', 'not cancelled'),
(13, '', '9876543210', '1234567890', '12/06/2022', '0', 'not cancelled'),
(14, 'a87ff679a2f3e71d9181a67b7542122c', '9876543210', '1234567890', '12/06/2022', '0', 'not cancelled'),
(15, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '9876543210', '1234567890', '12/06/2022', '50', '12/06/2022'),
(16, '5', '7410852963', '1234567890', '19/06/2022', '0', 'not cancelled'),
(17, '4', '9876543210', '1234567890', '19/06/2022', '0', 'not cancelled'),
(18, '5', '7410852963', '1234567890', '19/06/2022', '10', 'not cancelled'),
(19, '2', '9876543210', '1234567890', '19/06/2022', '0', 'not cancelled'),
(20, '2', '9876543210', '1234567890', '19/06/2022', '0', 'not cancelled'),
(21, '5', '7410852963', '9733904861', '21/06/2022', '0', 'not cancelled'),
(22, '6', '9735322614', '9733904861', '21/06/2022', '0', 'not cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `sid` int(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`sid`, `city`) VALUES
(1, 'kolkata');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `sid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`sid`, `name`, `number`, `email`, `city`, `joining_date`) VALUES
(1, 'Sahin', '1234567890', '', '', '05/06/2022'),
(2, 'asif laskar', '9733904861', 'okby@gmail.com', 'kolkata', '21/06/2022');

-- --------------------------------------------------------

--
-- Table structure for table `doccat`
--

CREATE TABLE `doccat` (
  `sid` int(255) NOT NULL,
  `cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doccat`
--

INSERT INTO `doccat` (`sid`, `cat`) VALUES
(2, 'heart');

-- --------------------------------------------------------

--
-- Table structure for table `docpost`
--

CREATE TABLE `docpost` (
  `sid` int(255) NOT NULL,
  `docid` varchar(255) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `spaddress` varchar(255) NOT NULL,
  `mediname` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `docpost`
--

INSERT INTO `docpost` (`sid`, `docid`, `cat`, `city`, `spaddress`, `mediname`, `fees`, `status`, `date`) VALUES
(1, '9876543210', 'heart', 'kolkata', 'goria', 'rk store', '129', '1', '07/06/2022'),
(2, '9876543210', 'heart', 'kolkata', 'goria', 'rk store', '129', '0', '12/06/2022'),
(3, '9876543210', 'heart', 'kolkata', 'goria', 'rk store', '129', '0', '12/06/2022'),
(4, '9876543210', 'heart', 'kolkata', 'goria', 'harasit store', '299', '0', '12/06/2022'),
(5, '7410852963', '', 'kolkata', 'sonarpur', 'mohednra health', '399', '0', '19/06/2022'),
(6, '9735322614', '', 'kolkata', 'jaynagar', 'abhinaba xyz', '699', '0', '21/06/2022');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `sid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cat` varchar(255) NOT NULL DEFAULT 'null',
  `city` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL DEFAULT 'null',
  `expe` varchar(255) NOT NULL DEFAULT 'null',
  `fees` varchar(255) NOT NULL DEFAULT 'null',
  `joining_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`sid`, `name`, `number`, `email`, `cat`, `city`, `about`, `expe`, `fees`, `joining_date`) VALUES
(1, 'prity', '9876543210', 'p@g.com', 'heart', 'kolkata', 'i am prity', '5yrs', '299', '05/06/2022'),
(2, 'rajesh sorkar', '7410852963', '', 'heart', 'kolkata', 'hii i am rajesh', '8yr', '399', '19/06/2022'),
(3, 'abhinaba mukharjee', '9735322614', 'ddd@g.com', '', 'kolkata', '', '', '', '21/06/2022');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `sid` int(255) NOT NULL,
  `lvl` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastlogin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`sid`, `lvl`, `name`, `number`, `password`, `lastlogin`) VALUES
(1, '5', 'Sahin', '1234567890', '1234567890', '22/06/2022 05:51:44 pm'),
(2, '100', 'prity', '9876543210', '9876543210', '22/06/2022 05:50:13 pm'),
(3, '0', 'raja', '00000', '000000', '22/06/2022 05:50:42 pm'),
(4, '100', 'rajesh sorkar', '7410852963', '7410852963', '22/06/2022 05:51:02 pm'),
(5, '5', 'asif laskar', '9733904861', '9733904861', '21/06/2022 06:19:34 pm'),
(6, '100', 'abhinaba mukharjee', '9735322614', '9735322614', '21/06/2022 06:22:36 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `doccat`
--
ALTER TABLE `doccat`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `docpost`
--
ALTER TABLE `docpost`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doccat`
--
ALTER TABLE `doccat`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `docpost`
--
ALTER TABLE `docpost`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `sid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
