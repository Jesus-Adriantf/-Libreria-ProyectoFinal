-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2023 a las 04:20:38
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `librería`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(600) DEFAULT NULL,
  `imagen` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Brian Kernighan', 'Es un informático canadiense que coescribió el libro \"El lenguaje de programación C\".', '1701244010_Brian Kernighan.jpg'),
(2, 'Dennis Ritchie', 'Fue un informático estadounidense y uno de los creadores del lenguaje de C.', '1701246700_Dennis Ritchie.jpg'),
(3, 'Guido van Rossum', 'Es un informático holandés conocido por ser el creador del lenguaje de  Python.', '1701245209_Guido van Rossum.jpg'),
(4, 'Martin Fowler', 'Es un destacado autor y orador en el ámbito del desarrollo de software.', '1701244319_Martin Fowler.jpg'),
(5, 'Robert C. Martin', 'Conocido como \"Uncle Bob\" Es un autor y consultor de software que ha contribuido.', '1701246919_Robert C. Martin.jpg'),
(6, 'Erik Meijer', 'Es un científico de la computación neerlandés que ha contribuido al desarrollo de lenguajes de', '1701248189_Erik Meijer.jpg'),
(7, 'Yukihiro Matsumoto', 'Es un programador japonés y el creador del lenguaje de programación Ruby. ', '1701244593_Yukihiro Matsumoto.jpg'),
(8, 'Steve McConnell', 'Es un autor y consultor en ingeniería de software. Escribio el libro Code Complete.', '1701247475_Steve McConnell.jpg'),
(9, 'Kent Beck', 'Es un programador y autor conocido por su papel en el desarrollo de Extreme Programming (XP) y ágil...', '1701248131_Kent Beck.jpg'),
(10, 'Addy Osmani', 'Es un ingeniero de software especializado en desarrollo web. Es conocido por su trabajo en ', '1701248566_Addy Osmani.jpg'),
(11, 'Cay Horstmann', 'Es un profesor de informática y autor de libros de programación, incluido \"Big Java\" y \"Core Java\"', '1701249205_horstmann.jpg'),
(12, 'Douglas Crockford', 'Es conocido por su trabajo en JavaScript y JSON. Ha escrito libros como \"JavaScript: The Good Parts\"', '1701249332_Douglas Crockford.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(150) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `asunto` varchar(200) DEFAULT NULL,
  `comentario` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `correo`, `fecha`, `asunto`, `comentario`) VALUES
(14, 'travieso', 'travieso@gmail.com', '2023-11-23', 'travieso', 'travieso'),
(15, 'Dariel', 'Dariel@gmail.com', '2023-11-17', 'Falta de libro', 'Lista de libros nuevos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(25,0) NOT NULL,
  `imagen` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `nombre`, `precio`, `imagen`) VALUES
(16, 'PHP', 500, '1701236191_Lecturas Programacion con PHP 6 y MySQL.jpg'),
(17, 'Java', 900, '1701236212_OFHQuDeJ.jpg'),
(18, 'Hacking', 2000, '1701236228_Un Fantasma En El Sistema Las Aventuras Del Hacker Más Bus_.jpg'),
(23, 'Pythom', 400, '1701236245_Aprende Python en un fin de semana - Guía completa de iniciación.jpg'),
(25, 'HTML', 600, '1701236261_Arrancar Con HTML5 - Curso de Programación.jpg'),
(26, 'Algoritmo', 300, '1701236277_Fundamentos de algoritmia - G_ Brassard & P.jpg'),
(27, 'Diseño de Algoritmo', 750, '1701236300_Diseno De Algoritmos Y Su Codificacion En Lenguaje C Hd.jpg'),
(28, 'Algoritmo y Prog.', 530, '1701236320_AlgoritmosProgramacion Scratch PDF Creatividad Heurístico.jpg'),
(29, 'Seguridad', 679, '1701260030_35 Libros de Seguridad Informática para leer ¡Gratis!.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
