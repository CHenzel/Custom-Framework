# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Hôte: 127.0.0.1 (MySQL 5.1.72)
# Base de données: custom_framework
# Temps de génération: 2014-12-14 14:06:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table livre
# ------------------------------------------------------------

DROP TABLE IF EXISTS `livre`;

CREATE TABLE `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_maj` datetime DEFAULT NULL,
  `date_parution` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `livre` WRITE;
/*!40000 ALTER TABLE `livre` DISABLE KEYS */;

INSERT INTO `livre` (`id`, `nom`, `genre`, `prix`, `date_creation`, `date_maj`, `date_parution`)
VALUES
	(2,'Lord of the ring 3','Fantastique',10,'2014-12-06 21:06:56','2014-12-09 13:40:03','1945-01-21'),
	(4,'Le parfum histoire d\'un meurtrier deux','Autobiographie',8,'2014-12-06 22:44:21','2014-12-07 13:44:50','1938-12-25'),
	(5,'Harry potter','Fantastique',15,'2014-12-07 01:33:24','2014-12-07 13:44:34','2004-06-22'),
	(6,'Les comptes des frères grims','Fantastique',25,'2014-12-07 01:39:18','2014-12-07 13:44:28','1958-12-28'),
	(8,'Cendrillion','Fantastique',9,'2014-12-07 14:19:21','2014-12-07 14:19:21','2014-12-07'),
	(9,'A l\'ouest rien de nouveau','Autobiographie',2,'2014-12-07 14:20:05','2014-12-07 14:20:05','1932-12-16'),
	(10,'dqd','Roman',58,'2014-12-08 23:08:45','2014-12-08 23:08:45','2014-12-29');

/*!40000 ALTER TABLE `livre` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table propel_migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `propel_migration`;

CREATE TABLE `propel_migration` (
  `version` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `propel_migration` WRITE;
/*!40000 ALTER TABLE `propel_migration` DISABLE KEYS */;

INSERT INTO `propel_migration` (`version`)
VALUES
	(1417790813),
	(1417794677),
	(1417895939),
	(1417902177),
	(1418063708);

/*!40000 ALTER TABLE `propel_migration` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table user_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_admin`;

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_maj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user_admin` WRITE;
/*!40000 ALTER TABLE `user_admin` DISABLE KEYS */;

INSERT INTO `user_admin` (`id`, `uid`, `username`, `password`, `salt`, `nom`, `prenom`, `ville`, `statut`, `date_creation`, `date_maj`)
VALUES
	(1,'','test@test.com','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3','a94a8fe5ccb19ba61c4c0873d391e987982fbbd3',NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `user_admin` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
