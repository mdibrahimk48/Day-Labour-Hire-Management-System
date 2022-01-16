# Day-Labour-Hire-Management-System
Web based system for hiring and managing day laborer for run business in online platform.


-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2018 at 05:15 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dlh_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_no` int(11) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `phone_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_no`, `feedback`, `phone_no`) VALUES
(1, 'By using this site people can get the right skilled labourer, in the right place, at the right time and for the right price. This is very useful for Dhaka city.', '01838300998'),
(2, 'Day Labour Hire company helps me lot for hiring single worker for my household work. Their worker was very qualityful.', '01737328917'),
(5, 'Day Labour Hire company helps me lot for hiring single worker for my household work. Their worker was very qualityful.', '01838300999');

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE `hire` (
  `hno` int(11) NOT NULL,
  `sno` int(11) NOT NULL,
  `phone_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire`
--

INSERT INTO `hire` (`hno`, `sno`, `phone_no`) VALUES
(1, 1, '01838300998'),
(2, 3, '01838300998'),
(3, 8, '01737328917');

-- --------------------------------------------------------

--
-- Table structure for table `labour`
--

CREATE TABLE `labour` (
  `lid` int(11) NOT NULL,
  `l_type` varchar(18) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  `post_code` varchar(30) NOT NULL,
  `l_image` varchar(500) NOT NULL,
  `hourly_rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labour`
--

INSERT INTO `labour` (`lid`, `l_type`, `l_name`, `gender`, `age`, `email`, `phone_no`, `address`, `post_code`, `l_image`, `hourly_rate`) VALUES
(1, 'Electrician', 'Rahim', 'Male', 25, 'rahim@gmail.com', '01838300000', '51/7, West Bazaar, Dhaka', '1215', 'image/Electrician4.jpg', 200),
(2, 'Plumber', 'Karim', 'Male', 40, 'karim@gmail.com', '01737328000', '65/C, Savar, Dhaka.', '1212', 'image/Plumber2.jpg', 150),
(3, 'Electrician', 'Jolil', 'Male', 28, 'jolil@gmail.com', '01838300888', '91/1/1, Mirpur', '1210', 'image/Electrician1.jpg', 200),
(4, 'Plumber', 'Sobuj', 'Male', 29, 'sobuj@gmail.com', '01737328915', '91/1/1, Dhanmondi', '1215', 'image/Electrician7.jpg', 150),
(5, 'Plumber', 'Abdul Jakir', 'Male', 30, 'jakir@gmail.com', '01737328911', 'Savar, Dhaka.', '1212', 'image/Electrician3.jpg', 200),
(6, 'Electrician', 'Akter Khan', 'Male', 40, 'akterkhan@gmail.com', '01980567437', 'Firmgate', '1215', 'image/Plumber6.jpg', 250),
(7, 'Electrician', 'Mahbub Rahman', 'Male', 22, 'mahbub@gmail.com', '01719863215', 'Agargoan, Dhaka.', '1216', 'image/Electrician5.jpg', 200);

-- --------------------------------------------------------

--
-- Table structure for table `others_required`
--

CREATE TABLE `others_required` (
  `serial_no` int(11) NOT NULL,
  `labour_type` varchar(50) NOT NULL,
  `place` varchar(300) NOT NULL,
  `quantity` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` varchar(500) NOT NULL,
  `phone_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `others_required`
--

INSERT INTO `others_required` (`serial_no`, `labour_type`, `place`, `quantity`, `date`, `time`, `description`, `phone_no`) VALUES
(1, 'Cleaner', 'Gulsan', 3, '2018-01-30', '00:00:00', 'I Need A Cleaner In This Date And In This Place.', '01838300998'),
(3, 'Painter', 'Dhanmondi', 2, '2018-02-01', '10:00:00', 'I need a two painter in this following date.', '01737328917'),
(6, 'Wood Worker', 'Motijhil', 2, '2018-02-01', '08:00:00', 'I need 2 wood workers for my household work in this date.', '01838300999');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sno` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `available_place` varchar(300) NOT NULL,
  `available_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sno`, `lid`, `available_place`, `available_date`, `start_time`, `end_time`, `status`) VALUES
