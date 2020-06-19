/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50645
Source Host           : localhost:3306
Source Database       : menkou

Target Server Type    : MYSQL
Target Server Version : 50645
File Encoding         : 65001

Date: 2020-06-19 19:33:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `open_id` varchar(200) DEFAULT NULL COMMENT '微信id',
  `nick_name` varchar(100) DEFAULT NULL COMMENT '微信昵称',
  `avatar_url` varchar(200) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL COMMENT '微信号',
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `state` tinyint(1) DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `is_update_info` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'o42_as1P8JpeN_LWsF_If9Vzuk1c', '', '', '', '', '', '', '0', '2020-06-19 19:22:34', null, '0');

-- ----------------------------
-- Table structure for `member_token`
-- ----------------------------
DROP TABLE IF EXISTS `member_token`;
CREATE TABLE `member_token` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `member_id` int(11) NOT NULL COMMENT '用户id',
  `token` varchar(32) DEFAULT NULL COMMENT '登录token',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `client_type` varchar(50) DEFAULT NULL COMMENT '终端类型',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户登录令牌';

-- ----------------------------
-- Records of member_token
-- ----------------------------
INSERT INTO `member_token` VALUES ('1', '1', '7fd06bd69fac2b52643f467c2d797e9f', '2020-06-19 19:22:34', '');
INSERT INTO `member_token` VALUES ('2', '1', '4943ddc6f436400b8343a9f0bc5dfd5b', '2020-06-19 19:22:34', '');
