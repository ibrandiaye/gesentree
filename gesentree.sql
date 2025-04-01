-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 02 avr. 2025 à 00:59
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gesentree`
--

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `nom`, `prenom`, `titre`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'Ndiaye', 'Ibra', 'Developpeur', 1, '2025-02-27 16:55:29', '2025-02-27 16:55:29');

-- --------------------------------------------------------

--
-- Structure de la table `entrees`
--

CREATE TABLE `entrees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employe_id` bigint(20) UNSIGNED NOT NULL,
  `visiteur_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sortie` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entrees`
--

INSERT INTO `entrees` (`id`, `employe_id`, `visiteur_id`, `created_at`, `updated_at`, `sortie`) VALUES
(1, 1, 3, '2025-03-09 15:13:59', '2025-03-09 15:13:59', '2025-03-09 23:56:11'),
(2, 1, 1, '2025-03-20 23:58:07', NULL, NULL),
(3, 1, 2, '2025-03-09 23:58:45', NULL, NULL),
(4, 1, 4, '2025-03-10 00:04:01', '2025-03-10 00:04:01', '2025-03-10 00:05:37'),
(5, 1, 5, '2025-03-13 22:21:43', '2025-03-13 22:21:43', NULL),
(6, 1, 6, '2025-03-13 22:24:25', '2025-03-13 22:24:25', NULL),
(7, 1, 7, '2025-03-13 22:27:38', '2025-03-13 22:27:38', '2025-03-13 22:27:52'),
(8, 1, 8, '2025-03-14 13:36:33', '2025-03-14 13:36:33', '2025-03-14 13:36:44'),
(9, 1, 9, '2025-03-16 21:39:44', '2025-03-16 21:39:44', NULL),
(10, 1, 10, '2025-03-16 23:11:25', '2025-03-16 23:11:25', NULL),
(11, 1, 11, '2025-03-16 23:16:12', '2025-03-16 23:16:12', NULL),
(12, 1, 12, '2025-03-17 00:23:01', '2025-03-17 00:23:01', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_02_26_105318_create_sites_table', 1),
(7, '2025_02_26_105401_create_services_table', 1),
(8, '2025_02_26_105417_create_employes_table', 1),
(9, '2025_02_26_105609_create_visiteurs_table', 1),
(10, '2025_02_26_105617_create_entrees_table', 1),
(11, '2025_02_26_105626_create_sorties_table', 1),
(13, '2025_02_26_115931_add_column_to_users_table', 2),
(14, '2025_03_09_235224_add_column_to_entrees_table', 3),
(15, '2025_03_13_145459_add_column_null_to_visiteurs_table', 4),
(21, '2025_03_16_211056_create_recherchers_table', 5),
(22, '2025_03_16_211709_add_column_parents_to_visiteurs_table', 5);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `recherchers`
--

CREATE TABLE `recherchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datenaiss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenompere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nommere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenommere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `recherchers`
--

INSERT INTO `recherchers` (`id`, `nom`, `prenom`, `datenaiss`, `prenompere`, `nommere`, `prenommere`, `motif`, `created_at`, `updated_at`) VALUES
(1, 'NDIAYE', 'IBRA', '02/03/94', 'ALLE', 'FALL', 'DEGUENE', 'Chercher pour vol', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `nom`, `site_id`, `created_at`, `updated_at`) VALUES
(1, 'Informatique', 1, '2025-02-26 15:23:18', '2025-02-26 15:23:18');

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sites`
--

INSERT INTO `sites` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Dakar', '2025-02-26 12:56:45', '2025-02-26 12:56:45');

-- --------------------------------------------------------

--
-- Structure de la table `sorties`
--

CREATE TABLE `sorties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `entree_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `site_id`) VALUES
(2, 'Ibra Ndiaye', 'ibra789ndiaye@gmail.com', NULL, '$2y$12$1MAK0mjHZ/986dW5208mn.he3HUsfgB/aESP4m434o2RKYegvoIni', NULL, '2025-03-05 22:10:59', '2025-03-05 22:10:59', 'admin', NULL),
(3, 'Agent', 'test@gmail.com', NULL, '$2y$12$jZMBB0hp5UdkIO2qQsr1pOOEEEkBc.VFsR4oU55JoIF1VaUL7QOkO', NULL, '2025-03-05 22:11:35', '2025-03-06 09:52:59', 'utilisateur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `visiteurs`
--

CREATE TABLE `visiteurs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datenaiss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieunaiss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numelec` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numcni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationalite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_emission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_expiration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mrz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numcarte` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `employe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `prenompere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nommere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenommere` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `visiteurs`
--

INSERT INTO `visiteurs` (`id`, `nom`, `prenom`, `datenaiss`, `lieunaiss`, `numelec`, `numcni`, `commune`, `sexe`, `nationalite`, `date_emission`, `date_expiration`, `mrz`, `photo`, `numcarte`, `service_id`, `site_id`, `employe_id`, `created_at`, `updated_at`, `prenompere`, `nommere`, `prenommere`, `commentaire`) VALUES
(1, 'NDIAYE', 'IBRA', '02/03/94', 'MBOSS NDIAMBOUR', '106587571', '1496200400459', 'KEUR MASSAR NORD', 'male', 'SEN', '01/11/26', '18/07/27', 'I&lt;SEN106199403&lt;020002814&lt;&lt;&lt;&lt;&lt;&lt;<br>9403028M2707185SEN&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;8<br>NDIAYE&lt;&lt;IBRA&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;', 'image_1741277316.png', '10619940302000281', 1, 1, 1, '2025-03-06 16:08:36', '2025-03-06 16:08:36', NULL, NULL, NULL, NULL),
(2, 'FALL', 'DEGUENE', '15/04/72', 'KAOLACK', '102521023', '2548199210746', 'KEUR MASSAR NORD', 'female', 'SEN', '222', '03/06/27', 'I&lt;SEN206197204&lt;150004982&lt;&lt;&lt;&lt;&lt;&lt;<br>7204151F2706030SEN&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;4<br>FALL&lt;&lt;DEGUENE&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;', 'image_1741533122.png', '20619720415000498', 1, 1, 1, '2025-03-09 15:12:02', '2025-03-09 15:12:02', NULL, NULL, NULL, NULL),
(3, 'FALL', 'DEGUENE', '15/04/72', 'KAOLACK', '102521023', '2548199210746', 'KEUR MASSAR NORD', 'female', 'SEN', '222', '03/06/27', 'I&lt;SEN206197204&lt;150004982&lt;&lt;&lt;&lt;&lt;&lt;<br>7204151F2706030SEN&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;4<br>FALL&lt;&lt;DEGUENE&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;', 'image_1741533239.png', '20619720415000498', 1, 1, 1, '2025-03-09 15:13:59', '2025-03-09 15:13:59', NULL, NULL, NULL, NULL),
(4, 'NDIAYE', 'IBRA', '02/03/94', 'MBOSS NDIAMBOUR', '106587571', '1496200400459', 'KEUR MASSAR NORD', 'male', 'SEN', '17/02/24', '18/07/27', 'I&lt;SEN106199403&lt;020002814&lt;&lt;&lt;&lt;&lt;&lt;<br>9403028M2707185SEN&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;8<br>NDIAYE&lt;&lt;IBRA&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;', 'image_1741565041.png', '10619940302000281', 1, 1, 1, '2025-03-10 00:04:01', '2025-03-10 00:04:01', NULL, NULL, NULL, NULL),
(5, 'NDIAYE', 'IBRA', '02/03/94', 'MBOSS NDIAMBOUR', '106587571', '1496200400459', 'KEUR MASSAR NORD', 'male', NULL, NULL, '18/07/27', 'I&lt;SEN106199403&lt;020002814&lt;&lt;&lt;&lt;&lt;&lt;<br>9403028M2707185SEN&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;8<br>NDIAYE&lt;&lt;IBRA&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;', 'image_1741904502.png', '10619940302000281', 1, 1, 1, '2025-03-13 22:21:42', '2025-03-13 22:21:42', NULL, NULL, NULL, NULL),
(6, 'NDIAYE', 'IBRA', '02/03/94', 'MBOSS NDIAMBOUR', '106587571', '1496200400459', 'KEUR MASSAR NORD', 'male', NULL, NULL, '18/07/27', 'I&lt;SEN106199403&lt;020002814&lt;&lt;&lt;&lt;&lt;&lt;<br>9403028M2707185SEN&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;8<br>NDIAYE&lt;&lt;IBRA&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;', 'image_1741904665.png', '10619940302000281', 1, 1, 1, '2025-03-13 22:24:25', '2025-03-13 22:24:25', NULL, NULL, NULL, NULL),
(7, 'NDIAYE', 'IBRA', '02/03/94', 'MBOSS NDIAMBOUR', '106587571', '1496200400459', 'KEUR MASSAR NORD', 'male', NULL, NULL, '18/07/27', 'I&lt;SEN106199403&lt;020002814&lt;&lt;&lt;&lt;&lt;&lt;<br>9403028M2707185SEN&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;8<br>NDIAYE&lt;&lt;IBRA&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;', 'image_1741904858.png', '10619940302000281', 1, 1, 1, '2025-03-13 22:27:38', '2025-03-13 22:27:38', NULL, NULL, NULL, NULL),
(8, 'NDIAYE', 'IBRA', '02/03/94', 'MBOSS NDIAMBOUR', '106587571', '1496200400459', 'KEUR MASSAR NORD', 'male', NULL, NULL, '18/07/27', 'I&lt;SEN106199403&lt;020002814&lt;&lt;&lt;&lt;&lt;&lt;<br>9403028M2707185SEN&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;8<br>NDIAYE&lt;&lt;IBRA&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;', 'image_1741959392.png', '10619940302000281', 1, 1, 1, '2025-03-14 13:36:32', '2025-03-14 13:36:32', NULL, NULL, NULL, NULL),
(9, 'NDIAYE', 'IBRA', '02/03/94', 'MBOSS NDIAMBOUR', '106587571', '1496200400459', 'KEUR MASSAR NORD', 'male', NULL, NULL, '18/07/27', 'I&lt;SEN106199403&lt;020002814&lt;&lt;&lt;&lt;&lt;&lt;<br>9403028M2707185SEN&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;8<br>NDIAYE&lt;&lt;IBRA&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;', 'image_1742161184.png', '10619940302000281', 1, 1, 1, '2025-03-16 21:39:44', '2025-03-16 21:39:44', NULL, NULL, NULL, NULL),
(10, 'NDIAYE', 'IBRA', '02/03/94', 'MBOSS NDIAMBOUR', '106587571', '1496200400459', 'KEUR MASSAR NORD', 'male', NULL, NULL, '18/07/27', 'I&lt;SEN106199403&lt;020002814&lt;&lt;&lt;&lt;&lt;&lt;<br>9403028M2707185SEN&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;8<br>NDIAYE&lt;&lt;IBRA&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;', 'image_1742166685.png', '10619940302000281', 1, 1, 1, '2025-03-16 23:11:25', '2025-03-16 23:11:25', 'ALLE', 'FALL', 'DEGUENE', NULL),
(11, 'NDIAYE', 'IBRA', '02/03/94', 'MBOSS NDIAMBOUR', '106587571', '1496200400459', 'KEUR MASSAR NORD', 'male', NULL, NULL, '18/07/27', 'I&lt;SEN106199403&lt;020002814&lt;&lt;&lt;&lt;&lt;&lt;<br>9403028M2707185SEN&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;8<br>NDIAYE&lt;&lt;IBRA&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;', 'image_1742166972.png', '10619940302000281', 1, 1, 1, '2025-03-16 23:16:12', '2025-03-16 23:16:12', 'ALLE', 'FALL', 'DEGUENE', 'Chercher pour vol'),
(12, 'NDIAYE', 'IBRA', '02/03/94', 'MBOSS NDIAMBOUR', '106587571', '1496200400459', 'KEUR MASSAR NORD', 'male', NULL, NULL, '18/07/27', 'I&lt;SEN106199403&lt;020002814&lt;&lt;&lt;&lt;&lt;&lt;<br>9403028M2707185SEN&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;8<br>NDIAYE&lt;&lt;IBRA&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;', 'image_1742170981.png', '10619940302000281', 1, 1, 1, '2025-03-17 00:23:01', '2025-03-17 00:23:01', 'ALLE', 'FALL', 'DEGUENE', 'Chercher pour vol');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employes_service_id_foreign` (`service_id`);

--
-- Index pour la table `entrees`
--
ALTER TABLE `entrees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entrees_employe_id_foreign` (`employe_id`),
  ADD KEY `entrees_visiteur_id_foreign` (`visiteur_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `recherchers`
--
ALTER TABLE `recherchers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_site_id_foreign` (`site_id`);

--
-- Index pour la table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sorties`
--
ALTER TABLE `sorties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sorties_entree_id_foreign` (`entree_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_site_id_foreign` (`site_id`);

--
-- Index pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visiteurs_service_id_foreign` (`service_id`),
  ADD KEY `visiteurs_site_id_foreign` (`site_id`),
  ADD KEY `visiteurs_employe_id_foreign` (`employe_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `entrees`
--
ALTER TABLE `entrees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recherchers`
--
ALTER TABLE `recherchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sorties`
--
ALTER TABLE `sorties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employes`
--
ALTER TABLE `employes`
  ADD CONSTRAINT `employes_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Contraintes pour la table `entrees`
--
ALTER TABLE `entrees`
  ADD CONSTRAINT `entrees_employe_id_foreign` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`),
  ADD CONSTRAINT `entrees_visiteur_id_foreign` FOREIGN KEY (`visiteur_id`) REFERENCES `visiteurs` (`id`);

--
-- Contraintes pour la table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);

--
-- Contraintes pour la table `sorties`
--
ALTER TABLE `sorties`
  ADD CONSTRAINT `sorties_entree_id_foreign` FOREIGN KEY (`entree_id`) REFERENCES `entrees` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);

--
-- Contraintes pour la table `visiteurs`
--
ALTER TABLE `visiteurs`
  ADD CONSTRAINT `visiteurs_employe_id_foreign` FOREIGN KEY (`employe_id`) REFERENCES `employes` (`id`),
  ADD CONSTRAINT `visiteurs_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `visiteurs_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
