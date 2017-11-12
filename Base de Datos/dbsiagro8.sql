-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2016 a las 15:34:36
-- Versión del servidor: 5.7.12-log
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsiagro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spactividad`
--

CREATE TABLE `spactividad` (
  `pkActividad` int(11) NOT NULL,
  `fkOrdenTrabajo` int(11) NOT NULL,
  `codigo` char(2) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `spactividad`
--

INSERT INTO `spactividad` (`pkActividad`, `fkOrdenTrabajo`, `codigo`, `descripcion`) VALUES
(1, 1, '99', 'actividad 1'),
(5, 2, 'OK', 'KOKOKO'),
(6, 1, '1T', 'ttttt'),
(10, 1, '11', 'jjjjjjjjjjjjjjjj'),
(11, 3, '01', 'ALIVIANADO'),
(12, 3, '02', 'CADENEO'),
(13, 3, '03', 'BASUREO'),
(14, 1, '96', 'UUUU');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spcargo`
--

CREATE TABLE `spcargo` (
  `pkCargo` int(11) NOT NULL,
  `codigo` char(3) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `spcargo`
--

INSERT INTO `spcargo` (`pkCargo`, `codigo`, `descripcion`) VALUES
(1, '099', 'AUXILIAR DE SISTEMAS'),
(2, '001', 'ADMINISTRADOR DE EMPRESA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spdettransfequipo`
--

CREATE TABLE `spdettransfequipo` (
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

CREATE TABLE `spdettransfpersonal` (
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

CREATE TABLE `speqmodelo` (
  `pkEqModelo` int(11) NOT NULL,
  `fkEqTipo` int(11) NOT NULL DEFAULT '0',
  `codigo` char(2) DEFAULT '0',
  `descripcion` varchar(25) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `speqtipo` (
  `pkEqTipo` int(11) NOT NULL,
  `codigo` char(2) NOT NULL,
  `descripcion` varchar(25) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `speqtipo`
--

INSERT INTO `speqtipo` (`pkEqTipo`, `codigo`, `descripcion`) VALUES
(1, 'TO', 'TRACTOR ORUGA'),
(3, 'TA', 'TRACTOR AGRICOLA'),
(4, 'CA', 'CAMIONETAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spequipo`
--

CREATE TABLE `spequipo` (
  `pkEquipo` int(11) NOT NULL,
  `fkTipoEquipo` int(11) NOT NULL DEFAULT '0',
  `fkModelo` int(11) NOT NULL DEFAULT '0',
  `codigo` char(9) NOT NULL DEFAULT '0',
  `fkTipoContrato` enum('ALQUILADO','PROPIO') NOT NULL,
  `fechaIngreso` date NOT NULL DEFAULT '0000-00-00',
  `fkOrdenTrabajo` int(11) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `spequipo`
--

INSERT INTO `spequipo` (`pkEquipo`, `fkTipoEquipo`, `fkModelo`, `codigo`, `fkTipoContrato`, `fechaIngreso`, `fkOrdenTrabajo`, `descripcion`) VALUES
(1, 1, 4, 'TO-K8-001', 'ALQUILADO', '2015-12-18', 2, 'TRACTOR ORUGA D8k MONSEÑOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spgestion`
--

CREATE TABLE `spgestion` (
  `pkGestion` int(11) NOT NULL,
  `codigo` char(2) NOT NULL DEFAULT '0',
  `fechaIni` date NOT NULL DEFAULT '0000-00-00',
  `fechaFin` date NOT NULL DEFAULT '0000-00-00',
  `estado` enum('T','F') NOT NULL DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `spgestion`
--

INSERT INTO `spgestion` (`pkGestion`, `codigo`, `fechaIni`, `fechaFin`, `estado`) VALUES
(1, '15', '2015-01-01', '2015-12-31', 'T'),
(2, '16', '2016-01-01', '2016-12-31', 'F'),
(3, '17', '2017-01-01', '2017-12-31', 'F'),
(5, '18', '2018-01-01', '2018-12-31', 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spimproductiva`
--

CREATE TABLE `spimproductiva` (
  `pkImproductiva` int(11) NOT NULL,
  `codigo` varchar(4) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `spimproductiva`
--

INSERT INTO `spimproductiva` (`pkImproductiva`, `codigo`, `descripcion`) VALUES
(1, '0001', 'IMPRODUCTIVA'),
(2, '0123', 'IMPRODUCTIVA NUMERO 2'),
(3, '0012', 'FUNCIONAMIENTO MECANICOS'),
(4, 'YYYY', 'QQQQQ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spitemobra`
--

CREATE TABLE `spitemobra` (
  `pkItemObra` int(11) NOT NULL,
  `fkOrdenTrabajo` int(11) NOT NULL DEFAULT '0',
  `fkPoligono` int(11) NOT NULL DEFAULT '0',
  `fkActividad` int(11) NOT NULL DEFAULT '0',
  `codigo` char(6) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) DEFAULT '0',
  `areaTrab` decimal(10,2) DEFAULT '0.00',
  `rendimiento` decimal(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `spitemobra`
--

INSERT INTO `spitemobra` (`pkItemObra`, `fkOrdenTrabajo`, `fkPoligono`, `fkActividad`, `codigo`, `descripcion`, `areaTrab`, `rendimiento`) VALUES
(2, 1, 2, 11, 'B02-01', 'ALIVIANADO - POLIGONO BO2', '7.00', '0.90'),
(3, 1, 1, 5, 'B01-OK', 'CADENEO - POLIGONO BO4', '200.00', '1.00'),
(4, 1, 1, 11, 'B01-01', 'undd', '12.00', '12.00'),
(8, 1, 2, 1, '001-11', 'sss', '11.00', '1.00'),
(9, 1, 2, 12, 'B02-02', 'CADENEO DE BO2', '100.00', '0.33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `spordentrabajo`
--

CREATE TABLE `spordentrabajo` (
  `pkOrdenTrabajo` int(11) NOT NULL,
  `codigo` varchar(3) NOT NULL,
  `fkGestion` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `supervisor` varchar(50) DEFAULT NULL,
  `areaEstimada` decimal(10,0) NOT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL,
  `data` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `spordentrabajo`
--

INSERT INTO `spordentrabajo` (`pkOrdenTrabajo`, `codigo`, `fkGestion`, `nombre`, `supervisor`, `areaEstimada`, `estado`, `data`) VALUES
(1, '001', 1, 'san ignacio', 'vicente v', '999', 'ACTIVO', '001-15'),
(2, '002', 1, 'jdjdjdj', 'jdjdj', '66', 'ACTIVO', '002-15'),
(3, '003', 1, 'limehrh', 'nndhjf', '11', 'INACTIVO', '003-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sppersonal`
--

CREATE TABLE `sppersonal` (
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

--
-- Volcado de datos para la tabla `sppersonal`
--

INSERT INTO `sppersonal` (`pkPersonal`, `fechaIngreso`, `nombreComp`, `apellidos`, `direccion`, `telefono`, `ci`, `fechaNac`, `fkcargo`, `fkOrdenTrabajo`, `email`) VALUES
(1, '2015-12-01', 'ALEX LIMBERT', 'YALUSQUI GODOY', 'CALLE YAPACANI # 23', '76079622', '6252870-SCZ', '2015-10-13', 1, 1, 'limbertx@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sppoligono`
--

CREATE TABLE `sppoligono` (
  `pkPoligono` int(11) NOT NULL,
  `fkOrdenTrabajo` int(11) NOT NULL DEFAULT '0',
  `codigo` char(3) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sppoligono`
--

INSERT INTO `sppoligono` (`pkPoligono`, `fkOrdenTrabajo`, `codigo`, `descripcion`) VALUES
(1, 1, 'B01', 'POLIGONO - B01'),
(2, 1, 'B02', 'POLIGONO - B02'),
(3, 1, 'B04', 'POLIGONO - B04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sptransfequipo`
--

CREATE TABLE `sptransfequipo` (
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

CREATE TABLE `sptransfpersonal` (
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
  ADD PRIMARY KEY (`pkActividad`),
  ADD KEY `fkOrdenTrabajo` (`fkOrdenTrabajo`);

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
  ADD PRIMARY KEY (`pkEqModelo`),
  ADD KEY `fkEqTipo` (`fkEqTipo`);

--
-- Indices de la tabla `speqtipo`
--
ALTER TABLE `speqtipo`
  ADD PRIMARY KEY (`pkEqTipo`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `spequipo`
--
ALTER TABLE `spequipo`
  ADD PRIMARY KEY (`pkEquipo`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `fkTipoEquipo` (`fkTipoEquipo`),
  ADD KEY `fkModelo` (`fkModelo`),
  ADD KEY `fkOrdenTrabajo` (`fkOrdenTrabajo`);

--
-- Indices de la tabla `spgestion`
--
ALTER TABLE `spgestion`
  ADD PRIMARY KEY (`pkGestion`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `spimproductiva`
--
ALTER TABLE `spimproductiva`
  ADD PRIMARY KEY (`pkImproductiva`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `spitemobra`
--
ALTER TABLE `spitemobra`
  ADD PRIMARY KEY (`pkItemObra`),
  ADD KEY `fkOrdenTrabajo` (`fkOrdenTrabajo`),
  ADD KEY `fkPoligono` (`fkPoligono`),
  ADD KEY `fkActividad` (`fkActividad`);

--
-- Indices de la tabla `spordentrabajo`
--
ALTER TABLE `spordentrabajo`
  ADD PRIMARY KEY (`pkOrdenTrabajo`),
  ADD KEY `fkGestion` (`fkGestion`);

--
-- Indices de la tabla `sppersonal`
--
ALTER TABLE `sppersonal`
  ADD PRIMARY KEY (`pkPersonal`),
  ADD KEY `fkcargo` (`fkcargo`),
  ADD KEY `fkOrdenTrabajo` (`fkOrdenTrabajo`);

--
-- Indices de la tabla `sppoligono`
--
ALTER TABLE `sppoligono`
  ADD PRIMARY KEY (`pkPoligono`),
  ADD KEY `fkOrdenTrabajo` (`fkOrdenTrabajo`);

--
-- Indices de la tabla `sptransfequipo`
--
ALTER TABLE `sptransfequipo`
  ADD PRIMARY KEY (`pkTransfEquipo`),
  ADD KEY `fkGestion` (`fkGestion`),
  ADD KEY `fkOrdenOrigen` (`fkOrdenOrigen`),
  ADD KEY `fkOrdenDestino` (`fkOrdenDestino`);

--
-- Indices de la tabla `sptransfpersonal`
--
ALTER TABLE `sptransfpersonal`
  ADD PRIMARY KEY (`pkTransfPersonal`),
  ADD KEY `fkGestion` (`fkGestion`),
  ADD KEY `fkOrdenOrigen` (`fkOrdenOrigen`),
  ADD KEY `fkOrdenDestino` (`fkOrdenDestino`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `spactividad`
--
ALTER TABLE `spactividad`
  MODIFY `pkActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `spcargo`
--
ALTER TABLE `spcargo`
  MODIFY `pkCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `pkEqModelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `speqtipo`
--
ALTER TABLE `speqtipo`
  MODIFY `pkEqTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `spequipo`
--
ALTER TABLE `spequipo`
  MODIFY `pkEquipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `spgestion`
--
ALTER TABLE `spgestion`
  MODIFY `pkGestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `spimproductiva`
--
ALTER TABLE `spimproductiva`
  MODIFY `pkImproductiva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `spitemobra`
--
ALTER TABLE `spitemobra`
  MODIFY `pkItemObra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `spordentrabajo`
--
ALTER TABLE `spordentrabajo`
  MODIFY `pkOrdenTrabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `sppersonal`
--
ALTER TABLE `sppersonal`
  MODIFY `pkPersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `sppoligono`
--
ALTER TABLE `sppoligono`
  MODIFY `pkPoligono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- Filtros para la tabla `spactividad`
--
ALTER TABLE `spactividad`
  ADD CONSTRAINT `spordenTrabajo1` FOREIGN KEY (`fkOrdenTrabajo`) REFERENCES `spordentrabajo` (`pkOrdenTrabajo`);

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
  ADD CONSTRAINT `spordentrabajo_ibfk_1` FOREIGN KEY (`fkGestion`) REFERENCES `spgestion` (`pkGestion`);

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
