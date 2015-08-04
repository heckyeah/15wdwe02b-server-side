-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 28, 2015 at 04:04 am
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cheapo`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE IF NOT EXISTS `businesses` (
`id` smallint(5) unsigned NOT NULL,
  `name` varchar(60) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `website` varchar(50) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `name`, `logo`, `phone`, `website`, `description`) VALUES
(1, 'The Warehouse', 'warehouse.jpg', '0800 1234567', 'warehouse.co.nz', 'Everyone get''s a bargain*'),
(2, 'ACG Yoobee School of Design', 'logo.jpg', '1234567', 'yoobee.ac.nz', 'Learn stuff!'),
(3, 'Harvey Norman', 'logo.jpg', '0800 1234567', 'harveynorman.co.nz', 'lorem ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `business_categories`
--

CREATE TABLE IF NOT EXISTS `business_categories` (
`id` mediumint(8) unsigned NOT NULL,
  `business_id` smallint(5) unsigned NOT NULL,
  `category_id` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `business_categories`
--

INSERT INTO `business_categories` (`id`, `business_id`, `category_id`) VALUES
(1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `business_locations`
--

CREATE TABLE IF NOT EXISTS `business_locations` (
`id` mediumint(8) unsigned NOT NULL,
  `business_id` smallint(5) unsigned NOT NULL,
  `location_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `business_locations`
--

