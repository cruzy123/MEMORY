-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 11 nov. 2021 à 16:38
-- Version du serveur : 8.0.26
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sysges`
--

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `dem_id` int NOT NULL,
  `dem_em_id` int NOT NULL,
  `dem_doc_id` int NOT NULL,
  `dem_statut` int DEFAULT '2',
  `dem_creation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `demandes`
--

INSERT INTO `demandes` (`dem_id`, `dem_em_id`, `dem_doc_id`, `dem_statut`, `dem_creation_date`) VALUES
(1, 1, 1, 2, '2021-11-09');

-- --------------------------------------------------------

--
-- Structure de la table `demandes_infos`
--

CREATE TABLE `demandes_infos` (
  `deminfo_id` int NOT NULL,
  `deminfo_dem_id` int NOT NULL,
  `deminfo_info_id` int NOT NULL,
  `deminfo_value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `demandes_infos`
--

INSERT INTO `demandes_infos` (`deminfo_id`, `deminfo_dem_id`, `deminfo_info_id`, `deminfo_value`) VALUES
(1, 1, 1, 'Lettre.pdf'),
(2, 1, 2, '20 jours');

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `doc_id` int NOT NULL,
  `doc_libelle` varchar(255) NOT NULL,
  `doc_description` text,
  `doc_cout` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`doc_id`, `doc_libelle`, `doc_description`, `doc_cout`) VALUES
(1, 'Demande d\'absence', 'Un document fourni dans le cadre d\'une demande d\'absence', NULL),
(6, 'Ut laborum Alias ut', 'Non sed dolorum rem', NULL),
(7, 'Explicabo Rerum con', 'Adipisicing dolor pr', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `em_id` int NOT NULL,
  `em_nom` varchar(255) NOT NULL,
  `em_prenoms` varchar(255) NOT NULL,
  `em_date_naissance` date NOT NULL,
  `em_sexe` varchar(10) NOT NULL,
  `em_poste` varchar(255) NOT NULL,
  `em_contact` varchar(255) DEFAULT NULL,
  `em_email` varchar(255) DEFAULT NULL,
  `em_statut` tinyint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`em_id`, `em_nom`, `em_prenoms`, `em_date_naissance`, `em_sexe`, `em_poste`, `em_contact`, `em_email`, `em_statut`) VALUES
(1, 'John', 'Doe', '1980-11-07', 'Homme', 'Gardien', '99887766', 'johndoe@gmail.com', 1),
(3, 'Fire', 'God Nezha', '1200-05-12', 'Homme', 'DEV', '22962202824', 'nezh@is.god', NULL),
(4, 'zyfe@mailinator.com', 'Aut ut necessitatibu', '2021-03-20', 'Femme', 'Porro Nam deserunt d', 'Eum enim doloribus i', 'lixy@mailinator.com', NULL),
(5, 'Ao', 'Bing', '1990-03-15', 'Homme', 'Admin', '22962202824', 'admin@admin.com', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `infos`
--

CREATE TABLE `infos` (
  `info_id` int NOT NULL,
  `info_doc_id` int NOT NULL,
  `info_doc_type` enum('Fichier','Information') NOT NULL,
  `info_libelle` varchar(255) NOT NULL,
  `info_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `infos`
--

INSERT INTO `infos` (`info_id`, `info_doc_id`, `info_doc_type`, `info_libelle`, `info_description`) VALUES
(1, 1, 'Fichier', 'Lettre manuscrite pour la demande', NULL),
(2, 1, 'Information', 'Durée de l\'absence', NULL),
(54, 6, 'Fichier', 'Rerum inventore dolo', NULL),
(55, 6, 'Fichier', 'Rerum dolor unde qua', NULL),
(56, 6, 'Information', 'Dolores modi id par', NULL),
(57, 6, 'Information', 'Voluptatem Officia', NULL),
(58, 6, 'Fichier', 'Rerum inventore dolo', NULL),
(59, 6, 'Fichier', 'Rerum dolor unde qua', NULL),
(60, 6, 'Information', 'Dolores modi id par', NULL),
(61, 6, 'Information', 'Voluptatem Officia', NULL),
(62, 7, 'Information', 'Similique illo sed s', NULL),
(63, 7, 'Fichier', 'Laborum Voluptatem', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_em_id` int NOT NULL,
  `user_role` tinyint NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_flag` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_em_id`, `user_role`, `user_password`, `user_flag`) VALUES
(1, 1, 0, '$2ezsrdtrfyuhijihugyutc', 1),
(2, 3, 1, '$2y$10$qG2c/XIr9pMxad9.lNZxrelIw66htSrO6st5lroWV9oHdCsIxeXJa', 1),
(3, 4, 0, '$2y$10$wrrlpSz.wdkA.dhtW/bawe.mLW9N1FKffxaC/YAa2kdM4nRkQnEsO', 1),
(4, 5, 0, '$2y$10$xPEOjxwhW.R0JzazEy7.zu/TissdH4DgzRWV6BJXC.XWVcHyR0Y8K', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`dem_id`);

--
-- Index pour la table `demandes_infos`
--
ALTER TABLE `demandes_infos`
  ADD PRIMARY KEY (`deminfo_id`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`doc_id`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`em_id`);

--
-- Index pour la table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`info_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `dem_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `demandes_infos`
--
ALTER TABLE `demandes_infos`
  MODIFY `deminfo_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `doc_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `em_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `infos`
--
ALTER TABLE `infos`
  MODIFY `info_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
