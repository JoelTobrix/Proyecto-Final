-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-09-2025 a las 07:51:48
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
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idCita` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `propiedad_id` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idCita`, `nombre`, `correo`, `fecha`, `hora`, `propiedad_id`, `estado`) VALUES
(14, 'Maria', 'mariadb12@gmail.com', '2025-09-04', '10:30:00', 8, 'aceptada'),
(15, 'Fabian', 'fabi123@hotmail.com', '2025-09-05', '16:33:00', 10, 'aceptada'),
(16, 'Fabian', 'fabi123@hotmail.com', '2025-09-20', '02:33:00', 10, 'pendiente'),
(17, 'Fabian', 'pepedariojoel007@gmail.com', '2025-09-17', '02:42:00', 8, 'rechazada'),
(18, 'Fabian', 'fabi123@hotmail.com', '2025-09-06', '03:52:00', 11, 'rechazada'),
(19, 'Elena', 'elena1990@gotmail.es', '2025-09-09', '10:28:00', 12, 'rechazada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `agente_id` int(11) DEFAULT NULL,
  `propiedad_id` int(11) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `mensaje` text NOT NULL,
  `estado` enum('pendiente','asignada','respondida','cerrada') DEFAULT 'pendiente',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `leida` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `usuario_id`, `mensaje`, `leida`, `created_at`) VALUES
