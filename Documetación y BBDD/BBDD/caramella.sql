-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2023 a las 03:04:16
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `caramella`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `Id_entrega` int(11) NOT NULL,
  `tipoEntrega` varchar(25) DEFAULT NULL,
  `valorEntrega` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`Id_entrega`, `tipoEntrega`, `valorEntrega`) VALUES
(1, 'Retiro en el local', 0),
(2, 'Envío a domicilio', 300);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotoproducto`
--

CREATE TABLE `fotoproducto` (
  `Id_fotoProducto` int(11) NOT NULL,
  `Id_producto` int(11) DEFAULT NULL,
  `nombreFoto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fotoproducto`
--

INSERT INTO `fotoproducto` (`Id_fotoProducto`, `Id_producto`, `nombreFoto`) VALUES
(58, 37, 'img/37_pavlova.jpg'),
(59, 37, 'img/37_pavlova2.jpg'),
(60, 38, 'img/38_cheesecakefrutilla.jpg'),
(61, 38, 'img/38_cheesecakefrutilla2.jpg'),
(62, 39, 'img/39_oreo.jpg'),
(63, 39, 'img/39_oreo2.jpg'),
(64, 40, 'img/40_tartacoco.jpg'),
(65, 40, 'img/40_tartacoco2.jpg'),
(66, 41, 'img/41_letercake2.jpg'),
(67, 41, 'img/41_lettercake.jpg'),
(68, 42, 'img/42_brownie.jpg'),
(69, 42, 'img/42_brownie2.jpg'),
(99, 36, 'img/36_chocotorta.jpg'),
(100, 36, 'img/36_chocotorta2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Id_pedido` int(11) NOT NULL,
  `fechaRealizacion` datetime DEFAULT NULL,
  `fechaEntrega` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `estadoPedido` varchar(25) DEFAULT NULL,
  `aclaraciones` varchar(250) DEFAULT NULL,
  `nyaCliente` varchar(40) NOT NULL,
  `telefonoCliente` varchar(25) NOT NULL,
  `direccionCliente` varchar(40) NOT NULL,
  `Id_usuario` int(11) DEFAULT NULL,
  `Id_producto` int(11) DEFAULT NULL,
  `Id_entrega` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`Id_pedido`, `fechaRealizacion`, `fechaEntrega`, `total`, `cantidad`, `estadoPedido`, `aclaraciones`, `nyaCliente`, `telefonoCliente`, `direccionCliente`, `Id_usuario`, `Id_producto`, `Id_entrega`) VALUES
(21, '2023-08-04 18:26:28', '2023-12-17 00:00:00', 100, 1, 'En preparación', '', 'Nahuel Ciampechini', '2', 'Güemes 2420', 6, 37, 1),
(22, '2023-08-04 19:13:08', '2023-08-09 00:00:00', 2298, 2, 'En preparación', 'Hola', 'Nahuel Ciampechini', '2', 'Güemes 2420', 6, 42, 2),
(23, '2023-08-05 21:07:07', '2023-12-20 00:00:00', 2298, 2, 'Entregado', '', 'Nahuel Ciampechini', '2', 'Güemes 2420', 6, 42, 2),
(24, '2023-11-29 17:26:45', '2023-12-21 00:00:00', 999, 3, 'En reparto', '.', 'Nahuel Ciampechini', '2', 'Güemes 242022', 6, 39, 2),
(35, '2023-12-16 16:04:35', '2023-12-19 00:00:00', 55, 1, 'Entregado', '', 'Luciano Conti', '+543412622928', 'J.C.Paz 1187', 3, 36, 1),
(36, '2023-12-16 16:30:51', '2023-12-19 00:00:00', 100, 1, 'Entregado', '..........................', 'Luciano Conti', '+543412622928', 'J.C.Paz 1187', 3, 37, 1),
(37, '2023-12-17 12:48:02', '2023-12-20 00:00:00', 55, 1, 'Entregado', '', 'Luciano Conti', '+543412622928', 'J.C.Paz 1187', 3, 36, 1),
(40, '2023-12-20 14:54:42', '2023-12-20 00:00:00', 100, 1, 'Entregado', '', 'Luciano Conti', '+543412622928', 'J.C.Paz 1187', 3, 37, 1),
(42, '2023-12-20 15:27:57', '2023-12-20 00:00:00', 100, 1, 'Entregado', '', 'Luciano Conti', '+543412622928', 'J.C.Paz 1187', 3, 37, 1),
(43, '2023-12-20 15:33:43', '2023-12-26 00:00:00', 100, 1, 'En reparto', '', 'Luciano Conti', '+543412622928', 'J.C.Paz 1187', 3, 37, 1),
(45, '2023-12-20 18:23:04', '2023-12-20 00:00:00', 100, 1, 'En preparación', '', 'Juan Carlos', '525455', '...', 9, 37, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id_producto` int(11) NOT NULL,
  `nombreProducto` varchar(25) DEFAULT NULL,
  `valorProducto` int(11) DEFAULT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id_producto`, `nombreProducto`, `valorProducto`, `descripcion`) VALUES
