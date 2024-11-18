-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-11-18 09:05:54
-- 伺服器版本： 8.0.35
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `fake_data_base`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comment_fake`
--

CREATE TABLE `comment_fake` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `sellername` varchar(255) NOT NULL,
  `buyername` varchar(255) NOT NULL,
  `rate` int NOT NULL,
  `creat_at` timestamp NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `comment_fake`
--

INSERT INTO `comment_fake` (`id`, `order_id`, `sellername`, `buyername`, `rate`, `creat_at`, `comment`) VALUES
(1, 1, 'you', 'me', 5, '2024-11-16 14:31:42', 'good');

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nickname` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `nickname`, `password`) VALUES
(1, '拜訪者', 'vistor@test.com', 'vistor', '$2y$10$9ZUF9e4.Ke1erop3uUVmxuA3h8zHBuvjcnmX3DNfc8aApFcmQrGsG'),
(2, '管理員', 'kim@nuuc.edu', 'pp', '123456'),
(3, '黃志偉', 'xiangchao@hotmail.com', 'Na Kong', '74FQWe'),
(4, '陳信宏', 'lei66@hotmail.com', 'Chao Chang', 'f94yXw'),
(5, '周鈺婷', 'cuijing@yahoo.com', 'Li Zeng', 'v6aVPb'),
(7, '談建宏', 'suxiuying@yahoo.com', 'Jie Dai', 'wq1T5d'),
(8, '邢佳蓉', 'oliao@hotmail.com', 'Juan Pan', 'kkE6Tx'),
(9, '呂佩君', 'liuqiang@gmail.com', 'Tao Yan', '73BETu'),
(10, '李郁雯', 'hli@gmail.com', 'Wei Luo', '9gN8Yi'),
(11, '王承翰', 'chenglei@gmail.com', 'Jie Jiang', '8KsQcg'),
(12, '毛惠如', 'jie98@gmail.com', 'Yong Liu', 'wdD8Zu'),
(13, '張佩君', 'yanghan@hotmail.com', 'Xia Liu', 'M1LyH7'),
(14, '李淑華', 'xia24@gmail.com', 'Jun Shao', '8Q3ro4'),
(15, '鄭龍', 'taozeng@hotmail.com', 'Lei Liang', '01WHar'),
(16, '畢佩君', 'qiaoqiang@hotmail.com', 'Ming Yu', 'U7E14b'),
(17, '廖雅涵', 'qiuchao@yahoo.com', 'Xiulan Tian', '3JNkpS'),
(18, '朱沖', 'guiying17@yahoo.com', 'Yan He', '0HoY4b'),
(20, '劉怡如', 'xuefang@hotmail.com', 'Yang Bai', '78dNEa'),
(21, '孫傑克', 'yong75@gmail.com', 'Xiulan Ma', 's5LaUv'),
(22, '盧淑娟', 'yzhao@hotmail.com', 'Ping Long', 'L5eAJe'),
(23, '韋嘉玲', 'juan94@gmail.com', 'Gang Yuan', 'cO49Zo'),
(24, '楊淑華', 'gangcui@hotmail.com', 'Yan Fang', '8oueZc'),
(25, '顏淑惠', 'daili@yahoo.com', 'Tao Wei', '2sLKEz'),
(26, '崔雅雯', 'gugang@hotmail.com', 'Jing Kong', 'S1ZJsI'),
(27, '陳志宏', 'oxiang@gmail.com', 'Wei Ma', 'i0Vhfd'),
(28, '楚佩君', 'lei91@gmail.com', 'Jun Qiu', '4EuEtr'),
(29, '奚家瑜', 'rkang@hotmail.com', 'Na Hu', '4A5ahz'),
(30, '杜郁雯', 'jinjing@yahoo.com', 'Qiang Ren', '9q5Wna'),
(31, '方雅惠', 'xiulangu@hotmail.com', 'Yan Zhong', '8vMXxh'),
(32, '王美琪', 'vye@yahoo.com', 'Juan Yi', 'p99AGd'),
(33, '張佩君', 'uxu@gmail.com', 'Jun Lin', '9OtLhe'),
(34, '鐘志偉', 'xiuying28@yahoo.com', 'Qiang Yan', 'OA6eOf'),
(35, '王心怡', 'helei@hotmail.com', 'Ping Tan', '1XIAXz'),
(36, '張馨儀', 'yanbai@yahoo.com', 'Ming Cai', '0LQGJb'),
(37, '易怡如', 'tao85@gmail.com', 'Ming Zhou', '0EwHrC'),
(38, '張淑玲', 'huqiang@yahoo.com', 'Min Jiang', '2XQo21'),
(39, '朱淑貞', 'yong52@hotmail.com', 'Tao Wu', '13qBBk'),
(40, '梁柏翰', 'na54@yahoo.com', 'Xiulan Song', 'rR1Dl4'),
(41, '楊傑克', 'xiuyingyu@hotmail.com', 'Fang Tang', '628YwY'),
(42, '戚靜宜', 'caoyan@hotmail.com', 'Xiulan Tan', '37vFq7'),
(43, '張淑慧', 'kguo@hotmail.com', 'Xiulan Kong', '6L7iaG'),
(44, '王美玲', 'ihe@yahoo.com', 'Jing Zhu', '4l63Fg'),
(45, '劉馨儀', 'taohao@hotmail.com', 'Jun Yang', 'Bq8IRm'),
(46, '葉靜怡', 'xiulanjiang@gmail.com', 'Li Huang', 'I0Anp9'),
(47, '黃嘉玲', 'okang@gmail.com', 'Lei Lei', 'xA6UTy'),
(48, '張婉婷', 'minluo@gmail.com', 'Gang Zhang', 'Ux8Ory'),
(49, '黃俊傑', 'yanmao@gmail.com', 'Xiuying Hao', '6GNgt1'),
(50, '邢雅玲', 'xiongfang@yahoo.com', 'Yang Zheng', '7jDhww'),
(51, '周佳玲', 'lilei@gmail.com', 'Gang Duan', '3RIlJe'),
(52, '劉怡安', 'xiuyingqiao@gmail.com', 'Xia Du', '2egNca'),
(53, '郭俊宏', 'taotao@hotmail.com', 'Xia Lei', '3xUwvV'),
(54, '劉傑克', 'machao@yahoo.com', 'Na Lai', 'L0iWqh'),
(55, '錢俊賢', 'kyi@gmail.com', 'Chao Bai', 'x9WsLj'),
(56, '陶雅筑', 'mintang@hotmail.com', 'Lei Qiao', '96H0Lo'),
(57, '龍靜怡', 'junzhu@gmail.com', 'Ming Lin', '6fCukd'),
(58, '張羽', 'gbai@hotmail.com', 'Juan Dai', '1Mxgih'),
(59, '潘建宏', 'mengping@hotmail.com', 'Na Wei', '5QIuEa'),
(60, '張威廷', 'xiulan11@hotmail.com', 'Jie Dong', 'A0cKy0'),
(61, '趙美琪', 'guiying87@hotmail.com', 'Jie Duan', '8Qtm87'),
(62, '張雅婷', 'juan72@hotmail.com', 'Li Dong', '9ZWvuP'),
(63, '孫宜庭', 'iguo@gmail.com', 'Tao Gu', 'S71RKk'),
(64, '舒飛', 'xiulanwan@gmail.com', 'Min Wen', '6Zz5b3'),
(65, '齊志偉', 'pshi@hotmail.com', 'Qiang Jin', '9QEddi'),
(66, '範雅萍', 'chaozou@gmail.com', 'Li Zhong', 'qZ7MdF'),
(67, '孫冠廷', 'wangqiang@gmail.com', 'Juan Luo', 'E9x5Qj'),
(68, '劉筱涵', 'tao58@yahoo.com', 'Xiuying Peng', 'r6JOdJ'),
(69, '周俊賢', 'min64@hotmail.com', 'Gang Hou', '2LgZkk'),
(70, '周龍', 'qiuna@yahoo.com', 'Tao Du', '3HinRo'),
(71, '任怡婷', 'duli@gmail.com', 'Fang Qian', '8HrJWj'),
(72, '汪佳穎', 'dongchao@hotmail.com', 'Chao Yu', 'Bs9Wge'),
(73, '王佳穎', 'mcui@gmail.com', 'Na Chen', 'YoI7Oa'),
(74, '李中山', 'juanjiang@hotmail.com', 'Ming Tang', '1Annwg'),
(75, '白佳樺', 'gang62@yahoo.com', 'Tao Shao', '9uDrvh'),
(76, '張冠霖', 'yong60@hotmail.com', 'Fang Su', '97Cg7l'),
(77, '童雅玲', 'gang01@hotmail.com', 'Li Fan', 'fj4ZcR'),
(78, '楊雅慧', 'jun16@hotmail.com', 'Jun Gu', '5HOfKq'),
(79, '楊雅玲', 'juanqian@gmail.com', 'Ping Yi', '27ZwD3'),
(80, '仇宗翰', 'gulei@gmail.com', 'Jun Liang', 'G5c1Ll'),
(81, '智靜怡', 'zhengmin@gmail.com', 'Wei Xue', '6J1ba0'),
(82, '姚建宏', 'na94@gmail.com', 'Na Zhu', 'N09GHf'),
(83, '周俊宏', 'shimin@yahoo.com', 'Li Su', 'M9u7Ww'),
(84, '沈雅雯', 'yanwei@hotmail.com', 'Xiuying Sun', 'vg1Kuo'),
(85, '方婷婷', 'xia90@yahoo.com', 'Lei Shao', '7YUgip'),
(86, '陳信宏', 'guiying26@gmail.com', 'Wei Yao', 'xoN3Er'),
(87, '茍宜庭', 'wzou@gmail.com', 'Li Hou', '2iJZJq'),
(88, '韋怡安', 'xiuyingluo@hotmail.com', 'Jing Liang', '9aZdlQ'),
(89, '賴宗翰', 'zhaochao@gmail.com', 'Tao Wei', 'Ig3CIs'),
(90, '郭瑋婷', 'mingxiao@gmail.com', 'Xiuying Du', 'g1iRLi'),
(91, '吳淑貞', 'vlin@hotmail.com', 'Jun Du', '3YVg2q'),
(92, '姜雅文', 'yongren@hotmail.com', 'Fang Jin', '4KZjh6'),
(93, '文彥廷', 'yang60@yahoo.com', 'Yang Gu', '1YGcAs'),
(94, '王飛', 'shenlei@yahoo.com', 'Min Shen', 'Q0ytNo'),
(95, '郭怡伶', 'qtan@yahoo.com', 'Xiulan Jiang', '1RUnlI'),
(96, '馬宇軒', 'xiulan33@gmail.com', 'Li Su', 'O52QZh'),
(97, '吳彥廷', 'guoli@gmail.com', 'Jing Gong', '2N0Nd2'),
(98, '陳美琪', 'xiuying52@yahoo.com', 'Yong Wu', '4XlaAz'),
(99, '劉家瑋', 'ali@hotmail.com', 'Ming Su', 'r5TVvJ'),
(100, '胡鈺婷', 'guiying11@yahoo.com', 'Min Lin', 'tL2NMv'),
(101, '鄧雅玲', 'yaojing@yahoo.com', 'Yang Lei', '26Sts9'),
(102, '李佳穎', 'yong67@yahoo.com', 'Qiang Yi', '89cG8m'),
(103, '宋雅婷', 'taoxie@gmail.com', 'Chao Chen', '43kCVx'),
(104, '顧俊傑', 'juan07@yahoo.com', 'Tao Wen', '6SLmpw'),
(105, '葛淑華', 'weijia@gmail.com', 'Jing Yao', '6LOagz'),
(106, '牛婷婷', 'mingdu@gmail.com', 'Tao Zhao', 'u33JmT'),
(107, '王雅涵', 'xiongxiulan@gmail.com', 'Yan Wei', 'w4YHf9'),
(108, '王淑娟', 'yiwei@hotmail.com', 'Guiying Su', '3VYwqf'),
(109, '莫彥廷', 'pingwu@yahoo.com', 'Ping Du', '16HNrc'),
(110, '李哲瑋', 'heguiying@yahoo.com', 'Ping Kang', '1CdBAa'),
(111, '史美琪', 'suchao@hotmail.com', 'Min Yao', 'R9T27m'),
(112, '寇志偉', 'yang56@hotmail.com', 'Fang Sun', 'l44KCc'),
(113, '史佳玲', 'yong43@yahoo.com', 'Ming Zhu', '31P3sP'),
(114, '郭雅婷', 'jiejia@gmail.com', 'Fang Du', 'mv4EzF'),
(115, '甘中山', 'minfang@hotmail.com', 'Tao Xiao', 'X4LKVv'),
(116, '劉惠如', 'tzhong@yahoo.com', 'Xia Deng', '5DwBnr'),
(117, '黎宇軒', 'jwu@yahoo.com', 'Xiulan Lei', 'g0L4lu'),
(118, '王威廷', 'gangluo@yahoo.com', 'Chao Yin', '5Qbl8N'),
(119, '王宗翰', 'tanna@yahoo.com', 'Jun Cui', '3JRouS'),
(120, '孫淑貞', 'zhongxiulan@yahoo.com', 'Xiuying Ye', '1BVoRu'),
(121, '李瑋婷', 'sliu@yahoo.com', 'Guiying Li', 'S7TFrS'),
(122, '曾美玲', 'szhang@gmail.com', 'Juan Tan', '1rD5Iy'),
(123, '呂怡君', 'jingyuan@hotmail.com', 'Lei Yan', 'Ny3Cyu'),
(124, '史俊傑', 'hsu@yahoo.com', 'Jun Yang', 'h7PKYk'),
(125, '張淑華', 'jieqin@yahoo.com', 'Yan Yan', 'G64Z8z'),
(126, '王宇軒', 'qiang82@yahoo.com', 'Juan Yang', '5Esckv'),
(127, '張信宏', 'yanqiu@yahoo.com', 'Ming Pan', '8OwGAo'),
(128, '蔡佳穎', 'weili@yahoo.com', 'Yong Kong', '3OfsAY'),
(129, '金懿', 'jing38@hotmail.com', 'Guiying Bai', '7S8uiz'),
(130, '彭靜怡', 'lisong@yahoo.com', 'Jun Wang', '8cFmZg'),
(131, '張雅涵', 'laijing@yahoo.com', 'Min Kang', 'Z6hJJi'),
(132, '張佳慧', 'zhuang@yahoo.com', 'Gang Wang', 'ir8Uih'),
(133, '賀飛', 'ejiang@gmail.com', 'Yang Song', '1VxWqJ'),
(134, '金信宏', 'taosu@hotmail.com', 'Guiying Yi', '0YMbNh'),
(135, '任詩涵', 'tianwei@hotmail.com', 'Yang Chen', '4EmQTp'),
(136, '唐婉婷', 'zhoujuan@hotmail.com', 'Yang Ren', '2pDXFj'),
(137, '向佳穎', 'ping49@yahoo.com', 'Tao Ma', 'v1FSLj'),
(138, '馮怡婷', 'fangzhao@yahoo.com', 'Wei Su', 'o7E2Kz'),
(139, '李哲瑋', 'yangwei@hotmail.com', 'Guiying Pan', 't1idWs'),
(140, '鄧家銘', 'dujuan@hotmail.com', 'Chao Dong', '8PreOY'),
(141, '崔中山', 'qiang73@hotmail.com', 'Yong Kong', 'Ly6fJz'),
(142, '嵇信宏', 'nakang@gmail.com', 'Fang Hou', '1LFKeI'),
(143, '林詩涵', 'nasu@gmail.com', 'Ming Zhou', 'm9oK9w'),
(144, '宗雅涵', 'yan43@hotmail.com', 'Juan Yang', 'W08BUv'),
(145, '何雅筑', 'xiulantian@hotmail.com', 'Ping Zhang', '5LBjdo'),
(146, '汪建宏', 'ezhong@yahoo.com', 'Juan Xiong', '1J2Og4'),
(147, '鄔雅芳', 'xiuying74@yahoo.com', 'Yong Fu', '4WPceo'),
(148, '趙佩珊', 'leina@yahoo.com', 'Xiulan Liao', 'D6lItK'),
(149, '徐俊宏', 'qiang18@hotmail.com', 'Xiulan Wan', '44QtDd'),
(150, '馬佳玲', 'ocheng@hotmail.com', 'Yan Zheng', '6R5pmf'),
(151, '樊怡如', 'xiafang@gmail.com', 'Yong Chang', 'G1XFpB'),
(152, '余家瑜', 'jiangxiulan@yahoo.com', 'Juan He', 'AZ0HmW'),
(153, '吳雅婷', 'hxiong@hotmail.com', 'Ping Pan', '9e1N2x'),
(154, '俞雅芳', 'jlong@gmail.com', 'Jie He', 'b0Favq'),
(155, '成雅筑', 'liyang@gmail.com', 'Wei Duan', '47Jdyk'),
(156, '蘇懿', 'ayang@gmail.com', 'Yong Ma', '07Qdvs'),
(157, '伍郁雯', 'ddu@hotmail.com', 'Ming Xiang', 'd8cLMr'),
(158, '林靜宜', 'cding@yahoo.com', 'Guiying Mo', '7B9ruT'),
(159, '朱信宏', 'wei62@hotmail.com', 'Min Meng', '6F2PHb'),
(160, '韓淑華', 'yanlong@gmail.com', 'Tao Lei', 'c3VqaN'),
(161, '馬飛', 'alu@hotmail.com', 'Guiying Qian', '8cBsxP'),
(162, '駱婷婷', 'li96@hotmail.com', 'Xia Tian', '8l2Raf'),
(163, '鄧雅琪', 'jie19@hotmail.com', 'Xiuying Liang', '2qBKrd'),
(164, '李淑華', 'na62@hotmail.com', 'Yang Cai', '9YevEi'),
(165, '朱詩婷', 'cyao@yahoo.com', 'Ping Jin', '98Yqbs'),
(166, '應瑋婷', 'exiong@yahoo.com', 'Juan Deng', 'i3WIfu'),
(167, '周馨儀', 'fang63@yahoo.com', 'Xiuying Meng', 'QXE6Tt'),
(168, '賴婉婷', 'gongxiulan@yahoo.com', 'Fang Dai', 'IE1dYj'),
(169, '張淑惠', 'qiangtao@yahoo.com', 'Xiuying Lin', '1Vf8Rw'),
(170, '李惠如', 'cyin@yahoo.com', 'Guiying Zeng', 'WOH2Kz'),
(171, '趙慧君', 'chengping@yahoo.com', 'Jun Long', '8TzNfQ'),
(172, '姜靜宜', 'yyi@hotmail.com', 'Lei Wan', '9L8yPw'),
(173, '周俊宏', 'nyuan@yahoo.com', 'Lei Lu', 'wY36Ae'),
(174, '金依婷', 'shenxiuying@yahoo.com', 'Xia Xue', 'ow5CKb'),
(175, '婁彥廷', 'qiang36@yahoo.com', 'Jie Xu', '26SGow'),
(176, '陳怡君', 'juanlu@gmail.com', 'Na Fan', 'pZ4URk'),
(177, '王承翰', 'yinjie@yahoo.com', 'Chao Kang', '2YK56l'),
(178, '王冠廷', 'wanjing@hotmail.com', 'Xia Tian', 'Z2NbWw'),
(179, '朱婉婷', 'dongxiuying@yahoo.com', 'Xiulan Guo', 'j4TQiu'),
(180, '張思穎', 'ochen@gmail.com', 'Xiuying Hu', 'mw3HHq'),
(181, '何思穎', 'gongtao@hotmail.com', 'Ping Xiong', 'c7BTba'),
(182, '王思穎', 'xiadong@gmail.com', 'Guiying Su', '5DxCeH'),
(183, '譚佳樺', 'yang47@yahoo.com', 'Qiang Tao', '3SZHTn'),
(184, '劉宜君', 'kwan@gmail.com', 'Gang Deng', '8aAgLs'),
(185, '王佳蓉', 'xyan@hotmail.com', 'Xiulan Xia', '5h7N8d'),
(186, '李承翰', 'leihuang@gmail.com', 'Xiuying Cheng', '5BEJWm'),
(187, '鄭琬婷', 'gaoyang@hotmail.com', 'Juan Li', '8CoSqk'),
(188, '董美玲', 'guogang@hotmail.com', 'Guiying Hu', '8AFngS'),
(189, '朱飛', 'zbai@gmail.com', 'Gang Wei', 'g035Qb'),
(190, '李飛', 'ishen@gmail.com', 'Yan Chen', 'A2FDJf'),
(191, '朱心怡', 'juan92@yahoo.com', 'Ming Liang', '8NdzEv'),
(192, '李承翰', 'czhu@gmail.com', 'Jie Pan', 'j2Kt5B'),
(193, '賈冠宇', 'chao43@gmail.com', 'Gang Mo', '5cICRx'),
(194, '鐘怡安', 'nduan@gmail.com', 'Fang Ding', '2RnVYs'),
(195, '高怡君', 'uqin@hotmail.com', 'Wei Chang', '1DhLXr'),
(196, '崔淑華', 'minchen@gmail.com', 'Jun Cai', '3GEBza'),
(197, '姚雅涵', 'umeng@hotmail.com', 'Jing Wan', 'w1SJpr'),
(198, '賈琬婷', 'hemin@yahoo.com', 'Yan Mo', 'M0PGcQ'),
(199, '邱美琪', 'xiulanwei@gmail.com', 'Yang Cao', '8Vipdx'),
(200, '吳靜怡', 'xia28@gmail.com', 'Ming Fu', '44NFae'),
(201, '陳家瑋', 'yandong@hotmail.com', 'Guiying Jin', '49OEle'),
(202, '劉怡安', 'pingxiong@gmail.com', 'Xiulan Long', '9LHhBU'),
(203, '廖志偉', 'pingchen@hotmail.com', 'Ping Gong', '4aKawu'),
(204, '劉琬婷', 'xiadu@yahoo.com', 'Tao Li', '7y2ESm'),
(205, '王美玲', 'taogao@gmail.com', 'Jun Liang', '41Q8vz'),
(206, '景怡萱', 'junwan@hotmail.com', 'Ming Wen', 'n5BbXK'),
(207, '孫惠婷', 'xiewei@hotmail.com', 'Ming Xu', '71lQom'),
(208, '張宜庭', 'yan49@hotmail.com', 'Jing Li', 'L2Jyfo'),
(209, '孫傑克', 'slong@yahoo.com', 'Ming Wang', 'xE6Bla'),
(210, '李承翰', 'xiaqian@gmail.com', 'Gang Peng', 'Zw4Ujb'),
(211, '祁雅惠', 'yong04@gmail.com', 'Yong Yu', 'ZR0Ljn'),
(212, '侯淑娟', 'jingma@gmail.com', 'Yong Guo', '9HlEgp'),
(213, '杜郁婷', 'qianghuang@gmail.com', 'Yong Bai', 'sbO4Wu'),
(214, '高怡伶', 'yangzhong@yahoo.com', 'Fang Su', '2z4Tkj'),
(215, '吳羽', 'suxia@hotmail.com', 'Xiulan Wu', 'M11NdC'),
(216, '嚴惠雯', 'xlin@gmail.com', 'Juan Zeng', 'G9Ictp'),
(217, '曹瑋婷', 'xujun@hotmail.com', 'Wei Chang', 'M1Nhwk'),
(218, '文靜宜', 'songjuan@gmail.com', 'Ming Xiang', 'v4Jrwx'),
(219, '孟家銘', 'min43@yahoo.com', 'Min Wei', 'f0P2Ad'),
(220, '衛雅萍', 'pingxia@hotmail.com', 'Juan Tang', '9HwMWm'),
(221, '高慧君', 'jun78@hotmail.com', 'Li Qian', '9TVNxf'),
(222, '範雅芳', 'juan50@yahoo.com', 'Wei Yao', '3GaHdQ'),
(223, '孫佳蓉', 'pzheng@gmail.com', 'Qiang Zhu', 'l81YSp'),
(224, '朱雅萍', 'bren@yahoo.com', 'Gang Jiang', '7Hg5fx'),
(225, '周美玲', 'tianming@yahoo.com', 'Na Hu', '9Yrwa4'),
(226, '廖惠雯', 'linfang@yahoo.com', 'Yan Dai', '0QYBpf'),
(227, '蔡承翰', 'li56@hotmail.com', 'Xiuying Xu', '6L29mh'),
(228, '陳郁雯', 'zhuguiying@gmail.com', 'Jun Zhang', 'H37Bqz'),
(229, '任惠雯', 'jinmin@gmail.com', 'Wei Wu', 'Q0JoIT'),
(230, '段思穎', 'qiang40@gmail.com', 'Min Yao', 'T2RLdU'),
(231, '謝惠婷', 'minqian@yahoo.com', 'Jun Wei', '8QPryG'),
(232, '許詩涵', 'yanshao@hotmail.com', 'Yan Fan', 'R0quVz'),
(233, '鄧雅涵', 'ghu@hotmail.com', 'Li Shen', '81RBms'),
(234, '郭庭瑋', 'chenmin@yahoo.com', 'Jie Zhao', '938Ojf'),
(235, '楊雅涵', 'mingfu@hotmail.com', 'Yong Xue', 'Xx6YcP'),
(236, '陳怡安', 'guiying34@gmail.com', 'Lei Zhong', '0beYlJ'),
(237, '陶惠雯', 'jiagang@gmail.com', 'Juan Jiang', 'X4KfrY'),
(238, '劉怡君', 'tao73@hotmail.com', 'Lei Zhong', '4NmImm'),
(239, '朱詩婷', 'yongjia@hotmail.com', 'Yang Xiong', '89WP7k'),
(240, '項佩君', 'maxia@gmail.com', 'Xiuying Deng', '0I22Hh'),
(241, '趙雅琪', 'qiang36@yahoo.com', 'Li Hu', '9IRapl'),
(242, '呂俊賢', 'chaomo@yahoo.com', 'Xiulan Gong', 'H4S9Jn'),
(243, '王懿', 'gang16@yahoo.com', 'Gang Yi', 'AP4ZVe'),
(244, '範志宏', 'xiuyingzhong@gmail.com', 'Guiying Jiang', 'keO1Ar'),
(245, '詹筱涵', 'juncheng@yahoo.com', 'Ming Meng', '0JuOPk'),
(246, '夏冠宇', 'bcao@gmail.com', 'Xiuying Ding', 'Eve6Rg'),
(247, '徐雅萍', 'juan35@hotmail.com', 'Min Zhang', 'qK3BHo'),
(248, '李佳蓉', 'minjia@yahoo.com', 'Chao Fang', 'G9GVsL'),
(249, '朱中山', 'qiang74@yahoo.com', 'Chao Chen', 'd9tFl3'),
(250, '王婷婷', 'jun18@yahoo.com', 'Juan Lei', '3sqBzT'),
(251, '楊佳穎', 'cxiong@gmail.com', 'Juan Luo', '0ZgNDS'),
(252, '李淑貞', 'taoyi@yahoo.com', 'Juan Hao', '3iYNUv'),
(253, '顧中山', 'leiluo@gmail.com', 'Chao Su', 'x4cCnI'),
(254, '劉佳樺', 'tianjuan@yahoo.com', 'Jie Qiao', '8aMEwe'),
(255, '饒雅萍', 'li59@gmail.com', 'Na Du', '90Yuzf'),
(256, '戴懿', 'byi@gmail.com', 'Jun Li', 'BHo7Bh'),
(257, '趙雅芳', 'guiying80@hotmail.com', 'Yong Shen', 'h82XvH'),
(258, '紀雅雯', 'jingdong@yahoo.com', 'Chao Tan', '9uIrAb'),
(259, '吳淑惠', 'lihu@hotmail.com', 'Ping Yin', 'A6TrEx'),
(260, '劉威廷', 'eli@gmail.com', 'Yang Jiang', 'X7xRyK'),
(261, '沙佳玲', 'xiulan65@yahoo.com', 'Jing Qiao', '81SHrg'),
(262, '傅家瑋', 'jie45@gmail.com', 'Yan Xiong', '1ACJfv'),
(263, '許威廷', 'min87@gmail.com', 'Yang Cui', '8DUoOK'),
(264, '趙羽', 'shaoguiying@hotmail.com', 'Xiuying Hu', '11Plxx'),
(265, '紀雅涵', 'pinglong@yahoo.com', 'Li Qin', '7MITrs'),
(266, '許俊宏', 'kcheng@yahoo.com', 'Qiang Mo', '9yZFjr'),
(267, '魏筱涵', 'chaokang@gmail.com', 'Fang Duan', 'Ue1Pf2'),
(268, '周宗翰', 'maoming@hotmail.com', 'Chao Ye', 'o2Sssh'),
(269, '耿淑華', 'yang34@yahoo.com', 'Juan Duan', '2RH6Ua'),
(270, '李志宏', 'wangyang@yahoo.com', 'Fang Qiao', '6RJCIx'),
(271, '潘宜君', 'jun00@gmail.com', 'Wei Yi', '6NNhem'),
(272, '馬志宏', 'mana@gmail.com', 'Wei Sun', 'c5MuKu'),
(273, '王佳穎', 'ming28@gmail.com', 'Yang Song', '2PwH1g'),
(274, '李雅琪', 'upan@yahoo.com', 'Xia Zhao', 'V9Nqrz'),
(275, '張中山', 'li81@hotmail.com', 'Li Han', '3JcgGs'),
(276, '吳雅萍', 'ping61@hotmail.com', 'Yong Fan', '1O08vy'),
(277, '杜詩婷', 'jing72@yahoo.com', 'Yong Yi', 'Z6VuBs'),
(278, '高宇軒', 'lqiu@hotmail.com', 'Yan Li', '0sKfpd'),
(279, '姚哲瑋', 'rhao@hotmail.com', 'Fang Luo', '9R0haT'),
(280, '吳淑玲', 'leixu@yahoo.com', 'Na Huang', 'D6dQVb'),
(281, '韓欣怡', 'minding@yahoo.com', 'Lei Qiu', 'Wd7RUu'),
(282, '蘇淑慧', 'weichao@yahoo.com', 'Guiying Han', '7EgNqz'),
(283, '蒙佳樺', 'yangping@gmail.com', 'Qiang Li', '14w7Lz'),
(284, '吳詩涵', 'yong49@yahoo.com', 'Jie Yao', '8HRDSb'),
(285, '王依婷', 'lsong@gmail.com', 'Yong Xia', 'b4K6Lh'),
(286, '周怡萱', 'li93@hotmail.com', 'Xiuying Cheng', '2h7EVj'),
(287, '劉淑芬', 'ujin@hotmail.com', 'Jing Yuan', '9612Lw'),
(288, '苑家銘', 'eshen@hotmail.com', 'Xiuying Guo', 'b1TkkX'),
(289, '塗依婷', 'fangdu@hotmail.com', 'Xiulan Bai', 'P4TZk6'),
(290, '曾雅文', 'ahuang@yahoo.com', 'Wei Wang', 'oO9iZk'),
(291, '彭淑芬', 'tanli@hotmail.com', 'Min Zeng', '9Ehphs'),
(292, '彭家瑋', 'pzeng@hotmail.com', 'Xiulan Yu', 'b1Q1fk'),
(293, '李馨儀', 'yangao@hotmail.com', 'Ming Guo', '848Wsy'),
(294, '徐嘉玲', 'li61@gmail.com', 'Jie Tao', 'xW3vAi'),
(295, '田羽', 'yangyin@yahoo.com', 'Jing Cheng', '0Lis3p'),
(296, '伍怡萱', 'jingsong@yahoo.com', 'Na Zhu', 'gw8H0m'),
(297, '邱志豪', 'xiuying25@hotmail.com', 'Jie Qian', 't9MpfH'),
(298, '王宗翰', 'minglin@hotmail.com', 'Xia Wu', '3sCOyo'),
(299, '陳宇軒', 'tpeng@yahoo.com', 'Min Tian', '0iu9Do'),
(300, '李琬婷', 'qiaolei@gmail.com', 'Li Du', '7bdFcQ'),
(301, '毛佳樺', 'zhaomin@yahoo.com', 'Jing Xue', 'x31PpU'),
(302, '孫瑋婷', 'fengchao@hotmail.com', 'Xiuying Wang', 'r3wUdT'),
(303, 'wang', 'test@test.com', 'littlew', '$2y$10$eihlYDeH/IoP.3lZh8KGCe9lszjSVPgiRkq2zUyJtEDrDTdFZJlty');

