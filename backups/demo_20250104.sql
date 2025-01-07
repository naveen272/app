-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: localhost    Database: demo
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` int NOT NULL,
  `file_path` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1138 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1003,'naveen','Pani puri',20,'IMG_9742.PNG','2024-12-09'),(1004,'naveen','milk',30,'','2024-12-09'),(1005,'naveen','Dmartice',45,'IMG_9741.PNG','2024-12-08'),(1006,'naveen','saloon',140,'IMG_9740.PNG','2024-12-08'),(1007,'naveen','chintan collection pro',150,'IMG_9739.PNG','2024-12-07'),(1008,'naveen','unkonw',50,'IMG_9738.PNG','2024-12-07'),(1009,'naveen','grapes',40,'IMG_9737.PNG','2024-12-06'),(1010,'naveen','sugar',30,'IMG_9736.PNG','2024-12-06'),(1011,'naveen','milk',40,'IMG_9734.PNG','2024-12-05'),(1012,'naveen','sugar',30,'IMG_9735.PNG','2024-12-05'),(1013,'naveen','hungar box',230,'IMG_9733.PNG','2024-12-05'),(1014,'naveen','vegetables',50,'IMG_9732.PNG','2024-12-04'),(1015,'naveen','vegetables',50,'IMG_9731.PNG','2024-12-04'),(1016,'naveen','milk',10,'IMG_9730.PNG','2024-12-04'),(1017,'naveen','water',25,'IMG_9729.PNG','2024-12-04'),(1018,'naveen','unkonw',40,'IMG_9728.PNG','2024-12-03'),(1019,'naveen','eggs',160,'IMG_9727.PNG','2024-12-03'),(1020,'naveen','milk',40,'IMG_9726.PNG','2024-12-02'),(1021,'naveen','corn chips',20,'IMG_9725.PNG','2024-12-02'),(1022,'naveen','vegetables',30,'IMG_9724.PNG','2024-12-02'),(1023,'naveen','vegetables',50,'IMG_9743.PNG','2024-12-02'),(1024,'naveen','corn',50,'IMG_9723.PNG','2024-12-02'),(1025,'naveen','vegetables',25,'IMG_9722.PNG','2024-12-02'),(1026,'naveen','vegetables',10,'IMG_9721.PNG','2024-12-02'),(1027,'naveen','vegetables',35,'IMG_9720.PNG','2024-12-02'),(1028,'naveen','vegetables',50,'IMG_9719.PNG','2024-12-02'),(1029,'naveen','vegetables',10,'IMG_9718.PNG','2024-12-02'),(1030,'naveen','milk',40,'IMG_9717.PNG','2024-12-02'),(1031,'naveen','ss steel house',20,'IMG_9716.PNG','2024-12-01'),(1032,'naveen','unkonw',25,'IMG_9715.PNG','2024-12-01'),(1033,'naveen','petrol',1080,'IMG_9746.JPG','2024-12-01'),(1034,'naveen','Dmart',3085,'image.jpg','2024-12-08'),(1035,'naveen','Paracetamol',45,'IMG_9748.png','2024-12-09'),(1036,'naveen','post december',2000,'4a3f14b4-40fb-4dbd-8f35-2e138d782414.jpg','2024-12-01'),(1037,'naveen','mutual funds',6000,'funds.png','2024-12-01'),(1038,'naveen','mutual funds',12000,'IMG_9751.jpeg','2024-12-06'),(1039,'naveen','Iphone EMI',2325,'','2024-12-05'),(1040,'naveen','cred',2772,'','2024-12-01'),(1041,'naveen','Rent and power',12500,'','2024-12-01'),(1042,'naveen','Mutual funds',45000,'IMG_9752.jpeg','2024-12-01'),(1043,'naveen','Milk',500,'IMG_9753.png','2024-12-08'),(1044,'naveen','Water',25,'IMG_9754.png','2024-12-10'),(1045,'naveen','Bananas',40,'IMG_9755.png','2024-12-10'),(1046,'naveen','Apollo',107,'IMG_9760.png','2024-12-11'),(1047,'naveen','Milk',66,'IMG_9761.png','2024-12-11'),(1048,'naveen','Onions',100,'IMG_9766.png','2024-12-11'),(1049,'naveen','Lemons',30,'IMG_9765.png','2024-12-11'),(1050,'naveen','Jinger',80,'IMG_9764.png','2024-12-11'),(1051,'naveen','Chicken',500,'IMG_9831.png','2024-12-11'),(1052,'naveen','Milk',75,'IMG_9835.png','2024-12-12'),(1053,'naveen','Pudhena',20,'IMG_9832.png','2024-12-11'),(1054,'naveen','Butter',68,'IMG_9833.png','2024-12-11'),(1055,'naveen','Drink',68,'IMG_9834.png','2024-12-11'),(1056,'naveen','Home world steel',319,'image.jpg','2024-12-12'),(1057,'naveen','Watch repair',300,'image.jpg','2024-12-13'),(1059,'naveen','Beer',420,'IMG_0158.jpeg','2024-12-14'),(1060,'naveen','Lulu mall',343,'image.jpg','2024-12-15'),(1061,'naveen','Water',25,'IMG_9976.png','2024-12-13'),(1062,'naveen','Egg fried rice',70,'IMG_9976.png','2024-12-15'),(1063,'naveen','apple',100,'','2024-12-16'),(1064,'naveen','Water',55,'IMG_9984.jpeg','2024-12-16'),(1065,'naveen','Vegetables',30,'IMG_9981.png','2024-12-16'),(1066,'naveen','Vegetables',25,'IMG_9982.png','2024-12-16'),(1067,'naveen','Milk',45,'IMG_9979.png','2024-12-16'),(1068,'naveen','Milk',30,'IMG_9980.png','2024-12-16'),(1069,'naveen','soma gift',410,'IMG_9986.PNG','2024-12-17'),(1070,'naveen','ear bolts',50,'IMG_0001.PNG','2024-12-18'),(1071,'naveen','fruits',50,'IMG_0002.PNG','2024-12-18'),(1072,'naveen','fruits',100,'IMG_0003.PNG','2024-12-18'),(1073,'naveen','coin box',20,'IMG_0004.PNG','2024-12-18'),(1074,'naveen','vegetables',220,'IMG_0005.PNG','2024-12-18'),(1075,'naveen','milk',60,'IMG_0006.PNG','2024-12-18'),(1076,'naveen','tea',30,'IMG_9998.PNG','2024-12-19'),(1077,'naveen','hungar box',53,'IMG_9999.PNG','2024-12-19'),(1078,'naveen','coffie powder',30,'','2024-12-20'),(1079,'naveen','water',25,'IMG_0007.PNG','2024-12-21'),(1080,'naveen','gas',863,'IMG_0008.PNG','2024-12-21'),(1081,'naveen','Dmart',1228,'IMG_0020.png','2024-12-21'),(1082,'naveen','Eggs',72,'IMG_0022.png','2024-12-21'),(1083,'naveen','Begger',30,'IMG_0021.png','2024-12-21'),(1084,'naveen','Rice cocker',200,'IMG_0023.png','2024-12-21'),(1085,'naveen','Ice cream',15,'IMG_0014.jpeg','2024-12-21'),(1087,'naveen','Milk',30,'IMG_0027.png','2024-12-22'),(1088,'naveen','Water',25,'IMG_0037.png','2024-12-24'),(1089,'naveen','Slate',40,'IMG_0036.png','2024-12-23'),(1090,'naveen','gas delivery charge',20,'','2024-12-24'),(1091,'naveen','Onions',50,'IMG_0049.PNG','2024-12-25'),(1092,'naveen','ginger garlic',110,'IMG_0050.PNG','2024-12-25'),(1093,'naveen','sweet potato',50,'IMG_0051.PNG','2024-12-25'),(1094,'naveen','tread',10,'IMG_0052.PNG','2024-12-25'),(1095,'naveen','forks',20,'IMG_0053.PNG','2024-12-25'),(1096,'naveen','Pomegranate',100,'IMG_0054.PNG','2024-12-25'),(1097,'naveen','kiwi',100,'IMG_0055.PNG','2024-12-25'),(1098,'naveen','oranges',50,'IMG_0056.PNG','2024-12-25'),(1099,'naveen','water',25,'IMG_0057.PNG','2024-12-24'),(1100,'naveen','Biryani',340,'IMG_0150.jpeg','2024-12-26'),(1101,'naveen','Ainu hospital',750,'IMG_0152.jpeg','2024-12-26'),(1102,'naveen','Ainu hospital',1940,'IMG_0153.jpeg','2024-12-26'),(1103,'naveen','Petrol',350,'IMG_0068.png','2024-12-26'),(1104,'naveen','Water',45,'IMG_0078.png','2024-12-27'),(1105,'naveen','Cycle repair',100,'IMG_0080.png','2024-12-28'),(1106,'naveen','Tea',15,'IMG_0079.png','2024-12-27'),(1107,'naveen','Ainu hospital',948,'IMG_0151.jpeg','2024-12-27'),(1108,'naveen','Bday dress shopping',1799,'IMG_0154.jpeg','2024-12-29'),(1109,'naveen','Pani puri',40,'IMG_0094.png','2024-12-29'),(1110,'naveen','Kova bun',20,'IMG_0098.png','2024-12-28'),(1111,'naveen','Banana',30,'IMG_0097.png','2024-12-28'),(1112,'naveen','Broccoli',70,'IMG_0096.png','2024-12-29'),(1113,'naveen','Tomato',15,'IMG_0095.png','2024-12-29'),(1114,'naveen','Curd',10,'IMG_0099.png','2024-12-30'),(1115,'naveen','December post',1500,'IMG_0100.png','2024-12-30'),(1116,'naveen','Water',25,'IMG_0101.png','2024-12-30'),(1118,'naveen','Pizza',173,'IMG_0157.jpeg','2024-12-30'),(1119,'naveen','Chennai shopping mall',2298,'IMG_0156.jpeg','2024-12-31'),(1120,'naveen','Jc brothers shopping mall',2446,'IMG_0155.jpeg','2024-12-31'),(1121,'naveen','Chicken',230,'IMG_0113.png','2025-01-01'),(1122,'naveen','Chicken',100,'IMG_0129.png','2025-01-01'),(1123,'naveen','Curry',130,'IMG_0111.png','2025-01-01'),(1124,'naveen','Water',30,'IMG_0112.png','2025-01-01'),(1125,'naveen','Drinks',70,'IMG_0114.png','2025-01-01'),(1126,'naveen','Chicken',130,'IMG_0115.png','2024-12-31'),(1127,'naveen','B seven',420,'IMG_0130.jpeg','2024-12-31'),(1128,'naveen','Drinks',360,'IMG_0132.jpeg','2025-01-01'),(1129,'naveen','Lulu mall',90,'IMG_0149.jpeg','2025-01-01'),(1130,'naveen','Petrol',510,'image.jpg','2025-01-02'),(1131,'naveen','function amount',500,'','2025-01-02'),(1132,'naveen','bus ticket',470,'busticket.png','2025-01-02'),(1133,'naveen','mutual funds',6000,'mutualjan.png','2025-01-01'),(1134,'naveen','Cred',2772,'IMG_0143.jpeg','2025-01-01'),(1135,'naveen','January post',2000,'IMG_0144.png','2025-01-03'),(1136,'naveen','Tea',15,'IMG_0148.png','2025-01-03');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (19,'naveen','$2y$10$5jL.dRlbfCKA2x3nc416fOvyv5GJzMuWzFfy.O2uaVMgE5DWPL4Ae','2024-12-09 16:01:25',NULL,'naveen.ch@softforceapps.com');
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

-- Dump completed on 2025-01-04  0:20:01
-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: localhost    Database: demo
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` int NOT NULL,
  `file_path` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date DEFAULT NULL,
  `file_blob` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1138 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1003,'naveen','Pani puri',20,'IMG_9742.PNG','2024-12-09',NULL),(1004,'naveen','milk',30,'','2024-12-09',NULL),(1005,'naveen','Dmartice',45,'IMG_9741.PNG','2024-12-08',NULL),(1006,'naveen','saloon',140,'IMG_9740.PNG','2024-12-08',NULL),(1007,'naveen','chintan collection pro',150,'IMG_9739.PNG','2024-12-07',NULL),(1008,'naveen','unkonw',50,'IMG_9738.PNG','2024-12-07',NULL),(1009,'naveen','grapes',40,'IMG_9737.PNG','2024-12-06',NULL),(1010,'naveen','sugar',30,'IMG_9736.PNG','2024-12-06',NULL),(1011,'naveen','milk',40,'IMG_9734.PNG','2024-12-05',NULL),(1012,'naveen','sugar',30,'IMG_9735.PNG','2024-12-05',NULL),(1013,'naveen','hungar box',230,'IMG_9733.PNG','2024-12-05',NULL),(1014,'naveen','vegetables',50,'IMG_9732.PNG','2024-12-04',NULL),(1015,'naveen','vegetables',50,'IMG_9731.PNG','2024-12-04',NULL),(1016,'naveen','milk',10,'IMG_9730.PNG','2024-12-04',NULL),(1017,'naveen','water',25,'IMG_9729.PNG','2024-12-04',NULL),(1018,'naveen','unkonw',40,'IMG_9728.PNG','2024-12-03',NULL),(1019,'naveen','eggs',160,'IMG_9727.PNG','2024-12-03',NULL),(1020,'naveen','milk',40,'IMG_9726.PNG','2024-12-02',NULL),(1021,'naveen','corn chips',20,'IMG_9725.PNG','2024-12-02',NULL),(1022,'naveen','vegetables',30,'IMG_9724.PNG','2024-12-02',NULL),(1023,'naveen','vegetables',50,'IMG_9743.PNG','2024-12-02',NULL),(1024,'naveen','corn',50,'IMG_9723.PNG','2024-12-02',NULL),(1025,'naveen','vegetables',25,'IMG_9722.PNG','2024-12-02',NULL),(1026,'naveen','vegetables',10,'IMG_9721.PNG','2024-12-02',NULL),(1027,'naveen','vegetables',35,'IMG_9720.PNG','2024-12-02',NULL),(1028,'naveen','vegetables',50,'IMG_9719.PNG','2024-12-02',NULL),(1029,'naveen','vegetables',10,'IMG_9718.PNG','2024-12-02',NULL),(1030,'naveen','milk',40,'IMG_9717.PNG','2024-12-02',NULL),(1031,'naveen','ss steel house',20,'IMG_9716.PNG','2024-12-01',NULL),(1032,'naveen','unkonw',25,'IMG_9715.PNG','2024-12-01',NULL),(1033,'naveen','petrol',1080,'IMG_9746.JPG','2024-12-01',NULL),(1034,'naveen','Dmart',3085,'image.jpg','2024-12-08',NULL),(1035,'naveen','Paracetamol',45,'IMG_9748.png','2024-12-09',NULL),(1036,'naveen','post december',2000,'4a3f14b4-40fb-4dbd-8f35-2e138d782414.jpg','2024-12-01',NULL),(1037,'naveen','mutual funds',6000,'funds.png','2024-12-01',NULL),(1038,'naveen','mutual funds',12000,'IMG_9751.jpeg','2024-12-06',NULL),(1039,'naveen','Iphone EMI',2325,'','2024-12-05',NULL),(1040,'naveen','cred',2772,'','2024-12-01',NULL),(1041,'naveen','Rent and power',12500,'','2024-12-01',NULL),(1042,'naveen','Mutual funds',45000,'IMG_9752.jpeg','2024-12-01',NULL),(1043,'naveen','Milk',500,'IMG_9753.png','2024-12-08',NULL),(1044,'naveen','Water',25,'IMG_9754.png','2024-12-10',NULL),(1045,'naveen','Bananas',40,'IMG_9755.png','2024-12-10',NULL),(1046,'naveen','Apollo',107,'IMG_9760.png','2024-12-11',NULL),(1047,'naveen','Milk',66,'IMG_9761.png','2024-12-11',NULL),(1048,'naveen','Onions',100,'IMG_9766.png','2024-12-11',NULL),(1049,'naveen','Lemons',30,'IMG_9765.png','2024-12-11',NULL),(1050,'naveen','Jinger',80,'IMG_9764.png','2024-12-11',NULL),(1051,'naveen','Chicken',500,'IMG_9831.png','2024-12-11',NULL),(1052,'naveen','Milk',75,'IMG_9835.png','2024-12-12',NULL),(1053,'naveen','Pudhena',20,'IMG_9832.png','2024-12-11',NULL),(1054,'naveen','Butter',68,'IMG_9833.png','2024-12-11',NULL),(1055,'naveen','Drink',68,'IMG_9834.png','2024-12-11',NULL),(1056,'naveen','Home world steel',319,'image.jpg','2024-12-12',NULL),(1057,'naveen','Watch repair',300,'image.jpg','2024-12-13',NULL),(1059,'naveen','Beer',420,'IMG_0158.jpeg','2024-12-14',NULL),(1060,'naveen','Lulu mall',343,'image.jpg','2024-12-15',NULL),(1061,'naveen','Water',25,'IMG_9976.png','2024-12-13',NULL),(1062,'naveen','Egg fried rice',70,'IMG_9976.png','2024-12-15',NULL),(1063,'naveen','apple',100,'','2024-12-16',NULL),(1064,'naveen','Water',55,'IMG_9984.jpeg','2024-12-16',NULL),(1065,'naveen','Vegetables',30,'IMG_9981.png','2024-12-16',NULL),(1066,'naveen','Vegetables',25,'IMG_9982.png','2024-12-16',NULL),(1067,'naveen','Milk',45,'IMG_9979.png','2024-12-16',NULL),(1068,'naveen','Milk',30,'IMG_9980.png','2024-12-16',NULL),(1069,'naveen','soma gift',410,'IMG_9986.PNG','2024-12-17',NULL),(1070,'naveen','ear bolts',50,'IMG_0001.PNG','2024-12-18',NULL),(1071,'naveen','fruits',50,'IMG_0002.PNG','2024-12-18',NULL),(1072,'naveen','fruits',100,'IMG_0003.PNG','2024-12-18',NULL),(1073,'naveen','coin box',20,'IMG_0004.PNG','2024-12-18',NULL),(1074,'naveen','vegetables',220,'IMG_0005.PNG','2024-12-18',NULL),(1075,'naveen','milk',60,'IMG_0006.PNG','2024-12-18',NULL),(1076,'naveen','tea',30,'IMG_9998.PNG','2024-12-19',NULL),(1077,'naveen','hungar box',53,'IMG_9999.PNG','2024-12-19',NULL),(1078,'naveen','coffie powder',30,'','2024-12-20',NULL),(1079,'naveen','water',25,'IMG_0007.PNG','2024-12-21',NULL),(1080,'naveen','gas',863,'IMG_0008.PNG','2024-12-21',NULL),(1081,'naveen','Dmart',1228,'IMG_0020.png','2024-12-21',NULL),(1082,'naveen','Eggs',72,'IMG_0022.png','2024-12-21',NULL),(1083,'naveen','Begger',30,'IMG_0021.png','2024-12-21',NULL),(1084,'naveen','Rice cocker',200,'IMG_0023.png','2024-12-21',NULL),(1085,'naveen','Ice cream',15,'IMG_0014.jpeg','2024-12-21',NULL),(1087,'naveen','Milk',30,'IMG_0027.png','2024-12-22',NULL),(1088,'naveen','Water',25,'IMG_0037.png','2024-12-24',NULL),(1089,'naveen','Slate',40,'IMG_0036.png','2024-12-23',NULL),(1090,'naveen','gas delivery charge',20,'','2024-12-24',NULL),(1091,'naveen','Onions',50,'IMG_0049.PNG','2024-12-25',NULL),(1092,'naveen','ginger garlic',110,'IMG_0050.PNG','2024-12-25',NULL),(1093,'naveen','sweet potato',50,'IMG_0051.PNG','2024-12-25',NULL),(1094,'naveen','tread',10,'IMG_0052.PNG','2024-12-25',NULL),(1095,'naveen','forks',20,'IMG_0053.PNG','2024-12-25',NULL),(1096,'naveen','Pomegranate',100,'IMG_0054.PNG','2024-12-25',NULL),(1097,'naveen','kiwi',100,'IMG_0055.PNG','2024-12-25',NULL),(1098,'naveen','oranges',50,'IMG_0056.PNG','2024-12-25',NULL),(1099,'naveen','water',25,'IMG_0057.PNG','2024-12-24',NULL),(1100,'naveen','Biryani',340,'IMG_0150.jpeg','2024-12-26',NULL),(1101,'naveen','Ainu hospital',750,'IMG_0152.jpeg','2024-12-26',NULL),(1102,'naveen','Ainu hospital',1940,'IMG_0153.jpeg','2024-12-26',NULL),(1103,'naveen','Petrol',350,'IMG_0068.png','2024-12-26',NULL),(1104,'naveen','Water',45,'IMG_0078.png','2024-12-27',NULL),(1105,'naveen','Cycle repair',100,'IMG_0080.png','2024-12-28',NULL),(1106,'naveen','Tea',15,'IMG_0079.png','2024-12-27',NULL),(1107,'naveen','Ainu hospital',948,'IMG_0151.jpeg','2024-12-27',NULL),(1108,'naveen','Bday dress shopping',1799,'IMG_0154.jpeg','2024-12-29',NULL),(1109,'naveen','Pani puri',40,'IMG_0094.png','2024-12-29',NULL),(1110,'naveen','Kova bun',20,'IMG_0098.png','2024-12-28',NULL),(1111,'naveen','Banana',30,'IMG_0097.png','2024-12-28',NULL),(1112,'naveen','Broccoli',70,'IMG_0096.png','2024-12-29',NULL),(1113,'naveen','Tomato',15,'IMG_0095.png','2024-12-29',NULL),(1114,'naveen','Curd',10,'IMG_0099.png','2024-12-30',NULL),(1115,'naveen','December post',1500,'IMG_0100.png','2024-12-30',NULL),(1116,'naveen','Water',25,'IMG_0101.png','2024-12-30',NULL),(1118,'naveen','Pizza',173,'IMG_0157.jpeg','2024-12-30',NULL),(1119,'naveen','Chennai shopping mall',2298,'IMG_0156.jpeg','2024-12-31',NULL),(1120,'naveen','Jc brothers shopping mall',2446,'IMG_0155.jpeg','2024-12-31',NULL),(1121,'naveen','Chicken',230,'IMG_0113.png','2025-01-01',NULL),(1122,'naveen','Chicken',100,'IMG_0129.png','2025-01-01',NULL),(1123,'naveen','Curry',130,'IMG_0111.png','2025-01-01',NULL),(1124,'naveen','Water',30,'IMG_0112.png','2025-01-01',NULL),(1125,'naveen','Drinks',70,'IMG_0114.png','2025-01-01',NULL),(1126,'naveen','Chicken',130,'IMG_0115.png','2024-12-31',NULL),(1127,'naveen','B seven',420,'IMG_0130.jpeg','2024-12-31',NULL),(1128,'naveen','Drinks',360,'IMG_0132.jpeg','2025-01-01',NULL),(1129,'naveen','Lulu mall',90,'IMG_0149.jpeg','2025-01-01',NULL),(1130,'naveen','Petrol',510,'image.jpg','2025-01-02',NULL),(1131,'naveen','function amount',500,'','2025-01-02',NULL),(1132,'naveen','bus ticket',470,'busticket.png','2025-01-02',NULL),(1133,'naveen','mutual funds',6000,'mutualjan.png','2025-01-01',NULL),(1134,'naveen','Cred',2772,'IMG_0143.jpeg','2025-01-01',NULL),(1135,'naveen','January post',2000,'IMG_0144.png','2025-01-03',NULL),(1136,'naveen','Tea',15,'IMG_0148.png','2025-01-03',NULL);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (19,'naveen','$2y$10$5jL.dRlbfCKA2x3nc416fOvyv5GJzMuWzFfy.O2uaVMgE5DWPL4Ae','2024-12-09 16:01:25',NULL,'naveen.ch@softforceapps.com');
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

