-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2023 at 11:53 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scholarship`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
`actId` int(11) NOT NULL,
  `actName` text NOT NULL,
  `actDate` varchar(20) NOT NULL,
  `date_added` varchar(20) NOT NULL,
  `haveRead` int(11) DEFAULT '0' COMMENT '0=Unread, 1=read'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`actId`, `actName`, `actDate`, `date_added`, `haveRead`) VALUES
(2, 'Activity 5', '2022-12-23', '', 0),
(3, 'Activity 3', '2022-12-10', '2022-12-11', 0),
(4, 'Activity 2', '2022-12-11', '2022-12-11', 0),
(5, 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem, ipsum delectus voluptatum? Molestias aut inventore eaque, maxime numquam dignissimos asperiores, voluptatibus consectetur distinctio excepturi odit architecto, saepe enim sunt, molestiae.', '2022-12-11', '2022-12-11', 0),
(6, 'sample', '2022-12-27', '2022-12-27', 0),
(8, 'gfdgfd', '2023-01-06', '2022-12-27', 0),
(9, 'test123', '2023-01-17', '2023-01-17', 0),
(10, 'tggdfg', '2023-01-16', '2023-01-17', 0),
(11, 'gfdgdfetertertret', '2023-01-18', '2023-01-17', 0),
(12, 'tesmplt', '2023-01-11', '2023-01-18', 0),
(14, 'gfdgd', '2023-01-02', '2023-01-18', 0),
(15, 'fdgfdgfd', '2023-01-18', '2023-01-18', 0),
(16, 'fdsfs', '2023-01-19', '2023-01-19', 0),
(17, 'hfhfghfg', '2023-01-19', '2023-01-19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attachedfiles`
--

