-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2022 at 12:50 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlyphanhoi`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `feedback_type_id` int NOT NULL,
  `feedback_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `reply` text NOT NULL,
  `response_time` date NOT NULL,
  `feedback_time` date NOT NULL,
  `status` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedback_type_id` (`feedback_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_type`
--

DROP TABLE IF EXISTS `feedback_type`;
CREATE TABLE IF NOT EXISTS `feedback_type` (
  `feedback_type_id` int NOT NULL AUTO_INCREMENT,
  `feedback_type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`feedback_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

DROP TABLE IF EXISTS `user_feedback`;
CREATE TABLE IF NOT EXISTS `user_feedback` (
  `user_id` int NOT NULL,
  `feedback_type_id` int NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `feedback_type_id` (`feedback_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `postion_id` int NOT NULL,
  `status` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `create_time_at_account` date NOT NULL,
  `last_logged_in` date NOT NULL,
  `avatar` text NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `postion_id` (`postion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`feedback_type_id`) REFERENCES `feedback_type` (`feedback_type_id`);

--
-- Constraints for table `feedback_type`
--
ALTER TABLE `feedback_type`
  ADD CONSTRAINT `feedback_type_ibfk_1` FOREIGN KEY (`feedback_type_id`) REFERENCES `user_feedback` (`feedback_type_id`);

--
-- Constraints for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD CONSTRAINT `user_feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
