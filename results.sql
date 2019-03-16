-- MySQL dump 10.13  Distrib 8.0.11, for macos10.13 (x86_64)
--
-- Host: localhost    Database: results
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aspect`
--

DROP TABLE IF EXISTS `aspect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `aspect` (
  `idaspect` int(11) NOT NULL AUTO_INCREMENT,
  `idassignment` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `criterium` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`idaspect`),
  KEY `fk_aspect_assignment1_idx` (`idassignment`),
  CONSTRAINT `fk_aspect_assignment1` FOREIGN KEY (`idassignment`) REFERENCES `assignment` (`idassignment`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspect`
--

LOCK TABLES `aspect` WRITE;
/*!40000 ALTER TABLE `aspect` DISABLE KEYS */;
INSERT INTO `aspect` VALUES (1,6,'effe een slecht aspect',0,0,1),(2,6,'En nog een waardeloos aspect',1,0,1),(3,6,'E nogdko ook',2,0,1),(4,6,'En de laatste',3,0,1),(5,4,'Hier kan nog wel een aspectje bij',0,0,1),(6,4,'Doe er nog maar eentje',1,0,1),(7,4,'Dit is al wat beter',2,0,1),(8,4,'Dit is goed',3,0,1),(9,1,'Aspect 1',0,0,1),(10,1,'Asoect 2',1,0,1);
/*!40000 ALTER TABLE `aspect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `assignment`
--

DROP TABLE IF EXISTS `assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `assignment` (
  `idassignment` int(11) NOT NULL AUTO_INCREMENT,
  `idproces` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`idassignment`),
  KEY `fk_assignment_proces1_idx` (`idproces`),
  CONSTRAINT `fk_assignment_proces1` FOREIGN KEY (`idproces`) REFERENCES `proces` (`idproces`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignment`
--

LOCK TABLES `assignment` WRITE;
/*!40000 ALTER TABLE `assignment` DISABLE KEYS */;
INSERT INTO `assignment` VALUES (1,8,'Zomaar even een assignment',1),(2,8,'En nog een',1),(3,8,'En nog maar wat',1),(4,5,'heir effe een assignment',1),(5,5,'en we hebben er nog eene',1),(6,11,'Even een assigenment hoor',1);
/*!40000 ALTER TABLE `assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `exam` (
  `idexam` int(11) NOT NULL,
  `description` varchar(254) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idexam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam`
--

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
INSERT INTO `exam` VALUES (23,'Digitale vaardigheden',1),(505,'Veilig programmeren',1),(25187,'B1-K1 Ontwerpen van een applicatie',1),(876876,'jhkjh',1);
/*!40000 ALTER TABLE `exam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proces`
--

DROP TABLE IF EXISTS `proces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `proces` (
  `idproces` int(11) NOT NULL AUTO_INCREMENT,
  `idexam` int(11) NOT NULL,
  `description` varchar(254) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idproces`),
  KEY `fk_assignment_exam_idx` (`idexam`),
  CONSTRAINT `fk_assignment_exam` FOREIGN KEY (`idexam`) REFERENCES `exam` (`idexam`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proces`
--

LOCK TABLES `proces` WRITE;
/*!40000 ALTER TABLE `proces` DISABLE KEYS */;
INSERT INTO `proces` VALUES (5,23,'en nog wat',1),(6,23,'Zomaar gedoe',1),(7,23,'We gaan nog even door',1),(8,505,'hkljh',1),(9,505,'kljhkjhk',1),(10,505,'kjhkjhkjh',1),(11,25187,'lkjhkhkjh',1),(12,25187,'kjhkhjiuyoiy',1),(13,505,'nosdfsldkjsdf sdfpsodifsdfjs df;slfk ',1),(14,23,'sdflksj dfpseofis dflksjefsdfslj ',1),(15,23,'',1),(16,876876,'kl;klhklh',1),(17,876876,'kl;klhklh',1),(18,876876,'kl;klhklh',1),(19,876876,'khkljhkjh',1),(20,876876,'lkjhkljh',1),(21,23,'kljhkhjkljh',1),(22,23,'lkjhkjh',1),(23,505,'8iuyiuy',1),(24,23,'kakeldiebakeldie',1);
/*!40000 ALTER TABLE `proces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `student` (
  `idstudent` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `prefix` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idstudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (203349,'Wesley','Sneijder',NULL),(584999,'Jan Jaap','Siewers',NULL),(654332,'Klaas','Bruggeman',NULL),(788765,'Piet','Vries','de');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-16 20:32:20
