-- phpMyAdmin SQL Dump
-- http://www.phpmyadmin.net
--
-- 生成日期: 2016 年 05 月 26 日 14:33

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `mcsWciIAisBsZrjvfxXs`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_admin`
--

CREATE TABLE IF NOT EXISTS `tp_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `regtime` varchar(200) DEFAULT NULL,
  `logintime` varchar(200) DEFAULT NULL,
  `root` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `tp_admin`
--

INSERT INTO `tp_admin` (`id`, `username`, `password`, `regtime`, `logintime`, `root`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1461863546', '1464061114', '1'),
(4, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '1464079105', '1464079135', '0');

-- --------------------------------------------------------

--
-- 表的结构 `tp_cache`
--

CREATE TABLE IF NOT EXISTS `tp_cache` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `access_token` varchar(255) NOT NULL,
  `jsapi_ticket` varchar(255) NOT NULL,
  `expire_time` varchar(255) NOT NULL,
  `ticket_time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tp_cache`
--

INSERT INTO `tp_cache` (`id`, `access_token`, `jsapi_ticket`, `expire_time`, `ticket_time`) VALUES
(1, 'm4n5n0ZnnNJddskkedmVqpANU_XEAwrZSlMktbU82_OAw3detGR-wo-ErdTk7IhHtdjp0ty26WHvr9l32r7svqs04HSnACv_21T5Bfkbo9M8eC5uYOmJZvGGmfToVEOyEAMdAFAHDP', 'kgt8ON7yVITDhtdwci0qeZn8FnVB0aG68JqwG3RFnmfZlWXdjEogwWOp9lbuJZPVu27w_eG9GSXdN5sdcaaGww', '1464249205', '1464249205');

-- --------------------------------------------------------

--
-- 表的结构 `tp_config`
--

CREATE TABLE IF NOT EXISTS `tp_config` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `votetitle` varchar(255) NOT NULL,
  `bmstarttime` varchar(200) NOT NULL,
  `bmendtime` varchar(200) NOT NULL,
  `votestarttime` varchar(200) NOT NULL,
  `voteendtime` varchar(200) NOT NULL,
  `pagetitle` varchar(200) NOT NULL,
  `pagedec` varchar(200) NOT NULL,
  `activeabout` text NOT NULL,
  `canyu` text NOT NULL,
  `flow` text NOT NULL,
  `prize` text NOT NULL,
  `voting` text NOT NULL,
  `tel` varchar(200) NOT NULL,
  `visits` varchar(200) NOT NULL,
  `iptimes` varchar(20) NOT NULL,
  `everydayvote` varchar(20) NOT NULL,
  `isverify` varchar(20) NOT NULL,
  `isfollow` varchar(20) NOT NULL,
  `ipaddress` varchar(200) NOT NULL,
  `isshowdes` varchar(5) NOT NULL,
  `isshowcanyu` varchar(5) NOT NULL,
  `isshowflow` varchar(5) NOT NULL,
  `isshowprice` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tp_config`
--

INSERT INTO `tp_config` (`id`, `votetitle`, `bmstarttime`, `bmendtime`, `votestarttime`, `voteendtime`, `pagetitle`, `pagedec`, `activeabout`, `canyu`, `flow`, `prize`, `voting`, `tel`, `visits`, `iptimes`, `everydayvote`, `isverify`, `isfollow`, `ipaddress`, `isshowdes`, `isshowcanyu`, `isshowflow`, `isshowprice`) VALUES
(1, '微信高级投票', '2016-4-20', '2017-4-25', '2016-4-20', '2017-5-30', '快来投票啊', '快来投票啊', '<p>家有萌宝怎么爱都嫌不多，秀出你家萌宝照片，周周有奖，人气最高的12强更有独家制作的专属挂历，成为名副其实的小明星哦！\r\n本活动由微信主办，解释全归微信所有。</p>', '<p>参与对象：0-7岁<br/>报名时间：10月15日-10月31日<br/>通过微信报名：关注微信，微信号xxxxxx<br/>发送&quot;姓名+性别+年龄+联系方式+3-4张萌照&quot;<br/>主办：xxxxxxxxxxxxxxxx</p>', '<p>1、10月15日活动正式启动，接收参赛报名，收集宝贝信息；<br/>2、10月18日-10月24日下午5点，海选第一周：接收报名的同时开通投票，10月25日公布本周20强；<br/>3、10月25日-10月31日下午5点，海选第二周：接收报名的同时开通投票，11月1日公布本周20强，投票清零；<br/>4、11月1日-11月7日下午5点，海选进50强评选：接收报名的同时开通投票 11月8日公布50强名单，投票清零； <br/>5、11月9日-11月14日下午5点，评选一、二、三等奖 11月15日公布奖项； <br/>6、活动后续：颁奖、拍摄2015年 &nbsp;挂历。</p>', '<p>1、一等奖（1名）：1000元现金+奔驰儿童电动车+美国舒达5110元床垫+价值580元吉他+教程+价值1880摄影券+挂历+证书；<br/>2、二等奖（2名）：500元现金+儿童自行车+美国舒达980元蜘蛛侠四件套床上用品+价值380元吉他+教程+价值980摄影券+挂历+证书；<br/>3、三等奖（3名）：300元现金+儿童滑板车+美国舒达580元安睡枕+价值280元吉他+教程+价值488摄影券+挂历+证书；<br/>4、前50强：社区君限量版公仔+饮品一提；<br/>5、周人气奖（40名）：毛绒玩具一只；<br/>6、投票幸运奖（30名）：社区君限量版公仔一个<br/>7、最佳盟主奖（3名）：289元的儿童早教故事机<br/>8、参与幸运奖（1000名）：儿童文具礼盒、毛绒玩具、米奇公仔等</p>', '', '13111111111', '6227', '10', '0', '', '0', '', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- 表的结构 `tp_imgcarous`
--

CREATE TABLE IF NOT EXISTS `tp_imgcarous` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `photo` varchar(200) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tp_imgcarous`
--

INSERT INTO `tp_imgcarous` (`id`, `photo`, `url`, `title`) VALUES
(1, '5729591fb7475.jpg', '#', '大牌范儿'),
(2, '572959c8a402a.jpg', '#', '原创文艺系列'),
(3, '572959dc446a3.jpg', '#', '简约FACE风');

-- --------------------------------------------------------

--
-- 表的结构 `tp_price`
--

CREATE TABLE IF NOT EXISTS `tp_price` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) NOT NULL,
  `thankinfo` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `info1` varchar(255) NOT NULL,
  `info2` varchar(255) NOT NULL,
  `info3` varchar(255) NOT NULL,
  `info4` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tp_price`
--

INSERT INTO `tp_price` (`id`, `company`, `thankinfo`, `price`, `info1`, `info2`, `info3`, `info4`) VALUES
(1, '杭州爱你宝贝儿童摄影', '感谢您的投票', '100元现金红包一个', '您需要的酒店最新折扣优惠信息', '花海阁超值新婚大礼包', '实时酒店结婚档期查询', '婚宴顾问免费一对一贴心服务');

-- --------------------------------------------------------

--
-- 表的结构 `tp_share`
--

CREATE TABLE IF NOT EXISTS `tp_share` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `shareimg` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tp_share`
--

