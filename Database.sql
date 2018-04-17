-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2018 at 07:48 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hotel_id` int(255) NOT NULL,
  `bookflag` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`id`, `username`, `hotel_id`, `bookflag`) VALUES
(36, 'fawad', 1, 2),
(38, 'fawad', 2, 1),
(39, 'Guy', 2, 2),
(40, 'Lisa', 6, 1),
(41, 'Lisa', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(255) NOT NULL,
  `h_name` varchar(255) NOT NULL,
  `h_desc` varchar(255) NOT NULL,
  `h_image` varchar(255) NOT NULL,
  `h_bookflag` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `h_name`, `h_desc`, `h_image`, `h_bookflag`) VALUES
(1, 'Hilton', 'This is the best Hotel Available in town.', '1', 1),
(2, 'Marriott', 'This is the best Hotel Available in town', '2', 1),
(3, 'Delta', 'This is the best Hotel Available in town', '3', 1),
(4, 'Ramada', 'This is the best Hotel Available in town', '4', 1),
(5, 'Courtyard', 'This is the best Hotel Available in town', '5', 1),
(6, 'Montreal Palace', 'This is the best Hotel Available in town', '6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `bookflag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone`, `bookflag`) VALUES
(1, 'admin', 'admin', 'fawadmueed@gmail.com', '5147924783', 0),
(15, 'fawad', 'fawad', 'fawadmueed@gmail.com', '5147924783', 1),
(16, 'Guy', '123', 'guy@gmail.com', '5147924783', 1),
(17, 'Lisa', 'Lisa', 'lisa@gmail.com', '5147924783', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;