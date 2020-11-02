-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-11-2020 a las 01:41:03
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `beurer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamos`
--

CREATE TABLE `reclamos` (
  `id_reclamo` int(11) NOT NULL,
  `r_tipo_doc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_n_doc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_nombr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_apat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_amat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_telef` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_correo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_depa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_prov` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_dist` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_direc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_menor` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_apd_nombr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_apd_tip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_apd_doc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_apd_telf` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_apd_corr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_tipo_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_mont` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_descr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_tip_rec` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_rec_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_rec_pedi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  ADD PRIMARY KEY (`id_reclamo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  MODIFY `id_reclamo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
