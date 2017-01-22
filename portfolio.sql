-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2017 at 09:31 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.6.23-1+deprecated+dontuse+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `page_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `image`, `author_id`, `page_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Clanak 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\nLorem ipsum dolor sit amet, auctor eget nisl, pharetra nibh lorem aliquet duis nostra, nulla nullam velit. Morbi ipsum mauris dapibus sodales, sed libero, at erat sed, massa faucibus sodales, aenean lacinia eu malesuada porta volutpat volutpat. Pede feugiat dui, turpis mauris nunc sit tellus, nulla penatibus vestibulum ipsum dolor vestibulum nunc. Ut morbi integer, esse adipisci neque volutpat ut, eget laoreet, magna justo sodales curabitur. Laoreet at, ac blandit euismod. Ligula pellentesque lacus donec vel fermentum. Pede vitae enim, sem sem iaculis vel vel, dolor sed aliquam eu vivamus, sit phasellus vivamus. Atque aliquet turpis gravida, neque dictumst vel cras curabitur. Interdum mi velit, nullam dolor sem viverra placerat eros aliquam, cupiditate erat, mus at orci fusce consectetuer, ante ornare placerat maecenas a egestas. Nonummy sed neque, velit amet egestas pellentesque do arcu auctor, consequat lobortis. Integer dui morbi nullam posuere, dignissim per pellentesque hymenaeos, pellentesque in tempus unde elit wisi, dapibus arcu nunc vivamus tristique sed voluptas. In odio, quis praesent vehicula.', 'http://www.crtanifilmovi.rs/wp-content/uploads/2012/10/plava-princeza-RS.jpg', 1, 1, 1, '2017-01-05 20:54:23', '2017-01-05 20:54:23'),
(2, 'Clanak 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 1, 1, 1, '2017-01-01 07:20:08', '2017-01-02 06:07:22'),
(3, 'Clanak 3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'http://www.crtanifilmovi.rs/wp-content/uploads/2012/10/plava-princeza-RS.jpg', 1, 1, 1, '2017-01-03 00:00:00', '2017-01-03 04:06:23'),
(4, 'Clanak 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', 1, 2, 1, '2017-01-04 04:03:12', '2017-01-04 11:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE IF NOT EXISTS `certifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `authority` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `licence_number` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `certif_url` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `certif_day` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `certif_year` smallint(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `name`, `authority`, `licence_number`, `certif_url`, `certif_day`, `certif_year`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sertifikat 1 - Lorem ipsum dolor sit amet, etiam aenean erat lacus.', 'Kompanija 1', '123456', '', 'Friday', 2016, 1, '2017-01-05 19:19:39', '2017-01-05 19:19:39'),
(2, 'Sertifikat 2 - Lorem ipsum dolor sit amet, etiam aenean erat lacus.', 'Kompanija 2', 'fghi1211', '', 'Monday', 2011, 1, '2017-01-09 21:42:00', '2017-01-09 21:42:00'),
(3, 'Sertifikat 3 - Lorem ipsum dolor sit amet, etiam aenean erat lacus.', 'Kompanije 3', 'ddds434343', 'http://vddgdgdg.com', 'Friday', 2014, 1, '2017-01-09 21:42:00', '2017-01-09 21:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique record ID. NOT IDENTITY AUTO INCREMENT',
  `country_code` varchar(2) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ISO 3166-2.  2 character country code',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ISO 3166.  Long country description',
  PRIMARY KEY (`id`),
  KEY `countries_country_code_index` (`country_code`),
  KEY `countries_country_index` (`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=247 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country`) VALUES
(1, 'AD', 'ANDORRA'),
(2, 'AE', 'UNITED ARAB EMIRATES'),
(3, 'AF', 'AFGHANISTAN'),
(4, 'AG', 'ANTIGUA AND BARBUDA'),
(5, 'AI', 'ANGUILLA'),
(6, 'AL', 'ALBANIA'),
(7, 'AM', 'ARMENIA'),
(8, 'AN', 'NETHERLANDS ANTILLES'),
(9, 'AO', 'ANGOLA'),
(10, 'AQ', 'ANTARCTICA'),
(11, 'AR', 'ARGENTINA'),
(12, 'AS', 'AMERICAN SAMOA'),
(13, 'AT', 'AUSTRIA'),
(14, 'AU', 'AUSTRALIA'),
(15, 'AW', 'ARUBA'),
(16, 'AX', 'ALAND ISLANDS'),
(17, 'AZ', 'AZERBAIJAN'),
(18, 'BA', 'BOSNIA AND HERZEGOVINA'),
(19, 'BB', 'BARBADOS'),
(20, 'BD', 'BANGLADESH'),
(21, 'BE', 'BELGIUM'),
(22, 'BF', 'BURKINA FASO'),
(23, 'BG', 'BULGARIA'),
(24, 'BH', 'BAHRAIN'),
(25, 'BI', 'BURUNDI'),
(26, 'BJ', 'BENIN'),
(27, 'BM', 'BERMUDA'),
(28, 'BN', 'BRUNEI DARUSSALAM'),
(29, 'BO', 'BOLIVIA, PLURINATIONAL STATE OF'),
(30, 'BR', 'BRAZIL'),
(31, 'BS', 'BAHAMAS'),
(32, 'BT', 'BHUTAN'),
(33, 'BV', 'BOUVET ISLAND'),
(34, 'BW', 'BOTSWANA'),
(35, 'BY', 'BELARUS'),
(36, 'BZ', 'BELIZE'),
(37, 'CA', 'CANADA'),
(38, 'CC', 'COCOS (KEELING) ISLANDS'),
(39, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE'),
(40, 'CF', 'CENTRAL AFRICAN REPUBLIC'),
(41, 'CG', 'CONGO'),
(42, 'CH', 'SWITZERLAND'),
(43, 'CI', 'COTE D''IVOIRE'),
(44, 'CK', 'COOK ISLANDS'),
(45, 'CL', 'CHILE'),
(46, 'CM', 'CAMEROON'),
(47, 'CN', 'CHINA'),
(48, 'CO', 'COLOMBIA'),
(49, 'CR', 'COSTA RICA'),
(50, 'CU', 'CUBA'),
(51, 'CV', 'CAPE VERDE'),
(52, 'CX', 'CHRISTMAS ISLAND'),
(53, 'CY', 'CYPRUS'),
(54, 'CZ', 'CZECH REPUBLIC'),
(55, 'DE', 'GERMANY'),
(56, 'DJ', 'DJIBOUTI'),
(57, 'DK', 'DENMARK'),
(58, 'DM', 'DOMINICA'),
(59, 'DO', 'DOMINICAN REPUBLIC'),
(60, 'DZ', 'ALGERIA'),
(61, 'EC', 'ECUADOR'),
(62, 'EE', 'ESTONIA'),
(63, 'EG', 'EGYPT'),
(64, 'EH', 'WESTERN SAHARA'),
(65, 'ER', 'ERITREA'),
(66, 'ES', 'SPAIN'),
(67, 'ET', 'ETHIOPIA'),
(68, 'FI', 'FINLAND'),
(69, 'FJ', 'FIJI'),
(70, 'FK', 'FALKLAND ISLANDS (MALVINAS)'),
(71, 'FM', 'MICRONESIA, FEDERATED STATES OF'),
(72, 'FO', 'FAROE ISLANDS'),
(73, 'FR', 'FRANCE'),
(74, 'GA', 'GABON'),
(75, 'GD', 'GRENADA'),
(76, 'GE', 'GEORGIA'),
(77, 'GF', 'FRENCH GUIANA'),
(78, 'GG', 'GUERNSEY'),
(79, 'GH', 'GHANA'),
(80, 'GI', 'GIBRALTAR'),
(81, 'GL', 'GREENLAND'),
(82, 'GM', 'GAMBIA'),
(83, 'GN', 'GUINEA'),
(84, 'GP', 'GUADELOUPE'),
(85, 'GQ', 'EQUATORIAL GUINEA'),
(86, 'GR', 'GREECE'),
(87, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS'),
(88, 'GT', 'GUATEMALA'),
(89, 'GU', 'GUAM'),
(90, 'GW', 'GUINEA-BISSAU'),
(91, 'GY', 'GUYANA'),
(92, 'HK', 'HONG KONG'),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS'),
(94, 'HN', 'HONDURAS'),
(95, 'HR', 'CROATIA'),
(96, 'HT', 'HAITI'),
(97, 'HU', 'HUNGARY'),
(98, 'ID', 'INDONESIA'),
(99, 'IE', 'IRELAND'),
(100, 'IL', 'ISRAEL'),
(101, 'IM', 'ISLE OF MAN'),
(102, 'IN', 'INDIA'),
(103, 'IO', 'BRITISH INDIAN OCEAN TERRITORY'),
(104, 'IQ', 'IRAQ'),
(105, 'IR', 'IRAN, ISLAMIC REPUBLIC OF'),
(106, 'IS', 'ICELAND'),
(107, 'IT', 'ITALY'),
(108, 'JE', 'JERSEY'),
(109, 'JM', 'JAMAICA'),
(110, 'JO', 'JORDAN'),
(111, 'JP', 'JAPAN'),
(112, 'KE', 'KENYA'),
(113, 'KG', 'KYRGYZSTAN'),
(114, 'KH', 'CAMBODIA'),
(115, 'KI', 'KIRIBATI'),
(116, 'KM', 'COMOROS'),
(117, 'KN', 'SAINT KITTS AND NEVIS'),
(118, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF'),
(119, 'KR', 'KOREA, REPUBLIC OF'),
(120, 'KW', 'KUWAIT'),
(121, 'KY', 'CAYMAN ISLANDS'),
(122, 'KZ', 'KAZAKHSTAN'),
(123, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC'),
(124, 'LB', 'LEBANON'),
(125, 'LC', 'SAINT LUCIA'),
(126, 'LI', 'LIECHTENSTEIN'),
(127, 'LK', 'SRI LANKA'),
(128, 'LR', 'LIBERIA'),
(129, 'LS', 'LESOTHO'),
(130, 'LT', 'LITHUANIA'),
(131, 'LU', 'LUXEMBOURG'),
(132, 'LV', 'LATVIA'),
(133, 'LY', 'LIBYAN ARAB JAMAHIRIYA'),
(134, 'MA', 'MOROCCO'),
(135, 'MC', 'MONACO'),
(136, 'MD', 'MOLDOVA, REPUBLIC OF'),
(137, 'ME', 'MONTENEGRO'),
(138, 'MF', 'SAINT MARTIN'),
(139, 'MG', 'MADAGASCAR'),
(140, 'MH', 'MARSHALL ISLANDS'),
(141, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF'),
(142, 'ML', 'MALI'),
(143, 'MM', 'MYANMAR'),
(144, 'MN', 'MONGOLIA'),
(145, 'MO', 'MACAO'),
(146, 'MP', 'NORTHERN MARIANA ISLANDS'),
(147, 'MQ', 'MARTINIQUE'),
(148, 'MR', 'MAURITANIA'),
(149, 'MS', 'MONTSERRAT'),
(150, 'MT', 'MALTA'),
(151, 'MU', 'MAURITIUS'),
(152, 'MV', 'MALDIVES'),
(153, 'MW', 'MALAWI'),
(154, 'MX', 'MEXICO'),
(155, 'MY', 'MALAYSIA'),
(156, 'MZ', 'MOZAMBIQUE'),
(157, 'NA', 'NAMIBIA'),
(158, 'NC', 'NEW CALEDONIA'),
(159, 'NE', 'NIGER'),
(160, 'NF', 'NORFOLK ISLAND'),
(161, 'NG', 'NIGERIA'),
(162, 'NI', 'NICARAGUA'),
(163, 'NL', 'NETHERLANDS'),
(164, 'NO', 'NORWAY'),
(165, 'NP', 'NEPAL'),
(166, 'NR', 'NAURU'),
(167, 'NU', 'NIUE'),
(168, 'NZ', 'NEW ZEALAND'),
(169, 'OM', 'OMAN'),
(170, 'PA', 'PANAMA'),
(171, 'PE', 'PERU'),
(172, 'PF', 'FRENCH POLYNESIA'),
(173, 'PG', 'PAPUA NEW GUINEA'),
(174, 'PH', 'PHILIPPINES'),
(175, 'PK', 'PAKISTAN'),
(176, 'PL', 'POLAND'),
(177, 'PM', 'SAINT PIERRE AND MIQUELON'),
(178, 'PN', 'PITCAIRN'),
(179, 'PR', 'PUERTO RICO'),
(180, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED'),
(181, 'PT', 'PORTUGAL'),
(182, 'PW', 'PALAU'),
(183, 'PY', 'PARAGUAY'),
(184, 'QA', 'QATAR'),
(185, 'RE', 'REUNION'),
(186, 'RO', 'ROMANIA'),
(187, 'RS', 'SERBIA'),
(188, 'RU', 'RUSSIAN FEDERATION'),
(189, 'RW', 'RWANDA'),
(190, 'SA', 'SAUDI ARABIA'),
(191, 'SB', 'SOLOMON ISLANDS'),
(192, 'SC', 'SEYCHELLES'),
(193, 'SD', 'SUDAN'),
(194, 'SE', 'SWEDEN'),
(195, 'SG', 'SINGAPORE'),
(196, 'SH', 'SAINT HELENA, ASCENSION AND TRISTAN DA CUNHA'),
(197, 'SI', 'SLOVENIA'),
(198, 'SJ', 'SVALBARD AND JAN MAYEN'),
(199, 'SK', 'SLOVAKIA'),
(200, 'SL', 'SIERRA LEONE'),
(201, 'SM', 'SAN MARINO'),
(202, 'SN', 'SENEGAL'),
(203, 'SO', 'SOMALIA'),
(204, 'SR', 'SURINAME'),
(205, 'SS', 'SOUTH SUDAN'),
(206, 'ST', 'SAO TOME AND PRINCIPE'),
(207, 'SV', 'EL SALVADOR'),
(208, 'SY', 'SYRIAN ARAB REPUBLIC'),
(209, 'SZ', 'SWAZILAND'),
(210, 'TC', 'TURKS AND CAICOS ISLANDS'),
(211, 'TD', 'CHAD'),
(212, 'TF', 'FRENCH SOUTHERN TERRITORIES'),
(213, 'TG', 'TOGO'),
(214, 'TH', 'THAILAND'),
(215, 'TJ', 'TAJIKISTAN'),
(216, 'TK', 'TOKELAU'),
(217, 'TL', 'TIMOR-LESTE'),
(218, 'TM', 'TURKMENISTAN'),
(219, 'TN', 'TUNISIA'),
(220, 'TO', 'TONGA'),
(221, 'TR', 'TURKEY'),
(222, 'TT', 'TRINIDAD AND TOBAGO'),
(223, 'TV', 'TUVALU'),
(224, 'TW', 'TAIWAN'),
(225, 'TZ', 'TANZANIA, UNITED REPUBLIC OF'),
(226, 'UA', 'UKRAINE'),
(227, 'UG', 'UGANDA'),
(228, 'UK', 'UNITED KINGDOM'),
(229, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS'),
(230, 'US', 'UNITED STATES'),
(231, 'UY', 'URUGUAY'),
(232, 'UZ', 'UZBEKISTAN'),
(233, 'VA', 'HOLY SEE (VATICAN CITY STATE)'),
(234, 'VC', 'SAINT VINCENT AND THE GRENADINES'),
(235, 'VE', 'VENEZUELA, BOLIVARIAN REPUBLIC OF'),
(236, 'VG', 'VIRGIN ISLANDS, BRITISH'),
(237, 'VI', 'VIRGIN ISLANDS, U.S.'),
(238, 'VN', 'VIET NAM'),
(239, 'VU', 'VANUATU'),
(240, 'WF', 'WALLIS AND FUTUNA'),
(241, 'WS', 'SAMOA'),
(242, 'YE', 'YEMEN'),
(243, 'YT', 'MAYOTTE'),
(244, 'ZA', 'SOUTH AFRICA'),
(245, 'ZM', 'ZAMBIA'),
(246, 'ZW', 'ZIMBABWE');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `school` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `year_from` smallint(4) NOT NULL,
  `year_to` smallint(4) NOT NULL,
  `degree` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `field_of_study` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `school`, `year_from`, `year_to`, `degree`, `field_of_study`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'School 1', 2011, 2012, 'Diploma 1', 'Economy', 'Lorem ipsum dolor sit amet, etiam aenean erat lacus. Non mauris, phasellus platea justo auctor fames ante nunc, varius erat, est ipsum dolor, metus imperdiet magna enim justo.', 1, '2017-01-05 20:12:05', '2017-01-05 20:12:05'),
(2, 'School 2', 2004, 2007, 'Diploma 2', 'Management', '', 1, '2017-01-05 20:13:17', '2017-01-05 20:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE IF NOT EXISTS `experience` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `month_from` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `month_to` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `year_from` smallint(4) NOT NULL,
  `year_to` smallint(4) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`id`, `title`, `company`, `city`, `country_id`, `month_from`, `month_to`, `year_from`, `year_to`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pozicija 1', 'Company 1', 'Belgrade', 187, 'May', 'October', 2010, 2013, 'Lorem ipsum dolor sit amet, etiam aenean erat lacus. Non mauris, phasellus platea justo auctor fames ante nunc, varius erat, est ipsum dolor, metus imperdiet magna enim justo.', 1, '2017-01-05 20:21:35', '2017-01-05 20:21:35'),
(2, 'Pozicija 2', 'Company 2', 'Belgrade', 187, 'October', '', 2013, 0, 'Lorem ipsum dolor sit amet, etiam aenean erat lacus. Non mauris, phasellus platea justo auctor fames ante nunc, varius erat, est ipsum dolor, metus imperdiet magna enim justo.', 1, '2017-01-05 20:23:58', '2017-01-05 20:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE IF NOT EXISTS `industry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `proficiency_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `proficiency_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 3, 1, '2017-01-05 19:13:11', '2017-01-05 19:13:11'),
(2, 'Serbian', 5, 1, '2017-01-05 19:13:11', '2017-01-05 19:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `language_proficiences`
--

CREATE TABLE IF NOT EXISTS `language_proficiences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `language_proficiences`
--

INSERT INTO `language_proficiences` (`id`, `name`) VALUES
(1, 'Elementary proficiency'),
(2, 'Limited working proficiency'),
(3, 'Professional'),
(4, 'Full professional'),
(5, 'Native or bilingual');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `email_from` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `subject`, `content`, `email_from`, `status`, `created_at`) VALUES
(1, 'Poruka', 'Lorem ipsum dolor sit amet, etiam aenean erat lacus. Non mauris, phasellus platea justo auctor fames ante nunc, varius erat, est ipsum dolor, metus imperdiet magna enim justo.', 'v@v.com', 1, '2017-01-05 21:29:35'),
(2, 'Poruka2', 'Lorem ipsum dolor sit amet, etiam aenean erat lacus. Non mauris, phasellus platea justo auctor fames ante nunc, varius erat, est ipsum dolor, metus imperdiet magna enim justo.', 'v@m.com', 1, '2017-01-01 03:11:18'),
(3, 'Poruka 3', 'Lorem ipsum dolor sit amet, etiam aenean erat lacus. Non mauris, phasellus platea justo auctor fames ante nunc, varius erat, est ipsum dolor, metus imperdiet magna enim justo.', 'm@m.com', 0, '2017-01-03 02:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mod_article', 1, '2017-01-05 21:25:29', '2017-01-05 21:25:29'),
(2, 'mod_certifications', 1, '2017-01-09 09:15:25', '2017-01-09 09:15:25'),
(3, 'mod_contact', 1, '2017-01-09 09:15:25', '2017-01-09 09:15:25'),
(4, 'mod_education', 1, '2017-01-09 09:17:02', '2017-01-09 09:17:02'),
(5, 'mod_experience', 1, '2017-01-09 09:17:02', '2017-01-09 09:17:02'),
(6, 'mod_languages', 1, '2017-01-09 09:17:55', '2017-01-09 09:17:55'),
(11, 'mod_user', 1, '2017-01-17 22:11:33', '2017-01-17 22:11:33'),
(8, 'mod_projects', 1, '2017-01-09 09:18:45', '2017-01-09 09:18:45'),
(9, 'mod_publications', 1, '2017-01-09 09:18:45', '2017-01-09 09:18:45'),
(10, 'mod_skills', 1, '2017-01-09 09:18:59', '2017-01-09 09:18:59'),
(12, 'mod_user_profile', 1, '2017-01-17 22:11:33', '2017-01-17 22:11:33'),
(13, 'mod_pages', 1, '2017-01-18 19:45:32', '2017-01-18 19:45:32'),
(14, 'mod_modules', 1, '2017-01-18 20:48:59', '2017-01-18 20:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `module_pages`
--

CREATE TABLE IF NOT EXISTS `module_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `module_id` int(10) unsigned NOT NULL,
  `priority` smallint(3) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Dumping data for table `module_pages`
--

INSERT INTO `module_pages` (`id`, `page_id`, `module_id`, `priority`) VALUES
(1, 1, 1, 2),
(2, 2, 2, 2),
(3, 2, 4, 1),
(4, 2, 5, 3),
(5, 3, 6, 2),
(6, 2, 8, 4),
(7, 2, 9, 5),
(8, 3, 10, 1),
(9, 4, 3, 1),
(10, 1, 12, 1),
(11, 5, 12, 1),
(12, 6, 11, 2),
(13, 7, 1, 5),
(14, 8, 1, 6),
(15, 9, 2, 7),
(16, 10, 2, 8),
(17, 11, 3, 3),
(18, 12, 3, 4),
(19, 13, 4, 9),
(20, 14, 4, 10),
(21, 15, 5, 11),
(22, 16, 5, 12),
(23, 17, 6, 13),
(24, 18, 6, 14),
(25, 19, 14, 21),
(26, 20, 14, 22),
(27, 21, 13, 23),
(28, 22, 13, 24),
(29, 23, 8, 15),
(30, 24, 8, 16),
(31, 25, 9, 17),
(32, 26, 9, 18),
(33, 27, 10, 19),
(34, 28, 10, 20);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name_controller` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `name_method` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `route` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `template` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `menu` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `footer` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `name_controller`, `name_method`, `route`, `template`, `menu`, `footer`, `icon`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Naslovna', 'page', 'index', 'naslovna', 'default', '', '', '', 0, 1, '2017-01-05 21:16:16', '2017-01-05 21:16:16'),
(2, 'Aktivnosti', 'page', 'index', 'aktivnosti', 'default', '', '', '', 0, 1, '2017-01-05 21:16:16', '2017-01-05 21:16:16'),
(3, 'Znanja i vestine', 'page', 'index', 'vestine', 'default', '', '', '', 0, 1, '2017-01-05 21:18:15', '2017-01-05 21:18:15'),
(4, 'Kontakt', 'page', 'index', 'kontakt', 'default', '', '', '', 0, 1, '2017-01-05 21:18:15', '2017-01-05 21:18:15'),
(5, 'Profile', 'adminProfile', 'index', 'admin-profile', 'admin', '', '', 'icon-pencil', 0, 3, '2017-01-19 15:53:57', '2017-01-19 15:53:57'),
(6, 'Edit Credential', 'adminUser', 'index', 'admin-user', 'admin', '', '', 'icon-pencil', 0, 3, '2017-01-19 15:58:06', '2017-01-19 15:58:06'),
(7, 'Articles', 'adminArticle', 'index', 'admin-articles-list', 'admin', '', '', 'icon-table', 0, 3, '2017-01-19 16:11:10', '2017-01-19 16:11:10'),
(8, 'Add New Articles', 'adminArticle', 'insert', 'admin-articles', 'admin', '', '', 'icon-pencil', 0, 3, '2017-01-19 16:11:10', '2017-01-19 16:11:10'),
(9, 'Certifications', 'adminCertification', 'index', 'admin-certifications-list', 'admin', '', '', 'icon-table', 0, 3, '2017-01-19 22:11:00', '2017-01-19 22:11:00'),
(10, 'Add New Certification', 'adminCertification', 'insert', 'admin-certifications', 'admin', '', '', 'icon-pencil', 0, 3, '2017-01-19 22:13:16', '2017-01-19 22:13:16'),
(11, 'Messages', 'adminContact', 'index', 'admin-messages-list', 'admin', '', '', 'icon-table', 0, 3, '2017-01-19 22:15:22', '2017-01-19 22:15:22'),
(12, 'New Message', 'adminContact', 'newMessage', 'admin-messages', 'admin', '', '', 'icon-pencil', 0, 3, '2017-01-19 22:19:36', '2017-01-19 22:19:36'),
(13, 'Education', 'adminEducation', 'index', 'admin-education-list', 'admin', '', '', 'icon-table', 0, 3, '2017-01-19 22:22:34', '2017-01-19 22:22:34'),
(14, 'Add New Education', 'adminEducation', 'insert', 'admin-education', 'admin', '', '', 'icon-pencil', 0, 3, '2017-01-19 22:25:05', '2017-01-19 22:25:05'),
(15, 'Experience', 'adminExperience', 'index', 'admin-experience-list', 'admin', '', '', 'icon-table', 0, 3, '2017-01-19 22:28:47', '2017-01-19 22:28:47'),
(16, 'Add New Experience', 'adminExperience', 'insert', 'admin-experience', 'admin', '', '', 'icon-pencil', 0, 3, '2017-01-19 22:30:48', '2017-01-19 22:30:48'),
(17, 'Languages', 'adminLanguage', 'index', 'admin-languages-list', 'admin', '', '', 'icon-table', 0, 3, '2017-01-19 23:26:48', '2017-01-19 23:26:48'),
(18, 'Add New Language', 'adminLanguage', 'insert', 'admin-languages', 'admin', '', '', 'icon-pencil', 0, 3, '2017-01-19 23:28:30', '2017-01-19 23:28:30'),
(19, 'Modules', 'adminModule', 'index', 'admin-modules-list', 'admin', '', '', 'icon-table', 0, 3, '2017-01-20 16:56:34', '2017-01-20 16:56:34'),
(20, 'Add New Module', 'adminModule', 'insert', 'admin-modules', 'admin', '', '', 'icon-pencil', 0, 3, '2017-01-20 16:59:52', '2017-01-20 16:59:52'),
(21, 'Pages', 'adminPage', 'index', 'admin-pages-list', 'admin', '', '', 'icon-table', 0, 3, '2017-01-20 17:03:37', '2017-01-20 17:03:37'),
(22, 'Add New Page', 'adminPage', 'insert', 'admin-pages', 'admin', '', '', 'icon-pencil', 0, 3, '2017-01-20 17:05:39', '2017-01-20 17:05:39'),
(23, 'Projects', 'adminProject', 'index', 'admin-projects-list', 'admin', '', '', 'icon-table', 0, 3, '2017-01-20 17:19:41', '2017-01-20 17:19:41'),
(24, 'Add New Project', 'adminProject', 'insert', 'admin-projects', 'admin', '', '', 'icon-pencil', 0, 3, '2017-01-20 17:19:41', '2017-01-20 17:19:41'),
(25, 'Publications', 'adminPublication', 'index', 'admin-publications-list', 'admin', '', '', 'icon-table', 0, 3, '2017-01-20 17:22:49', '2017-01-20 17:22:49'),
(26, 'Add New Publication', 'adminPublication', 'insert', 'admin-publications', 'admin', '', '', 'icon-pencil', 0, 3, '2017-01-20 17:22:49', '2017-01-20 17:22:49'),
(27, 'Skills', 'adminSkill', 'index', 'admin-skills-list', 'admin', '', '', 'icon-table', 0, 3, '2017-01-20 17:25:03', '2017-01-20 17:25:03'),
(28, 'Add New Skill', 'adminSkill', 'insert', 'admin-skills', 'admin', '', '', 'icon-pencil', 0, 3, '2017-01-20 17:25:03', '2017-01-20 17:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `project_month` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `project_year` smallint(4) NOT NULL,
  `project_url` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `project_month`, `project_year`, `project_url`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Projekat 1', 'May', 2014, 'http://project1.com', 'Lorem ipsum dolor sit amet, etiam aenean erat lacus. Non mauris, phasellus platea justo auctor fames ante nunc, varius erat, est ipsum dolor, metus imperdiet magna enim justo.', 1, '2017-01-05 20:33:33', '2017-01-05 20:33:33'),
(2, 'Projekat 2', 'December', 2015, '', '', 1, '2017-01-05 20:33:33', '2017-01-05 20:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `project_members`
--

CREATE TABLE IF NOT EXISTS `project_members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `author_surname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `project_members`
--

INSERT INTO `project_members` (`id`, `author_name`, `author_surname`, `project_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Name1', 'Surname1', 1, 1, '2017-01-05 20:37:13', '2017-01-05 20:37:13'),
(2, 'Name1', 'Surname1', 2, 1, '2017-01-05 20:37:13', '2017-01-05 20:37:13'),
(3, 'Name2', 'Surname2', 1, 1, '2017-01-05 20:37:51', '2017-01-05 20:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE IF NOT EXISTS `publications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `publisher` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `publ_month` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `publ_year` smallint(4) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `publ_url` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `document_name` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `title`, `publisher`, `publ_month`, `publ_year`, `description`, `publ_url`, `document_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Publ 1', 'Publisher 1', 'March', 2011, 'Lorem Ipsum is simply dummy text of the printing and typesetting ', '', 'publ.pdf', 1, '2017-01-05 21:02:58', '2017-01-05 21:02:58'),
(2, 'Publ 2', 'Publisher 2', 'April', 2012, '', '', 'publ2.pdf', 1, '2017-01-05 21:02:58', '2017-01-05 21:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `publication_authors`
--

CREATE TABLE IF NOT EXISTS `publication_authors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `author_surname` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `publication_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `publication_authors`
--

INSERT INTO `publication_authors` (`id`, `author_name`, `author_surname`, `publication_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Author1', 'Surname1', 1, 1, '2017-01-11 12:51:24', '2017-01-11 12:51:24'),
(2, 'Author2', 'Surname2', 1, 1, '2017-01-11 12:51:24', '2017-01-11 12:51:24'),
(3, 'Author3', 'Surname3', 1, 0, '2017-01-11 12:52:03', '2017-01-11 12:52:03'),
(4, 'Author4', 'Surname4', 2, 1, '2017-01-11 12:52:03', '2017-01-11 12:52:03'),
(5, 'Author5', 'Surname5', 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Author6', 'Surname6', 2, 1, '2017-01-11 12:52:32', '2017-01-11 12:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `persentage` tinyint(3) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `persentage`, `status`) VALUES
(1, 'PHP', 99, 1),
(2, 'MySQL', 85, 1),
(3, 'Management', 78, 1),
(4, 'Skating', 100, 1),
(5, 'Linux', 77, 1),
(6, 'Microsoft Office', 99, 1),
(7, 'Customer Service', 65, 1),
(8, 'Teamwork', 70, 1),
(9, 'Photoshop', 56, 1),
(10, 'OOP', 66, 1),
(11, 'Bootstrap', 5, 1),
(12, 'Laravel', 85, 1),
(13, 'Git', 77, 1),
(14, 'PhpMyAdmin', 66, 1),
(15, 'Banking', 54, 1),
(16, 'Portale Fornitori', 76, 1),
(17, 'SAP', 100, 1),
(18, 'Retail Banking', 56, 1),
(19, 'Financial Analysis', 68, 1),
(20, 'Credit Cards', 58, 1),
(21, 'Credit Risk', 66, 1),
(22, 'Credit', 80, 1),
(23, 'Loans', 45, 1),
(24, 'Finance', 35, 1),
(25, 'Comercial Banking', 45, 1),
(26, 'Branch Banking', 46, 1),
(27, 'Credit Analysis', 57, 1),
(28, 'Financial Risk', 35, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `token`) VALUES
(1, 'u@u.com', '111111', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(170) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `profess_headline` text COLLATE utf8_unicode_ci NOT NULL,
  `industry_id` int(10) unsigned NOT NULL,
  `image` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `name`, `surname`, `address`, `city`, `country_id`, `profess_headline`, `industry_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'UserName', 'UserSurname', '', 'Belgrade', 187, 'Lorem ipsum dolor', 1, '', '2017-01-05 18:52:35', '2017-01-05 18:53:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
