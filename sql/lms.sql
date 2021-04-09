-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 06:09 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` int(11) NOT NULL,
  `slider` int(11) DEFAULT NULL,
  `resources` int(11) DEFAULT NULL,
  `course` int(11) DEFAULT NULL,
  `groups` int(11) DEFAULT NULL,
  `blogs` int(11) DEFAULT NULL,
  `faculty` int(11) DEFAULT NULL,
  `msg` int(11) DEFAULT NULL,
  `users` int(11) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `first_name` varchar(40) NOT NULL,
  `access_control` int(11) DEFAULT NULL,
  `e_certificate` int(11) DEFAULT NULL,
  `request` int(222) DEFAULT NULL,
  `payment` int(222) DEFAULT NULL,
  `count` varchar(222) DEFAULT NULL,
  `summit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `status`, `slider`, `resources`, `course`, `groups`, `blogs`, `faculty`, `msg`, `users`, `last_name`, `first_name`, `access_control`, `e_certificate`, `request`, `payment`, `count`, `summit`) VALUES
(1, 'admin@lms.com', 'password123', 1, 1, 1, 1, NULL, 1, 1, 1, 1, 'lms', 'admin', 1, 1, 1, 1, 'All', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `id` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `course` varchar(210) NOT NULL,
  `file` varchar(410) NOT NULL,
  `facultyid` varchar(90) NOT NULL,
  `coursename` varchar(622) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assessmentfile`
--

CREATE TABLE `assessmentfile` (
  `id` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `userid` varchar(210) NOT NULL,
  `file` varchar(410) NOT NULL,
  `file2` varchar(110) DEFAULT NULL,
  `useremail` varchar(255) DEFAULT NULL,
  `subdate` varchar(222) NOT NULL,
  `courseid` int(33) NOT NULL,
  `marks` varchar(222) DEFAULT NULL,
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) NOT NULL,
  `title` varchar(400) NOT NULL,
  `cover` varchar(420) NOT NULL,
  `image1` varchar(400) NOT NULL,
  `image2` varchar(400) NOT NULL,
  `about1` text NOT NULL,
  `about2` text NOT NULL,
  `author` varchar(40) NOT NULL,
  `authordetails` text NOT NULL,
  `authorimage` varchar(100) NOT NULL,
  `authorid` varchar(40) NOT NULL,
  `publish` int(10) NOT NULL,
  `view` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `cover`, `image1`, `image2`, `about1`, `about2`, `author`, `authordetails`, `authorimage`, `authorid`, `publish`, `view`) VALUES
(24, 'Sample Blog', '58266bg1.png', '62168bg.jpg', '76668bg1.png', '<p><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span></p>', '<p><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span></p>', 'Author Name', 'Author Information', '83472bg.jpg', 'admin', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `courseid` varchar(110) NOT NULL,
  `category` varchar(40) NOT NULL,
  `useremail` varchar(410) NOT NULL,
  `amount` varchar(110) NOT NULL,
  `cartchecked` varchar(255) DEFAULT '1',
  `cartstatus` varchar(255) DEFAULT '1',
  `cartuser` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` bigint(20) NOT NULL,
  `name` varchar(420) NOT NULL,
  `category` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `image` varchar(240) NOT NULL,
  `about` text NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `skill1` varchar(255) DEFAULT NULL,
  `skill2` varchar(255) DEFAULT NULL,
  `skill3` varchar(255) DEFAULT NULL,
  `skill4` varchar(255) DEFAULT NULL,
  `certified` int(11) NOT NULL,
  `hours` varchar(25) NOT NULL,
  `type` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `category`, `amount`, `image`, `about`, `startdate`, `enddate`, `skill1`, `skill2`, `skill3`, `skill4`, `certified`, `hours`, `type`) VALUES
(61, 'Sample Course 1', 'paid', '199', '33107bg1.png', '  <p><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span></p>  ', '2021-04-27', '2021-05-08', 'sample', 'sample', 'sample', 'sample', 1, '32', 'course');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `id` int(222) NOT NULL,
  `course` varchar(999) NOT NULL,
  `courseid` int(222) NOT NULL,
  `username` varchar(999) NOT NULL,
  `userid` int(22) NOT NULL,
  `startdate` varchar(22) NOT NULL,
  `topic` text NOT NULL,
  `utype` varchar(222) NOT NULL,
  `title` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `discussionchat`
