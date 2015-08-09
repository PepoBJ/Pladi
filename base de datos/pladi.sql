-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-05-2015 a las 13:43:19
-- Versión del servidor: 5.6.19-1~exp1ubuntu2
-- Versión de PHP: 5.6.8-1+deb.sury.org~utopic+1

CREATE DATABASE IF NOT EXISTS pladi;
USE pladi;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `foro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE IF NOT EXISTS `notificacion` (
`id_notificacion` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `visto` int(1) NOT NULL DEFAULT '0',
  `fk_id_pregunta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_usuario`
--

CREATE TABLE IF NOT EXISTS `perfil_usuario` (
`id_perfil_usuario` int(11) NOT NULL,
  `foto` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `twitter` varchar(95) CHARACTER SET latin1 DEFAULT NULL,
  `facebook` varchar(95) CHARACTER SET latin1 DEFAULT NULL,
  `fk_id_usuario` int(11) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE IF NOT EXISTS `pregunta` (
`id_pregunta` int(11) NOT NULL,
  `titulo` varchar(300) CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `fecha` datetime NOT NULL,
  `respuestas` int(11) NOT NULL DEFAULT '0',
  `ult_respuesta` datetime DEFAULT NULL,
  `fk_id_usuario` int(11) NOT NULL,
  `denuncias` int(11) NOT NULL DEFAULT '0',
  `fk_id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE IF NOT EXISTS `respuesta` (
`id_respuesta` int(11) NOT NULL,
  `titulo` varchar(300) CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `fecha` datetime NOT NULL,
  `fk_id_pregunta` int(11) NOT NULL,
  `denuncias` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Disparadores `respuesta`
--
DELIMITER //
CREATE TRIGGER `insert_respuesta` AFTER INSERT ON `respuesta`
 FOR EACH ROW BEGIN
  INSERT INTO `notificacion` (`fecha`,`visto`,`fk_id_pregunta`) VALUES
  (NEW.fecha,'0',NEW.fk_id_pregunta);   
  UPDATE pregunta SET ult_respuesta = NEW.fecha, respuestas = respuestas + 1 WHERE id_pregunta = NEW.fk_id_pregunta;
END
//
DELIMITER ;

DELIMITER //
CREATE TRIGGER `delete_respuesta` AFTER DELETE ON `respuesta`
 FOR EACH ROW BEGIN
  DECLARE numrespuestas INT(11);
  SET numrespuestas = (SELECT respuestas FROM pregunta WHERE id_pregunta = OLD.fk_id_pregunta);

  IF numrespuestas > -1 THEN
    UPDATE pregunta SET respuestas = respuestas - 1 WHERE id_pregunta = OLD.fk_id_pregunta;
  END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_usuario` int(11) NOT NULL,
  `nombre` varchar(60) CHARACTER SET latin1 NOT NULL,
  `apellido` varchar(80) CHARACTER SET latin1 NOT NULL,
  `email` varchar(75) CHARACTER SET latin1 NOT NULL,
  `contrasena` varchar(48) CHARACTER SET latin1 NOT NULL,
  `tipo` varchar(15) CHARACTER SET latin1 NOT NULL DEFAULT 'normal',
  `estado` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
 ADD PRIMARY KEY (`id_notificacion`), ADD KEY `fk_id_pregunta` (`fk_id_pregunta`);

--
-- Indices de la tabla `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
 ADD PRIMARY KEY (`id_perfil_usuario`), ADD KEY `fk_id_usuario3` (`fk_id_usuario`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
 ADD PRIMARY KEY (`id_pregunta`), ADD UNIQUE KEY `titulo` (`titulo`), ADD KEY `fk_id_usuario2` (`fk_id_usuario`), ADD KEY `fk_id_categoria` (`fk_id_categoria`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
 ADD PRIMARY KEY (`id_respuesta`), ADD KEY `fk_id_pregunta` (`fk_id_pregunta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_usuario`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
MODIFY `id_perfil_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
ADD CONSTRAINT `notificacion_ibfk_1` FOREIGN KEY (`fk_id_pregunta`) REFERENCES `pregunta` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `perfil_usuario`
--
ALTER TABLE `perfil_usuario`
ADD CONSTRAINT `perfil_usuario_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `pregunta_ibfk_2` FOREIGN KEY (`fk_id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`fk_id_pregunta`) REFERENCES `pregunta` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;