-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 30 déc. 2020 à 13:43
-- Version du serveur :  8.0.22
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `koudami`
--

-- --------------------------------------------------------

--
-- Structure de la table `ads`
--

CREATE TABLE `ads` (
  `id` bigint UNSIGNED NOT NULL,
  `propr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'visible',
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ads`
--

INSERT INTO `ads` (`id`, `propr`, `link`, `width`, `height`, `state`, `contenu`, `created_at`, `updated_at`, `type`) VALUES
(1, 'mohamed', 'https://www.w3schools.com/Tags/att_a_download.asp', '60', '60', 'visible', '/videos/p3.jpg-2020-12-27-22:43:29.jpg', '2020-12-27 21:43:29', '2020-12-27 21:43:29', 'image'),
(2, 'bachir', 'https://www.mobilis.dz/', '70', '110', 'visible', '/videos/p6.jpg-2020-12-29-12:03:49.jpg', '2020-12-29 11:03:49', '2020-12-29 11:03:49', 'image'),
(3, 'mohamed', 'http://www.ooredoo.dz/Ooredoo/Algerie/particuliers', '60', '70', 'invisible', '/videos/p4.jpg-2020-12-29-12:05:01.jpg', '2020-12-29 11:05:01', '2020-12-29 17:37:26', 'image'),
(4, 'mohamed', 'https://www.mobilis.dz/', '130', '30', 'visible', '/videos/p7.jpg-2020-12-29-12:09:29.jpg', '2020-12-29 11:09:29', '2020-12-29 17:37:33', 'image'),
(5, 'sami', 'http://www.ooredoo.dz/Ooredoo/Algerie/particuliers/offres-internet', '70', '60', 'visible', '/videos/p1.png-2020-12-29-12:14:48.png', '2020-12-29 11:14:48', '2020-12-29 11:14:48', 'image'),
(6, 'bachir', 'http://www.ooredoo.dz/Ooredoo/Algerie/particuliers/offres-internet', '90', '60', 'visible', '/videos/p2.png-2020-12-29-12:15:17.png', '2020-12-29 11:15:17', '2020-12-29 11:15:17', 'image'),
(7, 'bachir', 'https://ads.google.com/intl/fr_DZ/home/?pli=1', '60', '150', 'visible', '/videos/login.jpg-2020-12-29-18:35:20.jpg', '2020-12-29 17:35:20', '2020-12-29 17:35:20', 'image');

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_article` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proprietaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `chatts`
--

CREATE TABLE `chatts` (
  `id` bigint UNSIGNED NOT NULL,
  `sender_id` int UNSIGNED NOT NULL,
  `receiver_id` int UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` bigint UNSIGNED NOT NULL,
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster_id` int UNSIGNED NOT NULL,
  `owner_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `contenu`, `poster_id`, `owner_id`, `created_at`, `updated_at`) VALUES
(1, 'cc', 2, 25, '2020-12-29 11:26:08', '2020-12-29 11:26:08');

-- --------------------------------------------------------

--
-- Structure de la table `emplois`
--