-- --------------------------------------------------------

--
-- 資料表結構 `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `from_user` int NOT NULL,
  `to_user` int NOT NULL,
  `msg` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `messages`
--

INSERT INTO `messages` (`id`, `from_user`, `to_user`, `msg`) VALUES
(1, 304, 306, 'ok'),
(2, 306, 304, 'ok\n'),
(3, 304, 306, 'ok'),
(4, 304, 306, 'ok'),
(5, 306, 305, 'hello'),
(6, 305, 306, 'loop never stop'),
(7, 305, 306, 'test'),
(8, 306, 305, 'fail');

-- --------------------------------------------------------

--
-- 資料表結構 `order_fake`
--

CREATE TABLE `order_fake` (
  `id` int NOT NULL,
  `sellername` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `buyername` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `total_price` int NOT NULL,
  `total_amount` int NOT NULL,
  `shipment_fee` int NOT NULL,
  `payment_status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `shipment_status` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `order_fake`
--

INSERT INTO `order_fake` (`id`, `sellername`, `buyername`, `total_price`, `total_amount`, `shipment_fee`, `payment_status`, `shipment_status`, `order_date`, `status`) VALUES
(1, 'Raegan.Olson', 'Graham.Beer', 601, 1, 10, 'invoice', 'Hatchback', '2023-12-03', '未完成'),
(2, 'Kelly36', 'Larissa54', 109, 1, 9, 'withdrawal', 'Extended Cab Pickup', '2023-11-03', '未完成'),
(3, 'Jena35', 'Isaias_Ratke', 999, 5, 7, 'payment', 'SUV', '2023-11-03', '未完成'),
(4, 'Raven50', 'Joaquin59', 765, 0, 5, 'payment', 'Hatchback', '2023-11-03', '未完成'),
(5, 'Colton_Okuneva', 'Tyshawn_Tillman28', 374, 5, 6, 'deposit', 'Coupe', '2023-11-03', '未完成'),
(6, 'Christian_Quigley', 'Alejandrin.Will37', 302, 0, 8, 'payment', 'Hatchback', '2023-11-03', '未完成'),
(7, 'Florence_Gibson95', 'Neha.Renner8', 123, 1, 9, 'invoice', 'Crew Cab Pickup', '2023-11-03', '未完成'),
(8, 'Ernest.Kihn78', 'Larissa16', 93, 3, 9, 'deposit', 'Passenger Van', '2023-11-03', '未完成'),
(9, 'Joyce14', 'Hollie.Jacobi45', 409, 3, 6, 'payment', 'SUV', '2023-11-03', '未完成'),
(10, 'Richard27', 'Wilford_Yundt81', 103, 5, 7, 'invoice', 'Crew Cab Pickup', '2023-11-03', '未完成'),
(11, 'Mason.Dooley64', 'Mozelle56', 904, 5, 10, 'deposit', 'Extended Cab Pickup', '2023-11-03', '未完成'),
(12, 'Serenity.Rempel', 'Assunta_Lowe13', 406, 2, 6, 'withdrawal', 'SUV', '2023-11-03', '未完成'),
(13, 'Susana_Littel', 'Angel.Abbott73', 202, 2, 10, 'withdrawal', 'Passenger Van', '2023-11-03', '未完成'),
(14, 'Tomas39', 'Ila3', 237, 2, 9, 'invoice', 'Convertible', '2023-11-03', '未完成'),
(15, 'Felipa.Bode', 'Dalton_Hane48', 691, 1, 8, 'payment', 'Convertible', '2023-09-03', '未完成'),
(16, 'Nikolas_Stehr96', 'Flavie_Kihn19', 711, 4, 7, 'deposit', 'Minivan', '2023-09-03', '未完成'),
(17, 'Rosalia21', 'Edd15', 38, 5, 7, 'deposit', 'Crew Cab Pickup', '2023-09-03', '未完成'),
(18, 'Rafael69', 'Ethyl_Jaskolski-Witting', 475, 5, 10, 'invoice', 'Crew Cab Pickup', '2023-09-03', '未完成'),
(19, 'Jaeden_Kuphal55', 'Emelia_Fritsch11', 461, 4, 6, 'withdrawal', 'Wagon', '2023-09-03', '未完成'),
(20, 'Wanda.Johns89', 'Titus47', 163, 4, 9, 'invoice', 'Sedan', '2023-09-03', '未完成'),
(21, 'Daryl.Davis17', 'Savion48', 29, 1, 9, 'deposit', 'SUV', '2023-09-03', '未完成'),
(22, 'Lucio.Macejkovic98', 'Randi_Bashirian', 124, 4, 5, 'payment', 'Wagon', '2023-09-03', '未完成'),
(23, 'Rafael4', 'Oleta.Prohaska20', 8, 3, 8, 'deposit', 'Hatchback', '2023-09-03', '未完成'),
(24, 'Yvette68', 'Elinore_Goyette65', 670, 5, 6, 'deposit', 'SUV', '2023-09-03', '未完成'),
(25, 'Jude_Spencer-Simonis', 'Darby18', 659, 2, 6, 'withdrawal', 'Coupe', '2023-09-03', '未完成'),
(26, 'Queen_Bogisich', 'Delaney.Spencer66', 445, 1, 7, 'invoice', 'Minivan', '2023-09-03', '未完成'),
(27, 'Nyasia_Schiller', 'Marjorie78', 827, 2, 5, 'withdrawal', 'Wagon', '2023-09-03', '未完成'),
(28, 'Madison.Mueller09', 'Zita25', 765, 2, 8, 'withdrawal', 'Extended Cab Pickup', '2023-09-03', '未完成'),
(29, 'Maritza42', 'Romaine_Casper-Conn', 146, 4, 6, 'deposit', 'Wagon', '2023-09-03', '未完成'),
(30, 'Mohammad.Runolfsdottir-Parker', 'Hannah54', 873, 2, 5, 'withdrawal', 'Extended Cab Pickup', '2023-09-03', '未完成'),
(31, 'Dakota.Kuvalis', 'Florida.Hettinger', 653, 3, 7, 'payment', 'Wagon', '2023-09-03', '未完成'),
(32, 'Sherman40', 'Broderick99', 255, 4, 8, 'withdrawal', 'Coupe', '2023-09-03', '未完成'),
(33, 'Johnpaul61', 'Lacey.Stracke35', 5, 2, 7, 'withdrawal', 'Wagon', '2023-07-03', '未完成'),
(34, 'Emmie.Bartell60', 'Lilla_Tillman', 414, 1, 6, 'withdrawal', 'Convertible', '2023-07-03', '未完成'),
(35, 'Karlee.Mitchell', 'Mike.Larkin', 536, 0, 6, 'payment', 'Minivan', '2023-07-03', '未完成'),
(36, 'Garnet_Jaskolski', 'Lincoln_Nitzsche67', 280, 5, 7, 'payment', 'Sedan', '2023-07-03', '未完成'),
(37, 'Raleigh_Kemmer', 'Chad.Kirlin', 497, 0, 7, 'withdrawal', 'Extended Cab Pickup', '2023-07-03', '未完成'),
(38, 'Chauncey_Fritsch49', 'Abigale3', 50, 4, 7, 'payment', 'SUV', '2023-07-03', '未完成'),
(39, 'Arch48', 'Pietro64', 411, 4, 9, 'withdrawal', 'Hatchback', '2023-07-03', '未完成'),
(40, 'Lesly.Towne4', 'Roosevelt_Monahan25', 336, 4, 6, 'payment', 'Hatchback', '2023-07-03', '未完成'),
(41, 'Bradford.Cruickshank82', 'Candelario_Stiedemann', 744, 1, 7, 'invoice', 'Hatchback', '2023-07-03', '未完成'),
(42, 'Ashlynn.Barrows', 'Hester_Kuvalis33', 428, 4, 8, 'payment', 'SUV', '2023-07-03', '未完成'),
(43, 'Alec_Hilll', 'Laney85', 673, 4, 5, 'payment', 'Passenger Van', '2023-07-03', '未完成'),
(44, 'Felix32', 'Monte_Hintz80', 374, 0, 5, 'deposit', 'SUV', '2023-07-03', '未完成'),
(45, 'Dasia_Macejkovic', 'Kaylee.Stark', 292, 0, 5, 'invoice', 'Wagon', '2023-07-03', '未完成'),
(46, 'Stephania_Shields5', 'Chelsey_Brown-Rice', 604, 3, 5, 'invoice', 'Coupe', '2023-07-03', '未完成'),
(47, 'Bradley93', 'Sammy_Conn', 385, 3, 9, 'payment', 'Minivan', '2023-07-03', '未完成'),
(48, 'Eliezer.Grimes', 'Maia_Toy98', 595, 3, 5, 'payment', 'Wagon', '2023-07-03', '未完成'),
(49, 'Marielle38', 'Kale8', 293, 0, 7, 'payment', 'Passenger Van', '2023-07-03', '未完成'),
(50, 'Tressie_Williamson66', 'Mabelle54', 191, 3, 9, 'payment', 'Coupe', '2023-07-03', '未完成'),
(51, 'Therese1', 'Maria.Kovacek', 596, 3, 5, 'withdrawal', 'Minivan', '2023-07-03', '未完成'),
(52, 'Casimer_Wiza', 'Mazie.Rohan61', 955, 1, 7, 'deposit', 'Convertible', '2023-07-03', '未完成'),
(53, 'Jamarcus.Borer50', 'Ashly_OKon29', 3, 1, 9, 'withdrawal', 'Convertible', '2023-07-03', '未完成'),
(54, 'Elizabeth34', 'Boris_Robel', 247, 3, 9, 'deposit', 'Passenger Van', '2023-07-03', '未完成'),
(55, 'Garfield_Berge13', 'Colin_Brakus', 384, 1, 6, 'invoice', 'Crew Cab Pickup', '2023-07-03', '未完成'),
(56, 'Melyna56', 'Aliza85', 502, 3, 6, 'payment', 'Passenger Van', '2023-07-03', '未完成'),
(57, 'Lester70', 'Deon78', 118, 4, 6, 'withdrawal', 'Convertible', '2023-07-03', '未完成'),
(58, 'Julie4', 'Monica.Bauch58', 372, 1, 6, 'invoice', 'Coupe', '2023-07-03', '未完成'),
(59, 'Cordell26', 'Abbigail.Deckow-Altenwerth50', 830, 3, 7, 'invoice', 'Extended Cab Pickup', '2023-07-03', '未完成'),
(60, 'Willard_Beier57', 'Genevieve_Cronin', 449, 2, 8, 'deposit', 'Hatchback', '2023-07-03', '未完成'),
(61, 'Missouri.Okuneva31', 'Zander_DuBuque', 610, 4, 5, 'invoice', 'Hatchback', '2023-07-03', '未完成'),
(62, 'Blake.Schaden82', 'Sydnee40', 250, 5, 8, 'withdrawal', 'Extended Cab Pickup', '2023-07-03', '未完成'),
(63, 'Sidney.Bode-Daniel12', 'Alyce71', 774, 5, 9, 'withdrawal', 'Minivan', '2023-07-03', '未完成'),
(64, 'Justina9', 'Leila_Kilback9', 81, 3, 6, 'invoice', 'Sedan', '2023-07-03', '未完成'),
(65, 'Hilbert.Herzog', 'Lauryn_Rodriguez', 408, 1, 9, 'invoice', 'Passenger Van', '2023-07-03', '未完成'),
(66, 'Dovie8', 'Fausto_Daugherty', 284, 1, 5, 'payment', 'Convertible', '2023-07-03', '未完成'),
(67, 'Esta58', 'Rodrick_Emmerich84', 287, 2, 9, 'withdrawal', 'Minivan', '2023-07-03', '未完成'),
(68, 'Eve.Kris16', 'Trinity37', 192, 3, 9, 'payment', 'Wagon', '2023-07-03', '未完成'),
(69, 'Dahlia81', 'Leanna50', 824, 5, 5, 'deposit', 'Wagon', '2023-07-03', '未完成'),
(70, 'Cristopher.Williamson', 'Lavonne_Roberts', 660, 0, 9, 'invoice', 'Convertible', '2023-07-03', '未完成'),
(71, 'Aubrey_Muller63', 'Jerald_OConnell-Harris', 458, 1, 10, 'deposit', 'Minivan', '2023-07-03', '未完成'),
(72, 'Eryn58', 'Leonard_Sauer51', 201, 4, 10, 'deposit', 'Convertible', '2023-07-03', '未完成'),
(73, 'Bailey.Weissnat-Ullrich93', 'Frederick_Bernhard90', 336, 3, 7, 'withdrawal', 'Extended Cab Pickup', '2023-07-03', '未完成'),
(74, 'Madelyn_Parisian44', 'Leon_Swift-Welch81', 453, 4, 6, 'invoice', 'Hatchback', '2023-07-03', '未完成'),
(75, 'Destini_Trantow', 'Stuart34', 721, 5, 9, 'invoice', 'Extended Cab Pickup', '2023-07-03', '未完成'),
(76, 'Andres_Sipes', 'Issac_Ziemann82', 160, 1, 6, 'payment', 'Extended Cab Pickup', '2023-07-03', '未完成'),
(77, 'Destany.Lind18', 'Monty.Corkery95', 811, 5, 8, 'payment', 'Minivan', '2023-07-03', '未完成'),
(78, 'Sven_Tromp', 'Carmella_Runolfsson', 569, 1, 5, 'withdrawal', 'Convertible', '2023-05-03', '未完成'),
(79, 'Rashawn.Jacobi', 'Roberto_DuBuque37', 462, 4, 9, 'invoice', 'Minivan', '2023-05-03', '未完成'),
(80, 'Wilford.Quigley83', 'Trey_Ankunding-Sawayn', 675, 2, 8, 'withdrawal', 'Wagon', '2023-05-03', '未完成'),
(81, 'Gerry68', 'Yasmeen.Funk-Kris', 285, 4, 10, 'withdrawal', 'Sedan', '2023-05-03', '未完成'),
(82, 'Cornelius_Cremin7', 'Bianka.Kozey', 207, 4, 6, 'invoice', 'Minivan', '2023-05-03', '未完成'),
(83, 'Kaelyn97', 'Mallory.Davis38', 205, 4, 6, 'withdrawal', 'Wagon', '2023-05-03', '未完成'),
(84, 'Darion_Lynch48', 'Zoey.Bernier', 754, 4, 8, 'payment', 'Wagon', '2023-05-03', '未完成'),
(85, 'Caden_Graham26', 'Alene87', 967, 2, 8, 'deposit', 'Wagon', '2023-05-03', '未完成'),
(86, 'Dallas38', 'Donnell.Senger05', 79, 4, 8, 'invoice', 'Crew Cab Pickup', '2023-05-03', '未完成'),
(87, 'Emmie88', 'Shirley1', 491, 3, 6, 'invoice', 'Sedan', '2023-05-03', '未完成'),
(88, 'Jacinto_Weber84', 'Carolyn_Murray15', 900, 2, 7, 'payment', 'SUV', '2024-11-18', '未完成'),
(89, 'Kennedy.Funk37', 'Jabari24', 935, 2, 9, 'withdrawal', 'Crew Cab Pickup', '2023-05-03', '未完成'),
(90, 'Sedrick20', 'Ivory21', 218, 3, 7, 'payment', 'Sedan', '2023-05-03', '未完成'),
(91, 'Jarret.Kilback68', 'Una_Hudson78', 322, 5, 7, 'withdrawal', 'Sedan', '2023-05-03', '未完成'),
(92, 'Keely.Rempel', 'Roscoe51', 751, 3, 8, 'withdrawal', 'Crew Cab Pickup', '2023-05-03', '未完成'),
(93, 'Troy.Cronin', 'Jefferey_Wiza94', 437, 1, 6, 'withdrawal', 'Hatchback', '2023-05-03', '已完成'),
(94, 'Everardo79', 'Maegan29', 781, 3, 8, 'payment', 'Cargo Van', '2023-05-03', '未完成'),
(95, 'Francesca83', 'Leslie30', 505, 4, 9, 'deposit', 'Hatchback', '2023-05-03', '未完成'),
(96, 'Betsy.Johns', 'Boyd_Considine', 224, 2, 8, 'deposit', 'Wagon', '2023-05-03', '已完成'),
(97, 'Anna.Schumm22', 'Kenya17', 943, 0, 10, 'invoice', 'Minivan', '2023-05-03', '已完成'),
(98, 'Vernon_Heathcote55', 'Dudley57', 57, 4, 6, 'payment', 'Sedan', '2023-05-03', '未完成'),
(99, 'Cleta68', 'Rocio.Rogahn82', 578, 1, 6, 'withdrawal', 'Coupe', '2023-05-03', '已完成'),
(100, 'Magnolia34', 'Bianka.Schneider82', 595, 1, 9, 'deposit', 'Sedan', '2023-05-03', '已完成');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `img` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `descr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `img`, `product_name`, `price`, `descr`) VALUES
(2, 'image/nccu.png', '商標', 100, '某間學校的校徽'),
(3, 'image/fireflyschool.jpg', '商品名稱', 1000, '很好用的東西，很棒'),
(4, 'image/fireflyschool.jpg', '商品名稱', 1000, '很好用的東西，很棒'),
(5, 'image/buddha3.jpg', '商品名稱', 500, '很好用的東西'),
(6, 'image/buddha5.jpg', '商品名稱', 500, '很好用的東西');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nickname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `name`, `nickname`) VALUES
(1, '拜訪者', 'vistor'),
(2, '管理員', 'pp'),
(303, 'wang', 'littlew'),
(304, 'wang', 'littlew'),
(305, 'Lin', 'l'),
(306, 'hong', 'hh');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `comment_fake`
--
ALTER TABLE `comment_fake`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `order_fake`
--
ALTER TABLE `order_fake`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `comment_fake`
--
ALTER TABLE `comment_fake`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_fake`
--
ALTER TABLE `order_fake`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
