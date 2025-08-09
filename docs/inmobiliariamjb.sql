-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-08-2025 a las 00:06:19
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliariamjb`
--
CREATE DATABASE IF NOT EXISTS `inmobiliariamjb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `inmobiliariamjb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `RollId` int(11) NOT NULL,
  `RoleNombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`RollId`, `RoleNombre`) VALUES
(1, 'cliente'),
(2, 'agente vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `rol_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `direccion`, `telefono`, `correo`, `contrasena`, `rol_id`) VALUES
(1, 'Fabian', 'Gonzalez', 'Barrio la floresta', '0987412223', 'fabi123@hotmail.com', '$2y$10$d4aKkXMjtoFjklN8OmgpyOLaAwk5arbCqMeA.XMHSIR3D4APeTXru', 1),
(2, 'Maria', 'Monterdeoca', 'Barrio Los chillos', '0954112302', 'mariadb12@gmail.com', '$2y$10$UdrrcfOBl/68GHHPS506YO0mRc9.ZYZkUSkbklPf8BhY89BLT1mzi', 1),
(3, 'Elena', 'Llerena', 'chillogallo', '0912365478', 'elena1990@gotmail.es', '$2y$10$qLjF8BFmLDxjyDrUscvmD.F.Aid1Dup8rIctSFUzMk3J4dT79Cjny', 1),
(4, 'Carlos', 'Sanchez', 'Barrio las Americas', '0987456321', 'carlosdarwin1970@hotmail.com', '$2y$10$e/2zM350vCL6B7oSl3FlEebUHdG.Wd3sighkpQ6SnJhFWxSxdO3k2', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RollId`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_rol_usuario` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `RollId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_rol_usuario` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`RollId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
