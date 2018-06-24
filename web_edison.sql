/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50716
Source Host           : 192.168.0.105:3306
Source Database       : web_edison

Target Server Type    : MYSQL
Target Server Version : 50716
File Encoding         : 65001

Date: 2017-03-13 17:26:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for destacados
-- ----------------------------
DROP TABLE IF EXISTS `destacados`;
CREATE TABLE `destacados` (
  `id_destacado` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) NOT NULL,
  `estado` int(1) DEFAULT '0',
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` double(11,4) DEFAULT '0.0000',
  PRIMARY KEY (`id_destacado`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
