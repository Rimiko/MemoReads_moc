-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 6 朁E19 日 03:41
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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

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
(8, '継続的に売れるセールスパーソンの行動特性88', 'Contracts', 'http://books.google.com/books/content?id=-M6VQgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '千田琢哉', '自分自身でも経験し、日々のクライアントの問題解決でも向き合わざるを得なかった“継続的に売れる”セールスパーソンへの道―。', '-M6VQgAACAAJ', '2017-06-06 05:07:08', '2017-06-11 16:00:00'),
(9, 'あああ', '0', 'asdf.jpg', 'asdfas', 'asdfasdfasdfa', 'asdfasdf', '2017-06-20 00:00:00', '2017-06-06 16:00:00'),
(10, '八日目の蝉', NULL, 'http://books.google.com/books/content?id=5RssAQAAIAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '角田光代', '逃げて、逃げて、逃げのびたら、私はあなたの母になれるのだろうか。理性をゆるがす愛があり、罪にもそそぐ光があった。角田光代が全力で挑む長篇サスペンス。', '5RssAQAAIAAJ', '2017-06-14 07:29:22', '2017-06-13 23:29:22'),
(11, '君し旅ゆく', NULL, 'http://books.google.com/books/content?id=3YLiAAAAMAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '裕仁 (Emperor of Japan)', 'なし', '3YLiAAAAMAAJ', '2017-06-15 08:47:58', '2017-06-15 00:47:58'),
(12, 'Cisco Access Control Security', NULL, 'http://books.google.com/books/content?id=JK4wrT7e6icC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'Brandon Carroll', '* *Improve security for network users connecting from home or remote offices *Build safer, more secure and accessible telecommuter networks *Master authentication, authorization, and account management for users connecting from unsecure sites into the secure corporate network *Review deployment and management strategies for the Cisco Secure ACS product line', 'JK4wrT7e6icC', '2017-06-15 12:32:49', '2017-06-15 04:32:49'),
(13, '君の膵臓をたべたい', NULL, 'http://books.google.com/books/content?id=oTLTsgEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '住野よる', '偶然、僕が拾った1冊の文庫本。それはクラスメイトである山内桜良が綴った、秘密の日記帳だった―圧倒的デビュー作!', 'oTLTsgEACAAJ', '2017-06-15 12:39:58', '2017-06-15 04:39:58'),
(14, 'また、同じ夢を見ていた', NULL, 'http://books.google.com/books/content?id=sqRujwEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '住野よる', 'きっと誰にでも「やり直したい」ことがある。学校に友達がいない“私”が出会ったのは手首に傷がある“南さん”とても格好いい“アバズレさん”一人暮らしの“おばあちゃん”そして、尻尾の短い“彼女”だった―', 'sqRujwEACAAJ', '2017-06-15 12:50:56', '2017-06-15 04:50:56'),
(15, '君の膵臓をたべたい / 上', NULL, 'http://books.google.com/books/content?id=AO8TDgAAQBAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '住野よる', 'なし', 'AO8TDgAAQBAJ', '2017-06-15 16:58:13', '2017-06-15 08:58:13'),
(16, 'Hello, light ~loundraw art works~', NULL, 'http://books.google.com/books/content?id=QUVLMQAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'loundraw', '大人気イラストレーター、初作品集。数々の名著を彩った装画や厳選オリジナルイラストを多数掲載。『君の膵臓をたべたい』『また、同じ夢を見ていた』など、大人気ベストセラーの秘蔵ラフ画、イラストレーター自身による制作過程の解説。loundraw×住野よる、書き下ろし短編&イラスト「夢の名残」も収録。', 'QUVLMQAACAAJ', '2017-06-15 17:01:22', '2017-06-15 09:01:22'),
(17, 'HTML5マークアップ入門', NULL, 'http://books.google.com/books/content?id=ZEKtcwHYKkIC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'なし', 'なし', 'ZEKtcwHYKkIC', '2017-06-16 12:12:52', '2017-06-16 04:12:52'),
(18, '君の名は', NULL, 'http://books.google.com/books/content?id=PWYsAQAAIAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'Kazuo Kikuta', 'なし', 'PWYsAQAAIAAJ', '2017-06-16 12:17:08', '2017-06-16 04:17:08'),
(19, '希望は君の瞳の中に', NULL, 'http://books.google.com/books/content?id=dpsNDAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'スーザン・ブロックマン', 'もう一度、海軍特殊部隊SEALの現役に復帰したい。ひざに重傷を負って以来それだけを生きる望みとしていたフリスコは、回復の見込みなしという医師の宣告に愕然とした。自暴自棄になった彼は、酒に溺れる日々を送るようになる。いまは誰ともかかわりたくない―それなのに、姉に頼みこまれて5歳の姪をあずかるはめになってしまった。小さな女の子の世話など、どうすればいいんだ?途方に暮れるフリスコに手を差し伸べたのは、美しい隣人マイアだった。', 'dpsNDAAAQBAJ', '2017-06-16 12:22:09', '2017-06-16 04:22:09'),
(20, '香港・希望', NULL, 'http://books.google.com/books/content?id=4acoAQAAIAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '徐凱欣', 'なし', '4acoAQAAIAAJ', '2017-06-16 17:22:05', '2017-06-16 09:22:05'),
(21, '香港人情味小吃，港仔的巷弄老味道60+', NULL, 'http://books.google.com/books/content?id=1pI9DAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '吳家輝', '?品嚐老香港，最幸福的吃貨人生。 為了這裡的雞蛋仔，就是陳奕迅也要和太太拍拖到筲箕灣排隊等著吃！ 是何處的牛雜老字號，讓周潤發、吳鎮宇也成為座上賓？ 最愛港式老火湯？各式好舖讓你喝個過癮，還有湯料可以回家自煮。 想吃好牛腩？坑腩爽腩牛面珠墩就算非熟客也能任意選，一次吃個爽！ 生滾粥、腸粉、魚蛋粉、豬扒包、菠蘿油…守著家傳好味，背負著店租飛漲的壓力，讓一眾吃貨更愛那不變的情懷。 一家家香港巷弄老舖，隨著店租高漲，紛紛關門停業。所幸仍有不少老舖好食隱身在一棟棟大樓、連鎖商店裡苦心經營著，好將讓人依戀的老味道繼續提供給街坊食客。吃貨吳家輝最愛鑽入小街巷道，搜羅那總是讓人魂縈夢繫的傳統古早味，粥粉麵店、茶餐廳、點心舖、餅家…僅是為了這些老舖好味，就讓人好想立刻飛到香港，進行一趟幸福懷舊的好吃旅行。 ◎忘不了的香港老味道 傳統飲茶、廣東粥、車仔麵、煲仔飯…經典的香港老味道總是讓人魂牽夢縈。 ◎在地人才知道的街頭好食 小攤車、美食街店舖，哪一攤好吃？只有在地人最知道。 ◎不藏私的口袋秘店 收在口袋的美味愛店，也只好不藏私地公開分享。 ◎正港美味伴手 不但能將香港美味記憶帶回家，還有簡易食譜試做正宗港味。 【本書特色】 1.港仔的巷弄秘店第二彈！ 2.聚焦香港巷弄間的美食，品嚐道地老香港滋味。 3.採買最佳伴手禮，並附上簡易食譜，延續香港美味記憶。 4.每篇皆附上店家資訊、交通方式和推薦菜單。 5.以餐廳所在地點整理索引編目，方便讀者快速找到喜愛的餐廳。 【譚詠麟感動推薦】 「民以食為天」，飲食是人生存之基本條件。 在香港這個繁榮的都市，一個小小的地方充斥著這些具有特色及人情味濃厚的小店，為營營役役生活下的狹縫中為人生增添一抹色彩，你的大杯酒、大塊肉，跟我的半肥瘦叉燒、雲?麵同樣滋味。 這樣的小店也體會了傳承的精神，除了手藝，還有長輩們的夢想就在小店中延續下去。 看到這本書，令我想起了小時候媽媽只用了麵粉、糖、雞蛋、油，就弄出了香氣四溢兼黃澄澄的賀年糕點，一班兄弟姊妹你一塊我一塊吃個不停，家人之間的感情就是這樣吃出來了。 飽餐一頓不難。品嚐美味，看似不難，委實在於甲之熊掌，乙之砒霜。品嚐美味之餘卻又可以感受食物背後的故事，體會人生之起落及社會之變遷，家輝這本書就能令人從食物中細味人生。 出版社 墨刻(城邦)', '1pI9DAAAQBAJ', '2017-06-16 17:32:03', '2017-06-16 09:32:03'),
(22, '紅（あか）い三日月', NULL, 'http://books.google.com/books/content?id=Q8EQCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'ヒキタクニオ', '殺すことで、私は変わるのか？ 幸せな将来を捨て、彼女がなろうとしたのは“殺し屋”。傷ついた者たちに安息の時は訪れるのか——。大藪春彦賞作家が満を持して放つ衝撃作。父・清隆（きよたか）を銃殺した杉山（すぎやま）と帰宅後、不運にも鉢合わせした塔子（とうこ）は、重傷を負わされてしまう。かろうじて一命を取りとめたものの、半年間の昏睡状態に陥ったのち、奇跡的に目覚めた。犯人・杉山への判決に納得がいかない塔子に、担当刑事の犬伏（いぬぶし）は、「捜査に強い圧力がかかり、十分な捜査ができなかった」と告げる。さらに犬伏は、警察も捜査できない事件を扱う文目屋（あやめや）なる“殺しの集団”の存在を塔子に明かすのだった……。 【PHP研究所】', 'Q8EQCwAAQBAJ', '2017-06-16 17:37:14', '2017-06-16 09:37:14'),
(23, '自然的紅燈', NULL, 'http://books.google.com/books/content?id=JDt8AAAAIAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '林俊義', 'なし', 'JDt8AAAAIAAJ', '2017-06-16 17:45:33', '2017-06-16 09:45:33'),
(24, '大自然', NULL, 'http://books.google.com/books/content?id=PR5MAQAAIAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'なし', 'なし', 'PR5MAQAAIAAJ', '2017-06-16 17:50:44', '2017-06-16 09:50:44'),
(25, '從帝大到臺大', NULL, 'http://books.google.com/books/content?id=cTRSE-E_vUsC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'なし', '本书汇集了在1930年至1950年间进入台大读书、服务的校友及师长们的台大经验,通过他们对人生的历史回顾,叙述了台大从1928年创校光复前后的历史.', 'cTRSE-E_vUsC', '2017-06-16 18:32:16', '2017-06-16 10:32:16'),
(26, '新海誠監督作品君の名は。公式ビジュアルガイド', NULL, 'http://books.google.com/books/content?id=cbw8vgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '角川書店', '新海誠監督のビジュアル満載の映画『君の名は。』公式ビジュアルガイド', 'cbw8vgAACAAJ', '2017-06-16 21:17:29', '2017-06-16 13:17:29'),
(27, '潮騒', NULL, 'http://books.google.com/books/content?id=XekNDAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'シャーロット・ラム', '高名なピアニストだった祖父にピアノを教わりながら、マリナは海辺の山荘で、俗世間と隔たれた日々を送っている。ある日、祖父とひっそり暮らす山荘に、ギデオンと名乗るハンサムな旅行客が滞在することになった。初対面なのになぜか懐かしさを覚え、彼に惹かれるマリナだが、一方の祖父は冷淡な態度で、まるで彼を憎んでいるかのよう。いったいどうしてかしら...いぶかしむマリナは数日後、ふと美しいピアノの旋律を耳にする。弾いているのは...ギデオン?次の瞬間マリナは思い出した―心に封印していた残酷な記憶を。', 'XekNDAAAQBAJ', '2017-06-16 21:56:29', '2017-06-16 13:56:29'),
(28, '顔相BOOK', NULL, 'http://books.google.com/books/content?id=22SBs3Z-P2EC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'マガジンハウス', 'なし', '22SBs3Z-P2EC', '2017-06-16 21:58:22', '2017-06-16 13:58:22'),
(29, 'デフォルメ似顔絵で読み解く顔相診断', NULL, 'http://books.google.com/books/content?id=PTz5nQEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '渡辺孝行', '10年間で約7万人の人物を描いてきた世界一のデフォルメ似顔絵師だからわかる顔相の秘密。', 'PTz5nQEACAAJ', '2017-06-16 22:02:01', '2017-06-16 14:02:01'),
(30, '本を読む子を育てる', NULL, 'http://books.google.com/books/content?id=2y7y36mlsIUC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'なし', 'なし', '2y7y36mlsIUC', '2017-06-16 22:03:41', '2017-06-16 14:03:41'),
(31, 'マスペディア1000', NULL, 'http://books.google.com/books/content?id=IYlXMQAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'リチャードエルウィス', '解析・幾何・代数から数学パズルまで、数学の全ジャンルを1000項目で読む数学事典。サイエンスペディア姉妹編の数学版!', 'IYlXMQAACAAJ', '2017-06-17 09:04:47', '2017-06-17 01:04:47'),
(32, '告白', NULL, 'http://books.google.com/books/content?id=7QeGcgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '湊かなえ', '「愛美は死にました。しかし事故ではありません。このクラスの生徒に殺されたのです」我が子を校内で亡くした中学校の女性教師。終業式のホームルームでの告白から、この物語は始まる。「級友」「犯人」「犯人の家族」と次々に変わる語り手によって、次第に事件の全体像が浮き彫りにされていく。', '7QeGcgAACAAJ', '2017-06-17 09:10:58', '2017-06-17 01:10:58'),
(33, '告白', NULL, 'http://books.google.com/books/content?id=sCfrRgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '湊かなえ', '「愛美は死にました。しかし事故ではありません。このクラスの生徒に殺されたのです」我が子を校内で亡くした中学校の女性教師によるホームルームでの告白から、この物語は始まる。語り手が「級友」「犯人」「犯人の家族」と次々と変わり、次第に事件の全体像が浮き彫りにされていく。衝撃的なラストを巡り物議を醸した、デビュー作にして、第6回本屋大賞受賞のベストセラーが遂に文庫化!“特別収録”中島哲也監督インタビュー『「告白」映画化によせて』。', 'sCfrRgAACAAJ', '2017-06-17 09:11:57', '2017-06-17 01:11:57'),
(34, '風の谷のナウシカ', NULL, 'http://books.google.com/books/content?id=12bsAAAAMAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '宮崎駿', 'Original storyboards. A story about the earth polluted after a global war. A girl named Naushika, who can talk and understand Omu, a strange animal in the new world, finds herself as a saviour.', '12bsAAAAMAAJ', '2017-06-17 09:12:26', '2017-06-17 01:12:26'),
(35, '春夏食療特效食譜', NULL, 'http://books.google.com/books/content?id=zPBoCgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', ' 洪尚綱', '當令食補養生．健康活到天年 春養肝、夏養心，無病一身輕 中醫養生智慧，天然食補調理 養生靠自己，提高免疫力 做好自我健康管理 ● 春夏食療10大明星食材全公開 ● 營養師推薦168道養生元氣料理 ● 中醫師專業建議：春夏食養生活保健妙招 你今天吃對了嗎？ 省錢進補，發揮最大食療功效 吃出活力與健康 聰明健身就在生活實踐中！ ● 春夏季節如何正確進補，你知道嗎？ ● 春天容易傷風感冒，如何防治？ ● 吃對了，夏天火氣大自然都消了？ ● 小心吹冷氣引發中暑，花錢又傷身？ ● 喝錯飲料，身體反而越喝越渴？ ● 清涼飲料無法消暑，反而傷腸胃？ 身體健康的關鍵：順時養生 保健身體要從一年之初春季開始。春夏養陽，百病不侵，健康活到天年！ 中醫強調「順食養生」，主張春、夏、秋、冬四個季節，有各自的養生重點。瞭解食物屬性，對症食補，順應自然變化，掌握健康關鍵秘訣，從春季開始進行保養，效果加倍；春天不感冒、夏天不火大，就連秋冬常見毛病問題，也能一次解決；身體健康、抵抗力強，自然不生病！ 本書特色 ◎168道調養體質健康料理 飲食決定健康，專家推薦10大類春夏養身天然食材，設計168道幸福養身的美味簡易家常料理，詳細分析營養成分與功效，發揮驚人食療效果；享受美食，同時吃出健康。 ◎中醫養生秘訣漢方調理 專業中醫養生觀念，教您從根本保養身體，食療保健、穴位按摩、運動鍛鍊強身，用簡單不花錢、自然無負擔的方法，增強體質，為健康加分。 ◎養生達人提供居家保健自療法 專家現身說法，從飲食、穿著、生活習慣、居家環境，全方位說明，告訴您如何居家自我保健，正確養生得健康。 目錄 【作者自序】 當令進補 健康加分 洪尚綱 中醫師 【營養師序】 冬病夏治 養生事半功倍 蕭千祐 營養師 Part1 不能不知的春夏養生新主張 Q1 春夏季節也要保養身體？ Q2 春夏季節的養生重點？ Q3 春天涼爽宜人，卻容易感冒？ Q4 「春季癢」是怎麼一回事？ Q5 夏天如何降火氣？ Q6 春夏兩季可以進補嗎？ Q7 吃冰、吹冷氣是消暑最佳良方？ Q8 春季如何用穴位按摩保健身體？ Q9 夏季如何用穴位按摩趕走煩躁？ Part 2 168道春夏食療特效食譜 春夏養生食材1蔬菜類（芹菜、韭菜、大白菜、空心菜、油菜花、菠菜、花椰菜、高麗菜、番薯葉、青江菜、茼蒿、番薯、牛蒡、紅蘿蔔、蘆筍、茭白筍、竹筍、白蘿蔔、百合、馬鈴薯、洋蔥、山藥、愛玉、豌豆、毛豆、四季豆、黃豆芽） ●香芹涼拌海蜇 ●酸甜韭菜翡翠卷 ●紅豆白菜湯 ●蝦米空心菜 ●蔥醬香拌油菜花 ●綠菠炒金玉木耳 ●清炒鮮筍綠花椰 ●高麗菜炒雞肉 ●蟹絲燴番薯葉 ●蔬果養生飲 ●萵苣蘋果汁 ●養生紫薯粥 ●牛蒡雞肉清湯 ●紅蘿蔔洋芋湯 ●蘆筍蘿蔔湯 ●香菇炒茭白筍 ●黃瓜鮮筍拌蝦仁 ●蘿蔔絲炒豬肉 ●百合炒雞絲 ●綠芹洋芋蛋沙拉 ●糖醋涼拌三絲 ●高纖蘋果山藥絲 ●清涼檸檬愛玉凍 ●豌豆洋蔥糙米飯 ●紅茄毛豆燜香菇 ●鮮甜四季豆炒蛋 ●銀芽炒油豆腐 春夏養生食材2瓜果類（茄子、苦瓜、胡瓜、絲瓜、南瓜、秋葵、玉米、玉米筍、小黃瓜、甜椒、番茄、冬瓜、青椒） ●退火紫茄粥 ●清心苦瓜排骨湯 ●脆瓜金針排骨湯 ●樹子絲瓜 ●金瓜炒米粉 ●秋葵香拌豆腐 ●金黃玉米燴甜豆 ●三彩鮮蔬炒肉片 ●小黃瓜炒肉絲 ●紅甜椒炒烏魚 ●紅茄燴鱸魚 ●清涼冬瓜鳳梨汁 ●蜂蜜蔬果汁 春夏養生食材3水果類（奇異果、桑椹、梅子、西瓜、紅棗、枇杷、鳳梨、百香果、木瓜、荔枝、芒果、香瓜、檸檬、蓮霧、梨子、柿子、甘蔗、番石榴、草莓、桃子、香蕉、烏梅、哈密瓜、葡萄柚、水蜜桃、蘋果、櫻桃） ●養生奇異果炒飯 ●冰糖桑椹燕麥粥 ●紅燒梅香百頁 ●西瓜銀耳甜湯 ●紅棗仙楂肉片湯 ●枇杷海鮮沙拉 ●生菜鮭魚鬆 ●百香鮮蝦沙拉 ●明蝦時蔬木瓜塔 ●百合清炒荔枝 ●芒果涼拌鮮貝 ●鮮甜香瓜鱈魚 ●青檸香烤鱈魚 ●蓮霧鮮橙汁 ●黃瓜香梨汁 ●西瓜蜜梨汁 ●山藥甘蔗汁 ●番石榴奇異果汁 ●酸甜莓果紅茶 ●美顏果醋飲 ●濃醇香蕉芝麻豆漿 ●桂香烏梅雪泥 ●香甜哈密瓜雪泥 ●莓果葡萄柚冰沙 ●百香水蜜桃冰沙 ●優格雙果沙拉 ●百香繽紛水果塔 春夏養生食材4五穀雜糧、堅果、豆類（薏仁、紫米、糙米、燕麥、蓮子、蕎麥、花生、核桃、松子、芝麻、黃豆、綠豆、紅豆） ●退火薏仁糙米茶 ●腰果紫米飯 ●養生三豆糙米飯 ●冰糖燕麥甜粥 ●金針蓮子湯 ●蘋果醋拌蕎麥涼麵 ●紅白蘿蔔滷花生 ●香炒核桃秋葵 ●枸杞松子翡翠蛋 ●芝麻香炒牛蒡 ●香芹黃豆清湯 ●芝麻綠豆飯 ●椰香綠豆沙 ●抹茶甜薯紅豆麻糬 ●紅豆杏仁豆腐 春夏養生食材5菇蕈類（杏鮑菇、香菇、柳松菇、鴻禧菇、蘑菇、秀珍菇、竹笙、金針菇、草菇、美白菇、黑木耳、白木耳） ●和風涼拌什錦菇 ●香菇芥菜湯 ●鮮菇炒豌豆苗 ●柳松菇燴綠花椰 ●鮮美野菇魚片粥 ●蘑菇燴青江菜 ●野菇炒鮮蔬 ●清蒸彩蔬秀珍菇 ●枸杞雙菇炒蛋 ●蘆筍炒竹笙 ●甜豆清炒金針菇 ●鮮蟳燴草菇 ●黃瓜清炒美白菇 ●時蔬炒木耳 ●冰糖銀耳雞蛋羹 春夏養生食材6海藻類（珊瑚草、海帶、海帶芽、紫菜、海藻、洋菜） ●彩蔬涼拌珊瑚草 ●排毒芝麻海帶湯 ●薑炒木須海帶絲 ●辣味昆布牛蒡絲 ●海帶芽小排粥 ●山藥蘿蔔涼拌海帶芽 ●黃豆涼拌海帶芽 ●紫菜芝麻拌飯 ●紫菜炒蛋 ●檸香海藻冷麵 ●蘋果海藻沙拉 ●滑嫩仙草凍 ●寒天金薯泥 春夏養生食材7香料類（薄荷、大蒜、薑、蔥、蒜苗、胡椒、辣椒） ●清爽薄荷粥 ●薄荷蘆薈水晶凍 ●薄荷青草茶 ●排毒蒜香炒飯 ●山藥南瓜拌香蒜 ●薑汁燒肉蓋飯 ●香梨蜂蜜薑茶 ●蔥燒豬肉 ●青蔥糙米粥 ●黃(魚善)炒蒜苗 ●蒜苗炒香腸 ●胡椒香拌甜豆 ●箭筍辣炒雞絲 春夏養生食材8肉類（動物肝臟、豬肉、牛肉、羊肉、雞肉） ●塔香三鮮豬肝麵 ●肉排佐三絲 ●四季豆烤肉捲 ●鮮菇瘦肉粥 ●牛肉粉絲煲 ●紅酒醋拌銀芽牛肉 ●香根牛肉 ●金瓜燴羊肉 ●豌豆苗燉羊肉 ●白菜燴雞肉 ●香煎金針嫩雞 春夏養生食材9海鮮類（鮪魚、鮭魚、海鰻、鱔魚、黃魚、白帶魚、虱目魚、蝦、干貝、墨魚、軟絲、透抽、蜆、魷魚、蛤蜊、鳳螺、海瓜子） ●爭鮮生魚片 ●金黃鳳梨鮭魚拌飯 ●蒲燒鰻豆皮壽司 ●鮮蔬炒鱔魚 ●蒜子燒黃魚 ●香檸青蔥燴帶魚 ●樹子虱目魚 ●芒果炒鮮蝦 ●彩蔬炒干貝 ●蒜味涼拌墨魚 ●柚香墨魚鮮沙拉 ●甜豆炒軟絲 ●蘆筍炒透抽 ●蒜味涼拌鮮蜆 ●韭菜炒魷魚 ●蒜炒蛤蜊青江菜 ●芥蘭炒蛤蜊 ●沙茶炒鳳螺 ●塔香海瓜子 春夏養生食材10藥膳茶飲（薏仁、綠茶、靈芝、鬱金、枸杞、菊花、西洋參、浮小麥、東洋參、黃耆、薰衣草、桂花、荷葉、薄荷、山楂、柴胡） ●排毒雙豆薏仁茶 ●清爽絲瓜綠茶 ●沁涼蘆筍綠茶 ●夏枯草靈芝茶 ●鬱金靈芝茶 ●香菊枸杞茶 ●龍井菊花茶 ●蔗香參茶 ●浮小麥參茶 ●玫瑰參耆茶 ●薰衣草橙花茶 ●馬鞭草香桂茶 ●荷葉薄荷茶 ●仙楂烏梅茶 ●柴胡佛手柑茶 Part 3 元氣滿分春夏生活保健法 春季養生就要這樣做 夏季養生就要這樣做 春夏宜食10大明星食材 預防感冒與中暑5大絕招 春季排毒的3種和緩運動 夏季養心的2大解悶體操', 'zPBoCgAAQBAJ', '2017-06-17 17:43:36', '2017-06-17 09:43:36'),
(36, '花舞大唐春', NULL, 'http://books.google.com/books/content?id=Op4RAQAAMAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '陕西历史博物馆', '“北京大学创建世界一流大学计划”经费资助', 'Op4RAQAAMAAJ', '2017-06-17 18:57:14', '2017-06-17 10:57:14'),
(37, '傲慢與偏見', NULL, 'http://books.google.com/books/content?id=J9XYCgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'Jane Austen', '有人說，在文學上，奧斯登是約翰遜（Samuel Johnson）的女兒、亨利‧詹姆斯（Henry James）的母親。 文評大家利維斯（F. R. Leavis）說，奧斯登是英國小說偉大傳統的奠基人。 小說家司各特（Sir Walter Scott）最少把《傲慢與偏見》讀了三遍，認為奧斯登有點石成金之才，能使日常生活中的平凡人物妙趣橫生。 二次大戰期間，日理萬機的丘吉爾臥病在牀，叫女兒讀給他聽的書就是《傲慢與偏見》。 本書是《傲慢與偏見》的全新譯本，吸收了牛津查普曼標準本等近現代奧斯登研究的成果，糾正了大量舊譯的錯誤。譯者根據奧斯登時代英語的特殊用法，斟酌當時的名物、制度、禮節、風尚，以至情節的關鍵、照應等，比較不同譯本的得失，擇要寫成商榷約二百條為附錄，對研究奧斯登或翻譯相關科系人士頗有參考價值。', 'J9XYCgAAQBAJ', '2017-06-18 00:06:57', '2017-06-17 16:06:57'),
(38, 'ぐーたら一人旅', NULL, 'http://books.google.com/books/content?id=VSHwRevImRIC&printsec=frontcover&img=1&zoom=1&source=gbs_api', '栗山あんこ', 'この行き当たりばったり感が、一人旅の醍醐味なのだ。というか、単にめんどくさかっただけである。慌て者で小心者のぐーたらあんこは誕生日の思い出に一人旅を決意。さまざまなハプニングに遭遇するあんこは無事に旅を終えることができるのか。', 'VSHwRevImRIC', '2017-06-18 00:14:42', '2017-06-17 16:14:42'),
(39, '注文の多い料理店', NULL, 'http://books.google.com/books/content?id=Tk2dCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '宮沢 賢治', '森に迷い込んだ青年たちがようやく見つけた「西洋料理店 山猫軒」。 そこでは客に対して次々と不可解な注文がつきつけられる。 従順に従う青年たちだったが、ついに――。 宮沢 賢治の有名な短編小説を美しいイラストで電子書籍化。 ●表紙イラストについて● 2015年 夏の代々木アニメーション学院 学内イラストコンクール 携帯小説表紙イラスト部門で 最優秀賞を受賞した応募作品を、ゴマブックスがタイアップし表紙に採用しました。 【著者プロフィール】 宮沢 賢治（みやざわ けんじ） 1896年 岩手県生まれ。盛岡高等農林学校（現・岩手大学農学部）に首席で進学し、稗貫農学校（のちに花巻農学校、現・花巻農業高等学校）教師や砕石工場技師などを経験。自然と郷土を愛する精神をうかがわせる詩的かつ叙情性の高い作品を多数、執筆。 1933年 肺炎により死去。', 'Tk2dCwAAQBAJ', '2017-06-18 00:16:43', '2017-06-17 16:16:43'),
(40, '紀曉嵐評注文心雕龍', NULL, 'http://books.google.com/books/content?id=h4pEAQAAMAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '劉勰', 'なし', 'h4pEAQAAMAAJ', '2017-06-18 00:24:25', '2017-06-17 16:24:25'),
(41, '泣ける！日本史', NULL, 'http://books.google.com/books/content?id=QDDNRqAzw6QC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '後藤寿一', '犬死になんて、いわせねぇ!強く、熱く、そしてさわやかに!歴史を彩った男と女の珠玉の生き方に学ぶ。', 'QDDNRqAzw6QC', '2017-06-18 00:36:00', '2017-06-17 16:36:00'),
(42, '小学校で習う全漢字の書き方', NULL, 'http://books.google.com/books/content?id=dXiWydj6jzgC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '学研プラス', '小学校で習う全1006字の読み方や部首、書き順などの要点が、コンパクトにまとまっています。「持ち歩ける漢字辞典」として、いつでもさっと調べることができます。全部の書き順を1画ずつ赤色で示しています。また、書き方のポイントもついているので、正しくきれいに書けるようになります。ミッキーたちのかわいいイラストがいっぱいで、6年間ずっと一緒に、楽しく使えます。', 'dXiWydj6jzgC', '2017-06-18 00:38:25', '2017-06-17 16:38:25'),
(43, '凶悪', NULL, 'http://books.google.com/books/content?id=uf-vPQAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'ビルプロンジーニ', '「自分が、いったい誰なのか知りたい」コンピューターも扱えない老いぼれ探偵に舞いこんだ依頼は、若く美しい女メラニーの実父探しだった。養女だった彼女の出生の秘密とは?這いずり回るような捜査の末、ついに突きとめた父親の恐るべき正体。ハードボイルドの巨匠が放つ名無しの探偵シリーズ最高作。', 'uf-vPQAACAAJ', '2017-06-18 00:39:23', '2017-06-17 16:39:23'),
(44, 'S.', NULL, 'http://books.google.com/books/content?id=dhecmwEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'J. J. Abrams', 'One book. Two readers. A world of mystery, menace, and desire. A young woman picks up a book left behind by a stranger. Inside it are his margin notes, which reveal a reader entranced by the story and by its mysterious author. She responds with notes of her own, leaving the book for the stranger, and so begins an unlikely conversation that plunges them both into the unknown. The book: Ship of Theseus, the final novel by a prolific but enigmatic writer named V.M. Straka, in which a man with no past is shanghaied onto a strange ship with a monstrous crew and launched onto a disorienting and perilous journey. The writer: Straka, the incendiary and secretive subject of one of the world\'s greatest mysteries, a revolutionary about whom the world knows nothing apart from the words he wrote and the rumors that swirl around him. The readers: Jennifer and Eric, a college senior and a disgraced grad student, both facing crucial decisions about who they are, who they might become, and how much they\'re willing to trust another person with their passions, hurts, and fears. S., conceived by filmmaker J. J. Abrams and written by award-winning novelist Doug Dorst, is the chronicle of two readers finding each other in the margins of a book and enmeshing themselves in a deadly struggle between forces they don\'t understand, and it is also Abrams and Dorst\'s love letter to the written word.', 'dhecmwEACAAJ', '2017-06-18 00:40:05', '2017-06-17 16:40:05'),
(45, 'k. a.', NULL, 'http://books.google.com/books/content?id=zMJuHldk_eYC&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'k. a. ', 'k. a.', 'zMJuHldk_eYC', '2017-06-18 00:41:37', '2017-06-17 16:41:37'),
(46, 'K is for Knifeball', NULL, 'http://books.google.com/books/content?id=8cfWow3E1jAC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'Jory John', 'From the authors of the breakout bestseller All my friends are dead. and in the humorous vein of Go the F**k to Sleep comes a laugh-out-loud collection of bad advice that turns the children\'s alphabet book on its head. Adorable illustrated characters lead readers down a path of poor decision-making, and alphabetical, rhyming couplets offer terrible life lessons in which O is for opening things with your teeth, F is for setting Daddy\'s wallet on fire, and R is for Raccoon (but definitely not for rabies). With plenty of playfully disastrous choices lurking around every corner, this compendium of black humor may be terrible for actual children, but it\'s perfect for the common-senseless child in all adults.', '8cfWow3E1jAC', '2017-06-18 01:06:38', '2017-06-17 17:06:38'),
(47, 'Drink, Play, F@#k', NULL, 'http://books.google.com/books/content?id=s7OK_lUfdOcC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'Andrew Gottlieb', 'In Drink, Play, F@#k Bob Sullivan, a jilted husband, sets off to explore the world, experience a meaningful connection with the divine, and rediscover his passion. His travels lead him from his home in New York City to a drinking bender across Ireland, through the glitz and glamour that is Las Vegas, and to the hedonistic pleasure palaces of Thailand. After a lifetime of playing it safe, Mr. Sullivan finally follows his heart and lives out everyone\'s deepest fantasies. For who among us hasn\'t dreamed of standing stark naked, head upturned, and mouth agape beneath a cascading torrent of Guinness Stout? What could be more exhilarating than losing every penny you have because Charlie Weiss went for a meaningless last-second field goal? And what sensate creature could ever doubt that the greatest pleasure known to man can be found in a leaky bamboo shack filled with glassy-eyed, bruised Asian hookers? Bob Sullivan has a lot to teach us about life. Let\'s just pray we have the wisdom to put aside our preconceptions and listen. Because what Bob Sullivan finds isn\'t at all what he expected.', 's7OK_lUfdOcC', '2017-06-18 01:07:49', '2017-06-17 17:07:49'),
(48, 'Peace As a Women\'s Issue', NULL, 'http://books.google.com/books/content?id=FZJxg8gQThoC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'Harriet Hyman Alonso', 'A history of the ideologies and personalities of the feminist peace movement in the US. This study explores: connections between militarism and violence against women; women as the mothers of society; women as naturally responsible citizens; and the desire to be independent of male control.', 'FZJxg8gQThoC', '2017-06-18 01:17:42', '2017-06-17 17:17:42'),
(49, 'Hawaiian Dictionary', NULL, 'http://books.google.com/books/content?id=bHdRhjL9Y9EC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'Mary Kawena Pukui', '\"This standard work of reference... continues offering the happy blend of grammar and lexicon.\" --American Reference Books Annual For many years, Hawaiian Dictionary has been the definitive and authoritative work on the Hawaiian language. Now this indispensible reference volume has been enlarged and completely revised. More than 3,000 new entries have been added to the Hawaiian-English section, bringing the total number of entries to almost 30,000 and making it the largest and most complete of any Polynesian dictionary. This new edition is more than a dictionary. Containing folklore, poetry, and ethnology, it will benefit Hawaiian studies for years to come.', 'bHdRhjL9Y9EC', '2017-06-18 01:19:43', '2017-06-17 17:19:43'),
(50, 'HTML and CSS', NULL, 'http://books.google.com/books/content?id=blCyf8XF41sC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'Jon Duckett', 'A full-color introduction to the basics of HTML and CSS from the publishers of Wrox! Every day, more and more people want to learn some HTML and CSS. Joining the professional web designers and programmers are new audiences who need to know a little bit of code at work (update a content management system or e-commerce store) and those who want to make their personal blogs more attractive. Many books teaching HTML and CSS are dry and only written for those who want to become programmers, which is why this book takes an entirely new approach. Introduces HTML and CSS in a way that makes them accessible to everyone—hobbyists, students, and professionals—and it’s full-color throughout Utilizes information graphics and lifestyle photography to explain the topics in a simple way that is engaging Boasts a unique structure that allows you to progress through the chapters from beginning to end or just dip into topics of particular interest at your leisure This educational book is one that you will enjoy picking up, reading, then referring back to. It will make you wish other technical topics were presented in such a simple, attractive and engaging way! This book is also available as part of a set in hardcover - Web Design with HTML, CSS, JavaScript and jQuery, 9781119038634; and in softcover - Web Design with HTML, CSS, JavaScript and jQuery, 9781118907443.', 'blCyf8XF41sC', '2017-06-19 07:08:15', '2017-06-18 23:08:15'),
(51, 'Mac Life', NULL, 'http://books.google.com/books/content?id=39IDAAAAMBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'なし', 'MacLife is the ultimate magazine about all things Apple. It’s authoritative, ahead of the curve and endlessly entertaining. MacLife provides unique content that helps readers use their Macs, iPhones, iPods, and their related hardware and software in every facet of their personal and professional lives.', '39IDAAAAMBAJ', '2017-06-19 07:15:26', '2017-06-18 23:15:26'),
(52, 'Mac OS X Lion Pocket Guide', NULL, 'http://books.google.com/books/content?id=cOu1gkeYVe0C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'Jeff Carlson', 'The Mac OS X Lion Pocket Guide is an indispensable quick reference guide that is packed with bite-sized chunks of practical information for people who want to jump in and start working and playing with OS X Lion. The attractive price and accessible content make this the perfect learning companion and reference guide. Written by Mac expert Jeff Carlson, this essential guide features snappy writing, eye-catching graphics, and an elegant design that walks readers through the most common OS X Lion tasks. The Mac OS X Lion Pocket Guide covers all of the key new features of OS X Lion including Multi-Touch Gestures, Launchpad, Mission Control, the App Store, Mail, and much more.', 'cOu1gkeYVe0C', '2017-06-19 07:16:38', '2017-06-18 23:16:38'),
(53, '君の名は', NULL, 'http://books.google.com/books/content?id=4WUsAQAAIAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'Kazuo Kikuta', 'なし', '4WUsAQAAIAAJ', '2017-06-19 07:19:59', '2017-06-18 23:19:59'),
(54, '君の手紙に恋をした', NULL, 'http://books.google.com/books/content?id=H43Gy0XHQE0C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '中谷彰宏', '急に手紙が書きたくなったら恋が始まる5秒前。便箋、ハガキ、カードに大事な気持ちをどう託す? お便り上手になれるヒントを満載!', 'H43Gy0XHQE0C', '2017-06-19 07:26:31', '2017-06-18 23:26:31'),
(55, '恋魂戒', NULL, 'http://books.google.com/books/content?id=6rtFBAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '傲逸', '白小雨在一次探宝中，发现了千古奇石，鸳鸯石。她以玉石跟沙金混合，炼制了可以探测恋人心的天下第一情戒，恋魂戒。当她把戒指给心爱的人戴上时，他居然无法让这个戒指产生特殊效果。于是，白小雨认为，他心中没有爱她的影子，为此她坠入魔道，在恋魂戒上留下了她的诅咒。传说只有真挚深爱的恋人，相互佩带，才能解除此诅咒。', '6rtFBAAAQBAJ', '2017-06-19 07:29:49', '2017-06-18 23:29:49'),
(56, 'M. Wolfgangi Seberi Sulani Index Vocabvlorvm In Homeri Non Tantvm Iliade Atqve Odyssea Sed caeteris etiam quotquot extant poematis', NULL, 'http://books.google.com/books/content?id=dnZpAAAAcAAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'Wolfgang Seber', 'なし', 'dnZpAAAAcAAJ', '2017-06-19 07:35:27', '2017-06-18 23:35:27'),
(57, 'ああ少年飛行兵', NULL, 'http://books.google.com/books/content?id=2jszAQAAIAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '板垣優喜', 'なし', '2jszAQAAIAAJ', '2017-06-19 07:45:17', '2017-06-18 23:45:17'),
(58, '一緒にいて楽しい人・疲れる人', NULL, 'http://books.google.com/books/content?id=_p3SAwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '本郷陽二', 'なぜ、あの人には友達が多いのか?それには理由がある。特別な方法があるわけではありません。人間関係の豊かさを左右するのは、実は、誰にでも出来る「ほんのちょっとの気配り」なのです。', '_p3SAwAAQBAJ', '2017-06-19 07:46:46', '2017-06-18 23:46:46');

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
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 5, 9),
(6, 2, 1),
(7, 2, 2),
(8, 2, 3),
(9, 2, 4),
(10, 2, 5),
(11, 3, 1),
(12, 3, 2),
(13, 3, 3),
(14, 3, 4),
(15, 3, 5),
(18, 13, 4),
(19, 13, 5),
(20, 13, 9),
(21, 12, 4),
(22, 12, 12),
(23, 13, 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

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
(13, 0, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', '2017-06-12 06:23:51'),
(14, 13, 0, '    よかった', '2017-06-03 00:00:00', '2017-06-06 00:00:00', 12, '2017-06-15 12:33:05', '2017-06-15 04:33:05'),
(15, 13, 4, '    よかった', '2017-06-03 00:00:00', '2017-06-06 00:00:00', 12, '2017-06-15 12:37:59', '2017-06-15 04:37:59'),
(16, 13, 5, '    ｓｓｓｓ', '2017-06-09 00:00:00', '2017-06-09 00:00:00', 12, '2017-06-15 12:38:21', '2017-06-15 04:38:21'),
(17, 13, 4, '    ｋｋｋ', '2017-06-02 00:00:00', '2017-06-03 00:00:00', 13, '2017-06-15 12:40:15', '2017-06-15 04:40:15'),
(18, 13, 5, '    ｄｄｄｄ', '2017-06-09 00:00:00', '2017-06-09 00:00:00', 13, '2017-06-15 12:48:15', '2017-06-15 04:48:15'),
(19, 13, 5, '   good', '2017-06-01 00:00:00', '2017-06-02 00:00:00', 14, '2017-06-15 12:51:21', '2017-06-15 04:51:21'),
(20, 13, 0, '    あｓだｓ', '2017-06-01 00:00:00', '2017-06-09 00:00:00', 0, '2017-06-15 14:05:32', '2017-06-15 06:05:32'),
(21, 13, 0, '    良かった', '2017-06-01 00:00:00', '2017-06-16 00:00:00', 0, '2017-06-15 14:57:54', '2017-06-15 06:57:54'),
(22, 13, 4, '    あｓｄｆ', '2017-06-09 00:00:00', '2017-06-22 00:00:00', 13, '2017-06-15 16:57:47', '2017-06-15 08:57:47'),
(23, 13, 5, '    あｗｗ', '2017-06-01 00:00:00', '2017-06-03 00:00:00', 15, '2017-06-15 16:58:28', '2017-06-15 08:58:28'),
(24, 13, 4, '    あｓｄｆ', '2017-06-06 00:00:00', '2017-06-09 00:00:00', 14, '2017-06-15 16:59:00', '2017-06-15 08:59:00'),
(25, 13, 4, '    あｓｄｆ', '2017-06-06 00:00:00', '2017-06-09 00:00:00', 14, '2017-06-15 17:00:56', '2017-06-15 09:00:56'),
(26, 13, 5, '    kakaka\r\n', '2017-06-07 00:00:00', '2017-06-17 00:00:00', 16, '2017-06-15 17:01:34', '2017-06-15 09:01:34'),
(27, 13, 5, '    泣けた', '2017-06-08 00:00:00', '2017-06-16 00:00:00', 32, '2017-06-17 09:11:18', '2017-06-17 01:11:18'),
(28, 13, 5, '    最高', '2017-06-01 00:00:00', '2017-06-03 00:00:00', 34, '2017-06-17 09:12:42', '2017-06-17 01:12:42');

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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

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
(16, 6, 5),
(17, 0, 2),
(18, 0, 9),
(19, 0, 10),
(20, 0, 2),
(21, 0, 9),
(22, 0, 10),
(23, 0, 2),
(24, 0, 9),
(25, 0, 10),
(26, 0, 2),
(27, 0, 9),
(28, 0, 2),
(29, 0, 9),
(30, 20, 2),
(31, 20, 9),
(32, 20, 10),
(33, 20, 2),
(34, 20, 9),
(35, 20, 10),
(36, 20, 3),
(37, 20, 10),
(38, 20, 11),
(39, 20, 2),
(40, 20, 9),
(41, 20, 9),
(42, 20, 10),
(43, 19, 9),
(44, 19, 10),
(45, 26, 1),
(46, 26, 2),
(47, 27, 1),
(48, 27, 2),
(49, 27, 4),
(50, 27, 6),
(51, 28, 10),
(52, 28, 11);

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
  `bestbook_id` int(11) DEFAULT NULL,
  `great_man` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT '0',
  `created` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `age`, `gender`, `avatar_id`, `hobby`, `job`, `bestbook_id`, `great_man`, `comment`, `point`, `level`, `created`) VALUES
(1, 'RImiko', 'rf181.0624.t@gmail.com', '3707711fbda2357c06a24ccb08dcebc2026bf66c', 22, 2, 5, 'piano', 'student', NULL, 'asd', 'cccc', 140, 0, '0000-00-00 00:00:00'),
(2, 'AYUMI', 'ayumi@ayumi', 'ecbd8af733a17803b66ee4321b23f87f103cc9ca', 24, 2, 1, '', '', NULL, '', '', 90, 0, '0000-00-00 00:00:00'),
(3, 'naru', 'naru@naru', 'feac8c398d6ed455ec8c9eb6cf074571328a2672', 19, 1, 3, 'スケボー', 'エンジニア', NULL, '孫正義', 'ｑｑｑｑｑｑｑｑ', 155, 0, '0000-00-00 00:00:00'),
(4, 'atsushi', 'atsushi@atsushi', '1c5aa4fe8dcfac2419277476df6c1e8def58f827', 23, 1, 4, '筋トレ', '筋トレ', NULL, 'もりしー', 'ｄｄｄｄｄ', 103, 0, '0000-00-00 00:00:00'),
(5, 'eriko', 'eriko@eriko', 'e6dd2a0cb778fc799964f50a7661ea4649b9bc1e', 32, 2, 6, 'プログラム', '先生', NULL, 'マーク・ザッカーバーグ', 'ｋｋｋｋｋ', 17, 0, '0000-00-00 00:00:00'),
(6, 'LOUIS', 'loius@loius', 'd82ece8d514aca7e24d3fc11fbb8dada57f2966c', 29, 1, 7, '旅', '旅人', NULL, '旅人', '旅人', 1000, 0, '0000-00-00 00:00:00'),
(7, 'YUKII', 'yuki@yuki', 'a6aa6c594f3f904825833313c0bab3e292e95764', 28, 2, 6, '旅', 'エンジニア', NULL, '関西人', 'ｋｄｆｊｄｋｄ', 125, 0, '0000-00-00 00:00:00'),
(8, 'MANATO', 'manato@manato', '81fca17fef08bdd0ad9298e9933c2373dbc5b912', 25, 1, 8, 'たばこ', '商社', NULL, '特になし', 'かかかかか', 190, 0, '0000-00-00 00:00:00'),
(9, 'SINNYA', 'sinya@sinya', '70c881d4a26984ddce795f6f71817c9cf4480e79', 26, 1, 9, 'PC', '最強のエンジニア', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00'),
(10, 'A', 'a@a', '01464e1616e3fdd5c60c0cc5516c1d1454cc4185', 20, 2, 5, 'aaa', 'aaa', NULL, 'aaa', 'aaa', 100, 0, '0000-00-00 00:00:00'),
(11, 'koko', 'koko', 'koko', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00'),
(12, 'aaaa', 'aaaa@aaaa', '70c881d4a26984ddce795f6f71817c9cf4480e79', 20, NULL, 3, 'dekitakana', 'aaaa', NULL, 'みんな', 'かかかか', NULL, 0, '0000-00-00 00:00:00'),
(13, 'かかか', 'rf181.0624.t@gmail.com', '319d77898adf71dbb3259025a5e5a467d4eaaee7', 20, 2, 2, 'piano', 'student', 58, 'りりり', 'kakak', 20, 7, '0000-00-00 00:00:00'),
(14, '接続確認', 'setsuzoku@setsuzoku', '1b90dba8d09d2ee9e7d16adc858feb67bec1b9a1', 20, 1, 2, '接続', '接続', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00'),
(15, '福光理美子', 'rf181.0624.t@gmail.com', '319d77898adf71dbb3259025a5e5a467d4eaaee7', 10, 2, 1, '', '', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00'),
(16, 'RIMIKO', 'rf181.0624.t@gmail.com', '319d77898adf71dbb3259025a5e5a467d4eaaee7', 20, 2, 3, 'piannno', 'studenttt', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00'),
(17, 'RIMIKO', 'rrrr@rrrr', 'e950c1517ee0d7e20454d22c306c4c501a7cf11c', 20, 2, 0, 'piannno', 'studenttt', NULL, 'dddd', 'asdasdf', 0, 0, '0000-00-00 00:00:00'),
(18, 'kakaka', 'kakaka@kakaka', '57c3dd950b3072ca042bd3f85e67c7bd1cf8a03f', 20, 2, 2, '', '', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00'),
(19, 'おためし', 'tameshi@tameshi', '1716d057d045879c4ef086b182d8e3a9893f7821', 10, 2, 2, 'おためし', 'おためし', NULL, NULL, NULL, NULL, 0, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
