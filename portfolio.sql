-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2017 at 03:43 PM
-- Server version: 5.5.55-0ubuntu0.14.04.1
-- PHP Version: 7.0.20-2~ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `image`, `author_id`, `page_id`, `status`, `created_at`, `updated_at`) VALUES
(22, 'Test Article 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.jkjkjk', '58f3e121436cdFotografija0629.jpg', 1, 29, 1, '2017-03-07 18:42:31', '2017-03-15 16:20:58'),
(23, 'Test Article 2', '&lt;span&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&lt;/span&gt;', '58f3e1170569fFotografija0621.jpg', 1, 29, 2, '2017-03-07 18:42:47', '2017-03-07 18:42:47'),
(24, 'Test Article 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '58f3e12fa933aFotografija0639.jpg', 1, 29, 1, '2017-03-07 18:43:01', '2017-03-15 16:07:28'),
(25, 'Test Article 4', '&amp;lt;script&amp;gt;alert(#hello);&amp;lt;/script&amp;gt;&lt;br&gt;&amp;lt;&amp;gt;uyu#y&amp;lt;hghk&amp;gt;&amp;lt;/thyty&amp;gt;#tytytLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '58f3e10c0d184Fotografija0604.jpg', 1, 29, 1, '2017-03-07 18:43:13', '2017-04-28 15:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `authority` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `licence_number` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `certif_url` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `certif_month` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `certif_year` smallint(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `name`, `authority`, `licence_number`, `certif_url`, `certif_month`, `certif_year`, `status`, `created_at`, `updated_at`) VALUES
(19, 'Sertifikat 3', 'Test 3', '5546yt', 'http://test3.com', 'March', 2015, 1, '2017-03-07 18:59:46', '2017-03-07 18:59:46'),
(16, 'Sertifikat 2', 'Test 2', '5546yttyt6575767', 'http://testtest.com', 'March', 2010, 1, '2017-03-07 18:54:33', '2017-03-07 22:49:26'),
(17, 'Sertifikat 4', 'Test 4', '5546y', '', 'April', 2013, 0, '2017-03-07 18:58:34', '2017-03-15 16:05:51'),
(18, 'Sertifikat 5', 'Test 5', '', '', 'April', 2008, 2, '2017-03-07 18:58:57', '2017-03-07 18:58:57'),
(15, 'Sertifikat 1', 'Test 1', '5546yttyt6575767', 'http://test.com', 'January', 2017, 0, '2017-03-07 18:53:48', '2017-03-07 18:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `content`, `article_id`, `status`, `created_at`, `updated_at`) VALUES
(15, 'test1', 'test@test.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 22, 1, '2017-05-02 16:03:10', '2017-05-02 16:03:10'),
(16, 'test2', 'test2@test.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 22, 2, '2017-05-02 16:03:24', '2017-05-02 16:03:24'),
(17, 'test3', 't@t.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 22, 2, '2017-05-02 16:03:35', '2017-05-02 16:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Unique record ID. NOT IDENTITY AUTO INCREMENT',
  `country_code` varchar(2) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ISO 3166-2.  2 character country code',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ISO 3166.  Long country description',
  `country_sr` varchar(65) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country`, `country_sr`) VALUES
(1, 'AD', 'ANDORRA', 'Andora '),
(2, 'AE', 'UNITED ARAB EMIRATES', 'Ujedinjeni Arapski Emirati'),
(3, 'AF', 'AFGHANISTAN', 'Avganistan'),
(4, 'AG', 'ANTIGUA AND BARBUDA', 'Antigva i Barbuda'),
(5, 'AI', 'ANGUILLA', 'Angvila'),
(6, 'AL', 'ALBANIA', 'Albanija'),
(7, 'AM', 'ARMENIA', 'Jermenija'),
(8, 'AN', 'NETHERLANDS ANTILLES', 'Holandski Antili'),
(9, 'AO', 'ANGOLA', 'Angola'),
(10, 'AQ', 'ANTARCTICA', 'Antarktik'),
(11, 'AR', 'ARGENTINA', 'Argentina'),
(12, 'AS', 'AMERICAN SAMOA', 'AmeriÄka Samoa'),
(13, 'AT', 'AUSTRIA', 'Austrija'),
(14, 'AU', 'AUSTRALIA', 'Australija'),
(15, 'AW', 'ARUBA', 'Aruba'),
(16, 'AX', 'ALAND ISLANDS', 'Olandska Ostrva'),
(17, 'AZ', 'AZERBAIJAN', 'AzerbejdÅ¾an'),
(18, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosna i Hercegovina'),
(19, 'BB', 'BARBADOS', 'Barbados'),
(20, 'BD', 'BANGLADESH', 'BangladeÅ¡'),
(21, 'BE', 'BELGIUM', 'Belgija'),
(22, 'BF', 'BURKINA FASO', 'Burkina Faso'),
(23, 'BG', 'BULGARIA', 'Bugarska'),
(24, 'BH', 'BAHRAIN', 'Bahrein'),
(25, 'BI', 'BURUNDI', 'Burundi'),
(26, 'BJ', 'BENIN', 'Benin'),
(27, 'BM', 'BERMUDA', 'Bermuda'),
(28, 'BN', 'BRUNEI DARUSSALAM', 'Brunej'),
(29, 'BO', 'BOLIVIA, PLURINATIONAL STATE OF', 'Bolivija'),
(30, 'BR', 'BRAZIL', 'Brazil'),
(31, 'BS', 'BAHAMAS', 'Bahami'),
(32, 'BT', 'BHUTAN', 'Butan'),
(33, 'BV', 'BOUVET ISLAND', 'Ostrvo Buve'),
(34, 'BW', 'BOTSWANA', 'Bocvana'),
(35, 'BY', 'BELARUS', 'Belorusija'),
(36, 'BZ', 'BELIZE', 'Belize'),
(37, 'CA', 'CANADA', 'Kanada'),
(38, 'CC', 'COCOS (KEELING) ISLANDS', 'Kokosova(Kiling) Ostrva'),
(39, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Demokratska Republika Kongo'),
(40, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Centralna AfriÄka Republika'),
(41, 'CG', 'CONGO', 'Kongo'),
(42, 'CH', 'SWITZERLAND', 'Å vajcarska'),
(43, 'CI', 'COTE D\'IVOIRE', 'Obala SlonovaÄe'),
(44, 'CK', 'COOK ISLANDS', 'Kukova Ostrva'),
(45, 'CL', 'CHILE', 'ÄŒile'),
(46, 'CM', 'CAMEROON', 'Kamerun'),
(47, 'CN', 'CHINA', 'Kina'),
(48, 'CO', 'COLOMBIA', 'Kolumbija'),
(49, 'CR', 'COSTA RICA', 'Kostarika'),
(50, 'CU', 'CUBA', 'Kuba'),
(51, 'CV', 'CAPE VERDE', 'Zelenortska Republika'),
(52, 'CX', 'CHRISTMAS ISLAND', 'BoÅ¾iÄ‡no Ostrvo'),
(53, 'CY', 'CYPRUS', 'Kipar'),
(54, 'CZ', 'CZECH REPUBLIC', 'ÄŒeÅ¡ka Republika'),
(55, 'DE', 'GERMANY', 'NemaÄka'),
(56, 'DJ', 'DJIBOUTI', 'DÅ¾ibuti'),
(57, 'DK', 'DENMARK', 'Danska'),
(58, 'DM', 'DOMINICA', 'Dominika'),
(59, 'DO', 'DOMINICAN REPUBLIC', 'Dominikanska Republika'),
(60, 'DZ', 'ALGERIA', 'AlÅ¾ir'),
(61, 'EC', 'ECUADOR', 'Ekvador'),
(62, 'EE', 'ESTONIA', 'Estonija'),
(63, 'EG', 'EGYPT', 'Egipat'),
(64, 'EH', 'WESTERN SAHARA', 'Zapadna Sahara'),
(65, 'ER', 'ERITREA', 'Eritreja'),
(66, 'ES', 'SPAIN', 'Å panija'),
(67, 'ET', 'ETHIOPIA', 'Etiopija'),
(68, 'FI', 'FINLAND', 'Finska'),
(69, 'FJ', 'FIJI', 'FidÅ¾i'),
(70, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Faklanska Ostrva (Malvinas)'),
(71, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Savez DrÅ¾ave Mikronezije'),
(72, 'FO', 'FAROE ISLANDS', 'Farska Ostrva'),
(73, 'FR', 'FRANCE', 'Francuska'),
(74, 'GA', 'GABON', 'Gabon'),
(75, 'GD', 'GRENADA', 'Geranda'),
(76, 'GE', 'GEORGIA', 'DÅ¾ordÅ¾ija'),
(77, 'GF', 'FRENCH GUIANA', 'Francuska Gvajana'),
(78, 'GG', 'GUERNSEY', 'Gernezi'),
(79, 'GH', 'GHANA', 'Gana'),
(80, 'GI', 'GIBRALTAR', 'Gibraltar'),
(81, 'GL', 'GREENLAND', 'Grenlanad'),
(82, 'GM', 'GAMBIA', 'Gambija'),
(83, 'GN', 'GUINEA', 'Gvineja'),
(84, 'GP', 'GUADELOUPE', 'Gvadalupe'),
(85, 'GQ', 'EQUATORIAL GUINEA', 'Ekvatorijalna Gvineja'),
(86, 'GR', 'GREECE', 'GrÄka'),
(87, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'Severna DÅ¾ordÅ¾ija i JuÅ¾na SendviÄ Ostrva'),
(88, 'GT', 'GUATEMALA', 'Gvatemala'),
(89, 'GU', 'GUAM', 'Guam'),
(90, 'GW', 'GUINEA-BISSAU', 'Gvineja Bisau'),
(91, 'GY', 'GUYANA', 'Gujana'),
(92, 'HK', 'HONG KONG', 'Hong Kong'),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Ostrvo Herd i Mekdonaldova Ostrva'),
(94, 'HN', 'HONDURAS', 'Honduras'),
(95, 'HR', 'CROATIA', 'Hrvatska'),
(96, 'HT', 'HAITI', 'Haiti'),
(97, 'HU', 'HUNGARY', 'MaÄ‘arska'),
(98, 'ID', 'INDONESIA', 'Indonezija'),
(99, 'IE', 'IRELAND', 'Irska'),
(100, 'IL', 'ISRAEL', 'Izrael'),
(101, 'IM', 'ISLE OF MAN', 'Ostrvo Men'),
(102, 'IN', 'INDIA', 'Indija'),
(103, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'Britanska Indijskookeanska Teritorija'),
(104, 'IQ', 'IRAQ', 'Irak'),
(105, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamska Republika'),
(106, 'IS', 'ICELAND', 'Island'),
(107, 'IT', 'ITALY', 'Italija'),
(108, 'JE', 'JERSEY', 'DÅ¾ersi'),
(109, 'JM', 'JAMAICA', 'Jamajka'),
(110, 'JO', 'JORDAN', 'Jordan'),
(111, 'JP', 'JAPAN', 'Japan'),
(112, 'KE', 'KENYA', 'Kenija'),
(113, 'KG', 'KYRGYZSTAN', 'Kirgistan'),
(114, 'KH', 'CAMBODIA', 'KambodÅ¾a'),
(115, 'KI', 'KIRIBATI', 'Kiribati'),
(116, 'KM', 'COMOROS', 'Komori'),
(117, 'KN', 'SAINT KITTS AND NEVIS', 'Sveti Kristofor i Nevis'),
(118, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Demokratska Republika Koreja'),
(119, 'KR', 'KOREA, REPUBLIC OF', 'Republika Koreja'),
(120, 'KW', 'KUWAIT', 'Kuvajt'),
(121, 'KY', 'CAYMAN ISLANDS', 'Kajmanska Ostrva'),
(122, 'KZ', 'KAZAKHSTAN', 'Kazahstan'),
(123, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Laoska Narodna Demokratska Republika'),
(124, 'LB', 'LEBANON', 'Lebanon'),
(125, 'LC', 'SAINT LUCIA', 'Sveta Lucija'),
(126, 'LI', 'LIECHTENSTEIN', 'LihenÅ¡tajn'),
(127, 'LK', 'SRI LANKA', 'Å ri Lanka'),
(128, 'LR', 'LIBERIA', 'Liberija'),
(129, 'LS', 'LESOTHO', 'Lesoto'),
(130, 'LT', 'LITHUANIA', 'Litvanija'),
(131, 'LU', 'LUXEMBOURG', 'Luksemburg'),
(132, 'LV', 'LATVIA', 'Latvija'),
(133, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libija'),
(134, 'MA', 'MOROCCO', 'Maroko'),
(135, 'MC', 'MONACO', 'Monako'),
(136, 'MD', 'MOLDOVA, REPUBLIC OF', 'Republika Moldavija'),
(137, 'ME', 'MONTENEGRO', 'Crna Gora'),
(138, 'MF', 'SAINT MARTIN', 'Sveti Martin'),
(139, 'MG', 'MADAGASCAR', 'Madagaskar'),
(140, 'MH', 'MARSHALL ISLANDS', 'MarÅ¡alska Ostrva'),
(141, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Republika Makedonija'),
(142, 'ML', 'MALI', 'Mali'),
(143, 'MM', 'MYANMAR', 'Mjanmar'),
(144, 'MN', 'MONGOLIA', 'Mongolija'),
(145, 'MO', 'MACAO', 'Makao'),
(146, 'MP', 'NORTHERN MARIANA ISLANDS', 'Severna Marianska ostrva'),
(147, 'MQ', 'MARTINIQUE', 'Martinik'),
(148, 'MR', 'MAURITANIA', 'Mauritanija'),
(149, 'MS', 'MONTSERRAT', 'Montserat'),
(150, 'MT', 'MALTA', 'Malta'),
(151, 'MU', 'MAURITIUS', 'Mauricijus'),
(152, 'MV', 'MALDIVES', 'Maldivi'),
(153, 'MW', 'MALAWI', 'Malavi'),
(154, 'MX', 'MEXICO', 'Meksiko'),
(155, 'MY', 'MALAYSIA', 'Malezija'),
(156, 'MZ', 'MOZAMBIQUE', 'Mozambik'),
(157, 'NA', 'NAMIBIA', 'Nambija'),
(158, 'NC', 'NEW CALEDONIA', 'Nova Kaledonija'),
(159, 'NE', 'NIGER', 'Niger'),
(160, 'NF', 'NORFOLK ISLAND', 'Norfolk Ostrvo'),
(161, 'NG', 'NIGERIA', 'Nigerija'),
(162, 'NI', 'NICARAGUA', 'Nikaragva'),
(163, 'NL', 'NETHERLANDS', 'Holandija'),
(164, 'NO', 'NORWAY', 'NorveÅ¡ka'),
(165, 'NP', 'NEPAL', 'Nepal'),
(166, 'NR', 'NAURU', 'Nauru'),
(167, 'NU', 'NIUE', 'Niue'),
(168, 'NZ', 'NEW ZEALAND', 'Novi Zeland'),
(169, 'OM', 'OMAN', 'Oman'),
(170, 'PA', 'PANAMA', 'Panama'),
(171, 'PE', 'PERU', 'Peru'),
(172, 'PF', 'FRENCH POLYNESIA', 'Francuska Polinezija'),
(173, 'PG', 'PAPUA NEW GUINEA', 'Papua Nova Gvineja'),
(174, 'PH', 'PHILIPPINES', 'Filipini'),
(175, 'PK', 'PAKISTAN', 'Pakistan'),
(176, 'PL', 'POLAND', 'Poljska'),
(177, 'PM', 'SAINT PIERRE AND MIQUELON', 'Sen Pjer i Mikelon'),
(178, 'PN', 'PITCAIRN', 'Pitkern'),
(179, 'PR', 'PUERTO RICO', 'Porto Riko'),
(180, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Okupirana Palestinska Teritorija'),
(181, 'PT', 'PORTUGAL', 'Portugal'),
(182, 'PW', 'PALAU', 'Palau'),
(183, 'PY', 'PARAGUAY', 'Paragvaj'),
(184, 'QA', 'QATAR', 'Katar'),
(185, 'RE', 'REUNION', 'Reunion'),
(186, 'RO', 'ROMANIA', 'Rumunija'),
(187, 'RS', 'SERBIA', 'Srbija'),
(188, 'RU', 'RUSSIAN FEDERATION', 'Ruska Federacija'),
(189, 'RW', 'RWANDA', 'Ruanda'),
(190, 'SA', 'SAUDI ARABIA', 'Suadijska Arabija'),
(191, 'SB', 'SOLOMON ISLANDS', 'Solomonska Ostrva'),
(192, 'SC', 'SEYCHELLES', 'SejÅ¡eli'),
(193, 'SD', 'SUDAN', 'Sudan'),
(194, 'SE', 'SWEDEN', 'Å vedska'),
(195, 'SG', 'SINGAPORE', 'Singapur'),
(196, 'SH', 'SAINT HELENA, ASCENSION AND TRISTAN DA CUNHA', 'Sveta Helena, Asension i Tristan da Kunja'),
(197, 'SI', 'SLOVENIA', 'Slovenija'),
(198, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard i Jan Majen'),
(199, 'SK', 'SLOVAKIA', 'SlovaÄka'),
(200, 'SL', 'SIERRA LEONE', 'Sijera Leone'),
(201, 'SM', 'SAN MARINO', 'San Marino'),
(202, 'SN', 'SENEGAL', 'Senegal'),
(203, 'SO', 'SOMALIA', 'Somalija'),
(204, 'SR', 'SURINAME', 'Surinam'),
(205, 'SS', 'SOUTH SUDAN', 'JuÅ¾ni Sudan'),
(206, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome i Principe'),
(207, 'SV', 'EL SALVADOR', 'El Salvador'),
(208, 'SY', 'SYRIAN ARAB REPUBLIC', 'Sirija'),
(209, 'SZ', 'SWAZILAND', 'Svazilend'),
(210, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks i Kajkos'),
(211, 'TD', 'CHAD', 'ÄŒad'),
(212, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'Francuske JuÅ¾ne Teritorije'),
(213, 'TG', 'TOGO', 'Togo'),
(214, 'TH', 'THAILAND', 'Tajland'),
(215, 'TJ', 'TAJIKISTAN', 'TadÅ¾ikistan'),
(216, 'TK', 'TOKELAU', 'Tokelau'),
(217, 'TL', 'TIMOR-LESTE', 'IstoÄni Timor'),
(218, 'TM', 'TURKMENISTAN', 'Turkmenistan'),
(219, 'TN', 'TUNISIA', 'Tunis'),
(220, 'TO', 'TONGA', 'Tonga'),
(221, 'TR', 'TURKEY', 'Turska'),
(222, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad i Tobago'),
(223, 'TV', 'TUVALU', 'Tuvalu'),
(224, 'TW', 'TAIWAN', 'Tajvan'),
(225, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzanija'),
(226, 'UA', 'UKRAINE', 'Ukrajina'),
(227, 'UG', 'UGANDA', 'Uganda'),
(228, 'UK', 'UNITED KINGDOM', 'Ujedinjeno Kraljevstvo'),
(229, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'Mala Ujedinjena Ostrva SAD-a'),
(230, 'US', 'UNITED STATES', 'Sjedinjene AmeriÄke DrÅ¾ave'),
(231, 'UY', 'URUGUAY', 'Urugvaj'),
(232, 'UZ', 'UZBEKISTAN', 'Uzbekistan'),
(233, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Vatikan'),
(234, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Sveti Vincent i Grenadini'),
(235, 'VE', 'VENEZUELA, BOLIVARIAN REPUBLIC OF', 'Venecuela, Bolivarijanska Republika'),
(236, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Britanska DeviÄanska Ostrva'),
(237, 'VI', 'VIRGIN ISLANDS, U.S.', 'AmeriÄka DeviÄanska Ostrva'),
(238, 'VN', 'VIET NAM', 'Vijetnam'),
(239, 'VU', 'VANUATU', 'Vanuatu'),
(240, 'WF', 'WALLIS AND FUTUNA', 'Valis i Futuna'),
(241, 'WS', 'SAMOA', 'Samoa'),
(242, 'YE', 'YEMEN', 'Jemen'),
(243, 'YT', 'MAYOTTE', 'Majot'),
(244, 'ZA', 'SOUTH AFRICA', 'JuÅ¾noafriÄka Republika'),
(245, 'ZM', 'ZAMBIA', 'Zambija'),
(246, 'ZW', 'ZIMBABWE', 'Zimbabve');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(10) UNSIGNED NOT NULL,
  `school` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `year_from` smallint(4) NOT NULL,
  `year_to` smallint(4) NOT NULL,
  `degree` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `field_of_study` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `school`, `year_from`, `year_to`, `degree`, `field_of_study`, `description`, `status`, `created_at`, `updated_at`) VALUES
(12, 'School 2', 2000, 2002, 'Test 2', 'Test 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2017-03-07 19:48:51', '2017-03-07 19:48:51'),
(11, 'School 1', 2002, 2006, 'Test 1', 'Test 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2017-03-07 19:48:24', '2017-03-07 19:48:24'),
(13, 'School 3', 2009, 2014, 'Test 3', 'Test 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2017-03-07 19:49:16', '2017-03-07 19:49:16'),
(14, 'School 4', 2002, 2005, 'Test 4', 'Test 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2017-03-07 19:49:43', '2017-03-07 19:49:43'),
(15, 'School 5', 2006, 1970, 'Test 5', 'Test 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2017-03-07 19:50:09', '2017-03-07 21:56:16');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `month_from` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `month_to` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `year_from` smallint(4) NOT NULL,
  `year_to` smallint(4) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `title`, `company`, `city`, `country_id`, `month_from`, `month_to`, `year_from`, `year_to`, `description`, `status`, `created_at`, `updated_at`) VALUES
(15, 'Experience 3', 'Company 3', 'Belgrade', 187, 'December', 'November', 2004, 2006, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2017-03-07 19:54:35', '2017-03-07 19:54:35'),
(14, 'Experience 2', 'Company 2', 'Belgrade', 173, 'September', 'September', 2006, 2012, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2017-03-07 19:53:51', '2017-03-15 16:17:23'),
(13, 'Experience 1', 'Company 1', 'Belgrade', 187, 'January', 'November', 2001, 2002, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2017-03-07 19:53:06', '2017-03-07 19:53:06'),
(16, 'Experience 4', 'Company 4', 'Belgrade', 187, 'July', 'September', 2004, 2010, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2017-03-07 19:55:23', '2017-03-07 19:55:23'),
(17, 'Experience 5', 'Company 5', 'Belgrade', 187, 'January', '', 2004, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2017-03-07 19:56:01', '2017-03-07 21:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `name`) VALUES
(1, 'Administracija'),
(2, 'Arhitektura'),
(4, 'Bankarstvo'),
(5, 'Biologija'),
(6, 'Briga o lepoti'),
(7, 'Dizajn'),
(8, 'Ekonomija'),
(9, 'Elektrotehnika'),
(10, 'Farmacija'),
(11, 'Finansije'),
(12, 'Fizika'),
(13, 'GrafiÄarstvo, izdavaÅ¡tvo'),
(14, 'GraÄ‘evina, geodezija'),
(15, 'Hemija'),
(16, 'IT'),
(17, 'Jezici, knjiÅ¾evnost'),
(18, 'Kontrola kvaliteta'),
(19, 'Ljudski resursi'),
(20, 'Logistika'),
(21, 'Magacin'),
(22, 'Marketing, promocija'),
(23, 'MaÅ¡instvo'),
(24, 'Mediji(novinarstvo, Å¡tampa)'),
(25, 'MenadÅ¾ment-srednji'),
(26, 'MenadÅ¾ment-viÅ¡i, konsalting'),
(27, 'ObezbeÄ‘enje'),
(28, 'Obrazovanje'),
(29, 'Briga o deci'),
(30, 'Ostalo'),
(31, 'Poljoprivreda'),
(32, 'Pozivni centri'),
(33, 'PR'),
(34, 'Pravo'),
(35, 'Prehrambena tehnologija'),
(36, 'Proizvodnja hrane'),
(37, 'Psihologija'),
(38, 'RaÄunovodstvo, knjigovodstvo'),
(39, 'Rudarstvo, metalurgija'),
(40, 'SaobraÄ‡aj'),
(41, 'Sociologija'),
(42, 'Sport, rekreacija'),
(43, 'Stomatologija'),
(44, 'Tekstilna industrija'),
(45, 'Telekomunikacije'),
(46, 'Transport'),
(47, 'Trgovina, prodaja'),
(48, 'Turizam'),
(49, 'Ugostiteljstvo'),
(50, 'Veterina'),
(51, 'Zabava'),
(52, 'ZaÅ¡tita na radu'),
(53, 'ZaÅ¡tita Å¾ivotne sredine, ekologija'),
(54, 'Zdravstvo'),
(55, 'Å umarstvo');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `proficiency_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `proficiency_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Engleski', 4, 1, '2017-01-05 19:13:11', '2017-02-08 23:07:48'),
(2, 'Srpski', 5, 1, '2017-01-05 19:13:11', '2017-02-08 22:46:11'),
(3, 'Nemacki', 1, 1, '2017-02-08 23:20:56', '2017-02-08 23:20:56'),
(4, 'Francuski', 1, 0, '2017-02-08 23:21:45', '2017-02-08 23:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `language_proficiences`
--

CREATE TABLE `language_proficiences` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language_proficiences`
--

INSERT INTO `language_proficiences` (`id`, `name`) VALUES
(1, 'PoÄetni novo'),
(2, 'NiÅ¾i srednji nivo'),
(3, 'Srednji nivo'),
(4, 'ViÅ¡i srednji nivo'),
(5, 'Napredni nivo'),
(6, 'Profesioni nivo');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `email_from` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `content`, `email_from`, `status`, `created_at`) VALUES
(152, 'Test Poruka 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 't@t.com', 1, '2017-03-07 18:49:59'),
(154, 'Test Poruka 5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor# in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'v@v.com', 1, '2017-03-07 18:50:35'),
(150, 'Test Poruka 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'v@v.com', 1, '2017-03-07 18:49:19'),
(151, 'Test Poruka 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 't@t.com', 1, '2017-03-07 18:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Article', 1, '2017-01-05 21:25:29', '2017-01-05 21:25:29'),
(2, 'Certification', 1, '2017-01-09 09:15:25', '2017-01-09 09:15:25'),
(3, 'Contact', 1, '2017-01-09 09:15:25', '2017-01-09 09:15:25'),
(4, 'Education', 1, '2017-01-09 09:17:02', '2017-01-09 09:17:02'),
(5, 'Experience', 1, '2017-01-09 09:17:02', '2017-01-09 09:17:02'),
(6, 'Language', 1, '2017-01-09 09:17:55', '2017-01-09 09:17:55'),
(11, 'User', 1, '2017-01-17 22:11:33', '2017-01-17 22:11:33'),
(8, 'Project', 1, '2017-01-09 09:18:45', '2017-01-09 09:18:45'),
(9, 'Publication', 1, '2017-01-09 09:18:45', '2017-01-09 09:18:45'),
(10, 'Skill', 1, '2017-01-09 09:18:59', '2017-01-09 09:18:59'),
(12, 'UserProfile', 1, '2017-01-17 22:11:33', '2017-01-17 22:11:33'),
(13, 'Page', 1, '2017-01-18 19:45:32', '2017-01-18 19:45:32'),
(14, 'Module', 1, '2017-01-18 20:48:59', '2017-01-18 20:48:59'),
(15, 'mod_blank', 1, '2017-03-21 12:12:51', '2017-03-21 12:12:51'),
(16, 'Comment', 1, '2017-05-01 14:12:48', '2017-05-01 14:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `module_pages`
--

CREATE TABLE `module_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `priority` smallint(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_pages`
--

INSERT INTO `module_pages` (`id`, `page_id`, `module_id`, `priority`) VALUES
(1, 1, 0, 2),
(2, 2, 2, 2),
(3, 2, 4, 1),
(4, 2, 5, 3),
(5, 3, 6, 3),
(6, 2, 8, 4),
(7, 2, 9, 5),
(8, 3, 10, 2),
(9, 4, 3, 1),
(10, 1, 0, 1),
(11, 5, 12, 1),
(13, 7, 1, 5),
(15, 9, 2, 7),
(17, 11, 3, 3),
(19, 13, 4, 9),
(21, 15, 5, 11),
(23, 17, 6, 13),
(25, 19, 14, 21),
(27, 21, 13, 23),
(29, 23, 8, 15),
(31, 25, 9, 17),
(33, 27, 10, 19),
(35, 6, 11, 2),
(36, 1, 15, 3),
(37, 3, 12, 1),
(38, 29, 1, 1),
(39, 30, 16, 24);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_controller` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `name_method` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `template` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `menu` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `footer` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `name_controller`, `name_method`, `route`, `template`, `menu`, `footer`, `icon`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Naslovna', 'page', 'index', 'naslovna', 'default', '', '', 'fa-home', 0, 1, '2017-01-05 21:16:16', '2017-01-05 21:16:16'),
(2, 'Aktivnosti', 'page', 'index', 'aktivnosti', 'default', '', '', 'fa-th', 0, 1, '2017-01-05 21:16:16', '2017-01-05 21:16:16'),
(3, 'O meni', 'page', 'index', 'o_meni', 'default', '', '', 'fa-user', 0, 1, '2017-01-05 21:18:15', '2017-01-05 21:18:15'),
(4, 'Kontakt', 'page', 'index', 'kontakt', 'default', '', '', 'fa-comment', 0, 1, '2017-01-05 21:18:15', '2017-01-05 21:18:15'),
(5, 'Profile', 'adminProfile', 'index', 'admin', 'admin', '', '', 'icon-user', 0, 3, '2017-01-19 15:53:57', '2017-01-19 15:53:57'),
(6, 'Edit Credential', 'adminUser', 'index', 'admin-user', 'admin', '', '', 'icon-cloud', 0, 3, '2017-01-19 15:58:06', '2017-01-19 15:58:06'),
(7, 'Articles', 'adminArticle', 'index', 'admin-articles-list', 'admin', '', '', 'icon-font', 0, 3, '2017-01-19 16:11:10', '2017-01-19 16:11:10'),
(9, 'Certifications', 'adminCertification', 'index', 'admin-certifications-list', 'admin', '', '', 'icon-ok-sign', 0, 3, '2017-01-19 22:11:00', '2017-01-19 22:11:00'),
(11, 'Messages', 'adminContact', 'index', 'admin-messages-list', 'admin', '', '', 'icon-envelope', 0, 3, '2017-01-19 22:15:22', '2017-01-19 22:15:22'),
(13, 'Education', 'adminEducation', 'index', 'admin-education-list', 'admin', '', '', 'icon-apple', 0, 3, '2017-01-19 22:22:34', '2017-01-19 22:22:34'),
(29, 'Blog', 'page', 'index', 'blog', 'default', '', '', 'fa-font', 0, 1, '2017-03-22 22:11:47', '2017-03-22 22:11:47'),
(15, 'Experience', 'adminExperience', 'index', 'admin-experience-list', 'admin', '', '', 'icon-briefcase', 0, 3, '2017-01-19 22:28:47', '2017-01-19 22:28:47'),
(17, 'Languages', 'adminLanguage', 'index', 'admin-languages-list', 'admin', '', '', 'icon-globe', 0, 3, '2017-01-19 23:26:48', '2017-01-19 23:26:48'),
(19, 'Modules', 'adminModule', 'index', 'admin-modules-list', 'admin', '', '', 'icon-th-list', 0, 3, '2017-01-20 16:56:34', '2017-01-20 16:56:34'),
(21, 'Pages', 'adminPage', 'index', 'admin-pages-list', 'admin', '', '', 'icon-file', 0, 3, '2017-01-20 17:03:37', '2017-01-20 17:03:37'),
(23, 'Projects', 'adminProject', 'index', 'admin-projects-list', 'admin', '', '', 'icon-folder-open', 0, 3, '2017-01-20 17:19:41', '2017-01-20 17:19:41'),
(25, 'Publications', 'adminPublication', 'index', 'admin-publications-list', 'admin', '', '', 'icon-book', 0, 3, '2017-01-20 17:22:49', '2017-01-20 17:22:49'),
(27, 'Skills', 'adminSkill', 'index', 'admin-skills-list', 'admin', '', '', 'icon-wrench', 0, 3, '2017-01-20 17:25:03', '2017-01-20 17:25:03'),
(30, 'Comments', 'adminComment', 'index', 'admin-comments-list', 'admin', '', '', 'icon-comment', 0, 3, '2017-05-01 08:15:12', '2017-05-01 10:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `project_month` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `project_year` smallint(4) NOT NULL,
  `project_url` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `project_month`, `project_year`, `project_url`, `description`, `status`, `created_at`, `updated_at`) VALUES
(16, 'Project 2', 'March', 2015, 'http://project2.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2017-03-07 21:02:32', '2017-03-07 21:02:32'),
(15, 'Project 1', 'February', 2014, 'http://project1.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2017-03-07 21:02:11', '2017-03-07 21:02:11'),
(17, 'Project 3', 'June', 2014, 'http://project3.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2017-03-07 21:02:54', '2017-03-07 21:02:54'),
(18, 'Projekat 4', 'April', 2015, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2017-03-07 21:03:18', '2017-03-07 21:03:18'),
(19, 'Projekat 5', 'June', 2013, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2017-03-07 21:03:33', '2017-03-07 21:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE `project_members` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `author_surname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`id`, `author_name`, `author_surname`, `project_id`, `status`, `created_at`, `updated_at`) VALUES
(29, 'Test', 'Test', 15, 1, '2017-03-07 21:02:11', '2017-03-07 21:02:11'),
(30, 'Test', 'Test', 16, 1, '2017-03-07 21:02:32', '2017-03-07 21:02:32'),
(31, 'Test', 'Test', 17, 1, '2017-03-07 21:02:54', '2017-03-07 21:02:54'),
(32, 'Test', 'Test', 18, 1, '2017-03-07 21:03:18', '2017-03-07 21:03:18'),
(33, 'Test', 'Test', 19, 0, '2017-03-07 21:03:33', '2017-03-07 21:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `publisher` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `publ_month` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `publ_year` smallint(4) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `publ_url` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `document_name` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `title`, `publisher`, `publ_month`, `publ_year`, `description`, `publ_url`, `document_name`, `status`, `created_at`, `updated_at`) VALUES
(20, 'Publ 1', 'Test 1', 'March', 2016, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'http://project1.com', '', 0, '2017-03-07 21:06:44', '2017-03-07 21:06:44'),
(21, 'Publ 2a', 'Test 2', 'January', 2005, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'http://project2.com', '58c95b9e71cbbJiddu_Krishnamurt_The_Book_of_Life.pdf', 1, '2017-03-07 21:07:11', '2017-03-12 22:45:31'),
(22, 'Publ 3', 'Test 3', 'February', 2012, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', '58c95b7333d87Novi_pristup_konstrukciji_web_aplikacija.pdf', 1, '2017-03-07 21:07:28', '2017-03-07 21:07:28'),
(23, 'Publ 4', 'Test 4', 'April', 2014, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'http://project4.com', '', 0, '2017-03-07 21:07:59', '2017-03-07 21:07:59'),
(24, 'Publ 5', 'Test 5', 'February', 2015, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', '', 1, '2017-03-07 21:08:17', '2017-03-07 21:08:17'),
(34, 'test', 'test', 'Februar', 2016, 'test', '', '', 1, '2017-05-02 16:14:14', '2017-05-02 16:14:14'),
(33, 'Test6', 'Test6', 'Januar', 2014, 'test', '', '', 1, '2017-05-02 16:13:21', '2017-05-02 16:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `publication_authors`
--

CREATE TABLE `publication_authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `author_surname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `publication_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publication_authors`
--

INSERT INTO `publication_authors` (`id`, `author_name`, `author_surname`, `publication_id`, `status`, `created_at`, `updated_at`) VALUES
(24, 'Test', 'Test', 20, 1, '2017-03-07 21:06:44', '2017-03-07 21:06:44'),
(25, 'Test', 'Test', 21, 0, '2017-03-07 21:07:11', '2017-03-07 21:07:11'),
(26, 'Test', 'Test', 22, 0, '2017-03-07 21:07:28', '2017-03-07 21:07:28'),
(27, 'Test', 'Test', 23, 0, '2017-03-07 21:07:59', '2017-03-07 21:07:59'),
(28, 'Test', 'Test', 24, 0, '2017-03-07 21:08:17', '2017-03-07 21:08:17'),
(54, 'Test', 'Tset', 20, 1, '2017-05-02 16:15:30', '2017-05-02 16:15:30');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `persentage` tinyint(3) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `persentage`, `status`) VALUES
(1, 'PHP', 99, 1),
(2, 'MySQL', 85, 1),
(3, 'Management', 78, 1),
(4, 'Sledging', 98, 2),
(5, 'Linux', 77, 0),
(6, 'Microsoft Office', 99, 1),
(7, 'Customer Service', 65, 1),
(8, 'Teamwork', 70, 0),
(9, 'Photoshop', 56, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `token`, `status`) VALUES
(1, 'v@v.com', '96e79218965eb72c92a549dd5a330112', 'test123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `profess_headline` text COLLATE utf8_unicode_ci NOT NULL,
  `industry_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `name`, `surname`, `address`, `city`, `user_id`, `country_id`, `profess_headline`, `industry_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'Tset', 'Test 15', 'Beograd', 1, 187, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 16, '5946e79b0f86cIMG_20170514_171053.jpg', '2017-01-05 18:52:35', '2017-01-05 18:53:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_country_code_index` (`country_code`),
  ADD KEY `countries_country_index` (`country`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language_proficiences`
--
ALTER TABLE `language_proficiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_pages`
--
ALTER TABLE `module_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publication_authors`
--
ALTER TABLE `publication_authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique record ID. NOT IDENTITY AUTO INCREMENT', AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `language_proficiences`
--
ALTER TABLE `language_proficiences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `module_pages`
--
ALTER TABLE `module_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `publication_authors`
--
ALTER TABLE `publication_authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
