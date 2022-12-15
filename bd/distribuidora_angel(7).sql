-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2022 a las 00:55:31
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `distribuidora_angel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `cod_catalogo` int(11) NOT NULL,
  `cod_compra_cata` int(11) NOT NULL,
  `cod_producto_cata` int(11) NOT NULL,
  `cod_promocion_cat` int(11) NOT NULL,
  `lote` int(11) NOT NULL,
  `stock` decimal(10,2) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `cantidad_compra` decimal(10,2) NOT NULL,
  `precio_total` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`cod_catalogo`, `cod_compra_cata`, `cod_producto_cata`, `cod_promocion_cat`, `lote`, `stock`, `fecha_vencimiento`, `precio_venta`, `precio_compra`, `cantidad_compra`, `precio_total`, `estado`, `created_at`, `update_at`) VALUES
(2, 2, 1, 1, 10, '500.00', '2022-12-08', '20.00', '10.00', '80.00', '120.00', 1, '2022-11-06 21:41:48', '2022-11-06 21:41:48'),
(3, 1, 2, 2, 11, '80.00', '2022-12-09', '50.00', '200.00', '500.00', '180.00', 1, '2022-11-06 21:42:44', '2022-11-06 21:42:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `cod_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cod_categoria`, `nombre_categoria`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Galleta', 1, '2022-11-06 21:02:27', '2022-11-28 04:12:25'),
(2, 'Chocolaste', 1, '2022-11-06 21:02:43', '2022-11-24 02:31:43'),
(3, 'Abarote', 1, '2022-11-06 21:02:53', '2022-11-24 02:31:50'),
(24, 'CHUPETE', 0, '2022-11-17 02:12:37', '2022-11-17 02:13:07'),
(26, 'galletas mable', 0, '2022-11-17 05:13:47', '2022-11-17 05:13:58'),
(27, 'LACTEOS', 0, '2022-11-24 02:53:11', '2022-11-24 02:53:25'),
(28, 'bebida', 0, '2022-11-24 05:15:39', '2022-11-24 05:15:51'),
(29, 'bebidas', 0, '2022-11-24 19:22:33', '2022-11-28 04:12:15'),
(30, 'lacteos', 0, '2022-11-28 01:41:17', '2022-11-28 05:40:25'),
(31, 'soya', 0, '2022-11-28 02:17:45', '2022-11-28 02:17:50'),
(32, 'jjj', 0, '2022-11-28 05:40:36', '2022-12-08 23:51:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(11) NOT NULL,
  `cod_persona_cli` int(11) NOT NULL,
  `nit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `razon_social` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `cod_persona_cli`, `nit`, `razon_social`, `estado`, `created_at`, `updated_at`) VALUES
(1, 2, '44521', 'socials', 0, '2022-11-06 21:38:00', '2022-11-22 02:10:34'),
(2, 1, '1714', 'pepe', 0, '2022-11-06 21:38:21', '2022-11-22 02:11:25'),
(3, 19, '48786', 'solizz', 0, '2022-11-20 02:31:46', '2022-12-07 04:29:23'),
(4, 25, '487454', 'MARCO', 1, '2022-11-24 05:14:41', '2022-11-24 05:14:41'),
(5, 9, '481354', 'AV.PEREZ', 1, '2022-11-24 06:14:00', '2022-11-24 06:14:00'),
(6, 9, '123456789012', 'gsffsadsadsa', 1, '2022-12-07 04:39:08', '2022-12-07 04:39:08'),
(7, 9, '123456789012', 'gsffsadsadsa', 1, '2022-12-07 04:40:11', '2022-12-07 04:40:11'),
(8, 1, '123456789011', 'fera', 1, '2022-12-07 04:43:19', '2022-12-07 04:43:19'),
(9, 21, '1234567890', 'dddd', 1, '2022-12-15 06:30:09', '2022-12-15 06:30:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `cod_compra` int(11) NOT NULL,
  `cod_proveedor_com` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`cod_compra`, `cod_proveedor_com`, `descripcion`, `fecha`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'se compro todo', '2022-11-06 05:58:17', 1, '2022-11-06 04:58:57', '2022-11-06 04:58:57'),
