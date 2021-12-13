-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 05:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advanceecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_bn`, `brand_slug_en`, `brand_slug_bn`, `image`, `created_at`, `updated_at`) VALUES
(12, 'Samsung', 'স্যামসাং', 'samsung', 'স্যামসাং', 'upload/brands1718292872876367.jpg', '2021-12-05 02:09:41', '2021-12-05 02:09:41'),
(13, 'Apple', 'অ্যাপল', 'apple', 'অ্যাপল', 'upload/brands/1718849690256444.jpg', '2021-12-11 05:40:04', '2021-12-11 05:41:27'),
(14, 'Walton', 'ওয়ালটন', 'walton', 'ওয়ালটন', 'upload/brands/1718849704079482.jpg', '2021-12-11 05:40:16', '2021-12-11 05:40:16'),
(15, 'Tanjim', 'তাঞ্জিম', 'tanjim', 'তাঞ্জিম', 'upload/brands/1718849975101615.jpg', '2021-12-11 05:44:35', '2021-12-11 05:44:35'),
(16, 'Noir', 'নইর', 'noir', 'নইর', 'upload/brands/1718850025236189.png', '2021-12-11 05:45:22', '2021-12-11 05:45:22'),
(17, 'Rolex', 'রলেক্স', 'rolex', 'রলেক্স', 'upload/brands/1718850173132440.jpg', '2021-12-11 05:47:43', '2021-12-11 05:47:43'),
(18, 'Casio', 'কাসিও', 'casio', 'কাসিও', 'upload/brands/1718850217639760.png', '2021-12-11 05:48:26', '2021-12-11 05:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_bn`, `category_slug_en`, `category_slug_bn`, `category_icon`, `created_at`, `updated_at`) VALUES
(4, 'Electrionics', 'ইলেকট্রনিক্স', 'electrionics', 'ইলেকট্রনিক্স', 'fas fa-laptop-medical', '2021-12-02 01:53:23', '2021-12-02 01:53:23'),
(5, 'Fashion', 'ফ্যাশন', 'fashion', 'ফ্যাশন', 'fa fa-user', '2021-12-02 01:53:40', '2021-12-02 01:53:40'),
(6, 'Clothing', 'ক্লথিং', 'clothing', 'ক্লথিং', 'fas fa-user-secret', '2021-12-11 05:07:52', '2021-12-11 05:07:52'),
(7, 'Watches', 'ওয়াচ', 'watches', 'ওয়াচ', 'far fa-clock', '2021-12-11 05:09:26', '2021-12-11 05:09:26');

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
(5, '2021_11_21_042314_create_roles_table', 1),
(6, '2021_11_29_095213_create_brands_table', 2),
(8, '2021_12_01_053030_create_categories_table', 3),
(9, '2021_12_01_145628_create_categories_table', 4),
(10, '2021_12_01_145817_create_sub_categories_table', 5),
(11, '2021_12_04_055233_create_sub_sub_categories_table', 6),
(15, '2021_12_05_061149_create_products_table', 7),
(16, '2021_12_05_062646_create_multi_imgs_table', 7),
(17, '2021_12_10_061751_create_sliders_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'upload/products/thumbnail/multi_img/1718853681031760.jpg', '2021-12-11 06:43:29', NULL),
(2, 1, 'upload/products/thumbnail/multi_img/1718853681420013.jpg', '2021-12-11 06:43:29', NULL),
(3, 2, 'upload/products/thumbnail/multi_img/1718854039015689.jpg', '2021-12-11 06:49:10', NULL),
(4, 2, 'upload/products/thumbnail/multi_img/1718854039270885.jpg', '2021-12-11 06:49:11', NULL),
(5, 2, 'upload/products/thumbnail/multi_img/1718854039826982.jpg', '2021-12-11 06:49:11', NULL),
(6, 3, 'upload/products/thumbnail/multi_img/1718855780677973.jpg', '2021-12-11 07:16:52', NULL),
(7, 3, 'upload/products/thumbnail/multi_img/1718855781843945.jpg', '2021-12-11 07:16:53', NULL),
(8, 3, 'upload/products/thumbnail/multi_img/1718855782523224.jpg', '2021-12-11 07:16:54', NULL),
(9, 4, 'upload/products/thumbnail/multi_img/1718856096545273.jpg', '2021-12-11 07:21:54', NULL),
(10, 4, 'upload/products/thumbnail/multi_img/1718856097959449.jpg', '2021-12-11 07:21:55', NULL),
(11, 5, 'upload/products/thumbnail/multi_img/1718856459031828.png', '2021-12-11 07:27:40', NULL),
(12, 5, 'upload/products/thumbnail/multi_img/1718856460613480.png', '2021-12-11 07:27:41', NULL);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `sub_sub_category_id` int(11) NOT NULL,
  `product_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_descp_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_descp_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `sub_category_id`, `sub_sub_category_id`, `product_name_en`, `product_name_bn`, `product_slug_en`, `product_slug_bn`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_bn`, `product_size_en`, `product_size_bn`, `product_color_en`, `product_color_bn`, `selling_price`, `discount_price`, `short_descp_en`, `short_descp_bn`, `long_descp_en`, `long_descp_bn`, `product_thumbnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(1, 12, 4, 9, 1, 'Samsung a52', 'স্যামসাঙ এ৫২', 'samsung-a52', 'স্যামসাঙ-এ৫২', '01', '10', 'Samsung,a52', 'স্যামসাঙ,এ৫২', NULL, NULL, 'Red,Blue', 'লাল,নীল', '50000', '49000', '<p>Samsung a52&nbsp;Samsung a52</p>', '<p>স্যামসাঙ এ৫২&nbsp;স্যামসাঙ এ৫২</p>', '<p>Samsung a52&nbsp;Samsung a52&nbsp;Samsung a52&nbsp;Samsung a52</p>', '<p>স্যামসাঙ এ৫২&nbsp;স্যামসাঙ এ৫২&nbsp;স্যামসাঙ এ৫২&nbsp;স্যামসাঙ এ৫২&nbsp;স্যামসাঙ এ৫২</p>', 'upload/products/thumbnail/1718853680533308.jpg', 1, 0, 0, 1, 1, '2021-12-11 06:43:29', NULL),
(2, 14, 4, 9, 3, 'Walton Primo H9', 'ওয়াল্টন প্রিম আইচ৯', 'walton-primo-h9', 'ওয়াল্টন-প্রিম-আইচ৯', '02', '20', 'Walton,Primo ,H9', 'ওয়াল্টন ,প্রিম ,আইচ৯', NULL, NULL, 'Blue,White', 'িল,সাদা', '20000', '19500', '<p>Walton Primo H9&nbsp;Walton Primo H9</p>', '<p>ওয়াল্টন প্রিম আইচ৯&nbsp;ওয়াল্টন প্রিম আইচ৯</p>', '<p>Walton Primo H9&nbsp;Walton Primo H9&nbsp;Walton Primo H9&nbsp;Walton Primo H9</p>', '<p>ওয়াল্টন প্রিম আইচ৯&nbsp;ওয়াল্টন প্রিম আইচ৯&nbsp;ওয়াল্টন প্রিম আইচ৯&nbsp;ওয়াল্টন প্রিম আইচ৯</p>', 'upload/products/thumbnail/1718854038813665.jpg', 1, 0, 1, 0, 1, '2021-12-11 06:49:10', NULL),
(3, 15, 6, 17, 7, 'ZARZAIN SHIRT', 'যারযাইন শার্ট', 'zarzain-shirt', 'যারযাইন-শার্ট', '03', '10', 'ZARZAIN,SHIRT', 'যারযাইন,শার্ট', 'x,s,m,xl', 'এক্স ,এস ,এম ,এক্সএল', 'Red,Blue', 'লাল ,নীল', '1750', '1700', '<p>ZARZAIN SHIRT&nbsp;ZARZAIN SHIRT</p>', '<p>যারযাইন শার্ট&nbsp;যারযাইন শার্ট</p>', '<p>ZARZAIN SHIRT&nbsp;ZARZAIN SHIRT&nbsp;ZARZAIN SHIRT&nbsp;ZARZAIN SHIRT</p>', '<p>যারযাইন শার্ট&nbsp;যারযাইন শার্ট&nbsp;যারযাইন শার্ট&nbsp;যারযাইন শার্ট</p>', 'upload/products/thumbnail/1718855779798688.jpg', 0, 1, 0, 0, 1, '2021-12-11 07:16:51', NULL),
(4, 15, 6, 16, 4, 'CASUAL SHIRT', 'ক্যাজুয়াল শার্ট', 'casual-shirt', 'ক্যাজুয়াল-শার্ট', '04', '20', 'CASUAL ,SHIRT', 'ক্যাজুয়াল ,শার্ট', 's,m', 'এস ,এম', 'Red, Black', 'লাল , কালো', '1500', '1400', '<p>CASUAL SHIRT&nbsp;CASUAL SHIRT</p>', '<p><strong>ক্যাজুয়াল শার্ট&nbsp;ক্যাজুয়াল শার্ট&nbsp;</strong></p>', '<p>CASUAL SHIRT&nbsp;CASUAL SHIRT&nbsp;CASUAL SHIRT&nbsp;CASUAL SHIRT</p>', '<p>ক্যাজুয়াল শার্ট&nbsp;ক্যাজুয়াল শার্ট</p>', 'upload/products/thumbnail/1718856095064009.jpg', 1, 1, 1, 1, 1, '2021-12-11 07:21:52', NULL),
(5, 18, 7, 19, 19, 'Casio A10', 'কাসিও এ১০', 'casio-a10', 'কাসিও-এ১০', '05', '30', 'Casio, A10', 'কাসিও ,এ১০', NULL, NULL, 'Golden,Black', 'সোনালি ,কালো', '5000', '4000', '<p>Casio A10&nbsp;Casio A10</p>', '<p>কাসিও এ১০&nbsp;কাসিও এ১০</p>', '<p>Casio A10&nbsp;Casio A10&nbsp;Casio A10&nbsp;Casio A10</p>', '<p>কাসিও এ১০&nbsp;কাসিও এ১০&nbsp;কাসিও এ১০&nbsp;কাসিও এ১০</p>', 'upload/products/thumbnail/1718856457182295.png', 1, 0, 0, 1, 1, '2021-12-11 07:27:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'User', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_desc_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_desc_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_image`, `slider_title_en`, `slider_title_bn`, `slider_desc_en`, `slider_desc_bn`, `status`, `created_at`, `updated_at`) VALUES
(1, 'upload/slider/1718918882968277.jpg', 'New Offer', 'নতুন অফার', 'Get 5% Discount', '৫% ডিস্কাউন্ট', 1, '2021-12-11 23:59:50', '2021-12-12 00:00:11'),
(2, 'upload/slider/1718919001063923.jpg', 'Best Deal', 'বেস্ট ডিল', 'Get 20% Discount', '২০% ডিস্কাউন্ট', 1, '2021-12-12 00:01:43', NULL),
(3, 'upload/slider/1718919286018408.png', NULL, NULL, NULL, NULL, 1, '2021-12-12 00:06:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sub_category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_category_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name_en`, `sub_category_name_bn`, `sub_category_slug_en`, `sub_category_slug_bn`, `created_at`, `updated_at`) VALUES
(9, 4, 'Mobile', 'মোবাইল', 'mobile', 'মোবাইল', '2021-12-02 01:57:04', '2021-12-02 02:42:50'),
(10, 4, 'Laptop', 'ল্যাপটপ', 'laptop', 'ল্যাপটপ', '2021-12-04 05:14:30', '2021-12-04 05:15:10'),
(11, 4, 'TV', 'টিভি', 'tv', 'টিভি', '2021-12-11 05:10:19', '2021-12-11 05:10:19'),
(12, 4, 'Desktop', 'ডেস্কটপ', 'desktop', 'ডেস্কটপ', '2021-12-11 05:11:02', '2021-12-11 05:11:02'),
(13, 4, 'Camera', 'ক্যামেরা', 'camera', 'ক্যামেরা', '2021-12-11 05:11:31', '2021-12-11 05:11:31'),
(14, 5, 'Men', 'ম্যান', 'men', 'ম্যান', '2021-12-11 05:12:19', '2021-12-11 05:12:19'),
(15, 5, 'Women', 'ওমেন', 'women', 'ওমেন', '2021-12-11 05:12:41', '2021-12-11 05:12:41'),
(16, 6, 'Men', 'ম্যান', 'men', 'ম্যান', '2021-12-11 05:13:31', '2021-12-11 05:18:47'),
(17, 6, 'Women', 'ওমেন', 'women', 'ওমেন', '2021-12-11 05:13:44', '2021-12-11 05:18:35'),
(18, 7, 'Smartwatch', 'স্মার্টওয়াচ', 'smartwatch', 'স্মার্টওয়াচ', '2021-12-11 05:15:04', '2021-12-11 05:15:04'),
(19, 7, 'Handwatch', 'হ্যান্ডওয়াচ', 'handwatch', 'হ্যান্ডওয়াচ', '2021-12-11 05:15:38', '2021-12-11 05:15:38'),
(20, 7, 'Wallclock', 'ওয়ালক্লক', 'wallclock', 'ওয়ালক্লক', '2021-12-11 05:16:18', '2021-12-11 05:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sub_category_id` int(10) UNSIGNED NOT NULL,
  `sub_sub_category_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sub_category_name_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sub_category_slug_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_sub_category_slug_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `sub_category_id`, `sub_sub_category_name_en`, `sub_sub_category_name_bn`, `sub_sub_category_slug_en`, `sub_sub_category_slug_bn`, `created_at`, `updated_at`) VALUES
(1, 4, 9, 'Samsung', 'স্যামসাঙ', 'samsung', 'স্যামসাঙ', '2021-12-04 03:41:51', '2021-12-04 05:13:28'),
(3, 4, 9, 'Walton', 'ওয়াল্টন', 'walton', 'ওয়াল্টন', '2021-12-04 05:13:38', '2021-12-04 05:13:38'),
(4, 6, 16, 'Shirt', 'শার্ট', 'shirt', 'শার্ট', '2021-12-11 05:19:23', '2021-12-11 05:19:23'),
(5, 6, 16, 'Panjabi', 'পাঞ্জাবি', 'panjabi', 'পাঞ্জাবি', '2021-12-11 05:19:44', '2021-12-11 05:19:44'),
(6, 6, 17, 'Borkha', 'বরখা', 'borkha', 'বরখা', '2021-12-11 05:20:13', '2021-12-11 05:20:13'),
(7, 6, 17, 'Shirt', 'শার্ট', 'shirt', 'শার্ট', '2021-12-11 05:20:22', '2021-12-11 05:20:22'),
(8, 4, 13, 'CCTV Camera', 'সিসিটিভি ক্যামেরা', 'cctv_camera', 'সিসিটিভি_ক্যামেরা', '2021-12-11 05:22:01', '2021-12-11 05:22:01'),
(9, 4, 13, 'Nikon', 'নিকন', 'nikon', 'নিকন', '2021-12-11 05:22:34', '2021-12-11 05:22:34'),
(10, 4, 13, 'Canon', 'ক্যানন', 'canon', 'ক্যানন', '2021-12-11 05:22:58', '2021-12-11 05:22:58'),
(11, 4, 10, 'Dell', 'ডেল', 'dell', 'ডেল', '2021-12-11 05:24:12', '2021-12-11 05:24:12'),
(12, 4, 10, 'HP', 'এইচপি', 'hp', 'এইচপি', '2021-12-11 05:24:33', '2021-12-11 05:24:33'),
(13, 4, 11, 'Samsung', 'স্যামসাঙ', 'samsung', 'স্যামসাঙ', '2021-12-11 05:24:49', '2021-12-11 05:24:49'),
(14, 4, 11, 'Walton', 'ওয়াল্টন', 'walton', 'ওয়াল্টন', '2021-12-11 05:25:01', '2021-12-11 05:25:01'),
(15, 5, 14, 'Pant', 'প্যান্ট', 'pant', 'প্যান্ট', '2021-12-11 05:26:35', '2021-12-11 05:26:35'),
(16, 5, 14, 'Shoe', 'শু', 'shoe', 'শু', '2021-12-11 05:26:53', '2021-12-11 05:26:53'),
(17, 5, 15, 'Hijab', 'হিজাব', 'hijab', 'হিজাব', '2021-12-11 05:27:21', '2021-12-11 05:27:21'),
(18, 5, 15, 'Three-Piece', 'থ্রি-পিচ', 'three-piece', 'থ্রি-পিচ', '2021-12-11 05:28:13', '2021-12-11 05:28:13'),
(19, 7, 19, 'Men', 'ম্যান', 'men', 'ম্যান', '2021-12-11 05:30:07', '2021-12-11 05:30:07'),
(20, 7, 19, 'Women', 'ওমেন', 'women', 'ওমেন', '2021-12-11 05:30:33', '2021-12-11 05:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
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

INSERT INTO `users` (`id`, `name`, `phone`, `image`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '1234567890', 'frontend/media/1717392123470433.jpg', 1, 'admin@admin.com', NULL, '$2y$10$.L7W34MuQkccaKl.cbf4J.RLzhQyxhsHEzDo7sK2srTA6akOR/MF.', NULL, '2021-11-20 23:18:52', '2021-11-25 03:46:04'),
(2, 'user1', '12234556789', 'frontend/media/1717215037761938.png', 2, 'user1@user.com', NULL, '$2y$10$iX4AtBDDzU.VJ5ZCZgSLIelzoTwZ4bZvkB5/h7Uszp1a44EjsOuR.', NULL, '2021-11-20 23:20:25', '2021-11-23 05:52:11'),
(3, 'user11', '01010101010', 'frontend/media/images.png\n', 2, 'user11@user.com', NULL, '$2y$10$f5K8yXRzahghDYkun9zY2.mNqSopsQ.gRgz9ITqEDAk4WqPlLeMKW', NULL, '2021-11-22 00:10:19', '2021-11-22 00:10:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_sub_categories_category_id_foreign` (`category_id`),
  ADD KEY `sub_sub_categories_sub_category_id_foreign` (`sub_category_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD CONSTRAINT `sub_sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_sub_categories_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
