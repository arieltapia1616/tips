-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-08-2016 a las 21:22:00
-- Versión del servidor: 5.7.13-0ubuntu0.16.04.2
-- Versión de PHP: 7.0.8-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `propinas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `daily`
--

CREATE TABLE `daily` (
  `id` int(11) NOT NULL,
  `pay` float(10,2) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `daily`
--

INSERT INTO `daily` (`id`, `pay`, `day`) VALUES
(1, 40.00, '2016-08-01'),
(2, 40.00, '2016-08-02'),
(3, 50.00, '2016-08-03'),
(4, 50.00, '2016-08-04'),
(5, 40.00, '2016-08-05'),
(6, 50.00, '2016-08-06'),
(7, 0.00, '2016-09-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diners`
--

CREATE TABLE `diners` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `was` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `diners`
--

INSERT INTO `diners` (`id`, `name`, `was`) VALUES
(1, 'Ariel', 1),
(2, 'Francisco', 0),
(3, 'Cristian', 0),
(4, 'Eric', 0),
(5, 'Dario', 0),
(6, 'Ignacio Martin', 0),
(7, 'Ignacio Marchiano', 0),
(8, 'Nicolas', 0),
(9, 'Matias', 0),
(10, 'Fetu', 0),
(11, 'Dante', 0),
(12, 'Lucio', 0),
(13, 'Agustin B', 0),
(14, 'Federico Reale', 0),
(15, 'Gustavo', 0),
(16, 'Leandro', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pay`
--

CREATE TABLE `pay` (
  `id` int(11) NOT NULL,
  `diner_id` int(11) NOT NULL,
  `pay` float(10,2) NOT NULL,
  `period` int(11) NOT NULL,
  `day_pay` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pay`
--

INSERT INTO `pay` (`id`, `diner_id`, `pay`, `period`, `day_pay`) VALUES
(1, 1, 50.00, 8, '2016-08-29 22:51:02'),
(2, 2, 20.00, 8, '2016-08-29 22:51:02'),
(3, 3, 30.00, 8, '2016-08-29 22:51:02'),
(4, 4, 50.00, 8, '2016-08-29 22:51:02'),
(5, 5, 50.00, 8, '2016-08-29 22:51:02'),
(6, 6, 50.00, 8, '2016-08-29 22:51:02'),
(7, 7, 50.00, 8, '2016-08-29 22:51:02'),
(8, 8, 50.00, 8, '2016-08-29 22:51:02'),
(9, 9, 50.00, 8, '2016-08-29 22:51:02'),
(10, 10, 50.00, 8, '2016-08-29 22:51:02'),
(11, 11, 50.00, 8, '2016-08-29 22:51:02'),
(12, 12, 50.00, 8, '2016-08-29 22:51:02'),
(13, 13, 50.00, 8, '2016-08-29 22:51:02'),
(14, 14, 50.00, 8, '2016-08-29 22:51:02'),
(15, 15, 50.00, 8, '2016-08-29 22:51:02'),
(16, 16, 50.00, 8, '2016-08-29 22:51:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `diners`
--
ALTER TABLE `diners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `daily`
--
ALTER TABLE `daily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `diners`
--
ALTER TABLE `diners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `pay`
--
ALTER TABLE `pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
