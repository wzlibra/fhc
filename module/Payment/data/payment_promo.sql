-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 01 月 21 日 04:48
-- 服务器版本: 5.5.24-log
-- PHP 版本: 5.3.4
-- --------------------------------------------------------

--
-- 表的结构 `payment_promo`
--

CREATE TABLE `payment_promo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '促销ID',
  `name` varchar(255) NOT NULL COMMENT '促销名称',
  `adapter` enum('alipay','yeepay') NOT NULL COMMENT '充值接口',
  `currency` enum('rmb','qb') NOT NULL COMMENT '货币类型',
  `amount` int(11) NOT NULL COMMENT '默认充值数',
  `formula` text NOT NULL COMMENT '促销计算公式',
  `gold` smallint(6) NOT NULL COMMENT '每单位金币转换率',
  `off` smallint(6) NOT NULL COMMENT '打折，正数1到100',
  `desc` text NOT NULL COMMENT '促销说明',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='促销表';
