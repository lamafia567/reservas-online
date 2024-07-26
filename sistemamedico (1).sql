-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-07-2024 a las 02:32:05
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemamedico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracions`
--

CREATE TABLE `configuracions` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuracions`
--

INSERT INTO `configuracions` (`id`, `nombre`, `direccion`, `fono`, `correo`, `logo`, `created_at`, `updated_at`) VALUES
(2, 'Vital salud y belleza', 'Lautaro 385, Los Ángeles, Bío Bío.', '989774461', 'clinica.vital@gmail.com', 'logos/ykT8E8XoPkyJ7mxAscwGjkdSEcHJrAU8fBob4miL.jpg', '2024-07-25 19:39:33', '2024-07-25 19:39:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorios`
--

CREATE TABLE `consultorios` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacidad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `consultorios`
--

INSERT INTO `consultorios` (`id`, `nombre`, `ubicacion`, `capacidad`, `telefono`, `especialidad`, `estado`, `created_at`, `updated_at`) VALUES
(2, 'REDUCTIVOS', '3cer Piso | Sala1205', '15', '77777777', 'REDUCTIVOS', 'ACTIVO', '2024-07-25 19:35:36', '2024-07-25 19:46:55'),
(3, 'TRATAMIENTOS FACIALES', '4to Piso | Sala 305', '15', '77777777', 'TRATAMIENTOS FACIALES', 'ACTIVO', '2024-07-25 19:35:36', '2024-07-25 19:48:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint UNSIGNED NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `run` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `licencia_medica` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `doctors`
--

INSERT INTO `doctors` (`id`, `nombres`, `apellidos`, `run`, `fono`, `licencia_medica`, `especialidad`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Carlos', 'Condes', '1234567-9', '77777777777', 'Si', 'PODOLOGÍA', 2, '2024-07-25 19:35:36', '2024-07-25 19:44:58'),
(2, 'Maria', 'Torres', '121231-9', '77777777777', 'Si', 'REDUCTIVOS', 3, '2024-07-25 19:35:36', '2024-07-25 19:46:36'),
(3, 'Pedro', 'Salazar', '1215151-9', '77777777777', 'Si', 'TRATAMIENTOS FACIALES', 4, '2024-07-25 19:35:36', '2024-07-25 19:47:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`, `color`, `user_id`, `doctor_id`, `created_at`, `updated_at`) VALUES
(1, '12:00 PODOLOGÍA', '2024-07-29 12:00:00', '2024-07-29 12:00:00', '#e82216', 6, 1, '2024-07-25 21:08:35', '2024-07-25 21:08:35'),
(2, '13:00 PODOLOGÍA', '2024-07-29 13:00:00', '2024-07-29 13:00:00', '#e82216', 8, 1, '2024-07-25 21:21:34', '2024-07-25 21:21:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historials`
--

CREATE TABLE `historials` (
  `id` bigint UNSIGNED NOT NULL,
  `detalles` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_visita` date NOT NULL,
  `paciente_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id` bigint UNSIGNED NOT NULL,
  `dia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `consultorio_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id`, `dia`, `hora_inicio`, `hora_fin`, `doctor_id`, `consultorio_id`, `created_at`, `updated_at`) VALUES
(2, 'MIERCOLES', '08:00:00', '19:00:00', 2, 2, '2024-07-25 19:49:00', '2024-07-25 19:49:00'),
(4, 'VIERNES', '12:00:00', '15:00:00', 3, 3, '2024-07-25 19:49:54', '2024-07-25 19:49:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_07_14_225348_create_secretarias_table', 1),
(7, '2024_07_15_233122_create_pacientes_table', 1),
(8, '2024_07_16_060843_create_consultorios_table', 1),
(9, '2024_07_16_062555_create_doctors_table', 1),
(10, '2024_07_16_062629_create_horarios_table', 1),
(11, '2024_07_19_010811_create_permission_tables', 1),
(12, '2024_07_19_182219_create_events_table', 1),
(13, '2024_07_20_074554_create_configuracions_table', 1),
(14, '2024_07_21_190723_create_historials_table', 1),
(15, '2024_07_21_235918_create_pagos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\Paciente', 1),
(1, 'App\\Models\\User', 1),
(4, 'App\\Models\\Paciente', 2),
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\Paciente', 3),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\Paciente', 4),
(3, 'App\\Models\\User', 4),
(4, 'App\\Models\\Paciente', 5),
(2, 'App\\Models\\User', 5),
(4, 'App\\Models\\Paciente', 6),
(4, 'App\\Models\\User', 6),
(4, 'App\\Models\\Paciente', 7),
(5, 'App\\Models\\User', 7),
(4, 'App\\Models\\Paciente', 8),
(5, 'App\\Models\\User', 8),
(4, 'App\\Models\\Paciente', 9),
(4, 'App\\Models\\Paciente', 10),
(4, 'App\\Models\\Paciente', 11),
(4, 'App\\Models\\Paciente', 12),
(4, 'App\\Models\\Paciente', 13),
(4, 'App\\Models\\Paciente', 14),
(4, 'App\\Models\\Paciente', 15),
(4, 'App\\Models\\Paciente', 16),
(4, 'App\\Models\\Paciente', 17),
(4, 'App\\Models\\Paciente', 18),
(4, 'App\\Models\\Paciente', 19),
(4, 'App\\Models\\Paciente', 20),
(4, 'App\\Models\\Paciente', 21),
(4, 'App\\Models\\Paciente', 22),
(4, 'App\\Models\\Paciente', 23),
(4, 'App\\Models\\Paciente', 24),
(4, 'App\\Models\\Paciente', 25),
(4, 'App\\Models\\Paciente', 26),
(4, 'App\\Models\\Paciente', 27),
(4, 'App\\Models\\Paciente', 28),
(4, 'App\\Models\\Paciente', 29),
(4, 'App\\Models\\Paciente', 30),
(4, 'App\\Models\\Paciente', 31),
(4, 'App\\Models\\Paciente', 32),
(4, 'App\\Models\\Paciente', 33),
(4, 'App\\Models\\Paciente', 34),
(4, 'App\\Models\\Paciente', 35),
(4, 'App\\Models\\Paciente', 36),
(4, 'App\\Models\\Paciente', 37),
(4, 'App\\Models\\Paciente', 38),
(4, 'App\\Models\\Paciente', 39),
(4, 'App\\Models\\Paciente', 40),
(4, 'App\\Models\\Paciente', 41),
(4, 'App\\Models\\Paciente', 42),
(4, 'App\\Models\\Paciente', 43),
(4, 'App\\Models\\Paciente', 44),
(4, 'App\\Models\\Paciente', 45),
(4, 'App\\Models\\Paciente', 46),
(4, 'App\\Models\\Paciente', 47),
(4, 'App\\Models\\Paciente', 48),
(4, 'App\\Models\\Paciente', 49),
(4, 'App\\Models\\Paciente', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` bigint UNSIGNED NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `run` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_civil` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombres`, `apellidos`, `run`, `fecha_nacimiento`, `genero`, `fono`, `email`, `direccion`, `estado_civil`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 'Ross Ortiz', 'Weimann', '5508195114', '2013-08-25', 'F', '781.518.4728', 'denesik.ryleigh@example.org', '970 Nicole Trail Suite 249\nTurnerport, UT 69568-7960', 'Casado/a', 'Nesciunt ea ut iure. Maiores amet quaerat et optio accusamus ut.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(2, 'Terrence Zieme DDS', 'Osinski', '8780010325', '1976-02-11', 'M', '+1 (201) 695-9858', 'damore.karianne@example.org', '3234 Santiago Mews Apt. 126\nPort Cayla, CA 51157-5520', 'Soltero/a', 'Inventore ut odit earum aut sed et odio. Quis aliquam harum et exercitationem aliquid.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(3, 'Carole Gaylord', 'Abbott', '8534723846', '2021-08-12', 'F', '+18655493370', 'jromaguera@example.net', '1207 Volkman Fords\nLake Viola, CO 94858', 'Viudo/a', 'Consequatur delectus veritatis et incidunt voluptatibus recusandae aut. Ab eius hic minima hic.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(4, 'Prof. Lexus Prohaska', 'Nienow', '5908559847', '2003-05-16', 'F', '(256) 935-7980', 'schuyler.roob@example.net', '9208 Aurelio Fork\nNew Maynard, VT 63707', 'Casado/a', 'Ipsam non dolore reprehenderit. Non harum aperiam qui autem fuga. Et ea culpa repellat quia.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(5, 'Brielle Hirthe', 'Sawayn', '9496358500', '1973-11-04', 'M', '785-414-3156', 'carli.crist@example.org', '172 Fisher Manor Apt. 984\nMariamshire, KY 85232', 'Soltero/a', 'Eos consequatur ullam harum. Quisquam animi nemo perferendis corrupti.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(6, 'Felicia Stanton', 'Carroll', '1744335535', '2015-05-20', 'M', '463.360.1230', 'danial36@example.com', '76281 Harris Mill\nEast Clairemouth, NC 47793', 'Viudo/a', 'Cumque accusamus quia laborum. Rerum quis eveniet tempora qui ut. Cum expedita totam fuga est.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(7, 'Mrs. Kristina Hickle', 'Schoen', '6277681840', '1972-06-23', 'M', '+1-971-747-7691', 'lily.abshire@example.net', '11691 Greenfelder Plaza Suite 797\nAlanisview, SD 78564-3606', 'Soltero/a', 'Ex minima quis autem est. Et molestiae ducimus sint eos. Doloremque fugit at dolore sed.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(8, 'Mr. Jarvis Moore', 'Raynor', '3859438497', '2005-03-04', 'F', '+1-727-424-1979', 'amely79@example.com', '362 Champlin Forest\nJazminchester, ID 15288-1765', 'Casado/a', 'Sit quia eligendi quia dolor. Quos repellendus vero ut corrupti adipisci et ea.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(9, 'Reagan Harvey', 'Mraz', '8015687247', '1986-01-22', 'F', '360-825-3706', 'zbogan@example.com', '23101 Reuben Park\nAdamshaven, PA 29327', 'Casado/a', 'Ut est saepe fugit. Ipsum quo nemo dolorem. Quis incidunt quia quam quas. Quam qui modi est quod.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(10, 'Grace Rempel', 'Marks', '9615946528', '1987-12-09', 'M', '+1.603.882.6480', 'jace.boehm@example.org', '406 Cordell Mount Apt. 026\nBernhardfort, GA 29713', 'Viudo/a', 'Et consequatur in facere quo omnis qui. Doloremque illum quasi mollitia.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(11, 'Deven Cole', 'Watsica', '7154206070', '2017-01-14', 'F', '1-401-970-3363', 'xgoldner@example.org', '7355 Eldon Causeway Suite 920\nPort Agnes, MI 92756-7379', 'Viudo/a', 'Ut quia eos sunt dolores non dolore maiores sed. Hic eum dolor eaque.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(12, 'Colten Hackett', 'D\'Amore', '7222628335', '1973-08-02', 'F', '+1.534.243.0394', 'bgerhold@example.org', '430 Cicero Radial\nLake Jaqueline, MD 83558-2792', 'Soltero/a', 'Laboriosam assumenda odio voluptatem. Tempora at nostrum aut fuga laborum et aut.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(13, 'Vernice Powlowski', 'Kilback', '8232598283', '1979-05-10', 'F', '469.348.5673', 'bergstrom.carolyn@example.net', '67713 Murphy Flats\nNew Eugeneberg, ID 93224-1865', 'Casado/a', 'Sit cum consectetur ut. Totam fugiat aliquid nemo.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(14, 'Rosie Streich DVM', 'Tillman', '7192705122', '1995-03-30', 'F', '+1-856-212-1801', 'lavern.walker@example.org', '39435 Keeling Garden\nJacobiview, NC 89772-7813', 'Soltero/a', 'Nesciunt officiis unde expedita vero. Blanditiis sed molestias illum et.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(15, 'Adriel Schuppe', 'Wiegand', '3198104269', '1977-05-21', 'M', '1-580-215-7168', 'nina93@example.com', '36699 Harvey Ford\nEast Mathilde, CA 78064-6415', 'Soltero/a', 'Facilis nam sit omnis ex molestiae magnam consequatur modi. Aut magnam mollitia id eos eaque.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(16, 'Mr. Cristian King PhD', 'Rohan', '8798384519', '2001-02-24', 'F', '+1 (629) 800-7876', 'hailee.hansen@example.com', '157 Anderson Causeway Apt. 142\nPort Emilyton, TN 92289-3443', 'Casado/a', 'Praesentium ab quaerat aut totam qui praesentium maiores aspernatur. Odit cum ut modi eaque.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(17, 'Layne Hegmann', 'Streich', '8939305056', '1971-09-23', 'F', '530.368.5942', 'cruickshank.clare@example.com', '2472 Gutkowski Loop Apt. 114\nNew Allen, CA 87084-5235', 'Viudo/a', 'Porro vitae facere et officia non suscipit reiciendis. Ut dolores quo tenetur.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(18, 'Mariane Rogahn IV', 'Schuster', '1493926665', '1978-12-28', 'F', '(614) 918-1117', 'marisol.daniel@example.org', '3349 Rickie Fords\nNorth Steve, MA 66910-7644', 'Viudo/a', 'Ut autem esse odio et vitae nesciunt. Et qui consequuntur fugit facere provident veniam.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(19, 'Prof. Merritt Runolfsson', 'Monahan', '6173095244', '2000-03-13', 'F', '+1-936-459-5947', 'moshe.volkman@example.com', '91467 Johnson Station Suite 753\nEichmannside, TX 18689', 'Soltero/a', 'Eaque molestias delectus qui iste quae id. Accusamus voluptatibus et non dolorem.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(20, 'Jonas Lebsack', 'Spinka', '8506724658', '1976-05-19', 'F', '540.491.0416', 'umedhurst@example.net', '36802 Mueller Tunnel Apt. 161\nNorth Dollyshire, ND 74573-7742', 'Viudo/a', 'Nisi eius alias ut ab repellendus eum. Ut quis nisi repellendus in. Animi sint qui vero laudantium.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(21, 'Ruben Nicolas', 'Larson', '6317952360', '2024-01-31', 'F', '(580) 446-3709', 'mhartmann@example.com', '843 Paucek Union Apt. 777\nBartonbury, DC 28367-6911', 'Soltero/a', 'Ut delectus et consequatur veniam ut. Sit quod deserunt dolorem. Aut consequuntur officiis non.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(22, 'Brandon Boyer', 'Hauck', '8074583105', '1986-09-22', 'M', '+1-740-715-8071', 'walter.kyla@example.org', '222 Hane Fall Suite 728\nNorth Casimir, GA 77892', 'Viudo/a', 'Quis veniam eligendi explicabo consequatur et. Eum cum quasi delectus aut debitis qui id.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(23, 'Dr. Icie Pagac', 'Lemke', '0109544300', '2000-04-26', 'F', '(270) 633-1783', 'enos44@example.org', '911 Guiseppe Mills Apt. 275\nEast Kayaport, NY 13290', 'Soltero/a', 'Corrupti excepturi et error. Modi omnis in ad autem autem.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(24, 'Mr. Rollin Halvorson', 'Johns', '1135113484', '1975-08-22', 'M', '(307) 206-3426', 'elyssa64@example.com', '70231 Hettinger Burgs Apt. 615\nWebershire, AL 98971', 'Soltero/a', 'Aut nihil ipsa eum. Id omnis nisi aut sequi. Omnis error qui dolorem temporibus enim.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(25, 'Miss Carmela Hayes', 'McGlynn', '3806376106', '2006-06-15', 'F', '1-601-284-7638', 'junius.metz@example.net', '132 Herminio Rapid\nO\'Connellhaven, GA 90560', 'Casado/a', 'Adipisci error illo nihil earum minus fugit. Quasi fugit id ducimus.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(26, 'Prof. Riley Hane III', 'Langworth', '9519682092', '1996-01-13', 'F', '1-843-242-0753', 'jefferey.okuneva@example.org', '264 Alexandra Square Suite 906\nLake Fletcher, KS 08640', 'Casado/a', 'Ipsa ipsa quod ducimus ipsam maiores iusto dignissimos reprehenderit. Nesciunt quas aperiam animi.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(27, 'Krystal Strosin', 'O\'Hara', '7333014338', '2017-07-14', 'M', '1-303-576-2362', 'shyann03@example.org', '8524 Auer Heights Suite 133\nLake Tracy, HI 42386', 'Casado/a', 'Possimus quam quod qui dolor. Ut beatae aut vitae autem. Impedit perspiciatis ullam iste at.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(28, 'Mr. Juwan Roob Jr.', 'Macejkovic', '0838509229', '2006-02-01', 'M', '+1 (940) 975-7089', 'braulio.emmerich@example.net', '150 Steuber Mills Suite 466\nNorth Jerelland, WA 00377', 'Viudo/a', 'Dolor ut tenetur illum et et sequi et eveniet. Et repellendus placeat repellendus laborum quo ut.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(29, 'Brielle Wiegand', 'Auer', '5335771974', '1985-11-01', 'F', '(956) 635-6111', 'sage69@example.org', '1581 Eino Harbors Apt. 170\nLake Huntermouth, NH 37225', 'Viudo/a', 'Maxime sunt et qui et amet distinctio. Consequatur accusamus et eaque nostrum aut sit aut.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(30, 'Evan Fahey', 'Schneider', '5839151643', '1972-02-27', 'F', '702-922-7909', 'paucek.vivienne@example.net', '9453 Vada Road\nAmirhaven, RI 95307', 'Soltero/a', 'Suscipit aut atque sit cum dolorem dicta. At dolor atque similique possimus neque id.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(31, 'Dr. Gaetano Quigley', 'Yundt', '4597840081', '1986-08-08', 'F', '+1-402-874-3473', 'augustine51@example.com', '981 Harvey Burgs\nSydneeborough, OR 24954', 'Soltero/a', 'Laudantium quo laboriosam aut porro. Inventore iusto eos itaque soluta quidem.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(32, 'Ella Gleichner', 'Champlin', '4022529026', '2010-04-29', 'M', '347-481-4042', 'jacobi.mallory@example.com', '8643 Gladys Route Suite 457\nRosenbaumchester, DC 79452-4557', 'Casado/a', 'Tempora et laudantium ullam necessitatibus. Qui dicta sit dolor. Unde numquam enim aut excepturi.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(33, 'Fermin Emard', 'Von', '2027121634', '2022-02-23', 'M', '636-566-1987', 'ccrona@example.com', '44037 Junior Ramp Apt. 577\nDaltonport, MS 21416-1096', 'Soltero/a', 'Numquam et rerum aut. Exercitationem dignissimos laborum consequatur. Corporis iure sed autem.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(34, 'Gladyce Konopelski', 'Gerlach', '0173434645', '1970-08-08', 'M', '+1-304-355-2645', 'jflatley@example.net', '881 Lang Throughway\nAltenwerthberg, NM 80612', 'Soltero/a', 'Sed qui rerum nesciunt est a ipsa praesentium. Totam iusto aut quisquam dignissimos sit non quas.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(35, 'Mr. Consuelo Emmerich PhD', 'Will', '7086002482', '1990-03-28', 'F', '+1-228-615-9561', 'aaliyah.stokes@example.org', '428 Eliseo Circle Apt. 812\nNew Janethaven, WA 53678-6901', 'Soltero/a', 'Optio dolorem praesentium esse soluta. Non et minima aliquid occaecati aut perspiciatis sint.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(36, 'Braulio Adams', 'Erdman', '9610487542', '1988-09-29', 'M', '+1-513-317-9232', 'dernser@example.net', '637 Ferry Plains\nPort Carolanne, DC 09389', 'Viudo/a', 'Totam est dolore numquam fugiat et sunt sed. Commodi vero quia sed aperiam. Adipisci ut cum et.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(37, 'Ines Kessler', 'Wilkinson', '3456626713', '2000-03-21', 'F', '1-754-330-0784', 'alex08@example.org', '5005 Yost Groves Suite 681\nMelvinfurt, AL 56790', 'Casado/a', 'Vel eos harum corporis. Qui rerum illum est quo. Qui totam adipisci et voluptas cum ut.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(38, 'Mia D\'Amore III', 'Lubowitz', '2053104437', '2022-12-06', 'M', '917-704-4494', 'santos85@example.net', '33181 Heathcote Spur Suite 323\nNew Angelina, NJ 74008-9228', 'Soltero/a', 'Aut aut voluptatem aliquid facilis voluptatibus et ullam. Delectus corporis quia rem tenetur ex.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(39, 'Pierce Gleason IV', 'Purdy', '3288403589', '1972-10-13', 'F', '(661) 443-4588', 'lmante@example.org', '4260 Oberbrunner Meadow\nEast Santino, MI 03557-4705', 'Soltero/a', 'Consectetur culpa illo libero. Similique quae aut est quam. Aliquam odit dolorem omnis dolorum.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(40, 'Mr. Conner Ziemann II', 'Dickens', '2918179922', '2000-10-15', 'F', '(864) 244-3320', 'dweber@example.net', '1770 Reilly Shores Apt. 822\nWest Shaina, NY 85208', 'Viudo/a', 'Et sed voluptas ea natus totam odit atque. Neque deleniti rerum consequatur minima voluptas.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(41, 'Mr. Clovis DuBuque', 'Jakubowski', '7282151598', '2020-07-05', 'F', '+19525332632', 'qjacobi@example.com', '6202 Turner Landing\nWest Aracely, VA 48832-2566', 'Soltero/a', 'Sint maxime sequi ut perspiciatis. Aut quia labore dolorem dolores sit.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(42, 'Wilbert Hills', 'Kilback', '6282317701', '1977-03-19', 'F', '(716) 787-9093', 'uheidenreich@example.net', '1449 Kozey Springs\nDareburgh, TX 93116', 'Soltero/a', 'Harum velit est rem. Eum voluptatum ut quam dolore commodi a. In rerum sed repellendus.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(43, 'Terrence Keebler', 'Ernser', '6363764820', '1975-07-30', 'F', '+1.539.643.1340', 'lparisian@example.net', '944 Rogelio Mission\nNew Tyresebury, NH 91439-9516', 'Soltero/a', 'Quidem nostrum ut voluptas rem. Id perspiciatis est voluptatem ea. Rem aut dolorem autem inventore.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(44, 'Landen Gleichner II', 'Schoen', '6116449159', '2009-09-30', 'M', '+1-520-739-2558', 'walker.mariela@example.net', '74819 Yundt Extension Suite 404\nPort Marlin, MO 48702-7973', 'Casado/a', 'Sit ipsam et non quae recusandae. Quam voluptas ex sint consectetur assumenda ullam.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(45, 'Joany McGlynn', 'Keebler', '5259394749', '1989-11-01', 'F', '(430) 505-2713', 'adelbert.moore@example.org', '56832 Rowan Mountain\nNew Nedraville, MD 54034-4024', 'Casado/a', 'Aspernatur est optio officia consectetur. Dolores occaecati voluptatibus nobis culpa nostrum.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(46, 'Adolphus Williamson', 'Towne', '6180039597', '2019-07-08', 'M', '+1 (341) 434-3120', 'garnet.hills@example.com', '671 Krista Prairie Apt. 617\nShanahanbury, LA 07549', 'Viudo/a', 'Recusandae est in atque sint. Placeat sunt esse occaecati vel et. Nemo dolor quae iure.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(47, 'Edythe Kuhn', 'Gusikowski', '5072616991', '1988-04-18', 'M', '(862) 699-0935', 'spinka.augusta@example.org', '9764 Terry Dale Apt. 188\nVivianshire, NY 40039-6208', 'Viudo/a', 'Laboriosam qui est est mollitia quis quae voluptas sit. Dicta veritatis illo nisi officia est ea.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(48, 'Gerda Smith', 'Thompson', '9686616400', '1997-11-22', 'F', '+19039915437', 'brenda57@example.net', '160 Conroy Key Suite 089\nNew Beth, PA 25411', 'Casado/a', 'Quia voluptatem ea quaerat fugit. Repudiandae eum omnis aut illum.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(49, 'Ada Kilback IV', 'Cronin', '5979890520', '2012-08-13', 'F', '865.488.9483', 'huels.vito@example.com', '7049 Assunta Squares\nWest Cortezfurt, OR 17218', 'Viudo/a', 'Sit blanditiis et ad natus. Optio ut labore doloribus quam.', '2024-07-25 19:35:37', '2024-07-25 19:35:37'),
(50, 'Erling Kovacek DVM', 'Wunsch', '0421581120', '1983-08-27', 'F', '413.844.6697', 'gerardo96@example.net', '864 Labadie Islands Suite 038\nKunzemouth, WI 15771-1216', 'Viudo/a', 'Ipsam hic consectetur atque ut magnam assumenda doloribus. Aperiam id hic debitis rerum.', '2024-07-25 19:35:37', '2024-07-25 19:35:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` bigint UNSIGNED NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha_pago` date NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paciente_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `monto`, `fecha_pago`, `descripcion`, `paciente_id`, `doctor_id`, `created_at`, `updated_at`) VALUES
(1, 1000.00, '2024-07-25', 'Cita Regular', 6, 1, '2024-07-25 21:17:49', '2024-07-25 21:17:49');

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
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.index', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(2, 'admin.configuracion.index', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(3, 'admin.configuracion.create', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(4, 'admin.configuracion.store', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(5, 'admin.configuracion.show', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(6, 'admin.configuracion.edit', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(7, 'admin.configuracion.update', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(8, 'admin.configuracion.confirmDelete', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(9, 'admin.configuracion.delete', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(10, 'admin.usuario.index', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(11, 'admin.usuario.create', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(12, 'admin.usuario.store', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(13, 'admin.usuario.show', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(14, 'admin.usuario.edit', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(15, 'admin.usuario.update', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(16, 'admin.secretaria.index', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(17, 'admin.secretaria.create', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(18, 'admin.secretaria.store', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(19, 'admin.secretaria.show', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(20, 'admin.secretaria.edit', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(21, 'admin.secretaria.update', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(22, 'admin.secretaria.confirmDelete', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(23, 'admin.secretaria.delete', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(24, 'admin.paciente.index', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(25, 'admin.paciente.create', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(26, 'admin.paciente.store', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(27, 'admin.paciente.show', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(28, 'admin.paciente.edit', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(29, 'admin.paciente.update', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(30, 'admin.consultorio.index', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(31, 'admin.consultorio.create', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(32, 'admin.consultorio.store', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(33, 'admin.consultorio.show', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(34, 'admin.consultorio.edit', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(35, 'admin.consultorio.update', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(36, 'admin.consultorio.confirmDelete', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(37, 'admin.consultorio.delete', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(38, 'admin.doctor.index', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(39, 'admin.doctor.create', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(40, 'admin.doctor.store', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(41, 'admin.doctor.show', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(42, 'admin.doctor.edit', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(43, 'admin.doctor.update', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(44, 'admin.doctor.confirmDelete', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(45, 'admin.doctor.delete', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(46, 'admin.doctor.reporte', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(47, 'admin.doctor.pdf', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(48, 'admin.horario.index', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(49, 'admin.horario.create', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(50, 'admin.horario.store', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(51, 'admin.horario.show', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(52, 'admin.horario.confirmDelete', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(53, 'admin.horario.delete', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(54, 'admin.horario.cargarConsultorios', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(55, 'admin.reserva.reporte', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(56, 'admin.reserva.pdf', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(57, 'admin.reserva.pdf_fecha', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(58, 'cargarDatosConsultorios', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(59, 'cargarReservaDoctores', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(60, 'verReservas', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(61, 'admin.evento.create', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(62, 'admin.evento.delete', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(63, 'admin.historial.index', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(64, 'admin.historial.create', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(65, 'admin.historial.store', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(66, 'admin.historial.show', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(67, 'admin.historial.edit', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(68, 'admin.historial.update', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(69, 'admin.historial.confirmDelete', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(70, 'admin.historial.delete', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(71, 'admin.historial.pdf', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(72, 'admin.historial.buscarPaciente', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(73, 'admin.historial.imprimirHistorial', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(74, 'admin.pago.index', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(75, 'admin.pago.create', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(76, 'admin.pago.store', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(77, 'admin.pago.show', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(78, 'admin.pago.edit', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(79, 'admin.pago.update', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(80, 'admin.pago.confirmDelete', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(81, 'admin.pago.delete', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(82, 'admin.pago.pdf', 'web', '2024-07-25 19:35:35', '2024-07-25 19:35:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(2, 'secretaria', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(3, 'doctor', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(4, 'paciente', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34'),
(5, 'usuario', 'web', '2024-07-25 19:35:34', '2024-07-25 19:35:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(72, 1),
(73, 1),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(60, 2),
(62, 2),
(74, 2),
(75, 2),
(76, 2),
(77, 2),
(78, 2),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(63, 3),
(64, 3),
(65, 3),
(66, 3),
(67, 3),
(68, 3),
(69, 3),
(70, 3),
(71, 3),
(72, 3),
(73, 3),
(58, 4),
(59, 4),
(61, 4),
(58, 5),
(59, 5),
(61, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretarias`
--

CREATE TABLE `secretarias` (
  `id` bigint UNSIGNED NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `run` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `secretarias`
--

INSERT INTO `secretarias` (`id`, `nombres`, `apellidos`, `run`, `fono`, `direccion`, `fecha_nacimiento`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Jimena', 'Reyes', '12321421', '77777777', 'Zona Miraflores', '1977-01-18', 5, '2024-07-25 19:35:36', '2024-07-25 19:40:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@admin.com', NULL, '$2y$10$9Ap3KLNCIi7XSQFkNS/5CuiPmZMZcDh/eYTnv6wtY8uw.nXVOxmcu', NULL, '2024-07-25 19:35:35', '2024-07-25 19:35:35'),
(2, 'Carlos', 'doctor@admin.com', NULL, '$2y$10$ibmBxM1mRcrBAZzgG.Z0eeXhOmMLBBjq/19BJ/ElWuDlIo45DTC7S', NULL, '2024-07-25 19:35:36', '2024-07-25 19:43:00'),
(3, 'Maria', 'doctor2@admin.com', NULL, '$2y$10$h5plaT3h7qCBbs5x72BuY.wnfJuWAIMECQhnVecXcfwCTB8H/J0E6', NULL, '2024-07-25 19:35:36', '2024-07-25 19:45:16'),
(4, 'Pedro', 'doctor3@admin.com', NULL, '$2y$10$Qm.UKsJlt/IYab9o8IaWkOT2D7YmWjKV8qNnb5SsjHDgCWlPmBqHG', NULL, '2024-07-25 19:35:36', '2024-07-25 19:45:50'),
(5, 'Jimena', 'secretaria@admin.com', NULL, '$2y$10$uemKnyPdV9W/Vt1NOZrPKedv8VyT4DJpfIMzQ4s6Vg3QDsFaIVKG.', NULL, '2024-07-25 19:35:36', '2024-07-25 19:40:32'),
(6, 'Paciente', 'paciente@admin.com', NULL, '$2y$10$MFoNlieM03IuHUtKPpC1/uWpO1ZSQoEd.h87ShybNfPsWnCAfkCra', NULL, '2024-07-25 19:35:36', '2024-07-25 19:35:36'),
(7, 'Usuario', 'usuario@admin.com', NULL, '$2y$10$L1bxR337x7TfIo5CinryiuMZ0MuNuKNScK7TObzGBqCYRYjSvvfaS', NULL, '2024-07-25 19:35:36', '2024-07-25 19:35:36'),
(8, 'Enso', 'enso@gmail.com', NULL, '$2y$10$Pue.CskjnNya5NoAE.1NpuD0roy6AW32OBmBF./dfTRpcWny3ZgVa', NULL, '2024-07-25 21:19:34', '2024-07-25 21:19:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_run_unique` (`run`),
  ADD KEY `doctors_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`),
  ADD KEY `events_doctor_id_foreign` (`doctor_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `historials`
--
ALTER TABLE `historials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historials_paciente_id_foreign` (`paciente_id`),
  ADD KEY `historials_doctor_id_foreign` (`doctor_id`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horarios_doctor_id_foreign` (`doctor_id`),
  ADD KEY `horarios_consultorio_id_foreign` (`consultorio_id`);

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
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pacientes_run_unique` (`run`),
  ADD UNIQUE KEY `pacientes_email_unique` (`email`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pagos_paciente_id_foreign` (`paciente_id`),
  ADD KEY `pagos_doctor_id_foreign` (`doctor_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indices de la tabla `secretarias`
--
ALTER TABLE `secretarias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `secretarias_run_unique` (`run`),
  ADD KEY `secretarias_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `consultorios`
--
ALTER TABLE `consultorios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historials`
--
ALTER TABLE `historials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `secretarias`
--
ALTER TABLE `secretarias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `historials`
--
ALTER TABLE `historials`
  ADD CONSTRAINT `historials_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `historials_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_consultorio_id_foreign` FOREIGN KEY (`consultorio_id`) REFERENCES `consultorios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `horarios_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

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
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pagos_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `secretarias`
--
ALTER TABLE `secretarias`
  ADD CONSTRAINT `secretarias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
