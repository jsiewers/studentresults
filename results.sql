-- MySQL dump 10.13  Distrib 8.0.14, for macos10.14 (x86_64)
--
-- Host: localhost    Database: results
-- ------------------------------------------------------
-- Server version	8.0.14

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
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspect`
--

LOCK TABLES `aspect` WRITE;
/*!40000 ALTER TABLE `aspect` DISABLE KEYS */;
INSERT INTO `aspect` VALUES (1,1,'De kandidaat heeft bronnen zijn vermeld, De kandidaat geeft aan welke informatie uit bronnen is gehaald. De kandidaat past een zoekstrategie toe',3,0,1),(4,1,'De kandidaat heeft alle bronnen zijn vermeld,\r\nDe kandidaat geeft niet altijd aan welke informatie uit bronnen is gehaald. \r\nDe kandidaat past een zoekstrategie toe',2,0,1),(5,1,'De kandidaat heeft geen bronnen vermeld.',0,0,1),(6,1,'De kandidaat heeft niet alle bronnen vermeld, De kandidaat geeft niet altijd aan welke informatie uit bronnen is gehaald. De kandidaat past een zoekstrategie toe',1,0,1),(7,2,'De kandidaat heeft een ontwerp voor een applicatie gemaakt.\r\nHet ontwerp kan worden gebruikt door een ontwikkelaar om verder te ontwikkelen\r\nHet ontwerp van de applicatie sluit aan bij de doelgroep voor wie het is bedoeld.\r\nHet ontwerp werkt correct en laat geeft alle functionaliteit van de applicatie weer',3,0,1),(8,2,'De kandidaat heeft een ontwerp voor een applicatie gemaakt.\r\nHet ontwerp kan worden gebruikt door een ontwikkelaar om verder te ontwikkelen\r\nHet ontwerp van de applicatie sluit aan bij de doelgroep voor wie het is bedoeld.\r\nHet ontwerp werkt correct en laat bi geeft bijna alle functionaliteit van de applicatie weer',2,0,1),(9,2,'De kandidaat heeft een ontwerp voor een applicatie gemaakt.\r\nHet ontwerp kan worden gebruikt door een ontwikkelaar om verder te ontwikkelen\r\nHet ontwerp van de applicatie sluit aan bij de doelgroep voor wie het is bedoeld.\r\nHet ontwerp werkt correct, maar het geeft de belangrijkste functionaliteit van de applicatie niet goed weer',1,0,1),(10,2,'De kandidaat heeft geen bruikbaar ontwerp voor een applicatie gemaakt.\r\nHet ontwerp kan niet worden gebruikt door een ontwikkelaar om verder te ontwikkelen',0,0,1),(11,3,'De kandidaat heeft gebruik gemaakt van geschikte software om het ontwerp te maken.\r\nDe kandidaat heeft op de juiste manier en met de juiste gereedschappen gebruik gemaakt van de ontwerp software.\r\n',3,0,1),(12,3,'De kandidaat heeft gebruik gemaakt van geschikte software om het ontwerp te maken.\r\nDe kandidaat heeft niet altijd op de juiste manier en met de juiste gereedschappen gebruik gemaakt van de ontwerp software.',2,0,1),(13,3,'De kandidaat heeft gebruik gemaakt van geschikte software om het ontwerp te maken.\r\nDe kandidaat heeft consessies gedaan aan zijn ontwerp doordat hij niet de juiste gereedschappen in de ontwerp software heeft gebruikt.',1,0,1),(14,3,'De kandidaat heeft geen ontwerpsoftware gebruikt om het ontwerp te maken. Het ontwerp is van onvoldoende kwaliteit.',0,0,1),(15,4,'De kandidaat heeft anderen gevraagd een reactie geven op zijn/haar ontwerp.\r\nDe kandidaat heeft hierbij gebruik gemaakt van een geschikt digitaal medium.',2,0,1),(16,4,'De kandidaat heeft anderen gevraagd een reactie geven op zijn/haar ontwerp.\r\nDe kandidaat heeft hierbij geen gebruik gemaakt van een geschikt digitaal medium.',1,0,1),(17,4,'De kandidaat heeft anderen gevraagd niet om een reactie geven op zijn/haar ontwerp.\r\n',0,0,1),(18,5,'De kandidaat heeft gekozen voor een duurzame bewaarmogelijkheid.\r\nDe kandidaat geeft aan hoe zijn keuze voor een bewaarmogelijkheid voldoende veiligheid en integriteit biedt.\r\nDe kandidaat geeft aan wat redelijkerwijs de bewaartermijn is voor zijn/haar ontwerp.',3,0,1),(19,5,'De kandidaat heeft gekozen voor een duurzame bewaarmogelijkheid.\r\nDe kandidaat kan gedeeltelijk aangeven hoe zijn keuze voor een bewaarmogelijkheid voldoende veiligheid en integriteit biedt.\r\nDe kandidaat geeft aan wat redelijkerwijs de bewaartermijn is voor zijn/haar ontwerp.',2,0,1),(20,5,'De kandidaat heeft gekozen voor een duurzame bewaarmogelijkheid.\r\nDe kandidaat kan gedeeltelijk aangeven hoe zijn keuze voor een bewaarmogelijkheid voldoende veiligheid en integriteit biedt.\r\nDe kandidaat kan niet beargumenteren wat een redelijke bewaartermijn is voor zijn/haar werk.',1,0,1),(21,5,'De kandidaat heeft niet gekozen voor een duurzame bewaarmogelijkheid of\r\nDe kandidaat kan niet aangeven hoe zijn keuze voor een bewaarmogelijkheid voldoende veiligheid en integriteit biedt.',0,0,1),(22,6,'De kandidaat heeft een weergave gemaakt van een directorystructuur\r\nBij de indeling van materiaal heeft de kandidaat een logische opzet gekozen waarbij het voor anderen duidelijk is waar het materiaal is terug te vinden.\r\nTussenmateriaal dat niet meer gebruikt dient te worden is verwijderd.',3,0,1),(23,6,'De kandidaat heeft een weergave gemaakt van een directorystructuur\r\nBij de indeling van materiaal heeft de kandidaat een logische opzet gekozen waarbij het voor anderen duidelijk is waar het materiaal is terug te vinden.\r\nTussenmateriaal dat niet meer gebruikt dient te worden is niet verwijderd.',2,0,1),(24,6,'De kandidaat heeft een weergave gemaakt van een directorystructuur\r\nBij de indeling van materiaal heeft de kandidaat een opzet gekozen waarbij het voor anderen niet altijd duidelijk is waar het materiaal is terug te vinden.\r\nTussenmateriaal dat niet meer gebruikt dient te worden is niet verwijderd.',1,0,1),(25,6,'De kandidaat heeft geen weergave gemaakt van een directorystructuur\r\nBij de indeling van materiaal heeft de kandidaat een opzet gekozen waarbij het voor anderen niet duidelijk is waar het materiaal is terug te vinden.',0,0,1),(26,7,'De kandidaat heeft een systeem gebruikt voor versiebeheer.\r\n',1,0,1),(27,7,'De kandidaat heeft een systeem gebruikt waarbij versiebeheer alleen handmatig mogelijk is.\r\n',0,0,1),(29,8,'Het bewijsmateriaal voldoet aan taalcriteria, compleetheid, lay-out of andere voorwaarden.\r\nHet bewijsmateriaal geeft weer wat de student gedaan heeft.\r\nHet bewijsmateriaal sluit aan bij wat gevraagd wordt in de opdracht.\r\nHet bewijsmateriaal geeft inzicht in de uitvoering van werkzaamheden.\r\nHet bewijsmateriaal bevat de juiste conclusie of motivatie (indien van toepassing).',1,0,1),(30,17,'0',0,0,1),(31,17,'1',1,0,1),(32,17,'2',2,0,1),(33,18,'0',0,0,1),(34,18,'1',1,0,1),(35,18,'2',2,0,1),(36,19,'0',0,0,1),(37,19,'1',1,0,1),(40,19,'2',2,0,1),(41,9,'0',0,0,1),(42,9,'1',1,0,1),(43,9,'2',2,0,1),(44,10,'0',0,0,1),(45,11,'0',0,0,1),(46,12,'0',0,0,1),(47,13,'0',0,0,1),(48,14,'0',0,0,1),(49,15,'0',0,0,1),(50,16,'0',0,0,1),(51,10,'1',1,0,1),(52,11,'1',1,0,1),(53,12,'1',1,0,1),(54,13,'1',1,0,1),(55,14,'1',1,0,1),(56,15,'1',1,0,1),(57,16,'1',1,0,1),(59,10,'2',2,0,1),(60,11,'2',2,0,1),(61,12,'2',2,0,1),(62,13,'2',2,0,1),(63,14,'2',2,0,1),(64,15,'2',2,0,1),(65,16,'2',2,0,1),(66,20,'0',0,0,1),(67,21,'0',0,0,1),(68,22,'0',0,0,1),(69,20,'1',1,0,1),(70,21,'1',1,0,1),(71,22,'1',1,0,1),(72,20,'2',2,0,1),(74,21,'2',2,0,1),(75,22,'2',2,0,1),(76,23,'0',0,0,1),(77,24,'0',0,0,1),(78,25,'0',0,0,1),(79,26,'0',0,0,1),(80,27,'0',0,0,1),(81,28,'0',0,0,1),(82,29,'0',0,0,1),(83,23,'1',1,0,1),(84,24,'1',1,0,1),(85,25,'1',1,0,1),(86,26,'1',1,0,1),(87,27,'1',1,0,1),(88,28,'1',1,0,1),(89,29,'1',1,0,1),(90,23,'2',2,0,1),(91,24,'2',2,0,1),(92,25,'2',2,0,1),(93,26,'2',2,0,1),(94,27,'2',2,0,1),(95,28,'2',2,0,1),(96,29,'2',2,0,1),(97,30,'1',1,0,1),(98,30,'2',2,0,1),(99,30,'00',0,0,1),(100,31,'O',0,0,1),(101,31,'1',1,0,1),(102,31,'2',2,0,1),(103,32,'2',2,0,1),(104,32,'0',0,0,1),(105,32,'1',1,0,1),(106,33,'1',1,0,1),(107,33,'0',0,0,1),(108,33,'2',2,0,1),(109,34,'2',2,0,1),(110,34,'0',0,0,1),(111,34,'1',1,0,1),(112,35,'0',0,0,1),(113,35,'2',2,0,1),(114,36,'0',0,0,1),(115,36,'1',1,0,1),(116,36,'2',2,0,1),(117,37,'2',2,0,1),(118,37,'1',1,0,1),(119,37,'0',0,0,1),(120,38,'0',0,0,1),(121,38,'1',1,0,1),(122,38,'2',2,0,1),(123,39,'0',0,0,1),(124,39,'1',1,0,1),(125,39,'2',2,0,1),(126,40,'0',0,0,1),(127,40,'1',1,0,1),(128,40,'2',2,0,1),(129,41,'0',0,0,1),(130,41,'1',1,0,1),(131,41,'2',2,0,1),(132,42,'0',0,0,1),(133,42,'1',1,0,1),(134,42,'2',2,0,1),(135,43,'0',0,0,1),(136,43,'1',1,0,1),(137,43,'2',2,0,1),(138,44,'0',0,0,1),(139,44,'1',1,0,1),(140,44,'2',2,0,1),(141,45,'0',0,0,1),(142,45,'1',1,0,1),(143,45,'2',2,0,1),(144,46,'0',0,0,1),(145,46,'1',1,0,1),(146,46,'2',2,0,1),(147,47,'0',0,0,1),(148,47,'1',1,0,1),(149,47,'2',2,0,1),(150,48,'0',0,0,1),(151,48,'1',1,0,1),(152,48,'2',2,0,1),(153,49,'0',0,0,1),(154,49,'1',1,0,1),(155,49,'2',2,0,1),(156,50,'0',0,0,1),(157,50,'1',1,0,1),(158,50,'2',2,0,1),(159,51,'0',0,0,1),(160,51,'1',1,0,1),(161,51,'2',2,0,1),(162,52,'0',0,0,1),(163,52,'1',1,0,1),(164,52,'2',2,0,1),(165,53,'0',0,0,1),(166,53,'1',1,0,1),(167,53,'2',2,0,1),(168,54,'0',0,0,1),(169,54,'1',1,0,1),(170,54,'2',2,0,1),(171,55,'0',0,0,1),(172,55,'1',1,0,1),(173,55,'2',2,0,1),(174,56,'0',0,0,1),(175,56,'1',1,0,1),(176,56,'2',2,0,1),(177,57,'0',0,0,1),(178,57,'1',1,0,1),(179,57,'2',2,0,1);
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
  `description` varchar(254) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`idassignment`),
  KEY `fk_assignment_proces1_idx` (`idproces`),
  CONSTRAINT `fk_assignment_proces1` FOREIGN KEY (`idproces`) REFERENCES `proces` (`idproces`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assignment`