(1, 2, 'Tu cita para \'Propiedad la carolina\' ha sido ACEPTADA', 0, '2025-09-08 13:26:12'),
(2, 12, 'Tu cita para \'Propiedad la carolina\' ha sido ACEPTADA', 0, '2025-09-08 13:26:26'),
(3, 3, 'Tu cita para \'Terreno diagonal al paso lateral\' ha sido ACEPTADA', 0, '2025-09-08 13:26:31'),
(4, 1, 'Tu cita para \'Terreno ubicado en la floresta\' ha sido ACEPTADA', 0, '2025-09-08 13:26:35'),
(5, 12, 'Tu cita para \'Propiedad la carolina\' ha sido RECHAZADA', 0, '2025-09-08 14:08:37'),
(6, 3, 'Tu cita para \'Terreno diagonal al paso lateral\' ha sido RECHAZADA', 0, '2025-09-08 14:08:42'),
(7, 1, 'Tu cita para \'Terreno ubicado en la floresta\' ha sido RECHAZADA', 0, '2025-09-08 14:08:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propiedades`
--

CREATE TABLE `propiedades` (
  `idPropiedad` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `disponible` tinyint(1) NOT NULL DEFAULT '1',
  `estado` varchar(20) NOT NULL DEFAULT 'disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`idPropiedad`, `titulo`, `ubicacion`, `precio`, `descripcion`, `imagen`, `disponible`, `estado`) VALUES
(8, 'Propiedad la carolina', 'Frente al parque la Carolina', '850000', '100 metros', 'propiedades/DVonRrVl1rYOLMMoej2MMursmjpBYCFUgeY2LPwZ.jpg', 1, 'disponible'),
(9, 'Terreno Av. Bolivar', 'Barrio la Floresta', '250000', '580 metros', 'propiedades/XWhTbz9oAzS3BzlGLJPedczLHPxLGQF3VjIHcwbv.jpg', 1, 'disponible'),
(10, 'Propiedad el valle', 'Barrio los chillos', '1000', '50 metros', 'propiedades/WvLHIIVaNaZWUWk0M8s29yEH0NNXZNI4e8xvUTo0.jpg', 1, 'disponible'),
(11, 'Terreno ubicado en la floresta', 'Barrio la Floresta', '55320', '900 metros', 'propiedades/xAnWjeb7BQH1hnKCdFeRt7BYDjykMrpBnECmZKEI.jpg', 1, 'disponible'),
(12, 'Terreno diagonal al paso lateral', 'Barrio Ficoa', '156000', '850 metros', 'propiedades/DQlPd9XHRPanbJ2k9D6rGxi7r64QvV6qPuIXRXNz.jpg', 1, 'disponible'),
(13, 'Departamento Quitumbe', 'Quitumbe centro', '250000', '10 metros', 'propiedades/cTDZvJfrE6r6bRnGyIKNtz9nWnauqmjmxkHYcyQv.jpg', 1, 'disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_consultas`
--

CREATE TABLE `respuestas_consultas` (
  `id` int(11) NOT NULL,
  `consulta_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_respuesta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 'agente vendedor'),
(3, 'administrador');

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
(4, 'Carlos', 'Sanchez', 'Barrio las Americas', '0987456321', 'carlosdarwin1970@hotmail.com', '$2y$10$e/2zM350vCL6B7oSl3FlEebUHdG.Wd3sighkpQ6SnJhFWxSxdO3k2', 2),
(5, 'Paola', 'Navarrete', 'Quitumbe', '0987741230', 'paolass2000@hotmail.com', '$2y$10$67JtacVlpJZHZxBoc1Qw8OGE2llRefI1Ys8nGsczJTWIpiZfATxgy', 2),
(6, 'Maria', 'Ramos', 'La floresta', '0985523614', 'mabe1990@gmail.com', '$2y$10$GWrKlkPBZdglIDubkAEVKOstJmyAVwXYJ07Y7hQTOUv7m7MJbtD92', 1),
(7, 'Carlos', 'Ledher', 'La Floresta', '0955147233', 'carlosledher@gmail.com', '$2y$10$aeEA1GCQKt7xilY7QED6qel6/nRDD00JBwByCBlU6SR.ITAz5KwsK', 2),
(8, 'Fabian', 'Sailema', 'Barrio La floresta', '0988521478', 'fabi1990@hotmail.com', '$2y$10$mRk3wvWG3.f9kqIE2/Ww/OmJLwGGqtd1zQmz3wuLIBZ9q2OO2QMB6', 3),
(9, 'Maria', 'Rodriguez', 'Las vervenitas', '0998521147', 'mabe2015@gmail.com', '$2y$10$WiubFm/Qml11sNjriM5RK.3GLSEofsFezqCZz27JA8lSiEeNArAJa', 3),
(11, 'Erick', 'Guaman', 'La Carolina', '0997168356', 'erickshitos46@gmail.com', '$2y$10$jQnfGyeZmeaEpIs7ZCzThu5CRT94sqdRib5LFZU3kg2e2gUnlM9pW', 2),
(12, 'Joel', 'Brito', 'Barrio la merced', '0987419089', 'pepedariojoel007@gmail.com', '$2y$10$ZFeGxV1zzuSMW.auyx11NOMRlwUacJ2071MZAKiaLj.37Yd7qOsrq', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `fk_propiedad` (`propiedad_id`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `agente_id` (`agente_id`),
  ADD KEY `propiedad_id` (`propiedad_id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  ADD PRIMARY KEY (`idPropiedad`);

--
-- Indices de la tabla `respuestas_consultas`
--
ALTER TABLE `respuestas_consultas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consulta_id` (`consulta_id`),
  ADD KEY `usuario_id` (`usuario_id`);

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
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `idPropiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `respuestas_consultas`
--
ALTER TABLE `respuestas_consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `RollId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_propiedad` FOREIGN KEY (`propiedad_id`) REFERENCES `propiedades` (`idPropiedad`) ON DELETE CASCADE;

--
-- Filtros para la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD CONSTRAINT `consultas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `consultas_ibfk_2` FOREIGN KEY (`agente_id`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `consultas_ibfk_3` FOREIGN KEY (`propiedad_id`) REFERENCES `propiedades` (`idPropiedad`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE;

--
-- Filtros para la tabla `respuestas_consultas`
--
ALTER TABLE `respuestas_consultas`
  ADD CONSTRAINT `respuestas_consultas_ibfk_1` FOREIGN KEY (`consulta_id`) REFERENCES `consultas` (`id`),
  ADD CONSTRAINT `respuestas_consultas_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`idUsuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_rol_usuario` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`RollId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
