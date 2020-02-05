-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.28-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for cm
CREATE DATABASE IF NOT EXISTS `cm` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci */;
USE `cm`;

-- Dumping structure for table cm.additionals
CREATE TABLE IF NOT EXISTS `additionals` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CmID` int(10) unsigned NOT NULL,
  `FileName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `additionals_cmid_foreign` (`CmID`),
  CONSTRAINT `additionals_cmid_foreign` FOREIGN KEY (`CmID`) REFERENCES `cms` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.additionals: ~0 rows (approximately)
/*!40000 ALTER TABLE `additionals` DISABLE KEYS */;
/*!40000 ALTER TABLE `additionals` ENABLE KEYS */;

-- Dumping structure for table cm.authorizations
CREATE TABLE IF NOT EXISTS `authorizations` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.authorizations: ~0 rows (approximately)
/*!40000 ALTER TABLE `authorizations` DISABLE KEYS */;
/*!40000 ALTER TABLE `authorizations` ENABLE KEYS */;

-- Dumping structure for table cm.cms
CREATE TABLE IF NOT EXISTS `cms` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserID` bigint(20) unsigned NOT NULL,
  `ResponsibleUserID` int(10) unsigned DEFAULT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `TypeID` int(10) unsigned NOT NULL,
  `SystemID` int(10) unsigned NOT NULL,
  `SubSystemID` int(10) unsigned NOT NULL,
  `LevelID` int(10) unsigned NOT NULL,
  `PrecedenceID` int(10) unsigned NOT NULL,
  `StatID` int(10) unsigned NOT NULL,
  `Mail` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `cms_userid_foreign` (`UserID`),
  KEY `cms_typeid_foreign` (`TypeID`),
  KEY `cms_systemid_foreign` (`SystemID`),
  KEY `cms_subsystemid_foreign` (`SubSystemID`),
  KEY `cms_levelid_foreign` (`LevelID`),
  KEY `cms_precedenceid_foreign` (`PrecedenceID`),
  KEY `cms_statid_foreign` (`StatID`),
  CONSTRAINT `cms_levelid_foreign` FOREIGN KEY (`LevelID`) REFERENCES `levels` (`ID`),
  CONSTRAINT `cms_precedenceid_foreign` FOREIGN KEY (`PrecedenceID`) REFERENCES `precedences` (`ID`),
  CONSTRAINT `cms_statid_foreign` FOREIGN KEY (`StatID`) REFERENCES `stats` (`ID`),
  CONSTRAINT `cms_subsystemid_foreign` FOREIGN KEY (`SubSystemID`) REFERENCES `sub_systems` (`ID`),
  CONSTRAINT `cms_systemid_foreign` FOREIGN KEY (`SystemID`) REFERENCES `systems` (`ID`),
  CONSTRAINT `cms_typeid_foreign` FOREIGN KEY (`TypeID`) REFERENCES `types` (`ID`),
  CONSTRAINT `cms_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.cms: ~14 rows (approximately)
/*!40000 ALTER TABLE `cms` DISABLE KEYS */;
INSERT INTO `cms` (`ID`, `Title`, `UserID`, `ResponsibleUserID`, `Description`, `TypeID`, `SystemID`, `SubSystemID`, `LevelID`, `PrecedenceID`, `StatID`, `Mail`, `created_at`, `updated_at`) VALUES
	(1, 'Modül Hata', 1, NULL, 'Açıklama', 1, 1, 1, 1, 1, 1, NULL, '2020-02-04 22:59:54', '2020-02-04 22:59:55'),
	(2, 'Modül Hata', 1, NULL, 'Açıklama', 1, 1, 1, 1, 1, 1, NULL, '2020-02-04 22:59:57', '2020-02-04 22:59:56'),
	(3, 'Modül Hata', 1, NULL, 'Açıklama', 1, 1, 1, 1, 1, 3, NULL, '2020-02-04 22:59:58', '2020-02-04 22:59:59'),
	(4, 'Modül Hata', 1, NULL, 'Açıklama', 2, 1, 1, 1, 1, 1, NULL, '2020-02-04 23:00:00', '2020-02-04 23:00:00'),
	(5, 'Modül Hata', 1, NULL, 'Açıklama', 2, 1, 1, 1, 1, 1, NULL, '2020-02-04 23:00:20', '2020-02-04 23:00:01'),
	(22, 'Modül Hata', 1, NULL, 'Açıklama', 1, 1, 1, 1, 1, 1, NULL, '2020-02-04 23:00:20', '2020-02-04 23:00:01'),
	(23, 'Modül Hata', 1, NULL, 'Açıklama', 1, 1, 1, 1, 1, 1, NULL, '2020-02-04 23:00:20', '2020-02-04 23:00:01'),
	(24, 'Modül Hata', 1, NULL, 'Açıklama', 1, 1, 1, 1, 1, 1, NULL, '2020-02-04 23:00:20', '2020-02-04 23:00:01'),
	(25, 'Modül Hata', 1, NULL, 'Açıklama', 2, 1, 1, 1, 1, 2, NULL, '2020-02-04 23:00:20', '2020-02-04 23:00:01'),
	(26, 'Modül Hata', 1, NULL, 'Açıklama', 1, 1, 1, 1, 1, 1, NULL, '2020-02-04 23:00:20', '2020-02-04 23:00:01'),
	(27, 'Modül Hata', 1, NULL, 'Açıklama', 2, 1, 1, 1, 1, 1, NULL, '2020-02-04 23:00:20', '2020-02-04 23:00:01'),
	(28, 'Modül Hata', 1, NULL, 'Açıklama', 1, 1, 1, 1, 1, 1, NULL, '2020-02-04 23:00:20', '2020-02-04 23:00:01'),
	(29, 'Modül Hata', 1, NULL, 'Açıklama', 1, 1, 1, 1, 1, 1, NULL, '2020-02-04 23:00:20', '2020-02-04 23:00:01'),
	(32, 'Test Başlık', 1, NULL, 'Test Açıklama', 2, 1, 2, 2, 2, 1, NULL, '2020-02-04 20:16:04', '2020-02-04 20:16:04');
