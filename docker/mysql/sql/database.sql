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
INSERT INTO `provider_bankdetail_bankaccount` VALUES ('588d36c4-bfe9-4974-a330-464432b36963','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-4','0365-888777999-4'),('6d15cc60-1340-4abf-a50c-50205cc08f90','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-2','0365-888777999-2'),('c1560095-04ee-4393-af10-2d95648840c6','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-3','0365-888777999-3'),('d0a6f084-8bf6-4fe1-9df4-794fdeb94e49','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-5','0365-888777999-5'),('e556cefa-7b51-4af0-9015-aa2bc1f76d13','22a6272c-8298-48c7-ab4b-111c453deb0c','54958337-e3f9-49dd-8285-a3fba5e7c2ea',1,2,'Jose referencia de cuenta','888777999-1','0365-888777999-1');
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
INSERT INTO `provider_information_email` VALUES ('14972f25-3fe0-4590-acb6-3c72900cc097','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc2@xyz.com'),('1bf2490a-0423-473c-bd04-351764ee91a0','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc3@xyz.com'),('8a15f768-9c9d-40db-b0f1-3f1b73ad16bd','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc1@xyz.com'),('fbaa2ed4-e059-425c-b4dd-279e1def7c1f','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc5@xyz.com'),('ff520874-8f92-4acc-90df-b6841d736d94','54958337-e3f9-49dd-8285-a3fba5e7c2ea','abc4@xyz.com');
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
INSERT INTO `provider_information_phone` VALUES ('0e4bdfeb-11c1-4d8d-809d-086c94ab4493','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(052)741852963',2),('3f511ddd-73cc-4c7e-abe9-8051edf02276','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(055)741852963',2),('8d7d6af7-bfd3-4399-b610-f09abbbd3704','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(051)741852963',2),('9130efd8-2906-43a8-b816-2097678e0b12','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(053)741852963',2),('c3a8260b-c02c-47c8-b88c-34bde7727ce8','54958337-e3f9-49dd-8285-a3fba5e7c2ea','(054)741852963',2);
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
INSERT INTO `provider_product_providerproduct` VALUES ('0262b84e-1b2b-45ab-985b-40300889f343','54958337-e3f9-49dd-8285-a3fba5e7c2ea','f4569bac-539f-4329-a7a1-8df281a0f164',0),('0df35fc7-f987-4abd-ad82-ecd57e5d00cd','54958337-e3f9-49dd-8285-a3fba5e7c2ea','e21e5085-5a60-40f4-8bd5-c1d1134e6302',0),('3bdcde53-e674-4437-832d-1885ebaba983','54958337-e3f9-49dd-8285-a3fba5e7c2ea','59f20421-1492-4a13-abe6-4ddc8b0ce986',0),('855feb68-7978-4714-9f24-879c845bb9fd','54958337-e3f9-49dd-8285-a3fba5e7c2ea','b669c851-6290-422d-a820-4b39a6f029dd',0),('e2b7b03b-2672-4e55-96f8-f6fd9faec16a','54958337-e3f9-49dd-8285-a3fba5e7c2ea','f03b0609-2bfe-451c-a531-a5e77f137bac',0);
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
INSERT INTO `provider_provider` VALUES ('54958337-e3f9-49dd-8285-a3fba5e7c2ea','4753ae41-c470-43dc-bd0b-e3e48f2b4340','jose Guillermo Completo',NULL),('c9b9ceed-ac6e-41e7-a250-0eaab7f90429','b1a01ad5-2e15-44ab-a4a0-2e8fd794d881','jose guillermo',NULL);
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
INSERT INTO `provider_source_source` VALUES ('0965777f-c47d-442f-b609-f68b5dbc0b98','Empresa 9','Empresa nueve','Av 9 de diciembre','PE010103','ruc','123456789','15','company'),('4753ae41-c470-43dc-bd0b-e3e48f2b4340','Empresa data completa','Empresa completa','Av las encinas','PE030407','ruc','20552196578','985','company'),('835ede27-7e5c-4b31-8384-1c31cef7a19e','Empresa 11','Empresa once','Av 11 de octubre','PE010300','ruc','20552196578','985','company'),('b1a01ad5-2e15-44ab-a4a0-2e8fd794d881','Empresa data information','Empresa correos telefono cuenta bancaria','av jr la informacion','PE030407','ruc','20552196578','985','company');
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

-- Dump completed on 2017-12-31  1:06:24