CREATE TABLE IF NOT EXISTS `attachedfiles` (
`attachId` int(11) NOT NULL,
  `requestedby` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `fileType` varchar(255) NOT NULL,
  `fileSize` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `attachedfiles`
--

INSERT INTO `attachedfiles` (`attachId`, `requestedby`, `file`, `fileType`, `fileSize`, `date_added`) VALUES
(6, 67, '61074-brgy-bugs-new.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '2023-01-17'),
(7, 67, '36835-wp4813161-simple-minimalist-wallpapers.jpg', 'image/jpeg', '', '2023-01-17'),
(8, 67, '1643-4297150.jpg', 'image/jpeg', '', '2023-01-18'),
(9, 67, '88332-brgy-bugs-new.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '2023-01-18');

-- --------------------------------------------------------

--
-- Table structure for table `customization`
--

CREATE TABLE IF NOT EXISTS `customization` (
`customID` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` varchar(150) NOT NULL DEFAULT 'Inactive',
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `customization`
--

INSERT INTO `customization` (`customID`, `picture`, `status`, `date_added`) VALUES
(10, 'wallpaperflare.com_wallpaper.jpg', 'Active', '2022-11-27'),
(11, 'bgNew.jpg', 'Inactive', '2022-11-27'),
(18, '18.jpg', 'Inactive', '2022-11-27'),
(19, '2.jpg', 'Inactive', '2022-12-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_Id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civilstatus` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `schoolName` varchar(255) NOT NULL,
  `schoolAddress` text NOT NULL,
  `studentStatus` varchar(50) NOT NULL,
  `yearLevel` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'User',
  `user_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=Pending, 1=Verified',
  `verification_code` int(11) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `dob`, `age`, `email`, `contact`, `birthplace`, `gender`, `civilstatus`, `occupation`, `religion`, `house_no`, `street_name`, `purok`, `zone`, `barangay`, `municipality`, `province`, `region`, `schoolName`, `schoolAddress`, `studentStatus`, `yearLevel`, `image`, `password`, `user_type`, `user_status`, `verification_code`, `date_registered`) VALUES
(66, 'Erwin', 'Cabag', 'Son', '', '1997-09-22', '25 years old', 'admin@gmail.com', '9359428963', 'Poblacion, Medellin, Cebu', 'Male', 'Married', 'Web developer', 'Bible Baptist Church', '1234ffd', 'Sitio Upper Landing', 'Purok San Isidro', 'Ambot', 'Daanlungsod', 'Medellin', '', 'VII', '', '', '0', '0', '3.jpg', 'admin123', 'Admin', 1, 374025, '2022-11-25'),
(67, 'SAMPLEfdgdfgdgdgfdgdf', 'd', 'd', 'g', '2016-03-09', '6 years old', 'sonerwin12@gmail.com', '9123456789', 'dsa', 'Male', 'Married', 'fdsf', 'Bible Baptist Church', 'fdsfgdf', 'dsf', 'fdsf', 'fdsf', 'dsfsd', 'fdsf', '', 'fds', '', '', '0', '0', '12.jpg', 'admin123', 'Staff', 1, 824301, '2022-11-25'),
(72, 'Samplefh updated', 'gfdgfd', 'gdfgd', 'g', '2022-12-21', '5 days old', 'Norlyngelig16@gmail.com', '9359428963', 'gfdgfdg', 'Male', 'Married', 'gfdgfdgd', 'Buddhist', 'gfdg', 'fdg', 'gdfgdg', 'gfdg', 'dfgd', 'fdgdg', 'fdg', 'dfg', '', '', '0', '0', '12.jpg', 'qwe123!@#', 'User', 1, 0, '2022-12-27'),
(73, 'Norlyn', 'Son', 'Gelig', '', '2022-12-15', '1 week old', 'Norlynfdsfdgelig16@gmail.com', '9359428963', 'ewf', 'Male', 'Married', 'f', 'Methodist', 'gfd', 'gdfgd', 'gdfgdg', 'fdgd', 'gdf', 'gdgfdgdfgdfgd', '', 'hgfhgfhfgghf', 'ss', 'ss', 'ss', 'ss', '4.jpg', 'admin123', 'User', 1, 0, '2022-12-27'),
(74, 'gfdgfdgdg', 'dfgd', 'gdgdfg', 'dfgdf', '2022-12-15', '1 week old', 'gfdgdg232df@gmail.com', '9359428963', 'gfdg', 'Male', 'Single', 'gfdgdfg', 'Evangelical Christianity', 'gfdgg', 'fdgfdgd', 'gdf', 'gfdgfd', 'gdf', 'gfdgd', 'gdfgd', 'gdf', '', '', '0', '0', '14.jpg', 'admin123', 'User', 1, 0, '2022-12-27'),
(75, 'Norlyn', 'Son', 'Gelig', '', '2022-12-15', '1 week old', 'sonerwin1d2@gmail.com', '9359428963', 'gfdgfd', 'Male', 'Separated', 'gfdgd', 'Evangelical Christianity', 'gfdg', 'dfgdg', 'df', 'gfdg', 'fdgd', 'gfdgdfg', 'Cebu', 'gfd', '', '', '0', '0', '17.jpg', 'admin123', 'User', 1, 0, '2022-12-27'),
(76, 'Sample name', 'Sample name', 'Sample name', '', '2020-01-30', '2 years old', 'admiSampleamen@gmail.com', '9132456789', 'Sample name', 'Male', 'Single', 'Sample name', 'Hindu', 'Sample name', 'Sample name', 'Sample name', 'Sample name', 'Sample name', 'Sample name', 'Sample name', 'Sample name', '', '', '0', '0', '2.jpg', 'admin123', 'User', 1, 0, '2023-01-18'),
(77, 'xampfd', 'xamp', 'xamp', '', '2023-01-16', '1 week old', 'admxampin@gmail.com', '9132456789', 'xamp', 'Male', 'Single', 'xamp', 'Judaism', 'xamp', 'xamp', 'xamp', 'xamp', 'xamp', 'xamp', 'xamp', 'xamp', 'xamp', 'xamp', 'Transferee', '3rd Year', '3.jpg', 'admin123', 'User', 0, 0, '2023-01-23'),
(78, 'xampxampxamp', 'xampxamp', 'xampxamp', 'xamp', '2023-01-18', '5 days old', 'adminxampxamp@gmail.com', '9132456789', 'xampxamp', 'Male', 'Single', 'xampxamp', 'Methodist', 'xampxamp', 'xampxamp', 'xampxamp', 'xampxamp', 'xampxamp', 'xampxamp', 'xampxamp', 'xampxamp', 'xampxampxamp', 'xampxamp', 'New', '2nd Year', '13.jpg', 'admin123', 'User', 0, 0, '2023-01-23'),
(79, 'House No', 'House No', 'House No', '', '2023-01-09', '2 weeks old', 'adHouseNo.min@gmail.com', '9132456789', 'House No.', 'Male', 'Single', 'House No.', 'Buddhist', 'House No.', 'House No.House No.', 'House No.', 'House No.', 'House No.', 'House No.House No.', 'House No.', 'House No.', 'House No.1213', 'House No.fdfd', 'Old', '3rd Year', '13.jpg', 'admin123', 'User', 0, 0, '2023-01-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
 ADD PRIMARY KEY (`actId`);

--
-- Indexes for table `attachedfiles`
--
ALTER TABLE `attachedfiles`
 ADD PRIMARY KEY (`attachId`);

--
-- Indexes for table `customization`
--
ALTER TABLE `customization`
 ADD PRIMARY KEY (`customID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
MODIFY `actId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `attachedfiles`
--
ALTER TABLE `attachedfiles`
MODIFY `attachId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `customization`
--
ALTER TABLE `customization`
MODIFY `customID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=80;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
