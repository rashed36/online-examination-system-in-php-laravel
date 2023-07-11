-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2020 at 03:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_pro_online_ex`
--

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
(3, '2020_05_17_044553_create_oex_categories_table', 2),
(4, '2020_05_17_044922_create_oex_exam_masters_table', 3),
(5, '2020_05_17_045254_create_oex_students_table', 4),
(6, '2020_05_17_045608_create_oex_portals_table', 5),
(7, '2020_06_10_150533_create_oex_exam_question_masters_table', 6),
(8, '2020_07_07_032209_create_oex_results_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `oex_categories`
--

CREATE TABLE `oex_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_categories`
--

INSERT INTO `oex_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test copy', 0, '2020-05-18 09:39:57', '2020-05-20 10:07:11'),
(4, 'example', 1, '2020-05-19 09:10:48', '2020-05-20 10:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `oex_exam_masters`
--

CREATE TABLE `oex_exam_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_exam_masters`
--

INSERT INTO `oex_exam_masters` (`id`, `title`, `category`, `exam_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 'exam 1', '4', '2020-12-31', '1', '2020-05-21 09:26:04', '2020-05-22 09:44:59'),
(4, 'First Exam', '4', '2020-05-29', '1', '2020-05-22 09:32:26', '2020-05-22 09:57:20'),
(5, 'First Exam Copy', '4', '2020-07-26', '1', '2020-05-22 09:32:26', '2020-05-22 09:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `oex_exam_question_masters`
--

CREATE TABLE `oex_exam_question_masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_exam_question_masters`
--

INSERT INTO `oex_exam_question_masters` (`id`, `exam_id`, `question`, `ans`, `options`, `status`, `created_at`, `updated_at`) VALUES
(6, '5', 'Question', 'A', '{\"option1\":\"A\",\"option2\":\"B\",\"option3\":\"C\",\"option4\":\"D\"}', '1', '2020-06-26 09:14:40', '2020-06-26 09:14:40'),
(7, '5', 'Question 2', 'option 2', '{\"option1\":\"option\",\"option2\":\"option 2\",\"option3\":\"option 3\",\"option4\":\"option 4\"}', '1', '2020-06-26 09:16:14', '2020-06-26 09:16:14'),
(8, '5', 'Question 3', 'D', '{\"option1\":\"A\",\"option2\":\"B\",\"option3\":\"C\",\"option4\":\"D\"}', '1', '2020-06-26 09:16:33', '2020-06-26 09:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `oex_portals`
--

CREATE TABLE `oex_portals` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_portals`
--

INSERT INTO `oex_portals` (`id`, `name`, `email`, `mobile_no`, `password`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Deependra', 'ds@gmail.com', '999301330', '123456', '1', '2020-05-26 09:42:29', '2020-05-27 09:37:54'),
(5, 'test copy', 'test@gmail.com', '96958585', '123456', '1', '2020-05-28 09:17:56', '2020-05-28 09:33:28'),
(6, 'demo', 'demo@gmail.com', '969162658', '123456', NULL, '2020-05-30 09:52:46', '2020-05-30 09:52:46'),
(8, 'test', 'test1@gmail.com', '9696666', '123456', '1', '2020-05-31 01:40:22', '2020-05-31 09:33:48'),
(9, 'test', 'test5@gmail.com', '9696666', '123456', NULL, '2020-05-31 01:40:50', '2020-05-31 01:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `oex_results`
--

CREATE TABLE `oex_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yes_ans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_json` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_results`
--

INSERT INTO `oex_results` (`id`, `exam_id`, `user_id`, `yes_ans`, `no_ans`, `result_json`, `created_at`, `updated_at`) VALUES
(2, '5', '17', '0', '3', '{\"6\":\"NO\",\"7\":\"NO\",\"8\":\"NO\"}', '2020-07-25 21:34:53', '2020-07-25 21:34:53');

-- --------------------------------------------------------

--
-- Table structure for table `oex_students`
--

CREATE TABLE `oex_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oex_students`
--

INSERT INTO `oex_students` (`id`, `name`, `email`, `mobile_no`, `dob`, `exam`, `password`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Deependra', 'd1@gmail.com', '999301330', '2020-05-07', '4', '123456', '1', '2020-05-24 01:10:16', '2020-06-08 09:15:54'),
(17, 'Deependra', 'test@gmail.com', '999301330', '2020-06-18', '5', '123456', '1', '2020-06-08 09:15:17', '2020-06-08 09:15:50');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$MkFUUBqQQ2CyEmZlK2WSlOqc.aAcK1RyAb.yyqGEARwy/EfyYtXpG', 'hSYB1la0VGXz2bitmnY7QbIdYANcCDpXICLoVypSqMSrIgySpe5v8lgxm6yN', '2020-05-14 10:00:13', '2020-05-14 10:00:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_categories`
--
ALTER TABLE `oex_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_exam_masters`
--
ALTER TABLE `oex_exam_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_exam_question_masters`
--
ALTER TABLE `oex_exam_question_masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_portals`
--
ALTER TABLE `oex_portals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_results`
--
ALTER TABLE `oex_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oex_students`
--
ALTER TABLE `oex_students`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oex_categories`
--
ALTER TABLE `oex_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oex_exam_masters`
--
ALTER TABLE `oex_exam_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oex_exam_question_masters`
--
ALTER TABLE `oex_exam_question_masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oex_portals`
--
ALTER TABLE `oex_portals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `oex_results`
--
ALTER TABLE `oex_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oex_students`
--
ALTER TABLE `oex_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
