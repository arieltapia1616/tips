-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-08-2016 a las 23:27:40
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
  `pay` float(10,2) NOT NULL,
  `debt` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `diners`
--

INSERT INTO `diners` (`id`, `name`, `pay`, `debt`) VALUES
(1, 'Ariel', 30.00, 50.00),
(2, 'Francisco', 20.00, 50.00),
(3, 'Cristian', 30.00, 50.00),
(4, 'Eric', 50.00, 50.00),
(5, 'Dario', 0.00, 50.00),
(6, 'Ignacio Martin', 0.00, 50.00),
(7, 'Ignacio Marchiano', 0.00, 50.00),
(8, 'Nicolas', 0.00, 50.00),
(9, 'Matias', 0.00, 50.00),
(10, 'Fetu', 0.00, 50.00),
(11, 'Dante', 0.00, 50.00),
(12, 'Lucio', 0.00, 50.00),
(13, 'Agustin B', 0.00, 50.00),
(14, 'Federico Reale', 0.00, 50.00),
(15, 'Gustavo', 0.00, 50.00),
(16, 'Leandro', 0.00, 50.00);

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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
