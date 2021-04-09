-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2021 at 09:13 AM
-- Server version: 5.7.33
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chrysael_meet`
--
CREATE DATABASE IF NOT EXISTS `chrysael_meet` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `chrysael_meet`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` int(11) DEFAULT NULL,
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
  `summit` int(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `status`, `slider`, `resources`, `course`, `groups`, `blogs`, `faculty`, `msg`, `users`, `last_name`, `first_name`, `access_control`, `e_certificate`, `request`, `payment`, `count`, `summit`) VALUES
(1, 'faridah@chrysaellect.com', 'password123', 1, 1, 1, 1, NULL, 1, 1, 1, 1, 'Bawani', 'Faridah', 1, 1, 1, 1, 'All', 1),
(46, 'vipijith007@gmail.com', 'passw123', NULL, 0, 0, 1, NULL, 0, 1, NULL, NULL, 'n', 'Vipi', NULL, NULL, NULL, NULL, '2', NULL);

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

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id`, `title`, `course`, `file`, `facultyid`, `coursename`) VALUES
(1, 'css', '9', '37853sample (1).pdf', '6', 'css'),
(2, 'New', '18', '20208sample (1).pdf', '37', 'Sample'),
(3, 'CHRYSAELLECT', '18', '33287sample (1).pdf', '37', 'Sample');

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
  `feedback` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assessmentfile`
--

INSERT INTO `assessmentfile` (`id`, `title`, `userid`, `file`, `file2`, `useremail`, `subdate`, `courseid`, `marks`, `feedback`) VALUES
(1, 'css/css', '1', '15485sample (1).pdf', '37853sample (1).pdf', 'demo@gmail.com', '12/02/2021', 9, NULL, NULL),
(2, 'css/css', '6', '37438sample (1).pdf', '37853sample (1).pdf', 'vipijith007@gmail.com', '15/02/2021', 9, NULL, NULL),
(9, 'Sample/New', '9', '30312sample (2).pdf', '20208sample (1).pdf', 'sai@5thdt.com', '03/03/2021', 18, ' 34 ', 'this is a new feedback'),
(12, 'Sample/CHRYSAELLECT', '9', '17444sample (3).pdf', '33287sample (1).pdf', 'sai@5thdt.com', '05/03/2021', 18, ' 44 ', 'something');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) NOT NULL,
  `title` varchar(900) NOT NULL,
  `cover` varchar(420) NOT NULL,
  `image1` varchar(900) NOT NULL,
  `image2` varchar(900) NOT NULL,
  `about1` text NOT NULL,
  `about2` text NOT NULL,
  `author` varchar(400) NOT NULL,
  `authordetails` text NOT NULL,
  `authorimage` text NOT NULL,
  `authorid` varchar(40) NOT NULL,
  `publish` int(10) NOT NULL,
  `view` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `cover`, `image1`, `image2`, `about1`, `about2`, `author`, `authordetails`, `authorimage`, `authorid`, `publish`, `view`) VALUES
(18, 'Let\'s talk \'Products\' with a Purpose!', '27992cover.jpg', '89818img1.png', '11477img2.png', '<p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-weight: bolder;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">Let\'s Discuss: PRODUCT DRIVEN PROJECTS<o:p></o:p></span></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">Â </span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">In the midst of my nonstop cheerleading for process driven experiences, I wanted to make sure it was understood that I am also a very big fan of product driven projects/experiences... as long as they\'re done right!<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">After all, a (good) product driven \"product\" has so much to offer children, including the skills to :<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Plan<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Map<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Create<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Innovate<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Imagine<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Execute<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Problem-solve<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Evaluate<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Re-evaluate<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Arrange<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Rearrange<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Construct<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Reconstruct<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Focus<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Execute<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Collaborate<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Communicate, etc.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">But a couple of factors have to exist in order for successful product driven projects to come about, particularly these 3:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-weight: bolder;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">1. DEVELOPMENTALLY APPROPRIATE PRACTICE:<o:p></o:p></span></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">If you want children to create something specific, they should be able to do so from start to finish. If you have to do any or all of the cutting, shape designing, directing, reassembling, etc. it means the child is not quite there yet... AND THAT IS OKAY! During this stage is where children should be free to explore various art mediums to strengthen dexterity, hand eye coordination, familiarity with art properties, focus, etc. so they can later apply that knowledge and ability to challenge themselves with more specific (product driven) projects.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-weight: bolder;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">2. NOT RUSHED:<o:p></o:p></span></span></p><p></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">When we welcome anyone to take on a project, we always want to give the person time. No matter who they are. If we want children to have time to plan, think strategically, arrange, rearrange, revisit, revise, reflect, they need the time to do. Why do we so often engage in these one and done crafts? If its a matter of squeezing a million crafts/products in for the sake of quantity, we\'re surely sacrificing quality and actual thinking and learning. The more time we give them to explore, investigate, think, create, change, etc. the better the learning outcome will be!</span></p>', '<p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-weight: bolder;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">3. CHILD LED WITH THE INCLUSION OF OPEN ENDED MATERIALS:<o:p></o:p></span></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">Now let\'s say a child IS developmentally able to cut shapes, paste materials, draw symbols, etc. basically ready to create something more concrete/specific. We can take one of two routes... Child led or Teacher led. Let\'s look at a contrived example of two different classrooms learning about lions. Both classes will be invited to create their own lions, but notice the different approaches...<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-weight: bolder;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">TEACHER APPLE\'S CLASS (CHILD LED EXPERIENCE):<o:p></o:p></span></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">While learning more about lions, children have been invited to share their observations of a lions physical qualities (color, size, features, etc.), while utilizing real life images of lions as a guide. From their observations, children were then welcomed to gather and utilize materials from their home, classroom, nature etc. to try and construct a lion. Teacher had also gathered and offered various loose parts for the children to utilize. From start to finish, children:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Had autonomy and ownership over the materials they would use.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Had to think critically and creatively about how and why specific materials would be best to replicate/represent a lion. This involved comparing and contrasting materials to make most appropriate matches.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Were given the time and freedom to explore the different materials in various ways to achieve their goal.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Had not just one session to do this, but rather were welcomed to revisit their project throughout the week, adding to, removing, adjusting, etc. as needed.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Drew creative inspiration from their peers and the many different ways â€œlionsâ€ can emerge.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Teacherâ€™s were present to guide the children in their process, but not direct it.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- After the lion projects were finalized, children were invited to share their experience and creation with one another.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Teacher Apples printed the pictures she took of the children working on their lions, as well as pictures of their final product to display on the bulletin board. In addition to the pictures, Teacher Apples also explained the learning that took place during the process.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-weight: bolder;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">TEACHER BANANA\'S CLASS (TEACHER LED EXPERIENCE):<o:p></o:p></span></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Teacher Bananas found a â€œcuteâ€ lion craft on the internet, therefore she already has decided on what the outcome should/will look like.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Teacher Bananas cut out shapes and choose very specific materials for children to use.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Teacher Bananas directed children where to place pieces.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Teacher Bananas only gave them that one session to work on the lion, and since they were told how to do it from start to finish, children were done in about 5-10 minutes (compared to the children in Teacher Apples room who had a whole week to work).<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Teacher Bananas helped to â€œfixâ€ some parts after the children were done.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Teacher Bananas hung the lions up on a bulletin board, with no documentation that described the process.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-weight: bolder;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">VARIOUS OPEN ENDED MATERIALS:<o:p></o:p></span></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">When we want to provide children with a guide to refer to, opt for real life images. When we give them completed craft to model, it mostly likely means we\'re giving them the same exact materials we used to make said craft. That means we\'re drastically reducing the ability to practice creative thinking. More diverse selection of open ended materials, the greater the thinking and outcomes!<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-weight: bolder;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">CONSIDERATIONS:<o:p></o:p></span></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Think about classroom Apples and Bananas... If it was your child, which room would you rather they be in?<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- What room do you think the CHILDREN would rather be in?<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- Do you notice in Teacher Bananaâ€™s room, the teacher had more hands on experience than the children?<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- How or why is it beneficial to have a child replicate a craft? How can creative thinking and reasoning happen if children are basically given the \"answer?\"<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">- How can we stretch out these projects to make them more thought provoking and meaningful?<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">Can a process AND product driven experience coexist? Absolutely! A successful product driven experience actually requires value for the process, which leads to the finalized child-led product.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">Our image of the child must be high, first and foremost. We must realize that children don\'t need the overwhelming amount of direction placed upon them. Children are far more competent, capable, and creative than we give credit to..<o:p></o:p></span></p><p></p><p class=\"MsoNormal\" style=\"margin-bottom: 3.75pt; line-height: 21px; text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span arial\",sans-serif;mso-fareast-font-family:\"times=\"\" new=\"\" roman\";=\"\" color:#1c1e21;mso-fareast-language:en-in\"=\"\" style=\"font-size: 12pt; line-height: 24px;\">They CAN do it! So please, let them!</span></p>', 'Stephanie  Seidler', 'Founder - Cuddlebug Kids', '81419author.jpg', 'admin', 1, 35),
(22, 'Let\'s Talk Guided Art Experiences', '33697guided art experiences.jpg', '13110Imagine telling Picasso where to glue the eyes.png', '41216Imagine telling Picasso where to glue the eyes (1).png', '<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif\">Often\r\nwhen discussing the (overwhelming) benefits of process over product\r\nexperiences, many educators quite often respond with:<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"text-align:justify;text-indent:-18.0pt;\r\nline-height:150%;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><b><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:Arial\">1.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp; </span></span></b><!--[endif]--><b><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif\">\"I\r\nthink a mix of both is best!\"<o:p></o:p></span></b></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-align:justify;text-indent:-18.0pt;\r\nline-height:150%;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><b><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:Arial\">2.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp; </span></span></b><!--[endif]--><b><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif\">\"Children\r\nbenefit from a guide!\"<o:p></o:p></span></b></p><p class=\"MsoListParagraphCxSpLast\" style=\"text-align:justify;text-indent:-18.0pt;\r\nline-height:150%;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><b><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:Arial\">3.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp; </span></span></b><!--[endif]--><b><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif\">\"I\r\ngive my children the pieces but let them do whatever they want with them.\"<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif\">So,\r\nlet\'s address each one...<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><b><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif\">1.\r\n\"I think a mix of both is best!\"<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif\">Absolutely!\r\nHOWEVER, a meaningful product driven experience needs to be developmentally\r\nappropriate and will still focus on and favour the process in order to obtain\r\nthe product.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif\">Developmentally\r\nappropriate means children should be capable of creating said product on their\r\nown, meaning a teacher shouldn\'t have to do ANY cutting, directing,\r\nrearranging, etc. of materials. Expecting a toddler to create a \"cow\"\r\nfor \"Farm Week\" is not developmentally appropriate. In this case,\r\nthere is a big emphasis on product, and less interest in the process and making\r\nthis experience most meaningful and developmentally appropriate.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif\">Challenging\r\nchildren to create something concrete, such as a cow is fine when they\'ve\r\nobtained the skills to do so, independently. They should be provided with open\r\nended materials to attempt this, while teachers should avoid creating distinct\r\npre-cut pieces for the children. Children are the ones that should be welcomed\r\nto create the pieces on their own&nbsp; - THAT\r\nis the process! THAT is the learning! When we\'re doing the work for them, we\'re\r\nlimiting authentic learning.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><b><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif\">2.\r\n\"Children benefit from a guide!\" <o:p></o:p></span></b></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-ansi-language:\r\nEN-IN;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">When children are\r\nexploring a subject, its super beneficial to include real life images of said\r\ntopic. This can be really helpful in seeing/understanding the various aspects,\r\ndetails, parts, features, functions, etc. But why do we provide cartoon images\r\nor craft images instead? Why do we want them to replicate a craft? Why don\'t we\r\ngive children more respect by displaying the \"real thing?\"&nbsp;</span></p>', '<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif\">In the\r\nexample image below where children are invited to create penguins for their\r\n\"Polar Animal Investigation,\" notice the two \"polar\"\r\nopposite examples; one example is a teacher created craft penguin where pieces\r\nare already pre-cut. This experience will probably take less than 5 minutes.\r\nThere\'s hardly any room for creativity - scratch that, there is no room for\r\ncreativity. However, the second example is a real-life image of penguins, with\r\nblank paper and open ended creative utensils - offering an astonishing amount\r\nof benefits. In this experience, children can us the image as a guide, but\r\ncreate as they choose. Perhaps they draw inspiration from the penguins\r\nfeatures, but makes a super creative and unique penguin of their own. Maybe\r\nthey are laser focused on the baby and try replicate it. Maybe they want to\r\ncopy the image in its entirely and have to consider scale, shapes, format,\r\ncolor blending and matching, etc. This experience can go on for as long as the\r\nchildren are welcomed to explore.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><b><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif\">3.\r\n\"I give my children the pieces but let them do whatever they want with\r\nthem.\"<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif\">Typically\r\nwhen we have an experience where teachers say they let the children glue the\r\npieces on however they want (e.g. the mouth is on top of the head, it has five\r\neyes, etc.), usually means this is a developmentally inappropriate experience.\r\nIn this instance, we\'re welcoming children to create a concrete image, but\r\ntheir focus and interest is mainly on how to utilize glue and the pieces in a\r\nsuccessful way. They aren\'t in the stage where they can make recognizable\r\nimages yet, therefore we shouldn\'t pretend they are. If they\'re learning how to\r\nglue things down, let the experience be more open ended. Instead of a few pre-determined\r\npieces (eyes, nose, mouth), offer children various loose parts/craft items\r\n(different sizes, textures, shapes, colors, etc.) and just let them glue and\r\ndraw freely. Give them more materials and more time to keep practicing these\r\nskills. This will allow them to explore far longer (and with more interest)\r\nwhich will contribute far more to their fine motor and creative development.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:&quot;Arial&quot;,sans-serif\">What\r\nare your thoughts on providing a guide for children in their art experiences?<o:p></o:p></span></p>', 'Stephanie Seidler', 'Founder- Cuddlebug Kids', '36334Stephanie Seidler.jpg', 'admin', 1, 16),
(23, 'Rekindling your \'Why\' ', '74811why to question.jpg', '73682question (1).png', '86179question.png', '<p class=\"MsoNormal\" style=\"text-align:justify\"><b><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">Why is \"why\" so\r\nimportant?<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">This powerful little word can\r\npack a punch, welcoming us to:<o:p></o:p></span></p><ul><li style=\"text-align: justify;\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">-Reflect<o:p></o:p></span></li><li style=\"text-align: justify;\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">-Think<o:p></o:p></span></li><li style=\"text-align: justify;\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">-Research <o:p></o:p></span></li><li style=\"text-align: justify;\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">-Observe <o:p></o:p></span></li><li style=\"text-align: justify;\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">-Theorize<o:p></o:p></span></li><li style=\"text-align: justify;\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">-Make Connections<o:p></o:p></span></li><li style=\"text-align: justify;\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">-Imagine<o:p></o:p></span></li><li style=\"text-align: justify;\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">-Experiment, etc.<o:p></o:p></span></li></ul><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">I don\'t know about you, but\r\nthat sounds like a lot of cognitive perks to me!<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">As we know, children already\r\nhave wonderful innate tools to help them learn about the world around them.\r\nAlong with play, their evolving language is another powerful way to continuously\r\nlearn. And whereas dumping blocks out of a basket was a great lesson in cause\r\nand effect, how can you understand why the sky is blue? Or why dinosaurs aren\'t\r\nalive anymore?<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">Well, you can ask\r\n\"why!\"<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">And this is where the\r\nadults/teachers can take a one of two routes... we can give a quick answer to\r\nquickly address/resolve the wonder OR we can slow down the process and welcome\r\nchildren to think about the \"why\" as well...<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">\"Why do you think the sky\r\nis blue?\"<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">\"What do you notice/know\r\nabout the sky?\"<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">\"Is the sky always\r\nblue?\"<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">\"Is the sky blue in\r\nspace?\"<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">\"When/why are colours\r\ndifferent?\"<o:p></o:p></span></p>', '<p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">There\'s a million ways we can\r\nslow down and really think about this (example) - This concept should ideally\r\nbe incorporated in the classroom, as its a great way to initiate and sustain an\r\ninvestigation.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">Instead of focusing on\r\nchildren acquiring knowledge, how can we slow down the process to better foster\r\nactual learning? How can we utilize an emergent interest to think more\r\ncritically, to research, brainstorm, exchange ideas, draw conclusion, and to\r\nnot only ask \"why,\" but \"who,\" \"how,\"\r\n\"where,\" \"what\" and \"when?\" <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">Not only is asking and\r\nsupporting our children\'s \"why\" important, but its something we need\r\nto do for ourselves, in our own everyday practice. <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">I can recall supporting\r\nteachers who have had children with challenging behaviours in their classroom,\r\nand they would ask me \"what should I do when...?\" Well, the problem\r\nhere is that this is a reactive approach versus proactive. Before we look to\r\n\"fix\" the problem, we first have to understand the \"why\" -\r\nat least as best as we could. And this shift that welcomed teachers to think\r\n&amp; observe more critically (often) gave them the answers they were looking\r\nfor!<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">Never stop asking\r\n\"why!\"<o:p></o:p></span></p>', 'Stephanie Seidler', 'Founder- Cuddlebug Kids', '41790Stephanie Seidler.jpg', 'admin', 1, 14);

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

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `name`, `courseid`, `category`, `useremail`, `amount`, `cartchecked`, `cartstatus`, `cartuser`) VALUES
(9, 'what are the principles of counting', '  49', 'resource', 'vipijith007@gmail.com', '150', '0', '1', '14'),
(15, 'The Number Strand and Early Math', '  48', 'resource', 'vipijith007@gmail.com', '150', '0', '1', '14'),
(22, 'sample', '  15', 'course', 'vipijith007@gmail.com', '1', '1', '1', '14'),
(23, 'sample', '  15', 'course', 'alybawani@rediffmail.com', '1', '1', '1', '7'),
(26, 'Early math', '  12', 'course', 'vipijith007@gmail.com', '10', '1', '0', '38'),
(27, 'Early math', '  12', 'course', 'vipijith007@gmail.com', '10', '1', '1', '48');

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
(12, 'Early math', 'paid', '10', '46465Exploring Algebra in the Early Years.png', ' <p>SAMPLE</p> ', '2021-02-23', '2021-02-28', 'teaching early math', 'creating invitations', 'drama and math', 'learning by doing', 0, '0', 'module'),
(16, 'kinderoo sample', 'paid', '1', '53866The Number Strand and Early Math (3).png', '<p>sample</p>', '2021-02-25', '2021-03-25', 'Exploring Vincent Van Gogh\'s art', 'Exploring Vincent Van Gogh\'s art', 'Exploring Vincent Van Gogh\'s art', 'Exploring Vincent Van Gogh\'s art', 1, '40', 'course'),
(17, 'animation', 'free', '0', '51323Bulb.png', '<p>test demo</p>', '2021-02-25', '2021-02-25', 'none', 'time', 'people', 'course', 0, '0', 'module');

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
  `startdate` varchar(900) NOT NULL,
  `topic` text NOT NULL,
  `utype` varchar(222) NOT NULL,
  `title` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`id`, `course`, `courseid`, `username`, `userid`, `startdate`, `topic`, `utype`, `title`) VALUES
