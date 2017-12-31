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
INSERT INTO `migration_versions` VALUES ('20171231005906');
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
INSERT INTO `provider_bankdetail_bankaccount` VALUES ('1096bed5-0c24-49e5-8b57-93d2c07295c3','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-3','0365-888777999-3'),('4918a47b-5914-42f6-926b-6d96aba7bc7e','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-5','0365-888777999-5'),('96273f56-04f2-43f7-9d28-1dfe510ed086','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-2','0365-888777999-2'),('e27faeb1-1d9e-4d91-8f9c-7f30f75d7da8','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-1','0365-888777999-1'),('fc255e37-f5e2-4ff0-add1-9f57bfddfe3d','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-4','0365-888777999-4');
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
INSERT INTO `provider_information_email` VALUES ('8b131b91-cd37-4f7e-a6c8-d346fc4cb5e7','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc5@xyz.com'),('b9ba6897-548b-4179-8c47-c7634944b346','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc2@xyz.com'),('b9dbd7eb-4e02-4f98-a28c-130c71b17d15','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc4@xyz.com'),('c7313f2e-ff40-4381-a770-65a4b5bd20f0','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc3@xyz.com'),('f1dd3d0b-47bb-4df5-8e64-5786d549b23a','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc1@xyz.com');
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
INSERT INTO `provider_information_phone` VALUES ('35901cf5-aef3-4258-b63b-5e2fa6fb2ac5','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(052)741852963',2),('4ca49f76-cd79-4112-86f9-195bddcdb759','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(054)741852963',2),('612bd186-0c81-4819-ade6-9682c7d2e5db','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(055)741852963',2),('c52e571f-2c7c-4564-82d4-6d74bc35d7f6','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(053)741852963',2),('ef7faffe-72d3-46f4-9ba5-c6b58620b99c','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(051)741852963',2);
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
INSERT INTO `provider_product_providerproduct` VALUES ('023d42e4-cd82-4770-ae96-05ea51b9e908','54958337-e3f9-49dd-8285-a3fba5e7c2ea','e21e5085-5a60-40f4-8bd5-c1d1134e6302',0),('0b9a002d-0587-4a84-adda-d584baa76aa8','54958337-e3f9-49dd-8285-a3fba5e7c2ea','f4569bac-539f-4329-a7a1-8df281a0f164',0),('ad032e1b-2dc4-4050-8e32-d5d4c6cbe3cf','54958337-e3f9-49dd-8285-a3fba5e7c2ea','b669c851-6290-422d-a820-4b39a6f029dd',0),('b6895a60-a5dd-4703-9ebb-88c5ea63f495','54958337-e3f9-49dd-8285-a3fba5e7c2ea','f03b0609-2bfe-451c-a531-a5e77f137bac',0),('eb6e15ab-6057-4a67-83e8-b964ce8ac938','54958337-e3f9-49dd-8285-a3fba5e7c2ea','59f20421-1492-4a13-abe6-4ddc8b0ce986',0);
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
INSERT INTO `provider_provider` VALUES ('54958337-e3f9-49dd-8285-a3fba5e7c2ea','2f277852-d1e7-4a26-bdcf-2ade941d471f','jose Guillermo Completo',NULL),('c9b9ceed-ac6e-41e7-a250-0eaab7f90429','a7361ce1-d274-4f0a-9d5c-37fd5e300dc6','jose guillermo',NULL);
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
INSERT INTO `provider_source_source` VALUES ('0965777f-c47d-442f-b609-f68b5dbc0b98','Empresa 9','Empresa nueve','Av 9 de diciembre','PE010103','ruc','123456789','15','company'),('2f277852-d1e7-4a26-bdcf-2ade941d471f','Empresa data completa','Empresa completa','Av las encinas','PE030407','ruc','20552196578','985','company'),('835ede27-7e5c-4b31-8384-1c31cef7a19e','Empresa 11','Empresa once','Av 11 de octubre','PE010300','ruc','20552196578','985','company'),('a7361ce1-d274-4f0a-9d5c-37fd5e300dc6','Empresa data information','Empresa correos telefono cuenta bancaria','av jr la informacion','PE030407','ruc','20552196578','985','company');
/*!40000 ALTER TABLE `provider_source_source` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubigeo`
--

DROP TABLE IF EXISTS `ubigeo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubigeo` (
  `id` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `country` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_country_ubigeo` (`country`),
  KEY `idx_department_ubigeo` (`department`),
  KEY `idx_province_ubigeo` (`province`),
  KEY `idx_district_ubigeo` (`district`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubigeo`
--

LOCK TABLES `ubigeo` WRITE;
/*!40000 ALTER TABLE `ubigeo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ubigeo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-02 23:43:40
