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

-- Dumping structure for table knitfit.admin_settings
DROP TABLE IF EXISTS `admin_settings`;
CREATE TABLE IF NOT EXISTS `admin_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_type` text COLLATE utf8mb4_unicode_ci,
  `setting_data` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.admin_settings: ~0 rows (approximately)
DELETE FROM `admin_settings`;
/*!40000 ALTER TABLE `admin_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_settings` ENABLE KEYS */;

-- Dumping structure for table knitfit.booking_process
DROP TABLE IF EXISTS `booking_process`;
CREATE TABLE IF NOT EXISTS `booking_process` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(225) DEFAULT NULL,
  `colour` varchar(100) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `bookingdate` text,
  `bookingtime` text,
  `promocodevalue` varchar(255) DEFAULT NULL,
  `promocodeamount` varchar(255) DEFAULT NULL,
  `avalaibality` varchar(255) DEFAULT NULL,
  `transaction_amount` varchar(255) DEFAULT NULL,
  `setpayment` varchar(255) DEFAULT NULL,
  `bookingfee` varchar(255) DEFAULT NULL,
  `nominatepayment` varchar(255) DEFAULT NULL,
  `ftotalamount` varchar(255) DEFAULT NULL,
  `subtotal` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `pat_table` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.booking_process: 1 rows
DELETE FROM `booking_process`;
/*!40000 ALTER TABLE `booking_process` DISABLE KEYS */;
INSERT INTO `booking_process` (`id`, `user_id`, `order_id`, `category_id`, `product_id`, `product_name`, `colour`, `product_quantity`, `bookingdate`, `bookingtime`, `promocodevalue`, `promocodeamount`, `avalaibality`, `transaction_amount`, `setpayment`, `bookingfee`, `nominatepayment`, `ftotalamount`, `subtotal`, `payment_method`, `pat_table`, `created_at`, `updated_at`, `ipaddress`) VALUES
	(1, 1, 1, 1, 1, 'Peakaboo cabled sweater', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '10', '10', NULL, NULL, '10', 'online', NULL, '2020-02-16 00:00:00', NULL, NULL);
/*!40000 ALTER TABLE `booking_process` ENABLE KEYS */;

-- Dumping structure for table knitfit.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `category_name` varchar(100) DEFAULT NULL,
  `description` longtext,
  `thumbnail` mediumtext,
  `page_title` text,
  `meta_description` mediumtext,
  `meta_keywords` longtext,
  `include_in_menu` int(11) DEFAULT '1' COMMENT '1 - yes / 0 - No',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.category: ~2 rows (approximately)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `user_id`, `category_name`, `description`, `thumbnail`, `page_title`, `meta_description`, `meta_keywords`, `include_in_menu`, `created_at`, `updated_at`, `active`) VALUES
	(1, NULL, 'Patterns', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0),
	(2, NULL, 'Yarns', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 0);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table knitfit.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

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
	(2, NULL, 2.5, 10, 3, 12, NULL, NULL),
	(3, NULL, 3, 12, 5, 20, NULL, NULL),
	(4, NULL, 3.5, 14, 5, 20, NULL, NULL),
	(5, NULL, 4, 16, 6.5, 26, NULL, NULL),
	(6, NULL, 4.5, 18, 7, 28, NULL, NULL),
	(7, NULL, 5, 20, 7.5, 30, NULL, NULL),
	(8, NULL, 5.5, 22, 7.5, 30, NULL, NULL),
	(9, NULL, 6, 24, 8, 32, NULL, NULL),
	(10, NULL, 6.5, 26, 8, 32, NULL, NULL),
	(11, NULL, 7, 28, 8.5, 34, NULL, NULL),
	(12, NULL, 7.5, 30, 9, 36, NULL, NULL),
	(13, NULL, 8, 32, 9, 36, NULL, NULL);
/*!40000 ALTER TABLE `gauge_conversion` ENABLE KEYS */;

-- Dumping structure for table knitfit.invoices
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `subscription_id` int(11) DEFAULT NULL,
  `sub_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_recurring` int(11) DEFAULT NULL,
  `invoice_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `paid` tinyint(1) DEFAULT NULL,
  `transaction_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payerid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TOKEN` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TIMESTAMP` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CORRELATIONID` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ACK` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PROFILEID` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PROFILESTATUS` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fulldata` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.invoices: ~6 rows (approximately)
DELETE FROM `invoices`;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` (`id`, `user_id`, `subscription_id`, `sub_type`, `is_recurring`, `invoice_id`, `title`, `qty`, `price`, `paid`, `transaction_id`, `payerid`, `TOKEN`, `TIMESTAMP`, `CORRELATIONID`, `ACK`, `PROFILEID`, `PROFILESTATUS`, `fulldata`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'Yearly', 1, NULL, 'Order #1 Invoice', NULL, 2.99, 1, NULL, 'L8FLPP3NH66ZN', 'EC-9AF02234DM038084W', '2020-03-05T08:50:24Z', 'a3bc2a8f34ca6', 'Success', 'I-M1YFU80P6TYG', 'ActiveProfile', '{"PROFILEID":"I-M1YFU80P6TYG","PROFILESTATUS":"ActiveProfile","TIMESTAMP":"2020-03-05T08:50:24Z","CORRELATIONID":"a3bc2a8f34ca6","ACK":"Success","VERSION":"123","BUILD":"53816603"}', '2020-03-05 08:50:24', '2020-03-05 08:50:24'),
	(2, 1, 2, 'Monthly', 0, NULL, 'Order #2 Invoice', 1, 2.99, 0, NULL, 'L8FLPP3NH66ZN', 'EC-2GD82343UR417931V', '2020-03-05T08:58:54Z', '1000952db53c5', 'Success', '', '', '{"TOKEN":"EC-2GD82343UR417931V","SUCCESSPAGEREDIRECTREQUESTED":"false","TIMESTAMP":"2020-03-05T08:58:54Z","CORRELATIONID":"1000952db53c5","ACK":"Success","VERSION":"123","BUILD":"54268142","INSURANCEOPTIONSELECTED":"false","SHIPPINGOPTIONISDEFAULT":"false","PAYMENTINFO_0_TRANSACTIONID":"9GB29011LL883931E","PAYMENTINFO_0_TRANSACTIONTYPE":"cart","PAYMENTINFO_0_PAYMENTTYPE":"instant","PAYMENTINFO_0_ORDERTIME":"2020-03-05T08:58:52Z","PAYMENTINFO_0_AMT":"2.99","PAYMENTINFO_0_FEEAMT":"0.39","PAYMENTINFO_0_TAXAMT":"0.00","PAYMENTINFO_0_CURRENCYCODE":"USD","PAYMENTINFO_0_PAYMENTSTATUS":"Pending","PAYMENTINFO_0_PENDINGREASON":"paymentreview","PAYMENTINFO_0_REASONCODE":"None","PAYMENTINFO_0_PROTECTIONELIGIBILITY":"Ineligible","PAYMENTINFO_0_PROTECTIONELIGIBILITYTYPE":"None","PAYMENTINFO_0_SELLERPAYPALACCOUNTID":"ramagkrishna91-facilitator@gmail.com","PAYMENTINFO_0_SECUREMERCHANTACCOUNTID":"XCB83XW6EKKHN","PAYMENTINFO_0_ERRORCODE":"0","PAYMENTINFO_0_ACK":"Success"}', '2020-03-05 08:58:54', '2020-03-05 08:58:54'),
	(3, 1, 2, 'Monthly', 0, '1583400732', 'Monthly Subscription #3 Invoice', 1, 2.99, 0, NULL, 'L8FLPP3NH66ZN', 'EC-2GD82343UR417931V', '2020-03-05T09:32:12Z', 'a527b29144a47', 'SuccessWithWarning', '', '', '{"TOKEN":"EC-2GD82343UR417931V","SUCCESSPAGEREDIRECTREQUESTED":"false","TIMESTAMP":"2020-03-05T09:32:12Z","CORRELATIONID":"a527b29144a47","ACK":"SuccessWithWarning","VERSION":"123","BUILD":"54268142","L_ERRORCODE0":"11607","L_SHORTMESSAGE0":"Duplicate Request","L_LONGMESSAGE0":"A successful transaction has already been completed for this token.","L_SEVERITYCODE0":"Warning","INSURANCEOPTIONSELECTED":"false","SHIPPINGOPTIONISDEFAULT":"false","PAYMENTINFO_0_TRANSACTIONID":"9GB29011LL883931E","PAYMENTINFO_0_TRANSACTIONTYPE":"cart","PAYMENTINFO_0_PAYMENTTYPE":"instant","PAYMENTINFO_0_ORDERTIME":"2020-03-05T08:58:52Z","PAYMENTINFO_0_AMT":"2.99","PAYMENTINFO_0_FEEAMT":"0.39","PAYMENTINFO_0_TAXAMT":"0.00","PAYMENTINFO_0_CURRENCYCODE":"USD","PAYMENTINFO_0_PAYMENTSTATUS":"Pending","PAYMENTINFO_0_PENDINGREASON":"paymentreview","PAYMENTINFO_0_REASONCODE":"None","PAYMENTINFO_0_PROTECTIONELIGIBILITY":"Ineligible","PAYMENTINFO_0_PROTECTIONELIGIBILITYTYPE":"None","PAYMENTINFO_0_SELLERPAYPALACCOUNTID":"ramagkrishna91-facilitator@gmail.com","PAYMENTINFO_0_SECUREMERCHANTACCOUNTID":"XCB83XW6EKKHN","PAYMENTINFO_0_ERRORCODE":"0","PAYMENTINFO_0_ACK":"Success"}', '2020-03-05 09:32:12', '2020-03-05 09:32:12'),
	(4, 1, 2, 'Yearly', 1, '1583403618', 'Yearly Subscription', 1, 2.99, 0, NULL, NULL, 'EC-6XT92834CT824263F', NULL, NULL, 'Payment cancled by user', NULL, NULL, NULL, '2020-03-05 10:20:18', '2020-03-05 10:20:18'),
	(5, 1, 2, 'Yearly', 1, '1583404055', 'Yearly Subscription', 1, 2.99, 0, NULL, NULL, 'EC-0BB68383TE803950E', NULL, NULL, 'Payment cancled by user', NULL, NULL, NULL, '2020-03-05 10:27:35', '2020-03-05 10:27:35'),
	(6, 1, 2, 'Monthly', 0, '1583405160', 'Monthly Subscription #6 Invoice', 1, 2.99, 0, NULL, 'L8FLPP3NH66ZN', 'EC-3J643931BR5489203', '2020-03-05T10:46:00Z', 'c23b28d05cc9a', 'Success', '', '', '{"TOKEN":"EC-3J643931BR5489203","SUCCESSPAGEREDIRECTREQUESTED":"false","TIMESTAMP":"2020-03-05T10:46:00Z","CORRELATIONID":"c23b28d05cc9a","ACK":"Success","VERSION":"123","BUILD":"54268142","INSURANCEOPTIONSELECTED":"false","SHIPPINGOPTIONISDEFAULT":"false","PAYMENTINFO_0_TRANSACTIONID":"25125929WG6683239","PAYMENTINFO_0_TRANSACTIONTYPE":"cart","PAYMENTINFO_0_PAYMENTTYPE":"instant","PAYMENTINFO_0_ORDERTIME":"2020-03-05T10:45:58Z","PAYMENTINFO_0_AMT":"2.99","PAYMENTINFO_0_FEEAMT":"0.39","PAYMENTINFO_0_TAXAMT":"0.00","PAYMENTINFO_0_CURRENCYCODE":"USD","PAYMENTINFO_0_PAYMENTSTATUS":"Pending","PAYMENTINFO_0_PENDINGREASON":"paymentreview","PAYMENTINFO_0_REASONCODE":"None","PAYMENTINFO_0_PROTECTIONELIGIBILITY":"Ineligible","PAYMENTINFO_0_PROTECTIONELIGIBILITYTYPE":"None","PAYMENTINFO_0_SELLERPAYPALACCOUNTID":"ramagkrishna91-facilitator@gmail.com","PAYMENTINFO_0_SECUREMERCHANTACCOUNTID":"XCB83XW6EKKHN","PAYMENTINFO_0_ERRORCODE":"0","PAYMENTINFO_0_ACK":"Success"}', '2020-03-05 10:46:00', '2020-03-05 10:46:00'),
	(7, 18, 2, 'Yearly', 1, '1583405901', 'Yearly Subscription #7 Invoice', 1, 2.99, 1, NULL, 'L8FLPP3NH66ZN', 'EC-4R790641N7399792L', '2020-03-05T10:58:20Z', '95b91846f62d5', 'Success', 'I-2KPB0A5SJN5S', 'ActiveProfile', '{"PROFILEID":"I-2KPB0A5SJN5S","PROFILESTATUS":"ActiveProfile","TIMESTAMP":"2020-03-05T10:58:20Z","CORRELATIONID":"95b91846f62d5","ACK":"Success","VERSION":"123","BUILD":"53816603"}', '2020-03-05 10:58:21', '2020-03-05 10:58:21');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;

