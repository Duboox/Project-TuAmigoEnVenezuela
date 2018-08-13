-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2018 a las 06:11:58
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tuamigoenvenezuela_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agents`
--

CREATE TABLE `agents` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday_date` date NOT NULL,
  `rating` int(11) NOT NULL,
  `option` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `agents`
--

INSERT INTO `agents` (`id`, `name`, `last_name`, `email`, `phone`, `birthday_date`, `rating`, `option`, `created_at`, `updated_at`, `deleted_at`, `id_user`) VALUES
(1, 'Mr. Laron Durgan IV', 'Pullok', 'adeline.lebsack@example.com', '855-837-1699', '2018-11-21', 3, NULL, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 5),
(2, 'Evans Gutkowski PhD', 'Pullok', 'kaitlyn64@example.com', '844.856.2400', '2018-06-20', 4, NULL, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 4),
(3, 'Ms. Alice Cremin', 'Pullok', 'labadie.arnoldo@example.org', '800.427.4704', '2018-05-18', 1, NULL, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 1),
(4, 'Aiden Runte', 'Pullok', 'nschaden@example.com', '844.531.1127', '2018-07-05', 3, NULL, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 1),
(5, 'Dante Hodkiewicz', 'Pullok', 'katrine.baumbach@example.org', '1-800-869-4680', '2018-10-23', 2, NULL, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday_date` date NOT NULL,
  `option` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `name`, `last_name`, `email`, `phone`, `birthday_date`, `option`, `created_at`, `updated_at`, `deleted_at`, `id_user`) VALUES
(1, 'Reba Bednar', 'Pullok', 'jacobi.wilfredo@example.org', '1-877-475-2910', '2018-12-13', NULL, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 3),
(2, 'Dr. Sheridan Block DVM', 'Pullok', 'pleannon@example.net', '844.610.1323', '2018-11-06', NULL, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 3),
(3, 'Mr. Herman Nicolas I', 'Pullok', 'rohan.tressie@example.org', '888.612.0970', '2018-11-17', NULL, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 5),
(4, 'Dillan Johns', 'Pullok', 'ebert.domenico@example.net', '855.315.1237', '2018-03-12', NULL, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 5),
(5, 'Anahi Gorczany DVM', 'Pullok', 'alisa.heidenreich@example.org', '1-877-462-5993', '2018-04-13', NULL, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `correlative` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_client` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_agent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luggage` int(11) NOT NULL,
  `hand_luggage` int(11) NOT NULL,
  `origin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destination` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adults` int(11) NOT NULL,
  `kids` int(11) NOT NULL,
  `bebys` int(11) NOT NULL,
  `exit_date` date NOT NULL,
  `exit_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arrival_date` date NOT NULL,
  `exit_rate` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `invoices`
--

INSERT INTO `invoices` (`id`, `correlative`, `id_client`, `id_agent`, `luggage`, `hand_luggage`, `origin`, `destination`, `adults`, `kids`, `bebys`, `exit_date`, `exit_time`, `arrival_date`, `exit_rate`, `price`, `created_at`, `updated_at`, `deleted_at`, `id_user`) VALUES
(1, 'TAV2018-1', '4', '5', 3, 4, 'West Dominique', 'Ziemeview', 7, 5, 2, '2018-11-26', '12:9', '2018-08-19', 163, 7980, '2018-08-10 15:59:13', '2018-08-10 17:09:11', NULL, 1),
(2, 'TAV2018-9', '2', '2', 1, 10, 'Port Edyth', 'Darrelland', 5, 3, 5, '2018-12-13', '4:3', '2018-02-19', 816, 5812, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 2),
(3, 'TAV2018-3', '2', '4', 9, 7, 'East Dandrechester', 'Edwardmouth', 3, 4, 4, '2018-10-10', '2:43', '2018-05-12', 378, 3762, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 1),
(4, 'TAV2018-6', '3', '1', 4, 3, 'New Clintonshire', 'Eloisamouth', 3, 4, 1, '2018-01-12', '7:12', '2018-06-10', 309, 7429, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 3),
(5, 'TAV2018-2', '5', '2', 5, 7, 'South Lucinda', 'West Lilly', 1, 5, 5, '2018-12-02', '14:4', '2018-05-19', 302, 9951, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 5),
(6, 'TAV2018-6', '4', '5', 12, 12, 'asd', 'asd', 2, 3, 4, '2018-08-16', '12:23', '2018-08-24', 1233, 1233, '2018-08-10 22:02:38', '2018-08-10 22:03:54', NULL, 1),
(7, 'TAV2018-7', '3', '3', 23, 23, 'asd', 'asd', 2, 3, 4, '2018-08-22', '12:23', '2018-08-23', 45, 45, '2018-08-10 22:03:35', '2018-08-10 22:03:35', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice_services`
--

CREATE TABLE `invoice_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_invoice` int(10) UNSIGNED NOT NULL,
  `id_service` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `invoice_services`
--

INSERT INTO `invoice_services` (`id`, `created_at`, `updated_at`, `deleted_at`, `id_invoice`, `id_service`, `id_user`) VALUES
(1, '2018-08-10 15:59:13', '2018-08-10 22:07:24', '2018-08-10 22:07:24', 1, 1, 5),
(2, '2018-08-10 15:59:13', '2018-08-10 22:07:24', '2018-08-10 22:07:24', 1, 2, 1),
(3, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 2, 1, 1),
(4, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 2, 4, 3),
(5, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 2, 5, 2),
(6, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 2, 2, 1),
(7, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 3, 1, 5),
(8, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 3, 4, 4),
(9, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 4, 3, 3),
(10, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 4, 5, 5),
(11, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 4, 3, 1),
(12, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 5, 5, 5),
(13, '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 5, 3, 2),
(14, '2018-08-10 15:59:14', '2018-08-10 15:59:14', NULL, 5, 1, 4),
(15, '2018-08-10 17:06:22', '2018-08-10 22:07:24', '2018-08-10 22:07:24', 1, 3, 1),
(16, '2018-08-10 22:02:38', '2018-08-10 22:02:38', NULL, 6, 1, 1),
(17, '2018-08-10 22:02:38', '2018-08-10 22:02:38', NULL, 6, 2, 1),
(18, '2018-08-10 22:03:35', '2018-08-10 22:03:35', NULL, 7, 1, 1),
(19, '2018-08-10 22:07:24', '2018-08-10 22:07:24', NULL, 1, 6, 1),
(20, '2018-08-10 22:07:24', '2018-08-10 22:07:24', NULL, 1, 7, 1),
(21, '2018-08-10 22:07:24', '2018-08-10 22:07:24', NULL, 1, 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2015_01_20_084450_create_roles_table', 1),
(30, '2015_01_20_084525_create_role_user_table', 1),
(31, '2015_01_24_080208_create_permissions_table', 1),
(32, '2015_01_24_080433_create_permission_role_table', 1),
(33, '2015_12_04_003040_add_special_role_column', 1),
(34, '2017_10_17_170735_create_permission_user_table', 1),
(35, '2018_08_05_140719_create_clients_table', 1),
(36, '2018_08_05_140911_create_agents_table', 1),
(37, '2018_08_05_141145_create_invoices_table', 1),
(38, '2018_08_05_184526_create_services_table', 1),
(39, '2018_08_05_185341_create_invoice_services_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Navegar usuarios', 'users.index', 'Lista y navega todos los usuarios del sistema', '2018-08-10 15:59:13', '2018-08-10 15:59:13'),
(2, 'Edición de usuarios', 'users.edit', 'Podría editar cualquier dato de un usuario del sistema', '2018-08-10 15:59:13', '2018-08-10 15:59:13'),
(3, 'Eliminar usuario', 'users.destroy', 'Podría eliminar cualquier usuario del sistema', '2018-08-10 15:59:13', '2018-08-10 15:59:13'),
(4, 'Generar reporte de usuarios en PDF', 'users.pdf.view', 'Se podria generar un reporte con la data de los usuarios', '2018-08-10 15:59:13', '2018-08-10 15:59:13'),
(5, 'Navegar roles', 'roles.index', 'Lista y navega todos los roles del sistema', '2018-08-10 15:59:13', '2018-08-10 15:59:13'),
(6, 'Creación de roles', 'roles.create', 'Podría crear nuevos roles en el sistema', '2018-08-10 15:59:13', '2018-08-10 15:59:13'),
(7, 'Edición de roles', 'roles.edit', 'Podría editar cualquier dato de un rol del sistema', '2018-08-10 15:59:13', '2018-08-10 15:59:13'),
(8, 'Eliminar roles', 'roles.destroy', 'Podría eliminar cualquier rol del sistema', '2018-08-10 15:59:13', '2018-08-10 15:59:13'),
(9, 'Roles Asignados', 'roles.assigns', 'Podría ver los roles asignados en el sistema', '2018-08-10 15:59:13', '2018-08-10 15:59:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `special`) VALUES
(1, 'developer', 'developer', 'Super Usuario', '2018-08-10 15:59:13', '2018-08-10 15:59:13', 'all-access');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`, `id_user`) VALUES
(1, 'Cullen Rutherford Jr.', 'Blaze Kertzmann', '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 5),
(2, 'Alvena Cartwright', 'Mr. Davonte Kutch', '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 4),
(3, 'Sydnee Sawayn', 'Arne Marvin DVM', '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 4),
(4, 'Edward Keeling', 'Adah Schaefer', '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 4),
(5, 'Annabel Hane', 'Prof. Francisco Adams MD', '2018-08-10 15:59:13', '2018-08-10 15:59:13', NULL, 3),
(6, 'Poliza Nacional', 'Servicio de Poliza Nacional', '2018-08-10 22:05:44', '2018-08-10 22:05:44', NULL, 1),
(7, 'Poliza Internacional', 'Servicio de Poliza Internacional', '2018-08-10 22:06:09', '2018-08-10 22:06:09', NULL, 1),
(8, 'Boleto Aereo', 'Servicio de boleto aereo', '2018-08-10 22:06:25', '2018-08-10 22:06:25', NULL, 1),
(9, 'Boleto Terrestre', 'Servicio de boleto terrestre', '2018-08-10 22:06:40', '2018-08-10 22:06:40', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `confirmed`, `password`, `avatar`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Joshua', 'Martinez', 'test@test.com', NULL, '$2y$10$.v/R6eG3krvj8Ip7ifT24eI7E37198jUhjTHEQfnd5uQyA63m3tGi', 't5UMNJFNfMc2JEzix4k7_e35b70cb017e8aac405bd9ce99ce38b4.jpg', 'iY1zV6EoJ6', NULL, '2018-08-10 15:59:13', '2018-08-10 16:50:25'),
(2, 'Noah Dare', 'Pullok', 'fmoore@example.com', NULL, '$2y$10$.v/R6eG3krvj8Ip7ifT24eI7E37198jUhjTHEQfnd5uQyA63m3tGi', 'default.png', 'YxCiVBcKCl', NULL, '2018-08-10 15:59:13', '2018-08-10 15:59:13'),
(3, 'Mr. Jamaal Konopelski PhD', 'Pullok', 'witting.gino@example.com', NULL, '$2y$10$.v/R6eG3krvj8Ip7ifT24eI7E37198jUhjTHEQfnd5uQyA63m3tGi', 'default.png', 'kNs3Rltmyu', NULL, '2018-08-10 15:59:13', '2018-08-10 15:59:13'),
(4, 'Chester Armstrong I', 'Pullok', 'maude.corwin@example.com', NULL, '$2y$10$.v/R6eG3krvj8Ip7ifT24eI7E37198jUhjTHEQfnd5uQyA63m3tGi', 'default.png', 'eIUEN81Wlz', NULL, '2018-08-10 15:59:13', '2018-08-10 15:59:13'),
(5, 'Irma Auer', 'Pullok', 'keebler.keaton@example.org', NULL, '$2y$10$.v/R6eG3krvj8Ip7ifT24eI7E37198jUhjTHEQfnd5uQyA63m3tGi', 'default.png', 'DP7yAhZZVn', NULL, '2018-08-10 15:59:13', '2018-08-10 15:59:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agents_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `invoice_services`
--
ALTER TABLE `invoice_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_services_id_invoice_foreign` (`id_invoice`),
  ADD KEY `invoice_services_id_service_foreign` (`id_service`),
  ADD KEY `invoice_services_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indices de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `invoice_services`
--
ALTER TABLE `invoice_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `agents_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `invoice_services`
--
ALTER TABLE `invoice_services`
  ADD CONSTRAINT `invoice_services_id_invoice_foreign` FOREIGN KEY (`id_invoice`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_services_id_service_foreign` FOREIGN KEY (`id_service`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_services_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
