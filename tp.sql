-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2024 a las 21:28:39
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
-- Base de datos: `tp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `imagen`) VALUES
(1, 'Café con leche', 'Café', 'img/Leche-f.png'),
(2, 'Espresso', 'Café', 'img/Espresso-f.png'),
(3, 'Latte', 'Café', 'img/Latte-f.png'),
(4, 'Americano', 'Café', 'img/Americano-f.png'),
(5, 'Capuccino', 'Café', 'img/Capuccino-f.png'),
(6, 'Tostadas', 'Comida', 'img/Tostada-f.png'),
(7, 'Medialunas', 'Comida', '#'),
(8, 'Crossaint', 'Comida', '#'),
(9, 'Bagel Sandwich', 'Comida', '#'),
(10, 'Te', 'Bebidas', '#'),
(11, 'Frappuccino', 'Bebidas', '#'),
(12, 'Te Helado', 'Bebidas', '#'),
(13, 'Frutilla Acai', 'Bebidas', '#'),
(14, 'Chocolate Caliente', 'Bebidas', '#'),
(15, 'Submarino', 'Bebidas', '#');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
