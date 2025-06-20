-- MySQL dump 10.13  Distrib 5.1.72, for Win32 (ia32)
--
-- Host: localhost    Database: tiket_pesawat
-- ------------------------------------------------------
-- Server version	8.0.39

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
-- Table structure for table `airline`
--

DROP TABLE IF EXISTS `airline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `airline` (
  `AirlineID` int NOT NULL AUTO_INCREMENT,
  `AirlineName` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`AirlineID`)
) ENGINE=InnoDB AUTO_INCREMENT=609 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airline`
--

LOCK TABLES `airline` WRITE;
/*!40000 ALTER TABLE `airline` DISABLE KEYS */;
INSERT INTO `airline` VALUES (602,'LION AIR'),(603,'Garuda Indonesiaaa'),(608,'Aura Air555');
/*!40000 ALTER TABLE `airline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `airport`
--

DROP TABLE IF EXISTS `airport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `airport` (
  `AirportID` int NOT NULL AUTO_INCREMENT,
  `AirportName` varchar(255) NOT NULL,
  `Municipality` varchar(100) DEFAULT NULL,
  `IataCode` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`AirportID`)
) ENGINE=InnoDB AUTO_INCREMENT=596985 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airport`
--

LOCK TABLES `airport` WRITE;
/*!40000 ALTER TABLE `airport` DISABLE KEYS */;
INSERT INTO `airport` VALUES (26745,'Hasanuddin International Airport','Ujung Pandang','UPG'),(26748,'Mozes Kilangin Airport','Timika','TIM'),(26751,'Denpasar I Gusti Ngurah Rai International Airport','Kuta, Badung','DPS'),(26755,'Dortheys Hiyo Eluay International Airport','Sentani','DJJ'),(26756,'Wamena Airport','Wamena','WMX'),(26760,'Sultan Aji Muhammad Sulaiman Sepinggan International Airport','Balikpapan','BPN'),(26762,'Juwata International Airport / Suharnoko Harbani AFB','Tarakan','TRK'),(26769,'Mutiara - SIS Al-Jufrie Airport','Palu','PLW'),(26770,'Sam Ratulangi Airport','Manado','MDC'),(26773,'Sultan Babullah Airport','Sango','TTE'),(26779,'Syamsudin Noor International Airport','Landasan Ulin','BDJ'),(26784,'Pattimura International Airport','Ambon','AMQ'),(26787,'Adisutjipto Airport','Yogyakarta','JOG'),(26788,'Adisumarmo Airport','Surakarta','SOC'),(26789,'Juanda International Airport','Surabaya','SUB'),(26790,'Achmad Yani Airport','Semarang','SRG'),(26800,'Komodo Airport','Labuan Bajo, Manggarai Barat','LBJ'),(26801,'El Tari Airport','Kupang','KOE'),(26806,'Haluoleo Airport','Kendari','KDI'),(26821,'Sultan Syarif Kasim II International Airport / Roesmin Nurjadin AFB','Pekanbaru','PKU'),(26824,'Husein Sastranegara International Airport','Bandung','BDO'),(26827,'Radin Inten II International Airport','Bandar Lampung','TKG'),(26832,'Halim Perdanakusuma International Airport','Jakarta','HLP'),(26835,'Soekarno-Hatta International Airport','Jakarta','CGK'),(26847,'Supadio Airport','Pontianak','PNK'),(26855,'Sultan Mahmud Badaruddin II Airport','Palembang','PLM'),(26858,'Minangkabau International Airport','Padang (Katapiang)','PDG'),(26862,'Sultan Iskandar Muda International Airport','Banda Aceh','BTJ'),(299629,'Lombok International Airport','Mataram (Pujut, Lombok Tengah)','LOP'),(309577,'Kualanamu International Airport','Beringin','KNO');
/*!40000 ALTER TABLE `airport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flight`
--

DROP TABLE IF EXISTS `flight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flight` (
  `FlightID` int NOT NULL AUTO_INCREMENT,
  `FlightNumber` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `DepartureDate` date NOT NULL,
  `DepartureAirport` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ArrivalAirport` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DepartureTime` time NOT NULL,
  `BoardingTime` time NOT NULL,
  `AirlineID` int DEFAULT NULL,
  `TerminalGateID` int DEFAULT NULL,
  `MaxPassenger` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  PRIMARY KEY (`FlightID`),
  KEY `AirlineID` (`AirlineID`),
  KEY `fk_flight_terminal_gate` (`TerminalGateID`),
  CONSTRAINT `fk_flight_terminal_gate` FOREIGN KEY (`TerminalGateID`) REFERENCES `terminal_gate` (`TerminalGateID`),
  CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`AirlineID`) REFERENCES `airline` (`AirlineID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flight`
--

LOCK TABLES `flight` WRITE;
/*!40000 ALTER TABLE `flight` DISABLE KEYS */;
INSERT INTO `flight` VALUES (1,'JT 602','2025-04-01','CGK','DJB','12:45:00','12:15:00',602,2,500,97700),(6,'0002','2025-05-16','RTO','CGK','17:51:00','17:54:00',602,3,500,100000),(7,'002','2025-05-15','CGK','SUB','16:52:00','16:52:00',603,3,500,1000000);
/*!40000 ALTER TABLE `flight` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passenger`
--

DROP TABLE IF EXISTS `passenger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passenger` (
  `UserID` int DEFAULT NULL,
  `PassengerID` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `PlaceOfBirth` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ContactEmail` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ContactNumber` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`PassengerID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `passenger_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passenger`
--

LOCK TABLES `passenger` WRITE;
/*!40000 ALTER TABLE `passenger` DISABLE KEYS */;
INSERT INTO `passenger` VALUES (1,1,'Hanif saiful',NULL,NULL,NULL,NULL,NULL),(2,2,'Zacky Zalfa','Male','2025-06-18','Jakarta','zackyzalfa6@gmail.com','085810638026');
/*!40000 ALTER TABLE `passenger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `terminal_gate`
--

DROP TABLE IF EXISTS `terminal_gate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `terminal_gate` (
  `TerminalGateID` int NOT NULL AUTO_INCREMENT,
  `Terminal` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Gate` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`TerminalGateID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `terminal_gate`
--

LOCK TABLES `terminal_gate` WRITE;
/*!40000 ALTER TABLE `terminal_gate` DISABLE KEYS */;
INSERT INTO `terminal_gate` VALUES (2,'2D','D3'),(3,'2D','D4');
/*!40000 ALTER TABLE `terminal_gate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `TicketID` int NOT NULL AUTO_INCREMENT,
  `RecordLocator` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `eTicketNumber` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `SeatNumber` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `BoardingZone` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PassengerID` int DEFAULT NULL,
  `FlightID` int DEFAULT NULL,
  PRIMARY KEY (`TicketID`),
  KEY `PassengerID` (`PassengerID`),
  KEY `FlightID` (`FlightID`),
  CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`PassengerID`) REFERENCES `passenger` (`PassengerID`),
  CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`FlightID`) REFERENCES `flight` (`FlightID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (12,'571D29','884-2805590401','13D','5',1,7);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `PasswordHash` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Role` enum('admin','staff','passenger') COLLATE utf8mb4_general_ci DEFAULT 'passenger',
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Hanif','$2a$12$eF6geWw1raPvVbkZyVyKo.UpUfG2JgUbyKyniK/AYSV3/Qb75m4F2','admin'),(2,'Zacky Zalfa','$2y$10$tS0UAHNcvdito.4Zn318VuaEBRkUuCm.KciuqtRKVObhJ1eFZ/vda','passenger'),(3,'Nabila Innas','$2y$10$ASUtKhBHEw9cRrlAsfxT6Ohe8xZIlm4qxbD/qYhh7IAxDsXotkU4K','passenger');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-18 18:38:35
