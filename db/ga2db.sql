-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 25, 2021 at 06:39 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ga2db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Follows`
--

CREATE TABLE `Follows` (
  `follower_id` int NOT NULL,
  `following_id` int NOT NULL,
  `dateFollowed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Follows`
--

INSERT INTO `Follows` (`follower_id`, `following_id`, `dateFollowed`) VALUES
(1, 2, '2021-03-25 18:37:24'),
(1, 3, '2021-03-25 18:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `Tweets`
--

CREATE TABLE `Tweets` (
  `tweet_id` int NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Tweets`
--

INSERT INTO `Tweets` (`tweet_id`, `author_id`, `dateCreated`, `text`) VALUES
(9, 2, '2021-03-25 18:33:10', 'Luke\'s first tweet: Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt tenetur cumque quam in aperiam excepturi amet est quo architecto blanditiis. Lorem ipsum dolor sit amet consectetur adipisicing elit.'),
(10, 2, '2021-03-25 18:34:28', 'Luke\'s second tweet: Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt tenetur cumque quam in aperiam excepturi amet est quo architecto blanditiis. Lorem ipsum dolor sit amet consectetur adipisicing elit.\r\n'),
(11, 3, '2021-03-25 18:34:56', 'Rey\'s first tweet: Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt tenetur cumque quam in aperiam excepturi amet est quo architecto blanditiis. Lorem ipsum dolor sit amet consectetur adipisicing elit.'),
(12, 2, '2021-03-25 18:36:37', 'Luke\'s third tweet: Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt tenetur cumque quam in aperiam excepturi amet est quo architecto blanditiis. Lorem ipsum dolor sit amet consectetur adipisicing elit.');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `handle` varchar(16) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `dateCreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `handle`, `firstname`, `lastname`, `isAdmin`, `password`, `dateCreated`) VALUES
(1, 'yoda', 'Yoda', NULL, 0, '1234', '2021-03-25 18:25:19'),
(2, 'luke', 'Luke', 'Skywalker', 0, '1234', '2021-03-25 18:26:14'),
(3, 'ReyReal', 'Rey', 'Skywalker', 0, '1234', '2021-03-25 18:26:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Tweets`
--
ALTER TABLE `Tweets`
  ADD PRIMARY KEY (`tweet_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;