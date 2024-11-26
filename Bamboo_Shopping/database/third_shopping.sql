-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2021 at 10:57 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `third_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `secret_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `secret_code`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3 ', '3f797146ab1d33c286b5b3c88240244b');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Juice'),
(2, 'Powder');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `uname` varchar(30) NOT NULL,
  `requirement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`uname`, `requirement`) VALUES
('san', 'good'),
('gopi', 'good product'),
('mathesh', 'good to buy');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `star1` int(11) NOT NULL,
  `star2` int(11) NOT NULL,
  `star3` int(11) NOT NULL,
  `star4` int(11) NOT NULL,
  `star5` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `catid`, `product`, `price`, `quantity`, `product_image`, `star1`, `star2`, `star3`, `star4`, `star5`, `rating`) VALUES
(1, 1, 'Herbal Orange', 2730, 69, '1.jpg', 0, 0, 0, 0, 0, 0),
(2, 1, 'Aloe vera', 3700, 370, '2.jpg', 0, 0, 0, 0, 0, 0),
(3, 2, 'Multi Product', 4000, 46, '3.jpg', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `pid` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `review` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_review`
--


-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pincode` bigint(20) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `acc_no` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `secret_code` varchar(50) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `rdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `gender`, `address`, `pincode`, `contact`, `email`, `bank_name`, `acc_no`, `username`, `password`, `secret_code`, `otp`, `rdate`) VALUES
(1, 'math', 'Male', 'BHEL', 987654, 9876543210, 'math@gmail.com', 'SBI', '998877665544', 'math', '7e676e9e663beb40fd133f5ee24487c2', '', '', '2018-12-26'),
(2, 'San', 'Male', 'Trichy', 620111, 9976570006, 'san@gmail.com', 'SBI', '2233445566', 'san', '9f5a44a734ac9e43b5968d0f3b71d69b', '', '1085', '2018-12-31'),
(3, 'gopinath', 'Male', 'trichy', 639115, 9159622523, 'gethugopi3421@gmail.com', 'Canera', '1263101017028', 'gopi', '698d51a19d8a121ce581499d7b701668', '', '8258', '2019-12-03'),
(4, 'mathesh', 'Male', 'trichy', 4333356, 9790530960, 'm@gmail.com', 'IOB', '2143556', 'mathesh', '81dc9bdb52d04dc20036dbd8313ed055', '', '6119', '2020-03-12'),
(5, 'VINI', 'Female', 'mklm', 784585, 95665558, 'TV@GMAIL.COM', 'IOB', '3654153641', 'vini', '81dc9bdb52d04dc20036dbd8313ed055', '', '3768', '2021-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `user_purchase`
--

CREATE TABLE `user_purchase` (
  `id` int(11) NOT NULL auto_increment,
  `catergory` varchar(25) NOT NULL,
  `pname` varchar(25) NOT NULL,
  `author` varchar(30) NOT NULL,
  `price` int(55) NOT NULL,
  `uqut` int(55) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `pid` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `rdate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `day1` int(11) NOT NULL,
  `month1` varchar(10) NOT NULL,
  `year1` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `user_purchase`
--

INSERT INTO `user_purchase` (`id`, `catergory`, `pname`, `author`, `price`, `uqut`, `uname`, `pid`, `nid`, `rdate`, `status`, `day1`, `month1`, `year1`) VALUES
(20, '2', 'Multi Product', '', 4000, 2, 'vini', 1, 3, '2021-02-19 15:38:10', 1, 19, 'Feb', 2021),
(21, '1', 'Aloe vera', '', 3700, 3, 'vini', 1, 2, '2021-02-19 15:38:10', 1, 19, 'Feb', 2021),
(22, '1', 'Aloe vera', '', 3700, 3, 'vini', 1, 2, '2021-02-19 15:40:14', 2, 19, 'Feb', 2021),
(23, '2', 'Multi Product', '', 4000, 2, 'vini', 2, 3, '2021-03-02 17:00:48', 2, 2, 'Mar', 2021),
(24, '1', 'Herbal Orange', '', 2730, 4, 'vini', 3, 1, '2021-03-09 17:19:11', 0, 9, 'Mar', 2021);
