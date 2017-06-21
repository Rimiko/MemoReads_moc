-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 6 朁E21 日 01:54
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
(1, 'dragon1.png'),
(2, 'dragon2.png'),
(3, 'dragon3.png'),
(4, 'i07.jpg'),
(5, 'i17.jpg'),
(6, 'i27.jpg'),
(7, 'mon_107.bmp'),
(8, 'mon_109.gif'),
(9, 'mon_110.bmp');

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- テーブルのデータのダンプ `books`
--

INSERT INTO `books` (`book_id`, `title`, `category`, `picture_url`, `author`, `detail`, `api_id`, `created`, `modified`) VALUES
(1, '小説君の名は。', NULL, 'http://books.google.com/books/content?id=WrwCDQEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '新海誠', 'まだ会ったことのない君を、探している監督みずから執筆した映画原作小説', 'WrwCDQEACAAJ', '2017-06-19 19:37:48', '2017-06-19 11:37:48'),
(2, 'すえずえ', NULL, 'http://books.google.com/books/content?id=dLqzoAEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '畠中恵', '若だんなのお嫁さん、ついに決定~!!お相手は、いったい誰?えっ、けど、仁吉や佐助、妖達とはお別れなの?', 'dLqzoAEACAAJ', '2017-06-19 20:00:49', '2017-06-19 12:00:49'),
(3, 'Information Technology and Sustainability', NULL, 'http://books.google.com/books/content?id=2vlVVfFS_2YC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'Lorenz M. Hilty', 'Information and Communication Technologies (ICTs) are contributing both to environmental problems and to their solution. Will ICT producers, users and recyclers be the major polluters of tomorrow, or will \'Green IT\' and a dematerialized information society save the climate? This book provides an in-depth analysis of the relationship between ICT and sustainable development, culminating in 15 recommendations - to producers, users and political decision makers - which show the way to a sustainable information society.Keywords: Information Technology, Environment, Sustainable Development, Environmental Informatics, Green IT, Green Computing, Data Centers, Energy Efficiency, Resource Productivity, Dematerialization, Life Cycle Assessment (LCA), E-waste, Waste Electrical and Electronic Equipment (WEEE), Recycling, Technological Complexity, Critical Information Infrastructure, Open Standards, Rebound Effect.', '2vlVVfFS_2YC', '2017-06-19 23:45:59', '2017-06-19 15:45:59'),
(4, '注文の多い料理店', NULL, 'http://books.google.com/books/content?id=Tk2dCwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '宮沢 賢治', '森に迷い込んだ青年たちがようやく見つけた「西洋料理店 山猫軒」。 そこでは客に対して次々と不可解な注文がつきつけられる。 従順に従う青年たちだったが、ついに――。 宮沢 賢治の有名な短編小説を美しいイラストで電子書籍化。 ●表紙イラストについて● 2015年 夏の代々木アニメーション学院 学内イラストコンクール 携帯小説表紙イラスト部門で 最優秀賞を受賞した応募作品を、ゴマブックスがタイアップし表紙に採用しました。 【著者プロフィール】 宮沢 賢治（みやざわ けんじ） 1896年 岩手県生まれ。盛岡高等農林学校（現・岩手大学農学部）に首席で進学し、稗貫農学校（のちに花巻農学校、現・花巻農業高等学校）教師や砕石工場技師などを経験。自然と郷土を愛する精神をうかがわせる詩的かつ叙情性の高い作品を多数、執筆。 1933年 肺炎により死去。', 'Tk2dCwAAQBAJ', '2017-06-19 23:46:54', '2017-06-19 15:46:54'),
(5, '名苗名２：名字電子字典', NULL, 'http://books.google.com/books/content?id=8DohDAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'h.k', '名苗名：電子字典は外字を含む名字を約248,000件を収録しています。 記載の黒文字はWindows Vista / OS X 以降のPCやi OS / Androidで採用されているJIS013:2004フォントに収録されています。依って黒文字であれば各ＯＳでご利用いただけます。 赤文字は外字のためPC等に有無の判断が簡単に解ります。 アドビ・リーダー等を使用すけば｢しおり(目次)｣で簡単に目的の名字検索が行えます。またアドビ・リーダー等の検索機能で読み方・漢字からの検索も行えます。 姉妹品の｢名苗名：名字地名辞書｣を併せてご使用になれば依り効果的です。', '8DohDAAAQBAJ', '2017-06-19 23:47:20', '2017-06-19 15:47:20'),
(6, '八日目の蝉', NULL, 'http://books.google.com/books/content?id=5RssAQAAIAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '角田光代', '逃げて、逃げて、逃げのびたら、私はあなたの母になれるのだろうか。理性をゆるがす愛があり、罪にもそそぐ光があった。角田光代が全力で挑む長篇サスペンス。', '5RssAQAAIAAJ', '2017-06-20 01:26:35', '2017-06-19 17:26:35'),
(7, '3年後の君のために', NULL, 'http://books.google.com/books/content?id=wf1BhF0Z_UcC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '中谷彰宏', '今の仕事はつまらない。やりたいことがみつからずため息ばかり......。そんなあなたに、やりがいの見つけ方を教えます。恋と同じくらい夢中になれることがきっとある。', 'wf1BhF0Z_UcC', '2017-06-20 09:32:42', '2017-06-20 01:32:42'),
(8, '君の膵臓をたべたい', NULL, 'http://books.google.com/books/content?id=oTLTsgEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '住野よる', '偶然、僕が拾った1冊の文庫本。それはクラスメイトである山内桜良が綴った、秘密の日記帳だった―圧倒的デビュー作!', 'oTLTsgEACAAJ', '2017-06-20 09:33:28', '2017-06-20 01:33:28'),
(9, '久保田米斎君の思い出', NULL, 'http://books.google.com/books/content?id=mMB9tL_uXZEC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'なし', 'なし', 'mMB9tL_uXZEC', '2017-06-20 09:34:10', '2017-06-20 01:34:10'),
(10, '君し旅ゆく', NULL, 'http://books.google.com/books/content?id=3YLiAAAAMAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '裕仁 (Emperor of Japan)', 'なし', '3YLiAAAAMAAJ', '2017-06-20 12:04:52', '2017-06-20 04:04:52'),
(11, '模倣犯', NULL, 'http://books.google.com/books/content?id=f_vrAAAAMAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '宮部みゆき', '群馬県の山道から練馬ナンバーの車が転落炎上。二人の若い男が死亡し、トランクから変死体が見つかった。死亡したのは、栗橋浩美と高井和明。二人は幼なじみだった。この若者たちが真犯人なのか、全国の注目が集まった。家宅捜索の結果、栗橋の部屋から右腕の欠けた遺骨が発見され、臨時ニュースは「容疑者判明」を伝えた―。だが、本当に「犯人」はこの二人で、事件は終結したのだろうか。', 'f_vrAAAAMAAJ', '2017-06-20 16:54:45', '2017-06-20 08:54:45'),
(12, '図書館戦争　図書館戦争シリーズ①', NULL, 'http://books.google.com/books/content?id=Sd1z2JvIDPAC&printsec=frontcover&img=1&zoom=1&source=gbs_api', '有川　浩 ~autofilled~', 'なし', 'Sd1z2JvIDPAC', '2017-06-20 17:00:25', '2017-06-20 09:00:25'),
(13, 'CakePHP 1.3 Application Development Cookbook', NULL, 'http://books.google.com/books/content?id=oXpiVSW5jqkC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'Mariano Iglesias', '\"The recipes in this book give you instant results and will help you develop web applications, leveraging the CakePHP features that allow you to build robust and complex applications\"--p. [1].', 'oXpiVSW5jqkC', '2017-06-20 17:01:04', '2017-06-20 09:01:04'),
(14, 'るるぶフィリピン・セブ島・マニラ', NULL, 'http://books.google.com/books/content?id=lrPfIutPqcAC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'なし', '日本から5時間で行けるお手軽リゾートとして人気のフィリピン。一番人気のセブ島では、おすすめの22のホテルをグラビアで紹介。ダイビング情報もカバーしています。 またフィリピンにはセブ島以外にも、美しいビーチで有名なボラカイ島、1島1リゾートという贅沢を味わえる北パラワンと魅力的なリゾート地がまだまだあります!これらのエリアのリゾートホテル情報もたっぷり紹介!もちろんショッピングセンターが多く、買物天国の首都マニラも掲載。リゾートからショッピングまで、フィリピンの魅力をぎゅっと詰め込んだ欲張りな一冊です。 ※この電子書籍は2012年11月にJTBパブリッシングから発行された図書を画像化したものです。電子書籍化にあたり、一部内容を変更している場合があります', 'lrPfIutPqcAC', '2017-06-20 18:02:13', '2017-06-20 10:02:13'),
(15, '図書館大戦争', NULL, 'http://books.google.com/books/content?id=ULjqjgEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'ミハイル・エリザーロフ', 'ソ連崩壊後のロシアを舞台に、特別な力を秘めた7冊の奇書をめぐり、「図書館」同士の戦闘が始まる。ロシア・ブッカー賞受賞。', 'ULjqjgEACAAJ', '2017-06-20 18:39:59', '2017-06-20 10:39:59'),
(16, '潮騒', NULL, 'http://books.google.com/books/content?id=XekNDAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'シャーロット・ラム', '高名なピアニストだった祖父にピアノを教わりながら、マリナは海辺の山荘で、俗世間と隔たれた日々を送っている。ある日、祖父とひっそり暮らす山荘に、ギデオンと名乗るハンサムな旅行客が滞在することになった。初対面なのになぜか懐かしさを覚え、彼に惹かれるマリナだが、一方の祖父は冷淡な態度で、まるで彼を憎んでいるかのよう。いったいどうしてかしら...いぶかしむマリナは数日後、ふと美しいピアノの旋律を耳にする。弾いているのは...ギデオン?次の瞬間マリナは思い出した―心に封印していた残酷な記憶を。', 'XekNDAAAQBAJ', '2017-06-20 21:07:40', '2017-06-20 13:07:40'),
(17, '三島由紀夫短編集', NULL, 'http://books.google.com/books/content?id=QRR2J7HWbooC&printsec=frontcover&img=1&zoom=1&source=gbs_api', '由紀夫·三島', 'Here are seven stories of psychological insight and eroticism from Japan\'s most famous writer. Other works by Yukio Mishima which are published by Kodansha include \'Sun and Steel\'. When Mishima committed ritual suicide in November 1970, he was only forty-five. He had written over thirty novels, eighteen plays, and twenty volumes of short stories. During his lifetime, he was nominated for the Nobel Prize three times and had seen almost all of his major novels appear in English. While the flamboyance of his life and the apparent fanaticism of his death have dominated', 'QRR2J7HWbooC', '2017-06-20 21:16:13', '2017-06-20 13:16:13'),
(18, 'マスペディア1000', NULL, 'http://books.google.com/books/content?id=IYlXMQAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'リチャードエルウィス', '解析・幾何・代数から数学パズルまで、数学の全ジャンルを1000項目で読む数学事典。サイエンスペディア姉妹編の数学版!', 'IYlXMQAACAAJ', '2017-06-20 21:17:06', '2017-06-20 13:17:06'),
(19, 'Mac Life', NULL, 'http://books.google.com/books/content?id=3dIDAAAAMBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'なし', 'MacLife is the ultimate magazine about all things Apple. It’s authoritative, ahead of the curve and endlessly entertaining. MacLife provides unique content that helps readers use their Macs, iPhones, iPods, and their related hardware and software in every facet of their personal and professional lives.', '3dIDAAAAMBAJ', '2017-06-20 22:19:37', '2017-06-20 14:19:37'),
(20, 'TEAP英単語ターゲット（音声DL付）', NULL, 'http://books.google.com/books/content?id=vSVbDgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '旺文社', 'TEAPにでる語をリスト型単語集で最短攻略しよう！ ●精緻なデータ分析に基づき、TEAPにでる1200語を厳選。 ●自分の単語力に合わせて学習できる、難易度で分けられた3レベル構成。 ●見出し語・語義・例文が聞ける、Web音声サービス付き。 ●ライティング・スピーキングに役立つ表現を豊富に収録した巻末コラム付き。 【編集担当者からのコメント】 TEAP対策には、大学受験用のいつも使っている単語集では足りないの？―そんなふうに思っている受験者の方々も多いかもしれません。 確かに、TEAPにでる単語は、従来の大学受験のための単語と共通するものも多いですが、大学生活で使われる単語や、論理的に物事を説明するのに必要となる学術的な単語など、従来の単語集では押さえ切れないものもたくさんあり、TEAPに特化した単語集で学習する意義はとても大きいです。 本書には、短期間で効率よく単語力を伸ばせるように、難易度順に構成したり、特に注意しておきたい語にTEAPラベルをつけるなど、様々な工夫が施されています。 ぜひ本書を使って、TEAPにでる単語を最短攻略し、目標スコア獲得を目指してください！ みなさんの成功を心よりお祈りしております。 株式会社旺文社', 'vSVbDgAAQBAJ', '2017-06-20 22:21:05', '2017-06-20 14:21:05'),
(21, '三島由紀夫全集', NULL, 'http://books.google.com/books/content?id=3EosAQAAIAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '三島由紀夫', 'なし', '3EosAQAAIAAJ', '2017-06-20 22:21:38', '2017-06-20 14:21:38'),
(22, '神崎正哉の新TOEIC TEST ぜったい英単語', NULL, 'http://books.google.com/books/content?id=TFLbBQAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '神崎正哉', 'なし', 'TFLbBQAAQBAJ', '2017-06-20 22:37:45', '2017-06-20 14:37:45'),
(23, '告白', NULL, 'http://books.google.com/books/content?id=7QeGcgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '湊かなえ', '「愛美は死にました。しかし事故ではありません。このクラスの生徒に殺されたのです」我が子を校内で亡くした中学校の女性教師。終業式のホームルームでの告白から、この物語は始まる。「級友」「犯人」「犯人の家族」と次々に変わる語り手によって、次第に事件の全体像が浮き彫りにされていく。', '7QeGcgAACAAJ', '2017-06-20 22:41:49', '2017-06-20 14:41:49'),
(24, '带血的紫色陶羊/故事大王丛书', NULL, 'http://books.google.com/books/content?id=JVa0emQB6uMC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '葛冰', 'なし', 'JVa0emQB6uMC', '2017-06-20 22:43:14', '2017-06-20 14:43:14'),
(25, '容疑者Xの献身', NULL, 'http://books.google.com/books/content?id=TL3APAAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '東野圭吾', '天才数学者でありながら不遇な日日を送っていた高校教師の石神は、一人娘と暮らす隣人の靖子に秘かな想いを寄せていた。彼女たちが前夫を殺害したことを知った彼は、二人を救うため完全犯罪を企てる。だが皮肉にも、石神のかつての親友である物理学者の湯川学が、その謎に挑むことになる。ガリレオシリーズ初の長篇、直木賞受賞作。', 'TL3APAAACAAJ', '2017-06-21 00:04:29', '2017-06-20 16:04:29'),
(26, '白夜行(上)', NULL, 'http://books.google.com/books/content?id=hP9hAgAAQBAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '東野圭吾', '第一百二十二屆直木獎入圍作品 東野圭吾剖析人性暗面，探討純愛極限， 故事情節跨19年、盪氣迴腸之恢宏鉅著 在白夜裡，沒有人性這種東西！ 一部刻劃童年傷痕的悲傷物語， 一個深不見底的惡意深淵， 一段至死方休的遁逃之旅， 一首燃盡生命的愛情戀歌， 以及，永無止境的闃暗白夜…… 本書於2006年1月由日本TBS電視台改拍成電視劇，由青春偶像山田孝之、綾遙及演技派巨匠武田鐵矢領銜主演，並於2007年5月由緯來日本台在台灣播映，造成一股東野熱潮。 他們為什麼如此輕易地抹煞別人的性命？ 他們為什麼毫無愧疚地奪取別人的靈魂？ 一九七三年，大阪的廢棄大樓發現了一具他殺屍體，被害者之子桐原亮司與嫌疑犯之女西本雪穗，就此走上截然不同的道路。 桐原亮司拉皮條、盜賣電玩軟體、隱姓埋名竊取商業機密，不斷向下淪落；雪穗由親戚收養，就讀明星學校，成為同學豔羨的對象，儼如上流名媛。 然而，兩人身邊的人卻紛紛遭遇不幸，甚至死於非命， 這是命運無情的操弄，還是潛藏著駭人的真相？', 'hP9hAgAAQBAJ', '2017-06-21 00:26:17', '2017-06-20 16:26:17'),
(27, '三毛猫ホームズと愛の花束', NULL, 'http://books.google.com/books/content?id=PFDqBozbwLAC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '赤川次郎', '結婚相談所〈Kブライダルセンター〉に届いた1通の脅迫状。そしてその直後、センターで働く女性が射殺され、死体の上には花束が......。捜査に乗り出した片山兄妹は上司の指令でお見合いパーティに出席。妹・晴美と熱烈恋愛中の石津刑事も泣く泣く付き合うが、やはり頼りになるのは三毛猫ホームズ。片山が女性と2人きりになっている間に、パーティに凶悪な男が乱入する......。超人気シリーズの第15弾!', 'PFDqBozbwLAC', '2017-06-21 03:38:55', '2017-06-20 19:38:55'),
(28, '図書館戦争', NULL, 'http://books.google.com/books/content?id=_5AqnAEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '有川浩', '正義の味方、図書館を駆ける!―公序良俗を乱し人権を侵害する表現を取り締まる法律として『メディア良化法』が成立・施行された現代。超法規的検閲に対抗するため、立てよ図書館!狩られる本を、明日を守れ。', '_5AqnAEACAAJ', '2017-06-21 03:39:32', '2017-06-20 19:39:32'),
(29, 'スティーブ・ジョブズ名語録', NULL, 'http://books.google.com/books/content?id=NTMyopWzXhkC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '桑原晃弥', '「我慢さえできれば、うまくいったのも同然なのだ」など、アップル社のカリスマCEOが語る“危機をチャンスに変える”珠玉の名言集。', 'NTMyopWzXhkC', '2017-06-21 03:43:40', '2017-06-20 19:43:40'),
(30, 'Programming PHP', NULL, 'http://books.google.com/books/content?id=2S_Y6Zm02BQC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'Kevin Tatroe', 'This updated edition teaches everything you need to know to create effective web applications with the latest features in PHP 5.x. You’ll start with the big picture and then dive into language syntax, programming techniques, and other details, using examples that illustrate both correct usage and common idioms. If you have a working knowledge of HTML, the authors’ many style tips and practical programming advice will help you become a top-notch PHP programmer. Get an overview of what’s possible with PHP programs Learn language fundamentals, including data types, variables, operators, and flow control statements Understand functions, strings, arrays, and objects Apply common web application techniques, such as form processing, data validation, session tracking, and cookies Interact with relational databases like MySQL or NoSQL databases such as MongoDB Generate dynamic images, create PDF files, and parse XML files Learn secure scripts, error handling, performance tuning, and other advanced topics Get a quick reference to PHP core functions and standard extensions', '2S_Y6Zm02BQC', '2017-06-21 03:44:55', '2017-06-20 19:44:55'),
(31, 'ITエンジニアのための成功法則80', NULL, 'http://books.google.com/books/content?id=wkK6WM4-I9cC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '克元亮', 'ITエンジニア(SE・プログラマなど)で成功するための考え方・スキルの身に付け方・勉強方法がわかる。有名なあの会社の現役のSE・プロジェクトマネージャーなど、名だたるエンジニア達の生き様がわかるインタビューも掲載。', 'wkK6WM4-I9cC', '2017-06-21 03:48:03', '2017-06-20 19:48:03'),
(32, 'CakePHP 2 Application Cookbook', NULL, 'http://books.google.com/books/content?id=6Lg8BAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 'James Watts', 'If you are a CakePHP developer looking to ease the burden of development, then this book is for you. As a headfirst dive into the framework, this collection of recipes will help you get the most out of CakePHP, and get your applications baked in no time. Even if you\'re not familiar with the framework, we\'ll take you from basic CRUD building to useful solutions that will aid in getting the job done quickly and efficiently.', '6Lg8BAAAQBAJ', '2017-06-21 03:50:04', '2017-06-20 19:50:04'),
(33, '図解入門ビジネス最新トヨタ方式の基本と実践がよーくわかる本', NULL, 'http://books.google.com/books/content?id=WzHsacXWb18C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', '石川秀人', '5Sの基本と実践の意義がわかる。標準化とムダ取り改善がわかる。かんばんと運用ルールがわかる。ジャスト・イン・タイムがよくわかる。日常管理の整備がよくわかる。', 'WzHsacXWb18C', '2017-06-21 03:50:48', '2017-06-20 19:50:48'),
(34, '嫌われる勇気', NULL, 'http://books.google.com/books/content?id=qNMHnwEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '岸見一郎', '本書は、フロイト、ユングと並び「心理学の三大巨頭」と称される、アルフレッド・アドラーの思想(アドラー心理学)を、「青年と哲人の対話篇」という物語形式を用いてまとめた一冊です。欧米で絶大な支持を誇るアドラー心理学は、「どうすれば人は幸せに生きることができるか」という哲学的な問いに、きわめてシンプルかつ具体的な“答え”を提示します。この世界のひとつの真理とも言うべき、アドラーの思想を知って、あなたのこれからの人生はどう変わるのか?もしくは、なにも変わらないのか...。さあ、青年と共に「扉」の先へと進みましょう―。', 'qNMHnwEACAAJ', '2017-06-21 03:52:36', '2017-06-20 19:52:36'),
(35, '戦略は「１杯のコーヒー」から学べ！', NULL, 'http://books.google.com/books/content?id=hEeABAAAQBAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '永井孝尚', 'インスタント、缶コーヒー（製品イノベーション）、スタバ（外資）、セブン、マクド（異業種）、ネスレ（ビジネスモデル変革）など、ビジネステーマを網羅するコーヒー業界を舞台にストーリーでＭＢＡ理論を学ぶ１冊！', 'hEeABAAAQBAJ', '2017-06-21 03:54:29', '2017-06-20 19:54:29'),
(36, 'シャーロック・ホームズ殺人事件（上）', NULL, 'http://books.google.com/books/content?id=T_oSDgAAQBAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', 'グレアム ムーア', 'ホームズ研究家団体〈ベイカー・ストリート・イレギュラーズ〉の大会会場で、著名シャーロッキアンが死体で発見される。彼はコナン・ドイルの失われた日記を発見し、その詳細をこの大会で披露する予定だった。現場に居合わせた若きシャーロッキアンのハロルドは、問題の日記が事件の鍵であると考え、記者のセイラとともにロンドンへと向かうが、それは彼らを予想外の冒険へといざなうことになる。一方1900年、コナン・ドイルは偶然から若い女性の連続殺人に遭遇し、友人のブラム・ストーカーとともに調査に向かっていた。ロンドンの裏街での冒険の行方は？ 時空を超えたふたつの事件がからみあう、大型エンタテインメント！', 'T_oSDgAAQBAJ', '2017-06-21 03:55:50', '2017-06-20 19:55:50'),
(37, '植物図鑑', NULL, 'http://books.google.com/books/content?id=U5pTHSxxf40C&printsec=frontcover&img=1&zoom=1&source=gbs_api', '有川　浩', '「お嬢さん、よかったら俺を拾ってくれませんか？ 咬みません。躾のできたよい子です」「――あらやだ。けっこういい男」――ある日、道ばたに落ちていた彼、イツキ。さやかが彼から聞いたのはそれだけ。でも、それで充分だった。二人の共同生活は次第にかけがえのない日々となっていく――。花を咲かせるように、この恋を育てよう。『阪急電車』『図書館戦争』の有川浩、最新にして最高のラブストーリー！ 番外編に加え、イツキ特製“道草料理レシピ”も掲載!!', 'U5pTHSxxf40C', '2017-06-21 03:57:38', '2017-06-20 19:57:38'),
(38, '源氏物語', NULL, 'http://books.google.com/books/content?id=09gPAAAAYAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '紫式部', 'なし', '09gPAAAAYAAJ', '2017-06-21 03:58:47', '2017-06-20 19:58:47'),
(39, 'モーツァルト', NULL, 'http://books.google.com/books/content?id=swmqAgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '西川尚生', 'モーツァルトの最新研究による生涯と作品', 'swmqAgAACAAJ', '2017-06-21 04:00:39', '2017-06-20 20:00:39'),
(40, '告白', NULL, 'http://books.google.com/books/content?id=sCfrRgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '湊かなえ', '「愛美は死にました。しかし事故ではありません。このクラスの生徒に殺されたのです」我が子を校内で亡くした中学校の女性教師によるホームルームでの告白から、この物語は始まる。語り手が「級友」「犯人」「犯人の家族」と次々と変わり、次第に事件の全体像が浮き彫りにされていく。衝撃的なラストを巡り物議を醸した、デビュー作にして、第6回本屋大賞受賞のベストセラーが遂に文庫化!“特別収録”中島哲也監督インタビュー『「告白」映画化によせて』。', 'sCfrRgAACAAJ', '2017-06-21 07:35:47', '2017-06-20 23:35:47'),
(41, '刀語', NULL, 'http://books.google.com/books/content?id=rW5-QgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '西尾維新', '絶対凍土の地、蝦夷の踊山を彷徨う無刀の剣士・鑢七花と美貌の奇策士・とがめの前に姿を現したのは、天真爛漫な少女、凍空こなゆき―!吹きすさぶ豪雪と疾風のなか、七花が絶体絶命の危機に!!追い詰められた真庭忍軍の切り札と、とがめを狙う謎の第三勢力の蠢動やいかに!?前半戦、まさにここに極まれり。', 'rW5-QgAACAAJ', '2017-06-21 07:36:21', '2017-06-20 23:36:21'),
(42, '刀語　第八話　微刀・釵', NULL, 'http://books.google.com/books/content?id=xTUCDQAAQBAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '西尾維新', '「存在そのものが居ながらにして一本の日本刀――それがこのおれ、鑢七花だ」 七花ととがめは江戸の奥地に広がる人外魔境の異界・不要湖へと足を踏み入れる。敵か、味方か……とがめたちを揺さぶる監察所総監督・否定姫と、配下の元忍者・左右田右衛門左衛門！ そして、残すところ四人となった、真庭忍軍の次の一手とは!? 刀語、第八話の対戦相手は、不要湖を守護する日和号。', 'xTUCDQAAQBAJ', '2017-06-21 07:38:33', '2017-06-20 23:38:33'),
(43, '歪笑小説', NULL, 'http://books.google.com/books/content?id=zA2EtgAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '東野圭吾', '新人編集者が目の当たりにした、常識破りのあの手この手を連発する伝説の編集者。自作のドラマ化話に舞い上がり、美人担当者に恋心を抱く、全く売れない若手作家。出版社のゴルフコンペに初参加して大物作家に翻弄されるヒット作症候群の新鋭...俳優、読者、書店、家族を巻き込んで作家の身近は事件がいっぱい。ブラックな笑い満載!小説業界の内幕を描く連続ドラマ。とっておきの文庫オリジナル。', 'zA2EtgAACAAJ', '2017-06-21 07:40:28', '2017-06-20 23:40:28'),
(44, '別冊図書館戦争 1', NULL, 'http://books.google.com/books/content?id=CsZZXwAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '有川浩', '晴れて彼氏彼女の関係となった堂上と郁。しかし、その不器用さと経験値の低さが邪魔をして、キスから先になかなか進めない。あぁ、純粋培養純情乙女・茨城県産26歳、図書隊員笠原郁の迷える恋はどこへ行く―!?恋する男女のもどかしい距離感、そして、次々と勃発する、複雑な事情を秘めた事件の数々。「図書館革命」後の図書隊の日常を、爽やかに、あまーく描く、恋愛成分全開のシリーズ番外編第1弾。本日も、ベタ甘警報発令中。', 'CsZZXwAACAAJ', '2017-06-21 07:42:01', '2017-06-20 23:42:01'),
(45, 'ラプラスの魔女', NULL, 'http://books.google.com/books/content?id=mGOCrgEACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '東野圭吾', '彼女は計算して奇跡を起こす。東野圭吾が小説の常識をくつがえして挑んだ、空想科学ミステリ。', 'mGOCrgEACAAJ', '2017-06-21 07:44:38', '2017-06-20 23:44:38'),
(46, '「君の名は」の民俗学', NULL, 'http://books.google.com/books/content?id=ouhFAwAACAAJ&printsec=frontcover&img=1&zoom=1&source=gbs_api', '岩井宏實', 'なぜ、名前は隠されてきたのか?名前に籠められた日本人の心。', 'ouhFAwAACAAJ', '2017-06-21 07:46:58', '2017-06-20 23:46:58');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- テーブルのデータのダンプ `likes`
--

INSERT INTO `likes` (`like_id`, `user_id`, `record_id`) VALUES
(3, 1, 3),
(4, 1, 4),
(5, 5, 9),
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
(23, 13, 6),
(24, 3, 15),
(27, 2, 15),
(28, 2, 10),
(29, 2, 14),
(30, 2, 8),
(31, 3, 16),
(32, 2, 17),
(33, 4, 17),
(35, 3, 9),
(36, 3, 8),
(37, 3, 7),
(45, 2, 1),
(46, 1, 20),
(47, 1, 15),
(53, 2, 22),
(55, 2, 26),
(56, 2, 16),
(57, 2, 12),
(58, 1, 12),
(59, 1, 22),
(60, 1, 23),
(61, 3, 23),
(64, 1, 1),
(67, 1, 17),
(69, 1, 2),
(70, 6, 1),
(71, 10, 15),
(72, 10, 17);

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
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- テーブルのデータのダンプ `records`
--

INSERT INTO `records` (`record_id`, `user_id`, `stars`, `review`, `start_date`, `end_date`, `book_id`, `created`, `modified`) VALUES
(1, 1, 5, '読み始めると止まらない', '2017-06-19 00:00:00', '2017-06-20 00:00:00', 1, '2017-06-19 20:30:02', '2017-06-20 02:54:14'),
(2, 1, 5, '少年も成長物語', '2017-06-01 00:00:00', '2017-06-22 00:00:00', 2, '2017-06-19 20:35:11', '2017-06-20 02:54:15'),
(3, 1, 5, 'トマトの良さ知れた', '2017-06-19 00:00:00', '2017-06-19 00:00:00', 3, '2017-06-19 20:41:10', '2017-06-20 02:54:15'),
(4, 1, 5, 'トマトときゅうりがたべたくなる', '2017-06-07 00:00:00', '2017-06-21 00:00:00', 4, '2017-06-20 00:03:32', '2017-06-20 02:54:15'),
(5, 1, 5, '卵について学びたいならこれ', '2017-06-07 00:00:00', '2017-06-21 00:00:00', 5, '2017-06-20 00:06:15', '2017-06-20 02:54:15'),
(6, 1, 5, '読み終わった後虚無感に襲われる', '2017-06-21 00:00:00', '2017-06-29 00:00:00', 6, '2017-06-20 00:11:04', '2017-06-20 02:54:15'),
(7, 1, 5, 'これで泣けないやつは人間じゃない', '2017-06-20 00:00:00', '2017-06-21 00:00:00', 7, '2017-06-20 00:18:11', '2017-06-20 02:54:15'),
(8, 1, 5, 'まじ天使', '2017-06-21 00:00:00', '2017-06-22 00:00:00', 8, '2017-06-20 01:05:39', '2017-06-20 02:54:15'),
(9, 1, 5, 'キリト三角形', '2017-06-13 00:00:00', '2017-06-28 00:00:00', 9, '2017-06-20 01:07:29', '2017-06-20 02:54:15'),
(10, 1, 4, 'いろいろ考えさせられた', '2017-06-21 00:00:00', '2017-06-22 00:00:00', 10, '2017-06-20 01:09:33', '2017-06-20 02:54:15'),
(11, 1, 4, '一番じゃなきゃダメ', '2017-06-19 00:00:00', '2017-06-21 00:00:00', 11, '2017-06-20 01:10:31', '2017-06-20 02:54:15'),
(12, 1, 5, 'できたらいいな', '2017-06-20 00:00:00', '2017-06-23 00:00:00', 12, '2017-06-20 09:13:00', '2017-06-20 02:54:15'),
(13, 1, 3, ' とくしまーーーー', '2017-06-23 00:00:00', '2017-06-23 00:00:00', 13, '2017-06-20 09:18:39', '2017-06-20 02:54:15'),
(14, 1, 5, '    面白かった', '2017-06-15 00:00:00', '2017-06-17 00:00:00', 10, '2017-06-20 12:05:09', '2017-06-20 04:05:09'),
(15, 2, 5, '    めっちゃ感動した！！！', '2017-06-01 00:00:00', '2017-06-03 00:00:00', 1, '2017-06-20 16:53:20', '2017-06-20 08:53:20'),
(16, 2, 5, '    面白かった――――――(^O^)', '2017-06-16 00:00:00', '2017-06-19 00:00:00', 2, '2017-06-20 17:00:02', '2017-06-20 09:00:02'),
(17, 2, 5, '  泣ける話だった', '2017-06-14 00:00:00', '2017-06-17 00:00:00', 12, '2017-06-20 17:00:45', '2017-06-20 09:00:45'),
(18, 2, 4, '    Very good', '2017-06-15 00:00:00', '2017-06-21 00:00:00', 13, '2017-06-20 17:01:18', '2017-06-20 09:01:18'),
(19, 1, 5, 'フィリピンサイコー', '2017-06-08 00:00:00', '2017-06-09 00:00:00', 14, '2017-06-20 18:02:57', '2017-06-20 10:02:57'),
(20, 1, 4, '    よかった', '2017-06-01 00:00:00', '2017-06-02 00:00:00', 15, '2017-06-20 18:40:11', '2017-06-20 10:40:11'),
(21, 1, 5, '感慨深い話だった', '2017-06-07 00:00:00', '2017-06-08 00:00:00', 16, '2017-06-20 21:08:09', '2017-06-20 13:08:09'),
(22, 1, 5, '難しかった', '2017-06-21 00:00:00', '2017-06-23 00:00:00', 17, '2017-06-20 21:16:28', '2017-06-20 13:16:28'),
(23, 1, 5, '    めっちゃ面白い！！！', '2017-06-06 00:00:00', '2017-06-21 00:00:00', 18, '2017-06-20 21:17:23', '2017-06-20 13:17:23'),
(24, 1, 5, '    good', '2017-06-07 00:00:00', '2017-06-08 00:00:00', 19, '2017-06-20 22:19:56', '2017-06-20 14:19:56'),
(25, 1, 4, '    おおお', '2017-06-13 00:00:00', '2017-06-14 00:00:00', 20, '2017-06-20 22:21:19', '2017-06-20 14:21:19'),
(26, 1, 4, '    面白かった', '2017-06-14 00:00:00', '2017-06-21 00:00:00', 21, '2017-06-20 22:21:50', '2017-06-20 14:21:50'),
(27, 1, 4, '  good', '2017-06-06 00:00:00', '2017-06-07 00:00:00', 22, '2017-06-20 22:38:18', '2017-06-20 14:38:18'),
(28, 1, 5, '    ｄｄｄ', '2017-06-14 00:00:00', '2017-06-15 00:00:00', 23, '2017-06-20 22:42:04', '2017-06-20 14:42:04'),
(31, 1, 5, '    最高', '2017-06-07 00:00:00', '2017-06-08 00:00:00', 25, '2017-06-21 00:06:10', '2017-06-20 16:06:10'),
(32, 1, 5, '    ドキドキ', '2017-06-08 00:00:00', '2017-06-09 00:00:00', 26, '2017-06-21 00:26:29', '2017-06-20 16:26:29'),
(33, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 01:11:17', '2017-06-20 17:11:17'),
(34, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 01:16:23', '2017-06-20 17:16:23'),
(35, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 01:16:25', '2017-06-20 17:16:25'),
(36, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 01:16:33', '2017-06-20 17:16:33'),
(37, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 02:50:06', '2017-06-20 18:50:06'),
(38, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 02:58:38', '2017-06-20 18:58:38'),
(39, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:00:36', '2017-06-20 19:00:36'),
(40, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:01:10', '2017-06-20 19:01:10'),
(41, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:02:00', '2017-06-20 19:02:00'),
(42, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:02:13', '2017-06-20 19:02:13'),
(43, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:10:58', '2017-06-20 19:10:58'),
(44, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:14:29', '2017-06-20 19:14:29'),
(45, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:16:42', '2017-06-20 19:16:42'),
(46, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:16:45', '2017-06-20 19:16:45'),
(47, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:16:47', '2017-06-20 19:16:47'),
(48, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:16:48', '2017-06-20 19:16:48'),
(49, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:17:24', '2017-06-20 19:17:24'),
(50, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:18:11', '2017-06-20 19:18:11'),
(51, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:18:12', '2017-06-20 19:18:12'),
(52, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:18:13', '2017-06-20 19:18:13'),
(53, 1, 0, '    ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '2017-06-21 03:21:35', '2017-06-20 19:21:35'),
(54, 3, 5, '    映画もみたけど面白かった！', '2017-06-08 00:00:00', '2017-06-10 00:00:00', 1, '2017-06-21 03:27:34', '2017-06-20 19:27:34'),
(55, 3, 4, '    GOOD', '2017-05-31 00:00:00', '2017-06-02 00:00:00', 27, '2017-06-21 03:39:10', '2017-06-20 19:39:10'),
(56, 3, 5, '    とてもキュンキュンした！！！', '2017-06-08 00:00:00', '2017-06-09 00:00:00', 28, '2017-06-21 03:39:55', '2017-06-20 19:39:55'),
(57, 3, 5, '    (^O^)', '2017-06-06 00:00:00', '2017-06-08 00:00:00', 12, '2017-06-21 03:43:04', '2017-06-20 19:43:04'),
(58, 3, 5, '    難しい', '2017-04-04 00:00:00', '2017-04-19 00:00:00', 29, '2017-06-21 03:43:58', '2017-06-20 19:43:58'),
(59, 3, 3, '    難しすぎるーーー', '2017-06-08 00:00:00', '2017-06-16 00:00:00', 30, '2017-06-21 03:45:14', '2017-06-20 19:45:14'),
(60, 3, 4, '    色々学べた', '2017-06-13 00:00:00', '2017-06-15 00:00:00', 31, '2017-06-21 03:49:10', '2017-06-20 19:49:10'),
(61, 3, 5, '    Very Very GOOD!!', '2017-06-20 00:00:00', '2017-06-23 00:00:00', 32, '2017-06-21 03:50:21', '2017-06-20 19:50:21'),
(62, 3, 4, '    だいたい理解した', '2017-06-14 00:00:00', '2017-06-22 00:00:00', 33, '2017-06-21 03:51:07', '2017-06-20 19:51:07'),
(63, 3, 5, '    嫌われる勇気を持てるようになった気がする', '2017-06-14 00:00:00', '2017-06-15 00:00:00', 34, '2017-06-21 03:52:57', '2017-06-20 19:52:57'),
(64, 3, 5, '    コーヒー大好き', '2017-06-02 00:00:00', '2017-06-10 00:00:00', 35, '2017-06-21 03:54:48', '2017-06-20 19:54:48'),
(65, 3, 5, '    スリル満点', '2017-06-08 00:00:00', '2017-06-09 00:00:00', 36, '2017-06-21 03:56:08', '2017-06-20 19:56:08'),
(66, 3, 4, '    いいね', '2017-06-16 00:00:00', '2017-06-23 00:00:00', 37, '2017-06-21 03:57:50', '2017-06-20 19:57:50'),
(67, 3, 5, '    いづれの御時にか、女御・更衣あまた さぶらひたまひけるなかに、いとやむごとなき 際にはあらぬが、すぐれてときめきたまふありけり。', '2017-06-07 00:00:00', '2017-06-09 00:00:00', 38, '2017-06-21 03:59:38', '2017-06-20 19:59:38'),
(68, 3, 4, '    Mozart大好き', '2017-06-13 00:00:00', '2017-06-15 00:00:00', 39, '2017-06-21 04:01:13', '2017-06-20 20:01:13'),
(69, 3, 5, '    難しいーーーーー', '2017-06-08 00:00:00', '2017-06-10 00:00:00', 21, '2017-06-21 04:02:53', '2017-06-20 20:02:53'),
(70, 4, 4, '    いいね', '2017-06-08 00:00:00', '2017-06-08 00:00:00', 1, '2017-06-21 04:16:02', '2017-06-20 20:16:02'),
(71, 4, 5, '  ふつー', '2017-06-07 00:00:00', '2017-06-08 00:00:00', 40, '2017-06-21 07:36:06', '2017-06-20 23:36:06'),
(72, 4, 5, '    結構いい感じ', '2017-06-05 00:00:00', '2017-06-16 00:00:00', 41, '2017-06-21 07:36:38', '2017-06-20 23:36:38'),
(73, 4, 5, '    うん', '2017-06-21 00:00:00', '2017-06-22 00:00:00', 2, '2017-06-21 07:37:04', '2017-06-20 23:37:04'),
(74, 5, 5, '    まぁまぁ', '2017-06-08 00:00:00', '2017-06-16 00:00:00', 1, '2017-06-21 07:39:04', '2017-06-20 23:39:04'),
(75, 5, 5, '    難しいけど面白い', '2017-06-14 00:00:00', '2017-06-16 00:00:00', 32, '2017-06-21 07:39:54', '2017-06-20 23:39:54'),
(76, 5, 5, '    いい感じ', '2017-06-22 00:00:00', '2017-06-24 00:00:00', 6, '2017-06-21 07:41:40', '2017-06-20 23:41:40'),
(77, 5, 4, '    ふつーー', '2017-06-08 00:00:00', '2017-06-09 00:00:00', 44, '2017-06-21 07:42:17', '2017-06-20 23:42:17'),
(78, 6, 5, '    いいね！！！！', '2017-06-09 00:00:00', '2017-06-10 00:00:00', 1, '2017-06-21 07:43:13', '2017-06-20 23:43:13'),
(79, 6, 5, '    おおおおお', '2017-06-08 00:00:00', '2017-06-09 00:00:00', 2, '2017-06-21 07:43:33', '2017-06-20 23:43:33'),
(80, 6, 5, '    泣ける', '2017-06-15 00:00:00', '2017-06-16 00:00:00', 6, '2017-06-21 07:43:57', '2017-06-20 23:43:57'),
(81, 6, 5, 'あああああむず', '2017-06-16 00:00:00', '2017-06-23 00:00:00', 32, '2017-06-21 07:44:22', '2017-06-20 23:44:22'),
(82, 6, 5, '    ラプラス', '2017-06-02 00:00:00', '2017-06-03 00:00:00', 45, '2017-06-21 07:44:51', '2017-06-20 23:44:51'),
(83, 7, 5, '    (^O^)', '2017-06-02 00:00:00', '2017-06-03 00:00:00', 1, '2017-06-21 07:45:35', '2017-06-20 23:45:35'),
(84, 7, 5, '    (*^^*)', '2017-06-16 00:00:00', '2017-06-17 00:00:00', 32, '2017-06-21 07:46:03', '2017-06-20 23:46:03'),
(85, 8, 5, '    よいよい', '2017-06-07 00:00:00', '2017-06-09 00:00:00', 1, '2017-06-21 07:47:23', '2017-06-20 23:47:23'),
(86, 9, 5, '    いぇい！', '2017-06-13 00:00:00', '2017-06-15 00:00:00', 1, '2017-06-21 07:48:14', '2017-06-20 23:48:14'),
(87, 10, 5, '    おおお', '2017-06-08 00:00:00', '2017-06-09 00:00:00', 1, '2017-06-21 07:49:42', '2017-06-20 23:49:42'),
(88, 11, 5, 'まぁそんなかんじ', '2017-06-07 00:00:00', '2017-06-08 00:00:00', 34, '2017-06-21 07:51:04', '2017-06-20 23:51:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- テーブルのデータのダンプ `record_keyword`
--

INSERT INTO `record_keyword` (`record_keyword_id`, `record_id`, `keyword_id`) VALUES
(1, 26, 1),
(2, 26, 2),
(3, 27, 1),
(4, 27, 2),
(5, 27, 4),
(6, 27, 6),
(7, 28, 10),
(8, 28, 11),
(9, 29, 1),
(10, 29, 2),
(11, 29, 3),
(12, 29, 4),
(13, 29, 5),
(14, 30, 4),
(15, 30, 9),
(16, 30, 10),
(17, 30, 11),
(18, 31, 1),
(19, 31, 4),
(20, 31, 9),
(21, 31, 12),
(22, 32, 1),
(23, 32, 3),
(24, 32, 10),
(25, 32, 11),
(26, 32, 13),
(27, 33, 2),
(28, 33, 3),
(29, 33, 5),
(30, 33, 11),
(31, 33, 12),
(32, 34, 1),
(33, 34, 9),
(34, 34, 10),
(35, 34, 11),
(36, 34, 13),
(37, 35, 9),
(38, 35, 10),
(39, 35, 11),
(40, 35, 13),
(41, 36, 3),
(43, 36, 4),
(44, 36, 9),
(45, 36, 10),
(46, 36, 11),
(47, 37, 3),
(48, 37, 4),
(49, 37, 9),
(50, 37, 12),
(51, 38, 1),
(52, 38, 2),
(53, 38, 4),
(54, 38, 11),
(55, 39, 4),
(56, 39, 5),
(57, 39, 6),
(58, 39, 10),
(59, 40, 4),
(60, 40, 10),
(61, 40, 11),
(62, 40, 12),
(63, 41, 7),
(64, 10, 10),
(65, 15, 3),
(66, 15, 9),
(67, 15, 10),
(68, 16, 4),
(69, 16, 12),
(70, 16, 13),
(71, 17, 4),
(72, 17, 10),
(73, 17, 11),
(74, 18, 11),
(75, 19, 4),
(76, 20, 2),
(77, 21, 11),
(78, 22, 1),
(79, 22, 9),
(80, 22, 10),
(81, 23, 4),
(82, 23, 5),
(83, 23, 11),
(84, 24, 3),
(85, 25, 11),
(86, 26, 1),
(87, 26, 9),
(88, 27, 9),
(89, 28, 3),
(90, 28, 4),
(91, 24, 4),
(92, 24, 5),
(93, 30, 11),
(94, 30, 12),
(95, 31, 1),
(96, 31, 2),
(97, 31, 9),
(98, 32, 1),
(99, 32, 2),
(100, 54, 1),
(101, 54, 4),
(102, 54, 13),
(103, 55, 2),
(104, 56, 12),
(105, 56, 13),
(106, 57, 4),
(107, 57, 11),
(108, 57, 13),
(109, 58, 11),
(110, 59, 8),
(111, 60, 9),
(112, 60, 11),
(113, 61, 3),
(114, 61, 4),
(115, 62, 9),
(116, 63, 4),
(117, 63, 10),
(118, 63, 11),
(119, 64, 12),
(120, 65, 3),
(121, 65, 4),
(122, 66, 13),
(123, 67, 9),
(124, 68, 4),
(125, 69, 9),
(126, 70, 4),
(127, 71, 1),
(128, 71, 2),
(129, 71, 9),
(130, 72, 4),
(131, 72, 10),
(132, 72, 11),
(133, 73, 4),
(134, 73, 12),
(135, 73, 13),
(136, 74, 1),
(137, 74, 4),
(138, 74, 9),
(139, 75, 11),
(140, 76, 4),
(141, 76, 11),
(142, 76, 12),
(143, 77, 4),
(144, 77, 10),
(145, 77, 11),
(146, 78, 3),
(147, 78, 4),
(148, 79, 10),
(149, 79, 11),
(150, 79, 12),
(151, 80, 11),
(152, 81, 11),
(153, 82, 3),
(154, 82, 4),
(155, 82, 11),
(156, 83, 4),
(157, 84, 11),
(158, 85, 11),
(159, 86, 11),
(160, 87, 4),
(161, 88, 3),
(162, 88, 4);

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
  `point` int(11) DEFAULT '0',
  `level` int(11) DEFAULT '0',
  `created` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `age`, `gender`, `avatar_id`, `hobby`, `job`, `bestbook_id`, `great_man`, `comment`, `point`, `level`, `created`) VALUES
(1, 'demo1', 'demo1@demo1', '10f71961bd11dd33c1c95c771b98cf0e09d57b7c', 20, 1, 7, '野球', '学生', 6, 'アインシュタイン', '目標月3冊！！！', 40, 4, '0000-00-00 00:00:00'),
(2, 'AYUMI　MAEDA', 'ayumi@ayumi', 'ecbd8af733a17803b66ee4321b23f87f103cc9ca', 20, 2, 4, '洋楽を聴く', 'ナース', 11, '', 'よろしくお願いします！', 40, 4, '0000-00-00 00:00:00'),
(3, 'demo2', 'demo2@demo2', 'db61277694fea41b42a8ac82cbb678baac683990', 40, 1, 8, '読書', 'フリーランス', NULL, NULL, NULL, 90, 9, '0000-00-00 00:00:00'),
(4, 'ATSUSHI MIYAMOTO', 'atsushi@atsushi', '1c5aa4fe8dcfac2419277476df6c1e8def58f827', 20, 1, 7, '筋トレ', '', NULL, NULL, NULL, 40, 4, '0000-00-00 00:00:00'),
(5, 'NARU　NISHIMURA', 'naru@naru', 'feac8c398d6ed455ec8c9eb6cf074571328a2672', 10, 1, 1, 'スケボー', '少年', 42, '', 'あああ', 40, 4, '0000-00-00 00:00:00'),
(6, 'RIMIKO　FUKUMITSU', 'rimiko@rimiko', '4551f4af414825b02dee083ee07c6e0232406c34', 20, 2, 5, 'ピアノ', '学生', NULL, NULL, NULL, 50, 5, '0000-00-00 00:00:00'),
(7, 'ERIKO ICHINOHE', 'eriko@eriko', 'e6dd2a0cb778fc799964f50a7661ea4649b9bc1e', 30, 2, 4, 'ムエタイ', 'エンジニア', NULL, NULL, NULL, 20, 2, '0000-00-00 00:00:00'),
(8, 'SHINYA　HIRAI', 'shinya@shinya', '4d81ce10d299ec09f695b7ab38e64d2c457411bf', 20, 1, 7, 'バスケ', 'エンジニア', NULL, NULL, NULL, 10, 1, '0000-00-00 00:00:00'),
(9, 'YUKI　SATO', 'yuki@yuki', 'a6aa6c594f3f904825833313c0bab3e292e95764', 20, 2, 4, '旅行', '', NULL, NULL, NULL, 10, 1, '0000-00-00 00:00:00'),
(10, 'LOUIS', 'louis@louis', 'd82ece8d514aca7e24d3fc11fbb8dada57f2966c', 20, 1, 7, '旅人', '旅人', NULL, NULL, NULL, 10, 1, '0000-00-00 00:00:00'),
(11, 'MANATO KAWAGUCHI', 'manato@manato', '81fca17fef08bdd0ad9298e9933c2373dbc5b912', 20, 1, 1, '', '', NULL, NULL, NULL, 10, 1, '0000-00-00 00:00:00'),
(12, 'ああああ', 'aaaa@aaaa', '70c881d4a26984ddce795f6f71817c9cf4480e79', 10, 2, 1, '', '', NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00'),
(13, 'oooo', 'oooo@oooo', 'd13150fd106676133ad3bd816c2c7a57a3638029', 10, 1, 7, '', '', NULL, NULL, NULL, 0, 0, '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
