-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 09:43 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wow`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `title` varchar(155) NOT NULL,
  `body` longtext NOT NULL,
  `image` varchar(155) NOT NULL,
  `author` varchar(155) NOT NULL,
  `author_image` varchar(155) NOT NULL,
  `time` varchar(55) NOT NULL,
  `type` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `title`, `body`, `image`, `author`, `author_image`, `time`, `type`) VALUES
(1, 'passerby', 'love', 'dan.png', 'kiss', 'love.jpg', '21113', 'gotv');

-- --------------------------------------------------------

--
-- Table structure for table `forum_comment`
--

CREATE TABLE `forum_comment` (
  `id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `author` varchar(155) NOT NULL,
  `body` longtext NOT NULL,
  `time` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_comment`
--

INSERT INTO `forum_comment` (`id`, `forum_id`, `author`, `body`, `time`) VALUES
(1, 1, 'daniel', 'loveth', '23322'),
(2, 1, 'osato', 'perfect love', '322322');

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `image` varchar(155) NOT NULL,
  `author` varchar(255) NOT NULL,
  `author_image` varchar(155) NOT NULL,
  `time` varchar(55) NOT NULL,
  `type` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`id`, `title`, `body`, `image`, `author`, `author_image`, `time`, `type`) VALUES
(1, 'I love Christ', 'money is good now', 'image.png', 'james Osator', 'author.png', '123232323', 'Grief'),
(2, 'I love Christ', 'money is good now', 'image.png', 'james Osator', 'author.png', '123232323', 'Pains');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_comment`
--
ALTER TABLE `forum_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forum_comment`
--
ALTER TABLE `forum_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
