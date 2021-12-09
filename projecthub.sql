-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 07:22 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projecthub`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `id` int(11) NOT NULL,
  `std_id` varchar(4000) NOT NULL,
  `supervisor_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`id`, `std_id`, `supervisor_id`) VALUES
(1, '2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `chapter1`
--

CREATE TABLE `chapter1` (
  `student_id` int(11) NOT NULL,
  `chapter1` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chapter1`
--

INSERT INTO `chapter1` (`student_id`, `chapter1`) VALUES
(1, '<ol><li><strong>WHAT IS RATIONAL AGENT, AN IDEAL RATIONAL AGENT? EXPLAIN THE CONCEPTS OF PERFORMANCE MEASURE AND OMNISCIENCE.</strong></li></ol><p>&nbsp;</p><p>&nbsp;</p><ol><li><strong>WHAT IS RATIONAL AGENT</strong></li></ol><p>A rational agent is one that does the right thing. Instead of doing the wrong thing we will say that the right action is the one that will cause the agent to be most successful.</p><ol><li><strong>WHAT IS AN IDEAL RATIONAL AGENT?</strong></li></ol><p>An ideal rational agent&nbsp;always takes the action that maximizes its performance given the percept sequence and its knowledge of the environment.&nbsp; An ideal rational agent does whatever action is expected to maximize its performance measure, on the basis of the evidence provided by the percept sequence and whatever built-in knowledge the agent has.&nbsp;</p><ol><li><strong>EXPLAIN THE CONCEPTS OF PERFORMANCE MEASURE&nbsp;</strong></li></ol><p>A performance measure embodies the criterion for the success of an agent’s behaviour. When an agent is plunked down in an environment, it generates a sequence of actions according to the percept it receives. This sequence of actions causes the environment to go through the sequence of states. If the sequence is desirable, then the agent has performed well. Obviously there is not one fixed measure suitable for all agents. It is better to design performance measures according to what one actually wants in the environment, rather than according to how one thinks the agent should act.</p><ol><li><strong>OMNISCIENCE.</strong></li></ol><p>An omniscience agent knows the actual outcome of its actions and can act accordingly but perfection is impossible in reality.</p><p>&nbsp;</p>'),
(2, '<p>fxfgxfhgcngjcmdhgjmhnmzjhmhbjmznmv hmvhgmhnmcgjcgcghcghcgjhmvhjvhgmchjgfgfjangjfchgcfjncdsaszdfgjk,ljksdasdfsdsgfdgfghjgfjghkjjlkjl.hxfdfxzaeattaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaannnnnnnnnnnnnnnnnnnnghfgjhjgfgthyyyyyyyyyyyyyyyyyyyy&nbsp;</p>');

-- --------------------------------------------------------

--
-- Table structure for table `chapter2`
--

CREATE TABLE `chapter2` (
  `student_id` int(11) NOT NULL,
  `chapter2` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chapter2`
--

INSERT INTO `chapter2` (`student_id`, `chapter2`) VALUES
(2, ''),
(2, '');

-- --------------------------------------------------------

--
-- Table structure for table `chapter3`
--

CREATE TABLE `chapter3` (
  `student_id` int(11) NOT NULL,
  `chapter3` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chapter4`
--

CREATE TABLE `chapter4` (
  `student_id` int(11) NOT NULL,
  `chapter4` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chapter5`
--

CREATE TABLE `chapter5` (
  `student_id` int(11) NOT NULL,
  `chapter5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(255) NOT NULL,
  `sender_id` int(255) NOT NULL,
  `current_chapter` text NOT NULL,
  `reciever_id` int(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_id`, `current_chapter`, `reciever_id`, `message`) VALUES
(1, 2, 'proposal', 3, 'Just updated my proposal'),
(2, 3, 'proposal', 0, 'Just updated my proposal'),
(3, 2, 'proposal', 3, 'Just updated my proposal'),
(4, 3, 'proposal', 2, 'Just updated my proposal');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `student_id` int(11) NOT NULL,
  `topic` mediumtext NOT NULL,
  `motivation` longtext NOT NULL,
  `proposal` longtext NOT NULL,
  `status` enum('approved','review','started') NOT NULL DEFAULT 'started'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`student_id`, `topic`, `motivation`, `proposal`, `status`) VALUES
(2, 'Design and implementation of an online voting', 'My motivation', '<p>My Bargain Ok</p>', 'review');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `email` varchar(300) NOT NULL,
  `regno` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  `programme` varchar(200) NOT NULL,
  `phone` int(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cpassword` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `regno`, `level`, `programme`, `phone`, `password`, `cpassword`, `role`) VALUES
(1, 'Meenah Sani', 'msani@gmail.com', '', '', '', 2147483647, 'admin123', 'admin123', 'admin'),
(2, 'Favour Amarachi', 'amarachi@gmail.com', '19E/0056/CS', 'NDII', 'Evening', 2147483647, '12345678', '12345678', 'student'),
(3, 'Mr Destiny Brotobor', 'destiny@gmail.com', '', '', '', 702345678, '12345', '', ''),
(4, 'Sir Zubby J', 'zubby@gmail.com', '', '', '', 2147483647, '12345', '', ''),
(5, 'Dr Oladimeji ', 'ola@gmail.com', '', '', '', 2147483647, '12345', '', ''),
(6, 'Glory Glory', 'glory@gmail.com', '19E/0075/CS', 'NDII', 'Morning', 908968599, '12345678', '12345678', 'student'),
(7, 'Lovely Nwachukwu', 'love@gmail.com', '19/0045/CS', 'HNDI', 'Evening', 9876, '12345678', '12345678', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