(36, 'Chocotorta', 55, 'Una chocotorta muy rica!'),
(37, 'Pavlova', 100, 'Una torta deliciosa!'),
(38, 'Cheese-Cake', 200, 'Una cheese cake muy rico!'),
(39, 'Torta oreo', 233, 'La torta oreo, una de las mas ricas!'),
(40, 'Tarta de Coco', 25, 'Una tarta de coco muy tradicional!'),
(41, 'Letter Cake', 300, 'Es lo que es, una torta riquisima con la forma de una letra!! Agrega en \"Aclaraciones\" de que letra queres tu Letter Cake!.'),
(42, 'Torta Brownie', 999, 'Una torta Brownie tradicional, con un toque especial!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `Id_tipoUsuario` int(11) NOT NULL,
  `nombreTipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`Id_tipoUsuario`, `nombreTipo`) VALUES
(1, 'cliente'),
(2, 'administrador'),
(3, 'repartidor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_usuario` int(11) NOT NULL,
  `Id_tipoUsuario` int(11) DEFAULT NULL,
  `nombreCliente` varchar(25) DEFAULT NULL,
  `apellidoCliente` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `contrasena` varchar(25) DEFAULT NULL,
  `fechaRegistro` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `telefono` varchar(25) DEFAULT NULL,
  `direccion` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_usuario`, `Id_tipoUsuario`, `nombreCliente`, `apellidoCliente`, `email`, `contrasena`, `fechaRegistro`, `telefono`, `direccion`) VALUES
(3, 2, 'Luciano', 'Conti', 'conti98.luciano@gmail.com', 'asdasd', '2023-11-29 17:40:54', '+543412622928', 'J.C.Paz 1187'),
(6, 1, 'Nahuel', 'Ciampechini', 'luchotoby8@gmail.com', 'asd', '2023-12-20 23:02:10', '03413690379', 'Güemes 2420'),
(9, 3, 'Juan', 'Carlos', 'repartidor@gmail.com', 'asdasd', '2023-12-20 23:02:39', '.', '...');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`Id_entrega`);

--
-- Indices de la tabla `fotoproducto`
--
ALTER TABLE `fotoproducto`
  ADD PRIMARY KEY (`Id_fotoProducto`),
  ADD KEY `Id_producto` (`Id_producto`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Id_pedido`),
  ADD KEY `Id_usuario` (`Id_usuario`),
  ADD KEY `Id_producto` (`Id_producto`),
  ADD KEY `Id_entrega` (`Id_entrega`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id_producto`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`Id_tipoUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `Id_tipoUsuario` (`Id_tipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `Id_entrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fotoproducto`
--
ALTER TABLE `fotoproducto`
  MODIFY `Id_fotoProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fotoproducto`
--
ALTER TABLE `fotoproducto`
  ADD CONSTRAINT `fotoproducto_ibfk_1` FOREIGN KEY (`Id_producto`) REFERENCES `producto` (`Id_producto`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`Id_producto`) REFERENCES `producto` (`Id_producto`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`Id_entrega`) REFERENCES `entrega` (`Id_entrega`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Id_tipoUsuario`) REFERENCES `tipousuario` (`Id_tipoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
