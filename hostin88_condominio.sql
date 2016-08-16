-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2016 a las 05:16:12
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hostin88_condominio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `conf_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `conf_monto_mens` decimal(13,2) unsigned NOT NULL,
  `conf_dia_cobro` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '01',
  `conf_porc_mora` decimal(13,2) unsigned NOT NULL,
  `conf_dia_mora` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '10',
  `conf_status` tinyint(2) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`conf_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`conf_id`, `conf_monto_mens`, `conf_dia_cobro`, `conf_porc_mora`, `conf_dia_mora`, `conf_status`) VALUES
(1, '210.00', '01', '20.00', '10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deuda`
--

CREATE TABLE IF NOT EXISTS `deuda` (
  `deuda_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deuda_tipo_id` int(11) NOT NULL,
  `deuda_concepto` int(10) NOT NULL DEFAULT '0',
  `deuda_ref` int(11) NOT NULL,
  `deuda_usuario_id` int(11) NOT NULL,
  `deuda_monto` decimal(13,2) NOT NULL,
  `deuda_usuario_reg` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deuda_otro_concepto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`deuda_id`),
  KEY `deuda_deuda_tipo_id_index` (`deuda_tipo_id`),
  KEY `deuda_deuda_usuario_id_index` (`deuda_usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `deuda`
--

INSERT INTO `deuda` (`deuda_id`, `deuda_tipo_id`, `deuda_concepto`, `deuda_ref`, `deuda_usuario_id`, `deuda_monto`, `deuda_usuario_reg`, `created_at`, `updated_at`, `deuda_otro_concepto`) VALUES
(1, 0, 6, 0, 14, '15.00', 2, '2016-08-11 03:41:58', NULL, 'Bombillos de la cancha'),
(2, 0, 3, 0, 14, '210.00', 2, '2016-08-11 03:43:33', NULL, ''),
(3, 0, 3, 0, 14, '210.00', 2, '2016-08-11 03:49:20', NULL, ''),
(4, 0, 6, 0, 14, '10.00', 2, '2016-08-11 03:50:05', NULL, 'Reparación de cerca eléctrica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE IF NOT EXISTS `encuesta` (
  `id` int(10) unsigned NOT NULL,
  `pregunta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creado` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`id`, `pregunta`, `creado`, `estatus`) VALUES
(0, '¿Qué te parece el sistema de condominio?', '2016-07-13 03:33:33', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta_opcion`
--

CREATE TABLE IF NOT EXISTS `encuesta_opcion` (
  `id` int(10) unsigned NOT NULL,
  `opcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cod_encuesta` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `encuesta_opcion_cod_encuesta_foreign` (`cod_encuesta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `encuesta_opcion`
--

INSERT INTO `encuesta_opcion` (`id`, `opcion`, `cod_encuesta`) VALUES
(0, 'Excelente', 0),
(1, 'Regular', 0),
(2, 'Malo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta_votos`
--

CREATE TABLE IF NOT EXISTS `encuesta_votos` (
  `cod_usuario` int(10) unsigned NOT NULL,
  `cod_opcion` int(10) unsigned NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `encuesta_votos_cod_usuario_foreign` (`cod_usuario`),
  KEY `encuesta_votos_cod_opcion_foreign` (`cod_opcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `encuesta_votos`
--

INSERT INTO `encuesta_votos` (`cod_usuario`, `cod_opcion`, `fecha`) VALUES
(328, 0, '2016-07-13 06:50:07'),
(2, 1, '2016-07-21 04:03:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galleries`
--

CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ruta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lotes`
--

CREATE TABLE IF NOT EXISTS `lotes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=326 ;

--
-- Volcado de datos para la tabla `lotes`
--

INSERT INTO `lotes` (`id`, `nombre`) VALUES
(0, 'admin'),
(1, '1A'),
(2, '2A'),
(3, '3A'),
(4, '4A'),
(5, '5A'),
(6, '6A'),
(7, '7A'),
(8, '8A'),
(9, '9A'),
(10, '10A'),
(11, '11A'),
(12, '12A'),
(13, '13A'),
(14, '14A'),
(15, '15A'),
(16, '16A'),
(17, '17A'),
(18, '18A'),
(19, '19A'),
(20, '20A'),
(21, '21A'),
(22, '22A'),
(23, '23A'),
(24, '24A'),
(25, '25A'),
(26, '26A'),
(27, '27A'),
(28, '28A'),
(29, '29A'),
(30, '30A'),
(31, '31A'),
(32, '32A'),
(33, '33A'),
(34, '34A'),
(35, '35A'),
(36, '36A'),
(37, '37A'),
(38, '38A'),
(39, '39A'),
(40, '40A'),
(41, '41A'),
(42, '42A'),
(43, '43A'),
(44, '44A'),
(45, '45A'),
(46, '46A'),
(47, '47A'),
(48, '48A'),
(49, '49A'),
(50, '19A-1'),
(51, '1B'),
(52, '2B'),
(53, '3B'),
(54, '4B'),
(55, '5B'),
(56, '6B'),
(57, '7B'),
(58, '8B'),
(59, '9B'),
(60, '10B'),
(61, '11B'),
(62, '12B'),
(63, '13B'),
(64, '14B'),
(65, '15B'),
(66, '16B'),
(67, '17B'),
(68, '18B'),
(69, '19B'),
(70, '20B'),
(71, '21B'),
(72, '22B'),
(73, '23B'),
(74, '24B'),
(75, '25B'),
(76, '26B'),
(77, '27B'),
(78, '28B'),
(79, '29B'),
(80, '30B'),
(81, '31B'),
(82, '32B'),
(83, '33B'),
(84, '34B'),
(85, '35B'),
(86, '36B'),
(87, '37B'),
(88, '38B'),
(89, '39B'),
(90, '40B'),
(91, '41B'),
(92, '42B'),
(93, '43B'),
(94, '44B'),
(95, '45B'),
(96, '46B'),
(97, '47B'),
(98, '48B'),
(99, '49B'),
(100, '50B'),
(101, '51B'),
(102, '1C'),
(103, '2C'),
(104, '3C'),
(105, '4C'),
(106, '5C'),
(107, '6C'),
(108, '7C'),
(109, '8C'),
(110, '9C'),
(111, '10C'),
(112, '11C'),
(113, '12C'),
(114, '13C'),
(115, '14C'),
(116, '15C'),
(117, '16C'),
(118, '17C'),
(119, '18C'),
(120, '19C'),
(121, '20C'),
(122, '21C'),
(123, '22C'),
(124, '23C'),
(125, '24C'),
(126, '25C'),
(127, '26C'),
(128, '27C'),
(129, '28C'),
(130, '29C'),
(131, '30C'),
(132, '31C'),
(133, '32C'),
(134, '33C'),
(135, '34C'),
(136, '35C'),
(137, '36C'),
(138, '37C'),
(139, '38C'),
(140, '39C'),
(141, '40C'),
(142, '41C'),
(143, '42C'),
(144, '43C'),
(145, '22C-1'),
(146, '1D'),
(147, '2D'),
(148, '3D'),
(149, '4D'),
(150, '5D'),
(151, '6D'),
(152, '7D'),
(153, '8D'),
(154, '9D'),
(155, '10D'),
(156, '11D'),
(157, '12D'),
(158, '13D'),
(159, '14D'),
(160, '15D'),
(161, '16D'),
(162, '17D'),
(163, '18D'),
(164, '19D'),
(165, '20D'),
(166, '21D'),
(167, '22D'),
(168, '23D'),
(169, '24D'),
(170, '25D'),
(171, '26D'),
(172, '27D'),
(173, '28D'),
(174, '29D'),
(175, '30D'),
(176, '31D'),
(177, '32D'),
(178, '33D'),
(179, '34D'),
(180, '35D'),
(181, '36D'),
(182, '37D'),
(183, '38D'),
(184, '39D'),
(185, '40D'),
(186, '41D'),
(187, '42D'),
(188, '43D'),
(189, '44D'),
(190, '45D'),
(191, '46D'),
(192, '47D'),
(193, '48D'),
(194, '49D'),
(195, '50D'),
(196, '51D'),
(197, '52D'),
(198, '53D'),
(199, '54D'),
(200, '55D'),
(201, '56D'),
(202, '57D'),
(203, '58D'),
(204, '59D'),
(205, '60D'),
(206, '61D'),
(207, '62D'),
(208, '63D'),
(209, '64D'),
(210, '65D'),
(211, '66D'),
(212, '67D'),
(213, '1E'),
(214, '2E'),
(215, '3E'),
(216, '4E'),
(217, '5E'),
(218, '6E'),
(219, '7E'),
(220, '8E'),
(221, '9E'),
(222, '10E'),
(223, '11E'),
(224, '12E'),
(225, '13E'),
(226, '14E'),
(227, '15E'),
(228, '16E'),
(229, '17E'),
(230, '18E'),
(231, '19E'),
(232, '20E'),
(233, '21E'),
(234, '22E'),
(235, '23E'),
(236, '24E'),
(237, '25E'),
(238, '26E'),
(239, '27E'),
(240, '28E'),
(241, '29E'),
(242, '30E'),
(243, '31E'),
(244, '32E'),
(245, '33E'),
(246, '34E'),
(247, '35E'),
(248, '36E'),
(249, '37E'),
(250, '38E'),
(251, '39E'),
(252, '40E'),
(253, '41E'),
(254, '42E'),
(255, '43E'),
(256, '44E'),
(257, '45E'),
(258, '46E'),
(259, '47E'),
(260, '48E'),
(261, '49E'),
(262, '50E'),
(263, '51E'),
(264, '52E'),
(265, '53E'),
(266, '24E-1'),
(267, '25E-1'),
(268, '1F'),
(269, '2F'),
(270, '3F'),
(271, '4F'),
(272, '5F'),
(273, '6F'),
(274, '7F'),
(275, '8F'),
(276, '9F'),
(277, '10F'),
(278, '11F'),
(279, '12F'),
(280, '13F'),
(281, '14F'),
(282, '15F'),
(283, '16F'),
(284, '17F'),
(285, '18F'),
(286, '19F'),
(287, '20F'),
(288, '21F'),
(289, '22F'),
(290, '23F'),
(291, '24F'),
(292, '25F'),
(293, '26F'),
(294, '27F'),
(295, '28F'),
(296, '29F'),
(297, '30F'),
(298, '31F'),
(299, '32F'),
(300, '33F'),
(301, '34F'),
(302, '35F'),
(303, '36F'),
(304, '37F'),
(305, '38F'),
(306, '39F'),
(307, '40F'),
(308, '41F'),
(309, '42F'),
(310, '43F'),
(311, '44F'),
(312, '45F'),
(313, '46F'),
(314, '47F'),
(315, '48F'),
(316, '49F'),
(317, '50F'),
(318, '51F'),
(319, '52F'),
(320, '53F'),
(321, '54F'),
(322, '55F'),
(323, '56F'),
(324, '57F'),
(325, '58F');

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
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_07_011819_create_galleries_table', 2),
('2016_06_09_050846_alter_users_table', 3),
('2016_07_27_142139_create_deuda_table', 4),
('2016_07_27_153443_add_tipo_tipo_to_pago_tipo_table', 4),
('2016_07_28_024214_create_notifications_table', 5),
('2016_08_03_220524_create_configuracion_table', 6),
('2016_08_03_222100_create_pago_concepto_table', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE IF NOT EXISTS `notificacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visto` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `notificacion_id_usuario_index` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`id`, `id_usuario`, `descripcion`, `url`, `visto`, `created_at`, `updated_at`) VALUES
(1, 2, 'Nueva cuenta por pagar registrada por: 15$', '/', 0, '2016-08-11 03:41:58', '2016-08-11 03:56:14'),
(2, 2, 'Nueva cuenta por pagar registrada por: 210$', '/', 0, '2016-08-11 03:44:28', '2016-08-11 03:56:18'),
(3, 2, 'Nueva cuenta por pagar registrada por: 210$', '/', 0, '2016-08-11 03:49:24', '2016-08-11 03:56:21'),
(4, 2, 'Nueva cuenta por pagar registrada por: 10$', '/', 0, '2016-08-11 03:50:09', '2016-08-11 03:56:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `pago_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pago_tipo_id` int(10) NOT NULL,
  `pago_concepto` int(10) NOT NULL,
  `pago_numero` int(10) NOT NULL DEFAULT '0',
  `pago_fecha` date NOT NULL,
  `pago_usuario_id` int(10) NOT NULL,
  `pago_monto` decimal(13,2) NOT NULL,
  `pago_estado_id` int(10) NOT NULL,
  `pago_usuario_reg` int(10) DEFAULT NULL,
  `pago_fecha_updat` date DEFAULT NULL,
  `pago_user_updat` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`pago_id`),
  KEY `pago_tipo_id` (`pago_tipo_id`,`pago_numero`,`pago_usuario_id`,`pago_estado_id`),
  KEY `pago_usuario_reg` (`pago_usuario_reg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Recibos de pago' AUTO_INCREMENT=24 ;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`pago_id`, `pago_tipo_id`, `pago_concepto`, `pago_numero`, `pago_fecha`, `pago_usuario_id`, `pago_monto`, `pago_estado_id`, `pago_usuario_reg`, `pago_fecha_updat`, `pago_user_updat`) VALUES
(2, 1, 7, 0, '2016-07-15', 44, '2500.00', 2, NULL, NULL, NULL),
(5, 1, 7, 0, '2016-07-15', 44, '1000.00', 2, NULL, NULL, NULL),
(11, 1, 7, 0, '2016-07-15', 23, '1500.60', 2, NULL, NULL, NULL),
(12, 1, 7, 0, '2016-07-15', 23, '1500.60', 2, NULL, NULL, NULL),
(13, 1, 7, 0, '2016-07-15', 23, '1600.16', 2, NULL, NULL, NULL),
(14, 1, 7, 0, '2016-07-15', 23, '1500.00', 2, NULL, NULL, NULL),
(15, 1, 7, 0, '2016-07-15', 23, '1600.00', 2, NULL, NULL, NULL),
(16, 1, 7, 0, '2016-07-15', 64, '1600.16', 2, NULL, NULL, NULL),
(18, 2, 7, 21263466, '2016-07-15', 29, '2000.00', 1, NULL, NULL, NULL),
(19, 2, 1, 21263467, '2016-07-18', 19, '1950.00', 3, 2, NULL, NULL),
(20, 3, 1, 2163468, '2016-07-21', 14, '1337.00', 3, 2, '2016-08-09', 2),
(21, 2, 1, 21263469, '2016-07-27', 17, '2600.00', 2, 2, NULL, NULL),
(22, 1, 7, 0, '2016-08-04', 45, '1900.00', 2, 2, NULL, NULL),
(23, 4, 5, 21263471, '2016-08-04', 45, '1555.67', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_concepto`
--

CREATE TABLE IF NOT EXISTS `pago_concepto` (
  `id_concepto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `desc_concepto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_concepto` int(11) NOT NULL,
  PRIMARY KEY (`id_concepto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `pago_concepto`
--

INSERT INTO `pago_concepto` (`id_concepto`, `desc_concepto`, `tipo_concepto`) VALUES
(1, 'Pago de Mensualidad', 1),
(2, 'Pago de Mora', 1),
(3, 'Mensualidad', 2),
(4, 'Mora', 2),
(5, 'Otros Pagos', 1),
(6, 'Otras Deducciones', 2),
(7, 'Saldo Inicial', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_estado`
--

CREATE TABLE IF NOT EXISTS `pago_estado` (
  `id_estado` int(10) NOT NULL AUTO_INCREMENT,
  `desc_estado` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Estado del pago' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pago_estado`
--

INSERT INTO `pago_estado` (`id_estado`, `desc_estado`, `color`) VALUES
(1, 'En Espera', 'label-warning'),
(2, 'Aprobado', 'label-success'),
(3, 'Rechazado', 'label-danger');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_tipo`
--

CREATE TABLE IF NOT EXISTS `pago_tipo` (
  `id_tipo` int(10) NOT NULL AUTO_INCREMENT,
  `desc_tipo` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tipo_tipo` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo`),
  KEY `desc_tipo` (`desc_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tipos de pago' AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `pago_tipo`
--

INSERT INTO `pago_tipo` (`id_tipo`, `desc_tipo`, `tipo_tipo`) VALUES
(1, 'Registro Inicial', 0),
(2, 'Transferencia', 0),
(3, 'Depósito', 0),
(4, 'Cheque', 0),
(5, 'Mora', 1),
(6, 'Cobro de condominio', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('joselincedenno@gmail.com', '1ee2302219c9f23cb57cff73f0623d2db7dc92ae4d1c4ad078dad795b76bd650', '2016-06-01 07:25:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldo`
--

CREATE TABLE IF NOT EXISTS `saldo` (
  `saldo_id` int(10) NOT NULL AUTO_INCREMENT,
  `saldo_id_usuario` int(10) NOT NULL,
  `saldo_monto` decimal(13,2) NOT NULL,
  PRIMARY KEY (`saldo_id`),
  KEY `saldo_id_usuario` (`saldo_id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Saldos de los usuarios' AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `saldo`
--

INSERT INTO `saldo` (`saldo_id`, `saldo_id_usuario`, `saldo_monto`) VALUES
(1, 44, '3500.00'),
(2, 23, '7701.36'),
(3, 64, '1600.16'),
(4, 29, '2000.00'),
(6, 17, '2600.00'),
(7, 45, '3455.67'),
(8, 14, '-445.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `inquilino` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobilenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `homenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cod_lote` int(10) unsigned NOT NULL,
  `emailalt_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emailalt_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cod_lote` (`cod_lote`),
  KEY `cod_lote_2` (`cod_lote`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=654 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `inquilino`, `id_role`, `remember_token`, `created_at`, `updated_at`, `mobilenumber`, `phonenumber`, `homenumber`, `cod_lote`, `emailalt_1`, `emailalt_2`) VALUES
(1, 'Administrador', 'admin@versalles1.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 1, 'VARFPQAcgnJ7EPS6mqz96evfVxwtLMPy13qiInRgh2grcVFVR5eyGARUouOX', '2016-06-18 12:37:02', '2016-07-13 03:47:39', '', '', 'administrador', 0, '', ''),
(2, 'Superadministrador', 'superadministrador@versalles1.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 2, 'mG9XixsSTs2E9fbvHWTKzJZ57ayNDusxkDaPcad9zthqlQFMh7JOEdxVWtga', '2016-06-18 12:37:02', '2016-07-13 06:47:05', '', '', 'sadministrador', 0, '', ''),
(3, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'DRiTWtJ07joooR60Svwkw6qnUxFpdgiFh9wrsf9581hPz0URc2xpCIJTDTHg', '2016-06-18 12:37:02', '2016-07-04 04:32:02', '', '', '1A', 1, '', ''),
(4, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '2A', 2, '', ''),
(5, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '3A', 3, '', ''),
(6, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '4A', 4, '', ''),
(7, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '5A', 5, '', ''),
(8, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '6A', 6, '', ''),
(9, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '7A', 7, '', ''),
(10, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '8A', 8, '', ''),
(11, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, '2DfmaPLmhcjdYzPaHIEe31tpb8wZplx3Ey3s5N2yEdxVHwDuoJJRo8r69hLX', '2016-06-18 12:37:02', '2016-07-03 07:54:21', '', '', '9A', 9, '', ''),
(12, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'VkLYUDgcRjvH07j6dUspQN85ZIYgn8I2TWIuM7T1dwi4HGCjgOssLbmu09BB', '2016-06-18 12:37:02', '2016-07-05 05:55:18', '', '', '10A', 10, '', ''),
(13, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '11A', 11, '', ''),
(14, 'Ivan Cabana', 'gomezg.augusto@gmail.com', '$2y$10$D7N/9s0cY9/5yWr8aFYhvuAELpz1o2LDB9jxK6egydBjgkTTrrZmi', 0, 0, '7QgV9lLEV7XwQ11YHYJGmdQVXJEi6d1N9jPD6cVCudlBmHvllu76bcvJawhf', '2016-06-18 12:37:02', '2016-07-11 07:14:57', '64000707', '3943706', '12A', 12, '', ''),
(15, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '13A', 13, '', ''),
(16, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '14A', 14, '', ''),
(17, 'Oscar Eduardo Beltran', 'edinhobel05@hotmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, '8k3LHZ0KR81mpcHZ3OC26Auy3XMJeSMd7t5KFila8d7iSM87XU4rSLuyWvoW', '2016-06-18 12:37:02', '2016-07-02 22:16:42', '65998300', '3959343', '15A', 15, '', ''),
(18, 'Maria Martinez', 'martinezhernaiz@gmail.com', '$2y$10$.ikcq2ra9oC/35LPx7ChfeC1WdquScRgsGaExmOZ36AzKOLkTbAPu', 0, 0, 'a2pbirymsGjV4au3sjYMDCWG59QRuEzZ6OVunkaGj65BsabiQOc7FAmmGgit', '2016-06-18 12:37:02', '2016-07-05 01:25:35', '60004123', '3969812', '16A', 16, '', ''),
(19, 'Piedad Hernandez', 'piedadhernandez@hotmail.com', '$2y$10$oCoJCaN/K9HkMK6rNGvJxuvaabi0ZxVU0jzCmLd.o1yhFgl5nIgFW', 0, 0, 'Y1Z5Bzy1uJah99ZCesEXiOn6vPlD74ily6AJgMz4pL5FIkJtma2FqSYIST7O', '2016-06-18 12:37:02', '2016-07-05 01:31:29', '60004124', '3933634', '17A', 17, '', ''),
(20, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '18A', 18, '', ''),
(21, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '19A', 19, '', ''),
(22, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '20A', 20, '', ''),
(23, 'Tom Millar', 'Tommillar@sercel.com', '$2y$10$5wxSiEFHSJHEEf9Vmmne8.pBDoVaF7fZpZVrwiq6J05AFYFXVHLke', 0, 0, '3PsNWAYIjZ9P6xtQFS5QEm9jNueIbc3MywTwgGCmEqIvMa5P2Fx9PQQLyBMR', '2016-06-18 12:37:02', '2016-07-08 00:13:38', '0019187702140', '0019188501175', '21A', 21, '', ''),
(24, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '22A', 22, '', ''),
(25, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '23A', 23, '', ''),
(26, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '24A', 24, '', ''),
(27, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '25A', 25, '', ''),
(28, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '26A', 26, '', ''),
(29, 'Mary Luces', 'luces.mary@gmail.com', '$2y$10$44S0rdZz0PvOuuieFMPJjuCj2N1D/RM/nzFkA.60dCv.hzS1MM.lO', 0, 0, 'BE120iYbVpCdfi4rcgiwdnmjzJKMGwVmdkhxsoiYto9sHk7CliRnJ4IjTSE3', '2016-06-18 12:37:02', '2016-07-09 08:22:41', '66719646', '3902651', '27A', 27, '', ''),
(30, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '28A', 28, '', ''),
(31, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '29A', 29, '', ''),
(32, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '30A', 30, '', ''),
(33, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '31A', 31, '', ''),
(34, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '32A', 32, '', ''),
(35, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '33A', 33, '', ''),
(36, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '34A', 34, '', ''),
(37, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '35A', 35, '', ''),
(38, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '36A', 36, '', ''),
(39, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '37A', 37, '', ''),
(40, 'Patricio Janson', 'Patriciojanson@gmail.com', '$2y$10$.GaFuvtKYUXlOc7T3ywRpewcli24y1FOx4Lhx3XUbX/7OD6Z.FQ7G', 0, 0, 'Q9fUw1eQc3op6cmVFrtqgoZXSL0rFSkWirOlPulaGUix9Fw4YYYjE9OBMS78', '2016-06-18 12:37:02', '2016-07-05 05:24:12', '66736070', '3997397', '38A', 38, '', ''),
(41, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '39A', 39, '', ''),
(42, 'Abel Pérez Jaramillo', 'aperezj@cusinter.com', '$2y$10$I2XhD/Xw6jR7.qn/YeOc/.tGnrE.JBZ32IjmiLFsvdGSNLhuXiCEu', 0, 0, '8N8tB570PdNYxoG9idUQJLhr8Vjcm6mQUfRreDG5X1dBzjPtsuldWxo0ppQE', '2016-06-18 12:37:02', '2016-07-03 03:11:18', '66133631', '3941927', '40A', 40, '', ''),
(43, '', '', '$2y$10$JmN/BgnZKzrD94Kj0CMrt.bQuH/GtZPfVWvMIfXhxWqhnCniwU9cG', 0, 0, 'EkGmbaPaujzR5jQx6P0ZzOjnaVvm3JNKaW4xhEBdLKVAIe2950cSmwafR6Vw', '2016-06-18 12:37:02', '2016-07-12 00:25:34', '', '', '41A', 41, '', ''),
(44, 'Francesca Augello', 'fas771@hotmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'YbGlosdx2GHQ3eKW9jvv2dSQMcJZDmvC0SkE2SsDAk2yCZCeurV5eh1qCLHP', '2016-06-18 12:37:02', '2016-07-10 06:38:20', '69148748', '69148748', '42A', 42, '', ''),
(45, 'HERNAN SAMUDIO MONGE', 'samm98@gmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'OUkFXpq31yEW4tm8mTSolB2pygsS7JyM05Jys9LPeWDIeKgev3mfbsUw9f10', '2016-06-18 12:37:02', '2016-07-09 02:35:35', '66174884', '3986943', '43A', 43, '', ''),
(46, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '44A', 44, '', ''),
(47, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '45A', 45, '', ''),
(48, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '46A', 46, '', ''),
(49, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '47A', 47, '', ''),
(50, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '48A', 48, '', ''),
(51, 'Mirta Guerrero ', 'mirtamgc@gmail.com', '$2y$10$Gld5S57H7K4hYF/NnwO51.t6otrfyMN9/rTKsere3MNDsFvVIIXcK', 0, 0, 'ZhFiOlKCxduPQph57VP9pLBo7zIjvsED5fXmj4SXx40BAUXQK4ok2mLBfydy', '2016-06-18 12:37:02', '2016-07-11 17:48:24', '66145382', '3941549', '49A', 49, '', ''),
(52, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '19A-1', 50, '', ''),
(53, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '1B', 51, '', ''),
(54, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '2B', 52, '', ''),
(55, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '3B', 53, '', ''),
(56, 'Neila Melean', 'nmelean@hotmail.com', '$2y$10$PcqQ56op/KVIeIzEylTBR.2X58OpsU0UX/DLXXMZyxeYPmYLX5Yp2', 0, 0, 'FaOaZBrmYg9BYYrVFH5rWuLy91zajDevRLqEbvApsbeRhK1bklqIrvoD8rqy', '2016-06-18 12:37:02', '2016-07-12 05:05:08', '65505485', '3901974', '4B', 54, '', ''),
(57, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '5B', 55, '', ''),
(58, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '6B', 56, '', ''),
(59, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '7B', 57, '', ''),
(60, 'Andres Mateus ', 'Afmateus@gmail.com', '$2y$10$ts2gVb6ocVClAtSslWK2h.LGvYcZ5zY5fKxnpfJK/a5NNpK3maHvy', 0, 0, '0ctO1gTq6lbR9hZEAMzwASGiCR9sXilbjY6BVf66VVVOjhh9FOYqaweWGsnF', '2016-06-18 12:37:02', '2016-07-04 17:31:25', '69482443', '3987704', '8B', 58, '', ''),
(61, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '9B', 59, '', ''),
(62, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '10B', 60, '', ''),
(63, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '11B', 61, '', ''),
(64, 'Erick Molina', 'eamolina@hotmail.com', '$2y$10$h0d239h/ZiaregYOgON8YeCTiS6/T8g3v4kHJE9CNCynEtoISxWnW', 0, 0, 'M4AAsr9ADiSssXbhVRfdxBDYBnMN1GpI34yDzyvPcsJVS7NfzQG3WnVNooID', '2016-06-18 12:37:02', '2016-07-11 07:55:08', '69483223', '', '12B', 62, '', ''),
(65, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '13B', 63, '', ''),
(66, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '14B', 64, '', ''),
(67, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '15B', 65, '', ''),
(68, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '16B', 66, '', ''),
(69, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '17B', 67, '', ''),
(70, 'German Gil', 'ggilgerman@gmail.com', '$2y$10$2B8fb8zmUUeFSMWNOBZyuOoFdHvQvGBMtOxgNi8nPz02Q3gg18SLa', 0, 0, 'yxWH36iLg4sqhqr1KeCa4o08a9eLigYE1JpZhoAF2SeWZWZJPQ1R5F5ngY5K', '2016-06-18 12:37:02', '2016-07-03 04:44:46', '60904961', '3941043', '18B', 68, '', ''),
(71, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '19B', 69, '', ''),
(72, 'Emery Bujana', 'ebujana@gmail.com', '$2y$10$lzrnnX5TXkbA7TOogzmPGeV3aHNhIqBGBA2Y0u8bv48n6DBPidYLO', 0, 0, 'Vxt9uZS6xVFStcCpGfy6bkSnVMFX31yGUdgqA8PfvPk1sNMYpc5BiuTWDqqW', '2016-06-18 12:37:02', '2016-07-09 03:17:53', '+50766507379', '', '20B', 70, '', ''),
(73, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '21B', 71, '', ''),
(74, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '22B', 72, '', ''),
(75, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '23B', 73, '', ''),
(76, 'maria carolina fuenmayor', 'negalignacio@gmail.com', '$2y$10$KIkkdDA9m6orU7WDRUl4eeGFXTU7d7oM1EQyLb6fIKF9ytuM.d4aG', 0, 0, 'UsiLzS8azOwIuwLMRxwkuoIXFa2aUBRZqfMNy36TcLwI3WKidYx2ufHokpFf', '2016-06-18 12:37:02', '2016-07-09 02:43:17', '61506921', '3946052', '24B', 74, '', ''),
(77, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '25B', 75, '', ''),
(78, 'Jennifer Hassan', 'Jennhassan@gmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'ShT9QzsmCo3k5Nt0CkvEX4vgzDA4PJV79v3f0dM2np6MVyZ07gkqOsFWGVwk', '2016-06-18 12:37:02', '2016-07-09 02:46:04', '60361038', '', '26B', 76, '', ''),
(79, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '27B', 77, '', ''),
(80, 'Rosa Yazmin de  Lo Polito', 'rlopolito@gmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'kilNGW1GAJuJ89AbQkRAYjLcr9OSXAiKUxglGh40eaOXYgfimbNU8GUyv0im', '2016-06-18 12:37:02', '2016-06-29 05:40:35', '6480-4604', '209-9323', '28B', 78, '', ''),
(81, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '29B', 79, '', ''),
(82, 'LUIS QUESADA', 'luisericquesada@icloud.com', '$2y$10$3C82yTLWWZhzqrApRdLDbeGWSJbECGgEyp7vTIa1vx2x7qtmI2QiK', 0, 0, 'w3W5v3Ss46THwrg7pGNSFSsCnyjkD34vtUsPCJfrhwZ2RoR1dhRnQGAFtsNS', '2016-06-18 12:37:02', '2016-07-09 19:07:13', '66741417', '2700199', '30B', 80, '', ''),
(83, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '31B', 81, '', ''),
(84, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '32B', 82, '', ''),
(85, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '33B', 83, '', ''),
(86, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '34B', 84, '', ''),
(87, 'Vicente Sergio Savino/Marilena Canosa', 'canosamari@hotmail.com', '$2y$10$ll9wgrMqrT6iU2Y76Q2fIObvLhF/GgLq3h7QuK1SYlDV/V7nElAWW', 0, 0, 'uMFMa7r63xO4zqwwR8ja8aS37Xt9UwIck8E958MZdsoeNx0VNsskEDnYrFSK', '2016-06-18 12:37:02', '2016-07-09 03:51:52', '66384319/69495224', '2932090', '35B', 85, '', ''),
(88, '', '', '$2y$10$wmWntCtDQakPO3Tp7mUppO2dmj/iZuAAafsfskgueYx/qUEtTPcy6', 0, 0, '7EtW0ePhNx2JHCUx1iCu8gIQjlIkO0iSbhHYds6C2My1XwJtQhkikjPWw7UH', '2016-06-18 12:37:02', '2016-07-09 10:48:46', '', '', '36B', 86, '', ''),
(89, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '37B', 87, '', ''),
(90, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '38B', 88, '', ''),
(91, 'Maria Gabriela Arias', 'lala_mg@hotmail.com', '$2y$10$93VUczT1238XwTEWfnbF0e8ZzQtCkwXQpa2p/W5eWEGGGG7Glmlbe', 0, 0, 'yGWUKn00xXKacL0CqXySq43YQemM5sD3KrcNiXeIBdprGCRYR8CVhVo0q7s1', '2016-06-18 12:37:02', '2016-07-03 17:28:08', '65624661', '3933676', '39B', 89, '', ''),
(92, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '40B', 90, '', ''),
(93, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '41B', 91, '', ''),
(94, 'Erwing Gutierrez y Yairy Chan', 'erwing.gutierrez@multimax.net', '$2y$10$T1ThqnTUGMC2DpDumeHr.Owr8mUzFTxrUjxizmTrsLYU6FyLAFoPq', 0, 0, 'EtfA18jeJmmindHk5quL4UuQYgZ8EZtiohb3llI6PsFZTWQ973KElkAS8rCg', '2016-06-18 12:37:02', '2016-07-09 02:40:59', '60181234/66760506', '2932002', '42B', 92, '', ''),
(95, 'Carlos Alfredo Beitia Samudio', 'marthadebeitia@yahoo.com', '$2y$10$BiS/wMgKkCOk4SwIrQVXE.avvqrZNeykZt9bMK2DI3ObLvBDFAXnC', 0, 0, '8XJFwpmqdFGaUXcLwXIfeIZp5tNdlG7nkwBWScsVGHbTUa5cCQHMocMSl4Uy', '2016-06-18 12:37:02', '2016-07-09 04:08:58', '66146448', '2031580', '43B', 93, '', ''),
(96, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '44B', 94, '', ''),
(97, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '45B', 95, '', ''),
(98, 'Alejandro riera', 'arierag@gmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'sqqXw1GleBB0whUkhcTDnHFGlVWMeMhCsDI9NeE2Ljl7IWxfEdZEMADCWnxb', '2016-06-18 12:37:02', '2016-07-09 02:49:26', '66704895', '', '46B', 96, '', ''),
(99, 'PEDRO SILVA', 'psilva13@gmail.com', '$2y$10$3zudSggZ9OIb63Z7qSIkO.Kjs.mOCBd/fdRNKCxoeUfLAh7hA2qR6', 0, 0, 'wQc41mogmNmo7wD07paKvZdpeykcJvfGfV6qmBKiwSAKtQQsHrGytawG0Sht', '2016-06-18 12:37:02', '2016-07-09 22:51:11', '6636-6829', '3916576', '47B', 97, '', ''),
(100, 'María Carolina urbaneja de Figarella', 'carourbaneja@hotmail.com', '$2y$10$WHPfnp.kfPC3Ofo9g8bCKe2FHdT0rLJoAeGHiywyezF4wE4osrYiG', 0, 0, 'j7VnpesUgmtZ6UzrbGpkNFxHPHqbHCBdi5F5kYMYxNiJCVNpqgt2YMaMkDej', '2016-06-18 12:37:02', '2016-07-07 20:23:42', '69494862', '3920414', '48B', 98, '', ''),
(101, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '49B', 99, '', ''),
(102, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '50B', 100, '', ''),
(103, 'ROSA MELENDEZ', 'rosa2165@yahoo.com', '$2y$10$ECH1M1.C.SQ/UgsOD.aZfOI/bmXHdWDfpwPCtuditZBREXRW05/se', 0, 0, 'upwk9o37iBWh9lI1FMkWSGNcSZsVVXdkjge14Gkq65TZKlPa0dL2S96R0kKD', '2016-06-18 12:37:02', '2016-07-04 22:34:52', '61301376', '3917396', '51B', 101, '', ''),
(104, 'Lorena Castro / Juan Burguillos', 'lorenajcastro@gmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'OVqA5nuZPHi8ND1tAhdYevcFawyOPFN3dEWhHJUVU8rjQbXcEel9kQ5ibn5y', '2016-06-18 12:37:02', '2016-07-03 17:22:29', '62038237', '3946810', '1C', 102, '', ''),
(105, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '2C', 103, '', ''),
(106, 'Rosana Cañada', 'rosanacanada@hotmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'HQiLeRCTCD0E390jipGVCBDfCkRdJz1rsFM90RXNBdjtBh6SCLupxaeGkkIq', '2016-06-18 12:37:02', '2016-07-10 20:41:08', '60709812', '3915084', '3C', 104, '', ''),
(107, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '4C', 105, '', ''),
(108, '', '', '$2y$10$JkO2T.nAPiRvsP/S2ck4YOVeA1dnW/WenNAQSkCyP2v2pSkqOHxO.', 0, 0, 'USjE4JpPXY3zh6r0AynpWuLbmPQVrAHum5uMgJ7sMHJpqL41XMiAEQstWdl9', '2016-06-18 12:37:02', '2016-07-12 13:16:43', '', '', '5C', 106, '', ''),
(109, '', '', '$2y$10$A7KQr0BvChV6sKBC9YJGtesmCPkUCcw8oY2n49H3onkB18YAtV.De', 0, 0, 'oGEF05DS9gf395gjZju1yFE8nFIFWDeU3TTzZ3hgFCp7HHxpW9wlYRr6sPEn', '2016-06-18 12:37:02', '2016-07-09 04:30:49', '', '', '6C', 107, '', ''),
(110, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '7C', 108, '', ''),
(111, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '8C', 109, '', ''),
(112, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '9C', 110, '', ''),
(113, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '10C', 111, '', ''),
(114, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'WpaNrjTQL73VJHLM6VDncPtvkUffK4qt2WqWQ02sy4eoXKDqU9gQTngVaIih', '2016-06-18 12:37:02', '2016-06-29 15:49:55', '', '', '11C', 112, '', ''),
(115, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '12C', 113, '', ''),
(116, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '13C', 114, '', ''),
(117, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '14C', 115, '', ''),
(118, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '15C', 116, '', ''),
(119, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '16C', 117, '', ''),
(120, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '17C', 118, '', ''),
(121, 'Nacary bustamante', 'Mercedesnbustamante@gmail.com', '$2y$10$6jmpDK1PbWxm0W3rJGSIDeZoxd6orZw460Y7tify38icAU0/GXX5a', 0, 0, 'zjgA2807vnu96MbIJADY7gI3DfiGZsCkEysTmavMJ81IByr9fDvmvBC6kcf9', '2016-06-18 12:37:02', '2016-07-10 08:17:47', '60594110', '8301734', '18C', 119, '', ''),
(122, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '19C', 120, '', ''),
(123, 'Oswaldo Romero', 'Oswaldo.romero@gmail.com', '$2y$10$gKXujmKRpgjaNA10ye4vbOVRKxaWVrvtDa383bhzdyC/kYv9mSMeW', 0, 0, 'C9llBeZNS98XBuut513p0rpOV2G4IuHa4I1uYA6nFSPxLHHBFjjFL8gjrSjF', '2016-06-18 12:37:02', '2016-07-09 07:37:50', '68590879', '', '20C', 121, '', ''),
(124, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '21C', 122, '', ''),
(125, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '22C', 123, '', ''),
(126, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '23C', 124, '', ''),
(127, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, '0ZKkQHoFN9oicH1dYpaknLNGJIibvZREUKEofzGhjfdVCZCRgGQLB9xLzcPv', '2016-06-18 12:37:02', '2016-07-12 03:15:24', '', '', '24C', 125, '', ''),
(128, 'Daniel Jacome', 'D.jacome@gmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'rQHfhc1dTkyNyDyOzZJc8M0gVWrhWuBiRBiqirJjrW5gBZLxJ03kRogyT38X', '2016-06-18 12:37:02', '2016-07-03 06:58:49', '64009543', '3914255', '25C', 126, '', ''),
(129, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '26C', 127, '', ''),
(130, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '27C', 128, '', ''),
(131, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '28C', 129, '', ''),
(132, 'Ezequiel Rodriguez', 'ezequielr30@gmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'XCqZQj5RZU0ZZWsf45XbzVyXVkpxOQdP2oxFrY8Mn5bUUGGbRjyf8z9yVuBF', '2016-06-18 12:37:02', '2016-07-12 03:16:16', '66760148', '', '29C', 130, '', ''),
(133, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '30C', 131, '', ''),
(134, 'PATRICIA SIMMONS', 'patriciasimmons@gmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'rPIUJ2YiIiZaJK7RZH9ZAPsxJ9vFko8p83UgYARepfpC9q3aBfA48rEYe5To', '2016-06-18 12:37:02', '2016-07-05 21:17:46', '61553238', '3959865', '31C', 132, '', ''),
(135, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '32C', 133, '', ''),
(136, 'Luciano Manziniz', 'ljmanziniz@gmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'beyIssOIRcqYeJKB09agN2uR6ea5NzNEHlssp0nvhexfquScRGiWtt2Ihz8X', '2016-06-18 12:37:02', '2016-07-12 04:07:47', '62426626', '62426626', '33C', 134, '', ''),
(137, 'Christoforo Ferreira', 'christoforo_ferreira@hotmail.com', '$2y$10$OZ9j.6NsejSFGqtojkGcneSlyuhtULO0TwuT4k8JQ.s1oaJJN/Qu.', 0, 0, 'RbL9gPM8g1ct9XXPLdjifjhoDpN1yMBF7OuVYz9v8AhIMfjTVZXIWFd7FelK', '2016-06-18 12:37:02', '2016-07-11 18:30:23', '62533496', '', '34C', 135, '', ''),
(138, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '35C', 136, '', ''),
(139, 'Manuel Gerardo Cayon', 'mgcayon@gmail.com', '$2y$10$.syKdMNxjlFGhZrhT34vB.sqQ425qfPp/R0yhCsjQQrxWs606hxDG', 0, 0, 'iCMVuCY4deDbRwmvrOYJyfyJpe9gyzJcirqTbclnWOcxib3GSfYzh7s29plt', '2016-06-18 12:37:02', '2016-07-02 21:44:56', '66783955', '3939718', '36C', 137, '', ''),
(140, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '37C', 138, '', ''),
(141, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '38C', 139, '', ''),
(142, 'daniel de sousa', 'sgarrido54@hotmail.com', '$2y$10$YMINClYs2h9HODR95KBGhO2GMyZJR2NLls18JqDil28gOe0IgTgeG', 0, 0, '7SReqV6oL44OeTuWAeEIk0xWUGsV3X27tkQzHvuCNiRxhEj1hFHjunPHvVGJ', '2016-06-18 12:37:02', '2016-07-06 04:17:43', '64507746', '3962397', '39C', 140, '', ''),
(143, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '40C', 141, '', ''),
(144, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '41C', 142, '', ''),
(145, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '42C', 143, '', ''),
(146, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '43C', 144, '', ''),
(147, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '22C-1', 145, '', ''),
(148, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '1D', 146, '', ''),
(149, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '2D', 147, '', ''),
(150, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '3D', 148, '', ''),
(151, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '4D', 149, '', ''),
(152, 'Roberto Rodriguez Torres', 'rrodrigueztorres@me.com', '$2y$10$Mi53XPoaA9p4RmMJkRjrguAAkYCV1Cs1Svni25Ht1ryROlljaT76q', 0, 0, '0jJ2VD5k7n4UnuUUN6BkQmE9tb5yaJH0Sr5hNEDQ7lZmsMsKbQXDhxfuEIOT', '2016-06-18 12:37:02', '2016-07-05 23:14:37', '64303987', '3969807', '5D', 150, '', ''),
(153, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '6D', 151, '', ''),
(154, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '7D', 152, '', ''),
(155, 'Leyla Hormazabal', 'Leylitahs@hotmail.com', '$2y$10$uwrZNtLR9x3vXvoDdd1fcusTNToXxZliFuOP2BVHxR1fm4aUudEIW', 0, 0, 'denRb377aXzJub3ZBC5Jt4ZEcWGpDz0nDZPMFZ8OW0PvobXer9w0DRsR1sLu', '2016-06-18 12:37:02', '2016-07-04 05:55:08', '66127030', '3912099', '8D', 153, '', ''),
(156, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '9D', 154, '', ''),
(157, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '10D', 155, '', ''),
(158, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '11D', 156, '', ''),
(159, 'Xiomara Franco', 'Xiomarafranco@gmail.com', '$2y$10$dt4AtXN.aQ5qBbUd4x3PaOzSfso9/22etlLAjATL21t5X1sqjPUuG', 0, 0, 'RrNGJuumOkgkaTCMemj7vQ6NzLTHTeb0P0gJrsX6RCRXjaWdtHVUfhwSRTGs', '2016-06-18 12:37:02', '2016-07-02 22:49:19', '+50760925959', '+5073997776', '12D', 157, '', ''),
(160, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '13D', 158, '', ''),
(161, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '14D', 159, '', ''),
(162, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '15D', 160, '', ''),
(163, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '16D', 161, '', ''),
(164, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '17D', 162, '', ''),
(165, 'Raul Hurtado', 'rya.hurtado@gmail.com', '$2y$10$XpokOeJYCY2G3QalrMevYu.igivzEYTPm9X8sa1EfQGi6EbOlBgn6', 0, 0, 'i6OrGpIeMBl9K6O09xlyqU04joSFedSA0zqUsBJgbSFh28CrH2jOOYctQNeH', '2016-06-18 12:37:02', '2016-07-07 05:08:10', '+50769825440', '3449632', '18D', 163, '', ''),
(166, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '19D', 164, '', ''),
(167, 'm', 'marcostunon@cableonda.net', '$2y$10$rM6yYI.JfBtteiY4RIx.s.4G.hMGOHT94QQ8Lg9vTbTVejjqzhQfK', 0, 0, 'dUBiMnGgwsoC3CVvx5skq2i2RcAMAdvcNNZuOvoLGyOabYQlOWO1bSfvRCOX', '2016-06-18 12:37:02', '2016-07-03 04:37:22', '66751979', '3919374', '20D', 165, '', ''),
(168, '', '', '$2y$10$fpET/uBTNkT9DVb8HBdffOkHpF5IUA8vzmmOQK83f1B.i5.Up7/xu', 0, 0, 'eC1ac5KmC9xJBj1Z88ykzNjVihs4YC8zRacP5e3ARrIK6sGBTM7UEeQaMYgL', '2016-06-18 12:37:02', '2016-07-10 03:32:58', '', '', '21D', 166, '', ''),
(169, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '22D', 167, '', ''),
(170, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '23D', 168, '', ''),
(171, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '24D', 169, '', ''),
(172, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '25D', 170, '', ''),
(173, 'Kefret Koesling ', 'Kefretk@yahoo.con', '$2y$10$Pjiz.Azs6e6xQ/F04TLuZuSz.c0Gfsf1JtHRYAo/IRjl2.3YB8fI.', 0, 0, 'oB4ngAE3GWj0kR1A7xgJYwa5HOLQa9r1sJuOaSKHI1H3qNkXgx3imHUa5hhg', '2016-06-18 12:37:02', '2016-07-03 08:08:30', '62660575', '3930553', '26D', 171, '', ''),
(174, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '27D', 172, '', ''),
(175, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '28D', 173, '', ''),
(176, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '29D', 174, '', ''),
(177, 'Juan Carlos Siu o Norely de Siu', 'zursiu@yahoo.com', '$2y$10$3g2bMflGR2ZwPknZF8bXEe0HA4PXE1P4eeAhFYGsstNja95FxT8TK', 0, 0, 'ESQ1varXZQwvBEkF7C8nPh9Hom8Xg5e742wuIzS6hg5daVdxz7dnfJtb4I9P', '2016-06-18 12:37:02', '2016-07-05 03:16:09', '68363299', '3966174', '30D', 175, '', ''),
(178, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '31D', 176, '', ''),
(179, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '32D', 177, '', ''),
(180, ' jean- michel cascio  Vanessa Piña', 'jmcascio@tso.fr', '$2y$10$3cBlU3eudFr5oMTuOZJQkOHmhdy7RU.Nq3IRLXA2mn0kYRoTJiXbW', 0, 0, '4eibxipqY6Jc6gXd9ArS8EUvPKwrPMr3lwmJ2vqBu2CW6cOrydRTAKp0Ndi2', '2016-06-18 12:37:02', '2016-07-05 00:42:38', '69822406', '3980624', '33D', 178, '', ''),
(181, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '34D', 179, '', ''),
(182, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '35D', 180, '', ''),
(183, 'Carlos Ramirez', 'crramirez@gmail.com', '$2y$10$JZCCO2Mul7Ao5roWK03z5eGmzmVJaCqJpWKFLsgsjSx0RUI24gWgu', 0, 0, '2Jej3n3182ygN8sqkyXJGgsctLsRWGrAql5RnZZvvZ0YO9npvqzQQh9PH3QT', '2016-06-18 12:37:02', '2016-07-05 02:35:56', '62359670', '3972123', '36D', 181, '', ''),
(184, 'Gabriela Scorza Diaz', 'gscorza@hotmail.com', '$2y$10$NiHV9Kj8et3NOJ0HAdvGPuBISRL4hoQ2zSe4Wt9hwmbcQwnMbxDE2', 0, 0, 'QUiqkI3IG0yxeRyD5Bj1rwIj4x13M1ryka8wOW0yvMJm1UEMzrOtfSAMBwIl', '2016-06-18 12:37:02', '2016-07-04 03:06:02', '67477396', '3978439', '37D', 182, '', ''),
(185, 'Daniel Carpio', 'dicarpios@gmail.com', '$2y$10$nqq3T4hXK8PCbG0.gYtHMevJw4G6oc7OJyQUAhnRomgSd46eKVTg6', 0, 0, 'mJsQ9yjBwlsgSodFjwik3mwcAseqN6LM8dnR3XeBuqU2BS6IF8Zf152hQPJs', '2016-06-18 12:37:02', '2016-07-07 21:58:57', '66054949', '3981445', '38D', 183, '', ''),
(186, '', '', '$2y$10$vFtezdzcAjEQQjPpIBY3p.dEAnyN6bA7iXAew3VPeHYo09vdQNoVu', 0, 0, '3veUIrd22YRYlrztliqcOlDeMCba1V5v5RC34k5IGgM7vtutvdEm1Sydfrq5', '2016-06-18 12:37:02', '2016-07-02 21:18:19', '', '', '39D', 184, '', ''),
(187, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '40D', 185, '', ''),
(188, 'Carlos Santacruz', 'csantacruz@copaair.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'gx7OEsRouLbOjCItT8JK9UJaVy4gVeRRG2fzOYwVEqrAc5MDtz00QcfNdGQC', '2016-06-18 12:37:02', '2016-06-29 05:56:10', '50765809732', '5073042157', '41D', 186, '', ''),
(189, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '42D', 187, '', ''),
(190, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '43D', 188, '', ''),
(191, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '44D', 189, '', ''),
(192, 'Maria astrid ortega', 'Maria.astrid.ortega@gmail.com', '$2y$10$lL4F4ea0TFoCXNEmlUn7fegkG3cGTawC4z/Jlm7MGNx.xhAwMlgQy', 0, 0, 've2PuI8fpqlTQvWkcq6gjVO4Bqlcpoc8MoEeSYHBp4WEgFcPfsrSjDknfdh2', '2016-06-18 12:37:02', '2016-07-02 21:25:56', '64938841', '3961972', '45D', 190, '', ''),
(193, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '46D', 191, '', ''),
(194, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '47D', 192, '', ''),
(195, '', '', '$2y$10$C2U7VJRH8Oi6y6Ws5FEEJuh3Uhj4cJBFHb84HaXhZ9uKsjEdzGcwq', 0, 0, 'o94w02FSkVfBFKVjTihzGdC1KNr7IdK2uHFyTSucCoIrJwQ1PHGHIeK3cbu0', '2016-06-18 12:37:02', '2016-07-11 20:25:12', '', '', '48D', 193, '', ''),
(196, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '49D', 194, '', ''),
(197, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '50D', 195, '', ''),
(198, 'Manuel A. Barrios Valverde', 'mbarrios2964@gmail.com', '$2y$10$4qOAp0QjL069UHi/urKhoOTFFfZcPv2Nq0Krg7BTk4ERls.CscX7e', 0, 0, 'C77edm18awDVFHc80jKMjo3GsBiKdRRYytc0BOqssPpl7PdSaSu5HVEeyGus', '2016-06-18 12:37:02', '2016-06-29 06:01:11', '68986282', '', '51D', 196, '', ''),
(199, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '52D', 197, '', ''),
(200, 'LIGIA MARIN', 'liromaida@gmail.com', '$2y$10$ALys92tWXGDIAQCIqTJbZOK53e4UtMWsTrz/c3rFun/vUewfwNDGi', 0, 0, 'tEbtO991kqyBq3tg3u2lmj8wUE9uBg4PZR8i0xwabHPtK9t6XadEJMMZ8XNx', '2016-06-18 12:37:02', '2016-07-05 06:24:33', '66764162', '3951922', '53D', 198, '', ''),
(201, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '54D', 199, '', ''),
(202, 'Diana Alas', 'diana.alas@pa.sabmiller.com', '$2y$10$FrmzKmJdILpNzOecnCyFaOVnEtEigDv61CDZXEx63/YmBe4Kh5fmO', 0, 0, 'Zjbd4uQXMGdlWgZ40TMGXXPy1CsMo0Eq9engf6ZQOMUTyVAAEvwlJNcVWWi0', '2016-06-18 12:37:02', '2016-07-02 22:42:51', '64807437', '', '55D', 200, '', ''),
(203, 'Michael Foreman', 'angiebern@gmail.com', '$2y$10$aH9K6URrWsgFEdVMCj/4Nu7vRUqIhCdEwngdvLEqEm/OvajPkepx2', 0, 0, '6BL4zfABgTugtWX1A1QFu8IToZO4LFu2DCEAtKLZadsweN1qzCmOh31Yj83y', '2016-06-18 12:37:02', '2016-07-13 06:25:40', '67406492', '', '56D', 201, '', ''),
(204, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '57D', 202, '', ''),
(205, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '58D', 203, '', ''),
(206, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '59D', 204, '', ''),
(207, '', '', '$2y$10$HtpMAKNaROH4CUWcgZNGh.nT7teThfmN8rrn5dBkJSUUjiKEv7vNW', 0, 0, 'cyjeHOJ6k7rDgRq00ebhq3oUrTbFC10fXJLMd3dBaxg0xdzwG86WAVIsOv0M', '2016-06-18 12:37:02', '2016-07-05 01:42:56', '', '', '60D', 205, '', ''),
(208, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '61D', 206, '', ''),
(209, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '62D', 207, '', ''),
(210, 'Virginia Torres ', 'vdtgdp@hotmail.com', '$2y$10$U9LoiCLBhDhMbS7kie5lAOxPZKq0kzXbt.VS5CldfXxnpc..NEsZG', 0, 0, 'eG8wYCcvitKEsjVKwSi0SLyrq3fS0FYJL2SLplEaVOMMFQ0pasrKGww6P0t4', '2016-06-18 12:37:02', '2016-07-11 22:22:35', '67805096', '3995977', '63D', 208, '', ''),
(211, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '64D', 209, '', ''),
(212, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '65D', 210, '', ''),
(213, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '66D', 211, '', ''),
(214, 'Oneida Rodriguez', 'oneroca@yahoo.com', '$2y$10$PcdKQihPLbXXMKWeUAgY4.lQa5H1H2DkzaOexVmgDt1XixL74sA8y', 0, 0, 'huAqcROCaazXpEYHWWB5DokiXNoeCcavVkvZEYnc0bn0IYPJDyArx3O8AQz4', '2016-06-18 12:37:02', '2016-07-08 23:02:24', '6676-8747', '209-9137', '67D', 212, '', ''),
(215, 'JUAN Y LAURA DELLA TOGNA', 'Laura@adriaticpanama.com', '$2y$10$F4lLP759DpRRlNX7AVVUQuQRXsI9ZrJnWUUbY8p4dSZNWUy/.azOO', 0, 0, 'KGQkh4RYTs4CFUjt6ljrbspxfWPu4zMNSNaw3X997r9l53rJnwHfFgEGcXRP', '2016-06-18 12:37:02', '2016-07-03 18:30:40', '66153440', '3996066', '1E', 213, '', ''),
(216, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '2E', 214, '', ''),
(217, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '3E', 215, '', ''),
(218, 'Carlos Baquero', 'cbaquero@bhsolutionz.com', '$2y$10$NF67fgwAUkE69IXin/E/oOfDLPZfhHj5yvfvCDoToTlVDc1LVekmi', 0, 0, 'emogTtstepIhZwJrfJdqS7E8kHxGazhCEL8iHULdtz0SuA8EpKufX3RkR4Qk', '2016-06-18 12:37:02', '2016-07-03 03:25:54', '6378-2220', '398-9648', '4E', 216, '', ''),
(219, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '5E', 217, '', ''),
(220, 'Carolina Fernandez', 'Carolfernandez_1@hotmail.com', '$2y$10$e5Wy5pJtTGJRV5wIgxtxe.OFzvlQCNV0m2uMIeEYGV2qjeyn7yUm6', 0, 0, '4cTFuaqewOeQtkGCOth4h4tjy0n5bijVQsjNA2dQ5wOcGUtGUytlPE5cjkBW', '2016-06-18 12:37:02', '2016-07-11 17:45:21', '0051 993252224', '000000000', '6E', 218, '', ''),
(221, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '7E', 219, '', ''),
(222, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '8E', 220, '', ''),
(223, 'Tania Baquero', 'tania.baquero@gmail.com', '$2y$10$KcXb/KNOmjiWA7S7UvXX.OSgFx.5sy5ZoExDIDLjnMP0b9HCAPRdW', 0, 0, '09mKs1zAgFmqD1Qdt6DHTGj06siOK6ZazwaJEAWMiLq2XfhWtpffOSjS1Joq', '2016-06-18 12:37:02', '2016-07-02 22:05:38', '+50766766906', '+50766766906', '9E', 221, '', ''),
(224, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '10E', 222, '', ''),
(225, 'JENY SANCHEZ', 'jenny.sanchezarenas@gmail.com', '$2y$10$X8ob112awD1lIFVm491.8uWqWKjsQjl5iY.fo43C8knPUbgcc5WNO', 0, 0, 'Pyj0Zi6TIAjhpHi2fxgizhHoJhtT6qcTR2cftz59IjmbloS42JcNQ1eqUmVz', '2016-06-18 12:37:02', '2016-07-03 00:00:31', '69185353', '3955280 / 3955948', '11E', 223, '', ''),
(226, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '12E', 224, '', ''),
(227, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '13E', 225, '', ''),
(228, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '14E', 226, '', ''),
(229, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '15E', 227, '', ''),
(230, 'Maria Gabriela  Chacon', 'mariagabrielachacon@gmail.com', '$2y$10$m7lfP043QAh.H/yUy7OBAu9CKhgRAxhiC9g6HS3g7cqmhzuh0vYhm', 0, 0, 'u0zpgMCyzLz9bb3UOaBI6L4xHyLCV1iAC4lqlBKCAj37wiScJnULHQtUPh4W', '2016-06-18 12:37:02', '2016-07-05 02:27:13', '64005180', '3944180', '16E', 228, '', ''),
(231, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '17E', 229, '', ''),
(232, 'Susana Garcia', 'ccpsusana@gmail.com', '$2y$10$QEOwBnxqXW6GkVxXqWIIoeLAwR9oOPrUkXkNQjGi/dquzQ0ySy3p.', 0, 0, 'nspklDS6g1Xh7EliyVyvh9aNM88UqtcoJ8fdWoIB4OAW1AslHFQSwVJZ9BpT', '2016-06-18 12:37:02', '2016-07-06 21:42:39', '69304015', '8310813', '18E', 230, '', ''),
(233, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, '7TfhvhvWt277JYTMhCjlDvgPoP25atxBFT0SWelRpougq7PdMxQCWtEsku3F', '2016-06-18 12:37:02', '2016-07-04 19:26:20', '', '', '19E', 231, '', ''),
(234, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '20E', 232, '', ''),
(235, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '21E', 233, '', ''),
(236, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '22E', 234, '', ''),
(237, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '23E', 235, '', ''),
(238, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '24E', 236, '', ''),
(239, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '25E', 237, '', ''),
(240, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '26E', 238, '', ''),
(241, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '27E', 239, '', ''),
(242, 'Vincenzo Arancio', 'enzoarancio@hotmail.com', '$2y$10$N6.Blu0Uj7xCgUG7XX.hBeSNEF6xlfByw9JmohvH2V7cUL9Vz5RES', 0, 0, 'ceWiq0bbHRU1X1qLjM8mGEehUs2kRm6punFzxHUOTcsgxnak5iok1siBOYo8', '2016-06-18 12:37:02', '2016-07-02 22:59:38', '64254044', '64254044', '28E', 240, '', ''),
(243, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '29E', 241, '', ''),
(244, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '30E', 242, '', ''),
(245, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '31E', 243, '', ''),
(246, 'Patricia Quinteros', 'patri_uy@yahoo.com', '$2y$10$rLfiZD7jGmKXYE0YEXjoq.PS1bDqFQQWXeZYjRR8wzwB7ds29CmO6', 0, 0, 'TDI5rdGonFl3ItmBGxf8YtKm4Z3D2CjzDyDd8ErUTxQpKXVn6btUWR3Ys75s', '2016-06-18 12:37:02', '2016-07-04 02:30:37', '69489584', '3976707', '32E', 244, '', ''),
(247, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '33E', 245, '', ''),
(248, 'Manuel Patiño ', 'Cpbarcenas@gmail.com', '$2y$10$eMBHe0rlr27lnh7D4Tf4z.4d.Jqjsx8xvHvwvhRgGmuu5efQMnppO', 0, 0, 'lDFAzxVDaDDxT4bbDGGxVBobTMLvenjrAipSMWbKvKL8FIjbuC3pW5VUiN2G', '2016-06-18 12:37:02', '2016-07-04 23:51:38', '66714511 ', '2031068', '34E', 246, '', ''),
(249, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '35E', 247, '', ''),
(250, '', '', '$2y$10$9ZbNmFHGgOgUn8eneQu8VeZtiCZO/oS0JLJMrxzr9gQ4N99uX643i', 0, 0, 'Dc8V0zlddZsO1niGd9Q76eM903P6nkA5l1WnpLTRkOV4Li3XtgBFiLBHKHWx', '2016-06-18 12:37:02', '2016-07-02 23:16:49', '', '', '36E', 248, '', ''),
(251, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '37E', 249, '', ''),
(252, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '38E', 250, '', ''),
(253, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '39E', 251, '', '');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `inquilino`, `id_role`, `remember_token`, `created_at`, `updated_at`, `mobilenumber`, `phonenumber`, `homenumber`, `cod_lote`, `emailalt_1`, `emailalt_2`) VALUES
(254, 'Pedro Melo', 'pedro.melo@ericsson.com', '$2y$10$MSap6B/udnFB6VBYwZfWWu.25ymDHSsadXJPD8HLBsZj6U6zdE6Gi', 0, 0, 'UDnmZzQGhAaC7sZg0ZEsHa7lcfnsxIq76QiAXfoom595loItzhEf8I86118K', '2016-06-18 12:37:02', '2016-07-04 21:47:35', '64008559', '3981843', '40E', 252, '', ''),
(255, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '41E', 253, '', ''),
(256, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '42E', 254, '', ''),
(257, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '43E', 255, '', ''),
(258, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '44E', 256, '', ''),
(259, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '45E', 257, '', ''),
(260, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '46E', 258, '', ''),
(261, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '47E', 259, '', ''),
(262, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '48E', 260, '', ''),
(263, 'LUIS FERNANDO GONZÁLEZ RODRÍGUEZ ', 'yanira_00@yahoo.com', '$2y$10$xGEO8QgRECTr5rbwUS67gu5mRUq0PimqqEW7P6actIWa.0pBFn0iu', 0, 0, 'FwpYDo84CUpSjayS9CQaVd7l8FNJiZA91z6IuKxfZCzaPW7cGqX9kWemge0h', '2016-06-18 12:37:02', '2016-07-09 02:47:06', '61530262', '3973357', '49E', 261, '', ''),
(264, 'Antonio Rivas', 'angelagarces75@hotmail.com', '$2y$10$/AbG/Ji2ZnyDmREZ5fPFSe3Mk/bq7Gfy.803Bi9CQ5vop8E7DsVpy', 0, 0, 'BcfjC5i4gc35X2cR9UP30JJJEuoR5lQqxuIyd1SfvPfhlnaFFyWAqb9nJgPe', '2016-06-18 12:37:02', '2016-07-05 04:47:32', '64002696 / 64002697', '3903672', '50E', 262, '', ''),
(265, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '51E', 263, '', ''),
(266, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '52E', 264, '', ''),
(267, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '53E', 265, '', ''),
(268, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '24E-1', 266, '', ''),
(269, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '25E-1', 267, '', ''),
(270, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '1F', 268, '', ''),
(271, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '2F', 269, '', ''),
(272, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '3F', 270, '', ''),
(273, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '4F', 271, '', ''),
(274, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '5F', 272, '', ''),
(275, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '6F', 273, '', ''),
(276, 'MARIA EUGENIA GUTIERREZ ALCEDO', 'megapsiq@gmail.com', '$2y$10$8lDCS3igEDd6bQ2/QObjm.Y9aq/Q9J3F7mOpyMBEJn2HXqjgoZaNG', 0, 0, 'DRvkohbnzyKWX8ZYl315yTLJQPfFYzEa2enAuotho8yGhmJj6thhRgznYosO', '2016-06-18 12:37:02', '2016-07-03 03:26:29', '60905177', '2031530', '7F', 274, '', ''),
(277, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '8F', 275, '', ''),
(278, 'Edith de Castro', 'edithcastro2105@gmail.com', '$2y$10$Ql2yTw2piPfYcTdgOcrLcOb6Wv1puzfKfhKePuKlaEKbXSuXTriGu', 0, 0, NULL, '2016-06-18 12:37:02', '2016-07-02 20:29:22', '67183728', '2031787', '9F', 276, '', ''),
(279, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '10F', 277, '', ''),
(280, ' Olga Ferreira ', 'olgafda@gmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'PWTbnkO81DQ7RB1iHQWeYGF7rbycETagoXkWMQ6ArchiO7Iu65grFDVsVTf8', '2016-06-18 12:37:02', '2016-06-30 02:09:30', ' 64300062', '2037026', '11F', 278, '', ''),
(281, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '12F', 279, '', ''),
(282, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '13F', 280, '', ''),
(283, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '14F', 281, '', ''),
(284, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '15F', 282, '', ''),
(285, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '16F', 283, '', ''),
(286, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '17F', 284, '', ''),
(287, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '18F', 285, '', ''),
(288, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '19F', 286, '', ''),
(289, 'Ingrid Coseth Ibarra', 'ingrid.ibarra@roche.com', '$2y$10$giqaRtKsPQJkS5IOexf0m.2eSAkYnFN0kWzLyKIJDLJNQh9A7mY4a', 0, 0, 'pxNOSKy8B1xjtT1SXcuxH6okqrITpb12pFW1sBauZwXiMXsbvTzyP3Bn85b8', '2016-06-18 12:37:02', '2016-07-09 03:31:32', '64806198', '3913090', '20F', 287, '', ''),
(290, 'Cristina Jaramillo', 'Cristyjllo@hotmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'i35GUtm4wxmWbOiYRqBvxCmBDw9fITYsXvlFKUbSvYf6SWgXkgiHdLjmLpFJ', '2016-06-18 12:37:02', '2016-07-09 23:21:34', '62275652', '3940180', '21F', 288, '', ''),
(291, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '22F', 289, '', ''),
(292, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '23F', 290, '', ''),
(293, 'Guiomar Sanchez de Bendelac', 'gsc1414gaia@gmail.com', '$2y$10$3vXhy29RFMUdDGFmBwMmI.7k3BYB.n79tB2qWleQVX8EKmCHqhbBC', 0, 0, 'ta6HAdGoAmr7q7nLKlNhFaOStkbxpXxmGe6PJHSGFihiAA22yalHJmben7qY', '2016-06-18 12:37:02', '2016-07-06 07:09:22', '64929520', '', '24F', 291, '', ''),
(294, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '25F', 292, '', ''),
(295, 'Alejandro Martinez', 'alexmtzo@hotmail.com', '$2y$10$JkjO/zR0.AKMSSUoFB29e.fKT0Tv7piaQ1zMnCMHEWls4b5TW1hp6', 0, 0, '1UlfIco2m45gmtbfabA9N7hsxQd4Mmqyz8HMRgX7FqseoezDfn9CkXgM0sC6', '2016-06-18 12:37:02', '2016-07-03 02:17:32', '66723275', '3989527', '26F', 293, '', ''),
(296, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '27F', 294, '', ''),
(297, 'Luis Belgoderi', 'luis.belgoderi@gmail.com', '$2y$10$4aBx6WaEHjCJITL/8IFFZ.akhIZXtcQclxVp8Xws/qFuv5gG.zX1C', 0, 0, '3VQjcFu8daqusxKNPGoOkrN1cSQdgr2rJMTaeaWzuUKPGEG48JGEGfBRy0Yd', '2016-06-18 12:37:02', '2016-07-02 21:51:36', '61508977', '3017537', '28F', 295, '', ''),
(298, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '29F', 296, '', ''),
(299, 'José Concepción ', 'jconcepcion08@hotmail.com', '$2y$10$NqHnsvCwQ.wzJfcK9jkFReH.Za5CZWo6TDn/DTCrgZGbGQ7BB173u', 0, 0, '6N6rbA2Zry7mzvx0d1Lc9VaASAa99cOVGtUGOV0zn8Qq6t3KjMbfPpk6eIgh', '2016-06-18 12:37:02', '2016-07-03 05:03:06', '69421694', '', '30F', 297, '', ''),
(300, '', '', '$2y$10$8kLfUfJb60bjTpdR5ZjEy.nmiC1zZonvnkS5rT3xSqmjqFvFH25sK', 0, 0, '3JUQvHU9oi9AMebxqBUsd1f0NRW7wLIOdLu3JK3cm7XTOXjCvKb9qPY3KR1Z', '2016-06-18 12:37:02', '2016-07-04 20:42:09', '', '', '31F', 298, '', ''),
(301, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'Nq7Ig0uDbIal9cVaiFHVvGZQdWdxjRnlhzEBRS0SMD154Bql1U9ncsTjwFN6', '2016-06-18 12:37:02', '2016-07-03 18:57:40', '', '', '32F', 299, '', ''),
(302, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '33F', 300, '', ''),
(303, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '34F', 301, '', ''),
(304, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '35F', 302, '', ''),
(305, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '36F', 303, '', ''),
(306, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '37F', 304, '', ''),
(307, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '38F', 305, '', ''),
(308, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '39F', 306, '', ''),
(309, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '40F', 307, '', ''),
(310, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '41F', 308, '', ''),
(311, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '42F', 309, '', ''),
(312, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '43F', 310, '', ''),
(313, 'emilia siniscalchi', 'maestra_emi31@hotmail.com', '$2y$10$dOja1F7c8g8GyJki1GmosupLWlVB2dkVuNMFyrFdUJBjzLAnnPa9e', 0, 0, '4OntyjK1w8cJx7H2wlEJUIo3moW3d2b8KFI8Swh3SbPcjW6rkMfafqU2fh53', '2016-06-18 12:37:02', '2016-07-05 23:37:07', '69604305', '2096376', '44F', 311, '', ''),
(314, 'JEAN PAUL VAN DEN BRANDE', 'ZULETRAMIREZ@GMAIL.COM', '$2y$10$.ZyITZn1uVsjGlkqeW5Q1.iUozr5woFW8dCtcP6QMWai1pO2EmKjK', 0, 0, 'aV8WlI2fSzU8gmJvkcjOKHKvWlmW4Nsi3yakc1zFnn1oIbnLc0oS0A12zNYM', '2016-06-18 12:37:02', '2016-07-02 03:36:25', '67817177', '3985824', '45F', 312, '', ''),
(315, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '46F', 313, '', ''),
(316, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '47F', 314, '', ''),
(317, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '48F', 315, '', ''),
(318, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '49F', 316, '', ''),
(319, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '50F', 317, '', ''),
(320, 'Herty Mayorga', 'hertymayorga@hotmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'JxSpap31tUHBh8P0xLXpuSR5GfEak7EgprbsGKJKS83ye1CFO1py7eBxwYGe', '2016-06-18 12:37:02', '2016-07-05 05:05:36', '68661819', '3967657', '51F', 318, '', ''),
(321, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '52F', 319, '', ''),
(322, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '53F', 320, '', ''),
(323, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '54F', 321, '', ''),
(324, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '55F', 322, '', ''),
(325, 'David Romero Levy', 'davidromerolevy@yahoo.com', '$2y$10$o5QnWu4dIZHwDajaBjZXC.Yup7MwuNE8fFxNTPaCm7.TTD5K9DEcm', 0, 0, 'icvJfH9aA1xrVp4QVc8X1nUJ2674fbAnBrFFILv0SUFPynCDosZ136QNrURu', '2016-06-18 12:37:02', '2016-07-09 08:45:25', '65502021', '3947269', '56F', 323, '', ''),
(326, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '57F', 324, '', ''),
(327, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, NULL, '2016-06-18 12:37:02', '2016-06-27 15:41:04', '', '', '58F', 325, '', ''),
(328, 'Prueba', 'prueba@gmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 0, 0, 'P394F5N08H2sZ8NOhkyNrTmilpwv7j4fD9ioxrBAwpFEed77KQvSl6e9LHJJ', '2016-06-18 12:37:02', '2016-07-12 05:08:23', '', '', 'prueba', 0, '', ''),
(329, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, 'xRb967xxbOXeJwcM43Ds2H6xqHRCx0mpoBNZWNe4QG6vFAjVTy9bFmJ934sT', '2016-06-18 12:37:02', '2016-07-01 19:10:44', '', '', '33Ci', 134, '', ''),
(330, 'Ricardo McNeil Quiroz', 'rmcneilq@gmail.com', '$2y$10$j8TFJjJoGQUIf2JFKi0.p.iA3B2tIM7EjJqsKKDMofXucv/bV8.du', 1, 0, 'fRXnyQE9NrWyuCHBnsu2LXOb0Rj6B9CQffIziDqBaooj1xmOz7P3Kc9OVMzB', '2016-06-18 17:37:02', '2016-07-03 21:55:50', '66704507', '3938378', '1A', 1, '', ''),
(331, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '2Ai', 2, '', ''),
(332, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '3Ai', 3, '', ''),
(333, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '4Ai', 4, '', ''),
(334, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '5Ai', 5, '', ''),
(335, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '6Ai', 6, '', ''),
(336, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '7Ai', 7, '', ''),
(337, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '8Ai', 8, '', ''),
(338, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '9Ai', 9, '', ''),
(339, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '10Ai', 10, '', ''),
(340, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '11Ai', 11, '', ''),
(341, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '12Ai', 12, '', ''),
(342, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '13Ai', 13, '', ''),
(343, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '14Ai', 14, '', ''),
(344, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '15Ai', 15, '', ''),
(345, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '16Ai', 16, '', ''),
(346, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '17Ai', 17, '', ''),
(347, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '18Ai', 18, '', ''),
(348, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '19Ai', 19, '', ''),
(349, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '20Ai', 20, '', ''),
(350, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '21Ai', 21, '', ''),
(351, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '22Ai', 22, '', ''),
(352, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '23Ai', 23, '', ''),
(353, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '24Ai', 24, '', ''),
(354, 'Jennifer Segura', 'jennisegar@gmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, 'bDmPE8JHgXmjAWfdD5nUQGmO53A8cIcet3YCj1TVAlOV0idHdJln8JlvjW0X', '2016-06-18 17:37:02', '2016-07-03 00:29:44', '62766356', '62625161', '25A', 25, '', ''),
(355, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '26Ai', 26, '', ''),
(356, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '27Ai', 27, '', ''),
(357, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '28Ai', 28, '', ''),
(358, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '29Ai', 29, '', ''),
(359, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '30Ai', 30, '', ''),
(360, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '31Ai', 31, '', ''),
(361, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '32Ai', 32, '', ''),
(362, '', '', '$2y$10$VG15gP0IVUa2/DdkXmBf7.o2lXJkeH/nakTAYm6e3bQjqx7soDYM6', 1, 0, 'wjHGqFUWGJqdlIP9nCb3FGkdLSrLdiTOue7qA1zNYnEfpMyLI5vnBJy6NXRn', '2016-06-18 17:37:02', '2016-07-09 04:46:31', '', '', '33Ai', 33, '', ''),
(363, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '34Ai', 34, '', ''),
(364, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '35Ai', 35, '', ''),
(365, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '36Ai', 36, '', ''),
(366, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '37Ai', 37, '', ''),
(367, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '38Ai', 38, '', ''),
(368, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '39Ai', 39, '', ''),
(369, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '40Ai', 40, '', ''),
(370, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '41Ai', 41, '', ''),
(371, 'Francesca Augello', '7fas771@gmail.com', '$2y$10$JMGR4lBrHFcv.vzU2kBqxu3tn93nBx.8b3PXjcnpNojQMGxEbg1Ma', 1, 0, '9X0vkEVf5caZYp5Au5iz4sUb9EvMmBPAM6AlcGrVugDlNTlC2blUDXSWEqHO', '2016-06-18 17:37:02', '2016-07-03 01:12:38', '69148748', '65341003', '42A', 42, '', ''),
(372, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '43Ai', 43, '', ''),
(373, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '44Ai', 44, '', ''),
(374, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '45Ai', 45, '', ''),
(375, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '46Ai', 46, '', ''),
(376, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '47Ai', 47, '', ''),
(377, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '48Ai', 48, '', ''),
(378, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '49Ai', 49, '', ''),
(379, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '19A-1i', 50, '', ''),
(380, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '1Bi', 51, '', ''),
(381, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '2Bi', 52, '', ''),
(382, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '3Bi', 53, '', ''),
(383, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '4Bi', 54, '', ''),
(384, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '5Bi', 55, '', ''),
(385, 'Noemi freitas', 'nifs2677@gmail.com', '$2y$10$CGpLQWExES7sn3j9hdR7x.qqE5svvOEVu4zXcoLumHQLOFZk6vKU2', 1, 0, '4sdt7w72uRdS7CyfsuENedJBHJTNXeKbUaue1dJ4F0InxF95i3RZi2n5x8aH', '2016-06-18 17:37:02', '2016-07-09 04:47:40', '62492621', '3941814', '6B', 56, '', ''),
(386, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '7Bi', 57, '', ''),
(387, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '8Bi', 58, '', ''),
(388, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '9Bi', 59, '', ''),
(389, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '10Bi', 60, '', ''),
(390, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '11Bi', 61, '', ''),
(391, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '12Bi', 62, '', ''),
(392, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '13Bi', 63, '', ''),
(393, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '14Bi', 64, '', ''),
(394, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '15Bi', 65, '', ''),
(395, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '16Bi', 66, '', ''),
(396, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '17Bi', 67, '', ''),
(397, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '18Bi', 68, '', ''),
(398, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '19Bi', 69, '', ''),
(399, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '20Bi', 70, '', ''),
(400, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '21Bi', 71, '', ''),
(401, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '22Bi', 72, '', ''),
(402, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '23Bi', 73, '', ''),
(403, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '24Bi', 74, '', ''),
(404, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '25Bi', 75, '', ''),
(405, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '26Bi', 76, '', ''),
(406, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '27Bi', 77, '', ''),
(407, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '28Bi', 78, '', ''),
(408, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '29Bi', 79, '', ''),
(409, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '30Bi', 80, '', ''),
(410, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '31Bi', 81, '', ''),
(411, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '32Bi', 82, '', ''),
(412, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '33Bi', 83, '', ''),
(413, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '34Bi', 84, '', ''),
(414, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '35Bi', 85, '', ''),
(415, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '36Bi', 86, '', ''),
(416, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '37Bi', 87, '', ''),
(417, 'julio rodriguez', 'jcrodriguez@cableonda.net', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, 'fOblenJvBFrx0v5RVtgrNEpghkEtCBMwcSto2vKy3C0DdMmMI5nhLROu4kG9', '2016-06-18 17:37:02', '2016-07-02 23:55:51', '67466505', '3922753', '38B', 88, '', ''),
(418, 'Maria Gabriela Arias', 'lala_mg@hotmail.com', '$2y$10$mY5tvsXmaWkTLZ.HVpoT6O/3uUUCJDfBRjXscv8yDMqV8aJ.fmVxy', 1, 0, 'ahRfqty5RZviuAI1Pz5nU4CvbdvQQyG4t0P0UaFb0LoVmwIV4dWhs8StgWCm', '2016-06-18 17:37:02', '2016-07-03 17:19:43', '65624661', '3933676', '39B', 89, '', ''),
(419, 'Emiliano Pizzasegola', 'Epizzasegola@yahoo.com', '$2y$10$67QkyKOK6tpeZ157KYpuGuFd8jHTVPjf09D6n1qFGNiVpR81dHtxO', 1, 0, 'av5wp74Hs9kGwZyoTKdwgU5QTMRfChyVc2FhHWIF0GKnEZ4RnXrdhoLonZzR', '2016-06-18 17:37:02', '2016-07-10 04:52:14', '67144241', '3877298', '40B', 90, '', ''),
(420, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '41Bi', 91, '', ''),
(421, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '42Bi', 92, '', ''),
(422, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '43Bi', 93, '', ''),
(423, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '44Bi', 94, '', ''),
(424, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '45Bi', 95, '', ''),
(425, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '46Bi', 96, '', ''),
(426, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '47Bi', 97, '', ''),
(427, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '48Bi', 98, '', ''),
(428, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '49Bi', 99, '', ''),
(429, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '50Bi', 100, '', ''),
(430, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '51Bi', 101, '', ''),
(431, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '1Ci', 102, '', ''),
(432, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '2Ci', 103, '', ''),
(433, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '3Ci', 104, '', ''),
(434, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '4Ci', 105, '', ''),
(435, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '5Ci', 106, '', ''),
(436, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '6Ci', 107, '', ''),
(437, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '7Ci', 108, '', ''),
(438, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '8Ci', 109, '', ''),
(439, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '9Ci', 110, '', ''),
(440, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '10Ci', 111, '', ''),
(441, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '11Ci', 112, '', ''),
(442, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '12Ci', 113, '', ''),
(443, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '13Ci', 114, '', ''),
(444, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '14Ci', 115, '', ''),
(445, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '15Ci', 116, '', ''),
(446, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '16Ci', 117, '', ''),
(447, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '17Ci', 118, '', ''),
(448, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '18Ci', 119, '', ''),
(449, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '19Ci', 120, '', ''),
(450, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '20Ci', 121, '', ''),
(451, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '21Ci', 122, '', ''),
(452, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '22Ci', 123, '', ''),
(453, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '23Ci', 124, '', ''),
(454, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '24Ci', 125, '', ''),
(455, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '25Ci', 126, '', ''),
(456, 'JO ALICE TROCONIS DE SANCHEZ', 'fas113013@yahoo.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, '4zQhE6lv3oEMd5CIfNpnkyaDbgAVsLy4FS194CrtB6v9zmm0WQHtJ0v1a8xs', '2016-06-18 17:37:02', '2016-07-09 03:24:28', '', '3882780    65935304', '26C', 127, '', ''),
(457, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '27Ci', 128, '', ''),
(458, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '28Ci', 129, '', ''),
(459, 'Ezequiel Rodriguez Flores', 'brisiader@gmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, 'elfDHfV9I3tX6cg7ecri8atgquNtsylLkOnbtpf04p3EESeF3vlpAyoXr1XI', '2016-06-18 17:37:02', '2016-07-12 01:14:59', '6676-0148', '6781-4186', '29C', 130, '', ''),
(460, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '30Ci', 131, '', ''),
(461, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '31Ci', 132, '', ''),
(462, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '32Ci', 133, '', ''),
(463, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '34Ci', 135, '', ''),
(464, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '35Ci', 136, '', ''),
(465, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '36Ci', 137, '', ''),
(466, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '37Ci', 138, '', ''),
(467, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '38Ci', 139, '', ''),
(468, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '39Ci', 140, '', ''),
(469, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '40Ci', 141, '', ''),
(470, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '41Ci', 142, '', ''),
(471, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '42Ci', 143, '', ''),
(472, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '43Ci', 144, '', ''),
(473, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '22C-1i', 145, '', ''),
(474, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '1Di', 146, '', ''),
(475, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '2Di', 147, '', ''),
(476, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '3Di', 148, '', ''),
(477, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '4Di', 149, '', ''),
(478, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '5Di', 150, '', ''),
(479, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '6Di', 151, '', ''),
(480, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '7Di', 152, '', ''),
(481, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '8Di', 153, '', ''),
(482, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '9Di', 154, '', ''),
(483, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '10Di', 155, '', ''),
(484, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '11Di', 156, '', ''),
(485, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '12Di', 157, '', ''),
(486, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '13Di', 158, '', ''),
(487, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '14Di', 159, '', ''),
(488, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '15Di', 160, '', ''),
(489, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '16Di', 161, '', ''),
(490, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '17Di', 162, '', ''),
(491, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '18Di', 163, '', ''),
(492, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '19Di', 164, '', ''),
(493, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '20Di', 165, '', ''),
(494, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '21Di', 166, '', ''),
(495, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '22Di', 167, '', ''),
(496, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '23Di', 168, '', ''),
(497, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '24Di', 169, '', ''),
(498, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '25Di', 170, '', ''),
(499, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '26Di', 171, '', ''),
(500, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '27Di', 172, '', ''),
(501, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '28Di', 173, '', ''),
(502, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '29Di', 174, '', ''),
(503, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '30Di', 175, '', ''),
(504, 'ALEJANDRO RAMIREZ RAMIREZ', 'RAMIREZALEJO@GMAIL.COM', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, 'kmVXUziXW4hQHiZME52GI6SBFxZLlBPZa9mbBHjo9QU59UzMZxEyh0OsyKCe', '2016-06-18 17:37:02', '2016-07-05 20:28:42', '67802480', '3961019', '31D', 176, '', ''),
(505, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '32Di', 177, '', ''),
(506, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '33Di', 178, '', ''),
(507, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '34Di', 179, '', ''),
(508, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '35Di', 180, '', ''),
(509, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '36Di', 181, '', ''),
(510, 'Gabriela Scorza Diaz', 'gscorza@hotmail.com', '$2y$10$OjNyQWRovsRs92jWzkEeT.G3jzD.SEETekzVYqF8GZDZg.WFOKWEm', 1, 0, '43PS5SZC2Q9QEraf7ZKUYeoHJH5TvZD9vweiL9DJHC4TlZWagW5vDO6MCVsb', '2016-06-18 17:37:02', '2016-07-04 03:00:46', '67477396', '3978439', '37D', 182, '', ''),
(511, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '38Di', 183, '', ''),
(512, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '39Di', 184, '', ''),
(513, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '40Di', 185, '', ''),
(514, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '41Di', 186, '', ''),
(515, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '42Di', 187, '', ''),
(516, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '43Di', 188, '', ''),
(517, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '44Di', 189, '', ''),
(518, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '45Di', 190, '', ''),
(519, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '46Di', 191, '', ''),
(520, '', '', '$2y$10$hGkzfBcQABexq2OrhRG/vuDCFkC./M/GCzOOOhtzLD/T50tp7HEji', 1, 0, 'KXl9SMEyLSAJh8iCHMCoAyNEzkg0xbNRI3r2Y9wuUR9Cb6SPr8c86zd6vmGP', '2016-06-18 17:37:02', '2016-07-06 19:37:53', '', '', '47Di', 192, '', ''),
(521, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '48Di', 193, '', ''),
(522, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '49Di', 194, '', ''),
(523, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '50Di', 195, '', ''),
(524, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '51Di', 196, '', ''),
(525, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '52Di', 197, '', ''),
(526, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '53Di', 198, '', ''),
(527, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '54Di', 199, '', ''),
(528, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '55Di', 200, '', ''),
(529, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '56Di', 201, '', ''),
(530, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '57Di', 202, '', ''),
(531, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '58Di', 203, '', ''),
(532, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '59Di', 204, '', ''),
(533, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '60Di', 205, '', ''),
(534, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '61Di', 206, '', ''),
(535, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '62Di', 207, '', ''),
(536, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '63Di', 208, '', ''),
(537, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '64Di', 209, '', '');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `inquilino`, `id_role`, `remember_token`, `created_at`, `updated_at`, `mobilenumber`, `phonenumber`, `homenumber`, `cod_lote`, `emailalt_1`, `emailalt_2`) VALUES
(538, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '65Di', 210, '', ''),
(539, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '66Di', 211, '', ''),
(540, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '67Di', 212, '', ''),
(541, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '1Ei', 213, '', ''),
(542, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '2Ei', 214, '', ''),
(543, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '3Ei', 215, '', ''),
(544, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '4Ei', 216, '', ''),
(545, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '5Ei', 217, '', ''),
(546, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '6Ei', 218, '', ''),
(547, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '7Ei', 219, '', ''),
(548, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '8Ei', 220, '', ''),
(549, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '9Ei', 221, '', ''),
(550, 'Allan Murillo ', 'almuraz@gmail.com', '$2y$10$Er9ypaJixAeyIZZTiNShsuWaL6CdH5YDa3Tmp7rmiqH2ixZr47J.e', 1, 0, 'Usc42yX63pkPea98isuPr3hMdWCshugMKOjWWSkTj5EopCnMAqAYxh7XbLCR', '2016-06-18 17:37:02', '2016-07-10 01:00:33', '6630-6860', '3879000', '10E', 222, '', ''),
(551, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '11Ei', 223, '', ''),
(552, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '12Ei', 224, '', ''),
(553, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '13Ei', 225, '', ''),
(554, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '14Ei', 226, '', ''),
(555, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '15Ei', 227, '', ''),
(556, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '16Ei', 228, '', ''),
(557, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '17Ei', 229, '', ''),
(558, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '18Ei', 230, '', ''),
(559, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '19Ei', 231, '', ''),
(560, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '20Ei', 232, '', ''),
(561, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '21Ei', 233, '', ''),
(562, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '22Ei', 234, '', ''),
(563, 'Eivard Icaza', 'otniel18icazav@hotmail.com', '$2y$10$AU1.J9R1ja9fIZSVvcdGXuiP/zUrm8oqv/SBFsoXthDaCkXoulPHK', 1, 0, 'pC4pec9gGLsPpET5ikweQFHImAUraZ2calHdgw5EKOWl03t4hPKZMUFs6sLV', '2016-06-18 17:37:02', '2016-07-03 02:09:38', '66736242', '3942859', '23E', 235, '', ''),
(564, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '24Ei', 236, '', ''),
(565, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '25Ei', 237, '', ''),
(566, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '26Ei', 238, '', ''),
(567, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '27Ei', 239, '', ''),
(568, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '28Ei', 240, '', ''),
(569, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '29Ei', 241, '', ''),
(570, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '30Ei', 242, '', ''),
(571, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '31Ei', 243, '', ''),
(572, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '32Ei', 244, '', ''),
(573, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '33Ei', 245, '', ''),
(574, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '34Ei', 246, '', ''),
(575, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '35Ei', 247, '', ''),
(576, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '36Ei', 248, '', ''),
(577, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '37Ei', 249, '', ''),
(578, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '38Ei', 250, '', ''),
(579, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '39Ei', 251, '', ''),
(580, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '40Ei', 252, '', ''),
(581, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '41Ei', 253, '', ''),
(582, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '42Ei', 254, '', ''),
(583, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '43Ei', 255, '', ''),
(584, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '44Ei', 256, '', ''),
(585, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '45Ei', 257, '', ''),
(586, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '46Ei', 258, '', ''),
(587, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '47Ei', 259, '', ''),
(588, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '48Ei', 260, '', ''),
(589, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '49Ei', 261, '', ''),
(590, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '50Ei', 262, '', ''),
(591, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '51Ei', 263, '', ''),
(592, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '52Ei', 264, '', ''),
(593, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '53Ei', 265, '', ''),
(594, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '24E-1i', 266, '', ''),
(595, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '25E-1i', 267, '', ''),
(596, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '1Fi', 268, '', ''),
(597, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '2Fi', 269, '', ''),
(598, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '3Fi', 270, '', ''),
(599, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '4Fi', 271, '', ''),
(600, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '5Fi', 272, '', ''),
(601, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '6Fi', 273, '', ''),
(602, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '7Fi', 274, '', ''),
(603, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '8Fi', 275, '', ''),
(604, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '9Fi', 276, '', ''),
(605, 'Hipolito Aranda', 'hipolitoaranda22@gmail.com', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, 'fVLTK255NS24IO6c4UMyChaNtYpT4DfJ2cHnKvwaStBvl1tJc1XE88cYT2Tf', '2016-06-18 17:37:02', '2016-07-09 19:43:32', '69456280', '2932072', '10F', 277, '', ''),
(606, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '11Fi', 278, '', ''),
(607, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '12Fi', 279, '', ''),
(608, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '13Fi', 280, '', ''),
(609, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '14Fi', 281, '', ''),
(610, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '15Fi', 282, '', ''),
(611, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '16Fi', 283, '', ''),
(612, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '17Fi', 284, '', ''),
(613, 'Mayleen ', 'mayleensantiago@hotmail.com', '$2y$10$rnNrXCiVTU6hlX8lsOqqy.ng8q9k9P5yNn8AEZPzk6B1wqYzYXNqu', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-10 18:05:45', '65022722', '000000', '18F', 285, '', ''),
(614, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '19Fi', 286, '', ''),
(615, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '20Fi', 287, '', ''),
(616, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '21Fi', 288, '', ''),
(617, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '22Fi', 289, '', ''),
(618, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '23Fi', 290, '', ''),
(619, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '24Fi', 291, '', ''),
(620, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '25Fi', 292, '', ''),
(621, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '26Fi', 293, '', ''),
(622, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '27Fi', 294, '', ''),
(623, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '28Fi', 295, '', ''),
(624, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '29Fi', 296, '', ''),
(625, 'José Concepción ', 'jconcepcion08@hotmail.com', '$2y$10$Z2Wzkwh.2f4A393IkifjNu7XfBmUnche05.QHg/z6Q2npBFiH4UjO', 1, 0, 'kfxXzPi0dMyYISbu5AS0iCJIj1NlcU0U4tP5ZEwDWMFmoElJ2qd5GQSQacue', '2016-06-18 17:37:02', '2016-07-03 04:54:53', '69421694', '', '30F', 297, '', ''),
(626, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '31Fi', 298, '', ''),
(627, '', '', '$2y$10$WXMfzlde8gi7Mk2Fk8bfXeqGm27wrbsW8wKxw8IfpE.1SiIYXNxKy', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 18:54:09', '', '', '32Fi', 299, '', ''),
(628, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '33Fi', 300, '', ''),
(629, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '34Fi', 301, '', ''),
(630, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '35Fi', 302, '', ''),
(631, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '36Fi', 303, '', ''),
(632, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '37Fi', 304, '', ''),
(633, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '38Fi', 305, '', ''),
(634, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '39Fi', 306, '', ''),
(635, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '40Fi', 307, '', ''),
(636, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '41Fi', 308, '', ''),
(637, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '42Fi', 309, '', ''),
(638, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '43Fi', 310, '', ''),
(639, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '44Fi', 311, '', ''),
(640, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '45Fi', 312, '', ''),
(641, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '46Fi', 313, '', ''),
(642, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '47Fi', 314, '', ''),
(643, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '48Fi', 315, '', ''),
(644, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '49Fi', 316, '', ''),
(645, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '50Fi', 317, '', ''),
(646, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '51Fi', 318, '', ''),
(647, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '52Fi', 319, '', ''),
(648, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '53Fi', 320, '', ''),
(649, 'Ramses Gonzalez Garcia', 'RAGOGA68@GMAIL.COM', '$2y$10$HDZAIu5aD2cuk.9ReJRTPObGANBxD4HTa8fzd3zZR32OUyVp3rDCC', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-03 05:36:42', '67791727', '3915793', '54F', 321, '', ''),
(650, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '55Fi', 322, '', ''),
(651, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '56Fi', 323, '', ''),
(652, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '57Fi', 324, '', ''),
(653, '', '', '$2y$10$iJxxWJpb7yGtSY/KwKCJ0.yrlLkDblSq1EumNGgv5kM6X6Y73fFGa', 1, 0, NULL, '2016-06-18 17:37:02', '2016-07-02 00:17:04', '', '', '58Fi', 325, '', '');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `encuesta_opcion`
--
ALTER TABLE `encuesta_opcion`
  ADD CONSTRAINT `encuesta_opcion_cod_encuesta_foreign` FOREIGN KEY (`cod_encuesta`) REFERENCES `encuesta` (`id`);

--
-- Filtros para la tabla `encuesta_votos`
--
ALTER TABLE `encuesta_votos`
  ADD CONSTRAINT `encuesta_votos_cod_opcion_foreign` FOREIGN KEY (`cod_opcion`) REFERENCES `encuesta_opcion` (`id`),
  ADD CONSTRAINT `encuesta_votos_cod_usuario_foreign` FOREIGN KEY (`cod_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_cod_lote_foreing` FOREIGN KEY (`cod_lote`) REFERENCES `lotes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
