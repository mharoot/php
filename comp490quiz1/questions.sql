-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2017 at 12:32 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.1.9-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comp490quiz1`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(9) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`) VALUES
(1, 'If it is important to have a very detailed specification and design before moving to implementation then you probably need to use an agile approach. ', 0),
(2, 'If it is important to have a very detailed specification and design before 	moving to implementation then you probably need to use a plan-driven approach. ', 1),
(3, 'An incremental delivery strategy, is one where you deliver the software to customers and get rapid feedback from them. ', 1),
(4, 'An plan driven strategy, is one where you deliver the software to customers and get rapid feedback from them. ', 0),
(5, 'Agile 	methods are most effective when the system can be developed with a small co-located team who can communicate informally. ', 1),
(6, 'Agile methods are most effective when the system can be developed with a large co-located team who can communicate informally. ', 0),
(7, 'Plan driven methods are most effective when the system can be developed with a small co-located team who can communicate informally. ', 0),
(8, 'Plan driven methods are most effective when the system can be developed with a large co-located team who can communicate informally. ', 1),
(9, 'Rapid software development is where the specification, design, and 	implementation are inter-leaved. ', 1),
(10, 'In Rapid software development user interfaces are often developed using an IDE and graphical toolset. ', 1),
(11, 'In Rapid software development a system is developed as a series of versions with stakeholders involved in version evaluation. ', 1),
(12, 'Plan driven development focuses on the code rather than the design. ', 0),
(13, 'Agile development focuses on the code rather than the design. ', 1),
(14, 'In agile development, individuals and interactions is valued more than processes and tools. ', 1),
(15, 'In agile development, processes and tools is valued more than 	individuals and interactions. ', 0),
(16, 'In agile development, a working system is valued more than a comprehensive 	documentation. ', 1),
(17, 'In agile development, a comprehensive documentation is valued more than a working system. ', 0),
(18, 'In agile development, customer collaboration is valued more than controlled negotiation. ', 1),
(19, 'In agile development, controlled negotiation is valued more than 	customer collaboration. ', 0),
(20, 'In agile development, responding to change is valued more than 	following a plan. ', 1),
(21, 'In agile development, following a plan is valued more than responding to change. ', 0),
(22, 'A plan-driven approach to software engineering is based around separate development stages with the outputs to be produced at each of these stages planned in advance.', 1),
(23, 'A agile-driven approach to software engineering is based around separate development stages with the outputs to be produced at each of these stages planned in advance.', 0),
(24, 'In an agile-driven approach the specification, design, implementation and testing are inter-leaved and the outputs from the development process are decided through a process of negotiation during the software development process.', 1),
(25, 'In an plan-driven approach the specification, design, implementation and testing are inter-leaved and the outputs from the development process are decided through a process of negotiation during the software development process.\n', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
