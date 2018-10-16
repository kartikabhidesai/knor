-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2018 at 05:44 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `officepark`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '''0'' => ''USER'', ''1'' => ''Customer'',  ''2'' => ''Admin''',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user-1', 'user1@gmail.com', '$2y$12$NeviT9EGc3EJy0OP39q98.GC4ss/frWpgVVUAGE/EZUArBeoB53Lq', '0', 'frXOO2c0mYhe6cuZVDJ5xaHxCDUGAxRRi74PETgfsuvuqoXN0T5MsLTbL95l', '2018-01-02 13:00:00', '2018-01-03 04:34:19'),
(2, 'customer-1', 'customer1@gmail.com', '$2y$12$NeviT9EGc3EJy0OP39q98.GC4ss/frWpgVVUAGE/EZUArBeoB53Lq', '1', 'S0YL6eyRBiNq6x6geuoHhUbuFWVjxW3gtrLna0ArfQjVdDUkJoruCM9ReNn3', '2018-01-02 13:00:00', '2018-01-02 22:23:00'),
(3, 'admin-1', 'admin1@gmail.com', '$2y$10$wBKUN2X4zl3sJcx6xm5gW.ZqIDYwMDmUxKKKmHLzUfjc6li4hm.5O', '2', '1L54R7UqkJTR6ErZvk3TK9omLoVMH9r6VlOtlk1EB0nZHPtuzl5zxTt5vi0a', '2018-01-02 13:00:00', '2018-01-02 22:23:00'),
(4, 'admin', 'admin@admin.com', '$2y$10$wBKUN2X4zl3sJcx6xm5gW.ZqIDYwMDmUxKKKmHLzUfjc6li4hm.5O', '2', '67rNu4wMNBx5IlNV1RxskgUELFxlzitMytfm8nhNQuHhUD8m6PDC7JF1QKJJ', '2018-08-03 01:17:16', '2018-08-03 01:17:16'),
(5, 'customer', 'customer@customer.com', '$2y$10$WkSdiyBRPuF0w.kakvKFZOE/5/N6kqBTTcZYMFETSVsOwy3Pl5BwO', '1', 'OFmJt6smi5B4yhnMrawmJosMaQTkmToPtMeMuP3GZhAyANZDKieaheI76MJI', '2018-08-03 01:21:51', '2018-08-03 01:21:51'),
(6, 'user', 'user@user.com', '$2y$10$OqT.7uUpg/HHEvXXpXPfY.5zu/fXZaV8DKEXNnjTEFbUtwx9crHhq', '0', '5JKoNOrTqqa0oo9gKwkHsW9oJg7Gjw14pyOnvEz9u8pzbm9259LLIG6KkOSN', '2018-08-03 04:41:21', '2018-08-03 04:41:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
