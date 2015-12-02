/*
Navicat MySQL Data Transfer

Source Server         : bendi
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : member

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-11-23 16:38:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `if_file` tinyint(2) NOT NULL DEFAULT '0',
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES ('1', '10月20号举行升旗仪式', '呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵', '2015-10-08', '0', '', '1');
INSERT INTO `activity` VALUES ('2', '10月21号升旗仪式结束', '呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵', '2015-10-10', '0', '', '1');
INSERT INTO `activity` VALUES ('3', '10月21号升旗仪式结束', '呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵', '2015-10-10', '0', '', '1');
INSERT INTO `activity` VALUES ('4', '10月21号升旗仪式结束', '呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵', '2015-10-10', '0', '', '1');
INSERT INTO `activity` VALUES ('5', '10月21号升旗仪式结束', '呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵', '2015-10-10', '0', '', '0');
INSERT INTO `activity` VALUES ('6', '10月21号升旗仪式结束', '呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵', '2015-10-10', '0', '', '0');
INSERT INTO `activity` VALUES ('7', '10月21号升旗仪式结束', '呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵呵', '2015-10-10', '0', '', '0');
INSERT INTO `activity` VALUES ('8', '呵呵', '呵呵', '2015-10-09', '1', '财务平台_1030.rar', '1');
INSERT INTO `activity` VALUES ('9', '蔡国庆', '蔡国庆蔡国庆蔡国庆', '2015-10-09', '0', '', '0');
INSERT INTO `activity` VALUES ('10', '测试', '测试', '2015-10-28', '0', '', '0');

-- ----------------------------
-- Table structure for apply
-- ----------------------------
DROP TABLE IF EXISTS `apply`;
CREATE TABLE `apply` (
  `apply_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '报名ID',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `activity_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '活动ID',
  PRIMARY KEY (`apply_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='报名表';

-- ----------------------------
-- Records of apply
-- ----------------------------
INSERT INTO `apply` VALUES ('1', '1', '1');
INSERT INTO `apply` VALUES ('2', '1', '2');
INSERT INTO `apply` VALUES ('3', '1', '7');
INSERT INTO `apply` VALUES ('4', '1', '6');
INSERT INTO `apply` VALUES ('5', '1', '8');
INSERT INTO `apply` VALUES ('6', '1', '4');
INSERT INTO `apply` VALUES ('7', '2', '7');
INSERT INTO `apply` VALUES ('8', '2', '8');
INSERT INTO `apply` VALUES ('9', '2', '5');
INSERT INTO `apply` VALUES ('10', '2', '4');
INSERT INTO `apply` VALUES ('11', '2', '6');
INSERT INTO `apply` VALUES ('12', '2', '3');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `question` varchar(50) CHARACTER SET utf8 NOT NULL,
  `answer` varchar(50) CHARACTER SET utf8 NOT NULL,
  `realname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sex` int(2) NOT NULL,
  `address` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mobile` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`uid`,`address`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '菜菜', 'e10adc3949ba59abbe56e057f20f883e', '你小学的名称是', '湄洲岛小学', '蔡国庆', '1', '北京交通大学', '18511862159', 'pianweiwan0413@163.com');
INSERT INTO `user` VALUES ('2', '蔡国庆', '0722de47bfdb6fe3174ffa824d6470ef', '你小学的学校名', '北关小学', '蔡国庆', '1', '北京交通大学', '18810296036', 'caiguoqing63631@163.com');
