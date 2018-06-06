-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-09-29 16:28:56
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tytx`
--

-- --------------------------------------------------------

--
-- 表的结构 `tytx_admin`
--

CREATE TABLE IF NOT EXISTS `tytx_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tenantCode` varchar(30) NOT NULL COMMENT '企业编号',
  `agentName` varchar(30) NOT NULL COMMENT '员工编号',
  `password` varchar(32) NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `tytx_admin`
--

INSERT INTO `tytx_admin` (`id`, `tenantCode`, `agentName`, `password`) VALUES
(1, 'root', '123', '2a579fc49504c9a78eb59b018608eee2'),
(2, '123', '444', '2a579fc49504c9a78eb59b018608eee2'),
(3, '123123', '', 'lunhui'),
(4, 'NJ201625362', '', 'lunhui'),
(5, '1234', '1234', '2a579fc49504c9a78eb59b018608eee2');

-- --------------------------------------------------------

--
-- 表的结构 `tytx_admin_role`
--

CREATE TABLE IF NOT EXISTS `tytx_admin_role` (
  `admin_id` int(11) NOT NULL COMMENT '管理员的ID',
  `role_id` int(11) NOT NULL COMMENT '角色的ID',
  KEY `admin_id` (`admin_id`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员角色表';

--
-- 转存表中的数据 `tytx_admin_role`
--

INSERT INTO `tytx_admin_role` (`admin_id`, `role_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tytx_calllog`
--

CREATE TABLE IF NOT EXISTS `tytx_calllog` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '通话记录ID',
  `calltime` int(32) NOT NULL COMMENT '呼叫时间/拨打时间',
  `callnum` varchar(32) NOT NULL COMMENT '主叫号码',
  `callednum` varchar(32) NOT NULL COMMENT '被叫号码/联系号码',
  `answertime` int(32) NOT NULL COMMENT '接听时间',
  `endtime` int(32) NOT NULL COMMENT '结束时间',
  `talktime` int(11) NOT NULL COMMENT '通话时长 单位：为秒',
  `telfare` double NOT NULL COMMENT '话费(元)',
  `tablename` varchar(32) NOT NULL COMMENT '坐席名称',
  `callmode` int(11) NOT NULL DEFAULT '1' COMMENT '呼叫方式 1-呼出  2-呼入默认为1',
  `calltype` int(11) NOT NULL DEFAULT '1' COMMENT '外呼类型  1-任务 2-手动 默认为1-任务',
  `recordsrc` varchar(128) NOT NULL COMMENT '录音路径',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='通话记录表' AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `tytx_calllog`
--

INSERT INTO `tytx_calllog` (`id`, `calltime`, `callnum`, `callednum`, `answertime`, `endtime`, `talktime`, `telfare`, `tablename`, `callmode`, `calltype`, `recordsrc`) VALUES
(1, 1473807704, '15366123165', '13851666417', 0, 0, 0, 1, '卢莹', 2, 2, '2016-09-24/57e6871d76b7e.mp3'),
(2, 1473816447, '15366123165', '18912974709', 0, 0, 57613, 123, 'wang', 2, 2, '2016-09-24/57e68754d9040.mp3'),
(3, 1441758770, '15251700187', '110', 0, 0, 33, 1.89, '校花', 1, 1, '2016-09-24/57e6870f7fa13.mp3'),
(4, 1473739200, '15251700187', '18912974709', 0, 0, 12, 1, '123', 1, 1, '2016-09-24/57e68b5d2c902.mp3'),
(5, 1470888000, '110', '13851666417', 0, 0, 0, 34, '34', 1, 2, ''),
(6, 1473048000, '', '110', 0, 0, 1, 1, '1', 1, 1, ''),
(7, 1469937600, '12', '18912974709', 0, 0, 44, 123, '卢莹', 2, 1, '2016-09-24/57e68fb1231d8.mp3'),
(8, 1474776000, '', '110', 2016, 2016, 23, 1.89, '校花', 1, 1, ''),
(9, 1474776012, '444434', '666', 1473652800, 1475899200, 145, 8.88, 'rrr', 2, 2, '2016-09-27/57ea5f0a4d001.mp3'),
(10, 1473393600, '110', '110', 1474776000, 1475899200, 34, 9.99, '1', 1, 1, ''),
(11, 1474084630, '018795832209', '018795832209', 1474084649, 1474084664, 15, 0, 'emp1005', 1, 1, '02d2c36c-2a38-4bec-bf66-b1c632531d5c.mp3'),
(12, 1474084630, '018795832209', '018795832209', 1474084649, 1474084664, 15, 0, 'emp1005', 1, 1, '02d2c36c-2a38-4bec-bf66-b1c632531d5c.mp3'),
(13, 1472011200, '15366123165', '110', 1474776000, 1474776000, 12, 1.89, '1', 1, 1, ''),
(14, 1474689600, '110', '110', 1474776000, 1474948800, 12, 6.66, '1', 2, 1, ''),
(15, 1474689420, '555', '555', 1474776000, 1474776000, 32, 1.88, 'ttt', 1, 2, ''),
(16, 1474776000, '1', '1', 1474776000, 1474776000, 1, 1, '1', 1, 1, '2016-09-27/57ea5f28d282e.mp3'),
(17, 1474257600, '1196', '1196', 1474776000, 1474776000, 56, 13, 'wang', 2, 1, ''),
(18, 1474948800, '66664', '666', 1474948800, 1474948800, 34, 1.9, '666', 1, 2, '2016-09-27/57ea4f8db02ee.mp3'),
(19, 1474084630, '018795832209', '018795832209', 1474084649, 1474084664, 15, 0, 'emp1005', 1, 1, '02d2c36c-2a38-4bec-bf66-b1c632531d5c.mp3'),
(20, 1475121600, '12', '12', 1475121600, 1475121600, 45, 5.22, '6', 1, 2, '2016-09-29/57ec83e9089ff.mp3'),
(21, 1475119200, '15251700187', '13851666417', 1475085600, 1475172000, 64, 1, '5', 1, 1, '2016-09-29/57ed1d2d11041.mp3');

-- --------------------------------------------------------

--
-- 表的结构 `tytx_privilege`
--

CREATE TABLE IF NOT EXISTS `tytx_privilege` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pri_name` varchar(30) NOT NULL COMMENT '权限名称',
  `module_name` varchar(20) NOT NULL COMMENT '模块名称',
  `controller_name` varchar(20) NOT NULL COMMENT '控制器名称',
  `action_name` varchar(20) NOT NULL COMMENT '方法名称',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级权限的ID: 0：代表顶级权限',
  `icon` varchar(128) NOT NULL COMMENT '图标',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='权限表' AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `tytx_privilege`
