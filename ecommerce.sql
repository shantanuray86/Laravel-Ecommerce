-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 07:53 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shantanu Ray', 'shantanuray86@gmail.com', NULL, '$2y$10$3OuLa0ZKQ4/C/7s8PBoJhuNrlIrGrrDiQNfVzIgWBPqMzZuhtfBAe', '6sdt1Gpz0DhTpaONWj1MAy5tgO7w0wi13UmPHlRBVgTnzSH5ATWzJngkAekj', '2020-07-03 02:43:14', '2020-07-03 02:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_04_30_042104_create_products_table', 1),
(4, '2020_07_02_153628_create_admins_table', 2),
(5, '2020_07_06_125515_create_orders_table', 3),
(6, '2020_07_07_072214_add_product_price_orders_table', 4),
(7, '2020_07_08_043415_create_order__products_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `order_id`, `product_qty`, `created_at`, `updated_at`, `product_price`) VALUES
(6, 1, 2, 1594185211, '1', '2020-07-07 23:43:34', '2020-07-07 23:43:34', 200),
(7, 1, 3, 1594185211, '1', '2020-07-07 23:43:34', '2020-07-07 23:43:34', 200),
(8, 1, 4, 1594190484, '1', '2020-07-08 01:11:26', '2020-07-08 01:11:26', 200),
(9, 1, 11, 1594190484, '1', '2020-07-08 01:11:26', '2020-07-08 01:11:26', 209),
(10, 1, 12, 1594190484, '1', '2020-07-08 01:11:26', '2020-07-08 01:11:26', 500),
(11, 1, 3, 1594190484, '2', '2020-07-08 01:11:26', '2020-07-08 01:11:26', 400);

-- --------------------------------------------------------

--
-- Table structure for table `order__products`
--

CREATE TABLE `order__products` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_product_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order__products`
--

INSERT INTO `order__products` (`id`, `user_id`, `order_id`, `amount`, `total_product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, '1594185211', '400', '2', '2020-07-07 23:43:34', '2020-07-07 23:43:34'),
(2, 1, '1594190484', '1309', '5', '2020-07-08 01:11:26', '2020-07-08 01:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagePath` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `description`, `imagePath`, `created_at`, `updated_at`) VALUES
(1, 'Harry Porter And the Prisoner of Azkaban', 200, 'Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg', '2020-04-30 02:23:03', '2020-07-08 01:36:14'),
(2, 'Wizard Stone', 200, 'Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg', '2020-04-30 02:23:03', '2020-07-08 01:36:48'),
(3, 'Harry Porter and the Half Blood Prince 1', 200, 'Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg', '2020-04-30 02:23:03', '2020-07-08 01:37:47'),
(4, 'Harry Porter and the Half Blood Prince 2', 200, 'Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg', '2020-04-30 02:23:03', '2020-07-08 01:38:10'),
(5, 'Harry Porter and the Half Blood Prince 3', 200, 'Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg', '2020-04-30 02:23:03', '2020-07-08 01:39:30'),
(6, 'Harry Porter and the Half Blood Prince 4', 200, 'Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg', '2020-04-30 02:23:04', '2020-07-08 01:39:43'),
(7, 'Book7', 200, 'Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg', '2020-04-30 02:23:04', '2020-04-30 02:23:04'),
(8, 'Book8', 200, 'Lorem ipsum. In publishing and graphic design, lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg', '2020-04-30 02:23:04', '2020-04-30 02:23:04'),
(11, 'Science Book for Kids', 209, 'This is a very good book', 'http://localhost/whilecorona/ecommerce/public/productImage/998103439.jpg', '2020-07-05 09:07:30', '2020-07-05 09:07:30'),
(12, 'Mathematics for Engineering', 500, 'Nice Book', 'http://localhost/whilecorona/ecommerce/public/productImage/1163282464.jpg', '2020-07-05 09:09:11', '2020-07-05 09:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shantanu Ray', 'shantanuray86@gmail.com', NULL, '$2y$10$LfH1elDolU5A58LqLf1RFeOqf8zzP3u5esIO3uG9OULtzeWlFhExe', 'bzcdFtEcphIVfStYapB7uR43nJeyLoO4ADbOgXd7a6EXVAxldODoQt5ehRVH', '2020-07-03 06:27:51', '2020-07-03 06:27:51'),
(2, 'Shantanu Ray', 'shantanuray69@yahoo.com', NULL, '$2y$10$248sdVwfARaCqryGlqgaAuSOyZQJUVyy9dybFmpUmbJ3Iu1RW4Al.', 'xTja39E938Dikq85htskcARE2h1nHSCOvYQ9wkPS6gQ2E7JryEszXG6cUlM6', '2020-07-05 22:24:21', '2020-07-05 22:24:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order__products`
--
ALTER TABLE `order__products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order__products`
--
ALTER TABLE `order__products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
