-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2015 a las 05:24:26
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dbsiagro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spactividad`
--

CREATE TABLE IF NOT EXISTS `spactividad` (
`pkActividad` int(11) NOT NULL,
  `fkOrdenTrabajo` int(11) NOT NULL,
  `codigo` char(2) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spcargo`
--

CREATE TABLE IF NOT EXISTS `spcargo` (
`pkCargo` int(11) NOT NULL,
  `codigo` char(3) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `spcargo`
--

INSERT INTO `spcargo` (`pkCargo`, `codigo`, `descripcion`) VALUES
(1, '099', 'AUXILIAR DE SISTEMAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spdettransfequipo`
--

CREATE TABLE IF NOT EXISTS `spdettransfequipo` (
`pkDetTransfEquipo` int(11) NOT NULL,
  `fkTransfEquipo` int(11) NOT NULL DEFAULT '0',
  `item` int(11) NOT NULL DEFAULT '0',
  `fkEquipo` int(11) NOT NULL DEFAULT '0',
  `observacion` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spdettransfpersonal`
--

CREATE TABLE IF NOT EXISTS `spdettransfpersonal` (
`pkDetTransfPersonal` int(11) NOT NULL,
  `fkTransfPersonal` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `fkPersonal` int(11) NOT NULL,
  `observacion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `speqmodelo`
--

CREATE TABLE IF NOT EXISTS `speqmodelo` (
`pkEqModelo` int(11) NOT NULL,
  `fkEqTipo` int(11) NOT NULL DEFAULT '0',
  `codigo` char(2) DEFAULT '0',
  `descripcion` varchar(25) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `speqmodelo`
--

INSERT INTO `speqmodelo` (`pkEqModelo`, `fkEqTipo`, `codigo`, `descripcion`) VALUES
(1, 1, 'CA', 'CATERPILLAR D7G'),
(3, 3, 'TO', 'JDJDJDJD'),
(4, 1, 'K8', 'KATERPILLAR D8K');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `speqtipo`
--

CREATE TABLE IF NOT EXISTS `speqtipo` (
`pkEqTipo` int(11) NOT NULL,
  `codigo` char(2) NOT NULL,
  `descripcion` varchar(25) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `speqtipo`
--

INSERT INTO `speqtipo` (`pkEqTipo`, `codigo`, `descripcion`) VALUES
(1, 'TO', 'TRACTOR ORUGA'),
(3, 'TA', 'TRACTOR AGRICOLA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spequipo`
--

CREATE TABLE IF NOT EXISTS `spequipo` (
`pkEquipo` int(11) NOT NULL,
  `fkTipoEquipo` int(11) NOT NULL DEFAULT '0',
  `fkModelo` int(11) NOT NULL DEFAULT '0',
  `codigo` char(9) NOT NULL DEFAULT '0',
  `fkTipoContrato` enum('ALQUILADO','PROPIO') NOT NULL,
  `fechaIngreso` date NOT NULL DEFAULT '0000-00-00',
  `fkOrdenTrabajo` int(11) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spgestion`
--

CREATE TABLE IF NOT EXISTS `spgestion` (
`pkGestion` int(11) NOT NULL,
  `codigo` char(2) NOT NULL DEFAULT '0',
  `fechaIni` date NOT NULL DEFAULT '0000-00-00',
  `fechaFin` date NOT NULL DEFAULT '0000-00-00',
  `estado` enum('T','F') NOT NULL DEFAULT 'F'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `spgestion`
--

INSERT INTO `spgestion` (`pkGestion`, `codigo`, `fechaIni`, `fechaFin`, `estado`) VALUES
(1, '15', '2015-01-01', '2015-12-31', 'T'),
(2, '16', '2016-01-01', '2016-12-31', 'F'),
(3, '17', '2017-01-01', '2017-12-31', 'F'),
(4, '22', '2015-11-11', '2015-11-12', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spimproductiva`
--

CREATE TABLE IF NOT EXISTS `spimproductiva` (
`pkImproductiva` int(11) NOT NULL,
  `codigo` varchar(4) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `spimproductiva`
--

INSERT INTO `spimproductiva` (`pkImproductiva`, `codigo`, `descripcion`) VALUES
(1, '0001', 'IMPRODUCTIVA'),
(2, '0123', 'IMPRODUCTIVA NUMERO 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spitemobra`
--

CREATE TABLE IF NOT EXISTS `spitemobra` (
`pkItemObra` int(11) NOT NULL,
  `fkOrdenTrabajo` int(11) NOT NULL DEFAULT '0',
  `fkPoligono` int(11) NOT NULL DEFAULT '0',
  `fkActividad` int(11) NOT NULL DEFAULT '0',
  `codigo` char(6) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) DEFAULT '0',
  `areaTrab` decimal(10,2) DEFAULT '0.00',
  `rendimiento` decimal(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spordentrabajo`
--

CREATE TABLE IF NOT EXISTS `spordentrabajo` (
`pkOrdenTrabajo` int(11) NOT NULL,
  `codigo` varchar(3) NOT NULL,
  `fkGestion` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `supervisor` varchar(50) DEFAULT NULL,
  `areaEstimada` decimal(10,0) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL,
  `data` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sppersonal`
--

CREATE TABLE IF NOT EXISTS `sppersonal` (
`pkPersonal` int(11) NOT NULL,
  `fechaIngreso` date NOT NULL DEFAULT '0000-00-00',
  `nombreComp` varchar(50) NOT NULL DEFAULT '0',
  `apellidos` varchar(50) NOT NULL DEFAULT '0',
  `direccion` varchar(50) NOT NULL DEFAULT '0',
  `telefono` varchar(50) NOT NULL DEFAULT '0',
  `ci` varchar(25) NOT NULL DEFAULT '0',
  `fechaNac` date NOT NULL DEFAULT '0000-00-00',
  `fkcargo` int(11) NOT NULL DEFAULT '0',
  `fkOrdenTrabajo` int(11) NOT NULL DEFAULT '0',
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sppoligono`
--

CREATE TABLE IF NOT EXISTS `sppoligono` (
`pkPoligono` int(11) NOT NULL,
  `fkOrdenTrabajo` int(11) NOT NULL DEFAULT '0',
  `codigo` char(3) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sptransfequipo`
--

CREATE TABLE IF NOT EXISTS `sptransfequipo` (
`pkTransfEquipo` int(11) NOT NULL,
  `codigo` char(4) NOT NULL DEFAULT '0',
  `fkGestion` int(11) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `fkOrdenOrigen` int(11) NOT NULL DEFAULT '0',
  `fkOrdenDestino` int(11) NOT NULL DEFAULT '0',
  `observacion` varchar(50) NOT NULL DEFAULT '0',
  `data` varchar(7) NOT NULL DEFAULT '0',
  `estado` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sptransfpersonal`
--

CREATE TABLE IF NOT EXISTS `sptransfpersonal` (
`pkTransfPersonal` int(11) NOT NULL,
  `codigo` char(4) NOT NULL,
  `fkGestion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `fkOrdenOrigen` int(11) NOT NULL,
  `fkOrdenDestino` int(11) NOT NULL,
  `observacion` varchar(50) NOT NULL,
  `data` varchar(7) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `spactividad`
--
ALTER TABLE `spactividad`
 ADD PRIMARY KEY (`pkActividad`);

--
-- Indices de la tabla `spcargo`
--
ALTER TABLE `spcargo`
 ADD PRIMARY KEY (`pkCargo`);

--
-- Indices de la tabla `spdettransfequipo`
--
ALTER TABLE `spdettransfequipo`
 ADD PRIMARY KEY (`pkDetTransfEquipo`);

--
-- Indices de la tabla `spdettransfpersonal`
--
ALTER TABLE `spdettransfpersonal`
 ADD PRIMARY KEY (`pkDetTransfPersonal`);

--
-- Indices de la tabla `speqmodelo`
--
ALTER TABLE `speqmodelo`
 ADD PRIMARY KEY (`pkEqModelo`), ADD KEY `fkEqTipo` (`fkEqTipo`);

--
-- Indices de la tabla `speqtipo`
--
ALTER TABLE `speqtipo`
 ADD PRIMARY KEY (`pkEqTipo`), ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `spequipo`
--
ALTER TABLE `spequipo`
 ADD PRIMARY KEY (`pkEquipo`), ADD KEY `fkTipoEquipo` (`fkTipoEquipo`), ADD KEY `fkModelo` (`fkModelo`), ADD KEY `fkOrdenTrabajo` (`fkOrdenTrabajo`);

--
-- Indices de la tabla `spgestion`
--
ALTER TABLE `spgestion`
 ADD PRIMARY KEY (`pkGestion`), ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `spimproductiva`
--
ALTER TABLE `spimproductiva`
 ADD PRIMARY KEY (`pkImproductiva`), ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `spitemobra`
--
ALTER TABLE `spitemobra`
 ADD PRIMARY KEY (`pkItemObra`), ADD KEY `fkOrdenTrabajo` (`fkOrdenTrabajo`), ADD KEY `fkPoligono` (`fkPoligono`), ADD KEY `fkActividad` (`fkActividad`);

--
-- Indices de la tabla `spordentrabajo`
--
ALTER TABLE `spordentrabajo`
 ADD PRIMARY KEY (`pkOrdenTrabajo`), ADD KEY `fkGestion` (`fkGestion`);

--
-- Indices de la tabla `sppersonal`
--
ALTER TABLE `sppersonal`
 ADD PRIMARY KEY (`pkPersonal`), ADD KEY `fkcargo` (`fkcargo`), ADD KEY `fkOrdenTrabajo` (`fkOrdenTrabajo`);

--
-- Indices de la tabla `sppoligono`
--
ALTER TABLE `sppoligono`
 ADD PRIMARY KEY (`pkPoligono`), ADD KEY `fkOrdenTrabajo` (`fkOrdenTrabajo`);

--
-- Indices de la tabla `sptransfequipo`
--
ALTER TABLE `sptransfequipo`
 ADD PRIMARY KEY (`pkTransfEquipo`), ADD KEY `fkGestion` (`fkGestion`), ADD KEY `fkOrdenOrigen` (`fkOrdenOrigen`), ADD KEY `fkOrdenDestino` (`fkOrdenDestino`);

--
-- Indices de la tabla `sptransfpersonal`
--
ALTER TABLE `sptransfpersonal`
 ADD PRIMARY KEY (`pkTransfPersonal`), ADD KEY `fkGestion` (`fkGestion`), ADD KEY `fkOrdenOrigen` (`fkOrdenOrigen`), ADD KEY `fkOrdenDestino` (`fkOrdenDestino`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `spactividad`
--
ALTER TABLE `spactividad`
MODIFY `pkActividad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `spcargo`
--
ALTER TABLE `spcargo`
MODIFY `pkCargo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `spdettransfequipo`
--
ALTER TABLE `spdettransfequipo`
MODIFY `pkDetTransfEquipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `spdettransfpersonal`
--
ALTER TABLE `spdettransfpersonal`
MODIFY `pkDetTransfPersonal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `speqmodelo`
--
ALTER TABLE `speqmodelo`
MODIFY `pkEqModelo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `speqtipo`
--
ALTER TABLE `speqtipo`
MODIFY `pkEqTipo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `spequipo`
--
ALTER TABLE `spequipo`
MODIFY `pkEquipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `spgestion`
--
ALTER TABLE `spgestion`
MODIFY `pkGestion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `spimproductiva`
--
ALTER TABLE `spimproductiva`
MODIFY `pkImproductiva` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `spitemobra`
--
ALTER TABLE `spitemobra`
MODIFY `pkItemObra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `spordentrabajo`
--
ALTER TABLE `spordentrabajo`
MODIFY `pkOrdenTrabajo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sppersonal`
--
ALTER TABLE `sppersonal`
MODIFY `pkPersonal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sppoligono`
--
ALTER TABLE `sppoligono`
MODIFY `pkPoligono` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sptransfequipo`
--
ALTER TABLE `sptransfequipo`
MODIFY `pkTransfEquipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sptransfpersonal`
--
ALTER TABLE `sptransfpersonal`
MODIFY `pkTransfPersonal` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `speqmodelo`
--
ALTER TABLE `speqmodelo`
ADD CONSTRAINT `r_fkEqTipo` FOREIGN KEY (`fkEqTipo`) REFERENCES `speqtipo` (`pkEqTipo`);

--
-- Filtros para la tabla `spequipo`
--
ALTER TABLE `spequipo`
ADD CONSTRAINT `spequipo_ibfk_1` FOREIGN KEY (`fkTipoEquipo`) REFERENCES `speqtipo` (`pkEqTipo`),
ADD CONSTRAINT `spequipo_ibfk_2` FOREIGN KEY (`fkModelo`) REFERENCES `speqmodelo` (`pkEqModelo`),
ADD CONSTRAINT `spequipo_ibfk_3` FOREIGN KEY (`fkOrdenTrabajo`) REFERENCES `spordentrabajo` (`pkOrdenTrabajo`);

--
-- Filtros para la tabla `spitemobra`
--
ALTER TABLE `spitemobra`
ADD CONSTRAINT `spitemobra_ibfk_1` FOREIGN KEY (`fkOrdenTrabajo`) REFERENCES `spordentrabajo` (`pkOrdenTrabajo`),
ADD CONSTRAINT `spitemobra_ibfk_2` FOREIGN KEY (`fkPoligono`) REFERENCES `sppoligono` (`pkPoligono`),
ADD CONSTRAINT `spitemobra_ibfk_3` FOREIGN KEY (`fkActividad`) REFERENCES `spactividad` (`pkActividad`);

--
-- Filtros para la tabla `spordentrabajo`
--
ALTER TABLE `spordentrabajo`
ADD CONSTRAINT `spordentrabajo_ibfk_1` FOREIGN KEY (`fkGestion`) REFERENCES `spordentrabajo` (`pkOrdenTrabajo`);

--
-- Filtros para la tabla `sppersonal`
--
ALTER TABLE `sppersonal`
ADD CONSTRAINT `sppersonal_ibfk_1` FOREIGN KEY (`fkcargo`) REFERENCES `spcargo` (`pkCargo`),
ADD CONSTRAINT `sppersonal_ibfk_2` FOREIGN KEY (`fkOrdenTrabajo`) REFERENCES `spordentrabajo` (`pkOrdenTrabajo`);

--
-- Filtros para la tabla `sppoligono`
--
ALTER TABLE `sppoligono`
ADD CONSTRAINT `sppoligono_ibfk_1` FOREIGN KEY (`fkOrdenTrabajo`) REFERENCES `spordentrabajo` (`pkOrdenTrabajo`);

--
-- Filtros para la tabla `sptransfequipo`
--
ALTER TABLE `sptransfequipo`
ADD CONSTRAINT `fkOrdenDestinoOt` FOREIGN KEY (`fkOrdenDestino`) REFERENCES `spordentrabajo` (`pkOrdenTrabajo`),
ADD CONSTRAINT `fkOrdenOrigenOt` FOREIGN KEY (`fkOrdenOrigen`) REFERENCES `spordentrabajo` (`pkOrdenTrabajo`),
ADD CONSTRAINT `fkgestion` FOREIGN KEY (`fkGestion`) REFERENCES `spgestion` (`pkGestion`);

--
-- Filtros para la tabla `sptransfpersonal`
--
ALTER TABLE `sptransfpersonal`
ADD CONSTRAINT `sptransfpersonal_ibfk_1` FOREIGN KEY (`fkGestion`) REFERENCES `spgestion` (`pkGestion`),
ADD CONSTRAINT `sptransfpersonal_ibfk_2` FOREIGN KEY (`fkOrdenOrigen`) REFERENCES `spordentrabajo` (`pkOrdenTrabajo`),
ADD CONSTRAINT `sptransfpersonal_ibfk_3` FOREIGN KEY (`fkOrdenDestino`) REFERENCES `spordentrabajo` (`pkOrdenTrabajo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