--

INSERT INTO `tytx_privilege` (`id`, `pri_name`, `module_name`, `controller_name`, `action_name`, `parent_id`, `icon`) VALUES
(1, '系统管理', 'null', 'null', 'null', 0, 'menu-icon fa fa-gear'),
(2, '呼叫管理', 'null', 'null', 'null', 0, 'menu-icon fa fa-phone'),
(3, '外拨管理', '', '', '', 0, 'menu-icon fa fa-volume-control-phone'),
(4, '报表管理', '', '', '', 0, 'menu-icon fa fa-list'),
(5, '监控管理', '', '', '', 0, 'menu-icon fa fa-desktop'),
(6, '业务管理', '', '', '', 0, 'menu-icon fa fa-briefcase'),
(7, 'IVR管理', '', '', '', 0, 'menu-icon fa fa-ivr'),
(8, '客户管理', '', '', '', 0, 'menu-icon fa fa fa-users'),
(9, '用户管理', 'Home', 'UserAdmin', 'users', 1, ''),
(10, '号码管理', 'Home', 'NumAdmin', 'numbers', 1, ''),
(11, '角色管理', 'Home', 'RoleAdmin', 'roles', 1, ''),
(12, '坐席组管理', 'Home', 'QueryAdmin', 'query', 1, ''),
(13, '拓展字段', 'Home', 'FieldsAdmin', 'customFields', 1, ''),
(14, '交易明细', 'Home', 'DetailAdmin', 'detail', 1, ''),
(15, '通话记录', 'Home', 'Go', 'showInfo', 2, ''),
(16, '联络记录', 'Home', 'Yes', 'contact_histories', 2, ''),
(17, '未接来电', 'Home', 'No', 'cdrlnboundFails', 2, ''),
(18, '打包历史', 'Home', 'Bag', 'zipLogs', 2, ''),
(19, '外拨任务', 'Home', 'CampgainsAdmin', 'campaigns', 3, ''),
(20, '外拨报表', 'Home', 'ReportAdmin', 'report', 3, ''),
(21, '呼损明细', 'Home', 'Detail1Admin', 'detail1', 3, ''),
(22, '坐席统计', 'Home', 'AgentAdmin', 'agentDailyStatistics', 4, ''),
(23, '联络结果统计', 'Home', 'StaAdmin', 'statistics', 4, ''),
(24, '坐席监控', 'Home', 'MonitorAdmin', 'monitor', 5, ''),
(25, '待办事项', 'Home', 'ToDoListsAdmin', 'todolists', 6, ''),
(26, '公告管理', 'Home', 'AnnounceAdmin', 'announcements', 6, ''),
(27, '语音库管理', 'Home', 'SpeehsAdmin', 'speehs', 7, ''),
(28, 'IVR设置', 'Home', 'IvrManagementAdmin', 'ivrManagement', 7, ''),
(29, 'IVR时间策略', 'Home', 'TimeIntervlasAdmin', 'time_intervals', 7, ''),
(30, '所有客户', 'Home', 'ClientsAdmin', 'allCients', 8, ''),
(31, '公海客户', 'Home', 'ClientsAdmin', 'publicClients', 8, ''),
(32, '组内客户', 'Home', 'ClientsAdmin', 'InnerClients', 8, ''),
(33, '我的客户', 'Home', 'ClientsAdmin', 'myClients', 8, ''),
(36, '导出CSV文件', 'Home', 'Go', 'output', 15, ''),
(35, '添加数据', 'Home', 'Go', 'add', 15, ''),
(37, '修改数据', 'Home', 'Go', 'edit', 15, ''),
(38, '导入CSV', 'Home', 'Go', 'inputCsv', 15, ''),
(39, '下载Mp3', 'Home', 'Go', 'downmp3', 15, '');

-- --------------------------------------------------------

--
-- 表的结构 `tytx_role`
--

CREATE TABLE IF NOT EXISTS `tytx_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(30) NOT NULL COMMENT '角色名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='角色表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tytx_role`
--

INSERT INTO `tytx_role` (`id`, `role_name`) VALUES
(1, '管理员');

-- --------------------------------------------------------

--
-- 表的结构 `tytx_role_privilege`
--

CREATE TABLE IF NOT EXISTS `tytx_role_privilege` (
  `pri_id` int(11) NOT NULL COMMENT '权限ID',
  `role_id` smallint(5) unsigned NOT NULL COMMENT '角色的id',
  KEY `pri_id` (`pri_id`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='角色权限表';

--
-- 转存表中的数据 `tytx_role_privilege`
--

INSERT INTO `tytx_role_privilege` (`pri_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
