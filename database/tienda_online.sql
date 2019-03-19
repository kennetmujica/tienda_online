-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-03-2019 a las 18:44:14
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_online`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarClientesPorEmail` (`vchEmail` VARCHAR(20))  BEGIN 
SELECT * FROM clientes
WHERE Email=vchEmail; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarClientesPorId` (`iId` INT)  BEGIN 
SELECT * FROM clientes
WHERE ID_Cliente=iId; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarClientesPorNombre` (`vchNombre` VARCHAR(50))  BEGIN 
SELECT * FROM clientes
WHERE Nombre=vchNombre; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarProductos` (IN `productoID` INT)  BEGIN 
SELECT * FROM productos 
WHERE ID_Producto=productoID; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarProductosPorNombre` (`vchDescripcion` VARCHAR(20))  BEGIN 
SELECT * FROM productos
WHERE Descripcion=vchDescripcion; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MostrarProductosPorPrecio` (`fPrecio` FLOAT)  BEGIN 
SELECT * FROM productos
WHERE Precio=fPrecio; 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID_Cliente` varchar(10) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Telefono` bigint(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID_Cliente`, `Nombre`, `Password`, `Telefono`, `Email`) VALUES
('0001', 'Jose Eduardo ', '123', 3312908756, 'Eduardo@gmail.com'),
('0002', 'Rosa Isela', '123', 3190874563, 'Rosa@gmail.com'),
('0003', 'Damaris Cuenca', '123', 3319875632, 'Damaris@gmail.com'),
('0004', 'Wendy Araiza', '123', 3312980934, 'Wendy@gmail.com'),
('0005', 'Greysi Teliz', '123', 3324567490, 'Greysi@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `ID_DetVent` int(11) NOT NULL,
  `ID_Venta` int(11) DEFAULT NULL,
  `ID_Producto` int(11) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`ID_DetVent`, `ID_Venta`, `ID_Producto`, `Cantidad`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 2, 1),
(4, 2, 1, 1);

--
-- Disparadores `detalle_venta`
--
DELIMITER $$
CREATE TRIGGER `DeleteDetVenta` AFTER DELETE ON `detalle_venta` FOR EACH ROW BEGIN
UPDATE productos SET Existencia=Existencia+OLD.Cantidad WHERE ID_Producto=OLD.ID_Producto;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `InsertDetVenta` BEFORE INSERT ON `detalle_venta` FOR EACH ROW BEGIN
UPDATE productos SET Existencia=Existencia-NEW.Cantidad WHERE ID_Producto=NEW.ID_Producto;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UpdateDetVenta` BEFORE UPDATE ON `detalle_venta` FOR EACH ROW BEGIN
UPDATE productos SET Existencia=Existencia-NEW.Cantidad+OLD.Cantidad WHERE ID_Producto=OLD.ID_Producto;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_Producto` int(11) NOT NULL,
  `Descripcion` varchar(20) NOT NULL,
  `Existencia` int(11) NOT NULL,
  `Precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_Producto`, `Descripcion`, `Existencia`, `Precio`) VALUES
(1, 'Playera roja', 98, 300),
(2, 'Playera gris', 98, 300),
(3, 'Playera morada', 100, 300),
(4, 'Playera negra', 100, 300),
(5, 'Playera azul', 100, 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID_Venta` int(11) NOT NULL,
  `ID_Cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID_Venta`, `ID_Cliente`) VALUES
(1, NULL),
(2, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID_Cliente`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`ID_DetVent`),
  ADD KEY `ID_Venta` (`ID_Venta`),
  ADD KEY `ID_Producto` (`ID_Producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_Producto`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID_Venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `ID_DetVent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID_Venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`ID_Venta`) REFERENCES `ventas` (`ID_Venta`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`ID_Producto`) REFERENCES `productos` (`ID_Producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
