-- MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `dankpress`;
CREATE DATABASE `dankpress` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dankpress`;

DROP TABLE IF EXISTS `pagedata`;
CREATE TABLE `pagedata` (
  `pageid` int(11) NOT NULL,
  `elementid` int(11) NOT NULL AUTO_INCREMENT,
  `elementname` text NOT NULL,
  `elementvalue` text NOT NULL,
  PRIMARY KEY (`elementid`),
  KEY `pageid` (`pageid`),
  CONSTRAINT `pagedata_ibfk_1` FOREIGN KEY (`pageid`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `shortbody` text NOT NULL,  
  `longbody` text NOT NULL,
  `createdate` datetime NOT NULL,
  `lasteditdate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `creator` int(2) NOT NULL DEFAULT '1',
  `lasteditor` int(2) NOT NULL DEFAULT '1',
  `editreason` text NOT NULL,
  `showeditreason` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `creator` (`creator`),
  KEY `lasteditor` (`lasteditor`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`uid`),
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`lasteditor`) REFERENCES `users` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

DELIMITER ;;

CREATE TRIGGER `Createdate_workaround` BEFORE INSERT ON `posts` FOR EACH ROW
SET NEW.createdate=NOW();;

DELIMITER ;

DROP TABLE IF EXISTS `quotes`;
CREATE TABLE `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote` text NOT NULL,
  `author` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `quotes` (`id`, `quote`, `author`, `date`) VALUES
(1, 'Individual Ambition Serves the Common Good', 'Adam Smith', '2015-08-30 23:41:33');

DELIMITER ;;

CREATE TRIGGER `quotes_date_workaround` BEFORE INSERT ON `quotes` FOR EACH ROW
SET NEW.date=NOW();;

DELIMITER ;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `registerdate` datetime NOT NULL,
  `lastlogin` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `lastloginip` text NOT NULL,
  `lastloginsession` text NOT NULL,
  `privlvl` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`uid`, `username`, `password`, `registerdate`, `lastlogin`, `lastloginip`, `lastloginsession`, `privlvl`) VALUES
(1,	'nulluser',	'no logins are allowed for this user',	'2015-08-27 13:38:20',	'2015-08-27 13:38:20',	'0.0.0.0',	'no sessions are allowed for this user',	0);

DELIMITER ;;

CREATE TRIGGER `users_workaround` BEFORE INSERT ON `users` FOR EACH ROW
SET NEW.registerdate=NOW();;

DELIMITER ;