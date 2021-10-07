-- MySQL dump 10.13  Distrib 5.7.35, for Linux (x86_64)
--
-- Host: localhost    Database: demo
-- ------------------------------------------------------
-- Server version	5.7.35-0ubuntu0.18.04.2

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
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` varchar(255) NOT NULL,
  `amount` int(10) NOT NULL,
  `file_path` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=584 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (31,'naveen','Kiddy bank','2021-02-02',6000,''),(32,'naveen','Dmart','2021-02-02',900,''),(33,'dal','Indhu Bazar','2021-02-02',1000,''),(34,'naveen','vegitables','2021-02-03',360,''),(35,'naveen','sabza and water nilon','2021-02-04',147,''),(36,'naveen','Dmart','2021-02-05',1030,''),(37,'naveen','chicken','2021-02-06',700,''),(38,'naveen','water millon','2021-02-08',38,''),(39,'naveen','Metro and petrol','2021-02-09',1823,''),(40,'naveen','Dilsukunagar','2021-02-10',1000,''),(41,'naveen','dress materials','2021-02-11',330,''),(42,'naveen','bbq','2021-02-12',706,''),(44,'naveen','metro boating food','2021-02-13',697,''),(46,'naveen','brila mandhir','2021-02-14',235,''),(47,'naveen','milk and lemon','2021-02-15',47,''),(48,'naveen','bekary','2021-02-16',120,''),(49,'naveen','carrite grep sapota ganusgadda','2021-02-17',120,''),(50,'naveen','bendakay totakura normal items juice','2021-02-17',350,''),(51,'naveen','fastag and mobile glass','2021-02-17',350,''),(52,'naveen','hospital OP and water and curd','2021-02-18',150,''),(54,'naveen','water','2021-02-19',15,''),(56,'naveen','Ice cream','2021-02-19',60,''),(57,'naveen','Tifin','2021-02-20',30,''),(58,'naveen','Parking subway','2021-02-20',280,''),(60,'naveen','Movie tickets','2021-02-20',352,''),(61,'naveen','Oil massage','2021-02-21',70,''),(62,'naveen','chicken shoppo','2021-02-21',260,''),(63,'naveen','sprite','2021-02-21',40,''),(64,'naveen','Curd and petrol','2021-02-22',245,''),(65,'naveen','curd','2021-02-23',10,''),(66,'naveen','Lemon dmart and eggs','2021-02-23',390,''),(67,'naveen','Buss ticket','2021-02-23',305,''),(68,'naveen','rta challana','2021-02-24',235,''),(70,'naveen','Sweet and chakodi','2021-02-24',140,''),(72,'naveen','Current bil old room','2021-02-25',201,''),(74,'naveen','Chiken and water curd','2021-02-25',150,''),(75,'naveen','Bellam','2021-02-25',50,''),(76,'naveen','sprite','2021-02-25',40,''),(77,'dal','Mission','2021-02-26',800,''),(78,'dal','Lining','2021-02-26',80,''),(79,'naveen','Car wash','2021-02-27',300,''),(80,'naveen','Car parking','2021-02-27',50,''),(82,'dal','Top and frutes','2021-02-27',1650,''),(83,'dal','Ticket n frts swt','2021-02-27',350,''),(84,'naveen','General insurance','2021-02-27',1300,''),(85,'naveen','cool drinks','2021-02-28',100,''),(86,'naveen','travel and biryani','2021-02-28',440,''),(94,'dal','legin','2021-03-02',353,''),(95,'naveen','Iphone','2021-03-01',3200,''),(96,'naveen','Water milon','2021-03-02',58,''),(97,'naveen','Petrol','2021-03-02',220,''),(98,'dal','Vegitales','2021-03-03',185,''),(100,'naveen','Iron drass','2021-03-04',80,''),(101,'dal','water','2021-03-05',15,''),(102,'dal','Rent','2021-03-05',8500,''),(103,'naveen','Banana','2021-03-05',40,''),(104,'naveen','sir gift','2021-03-06',450,''),(105,'dal','Ice cream','2021-03-06',80,''),(106,'naveen','cool drinks','2021-03-06',70,''),(107,'naveen','Movie, lays, tea','2021-03-07',352,''),(108,'naveen','petorl','2021-03-08',320,''),(109,'naveen','donation','2021-03-08',50,''),(110,'naveen','aws bill','2021-03-08',179,''),(111,'dal','Parlour,sapota,temp glad,food, ticket,kmm tickets','2021-03-08',1210,''),(112,'dal','Tatooo','2021-03-08',600,''),(113,'naveen','water and eggs','2021-03-08',40,''),(114,'naveen','tifin','2021-03-10',50,''),(115,'naveen','tifin','2021-03-11',50,''),(116,'naveen','sambar','2021-03-11',20,''),(117,'dal','Colgate,soap vasiline','2021-03-08',25,''),(118,'naveen','petrol','2021-03-11',520,''),(119,'naveen','dabha','2021-03-11',74,''),(120,'naveen','bus ticket','2021-03-11',100,''),(121,'dal','Kit','2021-03-08',55,''),(124,'dal','Coconut wtr','2021-03-12',60,''),(125,'naveen','Drinks','2021-03-12',40,''),(126,'naveen','Tickets ladu tifins rooms caps photo hundi gajulu bus car','2021-03-13',6100,''),(127,'naveen','Biryani','2021-03-16',735,''),(128,'naveen','Petrol','2021-03-16',320,''),(129,'naveen','meals','2021-03-16',70,''),(130,'naveen','kit','2021-03-16',50,''),(131,'dal','Kfc wtr btl hsptl','2021-03-17',1115,''),(135,'naveen','petrol','2021-03-17',320,''),(136,'naveen','bananna','2021-03-18',40,''),(137,'naveen','water','2021-03-19',15,''),(138,'dal','Manchriya, juice,banana','2021-03-18',170,''),(139,'dal','Wtr','2021-03-19',15,''),(140,'naveen','hsptl','2021-03-19',1240,''),(141,'naveen','Movie','2021-03-20',235,''),(142,'naveen','Fruits','2021-03-21',240,''),(143,'naveen','Medicine,tea,eggs','2021-03-21',168,''),(144,'naveen','current bill','2021-03-21',230,''),(145,'naveen','beer, sandwich, manchuriya, chicken, sugarcane','2021-03-21',611,''),(146,'naveen','thyroid test','2021-03-22',510,''),(147,'naveen','petrol','2021-03-23',320,''),(148,'naveen','Polimeras','2021-03-23',162,''),(149,'naveen','water','2021-03-24',20,''),(150,'naveen','movie','2021-03-23',232,''),(151,'naveen','Biryani,vegitables,drink','2021-03-24',715,''),(152,'naveen','Recharge','2021-03-25',334,''),(153,'dal','Tickets and food','2021-03-25',100,''),(154,'naveen','ice Ceream','2021-03-25',70,''),(155,'naveen','Dmart','2021-03-27',2500,''),(156,'naveen','Metro','2021-03-26',45,''),(158,'naveen','bike old','2021-03-27',300,''),(159,'naveen','vijetha, movie, recharge','2021-03-27',585,''),(160,'dal','Metro tickets','2021-03-27',50,''),(161,'dal','Metro tickets','2021-03-28',45,''),(162,'naveen','water juice ice cream dmart petrol metro','2021-03-28',1510,''),(163,'dal','Metro card','2021-03-29',400,''),(165,'dal','Metro ticket curd','2021-03-30',90,''),(166,'naveen','juice , eggas, chocalets','2021-03-29',95,''),(167,'naveen','Dmart, curd','2021-03-30',1864,''),(168,'naveen','Vegitable bazar','2021-03-31',420,''),(170,'naveen','curd, greps,','2021-04-01',120,''),(171,'naveen','netflix and food','2021-04-02',700,''),(172,'naveen','rent','2021-04-03',8500,'rent.png'),(173,'naveen','juice','2021-04-03',30,''),(174,'naveen','chick, curd, milk, coffee, steel bowl','2021-04-04',958,''),(176,'naveen','Old bike repair advance','2021-04-05',1680,'oldbikerepair.png'),(182,'naveen','petrol','2021-04-06',320,'petrol.png'),(183,'naveen','Vegitables','2021-04-07',135,'IMG_20210407_230011.jpg'),(184,'naveen','Tea','2021-04-07',44,'Screenshot_20210407-204424.png'),(185,'dal','T shrts','2021-04-07',800,''),(186,'dal','Cone, onion','2021-04-09',80,''),(187,'dal','Auto n food ,xerox','2021-04-08',110,''),(188,'dal','Cab n food','2021-04-09',170,''),(190,'dal','Share market','2021-04-07',5000,'sharemarket.png'),(191,'dal','Metro card','2021-04-03',400,''),(193,'naveen','Curd','2021-04-09',55,'Screenshot_20210410-104432.png'),(194,'naveen','Chicken water beer','2021-04-10',540,'Screenshot_20210410-211056.png'),(195,'naveen','Charminar','2021-04-10',260,'Screenshot_20210411-004558.png'),(196,'dal','Chrge kmm to yra','2021-04-12',70,''),(197,'dal','Dmart','2021-04-11',924,'IMG_20210414_124336083.jpg'),(198,'naveen','Biryani petrol polimeras','2021-04-11',270,'IMG_20210414_124359851.jpg'),(199,'naveen','Home milks','2021-04-11',230,'Screenshot_20210414-124633.png'),(200,'krishna','bus ticket','2021-04-14',100,''),(201,'krishna','Cheppals','2021-04-14',260,''),(204,'naveen','Kjl, Thallada ticket n ice crm','2021-04-14',74,''),(205,'dal','Recharge and app link amunt','2021-04-14',450,''),(206,'naveen','Khammam to Hyderabad','2021-04-15',650,'IMG_20210415_230357401.jpg'),(210,'naveen','Fruts,curd,panipuri','2021-04-16',297,'Screenshot_20210416-213122.png'),(213,'dal','Metro recharge','2021-04-16',250,'Screenshot_2021-04-16-21-38-14-402_com.miui.gallery.jpg'),(214,'dal','Share market','2021-04-16',5000,'Screenshot_2021-04-16-20-25-28-446_com.phonepe.app.jpg'),(215,'dal','Interview charge','2021-04-17',105,''),(218,'naveen','Idea reacharge','2021-04-17',98,'Screenshot_20210418-135648.png'),(219,'naveen','Bekary items kara','2021-04-17',322,'Screenshot_20210418-135706.png'),(220,'naveen','Nursery, lemon juice','2021-04-18',840,'Screenshot_20210419-130307.png'),(221,'naveen','Petrol','2021-04-18',320,'petrol.jpg'),(222,'dal','Dmart','2021-04-18',576,'Dmart.jpg'),(223,'naveen','Sanitizer','2021-04-19',75,'Screenshot_20210420-170244.png'),(224,'naveen','Recharge','2021-04-19',555,'Screenshot_20210419-161822.png'),(225,'dal','Legin','2021-04-19',415,'Screenshot_20210420-170202.png'),(226,'naveen','Vegitables','2021-04-21',358,'Screenshot_20210422-173238.png'),(227,'naveen','Milk, eggs','2021-04-23',91,'Screenshot_20210422-173300.png'),(228,'naveen','Bed fitting charges','2021-04-23',110,''),(230,'naveen','Fride rice','2021-04-23',80,'Screenshot_20210424-170057.png'),(231,'naveen','Petrol','2021-04-24',220,'Screenshot_20210424-170228.png'),(232,'naveen','Dry fruits, water bottle','2021-04-24',2680,''),(233,'naveen','Panasa kaya fruts','2021-04-24',100,'Screenshot_20210424-170136.png'),(234,'naveen','Courier, Xerox, receipt','2021-04-24',648,'Screenshot_20210424-170130.png'),(235,'dal','Balket','2021-04-24',370,''),(236,'naveen','Current bill','2021-04-24',275,'Screenshot_20210424-171418.png'),(237,'dal','Layes','2021-04-23',30,''),(239,'naveen','Bday dress, chicken meterial curd','2021-04-25',2390,'Screenshot_20210425-203013.png'),(240,'naveen','Recharge','2021-04-27',598,'Screenshot_20210427-121541.png'),(241,'naveen','Soda, candle , chocolate','2021-04-26',80,'Screenshot_20210428-131719.png'),(242,'naveen','Cake','2021-04-26',480,'cake.jpg'),(243,'naveen','Wine','2021-04-27',1290,'wine.jpg'),(244,'naveen','Sapota','2021-04-27',53,'sapota.jpg'),(245,'naveen','Water, curd','2021-04-28',65,''),(246,'naveen','onions, corn, ginger','2021-04-28',126,''),(247,'dal','water','2021-04-30',20,''),(248,'naveen','Recharge','2021-04-29',98,'Screenshot_20210429-172219.png'),(249,'naveen','Biryani','2021-05-01',163,'Screenshot_20210501-132113.png'),(250,'naveen','Rathnadeep, chicken, curd, lemon, tea, soda','2021-05-02',555,'Screenshot_20210502-212006.png'),(251,'naveen','Rent, power bill','2021-05-04',8680,'Screenshot_20210504-110213.png'),(252,'naveen','awsbill','2021-05-04',23,'awsbill.png'),(253,'naveen','Hathway bill','2021-05-06',2124,'Screenshot_20210506-120038.png'),(254,'naveen','Vegitables,tea','2021-05-05',300,'Screenshot_20210506-120627.png'),(255,'naveen','Tea food','2021-05-06',56,'Screenshot_20210509-144143.png'),(256,'naveen','Curd tea','2021-05-08',105,'Screenshot_20210509-144327.png'),(257,'dal','Share market','2021-05-08',10000,'IMG-20210510-WA0030.jpg'),(258,'naveen','Lemon','2021-05-10',50,'Screenshot_20210510-201114.png'),(259,'naveen','shiva home world','2021-05-10',1099,'shiva home world.jpg'),(260,'naveen','dmart polimeras','2021-05-10',284,'dmart plomeras.jpg'),(261,'naveen','Bike clutch wire','2021-05-09',200,'Screenshot_20210511-170326.png'),(262,'naveen','Fastag','2021-05-11',300,'Screenshot_20210512-092143.png'),(263,'naveen','Bread, tea,lays, stafy','2021-05-11',111,'Screenshot_20210512-092401.png'),(264,'naveen','Water, tifin','2021-05-12',95,'Screenshot_20210515-101342.png'),(265,'naveen','Recharge','2021-05-18',98,'Screenshot_20210521-112029.png'),(269,'naveen','Car tire air','2021-05-23',20,'Screenshot_20210523-093328.png'),(270,'naveen','petrol for car','2021-05-24',510,'Screenshot_20210524-152448.png'),(271,'naveen','Data recharge','2021-05-29',98,'Screenshot_20210531-105521.png'),(272,'naveen','Amma mobile recharge','2021-05-28',149,'Screenshot_20210531-105509.png'),(273,'naveen','Recharge','2021-06-03',149,'Screenshot_20210604-100942.png'),(274,'naveen','pregnancy kit and kitkat','2021-06-06',140,''),(275,'naveen','Rent, power bill','2021-06-07',8607,'Screenshot_20210607-084323.png'),(277,'naveen','TV invoice','2021-06-01',13699,'TV bill.pdf'),(278,'dal','Share market','2021-06-07',10000,'Screenshot_20210607-175910.png'),(279,'naveen','Lays packets','2021-06-09',80,'Screenshot_20210609-220446.png'),(280,'naveen','Belief tests','2021-06-12',2300,'IMG_20210613_202814845.jpg'),(281,'naveen','Belief pharmacy','2021-06-12',3790,'IMG_20210613_202647356.jpg'),(282,'naveen','Car petrol','2021-06-12',1000,'Screenshot_20210613-203711.png'),(283,'naveen','KFC fruits drinks food','2021-06-12',980,''),(286,'naveen','Amma mobile recharge','2021-06-14',249,'Screenshot_20210618-112942.png'),(287,'naveen','Star health insurance','2021-06-21',15706,'Screenshot_20210623-132351.png'),(288,'naveen','recharge','2021-06-24',98,'recharge.png'),(289,'naveen','Flipkart','2021-06-22',514,'Screenshot_20210627-211138.png'),(290,'naveen','chargercable','2021-06-28',339,'Chargercable.pdf'),(291,'naveen','Chicken','2021-06-30',150,''),(292,'naveen','Petrol','2021-07-01',1020,''),(293,'naveen','Ice cream, fruits','2021-07-01',150,''),(294,'naveen','tv installtion','2021-07-02',650,''),(295,'naveen','Dmart','2021-07-02',120,''),(296,'naveen','Barbar shop','2021-07-04',300,'Screenshot_20210704-172128.png'),(297,'naveen','Fruits, tamato','2021-07-03',133,''),(298,'naveen','door cuttens, drinks, food','2021-07-04',760,''),(299,'naveen','vegitables','2021-07-07',490,''),(300,'naveen','SIM','2021-07-07',100,''),(301,'naveen','petrol','2021-07-02',520,''),(302,'naveen','rent','2021-07-07',8500,''),(303,'naveen','gas repair','2021-07-09',400,''),(304,'naveen','Petrol','2021-07-10',510,'Screenshot_20210710-143433.png'),(305,'naveen','Medicine','2021-07-10',1040,'Screenshot_20210710-143458~2.png'),(306,'naveen','Consultant fee, lassy','2021-07-10',270,''),(307,'naveen','All items from temple to home water curd','2021-07-11',680,''),(308,'naveen','Biscuts','2021-07-10',240,'Screenshot_20210711-221939~2.png'),(309,'naveen','Petrol','2021-07-11',1010,'Screenshot_20210711-221747~2.png'),(310,'naveen','Dmart','2021-07-11',2173,'Screenshot_20210711-221824~2.png'),(311,'naveen','Water heater','2021-07-11',479,'16260226568906889098012394784398.jpg'),(312,'naveen','Aruna diagonacy','2021-07-13',610,'Screenshot_20210715-151615.png'),(313,'naveen','Kfc','2021-07-14',525,'Screenshot_20210715-151551.png'),(314,'naveen','Home foods','2021-07-13',351,'Screenshot_20210715-151452~2.png'),(315,'naveen','Naga album amount','2021-07-15',3000,'Screenshot_20210715-150608.png'),(316,'naveen','Naga album amount','2021-07-10',1500,'Screenshot_20210715-150619.png'),(317,'naveen','milk curd','2021-07-15',60,''),(318,'naveen','Petrol scanning blood report','2021-07-16',3050,'Screenshot_20210716-192606~2.png'),(319,'naveen','Bike insurance','2021-07-17',1785,'Screenshot_20210717-163826~2.png'),(320,'naveen','Recharge','2021-07-17',48,'VIL_RECEIPT_9553667939_2021-07-17_.pdf'),(321,'naveen','Polimeraas','2021-07-17',217,'16265345358825407961868260044333.jpg'),(322,'naveen','Shavaramaa','2021-07-17',89,'Screenshot_20210717-204203~2.png'),(323,'naveen','beer','2021-07-17',143,'beerbill.png'),(324,'naveen','Chicken milk curd water','2021-07-18',301,'Screenshot_20210719-111533~2.png'),(325,'naveen','Rathadeep','2021-07-17',105,'IMG_20210719_112023.jpg'),(326,'naveen','Carrot beetroot','2021-07-19',119,'16267102589454595768685228696193.jpg'),(327,'naveen','TD injection','2021-07-21',20,''),(328,'naveen','Medicine','2021-07-22',1680,'Medicine.png'),(329,'naveen','dmart','2021-07-22',255,'dmart.png'),(330,'naveen','allam elipayaa','2021-07-22',50,'allamelipayaa.png'),(331,'naveen','vegetables','2021-07-21',90,'vegetables.png'),(332,'naveen','mutualfunds','2021-07-24',1500,'mutualfunds.png'),(333,'naveen','Rs brothers dress','2021-07-25',1686,'16272270512974565284503783406946.jpg'),(334,'naveen','Bike metro','2021-07-24',77,'Screenshot_20210725-212821~2.png'),(335,'naveen','Bekary water ice cream bikecable','2021-07-24',180,'Screenshot_20210725-212728.png'),(336,'naveen','Machuriya','2021-07-23',130,'Screenshot_20210725-213615~2.png'),(337,'naveen','Chicken','2021-07-25',150,'Screenshot_20210725-213816~2.png'),(338,'naveen','Cyline And fee','2021-07-26',370,'Screenshot_20210726-213243.png'),(339,'naveen','Iron sucrose induction','2021-07-26',515,'Screenshot_20210726-213639~2.png'),(340,'naveen','Beetroot and  kiwe','2021-07-26',220,'Screenshot_20210726-213921~2.png'),(341,'naveen','water','2021-07-28',20,''),(342,'naveen','Petrol','2021-07-28',210,'IMG_20210728_210442_313.jpg'),(343,'naveen','Iron sucrose induction','2021-07-28',650,'IMG_20210728_210531_592.jpg'),(344,'naveen','Vegetables','2021-07-28',210,'Screenshot_20210728-211012.png'),(345,'naveen','Vegetables','2021-07-28',110,'Screenshot_20210728-211028.png'),(346,'naveen','Cyline fee','2021-07-29',200,'Screenshot_20210729-093248~2.png'),(347,'naveen','Recharge','2021-07-29',379,'Screenshot_20210729-163331~2.png'),(348,'naveen','Coke','2021-07-29',20,'Screenshot_20210729-163822~2.png'),(349,'naveen','Curd','2021-07-29',20,'Screenshot_20210729-212840~2.png'),(350,'naveen','Dates drinks','2021-07-30',285,'Screenshot_20210730-173735.png'),(351,'naveen','Iron sucrose induction','2021-07-31',660,'16277463779155484102798108266677.jpg'),(352,'naveen','Curd milk brue','2021-07-30',68,'Screenshot_20210731-212121.png'),(353,'naveen','Watermelon curd','2021-07-31',169,'Screenshot_20210731-212154~2.png'),(354,'naveen','fish water sweet','2021-08-01',570,'saree.jpeg'),(355,'naveen','cline charges','2021-08-01',200,''),(356,'venkatesh','Dates,cold drinks','2021-08-02',280,'Screenshot_2021-08-02-16-13-56-13_944a2809ea1b4cda6ef12d1db9048ed3.png'),(357,'naveen','Petrol','2021-08-02',210,'16279224309283875075870915404612.jpg'),(358,'naveen','Anjeera fruit','2021-08-02',270,'1627922494386675969696668769504.jpg'),(359,'naveen','Oranges','2021-08-02',142,'16279226120297239153696895901257.jpg'),(360,'naveen','Polimeraas','2021-08-02',147,'16279226930009031081237824363594.jpg'),(361,'naveen','Carrot donation','2021-08-02',50,''),(362,'naveen','Mi band cable','2021-08-03',185,'Screenshot_20210803-145028~2.png'),(363,'venkatesh','Petrol','2021-08-02',150,''),(364,'venkatesh','Petrol','2021-08-04',310,''),(365,'venkatesh','Tiffin with nik and himmi','2021-08-04',90,''),(366,'venkatesh','Lunch near office','2021-08-04',100,''),(367,'venkatesh','Morning tea and snacks','2021-08-04',85,''),(368,'naveen','Vegetables,tea,power bill','2021-08-04',159,'Screenshot_20210804-181035~2.png'),(369,'naveen','water','2021-08-04',25,''),(370,'naveen','Rent and powerbill','2021-08-06',8710,'Screenshot_20210806-104450.png'),(371,'naveen','Recharge','2021-08-05',249,'Screenshot_20210806-162128.png'),(372,'venkatesh','Tea and snacks with friends','2021-08-04',150,''),(373,'venkatesh','Personal on tour','2021-08-08',100,'Screenshot_2021-08-09-13-01-33-177_com.phonepe.app.jpg'),(374,'naveen','Dmart','2021-08-06',1292,'16284955623341611364753547937460.jpg'),(375,'venkatesh','Thumps up','2021-08-08',20,'Screenshot_2021-08-09-13-29-28-458_in.org.npci.upiapp.jpg'),(376,'venkatesh','For dolly chain','2021-08-08',7500,'Screenshot_2021-08-09-13-30-08-565_in.org.npci.upiapp.jpg'),(377,'venkatesh','Goli soda','2021-08-07',10,''),(378,'venkatesh','Shop','2021-08-06',80,'Screenshot_2021-08-09-13-31-30-051_in.org.npci.upiapp.jpg'),(379,'venkatesh','Forgot','2021-08-05',135,''),(380,'venkatesh','Mahith belt','2021-08-06',720,''),(381,'venkatesh','Dmart','2021-08-05',5000,''),(382,'venkatesh','Tour expenses','2021-08-08',2500,''),(383,'naveen','saree','2021-08-07',500,'saree.jpeg'),(384,'naveen','drinks','2021-08-07',500,''),(385,'naveen','Trip','2021-08-08',2429,''),(386,'naveen','Chicken and water','2021-08-09',140,'Screenshot_20210811-094416.png'),(387,'naveen','Lunch','2021-08-10',410,'16286590156618925816223952703090.jpg'),(388,'naveen','Petrol','2021-08-09',210,'IMG_20210810_084009_382.jpg'),(389,'naveen','Onions','2021-08-11',100,''),(390,'naveen','PVR tickets','2021-08-11',20,'Screenshot_20210811-204505~2.png'),(391,'naveen','Tifin','2021-08-11',30,'Screenshot_20210811-204537~2.png'),(392,'venkatesh','Lunch','2021-08-09',70,'Screenshot_2021-08-12-10-38-57-31_944a2809ea1b4cda6ef12d1db9048ed3.png'),(393,'venkatesh','Diesel','2021-08-10',1010,'Screenshot_2021-08-12-10-39-02-94_944a2809ea1b4cda6ef12d1db9048ed3.png'),(394,'venkatesh','Tiffins with friends','2021-08-10',150,'Screenshot_2021-08-12-10-39-17-26_944a2809ea1b4cda6ef12d1db9048ed3.png'),(395,'venkatesh','Pan','2021-08-10',36,'Screenshot_2021-08-12-10-39-37-21_944a2809ea1b4cda6ef12d1db9048ed3.png'),(396,'venkatesh','Shawarma in home','2021-08-11',290,'Screenshot_2021-08-12-10-39-42-19_944a2809ea1b4cda6ef12d1db9048ed3.png'),(397,'venkatesh','Fasttag','2021-08-10',100,'Screenshot_2021-08-12-10-45-06-86_49b96b5fbae0d12a18edc4a3afe0dfd9.png'),(398,'venkatesh','Fasttag','2021-08-10',100,''),(399,'venkatesh','Gift for mahith','2021-08-10',1600,'Screenshot_2021-08-12-10-45-20-17_49b96b5fbae0d12a18edc4a3afe0dfd9.png'),(400,'venkatesh','Petrol','2021-08-11',510,'Screenshot_2021-08-12-10-45-27-99_49b96b5fbae0d12a18edc4a3afe0dfd9.png'),(401,'venkatesh','Mummy chain','2021-08-11',15000,'Screenshot_2021-08-12-10-49-42-53_e4c1cb095b567267d5d1f8fb96ab0b79.png'),(402,'venkatesh','Home loan','2021-08-09',10000,'Screenshot_2021-08-12-10-50-37-46_e4c1cb095b567267d5d1f8fb96ab0b79.png'),(403,'naveen','Share market','2021-08-12',3300,'Screenshot_20210812-152852.png'),(405,'venkatesh','Xerox dolly','2021-08-13',180,'Screenshot_2021-08-13-14-11-17-21_49b96b5fbae0d12a18edc4a3afe0dfd9.png'),(407,'naveen','Lunch','2021-08-13',80,'Screenshot_20210813-180018.png'),(408,'naveen','Petrol','2021-08-13',210,'16289532800654554026725170576244.jpg'),(409,'naveen','Dmart','2021-08-13',728,'16289533908754023971174201460803.jpg'),(410,'naveen','Milk chicken metro masala','2021-08-14',194,'Screenshot_20210814-205023~2.png'),(411,'naveen','Curd milk water','2021-08-15',60,'Screenshot_20210816-164808~2.png'),(412,'naveen','Mobile emi','2021-08-17',2900,'Screenshot_20210817-131213~2.png'),(413,'naveen','Milk curd food','2021-08-16',100,'Screenshot_20210817-131415~2.png'),(415,'naveen','petrol','2021-08-17',60,''),(417,'naveen','Petrol','2021-08-17',100,'16292709221383487521127404176895.jpg'),(418,'naveen','eggs and water','2021-08-17',50,''),(419,'venkatesh','Spects','2021-08-14',1400,''),(420,'venkatesh','Dolly bus','2021-08-16',500,''),(421,'venkatesh','Petrol','2021-08-16',510,'WhatsApp Image 2021-08-23 at 15.51.11 (7).jpeg'),(422,'venkatesh','Dolly Exam fee','2021-08-16',1450,'WhatsApp Image 2021-08-23 at 15.51.11 (6).jpeg'),(423,'venkatesh','Hush cafe','2021-08-15',213,'WhatsApp Image 2021-08-23 at 15.51.11 (5).jpeg'),(424,'venkatesh','Insurance','2021-08-17',1052,'WhatsApp Image 2021-08-23 at 15.51.11 (4).jpeg'),(425,'venkatesh','Insurance','2021-08-17',2353,'WhatsApp Image 2021-08-23 at 15.51.11 (3).jpeg'),(426,'venkatesh','Pizza','2021-08-18',121,'WhatsApp Image 2021-08-23 at 15.51.11 (2).jpeg'),(427,'venkatesh','Pizza','2021-08-18',104,'WhatsApp Image 2021-08-23 at 15.51.10 (15).jpeg'),(428,'venkatesh','chips','2021-08-20',19,'WhatsApp Image 2021-08-23 at 15.51.11 (1).jpeg'),(429,'venkatesh','envolope','2021-08-20',12,'WhatsApp Image 2021-08-23 at 15.51.11.jpeg'),(430,'venkatesh','Pinni parcel','2021-08-20',756,'WhatsApp Image 2021-08-23 at 15.51.10 (14).jpeg'),(431,'venkatesh','Fruits','2021-08-21',150,''),(432,'venkatesh','coconut water bunnu','2021-08-21',100,'WhatsApp Image 2021-08-23 at 15.51.10 (12).jpeg'),(433,'venkatesh','Sweet birthday','2021-08-21',310,'WhatsApp Image 2021-08-23 at 15.51.10 (11).jpeg'),(434,'venkatesh','Heritage Paneer','2021-08-21',240,'WhatsApp Image 2021-08-23 at 15.51.10 (10).jpeg'),(435,'venkatesh','Soephree','2021-08-22',210,'WhatsApp Image 2021-08-23 at 15.51.10 (8).jpeg'),(436,'venkatesh','Sunday Wirh friends','2021-08-22',400,''),(437,'venkatesh','Hush cafe','2021-08-18',285,'WhatsApp Image 2021-08-23 at 15.51.10 (7).jpeg'),(438,'venkatesh','mask','2021-08-22',20,'WhatsApp Image 2021-08-23 at 15.51.10 (6).jpeg'),(439,'venkatesh','Pani puri','2021-08-16',30,'WhatsApp Image 2021-08-23 at 15.51.10 (4).jpeg'),(440,'venkatesh','Tempered glass','2021-08-16',50,'WhatsApp Image 2021-08-23 at 15.51.10 (3).jpeg'),(441,'venkatesh','Maggi','2021-08-15',110,'WhatsApp Image 2021-08-23 at 15.51.10 (2).jpeg'),(442,'venkatesh','Kirana','2021-08-15',110,'WhatsApp Image 2021-08-23 at 15.51.10 (1).jpeg'),(443,'venkatesh','Perfume','2021-08-13',105,''),(445,'venkatesh','Pinni Money','2021-08-19',2000,''),(446,'venkatesh','dry fruits','2021-08-22',360,''),(447,'venkatesh','Toys','2021-08-15',100,''),(448,'venkatesh','Diesel','2021-08-14',300,''),(449,'venkatesh','Dolly','2021-08-21',200,''),(450,'venkatesh','Toys mummy','2021-08-15',250,''),(451,'venkatesh','Cold drink','2021-08-15',60,''),(452,'venkatesh','Forgot','2021-08-16',30,''),(453,'venkatesh','Petrol','2021-08-23',500,''),(454,'venkatesh','Thumps Up','2021-08-22',40,''),(455,'venkatesh','Money given to ravi','2021-08-23',300,''),(456,'venkatesh','forgot','2021-08-15',60,''),(457,'venkatesh','rishi prasad','2021-08-24',100,''),(458,'naveen','gas bill','2021-08-25',100,''),(459,'naveen','Bus tickets','2021-08-24',800,'16298839339563854942780495682049.jpg'),(460,'naveen','Petrol','2021-08-20',1500,'Screenshot_20210825-133448.png'),(461,'naveen','Udemy class','2021-08-25',472,'Screenshot_20210825-133422.png'),(462,'naveen','Barbar shop','2021-08-25',220,'Screenshot_20210825-133520.png'),(463,'naveen','Tifin','2021-08-25',90,'Screenshot_20210825-133513.png'),(464,'naveen','Spirit','2021-08-24',20,'Screenshot_20210825-133530.png'),(465,'naveen','Biryani','2021-08-22',420,''),(466,'naveen','lunch','2021-08-20',80,''),(467,'naveen','apples mirchi filter thotakura','2021-08-25',85,''),(468,'naveen','Vegetables','2021-08-25',240,'Screenshot_20210826-133637~2.png'),(469,'naveen','Petrol','2021-08-26',320,'Screenshot_20210826-133750.png'),(470,'venkatesh','Recharge','2021-08-26',399,''),(471,'venkatesh','Vegetables','2021-08-26',250,''),(472,'venkatesh','Beyond Cafe','2021-08-27',350,''),(473,'naveen','Recharge','2021-08-26',151,'Screenshot_20210829-211016.png'),(474,'naveen','Mosenbi','2021-08-26',159,'Screenshot_20210829-211004.png'),(475,'naveen','Dmart','2021-08-28',1266,'Screenshot_20210829-210846.png'),(476,'naveen','Cosmotics','2021-08-29',600,'Screenshot_20210829-210817.png'),(477,'naveen','All items','2021-08-27',270,'Screenshot_20210829-212259~2.png'),(478,'naveen','All items','2021-08-29',252,'Screenshot_20210829-212045.png'),(479,'naveen','Fastag','2021-08-20',300,'Screenshot_20210830-121536.png'),(480,'naveen','Fastag','2021-08-20',50,'Screenshot_20210830-121543.png'),(481,'venkatesh','Petrol','2021-08-27',100,''),(482,'venkatesh','diesel','2021-08-29',400,''),(483,'venkatesh','Tiffin','2021-08-29',100,''),(484,'venkatesh','Challan paid','2021-08-29',135,''),(485,'naveen','Veg sandwich','2021-08-30',126,'16303350932155682859051958898476.jpg'),(487,'naveen','Dry fruits','2021-08-30',511,'16303351948287328912225507338006.jpg'),(488,'naveen','Curd','2021-08-30',20,'Screenshot_20210830-202445.png'),(489,'naveen','Milk curd juice icecream','2021-08-31',155,'Screenshot_20210831-224857~2.png'),(490,'naveen','recharge','2021-09-02',50,'9553667939.pdf'),(491,'naveen','Recharge','2021-09-03',535,'Screenshot_20210903-121513.png'),(492,'naveen','Kfc','2021-09-01',499,'16306534194977208876571329080268.jpg'),(493,'naveen','Petrol','2021-09-02',510,'16306534699327205379870186566591.jpg'),(494,'naveen','Chawli selection','2021-09-01',545,'16306535602742995143777943818179.jpg'),(495,'naveen','Chawli selection','2021-09-01',290,'16306536245208771928083188433941.jpg'),(496,'naveen','mobile emi','2021-09-03',2900,'mobile emi.png'),(497,'naveen','water','2021-09-01',20,'water.png'),(498,'naveen','fiderice','2021-09-01',60,'fiderice.png'),(499,'naveen','mountaindue','2021-09-01',20,'moutaindue.png'),(500,'naveen','vegitable','2021-09-01',220,'vegitables.png'),(501,'naveen','curd and milk','2021-09-01',95,'milk and curd.png'),(502,'naveen','ice cream','2021-09-01',10,'tea.png'),(503,'naveen','recharge','2021-09-02',16,'recharge.png'),(504,'naveen','Musambi','2021-09-03',137,'16306789089327622050606026066309.jpg'),(505,'naveen','Dress','2021-09-03',339,''),(506,'naveen','Promogranate soma','2021-09-03',276,'16309461779184210394270748693637.jpg'),(507,'naveen','Sweetcron, karivepaku','2021-09-06',29,'16309462808663262765458769334345.jpg'),(508,'naveen','Musambi soma','2021-09-03',137,'16309463812175717468516773500351.jpg'),(509,'naveen','Dmart','2021-09-03',173,'16309465409492736317870618234057.jpg'),(510,'naveen','Milk lemon mamchuriya','2021-09-06',223,'Screenshot_20210906-222508.png'),(511,'naveen','Chicken milk curd water tifin','2021-09-05',393,''),(512,'naveen','Movie','2021-09-05',205,'Screenshot_20210905-114758.png'),(513,'naveen','Mutual funds','2021-09-06',1500,'IMG-20210906-WA0004.jpg'),(514,'naveen','Bowlju dress','2021-09-07',1050,''),(515,'naveen','Milk curd','2021-09-07',78,'Screenshot_20210908-214128.png'),(516,'naveen','Vegetables','2021-09-08',607,'Screenshot_20210908-213545.png'),(517,'naveen','Rent and powerbill','2021-09-08',8645,'Screenshot_20210908-214621.png'),(518,'naveen','System for brother','2021-09-07',9090,'assembel sys 07092021.pdf'),(519,'naveen','Petrol','2021-09-07',100,'16311182832502120496004814949207.jpg'),(520,'naveen','Vinayaka pooja items','2021-09-09',478,'Screenshot_20210909-233012.png'),(521,'naveen','Biyap pindi','2021-09-09',20,'Screenshot_20210909-233031.png'),(522,'naveen','Ladu gandham tamalapaku','2021-09-10',115,'Screenshot_20210911-193513~2.png'),(523,'naveen','Ice cream','2021-09-10',30,'Screenshot_20210911-192843.png'),(524,'naveen','Consultant fee','2021-09-11',250,'16313694399464756756881185433527.jpg'),(525,'naveen','Medicine','2021-09-11',1600,'16313693634353392402097099684700.jpg'),(526,'naveen','Ultrasound TIFFA test','2021-09-11',1800,'16313695753483556574252852774727.jpg'),(527,'naveen','Dmart','2021-09-11',1324,'16313824409643894641870984444214.jpg'),(528,'naveen','All items on Vinayaka chaturthi','2021-09-10',157,'IMG-20210911-WA0010.jpg'),(529,'naveen','Subway soma','2021-09-11',170,'16313830884799007553261087125658.jpg'),(530,'naveen','McDonalds','2021-09-11',138,'Screenshot_20210911-161743.png'),(531,'naveen','Bike battery','2021-09-12',500,'Screenshot_20210912-211725.png'),(532,'naveen','Dress','2021-09-12',339,'Screenshot_20210912-112207.png'),(533,'naveen','Water curd pindi','2021-09-12',90,'Screenshot_20210912-211756.png'),(534,'naveen','Cheta lemon water','2021-09-12',135,'Screenshot_20210914-110939.png'),(535,'naveen','Badham lemon juice','2021-09-13',27,'Screenshot_20210914-111825~2.png'),(536,'naveen','petrol','2021-09-13',215,'16316888583982849113130046030278.jpg'),(537,'naveen','dates and chocolates','2021-09-13',231,'16316889189245874379712443233524.jpg'),(538,'naveen','eggs icecream','2021-09-14',145,'Screenshot_20210915-122859~2.png'),(539,'naveen','Mutual funds','2021-09-15',5000,'IMG_20210915_125234.jpg'),(540,'naveen','Vegetables','2021-09-15',313,'Screenshot_20210915-235951~2.png'),(541,'naveen','Vegetables','2021-09-15',110,'Screenshot_20210916-000020~2.png'),(542,'naveen','Dry fruits','2021-09-16',1050,'1631812345798876755026930878795.jpg'),(543,'naveen','Dress','2021-09-16',200,'Screenshot_20210916-224407.png'),(544,'naveen','Machuriya','2021-09-16',70,'Screenshot_20210916-224437~2.png'),(545,'naveen','Biryani','2021-09-17',755,'16319094090314103003507514841974.jpg'),(546,'naveen','Movie tickets','2021-09-17',201,'Screenshot_20210918-014300.png'),(547,'naveen','Share market','2021-09-17',3080,'Screenshot_20210918-014440~2.png'),(548,'naveen','water chimala mandhu','2021-09-19',40,''),(549,'naveen','Pizza','2021-09-21',250,'16322326654798420156500590669903.jpg'),(550,'naveen','Milk curd','2021-09-21',78,'Screenshot_20210921-192918.png'),(551,'naveen','Recharge','2021-09-21',151,'Screenshot_20210921-192925~2.png'),(552,'naveen','Dmart','2021-09-21',411,'16322448712832931604998130580552.jpg'),(553,'naveen','Petrol','2021-09-21',215,'16322449512652237198129848313673.jpg'),(554,'naveen','Ice cream','2021-09-21',18,'16322450301441971806755322959750.jpg'),(555,'naveen','Vegetables','2021-09-22',530,'Screenshot_20210922-225806~2.png'),(556,'naveen','Movie','2021-09-23',63,'Screenshot_20210923-110256.png'),(557,'naveen','Milk water','2021-09-23',88,'Screenshot_20210924-100359~2.png'),(559,'naveen','Curd milk tablets cock','2021-09-25',108,''),(560,'naveen','Chicken and eggs','2021-09-26',200,'IMG_20210926_220430_675.jpg'),(563,'naveen','testingg','2021-09-27',30,'16327235624522602983467631370490.jpg'),(564,'naveen','Aruna diagonacy','2021-09-27',2000,'IMG_20210927_113537_254.jpg'),(565,'naveen','teddy bear','2021-09-27',429,'Amazon.in - Order 405-0214862-3466768.pdf'),(566,'naveen','Dinner petrol','2021-10-01',1460,'Screenshot_20210929-214823~2.png'),(567,'naveen','Vegetables','2021-09-29',301,'Screenshot_20210929-215118~2.png'),(568,'naveen','Petrol','2021-09-30',216,'16329825264081876012893615609812.jpg'),(569,'naveen','mobile emi','2021-10-01',2900,'mobile emi.png'),(570,'naveen','Share market','2021-10-01',1400,'Screenshot_20211001-103709~2.png'),(571,'naveen','Seethampalam','2021-10-01',100,'Screenshot_20211001-212523~2.png'),(572,'naveen','Water tifin','2021-09-30',45,'Screenshot_20211001-212758~2.png'),(573,'naveen','Curd','2021-09-30',38,'Screenshot_20211001-212832~2.png'),(574,'naveen','Curd','2021-10-02',40,'Screenshot_20211004-222415~2.png'),(575,'naveen','Curd  water','2021-10-04',60,'Screenshot_20211004-222539~2.png'),(576,'naveen','Mutual funds','2021-10-05',2970,'Screenshot_20211005-102949~2.png'),(577,'naveen','aws bill','2021-10-05',220,'Invoice_866673125.pdf'),(578,'naveen','milk bellam samosaa','2021-10-05',128,'IMG_3071.jpg'),(579,'naveen','Dates choco','2021-10-06',185,'1633511874240775948954852276309.jpg'),(580,'naveen','Vegetables','2021-10-06',275,'Screenshot_20211006-221647.png'),(581,'naveen','Curd milk','2021-10-07',78,'Screenshot_20211007-210035~2.png'),(582,'naveen','Rent and powerbill','2021-10-07',8700,'Screenshot_20211007-205227.png'),(583,'naveen','Petrol','2021-10-07',180,'');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'dal','$2y$10$oxWz.hKBSyO531jScQGMh.U2d1WJi/UbAm0ZcyZYg2PBaOXfCi8fC','2021-02-09 15:50:47',NULL,NULL),(7,'naveen','$2y$10$qoMWa8FOcAUU352OGYOtbujFuf18zmp0RRqtALSXnY3YMpcbwi8uC','2021-02-16 00:00:00',NULL,'naveencheekati2@gmail.com'),(10,'admin','$2y$10$toMZm7ihOjlN/i7gJ9qITu/zlXOBcJhA7yADACfWXetKoVYZ37gi2','2021-03-19 05:21:44','admin',NULL),(11,'krishna','$2y$10$XBDuNEPQST8DcQe9IAv3b.fdXK6s6CzwxaVBd46LhhE9mKJeS4Qxq','2021-04-14 11:43:53',NULL,NULL),(13,'venkatesh','$2y$10$j327Dekh0Unos1BAllbxzOC5E5iHmaQJruZFtA8XcsmN4cDDZNbtu','2021-08-02 15:15:07',NULL,NULL),(15,'Purushotham','$2y$10$lGmXqcSUw1IaxLIn5FJ2YeaGS6XtUQeIo0lJWAVwlqX/MTJ4x497W','2021-08-17 15:18:48',NULL,'purushotham.happy@gmail.com'),(16,'Basha','$2y$10$8V8Z0dHMCGE.vz7R4ROjruG71L1nmUtZOKhmVU4gNI6Kk6jDXYWqi','2021-08-17 18:00:08',NULL,'janibasha786786@gmail.com'),(17,'test','$2y$10$ltaDRFTfgUuzmcwso6cohegPO.W4jYkG2UoSdvlFb.lEMd.p7f/2i','2021-08-24 18:54:54',NULL,'test123@gmail.com');
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

-- Dump completed on 2021-10-08  0:05:01
