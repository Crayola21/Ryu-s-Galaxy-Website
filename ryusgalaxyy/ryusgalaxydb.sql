-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2020 a las 18:53:04
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ryusgalaxydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL,
  `NombreCategoria` varchar(40) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `DescripcionCategoria` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `NombreCategoria`, `DescripcionCategoria`) VALUES
(2, 'dulces', 'prostitucion de bajo costo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `IdCompra` int(11) NOT NULL,
  `FechaCompra` date DEFAULT NULL,
  `FK_IdProveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra_producto`
--

CREATE TABLE `detallecompra_producto` (
  `IdCompra_Producto` int(11) NOT NULL,
  `CantidadProducto` int(11) DEFAULT NULL,
  `Costo` decimal(5,2) DEFAULT NULL,
  `FK_IdProducto` int(11) NOT NULL,
  `FK_IdCompra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido_producto`
--

CREATE TABLE `detallepedido_producto` (
  `IdDetallePedido_Producto` int(11) NOT NULL,
  `CantidadProducto` int(11) DEFAULT NULL,
  `Subtotal` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FK_IdProducto` int(11) NOT NULL,
  `FK_IdPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detallepedido_producto`
--

INSERT INTO `detallepedido_producto` (`IdDetallePedido_Producto`, `CantidadProducto`, `Subtotal`, `FK_IdProducto`, `FK_IdPedido`) VALUES
(30, 2, '10000', 2, 26),
(31, 11, '165000', 7, 26),
(32, 1, '10000', 3, 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopedido`
--

CREATE TABLE `estadopedido` (
  `IdEstadoPedido` int(11) NOT NULL,
  `NombreEstadoPedido` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `DescripcionEstadoPedido` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estadopedido`
--

INSERT INTO `estadopedido` (`IdEstadoPedido`, `NombreEstadoPedido`, `DescripcionEstadoPedido`) VALUES
(1, 'Pendiente', NULL),
(2, 'Pendiente Entrega', NULL),
(3, 'Entregado', NULL),
(4, 'Cancelado', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoproducto`
--

CREATE TABLE `estadoproducto` (
  `IdEstadoProducto` int(11) NOT NULL,
  `NombreEstadoProducto` varchar(40) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `DescripcionEstadoProducto` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estadoproducto`
--

INSERT INTO `estadoproducto` (`IdEstadoProducto`, `NombreEstadoProducto`, `DescripcionEstadoProducto`) VALUES
(1, 'Activo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `IdPedido` int(11) NOT NULL,
  `FechaPedido` date DEFAULT NULL,
  `Total` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FK_IdEstadoPedido` int(11) NOT NULL,
  `FK_IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`IdPedido`, `FechaPedido`, `Total`, `FK_IdEstadoPedido`, `FK_IdUsuario`) VALUES
(26, '2020-06-27', '175000', 1, 1),
(27, '2020-06-27', '10000', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_temporal`
--

CREATE TABLE `pedido_temporal` (
  `Id` int(11) NOT NULL,
  `tokken` varchar(100) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `ruta_imagen` varchar(300) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido_temporal`
--

INSERT INTO `pedido_temporal` (`Id`, `tokken`, `id_producto`, `nombre_producto`, `ruta_imagen`, `cantidad`, `total`, `id_usuario`) VALUES
(164, '5390915ecdb8f9c3cb03a541f9ca17ac5efdf5b9cb8152c6ce22db233444debd', 3, 'Sopa japonesa', 'PENDIENTE', 1, '10000', NULL),
(166, 'a510a0face55bc162a98f39bc7bc324012fa61c23838e1f2843b617957afc54e', 3, 'Sopa japonesa', 'PENDIENTE', 1, '10000', NULL),
(168, 'e3d3064347bb15311f71a7a33ee12ff08adb5c877fe77b7d30a1852abca5cb5f', 3, 'Sopa japonesa', 'PENDIENTE', 1, '10000', NULL),
(169, 'e3d3064347bb15311f71a7a33ee12ff08adb5c877fe77b7d30a1852abca5cb5f', 2, 'Galletas', 'PENDIENTE', 2, '10000', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `IdPersona` int(11) NOT NULL,
  `Identificacion` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NombresPersona` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ApellidosPersona` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CiudadPersona` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `DirreccionPersona` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `TelefonoPersona` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CelularPersona` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FK_IdTipoDocumento` int(11) NOT NULL,
  `FK_IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `NombreProducto` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Descripcion` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Precio` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `FechaVencimiento` date DEFAULT NULL,
  `RutaFotoProducto` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `TablaNutricion` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FK_IdEstadoProducto` int(11) NOT NULL,
  `FK_IdCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `NombreProducto`, `Descripcion`, `Precio`, `Cantidad`, `FechaVencimiento`, `RutaFotoProducto`, `TablaNutricion`, `FK_IdEstadoProducto`, `FK_IdCategoria`) VALUES
(2, 'Galletas', 'muy ricas', '5000', 0, '2020-06-30', NULL, NULL, 1, 2),
(3, 'Sopa japonesa', 'muy buena', '10000', 10, '2020-06-30', NULL, NULL, 1, 2),
(4, 'chocolatina de pezcado', 'sabe buenow', '1500', 50, '2020-06-30', '', NULL, 1, 2),
(5, 'condones', 'largos y duraderos', '20000', 30, '2020-06-30', NULL, NULL, 1, 2),
(6, 'calletas de chocolate ', 'son muy ricas pero ricas ricas', '2500', 20, '2020-06-09', '', NULL, 1, 2),
(7, 'Burras  monas ', 'Descripción ', '15000', 3, '2020-06-16', '', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `IdProveedor` int(11) NOT NULL,
  `Identificacion` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `NombresProveedor` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ApellidosProveedor` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `PaisProveedor` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CiudadProveedor` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `EmailProveedor` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `TelefonoProveedor` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CelularProveedor` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolusuario`
--

CREATE TABLE `rolusuario` (
  `IdRolUsuario` int(11) NOT NULL,
  `NombreRol` varchar(40) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `DescripcionRol` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `rolusuario`
--

INSERT INTO `rolusuario` (`IdRolUsuario`, `NombreRol`, `DescripcionRol`) VALUES
(1, 'Cliente', NULL),
(2, 'Administrador', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `IdTipoDocumento` int(11) NOT NULL,
  `NombreTipoDocumento` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `DescripcionTipoDocumento` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`IdTipoDocumento`, `NombreTipoDocumento`, `DescripcionTipoDocumento`) VALUES
(1, 'Cédula', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `NombreUsuario` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `EmailUsuario` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ContrasenaUsuario` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `FK_IdRolUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `NombreUsuario`, `EmailUsuario`, `ContrasenaUsuario`, `FK_IdRolUsuario`) VALUES
(1, 'fsanchez', 'fabio_developer@hotmail.com', '1234', 2),
(2, 'camilo', 'camilo123@hotmail.com', '12345', 1),
(3, 'yesid', 'yesidburra@hotmail.com', '123456', 1),
(5, 'fabio', 'fabio_developer@gmail.com', '1234', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCategoria`),
  ADD UNIQUE KEY `NombreCategoria_UNIQUE` (`NombreCategoria`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`IdCompra`),
  ADD KEY `fk_Compra_Proveedor_idx` (`FK_IdProveedor`);

--
-- Indices de la tabla `detallecompra_producto`
--
ALTER TABLE `detallecompra_producto`
  ADD PRIMARY KEY (`IdCompra_Producto`),
  ADD KEY `fk_DetalleCompra_Producto_Producto1_idx` (`FK_IdProducto`),
  ADD KEY `fk_DetalleCompra_Producto_Compra1_idx` (`FK_IdCompra`);

--
-- Indices de la tabla `detallepedido_producto`
--
ALTER TABLE `detallepedido_producto`
  ADD PRIMARY KEY (`IdDetallePedido_Producto`),
  ADD KEY `fk_DetallePedido_Producto_Producto1_idx` (`FK_IdProducto`),
  ADD KEY `fk_DetallePedido_Producto_Pedido1_idx` (`FK_IdPedido`);

--
-- Indices de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  ADD PRIMARY KEY (`IdEstadoPedido`),
  ADD UNIQUE KEY `NombreEstadoPedido_UNIQUE` (`NombreEstadoPedido`);

--
-- Indices de la tabla `estadoproducto`
--
ALTER TABLE `estadoproducto`
  ADD PRIMARY KEY (`IdEstadoProducto`),
  ADD UNIQUE KEY `NombreEstadoProducto_UNIQUE` (`NombreEstadoProducto`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`IdPedido`),
  ADD KEY `fk_Pedido_EstadoPedido1_idx` (`FK_IdEstadoPedido`),
  ADD KEY `fk_Pedido_Usuario1_idx` (`FK_IdUsuario`);

--
-- Indices de la tabla `pedido_temporal`
--
ALTER TABLE `pedido_temporal`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`IdPersona`),
  ADD UNIQUE KEY `Identificacion_UNIQUE` (`Identificacion`),
  ADD KEY `fk_Persona_TipoDocumento1_idx` (`FK_IdTipoDocumento`),
  ADD KEY `fk_Persona_Usuario1_idx` (`FK_IdUsuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD UNIQUE KEY `NombreProducto_UNIQUE` (`NombreProducto`),
  ADD KEY `fk_Producto_EstadoProducto1_idx` (`FK_IdEstadoProducto`),
  ADD KEY `fk_Producto_Categoria1_idx` (`FK_IdCategoria`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`IdProveedor`),
  ADD UNIQUE KEY `Identificacion_UNIQUE` (`Identificacion`);

--
-- Indices de la tabla `rolusuario`
--
ALTER TABLE `rolusuario`
  ADD PRIMARY KEY (`IdRolUsuario`),
  ADD UNIQUE KEY `NombreRol_UNIQUE` (`NombreRol`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`IdTipoDocumento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `NombreUsuario_UNIQUE` (`NombreUsuario`),
  ADD UNIQUE KEY `EmailUsuario_UNIQUE` (`EmailUsuario`),
  ADD KEY `fk_Usuario_RolUsuario1_idx` (`FK_IdRolUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `IdCompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallecompra_producto`
--
ALTER TABLE `detallecompra_producto`
  MODIFY `IdCompra_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detallepedido_producto`
--
ALTER TABLE `detallepedido_producto`
  MODIFY `IdDetallePedido_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  MODIFY `IdEstadoPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estadoproducto`
--
ALTER TABLE `estadoproducto`
  MODIFY `IdEstadoProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `IdPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `pedido_temporal`
--
ALTER TABLE `pedido_temporal`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `IdPersona` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `IdProveedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rolusuario`
--
ALTER TABLE `rolusuario`
  MODIFY `IdRolUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `IdTipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_Compra_Proveedor` FOREIGN KEY (`FK_IdProveedor`) REFERENCES `proveedor` (`IdProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallecompra_producto`
--
ALTER TABLE `detallecompra_producto`
  ADD CONSTRAINT `fk_DetalleCompra_Producto_Compra1` FOREIGN KEY (`FK_IdCompra`) REFERENCES `compra` (`IdCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetalleCompra_Producto_Producto1` FOREIGN KEY (`FK_IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallepedido_producto`
--
ALTER TABLE `detallepedido_producto`
  ADD CONSTRAINT `fk_DetallePedido_Producto_Pedido1` FOREIGN KEY (`FK_IdPedido`) REFERENCES `pedido` (`IdPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetallePedido_Producto_Producto1` FOREIGN KEY (`FK_IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_Pedido_EstadoPedido1` FOREIGN KEY (`FK_IdEstadoPedido`) REFERENCES `estadopedido` (`IdEstadoPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pedido_Usuario1` FOREIGN KEY (`FK_IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_Persona_TipoDocumento1` FOREIGN KEY (`FK_IdTipoDocumento`) REFERENCES `tipodocumento` (`IdTipoDocumento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Persona_Usuario1` FOREIGN KEY (`FK_IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_Producto_Categoria1` FOREIGN KEY (`FK_IdCategoria`) REFERENCES `categoria` (`IdCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Producto_EstadoProducto1` FOREIGN KEY (`FK_IdEstadoProducto`) REFERENCES `estadoproducto` (`IdEstadoProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_RolUsuario1` FOREIGN KEY (`FK_IdRolUsuario`) REFERENCES `rolusuario` (`IdRolUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