CREATE TABLE `emplois` (
  `id` bigint UNSIGNED NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_emploi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emploi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_payement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `galeries`
--

CREATE TABLE `galeries` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pic1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `galeries`
--

INSERT INTO `galeries` (`id`, `user_id`, `pic1`, `pic2`, `pic3`, `created_at`, `updated_at`) VALUES
(2, 2, '/storage/galeries/footer162_1609156696.jpg', NULL, NULL, '2020-12-27 17:56:01', '2020-12-28 10:58:17');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `contenu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `traiterPar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'non traitée'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0000_00_00_000000_create_websockets_statistics_entries_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_11_15_135146_create_messages_table', 1),
(6, '2020_11_16_000624_add_traiter_par_to_messages_table', 1),
(7, '2020_11_16_174954_create_ads_table', 1),
(8, '2020_11_18_170254_create_comments_table', 1),
(9, '2020_11_24_155731_create_visits_table', 1),
(10, '2020_11_26_122356_create_user_user_table', 1),
(11, '2020_11_28_003802_create_chatts_table', 1),
(12, '2020_12_03_122428_create_articles_table', 1),
(13, '2020_12_03_122449_create_emplois_table', 1),
(14, '2020_12_08_122957_add_language_to_users_table', 1),
(15, '2020_12_21_211819_add_photo_to_users_table', 1),
(16, '2020_12_25_104348_create_operation_admins_table', 1),
(17, '2020_12_26_105813_add_type_to_ads_table', 1),
(18, '2020_12_27_003355_create_galeries_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `operation_admins`
--

CREATE TABLE `operation_admins` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` int UNSIGNED NOT NULL,
  `object` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `function` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilaya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_inscription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactif',
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Rc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nif` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commune` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_payement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos1` double(18,16) DEFAULT NULL,
  `pos2` double(18,16) DEFAULT NULL,
  `Ncompte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_compte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'simple',
  `nbr_visite` int UNSIGNED NOT NULL DEFAULT '0',
  `date_valid` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fr',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `prenom`, `email`, `email_verified_at`, `categorie`, `function`, `password`, `phone_number`, `wilaya`, `type_inscription`, `state`, `adresse`, `Rc`, `Nif`, `commune`, `type_payement`, `pos1`, `pos2`, `Ncompte`, `remember_token`, `created_at`, `updated_at`, `type_compte`, `nbr_visite`, `date_valid`, `lang`, `photo`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '2020-11-29 16:45:21', NULL, 'visitor', '$2y$10$o4Bufx894ikA9qGFKM0NGe/ZvLNh26QXV.81IMUsM/.zehVcbH6FS', '05555555555555', 'wilaya', 'visitor', 'inactif', NULL, NULL, NULL, 'commune', 'ad', 36.7198208000000000, 3.0375935999999997, 'Ncompte', NULL, '2020-12-27 17:39:46', '2020-12-27 17:46:01', 'admin', 0, '2020-12-27 18:39:46', 'fr', NULL),
(2, 'client', 'client', 'client@gmail.com', '2020-12-15 18:44:23', 'Paraboles et démos', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$5B5aipD//RdgxHKe2DBJnemipPOMCyO78yxGZSc/6eI3QtijZeVGW', '05555555555555', 'Jijel', 'particulier', 'inactif', NULL, NULL, NULL, 'Jijel', 'CCP', 36.6575616000000000, 3.0146560000000000, '2156a', NULL, '2020-12-27 17:40:58', '2020-12-29 14:20:12', 'simple', 17, '2021-12-27 17:40:58', 'fr', '/storage/images/footer162_1609112881.jpg'),
(3, 'client 2', 'client 2', 'client2@gmail.com', '2020-12-18 18:44:23', 'Industrie et fabrication', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$q.gmvvRThBuM8nsph920YOOesTH9zs7y3iPFbjR1Axb5ufIe6JOl6', '0669930704', 'Oum el Bouaghi', 'particulier', 'actif', NULL, NULL, NULL, 'Oum el Bouaghi', 'CCP', 36.7230975999999960, 3.0375935999999997, '2156a', NULL, '2020-12-27 17:42:09', '2020-12-29 14:41:36', 'simple', 9, '2021-12-27 17:42:09', 'fr', '/storage/images/tie6900846403_1609247979.jpg'),
(4, 'client3', 'client3', 'client3@gmail.com', '2020-12-17 18:44:23', 'Constructions et Travaux', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$Vomk4yxEEEIZzsEBEhCCH.P.DiySzAAed2NJciswgPnMUPO40JQPi', '05555555555555', 'Laghouat', 'particulier', 'actif', NULL, NULL, NULL, 'Laghouat', 'CCP', 36.6575616000000000, 3.0146560000000000, '025', NULL, '2020-12-27 17:43:13', '2020-12-29 13:54:30', 'simple', 1, '2021-12-27 17:43:13', 'fr', '/storage/images/welding676406404_1609248164.jpg'),
(5, 'client4', 'client4', 'client4@gmail.com', '2020-12-09 12:06:49', 'Constructions et Travaux', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$fuxlug0YxUv7FQckefrVFO/KMEeTfPGzn4qAQVkIjmXKkhzTmOpaS', '05555555555555', 'Chlef', 'particulier', 'actif', NULL, NULL, NULL, 'Chlef', 'CCP', 36.7198208000000000, 3.0375935999999997, '2156a', NULL, '2020-12-28 11:05:49', '2020-12-29 12:16:54', 'simple', 1, '2021-12-28 11:05:49', 'fr', NULL),
(6, 'mohamed', 'bachir', 'mohamedbhadjadji@gmail.com', '2020-12-09 12:13:20', 'Constructions et Travaux', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$1jdnVvXr2ARcUVWV4jSyoefUcwDJgivVmtxXw41T2RxsQPz8Eyr/m', '05555555555555', 'Alger', 'particulier', 'actif', NULL, NULL, NULL, 'Sidi M\'Hamed', 'CCP', 36.7198208000000000, 3.0375935999999997, '2156a', NULL, '2020-12-28 11:09:31', '2020-12-28 11:09:31', 'simple', 0, '2021-12-28 11:09:31', 'fr', NULL),
(7, 'client5', 'client5', 'client5@gmail.com', '2020-12-09 12:13:26', 'Securité et Alarme', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$op3LWu6F0nTvdqYXUxpGfef8M2iuyaMkTkvABamkmsBcrUkcn7Gwy', '0669930704', 'Bouira', 'particulier', 'actif', NULL, NULL, NULL, 'Aïn Bessem', 'CCP', 36.7198208000000000, 3.0375935999999997, '2156a', NULL, '2020-12-28 11:10:44', '2020-12-28 11:10:44', 'simple', 0, '2021-12-28 11:10:44', 'fr', NULL),
(8, 'client6', 'client6', 'client6@gmail.com', '2020-12-09 12:13:29', 'Publicité et communication', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$zG6KbHxe7fD9B7EBBV0VwOoxPNOBDWvsuPuph42rxCkguSx7E.4Um', '0669930704', 'Laghouat', 'particulier', 'actif', NULL, NULL, NULL, 'Laghouat', 'CCP', 36.7198208000000000, 3.0375935999999997, '2156a', NULL, '2020-12-28 11:12:09', '2020-12-28 11:12:09', 'simple', 0, '2021-12-28 11:12:09', 'fr', NULL),
(9, 'client7', 'client7', 'client7@gmail.com', '2020-12-02 12:13:33', 'Décoration et Aménagement', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$x6BT0wW8eqx1uPIaOqqBOuV.iuUZcflE/gedJM4QuLgxeMhzxIQ7a', '0669930704', 'Béjaïa', 'particulier', 'actif', NULL, NULL, NULL, 'Béjaïa', 'CCP', 36.7198208000000000, 3.0375935999999997, '2156a', NULL, '2020-12-28 11:13:08', '2020-12-28 11:16:50', 'simple', 0, '2021-12-28 11:13:08', 'fr', NULL),
(10, 'client9', 'client9', 'client9@gmail.com', '2020-12-16 13:09:02', 'Décoration et Aménagement', '102206 DISTRIBUTION PUBLIQUE DE GAZ', '$2y$10$CeLa0FuQNefkYM1UyuEF2ui.1NrAH6LgdZiUfjs.wuwKGnu7TdD3G', '0669930704', 'Béjaïa', 'particulier', 'actif', NULL, NULL, NULL, 'Béjaïa', 'en espèces', 36.7198208000000000, 3.0375935999999997, '2156a', NULL, '2020-12-28 11:18:01', '2020-12-28 11:18:01', 'simple', 0, '2021-12-28 11:18:01', 'fr', NULL),
(11, 'client10', 'client10', 'client10@gmail.com', '2020-12-01 13:09:13', 'Constructions et Travaux', '102104 ETUDES ET ENGINEERING LIES AUX HYDROCARBURES', '$2y$10$VqyQbadY1Vhf8TVYpEbuYer5Oplba.LS65j4LTBcIr1rP4TLmojUu', '0669930704', 'Chlef', 'particulier', 'actif', NULL, NULL, NULL, 'Chlef', 'CCP', 36.7198208000000000, 3.0375935999999997, '111111111111111', NULL, '2020-12-28 11:19:49', '2020-12-28 11:19:49', 'simple', 0, '2021-12-28 11:19:49', 'fr', NULL),
(12, 'client11', 'client11', 'client11@gmail.com', '2020-12-23 13:09:16', 'Constructions et Travaux', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$dD1fLjNKxpPjpNftLPKYiOsxXeF8BLnvir7hAfMYAzS1ae.X7EG8u', '0669930704', 'Adrar', 'particulier', 'actif', NULL, NULL, NULL, 'Reggane', 'CCP', 36.7198208000000000, 3.0375935999999997, '111111111111111', NULL, '2020-12-28 11:21:03', '2020-12-28 11:21:03', 'simple', 0, '2021-12-28 11:21:03', 'fr', NULL),
(13, 'client12', 'client12', 'client12@gmail.com', '2020-12-16 13:09:20', 'Constructions et Travaux', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$wDvAADj20BuFsAeoO0o4cuyrw7T4y/3f6MkTfL9AHZVCkD0dXGoBe', '055555555555555', 'Oum el Bouaghi', 'particulier', 'actif', NULL, NULL, NULL, 'Oum el Bouaghi', 'CCP', 36.7198208000000000, 3.0375935999999997, '111111111111111', NULL, '2020-12-28 11:29:17', '2020-12-28 11:29:17', 'simple', 0, '2021-12-28 11:29:17', 'fr', NULL),
(14, 'client13', 'client13', 'client13@gmail.com', '2020-12-16 13:09:23', 'Constructions et Travaux', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$BqWFX8yhbkx1WcKa1Ut3wecdrijFp3Ila/ApB23fIFBFZMX6noZRO', '0669930704', 'Djelfa', 'particulier', 'actif', NULL, NULL, NULL, 'Aïn Chouhada', 'en espèces', 36.7198208000000000, 3.0375935999999997, '5555555555', NULL, '2020-12-28 11:35:57', '2020-12-28 11:35:57', 'simple', 0, '2021-12-28 11:35:57', 'fr', NULL),
(15, 'client15', 'client15', 'client15@gmail.com', '2020-12-10 13:09:26', 'Industrie et fabrication', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$wiDtoSymg7eidiBbDKu4JOHMNwlECsGJ34bBqoPL7o4F06Q3lzNwi', '0665555555', 'Oum el Bouaghi', 'particulier', 'actif', NULL, NULL, NULL, 'Oum el Bouaghi', 'Carte Edahabia', 36.7198208000000000, 3.0375935999999997, '5555555555', NULL, '2020-12-28 11:37:42', '2020-12-28 11:37:42', 'simple', 0, '2021-12-28 11:37:42', 'fr', NULL),
(16, 'client16', 'client16', 'client16@gmail.com', '2020-12-09 13:09:30', 'Flashage et réparation de téléphones', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$aPZohaaExljwPadEecN1ru7iRzRrnOhTg/jl9yUIkyupuzgdtPlNS', '0777777777777', 'Sétif', 'particulier', 'actif', NULL, NULL, NULL, 'Aïn Abessa', 'CCP', 36.7198208000000000, 3.0375935999999997, '1111111111', NULL, '2020-12-28 11:39:31', '2020-12-28 11:39:31', 'simple', 0, '2021-12-28 11:39:31', 'fr', NULL),
(17, 'client17', 'client17', 'client17@gmail.com', '2020-12-28 13:09:33', 'Constructions et Travaux', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$VkOWxOFGslKImw.nrAecYOwJecFUa9/gcvHXUEevSWwQIDVHKh0ti', '05555555555555', 'Alger', 'particulier', 'actif', NULL, NULL, NULL, 'Sidi M\'Hamed', 'CCP', 36.7198208000000000, 3.0375935999999997, '5555555555', NULL, '2020-12-28 11:40:32', '2020-12-28 11:40:32', 'simple', 0, '2021-12-28 11:40:32', 'fr', NULL),
(18, 'client18', 'client18', 'client18@gmail.com', '2020-12-28 13:09:35', 'Esthétique et Beauté', '102303 COKERIE', '$2y$10$Vnx28/5ydxyp0R3mZ8/Ez.Dkv.Xf1tFqP/xoOuNDJocoFPbdmYWlK', '0787889936566', 'Tizi Ouzou', 'particulier', 'actif', NULL, NULL, NULL, 'Tizi Ouzou', 'CCP', 36.7198208000000000, 3.0375935999999997, '2156a', NULL, '2020-12-28 11:45:40', '2020-12-28 11:45:40', 'simple', 0, '2021-12-28 11:45:40', 'fr', NULL),
(19, 'client19', 'client19', 'client19@gmail.com', '2020-12-28 13:09:38', 'Constructions et Travaux', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$Hwx31nkz8GPidGac9LLNfe3/RgiT0pTFnm0zm4Ihm5h0nKC9JhICG', '0669930704', 'Batna', 'particulier', 'actif', NULL, NULL, NULL, 'Batna', 'CCP', 36.7198208000000000, 3.0375935999999997, '2156a', NULL, '2020-12-28 11:46:43', '2020-12-28 11:46:43', 'simple', 0, '2021-12-28 11:46:43', 'fr', NULL),
(20, 'client20', 'client20', 'client20@gmail.com', '2020-12-28 13:09:41', 'Constructions et Travaux', '102102 GEOPHYSIQUE', '$2y$10$ocyV7MC7I96u5VwcChNKdeaLzG1I7ScmqCUVWCf7Xq6IDs2Gkk56y', '055555555555555', 'Batna', 'particulier', 'actif', NULL, NULL, NULL, 'Batna', 'CCP', 36.7230975999999960, 3.0375935999999997, '1235555555', NULL, '2020-12-28 11:48:10', '2020-12-29 12:48:35', 'simple', 0, '2021-12-28 11:48:09', 'fr', '/storage/images/laboratory382773964020_1609249714.jpg'),
(21, 'client21', 'client21', 'client21@gmail.com', '2020-12-28 13:09:43', 'Publicité et communication', '102101 FORAGES PETROLIERS', '$2y$10$unSswBFs2uprhJ.LPqd27uTD6qe8HkOgaPkYFs/vuqcdgTxxwFJ9S', '0669930704', 'Laghouat', 'particulier', 'actif', NULL, NULL, NULL, 'Laghouat', 'CCP', 36.7230975999999960, 3.0375935999999997, '5555555555', NULL, '2020-12-28 11:51:16', '2020-12-29 12:42:03', 'simple', 0, '2021-12-28 11:51:15', 'fr', '/storage/images/man555786464021_1609248738.jpg'),
(22, 'client22', 'client22', 'client22@gmail.com', '2020-12-28 13:09:46', 'Traiteurs et Gateaux', '102101 FORAGES PETROLIERS', '$2y$10$dU8duqopNL1rx7xhSlujF.Bju3dwkE4I.CFtg.IGC.StkqkQFL2ha', '055555555555555', 'Biskra', 'particulier', 'actif', NULL, NULL, NULL, 'Aïn Naga', 'CCP', 36.7230975999999960, 3.0375935999999997, '1111111111', NULL, '2020-12-28 11:52:59', '2020-12-29 12:47:28', 'simple', 1, '2021-12-28 11:52:59', 'fr', '/storage/images/r22_1609249524.jpg'),
(23, 'client23', 'client23', 'client23@gmail.com', '2020-12-28 13:09:47', 'Constructions et Travaux', '101105 ENTREPRISE DE CONDITIONNEMENT DE PRODUITS AGRICOLES', '$2y$10$DIysEJGzipK81bob4HG9n./cUEHBv/MBwUENni.rvR6HxGklF4tR2', '0669930704', 'Batna', 'particulier', 'actif', NULL, NULL, NULL, 'Batna', 'en espèces', 36.7230975999999960, 3.0375935999999997, '215565', NULL, '2020-12-28 11:54:05', '2020-12-29 12:29:53', 'simple', 0, '2021-12-28 11:54:05', 'fr', '/storage/images/welding6764064023_1609248584.jpg'),
(24, 'client24', 'client24', 'client24@gmail.com', '2020-12-28 13:09:49', 'Menuiserie et Meubles', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$yDnfbqrsVVRVEo7UEXo5suvZXZWE6i56GHlKXPojL1urzlP6plxZK', '05555555555555', 'Béchar', 'particulier', 'actif', NULL, NULL, NULL, 'Béchar', 'en espèces', 36.7230975999999960, 3.0375935999999997, '1235555555', NULL, '2020-12-28 11:59:22', '2020-12-29 14:30:47', 'simple', 1, '2021-12-28 11:59:22', 'fr', '/storage/images/doctor534289064024_1609248497.jpg'),
(25, 'client25', 'client25', 'client25@gmail.com', '2020-12-28 13:09:52', 'Décoration et Aménagement', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$CL1.cAXqgJAWi6W3QVEbAer0UyyMkCYEhxZEdrNnALFXOEuXz1XTy', '0669930704', 'Batna', 'particulier', 'actif', NULL, NULL, NULL, 'Batna', 'CCP', 36.7230975999999960, 3.0375935999999997, '111111111111111', NULL, '2020-12-28 12:00:26', '2020-12-30 12:29:34', 'simple', 4, '2021-12-28 12:00:26', 'fr', '/storage/images/architect108058964025_1609248415.jpg'),
(26, 'client26', 'client26', 'client26@gmail.com', '2020-12-02 13:13:35', 'Industrie et fabrication', '101101 ENTREPRISE DE DEFENSE ET DE RESTAURATION DES SOLS', '$2y$10$dHxDK97hvRVMYYRpJMAMoe.DkoFLA1hKKx2la/4jqinz/iN6.lzZG', '0669930704', 'Tamanrasset', 'particulier', 'actif', NULL, NULL, NULL, 'Tamanrasset', 'en espèces', 36.7230975999999960, 3.0375935999999997, '111111111111111', NULL, '2020-12-28 12:02:33', '2020-12-30 12:29:23', 'simple', 4, '2021-12-28 12:02:33', 'fr', '/storage/images/person76858264026_1609248270.jpg'),
(27, 'visiteur', 'visiteur', 'visteur@gmail.com', '2020-12-02 13:13:31', NULL, 'visitor', '$2y$10$zUYwZac2Xb.fUNXbH150muBgJearNsEeXDTMZW/jH6VBudEuysHjS', '05555555555555', 'wilaya', 'visitor', 'inactif', NULL, NULL, NULL, 'commune', 'type', 36.7230975999999960, 3.0375935999999997, 'Ncompte', NULL, '2020-12-29 12:11:47', '2020-12-29 12:15:58', 'visitor', 0, '2020-12-29 13:11:47', 'fr', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_user`
--

CREATE TABLE `user_user` (
  `id` bigint UNSIGNED NOT NULL,
  `liker_id` int UNSIGNED NOT NULL,
  `liked_by_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_user`
--

INSERT INTO `user_user` (`id`, `liker_id`, `liked_by_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '2020-12-27 19:18:53', '2020-12-27 19:18:53');

-- --------------------------------------------------------

--
-- Structure de la table `visits`
--

CREATE TABLE `visits` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `visits`
--

INSERT INTO `visits` (`id`, `created_at`, `updated_at`) VALUES
(1, '2020-12-27 17:39:06', '2020-12-27 17:39:06'),
(2, '2020-12-27 17:39:51', '2020-12-27 17:39:51'),
(3, '2020-12-27 17:41:38', '2020-12-27 17:41:38'),
(4, '2020-12-27 17:42:31', '2020-12-27 17:42:31'),
(5, '2020-12-27 17:45:52', '2020-12-27 17:45:52'),
(6, '2020-12-27 17:49:41', '2020-12-27 17:49:41'),
(7, '2020-12-27 17:52:15', '2020-12-27 17:52:15'),
(8, '2020-12-27 17:55:34', '2020-12-27 17:55:34'),
(9, '2020-12-27 19:22:40', '2020-12-27 19:22:40'),
(10, '2020-12-27 21:39:18', '2020-12-27 21:39:18'),
(11, '2020-12-27 21:41:26', '2020-12-27 21:41:26'),
(12, '2020-12-27 21:41:29', '2020-12-27 21:41:29'),
(13, '2020-12-27 21:42:09', '2020-12-27 21:42:09'),
(14, '2020-12-27 21:42:22', '2020-12-27 21:42:22'),
(15, '2020-12-27 21:42:47', '2020-12-27 21:42:47'),
(16, '2020-12-27 21:43:34', '2020-12-27 21:43:34'),
(17, '2020-12-27 21:45:05', '2020-12-27 21:45:05'),
(18, '2020-12-27 21:46:05', '2020-12-27 21:46:05'),
(19, '2020-12-27 21:47:34', '2020-12-27 21:47:34'),
(20, '2020-12-27 21:47:54', '2020-12-27 21:47:54'),
(21, '2020-12-27 21:48:58', '2020-12-27 21:48:58'),
(22, '2020-12-27 21:49:41', '2020-12-27 21:49:41'),
(23, '2020-12-27 21:49:50', '2020-12-27 21:49:50'),
(24, '2020-12-27 21:50:04', '2020-12-27 21:50:04'),
(25, '2020-12-27 21:51:08', '2020-12-27 21:51:08'),
(26, '2020-12-27 21:52:44', '2020-12-27 21:52:44'),
(27, '2020-12-27 21:54:04', '2020-12-27 21:54:04'),
(28, '2020-12-27 21:54:16', '2020-12-27 21:54:16'),
(29, '2020-12-27 21:54:28', '2020-12-27 21:54:28'),
(30, '2020-12-27 21:54:44', '2020-12-27 21:54:44'),
(31, '2020-12-27 21:57:37', '2020-12-27 21:57:37'),
(32, '2020-12-27 21:58:07', '2020-12-27 21:58:07'),
(33, '2020-12-27 22:01:05', '2020-12-27 22:01:05'),
(34, '2020-12-27 22:01:22', '2020-12-27 22:01:22'),
(35, '2020-12-27 22:01:43', '2020-12-27 22:01:43'),
(36, '2020-12-27 22:02:27', '2020-12-27 22:02:27'),
(37, '2020-12-27 22:02:40', '2020-12-27 22:02:40'),
(38, '2020-12-27 22:02:50', '2020-12-27 22:02:50'),
(39, '2020-12-27 22:04:14', '2020-12-27 22:04:14'),
(40, '2020-12-27 22:04:42', '2020-12-27 22:04:42'),
(41, '2020-12-27 22:05:23', '2020-12-27 22:05:23'),
(42, '2020-12-27 22:07:19', '2020-12-27 22:07:19'),
(43, '2020-12-27 22:08:03', '2020-12-27 22:08:03'),
(44, '2020-12-27 22:08:23', '2020-12-27 22:08:23'),
(45, '2020-12-27 22:09:57', '2020-12-27 22:09:57'),
(46, '2020-12-27 22:10:28', '2020-12-27 22:10:28'),
(47, '2020-12-27 22:11:47', '2020-12-27 22:11:47'),
(48, '2020-12-27 22:12:03', '2020-12-27 22:12:03'),
(49, '2020-12-27 22:13:11', '2020-12-27 22:13:11'),
(50, '2020-12-27 22:13:51', '2020-12-27 22:13:51'),
(51, '2020-12-27 22:14:53', '2020-12-27 22:14:53'),
(52, '2020-12-27 22:19:00', '2020-12-27 22:19:00'),
(53, '2020-12-27 22:19:42', '2020-12-27 22:19:42'),
(54, '2020-12-27 22:20:49', '2020-12-27 22:20:49'),
(55, '2020-12-27 22:21:39', '2020-12-27 22:21:39'),
(56, '2020-12-27 22:22:02', '2020-12-27 22:22:02'),
(57, '2020-12-27 22:24:04', '2020-12-27 22:24:04'),
(58, '2020-12-27 22:24:41', '2020-12-27 22:24:41'),
(59, '2020-12-27 22:25:03', '2020-12-27 22:25:03'),
(60, '2020-12-27 22:26:35', '2020-12-27 22:26:35'),
(61, '2020-12-27 22:27:01', '2020-12-27 22:27:01'),
(62, '2020-12-27 22:27:32', '2020-12-27 22:27:32'),
(63, '2020-12-27 22:28:05', '2020-12-27 22:28:05'),
(64, '2020-12-27 22:28:29', '2020-12-27 22:28:29'),
(65, '2020-12-27 22:28:41', '2020-12-27 22:28:41'),
(66, '2020-12-27 22:29:10', '2020-12-27 22:29:10'),
(67, '2020-12-27 22:29:32', '2020-12-27 22:29:32'),
(68, '2020-12-27 22:30:06', '2020-12-27 22:30:06'),
(69, '2020-12-27 22:30:16', '2020-12-27 22:30:16'),
(70, '2020-12-27 22:30:50', '2020-12-27 22:30:50'),
(71, '2020-12-27 22:31:12', '2020-12-27 22:31:12'),
(72, '2020-12-27 22:31:29', '2020-12-27 22:31:29'),
(73, '2020-12-27 22:31:49', '2020-12-27 22:31:49'),
(74, '2020-12-27 22:32:31', '2020-12-27 22:32:31'),
(75, '2020-12-27 22:32:48', '2020-12-27 22:32:48'),
(76, '2020-12-27 22:33:18', '2020-12-27 22:33:18'),
(77, '2020-12-27 22:33:48', '2020-12-27 22:33:48'),
(78, '2020-12-27 22:34:06', '2020-12-27 22:34:06'),
(79, '2020-12-27 22:34:55', '2020-12-27 22:34:55'),
(80, '2020-12-27 22:35:16', '2020-12-27 22:35:16'),
(81, '2020-12-27 22:35:43', '2020-12-27 22:35:43'),
(82, '2020-12-27 22:37:33', '2020-12-27 22:37:33'),
(83, '2020-12-27 22:38:56', '2020-12-27 22:38:56'),
(84, '2020-12-27 22:59:21', '2020-12-27 22:59:21'),
(85, '2020-12-27 23:09:41', '2020-12-27 23:09:41'),
(86, '2020-12-27 23:10:54', '2020-12-27 23:10:54'),
(87, '2020-12-27 23:11:08', '2020-12-27 23:11:08'),
(88, '2020-12-27 23:11:30', '2020-12-27 23:11:30'),
(89, '2020-12-27 23:12:49', '2020-12-27 23:12:49'),
(90, '2020-12-27 23:14:32', '2020-12-27 23:14:32'),
(91, '2020-12-27 23:19:19', '2020-12-27 23:19:19'),
(92, '2020-12-27 23:19:52', '2020-12-27 23:19:52'),
(93, '2020-12-27 23:20:05', '2020-12-27 23:20:05'),
(94, '2020-12-27 23:20:49', '2020-12-27 23:20:49'),
(95, '2020-12-27 23:21:11', '2020-12-27 23:21:11'),
(96, '2020-12-27 23:21:48', '2020-12-27 23:21:48'),
(97, '2020-12-27 23:22:59', '2020-12-27 23:22:59'),
(98, '2020-12-27 23:25:51', '2020-12-27 23:25:51'),
(99, '2020-12-27 23:26:01', '2020-12-27 23:26:01'),
(100, '2020-12-27 23:27:12', '2020-12-27 23:27:12'),
(101, '2020-12-27 23:29:54', '2020-12-27 23:29:54'),
(102, '2020-12-27 23:31:39', '2020-12-27 23:31:39'),
(103, '2020-12-27 23:32:11', '2020-12-27 23:32:11'),
(104, '2020-12-27 23:35:26', '2020-12-27 23:35:26'),
(105, '2020-12-27 23:37:42', '2020-12-27 23:37:42'),
(106, '2020-12-27 23:42:17', '2020-12-27 23:42:17'),
(107, '2020-12-27 23:47:24', '2020-12-27 23:47:24'),
(108, '2020-12-27 23:48:45', '2020-12-27 23:48:45'),
(109, '2020-12-27 23:48:56', '2020-12-27 23:48:56'),
(110, '2020-12-27 23:49:20', '2020-12-27 23:49:20'),
(111, '2020-12-27 23:49:26', '2020-12-27 23:49:26'),
(112, '2020-12-27 23:49:48', '2020-12-27 23:49:48'),
(113, '2020-12-27 23:49:58', '2020-12-27 23:49:58'),
(114, '2020-12-27 23:50:11', '2020-12-27 23:50:11'),
(115, '2020-12-27 23:50:50', '2020-12-27 23:50:50'),
(116, '2020-12-27 23:51:04', '2020-12-27 23:51:04'),
(117, '2020-12-27 23:51:17', '2020-12-27 23:51:17'),
(118, '2020-12-27 23:51:23', '2020-12-27 23:51:23'),
(119, '2020-12-27 23:51:30', '2020-12-27 23:51:30'),
(120, '2020-12-27 23:51:48', '2020-12-27 23:51:48'),
(121, '2020-12-27 23:52:01', '2020-12-27 23:52:01'),
(122, '2020-12-27 23:52:33', '2020-12-27 23:52:33'),
(123, '2020-12-27 23:53:11', '2020-12-27 23:53:11'),
(124, '2020-12-27 23:53:23', '2020-12-27 23:53:23'),
(125, '2020-12-27 23:55:12', '2020-12-27 23:55:12'),
(126, '2020-12-27 23:55:54', '2020-12-27 23:55:54'),
(127, '2020-12-27 23:57:43', '2020-12-27 23:57:43'),
(128, '2020-12-27 23:57:56', '2020-12-27 23:57:56'),
(129, '2020-12-27 23:58:33', '2020-12-27 23:58:33'),
(130, '2020-12-28 00:01:14', '2020-12-28 00:01:14'),
(131, '2020-12-28 00:02:42', '2020-12-28 00:02:42'),
(132, '2020-12-28 00:04:46', '2020-12-28 00:04:46'),
(133, '2020-12-28 00:07:44', '2020-12-28 00:07:44'),
(134, '2020-12-28 00:07:56', '2020-12-28 00:07:56'),
(135, '2020-12-28 00:08:17', '2020-12-28 00:08:17'),
(136, '2020-12-28 00:08:43', '2020-12-28 00:08:43'),
(137, '2020-12-28 00:15:23', '2020-12-28 00:15:23'),
(138, '2020-12-28 00:15:39', '2020-12-28 00:15:39'),
(139, '2020-12-28 00:16:34', '2020-12-28 00:16:34'),
(140, '2020-12-28 00:17:26', '2020-12-28 00:17:26'),
(141, '2020-12-28 00:19:31', '2020-12-28 00:19:31'),
(142, '2020-12-28 00:23:12', '2020-12-28 00:23:12'),
(143, '2020-12-28 00:23:24', '2020-12-28 00:23:24'),
(144, '2020-12-28 00:24:03', '2020-12-28 00:24:03'),
(145, '2020-12-28 00:30:44', '2020-12-28 00:30:44'),
(146, '2020-12-28 10:56:07', '2020-12-28 10:56:07'),
(147, '2020-12-28 11:04:28', '2020-12-28 11:04:28'),
(148, '2020-12-28 11:05:01', '2020-12-28 11:05:01'),
(149, '2020-12-28 11:06:57', '2020-12-28 11:06:57'),
(150, '2020-12-28 11:07:56', '2020-12-28 11:07:56'),
(151, '2020-12-28 11:09:45', '2020-12-28 11:09:45'),
(152, '2020-12-28 11:10:52', '2020-12-28 11:10:52'),
(153, '2020-12-28 11:12:28', '2020-12-28 11:12:28'),
(154, '2020-12-28 11:16:52', '2020-12-28 11:16:52'),
(155, '2020-12-28 11:18:32', '2020-12-28 11:18:32'),
(156, '2020-12-28 11:20:06', '2020-12-28 11:20:06'),
(157, '2020-12-28 11:21:12', '2020-12-28 11:21:12'),
(158, '2020-12-28 11:22:38', '2020-12-28 11:22:38'),
(159, '2020-12-28 11:28:09', '2020-12-28 11:28:09'),
(160, '2020-12-28 11:29:28', '2020-12-28 11:29:28'),
(161, '2020-12-28 11:36:56', '2020-12-28 11:36:56'),
(162, '2020-12-28 11:37:57', '2020-12-28 11:37:57'),
(163, '2020-12-28 11:39:40', '2020-12-28 11:39:40'),
(164, '2020-12-28 11:40:42', '2020-12-28 11:40:42'),
(165, '2020-12-28 11:45:49', '2020-12-28 11:45:49'),
(166, '2020-12-28 11:46:52', '2020-12-28 11:46:52'),
(167, '2020-12-28 11:48:34', '2020-12-28 11:48:34'),
(168, '2020-12-28 11:51:33', '2020-12-28 11:51:33'),
(169, '2020-12-28 11:53:20', '2020-12-28 11:53:20'),
(170, '2020-12-28 11:54:12', '2020-12-28 11:54:12'),
(171, '2020-12-28 11:59:34', '2020-12-28 11:59:34'),
(172, '2020-12-28 12:01:39', '2020-12-28 12:01:39'),
(173, '2020-12-28 12:02:50', '2020-12-28 12:02:50'),
(174, '2020-12-28 12:09:56', '2020-12-28 12:09:56'),
(175, '2020-12-28 12:12:31', '2020-12-28 12:12:31'),
(176, '2020-12-28 12:14:21', '2020-12-28 12:14:21'),
(177, '2020-12-28 14:31:27', '2020-12-28 14:31:27'),
(178, '2020-12-28 14:38:37', '2020-12-28 14:38:37'),
(179, '2020-12-28 14:46:48', '2020-12-28 14:46:48'),
(180, '2020-12-28 14:50:21', '2020-12-28 14:50:21'),
(181, '2020-12-28 17:54:58', '2020-12-28 17:54:58'),
(182, '2020-12-28 18:38:08', '2020-12-28 18:38:08'),
(183, '2020-12-28 18:39:00', '2020-12-28 18:39:00'),
(184, '2020-12-28 20:43:00', '2020-12-28 20:43:00'),
(185, '2020-12-28 20:43:20', '2020-12-28 20:43:20'),
(186, '2020-12-28 20:47:49', '2020-12-28 20:47:49'),
(187, '2020-12-28 20:47:50', '2020-12-28 20:47:50'),
(188, '2020-12-28 20:47:59', '2020-12-28 20:47:59'),
(189, '2020-12-28 20:48:04', '2020-12-28 20:48:04'),
(190, '2020-12-28 20:48:20', '2020-12-28 20:48:20'),
(191, '2020-12-28 20:48:27', '2020-12-28 20:48:27'),
(192, '2020-12-28 20:52:01', '2020-12-28 20:52:01'),
(193, '2020-12-28 20:52:03', '2020-12-28 20:52:03'),
(194, '2020-12-28 20:52:22', '2020-12-28 20:52:22'),
(195, '2020-12-28 20:52:26', '2020-12-28 20:52:26'),
(196, '2020-12-28 20:52:28', '2020-12-28 20:52:28'),
(197, '2020-12-28 20:52:58', '2020-12-28 20:52:58'),
(198, '2020-12-28 20:53:00', '2020-12-28 20:53:00'),
(199, '2020-12-28 20:54:35', '2020-12-28 20:54:35'),
(200, '2020-12-28 20:56:45', '2020-12-28 20:56:45'),
(201, '2020-12-28 20:56:59', '2020-12-28 20:56:59'),
(202, '2020-12-28 20:57:03', '2020-12-28 20:57:03'),
(203, '2020-12-28 20:57:11', '2020-12-28 20:57:11'),
(204, '2020-12-28 20:57:18', '2020-12-28 20:57:18'),
(205, '2020-12-28 20:57:20', '2020-12-28 20:57:20'),
(206, '2020-12-28 20:57:23', '2020-12-28 20:57:23'),
(207, '2020-12-28 21:32:21', '2020-12-28 21:32:21'),
(208, '2020-12-28 23:47:57', '2020-12-28 23:47:57'),
(209, '2020-12-29 10:58:20', '2020-12-29 10:58:20'),
(210, '2020-12-29 10:58:34', '2020-12-29 10:58:34'),
(211, '2020-12-29 10:58:43', '2020-12-29 10:58:43'),
(212, '2020-12-29 11:02:14', '2020-12-29 11:02:14'),
(213, '2020-12-29 11:02:24', '2020-12-29 11:02:24'),
(214, '2020-12-29 11:02:32', '2020-12-29 11:02:32'),
(215, '2020-12-29 11:02:41', '2020-12-29 11:02:41'),
(216, '2020-12-29 11:04:00', '2020-12-29 11:04:00'),
(217, '2020-12-29 11:06:15', '2020-12-29 11:06:15'),
(218, '2020-12-29 11:09:42', '2020-12-29 11:09:42'),
(219, '2020-12-29 11:13:55', '2020-12-29 11:13:55'),
(220, '2020-12-29 11:15:22', '2020-12-29 11:15:22'),
(221, '2020-12-29 11:17:10', '2020-12-29 11:17:10'),
(222, '2020-12-29 11:18:02', '2020-12-29 11:18:02'),
(223, '2020-12-29 11:18:30', '2020-12-29 11:18:30'),
(224, '2020-12-29 11:19:36', '2020-12-29 11:19:36'),
(225, '2020-12-29 11:20:02', '2020-12-29 11:20:02'),
(226, '2020-12-29 11:20:35', '2020-12-29 11:20:35'),
(227, '2020-12-29 11:21:37', '2020-12-29 11:21:37'),
(228, '2020-12-29 11:21:48', '2020-12-29 11:21:48'),
(229, '2020-12-29 11:22:26', '2020-12-29 11:22:26'),
(230, '2020-12-29 11:23:00', '2020-12-29 11:23:00'),
(231, '2020-12-29 11:23:21', '2020-12-29 11:23:21'),
(232, '2020-12-29 11:24:35', '2020-12-29 11:24:35'),
(233, '2020-12-29 11:25:00', '2020-12-29 11:25:00'),
(234, '2020-12-29 12:10:49', '2020-12-29 12:10:49'),
(235, '2020-12-29 12:15:31', '2020-12-29 12:15:31'),
(236, '2020-12-29 12:16:06', '2020-12-29 12:16:06'),
(237, '2020-12-29 12:17:01', '2020-12-29 12:17:01'),
(238, '2020-12-29 12:21:04', '2020-12-29 12:21:04'),
(239, '2020-12-29 12:21:16', '2020-12-29 12:21:16'),
(240, '2020-12-29 12:21:29', '2020-12-29 12:21:29'),
(241, '2020-12-29 12:23:16', '2020-12-29 12:23:16'),
(242, '2020-12-29 12:24:34', '2020-12-29 12:24:34'),
(243, '2020-12-29 12:27:03', '2020-12-29 12:27:03'),
(244, '2020-12-29 12:27:13', '2020-12-29 12:27:13'),
(245, '2020-12-29 12:29:20', '2020-12-29 12:29:20'),
(246, '2020-12-29 12:29:55', '2020-12-29 12:29:55'),
(247, '2020-12-29 12:35:03', '2020-12-29 12:35:03'),
(248, '2020-12-29 12:36:54', '2020-12-29 12:36:54'),
(249, '2020-12-29 12:42:07', '2020-12-29 12:42:07'),
(250, '2020-12-29 12:44:24', '2020-12-29 12:44:24'),
(251, '2020-12-29 12:45:28', '2020-12-29 12:45:28'),
(252, '2020-12-29 13:48:11', '2020-12-29 13:48:11'),
(253, '2020-12-29 13:48:36', '2020-12-29 13:48:36'),
(254, '2020-12-29 13:54:40', '2020-12-29 13:54:40'),
(255, '2020-12-29 13:59:41', '2020-12-29 13:59:41'),
(256, '2020-12-29 14:10:06', '2020-12-29 14:10:06'),
(257, '2020-12-29 14:20:00', '2020-12-29 14:20:00'),
(258, '2020-12-29 14:27:58', '2020-12-29 14:27:58'),
(259, '2020-12-29 14:35:11', '2020-12-29 14:35:11'),
(260, '2020-12-29 14:36:50', '2020-12-29 14:36:50'),
(261, '2020-12-29 14:42:29', '2020-12-29 14:42:29'),
(262, '2020-12-29 14:46:33', '2020-12-29 14:46:33'),
(263, '2020-12-29 14:48:07', '2020-12-29 14:48:07'),
(264, '2020-12-29 14:49:31', '2020-12-29 14:49:31'),
(265, '2020-12-29 14:51:22', '2020-12-29 14:51:22'),
(266, '2020-12-29 14:51:59', '2020-12-29 14:51:59'),
(267, '2020-12-29 14:53:48', '2020-12-29 14:53:48'),
(268, '2020-12-29 14:54:47', '2020-12-29 14:54:47'),
(269, '2020-12-29 15:05:55', '2020-12-29 15:05:55'),
(270, '2020-12-29 16:42:22', '2020-12-29 16:42:22'),
(271, '2020-12-29 16:45:14', '2020-12-29 16:45:14'),
(272, '2020-12-29 16:45:33', '2020-12-29 16:45:33'),
(273, '2020-12-29 16:45:48', '2020-12-29 16:45:48'),
(274, '2020-12-29 16:46:06', '2020-12-29 16:46:06'),
(275, '2020-12-29 16:46:14', '2020-12-29 16:46:14'),
(276, '2020-12-29 16:46:29', '2020-12-29 16:46:29'),
(277, '2020-12-29 16:46:41', '2020-12-29 16:46:41'),
(278, '2020-12-29 16:47:04', '2020-12-29 16:47:04'),
(279, '2020-12-29 16:47:24', '2020-12-29 16:47:24'),
(280, '2020-12-29 16:47:30', '2020-12-29 16:47:30'),
(281, '2020-12-29 16:51:43', '2020-12-29 16:51:43'),
(282, '2020-12-29 16:52:08', '2020-12-29 16:52:08'),
(283, '2020-12-29 16:53:40', '2020-12-29 16:53:40'),
(284, '2020-12-29 16:54:06', '2020-12-29 16:54:06'),
(285, '2020-12-29 16:54:18', '2020-12-29 16:54:18'),
(286, '2020-12-29 16:54:41', '2020-12-29 16:54:41'),
(287, '2020-12-29 16:54:47', '2020-12-29 16:54:47'),
(288, '2020-12-29 16:56:36', '2020-12-29 16:56:36'),
(289, '2020-12-29 16:57:06', '2020-12-29 16:57:06'),
(290, '2020-12-29 16:57:24', '2020-12-29 16:57:24'),
(291, '2020-12-29 17:04:49', '2020-12-29 17:04:49'),
(292, '2020-12-29 17:06:51', '2020-12-29 17:06:51'),
(293, '2020-12-29 17:11:45', '2020-12-29 17:11:45'),
(294, '2020-12-29 17:11:48', '2020-12-29 17:11:48'),
(295, '2020-12-29 17:11:50', '2020-12-29 17:11:50'),
(296, '2020-12-29 17:11:52', '2020-12-29 17:11:52'),
(297, '2020-12-29 17:12:01', '2020-12-29 17:12:01'),
(298, '2020-12-29 17:12:11', '2020-12-29 17:12:11'),
(299, '2020-12-29 17:12:25', '2020-12-29 17:12:25'),
(300, '2020-12-29 17:12:39', '2020-12-29 17:12:39'),
(301, '2020-12-29 17:13:23', '2020-12-29 17:13:23'),
(302, '2020-12-29 17:13:25', '2020-12-29 17:13:25'),
(303, '2020-12-29 17:13:27', '2020-12-29 17:13:27'),
(304, '2020-12-29 17:13:51', '2020-12-29 17:13:51'),
(305, '2020-12-29 17:16:09', '2020-12-29 17:16:09'),
(306, '2020-12-29 17:16:14', '2020-12-29 17:16:14'),
(307, '2020-12-29 17:16:16', '2020-12-29 17:16:16'),
(308, '2020-12-29 17:16:19', '2020-12-29 17:16:19'),
(309, '2020-12-29 17:16:47', '2020-12-29 17:16:47'),
(310, '2020-12-29 17:18:28', '2020-12-29 17:18:28'),
(311, '2020-12-29 17:18:39', '2020-12-29 17:18:39'),
(312, '2020-12-29 17:22:16', '2020-12-29 17:22:16'),
(313, '2020-12-29 17:22:28', '2020-12-29 17:22:28'),
(314, '2020-12-29 17:23:04', '2020-12-29 17:23:04'),
(315, '2020-12-29 17:23:14', '2020-12-29 17:23:14'),
(316, '2020-12-29 17:23:26', '2020-12-29 17:23:26'),
(317, '2020-12-29 17:23:51', '2020-12-29 17:23:51'),
(318, '2020-12-29 17:23:58', '2020-12-29 17:23:58'),
(319, '2020-12-29 17:24:25', '2020-12-29 17:24:25'),
(320, '2020-12-29 17:25:50', '2020-12-29 17:25:50'),
(321, '2020-12-29 17:25:57', '2020-12-29 17:25:57'),
(322, '2020-12-29 17:27:47', '2020-12-29 17:27:47'),
(323, '2020-12-29 17:28:15', '2020-12-29 17:28:15'),
(324, '2020-12-29 17:29:49', '2020-12-29 17:29:49'),
(325, '2020-12-29 17:32:10', '2020-12-29 17:32:10'),
(326, '2020-12-29 17:32:49', '2020-12-29 17:32:49'),
(327, '2020-12-29 17:33:05', '2020-12-29 17:33:05'),
(328, '2020-12-29 17:35:24', '2020-12-29 17:35:24'),
(329, '2020-12-29 17:37:37', '2020-12-29 17:37:37'),
(330, '2020-12-29 17:38:38', '2020-12-29 17:38:38'),
(331, '2020-12-29 17:39:33', '2020-12-29 17:39:33'),
(332, '2020-12-29 17:39:47', '2020-12-29 17:39:47'),
(333, '2020-12-29 17:39:55', '2020-12-29 17:39:55'),
(334, '2020-12-29 17:40:37', '2020-12-29 17:40:37'),
(335, '2020-12-29 17:41:26', '2020-12-29 17:41:26'),
(336, '2020-12-29 17:42:39', '2020-12-29 17:42:39'),
(337, '2020-12-29 17:43:07', '2020-12-29 17:43:07'),
(338, '2020-12-29 17:43:13', '2020-12-29 17:43:13'),
(339, '2020-12-29 17:43:44', '2020-12-29 17:43:44'),
(340, '2020-12-29 18:17:05', '2020-12-29 18:17:05'),
(341, '2020-12-29 18:19:01', '2020-12-29 18:19:01'),
(342, '2020-12-29 18:19:17', '2020-12-29 18:19:17'),
(343, '2020-12-29 18:19:38', '2020-12-29 18:19:38'),
(344, '2020-12-29 18:19:49', '2020-12-29 18:19:49'),
(345, '2020-12-29 18:20:27', '2020-12-29 18:20:27'),
(346, '2020-12-29 18:22:50', '2020-12-29 18:22:50'),
(347, '2020-12-29 18:23:21', '2020-12-29 18:23:21'),
(348, '2020-12-29 18:23:38', '2020-12-29 18:23:38'),
(349, '2020-12-29 18:36:17', '2020-12-29 18:36:17'),
(350, '2020-12-29 18:38:16', '2020-12-29 18:38:16'),
(351, '2020-12-29 18:40:05', '2020-12-29 18:40:05'),
(352, '2020-12-29 18:40:26', '2020-12-29 18:40:26'),
(353, '2020-12-29 18:40:32', '2020-12-29 18:40:32'),
(354, '2020-12-29 18:41:03', '2020-12-29 18:41:03'),
(355, '2020-12-29 18:47:59', '2020-12-29 18:47:59'),
(356, '2020-12-29 18:48:50', '2020-12-29 18:48:50'),
(357, '2020-12-29 19:01:10', '2020-12-29 19:01:10'),
(358, '2020-12-29 19:03:31', '2020-12-29 19:03:31'),
(359, '2020-12-29 19:03:35', '2020-12-29 19:03:35'),
(360, '2020-12-29 19:04:17', '2020-12-29 19:04:17'),
(361, '2020-12-29 19:04:55', '2020-12-29 19:04:55'),
(362, '2020-12-29 19:05:36', '2020-12-29 19:05:36'),
(363, '2020-12-29 19:06:03', '2020-12-29 19:06:03'),
(364, '2020-12-29 19:07:03', '2020-12-29 19:07:03'),
(365, '2020-12-29 19:07:22', '2020-12-29 19:07:22'),
(366, '2020-12-29 19:07:28', '2020-12-29 19:07:28'),
(367, '2020-12-29 19:08:03', '2020-12-29 19:08:03'),
(368, '2020-12-29 19:08:09', '2020-12-29 19:08:09'),
(369, '2020-12-29 19:12:40', '2020-12-29 19:12:40'),
(370, '2020-12-29 19:13:21', '2020-12-29 19:13:21'),
(371, '2020-12-29 19:14:16', '2020-12-29 19:14:16'),
(372, '2020-12-29 19:15:33', '2020-12-29 19:15:33'),
(373, '2020-12-29 19:16:07', '2020-12-29 19:16:07'),
(374, '2020-12-29 19:16:54', '2020-12-29 19:16:54'),
(375, '2020-12-29 19:18:15', '2020-12-29 19:18:15'),
(376, '2020-12-29 19:18:36', '2020-12-29 19:18:36'),
(377, '2020-12-29 19:40:16', '2020-12-29 19:40:16'),
(378, '2020-12-29 19:40:55', '2020-12-29 19:40:55'),
(379, '2020-12-29 19:41:36', '2020-12-29 19:41:36'),
(380, '2020-12-29 19:41:53', '2020-12-29 19:41:53'),
(381, '2020-12-29 19:47:33', '2020-12-29 19:47:33'),
(382, '2020-12-29 19:49:58', '2020-12-29 19:49:58'),
(383, '2020-12-29 19:51:04', '2020-12-29 19:51:04'),
(384, '2020-12-29 19:54:02', '2020-12-29 19:54:02'),
(385, '2020-12-29 19:54:21', '2020-12-29 19:54:21'),
(386, '2020-12-29 19:56:41', '2020-12-29 19:56:41'),
(387, '2020-12-29 19:58:05', '2020-12-29 19:58:05'),
(388, '2020-12-29 19:59:10', '2020-12-29 19:59:10'),
(389, '2020-12-29 20:00:15', '2020-12-29 20:00:15'),
(390, '2020-12-29 20:01:52', '2020-12-29 20:01:52'),
(391, '2020-12-29 20:02:11', '2020-12-29 20:02:11'),
(392, '2020-12-29 20:02:51', '2020-12-29 20:02:51'),
(393, '2020-12-29 20:03:07', '2020-12-29 20:03:07'),
(394, '2020-12-29 20:03:21', '2020-12-29 20:03:21'),
(395, '2020-12-29 20:03:42', '2020-12-29 20:03:42'),
(396, '2020-12-29 20:04:01', '2020-12-29 20:04:01'),
(397, '2020-12-29 20:04:07', '2020-12-29 20:04:07'),
(398, '2020-12-29 20:04:21', '2020-12-29 20:04:21'),
(399, '2020-12-29 20:06:01', '2020-12-29 20:06:01'),
(400, '2020-12-30 11:06:02', '2020-12-30 11:06:02'),
(401, '2020-12-30 11:07:50', '2020-12-30 11:07:50'),
(402, '2020-12-30 11:08:13', '2020-12-30 11:08:13'),
(403, '2020-12-30 11:08:25', '2020-12-30 11:08:25'),
(404, '2020-12-30 11:09:14', '2020-12-30 11:09:14'),
(405, '2020-12-30 11:09:30', '2020-12-30 11:09:30'),
(406, '2020-12-30 11:09:42', '2020-12-30 11:09:42'),
(407, '2020-12-30 11:10:13', '2020-12-30 11:10:13'),
(408, '2020-12-30 11:10:21', '2020-12-30 11:10:21'),
(409, '2020-12-30 11:10:45', '2020-12-30 11:10:45'),
(410, '2020-12-30 11:11:59', '2020-12-30 11:11:59'),
(411, '2020-12-30 11:13:56', '2020-12-30 11:13:56'),
(412, '2020-12-30 11:14:18', '2020-12-30 11:14:18'),
(413, '2020-12-30 11:14:43', '2020-12-30 11:14:43'),
(414, '2020-12-30 11:16:16', '2020-12-30 11:16:16'),
(415, '2020-12-30 11:16:45', '2020-12-30 11:16:45'),
(416, '2020-12-30 11:17:20', '2020-12-30 11:17:20'),
(417, '2020-12-30 11:17:51', '2020-12-30 11:17:51'),
(418, '2020-12-30 11:18:30', '2020-12-30 11:18:30'),
(419, '2020-12-30 11:19:08', '2020-12-30 11:19:08'),
(420, '2020-12-30 11:20:42', '2020-12-30 11:20:42'),
(421, '2020-12-30 11:26:14', '2020-12-30 11:26:14'),
(422, '2020-12-30 11:36:55', '2020-12-30 11:36:55'),
(423, '2020-12-30 11:37:53', '2020-12-30 11:37:53'),
(424, '2020-12-30 11:38:24', '2020-12-30 11:38:24'),
(425, '2020-12-30 11:38:38', '2020-12-30 11:38:38'),
(426, '2020-12-30 11:39:40', '2020-12-30 11:39:40'),
(427, '2020-12-30 11:41:04', '2020-12-30 11:41:04'),
(428, '2020-12-30 11:42:33', '2020-12-30 11:42:33'),
(429, '2020-12-30 11:43:40', '2020-12-30 11:43:40'),
(430, '2020-12-30 11:44:09', '2020-12-30 11:44:09'),
(431, '2020-12-30 11:44:22', '2020-12-30 11:44:22'),
(432, '2020-12-30 11:44:53', '2020-12-30 11:44:53'),
(433, '2020-12-30 11:45:03', '2020-12-30 11:45:03'),
(434, '2020-12-30 11:45:08', '2020-12-30 11:45:08'),
(435, '2020-12-30 11:45:18', '2020-12-30 11:45:18'),
(436, '2020-12-30 11:45:38', '2020-12-30 11:45:38'),
(437, '2020-12-30 11:47:57', '2020-12-30 11:47:57'),
(438, '2020-12-30 11:50:01', '2020-12-30 11:50:01'),
(439, '2020-12-30 11:50:04', '2020-12-30 11:50:04'),
(440, '2020-12-30 11:50:17', '2020-12-30 11:50:17'),
(441, '2020-12-30 11:50:33', '2020-12-30 11:50:33'),
(442, '2020-12-30 11:50:44', '2020-12-30 11:50:44'),
(443, '2020-12-30 11:51:01', '2020-12-30 11:51:01'),
(444, '2020-12-30 11:51:08', '2020-12-30 11:51:08'),
(445, '2020-12-30 11:51:35', '2020-12-30 11:51:35'),
(446, '2020-12-30 11:51:43', '2020-12-30 11:51:43'),
(447, '2020-12-30 11:52:02', '2020-12-30 11:52:02'),
(448, '2020-12-30 11:53:26', '2020-12-30 11:53:26'),
(449, '2020-12-30 11:54:26', '2020-12-30 11:54:26'),
(450, '2020-12-30 11:56:22', '2020-12-30 11:56:22'),
(451, '2020-12-30 12:01:40', '2020-12-30 12:01:40'),
(452, '2020-12-30 12:03:29', '2020-12-30 12:03:29'),
(453, '2020-12-30 12:04:32', '2020-12-30 12:04:32'),
(454, '2020-12-30 12:05:24', '2020-12-30 12:05:24'),
(455, '2020-12-30 12:07:06', '2020-12-30 12:07:06'),
(456, '2020-12-30 12:07:28', '2020-12-30 12:07:28'),
(457, '2020-12-30 12:08:42', '2020-12-30 12:08:42'),
(458, '2020-12-30 12:10:02', '2020-12-30 12:10:02'),
(459, '2020-12-30 12:11:06', '2020-12-30 12:11:06'),
(460, '2020-12-30 12:11:22', '2020-12-30 12:11:22'),
(461, '2020-12-30 12:11:37', '2020-12-30 12:11:37'),
(462, '2020-12-30 12:11:55', '2020-12-30 12:11:55'),
(463, '2020-12-30 12:16:35', '2020-12-30 12:16:35'),
(464, '2020-12-30 12:16:58', '2020-12-30 12:16:58'),
(465, '2020-12-30 12:17:52', '2020-12-30 12:17:52'),
(466, '2020-12-30 12:20:41', '2020-12-30 12:20:41'),
(467, '2020-12-30 12:22:43', '2020-12-30 12:22:43'),
(468, '2020-12-30 12:22:52', '2020-12-30 12:22:52'),
(469, '2020-12-30 12:27:34', '2020-12-30 12:27:34'),
(470, '2020-12-30 12:27:42', '2020-12-30 12:27:42'),
(471, '2020-12-30 12:27:51', '2020-12-30 12:27:51'),
(472, '2020-12-30 12:27:58', '2020-12-30 12:27:58'),
(473, '2020-12-30 12:28:23', '2020-12-30 12:28:23'),
(474, '2020-12-30 12:28:46', '2020-12-30 12:28:46'),
(475, '2020-12-30 12:30:33', '2020-12-30 12:30:33'),
(476, '2020-12-30 12:31:34', '2020-12-30 12:31:34'),
(477, '2020-12-30 12:31:46', '2020-12-30 12:31:46'),
(478, '2020-12-30 12:32:31', '2020-12-30 12:32:31'),
(479, '2020-12-30 12:33:03', '2020-12-30 12:33:03'),
(480, '2020-12-30 12:33:38', '2020-12-30 12:33:38');

-- --------------------------------------------------------

--
-- Structure de la table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int NOT NULL,
  `websocket_message_count` int NOT NULL,
  `api_message_count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `chatts`
--
ALTER TABLE `chatts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `emplois`
--
ALTER TABLE `emplois`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `galeries`
--
ALTER TABLE `galeries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeries_user_id_foreign` (`user_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `operation_admins`
--
ALTER TABLE `operation_admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `user_user`
--
ALTER TABLE `user_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `chatts`
--
ALTER TABLE `chatts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `emplois`
--
ALTER TABLE `emplois`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `galeries`
--
ALTER TABLE `galeries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `operation_admins`
--
ALTER TABLE `operation_admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `user_user`
--
ALTER TABLE `user_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- AUTO_INCREMENT pour la table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `galeries`
--
ALTER TABLE `galeries`
  ADD CONSTRAINT `galeries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
