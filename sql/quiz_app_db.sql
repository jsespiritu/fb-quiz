-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: quiz_app_db
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `cms_users`
--

DROP TABLE IF EXISTS `cms_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_users` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_users`
--

LOCK TABLES `cms_users` WRITE;
/*!40000 ALTER TABLE `cms_users` DISABLE KEYS */;
INSERT INTO `cms_users` VALUES (1,'Jerwin Espiritu','jerwin','69de95c2ca82ff51bf7c2c9eb4273a8f');
/*!40000 ALTER TABLE `cms_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `error_log`
--

DROP TABLE IF EXISTS `error_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `error_log` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `error_code` varchar(255) DEFAULT NULL,
  `description` text,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `error_log`
--

LOCK TABLES `error_log` WRITE;
/*!40000 ALTER TABLE `error_log` DISABLE KEYS */;
INSERT INTO `error_log` VALUES (1,'access_denied','','2012-08-12 16:35:25'),(2,NULL,'','2012-08-13 08:29:31');
/*!40000 ALTER TABLE `error_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(9) DEFAULT NULL,
  `score` int(9) DEFAULT NULL,
  `quiz_group_id` int(9) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_history`
--

DROP TABLE IF EXISTS `post_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_history` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(100) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_history`
--

LOCK TABLES `post_history` WRITE;
/*!40000 ALTER TABLE `post_history` DISABLE KEYS */;
INSERT INTO `post_history` VALUES (1,'100001156327964','1','2012-08-13 08:51:50'),(2,'100001156327964','{\"id\":\"100001156327964_488712287806383\"}','2012-08-13 09:00:20'),(3,'533265634','{\"id\":\"533265634_276806749089938\"}','2012-08-21 02:10:45'),(4,'533265634','{\"id\":\"533265634_331581390267766\"}','2012-08-21 02:56:06'),(5,'533265634','{\"id\":\"533265634_504545616238879\"}','2012-08-21 05:38:48'),(6,'533265634','{\"id\":\"533265634_492802470731158\"}','2012-08-23 01:45:51'),(7,'533265634','{\"id\":\"533265634_361238910619879\"}','2012-09-03 01:49:57'),(8,'533265634','{\"id\":\"533265634_255754744544629\"}','2012-09-03 01:51:20'),(9,'533265634','{\"id\":\"533265634_466468103388159\"}','2012-09-03 01:51:50'),(10,'533265634','{\"id\":\"533265634_502476959780169\"}','2012-09-03 01:57:28'),(11,'533265634','{\"id\":\"533265634_528119143871352\"}','2012-09-03 01:57:52'),(12,'533265634','{\"id\":\"533265634_277620499005745\"}','2012-09-03 03:04:23'),(13,'100000168776795','{\"id\":\"100000168776795_278963028872457\"}','2012-09-03 14:41:41'),(14,'100000168776795','{\"id\":\"100000168776795_265978116854357\"}','2012-09-03 14:48:25'),(15,'533265634','{\"id\":\"533265634_284196841682374\"}','2012-10-01 08:58:52'),(16,'533265634','{\"id\":\"533265634_410514562349004\"}','2012-10-01 13:36:29'),(17,'533265634','{\"id\":\"533265634_355450417876396\"}','2012-10-01 13:37:57'),(18,'533265634','{\"id\":\"533265634_202031173264253\"}','2012-10-01 13:38:23'),(19,'533265634','{\"id\":\"533265634_486459141388845\"}','2012-10-01 13:38:27');
/*!40000 ALTER TABLE `post_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quizzes`
--

DROP TABLE IF EXISTS `quizzes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quizzes` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `priority` int(9) DEFAULT '0',
  `question` text,
  `choices` text,
  `correct_answer` char(2) DEFAULT NULL,
  `group_id` int(9) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quizzes`
--

LOCK TABLES `quizzes` WRITE;
/*!40000 ALTER TABLE `quizzes` DISABLE KEYS */;
INSERT INTO `quizzes` VALUES (1,1,'What is the first word of the 1987 Philipppine Constitution?','[\"a. I\",\"b. We\",\"c. The\",\"d. People\"]','b',1,'2012-10-01 14:08:30'),(2,2,'Who was the first Miss Philippines?','[\"a. Margi Moran\",\"b. Mirriam Quiambao\",\"c. Evangeline Castro\",\"d. Gloria Diaz\"]','c',1,'2012-10-01 14:08:22'),(3,3,'Whose last words were ','[\"a. Jose Rizal\",\"b. Ninoy Aquino\",\"c. Manuel Quezon\",\"d. Andres Bonifacio\"]','a',3,'2012-10-01 14:08:15'),(4,4,'Who was the first Filipino Olympian?','[\"a. Paeng Nepomuceno\",\"b. Akiko Thompson\",\"c. Efren Bata Reyes\",\"d. David Nepomuceno\"]','d',3,'2012-10-01 14:07:56'),(5,5,'Who designed the Rizal Monument?','[\"a. Carlos Nicoli\",\"b. Richard Kissling\",\"c. David Antel\",\"d. Antonio Luna\"]','b',4,'2012-10-01 14:07:46'),(10,1,'Who founded the la Liga Filipina?','[\"a. Andres Bonifacio\",\"b. Jose Rizal\",\"c. Emilio Aguinaldo\",\"d. Emilio Jacinto\"]','b',4,'2012-10-01 14:01:18'),(11,2,'Who was the first Filipino recording artist?','[\"a. Imelda Papin\",\"b. Pilita Corales\",\"c. Margi Moran\",\"d. Maria Carpena\"]','d',4,'2012-10-01 14:00:17');
/*!40000 ALTER TABLE `quizzes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ranks`
--

DROP TABLE IF EXISTS `ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ranks` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `level` int(9) DEFAULT NULL,
  `user_id` int(9) DEFAULT NULL,
  `score` int(9) DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ranks`
--

LOCK TABLES `ranks` WRITE;
/*!40000 ALTER TABLE `ranks` DISABLE KEYS */;
/*!40000 ALTER TABLE `ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scheduler`
--

DROP TABLE IF EXISTS `scheduler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scheduler` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scheduler`
--

LOCK TABLES `scheduler` WRITE;
/*!40000 ALTER TABLE `scheduler` DISABLE KEYS */;
INSERT INTO `scheduler` VALUES (1,'Week 0','Quiz for aug 01 to 20','2012-08-05'),(2,'Week 2','Quiz for week 2','2012-07-01'),(3,'week 1','Quiz for week 1.5','2012-08-01'),(4,'week 3','Quiz for week 3','2012-08-17');
/*!40000 ALTER TABLE `scheduler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(9) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `fb_id` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `birthday` varchar(20) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date_joined` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jerwin Espiritu','533265634','jerwin_32@yahoo.com','10/03/1978','http://www.facebook.com/jerwinse','male','2012-08-13 12:20:41'),(2,'Myca Hennessie Espiritu','100001156327964','myca.espiritu@yahoo.com','10/14/1982','http://www.facebook.com/mycahennessiee','female','2012-08-13 12:24:40'),(3,'Raw Drol','100000168776795','jerwinse@gmail.com','10/03/1980','http://www.facebook.com/raw.drol.3','male','2012-09-03 14:41:38');
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

-- Dump completed on 2012-10-02 12:32:48
