/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : yii2_basic

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-02-08 20:20:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cars
-- ----------------------------
DROP TABLE IF EXISTS `cars`;
CREATE TABLE `cars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รายการ',
  `price` int(11) NOT NULL COMMENT 'จำนวนเงิน',
  `date_st` date DEFAULT NULL COMMENT 'วันที่',
  `description` text COLLATE utf8_unicode_ci COMMENT 'รายละเอียด',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cars
-- ----------------------------
INSERT INTO `cars` VALUES ('2', 'ค่าซ่อมรถ', '600', '2018-02-07', 'ปะยางรถ\r\n');
INSERT INTO `cars` VALUES ('5', 'เปลี่ยนน้ำมันเครื่อง', '1200', '2018-02-08', 'น้ำมันเครื่อง+กรอง');

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(13) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หมายเลขบัตรประชาชน',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `address` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ที่อยู่',
  `tel` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `wage` int(10) NOT NULL COMMENT 'ค่าจ้าง',
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'วัน/เดือน',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES ('2', '8658273543269', 'นายกไก่', 'เลย', '0844556777', '350', 'วัน');
INSERT INTO `employees` VALUES ('3', '3225117187825', 'นายขไข่', 'เลย', '0596857684', '350', 'วัน');
INSERT INTO `employees` VALUES ('4', '1447046465449', 'นายค', 'ขอนแก่น', '0838475947', '350', 'วัน');

-- ----------------------------
-- Table structure for employeewages
-- ----------------------------
DROP TABLE IF EXISTS `employeewages`;
CREATE TABLE `employeewages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL COMMENT 'รหัสพนักงาน',
  `emp_price` int(11) NOT NULL COMMENT 'จำนวนเงิน',
  `date_st` date DEFAULT NULL COMMENT 'จากวันที่',
  `date_en` date DEFAULT NULL COMMENT 'ถึงวันที่',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of employeewages
-- ----------------------------
INSERT INTO `employeewages` VALUES ('2', '3', '600', '2018-02-07', '2018-02-08');

-- ----------------------------
-- Table structure for fruitprices
-- ----------------------------
DROP TABLE IF EXISTS `fruitprices`;
CREATE TABLE `fruitprices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fruit_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อผลไม้',
  `fruit_buy` int(10) NOT NULL COMMENT 'ราคารับซื้อ',
  `fruit_unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'หน่วย',
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of fruitprices
-- ----------------------------
INSERT INTO `fruitprices` VALUES ('1', 'มะขาม', '20', 'กิโลกรัม', '2018-02-07 15:47:31');
INSERT INTO `fruitprices` VALUES ('3', 'กล้วย', '10', 'กิโลกรัม', '2018-02-07 15:48:19');

-- ----------------------------
-- Table structure for fruits
-- ----------------------------
DROP TABLE IF EXISTS `fruits`;
CREATE TABLE `fruits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fruit_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fruit_amount` int(10) DEFAULT NULL,
  `fruit_unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fruit_price` decimal(10,0) DEFAULT NULL,
  `fruit_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of fruits
-- ----------------------------
INSERT INTO `fruits` VALUES ('4', 'มะขาม', '100', 'กิโลกรัม', '5000', '2018-02-06 14:08:33');

-- ----------------------------
-- Table structure for profiles
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `user_id` bigint(20) NOT NULL,
  `fname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sex` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `tel` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of profiles
-- ----------------------------
INSERT INTO `profiles` VALUES ('1517887596904', 'admin', 'admin', '1', 'Loei', '0983784755');
INSERT INTO `profiles` VALUES ('1517888078257', 'admin2', 'admin2', '1', 'Loei', '9876543456');
INSERT INTO `profiles` VALUES ('1517888419400', 'admin3', 'admin3', '1', 'Loei', '0987654323');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `role_description` text CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', 'admin');
INSERT INTO `roles` VALUES ('2', 'user', 'user');

-- ----------------------------
-- Table structure for transports
-- ----------------------------
DROP TABLE IF EXISTS `transports`;
CREATE TABLE `transports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `list` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รายการ',
  `price` int(11) NOT NULL COMMENT 'จำนวนเงิน',
  `date_st` date DEFAULT NULL COMMENT 'วันที่',
  `description` text COLLATE utf8_unicode_ci COMMENT 'รายละเอียด',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of transports
-- ----------------------------
INSERT INTO `transports` VALUES ('2', 'เติมน้ำมัน', '600', '2018-02-08', '- เติมน้ำมัน\r\n- เติมลมรถ\r\n');
INSERT INTO `transports` VALUES ('5', 'เปลี่ยนน้ำมันเครื่อง', '1200', '2018-02-08', 'น้ำมันเครื่อง+กรอง');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `username` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `role` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_icelandic_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1517887596904', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2018-02-06 10:26:36', '1', '2018-02-08 09:58:33');
INSERT INTO `users` VALUES ('1517888078257', 'admin2@gmail.com', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', '2018-02-06 10:34:38', '1', null);
INSERT INTO `users` VALUES ('1517888419400', 'admin3@gmail.com', 'admin3', 'e10adc3949ba59abbe56e057f20f883e', '2018-02-06 10:40:19', '1', null);
