-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost    Database: rianews
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(145) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'спорт'),(2,'наука'),(3,'общество'),(4,'мир');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  `category_id` bigint unsigned NOT NULL,
  `views` int DEFAULT '0',
  UNIQUE KEY `id` (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'Иностранный язык для особенных детей: шпаргалка для учителя','МОСКВА, 25 мая — РИА Новости. Ученые Московского городского педагогического университета (МГПУ) разработали модульную программу повышения квалификации учителей иностранного языка, работающих в инклюзивном классе. В программе сформулированы дополнительные профессиональные компетенции педагога, необходимые для успешной работы с детьми с особыми образовательными потребностями, связанными с ограничениями возможностями здоровья (слух, зрение, работа опорно-двигательного аппарата). Исследование опубликовано в журнале Integration of Education.',2,2),(2,'В Белом доме назвали темы встречи Путина и Байдена','США ОЖИДАЮТ, ЧТО НА ВСТРЕЧЕ ПУТИНА И БАЙДЕНА ДОСТАТОЧНО ВРЕМЕНИ БУДЕТ УДЕЛЕНО СТРАТЕГИЧЕСКОЙ СТАБИЛЬНОСТИ - ПСАКИ\nБАЙДЕН В ХОДЕ ВСТРЕЧИ С ПУТИНЫМ РАССЧИТЫВАЕТ ОБСУДИТЬ СТРАТЕГИЧЕСКУЮ СТАБИЛЬНОСТЬ, КОНТРОЛЬ НАД ВООРУЖЕНИЯМИ, УКРАИНУ И БЕЛОРУССИЮ - БЕЛЫЙ ДОМ',4,1),(3,'Головин и Миранчук прибыли в расположение сборной России в Австрии','ЕВРО-2020. Полузащитник \"Монако\" Александр Головин и хавбек итальянской \"Аталанты\" Алексей Миранчук прибыли в расположение сборной России по футболу.\nСборная России проводит сбор в Австрии в преддверии чемпионата Европы.\nЕВРО-2020 пройдет в 11 городах Европы, в том числе в Санкт-Петербурге, с 11 июня по 11 июля. На групповом этапе финального турнира сборная России встретится с командами Бельгии (12 июня), Финляндии (16 июня) и Дании (21 июня).',1,3),(4,'Овечкин рассказал, в каком клубе хочет завершить карьеру','МОСКВА, 25 мая - РИА Новости. Российский нападающий Александр Овечкин заявил, что хотел бы завершить карьеру хоккеиста в клубе НХЛ \"Вашингтон\".',1,5),(5,'В Петербурге предложили построить второй по высоте небоскреб в мире','МОСКВА, 25 мая - РИА Новости. \"Газпром\" предложил построить в Санкт-Петербурге \"Лахта Центр 2\", который станет вторым по высоте небоскребом в мире, говорится в сообщении компании.\nНовая градостроительная инициатива была представлена на заседании межведомственного совета по реализации соглашения о сотрудничестве между Санкт-Петербургом и \"Газпромом\".',3,10);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-26 20:49:55
