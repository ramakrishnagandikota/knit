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

-- Dumping structure for table knitfit.master_list
DROP TABLE IF EXISTS `master_list`;
CREATE TABLE IF NOT EXISTS `master_list` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT '0',
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.master_list: ~14 rows (approximately)
DELETE FROM `master_list`;
/*!40000 ALTER TABLE `master_list` DISABLE KEYS */;
INSERT INTO `master_list` (`id`, `user_id`, `type`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'garment_type', 'Cardigan', 'cardigan', NULL, 1, NULL, NULL),
	(2, 1, 'garment_type', 'Coat', 'coat', NULL, 1, NULL, NULL),
	(3, 1, 'garment_type', 'dress', 'dress', NULL, 1, NULL, NULL),
	(4, 1, 'garment_type', 'Pullover', 'pullover', NULL, 1, NULL, NULL),
	(5, 1, 'garment_construction', 'Top Down', 'top-down', NULL, 1, NULL, NULL),
	(6, 1, 'garment_construction', 'Bottom Up', 'bottom-up', NULL, 1, NULL, NULL),
	(7, 1, 'garment_construction', 'Side-to-Side', 'side-to-side', NULL, 1, NULL, NULL),
	(8, 1, 'shoulder_construction', 'Set-in Sleeve', 'set-in-sleeve', NULL, 1, NULL, NULL),
	(9, 1, 'shoulder_construction', 'Drop Shoulder', 'drop-shoulder', NULL, 1, NULL, NULL),
	(10, 1, 'shoulder_construction', 'Raglan Sleeve', 'raglan-sleeve', NULL, 1, NULL, NULL),
	(11, 1, 'shoulder_construction', 'Yoke', 'yoke', NULL, 1, NULL, NULL),
	(12, 1, 'design_elements', 'Colorwork', 'colorwork', NULL, 1, NULL, NULL),
	(13, 1, 'design_elements', 'Lacework', 'lacework', NULL, 1, NULL, NULL),
	(14, 1, 'design_elements', 'Cable', 'cable', NULL, 1, NULL, NULL);
/*!40000 ALTER TABLE `master_list` ENABLE KEYS */;

-- Dumping structure for table knitfit.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `pid` text,
  `product_name` varchar(100) DEFAULT NULL,
  `slug` longtext,
  `short_description` text,
  `product_description` longtext,
  `additional_information` longtext,
  `skill_level` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sku` varchar(100) DEFAULT NULL,
  `attribute_set` text,
  `product_type` varchar(100) DEFAULT NULL,
  `is_custom` int(11) DEFAULT NULL,
  `design_type` int(11) DEFAULT NULL,
  `product_go_live_date` date DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `price` float DEFAULT NULL,
  `sale_price` float DEFAULT NULL,
  `sale_price_start_date` date DEFAULT NULL,
  `sale_price_end_date` date DEFAULT NULL,
  `related_products` varchar(100) DEFAULT NULL,
  `recommended_yarn` varchar(100) DEFAULT NULL,
  `recommended_fiber_type` varchar(100) DEFAULT NULL,
  `recommended_yarn_weight` varchar(100) DEFAULT NULL,
  `recommended_needle_size` varchar(100) DEFAULT NULL,
  `additional_tools` text,
  `designer_recommended_uom` varchar(50) DEFAULT NULL,
  `designer_recommended_ease_in` varchar(100) DEFAULT NULL,
  `designer_recommended_ease_cm` varchar(100) DEFAULT NULL,
  `recommended_stitch_gauge_in` float DEFAULT NULL,
  `recommended_stitch_gauge_cm` float DEFAULT NULL,
  `recommended_row_gauge_in` float DEFAULT NULL,
  `recommended_row_gauge_cm` float DEFAULT NULL,
  `garment_type` longtext,
  `garment_construction` longtext,
  `design_elements` longtext,
  `shoulder_construction` longtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.products: ~152 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table knitfit.product_comments
DROP TABLE IF EXISTS `product_comments`;
CREATE TABLE IF NOT EXISTS `product_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `email` text,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.product_comments: ~6 rows (approximately)
DELETE FROM `product_comments`;
/*!40000 ALTER TABLE `product_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_comments` ENABLE KEYS */;

-- Dumping structure for table knitfit.product_designer_measurements
DROP TABLE IF EXISTS `product_designer_measurements`;
CREATE TABLE IF NOT EXISTS `product_designer_measurements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `measurement_name` varchar(100) DEFAULT NULL,
  `measurement_value` varchar(100) DEFAULT NULL,
  `measurement_type` varchar(100) DEFAULT NULL,
  `measurement_description` varchar(100) DEFAULT NULL,
  `measurement_image` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_designer_measurements_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.product_designer_measurements: ~7 rows (approximately)
DELETE FROM `product_designer_measurements`;
/*!40000 ALTER TABLE `product_designer_measurements` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_designer_measurements` ENABLE KEYS */;

-- Dumping structure for table knitfit.product_images
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `image_small` text,
  `image_medium` text,
  `image_large` text,
  `image_description` text,
  `main_photo` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.product_images: ~6 rows (approximately)
DELETE FROM `product_images`;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;

-- Dumping structure for table knitfit.product_pdf
DROP TABLE IF EXISTS `product_pdf`;
CREATE TABLE IF NOT EXISTS `product_pdf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `content` longtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `product_designer_pattern_pdf_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.product_pdf: ~2 rows (approximately)
DELETE FROM `product_pdf`;
/*!40000 ALTER TABLE `product_pdf` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_pdf` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
