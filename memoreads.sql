-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 6 朁E12 日 10:35
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
CREATE DATABASE IF NOT EXISTS `memoreads` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `memoreads`;

-- --------------------------------------------------------

--
-- テーブルの構造 `avatar`
--

DROP TABLE IF EXISTS `avatar`;
CREATE TABLE IF NOT EXISTS `avatar` (
  `avatar_id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar_path` varchar(255) NOT NULL,
  PRIMARY KEY (`avatar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `avatar`
--

INSERT INTO `avatar` (`avatar_id`, `avatar_path`) VALUES
(1, 'IMG_0243.jpg'),
(2, 'IMG_0934.jpg'),
(3, 'dog.jpg'),
(4, 'rimiko.png'),
(5, 'IMG_1696.jpg'),
(6, 'naru.png'),
(7, 'atsushi.png'),
(8, 'IMG_9754.jpg'),
(9, 'IMG_9780');

-- --------------------------------------------------------

--
-- テーブルの構造 `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `picture_url` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `detail` text,
  `api_id` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `books`
--

INSERT INTO `books` (`book_id`, `title`, `category`, `picture_url`, `author`, `detail`, `api_id`, `created`, `modified`) VALUES
(1, 'すえずえ', '0', 'http://books.google.com/books/content?id=dLqzoAEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '畠中恵', '若だんなのお嫁さん、ついに決定~!!お相手は、いったい誰?えっ、けど、仁吉や佐助、妖達とはお別れなの?', 'dLqzoAEACAAJ', '2017-05-10 00:00:00', '2017-05-11 16:00:00'),
(2, '小説君の名は。\r\n', '0', 'http://books.google.com/books/content?id=WrwCDQEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '新海誠', 'まだ会ったことのない君を、探している監督みずから執筆した映画原作小説\r\n', 'WrwCDQEACAAJ', '2017-05-04 00:00:00', '2017-05-05 16:00:00'),
(3, '夜は短し歩けよ乙女', '0', 'http://books.google.com/books/content?id=lm4MeGy991wC&printsec=frontcover&img=1&zoom=1&source=gbs_api', '森見登美彦', '「黒髪の乙女」にひそかに想いを寄せる「先輩」は、夜の先斗町に、下鴨神社の古本市に、大学の学園祭に、彼女の姿を追い求めた。けれど先輩の想いに気づかない彼女は、頻発する“偶然の出逢い”にも「奇遇ですねえ!」と言うばかり。そんな2人を待ち受けるのは、個性溢れる曲者たちと珍事件の数々だった。山本周五郎賞を受賞し、本屋大賞2位にも選ばれた、キュートでポップな恋愛ファンタジーの傑作!', 'lm4MeGy991wC', '2017-05-21 00:00:00', '2017-05-22 16:00:00'),
(4, '生命の未来を変えた男', '', 'http://books.google.com/books/content?id=7tCVoAEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'NHKスペシャル取材班/山中伸弥', 'ノーベル賞を受賞した山中伸弥京大教授が発見したiPS細胞は、生命の未来を変える可能性を秘めた万能細胞だ。再生医療に創薬、臓器工場からキメラ動物まで、日々研究が加速するiPS細胞の最前線をNHKのスタッフが徹底レポートする。立花隆と国谷裕子、山中教授による「生命の神秘」をテーマにした鼎談インタビューも収録', '7tCVoAEACAAJ', '2017-04-17 00:00:00', '2017-05-07 16:00:00'),
(5, '継続的デリバリー', '0', 'http://books.google.com/books/content?id=v3eetgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'ジェズハンブル', '', 'v3eetgAACAAJ', '2017-04-17 00:00:00', '2017-04-27 16:00:00'),
(6, '三毛猫ホームズのびっくり箱', '文学', 'http://books.google.com/books/content?id=nT9OCvvwrEUC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '赤川次郎', '箱が人を殺したって......? なにせ密室の中で殺人が起こって、そこには死体と箱しかなかったというのだ。食べきれないほどのごちそうを期待して、パーティーに出かけた石津、片山刑事の前に出されたのは、こんな難題だった。またまた怪奇事件発生!! 毎度おなじみの三人と三毛猫ホームズが、家庭内の複雑な憎しみがもたらした、この事件のトリックに挑戦した。──他に「三毛猫ホームズの披露宴」など6編を収録した絶好調の人気シリーズ!', 'nT9OCvvwrEUC', '2017-06-05 23:04:35', '2017-06-05 02:41:31'),
(7, 'ヤバい心理学', '心理学', 'http://books.google.com/books/content?id=1WBHDgAAQBAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '神岡真司', '「ヤバすぎる」心理ツールだけを厳選しました！ 他人の言動の裏に潜む「心」の正体を知りたい―。自分の気持ちや考えのベースになっている「本音」を理解しておきたい―。私たちは、いつだってこんな願望に支配されているのです。人は相手の気持ちや本音、その場の状況等、あらゆることが気になります。と同時、自分の想いや本音を伝えたい、逆に知られたくないという考えもあります。つまり、人には「心」というものが存在し、それを把握することを望んでいるのです。本書では、そんな「心」の真実を知れる「ヤバすぎる」ツールがギュッと凝縮されているのです。', '1WBHDgAAQBAJ', '2017-06-06 07:13:08', '2017-06-04 16:00:00'),
(8, '継続的に売れるセールスパーソンの行動特性88', 'Contracts', 'http://books.google.com/books/content?id=-M6VQgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '千田琢哉', '自分自身でも経験し、日々のクライアントの問題解決でも向き合わざるを得なかった“継続的に売れる”セールスパーソンへの道―。', '-M6VQgAACAAJ', '2017-06-06 05:07:08', '2017-06-11 16:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `book_keywords`
--

DROP TABLE IF EXISTS `book_keywords`;
CREATE TABLE IF NOT EXISTS `book_keywords` (
  `book_keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`book_keyword_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `book_keywords`
--

INSERT INTO `book_keywords` (`book_keyword_id`, `book_id`, `keyword_id`, `user_id`, `created`) VALUES
(1, 1, 1, 2, '2017-04-02 00:00:00'),
(2, 1, 2, 5, '2017-04-06 00:00:00'),
(3, 1, 3, 6, '2017-04-14 00:00:00'),
(4, 1, 4, 7, '2017-04-21 00:00:00'),
(5, 1, 12, 7, '0000-00-00 00:00:00'),
(6, 2, 1, 2, '2017-05-16 00:00:00'),
(7, 2, 2, 7, '2017-05-17 00:00:00'),
(8, 4, 12, 9, '2017-05-16 00:00:00'),
(9, 3, 9, 6, '2017-06-05 00:00:00'),
(10, 6, 2, 3, '2017-06-06 00:00:00'),
(11, 6, 9, 5, '2017-06-12 00:00:00'),
(12, 2, 3, 3, '2017-06-07 00:00:00'),
(13, 2, 4, 8, '2017-06-02 00:00:00'),
(14, 2, 8, 4, '2017-06-05 00:00:00'),
(15, 3, 1, 9, '2017-05-24 00:00:00'),
(16, 3, 5, 3, '2017-06-05 00:00:00'),
(17, 3, 6, 22, '0000-00-00 00:00:00'),
(18, 5, 2, 4, '2017-05-17 00:00:00'),
(19, 5, 4, 2, '2017-06-01 00:00:00'),
(20, 5, 8, 2, '2017-06-01 00:00:00'),
(21, 7, 3, 2, '2017-05-16 00:00:00'),
(22, 7, 5, 1, '2017-06-06 00:00:00'),
(23, 8, 1, 2, '2017-05-25 00:00:00'),
(24, 8, 3, 1, '2017-06-07 00:00:00'),
(25, 8, 7, 2, '2017-06-08 00:00:00');

-- --------------------------------------------------------

--
-- テーブルの構造 `keywords`
--

DROP TABLE IF EXISTS `keywords`;
CREATE TABLE IF NOT EXISTS `keywords` (
  `keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(256) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`keyword_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

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
-- テーブルの構造 `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `record_id` int(11) NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- テーブルのデータのダンプ `likes`
--

INSERT INTO `likes` (`like_id`, `user_id`, `record_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 5),
(5, 1, 3),
(6, 1, 4),
(7, 1, 5),
(8, 3, 1),
(9, 3, 2),
(10, 3, 3),
(11, 3, 4),
(12, 3, 5),
(13, 3, 7),
(14, 3, 8),
(15, 3, 10),
(16, 4, 1),
(17, 4, 2),
(18, 5, 1),
(19, 5, 3),
(20, 5, 4),
(21, 5, 5),
(22, 6, 1),
(23, 6, 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `records`
--

DROP TABLE IF EXISTS `records`;
CREATE TABLE IF NOT EXISTS `records` (
  `record_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `review` varchar(256) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `book_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `records`
--

INSERT INTO `records` (`record_id`, `user_id`, `stars`, `review`, `start_date`, `end_date`, `book_id`, `created`, `modified`) VALUES
(1, 1, 4, 'aaaaaaaaaaaa', '2017-04-03 00:00:00', '2017-04-12 00:00:00', 1, '2017-05-02 00:00:00', '2017-06-01 16:00:00'),
(2, 1, 3, 'lkjlkjljlkj', '2017-04-18 00:00:00', '2017-04-22 00:00:00', 4, '2017-04-13 00:00:00', '2017-04-20 16:00:00'),
(3, 4, 5, 'asdffdsa', '2017-04-17 00:00:00', '2017-04-21 00:00:00', 3, '2017-04-24 00:00:00', '2017-04-28 16:00:00'),
(4, 2, 5, 'asdfdasdf', '2017-04-10 00:00:00', '2017-04-14 00:00:00', 2, '2017-04-12 00:00:00', '2017-04-20 16:00:00'),
(5, 4, 2, 'asdfasdf', '2017-04-11 00:00:00', '2017-04-13 00:00:00', 2, '2017-04-03 00:00:00', '2017-04-11 16:00:00'),
(6, 3, 5, 'ghghghghghghgh', '2017-05-09 00:00:00', '2017-05-17 00:00:00', 1, '2017-06-02 00:00:00', '2017-06-02 16:00:00'),
(7, 5, 5, 'a;sldkfja;lskf', '2017-05-16 00:00:00', '2017-05-22 00:00:00', 5, '2017-05-09 00:00:00', '2017-05-15 16:00:00'),
(8, 2, 5, 'wrtwert', '2017-06-07 00:00:00', '2017-06-09 00:00:00', 3, '2017-05-23 00:00:00', '2017-05-30 16:00:00'),
(9, 3, 5, 'gggggg', '2017-05-24 00:00:00', '2017-05-24 00:00:00', 2, '2017-05-25 00:00:00', '2017-05-23 16:00:00'),
(10, 1, 5, 'sdfgsdfg', '2017-05-25 00:00:00', '2017-05-31 00:00:00', 5, '2017-05-24 00:00:00', '2017-05-29 16:00:00'),
(11, 3, 4, '3456', '2017-06-06 00:00:00', '2017-06-07 00:00:00', 4, '2017-06-05 00:00:00', '2017-06-06 16:00:00'),
(12, 3, 5, 'asdffdsasdffdsa', '2017-06-01 00:00:00', '2017-06-13 00:00:00', 3, '2017-06-04 00:00:00', '2017-06-07 16:00:00'),
(13, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '2017-06-12 06:23:51');

-- --------------------------------------------------------

--
-- テーブルの構造 `record_keyword`
--

DROP TABLE IF EXISTS `record_keyword`;
CREATE TABLE IF NOT EXISTS `record_keyword` (
  `record_keyword_id` int(11) NOT NULL AUTO_INCREMENT,
  `record_id` int(11) NOT NULL,
  `keyword_id` int(11) NOT NULL,
  PRIMARY KEY (`record_keyword_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `record_keyword`
--

INSERT INTO `record_keyword` (`record_keyword_id`, `record_id`, `keyword_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 5),
(4, 2, 1),
(5, 2, 3),
(6, 2, 2),
(7, 4, 3),
(8, 5, 3),
(9, 2, 6),
(10, 5, 1),
(11, 3, 1),
(12, 3, 4),
(13, 4, 2),
(14, 4, 6),
(15, 6, 1),
(16, 6, 5);

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `point` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `age`, `gender`, `avatar_id`, `hobby`, `job`, `great_man`, `comment`, `point`, `created`) VALUES
(1, 'RImiko', 'rf181.0624.t@gmail.com', '3707711fbda2357c06a24ccb08dcebc2026bf66c', 22, 2, 5, 'piano', 'student', 'asd', 'cccc', 140, '0000-00-00 00:00:00'),
(2, 'AYUMI', 'ayumi@ayumi', 'ecbd8af733a17803b66ee4321b23f87f103cc9ca', 24, 2, 1, '', '', '', '', 0, '0000-00-00 00:00:00'),
(3, 'naru', 'naru@naru', 'feac8c398d6ed455ec8c9eb6cf074571328a2672', 19, 1, 3, 'スケボー', 'エンジニア', '孫正義', 'ｑｑｑｑｑｑｑｑ', 45, '0000-00-00 00:00:00'),
(4, 'atsushi', 'atsushi@atsushi', '1c5aa4fe8dcfac2419277476df6c1e8def58f827', 23, 1, 4, '筋トレ', '筋トレ', 'もりしー', 'ｄｄｄｄｄ', 13, '0000-00-00 00:00:00'),
(5, 'eriko', 'eriko@eriko', 'e6dd2a0cb778fc799964f50a7661ea4649b9bc1e', 32, 2, 6, 'プログラム', '先生', 'マーク・ザッカーバーグ', 'ｋｋｋｋｋ', 17, '0000-00-00 00:00:00'),
(6, 'LOUIS', 'loius@loius', 'd82ece8d514aca7e24d3fc11fbb8dada57f2966c', 29, 1, 7, '旅', '旅人', '旅人', '旅人', 1000, '0000-00-00 00:00:00'),
(7, 'YUKII', 'yuki@yuki', 'a6aa6c594f3f904825833313c0bab3e292e95764', 28, 2, 6, '旅', 'エンジニア', '関西人', 'ｋｄｆｊｄｋｄ', 125, '0000-00-00 00:00:00'),
(8, 'MANATO', 'manato@manato', '81fca17fef08bdd0ad9298e9933c2373dbc5b912', 25, 1, 8, 'たばこ', '商社', '特になし', 'かかかかか', 190, '0000-00-00 00:00:00'),
(9, 'SINNYA', 'sinya@sinya', '70c881d4a26984ddce795f6f71817c9cf4480e79', 26, 1, 9, 'PC', '最強のエンジニア', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(10, 'A', 'a@a', '01464e1616e3fdd5c60c0cc5516c1d1454cc4185', 20, 2, 4, 'aaa', 'aaa', 'aaa', 'aaa', 100, '0000-00-00 00:00:00'),
(11, 'koko', 'koko', 'koko', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00'),
(12, 'aaaa', 'aaaa@aaaa', '70c881d4a26984ddce795f6f71817c9cf4480e79', 20, NULL, 2, 'dekitakana', 'aaaa', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(13, '福光理美子', 'rf181.0624.t@gmail.com', '319d77898adf71dbb3259025a5e5a467d4eaaee7', 20, 2, 2, '音楽', '学生', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(14, '接続確認', 'setsuzoku@setsuzoku', '1b90dba8d09d2ee9e7d16adc858feb67bec1b9a1', 20, 1, 2, '接続', '接続', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(15, '福光理美子', 'rf181.0624.t@gmail.com', '319d77898adf71dbb3259025a5e5a467d4eaaee7', 10, 2, 1, '', '', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(16, 'RIMIKO', 'rf181.0624.t@gmail.com', '319d77898adf71dbb3259025a5e5a467d4eaaee7', 20, 2, 3, 'piannno', 'studenttt', NULL, NULL, NULL, '0000-00-00 00:00:00'),
(17, 'RIMIKO', 'rrrr@rrrr', 'e950c1517ee0d7e20454d22c306c4c501a7cf11c', 20, 2, 0, 'piannno', 'studenttt', 'dddd', 'asdasdf', 0, '0000-00-00 00:00:00'),
(18, 'kakaka', 'kakaka@kakaka', '57c3dd950b3072ca042bd3f85e67c7bd1cf8a03f', 20, 2, 2, '', '', NULL, NULL, NULL, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