(6, 'Sample', 18, 'Sai Sashreek', 9, 'March 06 2021 19:01 pm', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been?', 'teacher', 'This is a new discussion');

-- --------------------------------------------------------

--
-- Table structure for table `discussionchat`
--

CREATE TABLE `discussionchat` (
  `id` int(11) NOT NULL,
  `discussionid` int(222) NOT NULL,
  `userid` int(22) NOT NULL,
  `username` varchar(950) NOT NULL,
  `message` text NOT NULL,
  `utype` varchar(222) NOT NULL,
  `senddate` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discussionchat`
--

INSERT INTO `discussionchat` (`id`, `discussionid`, `userid`, `username`, `message`, `utype`, `senddate`) VALUES
(6, 6, 37, 'Sample Sa', 'Answer from my part', 'faculty', 'March 06 2021 19:04 pm'),
(7, 6, 0, 'Admin <br> Chrysaellect India', 'okey', 'faculty', 'March 06 2021 19:05 pm');

-- --------------------------------------------------------

--
-- Table structure for table `ecert`
--

CREATE TABLE `ecert` (
  `id` int(222) NOT NULL,
  `studid` int(222) NOT NULL,
  `course` varchar(222) NOT NULL,
  `courseid` int(22) NOT NULL,
  `student` varchar(222) NOT NULL DEFAULT 'student',
  `hours` varchar(22) NOT NULL,
  `month` varchar(222) DEFAULT NULL,
  `email` varchar(222) NOT NULL,
  `status` int(22) NOT NULL,
  `certificate` varchar(987) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `title` varchar(222) DEFAULT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `imageName` varchar(450) DEFAULT NULL,
  `about` text,
  `email` varchar(450) NOT NULL,
  `mob` varchar(33) NOT NULL,
  `verified` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `title`, `fname`, `lname`, `imageName`, `about`, `email`, `mob`, `verified`) VALUES
(8, ' ', 'Faridah', 'Bawani', '47111faridah.png', 'Having over two decades of experience in early childhood education Faridah, an educationist is the founder of Chrysaellect Education Solutions, an organization that offers innovative, effective and research-based products and services that promote authentic learning opportunities relevant for our learners.\r\nHaving studied in Canada, Pakistan as well as in India and is qualified as an â€˜International Teacher Educatorâ€™ which equips her to provide professional development to teachers, trainers and principals. She holds two post graduation diplomas one in Early Childhood Education from New Zealand Tertiary College as well one in Education Management from SNDT University Mumbai. Faridah also has a Certification in â€˜Using Multiple Intelligences as a Tool to Help Students Learnâ€™ From Harvard Graduate School of Education- USA . She has been on the National Board of ITREB India heading the Preschool department for seven years. She is also the Territory Head of the Early Childhood Association India\r\n', 'faridah@chrysaellect.com', '9820013694', 1),
(9, '', 'Cathy Burckett', 'St. Laurent', '75076WhatsApp Image 2021-02-17 at 22.09.29.jpeg', 'Catherine Burckett -St Laurent is an American from Cincinnati, Ohio. She has a Bachelor of Early Years Education from the University of Cincinnati and a Master of Early Years Education from Cameron University. Over the last 25 years, she has been a teacher, trainer, manager, adjunct professor and has worked and lived in many different countries. Currently she is an educational consultant and runs her own business called Bee Creative Lab. She has been multiple municipal schools of Reggio Emilia , Italy several time and their methods and creativity with children  really inspired her ! This experience made her very passionate about creativity and she loves helping children express themselves in many different.  She is excited to share this knowledge with you!', 'cburckett@hotmail.com', '9234556789', 1),
(10, ' ', 'Paola ', ' Lopez', '56646kinderoo.png', 'Paola Lopez is the founder & executive Director at Kinderoo Children\'s Academy. Kinderoo is a state-licensed and -accredited Gold Seal Preschool and Toddler Early Learning Centre serving children ages 12 months-5 years based in Florida USA. The high-quality environments at Kinderoo offer young children opportunities to enhance their development and lay the groundwork for happy, healthy, and productive futures. The school provides authentic experiences that are relevant to children\'s daily lives. We have invited Paola and Kinderoo to Chrysaellect M.E.E.T as a contributor of learning stories and resources.', 'faridahbawani@hotmail.com', '9128352854', 1),
(18, '', 'Bongiswa Kotta', 'Ramushwana', '25011bongi new pic.jpg', 'Bongiswa Kotta- Ramushwana is from Eastern Cape she started her career in Storytelling at Zanendaba Storytelling Company in Johannesburg. She has participated in different platforms nationally and internationally, performed in schools, libraries, orphanages and attended different storytelling festivals around the world in. \r\nIn 2020 she launched her brain child Storytelling Festival called KingNdaba.  The festival was aimed at preschools and it was a success. Her passion is driven by the love of telling stories and she enjoys the company of her audience especially children, where she dances and sings with them.\r\n\r\n In India she has held several workshops in and performed at Vizag Junior Literature Festival, Bookaroo Festival, Udaipur Tales, Kathai Kalatta Under the Alamaram International Storytelling Festivals.\r\n\r\nShe serves in the board for Mogale Development Arts Company and Kindom Kids committee since 2016. Currently Bongiswa is working at Freedom Park Heritage Site in Pretoria as a professional Storyteller. \r\n', 'bongikotta@yahoo.com', '9820013694', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_notification`
--

CREATE TABLE `faculty_notification` (
  `id` int(222) NOT NULL,
  `userid` varchar(222) DEFAULT '0',
  `notification` text,
  `type` varchar(999) DEFAULT NULL,
  `dates` varchar(999) DEFAULT NULL,
  `sub` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_notification`
--

INSERT INTO `faculty_notification` (`id`, `userid`, `notification`, `type`, `dates`, `sub`) VALUES
(10, '26', 'You are assigned as a faculty of course Sample', 'faculty', '03-03-2021', NULL),
(11, '26', 'You are assigned as a faculty of  Resource  sample', 'faculty', '03-03-2021', NULL),
(12, '37', 'New Assessment Updated Successfully On  Sample', 'assessmnet', '03-03-2021', NULL),
(13, '37', 'New Assessment Updated Successfully On  Sample', 'assessmnet', '03-03-2021', NULL),
(14, '37', 'sai@5thdt.com Submitted Assessment On Course  Sample', 'assessmnet', '03-03-2021', NULL),
(15, '37', 'Successfully Submitted Assessment On Course  Sample', 'assessmnet', '03-03-2021', NULL),
(16, '37', 'Successfully Submitted Assessment On Course  Sample', 'assessmnet', '03-03-2021', NULL),
(17, '37', 'sai@5thdt.com Submitted Assessment On Course  Sample', 'assessmnet', '03-03-2021', NULL),
(18, '37', 'sai@5thdt.com Submitted Assessment On Course  Sample', 'assessmnet', '03-03-2021', NULL),
(19, '37', 'sai@5thdt.com Submitted Assessment On Course  Sample', 'assessmnet', '03-03-2021', NULL),
(20, '26', ' New Discussion Started On  Sample', 'discussion', '03-03-2021', NULL),
(21, '37', 'sai@5thdt.com Submitted Assessment On Course  Sample', 'assessmnet', '05-03-2021', NULL),
(22, '37', 'sai@5thdt.com Submitted Assessment On Course  Sample', 'assessmnet', '05-03-2021', NULL),
(23, '37', 'sai@5thdt.com Submitted Assessment On Course  Sample', 'assessmnet', '05-03-2021', NULL),
(24, '26', 'You are assigned as a faculty of course sample 2', 'faculty', '05-03-2021', NULL),
(25, '26', ' New Discussion Started On  Sample', 'discussion', '05-03-2021', NULL),
(26, '26', ' New Discussion Started On  Sample', 'discussion', '06-03-2021', NULL),
(27, '26', 'You are assigned as a faculty of course newthing', 'faculty', '06-03-2021', NULL),
(28, '10', 'You are assigned as a faculty of  Resource  Artist Series: Exploring Pablo Picasso', 'faculty', '08-03-2021', NULL),
(29, '30', 'You are assigned as a faculty of course ec', 'faculty', '09-03-2021', NULL),
(30, '8', 'You are assigned as a faculty of  Resource  Beans & Cups to Explore Place Value', 'faculty', '11-03-2021', NULL),
(31, '9', 'You are assigned as a faculty of  Resource  Elements of  Creative Classroom', 'faculty', '14-03-2021', NULL);

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

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `instructorId`, `resourceid`, `type`) VALUES
(1, 7, 9, 'course'),
(2, 7, 10, 'course'),
(3, 8, 11, 'course'),
(4, 10, 50, 'resource'),
(5, 8, 12, 'course'),
(6, 10, 52, 'resource'),
(7, 10, 53, 'resource'),
(8, 10, 16, 'course'),
(9, 8, 17, 'course'),
(10, 9, 54, 'resource'),
(11, 26, 18, 'course'),
(13, 26, 19, 'course'),
(14, 26, 20, 'course'),
(15, 10, 57, 'resource'),
(16, 30, 21, 'course'),
(17, 8, 59, 'resource'),
(18, 8, 62, 'resource'),
(19, 9, 64, 'resource');

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
(1, 'maths', 'Resource', 'Mathematics'),
(2, 'numbers', 'Resource', 'Mathematics'),
(3, 'calculations', 'Resource', 'Mathematics'),
(4, 'early math', 'Resource', 'Exploring Algebra in the Early Years'),
(5, 'patterns', 'Resource', 'Exploring Algebra in the Early Years'),
(6, 'algebra', 'Resource', 'Exploring Algebra in the Early Years'),
(160, 'early learning', 'Resource', 'Worksheets verses Manipulatives'),
(161, 'worksheets', 'Resource', 'Worksheets verses Manipulatives'),
(162, 'manipulatives', 'Resource', 'Worksheets verses Manipulatives'),
(163, 'early math', 'Resource', 'Exploring Lines with Sally the Snake'),
(164, 'geometry in early years', 'Resource', 'Exploring Lines with Sally the Snake'),
(165, 'lines', 'Resource', 'Exploring Lines with Sally the Snake'),
(166, 'early math', 'Resource', 'The Number Strand and Early Math'),
(167, 'numbers', 'Resource', 'The Number Strand and Early Math'),
(168, 'counting', 'Resource', 'The Number Strand and Early Math'),
(169, 'early math', 'Resource', 'what are the principles of counting'),
(170, 'counting', 'Resource', 'what are the principles of counting'),
(171, 'numbers', 'Resource', 'what are the principles of counting'),
(172, 'math', 'Resource', 'test'),
(173, 'science', 'Resource', 'test'),
(174, 'english', 'Resource', 'test'),
(175, 'preschool', 'Resource', 'test'),
(176, 'children', 'Resource', 'test'),
(177, 'nursery', 'Resource', 'test'),
(178, 'explorations', 'Resource', ' Exploring Spatial Relationships'),
(179, 'early learning', 'Resource', ' Exploring Spatial Relationships'),
(180, 'spatial relationships', 'Resource', ' Exploring Spatial Relationships'),
(194, 'early math', 'Course', 'Early math'),
(195, 'early learning', 'Course', 'Early math'),
(196, 'explorations', 'Course', 'Early math'),
(197, '1', 'Course', 'sample2'),
(198, '1', 'Course', 'sample2'),
(199, '1', 'Course', 'sample2'),
(200, '1', 'Course', 'sample2'),
(201, '1', 'Course', 'sample2'),
(202, '1', 'Course', 'sample2'),
(203, '2', 'Course', 'sample1'),
(204, '2', 'Course', 'sample1'),
(205, '2', 'Course', 'sample1'),
(206, '2', 'Course', 'sample1'),
(207, '2', 'Course', 'sample1'),
(208, '2', 'Course', 'sample1'),
(209, '2', 'Course', 'sz'),
(210, '2', 'Course', 'sz'),
(211, '2', 'Course', 'sz'),
(212, '2', 'Course', 'sa1'),
(213, '2', 'Course', 'sa1'),
(214, '2', 'Course', 'sa1'),
(215, 'curiosity', 'Resource', 'Invitations to promote Curiosity '),
(216, 'wonder', 'Resource', 'Invitations to promote Curiosity '),
(217, 'loose parts', 'Resource', 'Invitations to promote Curiosity '),
(218, 'Artist Series', 'Resource', 'Artist Series: Exploring Vincent Van Gog'),
(219, 'Vincent Van Gogh', 'Resource', 'Artist Series: Exploring Vincent Van Gog'),
(220, 'Immersive art', 'Resource', 'Artist Series: Exploring Vincent Van Gog'),
(221, 'v', 'Course', 'sample'),
(222, 'v', 'Course', 'sample'),
(223, 'v', 'Course', 'sample'),
(224, 'Artist Series', 'Course', 'kinderoo sample'),
(225, 'Artist Series', 'Course', 'kinderoo sample'),
(226, 'Artist Series', 'Course', 'kinderoo sample'),
(227, 'demo', 'Course', 'animation'),
(228, 'demo', 'Course', 'animation'),
(229, 'test', 'Course', 'animation'),
(230, 'Creativity', 'Resource', 'Creativity- An Introduction'),
(231, 'early years', 'Resource', 'Creativity- An Introduction'),
(232, 'curiosity ', 'Resource', 'Creativity- An Introduction'),
(233, 'v', 'Course', 'Sample'),
(234, 'v', 'Course', 'Sample'),
(235, 'v', 'Course', 'Sample'),
(236, 'v', 'Resource', 'sample'),
(237, 'v', 'Resource', 'sample'),
(238, 'v', 'Resource', 'sample'),
(239, 'Loose Parts', 'Resource', 'Loose Parts- A Guide for Beginners'),
(240, 'Creativity', 'Resource', 'Loose Parts- A Guide for Beginners'),
(241, 'Provocations', 'Resource', 'Loose Parts- A Guide for Beginners'),
(242, '23', 'Course', 'sample 2'),
(243, '213', 'Course', 'sample 2'),
(244, '2311', 'Course', 'sample 2'),
(245, 'v', 'Course', 'newthing'),
(246, 'v', 'Course', 'newthing'),
(247, 'v', 'Course', 'newthing'),
(248, 'Artist Series', 'Resource', 'Artist Series: Exploring Pablo Picasso'),
(249, 'Creativity', 'Resource', 'Artist Series: Exploring Pablo Picasso'),
(250, 'Process art', 'Resource', 'Artist Series: Exploring Pablo Picasso'),
(251, '1', 'Course', 'ec'),
(252, '2', 'Course', 'ec'),
(253, '2', 'Course', 'ec'),
(254, 'early math', 'Resource', 'Beans & Cups to Explore Place Value'),
(255, 'early learning', 'Resource', 'Beans & Cups to Explore Place Value'),
(256, 'place value', 'Resource', 'Beans & Cups to Explore Place Value'),
(257, 'early math', 'Resource', 'Exploring Attributes'),
(258, 'early learning', 'Resource', 'Exploring Attributes'),
(259, 'attributes', 'Resource', 'Exploring Attributes'),
(260, 'Creativity', 'Resource', 'Elements of  Creative Classroom'),
(261, 'early learning', 'Resource', 'Elements of  Creative Classroom'),
(262, 'explorations', 'Resource', 'Elements of  Creative Classroom');

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
(16, '  49', 'vipijith007@gmail.com', '1', 'order20219142035', '20/02/2021', 1, '14', 'what are the principles of counting', 'resource'),
(17, '  48', 'alybawani@rediffmail.com', '300', 'order2021172236', '22/02/2021', 0, '7', 'The Number Strand and Early Math', 'resource'),
(18, '  49', 'alybawani@rediffmail.com', '300', 'order2021172236', '22/02/2021', 0, '7', 'what are the principles of counting', 'resource'),
(19, '  49', 'alybawani@rediffmail.com', '150', 'order2021172237', '22/02/2021', 0, '7', 'what are the principles of counting', 'resource'),
(20, '  48', 'alybawani@rediffmail.com', '150', 'order2021272238', '22/02/2021', 0, '7', 'The Number Strand and Early Math', 'resource'),
(21, '  12', 'alybawani@rediffmail.com', '10', 'order2021272239', '22/02/2021', 1, '7', 'Early math', 'course'),
(22, '  15', 'vipijith007@gmail.com', '1', 'order20212142440', '24/02/2021', 1, '14', 'sample', 'course'),
(23, '  15', 'alybawani@rediffmail.com', '1', 'order2021272441', '24/02/2021', 1, '7', 'sample', 'course'),
(25, '  12', 'vipijith007@gmail.com', '10', 'order20212380343', '03/03/2021', 0, '38', 'Early math', 'course'),
(26, '  12', 'sai@5thdt.com', '10', 'order2021291444', '14/03/2021', 0, '9', 'Early math', 'course');

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
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(16, ''),
(17, ''),
(18, ''),
(19, ''),
(20, '20215715'),
(21, '20216615'),
(22, 'order2021661521'),
(23, '20216615'),
(24, '20216615'),
(25, '20216615'),
(26, 'order2021661525'),
(27, '20216615'),
(28, '20216615'),
(29, ''),
(30, '20214715'),
(31, '20216615'),
(32, '20214715'),
(33, '20217616'),
(34, '20218718'),
(35, '202191420'),
(36, '20211722'),
(37, '20211722'),
(38, '20212722'),
(39, '20212722'),
(40, '202121424'),
(41, '20212724'),
(42, '202123803'),
(43, '202123803'),
(44, '20212914');

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
(18, 16, 50),
(19, 16, 52),
(20, 16, 53),
(21, 17, 49),
(25, 21, 49),
(26, 21, 50);

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
(2, 'Exploring Algebra in the Early Years', 'free', '0', '38988Exploring Algebra in the Early Years .png', '\r\n                                     \r\n                                     \r\n                                     \r\n                                     \r\n                                     <p class=\"MsoNormal\" style=\"text-align: center;\"><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\"><b>Can our little children understand and do algebra?! What is\r\nalgebraic thinking?</b></span>\r\n<br class=\"Apple-interchange-newline\"></p><p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph\"><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\">In this video and PDF resource we shall explore the algebra strand in\r\nmath. That may sound ridiculous to introduce to our little children, but come\r\nto think of it algebraic thinking has a lot to do with patterns and\r\ngeneralizations. In fact patterns are one of the very first areas of\r\nmathematics that infants are capable of recognizing. Research has shown that\r\ninfants can perceive auditory patterns that they heard in the womb (for\r\ninstance their motherâ€™s voice and her heartbeat<i>)</i>. Recently research also\r\nsuggests that infants like to pay attention to visual patterns. A study in 2017\r\nfound that infants preferred the pattern of a human face (representations of\r\ntwo eyes with a mouth below) to other patterns!<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph\"><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\">So, infants are smart. But, how is that knowledge helpful\r\nto us? It turns out that much of our learning happens through making meaning\r\nfrom patterns in our environments. Children learn speech like that. They listen\r\nto you speak, recognize a pattern, make generalizations and speak themselves.\r\nSometimes these generalizations are incorrect but it makes you realize that the\r\nchildâ€™s little brain is tuned into the pattern of language. For example you\r\nmust have heard toddlers speak in sentences like â€˜I goed to the garden with my\r\ngrandmaâ€™. Now this toddlerâ€™s brain has tuned itself to the past tense rule of\r\nadding <i>â€œedâ€ at the end of an action word to refer to something that has\r\nalready happened. Â Children also begin to\r\nunderstand patterns of </i>Cause-and-effect, like patterns where a specific\r\naction is followed by a specific result (e.g.,Â <i>Every time I throw the toy\r\nfrom my high chair, it makes an interesting noise. Every time the door bell\r\nrings someone opens the door to let someone in </i>).<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph\"><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\">So how are patterns related to algebraic thinking? Algebraic\r\nthinking is about recognizing attributes, seeing patterns, being able to understand\r\nrelationships, make generalizations, extending the pattern and our little\r\nchildren do it all the timeâ€¦<o:p></o:p></span></p>      ', 'teaching early math', 'learning by doing', 'algebraic thinking', 'understanding patterns'),
(46, 'Worksheets verses Manipulatives', 'free', '0', '16321worksheets vs manipulatives.png', '\r\n                                     <p class=\"MsoNormal\" style=\"text-align: center; \"><b><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;\r\nline-height:115%;font-family:\"Arial\",sans-serif\">Â </span><span style=\"font-family: Arial, sans-serif; font-size: 12pt;\">Â </span><font face=\"Arial, sans-serif\"><span style=\"font-size: 16px;\">Worksheets verses Manipulatives</span></font></b></p><p class=\"MsoNormal\"><font face=\"Arial, sans-serif\"><span style=\"font-size: 16px;\"><br><div style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">If learning has to be impactful a child needs\r\nto go through</span><span style=\"font-size: 12pt;\">Â  </span><span style=\"font-size: 12pt;\">3 stages of learning\r\nexplorations:</span></div></span></font></p><ol><li style=\"text-align: justify; \"><span style=\"font-family: Arial, sans-serif; font-size: 12pt; text-indent: -18pt;\">Concrete stage- which means providing objects, toys, teaching\r\nlearning materials or manipulatives that children can touch and explore.</span></li><li style=\"text-align: justify; \"><span style=\"text-indent: -18pt; font-size: 12pt; line-height: 115%; font-family: Arial, sans-serif;\"><span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \"Times New Roman\";\">Â </span></span><span style=\"text-indent: -18pt; font-size: 12pt; line-height: 115%; font-family: Arial, sans-serif;\">Representational stage - or providing children pictorial\r\nrepresentations to children such as picture books, flashcards or worksheets</span></li><li style=\"text-align: justify; \"><span style=\"font-family: Arial, sans-serif; font-size: 12pt; text-indent: -18pt;\">Symbolic stage - where children are comfortable working\r\nwith symbols.</span></li></ol>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;\r\nline-height:115%;font-family:\"Arial\",sans-serif;mso-bidi-font-weight:bold\">One\r\ncould possibly think that manipulatives are only for the hands on learners or\r\nthe kinesthetic learner and visual learners, and therefore only certain\r\nchildren will benefit from these. But brain research as well as theorists and\r\neducators like Fredric Frobel and Maria Montessori suggest that all children\r\nbenefit from manipulative play. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align: justify;\"><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;\r\nline-height:115%;font-family:\"Arial\",sans-serif;mso-bidi-font-weight:bold\">So\r\nwhat are manipulatives? Well in the context </span><span style=\"font-size:12.0pt;\r\nmso-bidi-font-size:11.0pt;line-height:115%;font-family:\"Arial\",sans-serif\">of\r\neducation, they are physical tools of teaching, to engage children visually and\r\nkinesthetically with objects such as coins, blocks, puzzles, pebbles, etc. to\r\ndeepen an understanding of a concept. We know from brain research that the more\r\nconnections there are to an idea in the mind the better children understand a\r\nconcept and therefore the more likely they are to apply that knowledge of the\r\nconcept to their daily lives.<o:p></o:p></span></p>\r\n\r\n<span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\nmso-fareast-theme-font:minor-fareast;mso-ansi-language:EN-IN;mso-fareast-language:\r\nEN-IN;mso-bidi-language:AR-SA\"><div style=\"text-align: justify;\"><span style=\"font-size: 12pt;\">Itâ€™s extremely critical for teachers to know that\r\nthat providing opportunities to play with manipulatives has been shown in research\r\nto promote conceptual understanding in children and this is opposed to just\r\ngiving children only worksheets to complete that are related to the same topic.\r\nTherefore even assuming that oh this child seems particularly bright so I can\r\njust give him a worksheet to complete would be a mistake. Even </span><span style=\"font-size: 12pt;\">Frobel and Montessori believed that there is\r\na big difference between giving children things that they can move around,\r\ntouch, feel than images that a child can see on a workbook.</span></div></span><p class=\"MsoNormal\"></p> ', 'teaching early math', 'learning with concrete objects', 'concrete, representational and symbolic stage of learning', 'importance of hands on learning'),
(47, 'Exploring Lines with Sally the Snake', 'free', '0', '71935Exploring Lines with Sally the Snake.png', '\r\n                                     <p class=\"MsoNormal\" style=\"text-align: center;\"><span style=\"font-size:12.0pt;line-height:107%;font-family:\r\n\" arial\",sans-serif\"=\"\"><b>Exploring Lines with Sally the Snake</b></span></p><p class=\"MsoNormal\" style=\"text-align: center;\"><span style=\"font-size:12.0pt;line-height:107%;font-family:\r\n\" arial\",sans-serif\"=\"\"><b><br></b></span></p><p class=\"MsoNormal\" style=\"text-align: justify; \"><span style=\"font-family: Arial, sans-serif; font-size: 12pt;\">In this resource educators and parents will see one possibility to create an experience for children so they gain an understanding of lines; namely straight\r\nand curved lines. Lines are the basis of the Geometry strand in Math. Children\r\nwill also be given an opportunity to explore different lines they can make with\r\ntheir bodies. The experience will allow for children to practice using descriptive\r\nlanguage and observational skills. Children will begin to demonstrate an\r\nunderstanding that straight and curved lines make-up things all around us.</span></p>\r\n                                        ', 'drama and math', 'teaching early learning', 'exploring lines', 'music and movement to learn math'),
(48, 'The Number Strand and Early Math', 'paid', '100', '54468The Number Strand and Early Math.png', '\r\n                                     <p class=\"MsoNormal\"><o:p>Â </o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align: center; \"><span style=\"font-size:12.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\"><b>The Number Strand</b></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\"><br></span></p><p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\">The Number strand is a group of skills that allow children\r\nto work with numbers. It includes skills like:<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpFirst\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:115%;font-family:\"Arial\",sans-serif;\r\nmso-fareast-font-family:Arial\">1.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \"Times New Roman\";\">Â Â Â  </span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:115%;font-family:\"Arial\",sans-serif\">Understanding\r\nquantities.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:115%;font-family:\"Arial\",sans-serif;\r\nmso-fareast-font-family:Arial\">2.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \"Times New Roman\";\">Â Â Â  </span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:115%;font-family:\"Arial\",sans-serif\">Exploring\r\nconcepts like more, less, equal and larger and smaller.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:115%;font-family:\"Arial\",sans-serif;\r\nmso-fareast-font-family:Arial\">3.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \"Times New Roman\";\">Â Â Â  </span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:115%;font-family:\"Arial\",sans-serif\">Recognizing\r\nrelationships between single items and groups of items (four means one group of\r\nfour items).<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:115%;font-family:\"Arial\",sans-serif;\r\nmso-fareast-font-family:Arial\">4.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \"Times New Roman\";\">Â Â Â  </span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:115%;font-family:\"Arial\",sans-serif\">Understanding\r\nsymbols that represent quantities (5 means the same thing as the number name five).<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:115%;font-family:\"Arial\",sans-serif;\r\nmso-fareast-font-family:Arial\">5.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \"Times New Roman\";\">Â Â Â  </span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:115%;font-family:\"Arial\",sans-serif\">Making\r\nnumber comparisons (14 is greater than 4, and five is half of ten).<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoListParagraphCxSpLast\" style=\"text-indent:-18.0pt;mso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;line-height:115%;font-family:\"Arial\",sans-serif;\r\nmso-fareast-font-family:Arial\">6.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: \"Times New Roman\";\">Â Â Â  </span></span><!--[endif]--><span style=\"font-size:12.0pt;line-height:115%;font-family:\"Arial\",sans-serif\">Understanding\r\nthe order of numbers in a list: 1st, 2nd, 3rd, etc.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\"><span style=\"font-size:12.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\">Research suggests that toddlers seem to have an\r\nunderstanding of numbers 1 and 2. So if they are shown 1 object and 2 objects\r\nthey can tell they are not the same. They can even look at one object and say\r\nthatâ€™s one and two objects and say thatâ€™s two. As children grow a little older\r\nand during their initial explorations with numbers children may be able to\r\ndiscern between quantities 1,2,and 3 and after that itâ€™s just a lot or a\r\ncollection. In this resource we will explore what makes up the number strand\r\nand how it develops in the early years<o:p></o:p></span></p>\r\n                                        ', 'teaching early math', 'how do children learn counting', 'quantity association', 'one to one correspondence '),
(49, 'what are the principles of counting', 'paid', '100', '71774what are the principles of counting.png', '\r\n                                     \r\n                                     <p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><b><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\">Principles of Counting<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><b><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\">Â </span></b></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><b><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\">Â </span></b></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph\"><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\">There are 5 counting principles, 3 of which are absolutely\r\nessential. The first two go hand in hand. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph\"><b><span style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:115%;font-family:\"Arial\",sans-serif\">Stable Order</span></b><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\"> i.e. the children need to know their number names in\r\norder. So you will begin your counting with number 1 and then move forward and\r\ncount 2,3,4,5,6â€¦. With practice children will learn that the order of number\r\nnames does not change. So sing all your number rhymes with your children,\r\nprovide lots of manipulatives to count and model counting. Â Â <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph\"><b><span style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:115%;font-family:\"Arial\",sans-serif\">One to One Correspondence</span></b><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\"> is the next principle you combine stable order. As young\r\nchildren learn to count they must remember to match each object with only one\r\nnumber name. This process in known as one to one correspondence.Â  In your child care settings or at home you\r\nwill observe that children count an object more than once and therefore making\r\na mistake. To overcome this, use objects children can manipulate, place them in\r\na container and ask the children to count them as they remove them. This will reduce\r\nthe possibility of children recounting the objects and they will associate 1\r\nnumber name with one object. We also use one to one correspondence when we compare\r\ntwo groups of objects. For example, if there are 4 tea cups and each cup has a\r\nsaucer then you know there are 4 saucers as well. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph\"><b><span style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:115%;font-family:\"Arial\",sans-serif\">Cardinality</span></b><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif;mso-bidi-font-weight:bold\">- In mathematics, the cardinality\r\nof a set is a measure of the \"number of elements\" of the set. For\r\nexample, if you look at a collection of apples how do you know how many there\r\nare? Well, you count them. </span><span style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:115%;font-family:\"Arial\",sans-serif\">When you count, the\r\nlast number name you say; tells you the total number in the group. Children\r\nneed to learn the last number they say tells them the property of the whole\r\ngroup. It answers the question how many? In mathematics we call this property\r\nof a group itâ€™s cardinality. For example, the cardinality of the collection of\r\napples is 7 as the last counting number we gave to this collection was seven.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph\"><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\">How can you as teachers and parents encourage this\r\nunderstanding of cardinality in children? Well, we need to provide repeated\r\ncounting encounters. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph\"><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\">The last two principles are demonstrated by efficient\r\ncounters. The first is <b>â€˜abstractionâ€™</b>\r\nwhich means you can count any set of objects even if they may not necessarily\r\nlook similar. So if there are a few blocks, and a few pebbles as well as some\r\ncounters and we decide to make them all as one set we can count them as a whole.\r\nAbstraction also means that we can count things that we may not be able to see\r\nor touch for example how many times can you hear the beat of a drum? How many\r\nshadows can you see? As children progress they will realise there are certain\r\nthings we can count and cannot count. For example, we cannot count air, or\r\nwater.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph\"><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n\"Arial\",sans-serif\">The last counting principle is <b>order irrelevance.</b> As your children gain experience with count they\r\nwill soon realize that it does not matter where they begin counting, they also\r\nlearn that the order they begin counting the objects does not affect the\r\nquantity i.e. it is irrelevant. So as teachers and parents we need to provide\r\nchildren with lots of objects they can touch and feel. Demonstrate counting,\r\nencouraging them to count starting from a different object in the same group\r\nevery time.<o:p></o:p></span></p>\r\n                                         ', 'teaching early math', 'principles of counting', 'errors in counting', 'helping children with counting'),
(50, ' Exploring Spatial Relationships', 'free', '0', '80336The Number Strand and Early Math (3).png', '\r\n                                     <p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\"></span></p><p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom: 0cm; text-align: center; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size:12.0pt;line-height:\r\n150%;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Using Light and Shadow as a Tool to\r\nUnderstanding Spatial Perception<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><br></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\"><br></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">â€œOur visual and tactile world\r\nconsists of objects situated in space. Gaining an understanding of the\r\nattributes of those objects and where they are (and especially how we can get\r\nto them!) are some of the most important aspects of development in a young childâ€™s\r\nlife.â€ â€“ Linda Platas <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Spatial awareness is the ability to\r\nunderstand the relationship between where we are in the environment and where\r\nother things are. Spatial perception is formed by two processes:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN;mso-no-proof:yes\"><!--[if gte vml 1]><v:shapetype\r\n id=\"_x0000_t75\" coordsize=\"21600,21600\" o:spt=\"75\" o:preferrelative=\"t\"\r\n path=\"m@4@5l@4@11@9@11@9@5xe\" filled=\"f\" stroked=\"f\">\r\n <v:stroke joinstyle=\"miter\"/>\r\n <v:formulas>\r\n  <v:f eqn=\"if lineDrawn pixelLineWidth 0\"/>\r\n  <v:f eqn=\"sum @0 1 0\"/>\r\n  <v:f eqn=\"sum 0 0 @1\"/>\r\n  <v:f eqn=\"prod @2 1 2\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelWidth\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @0 0 1\"/>\r\n  <v:f eqn=\"prod @6 1 2\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelWidth\"/>\r\n  <v:f eqn=\"sum @8 21600 0\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @10 21600 0\"/>\r\n </v:formulas>\r\n <v:path o:extrusionok=\"f\" gradientshapeok=\"t\" o:connecttype=\"rect\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"t\"/>\r\n</v:shapetype><v:shape id=\"Picture_x0020_6\" o:spid=\"_x0000_i1026\" type=\"#_x0000_t75\"\r\n alt=\"âœ”ï¸\" style=\'width:12pt;height:12pt;visibility:visible;mso-wrap-style:square\'>\r\n <v:imagedata src=\"file:///C:/Users/FARIDAH/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png\"\r\n  o:title=\"âœ”ï¸\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><img width=\"16\" height=\"16\" src=\"file:///C:/Users/FARIDAH/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png\" alt=\"âœ”ï¸\" v:shapes=\"Picture_x0020_6\"><!--[endif]--></span><b><span style=\"font-size:\r\n12.0pt;line-height:150%;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#050505;mso-fareast-language:EN-IN\">Exteroceptive\r\nprocesses:</span></b><span style=\"font-size:12.0pt;line-height:150%;font-family:\r\n\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";color:#050505;\r\nmso-fareast-language:EN-IN\"> The processes that build representations about our\r\nspace through the senses (the environment that surrounds us).<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN;mso-no-proof:yes\"><!--[if gte vml 1]><v:shape\r\n id=\"Picture_x0020_5\" o:spid=\"_x0000_i1025\" type=\"#_x0000_t75\" alt=\"âœ”ï¸\"\r\n style=\'width:12pt;height:12pt;visibility:visible;mso-wrap-style:square\'>\r\n <v:imagedata src=\"file:///C:/Users/FARIDAH/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png\"\r\n  o:title=\"âœ”ï¸\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><img width=\"16\" height=\"16\" src=\"file:///C:/Users/FARIDAH/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png\" alt=\"âœ”ï¸\" v:shapes=\"Picture_x0020_5\"><!--[endif]--></span><b><span style=\"font-size:\r\n12.0pt;line-height:150%;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#050505;mso-fareast-language:EN-IN\">Interoceptive\r\nprocesses:</span></b><span style=\"font-size:12.0pt;line-height:150%;font-family:\r\n\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";color:#050505;\r\nmso-fareast-language:EN-IN\"> The processes that build representations about our\r\nbody, such as position or orientation (our posture and what is related to our\r\nbody).<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">When we speak of spatial perception,\r\n\"space\" is usually understood as what surrounds us: objects,\r\nelements, people, etc. However, space is also part of our thinking, since it is\r\nthere where we gather all the data of our lived experience. Good spatial\r\nperception allows us to understand the disposition of our environment and our\r\nrelationship with it. Spatial perception also consists of understanding the\r\nrelationship of objects when there is a change of position in space. It helps\r\nus to think in two and three dimensions, which allows us to visualize objects\r\nfrom different angles and recognize them regardless of the perspective from\r\nwhich we see them.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">For this invitation, we integrated\r\nthe interest of light and shadow into our investigation of spatial relations,\r\nas it relates to size (big and small shadows).<o:p></o:p></span></p><p>\r\n                                       </p> ', 'creating invitations', 'exploring spatial relationships through light and shadows', 'investigations', 'doccumentations'),
(52, 'Invitations to promote Curiosity ', 'free', '0', '15832Gianoâ€™s Birthday and the Mystery Guest!.png', '<p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: center;\"><span style=\"font-size: 12pt; line-height: 24px; font-family: Arial, sans-serif;\"><span style=\"font-weight: bolder;\"><span style=\"font-size: 12pt; line-height: 17.12px;\">Gianoâ€™s Birthday and the Mystery Guest!&nbsp;</span></span></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify;\"><span style=\"font-size: 12pt; line-height: 24px; font-family: Arial, sans-serif;\"><br></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify;\"><span style=\"font-size: 12pt; line-height: 24px; font-family: Arial, sans-serif;\"><br></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify;\"><span style=\"font-size: 12pt; line-height: 24px; font-family: Arial, sans-serif;\">Giano absolutely LOVES dinosaurs, so Ms. Jenny and Ms. Genesis made sure to include several fun dinosaur-inspired invitations at the party, as well as a rock-solid awesome birthday â€˜cakeâ€™ created by the children using an assortment of loose parts.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify;\"><span style=\"font-size: 12pt; line-height: 24px; font-family: Arial, sans-serif;\">But just when they thought the party couldnâ€™t get any better, a special guest arrived, who made a BIG scene. Using Ms. Jennyâ€™s special magic phone, the children were able to observe none other than a giant T-Rex stomping around their playground! The children were ecstatic!</span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 21px; text-align: justify;\"><span style=\"font-size: 12pt; line-height: 24px; font-family: Arial, sans-serif;\"><br></span></p><span style=\"font-size: 12pt; line-height: 17.12px; font-family: Arial, sans-serif;\"><div style=\"text-align: justify;\"><span style=\"font-size: 12pt; line-height: 17.12px;\">When the children looked into the phone, they were able to see their dinosaur friend. However, when they looked onto the playground, he wasnâ€™t there anymore! Everyone wondered how this could be so.&nbsp;</span><span style=\"font-size: 12pt; line-height: 17.12px;\">The children began to create stories and develop hypotheses about the happenings and existence of their new friend. After several minutes of watching the dinosaur through the magic phone, the children began to wonder where he was in reality. Ms. Jenny and Ms. Genesis were impressed with their use of prepositional phrases as they excitedly engaged in dialogue (none of the children were fearful or anxious which makes us wonder if they perceived the dinosaur as real or imaginary).</span></div><div style=\"text-align: justify;\"><span style=\"font-size: 12pt; line-height: 17.12px;\"><br></span></div><div style=\"text-align: justify;\"><span style=\"font-size: 12pt; line-height: 17.12px;\"><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Norah P.: â€œHe is on my back! Itâ€™s going to bite me!â€ As she declared this, she smiled with excitement and began to look for the dinosaur<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Douglas: Noticed the dinosaur disappeared from the phone screen and wondered where it wentâ€¦ â€œIn the tree!â€ He approached the tree and touched the trunk, wondering if the dinosaur lived within the tree.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Lucas: â€œDinosaur is close!â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Emma: â€œDinosaur is walking around.â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Giano: â€œDinosaur is big! Giano is not big.â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Angela: Pointed towards the where the dinosaur was walking on the phone, â€œDinosaur!â€</span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Maddox: â€œT-Rex!â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Logan: â€œRoar!!!â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><br></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Using her phone, Ms. Jenny directed the dinosaur to hide behind the playground tree, â€œWhere do you think the dinosaur is hiding?â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Lucas: Had a worried look on his face as he wondered where the dinosaur was, â€œI donâ€™t know.â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Norah P.: Pointed up, â€œIn the skyâ€¦ up on the tree!â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Douglas: â€œHe is in the tree.â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Logan: Began to look all over the playground, â€œDinosaur, where are you?â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Emma: â€œOn the fence!â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">David: Pointed to the tree and touched it.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><br></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">As the children continued to search the playground and develop theories, they came across a dried lizard close to the tree. Since it was so close to where they thought the dinosaur lived (within the tree), they assumed that it must be his food!<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Lucas: â€œThe dinosaur eat it!â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Logan: â€œNooooo, itâ€™s sleeping!â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\">Angela: Wanted to protect the lizard, shielding it from those who wanted to touch it.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\"><o:p>&nbsp;</o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; line-height: 24px;\"><span style=\"font-size: 12pt; line-height: 24px;\"><o:p><span style=\"font-size: 12pt; line-height: 17.12px;\">Throughout the entire experience, the children were baffled by the dinosaur as they tried to determine if it was real or not based off of what they were experiencing! After their party, Ms. Jenny and Ms. Genesis showed them a video of the dinosaur exploring the playground as they were investigating the invitations. The children were so surprised to see the dinosaur playing with them and wondering how they had missed him! They are determined to learn more about this mystery guest of theirs that lives right here on their playgroundâ€¦</span></o:p></span></p><div><span style=\"font-size: 12pt; line-height: 24px;\"><o:p><span style=\"font-size: 12pt; line-height: 17.12px;\"><br></span></o:p></span></div></span></div></span>\r\n                                       ', 'How to create invitations to promote curiosity and wonder', 'working with loose parts', 'encouraging children to hypothesize', 'How children wonder');
INSERT INTO `resources` (`id`, `name`, `category`, `amount`, `image`, `about`, `skill1`, `skill2`, `skill3`, `skill4`) VALUES
(53, 'Artist Series: Exploring Vincent Van Gogh', 'free', '0', '31097Artist Series_ Exploring Vincent Van Gogh.png', '\r\n                                     <p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom: 0cm; text-align: center; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size:12.0pt;line-height:\r\n150%;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Artist Series: Exploring Vincent Van\r\nGogh<o:p></o:p></span></b></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom: 0cm; text-align: center; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size:12.0pt;line-height:\r\n150%;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Â </span></b></p>\r\n\r\n<p class=\"MsoNormal\" align=\"center\" style=\"margin-bottom: 0cm; text-align: center; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><b><span style=\"font-size:12.0pt;line-height:\r\n150%;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Â </span></b></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">â€œWhen children are exposed to any\r\nartistic activity, the brain is stimulated from sounds, movements, colours and\r\nsizes; neural connections increase, and the brain is exercised and\r\nstrengthened. The process is of greater benefit for children three years and under\r\nsince their brain is maturing and is highly sensitive to external stimuli.\r\nArtistic activities foster intellectual development and stimulate both sides of\r\nthe brain.â€ â€“ IBA Boston<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Â </span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Art is a language that embraces and\r\nutilizes all of the senses, enabling individuals to develop and express their\r\nideas and emotions. Artistic activities are embedded with multiple processes\r\nand discoveries that help us to grow and freely express our creativity.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Â </span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Art is not a new concept to our\r\nchildren; they absolutely love it! This summer, Ms. Sandra and Ms. Lupita\r\nintroduced the children to a variety of world-renowned artists to expose the\r\nchildren to different forms and techniques of art. Last week, the children\r\nstudied Dutch Post-Impressionist painter Vincent Van Gogh and enjoyed\r\ninteracting with his aesthetic art pieces and then creating their own\r\nrepresentations.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Ms. Sandra and Ms. Lupita have\r\ntransformed the classrooms into an art gallery using the collective works from\r\nthe children throughout their study!</span><span style=\"color:black;mso-color-alt:\r\nwindowtext\"> </span><o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Â </span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><!--[if gte vml 1]><v:shapetype id=\"_x0000_t75\"\r\n coordsize=\"21600,21600\" o:spt=\"75\" o:preferrelative=\"t\" path=\"m@4@5l@4@11@9@11@9@5xe\"\r\n filled=\"f\" stroked=\"f\">\r\n <v:stroke joinstyle=\"miter\"/>\r\n <v:formulas>\r\n  <v:f eqn=\"if lineDrawn pixelLineWidth 0\"/>\r\n  <v:f eqn=\"sum @0 1 0\"/>\r\n  <v:f eqn=\"sum 0 0 @1\"/>\r\n  <v:f eqn=\"prod @2 1 2\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelWidth\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @0 0 1\"/>\r\n  <v:f eqn=\"prod @6 1 2\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelWidth\"/>\r\n  <v:f eqn=\"sum @8 21600 0\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @10 21600 0\"/>\r\n </v:formulas>\r\n <v:path o:extrusionok=\"f\" gradientshapeok=\"t\" o:connecttype=\"rect\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"t\"/>\r\n</v:shapetype><v:shape id=\"Picture_x0020_4\" o:spid=\"_x0000_s1026\" type=\"#_x0000_t75\"\r\n alt=\"No photo description available.\" style=\'position:absolute;left:0;\r\n text-align:left;margin-left:267.1pt;margin-top:31.1pt;width:207.45pt;height:190.4pt;\r\n z-index:251658240;visibility:visible;mso-wrap-style:square;\r\n mso-width-percent:0;mso-height-percent:0;mso-wrap-distance-left:9pt;\r\n mso-wrap-distance-top:0;mso-wrap-distance-right:9pt;\r\n mso-wrap-distance-bottom:0;mso-position-horizontal:absolute;\r\n mso-position-horizontal-relative:margin;mso-position-vertical:absolute;\r\n mso-position-vertical-relative:text;mso-width-percent:0;mso-height-percent:0;\r\n mso-width-relative:margin;mso-height-relative:margin\'>\r\n <v:imagedata src=\"file:///C:/Users/FARIDAH/AppData/Local/Temp/msohtmlclip1/01/clip_image001.jpg\"\r\n  o:title=\"No photo description available\"/>\r\n <w:wrap type=\"square\" anchorx=\"margin\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><!--[endif]--><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif;\r\nmso-fareast-font-family:\"Times New Roman\";color:#050505;mso-fareast-language:\r\nEN-IN\">Inspired by the <b>Atelier des LumiÃ¨res </b>digital art centre in Paris,\r\nMs. Sandra and Ms. Lupita set up an immersive visual installation of Van Goghâ€™s\r\nThe Starry Night using digital projections. After reading the story <b>â€œKatie\r\nand the Sunflowersâ€</b>, written by James Mayhew, the children were invited to\r\ninteract with the digital painting, to observe and analyse every detail, colour\r\nand swirl, just as Katie does in the story. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">With this experience, the children\r\nbecame a part of the painting, totally immersed in its elements!</span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\"><o:p><br></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">They were also encouraged to paint\r\ntheir own The Starry Night onto an aluminium canvas using brilliant shades of\r\nblue, yellow and white and cotton swabs as their tool!<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN;mso-no-proof:yes\"><!--[if gte vml 1]><v:shapetype\r\n id=\"_x0000_t75\" coordsize=\"21600,21600\" o:spt=\"75\" o:preferrelative=\"t\"\r\n path=\"m@4@5l@4@11@9@11@9@5xe\" filled=\"f\" stroked=\"f\">\r\n <v:stroke joinstyle=\"miter\"/>\r\n <v:formulas>\r\n  <v:f eqn=\"if lineDrawn pixelLineWidth 0\"/>\r\n  <v:f eqn=\"sum @0 1 0\"/>\r\n  <v:f eqn=\"sum 0 0 @1\"/>\r\n  <v:f eqn=\"prod @2 1 2\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelWidth\"/>\r\n  <v:f eqn=\"prod @3 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @0 0 1\"/>\r\n  <v:f eqn=\"prod @6 1 2\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelWidth\"/>\r\n  <v:f eqn=\"sum @8 21600 0\"/>\r\n  <v:f eqn=\"prod @7 21600 pixelHeight\"/>\r\n  <v:f eqn=\"sum @10 21600 0\"/>\r\n </v:formulas>\r\n <v:path o:extrusionok=\"f\" gradientshapeok=\"t\" o:connecttype=\"rect\"/>\r\n <o:lock v:ext=\"edit\" aspectratio=\"t\"/>\r\n</v:shapetype><v:shape id=\"Picture_x0020_3\" o:spid=\"_x0000_i1027\" type=\"#_x0000_t75\"\r\n alt=\"ðŸ“\" style=\'width:12pt;height:12pt;visibility:visible;\r\n mso-wrap-style:square\'>\r\n <v:imagedata src=\"file:///C:/Users/FARIDAH/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png\"\r\n  o:title=\"ðŸ“\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><img width=\"16\" height=\"16\" src=\"file:///C:/Users/FARIDAH/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png\" alt=\"ðŸ“\" v:shapes=\"Picture_x0020_3\"><!--[endif]--></span><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif;\r\nmso-fareast-font-family:\"Times New Roman\";color:#050505;mso-fareast-language:\r\nEN-IN\">Observations:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><!--[if gte vml 1]><v:shape id=\"Picture_x0020_5\" o:spid=\"_x0000_s2050\"\r\n type=\"#_x0000_t75\" alt=\"No photo description available.\" style=\'position:absolute;\r\n left:0;text-align:left;margin-left:277.35pt;margin-top:2.05pt;width:179.2pt;\r\n height:238.95pt;z-index:251659264;visibility:visible;mso-wrap-style:square;\r\n mso-width-percent:0;mso-height-percent:0;mso-wrap-distance-left:9pt;\r\n mso-wrap-distance-top:0;mso-wrap-distance-right:9pt;\r\n mso-wrap-distance-bottom:0;mso-position-horizontal:absolute;\r\n mso-position-horizontal-relative:margin;mso-position-vertical:absolute;\r\n mso-position-vertical-relative:text;mso-width-percent:0;mso-height-percent:0;\r\n mso-width-relative:margin;mso-height-relative:margin\'>\r\n <v:imagedata src=\"file:///C:/Users/FARIDAH/AppData/Local/Temp/msohtmlclip1/01/clip_image002.jpg\"\r\n  o:title=\"No photo description available\"/>\r\n <w:wrap type=\"square\" anchorx=\"margin\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><!--[endif]--><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif;\r\nmso-fareast-font-family:\"Times New Roman\";color:#050505;mso-fareast-language:\r\nEN-IN\">Jaxon: â€œWow, I love everything. Itâ€™s great! I want to paint.â€</span><span style=\"color:black;mso-color-alt:windowtext\"> </span><span style=\"font-size:\r\n12.0pt;line-height:150%;font-family:\"Arial\",sans-serif;mso-fareast-font-family:\r\n\"Times New Roman\";color:#050505;mso-fareast-language:EN-IN\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Aiden: Preferred to only use the blue\r\nshades, â€œI like to paint!â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Josiah: Focused as he drew different\r\ntypes of lines using dark blue paint.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Barrett: Enjoyed mixing the colour\r\nblue with the colour yellow (perhaps he was noticing how the two colours\r\ncreated green when mixed together.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Fenix: Used a cotton swab to make a\r\ncircle and then coloured it in. After, he broke his cotton swab but stated,\r\nâ€œItâ€™s okay!â€<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Catalina: Used white and yellow to\r\ncreate most of her The Starry Night painting. She enjoyed mixing the colours\r\ntogether. <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Amelia: Was so excited to use a new\r\ntool to paint, the cotton swabs. Her favourite colour was blue!<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Â </span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">For more information on the Immersive\r\nVan Gogh art exhibit, visit: <a href=\"https://www.youtube.com/watch?v=7dHzYoBV-EU\">https://www.youtube.com/watch?v=7dHzYoBV-EU</a>\r\n<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Â </span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">The read aloud of the story <a href=\"https://www.youtube.com/watch?v=9GxAYT5E7Oo\">https://www.youtube.com/watch?v=9GxAYT5E7Oo</a>\r\n<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">Â </span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN;mso-no-proof:yes\"><!--[if gte vml 1]><v:shape\r\n id=\"Picture_x0020_2\" o:spid=\"_x0000_i1026\" type=\"#_x0000_t75\" alt=\"ðŸ“¸\"\r\n style=\'width:12pt;height:12pt;visibility:visible;mso-wrap-style:square\'>\r\n <v:imagedata src=\"file:///C:/Users/FARIDAH/AppData/Local/Temp/msohtmlclip1/01/clip_image004.png\"\r\n  o:title=\"ðŸ“¸\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><img border=\"0\" width=\"16\" height=\"16\" src=\"file:///C:/Users/FARIDAH/AppData/Local/Temp/msohtmlclip1/01/clip_image004.png\" alt=\"ðŸ“¸\" v:shapes=\"Picture_x0020_2\"><!--[endif]--></span><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif;\r\nmso-fareast-font-family:\"Times New Roman\";color:#050505;mso-fareast-language:\r\nEN-IN\">Lupita Matamoros and Sandra Patricia Greis<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN;mso-no-proof:yes\"><!--[if gte vml 1]><v:shape\r\n id=\"Picture_x0020_1\" o:spid=\"_x0000_i1025\" type=\"#_x0000_t75\" alt=\"ðŸ“\"\r\n style=\'width:12pt;height:12pt;visibility:visible;mso-wrap-style:square\'>\r\n <v:imagedata src=\"file:///C:/Users/FARIDAH/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png\"\r\n  o:title=\"ðŸ“\"/>\r\n</v:shape><![endif]--><!--[if !vml]--><img border=\"0\" width=\"16\" height=\"16\" src=\"file:///C:/Users/FARIDAH/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png\" alt=\"ðŸ“\" v:shapes=\"Picture_x0020_1\"><!--[endif]--></span><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif;\r\nmso-fareast-font-family:\"Times New Roman\";color:#050505;mso-fareast-language:\r\nEN-IN\">Redactions: Chelsie Collier<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 0cm; text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:12.0pt;line-height:150%;\r\nfont-family:\"Arial\",sans-serif;mso-fareast-font-family:\"Times New Roman\";\r\ncolor:#050505;mso-fareast-language:EN-IN\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</span></p><p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">Â </span></p>\r\n                                        ', 'Exploring Vincent Van Gogh\'s art', 'Process Art', 'Exploring Immersive Art', 'Using art as a medium to promote explorations and learning'),
(54, 'Creativity- An Introduction', 'free', '0', '31876Creativity in the Early Years - An Introduction.png', '\r\n                                     <p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">What do\r\nyou think of when you see or hear the words â€œBeing creativeâ€ or â€œcreativityâ€? <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">Perhaps\r\nimages of children doing art or people who express themselves through their\r\nwork or even in their daily life experiences. Some may associate creativity\r\nwith people who are ingeniousness, resourceful or think â€˜outside the boxâ€™.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">Â Some of us may particularly associate\r\ncreativity to designers, artists, dancers, writers or even actors. Â But come to think of it even entrepreneurs,\r\ninventors, scientists and architects come up with original, progressive ideas\r\nor technologies. Creativity can even be seen in daily pursuits like cooking,\r\ngardening or even interacting with children. Creativity can also be\r\ncharacterised by the ability to perceive the world in new ways, to find hidden\r\npatterns, to make connections between seemingly unrelated phenomena, and to\r\ngenerate new possible solutions. Keep the above discussion as a backdrop, would\r\nyou consider yourself or people you know of to be creative? <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">What\r\nabout people who think or feel they are not creative? Have you observed how\r\nthey justify or explain their lack of creativeness? Could it be possible they\r\nare already engaging in creative thinking or endeavours, but they are not\r\nrealizing that their actions are creative?<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">A 2012\r\nAdobe study on creativity shows 8 in 10 people feel that unlocking creativity\r\nis critical to economic growth and nearly two-thirds of respondents feel\r\ncreativity is valuable to society, yet a striking minority â€“ only 1 in 4 people\r\nâ€“ believe they are living up to their own creative potential.<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">What\r\nwords or phrases stand out to you as you read the following quotes? How do you\r\ndefine creativity or creative individuals?<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">â€œCreativity\r\nis intelligence having fun!â€.- Albert Einstein<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">\"the\r\nprocess of having original ideas that have value\"-Sir <span style=\"color: rgb(32, 33, 36); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Ken Robinson<o:p></o:p></span></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size: 12pt; line-height: 150%; font-family: Arial, sans-serif; color: rgb(32, 33, 36); background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">â€œCreativeness is the ability to see\r\nrelationships where none exist.â€ Thomas Disch, <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">\"Creativity\r\nmust represent something different, new, innovative, appropriate to the task at\r\nhand, useful, and relevant.\" (Kaufman, 2009, p. 19)<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">\"Creativity\r\nis allowing yourself to make mistakes. Art is knowing which ones to keep.\"<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">(Adams,\r\n1996 in Kauffman, p. 20)<o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">This\r\nresource is a part of the course on â€˜Creativity in the Early Years Classroomâ€™\r\nIt will help you understand what creativity is, the significance of creative\r\nexpression for childrenâ€™s learning and how can we create environments that\r\nfoster creativity, creative thinking and expression. <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">You will\r\nalso have an opportunity to explore and reflect on your views on your own\r\ncreativity and how that can have an impact on what you do with children and families,\r\nin your early childhood facilities. Â <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">Â </span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><a href=\"https://www.businesswire.com/news/home/20120423005601/en/Study-Reveals-Global-Creativity-Gap\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">https://www.businesswire.com/news/home/20120423005601/en/Study-Reveals-Global-Creativity-Gap</span></a><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\"> <o:p></o:p></span></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-align:justify;line-height:150%\"><a href=\"https://www.creativityatwork.com/2012/03/23/can-creativity-be-taught/\"><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\">https://www.creativityatwork.com/2012/03/23/can-creativity-be-taught/</span></a><span style=\"font-size:12.0pt;line-height:150%;font-family:\"Arial\",sans-serif\"> <o:p></o:p></span></p>  ', 'What does creativity mean?', 'Exploring the definition of creativity', 'Linking creativity and the Early Years', 'exploring who can be creative'),
(56, 'Loose Parts- A Guide for Beginners', 'free', '0', '89932Creativity in the Early Years - An Introduction (1).png', '<h2><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;\r\nline-height:115%;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:Calibri;\r\nmso-fareast-theme-font:minor-latin;mso-ansi-language:EN-IN;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\"><span style=\"font-size: 12pt; color: rgb(33, 37, 41);\">â€˜Loose partsâ€™ is a wonderful\r\nterm coined by architect Simon Nicholson, who carefully considered landscapes\r\nand environments that form connections. Nicholson believed that we are all\r\ncreative and that loose parts in an environment empower our creativity.&nbsp;</span></span><span style=\"font-size: 12pt; line-height: 115%; font-family: Arial, sans-serif;\"><span style=\"font-size: 12pt;\">Many play experts and early childhood educators adapted the theory of loose\r\nparts. Loose Parts&nbsp;</span></span><span style=\"font-family: Arial, sans-serif; font-size: 12pt;\">can be open-ended materials that can be\r\nmanipulated, designed, dismantled and reconstructed in multiple ways.</span></h2>', 'Exploring loose parts', 'how can loose parts be used', 'what makes up loose parts', 'how can we create invitations with loose parts?'),
(57, 'Artist Series: Exploring Pablo Picasso', 'free', '0', '29035Artist Series_ Exploring Pablo Picasso.png', '<div style=\"font-family: inherit;\"><div class=\"\" dir=\"auto\" style=\"font-family: inherit;\"><div class=\"ecm0bbzt hv4rvrfc ihqw7lf3 dati1w0a\" data-ad-comet-preview=\"message\" data-ad-preview=\"message\" id=\"jsc_c_m\" style=\"padding: 4px 16px 16px; font-family: inherit;\"><div class=\"j83agx80 cbu4d94t ew0dbk1b irj2b8pg\" style=\"flex-direction: column; margin-bottom: -5px; margin-top: -5px; display: flex; font-family: inherit;\"><div class=\"qzhwtbm6 knvmm38d\" style=\"margin-top: 5px; margin-bottom: 5px; font-family: inherit;\"><span class=\"d2edcug0 hpfvmrgz qv66sw1b c1et5uql rrkovp55 a8c37x1j keod5gw0 nxhoafnm aigsh9s9 d3f4x2em fe6kdd0r mau55g9w c8b282yb iv3no6db jq4qci2q a3bd9o3v knj5qynh oo9gr5id hzawbc8m\" dir=\"auto\" style=\"line-height: 1.3333; display: block; overflow-wrap: break-word; max-width: 100%; min-width: 0px; font-size: 0.9375rem; color: var(--primary-text); word-break: break-word; font-family: inherit;\"><div class=\"kvgmc6g5 cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\"><br></div><div dir=\"auto\" style=\"font-family: inherit;\"><br></div><div dir=\"auto\" style=\"font-family: inherit;\">The Overhead Projector can be a<span style=\"font-family: inherit; color: var(--primary-text); font-size: 0.9375rem;\"> magical tool that gives children the opportunity to explore infinite concepts. </span><span style=\"font-family: inherit; color: var(--primary-text); font-size: 0.9375rem;\">Overhead projectors have been a constant presence in Reggio schools. They are tools for making interesting discoveries! When children place objects on its surface, they are able to see their projections against a white backdrop or a surface. Exploring materials with the overhead projector enables children to create magical giant-sized sceneries, stories, and even art as seen in the project below:</span></div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\"><b>Picassoâ€™s Shapes</b></div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\">Pablo Picasso was a Spanish painter and sculptor most associated with his contributions to the Cubism art movement. The children were immediately drawn to the colors and shapes used in Picassoâ€™s art, especially the more abstract pieces. They enjoyed identifying the different geometric shapes they could find in his images.</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\">Noticing the childrenâ€™s fascination with this element of his work, Ms. Lupita and Ms. Sandra presented the children with a color and shape proposal where they could manipulate different size and color shapes to create their own abstract transient art! In doing so, the children utilized the overhead projector, translucent shapes and an array of shape manipulatives on the platform. Using Picassoâ€™s paintings as inspiration, the children had fun arranging their own shapes to create images and stories.</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\">After exploring shapes through transient art, the children were invited to create a permanent abstract art piece. To do so, they were presented with a variety of shapes and were encouraged to use their imagination and creativity to create a work of art by gluing the shapes in whatever manner they wanted. The children were so excited to create and share their Picasso-inspired masterpieces!</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\"><b><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"ðŸ“\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tcc/1/16/1f4dd.png\" style=\"border: 0px;\"></span> Observations:</b></div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\">Zoey: Enjoyed creating a â€œhappy faceâ€ using a triangle, circles and a rectangle. She was also observing labeling the colors â€˜purpleâ€™, â€˜redâ€™ and â€˜greenâ€™.</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\">Barrett: â€œI want to do a sad face because my friend Jaxon did a happy face.â€ For his creation, he used different colors with only large, medium and small circle shapes.</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\">Fenix: â€œI create with shapes and using yellow, red, green, pink and purple to make a railroad.â€</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\">Amelia: â€œI built my house with nine different shapes and color and counted nine colors!â€</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\">Catalina: Was extremely intentional in each shape and color she chose for her masterpiece.</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\">Jaxon: Chose to create a â€œhappy face with two eyesâ€ using four different shapes. He enjoyed squeezing the glue to make the pieces stick to the paper!</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\">Aiden: Created a â€œsunshineâ€ using three different shapes, a circle, rectangles and a triangle.</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\">Skills and Standards Observed:</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"âœ”ï¸\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" style=\"border: 0px;\"></span>Artistic expression </div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"âœ”ï¸\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" style=\"border: 0px;\"></span>Hand-eye coordination </div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"âœ”ï¸\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" style=\"border: 0px;\"></span>Curiosity and interest </div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"âœ”ï¸\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" style=\"border: 0px;\"></span>Shape recognition </div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"âœ”ï¸\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" style=\"border: 0px;\"></span>Color recognition</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"âœ”ï¸\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" style=\"border: 0px;\"></span>Integration of technology</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"âœ”ï¸\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" style=\"border: 0px;\"></span>Properties of light and shadow</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"âœ”ï¸\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" style=\"border: 0px;\"></span>Fine motor development</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"âœ”ï¸\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" style=\"border: 0px;\"></span>Art appreciation and evaluation</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"âœ”ï¸\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" style=\"border: 0px;\"></span>Counting</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"âœ”ï¸\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t51/1/16/2714.png\" style=\"border: 0px;\"></span>Imagination and creativity</div></div><div class=\"o9v6fnle cxmmr5t8 oygrvhab hcukyx3x c1et5uql ii04i59q\" style=\"overflow-wrap: break-word; margin: 0.5em 0px 0px; white-space: pre-wrap; font-family: inherit;\"><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"ðŸ“¸\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tde/1/16/1f4f8.png\" style=\"border: 0px;\"></span> Lupita Matamoros and Sandra Patricia Greis</div><div dir=\"auto\" style=\"font-family: inherit;\"><span class=\"pq6dq46d tbxw36s4 knj5qynh kvgmc6g5 ditlmg2l oygrvhab nvdbi5me sf5mxxl7 gl3lb2sf hhz5lgdu\" style=\"margin: 0px 1px; height: 16px; width: 16px; display: inline-flex; vertical-align: middle; font-family: inherit;\"><img height=\"16\" width=\"16\" alt=\"ðŸ“\" referrerpolicy=\"origin-when-cross-origin\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tcc/1/16/1f4dd.png\" style=\"border: 0px;\"></span> Redactions: Chelsie Collier</div></div></span></div></div></div></div><div class=\"l9j0dhe7\" id=\"jsc_c_n\" style=\"position: relative; font-family: inherit;\"><div class=\"stjgntxs ni8dbmo4\" style=\"overflow: hidden; font-family: inherit;\"></div></div></div>\r\n                                       ', 'Exploring Picasso\'s art', 'conducting explorations with the over head projector', 'exploring shapes in art', '.');
INSERT INTO `resources` (`id`, `name`, `category`, `amount`, `image`, `about`, `skill1`, `skill2`, `skill3`, `skill4`) VALUES
(59, 'Introduction to Early Math', 'free', '0', '35739Introduction to Early Math .png', '<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><b><span style=\"font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif\">Introduction\r\nTo Early Math<o:p></o:p></span></b></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">Many people wonder what math\r\nlooks like in an early childhood classroom. Is it just about learning to say\r\nthe numerals by rote, and writing the numbers names 1-100? <o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">This series of sessions will\r\nprovide a clear picture about what strands and skills must be developed through\r\nan early years math programme so that children have a strong foundation. We\r\nwill explore how these skills and math strands can be woven into the curriculum\r\nand activities in the classroom.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">The NEP 2020 in points 2.1 and\r\n2.2 also state the urgency and importance of imparting quality math and\r\nliteracy programmes in the foundational years. It states â€˜The ability to read\r\nand write, and perform basic operations with numbers, is a necessary foundation\r\nand an indispensable prerequisite for all future schooling and lifelong\r\nlearning.â€™<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">Attaining foundational\r\nliteracy and numeracy for all children will thus become an urgent national\r\nmission. How are we going to attain the vision? Well, the first steps will be\r\nto understand as teachers, educators and parents what a quality early math\r\nprogram must include? The next would be to get skilled to provide opportunities\r\nfor children to use hands on manupilatives and materials to strengthen their\r\nunderstanding of Math through our daily interactions with them.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align:justify\"><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\">In this resource we will\r\ndiscuss</span><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif\"> 5 content areas of Math or\r\nrather 5 strands of math namely:<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpFirst\" style=\"text-align:justify;text-indent:-18.0pt;\r\nmso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;\r\nmso-bidi-font-size:11.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:Arial\">1.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:107%;font-family:\r\n&quot;Arial&quot;,sans-serif\">Number and Number operations<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-align:justify;text-indent:-18.0pt;\r\nmso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;\r\nmso-bidi-font-size:11.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:Arial\">2.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:107%;font-family:\r\n&quot;Arial&quot;,sans-serif\">Algebra<o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-align:justify;text-indent:-18.0pt;\r\nmso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;\r\nmso-bidi-font-size:11.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:Arial\">3.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:107%;font-family:\r\n&quot;Arial&quot;,sans-serif\">Geometry <o:p></o:p></span></p><p class=\"MsoListParagraphCxSpMiddle\" style=\"text-align:justify;text-indent:-18.0pt;\r\nmso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;\r\nmso-bidi-font-size:11.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:Arial\">4.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:107%;font-family:\r\n&quot;Arial&quot;,sans-serif\">Measurement<o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoListParagraphCxSpLast\" style=\"text-align:justify;text-indent:-18.0pt;\r\nmso-list:l0 level1 lfo1\"><!--[if !supportLists]--><span style=\"font-size:12.0pt;\r\nline-height:107%;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:Arial\">5.<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;\r\n</span></span><!--[endif]--><span style=\"font-size:12.0pt;mso-bidi-font-size:\r\n11.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif\">Data analysis and representation&nbsp;</span><span style=\"font-size:12.0pt;line-height:107%;font-family:&quot;Arial&quot;,sans-serif\"><o:p></o:p></span></p>\r\n                                       ', '', '', '', ''),
(61, 'Place Value in the early Years', 'paid', '100', '14019Introduction to Early Math  (1).png', '<p style=\"text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:black\"><br></span></p><p style=\"text-align: center; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:black\"><b>Exploring Place Value in the Early Years</b></span></p><p style=\"text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:black\"><br></span></p><p style=\"text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:black\">When children count, they basically learn numbers as a kind of â€˜continuumâ€™\r\nthat goes on and on.&nbsp; With simple counting children might not catch on to\r\nthe inherent structure of the number system, and how it is built with&nbsp;groups&nbsp;of\r\ntens, hundreds, thousands, and so on.<o:p></o:p></span></p>\r\n\r\n<p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:black\">For\r\nchildren to understand place value, they need to first be able to name, numbers,\r\ndo simple additions and subtractions with small numbers, and&nbsp;</span><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:green\">explore counting</span><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:black\">&nbsp;in groups (or\r\nskip-counting). They need to explore the idea that if you have lots and lots of\r\nobjects, the efficient way is to&nbsp;count them in groups, not individually.<o:p></o:p></span></p>\r\n\r\n<p style=\"text-align: justify; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:&quot;Arial&quot;,sans-serif;\r\ncolor:black\">In this resource we are introduced to aspects about place value\r\nthat make it a challenging concept for children to understand. We also explore ideas\r\nas to how we can make the understanding of this concept more concrete.&nbsp;<o:p></o:p></span></p>', '', '', '', ''),
(62, 'Beans & Cups to Explore Place Value', 'paid', '100', '22908Beans & Cups Game for Place Value  (1).png', '<p><br></p><p style=\"text-align: justify; line-height: 150%; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family:&quot;Arial&quot;,sans-serif;color:black\">Place value understanding\r\nplays a key role in the mathematical understanding of a child. It is essential\r\nto have a strong foundation in place value in order to achieve success in\r\nmaking sense of our number system (based on the digits 0-9), counting, adding\r\nmultiple-digit numbers, money and many other math skills. For this reason, it\r\nis important that place value not be taught in isolation for a few weeks but\r\nthat it be integrated all year long into the math program. In order to develop\r\nplace value concepts, activities should involve concrete models, practice using\r\nplace value language orally, illustrations and symbols. The activities should\r\nfocus on one or more of the following three main components of place value: grouping\r\nactivities, giving oral names for numbers and written symbols for the concepts.\r\nIn this resource we explore the concept of grouping and regrouping to build up\r\non an understanding of place value. <o:p></o:p></span></p><p>\r\n\r\n</p><p class=\"MsoNormal\" style=\"text-align:justify\"><o:p>&nbsp;</o:p></p>', 'exploring place value in the early years', 'Introduction to early math', '.', '.'),
(63, 'Exploring Attributes', 'paid', '100', '12338Connecting Attributes and Patterns (1).png', '<p class=\"MsoNormal\" style=\"text-align: center;\"><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n&quot;Arial&quot;,sans-serif\"><b>Exploring Attributes&nbsp;</b></span></p><p class=\"MsoNormal\" style=\"text-align:justify;text-justify:inter-ideograph\"><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n&quot;Arial&quot;,sans-serif\"><br></span></p><p style=\"text-align:justify;text-justify:inter-ideograph\"><span style=\"font-size:12.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n&quot;Arial&quot;,sans-serif\">This resource is an exploration where children get to think\r\nabout the fact that something can be same and different at the same time\r\ndepending on the attribute you pay attention to. An attribute is a\r\ncharacteristic or a quality in a person or a thing. For example the shape of\r\nsomething is an attribute, the colour or texture of something is also an\r\nattribute. In case of people long hair is an attribute, black eyes is an\r\nattribute. You could also have attributes that are not visible like\r\nintelligence or sense of humour. When children can tune into and pay attention\r\nto different attributes of objects or even things around them they are then\r\nready to do matching, sorting, pairing and patterning. In this video you will\r\nobserve how Deen who is 5 can look for and identify same and different\r\nattributes in two attribute cards.&nbsp;</span></p>\r\n                                       ', 'exploring attributes', '.', '.', '.'),
(64, 'Elements of  Creative Classroom', 'paid', '150', '16376Connecting Attributes and Patterns (2).png', ' ', 'what are the elements of a creative classroom?', '.', '.', '.');

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
(1, 2, 'Exploring Algebra in the Early Years', '54194algebraic thinking worksheet.pdf', 'worksheet', 'Exploring Algebra in the Early Years'),
(45, 2, 'Exploring Algebra in the Early Years', '82391Algebra.mp4', 'video', 'algebra in t'),
(46, 46, 'Worksheets verses Manipulatives', '15973worksheets vs manipulatives.mp4', 'video', 'worksheets v/s manipulatives'),
(47, 47, 'Exploring Lines with Sally the Snake', '10095Sally Snake.mp4', 'video', 'exploring lines through drama'),
(48, 48, 'The Number Strand and Early Math', '85986Number strand video final.mp4', 'video', 'The Number Strand and Early Math'),
(49, 49, 'what are the principles of counting', '46054Principles of counting.mp4', 'video', 'what are the principles of counting'),
(50, 50, ' Exploring Spatial Relationships', '50657Kinderoo Shadows.mp4', 'video', 'Exploring Spatial Relationships'),
(51, 50, ' Exploring Spatial Relationships', '86274Using Light and Shadow as a Tool to Understanding Spatial Perception.pdf', 'article', 'exploring Spatial Relationships'),
(53, 52, 'Invitations to promote Curiosity ', '19198Giano\'s surprise birthday guest.mp4', 'video', 'Invitations to  promote  Curiosity'),
(54, 52, 'Invitations to promote Curiosity ', '58556Giano\'s birthday and the mystery guest.pdf', 'article', 'article'),
(55, 53, 'Artist Series: Exploring Vincent Van Gog', '47129van gogh.mp4', 'video', 'Artist Series: Exploring  Van Gogh'),
(56, 53, 'Artist Series: Exploring Vincent Van Gog', '86799Van gogh.pdf', 'article', 'Artist Series: Exploring Van Gogh'),
(57, 54, 'Creativity- An Introduction', '46283intro to creativity low rez.mp4', 'video', 'Creativity - An introduction'),
(58, 54, 'Creativity- An Introduction', '10407intro to creativity.pdf', 'article', 'Creativity '),
(60, 56, 'Loose Parts- A Guide for Beginners', '58321A Loose Parts Guide (1).pdf', 'article', 'Loose Parts Play'),
(61, 57, 'Artist Series: Exploring Pablo Picasso', '47040picasso art.mp4', 'video', 'Artist Series: Exploring Pablo Picasso'),
(62, 59, 'Introduction to Early Math', '85078intro to math1.mp4', 'video', 'Early math'),
(63, 61, 'Place Value in the early Years', '17028Place Value.mp4', 'video', 'place value'),
(64, 61, 'Place Value in the early Years', '3766210\'s drawer.pdf', 'activity', 'printable'),
(65, 62, 'Beans & Cups to Explore Place Value', '27958Bean cup place value.mp4', 'video', 'Beans & Cups'),
(66, 63, 'Exploring Attributes', '84212Attributes.mp4', 'video', 'attributes'),
(67, 64, 'Elements of  Creative Classroom', '26286elements of a creative classroom1.mp4', 'video', 'creative classroom');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(222) NOT NULL,
  `userid` varchar(999) DEFAULT NULL,
  `courseid` varchar(999) DEFAULT NULL,
  `username` varchar(999) DEFAULT NULL,
  `comment` text,
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
(7, '35688Every teacher needs to improve, not because they are not good enough, but because they can be even better (1).png', 'image', 'home3', ' ', ''),
(8, '15541meet home slider.png', 'image', 'home5', ' ', ''),
(10, '46441meet home slider 3 (1).png', 'image', 'home2', ' ', ''),
(12, '19338resourses slider.png', 'image', 'resources', ' ', ''),
(13, '69311courses slider.png', 'image', 'courses', ' ', ''),
(15, '86795blog slider.png', 'image', 'blogs', ' ', ''),
(18, '20906home slider 2.png', 'image', 'home4', ' ', ''),
(20, '31175slider vodeo.mp4', 'video', 'home1', ' ', ''),
(21, '27477faculty slider.png', 'image', 'faculty', ' ', '');

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
  `useremail` text,
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

--
-- Dumping data for table `summit_info`
--

INSERT INTO `summit_info` (`id`, `amount`) VALUES
(1, '1');

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
(1, 'Anaya', 'Thakur', 'chrysaellect@hotmail.com', '9821079808', 11, 'Yes', '-1', '', '', '', '', '18-25', '0', '12+'),
(2, 'Mirza Virani', 'Mirza ', 'mirzav54@gmail.com', '9820744016', 13, 'Yes', '-1', '', '', '', '', '18-25', '0', '12+'),
(3, 'Niranjan', 'Badle ', 'badle.niranjan@gmail.com', '+917776036036', 35, 'Yes', 'India', 'Maharashtra', 'Badlapur', 'Kilbil Preschool', 'Director', '26-35', '5 to 8', 'Bachelors'),
(4, 'Priya', 'Niyogi', 'priyaneogi12@gmail.com', '9966883734', 49, 'Yes', 'India', 'Karnataka', 'bangalore', '5thdt', 'teacher', '18-25', '1 to 2', 'B.Ed'),
(5, 'SAPNA', 'RAYANI', 'rayani.sapna@gmail.com', '09819846128', 51, 'Yes', 'India', 'Maharashtra', 'MUMBAI', '', '', '36-45', '0', '12+'),
(6, 'Sucheeta', 'Shah', 'sucheetasioni@gmail.com', '7600851626', 52, 'Yes', 'India', 'Gujarat', 'Ahmedabad ', '', '', '36-45', '12 to 15', 'ECCE'),
(7, 'Sucheeta', 'Shah', 'sucheetasioni@gmail.com', '7600851626', 52, 'No', '-1', '', '', '', '', '18-25', '0', '12+'),
(8, 'Suma', 'Nalawadi', 'hellokids.mudita604@gmail.com', '9482436700', 53, 'Yes', 'India', 'Karnataka', 'Hubballi', 'Hello kids Mudita', 'Branch owner', '36-45', '1 to 2', 'Post Grad'),
(9, 'Sabna', 'Niyas', 'sabna.niyas@gmail.com', '0502179692', 54, 'Yes', 'United Arab Emirates', 'Dubayy (Dubai)', 'Sharjah', 'Delhi  private school', 'Educator ', '26-35', '2 to 5', 'Post Grad'),
(10, 'Jigisha', 'Shah', 'jigisha_malay@yahoo.com', '09327008115', 56, 'Yes', 'India', 'Gujarat', '', '', '', '36-45', '8 to 12', 'Post Grad'),
(11, 'Jigisha', 'Shah', 'Jigisha8111@gmail.com', '09327008115', 59, 'Yes', 'India', 'Gujarat', 'AHMEDABAD', '', 'Educator ', '36-45', '8 to 12', 'B.Ed');

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
  `status` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `verified` int(11) NOT NULL DEFAULT '0',
  `code` varchar(30) DEFAULT NULL,
  `lastlogin` varchar(410) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `usertype`, `mob`, `password`, `status`, `active`, `verified`, `code`, `lastlogin`) VALUES
(7, 'Aly', 'Bawani', 'alybawani@rediffmail.com', 'teacher', '9821079808', 'Aly12345', 0, 0, 1, '698995', NULL),
(8, 'Aly', 'Bawani', 'info@adags.com', 'school', '9136109977', 'Aly@12345', 0, 0, 1, '103559', NULL),
(9, 'sai', 'sashreek', 'sai@5thdt.com', 'teacher', '9948095112', 'june1992', 0, 0, 1, '360610', NULL),
(10, 'Anaya', 'Thakur', 'faridah@chrysaellect.com', 'teacher', '9820013694', 'Anaya@2005', 0, 0, 0, '754608', NULL),
(11, 'Anaya', 'Thakur', 'chrysaellect@hotmail.com', 'teacher', '9821079808', 'Anaya2005', 0, 0, 1, '697582', NULL),
(13, 'Mirza Virani', 'Mirza ', 'mirzav54@gmail.com', 'teacher', '9820744016', 'mirza0785', 0, 0, 1, '369292', NULL),
(17, 'Bongiswa Kotta', 'Ramushwana', 'bongikotta@yahoo.com', 'faculty', '9820013694', 'pass1234', 0, 0, 1, NULL, NULL),
(24, 'Siddhi', 'Danani', 'sidhie.n@gmail.com', 'teacher', '9833947091', 'Dharun@12345', 0, 0, 1, '304390', NULL),
(29, 'Minal', '', 'minalgurav@gmail.com', 'teacher', '9999699619', 'Faridah2020', 0, 0, 1, '641157', NULL),
(30, 'Kaiser ', 'Bhat', 'kaiserbhat@gmail.com', 'teacher', '07006555384', 'kais1290', 0, 0, 1, '899252', NULL),
(34, 'Smita', 'Pradhan', 'smitastudy2021@gmail.com', 'teacher', '09900388668', 'sjp@2606', 0, 0, 1, '627531', NULL),
(35, 'Niranjan', 'Badle ', 'badle.niranjan@gmail.com', 'teacher', '+917776036036', 'Pass@123', 0, 0, 1, '417359', NULL),
(36, 'Minaz Ajani', 'Ajani', 'minaz.ajani@gmail.com', 'teacher', '09820033595', 'zoyazoheb2', 0, 0, 1, '855030', NULL),
(46, 'Arwaa', 'Kaba', 'arwaa.kaba@gmail.com', 'teacher', '9730889303', 'newlife18', 0, 0, 1, '299459', NULL),
(49, 'Priya', 'Niyogi', 'priyaneogi12@gmail.com', 'teacher', '9966883734', '1206june', 0, 0, 1, '462444', NULL),
(50, 'Uday', '', 'contact@gulmoharschools.com', 'school', '8107059948', 'Cairn@69', 0, 0, 0, '349522', NULL),
(51, 'SAPNA', 'RAYANI', 'rayani.sapna@gmail.com', 'teacher', '09819846128', 'tiya@0609', 0, 0, 1, '289838', NULL),
(52, 'Sucheeta', 'Shah', 'sucheetasioni@gmail.com', 'teacher', '7600851626', 'ameebhavik', 0, 0, 1, '152473', NULL),
(53, 'Suma', 'Nalawadi', 'hellokids.mudita604@gmail.com', 'teacher', '9482436700', 'mudita2019', 0, 0, 1, '169995', NULL),
(54, 'Sabna', 'Niyas', 'sabna.niyas@gmail.com', 'teacher', '0502179692', 'sabna123g', 0, 0, 1, '363536', NULL),
(55, 'Kusum ', 'Pathania ', 'kusumpathania9@gmail.com', 'teacher', '9592719923', 'SriSri@happiness', 0, 0, 1, '173647', NULL),
(56, 'Jigisha', 'Shah', 'jigisha_malay@yahoo.com', 'teacher', '09327008115', 'Jigisha1!', 0, 0, 1, '463934', NULL),
(57, 'SHYAMALA', 'SREEDAR', 'shyamalasreedar@gmail.com', 'teacher', '9880754702', 'sreesh67', 0, 0, 1, '889168', NULL),
(58, 'Vipijith', 'N', 'vipijith007@gmail.com', 'teacher', '8', 'passw122', 0, 0, 1, NULL, NULL),
(59, 'Jigisha', 'Shah', 'Jigisha8111@gmail.com', 'teacher', '09327008115', 'Jigisha1!!', 0, 0, 1, '456789', NULL),
(60, 'Gunjan', 'Agarwal', 'gunjanagarwal4u@gmail.com', 'teacher', '7718410515', '123456', 0, 0, 1, '802786', NULL);

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
(1, 'free', '  8', 'course', '4'),
(2, 'free', '  9', 'course', '1'),
(3, 'free', '  9', 'course', '6'),
(4, 'free', '  9', 'course', '9'),
(5, 'free', '  2', 'resource', '7'),
(6, 'free', '  2', 'resource', '6'),
(7, 'free', '  47', 'resource', '7'),
(8, 'free', '  50', 'resource', '11'),
(9, 'free', '  50', 'resource', '14'),
(10, 'free', '  2', 'resource', '14'),
(11, 'free', '  2', 'resource', '11'),
(12, 'free', '  53', 'resource', '24'),
(13, 'free', '  46', 'resource', '24'),
(14, 'free', '  47', 'resource', '24'),
(15, 'free', '  46', 'resource', '14'),
(17, 'free', '  53', 'resource', '7'),
(18, 'free', '  18', 'course', '9'),
(19, 'free', '  17', 'course', '9'),
(20, 'free', '  18', 'course', '38'),
(21, 'free', '  56', 'resource', '46'),
(22, 'free', '  19', 'course', '9'),
(23, 'free', '  54', 'resource', '7'),
(24, 'free', '  21', 'course', '48'),
(25, 'free', '  54', 'resource', '56'),
(26, 'free', '  46', 'resource', '58'),
(27, 'free', '  17', 'course', '58'),
(28, 'free', '  53', 'resource', '58'),
(29, 'free', '  2', 'resource', '59'),
(30, 'free', '  50', 'resource', '60');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `id` int(222) NOT NULL,
  `userid` varchar(222) DEFAULT '0',
  `notification` text,
  `type` varchar(999) DEFAULT NULL,
  `dates` varchar(999) DEFAULT NULL,
  `subid` int(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`id`, `userid`, `notification`, `type`, `dates`, `subid`) VALUES
(30, '0', 'New course Sample Updated', 'course', '03-03-2021', 18),
(31, '0', 'New  Resource sample Updated', 'resource', '03-03-2021', 55),
(34, '9', 'Successfully Submitted Assessment On Course  Sample', 'assessmnet', '03-03-2021', NULL),
(35, '38', 'You Successfully Purchased New course Early math', 'purchased', '03-03-2021', NULL),
(36, '0', 'New  Resource Loose Parts- A Guide for Beginners Updated', 'resource', '03-03-2021', 56),
(37, '9', 'Feedback Updated On Your Assessment ( Sample/New ) ', 'assessment', '03-03-2021', NULL),
(38, '9', 'Feedback Updated On Your Assessment ( Sample/New ) ', 'assessment', '03-03-2021', NULL),
(39, '9', 'Feedback Updated On Your Assessment ( Sample/New ) ', 'assessment', '03-03-2021', NULL),
(40, '9', 'Feedback Updated On Your Assessment ( Sample/New ) ', 'assessment', '05-03-2021', NULL),
(41, '9', 'Successfully Submitted Assessment On Course  Sample', 'assessmnet', '05-03-2021', NULL),
(42, '9', 'Successfully Submitted Assessment On Course  Sample', 'assessmnet', '05-03-2021', NULL),
(43, '9', 'Successfully Submitted Assessment On Course  Sample', 'assessmnet', '05-03-2021', NULL),
(44, '0', 'New course sample 2 Updated', 'course', '05-03-2021', 19),
(45, '9', 'Feedback Updated On Your Assessment ( Sample/CHRYSAELLECT ) ', 'assessment', '05-03-2021', NULL),
(46, '0', 'New course newthing Updated', 'course', '06-03-2021', 20),
(47, '9', 'Feedback Updated On Your Assessment ( Sample/CHRYSAELLECT ) ', 'assessment', '06-03-2021', NULL),
(48, '0', 'New  Resource Artist Series: Exploring Pablo Picasso Updated', 'resource', '08-03-2021', 57),
(49, '0', 'New course ec Updated', 'course', '09-03-2021', 21),
(50, '0', 'New  Resource Introduction to Early Math Updated', 'resource', '10-03-2021', 58),
(51, '0', 'New  Resource Introduction to Early Math Updated', 'resource', '10-03-2021', 59),
(52, '0', 'New  Resource Place Value in the early Years Updated', 'resource', '11-03-2021', 60),
(53, '0', 'New  Resource Place Value in the early Years Updated', 'resource', '11-03-2021', 61),
(54, '0', 'New  Resource Beans & Cups to Explore Place Value Updated', 'resource', '11-03-2021', 62),
(55, '0', 'New  Resource Exploring Attributes Updated', 'resource', '13-03-2021', 63),
(56, '', 'Chrysaellect MEET Summit Free Plan Enrolled Successfully', 'summit', '14/03/2021', NULL),
(57, '', 'Chrysaellect MEET Summit Free Plan Enrolled Successfully', 'summit', '14/03/2021', NULL),
(58, '', 'Chrysaellect MEET Summit Free Plan Enrolled Successfully', 'summit', '14/03/2021', NULL),
(59, '', 'Chrysaellect MEET Summit Free Plan Enrolled Successfully', 'summit', '14/03/2021', NULL),
(60, '9', 'Chrysaellect MEET Summit Free Plan Enrolled Successfully', 'summit', '14/03/2021', NULL),
(61, '9', 'Chrysaellect MEET Summit Free Plan Enrolled Successfully', 'summit', '14/03/2021', NULL),
(62, '9', 'Chrysaellect MEET Summit Free Plan Enrolled Successfully', 'summit', '14/03/2021', NULL),
(63, '9', 'Chrysaellect MEET Summit Free Plan Enrolled Successfully', 'summit', '14/03/2021', NULL),
(64, '0', 'New  Resource Elements of  Creative Classroom Updated', 'resource', '14-03-2021', 64),
(65, '', 'Chrysaellect MEET Summit Paid Plan Enrolled Successfully', 'summit', '14/03/2021', NULL),
(66, '', 'Chrysaellect MEET Summit Paid Plan Enrolled Successfully', 'summit', '14/03/2021', NULL),
(67, '', 'Chrysaellect MEET Summit Paid Plan Enrolled Successfully', 'summit', '14/03/2021', NULL),
(68, '58', 'Chrysaellect MEET Summit Paid Plan Enrolled Successfully', 'summit', '14/03/2021', NULL),
(69, '58', 'Chrysaellect MEET Summit Paid Plan Enrolled Successfully', 'summit', '14/03/2021', NULL),
(70, '58', 'Chrysaellect MEET Summit Paid Plan Enrolled Successfully', 'summit', '14/03/2021', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `token` varchar(80) NOT NULL,
  `timemodified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `username`, `token`, `timemodified`) VALUES
(38, 'rayani.sapna@gmail.com', '604a20258f19d', '2021-03-11 13:50:29'),
(39, 'rayani.sapna@gmail.com', '604a20eef15c3', '2021-03-11 13:53:50'),
(40, 'rayani.sapna@gmail.com', '604a21db5b09b', '2021-03-11 13:57:47'),
(41, 'sucheetasioni@gmail.com', '604b53ea3e117', '2021-03-12 11:43:38'),
(42, 'sucheetasioni@gmail.com', '604b54b73f706', '2021-03-12 11:47:03'),
(43, 'hellokids.mudita604@gmail.com', '604b5558ea3bf', '2021-03-12 11:49:44'),
(44, 'sabna.niyas@gmail.com', '604badbf154dd', '2021-03-12 18:06:55'),
(45, 'sucheetasioni@gmail.com', '604c47a7f2cda', '2021-03-13 05:03:35'),
(46, 'sucheetasioni@gmail.com', '604c47e83a715', '2021-03-13 05:04:40'),
(47, 'shyamalasreedar@gmail.com', '604dbf889cb28', '2021-03-14 07:47:20'),
(48, 'jigisha_malay@yahoo.com', '604dcad1a9245', '2021-03-14 08:35:29'),
(49, 'shyamalasreedar@gmail.com', '604dceebb3636', '2021-03-14 08:52:59'),
(53, 'alybawani@rediffmail.com', '604df51a0e70b', '2021-03-14 11:35:54'),
(54, 'alybawani@rediffmail.com', '604df5269ccc3', '2021-03-14 11:36:06'),
(55, 'alybawani@rediffmail.com', '604df543222f3', '2021-03-14 11:36:35'),
(56, 'alybawani@rediffmail.com', '604df5790cbf7', '2021-03-14 11:37:29'),
(57, 'alybawani@rediffmail.com', '604df5e4ddde5', '2021-03-14 11:39:16'),
(58, 'alybawani@rediffmail.com', '604df631a31ee', '2021-03-14 11:40:33'),
(59, 'alybawani@rediffmail.com', '604df6ea17348', '2021-03-14 11:43:38'),
(60, 'alybawani@rediffmail.com', '604df73e5bb5b', '2021-03-14 11:45:02'),
(61, 'jigisha_malay@yahoo.com', '604dfe327aedd', '2021-03-14 12:14:42'),
(62, 'alybawani@rediffmail.com', '604e0da3c2e7a', '2021-03-14 13:20:35'),
(63, 'alybawani@rediffmail.com', '604e2baccf6e9', '2021-03-14 15:28:44'),
(64, 'jigisha_malay@yahoo.com', '604e2dd49eea1', '2021-03-14 15:37:56'),
(65, 'jigisha_malay@yahoo.com', '604e2e6ff1a36', '2021-03-14 15:40:31'),
(70, 'Jigisha8111@gmail.com', '604e41ad6e046', '2021-03-14 17:02:37'),
(81, 'gunjanagarwal4u@gmail.com', '604e9e2fe085c', '2021-03-14 23:37:19'),
(94, 'vipijith007@gmail.com', '604ee839df817', '2021-03-15 04:53:13'),
(95, 'vipijith007@gmail.com', '604ee8c5bfd66', '2021-03-15 04:55:33'),
(96, 'vipijith007@gmail.com', '604ee8db6392d', '2021-03-15 04:55:55'),
(97, 'vipijith007@gmail.com', '604ee8ebde308', '2021-03-15 04:56:11'),
(99, 'vipijith007@gmail.com', '604ee902d7abd', '2021-03-15 04:56:34'),
(100, 'vipijith007@gmail.com', '604ee93c31626', '2021-03-15 04:57:32'),
(101, 'vipijith007@gmail.com', '604ee9441a839', '2021-03-15 04:57:40'),
(103, 'vipijith007@gmail.com', '604ee94cb76f5', '2021-03-15 04:57:48'),
(104, 'vipijith007@gmail.com', '604f4a063e71c', '2021-03-15 11:50:30');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assessmentfile`
--
ALTER TABLE `assessmentfile`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `discussionchat`
--
ALTER TABLE `discussionchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ecert`
--
ALTER TABLE `ecert`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `faculty_notification`
--
ALTER TABLE `faculty_notification`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `keyword`
--
ALTER TABLE `keyword`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `oc`
--
ALTER TABLE `oc`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pc`
--
ALTER TABLE `pc`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `rc`
--
ALTER TABLE `rc`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `resources_files`
--
ALTER TABLE `resources_files`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `summit`
--
ALTER TABLE `summit`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `summitusers`
--
ALTER TABLE `summitusers`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `summit_info`
--
ALTER TABLE `summit_info`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacherinfo`
--
ALTER TABLE `teacherinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user_courses`
--
ALTER TABLE `user_courses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
