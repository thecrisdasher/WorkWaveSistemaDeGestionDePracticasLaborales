-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2025 a las 23:58:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `razon_social` varchar(255) NOT NULL,
  `tipo_empresa` text NOT NULL,
  `nit` varchar(200) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `id_ubicacion` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `nombre`, `razon_social`, `tipo_empresa`, `nit`, `correo`, `id_ubicacion`, `id_usuario`, `created_at`, `updated_at`) VALUES
(1, 'EcoLiving', 'Software', 'Tecnología', '3245-4QTAS', 'EMPRESAREAL@GMAIL.COM', 1, 1, '2025-04-08 20:51:13', '2025-04-08 20:51:13'),
(2, 'Tech Solutions', 'Software', 'Salud', '3245-4QTAS', 'EMPRESAREAL@GMAIL.COM', 1, 1, '2025-04-08 20:51:32', '2025-04-08 20:51:32'),
(3, 'ABEL SOFT', 'Desarrollo web', 'Educación', '3245-4QTAS', 'EMPRESAREAL@GMAIL.COM', 1, 1, '2025-04-08 20:51:50', '2025-04-08 20:51:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_solicitudes`
--

CREATE TABLE `estados_solicitudes` (
  `id_estadosolicitud` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_solicitudes`
--

INSERT INTO `estados_solicitudes` (`id_estadosolicitud`, `estado`) VALUES
(1, 'Pendiente'),
(2, 'Aprobada'),
(3, 'Rechazada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `hojas_de_vida`
--

CREATE TABLE `hojas_de_vida` (
  `id_hojadevida` bigint(20) UNSIGNED NOT NULL,
  `archivo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `hojas_de_vida`
--

INSERT INTO `hojas_de_vida` (`id_hojadevida`, `archivo`) VALUES
(1, 0),
(2, 0),
(3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2024_03_29_193044_create_databasae_workwave', 1),
(6, '2024_04_07_233206_auth_users', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--

CREATE TABLE `ofertas` (
  `id_oferta` bigint(20) UNSIGNED NOT NULL,
  `nombre_oferta` varchar(255) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `fecha_limite` date DEFAULT NULL,
  `id_tipo_cargo` bigint(20) UNSIGNED NOT NULL,
  `id_tipo_contrato` bigint(20) UNSIGNED NOT NULL,
  `id_empresa` bigint(20) UNSIGNED NOT NULL,
  `id_ubicacion` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ofertas`
--

INSERT INTO `ofertas` (`id_oferta`, `nombre_oferta`, `descripcion`, `salario`, `fecha_limite`, `id_tipo_cargo`, `id_tipo_contrato`, `id_empresa`, `id_ubicacion`, `created_at`, `updated_at`) VALUES
(1, 'Desarrollador Web', 'VRIZE is a Global Digital & Data Engineering company, committed to delivering end-to-end Digital solutions and services to its customers worldwide. We offer business-friendly solutions across industry verticals that include Banking, Financial Services, Healthcare & Insurance, Manufacturing, and Retail. The company has strategic business alliances with industry leaders such as Adobe, IBM Sterling Commerce, IBM, Microsoft, Docker, Sisense, Competera, Snowflake, and Tableau.VRIZE is headqua\"', 2000000.00, '2025-06-01', 1, 1, 1, 1, '2025-03-30 03:55:13', '2025-04-07 23:01:53'),
(2, 'Analista de Datos', 'We are looking for a skilled Front-End Developer with expertise in React.js and Next.js to join our team. The ideal candidate will be responsible for developing and maintaining high-quality, scalable, and responsive web applications while working closely ', 4500000.00, '2025-07-15', 2, 2, 2, 2, '2025-03-30 03:55:13', '2025-03-30 03:55:13'),
(3, 'Diseñador UX/UI', 'Diseño de interfaces para aplicaciones web y móviles', 4000000.00, '2025-08-10', 3, 1, 3, 3, '2025-03-30 03:55:13', '2025-03-30 03:55:13'),
(4, 'Soporte sistemas', 'lore', 400000.00, NULL, 1, 1, 1, 1, '2025-03-30 09:02:27', '2025-04-05 04:08:04'),
(6, 'holaaa', 'rfef', 3453.00, NULL, 1, 1, 1, 1, '2025-03-30 09:10:19', '2025-03-30 21:03:32'),
(7, 'Contador js', 'regey rjhbvyu5kjtuim', 2.00, NULL, 1, 1, 1, 1, '2025-03-30 21:02:47', '2025-04-08 00:41:59'),
(8, 'Desarrollador Backend', 'Desarrollo de aplicaciones backend utilizando PHP y MySQL', 2500.00, '2025-06-30', 1, 1, 1, 1, '2025-04-04 23:04:38', '2025-04-04 23:04:38'),
(10, 'Administrador de redes', 'drthdrth', 20000.00, NULL, 1, 1, 1, 1, '2025-04-05 04:23:47', '2025-04-05 04:23:47'),
(13, 'Ingeniero electrico js', 'ulrfhriewghk', 75100.00, NULL, 1, 1, 1, 1, '2025-04-08 00:42:24', '2025-04-08 00:42:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulantes`
--

CREATE TABLE `postulantes` (
  `id_postulante` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `postulantes`
--

INSERT INTO `postulantes` (`id_postulante`, `nombre`, `apellido`, `fecha_nacimiento`, `id`) VALUES
(1, 'Juan', 'Pérez', '1995-04-23', 1),
(2, 'María', 'López', '1993-08-15', 2),
(3, 'Carlos', 'Gómez', '1998-02-10', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` bigint(11) UNSIGNED NOT NULL,
  `tipo_rol_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `tipo_rol_usuario`) VALUES
(1, 'admin'),
(2, 'estudiante '),
(3, 'empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id_solicitud` bigint(20) UNSIGNED NOT NULL,
  `id_hojadevida` bigint(20) UNSIGNED NOT NULL,
  `id_postulante` bigint(20) UNSIGNED NOT NULL,
  `id_estadosolicitud` bigint(20) UNSIGNED NOT NULL,
  `id_oferta` bigint(20) UNSIGNED NOT NULL,
  `fecha_solicitud` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id_solicitud`, `id_hojadevida`, `id_postulante`, `id_estadosolicitud`, `id_oferta`, `fecha_solicitud`) VALUES
(1, 2, 1, 2, 7, '2025-03-30 23:48:11'),
(2, 2, 1, 2, 1, '2025-03-31 07:45:04'),
(3, 2, 1, 2, 2, '2025-03-31 07:54:56'),
(4, 2, 1, 2, 4, '2025-04-02 07:53:45'),
(6, 2, 1, 2, 6, '2025-04-04 09:36:05'),
(7, 2, 1, 2, 3, '2025-04-05 05:30:46'),
(8, 2, 3, 2, 2, '2025-04-06 19:09:09'),
(9, 2, 3, 2, 10, '2025-04-06 19:10:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cargos`
--

CREATE TABLE `tipo_cargos` (
  `id_cargo` bigint(20) UNSIGNED NOT NULL,
  `cargo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_cargos`
--

INSERT INTO `tipo_cargos` (`id_cargo`, `cargo`) VALUES
(1, 'practicante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contratos`
--

CREATE TABLE `tipo_contratos` (
  `id_tipo_contrato` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_contratos`
--

INSERT INTO `tipo_contratos` (`id_tipo_contrato`, `tipo`) VALUES
(1, 'practicas'),
(2, 'Por obra o labor'),
(3, 'Prácticas'),
(4, 'Contrato indefinido'),
(5, 'Prácticas'),
(6, 'Contrato temporal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--

CREATE TABLE `ubicaciones` (
  `id_ubicacion` bigint(20) UNSIGNED NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ubicaciones`
--

INSERT INTO `ubicaciones` (`id_ubicacion`, `direccion`, `ciudad`) VALUES
(1, 'Calle 123 #45-67', 'Bogotá, Distrito Capital, Colombia'),
(2, 'Carrera 50 #10-20', 'Medellín, Antioquia, Colombia'),
(3, 'Avenida 6 #34-56', 'Cali, Valle del Cauca, Colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_rol` bigint(11) UNSIGNED DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `carrera` varchar(200) NOT NULL,
  `facultad` varchar(200) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postal` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_rol`, `username`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `carrera`, `facultad`, `address`, `city`, `country`, `postal`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Administrador', 'Admin', 'admin@argon.com', NULL, '$2y$10$oFE/.5TX6NqoXSRj6L0yRuA27vV.w9TyXlgzAqumo/SullD93VgXG', 'ingenieria en sistemas', 'ingenieria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-05 19:05:17'),
(2, 3, 'jefe_rrhh', 'Jefe', 'RRHH', 'jefe.rrhh@empresa.com', NULL, 'hashed_password_2', '', '', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-30 03:41:00', '2025-03-30 03:41:00'),
(3, 2, 'mike', 'mateo', 'sold', 'camilosol@gmail.com', NULL, '$2y$10$KrUNo/RpGSQ7dppmrMFmL.ZwGkWTMj6S6Ar.832K3KQNzsXNVciXm', 'Ingenieria electrica', 'Ingenieria', NULL, 'Cali', NULL, '1', 'NE', NULL, '2025-03-30 03:41:00', '2025-04-09 20:25:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `empresas_id_ubicacion_foreign` (`id_ubicacion`),
  ADD KEY `empresas_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `estados_solicitudes`
--
ALTER TABLE `estados_solicitudes`
  ADD PRIMARY KEY (`id_estadosolicitud`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `hojas_de_vida`
--
ALTER TABLE `hojas_de_vida`
  ADD PRIMARY KEY (`id_hojadevida`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD PRIMARY KEY (`id_oferta`),
  ADD KEY `ofertas_id_tipo_cargo_foreign` (`id_tipo_cargo`),
  ADD KEY `ofertas_id_tipo_contrato_foreign` (`id_tipo_contrato`),
  ADD KEY `ofertas_id_empresa_foreign` (`id_empresa`),
  ADD KEY `ofertas_id_ubicacion_foreign` (`id_ubicacion`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `postulantes`
--
ALTER TABLE `postulantes`
  ADD PRIMARY KEY (`id_postulante`),
  ADD KEY `postulantes_id_foreign` (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `solicitudes_id_hojadevida_foreign` (`id_hojadevida`),
  ADD KEY `solicitudes_id_postulante_foreign` (`id_postulante`),
  ADD KEY `solicitudes_id_estadosolicitud_foreign` (`id_estadosolicitud`),
  ADD KEY `solicitudes_id_oferta_foreign` (`id_oferta`);

--
-- Indices de la tabla `tipo_cargos`
--
ALTER TABLE `tipo_cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `tipo_contratos`
--
ALTER TABLE `tipo_contratos`
  ADD PRIMARY KEY (`id_tipo_contrato`);

--
-- Indices de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `roles_id_rol_users` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `estados_solicitudes`
--
ALTER TABLE `estados_solicitudes`
  MODIFY `id_estadosolicitud` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hojas_de_vida`
--
ALTER TABLE `hojas_de_vida`
  MODIFY `id_hojadevida` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `ofertas`
--
ALTER TABLE `ofertas`
  MODIFY `id_oferta` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `postulantes`
--
ALTER TABLE `postulantes`
  MODIFY `id_postulante` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id_solicitud` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `tipo_cargos`
--
ALTER TABLE `tipo_cargos`
  MODIFY `id_cargo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_contratos`
--
ALTER TABLE `tipo_contratos`
  MODIFY `id_tipo_contrato` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `id_ubicacion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `empresas_id_ubicacion_foreign` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicaciones` (`id_ubicacion`),
  ADD CONSTRAINT `empresas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `ofertas`
--
ALTER TABLE `ofertas`
  ADD CONSTRAINT `ofertas_id_empresa_foreign` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ofertas_id_tipo_contrato_foreign` FOREIGN KEY (`id_tipo_contrato`) REFERENCES `tipo_contratos` (`id_tipo_contrato`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ofertas_id_ubicacion_foreign` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicaciones` (`id_ubicacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `postulantes`
--
ALTER TABLE `postulantes`
  ADD CONSTRAINT `postulantes_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_id_estadosolicitud_foreign` FOREIGN KEY (`id_estadosolicitud`) REFERENCES `estados_solicitudes` (`id_estadosolicitud`),
  ADD CONSTRAINT `solicitudes_id_hojadevida_foreign` FOREIGN KEY (`id_hojadevida`) REFERENCES `hojas_de_vida` (`id_hojadevida`),
  ADD CONSTRAINT `solicitudes_id_oferta_foreign` FOREIGN KEY (`id_oferta`) REFERENCES `ofertas` (`id_oferta`),
  ADD CONSTRAINT `solicitudes_id_postulante_foreign` FOREIGN KEY (`id_postulante`) REFERENCES `postulantes` (`id_postulante`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roles_id_rol_users` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
