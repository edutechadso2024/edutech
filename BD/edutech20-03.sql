-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: edutech
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `areas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `price` int NOT NULL,
  `areascol` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'matematicas',22000,''),(2,'idiomas',15000,''),(3,'preicfes',15000,''),(4,'tati',15000,'');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_order`
--

DROP TABLE IF EXISTS `detail_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_order` (
  `id` int NOT NULL,
  `price` int NOT NULL,
  `hours` int NOT NULL,
  `order_id` int NOT NULL,
  `subjects_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detail_order_order1_idx` (`order_id`),
  KEY `fk_detail_order_subjects1_idx` (`subjects_id`),
  CONSTRAINT `fk_detail_order_order1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  CONSTRAINT `fk_detail_order_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_order`
--

LOCK TABLES `detail_order` WRITE;
/*!40000 ALTER TABLE `detail_order` DISABLE KEYS */;
INSERT INTO `detail_order` VALUES (1,40000,3,5,1),(2,300000,20,5,1),(3,55555,5,7,1),(4,666666,20,7,2);
/*!40000 ALTER TABLE `detail_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financial_report`
--

DROP TABLE IF EXISTS `financial_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `financial_report` (
  `id` int NOT NULL AUTO_INCREMENT,
  `earnings` int NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financial_report`
--

LOCK TABLES `financial_report` WRITE;
/*!40000 ALTER TABLE `financial_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `financial_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financial_report_has_sales`
--

DROP TABLE IF EXISTS `financial_report_has_sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `financial_report_has_sales` (
  `sales_id` int NOT NULL,
  `financial_report_id` int NOT NULL,
  KEY `fk_financial_report_has_sales_sales1_idx` (`sales_id`),
  KEY `fk_financial_report_has_sales_financial_report1_idx` (`financial_report_id`),
  CONSTRAINT `fk_financial_report_has_sales_financial_report1` FOREIGN KEY (`financial_report_id`) REFERENCES `financial_report` (`id`),
  CONSTRAINT `fk_financial_report_has_sales_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financial_report_has_sales`
--

LOCK TABLES `financial_report_has_sales` WRITE;
/*!40000 ALTER TABLE `financial_report_has_sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `financial_report_has_sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` int NOT NULL,
  `date` datetime NOT NULL,
  `people_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_people1_idx` (`people_id`),
  CONSTRAINT `fk_order_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (5,1000000,'2023-06-06 00:00:00',10),(7,666000,'2024-03-20 00:00:00',5);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `package_sale`
--

DROP TABLE IF EXISTS `package_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `package_sale` (
  `packages_id` int NOT NULL,
  `sales_id` int NOT NULL,
  KEY `fk_package_sale_packages1_idx` (`packages_id`),
  KEY `fk_package_sale_sales1_idx` (`sales_id`),
  CONSTRAINT `fk_package_sale_packages1` FOREIGN KEY (`packages_id`) REFERENCES `packages` (`id`),
  CONSTRAINT `fk_package_sale_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package_sale`
--

LOCK TABLES `package_sale` WRITE;
/*!40000 ALTER TABLE `package_sale` DISABLE KEYS */;
/*!40000 ALTER TABLE `package_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `packages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_history`
--

DROP TABLE IF EXISTS `payment_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_history` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `total_hours` int NOT NULL,
  `price_hour` int NOT NULL,
  `total_price` int NOT NULL,
  `payments_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_history_payments1_idx` (`payments_id`),
  CONSTRAINT `fk_payment_history_payments1` FOREIGN KEY (`payments_id`) REFERENCES `payments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_history`
--

LOCK TABLES `payment_history` WRITE;
/*!40000 ALTER TABLE `payment_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `total_hours` int NOT NULL,
  `last_pay` date DEFAULT NULL,
  `people_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payments_people1_idx` (`people_id`),
  CONSTRAINT `fk_payments_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments_has_financial_report`
--

DROP TABLE IF EXISTS `payments_has_financial_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments_has_financial_report` (
  `payments_id` int NOT NULL,
  `financial_report_id` int NOT NULL,
  KEY `fk_payments_has_financial_report_payments1_idx` (`payments_id`),
  KEY `fk_payments_has_financial_report_financial_report1_idx` (`financial_report_id`),
  CONSTRAINT `fk_payments_has_financial_report_financial_report1` FOREIGN KEY (`financial_report_id`) REFERENCES `financial_report` (`id`),
  CONSTRAINT `fk_payments_has_financial_report_payments1` FOREIGN KEY (`payments_id`) REFERENCES `payments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments_has_financial_report`
--

LOCK TABLES `payments_has_financial_report` WRITE;
/*!40000 ALTER TABLE `payments_has_financial_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments_has_financial_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `people` (
  `id` int NOT NULL AUTO_INCREMENT,
  `phone` varchar(30) NOT NULL,
  `city` varchar(45) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `sex` set('M','F') DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `dni_type` set('CC','TI','CE','RC','NA') NOT NULL,
  `dni` varchar(18) NOT NULL,
  `rol` set('administrador','docente','estudiante') NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (2,'111','ssss','1998-11-11','sss','M','fasdfqsdss@gmail','Pedro','Barrera','CC','123456789','administrador','$2y$10$o1sn9O9dsaRCN8Hy18bNtuuI2NmRjUpesR7mkM0UC.GYBo5kZ0fsy','resource/img/photosUsers/defaultPhoto.jpg'),(3,'11111','ssss','1999-12-12','ssss','M','martingay@ggg','Martin','Nuñez','CC','12345','docente','$2y$10$wb1llnfX/CM8rpG56j2DfeHFUgzrN15EvKH9/NXQ5X03NrJpxYV8.','resource/img/fotosUsers/foto1.jpg'),(4,'3123467007','medellin','2000-06-01','secreta','M','amayadaniel677@gmail.com','Pablo','Escobar','CC','666','estudiante','$2y$10$CIut0FbRWDkrnB.wiiehRONTTzBhciVo.8c.2YtZeOjqUJlbELmOS','resource/img/photosUsers/defaultPhoto.jpg'),(5,'3122222','duitama','2000-11-11','fasdfsdfasdf','M','maluma@gmail.com','Maluma','Calvo','CC','000','estudiante','$2y$10$YkAAPNzQoDwEOqDOFM39Y.fz34CfTBzjQczcdUt6syOo3aMwmsYym','resource/img/photosUsers/defaultPhoto.jpg'),(6,'3123467007','sss','2000-11-11','ssss','M','111@fff','Añañin','Amaya','CC','111','estudiante','$2y$10$5Jzn6ryYckH7tLW2XYJy/ec9NSQRQkhwR8XD0IwbNry7Q.GzWKjvW','resource/img/photosUsers/defaultPhoto.jpg'),(7,'11','s','2000-11-11','s','M','pedro@gmail.com','A','S','CC','11111','estudiante','$2y$10$T45VP1hN88cymXYovVqnsOu0dQjpkKbrviJuFWseRjJkG4/j7xnoW','resource/img/photosUsers/defaultPhoto.jpg'),(8,'11','s','2000-11-11','s','M','pedro@gmail.com','A','S','CC','11111888','estudiante','$2y$10$S5OWkHFJXj2xkYdbH0PfGuHBYO9M3YUo.Qz0vVvi639Pe4uVhCNjC','resource/img/photosUsers/defaultPhoto.jpg'),(9,'3','ss','1190-11-11','sadfadf','M','333@gmail','Pirulo','Socrates','CC','333','estudiante','$2y$10$qTdxElh9CCc9X9HSjo9MqOq.bsMM.akd5fpsDp/04mVEsQh9cxOvq',''),(10,'222','duitama','1111-11-11','calle 2rq2r23','M','dd@gg','Sdfasdf','Sadfasdfs','CC','11','estudiante','$2y$10$9H8Z5u7xDl4ShwPU8zR.UeeQmQlvH/szXpMG63rwrMPQ05GIL/UWC','resource/img/photosUsers/11_-1_orig (2).jpeg'),(11,'22','ss','1111-11-11','222','M','aaa@ddd','Sss','Sss','CC','9','estudiante','$2y$10$ozztbdGuOfgvM/FWLYmDl.93BT.YJZcCJ9.LlIWTiGcyt9O9MUDfm','resource/img/photosUsers/9_Invitación Feliz Navidad elegante dorado negro.png'),(12,'22','s','1111-11-11','s','M','pedro@gmail.com','Pedro','Asdfasdf','CC','12','estudiante','$2y$10$oHzZQJUuTC76R6qisDqg6u1P6XsZa9itw06b5PSjXROPfwGFvTRwW','resource/img/photosUsers/12_Invitación Feliz Navidad elegante dorado negro.png'),(13,'322314566','sogamoso','2004-10-13','calle 2 #8','F','tati@gmail.com','Tatiana','Calderon','CC','1081394656','estudiante','$2y$10$vk3uEskR55w74TYS8Qki2es2FnIwHqWPlsPWO2U4KpUI9eFtsRCE.','resource/img/photosUsers/1081394656_IMG-20231127-WA0062 (1).jpg'),(14,'312346700777','sogamoso','1950-06-14','juan carlos','M','juan@gmail.com','Juan Carlos','Quintero Barrera','CC','1234567890','administrador','$2y$10$9KOhLR9kq.z42KEMOERVt.2du3lQQsJBpWz3xE9NBbhLVNu5Az3fa','resource/img/photosUsers/1234567890_IMG-20231125-WA0074.jpg'),(15,'3123467007','sogamoso','2003-06-22','carrera 14 #1b','M','amayadaniel677@gmail.com','Daniel','Amaya','CC','1006416081','administrador','$2y$10$yQGjf0u6cyEy8XRBHMAlruXiCl3iPmwXUnEH/YFQty1MOolLc3R3a','resource/img/photosUsers/1006416018_IMG-20231125-WA0074.jpg'),(16,'1','1','2003-06-22','1','M','1@1','A','A','CC','1','administrador','$2y$10$0UYU42cV.E2WuOnLAOWp..ZtbbNCdc5BchyK0PriYIbVlvvZOQbYC','../resource/img/photosUsers/defaultPhoto.jpg'),(17,'2','2','2020-02-22','2','M','2@2','S','S','CC','2','administrador','$2y$10$coIGWyvP2l75b3E/VBNBH.9PNemZ/mM0NEhuNd95JXaFD9A/lFqTq','../resource/img/photosUsers/defaultPhoto.png'),(18,'3','3','2020-12-12','3','F','3@3','S','S','CC','3','administrador','$2y$10$WX787Au9XBT9nLqbXj7kRO6RLh4kBoFU0FQpP7reITB9NB0d8rCpe','resource/img/photosUsers/defaultPhoto.png'),(19,'123123123','sfsf','2024-03-07','asdfadfasd',NULL,'fawfasdf@asdfad','Asdfadfasd','Fasdfasd','CC','123123','administrador','$2y$10$5EbLM2ViRSZ9gAMyENM4l.ry77fBV8dBTHgG3iWowz5nzcM5KWx5.','resource/img/photosUsers/123123_-1_orig (2).jpeg'),(20,'123','ssss',NULL,NULL,NULL,'asfd@asdfas','asdf','asdfaf','NA','666666','estudiante','$2y$10$ADQPGFlDnRWUSYcR8/8DSeNQyDVBJP/BSv0xeh.kQpLZiLP.knCRy','resource/img/photosUsers/defaultPhoto.png'),(21,'3209498725','Duitama',NULL,NULL,NULL,'pedroa.barrera@outlook.com','pedro','barrera','NA','1052394795','estudiante','$2y$10$yQtgRGyGEReE1l8DQoqQJeZLk6XC7mzQBBu4zIe2BMSE4P6GsMsZO','resource/img/photosUsers/defaultPhoto.png'),(22,'23123','fasdf',NULL,NULL,NULL,'amayadaniel677@gmail.com','Daniel','asdf','NA','33333333333333','estudiante','$2y$10$S7Qxah9mnI1BxI74ebj2rOOX3gWCOc.l5RzjR7fr7ZOYn/9PM/6Sq','resource/img/photosUsers/defaultPhoto.png'),(23,'23123','asdfasd',NULL,NULL,NULL,'dfasdfa@asdff','adfasfas','fasdf','NA','2131232','estudiante','$2y$10$WGPNA0rsaiMsCjbgR.mIiOQJsZ26SgM/FDOGVfJcamn8JLf611BWa','resource/img/photosUsers/defaultPhoto.png'),(24,'331423','asdffa',NULL,NULL,NULL,'fadfaf@awfasdf','dddd','sdfaf','NA','112132312312','estudiante','$2y$10$1/I93y4GFo6OUTTsptcC/uVpdYEingG/tsEEiyfY6KZY3z7PRtr/m','resource/img/photosUsers/defaultPhoto.png'),(25,'1212312','asdf',NULL,NULL,NULL,'adf@asdfasdfadf','xsaas','asdfasdf','NA','1212312','estudiante','$2y$10$YARElQElMOPlD7SlpGypjuv7CkX34qPECJdcvKYE1De3y7mtiSG5a','resource/img/photosUsers/defaultPhoto.png'),(26,'3123467007','sogamoso',NULL,NULL,NULL,'amayadaniel677@gmail.com','Pedro','barrera','NA','101234141','estudiante','$2y$10$Pomrlha3wwEG7rsqAUESe.pt6jqZ5GYXaGeaLhYSuDoR3mtxetXgq','resource/img/photosUsers/defaultPhoto.png'),(27,'112132323','sss',NULL,NULL,NULL,'amayadaniel677@gmail.com','daniel','AMAYA','NA','1010101010','estudiante','$2y$10$/zOeFMTIdZahpPH7RkvWberDYf.nX/l448hZBvVUmhM/fIit7zwQ.','resource/img/photosUsers/defaultPhoto.png'),(28,'414213','sogamoso',NULL,NULL,NULL,'fasdfaf@fsadfaf','Daniel','Barrera','NA','202020','estudiante','$2y$10$8BjxHpJGZkAKJ/xNCR1a6OxkwbbayBivP3yDF/Om2e6JzfH.jesAu','resource/img/photosUsers/defaultPhoto.png'),(29,'3123333333','sogamoso',NULL,NULL,NULL,'usuarionuevo@gmail.com','Pedro','amaya','NA','1111111111','estudiante','$2y$10$tQcvlJiDxVDwm.OtpL53uuyNEKzsO6/U6kku3Fb7YfUcM484XNbze','resource/img/photosUsers/defaultPhoto.png'),(30,'312345555','tauramena',NULL,NULL,NULL,'oedritocomiopalitos@gmail.com','Pedro','palitos','NA','00000000','estudiante','$2y$10$ILFDqtvCBeHInmAED3sIcOdmdBJFuYhVe63esH0rnsb2aT29q4dg6','resource/img/photosUsers/defaultPhoto.png'),(31,'2333','FDS',NULL,NULL,NULL,'asdfasdfa@sd','jldfnadlkjf','1232131','NA','332233','estudiante','$2y$10$Ps5iFeBuxMX/BHP60DVI8utYUkBDpDbFCDbafgSCRAmODPtvrlgvm','resource/img/photosUsers/defaultPhoto.png'),(32,'222','ss',NULL,NULL,NULL,'02399320@dsdf','awerfuaowe','12mdsklds','NA','909','estudiante','$2y$10$cXB/YxiOhnNWYxbZoOIxIO11U/lujpd2G/3g2oYTDorahPlqI1bG.','resource/img/photosUsers/defaultPhoto.png'),(33,'332','ASDFAFAS',NULL,NULL,NULL,'ASDFA@FASDF','AWEFWEF','FWFASD','NA','32323','estudiante','$2y$10$95kTOf.iLHexlcf95l/w0e6B1gQIqMTsNYHwUsL4Ar4pfCfik2KMW','resource/img/photosUsers/defaultPhoto.png'),(34,'1','s',NULL,NULL,NULL,'s@s','s','s','NA','121','estudiante','$2y$10$cABu3HdH.Dh5P.Bf1qio7.8d4jIVcXl443Uy62wirnvRV81ITGD3m','resource/img/photosUsers/defaultPhoto.png'),(35,'12','d',NULL,NULL,NULL,'s@s','d','d','NA','119','estudiante','$2y$10$ARLtEknNilkgibORe3YCVu0XIpBv6tfeTan7vOOkIaKlLJXadKlKy','resource/img/photosUsers/defaultPhoto.png'),(36,'2','e',NULL,NULL,NULL,'w@w','a','d','NA','31','estudiante','$2y$10$g7O4FfYVL6LyB9B3Z59n1eWfmRHYZUTTvFypwVnWy89UPuo/TEJoi','resource/img/photosUsers/defaultPhoto.png'),(37,'0','0',NULL,NULL,NULL,'0@0','0','0','NA','0','estudiante','$2y$10$71M40shWgZb5JgEALcOxxu08ndM1tUj7RLsfmN8/6ZF4Czfr4h1PS','resource/img/photosUsers/defaultPhoto.png'),(38,'1','1',NULL,NULL,NULL,'1@1','Daniel ','Amaya','NA','666666666666','estudiante','$2y$10$1aA7MhknYEcjP.r4NHK3RelWEjR3NiCu/C6o5mF7f9LW55eP4/IvW','resource/img/photosUsers/defaultPhoto.png'),(39,'1','1',NULL,NULL,NULL,'1@1','d','d','NA','7773333','estudiante','$2y$10$.l64DoyrEaiEr7uEp2JCB.Mqv257yTt1b5dAp90X.N9x/c4V9/h4u','resource/img/photosUsers/defaultPhoto.png'),(40,'1','s','2003-06-22','s','M','1@1','Daniel','Amaya','CC','1111222233333','docente','$2y$10$.0.fK5.YX/9vLwepDsQz6uoC87HdG6D.LmtMo4o1Y6J7dcUSnhpyi','resource/img/photosUsers/defaultPhoto.png'),(41,'1','s','2003-02-22','s','M','1q@1','D','D','CC','667766','administrador','$2y$10$KC1paQ5z3ClCsXPG7Yf2Me7aFUfjspZfnrrfIMwLlSlHerTwx2CGa','resource/img/photosUsers/667766_Captura de pantalla 2024-03-16 133007.png'),(42,'11111111111','sogamoso','2003-11-11','carrera 134','M','we@www','Asfsf','Asdfasdf','CC','111111110','docente','$2y$10$L62r3zjNg9MG5BGU6fX0U.JHhPHjejCy88NzlsS4AratMXB2MKpXq','resource/img/photosUsers/111111110_Captura de pantalla 2023-12-16 052315.png'),(43,'88888','sogamoso','1991-10-30','pedro','M','adfsdfq@gmail','Pedro','Pablo','CC','88888','estudiante','$2y$10$xwZOgpZk8tQfH2YWfWaEQ.oTIzZECksyiJEt4sCssZgdFj7YjVsoC','resource/img/photosUsers/defaultPhoto.png'),(44,'12121212','1','2003-02-22','1','M','122@ss','123123','Asdfsdf','CC','1212121212','docente','$2y$10$sd9CYELlUJyFYeQ5sdqseuxSAYGbVRYnTEw2Utzg6fDuOAdsOpk8e','resource/img/photosUsers/defaultPhoto.png'),(45,'313','tauramena','2000-01-22','22ldfjsa','M','1@1','Daniel','Dd','CC','11212134','docente','$2y$10$7YkK3XwHsc20bHQYmx6XTelFBBpbVpSTu6qGEVDvKdjBy.ffSiq32','resource/img/photosUsers/11212134_Logo_fresas_arturo.png');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people_area`
--

DROP TABLE IF EXISTS `people_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `people_area` (
  `areas_id` int NOT NULL,
  `people_id` int NOT NULL,
  KEY `fk_people_area_areas1_idx` (`areas_id`),
  KEY `fk_people_area_people1_idx` (`people_id`),
  CONSTRAINT `fk_people_area_areas1` FOREIGN KEY (`areas_id`) REFERENCES `areas` (`id`),
  CONSTRAINT `fk_people_area_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people_area`
--

LOCK TABLES `people_area` WRITE;
/*!40000 ALTER TABLE `people_area` DISABLE KEYS */;
/*!40000 ALTER TABLE `people_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` int NOT NULL,
  `date` datetime NOT NULL,
  `people_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sales_people1_idx` (`people_id`),
  CONSTRAINT `fk_sales_people1` FOREIGN KEY (`people_id`) REFERENCES `people` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,87889,'2024-03-07 00:00:00',19),(2,87000,'2024-03-07 00:00:00',4),(3,87000,'2024-03-07 00:00:00',4),(4,87000,'2024-03-07 00:00:00',4),(5,100000,'2024-03-07 00:00:00',20),(6,100000,'2024-03-07 00:00:00',20),(7,100000,'2024-03-07 00:00:00',20),(8,60000,'2024-03-07 00:00:00',21),(9,109999,'2024-03-07 00:00:00',22),(10,109999,'2024-03-07 00:00:00',22),(76,43999,'2024-03-19 00:00:00',4),(77,21889,'2024-03-19 00:00:00',38),(78,329667,'2024-03-19 00:00:00',39);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_package`
--

DROP TABLE IF EXISTS `subject_package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject_package` (
  `subjects_id` int NOT NULL,
  `packages_id` int NOT NULL,
  KEY `fk_subjects_has_packages_subjects1_idx` (`subjects_id`),
  KEY `fk_subjects_has_packages_packages1_idx` (`packages_id`),
  CONSTRAINT `fk_subjects_has_packages_packages1` FOREIGN KEY (`packages_id`) REFERENCES `packages` (`id`),
  CONSTRAINT `fk_subjects_has_packages_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_package`
--

LOCK TABLES `subject_package` WRITE;
/*!40000 ALTER TABLE `subject_package` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_sale`
--

DROP TABLE IF EXISTS `subject_sale`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject_sale` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` int NOT NULL,
  `total_hours` int NOT NULL,
  `subjects_id` int NOT NULL,
  `remaining_hours` int NOT NULL,
  `sales_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subject_sale_subjects1_idx` (`subjects_id`),
  KEY `fk_subject_sale_sales1_idx` (`sales_id`),
  CONSTRAINT `fk_subject_sale_sales1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`),
  CONSTRAINT `fk_subject_sale_subjects1` FOREIGN KEY (`subjects_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_sale`
--

LOCK TABLES `subject_sale` WRITE;
/*!40000 ALTER TABLE `subject_sale` DISABLE KEYS */;
INSERT INTO `subject_sale` VALUES (1,22000,1,1,1,7),(2,44000,2,2,2,7),(3,22000,1,1,1,7),(4,22000,1,2,1,7),(5,22000,1,1,1,8),(6,44000,2,2,2,8),(7,22000,1,1,1,8),(8,22000,1,2,1,8),(9,22000,1,1,1,9),(10,44000,2,2,2,9),(11,22000,1,1,1,9),(12,22000,1,2,1,9),(13,22000,1,1,1,10),(14,44000,2,2,2,10),(15,22000,1,1,1,10),(16,22000,1,2,1,10),(106,44000,2,2,2,76),(107,22000,1,1,1,77),(108,66000,3,1,3,78),(109,264000,12,1,12,78);
/*!40000 ALTER TABLE `subject_sale` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subjects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL,
  `schedule` varchar(45) NOT NULL,
  `areas_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_subjects_areas1_idx` (`areas_id`),
  CONSTRAINT `fk_subjects_areas1` FOREIGN KEY (`areas_id`) REFERENCES `areas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'calculo','calculo diferencial para universitarios','8 am',1),(2,'algebra','lineal y factorizacion','5 am',1);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutorships`
--

DROP TABLE IF EXISTS `tutorships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tutorships` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `groups_id` int NOT NULL,
  `payments_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tutorships_payments1_idx` (`payments_id`),
  CONSTRAINT `fk_tutorships_payments1` FOREIGN KEY (`payments_id`) REFERENCES `payments` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutorships`
--

LOCK TABLES `tutorships` WRITE;
/*!40000 ALTER TABLE `tutorships` DISABLE KEYS */;
/*!40000 ALTER TABLE `tutorships` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-20 12:16:38
