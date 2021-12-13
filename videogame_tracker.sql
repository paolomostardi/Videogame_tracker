-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 06:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videogame_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`list_id`, `user_id`, `name`, `description`) VALUES
(0, 0, 'main-list ', 'main list to display'),
(7, 7, 'Main-list', '0'),
(8, 8, 'Main-list', 'Main list, of the user not'),
(9, 9, 'Main-list', 'Main list, of the user admin'),
(10, 10, 'Main-list', 'Main list, of the user fitella'),
(11, 11, 'Main-list', 'Main list, of the user account'),
(12, 12, 'Main-list', 'Main list, of the user '),
(13, 13, 'Main-list', 'Main list, of the user '),
(14, 14, 'Main-list', 'Main list, of the user username'),
(15, 15, 'Main-list', 'Main list, of the user username'),
(16, 16, 'Main-list', 'Main list, of the user username'),
(17, 17, 'Main-list', 'Main list, of the user username'),
(18, 18, 'Main-list', 'Main list, of the user username'),
(19, 19, 'Main-list', 'Main list, of the user username'),
(20, 20, 'Main-list', 'Main list, of the user username');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `passwordd` text NOT NULL,
  `bios` text DEFAULT '\'I like videogames\'',
  `image_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `passwordd`, `bios`, `image_id`) VALUES
(7, 'gamer', 'gamerlist@list.com', 'list', '\'I like videogames\'', 0),
(8, 'not', 'aa@mgg.com', 'my', '\'I like videogames\'', 0),
(9, 'admin', 'email.com', 'password', '\'I like videogames\'', 0),
(10, 'fitella', 'al', 'francesco', '\'I like videogames\'', 0),
(11, 'account', 'exemple@gmail.com', 'password', '\'I like videogames\'', 0),
(12, '', '', '', '\'I like videogames\'', 0),
(13, '', '', '', '\'I like videogames\'', 0),
(14, 'username', 'exemple@gmail.com', 'password', '\'I like videogames\'', 0),
(15, 'username', 'email.com', 'password', '\'I like videogames\'', 0),
(16, 'username', 'email.com', 'password', '\'I like videogames\'', 0),
(17, 'username', 'email.com', 'password', '\'I like videogames\'', 0),
(18, 'username', 'email.com', 'password', '\'I like videogames\'', 0),
(19, 'username', 'email.com', 'password', '\'I like videogames\'', 0),
(20, 'username', 'email.com', 'password', '\'I like videogames\'', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videogame`
--

CREATE TABLE `videogame` (
  `videogame_id` int(11) NOT NULL,
  `cover_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videogame`
--

INSERT INTO `videogame` (`videogame_id`, `cover_id`, `description`, `name`) VALUES
(1, 1, 'Assassins Creed is all about assassinating people!', 'Assassins Creed'),
(2, 2, 'Dark Souls is a very difficult game to beat.', 'Dark Souls'),
(3, 3, 'Minecraft is a sandbox game that players can craft things in!', 'Minecraft'),
(4, 4, 'Counter-Strike is a tactical first-person shooter.', 'Counter-Strike'),
(5, 5, 'Far Cry is an open world exploration game with a narrative!', 'Far Cry');

-- --------------------------------------------------------

--
-- Table structure for table `videogame_list_connection`
--

CREATE TABLE `videogame_list_connection` (
  `videogame_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videogame_list_connection`
--

INSERT INTO `videogame_list_connection` (`videogame_id`, `list_id`) VALUES
(1, 0),
(1, 7),
(1, 8),
(1, 9),
(2, 0),
(2, 7),
(2, 9),
(2, 14),
(3, 0),
(4, 0),
(5, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videogame`
--
ALTER TABLE `videogame`
  ADD PRIMARY KEY (`videogame_id`);

--
-- Indexes for table `videogame_list_connection`
--
ALTER TABLE `videogame_list_connection`
  ADD PRIMARY KEY (`videogame_id`,`list_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
