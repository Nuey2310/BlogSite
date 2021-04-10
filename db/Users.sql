-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2021 at 09:52 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `2170db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
                         `id` int(11) NOT NULL,
                         `handle` varchar(16) NOT NULL,
                         `firstname` varchar(20) NOT NULL,
                         `lastname` varchar(20) DEFAULT NULL,
                         `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
                         `password` varchar(255) NOT NULL,
                         `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                         `blocked` varchar(255) NOT NULL,
                         `blocks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `handle`, `firstname`, `lastname`, `isAdmin`, `password`, `dateCreated`, `blocked`, `blocks`) VALUES
(1, 'yoda', 'Yoda', NULL, 1, '1234', '2021-03-25 18:25:19', '', ''),
(2, 'jediluke', 'Luke', 'Skywalker', 0, '1234', '2021-03-25 18:26:14', '', ''),
(3, 'ReyReal', 'Rey', 'Skywalker', 0, '1234', '2021-03-25 18:26:56', '', ''),
(4, 'Bobo', 'bobo1', 'bobo2', 0, '', '2021-04-07 00:12:27', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
