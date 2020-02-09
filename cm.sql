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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.cms: ~10 rows (approximately)
/*!40000 ALTER TABLE `cms` DISABLE KEYS */;
INSERT INTO `cms` (`ID`, `Title`, `UserID`, `ResponsibleUserID`, `Description`, `TypeID`, `SystemID`, `SubSystemID`, `LevelID`, `PrecedenceID`, `StatID`, `Mail`, `created_at`, `updated_at`) VALUES
	(1, 'Modül Hata', 1, NULL, 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', 1, 1, 1, 1, 1, 1, NULL, '2020-02-04 22:59:54', '2020-02-04 22:59:55'),
	(2, 'Modül Hata', 1, NULL, 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', 1, 1, 1, 1, 1, 1, NULL, '2020-02-04 22:59:57', '2020-02-04 22:59:56'),
	(3, 'Modül Hata', 1, NULL, 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', 1, 1, 1, 1, 1, 3, NULL, '2020-02-04 22:59:58', '2020-02-04 22:59:59'),
	(4, 'Modül Hata', 1, NULL, 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', 2, 1, 1, 1, 1, 1, NULL, '2020-02-04 23:00:00', '2020-02-04 23:00:00'),
	(5, 'Modül Hata', 1, NULL, 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', 2, 1, 1, 1, 1, 1, NULL, '2020-02-04 23:00:20', '2020-02-04 23:00:01'),
	(22, 'Modül Hata', 1, NULL, 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', 1, 1, 1, 1, 1, 1, NULL, '2020-02-04 23:00:20', '2020-02-04 23:00:01'),
	(23, 'Modül Hata', 1, NULL, 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', 1, 1, 1, 1, 1, 1, NULL, '2020-02-04 23:00:20', '2020-02-04 23:00:01'),
	(32, 'Test Başlık', 1, NULL, 'Test Açıklama', 2, 1, 2, 2, 2, 1, NULL, '2020-02-04 20:16:04', '2020-02-04 20:16:04'),
	(33, 'sorumlu test', 4, 4, 'sorumlu test', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 13:31:33', '2020-02-09 13:31:33'),
	(34, 'sorumlu test 2', 4, 3, 'sorumlu test 2', 1, 1, 2, 1, 1, 1, NULL, '2020-02-09 13:32:47', '2020-02-09 16:53:19');
/*!40000 ALTER TABLE `cms` ENABLE KEYS */;

-- Dumping structure for table cm.cm_details
CREATE TABLE IF NOT EXISTS `cm_details` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CmID` int(10) unsigned NOT NULL,
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
  KEY `cm_details_cmid_foreign` (`CmID`),
  KEY `cm_details_userid_foreign` (`UserID`),
  KEY `cm_details_typeid_foreign` (`TypeID`),
  KEY `cm_details_systemid_foreign` (`SystemID`),
  KEY `cm_details_subsystemid_foreign` (`SubSystemID`),
  KEY `cm_details_levelid_foreign` (`LevelID`),
  KEY `cm_details_precedenceid_foreign` (`PrecedenceID`),
  KEY `cm_details_statid_foreign` (`StatID`),
  CONSTRAINT `cm_details_cmid_foreign` FOREIGN KEY (`CmID`) REFERENCES `cms` (`ID`),
  CONSTRAINT `cm_details_levelid_foreign` FOREIGN KEY (`LevelID`) REFERENCES `levels` (`ID`),
  CONSTRAINT `cm_details_precedenceid_foreign` FOREIGN KEY (`PrecedenceID`) REFERENCES `precedences` (`ID`),
  CONSTRAINT `cm_details_statid_foreign` FOREIGN KEY (`StatID`) REFERENCES `stats` (`ID`),
  CONSTRAINT `cm_details_subsystemid_foreign` FOREIGN KEY (`SubSystemID`) REFERENCES `sub_systems` (`ID`),
  CONSTRAINT `cm_details_systemid_foreign` FOREIGN KEY (`SystemID`) REFERENCES `systems` (`ID`),
  CONSTRAINT `cm_details_typeid_foreign` FOREIGN KEY (`TypeID`) REFERENCES `types` (`ID`),
  CONSTRAINT `cm_details_userid_foreign` FOREIGN KEY (`UserID`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.cm_details: ~36 rows (approximately)
/*!40000 ALTER TABLE `cm_details` DISABLE KEYS */;
INSERT INTO `cm_details` (`ID`, `CmID`, `Title`, `UserID`, `ResponsibleUserID`, `Description`, `TypeID`, `SystemID`, `SubSystemID`, `LevelID`, `PrecedenceID`, `StatID`, `Mail`, `created_at`, `updated_at`) VALUES
	(1, 1, 'detaydetaydetaydetaydetaydetaydetaydetaydetaydetaydetay detaydetaydetaydetay detay detaydetay', 1, NULL, 'detay', 2, 1, 1, 1, 1, 1, NULL, '2020-02-06 19:40:37', '2020-02-06 19:40:38'),
	(2, 1, 'detaydetaydetaydetaydetaydetaydetaydetaydetay', 1, NULL, 'detay', 2, 1, 1, 1, 1, 1, NULL, '2020-02-06 19:40:39', '2020-02-06 19:40:38'),
	(3, 1, 'detay deneme kayıt', 1, NULL, 'detay deneme kayıt', 1, 1, 1, 1, 1, 1, NULL, '2020-02-08 23:21:23', '2020-02-08 23:21:23'),
	(4, 1, 'detay deneme kayıt', 1, NULL, 'detay deneme kayıt', 1, 1, 1, 1, 1, 1, NULL, '2020-02-08 23:21:34', '2020-02-08 23:21:34'),
	(5, 4, 'rtyurtyurtyu', 1, NULL, 'tryu', 1, 1, 1, 1, 1, 1, NULL, '2020-02-08 23:22:12', '2020-02-08 23:22:12'),
	(6, 4, 'rtyurtyurtyu', 1, NULL, 'tryu', 1, 1, 1, 1, 1, 1, NULL, '2020-02-08 23:22:26', '2020-02-08 23:22:26'),
	(7, 5, '5 cm', 1, NULL, '5 cma açıklama', 1, 1, 1, 1, 1, 1, NULL, '2020-02-08 23:23:07', '2020-02-08 23:23:07'),
	(8, 34, 'sorumlu test 3', 4, 2, 'sorumlu test 3', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 14:23:56', '2020-02-09 14:23:56'),
	(9, 34, 'sorumlu test 4', 4, 3, 'sorumlu test 4', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 14:25:02', '2020-02-09 14:25:02'),
	(10, 34, 'sorumlu test 5', 4, 3, 'sorumlu test 5', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 14:25:48', '2020-02-09 14:25:48'),
	(11, 34, 'sorumlu test 6', 4, 3, 'sorumlu test 6', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 14:40:49', '2020-02-09 14:40:49'),
	(12, 34, 'sorumlu test 7', 4, 3, 'sorumlu test 7', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 14:42:09', '2020-02-09 14:42:09'),
	(13, 34, 'sorumlu test 8', 4, 3, 'sorumlu test 8', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 14:46:24', '2020-02-09 14:46:24'),
	(14, 34, 'sorumlu test 9', 4, 3, 'sorumlu test 9', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 14:46:59', '2020-02-09 14:46:59'),
	(15, 34, '10', 4, 3, '10', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 14:48:23', '2020-02-09 14:48:23'),
	(16, 34, '11', 4, 1, '11', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 14:48:39', '2020-02-09 14:48:39'),
	(17, 34, '12', 4, 1, '12', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 14:51:13', '2020-02-09 14:51:13'),
	(18, 34, '13', 4, 3, '13', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 14:52:05', '2020-02-09 14:52:05'),
	(19, 34, '14', 4, 1, '14', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 15:24:36', '2020-02-09 15:24:36'),
	(20, 34, '15', 4, 1, '15', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 15:29:47', '2020-02-09 15:29:47'),
	(21, 34, '15', 4, 1, '15', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 15:30:10', '2020-02-09 15:30:10'),
	(22, 34, '16', 4, 3, '16', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 15:30:27', '2020-02-09 15:30:27'),
	(23, 34, '17', 4, 3, '17', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 15:36:36', '2020-02-09 15:36:36'),
	(24, 34, '18', 4, 3, '18', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 15:36:59', '2020-02-09 15:36:59'),
	(25, 34, '19', 4, 1, '19', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 15:39:49', '2020-02-09 15:39:49'),
	(26, 34, '20', 4, 3, '20', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 15:39:59', '2020-02-09 15:39:59'),
	(27, 34, '21', 4, 3, '21', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 15:42:02', '2020-02-09 15:42:02'),
	(28, 34, '22', 4, 3, '22', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 15:49:23', '2020-02-09 15:49:23'),
	(29, 34, '23', 4, 3, '23', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 15:51:35', '2020-02-09 15:51:35'),
	(30, 34, '24', 4, 3, '24', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 15:53:20', '2020-02-09 15:53:20'),
	(31, 34, '25', 4, 3, '25', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 15:55:24', '2020-02-09 15:55:24'),
	(32, 34, '26', 4, 3, '26', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 15:56:23', '2020-02-09 15:56:23'),
	(33, 34, '27', 4, 3, '27', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 16:05:56', '2020-02-09 16:05:56'),
	(34, 34, '28', 4, 3, '28', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 16:09:50', '2020-02-09 16:09:50'),
	(35, 34, '29', 4, 3, '29', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 16:12:38', '2020-02-09 16:12:38'),
	(36, 34, '30', 4, 3, '30', 1, 1, 1, 1, 1, 1, NULL, '2020-02-09 16:53:19', '2020-02-09 16:53:19');
/*!40000 ALTER TABLE `cm_details` ENABLE KEYS */;

-- Dumping structure for table cm.cm_detail_additionals
CREATE TABLE IF NOT EXISTS `cm_detail_additionals` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CmDetailID` int(10) unsigned NOT NULL,
  `FileName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `cm_detail_additionals_cmdetailid_foreign` (`CmDetailID`),
  CONSTRAINT `cm_detail_additionals_cmdetailid_foreign` FOREIGN KEY (`CmDetailID`) REFERENCES `cm_details` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.cm_detail_additionals: ~0 rows (approximately)
/*!40000 ALTER TABLE `cm_detail_additionals` DISABLE KEYS */;
/*!40000 ALTER TABLE `cm_detail_additionals` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.migrations: ~14 rows (approximately)
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
	(56, '2020_02_04_185037_create_stats_table', 1),
	(57, '2020_02_06_053946_create_cm_details_table', 2),
	(58, '2020_02_06_054030_create_cm_detail_additionals_table', 2);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.stats: ~5 rows (approximately)
/*!40000 ALTER TABLE `stats` DISABLE KEYS */;
INSERT INTO `stats` (`ID`, `Name`, `Badge`) VALUES
	(1, 'Oluşturuldu', 'success'),
	(2, 'Kapalı', 'secondary'),
	(3, 'İncelendi', 'info'),
	(4, 'Yapıldı', 'info'),
	(5, 'Yayınladı', 'danger');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table cm.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Yazılım Destek', 'y.emecen@gmail.com', NULL, '$2y$10$VqGFsDIJigAwU0UfeuPBnepwb6xI60uju.SiF1pFKXFnXIIp1eLC2', NULL, '2020-02-05 22:56:01', '2020-02-05 22:56:03'),
	(2, 'Yazılım Destek 2', 'y.emecen2@gmail.com', NULL, '$2y$10$VqGFsDIJigAwU0UfeuPBnepwb6xI60uju.SiF1pFKXFnXIIp1eLC2', NULL, '2020-02-05 22:56:01', '2020-02-05 22:56:03'),
	(3, 'Yazılım Destek 3', 'y.emecen3@gmail.com', NULL, '$2y$10$VqGFsDIJigAwU0UfeuPBnepwb6xI60uju.SiF1pFKXFnXIIp1eLC2', NULL, '2020-02-05 22:56:01', '2020-02-05 22:56:03'),
	(4, 'yasinyandex', 'emecan.yasin@yandex.com', NULL, '$2y$10$gXnGKo4WA8fQ5npBYKbdLudHr2LCpwHJkwqQpcHxQKN1ou23hJh5S', NULL, '2020-02-09 13:18:05', '2020-02-09 13:18:05');
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