/*!40000 ALTER TABLE `cms` ENABLE KEYS */;

-- Dumping structure for table cm.levels
CREATE TABLE IF NOT EXISTS `levels` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.levels: ~2 rows (approximately)
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` (`ID`, `Name`) VALUES
	(1, 'Normal'),
	(2, 'Kritik');
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;

-- Dumping structure for table cm.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.migrations: ~12 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(45, '2014_10_12_000000_create_users_table', 1),
	(46, '2014_10_12_100000_create_password_resets_table', 1),
	(47, '2020_01_27_183113_create_types_table', 1),
	(48, '2020_01_27_183137_create_systems_table', 1),
	(49, '2020_01_27_183152_create_sub_systems_table', 1),
	(50, '2020_01_27_183209_create_levels_table', 1),
	(51, '2020_01_27_183234_create_precedences_table', 1),
	(52, '2020_01_27_183300_create_cms_table', 1),
	(53, '2020_01_27_183317_create_additionals_table', 1),
	(54, '2020_01_27_183356_create_authorizations_table', 1),
	(55, '2020_01_27_183421_create_user_authorizations_table', 1),
	(56, '2020_02_04_185037_create_stats_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table cm.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table cm.precedences
CREATE TABLE IF NOT EXISTS `precedences` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Badge` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.precedences: ~2 rows (approximately)
/*!40000 ALTER TABLE `precedences` DISABLE KEYS */;
INSERT INTO `precedences` (`ID`, `Name`, `Badge`) VALUES
	(1, 'Düşük', 'secondary'),
	(2, 'Normal', 'primary');
/*!40000 ALTER TABLE `precedences` ENABLE KEYS */;

-- Dumping structure for table cm.stats
CREATE TABLE IF NOT EXISTS `stats` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Badge` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.stats: ~3 rows (approximately)
/*!40000 ALTER TABLE `stats` DISABLE KEYS */;
INSERT INTO `stats` (`ID`, `Name`, `Badge`) VALUES
	(1, 'Açık', 'success'),
	(2, 'Kapalı', 'secondary'),
	(3, 'İncelendi', 'info');
/*!40000 ALTER TABLE `stats` ENABLE KEYS */;

-- Dumping structure for table cm.sub_systems
CREATE TABLE IF NOT EXISTS `sub_systems` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `SystemID` int(10) unsigned NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `sub_systems_systemid_foreign` (`SystemID`),
  CONSTRAINT `sub_systems_systemid_foreign` FOREIGN KEY (`SystemID`) REFERENCES `systems` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.sub_systems: ~3 rows (approximately)
/*!40000 ALTER TABLE `sub_systems` DISABLE KEYS */;
INSERT INTO `sub_systems` (`ID`, `SystemID`, `Name`) VALUES
	(1, 1, 'Ruhsat'),
	(2, 1, 'İmar'),
	(3, 2, 'Satın Alma');
/*!40000 ALTER TABLE `sub_systems` ENABLE KEYS */;

-- Dumping structure for table cm.systems
CREATE TABLE IF NOT EXISTS `systems` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.systems: ~2 rows (approximately)
/*!40000 ALTER TABLE `systems` DISABLE KEYS */;
INSERT INTO `systems` (`ID`, `Name`) VALUES
	(1, 'GG'),
	(2, 'Gazi Emir');
/*!40000 ALTER TABLE `systems` ENABLE KEYS */;

-- Dumping structure for table cm.types
CREATE TABLE IF NOT EXISTS `types` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.types: ~2 rows (approximately)
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`ID`, `Name`) VALUES
	(1, 'Hata'),
	(2, 'Değişiklik');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;

-- Dumping structure for table cm.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Yazılım Destek', 'y.emecen@gmail.com', NULL, '$2y$10$VqGFsDIJigAwU0UfeuPBnepwb6xI60uju.SiF1pFKXFnXIIp1eLC2', NULL, '2020-02-05 22:56:01', '2020-02-05 22:56:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table cm.user_authorizations
CREATE TABLE IF NOT EXISTS `user_authorizations` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UserID` bigint(20) unsigned NOT NULL,
  `AuthorizationID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `user_authorizations_userid_foreign` (`UserID`),
  KEY `user_authorizations_authorizationid_foreign` (`AuthorizationID`),
  CONSTRAINT `user_authorizations_authorizationid_foreign` FOREIGN KEY (`AuthorizationID`) REFERENCES `authorizations` (`ID`),
  CONSTRAINT `user_authorizations_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.user_authorizations: ~0 rows (approximately)
/*!40000 ALTER TABLE `user_authorizations` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_authorizations` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
