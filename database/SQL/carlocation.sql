-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 07, 2020 at 09:02 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `carlocation`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `prix` double(8,2) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_voiture` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `date_debut`, `date_fin`, `prix`, `id_user`, `id_voiture`) VALUES
(8, '2020-06-27', '2020-06-28', 150.00, 5, 11),
(9, '2020-06-28', '2020-07-12', 3000.00, 6, 10),
(10, '2020-06-28', '2020-08-07', 9020.00, 7, 8),
(11, '2020-07-06', '2020-07-12', 350.00, 5, 11),
(12, '2020-07-07', '2020-07-16', 2450.00, 8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `marques`
--

CREATE TABLE `marques` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marques`
--

INSERT INTO `marques` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(1, 'Mercedes', '2020-06-24 22:00:00', NULL),
(2, 'Audi', '2020-06-24 22:00:00', '2020-06-27 14:35:34'),
(3, 'Bmw', '2020-06-24 22:00:00', NULL),
(4, 'Peugeot', '2020-06-28 18:58:29', '2020-06-28 18:58:29'),
(5, 'Lamborghini', '2020-07-07 05:34:08', '2020-07-07 05:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_24_183543_create_voiture_table', 2),
(5, '2020_06_24_213410_add_roles_to_users_table', 3),
(6, '2020_06_25_192331_create_marques_table', 4),
(7, '2020_06_25_192625_create_modeles_table', 4),
(8, '2020_06_25_200211_add_voiture_foreign_key', 5),
(9, '2020_06_25_202029_add_foreign_key_modele', 6),
(10, '2020_06_25_232050_add_field_image', 7),
(11, '2020_06_26_113939_add_date_immat_to_voiture', 8),
(12, '2020_06_26_180607_add_field_km_description_to_voiture', 9),
(13, '2020_06_26_183513_add_field_couleur_to_voiture', 10),
(14, '2020_06_27_215716_create_location_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `modeles`
--

CREATE TABLE `modeles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_marque` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modeles`
--

INSERT INTO `modeles` (`id`, `nom`, `id_marque`, `created_at`, `updated_at`) VALUES
(1, 'CLA', 1, NULL, '2020-06-27 14:54:53'),
(2, 'Classe A', 1, NULL, NULL),
(3, 'A3', 2, NULL, NULL),
(4, 'RS6', 2, NULL, NULL),
(5, '330d', 3, NULL, NULL),
(6, '850i', 3, NULL, NULL),
(7, '308', 4, '2020-06-28 18:58:38', '2020-06-28 18:58:38'),
(8, 'Urus', 5, '2020-07-07 05:34:18', '2020-07-07 05:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('djaizansi93@gmail.com', '$2y$10$CwFZPBTRvbWsCBzLrfPWwOnpfpjU/2mdX4fmG8817czBHCDjhe8ii', '2020-06-24 18:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES
(1, 'Youcef', 'youcef.jallali@gmail.com', NULL, '$2y$10$V8rgZHRZvYQrGuOOyIYAtuICQMt9d7LdVUFmSPqwTjAUcglaJZnpm', 'F37QEONqOOeHBPLi3kzcMXOTdnUkUb9qJ8Hmic8M2P8gP4L9PGEkuxMmyU0B', '2020-06-23 11:49:13', '2020-07-07 16:10:31', 'admin'),
(5, 'djaizansi', 'djaizansi93@gmail.com', NULL, '$2y$10$LUPV0aYMnZvYia3ckrGnOeMgvAiwQS/lNyoR1RvySAghv1FOi6bh.', NULL, '2020-06-24 18:35:13', '2020-06-24 18:48:50', 'client'),
(6, 'Ahmed', 'youyous123@gmail.com', NULL, '$2y$10$1Z30JlaP/2V2gvwjveAIyOAPtVzej1GD76/LF/twoZ61ghMsn6Rh2', '2TAgxzojktWigtIw4rY567R6qX7QCOupTkR0iHed4pLcAfSZM99sg20amJ3G', '2020-06-28 17:41:36', '2020-06-28 18:26:47', 'client'),
(7, 'Marwane', 'manbou92@gmail.com', NULL, '$2y$10$Tbet6PDLBjHbtfbwsAgp0OrPXFNwo96UPRN9XmU7c7XNDQ.Nfztt2', NULL, '2020-06-28 18:33:06', '2020-06-28 18:33:06', 'client'),
(8, 'azerty', 'azerty123@gmail.com', NULL, '$2y$10$UqH5IWeoWJPQPll1IoiqgecbRYVjVghSbkeUQEDqpwtZpTwNpS2ly', NULL, '2020-07-07 16:13:56', '2020-07-07 16:13:56', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

CREATE TABLE `voiture` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_marque` int(10) UNSIGNED DEFAULT NULL,
  `id_modele` int(10) UNSIGNED DEFAULT NULL,
  `prix` float NOT NULL,
  `couleur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometrage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_immat` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`id`, `id_marque`, `id_modele`, `prix`, `couleur`, `image`, `description`, `kilometrage`, `date_immat`, `created_at`, `updated_at`) VALUES
(7, 2, 4, 245, '#80917e', '1593294565.jpg', 'Voiture cool', '40000', '2020-04-30', '2020-06-26 14:27:16', '2020-06-27 19:49:25'),
(8, 2, 4, 220, '#000000', '1593188880.jpeg', 'Voiture', '1000', '2020-05-16', '2020-06-26 14:28:00', '2020-06-27 11:44:19'),
(9, 2, 3, 150, '#ff0000', '1593375173.jpg', 'Toutes options', '12000', '2020-01-04', '2020-06-28 18:12:53', '2020-06-28 18:12:53'),
(10, 1, 1, 200, '#000000', '1593377580.png', 'Toutes options', '12598', '2020-03-06', '2020-06-28 18:53:01', '2020-06-28 18:53:01'),
(11, 4, 7, 50, '#0058e6', '1593378116.png', 'Toutes options', '89255', '2015-07-30', '2020-06-28 19:01:57', '2020-06-28 19:01:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `locations_id_user_foreign` (`id_user`),
  ADD KEY `locations_id_voiture_foreign` (`id_voiture`);

--
-- Indexes for table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modeles`
--
ALTER TABLE `modeles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modeles_id_marque_foreign` (`id_marque`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voiture_id_modele_foreign` (`id_modele`),
  ADD KEY `voiture_id_marque_foreign` (`id_marque`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `modeles`
--
ALTER TABLE `modeles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `locations_id_voiture_foreign` FOREIGN KEY (`id_voiture`) REFERENCES `voiture` (`id`);

--
-- Constraints for table `modeles`
--
ALTER TABLE `modeles`
  ADD CONSTRAINT `modeles_id_marque_foreign` FOREIGN KEY (`id_marque`) REFERENCES `marques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `voiture_id_marque_foreign` FOREIGN KEY (`id_marque`) REFERENCES `marques` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voiture_id_modele_foreign` FOREIGN KEY (`id_modele`) REFERENCES `modeles` (`id`);