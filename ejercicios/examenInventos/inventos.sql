-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-02-2018 a las 12:33:02
-- Versión del servidor: 5.7.21-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creadoresycosis`
--

CREATE TABLE `creadoresycosis` (
  `id` int(11) NOT NULL,
  `inventor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `invento` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `creadoresycosis`
--

INSERT INTO `creadoresycosis` (`id`, `inventor`, `invento`) VALUES
(1, 'John Harrington', 'Inodoro'),
(2, 'Johann Gutenberg', 'Imprenta'),
(3, 'Benjamin Franklin', 'Pararrayos'),
(4, 'Samuel Colt', 'Revolver'),
(5, 'Alexander Fleming', 'Penicilina'),
(6, 'Elena Guzman', 'Productividad por desesperacion'),
(8, 'Elena G', 'La PDO invisible');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `creadoresycosis`
--
ALTER TABLE `creadoresycosis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `creadoresycosis`
--
ALTER TABLE `creadoresycosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
