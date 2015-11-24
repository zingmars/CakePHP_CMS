-- MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `dankpress`;
CREATE DATABASE `dankpress` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dankpress`;

DROP TABLE IF EXISTS `authtokens`;
CREATE TABLE `authtokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `public_token` text NOT NULL,
  `private_token` text NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `state` int(1) NOT NULL DEFAULT '1',
  `createdate` datetime NOT NULL,
  `lastusedate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  CONSTRAINT `authtokens_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;

CREATE TRIGGER `createdate_auth` BEFORE INSERT ON `authtokens` FOR EACH ROW
SET NEW.createdate=NOW();;

DELIMITER ;

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `editdate` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `postid` (`postid`),
  KEY `userid` (`userid`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `posts` (`id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;

CREATE TRIGGER `comments_postdate` BEFORE INSERT ON `comments` FOR EACH ROW
SET NEW.date=NOW();;

DELIMITER ;

DROP TABLE IF EXISTS `filedata`;
CREATE TABLE `filedata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` int(11) NOT NULL,
  `name` int(11) DEFAULT NULL,
  `upload_date` datetime NOT NULL,
  `lastedit_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `accessflags` int(11) DEFAULT '1',
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;

CREATE TRIGGER `file_uploaddate` BEFORE INSERT ON `filedata` FOR EACH ROW
SET NEW.upload_date=NOW();;

DELIMITER ;

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
  `accessflags` int(11) DEFAULT '1',
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `picturedata`;
CREATE TABLE `picturedata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` int(11) NOT NULL,
  `name` int(11) DEFAULT NULL,
  `upload_date` datetime NOT NULL,
  `lastedit_date` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `accessflags` int(11) DEFAULT '1',
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DELIMITER ;;

CREATE TRIGGER `picture_uploaddate` BEFORE INSERT ON `picturedata` FOR EACH ROW
SET NEW.upload_date=NOW();;

DELIMITER ;

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `shortbody` text NOT NULL,
  `longbody` text NOT NULL,
  `createdate` datetime NOT NULL,
  `lasteditdate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `creator` int(11) NOT NULL DEFAULT '1',
  `lasteditor` int(2) NOT NULL DEFAULT '1',
  `editreason` text NOT NULL,
  `showeditreason` tinyint(1) NOT NULL DEFAULT '0',
  `commentsallowed` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `creator` (`creator`),
  KEY `lasteditor` (`lasteditor`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `users` (`uid`),
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`lasteditor`) REFERENCES `users` (`uid`),
  CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`creator`) REFERENCES `users` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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

DROP TABLE IF EXISTS `translationstrings`;
CREATE TABLE `translationstrings` (
  `string` text NOT NULL,
  `value` text NOT NULL,
  UNIQUE KEY `string` (`string`(10))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `visiblename` text NOT NULL,
  `password` text NOT NULL,
  `registerdate` datetime NOT NULL,
  `lastlogin` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `lastloginip` text NOT NULL,
  `lastloginsession` text NOT NULL,
  `privlvl` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`uid`, `username`, `password`, `registerdate`, `lastlogin`, `lastloginip`, `lastloginsession`, `privlvl`) VALUES
(1, 'nulluser', 'no logins are allowed for this user',  '2015-08-27 13:38:20',  '2015-08-27 13:38:20',  '0.0.0.0',  'no sessions are allowed for this user',  0);

DELIMITER ;;

CREATE TRIGGER `users_workaround` BEFORE INSERT ON `users` FOR EACH ROW
SET NEW.registerdate=NOW();;

DELIMITER ;