INSERT INTO `business_locations` (`id`, `business_id`, `location_id`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` tinyint(3) unsigned NOT NULL,
  `category` varchar(23) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(3, 'Education'),
(4, 'Food'),
(1, 'Hospitality and Tourism'),
(5, 'Wine');

-- --------------------------------------------------------

--
-- Table structure for table `cities_and_towns`
--

CREATE TABLE IF NOT EXISTS `cities_and_towns` (
`id` tinyint(3) unsigned NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cities_and_towns`
--

INSERT INTO `cities_and_towns` (`id`, `name`) VALUES
(1, 'Hamilton'),
(2, 'Wellington'),
(3, 'Taihape');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `original_price` decimal(6,2) NOT NULL,
  `discounted_price` decimal(6,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(2000) NOT NULL,
  `code` varchar(40) NOT NULL,
  `businessID` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `name`, `original_price`, `discounted_price`, `image`, `start_date`, `end_date`, `description`, `code`, `businessID`) VALUES
(1, 'CHeap Pizza', '100.00', '50.00', '55b6c9842fb0c7.37829727553f1a5945b22_tandoori-pizza.jpg', '2015-07-28 00:14:13', '2015-12-31 23:00:00', 'Getting some cheap pizza is awesome!', '2345678', 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
`id` mediumint(8) unsigned NOT NULL,
  `street_number` varchar(7) NOT NULL,
  `street_name_id` smallint(5) unsigned NOT NULL,
  `suburb_id` tinyint(3) unsigned NOT NULL,
  `city_town_id` tinyint(3) unsigned NOT NULL,
  `postcode_id` tinyint(3) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `street_number`, `street_name_id`, `suburb_id`, `city_town_id`, `postcode_id`) VALUES
(1, '27', 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`ID` tinyint(3) unsigned NOT NULL,
  `Title` varchar(60) NOT NULL,
  `Description` varchar(160) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`ID`, `Title`, `Description`, `Name`) VALUES
(1, 'Cheap deals for Students - Page not found', 'You broke our website!', '404'),
(2, 'Cheap deals for Students - About Us', 'Find out all about us', 'about'),
(3, 'Cheap deals for Students - Home', 'Everything is cheaper with a discount', 'home'),
(5, 'Cheap deals for Students - Contact Us', 'Send us a message and get in touch!', 'contact'),
(6, 'Cheap deals for Students - Registration', 'An account lets you access more advanced features of the website.', 'register'),
(7, 'Cheap deals for Students - Your Account', 'Your account page', 'account'),
(8, 'Cheap deals for Students - Log out', 'Goodbye :(', 'logout'),
(9, 'Cheap deals for Students - Log In', 'Log into your account', 'login'),
(10, 'Cheap deals for Students - Deal', 'A single deal', 'deal'),
(11, 'Cheap deals for Students - Search Results', 'Search results', 'search');

-- --------------------------------------------------------

--
-- Table structure for table `postcodes`
--

CREATE TABLE IF NOT EXISTS `postcodes` (
`id` tinyint(3) unsigned NOT NULL,
  `postcode` varchar(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `postcodes`
--

INSERT INTO `postcodes` (`id`, `postcode`) VALUES
(1, '6011');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`ID` tinyint(3) unsigned NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Bio` varchar(200) NOT NULL,
  `ProfileImage` varchar(100) NOT NULL,
  `Job` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `street_names`
--

CREATE TABLE IF NOT EXISTS `street_names` (
`id` smallint(5) unsigned NOT NULL,
  `name` varchar(85) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `street_names`
--

INSERT INTO `street_names` (`id`, `name`) VALUES
(1, 'Kent Terrace');

-- --------------------------------------------------------

--
-- Table structure for table `suburbs`
--

CREATE TABLE IF NOT EXISTS `suburbs` (
`id` tinyint(3) unsigned NOT NULL,
  `suburb` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `suburbs`
--

INSERT INTO `suburbs` (`id`, `suburb`) VALUES
(1, 'Te Aro');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID` mediumint(8) unsigned NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Privilege` enum('user','admin') NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Active` enum('enabled','disabled') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`, `Email`, `Privilege`, `CreationDate`, `Active`) VALUES
(1, 'admin', '$2y$10$u9Q5Dn.A2DsKs2LUUeNMD./e2M2qwGjAfFH7gNcWSvNf6ZUFPjFm6', 'admin@admin.com', 'admin', '2015-06-12 02:45:48', 'enabled'),
(2, 'user', '$2y$10$dWiQqS3gYLW6AgxjsfBiZ.Wi64qhf1TmZLXQsdhTY3Drip5AsEWam', 'user@user.com', 'user', '2015-06-12 02:46:48', 'enabled'),
(4, 'benabbott', '$2y$10$g4yhEBDumIRwzd/UDxjTcuVBNMQLsXYt0THdPNDeV2iyNPGkrKnNm', 'ben.abbott@yoobee.ac.nz', 'user', '2015-06-15 02:46:53', 'disabled');

-- --------------------------------------------------------

--
-- Table structure for table `users_additional_info`
--

CREATE TABLE IF NOT EXISTS `users_additional_info` (
`ID` mediumint(8) unsigned NOT NULL,
  `UserID` mediumint(8) unsigned NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `ProfileImage` varchar(100) NOT NULL,
  `Bio` varchar(2000) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_additional_info`
--

INSERT INTO `users_additional_info` (`ID`, `UserID`, `FirstName`, `LastName`, `ProfileImage`, `Bio`) VALUES
(3, 2, 'Sponge', 'Bob', 'pineapple.png', 'hahahahahahahahaha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_categories`
--
ALTER TABLE `business_categories`
 ADD PRIMARY KEY (`id`), ADD KEY `business_id` (`business_id`), ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `business_locations`
--
ALTER TABLE `business_locations`
 ADD PRIMARY KEY (`id`), ADD KEY `business_id` (`business_id`), ADD KEY `location_id` (`location_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `cities_and_towns`
--
ALTER TABLE `cities_and_towns`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
 ADD PRIMARY KEY (`id`), ADD KEY `businessID` (`businessID`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
 ADD PRIMARY KEY (`id`), ADD KEY `street_name_id` (`street_name_id`), ADD KEY `suburb_id` (`suburb_id`), ADD KEY `city_town_id` (`city_town_id`), ADD KEY `postcode_id` (`postcode_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `postcodes`
--
ALTER TABLE `postcodes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `street_names`
--
ALTER TABLE `street_names`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suburbs`
--
ALTER TABLE `suburbs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users_additional_info`
--
ALTER TABLE `users_additional_info`
 ADD PRIMARY KEY (`ID`), ADD KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `business_categories`
--
ALTER TABLE `business_categories`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `business_locations`
--
ALTER TABLE `business_locations`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cities_and_towns`
--
ALTER TABLE `cities_and_towns`
MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `postcodes`
--
ALTER TABLE `postcodes`
MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `street_names`
--
ALTER TABLE `street_names`
MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suburbs`
--
ALTER TABLE `suburbs`
MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users_additional_info`
--
ALTER TABLE `users_additional_info`
MODIFY `ID` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_categories`
--
ALTER TABLE `business_categories`
ADD CONSTRAINT `business_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `business_categories_ibfk_2` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_locations`
--
ALTER TABLE `business_locations`
ADD CONSTRAINT `business_locations_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `business_locations_ibfk_2` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
ADD CONSTRAINT `deals_ibfk_1` FOREIGN KEY (`businessID`) REFERENCES `businesses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`postcode_id`) REFERENCES `postcodes` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `locations_ibfk_2` FOREIGN KEY (`city_town_id`) REFERENCES `cities_and_towns` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `locations_ibfk_3` FOREIGN KEY (`suburb_id`) REFERENCES `suburbs` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `locations_ibfk_4` FOREIGN KEY (`street_name_id`) REFERENCES `street_names` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `users_additional_info`
--
ALTER TABLE `users_additional_info`
ADD CONSTRAINT `users_additional_info_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
