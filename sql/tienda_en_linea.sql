-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33065
-- Tiempo de generación: 07-05-2023 a las 23:28:32
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_en_linea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `id_producto` int(11) NOT NULL,
  `Estado` varchar(75) NOT NULL DEFAULT 'Activo',
  `fechaIngreso` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `id_usuario`, `stock`, `id_producto`, `Estado`, `fechaIngreso`) VALUES
(18, 0, 0, 0, 'Pagado', '2023-05-07'),
(19, 0, 0, 0, 'Pagado', '2023-05-07'),
(20, 0, 0, 0, 'Pagado', '2023-05-07'),
(21, 0, 0, 0, 'Pagado', '2023-05-07'),
(22, 0, 0, 0, 'Pagado', '2023-05-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Estado` varchar(50) NOT NULL DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `usuario`, `password`, `Estado`) VALUES
(1, 'Alex', 'chuc', 'alex', '1234', 'Activo'),
(2, 'FRANCISCO JAVIER', 'chuc caamal', 'Alex', '1234', 'Activo'),
(3, 'Alex', 'chuc caamal', 'nardin12', '1234', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `precio` double NOT NULL DEFAULT 0,
  `fechaCompra` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_usuario`, `id_producto`, `cantidad`, `precio`, `fechaCompra`) VALUES
(1, 0, 0, 0, 0, '2023-05-07 19:01:18'),
(2, 0, 0, 0, 0, '2023-05-07 19:01:34'),
(3, 2, 0, 0, 0, '2023-05-07 19:02:24'),
(4, 2, 3, 100, 10000, '2023-05-07 19:02:43'),
(5, 2, 3, 100, 10000, '2023-05-07 19:05:23'),
(6, 2, 1, 1, 1, '2023-05-07 19:06:13'),
(7, 2, 3, 101, 10001, '2023-05-07 19:06:13'),
(8, 2, 1, 5, 1310, '2023-05-07 19:13:37'),
(9, 2, 3, 10, 350, '2023-05-07 19:13:37'),
(10, 2, 5, 2, 104, '2023-05-07 20:39:31'),
(11, 2, 5, 3, 156, '2023-05-07 21:09:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `Precio` float DEFAULT 0,
  `imagen` varchar(250) NOT NULL,
  `Estado` varchar(20) NOT NULL DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `description`, `stock`, `Precio`, `imagen`, `Estado`) VALUES
(1, 'zapatos', 'de color cafe', 10, 262, 'zapatosnegros.jpg', 'Disponible'),
(3, 'chanclas', 'duramil', 401, 35, 'duramil.jpg', 'Disponible'),
(5, 'Doritos Flamin Hot', 'Doritos a base de chile', 25, 52, 'producto3.jpg', 'Disponible'),
(6, 'SmartWatch Motorola', 'un reloj inteligente, con conexion de bluethooth', 10, 50, 'smartWatchMoto.jpg', 'Disponible'),
(7, 'Sandalias Nike', 'Sandalias Comodas', 20, 1500, 'sandalisNike.jpg', 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `Usuario`, `password`, `Estado`) VALUES
(1, 'Armando', 'admin', '1234', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
