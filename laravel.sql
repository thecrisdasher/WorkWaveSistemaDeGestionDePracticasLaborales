
--
-- Estructura de tabla para la tabla `empresas`
--


INSERT INTO `empresas` (`nombre`, `razon_social`, `id_ubicacion`, `id_usuario`, `created_at`, `updated_at`) VALUES
( 'Tech Solutions', 'Tech Solutions S.A.S', 1, 1, '2025-03-30 03:41:00', '2025-03-30 03:41:00'),
( 'InnovaSoft', 'Innova Software Ltda.', 2, 2, '2025-03-30 03:41:00', '2025-03-30 03:41:00'),
( 'AgroIndustrias', 'AgroIndustrias del Valle', 3, 3, '2025-03-30 03:41:00', '2025-03-30 03:41:00'),
( 'TELE PACAS', 'AgroIndustrias del Valle', 1, 1, '2025-03-30 21:07:35', '2025-03-30 21:07:35'),
( 'TELA', 'SDAF', 1, 1, '2025-03-30 21:07:48', '2025-03-30 21:07:48'),
( 'TELE', 'AgroIndustrias del Valle', 1, 1, '2025-03-30 21:12:46', '2025-03-30 21:12:46'),
( 'Manuela games', 'AgroIndustrias del Valle', 1, 1, '2025-04-01 08:19:05', '2025-04-01 08:19:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_solicitudes`


INSERT INTO `estados_solicitudes` (`id_estadosolicitud`, `estado`) VALUES
(1, 'Pendiente'),
(2, 'Aprobada'),
(3, 'Rechazada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hojas_de_vida`
--



INSERT INTO `hojas_de_vida` (`id_hojadevida`, `archivo`) VALUES
(1, 0),
(2, 0),
(3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ofertas`
--


INSERT INTO `ofertas` (`id_oferta`, `nombre_oferta`, `descripcion`, `salario`, `fecha_limite`, `id_tipo_cargo`, `id_tipo_contrato`, `id_empresa`, `id_ubicacion`, `created_at`, `updated_at`) VALUES
(1, 'Desarrollador Web', 'VRIZE is a Global Digital & Data Engineering company, committed to delivering end-to-end Digital solutions and services to its customers worldwide. We offer business-friendly solutions across industry verticals that include Banking, Financial Services, Healthcare & Insurance, Manufacturing, and Retail. The company has strategic business alliances with industry leaders such as Adobe, IBM Sterling Commerce, IBM, Microsoft, Docker, Sisense, Competera, Snowflake, and Tableau.VRIZE is headqua', 9000000.00, '2025-06-01', 1, 1, 1, 1, '2025-03-30 03:55:13', '2025-04-01 09:51:53'),
(2, 'Analista de Datos', 'We are looking for a skilled Front-End Developer with expertise in React.js and Next.js to join our team. The ideal candidate will be responsible for developing and maintaining high-quality, scalable, and responsive web applications while working closely ', 4500000.00, '2025-07-15', 2, 2, 2, 2, '2025-03-30 03:55:13', '2025-03-30 03:55:13'),
(3, 'Diseñador UX/UI', 'Diseño de interfaces para aplicaciones web y móviles', 4000000.00, '2025-08-10', 3, 1, 3, 3, '2025-03-30 03:55:13', '2025-03-30 03:55:13'),
(4, 'q', 'da', 123.00, NULL, 1, 1, 1, 1, '2025-03-30 09:02:27', '2025-03-30 09:02:27'),
(5, 'sdfg', '2314', 234.00, NULL, 1, 1, 1, 1, '2025-03-30 09:02:47', '2025-03-30 09:02:47'),
(6, 'holaaa', 'rfef', 3453.00, NULL, 1, 1, 1, 1, '2025-03-30 09:10:19', '2025-03-30 21:03:32'),
(7, '12', '12', 2.00, NULL, 1, 1, 1, 1, '2025-03-30 21:02:47', '2025-03-30 21:03:02');



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulantes`
--


INSERT INTO `postulantes` (`id_postulante`, `nombre`, `apellido`, `fecha_nacimiento`, `id`) VALUES
(1, 'Juan', 'Pérez', '1995-04-23', 1),
(2, 'María', 'López', '1993-08-15', 2),
(3, 'Carlos', 'Gómez', '1998-02-10', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--



INSERT INTO `roles` (`id_rol`, `tipo_rol_usuario`) VALUES
(1, 'admin'),
(2, 'estudiante '),
(3, 'empresa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--


INSERT INTO `solicitudes` (`id_solicitud`, `id_hojadevida`, `id_postulante`, `id_estadosolicitud`, `id_oferta`, `fecha_solicitud`) VALUES
(1, 2, 1, 2, 7, '2025-03-30 23:48:11'),
(2, 2, 1, 2, 1, '2025-03-31 07:45:04'),
(3, 2, 1, 2, 2, '2025-03-31 07:54:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cargos`


INSERT INTO `tipo_cargos` (`id_cargo`, `cargo`) VALUES
(1, 'practicante');



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicaciones`
--


INSERT INTO `ubicaciones` (`id_ubicacion`, `direccion`, `ciudad`) VALUES
(1, 'Calle 123 #45-67', 'Bogotá, Distrito Capital, Colombia'),
(2, 'Carrera 50 #10-20', 'Medellín, Antioquia, Colombia'),
(3, 'Avenida 6 #34-56', 'Cali, Valle del Cauca, Colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--


INSERT INTO `users` (`id`, `id_rol`, `username`, `firstname`, `lastname`, `email`, `photo`, `email_verified_at`, `password`, `address`, `city`, `country`, `postal`, `about`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Administrador', 'Admin', 'admin@argon.com', 'profile_photos/0a938f4c-d9d1-4d8e-a5e3-6ac1e6e463ef.jpg', NULL, '$2y$10$oFE/.5TX6NqoXSRj6L0yRuA27vV.w9TyXlgzAqumo/SullD93VgXG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-04-01 08:18:31'),
(2, 3, 'jefe_rrhh', 'Jefe', 'RRHH', 'jefe.rrhh@empresa.com', NULL, NULL, 'hashed_password_2', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-30 03:41:00', '2025-03-30 03:41:00'),
(3, 2, 'abel', 'dd', 'sol', 'camilosol123@gmail.com', NULL, NULL, '123', NULL, 'Cali', NULL, '1', 'NA', NULL, '2025-03-30 03:41:00', '2025-04-01 08:20:02');

