-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 10 Avril 2013 à 08:30
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

CREATE TABLE IF NOT EXISTS `acheteur` (
  `id_a` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `numero_tel` int(15) DEFAULT NULL,
  `numero_mobil` int(15) DEFAULT NULL,
  `passe` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `etat` int(15) DEFAULT NULL,
  PRIMARY KEY (`id_a`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `acheteur`
--

INSERT INTO `acheteur` (`id_a`, `nom`, `email`, `numero_tel`, `numero_mobil`, `passe`, `date`, `etat`) VALUES
(1, 'toglovi', 'toglovi2@gmail.com', 91986561, 91986561, 'toglovi', '2012-09-13', 1),
(2, 'samie', 'maros20@yahoo.fr', 90015467, 91980171, 'marcus', '2012-09-13', 1),
(3, 'Edjeddddddddddddd', 'toglovi2@outlook.com', 91986561, 91986561, 'toglovi2', '2012-10-06', 1);

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `passe` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `libelle_cat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `id_admin`, `libelle_cat`) VALUES
(1, 1, 'Informatique'),
(2, 1, 'Telephone'),
(3, 1, 'Vetements'),
(4, 1, 'Autres');

-- --------------------------------------------------------

--
-- Structure de la table `cbr`
--

CREATE TABLE IF NOT EXISTS `cbr` (
  `code` varchar(10) NOT NULL,
  `id_acheteur` int(11) NOT NULL,
  `date` date NOT NULL,
  `etat` int(11) NOT NULL,
  `id_commande` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cbr`
--

INSERT INTO `cbr` (`code`, `id_acheteur`, `date`, `etat`, `id_commande`) VALUES
('Bqv0q1', -1, '2012-09-13', 0, 'COMMANDE/7'),
('zcRmb2', -1, '2012-09-16', 0, 'COMMANDE/8'),
('ForSw3', 2, '2012-09-16', 0, 'COMMANDE/9'),
('yUlgB4', 2, '2012-09-21', 0, 'COMMANDE/11'),
('fVsXy5', 2, '2012-09-21', 0, 'COMMANDE/12'),
('q5XkR6', 2, '2012-09-21', 0, 'COMMANDE/12'),
('RJ8F77', 2, '2012-09-21', 0, 'COMMANDE/13'),
('HIt6v8', 2, '2012-09-21', 0, 'COMMANDE/14'),
('l4mU19', 2, '2012-09-30', 0, 'COMMANDE/15'),
('RiOaF10', 2, '2012-09-30', 0, 'COMMANDE/16'),
('OMxLh11', 2, '2012-10-24', 0, 'COMMANDE/21');

-- --------------------------------------------------------

--
-- Structure de la table `cbr_deja`
--

CREATE TABLE IF NOT EXISTS `cbr_deja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vendeur` int(11) NOT NULL,
  `code` varchar(24) NOT NULL,
  `etat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `cbr_deja`
--

INSERT INTO `cbr_deja` (`id`, `id_vendeur`, `code`, `etat`) VALUES
(1, 1, 'l4mU19', 1),
(2, 4, 'RiOaF10', 1),
(3, 1, 'RiOaF10', 1),
(4, 4, 'OMxLh11', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `code` varchar(12) NOT NULL,
  `id_acheteur` int(11) NOT NULL,
  `date_commande` date DEFAULT NULL,
  `montant_global` int(11) DEFAULT NULL,
  `etat_cmd` int(11) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`code`, `id_acheteur`, `date_commande`, `montant_global`, `etat_cmd`) VALUES
('COMMANDE/1', 1, '2012-09-13', 475000, 1),
('COMMANDE/11', 2, '2012-09-21', 45000, 1),
('COMMANDE/12', 2, '2012-09-21', 35000, 1),
('COMMANDE/13', 2, '2012-09-21', 35000, 1),
('COMMANDE/14', 2, '2012-09-21', 80000, 1),
('COMMANDE/15', 2, '2012-09-30', 80000, 1),
('COMMANDE/16', 2, '2012-09-30', 250000, 1),
('COMMANDE/21', 2, '2012-10-24', 150000, 1),
('COMMANDE/4', 1, '2012-09-13', 777000, 1),
('COMMANDE/8', -1, '2012-09-16', 350000, 1),
('COMMANDE/9', 2, '2012-09-16', 350000, 1);

-- --------------------------------------------------------

--
-- Structure de la table `liste_domaines`
--

CREATE TABLE IF NOT EXISTS `liste_domaines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domaine` char(20) NOT NULL,
  `description` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=264 ;

--
-- Contenu de la table `liste_domaines`
--

INSERT INTO `liste_domaines` (`id`, `domaine`, `description`) VALUES
(1, 'ac', 'Ascension (ile)'),
(2, 'ad', 'Andorre'),
(3, 'ae', 'Emirats  Arabes Unis'),
(4, 'af', 'Afghanistan'),
(5, 'ag', 'Antigua et Barbuda'),
(6, 'ai', 'Anguilla'),
(7, 'al', 'Albanie'),
(8, 'am', 'Arménie'),
(9, 'an', 'Antilles Neerlandaises'),
(10, 'ao', 'Angola'),
(11, 'aq', 'Antarctique'),
(12, 'ar', 'Argentine'),
(13, 'as', 'American Samoa'),
(14, 'au', 'Australie'),
(15, 'aw', 'Aruba'),
(16, 'az', 'Azerbaijan'),
(17, 'ba', 'Bosnie Herzegovine'),
(18, 'bb', 'Barbade'),
(19, 'bd', 'Bangladesh'),
(20, 'be', 'Belgique'),
(21, 'bf', 'Burkina Faso'),
(22, 'bg', 'Bulgarie'),
(23, 'bh', 'Bahrain'),
(24, 'bi', 'Burundi'),
(25, 'bj', 'Benin'),
(26, 'bm', 'Bermudes'),
(27, 'bn', 'Brunei Darussalam'),
(28, 'bo', 'Bolivie'),
(29, 'br', 'Brésil'),
(30, 'bs', 'Bahamas'),
(31, 'bt', 'Bhoutan'),
(32, 'bv', 'Bouvet (ile)'),
(33, 'bw', 'Botswana'),
(34, 'by', 'Biélorussie'),
(35, 'bz', 'Bélize'),
(36, 'ca', 'Canada'),
(37, 'cc', 'Cocos (Keeling) iles'),
(38, 'cd', 'Congo, (République démocratique du)'),
(39, 'cf', 'Centrafricaine (République )'),
(40, 'cg', 'Congo'),
(41, 'ch', 'Suisse'),
(42, 'ci', 'Cote d''Ivoire'),
(43, 'ck', 'Cook (iles)'),
(44, 'cl', 'Chili'),
(45, 'cm', 'Cameroun'),
(46, 'cn', 'Chine'),
(47, 'co', 'Colombie'),
(48, 'cr', 'Costa Rica'),
(49, 'cu', 'Cuba'),
(50, 'cv', 'Cap Vert'),
(51, 'cx', 'Christmas (ile)'),
(52, 'cy', 'Chypre'),
(53, 'cz', 'Tchéque (République)'),
(54, 'de', 'Allemagne'),
(55, 'dj', 'Djibouti'),
(56, 'dk', 'Danemark'),
(57, 'dm', 'Dominique'),
(58, 'do', 'Dominicaine (république)'),
(59, 'dz', 'Algérie'),
(60, 'ec', 'Equateur'),
(61, 'ee', 'Estonie'),
(62, 'eg', 'Egypte'),
(63, 'eh', 'Sahara Occidental'),
(64, 'er', 'Erythrée'),
(65, 'es', 'Espagne'),
(66, 'et', 'Ethiopie'),
(67, 'fi', 'Finlande'),
(68, 'fj', 'Fiji'),
(69, 'fk', 'Falkland (Malouines) iles'),
(70, 'fm', 'Micronésie'),
(71, 'fo', 'Faroe (iles)'),
(72, 'fr', 'France'),
(73, 'ga', 'Gabon'),
(74, 'gd', 'Grenade'),
(75, 'ge', 'Géorgie'),
(76, 'gf', 'Guyane Française'),
(77, 'gg', 'Guernsey'),
(78, 'gh', 'Ghana'),
(79, 'gi', 'Gibraltar'),
(80, 'gl', 'Groenland'),
(81, 'gm', 'Gambie'),
(82, 'gn', 'Guinée'),
(83, 'gp', 'Guadeloupe'),
(84, 'gq', 'Guinée Equatoriale'),
(85, 'gr', 'Grèce'),
(86, 'gs', 'Georgie du sud et iles Sandwich du sud'),
(87, 'gt', 'Guatemala'),
(88, 'gu', 'Guam'),
(89, 'gw', 'Guinée-Bissau'),
(90, 'gy', 'Guyana'),
(91, 'hk', 'Hong Kong'),
(92, 'hm', 'Heard et McDonald (iles)'),
(93, 'hn', 'Honduras'),
(94, 'hr', 'Croatie'),
(95, 'ht', 'Haiti'),
(96, 'hu', 'Hongrie'),
(97, 'id', 'Indonésie'),
(98, 'ie', 'Irlande'),
(99, 'il', 'Israël'),
(100, 'im', 'Ile de Man'),
(101, 'in', 'Inde'),
(102, 'io', 'Territoire Britannique de l''Océan Indien'),
(103, 'iq', 'Iraq'),
(104, 'ir', 'Iran'),
(105, 'is', 'Islande'),
(106, 'it', 'Italie'),
(107, 'je', 'Jersey'),
(108, 'jm', 'Jamaïque'),
(109, 'jo', 'Jordanie'),
(110, 'jp', 'Japon'),
(111, 'ke', 'Kenya'),
(112, 'kg', 'Kirgizstan'),
(113, 'kh', 'Cambodge'),
(114, 'ki', 'Kiribati'),
(115, 'km', 'Comores'),
(116, 'kn', 'Saint Kitts et Nevis'),
(117, 'kp', 'Corée du nord'),
(118, 'kr', 'Corée du sud'),
(119, 'kw', 'Koweït'),
(120, 'ky', 'Caïmanes (iles)'),
(121, 'kz', 'Kazakhstan'),
(122, 'la', 'Laos'),
(123, 'lb', 'Liban'),
(124, 'lc', 'Sainte Lucie'),
(125, 'li', 'Liechtenstein'),
(126, 'lk', 'Sri Lanka'),
(127, 'lr', 'Liberia'),
(128, 'ls', 'Lesotho'),
(129, 'lt', 'Lituanie'),
(130, 'lu', 'Luxembourg'),
(131, 'lv', 'Latvia'),
(132, 'ly', 'Libyan Arab Jamahiriya'),
(133, 'ma', 'Maroc'),
(134, 'mc', 'Monaco'),
(135, 'md', 'Moldavie'),
(136, 'mg', 'Madagascar'),
(137, 'mh', 'Marshall (iles)'),
(138, 'mk', 'Macédoine'),
(139, 'ml', 'Mali'),
(140, 'mm', 'Myanmar'),
(141, 'mn', 'Mongolie'),
(142, 'mo', 'Macao'),
(143, 'mp', 'Mariannes du nord (iles)'),
(144, 'mq', 'Martinique'),
(145, 'mr', 'Mauritanie'),
(146, 'ms', 'Montserrat'),
(147, 'mt', 'Malte'),
(148, 'mu', 'Maurice (ile)'),
(149, 'mv', 'Maldives'),
(150, 'mw', 'Malawi'),
(151, 'mx', 'Mexique'),
(152, 'my', 'Malaisie'),
(153, 'mz', 'Mozambique'),
(154, 'na', 'Namibie'),
(155, 'nc', 'Nouvelle Calédonie'),
(156, 'ne', 'Niger'),
(157, 'nf', 'Norfolk (ile)'),
(158, 'ng', 'Nigéria'),
(159, 'ni', 'Nicaragua'),
(160, 'nl', 'Pays Bas'),
(161, 'no', 'Norvège'),
(162, 'np', 'Népal'),
(163, 'nr', 'Nauru'),
(164, 'nu', 'Niue'),
(165, 'nz', 'Nouvelle Zélande'),
(166, 'om', 'Oman'),
(167, 'pa', 'Panama'),
(168, 'pe', 'Pérou'),
(169, 'pf', 'Polynésie Française'),
(170, 'pg', 'Papouasie Nouvelle Guinée'),
(171, 'ph', 'Philippines'),
(172, 'pk', 'Pakistan'),
(173, 'pl', 'Pologne'),
(174, 'pm', 'St. Pierre et Miquelon'),
(175, 'pn', 'Pitcairn (ile)'),
(176, 'pr', 'Porto Rico'),
(177, 'pt', 'Portugal'),
(178, 'pw', 'Palau'),
(179, 'py', 'Paraguay'),
(180, 'qa', 'Qatar'),
(181, 're', 'Réunion (ile de la)'),
(182, 'ro', 'Roumanie'),
(183, 'ru', 'Russie'),
(184, 'rw', 'Rwanda'),
(185, 'sa', 'Arabie Saoudite'),
(186, 'sb', 'Salomon (iles)'),
(187, 'sc', 'Seychelles'),
(188, 'sd', 'Soudan'),
(189, 'se', 'Suède'),
(190, 'sg', 'Singapour'),
(191, 'sh', 'St. Hélène'),
(192, 'si', 'Slovénie'),
(193, 'sj', 'Svalbard et Jan Mayen (iles)'),
(194, 'sk', 'Slovaquie'),
(195, 'sl', 'Sierra Leone'),
(196, 'sm', 'Saint Marin'),
(197, 'sn', 'Sénégal'),
(198, 'so', 'Somalie'),
(199, 'sr', 'Suriname'),
(200, 'st', 'Sao Tome et Principe'),
(201, 'sv', 'Salvador'),
(202, 'sy', 'Syrie'),
(203, 'sz', 'Swaziland'),
(204, 'tc', 'Turks et Caïques (iles)'),
(205, 'td', 'Tchad'),
(206, 'tf', 'Territoires Français du sud'),
(207, 'tg', 'Togo'),
(208, 'th', 'Thailande'),
(209, 'tj', 'Tajikistan'),
(210, 'tk', 'Tokelau'),
(211, 'tm', 'Turkménistan'),
(212, 'tn', 'Tunisie'),
(213, 'to', 'Tonga'),
(214, 'tp', 'Timor Oriental'),
(215, 'tr', 'Turquie'),
(216, 'tt', 'Trinidad et Tobago'),
(217, 'tv', 'Tuvalu'),
(218, 'tw', 'Taiwan'),
(219, 'tz', 'Tanzanie'),
(220, 'ua', 'Ukraine'),
(221, 'ug', 'Ouganda'),
(222, 'uk', 'Royaume Uni'),
(223, 'gb', 'Royaume Uni'),
(224, 'um', 'US Minor Outlying (iles)'),
(225, 'us', 'Etats Unis'),
(226, 'uy', 'Uruguay'),
(227, 'uz', 'Ouzbékistan'),
(228, 'va', 'Vatican'),
(229, 'vc', 'Saint Vincent et les Grenadines'),
(230, 've', 'Venezuela'),
(231, 'vg', 'Vierges Britaniques (iles)'),
(232, 'vi', 'Vierges USA (iles)'),
(233, 'vn', 'Viêt Nam'),
(234, 'vu', 'Vanuatu'),
(235, 'wf', 'Wallis et Futuna (iles)'),
(236, 'ws', 'Western Samoa'),
(237, 'ye', 'Yemen'),
(238, 'yt', 'Mayotte'),
(239, 'yu', 'Yugoslavie'),
(240, 'za', 'Afrique du Sud'),
(241, 'zm', 'Zambie'),
(242, 'zr', 'Zaïre'),
(243, 'zw', 'Zimbabwe'),
(244, 'com', '.COM'),
(245, 'net', '.NET'),
(246, 'org', '.ORG'),
(247, 'edu', 'Education'),
(248, 'int', '.INT'),
(249, 'arpa', '.ARPA'),
(250, 'at', 'Autriche'),
(251, 'gov', 'Gouvernement'),
(252, 'mil', 'Miltaire'),
(253, 'su', 'Ex U.R.S.S.'),
(254, 'reverse', 'Reverse'),
(255, 'biz', 'Businesses'),
(256, 'info', '.INFO'),
(257, 'name', '.NAME'),
(258, 'pro', '.PRO'),
(259, 'coop', '.COOP'),
(260, 'aero', '.AERO'),
(261, 'museum', '.MUSEUM'),
(262, 'tv', '.TV'),
(263, 'ws', 'Web site');

-- --------------------------------------------------------

--
-- Structure de la table `opere`
--

CREATE TABLE IF NOT EXISTS `opere` (
  `id_operation` int(11) NOT NULL AUTO_INCREMENT,
  `id_vendeur` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `date_op` date DEFAULT NULL,
  `operation` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_operation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE IF NOT EXISTS `panier` (
  `code` varchar(24) NOT NULL,
  `id_acheteur` int(11) NOT NULL,
  `date` date NOT NULL,
  `Montant_global` int(11) NOT NULL,
  `num_transaction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`code`, `id_acheteur`, `date`, `Montant_global`, `num_transaction`) VALUES
('COMMANDE/1', 1, '2012-09-13', 475000, 556),
('COMMANDE/2', 2, '2012-09-13', 750000, 557),
('COMMANDE/3', 2, '2012-09-13', 54000, 558),
('COMMANDE/4', 1, '2012-09-13', 777000, 559),
('COMMANDE/5', 1, '2012-09-13', 750000, 560),
('COMMANDE/6', -1, '2012-09-14', 100000, 561),
('COMMANDE/7', -1, '2012-09-13', 54000, 563),
('COMMANDE/8', -1, '2012-09-16', 350000, 603),
('COMMANDE/9', 2, '2012-09-16', 350000, 604),
('COMMANDE/10', -1, '2012-09-20', 52000, 613),
('COMMANDE/11', 2, '2012-09-21', 45000, 614),
('COMMANDE/12', 2, '2012-09-21', 35000, 615),
('COMMANDE/13', 2, '2012-09-21', 35000, 616),
('COMMANDE/14', 2, '2012-09-21', 80000, 617),
('COMMANDE/15', 2, '2012-09-30', 80000, 623),
('COMMANDE/16', 2, '2012-09-30', 250000, 624),
('COMMANDE/17', -1, '2012-10-03', 300000, 626),
('COMMANDE/18', -1, '2012-10-06', 100000, 627),
('COMMANDE/19', 2, '2012-10-08', 12095005, 628),
('COMMANDE/20', -1, '2012-10-12', 150000, 629),
('COMMANDE/21', 2, '2012-10-24', 150000, 631);

-- --------------------------------------------------------

--
-- Structure de la table `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Partners') CHARACTER SET utf8 DEFAULT 'Partners',
  `Created` datetime DEFAULT NULL,
  `LastEdited` datetime DEFAULT NULL,
  `PartnerNumber` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `PartnerName` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `PartnerType` enum('Vendor','Customer','Employee') CHARACTER SET utf8 DEFAULT 'Customer',
  `Blocked` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `SearchTerm` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `Street` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `City` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `PostalCode` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `Region` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `Country` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `POBox` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `POCity` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `POPostalCode` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `PORegion` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `POCountry` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `ContactName` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `ContactPhone1` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `ContactEmail1` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `BusinessNumber` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `PaymentTerms` mediumtext CHARACTER SET utf8,
  `CreditAged` int(11) NOT NULL DEFAULT '0',
  `CreditLimit` decimal(9,2) NOT NULL DEFAULT '0.00',
  `ReviewDate` date DEFAULT NULL,
  `Comments` mediumtext CHARACTER SET utf8,
  `PartnersPageID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `PartnersPageID` (`PartnersPageID`),
  KEY `ClassName` (`ClassName`),
  KEY `PartnerNumber` (`PartnerNumber`),
  KEY `PartnerName` (`PartnerName`),
  KEY `SearchTerm` (`SearchTerm`),
  KEY `BusinessNumber` (`BusinessNumber`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id_photo` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` varchar(100) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `miniature` varchar(30) NOT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `photos`
--

INSERT INTO `photos` (`id_photo`, `id_produit`, `photo`, `miniature`) VALUES
(1, '1', '1347548892im1.jpg', 'mini_1347548892im1.jpg'),
(2, '2', '1347549098im1.jpg', 'mini_1347549098im1.jpg'),
(3, '3', '1347549289im1.jpg', 'mini_1347549289im1.jpg'),
(4, '3', '1347549290im2.jpg', 'mini_1347549290im2.jpg'),
(5, '4', '1347549955im1.jpg', 'mini_1347549955im1.jpg'),
(6, '5', '1347550026im1.jpg', 'mini_1347550026im1.jpg'),
(7, '6', '1347550230im1.jpg', 'mini_1347550230im1.jpg'),
(8, '7', '1347554145im1.png', 'mini_1347554145im1.png'),
(9, '8', '1348212611im1.jpg', 'mini_1348212611im1.jpg'),
(10, '9', '1348212675im1.jpg', 'mini_1348212675im1.jpg'),
(11, '10', '1348212733im1.jpg', 'mini_1348212733im1.jpg'),
(12, '11', '1348212789im1.jpg', 'mini_1348212789im1.jpg'),
(13, '12', '1349008698im1.jpg', 'mini_1349008698im1.jpg'),
(14, '13', '1349075889im1.bmp', 'mini_1349075889im1.bmp'),
(15, '14', '1349889046im1.jpg', 'mini_1349889046im1.jpg'),
(16, '15', '1351511218im1.jpg', 'mini_1351511218im1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `id_produit` varchar(100) NOT NULL,
  `id_vendeur` int(11) NOT NULL,
  `id_sous` int(11) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `caracteristique` varchar(50) DEFAULT NULL,
  `description` text,
  `etat_a` int(11) DEFAULT NULL,
  `date_de_cmd` datetime DEFAULT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `id_vendeur`, `id_sous`, `libelle`, `prix`, `quantite`, `caracteristique`, `description`, `etat_a`, `date_de_cmd`) VALUES
('1', 1, 1, 'Hp dv6007', 350000, 12, 'Mémoire ram 4 gb', 'Ordinateur portable de marque hp ;\r\nAnnée de sortie 2010;\r\nMémoire de stockage 500 gb;\r\nMémoire Ram : 4gb;\r\nMémoire Graphque 1ghz f', 1, '2012-09-13 15:08:12'),
('10', 1, 5, 'Lg disque dur externe 500 gb', 45000, 22, 'usb 2.0 , 500GB', 'disponible en 320 gb et en couleur noir,blanc rouge et bleue', 1, '2012-09-21 07:32:13'),
('11', 1, 5, 'Mac mini', 200000, 9, 'Ram 4gb', 'Mac mini dispose d''un systeme de stockage  interne de 250 gb avec une carte graphique gtxforce -549 demarque nvidia', 0, '2012-09-21 07:33:09'),
('12', 4, 5, 'MAC BOOCK', 50000, 11, '', '', 1, '2012-09-30 12:38:18'),
('13', 4, 5, '100 dvdr 4,7 gb', 10000, 3, '', '', 0, '2012-10-01 07:18:09'),
('14', 4, 7, 'hp escivo 90', 150000, 0, 'Voir le vendeur', '', 1, '2012-10-10 17:10:46'),
('15', 4, 10, 'clip', 1500, 15, 'aucun', 'aucune description sur le produit', 1, '2012-10-29 11:46:58'),
('2', 1, 1, 'U mac book pro 6', 7500000, 15, 'Ram 8gb', 'Ordinateur portable de marque apple\r\nMémoire de stockage 250 gb;\r\nMémoire Rame : 8gb;\r\nCarte graphique AMD gtforce 2 gb\r\nBatterie lyion cell 8 / 7 heur autonomie\r\nProcesseur 4*2,8 ghz', 1, '2012-09-13 15:11:38'),
('3', 1, 1, 'Hp beat version', 4500005, 10, 'Ram 4gbo', 'Ram 512 go ; processeur 1gb', 1, '2012-09-13 15:14:49'),
('4', 2, 9, 'Tunike Africain Dashiki', 25000, 7, 'Basin', '', 1, '2012-09-13 15:25:55'),
('5', 2, 9, 'Tunike Africain Ablavie', 27000, 9, 'Pagne', '', 0, '2012-09-13 15:27:06'),
('6', 3, 6, 'Nokia n95', 750000, 1, 'Mémoire interne 4 go', '', 0, '2012-09-13 15:30:30'),
('7', 1, 1, 'Imac Alu 800', 750000, 2, 'Ram 8gb', '', 0, '2012-09-13 16:35:45'),
('8', 1, 5, 'panasonic', 50000, 2, 'Zoom 10x , 15 megapixel', 'Mémoire interne de 10 gb .. Prise  hdmi', 0, '2012-09-21 07:30:11'),
('9', 1, 5, 'graveur samsung ', 35000, 8, 'Lecteur graveur dvd ', 'Lecteur grabeur DVD 24x', 1, '2012-09-21 07:31:15');

-- --------------------------------------------------------

--
-- Structure de la table `produit_de_commande`
--

CREATE TABLE IF NOT EXISTS `produit_de_commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(25) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite_pr` int(11) DEFAULT NULL,
  `cbr` varchar(24) NOT NULL,
  `etat_cbr` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `produit_de_commande`
--

INSERT INTO `produit_de_commande` (`id`, `code`, `id_produit`, `quantite_pr`, `cbr`, `etat_cbr`) VALUES
(1, 'COMMANDE/1', 4, 3, '', 0),
(2, 'COMMANDE/1', 3, 1, '', 0),
(3, 'COMMANDE/2', 6, 1, '', 0),
(4, 'COMMANDE/3', 5, 2, '', 0),
(5, 'COMMANDE/4', 5, 1, '', 0),
(6, 'COMMANDE/4', 2, 1, '', 0),
(7, 'COMMANDE/8', 1, 1, '', 0),
(8, 'COMMANDE/9', 1, 1, '', 0),
(9, 'COMMANDE/11', 10, 1, '', 0),
(10, 'COMMANDE/12', 9, 1, 'fVsXy5', 0),
(11, 'COMMANDE/13', 9, 1, 'RJ8F77', 0),
(12, 'COMMANDE/14', 10, 1, 'HIt6v8', 0),
(13, 'COMMANDE/14', 9, 1, 'HIt6v8', 0),
(14, 'COMMANDE/15', 10, 1, 'l4mU19', 0),
(15, 'COMMANDE/15', 9, 1, 'l4mU19', 0),
(16, 'COMMANDE/16', 12, 1, 'RiOaF10', 0),
(17, 'COMMANDE/16', 11, 1, 'RiOaF10', 0),
(18, 'COMMANDE/21', 14, 1, 'OMxLh11', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit_panier`
--

CREATE TABLE IF NOT EXISTS `produit_panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_panier` varchar(24) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `produit_panier`
--

INSERT INTO `produit_panier` (`id`, `id_produit`, `quantite`, `id_panier`) VALUES
(1, 4, 3, 'COMMANDE/1'),
(2, 3, 1, 'COMMANDE/1'),
(3, 6, 1, 'COMMANDE/2'),
(4, 5, 2, 'COMMANDE/3'),
(5, 5, 1, 'COMMANDE/4'),
(6, 2, 1, 'COMMANDE/4'),
(7, 3, 1, 'COMMANDE/5'),
(8, 1, 1, 'COMMANDE/5'),
(9, 4, 4, 'COMMANDE/6'),
(10, 5, 2, 'COMMANDE/7'),
(11, 1, 1, 'COMMANDE/8'),
(12, 1, 1, 'COMMANDE/9'),
(13, 4, 1, 'COMMANDE/10'),
(14, 5, 1, 'COMMANDE/10'),
(15, 10, 1, 'COMMANDE/11'),
(16, 9, 1, 'COMMANDE/12'),
(17, 9, 1, 'COMMANDE/13'),
(18, 10, 1, 'COMMANDE/14'),
(19, 9, 1, 'COMMANDE/14'),
(20, 10, 1, 'COMMANDE/15'),
(21, 9, 1, 'COMMANDE/15'),
(22, 12, 1, 'COMMANDE/16'),
(23, 11, 1, 'COMMANDE/16'),
(24, 12, 6, 'COMMANDE/17'),
(25, 12, 2, 'COMMANDE/18'),
(26, 12, 1, 'COMMANDE/19'),
(27, 10, 1, 'COMMANDE/19'),
(28, 3, 1, 'COMMANDE/19'),
(29, 2, 1, 'COMMANDE/19'),
(30, 12, 3, 'COMMANDE/20'),
(31, 14, 1, 'COMMANDE/21');

-- --------------------------------------------------------

--
-- Structure de la table `sous_categorie`
--

CREATE TABLE IF NOT EXISTS `sous_categorie` (
  `id_sous` int(11) NOT NULL AUTO_INCREMENT,
  `id_categorie` int(11) NOT NULL,
  `libelle_sous_categorie` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_sous`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `sous_categorie`
--

INSERT INTO `sous_categorie` (`id_sous`, `id_categorie`, `libelle_sous_categorie`) VALUES
(1, 1, 'Ordinateurs portable'),
(2, 1, 'Ordinateurs bureau'),
(3, 1, 'Souries usb'),
(4, 3, 'Autre'),
(5, 1, 'Autre'),
(6, 2, 'Portables Smartphone'),
(7, 2, 'Tablettes'),
(8, 3, 'Vestes'),
(9, 3, 'Chemises'),
(10, 4, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `statut` (
  `id_statut` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_statut` varchar(10) NOT NULL,
  PRIMARY KEY (`id_statut`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`id_statut`, `libelle_statut`) VALUES
(1, 'Non Pay'),
(2, 'Pay');

-- --------------------------------------------------------

--
-- Structure de la table `table`
--

CREATE TABLE IF NOT EXISTS `table` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(54) NOT NULL,
  `Email` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_vendeur`
--

CREATE TABLE IF NOT EXISTS `type_vendeur` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `somme` int(11) DEFAULT NULL,
  `notification` int(11) DEFAULT NULL,
  `libelle_type` varchar(50) DEFAULT NULL,
  `nb_max` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `type_vendeur`
--

INSERT INTO `type_vendeur` (`id_type`, `somme`, `notification`, `libelle_type`, `nb_max`) VALUES
(1, 10000, NULL, 'Normale', 10),
(2, 30000, NULL, 'Boutique', 50);

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

CREATE TABLE IF NOT EXISTS `vendeur` (
  `id_vendeur` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) NOT NULL,
  `nom_v` varchar(50) DEFAULT NULL,
  `date_c` date DEFAULT NULL,
  `etat_v` int(11) DEFAULT NULL,
  `passe_v` varchar(50) DEFAULT NULL,
  `numero_tel_v` varchar(20) DEFAULT NULL,
  `numero_mobil_v` varchar(20) DEFAULT NULL,
  `email_v` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_vendeur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `vendeur`
--

INSERT INTO `vendeur` (`id_vendeur`, `id_type`, `nom_v`, `date_c`, `etat_v`, `passe_v`, `numero_tel_v`, `numero_mobil_v`, `email_v`) VALUES
(1, 2, 'SAMIE SARL', '2012-09-13', 1, 'chocobiz', '22546756', '90896768', 'chocobiz@gmail.com'),
(2, 2, 'AVO-SAMIE', '2012-09-13', 1, 'avosatto', '22546756', '90896768', 'avo@gmail.com'),
(3, 2, 'SAMIE & FILS', '2012-09-13', 1, 'neacom', '22546756', '90896768', 'neacom@gmail.com'),
(4, 2, 'AFRICA - COM', '2012-09-30', 1, 'marcus', '91980171', '91980171', 'maros20@yahoo.fr'),
(5, 2, 'abalo', '2012-10-29', 1, 'abalo', '92035426', '91980175', 'abalo@yahoo.fr');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
