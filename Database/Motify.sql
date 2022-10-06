-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           10.3.9-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win32
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour motify
DROP DATABASE IF EXISTS `motify`;
CREATE DATABASE IF NOT EXISTS `motify` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `motify`;

-- Listage de la structure de la table motify. lego
CREATE TABLE IF NOT EXISTS `lego` (
  `lego_id` char(10) NOT NULL,
  `lego_complet` char(3) NOT NULL DEFAULT 'non',
  `lego_figurine` char(3) NOT NULL DEFAULT 'non',
  `lego_boite` char(3) NOT NULL DEFAULT 'non',
  `lego_notice` char(3) NOT NULL DEFAULT 'non',
  PRIMARY KEY (`lego_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage de la structure de la table motify. users
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Role` varchar(20) NOT NULL DEFAULT 'USER',
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Listage des données de la table motify.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`Id`, `Username`, `Password`, `Role`) VALUES
	(3, 'admin', '$2y$10$dWfCUktsm06RvB0uajVBneuoxN1v2XNuVpyrOhNGRklNDP0pikC.y', 'ADMIN'),
	(4, 'demo', '$2y$10$BJxLD0AGsf8be5ZkOAj.WOxDoeRcyf9jmEDEa9faX5pnTmJ3O6PQG', 'USER');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
