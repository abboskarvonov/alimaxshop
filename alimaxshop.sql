-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 06 2022 г., 09:16
-- Версия сервера: 10.4.19-MariaDB
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `alimaxshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '2', NULL),
('super-admin', '1', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 2, NULL, NULL, NULL, NULL, NULL),
('super-admin', 1, 'Site administration', NULL, NULL, NULL, NULL),
('user', 2, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('super-admin', 'admin'),
('super-admin', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urlAlias` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name_uz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `name_uz`, `name_ru`, `name_en`, `link`, `img`) VALUES
(1, 'Elektronika', 'Электроника', 'Electronics', '5fde389fdc08d208448511307200', '../../frontend/web/img/category/16083990075fde389fdc08d.jpg'),
(5, 'Ayollar uchun', 'Для женщинам', 'For women', '5fde390b303f6208448525304000', '../../frontend/web/img/category/16083991155fde390b303f6.jpg'),
(6, 'Erkaklar uchun', 'Для мужчинам', 'For men', '5fde3914c765d208448526470400', '../../frontend/web/img/category/16083991245fde3914c765d.jpg'),
(7, 'Bolalar uchun', 'Для детей', 'For children', '5fde392788597208448528932800', '../../frontend/web/img/category/16083991435fde392788597.jpg'),
(8, 'Go\'zallik va so\'glik', 'Красота и здоровье', 'Health and beauty', '5fde39325d4bb208448530358400', '../../frontend/web/img/category/16083991545fde39325d4bb.jpg'),
(9, 'Avtomobillar', 'Автомобили', 'Cars', '5fde3ba331619208448611358400', '../../frontend/web/img/category/16083997795fde3ba331619.jpg'),
(10, 'Ko\'chmas mulk', 'Недвижимость', 'The property', '5fde3dada6107208448679009600', '../../frontend/web/img/category/16084003015fde3dada6107.jpg'),
(11, 'Uy va bog\'', 'Дом и сад', 'House and garden', '5fde3fe7a478b208448752881600', '../../frontend/web/img/category/16084008715fde3fe7a478b.jpg'),
(13, 'Qurilish', 'Строительство', '', '5ff6e3768f207208658022537600', '../../frontend/web/img/category/16100156065ff6e3768f207.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `menu_element`
--

CREATE TABLE `menu_element` (
  `id` int(11) NOT NULL,
  `name_uz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_title_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_element`
--

INSERT INTO `menu_element` (`id`, `name_uz`, `name_ru`, `name_en`, `link`, `menu_id`, `menu_title_id`) VALUES
(24, 'Krossovka va kedalar', 'Кроссовки и кеды', '', '5ff3e5164e0a1__16098194145ff3e5164e0ac', 6, 16),
(25, 'Botinka va etiklar', 'Сапоги и ботинки', '', '5ff3e4c8842b0__16098193365ff3e4c8842bb', 6, 16),
(26, 'Jenferlar va sviterlar', 'Джемперы и свитеры', '', '5ff3f3072e995__16098229835ff3f3072e998', 6, 17),
(27, 'Ijara uzoq muddatga', 'Аренда долгосрочная', '', '5ff57a9b2e534__16099232275ff57a9b2e538', 10, 19),
(28, 'Ijara sutkalik', 'Аренда посуточно', '', '5ff57ab420f19__16099232525ff57ab420f1c', 10, 19),
(29, 'Ijara uzoq muddatga', 'Аренда долгосрочная', '', '5ff57af2b4e96__16099233145ff57af2b4e9a', 10, 20),
(30, 'Ijara sutkalik', 'Аренда посуточно', '', '5ff57b2c228d3__16099233725ff57b2c228d8', 10, 20),
(31, 'Ijara', 'Аренда', '', '5ff1928a348a6__16096672105ff1928a348b1', 10, 21),
(32, 'Sotish', 'Продажа', '', '5ff19295b491c__16096672215ff19295b491f', 10, 21),
(33, 'Slans va shippaklar', 'Сланцы и тапочки', '', '5ff3e56108168__16098194895ff3e5610816c', 6, 16),
(34, 'Poyafzal', 'Туфли', '', '5ff3e597b9522__16098195435ff3e597b952c', 6, 16),
(35, 'Boshqa poyabzallar', 'Другая обувь', '', '5ff3e62ccf56c__16098196925ff3e62ccf56f', 6, 16),
(36, 'Aksessuarlar', 'Аксессуары', '', '5ff3e7b5d5779__16098200855ff3e7b5d577c', 1, 26),
(37, 'Mobil telefonlar', 'Мобильные телефоны', '', '5ff3e9c26b116__16098206105ff3e9c26b119', 1, 26),
(38, 'Sim-karta / tarif / nomerlar', 'Сим-карты / тарифы / номера', '', '5ff3e9e44226c__16098206445ff3e9e44226f', 1, 26),
(39, 'Statsionar telefonlar', 'Стационарные телефоны', '', '5ff3ea03795b8__16098206755ff3ea03795bb', 1, 26),
(40, 'Boshqa telefonlar', 'Прочие телефоны', '', '5ff3ea2dad350__16098207175ff3ea2dad353', 1, 26),
(41, 'Shimlar', 'Брюки', '', '5ff3f34bbf104__16098230515ff3f34bbf107', 6, 17),
(42, 'Jinsi', 'Джинсы', '', '5ff3f35d569c4__16098230695ff3f35d569c7', 6, 17),
(43, 'Uy kiyimlari', 'Домашняя одежда', '', '5ff3f3728bafe__16098230905ff3f3728bb07', 6, 17),
(44, 'Jiletlar', 'Жилеты', '', '5ff3f3b41a199__16098231565ff3f3b41a19d', 6, 17),
(45, 'Ichki kiyim', 'Нижнее белье', '', '5ff3f3cfd5957__16098231835ff3f3cfd595b', 6, 17),
(46, 'Naski', 'Носки', '', '5ff3f3dfb30af__16098231995ff3f3dfb30b3', 6, 17),
(47, 'Pijak va kosyumlar', 'Пиджаки и костюмы', '', '5ff3f3f669bd5__16098232225ff3f3f669bde', 6, 17),
(48, 'Ko\'ylaklar', 'Рубашки', '', '5ff3f40adb37d__16098232425ff3f40adb381', 6, 17),
(49, 'Tolstovaka va svitshotlar', 'Толстовки и свитшоты', '', '5ff3f41ddb3c9__16098232615ff3f41ddb3cc', 6, 17),
(50, 'Futbolka va polo', 'Футболки и поло ', '', '5ff3f44979fec__16098233055ff3f44979fef', 6, 17),
(51, 'Shortik', 'Шорты', '', '5ff3f45ac8f6f__16098233225ff3f45ac8f72', 6, 17),
(52, 'Jinsi kurtka', 'Джинсовые куртки', '', '5ff3f49990a86__16098233855ff3f49990a91', 6, 24),
(53, 'Koja kurtka', 'Кожаные куртки', '', '5ff3f4b491eb7__16098234125ff3f4b491ec2', 6, 24),
(54, 'Kurtkalar', 'Куртки', '', '5ff3f4beecc60__16098234225ff3f4beecc62', 6, 24),
(55, 'Palto', 'Пальто', '', '5ff3f4c974a53__16098234335ff3f4c974a57', 6, 24),
(56, 'Plashlar', 'Плащи', '', '5ff3f4d5e60ad__16098234455ff3f4d5e60b0', 6, 24),
(57, 'Bluzkalar va ko\'ylaklar', 'Блузки и рубашки', '', '5ff3f8fe33359__16098245105ff3f8fe3335d', 5, 15),
(58, 'Shimlar', 'Брюки', '', '5ff3f9189b39a__16098245365ff3f9189b3a9', 5, 15),
(59, 'Jenfer va kardiganlar', 'Джемперы и кардиганы', '', '5ff3f92987eb6__16098245535ff3f92987eb9', 5, 15),
(60, 'Jinsilar', 'Джинсы', '', '5ff3f94cc42dc__16098245885ff3f94cc42e0', 5, 15),
(61, 'Uy kiyimlari', 'Домашняя одежда', '', '5ff3f9548704d__16098245965ff3f95487050', 5, 15),
(62, 'Jaket va pijaklar', 'Жакеты и пиджаки', '', '5ff3f9678a327__16098246155ff3f9678a331', 5, 15),
(63, 'Jiletlar', 'Жилеты', '', '5ff3f971d7e80__16098246255ff3f971d7e83', 5, 15),
(64, 'Kombinzonlar', 'Комбинезоны', '', '5ff3f97ec1a89__16098246385ff3f97ec1a93', 5, 15),
(65, 'Kostyumlar', 'Костюмы', '', '5ff3f98b3cbc2__16098246515ff3f98b3cbc5', 5, 15),
(66, 'Ichki kiyimlar', 'Нижнее белье', '', '5ff3f9957a4c2__16098246615ff3f9957a4c4', 5, 15),
(67, 'Naski, chulki va kalgotkalar', 'Носки, чулки и колготки', '', '5ff3f9ab10f6f__16098246835ff3f9ab10f72', 5, 15),
(68, 'Ko\'ylaklar', 'Платья', '', '5ff3f9c14e003__16098247055ff3f9c14e006', 5, 15),
(69, 'Tolstovaka va svitshotlar', 'Толстовки и свитшоты', '', '5ff3f9cf334df__16098247195ff3f9cf334e3', 5, 15),
(70, 'Futbolka va polo', 'Футболки и топы', '', '5ff3f9d860106__16098247285ff3f9d86010b', 5, 15),
(71, 'Shortik', 'Шорты', '', '5ff3f9e181a72__16098247375ff3f9e181a76', 5, 15),
(72, 'Yubka', 'Юбки', '', '5ff3f9e76b634__16098247435ff3f9e76b638', 5, 15),
(73, 'Jinsi kurtka', 'Джинсовые куртки', '', '5ff3fa15baddf__16098247895ff3fa15bade2', 5, 38),
(74, 'Koja kurtka', 'Кожаные куртки', '', '5ff3fa1e5e6b9__16098247985ff3fa1e5e6bc', 5, 38),
(75, 'Kurtkalar', 'Куртки', '', '5ff3fa280e01e__16098248085ff3fa280e020', 5, 38),
(76, 'Palto', 'Пальто ', '', '5ff3fa321debf__16098248185ff3fa321dec2', 5, 38),
(77, 'Plashlar', 'Плащи', '', '5ff3fa7d74001__16098248935ff3fa7d7400c', 5, 38),
(78, 'Bajanojka, sandal', 'Босоножки, сандалии', '', '5ff3fabc3d646__16098249565ff3fabc3d651', 5, 39),
(79, 'Botilonlar', 'Ботильоны', '', '5ff3faf481c2b__16098250125ff3faf481c2e', 5, 39),
(80, 'Bortfotlar', 'Ботфорты', '', '5ff3fb006e2be__16098250245ff3fb006e2c8', 5, 39),
(81, 'Krossovka va kedalar', 'Кроссовки и кеды', '', '5ff3fb0ce1e10__16098250365ff3fb0ce1e14', 5, 39),
(82, 'Loferlar', 'Лоферы', '', '5ff3fb195b5ea__16098250495ff3fb195b5ed', 5, 39),
(83, 'Rezinka sapoklar', 'Резиновые сапоги', '', '5ff3fb268a3f2__16098250625ff3fb268a3f5', 5, 39),
(84, 'Sapok va botinkalar', 'Сапоги и ботинки', '', '5ff3fb322051a__16098250745ff3fb322051d', 5, 39),
(85, 'Slans va shippaklar', 'Сланцы, тапочки', '', '5ff3fb3fe813c__16098250875ff3fb3fe8147', 5, 39),
(86, 'Tuflilar', 'Туфли', '', '5ff3fb4d06376__16098251015ff3fb4d06379', 5, 39),
(87, 'Galstuklar va sharflar', 'Галстуки и платки', '', '5ff3fbd8b0914__16098252405ff3fbd8b0917', 6, 25),
(88, 'Shlyapalar', 'Головные уборы', '', '5ff3fbe748e7b__16098252555ff3fbe748e7e', 6, 25),
(89, 'Ko\'zoynak', 'Очки', '', '5ff3fbf77fdae__16098252715ff3fbf77fdb1', 6, 25),
(90, 'Qo\'lqop', 'Перчатки и рукавицы', '', '5ff3fc1211125__16098252985ff3fc1211128', 6, 25),
(91, 'Soch uchun aksessuarlar', 'Аксессуары для волос', '', '5ff3fc41a807e__16098253455ff3fc41a8088', 5, 41),
(92, 'Shlyapalar', 'Головные уборы', '', '5ff3fc4d4b8b9__16098253575ff3fc4d4b8bc', 5, 41),
(93, 'Ko\'zoynak', 'Очки', '', '5ff3fc5770377__16098253675ff3fc577037a', 5, 41),
(94, 'Qo\'lqop', 'Перчатки и руковицы', '', '5ff3fc648df53__16098253805ff3fc648df5e', 5, 41),
(95, 'Kamarlar', 'Ремни', '', '5ff3fc707faab__16098253925ff3fc707fab2', 5, 41),
(96, 'Sharflar', 'Шарфы', '', '5ff3fc827b34c__16098254105ff3fc827b34f', 5, 41),
(97, 'Stol kompyuterlari', 'Настольные', '', '5ff400f15d293__16098265455ff400f15d296', 1, 27),
(98, 'Noutbuklar', 'Ноутбуки', '', '5ff4010215797__16098265625ff401021579a', 1, 27),
(99, 'Planshet kompyuterlar', 'Планшетные компьютеры', '', '5ff401174fd5c__16098265835ff401174fd60', 1, 27),
(100, 'Serverlar', 'Серверы', '', '5ff40125070cd__16098265975ff40125070d0', 1, 27),
(101, 'Aksessuarlar', 'Аксессуары', '', '5ff4012eae3b5__16098266065ff4012eae3e7', 1, 27),
(102, 'Qurilmalar', 'Комплектующие', '', '5ff4019bb453a__16098267155ff4019bb453e', 1, 27),
(103, 'Preferiya qurilmalari', 'Периферийные устройства', '', '5ff401bc9ae92__16098267485ff401bc9ae9d', 1, 27),
(104, 'Monitorlar', 'Мониторы', '', '5ff401c7c2158__16098267595ff401c7c215c', 1, 27),
(105, 'Tashqi qurilmalar', 'Внешние накопители', '', '5ff401f07cbc1__16098268005ff401f07cbc5', 1, 27),
(106, 'Chiqim materiallari', 'Расходные материалы', '', '5ff4020f5a867__16098268315ff4020f5a86a', 1, 27),
(107, 'Boshqa', 'Другое', '', '5ff40215d0e68__16098268375ff40215d0e6b', 1, 27),
(108, 'Plenkali fotoapparatlar', 'Пленочные фотоаппараты', '', '5ff40275d5d1b__16098269335ff40275d5d24', 1, 28),
(109, 'Raqamli fotoapparatlar', 'Цифровые фотоаппараты ', '', '5ff4028a2d3f0__16098269545ff4028a2d3f5', 1, 28),
(110, 'Videokameralar', 'Видеокамеры ', '', '5ff402aaceeb8__16098269865ff402aaceeba', 1, 28),
(111, 'Obyektivlar', 'Объективы ', '', '5ff402b933584__16098270015ff402b933589', 1, 28),
(112, 'Shtativlar/ monopodlar', 'Штативы / моноподы ', '', '5ff402c67619e__16098270145ff402c6761a9', 1, 28),
(113, 'Fotochaqnagichlar', 'Фотовспышки ', '', '5ff402d3d31e4__16098270275ff402d3d31e7', 1, 28),
(114, 'Foto/ videokameralar uchun aksessuarlar', 'Аксессуары для фото / видеокамер ', '', '5ff402e10a1fe__16098270415ff402e10a202', 1, 28),
(115, 'Teleskoplar/binokllar', 'Телескопы / бинокли ', '', '5ff402ee6733a__16098270545ff402ee67344', 1, 28),
(116, 'Media ovoz chiqargichlar', 'Медиа проигрыватели', '', '5ff40345a915b__16098271415ff40345a915f', 1, 29),
(117, 'Televizorlar', 'Телевизоры', '', '5ff403509f1cb__16098271525ff403509f1cf', 1, 29),
(118, 'TV uchun aksessuarlar, video', 'Аксессуары для ТВ/Видеотехники', '', '5ff4035c026ef__16098271645ff4035c026f3', 1, 29),
(119, 'Yo\'ldoshli TV', 'Спутниковое тв', '', '5ff4036b06062__16098271795ff4036b06065', 1, 29),
(120, 'Boshqa videotexnika', 'Прочая тв / видеотехника', '', '5ff403793f316__16098271935ff403793f320', 1, 29),
(121, 'Mp3 pleterlari', 'Mp3 плееры', '', '5ff408f46f837__16098285965ff408f46f843', 1, 30),
(122, 'Magnitolalar', 'Магнитолы', '', '5ff409088c94b__16098286165ff409088c94f', 1, 30),
(123, 'Musiqa markazlari', 'Музыкальные центры', '', '5ff4091375a8c__16098286275ff4091375a90', 1, 30),
(124, 'Akustika tizimlari', 'Акустические системы', '', '5ff40921650c8__16098286415ff40921650cb', 1, 30),
(125, 'Naushniklar', 'Наушники', '', '5ff4092f5d5e2__16098286555ff4092f5d5e6', 1, 30),
(126, 'Radiopriyomniklar', 'Радиоприемники', '', '5ff4093c6daba__16098286685ff4093c6dac4', 1, 30),
(127, 'Portativ akustika', 'Портативная акустика', '', '5ff40951e540d__16098286895ff40951e5416', 1, 30),
(128, 'Ovoz kuchaytirgichlar-resiverlar', 'Усилители / ресиверы', '', '5ff4095f133db__16098287035ff4095f133de', 1, 30),
(129, 'Cd / md / vinil ovoz chiqargichlar', 'Cd / md / виниловые проигрыватели', '', '5ff4097362f49__16098287235ff4097362f4c', 1, 30),
(130, 'Boshqa audiotexnika', 'Прочая аудиотехника', '', '5ff4097e1ff88__16098287345ff4097e1ff93', 1, 30),
(131, 'Pristavka uchun o\'yinlar', 'Игры для приставок', '', '5ff409c9a3f89__16098288095ff409c9a3f8c', 1, 31),
(132, 'Pristavkalar', 'Приставки', '', '5ff409d3053e8__16098288195ff409d3053f8', 1, 31),
(133, 'PC uchun o\'yinlar', 'Игры для PC', '', '5ff409ded9785__16098288305ff409ded978f', 1, 31),
(134, 'Aksessuarlar', 'Аксессуары', '', '5ff409ea4ce67__16098288425ff409ea4ce6b', 1, 31),
(135, 'Pilesoslar', 'Пылесосы', '', '5ff421cb8303c__16098349555ff421cb83040', 1, 32),
(136, 'Dazmollar', 'Утюги', '', '5ff421d7133d5__16098349675ff421d7133df', 1, 32),
(137, 'Kir yuvish mashinalari', 'Стиральные машины', '', '5ff421e572857__16098349815ff421e572859', 1, 32),
(138, 'Tikuv mashinalari,overloklar', 'Швейные машины и оверлоки', '', '5ff421f6cfdc3__16098349985ff421f6cfdc7', 1, 32),
(139, 'To\'quv mashinalari', 'Вязальные машины', '', '5ff42204ba68e__16098350125ff42204ba691', 1, 32),
(140, 'Suv uchun filtrlar', 'Фильтры для воды', '', '5ff42210c5c8a__16098350245ff42210c5c8e', 1, 32),
(141, 'Uy uchun boshqa texnika', 'Прочая техника для дома', '', '5ff4221c15677__16098350365ff4221c1567c', 1, 32),
(142, 'Mikroto\'lqinli pechlar', 'Микроволновые печи', '', '5ff4233d609f3__16098353255ff4233d609f6', 1, 33),
(143, 'Muzlatgichlar', 'Холодильники', '', '5ff42346d3c24__16098353345ff42346d3c27', 1, 33),
(144, 'Plitalar-pechlar', 'Плиты / печи', '', '5ff4235da5438__16098353575ff4235da543e', 1, 33),
(145, 'Elektr choynaklari', 'Электрочайники', '', '5ff42370d51e7__16098353765ff42370d51eb', 1, 33),
(146, 'Kofedamlagichlar-kofemolkalar', 'Кофеварки / кофемолки', '', '5ff4237d8c9d1__16098353895ff4237d8c9d4', 1, 33),
(147, 'Oshxona kombaynlari-maydalagichlar', 'Кухонные комбайны и измельчители', '', '5ff4238b8d173__16098354035ff4238b8d177', 1, 33),
(148, 'Parovarkalar/multivarkalar', 'Пароварки, мультиварки', '', '5ff4239b115bf__16098354195ff4239b115ca', 1, 33),
(149, 'Non pechlari', 'Хлебопечки', '', '5ff423abcf2d3__16098354355ff423abcf2d7', 1, 33),
(150, 'Idish-tovoq yuvuvchi mashinalar', 'Посудомоечные машины', '', '5ff423b6df43d__16098354465ff423b6df440', 1, 33),
(151, 'Vityajkalar', 'Вытяжки', '', '5ff423c06b328__16098354565ff423c06b32c', 1, 33),
(152, 'Oshxona uchun boshqa texnika', 'Прочая техника для кухни', '', '5ff423cce9450__16098354685ff423cce9453', 1, 33),
(153, 'Iqlim uskunalari', 'Климатического оборудования', '', '5ff424244149f__16098355565ff42424414aa', 1, 34),
(154, 'Britvalar,epilyatorlar, soch olish mashinalari', 'Бритвы, эпиляторы, машинки для стрижки', '', '5ff49ece6c043__16098669585ff49ece6c045', 1, 35),
(155, 'Fenlar, soch turmaklash', 'Фены, укладка волос', '', '5ff49edc56e66__16098669725ff49edc56e69', 1, 35),
(156, 'Tarozilar', 'Весы', '', '5ff49ee74051f__16098669835ff49ee740523', 1, 35),
(157, 'Yakka parvarish uchun boshqa texnika', 'Прочая техника для индивидуального ухода', '', '5ff49ef73b317__16098669995ff49ef73b319', 1, 35),
(158, 'Maishiy texnika uchun aksessuarlar', 'Аксессуары для бытовой техники', '', '5ff49f48057a2__16098670805ff49f48057a5', 1, 36),
(159, 'Boshqa turdagi maishiy texnika savdosi', 'Продажа прочей бытовой техники', '', '5ff49f851b648__16098671415ff49f851b64a', 1, 37),
(160, 'O\'g\'il bolalar kiyimi', 'Одежда для мальчиков', '', '5ff49fee97437__16098672465ff49fee9743a', 7, 42),
(161, 'Qizlar uchun kiyim-kechak', 'Одежда для девочек', '', '5ff49ffe2d710__16098672625ff49ffe2d713', 7, 42),
(162, 'Chaqaloqlar kiyimi', 'Одежда для новорожденных', '', '5ff4a00cee9ba__16098672765ff4a00cee9bc', 7, 42),
(163, 'Qizchalar uchun poyafzal', 'Обувь для девочек', '', '5ff4a14921179__16098675935ff4a1492117d', 7, 43),
(164, 'O’g‘il bolalar uchun poyafzal', 'Обувь для мальчиков', '', '5ff4a161883c6__16098676175ff4a161883d1', 7, 43),
(165, 'Kichkintoylar uchun poyafzal', 'Обувь для малышей', '', '5ff4a1725a606__16098676345ff4a1725a60a', 7, 43),
(166, 'Bolalar aravachalari', 'Коляски детские', '', '5ff4a19665fd2__16098676705ff4a19665fdd', 7, 44),
(167, 'Avtokursilar savdosi', 'Продажа автокресел', '', '5ff4a1f87e361__16098677685ff4a1f87e364', 7, 45),
(168, 'Bolalar uchun mebel', 'Мебель для детей', '', '5ff4a274bde73__16098678925ff4a274bde78', 7, 46),
(169, 'Bolalar uchun o\'yinchoqlar', 'Игрушки для детей', '', '5ff4a29616ff0__16098679265ff4a29616ffb', 7, 47),
(170, 'Bolalar transporti', 'Детский транспорт', '', '5ff54e054612f__16099118135ff54e054613c', 7, 48),
(171, 'Bolalar oziqasi savdosi', 'Продажа детского питания', '', '5ff54e93836f7__16099119555ff54e9383702', 7, 49),
(172, 'O‘quvchilar uchun tovarlar', 'Товары для школьников', '', '5ff54ebab328d__16099119945ff54ebab3292', 7, 50),
(173, 'Bolalar uchun boshqa tovarlar', 'Прочие детские товары', '', '5ff54ed485e32__16099120205ff54ed485e3d', 7, 51),
(174, 'Yuz', 'Лицо', '', '5ff5586896885__16099144725ff5586896888', 8, 52),
(175, 'Dudoqlar', 'Губы', '', '5ff559b14b1fd__16099148015ff559b14b200', 8, 52),
(176, 'Pardoz to\'plamlari', 'Наборы для макияжа', '', '5ff559b18536d__16099148015ff559b185370', 8, 52),
(177, 'Pardoz uchun aksessuarlar', 'Аксессуары для макияжа', '', '5ff559b1a8c2d__16099148015ff559b1a8c30', 8, 52),
(178, 'Qoshlar', 'Брови', '', '5ff55addad1c1__16099151015ff55addad1c4', 8, 52),
(179, 'Niqoblar', 'Маски', '', '5ff573ca13e82__16099214825ff573ca13e8b', 8, 53),
(180, 'Tozalash va yuvish', 'Очищение и умывание', '', '5ff573d8c9afb__16099214965ff573d8c9b05', 8, 53),
(181, 'Yog\'lar', 'Масла', '', '5ff57425c117e__16099215735ff57425c1182', 8, 53),
(182, 'Kremlar', 'Кремы', '', '5ff5744ee5e1d__16099216145ff5744ee5e21', 8, 53),
(183, 'Tarash va soqolni tarash', 'Бритье и уход за бородой', '', '5ff574bcb217b__16099217245ff574bcb217f', 8, 54),
(184, 'Dush uchun gel', 'Гели для душа', '', '5ff574d0bb4d1__16099217445ff574d0bb4d5', 8, 54),
(185, 'Shampunlar va balzamlar', 'Шампуни и бальзамы', '', '5ff574dc2eb93__16099217565ff574dc2eb96', 8, 54),
(186, 'Tish cho\'tkalari', 'Зубные щетки', '', '5ff5752ab3506__16099218345ff5752ab350a', 8, 55),
(187, 'Irrigatorlar', 'Ирригаторы', '', '5ff575387038b__16099218485ff5753870397', 8, 55),
(188, 'Pastalar', 'Пасты', '', '5ff5754530004__16099218615ff5754530007', 8, 55),
(189, 'Og\'iz chayish uchun', 'Ополаскиватели для полости рта', '', '5ff575596cc0c__16099218815ff575596cc0f', 8, 55),
(190, 'Oqartirish', 'Отбеливание', '', '5ff5756481144__16099218925ff5756481148', 8, 55),
(191, 'Tatu', 'Тату', '', '5ff5758649582__16099219265ff575864958d', 8, 56),
(192, 'Sovunlar va dush uchun gellar', 'Мыло и гели для душа', '', '5ff57595dee5c__16099219415ff57595dee5f', 8, 56),
(193, 'Dezodorantlar', 'Дезодоранты', '', '5ff575a20cfcc__16099219545ff575a20cfcf', 8, 56),
(194, 'Epilasyon va depilatsiya', 'Эпиляция и депиляция', '', '5ff575b0a592e__16099219685ff575b0a5930', 8, 56),
(195, 'Quyoshdan himoya qilish', 'Загар и защита от солнца', '', '5ff575c57304d__16099219895ff575c573050', 8, 56),
(196, 'Kremlar', 'Кремы', '', '5ff575d05431d__16099220005ff575d054320', 8, 56),
(197, 'Vanna uchun', 'Для ванны', '', '5ff57608da45c__16099220565ff57608da460', 8, 56),
(198, 'Quruq massaj cho\'tkalari', 'Щетки для сухого массажа', '', '5ff5761dac888__16099220775ff5761dac88b', 8, 56),
(199, 'Ayollar atirlari', 'Женские ароматы', '', '5ff5763a76494__16099221065ff5763a76498', 8, 57),
(200, 'Erkaklar uchun atirlar', 'Мужские ароматы', '', '5ff57645dba9a__16099221175ff57645dbaa5', 8, 57),
(201, 'Parfyumeriya to\'plamlari', 'Парфюмерные наборы', '', '5ff5765165a54__16099221295ff5765165a57', 8, 57),
(202, 'Vitaminlar va xun takviyeleri', 'Витамины и БАДы', '', '5ff57691add90__16099221935ff57691add9c', 8, 58),
(203, 'Dezinfektsiya va antiseptiklar', 'Дезинфекция и антисептики', '', '5ff5769dbc98d__16099222055ff5769dbc990', 8, 58),
(204, 'Dori vositalari', 'Лекарственные препараты', '', '5ff576da9e7d9__16099222665ff576da9e7e4', 8, 58),
(205, 'Tibbiy asboblar', 'Медицинские изделия', '', '5ff577122b8e0__16099223225ff577122b8e3', 8, 58),
(206, 'Optika', 'Оптика', '', '5ff5771d5d888__16099223335ff5771d5d893', 8, 58),
(207, 'Perm', 'Завивка', '', '5ff5775eb41d4__16099223985ff5775eb41df', 8, 59),
(208, 'Sartaroshxona vositalari', 'Инструменты парикмахера', '', '5ff5776a59493__16099224105ff5776a5949d', 8, 59),
(209, 'Dori vositalari', 'Лечебные средства', '', '5ff5777763703__16099224235ff5777763707', 8, 59),
(210, 'Maskalar, yog\'lar va sarumlar', 'Маски, масла и сыворотки', '', '5ff57783ac8b8__16099224355ff57783ac8c3', 8, 59),
(211, 'Bo\'yash va perm', 'Окрашивание и химическая завивка', '', '5ff577916d05e__16099224495ff577916d063', 8, 59),
(212, 'Pariklar va sochlar', 'Парики и шиньоны', '', '5ff5779f7a923__16099224635ff5779f7a926', 8, 59),
(213, 'Styling mahsulotlari', 'Средства для укладки', '', '5ff577b3ca65d__16099224835ff577b3ca660', 8, 59),
(214, 'Shampunlar', 'Шампуни', '', '5ff577c8be0bf__16099225045ff577c8be0c6', 8, 59),
(215, 'Akril kukuni', 'Акриловая пудра', '', '5ff577e74ada0__16099225355ff577e74ada3', 8, 60),
(216, 'Asosiy va tepaliklar', 'Базы и топы', '', '5ff577faa80ea__16099225545ff577faa80ee', 8, 60),
(217, 'Gel-lak', 'Гель-лаки', '', '5ff57815069ba__16099225815ff57815069bd', 8, 60),
(218, 'Tirnoq dizayni', 'Дизайн ногтей', '', '5ff57821cbf93__16099225935ff57821cbf96', 8, 60),
(219, 'Asboblar', 'Инструменты', '', '5ff5782c41d08__16099226045ff5782c41d16', 8, 60),
(220, 'Laklar', 'Лаки', '', '5ff57833a76c1__16099226115ff57833a76c8', 8, 60),
(221, 'Dori vositalari', 'Лечебные средства', '', '5ff57840d8172__16099226245ff57840d8176', 8, 60),
(222, 'Lakni tozalash vositasi', 'Средства для снятия лака', '', '5ff5784bec38a__16099226355ff5784bec397', 8, 60),
(223, 'Hyundai', 'Hyundai', '', '5ff57875692bc__16099226775ff57875692c0', 9, 18),
(224, 'Lada', 'Lada', '', '5ff578857529d__16099226935ff57885752a1', 9, 18),
(225, 'UzAvto', 'UzAvto', '', '5ff57891c009c__16099227055ff57891c009f', 9, 18),
(226, 'UzAvto', 'UzAvto', '', '5ff578feda352__16099228145ff578feda355', 9, 22),
(227, 'Hyundai', 'Hyundai', '', '5ff5790535db2__16099228215ff5790535db5', 9, 22),
(228, 'Lada', 'Lada', '', '5ff5790b45fee__16099228275ff5790b45ff1', 9, 22),
(229, 'Avtomobillar uchun elektronika', 'Электроника для авто', '', '5ff579365cfa1__16099228705ff579365cfa4', 9, 23),
(230, 'Asboblar va parvarish', 'Инструменты и уход', '', '5ff57947d344c__16099228875ff57947d344f', 9, 23),
(231, 'Tashqi aksessuarlar', 'Внешние аксессуары', '', '5ff57958ac917__16099229045ff57958ac91a', 9, 23),
(232, 'Avto aksessuarlar', 'Авто аксессуары', '', '5ff5796ec391c__16099229265ff5796ec391f', 9, 23),
(233, 'Mototsikl qismlari', 'Мотозапчасти', '', '5ff5797feb3d8__16099229435ff5797feb3db', 9, 23),
(234, 'Ichki jihozlar', 'Аксессуары для салона', '', '5ff5798f57344__16099229595ff5798f57350', 9, 23),
(235, 'Sotish', 'Продажа', '', '5ff57b59cad42__16099234175ff57b59cad4b', 10, 19),
(236, 'Ayirboshlash', 'Обмен', '', '5ff57b65ce10f__16099234295ff57b65ce11a', 10, 19),
(237, 'Sotish', 'Продажа', '', '5ff57b755bea9__16099234455ff57b755beae', 10, 20),
(238, 'Ayirboshlash', 'Обмен', '', '5ff57b8218462__16099234585ff57b8218465', 10, 20),
(239, 'Ijara', 'Аренда', '', '5ff57be2ace83__16099235545ff57be2ace86', 10, 61),
(240, 'Ijara', 'Аренда', '', '5ff57be7c541b__16099235595ff57be7c541e', 10, 62),
(241, 'Sotish', 'Продажа', '', '5ff57bf16607a__16099235695ff57bf16607d', 10, 61),
(242, 'Sotish', 'Продажа', '', '5ff57bf553da2__16099235735ff57bf553da5', 10, 62),
(243, 'Kamarlar', 'Ремни', '', '5ff5c5600348f__16099423685ff5c56003493', 6, 25),
(244, 'Mehmonxona uchun mebel', 'Мебель для гостиной', '', '5ff682c245862__16099908505ff682c245864', 11, 63),
(245, 'Yotoqxona uchun mebel', 'Мебель для спальни', '', '5ff682ce41076__16099908625ff682ce41079', 11, 63),
(246, 'Dahliz uchun mebel', 'Мебель для прихожей', '', '5ff682d90e8d9__16099908735ff682d90e8dc', 11, 63),
(247, 'Oshxona mebeli', 'Кухонная мебель', '', '5ff682e429a99__16099908845ff682e429a9d', 11, 63),
(248, 'Vannaxona mebeli', 'Мебель для ванной комнаты', '', '5ff682ee35eec__16099908945ff682ee35ef7', 11, 63),
(249, 'Ofis mebeli', 'Офисная мебель', '', '5ff682f8172f4__16099909045ff682f8172f8', 11, 63),
(250, 'Pristavkalarni ta\'mirlash', 'Мебель на заказ', '', '5ff6830a78116__16099909225ff6830a78119', 11, 63),
(251, 'Bog‘ mebeli', 'Садовая мебель', '', '5ff683146949e__16099909325ff68314694a9', 11, 63),
(252, 'Maxsus mebel', 'Специализированная мебель', '', '5ff6831e18236__16099909425ff6831e1823a', 11, 63),
(253, 'O‘simliklar savdosi', 'Продажа растений', '', '5ff683447cbd2__16099909805ff683447cbd5', 11, 64),
(254, 'Chiroqlar', 'Светильники', '', '5ff6838c2dda2__16099910525ff6838c2dda5', 11, 65),
(255, 'Tekstil', 'Текстиль', '', '5ff6839637311__16099910625ff6839637319', 11, 65),
(256, 'Derazalar dekori', 'Декор окон', '', '5ff6839fd15cc__16099910715ff6839fd15cf', 11, 65),
(257, 'Boshqa interer buyumlar', 'Иные предметы интерьера', '', '5ff683f2c8f41__16099911545ff683f2c8f44', 11, 65),
(258, 'Santexnika', 'Сантехника', '', '5ff6e41eded63__16100157745ff6e41eded68', 13, 66),
(259, 'Ventilyatsiya', 'Вентиляция', '', '5ff6e423a619f__16100157795ff6e423a61a3', 13, 66),
(260, 'Isitish', 'Отопление', '', '5ff6e4297914b__16100157855ff6e4297914e', 13, 66),
(261, 'Elektrika', 'Электрика', '', '5ff6e42fbbfac__16100157915ff6e42fbbfaf', 13, 66),
(262, 'Arra materiallari', 'Пиломатериалы', '', '5ff6e45f02fa2__16100158395ff6e45f02fa5', 13, 66),
(263, 'Pardozlash materiallari', 'Отделочные и облицовочные материалы', '', '5ff6e461ca16d__16100158415ff6e461ca171', 13, 66),
(264, 'Derazalar-oynalar', 'Окна / двери / стеклo / зеркала', '', '5ff6e4a560a61__16100159095ff6e4a560a64', 13, 66),
(265, 'Lak-bo\'yoq materiallari', 'Лакокрасочные материалы', '', '5ff6e4a8b0e62__16100159125ff6e4a8b0e67', 13, 66),
(266, 'Metalloprokat-armatura', 'Металлопрокат / арматура', '', '5ff6e4ab4aebe__16100159155ff6e4ab4aec2', 13, 66),
(267, 'Biriktirish elementlari', 'Элементы крепежа', '', '5ff6e509a0067__16100160095ff6e509a006c', 13, 66),
(268, 'G\'isht, betoni, penobloklar', 'Кирпич / бетон / пеноблоки', '', '5ff6e5097fea8__16100160095ff6e5097feab', 13, 66),
(269, 'Boshqa qurilish materiallari', 'Прочие стройматериалы', '', '5ff6e4fa6b66e__16100159945ff6e4fa6b672', 13, 66),
(270, 'Qo\'l jihozlari', 'Ручной инструмент', '', '5ff686806712f__16099918085ff6868067139', 11, 67),
(271, 'Benzoinstrument', 'Бензоинструмент', '', '5ff6868c664e8__16099918205ff6868c664ef', 11, 67),
(272, 'Elektr jihozlar', 'Электроинструмент', '', '5ff68697189dd__16099918315ff68697189e0', 11, 67),
(273, 'Pnevmoinstrument', 'Пневмоинструмент', '', '5ff686a08af22__16099918405ff686a08af2c', 11, 67),
(274, 'Boshqa jihozlar', 'Прочий инструмент', '', '5ff686aa0091d__16099918505ff686aa00926', 11, 67),
(275, 'Xona gullari', 'Комнатные цветы', '', '5ff686c36be73__16099918755ff686c36be76', 11, 68),
(276, 'Oshxona idishlari', 'Посуда для кухни', '', '5ff686e4e1d73__16099919085ff686e4e1d7e', 11, 69),
(277, 'Bog‘dorchilik asboblari va buyumlari', 'Садовые инструменты и инвентарь', '', '5ff687024eacd__16099919385ff687024ead0', 11, 70),
(278, 'Xo‘jalik mollari', 'Хозяйственные товары', '', '5ff687226e39d__16099919705ff687226e3a1', 11, 71),
(279, 'Kanselyariya mollari savdosi', 'Продажа канцтоваров', '', '5ff68744f3716__16099920045ff68744f3721', 11, 72),
(280, 'Oziq-ovqat mahsulotlari / ichimliklar', 'Продукты Питания/Напитки', '', '5ff6875e03186__16099920305ff6875e03189', 11, 73),
(281, 'Uy uchun boshqa tovarlar', 'Прочие товары для дома', '', '5ff6877ce7bda__16099920605ff6877ce7bde', 11, 74);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_title`
--

CREATE TABLE `menu_title` (
  `id` int(11) NOT NULL,
  `name_uz` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `menu_title`
--

INSERT INTO `menu_title` (`id`, `name_uz`, `name_ru`, `name_en`, `link`, `menu_id`) VALUES
(15, 'Ayollar kiyimlari', 'Женская одежда', 'Women\'s clothes', '5fde43d2d43b8_1608401874', 5),
(16, 'Poyabzal', 'Обувь', '', '5fe1cb4952044_1608633161', 6),
(17, 'Kiyimlar', 'Одежда', '', '5fec7a670c0fa_1609333351', 6),
(18, 'Avtosalonlar', 'Автосалоны', '', '5ff191e52085a_1609667045', 9),
(19, 'Kvartiralar', 'Квартиры', '', '5ff191fed459f_1609667070', 10),
(20, 'Uy', 'Дом', '', '5ff1921278651_1609667090', 10),
(21, 'Yer', 'Земля', '', '5ff1921e7869e_1609667102', 10),
(22, 'Avtomobillar', 'Автомобили', '', '5ff192d758a03_1609667287', 9),
(23, 'Avto ehtiyot qismlar va aksessuarlar', 'Автозапчасти и аксессуары', '', '5ff192f85a5b4_1609667320', 9),
(24, 'Ustki kiyim', 'Верхняя одежда', '', '5ff3e2c9c199b_1609818825', 6),
(25, 'Aksessuarlar', 'Аксессуары', '', '5ff3e2ff332c3_1609818879', 6),
(26, 'Telefonlar', 'Телефоны', '', '5ff3e7745b56d_1609820020', 1),
(27, 'Kompyuterlar', 'Компьютеры', '', '5ff3ea5d2a658_1609820765', 1),
(28, 'Foto va video', 'Фото и видео', '', '5ff3ea7a0f666_1609820794', 1),
(29, 'Tv, videotexnika', 'Тв, видеотехника', '', '5ff3eaa82871a_1609820840', 1),
(30, 'Audiotexnika', 'Аудиотехника', '', '5ff3eac32f4ee_1609820867', 1),
(31, 'O\'yinlar va o\'yin konsollari', 'Игры и игровые приставки', '', '5ff3eafd1d04f_1609820925', 1),
(32, 'Maishiy texnika', 'Техника для дома', '', '5ff3eb2495233_1609820964', 1),
(33, 'Oshxona jihozlari', 'Техника для кухни', '', '5ff3eb34d584f_1609820980', 1),
(34, 'Iqlimiy uskunalar', 'Климатическое оборудование', '', '5ff3eb6eaf2ea_1609821038', 1),
(35, 'Yakka tartibdagi parvarish', 'Индивидуальный уход', '', '5ff3ec021572f_1609821186', 1),
(36, 'Aksessuarlar va komplekt jihozlar', 'Аксессуары и комплектующие', '', '5ff3f167d2b3d_1609822567', 1),
(37, 'Boshqa elektronika', 'Прочая электроника', '', '5ff3f174ce2f7_1609822580', 1),
(38, 'Ustki kiyim', 'ВЕРХНЯЯ ОДЕЖДА', '', '5ff3f1d907839_1609822681', 5),
(39, 'Poyabzal', 'Обувь', '', '5ff3f1ec40717_1609822700', 5),
(41, 'Aksessuarlar', 'Аксессуары', '', '5ff3f2a6ac544_1609822886', 5),
(42, 'Bolalar kiyimi', 'Детская одежда', '', '5ff3f8099be8b_1609824265', 7),
(43, 'Bolalar poyabzali', 'Детская обувь', '', '5ff3f81a0ee0f_1609824282', 7),
(44, 'Bolalar kolyaskasi', 'Детские коляски', '', '5ff3f82a9d7db_1609824298', 7),
(45, 'Bolalar avtokreslosi', 'Детские автокресла', '', '5ff3f8439fa92_1609824323', 7),
(46, 'Bolalar mebeli', 'Детская мебель', '', '5ff3f84f47c08_1609824335', 7),
(47, 'O\'yinchoqlar', 'Игрушки', '', '5ff3f85ec69fa_1609824350', 7),
(48, 'Bolalar transporti ', 'Детский транспорт', '', '5ff3f86da9a43_1609824365', 7),
(49, 'Oziqlantirish', 'Кормление', '', '5ff3f8929e309_1609824402', 7),
(50, 'Maktab o\'quvchilari uchun ', 'Товары для школьников', '', '5ff3f8a71e420_1609824423', 7),
(51, 'Boshqa bolalar mahsulotlari', 'Прочие детские товары', '', '5ff3f8b45a6ee_1609824436', 7),
(52, 'Pardoz', 'Макияж', '', '5ff5557f692a3_1609913727', 8),
(53, 'Yuzni parvarish qilish', 'Уход за лицом', '', '5ff5571b5eac0_1609914139', 8),
(54, 'Erkaklar uchun', 'Для мужчин', '', '5ff55732462d2_1609914162', 8),
(55, 'Og\'iz gigienasi', 'Гигиена полости рта', '', '5ff5575cbe13b_1609914204', 8),
(56, 'Tanani parvarish qilish', 'Уход за телом', '', '5ff5576720802_1609914215', 8),
(57, 'Parfyumeriya', 'Парфюмерия', '', '5ff55796e5f01_1609914262', 8),
(58, 'Sog\'liqni saqlash', 'Здоровье', '', '5ff557970af14_1609914263', 8),
(59, 'Sochni parvarish qilish', 'Уход за волосами', '', '5ff5579a19482_1609914266', 8),
(60, 'Manikyur va pedikyur', 'Маникюр и педикюр', '', '5ff557b0d18f6_1609914288', 8),
(61, 'Garajlar / avtoturargoh', 'Гаражи / стоянки', '', '5ff57bb470f9c_1609923508', 10),
(62, 'Tijorat binolari', 'Коммерческие помещения', '', '5ff57bc4d67c0_1609923524', 10),
(63, 'Mebel', 'Мебель', '', '5ff6819c8bfe1_1609990556', 11),
(64, 'Bog\'-tomorqa', 'Сад / огород', '', '5ff681a923b5d_1609990569', 11),
(65, 'Interyer jihozlari', 'Предметы интерьера', '', '5ff681b63c061_1609990582', 11),
(66, 'Qurilish/ta‘mirlash uchun tovarlar', 'Товары для строительства/ремонта', '', '5ff681c8092ae_1609990600', 13),
(67, 'Jihozlar', 'Инструменты', '', '5ff681ebbb8c3_1609990635', 11),
(68, 'Xona o\'simliklari', 'Комнатные растения', '', '5ff681f7c13a7_1609990647', 11),
(69, 'Idish-tovoq, oshxona anjomlari', 'Посуда / кухонная утварь', '', '5ff682038fd23_1609990659', 11),
(70, 'Bog\' anjomlari', 'Садовый инвентарь', '', '5ff6821e996c1_1609990686', 11),
(71, 'Xo\'jalik jihozlari, maishiy kimyo', 'Хозяйственный инвентарь / бытовая химия', '', '5ff682281929b_1609990696', 11),
(72, 'Kanstovarlar-chiqim materiallari', 'Канцтовары / расходные материалы', '', '5ff682325f913_1609990706', 11),
(73, 'Oziq-ovqat / Ichimliklar', 'Продукты питания / Напитки', '', '5ff6823bf126f_1609990715', 11),
(74, 'Uy uchun boshqa mahsulotlar', 'Прочие товары для дома', '', '5ff68244d4893_1609990724', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1607059346),
('m130524_201442_init', 1607059353),
('m140506_102106_rbac_init', 1607059785),
('m140622_111540_create_image_table', 1608718367),
('m140622_111545_add_name_to_image_table', 1608718367),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1607059785),
('m180523_151638_rbac_updates_indexes_without_prefix', 1607059786),
('m190124_110200_add_verification_token_column_to_user_table', 1607059354),
('m200409_110543_rbac_update_mssql_trigger', 1607059786);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `qty` double NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `created_at`, `updated_at`, `qty`, `sum`, `status`, `name`, `phone`, `address`) VALUES
(31, '2021-01-25 14:36:20', '2021-01-25 14:37:31', 6, 756000, '1', 'Sardor', '+998995903162', 'Samarqand');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `qty_item` double NOT NULL,
  `sum_item` float NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `price`, `qty_item`, `sum_item`, `date`, `user_id`) VALUES
(18, 14, 1, 'iPhone 12 Pro Max', 1200, 2, 2400, '2020-12-06 18:26:34', 0),
(19, 15, 1, 'iPhone 12 Pro Max', 1200, 4, 4800, '2020-12-07 13:36:46', 0),
(20, 16, 1, 'iPhone 12 Pro Max', 1200, 1, 1200, '2020-12-11 20:41:20', 1),
(21, 16, 2, 'Samsung S20', 999, 1, 999, '2020-12-11 20:41:20', 1),
(22, 17, 1, 'iPhone 12 Pro Max', 1200, 2, 2400, '2020-12-11 20:44:21', 1),
(23, 25, 1, 'iPhone 12 Pro Max', 1200, 1, 1200, '2020-12-11 20:58:12', 1),
(24, 25, 2, 'Samsung S20', 999, 1, 999, '2020-12-11 20:58:12', 2),
(25, 26, 46, 'Мужская кроссовки', 126000, 3, 378000, '2020-12-26 13:35:45', 1),
(26, 27, 24, 'Мужская кроссовки', 133000, 1, 133000, '2020-12-26 14:00:31', 1),
(27, 28, 35, 'Мужская ботинки', 122000, 1, 122000, '2020-12-26 16:10:01', 1),
(28, 29, 53, 'Свитер', 52000, 2, 104000, '2020-12-30 18:13:56', 1),
(29, 30, 40, 'Мужская кроссовки', 139000, 1, 139000, '2021-01-02 13:07:43', 1),
(30, 30, 53, 'Свитер', 52000, 1, 52000, '2021-01-02 13:07:43', 1),
(31, 31, 45, 'Мужская кроссовки', 126000, 6, 756000, '2021-01-25 14:36:20', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urls` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_id` int(11) NOT NULL,
  `menu` int(11) NOT NULL,
  `menu_title` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `content_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shop_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name_ru`, `photo`, `urls`, `menu_id`, `menu`, `menu_title`, `size`, `content_ru`, `link`, `sale`, `price`, `user_id`, `shop_id`) VALUES
(12, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1d7a48bbc85fe1d7a48bbc5.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1d7a48bbc5208479267590400', '', '130000', 1, 1),
(13, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1d898ed6655fe1d898ed661.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1d898ed661208479299212800', '', '130000', 1, 1),
(14, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1d8afa36b65fe1d8afa36b2.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1d8afa36b2208479302193600', '', '125000', 1, 1),
(15, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1d8c4459375fe1d8c445933.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1d8c445933208479304915200', '', '125000', 1, 1),
(16, 'Мужская обувь', '../../frontend/web/img/product/5fe1d93bcf6975fe1d93bcf692.jpg', NULL, 25, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская обувь', '5fe1d93bcf692208479320337600', '', '135000', 1, 1),
(17, 'Мужская обувь', '../../frontend/web/img/product/5fe1d9452f99f5fe1d9452f99c.jpg', NULL, 25, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская обувь', '5fe1d9452f99c208479321633600', '', '135000', 1, 1),
(18, 'Мужская обувь', '../../frontend/web/img/product/5fe1d96c0597b5fe1d96c05975.jpg', NULL, 25, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская обувь', '5fe1d96c05975208479326688000', '', '140000', 1, 1),
(19, 'Мужская обувь', '../../frontend/web/img/product/5fe1d9747a2375fe1d9747a232.jpg', NULL, 25, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская обувь', '5fe1d9747a232208479327724800', '', '140000', 1, 1),
(20, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1d9a6732805fe1d9a67327c.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1d9a67327c208479334204800', '', '126000', 1, 1),
(21, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1d9ba517395fe1d9ba51735.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1d9ba51735208479336796800', '', '126000', 1, 1),
(22, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1d9da926705fe1d9da9266c.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1d9da9266c208479340944000', '', '129000', 1, 1),
(23, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1d9e5948c75fe1d9e5948c4.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1d9e5948c4208479342369600', '', '129000', 1, 1),
(24, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1d9fb59d735fe1d9fb59d6f.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1d9fb59d6f208479345220800', '', '133000', 1, 1),
(25, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1da035b9105fe1da035b90c.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1da035b90c208479346257600', '', '133000', 1, 1),
(26, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1da3aadf2e5fe1da3aadf2a.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1da3aadf2a208479353385600', '', '128000', 1, 1),
(27, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1da42d37c35fe1da42d37bf.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1da42d37bf208479354422400', '', '128000', 1, 1),
(28, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1da858b2fa5fe1da858b2f6.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1da858b2f6208479363105600', '', '131000', 1, 1),
(29, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1da903f2815fe1da903f27e.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1da903f27e208479364531200', '', '131000', 1, 1),
(30, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1daa200a145fe1daa200a10.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1daa200a10208479366864000', '', '124000', 1, 1),
(31, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1daa9aba255fe1daa9aba20.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1daa9aba20208479367771200', '', '124000', 1, 1),
(32, 'Мужская ботинки', '../../frontend/web/img/product/5fe1db0e5081c5fe1db0e50818.jpg', NULL, 25, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская ботинки', '5fe1db0e50818208479380860800', '', '136000', 1, 1),
(33, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1db37e90635fe1db37e905f.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1db37e905f208479386174400', '', '133000', 1, 1),
(34, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1db50744ea5fe1db50744e6.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1db50744e6208479389414400', '', '123000', 1, 1),
(35, 'Мужская ботинки', '../../frontend/web/img/product/5fe1dbd4a2fb35fe1dbd4a2faf.jpg', NULL, 25, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская ботинки', '5fe1dbd4a2faf208479406521600', '', '122000', 1, 1),
(36, 'Мужская ботинки', '../../frontend/web/img/product/5fe1dbe2ece2b5fe1dbe2ece27.jpg', NULL, 25, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская ботинки', '5fe1dbe2ece27208479408336000', '', '122000', 1, 1),
(37, 'Мужская ботинки', '../../frontend/web/img/product/5fe1dbeab578c5fe1dbeab5789.jpg', NULL, 25, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская ботинки', '5fe1dbeab5789208479409372800', '', '122000', 1, 1),
(38, 'Мужская ботинки', '../../frontend/web/img/product/5fe1dbfbd66265fe1dbfbd6622.jpg', NULL, 25, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская ботинки', '5fe1dbfbd6622208479411576000', '', '129000', 1, 1),
(39, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1dc15146615fe1dc151465a.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1dc151465a208479414945600', '', '129000', 1, 1),
(40, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1dc24763725fe1dc247636e.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1dc247636e208479416889600', '', '139000', 1, 1),
(41, 'Мужская ботинки', '../../frontend/web/img/product/5fe1dc3ed1adf5fe1dc3ed1adc.jpg', NULL, 25, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская ботинки', '5fe1dc3ed1adc208479420259200', '', '136000', 1, 1),
(42, 'Мужская ботинки', '../../frontend/web/img/product/5fe1dc48805fb5fe1dc48805f7.jpg', NULL, 25, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская ботинки', '5fe1dc48805f7208479421555200', '', '136000', 1, 1),
(43, 'Мужская ботинки', '../../frontend/web/img/product/5fe1dc54647c65fe1dc54647c2.jpg', NULL, 25, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская ботинки', '5fe1dc54647c2208479423110400', '', '136000', 1, 1),
(44, 'Мужская ботинки', '../../frontend/web/img/product/5fe1dc5cede645fe1dc5cede60.jpg', NULL, 25, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская ботинки', '5fe1dc5cede60208479424147200', '', '136000', 1, 1),
(45, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1dc761571d5fe1dc761571a.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1dc761571a208479427516800', '', '126000', 1, 1),
(46, 'Мужская кроссовки', '../../frontend/web/img/product/5fe1dc7db50fc5fe1dc7db50f9.jpg', NULL, 24, 6, 16, '38, 39, 40, 41, 42, 43', 'Мужская кроссовки', '5fe1dc7db50f9208479428424000', '', '126000', 1, 1),
(53, 'Свитер', '../../frontend/web/img/product/5fec7bd1594abc81e728d9d4c2f636f067f89cc14862c.jpg', '../../frontend/web/img/product/5fec7bd1594abc4ca4238a0b923820dcc509a6f75849b.jpg**../../frontend/web/img/product/5fec7bd1594abc81e728d9d4c2f636f067f89cc14862c.jpg**', 26, 6, 17, 'XS, S, M, L, XL, XXL', 'Состав 100% хлопок двухниточный, граммаж 280 гр. Бренд Sacotto.', '5fec7bd1594a9208569649204800', '2', '52000', 1, 1),
(55, 'дом', '../../frontend/web/img/product/5ff706e5da44a78805a221a988e79ef3f42d7c5bfd418.jpg', '../../frontend/web/img/product/5ff706e5da44a3583a27aac9f5c5429e4b3f881018b56.jpg**../../frontend/web/img/product/5ff706e5da44ac5f32b2f19f61ef18565b2507a0fc9c8.jpg**../../frontend/web/img/product/5ff706e5da44ae7e17643bd5e750c8b94d5ffe6c542c9.jpg**../../frontend/web/img/product/5ff706e5da44a891f769af58056705606f291290bebed.jpg**../../frontend/web/img/product/5ff706e5da44a78805a221a988e79ef3f42d7c5bfd418.jpg**', 237, 10, 20, '', 'Готовый дом с евро ремонтом. 8 соток. Ориентир ресторан Зафар.', '5ff706e5da449208659198139200', '2', '55.000 $', 4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telegram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `shop`
--

INSERT INTO `shop` (`id`, `name`, `phone`, `map`, `address`, `telegram`, `email`, `user_id`) VALUES
(1, 'Alimaxshop', '+998339777701, +998333135757, +998337199998', '', '', '', '', 1),
(2, 'Alimax', '+998337199998', '', 'samarkand shaxar seliskiy 1 krug', '+998337199998', '', 4),
(3, 'Memo', '975778598', 'Samarqand', 'Samarqand', '', '', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `menu_title_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `menu_element_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `class` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`id`, `img`, `menu_id`, `menu_title_id`, `menu_element_id`, `class`) VALUES
(14, '../../frontend/web/img/slider/16085520205fe08e542c2c95fe08e542c1221608552020.jpg', '1', '1', '1', 'active'),
(15, '../../frontend/web/img/slider/16085520605fe08e7cf18e15fe08e7cf16061608552060.jpg', '1', '1', '2', 'active'),
(16, '../../frontend/web/img/slider/16086350505fe1d2aaada4e5fe1d2aaad4eb1608635050.jpg', '6', '16', '24', 'active'),
(17, '../../frontend/web/img/slider/16086350675fe1d2bb2e8375fe1d2bb2e68f1608635067.jpg', '6', '16', '24', ''),
(18, '../../frontend/web/img/slider/16086350835fe1d2cb08e835fe1d2cb08c851608635083.jpg', '6', '16', '24', ''),
(19, '../../frontend/web/img/slider/16093359375fec8481e6f895fec8481e6f321609335937.jpg', '6', '17', '26', 'active');

-- --------------------------------------------------------

--
-- Структура таблицы `slidercategory`
--

CREATE TABLE `slidercategory` (
  `id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `class` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `slidercategory`
--

INSERT INTO `slidercategory` (`id`, `img`, `menu_id`, `class`) VALUES
(1, '../../frontend/web/img/slider-category/16085513575fe08bbd102065fe08bbd1006d1608551357.jpg', 1, 'active'),
(2, '../../frontend/web/img/slider-category/16085513695fe08bc9a59015fe08bc9a57661608551369.jpg', 1, ''),
(3, '../../frontend/web/img/slider-category/16085514115fe08bf38194b5fe08bf3816fb1608551411.jpg', 1, ''),
(4, '../../frontend/web/img/slider-category/16093357315fec83b353ada5fec83b353a881609335731.jpg', 6, 'active'),
(5, '../../frontend/web/img/slider-category/16093357585fec83cea8a135fec83cea89bd1609335758.jpg', 6, ''),
(6, '../../frontend/web/img/slider-category/16093357865fec83ea4c8075fec83ea4c7811609335786.jpg', 6, ''),
(7, '../../frontend/web/img/slider-category/16093358065fec83fe389565fec83fe388ea1609335806.jpg', 6, '');

-- --------------------------------------------------------

--
-- Структура таблицы `sliderindex`
--

CREATE TABLE `sliderindex` (
  `id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sliderindex`
--

INSERT INTO `sliderindex` (`id`, `img`, `class`) VALUES
(1, '../../frontend/web/img/slider-index/16085509185fe08a06a5b385fe08a06a59341608550918.jpg', 'active'),
(2, '../../frontend/web/img/slider-index/16085511055fe08ac157dd75fe08ac157c321608551105.jpg', ''),
(3, '../../frontend/web/img/slider-index/16085511235fe08ad322a9d5fe08ad3228341608551123.jpg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `slidersubcategory`
--

CREATE TABLE `slidersubcategory` (
  `id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `menu_title_id` int(11) NOT NULL,
  `class` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `slidersubcategory`
--

INSERT INTO `slidersubcategory` (`id`, `img`, `menu_id`, `menu_title_id`, `class`) VALUES
(1, '../../frontend/web/img/slider-sub-category/16085519515fe08e0fb21435fe08e0fb1fab1608551951.jpg', 1, 1, 'active'),
(2, '../../frontend/web/img/slider-sub-category/16085519685fe08e207e70f5fe08e207e56e1608551968.jpg', 1, 1, ''),
(3, '../../frontend/web/img/slider-sub-category/16085519915fe08e3713cf25fe08e3713b521608551991.jpg', 1, 5, 'active'),
(4, '../../frontend/web/img/slider-sub-category/16086349735fe1d25d8ed395fe1d25d8eae81608634973.jpg', 6, 16, 'active'),
(5, '../../frontend/web/img/slider-sub-category/16086349865fe1d26a96a055fe1d26a968731608634986.jpg', 6, 16, ''),
(6, '../../frontend/web/img/slider-sub-category/16086350045fe1d27c4f27c5fe1d27c4f0eb1608635004.jpg', 6, 16, ''),
(7, '../../frontend/web/img/slider-sub-category/16086350195fe1d28bd5b9a5fe1d28bd59c11608635019.jpg', 6, 16, ''),
(8, '../../frontend/web/img/slider-sub-category/16093358395fec841fa7e455fec841fa7df41609335839.jpg', 6, 17, 'active'),
(9, '../../frontend/web/img/slider-sub-category/16093358705fec843e5f8155fec843e5f7c61609335870.jpg', 6, 17, ''),
(10, '../../frontend/web/img/slider-sub-category/16093359045fec8460a552a5fec8460a54d71609335904.jpg', 6, 17, '');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `last_name`, `phone`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'admin', 'Admin', 'Admin', '', 'sCcQr1IwGeucJyrMSpUaI5AWhPAkfb_s', '$2y$13$drkbEprlCLigtMv14h.6zuFD3LqDFTnDji1wgmSlseg6pm/CeBhey', NULL, 'abbos_karvonov1995@icloud.com', 9, 1607059965, 1607059965, 'a05deFdN3Ns8zxdWX7wg7U_QzaF8iiNZ_1607059965'),
(3, 'abbos', 'Abbos', 'Karvonov', '331109595', '6AH343ddSN43cYmhWPWQkXWHbon8LvUQ', '$2y$13$/KvlWr4xoth04qIP8jeac.ryNXJLhu.1f5MB7W2eOEoixWDbvXOUm', NULL, 'abboskarvonov95@gmail.com', 9, 1609738283, 1609738283, 'HvR0nWD_bq-W6sn90j2vn5leT-NevqJb_1609738283'),
(4, 'Alimax', 'Fedya', 'Salohiddinov', '+998337199998', 'chdAZ5rqZMO65cILBs4XylJQjKn0YoOS', '$2y$13$5/TbobxIrUweEWYntM7dRu3B37J0XxK44aAGdcwVksf96EOddY86C', NULL, 'sanattillo.ganiyev.90@bk.ru', 9, 1610023173, 1610023173, 'h0XslOyj17gYi_yPfVqSzofL2_Yil_UW_1610023173'),
(5, 'Sanat', 'Sanat', 'G', '975788598', 'U588rWz1b50aR_576krX8j5KNCddmb0n', '$2y$13$0UgzKRqMnHqme3HfmCnYVeiE.Yz2Xn4R1FXhV/74KCoAeybOu3ghK', NULL, 'SANATILLO.GANIYEV.90@BK.RU', 9, 1610026186, 1610026186, 'c80-c-Vc5o__PjQtu29m6gsuqpB59Fuu_1610026186'),
(6, 'user', 'Rashid', 'Tolibov', '+998995903162', '1trtzeDm8MsTiPxpisoYpX1gtC9EIJMK', '$2y$13$WSfGGNWrJN6fdop4ALBwU.W4k3BxKKHRMIA.jVtsWkn9/PvpMuA1C', NULL, 'abbos_karvonov95@icloud.com', 9, 1611744051, 1611744051, 'XmMXSc2oJ-xrFKcqEiOGYPPE7RAdobU5_1611744051'),
(7, 'khalilov', 'Azim', 'Abduxalilov', '+998997775443', 'M5S6pi2S5QI4-2uNRLYov3HYnT0a0oxp', '$2y$13$Nl6rEAOMlTOZt/FFZ7zNUecISZU6vx.c/QQyJvQTTsTC.EykPkBHm', NULL, 'khalilovdev@gmail.com', 9, 1629197649, 1629197649, 'wGNUu3oYq8iKqB2b7KZ0hl8WWqeBhuNm_1629197649');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_element`
--
ALTER TABLE `menu_element`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_title_id` (`menu_title_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Индексы таблицы `menu_title`
--
ALTER TABLE `menu_title`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `menu` (`menu`),
  ADD KEY `menu_title` (`menu_title`);

--
-- Индексы таблицы `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slidercategory`
--
ALTER TABLE `slidercategory`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sliderindex`
--
ALTER TABLE `sliderindex`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `slidersubcategory`
--
ALTER TABLE `slidersubcategory`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `menu_element`
--
ALTER TABLE `menu_element`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=282;

--
-- AUTO_INCREMENT для таблицы `menu_title`
--
ALTER TABLE `menu_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `slidercategory`
--
ALTER TABLE `slidercategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `sliderindex`
--
ALTER TABLE `sliderindex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `slidersubcategory`
--
ALTER TABLE `slidersubcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `menu_element`
--
ALTER TABLE `menu_element`
  ADD CONSTRAINT `menu_element_ibfk_1` FOREIGN KEY (`menu_title_id`) REFERENCES `menu_title` (`id`);

--
-- Ограничения внешнего ключа таблицы `menu_title`
--
ALTER TABLE `menu_title`
  ADD CONSTRAINT `menu_title_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`menu_id`) REFERENCES `menu_element` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