--

LOCK TABLES `assignment` WRITE;
/*!40000 ALTER TABLE `assignment` DISABLE KEYS */;
INSERT INTO `assignment` VALUES (1,1,'W1 Wint digitale informatie in',1),(2,2,'W1 Maakt een weergave van informatie',1),(3,2,'W2 Stelt content samen',1),(4,2,'W3 Deelt informatie / content',1),(5,3,'W1 Organiseert het beheer',1),(6,3,'W2 Deelt informatie in',1),(7,3,'W3 Bewaakt bewaaromstandigheden',1),(8,4,'Voorwaarden',1),(9,6,'Heeft een juiste zoekstrategie bij het inwinnen van digitale informatie.',1),(10,6,'Gebruikt relevante zoektermen',1),(11,6,'Past de zoekstrategie aan bij onvoldoende resultaat.',1),(12,6,'Gebruikt de juiste bronnen bij het zoeken naar informatie.',1),(13,6,'Gebruikt legale en betrouwbare bronnen.',1),(14,6,'Handelt volgens de auteursrechten van een gebruikte bron.',1),(15,6,'Haalt de juiste informatie uit bronnen.',1),(16,6,'Bewaart de relevante gevonden informatie zodanig dat hij dit eenvoudig terug kan vinden.',1),(17,7,'Maakt een kwalitatief goede weergave van informatie.',1),(18,7,'Maakt een doeltreffende keuze voor de communicatiewijze (techniek, vorm, middel). ',1),(19,7,'Houdt rekening met de doelgroep en boodschap die hij/zij wil overbrengen. ',1),(20,7,'Selecteert zorgvuldig welke informatie hij/zij wilverstrekken. ',1),(21,7,'Controleert nauwkeurig op werking, correctheid, kwaliteit en inhoud.',1),(22,7,'Slaat de weergave op. ',1),(23,8,'Maakt een correcte weergave van informatie',1),(24,8,'Maakt een doeltreffende keuze voor de communicatiewijze (techniek, vorm, middel). ',1),(25,8,'Houdt rekening met het doel van de informatie die hij/zij wil overbrengen.',1),(26,8,'Selecteert zorgvuldig welke informatie hij/zij wil verstrekken. ',1),(27,8,'De informatie bevat een correcte schematische weergave.',1),(28,8,'Controleert nauwkeurig op werking, correctheid, kwaliteit en inhoud.',1),(29,8,'Slaat de weergave op. ',1),(30,9,'Selecteert de informatie die hij wil delen zorgvuldig',1),(31,9,'Gaat discreet om met gevoelige of vertrouwelijke informatie',1),(32,9,'Controleert de informatie die gedeeld gaat worden. ',1),(33,9,'Gebruikt afbeeldingen, geluid of andere toevoegingen bij de informatie die gedeeld wordt. ',1),(34,9,'Deelt informatie die relevant is voor de ontvanger/ online gemeenschap.',1),(35,9,'Deelt informatie via een medium met een ontvanger of online gemeenschap.',1),(36,9,'Gebruikt een passend online digitaal medium.',1),(37,9,'Gaat na of er reacties zijn van de ontvanger of online gemeenschap.',1),(38,9,'Reageert op reacties van ontvangers.',1),(39,9,'Neemt deel aan discussies met ontvangers of de online gemeenschap',1),(40,9,'Houdt zich aan voorgeschreven procedures van veilig digitaal werken en zorgvuldig handelen.',1),(41,10,'Achterhaalt de behoefte aan het beheren van informatie. ',1),(42,10,'Benut de gebruiksmogelijkheden van de middelen.',1),(43,10,'Bepaalt welke informatie ingedeeld moet worden',1),(44,10,'Voegt de benodigde metadata over de inhoud toe.',1),(45,10,'Controleert informatie grondig op fouten en onjuistheden.',1),(46,10,'Heeft een oplossing voor het behouden van overzicht bij het toevoegen van informatie. ',1),(47,11,'Weet welke middelen het best gebruikt kunnen worden bij het indelen van informatie.',1),(48,11,'Benut de gebruiksmogelijkheden van de middelen.',1),(49,11,'Bepaalt welke informatie ingedeeld moet worden.',1),(50,11,'Voegt de benodigde metadata over de inhoud toe.',1),(51,11,'Controleert informatie grondig op fouten en onjuistheden.',1),(52,11,'Heeft een oplossing voor het behouden van overzicht bij het toevoegen van informatie. ',1),(53,12,'Bepaalt de beste duurzame bewaaromstandigheid.',1),(54,12,'Zorgt voor voldoende veiligheid (beveiliging, back-up, etc.) bij het opslaan van de informatie. ',1),(55,12,'Werkt zorgvuldig bij het permanent bewaren van informatie. ',1),(56,12,'Verklaart waarom bepaalde informatie verwijderd wordt.',1),(57,12,'Controleert de bewaaromstandigheden van de informatiedragers en geeft aan waarom deze voldoet.',1);
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
  `caesura` varchar(2048) DEFAULT NULL,
  PRIMARY KEY (`idexam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam`
--

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
INSERT INTO `exam` VALUES (23,'Digitale vaardigheden',1,NULL,NULL,'0 0,6 1,1 1,6 2,2 2,7 3,2 3,7 4,3 4,8 5,3 5,8 6,4 6,9 7,4 7,9 8,5 9 9,5 10'),(24,'Digitale vaardigheden v2',1,NULL,NULL,NULL),(505,'Veilig programmeren',1,NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proces`
--

LOCK TABLES `proces` WRITE;
/*!40000 ALTER TABLE `proces` DISABLE KEYS */;
INSERT INTO `proces` VALUES (1,23,'D1-K1 Verzamelt informatie, gegevens en content',1),(2,23,'D1-K2 Produceert informatie / content',1),(3,23,'D1-K3 Beheert informatie / content',1),(4,23,'Algemene voorwaarden voor bewijs',1),(5,24,'Algemene voorwaarden voor bewijs',1),(6,24,'D1-K1-W1: Wint digitale informatie in',1),(7,24,'D1-K2-W1: Maakt een weergave van informatie',1),(8,24,'D1-K2-W2: Stelt content samen',1),(9,24,'D1-K2-W3: Deelt informatie/content',1),(10,24,'D1-K3-W1: Organiseert het beheer',1),(11,24,'D1-K3-W2: Deelt informatie in',1),(12,24,'D1-K3-W3: Bewaakt bewaaromstandigheden',1);
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
INSERT INTO `result` VALUES (584999,1,'2019-03-26'),(584999,4,'2019-03-21'),(584999,4,'2019-03-23'),(584999,6,'2019-03-15'),(584999,6,'2019-03-27'),(584999,7,'2019-03-21'),(584999,7,'2019-03-26'),(584999,8,'2019-03-15'),(584999,8,'2019-03-21'),(584999,8,'2019-03-23'),(584999,9,'2019-03-27'),(584999,11,'2019-03-26'),(584999,12,'2019-03-21'),(584999,13,'2019-03-21'),(584999,13,'2019-03-23'),(584999,13,'2019-03-27'),(584999,14,'2019-03-15'),(584999,15,'2019-03-21'),(584999,15,'2019-03-23'),(584999,15,'2019-03-26'),(584999,16,'2019-03-15'),(584999,16,'2019-03-27'),(584999,18,'2019-03-26'),(584999,19,'2019-03-15'),(584999,19,'2019-03-21'),(584999,19,'2019-03-23'),(584999,20,'2019-03-27'),(584999,22,'2019-03-26'),(584999,23,'2019-03-15'),(584999,24,'2019-03-21'),(584999,24,'2019-03-23'),(584999,24,'2019-03-27'),(584999,26,'2019-03-15'),(584999,26,'2019-03-21'),(584999,26,'2019-03-23'),(584999,26,'2019-03-26'),(584999,26,'2019-03-27'),(584999,29,'2019-03-21'),(584999,29,'2019-03-23'),(584999,29,'2019-03-26'),(584999,29,'2019-03-27'),(584999,31,'2019-03-19'),(584999,31,'2019-03-20'),(654332,32,'2019-03-04'),(584999,34,'2019-03-20'),(584999,35,'2019-03-19'),(654332,35,'2019-03-04'),(584999,40,'2019-03-19'),(584999,40,'2019-03-20'),(654332,40,'2019-03-04'),(584999,42,'2019-03-19'),(584999,42,'2019-03-20'),(654332,42,'2019-03-04'),(584999,44,'2019-03-19'),(584999,51,'2019-03-20'),(654332,51,'2019-03-04'),(584999,52,'2019-03-19'),(584999,52,'2019-03-20'),(654332,52,'2019-03-04'),(584999,53,'2019-03-19'),(654332,53,'2019-03-04'),(584999,54,'2019-03-19'),(584999,54,'2019-03-20'),(654332,54,'2019-03-04'),(584999,55,'2019-03-19'),(584999,55,'2019-03-20'),(654332,55,'2019-03-04'),(654332,56,'2019-03-04'),(584999,57,'2019-03-19'),(584999,57,'2019-03-20'),(654332,57,'2019-03-04'),(584999,61,'2019-03-20'),(584999,64,'2019-03-19'),(584999,64,'2019-03-20'),(584999,69,'2019-03-19'),(654332,69,'2019-03-04'),(584999,70,'2019-03-19'),(584999,70,'2019-03-20'),(654332,70,'2019-03-04'),(584999,71,'2019-03-20'),(654332,71,'2019-03-04'),(584999,72,'2019-03-20'),(584999,75,'2019-03-19'),(584999,82,'2019-03-19'),(584999,83,'2019-03-20'),(654332,83,'2019-03-04'),(584999,84,'2019-03-19'),(584999,85,'2019-03-19'),(584999,85,'2019-03-20'),(654332,85,'2019-03-04'),(584999,86,'2019-03-20'),(654332,86,'2019-03-04'),(584999,88,'2019-03-19'),(584999,88,'2019-03-20'),(654332,88,'2019-03-04'),(584999,91,'2019-03-20'),(654332,91,'2019-03-04'),(584999,93,'2019-03-19'),(584999,94,'2019-03-19'),(584999,94,'2019-03-20'),(654332,94,'2019-03-04'),(584999,96,'2019-03-20'),(654332,96,'2019-03-04'),(584999,97,'2019-03-20'),(654332,97,'2019-03-04'),(654332,101,'2019-03-04'),(584999,102,'2019-03-20'),(654332,103,'2019-03-04'),(584999,105,'2019-03-20'),(584999,106,'2019-03-20'),(654332,106,'2019-03-04'),(654332,111,'2019-03-04'),(584999,113,'2019-03-20'),(654332,113,'2019-03-04'),(654332,114,'2019-03-04'),(584999,116,'2019-03-20'),(584999,118,'2019-03-20'),(654332,118,'2019-03-04'),(584999,121,'2019-03-20'),(584999,125,'2019-03-20'),(654332,125,'2019-03-04'),(584999,127,'2019-03-20'),(654332,127,'2019-03-04'),(654332,129,'2019-03-04'),(584999,130,'2019-03-20'),(654332,133,'2019-03-04'),(584999,134,'2019-03-20'),(584999,136,'2019-03-20'),(654332,136,'2019-03-04'),(654332,138,'2019-03-04'),(584999,139,'2019-03-20'),(654332,142,'2019-03-04'),(584999,143,'2019-03-20'),(584999,145,'2019-03-20'),(654332,145,'2019-03-04'),(584999,148,'2019-03-20'),(654332,148,'2019-03-04'),(584999,151,'2019-03-20'),(654332,151,'2019-03-04'),(584999,155,'2019-03-20'),(654332,155,'2019-03-04'),(584999,157,'2019-03-20'),(584999,161,'2019-03-20'),(654332,161,'2019-03-04'),(584999,163,'2019-03-20'),(654332,163,'2019-03-04'),(584999,166,'2019-03-20'),(654332,166,'2019-03-04'),(654332,169,'2019-03-04'),(584999,170,'2019-03-20'),(584999,172,'2019-03-20'),(654332,172,'2019-03-04'),(654332,174,'2019-03-04'),(584999,176,'2019-03-20'),(584999,178,'2019-03-20'),(654332,178,'2019-03-04');
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

-- Dump completed on 2019-03-20 16:50:27
