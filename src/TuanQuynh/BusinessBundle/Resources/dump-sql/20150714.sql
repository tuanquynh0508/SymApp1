/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.43-0ubuntu0.14.04.1 : Database - symfony
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`symfony` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `symfony`;

/*Table structure for table `blog_category` */

DROP TABLE IF EXISTS `blog_category`;

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_idx` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `blog_category` */

/*Table structure for table `blog_post` */

DROP TABLE IF EXISTS `blog_post`;

CREATE TABLE `blog_post` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `blog_category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_idx` (`slug`),
  KEY `blog_category_id` (`blog_category_id`),
  CONSTRAINT `blog_post_ibfk_1` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `blog_post` */

/*Table structure for table `fos_user` */

DROP TABLE IF EXISTS `fos_user`;

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fos_user` */

insert  into `fos_user`(`id`,`username`,`username_canonical`,`email`,`email_canonical`,`enabled`,`salt`,`password`,`last_login`,`locked`,`expired`,`expires_at`,`confirmation_token`,`password_requested_at`,`roles`,`credentials_expired`,`credentials_expire_at`) values (1,'admin','admin','tuanquynh0508@gmail.com','tuanquynh0508@gmail.com',1,'bni20qmcee0c4k0g44o80kg8ocokk44','$2y$13$bni20qmcee0c4k0g44o80ebO7QnRQ4VMyKUTSU7hGcIHjCdfDkkla','2015-07-15 18:20:32',0,0,NULL,'58Jez4q0XKLYAmtHDwquJMuPGyytEfEA4YzBAz2M9UE','2015-07-14 09:41:21','a:0:{}',0,NULL);

/*Table structure for table `page_html` */

DROP TABLE IF EXISTS `page_html`;

CREATE TABLE `page_html` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` longtext,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_idx` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `page_html` */

/*Table structure for table `photo_album` */

DROP TABLE IF EXISTS `photo_album`;

CREATE TABLE `photo_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_idx` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `photo_album` */

/*Table structure for table `photo_image` */

DROP TABLE IF EXISTS `photo_image`;

CREATE TABLE `photo_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `photo_album_id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `meta_data` text,
  `note` text,
  `is_active` tinyint(1) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `photo_album_id` (`photo_album_id`),
  CONSTRAINT `photo_image_ibfk_1` FOREIGN KEY (`photo_album_id`) REFERENCES `photo_album` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `photo_image` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
