-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for snipeit
CREATE DATABASE IF NOT EXISTS `snipeit` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `snipeit`;

-- Dumping structure for table snipeit.accessories
CREATE TABLE IF NOT EXISTS `accessories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `requestable` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_cost` decimal(20,2) DEFAULT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(10) unsigned DEFAULT NULL,
  `min_amt` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `model_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.accessories: ~6 rows (approximately)
/*!40000 ALTER TABLE `accessories` DISABLE KEYS */;
REPLACE INTO `accessories` (`id`, `name`, `category_id`, `user_id`, `qty`, `requestable`, `created_at`, `updated_at`, `deleted_at`, `location_id`, `purchase_date`, `purchase_cost`, `order_number`, `company_id`, `min_amt`, `manufacturer_id`, `model_number`) VALUES
	(1, 'USB Keyboard', 8, 1, 15, 0, '2019-01-22 12:24:35', '2019-01-22 12:24:35', NULL, 4, NULL, NULL, NULL, NULL, 2, 1, '17539384'),
	(2, 'Bluetooth Keyboard', 8, 1, 10, 0, '2019-01-22 12:24:35', '2019-01-22 12:24:35', NULL, 1, NULL, NULL, NULL, NULL, 2, 1, '31180426'),
	(3, 'Magic Mouse', 9, 1, 13, 0, '2019-01-22 12:24:35', '2019-01-22 12:24:35', NULL, 3, NULL, NULL, NULL, NULL, 2, 1, '9579574'),
	(4, 'Sculpt Comfort Mouse', 9, 1, 13, 0, '2019-01-22 12:24:35', '2019-01-22 12:24:35', NULL, 4, NULL, NULL, NULL, NULL, 2, 2, '36404919'),
	(5, 'Junction box', 18, 59, 10, 0, '2019-01-31 09:35:04', '2019-01-31 09:35:04', NULL, 3, '2019-01-31', 500.00, '565', 1, 2, 1, '33'),
	(6, 'Mouse Pad', 17, 59, 5, 0, '2019-01-31 12:51:35', '2019-01-31 12:51:35', NULL, 4, '2019-01-01', 400.00, 'ORDER-001', 1, 1, 3, 'DEL-001');
/*!40000 ALTER TABLE `accessories` ENABLE KEYS */;

-- Dumping structure for table snipeit.accessories_users
CREATE TABLE IF NOT EXISTS `accessories_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `accessory_id` int(11) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.accessories_users: ~1 rows (approximately)
/*!40000 ALTER TABLE `accessories_users` DISABLE KEYS */;
REPLACE INTO `accessories_users` (`id`, `user_id`, `accessory_id`, `assigned_to`, `created_at`, `updated_at`) VALUES
	(1, 59, 5, 59, '2019-01-31 11:51:38', NULL);
/*!40000 ALTER TABLE `accessories_users` ENABLE KEYS */;

