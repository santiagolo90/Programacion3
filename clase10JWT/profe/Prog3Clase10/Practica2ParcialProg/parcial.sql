-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2017 a las 00:42:44
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parcial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `Email` varchar(40) NOT NULL,
  `Titulo` varchar(20) DEFAULT NULL,
  `Comentario` varchar(100) DEFAULT NULL,
  `Path` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`Email`, `Titulo`, `Comentario`, `Path`) VALUES
('Laura@hotmail.com', 'tituloNuevo', 'unComentarioInventadoxD', './imagenesDeComentario/tituloNuevo.jpg'),
('Laura@hotmail.com', 'titulOtro', 'NoseQuePoner', './imagenesDeComentario/titulOtro.jpg'),
('Laura@hotmail.com', 'titulo', 'Comentario', './imagenesDeComentario/titulo.jpg'),
('Micaela@hotmail.com', 'Flores', 'UnComentarioInventado', './imagenesDeComentario/Flores.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(5) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Perfil` varchar(20) DEFAULT NULL,
  `Edad` int(3) DEFAULT NULL,
  `Clave` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Email`, `Perfil`, `Edad`, `Clave`) VALUES
(17, 'Laura', 'Laura@hotmail.com', 'Usuario', 28, '1234'),
(18, 'Lucas', 'Lucas@hotmail.com', 'Admin', 25, '5678'),
(19, 'Micaela', 'Micaela@hotmail.com', 'Usuario', 24, '2468');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
