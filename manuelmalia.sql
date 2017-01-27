/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : manuelmalia

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-22 16:23:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for extras
-- ----------------------------
DROP TABLE IF EXISTS `extras`;
CREATE TABLE `extras` (
  `id_extras` int(11) NOT NULL,
  `actividad` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_extras`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of extras
-- ----------------------------

-- ----------------------------
-- Table structure for reservas
-- ----------------------------
DROP TABLE IF EXISTS `reservas`;
CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `dinero_reserva` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_vivienda` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_vivienda` (`id_vivienda`),
  CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_vivienda`) REFERENCES `viviendas` (`id_vivienda`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reservas
-- ----------------------------

-- ----------------------------
-- Table structure for reserva_extra
-- ----------------------------
DROP TABLE IF EXISTS `reserva_extra`;
CREATE TABLE `reserva_extra` (
  `id_reserva` int(11) NOT NULL,
  `id_extras` int(11) NOT NULL,
  PRIMARY KEY (`id_reserva`,`id_extras`),
  KEY `id_reserva` (`id_reserva`),
  KEY `id_extras` (`id_extras`),
  CONSTRAINT `reserva_extra_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reservas` (`id_reserva`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `reserva_extra_ibfk_2` FOREIGN KEY (`id_extras`) REFERENCES `extras` (`id_extras`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reserva_extra
-- ----------------------------

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` (`id_usuario`, `dni`, `email`, `rol`, `usuario`, `clave`) VALUES ('0', '44048888R', NULL, 'admin', 'mmalia', 'e10adc3949ba59abbe56e057f20f883e');


-- ----------------------------
-- Table structure for valoracion
-- ----------------------------
DROP TABLE IF EXISTS `valoracion`;
CREATE TABLE `valoracion` (
  `id_valoracion` int(11) DEFAULT NULL,
  `puntuacion` tinyint(4) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `id_vivienda` int(11) DEFAULT NULL,
  KEY `id_vivienda` (`id_vivienda`),
  CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`id_vivienda`) REFERENCES `viviendas` (`id_vivienda`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of valoracion
-- ----------------------------

-- ----------------------------
-- Table structure for viviendas
-- ----------------------------
DROP TABLE IF EXISTS `viviendas`;
CREATE TABLE `viviendas` (
  `id_vivienda` int(11) NOT NULL,
  PRIMARY KEY (`id_vivienda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of viviendas
-- ----------------------------
