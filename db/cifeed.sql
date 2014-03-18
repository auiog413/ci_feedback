/*
Navicat MySQL Data Transfer

Source Server         : auioh413-virtop
Source Server Version : 50535
Source Host           : 10.10.12.123:3306
Source Database       : feedback

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-03-18 13:32:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cifb_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `cifb_sessions`;
CREATE TABLE `cifb_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cifb_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for `feedback_items`
-- ----------------------------
DROP TABLE IF EXISTS `feedback_items`;
CREATE TABLE `feedback_items` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '姓名',
  `title` varchar(128) NOT NULL DEFAULT '' COMMENT '标题',
  `email` varchar(128) NOT NULL DEFAULT '' COMMENT '电子邮箱',
  `phone` varchar(24) NOT NULL DEFAULT '' COMMENT '联系电话',
  `qq` varchar(15) NOT NULL DEFAULT '' COMMENT 'QQ',
  `feed_content` varchar(256) NOT NULL DEFAULT '',
  `attachments` varchar(256) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `datetime` int(10) unsigned NOT NULL,
  `read` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否已读',
  `priority` smallint(4) NOT NULL DEFAULT '1' COMMENT '反馈的重要性分级',
  `vote` varchar(16) NOT NULL,
  `version` varchar(32) NOT NULL,
  `os` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
