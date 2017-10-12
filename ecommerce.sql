-- MySQL dump 10.16  Distrib 10.1.25-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: final_ecommerce
-- ------------------------------------------------------
-- Server version	10.1.25-MariaDB

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
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_login` (
  `email` varchar(50) NOT NULL,
  `password` int(20) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_login`
--

LOCK TABLES `admin_login` WRITE;
/*!40000 ALTER TABLE `admin_login` DISABLE KEYS */;
INSERT INTO `admin_login` VALUES ('priya@gmail.com',1234);
/*!40000 ALTER TABLE `admin_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `analysis`
--

DROP TABLE IF EXISTS `analysis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analysis` (
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analysis`
--

LOCK TABLES `analysis` WRITE;
/*!40000 ALTER TABLE `analysis` DISABLE KEYS */;
INSERT INTO `analysis` VALUES (NULL,0,0,NULL,NULL),(3,66,66,NULL,NULL),(4,82,82,NULL,NULL),(4,78,78,4,NULL),(3,11,66,2,NULL),(4,13,75,2,2017);
/*!40000 ALTER TABLE `analysis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`,`customer_id`,`subcategory_id`),
  KEY `subcategory_id` (`subcategory_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `category` (`subcategory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_backup`
--

DROP TABLE IF EXISTS `cart_backup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_backup` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) NOT NULL,
  `shipped_date` date DEFAULT NULL,
  PRIMARY KEY (`cart_id`,`customer_id`,`subcategory_id`),
  KEY `subcategory_id` (`subcategory_id`),
  CONSTRAINT `cart_backup_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `category` (`subcategory_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_backup`
--

LOCK TABLES `cart_backup` WRITE;
/*!40000 ALTER TABLE `cart_backup` DISABLE KEYS */;
INSERT INTO `cart_backup` VALUES (1,3,1197,3,399,1,1,1,NULL),(2,3,481,1,481,1,5,5,NULL),(3,3,500,1,500,1,19,19,NULL),(4,3,600,1,600,2,36,36,NULL),(6,3,300,1,300,4,7,7,NULL),(9,3,6000,6,1000,4,78,78,NULL),(12,3,6000,5,1200,3,59,59,NULL),(14,3,6000,6,1000,2,35,35,NULL),(15,3,1000,1,1000,3,72,72,NULL),(16,3,399,1,399,1,1,1,NULL),(17,3,1000,1,1000,4,78,78,NULL),(18,3,481,1,481,1,5,5,NULL),(19,3,1000,1,1000,3,72,72,NULL),(20,3,1500,1,1500,4,83,83,NULL),(21,3,13500,9,1500,4,83,83,NULL),(22,3,3000,1,3000,4,81,81,NULL),(23,3,1000,1,1000,2,35,35,NULL),(24,3,200,1,200,1,14,14,NULL),(25,3,2000,2,1000,4,78,78,NULL),(26,3,479,1,479,2,2,2,NULL),(27,3,599,1,599,3,3,3,NULL),(28,3,599,1,599,3,3,3,NULL),(29,3,399,1,399,1,1,1,NULL),(30,3,2500,1,2500,4,75,75,NULL),(31,3,300,1,300,2,30,30,NULL),(32,3,4000,4,1000,4,78,78,NULL),(33,3,1000,1,1000,4,84,84,NULL),(34,3,3600,3,1200,4,85,85,NULL),(35,3,599,1,599,4,4,4,NULL),(36,3,699,1,699,2,6,6,NULL),(37,3,3000,2,1500,3,66,66,NULL),(38,3,2000,1,2000,4,82,82,NULL),(39,3,1000,1,1000,4,78,78,NULL),(40,3,1500,1,1500,3,66,66,NULL),(41,3,1500,1,1500,3,11,66,NULL),(42,3,2500,1,2500,4,13,75,NULL);
/*!40000 ALTER TABLE `cart_backup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `subcategory_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcat_name` varchar(20) DEFAULT NULL,
  `category_desc` varchar(200) DEFAULT NULL,
  `sell_price` int(5) DEFAULT NULL,
  `cost_price` int(5) DEFAULT NULL,
  `quantity` int(7) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`subcategory_id`),
  KEY `category_id` (`category_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,1,1,'Aqua lush','blue cotton pile',399,199,64,'images/towels/bath towel/bath1.jpg',1),(2,2,5,'Floral Blue','Blue flower patterned',500,279,60,' images/bedsheets/cotton/cotton22.jpeg',1),(3,3,10,'Pattern Classic','Patchwork patterned',599,399,50,'images/blankets/bedspread/bedspread4.jpg',1),(4,4,16,'Wowen carper','Juterope woven',599,399,50,'images/carpets/woven/woven2.jpg',1),(5,1,2,'classic hand_stiched','White colored with handstitched initials',481,281,50,'images/towels/baby/b3.jpg',1),(6,2,7,'Patterns designed','White colored with muted peach and black patterns',699,599,50,'images/bedsheets/polyster/polyster4.jpg',1),(7,4,14,'Ultramarine carpet',' Ultramarine blue colored',300,200,50,'images/carpets/needle felt/needle5.jpg',1),(8,1,3,'Plain white ',' Plain white with print',974,774,50,'images/towels/golf towel/golf1.jpg',1),(9,1,1,'cream blue Towel','Medium sized in brown,cream and blue color',250,150,100,'images/towels/bath towel/bath2.jpg',0),(10,1,1,'color shades','Fluffy large sized with colors ranging from light to dark shades',400,300,50,'images/towels/bath towel/bath3.jpeg',0),(11,1,1,'Set Towel','Medium sized available in a set of 6 pieces',1000,800,50,'images/towels/bath towel/bath4.jpg',0),(12,1,1,'Geometric Patterns','Aquamarine with white geometric patterns',700,500,50,'images/towels/bath towel/bath5.jpg',0),(13,1,1,'Hand towels set','Hand towels in a set of 6 pieces',200,150,50,'images/towels/bath towel/bath6.jpg',0),(14,1,2,'Hooded Pink ','Cotton hooded pink baby towel',200,150,50,'images/towels/baby/b1.jpg',0),(15,1,2,'Owl design','White Woolen with knitted owl design',400,300,50,'images/towels/baby/b2.jpg',0),(16,1,2,'symmetric blue set','Light blue cotton with symmetric patterns in a set of 6 pieces',400,300,50,'images/towels/baby/b4.jpg',0),(17,1,2,'Monkey design ','Brown hooden woolen with monkey design ',250,180,50,'images/towels/baby/b5.jpg',0),(18,1,2,'Cat design','Pink cotton hooded with cat design',250,180,50,'images/towels/baby/b6.jpg',0),(19,1,3,'classic Velvet','Velvet with muted shades',500,400,50,'images/towels/golf towel/golf2.jpg',0),(20,1,3,'Small size set','small sized available in a set of 6 pieces',300,200,50,' images/towels/golf towel/golf3.jpg',0),(21,1,3,'Hand towel','small sized available in a set of 6 pieces',300,200,50,' images/towels/golf towel/golf4.jpg',0),(22,1,3,'Small Black','small sized in plain black color',150,80,50,' images/towels/golf towel/golf5.jpg',0),(23,1,3,'forest green','Medium sized available in black and forest green',300,200,50,' images/towels/golf towel/golf6.jpg',0),(24,1,4,'super soft','Towel Set Super Soft and Absorbent in a set of 6 pieces',1500,800,50,'images/towels/bamboo/bamboo_1.jpg',0),(25,1,4,'bamboo_2','Natural antibacterial effect, excellent softness, permeability and ability to absorb humidity.',360,250,50,' images/towels/bamboo/bamboo_2.jpg',0),(26,1,4,'bamboo_3','Ultra absorbant in a 6 piece set',6000,5000,50,' images/towels/bamboo/bamboo_3.jpg',0),(27,1,4,'bamboo_4','Super soft and absorbant in a 6 piece set',6000,5000,50,' images/towels/bamboo/bamboo_4.jpg',0),(28,1,4,'bamboo_5','superior rayon,velvety soft and super absorbent, hotel & spa quality 6 piece towel set',1600,100,50,' images/towels/bamboo/bamboo_5.jpg',0),(29,1,4,'bamboo_5','Ultra soft set of 6 in pastel colors',3000,2000,50,' images/towels/bamboo/bamboo_6.jpg',0),(30,2,5,'cotton1','Lavender colored with white and lavender colored flowers',300,200,50,' images/bedsheets/cotton/cotton1.jpeg',0),(31,2,5,'cotton3','Beautiful blue colored with japanese red and peach flower print',300,200,50,'images/bedsheets/cotton/cotton3.jpeg',0),(32,2,5,'cotton4','Set of 3 Rajasthani King Size Cotton Bedsheets',700,500,50,' images/bedsheets/cotton/cotton4.jpg',0),(33,2,5,'cotton5','Saraswati Cotton Plain Queen sized Double Bedsheet',300,200,50,'images/bedsheets/cotton/cotton5.jpeg',0),(34,2,5,'cotton5','Cotton Printed Double Bedsheet',250,1500,50,'images/bedsheets/cotton/cotton6.jpeg',0),(35,2,6,'percale1','Soft ochre with brown pattern',1000,800,50,' images/bedsheets/percale/percale1.jpg',0),(36,2,6,'percale2','Fretwork cotton printed king sheet set in aqua',600,450,50,'images/bedsheets/percale/percale2.jpg',0),(37,2,6,'percale3','Tribeca living maui printed sheet set',800,600,50,'images/bedsheets/percale/percale3.jpg',0),(38,2,6,'percale4','Classic floral printed bedsheets',600,450,50,'images/bedsheets/percale/percale4.jpg',0),(39,2,6,'percale5','Marimekko Unikko Grey/White/Orange',1000,700,50,' images/bedsheets/percale/percale7.jpg',0),(40,2,6,'percale6','Executive Stone percale triple sheets',1500,1300,30,'images/bedsheets/percale/percale8.jpg',0),(41,2,6,'percale7','Executive black percale triple sheets',1500,1300,30,'images/bedsheets/percale/percale44.jpg',0),(42,2,7,'polyster1','Double Polyester Bedsheet',800,700,80,'images/bedsheets/polyster/polyster1.jpg',0),(43,2,7,'polyster2','Rainbow/Flowers/Sun Bed Sheets Polyester Students Flat Bedsheet',900,800,50,'images/bedsheets/polyster/polyster2.jpg',0),(44,2,7,'polyster3','Embroidery bed sheets',900,800,50,'images/bedsheets/polyster/polyster3.jpg',0),(45,2,7,'polyster5','Blue sheets with striped pattern',800,700,30,'images/bedsheets/polyster/polyster7.jpg',0),(46,2,7,'polyster 6','Ocher checkered sheets with purple flower pattern',500,400,70,'images/bedsheets/polyster/polyster6.jpg',0),(47,2,8,'satin 1','White Cotton Satin Stripe Fitted Sheet',1200,900,70,'images/bedsheets/satin/satin1.jpg',0),(48,2,8,'satin 2','Luxury western style pink silk bed linen',1500,1300,40,'images/bedsheets/satin/satin9.jpg',0),(49,2,8,'satin 2','Dark blue bedding Super king size queen fitted',2500,2300,40,'images/bedsheets/satin/satin10.jpg',0),(50,2,8,'satin 4',' Genuine silk soft satin double sized',2700,2500,40,'images/bedsheets/satin/satin11.jpg',0),(51,2,8,'satin 5','Aquamarine blue with floral pattern',3000,2700,40,'images/bedsheets/satin/sateen6.jpg',0),(52,2,8,'satin 6','Satin Weave Cotton Pure Color Light Purple Bed Sheets',1200,1000,40,'images/bedsheets/satin/satin12.jpg',0),(53,2,9,'flannel 1','Cherry Wine Mini Checks',1000,800,40,'images/bedsheets/flannel/flannel1.jpg',0),(54,2,9,'flannel 2','Bold Brick Shepherd Checks',1000,800,40,'images/bedsheets/flannel/flannel2.jpg',0),(55,2,9,'flannel 3','Aspen Collection Extra Soft Printed',1500,1200,40,'images/bedsheets/flannel/flannel9.jpg',0),(56,2,9,'flannel 4','Pinzon Queen sized Cream/Blue Stripe Plaid',1500,1200,40,'images/bedsheets/flannel/flannel4.jpg',0),(57,2,9,'flannel 5','Pinzon Queen sized Cream/Blue Stripe Plaid',1100,900,70,'images/bedsheets/flannel/flannel5.jpg',0),(58,2,9,'flannel 6','Bold Brown Madras Checked Flannel Bed Sheet',900,700,30,'images/bedsheets/flannel/flannel6.jpg',0),(59,3,10,'bedspread 1','LaMont Blue home Woven',1200,1100,50,'images/blankets/bedspread/bedspread11.jpg',0),(60,3,10,'bedspread 2','midcentury modest bedspread',1500,1300,60,'images/blankets/bedspread/bedspread12.jpg',0),(61,3,10,'bedspread 3','Garland Ivory Bedspread by Logan & Mason',2000,1900,40,'images/blankets/bedspread/bedspread13.jpg',0),(62,3,10,'bedspread 4','Vibrant Solid-colored Microfiber/ Cotton Quilted French Tile ',1800,1700,40,'images/blankets/bedspread/bedspread14.jpg',0),(63,3,10,'bedspread 5','King sized in blue',1700,1500,40,'images/blankets/bedspread/bedspread15.jpg',0),(64,3,10,'bedspread 6','French Tile Quilted Grey Twin Bedspread',2100,1900,50,'images/blankets/bedspread/bedspread16.jpg',0),(65,3,11,'woven 1','Herringbone Woven Blanket Orange and White Cotton ',1000,900,50,'images/blankets/woven/woven11.jpg',0),(66,3,11,'woven 2','Chunky Ecru wool woven Blanket natural organic',1500,1400,30,'images/blankets/woven/woven12.jpg',0),(67,3,11,'woven 3','Slopes Stripe Hand Woven',1100,900,50,'images/blankets/woven/woven13.jpg',0),(68,3,11,'woven 4','Classic woven with bohemian twist',900,700,50,'images/blankets/woven/woven14.jpg',0),(69,3,11,'woven 5','Classic woven in set of 3 pieces',1500,1200,50,'images/blankets/woven/woven15.jpg',0),(70,3,11,'woven 6','Ultra touch woven bedsheets',1200,1100,50,'images/blankets/woven/woven16.jpeg',0),(71,3,12,'Knitted polyster1','Authentic blue colored',900,700,50,'images/blankets/knitted polyester/knitted_polyster_1.jpg',0),(72,3,12,'Knitted polyster2','Pumpkin colored with knitted pattern',1000,900,50,'images/blankets/knitted polyester/knitted_polyester_2.jpg',0),(73,3,12,'Knitted polyster3','henille Cable Knit Baby Blanket in a set of 3 pieces',1500,1300,50,'images/blankets/knitted polyester/poly3.jpg',0),(74,4,13,'knotted1','Beautiful hand crafted knotted carpet with rajasthani print',2000,1900,50,'images/carpets/knotted/knotted1.jpeg',0),(75,4,13,'knotted2','Persian Black Tabriz Hand knotted',2500,2300,50,'images/carpets/knotted/knotted12.jpg ',0),(76,4,13,'knotted3','Circluar soft and padded with flower pattern design',3000,2900,50,'images/carpets/knotted/knotted3.jpg ',0),(77,4,13,'knotted4','Authentic black carpet with hand woven indian design',5000,4700,50,'images/carpets/knotted/knotted4.jpg ',0),(78,4,14,'needlefelt1','Simple blue colored with bauble bottom',1000,700,50,'images/carpets/needle felt/needle1.jpg',0),(79,4,14,'needlefelt2','Simple brown colored with bauble bottom',1000,700,50,'images/carpets/needle felt/needle4.jpg',0),(80,4,14,'needlefelt3','Circular padded with shades of blue and red',1500,1300,50,'images/carpets/needle felt/needle3.jpg',0),(81,4,15,'tufted1','Beautiful tufted with rajasthani pattern',3000,2700,50,'images/carpets/tufted/tufted1.jpg',0),(82,4,15,'tufted2','Soft, padded with beautoful flower pattern',2000,1500,50,'images/carpets/tufted/tufted3.jpg',0),(83,4,15,'tufted3','Peach colored with circular flower patterns',1500,1300,50,'images/carpets/tufted/tufted6.jpg',0),(84,4,16,'woven1','Brown colored with padded flower pattern',1000,700,50,'images/carpets/woven/woven3.jpg',0),(85,4,16,'woven3','Woven pattern in shades of ocher and brown',1200,1000,50,'images/carpets/woven/woven4.jpg',0),(86,4,16,'woven4','Kersaint Cobb Jute Herringbone',900,700,50,'images/carpets/woven/woven7.jpg',0);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_copy`
--

DROP TABLE IF EXISTS `category_copy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_copy` (
  `category_name` varchar(20) DEFAULT NULL,
  `category_desc` varchar(200) DEFAULT NULL,
  `sell_price` int(5) DEFAULT NULL,
  `cost_price` int(5) DEFAULT NULL,
  `quantity` int(7) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_copy`
--

LOCK TABLES `category_copy` WRITE;
/*!40000 ALTER TABLE `category_copy` DISABLE KEYS */;
INSERT INTO `category_copy` VALUES ('Bath','Blue cotton pile',399,199,50,'images/towels/bath towel/bath1.jpg',1),('Cotton','Blue flower patterned',479,279,50,'images/bedsheets/cotton/cotton22.jpeg',1),('Bedspread','Patchwork patterned',599,399,50,'images/blankets/bedspread/bedspread4.jpg',1),('Woven','Juterope woven',599,399,50,'images/carpets/woven/woven2.jpg',1),('Baby','White colored with handstitched initials',481,281,50,'images/towels/baby/b3.jpg',1),('Polyester','White colored with muted peach and black patterns',799,599,50,'images/bedsheets/polyster/polyster4.jpg',1),('Needle felt','Ultramarine blue colored',300,200,50,'images/carpets/needle felt/needle5.jpg',1),('Golf','Plain white with print',974,774,50,'images/towels/golf towel/golf1.jpg',1),('Satin','Purple and white colored with purple flower patterns',1099,799,50,'satin4.jpg',0),('Knotted','Woolen double-knotted',4000,3000,50,'knotted2.jpeg',0),('Percale','Organic 300 thread count muted blue colored',8500,7500,50,'percale2.jpg',0),('Tufted','Indian hand tufted',6900,5900,50,'tufted1.jpg',0);
/*!40000 ALTER TABLE `category_copy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(10) NOT NULL,
  `number` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Poornima','poorathi@gmail.com','marathi',NULL),(2,'Manjushree','rtt@gmail.com','w678',NULL),(3,'isha','isha@gmail.com','pass',NULL),(4,'Anjali','nuik3@gmail.com','w678',NULL),(5,'neha','neha@gmail.com','abc',NULL),(6,'nikita','nikuchita@gmail.com','myqwerty',9869410617);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_category`
--

DROP TABLE IF EXISTS `main_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_category` (
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`category_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `main_category_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_category`
--

LOCK TABLES `main_category` WRITE;
/*!40000 ALTER TABLE `main_category` DISABLE KEYS */;
INSERT INTO `main_category` VALUES (1,1,'Bath'),(2,1,'Baby'),(3,1,'Golf'),(4,1,'Bamboo'),(5,2,'Cotton'),(6,2,'Percale'),(7,2,'Polyster'),(8,2,'Satin'),(9,2,'Flannel'),(10,3,'Bedspread'),(11,3,'Woven'),(12,3,'Knitted polyster'),(13,4,'Knotted'),(14,4,'Needle felt'),(15,4,'Tufted'),(16,4,'Woven');
/*!40000 ALTER TABLE `main_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `address` varchar(300) DEFAULT NULL,
  `shipped_date` date DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `city_state` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `Orderr_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,3,'djfh','2017-10-11','2006-10-17',1400,'Nasik-Maharashtra'),(2,3,'shelgi','2017-10-12','2007-10-17',1999,'Mumbai-Maharashtra'),(3,3,'z','2017-10-12','2007-10-17',3675,'Chennai-karnatak'),(4,3,'smc','2017-10-12','2007-10-17',3675,'Solapur-Maharashtra'),(5,3,'smc','2017-10-12','2007-10-17',3675,'Solapur-Maharashtra'),(6,3,'smc','2017-10-12','2007-10-17',3675,'Solapur-Maharashtra'),(7,3,'shelgi','2017-10-12','2007-10-17',5271,'Solapur-Maharashtra'),(8,3,'jghj','2017-10-12','2007-10-17',399,'Chennai-karnatak'),(9,3,'wetyg','2017-10-12','2007-10-17',399,'Mumbai-Maharashtra'),(10,3,'rty','2017-10-12','2007-10-17',960,'Aurangabad-Maharashtra'),(19,3,'dfh','2017-10-15','2010-10-17',3078,'Chennai-karnatak'),(20,3,'sdv','2017-10-15','2010-10-17',18000,'Solapur-Maharashtra'),(21,3,'dfg','2017-10-15','2017-10-10',1399,'Nasik-Maharashtra'),(22,3,'boriwali','2017-10-15','2017-10-10',1481,'Mumbai-Maharashtra'),(23,3,'wanowri','2017-10-15','2017-10-10',1000,'Mumbai-Maharashtra'),(27,3,'shelgi','2017-10-15','2017-10-10',200,'Solapur-Maharashtra'),(29,3,'boriwali','2017-10-15','2017-10-10',1078,'Mumbai-Maharashtra'),(30,3,'n','2017-10-15','2017-10-10',3498,'Mumbai-Maharashtra'),(31,3,'amdg','2017-10-15','2017-10-10',4300,'Mumbai-Maharashtra'),(32,3,'sdg','2017-10-15','2017-10-10',5898,'Mumbai-Maharashtra'),(33,3,'xdnf','2017-10-15','2017-10-10',3000,'Mumbai-Maharashtra'),(34,3,'dgv','2017-10-15','2017-10-10',2000,'Mumbai-Maharashtra'),(35,3,'sb','2017-10-15','2017-10-10',2500,'Mumbai-Maharashtra'),(36,3,'bg','2017-10-15','2017-10-10',1500,'Mumbai-Maharashtra'),(37,3,'bvc','2017-10-15','2017-10-10',2500,'Mumbai-Maharashtra');
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger insert_ship after insert on order_details
for each row
begin
insert into shipping(order_id,shipper_id)values
 (new.order_id,(select shipper_id from shipper where city_state=new.city_state));
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(20) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Towels'),(2,'Bedsheets'),(3,'Blankets'),(4,'Carpets');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipper`
--

DROP TABLE IF EXISTS `shipper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipper` (
  `shipper_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(20) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `city_state` varchar(20) DEFAULT NULL,
  `delivery_boy_id` int(11) DEFAULT NULL,
  `dpassword` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`shipper_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipper`
--

LOCK TABLES `shipper` WRITE;
/*!40000 ALTER TABLE `shipper` DISABLE KEYS */;
INSERT INTO `shipper` VALUES (1,'Brukan Ship service',-27563558,'mumbai',11,'01abc'),(2,'DTDC Express Ltd',-26682865,'pune',21,'21abc'),(3,'Seatrans Movers Ltd',9810516859,'Delhi',31,'31abc'),(4,'maf',9923269884,'Mumbai-Maharashtra',41,'41abc');
/*!40000 ALTER TABLE `shipper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping`
--

DROP TABLE IF EXISTS `shipping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shipping` (
  `order_id` int(11) DEFAULT NULL,
  `shipper_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping`
--

LOCK TABLES `shipping` WRITE;
/*!40000 ALTER TABLE `shipping` DISABLE KEYS */;
INSERT INTO `shipping` VALUES (24,4),(25,4),(26,4),(27,NULL),(28,4),(29,4),(30,4),(31,4),(32,4),(33,4),(34,4),(35,4),(36,4),(37,4);
/*!40000 ALTER TABLE `shipping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `s_name` varchar(50) DEFAULT NULL,
  `manager_name` varchar(10) NOT NULL,
  `email_id` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (1,'Mayuri Textiles','Ram','ram_mayuri_textile@gmail.com'),(2,'Rima Textiles','Ram','Rahul_Rima_textile@gmail.com'),(3,'Mehta Textiles','Priya','Priya_Mehta_textile@gmail.com');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-12 12:23:55
