-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-01-15 15:49:06
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `sql_report`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `rating_level` int(6) NOT NULL,
  `comment_content` varchar(100) NOT NULL,
  `publication_data` date NOT NULL,
  `Uid` varchar(10) NOT NULL,
  `Vid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `pocket_list`
--

CREATE TABLE `pocket_list` (
  `collection_date` date NOT NULL,
  `Uid` varchar(10) NOT NULL,
  `Vid` varchar(10) NOT NULL,
  `Pid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `subscription_plan`
--

CREATE TABLE `subscription_plan` (
  `Tid` varchar(10) NOT NULL,
  `transaction_method` varchar(5) NOT NULL,
  `Sdate` date NOT NULL,
  `Scategory` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `subscription_plan`
--

INSERT INTO `subscription_plan` (`Tid`, `transaction_method`, `Sdate`, `Scategory`) VALUES
('A548846', '現金', '2024-09-09', '');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `nickname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `registrationdate` date NOT NULL,
  `uid` varchar(15) NOT NULL,
  `birthday` date NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`nickname`, `email`, `registrationdate`, `uid`, `birthday`, `name`) VALUES
('小明', 'c112156284@nkust.edu.tw', '2023-06-01', 'A123546', '2000-09-15', '');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `vactore`
--

CREATE TABLE `vactore` (
  `Vid` varchar(10) NOT NULL,
  `actor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `video`
--

CREATE TABLE `video` (
  `Vid` varchar(10) NOT NULL,
  `Vname` varchar(20) NOT NULL,
  `introduction` varchar(200) NOT NULL,
  `release_date` date NOT NULL,
  `director` varchar(10) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `area` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `video`
--

INSERT INTO `video` (`Vid`, `Vname`, `introduction`, `release_date`, `director`, `duration`, `area`, `category`) VALUES
('V123', '魷魚遊戲2', '延續第一季的生存遊戲，加入更多挑戰、複雜角色關係和驚險刺激的競賽，揭露人性的黑暗與掙扎。', '2024-12-26', '黃東赫', '60分鐘', '韓國', '驚悚類');

-- --------------------------------------------------------

--
-- 資料表結構 `was_added`
--

CREATE TABLE `was_added` (
  `Vid` varchar(10) NOT NULL,
  `Pid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `watch`
--

CREATE TABLE `watch` (
  `Uid` varchar(10) NOT NULL,
  `Vid` varchar(10) NOT NULL,
  `Wdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `pocket_list`
--
ALTER TABLE `pocket_list`
  ADD PRIMARY KEY (`Pid`);

--
-- 資料表索引 `subscription_plan`
--
ALTER TABLE `subscription_plan`
  ADD PRIMARY KEY (`Tid`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`Vid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
