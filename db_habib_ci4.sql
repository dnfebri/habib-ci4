-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 06:02 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_habib_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-04-22 09:12:06', 1),
(2, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-04-22 09:15:06', 1),
(3, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-04-22 09:22:48', 1),
(4, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-04-22 09:23:18', 1),
(5, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-04-22 09:50:28', 1),
(6, '127.0.0.1', 'admin', NULL, '2021-04-22 09:51:16', 0),
(7, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-04-22 09:51:23', 1),
(8, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-04-22 10:20:21', 1),
(9, '127.0.0.1', 'admin', NULL, '2021-05-02 21:56:19', 0),
(10, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-02 21:56:29', 1),
(11, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-02 21:59:26', 1),
(12, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-02 22:27:38', 1),
(13, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-04 09:49:38', 1),
(14, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-04 11:24:49', 1),
(15, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-04 20:47:27', 1),
(16, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-04 20:48:58', 1),
(17, '127.0.0.1', 'admin', NULL, '2021-05-04 21:55:50', 0),
(18, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-04 21:56:00', 1),
(19, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-08 14:21:38', 1),
(20, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-15 06:55:21', 1),
(21, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-15 09:05:21', 1),
(22, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-15 11:31:10', 1),
(23, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-16 07:31:57', 1),
(24, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-16 08:39:37', 1),
(25, '127.0.0.1', 'dwinofebri@gmail.com', 1, '2021-05-16 08:47:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hbb_confirmation`
--

CREATE TABLE `hbb_confirmation` (
  `id` int(11) UNSIGNED NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hbb_confirmation`
--

INSERT INTO `hbb_confirmation` (`id`, `transaction_id`, `nominal`, `image`, `note`, `created_at`, `updated_at`) VALUES
(1, 1793708452, 3000000, '1793708452.jpg', 'Percobaan 1', '2021-05-15 00:50:25', '2021-05-15 00:50:25'),
(2, 1793708452, 3000000, '1793708452.jpg', 'Percobaan 2', '2021-05-15 00:51:15', '2021-05-15 00:51:15'),
(3, 1793708452, 3000000, '1793708452.jpg', 'Percobaan 3', '2021-05-15 00:53:07', '2021-05-15 00:53:07'),
(4, 1793708452, 1000000, '1793708452_1.jpg', 'Percobaan 4', '2021-05-15 09:05:00', '2021-05-15 09:05:00'),
(5, 1708923937, 10000000, '1708923937.jpg', 'Percobaan 2', '2021-05-16 08:39:21', '2021-05-16 08:39:21'),
(6, 1708923937, 10000000, '1708923937_1.jpg', 'Percobaan 2', '2021-05-16 22:59:11', '2021-05-16 22:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `hbb_products`
--

CREATE TABLE `hbb_products` (
  `id` int(11) UNSIGNED NOT NULL,
  `produk_type` int(1) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hbb_products`
--

INSERT INTO `hbb_products` (`id`, `produk_type`, `slug`, `nama_produk`, `deskripsi`, `harga`, `img`, `created_at`, `updated_at`) VALUES
(1, 3, 'kambing-etawa', 'Kambing Etawa', 'Kambing etawa adalah kambing didatangkan dari India yang juga disebut kambing Jamnapari. Tinggi kambing jantan berkisar antara 90 sentimeter hingga 127 sentimeter dan yang betina hanya mencapai 92 sentimeter. Bobot yang jantan bisa mencapai 91 kilogram, sedangkan betina hanya mencapai 63 kilogram.', 450000, 'kambing-etawa.jpg', '2021-05-04 11:27:03', '2021-05-04 11:33:28'),
(2, 1, 'paket-a', 'Paket A', 'Info Paket : | A. deskripsi | B. deskripsi | C. deskripsi ', 5000000, 'paket-a.jpg', '2021-05-04 21:10:19', '2021-05-04 22:11:49'),
(3, 2, 'sapi-beefmaster', 'Sapi Beefmaster', 'Sapi Beefmaster adalah produk sapi unggulan yang memiliki kualitas daging pilihan. Sapi ini dikembangkan oleh Mr. Lasater dengan menggunakan teknik persilangan antara sapi Hereford, Shorthorn dan sapi Brahman sehingga sapi ini tergolong dalam jenis Brahman Crosss / BX.', 3000000, 'sapi-beefmaster.jpg', '2021-05-04 22:00:15', '2021-05-04 22:00:15'),
(5, 1, 'paket-b', 'Paket B', 'Info Paket : | A. deskripsi | B. deskripsi | C. deskripsi ', 4000000, 'paket-b.jpg', '2021-05-08 14:23:03', '2021-05-08 14:23:26'),
(6, 3, 'kambing-jawa-randu', 'Kambing Jawa Randu', 'Kambing Jawarandu merupakan kambing hasil persilangan antara kambing Etawa dengan kambing Kacang. Kambing ini memliki ciri separuh mirip kambing Etawa dan separuh lagi mirip kambing Kacang. Kambing ini dapat menghasilkan susu sebanyak 1,5 liter per hari.', 600000, 'kambing-jawa-randu.jpg', '2021-05-08 14:26:10', '2021-05-08 14:26:10'),
(7, 2, 'sapi-brahman', 'Sapi Brahman', 'Sapi brahman adalah keturunan sapi Zebu atau Boss Indiscuss. Aslinya berasal dari India kemudia masuk ke Amerika pada tahun 1849 berkembang pesat di Amerika, Di AS, sapi Brahman dikembangkan untuk diseleksi dan ditingkatkan mutu genetiknya.', 6000000, 'sapi-brahman.jpg', '2021-05-08 14:28:05', '2021-05-08 14:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `hbb_products_type`
--

CREATE TABLE `hbb_products_type` (
  `id` int(11) NOT NULL,
  `produk_type` varchar(255) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hbb_products_type`
--

INSERT INTO `hbb_products_type` (`id`, `produk_type`, `active`) VALUES
(1, 'Aqiqah', 1),
(2, 'Sapi', 1),
(3, 'Kambing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hbb_transactions`
--

CREATE TABLE `hbb_transactions` (
  `id` int(11) UNSIGNED NOT NULL,
  `code_transaction` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `telepon` varchar(18) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `detail_aqiqah` text NOT NULL,
  `detail_qurban` text NOT NULL,
  `t_item` int(11) NOT NULL,
  `jml_total` int(11) NOT NULL,
  `status_transaction` varchar(255) NOT NULL,
  `note_transaction` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hbb_transactions`
--

INSERT INTO `hbb_transactions` (`id`, `code_transaction`, `full_name`, `email`, `street`, `telepon`, `zip_code`, `detail_aqiqah`, `detail_qurban`, `t_item`, `jml_total`, `status_transaction`, `note_transaction`, `created_at`, `updated_at`) VALUES
(1, '1793708452', 'percobaan 1', 'percobaan1@gmail.com', 'asd', '123', 123, 'null', '\"{\\\"sapi-brahman\\\":{\\\"nama\\\":\\\"Sapi Brahman\\\",\\\"harga\\\":\\\"6000000\\\",\\\"qtt\\\":5}}\"', 5, 30000000, 'Proses', 'percobaan 1', '2021-05-13 09:41:43', '2021-05-15 12:25:18'),
(2, '1708923937', 'percobaan 2', 'asd@asd', 'asd', '123123', 123, '\"{\\\"paket-b\\\":{\\\"nama\\\":\\\"Paket B\\\",\\\"harga\\\":4000000,\\\"qtt\\\":1}}\"', '\"{\\\"sapi-brahman\\\":{\\\"nama\\\":\\\"Sapi Brahman\\\",\\\"harga\\\":6000000,\\\"qtt\\\":1}}\"', 2, 10000000, 'Menunggu kofirmasi pembayaran dari admin', 'Percobaan 2', '2021-05-16 08:38:46', '2021-05-16 22:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-04-18-140345', 'App\\Database\\Migrations\\AddBlog', 'default', 'App', 1618755475, 1),
(2, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1619099435, 2),
(3, '2021-05-04-154523', 'App\\Database\\Migrations\\HbbProducts', 'default', 'App', 1620144208, 3),
(4, '2021-05-09-084935', 'App\\Database\\Migrations\\Hbbtransactions', 'default', 'App', 1620551927, 4),
(7, '2021-05-09-084935', 'App\\Database\\Migrations\\HbbTransactions', 'default', 'App', 1620916033, 5),
(8, '2021-05-09-123029', 'App\\Database\\Migrations\\HbbConfirmation', 'default', 'App', 1620916197, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dwinofebri@gmail.com', 'admin', '$2y$10$7UQytItf66nhYZTJrZDft.KtMEyi9zCW8RwUfKjEAwBqTdxlZgk66', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-04-22 09:11:50', '2021-04-22 09:11:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `hbb_confirmation`
--
ALTER TABLE `hbb_confirmation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hbb_products`
--
ALTER TABLE `hbb_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hbb_products_type`
--
ALTER TABLE `hbb_products_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hbb_transactions`
--
ALTER TABLE `hbb_transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_transaction` (`code_transaction`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hbb_confirmation`
--
ALTER TABLE `hbb_confirmation`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hbb_products`
--
ALTER TABLE `hbb_products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hbb_products_type`
--
ALTER TABLE `hbb_products_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hbb_transactions`
--
ALTER TABLE `hbb_transactions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
