-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-07-2025 a las 03:36:44
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inver_magnus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE IF NOT EXISTS `carrito` (
  `idcarrito` int NOT NULL AUTO_INCREMENT,
  `numero_documento` bigint DEFAULT NULL,
  PRIMARY KEY (`idcarrito`),
  KEY `cedula` (`numero_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`idcarrito`, `numero_documento`) VALUES
(2, 1104545276),
(3, 1110300602),
(1, 1234567890);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `IdCategoria` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `nombre`) VALUES
(1, 'Cuidado del Hogar'),
(2, 'Cocina'),
(3, 'Accesorios para electrodomesticos'),
(4, 'Cuidado Personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `numero_documento` bigint NOT NULL,
  `IdDocum` int DEFAULT NULL,
  `nombres` varchar(20) DEFAULT NULL,
  `apellidos` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `contraseña` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `rol` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`numero_documento`),
  KEY `tipo_doc` (`IdDocum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`numero_documento`, `IdDocum`, `nombres`, `apellidos`, `direccion`, `contraseña`, `email`, `rol`) VALUES
(123456789, 1, 'rol', 'admin', '1213141517', '$2y$10$cPe.jj7woG6ATsMuunMzmuW9BNc9Z99eIA2Ln1ANYSFWUz1U4qKDS', 'rolusuario@gmail.com', 1),
(1104545276, 1, 'Andrea Camila', 'Rodriguez', '3007220196', '$2y$10$fbR4zmukcUa1Edh/Zy4rnuD60bpzjcBtIyiO7KqtSFs9Nf.71yxp2', 'andros2707982@gmail.com', 0),
(1110300602, 1, 'Lolo', 'Ruiz', 'arboleda campestre calle 156', '$2y$10$1KLdBPoXbI8pzPiDe1Om7unOAPGhF4kDGzN8pjMUcr3CQ5h2db9gi', 'loloruiz@gmail.com', 0),
(1110600302, 1, 'Maria', 'Delgado', '3205983785', '$2y$10$I/fLFttZcbv2dA5elC8EXOwGDjg9t5alMn3GI2APDlGZ6bpSDVYTu', 'paulad642@gmail.com', 1),
(1234567890, 1, 'Alan', 'Lopez', '3212213041', '$2y$10$iHb5w.zy3qmeGok6bocaVujTegUusRVGue06xezb5Gga7fCybtDOy', 'alan@gmail.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) NOT NULL,
  `numero_documento` varchar(50) NOT NULL,
  `comentario` text NOT NULL,
  `calificacion` int NOT NULL DEFAULT '1',
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `codigo` (`codigo`),
  KEY `numero_documento` (`numero_documento`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `codigo`, `numero_documento`, `comentario`, `calificacion`, `fecha`) VALUES
(16, '9', '1110600302', 'Gran producto', 1, '2025-06-19 10:08:57'),
(15, '10', '1110300602', 'fa', 1, '2025-06-16 14:52:48'),
(14, '10', '1110300602', 'a', 1, '2025-06-16 14:33:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

DROP TABLE IF EXISTS `compra`;
CREATE TABLE IF NOT EXISTS `compra` (
  `IdCompra` int NOT NULL AUTO_INCREMENT,
  `numero_documento` bigint DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'Pendiente',
  PRIMARY KEY (`IdCompra`),
  KEY `cedula` (`numero_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`IdCompra`, `numero_documento`, `direccion`, `estado`) VALUES
(2, 1234567890, 'aaa', 'Pendiente'),
(3, 1234567890, 'arboleda', 'Pendiente'),
(4, 1234567890, 'add', 'Pendiente'),
(5, 1104545276, 'Arboleda', 'Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_carrito`
--

DROP TABLE IF EXISTS `detalle_carrito`;
CREATE TABLE IF NOT EXISTS `detalle_carrito` (
  `idDetalleCarrito` int NOT NULL AUTO_INCREMENT,
  `idcarrito` int DEFAULT NULL,
  `codigo` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precioUnitario` int DEFAULT NULL,
  PRIMARY KEY (`idDetalleCarrito`),
  KEY `idcarrito` (`idcarrito`),
  KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

DROP TABLE IF EXISTS `detalle_factura`;
CREATE TABLE IF NOT EXISTS `detalle_factura` (
  `IdDetalle` int NOT NULL AUTO_INCREMENT,
  `IdFactura` int NOT NULL,
  `codigo` int NOT NULL,
  `cantidad` int NOT NULL,
  `precio_unitario` int NOT NULL,
  `total_detalle` int NOT NULL,
  PRIMARY KEY (`IdDetalle`),
  KEY `IdFactura` (`IdFactura`),
  KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `detalle_factura`
--

INSERT INTO `detalle_factura` (`IdDetalle`, `IdFactura`, `codigo`, `cantidad`, `precio_unitario`, `total_detalle`) VALUES
(1, 5, 9, 1, 235000, 235000),
(2, 5, 7, 1, 45000, 45000),
(3, 8, 9, 1, 235000, 235000),
(4, 10, 9, 3, 235000, 705000),
(5, 12, 7, 1, 45000, 45000),
(6, 12, 9, 1, 235000, 235000),
(7, 13, 9, 1, 235000, 235000),
(10, 15, 9, 1, 235000, 235000),
(11, 16, 10, 3, 200000, 600000),
(12, 17, 7, 6, 45000, 270000),
(13, 17, 11, 1, 200000, 200000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_factura`
--

DROP TABLE IF EXISTS `estado_factura`;
CREATE TABLE IF NOT EXISTS `estado_factura` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estado_factura`
--

INSERT INTO `estado_factura` (`id`, `nombre`) VALUES
(1, 'Pendiente'),
(2, 'Enviado'),
(3, 'Entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `IdFactura` int NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `numero_documento` bigint NOT NULL,
  `total` int NOT NULL,
  `estado` varchar(20) DEFAULT 'Pendiente',
  `direccion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdFactura`),
  KEY `numero_documento` (`numero_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`IdFactura`, `fecha`, `numero_documento`, `total`, `estado`, `direccion`) VALUES
(5, '2025-05-30', 1234567890, 280000, 'Enviado', NULL),
(8, '2025-05-30', 1234567890, 235000, 'Pendiente', NULL),
(10, '2025-05-30', 1234567890, 705000, 'Pendiente', NULL),
(12, '2025-05-30', 1234567890, 280000, 'Pendiente', NULL),
(13, '2025-05-30', 1234567890, 235000, 'Pendiente', NULL),
(15, '2025-06-15', 1110300602, 235000, 'Pendiente', 'arboleda campestre calle 156'),
(16, '2025-06-16', 1110300602, 600000, 'Pendiente', 'arboleda campestre calle 156'),
(17, '2025-06-16', 1110300602, 470000, 'Pendiente', 'arboleda campestre calle 156');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `IdCategoria` int NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `precio` bigint DEFAULT NULL,
  `foto` blob,
  `nombre` varchar(25) DEFAULT NULL,
  `cantidad` int NOT NULL,
  `estado` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`codigo`),
  KEY `IdCategoria` (`IdCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `IdCategoria`, `descripcion`, `precio`, `foto`, `nombre`, `cantidad`, `estado`) VALUES
(7, 1, 'Cepillo increible tremendo magnifico', 45000, 0x636570696c6c6f2d636162656c6c6f2e6a7067, 'Cepillo para el cabello', 17, 1),
(9, 2, 'La licuadora Oster con control de textura funciona de forma automática, gracias a sus 3 programas que garantizan una velocidad y un tiempo de operación preciso, para ofrecer resultados perfectos en mezclas densas con ingredientes duros. O también puedes seleccionar entre las tres velocidades manuale', 235000, 0x6c69637561646f72612d70726f2e6a7067, 'Licuadora Oster', 33, 1),
(10, 2, 'premiun', 200000, 0x6c69637561646f72612e706e67, 'licuadora premiun', 7, 1),
(11, 3, 'para moto', 200000, 0x62617469646f726164656d2e706e67, 'Chaqueta', 0, 0),
(12, 4, 'verde', 80000, 0x73656361646f72612e706e67, 'p', 12, 1),
(13, 1, 'premiun', 35000, 0x6c6f676f2e6a706567, 'komida', 10, 1),
(14, 2, 'verde', 500000, 0x6b61772e6a7067, 'Chaqueta', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `IdDocum` int NOT NULL AUTO_INCREMENT,
  `TipoDocum` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`IdDocum`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`IdDocum`, `TipoDocum`) VALUES
(1, 'CC'),
(2, 'RC'),
(3, 'CE');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`numero_documento`) REFERENCES `cliente` (`numero_documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`IdDocum`) REFERENCES `tipo_documento` (`IdDocum`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`numero_documento`) REFERENCES `cliente` (`numero_documento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
  ADD CONSTRAINT `detalle_carrito_ibfk_3` FOREIGN KEY (`idcarrito`) REFERENCES `carrito` (`idcarrito`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_carrito_ibfk_4` FOREIGN KEY (`codigo`) REFERENCES `producto` (`codigo`);

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `detalle_factura_ibfk_1` FOREIGN KEY (`IdFactura`) REFERENCES `factura` (`IdFactura`),
  ADD CONSTRAINT `detalle_factura_ibfk_2` FOREIGN KEY (`codigo`) REFERENCES `producto` (`codigo`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`numero_documento`) REFERENCES `cliente` (`numero_documento`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