-- Dumping structure for table knitfit.ipn_status
DROP TABLE IF EXISTS `ipn_status`;
CREATE TABLE IF NOT EXISTS `ipn_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.ipn_status: ~0 rows (approximately)
DELETE FROM `ipn_status`;
/*!40000 ALTER TABLE `ipn_status` DISABLE KEYS */;
/*!40000 ALTER TABLE `ipn_status` ENABLE KEYS */;

-- Dumping structure for table knitfit.items
DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(10) unsigned NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` double NOT NULL,
  `item_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `items_invoice_id_foreign` (`invoice_id`),
  CONSTRAINT `items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.items: ~17 rows (approximately)
DELETE FROM `items`;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `invoice_id`, `item_name`, `item_price`, `item_qty`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Monthly Subscription PAYPALDEMOAPP #1', 2, 1, '2020-03-03 16:35:32', '2020-03-03 16:35:32'),
	(2, 2, 'Monthly Subscription PAYPALDEMOAPP #2', 2, 1, '2020-03-03 16:37:25', '2020-03-03 16:37:25'),
	(3, 3, 'Monthly Subscription PAYPALDEMOAPP #3', 2, 1, '2020-03-04 13:40:42', '2020-03-04 13:40:42'),
	(4, 4, 'Monthly Subscription PAYPALDEMOAPP #4', 2, 1, '2020-03-04 13:42:12', '2020-03-04 13:42:12'),
	(5, 5, 'Monthly Subscription PAYPALDEMOAPP #5', 2, 1, '2020-03-04 13:43:45', '2020-03-04 13:43:45'),
	(6, 6, 'Monthly Subscription PAYPALDEMOAPP #6', 2, 1, '2020-03-04 13:45:00', '2020-03-04 13:45:00'),
	(7, 7, 'Monthly Subscription PAYPALDEMOAPP #7', 2.99, 1, '2020-03-04 13:48:50', '2020-03-04 13:48:50'),
	(8, 8, 'Monthly Subscription PAYPALDEMOAPP #8', 2.99, 1, '2020-03-04 13:49:13', '2020-03-04 13:49:13'),
	(9, 9, 'Monthly Subscription PAYPALDEMOAPP #9', 2.99, 1, '2020-03-04 13:50:16', '2020-03-04 13:50:16'),
	(10, 10, 'Monthly Subscription PAYPALDEMOAPP #10', 2, 1, '2020-03-04 17:00:03', '2020-03-04 17:00:03'),
	(11, 11, 'Monthly Subscription PAYPALDEMOAPP #11', 2.99, 1, '2020-03-04 17:17:07', '2020-03-04 17:17:07'),
	(12, 12, 'Monthly Subscription PAYPALDEMOAPP #12', 2.99, 1, '2020-03-04 17:31:11', '2020-03-04 17:31:11'),
	(13, 13, 'Monthly Subscription PAYPALDEMOAPP #13', 2.99, 1, '2020-03-04 17:41:23', '2020-03-04 17:41:23'),
	(14, 14, 'Monthly Subscription PAYPALDEMOAPP #14', 2.99, 1, '2020-03-04 17:50:16', '2020-03-04 17:50:16'),
	(15, 15, 'Monthly Subscription PAYPALDEMOAPP #15', 2.99, 1, '2020-03-04 17:53:58', '2020-03-04 17:53:58'),
	(16, 16, 'Yearly Subscription PAYPALDEMOAPP #16', 35.88, 1, '2020-03-04 18:01:06', '2020-03-04 18:01:06'),
	(17, 17, 'Monthly Subscription PAYPALDEMOAPP #17', 2.99, 1, '2020-03-04 18:08:25', '2020-03-04 18:08:25'),
	(18, 18, 'Yearly Subscription PAYPALDEMOAPP #18', 2.99, 1, '2020-03-04 18:10:48', '2020-03-04 18:10:48'),
	(19, 19, 'Yearly Subscription PAYPALDEMOAPP #19', 35.88, 1, '2020-03-05 05:01:25', '2020-03-05 05:01:25'),
	(20, 20, 'Yearly Subscription PAYPALDEMOAPP #20', 2.99, 1, '2020-03-05 05:10:57', '2020-03-05 05:10:57'),
	(21, 21, 'Monthly Subscription PAYPALDEMOAPP #21', 2.99, 1, '2020-03-05 05:12:31', '2020-03-05 05:12:31');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;

-- Dumping structure for table knitfit.measurement_variables
DROP TABLE IF EXISTS `measurement_variables`;
CREATE TABLE IF NOT EXISTS `measurement_variables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `variable_type` varchar(100) DEFAULT NULL,
  `variable_name` text,
  `variable_image` text,
  `variable_description` text,
  `v_inch_min` int(11) DEFAULT NULL,
  `v_inch_max` int(11) DEFAULT NULL,
  `v_cm_min` int(11) DEFAULT NULL,
  `v_cm_max` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.measurement_variables: ~21 rows (approximately)
DELETE FROM `measurement_variables`;
/*!40000 ALTER TABLE `measurement_variables` DISABLE KEYS */;
INSERT INTO `measurement_variables` (`id`, `variable_type`, `variable_name`, `variable_image`, `variable_description`, `v_inch_min`, `v_inch_max`, `v_cm_min`, `v_cm_max`, `user_id`, `sort`, `created_at`, `updated_at`) VALUES
	(1, 'body_size', 'hips', NULL, NULL, 0, 100, 0, 250, 1, 1, '2020-01-06 00:00:00', NULL),
	(2, 'body_size', 'waist', NULL, NULL, 0, 100, 0, 250, 1, 2, '2020-01-06 00:00:00', NULL),
	(3, 'body_size', 'waist front', NULL, NULL, 0, 100, 0, 250, 1, 3, '2020-01-06 00:00:00', NULL),
	(4, 'body_size', 'bust', NULL, NULL, 0, 100, 0, 250, 1, 4, '2020-01-06 00:00:00', NULL),
	(5, 'body_size', 'bust front', NULL, NULL, 0, 100, 0, 250, 1, 5, '2020-01-06 00:00:00', NULL),
	(6, 'body_size', 'bust back', NULL, NULL, 0, 100, 0, 250, 1, 6, '2020-01-06 00:00:00', NULL),
	(7, 'body_length', 'Waist to Underarm', NULL, NULL, 0, 50, 0, 125, 1, 7, '2020-01-06 00:00:00', NULL),
	(8, 'body_length', 'Armhole Depth', NULL, NULL, 0, 50, 0, 125, 1, 8, '2020-01-06 00:00:00', NULL),
	(9, 'arm_size', 'Wrist Circumference', NULL, NULL, 0, 50, 0, 125, 1, 9, '2020-01-06 00:00:00', NULL),
	(10, 'arm_size', 'Upperarm Circumference', NULL, NULL, 0, 50, 0, 125, 1, 11, '2020-01-06 00:00:00', NULL),
	(11, 'arm_size', 'Shoulder Circumference', NULL, NULL, 0, 50, 0, 125, 1, 12, '2020-01-06 00:00:00', NULL),
	(12, 'arm_length', 'Wrist to Underarm', NULL, NULL, 0, 50, 0, 125, 1, 13, '2020-01-06 00:00:00', NULL),
	(13, 'arm_length', 'Wrist to Elbow', NULL, NULL, 0, 50, 0, 125, 1, 14, '2020-01-06 00:00:00', NULL),
	(14, 'arm_length', 'Elbow to Underarm', NULL, NULL, 0, 50, 0, 125, 1, 15, '2020-01-06 00:00:00', NULL),
	(15, 'arm_length', 'Wrist to Top of Shoulder', NULL, NULL, 0, 50, 0, 125, 1, 16, '2020-01-06 00:00:00', NULL),
	(16, 'neck_and_shoulders', 'Depth of Neck', NULL, NULL, 0, 50, 0, 125, 1, 17, '2020-01-06 00:00:00', NULL),
	(17, 'neck_and_shoulders', 'Neck Circumference', NULL, NULL, 0, 50, 0, 125, 1, 18, '2020-01-06 00:00:00', NULL),
	(18, 'neck_and_shoulders', 'Neck Width', NULL, NULL, 0, 50, 0, 125, 1, 19, '2020-01-06 00:00:00', NULL),
	(19, 'neck_and_shoulders', 'Neck to Shoulder', NULL, NULL, 0, 50, 0, 125, 1, 20, '2020-01-06 00:00:00', NULL),
	(20, 'neck_and_shoulders', 'Shoulder to Shoulder', NULL, NULL, 0, 50, 0, 125, 1, 21, '2020-01-06 00:00:00', NULL),
	(21, 'arm_size', 'Forearm circumference', NULL, NULL, 0, 50, 0, 125, 1, 10, NULL, NULL);
/*!40000 ALTER TABLE `measurement_variables` ENABLE KEYS */;

-- Dumping structure for table knitfit.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.migrations: ~18 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_11_29_064049_create_admin_settings_table', 1),
	(5, '2019_12_02_120228_create_roles_table', 1),
	(6, '2019_12_02_131153_create_user_measurements_table', 1),
	(7, '2019_12_03_061614_create_user_profile_table', 1),
	(8, '2019_12_03_061911_create_user_role_table', 1),
	(9, '2020_01_29_094747_create_subscriptions_table', 1),
	(10, '2020_01_29_111415_create_user_subscriptions_table', 1),
	(11, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
	(12, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
	(13, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
	(14, '2016_06_01_000004_create_oauth_clients_table', 2),
	(15, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
	(17, '2018_08_21_161348_create_ipn_status_table', 3),
	(18, '2016_10_31_160339_create_items_table', 4),
	(19, '2016_10_31_160156_create_invoices_table', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table knitfit.needle_sizes
DROP TABLE IF EXISTS `needle_sizes`;
CREATE TABLE IF NOT EXISTS `needle_sizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `us_size` float DEFAULT NULL,
  `mm_size` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.needle_sizes: ~20 rows (approximately)
DELETE FROM `needle_sizes`;
/*!40000 ALTER TABLE `needle_sizes` DISABLE KEYS */;
INSERT INTO `needle_sizes` (`id`, `user_id`, `us_size`, `mm_size`, `created_at`, `updated_at`) VALUES
	(1, 1, 0, 1.75, NULL, NULL),
	(2, 1, 0, 2, NULL, NULL),
	(3, 1, 1, 2.25, NULL, NULL),
	(4, 1, 1.5, 2.5, NULL, NULL),
	(5, 1, 2, 2.75, NULL, NULL),
	(6, 1, 3, 3.25, NULL, NULL),
	(7, 1, 4, 3.5, NULL, NULL),
	(8, 1, 5, 3.75, NULL, NULL),
	(9, 1, 6, 4, NULL, NULL),
	(10, 1, 7, 4.5, NULL, NULL),
	(11, 1, 8, 5, NULL, NULL),
	(12, 1, 9, 5.5, NULL, NULL),
	(13, 1, 10, 6, NULL, NULL),
	(14, 1, 10.5, 6.5, NULL, NULL),
	(15, 1, 11, 8, NULL, NULL),
	(16, 1, 13, 9, NULL, NULL),
	(17, 1, 15, 10, NULL, NULL),
	(18, 1, 16, 0, NULL, NULL),
	(19, 1, 17, 0, NULL, NULL),
	(20, 1, 19, 0, NULL, NULL);
/*!40000 ALTER TABLE `needle_sizes` ENABLE KEYS */;

-- Dumping structure for table knitfit.oauth_access_tokens
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.oauth_access_tokens: ~6 rows (approximately)
DELETE FROM `oauth_access_tokens`;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('2d894555eefb23dc64c914f1e9d12104fef3adfd0f3367dcc89d342880e0b1a225d45b304bfb2d2c', 1, 1, 'MyApp', '[]', 0, '2020-02-29 06:53:00', '2020-02-29 06:53:00', '2021-03-01 06:53:00'),
	('5fa5e6dfc2f7fdaebab6f802e28a6da1c614bf18678a2904d791b6f47763f1450c38dd96bb2a33fe', 1, 1, 'MyApp', '[]', 0, '2020-02-29 06:37:05', '2020-02-29 06:37:05', '2021-03-01 06:37:05'),
	('75d1c1da886027c5320dbfb9c2f69c10a66088fd4397a2c6493326c2ece13ce9143e141d35d186e6', 1, 1, 'MyApp', '[]', 0, '2020-02-29 06:57:43', '2020-02-29 06:57:43', '2020-08-29 06:57:43'),
	('8707de91dcebea7dff2d75ab558a2a9f86cd330082933805bc69b13d82db2ddd09c98eb3e870c165', 1, 1, 'MyApp', '[]', 0, '2020-02-29 06:41:47', '2020-02-29 06:41:47', '2021-03-01 06:41:47'),
	('b0054521052cfb182deae1a1d7fbf181535c99d89fb000411198889cf7a86c6fd74ad4d4564b8695', 1, 1, 'MyApp', '[]', 0, '2020-02-29 06:56:11', '2020-02-29 06:56:11', '2020-08-29 06:56:11'),
	('e6eb7bc17d7b9cdc4e809ac62f156a294f7539a36e0b74218873baea508cc7a45e59d5ae099626a4', 1, 1, 'MyApp', '[]', 0, '2020-02-29 06:48:34', '2020-02-29 06:48:34', '2021-03-01 06:48:34'),
	('f957f1910e8c358411401875a02f270e88cdffab47961c64019699859cbaf8f76cd9211a19eb3745', 1, 1, 'MyApp', '[]', 0, '2020-02-29 06:40:28', '2020-02-29 06:40:28', '2021-03-01 06:40:28');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;

