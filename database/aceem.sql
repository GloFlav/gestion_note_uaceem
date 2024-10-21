-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 sep. 2024 à 13:59
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aceem`
--

-- --------------------------------------------------------

--
-- Structure de la table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `candidats`
--

CREATE TABLE `candidats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mention_id` bigint(20) UNSIGNED DEFAULT NULL,
  `serie_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `num_bacc` varchar(255) NOT NULL,
  `anne_bacc` year(4) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `num_conc` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `preuve_bacc` varchar(255) DEFAULT NULL,
  `status` enum('admis','recalé') DEFAULT NULL,
  `ref_mvola` varchar(255) DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `mode_inscription` enum('local','en_ligne') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `vagues_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `candidats`
--

INSERT INTO `candidats` (`id`, `mention_id`, `serie_id`, `nom`, `num_bacc`, `anne_bacc`, `tel`, `num_conc`, `email`, `preuve_bacc`, `status`, `ref_mvola`, `commentaire`, `mode_inscription`, `created_at`, `updated_at`, `deleted_at`, `vagues_id`) VALUES
(1, 6, 3, 'RATOVOARIVONY Ainanirina Sabrino', '78961330', '2024', '0388922781', '001/ConcIE/IèA/24-25', 'sabrino@gmail.com', NULL, 'admis', NULL, NULL, 'local', '2024-09-05 05:37:30', '2024-09-05 05:46:39', NULL, 1),
(2, 6, 3, 'Voavison Binea', '1564313', '2024', '0342458915', '001/ConcIE/IèA/24-25', 'voavisonbinea@gmail.com', NULL, 'admis', NULL, NULL, 'local', '2024-09-09 08:18:58', '2024-09-09 09:10:35', NULL, 2),
(4, 6, 3, 'John Doe', '4567612', '2024', '0344312449', '002/ConcIE/IèA/24-25', 'john@gmail.com', NULL, 'admis', NULL, NULL, 'local', '2024-09-09 10:13:40', '2024-09-09 10:14:47', NULL, 2),
(5, 6, 3, 'Voavy Paulin', '876132160', '2024', '0346490580', '003/ConcIE/IèA/24-25', 'voavy@gmail.com', NULL, 'admis', NULL, NULL, 'local', '2024-09-09 10:24:11', '2024-09-09 10:28:35', NULL, 2),
(6, 3, 4, 'Henri VE', '87613217', '2024', '0344312447', '001/ConcSS/IèA/24-25', 'henri@gmail.com', NULL, 'admis', NULL, NULL, 'local', '2024-09-10 03:55:37', '2024-09-10 04:01:01', NULL, 2),
(7, 6, 2, 'Desiré Noel', '12345678', '2024', '0332589741', '004/ConcIE/IèA/24-25', 'desire@gmail.com', NULL, 'admis', NULL, NULL, 'local', '2024-09-10 04:08:46', '2024-09-10 04:13:15', NULL, 2),
(8, 6, 2, 'Berthrand Aristide', '45676129', '2024', '0344312445', '005/ConcIE/IèA/24-25', NULL, NULL, NULL, NULL, NULL, 'local', '2024-09-11 05:15:10', '2024-09-11 05:15:10', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `concours`
--

CREATE TABLE `concours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `concours`
--

