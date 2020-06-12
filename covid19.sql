-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2020 a las 05:24:09
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `covid19`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infected`
--

CREATE TABLE `infected` (
  `id` int(11) NOT NULL,
  `firstname` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `lastname` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `gender` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `signo_zodiacal` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `simbolo_zodiacal` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `country` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `nationality` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `phone` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `cell` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `street` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `hnumber` int(11) DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL,
  `pic_thumbnail` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `pic_large` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `infected`
--
ALTER TABLE `infected`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `infected`
--
ALTER TABLE `infected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
