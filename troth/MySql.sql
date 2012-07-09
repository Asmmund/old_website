CREATE DATABASE `asatru` DEFAULT CHARSET UTF8;
USE `asatru`;

/* TABLE OF METADATA (KEYWORDS, DESCRIPTION & TITLE) */
CREATE TABLE `metadata` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `page` VARCHAR(40) NOT NULL,
  `title` varchar(50) NOT NULL,
   `description` text NOT NULL,
   `keywords` text NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

/* TABLE OF ARTICLES */
CREATE TABLE `articles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `page` int(10) NOT NULL,
  `name` varchar(50) not null,
  `text` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1; 

CREATE TABLE `news` (
  `id` int(10) NOT NULL auto_increment,
  `date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `subtitle` varchar(250) default NULL,
  `text` text,
  `public` int(1) default NULL,
  PRIMARY KEY  (`id`),
  KEY `public` (`public`,`id`)
)  ENGINE=InnoDB DEFAULT CHARSET=UTF8 AUTO_INCREMENT=1 ;


INSERT INTO `news` VALUES (1, '2010-08-08 17:26:28', 'Первая новость', 'Внимание, внимание!\r\nГоворит Германия!\r\nНедавно под мостом поймали Гитлера с хвостом.\r\nКошка сдохла, хвост облез - кто промолвит, тот и съест.', 1);
INSERT INTO `news` VALUES (2, '2010-08-08 15:27:26', 'Вторая новость', 'У попа была собака.\r\nОн её любил.\r\nОна съeла кусок мяса.\r\nОн её убил.\r\nВ землю закопал.\r\nНадпись написал, что\r\nУ попа была собака.\r\nОн её любил.\r\nОна съeла кусок мяса.\r\nОн её убил. \r\nВ землю закопал.\r\nНадпись написал, что\r\nУ попа была собака.\r\nОн её любил.\r\nОна съeла кусок мяса.\r\nОн её убил.\r\nВ землю закопал.\r\nНадпись написал, что\r\nУ попа была собака.\r\nОн её любил.\r\nОна съeла кусок мяса.\r\nОн её убил.\r\nВ землю закопал.\r\nНадпись написал, что\r\nУ попа была собака.\r\nОн её любил.\r\nОна съeла кусок мяса.\r\nОн её убил.\r\nВ землю закопал.\r\nНадпись написал, что\r\nУ попа была собака.\r\nОн её любил.\r\nОна съeла кусок мяса.\r\nОн её убил.\r\nВ землю закопал.\r\nНадпись написал, что\r\nУ попа была собака.\r\nОн её любил.\r\nОна съeла кусок мяса.\r\nОн её убил.\r\nВ землю закопал.\r\nНадпись написал, что\r\nУ попа была собака.\r\nОн её любил.\r\nОна съeла кусок мяса.\r\nОн её убил.\r\nВ землю закопал.\r\nНадпись написал, что\r\nУ попа была собака.\r\nОн её любил.\r\nОна съeла кусок мяса.\r\nОн её убил.\r\nВ землю закопал.', 1);
