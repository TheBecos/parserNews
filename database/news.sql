-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 21 mars 2019 à 06:52
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `news`
--

-- --------------------------------------------------------

--
-- Структура таблицы `sources`
--

DROP TABLE IF EXISTS `sources`;
CREATE TABLE IF NOT EXISTS `sources` (
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`address`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `flux`
--

INSERT INTO `sources` (`address`) VALUES
('https://www.lemonde.fr/rss/une.xml');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `url` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(50) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `date_pub` date NOT NULL,
  `date_insertion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`url`, `title`, `description`, `categorie`, `date_pub`, `date_insertion`) VALUES
('https://www.lemonde.fr/sport/article/2019/03/20/court-succes-des-feminines-de-lyon-sur-wolfsbourg-en-ligue-des-champions_5438984_3242.html?xtor=RSS-3208', 'Court succès des féminines de Lyon sur Wolfsbourg en Ligue des champions', 'Cette confrontation réunissait les deux finalistes de l’année dernière. L’OL avait gagné à Kiev.', 'Aucune catégorie', '2019-03-20', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/international/article/2019/03/20/genocide-en-bosnie-radovan-karadzic-condamne-en-appel-a-la-prison-a-vie_5438880_3210.html?xtor=RSS-3208', 'Karadzic condamné en appel à la prison à vie pour génocide en Bosnie', 'L’ex-président des Serbes de Bosnie a été définitivement jugé coupable, mercredi, de génocide, crimes de guerre et crimes contre l’humanité.', 'Aucune catégorie', '2019-03-20', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/afrique/article/2019/03/20/c-est-comme-si-un-nouvel-ocean-s-etait-cree-a-l-interieur-du-mozambique_5438673_3212.html?xtor=RSS-3208', '« L’horrible réalité, c’est qu’il reste si peu de gens à sauver » : le Mozambique meurtri par des inondations', 'Le bilan du cyclone Idai s’alourdit en Afrique australe, qui doit faire face à des inondations catastrophiques.', 'Aucune catégorie', '2019-03-20', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/international/article/2019/03/20/guatemala-mandat-d-arret-contre-une-ex-juge-anticorruption-et-candidate-a-la-presidence_5438927_3210.html?xtor=RSS-3208', 'Au Guatemala, mandat d’arrêt contre une ex-juge anticorruption et candidate à la présidence', 'Lorsqu’elle était procureure générale du pays, Thelma Aldana a fait tomber l’ex-président Otto Pérez, avant de s’attaquer au président actuel, Jimmy Morales.', 'Aucune catégorie', '2019-03-20', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/planete/article/2019/03/20/les-oublies-de-l-eau-se-comptent-par-centaines-de-millions_5438893_3244.html?xtor=RSS-3208', 'Plus de 800 millions d’humains privés d’eau potable', 'Les Nations unies dressent un tableau alarmant de l’accès à l’eau potable dans son rapport 2019. En 2015, six humains sur dix ne disposaient pas de toilettes ou équivalent.', 'Aucune catégorie', '2019-03-20', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/culture/article/2019/03/21/le-prix-nomura-gros-lot-de-l-art-contemporain_5438995_3246.html?xtor=RSS-3208', 'Le prix Nomura, gros lot de l’art contemporain', 'Le premier lauréat de ce prix, créé par une banque d’affaires japonaise et doté d’un million de dollars, sera annoncé en octobre.', 'Aucune catégorie', '2019-03-21', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/police-justice/article/2019/03/20/les-militaires-de-sentinelle-seront-mobilises-pour-l-acte-xix-des-gilets-jaunes_5438862_1653578.html?xtor=RSS-3208', 'Les militaires de Sentinelle seront mobilisés pour l’acte XIX des « gilets jaunes »', 'Si ce n’est pas la première fois que des soldats sont appelés en renfort dans le cadre d’un rassemblement, la communication du gouvernement crée un effet d’annonce.', 'Aucune catégorie', '2019-03-20', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/international/article/2019/03/20/face-a-bolsonaro-la-resistance-des-sans-toit_5438898_3210.html?xtor=RSS-3208', '« Notre seule arme, c’est la parole » : face à Bolsonaro, la résistance des sans-toit', 'Au Brésil, des milliers de familles occupent des immeubles vides à Sao Paulo. Des « terroristes » aux yeux du président.', 'Aucune catégorie', '2019-03-20', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/pixels/article/2019/03/20/stadia-les-zones-d-ombre-du-projet-de-plate-forme-de-jeu-video-de-google_5438943_4408996.html?xtor=RSS-3208', 'Les zones d’ombre du projet de plate-forme de jeu vidéo Stadia de Google', 'Le géant du Web a levé le voile sur sa future plate-forme de jeu vidéo à la demande. Sans répondre aux questions sur son modèle économique.', 'Aucune catégorie', '2019-03-20', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/international/article/2019/03/21/italie-massacre-evite-de-justesse-pour-51-collegiens-pris-en-otage_5438987_3210.html?xtor=RSS-3208', 'En Italie, un massacre évité de justesse pour 51 collégiens pris en otages', 'Un chauffeur de bus a menacé de mort les adolescents, invoquant le sort des migrants disparus en Méditerrannée pour expliquer son geste.', 'Aucune catégorie', '2019-03-21', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/les-decodeurs/article/2019/03/20/combien-y-a-t-il-d-immigrants-et-de-demandeurs-d-asile-en-france-et-en-europe_5438852_4355770.html?xtor=RSS-3208', 'Combien y a-t-il d’immigrants et de demandeurs d’asile en France et en Europe ?', 'La gestion des flux migratoires est un thème de prédilection de la droite et de l’extrême droite pour les élections européennes.', 'Aucune catégorie', '2019-03-20', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/international/article/2019/03/21/nicaragua-le-gouvernement-va-liberer-tous-les-opposants_5438992_3210.html?xtor=RSS-3208', 'Nicaragua : le gouvernement va libérer tous les opposants', 'Un peu plus de 800 opposants arrêtés lors des manifestations sont emprisonnés. Ils doivent être libérés sous 90 jours.', 'Aucune catégorie', '2019-03-21', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/societe/article/2019/03/21/au-proces-tapie-stephane-richard-defend-la-decision-politique-d-entrer-en-arbitrage_5439051_3224.html?xtor=RSS-3208', 'Au procès Tapie, Stéphane Richard défend la « décision politique » d’entrer en arbitrage', 'Le PDG d’Orange Stéphane Richard a cantonné mercredi son rôle à celui « d’exécutant » des décisions de l’ex-ministre Christine Lagarde dont il était le directeur de cabinet à Bercy.', 'Aucune catégorie', '2019-03-21', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/international/article/2019/03/21/brexit-bruxelles-et-londres-jouent-desormais-a-un-jeu-dangereux_5439016_3210.html?xtor=RSS-3208', 'Brexit : Bruxelles et Londres jouent désormais à un jeu dangereux', 'A mesure que se rapproche l’échéance du 29 mars, les tractations sont de plus en plus difficiles à suivre. Jeu de poker menteur ? Risque assumé d’un « no deal » ? Ou bluff insistant ?', 'Aucune catégorie', '2019-03-21', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/international/article/2019/03/21/la-nouvelle-zelande-interdit-les-fusils-d-assaut_5439004_3210.html?xtor=RSS-3208', 'Après l’attaque de Christchurch, la Nouvelle-Zélande interdit les fusils d’assaut', 'La première ministre Jacinda Ardern a annoncé jeudi que le pays va interdire la vente de fusils d’assaut et d’armes semi-automatiques de style militaire.', 'Aucune catégorie', '2019-03-21', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/police-justice/article/2019/03/20/alexandre-benalla-de-nouveau-mis-en-examen-notamment-dans-l-affaire-du-selfie-arme_5438981_1653578.html?xtor=RSS-3208', 'Alexandre Benalla de nouveau mis en examen dans l’affaire du « selfie armé »', 'L’ancien collaborateur de l’Elysée a aussi été mis en examen pour des violences au Jardin des plantes, à Paris, en marge des manifestations du 1er mai 2018.', 'Aucune catégorie', '2019-03-20', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/international/article/2019/03/21/le-denigrement-de-l-ancien-senateur-john-mccain-tourne-a-l-obsession-chez-donald-trump_5438990_3210.html?xtor=RSS-3208', 'Le dénigrement de l’ancien sénateur John McCain tourne à l’obsession chez Donald Trump', 'Le président américain est revenu à la charge contre le défunt sénateur républicain John McCain, mort d’un cancer il y a sept mois et déjà victime de ses foudres au cours du week-end.', 'Aucune catégorie', '2019-03-21', '2019-03-21 06:16:12'),
('https://www.lemonde.fr/international/article/2019/03/21/union-europeenne-orban-suspendu-la-famille-du-ppe-reunie_5439017_3210.html?xtor=RSS-3208', 'Union européenne : Orban suspendu, la famille du PPE réunie', 'La droite européenne a renoncé à exclure le Fidesz, qui est placé sous surveillance. Une solution de compromis à quelques semaines des élections de la fin mai.', 'Aucune catégorie', '2019-03-21', '2019-03-21 06:16:12');

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

DROP TABLE IF EXISTS `parametre`;
CREATE TABLE IF NOT EXISTS `parametre` (
  `nom` varchar(42) COLLATE utf8_unicode_ci NOT NULL,
  `valeur` varchar(42) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `parametre`
--

INSERT INTO `parametre` (`nom`, `valeur`) VALUES
('nbNewsParPage', '10');

-- --------------------------------------------------------

--
-- Structure de la table `tadmin`
--

DROP TABLE IF EXISTS `tadmin`;
CREATE TABLE IF NOT EXISTS `tadmin` (
  `login` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `tadmin`
--

INSERT INTO `tadmin` (`login`, `password`) VALUES
('admin', '$2y$10$PmtUC9TyybshYph8V5oSKumBnGp.vkv55eWI873aqsmuj5HfsNBq.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
