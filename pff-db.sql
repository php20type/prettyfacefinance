-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: laravel_prettyfacefinance
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `buying_options`
--

DROP TABLE IF EXISTS `buying_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buying_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buying_options`
--

LOCK TABLES `buying_options` WRITE;
/*!40000 ALTER TABLE `buying_options` DISABLE KEYS */;
INSERT INTO `buying_options` VALUES (1,'0.55ml',170.00,2,'2018-01-25 16:40:29','2018-01-25 16:40:29'),(2,'1ml',280.00,2,'2018-01-25 16:40:29','2018-01-25 16:40:29'),(3,'1.5ml',395.00,2,'2018-01-25 16:40:29','2018-01-25 16:40:29'),(4,'2ml',480.00,2,'2018-01-25 16:40:29','2018-01-25 16:40:29'),(5,'0.5ml',150.00,3,'2018-01-25 16:41:36','2018-01-25 16:41:36'),(6,'1ml',250.00,3,'2018-01-25 16:41:36','2018-01-25 16:41:36'),(7,'1.5ml',335.00,3,'2018-01-25 16:41:36','2018-01-25 16:41:36'),(8,'2ml',410.00,3,'2018-01-25 16:41:36','2018-01-25 16:41:36'),(9,'1 Session',40.00,4,'2018-01-25 17:05:33','2018-01-25 17:05:33'),(10,'6 Sessions',160.00,4,'2018-01-25 17:05:33','2018-01-25 17:05:33'),(11,'12 Sessions',300.00,4,'2018-01-25 17:05:33','2018-01-25 17:05:33');
/*!40000 ALTER TABLE `buying_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Lip Enhancement',1,'2018-01-25 16:36:13','2018-01-25 16:38:35'),(2,'Skincare',1,'2018-01-25 17:04:13','2018-01-25 17:04:27'),(3,'3D Lipo',1,'2018-01-25 17:11:17','2018-01-25 17:11:34');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clinics`
--

DROP TABLE IF EXISTS `clinics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clinics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT '',
  `city` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `company_number` varchar(255) NOT NULL DEFAULT '',
  `profession` varchar(255) NOT NULL DEFAULT '',
  `pin` varchar(255) NOT NULL DEFAULT '',
  `prescriber_name` varchar(255) NOT NULL DEFAULT '',
  `prescriber_email` varchar(255) NOT NULL DEFAULT '',
  `prescriber_pin` varchar(255) NOT NULL DEFAULT '',
  `paylater_id` int(11) NOT NULL DEFAULT '0',
  `logo` varchar(255) NOT NULL DEFAULT '',
  `description` longtext,
  `approved` int(11) NOT NULL DEFAULT '0',
  `paid` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clinics_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clinics`
--

LOCK TABLES `clinics` WRITE;
/*!40000 ALTER TABLE `clinics` DISABLE KEYS */;
INSERT INTO `clinics` VALUES (1,'Mac Aesthetics','lewis@visionsharp.co.uk','01616973096','78 Bury Old Road','Whitefield','Manchester','M45 6TQ','http://www.mc-aesthetics.co.uk/','0123456','Clinician/Beautician','0123','Test Prescriber','testpresriber@example.com','0123',0,'/img/profile_images/1.png','We offer non-surgical facial aesthetic procedures in both our Manchester & luxurious Birmingham Clinics.\r\n\r\nIf you’re looking to plump up your lips into a voluptuous pout or reduce the appearance of lines and wrinkles on your face – then we can provide a fully qualified, professional and effective service to help restore a more youthful appearance. All our treatments are available to both male and female clients.',1,1,'2018-01-25 16:33:47','2018-01-25 16:42:04'),(2,'Aesthetic Beauty Academy UK','samantha.boyes@hotmail.co.uk','www.aestheticbeautyuk.co.uk','Victoria Buildings','Victoria Street','Rotherham','S64 5SQ','www.aestheticbeautyuk.co.uk','0123','Clinician/Beautician','0123','Test Prescriber','testpresriber@example.com','0123',0,'/img/profile_images/2.png','We offer a wide range of courses in hair, beauty, nails, aesthetics please look at our sister site.\r\n\r\nSamantha is also available for freelance work if you need a teacher/assessor/IQA for your training centre.',1,1,'2018-01-25 17:00:39','2018-01-25 17:05:40'),(4,'3D Lipo Warrington','3dlipowarrington@gmail.com','07951177035','145 Vincent Close',NULL,'Warrington','WA5 8TB','www.3dlipowarrington.co.uk/','0123456','Clinician/Beautician','1230','Test Prescriber','testpresriber@example.com','0123',0,'/img/profile_images/4.png','Do you want to sculpt your body shape?\r\n\r\nDo you want to reduce the appearance of your muffin tops, bingo wings or that last bit of stubborn fat you can\'t shift despite eating clean and exercising?',1,1,'2018-01-25 17:09:43','2018-01-25 17:12:05');
/*!40000 ALTER TABLE `clinics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question` longtext NOT NULL,
  `answer` longtext NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` longtext,
  `user_id` int(11) NOT NULL,
  `read` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'A new clinic has registered! <a href=\'/admin/clinics\'>View</a>',1,0,'2018-01-25 16:33:47','2018-01-25 16:33:47'),(2,'A new category has been requested! <a href=\'/admin/categories\'>View</a>',1,0,'2018-01-25 16:36:13','2018-01-25 16:36:13'),(3,'A new clinic has registered! <a href=\'/admin/clinics\'>View</a>',1,0,'2018-01-25 17:00:39','2018-01-25 17:00:39'),(4,'A new category has been requested! <a href=\'/admin/categories\'>View</a>',1,0,'2018-01-25 17:04:13','2018-01-25 17:04:13'),(5,'A new clinic has registered! <a href=\'/admin/clinics\'>View</a>',1,0,'2018-01-25 17:09:43','2018-01-25 17:09:43'),(6,'A new category has been requested! <a href=\'/admin/categories\'>View</a>',1,0,'2018-01-25 17:11:17','2018-01-25 17:11:17');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (235,'2014_10_12_000000_create_users_table',1),(236,'2014_10_12_100000_create_password_resets_table',1),(237,'2017_11_27_134426_create_clinics_table',1),(238,'2017_11_29_111014_create_roles_table',1),(239,'2017_11_29_111102_create_services_table',1),(240,'2017_11_29_111854_create_buying_options_table',1),(241,'2017_11_29_112128_create_categories_table',1),(242,'2017_12_13_151659_create_messages_table',1),(243,'2018_01_16_165827_create_faq_table',1),(244,'2018_01_22_140015_create_qualifications_table',1),(245,'2018_01_24_081613_create_orders_table',1),(246,'2018_01_24_082450_create_order_items_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `option` varchar(255) NOT NULL DEFAULT '',
  `clinic_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,'2018-01-25 16:54:47','2018-01-25 16:54:47',2,170.00,1,'0.55ml',1,1);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `item_count` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'payl8ter',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `clinic_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'2018-01-25 16:54:47','2018-01-25 16:54:47',1,170.00,'Awaiting Payl8r Decision',0,1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualifications`
--

DROP TABLE IF EXISTS `qualifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clinic_id` int(11) NOT NULL,
  `path` text NOT NULL,
  `description` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qualifications`
--

LOCK TABLES `qualifications` WRITE;
/*!40000 ALTER TABLE `qualifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `qualifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `clinic_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Correction / Disolver','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',150.00,1,1,'2018-01-25 16:39:24','2018-01-25 16:39:24'),(2,'Juvederm','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur',NULL,1,1,'2018-01-25 16:40:29','2018-01-25 16:40:29'),(3,'Restylane','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur',NULL,1,1,'2018-01-25 16:41:36','2018-01-25 16:41:36'),(4,'Diamond Dermabrasion','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',NULL,2,2,'2018-01-25 17:05:33','2018-01-25 17:05:33'),(5,'6 Sessions','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',699.99,3,4,'2018-01-25 17:12:00','2018-01-25 17:12:00');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL DEFAULT '',
  `telephone_secondary` varchar(255) NOT NULL DEFAULT '',
  `date_of_birth` varchar(255) NOT NULL DEFAULT '',
  `address1` varchar(255) DEFAULT '',
  `address2` varchar(255) DEFAULT '',
  `city` varchar(255) NOT NULL DEFAULT '',
  `postcode` varchar(255) NOT NULL DEFAULT '',
  `in_arrears` int(11) NOT NULL DEFAULT '0',
  `role` int(11) NOT NULL DEFAULT '1',
  `paylater_id` int(11) NOT NULL DEFAULT '0',
  `clinic_id` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Lewis Stanton','lewis@visionsharp.co.uk','$2y$10$PPlhBs2MvP20r/0d2S/o1.L4ZqqbMYDJhHfOUeJTiZHXkab8FG9Va','','','','','','','',0,1,0,1,'iwpVdyLxlA149EYYu1nH3bMkc6hv124oEGy06OAw7cnrdzAeN3atvpMpSi3w','2018-01-25 16:33:47','2018-01-25 16:33:47'),(2,'Samantha Boyes','samantha.boyes@hotmail.co.uk','$2y$10$dKsGDAEqJwfnjZKQdWisV.hS9y9ml74O6XYLvjGB4zxG0sgCZmO7W','','','','','','','',0,0,0,2,'RsWkoawAv9X6x3KwujIabksYXC3XmRxd53V4JorNuAaPasrQF44F05op3c9a','2018-01-25 17:00:39','2018-01-25 17:00:39'),(3,'Random Person','andrew@example.com','$2y$10$9bcRB19je/oxWBv81yFBu.trKuKpgnfOVS0OOq2wQSLjE.BbuX6I6','','','','','','','',0,0,0,4,NULL,'2018-01-25 17:09:43','2018-01-25 17:09:43');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-29 10:23:51
