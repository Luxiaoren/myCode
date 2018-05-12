/*
Navicat MySQL Data Transfer

Source Server         : test
Source Server Version : 50537
Source Host           : localhost:3306
Source Database       : basefile

Target Server Type    : MYSQL
Target Server Version : 50537
File Encoding         : 65001

Date: 2018-05-08 22:35:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for baseinfo
-- ----------------------------
DROP TABLE IF EXISTS `baseinfo`;
CREATE TABLE `baseinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `班级名称` varchar(255) DEFAULT NULL,
  `所属专业` varchar(255) DEFAULT NULL,
  `所属学院` varchar(255) DEFAULT NULL,
  `人数` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baseinfo
-- ----------------------------
INSERT INTO `baseinfo` VALUES ('1', '计科1401', '计算机科学与技术', '电子与信息工程', '60');
INSERT INTO `baseinfo` VALUES ('2', '计科1402', '计算机科学与技术', '电子与信息工程', '60');

-- ----------------------------
-- Table structure for people
-- ----------------------------
DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `classid` int(50) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `job` varchar(50) DEFAULT NULL,
  `infotype` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=403 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of people
-- ----------------------------
INSERT INTO `people` VALUES ('101', '1', '张兴泽', '辅导员', '教师信息');
INSERT INTO `people` VALUES ('102', '1', '李天', 'c程序设计', '教师信息');
INSERT INTO `people` VALUES ('103', '1', '张全', '操作系统', '教师信息');
INSERT INTO `people` VALUES ('104', '1', '李洋', '数据库', '教师信息');
INSERT INTO `people` VALUES ('105', '1', '李浩', '编译原理', '教师信息');
INSERT INTO `people` VALUES ('106', '1', '刘翔', 'java程序设计', '教师信息');
INSERT INTO `people` VALUES ('107', '1', '刘达', 'java程序设计', '教师信息');
INSERT INTO `people` VALUES ('108', '1', '刘郝荣', '班长', '班委信息');
INSERT INTO `people` VALUES ('109', '1', '顾正文', '副班长', '班委信息');
INSERT INTO `people` VALUES ('110', '1', '李想', '团支书', '班委信息');
INSERT INTO `people` VALUES ('111', '1', '李洋', '学习委员', '班委信息');
INSERT INTO `people` VALUES ('112', '1', '李昊宇', '体育委员', '班委信息');
INSERT INTO `people` VALUES ('113', '1', '刘梅', '生活委员', '班委信息');
INSERT INTO `people` VALUES ('114', '1', '刘能', '文娱委员', '班委信息');
INSERT INTO `people` VALUES ('201', '2', '张兴泽', '辅导员', '教师信息');
INSERT INTO `people` VALUES ('202', '2', '李天', 'c程序设计', '教师信息');
INSERT INTO `people` VALUES ('203', '2', '张全', '操作系统', '教师信息');
INSERT INTO `people` VALUES ('204', '2', '李洋', '数据库', '教师信息');
INSERT INTO `people` VALUES ('205', '2', '李浩', '编译原理', '教师信息');
INSERT INTO `people` VALUES ('206', '2', '刘翔', 'java程序设计', '教师信息');
INSERT INTO `people` VALUES ('207', '2', '刘达', 'java程序设计', '教师信息');
INSERT INTO `people` VALUES ('208', '2', '刘郝荣', '班长', '班委信息');
INSERT INTO `people` VALUES ('209', '2', '顾正文', '副班长', '班委信息');
INSERT INTO `people` VALUES ('210', '2', '李想', '团支书', '班委信息');
INSERT INTO `people` VALUES ('211', '2', '李洋', '学习委员', '班委信息');
INSERT INTO `people` VALUES ('212', '2', '李昊宇', '体育委员', '班委信息');
INSERT INTO `people` VALUES ('213', '2', '刘梅', '生活委员', '班委信息');
INSERT INTO `people` VALUES ('214', '2', '刘能', '文娱委员发撒旦法', '班委信息');
