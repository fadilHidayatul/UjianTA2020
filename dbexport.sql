-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: db_ujian
-- ------------------------------------------------------
-- Server version	8.0.21-0ubuntu0.20.04.4

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
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(30) NOT NULL,
  `token` text NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin`
--

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (1,'fadil','fadil123','');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_jawab`
--

DROP TABLE IF EXISTS `tb_jawab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_jawab` (
  `id_jawab` int NOT NULL AUTO_INCREMENT,
  `id_soal` int NOT NULL,
  `jawab` tinyint(1) NOT NULL,
  `txt_jawab` varchar(256) NOT NULL,
  PRIMARY KEY (`id_jawab`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jawab`
--

LOCK TABLES `tb_jawab` WRITE;
/*!40000 ALTER TABLE `tb_jawab` DISABLE KEYS */;
INSERT INTO `tb_jawab` VALUES (1,10,1,'jawab1'),(2,10,0,'jawab2'),(3,9,1,'jawab a'),(4,9,0,'jawab b');
/*!40000 ALTER TABLE `tb_jawab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_matpel`
--

DROP TABLE IF EXISTS `tb_matpel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_matpel` (
  `id_matpel` int NOT NULL AUTO_INCREMENT,
  `matpel` varchar(50) NOT NULL,
  `waktu_ujian` int NOT NULL,
  PRIMARY KEY (`id_matpel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_matpel`
--

LOCK TABLES `tb_matpel` WRITE;
/*!40000 ALTER TABLE `tb_matpel` DISABLE KEYS */;
INSERT INTO `tb_matpel` VALUES (1,'bahasa indonesia',90),(2,'bahasa inggris',60),(3,'matematika',75),(4,'ipa',60);
/*!40000 ALTER TABLE `tb_matpel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nilai`
--

DROP TABLE IF EXISTS `tb_nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_nilai` (
  `id_nilai` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_matpel` int NOT NULL,
  `nilai` int NOT NULL,
  PRIMARY KEY (`id_nilai`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nilai`
--

LOCK TABLES `tb_nilai` WRITE;
/*!40000 ALTER TABLE `tb_nilai` DISABLE KEYS */;
INSERT INTO `tb_nilai` VALUES (1,32,1,15),(3,29,4,15),(4,32,2,15),(5,32,3,20),(6,32,4,10),(7,26,2,5);
/*!40000 ALTER TABLE `tb_nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_nis`
--

DROP TABLE IF EXISTS `tb_nis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_nis` (
  `id_nis` int NOT NULL AUTO_INCREMENT,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  PRIMARY KEY (`id_nis`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_nis`
--

LOCK TABLES `tb_nis` WRITE;
/*!40000 ALTER TABLE `tb_nis` DISABLE KEYS */;
INSERT INTO `tb_nis` VALUES (1,'2018','Hidayatul'),(2,'1025',''),(5,'2020','sayatul'),(6,'2027','Dilo Pufa Hio'),(7,'2015','Riguntal'),(8,'9999','unstoppable'),(18,'666','Soleh'),(19,'9999','hidayatul');
/*!40000 ALTER TABLE `tb_nis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_soal`
--

DROP TABLE IF EXISTS `tb_soal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_soal` (
  `id_soal` int NOT NULL AUTO_INCREMENT,
  `image_soal` varchar(100) DEFAULT NULL,
  `id_matpel` int NOT NULL,
  `txt_soal` varchar(256) NOT NULL,
  `jawab_a` varchar(50) NOT NULL,
  `jawab_b` varchar(50) NOT NULL,
  `jawab_c` varchar(50) NOT NULL,
  `jawab_d` varchar(50) NOT NULL,
  `kunci` varchar(50) NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_soal`
--

LOCK TABLES `tb_soal` WRITE;
/*!40000 ALTER TABLE `tb_soal` DISABLE KEYS */;
INSERT INTO `tb_soal` VALUES (7,'/ujianTA/soal/img/b.ing/obj_ipa.png',2,'what is that?','atom','molecule','fluid','stone','atom'),(9,NULL,4,'Tumbuhan bernafas dengan?','paru paru','insang','fotosintesis','kulit','fotosintesis'),(10,'/ujianTA/soal/img/b.ing/4bf9205efe5e302c08fd0d251c97b518.jpg',4,'soal dari neraka','a','c','d','a','a'),(12,'/ujianTA/soal/img/matematika/home-outline.png',3,'lai pandai ang','lai','kurang pandai','pandai bana','tanyo amak lu','lai'),(13,NULL,3,'3 + 1','2','4','6','10','4'),(14,NULL,2,'what are you doing?','i\'m fine','i\'m here with you','i have some work in garage','ok let go','i have some work in garage'),(15,NULL,4,'fotosintesis adalah...','pernafasan','perapian','pengembangan','studi kasus','pernafasan'),(17,'/ujianTA/soal/img/b.indo/obj_bing.png',1,'apa nama benda diatas dalam bahasa indonesia?','globe','bola dunia','map','peta','bola dunia'),(18,'/ujianTA/soal/img/matematika/compass.jpg',3,'berapa nomor sepatu diatas','30','34','42','40','40'),(19,'/ujianTA/soal/img/b.ing/cellphone-android.png',2,'what is that thing?','phone','cell','shoes','sword','phone'),(20,'/ujianTA/soal/img/b.indo/obj_mm.png',1,'apa ini?','penggaris','roller','pena','pensil','penggaris'),(21,NULL,1,'Jika juara akan mendapatkan?','penggaris','sertifikat tanah','hadiah','minyak goreng','hadiah'),(22,'/ujianTA/soal/img/matematika/home-outline.png',3,'Berapa hektar luas rumah diatas?','3cm','100 Ha','Seluas langit dan bumi','Tidak ada penggaris','3cm'),(23,NULL,2,'Where is your house?','I live in bandung','I dont have any pencil','Alright, let\'s go then','I love you','I live in bandung'),(25,NULL,3,'apa saja yang tidak dibutuhkan untuk mengukur luas lingkaran?','phi','r','d','luas','luas'),(28,'/ujianTA/soal/img/ipa/2c458366f207704e59808b6e7f25cf0e.jpg',4,'Bagaimana mereka bertahan hidup?','Memakan tumbuhan','Memakan sesamanya','Memakan manusia','Beradaptasi di dalam es','Memakan manusia'),(29,'/ujianTA/soal/img/b.indo/Screenshot from 2020-07-14 04-05-45.png',1,'apa ini?','apa','ini','haa','xxx','xxx'),(30,'/soal/img/ipa/3161534-dark-anarchy-wallpapers.jpg',4,'','fotosintesis','perkembangbiakan','perkawinan','tumbuh',''),(31,NULL,4,'apa ini xxxx','apa ahah','ini','ngnene','xxx','xxx'),(32,'/soal/img/ipa/Screenshot from 2020-07-18 17-52-13.png',4,'apa ini xxxx','apa ahah','ini','ngnene','xxx','xxx'),(33,'/soal/img/ipa/3161534-dark-anarchy-wallpapers.jpg',4,'halah','apa ahah','ini','ngnene','xxx','xxx'),(34,'/soal/img/ipa/3161534-dark-anarchy-wallpapers.jpg',4,'halahdjdjdjd','apa ahah','ini','ngnene','xxx','xxx'),(35,'/soal/img/ipa/3161534-dark-anarchy-wallpapers.jpg',4,'halahdjdjdjd','apa ahah','ini','ngnene','xxx','xxx'),(36,'/soal/img/b.ing/Screenshot from 2020-09-07 02-06-26.png',2,'Ini soal','Ini a','Ini b','ini c','ini d','ini c'),(37,'/soal/img/b.indo/carbon.png',1,'Soal baru','a','b','c','d','c');
/*!40000 ALTER TABLE `tb_soal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (1,'fadil','fadil@gmail.com','123456789',''),(22,'fad','fad@gmail.com','$2y$10$NPikf/cG0GRJ1',''),(26,'fadil','2018','$2y$10$2qq4fKE5ItdK6CBRARZQuuspZdSAL6UiZzzosfjW8goqGs/BulCES','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE1OTgyMTMxODMsImV4cCI6MTU5ODIxMzI0MywiZGF0YSI6eyJ1c2VyX2lkIjoiMjYifX0.it0L5MjhFQqf5N-j42bmaTrjtgOmEAjLDfRZDjPHQGM'),(27,'nova','1025','$2y$10$cM2MCzReFb52zESp7hLhl.0sibRcL50jquqy6jj1.MBugmA3SRtCK','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE1OTc4NTM4MzAsImV4cCI6MTU5Nzg1Mzg5MCwiZGF0YSI6eyJ1c2VyX2lkIjoiMjcifX0.7jg9LcrDSpgeo5AQN0EIRaIEfYdNVjD8Hy2EAMfrIBk'),(28,'Dilo','2027','$2y$10$Em0XQuSiXD.AuJAsH5jHHut64Y7vq9mXdSXE//r22u2oykKSfoAku','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE1OTc4NTM4MDcsImV4cCI6MTU5Nzg1Mzg2NywiZGF0YSI6eyJ1c2VyX2lkIjoiMjgifX0.GOlfXqo1R0HKIxqEAEbD1ktvZSh2mf5VKdxcUctPZCk'),(29,'Mantan','2015','$2y$10$rSU/slU2j2n4uJsTDGjv8Omr9AQ.fSqmeJhO7ez9LA3mdhLA7TCLW','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE1OTc4NTYyMzMsImV4cCI6MTU5Nzg1NjI5MywiZGF0YSI6eyJ1c2VyX2lkIjoiMjkifX0.YPIuY3oGMigB-HeotuuwZD1_A3XfGRjjlIv-2Dpm_I0'),(32,'spongebob','9999','$2y$10$5t0pUiEkp1M5/LV1jCrx2e63ovXSrq/KxOE2XbrFqndiBK/lUmnKC','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJhdWQiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2RiX3VqaWFuXC8iLCJpYXQiOjE1OTg3MTg3MzEsImV4cCI6MTU5ODcxODc5MSwiZGF0YSI6eyJ1c2VyX2lkIjoiMzIifX0.4kprZQoHCcKlmOSUC-K-6JimE6ocKzFOpKyMUrFDvw8');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-08 21:05:08
