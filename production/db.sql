-- MariaDB dump 10.19  Distrib 10.5.9-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: webmaster
-- ------------------------------------------------------
-- Server version	10.5.9-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ass_students`
--

CREATE DATABASE `webmaster`;
USE `webmaster`;
DROP TABLE IF EXISTS `ass_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ass_students` (
  `ass_id` int(10) unsigned NOT NULL,
  `by` varchar(100) NOT NULL,
  `year` int(10) unsigned NOT NULL,
  `sems` int(10) unsigned NOT NULL,
  `points` int(10) unsigned NOT NULL DEFAULT 0,
  `submitted` int(10) unsigned NOT NULL DEFAULT 0,
  `file_location` varchar(500) NOT NULL DEFAULT 'nofile.txt',
  `remarks` varchar(500) NOT NULL DEFAULT 'nocomment',
  PRIMARY KEY (`ass_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ass_students`
--

LOCK TABLES `ass_students` WRITE;
/*!40000 ALTER TABLE `ass_students` DISABLE KEYS */;
/*!40000 ALTER TABLE `ass_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assignments` (
  `ass_id` int(10) unsigned NOT NULL,
  `by` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `points` int(100) NOT NULL,
  `file_location` varchar(500) NOT NULL DEFAULT 'uploads/nofile.txt',
  `dead_line` date NOT NULL,
  `sems` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL DEFAULT 'nofile.txt',
  PRIMARY KEY (`ass_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignments`
--

LOCK TABLES `assignments` WRITE;
/*!40000 ALTER TABLE `assignments` DISABLE KEYS */;
/*!40000 ALTER TABLE `assignments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam` (
  `exam_id` int(10) unsigned NOT NULL,
  `exam_name` varchar(200) NOT NULL,
  `by` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `marks` int(10) NOT NULL DEFAULT 0,
  `duration` int(10) NOT NULL DEFAULT 10,
  `sems` int(10) NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam`
--

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
/*!40000 ALTER TABLE `exam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam_std`
--

DROP TABLE IF EXISTS `exam_std`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam_std` (
  `exam_id` int(10) unsigned NOT NULL,
  `exam_name` varchar(50) NOT NULL,
  `by` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL DEFAULT 'Teacher',
  `submitted_by` varchar(50) NOT NULL,
  `status` int(10) unsigned NOT NULL DEFAULT 0,
  `marks` int(10) unsigned NOT NULL DEFAULT 0,
  `year` int(11) NOT NULL,
  `sems` int(11) NOT NULL,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam_std`
--

LOCK TABLES `exam_std` WRITE;
/*!40000 ALTER TABLE `exam_std` DISABLE KEYS */;
/*!40000 ALTER TABLE `exam_std` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `live_class_sir`
--

DROP TABLE IF EXISTS `live_class_sir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `live_class_sir` (
  `class_id` int(10) unsigned NOT NULL,
  `sems` int(10) unsigned NOT NULL,
  `year` int(10) unsigned NOT NULL,
  `class_title` varchar(50) NOT NULL,
  `by` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `links` varchar(50) NOT NULL,
  `dead_line` datetime NOT NULL,
  PRIMARY KEY (`class_id`),
  UNIQUE KEY `dead_line` (`dead_line`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `live_class_sir`
--

LOCK TABLES `live_class_sir` WRITE;
/*!40000 ALTER TABLE `live_class_sir` DISABLE KEYS */;
/*!40000 ALTER TABLE `live_class_sir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `no` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `message` varchar(400) NOT NULL,
  `designation` varchar(50) NOT NULL DEFAULT 'student',
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `by` varchar(50) NOT NULL,
  PRIMARY KEY (`no`) USING BTREE,
  UNIQUE KEY `by` (`by`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_info` (
  `sl` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(50) NOT NULL DEFAULT '00000000000',
  `designation` varchar(50) NOT NULL DEFAULT 'student',
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `department` varchar(10) NOT NULL DEFAULT 'cse',
  `email` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL DEFAULT 'male',
  `address` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `sems` int(10) unsigned NOT NULL DEFAULT 0,
  `year` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`sl`) USING BTREE,
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joined` datetime DEFAULT current_timestamp(),
  `role` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$qL2skC7LNlTzgPVOXERSp.AodLzJQVBMR11M6krzzJVy8BGrTY3Su','2021-07-31 23:38:38','admin','active');
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

-- Dump completed on 2021-08-07 21:34:04
