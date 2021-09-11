-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-09-2021 a las 00:15:39
-- Versión del servidor: 10.6.4-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbres`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `cedula` bigint(20) NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` bigint(20) NOT NULL,
  `correo` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `cedula`, `nombre`, `apellido`, `numero`, `correo`, `direccion`) VALUES
(1, 1193081254, 'Juan Pablo', 'Jimenez Diaz', 3004934998, 'JuanJ459a@gmail.com', NULL),
(2, 78023561, 'Heli Saul', 'Jiménez Díaz', 3002446655, 'heli77_77@gmail.com', ''),
(3, 123123, 'Leymar Adolfo', 'Mestra', 31231231, 'koke@mail.com', '7630 NW 25 Street # 2B Miami, FL, Zip 33122');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `cod_factura` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `hora_compra` time NOT NULL,
  `medio_pago` varchar(45) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `cod_factura`, `fecha_compra`, `hora_compra`, `medio_pago`, `id_pedido`) VALUES
(6, 11223, '2021-09-11', '13:33:00', 'Daviplata', 9),
(7, 33122, '2021-09-11', '15:22:00', 'Nequi', 5),
(8, 33122, '2021-09-11', '15:27:00', 'Daviplata', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nombre` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `nombre`, `precio`, `cantidad`, `idProducto`) VALUES
(4, 'Huevo Revuelto', 8000, 7, 2),
(5, 'Sopa de Queso', 12000, 29, 1),
(6, 'Suizo Especial', 14000, 7, 6),
(7, 'Lata Cocacola 313ml ', 1600, 20, 4),
(8, 'Mondongo', 7000, 45, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `menu_idMenu` int(11) NOT NULL,
  `cliente_idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `menu_idMenu`, `cliente_idCliente`) VALUES
(1, 6, 1),
(5, 5, 1),
(6, 6, 1),
(8, 4, 2),
(9, 6, 2),
(11, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `tipoCategoria` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `tipoCategoria`) VALUES
(1, 'Almuerzo'),
(2, 'Desayuno'),
(4, 'Bebidas'),
(5, 'Picadas'),
(6, 'Suizos'),
(8, 'Bebidas Alcohólicas'),
(9, 'Ensaladas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`,`id_pedido`) USING BTREE,
  ADD KEY `fk_factura_Pedido1_idx` (`id_pedido`) USING BTREE;

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProducto_idx` (`idProducto`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_has_pedido_menu1_idx` (`menu_idMenu`),
  ADD KEY `cliente_idCliente_idx` (`cliente_idCliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_Pedido1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`);

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `idProducto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `cliente_idCliente` FOREIGN KEY (`cliente_idCliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `fk_menu_has_pedido_menu1` FOREIGN KEY (`menu_idMenu`) REFERENCES `menu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