--

CREATE TABLE `discussionchat` (
  `id` int(11) NOT NULL,
  `discussionid` varchar(222) NOT NULL,
  `userid` int(22) NOT NULL,
  `username` varchar(950) NOT NULL,
  `message` text NOT NULL,
  `utype` varchar(222) NOT NULL,
  `senddate` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ecert`
--

CREATE TABLE `ecert` (
  `id` int(222) NOT NULL,
  `studid` int(222) NOT NULL,
  `course` varchar(222) NOT NULL,
  `courseid` int(22) NOT NULL,
  `student` varchar(222) NOT NULL,
  `hours` varchar(22) NOT NULL,
  `month` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `status` int(22) NOT NULL,
  `certificate` varchar(987) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `title` varchar(222) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `imageName` varchar(450) NOT NULL,
  `about` text NOT NULL,
  `email` varchar(450) NOT NULL,
  `mob` int(33) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `title`, `fname`, `lname`, `imageName`, `about`, `email`, `mob`, `verified`) VALUES
(34, ' ', 'Faculty', 'LMS', '45833bg.jpg', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.', 'faculty@lms.com', 2147483647, 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_notification`
--

CREATE TABLE `faculty_notification` (
  `id` int(222) NOT NULL,
  `userid` varchar(222) DEFAULT '0',
  `notification` text DEFAULT NULL,
  `type` varchar(999) DEFAULT NULL,
  `dates` varchar(999) DEFAULT NULL,
  `sub` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` bigint(20) NOT NULL,
  `instructorId` int(90) NOT NULL,
  `resourceid` int(100) NOT NULL,
  `type` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `keyword`
--

CREATE TABLE `keyword` (
  `id` bigint(20) NOT NULL,
  `keyword` varchar(70) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(470) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keyword`
--

INSERT INTO `keyword` (`id`, `keyword`, `type`, `name`) VALUES
(412, 'sample', 'Resource', 'Sample Resource'),
(413, 'sample', 'Resource', 'Sample Resource'),
(414, 'sample', 'Resource', 'Sample Resource'),
(415, 'sample', 'Course', 'Sample Course 1'),
(416, 'sample', 'Course', 'Sample Course 1'),
(417, 'sample', 'Course', 'Sample Course 1');

-- --------------------------------------------------------

--
-- Table structure for table `oc`
--

CREATE TABLE `oc` (
  `id` bigint(20) NOT NULL,
  `courseid` varchar(40) NOT NULL,
  `useremail` varchar(110) NOT NULL,
  `amount` varchar(110) NOT NULL,
  `orderid` varchar(110) NOT NULL,
  `tansdate` varchar(110) NOT NULL,
  `status` int(11) NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `sub` varchar(666) NOT NULL,
  `category` varchar(777) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oc`
--

INSERT INTO `oc` (`id`, `courseid`, `useremail`, `amount`, `orderid`, `tansdate`, `status`, `userid`, `sub`, `category`) VALUES
(135, '  61', 'user@lms.com', '199', 'order20215720935', '09/04/2021', 0, '72', 'Sample Course 1', 'course'),
(136, '  61', 'user@lms.com', '199', 'orderorder2021572093536', '09/04/2021', 0, '72', 'Sample Course 1', 'course'),
(137, '  61', 'user@lms.com', '199', 'orderorderorder202157209353637', '09/04/2021', 0, '72', 'Sample Course 1', 'course'),
(138, '  61', 'user@lms.com', '199', 'order20215720938', '09/04/2021', 0, '72', 'Sample Course 1', 'course'),
(139, '  61', 'user@lms.com', '199', 'orderorder2021572093839', '09/04/2021', 0, '72', 'Sample Course 1', 'course');

-- --------------------------------------------------------

--
-- Table structure for table `pc`
--

CREATE TABLE `pc` (
  `id` int(222) NOT NULL,
  `prodid` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pc`
--

INSERT INTO `pc` (`id`, `prodid`) VALUES
(35, '202157209'),
(36, 'order20215720935'),
(37, 'orderorder2021572093536'),
(38, '202157209'),
(39, 'order20215720938');

-- --------------------------------------------------------

--
-- Table structure for table `rc`
--

CREATE TABLE `rc` (
  `id` bigint(20) NOT NULL,
  `courseId` int(110) NOT NULL,
  `resourceId` int(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rc`
--

INSERT INTO `rc` (`id`, `courseId`, `resourceId`) VALUES
(99, 61, 80);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` bigint(20) NOT NULL,
  `name` varchar(140) NOT NULL,
  `category` varchar(10) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `image` varchar(440) NOT NULL,
  `about` text NOT NULL,
  `skill1` varchar(250) NOT NULL,
  `skill2` varchar(250) NOT NULL,
  `skill3` varchar(250) NOT NULL,
  `skill4` varchar(450) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `name`, `category`, `amount`, `image`, `about`, `skill1`, `skill2`, `skill3`, `skill4`) VALUES
(80, 'Sample Resource', 'free', '0', '349852.png', '<span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">&nbsp;or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span>', 'sample', 'sample', 'sample', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `resources_files`
--

CREATE TABLE `resources_files` (
  `id` bigint(20) NOT NULL,
  `Rid` int(95) NOT NULL,
  `name` varchar(270) NOT NULL,
  `filename` varchar(900) NOT NULL,
  `filetype` varchar(20) NOT NULL,
  `title` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources_files`
--

INSERT INTO `resources_files` (`id`, `Rid`, `name`, `filename`, `filetype`, `title`) VALUES
(110, 80, 'Sample Resource', '54884sample (1).pdf', 'worksheet', 'Sample'),
(111, 80, 'Sample Resource', '42303production ID_4297124.mp4', 'video', 'File2');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(222) NOT NULL,
  `userid` varchar(999) DEFAULT NULL,
  `courseid` varchar(999) DEFAULT NULL,
  `username` varchar(999) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `type` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schoolinfo`
--

CREATE TABLE `schoolinfo` (
  `id` int(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lanme` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mob` int(33) NOT NULL,
  `userid` int(22) NOT NULL,
  `permissionask` varchar(400) NOT NULL,
  `country` varchar(400) NOT NULL,
  `state` varchar(400) NOT NULL,
  `city` varchar(400) NOT NULL,
  `completedschoolyears` int(255) NOT NULL,
  `vacantpositions` varchar(800) NOT NULL,
  `grade` varchar(450) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) NOT NULL,
  `slider` varchar(800) NOT NULL,
  `type` varchar(20) NOT NULL,
  `category` varchar(40) NOT NULL,
  `coupen` varchar(100) NOT NULL,
  `title` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider`, `type`, `category`, `coupen`, `title`) VALUES
(42, '61876bg2.png', 'image', 'home1', ' ', ''),
(43, '33108bg1.png', 'image', 'home2', ' ', ''),
(44, '21095bg1.png', 'image', 'resources', ' ', ''),
(45, '11513bg2.png', 'image', 'courses', ' ', ''),
(46, '41078bg2.png', 'image', 'blogs', ' ', ''),
(47, '25947bg2.png', 'image', 'faculty', ' ', '');

-- --------------------------------------------------------

--
-- Table structure for table `summit`
--

CREATE TABLE `summit` (
  `id` int(222) NOT NULL,
  `title` varchar(999) DEFAULT NULL,
  `video` varchar(999) DEFAULT NULL,
  `start` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `summitusers`
--

CREATE TABLE `summitusers` (
  `id` int(222) NOT NULL,
  `username` varchar(999) DEFAULT NULL,
  `userid` varchar(999) DEFAULT NULL,
  `type` varchar(999) DEFAULT NULL,
  `amount` varchar(999) DEFAULT NULL,
  `status` varchar(999) DEFAULT NULL,
  `date` varchar(400) DEFAULT NULL,
  `useremail` text DEFAULT NULL,
  `orderid` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `summit_info`
--

CREATE TABLE `summit_info` (
  `id` int(222) NOT NULL,
  `amount` varchar(999) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_token`
--

CREATE TABLE `tbl_user_token` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `token` varchar(500) DEFAULT NULL,
  `created_date` varchar(100) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacherinfo`
--

CREATE TABLE `teacherinfo` (
  `id` int(11) NOT NULL,
  `fname` varchar(400) NOT NULL,
  `lname` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL,
  `mob` varchar(200) NOT NULL,
  `userid` int(222) NOT NULL,
  `permissionask` varchar(400) NOT NULL,
  `country` varchar(400) NOT NULL,
  `state` varchar(400) NOT NULL,
  `city` varchar(400) NOT NULL,
  `currentschool` varchar(400) NOT NULL,
  `currentpos` varchar(400) NOT NULL,
  `age` varchar(400) NOT NULL,
  `experience` varchar(400) NOT NULL,
  `qualification` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacherinfo`
--

INSERT INTO `teacherinfo` (`id`, `fname`, `lname`, `email`, `mob`, `userid`, `permissionask`, `country`, `state`, `city`, `currentschool`, `currentpos`, `age`, `experience`, `qualification`) VALUES
(10, 'User', 'User', 'user@lms.com', '', 72, 'Yes', '-1', '', '', '', '', '18-25', '0', '12+'),
(11, 'Faculty', 'LMS', 'faculty@lms.com', '9999999999', 82, 'Yes', '-1', '', '', '', '', '18-25', '0', '12+');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `firstname` varchar(430) NOT NULL,
  `lastname` varchar(420) NOT NULL,
  `email` varchar(440) NOT NULL,
  `usertype` varchar(440) NOT NULL,
  `mob` varchar(440) NOT NULL,
  `password` varchar(440) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 0,
  `verified` int(11) NOT NULL DEFAULT 0,
  `code` varchar(30) NOT NULL,
  `lastlogin` varchar(410) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `usertype`, `mob`, `password`, `status`, `active`, `verified`, `code`, `lastlogin`) VALUES
(72, 'User', 'User', 'user@lms.com', 'teacher', '', 'password123', 0, 0, 1, '397811', NULL),
(82, 'Faculty', 'LMS', 'faculty@lms.com', 'faculty', '9999999999', 'password123', 0, 0, 1, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE `user_courses` (
  `id` bigint(20) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `subid` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `userid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_courses`
--

INSERT INTO `user_courses` (`id`, `category`, `subid`, `type`, `userid`) VALUES
(75, 'free', '  80', 'resource', '72');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `id` int(222) NOT NULL,
  `userid` varchar(222) DEFAULT '0',
  `notification` text DEFAULT NULL,
  `type` varchar(999) DEFAULT NULL,
  `dates` varchar(999) DEFAULT NULL,
  `subid` int(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`id`, `userid`, `notification`, `type`, `dates`, `subid`) VALUES
(124, '0', 'New  Resource Sample Resource Updated', 'resource', '08-04-2021', 80),
(125, '0', 'New course Sample Course 1 Updated', 'course', '08-04-2021', 61);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `token` varchar(80) NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessmentfile`
--
ALTER TABLE `assessmentfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussionchat`
--
ALTER TABLE `discussionchat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecert`
--
ALTER TABLE `ecert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_notification`
--
ALTER TABLE `faculty_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keyword`
--
ALTER TABLE `keyword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oc`
--
ALTER TABLE `oc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rc`
--
ALTER TABLE `rc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources_files`
--
ALTER TABLE `resources_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summit`
--
ALTER TABLE `summit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summitusers`
--
ALTER TABLE `summitusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summit_info`
--
ALTER TABLE `summit_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_token`
--
ALTER TABLE `tbl_user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacherinfo`
--
ALTER TABLE `teacherinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `assessmentfile`
--
ALTER TABLE `assessmentfile`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `discussionchat`
--
ALTER TABLE `discussionchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `ecert`
--
ALTER TABLE `ecert`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `faculty_notification`
--
ALTER TABLE `faculty_notification`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `keyword`
--
ALTER TABLE `keyword`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=418;

--
-- AUTO_INCREMENT for table `oc`
--
ALTER TABLE `oc`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `pc`
--
ALTER TABLE `pc`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `rc`
--
ALTER TABLE `rc`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `resources_files`
--
ALTER TABLE `resources_files`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `summit`
--
ALTER TABLE `summit`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `summitusers`
--
ALTER TABLE `summitusers`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `summit_info`
--
ALTER TABLE `summit_info`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_token`
--
ALTER TABLE `tbl_user_token`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacherinfo`
--
ALTER TABLE `teacherinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `user_courses`
--
ALTER TABLE `user_courses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