-- Dumping structure for table snipeit.action_logs
CREATE TABLE IF NOT EXISTS `action_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `action_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_id` int(11) DEFAULT NULL,
  `target_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `filename` text COLLATE utf8mb4_unicode_ci,
  `item_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `expected_checkin` date DEFAULT NULL,
  `accepted_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `accept_signature` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `action_logs_thread_id_index` (`thread_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.action_logs: ~14 rows (approximately)
/*!40000 ALTER TABLE `action_logs` DISABLE KEYS */;
REPLACE INTO `action_logs` (`id`, `user_id`, `action_type`, `target_id`, `target_type`, `location_id`, `note`, `filename`, `item_type`, `item_id`, `expected_checkin`, `accepted_id`, `created_at`, `updated_at`, `deleted_at`, `thread_id`, `company_id`, `accept_signature`) VALUES
	(1, 59, 'create', NULL, NULL, NULL, NULL, NULL, 'App\\Models\\Accessory', 5, NULL, NULL, '2019-01-31 09:35:04', '2019-01-31 09:35:04', NULL, NULL, 1, NULL),
	(2, 59, 'create', NULL, NULL, NULL, NULL, NULL, 'App\\Models\\Asset', 1, NULL, NULL, '2019-01-31 11:46:05', '2019-01-31 11:46:06', NULL, NULL, 1, NULL),
	(3, 59, 'checkout', 59, 'App\\Models\\User', NULL, 'Checked out on asset creation', NULL, 'App\\Models\\Asset', 1, NULL, NULL, '2019-01-31 11:46:06', '2019-01-31 11:46:06', NULL, NULL, NULL, NULL),
	(4, 59, 'checkin from', 59, 'App\\Models\\User', NULL, '', NULL, 'App\\Models\\Asset', 1, NULL, NULL, '2019-01-31 11:46:50', '2019-01-31 11:46:50', NULL, NULL, NULL, NULL),
	(5, 59, 'checkout', 59, 'App\\Models\\User', NULL, '', NULL, 'App\\Models\\Asset', 1, NULL, NULL, '2019-01-31 11:47:23', '2019-01-31 11:47:23', NULL, NULL, NULL, NULL),
	(6, 59, 'checkout', 59, 'App\\Models\\User', NULL, '', NULL, 'App\\Models\\Accessory', 5, NULL, NULL, '2019-01-31 11:51:38', '2019-01-31 11:51:38', NULL, NULL, NULL, NULL),
	(7, 59, 'update', NULL, NULL, NULL, NULL, NULL, 'App\\Models\\Asset', 1, NULL, NULL, '2019-01-31 11:52:52', '2019-01-31 11:52:52', NULL, NULL, 1, NULL),
	(8, 59, 'create', NULL, NULL, NULL, NULL, NULL, 'App\\Models\\Asset', 2, NULL, NULL, '2019-01-31 12:33:27', '2019-01-31 12:33:27', NULL, NULL, 1, NULL),
	(9, 59, 'checkout', 4, 'App\\Models\\Location', 4, 'Checked out on asset creation', NULL, 'App\\Models\\Asset', 2, NULL, NULL, '2019-01-31 12:33:27', '2019-01-31 12:33:27', NULL, NULL, NULL, NULL),
	(10, 59, 'update', NULL, NULL, NULL, NULL, NULL, 'App\\Models\\Asset', 1, NULL, NULL, '2019-01-31 12:33:58', '2019-01-31 12:33:58', NULL, NULL, 1, NULL),
	(11, NULL, 'requested', 59, 'App\\Models\\User', NULL, NULL, NULL, 'App\\Models\\AssetModel', 22, NULL, NULL, '2019-01-31 12:36:28', '2019-01-31 12:36:28', NULL, NULL, NULL, NULL),
	(12, 59, 'create', NULL, NULL, NULL, NULL, NULL, 'App\\Models\\Accessory', 6, NULL, NULL, '2019-01-31 12:51:35', '2019-01-31 12:51:35', NULL, NULL, 1, NULL),
	(13, 59, 'checkout', 59, 'App\\Models\\User', NULL, '', NULL, 'App\\Models\\Accessory', 6, NULL, NULL, '2019-01-31 12:55:04', '2019-01-31 12:55:04', NULL, NULL, NULL, NULL),
	(14, 59, 'checkin from', 59, 'App\\Models\\User', NULL, 'mouse pad checkin', NULL, 'App\\Models\\Accessory', 6, NULL, NULL, '2019-01-31 12:57:45', '2019-01-31 12:57:45', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `action_logs` ENABLE KEYS */;

-- Dumping structure for table snipeit.assets
CREATE TABLE IF NOT EXISTS `assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asset_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `serial` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_cost` decimal(20,2) DEFAULT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `physical` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `archived` tinyint(1) DEFAULT '0',
  `warranty_months` int(11) DEFAULT NULL,
  `depreciate` tinyint(1) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `costcentre_id` int(11) DEFAULT NULL,
  `requestable` tinyint(4) NOT NULL DEFAULT '0',
  `rtd_location_id` int(11) DEFAULT NULL,
  `accepted` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_checkout` datetime DEFAULT NULL,
  `expected_checkin` date DEFAULT NULL,
  `company_id` int(10) unsigned DEFAULT NULL,
  `assigned_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_snipeit_re_contextualized_secondary_collaboration_1` text COLLATE utf8mb4_unicode_ci,
  `_snipeit_robust_neutral_standardization_2` text COLLATE utf8mb4_unicode_ci,
  `_snipeit_managed_client_server_core_3` text COLLATE utf8mb4_unicode_ci,
  `_snipeit_organized_grid_enabled_intranet_4` text COLLATE utf8mb4_unicode_ci,
  `_snipeit_depreciation_rates_5` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.assets: ~2 rows (approximately)
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
REPLACE INTO `assets` (`id`, `name`, `asset_tag`, `model_id`, `serial`, `purchase_date`, `purchase_cost`, `order_number`, `assigned_to`, `notes`, `image`, `user_id`, `created_at`, `updated_at`, `physical`, `deleted_at`, `status_id`, `archived`, `warranty_months`, `depreciate`, `supplier_id`, `costcentre_id`, `requestable`, `rtd_location_id`, `accepted`, `last_checkout`, `expected_checkin`, `company_id`, `assigned_type`, `_snipeit_re_contextualized_secondary_collaboration_1`, `_snipeit_robust_neutral_standardization_2`, `_snipeit_managed_client_server_core_3`, `_snipeit_organized_grid_enabled_intranet_4`, `_snipeit_depreciation_rates_5`) VALUES
	(1, 'Desktop', '0001', 22, 'S001', '2019-01-30', 4500.00, '153', 59, '', NULL, 59, '2019-01-31 11:46:05', '2019-02-01 06:12:39', 1, NULL, 1, 0, 12, 0, 1, 4, 1, 4, NULL, '2019-01-31 11:47:23', '2019-02-01', 1, 'App\\Models\\User', NULL, NULL, NULL, NULL, NULL),
	(2, '', '00002', 23, '', '2017-11-28', 15000.00, '', 4, '', 'dYy6fwFzawQj4GZyeezlqc7lA.jpeg', 59, '2019-01-31 12:33:27', '2019-02-01 06:12:39', 1, NULL, 1, 0, 12, 0, 1, 4, 1, 4, NULL, '2019-01-31 12:33:27', NULL, 1, 'App\\Models\\Location', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;

-- Dumping structure for table snipeit.asset_logs
CREATE TABLE IF NOT EXISTS `asset_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `action_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_id` int(11) NOT NULL,
  `checkedout_to` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `asset_type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `filename` text COLLATE utf8mb4_unicode_ci,
  `requested_at` datetime DEFAULT NULL,
  `accepted_at` datetime DEFAULT NULL,
  `accessory_id` int(11) DEFAULT NULL,
  `electronics_id` int(11) DEFAULT NULL,
  `accepted_id` int(11) DEFAULT NULL,
  `consumable_id` int(11) DEFAULT NULL,
  `expected_checkin` date DEFAULT NULL,
  `component_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.asset_logs: ~0 rows (approximately)
/*!40000 ALTER TABLE `asset_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_logs` ENABLE KEYS */;

-- Dumping structure for table snipeit.asset_maintenances
CREATE TABLE IF NOT EXISTS `asset_maintenances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(10) unsigned NOT NULL,
  `supplier_id` int(10) unsigned NOT NULL,
  `asset_maintenance_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_warranty` tinyint(1) NOT NULL,
  `start_date` date NOT NULL,
  `completion_date` date DEFAULT NULL,
  `asset_maintenance_time` int(11) DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `cost` decimal(20,2) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.asset_maintenances: ~1 rows (approximately)
/*!40000 ALTER TABLE `asset_maintenances` DISABLE KEYS */;
REPLACE INTO `asset_maintenances` (`id`, `asset_id`, `supplier_id`, `asset_maintenance_type`, `title`, `is_warranty`, `start_date`, `completion_date`, `asset_maintenance_time`, `notes`, `cost`, `deleted_at`, `created_at`, `updated_at`, `user_id`) VALUES
	(1, 1376, 5, 'Maintenance', 'asset maintain', 1, '2019-01-30', '2019-01-31', 1, NULL, 500.00, NULL, '2019-01-30 07:48:15', '2019-01-30 07:48:15', 1);
/*!40000 ALTER TABLE `asset_maintenances` ENABLE KEYS */;

-- Dumping structure for table snipeit.asset_uploads
CREATE TABLE IF NOT EXISTS `asset_uploads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset_id` int(11) NOT NULL,
  `filenotes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.asset_uploads: ~0 rows (approximately)
/*!40000 ALTER TABLE `asset_uploads` DISABLE KEYS */;
/*!40000 ALTER TABLE `asset_uploads` ENABLE KEYS */;

-- Dumping structure for table snipeit.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `eula_text` longtext COLLATE utf8mb4_unicode_ci,
  `use_default_eula` tinyint(1) NOT NULL DEFAULT '0',
  `require_acceptance` tinyint(1) NOT NULL DEFAULT '0',
  `category_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'asset',
  `checkin_email` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.categories: ~20 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
REPLACE INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `user_id`, `deleted_at`, `eula_text`, `use_default_eula`, `require_acceptance`, `category_type`, `checkin_email`, `image`) VALUES
	(1, 'Laptops', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Et quod omnis est rem aliquam expedita. Consequatur quasi nobis reprehenderit a quaerat vel quas. Quisquam beatae et corporis delectus error et.', 1, 1, 'asset', 1, NULL),
	(2, 'Desktops', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Possimus facere aut nisi est. Ut provident a vel. Sed consequatur cumque est autem temporibus dolore.', 1, 0, 'asset', 0, NULL),
	(3, 'Tablets', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Minus eligendi ut cumque. Iure nobis in saepe nam tenetur nulla sit. Ipsa deserunt consequatur cum ad a officiis. Corporis repudiandae enim eius suscipit ad.', 0, 0, 'asset', 0, NULL),
	(4, 'Mobile Phones', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Et possimus enim deleniti sunt ex quia aspernatur. Quidem aspernatur blanditiis ut molestiae ab voluptates eius. Vero doloribus reiciendis recusandae. Itaque quo incidunt voluptas ut.', 0, 0, 'asset', 1, NULL),
	(5, 'Displays', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Commodi necessitatibus facilis quia eum voluptate. Laudantium quia saepe suscipit est omnis qui. A saepe dolores quo sed sed consequatur. Aperiam ut id debitis rerum dolorem magni.', 0, 0, 'asset', 0, NULL),
	(6, 'VOIP Phones', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Et aut est asperiores rerum aut mollitia non. Quaerat harum corrupti odit autem saepe dolor dignissimos. Est molestiae et quos iste.', 0, 0, 'asset', 0, NULL),
	(7, 'Conference Phones', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Veritatis laboriosam architecto minus quia. Ipsam voluptatem vitae corrupti commodi voluptas odit. Cum aut vitae dignissimos hic a iste debitis earum. Sunt fugiat aliquam aperiam molestiae velit et.', 1, 0, 'asset', 1, NULL),
	(8, 'Keyboards', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Ut voluptatum adipisci assumenda officiis. Mollitia veritatis delectus ad quas dolor placeat. Et voluptas aut ipsum animi. Sequi totam pariatur inventore iste ea modi excepturi. Cumque minima dolores similique eos sed.', 0, 0, 'accessory', 0, NULL),
	(9, 'Mouse', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Aut qui dolore quibusdam maxime itaque libero. Ex sed aliquam eligendi aut in omnis cum. Aspernatur voluptatem iusto aperiam veritatis voluptatem. Debitis consectetur beatae eius quaerat dolorem qui.', 0, 0, 'accessory', 1, NULL),
	(10, 'Printer Paper', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Consequatur recusandae vitae quo doloribus est ea. Facere nam velit eius dolores et et aut. Consectetur ipsam in et eos mollitia. Id labore ut excepturi at.', 0, 0, 'consumable', 1, NULL),
	(11, 'Printer Ink', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Laudantium aspernatur quisquam sint alias quasi est. Amet et sunt est velit magnam qui. Non quibusdam voluptas modi et dolorem molestias et.', 0, 0, 'consumable', 1, NULL),
	(12, 'HDD/SSD', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Rerum sunt animi ullam quisquam. Facere consequuntur in similique ea. Et fugiat reiciendis eaque suscipit. Neque nihil recusandae et hic. Veritatis tenetur suscipit velit maxime est natus.', 1, 0, 'component', 1, NULL),
	(13, 'RAM', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Architecto maiores vel aliquam voluptates sunt. Omnis veritatis enim aut sequi repudiandae omnis. Quo omnis voluptatum omnis consequuntur molestiae sunt minus.', 1, 0, 'component', 0, NULL),
	(14, 'Graphics Software', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Nobis accusantium praesentium ex consequuntur ut. Quasi omnis veritatis dolor omnis quis. Voluptates libero quibusdam repudiandae vel provident quis culpa. Aspernatur reprehenderit officia voluptatem similique.', 0, 0, 'license', 0, NULL),
	(15, 'Office Software', '2019-01-22 12:24:28', '2019-01-22 12:24:28', 1, NULL, 'Nihil voluptatibus pariatur labore labore earum explicabo voluptatem. Facere dicta illum expedita laborum est voluptatibus. Ut possimus ut voluptatem ea. Hic ut rerum impedit in labore.', 0, 0, 'license', 1, NULL),
	(17, 'Mouse Pad', '2019-01-31 09:33:14', '2019-01-31 09:33:14', NULL, NULL, NULL, 0, 0, 'accessory', 0, NULL),
	(18, 'Junction Box', '2019-01-31 09:33:34', '2019-01-31 09:33:34', NULL, NULL, NULL, 0, 0, 'accessory', 0, NULL),
	(19, 'Telephones', '2019-01-31 11:22:43', '2019-01-31 11:22:43', 1, NULL, '', 1, 0, 'asset', 0, NULL),
	(20, 'Furnitures', '2019-01-31 11:23:36', '2019-01-31 11:23:36', 1, NULL, '', 0, 0, 'asset', 0, NULL),
	(22, 'fghfgj', '2019-02-01 10:59:44', '2019-02-01 10:59:44', 1, NULL, '', 0, 0, 'asset', 0, NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table snipeit.checkout_requests
CREATE TABLE IF NOT EXISTS `checkout_requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `requestable_id` int(11) NOT NULL,
  `requestable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `checkout_requests_user_id_requestable_id_requestable_type_unique` (`user_id`,`requestable_id`,`requestable_type`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.checkout_requests: ~2 rows (approximately)
/*!40000 ALTER TABLE `checkout_requests` DISABLE KEYS */;
REPLACE INTO `checkout_requests` (`id`, `user_id`, `requestable_id`, `requestable_type`, `quantity`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'App\\Models\\Asset', 1, '2019-01-29 13:20:58', '2019-01-30 08:45:30'),
	(2, 59, 22, 'App\\Models\\AssetModel', 1, '2019-01-31 12:36:28', '2019-01-31 12:36:28');
/*!40000 ALTER TABLE `checkout_requests` ENABLE KEYS */;

-- Dumping structure for table snipeit.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.companies: ~1 rows (approximately)
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
REPLACE INTO `companies` (`id`, `name`, `created_at`, `updated_at`, `image`) VALUES
	(1, 'Talent Takeaways consulting india pvt ltd', '2019-01-22 12:24:28', '2019-01-31 11:19:22', NULL);
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Dumping structure for table snipeit.components
CREATE TABLE IF NOT EXISTS `components` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_cost` decimal(20,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `min_amt` int(11) DEFAULT NULL,
  `serial` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.components: ~4 rows (approximately)
/*!40000 ALTER TABLE `components` DISABLE KEYS */;
REPLACE INTO `components` (`id`, `name`, `category_id`, `location_id`, `company_id`, `user_id`, `qty`, `order_number`, `purchase_date`, `purchase_cost`, `created_at`, `updated_at`, `deleted_at`, `min_amt`, `serial`) VALUES
	(1, 'Crucial 4GB DDR3L-1600 SODIMM', 13, 3, 2, NULL, 10, '41783653', '1987-10-20', 335997178.03, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, 2, '3e747d8d-d5cd-3252-aab4-51e5c3172383'),
	(2, 'Crucial 8GB DDR3L-1600 SODIMM Memory for Mac', 13, 1, 5, NULL, 10, '3055571', '2000-01-09', 135.00, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, 2, 'cac75ac3-cb5e-3fee-bfc1-bd9b0f4a2fb4'),
	(3, 'Crucial BX300 120GB SATA Internal SSD', 12, 1, 6, NULL, 10, '15782217', '2018-04-08', 5518068.88, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, 2, '2ed7f50b-5ee7-31b2-9142-bdd2c08f2986'),
	(4, 'Crucial BX300 240GB SATA Internal SSD', 12, 1, 7, NULL, 10, '20588183', '1991-12-31', 4.97, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, 2, '360c3585-cd24-38de-9778-752db87e3bda');
/*!40000 ALTER TABLE `components` ENABLE KEYS */;

-- Dumping structure for table snipeit.components_assets
CREATE TABLE IF NOT EXISTS `components_assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `assigned_qty` int(11) DEFAULT '1',
  `component_id` int(11) DEFAULT NULL,
  `asset_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.components_assets: ~0 rows (approximately)
/*!40000 ALTER TABLE `components_assets` DISABLE KEYS */;
/*!40000 ALTER TABLE `components_assets` ENABLE KEYS */;

-- Dumping structure for table snipeit.consumables
CREATE TABLE IF NOT EXISTS `consumables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `requestable` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_cost` decimal(20,2) DEFAULT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(10) unsigned DEFAULT NULL,
  `min_amt` int(11) DEFAULT NULL,
  `model_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `item_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.consumables: ~3 rows (approximately)
/*!40000 ALTER TABLE `consumables` DISABLE KEYS */;
REPLACE INTO `consumables` (`id`, `name`, `category_id`, `location_id`, `user_id`, `qty`, `requestable`, `created_at`, `updated_at`, `deleted_at`, `purchase_date`, `purchase_cost`, `order_number`, `company_id`, `min_amt`, `model_number`, `manufacturer_id`, `item_no`) VALUES
	(1, 'Cardstock (White)', 10, NULL, 1, 10, 0, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, '2018-06-14', 45.66, '12298396', 3, 2, NULL, 10, '23430462'),
	(2, 'Laserjet Paper (Ream)', 10, NULL, 1, 20, 0, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, '2018-08-26', 47.00, '17173205', NULL, 2, NULL, 10, '43897324'),
	(3, 'Laserjet Toner (black)', 11, NULL, 1, 20, 0, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, '2018-10-23', 29.79, '10969042', NULL, 2, NULL, 5, '9250828');
/*!40000 ALTER TABLE `consumables` ENABLE KEYS */;

-- Dumping structure for table snipeit.consumables_users
CREATE TABLE IF NOT EXISTS `consumables_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `consumable_id` int(11) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.consumables_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `consumables_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `consumables_users` ENABLE KEYS */;

-- Dumping structure for table snipeit.costcentres
CREATE TABLE IF NOT EXISTS `costcentres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `costcode` varchar(250) NOT NULL,
  `dept_id` varchar(100) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `modified_id` int(11) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table snipeit.costcentres: ~3 rows (approximately)
/*!40000 ALTER TABLE `costcentres` DISABLE KEYS */;
REPLACE INTO `costcentres` (`id`, `costcode`, `dept_id`, `note`, `modified_id`, `created_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'new cost centres', 'new cost Depts', 'new cost notes', 1, 1, '2019-01-24 10:36:11', '2019-01-24 12:26:42', NULL),
	(4, 'Computer', 'products', 'computer costcentre', 1, 1, '2019-01-30 07:20:25', '2019-01-30 07:21:44', NULL),
	(5, 'sales', '3', 'sales', 1, 1, '2019-01-30 10:39:55', '2019-01-30 10:39:55', NULL);
/*!40000 ALTER TABLE `costcentres` ENABLE KEYS */;

-- Dumping structure for table snipeit.custom_fields
CREATE TABLE IF NOT EXISTS `custom_fields` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `format` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `element` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `field_values` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field_encrypted` tinyint(1) NOT NULL DEFAULT '0',
  `db_column` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `help_text` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.custom_fields: ~5 rows (approximately)
/*!40000 ALTER TABLE `custom_fields` DISABLE KEYS */;
REPLACE INTO `custom_fields` (`id`, `name`, `format`, `element`, `created_at`, `updated_at`, `user_id`, `field_values`, `field_encrypted`, `db_column`, `help_text`) VALUES
	(1, 'Re-contextualized secondary collaboration', '', 'text', '2019-01-22 12:28:18', '2019-01-22 12:28:18', NULL, NULL, 0, '_snipeit_re_contextualized_secondary_collaboration_1', NULL),
	(2, 'Robust neutral standardization', '', 'text', '2019-01-22 12:28:19', '2019-01-22 12:28:19', NULL, NULL, 0, '_snipeit_robust_neutral_standardization_2', NULL),
	(3, 'Managed client-server core', '', 'text', '2019-01-22 12:28:19', '2019-01-22 12:28:19', NULL, NULL, 0, '_snipeit_managed_client_server_core_3', NULL),
	(4, 'Organized grid-enabled intranet', '', 'text', '2019-01-22 12:28:20', '2019-01-22 12:28:20', NULL, NULL, 0, '_snipeit_organized_grid_enabled_intranet_4', NULL),
	(5, 'depreciation-rates', '', 'listbox', '2019-01-23 10:01:18', '2019-01-23 10:01:18', NULL, '12\r\n24\r\n36', 0, '_snipeit_depreciation_rates_5', '');
/*!40000 ALTER TABLE `custom_fields` ENABLE KEYS */;

-- Dumping structure for table snipeit.custom_fieldsets
CREATE TABLE IF NOT EXISTS `custom_fieldsets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.custom_fieldsets: ~0 rows (approximately)
/*!40000 ALTER TABLE `custom_fieldsets` DISABLE KEYS */;
/*!40000 ALTER TABLE `custom_fieldsets` ENABLE KEYS */;

-- Dumping structure for table snipeit.custom_field_custom_fieldset
CREATE TABLE IF NOT EXISTS `custom_field_custom_fieldset` (
  `custom_field_id` int(11) NOT NULL,
  `custom_fieldset_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `required` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.custom_field_custom_fieldset: ~2 rows (approximately)
/*!40000 ALTER TABLE `custom_field_custom_fieldset` DISABLE KEYS */;
REPLACE INTO `custom_field_custom_fieldset` (`custom_field_id`, `custom_fieldset_id`, `order`, `required`) VALUES
	(5, 1, 0, 0),
	(4, 2, 1, 0);
/*!40000 ALTER TABLE `custom_field_custom_fieldset` ENABLE KEYS */;

-- Dumping structure for table snipeit.depreciations
CREATE TABLE IF NOT EXISTS `depreciations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `months` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.depreciations: ~3 rows (approximately)
/*!40000 ALTER TABLE `depreciations` DISABLE KEYS */;
REPLACE INTO `depreciations` (`id`, `name`, `months`, `created_at`, `updated_at`, `user_id`) VALUES
	(1, 'Computer Depreciation', 36, '2019-01-22 12:24:34', '2019-01-22 12:24:34', 1),
	(2, 'Display Depreciation', 12, '2019-01-22 12:24:34', '2019-01-22 12:24:34', 1),
	(3, 'Mobile Phone Depreciation', 24, '2019-01-22 12:24:34', '2019-01-22 12:24:34', 1);
/*!40000 ALTER TABLE `depreciations` ENABLE KEYS */;

-- Dumping structure for table snipeit.electronics
CREATE TABLE IF NOT EXISTS `electronics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `requestable` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `location_id` int(10) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_cost` decimal(20,2) DEFAULT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` int(10) unsigned DEFAULT NULL,
  `min_amt` int(11) DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `model_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.electronics: ~0 rows (approximately)
/*!40000 ALTER TABLE `electronics` DISABLE KEYS */;
/*!40000 ALTER TABLE `electronics` ENABLE KEYS */;

-- Dumping structure for table snipeit.electronics_users
CREATE TABLE IF NOT EXISTS `electronics_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `electronics_id` int(11) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table snipeit.electronics_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `electronics_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `electronics_users` ENABLE KEYS */;

-- Dumping structure for table snipeit.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.groups: ~0 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping structure for table snipeit.imports
CREATE TABLE IF NOT EXISTS `imports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filesize` int(11) NOT NULL,
  `import_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.imports: ~0 rows (approximately)
/*!40000 ALTER TABLE `imports` DISABLE KEYS */;
/*!40000 ALTER TABLE `imports` ENABLE KEYS */;

-- Dumping structure for table snipeit.licenses
CREATE TABLE IF NOT EXISTS `licenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serial` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_cost` decimal(20,2) DEFAULT NULL,
  `order_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seats` int(11) NOT NULL DEFAULT '1',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `depreciation_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `license_name` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `depreciate` tinyint(1) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `purchase_order` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `termination_date` date DEFAULT NULL,
  `maintained` tinyint(1) DEFAULT NULL,
  `reassignable` tinyint(1) NOT NULL DEFAULT '1',
  `company_id` int(10) unsigned DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.licenses: ~4 rows (approximately)
/*!40000 ALTER TABLE `licenses` DISABLE KEYS */;
REPLACE INTO `licenses` (`id`, `name`, `serial`, `purchase_date`, `purchase_cost`, `order_number`, `seats`, `notes`, `user_id`, `depreciation_id`, `created_at`, `updated_at`, `deleted_at`, `license_name`, `license_email`, `depreciate`, `supplier_id`, `expiration_date`, `purchase_order`, `termination_date`, `maintained`, `reassignable`, `company_id`, `manufacturer_id`) VALUES
	(1, 'Photoshop', '1a77665d-0175-303a-b171-f07edf4e05ee', '2019-01-21', 299.99, '38530958', 10, 'Created by DB seeder', 1, NULL, '2019-01-22 12:27:35', '2019-02-01 06:16:33', NULL, 'Alivia Hyatt', 'kcole@example.net', NULL, 4, '2019-12-20', '13503Q', '2018-06-11', 1, 1, NULL, 9),
	(2, 'Acrobat', 'b78f5dfc-1337-3f9d-a6dd-308db9a6ed47', '2018-07-19', 29.99, '4502653', 10, 'Created by DB seeder', 1, NULL, '2019-01-22 12:27:35', '2019-02-01 06:16:33', NULL, 'Kathryne Heller DVM', 'antwan.bogan@example.com', NULL, 1, '2020-02-25', NULL, '2018-02-01', NULL, 1, NULL, 9),
	(3, 'InDesign', 'b0babb7b-17a7-3d86-9b09-c11e8ab9824c', '2018-12-19', 199.99, '10040179', 10, 'Created by DB seeder', 1, NULL, '2019-01-22 12:27:35', '2019-02-01 06:16:33', NULL, 'Dr. Keith Dickinson', 'ilakin@example.net', NULL, 3, '2021-04-12', NULL, '2018-02-24', NULL, 1, NULL, 9),
	(4, 'Office', '003f7b13-9d63-38e5-92fd-96769822687e', '2018-07-10', 49.99, '32211593', 20, 'Created by DB seeder', 1, NULL, '2019-01-22 12:27:36', '2019-02-01 06:16:33', NULL, 'Lucio Gulgowski', 'meredith.hirthe@example.net', NULL, 4, '2020-06-15', NULL, '2018-06-13', NULL, 1, NULL, 2);
/*!40000 ALTER TABLE `licenses` ENABLE KEYS */;

-- Dumping structure for table snipeit.license_seats
CREATE TABLE IF NOT EXISTS `license_seats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `license_id` int(11) DEFAULT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `asset_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.license_seats: ~50 rows (approximately)
/*!40000 ALTER TABLE `license_seats` DISABLE KEYS */;
REPLACE INTO `license_seats` (`id`, `license_id`, `assigned_to`, `notes`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `asset_id`) VALUES
	(1, 1, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(2, 1, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(3, 1, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(4, 1, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(5, 1, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(6, 1, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(7, 1, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(8, 1, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(9, 1, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(10, 1, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(11, 2, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(12, 2, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(13, 2, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(14, 2, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(15, 2, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(16, 2, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(17, 2, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(18, 2, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(19, 2, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(20, 2, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(21, 3, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(22, 3, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(23, 3, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(24, 3, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(25, 3, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(26, 3, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(27, 3, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(28, 3, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(29, 3, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(30, 3, NULL, NULL, NULL, '2019-01-22 12:27:35', '2019-01-22 12:27:35', NULL, NULL),
	(31, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(32, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(33, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(34, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(35, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(36, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(37, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(38, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(39, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(40, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(41, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(42, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(43, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(44, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(45, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(46, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(47, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(48, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(49, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL),
	(50, 4, NULL, NULL, NULL, '2019-01-22 12:27:36', '2019-01-22 12:27:36', NULL, NULL);
/*!40000 ALTER TABLE `license_seats` ENABLE KEYS */;

-- Dumping structure for table snipeit.locations
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ldap_ou` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.locations: ~2 rows (approximately)
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
REPLACE INTO `locations` (`id`, `name`, `city`, `state`, `country`, `created_at`, `updated_at`, `user_id`, `address`, `address2`, `zip`, `deleted_at`, `parent_id`, `currency`, `ldap_ou`, `image`) VALUES
	(1, 'Everardoville', 'Odieland', 'MD', 'JO', '2019-01-22 12:24:32', '2019-01-22 12:24:32', NULL, '21009 Elinore Islands', 'Apt. 444', '94560-2134', NULL, NULL, 'VUV', NULL, NULL),
	(4, 'TTCI CITI CENTRE ', 'Chennai', 'TamilNadu', 'IN', '2019-01-31 11:15:28', '2019-01-31 11:15:28', 1, 'REGUS BUSINESS CENTRE, CITI CENTRE, LEVEL 6, ', '10/11, DR. RADAKRISHNAN SALAI, CHENNAI Chennai TN 600004 IN', '600004', NULL, NULL, 'INR', NULL, NULL);
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;

-- Dumping structure for table snipeit.manufacturers
CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.manufacturers: ~12 rows (approximately)
/*!40000 ALTER TABLE `manufacturers` DISABLE KEYS */;
REPLACE INTO `manufacturers` (`id`, `name`, `created_at`, `updated_at`, `user_id`, `deleted_at`, `url`, `support_url`, `support_phone`, `support_email`, `image`) VALUES
	(1, 'Apple', '2019-01-22 12:24:31', '2019-01-22 12:24:31', 1, NULL, 'https://apple.com', 'https://support.apple.com', '+1 (628) 454-9042', 'kathlyn.von@example.com', NULL),
	(2, 'Microsoft', '2019-01-22 12:24:31', '2019-01-22 12:24:31', 1, NULL, 'https://microsoft.com', 'https://support.microsoft.com', '423.669.6320', 'valentin74@example.org', NULL),
	(3, 'Dell', '2019-01-22 12:24:32', '2019-01-22 12:24:32', 1, NULL, 'https://dell.com', 'https://support.dell.com', '(227) 836-3090', 'nfranecki@example.net', NULL),
	(4, 'Asus', '2019-01-22 12:24:32', '2019-01-22 12:24:32', 1, NULL, 'https://asus.com', 'https://support.asus.com', '(679) 358-3709 x735', 'zachery33@example.org', NULL),
	(5, 'HP', '2019-01-22 12:24:32', '2019-01-22 12:24:32', 1, NULL, 'https://hp.com', 'https://support.hp.com', '+1-392-347-0666', 'vida.tromp@example.net', NULL),
	(6, 'Lenovo', '2019-01-22 12:24:32', '2019-01-22 12:24:32', 1, NULL, 'https://lenovo.com', 'https://support.lenovo.com', '+1-207-771-2610', 'veum.everette@example.net', NULL),
	(7, 'LG', '2019-01-22 12:24:32', '2019-01-22 12:24:32', 1, NULL, 'https://lg.com', 'https://support.lg.com', '256-535-3975', 'yreichert@example.org', NULL),
	(8, 'Polycom', '2019-01-22 12:24:32', '2019-01-22 12:24:32', 1, NULL, 'https://polycom.com', 'https://support.polycom.com', '476.735.1861 x08205', 'clarabelle.crist@example.net', NULL),
	(9, 'Adobe', '2019-01-22 12:24:32', '2019-01-22 12:24:32', 1, NULL, 'https://adobe.com', 'https://support.adobe.com', '671-976-0714 x3502', 'daisha.spinka@example.org', NULL),
	(10, 'Avery', '2019-01-22 12:24:32', '2019-01-22 12:24:32', 1, NULL, 'https://avery.com', 'https://support.avery.com', '+17567477192', 'hickle.monserrat@example.net', NULL),
	(11, 'Crucial', '2019-01-22 12:24:32', '2019-01-22 12:24:32', 1, NULL, 'https://crucial.com', 'https://support.crucial.com', '635.321.1890 x93425', 'erich.ohara@example.com', NULL),
	(12, 'Compaq', '2019-01-31 11:38:41', '2019-01-31 11:38:41', 59, NULL, 'http://www.compaq.com', '', '', '', NULL);
/*!40000 ALTER TABLE `manufacturers` ENABLE KEYS */;

-- Dumping structure for table snipeit.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=334 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.migrations: ~215 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2012_12_06_225921_migration_cartalyst_sentry_install_users', 1),
	(2, '2012_12_06_225929_migration_cartalyst_sentry_install_groups', 1),
	(3, '2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 1),
	(4, '2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 1),
	(5, '2013_03_23_193214_update_users_table', 1),
	(6, '2013_11_13_075318_create_models_table', 1),
	(7, '2013_11_13_075335_create_categories_table', 1),
	(8, '2013_11_13_075347_create_manufacturers_table', 1),
	(9, '2013_11_15_015858_add_user_id_to_categories', 1),
	(10, '2013_11_15_112701_add_user_id_to_manufacturers', 1),
	(11, '2013_11_15_190327_create_assets_table', 1),
	(12, '2013_11_15_190357_create_licenses_table', 1),
	(13, '2013_11_15_201848_add_license_name_to_licenses', 1),
	(14, '2013_11_16_040323_create_depreciations_table', 1),
	(15, '2013_11_16_042851_add_depreciation_id_to_models', 1),
	(16, '2013_11_16_084923_add_user_id_to_models', 1),
	(17, '2013_11_16_103258_create_locations_table', 1),
	(18, '2013_11_16_103336_add_location_id_to_assets', 1),
	(19, '2013_11_16_103407_add_checkedout_to_to_assets', 1),
	(20, '2013_11_16_103425_create_history_table', 1),
	(21, '2013_11_17_054359_drop_licenses_table', 1),
	(22, '2013_11_17_054526_add_physical_to_assets', 1),
	(23, '2013_11_17_055126_create_settings_table', 1),
	(24, '2013_11_17_062634_add_license_to_assets', 1),
	(25, '2013_11_18_134332_add_contacts_to_users', 1),
	(26, '2013_11_18_142847_add_info_to_locations', 1),
	(27, '2013_11_18_152942_remove_location_id_from_asset', 1),
	(28, '2013_11_18_164423_set_nullvalues_for_user', 1),
	(29, '2013_11_19_013337_create_asset_logs_table', 1),
	(30, '2013_11_19_061409_edit_added_on_asset_logs_table', 1),
	(31, '2013_11_19_062250_edit_location_id_asset_logs_table', 1),
	(32, '2013_11_20_055822_add_soft_delete_on_assets', 1),
	(33, '2013_11_20_121404_add_soft_delete_on_locations', 1),
	(34, '2013_11_20_123137_add_soft_delete_on_manufacturers', 1),
	(35, '2013_11_20_123725_add_soft_delete_on_categories', 1),
	(36, '2013_11_20_130248_create_status_labels', 1),
	(37, '2013_11_20_130830_add_status_id_on_assets_table', 1),
	(38, '2013_11_20_131544_add_status_type_on_status_labels', 1),
	(39, '2013_11_20_134103_add_archived_to_assets', 1),
	(40, '2013_11_21_002321_add_uploads_table', 1),
	(41, '2013_11_21_024531_remove_deployable_boolean_from_status_labels', 1),
	(42, '2013_11_22_075308_add_option_label_to_settings_table', 1),
	(43, '2013_11_22_213400_edits_to_settings_table', 1),
	(44, '2013_11_25_013244_create_licenses_table', 1),
	(45, '2013_11_25_031458_create_license_seats_table', 1),
	(46, '2013_11_25_032022_add_type_to_actionlog_table', 1),
	(47, '2013_11_25_033008_delete_bad_licenses_table', 1),
	(48, '2013_11_25_033131_create_new_licenses_table', 1),
	(49, '2013_11_25_033534_add_licensed_to_licenses_table', 1),
	(50, '2013_11_25_101308_add_warrantee_to_assets_table', 1),
	(51, '2013_11_25_104343_alter_warranty_column_on_assets', 1),
	(52, '2013_11_25_150450_drop_parent_from_categories', 1),
	(53, '2013_11_25_151920_add_depreciate_to_assets', 1),
	(54, '2013_11_25_152903_add_depreciate_to_licenses_table', 1),
	(55, '2013_11_26_211820_drop_license_from_assets_table', 1),
	(56, '2013_11_27_062510_add_note_to_asset_logs_table', 1),
	(57, '2013_12_01_113426_add_filename_to_asset_log', 1),
	(58, '2013_12_06_094618_add_nullable_to_licenses_table', 1),
	(59, '2013_12_10_084038_add_eol_on_models_table', 1),
	(60, '2013_12_12_055218_add_manager_to_users_table', 1),
	(61, '2014_01_28_031200_add_qr_code_to_settings_table', 1),
	(62, '2014_02_13_183016_add_qr_text_to_settings_table', 1),
	(63, '2014_05_24_093839_alter_default_license_depreciation_id', 1),
	(64, '2014_05_27_231658_alter_default_values_licenses', 1),
	(65, '2014_06_19_191508_add_asset_name_to_settings', 1),
	(66, '2014_06_20_004847_make_asset_log_checkedout_to_nullable', 1),
	(67, '2014_06_20_005050_make_asset_log_purchasedate_to_nullable', 1),
	(68, '2014_06_24_003011_add_suppliers', 1),
	(69, '2014_06_24_010742_add_supplier_id_to_asset', 1),
	(70, '2014_06_24_012839_add_zip_to_supplier', 1),
	(71, '2014_06_24_033908_add_url_to_supplier', 1),
	(72, '2014_07_08_054116_add_employee_id_to_users', 1),
	(73, '2014_07_09_134316_add_requestable_to_assets', 1),
	(74, '2014_07_17_085822_add_asset_to_software', 1),
	(75, '2014_07_17_161625_make_asset_id_in_logs_nullable', 1),
	(76, '2014_08_12_053504_alpha_0_4_2_release', 1),
	(77, '2014_08_17_083523_make_location_id_nullable', 1),
	(78, '2014_10_16_200626_add_rtd_location_to_assets', 1),
	(79, '2014_10_24_000417_alter_supplier_state_to_32', 1),
	(80, '2014_10_24_015641_add_display_checkout_date', 1),
	(81, '2014_10_28_222654_add_avatar_field_to_users_table', 1),
	(82, '2014_10_29_045924_add_image_field_to_models_table', 1),
	(83, '2014_11_01_214955_add_eol_display_to_settings', 1),
	(84, '2014_11_04_231416_update_group_field_for_reporting', 1),
	(85, '2014_11_05_212408_add_fields_to_licenses', 1),
	(86, '2014_11_07_021042_add_image_to_supplier', 1),
	(87, '2014_11_20_203007_add_username_to_user', 1),
	(88, '2014_11_20_223947_add_auto_to_settings', 1),
	(89, '2014_11_20_224421_add_prefix_to_settings', 1),
	(90, '2014_11_21_104401_change_licence_type', 1),
	(91, '2014_12_09_082500_add_fields_maintained_term_to_licenses', 1),
	(92, '2015_02_04_155757_increase_user_field_lengths', 1),
	(93, '2015_02_07_013537_add_soft_deleted_to_log', 1),
	(94, '2015_02_10_040958_fix_bad_assigned_to_ids', 1),
	(95, '2015_02_10_053310_migrate_data_to_new_statuses', 1),
	(96, '2015_02_11_044104_migrate_make_license_assigned_null', 1),
	(97, '2015_02_11_104406_migrate_create_requests_table', 1),
	(98, '2015_02_12_001312_add_mac_address_to_asset', 1),
	(99, '2015_02_12_024100_change_license_notes_type', 1),
	(100, '2015_02_17_231020_add_localonly_to_settings', 1),
	(101, '2015_02_19_222322_add_logo_and_colors_to_settings', 1),
	(102, '2015_02_24_072043_add_alerts_to_settings', 1),
	(103, '2015_02_25_022931_add_eula_fields', 1),
	(104, '2015_02_25_204513_add_accessories_table', 1),
	(105, '2015_02_26_091228_add_accessories_user_table', 1),
	(106, '2015_02_26_115128_add_deleted_at_models', 1),
	(107, '2015_02_26_233005_add_category_type', 1),
	(108, '2015_03_01_231912_update_accepted_at_to_acceptance_id', 1),
	(109, '2015_03_05_011929_add_qr_type_to_settings', 1),
	(110, '2015_03_18_055327_add_note_to_user', 1),
	(111, '2015_04_29_234704_add_slack_to_settings', 1),
	(112, '2015_05_04_085151_add_parent_id_to_locations_table', 1),
	(113, '2015_05_22_124421_add_reassignable_to_licenses', 1),
	(114, '2015_06_10_003314_fix_default_for_user_notes', 1),
	(115, '2015_06_10_003554_create_consumables', 1),
	(116, '2015_06_15_183253_move_email_to_username', 1),
	(117, '2015_06_23_070346_make_email_nullable', 1),
	(118, '2015_06_26_213716_create_asset_maintenances_table', 1),
	(119, '2015_07_04_212443_create_custom_fields_table', 1),
	(120, '2015_07_09_014359_add_currency_to_settings_and_locations', 1),
	(121, '2015_07_21_122022_add_expected_checkin_date_to_asset_logs', 1),
	(122, '2015_07_24_093845_add_checkin_email_to_category_table', 1),
	(123, '2015_07_25_055415_remove_email_unique_constraint', 1),
	(124, '2015_07_29_230054_add_thread_id_to_asset_logs_table', 1),
	(125, '2015_07_31_015430_add_accepted_to_assets', 1),
	(126, '2015_09_09_195301_add_custom_css_to_settings', 1),
	(127, '2015_09_21_235926_create_custom_field_custom_fieldset', 1),
	(128, '2015_09_22_000104_create_custom_fieldsets', 1),
	(129, '2015_09_22_003321_add_fieldset_id_to_assets', 1),
	(130, '2015_09_22_003413_migrate_mac_address', 1),
	(131, '2015_09_28_003314_fix_default_purchase_order', 1),
	(132, '2015_10_01_024551_add_accessory_consumable_price_info', 1),
	(133, '2015_10_12_192706_add_brand_to_settings', 1),
	(134, '2015_10_22_003314_fix_defaults_accessories', 1),
	(135, '2015_10_23_182625_add_checkout_time_and_expected_checkout_date_to_assets', 1),
	(136, '2015_11_05_061015_create_companies_table', 1),
	(137, '2015_11_05_061115_add_company_id_to_consumables_table', 1),
	(138, '2015_11_05_183749_image', 1),
	(139, '2015_11_06_092038_add_company_id_to_accessories_table', 1),
	(140, '2015_11_06_100045_add_company_id_to_users_table', 1),
	(141, '2015_11_06_134742_add_company_id_to_licenses_table', 1),
	(142, '2015_11_08_035832_add_company_id_to_assets_table', 1),
	(143, '2015_11_08_222305_add_ldap_fields_to_settings', 1),
	(144, '2015_11_15_151803_add_full_multiple_companies_support_to_settings_table', 1),
	(145, '2015_11_26_195528_import_ldap_settings', 1),
	(146, '2015_11_30_191504_remove_fk_company_id', 1),
	(147, '2015_12_21_193006_add_ldap_server_cert_ignore_to_settings_table', 1),
	(148, '2015_12_30_233509_add_timestamp_and_userId_to_custom_fields', 1),
	(149, '2015_12_30_233658_add_timestamp_and_userId_to_custom_fieldsets', 1),
	(150, '2016_01_28_041048_add_notes_to_models', 1),
	(151, '2016_02_19_070119_add_remember_token_to_users_table', 1),
	(152, '2016_02_19_073625_create_password_resets_table', 1),
	(153, '2016_03_02_193043_add_ldap_flag_to_users', 1),
	(154, '2016_03_02_220517_update_ldap_filter_to_longer_field', 1),
	(155, '2016_03_08_225351_create_components_table', 1),
	(156, '2016_03_09_024038_add_min_stock_to_tables', 1),
	(157, '2016_03_10_133849_add_locale_to_users', 1),
	(158, '2016_03_10_135519_add_locale_to_settings', 1),
	(159, '2016_03_11_185621_add_label_settings_to_settings', 1),
	(160, '2016_03_22_125911_fix_custom_fields_regexes', 1),
	(161, '2016_04_28_141554_add_show_to_users', 1),
	(162, '2016_05_16_164733_add_model_mfg_to_consumable', 1),
	(163, '2016_05_19_180351_add_alt_barcode_settings', 1),
	(164, '2016_05_19_191146_add_alter_interval', 1),
	(165, '2016_05_19_192226_add_inventory_threshold', 1),
	(166, '2016_05_20_024859_remove_option_keys_from_settings_table', 1),
	(167, '2016_05_20_143758_remove_option_value_from_settings_table', 1),
	(168, '2016_06_01_140218_add_email_domain_and_format_to_settings', 1),
	(169, '2016_06_22_160725_add_user_id_to_maintenances', 1),
	(170, '2016_07_13_150015_add_is_ad_to_settings', 1),
	(171, '2016_07_14_153609_add_ad_domain_to_settings', 1),
	(172, '2016_07_22_003348_fix_custom_fields_regex_stuff', 1),
	(173, '2016_07_22_054850_one_more_mac_addr_fix', 1),
	(174, '2016_07_22_143045_add_port_to_ldap_settings', 1),
	(175, '2016_07_22_153432_add_tls_to_ldap_settings', 1),
	(176, '2016_07_27_211034_add_zerofill_to_settings', 1),
	(177, '2016_08_02_124944_add_color_to_statuslabel', 1),
	(178, '2016_08_04_134500_add_disallow_ldap_pw_sync_to_settings', 1),
	(179, '2016_08_09_002225_add_manufacturer_to_licenses', 1),
	(180, '2016_08_12_121613_add_manufacturer_to_accessories_table', 1),
	(181, '2016_08_23_143353_add_new_fields_to_custom_fields', 1),
	(182, '2016_08_23_145619_add_show_in_nav_to_status_labels', 1),
	(183, '2016_08_30_084634_make_purchase_cost_nullable', 1),
	(184, '2016_09_01_141051_add_requestable_to_asset_model', 1),
	(185, '2016_09_02_001448_create_checkout_requests_table', 1),
	(186, '2016_09_04_180400_create_actionlog_table', 1),
	(187, '2016_09_04_182149_migrate_asset_log_to_action_log', 1),
	(188, '2016_09_19_235935_fix_fieldtype_for_target_type', 1),
	(189, '2016_09_23_140722_fix_modelno_in_consumables_to_string', 1),
	(190, '2016_09_28_231359_add_company_to_logs', 1),
	(191, '2016_10_14_130709_fix_order_number_to_varchar', 1),
	(192, '2016_10_16_015024_rename_modelno_to_model_number', 1),
	(193, '2016_10_16_015211_rename_consumable_modelno_to_model_number', 1),
	(194, '2016_10_16_143235_rename_model_note_to_notes', 1),
	(195, '2016_10_16_165052_rename_component_total_qty_to_qty', 1),
	(196, '2016_10_19_145520_fix_order_number_in_components_to_string', 1),
	(197, '2016_10_27_151715_add_serial_to_components', 1),
	(198, '2016_10_27_213251_increase_serial_field_capacity', 1),
	(199, '2016_10_29_002724_enable_2fa_fields', 1),
	(200, '2016_10_29_082408_add_signature_to_acceptance', 1),
	(201, '2016_11_01_030818_fix_forgotten_filename_in_action_logs', 1),
	(202, '2016_11_13_020954_rename_component_serial_number_to_serial', 1),
	(203, '2016_11_16_172119_increase_purchase_cost_size', 1),
	(204, '2016_11_17_161317_longer_state_field_in_location', 1),
	(205, '2016_11_17_193706_add_model_number_to_accessories', 1),
	(206, '2016_11_24_160405_add_missing_target_type_to_logs_table', 1),
	(207, '2016_12_07_173720_increase_size_of_state_in_suppliers', 1),
	(208, '2016_12_19_004212_adjust_locale_length_to_10', 1),
	(209, '2016_12_19_133936_extend_phone_lengths_in_supplier_and_elsewhere', 1),
	(210, '2016_12_27_212631_make_asset_assigned_to_polymorphic', 1),
	(211, '2017_01_09_040429_create_locations_ldap_query_field', 1),
	(212, '2017_01_14_002418_create_imports_table', 1),
	(213, '2017_01_25_063357_fix_utf8_custom_field_column_names', 1),
	(214, '2017_03_03_154632_add_time_date_display_to_settings', 1),
	(215, '2017_03_10_210807_add_fields_to_manufacturer', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table snipeit.models
CREATE TABLE IF NOT EXISTS `models` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `depreciation_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `eol` int(11) DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deprecated_mac_address` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `fieldset_id` int(11) DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `requestable` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.models: ~9 rows (approximately)
/*!40000 ALTER TABLE `models` DISABLE KEYS */;
REPLACE INTO `models` (`id`, `name`, `model_number`, `manufacturer_id`, `category_id`, `created_at`, `updated_at`, `depreciation_id`, `user_id`, `eol`, `image`, `deprecated_mac_address`, `deleted_at`, `fieldset_id`, `notes`, `requestable`) VALUES
	(1, 'Macbook Pro 13"', '2380335043688064', 1, 1, '2019-01-22 12:24:33', '2019-01-22 12:24:33', 1, 1, 36, 'mbp.jpg', 0, NULL, NULL, 'Created by demo seeder', 0),
	(2, 'Macbook Air', '2666954801841874', 1, 1, '2019-01-22 12:24:33', '2019-01-22 12:24:33', 1, 1, 36, 'macbookair.jpg', 0, NULL, NULL, 'Created by demo seeder', 0),
	(3, 'Surface', '5117425000995330', 2, 1, '2019-01-22 12:24:33', '2019-01-22 12:24:33', 1, 1, 36, 'surface.jpg', 0, NULL, NULL, 'Created by demo seeder', 0),
	(4, 'XPS 13', '2481708051515601', 3, 1, '2019-01-22 12:24:33', '2019-01-22 12:24:33', 1, 1, 36, 'xps.jpg', 0, NULL, NULL, 'Created by demo seeder', 0),
	(5, 'Spectre', '4916995453178333', 5, 1, '2019-01-22 12:24:33', '2019-01-22 12:24:33', 1, 1, 36, 'spectre.jpg', 0, NULL, NULL, 'Created by demo seeder', 0),
	(6, 'ZenBook UX310', '2312441722457467', 4, 1, '2019-01-22 12:24:33', '2019-01-22 12:24:33', 1, 1, 36, 'zenbook.jpg', 0, NULL, NULL, 'Created by demo seeder', 0),
	(7, 'Yoga 910', '4929538503877', 6, 1, '2019-01-22 12:24:33', '2019-01-22 12:24:33', 1, 1, 36, 'yoga.png', 0, NULL, NULL, 'Created by demo seeder', 0),
	(22, 'Compaq B191', 'Compaq B191', 12, 2, '2019-01-31 11:41:22', '2019-01-31 11:41:22', 1, 59, 0, '819myvl4dml-sl1500-jpg.jpg', 0, NULL, NULL, '', 1),
	(23, 'Desktop', 'E2016H', 3, 2, '2019-01-31 12:31:21', '2019-01-31 12:31:21', NULL, 59, 0, '210-amiu-v2jpg.jpg', 0, NULL, NULL, '', 1);
/*!40000 ALTER TABLE `models` ENABLE KEYS */;

-- Dumping structure for table snipeit.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table snipeit.requested_assets
CREATE TABLE IF NOT EXISTS `requested_assets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `accepted_at` datetime DEFAULT NULL,
  `denied_at` datetime DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.requested_assets: ~0 rows (approximately)
/*!40000 ALTER TABLE `requested_assets` DISABLE KEYS */;
/*!40000 ALTER TABLE `requested_assets` ENABLE KEYS */;

-- Dumping structure for table snipeit.requests
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `asset_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `request_code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.requests: ~0 rows (approximately)
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `requests` ENABLE KEYS */;

-- Dumping structure for table snipeit.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `per_page` int(11) NOT NULL DEFAULT '20',
  `site_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Snipe IT Asset Management',
  `qr_code` int(11) DEFAULT NULL,
  `qr_text` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_asset_name` int(11) DEFAULT NULL,
  `display_checkout_date` int(11) DEFAULT NULL,
  `display_eol` int(11) DEFAULT NULL,
  `auto_increment_assets` int(11) NOT NULL DEFAULT '0',
  `auto_increment_prefix` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `load_remote` tinyint(1) NOT NULL DEFAULT '1',
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alert_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alerts_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `default_eula_text` longtext COLLATE utf8mb4_unicode_ci,
  `barcode_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'QRCODE',
  `slack_endpoint` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slack_channel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slack_botname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_css` text COLLATE utf8mb4_unicode_ci,
  `brand` tinyint(4) NOT NULL DEFAULT '1',
  `ldap_enabled` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ldap_server` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ldap_uname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ldap_pword` longtext COLLATE utf8mb4_unicode_ci,
  `ldap_basedn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ldap_filter` text COLLATE utf8mb4_unicode_ci,
  `ldap_username_field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'samaccountname',
  `ldap_lname_field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'sn',
  `ldap_fname_field` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'givenname',
  `ldap_auth_filter_query` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'uid=samaccountname',
  `ldap_version` int(11) DEFAULT '3',
  `ldap_active_flag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ldap_emp_num` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ldap_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_multiple_companies_support` tinyint(1) NOT NULL DEFAULT '0',
  `ldap_server_cert_ignore` tinyint(1) NOT NULL DEFAULT '0',
  `locale` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `labels_per_page` tinyint(4) NOT NULL DEFAULT '30',
  `labels_width` decimal(6,5) NOT NULL DEFAULT '2.62500',
  `labels_height` decimal(6,5) NOT NULL DEFAULT '1.00000',
  `labels_pmargin_left` decimal(6,5) NOT NULL DEFAULT '0.21975',
  `labels_pmargin_right` decimal(6,5) NOT NULL DEFAULT '0.21975',
  `labels_pmargin_top` decimal(6,5) NOT NULL DEFAULT '0.50000',
  `labels_pmargin_bottom` decimal(6,5) NOT NULL DEFAULT '0.50000',
  `labels_display_bgutter` decimal(6,5) NOT NULL DEFAULT '0.07000',
  `labels_display_sgutter` decimal(6,5) NOT NULL DEFAULT '0.05000',
  `labels_fontsize` tinyint(4) NOT NULL DEFAULT '9',
  `labels_pagewidth` decimal(7,5) NOT NULL DEFAULT '8.50000',
  `labels_pageheight` decimal(7,5) NOT NULL DEFAULT '11.00000',
  `labels_display_name` tinyint(4) NOT NULL DEFAULT '0',
  `labels_display_serial` tinyint(4) NOT NULL DEFAULT '1',
  `labels_display_tag` tinyint(4) NOT NULL DEFAULT '1',
  `alt_barcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'C128',
  `alt_barcode_enabled` tinyint(1) DEFAULT '1',
  `alert_interval` int(11) DEFAULT '30',
  `alert_threshold` int(11) DEFAULT '5',
  `email_domain` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_format` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'filastname',
  `username_format` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'filastname',
  `is_ad` tinyint(1) NOT NULL DEFAULT '0',
  `ad_domain` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ldap_port` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '389',
  `ldap_tls` tinyint(1) NOT NULL DEFAULT '0',
  `zerofill_count` int(11) NOT NULL DEFAULT '5',
  `ldap_pw_sync` tinyint(1) NOT NULL DEFAULT '1',
  `two_factor_enabled` tinyint(4) DEFAULT NULL,
  `require_accept_signature` tinyint(1) NOT NULL DEFAULT '0',
  `date_display_format` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y-m-d',
  `time_display_format` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'h:i A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.settings: ~1 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
REPLACE INTO `settings` (`id`, `created_at`, `updated_at`, `user_id`, `per_page`, `site_name`, `qr_code`, `qr_text`, `display_asset_name`, `display_checkout_date`, `display_eol`, `auto_increment_assets`, `auto_increment_prefix`, `load_remote`, `logo`, `header_color`, `alert_email`, `alerts_enabled`, `default_eula_text`, `barcode_type`, `slack_endpoint`, `slack_channel`, `slack_botname`, `default_currency`, `custom_css`, `brand`, `ldap_enabled`, `ldap_server`, `ldap_uname`, `ldap_pword`, `ldap_basedn`, `ldap_filter`, `ldap_username_field`, `ldap_lname_field`, `ldap_fname_field`, `ldap_auth_filter_query`, `ldap_version`, `ldap_active_flag`, `ldap_emp_num`, `ldap_email`, `full_multiple_companies_support`, `ldap_server_cert_ignore`, `locale`, `labels_per_page`, `labels_width`, `labels_height`, `labels_pmargin_left`, `labels_pmargin_right`, `labels_pmargin_top`, `labels_pmargin_bottom`, `labels_display_bgutter`, `labels_display_sgutter`, `labels_fontsize`, `labels_pagewidth`, `labels_pageheight`, `labels_display_name`, `labels_display_serial`, `labels_display_tag`, `alt_barcode`, `alt_barcode_enabled`, `alert_interval`, `alert_threshold`, `email_domain`, `email_format`, `username_format`, `is_ad`, `ad_domain`, `ldap_port`, `ldap_tls`, `zerofill_count`, `ldap_pw_sync`, `two_factor_enabled`, `require_accept_signature`, `date_display_format`, `time_display_format`) VALUES
	(1, '2019-01-04 10:45:32', '2019-01-31 12:33:27', 1, 20, 'Talent Takeaways Consulting India Pvt Ltd', NULL, NULL, NULL, NULL, NULL, 1, '', 1, 'logo.png', '', 'steephan22raj@gmail.com', 1, 'Electronics', 'QRCODE', NULL, NULL, NULL, 'INR', '', 3, NULL, NULL, NULL, NULL, NULL, NULL, 'samaccountname', 'sn', 'givenname', 'uid=samaccountname', 3, NULL, NULL, NULL, 1, 0, 'en', 30, 2.62500, 1.00000, 0.21975, 0.21975, 0.50000, 0.50000, 0.07000, 0.05000, 9, 8.50000, 11.00000, 0, 1, 1, 'C128', 1, 30, 5, 'gmail.com', 'filastname', 'filastname', 0, NULL, '389', 0, 5, 1, NULL, 0, 'Y-m-d', 'g:iA');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table snipeit.status_labels
CREATE TABLE IF NOT EXISTS `status_labels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deployable` tinyint(1) NOT NULL DEFAULT '0',
  `pending` tinyint(1) NOT NULL DEFAULT '0',
  `archived` tinyint(1) NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `color` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_in_nav` tinyint(1) NOT NULL DEFAULT '0',
  `default_label` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.status_labels: ~7 rows (approximately)
/*!40000 ALTER TABLE `status_labels` DISABLE KEYS */;
REPLACE INTO `status_labels` (`id`, `name`, `user_id`, `created_at`, `updated_at`, `deleted_at`, `deployable`, `pending`, `archived`, `notes`, `color`, `show_in_nav`, `default_label`) VALUES
	(1, 'Ready to Deploy', 1, '2012-07-11 01:15:49', '2016-09-18 09:04:01', NULL, 1, 0, 0, 'Quaerat dolorum quibusdam libero voluptas nam et quam voluptatibus.', NULL, 0, 0),
	(2, 'Pending', 1, '2008-09-17 18:08:18', '1990-08-30 02:40:33', NULL, 0, 1, 0, 'Neque ratione qui nisi quasi laudantium.', NULL, 0, 0),
	(3, 'Archived', 1, '1985-05-07 05:20:55', '1986-07-26 20:47:39', NULL, 0, 0, 1, 'These assets are permanently undeployable', NULL, 0, 0),
	(4, 'Out for Diagnostics', 1, '1993-10-15 05:20:35', '1973-01-29 23:46:57', NULL, 0, 0, 0, '', NULL, 0, 0),
	(5, 'Out for Repair', 1, '2006-01-08 01:18:09', '1996-07-17 14:18:52', NULL, 0, 0, 0, '', NULL, 0, 0),
	(6, 'Broken - Not Fixable', 1, '2012-11-21 21:59:25', '1986-01-20 16:21:02', NULL, 0, 0, 0, '', NULL, 0, 0),
	(7, 'Lost/Stolen', 1, '1993-09-20 01:19:23', '2016-12-22 08:18:31', NULL, 0, 0, 0, '', NULL, 0, 0);
/*!40000 ALTER TABLE `status_labels` ENABLE KEYS */;

-- Dumping structure for table snipeit.suppliers
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.suppliers: ~1 rows (approximately)
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
REPLACE INTO `suppliers` (`id`, `name`, `address`, `address2`, `city`, `state`, `country`, `phone`, `fax`, `email`, `contact`, `notes`, `created_at`, `updated_at`, `user_id`, `deleted_at`, `zip`, `url`, `image`) VALUES
	(1, 'Howell, Bosco and Marks', '1640 Hermina Turnpike Suite 220', 'Apt. 365', 'North Elliotfurt', 'MS', 'SO', '274.481.5487 x44680', '473-837-5761', 'ewindler@example.org', 'Sister Bartell', 'Aut iusto eos ipsum ut eveniet soluta. Nihil ut dolorum et illum. Rerum cupiditate minima rerum non voluptates id dignissimos.', '2019-01-22 12:24:33', '2019-01-22 12:24:33', NULL, NULL, '09283-7889', 'http://www.braun.biz/', NULL);
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;

-- Dumping structure for table snipeit.throttle
CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.throttle: ~0 rows (approximately)
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;
/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;

-- Dumping structure for table snipeit.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gravatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jobtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_id` int(11) DEFAULT NULL,
  `employee_num` text COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `company_id` int(10) unsigned DEFAULT NULL,
  `remember_token` text COLLATE utf8mb4_unicode_ci,
  `ldap_import` tinyint(1) NOT NULL DEFAULT '0',
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `show_in_list` tinyint(1) NOT NULL DEFAULT '1',
  `two_factor_secret` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_enrolled` tinyint(1) NOT NULL DEFAULT '0',
  `two_factor_optin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`, `deleted_at`, `website`, `country`, `gravatar`, `location_id`, `phone`, `jobtitle`, `manager_id`, `employee_num`, `avatar`, `username`, `notes`, `company_id`, `remember_token`, `ldap_import`, `locale`, `show_in_list`, `two_factor_secret`, `two_factor_enrolled`, `two_factor_optin`) VALUES
	(1, 'mallie.smitham@example.org', '$2y$10$.Brk/NpkhA5/k76QSAZZDuYzQu6uxSjKywPn8AGWDYaCqsCbjKC9m', '{"superuser":"1","admin":"0","reports.view":"0","assets.view":"0","assets.create":"0","assets.edit":"0","assets.delete":"0","assets.checkin":"0","assets.checkout":"0","assets.audit":"0","assets.view.requestable":"0","accessories.view":"0","accessories.create":"0","accessories.edit":"0","accessories.delete":"0","accessories.checkout":"0","accessories.checkin":"0","consumables.view":"0","consumables.create":"0","consumables.edit":"0","consumables.delete":"0","consumables.checkout":"0","licenses.view":"0","licenses.create":"0","licenses.edit":"0","licenses.delete":"0","licenses.checkout":"0","licenses.keys":"0","components.view":"0","components.create":"0","components.edit":"0","components.delete":"0","components.checkout":"0","components.checkin":"0","users.view":"0","users.create":"0","users.edit":"0","users.delete":"0","models.view":"0","models.create":"0","models.edit":"0","models.delete":"0","categories.view":"0","categories.create":"0","categories.edit":"0","categories.delete":"0","departments.view":"0","departments.create":"0","departments.edit":"0","departments.delete":"0","statuslabels.view":"0","statuslabels.create":"0","statuslabels.edit":"0","statuslabels.delete":"0","customfields.view":"0","customfields.create":"0","customfields.edit":"0","customfields.delete":"0","suppliers.view":"0","suppliers.create":"0","suppliers.edit":"0","suppliers.delete":"0","costcentres.view":"0","costcentres.create":"0","costcentres.edit":"0","costcentres.delete":"0","manufacturers.view":"0","manufacturers.create":"0","manufacturers.edit":"0","manufacturers.delete":"0","depreciations.view":"0","depreciations.create":"0","depreciations.edit":"0","depreciations.delete":"0","locations.view":"0","locations.create":"0","locations.edit":"0","locations.delete":"0","companies.view":"0","companies.create":"0","companies.edit":"0","companies.delete":"0","self.two_factor":"0","self.api":"0","self.edit_location":"0"}', 1, NULL, NULL, '2019-01-31 05:02:22', NULL, NULL, 'Admin', 'User', '2019-01-22 12:24:29', '2019-01-31 05:02:22', NULL, NULL, '', NULL, 2, '(505) 267-4740 x52153', 'Customer Service Representative', NULL, '23889', NULL, 'admin', 'Created by DB seeder', 2, 'ao42aNDdahrUB3FAqAiEgXZz23oxqFbX7X0L1DrHzfd2C00ClmIs0AVyjJYb', 0, '', 1, NULL, 0, 0),
	(2, 'snipe@snipe.net', '$2y$10$Qh6jbyJro0DlnVjOq4UsquzJxKragloY2LxjebN8x04DukGdxlPkm', '{"superuser":"1"}', 1, NULL, NULL, NULL, NULL, NULL, 'Snipe E.', 'Head', '2019-01-22 12:24:29', '2019-01-22 12:24:29', NULL, NULL, 'Jersey', NULL, 1, '1-538-791-8836 x67124', 'Compliance Officers', NULL, '4085', NULL, 'snipe', 'Created by DB seeder', 2, NULL, 0, 'de_AT', 1, NULL, 0, 0),
	(59, 'steephan22raj@gmail.com', '$2y$10$bp56861B2lzG4Brmxbyq8eiKcMe2a9PtQS3uzACylqoMJpNptVTuK', '{"superuser":"1","admin":"1","reports.view":"1","assets.view":"1","assets.create":"1","assets.edit":"1","assets.delete":"1","assets.checkin":"1","assets.checkout":"1","assets.audit":"1","assets.view.requestable":"1","accessories.view":"1","accessories.create":"1","accessories.edit":"1","accessories.delete":"1","accessories.checkout":"1","accessories.checkin":"1","consumables.view":"1","consumables.create":"1","consumables.edit":"1","consumables.delete":"1","consumables.checkout":"1","licenses.view":"1","licenses.create":"1","licenses.edit":"1","licenses.delete":"1","licenses.checkout":"1","licenses.keys":"1","components.view":"1","components.create":"1","components.edit":"1","components.delete":"1","components.checkout":"1","components.checkin":"1","users.view":"1","users.create":"1","users.edit":"1","users.delete":"1","models.view":"1","models.create":"1","models.edit":"1","models.delete":"1","categories.view":"1","categories.create":"1","categories.edit":"1","categories.delete":"1","departments.view":"1","departments.create":"1","departments.edit":"1","departments.delete":"1","statuslabels.view":"1","statuslabels.create":"1","statuslabels.edit":"1","statuslabels.delete":"1","customfields.view":"1","customfields.create":"1","customfields.edit":"1","customfields.delete":"1","suppliers.view":"1","suppliers.create":"1","suppliers.edit":"1","suppliers.delete":"1","costcentres.view":"1","costcentres.create":"1","costcentres.edit":"1","costcentres.delete":"1","manufacturers.view":"1","manufacturers.create":"1","manufacturers.edit":"1","manufacturers.delete":"1","depreciations.view":"1","depreciations.create":"1","depreciations.edit":"1","depreciations.delete":"1","locations.view":"1","locations.create":"1","locations.edit":"1","locations.delete":"1","companies.view":"1","companies.create":"1","companies.edit":"1","companies.delete":"1","self.two_factor":"1","self.api":"1","self.edit_location":"1"}', 1, NULL, NULL, '2019-01-31 05:33:17', NULL, NULL, 'steephanraj', 's', '2019-01-31 05:31:11', '2019-01-31 05:34:51', NULL, NULL, 'IN', NULL, NULL, '7200627637', 'admin', 2, 'Emp001', NULL, 'steephan', '', NULL, NULL, 0, 'en', 1, NULL, 0, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table snipeit.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table snipeit.users_groups: ~0 rows (approximately)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