INSERT INTO `tp_share` (`id`, `title`, `des`, `shareimg`) VALUES
(1, '微信活动-萌娃评选活动分享', '微信活动-萌娃评选活动分享', 'http://cdn.weiai.owl-go.com/uploads/img/371462498796_90178.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `tp_signup`
--

CREATE TABLE IF NOT EXISTS `tp_signup` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `qq` varchar(200) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `thumb` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `vote` int(10) NOT NULL,
  `visits` varchar(200) NOT NULL,
  `introduce` text,
  `tel` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `tp_signup`
--

INSERT INTO `tp_signup` (`id`, `title`, `qq`, `sex`, `photo`, `thumb`, `time`, `vote`, `visits`, `introduce`, `tel`) VALUES
(5, '明明', '11223366', '1', '572862ec36e25.jpg', 'thumb_572862ec36e25.jpg', '1462264556', 38, '146', '我叫小明！', '15836366363'),
(6, '露西', '963852741', '0', '572864b59e02c.jpg', 'thumb_572864b59e02c.jpg', '1462265013', 89, '115', 'hi 我是露西', '15865656565'),
(7, '李雷', '467845345', '1', '572868c04a10a.jpg', 'thumb_572868c04a10a.jpg', '1462266048', 43, '129', '你好啊！', '15278653256'),
(8, '嘻嘻', '9654321', '0', '572ab0a5309f0.jpg', 'thumb_572ab0a5309f0.jpg', '1462415525', 3, '32', '嘻嘻', '15756326532'),
(9, '李雷', '89653214', '1', '572adade8e18e.jpg', 'thumb_572adade8e18e.jpg', '1462426334', 16, '21', '嗨 你们好', '15632344589'),
(14, '沈智鹏', '764917372', '1', '5742a99068275.gif', 'thumb_5742a99068275.gif', '1463986576', 1, '17', '开心每一天', '18621507450');

-- --------------------------------------------------------

--
-- 表的结构 `tp_user`
--

CREATE TABLE IF NOT EXISTS `tp_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `tel` varchar(200) DEFAULT NULL,
  `qq` varchar(200) DEFAULT NULL,
  `vote` varchar(200) DEFAULT '0',
  `addtime` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tp_visits`
--

CREATE TABLE IF NOT EXISTS `tp_visits` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `visits` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `tp_vote`
--

CREATE TABLE IF NOT EXISTS `tp_vote` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `openid` varchar(200) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `time` varchar(200) DEFAULT NULL,
  `ip` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `get_id` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `nickname` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`),
  KEY `ip_2` (`ip`),
  KEY `openid` (`openid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- 转存表中的数据 `tp_vote`
--

INSERT INTO `tp_vote` (`id`, `openid`, `username`, `tel`, `time`, `ip`, `address`, `get_id`, `title`, `nickname`) VALUES
(1, 'asdaropaksdla5654dsb', '', '', '1462414774', '54.67.189.255', '美国', '2', '雯雯', ''),
(9, 'asdaropaksdla5654dsv', '', '', '1462436697', '54.67.189.255', '美国', '9', '李雷', ''),
(11, 'asdaropaksdla5654dsa', '', '', '1462504540', '127.0.0.1', '本机地址', '5', '明明', ''),
(12, 'asdaropaf54la5654dsa', '', '', '1462506821', '0.0.0.0', '保留地址', '5', '明明', ''),
(16, 'asdaropte54la5654dsa', '', '', '1462515467', '0.0.0.0', '保留地址', '9', '李雷', ''),
(17, 'skdaroptrrfla5654dsa', '', '', '1462529415', '0.0.0.0', '保留地址', '8', '嘻嘻', ''),
(18, 'skdredstrrfla5654dsa', '', '', '1462700670', '127.0.0.1', '本机地址', '5', '明明', ''),
(20, 'skdaroptrrfla5654dsa', '', '', '1462701710', '127.0.0.1', '本机地址', '5', '李雷', ''),
(21, 'skdaroptrerter654dsa', '', '', '1462756715', '0.0.0.0', '保留地址', '5', '李雷', ''),
(22, 'skdaroptrerter654daa', '', '', '1462757060', '0.0.0.0', '保留地址', '5', '明明', ''),
(24, 'o2_U-uDVV09OKW859jnFNfg2tzos', '', '', '1462847649', '112.64.28.75', '上海', '5', '明明', ''),
(26, 'o2_U-uDNEtKY3_s7nPXKSq3zqQ5k', '', '', '1462941673', '117.136.8.237', '上海', '5', '明明', '第一网销 小东'),
(27, 'o2_U-uMcocArSsF27BPrtHqp_zz0', '', '', '1462945751', '101.90.127.27', '上海', '5', '明明', '第一网销 平头老刘'),
(28, 'o2_U-uBN5YL_Cvz75O043GW4CbtA', '', '', '1462952376', '182.148.107.22', '四川', '5', '明明', 'Adam「沈一休」'),
(35, 'obsgOxEUtMZfE1PT4ysKXvQbon_0', '', '', '1463374517', '42.81.67.251', '天津', '5', '明明', ''),
(36, 'obsgOxJhgRXP-stuYkHsxTpfYGm0', '', '', '1463986446', '112.64.28.75', '上海', '13', '萱萱', ''),
(37, 'obsgOxHRHCTRURqx3ir2CN1n_klQ', '', '', '1463986768', '112.64.28.75', '上海', '5', '明明', ''),
(38, 'obsgOxNcqTzUBOg1uT0hZy_hE96I', '', '', '1463988279', '112.64.28.75', '上海', '14', '沈智鹏', '');

-- --------------------------------------------------------

--
-- 表的结构 `tp_wxconfig`
--

CREATE TABLE IF NOT EXISTS `tp_wxconfig` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `appid` varchar(200) NOT NULL,
  `appsecret` varchar(200) NOT NULL,
  `mchid` varchar(200) NOT NULL,
  `mchkey` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `tp_wxconfig`
--

INSERT INTO `tp_wxconfig` (`id`, `appid`, `appsecret`, `mchid`, `mchkey`) VALUES
(1, 'wx570fa7a2a1259b84', '58589c3e30724b0c4aa000cf7d9dca39', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
