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

-- Dumping structure for table knitfit.gauge_conversion
DROP TABLE IF EXISTS `gauge_conversion`;
CREATE TABLE IF NOT EXISTS `gauge_conversion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `stitch_gauge_inch` float DEFAULT NULL,
  `stitches_10_cm` float DEFAULT NULL,
  `row_gauge_inch` float DEFAULT NULL,
  `rows_10_cm` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.gauge_conversion: ~13 rows (approximately)
DELETE FROM `gauge_conversion`;
/*!40000 ALTER TABLE `gauge_conversion` DISABLE KEYS */;
INSERT INTO `gauge_conversion` (`id`, `user_id`, `stitch_gauge_inch`, `stitches_10_cm`, `row_gauge_inch`, `rows_10_cm`, `created_at`, `updated_at`) VALUES
	(1, NULL, 2, 8, 3, 12, NULL, NULL),
	(2, NULL, 2.5, 10, 4, 16, NULL, NULL),
	(3, NULL, 3, 12, 4.5, 18, NULL, NULL),
	(4, NULL, 3.5, 14, 5, 20, NULL, NULL),
	(5, NULL, 4, 16, 5.5, 22, NULL, NULL),
	(6, NULL, 4.5, 18, 6, 24, NULL, NULL),
	(7, NULL, 5, 20, 6.5, 26, NULL, NULL),
	(8, NULL, 5.5, 22, 7, 28, NULL, NULL),
	(9, NULL, 6, 24, 7.5, 30, NULL, NULL),
	(10, NULL, 6.5, 26, 8, 32, NULL, NULL),
	(11, NULL, 7, 28, 8.5, 34, NULL, NULL),
	(12, NULL, 7.5, 30, 9, 36, NULL, NULL),
	(13, NULL, 8, 32, 0, 0, NULL, NULL);
/*!40000 ALTER TABLE `gauge_conversion` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
