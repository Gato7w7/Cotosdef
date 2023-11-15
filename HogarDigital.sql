-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.27-MariaDB - mariadb.org binary distribution
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
INSERT INTO `admin` (`ID`, `Usuario`, `Nombre`, `Contraseña`) VALUES
	(450, 'Fer', 'Fercho', '123');

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
INSERT INTO `caseta` (`IDGuardia`, `Nombre_C`, `Apellido_C`, `Usuario`, `Contraseña`) VALUES
	('50', 'Pepe', 'Lopez.', 'pepo', '123');

-- Volcando estructura para tabla hogardigital.contactos
CREATE TABLE IF NOT EXISTS `contactos` (
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Residente_ID` char(4) DEFAULT NULL,
  KEY `Resiedente_ID` (`Residente_ID`),
  CONSTRAINT `NumCasa` FOREIGN KEY (`Residente_ID`) REFERENCES `residente` (`NumCasa`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla hogardigital.contactos: ~5 rows (aproximadamente)
INSERT INTO `contactos` (`Nombre`, `Apellido`, `Telefono`, `Residente_ID`) VALUES
	('Andy', 'Salas', '4491238754', '1'),
	('ko', 'lolol', '4496587989', '2'),
	('Pamela', 'lope', '499999999', '3'),
	('Martin', 'Salas', '449789787', '4'),
	('Pepe', 'Si', '4497896985', '4');

-- Volcando estructura para tabla hogardigital.pines
CREATE TABLE IF NOT EXISTS `pines` (
  `PIN` char(4) NOT NULL,
  `NumCasa` char(4) NOT NULL,
  `Duracion` datetime NOT NULL,
  `ID_PIN` int(4) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_PIN`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla hogardigital.pines: ~4 rows (aproximadamente)
INSERT INTO `pines` (`PIN`, `NumCasa`, `Duracion`, `ID_PIN`) VALUES
	('2202', '1', '0000-00-00 00:00:00', 1),
	('4448', '3', '2023-10-19 10:17:02', 2),
	('5555', '2', '2023-10-18 10:10:09', 3),
	('5656', '4', '2023-10-19 13:56:33', 4);

-- Volcando estructura para tabla hogardigital.registros
CREATE TABLE IF NOT EXISTS `registros` (
  `Tipo_T` varchar(50) NOT NULL DEFAULT '',
  `Cantidad_P` int(11) NOT NULL,
  `Nombre_Contacto` varchar(45) NOT NULL,
  `Acceso` varchar(45) NOT NULL,
  `Hora_Entrada` time DEFAULT NULL,
  `Hora_Salida` time DEFAULT NULL,
  `Foto` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla hogardigital.registros: ~2 rows (aproximadamente)
INSERT INTO `registros` (`Tipo_T`, `Cantidad_P`, `Nombre_Contacto`, `Acceso`, `Hora_Entrada`, `Hora_Salida`, `Foto`) VALUES
	('Pie', 2, 'Martin', '', '18:06:40', '18:06:42', NULL),
	('Auto', 6, 'Pepe', '', '19:14:15', '19:14:16', NULL),
	('Auto', 3, 'Bryan', '', '11:17:24', '11:17:26', NULL);

-- Volcando estructura para tabla hogardigital.residente
CREATE TABLE IF NOT EXISTS `residente` (
  `NumCasa` char(4) NOT NULL,
  `Nombre_R` varchar(45) NOT NULL,
  `Apellido_R` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Contraseña` varchar(45) NOT NULL,
  PRIMARY KEY (`NumCasa`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla hogardigital.residente: ~5 rows (aproximadamente)
INSERT INTO `residente` (`NumCasa`, `Nombre_R`, `Apellido_R`, `Telefono`, `Usuario`, `Contraseña`) VALUES
	('1', 'Koke', 'Villa', '4491871833', 'Koke', '123'),
	('2', 'Jose', 'Lope', '4497851265', 'jo', '124'),
	('3', 'Roman', 'Alba', '4495657896', 'Roman', '456'),
	('4', 'Johany', 'Carrillo', '4491969363', 'joha', '123'),
	('5', 'Amy', 'Peralta', '4497851254', 'Chi', '123');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
