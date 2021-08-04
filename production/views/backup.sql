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
INSERT INTO `ass_students` VALUES (1212,'soma',3,1,5656,1,'uploads_std/1212_as.css','Your Solution is accepted'),(1232,'soma',3,1,121,1,'uploads_std/1232_40 BCS.PNG','Your Solution is accepted');
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
INSERT INTO `assignments` VALUES (121,'rafik','CC','Lecturer',780,'uploads/121_PP.jpg','2021-09-02',2,3,'121_PP.jpg'),(1212,'rafik','Asas','Lecturer',5656,'uploads/1212_as.css','2021-08-26',1,3,'1212_as.css'),(1232,'rafik','Sample Code','Lecturer',121,'uploads/1232_ssc-sumi.pdf','2021-08-19',1,3,'1232_ssc-sumi.pdf');
/*!40000 ALTER TABLE `assignments` ENABLE KEYS */;
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
INSERT INTO `live_class_sir` VALUES (1222,1,2,'Ass','rafik','Lecturer','asas','2021-08-18 00:52:00'),(1231,1,3,'System Control','abbas','Associate Professor','https://meet.google.com/tux-pdgd-cwi','2021-08-20 14:52:00'),(1232,1,1,'Java Programming','abbas','Associate Professor','https://meet.google.com/tux-pdgd-cwi','2021-08-17 01:17:00'),(1234,1,1,'Microservice','rafik','Lecturer','https://meet.google.com/tux-pdgd-cwi','2021-08-25 03:14:00'),(12340,1,1,'Java Fundamentals','Adal','Lecturer','https://ww.cc','2021-08-04 08:01:00'),(12342,1,1,'Mathematics','abbas','Associate Professor','https://ss.com','2021-08-10 08:45:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (17,'asa','as','Associate Professor','2021-08-01 23:21:47','abbas'),(22,'sdsd','sdsds','student','2021-08-04 11:49:47','soma');
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
  `sems` int(10) unsigned DEFAULT 0,
  `year` int(10) unsigned DEFAULT 0,
  PRIMARY KEY (`sl`) USING BTREE,
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES (1,'01799729507','Lecturer','Rafiqul','Islam','cse','admin@gmail.com','male','ASS','rafik',0,0),(2,'01793112066','student','Soma','Akter','cse','ad@cc','female','ASAs','soma',1,3),(4,'01821076073','Associate Professor','Abbas','Khan','cse','Abbas@gmail.com','male','KAS','abbas',0,0),(5,'01793170661','student','Asif','Mia','cse','soma@gogo.com','male','Korail','asif',1,1),(6,'01821076973','Lecturer','Adal','Khan','cse','adal@c','male','Gopalpur','Adal',0,0);
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
INSERT INTO `users` VALUES (1,'admin','$2y$10$qL2skC7LNlTzgPVOXERSp.AodLzJQVBMR11M6krzzJVy8BGrTY3Su','2021-07-31 23:38:38','admin','active'),(2,'soma','$2y$10$srZSGYOG2ljKgnQe2VxPjOUb1JQk8Yarpdfs92Zx4Zaf4NGLlicXy','2021-07-31 23:39:18','user','active'),(3,'rafik','$2y$10$TllshOboCCk3GzBXit1qkeZAjv74cLgd2W0txPdg2.XsX.NwAFyHi','2021-07-31 23:39:41','sir','active'),(4,'abbas','$2y$10$5ipfYs7dX4zaMgRc2.V.N.iQpLf2Tr2a/C.bjkhut.CP5cJ7LTp3y','2021-07-31 23:39:56','sir','active'),(5,'Adal','$2y$10$QamNAEQt5dYSbPxjnfNWUuYRu7xlV.6aIUyUqmtOd1S7rkno80QAC','2021-07-31 23:52:14','sir','active'),(7,'asif','$2y$10$QOmvW/Y8cpG2ITiZJElj9eETISLh.oGgVbHPUWaatajsSox7eAiqe','2021-08-02 18:35:05','user','active');
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

-- Dump completed on 2021-08-05  0:33:20
