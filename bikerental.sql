-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 06:47 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikerental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `a_email` varchar(30) NOT NULL,
  `a_password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_email`, `a_password`) VALUES
(1, 'admin1234@gmail.com', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `o_Id` int(10) NOT NULL,
  `u_Id` int(10) NOT NULL,
  `v_id` int(10) NOT NULL,
  `rent_period` int(100) NOT NULL,
  `total_rent` int(100) NOT NULL,
  `pay_status` varchar(100) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`o_Id`, `u_Id`, `v_id`, `rent_period`, `total_rent`, `pay_status`, `start_date`, `end_date`) VALUES
(65, 34, 4, 19, 15200, 'pending', '2021-04-02', '2021-04-21'),
(2, 16, 3, 3, 1800, 'pending', '2021-04-04', '2021-04-07'),
(3, 16, 3, 3, 1800, 'pending', '2021-04-04', '2021-04-07'),
(4, 16, 3, 2, 1200, 'pending', '2021-04-04', '2021-04-06'),
(5, 16, 3, 3, 1800, 'pending', '2021-04-04', '2021-04-07'),
(6, 16, 3, 3, 1800, 'pending', '2021-04-04', '2021-04-07'),
(7, 16, 3, 3, 1800, 'pending', '2021-04-04', '2021-04-07'),
(8, 16, 3, 3, 1800, 'pending', '2021-04-04', '2021-04-07'),
(9, 16, 3, 3, 1800, 'pending', '2021-04-04', '2021-04-07'),
(10, 16, 3, 3, 1800, 'pending', '2021-04-04', '2021-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_Id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `addhar` varchar(20) NOT NULL,
  `age` varchar(11) NOT NULL,
  `city` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `drvng_lic_no` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_Id`, `first_name`, `last_name`, `email`, `contact`, `addhar`, `age`, `city`, `password`, `drvng_lic_no`) VALUES
(37, 'Pankaj', 'Vishwakarma', 'vishwakarmapankaj006@gmail.com', '9892712830', '897456123', '23', 'Goa', '123456', 'MH4875962458'),
(36, 'Shephali', 'Patil', 'patilshephali@gmail.com', '8788218107', '1234568971', '20', 'Delhi', '12345', 'MH48720980'),
(35, 'Sheetal', 'Gupta', 'guptasheetal@gmail.com', '9960087138', '123587941', '19', 'Mumbai', '1234', 'MH-487963548'),
(34, 'Demo', 'Test', 'demotest@gmail.com', '8793158055', '4587962348', '25', 'Mumbai', '1234', 'MH48259874');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `v_id` int(10) NOT NULL,
  `v_type` int(11) DEFAULT NULL,
  `brand` varchar(300) NOT NULL,
  `model` varchar(200) NOT NULL,
  `model_year` int(200) NOT NULL,
  `rent_amt` decimal(65,2) NOT NULL,
  `image_path` varchar(300) NOT NULL,
  `image_desc` varchar(500) NOT NULL,
  `reg_no` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_id`, `v_type`, `brand`, `model`, `model_year`, `rent_amt`, `image_path`, `image_desc`, `reg_no`) VALUES
(1, 0, 'Honda', 'Honda Shine ', 2020, '550.00', 'Honda1.jpg', 'Honda Shine is a bike available at a starting price of Rs. 450/ Day', 'MH02B777'),
(2, NULL, 'Honda', 'Honda Activa 6G', 2020, '400.00', 'Honda2.jpeg', 'Honda Activa 6G is a bike available at a starting price of Rs. 400/ Day', 'Mh04G5897'),
(3, NULL, 'Royal Enfield', 'Royal Enfield Thunderbird 350X', 2019, '600.00', 'Re1.jpg', 'Royal Enfield Thunderbird 350X is a bike available at a starting price of Rs. 600/ Day', 'MH04B87965'),
(4, NULL, 'Royal Enfield', 'Royal Enfield Meteor 350', 2020, '800.00', 'Re2.jpg', 'Royal Enfield Meteor 350 is a bike available at a starting price of Rs 800/ Day', 'MH48G4587'),
(5, NULL, 'Bajaj', 'Bajaj Pulsar 150', 2018, '550.00', 'Bajaj1.jpg', 'Bajaj Pulsar 150 is a bike available at a starting price of Rs 550/ Day', 'MH48T7894'),
(6, NULL, 'Bajaj', 'Bajaj Pulsar 220 F', 2019, '1000.00', 'Bajaj2.jpg', 'Bajaj Pulsar 220 F is a bike available at a starting price of Rs 1000/ Day', 'MH48B7895'),
(7, NULL, 'Suzuki', 'Suzuki Gixxer SF 250', 2021, '1500.00', 'Suzuki1.jpg', 'Suzuki Gixxer SF 250 is a bike available at a starting price of Rs 1500/  Day', 'MH48B1254'),
(8, NULL, 'Suzuki', 'Suzuki Gixxer', 2020, '900.00', 'Suzuki2.jpg', 'Suzuki Gixxer is a bike available at a starting price of Rs 900/ Day', 'MH48B5478'),
(9, NULL, 'Yahama', 'Yamaha FZ S FI', 2020, '1100.00', 'Yamaha1.jpg', 'Yamaha FZ S FI is a bike available at a starting price of Rs 1100/Day', 'MH48A7895'),
(10, NULL, 'Yahama', 'Yamaha YZF R15 V3', 2021, '2000.00', 'Yamaha2.jpg', 'Yamaha YZF R15 V3 is a bike available at a starting price of Rs 2000/ Day', 'MH04R1587'),
(15, 0, 'Honda', 'Honda 954rr', 2021, '100.00', 'Honda3.jpg', 'HONDA 954rr', 'MH200');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`o_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_Id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `o_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `v_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
