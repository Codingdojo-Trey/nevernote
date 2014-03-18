-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2014 at 01:29 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `evernote`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `private` binary(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Notes_Users_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `message`, `created_at`, `updated_at`, `user_id`, `private`) VALUES
(1, 'first message', 'first message', '2014-03-17 16:39:00', '2014-03-17 16:39:00', 1, '1'),
(2, 'first message', 'first message', '2014-03-17 16:43:20', '2014-03-17 16:43:20', 1, '1'),
(3, 'Second note', 'here is the second note', '2014-03-17 16:43:34', '2014-03-17 16:43:34', 1, '0'),
(4, 'Awesome!', 'This message is awesome', '2014-03-17 18:06:31', '2014-03-17 18:06:31', 1, '0'),
(5, 'Dude', 'Trey needs a haircut', '2014-03-17 18:17:01', '2014-03-17 18:17:01', 2, '0'),
(6, 'NOTES?', 'come back!', '2014-03-17 18:19:39', '2014-03-17 18:19:39', 2, '0'),
(7, 'weird', 'weeirder', '2014-03-17 18:19:53', '2014-03-17 18:19:53', 2, '0'),
(8, 'weird', 'weeirder', '2014-03-17 18:19:54', '2014-03-17 18:19:54', 2, '0'),
(9, 'dude', 'wway', '2014-03-17 18:20:08', '2014-03-17 18:20:08', 2, '1'),
(10, 'again', 'test', '2014-03-17 18:20:20', '2014-03-17 18:20:20', 2, '0'),
(11, 'Second try', 'no error?', '2014-03-17 18:20:53', '2014-03-17 18:20:53', 2, '1'),
(12, 'greg', 'greg was here!', '2014-03-17 18:21:27', '2014-03-17 18:21:27', 3, '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Trey', 'tbilz@swag.net', 'password', '2014-03-17 16:02:52', '2014-03-17 16:02:52'),
(2, 'Ben ', 'bt@tiddle.com', 'password', '2014-03-17 18:16:26', '2014-03-17 18:16:26'),
(3, 'Greg', 'greg@greg.com', 'password', '2014-03-17 18:21:11', '2014-03-17 18:21:11');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `fk_Notes_Users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