(1, 1, 'Dhanmondi', '2018-01-28', '12:00:00', '17:00:00', 'hired'),
(2, 3, 'Mirpur', '2018-01-28', '11:00:00', '18:00:00', ''),
(3, 5, 'Savar', '2018-01-29', '08:00:00', '13:00:00', 'hired'),
(4, 7, 'Panthapath', '2018-01-31', '08:00:00', '16:00:00', ''),
(5, 2, 'Dhanmondi', '2018-01-31', '10:00:00', '16:00:00', ''),
(6, 4, 'Savar', '2018-02-01', '10:00:00', '18:00:00', ''),
(7, 3, 'Mirpur', '2018-02-02', '10:00:00', '20:00:00', ''),
(8, 1, 'Uttora', '2018-01-31', '07:00:00', '17:00:00', 'hired'),
(9, 5, 'Gulsan', '2018-02-03', '08:00:00', '18:00:00', ''),
(10, 6, 'Kalabagan', '2018-01-31', '08:00:00', '18:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(30) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `nid` varchar(18) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `post_code` varchar(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `attempt` int(15) NOT NULL,
  `timestamp` int(15) NOT NULL,
  `usertype` varchar(30) NOT NULL,
  `password` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `occupation`, `nid`, `email`, `phone_no`, `address`, `post_code`, `gender`, `attempt`, `timestamp`, `usertype`, `password`) VALUES
('Hasan Ali', 'Businessman', '19948112342156789', 'hasan@gmail.com', '01700017839', 'Mirpur, Dhaka.', '1214', 'Male', 0, 0, 'user', 123456),
('Ibrahim', 'Developer', '199681125625355768', '1000100@daffodil.ac', '01737328916', '94,1,1 West Razabazar', '1215', 'Male', 0, 0, 'admin', 123456),
('Nahid', 'Engineer ', '12345678901234567', 'nahid@gmail.com', '01737328917', '91/1/1, West Raza bazar', '1234', 'Male', 0, 0, 'user', 123456),
('Jihad', 'Developer', '19968112349856789', 'jihad@yahoo.com', '01838300997', 'Dhaka', '1215', 'Male', 0, 0, 'user', 123456),
('Test User', 'Businessman', '19981234567898765', 'test@gmail.com', '01838300998', '91/1/1, Dhanmondi.', '1215', 'Male', 0, 0, 'user', 123456),
('Akash Khan', 'IT Officer', '19948112342156789', 'akashkhan@gmail.com', '01838300999', 'Dhaka', '1215', 'Male', 0, 0, 'user', 123456);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_no`),
  ADD KEY `phone_no` (`phone_no`);

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`hno`),
  ADD KEY `sno` (`sno`),
  ADD KEY `phone_no` (`phone_no`);

--
-- Indexes for table `labour`
--
ALTER TABLE `labour`
  ADD PRIMARY KEY (`lid`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- Indexes for table `others_required`
--
ALTER TABLE `others_required`
  ADD PRIMARY KEY (`serial_no`),
  ADD KEY `phone_no` (`phone_no`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`sno`),
  ADD KEY `lid` (`lid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`phone_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hire`
--
ALTER TABLE `hire`
  MODIFY `hno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `labour`
--
ALTER TABLE `labour`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `others_required`
--
ALTER TABLE `others_required`
  MODIFY `serial_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`phone_no`) REFERENCES `user` (`phone_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hire`
--
ALTER TABLE `hire`
  ADD CONSTRAINT `hire_ibfk_1` FOREIGN KEY (`sno`) REFERENCES `schedule` (`sno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hire_ibfk_2` FOREIGN KEY (`phone_no`) REFERENCES `user` (`phone_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `others_required`
--
ALTER TABLE `others_required`
  ADD CONSTRAINT `others_required_ibfk_1` FOREIGN KEY (`phone_no`) REFERENCES `user` (`phone_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `labour` (`lid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
