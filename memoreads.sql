-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 6 朁E01 日 15:38
-- サーバのバージョン： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memoreads`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `avatar`
--

CREATE TABLE `avatar` (
  `avatar_id` int(11) NOT NULL,
  `avater_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `avatar`
--

INSERT INTO `avatar` (`avatar_id`, `avater_path`) VALUES
(1, 'IMG_1696.jpg'),
(2, 'naru.png'),
(3, 'atsushi.png'),
(4, 'dog.jpg'),
(5, 'rimiko.png');

-- --------------------------------------------------------

--
-- テーブルの構造 `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `picture_url` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `detail` text,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `books`
--

INSERT INTO `books` (`book_id`, `title`, `picture_url`, `author`, `detail`, `created`, `modified`) VALUES
(1, 'すえずえ', 'book1.jpg', '畠中恵', 'あああああああああ', '2017-05-10 00:00:00', '2017-05-11 16:00:00'),
(2, '君の名は', 'book3.jpg', '新海誠', 'いいいいいいいいいいいいいい', '2017-05-04 00:00:00', '2017-05-05 16:00:00'),
(3, '夜は短し歩けよ乙女', 'book4.jpg', '森見登美彦', 'うううううううううううう', '2017-05-21 00:00:00', '2017-05-22 16:00:00'),
(4, 'ip細胞', 'book2.png', '山中伸弥', 'おおおおおおおおおおおお', '2017-04-17 00:00:00', '2017-05-07 16:00:00'),
(5, '継続的デリバリー', 'ダウンロード.jpeg', 'わかりません', 'かかかかかかかかかかかかか', '2017-04-17 00:00:00', '2017-04-27 16:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `book_keywords`
--

CREATE TABLE `book_keywords` (
  `book_keyword_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `book_keywords`
--

INSERT INTO `book_keywords` (`book_keyword_id`, `book_id`, `keyword_id`, `created`) VALUES
(1, 1, 1, '2017-04-02 00:00:00'),
(2, 1, 2, '2017-04-06 00:00:00'),
(3, 1, 3, '2017-04-14 00:00:00'),
(4, 1, 4, '2017-04-21 00:00:00'),
(5, 1, 12, '0000-00-00 00:00:00'),
(6, 2, 1, '2017-05-16 00:00:00'),
(7, 2, 2, '2017-05-17 00:00:00'),
(8, 4, 12, '2017-05-16 00:00:00'),
(9, 3, 9, '2017-06-05 00:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `keywords`
--

CREATE TABLE `keywords` (
  `keyword_id` int(11) NOT NULL,
  `keyword` varchar(256) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `keywords`
--

INSERT INTO `keywords` (`keyword_id`, `keyword`, `created`) VALUES
(1, '予想外', '2017-05-02 00:00:00'),
(2, 'どんでん返し', '2017-05-03 00:00:00'),
(3, 'ヤバい', '2017-05-11 00:00:00'),
(4, '面白い', '2017-05-13 00:00:00'),
(5, 'ぶっ飛んでいる', '2017-04-08 00:00:00'),
(6, '怖い', '2017-06-08 00:00:00'),
(7, 'つまらない', '2017-06-15 00:00:00'),
(8, 'びっくり', '2017-06-21 00:00:00'),
(9, 'とりあえず読め', '2017-06-21 00:00:00'),
(10, '価値観が変わる', '2017-06-13 00:00:00'),
(11, '考えさせられる', '2017-06-14 00:00:00'),
(12, '元気づけられる', '2017-06-07 00:00:00'),
(13, '胸キュン', '2017-06-07 00:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `records`
--

CREATE TABLE `records` (
  `record_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `review` varchar(256) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `book_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `records`
--

INSERT INTO `records` (`record_id`, `user_id`, `stars`, `review`, `start_date`, `end_date`, `book_id`, `created`, `modified`) VALUES
(1, 1, 4, 'aaaaaaaaaaaa', '2017-04-03 00:00:00', '2017-04-12 00:00:00', 1, '2017-05-02 00:00:00', '2017-06-01 16:00:00'),
(2, 1, 3, 'lkjlkjljlkj', '2017-04-18 00:00:00', '2017-04-22 00:00:00', 4, '2017-04-13 00:00:00', '2017-04-20 16:00:00'),
(3, 4, 5, 'asdffdsa', '2017-04-17 00:00:00', '2017-04-21 00:00:00', 3, '2017-04-24 00:00:00', '2017-04-28 16:00:00'),
(4, 2, 5, 'asdfdasdf', '2017-04-10 00:00:00', '2017-04-14 00:00:00', 2, '2017-04-12 00:00:00', '2017-04-20 16:00:00'),
(5, 4, 2, 'asdfasdf', '2017-04-11 00:00:00', '2017-04-13 00:00:00', 2, '2017-04-03 00:00:00', '2017-04-11 16:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `avatar_id` int(11) DEFAULT NULL,
  `hobby` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `great_man` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `point` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `age`, `gender`, `avatar_id`, `hobby`, `job`, `great_man`, `comment`, `point`) VALUES
(1, 'rimiko1', 'measd@asdf', '3707711fbda2357c06a24ccb08dcebc2026bf66c', 22, 2, 2147, 'piano', 'もっく', 'あｓｄ', 'あｓｄｆ', 11),
(2, 'ayumi', 'ayumi@ayumi', 'ecbd8af733a17803b66ee4321b23f87f103cc9ca', 24, 1, 483647, '歌', 'システムエンジニア', 'ビルゲイツ', 'あああああ', 11),
(3, 'naru', 'naru@naru', 'feac8c398d6ed455ec8c9eb6cf074571328a2672', 19, 2, 213647, 'スケボー', 'エンジニア', '孫正義', 'ｑｑｑｑｑｑｑｑ', 45),
(4, 'atsushi', 'atsushi@atsushi', '1c5aa4fe8dcfac2419277476df6c1e8def58f827', 23, 1, 21447, '筋トレ', '筋トレ', 'もりしー', 'ｄｄｄｄｄ', 13),
(5, 'eriko', 'eriko@eriko', 'e6dd2a0cb778fc799964f50a7661ea4649b9bc1e', 32, 2, 2147, 'プログラム', '先生', 'マーク・ザッカーバーグ', 'ｋｋｋｋｋ', 17),
(6, 'louis', 'loius@loius', 'd82ece8d514aca7e24d3fc11fbb8dada57f2966c', 29, 2, 21447, '旅', '旅人', '旅人', '旅人', 1000),
(7, 'yuki', 'yuki@yuki', 'a6aa6c594f3f904825833313c0bab3e292e95764', 28, 2, 23647, '旅', 'エンジニア', '関西人', 'ｋｄｆｊｄｋｄ', 125),
(8, 'manato', 'manato@manato', '81fca17fef08bdd0ad9298e9933c2373dbc5b912', 25, 1, 21474, 'たばこ', '商社', '特になし', 'かかかかか', 190);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatar`
--
ALTER TABLE `avatar`
  ADD PRIMARY KEY (`avatar_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_keywords`
--
ALTER TABLE `book_keywords`
  ADD PRIMARY KEY (`book_keyword_id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`keyword_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatar`
--
ALTER TABLE `avatar`
  MODIFY `avatar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `book_keywords`
--
ALTER TABLE `book_keywords`
  MODIFY `book_keyword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `keyword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
