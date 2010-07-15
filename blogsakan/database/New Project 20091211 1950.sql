-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.30-community-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema bsim
--

CREATE DATABASE IF NOT EXISTS bsim;
USE bsim;

--
-- Definition of table `tbl_forum_comment`
--

DROP TABLE IF EXISTS `tbl_forum_comment`;
CREATE TABLE `tbl_forum_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) unsigned NOT NULL,
  `author` text NOT NULL,
  `comment` text NOT NULL,
  `datecomment` datetime NOT NULL,
  `active` int(10) unsigned NOT NULL DEFAULT '0',
  `username` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_forum_comment`
--

/*!40000 ALTER TABLE `tbl_forum_comment` DISABLE KEYS */;
INSERT INTO `tbl_forum_comment` (`id`,`topic_id`,`author`,`comment`,`datecomment`,`active`,`username`) VALUES 
 (18,36,'guest','hello! maganda yang project nyo ah. kip it up!','2009-09-27 01:57:55',1,'ralphleyga');
/*!40000 ALTER TABLE `tbl_forum_comment` ENABLE KEYS */;


--
-- Definition of table `tbl_forum_topic`
--

DROP TABLE IF EXISTS `tbl_forum_topic`;
CREATE TABLE `tbl_forum_topic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `topic` text NOT NULL,
  `body` text NOT NULL,
  `datepost` datetime NOT NULL,
  `active` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_forum_topic`
--

/*!40000 ALTER TABLE `tbl_forum_topic` DISABLE KEYS */;
INSERT INTO `tbl_forum_topic` (`id`,`username`,`topic`,`body`,`datepost`,`active`) VALUES 
 (36,'ralphleyga','NDMC Campus Network Project of BSIM','NDMC Campus Project of BSIM is the biggest project made in the IT history of NDMC.  Kasi ang goal po namin is to upgrade the services to students. Hope we finish this project to give satisfaction speed of internet and network connection between computers.  We are graduating students na, kaya with this project hope we can help our alma mater.','2009-09-27 01:47:16','1'),
 (37,'testtest','test topic','test topic','2009-09-27 02:50:35','1');
/*!40000 ALTER TABLE `tbl_forum_topic` ENABLE KEYS */;


--
-- Definition of table `tbl_message`
--

DROP TABLE IF EXISTS `tbl_message`;
CREATE TABLE `tbl_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_reciever` text NOT NULL,
  `user_sender` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `datemessage` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_message`
--

/*!40000 ALTER TABLE `tbl_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_message` ENABLE KEYS */;


--
-- Definition of table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `picture` text,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` varchar(45) NOT NULL,
  `active` int(10) unsigned NOT NULL DEFAULT '1',
  `dateregister` datetime NOT NULL,
  `captcha` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id`,`picture`,`username`,`password`,`email`,`active`,`dateregister`,`captcha`) VALUES 
 (29,'28b1dbb5e02b897c0341d1be116c2b4e.png','ralphleyga','mybirthday26','ralphleyga@yahoo.com',1,'2009-09-27 01:39:55','AcSoH1nD'),
 (30,'user.jpg','testtest','testtest','test@test.com',1,'2009-09-27 02:49:51','LTvrEJK4');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
