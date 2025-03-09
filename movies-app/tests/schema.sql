create database dbcakecms DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
USE dbcakecms;
CREATE TABLE `movies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `slug` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `genre` varchar(45) DEFAULT NULL,
  `release_year` int DEFAULT NULL,
  `synopsis` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1;