(2, 2, 'se compro galletas', '2022-11-06 22:36:52', 1, '2022-11-06 21:37:07', '2022-11-06 21:37:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `cod_devolucion` int(11) NOT NULL,
  `cod_pedido_devo` int(11) NOT NULL,
  `motivo` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`cod_devolucion`, `cod_pedido_devo`, `motivo`, `estado`, `created_at`, `updated_at`) VALUES
(1, 2, 'mal estado', 1, '2022-11-06 21:43:36', '2022-11-06 21:43:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `medida`
--

CREATE TABLE `medida` (
  `cod_medida` int(11) NOT NULL,
  `nombre_medida` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sigla_medida` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `medida`
--

INSERT INTO `medida` (`cod_medida`, `nombre_medida`, `sigla_medida`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'JAVA', 'JVs', 0, '2022-11-06 21:03:22', '2022-11-28 05:32:23'),
(2, 'XXX', 'CJ', 0, '2022-11-06 21:03:53', '2022-11-24 02:50:51'),
(3, 'UNIDAD', 'UNI', 1, '2022-11-16 22:58:57', '2022-11-16 23:50:31'),
(4, 'PAQUETES', 'PQ', 0, '2022-11-16 23:33:15', '2022-11-24 02:51:05'),
(5, 'BOLSAS', 'B', 0, '2022-11-17 02:44:04', '2022-11-17 02:44:55'),
(6, 'DEEEEED', 'D', 0, '2022-11-19 02:08:58', '2022-11-24 02:50:59'),
(7, 'LITRO', 'LTS', 1, '2022-11-24 02:51:37', '2022-12-08 23:51:17'),
(8, 'PAQUETES', 'P', 0, '2022-11-24 05:16:12', '2022-11-24 05:16:24'),
(9, 'peque', 'p', 0, '2022-11-28 02:34:41', '2022-11-28 02:34:54'),
(10, 'METRO', 'MT', 0, '2022-12-15 06:31:23', '2022-12-15 06:35:12'),
(11, 'DDD', 'D', 0, '2022-12-15 06:32:15', '2022-12-15 06:35:09'),
(12, 'MMM', 'M', 0, '2022-12-15 06:35:19', '2022-12-15 06:35:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_13_183937_create_permission_tables', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 8),
(5, 'App\\Models\\User', 5),
(5, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `cod_pedido` int(11) NOT NULL,
  `cod_promotor_ped` int(11) NOT NULL,
  `cod_cliente_ped` int(11) NOT NULL,
  `nota` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`cod_pedido`, `cod_promotor_ped`, `cod_cliente_ped`, `nota`, `estado`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'pepe', 1, '2022-11-06 21:39:37', '2022-11-06 21:39:37'),
(3, 2, 1, 'siiii', 1, '2022-11-06 23:14:42', '2022-11-06 23:14:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_catalogo`
--

CREATE TABLE `pedido_catalogo` (
  `cod_pedido_catalogo` int(11) NOT NULL,
  `cod_pedido_pcata` int(11) NOT NULL,
  `cod_catalogo_pcata` int(11) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'Categoriaindex', 'web', '2022-12-14 01:55:09', '2022-12-14 01:55:09'),
(4, 'Productoscreate', 'web', '2022-12-15 22:17:10', '2022-12-15 22:17:10'),
(5, 'Personaindex', 'web', '2022-12-15 22:17:36', '2022-12-16 03:38:45'),
(7, 'Vehiculosindex', 'web', '2022-12-16 03:41:35', '2022-12-16 03:41:35'),
(8, 'ModuloProductos', 'web', '2022-12-16 03:42:47', '2022-12-16 03:42:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `cod_persona` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `celular_2` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`cod_persona`, `nombre`, `apellido`, `celular`, `celular_2`, `direccion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Cristian', 'Antezana Novillo', '78505580', '76085872', 'AV.paitit', 1, '2022-11-05 02:24:01', '2022-12-09 01:30:43'),
(2, 'Mateo3s', 'Flores Perez', '69000000', '7854216', 'warnes', 1, '2022-11-06 04:56:55', '2022-12-09 03:21:40'),
(3, 'Maria soli', 'Guillermina', '78541364', '78954312', 'Santa Cruz', 1, '2022-11-06 04:57:38', '2022-11-24 05:17:27'),
(4, 'Antonio PERZ', 'Perez', '6521812', '1354896', 'santa cruz', 1, '2022-11-06 19:59:22', '2022-11-11 20:41:18'),
(5, 'Nicolas', 'Madero', '6521812', '1354896', 'santa cruz', 1, '2022-11-06 20:00:50', '2022-11-27 07:42:58'),
(6, 'SARAa', 'Perez', '6521812', '1354896', 'santa cruz', 1, '2022-11-06 20:00:50', '2022-11-27 07:38:39'),
(7, 'Sofia', 'Soliz', '6521812', '1354896', 'santa cruz', 1, '2022-11-06 20:00:50', '2022-11-11 20:42:43'),
(8, 'Marcelo', 'Suarez', '6521812', '1354896', 'santa cruz', 1, '2022-11-06 20:00:50', '2022-11-11 20:41:34'),
(9, 'Marcos Soses', 'Reinagas', '6521812', '1354896', 'Cochabamba', 1, '2022-11-06 20:00:50', '2022-11-28 01:21:23'),
(10, 'Cristian', 'Ronaldo', '76085872', '6902561', 'Portugal', 1, '2022-11-10 09:21:08', '2022-11-11 21:09:39'),
(11, 'Lalo', 'Suarez', '764524', '7861315', 'LALOCURA', 1, '2022-11-10 09:26:45', '2022-11-27 07:45:21'),
(12, 'Jose Luis', 'toreto', '78466131', '7964631', 'recreo', 1, '2022-11-11 03:25:19', '2022-11-11 20:29:44'),
(13, 'Jasminippp', 'perez cabrera', '796541213', '86464898', 'lolasds', 1, '2022-11-11 22:51:09', '2022-11-11 22:51:40'),
(14, 'FEDRICO', 'PEREZ', '79654128', '68126852', 'POPO', 1, '2022-11-12 00:02:50', '2022-11-17 02:00:45'),
(15, 'asdsad', 'dsadas', '54545', '454', 'fggtgt', 0, '2022-11-16 04:49:19', '2022-12-13 01:48:21'),
(16, 'abigail', 'flores', '79622041', '6985412', '4to anillo', 1, '2022-11-17 02:04:51', '2022-11-18 06:22:05'),
(17, 'jose', 'añez', '7455', '5454', 'av', 1, '2022-11-17 05:12:49', '2022-11-18 06:21:51'),
(18, 'Cristian', 'Fernandez', '6954821', '6985412', 'av.pirai', 1, '2022-11-19 18:03:51', '2022-11-27 07:42:50'),
(19, 'Cristian', 'Mercado', '78951', '96541', 'AV,fernandez', 1, '2022-11-19 18:04:24', '2022-11-27 19:31:27'),
(20, 'qwqw', 'asddsd', '692202', '6962511', 'trerer', 1, '2022-11-20 02:48:03', '2022-11-24 02:07:47'),
(21, 'Pedro', 'Martinez Soliz', '7859601', '6958131', 'av.popop', 1, '2022-11-20 02:54:19', '2022-11-22 02:11:41'),
(23, 'Gerardo', 'Tapia Soliz', '6985412', '78205821', 'AV.Cañoto', 1, '2022-11-24 00:38:20', '2022-11-24 02:07:36'),
(24, 'Maurici', 'Soliz', '69000000', '6564584', 'AV.Cañoto', 1, '2022-11-24 05:12:22', '2022-12-07 04:08:14'),
(25, 'MARCOS', 'SUAREZ', '6858461', '68451', 'av.paurito', 0, '2022-11-24 05:14:18', '2022-12-07 04:08:23'),
(26, 'Mateo', 'Soliz Martinez', '69000001', '69000000', 'av_soliz', 1, '2022-12-09 03:08:30', '2022-12-09 03:08:30'),
(27, 'Pedro', 'Martinez', '76085872', '69026026', 'Paititi', 1, '2022-12-15 06:24:20', '2022-12-15 06:24:20'),
(28, 'Joselito', 'Vaca', '73123148', '78505580', 'PERAFLORES', 1, '2022-12-15 06:46:34', '2022-12-15 06:46:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
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
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `cod_presentacion` int(11) NOT NULL,
  `cod_medida_pre` int(11) NOT NULL,
  `nombre_presentacion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`cod_presentacion`, `cod_medida_pre`, `nombre_presentacion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 2, '20g', 0, '2022-11-06 21:20:47', '2022-11-24 01:22:41'),
(2, 2, '50g', 1, '2022-11-06 21:21:19', '2022-11-17 01:16:13'),
(3, 1, '400g', 1, '2022-11-06 21:24:11', '2022-11-06 21:24:11'),
(4, 1, '240 kg', 0, '2022-11-17 00:14:32', '2022-11-28 03:32:19'),
(5, 4, '30 CAJAS', 1, '2022-11-17 01:11:29', '2022-11-17 01:11:29'),
(6, 1, '50 gramo', 1, '2022-11-17 01:23:52', '2022-11-24 01:29:42'),
(7, 4, 'kilo gramos', 0, '2022-11-17 01:31:23', '2022-11-24 01:22:09'),
(8, 3, 'KILOGRAMOS', 0, '2022-11-24 01:30:03', '2022-11-28 03:33:18'),
(9, 7, 'SODA', 0, '2022-11-24 02:52:27', '2022-11-24 02:52:47'),
(10, 7, 'paquetes de 8', 0, '2022-11-24 19:24:38', '2022-11-28 03:29:09'),
(11, 7, 'prueba_ 8', 0, '2022-11-28 02:55:26', '2022-11-28 03:28:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `cod_producto` int(11) NOT NULL,
  `cod_categoria_produ` int(11) NOT NULL,
  `cod_presentacion_produ` int(11) NOT NULL,
  `nombre_producto` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod_producto`, `cod_categoria_produ`, `cod_presentacion_produ`, `nombre_producto`, `imagen`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Wafs limon', 'foto.jpg', 0, '2022-11-06 21:21:54', '2022-11-16 21:57:29'),
(2, 3, 5, 'FIdeos', 'fideo.jpg', 1, '2022-11-06 21:25:16', '2022-11-24 02:53:59'),
(3, 1, 2, 'LA SUPREMA FRESA', 'FOTO.JPG', 0, '2022-11-06 23:26:48', '2022-11-24 01:42:07'),
(4, 3, 3, 'pelota', NULL, 0, '2022-11-16 21:07:44', '2022-11-16 21:57:19'),
(5, 3, 2, 'sublime', NULL, 0, '2022-11-16 21:11:05', '2022-11-16 21:56:17'),
(6, 3, 2, 'ddddddd', NULL, 0, '2022-11-16 21:11:46', '2022-11-16 21:54:29'),
(7, 1, 2, 'SUBLIME', NULL, 0, '2022-11-16 21:13:37', '2022-11-24 01:46:50'),
(8, 3, 5, 'soda', NULL, 1, '2022-11-24 02:53:51', '2022-11-28 03:40:15'),
(9, 2, 5, 'SODA', NULL, 0, '2022-11-24 05:16:48', '2022-11-24 05:17:06'),
(10, 29, 10, 'coca cola', NULL, 0, '2022-11-24 19:25:11', '2022-11-28 03:40:04'),
(11, 29, 3, 'listones', NULL, 1, '2022-11-28 03:40:30', '2022-11-28 03:40:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `cod_promocion` int(11) NOT NULL,
  `nombre_promocion` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_promocion` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`cod_promocion`, `nombre_promocion`, `descripcion_promocion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'PROMOCION NAVIDEÑA', 'HASTA DICIEMBRE', 1, '2022-11-06 20:20:20', '2022-11-06 20:20:20'),
(2, 'PROMOCION VACACIONALES', 'TODO VENCIMIENTO', 1, '2022-11-06 20:20:51', '2022-11-06 20:20:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promotor`
--

CREATE TABLE `promotor` (
  `cod_promotor` int(11) NOT NULL,
  `cod_usuario_pro` int(11) NOT NULL,
  `cod_vehiculo_pro` int(11) NOT NULL,
  `comision` decimal(10,2) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `promotor`
--

INSERT INTO `promotor` (`cod_promotor`, `cod_usuario_pro`, `cod_vehiculo_pro`, `comision`, `fecha_ingreso`, `estado`, `created_at`, `updated_at`) VALUES
(2, 2, 4, '600.00', '0000-00-00', 1, '2022-11-06 20:18:42', '2022-11-06 20:18:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `cod_proveedor` int(11) NOT NULL,
  `cod_persona_prove` int(11) NOT NULL,
  `empresa` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `razon_social` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`cod_proveedor`, `cod_persona_prove`, `empresa`, `razon_social`, `estado`, `created_at`, `updated_at`) VALUES
(1, 3, 'Coca-Colaaaa', 'Cola', 0, '2022-11-06 04:58:08', '2022-11-24 05:17:33'),
(2, 8, 'La suprema', 'suprema', 0, '2022-11-06 21:36:42', '2022-11-24 05:18:15'),
(3, 9, 'PIL', 'PIL ASO', 1, '2022-11-22 04:35:36', '2022-11-22 04:35:36'),
(4, 18, 'SOBOLMA', 'SO', 1, '2022-11-22 04:37:30', '2022-11-24 00:35:55'),
(5, 23, 'SOBOLMA', 'SOBOLAM-SRL', 1, '2022-11-24 00:39:08', '2022-11-24 00:40:47'),
(6, 18, 'Coca-Colaaaa', 'SOBOLAM-SRL', 0, '2022-11-24 05:18:04', '2022-11-28 01:20:04'),
(7, 2, 'dadsad', 'dasd', 1, '2022-12-07 04:41:45', '2022-12-07 04:41:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `cod_rol` int(11) NOT NULL,
  `nombre_rol` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_At` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`cod_rol`, `nombre_rol`, `estado`, `created_at`, `updated_At`) VALUES
(1, 'almacenero', 1, '2022-11-06 03:25:50', '2022-11-06 03:25:50'),
(3, 'Administrador', 1, '2022-11-06 20:12:15', '2022-11-06 20:12:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(4, 'Administrador', 'web', '2022-12-15 04:18:17', '2022-12-15 04:18:17'),
(5, 'Promotor', 'web', '2022-12-15 04:18:32', '2022-12-15 04:18:32'),
(10, 'Jefe de almacén', 'web', '2022-12-16 02:52:22', '2022-12-16 02:52:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(3, 5),
(3, 10),
(4, 4),
(5, 4),
(5, 5),
(5, 10),
(7, 4),
(8, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cod_persona_users` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `cod_persona_users`, `name`, `email`, `email_verified_at`, `password`, `estado`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'cristian', 'cristian1997@gmail.com', NULL, '$2y$10$xJwwsNhPr2YGsAyvUw/m0e7/GpAg8L1piedD1HRpGR504sBSyKo2.', 1, NULL, '2022-12-08 03:35:31', '2022-12-13 01:46:15'),
(3, 19, NULL, 'matis@gmail.com', NULL, '$2y$10$xPxY6V/i.jcmUTIgqjWbWO0.mIMTL.1lHU7hKaXg12E/zvXjcCnzm', 1, NULL, '2022-12-09 02:27:59', '2022-12-09 03:23:07'),
(4, 2, NULL, 'mateo@gmail.com', NULL, '$2y$10$Qv4RJp5Cyr.h.2b3HaOvQ.4Qh.gpX4Wq.i7tx83SVmGkGw3eGW7RO', 1, NULL, '2022-12-13 02:52:33', '2022-12-13 02:52:33'),
(5, 27, NULL, 'pedro@gamil.com', NULL, '$2y$10$RlXDLqrl4FZnXTn9OC0cMeM9jqLxmfoshm3AQwkBKOfsvnGu5XaJO', 1, NULL, '2022-12-15 06:25:10', '2022-12-15 06:25:10'),
(6, 21, NULL, 'pepe@gmail.com', NULL, '$2y$10$HNSvkuRXV1FtUzsSeg8iUuzyoXxjPjsf5Rle19BAl4iSMyYuiBGGi', 1, NULL, '2022-12-15 06:26:13', '2022-12-15 06:26:13'),
(7, 28, NULL, 'JOSE@gmail.com', NULL, '$2y$10$Mw1RhXIZHuuJSqojv2pv1.pFINwBWmCN0xoT.aPXwsG3gC.EtAR7e', 1, NULL, '2022-12-15 06:47:14', '2022-12-15 06:47:14'),
(8, 10, NULL, 'pachu123@gmail.com', NULL, '$2y$10$TtZ.HDToAVxHlaZtT1k/Q.J/Vx6zmvYRBM0pAztVZSQMkThDZqnCi', 1, NULL, '2022-12-16 03:11:08', '2022-12-16 03:11:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `cod_persona_usu` int(11) NOT NULL,
  `cod_rol_usu` int(11) NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `cod_persona_usu`, `cod_rol_usu`, `password`, `correo`, `estado`, `created_at`, `updated_at`) VALUES
(2, 4, 1, '123456', 'antonio@gmail.com', 1, '2022-11-06 20:10:42', '2022-11-06 20:10:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `cod_vehiculo` int(11) NOT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `placa` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`cod_vehiculo`, `color`, `placa`, `marca`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'AZUL', '1235-PU', 'TOYOTA', 0, '2022-11-06 20:12:52', '2022-11-24 02:10:02'),
(2, 'VERDE', '123-XU', 'Bmw', 1, '2022-11-06 20:14:57', '2022-11-22 03:36:34'),
(3, 'NEGRO', '18515-AS', 'Ferrari', 1, '2022-11-06 20:14:57', '2022-11-06 20:14:57'),
(4, 'ROJO', '14235-GS', 'Ford', 1, '2022-11-06 20:14:57', '2022-11-28 03:49:25'),
(5, 'AZUL', '86951c', 'FERRAR', 0, '2022-11-22 03:14:41', '2022-11-28 03:48:13'),
(6, 'ROJO', '48752', 'FERARI', 0, '2022-11-24 05:11:19', '2022-11-24 05:11:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`cod_catalogo`),
  ADD KEY `cod_compra_cata` (`cod_compra_cata`),
  ADD KEY `cod_producto_cata` (`cod_producto_cata`),
  ADD KEY `cod_promocion_cat` (`cod_promocion_cat`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cod_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`),
  ADD KEY `cod_persona_cli` (`cod_persona_cli`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`cod_compra`),
  ADD KEY `cod_proveedor_com` (`cod_proveedor_com`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`cod_devolucion`),
  ADD KEY `cod_pedido_devo` (`cod_pedido_devo`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `medida`
--
ALTER TABLE `medida`
  ADD PRIMARY KEY (`cod_medida`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`cod_pedido`),
  ADD KEY `cod_promotor_ped` (`cod_promotor_ped`),
  ADD KEY `cod_cliente_ped` (`cod_cliente_ped`);

--
-- Indices de la tabla `pedido_catalogo`
--
ALTER TABLE `pedido_catalogo`
  ADD PRIMARY KEY (`cod_pedido_catalogo`),
  ADD KEY `cod_pedido_pcata` (`cod_pedido_pcata`),
  ADD KEY `cod_catalogo_pcata` (`cod_catalogo_pcata`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`cod_persona`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`cod_presentacion`),
  ADD KEY `cod_medida_pre` (`cod_medida_pre`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`cod_producto`),
  ADD KEY `cod_categoria_produ` (`cod_categoria_produ`),
  ADD KEY `cod_presentacion_produ` (`cod_presentacion_produ`);

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`cod_promocion`);

--
-- Indices de la tabla `promotor`
--
ALTER TABLE `promotor`
  ADD PRIMARY KEY (`cod_promotor`),
  ADD KEY `cod_usuario_pro` (`cod_usuario_pro`),
  ADD KEY `cod_vehiculo_pro` (`cod_vehiculo_pro`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`cod_proveedor`),
  ADD KEY `cod_persona_prove` (`cod_persona_prove`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`cod_rol`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD KEY `cod_persona_usu` (`cod_persona_usu`),
  ADD KEY `cod_rol_usu` (`cod_rol_usu`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`cod_vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `cod_catalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cod_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `cod_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `cod_devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medida`
--
ALTER TABLE `medida`
  MODIFY `cod_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `cod_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedido_catalogo`
--
ALTER TABLE `pedido_catalogo`
  MODIFY `cod_pedido_catalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `cod_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `cod_presentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `cod_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `cod_promocion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `promotor`
--
ALTER TABLE `promotor`
  MODIFY `cod_promotor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `cod_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `cod_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `cod_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD CONSTRAINT `catalogo_ibfk_1` FOREIGN KEY (`cod_promocion_cat`) REFERENCES `promocion` (`cod_promocion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catalogo_ibfk_2` FOREIGN KEY (`cod_producto_cata`) REFERENCES `producto` (`cod_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catalogo_ibfk_3` FOREIGN KEY (`cod_compra_cata`) REFERENCES `compra` (`cod_compra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`cod_persona_cli`) REFERENCES `persona` (`cod_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`cod_proveedor_com`) REFERENCES `proveedor` (`cod_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`cod_pedido_devo`) REFERENCES `pedido` (`cod_pedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cod_promotor_ped`) REFERENCES `promotor` (`cod_promotor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`cod_cliente_ped`) REFERENCES `cliente` (`cod_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido_catalogo`
--
ALTER TABLE `pedido_catalogo`
  ADD CONSTRAINT `pedido_catalogo_ibfk_1` FOREIGN KEY (`cod_pedido_pcata`) REFERENCES `pedido` (`cod_pedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_catalogo_ibfk_2` FOREIGN KEY (`cod_catalogo_pcata`) REFERENCES `catalogo` (`cod_catalogo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD CONSTRAINT `presentacion_ibfk_1` FOREIGN KEY (`cod_medida_pre`) REFERENCES `medida` (`cod_medida`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`cod_categoria_produ`) REFERENCES `categoria` (`cod_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`cod_presentacion_produ`) REFERENCES `presentacion` (`cod_presentacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `promotor`
--
ALTER TABLE `promotor`
  ADD CONSTRAINT `promotor_ibfk_1` FOREIGN KEY (`cod_vehiculo_pro`) REFERENCES `vehiculo` (`cod_vehiculo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `promotor_ibfk_2` FOREIGN KEY (`cod_usuario_pro`) REFERENCES `usuario` (`cod_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`cod_persona_prove`) REFERENCES `persona` (`cod_persona`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_persona_usu`) REFERENCES `persona` (`cod_persona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`cod_rol_usu`) REFERENCES `rol` (`cod_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
