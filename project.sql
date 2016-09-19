-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categories` (`id`, `cat_title`) VALUES
(1,	'sport'),
(2,	'religion'),
(3,	'economy'),
(4,	'politics');

DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` longtext NOT NULL,
  `text` longtext NOT NULL,
  `time` int(11) NOT NULL,
  `content_pic` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'published',
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  CONSTRAINT `content_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `content` (`id`, `title`, `text`, `time`, `content_pic`, `status`, `category`) VALUES
(8,	'lorem 1',	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',	1474107396,	'files/Viber_icon-icons.com_60485.png',	'unpublished',	1),
(9,	'lorem',	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap int',	1474107433,	'files/ÐºÐ¾Ñ„Ðµ3.jpg',	'published',	2),
(10,	'lorem 18',	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap int',	1474107453,	'files/Viber_icon-icons.com_60485.png',	'published',	4),
(11,	'tyyy',	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap int',	1474107476,	'files/Viber_icon-icons.com_60485.png',	'published',	2),
(12,	'llllll',	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap int',	1474107496,	'files/m61_egelasta-b.jpg',	'published',	1),
(13,	'oooooooo',	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap int',	1474107529,	'',	'published',	1),
(14,	'lor 7',	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap int',	1474108227,	'',	'published',	1),
(15,	'lor 8',	'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap int',	1474108252,	'files/ÐºÐ¾Ñ„Ðµ3.jpg',	'published',	4);

-- 2016-09-19 07:15:14
