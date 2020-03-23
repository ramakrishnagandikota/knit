-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table knitfit.product_vote_unvote
CREATE TABLE IF NOT EXISTS `product_vote_unvote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT '0',
  `product_id` int(11) unsigned DEFAULT '0',
  `comment_id` int(11) unsigned DEFAULT '0',
  `vote` int(11) unsigned DEFAULT '0',
  `unvote` int(11) unsigned DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ipaddress` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.product_vote_unvote: ~3 rows (approximately)
DELETE FROM `product_vote_unvote`;
/*!40000 ALTER TABLE `product_vote_unvote` DISABLE KEYS */;
INSERT INTO `product_vote_unvote` (`id`, `user_id`, `product_id`, `comment_id`, `vote`, `unvote`, `created_at`, `updated_at`, `ipaddress`) VALUES
	(7, 1, 5, 4, 1, 0, '2020-03-22 15:42:45', NULL, '127.0.0.1'),
	(10, 1, 5, 5, 0, 1, '2020-03-22 15:45:26', NULL, '127.0.0.1'),
	(11, 1, 5, 4, 0, 1, '2020-03-22 15:45:56', NULL, '127.0.0.1');
/*!40000 ALTER TABLE `product_vote_unvote` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