-- Dumping structure for table knitfit.oauth_auth_codes
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `client_id` bigint(20) unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.oauth_auth_codes: ~0 rows (approximately)
DELETE FROM `oauth_auth_codes`;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;

-- Dumping structure for table knitfit.oauth_clients
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.oauth_clients: ~2 rows (approximately)
DELETE FROM `oauth_clients`;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Laravel Personal Access Client', 'rhhkSgKbIFVJZ0GNg4h0tvzpni5otXe9IpyR1by5', 'http://localhost', 1, 0, 0, '2020-02-29 06:19:24', '2020-02-29 06:19:24'),
	(2, NULL, 'Laravel Password Grant Client', 'ayv1Uv9Bc4TWa6cP9WrbPJAdgNNAoj9y6TNvJbSz', 'http://localhost', 0, 1, 0, '2020-02-29 06:19:24', '2020-02-29 06:19:24');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;

-- Dumping structure for table knitfit.oauth_personal_access_clients
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.oauth_personal_access_clients: ~0 rows (approximately)
DELETE FROM `oauth_personal_access_clients`;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2020-02-29 06:19:24', '2020-02-29 06:19:24');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;

-- Dumping structure for table knitfit.oauth_refresh_tokens
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.oauth_refresh_tokens: ~0 rows (approximately)
DELETE FROM `oauth_refresh_tokens`;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;

