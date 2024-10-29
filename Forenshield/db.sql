-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.39 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for forenshield
CREATE DATABASE IF NOT EXISTS `forenshield` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `forenshield`;

-- Dumping structure for table forenshield.attachments
CREATE TABLE IF NOT EXISTS `attachments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `crime_scene` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.attachments: ~1 rows (approximately)
INSERT INTO `attachments` (`id`, `name`, `description`, `path`, `crime_scene`, `created_at`, `updated_at`) VALUES
	(1, 'attachment 1', NULL, 'attachments/iOw19g1H9tuMFhPFWE5PJDSLWmL1Jrz68Jy721ub.pdf', 2, '2024-10-08 10:50:31', '2024-10-08 10:50:31'),
	(2, 'image', NULL, 'attachments/5BKGuAoiph0iAlx8V8dUnPTHpTRLyY4AJfM8SpWo.jpg', 2, '2024-10-08 10:54:30', '2024-10-08 10:54:30'),
	(3, 'file', NULL, 'attachments/NEESi7rsCQD8YEpK3Df4JO13CWwTBmEAo0U0UmP5.zip', 2, '2024-10-08 10:55:30', '2024-10-08 10:55:30');

-- Dumping structure for table forenshield.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.cache: ~0 rows (approximately)

-- Dumping structure for table forenshield.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.cache_locks: ~0 rows (approximately)

-- Dumping structure for table forenshield.crime_scenes
CREATE TABLE IF NOT EXISTS `crime_scenes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.crime_scenes: ~1 rows (approximately)
INSERT INTO `crime_scenes` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Crime1', NULL, '2024-10-08 09:03:50', '2024-10-08 09:18:17'),
	(2, 'Crime1', NULL, '2024-10-08 09:05:05', '2024-10-08 09:05:05'),
	(3, 'sdsdsd', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-10-08 09:14:13', '2024-10-08 09:40:59');

-- Dumping structure for table forenshield.crime_scene_investigators
CREATE TABLE IF NOT EXISTS `crime_scene_investigators` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `crime_scene` bigint unsigned NOT NULL,
  `investigator` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.crime_scene_investigators: ~0 rows (approximately)
INSERT INTO `crime_scene_investigators` (`id`, `crime_scene`, `investigator`, `created_at`, `updated_at`) VALUES
	(1, 2, 4, '2024-10-08 09:05:05', '2024-10-08 09:05:05'),
	(2, 3, 5, '2024-10-08 09:14:13', '2024-10-08 09:14:13'),
	(3, 3, 4, '2024-10-08 09:16:35', '2024-10-08 09:16:35'),
	(4, 1, 5, '2024-10-08 09:18:17', '2024-10-08 09:18:17'),
	(5, 3, 5, '2024-10-08 09:40:59', '2024-10-08 09:40:59');

-- Dumping structure for table forenshield.data1s
CREATE TABLE IF NOT EXISTS `data1s` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temperature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `humidity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.data1s: ~1 rows (approximately)
INSERT INTO `data1s` (`id`, `pir`, `temperature`, `humidity`, `gas`, `created_at`, `updated_at`) VALUES
	(1, 'eyJpdiI6IjdkR1hhVGk0dmUzVWtwYVl3cENsVVE9PSIsInZhbHVlIjoiZldqaUJjSnAvT28vVkl3ZTdxenphdz09IiwibWFjIjoiODIxMzE3N2VmMGE4NGVhNmM3ZWY2NWExZmY3ZDRhYTUwYTVkMGJlNmU3MjgyZmI1M2UzYTRmMzJmNWY2YmE3NCIsInRhZyI6IiJ9', 'eyJpdiI6Ik4wUFJDN05IOTFHWG5xVHdGU0pldmc9PSIsInZhbHVlIjoiNmkzcHcrMllMOUd5RjBKanZHVlRrQT09IiwibWFjIjoiNWVlYWJiZTJmYjgxYWQ1NDMxYWJlZmQzOTc1YjI4NWQyOGExY2M1MmIxNjQ4OGZmM2NlNTI1NDI3N2U3ZDZlZiIsInRhZyI6IiJ9', 'eyJpdiI6Inp2TnhDRUxYbVJubzBja2Q4NnZ5bVE9PSIsInZhbHVlIjoiN2g1b1U3alAxbXNUVTM3MTVxSmtCQT09IiwibWFjIjoiMTU2MDA2YjNkMzFlNWRkZWE3OWZiMGZhMzhiNDI3ZTBiNzcxOTg0ZWRhNTE5ZDg3N2Y5YjIyZjhmYWI4ZDE1OCIsInRhZyI6IiJ9', 'eyJpdiI6IkoxMDVmeVI2bWdqLzdiYUM2WWdwcnc9PSIsInZhbHVlIjoidklMNkNQZ2M1WCtnMnU0Z1RvbmI0UT09IiwibWFjIjoiNDExNDA0MjE1ZDNlYzhjODYwOTFjMzcyNzM3MGYwZGNjYzVkMWMwYmQ4NTQzOGVhZTYwMzQ5NDBkMzMwMWU5OSIsInRhZyI6IiJ9', '2024-10-08 11:18:05', '2024-10-08 11:18:05'),
	(2, 'eyJpdiI6Ikp5WDdXL0RsQUFUZFUza0EzKys0WUE9PSIsInZhbHVlIjoiRjhGREFROW9jQkF0T1p2S2J6L3g4Zz09IiwibWFjIjoiNzEwNDhiOTBkNTYyNmZkMDg5OThlOTY4YTkwY2ViOWI5MTFlYzNjOGYxODFmNTlkMmFiODBlN2Q0OTU5YjZlNSIsInRhZyI6IiJ9', 'eyJpdiI6ImZOVG5kVldMbmJmM3FPRnBPeEJrcHc9PSIsInZhbHVlIjoiVnc4TDVXNkgvSVlRR25xRHA2elIzdz09IiwibWFjIjoiZTljMWNhZTUyY2I5N2IxZjBlMjlhMDM2YjQ4YzhmZGNjZGM3YTAzMzg4NjNkZmI5ZDYzNWYwZTQwM2NmOGY1MiIsInRhZyI6IiJ9', 'eyJpdiI6IithNENOeTVYZWdKdlgyOEtjdFFFS3c9PSIsInZhbHVlIjoiOTVudFljRTR6OXk4ak1oNUpBdi9qUT09IiwibWFjIjoiODkyODczMmRlYjJjNzY3ZTM4YTVlMTM5MDQ5Njc0YTllN2JhYmI2NGQxYmUyNTkzOTQ5ZDA2NzE5ZTIxOTNlMCIsInRhZyI6IiJ9', 'eyJpdiI6ImRnQ1NiRllUcEg4WkNPdUlOME9IL0E9PSIsInZhbHVlIjoiR3FjbXNqdEllcitBMUNGWjRZOFFhZz09IiwibWFjIjoiMjk4NDVmMmEzNWUwZmQyMzQ0YzkzNmY3YjA0Nzc2ZjFjMzU1Y2IwNGY0N2IyNGI0ZjlhMmQ5NDIyM2UxNzg1YiIsInRhZyI6IiJ9', '2024-10-08 11:59:36', '2024-10-08 11:59:36'),
	(3, 'eyJpdiI6IjJTd003WHRwRVFjcFg2RDNLekRiRWc9PSIsInZhbHVlIjoicDQ3Kzl4UVdBU09OeWNuaDdLQk8yZz09IiwibWFjIjoiMzEwYTA0ZDEyMTMzNjAxZTQwNWQ2NzE2YzNmYmJhOWZiMGEyZDkzN2NjNjhjM2U3MGM3NGU0MjhmOTA1MTYyZiIsInRhZyI6IiJ9', 'eyJpdiI6IkFySE5ibldPdGNvSThQU2NuVVNIbVE9PSIsInZhbHVlIjoiM0hHSkIvUXRkcmdnY0R3V1JRSE9wQT09IiwibWFjIjoiOWY0N2IxMDViNGVhMzU2ODdiNzdmZjQ3YjYzMGIyMzg4NzVmMzQyMTk2OGYxZWYyNGE3MzdmYjY2YzA4NDBkMCIsInRhZyI6IiJ9', 'eyJpdiI6IllxLzdHS3ovdU9ucmVQSlM3d1FIVWc9PSIsInZhbHVlIjoiWTcySGU5b1p6aWdvci9lU2VtdTJlZz09IiwibWFjIjoiNTg1MzlkY2FkZDRlZjUyMzRjMTA2YzUzYjE5ZTM4OTg5NmRiNzFkY2E3OWFiYzRlOTdkZGZmNDc5M2NlMWE1YyIsInRhZyI6IiJ9', 'eyJpdiI6IkFEVkFYa29HdDY2dXd2UXBTbzZVS1E9PSIsInZhbHVlIjoiQkN1YThBWGpFUUVLeDUyNGx1aFdCUT09IiwibWFjIjoiNmIzYjdjMWY4Mjg5NGNjZjgwMWMyMjQ2OTcyZjI3ODEzYTE3MWYwN2M5NWUzOGZhOWUxNjkzMTM1NzNlMWU2YSIsInRhZyI6IiJ9', '2024-10-08 11:59:56', '2024-10-08 11:59:56'),
	(4, 'eyJpdiI6IkphQVNpS1ZPdWFMclA0WDZ3UnM5cnc9PSIsInZhbHVlIjoiNVlEZ1FjUDlTQU82bXdOWXhOQ3NBQT09IiwibWFjIjoiMTEyMWEyZDllZmNiZmU1ZDIwOThiMjA0OGZjYjIyMjcyZGQ3NmI1NzY1YzlhZjc3MWI3ZGEzMzFlNjhmMWY0MyIsInRhZyI6IiJ9', 'eyJpdiI6IitiVEV3bUE2M21tV2dGTmJjWVVRSXc9PSIsInZhbHVlIjoiY1FtZ0I0d1JqMzdDcnZzaEVwcmNOdz09IiwibWFjIjoiNWQ5MWMyYjk4ZWJjNGRiYWZmZWQxY2U0M2E3MTg3Njg0MTJjYzNmMTQ0NmUyZDc1NDUxZmRlOGNlM2E0ZWE1MiIsInRhZyI6IiJ9', 'eyJpdiI6IjhGUDJmZFBFRHdMTnpBQjNzR1hINHc9PSIsInZhbHVlIjoiSkVnR1Q1RE03ODJqOUgxenNaUE9LUT09IiwibWFjIjoiZTkxNjRiNDFiMzNlMTFmMTU5MWQyZDliZjVkZmZjZTFjYTFiMDUwMDFjYWJlNDk0OWQ5ZmM5OTA0ZjhjNDZmOCIsInRhZyI6IiJ9', 'eyJpdiI6Ii9peUZXcUNaWUNZQkFkUncrZGFPcEE9PSIsInZhbHVlIjoiUWc1bzErN3ZPYXlOaTJXNmFqT2dZZz09IiwibWFjIjoiM2M5MTE2NzA1MjcyNzQzODQ1MTFlODAzNDVhNWVkZjgzZmJhN2Q1Zjk5NzhiMDM1NzA1Y2ZhOTg4MDAwYTM4ZSIsInRhZyI6IiJ9', '2024-10-08 12:01:00', '2024-10-08 12:01:00'),
	(5, 'eyJpdiI6IlRRakFaeWdvUmxkUExMZi9MZzI2N1E9PSIsInZhbHVlIjoiRUlJVUxJL0dSdFRnRFJiU2g3TkJmZz09IiwibWFjIjoiODdjMWUzMGQwNzcyZDQ0YzYzNDlhMDQyNGU2MmY0YTNjYTZhMzRjNTJjYzExZmQyOGI4M2JmMTRmZGUzMDYxYiIsInRhZyI6IiJ9', 'eyJpdiI6ImIyNDQ4TEp1SVZVNWpFaGlCNnlZMHc9PSIsInZhbHVlIjoiZUwrUUhlZTgyS0RqankrL3FlMXMwQT09IiwibWFjIjoiZWI1OTVhNTYwMmU2NWYxODY2N2RiOTZhODUwMDNhNzk0NmI5ZWYzMzQ1ZWIzMTA2NDJkY2I3NzNiMTNiN2NmNCIsInRhZyI6IiJ9', 'eyJpdiI6IktKZ1hCcW5vUXNuNjVjcVYrSVRJYWc9PSIsInZhbHVlIjoiNlh6VDZDcDRiK24wcWl2c2w3WVE4UT09IiwibWFjIjoiY2QwMWUwNTY0NDU5MWNmYWQzMzhmZjRkZTFjZGVmYjQ0OGZjMzZiOWJkNjIwMWQ2NjI3YmViNjVjNTdiYzE2MSIsInRhZyI6IiJ9', 'eyJpdiI6IkI3T254UHNmbXlSdW5OU3hkYWV5Tmc9PSIsInZhbHVlIjoieWRzdWRrUEVtVVMvNEJiekplUmR0UT09IiwibWFjIjoiMjZlMWExNzI2YTE2ODhlZTRkZDFkMmQ0NDUxMjNlOTBlZDdiOTFiM2Q1NjcwMDQ5MjBlYTEwZjljNzgwYmU3MyIsInRhZyI6IiJ9', '2024-10-08 12:33:28', '2024-10-08 12:33:28');

-- Dumping structure for table forenshield.document_analytics
CREATE TABLE IF NOT EXISTS `document_analytics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `crime_scene` bigint unsigned NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.document_analytics: ~1 rows (approximately)
INSERT INTO `document_analytics` (`id`, `crime_scene`, `file`, `result`, `percentage`, `created_at`, `updated_at`) VALUES
	(1, 3, 'analytics/logo.jpg', '75', '80', '2024-10-08 13:28:06', '2024-10-08 13:28:06');

-- Dumping structure for table forenshield.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table forenshield.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.jobs: ~0 rows (approximately)

-- Dumping structure for table forenshield.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.job_batches: ~0 rows (approximately)

-- Dumping structure for table forenshield.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_10_08_141724_create_crime_scenes_table', 2),
	(5, '2024_10_08_141847_create_crime_scene_investigators_table', 2),
	(9, '2024_10_08_160233_create_attachments_table', 3),
	(11, '2024_10_08_163415_create_data1s_table', 4),
	(12, '2024_10_08_174111_create_raw_histories_table', 5),
	(13, '2024_10_08_182942_create_router_analytics_table', 6),
	(15, '2024_10_08_185036_create_document_analytics_table', 7);

-- Dumping structure for table forenshield.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table forenshield.raw_histories
CREATE TABLE IF NOT EXISTS `raw_histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `crime_scene` bigint unsigned NOT NULL,
  `percentage_malicious` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.raw_histories: ~1 rows (approximately)
INSERT INTO `raw_histories` (`id`, `crime_scene`, `percentage_malicious`, `data`, `created_at`, `updated_at`) VALUES
	(3, 3, '53.33 %', '[{"URL":"1xlite-529281.top","HitCount":2,"TimeStamp":"2024-04-30 22:13:27+05:30"},{"URL":"367p.com","HitCount":8,"TimeStamp":"2024-07-11 00:34:44+05:30"},{"URL":"account.mongodb.com","HitCount":62,"TimeStamp":"2024-07-29 12:19:12+05:30"},{"URL":"accounts.binance.com","HitCount":8,"TimeStamp":"2024-10-03 23:15:45+05:30"},{"URL":"accounts.google.lk","HitCount":58,"TimeStamp":"2024-06-20 15:51:58+05:30"},{"URL":"adlacademy.udemy.com","HitCount":4,"TimeStamp":"2024-07-12 13:14:11+05:30"},{"URL":"ag.hunlikeaiolis.top","HitCount":16,"TimeStamp":"2024-07-28 20:27:32+05:30"},{"URL":"ak.formismagiustor.com","HitCount":24,"TimeStamp":"2024-07-28 20:29:31+05:30"},{"URL":"annas-archive.org","HitCount":28,"TimeStamp":"2024-09-16 11:19:45+05:30"},{"URL":"ap.gateway.mastercard.com","HitCount":6,"TimeStamp":"2024-08-04 10:28:49+05:30"},{"URL":"apify.com","HitCount":50,"TimeStamp":"2024-07-19 20:15:07+05:30"},{"URL":"app.mihcm.com","HitCount":76,"TimeStamp":"2024-07-11 14:37:13+05:30"},{"URL":"app.roboflow.com","HitCount":10,"TimeStamp":"2024-05-07 14:26:09+05:30"},{"URL":"app.slack.com","HitCount":3,"TimeStamp":"2024-10-03 07:39:26+05:30"},{"URL":"apple.stackexchange.com","HitCount":6,"TimeStamp":"2024-08-18 12:22:22+05:30"},{"URL":"appleid.apple.com","HitCount":6,"TimeStamp":"2024-08-18 12:01:33+05:30"},{"URL":"apps.microsoft.com","HitCount":15,"TimeStamp":"2024-06-25 14:21:22+05:30"},{"URL":"arxiv.org","HitCount":6,"TimeStamp":"2024-08-15 07:08:56+05:30"},{"URL":"askubuntu.com","HitCount":3,"TimeStamp":"2024-08-14 23:02:35+05:30"},{"URL":"auth.openai.com","HitCount":29,"TimeStamp":"2024-07-12 01:01:40+05:30"},{"URL":"auth0.openai.com","HitCount":10,"TimeStamp":"2024-07-29 10:26:42+05:30"},{"URL":"authentication.cardinalcommerce.com","HitCount":6,"TimeStamp":"2024-08-04 10:28:32+05:30"},{"URL":"awecrptjmp.com","HitCount":4,"TimeStamp":"2024-07-11 00:43:13+05:30"},{"URL":"axiatadigitallabssl.sharepoint.com","HitCount":8,"TimeStamp":"2024-07-08 09:44:44+05:30"},{"URL":"be.synxis.com","HitCount":12,"TimeStamp":"2024-07-19 07:06:14+05:30"},{"URL":"best.aliexpress.com","HitCount":20,"TimeStamp":"2024-07-11 00:33:26+05:30"},{"URL":"blog.gopenai.com","HitCount":3,"TimeStamp":"2024-07-04 02:19:45+05:30"},{"URL":"bmirds.github.io","HitCount":4,"TimeStamp":"2024-07-22 21:07:11+05:30"},{"URL":"brave.com","HitCount":6,"TimeStamp":"2024-07-11 00:39:32+05:30"},{"URL":"careers.g42.ai","HitCount":15,"TimeStamp":"2024-06-20 17:51:20+05:30"},{"URL":"chatgpt.com","HitCount":146,"TimeStamp":"2024-07-09 22:31:43+05:30"},{"URL":"checkcoverage.apple.com","HitCount":2,"TimeStamp":"2024-09-12 20:24:55+05:30"},{"URL":"chrome-stats.com","HitCount":4,"TimeStamp":"2024-09-16 10:01:57+05:30"},{"URL":"chromedriver.storage.googleapis.com","HitCount":3,"TimeStamp":"2024-06-26 01:30:39+05:30"},{"URL":"chromewebstore.google.com","HitCount":51,"TimeStamp":"2024-05-08 17:18:04+05:30"},{"URL":"cineru.lk","HitCount":6,"TimeStamp":"2024-08-10 21:09:22+05:30"},{"URL":"cloud.google.com","HitCount":12,"TimeStamp":"2024-06-20 08:07:34+05:30"},{"URL":"colab.research.google.com","HitCount":164,"TimeStamp":"2024-07-24 01:09:09+05:30"},{"URL":"commentpicker.com","HitCount":18,"TimeStamp":"2024-08-06 21:52:52+05:30"},{"URL":"community.st.com","HitCount":3,"TimeStamp":"2024-08-17 17:45:23+05:30"},{"URL":"console.cloud.google.com","HitCount":15,"TimeStamp":"2024-08-17 14:08:14+05:30"},{"URL":"console.groq.com","HitCount":12,"TimeStamp":"2024-08-04 21:08:30+05:30"},{"URL":"cricket99.net","HitCount":12,"TimeStamp":"2024-07-15 08:20:30+05:30"},{"URL":"d3c33hcgiwev3.cloudfront.net","HitCount":3,"TimeStamp":"2024-06-20 11:25:57+05:30"},{"URL":"datascience.stackexchange.com","HitCount":5,"TimeStamp":"2024-07-29 10:22:11+05:30"},{"URL":"datasetsearch.research.google.com","HitCount":6,"TimeStamp":"2024-08-31 18:18:47+05:30"},{"URL":"debuggercafe.com","HitCount":9,"TimeStamp":"2024-08-03 17:58:49+05:30"},{"URL":"developer.chrome.com","HitCount":57,"TimeStamp":"2024-06-26 01:29:39+05:30"},{"URL":"developer.nvidia.com","HitCount":33,"TimeStamp":"2024-07-05 11:15:16+05:30"},{"URL":"discuss.huggingface.co","HitCount":47,"TimeStamp":"2024-07-12 14:42:17+05:30"},{"URL":"discuss.streamlit.io","HitCount":34,"TimeStamp":"2024-08-15 08:39:03+05:30"},{"URL":"docs.apify.com","HitCount":12,"TimeStamp":"2024-08-24 00:36:34+05:30"},{"URL":"docs.google.com","HitCount":259,"TimeStamp":"2024-07-24 20:31:09+05:30"},{"URL":"docs.nvidia.com","HitCount":4,"TimeStamp":"2024-09-11 08:50:33+05:30"},{"URL":"docs.voyageai.com","HitCount":6,"TimeStamp":"2024-08-13 18:34:57+05:30"},{"URL":"drive.usercontent.google.com","HitCount":11,"TimeStamp":"2024-08-23 07:54:50+05:30"},{"URL":"education.github.com","HitCount":12,"TimeStamp":"2024-07-14 11:47:46+05:30"},{"URL":"emojipedia.org","HitCount":6,"TimeStamp":"2024-08-19 18:07:34+05:30"},{"URL":"faiss.ai","HitCount":18,"TimeStamp":"2024-08-03 22:04:05+05:30"},{"URL":"fan3.saveinsta.cam","HitCount":4,"TimeStamp":"2024-07-15 08:07:55+05:30"},{"URL":"fan4.financefirefly.com","HitCount":8,"TimeStamp":"2024-07-11 00:34:35+05:30"},{"URL":"fan8.ssstik.cam","HitCount":8,"TimeStamp":"2024-07-11 00:34:16+05:30"},{"URL":"fast.com","HitCount":3,"TimeStamp":"2024-08-20 00:10:51+05:30"},{"URL":"fheoggkfdfchfphceeifdbepaooicaho","HitCount":3,"TimeStamp":"2024-08-11 08:12:26+05:30"},{"URL":"find-it.pro","HitCount":12,"TimeStamp":"2024-07-19 20:11:23+05:30"},{"URL":"firebase.google.com","HitCount":42,"TimeStamp":"2024-05-20 17:23:30+05:30"},{"URL":"forms.office.com","HitCount":7,"TimeStamp":"2024-05-07 17:38:04+05:30"},{"URL":"forums.developer.apple.com","HitCount":6,"TimeStamp":"2024-08-18 12:16:39+05:30"},{"URL":"freecomputerbooks.com","HitCount":3,"TimeStamp":"2024-08-04 19:57:07+05:30"},{"URL":"gds.google.com","HitCount":36,"TimeStamp":"2024-07-18 05:02:12+05:30"},{"URL":"gist.github.com","HitCount":30,"TimeStamp":"2024-08-14 23:13:22+05:30"},{"URL":"github.com","HitCount":2373,"TimeStamp":"2024-06-21 20:28:18+05:30"},{"URL":"googlechromelabs.github.io","HitCount":12,"TimeStamp":"2024-06-26 01:33:23+05:30"},{"URL":"groups.google.com","HitCount":4,"TimeStamp":"2024-08-31 18:41:23+05:30"},{"URL":"grtposh.com","HitCount":8,"TimeStamp":"2024-07-15 08:10:09+05:30"},{"URL":"gsp-auth-kjyo252taq-uc.a.run.app","HitCount":3,"TimeStamp":"2024-06-20 15:50:26+05:30"},{"URL":"gts.ai","HitCount":4,"TimeStamp":"2024-09-10 18:17:59+05:30"},{"URL":"hubrisone.com","HitCount":8,"TimeStamp":"2024-07-11 01:00:44+05:30"},{"URL":"ibrahimgoke.medium.com","HitCount":3,"TimeStamp":"2024-08-10 13:09:36+05:30"},{"URL":"identity.getpostman.com","HitCount":39,"TimeStamp":"2024-07-31 09:43:39+05:30"},{"URL":"iforgot.apple.com","HitCount":3,"TimeStamp":"2024-08-17 17:16:42+05:30"},{"URL":"ispot.lk","HitCount":3,"TimeStamp":"2024-08-25 14:16:22+05:30"},{"URL":"join.worldoftanks.asia","HitCount":40,"TimeStamp":"2024-07-11 00:33:40+05:30"},{"URL":"jsonformatter.curiousconcept.com","HitCount":309,"TimeStamp":"2024-05-20 17:21:56+05:30"},{"URL":"kaviaai.slack.com","HitCount":5,"TimeStamp":"2024-10-03 07:39:13+05:30"},{"URL":"learn.microsoft.com","HitCount":20,"TimeStamp":"2024-08-14 22:48:50+05:30"},{"URL":"learning.oracle.com","HitCount":8,"TimeStamp":"2024-06-14 14:40:49+05:30"},{"URL":"learning.oreilly.com","HitCount":31,"TimeStamp":"2024-09-16 09:57:49+05:30"},{"URL":"librosa.org","HitCount":12,"TimeStamp":"2024-08-16 15:45:31+05:30"},{"URL":"lk.bookmyshow.com","HitCount":36,"TimeStamp":"2024-08-04 10:28:51+05:30"},{"URL":"login-ext.identity.oraclecloud.com","HitCount":25,"TimeStamp":"2024-06-14 14:34:22+05:30"},{"URL":"login.microsoftonline.com","HitCount":579,"TimeStamp":"2024-05-07 17:38:19+05:30"},{"URL":"login.mihcm.com","HitCount":32,"TimeStamp":"2024-07-11 14:37:13+05:30"},{"URL":"luckyforbet.com","HitCount":24,"TimeStamp":"2024-07-15 07:45:28+05:30"},{"URL":"mhb.livecricket.is","HitCount":9,"TimeStamp":"2024-04-30 22:13:14+05:30"},{"URL":"mouton.foramscoypou.com","HitCount":12,"TimeStamp":"2024-07-28 20:28:07+05:30"},{"URL":"mrvar.fdv.uni-lj.si","HitCount":4,"TimeStamp":"2024-07-09 22:28:36+05:30"},{"URL":"myaccount.google.com","HitCount":50,"TimeStamp":"2024-07-29 12:19:32+05:30"},{"URL":"mylearn.oracle.com","HitCount":21,"TimeStamp":"2024-05-18 14:51:39+05:30"},{"URL":"mysignins.microsoft.com","HitCount":40,"TimeStamp":"2024-07-29 10:59:45+05:30"},{"URL":"numpy.org","HitCount":14,"TimeStamp":"2024-07-29 11:40:11+05:30"},{"URL":"openai.com","HitCount":72,"TimeStamp":"2024-07-09 22:31:31+05:30"},{"URL":"outlook.office.com","HitCount":265,"TimeStamp":"2024-06-20 08:07:57+05:30"},{"URL":"p2p.binance.com","HitCount":2,"TimeStamp":"2024-10-03 23:17:01+05:30"},{"URL":"paperswithcode.com","HitCount":14,"TimeStamp":"2024-07-10 23:19:52+05:30"},{"URL":"platform.openai.com","HitCount":132,"TimeStamp":"2024-08-19 13:57:09+05:30"},{"URL":"preferences-mgr.truste.com","HitCount":2,"TimeStamp":"2024-09-02 22:18:14+05:30"},{"URL":"profile.oracle.com","HitCount":19,"TimeStamp":"2024-06-14 14:39:20+05:30"},{"URL":"promo.worldofwarships.asia","HitCount":8,"TimeStamp":"2024-07-15 07:45:57+05:30"},{"URL":"pypi.org","HitCount":96,"TimeStamp":"2024-06-26 01:22:30+05:30"},{"URL":"python.langchain.com","HitCount":3,"TimeStamp":"2024-08-03 22:23:43+05:30"},{"URL":"pythonbooks.org","HitCount":3,"TimeStamp":"2024-08-04 19:56:39+05:30"},{"URL":"pytorch.org","HitCount":21,"TimeStamp":"2024-07-05 11:20:55+05:30"},{"URL":"rackheartilyslender.com","HitCount":24,"TimeStamp":"2024-07-11 00:40:59+05:30"},{"URL":"saksglobal-my.sharepoint.com","HitCount":40,"TimeStamp":"2024-08-13 19:44:48+05:30"},{"URL":"scikit-learn.org","HitCount":21,"TimeStamp":"2024-07-24 01:39:07+05:30"},{"URL":"screenrant.com","HitCount":4,"TimeStamp":"2024-07-29 08:04:01+05:30"},{"URL":"seatreservation.railway.gov.lk","HitCount":27,"TimeStamp":"2024-07-06 19:34:07+05:30"},{"URL":"selenium-python.readthedocs.io","HitCount":6,"TimeStamp":"2024-06-26 01:24:10+05:30"},{"URL":"services-nlk.bookmyshow.com","HitCount":18,"TimeStamp":"2024-08-04 10:28:30+05:30"},{"URL":"socialgrep.com","HitCount":4,"TimeStamp":"2024-07-19 20:10:26+05:30"},{"URL":"spacy.io","HitCount":6,"TimeStamp":"2024-09-22 11:52:22+05:30"},{"URL":"stackoverflow.com","HitCount":209,"TimeStamp":"2024-06-26 01:27:57+05:30"},{"URL":"statics.teams.cdn.office.net","HitCount":36,"TimeStamp":"2024-08-08 19:35:40+05:30"},{"URL":"storage.googleapis.com","HitCount":24,"TimeStamp":"2024-08-17 16:06:02+05:30"},{"URL":"support.apple.com","HitCount":33,"TimeStamp":"2024-08-17 17:06:14+05:30"},{"URL":"support.google.com","HitCount":6,"TimeStamp":"2024-08-12 20:58:01+05:30"},{"URL":"support.vpnsecure.me","HitCount":3,"TimeStamp":"2024-06-25 14:32:46+05:30"},{"URL":"talent-sync-ai.postman.co","HitCount":21,"TimeStamp":"2024-08-27 01:16:04+05:30"},{"URL":"teams.microsoft.com","HitCount":20,"TimeStamp":"2024-07-05 12:59:31+05:30"},{"URL":"tigerking.world","HitCount":40,"TimeStamp":"2024-07-11 00:34:53+05:30"},{"URL":"ts.llamaindex.ai","HitCount":7,"TimeStamp":"2024-07-04 02:34:01+05:30"},{"URL":"tshirtrepublic.lk","HitCount":4,"TimeStamp":"2024-10-05 12:43:33+05:30"},{"URL":"universe.roboflow.com","HitCount":54,"TimeStamp":"2024-07-31 10:22:51+05:30"},{"URL":"us05web.zoom.us","HitCount":177,"TimeStamp":"2024-07-03 15:50:58+05:30"},{"URL":"user-images.githubusercontent.com","HitCount":2,"TimeStamp":"2024-08-31 19:03:51+05:30"},{"URL":"voyageai.us.auth0.com","HitCount":3,"TimeStamp":"2024-08-13 18:32:45+05:30"},{"URL":"w3.css-validator.org","HitCount":4,"TimeStamp":"2024-07-11 00:37:48+05:30"},{"URL":"waisheph.com","HitCount":144,"TimeStamp":"2024-07-11 00:34:08+05:30"},{"URL":"wandb.auth0.com","HitCount":4,"TimeStamp":"2024-08-31 19:20:33+05:30"},{"URL":"web.facebook.com","HitCount":3,"TimeStamp":"2024-08-25 10:44:17+05:30"},{"URL":"web.whatsapp.com","HitCount":129,"TimeStamp":"2024-07-24 21:48:27+05:30"},{"URL":"wetransfer.com","HitCount":6,"TimeStamp":"2024-08-20 21:27:05+05:30"},{"URL":"wow.groq.com","HitCount":4,"TimeStamp":"2024-07-29 15:22:18+05:30"},{"URL":"www.acmigroup.lk","HitCount":4,"TimeStamp":"2024-07-13 23:08:15+05:30"},{"URL":"www.adidas.com","HitCount":15,"TimeStamp":"2024-07-05 11:06:26+05:30"},{"URL":"www.aliexpress.com","HitCount":16,"TimeStamp":"2024-07-11 00:40:22+05:30"},{"URL":"www.alpha3d.io","HitCount":4,"TimeStamp":"2024-07-16 22:37:37+05:30"},{"URL":"www.analyticsvidhya.com","HitCount":12,"TimeStamp":"2024-07-23 08:36:40+05:30"},{"URL":"www.bayt.com","HitCount":6,"TimeStamp":"2024-10-03 10:23:24+05:30"},{"URL":"www.bitmart.com","HitCount":52,"TimeStamp":"2024-07-11 01:00:44+05:30"},{"URL":"www.chatbot.com","HitCount":4,"TimeStamp":"2024-10-03 15:32:44+05:30"},{"URL":"www.cl.cam.ac.uk","HitCount":3,"TimeStamp":"2024-08-03 17:59:34+05:30"},{"URL":"www.data.qld.gov.au","HitCount":3,"TimeStamp":"2024-08-02 23:11:56+05:30"},{"URL":"www.espncricinfo.com","HitCount":40,"TimeStamp":"2024-07-31 07:40:26+05:30"},{"URL":"www.facebook.com","HitCount":63,"TimeStamp":"2024-08-06 22:19:44+05:30"},{"URL":"www.freedownloadmanager.org","HitCount":8,"TimeStamp":"2024-07-25 08:07:07+05:30"},{"URL":"www.freepdfconvert.com","HitCount":6,"TimeStamp":"2024-09-16 11:26:28+05:30"},{"URL":"www.google.com","HitCount":4889,"TimeStamp":"2023-11-27 17:37:17+05:30"},{"URL":"www.grivetoutdoors.com","HitCount":3,"TimeStamp":"2024-07-05 11:16:31+05:30"},{"URL":"www.icloud.com","HitCount":99,"TimeStamp":"2024-08-17 17:05:40+05:30"},{"URL":"www.jars.ai","HitCount":4,"TimeStamp":"2024-07-18 05:04:51+05:30"},{"URL":"www.kaggle.com","HitCount":408,"TimeStamp":"2024-07-22 21:04:54+05:30"},{"URL":"www.lavivienpost.com","HitCount":20,"TimeStamp":"2024-07-24 22:58:08+05:30"},{"URL":"www.linkedin.com","HitCount":241,"TimeStamp":"2024-06-20 09:37:34+05:30"},{"URL":"www.livejasmin.com","HitCount":4,"TimeStamp":"2024-07-11 00:43:14+05:30"},{"URL":"www.lklyrics.com","HitCount":9,"TimeStamp":"2024-08-20 21:54:25+05:30"},{"URL":"www.luxuryx.lk","HitCount":93,"TimeStamp":"2024-08-10 22:48:43+05:30"},{"URL":"www.microsoft.com","HitCount":5,"TimeStamp":"2024-07-29 09:44:29+05:30"},{"URL":"www.mongodb.com","HitCount":59,"TimeStamp":"2024-07-29 12:18:45+05:30"},{"URL":"www.myunidays.com","HitCount":8,"TimeStamp":"2024-07-10 20:40:26+05:30"},{"URL":"www.netflix.com","HitCount":95,"TimeStamp":"2024-08-17 22:56:16+05:30"},{"URL":"www.nvidia.com","HitCount":3,"TimeStamp":"2024-07-04 02:49:54+05:30"},{"URL":"www.office.com","HitCount":99,"TimeStamp":"2024-06-20 08:07:51+05:30"},{"URL":"www.oreilly.com","HitCount":3,"TimeStamp":"2024-05-29 08:56:33+05:30"},{"URL":"www.pcmag.com","HitCount":4,"TimeStamp":"2024-07-29 09:44:17+05:30"},{"URL":"www.pinecone.io","HitCount":24,"TimeStamp":"2024-08-03 22:04:48+05:30"},{"URL":"www.quora.com","HitCount":10,"TimeStamp":"2024-06-20 17:58:23+05:30"},{"URL":"www.reddit.com","HitCount":161,"TimeStamp":"2024-07-16 22:32:40+05:30"},{"URL":"www.researchgate.net","HitCount":40,"TimeStamp":"2024-07-09 21:35:33+05:30"},{"URL":"www.restack.io","HitCount":12,"TimeStamp":"2024-07-29 15:10:40+05:30"},{"URL":"www.rgu.ac.uk","HitCount":6,"TimeStamp":"2024-10-05 09:36:15+05:30"},{"URL":"www.scrapingbee.com","HitCount":6,"TimeStamp":"2024-06-26 01:29:12+05:30"},{"URL":"www.speedtest.net","HitCount":6,"TimeStamp":"2024-06-25 14:21:16+05:30"},{"URL":"www.tiktok.com","HitCount":27,"TimeStamp":"2024-08-06 22:19:35+05:30"},{"URL":"www.tomsguide.com","HitCount":6,"TimeStamp":"2024-08-23 10:56:00+05:30"},{"URL":"www.v2ray.com","HitCount":3,"TimeStamp":"2024-08-19 12:26:16+05:30"},{"URL":"www.voyageai.com","HitCount":3,"TimeStamp":"2024-08-13 18:32:42+05:30"},{"URL":"www.w3schools.com","HitCount":2,"TimeStamp":"2024-09-08 19:29:37+05:30"},{"URL":"www.webassessor.com","HitCount":12,"TimeStamp":"2024-06-20 08:08:11+05:30"},{"URL":"www.xm.com","HitCount":4,"TimeStamp":"2024-07-15 08:51:03+05:30"},{"URL":"www.youtube.com","HitCount":446,"TimeStamp":"2024-08-21 20:02:55+05:30"},{"URL":"www7.lunapic.com","HitCount":6,"TimeStamp":"2024-09-04 17:01:19+05:30"},{"URL":"xadsmart.com","HitCount":4,"TimeStamp":"2024-07-11 00:37:47+05:30"},{"URL":"yts.mx","HitCount":4,"TimeStamp":"2024-07-25 08:10:00+05:30"}]', '2024-10-08 12:38:57', '2024-10-08 12:38:57'),
	(4, 3, '53.33 %', '[{"URL":"1xlite-529281.top","HitCount":2,"TimeStamp":"2024-04-30 22:13:27+05:30"},{"URL":"367p.com","HitCount":8,"TimeStamp":"2024-07-11 00:34:44+05:30"},{"URL":"account.mongodb.com","HitCount":62,"TimeStamp":"2024-07-29 12:19:12+05:30"},{"URL":"accounts.binance.com","HitCount":8,"TimeStamp":"2024-10-03 23:15:45+05:30"},{"URL":"accounts.google.lk","HitCount":58,"TimeStamp":"2024-06-20 15:51:58+05:30"},{"URL":"adlacademy.udemy.com","HitCount":4,"TimeStamp":"2024-07-12 13:14:11+05:30"},{"URL":"ag.hunlikeaiolis.top","HitCount":16,"TimeStamp":"2024-07-28 20:27:32+05:30"},{"URL":"ak.formismagiustor.com","HitCount":24,"TimeStamp":"2024-07-28 20:29:31+05:30"},{"URL":"annas-archive.org","HitCount":28,"TimeStamp":"2024-09-16 11:19:45+05:30"},{"URL":"ap.gateway.mastercard.com","HitCount":6,"TimeStamp":"2024-08-04 10:28:49+05:30"},{"URL":"apify.com","HitCount":50,"TimeStamp":"2024-07-19 20:15:07+05:30"},{"URL":"app.mihcm.com","HitCount":76,"TimeStamp":"2024-07-11 14:37:13+05:30"},{"URL":"app.roboflow.com","HitCount":10,"TimeStamp":"2024-05-07 14:26:09+05:30"},{"URL":"app.slack.com","HitCount":3,"TimeStamp":"2024-10-03 07:39:26+05:30"},{"URL":"apple.stackexchange.com","HitCount":6,"TimeStamp":"2024-08-18 12:22:22+05:30"},{"URL":"appleid.apple.com","HitCount":6,"TimeStamp":"2024-08-18 12:01:33+05:30"},{"URL":"apps.microsoft.com","HitCount":15,"TimeStamp":"2024-06-25 14:21:22+05:30"},{"URL":"arxiv.org","HitCount":6,"TimeStamp":"2024-08-15 07:08:56+05:30"},{"URL":"askubuntu.com","HitCount":3,"TimeStamp":"2024-08-14 23:02:35+05:30"},{"URL":"auth.openai.com","HitCount":29,"TimeStamp":"2024-07-12 01:01:40+05:30"},{"URL":"auth0.openai.com","HitCount":10,"TimeStamp":"2024-07-29 10:26:42+05:30"},{"URL":"authentication.cardinalcommerce.com","HitCount":6,"TimeStamp":"2024-08-04 10:28:32+05:30"},{"URL":"awecrptjmp.com","HitCount":4,"TimeStamp":"2024-07-11 00:43:13+05:30"},{"URL":"axiatadigitallabssl.sharepoint.com","HitCount":8,"TimeStamp":"2024-07-08 09:44:44+05:30"},{"URL":"be.synxis.com","HitCount":12,"TimeStamp":"2024-07-19 07:06:14+05:30"},{"URL":"best.aliexpress.com","HitCount":20,"TimeStamp":"2024-07-11 00:33:26+05:30"},{"URL":"blog.gopenai.com","HitCount":3,"TimeStamp":"2024-07-04 02:19:45+05:30"},{"URL":"bmirds.github.io","HitCount":4,"TimeStamp":"2024-07-22 21:07:11+05:30"},{"URL":"brave.com","HitCount":6,"TimeStamp":"2024-07-11 00:39:32+05:30"},{"URL":"careers.g42.ai","HitCount":15,"TimeStamp":"2024-06-20 17:51:20+05:30"},{"URL":"chatgpt.com","HitCount":146,"TimeStamp":"2024-07-09 22:31:43+05:30"},{"URL":"checkcoverage.apple.com","HitCount":2,"TimeStamp":"2024-09-12 20:24:55+05:30"},{"URL":"chrome-stats.com","HitCount":4,"TimeStamp":"2024-09-16 10:01:57+05:30"},{"URL":"chromedriver.storage.googleapis.com","HitCount":3,"TimeStamp":"2024-06-26 01:30:39+05:30"},{"URL":"chromewebstore.google.com","HitCount":51,"TimeStamp":"2024-05-08 17:18:04+05:30"},{"URL":"cineru.lk","HitCount":6,"TimeStamp":"2024-08-10 21:09:22+05:30"},{"URL":"cloud.google.com","HitCount":12,"TimeStamp":"2024-06-20 08:07:34+05:30"},{"URL":"colab.research.google.com","HitCount":164,"TimeStamp":"2024-07-24 01:09:09+05:30"},{"URL":"commentpicker.com","HitCount":18,"TimeStamp":"2024-08-06 21:52:52+05:30"},{"URL":"community.st.com","HitCount":3,"TimeStamp":"2024-08-17 17:45:23+05:30"},{"URL":"console.cloud.google.com","HitCount":15,"TimeStamp":"2024-08-17 14:08:14+05:30"},{"URL":"console.groq.com","HitCount":12,"TimeStamp":"2024-08-04 21:08:30+05:30"},{"URL":"cricket99.net","HitCount":12,"TimeStamp":"2024-07-15 08:20:30+05:30"},{"URL":"d3c33hcgiwev3.cloudfront.net","HitCount":3,"TimeStamp":"2024-06-20 11:25:57+05:30"},{"URL":"datascience.stackexchange.com","HitCount":5,"TimeStamp":"2024-07-29 10:22:11+05:30"},{"URL":"datasetsearch.research.google.com","HitCount":6,"TimeStamp":"2024-08-31 18:18:47+05:30"},{"URL":"debuggercafe.com","HitCount":9,"TimeStamp":"2024-08-03 17:58:49+05:30"},{"URL":"developer.chrome.com","HitCount":57,"TimeStamp":"2024-06-26 01:29:39+05:30"},{"URL":"developer.nvidia.com","HitCount":33,"TimeStamp":"2024-07-05 11:15:16+05:30"},{"URL":"discuss.huggingface.co","HitCount":47,"TimeStamp":"2024-07-12 14:42:17+05:30"},{"URL":"discuss.streamlit.io","HitCount":34,"TimeStamp":"2024-08-15 08:39:03+05:30"},{"URL":"docs.apify.com","HitCount":12,"TimeStamp":"2024-08-24 00:36:34+05:30"},{"URL":"docs.google.com","HitCount":259,"TimeStamp":"2024-07-24 20:31:09+05:30"},{"URL":"docs.nvidia.com","HitCount":4,"TimeStamp":"2024-09-11 08:50:33+05:30"},{"URL":"docs.voyageai.com","HitCount":6,"TimeStamp":"2024-08-13 18:34:57+05:30"},{"URL":"drive.usercontent.google.com","HitCount":11,"TimeStamp":"2024-08-23 07:54:50+05:30"},{"URL":"education.github.com","HitCount":12,"TimeStamp":"2024-07-14 11:47:46+05:30"},{"URL":"emojipedia.org","HitCount":6,"TimeStamp":"2024-08-19 18:07:34+05:30"},{"URL":"faiss.ai","HitCount":18,"TimeStamp":"2024-08-03 22:04:05+05:30"},{"URL":"fan3.saveinsta.cam","HitCount":4,"TimeStamp":"2024-07-15 08:07:55+05:30"},{"URL":"fan4.financefirefly.com","HitCount":8,"TimeStamp":"2024-07-11 00:34:35+05:30"},{"URL":"fan8.ssstik.cam","HitCount":8,"TimeStamp":"2024-07-11 00:34:16+05:30"},{"URL":"fast.com","HitCount":3,"TimeStamp":"2024-08-20 00:10:51+05:30"},{"URL":"fheoggkfdfchfphceeifdbepaooicaho","HitCount":3,"TimeStamp":"2024-08-11 08:12:26+05:30"},{"URL":"find-it.pro","HitCount":12,"TimeStamp":"2024-07-19 20:11:23+05:30"},{"URL":"firebase.google.com","HitCount":42,"TimeStamp":"2024-05-20 17:23:30+05:30"},{"URL":"forms.office.com","HitCount":7,"TimeStamp":"2024-05-07 17:38:04+05:30"},{"URL":"forums.developer.apple.com","HitCount":6,"TimeStamp":"2024-08-18 12:16:39+05:30"},{"URL":"freecomputerbooks.com","HitCount":3,"TimeStamp":"2024-08-04 19:57:07+05:30"},{"URL":"gds.google.com","HitCount":36,"TimeStamp":"2024-07-18 05:02:12+05:30"},{"URL":"gist.github.com","HitCount":30,"TimeStamp":"2024-08-14 23:13:22+05:30"},{"URL":"github.com","HitCount":2373,"TimeStamp":"2024-06-21 20:28:18+05:30"},{"URL":"googlechromelabs.github.io","HitCount":12,"TimeStamp":"2024-06-26 01:33:23+05:30"},{"URL":"groups.google.com","HitCount":4,"TimeStamp":"2024-08-31 18:41:23+05:30"},{"URL":"grtposh.com","HitCount":8,"TimeStamp":"2024-07-15 08:10:09+05:30"},{"URL":"gsp-auth-kjyo252taq-uc.a.run.app","HitCount":3,"TimeStamp":"2024-06-20 15:50:26+05:30"},{"URL":"gts.ai","HitCount":4,"TimeStamp":"2024-09-10 18:17:59+05:30"},{"URL":"hubrisone.com","HitCount":8,"TimeStamp":"2024-07-11 01:00:44+05:30"},{"URL":"ibrahimgoke.medium.com","HitCount":3,"TimeStamp":"2024-08-10 13:09:36+05:30"},{"URL":"identity.getpostman.com","HitCount":39,"TimeStamp":"2024-07-31 09:43:39+05:30"},{"URL":"iforgot.apple.com","HitCount":3,"TimeStamp":"2024-08-17 17:16:42+05:30"},{"URL":"ispot.lk","HitCount":3,"TimeStamp":"2024-08-25 14:16:22+05:30"},{"URL":"join.worldoftanks.asia","HitCount":40,"TimeStamp":"2024-07-11 00:33:40+05:30"},{"URL":"jsonformatter.curiousconcept.com","HitCount":309,"TimeStamp":"2024-05-20 17:21:56+05:30"},{"URL":"kaviaai.slack.com","HitCount":5,"TimeStamp":"2024-10-03 07:39:13+05:30"},{"URL":"learn.microsoft.com","HitCount":20,"TimeStamp":"2024-08-14 22:48:50+05:30"},{"URL":"learning.oracle.com","HitCount":8,"TimeStamp":"2024-06-14 14:40:49+05:30"},{"URL":"learning.oreilly.com","HitCount":31,"TimeStamp":"2024-09-16 09:57:49+05:30"},{"URL":"librosa.org","HitCount":12,"TimeStamp":"2024-08-16 15:45:31+05:30"},{"URL":"lk.bookmyshow.com","HitCount":36,"TimeStamp":"2024-08-04 10:28:51+05:30"},{"URL":"login-ext.identity.oraclecloud.com","HitCount":25,"TimeStamp":"2024-06-14 14:34:22+05:30"},{"URL":"login.microsoftonline.com","HitCount":579,"TimeStamp":"2024-05-07 17:38:19+05:30"},{"URL":"login.mihcm.com","HitCount":32,"TimeStamp":"2024-07-11 14:37:13+05:30"},{"URL":"luckyforbet.com","HitCount":24,"TimeStamp":"2024-07-15 07:45:28+05:30"},{"URL":"mhb.livecricket.is","HitCount":9,"TimeStamp":"2024-04-30 22:13:14+05:30"},{"URL":"mouton.foramscoypou.com","HitCount":12,"TimeStamp":"2024-07-28 20:28:07+05:30"},{"URL":"mrvar.fdv.uni-lj.si","HitCount":4,"TimeStamp":"2024-07-09 22:28:36+05:30"},{"URL":"myaccount.google.com","HitCount":50,"TimeStamp":"2024-07-29 12:19:32+05:30"},{"URL":"mylearn.oracle.com","HitCount":21,"TimeStamp":"2024-05-18 14:51:39+05:30"},{"URL":"mysignins.microsoft.com","HitCount":40,"TimeStamp":"2024-07-29 10:59:45+05:30"},{"URL":"numpy.org","HitCount":14,"TimeStamp":"2024-07-29 11:40:11+05:30"},{"URL":"openai.com","HitCount":72,"TimeStamp":"2024-07-09 22:31:31+05:30"},{"URL":"outlook.office.com","HitCount":265,"TimeStamp":"2024-06-20 08:07:57+05:30"},{"URL":"p2p.binance.com","HitCount":2,"TimeStamp":"2024-10-03 23:17:01+05:30"},{"URL":"paperswithcode.com","HitCount":14,"TimeStamp":"2024-07-10 23:19:52+05:30"},{"URL":"platform.openai.com","HitCount":132,"TimeStamp":"2024-08-19 13:57:09+05:30"},{"URL":"preferences-mgr.truste.com","HitCount":2,"TimeStamp":"2024-09-02 22:18:14+05:30"},{"URL":"profile.oracle.com","HitCount":19,"TimeStamp":"2024-06-14 14:39:20+05:30"},{"URL":"promo.worldofwarships.asia","HitCount":8,"TimeStamp":"2024-07-15 07:45:57+05:30"},{"URL":"pypi.org","HitCount":96,"TimeStamp":"2024-06-26 01:22:30+05:30"},{"URL":"python.langchain.com","HitCount":3,"TimeStamp":"2024-08-03 22:23:43+05:30"},{"URL":"pythonbooks.org","HitCount":3,"TimeStamp":"2024-08-04 19:56:39+05:30"},{"URL":"pytorch.org","HitCount":21,"TimeStamp":"2024-07-05 11:20:55+05:30"},{"URL":"rackheartilyslender.com","HitCount":24,"TimeStamp":"2024-07-11 00:40:59+05:30"},{"URL":"saksglobal-my.sharepoint.com","HitCount":40,"TimeStamp":"2024-08-13 19:44:48+05:30"},{"URL":"scikit-learn.org","HitCount":21,"TimeStamp":"2024-07-24 01:39:07+05:30"},{"URL":"screenrant.com","HitCount":4,"TimeStamp":"2024-07-29 08:04:01+05:30"},{"URL":"seatreservation.railway.gov.lk","HitCount":27,"TimeStamp":"2024-07-06 19:34:07+05:30"},{"URL":"selenium-python.readthedocs.io","HitCount":6,"TimeStamp":"2024-06-26 01:24:10+05:30"},{"URL":"services-nlk.bookmyshow.com","HitCount":18,"TimeStamp":"2024-08-04 10:28:30+05:30"},{"URL":"socialgrep.com","HitCount":4,"TimeStamp":"2024-07-19 20:10:26+05:30"},{"URL":"spacy.io","HitCount":6,"TimeStamp":"2024-09-22 11:52:22+05:30"},{"URL":"stackoverflow.com","HitCount":209,"TimeStamp":"2024-06-26 01:27:57+05:30"},{"URL":"statics.teams.cdn.office.net","HitCount":36,"TimeStamp":"2024-08-08 19:35:40+05:30"},{"URL":"storage.googleapis.com","HitCount":24,"TimeStamp":"2024-08-17 16:06:02+05:30"},{"URL":"support.apple.com","HitCount":33,"TimeStamp":"2024-08-17 17:06:14+05:30"},{"URL":"support.google.com","HitCount":6,"TimeStamp":"2024-08-12 20:58:01+05:30"},{"URL":"support.vpnsecure.me","HitCount":3,"TimeStamp":"2024-06-25 14:32:46+05:30"},{"URL":"talent-sync-ai.postman.co","HitCount":21,"TimeStamp":"2024-08-27 01:16:04+05:30"},{"URL":"teams.microsoft.com","HitCount":20,"TimeStamp":"2024-07-05 12:59:31+05:30"},{"URL":"tigerking.world","HitCount":40,"TimeStamp":"2024-07-11 00:34:53+05:30"},{"URL":"ts.llamaindex.ai","HitCount":7,"TimeStamp":"2024-07-04 02:34:01+05:30"},{"URL":"tshirtrepublic.lk","HitCount":4,"TimeStamp":"2024-10-05 12:43:33+05:30"},{"URL":"universe.roboflow.com","HitCount":54,"TimeStamp":"2024-07-31 10:22:51+05:30"},{"URL":"us05web.zoom.us","HitCount":177,"TimeStamp":"2024-07-03 15:50:58+05:30"},{"URL":"user-images.githubusercontent.com","HitCount":2,"TimeStamp":"2024-08-31 19:03:51+05:30"},{"URL":"voyageai.us.auth0.com","HitCount":3,"TimeStamp":"2024-08-13 18:32:45+05:30"},{"URL":"w3.css-validator.org","HitCount":4,"TimeStamp":"2024-07-11 00:37:48+05:30"},{"URL":"waisheph.com","HitCount":144,"TimeStamp":"2024-07-11 00:34:08+05:30"},{"URL":"wandb.auth0.com","HitCount":4,"TimeStamp":"2024-08-31 19:20:33+05:30"},{"URL":"web.facebook.com","HitCount":3,"TimeStamp":"2024-08-25 10:44:17+05:30"},{"URL":"web.whatsapp.com","HitCount":129,"TimeStamp":"2024-07-24 21:48:27+05:30"},{"URL":"wetransfer.com","HitCount":6,"TimeStamp":"2024-08-20 21:27:05+05:30"},{"URL":"wow.groq.com","HitCount":4,"TimeStamp":"2024-07-29 15:22:18+05:30"},{"URL":"www.acmigroup.lk","HitCount":4,"TimeStamp":"2024-07-13 23:08:15+05:30"},{"URL":"www.adidas.com","HitCount":15,"TimeStamp":"2024-07-05 11:06:26+05:30"},{"URL":"www.aliexpress.com","HitCount":16,"TimeStamp":"2024-07-11 00:40:22+05:30"},{"URL":"www.alpha3d.io","HitCount":4,"TimeStamp":"2024-07-16 22:37:37+05:30"},{"URL":"www.analyticsvidhya.com","HitCount":12,"TimeStamp":"2024-07-23 08:36:40+05:30"},{"URL":"www.bayt.com","HitCount":6,"TimeStamp":"2024-10-03 10:23:24+05:30"},{"URL":"www.bitmart.com","HitCount":52,"TimeStamp":"2024-07-11 01:00:44+05:30"},{"URL":"www.chatbot.com","HitCount":4,"TimeStamp":"2024-10-03 15:32:44+05:30"},{"URL":"www.cl.cam.ac.uk","HitCount":3,"TimeStamp":"2024-08-03 17:59:34+05:30"},{"URL":"www.data.qld.gov.au","HitCount":3,"TimeStamp":"2024-08-02 23:11:56+05:30"},{"URL":"www.espncricinfo.com","HitCount":40,"TimeStamp":"2024-07-31 07:40:26+05:30"},{"URL":"www.facebook.com","HitCount":63,"TimeStamp":"2024-08-06 22:19:44+05:30"},{"URL":"www.freedownloadmanager.org","HitCount":8,"TimeStamp":"2024-07-25 08:07:07+05:30"},{"URL":"www.freepdfconvert.com","HitCount":6,"TimeStamp":"2024-09-16 11:26:28+05:30"},{"URL":"www.google.com","HitCount":4889,"TimeStamp":"2023-11-27 17:37:17+05:30"},{"URL":"www.grivetoutdoors.com","HitCount":3,"TimeStamp":"2024-07-05 11:16:31+05:30"},{"URL":"www.icloud.com","HitCount":99,"TimeStamp":"2024-08-17 17:05:40+05:30"},{"URL":"www.jars.ai","HitCount":4,"TimeStamp":"2024-07-18 05:04:51+05:30"},{"URL":"www.kaggle.com","HitCount":408,"TimeStamp":"2024-07-22 21:04:54+05:30"},{"URL":"www.lavivienpost.com","HitCount":20,"TimeStamp":"2024-07-24 22:58:08+05:30"},{"URL":"www.linkedin.com","HitCount":241,"TimeStamp":"2024-06-20 09:37:34+05:30"},{"URL":"www.livejasmin.com","HitCount":4,"TimeStamp":"2024-07-11 00:43:14+05:30"},{"URL":"www.lklyrics.com","HitCount":9,"TimeStamp":"2024-08-20 21:54:25+05:30"},{"URL":"www.luxuryx.lk","HitCount":93,"TimeStamp":"2024-08-10 22:48:43+05:30"},{"URL":"www.microsoft.com","HitCount":5,"TimeStamp":"2024-07-29 09:44:29+05:30"},{"URL":"www.mongodb.com","HitCount":59,"TimeStamp":"2024-07-29 12:18:45+05:30"},{"URL":"www.myunidays.com","HitCount":8,"TimeStamp":"2024-07-10 20:40:26+05:30"},{"URL":"www.netflix.com","HitCount":95,"TimeStamp":"2024-08-17 22:56:16+05:30"},{"URL":"www.nvidia.com","HitCount":3,"TimeStamp":"2024-07-04 02:49:54+05:30"},{"URL":"www.office.com","HitCount":99,"TimeStamp":"2024-06-20 08:07:51+05:30"},{"URL":"www.oreilly.com","HitCount":3,"TimeStamp":"2024-05-29 08:56:33+05:30"},{"URL":"www.pcmag.com","HitCount":4,"TimeStamp":"2024-07-29 09:44:17+05:30"},{"URL":"www.pinecone.io","HitCount":24,"TimeStamp":"2024-08-03 22:04:48+05:30"},{"URL":"www.quora.com","HitCount":10,"TimeStamp":"2024-06-20 17:58:23+05:30"},{"URL":"www.reddit.com","HitCount":161,"TimeStamp":"2024-07-16 22:32:40+05:30"},{"URL":"www.researchgate.net","HitCount":40,"TimeStamp":"2024-07-09 21:35:33+05:30"},{"URL":"www.restack.io","HitCount":12,"TimeStamp":"2024-07-29 15:10:40+05:30"},{"URL":"www.rgu.ac.uk","HitCount":6,"TimeStamp":"2024-10-05 09:36:15+05:30"},{"URL":"www.scrapingbee.com","HitCount":6,"TimeStamp":"2024-06-26 01:29:12+05:30"},{"URL":"www.speedtest.net","HitCount":6,"TimeStamp":"2024-06-25 14:21:16+05:30"},{"URL":"www.tiktok.com","HitCount":27,"TimeStamp":"2024-08-06 22:19:35+05:30"},{"URL":"www.tomsguide.com","HitCount":6,"TimeStamp":"2024-08-23 10:56:00+05:30"},{"URL":"www.v2ray.com","HitCount":3,"TimeStamp":"2024-08-19 12:26:16+05:30"},{"URL":"www.voyageai.com","HitCount":3,"TimeStamp":"2024-08-13 18:32:42+05:30"},{"URL":"www.w3schools.com","HitCount":2,"TimeStamp":"2024-09-08 19:29:37+05:30"},{"URL":"www.webassessor.com","HitCount":12,"TimeStamp":"2024-06-20 08:08:11+05:30"},{"URL":"www.xm.com","HitCount":4,"TimeStamp":"2024-07-15 08:51:03+05:30"},{"URL":"www.youtube.com","HitCount":446,"TimeStamp":"2024-08-21 20:02:55+05:30"},{"URL":"www7.lunapic.com","HitCount":6,"TimeStamp":"2024-09-04 17:01:19+05:30"},{"URL":"xadsmart.com","HitCount":4,"TimeStamp":"2024-07-11 00:37:47+05:30"},{"URL":"yts.mx","HitCount":4,"TimeStamp":"2024-07-25 08:10:00+05:30"}]', '2024-10-08 12:46:59', '2024-10-08 12:46:59'),
	(5, 3, '51.33 %', '[{"URL":"1xlite-529281.top","HitCount":2,"TimeStamp":"2024-04-30 22:13:27+05:30"},{"URL":"367p.com","HitCount":8,"TimeStamp":"2024-07-11 00:34:44+05:30"}]', '2024-10-08 12:53:40', '2024-10-08 12:53:40'),
	(6, 3, '13.33 %', '[{"URL":"1xlite-529281.top","HitCount":2,"TimeStamp":"2024-04-30 22:13:27+05:30"},{"URL":"367p.com","HitCount":8,"TimeStamp":"2024-07-11 00:34:44+05:30"}]', '2024-10-08 12:55:12', '2024-10-08 12:55:12');

-- Dumping structure for table forenshield.router_analytics
CREATE TABLE IF NOT EXISTS `router_analytics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `crime_scene` bigint unsigned NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mac` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hostname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_ports` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `os_guess` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_seen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.router_analytics: ~1 rows (approximately)
INSERT INTO `router_analytics` (`id`, `crime_scene`, `ip`, `mac`, `hostname`, `vendor`, `latency`, `open_ports`, `os_guess`, `first_seen`, `result`, `created_at`, `updated_at`) VALUES
	(1, 3, '3', '3', '3', '3', '3', '3', '3', '3', '3', '2024-10-08 13:11:35', '2024-10-08 13:11:35');

-- Dumping structure for table forenshield.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.sessions: ~2 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('a2t06oQ10YFYFKs8sAjvAuX9YHKbHAv7ifrilX4g', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzdrTHBaMXFHanNId2ZXeHdIc29EQ2xsSE83NGwybGhOYlF5dmtyYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1728408146),
	('FmYdEexACCIte4WOlm0KpXjG09NsBgUx6Eewc1Rt', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibkpRZDhuV1c4V0tlZ0lBRnpTZzg1YzZkckN5ZnFEVWc3c0VXWFRTWSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1728408146),
	('HuXlNxWxKn0hJJSZ5msKbx9qPMZHRLQgZ3tvDdpe', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0', 'YTo1OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2hpc3RvcnkvZGF0YTQvMyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoiX3Rva2VuIjtzOjQwOiJwbkFOSk5adE9tVFpBcnRiSE9ySUZWYnRGU0dGQkphNzlBZXhSTXVGIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6NDoiYXV0aCI7YToxOntzOjIxOiJwYXNzd29yZF9jb25maXJtZWRfYXQiO2k6MTcyODQwNDc4Njt9fQ==', 1728413998);

-- Dumping structure for table forenshield.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table forenshield.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `nic`, `email`, `address`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', '111111111V', 'admin@gmail.com', NULL, NULL, '$2y$12$x02cCbb3vRWBu3aRDtWyq.7R44VkEzgB6qGTpVDHAsMO3INUCFijm', 1, 'DaWXR9RgYMKatEff1J7K3SCNERC1TjVaXHDpaFkYuN9uV8AIn89FdmaDnF0K', '2024-10-08 08:19:18', '2024-10-08 08:19:18'),
	(4, 'Investigator', '222222222V', 'investigator@gmail.com', NULL, NULL, '$2y$12$s4xuk3m8TsIvI19WATNylubQHZzKOcLhXv9jLZ7zNHqgi5Auk59tm', 0, '6iFDIa7DCCZhbAeu7Gbrw20QrwxP9PHM5WwJ4zdKkXo74IoskqimQMdsZDz8', '2024-10-08 08:41:12', '2024-10-08 08:41:12'),
	(5, 'test', '995522585V', 'test@gmail.com', NULL, NULL, '$2y$12$Qpw8rISrXV2sjcOYpeAPqOVJCFpbn7iENFyyheQ49R8lqwE793FTW', 0, NULL, '2024-10-08 08:43:05', '2024-10-08 08:43:05');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
