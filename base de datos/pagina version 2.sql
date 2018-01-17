/*
Navicat MySQL Data Transfer

Source Server         : My Sql
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : pagina

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-01-16 21:24:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administrador
-- ----------------------------
DROP TABLE IF EXISTS `administrador`;
CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_administrador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of administrador
-- ----------------------------
INSERT INTO `administrador` VALUES ('1', 'bubba', '$2y$10$xC2qfFYxPbsLPtyNjO/rHuahk6Mc20G3sY3OaJxmvbI8asoQHAgg6');

-- ----------------------------
-- Table structure for autores
-- ----------------------------
DROP TABLE IF EXISTS `autores`;
CREATE TABLE `autores` (
  `codigo_autor` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `apellido` varchar(25) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `biografia` text,
  PRIMARY KEY (`codigo_autor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of autores
-- ----------------------------

-- ----------------------------
-- Table structure for editoriales
-- ----------------------------
DROP TABLE IF EXISTS `editoriales`;
CREATE TABLE `editoriales` (
  `codigo_editorial` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `pais` varchar(10) DEFAULT NULL,
  `email` varchar(15) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`codigo_editorial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of editoriales
-- ----------------------------

-- ----------------------------
-- Table structure for eventos
-- ----------------------------
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `id_administrador` int(11) NOT NULL,
  `descripcion_evento` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `fk_eventos_administrador1_idx` (`id_administrador`),
  CONSTRAINT `fk_eventos_administrador1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of eventos
-- ----------------------------

-- ----------------------------
-- Table structure for foto
-- ----------------------------
DROP TABLE IF EXISTS `foto`;
CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(45) DEFAULT NULL,
  `id_administrador` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `fk_foto_galeria_idx` (`id_administrador`),
  CONSTRAINT `fk_foto_admin` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of foto
-- ----------------------------
INSERT INTO `foto` VALUES ('3', 'Espino20001.jpg', '1');

-- ----------------------------
-- Table structure for galeria
-- ----------------------------
DROP TABLE IF EXISTS `galeria`;
CREATE TABLE `galeria` (
  `id_galeria` int(11) NOT NULL AUTO_INCREMENT,
  `id_administrador` int(11) NOT NULL,
  `nombre_galeria` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_galeria`),
  KEY `fk_galeria_administrador1_idx` (`id_administrador`),
  CONSTRAINT `fk_galeria_administrador1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of galeria
-- ----------------------------

-- ----------------------------
-- Table structure for institucion
-- ----------------------------
DROP TABLE IF EXISTS `institucion`;
CREATE TABLE `institucion` (
  `id_institucion` int(11) NOT NULL AUTO_INCREMENT,
  `id_administrador` int(11) NOT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `facebook` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `historia` varchar(1000) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_institucion`),
  KEY `fk_institucion_administrador1_idx` (`id_administrador`),
  CONSTRAINT `fk_institucion_administrador1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of institucion
-- ----------------------------

-- ----------------------------
-- Table structure for libros
-- ----------------------------
DROP TABLE IF EXISTS `libros`;
CREATE TABLE `libros` (
  `codigo_libro` varchar(45) NOT NULL,
  `codigo_editorial` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  `fecha_publicacion` date DEFAULT NULL,
  `foto` longblob,
  `motivo` text,
  PRIMARY KEY (`codigo_libro`),
  KEY `fk_libros_editoriales1_idx` (`codigo_editorial`),
  CONSTRAINT `fk_libros_editoriales1` FOREIGN KEY (`codigo_editorial`) REFERENCES `editoriales` (`codigo_editorial`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of libros
-- ----------------------------

-- ----------------------------
-- Table structure for movimiento_autores
-- ----------------------------
DROP TABLE IF EXISTS `movimiento_autores`;
CREATE TABLE `movimiento_autores` (
  `codigo_libro` varchar(45) NOT NULL,
  `codigo_autor` int(11) NOT NULL,
  KEY `fk_libros_has_autores_autores1_idx` (`codigo_autor`),
  KEY `fk_libros_has_autores_libros1_idx` (`codigo_libro`),
  CONSTRAINT `fk_libros_has_autores_autores1` FOREIGN KEY (`codigo_autor`) REFERENCES `autores` (`codigo_autor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_libros_has_autores_libros1` FOREIGN KEY (`codigo_libro`) REFERENCES `libros` (`codigo_libro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of movimiento_autores
-- ----------------------------

-- ----------------------------
-- Table structure for noticia
-- ----------------------------
DROP TABLE IF EXISTS `noticia`;
CREATE TABLE `noticia` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `id_administrador` int(11) NOT NULL,
  `descripcion` varchar(2000) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_noticia`),
  KEY `fk_noticia_administrador1_idx` (`id_administrador`),
  CONSTRAINT `fk_noticia_administrador1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of noticia
-- ----------------------------
INSERT INTO `noticia` VALUES ('3', '1', null, null);
INSERT INTO `noticia` VALUES ('4', '1', null, null);
INSERT INTO `noticia` VALUES ('5', '1', '<p><img alt=\"\" src=\"/ckfinder/userfiles/files/00.jpg\" style=\"height:900px; width:1600px\" /></p>\r\n', '1');
INSERT INTO `noticia` VALUES ('6', '1', '<p>Este es un ejemplo de noticia de algun tipo</p>\r\n', '1');

-- ----------------------------
-- Table structure for notificacion
-- ----------------------------
DROP TABLE IF EXISTS `notificacion`;
CREATE TABLE `notificacion` (
  `id_notificacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id_notificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notificacion
-- ----------------------------
