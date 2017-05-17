-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: 213.171.200.80
-- Generation Time: May 13, 2017 at 07:02 PM
-- Server version: 5.6.36-log
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `name` varchar(256) NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`comment_id`),
  UNIQUE KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `section_id`, `comment`, `name`, `comment_date`) VALUES
(1, 1, 'Some comment for first section.', 'Victor', '2017-05-12 13:14:08'),
(4, 2, 'Some comment here.', 'My Name', '2017-05-12 17:19:26'),
(13, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut imperdiet turpis eget velit consequat volutpat. In euismod non massa ac pulvinar. Integer convallis, risus ac venenatis hendrerit, augue mi lacinia turpis, consequat suscipit magna mi non quam. Cras ante ipsum, maximus a nunc ac, egestas vulputate enim. Curabitur efficitur ullamcorper est, sit amet laoreet lorem lobortis a. Aenean euismod ultricies est, vitae dictum leo sollicitudin tristique. updatedf fsda fsadf f sdf dt4 gfterwggve sd', 'Victor', '2017-05-13 11:20:23'),
(41, 2, 'Another comment.', 'My Name', '2017-05-13 18:08:45'),
(46, 4, 'Pellentesque odio magna, cursus ut diam quis, ullamcorper tincidunt elit. Quisque vestibulum arcu diam, id ultricies purus varius ut.', 'Vic', '2017-05-13 18:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(256) NOT NULL,
  `thumbs` int(11) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`, `thumbs`) VALUES
(1, 'First', 4),
(2, 'Second', 4),
(3, 'Third', 1),
(4, 'Fourth', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
