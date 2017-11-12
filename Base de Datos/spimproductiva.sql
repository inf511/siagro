-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2015 a las 19:15:50
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dbsispro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spimproductiva`
--

CREATE TABLE IF NOT EXISTS `spimproductiva` (
`pkImproductiva` int(11) NOT NULL,
  `codigo` varchar(4) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(25) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='tabla de actividades improductivas';

--
-- Volcado de datos para la tabla `spimproductiva`
--

INSERT INTO `spimproductiva` (`pkImproductiva`, `codigo`, `descripcion`) VALUES
(1, '2004', 'SIN AREA DE TRABAJO'),
(2, '1003', 'TERRENO INOPERABLE'),
(3, '1005', 'DESPERFECTO MECANICO'),
(5, '1006', 'SIN OPERADOR DE ORUGA1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `spimproductiva`
--
ALTER TABLE `spimproductiva`
 ADD PRIMARY KEY (`pkImproductiva`), ADD UNIQUE KEY `codigo` (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `spimproductiva`
--
ALTER TABLE `spimproductiva`
MODIFY `pkImproductiva` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
