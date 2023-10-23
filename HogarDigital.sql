-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.28-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para hogardigital
CREATE DATABASE IF NOT EXISTS `hogardigital` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `hogardigital`;

-- Volcando estructura para tabla hogardigital.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Contraseña` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla hogardigital.admin: ~0 rows (aproximadamente)

-- Volcando estructura para tabla hogardigital.caseta
CREATE TABLE IF NOT EXISTS `caseta` (
  `IDGuardia` char(5) NOT NULL,
  `Nombre_C` varchar(45) NOT NULL,
  `Apellido_C` varchar(45) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Contraseña` varchar(45) NOT NULL,
  PRIMARY KEY (`IDGuardia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla hogardigital.caseta: ~0 rows (aproximadamente)

-- Volcando estructura para tabla hogardigital.contactos
CREATE TABLE IF NOT EXISTS `contactos` (
  `PIN` char(4) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Foto` blob NOT NULL,
  KEY `PINES_idx` (`PIN`),
  CONSTRAINT `PINES` FOREIGN KEY (`PIN`) REFERENCES `pines` (`PIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla hogardigital.contactos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla hogardigital.pines
CREATE TABLE IF NOT EXISTS `pines` (
  `PIN` char(4) NOT NULL,
  `Num.Casa` char(4) NOT NULL,
  `Duracion` datetime NOT NULL,
  PRIMARY KEY (`PIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla hogardigital.pines: ~0 rows (aproximadamente)

-- Volcando estructura para tabla hogardigital.registros
CREATE TABLE IF NOT EXISTS `registros` (
  `Tipo_T` int(11) NOT NULL,
  `Cantidad_P` int(11) NOT NULL,
  `Nombre_Contacto` varchar(45) NOT NULL,
  `Acceso` varchar(45) NOT NULL,
  `PIN` char(4) NOT NULL,
  `Hora_Entrada` time DEFAULT NULL,
  `Hora_Salida` time DEFAULT NULL,
  PRIMARY KEY (`Tipo_T`),
  KEY `PINES_idx` (`PIN`),
  CONSTRAINT `Pin` FOREIGN KEY (`PIN`) REFERENCES `pines` (`PIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla hogardigital.registros: ~0 rows (aproximadamente)

-- Volcando estructura para tabla hogardigital.residente
CREATE TABLE IF NOT EXISTS `residente` (
  `Num.Casa` char(1) NOT NULL,
  `Nombre_R` varchar(45) NOT NULL,
  `Apellido_R` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Contraseña` varchar(45) NOT NULL,
  PRIMARY KEY (`Num.Casa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla hogardigital.residente: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
