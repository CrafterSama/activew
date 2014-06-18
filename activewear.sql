-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2014 a las 01:49:55
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `activewear`
--
CREATE DATABASE IF NOT EXISTS `activewear` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `activewear`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configurations`
--

CREATE TABLE IF NOT EXISTS `configurations` (
  `config_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `config_value` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  UNIQUE KEY `config_name` (`config_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `configurations`
--

INSERT INTO `configurations` (`config_name`, `config_value`) VALUES
('iva', '0.12'),
('wholesale_discount', '0.30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_05_10_184824_create_user_table', 1),
('2014_05_17_141437_create_products_table', 2),
('2014_05_17_141525_create_models_table', 2),
('2014_05_17_141634_create_orders_table', 2),
('2014_05_17_143656_create_prints_table', 3),
('2014_05_17_155143_create_roles_table', 3),
('2014_05_20_102047_prod_to_orders', 4),
('2014_05_25_011443_configurations', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE IF NOT EXISTS `modelos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `price_out_tax_float` float(8,2) NOT NULL,
  `price_out_tax_float_mayor` float(8,2) NOT NULL,
  `price_with_tax_float` float(8,2) NOT NULL,
  `price_with_tax_float_mayor` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `model_name` (`model_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id`, `model_name`, `price_out_tax_float`, `price_out_tax_float_mayor`, `price_with_tax_float`, `price_with_tax_float_mayor`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Largo', 1500.00, 0.00, 0.00, 0.00, '2014-05-22 17:23:15', '2014-05-22 17:23:15', '0000-00-00 00:00:00'),
(2, 'Niña', 1000.00, 0.00, 0.00, 0.00, '2014-05-22 17:44:15', '2014-05-22 17:44:15', '0000-00-00 00:00:00'),
(3, 'Short', 950.30, 0.00, 0.00, 0.00, '2014-05-22 17:51:20', '2014-05-24 05:53:51', '0000-00-00 00:00:00'),
(4, 'Capri', 1300.00, 0.00, 0.00, 0.00, '2014-05-25 04:46:51', '2014-05-25 04:46:51', '0000-00-00 00:00:00'),
(5, 'Tops', 1050.00, 0.00, 0.00, 0.00, '2014-06-09 07:43:35', '2014-06-09 07:43:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 3, 0, '2014-06-11 21:49:15', '2014-06-11 21:49:15'),
(2, 1, 21, '2014-06-17 03:58:47', '2014-06-17 03:58:47'),
(3, 1, 19, '2014-06-18 02:58:18', '2014-06-18 02:58:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stamp_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `amounts` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `stamp_id`, `model_id`, `amounts`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 10, '2014-05-26 02:45:02', '2014-05-26 02:45:02', NULL),
(2, 1, 2, 12, '2014-05-26 02:45:02', '2014-05-26 02:45:02', NULL),
(3, 1, 3, 6, '2014-05-26 02:45:02', '2014-05-26 02:45:02', NULL),
(4, 1, 4, 7, '2014-05-26 02:45:02', '2014-05-26 02:45:02', NULL),
(5, 1, 5, 13, '2014-05-26 02:45:02', '2014-05-26 02:45:02', NULL),
(6, 2, 1, 2, '2014-05-26 05:14:06', '2014-05-26 05:14:06', NULL),
(7, 2, 2, 4, '2014-05-26 05:14:06', '2014-05-26 05:14:06', NULL),
(8, 2, 3, 7, '2014-05-26 05:14:06', '2014-05-26 05:14:06', NULL),
(9, 2, 4, 1, '2014-05-26 05:14:07', '2014-05-26 05:14:07', NULL),
(10, 2, 5, 8, '2014-05-26 05:14:07', '2014-05-26 05:14:07', NULL),
(11, 3, 1, 4, '2014-05-26 05:14:53', '2014-05-26 05:14:53', NULL),
(12, 3, 2, 3, '2014-05-26 05:14:53', '2014-05-26 05:14:53', NULL),
(13, 3, 3, 5, '2014-05-26 05:14:53', '2014-05-26 05:14:53', NULL),
(14, 3, 4, 2, '2014-05-26 05:14:53', '2014-05-26 05:14:53', NULL),
(15, 3, 5, 7, '2014-05-26 05:14:53', '2014-05-26 05:14:53', NULL),
(16, 4, 1, 8, '2014-05-28 03:22:08', '2014-05-28 03:22:08', NULL),
(18, 4, 4, 7, '2014-05-28 03:22:08', '2014-05-28 03:22:08', NULL),
(19, 5, 1, 2, '2014-06-10 15:32:38', '2014-06-18 02:58:19', NULL),
(20, 7, 1, 2, '2014-06-10 16:43:50', '2014-06-10 16:43:50', NULL),
(21, 7, 2, 4, '2014-06-10 16:43:50', '2014-06-17 03:58:47', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prod_to_orders`
--

CREATE TABLE IF NOT EXISTS `prod_to_orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantities` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `prod_to_orders`
--

INSERT INTO `prod_to_orders` (`order_id`, `product_id`, `quantities`, `created_at`, `updated_at`) VALUES
(0, 21, 2, '2014-06-11 21:49:15', '2014-06-11 21:49:15'),
(2, 21, 2, '2014-06-17 03:58:47', '2014-06-17 03:58:47'),
(3, 19, 1, '2014-06-18 02:58:19', '2014-06-18 02:58:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '2014-05-18 03:59:44', '2014-05-18 03:59:44'),
(2, 'Usuario', '2014-05-18 03:59:44', '2014-05-18 03:59:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stamps`
--

CREATE TABLE IF NOT EXISTS `stamps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stamp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stampname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `stamps`
--

INSERT INTO `stamps` (`id`, `stamp`, `stampname`, `created_at`, `updated_at`) VALUES
(1, 'GIMWa9ouxyxVd8oL_25_05_2014_22_15_02_print_upload.JPG', 'Palmas de Colores', '2014-05-26 02:45:02', '2014-05-26 02:45:02'),
(2, 'YvH6eqfw1Fjrceal_26_05_2014_00_44_05_web_csstudio.JPG', 'CrafterSama Studio', '2014-05-26 05:14:05', '2014-05-26 05:14:05'),
(3, 'eaw8XyxPx49F7J0d_26_05_2014_00_44_52_bg_pioggia.JPG', 'Lycra Pioggia', '2014-05-26 05:14:52', '2014-05-26 05:14:52'),
(4, 'Rr0FhtL7bGO72epi_27_05_2014_22_52_07_Chrysanthemum.jpg', 'Naranja Floreado ', '2014-05-28 03:22:08', '2014-05-28 03:22:08'),
(5, 'YSrpXBVn3ir5LePL_10_06_2014_11_02_37_Jellyfish.jpg', 'Medusas Moteadas', '2014-06-10 15:32:37', '2014-06-10 15:32:37'),
(7, 'BOUk8AWi9ra4bJFr_10_06_2014_12_13_50_Hydrangeas.jpg', 'Verdes con Amarillos', '2014-06-10 16:43:50', '2014-06-10 16:43:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `role_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'craftersama', 'jolivero.03@gmail.com', '$2y$10$l8wfI8nhYZU96W2VyH.Qcu6/KQiA4AElEOuN1BbK1yJPTAZZS4uVG', 'Julmer Olivero', '1', 'R0CyHk9GIa8cXZckqh7ANIzda1KPQSJOcEojmrrdOh8uFUbCTf8jiPJVI0Ha', '2014-05-18 03:53:45', '2014-06-17 18:28:50', NULL),
(2, 'acendros', 'acendros@gmail.com', '$2y$10$uYjArHG1/I0pPu0NB347rulbLxda81RRaSwjtbSOONNN7HDyJEpRi', 'Alejandro Cendros', '1', '6elt2lyZdPI1K53JmPGVYDr35IrClQ9iTUSwbzSulBODCNvs1IXJCXHAOVJU', '2014-05-18 03:59:44', '2014-05-27 06:23:21', NULL),
(3, 'jsama', 'jsama@craftersama.me', '$2y$10$zEVe8.94idWOk5qdqrdXduvTuEWPzK/ScZJRf5gVKv0PY3V8GJT0W', 'Julmito Sama', '2', 'wf4Ea4xZ1X1R8qQNUHCsAonsTmCe8YK6wKoZIapo0HZF81rCcFBf9c9ed4Af', '2014-06-05 22:18:21', '2014-06-11 23:01:13', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