INSERT INTO `concours` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Concours d\'entrer en L1', '2024-09-05 05:27:14', '2024-09-05 05:27:14');

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `matricule` varchar(255) NOT NULL,
  `sexe` enum('M','F') NOT NULL,
  `date_nais` date NOT NULL,
  `lieu_nais` varchar(255) NOT NULL,
  `situation_matri` enum('celibataire','marier','autre') NOT NULL DEFAULT 'celibataire',
  `num_cin` varchar(255) NOT NULL,
  `date_cin` date NOT NULL,
  `lieu_cin` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `quartier` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `etablissement_origine` varchar(255) NOT NULL,
  `email_parent` varchar(255) DEFAULT NULL,
  `nom_parent` varchar(255) NOT NULL,
  `adresse_parent` varchar(255) NOT NULL,
  `profession_parent` varchar(255) NOT NULL,
  `tel_parent` varchar(255) NOT NULL,
  `num_mvola` varchar(255) DEFAULT NULL,
  `province_parent` varchar(255) DEFAULT NULL,
  `nom_parent_2` varchar(255) DEFAULT NULL,
  `profession_parent_2` varchar(255) DEFAULT NULL,
  `tel_parent_2` varchar(255) DEFAULT NULL,
  `centre_interet` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_changed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `candidat_id`, `photo`, `matricule`, `sexe`, `date_nais`, `lieu_nais`, `situation_matri`, `num_cin`, `date_cin`, `lieu_cin`, `adresse`, `quartier`, `facebook`, `etablissement_origine`, `email_parent`, `nom_parent`, `adresse_parent`, `profession_parent`, `tel_parent`, `num_mvola`, `province_parent`, `nom_parent_2`, `profession_parent_2`, `tel_parent_2`, `centre_interet`, `password`, `username`, `password_changed`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'photos/rBHS9fKr7DOM2hmYGynBbFQlhHCVq91MJo0gfKik.jpg', '1', 'M', '2000-12-15', 'Antananarivo', 'celibataire', '201011028960', '2019-01-09', 'Fianarantsoa', 'Lot 266A/3710', '67HA', 'sabrino Lp', 'Collège Saint François Xavier Ambatomena', NULL, 'RATOVOARIVONY Guillaume Marie Germain', 'Lot 244D/7890', 'Directeur de Bank Of Africa', '0343101807', NULL, 'Fianarantsoa', NULL, NULL, NULL, 'Dance, TikTok, Lire, Parkour', '$2y$12$Lj.mDNp72eK0/kt/2PmRVuf8aX7ZH0Lb1Zql.IHqjz5vAB9HHGf1m', 'sabrino', 0, '2024-09-05 05:46:43', '2024-09-05 05:46:43', NULL),