-- Dumping structure for table knitfit.orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `order_number` varchar(255) DEFAULT NULL COMMENT 'payment_id',
  `order_date` datetime DEFAULT NULL,
  `invoice` text,
  `order_status` varchar(255) DEFAULT NULL,
  `order_token` text,
  `order_description` varchar(255) DEFAULT NULL,
  `ordered_amt` varchar(255) DEFAULT '0',
  `shipping` varchar(50) DEFAULT NULL,
  `currency` varchar(50) NOT NULL,
  `refund` varchar(11) DEFAULT NULL,
  `refund_reason` text,
  `booking_fullname` varchar(255) DEFAULT NULL,
  `booking_address` text,
  `booking_address2` varchar(250) DEFAULT NULL,
  `booking_city` text,
  `booking_state` text,
  `booking_zipcode` text,
  `booking_contactnumber` text,
  `booking_datebooked` date DEFAULT NULL,
  `booking_timebooked` text NOT NULL,
  `booking_email` varchar(255) DEFAULT NULL,
  `additional_email` varchar(255) DEFAULT NULL,
  `booking_cart_total` varchar(255) DEFAULT NULL,
  `orders_last_updated_by` varchar(255) DEFAULT NULL,
  `orders_last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `booking_discounts` varchar(255) DEFAULT NULL,
  `promotion_payment` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `refunded` varchar(255) DEFAULT NULL,
  `payment_type` varchar(50) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `cart_total` longtext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.orders: ~0 rows (approximately)
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `user_id`, `order_number`, `order_date`, `invoice`, `order_status`, `order_token`, `order_description`, `ordered_amt`, `shipping`, `currency`, `refund`, `refund_reason`, `booking_fullname`, `booking_address`, `booking_address2`, `booking_city`, `booking_state`, `booking_zipcode`, `booking_contactnumber`, `booking_datebooked`, `booking_timebooked`, `booking_email`, `additional_email`, `booking_cart_total`, `orders_last_updated_by`, `orders_last_updated`, `booking_discounts`, `promotion_payment`, `total`, `refunded`, `payment_type`, `address_id`, `cart_total`, `created_at`, `updated_at`, `ipaddress`) VALUES
	(1, 1, '12345', '2020-02-17 00:00:00', '12345', '1', NULL, NULL, '0', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '2020-02-17 14:03:36', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table knitfit.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_clicked` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.password_resets: ~6 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `is_clicked`, `created_at`) VALUES
	('nikithabandari79@gmail.com', '46f0fe0883d4e77e8a001259ee3a439d', 0, '2020-01-16 16:51:15'),
	('nikithabandari79@gmail.com', '5ac1aaf695215e160043a758587864f0', 0, '2020-01-16 16:52:20'),
	('nikithabandari79@gmail.com', '7f696e470e05e0a82882f0a306f2b078', 1, '2020-01-27 13:03:58'),
	('nikithabandari79@gmail.com', 'b7f15f6c7e8354b3098e49b6cc5f6263', 1, '2020-01-27 13:07:03'),
	('nickersonjane@gmail.com', '395a3da1186fa79f47992c9836108ce8', 1, '2020-01-27 21:14:12'),
	('nikithabandari79@gmail.com', '0a554141ce67aa137e09e865fe009e94', 0, '2020-02-10 19:28:26'),
	('rkrishna021@gmail.com', '35a8e052d425781a91030bd755ea6f98', 1, '2020-03-03 05:02:38');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table knitfit.products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `short_description` text,
  `product_description` longtext,
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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.products: ~1 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `user_id`, `product_name`, `short_description`, `product_description`, `skill_level`, `category_id`, `sku`, `attribute_set`, `product_type`, `is_custom`, `design_type`, `product_go_live_date`, `status`, `price`, `sale_price`, `sale_price_start_date`, `sale_price_end_date`, `related_products`, `recommended_yarn`, `recommended_fiber_type`, `recommended_yarn_weight`, `recommended_needle_size`, `additional_tools`, `designer_recommended_uom`, `designer_recommended_ease_in`, `designer_recommended_ease_cm`, `recommended_stitch_gauge_in`, `recommended_stitch_gauge_cm`, `recommended_row_gauge_in`, `recommended_row_gauge_cm`, `created_at`, `updated_at`, `ipaddress`) VALUES
	(1, NULL, 'Peakaboo Cables sweater', 'short description', 'Long description', 'easy', 1, 'kfk0001', NULL, NULL, 1, NULL, '2020-02-16', 1, 10, NULL, NULL, NULL, NULL, 'wool', 'wool', '100', '10', 'not required', NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
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

-- Dumping data for table knitfit.product_comments: ~0 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.product_designer_measurements: ~0 rows (approximately)
DELETE FROM `product_designer_measurements`;
/*!40000 ALTER TABLE `product_designer_measurements` DISABLE KEYS */;
INSERT INTO `product_designer_measurements` (`id`, `user_id`, `product_id`, `measurement_name`, `measurement_value`, `measurement_type`, `measurement_description`, `measurement_image`, `status`, `created_at`, `updated_at`, `ipaddress`) VALUES
	(1, NULL, 1, 'Wrist Circumference', NULL, 'text', NULL, NULL, 1, NULL, NULL, NULL);
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
  `created_by` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.product_images: ~0 rows (approximately)
DELETE FROM `product_images`;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` (`id`, `user_id`, `product_id`, `image_small`, `image_medium`, `image_large`, `image_description`, `main_photo`, `created_by`, `created_at`, `updated_by`, `updated_at`, `status`) VALUES
	(1, NULL, 1, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1581673838187.png', 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1581673838187.png', 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1581673838187.png', NULL, 1, 1, '2020-02-17 14:00:55', 1, NULL, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.product_pdf: ~1 rows (approximately)
DELETE FROM `product_pdf`;
/*!40000 ALTER TABLE `product_pdf` DISABLE KEYS */;
INSERT INTO `product_pdf` (`id`, `user_id`, `product_id`, `content`, `created_at`, `updated_at`, `ipaddress`) VALUES
	(1, NULL, 1, '<div class="col-lg-12 card panel-group" id="accordion">\r\n\r\n    <!-- personal card start -->\r\n    <!--First Accordion Starts here-->\r\n    <div class="row outline-row m-b-20">\r\n        <div class="card-header accordion col-lg-11" data-toggle="collapse">\r\n            <h5 class="card-header-text">Pattern instructions</h5>\r\n        </div>\r\n    </div>\r\n    <div class="row theme-row m-b-10">\r\n        <div class="card-header accordion border-accordion1 active col-lg-12" data-toggle="collapse" data-target="#section01">\r\n            <h5 class="card-header-text">Description</h5><i class="fa fa-caret-down pull-right micro-icons"></i>\r\n        </div>\r\n\r\n    </div>\r\n    <div class="card-block collapse show" id="section01">\r\n        <div class="row">\r\n            <div class="col-lg-12 text-center">\r\n                <h3 class="text-danger">Peekaboo\'s sweater</h3>\r\n                <h5 class="m-b-30"><i>By Clara Masessa</i></h5>\r\n            </div>\r\n            <div class="col-lg-12 text-center">\r\n                <figure class="figure-img">\r\n                    <img src="../../files/assets/images/user-card/peekabo.jpg" class="img-thumbnail" alt="">\r\n                    <figcaption class="figure-caption">\r\n                        <br>This simple and classic cabled sweater is a great addition to any winter wardrobe. But look closely, and you will see that it has an open cable on the sleeves and a peekaboo open cable just under the v-neck.</figcaption>\r\n                </figure>\r\n\r\n            </div>\r\n\r\n        </div>\r\n    </div>\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <!--New Accordion Starts here-->\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 active col-lg-12" data-toggle="collapse" data-target="#section2">\r\n                    <h5 class="card-header-text">Size</h5>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse show" id="section2">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n                        <p class="font-15">This sweater has been created for [[FIRST_NAME]] [[LAST_NAME]] with your measurements.\r\n\r\n                        </p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Ends here-->\r\n\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 active col-lg-12" data-toggle="collapse" data-target="#section3">\r\n                    <h5 class="card-header-text">Gauge</h5><i class="fa fa-caret-down pull-right micro-icons"></i>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse show" id="section3">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n                        <p class="font-15">This pattern has been written for a gauge of [[STITCH_GAUGE]] stitches and [[ROW_GAUGE]] rows per inch. The original design was created in a gauge of 5.5 stitches and 7 rows per inch in stockinette. However, you can select a yarn from fingering to aran weight if you’d like. Just make sure that you have knit an accurate gauge swatch in the yarn you will be using. Note: To measure a proper gauge, cast on 40 stitches using the needle size recommended for the yarn. Knit in Stockinette for at least 4 inches. Take swatch off the needles, lay it flat and measure in the center towards the top of the swatch. Knit using suggested needles first. Adjust needle size until you have a swatch that feels soft and drapey without being too loose.</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Ends here-->\r\n\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 active col-lg-12" data-toggle="collapse" data-target="#section4">\r\n                    <h5 class="card-header-text">Materials</h5><i class="fa fa-caret-down pull-right micro-icons"></i>\r\n                </div>\r\n            </div>\r\n            <div class="card-block collapse show" id="section4">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n                        <p class="font-15">24” or 32” circular needles in the size used to obtain gauge Cable needle and stitch markers</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Ends here-->\r\n\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 active col-lg-12" data-toggle="collapse" data-target="#section5">\r\n                    <h5 class="card-header-text">Abbreviations and techniques</h5><i class="fa fa-caret-down pull-right micro-icons"></i>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse show" id="section5">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n                        <p class="font-15">This sweater features an open cable just below the V-neck and on the sleeves. To knit the open cable in the round, you will have to join a new ball of yarn and knit the two sides separately until the sides are joined where the cable crosses again. The instructions are included in the pattern.</p>\r\n\r\n                        <div class="col-lg-12">\r\n                            <ul class="bullet-list">\r\n                                <li>BO - bind off Rs - right side</li>\r\n                                <li>C8F - Place 8 stitches on cable needle, hold in front, k8, k8 from cable needle Sl1p - slip one stitch purlwise</li>\r\n                                <li>CO - Cast on sm - slip marker</li>\r\n                                <li>k - knit Ssk - slip 2 stitches purlwise, knit these together</li>\r\n\r\n                                <li>K2tog - knit 2 stitches together pm - place marker</li>\r\n                                <li>p - purl ws -wrong side</li>\r\n                            </ul>\r\n                        </div>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Ends here-->\r\n\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 active col-lg-12" data-toggle="collapse" data-target="#section6">\r\n                    <h5 class="card-header-text">Kitchener stitch</h5><i class="fa fa-caret-down pull-right micro-icons"></i>\r\n                </div>\r\n            </div>\r\n            <div class="card-block collapse show" id="section6">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n                        <p class="font-15">The Kitchener Stitch creates an invisible seam by grafting together live stitches. In this sweater, it is used to join the right and left collar at the back of the neck. If you are not familiar with the Kitchener Stitch, choose a quiet place where you can “chant” the steps as you work to keep track of your progress. Thread a tapestry needle with a long tail of the active yarn (1 1/2 inch for each pair of stitches, plus a 5” tail). Place the two edges of live stitches on two needles and hold them with wrong sides together and with the points facing to the right. The active yarn should be on the back needle. Set up:</p>\r\n\r\n                        <ul class="bullet-list">\r\n                            <li class="disc">Step 1: Insert the tapestry needle in the first stitch of the front knitting needle as if to purl, and leave it on the knitting needle.</li>\r\n                            <li>Step 2: Insert the tapestry needle in the first stitch of the back knitting needle as if to knit, and leave it on the knitting needle.Repeat the following 4 steps until all stitches have been grafted:</li>\r\n\r\n                            <li>Step 1: Insert the tapestry needle in the first stitch of the front knitting needle as if to knit, and pull the stitch off the knitting needle.</li>\r\n                            <li>Step 2: Insert the tapestry needle in the next stitch of the front knitting needle as if to purl, and leave it on the knitting needle.</li>\r\n                            <li>Step 3: Insert the tapestry needle in the first stitch of the back knitting needle as if to purl, and pull the stitch off the knitting needle.\r\n                            </li>\r\n                            <li>Step 4: Insert the tapestry needle in the first stitch of the back knitting needle as if to knit, and leave it on the knitting needle. As you complete the 4 steps, adjust the tension of the active yarn on the completed stitches until they disappear into the fabric of the garment.</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n    <!--New Accordion Ends here-->\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 active col-lg-12" data-toggle="collapse" data-target="#section7">\r\n                    <h5 class="card-header-text">Directions</h5><i class="fa fa-caret-down pull-right micro-icons"></i>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse show" id="section7">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n                        <p class="font-15">CO [[NO_OF_STITCHES_TO_CAST_ON]] stitches. Join in the round, being careful not to twist the stitches.</p>\r\n\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Ends here-->\r\n\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 active col-lg-12" data-toggle="collapse" data-target="#section8">\r\n                    <h5 class="card-header-text">Ribbed border </h5><i class="fa fa-caret-down pull-right micro-icons"></i>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse show" id="section8">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n                        <p class="font-15">Rows 1-3: *K2, p2* for [[CENTER_MARKER_1]] stitches, place marker, continue in *k1, p1* 10 times, pm, continue in k2, p2 rib for [[CENTER_MARKER_1]] stitches, place side marker. Continue in k2, p2 rib to beginning of round and place a side marker. Rows 4-6: *K3, p1, k2, p2* to the first marker, sm, *k1, p1* 10 times, sm, *k2, p2, k3, p1* to the end of the round. Rows 7-8: *K3, p1*, sm, p2, *k3, p1* 4 times, p2, sm, *k3, p1* to the end of the round.</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Ends here-->\r\n\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 col-lg-12" data-toggle="collapse" data-target="#section9">\r\n                    <h5 class="card-header-text">Body of sweater</h5><i class="fa fa-caret-down pull-right micro-icons"></i>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse" id="section9">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n                        <p class="font-15">Knit in stockinette to the center front marker, sm, *p2, k16, p2*, sm, continue in stockinette to the end of the round. Decrease every [[DECREASE_EVERY_N_ROWS_WAIST]] rounds to the waist as follows: Round 1: Knit 1, K2tog, knit to 3 stitches before the side marker, ssk, k1, sm, k1, k2tog, knit to 3 stitches before the beginning of round marker, ssk, k1, sm. Rounds 2 - [[DECREASE_EVERY_N_ROWS_WAIST]]: Knit around. Repeat these rounds for a total of [[NO_OF_TIMES_TO_DECREASE_WAIST]] times. At the same time, work cable on center 16 stitches as follows: Cable Row: At row [[NO_OF_ROWS_BETWEEN_CABLES]] from the cast on edge, knit to the first marker. Sm, p2, c8f (place 8 stitches on a cable needle and hold to the front, k8, k8 from the cable needle), p2, sm, knit to the end of round. Continue to knit in stockinette, repeating the cable row every [[NO_OF_ROWS_BETWEEN_CABLES]] rows. When the sweater measures [[LOWER_EDGE_TO_WAIST]] inches from the lower edge, begin bust shaping.\r\n                        </p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Ends here-->\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 col-lg-12" data-toggle="collapse" data-target="#section10">\r\n                    <h5 class="card-header-text">Bust shaping</h5><i class="fa fa-caret-down pull-right micro-icons"></i>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse" id="section10">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n                        <p class="font-15">You may be increasing at different rates in front and in back depending on your fit. Read the following 2 sections before you begin.</p>\r\n                        <ul class="bullet-list">\r\n                            <li class="disc">[[TEXT_FOR_BUST_INCREASES]]</li>\r\n                            <li>[[SECOND_LINE_TEXT_FOR_BUST_INCREASES]]</li>\r\n                            <li>At the same time, increase from the waist in back as follows:</li>\r\n                            <li>[[NO_OF_TIMES_TO_INCREASE_BACK]] Continue to knit in stockinette, including cable rows, until the sweater measures [[ARM_LENGTH_TO_UNDER_ARM]] inches.</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Ends here-->\r\n\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 col-lg-12" data-toggle="collapse" data-target="#section11">\r\n                    <h5 class="card-header-text">Front</h5>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse show" id="section11">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n                        <p class="font-15 ">Knit in pattern to the side marker. Place the back stitches on the holder. Turn and continue to knit the front, shaping armholes as follows:\r\n                        </p>\r\n                        <ul>\r\n                            <li>Bind off [[NO_OF_STITCHES_FOR_FIRST_DECREASE_AT_ARMHOLE]] stitches at the beginning of the next 2 rows.</li>\r\n                            <li>BO [[NO_OF_STITCHES_FOR_SECOND_DECREASE_AT_ARMHOLE]] stitches at the beginning of the next 2 rows</li>\r\n                            <li>[[NO_OF_STITCHES_FOR_THIRD_DECREASE_AT_ARMHOLE]]\r\n                            </li>\r\n                            </li>[[NO_OF_STITCHES_FOR_4TH_DECREASE_AT_ARMHOLE]]</li>\r\n                            </li>Decrease 1 stitch at each end [[NO_OF_TIMES_TO_DECREASE_1_STITCH_AT_EACH_END]] times as follows\r\n                            </li>\r\n                            </li>1st row: K1, k2tog, knit to the last 3 stitches, ssk, k1. At the same time, place a marker at the center. 2nd row: Purl back.</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Ends here-->\r\n\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 col-lg-12" data-toggle="collapse" data-target="#section12">\r\n                    <h5 class="card-header-text">Open cable</h5>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse" id="section12">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n                        <p class="font-15 ">At the same time, repeat the cable row one more time [[NO_OF_ROWS_BETWEEN_CABLES]] rows after the last cable row as follows:</p>\r\n                        <ul class="bullet-list">\r\n                            <li>Knit to the marker, sm, c8f, k8. </li>\r\n                            <li>Join a second ball of yarn and k8 from the cable needle. Continue knitting the remaining stitches in pattern.\r\n                            </li>\r\n\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Ends here-->\r\n\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 col-lg-12" data-toggle="collapse" data-target="#section17">\r\n                    <h5 class="card-header-text">Knitting open cable</h5>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse" id="section17">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n                        <p class="font-15 ">You will be knitting both the right and left front at the same time.</p>\r\n                        <ul class="bullet-list">\r\n                            <li> WS: Purl to the marker, sm, k2, p8. Pick up alternate yarn, sl1p, p7, k2, sm, purl to end. </li>\r\n                            <li>RS: Knit to the marker, sm, p2, k8. Pick up alternate yarn, sl1p, k7, p2, sm, knit to the end.\r\n                            </li>\r\n                            <li>Continue for [[NO_OF_ROWS_BETWEEN_CABLES]] rows.</li>\r\n                            <li>Then, join the left and right sides as follows:</li>\r\n                            <li>Knit to the first marker. Sm, p2, C8F, p2, sm, knit to the end of row.</li>\r\n                            <li>Purl to the marker, sm, k2, p8.</li>\r\n                            <li>Put the left front stitches on a holder.</li>\r\n\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 col-lg-12" data-toggle="collapse" data-target="#section16">\r\n                    <h5 class="card-header-text">Shape the right front V-neck</h5>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse" id="section16">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n\r\n                        <!--  <p class="font-15 ">At the same time, repeat the cable row one more time [[NO_OF_ROWS_BETWEEN_CABLES]] rows after the last cable row as follows:</p> -->\r\n                        <ul class="bullet-list">\r\n                            <li>Row 1: K8, p2, sm, k2tog, knit to the armhole edge. </li>\r\n                            <li>Rows 2-4: Knit in pattern.</li>\r\n                            <li>Repeat Rows 1-4 until there are [[NO_OF_STITCHES_AT_SHOULDER_PLUS_8]] stitches remaining. Then knit straight until armhole depth equals [[DEPTH_OF_ARMHOLE_BEFORE_BINDOFF]] inches.</li>\r\n                            <li>Bind off [[SHOULDER_BIND_OFF_1]] stitches at the beginning of the next right side row.</li>\r\n                            <li>Knit back.</li>\r\n                            <li>Bind off [[SHOULDER_BIND_OFF_2]] stitches at the beginning of the next row.</li>\r\n                            <li>Bind off [[SHOULDER_BIND_OFF_3]] stitches and place the remaining 8 stitches on a holder.</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 col-lg-12" data-toggle="collapse" data-target="#section13">\r\n                    <h5 class="card-header-text">Shape the left front V-neck</h5>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse" id="section13">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n\r\n                        <p class="font-15 ">Place the left front stitches on a holder and join the yarn at the neck edge. Shape the v-neck as follows:</p>\r\n                        <ul class="bullet-list">\r\n                            <li>Row 1: WS. P8, k2, p to armhole edge. </li>\r\n                            <li>Row 2: Knit to 2 stitches before the marker, ssk, sm, p2, k8.</li>\r\n                            <li>Rows 3-4: Knit in pattern.</li>\r\n                            <li>BO [[SHOULDER_BIND_OFF_1]] stitches at the beginning of the next right side row.</li>\r\n\r\n                            <li>Purl back.</li>\r\n                            <li>BO [[SHOULDER_BIND_OFF_2]] stitches at the beginning of the next row.</li>\r\n                            <li>Purl back.</li>\r\n                            <li>BO [[SHOULDER_BIND_OFF_3]] stitches and place the remaining 8 stitches on a holder.</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 col-lg-12" data-toggle="collapse" data-target="#section14">\r\n                    <h5 class="card-header-text">Back</h5>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse" id="section14">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n\r\n                        <!--  <p class="font-15 ">Place the left front stitches on a holder and join the yarn at the neck edge. Shape the v-neck as follows:</p> -->\r\n                        <ul>\r\n                            <li>Row 1: BO [[NO_OF_STITCHES_FOR_FIRST_DECREASE_AT_ARMHOLE]] stitches at the beginning of the next 2 rows. </li>\r\n                            <li>Row 2: BO [[NO_OF_STITCHES_FOR_SECOND_DECREASE_AT_ARMHOLE]] stitches at the beginning of the next 2 rows. </li>\r\n\r\n                            <li>[[NO_OF_STITCHES_FOR_THIRD_DECREASE_AT_ARMHOLE]]</li>\r\n\r\n                            <li>[[NO_OF_STITCHES_FOR_4TH_DECREASE_AT_ARMHOLE]]\r\n                            </li>\r\n                        </ul>\r\n                        <p class="font-15 ">Decrease 1 stitch at each end [[NO_OF_TIMES_TO_DECREASE_1_STITCH_AT_EACH_END]] times as follows:</p>\r\n                        <ul class="bullet-list">\r\n\r\n                            <li>K1, k2tog, knit to the last 3 stitches, ssk, k1.</li>\r\n                            <li>Purl back.</li>\r\n                            <li>Knit straight until armhole depth equals [[DEPTH_OF_ARMHOLE_BEFORE_BINDOFF]] inches.</li>\r\n                            <li>BO [[SHOULDER_BIND_OFF_1]] stitches at the beginning of the next 2 rows.</li>\r\n                            <li>BO [[SHOULDER_BIND_OFF_2]] stitches at the beginning of the next 2 rows.</li>\r\n                            <li>BO [[SHOULDER_BIND_OFF_3]] stitches at the beginning of the next 2 rows.\r\n                            </li>\r\n                            <li>BO center stitches. Leave the yarn attached.\r\n                            </li>\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 col-lg-12" data-toggle="collapse" data-target="#section15">\r\n                    <h5 class="card-header-text">Finishing the back neck edge</h5>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse" id="section15">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n\r\n                        <!-- <p class="font-15 ">Place the left front stitches on a holder and join the yarn at the neck edge. Shape the v-neck as follows:</p>  -->\r\n                        <ul>\r\n                            <li>Sew the front and back together at the shoulders, leaving the 8 stitches at the neck edge on the holders. </li>\r\n                            <li>Starting at left shoulder, place the 8 stitches from the holder on the needles. Knit in stockinette until the neck facing meets the center of the back. Place stitches back on a holder.</li>\r\n                            <li>Pick up the 8 stitches from the right shoulder and place them on the needles. Knit in stockinette until the neck facing meets the center of the back.</li>\r\n\r\n                            <li>Carefully align the two neck pieces along the back neck edge to make sure that they meet at the center. Knit additional rows if necessary.</li>\r\n\r\n                            <li>User the Kitchener Stitch to join the two neck pieces. Attach the neck facing to the back neck edge.</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 col-lg-12" data-toggle="collapse" data-target="#section18">\r\n                    <h5 class="card-header-text">Sleeves</h5>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse" id="section18">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n\r\n                        <!-- <p class="font-15 ">Place the left front stitches on a holder and join the yarn at the neck edge. Shape the v-neck as follows:</p>  -->\r\n                        <ul>\r\n                            <li>CO [[NO_OF_STITCHES_TO_CAST_ON_FOR_SLEEVE]] stitches. </li>\r\n                            <li>Row 1: *K2, p2* 2 times, k2, pm, p2, *k1, p1* 8 times, p2, pm, *k2, p2* to the end.</li>\r\n\r\n                            <li>Row 2: Knit in the established rib pattern.</li>\r\n\r\n                            <li>Row 3: Repeat rows 1 and 2.</li>\r\n\r\n                            <li>Row 5: *K3, k1* 2 times, sm, p2, *k3, p1* 4 times, p2, sm, *k3, p1* to the end.\r\n                            </li>\r\n                            <li>Row 6: Knit in the established rib pattern.</li>\r\n                            <li>Row 7: Knit to marker, sm, p2, k16, p2, sm, k to end</li>\r\n                            <li>Row 8: Purl to marker, sm, k2, p16, k2, sm, p to end</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 col-lg-12" data-toggle="collapse" data-target="#section19">\r\n                    <h5 class="card-header-text">Open cable on the sleeve</h5>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse" id="section19">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n\r\n                        <p class="font-15 "> Continue in pattern for another 6 rows, then cable as follows:</p>\r\n                        <ul>\r\n\r\n                            <li>Knit to the marker, sm, c8f, k8. </li>\r\n\r\n                            <li>Join a second ball of yarn and k8 stitches from the cable needle. Continue knitting the remaining stitches in pattern.</li>\r\n\r\n                            <li>Knitting open cable:</li>\r\n\r\n                            <li>WS: Purl to the marker, sm, k2, purl 8. Pick up alternate yarn, sl1p, p7, k2, sm, purl to end.</li>\r\n\r\n                            <li>RS: Knit to the marker, sm p2, knit 8. Pick up alternate yarn, sl1p, k7, p2, sm knit to the end.</li>\r\n                            <li>[[TEXT_FOR_FOREARM_INCREASES]]</li>\r\n\r\n                            <li> Repeat cable every [[NO_OF_ROWS_BETWEEN_CABLES]] rows, working the 2 strands of yarn as follows:</li>\r\n\r\n                            <li>Knit in pattern to the marker, sm, p2, k8, c8f, k8 with yarn B, and carry yarn A behind each stitch (place the needle in the next stitch, wrap yarn A over yarn B, wrap needle with yarn B. This “catches” yarn A in the back of the stitch.). Knit in pattern to the end of the row with yarn B.</li>\r\n\r\n                            <li> Continue knitting the open cable:</li>\r\n\r\n                            <li> WS: Purl to the marker, sm, k2, p8. Pick up alternate yarn, sl1p, p7, k2, sm, purl to end.</li>\r\n\r\n                            <li> RS: Knit to the marker, sm p2, k8. Pick up alternate yarn, sl1p, k7, p2, sm, knit to the end.</li>\r\n\r\n                            <li> Knit until sleeve measures [[LENGTH_WRIST_TO_ELBOW]] inches.</li>\r\n\r\n                            <li> At the upper arm, [[TEXT_FOR_UPPER_ARM_INCREASES]]</li>\r\n\r\n                            <li> Knit straight until the sleeve measures [[ARM_LENGTH_TO_UNDER_ARM]] inches.</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 col-lg-12" data-toggle="collapse" data-target="#section20">\r\n                    <h5 class="card-header-text">Sleeve cap shaping</h5>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse" id="section20">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n\r\n                        <!-- <p class="font-15 ">Place the left front stitches on a holder and join the yarn at the neck edge. Shape the v-neck as follows:</p>  -->\r\n                        <ul>\r\n                            <li> BO [[NO_OF_STITCHES_FOR_FIRST_DECREASE_AT_ARMHOLE]] at the beginning of the next 2 rows.</li>\r\n\r\n                            <li>BO [[NO_OF_STITCHES_FOR_SECOND_DECREASE_AT_ARMHOLE]] at the beginning of the next 2 rows.</li>\r\n\r\n                            <li>[[NO_OF_STITCHES_FOR_THIRD_DECREASE_AT_ARMHOLE]]</li>\r\n\r\n                            <li>[[NO_OF_STITCHES_FOR_4TH_DECREASE_AT_ARMHOLE]]</li>\r\n\r\n                            <li>Decrease 1 each side every other row [[DEC_1_STITCH_EVERY_OTHER_ROW_X_TIMES]] times.</li>\r\n\r\n                            <li>BO 2 at the beginning of the next two rows [[BO_2_STITCHES_BEG_NEXT_X_ROWS]] times.</li>\r\n\r\n                            <li>BO 4 at the beginning of the next two rows [[BO_4_STITCHES_BEG_NEXT_X_ROWS]] times.</li>\r\n\r\n                            <li>[[BO_REMAINING_1]]</li>\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n    <!--New Accordion Starts here-->\r\n    <div class="row">\r\n        <div class="col-lg-12">\r\n            <div class="row theme-row m-b-10">\r\n                <div class="card-header accordion border-accordion1 col-lg-12" data-toggle="collapse" data-target="#section21">\r\n                    <h5 class="card-header-text">Finishing </h5>\r\n                </div>\r\n\r\n            </div>\r\n            <div class="card-block collapse" id="section21">\r\n                <div class="row">\r\n                    <div class="col-lg-12">\r\n\r\n                        <!-- <p class="font-15 ">Place the left front stitches on a holder and join the yarn at the neck edge. Shape the v-neck as follows:</p>  -->\r\n                        <ul>\r\n                            <li> Sew the side and sleeve seams.</li>\r\n\r\n                            <li>Pin the sleeves into the armhole, lining up the top of the sleeve cap with the shoulder seam and the underarm seams of the sleeve and the sweater. Sew the armhole in, easing curve of the sleeve cap as you sew.</li>\r\n\r\n                            <li>Weave in all loose ends.</li>\r\n\r\n                        </ul>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n\r\n</div>', NULL, NULL, NULL);
/*!40000 ALTER TABLE `product_pdf` ENABLE KEYS */;

-- Dumping structure for table knitfit.projects
DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token_key` longtext,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `pattern_type` varchar(100) DEFAULT NULL,
  `uom` varchar(100) DEFAULT NULL,
  `stitch_gauge` varchar(50) DEFAULT NULL,
  `row_gauge` varchar(50) DEFAULT NULL,
  `measurement_profile` varchar(50) DEFAULT NULL,
  `ease` varchar(50) DEFAULT NULL,
  `user_verify` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `is_archive` int(11) NOT NULL DEFAULT '0',
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.projects: ~10 rows (approximately)
DELETE FROM `projects`;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`id`, `token_key`, `user_id`, `product_id`, `name`, `description`, `pattern_type`, `uom`, `stitch_gauge`, `row_gauge`, `measurement_profile`, `ease`, `user_verify`, `status`, `is_archive`, `is_deleted`, `created_at`, `updated_at`, `ipaddress`) VALUES
	(1, 'c4ca4238a0b923820dcc509a6f75849b', 1, 0, 'Test', 'test', 'external', 'cm', '18 sts / 10 cm', '28 sts / 10 cm', 'For Jack', '12 cm', 1, 1, 0, 0, '2020-02-24 06:27:36', '2020-02-25 06:47:04', NULL),
	(2, 'c81e728d9d4c2f636f067f89cc14862c', 1, 0, 'test 2', 'test', 'external', 'cm', '18 sts / 10 cm', '30 sts / 10 cm', 'For Jack', '16 cm', 1, 1, 0, 0, '2020-02-24 07:30:00', '2020-02-24 12:05:13', NULL),
	(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 1, 0, 'test', 'test', 'external', 'cm', '20 sts / 10 cm', '28 sts / 10 cm', 'For Jack', '11 cm', 1, 3, 0, 0, '2020-02-24 09:05:26', '2020-03-02 11:30:41', NULL),
	(4, 'a87ff679a2f3e71d9181a67b7542122c', 1, 0, 'external pattern', 'external pattern', 'external', 'in', '6', '7', '39', '4.5', 1, 1, 0, 1, '2020-02-24 16:21:50', '2020-02-24 16:24:37', NULL),
	(5, 'e4da3b7fbbce2345d7772b0674a318d5', 1, 0, 'test external pattern', 'test external pattern', 'external', 'in', '7', '8', '38', '3.25', 1, 1, 0, 1, '2020-02-24 16:25:32', '2020-02-24 16:29:44', NULL),
	(6, '1679091c5a880faf6fb5e6087eb1b2dc', 1, 0, 'Off the shoulder ripple top', 'Off the shoulder ripple top', 'external', 'in', '11', '6', '39', '4.5', 1, 2, 0, 0, '2020-02-25 06:48:48', '2020-03-02 11:30:39', NULL),
	(7, '8f14e45fceea167a5a36dedd4bea2543', 1, 0, 'Peakaboo cabled sweater', 'Peakaboo cabled sweater', 'external', 'in', '9', '8', '38', '19.75', 1, 1, 0, 1, '2020-02-25 13:12:38', '2020-02-29 14:33:33', NULL),
	(8, 'c9f0f895fb98ab9159f51fd0297e236d', 1, 1, 'Peakaboo cabled sweater', 'Long description', 'non-custom', 'in', '8', '4', '41', '4.75', NULL, 1, 0, 0, '2020-03-02 04:59:06', '2020-03-02 04:59:06', NULL),
	(9, '45c48cce2e2d7fbdea1afc51c7c6ad26', 1, 1, 'Peakaboo Cables sweater', 'Long description', 'custom', 'in', 'Select value (inches)', 'Select value (inches)', '0', '2.75', NULL, 1, 0, 0, '2020-03-02 08:09:17', '2020-03-02 08:09:17', NULL),
	(10, 'd3d9446802a44259755d38e6d163e820', 1, 1, 'Peakaboo Cables sweater', 'Long description', 'custom', 'cm', '6', '5', '41', '11', NULL, 2, 0, 0, '2020-03-02 09:07:30', '2020-03-03 06:22:23', NULL),
	(11, '6512bd43d9caa6e02c990b0a82652dca', 1, 1, 'Peakaboo Cables sweater', 'Long description', 'custom', 'in', '5', '8', '41', '3.75', NULL, 3, 0, 0, '2020-03-02 09:09:32', '2020-03-02 11:30:35', NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;

-- Dumping structure for table knitfit.projects_designer_measurements
DROP TABLE IF EXISTS `projects_designer_measurements`;
CREATE TABLE IF NOT EXISTS `projects_designer_measurements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `measurement_name` varchar(100) DEFAULT NULL,
  `measurement_value` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `project_designer_measurements_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.projects_designer_measurements: ~0 rows (approximately)
DELETE FROM `projects_designer_measurements`;
/*!40000 ALTER TABLE `projects_designer_measurements` DISABLE KEYS */;
INSERT INTO `projects_designer_measurements` (`id`, `user_id`, `project_id`, `measurement_name`, `measurement_value`, `created_at`, `updated_at`, `ipaddress`) VALUES
	(1, 1, 11, 'wrist_circumference', '50', '2020-03-02 09:09:32', '2020-03-02 09:09:32', '127.0.0.1');
/*!40000 ALTER TABLE `projects_designer_measurements` ENABLE KEYS */;

-- Dumping structure for table knitfit.projects_images
DROP TABLE IF EXISTS `projects_images`;
CREATE TABLE IF NOT EXISTS `projects_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `image_path` text,
  `image_ext` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `projects_image_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.projects_images: ~30 rows (approximately)
DELETE FROM `projects_images`;
/*!40000 ALTER TABLE `projects_images` DISABLE KEYS */;
INSERT INTO `projects_images` (`id`, `user_id`, `project_id`, `image_path`, `image_ext`, `created_at`, `updated_at`, `ipaddress`) VALUES
	(1, 1, 1, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582525616-The Boyfriend Sweater.jpg', NULL, '2020-02-24 06:27:36', '2020-02-24 06:27:36', '::1'),
	(2, 1, 1, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582525616-Swing-Coat-P-Front.jpg', NULL, '2020-02-24 06:27:36', '2020-02-24 06:27:36', '::1'),
	(3, 1, 2, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582529383-Off-the-Shoulder Ruffle Top.jpg', NULL, '2020-02-24 07:30:00', '2020-02-24 07:30:00', '::1'),
	(4, 1, 3, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582535083-Off-the-Shoulder Ruffle Top.jpg', NULL, '2020-02-24 09:05:27', '2020-02-24 09:05:27', '::1'),
	(5, 1, 3, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582535083-Marsha\'s-Lacy-Tee.jpg', NULL, '2020-02-24 09:05:27', '2020-02-24 09:05:27', '::1'),
	(6, 1, 4, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582561276-img-round5.jpg', NULL, '2020-02-24 16:21:50', '2020-02-24 16:21:50', '::1'),
	(7, 1, 4, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582561276-img-round4.jpg', NULL, '2020-02-24 16:21:51', '2020-02-24 16:21:51', '::1'),
	(8, 1, 5, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582561502-img-round7.jpg', NULL, '2020-02-24 16:25:32', '2020-02-24 16:25:32', '::1'),
	(9, 1, 5, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582561502-img-round6.jpg', NULL, '2020-02-24 16:25:32', '2020-02-24 16:25:32', '::1'),
	(10, 1, 5, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582561501-img-round5.jpg', NULL, '2020-02-24 16:25:32', '2020-02-24 16:25:32', '::1'),
	(11, 1, 6, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582613283-Swing-Coat-P-Front.jpg', NULL, '2020-02-25 06:48:48', '2020-02-25 06:48:48', '::1'),
	(12, 1, 6, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582613283-Marsha\'s-Lacy-Tee.jpg', NULL, '2020-02-25 06:48:48', '2020-02-25 06:48:48', '::1'),
	(13, 1, 7, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582636277-KnitFit _Patterns Instruction.pdf', 'pdf', '2020-02-25 13:12:38', '2020-02-25 13:12:38', '::1'),
	(14, 1, 7, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582636254-Emily\'s Sweater.jpg', 'jpg', '2020-02-25 13:12:38', '2020-02-25 13:12:38', '::1'),
	(15, 1, 7, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582648374-l3.jpg', 'jpg', '2020-02-25 16:33:00', '2020-02-25 16:33:00', '::1'),
	(16, 1, 7, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582648374-l2.jpg', 'jpg', '2020-02-25 16:33:00', '2020-02-25 16:33:00', '::1'),
	(17, 1, 7, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582648374-l1.jpg', 'jpg', '2020-02-25 16:33:00', '2020-02-25 16:33:00', '::1'),
	(18, 1, 7, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582648997-card14.jpg', 'jpg', '2020-02-25 16:43:20', '2020-02-25 16:43:20', '::1'),
	(19, 1, 7, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582648997-card2.jpg', 'jpg', '2020-02-25 16:43:20', '2020-02-25 16:43:20', '::1'),
	(20, 1, 7, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582648997-card13.jpg', 'jpg', '2020-02-25 16:43:20', '2020-02-25 16:43:20', '::1'),
	(21, 1, 8, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1581673838187.png', 'jpg', '2020-03-02 04:59:06', '2020-03-02 04:59:06', '127.0.0.1'),
	(22, 1, 8, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1583132773-lady_two.png', 'jpg', '2020-03-02 07:06:16', '2020-03-02 07:06:16', '127.0.0.1'),
	(23, 1, 8, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1583132773-Screenshot_1.png', 'jpg', '2020-03-02 07:06:16', '2020-03-02 07:06:16', '127.0.0.1'),
	(24, 1, 8, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1583132773-img_girl.png', 'jpg', '2020-03-02 07:06:16', '2020-03-02 07:06:16', '127.0.0.1'),
	(25, 1, 8, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1583132773-lady_one.png', 'jpg', '2020-03-02 07:06:16', '2020-03-02 07:06:16', '127.0.0.1'),
	(26, 1, 8, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1583132773-lady_four.png', 'jpg', '2020-03-02 07:06:16', '2020-03-02 07:06:16', '127.0.0.1'),
	(27, 1, 8, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1583132773-lady_three.png', 'jpg', '2020-03-02 07:06:16', '2020-03-02 07:06:16', '127.0.0.1'),
	(28, 1, 8, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1583132777-Screenshot_2.png', 'jpg', '2020-03-02 07:06:18', '2020-03-02 07:06:18', '127.0.0.1'),
	(29, 1, 8, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1583132777-Screenshot_3.png', 'jpg', '2020-03-02 07:06:19', '2020-03-02 07:06:19', '127.0.0.1'),
	(30, 1, 8, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1583132777-Screenshot_4.png', 'jpg', '2020-03-02 07:06:19', '2020-03-02 07:06:19', '127.0.0.1'),
	(31, 1, 9, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1581673838187.png', 'jpg', '2020-03-02 08:09:17', '2020-03-02 08:09:17', '127.0.0.1'),
	(32, 1, 10, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1581673838187.png', 'jpg', '2020-03-02 09:07:31', '2020-03-02 09:07:31', '127.0.0.1'),
	(33, 1, 11, 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1581673838187.png', 'jpg', '2020-03-02 09:09:32', '2020-03-02 09:09:32', '127.0.0.1');
/*!40000 ALTER TABLE `projects_images` ENABLE KEYS */;

-- Dumping structure for table knitfit.projects_needle
DROP TABLE IF EXISTS `projects_needle`;
CREATE TABLE IF NOT EXISTS `projects_needle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `needle_size` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `projects_needle_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.projects_needle: ~16 rows (approximately)
DELETE FROM `projects_needle`;
/*!40000 ALTER TABLE `projects_needle` DISABLE KEYS */;
INSERT INTO `projects_needle` (`id`, `user_id`, `project_id`, `needle_size`, `created_at`, `updated_at`, `ipaddress`) VALUES
	(1, 1, 1, 'US 11 - 8mm', '2020-02-24 06:27:36', '2020-02-24 06:27:36', '::1'),
	(2, 1, 1, 'US 8 - 5mm', '2020-02-24 06:27:36', '2020-02-24 06:27:36', '::1'),
	(3, 1, 2, 'US 11 - 8mm', '2020-02-24 07:30:00', '2020-02-24 07:30:00', '::1'),
	(4, 1, 3, 'US 7 - 4.5mm', '2020-02-24 09:05:27', '2020-02-24 09:05:27', '::1'),
	(5, 1, 4, '13', '2020-02-24 16:21:51', '2020-02-24 16:21:51', '::1'),
	(6, 1, 5, '11', '2020-02-24 16:25:32', '2020-02-24 16:25:32', '::1'),
	(7, 1, 6, '8', '2020-02-25 06:48:48', '2020-02-25 06:48:48', '::1'),
	(8, 1, 7, '8', '2020-02-25 13:12:38', '2020-02-25 13:12:38', '::1'),
	(9, 1, 7, '17', '2020-02-25 13:12:38', '2020-02-25 13:12:38', '::1'),
	(10, 1, 8, '13', '2020-03-02 04:59:06', '2020-03-02 04:59:06', '127.0.0.1'),
	(11, 1, 9, 'Select needle size', '2020-03-02 08:09:17', '2020-03-02 08:09:17', '127.0.0.1'),
	(12, 1, 9, 'Select needle size', '2020-03-02 08:09:17', '2020-03-02 08:09:17', '127.0.0.1'),
	(13, 1, 10, '10', '2020-03-02 09:07:31', '2020-03-02 09:07:31', '127.0.0.1'),
	(14, 1, 10, '3', '2020-03-02 09:07:31', '2020-03-02 09:07:31', '127.0.0.1'),
	(15, 1, 11, '14', '2020-03-02 09:09:32', '2020-03-02 09:09:32', '127.0.0.1'),
	(16, 1, 11, '7', '2020-03-02 09:09:32', '2020-03-02 09:09:32', '127.0.0.1');
/*!40000 ALTER TABLE `projects_needle` ENABLE KEYS */;

-- Dumping structure for table knitfit.projects_notes
DROP TABLE IF EXISTS `projects_notes`;
CREATE TABLE IF NOT EXISTS `projects_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `notes` longtext,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.projects_notes: ~0 rows (approximately)
DELETE FROM `projects_notes`;
/*!40000 ALTER TABLE `projects_notes` DISABLE KEYS */;
INSERT INTO `projects_notes` (`id`, `user_id`, `project_id`, `notes`, `status`, `created_at`, `updated_at`, `completed_at`, `ipaddress`) VALUES
	(1, 1, 8, 'tets notes', 1, '2020-03-02 05:18:42', '2020-03-02 05:18:42', NULL, '127.0.0.1');
/*!40000 ALTER TABLE `projects_notes` ENABLE KEYS */;

-- Dumping structure for table knitfit.projects_yarn
DROP TABLE IF EXISTS `projects_yarn`;
CREATE TABLE IF NOT EXISTS `projects_yarn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `yarn_used` varchar(100) DEFAULT NULL,
  `fiber_type` varchar(100) DEFAULT NULL,
  `yarn_weight` varchar(100) DEFAULT NULL,
  `colourway` varchar(100) DEFAULT NULL,
  `dye_lot` varchar(100) DEFAULT NULL,
  `skeins` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `project_id` (`project_id`),
  CONSTRAINT `projects_yarn_id` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.projects_yarn: ~16 rows (approximately)
DELETE FROM `projects_yarn`;
/*!40000 ALTER TABLE `projects_yarn` DISABLE KEYS */;
INSERT INTO `projects_yarn` (`id`, `user_id`, `project_id`, `yarn_used`, `fiber_type`, `yarn_weight`, `colourway`, `dye_lot`, `skeins`, `created_at`, `updated_at`, `ipaddress`) VALUES
	(1, 1, 1, 'test 1', 'Combed cotton woollen', 'Lace', 'colourway', 'dye lot', 'skeins', '2020-02-24 06:27:36', '2020-02-24 06:27:36', '::1'),
	(2, 1, 1, 'Lion Brand Yarn 135-189 Hometown Yarn', 'Combed cotton woollen', 'Lace', 'cw 1', 'd l 1', 'sk 1', '2020-02-24 06:27:36', '2020-02-24 06:27:36', '::1'),
	(3, 1, 2, 'fff', 'Combed cotton woollen', 'Lace', 'fff', 'fff', 'fff', '2020-02-24 07:30:00', '2020-02-24 07:30:00', '::1'),
	(4, 1, 3, 'test', 'Combed cotton woollen', 'Lace', 'test', 'test', 'test', '2020-02-24 09:05:27', '2020-02-24 09:05:27', '::1'),
	(5, 1, 4, 'test', 'test', 'Super Fine', 'dsd', 'dsds', 'dsd', '2020-02-24 16:21:51', '2020-02-24 16:21:51', '::1'),
	(6, 1, 5, 'fd', 'Combed cotton woollen', 'Fine', 'fsd', 'ff', 'sdfdf', '2020-02-24 16:25:32', '2020-02-24 16:25:32', '::1'),
	(7, 1, 6, 'Lion brand', 'Combed cotton woollen', 'Super Fine', 'colour way', 'dye lot', 'skeins', '2020-02-25 06:48:48', '2020-02-25 06:48:48', '::1'),
	(8, 1, 7, 'Tiger Brand', 'wool', 'Lace', 'black colour', 'black dye lot', 'white', '2020-02-25 13:12:38', '2020-02-25 13:12:38', '::1'),
	(9, 1, 7, 'Goat brand', 'wool', 'Bulky', 'black colour', 'yellow', 'yello white', '2020-02-25 13:12:38', '2020-02-25 13:12:38', '::1'),
	(10, 1, 8, 'test 1', 'test 2', 'Lace', 'test 3', 'test 4', 'test 5', '2020-03-02 04:59:06', '2020-03-02 04:59:06', '127.0.0.1'),
	(11, 1, 9, NULL, NULL, 'Lace', NULL, NULL, NULL, '2020-03-02 08:09:17', '2020-03-02 08:09:17', '127.0.0.1'),
	(12, 1, 9, NULL, NULL, 'Lace', NULL, NULL, NULL, '2020-03-02 08:09:17', '2020-03-02 08:09:17', '127.0.0.1'),
	(13, 1, 10, 'abcd', 'abcd', 'Lace', 'abcd', 'abcd', 'abcd', '2020-03-02 09:07:31', '2020-03-02 09:07:31', '127.0.0.1'),
	(14, 1, 10, 'abcd ed', 'abcd ed', 'Fine', 'abcd ed', 'abcd ed', 'abcd ed', '2020-03-02 09:07:31', '2020-03-02 09:07:31', '127.0.0.1'),
	(15, 1, 11, 'abcd2f', 'abcd2f', 'Fine', 'abcd2f', 'abcd2f', 'abcd2f', '2020-03-02 09:09:32', '2020-03-02 09:09:32', '127.0.0.1'),
	(16, 1, 11, 'abcdefghi', 'abcdefghi', 'Fine', 'abcdefghi', 'abcdefghi', 'abcdefghi', '2020-03-02 09:09:32', '2020-03-02 09:09:32', '127.0.0.1');
/*!40000 ALTER TABLE `projects_yarn` ENABLE KEYS */;

-- Dumping structure for table knitfit.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.roles: ~6 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', '2020-01-02 06:03:05', '2020-01-02 06:03:05'),
	(2, 'Knitter', '2020-01-02 06:03:05', '2020-01-02 06:03:05'),
	(3, 'Wholesaler', '2020-01-02 06:03:05', '2020-01-02 06:03:05'),
	(4, 'Designer', '2020-01-02 06:03:05', '2020-01-02 06:03:05'),
	(5, 'Advertaiser', '2020-01-02 06:03:06', '2020-01-02 06:03:06'),
	(6, 'Retailer', '2020-01-02 06:03:06', '2020-01-02 06:03:06');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table knitfit.subcategory
DROP TABLE IF EXISTS `subcategory`;
CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcat_name` varchar(100) DEFAULT NULL,
  `description` longtext,
  `thumbnail` longtext,
  `page_title` text,
  `meta_description` text,
  `meta_keywords` longtext,
  `include_in_menu` int(11) DEFAULT '0' COMMENT '1-yes,0-no',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1' COMMENT '1-yes,0-no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table knitfit.subcategory: ~6 rows (approximately)
DELETE FROM `subcategory`;
/*!40000 ALTER TABLE `subcategory` DISABLE KEYS */;
INSERT INTO `subcategory` (`id`, `user_id`, `category_id`, `subcat_name`, `description`, `thumbnail`, `page_title`, `meta_description`, `meta_keywords`, `include_in_menu`, `created_at`, `updated_at`, `is_active`) VALUES
	(1, NULL, 1, 'Set-in Sleeve', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1),
	(2, NULL, 2, 'Drop Sleeve', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1),
	(3, 0, 1, 'Raglan Sleeve', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1),
	(4, NULL, 1, 'Top-down', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1),
	(5, NULL, 1, 'Yoked', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1),
	(6, NULL, 2, 'All', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1);
/*!40000 ALTER TABLE `subcategory` ENABLE KEYS */;

-- Dumping structure for table knitfit.subscription
DROP TABLE IF EXISTS `subscription`;
CREATE TABLE IF NOT EXISTS `subscription` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `subscription_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emails` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ipaddress` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.subscription: ~0 rows (approximately)
DELETE FROM `subscription`;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;

-- Dumping structure for table knitfit.subscriptions
DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_month` int(11) DEFAULT NULL,
  `price_year` int(11) DEFAULT NULL,
  `measurement_profiles` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `projects` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.subscriptions: ~3 rows (approximately)
DELETE FROM `subscriptions`;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` (`id`, `name`, `price_month`, `price_year`, `measurement_profiles`, `projects`, `created_at`, `updated_at`) VALUES
	(1, 'Free', 0, 0, '1', '1', '2020-01-29 11:18:16', '2020-01-29 11:18:16'),
	(2, 'Basic', 10, 120, '5', 'unlimited', '2020-01-29 11:18:16', '2020-01-29 11:18:16'),
	(3, 'Premium', 20, 240, 'unlimited', 'unlimited', '2020-01-29 11:18:16', '2020-01-29 11:18:16');
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;

-- Dumping structure for table knitfit.subscriptions_properties
DROP TABLE IF EXISTS `subscriptions_properties`;
CREATE TABLE IF NOT EXISTS `subscriptions_properties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subscriptions_id` int(11) DEFAULT NULL,
  `property_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_limit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.subscriptions_properties: ~17 rows (approximately)
DELETE FROM `subscriptions_properties`;
/*!40000 ALTER TABLE `subscriptions_properties` DISABLE KEYS */;
INSERT INTO `subscriptions_properties` (`id`, `subscriptions_id`, `property_name`, `property_limit`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'knitters_academy', 'unlimited', 1, NULL, NULL),
	(2, 1, 'social_media', 'unlimited', 1, NULL, NULL),
	(3, 1, 'shopping', 'unlimited', 1, NULL, NULL),
	(4, 1, 'custom_sized_patterns', 'unlimited', 1, NULL, NULL),
	(5, 1, 'measurement_profile', '1', 1, NULL, NULL),
	(6, 1, 'project_management', '1', 1, NULL, NULL),
	(7, 2, 'knitters_academy', 'unlimited', 1, NULL, NULL),
	(8, 2, 'social_media', 'unlimited', 1, NULL, NULL),
	(9, 2, 'shopping', 'unlimited', 1, NULL, NULL),
	(10, 2, 'custom_sized_patterns', 'unlimited', 1, NULL, NULL),
	(11, 2, 'measurement_profile', '5', 1, NULL, NULL),
	(12, 2, 'project_management', 'unlimited', 1, NULL, NULL),
	(13, 2, 'stash_management', 'unlimited', 1, NULL, NULL),
	(14, 2, 'stash_sales', 'unlimited', 1, NULL, NULL),
	(15, 2, 'groups', 'unlimited', 1, NULL, NULL),
	(16, 2, 'live_events', 'unlimited', 1, NULL, NULL),
	(17, 2, 'knit_alongs', 'unlimited', 1, NULL, NULL);
/*!40000 ALTER TABLE `subscriptions_properties` ENABLE KEYS */;

-- Dumping structure for table knitfit.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` text COLLATE utf8mb4_unicode_ci,
  `location` text COLLATE utf8mb4_unicode_ci,
  `role` int(10) unsigned NOT NULL DEFAULT '2',
  `type` int(10) unsigned NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enc_email` text COLLATE utf8mb4_unicode_ci,
  `mobile` bigint(20) DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `landmark` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oauth_provider` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oauth_uid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oauth_picture` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locale` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `picture_orginal` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci,
  `status` int(10) unsigned NOT NULL DEFAULT '0',
  `security_question` text COLLATE utf8mb4_unicode_ci,
  `security_answer` text COLLATE utf8mb4_unicode_ci,
  `normal_sa` text COLLATE utf8mb4_unicode_ci,
  `login_attempts` int(10) unsigned NOT NULL DEFAULT '0',
  `subscription_type` int(10) unsigned DEFAULT '0',
  `sub_exp` date DEFAULT NULL,
  `Inactiveusers_count` int(10) unsigned NOT NULL DEFAULT '0',
  `banner_orginal` text COLLATE utf8mb4_unicode_ci,
  `banner` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.users: ~19 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `username`, `location`, `role`, `type`, `email`, `password`, `enc_email`, `mobile`, `gender`, `dob`, `address`, `landmark`, `country`, `state`, `postcode`, `oauth_provider`, `oauth_uid`, `oauth_picture`, `locale`, `picture`, `picture_orginal`, `link`, `status`, `security_question`, `security_answer`, `normal_sa`, `login_attempts`, `subscription_type`, `sub_exp`, `Inactiveusers_count`, `banner_orginal`, `banner`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Rama', 'krishna', 'krishna021', NULL, 2, 1, 'rkrishna021@gmail.com', '$2y$10$FPMODHHvNKxvj7HMr8W/2OHVylepaAlhK030tsHHzvTetKGR72KjC', '5ab1945e86c20a49eb54996df4ec59a0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '40f682', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, 2, '2020-04-04', 0, NULL, NULL, NULL, '2020-01-02 06:03:46', '2020-03-05 10:46:00'),
	(2, NULL, 'srinik', 'rao', NULL, NULL, 2, 1, 'nikithabandari79@gmail.com', '$2y$10$qeqZWr7J2pm9y6luWwyEmOcur/3SuEWaXKy56EJQne2UgJVGw8CRi', '5fa3d12e2b60bdf2597afe2ca2b92f1c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'b17f0e', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, 0, '2016-01-16', 0, NULL, NULL, NULL, '2020-01-16 15:25:52', '2020-01-27 13:08:16'),
	(3, NULL, 'G Sekhar', NULL, NULL, NULL, 2, 1, 'csk.gogineni@gmail.com', NULL, 'ddfe6890cd91dd72233c38495d74c094', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'google', '115887792567693996150', NULL, NULL, 'https://lh3.googleusercontent.com/a-/AAuE7mBT6KAvl4aV_vfmJjinFVwsel64RcvOhJqVZcQZ-g', NULL, NULL, 1, NULL, NULL, NULL, 0, 0, '2027-01-27', 0, NULL, NULL, 'WhhSA32WUjNjCgb2NtIW4gh4defWa3uV1ccAuLkbiNffEQ6bSn4h5sP69yE7', '2020-01-27 15:53:02', '2020-01-27 15:53:02'),
	(4, NULL, 'chandu g', NULL, NULL, NULL, 2, 1, 'chandu.spany5@gmail.com', NULL, 'daa64ecf233df73fa3b81cdc9ff6cc19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'google', '104439905999927332517', NULL, NULL, 'https://lh6.googleusercontent.com/-nceZ30EUO7k/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rd49fxVLwg4aw4e9-SyCPB6nWLiTQ/photo.jpg', NULL, NULL, 1, NULL, NULL, NULL, 0, 0, '2027-01-27', 0, NULL, NULL, 'nIzgJ8v5g2U0TqKiQP24mtxbpreAsWwxlURkM87vJxxiqGzArj7Lv3eQCg1L', '2020-01-27 15:55:24', '2020-01-27 15:55:24'),
	(5, NULL, 'Barbara Alddhijdgabff Okelolastein', NULL, NULL, NULL, 2, 1, 'ytpdydfdyj_1576229588@tfbnw.net', NULL, '0a6378af8c0d9247c2cd7ac632940eba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', '100445608128455', NULL, NULL, 'https://graph.facebook.com/v3.3/100445608128455/picture?type=normal', NULL, NULL, 1, NULL, NULL, NULL, 0, 0, '2027-01-27', 0, NULL, NULL, 'zVyP5UcregRzfaCuAlmb4sI7FktEhSzO3UP2CZw2sZyKOq0zs3L6UqJNY32J', '2020-01-27 15:56:26', '2020-01-27 15:56:26'),
	(6, NULL, 'Jane', 'Nickerson', NULL, NULL, 2, 1, 'nickersonjane@gmail.com', '$2y$10$5luHbejlz.4s3rhYAmC65u9J4n6l5nOvW2jfKIywg9eMSkKkLNW7G', '86f2a44a2f6190f3bf4139f681255679', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '76e2f0', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, 0, '2027-01-27', 0, NULL, NULL, NULL, '2020-01-27 18:51:05', '2020-01-27 21:15:30'),
	(7, NULL, 'Jane Nickerson', NULL, NULL, NULL, 2, 1, 'jane.nickerson@knitfitco.com', NULL, '637244228ab08b92f2be42f3063c3172', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'google', '115791040820212385390', NULL, NULL, 'https://lh6.googleusercontent.com/-Jd3GlD8_Kf8/AAAAAAAAAAI/AAAAAAAAAAA/ACHi3rfn-iP0-Onrnqq4R9Lkwa06RvMPUg/photo.jpg', NULL, NULL, 1, NULL, NULL, NULL, 0, 0, '2027-01-27', 0, NULL, NULL, '5Cvh0QNk0R6DWNwjuhW0zBh7hHSNqEgqC2ntzmHjNicapWb0hXLyCNX2ZDwq', '2020-01-27 21:12:21', '2020-01-27 21:12:21'),
	(8, NULL, 'Caitlyn', 'Robbins', NULL, NULL, 2, 1, 'caitlyn.t.robbins@gmail.com', '$2y$10$lcikSSkEjs7rtDPjvM5Oo.UMCNhd6b2ak6bjEmPumSG504cf/3foy', 'd63a5a1b9d7a31c3af6681b133304da4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '85171d', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, 0, '2027-01-27', 0, NULL, NULL, NULL, '2020-01-28 01:37:05', '2020-01-28 01:37:05'),
	(9, 'arinik', 'srinik', 'rao', 'arinik', NULL, 2, 1, 'srinik@gmail.com', '$2y$10$43q/h6J8UgnT2OXKKEGnveaX4gg5FNfq.p40dHbbbe/cawv415zd6', '2a36876edceaf5c161919aa83b667d59', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4c3339', NULL, 'resources/assets/user.png', NULL, NULL, 0, NULL, NULL, NULL, 0, 0, '2010-02-10', 0, NULL, NULL, NULL, '2020-02-10 18:22:04', '2020-02-10 18:22:04'),
	(10, 'srinik', 'srinik', 'rao', 'srinik123', NULL, 2, 1, 'bandari@plurachnology.com', '$2y$10$0mK4w3b/rjlLuVxkeHEXo.sgIhD2cj1gXl.Vua4kLgs4vlP7U0Ps6', 'a7d5fa37e54ad7dc28c7a99e55d134bd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'e03cd8', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, 0, '2010-02-10', 0, NULL, NULL, NULL, '2020-02-10 18:35:18', '2020-02-10 18:35:18'),
	(11, 'ramagkrishna91', 'rama', 'krishna', 'ramagkrishna91', NULL, 2, 1, 'ramagkrishna91@gmail.com', '$2y$10$SXobjtF5TsCRYLbDWZtWZO0iEQve1Sr1Oo/FUXd0LNji3yHSoRpX6', 'cd752cb2865a4adab426ccbe0e60a714', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'f127e5', NULL, 'resources/assets/user.png', NULL, NULL, 0, NULL, NULL, NULL, 0, 0, '2010-02-10', 0, NULL, NULL, NULL, '2020-02-10 18:48:38', '2020-02-10 18:48:38'),
	(12, 'bandari', 'nikitha', 'bandari', 'bandari1234', NULL, 2, 1, 'aaluri@gmail.com', '$2y$10$8KIYVzpEQTvYxMRP6esyJ.PiZkU1Hn1l5wMBDpEtO8rN.HbgTqeyu', '7719c768641380dad837876edddcc1f6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2c002a', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, 0, '2011-02-11', 0, NULL, NULL, NULL, '2020-02-11 13:06:39', '2020-02-11 13:06:39'),
	(13, 'Usha', 'Usha', 'Kadali', 'Usha', NULL, 2, 1, 'ushadevikadali@gmail.com', '$2y$10$4XgXygDDSUK/yJ67rw7r6u1W/CfSn4CHci3d9VQ.klQh401o2wTcG', '0902c4e54e03e7e0840049928f3e4309', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'f676bd', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, 0, '2011-02-11', 0, NULL, NULL, NULL, '2020-02-11 18:03:49', '2020-02-11 18:03:49'),
	(14, NULL, 'Usha Devi', NULL, NULL, NULL, 2, 1, 'may19usha@gmail.com', NULL, '897e1e462cd9e43c8409cef95b660f7f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'google', '111980958635086864941', NULL, NULL, 'https://lh3.googleusercontent.com/a-/AAuE7mDJQXVy8a7JmoJi-1qap0nFiA97qkUsTVrKpaigtQ', NULL, NULL, 1, NULL, NULL, NULL, 0, 0, '2011-02-11', 0, NULL, NULL, 'Gt1ZLDo2QgGvphb40UG9y3VjjMAS8EHrjvqZjCooSURjBr4ySKq046NoaE3D', '2020-02-11 18:07:31', '2020-02-11 18:07:31'),
	(15, 'srinikrao', 'srinik', 'rao', 'srinikrao', NULL, 2, 1, 'nikitha.bandari@pluraltechnology.com', '$2y$10$HT5lfEaGvoWHBauYqL/muOk/8zjVp5JGgbk9SXrhhMSVNR3Fo7vJG', 'a7d5fa37e54ad7dc28c7a99e55d134bd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '9cd5e3', NULL, 'resources/assets/user.png', NULL, NULL, 0, NULL, NULL, NULL, 0, 0, '2012-02-12', 0, NULL, NULL, NULL, '2020-02-12 11:17:49', '2020-02-12 11:17:49'),
	(16, 'ramakrishna', 'Rama', 'Krishna', 'ramakrishna', NULL, 2, 1, 'ramakrishna.gandikota@pluraltechnology.com', '$2y$10$7xZFe7FPKBvIbTyXQ7G6fupnDTjDjewi7NT5ZeFWgh1id4iy3rTlm', '97faa6e7fb1427a9cb7588d0aee2d63c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '856c8a', NULL, 'resources/assets/user.png', NULL, NULL, 0, NULL, NULL, NULL, 0, 0, '2012-02-12', 0, NULL, NULL, NULL, '2020-02-12 11:23:37', '2020-02-12 11:23:37'),
	(17, 'khushboo', 'khushboo', 'vijayvargiya', 'khushboo', NULL, 2, 1, 'khushboovjvrg018@gmail.com', '$2y$10$cAoeg5YxHrksj8AszDeYMeP8zW8Ng7fYZURvCztiopMN4oQxgWhb.', '16005859c3b2bb252e86cc078e1af6c8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6d84d0', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, 0, '2012-02-12', 0, NULL, NULL, NULL, '2020-02-12 11:42:41', '2020-02-12 11:42:41'),
	(18, 'srinikaa', 'srinik', 'rao', 'srinikaa', NULL, 2, 1, 'sripathirao.aaluri@gmail.com', '$2y$10$ubSedgRzmUSqiHtInJW1gehkAnXMQ5V5goxVAe1HTsmiD3hDCU61a', '7719c768641380dad837876edddcc1f6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4f6434', NULL, 'resources/assets/user.png', NULL, NULL, 1, NULL, NULL, NULL, 0, 2, '2020-04-04', 0, NULL, NULL, NULL, '2020-02-12 11:42:44', '2020-03-05 10:58:21'),
	(19, 'rkrishna021', 'ramakrishna', 'gandikota', 'rkrishna021', NULL, 2, 1, 'rkrishna@gmail.com', '$2y$10$ubSedgRzmUSqiHtInJW1gehkAnXMQ5V5goxVAe1HTsmiD3hDCU61a', '2046a02aec2882a5faef0ad5f13225d3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, 0, '2027-02-27', 0, NULL, NULL, NULL, '2020-02-27 04:41:39', '2020-02-27 04:41:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table knitfit.user_measurements
DROP TABLE IF EXISTS `user_measurements`;
CREATE TABLE IF NOT EXISTS `user_measurements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `m_title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `m_description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_date` date DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measurement_preference` text COLLATE utf8mb4_unicode_ci,
  `user_meas_image` text COLLATE utf8mb4_unicode_ci,
  `ext` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hips` float DEFAULT NULL,
  `waist` float DEFAULT NULL,
  `waist_front` float DEFAULT NULL,
  `bust` float DEFAULT NULL,
  `bust_front` float DEFAULT NULL,
  `bust_back` float DEFAULT NULL,
  `waist_to_underarm` float DEFAULT NULL,
  `armhole_depth` float DEFAULT NULL,
  `wrist_circumference` float DEFAULT NULL,
  `forearm_circumference` float DEFAULT NULL,
  `upperarm_circumference` float DEFAULT NULL,
  `shoulder_circumference` float DEFAULT NULL,
  `wrist_to_underarm` float DEFAULT NULL,
  `wrist_to_elbow` float DEFAULT NULL,
  `elbow_to_underarm` float DEFAULT NULL,
  `wrist_to_top_of_shoulder` float DEFAULT NULL,
  `depth_of_neck` float DEFAULT NULL,
  `neck_width` float DEFAULT NULL,
  `neck_circumference` float DEFAULT NULL,
  `neck_to_shoulder` float DEFAULT NULL,
  `shoulder_to_shoulder` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.user_measurements: ~10 rows (approximately)
DELETE FROM `user_measurements`;
/*!40000 ALTER TABLE `user_measurements` DISABLE KEYS */;
INSERT INTO `user_measurements` (`id`, `user_id`, `m_title`, `slug`, `m_description`, `m_date`, `first_name`, `last_name`, `email_address`, `measurement_preference`, `user_meas_image`, `ext`, `hips`, `waist`, `waist_front`, `bust`, `bust_front`, `bust_back`, `waist_to_underarm`, `armhole_depth`, `wrist_circumference`, `forearm_circumference`, `upperarm_circumference`, `shoulder_circumference`, `wrist_to_underarm`, `wrist_to_elbow`, `elbow_to_underarm`, `wrist_to_top_of_shoulder`, `depth_of_neck`, `neck_width`, `neck_circumference`, `neck_to_shoulder`, `shoulder_to_shoulder`, `created_at`, `updated_at`) VALUES
	(20, 8, 'Caitlyn', NULL, NULL, '2012-01-01', NULL, NULL, NULL, 'centimeters', 'https://via.placeholder.com/200X250', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2020-02-01 02:36:21'),
	(28, 13, 'Usha Sister', NULL, NULL, '2020-02-11', NULL, NULL, NULL, 'inches', 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1581429459garter_stitch_square.jpg', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
	(29, 14, 'Sample', NULL, NULL, '2020-02-11', NULL, NULL, NULL, 'inches', 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1581433450heart photo.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(31, 17, 'first measurement', NULL, NULL, '2020-02-12', NULL, NULL, NULL, 'inches', 'https://via.placeholder.com/150X200', NULL, 1, 1.25, 0, 0, 0, 0, 0, 0, 1, 0, 0.75, 1.75, 0.25, 0.75, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
	(33, 2, 'measurement1', NULL, NULL, '2020-02-12', NULL, NULL, NULL, 'inches', 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1581492102holi.jpg', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
	(36, 1, 'Test 2', 'test-2', NULL, '2020-02-19', NULL, NULL, NULL, 'inches', 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1583423385-overflow.jpg', 'jpg', 0, 0, 0, 0.75, 6.25, 7, 0, 0, 0.5, 6.25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2020-03-05 15:47:23'),
	(38, 1, 'Test 1', 'test-1', NULL, '2020-02-20', NULL, NULL, NULL, 'inches', 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1582186250Swing-Coat-P-Front.jpg', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL),
	(39, 1, 'Test 3', 'test-3', NULL, '2020-02-20', NULL, NULL, NULL, 'inches', 'https://s3.us-east-2.amazonaws.com/knitfitcoall/knitfit/1583417119-bg-cta.jpg', 'jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2020-03-05 14:04:50'),
	(41, 1, 'new measurement set', '', 'new measurement set', '2020-09-10', NULL, NULL, NULL, 'inches', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-27 07:10:16', '2020-02-27 07:10:16'),
	(43, 1, 'new measurement set new', 'new-measurement-set-new', 'new measurement set for new', '2020-09-10', NULL, NULL, NULL, 'inches', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-27 07:14:06', '2020-02-27 07:19:04');
/*!40000 ALTER TABLE `user_measurements` ENABLE KEYS */;

-- Dumping structure for table knitfit.user_profile
DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `aboutme` longtext COLLATE utf8mb4_unicode_ci,
  `professional_skills` text COLLATE utf8mb4_unicode_ci,
  `relationship` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `status` int(10) unsigned NOT NULL DEFAULT '1',
  `privacy` int(10) unsigned NOT NULL DEFAULT '1',
  `As_a_knitter_i_am` text COLLATE utf8mb4_unicode_ci,
  `i_knit_for` text COLLATE utf8mb4_unicode_ci,
  `rate_yourself` text COLLATE utf8mb4_unicode_ci,
  `i_am_here_for` text COLLATE utf8mb4_unicode_ci,
  `ipaddress` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.user_profile: ~19 rows (approximately)
DELETE FROM `user_profile`;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` (`id`, `user_id`, `aboutme`, `professional_skills`, `relationship`, `address`, `status`, `privacy`, `As_a_knitter_i_am`, `i_knit_for`, `rate_yourself`, `i_am_here_for`, `ipaddress`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 2, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 3, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(4, 4, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 5, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 6, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 7, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 8, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 9, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, 10, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(11, 11, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(12, 12, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(13, 13, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(14, 14, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(15, 15, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(16, 16, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(17, 17, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(18, 18, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(19, 19, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;

-- Dumping structure for table knitfit.user_role
DROP TABLE IF EXISTS `user_role`;
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.user_role: ~19 rows (approximately)
DELETE FROM `user_role`;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, '2020-01-02 06:03:46', NULL),
	(2, 2, 2, '2020-01-16 15:25:52', NULL),
	(3, 3, 2, '2020-01-27 15:53:02', NULL),
	(4, 4, 2, '2020-01-27 15:55:24', NULL),
	(5, 5, 2, '2020-01-27 15:56:26', NULL),
	(6, 6, 2, '2020-01-27 18:51:05', NULL),
	(7, 7, 2, '2020-01-27 21:12:21', NULL),
	(8, 8, 2, '2020-01-28 01:37:05', NULL),
	(9, 9, 2, '2020-02-10 18:22:04', NULL),
	(10, 10, 2, '2020-02-10 18:35:18', NULL),
	(11, 11, 2, '2020-02-10 18:48:38', NULL),
	(12, 12, 2, '2020-02-11 13:06:39', NULL),
	(13, 13, 2, '2020-02-11 18:03:49', NULL),
	(14, 14, 2, '2020-02-11 18:07:31', NULL),
	(15, 15, 2, '2020-02-12 11:17:49', NULL),
	(16, 16, 2, '2020-02-12 11:23:37', NULL),
	(17, 17, 2, '2020-02-12 11:42:41', NULL),
	(18, 18, 2, '2020-02-12 11:42:44', NULL),
	(19, 19, 2, '2020-02-27 04:41:39', NULL);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;

-- Dumping structure for table knitfit.user_subscriptions
DROP TABLE IF EXISTS `user_subscriptions`;
CREATE TABLE IF NOT EXISTS `user_subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subscription_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table knitfit.user_subscriptions: ~7 rows (approximately)
DELETE FROM `user_subscriptions`;
/*!40000 ALTER TABLE `user_subscriptions` DISABLE KEYS */;
INSERT INTO `user_subscriptions` (`id`, `user_id`, `subscription_id`, `created_at`, `updated_at`) VALUES
	(3, 3, 1, NULL, NULL),
	(5, 4, 1, NULL, NULL),
	(6, 11, 1, NULL, NULL),
	(7, 12, 1, NULL, NULL),
	(8, 13, 1, NULL, NULL),
	(11, 1, 2, NULL, NULL),
	(12, 18, 2, NULL, NULL);
/*!40000 ALTER TABLE `user_subscriptions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
