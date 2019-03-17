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
  `description` text,
  `score` int(11) DEFAULT NULL,
  `criterium` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`idaspect`),
  KEY `fk_aspect_assignment1_idx` (`idassignment`),
  CONSTRAINT `fk_aspect_assignment1` FOREIGN KEY (`idassignment`) REFERENCES `assignment` (`idassignment`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspect`
--

LOCK TABLES `aspect` WRITE;
/*!40000 ALTER TABLE `aspect` DISABLE KEYS */;
INSERT INTO `aspect` VALUES (1,1,'De kandidaat heeft bronnen zijn vermeld, De kandidaat geeft aan welke informatie uit bronnen is gehaald. De kandidaat past een zoekstrategie toe',3,0,1),(4,1,'De kandidaat heeft alle bronnen zijn vermeld,\r\nDe kandidaat geeft niet altijd aan welke informatie uit bronnen is gehaald. \r\nDe kandidaat past een zoekstrategie toe',2,0,1),(5,1,'De kandidaat heeft geen bronnen vermeld.',0,0,1),(6,1,'De kandidaat heeft niet alle bronnen vermeld, De kandidaat geeft niet altijd aan welke informatie uit bronnen is gehaald. De kandidaat past een zoekstrategie toe',1,0,1),(7,2,'De kandidaat heeft een ontwerp voor een applicatie gemaakt.\r\nHet ontwerp kan worden gebruikt door een ontwikkelaar om verder te ontwikkelen\r\nHet ontwerp van de applicatie sluit aan bij de doelgroep voor wie het is bedoeld.\r\nHet ontwerp werkt correct en laat geeft alle functionaliteit van de applicatie weer',3,0,1),(8,2,'De kandidaat heeft een ontwerp voor een applicatie gemaakt.\r\nHet ontwerp kan worden gebruikt door een ontwikkelaar om verder te ontwikkelen\r\nHet ontwerp van de applicatie sluit aan bij de doelgroep voor wie het is bedoeld.\r\nHet ontwerp werkt correct en laat bi geeft bijna alle functionaliteit van de applicatie weer',2,0,1),(9,2,'De kandidaat heeft een ontwerp voor een applicatie gemaakt.\r\nHet ontwerp kan worden gebruikt door een ontwikkelaar om verder te ontwikkelen\r\nHet ontwerp van de applicatie sluit aan bij de doelgroep voor wie het is bedoeld.\r\nHet ontwerp werkt correct, maar het geeft de belangrijkste functionaliteit van de applicatie niet goed weer',1,0,1),(10,2,'De kandidaat heeft geen bruikbaar ontwerp voor een applicatie gemaakt.\r\nHet ontwerp kan niet worden gebruikt door een ontwikkelaar om verder te ontwikkelen',0,0,1),(11,3,'De kandidaat heeft gebruik gemaakt van geschikte software om het ontwerp te maken.\r\nDe kandidaat heeft op de juiste manier en met de juiste gereedschappen gebruik gemaakt van de ontwerp software.\r\n',3,0,1),(12,3,'De kandidaat heeft gebruik gemaakt van geschikte software om het ontwerp te maken.\r\nDe kandidaat heeft niet altijd op de juiste manier en met de juiste gereedschappen gebruik gemaakt van de ontwerp software.',2,0,1),(13,3,'De kandidaat heeft gebruik gemaakt van geschikte software om het ontwerp te maken.\r\nDe kandidaat heeft consessies gedaan aan zijn ontwerp doordat hij niet de juiste gereedschappen in de ontwerp software heeft gebruikt.',1,0,1),(14,3,'De kandidaat heeft geen ontwerpsoftware gebruikt om het ontwerp te maken. Het ontwerp is van onvoldoende kwaliteit.',0,0,1),(15,4,'De kandidaat heeft anderen gevraagd een reactie geven op zijn/haar ontwerp.\r\nDe kandidaat heeft hierbij gebruik gemaakt van een geschikt digitaal medium.',2,0,1),(16,4,'De kandidaat heeft anderen gevraagd een reactie geven op zijn/haar ontwerp.\r\nDe kandidaat heeft hierbij geen gebruik gemaakt van een geschikt digitaal medium.',1,0,1),(17,4,'De kandidaat heeft anderen gevraagd niet om een reactie geven op zijn/haar ontwerp.\r\n',0,0,1),(18,5,'De kandidaat heeft gekozen voor een duurzame bewaarmogelijkheid.\r\nDe kandidaat geeft aan hoe zijn keuze voor een bewaarmogelijkheid voldoende veiligheid en integriteit biedt.\r\nDe kandidaat geeft aan wat redelijkerwijs de bewaartermijn is voor zijn/haar ontwerp.',3,0,1),(19,5,'De kandidaat heeft gekozen voor een duurzame bewaarmogelijkheid.\r\nDe kandidaat kan gedeeltelijk aangeven hoe zijn keuze voor een bewaarmogelijkheid voldoende veiligheid en integriteit biedt.\r\nDe kandidaat geeft aan wat redelijkerwijs de bewaartermijn is voor zijn/haar ontwerp.',2,0,1),(20,5,'De kandidaat heeft gekozen voor een duurzame bewaarmogelijkheid.\r\nDe kandidaat kan gedeeltelijk aangeven hoe zijn keuze voor een bewaarmogelijkheid voldoende veiligheid en integriteit biedt.\r\nDe kandidaat kan niet beargumenteren wat een redelijke bewaartermijn is voor zijn/haar werk.',1,0,1),(21,5,'De kandidaat heeft niet gekozen voor een duurzame bewaarmogelijkheid of\r\nDe kandidaat kan niet aangeven hoe zijn keuze voor een bewaarmogelijkheid voldoende veiligheid en integriteit biedt.',0,0,1),(22,6,'De kandidaat heeft een weergave gemaakt van een directorystructuur\r\nBij de indeling van materiaal heeft de kandidaat een logische opzet gekozen waarbij het voor anderen duidelijk is waar het materiaal is terug te vinden.\r\nTussenmateriaal dat niet meer gebruikt dient te worden is verwijderd.',3,0,1),(23,6,'De kandidaat heeft een weergave gemaakt van een directorystructuur\r\nBij de indeling van materiaal heeft de kandidaat een logische opzet gekozen waarbij het voor anderen duidelijk is waar het materiaal is terug te vinden.\r\nTussenmateriaal dat niet meer gebruikt dient te worden is niet verwijderd.',2,0,1),(24,6,'De kandidaat heeft een weergave gemaakt van een directorystructuur\r\nBij de indeling van materiaal heeft de kandidaat een opzet gekozen waarbij het voor anderen niet altijd duidelijk is waar het materiaal is terug te vinden.\r\nTussenmateriaal dat niet meer gebruikt dient te worden is niet verwijderd.',1,0,1),(25,6,'De kandidaat heeft geen weergave gemaakt van een directorystructuur\r\nBij de indeling van materiaal heeft de kandidaat een opzet gekozen waarbij het voor anderen niet duidelijk is waar het materiaal is terug te vinden.',0,0,1),(26,7,'De kandidaat heeft een systeem gebruikt voor versiebeheer.\r\n',1,0,1),(27,7,'De kandidaat heeft een systeem gebruikt waarbij versiebeheer alleen handmatig mogelijk is.\r\n',0,0,1);
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
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`idassignment`),
  KEY `fk_assignment_proces1_idx` (`idproces`),
  CONSTRAINT `fk_assignment_proces1` FOREIGN KEY (`idproces`) REFERENCES `proces` (`idproces`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignment`
--

LOCK TABLES `assignment` WRITE;
/*!40000 ALTER TABLE `assignment` DISABLE KEYS */;
INSERT INTO `assignment` VALUES (1,1,'W1 Wint digitale informatie in',1),(2,2,'W1 Maakt een weergave van informatie',1),(3,2,'W2 Stelt content samen',1),(4,2,'W3 Deelt informatie / content',1),(5,3,'W1 Organiseert het beheer',1),(6,3,'W2 Deelt informatie in',1),(7,3,'W3 Bewaakt bewaaromstandigheden',1);
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
  `crebo` varchar(45) DEFAULT NULL,
  `determination` date DEFAULT NULL,
  PRIMARY KEY (`idexam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam`
--

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
INSERT INTO `exam` VALUES (23,'Digitale vaardigheden',1,NULL,NULL),(505,'Veilig programmeren',1,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proces`
--

LOCK TABLES `proces` WRITE;
/*!40000 ALTER TABLE `proces` DISABLE KEYS */;
INSERT INTO `proces` VALUES (1,23,'D1-K1 Verzamelt informatie, gegevens en content',1),(2,23,'D1-K2 Produceert informatie / content',1),(3,23,'D1-K3 Beheert informatie / content',1);
/*!40000 ALTER TABLE `proces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `result` (
  `idstudent` int(11) NOT NULL,
  `idaspect` int(11) NOT NULL,
  `exam_date` date NOT NULL,
  PRIMARY KEY (`idstudent`,`idaspect`,`exam_date`),
  KEY `fk_result_aspect1_idx` (`idaspect`),
  CONSTRAINT `fk_result_aspect1` FOREIGN KEY (`idaspect`) REFERENCES `aspect` (`idaspect`),
  CONSTRAINT `fk_result_student1` FOREIGN KEY (`idstudent`) REFERENCES `student` (`idstudent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result`
--

LOCK TABLES `result` WRITE;
/*!40000 ALTER TABLE `result` DISABLE KEYS */;
/*!40000 ALTER TABLE `result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `student` (
  `idstudent` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
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

-- Dump completed on 2019-03-17 20:59:19
