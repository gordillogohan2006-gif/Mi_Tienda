-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2025 a las 23:47:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `precio` decimal(10,2) DEFAULT 0.00,
  `cantidad` int(11) DEFAULT 0,
  `descripcion` text DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`id`, `nombre`, `precio`, `cantidad`, `descripcion`, `fecha_registro`) VALUES
(1, 'Chocolate Corona', 500.00, 10, 'Chocolate barra', '2025-11-28 02:26:16'),
(2, 'Arroz 1kg', 4200.00, 50, 'Arroz blanco', '2025-11-28 02:26:16'),
(3, 'Pan Tajado', 350.00, 30, 'Pan fresco', '2025-11-28 02:26:16'),
(4, 'Leche 1L', 3800.00, 25, 'Leche entera', '2025-11-28 02:26:16'),
(5, 'Galletas Festival', 1200.00, 40, 'Galletas dulces', '2025-11-28 02:26:16'),
(6, 'Papas Margarita', 2500.00, 15, 'Papas fritas', '2025-11-28 02:26:16'),
(7, 'Huevos x20', 15000.00, 10, 'Huevos AA', '2025-11-28 02:26:16'),
(8, 'Cafe 250g', 7000.00, 12, 'Café tradicional', '2025-11-28 02:26:16'),
(9, 'Azucar 1kg', 3600.00, 20, 'Azúcar refinada', '2025-11-28 02:26:16'),
(10, 'Harina 1kg', 4500.00, 18, 'Harina para arepas', '2025-11-28 02:26:16'),
(11, 'Chocoramo', 2.80, 50, 'chorcoramo', '2025-11-28 11:16:48'),
(12, 'helado', 4.50, 10, '', '2025-11-28 11:45:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aseo`
--

CREATE TABLE `aseo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `precio` decimal(10,2) DEFAULT 0.00,
  `cantidad` int(11) DEFAULT 0,
  `descripcion` text DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aseo`
--

INSERT INTO `aseo` (`id`, `nombre`, `precio`, `cantidad`, `descripcion`, `fecha_registro`) VALUES
(1, 'Jabon Rey x3', 6500.00, 30, 'Jabón en barra', '2025-11-28 02:26:16'),
(2, 'Detergente 1kg', 7500.00, 20, 'Detergente en polvo', '2025-11-28 02:26:16'),
(3, 'Shampoo 400ml', 9800.00, 15, 'Shampoo diario', '2025-11-28 02:26:16'),
(4, 'Cloro 1L', 5200.00, 25, 'Cloro limpiador', '2025-11-28 02:26:16'),
(5, 'Papel Higienico x12', 10300.00, 10, 'Paquete familiar', '2025-11-28 02:26:16'),
(6, 'Lavaloza 500ml', 3800.00, 18, 'Lavalozas líquido', '2025-11-28 02:26:16'),
(7, 'Suavizante 1L', 7200.00, 14, 'Suavizante', '2025-11-28 02:26:16'),
(8, 'Esponja x3', 2800.00, 40, 'Esponjas para lavar', '2025-11-28 02:26:16'),
(9, 'Trapeador', 8500.00, 8, 'Trapeador resistente', '2025-11-28 02:26:16'),
(10, 'Escoba', 5000.00, 9, 'Escoba plástica', '2025-11-28 02:26:16'),
(11, 'Jabon Romano ', 3.40, 18, 'un jabon conun gran olor ', '2025-11-28 11:37:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidas`
--

CREATE TABLE `bebidas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `precio` decimal(10,2) DEFAULT 0.00,
  `cantidad` int(11) DEFAULT 0,
  `descripcion` text DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bebidas`
--

INSERT INTO `bebidas` (`id`, `nombre`, `precio`, `cantidad`, `descripcion`, `fecha_registro`) VALUES
(1, 'Coca-Cola 2L', 5500.00, 30, 'Gaseosa de cola', '2025-11-28 22:08:27'),
(2, 'Agua Cristal 600ml', 1500.00, 45, 'Agua embotellada natural', '2025-11-28 22:08:27'),
(3, 'Jugo de Naranja Hit', 2800.00, 20, 'Jugo de caja 500ml', '2025-11-28 22:08:27'),
(4, 'Cerveza Aguila (lata)', 3000.00, 50, 'Bebida alcohólica tipo lager', '2025-11-28 22:08:27'),
(5, 'Gaseosa Uva Postobon', 2200.00, 25, 'Gaseosa sabor uva', '2025-11-28 22:08:27'),
(6, 'Gatorade Azul', 3500.00, 15, 'Bebida deportiva sabor moras', '2025-11-28 22:08:27'),
(7, 'Pony Malta 330ml', 1800.00, 40, 'Bebida de malta no alcohólica', '2025-11-28 22:08:27'),
(8, 'Té Lipton Durazno', 2900.00, 22, 'Té helado sabor durazno', '2025-11-28 22:08:27'),
(9, 'Agua con gas Perrier', 4000.00, 10, 'Agua mineral con gas', '2025-11-28 22:08:27'),
(10, 'Refajo Colombiana', 3200.00, 18, 'Mezcla de cerveza y gaseosa', '2025-11-28 22:08:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `rol` enum('admin','user') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`) VALUES
(1, 'Steven', 'steven@example.com', '12345', 'admin'),
(2, 'Ana', 'ana@example.com', '12345', 'user'),
(3, 'Michael', 'cordoba@gamil.com', '11789', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aseo`
--
ALTER TABLE `aseo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `aseo`
--
ALTER TABLE `aseo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
