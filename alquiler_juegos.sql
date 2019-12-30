-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-12-2019 a las 23:55:10
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alquiler_juegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

DROP TABLE IF EXISTS `alquiler`;
CREATE TABLE IF NOT EXISTS `alquiler` (
  `Cod_juego` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `DNI_cliente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_alguiler` date NOT NULL,
  `Fecha_devol` date DEFAULT NULL,
  PRIMARY KEY (`Cod_juego`,`DNI_cliente`,`Fecha_alguiler`),
  KEY `DNI_cliente` (`DNI_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alquiler`
--

INSERT INTO `alquiler` (`Cod_juego`, `DNI_cliente`, `Fecha_alguiler`, `Fecha_devol`) VALUES
('pc-monster', '12121212A', '2019-12-11', '2019-12-13'),
('pc-monster', '12121212A', '2019-12-12', NULL),
('pc-monster', '12345678A', '2019-12-12', NULL),
('smb-nintendo', '12121212A', '2019-12-11', '2019-12-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `DNI` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Localidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Clave` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`DNI`, `Nombre`, `Apellidos`, `Direccion`, `Localidad`, `Clave`, `Tipo`) VALUES
('11111111A', 'Pepe', 'López', 'Ancha,21', 'Lucena', 'pepe', 'cliente'),
('12121212A', 'Administrador', 'Admin', 'Direc. Admin', 'Lucena', 'admin', 'admin'),
('12345678A', 'Francisco', 'Trillo López', 'Mi calle', 'Montilla', '123', 'cliente'),
('DNITest', 'NombreTest', 'ApellTest Apell2Test', 'DireccionTest', 'LocalidadTest', 'PruebaTest', 'cliente'),
('PruebaDNI', 'PruebaNombre', 'PruebaApellidos PruebaApell2', 'PruebaDireccion', 'PruebaLoca', '123', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

DROP TABLE IF EXISTS `juegos`;
CREATE TABLE IF NOT EXISTS `juegos` (
  `Codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_juego` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_consola` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Anno` year(4) NOT NULL,
  `Precio` int(11) NOT NULL,
  `Alquilado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`Codigo`, `Nombre_juego`, `Nombre_consola`, `Anno`, `Precio`, `Alquilado`, `Imagen`) VALUES
('pc-monster', 'Monster Hunter: World', 'PC', 2010, 8, 'SI', 'imagenes/monster.jpg'),
('smb-nintendo', 'Super Smash Bros. Ultimate', 'Nintendo', 2018, 10, 'NO', 'imagenes/smb-nintendo.jpg');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `alquiler_ibfk_1` FOREIGN KEY (`DNI_cliente`) REFERENCES `cliente` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alquiler_ibfk_2` FOREIGN KEY (`Cod_juego`) REFERENCES `juegos` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
