-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2021 at 12:05 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bankingsystem_tsfinternship`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `accno` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `account_balance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`accno`, `name`, `email`, `account_balance`) VALUES
(400121, 'Ronak Makwana', 'ronakmak2720@gmail.com', 100097),
(400122, 'abc', 'abc@gmail.com', 544),
(400123, 'Het Makwana', 'het@gmail.com', 2112),
(400124, 'xyz', 'xyz@gmail.com', 101),
(400125, 'kajal Makwana', 'kajalmakwana@gmail.com', 1500000),
(400126, 'dummy1', 'dummydata1@gamil.com', 19746),
(400127, 'dummy2', 'dummydata2@gmail.com', 1500000),
(400128, 'dummy3', 'dummydata3@gamil.com', 1950000),
(400129, 'dummy4', 'dummydata4@gamil.com', 2550000),
(400130, 'dummy5', 'dummydata5@gamil.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transactions_details`
--

CREATE TABLE `transactions_details` (
  `tid` int(11) NOT NULL,
  `sender_name` varchar(30) NOT NULL,
  `sender_accno` int(11) NOT NULL,
  `receiver_name` varchar(30) NOT NULL,
  `receiver_accno` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions_details`
--

INSERT INTO `transactions_details` (`tid`, `sender_name`, `sender_accno`, `receiver_name`, `receiver_accno`, `amount`, `timestamp`) VALUES
(32, 'Ronak Makwana', 11, 'het', 11, 121, '2021-01-21 15:32:09'),
(34, 'kajal Makwana', 400125, 'Ronak Makwana', 400121, 10000, '2021-01-21 15:32:55'),
(35, 'kajal Makwana', 400125, 'Ronak Makwana', 400121, 0, '2021-01-21 15:44:32'),
(36, 'Ronak Makwana', 400121, 'kajal Makwana', 400125, 10000, '2021-01-21 16:17:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`accno`);

--
-- Indexes for table `transactions_details`
--
ALTER TABLE `transactions_details`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `accno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400132;

--
-- AUTO_INCREMENT for table `transactions_details`
--
ALTER TABLE `transactions_details`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
