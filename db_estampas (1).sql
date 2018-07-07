-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2018 a las 05:44:00
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_estampas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id_album`, `nombre`) VALUES
(1, 'America');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id_clase` int(11) NOT NULL,
  `color` varchar(45) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id_clase`, `color`, `valor`) VALUES
(-1, 'clase variable', 0),
(1, 'Sin color', 7),
(2, 'Rojo', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estampa`
--

CREATE TABLE `estampa` (
  `id_estampa` int(11) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `precio` float NOT NULL,
  `inventario` int(11) NOT NULL,
  `sold` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estampa`
--

INSERT INTO `estampa` (`id_estampa`, `id_clase`, `id_album`, `no`, `precio`, `inventario`, `sold`) VALUES
(1, 2, 1, 1, 15, 2, 0),
(2, 1, 1, 2, 7, 9, 0),
(3, 1, 1, 3, 7, 11, 0),
(4, 2, 1, 4, 15, 4, 0),
(5, 1, 1, 5, 7, 9, 0),
(6, 1, 1, 6, 7, 10, 0),
(7, 2, 1, 7, 15, 2, 0),
(8, 2, 1, 8, 15, 0, 0),
(9, 2, 1, 9, 15, 1, 0),
(10, 2, 1, 10, 15, 0, 0),
(11, 1, 1, 11, 7, 9, 0),
(12, 1, 1, 12, 7, 9, 0),
(13, 1, 1, 13, 7, 9, 0),
(14, 1, 1, 14, 7, 10, 0),
(15, 1, 1, 15, 7, 10, 0),
(16, 1, 1, 16, 7, 9, 0),
(17, 1, 1, 17, 7, 10, 0),
(18, 1, 1, 18, 7, 10, 0),
(19, 1, 1, 19, 7, 10, 0),
(20, 1, 1, 20, 7, 10, 0),
(21, 1, 1, 21, 7, 10, 0),
(22, 1, 1, 22, 7, 9, 0),
(23, 1, 1, 23, 7, 10, 0),
(24, 1, 1, 24, 7, 9, 0),
(25, 1, 1, 25, 7, 10, 0),
(26, 1, 1, 26, 7, 9, 0),
(27, 1, 1, 27, 7, 10, 0),
(28, 1, 1, 7, 28, 9, 0),
(29, 1, 1, 29, 7, 10, 0),
(30, 1, 1, 30, 7, 9, 0),
(31, 1, 1, 31, 7, 10, 0),
(32, 1, 1, 32, 7, 10, 0),
(33, 1, 1, 33, 7, 9, 0),
(34, 1, 1, 34, 7, 10, 0),
(35, 1, 1, 35, 7, 9, 0),
(36, 1, 1, 36, 7, 10, 0),
(37, 1, 1, 37, 7, 10, 0),
(38, 1, 1, 38, 7, 10, 0),
(39, 1, 1, 39, 7, 10, 0),
(40, 1, 1, 40, 7, 9, 0),
(41, 1, 1, 41, 7, 10, 0),
(42, 1, 1, 42, 7, 10, 0),
(43, 1, 1, 43, 7, 10, 0),
(44, 1, 1, 44, 7, 9, 0),
(45, 1, 1, 45, 7, 10, 0),
(46, 1, 1, 46, 7, 10, 0),
(47, 1, 1, 47, 7, 10, 0),
(48, 1, 1, 48, 7, 10, 0),
(49, 1, 1, 49, 7, 10, 0),
(50, 1, 1, 50, 7, 9, 0),
(51, 1, 1, 51, 7, 10, 0),
(52, 1, 1, 52, 7, 10, 0),
(53, 1, 1, 53, 7, 10, 0),
(54, 1, 1, 54, 7, 10, 0),
(55, 1, 1, 55, 7, 10, 0),
(56, 1, 1, 56, 7, 8, 0),
(57, 1, 1, 57, 7, 10, 0),
(58, 1, 1, 58, 7, 10, 0),
(59, 1, 1, 59, 7, 10, 0),
(60, 1, 1, 60, 7, 10, 0),
(61, 1, 1, 61, 7, 10, 0),
(62, 1, 1, 62, 7, 10, 0),
(63, 1, 1, 63, 7, 10, 0),
(64, 1, 1, 64, 7, 10, 0),
(65, 1, 1, 65, 7, 10, 0),
(66, 1, 1, 66, 7, 10, 0),
(67, 1, 1, 67, 7, 9, 0),
(68, 1, 1, 68, 7, 10, 0),
(69, 1, 1, 69, 7, 10, 0),
(70, 1, 1, 70, 7, 10, 0),
(71, 1, 1, 71, 7, 10, 0),
(72, 1, 1, 72, 7, 8, 0),
(73, 1, 1, 73, 7, 10, 0),
(74, 1, 1, 74, 7, 10, 0),
(75, 1, 1, 75, 7, 10, 0),
(76, 1, 1, 76, 7, 10, 0),
(77, 1, 1, 77, 7, 10, 0),
(78, 1, 1, 78, 7, 10, 0),
(79, 1, 1, 79, 7, 10, 0),
(80, 1, 1, 80, 7, 10, 0),
(81, 1, 1, 81, 7, 10, 0),
(82, 1, 1, 82, 7, 9, 0),
(83, 1, 1, 83, 7, 9, 0),
(84, 1, 1, 84, 7, 10, 0),
(85, 1, 1, 85, 7, 10, 0),
(86, 1, 1, 86, 7, 10, 0),
(87, 1, 1, 87, 7, 10, 0),
(88, 1, 1, 88, 7, 10, 0),
(89, 1, 1, 89, 7, 10, 0),
(90, 1, 1, 90, 7, 9, 0),
(91, 1, 1, 91, 7, 9, 0),
(92, 1, 1, 92, 7, 9, 0),
(93, 1, 1, 93, 7, 9, 0),
(94, 1, 1, 94, 7, 10, 0),
(95, 1, 1, 95, 7, 10, 0),
(96, 1, 1, 96, 7, 10, 0),
(97, 1, 1, 97, 7, 10, 0),
(98, 1, 1, 98, 7, 10, 0),
(99, 1, 1, 99, 7, 10, 0),
(100, 1, 1, 100, 7, 10, 0),
(101, 1, 1, 101, 7, 9, 0),
(102, 1, 1, 102, 7, 9, 0),
(103, 1, 1, 103, 7, 10, 0),
(104, 1, 1, 104, 7, 10, 0),
(105, 1, 1, 105, 7, 9, 0),
(106, 1, 1, 106, 7, 10, 0),
(107, 1, 1, 107, 7, 10, 0),
(108, 1, 1, 108, 7, 9, 0),
(109, 1, 1, 109, 7, 9, 0),
(110, 1, 1, 110, 7, 9, 0),
(111, 1, 1, 111, 7, 10, 0),
(112, 1, 1, 112, 7, 9, 0),
(113, 1, 1, 113, 7, 9, 0),
(114, 1, 1, 114, 7, 9, 0),
(115, 1, 1, 115, 7, 10, 0),
(116, 1, 1, 116, 7, 10, 0),
(117, 1, 1, 117, 7, 10, 0),
(118, 1, 1, 118, 7, 10, 0),
(119, 1, 1, 119, 7, 10, 0),
(120, 1, 1, 120, 7, 10, 0),
(121, 1, 1, 121, 7, 10, 0),
(122, 1, 1, 122, 7, 10, 0),
(123, 1, 1, 123, 7, 10, 0),
(124, 1, 1, 124, 7, 9, 0),
(125, 1, 1, 125, 7, 9, 0),
(126, 1, 1, 126, 7, 9, 0),
(127, 1, 1, 127, 7, 10, 0),
(128, 1, 1, 128, 7, 9, 0),
(129, 1, 1, 129, 7, 9, 0),
(130, 2, 1, 130, 15, 0, 0),
(131, 2, 1, 131, 15, 0, 0),
(132, 2, 1, 132, 15, 0, 0),
(133, 2, 1, 133, 15, 0, 0),
(134, 2, 1, 134, 15, 0, 0),
(135, 2, 1, 135, 15, 1, 0),
(136, 2, 1, 136, 15, 3, 0),
(137, 2, 1, 137, 15, 1, 0),
(138, 2, 1, 138, 15, 0, 0),
(139, 2, 1, 139, 15, 2, 0),
(140, 2, 1, 140, 15, 1, 0),
(141, 2, 1, 141, 15, 0, 0),
(142, 2, 1, 142, 15, 2, 0),
(143, 2, 1, 143, 15, 4, 0),
(144, 2, 1, 144, 15, 2, 0),
(145, 2, 1, 145, 15, 0, 0),
(146, 2, 1, 146, 15, 3, 0),
(147, 2, 1, 147, 15, 0, 0),
(148, 2, 1, 148, 15, 11, 0),
(149, 2, 1, 149, 15, 16, 0),
(150, 2, 1, 150, 15, 11, 0),
(151, 2, 1, 151, 15, 9, 0),
(152, 2, 1, 152, 15, 10, 0),
(153, 2, 1, 153, 15, 2, 0),
(154, 1, 1, 154, 7, 10, 0),
(155, 1, 1, 155, 7, 9, 0),
(156, 1, 1, 156, 7, 10, 0),
(157, 1, 1, 157, 7, 10, 0),
(158, 1, 1, 158, 7, 8, 0),
(159, 1, 1, 159, 7, 9, 0),
(160, 1, 1, 160, 7, 10, 0),
(161, 1, 1, 161, 7, 9, 0),
(162, 1, 1, 162, 7, 10, 0),
(163, 1, 1, 163, 7, 10, 0),
(164, 1, 1, 164, 7, 9, 0),
(165, 1, 1, 165, 7, 9, 0),
(166, 1, 1, 166, 7, 9, 0),
(167, 1, 1, 167, 7, 9, 0),
(168, 1, 1, 168, 7, 10, 0),
(169, 1, 1, 169, 7, 10, 0),
(170, 1, 1, 170, 7, 10, 0),
(171, 1, 1, 171, 7, 8, 0),
(172, 1, 1, 172, 7, 9, 0),
(173, 1, 1, 173, 7, 9, 0),
(174, 1, 1, 174, 7, 9, 0),
(175, 1, 1, 175, 7, 9, 0),
(176, 1, 1, 176, 7, 8, 0),
(177, 1, 1, 177, 7, 10, 0),
(178, 1, 1, 178, 7, 10, 0),
(179, 1, 1, 179, 7, 10, 0),
(180, 1, 1, 180, 7, 9, 0),
(181, 1, 1, 181, 7, 10, 0),
(182, 1, 1, 182, 7, 9, 0),
(183, 1, 1, 183, 7, 10, 0),
(184, 1, 1, 184, 7, 10, 0),
(185, 1, 1, 185, 7, 8, 0),
(186, 1, 1, 186, 7, 10, 0),
(187, 1, 1, 187, 7, 10, 0),
(188, 1, 1, 188, 7, 10, 0),
(189, 1, 1, 189, 7, 10, 0),
(190, 1, 1, 190, 7, 10, 0),
(191, 1, 1, 191, 7, 9, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id_clase`);

--
-- Indices de la tabla `estampa`
--
ALTER TABLE `estampa`
  ADD PRIMARY KEY (`id_estampa`),
  ADD KEY `album_idx` (`id_album`),
  ADD KEY `clase_idx` (`id_clase`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estampa`
--
ALTER TABLE `estampa`
  MODIFY `id_estampa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estampa`
--
ALTER TABLE `estampa`
  ADD CONSTRAINT `album` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `clase` FOREIGN KEY (`id_clase`) REFERENCES `clase` (`id_clase`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
