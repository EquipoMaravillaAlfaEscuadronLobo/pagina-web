-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2018 a las 04:52:41
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pagina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombre`, `pass`) VALUES
(1, 'admin01', '$2y$10$2rho0MAZ5MwLDYw851GwB.6eHCBN0gIKsWJboakQ6epu1IOqsjphy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `codigo_autor` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `apellido` varchar(25) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `biografia` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `codigo_editorial` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `pais` varchar(10) DEFAULT NULL,
  `email` varchar(15) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `id_administrador` int(11) NOT NULL,
  `titular` varchar(45) DEFAULT NULL,
  `descripcion_evento` text,
  `estado` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `id_administrador`, `titular`, `descripcion_evento`, `estado`, `fecha`) VALUES
(1, 1, 'Recolección de juguetes ', '<h2 style="text-align:center">Estamos trabajando para que ni&ntilde;os de bajos recursos reciban un regalo especial: un Juguete... &iexcl;y m&aacute;s! &iexcl;Sum&aacute; tu donaci&oacute;n y form&aacute; parte de esta cadena de solidaridad!<br />\r\n&nbsp;</h2>\r\n\r\n<p style="text-align:center"><img alt="La imagen puede contener: texto" src="https://scontent-mia3-2.xx.fbcdn.net/v/t1.0-9/23905517_1787951537916355_8621826913917965148_n.jpg?oh=f90a4c77a3cd0eee4e9fca8d1ec6c11e&amp;oe=5AE2863B" /></p>\r\n', '1', '2017-12-27'),
(2, 1, 'Recolección de juguetes ', '<h2 style="text-align:center">Estamos trabajando para que ni&ntilde;os de bajos recursos reciban un regalo especial: un Juguete... &iexcl;y m&aacute;s! &iexcl;Sum&aacute; tu donaci&oacute;n y form&aacute; parte de esta cadena de solidaridad!<br />\r\n&nbsp;</h2>\r\n\r\n<p style="text-align:center"><img alt="La imagen puede contener: texto" src="https://scontent-mia3-2.xx.fbcdn.net/v/t1.0-9/23905517_1787951537916355_8621826913917965148_n.jpg?oh=f90a4c77a3cd0eee4e9fca8d1ec6c11e&amp;oe=5AE2863B" /></p>\r\n', '1', '2017-12-27'),
(3, 1, 'Taller de Manualidades', '<p>&nbsp;</p>\r\n\r\n<h2 style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif">Iniciamos la proxima semana con el Taller de Manualidades<br />\r\nYA ESTAN ABIERTAS LAS INSCRIPCIONES AQUI EN CASA DE ENCUENTRO.</span></h2>\r\n\r\n<p style="text-align:center"><img alt="La imagen puede contener: texto" src="https://scontent-mia3-2.xx.fbcdn.net/v/t1.0-9/23905176_771053789759098_4028815986715122938_n.jpg?oh=3481548851797e66811759961b05ff6c&amp;oe=5AD9A968" /></p>\r\n', '1', '2017-12-06'),
(4, 1, 'Taller de Manualidades', '<p>&nbsp;</p>\r\n\r\n<h2 style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif">Iniciamos la proxima semana con el Taller de Manualidades<br />\r\nYA ESTAN ABIERTAS LAS INSCRIPCIONES AQUI EN CASA DE ENCUENTRO.</span></h2>\r\n\r\n<p style="text-align:center"><img alt="La imagen puede contener: texto" src="https://scontent-mia3-2.xx.fbcdn.net/v/t1.0-9/23905176_771053789759098_4028815986715122938_n.jpg?oh=3481548851797e66811759961b05ff6c&amp;oe=5AD9A968" /></p>\r\n', '1', '2017-12-06'),
(5, 1, 'Inicio de Dibujo y pintura', '<p style="text-align:center"><img alt="No hay texto alternativo automático disponible." src="https://scontent-mia3-2.xx.fbcdn.net/v/t1.0-9/23754826_769166366614507_177012338419571437_n.jpg?oh=fe086459150608b7780842ad2d510637&amp;oe=5AE2ACA3" /></p>\r\n', '1', '2018-02-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `id_administrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`id_foto`, `direccion`, `id_administrador`) VALUES
(1, '1.jpg', 1),
(2, '2.jpg', 1),
(3, '3.jpg', 1),
(4, '4.jpg', 1),
(5, '5.jpg', 1),
(6, '6.jpg', 1),
(7, '7.jpg', 1),
(8, '8.jpg', 1),
(9, '9.jpg', 1),
(10, '10.jpg', 1),
(11, '11.jpg', 1),
(12, '12.jpg', 1),
(13, '13.jpg', 1),
(14, '14.jpg', 1),
(15, '15.jpg', 1),
(16, '16.jpg', 1),
(17, '17.jpg', 1),
(18, '18.jpg', 1),
(19, '19.jpg', 1),
(20, '20.jpg', 1),
(21, '21.jpg', 1),
(22, '22.jpg', 1),
(23, '23.jpg', 1),
(24, '24.jpg', 1),
(25, '25.jpg', 1),
(26, '26.jpg', 1),
(27, '27.jpg', 1),
(28, '28.jpg', 1),
(29, '29.jpg', 1),
(30, '30.jpg', 1),
(31, '33.jpg', 1),
(32, '34.jpg', 1),
(33, '35.jpg', 1),
(34, '36.jpg', 1),
(35, '37.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id_galeria` int(11) NOT NULL,
  `id_administrador` int(11) NOT NULL,
  `nombre_galeria` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `id_institucion` int(11) NOT NULL,
  `id_administrador` int(11) NOT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `historia` varchar(1000) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `codigo_libro` varchar(45) NOT NULL,
  `codigo_editorial` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `foto` longblob,
  `motivo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_autores`
--

CREATE TABLE `movimiento_autores` (
  `codigo_libro` varchar(45) NOT NULL,
  `codigo_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id_noticia` int(11) NOT NULL,
  `id_administrador` int(11) NOT NULL,
  `descripcion` text,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_noticia`, `id_administrador`, `descripcion`, `estado`) VALUES
(1, 1, '<h1 style="text-align:center"><span style="color:#e74c3c"><em><strong>Ya estamos al servicio de Todos Nuestros Usuarios en Horarios normales de 8:00am a 4:00pm En este nuevo a&ntilde;o deseamos muchos exitos y bendiciones para todos y todas</strong></em></span></h1>\r\n\r\n<p style="text-align:center"><img alt="No hay texto alternativo automático disponible." src="https://scontent-mia3-2.xx.fbcdn.net/v/t1.0-9/26229825_788208391376971_8522902072218836327_n.jpg?oh=ebb3670914b6736a3fbde14c81d6f132&amp;oe=5AEDE727" /></p>\r\n', '1'),
(2, 1, '<p style="text-align:center"><img src="/ckfinder/userfiles/files/image.png" style="height:367px; width:514px" /></p>\r\n', '1'),
(3, 1, '<p style="text-align:center"><img src="/ckfinder/userfiles/files/image(1).png" style="height:368px; width:517px" /></p>\r\n', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE `notificacion` (
  `id_notificacion` int(11) NOT NULL,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`id_notificacion`, `nombre_usuario`, `estado`, `descripcion`) VALUES
(1, 'Boris Ricardo Miranda Ayala', 'PENDIENTE', 'No pues nada, tienen una página espectacular sigan así  :)');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`codigo_autor`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`codigo_editorial`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `fk_eventos_administrador1_idx` (`id_administrador`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `fk_foto_galeria_idx` (`id_administrador`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id_galeria`),
  ADD KEY `fk_galeria_administrador1_idx` (`id_administrador`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id_institucion`),
  ADD KEY `fk_institucion_administrador1_idx` (`id_administrador`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`codigo_libro`),
  ADD KEY `fk_libros_editoriales1_idx` (`codigo_editorial`);

--
-- Indices de la tabla `movimiento_autores`
--
ALTER TABLE `movimiento_autores`
  ADD KEY `fk_libros_has_autores_autores1_idx` (`codigo_autor`),
  ADD KEY `fk_libros_has_autores_libros1_idx` (`codigo_libro`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `fk_noticia_administrador1_idx` (`id_administrador`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`id_notificacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id_galeria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id_institucion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_eventos_administrador1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `fk_foto_admin` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD CONSTRAINT `fk_galeria_administrador1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `fk_institucion_administrador1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_libros_editoriales1` FOREIGN KEY (`codigo_editorial`) REFERENCES `editoriales` (`codigo_editorial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movimiento_autores`
--
ALTER TABLE `movimiento_autores`
  ADD CONSTRAINT `fk_libros_has_autores_autores1` FOREIGN KEY (`codigo_autor`) REFERENCES `autores` (`codigo_autor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_libros_has_autores_libros1` FOREIGN KEY (`codigo_libro`) REFERENCES `libros` (`codigo_libro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk_noticia_administrador1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
