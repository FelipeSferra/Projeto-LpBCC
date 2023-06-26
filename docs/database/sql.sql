CREATE DATABASE  IF NOT EXISTS `biblioteca` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `biblioteca`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: biblioteca
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autor` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NOME` varchar(45) NOT NULL,
  `D_E_L_E_T_E` char(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (1,'J. K. Rowling',NULL),(2,'Guillermo del Toro',NULL),(3,'Machado de Assis',NULL);
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NOME` varchar(45) NOT NULL,
  `CEP` int NOT NULL,
  `ENDERECO` varchar(45) NOT NULL,
  `NUMERO` int NOT NULL,
  `CIDADE` varchar(45) NOT NULL,
  `UF` char(2) NOT NULL,
  `D_E_L_E_T_E` char(1) DEFAULT NULL,
  `QTDE_EMPRESTIMOS` int DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (2,'teste',19807585,'Rua Piracicaba',512,'Assis','SP','*',14),(3,'Felipe Sferra de Oliveira',19802152,'Rua Fagundes Varela',1704,'Assis','SP','*',1);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editora`
--

DROP TABLE IF EXISTS `editora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editora` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NOME` varchar(45) NOT NULL,
  `D_E_L_E_T_E` char(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editora`
--

LOCK TABLES `editora` WRITE;
/*!40000 ALTER TABLE `editora` DISABLE KEYS */;
INSERT INTO `editora` VALUES (1,'Intrínseca',NULL),(2,'teste','*'),(3,'Rocco',NULL);
/*!40000 ALTER TABLE `editora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genero` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(45) NOT NULL,
  `D_E_L_E_T_E` char(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'Ação',NULL),(2,'Aventura',NULL),(3,'Fantasia',NULL),(4,'Terror',NULL),(5,'Ficção',NULL);
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `livro` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TITULO` varchar(45) DEFAULT NULL,
  `SLUG` varchar(60) DEFAULT NULL,
  `SINOPSE` text NOT NULL,
  `THUMB` varchar(200) NOT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `QTDE` int DEFAULT NULL,
  `D_E_L_E_T_E` char(1) DEFAULT NULL,
  `GENERO_ID` int NOT NULL,
  `AUTOR_ID` int NOT NULL,
  `EDITORA_ID` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `fk_LIVRO_GENERO_idx` (`GENERO_ID`),
  KEY `fk_LIVRO_AUTOR1_idx` (`AUTOR_ID`),
  KEY `fk_LIVRO_EDITORA1_idx` (`EDITORA_ID`),
  CONSTRAINT `fk_LIVRO_AUTOR1` FOREIGN KEY (`AUTOR_ID`) REFERENCES `autor` (`ID`),
  CONSTRAINT `fk_LIVRO_EDITORA1` FOREIGN KEY (`EDITORA_ID`) REFERENCES `editora` (`ID`),
  CONSTRAINT `fk_LIVRO_GENERO` FOREIGN KEY (`GENERO_ID`) REFERENCES `genero` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
INSERT INTO `livro` VALUES (1,'O Labirinto Do Fauno','o-labirinto-do-fauno','No ano de 1944, Ofélia e a mãe cruzam uma estrada de terra que corta uma floresta longínqua ao norte da Espanha, um lugar que guarda histórias já esquecidas pelos homens. O novo lar é um moinho de vento tomado pela escuridão e pela crueldade do capitão Vidal e seus soldados, dispostos a tudo para exterminar os rebeldes que se escondem na mata. Mas o que eles não sabem é que a floresta que tanto odeiam também abriga criaturas mágicas e poderosas, habitantes de um reino subterrâneo repleto de encantos e horrores, súditos em busca de sua princesa há muito perdida. Uma princesa que, segundo os sussurros das árvores, finalmente retornou ao lar. No livro, a narrativa de Ofélia é intercalada com ilustrações e contos de fadas inéditos, baseados em elementos-chave de O Labirinto do Fauno. A obra é uma impactante ode ao poder das histórias, seja em imagens ou palavras, e a sua capacidade de transformar a realidade a nossa volta.','https://http2.mlstatic.com/D_NQ_NP_617917-MLB32140972589_092019-O.jpg','Disponivel',2,NULL,3,2,1),(2,'Harry Potter e a Pedra Filosofal','harry-potter-e-a-pedra-filosofal','Quando virou o envelope, com a mão trêmula, Harry viu um lacre de cera púrpura com um brasão; um leão, uma águia, um texugo e uma cobra circulando uma grande letra `H`. Harry Potter nunca havia ouvido falar de Hogwarts quando as cartas começaram a aparecer no capacho da Rua dos Alfeneiros, nº 4. Escritos a tinta verde-esmeralda em pergaminho amarelado com um lacre de cera púrpura, as cartas eram rapidamente confiscadas por seus pavorosos tio e tia. Então, no aniversário de onze anos de Harry, um gigante com olhos que luziam como besouros negros chamado Rúbeo Hagrid surge com notícias surpreendentes: Harry Potter é um bruxo e tem uma vaga na Escola de Magia e Bruxaria de Hogwarts. Uma incrível aventura está para começar!','https://m.media-amazon.com/images/I/51lRMYwP-4L.jpg','Disponivel',15,NULL,3,1,3),(3,'teste3','teste3','teste3teste3teste3teste3teste3','teste3teste3teste3','Emprestado',9,'*',2,1,3),(4,'TEste de Slug Aqui está','teste-de-slug-aqui-esta','TEste de Slug Aqui está','TEste de Slug Aqui está','Emprestado',9,'*',2,1,3),(5,'teste5','teste5','teste5teste5teste5teste5','teste5teste5teste5','Emprestado',9,'*',2,1,3),(6,'Harry Potter e a Câmara Secreta','harry-potter-e-a-camara-secreta','Depois de férias aborrecidas na casa dos tios trouxas, está na hora de Harry Potter voltar a estudar. Coisas acontecem, no entanto, para dificultar o regresso de Harry. Persistente e astuto, o herói não se deixa intimidar pelos obstáculos e, com a ajuda dos fiéis amigos Weasley, começa o ano letivo na Escola de Magia e Bruxaria de Hogwarts. As novidades não são poucas. Novos colegas, novos professores, muitas e boas descobertas e um grande e perigosos desafio. Alguém ou alguma coisa ameaça a segurança e a tranquilidade dos membros de Hogwarts.','https://m.media-amazon.com/images/I/51SnGLrrJcL._SY344_BO1,204,203,200_QL70_ML2_.jpg','Disponivel',9,NULL,3,1,3),(10,'O Alienista','o-alienista','Clássico da literatura brasileira, este texto de Machado de Assis continua sendo, cento e trinta anos depois de sua publicação original, uma das mais devastadoras observações sobre a insanidade a que pode chegar a ciência. Tão palpitante quanto de leitura prazerosa, O alienista é uma dessas joias da ficção da literatura mundial. Médico, Simão Bacamarte passa a se interessar pela psiquiatria, iniciando um estudo sobre a loucura em Itaguaí, onde funda a Casa Verde - um típico hospício oitocentista -, arregimentando cobaias humanas para seus experimentos. O que se segue é uma história surpreendente e atual em seu debate sobre desvios e normalidade, loucura e razão. Ensaio sobre a loucura e a lucidez, sátira política e comédia de costumes, esta edição de Machado de Assis conta com uma esclarecedora nota introdutória do crítico britânico John Gledson, um dos grandes intérpretes do autor brasileiro.','https://m.media-amazon.com/images/I/41ls0DpJwOL._SX331_BO1,204,203,200_.jpg','Disponivel',5,NULL,5,3,3);
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'Sferra','371c48c787e1f94c5d4bf8f9734e3d45');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_livro`
--

DROP TABLE IF EXISTS `pedido_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedido_livro` (
  `ID_PEDIDO` int NOT NULL AUTO_INCREMENT,
  `DATA_EMPRESTIMO` date NOT NULL,
  `DATA_DEVOLUCAO` date NOT NULL,
  `D_E_L_E_T_E` char(1) DEFAULT NULL,
  `LIVRO_ID` int NOT NULL,
  `CLIENTE_ID` int NOT NULL,
  PRIMARY KEY (`ID_PEDIDO`),
  KEY `fk_PEDIDO_LIVRO_LIVRO1_idx` (`LIVRO_ID`),
  KEY `fk_PEDIDO_LIVRO_CLIENTE1_idx` (`CLIENTE_ID`),
  CONSTRAINT `fk_PEDIDO_LIVRO_CLIENTE1` FOREIGN KEY (`CLIENTE_ID`) REFERENCES `cliente` (`ID`),
  CONSTRAINT `fk_PEDIDO_LIVRO_LIVRO1` FOREIGN KEY (`LIVRO_ID`) REFERENCES `livro` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_livro`
--

LOCK TABLES `pedido_livro` WRITE;
/*!40000 ALTER TABLE `pedido_livro` DISABLE KEYS */;
INSERT INTO `pedido_livro` VALUES (1,'2023-06-26','2023-07-01','*',1,2),(2,'2023-06-26','2023-07-01','*',1,2);
/*!40000 ALTER TABLE `pedido_livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'biblioteca'
--

--
-- Dumping routines for database 'biblioteca'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-26 17:37:27
