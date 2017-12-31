-- MySQL dump 10.13  Distrib 5.6.38, for Linux (x86_64)
--
-- Host: localhost    Database: dbproject
-- ------------------------------------------------------
-- Server version	5.6.38

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
INSERT INTO `migration_versions` VALUES ('20171231002034');
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
INSERT INTO `provider_bankdetail_bankaccount` VALUES ('0af48a6a-743c-4404-a4cb-1495c945d8cc','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-5','0365-888777999-5'),('66579862-ff30-4124-967a-fa98f897f7cf','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-4','0365-888777999-4'),('705e194f-f13f-43c1-9001-27b1cfd582b9','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-2','0365-888777999-2'),('a6c9f8a2-29c0-4d7d-a596-46d793b85bcd','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-1','0365-888777999-1'),('af76e397-f5f3-49c3-93fc-3fb089465d00','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-3','0365-888777999-3');
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
INSERT INTO `provider_information_email` VALUES ('0e32eb18-cdda-40fe-ac8b-e99b37ec0369','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc1@xyz.com'),('534049a2-44db-49fa-8666-1399994f5024','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc5@xyz.com'),('b88b5b75-8095-4449-83ed-89d2be04b623','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc2@xyz.com'),('e3486626-63dc-4a2d-9f64-f7a77a45cfb8','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc3@xyz.com'),('fa6564ea-791a-438d-9a90-56aa3a97fb22','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc4@xyz.com');
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
INSERT INTO `provider_information_phone` VALUES ('25f7975e-0f3b-4cb0-ae09-c76f5857f704','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(054)741852963',2),('385e5e04-3712-4d9b-9fd1-f9e6607f9471','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(053)741852963',2),('90883ae9-a5aa-4d3f-8388-edf2ca2c2c99','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(052)741852963',2),('a10c75c3-c7e0-47eb-852c-304e7557cff5','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(055)741852963',2),('e4a6ab7a-f24b-44d3-bf6d-81923025c797','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(051)741852963',2);
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
INSERT INTO `provider_product_providerproduct` VALUES ('5e9a4a5e-352c-444a-af5e-0b7d164fd514','54958337-e3f9-49dd-8285-a3fba5e7c2ea','f03b0609-2bfe-451c-a531-a5e77f137bac',0),('91018173-e7bb-4fd9-8f59-ddd0ab8efa0f','54958337-e3f9-49dd-8285-a3fba5e7c2ea','f4569bac-539f-4329-a7a1-8df281a0f164',0),('98d0550f-db8e-47e1-9d9e-36689d6ae876','54958337-e3f9-49dd-8285-a3fba5e7c2ea','59f20421-1492-4a13-abe6-4ddc8b0ce986',0),('c0998fbf-fff1-449e-a4be-640a601eba39','54958337-e3f9-49dd-8285-a3fba5e7c2ea','e21e5085-5a60-40f4-8bd5-c1d1134e6302',0),('dd9fefe5-5a9b-49e9-a2c6-a983d70e06cd','54958337-e3f9-49dd-8285-a3fba5e7c2ea','b669c851-6290-422d-a820-4b39a6f029dd',0);
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
  `page_web` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
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
INSERT INTO `provider_provider` VALUES ('54958337-e3f9-49dd-8285-a3fba5e7c2ea','72a63fc6-5139-41a0-8dc5-89e372b0fe7f','jose Guillermo Completo',NULL),('c9b9ceed-ac6e-41e7-a250-0eaab7f90429','4d4fffaa-7a01-4b89-88ca-6b4eeda3cb3f','jose guillermo',NULL);
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
INSERT INTO `provider_source_source` VALUES ('0965777f-c47d-442f-b609-f68b5dbc0b98','Empresa 9','Empresa nueve','Av 9 de diciembre','PE010103','ruc','123456789','15','company'),('4d4fffaa-7a01-4b89-88ca-6b4eeda3cb3f','Empresa data information','Empresa correos telefono cuenta bancaria','av jr la informacion','PE030407','ruc','20552196578','985','company'),('72a63fc6-5139-41a0-8dc5-89e372b0fe7f','Empresa data completa','Empresa completa','Av las encinas','PE030407','ruc','20552196578','985','company'),('835ede27-7e5c-4b31-8384-1c31cef7a19e','Empresa 11','Empresa once','Av 11 de octubre','PE010300','ruc','20552196578','985','company');
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

-- Dump completed on 2017-12-31  0:21:02
