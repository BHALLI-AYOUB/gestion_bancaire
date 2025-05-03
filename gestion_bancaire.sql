-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 13 août 2024 à 18:09
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_bancaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `attijariwafa`
--

CREATE TABLE `attijariwafa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `establishment` varchar(255) NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `lcn_number` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `attijariwafa`
--

INSERT INTO `attijariwafa` (`id`, `date`, `type`, `establishment`, `payer_name`, `lcn_number`, `due_date`, `amount`, `created_at`, `updated_at`, `account_number`) VALUES
(1, '2024-08-12', 'escompte', '12345', 'NASHA', '15', '2024-08-28', 203003.00, '2024-08-12 09:37:44', '2024-08-12 09:37:44', '190 780 21211 7163212 000 1 61');

-- --------------------------------------------------------

--
-- Structure de la table `bcp`
--

CREATE TABLE `bcp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `establishment` varchar(255) NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `lcn_number` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bcp`
--

INSERT INTO `bcp` (`id`, `date`, `type`, `establishment`, `payer_name`, `lcn_number`, `due_date`, `amount`, `created_at`, `updated_at`, `account_number`) VALUES
(1, '2024-08-12', 'escompte', '7LIWA', 'amanto', '2345', '2024-08-13', 10010.00, '2024-08-12 09:26:14', '2024-08-12 09:26:14', '190 780 21211 7163212 000 1 58'),
(2, '2024-08-13', 'encaissement', 'etablissement', 'NASHA', '15', '2024-08-14', 3000.00, '2024-08-13 14:26:46', '2024-08-13 14:26:46', '190 780 21211 7163212 000 1 58');

-- --------------------------------------------------------

--
-- Structure de la table `bmce`
--

CREATE TABLE `bmce` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `establishment` varchar(255) NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `lcn_number` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bmce`
--

INSERT INTO `bmce` (`id`, `date`, `type`, `establishment`, `payer_name`, `lcn_number`, `due_date`, `amount`, `created_at`, `updated_at`, `account_number`) VALUES
(2, '2024-08-08', 'escompte', 'LIYAM', 'ayoub', '1222', '2024-08-19', 4321.00, '2024-08-08 09:52:43', '2024-08-08 09:52:43', '190 780 21211 7163212 000 1 59');

-- --------------------------------------------------------

--
-- Structure de la table `bmci`
--

CREATE TABLE `bmci` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `establishment` varchar(255) NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `lcn_number` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bmci`
--

INSERT INTO `bmci` (`id`, `date`, `type`, `establishment`, `payer_name`, `lcn_number`, `due_date`, `amount`, `created_at`, `updated_at`, `account_number`) VALUES
(1, '2024-08-08', 'escompte', '12345', 'QW', '1717', '2024-08-06', 2001.10, '2024-08-08 12:47:35', '2024-08-08 12:47:35', '190 780 21211 7163212 000 1 62');

-- --------------------------------------------------------

--
-- Structure de la table `bons`
--

CREATE TABLE `bons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `type` enum('encaissement','escompte') NOT NULL,
  `establishment` varchar(255) NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `lcn_number` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Structure de la table `cih`
--

CREATE TABLE `cih` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `establishment` varchar(255) NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `lcn_number` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cih`
--

INSERT INTO `cih` (`id`, `date`, `type`, `establishment`, `payer_name`, `lcn_number`, `due_date`, `amount`, `created_at`, `updated_at`, `account_number`) VALUES
(1, '2024-08-08', 'encaissement', 'SIDIALI', 'nom', '20', '2024-08-05', 2001.00, '2024-08-08 12:22:39', '2024-08-08 12:22:39', '190 780 21211 7163212 000 1 60');

-- --------------------------------------------------------

--
-- Structure de la table `credit_agricole`
--

CREATE TABLE `credit_agricole` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `establishment` varchar(255) NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `lcn_number` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2024_08_01_081725_create_bons_table', 2),
(5, '2024_08_01_092706_create_bcp_table', 3),
(6, '2024_08_01_092707_create_bmce_table', 3),
(7, '2024_08_01_092708_create_attijariwafa_table', 3),
(8, '2024_08_01_092708_create_cih_table', 3),
(9, '2024_08_01_092709_create_bmci_table', 3),
(10, '2024_08_01_092710_create_credit_agricole_table', 3),
(11, '2024_08_01_092710_create_sgma_table', 3),
(12, '2024_08_01_100557_add_account_number_to_bmce_table', 4),
(13, '2024_08_01_100820_add_account_number_to_bcp_table', 4),
(14, '2024_08_01_100821_add_account_number_to_cih_table', 4),
(15, '2024_08_01_100822_add_account_number_to_attijariwafa_bank_table', 4),
(16, '2024_08_01_100822_add_account_number_to_bmci_table', 4),
(17, '2024_08_01_100823_add_account_number_to_sgma_table', 4),
(18, '2024_08_01_100824_add_account_number_to_credit_agricole_table', 4),
(19, '2024_08_01_101020_add_account_number_to_bcp_table', 4);

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
('I2YVA68OmKXXTZNPt5eKNrqtEYvmSANAkEEkdiKW', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoia1NLSVd2T2ZtRDdXbVJWeGw4ck1ybndqSlVOaFJuNGhhZDZXS2IybCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYW5rIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3MjM1NjI3NDI7fX0=', 1723563349);

-- --------------------------------------------------------

--
-- Structure de la table `sgma`
--

CREATE TABLE `sgma` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` varchar(255) NOT NULL,
  `establishment` varchar(255) NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `lcn_number` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sgma`
--

INSERT INTO `sgma` (`id`, `date`, `type`, `establishment`, `payer_name`, `lcn_number`, `due_date`, `amount`, `created_at`, `updated_at`, `account_number`) VALUES
(1, '2024-08-08', 'encaissement', '2345', 'nom', '000', '2024-08-31', 2001.00, '2024-08-08 09:15:16', '2024-08-08 09:15:16', '190 780 21211 7163212 000 1 63');

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

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ayoub', 'ayoubbhalli464@gmail.com', NULL, '$2y$12$/G8e.tuXVLJcY0VN2CiqR.jdAWIxAeMO64nQGn3O6lHUCwvvjt4Le', NULL, '2024-08-06 07:54:48', '2024-08-06 07:54:48');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attijariwafa`
--
ALTER TABLE `attijariwafa`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bcp`
--
ALTER TABLE `bcp`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bmce`
--
ALTER TABLE `bmce`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bmci`
--
ALTER TABLE `bmci`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bons`
--
ALTER TABLE `bons`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `cih`
--
ALTER TABLE `cih`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `credit_agricole`
--
ALTER TABLE `credit_agricole`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Index pour la table `sgma`
--
ALTER TABLE `sgma`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attijariwafa`
--
ALTER TABLE `attijariwafa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `bcp`
--
ALTER TABLE `bcp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `bmce`
--
ALTER TABLE `bmce`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `bmci`
--
ALTER TABLE `bmci`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `bons`
--
ALTER TABLE `bons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cih`
--
ALTER TABLE `cih`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `credit_agricole`
--
ALTER TABLE `credit_agricole`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `sgma`
--
ALTER TABLE `sgma`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
