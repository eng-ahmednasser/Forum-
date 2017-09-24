-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2017 at 10:08 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skillup`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(200) COLLATE utf8mb4_polish_ci NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `datetime`) VALUES
(9, 8, 64, 'fdfdf', '2017-04-12 22:03:37'),
(10, 12, 71, 'ahmed', '2017-05-27 21:22:15'),
(11, 9, 72, 'dddddddd', '2017-08-18 12:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `forum_title` varchar(50) COLLATE utf8mb4_polish_ci NOT NULL,
  `forum_description` text COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `forum_title`, `forum_description`) VALUES
(1, 'general forum', 'Discuss anything related to modern life that doesn\'t fit in another sub-forum here!\r\n'),
(2, 'Fitness Forum', 'Experiences, methods and inquiries about slimming, slimming and slimming'),
(3, 'Manual work', 'Lessons and handicrafts at home and various works'),
(4, 'News2', 'New news and breaking news in Egypt and the world'),
(6, 'Fitness Forum', 'Experiences, methods and inquiries about slimming, slimming and slimming');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `content` text COLLATE utf8mb4_polish_ci NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `forum_id`, `title`, `content`, `datetime`) VALUES
(6, 65, 2, 'second topic', 'Physics First Topics and Units. Measurement and the Language of Physics. Frames of Reference; Physics Terminology; Units of Measure; Applying Measurement in Physics;Physics First Topics and Units. Measurement and the Language of Physics. Frames of Reference; Physics Terminology; Units of Measure; Applying Measurement in Physics;', '2017-04-06 00:48:34'),
(8, 64, 3, 'saaaaaaa', 'dfasdfasdfvvvv', '2017-04-12 21:01:14'),
(9, 64, 1, 'vvvvvvvvvvv', 'ffffffffffffffffff', '2017-04-12 21:42:17'),
(11, 64, 1, 'ah@gmail.com', 'sssss', '2017-04-28 15:35:00'),
(12, 71, 1, 'welcome ', 'back ahmed nasser ', '2017-05-27 21:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_polish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `gender` char(5) COLLATE utf8mb4_polish_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `if_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci COMMENT='table for users_view';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `image`, `if_admin`) VALUES
(64, 'Marwan', 'ah@gmail.com', '12345678', 'Male', 'images.jpg', 1),
(65, 'ahmed', 'ah@gmail.com', '1234', 'Male', 'images.jpg', 0),
(68, 'ahmed', 'ah@gmail.com', 'ddddddddddddddd', 'Male', 'Capture.PNG', 0),
(69, 'ahmed', 'ahmed@gmail.com', '12345678', 'Male', 'Untitled.png', 0),
(71, 'Ahmed', 'back@gmail.com', '12345678', 'Male', '15965101_1731465153836879_3684832564104543913_n.jpg', 0),
(72, 'ahmed4', 'ahm@ff.com', '12345678', 'Male', '4.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_ibfk_1` (`post_id`),
  ADD KEY `comments_ibfk_2` (`user_id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_ibfk_1` (`forum_id`),
  ADD KEY `posts_ibfk_2` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`forum_id`) REFERENCES `forums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
