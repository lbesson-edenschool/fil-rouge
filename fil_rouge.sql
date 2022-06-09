-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 juin 2022 à 14:50
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fil_rouge`
--

-- --------------------------------------------------------

--
-- Structure de la table `cards_discover`
--

CREATE TABLE `cards_discover` (
  `id_discover` varchar(13) NOT NULL,
  `title_discover` varchar(100) NOT NULL,
  `id_content` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cards_discover`
--

INSERT INTO `cards_discover` (`id_discover`, `title_discover`, `id_content`) VALUES
('62616fa52abd9', 'Un geek boutonneux asocial ?', '624ecf8910bc5'),
('626171c0aa88f', 'Développeur, mais dans quel domaine ?', '62614a16c00d3'),
('628b7e8c05b35', 'Pas envie d’être derrière un bureau toute la journée ?', '628b7e8c04666'),
('628b7e981ee41', 'Peur de ne pas trouver d’emploi ?', '628b7e981dc19');

-- --------------------------------------------------------

--
-- Structure de la table `cards_school`
--

CREATE TABLE `cards_school` (
  `id_cards_school` varchar(13) NOT NULL,
  `title_school` varchar(100) NOT NULL,
  `img_path` varchar(100) NOT NULL,
  `id_content` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cards_school`
--

INSERT INTO `cards_school` (`id_cards_school`, `title_school`, `img_path`, `id_content`) VALUES
('628b7cd60c516', '42', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8d/42_Logo.svg/2048px-42_Logo.svg.png', '628b7cd60bada'),
('628b7e2f5eced', 'INSTIC', 'https://www.instic.fr/src/images/logo_INSTIC.jpg', '628b7e2f5dbfa'),
('628b7ebda0a49', 'Isitech', 'https://www.ecole-isitech.com/wp-content/uploads/2020/06/logo-isitech.png', '628b7ebd9f68a'),
('628b7eed0bb1f', '2ITech', 'https://www.2itechacademy.com/wp-content/uploads/2020/02/cropped-icone-web-2itech-v3-300x300.png', '628b7eed035c4'),
('628b7f9fa2be0', 'W3 Academy', 'https://3wa.fr/wp-content/uploads/2020/01/cropped-big.png', '628b7f9fa19bc'),
('628b802d5534d', 'EDEN School', 'https://www.edenschool.fr/wp-content/uploads/2017/01/logovert.png', '628b802d5427c');

-- --------------------------------------------------------

--
-- Structure de la table `content`
--

CREATE TABLE `content` (
  `id_content` varchar(13) NOT NULL,
  `content` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `content`
--

INSERT INTO `content` (`id_content`, `content`) VALUES
('624ecf8910bc4', 'aqzsxedc\'rfvthujyfjjtjdjhtghdtuhsrjwqjhsqfhtsfhf'),
('624ecf8910bc5', 'Non, la réalité en est loin ! Désormais, les compétences recherchées chez un développeur sont évidemment techniques, mais également humaines, de plus en plus d’entreprises préfèrent un développeur assez bon,  qui a de bonnes compétences humaines, qu’un excellent développeur, mais incapable de travailler en équipe, qui ne saut pas parler aux clients.'),
('624ecf8910bc6', 'azertyuiopqsdfghjklmwxcvbn'),
('62582dc7bd854', '2023 parce que on aura pas notre certif cette année ! On vas devoir revenir l\'année prochaine !'),
('6258336376746', 'Ecole 42 mais avec un 3 !'),
('625838515c0ec', 'C\'est nul !'),
('62614a16c00d3', 'Les développeurs peuvent se spécialiser dans des domaines spécifiques comme le web, les jeux vidéos, les logiciels, l\'intelligence artificielle et bien d’autres encore.'),
('62614b65ce760', '\r\nAujourd’hui, il existe des développeurs qui travaillent depuis chez eux, ou depuis n\'importe où, à condition d’avoir un PC et un accès internet !\r\nEn effet, certains développeurs sont employés par des entreprises en télétravail, ou même travaillent'),
('62616d0bf30d3', 'Spécialité et Formation:\r\nDéveloppeur intégrateur web (Diplôme Niveau 5)\r\nDesigner web (Diplôme Niveau 5)\r\nConcepteur développeur (Diplôme Niveau 6)\r\nConcepteur développeur en environnement objet (Diplôme Niveau 7)\r\nLead développeur (Diplôme Niveau 7'),
('626172d328d22', 'De nos jours, il y a de plus en plus d’utilisation du numérique dans la vie de tous les jours, par conséquent, la demande d’embauche dans ce domaine est en constante croissance.\r\n'),
('627cf92fcc0e8', 'Test modification content'),
('628b77bc7caa2', 'test'),
('628b77ce9717d', 'jhgfds'),
('628b79bb8e969', 'zoefozef'),
('628b79ddd7329', 'ioazefiohzeiof'),
('628b79eace324', 'ContentTEST'),
('628b7b768f20d', 'jhgfghj'),
('628b7be73033a', 'jhgfghj'),
('628b7beb893e1', 'aaaaa'),
('628b7c011f269', 'fff'),
('628b7c9eebaec', '42 mais avec un 3 !'),
('628b7cace4eda', 'fzefzef'),
('628b7cb3d10fc', '42 mais avec un 3 !'),
('628b7cd60bada', 'Spécialité et Formation:\n\nDéveloppeur Logiciel (Diplôme Niveau 6)\n\nExpert en Architecture Informatique (Diplôme Niveau 7)'),
('628b7dc1a7450', 'Spécialité et Formation:\nAssistant Développeur Web / Web Mobile \n(Diplôme Niveau 4)'),
('628b7e2f5dbfa', 'Spécialité et Formation:\n\nDéveloppeur Web / Web Mobile (Diplôme Niveau 5)\n\nConcepteur développeur d’applications (Diplôme Niveau 6)'),
('628b7e8c04666', 'Aujourd’hui, il existe des développeurs qui travaillent depuis chez eux, ou depuis n\'importe où, à condition d’avoir un PC et un accès internet !\r\nEn effet, certains développeurs sont employés par des entreprises en télétravail, ou même travaillent en freelance, c\'est-à-dire qu’ils sont appelés par des clients pour des missions temporaires, et donc sont libres de gérer leur planning !'),
('628b7e981dc19', 'De nos jours, il y a de plus en plus d’utilisation du numérique dans la vie de tous les jours, par conséquent, la demande d’embauche dans ce domaine est en constante croissance.'),
('628b7ebd9f68a', 'Spécialité et Formation:\n\nDéveloppeur Web / Web Mobile (Diplôme Niveau 5)\n\nConcepteur développeur d’applications (Diplôme Niveau 6)'),
('628b7eed035c4', 'Pas de description ...'),
('628b7f9fa19bc', 'Spécialité et Formation:\n\nDéveloppeur intégrateur web (Diplôme Niveau 5)\n\nDesigner web (Diplôme Niveau 5)\n\nConcepteur développeur (Diplôme Niveau 6)'),
('628b802d5427c', 'Spécialité et Formation:\r\n\r\nAssistant Développeur Web / Web Mobile \r\n\r\n(Diplôme Niveau 4)'),
('628dda8cc5051', 'Test modification contenue');

-- --------------------------------------------------------

--
-- Structure de la table `game_levels`
--

CREATE TABLE `game_levels` (
  `id_game` varchar(13) NOT NULL,
  `title_game` varchar(50) NOT NULL,
  `solution_game` varchar(100) NOT NULL,
  `id_content` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(13) NOT NULL,
  `login` varchar(35) NOT NULL,
  `password` varchar(180) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `login`, `password`, `created_at`, `updated_at`) VALUES
('624597f3c3791', 'admin', '*4ACFE3202A5FF5CF467898FC58AAB1D615029441', '2022-03-31 10:04:55', '2022-03-31 10:04:55'),
('628c8997a7aa6', 'ludo', '*59566802E6B1616DCEC08935FC0036EE04229EA8', '2022-05-24 05:30:39', '2022-05-24 05:30:39');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cards_discover`
--
ALTER TABLE `cards_discover`
  ADD PRIMARY KEY (`id_discover`),
  ADD KEY `id_content` (`id_content`);

--
-- Index pour la table `cards_school`
--
ALTER TABLE `cards_school`
  ADD PRIMARY KEY (`id_cards_school`),
  ADD KEY `id_content` (`id_content`);

--
-- Index pour la table `content`
--
ALTER TABLE `content`
  ADD KEY `id_content` (`id_content`,`content`),
  ADD KEY `content` (`content`);

--
-- Index pour la table `game_levels`
--
ALTER TABLE `game_levels`
  ADD PRIMARY KEY (`id_game`),
  ADD KEY `id_content` (`id_content`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cards_discover`
--
ALTER TABLE `cards_discover`
  ADD CONSTRAINT `cards_discover_ibfk_1` FOREIGN KEY (`id_content`) REFERENCES `content` (`id_content`);

--
-- Contraintes pour la table `cards_school`
--
ALTER TABLE `cards_school`
  ADD CONSTRAINT `cards_school_ibfk_2` FOREIGN KEY (`id_content`) REFERENCES `content` (`id_content`);

--
-- Contraintes pour la table `game_levels`
--
ALTER TABLE `game_levels`
  ADD CONSTRAINT `game_levels_ibfk_1` FOREIGN KEY (`id_content`) REFERENCES `content` (`id_content`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
