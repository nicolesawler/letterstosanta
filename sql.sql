CREATE DATABASE `letters` /*!40100 DEFAULT CHARACTER SET utf8 */;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) NOT NULL,
  `category_slug` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `date_added` varchar(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;


CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `comment` varchar(245) DEFAULT NULL,
  `date_added` varchar(45) DEFAULT 'CURRENT_TIMESTAMP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;


CREATE TABLE `letters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `entry` varchar(12000) DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `tags` varchar(245) DEFAULT NULL,
  `views` int(11) DEFAULT '0',
  `comment_count` int(11) DEFAULT '0',
  `date_added` varchar(45) DEFAULT 'CURRENT_TIMESTAMP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `page_url` varchar(65) DEFAULT NULL,
  `page_slug` varchar(65) DEFAULT NULL,
  `page_title` varchar(65) DEFAULT NULL,
  `date_added` varchar(45) DEFAULT 'CURRENT_TIMESTAMP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;


CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `datecreated` varchar(45) DEFAULT 'CURRENT_TIMESTAMP',
  `last_login` varchar(45) DEFAULT NULL,
  `password` varchar(95) DEFAULT NULL,
  `role` varchar(45) NOT NULL DEFAULT 'Administrator',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
