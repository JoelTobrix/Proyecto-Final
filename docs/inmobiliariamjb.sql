-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-09-2025 a las 08:20:27
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
(14, 'Maria', 'mariadb12@gmail.com', '2025-09-04', '10:30:00', 8, 'rechazada'),
(17, 'Fabian', 'pepedariojoel007@gmail.com', '2025-09-17', '02:42:00', 8, 'rechazada'),
(20, 'Maria', 'mariadb12@gmail.com', '2025-09-11', '12:43:00', 14, 'aceptada'),
(21, 'Romel', 'dariobarrionuevo49@gmail.com', '2025-09-15', '15:30:00', 13, 'rechazada'),
(24, 'Dario', 'dariobarrionuevo49@gmail.com', '2025-09-17', '04:13:00', 14, 'rechazada'),
(25, 'Fabricio', 'fabi123@hotmail.com', '2025-09-18', '04:20:00', 16, 'aceptada'),
(26, 'Maria', 'mabe1990@gmail.com', '2025-09-19', '11:20:00', 21, 'pendiente'),
(28, 'Dario', 'dariobarrionuevo49@gmail.com', '2025-09-22', '15:04:00', 26, 'aceptada'),
(29, 'Dario', 'dariobarrionuevo49@gmail.com', '2025-09-19', '12:35:00', 27, 'aceptada'),
(30, 'Mayra', 'may2001@hotmail.com', '2025-09-24', '11:20:00', 29, 'aceptada'),
(31, 'Mayra', 'may2001@hotmail.com', '2025-09-30', '12:19:00', 25, 'pendiente');

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

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `cliente_id`, `agente_id`, `propiedad_id`, `nombre`, `email`, `telefono`, `mensaje`, `estado`, `fecha_creacion`) VALUES
(5, 4, 12, 13, 'Carlos', 'carlosledher@gmail.com', '0985223145', 'Info almacenada', 'pendiente', '2025-09-10 14:02:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email_tokens`
--

CREATE TABLE `email_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_08_29_131615_add_disponible_to_propiedades_table', 1),
(6, '2025_09_12_154902_create_email_tokens_table', 1),
(7, '2025_09_22_124029_add_visitas_to_propiedades_table', 1);

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
(7, 1, 'Tu cita para \'Terreno ubicado en la floresta\' ha sido RECHAZADA', 0, '2025-09-08 14:08:45'),
(8, 1, 'Tu cita para \'Propiedad el valle\' ha sido ACEPTADA', 0, '2025-09-10 16:31:02'),
(9, 12, 'Tu cita para \'Propiedad la carolina\' ha sido ACEPTADA', 0, '2025-09-10 17:23:55'),
(10, 1, 'Tu cita para \'Terreno ubicado en la floresta\' ha sido ACEPTADA', 0, '2025-09-10 17:25:14'),
(11, 3, 'Tu cita para \'Terreno diagonal al paso lateral\' ha sido ACEPTADA', 0, '2025-09-10 17:25:20'),
(12, 2, 'Tu cita para \'Suite\' ha sido ACEPTADA', 0, '2025-09-10 17:43:55'),
(13, 2, 'Tu cita para \'Suite\' ha sido RECHAZADA', 0, '2025-09-10 17:44:19'),
(14, 2, 'Tu cita para \'Propiedad la carolina\' ha sido RECHAZADA', 0, '2025-09-12 13:18:46'),
(15, 1, 'Tu cita para \'Propiedad el valle\' ha sido RECHAZADA', 0, '2025-09-12 13:18:49'),
(16, 1, 'Tu cita para \'Propiedad el valle\' ha sido RECHAZADA', 0, '2025-09-12 13:18:54'),
(17, 1, 'Tu cita para \'Propiedad el valle\' ha sido RECHAZADA', 0, '2025-09-12 13:18:58'),
(18, 12, 'Tu cita para \'Propiedad la carolina\' ha sido RECHAZADA', 0, '2025-09-12 13:19:01'),
(19, 1, 'Tu cita para \'Terreno ubicado en la floresta\' ha sido RECHAZADA', 0, '2025-09-12 13:19:04'),
(20, 2, 'Tu cita para \'Propiedad la carolina\' ha sido ACEPTADA', 0, '2025-09-12 13:19:25'),
(21, 1, 'Tu cita para \'Propiedad el valle\' ha sido ACEPTADA', 0, '2025-09-12 13:19:30'),
(22, 1, 'Tu cita para \'Propiedad el valle\' ha sido ACEPTADA', 0, '2025-09-12 13:19:32'),
(23, 12, 'Tu cita para \'Propiedad la carolina\' ha sido ACEPTADA', 0, '2025-09-12 13:19:37'),
(24, 1, 'Tu cita para \'Terreno ubicado en la floresta\' ha sido ACEPTADA', 0, '2025-09-12 13:19:41'),
(25, 2, 'Tu cita para \'Propiedad la carolina\' ha sido RECHAZADA', 0, '2025-09-12 15:00:20'),
(26, 2, 'Tu cita para \'Propiedad la carolina\' ha sido ACEPTADA', 0, '2025-09-12 15:00:23'),
(27, 2, 'Tu cita para \'Suite\' ha sido ACEPTADA', 0, '2025-09-12 15:00:45'),
(28, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido ACEPTADA', 0, '2025-09-12 16:36:03'),
(29, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-12 16:39:16'),
(30, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-12 16:39:24'),
(31, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido ACEPTADA', 0, '2025-09-12 16:39:50'),
(32, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-12 16:40:30'),
(33, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido ACEPTADA', 0, '2025-09-12 16:41:36'),
(34, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-12 17:13:32'),
(35, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido ACEPTADA', 0, '2025-09-12 17:13:36'),
(36, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido ACEPTADA', 0, '2025-09-12 17:15:37'),
(37, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-12 17:17:00'),
(38, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido ACEPTADA', 0, '2025-09-12 17:17:18'),
(39, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-12 17:19:05'),
(40, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido ACEPTADA', 0, '2025-09-12 17:19:10'),
(41, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-12 17:20:51'),
(42, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido ACEPTADA', 0, '2025-09-12 17:21:01'),
(43, 2, 'Tu cita para \'Propiedad la carolina\' ha sido RECHAZADA', 0, '2025-09-15 12:46:14'),
(44, 1, 'Tu cita para \'Propiedad el valle\' ha sido RECHAZADA', 0, '2025-09-15 12:46:19'),
(45, 12, 'Tu cita para \'Propiedad la carolina\' ha sido RECHAZADA', 0, '2025-09-15 12:46:25'),
(46, 12, 'Tu cita para \'Propiedad la carolina\' ha sido RECHAZADA', 0, '2025-09-15 12:46:29'),
(47, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-15 12:46:36'),
(48, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido ACEPTADA', 0, '2025-09-15 13:01:09'),
(49, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-15 13:05:51'),
(50, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-15 13:06:52'),
(51, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-15 13:07:53'),
(52, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-15 13:16:14'),
(53, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-15 13:17:41'),
(54, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-15 13:18:12'),
(55, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-15 13:36:33'),
(56, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido ACEPTADA', 0, '2025-09-15 13:37:19'),
(57, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-15 15:01:25'),
(58, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido ACEPTADA', 0, '2025-09-15 15:02:34'),
(59, 1, 'Tu cita para \'Propiedad el valle\' ha sido RECHAZADA', 0, '2025-09-15 17:17:22'),
(60, 1, 'Tu cita para \'Terreno ubicado en la floresta\' ha sido RECHAZADA', 0, '2025-09-15 17:17:34'),
(61, 18, 'Tu cita para \'Suite\' ha sido ACEPTADA', 0, '2025-09-17 03:05:58'),
(62, 18, 'Tu cita para \'Suite\' ha sido RECHAZADA', 0, '2025-09-17 03:07:08'),
(63, 18, 'Tu cita para \'Suite\' ha sido ACEPTADA', 0, '2025-09-17 03:09:44'),
(64, 18, 'Tu cita para \'Suite\' ha sido RECHAZADA', 0, '2025-09-17 04:09:11'),
(65, 18, 'Tu cita para \'Suite\' ha sido ACEPTADA', 0, '2025-09-17 04:09:18'),
(66, 1, 'Tu cita para \'Departamento suite\' ha sido ACEPTADA', 0, '2025-09-17 04:15:39'),
(67, 2, 'Tu cita para \'Propiedad la carolina\' ha sido ACEPTADA', 0, '2025-09-17 04:16:40'),
(68, 18, 'Tu cita para \'Terreno constructora, inversion\' ha sido ACEPTADA', 0, '2025-09-18 14:16:49'),
(69, 18, 'Tu cita para \'Terreno constructora, inversion\' ha sido ACEPTADA', 0, '2025-09-18 14:20:36'),
(70, 18, 'Tu cita para \'Terreno productivo/uso mixto\' ha sido ACEPTADA', 0, '2025-09-18 14:35:45'),
(71, 18, 'Tu cita para \'Departamento Quitumbe\' ha sido RECHAZADA', 0, '2025-09-19 02:05:29'),
(72, 2, 'Tu cita para \'Propiedad la carolina\' ha sido RECHAZADA', 0, '2025-09-19 02:53:16'),
(73, 18, 'Tu cita para \'Suite\' ha sido RECHAZADA', 0, '2025-09-19 02:53:29'),
(74, 19, 'Tu cita para \'Suite Amazonas Plaza\' ha sido ACEPTADA', 0, '2025-09-22 13:16:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `estado` varchar(20) NOT NULL DEFAULT 'disponible',
  `visitas` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `propiedades`
--

INSERT INTO `propiedades` (`idPropiedad`, `titulo`, `ubicacion`, `precio`, `descripcion`, `imagen`, `disponible`, `estado`, `visitas`) VALUES
(8, 'Propiedad la carolina', 'Frente al parque la Carolina', '850000', '100 metros', 'propiedades/DVonRrVl1rYOLMMoej2MMursmjpBYCFUgeY2LPwZ.jpg', 0, 'reservada', 0),
(13, 'Departamento Quitumbe', 'Quitumbe centro', '250000', '10 metros', 'propiedades/cTDZvJfrE6r6bRnGyIKNtz9nWnauqmjmxkHYcyQv.jpg', 0, 'reservada', 0),
(14, 'Suite', 'Barrio Jardines del Este', '45025', 'Totalmente nueva 50 metros cuadrados', 'propiedades/UdO20KO7sLxs0XTkvNrJrgIj5eqccA5c2KLOoKE2.jpg', 0, 'reservada', 0),
(16, 'Departamento suite', 'Residencia nuevos horizontes', '18000', '50 metros de largo y ancho', 'propiedades/P6jLqnNIqKphDWVnsZOMfRntPGqgbolcgKgRCvKK.jpg', 0, 'reservada', 0),
(18, 'Terreno Calderon', 'Av. Abdon Calderon', '10000', '200 metros cuadrados', 'propiedades/E3PGgqSTl1gTIkq59U3YHV3xm8UTh3VYhpo2NwbJ.jpg', 1, 'disponible', 0),
(19, 'Terreno ubicado en Cumbaya', 'Via a Cumbaya', '1500', '50 metros cuadrados', 'propiedades/4hbrXv4yNSNs8oxHQNC91OQdFjTPWEe9k7nj57cc.jpg', 1, 'disponible', 0),
(20, 'Ciudad futura Quitumbe sur', 'Quitumbe sur', '62000', '537 metros cuadrados', 'propiedades/D2kRvY9DM9r9A6HnAVrWQegh1KZRUQWwFpeIiTI2.jpg', 1, 'disponible', 0),
(21, 'Terreno Quitumbe norte', 'Quitumbe', '25000', '50 metros cuadrados', 'propiedades/xz9i5XwUnWWQtWSHpnjAmg90LL7Vjhkhu9wgkqWg.png', 1, 'disponible', 0),
(22, 'Terreno residencial  el portal', 'Conjunto habitacional residencia el regional', '1500000', '350 metros cuadrados', 'propiedades/TYJoxmLGD4BpQ4mWogoRN0EGWge57UcvoukpmV61.jpg', 1, 'disponible', 0),
(23, 'Terreno en Tumbaco Collaqui', 'Tumbaco Collaqui Quito', '950000', '1000 metros cuadrados', 'propiedades/hDYNudIsPsygyXtoHdDJ8HMnQo72GDxITLW3Gy6J.jpg', 1, 'disponible', 0),
(24, 'Parcela', 'Tababela Quito', '300000', '850 metros cuadrados', 'propiedades/bbxts5BxbEk3r7Lhnxsj4spkMhCJejPOuU5vVmHW.jpg', 1, 'disponible', 0),
(25, 'Terreno de campo parcela en zona verde', 'Tumbaco', '1450000', '1300 metros cuadrados', 'propiedades/ECVaoilyGs6exOjY72sEuI7qCAUu9EBtktGqUGXR.jpg', 1, 'disponible', 0),
(26, 'Terreno constructora, inversion', 'Tumbaco', '1450000', '8012 metros cudrados', 'propiedades/UdjoCPtbHThuA2kZYYfEFwa8xDtjrWIp0pE1k0X6.jpg', 0, 'reservada', 0),
(27, 'Terreno productivo/uso mixto', 'El Quinche, La esperanza', '450000', '850 metros cuadrados\r\nDe oportunidad', 'propiedades/kZ0UUF7S8ysYXD9ZUM6Zu0IDFPkx8vLSVC6lzHVT.png', 0, 'reservada', 0),
(28, 'Terreno Av. Bolivar', 'Tababela Quito', '4560000', '1500 metros cuadrados, excelente oportunidad', 'propiedades/19bsmMfy4QWCfhqnrljdTCvM21sTHznbow0MYixv.jpg', 1, 'disponible', 0),
(29, 'Suite Amazonas Plaza', 'Parque la Carolina', '450000', '3 habitaciones cerca del parque la Carolina', 'propiedades/YBPy2tilVnhyPiEQprbGPt3knMzSV79zL5apntzl.jpg', 0, 'reservada', 0),
(30, 'Departamento Batan Gardens', 'La residencial', '1500000', '2 Habitaciones con areas verdes', 'propiedades/MlXectSOMPYAgLwEsYRZbc1TMn0yf4uIzpYP1u4k.jpg', 1, 'disponible', 0),
(31, 'Edificio bosques de Bellavista', 'Nuevos horizontes', '1450000', 'Departamento con vista panoramica', 'propiedades/XYVh3AxUaQZjauaJweZ2PFTqmSspH5BuscW8Aoey.jpg', 1, 'disponible', 0);

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
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(12, 'Joel', 'Brito', 'Barrio la merced', '0987419089', 'pepedariojoel007@gmail.com', '$2y$10$uIc/.p0I7cjp89XYrDJZku0P5lJjHpy9RWtLSZ8eVX5uR5N13eXI6', 3),
(18, 'Romel', 'Brito', 'la merced', '0988521336', 'dariobarrionuevo49@gmail.com', '$2y$10$8ieT7tqa2hDbW67pNhBVE.B1okSqJQEMM5sSyIXyD7RkSvNSPoSiW', 1),
(19, 'Mayra', 'Castro', 'Av. el mercado Mayorista', '0985221365', 'may2001@hotmail.com', '$2y$10$toY8xe/V142oj6W02MPzG.2B02R3XnIvC7.AsPXLi/j7xzEu6kPA6', 1);

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
-- Indices de la tabla `email_tokens`
--
ALTER TABLE `email_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_tokens_email_unique` (`email`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `email_tokens`
--
ALTER TABLE `email_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `propiedades`
--
ALTER TABLE `propiedades`
  MODIFY `idPropiedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
