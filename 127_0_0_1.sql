-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 06:02 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dostlaraveldb`
--
CREATE DATABASE IF NOT EXISTS `dostlaraveldb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dostlaraveldb`;

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
(6, '2022_01_26_014126_addinngacolumntoposttable', 2),
(7, '2022_01_26_014740_deletingacolumninposttable', 3),
(8, '2022_01_26_015458_droppingaforeignkeyinposttable', 4),
(9, '2014_10_12_000000_create_users_table', 5),
(10, '2014_10_12_100000_create_password_resets_table', 5),
(11, '2019_08_19_000000_create_failed_jobs_table', 5),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(13, '2022_01_26_012204_create_posts_table', 5);

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

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 3, 'The first post user with an ID 3 UPDATED!!!!', 'UPDATED!! Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe molestias possimus consequatur vitae. Itaque laudantium, vero possimus iusto veritatis provident architecto voluptas. Quibusdam temporibus repudiandae voluptatem eum reiciendis libero quisquam!', '2022-01-25 21:23:04', '2022-01-26 18:21:49'),
(2, 3, 'The second post user with an ID 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem explicabo nemo animi commodi at vero, modi totam veritatis corporis dolorem reprehenderit beatae optio veniam ex vitae maxime, autem natus pariatur!', '2022-01-25 21:23:04', '2022-01-25 21:23:04'),
(3, 3, 'The third post user with an ID 3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem explicabo nemo animi commodi at vero, modi totam veritatis corporis dolorem reprehenderit beatae optio veniam ex vitae maxime, autem natus pariatur!', '2022-01-25 21:23:05', '2022-01-25 21:23:05'),
(4, 4, 'The first post user with an ID Edited by James Gosling', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem explicabo nemo animi commodi at vero, modi totam veritatis corporis dolorem reprehenderit beatae optio veniam ex vitae maxime, autem natus pariatur!', '2022-01-25 21:23:05', '2022-01-26 18:31:53'),
(5, 4, 'The second post user with an ID 4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem explicabo nemo animi commodi at vero, modi totam veritatis corporis dolorem reprehenderit beatae optio veniam ex vitae maxime, autem natus pariatur!', '2022-01-25 21:23:05', '2022-01-25 21:23:05'),
(6, 4, 'The third post user with an ID 4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem explicabo nemo animi commodi at vero, modi totam veritatis corporis dolorem reprehenderit beatae optio veniam ex vitae maxime, autem natus pariatur!', '2022-01-25 21:23:06', '2022-01-25 21:23:06'),
(7, 5, 'The first post user with an ID 5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem explicabo nemo animi commodi at vero, modi totam veritatis corporis dolorem reprehenderit beatae optio veniam ex vitae maxime, autem natus pariatur!', '2022-01-25 21:23:06', '2022-01-25 21:23:06'),
(8, 5, 'The second post user with an ID 5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem explicabo nemo animi commodi at vero, modi totam veritatis corporis dolorem reprehenderit beatae optio veniam ex vitae maxime, autem natus pariatur!', '2022-01-25 21:23:07', '2022-01-25 21:23:07'),
(9, 5, 'The third post user with an ID 5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem explicabo nemo animi commodi at vero, modi totam veritatis corporis dolorem reprehenderit beatae optio veniam ex vitae maxime, autem natus pariatur!', '2022-01-25 21:23:07', '2022-01-25 21:23:07'),
(10, 4, 'A post from the seeder', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem explicabo nemo animi commodi at vero, modi totam veritatis corporis dolorem reprehenderit beatae optio veniam ex vitae maxime, autem natus pariatur!', '2022-01-25 22:05:19', '2022-01-25 22:05:19'),
(11, 3, 'post title from the web form', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, natus incidunt? Excepturi, nulla porro incidunt voluptate provident in necessitatibus doloremque ipsam rem sed eius est accusantium, tempora dicta, consequatur aliquid.', '2022-01-26 17:38:36', '2022-01-26 17:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `first_name`, `last_name`, `avatar`, `bio`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'the first name', 'the last name', 'emailtest@test.com.png', NULL, 'emailtest@test.com', NULL, '$2y$10$Zor01POSgHslZRmfwb0lQuM7VLy1Es3/WPBu8oxtYRFoyvdFBQLl2', NULL, '2022-01-25 18:30:41', '2022-01-25 18:30:41'),
(2, 'Testing', 'Testing last name', 'testinglastname@email.com.jpg', NULL, 'testinglastname@email.com', NULL, '$2y$10$FDiL/lmq.s7abyPPo67COuFQr39bobZ0xggc4PJYkNbqpohm7o6ZW', NULL, '2022-01-25 18:33:14', '2022-01-25 18:33:14'),
(3, 'Jamesss', 'Goslingss', 'jamesgosling@email.com.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab sapiente ducimus provident eligendi sequi beatae, mollitia eveniet, nesciunt natus sunt nam consectetur fuga dolores necessitatibus et sit? Minus, et eveniet!', 'jamesgosling@email.com', NULL, '$2y$10$duGbYaGAB4RC2rk8KfSDZ.ib9RMTXu1dvJgeUmarErPTcuWJqQRZa', NULL, '2022-01-25 18:41:38', '2022-01-25 19:41:56'),
(4, 'Charles', 'Babbage', 'default.png', 'This is the bio of Charles Babbage.', 'charlesbabbage@email.com', NULL, '$2y$10$UEES8nZ3TdxPbwjvaybLke1xEb.SJMSBk/ypOKalNRtgLj1HRgWaW', NULL, '2022-01-25 21:16:39', '2022-01-25 21:16:39'),
(5, 'Alexander', 'Bell', 'default.png', 'This is the bio of Alexander Graham Bell.', 'alexandergrahambell@email.com', NULL, '$2y$10$9KQOCfr1JU/POE9LeMiuoO6t3CLODJE.v0TogvMuA6/KiuGzorcQm', NULL, '2022-01-25 21:18:44', '2022-01-25 21:18:44');

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