(2, 2, NULL, '2', 'M', '2004-06-08', 'Antananarivo', 'celibataire', '201468455987', '2019-11-21', 'Fianarantsoa', 'Lot 266A/3710', 'Ambohipo', 'voavy binea', 'Collège Saint Michelle Mahamasina', 'example@gmail.com', 'RATOVOARIVONY Andoniaina', 'Lot 2584C/7890', 'Secretaire', '0332578945', '0345897458', 'Antananarivo', 'Andriantefy Tsanta', 'Secretaire', '0332598945', 'Dance, TikTok, Lire, Ecrire', '$2y$12$j1XJhyTZSLYKwZWMTuJzjuJHtNPsws/SKvkeZ2o5H3GjbzKA/.82e', 'binea', 0, '2024-09-09 09:43:12', '2024-09-09 09:43:12', NULL),
(3, 4, NULL, '3', 'M', '2004-04-11', 'Fianarantsoa', 'celibataire', '024897561564', '2019-06-12', 'Fianarantsoa', 'Lot 266A/3712', 'Ankadifotsy', NULL, 'Collège Saint Michelle Mahamasina', NULL, 'RATOVOARIVONY Jean', 'Lot 2584C/7894', 'Directeur de BOA', '0332577945', NULL, 'Fianarantsoa', NULL, NULL, NULL, 'Dance, TikTok, Lire', '$2y$12$81/O/FG1Pg3nJAfhDC3e1.M5OcBdQ8G9axelUnKVeEp3806dMeuyi', 'john', 0, '2024-09-09 10:17:00', '2024-09-09 10:17:00', NULL),
(4, 5, 'photos/jc8UWFFKHHziAQrjd2Niv8cJbar366nXbyE0CrS8.jpg', '4', 'M', '2002-05-07', 'Antananarivo', 'celibataire', '201460455987', '2020-05-16', 'Antananarivo', 'Lot 265A/3712', 'Andavamamba', NULL, 'Collège Saint François Xavier Ambatomena', NULL, 'RATOVOARIVONY Voavy', 'Lot 2574C/7890', 'Directeur de BNI', '0332778945', NULL, 'Antananarivo', NULL, NULL, NULL, 'Dance, Lire', '$2y$12$f6FBeGULFYkecXq.7isF3edAM/jMFaUq8HFscPU88czJXOg4.zGai', 'voavy', 0, '2024-09-09 10:28:40', '2024-09-09 10:28:40', NULL),
(5, 6, NULL, '5', 'M', '2002-03-10', 'Fianarantsoa', 'celibataire', '201498455987', '2020-03-11', 'Fianarantsoa', 'Lot 266A/3719', '-- Sélectionner --', 'henri VE', 'Collège Saint François Xavier Ambatomena', NULL, 'RATOVOARIVONY Henri', 'Lot 2584C/7898', 'Directeur de BOA', '0332577445', NULL, '-- Sélectionner --', NULL, NULL, NULL, 'Lire', '$2y$12$IeBrgRofXrqMJOOYRBtClOmidg4st9w4anfjvDpOxrZmO2DhK4NZ.', 'henri', 0, '2024-09-10 04:01:02', '2024-09-10 04:01:02', NULL),
(6, 7, 'photos/IwiLm3YrO3T4xjCkxELnFJDt5AoC1Gp12ZQgaZ6z.jpg', '6', 'M', '2003-07-10', 'Antananarivo', 'celibataire', '024897561567', '2019-02-16', 'Antananarivo', 'Lot 266A/3718', 'Anosizato', NULL, 'Collège Saint François Xavier Ambatomena', NULL, 'RATOVOARIVONY Desiré', 'Lot 2584C/7899', 'Directeur de BFV', '0332587945', NULL, 'Antananarivo', NULL, NULL, NULL, 'Dance, TikTok, Lire, Parkour, Dormir', '$2y$12$FqcNaKjraPxEnCj4bgJVYusIwnkIeEOVvtPR.31XA8KsYqo37wkgC', 'desiré', 1, '2024-09-10 04:13:17', '2024-09-10 04:13:17', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `groupes`
--

CREATE TABLE `groupes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `design` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `niveaux_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `groupes`
--

INSERT INTO `groupes` (`id`, `design`, `description`, `niveaux_id`, `created_at`, `updated_at`) VALUES
(2, 'C1', 'Communication groupe 01', 4, '2024-09-11 02:59:40', '2024-09-11 03:04:17'),
(3, 'D1', 'Droit 01', 5, '2024-09-12 03:51:20', '2024-09-12 03:51:20');

-- --------------------------------------------------------

--
-- Structure de la table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matricules`
--

CREATE TABLE `matricules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `etudiant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `design` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matricules`
--

INSERT INTO `matricules` (`id`, `candidat_id`, `etudiant_id`, `design`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '001/IE/IèA', '2024-09-04 08:34:44', '2024-09-04 08:41:28'),
(2, 2, 2, '002/IE/IèA', '2024-09-09 09:12:13', '2024-09-09 09:43:13'),
(3, 4, 3, '003/IE/IèA', '2024-09-09 10:14:58', '2024-09-09 10:17:00'),
(4, 5, 4, '004/IE/IèA', '2024-09-09 10:25:25', '2024-09-09 10:28:41'),
(5, 6, 5, '001/SS/IèA', '2024-09-10 03:57:07', '2024-09-10 04:01:02'),
(6, 7, 6, '005/IE/IèA', '2024-09-10 04:10:53', '2024-09-10 04:13:17');

-- --------------------------------------------------------

--
-- Structure de la table `mentions`
--

CREATE TABLE `mentions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `design` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mentions`
--

INSERT INTO `mentions` (`id`, `design`, `code`, `created_at`, `updated_at`, `deleted_at`, `description`) VALUES
(1, 'COMMUNICATION', 'COM', '2024-08-21 16:04:39', '2024-08-21 16:04:39', NULL, 'Communication'),
(2, 'DROIT & SCIENCE POLITIQUE', 'DT', '2024-08-21 16:05:41', '2024-08-21 16:15:17', NULL, 'Droit'),
(3, 'SCIENCE DE LA SANTE', 'SS', '2024-08-21 16:08:21', '2024-08-21 16:14:55', NULL, 'Science de la santé'),
(4, 'SCIENCE ECONOMIQUE & ETUDE DU DEVELOPPEMENT', 'ECO', '2024-08-21 16:11:36', '2024-08-21 16:17:53', NULL, 'Science Economique et Etude du Développement'),
(5, 'GESTION', 'GE', '2024-08-21 16:14:41', '2024-08-21 16:14:41', NULL, 'Gestion'),
(6, 'INFORMATIQUE & ELECTRONIQUE', 'IE', '2024-08-21 16:16:12', '2024-08-21 16:16:12', NULL, 'Informatique et Electronique');

-- --------------------------------------------------------

--
-- Structure de la table `mention_serie`
--

CREATE TABLE `mention_serie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serie_id` bigint(20) UNSIGNED NOT NULL,
  `mention_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mention_serie`
--

INSERT INTO `mention_serie` (`id`, `serie_id`, `mention_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 1, 2, NULL, NULL),
(8, 2, 2, NULL, NULL),
(9, 2, 3, NULL, NULL),
(10, 3, 3, NULL, NULL),
(11, 4, 3, NULL, NULL),
(12, 2, 4, NULL, NULL),
(13, 3, 4, NULL, NULL),
(14, 5, 4, NULL, NULL),
(15, 1, 5, NULL, NULL),
(16, 2, 5, NULL, NULL),
(17, 3, 5, NULL, NULL),
(18, 4, 5, NULL, NULL),
(19, 5, 5, NULL, NULL),
(20, 6, 5, NULL, NULL),
(21, 2, 6, NULL, NULL),
(22, 3, 6, NULL, NULL),
(23, 5, 6, NULL, NULL),
(24, 6, 6, NULL, NULL),
(25, 5, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_07_25_060305_create_mentions_table', 1),
(5, '2024_07_25_060531_create_series_table', 1),
(7, '2024_07_25_061201_create_etudiants_table', 1),
(8, '2024_07_25_061202_create_utilisateurs_table', 1),
(9, '2024_07_25_061203_create_payements_table', 1),
(10, '2024_07_29_075649_alter_utilisateur', 1),
(11, '2024_07_30_101133_create_mention_serie_table', 1),
(13, '2024_08_06_072023_alter_mention_table', 1),
(14, '2024_08_06_074052_create_parcours_table', 1),
(15, '2024_08_06_104521_create_niveaux_table', 1),
(16, '2024_08_14_100321_create_matricules_table', 1),
(18, '2024_08_16_130950_alter_payement_table', 1),
(20, '2024_07_31_104302_create_vagues_table', 2),
(21, '2024_08_16_130655_create_concours_table', 2),
(23, '2024_08_30_110130_alter_vagues_table', 3),
(25, '2024_07_25_060533_create_candidats_table', 4),
(26, '2024_08_21_085351_alter_candidat_table', 4),
(27, '2024_09_06_055034_add_vague_status', 5),
(28, '2024_09_10_104556_create_groupes_table', 5),
(29, '2024_09_10_105819_create_sous_groupes_table', 5);

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

CREATE TABLE `niveaux` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `design` enum('L1','L2','L3','M1','M2') NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `parcours_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niveaux`
--

INSERT INTO `niveaux` (`id`, `design`, `description`, `parcours_id`, `created_at`, `updated_at`) VALUES
(4, 'L1', NULL, 1, '2024-09-10 09:50:49', '2024-09-10 09:50:49'),
(5, 'L1', NULL, 2, '2024-09-12 03:50:46', '2024-09-12 03:50:46');

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE `parcours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `design` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `mention_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parcours`
--

INSERT INTO `parcours` (`id`, `design`, `description`, `mention_id`, `created_at`, `updated_at`) VALUES
(1, 'COMMUNICATION', 'Communication', 1, '2024-09-10 09:26:41', '2024-09-10 09:26:41'),
(2, 'DROIT', 'Droit', 2, '2024-09-10 09:27:05', '2024-09-10 09:27:05');

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `payements`
--

CREATE TABLE `payements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `utilisateur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `etudiant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `montant` decimal(10,2) NOT NULL,
  `mode` enum('espece','mvola') NOT NULL,
  `reference` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `candidat_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `payements`
--

INSERT INTO `payements` (`id`, `utilisateur_id`, `etudiant_id`, `date`, `type`, `montant`, `mode`, `reference`, `created_at`, `updated_at`, `commentaire`, `candidat_id`) VALUES
(1, NULL, NULL, '2024-09-04', 'concours', 50000.00, 'espece', 'ref-018', '2024-09-04 08:34:10', '2024-09-05 05:44:19', NULL, 1),
(2, NULL, NULL, '2024-09-09', 'concours salon', 25000.00, 'espece', 'ref-012', '2024-09-09 09:09:35', '2024-09-09 09:09:35', NULL, 2),
(3, NULL, NULL, '2024-09-09', 'concours', 50000.00, 'espece', 'ref-011', '2024-09-09 10:14:29', '2024-09-09 10:14:29', NULL, 4),
(4, NULL, NULL, '2024-09-09', 'concours salon', 25000.00, 'espece', 'ref-0149', '2024-09-09 10:24:47', '2024-09-09 10:24:47', NULL, 5),
(5, NULL, NULL, '2024-09-10', 'concours', 50000.00, 'espece', 'ref-0201', '2024-09-10 03:56:30', '2024-09-10 03:56:30', NULL, 6),
(6, NULL, NULL, '2024-09-10', 'concours salon', 25000.00, 'espece', 'ref-0188', '2024-09-10 04:10:24', '2024-09-10 04:10:24', NULL, 7),
(7, NULL, NULL, '2024-09-11', 'concours', 50000.00, 'espece', 'ref-0184', '2024-09-11 09:49:11', '2024-09-11 09:49:11', NULL, 8);

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `design` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `design`, `created_at`, `updated_at`) VALUES
(1, 'BACC A', '2024-08-21 15:53:01', '2024-08-21 15:53:01'),
(2, 'BACC D', '2024-08-21 15:53:12', '2024-08-21 15:53:12'),
(3, 'BACC C', '2024-08-21 15:53:20', '2024-08-21 15:53:20'),
(4, 'BACC S', '2024-08-21 15:53:27', '2024-08-21 15:53:27'),
(5, 'BACC A2', '2024-08-21 15:53:40', '2024-08-21 15:53:40'),
(6, 'BACC TECHNIQUE', '2024-08-21 15:55:02', '2024-08-21 15:55:02');

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eCDdPGWnAYEnuKqPpWN6qk2USI7FEwfuPbF0O100', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlBkZnR6eEU2R093cE12VTFiQ0V5d0p2TXVEdGZsdTY4ODY3OWQyeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1726130605),
('EMVY21S5Fx9mHjKHxSGF00XMo1HmuHminNj7Qzub', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVFVicmpxY1dMZXhSNFIwN2Z0TGJpU05vM0JDaTdXQXVYNjFyQUtiNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1726219891);

-- --------------------------------------------------------

--
-- Structure de la table `sous_groupes`
--

CREATE TABLE `sous_groupes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `design` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `groupes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sous_groupes`
--

INSERT INTO `sous_groupes` (`id`, `design`, `description`, `groupes_id`, `created_at`, `updated_at`) VALUES
(2, 'Groupe 01', 'Groupe 01 1ère année', 2, '2024-09-11 03:35:33', '2024-09-11 04:46:37'),
(3, 'Groupe 02', 'Groupe Communication 02', 2, '2024-09-12 03:51:56', '2024-09-12 03:51:56'),
(4, 'Groupe 01', 'Groupe droit 01', 3, '2024-09-12 03:52:20', '2024-09-12 03:53:37'),
(5, 'Groupe 02', 'Groupe Droit 02', 3, '2024-09-12 03:52:36', '2024-09-12 03:52:36');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password_changed` tinyint(1) NOT NULL DEFAULT 0,
  `etudiant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `password`, `username`, `role`, `password_changed`, `etudiant_id`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 'Siaceem', '$2y$12$EU65CYAdtETc56sTZdl6yOSubsndKCOyULOYbmok1sWWevhmtnRa2', 'siaceem', 'SI Admin', 1, NULL, '2024-08-21 11:16:56', '2024-08-21 11:16:56', NULL, 1),
(2, 'Caisse', '$2y$12$I/mT/E3pqXONIHjUTRvD/ORJgjZWvKTiyHXDn.246G5c.5sDwRbCW', 'caisse', 'Caisse', 1, NULL, '2024-08-21 15:47:29', '2024-08-21 15:47:29', NULL, 1),
(3, 'Acceuil', '$2y$12$62uyUkQ9bGiliv1xDzQBz.IiVt.aOA7rqstNwGksW80pLhgSrv.xm', 'acceuil', 'Accueil', 1, NULL, '2024-08-21 15:47:55', '2024-08-26 09:44:29', '2024-08-26 09:44:29', 1),
(4, 'Inscription', '$2y$12$hN/ryw/9RpyKrH4YJh33te2Jo9vdOavI/snk/1KmtaSc8H4nR7MY.', 'inscription', 'Inscription', 1, NULL, '2024-08-21 15:48:21', '2024-08-21 15:48:21', NULL, 1),
(5, 'Caisse Candidat ACEEM', '$2y$12$54H444nlJaB4xJ6t5KU45uiFe/2GGpob4PBWe9tYbXwMuvIBt5XOO', 'CA', 'CA', 1, NULL, '2024-08-23 09:07:28', '2024-08-23 09:07:28', NULL, 1),
(8, 'Accueil', '$2y$12$IIrIklfR9As9JGDYuUVwuu8hTAPvZl2cUZxgnQ/dJsGM5nAn/SZJK', 'accueil', 'Accueil', 1, NULL, '2024-08-26 09:49:07', '2024-08-26 09:49:07', NULL, 1),
(10, 'RATOVOARIVONY Ainanirina Sabrino', '$2y$12$2K9pWuJZHdIjOxK2myr09OGAHIUhJD.aCUec2CdiOUPPQ5IxygqQy', 'sabrino', 'Etudiant', 1, 1, '2024-09-05 05:46:43', '2024-09-05 05:47:14', NULL, 1),
(11, 'Voavison Binea', '$2y$12$gxX6CVHe6wu40o2yohBaP.0Ffs.MGChCSvwYzkWZMptwgZXtbJugi', 'binea', 'Etudiant', 1, 2, '2024-09-09 09:43:14', '2024-09-09 09:43:45', NULL, 1),
(12, 'John Doe', '$2y$12$Hst3dbLfz3mLeHRZKTJcn.anhLeXqkaTKiPwkEZU0Gj2ONF6GwY9y', 'john', 'Etudiant', 1, 3, '2024-09-09 10:17:00', '2024-09-09 10:17:44', NULL, 1),
(13, 'Voavy Paulin', '$2y$12$mt.uCAnBCDwU5hUcTY2io.FgDEODFZdg4OIiyu/OMlaGchdlpn.66', 'voavy', 'Etudiant', 1, 4, '2024-09-09 10:28:41', '2024-09-09 10:29:13', NULL, 1),
(14, 'Henri VE', '$2y$12$j6V/u7PJ5e7Ea6AeP9fivO6zkxKs6LU5r4LQA3ng1KdDneDIFwsse', 'henri', 'Etudiant', 1, 5, '2024-09-10 04:01:02', '2024-09-10 04:03:53', NULL, 1),
(15, 'Desiré Noel', '$2y$12$FqcNaKjraPxEnCj4bgJVYusIwnkIeEOVvtPR.31XA8KsYqo37wkgC', 'desiré', 'Etudiant', 1, 6, '2024-09-10 04:13:17', '2024-09-10 04:13:17', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `vagues`
--

CREATE TABLE `vagues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `deb_insc` date NOT NULL,
  `fin_insc` date DEFAULT NULL,
  `deb_conc` date NOT NULL,
  `fin_conc` date DEFAULT NULL,
  `concours_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vagues`
--

INSERT INTO `vagues` (`id`, `designation`, `created_at`, `updated_at`, `commentaire`, `deb_insc`, `fin_insc`, `deb_conc`, `fin_conc`, `concours_id`, `is_published`) VALUES
(1, '1er Vague', '2024-09-05 05:27:14', '2024-09-05 05:27:14', NULL, '2024-09-02', '2024-09-08', '2024-09-09', '2024-09-11', 1, 0),
(2, '2eme Vague', '2024-09-05 05:27:39', '2024-09-09 07:23:08', NULL, '2024-09-09', '2024-09-15', '2024-09-16', '2024-09-18', 1, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Index pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `candidats_num_bacc_unique` (`num_bacc`),
  ADD UNIQUE KEY `candidats_email_unique` (`email`),
  ADD KEY `candidats_mention_id_foreign` (`mention_id`),
  ADD KEY `candidats_serie_id_foreign` (`serie_id`),
  ADD KEY `candidats_vagues_id_foreign` (`vagues_id`);

--
-- Index pour la table `concours`
--
ALTER TABLE `concours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `etudiants_matricule_unique` (`matricule`),
  ADD UNIQUE KEY `etudiants_num_cin_unique` (`num_cin`),
  ADD UNIQUE KEY `etudiants_username_unique` (`username`),
  ADD KEY `etudiants_candidat_id_foreign` (`candidat_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `groupes_niveaux_id_foreign` (`niveaux_id`);

--
-- Index pour la table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Index pour la table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matricules`
--
ALTER TABLE `matricules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricules_design_unique` (`design`),
  ADD KEY `matricules_candidat_id_foreign` (`candidat_id`),
  ADD KEY `matricules_etudiant_id_foreign` (`etudiant_id`);

--
-- Index pour la table `mentions`
--
ALTER TABLE `mentions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mentions_code_unique` (`code`);

--
-- Index pour la table `mention_serie`
--
ALTER TABLE `mention_serie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mention_serie_serie_id_foreign` (`serie_id`),
  ADD KEY `mention_serie_mention_id_foreign` (`mention_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD PRIMARY KEY (`id`),
  ADD KEY `niveaux_parcours_id_foreign` (`parcours_id`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parcours_mention_id_foreign` (`mention_id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `payements`
--
ALTER TABLE `payements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payements_reference_unique` (`reference`),
  ADD KEY `payements_utilisateur_id_foreign` (`utilisateur_id`),
  ADD KEY `payements_etudiant_id_foreign` (`etudiant_id`),
  ADD KEY `payements_candidat_id_foreign` (`candidat_id`);

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `sous_groupes`
--
ALTER TABLE `sous_groupes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sous_groupes_groupes_id_foreign` (`groupes_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateurs_etudiant_id_foreign` (`etudiant_id`);

--
-- Index pour la table `vagues`
--
ALTER TABLE `vagues`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vagues_concours_id_foreign` (`concours_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `candidats`
--
ALTER TABLE `candidats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `concours`
--
ALTER TABLE `concours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `groupes`
--
ALTER TABLE `groupes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matricules`
--
ALTER TABLE `matricules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `mentions`
--
ALTER TABLE `mentions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `mention_serie`
--
ALTER TABLE `mention_serie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `niveaux`
--
ALTER TABLE `niveaux`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `payements`
--
ALTER TABLE `payements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `sous_groupes`
--
ALTER TABLE `sous_groupes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `vagues`
--
ALTER TABLE `vagues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `candidats`
--
ALTER TABLE `candidats`
  ADD CONSTRAINT `candidats_mention_id_foreign` FOREIGN KEY (`mention_id`) REFERENCES `mentions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `candidats_serie_id_foreign` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `candidats_vagues_id_foreign` FOREIGN KEY (`vagues_id`) REFERENCES `vagues` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_candidat_id_foreign` FOREIGN KEY (`candidat_id`) REFERENCES `candidats` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `groupes`
--
ALTER TABLE `groupes`
  ADD CONSTRAINT `groupes_niveaux_id_foreign` FOREIGN KEY (`niveaux_id`) REFERENCES `niveaux` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `matricules`
--
ALTER TABLE `matricules`
  ADD CONSTRAINT `matricules_candidat_id_foreign` FOREIGN KEY (`candidat_id`) REFERENCES `candidats` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `matricules_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `mention_serie`
--
ALTER TABLE `mention_serie`
  ADD CONSTRAINT `mention_serie_mention_id_foreign` FOREIGN KEY (`mention_id`) REFERENCES `mentions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mention_serie_serie_id_foreign` FOREIGN KEY (`serie_id`) REFERENCES `series` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `niveaux`
--
ALTER TABLE `niveaux`
  ADD CONSTRAINT `niveaux_parcours_id_foreign` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD CONSTRAINT `parcours_mention_id_foreign` FOREIGN KEY (`mention_id`) REFERENCES `mentions` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `payements`
--
ALTER TABLE `payements`
  ADD CONSTRAINT `payements_candidat_id_foreign` FOREIGN KEY (`candidat_id`) REFERENCES `candidats` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payements_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payements_utilisateur_id_foreign` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `sous_groupes`
--
ALTER TABLE `sous_groupes`
  ADD CONSTRAINT `sous_groupes_groupes_id_foreign` FOREIGN KEY (`groupes_id`) REFERENCES `groupes` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE SET NULL;

--
-- Contraintes pour la table `vagues`
--
ALTER TABLE `vagues`
  ADD CONSTRAINT `vagues_concours_id_foreign` FOREIGN KEY (`concours_id`) REFERENCES `concours` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
