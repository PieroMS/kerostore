-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3310
-- Tiempo de generación: 28-10-2023 a las 10:07:15
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(3) NOT NULL,
  `codigo` varchar(4) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `codigo`, `categoria`, `estado`) VALUES
(1, '115', 'bebidas', '1'),
(2, '118', 'frutas', '1'),
(3, '251', 'snacks', '1'),
(5, '221', 'galletas', '1'),
(6, '255', 'cereales', '1'),
(8, '217', 'lacteos', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(3) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `correo` varchar(200) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `ruc`, `telefono`, `correo`, `estado`) VALUES
(1, 'Kevin', '12345678911', '123456789', 'kevin@gmail.com', '1'),
(2, 'Piero', '12345678999', '444555666', 'piero@gmail.com', '1'),
(12, 'Giannina', '12345678922', '999666333', 'gia@gmail.com', '1'),
(13, 'pureba', '00000000000', '111222333', 'av desconocido', '0'),
(14, 'Nieto XL', '99999999999', '999999999', 'nieto@gmail.com', '0'),
(17, 'Blake', '12312312377', '985574124', 'blake@gmail.com', '1'),
(18, 'asd', '12312312344', '12323', 'asd', '0'),
(19, 'nombrenombre', '12345645688', '123123', 'asdasdda', '0'),
(21, 'Teagan', '12345612388', '456782657', 'teagan@gmail.com', '1'),
(22, 'Hailee', '78945965411', '456456654', 'av pista pista', '1'),
(23, 'Emma', '45645612397', '456789789', 'los olivos', '1'),
(24, 'jackiechan', '99900099900', '123123123', 'jchan@gmail.com', '0'),
(25, 'Rock', '78945678945', '456789456', 'rock@gmail.com', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(3) NOT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `cliente` varchar(255) DEFAULT NULL,
  `producto` varchar(255) DEFAULT NULL,
  `cantidad` varchar(255) DEFAULT NULL,
  `precio` varchar(255) DEFAULT NULL,
  `importe` varchar(255) DEFAULT NULL,
  `igv` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `fecha`, `cliente`, `producto`, `cantidad`, `precio`, `importe`, `igv`, `total`, `estado`) VALUES
(3, '2023-10-28 07:46:20', 'Teagan', 'rellenitas', '5', '0.90', '4.5', '0.8099999999999999', '5.31', '1'),
(4, '2023-10-28 07:46:20', 'Emma', 'inca-cola', '1', '1.50', '1.5', '0.27', '1.77', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(3) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `stock` varchar(255) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `id_categoria` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `stock`, `estado`, `id_categoria`) VALUES
(2, 'inca-cola', '100', '1', 1),
(3, 'cocalcola', '15', '1', 1),
(4, 'manzana', '42', '1', 2),
(5, 'pera', '45', '1', 2),
(6, 'cereal bolitas angel', '41', '1', 6),
(7, 'papitas lays', '57', '1', 3),
(8, 'rellenitas', '53', '1', 5),
(9, 'leche gloria', '25', '0', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(3) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `telefono`, `direccion`, `ruc`, `estado`) VALUES
(1, 'Gloria', '995487164', 'av abancay', '12312345685', '1'),
(2, 'Papas Zip', '956847411', 'la molina', '12312345630', '1'),
(3, 'frutorick', '994547010', 'suquillo', '2015151515', '1'),
(4, 'Pikect', '987654650', 'surquillo', '12345678900', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario_id` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `rol` int(11) NOT NULL DEFAULT 1,
  `rol_cliente` int(11) NOT NULL DEFAULT 2,
  `rol_proveedor` int(11) NOT NULL DEFAULT 2,
  `rol_categorias` int(11) NOT NULL DEFAULT 2,
  `rol_productos` int(11) NOT NULL DEFAULT 2
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario_id`, `pass`, `estado`, `rol`, `rol_cliente`, `rol_proveedor`, `rol_categorias`, `rol_productos`) VALUES
(9, 'kevin@kerostore.com    ', '21232f297a57a5a743894a0e4a801fc3', '1', 2, 2, 2, 2, 2),
(8, 'piero@kerostore.com', '21232f297a57a5a743894a0e4a801fc3', '1', 1, 1, 1, 1, 1),
(21, 'dioses@kerostore.com', '48c7a8c4390496b6feff89c901ec8af3', '0', 1, 1, 1, 1, 1),
(20, 'gia@kerostore.com', '64df52a03a4bc8c7a95aa8b29ee436e1', '0', 2, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_data`
--

CREATE TABLE `usuarios_data` (
  `id` int(3) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios_data`
--

INSERT INTO `usuarios_data` (`id`, `nombre`, `direccion`, `telefono`, `ruc`) VALUES
(7, 'Piero', 'av muy muy lejano', '998989898', '11111111110'),
(8, 'Kevin', 'Av 09 calle 09', '999555131', '11111111111'),
(17, 'giannina', 'av senati', '956584187', '11111111112'),
(18, 'Dioses', 'av calle calle calle', '954701240', '11111111113');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ruc` (`ruc`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_data`
--
ALTER TABLE `usuarios_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios_data`
--
ALTER TABLE `usuarios_data`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
