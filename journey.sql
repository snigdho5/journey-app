-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 09:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journey`
--

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2022_02_17_185630_add_phone_to_users_table', 1),
(10, '2022_02_17_191935_add_lastlogin_to_users_table', 2),
(11, '2022_02_17_193030_add_otp_to_users_table', 3),
(12, '2022_02_17_193906_add_token_to_users_table', 4),
(13, '2022_02_18_013720_add_otp_verified_to_users_table', 5),
(14, '2022_02_18_015714_add_year_of_birth_to_users_table', 6),
(15, '2022_02_18_015737_add_gender_to_users_table', 6),
(16, '2022_02_18_021817_add_kyc_updated_to_users_table', 7);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'my-app-token', 'a1f98da61c43e4b3ffe404522d70cf1fe7248b38c40bff4961e67266b21f4f3c', '[\"*\"]', NULL, '2022-02-17 14:08:15', '2022-02-17 14:08:15'),
(2, 'App\\Models\\User', 1, 'my-app-token', 'd784f7369160cc6527df79d0229e54e7b36dcbb2380bc1235c516b77ba8c4abf', '[\"*\"]', NULL, '2022-02-17 14:12:35', '2022-02-17 14:12:35'),
(3, 'App\\Models\\User', 1, 'my-app-token', '7a1b971626a1f0235cae532167bc2cce573d06f8c945b930910a70651493dfa1', '[\"*\"]', NULL, '2022-02-17 14:12:46', '2022-02-17 14:12:46'),
(4, 'App\\Models\\User', 1, 'my-app-token', '9657ad56423a3d9d37ed039842c23f0757f10ff32e0934b22c27e3da739761c9', '[\"*\"]', NULL, '2022-02-17 14:19:29', '2022-02-17 14:19:29'),
(5, 'App\\Models\\User', 1, 'my-app-token', '5f07d8db3cb708cc3ab562d8b075347c68e00ca0eef7cc703a209b07f3ff92ec', '[\"*\"]', NULL, '2022-02-17 19:52:08', '2022-02-17 19:52:08'),
(6, 'App\\Models\\User', 1, 'my-app-token', '00b3fbb6208bad05799ba987adebb0164cc921ae9581a7c4f682b5849eb4fc3b', '[\"*\"]', NULL, '2022-02-17 19:52:36', '2022-02-17 19:52:36'),
(7, 'App\\Models\\User', 1, 'my-app-token', '40d33197bcfc8323fa3221dbcb92ec16edef53ab8686db400fa0bac04a68e564', '[\"*\"]', NULL, '2022-02-17 19:56:47', '2022-02-17 19:56:47'),
(8, 'App\\Models\\User', 2, 'my-app-token', '97cca3030fa29c5a877131d84c158081984bcf98e1a3b6840a9db7967ae34b9a', '[\"*\"]', NULL, '2022-02-17 19:56:53', '2022-02-17 19:56:53'),
(9, 'App\\Models\\User', 3, 'my-app-token', '8c5f509bdd900d81a0c750c30ca8030bcbc336cb2ecf9f47ebf0bfb77e859478', '[\"*\"]', NULL, '2022-02-17 19:57:32', '2022-02-17 19:57:32'),
(10, 'App\\Models\\User', 1, 'my-app-token', '76f4ed585219e0b411497d46d80ec87dae487abf2fbaa04c085eafa61fe207e7', '[\"*\"]', NULL, '2022-02-17 19:58:51', '2022-02-17 19:58:51'),
(11, 'App\\Models\\User', 1, 'my-app-token', '8abb2bb09ae27005368d68127d5f3e599b4a9d004ff8d246b139e83fc30d0b8e', '[\"*\"]', NULL, '2022-02-17 20:15:01', '2022-02-17 20:15:01'),
(12, 'App\\Models\\User', 1, 'my-app-token', '5e490c8ef31750e60149fd87a83bed5452fe47e1989d827ac77fafe6ea4d8312', '[\"*\"]', NULL, '2022-02-17 20:15:52', '2022-02-17 20:15:52'),
(13, 'App\\Models\\User', 1, 'my-app-token', 'afb728c0b99fb6641d6c2f856df1a0513608263b3d1669b2b70e0e500fe8fbc4', '[\"*\"]', '2022-02-17 20:19:57', '2022-02-17 20:16:08', '2022-02-17 20:19:57'),
(14, 'App\\Models\\User', 1, 'my-app-token', '6b0848e314cf393d7d75f914567aae6ef6bccb5eec6581f56b96d535e87d453f', '[\"*\"]', '2022-02-17 20:52:14', '2022-02-17 20:29:35', '2022-02-17 20:52:14'),
(15, 'App\\Models\\User', 4, 'my-app-token', 'b231eb404466eb13a585a94978ed5fad06d7e49e6d3a042ac139dd730af39cfc', '[\"*\"]', NULL, '2022-02-17 20:29:40', '2022-02-17 20:29:40'),
(16, 'App\\Models\\User', 5, 'my-app-token', '1483559b3fe60547a28106d03aa9af01bcc576322247ef173dbf0699bb049b9f', '[\"*\"]', NULL, '2022-02-17 20:33:55', '2022-02-17 20:33:55'),
(17, 'App\\Models\\User', 5, 'my-app-token', '89c5c4f8a79f1564b9d93eda6d0e0d1eee98c49f0e1bdb8cd7328d0cb803a592', '[\"*\"]', NULL, '2022-02-17 20:39:27', '2022-02-17 20:39:27'),
(18, 'App\\Models\\User', 1, 'my-app-token', '810181b47859a43f3ca4ee80ede149a26bd8b2eeb5f22349e9b7c3e6173736bf', '[\"*\"]', NULL, '2022-02-17 20:52:00', '2022-02-17 20:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lastlogin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_verified` int(11) NOT NULL DEFAULT 0,
  `year_of_birth` int(11) NOT NULL DEFAULT 0,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kyc_updated` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `lastlogin`, `otp`, `token`, `otp_verified`, `year_of_birth`, `gender`, `kyc_updated`) VALUES
(1, 'Snigdho Upadhyay', 'snigdho@gmail.com', '9735117684', NULL, '$2y$10$ZJGHeewZlvcjnudv1WBC3O39ltyQBeuiNh0fYz9MdwDnpuW8O318m', NULL, '2022-02-17 13:47:29', '2022-02-17 20:52:14', '2022-02-18 02:21:44', '9508', '18|JHeYUFphEhzgczsq3y83awLgCow3E6jmBAUqsUI0', 1, 1993, 'male', 1),
(5, 'Test tt', '', '9735117682', NULL, '$2y$10$kOusPEg5BgNvyDVyjfLQIu5mXvzmlyFpS3R1lf5M3ueib4w8ZVcVq', NULL, '2022-02-17 20:33:06', '2022-02-17 20:49:18', '2022-02-18 02:03:06', '2391', '17|zNn0mWWyY1GU6YiLVbc5eUQNFiFdOXCw4GmzLty0', 1, 1999, 'male', 1);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
