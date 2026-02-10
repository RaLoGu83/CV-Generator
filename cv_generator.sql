-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2026 a las 14:14:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cv_generator`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cvs`
--

CREATE TABLE `cvs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cvs`
--

INSERT INTO `cvs` (`id`, `name`, `email`, `phone`, `location`, `job`, `company`, `description`, `degree`, `institution`, `year`, `skills`, `language`, `created_at`) VALUES
(1, 'Raul Loaiza Gutierrez', 'ralogu83@gmail.com', '667687790', 'El Puerto De Santa Maria', 'Técnico superior en desarrollo de aplicaciones multiplataforma', 'The Room Social S.L.', 'bla bla bla\r\nbla ble bli\r\nblo blu\r\n.', 'La ESO', 'El Lara', '2022', 'Soy muy bueno\r\n&quot;Top frases de Lolo&quot;', 'Español-Nativo', '2026-02-04 12:57:49'),
(3, 'Raul Loaiza Gutierrez', 'ralogu83@gmail.com', '667687790', 'El Puerto De Santa Maria', 'asdfasd', 'fasdfasdf', 'asdfasdfasdf', 'asdfasdfa', 'asdfasdf', 'fasdf', 'asdfasdfasd', 'asdfasdf', '2026-02-07 10:19:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
