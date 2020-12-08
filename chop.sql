/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `9jachop` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `9jachop`;

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL DEFAULT '',
  `email` varchar(226) DEFAULT NULL,
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL DEFAULT '0',
  `description` varchar(225) NOT NULL DEFAULT '0',
  `price` float NOT NULL DEFAULT '0',
  `image_show` varchar(225) NOT NULL DEFAULT '0',
  `menu_id` int(11) NOT NULL DEFAULT '0',
  `res_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(225) NOT NULL DEFAULT '0',
  `res_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(225) NOT NULL DEFAULT '0',
  `product_price` varchar(225) NOT NULL DEFAULT '0',
  `user_email` varchar(225) NOT NULL DEFAULT '0',
  `user_id` varchar(225) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `resturant` (
  `resid` int(11) NOT NULL AUTO_INCREMENT,
  `resname` varchar(225) NOT NULL DEFAULT '0',
  `email` varchar(225) NOT NULL DEFAULT '0',
  `phone` varchar(225) NOT NULL DEFAULT '0',
  `openh` varchar(225) NOT NULL DEFAULT '0',
  `closeh` varchar(225) NOT NULL DEFAULT '0',
  `openday` varchar(225) NOT NULL DEFAULT '0',
  `image` varchar(225) NOT NULL DEFAULT '0',
  PRIMARY KEY (`resid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(225) NOT NULL DEFAULT '0',
  `lastname` varchar(225) NOT NULL DEFAULT '0',
  `email` varchar(225) NOT NULL DEFAULT '0',
  `phone` varchar(225) NOT NULL DEFAULT '0',
  `password` varchar(225) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
