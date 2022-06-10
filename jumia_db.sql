-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2022 at 07:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jumia_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seat` bigint(20) UNSIGNED NOT NULL,
  `user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `seat`, `user`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2022-06-10 13:00:53', '2022-06-10 13:00:53'),
(3, 4, 1, '2022-06-10 13:00:53', '2022-06-10 13:00:53'),
(4, 10, 1, '2022-06-10 15:16:35', '2022-06-10 15:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_10_012418_create_permission_tables', 2),
(6, '2022_06_10_064006_create_stations_table', 3),
(7, '2022_06_10_114205_create_trips_table', 4),
(8, '2022_06_10_125628_create_booking_table', 5),
(9, '2022_06_10_130358_create_seats_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 9),
(2, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create_stations', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(2, 'update_stations', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(3, 'show_stations', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(4, 'delete_stations', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(5, 'create_roles', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(6, 'update_roles', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(7, 'show_roles', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(8, 'delete_roles', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(9, 'show_permissions', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(10, 'assign_permissions', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(11, 'create_trips', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(12, 'update_trips', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(13, 'show_trips', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(14, 'delete_trips', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(15, 'create_users', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(16, 'update_users', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(17, 'show_users', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11'),
(18, 'delete_users', 'web', '2022-06-10 04:13:11', '2022-06-10 04:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-06-10 04:10:43', '2022-06-10 04:10:43'),
(2, 'User', 'web', '2022-06-10 04:10:43', '2022-06-10 04:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) UNSIGNED NOT NULL,
  `to` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `trip`, `from`, `to`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 2, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(2, 10, 2, 5, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(3, 10, 5, 3, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(4, 10, 1, 2, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(5, 10, 2, 5, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(6, 10, 5, 3, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(7, 10, 1, 2, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(8, 10, 2, 5, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(9, 10, 5, 3, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(10, 10, 1, 2, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(11, 10, 2, 5, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(12, 10, 5, 3, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(13, 10, 1, 2, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(14, 10, 2, 5, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(15, 10, 5, 3, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(16, 10, 1, 2, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(17, 10, 2, 5, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(18, 10, 5, 3, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(19, 10, 1, 2, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(20, 10, 2, 5, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(21, 10, 5, 3, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(22, 10, 1, 2, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(23, 10, 2, 5, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(24, 10, 5, 3, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(25, 10, 1, 2, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(26, 10, 2, 5, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(27, 10, 5, 3, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(28, 10, 1, 2, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(29, 10, 2, 5, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(30, 10, 5, 3, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(31, 10, 1, 2, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(32, 10, 2, 5, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(33, 10, 5, 3, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(34, 10, 1, 2, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(35, 10, 2, 5, '2022-06-10 11:27:51', '2022-06-10 11:27:51'),
(36, 10, 5, 3, '2022-06-10 11:27:51', '2022-06-10 11:27:51');

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Cairo', '2022-06-10 04:52:11', '2022-06-10 04:52:11'),
(2, 'Alexandria', '2022-06-10 04:52:11', '2022-06-10 04:52:11'),
(3, 'Giza', '2022-06-10 04:52:11', '2022-06-10 04:52:11'),
(4, 'Shubra el-Khema', '2022-06-10 04:52:11', '2022-06-10 04:52:11'),
(5, 'Port Said', '2022-06-10 04:52:11', '2022-06-10 04:52:11'),
(6, 'Suez', '2022-06-10 04:52:11', '2022-06-10 04:52:11'),
(7, 'El Mahalla el Kubra', '2022-06-10 04:52:11', '2022-06-10 04:52:11'),
(8, 'El Mansoura', '2022-06-10 04:52:11', '2022-06-10 04:52:11'),
(9, 'Tanta', '2022-06-10 04:52:11', '2022-06-10 04:52:11'),
(10, 'Asyut', '2022-06-10 04:52:11', '2022-06-10 04:52:11'),
(11, 'Fayoum', '2022-06-10 04:52:11', '2022-06-10 04:52:11'),
(12, 'Zagazig', '2022-06-10 04:52:11', '2022-06-10 04:52:11'),
(13, 'Ismailia', '2022-06-10 04:52:11', '2022-06-10 04:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) UNSIGNED NOT NULL,
  `to` bigint(20) UNSIGNED NOT NULL,
  `cross` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `from`, `to`, `cross`, `created_at`, `updated_at`) VALUES
(10, 1, 3, '{\"1\":\"2\",\"2\":\"5\"}', '2022-06-10 11:27:51', '2022-06-10 11:27:51');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$yVG6gDgKJhLX/DqBFNK.XOnab1aep7sLIQ4wW.ciAiKaFTD3AIR6.', NULL, '2022-06-10 04:10:43', '2022-06-10 04:10:43'),
(2, 'User 1', 'user1@jumia.com', NULL, '$2y$10$BxscK6yJR3AqvW2Dykoz3eTXljK.cYzKEoDuBqYl2f0kQdAcRcIuO', NULL, '2022-06-10 04:10:43', '2022-06-10 04:10:43'),
(3, 'User 2', 'user2@jumia.com', NULL, '$2y$10$OVK1d0zztQMqmten01pXvur8UT0o8EsICvKmzmEoAimlSIPzB3m3O', NULL, '2022-06-10 04:10:43', '2022-06-10 04:10:43'),
(4, 'User 3', 'user3@jumia.com', NULL, '$2y$10$ZFJX2Epv3z2h0bW8nvTvJ.DULe3nlGk1PY5O4Hd7CFce4tARzqA5i', NULL, '2022-06-10 04:10:43', '2022-06-10 04:10:43'),
(5, 'User 4', 'user4@jumia.com', NULL, '$2y$10$lGH7r6xt6g9e38.cNPtNf.pCpiBYTEEBi6evW1678xmo7XY3ZZ8fi', NULL, '2022-06-10 04:10:43', '2022-06-10 04:10:43'),
(6, 'User 5', 'user5@jumia.com', NULL, '$2y$10$AgAzyCJTaq5o.at2BOL5oeOKozWlVgjD3WScl.T2l7F4XDJLkbTOS', NULL, '2022-06-10 04:10:43', '2022-06-10 04:10:43'),
(7, 'User 6', 'user6@jumia.com', NULL, '$2y$10$AWQvJHg3T3SryT5E1DAELuQl79pWl./OR3k143wjQT3Ge9MxFS2Te', NULL, '2022-06-10 04:10:43', '2022-06-10 04:10:43'),
(8, 'User 7', 'user7@jumia.com', NULL, '$2y$10$njqU4uuEIlUUHkVUTs54jO9J4ewS2QRELaEKmuVkcin2oT9KTDgyG', NULL, '2022-06-10 04:10:43', '2022-06-10 04:10:43'),
(9, 'User 8', 'user8@jumia.com', NULL, '$2y$10$Gd3FqLG/6AJ0NssAbdLTCutbx5HsKWGlWH1KVbnYPED/R4ygelg9K', NULL, '2022-06-10 04:10:43', '2022-06-10 04:10:43'),
(10, 'User 9', 'user9@jumia.com', NULL, '$2y$10$LuvtjINaSRBykX9qL8Y04emin43IL63/wkeZaTMll6QDWbSjE4L7O', NULL, '2022-06-10 04:10:44', '2022-06-10 04:10:44'),
(11, 'User 10', 'user10@jumia.com', NULL, '$2y$10$Tfny1wWEAvLnLI7muUctS.63Jj2FlrlnIcfpolwUcFtl8SgOOSVvm', NULL, '2022-06-10 04:10:44', '2022-06-10 04:10:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_seat_foreign` (`seat`),
  ADD KEY `booking_user_foreign` (`user`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seats_trip_foreign` (`trip`),
  ADD KEY `seats_from_foreign` (`from`),
  ADD KEY `seats_to_foreign` (`to`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trips_from_foreign` (`from`),
  ADD KEY `trips_to_foreign` (`to`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_seat_foreign` FOREIGN KEY (`seat`) REFERENCES `seats` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_from_foreign` FOREIGN KEY (`from`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seats_to_foreign` FOREIGN KEY (`to`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seats_trip_foreign` FOREIGN KEY (`trip`) REFERENCES `trips` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_from_foreign` FOREIGN KEY (`from`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trips_to_foreign` FOREIGN KEY (`to`) REFERENCES `stations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
