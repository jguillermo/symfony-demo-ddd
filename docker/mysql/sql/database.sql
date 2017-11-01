-- MySQL dump 10.13  Distrib 5.6.35, for Linux (x86_64)
--
-- Host: localhost    Database: dbproject
-- ------------------------------------------------------
-- Server version	5.6.35

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
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20171025232347'),('20171101055418');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_item`
--

DROP TABLE IF EXISTS `product_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_item` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_item`
--

LOCK TABLES `product_item` WRITE;
/*!40000 ALTER TABLE `product_item` DISABLE KEYS */;
INSERT INTO `product_item` VALUES ('30570c52-abcf-487a-97bc-0fb562a79095','Item 3','7515'),('99b53dae-da9b-4fb2-be6d-a71faff4a655','Item 1','6518'),('cd37c9a9-2e16-46bf-a431-77a6b04cdb5b','Item 2','2154');
/*!40000 ALTER TABLE `product_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_product`
--

DROP TABLE IF EXISTS `product_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_product` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `item_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_2931F1D126F525E` (`item_id`),
  CONSTRAINT `FK_2931F1D126F525E` FOREIGN KEY (`item_id`) REFERENCES `product_item` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_product`
--

LOCK TABLES `product_product` WRITE;
/*!40000 ALTER TABLE `product_product` DISABLE KEYS */;
INSERT INTO `product_product` VALUES ('59f20421-1492-4a13-abe6-4ddc8b0ce986','cd37c9a9-2e16-46bf-a431-77a6b04cdb5b','Producto 2'),('b669c851-6290-422d-a820-4b39a6f029dd','99b53dae-da9b-4fb2-be6d-a71faff4a655','Producto 4'),('e21e5085-5a60-40f4-8bd5-c1d1134e6302','99b53dae-da9b-4fb2-be6d-a71faff4a655','Producto 1'),('f03b0609-2bfe-451c-a531-a5e77f137bac','cd37c9a9-2e16-46bf-a431-77a6b04cdb5b','Producto 5'),('f4569bac-539f-4329-a7a1-8df281a0f164','30570c52-abcf-487a-97bc-0fb562a79095','Producto 3');
/*!40000 ALTER TABLE `product_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider_bankdetail`
--

DROP TABLE IF EXISTS `provider_bankdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provider_bankdetail` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider_bankdetail`
--

LOCK TABLES `provider_bankdetail` WRITE;
/*!40000 ALTER TABLE `provider_bankdetail` DISABLE KEYS */;
INSERT INTO `provider_bankdetail` VALUES ('22a6272c-8298-48c7-ab4b-111c453deb0c','Banco 1'),('3547ac22-453d-457c-ad7d-f1b0c45e680f','Banco 2');
/*!40000 ALTER TABLE `provider_bankdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider_bankdetail_bankaccount`
--

DROP TABLE IF EXISTS `provider_bankdetail_bankaccount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provider_bankdetail_bankaccount` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `bank_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `provider_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `type` smallint(6) NOT NULL,
  `money` smallint(6) NOT NULL,
  `holder_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `number_number` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `number_interbank` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_86923C5F11C8FB41` (`bank_id`),
  KEY `IDX_86923C5FA53A8AA` (`provider_id`),
  CONSTRAINT `FK_86923C5F11C8FB41` FOREIGN KEY (`bank_id`) REFERENCES `provider_bankdetail` (`id`),
  CONSTRAINT `FK_86923C5FA53A8AA` FOREIGN KEY (`provider_id`) REFERENCES `provider_provider` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider_bankdetail_bankaccount`
--

LOCK TABLES `provider_bankdetail_bankaccount` WRITE;
/*!40000 ALTER TABLE `provider_bankdetail_bankaccount` DISABLE KEYS */;
/*!40000 ALTER TABLE `provider_bankdetail_bankaccount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider_information_email`
--

DROP TABLE IF EXISTS `provider_information_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provider_information_email` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `provider_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E7DED1CCA53A8AA` (`provider_id`),
  CONSTRAINT `FK_E7DED1CCA53A8AA` FOREIGN KEY (`provider_id`) REFERENCES `provider_provider` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider_information_email`
--

LOCK TABLES `provider_information_email` WRITE;
/*!40000 ALTER TABLE `provider_information_email` DISABLE KEYS */;
/*!40000 ALTER TABLE `provider_information_email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider_information_phone`
--

DROP TABLE IF EXISTS `provider_information_phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provider_information_phone` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `provider_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_44033A65A53A8AA` (`provider_id`),
  CONSTRAINT `FK_44033A65A53A8AA` FOREIGN KEY (`provider_id`) REFERENCES `provider_provider` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider_information_phone`
--

LOCK TABLES `provider_information_phone` WRITE;
/*!40000 ALTER TABLE `provider_information_phone` DISABLE KEYS */;
/*!40000 ALTER TABLE `provider_information_phone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider_product_providerproduct`
--

DROP TABLE IF EXISTS `provider_product_providerproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provider_product_providerproduct` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `provider_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `product_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `level` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_99F09853A53A8AA` (`provider_id`),
  KEY `IDX_99F098534584665A` (`product_id`),
  CONSTRAINT `FK_99F098534584665A` FOREIGN KEY (`product_id`) REFERENCES `product_product` (`id`),
  CONSTRAINT `FK_99F09853A53A8AA` FOREIGN KEY (`provider_id`) REFERENCES `provider_provider` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider_product_providerproduct`
--

LOCK TABLES `provider_product_providerproduct` WRITE;
/*!40000 ALTER TABLE `provider_product_providerproduct` DISABLE KEYS */;
/*!40000 ALTER TABLE `provider_product_providerproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider_provider`
--

DROP TABLE IF EXISTS `provider_provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provider_provider` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `source_id` char(36) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '(DC2Type:guid)',
  `contac_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DA861D75953C1C61` (`source_id`),
  CONSTRAINT `FK_DA861D75953C1C61` FOREIGN KEY (`source_id`) REFERENCES `provider_source_source` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider_provider`
--

LOCK TABLES `provider_provider` WRITE;
/*!40000 ALTER TABLE `provider_provider` DISABLE KEYS */;
/*!40000 ALTER TABLE `provider_provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider_source_source`
--

DROP TABLE IF EXISTS `provider_source_source`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provider_source_source` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `trade_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ubigeo` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `document_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `document_number` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `entity_id` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
  `entity_name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider_source_source`
--

LOCK TABLES `provider_source_source` WRITE;
/*!40000 ALTER TABLE `provider_source_source` DISABLE KEYS */;
/*!40000 ALTER TABLE `provider_source_source` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-01  5:54:39
