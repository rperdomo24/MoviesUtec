-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2018 a las 23:58:47
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
-- Base de datos: `entretenimiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `IdPelicula` int(11) NOT NULL,
  `Nombre_Pelicula` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Portada` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Sipnosis` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `PaginaOficial` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `Titulo_Original` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Genero` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Nacionalidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `duracion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `annio` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `director` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `actores` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clasificacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `UrlPelicula` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `UrlTrailer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `Usuario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `CorreoElectronico` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Contrasenna` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Nombres` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Cuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `Usuario`, `CorreoElectronico`, `Contrasenna`, `Nombres`, `Apellidos`, `Cuenta`) VALUES
(1, 'rperdomo23', 'tito.007@gmail.com', 'abc123..', 'Roberto Esau', 'Perdomo Aragon', 0),
(2, 'qweqwe', 'qweqw', 'qweqwe', 'qweqw', 'qweqwe', 0),
(3, 'qweqwe', 'qweqw', 'qweqwe', 'qweqw', 'qweqwe', 0),
(4, 'r', 'r', 'r', 'r', 'r', 0),
(5, '3', '123213', 'abc', 'eqweqwe', 'qweqwe', 0),
(6, '3', '123213', 'abc', 'eqweqwe', 'qweqwe', 0),
(7, 'eqweqw', 'eqweqwe', 'qweqwe', 'qweqwe', 'qweqwe', 0),
(8, 'qweqw', 'eqwe', 'qweqwe', 'wqeqw', 'qweqwe', 0),
(9, '13d', 'dsad', 'abc', 'asdasd', 'asdasd', 0),
(10, 'eqweq', 'eqwe', 'qweqw', 'qweqe', 'qweq', 0),
(11, 'eqw', 'qwee', 'qwe', 'qweqw', 'ewqe', 0),
(12, 'qweqwe', 'qweqw', 'qwe', 'qewewq', 'eqwe', 0),
(13, '1123', '1231', '123', '123', '123', 0),
(14, 'qweqw', 'qweqwe', 'qwe', 'qweqw', 'qwe', 0),
(15, '12312', '123', '123', '123', '132', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`IdPelicula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `IdPelicula` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
