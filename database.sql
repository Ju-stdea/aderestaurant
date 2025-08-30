-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2025 at 02:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resturant_a`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` char(36) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `mobile`, `email`, `password`, `image`, `email_verified_at`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', 'Joshua', 'Adeyemi', '1234567890', 'adeniran@gmail.com', '$2y$12$.Mv0VBn7rkYmqvE9t8.gQ.7jQJ/FrOK3deQ9Aq7z6kfC5xmr2F6SO', NULL, NULL, 'ACTIVE', '6dmD4uVTBJXTXKw8RBM0FfiqZABm6NNPtQFqbjxZqyIyMctbVOkBS2gwoMPQ', '2025-04-04 21:18:52', '2025-04-04 21:18:52'),
('c023d198-d8e4-45c4-9a3f-408c9caed23c', 'Jhabis', 'Food Mart', '08062354930', 'jhabisfoodmart@gmail.com', '$2y$12$XSGYi4kW7mjZQZvVS8EWqu44nGqMdySW8f/Cl4EeZy7EGg3yFKZD6', NULL, NULL, 'ACTIVE', '0EIPh8JT4OeiToyVRWBR80hzSuLr0maYLfEZZeoqgoWFIALPl0YukC1howgc', '2025-04-04 21:18:53', '2025-05-06 19:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `admin_id` char(36) NOT NULL,
  `role_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`admin_id`, `role_id`) VALUES
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', '56a01744-c825-4e84-b195-18dd84b2f0fa'),
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', 'b11d6546-4ef2-40aa-b95f-e4d95b6fbd6f'),
('c023d198-d8e4-45c4-9a3f-408c9caed23c', '56a01744-c825-4e84-b195-18dd84b2f0fa');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_permission`
--

CREATE TABLE `admin_role_permission` (
  `admin_id` char(36) NOT NULL,
  `role_id` char(36) NOT NULL,
  `permission_id` char(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_permission`
--

INSERT INTO `admin_role_permission` (`admin_id`, `role_id`, `permission_id`) VALUES
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', '56a01744-c825-4e84-b195-18dd84b2f0fa', '0877e2f3-c8cc-448b-851c-ce20f8b07577'),
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', '56a01744-c825-4e84-b195-18dd84b2f0fa', '2636a5c9-e208-4a05-a065-d0f5e75fa582'),
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', '56a01744-c825-4e84-b195-18dd84b2f0fa', '2edef7f4-7fb1-4ec7-853f-ec5e2b16cd6a'),
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', '56a01744-c825-4e84-b195-18dd84b2f0fa', '3d1a2d3f-f1b6-487a-b0da-dc58267a72fe'),
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', '56a01744-c825-4e84-b195-18dd84b2f0fa', '484cbe60-850c-49ec-90a9-a8f7c6ebee49'),
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', '56a01744-c825-4e84-b195-18dd84b2f0fa', '52e1bdb2-5daa-4e67-9ad9-18bb9124b864'),
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', '56a01744-c825-4e84-b195-18dd84b2f0fa', '8a4b4709-0d77-4236-8a11-3bfd134d4d82'),
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', '56a01744-c825-4e84-b195-18dd84b2f0fa', '8d4266ff-1d32-4a1b-bb91-dd18868cc300'),
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', '56a01744-c825-4e84-b195-18dd84b2f0fa', 'b5960389-f9a0-48ef-9063-cd792bc205cd'),
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', '56a01744-c825-4e84-b195-18dd84b2f0fa', 'cb18973b-b08c-4c8d-929e-9721fc6fa42e'),
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', '56a01744-c825-4e84-b195-18dd84b2f0fa', 'ef5bb9f8-e281-4443-b2b0-5b0e9829954a'),
('81e02529-7e5a-4c69-9ba8-ef6bee62f365', '56a01744-c825-4e84-b195-18dd84b2f0fa', 'fd639837-8144-4224-a679-ac9ef24db189');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` char(36) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_id` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `image_id`, `image_url`, `link`, `title`, `alt`, `status`, `created_at`, `updated_at`) VALUES
('4c60abea-b5b6-4aa4-ab8f-e6aafa0fd3ss', NULL, NULL, 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726157295/amrasgrocery/banners/fvvusenrl6iahdol2opi.jpg', NULL, 'FRESH GROCERY', 'There you can Buy your all of Grocery Products', 'ACTIVE', NULL, NULL),
('5b60abea-b5b6-4aa4-ab8f-e6aafa0fd3ss', NULL, NULL, 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1723366013/banner-3_ahzyea.webp', NULL, 'FRESH GROCERY', 'You Can Buy All the Grocery Items', 'ACTIVE', NULL, NULL),
('6a60abea-b5b6-4aa4-ab8f-e6aafa0fd3ss', NULL, NULL, 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1728226946/grocery-image_vopvx5.png', NULL, 'FRESH GROCERY', 'We Provide Fresh Items To Your Door Steps', 'ACTIVE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('18522eb96a86bd69104a51ced74770251af78587', 'i:2;', 1746482877),
('18522eb96a86bd69104a51ced74770251af78587:timer', 'i:1746482877;', 1746482877),
('69cca23b97c25844840da6e7fc6499f7eec50117', 'i:1;', 1743889861),
('69cca23b97c25844840da6e7fc6499f7eec50117:timer', 'i:1743889860;', 1743889860);
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('front.home1', 'O:42:\"Illuminate\\Pagination\\LengthAwarePaginator\":11:{s:8:\"\0*\0items\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:18:{i:0;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"beb9b944-df6c-4ba0-b638-797cfa03c395\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Bitter leaves\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"2800.00\";s:5:\"stock\";s:2:\"14\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/y7ynxyqf4uxhfuxnj9hu\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748722308/jhabis/products/y7ynxyqf4uxhfuxnj9hu.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 20:02:00\";s:10:\"updated_at\";s:19:\"2025-06-01 13:24:40\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"beb9b944-df6c-4ba0-b638-797cfa03c395\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Bitter leaves\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"2800.00\";s:5:\"stock\";s:2:\"14\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/y7ynxyqf4uxhfuxnj9hu\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748722308/jhabis/products/y7ynxyqf4uxhfuxnj9hu.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 20:02:00\";s:10:\"updated_at\";s:19:\"2025-06-01 13:24:40\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"f0ca764f-a054-4557-b4ac-3d17e2719090\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:7:\"Ogbonon\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"7500.00\";s:5:\"stock\";s:2:\"14\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/wrupwrqd8yw7tdlqkras\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720841/jhabis/products/wrupwrqd8yw7tdlqkras.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:43:06\";s:10:\"updated_at\";s:19:\"2025-06-01 14:03:25\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"f0ca764f-a054-4557-b4ac-3d17e2719090\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:7:\"Ogbonon\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"7500.00\";s:5:\"stock\";s:2:\"14\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/wrupwrqd8yw7tdlqkras\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720841/jhabis/products/wrupwrqd8yw7tdlqkras.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:43:06\";s:10:\"updated_at\";s:19:\"2025-06-01 14:03:25\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"d1bae00b-c3a8-4f0c-a547-f733aeb9022a\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:8:\"Cry Fish\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3500.00\";s:5:\"stock\";s:2:\"28\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.22\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/gjv348berjdesogcgbit\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720367/jhabis/products/gjv348berjdesogcgbit.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:39:29\";s:10:\"updated_at\";s:19:\"2025-05-31 19:42:01\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"d1bae00b-c3a8-4f0c-a547-f733aeb9022a\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:8:\"Cry Fish\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3500.00\";s:5:\"stock\";s:2:\"28\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.22\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/gjv348berjdesogcgbit\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720367/jhabis/products/gjv348berjdesogcgbit.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:39:29\";s:10:\"updated_at\";s:19:\"2025-05-31 19:42:01\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"18e15b2a-5d60-46f9-bc51-a4ef517d9156\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:27:\"Akamu/Ogi (Weight gain pap)\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1800.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/d6dfkfzimf6gszyzmdhj\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720179/jhabis/products/d6dfkfzimf6gszyzmdhj.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:36:21\";s:10:\"updated_at\";s:19:\"2025-06-01 14:05:30\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"18e15b2a-5d60-46f9-bc51-a4ef517d9156\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:27:\"Akamu/Ogi (Weight gain pap)\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1800.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/d6dfkfzimf6gszyzmdhj\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720179/jhabis/products/d6dfkfzimf6gszyzmdhj.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:36:21\";s:10:\"updated_at\";s:19:\"2025-06-01 14:05:30\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"11bf71f7-6bd7-4440-a2b8-d30709c245fe\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:14:\"Dry Clove Seed\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"4500.00\";s:5:\"stock\";s:2:\"21\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.22\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/jasm4vguykiividbbdwm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719803/jhabis/products/jasm4vguykiividbbdwm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:30:06\";s:10:\"updated_at\";s:19:\"2025-05-31 19:30:06\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"11bf71f7-6bd7-4440-a2b8-d30709c245fe\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:14:\"Dry Clove Seed\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"4500.00\";s:5:\"stock\";s:2:\"21\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.22\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/jasm4vguykiividbbdwm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719803/jhabis/products/jasm4vguykiividbbdwm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:30:06\";s:10:\"updated_at\";s:19:\"2025-05-31 19:30:06\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:5;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"22eec507-cd5b-4787-ae91-c9af7278908d\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:11:\"Wheat Flour\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"2800.00\";s:5:\"stock\";s:2:\"23\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/ibjf7xvucxtthy5mcowm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719519/jhabis/products/ibjf7xvucxtthy5mcowm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:25:21\";s:10:\"updated_at\";s:19:\"2025-06-01 14:06:05\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"22eec507-cd5b-4787-ae91-c9af7278908d\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:11:\"Wheat Flour\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"2800.00\";s:5:\"stock\";s:2:\"23\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/ibjf7xvucxtthy5mcowm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719519/jhabis/products/ibjf7xvucxtthy5mcowm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:25:21\";s:10:\"updated_at\";s:19:\"2025-06-01 14:06:05\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:6;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"d8c336b6-0857-49c2-bf8b-a53eb3a1308f\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"Oried Ugwu Leaves\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3000.00\";s:5:\"stock\";s:2:\"11\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.10\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/obksqceujl7ae5wuutyj\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719325/jhabis/products/obksqceujl7ae5wuutyj.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:22:07\";s:10:\"updated_at\";s:19:\"2025-06-01 14:19:06\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"d8c336b6-0857-49c2-bf8b-a53eb3a1308f\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"Oried Ugwu Leaves\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3000.00\";s:5:\"stock\";s:2:\"11\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.10\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/obksqceujl7ae5wuutyj\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719325/jhabis/products/obksqceujl7ae5wuutyj.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:22:07\";s:10:\"updated_at\";s:19:\"2025-06-01 14:19:06\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:7;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"ff4ed3e7-910f-4759-94ee-989f0b95bfeb\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"Spinach Vegetable\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3000.00\";s:5:\"stock\";s:1:\"9\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.07\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/qz3tca7r5x1kwr4klymb\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719137/jhabis/products/qz3tca7r5x1kwr4klymb.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:19:00\";s:10:\"updated_at\";s:19:\"2025-05-31 19:19:00\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"ff4ed3e7-910f-4759-94ee-989f0b95bfeb\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"Spinach Vegetable\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3000.00\";s:5:\"stock\";s:1:\"9\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.07\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/qz3tca7r5x1kwr4klymb\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719137/jhabis/products/qz3tca7r5x1kwr4klymb.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:19:00\";s:10:\"updated_at\";s:19:\"2025-05-31 19:19:00\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:8;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"19bf7335-7e13-428f-8faa-71cc44d286c0\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Ginger Powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"4500.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.07\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/h0nebdnjwhuqr4sebtmm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748702678/jhabis/products/h0nebdnjwhuqr4sebtmm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 14:44:40\";s:10:\"updated_at\";s:19:\"2025-05-31 14:44:40\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"19bf7335-7e13-428f-8faa-71cc44d286c0\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Ginger Powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"4500.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.07\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/h0nebdnjwhuqr4sebtmm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748702678/jhabis/products/h0nebdnjwhuqr4sebtmm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 14:44:40\";s:10:\"updated_at\";s:19:\"2025-05-31 14:44:40\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:9;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"4f5355a7-93a2-4489-8d8f-88660fd46140\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:11:\"Date powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3400.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/pjr3e2onwqkglpk5a1zt\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748689919/jhabis/products/pjr3e2onwqkglpk5a1zt.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 11:12:01\";s:10:\"updated_at\";s:19:\"2025-06-01 14:13:14\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"4f5355a7-93a2-4489-8d8f-88660fd46140\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:11:\"Date powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3400.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/pjr3e2onwqkglpk5a1zt\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748689919/jhabis/products/pjr3e2onwqkglpk5a1zt.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 11:12:01\";s:10:\"updated_at\";s:19:\"2025-06-01 14:13:14\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:10;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"c0abe8ee-1972-4139-84a4-3699469892af\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:15:\"Grounded Ogbono\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1500.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:4:\"0.10\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/kb2fnsuawey9j75ys8tg\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743863078/jhabis/products/kb2fnsuawey9j75ys8tg.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:24:37\";s:10:\"updated_at\";s:19:\"2025-06-01 14:21:28\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"c0abe8ee-1972-4139-84a4-3699469892af\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:15:\"Grounded Ogbono\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1500.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:4:\"0.10\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/kb2fnsuawey9j75ys8tg\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743863078/jhabis/products/kb2fnsuawey9j75ys8tg.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:24:37\";s:10:\"updated_at\";s:19:\"2025-06-01 14:21:28\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:11;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"7249cc15-1f17-458e-ae14-8d945cf09615\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:8:\"Palm Oil\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"4500.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"5.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/vfyikz1mrzo8zlr5jrga\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862990/jhabis/products/vfyikz1mrzo8zlr5jrga.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:23:10\";s:10:\"updated_at\";s:19:\"2025-06-01 14:04:31\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"7249cc15-1f17-458e-ae14-8d945cf09615\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:8:\"Palm Oil\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"4500.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"5.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/vfyikz1mrzo8zlr5jrga\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862990/jhabis/products/vfyikz1mrzo8zlr5jrga.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:23:10\";s:10:\"updated_at\";s:19:\"2025-06-01 14:04:31\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:12;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"994fcd81-21d7-4094-8008-02efd7ab594a\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:18:\"Sweat Potato Flour\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"5000.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/ocvkqwqnibazbyfxsti1\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862899/jhabis/products/ocvkqwqnibazbyfxsti1.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:21:38\";s:10:\"updated_at\";s:19:\"2025-06-01 14:22:16\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"994fcd81-21d7-4094-8008-02efd7ab594a\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:18:\"Sweat Potato Flour\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"5000.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/ocvkqwqnibazbyfxsti1\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862899/jhabis/products/ocvkqwqnibazbyfxsti1.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:21:38\";s:10:\"updated_at\";s:19:\"2025-06-01 14:22:16\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:13;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"fa19c79c-3b0b-42d9-ac53-9112b7ce5e91\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:23:\"Red Chill Pepper Powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1400.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:4:\"0.10\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/xj7vz42sgbwmq7lxfhxc\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748718424/jhabis/products/xj7vz42sgbwmq7lxfhxc.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:19:53\";s:10:\"updated_at\";s:19:\"2025-06-01 14:08:40\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"fa19c79c-3b0b-42d9-ac53-9112b7ce5e91\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:23:\"Red Chill Pepper Powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1400.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:4:\"0.10\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/xj7vz42sgbwmq7lxfhxc\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748718424/jhabis/products/xj7vz42sgbwmq7lxfhxc.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:19:53\";s:10:\"updated_at\";s:19:\"2025-06-01 14:08:40\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:14;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"3b19845e-013f-4c73-a5a7-6d2349f88cae\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:12:\"Peeled Beans\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3000.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/qwtryjewzvlguc2mdbf2\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862656/jhabis/products/qwtryjewzvlguc2mdbf2.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:17:36\";s:10:\"updated_at\";s:19:\"2025-06-01 11:28:24\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"3b19845e-013f-4c73-a5a7-6d2349f88cae\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:12:\"Peeled Beans\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3000.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/qwtryjewzvlguc2mdbf2\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862656/jhabis/products/qwtryjewzvlguc2mdbf2.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:17:36\";s:10:\"updated_at\";s:19:\"2025-06-01 11:28:24\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:15;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"c1f5e1e0-38f3-445e-b762-a49c9947d2ef\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"White Corn Flower\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1500.00\";s:5:\"stock\";s:2:\"32\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/xa9sbpjlhskej4eo9dlo\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862492/jhabis/products/xa9sbpjlhskej4eo9dlo.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:14:52\";s:10:\"updated_at\";s:19:\"2025-06-01 14:02:44\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"c1f5e1e0-38f3-445e-b762-a49c9947d2ef\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"White Corn Flower\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1500.00\";s:5:\"stock\";s:2:\"32\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/xa9sbpjlhskej4eo9dlo\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862492/jhabis/products/xa9sbpjlhskej4eo9dlo.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:14:52\";s:10:\"updated_at\";s:19:\"2025-06-01 14:02:44\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:16;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"68e529b2-49fb-4d26-8d43-ff2cb98175e5\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"Dried Ugwu Leaves\";s:12:\"product_code\";s:17:\"19229-snsnjd-2933\";s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3000.00\";s:5:\"stock\";s:2:\"20\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:5:\"10.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/umxztzsgzjtoeffhug9r\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862299/jhabis/products/umxztzsgzjtoeffhug9r.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:11:38\";s:10:\"updated_at\";s:19:\"2025-05-31 19:55:51\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"68e529b2-49fb-4d26-8d43-ff2cb98175e5\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"Dried Ugwu Leaves\";s:12:\"product_code\";s:17:\"19229-snsnjd-2933\";s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3000.00\";s:5:\"stock\";s:2:\"20\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:5:\"10.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/umxztzsgzjtoeffhug9r\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862299/jhabis/products/umxztzsgzjtoeffhug9r.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:11:38\";s:10:\"updated_at\";s:19:\"2025-05-31 19:55:51\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:17;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"d7472b05-3cb7-4396-aae7-e846bdbb8069\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Chilli Pepper\";s:12:\"product_code\";s:5:\"20102\";s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1500.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"2.40\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/fd4cedznibiukxwiaod4\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720978/jhabis/products/fd4cedznibiukxwiaod4.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:05:36\";s:10:\"updated_at\";s:19:\"2025-05-31 19:51:21\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"d7472b05-3cb7-4396-aae7-e846bdbb8069\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Chilli Pepper\";s:12:\"product_code\";s:5:\"20102\";s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1500.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"2.40\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/fd4cedznibiukxwiaod4\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720978/jhabis/products/fd4cedznibiukxwiaod4.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:05:36\";s:10:\"updated_at\";s:19:\"2025-05-31 19:51:21\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"\0*\0perPage\";i:20;s:14:\"\0*\0currentPage\";i:1;s:7:\"\0*\0path\";s:38:\"https://jhabisfoodmart.com.ng/products\";s:8:\"\0*\0query\";a:0:{}s:11:\"\0*\0fragment\";N;s:11:\"\0*\0pageName\";s:8:\"products\";s:10:\"onEachSide\";i:3;s:10:\"\0*\0options\";a:2:{s:4:\"path\";s:38:\"https://jhabisfoodmart.com.ng/products\";s:8:\"pageName\";s:8:\"products\";}s:8:\"\0*\0total\";i:18;s:11:\"\0*\0lastPage\";i:1;}', 1749732009);
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('ini132592@gmail.com|105.112.29.27', 'i:1;', 1746482827),
('ini132592@gmail.com|105.112.29.27:timer', 'i:1746482827;', 1746482827),
('jhabisfjhabisfoodmart@gmail.com|105.112.226.195', 'i:1;', 1746562354),
('jhabisfjhabisfoodmart@gmail.com|105.112.226.195:timer', 'i:1746562354;', 1746562354),
('jhabisfoodmart@gmail.com|105.112.228.119', 'i:1;', 1746552106),
('jhabisfoodmart@gmail.com|105.112.228.119:timer', 'i:1746552106;', 1746552106),
('jhabisjhabisfoodmart@gmail.com|105.112.226.195', 'i:2;', 1746562333),
('jhabisjhabisfoodmart@gmail.com|105.112.226.195:timer', 'i:1746562333;', 1746562333),
('jhabismart@gmail.com|102.91.93.38', 'i:2;', 1746624919),
('jhabismart@gmail.com|102.91.93.38:timer', 'i:1746624919;', 1746624919),
('joshuaadeyemi445@gmail.com|197.210.70.116', 'i:2;', 1746557140),
('joshuaadeyemi445@gmail.com|197.210.70.116:timer', 'i:1746557140;', 1746557140),
('product:11bf71f7-6bd7-4440-a2b8-d30709c245fe', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"11bf71f7-6bd7-4440-a2b8-d30709c245fe\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:14:\"Dry Clove Seed\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"4500.00\";s:5:\"stock\";s:2:\"21\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.22\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/jasm4vguykiividbbdwm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719803/jhabis/products/jasm4vguykiividbbdwm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:30:06\";s:10:\"updated_at\";s:19:\"2025-05-31 19:30:06\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"11bf71f7-6bd7-4440-a2b8-d30709c245fe\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:14:\"Dry Clove Seed\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"4500.00\";s:5:\"stock\";s:2:\"21\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.22\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/jasm4vguykiividbbdwm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719803/jhabis/products/jasm4vguykiividbbdwm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:30:06\";s:10:\"updated_at\";s:19:\"2025-05-31 19:30:06\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1749268130),
('product:18e15b2a-5d60-46f9-bc51-a4ef517d9156', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"18e15b2a-5d60-46f9-bc51-a4ef517d9156\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:27:\"Akamu/Ogi (Weight gain pap)\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1800.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/d6dfkfzimf6gszyzmdhj\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720179/jhabis/products/d6dfkfzimf6gszyzmdhj.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:36:21\";s:10:\"updated_at\";s:19:\"2025-06-01 14:05:30\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"18e15b2a-5d60-46f9-bc51-a4ef517d9156\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:27:\"Akamu/Ogi (Weight gain pap)\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1800.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/d6dfkfzimf6gszyzmdhj\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720179/jhabis/products/d6dfkfzimf6gszyzmdhj.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:36:21\";s:10:\"updated_at\";s:19:\"2025-06-01 14:05:30\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1749268124),
('product:19bf7335-7e13-428f-8faa-71cc44d286c0', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"19bf7335-7e13-428f-8faa-71cc44d286c0\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Ginger Powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"4500.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.07\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/h0nebdnjwhuqr4sebtmm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748702678/jhabis/products/h0nebdnjwhuqr4sebtmm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 14:44:40\";s:10:\"updated_at\";s:19:\"2025-05-31 14:44:40\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"19bf7335-7e13-428f-8faa-71cc44d286c0\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Ginger Powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"4500.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.07\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/h0nebdnjwhuqr4sebtmm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748702678/jhabis/products/h0nebdnjwhuqr4sebtmm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 14:44:40\";s:10:\"updated_at\";s:19:\"2025-05-31 14:44:40\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1749268173),
('product:22eec507-cd5b-4787-ae91-c9af7278908d', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"22eec507-cd5b-4787-ae91-c9af7278908d\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:11:\"Wheat Flour\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"2800.00\";s:5:\"stock\";s:2:\"23\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/ibjf7xvucxtthy5mcowm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719519/jhabis/products/ibjf7xvucxtthy5mcowm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:25:21\";s:10:\"updated_at\";s:19:\"2025-06-01 14:06:05\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"22eec507-cd5b-4787-ae91-c9af7278908d\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:11:\"Wheat Flour\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"2800.00\";s:5:\"stock\";s:2:\"23\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/ibjf7xvucxtthy5mcowm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719519/jhabis/products/ibjf7xvucxtthy5mcowm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:25:21\";s:10:\"updated_at\";s:19:\"2025-06-01 14:06:05\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1749268199),
('product:3b19845e-013f-4c73-a5a7-6d2349f88cae', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"3b19845e-013f-4c73-a5a7-6d2349f88cae\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:12:\"Peeled Beans\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:8:\"22000.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"10.00\";s:14:\"product_weight\";s:5:\"20.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/qwtryjewzvlguc2mdbf2\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862656/jhabis/products/qwtryjewzvlguc2mdbf2.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:18:\"Fresh peeled beans\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:17:36\";s:10:\"updated_at\";s:19:\"2025-04-05 14:17:36\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"3b19845e-013f-4c73-a5a7-6d2349f88cae\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:12:\"Peeled Beans\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:8:\"22000.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"10.00\";s:14:\"product_weight\";s:5:\"20.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/qwtryjewzvlguc2mdbf2\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862656/jhabis/products/qwtryjewzvlguc2mdbf2.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:18:\"Fresh peeled beans\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:17:36\";s:10:\"updated_at\";s:19:\"2025-04-05 14:17:36\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1748204760),
('product:4f5355a7-93a2-4489-8d8f-88660fd46140', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"4f5355a7-93a2-4489-8d8f-88660fd46140\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:11:\"Date powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3400.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/pjr3e2onwqkglpk5a1zt\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748689919/jhabis/products/pjr3e2onwqkglpk5a1zt.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 11:12:01\";s:10:\"updated_at\";s:19:\"2025-06-01 14:13:14\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"4f5355a7-93a2-4489-8d8f-88660fd46140\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:11:\"Date powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3400.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/pjr3e2onwqkglpk5a1zt\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748689919/jhabis/products/pjr3e2onwqkglpk5a1zt.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 11:12:01\";s:10:\"updated_at\";s:19:\"2025-06-01 14:13:14\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1749268088),
('product:68e529b2-49fb-4d26-8d43-ff2cb98175e5', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"68e529b2-49fb-4d26-8d43-ff2cb98175e5\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"Dried Ugwu Leaves\";s:12:\"product_code\";s:17:\"19229-snsnjd-2933\";s:13:\"product_color\";N;s:13:\"product_price\";s:8:\"10000.00\";s:5:\"stock\";s:2:\"20\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:5:\"10.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/umxztzsgzjtoeffhug9r\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862299/jhabis/products/umxztzsgzjtoeffhug9r.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:23:\"Fresh dried ugwu leaves\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:11:38\";s:10:\"updated_at\";s:19:\"2025-04-05 14:11:38\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"68e529b2-49fb-4d26-8d43-ff2cb98175e5\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"Dried Ugwu Leaves\";s:12:\"product_code\";s:17:\"19229-snsnjd-2933\";s:13:\"product_color\";N;s:13:\"product_price\";s:8:\"10000.00\";s:5:\"stock\";s:2:\"20\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:5:\"10.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/umxztzsgzjtoeffhug9r\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862299/jhabis/products/umxztzsgzjtoeffhug9r.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:23:\"Fresh dried ugwu leaves\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:11:38\";s:10:\"updated_at\";s:19:\"2025-04-05 14:11:38\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1748204756),
('product:7249cc15-1f17-458e-ae14-8d945cf09615', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"7249cc15-1f17-458e-ae14-8d945cf09615\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:8:\"Palm Oil\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"4500.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"5.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/vfyikz1mrzo8zlr5jrga\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862990/jhabis/products/vfyikz1mrzo8zlr5jrga.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:23:10\";s:10:\"updated_at\";s:19:\"2025-06-01 14:04:31\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"7249cc15-1f17-458e-ae14-8d945cf09615\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:8:\"Palm Oil\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"4500.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"5.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/vfyikz1mrzo8zlr5jrga\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862990/jhabis/products/vfyikz1mrzo8zlr5jrga.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:23:10\";s:10:\"updated_at\";s:19:\"2025-06-01 14:04:31\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1749732013),
('product:8dec0315-cc03-4626-b735-cbd6c0bbb51e', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"68e529b2-49fb-4d26-8d43-ff2cb98175e5\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"Dried Ugwu Leaves\";s:12:\"product_code\";s:17:\"19229-snsnjd-2933\";s:13:\"product_color\";N;s:13:\"product_price\";s:8:\"10000.00\";s:5:\"stock\";s:2:\"20\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:5:\"10.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/umxztzsgzjtoeffhug9r\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862299/jhabis/products/umxztzsgzjtoeffhug9r.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:23:\"Fresh dried ugwu leaves\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:11:38\";s:10:\"updated_at\";s:19:\"2025-04-05 14:11:38\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"68e529b2-49fb-4d26-8d43-ff2cb98175e5\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"Dried Ugwu Leaves\";s:12:\"product_code\";s:17:\"19229-snsnjd-2933\";s:13:\"product_color\";N;s:13:\"product_price\";s:8:\"10000.00\";s:5:\"stock\";s:2:\"20\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:5:\"10.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/umxztzsgzjtoeffhug9r\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862299/jhabis/products/umxztzsgzjtoeffhug9r.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:23:\"Fresh dried ugwu leaves\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:11:38\";s:10:\"updated_at\";s:19:\"2025-04-05 14:11:38\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1748206160),
('product:994fcd81-21d7-4094-8008-02efd7ab594a', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"994fcd81-21d7-4094-8008-02efd7ab594a\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:18:\"Sweat Potato Flour\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"5000.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/ocvkqwqnibazbyfxsti1\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862899/jhabis/products/ocvkqwqnibazbyfxsti1.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:21:38\";s:10:\"updated_at\";s:19:\"2025-06-01 14:22:16\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"994fcd81-21d7-4094-8008-02efd7ab594a\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:18:\"Sweat Potato Flour\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"5000.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/ocvkqwqnibazbyfxsti1\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862899/jhabis/products/ocvkqwqnibazbyfxsti1.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:21:38\";s:10:\"updated_at\";s:19:\"2025-06-01 14:22:16\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1749818543),
('product:beb9b944-df6c-4ba0-b638-797cfa03c395', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"beb9b944-df6c-4ba0-b638-797cfa03c395\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Bitter leaves\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"2800.00\";s:5:\"stock\";s:2:\"14\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/y7ynxyqf4uxhfuxnj9hu\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748722308/jhabis/products/y7ynxyqf4uxhfuxnj9hu.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 20:02:00\";s:10:\"updated_at\";s:19:\"2025-06-01 13:24:40\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"beb9b944-df6c-4ba0-b638-797cfa03c395\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Bitter leaves\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"2800.00\";s:5:\"stock\";s:2:\"14\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/y7ynxyqf4uxhfuxnj9hu\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748722308/jhabis/products/y7ynxyqf4uxhfuxnj9hu.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 20:02:00\";s:10:\"updated_at\";s:19:\"2025-06-01 13:24:40\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1749268109),
('product:c0abe8ee-1972-4139-84a4-3699469892af', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"c0abe8ee-1972-4139-84a4-3699469892af\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:15:\"Grounded Ogbono\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1500.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:4:\"0.10\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/kb2fnsuawey9j75ys8tg\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743863078/jhabis/products/kb2fnsuawey9j75ys8tg.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:24:37\";s:10:\"updated_at\";s:19:\"2025-06-01 14:21:28\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"c0abe8ee-1972-4139-84a4-3699469892af\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:15:\"Grounded Ogbono\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1500.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:4:\"0.10\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/kb2fnsuawey9j75ys8tg\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743863078/jhabis/products/kb2fnsuawey9j75ys8tg.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:24:37\";s:10:\"updated_at\";s:19:\"2025-06-01 14:21:28\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1749764359),
('product:c1f5e1e0-38f3-445e-b762-a49c9947d2ef', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"c1f5e1e0-38f3-445e-b762-a49c9947d2ef\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"White Corn Flower\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"2000.00\";s:5:\"stock\";s:2:\"32\";s:16:\"product_discount\";s:5:\"10.00\";s:14:\"product_weight\";s:5:\"25.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/xa9sbpjlhskej4eo9dlo\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862492/jhabis/products/xa9sbpjlhskej4eo9dlo.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:23:\"Fresh white corn flower\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:14:52\";s:10:\"updated_at\";s:19:\"2025-04-05 14:14:52\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"c1f5e1e0-38f3-445e-b762-a49c9947d2ef\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"White Corn Flower\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"2000.00\";s:5:\"stock\";s:2:\"32\";s:16:\"product_discount\";s:5:\"10.00\";s:14:\"product_weight\";s:5:\"25.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/xa9sbpjlhskej4eo9dlo\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862492/jhabis/products/xa9sbpjlhskej4eo9dlo.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:23:\"Fresh white corn flower\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:14:52\";s:10:\"updated_at\";s:19:\"2025-04-05 14:14:52\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1748204807),
('product:d1bae00b-c3a8-4f0c-a547-f733aeb9022a', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"d1bae00b-c3a8-4f0c-a547-f733aeb9022a\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:8:\"Cry Fish\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3500.00\";s:5:\"stock\";s:2:\"28\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.22\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/gjv348berjdesogcgbit\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720367/jhabis/products/gjv348berjdesogcgbit.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:39:29\";s:10:\"updated_at\";s:19:\"2025-05-31 19:42:01\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"d1bae00b-c3a8-4f0c-a547-f733aeb9022a\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:8:\"Cry Fish\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3500.00\";s:5:\"stock\";s:2:\"28\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.22\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/gjv348berjdesogcgbit\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720367/jhabis/products/gjv348berjdesogcgbit.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:39:29\";s:10:\"updated_at\";s:19:\"2025-05-31 19:42:01\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1749268187),
('product:d7472b05-3cb7-4396-aae7-e846bdbb8069', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"d7472b05-3cb7-4396-aae7-e846bdbb8069\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Chilli Pepper\";s:12:\"product_code\";s:5:\"20102\";s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1500.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"2.40\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/fd4cedznibiukxwiaod4\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720978/jhabis/products/fd4cedznibiukxwiaod4.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:05:36\";s:10:\"updated_at\";s:19:\"2025-05-31 19:51:21\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"d7472b05-3cb7-4396-aae7-e846bdbb8069\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Chilli Pepper\";s:12:\"product_code\";s:5:\"20102\";s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1500.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"2.40\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/fd4cedznibiukxwiaod4\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720978/jhabis/products/fd4cedznibiukxwiaod4.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:05:36\";s:10:\"updated_at\";s:19:\"2025-05-31 19:51:21\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1749188833);
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('product:d8c336b6-0857-49c2-bf8b-a53eb3a1308f', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"d8c336b6-0857-49c2-bf8b-a53eb3a1308f\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"Oried Ugwu Leaves\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3000.00\";s:5:\"stock\";s:2:\"11\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.10\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/obksqceujl7ae5wuutyj\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719325/jhabis/products/obksqceujl7ae5wuutyj.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:22:07\";s:10:\"updated_at\";s:19:\"2025-06-01 14:19:06\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"d8c336b6-0857-49c2-bf8b-a53eb3a1308f\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"Oried Ugwu Leaves\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3000.00\";s:5:\"stock\";s:2:\"11\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.10\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/obksqceujl7ae5wuutyj\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719325/jhabis/products/obksqceujl7ae5wuutyj.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:22:07\";s:10:\"updated_at\";s:19:\"2025-06-01 14:19:06\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1749268210),
('product:d8e50884-693b-4955-ad90-0d6a8b11c4ea', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:2:{i:0;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"994fcd81-21d7-4094-8008-02efd7ab594a\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:18:\"Sweat Potato Flour\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"5000.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:5:\"15.00\";s:14:\"product_weight\";s:5:\"14.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/ocvkqwqnibazbyfxsti1\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862899/jhabis/products/ocvkqwqnibazbyfxsti1.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:24:\"Fresh Sweat Potato Flour\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:21:38\";s:10:\"updated_at\";s:19:\"2025-04-05 14:21:38\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"994fcd81-21d7-4094-8008-02efd7ab594a\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:18:\"Sweat Potato Flour\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"5000.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:5:\"15.00\";s:14:\"product_weight\";s:5:\"14.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/ocvkqwqnibazbyfxsti1\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862899/jhabis/products/ocvkqwqnibazbyfxsti1.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:24:\"Fresh Sweat Potato Flour\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:21:38\";s:10:\"updated_at\";s:19:\"2025-04-05 14:21:38\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"c1f5e1e0-38f3-445e-b762-a49c9947d2ef\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"White Corn Flower\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"2000.00\";s:5:\"stock\";s:2:\"32\";s:16:\"product_discount\";s:5:\"10.00\";s:14:\"product_weight\";s:5:\"25.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/xa9sbpjlhskej4eo9dlo\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862492/jhabis/products/xa9sbpjlhskej4eo9dlo.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:23:\"Fresh white corn flower\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:14:52\";s:10:\"updated_at\";s:19:\"2025-04-05 14:14:52\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"c1f5e1e0-38f3-445e-b762-a49c9947d2ef\";s:11:\"category_id\";s:36:\"d8e50884-693b-4955-ad90-0d6a8b11c4ea\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"White Corn Flower\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"2000.00\";s:5:\"stock\";s:2:\"32\";s:16:\"product_discount\";s:5:\"10.00\";s:14:\"product_weight\";s:5:\"25.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/xa9sbpjlhskej4eo9dlo\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862492/jhabis/products/xa9sbpjlhskej4eo9dlo.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:23:\"Fresh white corn flower\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:14:52\";s:10:\"updated_at\";s:19:\"2025-04-05 14:14:52\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1748206290),
('product:ec74a251-8c9f-4300-bd04-8d93ebead49a', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1748722756),
('product:f0ca764f-a054-4557-b4ac-3d17e2719090', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"f0ca764f-a054-4557-b4ac-3d17e2719090\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:7:\"Ogbonon\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"7500.00\";s:5:\"stock\";s:2:\"14\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/wrupwrqd8yw7tdlqkras\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720841/jhabis/products/wrupwrqd8yw7tdlqkras.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:43:06\";s:10:\"updated_at\";s:19:\"2025-06-01 14:03:25\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"f0ca764f-a054-4557-b4ac-3d17e2719090\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:7:\"Ogbonon\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"7500.00\";s:5:\"stock\";s:2:\"14\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.50\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/wrupwrqd8yw7tdlqkras\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720841/jhabis/products/wrupwrqd8yw7tdlqkras.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:43:06\";s:10:\"updated_at\";s:19:\"2025-06-01 14:03:25\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1749268117),
('product:f4f05fc1-6ad2-4cf1-b69b-30119890a1af', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:3:{i:0;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"3b19845e-013f-4c73-a5a7-6d2349f88cae\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:12:\"Peeled Beans\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:8:\"22000.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"10.00\";s:14:\"product_weight\";s:5:\"20.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/qwtryjewzvlguc2mdbf2\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862656/jhabis/products/qwtryjewzvlguc2mdbf2.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:18:\"Fresh peeled beans\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:17:36\";s:10:\"updated_at\";s:19:\"2025-04-05 14:17:36\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"3b19845e-013f-4c73-a5a7-6d2349f88cae\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:12:\"Peeled Beans\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:8:\"22000.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"10.00\";s:14:\"product_weight\";s:5:\"20.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/qwtryjewzvlguc2mdbf2\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862656/jhabis/products/qwtryjewzvlguc2mdbf2.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:18:\"Fresh peeled beans\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:17:36\";s:10:\"updated_at\";s:19:\"2025-04-05 14:17:36\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"7249cc15-1f17-458e-ae14-8d945cf09615\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:8:\"Palm Oil\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:8:\"10000.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:5:\"20.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/vfyikz1mrzo8zlr5jrga\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862990/jhabis/products/vfyikz1mrzo8zlr5jrga.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:14:\"Clean Palm oil\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:23:10\";s:10:\"updated_at\";s:19:\"2025-04-05 14:23:10\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"7249cc15-1f17-458e-ae14-8d945cf09615\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:8:\"Palm Oil\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:8:\"10000.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:5:\"20.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/vfyikz1mrzo8zlr5jrga\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862990/jhabis/products/vfyikz1mrzo8zlr5jrga.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:14:\"Clean Palm oil\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:23:10\";s:10:\"updated_at\";s:19:\"2025-04-05 14:23:10\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"c0abe8ee-1972-4139-84a4-3699469892af\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:15:\"Grounded Ogbono\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1500.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:5:\"25.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/kb2fnsuawey9j75ys8tg\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743863078/jhabis/products/kb2fnsuawey9j75ys8tg.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:24:37\";s:10:\"updated_at\";s:19:\"2025-04-05 14:25:43\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"c0abe8ee-1972-4139-84a4-3699469892af\";s:11:\"category_id\";s:36:\"f4f05fc1-6ad2-4cf1-b69b-30119890a1af\";s:10:\"categories\";N;s:12:\"product_name\";s:15:\"Grounded Ogbono\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1500.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:5:\"25.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/kb2fnsuawey9j75ys8tg\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743863078/jhabis/products/kb2fnsuawey9j75ys8tg.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:24:37\";s:10:\"updated_at\";s:19:\"2025-04-05 14:25:43\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1748205810),
('product:fa19c79c-3b0b-42d9-ac53-9112b7ce5e91', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"fa19c79c-3b0b-42d9-ac53-9112b7ce5e91\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:23:\"Red Chill Pepper Powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1400.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:5:\"32.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/wouvvszclfyah7koqewm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862793/jhabis/products/wouvvszclfyah7koqewm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:22:\"Fresh red chill pepper\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:19:53\";s:10:\"updated_at\";s:19:\"2025-04-05 14:19:53\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"fa19c79c-3b0b-42d9-ac53-9112b7ce5e91\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:23:\"Red Chill Pepper Powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1400.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:5:\"32.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/wouvvszclfyah7koqewm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862793/jhabis/products/wouvvszclfyah7koqewm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";s:22:\"Fresh red chill pepper\";s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:19:53\";s:10:\"updated_at\";s:19:\"2025-04-05 14:19:53\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1748451236),
('product:fd87b214-8598-4904-9dfa-db27bf152609', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:5:{i:0;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"19bf7335-7e13-428f-8faa-71cc44d286c0\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Ginger Powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"4500.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.07\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/h0nebdnjwhuqr4sebtmm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748702678/jhabis/products/h0nebdnjwhuqr4sebtmm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 14:44:40\";s:10:\"updated_at\";s:19:\"2025-05-31 14:44:40\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"19bf7335-7e13-428f-8faa-71cc44d286c0\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Ginger Powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"4500.00\";s:5:\"stock\";s:2:\"12\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"0.07\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/h0nebdnjwhuqr4sebtmm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748702678/jhabis/products/h0nebdnjwhuqr4sebtmm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 14:44:40\";s:10:\"updated_at\";s:19:\"2025-05-31 14:44:40\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"22eec507-cd5b-4787-ae91-c9af7278908d\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:11:\"Wheat Flour\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"2800.00\";s:5:\"stock\";s:2:\"23\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.05\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/ibjf7xvucxtthy5mcowm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719519/jhabis/products/ibjf7xvucxtthy5mcowm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:25:21\";s:10:\"updated_at\";s:19:\"2025-05-31 19:25:21\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"22eec507-cd5b-4787-ae91-c9af7278908d\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:11:\"Wheat Flour\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"2800.00\";s:5:\"stock\";s:2:\"23\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.05\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/ibjf7xvucxtthy5mcowm\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719519/jhabis/products/ibjf7xvucxtthy5mcowm.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:25:21\";s:10:\"updated_at\";s:19:\"2025-05-31 19:25:21\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"4f5355a7-93a2-4489-8d8f-88660fd46140\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:11:\"Date powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3400.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:6:\"500.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/pjr3e2onwqkglpk5a1zt\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748689919/jhabis/products/pjr3e2onwqkglpk5a1zt.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 11:12:01\";s:10:\"updated_at\";s:19:\"2025-05-31 14:21:23\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"4f5355a7-93a2-4489-8d8f-88660fd46140\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:11:\"Date powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3400.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:6:\"500.00\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/pjr3e2onwqkglpk5a1zt\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748689919/jhabis/products/pjr3e2onwqkglpk5a1zt.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 11:12:01\";s:10:\"updated_at\";s:19:\"2025-05-31 14:21:23\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"d7472b05-3cb7-4396-aae7-e846bdbb8069\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Chilli Pepper\";s:12:\"product_code\";s:5:\"20102\";s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1500.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"2.40\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/fd4cedznibiukxwiaod4\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720978/jhabis/products/fd4cedznibiukxwiaod4.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:05:36\";s:10:\"updated_at\";s:19:\"2025-05-31 19:51:21\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"d7472b05-3cb7-4396-aae7-e846bdbb8069\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:13:\"Chilli Pepper\";s:12:\"product_code\";s:5:\"20102\";s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1500.00\";s:5:\"stock\";s:2:\"10\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"2.40\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/fd4cedznibiukxwiaod4\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748720978/jhabis/products/fd4cedznibiukxwiaod4.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:05:36\";s:10:\"updated_at\";s:19:\"2025-05-31 19:51:21\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"fa19c79c-3b0b-42d9-ac53-9112b7ce5e91\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:23:\"Red Chill Pepper Powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1400.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:4:\"1.03\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/xj7vz42sgbwmq7lxfhxc\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748718424/jhabis/products/xj7vz42sgbwmq7lxfhxc.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:19:53\";s:10:\"updated_at\";s:19:\"2025-05-31 19:07:07\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"fa19c79c-3b0b-42d9-ac53-9112b7ce5e91\";s:11:\"category_id\";s:36:\"fd87b214-8598-4904-9dfa-db27bf152609\";s:10:\"categories\";N;s:12:\"product_name\";s:23:\"Red Chill Pepper Powder\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"1400.00\";s:5:\"stock\";s:2:\"22\";s:16:\"product_discount\";s:5:\"20.00\";s:14:\"product_weight\";s:4:\"1.03\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/xj7vz42sgbwmq7lxfhxc\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748718424/jhabis/products/xj7vz42sgbwmq7lxfhxc.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:2:\"No\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-04-05 14:19:53\";s:10:\"updated_at\";s:19:\"2025-05-31 19:07:07\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:7:\"reviews\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 1748722774),
('product:ff4ed3e7-910f-4759-94ee-989f0b95bfeb', 'O:18:\"App\\Models\\Product\":30:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:8:\"products\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:4:\"uuid\";s:12:\"incrementing\";b:0;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:26:{s:2:\"id\";s:36:\"ff4ed3e7-910f-4759-94ee-989f0b95bfeb\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"Spinach Vegetable\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3000.00\";s:5:\"stock\";s:1:\"9\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.07\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/qz3tca7r5x1kwr4klymb\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719137/jhabis/products/qz3tca7r5x1kwr4klymb.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:19:00\";s:10:\"updated_at\";s:19:\"2025-05-31 19:19:00\";}s:11:\"\0*\0original\";a:26:{s:2:\"id\";s:36:\"ff4ed3e7-910f-4759-94ee-989f0b95bfeb\";s:11:\"category_id\";s:36:\"8dec0315-cc03-4626-b735-cbd6c0bbb51e\";s:10:\"categories\";N;s:12:\"product_name\";s:17:\"Spinach Vegetable\";s:12:\"product_code\";N;s:13:\"product_color\";N;s:13:\"product_price\";s:7:\"3000.00\";s:5:\"stock\";s:1:\"9\";s:16:\"product_discount\";s:4:\"0.00\";s:14:\"product_weight\";s:4:\"1.07\";s:6:\"weight\";N;s:10:\"dimensions\";N;s:13:\"product_video\";N;s:10:\"main_image\";N;s:8:\"image_id\";s:36:\"jhabis/products/qz3tca7r5x1kwr4klymb\";s:9:\"image_url\";s:102:\"https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719137/jhabis/products/qz3tca7r5x1kwr4klymb.jpg\";s:8:\"video_id\";N;s:9:\"video_url\";N;s:11:\"description\";N;s:10:\"meta_title\";N;s:16:\"meta_description\";N;s:13:\"meta_keywords\";N;s:11:\"is_featured\";s:3:\"Yes\";s:6:\"status\";s:6:\"ACTIVE\";s:10:\"created_at\";s:19:\"2025-05-31 19:19:00\";s:10:\"updated_at\";s:19:\"2025-05-31 19:19:00\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:10:{i:0;s:12:\"product_name\";i:1;s:12:\"product_code\";i:2;s:13:\"product_color\";i:3;s:13:\"product_price\";i:4;s:16:\"product_discount\";i:5;s:5:\"stock\";i:6;s:14:\"product_weight\";i:7;s:13:\"product_video\";i:8;s:10:\"main_image\";i:9;s:11:\"description\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1749268136),
('product:www.africicl.com.ng', 'N;', 1748205532);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` char(36) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `order_code` varchar(255) DEFAULT NULL,
  `customer_id` char(36) DEFAULT NULL,
  `product_id` char(36) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `quantity` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `session_id`, `order_code`, `customer_id`, `product_id`, `size`, `quantity`, `created_at`, `updated_at`) VALUES
('108c45ac-bd15-414b-aab1-7bb2f11f2757', 'Z6GyEV9YgwyfEdUgw358E7T8tw3DvGQGdwTrHYoa', NULL, NULL, '68e529b2-49fb-4d26-8d43-ff2cb98175e5', NULL, 1, '2025-05-05 21:03:56', '2025-05-05 21:03:56'),
('1e061bcb-e3de-4e86-85c0-1337f7cfa99a', 'y5t1ci4md3hCEVHfqLm0dWcIGOawh9JBsJ1E5jGo', NULL, NULL, 'fa19c79c-3b0b-42d9-ac53-9112b7ce5e91', NULL, 1, '2025-05-31 09:49:25', '2025-05-31 09:49:25'),
('294a923d-a08f-4d7b-84d2-01733aa6f6fb', 'ZzZQAnZReszUYmCsSTf3ArJEBQCIumVqF5De7VA9', NULL, NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, 1, '2025-04-29 08:39:32', '2025-04-29 08:39:32'),
('328e0527-859c-469a-9649-c14aa350ad3c', 'Z6GyEV9YgwyfEdUgw358E7T8tw3DvGQGdwTrHYoa', NULL, NULL, 'fa19c79c-3b0b-42d9-ac53-9112b7ce5e91', NULL, 1, '2025-05-05 21:03:44', '2025-05-05 21:03:44'),
('33ba900f-58c4-42ce-95bc-a1566f938047', 'MVn1y3dn9lTLkjf8yd0UuiHmNWp2wkqK9PU4gAYE', NULL, '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, 1, '2025-05-05 21:27:32', '2025-05-05 21:27:32'),
('55f149a8-9304-4a0e-a54a-902345b97899', 'dCweW4S2C4ppV5zcC19agqEmRWv6FM4OJRg6wqUc', NULL, NULL, '68e529b2-49fb-4d26-8d43-ff2cb98175e5', NULL, 1, '2025-04-30 12:38:19', '2025-04-30 12:38:19'),
('69434607-9c00-41e5-9eee-97ce4d30d7b0', 'iOHIxBnmLiynleccE6TnhaUqtD6AEhaReSpzsoY6', NULL, NULL, 'fa19c79c-3b0b-42d9-ac53-9112b7ce5e91', NULL, 1, '2025-05-03 18:22:17', '2025-05-03 18:22:17'),
('6fe25302-1ef0-4fc1-bb6f-726f3c31d179', '41hyOdYW6X2niGZYBxD7TlLnt9h0EcvM4rA9OQYL', NULL, NULL, 'c0abe8ee-1972-4139-84a4-3699469892af', NULL, 1, '2025-04-12 10:05:06', '2025-04-12 10:05:06'),
('7f0d7808-4d7e-42f8-ab41-cdac64f08605', 'VsQhkGdWNP6X2BHuXyNTT2V6DQbDKwEq0m49vITH', NULL, NULL, '68e529b2-49fb-4d26-8d43-ff2cb98175e5', NULL, 1, '2025-05-03 09:09:35', '2025-05-03 09:09:35'),
('88c7be44-bb62-4198-9882-43fbef324466', 'Knj6C58KVNSNDVPabsTFmQPrIhDlnBkUFuBA1nrc', NULL, NULL, '7249cc15-1f17-458e-ae14-8d945cf09615', NULL, 1, '2025-05-05 21:05:43', '2025-05-05 21:05:43'),
('8e0e33c3-aa07-4794-99b0-54a5f3c3e820', 'svILLjfxirbuxp1vsr0EwXf8MEywmfou8pAQRgAj', NULL, '1108536e-c22d-4465-8609-307d246eef26', 'c0abe8ee-1972-4139-84a4-3699469892af', NULL, 1, '2025-05-05 21:07:57', '2025-05-05 21:07:57'),
('914885b6-b85a-40d6-8730-99b379268a07', 'gbZRK8xoAH4HZ27oHX8fyXJMRMeb8MTzPSpXdDdM', NULL, NULL, '68e529b2-49fb-4d26-8d43-ff2cb98175e5', NULL, 1, '2025-05-03 21:27:03', '2025-05-03 21:27:03'),
('95bcab58-6ea7-4c1e-afec-04b44e355466', 'hMc6L2cz5fpfXooO1HaX8PVArSmPl5K1D8h92HMk', NULL, NULL, '994fcd81-21d7-4094-8008-02efd7ab594a', NULL, 1, '2025-05-04 18:05:16', '2025-05-04 18:05:16'),
('ac501c41-5213-4d8b-a28e-6c7f741a8a4a', 'dCweW4S2C4ppV5zcC19agqEmRWv6FM4OJRg6wqUc', NULL, NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', NULL, 1, '2025-04-30 12:38:21', '2025-04-30 12:38:21'),
('b0744dd1-ce8c-4330-9a0c-df3c948ce230', 'ZZHuOrTpDIutVG9RJj85xWhWWw2IBjfkBnDNGXvO', NULL, NULL, 'fa19c79c-3b0b-42d9-ac53-9112b7ce5e91', NULL, 1, '2025-05-04 15:38:19', '2025-05-04 15:38:19'),
('b3c679b8-9a0a-4b94-8d22-64130764592c', 'u2ZDlUuJzhKq57Bb0jXn72we0KfuHTIFs49Aqk4D', NULL, NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, 1, '2025-04-29 14:10:01', '2025-04-29 14:10:01'),
('b524fbc4-5ded-4e97-b8ec-70c820fe21ca', '41hyOdYW6X2niGZYBxD7TlLnt9h0EcvM4rA9OQYL', NULL, NULL, 'fa19c79c-3b0b-42d9-ac53-9112b7ce5e91', NULL, 1, '2025-04-12 10:05:10', '2025-04-12 10:05:10'),
('bed8b83c-1c6b-47df-8734-2243568008b3', '4oPmO98bA0QoxzEhSoZBQQtfJTEfEnm9Yz9kguOW', NULL, NULL, '68e529b2-49fb-4d26-8d43-ff2cb98175e5', NULL, 1, '2025-05-04 01:38:17', '2025-05-04 01:38:17'),
('c6690cd4-aae0-4d01-b26c-dca0d565d24b', '41hyOdYW6X2niGZYBxD7TlLnt9h0EcvM4rA9OQYL', NULL, NULL, '68e529b2-49fb-4d26-8d43-ff2cb98175e5', NULL, 1, '2025-04-12 10:05:25', '2025-04-12 10:05:25'),
('d271e1ff-fa88-43da-993c-bc71e73fb46d', 'gbZRK8xoAH4HZ27oHX8fyXJMRMeb8MTzPSpXdDdM', NULL, NULL, '994fcd81-21d7-4094-8008-02efd7ab594a', NULL, 1, '2025-05-03 21:27:13', '2025-05-03 21:27:13'),
('d5140412-87f3-4af6-b969-6476de683dcd', 'yrOpkWFkx1TmqQaRR13KHXgWzLEHfM5JkvqkOGC6', NULL, NULL, 'ff4ed3e7-910f-4759-94ee-989f0b95bfeb', NULL, 2, '2025-05-31 19:19:10', '2025-05-31 19:19:10'),
('d89e8324-2d07-4161-bcf0-4bde15943544', 'qFNLCMgRcEUFFRU7OjOCmfQQ9DGXc3zMGh5v7RN8', NULL, NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, 1, '2025-04-07 09:09:01', '2025-04-07 09:09:01'),
('e85d2ab2-83a2-4dd0-995c-e37e4f674f9b', 'viVzixoDCPlrmqNfBXCOjMmvpFqzaQTbv9kEDJRu', NULL, NULL, '7249cc15-1f17-458e-ae14-8d945cf09615', NULL, 1, '2025-05-03 13:35:46', '2025-05-03 13:35:46'),
('f1112239-bbed-4bb7-8661-9412c80f6bc7', '6z85KegesVj7KLEm5WfxHHNAYoPjmpK8xepxTX3v', NULL, NULL, 'beb9b944-df6c-4ba0-b638-797cfa03c395', NULL, 1, '2025-06-01 19:50:06', '2025-06-01 19:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` char(36) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_discount` double DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `asset_image_id` varchar(255) DEFAULT NULL,
  `asset_image_url` varchar(255) DEFAULT NULL,
  `asset_icon_path` varchar(255) DEFAULT NULL,
  `image_id` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `is_cover` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `slug`, `category_discount`, `description`, `url`, `asset_image_id`, `asset_image_url`, `asset_icon_path`, `image_id`, `image_url`, `is_cover`, `status`, `created_at`, `updated_at`) VALUES
('055bf378-94b3-4eeb-b6b6-ff0799f43970', 'Swallow', 'swallow', NULL, 'swallow', NULL, '1c60abea-b5b6-4aa4-ab8f-e6aaaa0fd3cs', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677047/food_grocery_wwtmsh.jpg', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677047/food_grocery_wwtmsh.jpg', NULL, NULL, 0, 'ACTIVE', '2025-08-28 19:16:51', '2025-08-28 19:16:51'),
('8dec0315-cc03-4626-b735-cbd6c0bbb51e', 'Vegetables', 'vegetables', NULL, 'Vegetables', NULL, '1c60abea-b5b6-4aa4-ab8f-e6aafa0fd3cw', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677090/updated_beverage_jo3zrx.png', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677090/updated_beverage_jo3zrx.png', NULL, NULL, 0, 'ACTIVE', '2025-04-05 10:55:20', '2025-04-05 10:55:20'),
('d8e50884-693b-4955-ad90-0d6a8b11c4ea', 'Flour', 'flour', NULL, 'Flour', NULL, '1c60abea-b5b6-4aa4-ab8f-e6aaaa0fd3cs', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677047/food_grocery_wwtmsh.jpg', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677047/food_grocery_wwtmsh.jpg', NULL, NULL, 0, 'ACTIVE', '2025-04-05 10:53:16', '2025-04-05 10:53:16'),
('ec74a251-8c9f-4300-bd04-8d93ebead49a', 'Stock Fish and Meat', 'stock-fish-and-meat', NULL, 'Stock Fish and Meat', NULL, '1c60abea-b5b6-4aa4-ab8f-e6aaaa0fd3cs', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677047/food_grocery_wwtmsh.jpg', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677047/food_grocery_wwtmsh.jpg', NULL, NULL, 0, 'ACTIVE', '2025-04-05 10:57:44', '2025-04-05 10:57:44'),
('f4f05fc1-6ad2-4cf1-b69b-30119890a1af', 'Food', 'food', NULL, 'For food', NULL, '1c60abea-b5b6-4aa4-ab8f-e6aafa0fd338', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677050/other_grocery_yuxrxl.jpg', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677050/other_grocery_yuxrxl.jpg', NULL, NULL, 0, 'ACTIVE', '2025-04-05 13:15:59', '2025-04-05 13:15:59'),
('fd87b214-8598-4904-9dfa-db27bf152609', 'Powder', 'powder', NULL, 'Powder', NULL, '1c60abea-b5b6-4aa4-ab8f-e6aafa0fd3cw', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677090/updated_beverage_jo3zrx.png', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677090/updated_beverage_jo3zrx.png', NULL, NULL, 0, 'ACTIVE', '2025-04-05 10:53:49', '2025-04-05 10:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `category_assets`
--

CREATE TABLE `category_assets` (
  `id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `color_id` varchar(255) DEFAULT NULL,
  `color_url` varchar(255) DEFAULT NULL,
  `dark_id` varchar(255) DEFAULT NULL,
  `dark_url` varchar(255) DEFAULT NULL,
  `image_id` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `is_featured` enum('No','Yes') DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_assets`
--

INSERT INTO `category_assets` (`id`, `name`, `color_id`, `color_url`, `dark_id`, `dark_url`, `image_id`, `image_url`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
('1c60abea-b5b6-4aa4-ab8f-e6aaaa0fd3cs', 'Others', '', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677047/food_grocery_wwtmsh.jpg', '', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677047/food_grocery_wwtmsh.jpg', NULL, NULL, NULL, 'Active', '2025-04-04 21:19:04', '2025-04-04 21:19:04'),
('1c60abea-b5b6-4aa4-ab8f-e6aafa0fd338', 'Food & Groceries', '', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677050/other_grocery_yuxrxl.jpg', '', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677050/other_grocery_yuxrxl.jpg', NULL, NULL, NULL, 'Active', '2025-04-04 21:19:04', '2025-04-04 21:19:04'),
('1c60abea-b5b6-4aa4-ab8f-e6aafa0fd3cw', 'Beverage', '', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677090/updated_beverage_jo3zrx.png', '', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677090/updated_beverage_jo3zrx.png', NULL, NULL, NULL, 'Active', '2025-04-04 21:19:04', '2025-04-04 21:19:04'),
('1c60abea-b5b6-4aa4-ab8f-e6aafaa7d3cs', 'Home & Garden', '', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677065/home_and_garden_fhie9z.webp', '', 'https://res.cloudinary.com/doeoa6jzb/image/upload/v1726677065/home_and_garden_fhie9z.webp', NULL, NULL, NULL, 'Active', '2025-04-04 21:19:04', '2025-04-04 21:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `iso2` varchar(255) DEFAULT NULL,
  `iso3` varchar(255) DEFAULT NULL,
  `numcode` varchar(255) DEFAULT NULL,
  `phonecode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` char(36) NOT NULL,
  `coupon_option` varchar(255) DEFAULT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_type` varchar(255) DEFAULT NULL,
  `coupon_apply` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `coupon_amount` float DEFAULT 0,
  `product_id` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_to` date DEFAULT NULL,
  `categories` text DEFAULT NULL,
  `users` text DEFAULT NULL,
  `products` text DEFAULT NULL,
  `amount_type` varchar(255) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_option`, `coupon_code`, `coupon_type`, `coupon_apply`, `description`, `coupon_amount`, `product_id`, `category_id`, `valid_from`, `valid_to`, `categories`, `users`, `products`, `amount_type`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
('326aacc4-462c-4abe-8c22-d38b43ced71c', NULL, 'RMQ63NEFHY7POVA', 'Percentage', NULL, NULL, 10000, NULL, NULL, '2025-05-31', '2025-06-06', '8dec0315-cc03-4626-b735-cbd6c0bbb51e', 'webxpartt@gmail.com', 'ff4ed3e7-910f-4759-94ee-989f0b95bfeb', NULL, NULL, 'ACTIVE', '2025-05-31 19:16:07', '2025-05-31 19:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` char(36) NOT NULL,
  `currency_code` varchar(255) DEFAULT NULL,
  `exchange_rate` varchar(255) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` char(36) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'INACTIVE',
  `terms_agreed` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `middle_name`, `email`, `password`, `profile_image`, `country`, `state`, `city`, `address`, `zipcode`, `mobile`, `status`, `terms_agreed`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
('1108536e-c22d-4465-8609-307d246eef26', 'James', 'Blessing', NULL, 'ini132592@gmail.com', '$2y$12$IXsE2h1sGmEjAubH7uU/X.2xklAjEHUHgAp197wlVXcSMy7IUYIMC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INACTIVE', 0, '2025-05-05 21:07:16', NULL, '2025-05-05 21:06:47', '2025-05-05 21:07:16'),
('56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', 'Joshua', 'Adeyemi', NULL, 'joshuaadeyemi445@gmail.com', '$2y$12$SVhgILuquekkeqPRT78zc.pQ04p/hlcJtMMrjk62lLoi8QSunsb76', NULL, 'NIGERIA', 'Lagos', 'bariga', 'Bariga Lagos Nigeria', '11111', '08132612077', 'INACTIVE', 0, '2025-04-05 20:50:02', NULL, '2025-04-05 20:49:04', '2025-04-07 13:01:15'),
('afc11fde-9072-410b-be86-03a95265b20b', 'Hammed', 'Adeleke', 'Lekan', 'webxpartt@gmail.com', '$2y$12$1VpAEctkre7HHXeKITijO.pACakh9yPgGrRCdaPUumv2oe00hJ0dm', NULL, NULL, NULL, NULL, '123 Main St', '90001', '1234567890', 'ACTIVE', 1, '2025-04-04 21:18:53', NULL, '2025-04-04 21:18:53', '2025-04-04 21:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` char(36) NOT NULL,
  `user_id` char(36) NOT NULL,
  `address_line` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `address_line`, `country`, `state`, `city`, `zipcode`, `created_at`, `updated_at`) VALUES
('f1fe850b-3f92-49dd-a827-36573dd1dfb3', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', '3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria', 'NIGERIA', 'Lagos', 'bariga', '79712530', '2025-04-07 13:01:16', '2025-05-27 20:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2023_12_14_000000_create_country_state_city_table', 2),
(5, '2023_12_18_161918_create_table_country_extra_table', 2),
(6, '2024_07_01_113426_create_customers_table', 2),
(7, '2024_07_13_085030_create_products_table', 2),
(8, '2024_07_13_085551_create_products_images_table', 2),
(9, '2024_07_13_085656_create_admins_table', 2),
(10, '2024_07_13_085719_create_categories_table', 2),
(11, '2024_07_13_104619_create_orders_products_table', 2),
(12, '2024_07_13_104653_create_order_statuses_products_table', 2),
(13, '2024_07_13_104804_create_carts_table', 2),
(14, '2024_07_13_104829_create_coupons_table', 2),
(15, '2024_07_13_104915_create_delivery_addresses_table', 2),
(16, '2024_07_13_105121_create_newsletter_subscribers_table', 2),
(17, '2024_07_13_105241_create_wishlists_table', 2),
(18, '2024_07_13_105322_create_cms_pages_table', 2),
(19, '2024_07_13_105403_create_shipping_charges_table', 2),
(20, '2024_07_13_105604_create_currencies_table', 2),
(21, '2024_07_13_105717_create_orders_table', 2),
(22, '2024_07_13_105902_create_sections_table', 2),
(23, '2024_07_13_110353_create_products_attributes_table', 2),
(24, '2024_07_13_110510_create_brands_table', 2),
(25, '2024_07_13_110953_create_orders_logs_table', 2),
(26, '2024_07_13_111224_create_banners_table', 2),
(27, '2024_07_13_114307_create_products_reviews_table', 2),
(28, '2024_08_05_091856_create_category_assets_table', 2),
(29, '2024_08_07_105824_create_contacts_table', 2),
(30, '2024_09_13_120200_create_shipments_table', 2),
(31, '2024_09_14_230157_create_cities_table', 2),
(32, '2024_09_14_230258_create_countries_table', 2),
(33, '2024_09_14_230647_create_regions_table', 2),
(34, '2024_09_14_230721_create_states_table', 2),
(35, '2024_09_14_230809_create_subregions_table', 2),
(36, '2024_09_25_174120_modify_orders_table', 2),
(37, '2024_09_25_181638_modify_orders_table', 2),
(38, '2024_09_25_183712_modify_orders_table', 2),
(39, '2024_09_25_191117_modify_orders_table', 2),
(40, '2024_09_29_013527_create_stores_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` char(36) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
('0699f0b5-f2db-4efb-bbf7-929a9452f81b', 'tradevista2015@gmail.com', NULL, '2025-04-06 22:25:36', '2025-04-06 22:25:36'),
('3c3f63b6-bc61-433b-8607-8c5425b32baf', 'joshuaadeyemi445@gmail.com', NULL, '2025-04-06 22:22:46', '2025-04-06 22:22:46'),
('801124b8-77ec-46d8-92b3-0777344b978c', 'jasontechacademy@gmail.com', NULL, '2025-04-06 22:20:23', '2025-04-06 22:20:23'),
('87fbafc5-4f0a-44c8-a64c-9dc0fbb5447d', 'eniolaadeyemi004@gmail.com', NULL, '2025-04-06 22:20:43', '2025-04-06 22:20:43'),
('a7ccfc33-784d-49f8-bca9-60f76206a4a7', 'africteam@gmail.com', NULL, '2025-04-06 22:24:19', '2025-04-06 22:24:19'),
('eb5c6b6c-d672-4780-b252-641836274be7', 'lsiv@lsiv.org', NULL, '2025-04-06 22:19:57', '2025-04-06 22:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` char(36) NOT NULL,
  `customer_id` char(36) DEFAULT NULL,
  `order_code` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `order_status` enum('Pending','Processing','Shipped','Delivered','Completed','On Hold','Cancelled','Failed','Awaiting Payment') NOT NULL DEFAULT 'Pending',
  `delivery_status` varchar(255) DEFAULT NULL,
  `ups_shipping_charges` decimal(8,2) DEFAULT NULL,
  `ups_service_code` varchar(255) DEFAULT NULL,
  `ups_service_name` varchar(255) DEFAULT NULL,
  `total_weight` decimal(8,2) NOT NULL,
  `payment_status` enum('Pending','Processing','Paid','On Hold','Cancelled','Failed','Refunded','Awaiting Payment','Partially Refunded','Authorized') NOT NULL DEFAULT 'Pending',
  `order_amount` decimal(8,2) NOT NULL,
  `sub_total_amount` decimal(8,2) NOT NULL,
  `grand_total` decimal(8,2) NOT NULL,
  `delivery_method` varchar(255) NOT NULL,
  `tips` decimal(10,2) DEFAULT NULL,
  `is_discount` tinyint(1) NOT NULL DEFAULT 0,
  `discount_value` decimal(8,2) NOT NULL DEFAULT 0.00,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_amount` decimal(8,2) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_gateway` varchar(255) DEFAULT NULL,
  `courier_name` varchar(255) DEFAULT NULL,
  `is_review` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE',
  `order_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `guest_email` varchar(255) DEFAULT NULL,
  `guest_name` varchar(255) DEFAULT NULL,
  `guest_phone` varchar(255) DEFAULT NULL,
  `shipping_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`shipping_address`)),
  `billing_address` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`billing_address`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_code`, `transaction_id`, `order_status`, `delivery_status`, `ups_shipping_charges`, `ups_service_code`, `ups_service_name`, `total_weight`, `payment_status`, `order_amount`, `sub_total_amount`, `grand_total`, `delivery_method`, `tips`, `is_discount`, `discount_value`, `coupon_code`, `coupon_amount`, `payment_method`, `payment_gateway`, `courier_name`, `is_review`, `order_date`, `created_at`, `updated_at`, `guest_email`, `guest_name`, `guest_phone`, `shipping_address`, `billing_address`) VALUES
('2ac07849-cef1-416c-8cc8-0d0d306616a7', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', '35EH1SMEAY', 'psk_6838614657d88', 'Pending', NULL, 888.00, 'test_1_courier', 'ShipBubble', 20.00, 'Pending', 19800.00, 19800.00, 20688.00, 'ship', NULL, 0, 0.00, NULL, NULL, 'Paystack', 'Paystack', 'ShipBubble', 'FALSE', '2025-05-29 13:29:42', '2025-05-29 12:29:42', '2025-05-29 12:29:42', NULL, NULL, NULL, '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"79712530\",\"city\":\"bariga\",\"state\":\"Lagos\",\"country\":\"NIGERIA\",\"phone\":\"08132612077\"}', '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"79712530\",\"city\":\"bariga\",\"state\":\"Lagos\",\"country\":\"NIGERIA\",\"phone\":\"08132612077\"}'),
('2b67b439-f97c-43a1-88cd-ac252b73bb02', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', 'WZPBHLT6G2', 'pay_1746482845971_58142', 'Completed', NULL, 3675.00, 'test_1_courier', 'ShipBubble', 98.00, 'Pending', 26.00, 26.00, 3701.00, 'ship', NULL, 0, 0.00, NULL, NULL, 'Paystack', 'Paystack', 'ShipBubble', 'FALSE', '2025-05-05 22:07:26', '2025-05-05 21:07:26', '2025-05-06 21:57:20', NULL, NULL, NULL, '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"36064088\",\"city\":\"Shomolu\",\"state\":\"Lagos\",\"country\":\"Nigeria\",\"phone\":\"08132612077\"}', '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"36064088\",\"city\":\"Shomolu\",\"state\":\"Lagos\",\"country\":\"Nigeria\",\"phone\":\"08132612077\"}'),
('5a4afaa8-2d17-4f8c-bef3-73983675a05a', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', 'TTDWWWLMH4', 'pay_1746477876705_51254', 'Pending', NULL, 1963.00, 'test_1_courier', 'ShipBubble', 115.00, 'Pending', 30038.00, 30038.00, 32001.00, 'ship', NULL, 0, 0.00, NULL, NULL, 'Paystack', 'Paystack', 'ShipBubble', 'FALSE', '2025-05-05 20:44:32', '2025-05-05 19:44:33', '2025-05-05 19:45:21', NULL, NULL, NULL, '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"30507795\",\"city\":\"Shomolu\",\"state\":\"Lagos\",\"country\":\"Nigeria\",\"phone\":\"08132612077\"}', '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"30507795\",\"city\":\"Shomolu\",\"state\":\"Lagos\",\"country\":\"Nigeria\",\"phone\":\"08132612077\"}'),
('629df616-2d30-424c-a06b-706540d321ff', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', 'CU8NQ1UUQO', 'psk_68362ed2892b7', 'Pending', NULL, 888.00, 'test_2_courier', 'ShipBubble', 20.00, 'Pending', 19800.00, 19800.00, 20688.00, 'ship', NULL, 0, 0.00, NULL, NULL, 'Paystack', 'Paystack', 'ShipBubble', 'FALSE', '2025-05-27 21:29:54', '2025-05-27 20:29:54', '2025-05-27 20:29:54', NULL, NULL, NULL, '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"79712530\",\"city\":\"Shomolu\",\"state\":\"Lagos\",\"country\":\"Nigeria\",\"phone\":\"08132612077\"}', '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"79712530\",\"city\":\"Shomolu\",\"state\":\"Lagos\",\"country\":\"Nigeria\",\"phone\":\"08132612077\"}'),
('ab849a85-d725-4aff-8446-088be9ffaabf', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', 'H7ZZYNN7LF', 'psk_68386361b6f44', 'Pending', NULL, 673.00, 'test_1_courier', 'ShipBubble', 20.00, 'Pending', 19800.00, 19800.00, 20473.00, 'ship', NULL, 0, 0.00, NULL, NULL, 'Paystack', 'Paystack', 'ShipBubble', 'FALSE', '2025-05-29 13:38:41', '2025-05-29 12:38:41', '2025-05-29 12:38:41', NULL, NULL, NULL, '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"79712530\",\"city\":\"bariga\",\"state\":\"Lagos\",\"country\":\"NIGERIA\",\"phone\":\"08132612077\"}', '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"79712530\",\"city\":\"bariga\",\"state\":\"Lagos\",\"country\":\"NIGERIA\",\"phone\":\"08132612077\"}'),
('b997571a-5a3e-46d2-b111-3d9d7fade603', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', 'NZVB55MFSG', 'psk_683b647b038b6', 'Pending', NULL, 673.00, 'test_1_courier', 'ShipBubble', 2.00, 'Pending', 3000.00, 3000.00, 3673.00, 'ship', NULL, 0, 0.00, NULL, NULL, 'Paystack', 'Paystack', 'ShipBubble', 'FALSE', '2025-05-31 20:20:11', '2025-05-31 19:20:11', '2025-05-31 19:20:11', NULL, NULL, NULL, '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"79712530\",\"city\":\"bariga\",\"state\":\"Lagos\",\"country\":\"NIGERIA\",\"phone\":\"08132612077\"}', '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"79712530\",\"city\":\"bariga\",\"state\":\"Lagos\",\"country\":\"NIGERIA\",\"phone\":\"08132612077\"}'),
('e94a88b0-40c6-436b-a8cb-a36fdd8b93d3', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', 'WDOXX2B9R3', 'psk_68191e1f565e2', 'Pending', NULL, 1963.00, 'test_1_courier', 'ShipBubble', 115.00, 'Pending', 30038.00, 30038.00, 32001.00, 'ship', NULL, 0, 0.00, NULL, NULL, 'Paystack', 'Paystack', 'ShipBubble', 'FALSE', '2025-05-05 20:22:55', '2025-05-05 19:22:56', '2025-05-05 19:22:56', NULL, NULL, NULL, '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"36041185\",\"city\":\"Shomolu\",\"state\":\"Lagos\",\"country\":\"Nigeria\",\"phone\":\"08132612077\"}', '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"36041185\",\"city\":\"Shomolu\",\"state\":\"Lagos\",\"country\":\"Nigeria\",\"phone\":\"08132612077\"}'),
('f5a5eb4c-40f9-4c39-af3f-8188a1cea2a0', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', 'CLHOXFQM1A', 'psk_68191f079abb1', 'Pending', NULL, 1963.00, 'test_1_courier', 'ShipBubble', 115.00, 'Pending', 30038.00, 30038.00, 32001.00, 'ship', NULL, 0, 0.00, NULL, NULL, 'Paystack', 'Paystack', 'ShipBubble', 'FALSE', '2025-05-05 20:26:47', '2025-05-05 19:26:47', '2025-05-05 19:26:47', NULL, NULL, NULL, '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"28373594\",\"city\":\"Shomolu\",\"state\":\"Lagos\",\"country\":\"Nigeria\",\"phone\":\"08132612077\"}', '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"28373594\",\"city\":\"Shomolu\",\"state\":\"Lagos\",\"country\":\"Nigeria\",\"phone\":\"08132612077\"}'),
('f60e3f33-f1d1-4d07-8964-3847d01bf6ff', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', 'T5VRW8W982', 'pay_1746477075992_60549', 'Pending', NULL, 1963.00, 'test_1_courier', 'ShipBubble', 115.00, 'Pending', 30038.00, 30038.00, 32001.00, 'ship', NULL, 0, 0.00, NULL, NULL, 'Paystack', 'Paystack', 'ShipBubble', 'FALSE', '2025-05-05 20:31:14', '2025-05-05 19:31:14', '2025-05-05 19:33:21', NULL, NULL, NULL, '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"84443463\",\"city\":\"Shomolu\",\"state\":\"Lagos\",\"country\":\"Nigeria\",\"phone\":\"08132612077\"}', '{\"firstname\":\"Joshua\",\"lastname\":\"Adeyemi\",\"address\":\"3 Ayoka St, Bariga, Lagos 102216, Lagos, Nigeria\",\"apartment\":null,\"postal_code\":\"84443463\",\"city\":\"Shomolu\",\"state\":\"Lagos\",\"country\":\"Nigeria\",\"phone\":\"08132612077\"}');

-- --------------------------------------------------------

--
-- Table structure for table `orders_logs`
--

CREATE TABLE `orders_logs` (
  `id` char(36) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `total_amount` float NOT NULL,
  `cart_amount` float NOT NULL,
  `shipping_cost` float NOT NULL,
  `is_discount` tinyint(1) NOT NULL DEFAULT 0,
  `discount_value` float NOT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `shipping_address` longtext DEFAULT NULL,
  `billing_address` longtext DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `order_note` varchar(255) DEFAULT NULL,
  `shipping_type` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` char(36) NOT NULL,
  `order_id` char(36) NOT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `guest_email` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `product_price` varchar(30) DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `product_total` decimal(8,2) NOT NULL,
  `is_review` enum('TRUE','FALSE') NOT NULL DEFAULT 'FALSE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `customer_id`, `guest_email`, `product_id`, `product_code`, `product_name`, `product_color`, `product_size`, `product_price`, `product_qty`, `product_total`, `is_review`, `created_at`, `updated_at`) VALUES
('0afe1366-a02e-4dd9-9734-13a1b636b907', '82bd4729-ae7d-4ecd-8d69-ad81716e28c2', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 15:50:58', '2025-05-05 15:50:58'),
('0e7171fc-ab70-485e-befc-cc41cf987cc0', '50f20fed-f6f2-43a8-99b0-82c708f4c956', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 16:01:36', '2025-05-05 16:01:36'),
('2220b30d-5016-447b-8350-d0ecaa3ce3a4', 'ccb1590f-61cc-44e6-bd6b-61a6550813a4', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 18:26:51', '2025-05-05 18:26:51'),
('2df0c49a-c0ce-401e-97ef-e7cc772aff17', '1be49eaa-9edf-4dcc-807f-1aefeb59268e', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 15:48:32', '2025-05-05 15:48:32'),
('32b1348b-2626-4a6d-ba02-b9183d3764d9', '49726cf6-b4ef-4d9a-816d-e3f45a0cb8db', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 15:55:45', '2025-05-05 15:55:45'),
('33a900f7-105d-4239-ae89-e47a3e57e932', '9e8229c7-8c63-4172-b76d-5505e3f567b9', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 18:28:56', '2025-05-05 18:28:56'),
('33f8053a-c083-4234-8db5-73c001ed8293', '5d285e4a-a294-465c-bfb2-8390dc0b5dde', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 16:08:16', '2025-05-05 16:08:16'),
('35ef1b20-a659-4828-8ac7-2efe30f97f6a', '5d285e4a-a294-465c-bfb2-8390dc0b5dde', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 16:08:16', '2025-05-05 16:08:16'),
('393d9a38-5c3e-4f09-bbd9-7b534da224fb', 'c65c0a82-de90-4e16-9aee-2526db9ada3f', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 15:59:03', '2025-05-05 15:59:03'),
('3da07213-d758-466b-9262-7614cb8778a3', '49726cf6-b4ef-4d9a-816d-e3f45a0cb8db', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 15:55:44', '2025-05-05 15:55:44'),
('3fdcfc62-9220-442c-b3ec-eb52df01e80d', '50f20fed-f6f2-43a8-99b0-82c708f4c956', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 16:01:35', '2025-05-05 16:01:35'),
('510a7de1-2e5b-4b29-9a6f-befca1bb2bd9', '9e8229c7-8c63-4172-b76d-5505e3f567b9', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 18:28:56', '2025-05-05 18:28:56'),
('5732dd16-1614-444a-99e3-41a0050e6b94', '6d4b0d44-5506-4ca7-b6db-d62e40be3f1c', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 18:29:57', '2025-05-05 18:29:57'),
('5a41fdce-9712-4606-9d74-cb0133692d31', 'e73b4c52-116a-4f10-bc0e-99c23e6d17db', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 16:02:37', '2025-05-05 16:02:37'),
('5edd3bbd-8366-4bd8-8415-671bd4d69b2d', 'd44c7d58-a5ff-4657-9a4e-b8fa33ac5ed1', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 18:29:32', '2025-05-05 18:29:32'),
('6bb0b3ec-f67b-4712-9f6a-d94930f7c370', '23533d0d-bcd2-4cff-824f-0e6299881989', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 16:06:13', '2025-05-05 16:06:13'),
('75c27b3e-40aa-4d9e-9590-ae48029f4a24', 'e6a51d39-cf18-49c3-bf1e-f2a48012416b', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 18:22:22', '2025-05-05 18:22:22'),
('79c401bf-e1fe-4b89-afc4-b5167b2e151b', '9fcd5b12-c4df-4b2e-94e2-cf0d9beaa2b6', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 18:30:18', '2025-05-05 18:30:18'),
('7af8d54c-61e8-4ec5-bdfb-0659a4383f56', '6d4b0d44-5506-4ca7-b6db-d62e40be3f1c', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 18:29:56', '2025-05-05 18:29:56'),
('7cca89b5-3c09-47ff-95dc-185820522039', 'da35ba6d-5018-4422-ad90-463f705052d8', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 18:20:39', '2025-05-05 18:20:39'),
('7d593c95-7750-4db9-b46f-b3d2a797822e', '53ba7197-72f2-4926-9698-052a2e40ea1b', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 15:54:21', '2025-05-05 15:54:21'),
('8901010c-3053-4291-81e8-4d4119f77db2', '33d481d7-de47-4b31-a7a3-88ef2789e211', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 16:08:31', '2025-05-05 16:08:31'),
('917dec37-fb17-4f9a-a2f1-6d26d01f7201', '0f3ba1e5-bb91-424c-8a49-488b37ba6cde', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 16:03:06', '2025-05-05 16:03:06'),
('a5c41353-95c0-4e0d-9d7d-e32663050b89', 'd44c7d58-a5ff-4657-9a4e-b8fa33ac5ed1', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 18:29:32', '2025-05-05 18:29:32'),
('a9cb0d30-4610-4559-bfbd-da6a270d121c', 'e6a51d39-cf18-49c3-bf1e-f2a48012416b', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 18:22:23', '2025-05-05 18:22:23'),
('ad00e876-f673-494d-baf1-11189bf0f413', '33d481d7-de47-4b31-a7a3-88ef2789e211', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 16:08:31', '2025-05-05 16:08:31'),
('cfc58722-74c5-44fa-809c-fd0416a45093', '23533d0d-bcd2-4cff-824f-0e6299881989', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 16:06:12', '2025-05-05 16:06:12'),
('d5f03f74-e65f-4126-987a-9c9a7d91dc7d', 'da35ba6d-5018-4422-ad90-463f705052d8', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 18:20:39', '2025-05-05 18:20:39'),
('dd602ea8-6d7d-49b4-b153-c3c2ebf873bc', '1be49eaa-9edf-4dcc-807f-1aefeb59268e', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 15:48:32', '2025-05-05 15:48:32'),
('e0974f92-6e64-4ecf-af22-93f0ba55f596', '0f3ba1e5-bb91-424c-8a49-488b37ba6cde', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 16:03:06', '2025-05-05 16:03:06'),
('e16c23c9-b3d2-4055-96e3-6daedc732efc', 'e73b4c52-116a-4f10-bc0e-99c23e6d17db', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 16:02:37', '2025-05-05 16:02:37'),
('eb31c113-3fdc-4754-8f5b-ba1d94a0d334', 'c65c0a82-de90-4e16-9aee-2526db9ada3f', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 15:59:02', '2025-05-05 15:59:02'),
('f158fa35-5934-4ec1-82a6-1e7ed1e37d8b', '82bd4729-ae7d-4ecd-8d69-ad81716e28c2', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, '3b19845e-013f-4c73-a5a7-6d2349f88cae', NULL, NULL, NULL, NULL, '19,800.00', 2, 38.00, 'FALSE', '2025-05-05 15:50:58', '2025-05-05 15:50:58'),
('f29b0aad-c0ab-415e-9858-5c82a678f476', '9fcd5b12-c4df-4b2e-94e2-cf0d9beaa2b6', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 18:30:18', '2025-05-05 18:30:18'),
('f6fd5ed2-c8dd-4b21-82eb-4e6dffe6217e', 'ccb1590f-61cc-44e6-bd6b-61a6550813a4', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 18:26:51', '2025-05-05 18:26:51'),
('f972fb48-8f49-47f4-888f-ca73c6a070f7', '53ba7197-72f2-4926-9698-052a2e40ea1b', '56439a2f-a169-4a49-a9a4-9ba9ca9b3adc', NULL, 'd7472b05-3cb7-4396-aae7-e846bdbb8069', '20102', NULL, NULL, NULL, '10000.00', 3, 30000.00, 'FALSE', '2025-05-05 15:54:21', '2025-05-05 15:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses_products`
--

CREATE TABLE `order_statuses_products` (
  `id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
('0877e2f3-c8cc-448b-851c-ce20f8b07577', 'categories::full', 'Full access to categories', '2025-04-04 21:18:57', '2025-04-04 21:18:57'),
('2636a5c9-e208-4a05-a065-d0f5e75fa582', 'orders::full', 'Full access to orders', '2025-04-04 21:18:58', '2025-04-04 21:18:58'),
('2edef7f4-7fb1-4ec7-853f-ec5e2b16cd6a', 'orders::view', 'View orders', '2025-04-04 21:18:58', '2025-04-04 21:18:58'),
('3d1a2d3f-f1b6-487a-b0da-dc58267a72fe', 'categories::view', 'View categories', '2025-04-04 21:18:56', '2025-04-04 21:18:56'),
('484cbe60-850c-49ec-90a9-a8f7c6ebee49', 'coupons::view', 'View coupons', '2025-04-04 21:18:57', '2025-04-04 21:18:57'),
('52e1bdb2-5daa-4e67-9ad9-18bb9124b864', 'coupons::edit', 'Edit coupons', '2025-04-04 21:18:57', '2025-04-04 21:18:57'),
('8a4b4709-0d77-4236-8a11-3bfd134d4d82', 'categories::edit', 'Edit categories', '2025-04-04 21:18:56', '2025-04-04 21:18:56'),
('8d4266ff-1d32-4a1b-bb91-dd18868cc300', 'products::edit', 'Edit products', '2025-04-04 21:18:57', '2025-04-04 21:18:57'),
('b5960389-f9a0-48ef-9063-cd792bc205cd', 'products::full', 'Full access to products', '2025-04-04 21:18:57', '2025-04-04 21:18:57'),
('cb18973b-b08c-4c8d-929e-9721fc6fa42e', 'products::view', 'View products', '2025-04-04 21:18:57', '2025-04-04 21:18:57'),
('ef5bb9f8-e281-4443-b2b0-5b0e9829954a', 'orders::edit', 'Edit orders', '2025-04-04 21:18:58', '2025-04-04 21:18:58'),
('fd639837-8144-4224-a679-ac9ef24db189', 'coupons::full', 'Full access to coupons', '2025-04-04 21:18:58', '2025-04-04 21:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` char(36) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `categories` longtext DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `product_price` decimal(8,2) DEFAULT NULL,
  `stock` bigint(20) UNSIGNED DEFAULT NULL,
  `product_discount` decimal(8,2) DEFAULT NULL,
  `product_weight` decimal(8,2) DEFAULT NULL,
  `weight` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`weight`)),
  `dimensions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dimensions`)),
  `product_video` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `image_id` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `video_id` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `is_featured` enum('No','Yes') NOT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` char(36) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` char(36) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_id` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `is_cover` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `image_id`, `image_url`, `is_cover`, `status`, `created_at`, `updated_at`) VALUES
('2f0d0011-1bfb-4104-964c-108559c13c6a', '22eec507-cd5b-4787-ae91-c9af7278908d', NULL, 'jhabis/products/embtg94iidfbpcy9wwn2', 'https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719952/jhabis/products/embtg94iidfbpcy9wwn2.jpg', 0, NULL, '2025-05-31 18:32:35', '2025-05-31 18:32:35'),
('721ffd3d-4bd2-4a4a-9ecf-fb1a816c6ae7', '22eec507-cd5b-4787-ae91-c9af7278908d', NULL, 'jhabis/products/djj1hnz9l0pqpnsuzhvd', 'https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719949/jhabis/products/djj1hnz9l0pqpnsuzhvd.jpg', 0, NULL, '2025-05-31 18:32:31', '2025-05-31 18:32:31'),
('c88f1cf2-5778-40a2-b44b-be80ed230bc6', 'd7472b05-3cb7-4396-aae7-e846bdbb8069', NULL, 'jhabis/products/g4tiyzbyl7bgppcbaab0', 'https://res.cloudinary.com/di2ci6rz8/image/upload/v1743862175/jhabis/products/g4tiyzbyl7bgppcbaab0.png', 0, NULL, '2025-04-05 13:09:35', '2025-04-05 13:09:35'),
('cd8edf65-a448-4037-bfba-ea440449aa8e', '22eec507-cd5b-4787-ae91-c9af7278908d', NULL, 'jhabis/products/ehjksjryb7e4iaimslpv', 'https://res.cloudinary.com/di2ci6rz8/image/upload/v1748719956/jhabis/products/ehjksjryb7e4iaimslpv.jpg', 0, NULL, '2025-05-31 18:32:39', '2025-05-31 18:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `products_reviews`
--

CREATE TABLE `products_reviews` (
  `id` char(36) NOT NULL,
  `order_id` char(36) DEFAULT NULL,
  `customer_id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `rating` float NOT NULL DEFAULT 0,
  `review` varchar(255) DEFAULT NULL,
  `status` enum('OPEN','CLOSED') NOT NULL DEFAULT 'OPEN',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `translations` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `wikiDataId` varchar(255) DEFAULT NULL COMMENT 'Rapid API GeoDB Cities'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
('0a84b6e4-2a28-4ac2-9a9b-f9f8069641e3', 'customer support', NULL, '2025-04-04 21:18:55', '2025-04-04 21:18:55'),
('297a988f-1da4-4bf7-bc1b-d261bd922fd0', 'admin', NULL, '2025-04-04 21:18:55', '2025-04-04 21:18:55'),
('56a01744-c825-4e84-b195-18dd84b2f0fa', 'super admin', NULL, '2025-04-04 21:18:54', '2025-04-04 21:18:54'),
('5f459e38-1e6b-4a86-9f12-8b4a517a90c8', 'inventory manager', NULL, '2025-04-04 21:18:56', '2025-04-04 21:18:56'),
('b11d6546-4ef2-40aa-b95f-e4d95b6fbd6f', 'developer', NULL, '2025-04-04 21:18:56', '2025-04-04 21:18:56'),
('f7c1e302-edbd-4a6b-bbaf-30273e6d1f85', 'manager', NULL, '2025-04-04 21:18:55', '2025-04-04 21:18:55'),
('f902cf36-248b-4f55-a05a-0dfe568db3f4', 'sales', NULL, '2025-04-04 21:18:55', '2025-04-04 21:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` char(36) NOT NULL,
  `order_id` char(36) NOT NULL,
  `shipment_identification` varchar(255) NOT NULL,
  `tracking_number` varchar(255) NOT NULL,
  `transaction_reference` varchar(255) DEFAULT NULL,
  `total_charges` float NOT NULL,
  `transportation_charges` float NOT NULL,
  `base_service_charge` float NOT NULL,
  `itemized_charges` float DEFAULT NULL,
  `currency_code` varchar(10) NOT NULL,
  `billing_weight` float NOT NULL,
  `weight_unit` varchar(10) NOT NULL,
  `shipping_label_base64` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_charges`
--

CREATE TABLE `shipping_charges` (
  `id` char(36) NOT NULL,
  `shipping_charges` double DEFAULT NULL,
  `0_500g` double DEFAULT NULL,
  `501_1000g` double DEFAULT NULL,
  `1001_2000g` double DEFAULT NULL,
  `2001_5000g` double DEFAULT NULL,
  `above_5000g` double DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `distance` decimal(8,2) NOT NULL,
  `warehouse` varchar(255) DEFAULT NULL,
  `is_free` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `address`, `city`, `state`, `country`, `postal_code`, `distance`, `warehouse`, `is_free`, `created_at`, `updated_at`) VALUES
('81e00ed6-23f6-4000-b422-ff9ef77ccafa', 'Amras Africa', '244 E 35th St', 'Chicago', 'IL', 'US', '60616', 0.00, 'Amras Africa Grocery Store', 1, '2025-04-04 21:19:04', '2025-04-04 21:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `subregions`
--

CREATE TABLE `subregions` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `translations` text DEFAULT NULL,
  `region_id` mediumint(8) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `flag` tinyint(1) NOT NULL DEFAULT 1,
  `wikiDataId` varchar(255) DEFAULT NULL COMMENT 'Rapid API GeoDB Cities'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
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

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` char(36) NOT NULL,
  `customer_id` char(36) NOT NULL,
  `product_id` char(36) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`admin_id`,`role_id`),
  ADD KEY `admin_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `admin_role_permission`
--
ALTER TABLE `admin_role_permission`
  ADD PRIMARY KEY (`admin_id`,`role_id`,`permission_id`),
  ADD KEY `admin_role_permission_role_id_foreign` (`role_id`),
  ADD KEY `admin_role_permission_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `category_assets`
--
ALTER TABLE `category_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_transaction_id_unique` (`transaction_id`);

--
-- Indexes for table `orders_logs`
--
ALTER TABLE `orders_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses_products`
--
ALTER TABLE `order_statuses_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_reviews`
--
ALTER TABLE `products_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipments_order_id_foreign` (`order_id`);

--
-- Indexes for table `shipping_charges`
--
ALTER TABLE `shipping_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subregions`
--
ALTER TABLE `subregions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subregions_region_id_foreign` (`region_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subregions`
--
ALTER TABLE `subregions`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_role_permission`
--
ALTER TABLE `admin_role_permission`
  ADD CONSTRAINT `admin_role_permission_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD CONSTRAINT `delivery_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subregions`
--
ALTER TABLE `subregions`
  ADD CONSTRAINT `subregions_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
