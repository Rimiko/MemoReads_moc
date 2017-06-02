-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017 年 6 月 02 日 03:39
-- サーバのバージョン： 10.1.19-MariaDB
-- PHP Version: 5.6.28

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
-- テーブルの構造 `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `picture_url` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `detail` text,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `books`
--

INSERT INTO `books` (`book_id`, `title`, `category`, `picture_url`, `author`, `detail`, `created`, `modified`) VALUES
(1, 'すえずえ', 0, 'book1.jpg', '畠中恵', 'あああああああああ', '2017-05-10 00:00:00', '2017-05-11 16:00:00'),
(2, '君の名は', 0, 'book3.jpg', '新海誠', 'いいいいいいいいいいいいいい', '2017-05-04 00:00:00', '2017-05-05 16:00:00'),
(3, '夜は短し歩けよ乙女', 0, 'book4.jpg', '森見登美彦', 'うううううううううううう', '2017-05-21 00:00:00', '2017-05-22 16:00:00'),
(4, 'ip細胞', 0, 'book2.png', '山中伸弥', 'おおおおおおおおおおおお', '2017-04-17 00:00:00', '2017-05-07 16:00:00'),
(5, '継続的デリバリー', 0, 'ダウンロード.jpeg', 'わかりません', 'かかかかかかかかかかかかか', '2017-04-17 00:00:00', '2017-04-27 16:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