-- Dump completed on 2025-01-04 12:54:31
-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: localhost    Database: demo
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bills` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bills`
--

LOCK TABLES `bills` WRITE;
/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
INSERT INTO `bills` VALUES (1,'Item A',2,100.00),(2,'Item B',1,50.00),(3,'Item C',3,75.00);
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` int NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_general_ci DEFAULT '',
  `date` date DEFAULT NULL,
  `file_blob` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1144 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1003,'naveen','Pani puri',20,'IMG_9742.PNG','2024-12-09',NULL),(1004,'naveen','milk',30,'','2024-12-09',NULL),(1005,'naveen','Dmartice',45,'IMG_9741.PNG','2024-12-08',NULL),(1006,'naveen','saloon',140,'IMG_9740.PNG','2024-12-08',NULL),(1007,'naveen','chintan collection pro',150,'IMG_9739.PNG','2024-12-07',NULL),(1008,'naveen','unkonw',50,'IMG_9738.PNG','2024-12-07',NULL),(1009,'naveen','grapes',40,'IMG_9737.PNG','2024-12-06',NULL),(1010,'naveen','sugar',30,'IMG_9736.PNG','2024-12-06',NULL),(1011,'naveen','milk',40,'IMG_9734.PNG','2024-12-05',NULL),(1012,'naveen','sugar',30,'IMG_9735.PNG','2024-12-05',NULL),(1013,'naveen','hungar box',230,'IMG_9733.PNG','2024-12-05',NULL),(1014,'naveen','vegetables',50,'IMG_9732.PNG','2024-12-04',NULL),(1015,'naveen','vegetables',50,'IMG_9731.PNG','2024-12-04',NULL),(1016,'naveen','milk',10,'IMG_9730.PNG','2024-12-04',NULL),(1017,'naveen','water',25,'IMG_9729.PNG','2024-12-04',NULL),(1018,'naveen','unkonw',40,'IMG_9728.PNG','2024-12-03',NULL),(1019,'naveen','eggs',160,'IMG_9727.PNG','2024-12-03',NULL),(1020,'naveen','milk',40,'IMG_9726.PNG','2024-12-02',NULL),(1021,'naveen','corn chips',20,'IMG_9725.PNG','2024-12-02',NULL),(1022,'naveen','vegetables',30,'IMG_9724.PNG','2024-12-02',NULL),(1023,'naveen','vegetables',50,'IMG_9743.PNG','2024-12-02',NULL),(1024,'naveen','corn',50,'IMG_9723.PNG','2024-12-02',NULL),(1025,'naveen','vegetables',25,'IMG_9722.PNG','2024-12-02',NULL),(1026,'naveen','vegetables',10,'IMG_9721.PNG','2024-12-02',NULL),(1027,'naveen','vegetables',35,'IMG_9720.PNG','2024-12-02',NULL),(1028,'naveen','vegetables',50,'IMG_9719.PNG','2024-12-02',NULL),(1029,'naveen','vegetables',10,'IMG_9718.PNG','2024-12-02',NULL),(1030,'naveen','milk',40,'IMG_9717.PNG','2024-12-02',NULL),(1031,'naveen','ss steel house',20,'IMG_9716.PNG','2024-12-01',NULL),(1032,'naveen','unkonw',25,'IMG_9715.PNG','2024-12-01',NULL),(1033,'naveen','petrol',1080,'IMG_9746.JPG','2024-12-01',NULL),(1034,'naveen','Dmart',3085,'image.jpg','2024-12-08',NULL),(1035,'naveen','Paracetamol',45,'IMG_9748.png','2024-12-09',NULL),(1036,'naveen','post december',2000,'4a3f14b4-40fb-4dbd-8f35-2e138d782414.jpg','2024-12-01',NULL),(1037,'naveen','mutual funds',6000,'funds.png','2024-12-01',NULL),(1038,'naveen','mutual funds',12000,'IMG_9751.jpeg','2024-12-06',NULL),(1039,'naveen','Iphone EMI',2325,'','2024-12-05',NULL),(1040,'naveen','cred',2772,'','2024-12-01',NULL),(1041,'naveen','Rent and power',12500,'','2024-12-01',NULL),(1042,'naveen','Mutual funds',45000,'IMG_9752.jpeg','2024-12-01',NULL),(1043,'naveen','Milk',500,'IMG_9753.png','2024-12-08',NULL),(1044,'naveen','Water',25,'IMG_9754.png','2024-12-10',NULL),(1045,'naveen','Bananas',40,'IMG_9755.png','2024-12-10',NULL),(1046,'naveen','Apollo',107,'IMG_9760.png','2024-12-11',NULL),(1047,'naveen','Milk',66,'IMG_9761.png','2024-12-11',NULL),(1048,'naveen','Onions',100,'IMG_9766.png','2024-12-11',NULL),(1049,'naveen','Lemons',30,'IMG_9765.png','2024-12-11',NULL),(1050,'naveen','Jinger',80,'IMG_9764.png','2024-12-11',NULL),(1051,'naveen','Chicken',500,'IMG_9831.png','2024-12-11',NULL),(1052,'naveen','Milk',75,'IMG_9835.png','2024-12-12',NULL),(1053,'naveen','Pudhena',20,'IMG_9832.png','2024-12-11',NULL),(1054,'naveen','Butter',68,'IMG_9833.png','2024-12-11',NULL),(1055,'naveen','Drink',68,'IMG_9834.png','2024-12-11',NULL),(1056,'naveen','Home world steel',319,'image.jpg','2024-12-12',NULL),(1057,'naveen','Watch repair',300,'image.jpg','2024-12-13',NULL),(1059,'naveen','Beer',420,'IMG_0158.jpeg','2024-12-14',NULL),(1060,'naveen','Lulu mall',343,'image.jpg','2024-12-15',NULL),(1061,'naveen','Water',25,'IMG_9976.png','2024-12-13',NULL),(1062,'naveen','Egg fried rice',70,'IMG_9976.png','2024-12-15',NULL),(1063,'naveen','apple',100,'','2024-12-16',NULL),(1064,'naveen','Water',55,'IMG_9984.jpeg','2024-12-16',NULL),(1065,'naveen','Vegetables',30,'IMG_9981.png','2024-12-16',NULL),(1066,'naveen','Vegetables',25,'IMG_9982.png','2024-12-16',NULL),(1067,'naveen','Milk',45,'IMG_9979.png','2024-12-16',NULL),(1068,'naveen','Milk',30,'IMG_9980.png','2024-12-16',NULL),(1069,'naveen','soma gift',410,'IMG_9986.PNG','2024-12-17',NULL),(1070,'naveen','ear bolts',50,'IMG_0001.PNG','2024-12-18',NULL),(1071,'naveen','fruits',50,'IMG_0002.PNG','2024-12-18',NULL),(1072,'naveen','fruits',100,'IMG_0003.PNG','2024-12-18',NULL),(1073,'naveen','coin box',20,'IMG_0004.PNG','2024-12-18',NULL),(1074,'naveen','vegetables',220,'IMG_0005.PNG','2024-12-18',NULL),(1075,'naveen','milk',60,'IMG_0006.PNG','2024-12-18',NULL),(1076,'naveen','tea',30,'IMG_9998.PNG','2024-12-19',NULL),(1077,'naveen','hungar box',53,'IMG_9999.PNG','2024-12-19',NULL),(1078,'naveen','coffie powder',30,'','2024-12-20',NULL),(1079,'naveen','water',25,'IMG_0007.PNG','2024-12-21',NULL),(1080,'naveen','gas',863,'IMG_0008.PNG','2024-12-21',NULL),(1081,'naveen','Dmart',1228,'IMG_0020.png','2024-12-21',NULL),(1082,'naveen','Eggs',72,'IMG_0022.png','2024-12-21',NULL),(1083,'naveen','Begger',30,'IMG_0021.png','2024-12-21',NULL),(1084,'naveen','Rice cocker',200,'IMG_0023.png','2024-12-21',NULL),(1085,'naveen','Ice cream',15,'IMG_0014.jpeg','2024-12-21',NULL),(1087,'naveen','Milk',30,'IMG_0027.png','2024-12-22',NULL),(1088,'naveen','Water',25,'IMG_0037.png','2024-12-24',NULL),(1089,'naveen','Slate',40,'IMG_0036.png','2024-12-23',NULL),(1090,'naveen','gas delivery charge',20,'','2024-12-24',NULL),(1091,'naveen','Onions',50,'IMG_0049.PNG','2024-12-25',NULL),(1092,'naveen','ginger garlic',110,'IMG_0050.PNG','2024-12-25',NULL),(1093,'naveen','sweet potato',50,'IMG_0051.PNG','2024-12-25',NULL),(1094,'naveen','tread',10,'IMG_0052.PNG','2024-12-25',NULL),(1095,'naveen','forks',20,'IMG_0053.PNG','2024-12-25',NULL),(1096,'naveen','Pomegranate',100,'IMG_0054.PNG','2024-12-25',NULL),(1097,'naveen','kiwi',100,'IMG_0055.PNG','2024-12-25',NULL),(1098,'naveen','oranges',50,'IMG_0056.PNG','2024-12-25',NULL),(1099,'naveen','water',25,'IMG_0057.PNG','2024-12-24',NULL),(1100,'naveen','Biryani',340,'IMG_0150.jpeg','2024-12-26',NULL),(1101,'naveen','Ainu hospital',750,'IMG_0152.jpeg','2024-12-26',NULL),(1102,'naveen','Ainu hospital',1940,'IMG_0153.jpeg','2024-12-26',NULL),(1103,'naveen','Petrol',350,'IMG_0068.png','2024-12-26',NULL),(1104,'naveen','Water',45,'IMG_0078.png','2024-12-27',NULL),(1105,'naveen','Cycle repair',100,'IMG_0080.png','2024-12-28',NULL),(1106,'naveen','Tea',15,'IMG_0079.png','2024-12-27',NULL),(1107,'naveen','Ainu hospital',948,'IMG_0151.jpeg','2024-12-27',NULL),(1108,'naveen','Bday dress shopping',1799,'IMG_0154.jpeg','2024-12-29',NULL),(1109,'naveen','Pani puri',40,'IMG_0094.png','2024-12-29',NULL),(1110,'naveen','Kova bun',20,'IMG_0098.png','2024-12-28',NULL),(1111,'naveen','Banana',30,'IMG_0097.png','2024-12-28',NULL),(1112,'naveen','Broccoli',70,'IMG_0096.png','2024-12-29',NULL),(1113,'naveen','Tomato',15,'IMG_0095.png','2024-12-29',NULL),(1114,'naveen','Curd',10,'IMG_0099.png','2024-12-30',NULL),(1115,'naveen','December post',1500,'IMG_0100.png','2024-12-30',NULL),(1116,'naveen','Water',25,'IMG_0101.png','2024-12-30',NULL),(1118,'naveen','Pizza',173,'IMG_0157.jpeg','2024-12-30',NULL),(1119,'naveen','Chennai shopping mall',2298,'IMG_0156.jpeg','2024-12-31',NULL),(1120,'naveen','Jc brothers shopping mall',2446,'IMG_0155.jpeg','2024-12-31',NULL),(1121,'naveen','Chicken',230,'IMG_0113.png','2025-01-01',NULL),(1122,'naveen','Chicken',100,'IMG_0129.png','2025-01-01',NULL),(1123,'naveen','Curry',130,'IMG_0111.png','2025-01-01',NULL),(1124,'naveen','Water',30,'IMG_0112.png','2025-01-01',NULL),(1125,'naveen','Drinks',70,'IMG_0114.png','2025-01-01',NULL),(1126,'naveen','Chicken',130,'IMG_0115.png','2024-12-31',NULL),(1127,'naveen','B seven',420,'IMG_0130.jpeg','2024-12-31',NULL),(1128,'naveen','Drinks',360,'IMG_0132.jpeg','2025-01-01',NULL),(1129,'naveen','Lulu mall',90,'IMG_0149.jpeg','2025-01-01',NULL),(1130,'naveen','Petrol',510,'image.jpg','2025-01-02',NULL),(1131,'naveen','function amount',500,'','2025-01-02',NULL),(1132,'naveen','bus ticket',470,'busticket.png','2025-01-02',NULL),(1133,'naveen','mutual funds',6000,'mutualjan.png','2025-01-01',NULL),(1134,'naveen','Cred',2772,'IMG_0143.jpeg','2025-01-01',NULL),(1135,'naveen','January post',2000,'IMG_0144.png','2025-01-03',NULL),(1136,'naveen','Tea',15,'IMG_0148.png','2025-01-03',NULL);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (19,'naveen','$2y$10$5jL.dRlbfCKA2x3nc416fOvyv5GJzMuWzFfy.O2uaVMgE5DWPL4Ae','2024-12-09 16:01:25',NULL,'naveen.ch@softforceapps.com');
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

-- Dump completed on 2025-01-04 15:02:10
