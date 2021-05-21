-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 06:57 AM
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
-- Database: `petadopt`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `fav_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`fav_id`, `pet_id`, `user_id`) VALUES
(1, 14, 1),
(2, 2, 1),
(3, 5, 1),
(4, 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `breed` text NOT NULL,
  `age` double DEFAULT NULL,
  `color` text NOT NULL,
  `neutered` varchar(3) NOT NULL,
  `shelter_id` int(11) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `need_yard` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `name`, `breed`, `age`, `color`, `neutered`, `shelter_id`, `gender`, `need_yard`) VALUES
(1, 'Katherine', 'cat', 3, 'brown', 'yes', 1, 'F', 'no'),
(2, 'Shelly', 'cat', 2, 'brown', 'yes', 1, 'F', 'no'),
(3, 'Phil', 'dog', 5, 'multicolor', 'yes', 1, 'M', 'yes'),
(4, 'Xiao  Bai', 'bunny', 1, 'white', 'no', 2, 'M', 'yes'),
(5, 'Oreo', 'hamster', 1, 'black', 'yes', 3, 'M', 'no'),
(6, 'Jennifurr', 'cat', 4, 'white', 'yes', 2, 'F', 'no'),
(7, 'Clawdia', 'cat', 9, 'black', 'yes', 4, 'F', 'yes'),
(8, 'Babushka', 'dog', 1, 'brown', 'yes', 4, 'M', 'yes'),
(9, 'Sir Hoppinton', 'rabbit', 5, 'white', 'yes', 4, 'M', 'no'),
(10, 'Sandra', 'cat', 3, 'white', 'yes', 4, 'F', 'no'),
(11, 'Furball', 'cat', 4, 'white', 'yes', 4, 'M', 'no'),
(12, 'Mauricio', 'cat', 0.5, 'multicolor', 'yes', 4, 'M', 'no'),
(13, 'Neptune', 'dog', 0.58, 'white', 'yes', 4, 'M', 'yes'),
(14, 'Sid', 'cat', 1, 'gray', 'yes', 1, 'M', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `shelter`
--

CREATE TABLE `shelter` (
  `shelter_id` int(11) NOT NULL,
  `zip_code` varchar(5) NOT NULL,
  `shelter_number` varchar(10) NOT NULL,
  `shelter_name` text NOT NULL,
  `website` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shelter`
--

INSERT INTO `shelter` (`shelter_id`, `zip_code`, `shelter_number`, `shelter_name`, `website`) VALUES
(1, '11216', '7183983440', 'Pet Paradis', 'https://nycacc.app/#/'),
(2, '11216', '3457869980', 'PetCare', 'https://nycacc.app/#/'),
(3, '11206', '3457869981', 'Pet Haven', 'https://nycacc.app/#/'),
(4, '11208', '2127884000', 'Animal Care Centers of NYC', 'https://nycacc.app/#/');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `pass`) VALUES
(1, 'test1', 'test', 'test1@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5'),
(2, 'user1', 'user', 'user@gmail.com', '6ad14ba9986e3615423dfca256d04e3f'),
(3, 'test2', 'test', 'test2@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5'),
(4, 'test3', 'test', 'test3@gmail.com', 'cc03e747a6afbbcbf8be7668acfebee5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`fav_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelter`
--
ALTER TABLE `shelter`
  ADD PRIMARY KEY (`shelter_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shelter`
--
ALTER TABLE `shelter`
  MODIFY `shelter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
