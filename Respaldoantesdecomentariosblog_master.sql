-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-01-2021 a las 03:05:11
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog_master`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Accion'),
(2, 'Rol'),
(3, 'Deportes'),
(4, 'Plataformas'),
(5, 'MMO RPG'),
(6, '\"Nuevos Juegos!!!\"');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE IF NOT EXISTS `entradas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `categoria_id` int NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` mediumtext,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entrada_usuario` (`usuario_id`),
  KEY `fk_entrada_categoria` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id`, `usuario_id`, `categoria_id`, `titulo`, `descripcion`, `fecha`) VALUES
(1, 2, 1, 'Novedades de GTA 5 Online', 'Review del GTA 5Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-08-20'),
(2, 2, 2, 'Review de LOL Online', 'Todo sobre el LOLLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-08-20'),
(3, 2, 3, 'Nuevos jugadores de FIFA 19', 'Review del FIFA 19Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-08-20'),
(4, 3, 5, 'Novedades del Assasin Creed Online', 'Review del AssasinsLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-08-20'),
(5, 3, 2, 'Review de WOW Online', 'Todo sobre el WOWLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-08-20'),
(6, 3, 3, 'Nuevos jugadores de PES 19', 'Review del PRO 19Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-08-20'),
(7, 4, 1, 'Novedades de Call of Duty', 'Review del CODLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-08-20'),
(8, 4, 1, 'Review de Fortnite Online', 'Todo sobre el FortniteLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-08-20'),
(9, 4, 3, 'Nuevos jugadores de Formula 1 2K20', 'Review del Formula 2k20Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-08-20'),
(10, 3, 1, 'Guia de GTA vice city', 'GTALorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2020-08-22'),
(13, 38, 2, 'Nuevo Juego 2', 'yukyfruk', '2020-09-01'),
(14, 38, 5, 'Nueva entrada Editada por PErroPastor', 'Esta entrada ya esta editada nuevamente por perro pastor', '2020-09-03'),
(15, 38, 4, 'Crash Bandicoot 4', 'Nueva entrada de crash', '2020-09-03');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `entradas_con_nombres`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `entradas_con_nombres`;
CREATE TABLE IF NOT EXISTS `entradas_con_nombres` (
`id` int
,`titulo` varchar(255)
,`Autor` varchar(100)
,`Categoria` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `apellidos` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `email`, `password`, `fecha`) VALUES
(2, 'Ulises', 'Villa', 'ulisesvil5@hotmail.com', '1234', '1985-05-29'),
(3, 'Adrian', 'Villa', 'adrian@hotmail.com', '65456', '2020-08-20'),
(4, 'Ingrid', 'Villa', 'ingrid@hotmail.com', '987451', '2020-08-20'),
(5, 'Max', 'Villa', 'max@hotmail.com', '16196', '2020-08-20'),
(29, 'Kevin', 'Roldan', 'kevin@kevin.com', '$2y$04$FHYkopS.q0UB3z9wNRuXDOlkLHnKkCHcstH.lgyDE5yv9kRo1f402', '2020-08-29'),
(30, 'adriano', 'lozada', 'adrianol@gmail.com', '$2y$04$SI1b1vMwtsJM6bFxFw3coOXFaCyCuT6tAs1wiUYpQkslnLsYzCTeK', '2020-08-29'),
(31, 'hola', 'hola', 'hola@hola.com', '$2y$04$BbxRmf7FtoiQN8IokhzfcuUp5nWC0sJ/PRN/cQ5zAUs7bim2NY7ye', '2020-08-29'),
(32, 'Ren', 'ren', 'ren@ren.com', '$2y$04$roFjsGkosnz.T236mTxuvuNV5JdUsrJlocxEZe8ZIkbF.hnkzbiqu', '2020-08-30'),
(33, 'stimpy', 'stimpy', 'stimpy@stimpy.com', '$2y$04$hNhtiwrBQnfyHRbIawNzae9B9WGDpRYpTF1kR9Lrw55tBNeR0E2h.', '2020-08-30'),
(34, 'antonio', 'romero', 'antonio@antonio.com', '$2y$04$ysl38zMYprUA.dSFCl1EGO5xIkDAxLj4TKsS3UmoIXDd5fV9VkATW', '2020-09-01'),
(35, 'jorge', 'lozada', 'jorge@jorge.com', '$2y$04$UVf0u0ILmIIoCdnob16vwu5.c06Yi8RMMz75H0jp6qpAbTvVFjRd6', '2020-09-01'),
(36, 'raton', 'raton', 'raton@raton.com', '$2y$04$XXP4U9M0eKC4.c1DOiGfNO3WzezXoaaaeIn2bmJfprEZMHRUg1pFu', '2020-09-01'),
(37, 'gato', 'gato', 'gato@gato.com', '$2y$04$/M1LZDYHA6/5aiWtRCJnLeXUjpWf89jubqsJIN1oL09YGl.FHPM5G', '2020-09-01'),
(38, 'perropastor', 'perropastor', 'perropastor@perropastor.com', '$2y$04$L5sYiOGTdGjuYbbZFMeMKee4ROfo6rIzTTkvFAYK.1.HfPVQucx0y', '2020-09-01'),
(39, 'perro', 'perro', 'perro@perro.com', '$2y$04$9c313GUd2chz3S5EOb29zuNtTt342xCYKAdI25YislHg2SE5rIlMO', '2020-10-18');

-- --------------------------------------------------------

--
-- Estructura para la vista `entradas_con_nombres`
--
DROP TABLE IF EXISTS `entradas_con_nombres`;

DROP VIEW IF EXISTS `entradas_con_nombres`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `entradas_con_nombres`  AS  select `e`.`id` AS `id`,`e`.`titulo` AS `titulo`,`u`.`nombre` AS `Autor`,`c`.`nombre` AS `Categoria` from ((`entradas` `e` join `usuarios` `u` on((`e`.`usuario_id` = `u`.`id`))) join `categorias` `c` on((`e`.`categoria_id` = `c`.`id`))) ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entrada_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_entrada_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
