-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 22, 2016 at 03:01 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspirants`
--

CREATE TABLE IF NOT EXISTS `aspirants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `aspirants`
--

INSERT INTO `aspirants` (`id`, `student_id`, `post_id`, `status`, `img`) VALUES
(1, 100, 1, 1, 'img/vlcsnap-2016-04-14-20h41m22s126.png'),
(2, 200, 1, 1, 'img/vlcsnap-2016-04-14-20h55m03s146.png'),
(3, 104, 2, 1, 'img/vlcsnap-2016-04-14-20h58m00s135.png'),
(4, 204, 2, 1, 'img/vlcsnap-2016-04-14-20h39m28s14.png'),
(6, 201, 3, 1, 'img/vlcsnap-2016-04-14-20h29m39s18.png'),
(7, 102, 5, 1, 'img/vlcsnap-2016-04-14-21h26m13s162.png'),
(9, 202, 5, 1, 'img/vlcsnap-2016-04-14-20h42m32s74.png'),
(10, 107, 1, 0, 'img/vlcsnap-2016-04-14-20h58m00s135.png'),
(11, 106, 5, 1, 'img/vlcsnap-2016-04-14-20h42m32s74.png'),
(12, 205, 5, 1, 'img/vlcsnap-2016-04-14-20h58m00s135.png'),
(13, 108, 1, 0, 'img/IMG_20140101_002701.jpg'),
(16, 103, 2, 1, 'img/vlcsnap-2016-04-14-20h58m00s135.png'),
(17, 120, 5, 1, 'img/IMG_20160507_124936-2.jpg'),
(18, 221, 1, 1, 'img/vlcsnap-2016-04-14-20h43m38s211.png');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cassign_aspirants_view`
--
CREATE TABLE IF NOT EXISTS `cassign_aspirants_view` (
`id` int(11)
,`name` varchar(70)
,`sch` varchar(50)
,`username` varchar(50)
,`post` varchar(70)
,`post_id` int(11)
,`status` int(11)
,`img` varchar(100)
,`votes` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE IF NOT EXISTS `elections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `election` varchar(70) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`id`, `election`, `start_date`, `end_date`) VALUES
(2, 'hjg', '', 'jhgjhg'),
(3, 'SCHOOL ELECTION', '', 'September 18, 2016 3:00PM'),
(4, 'SCHOOL ELECTION', 'September 17,2016 07:00 AM', 'September 18,2016 5:00 PM'),
(5, 'School', 'September 19 ,2016 12:47 PM', 'September 19 ,2016 12:55 PM'),
(6, 'School', 'September 19,2016 12:50 PM', 'September 19,2016 12:56 PM'),
(7, 'Skul', 'September 19,2016 1:17 PM', 'September 19,2016 1:25 PM'),
(8, 'School', 'September 19,2016 1:52 PM', 'September 19,2016 1:57 PM'),
(9, 'School', 'September 19,2016 1:52 PM', 'September 19,2016 1:57 PM'),
(10, 'School', 'September 19,2016 1:1:59', 'September 19,2016 1:1:59'),
(11, 'School', 'September 19,2016 1:1:59', 'September 19,2016 2:03'),
(12, 'School', 'September 19,2016 2:05 PM', 'September 19,2016 6:10 PM'),
(13, 'School', 'September 20,2016 3:45 PM', 'September 20,2016 4:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `malpractice`
--

CREATE TABLE IF NOT EXISTS `malpractice` (
  `malpractice_id` int(5) NOT NULL AUTO_INCREMENT,
  `id` varchar(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `evidence` varchar(100) NOT NULL,
  PRIMARY KEY (`malpractice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `malpractice`
--

INSERT INTO `malpractice` (`malpractice_id`, `id`, `description`, `evidence`) VALUES
(1, '4654', '6546', '6546'),
(2, '103', '', 'files/'),
(6, '103', 'jhggjjhgjh', 'files/'),
(7, '103', 'jhhgjhg', 'files/bg_top_img1.jpg'),
(8, '120', 'Kennedy Kathenge was involved in voter bribery', 'files/vlcsnap-2016-04-14-21h26m13s162.png');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(70) NOT NULL,
  `class_` varchar(10) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post`, `class_`) VALUES
(1, 'Chairperson', 'active'),
(2, 'Deputy Chairperson', ''),
(3, 'Secretary General', ''),
(5, 'school rep', ''),
(6, 'SPORTS', ''),
(7, 'chairman', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fees_balance` int(10) NOT NULL,
  `discipline_cases` int(5) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `password` varchar(140) NOT NULL,
  `registration_year` int(4) NOT NULL,
  `course_duration` int(1) NOT NULL,
  `is_user` int(1) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `voted` int(11) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL DEFAULT '0',
  `sch` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `username`, `fees_balance`, `discipline_cases`, `mobile_number`, `password`, `registration_year`, `course_duration`, `is_user`, `active`, `voted`, `role`, `sch`) VALUES
(100, 'Erick Kibet', 'I/100', 1500, 3, '+254705222568', 'XXQfOGzU', 0, 0, 1, 0, 0, 1, 'ICT'),
(101, 'Mark Chesire', 'I/101', 0, 0, '+254726179177', 'idPUyyoP', 2013, 4, 1, 0, 0, 1, 'ICT'),
(103, 'Harry Masidza', 'I/103', 0, 0, '+254705222568', 'UZG4TJ', 0, 0, 1, 0, 0, 1, 'ICT'),
(104, 'Alice Kimani', 'I/104', 0, 0, '', '', 0, 0, 0, 0, 0, 1, 'ICT'),
(105, 'Joseph Kimani', 'I/105', 0, 0, '', '', 0, 0, 0, 0, 0, 1, 'ICT'),
(106, 'Mary Nkube', 'I/106', 0, 0, '', 'kBiBSn', 0, 0, 1, 0, 0, 1, 'ICT'),
(107, 'Caleb Mwangangi', 'I/107', 0, 0, '', '', 0, 0, 0, 0, 0, 1, 'ICT'),
(108, 'Jame sw', 'I/108', 0, 0, '', 'zE67Fo', 0, 0, 1, 0, 0, 1, 'ICT'),
(120, 'Erick Cheruiyot', 'I/120', 0, 0, '+254719453783', 'vhkpaE20', 0, 0, 1, 0, 0, 1, 'ICT'),
(125, 'Kip', 'i/125', 0, 0, '+254721267946', '16ufeb', 2013, 4, 1, 0, 1, 1, 'ICT'),
(200, 'Ben James', 'B/200', 0, 0, '', '', 0, 0, 0, 0, 0, 1, 'Business'),
(201, 'Ann Nyokabi', 'B/201', 0, 0, '', '', 0, 0, 0, 0, 1, 1, 'Business'),
(202, 'Mike Mugo', 'B/202', 0, 0, '', '', 0, 0, 0, 0, 0, 1, 'Business'),
(203, 'Elly Bor', 'B/203', 0, 0, '', '', 0, 0, 0, 0, 1, 1, 'Business'),
(204, 'Dan Mwangi', 'B/204', 0, 0, '', '', 0, 0, 0, 0, 0, 1, 'Business'),
(205, 'Ken Kathenge', 'B/205', 8000, 0, '+254717655670', 'jL9qn8Bm', 0, 0, 1, 0, 1, 1, 'Business'),
(210, 'Harry Mas', 'i/210', 0, 0, '', 'JA72AT', 2013, 4, 1, 0, 0, 1, 'ICT'),
(215, 'Muthoni Nyaga', 'b/215', 100, 0, '+254719453783', '5NIwMq', 2013, 4, 1, 0, 0, 1, 'Business'),
(221, 'Michael Bett', 'B/221', 0, 0, '+254719453783', 'Oi5mJ1IC', 2014, 4, 1, 0, 0, 1, 'Business'),
(245, 'Harry Mas', 'i/245', 0, 0, '', '', 2013, 4, 0, 0, 0, 1, 'ICT'),
(1234, 'Silas Wanga', 'admin', 0, 0, '', 'd033e22ae348aeb5660fc2140aec35850c4da997', 0, 0, 1, 0, 0, 0, 'N/a'),
(30937961, 'kennedy', 'kennedy', 0, 0, '0717655670', 'jL9qn8Bm', 2013, 4, 0, 0, 0, 1, 'ICT');

-- --------------------------------------------------------

--
-- Table structure for table `student_posts`
--

CREATE TABLE IF NOT EXISTS `student_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `std_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `student_posts`
--

INSERT INTO `student_posts` (`id`, `std_id`, `post_id`, `votes`) VALUES
(1, 100, 1, 0),
(2, 200, 1, 1),
(3, 104, 2, 2),
(4, 204, 2, 0),
(6, 201, 3, 1),
(9, 205, 5, 1),
(10, 106, 5, 0),
(11, 202, 5, 2),
(12, 108, 5, 0),
(15, 103, 2, 0),
(16, 120, 5, 0),
(17, 221, 1, 0);

-- --------------------------------------------------------

--
-- Structure for view `cassign_aspirants_view`
--
DROP TABLE IF EXISTS `cassign_aspirants_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cassign_aspirants_view` AS select `s`.`id` AS `id`,`s`.`name` AS `name`,`s`.`sch` AS `sch`,`s`.`username` AS `username`,`p`.`post` AS `post`,`p`.`post_id` AS `post_id`,`a`.`status` AS `status`,`a`.`img` AS `img`,`sp`.`votes` AS `votes` from (((`students` `s` join `posts` `p`) join `aspirants` `a`) join `student_posts` `sp`) where ((`s`.`id` = `a`.`student_id`) and (`p`.`post_id` = `a`.`post_id`) and (`sp`.`std_id` = `s`.`id`));
