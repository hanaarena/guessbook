CREATE DATABASE  IF NOT EXISTS `db_leaveword` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_leaveword`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: db_leaveword
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt-log

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
-- Not dumping tablespaces as no INFORMATION_SCHEMA.FILES table on this server
--

--
-- Table structure for table `leaveword`
--

DROP TABLE IF EXISTS `leaveword`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leaveword` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(45) default NULL,
  `userid` int(11) default NULL,
  `email` varchar(200) default NULL,
  `content` text,
  `createtime` datetime default NULL,
  `avatar` varchar(200) default NULL,
  `ip` varchar(100) default NULL,
  `replaytime` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leaveword`
--

LOCK TABLES `leaveword` WRITE;
/*!40000 ALTER TABLE `leaveword` DISABLE KEYS */;
INSERT INTO `leaveword` VALUES (2,'name2',2,NULL,'content2','2014-07-21 17:14:42','avatar2','127.0.0.1',NULL),(3,'name3',3,NULL,'content3','2014-07-16 20:06:55','avatar3','127.0.0.1',NULL),(5,'name5',0,'u','content5','0000-00-00 00:00:00','avatar5','127.0.0.1',NULL),(8,'name8',905068887,'oneone','content2','2014-07-23 14:16:46','avatar5','127.0.0.1',NULL),(9,'name9',19286749,'name9','name9name9name9','2014-07-23 14:19:27','avatar5','127.0.0.1',NULL),(10,'dfgffffffff',1954296656,'ggg','dfgffffffffdfgffffffffdfgffffffffdfgffffffffdfgffffffff','2014-07-23 14:47:20','avatar5','127.0.0.1',NULL),(11,'last0',1897853748,'admin@example.com','admin@example.com','2014-07-23 14:59:49','avatar5','127.0.0.1',NULL);
/*!40000 ALTER TABLE `leaveword` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-25 20:29:52
