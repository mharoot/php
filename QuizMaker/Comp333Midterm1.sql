-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2017 at 03:40 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comp333midterm1.sql`
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
(1, 'The safest parameter-passing mechanism is pass-by-value.', 1),
(2, 'Actual parameters are also known as dummy variables.', 0),
(3, 'The Ada mode <b>in</b> means that the caller’s argument can never be altered by the callee.', 1),
(4, 'The Ada mode <b>out</b> means that the callee’s argument can be both used and altered by the callee.', 0),
(5, 'The most general parameter-passing mechanism is pass-by-name.', 1),
(6, 'Parameter passing by reference is the same as passing by address.', 1),
(7, 'Parameter passing by value-result is the same as passing by copy-in/copy-out.', 1),
(8, 'Prolog is an imperative (i.e. of vital importance; crucial) PL.\r\n', 0),
(9, 'Constant expressions are not legal actual arguments for copy-out parameters.', 1),
(10, 'The name of a formal parameter in a subprogram declaration can never be directly accessed outside that subprogram.', 1),
(11, 'A while-do represents the PL construct iteration.', 1),
(12, 'A while-do represents the PL construct selection.', 0),
(13, 'A while-do represents the PL construct function.', 0),
(14, 'A while-do represents the PL construct series.', 0),
(15, 'The term hierarchical is <b>not</b> a PL paradigm (i.e. a typical example or pattern of something; a model); ?', 1),
(16, 'The term logical is <b>not</b> a PL paradigm (i.e. a typical example or pattern of something; a model); ?', 0),
(17, 'The term functional is <b>not</b> a PL paradigm (i.e. a typical example or pattern of something; a model); ?', 0),
(18, 'The term imperative is <b>not</b> a PL paradigm (i.e. a typical example or pattern of something; a model); ?', 0),
(19, 'What happens in an assignment such as  <b>X:=Y</b>?\r\n</br>\r\nThe address of X is modified to be the address of Y.', 0),
(20, 'What happens in an assignment such as  <b>X:=Y</b>?\r\n</br>\r\nThe address of Y is modified to be the address of X.', 0),
(21, 'What happens in an assignment such as  <b>X:=Y</b>?\r\n</br>\r\nThe object bound to Y is copied and bound to X, and any previous binding of X to an object is lost.', 0),
(22, 'What happens in an assignment such as  <b>X:=Y</b>?\r\n</br>\r\nX and Y become aliases.', 1),
(23, 'In many PLs, <b>otherwise</b> and <b>else</b> are part of which construct?</br>\r\nchoice', 1),
(24, 'In many PLs, <b>otherwise</b> and <b>else</b> are part of which construct?</br>\r\nrepetition', 0),
(25, 'In many PLs, <b>otherwise</b> and <b>else</b> are part of which construct?</br>\r\nsequence', 0),
(26, 'In many PLs, <b>otherwise</b> and <b>else</b> are part of which construct?</br>\r\nsubprogram', 0),
(27, 'The following PL construct:\r\n</br>\r\n<span style=\'white-space:pre\'>    </span><b>if</b> B1 <b>then begin if</b> B2 <b>then</b> S1 <b>else repeat</b> S2 <b>until</b> B2 <b>end else while</b> B3 <b>do begin if</b> B4 <b>then</b> S3 <b>else</b> S4 <b>end;</b>\r\n</br>\r\nis a typical example of Dangling else.', 0),
(28, 'The following PL construct:\r\n</br>\r\n<span style=\'white-space:pre\'>    </span><b>if</b> B1 <b>then begin if</b> B2 <b>then</b> S1 <b>else repeat</b> S2 <b>until</b> B2 <b>end else while</b> B3 <b>do begin if</b> B4 <b>then</b> S3 <b>else</b> S4 <b>end;</b>\r\n</br>\r\nis a typical example of Nesting.', 1),
(29, 'The following PL construct: <br>\r\n<span style=\'white-space:pre\'>    </span><b>if</b> B1 <b>then begin if</b> B2 <b>then</b> S1 <b>else repeat</b> S2 <b>until</b> B2 <b>end else while</b> B3 <b>do begin if</b> B4 <b>then</b> S3 <b>else</b> S4 <b>end;</b>\r\n<br>\r\nis a typical example of Overloading.', 0),
(30, 'The following PL construct: <br>\r\n<span style=\'white-space:pre\'>    </span><b>if</b> B1 <b>then begin if</b> B2 <b>then</b> S1 <b>else repeat</b> S2 <b>until</b> B2 <b>end else while</b> B3 <b>do begin if</b> B4 <b>then</b> S3 <b>else</b> S4 <b>end;</b>\r\n<br>\r\nis a typical example of Recursion.', 0),
(31, 'The Polymorphism term involves the mechanism of redefining a standard operator.', 1),
(32, 'The Encapsulation term involves the mechanism of redefining a standard operator.', 0),
(33, 'The Inheritance term involves the mechanism of redefining a standard operator.', 0),
(34, 'The Recursion term involves the mechanism of redefining a standard operator.', 0),
(35, 'Basic is the oldest HOL.', 0),
(36, 'C is the oldest HOL.', 0),
(37, 'Fortan is the oldest HOL.', 1),
(38, 'Lisp is the oldest HOL.', 0),
(39, 'A deficiency of Prolog is the close world assumption, negation problem, and efficiency limitations.', 1);

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
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
