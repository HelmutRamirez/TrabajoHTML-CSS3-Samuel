-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2023 a las 03:12:03
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `elporvenir`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` varchar(20) NOT NULL,
  `nit_empresa` varchar(15) NOT NULL,
  `nombre_empresa` varchar(20) NOT NULL,
  `correo_empresa` varchar(20) NOT NULL,
  `telefono_empresa` int(11) NOT NULL,
  `direccion_empresa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nit_empresa`, `nombre_empresa`, `correo_empresa`, `telefono_empresa`, `direccion_empresa`) VALUES
('01', '1294895622-5', 'El Porvenir S.A.S', 'ElPorvenirsuper12@gm', 745865, 'Calle 12-78 av Cali');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_prestamo`
--

CREATE TABLE `estado_prestamo` (
  `id_estado_prestamo` int(2) NOT NULL,
  `descr_estado_prestamo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_prestamo`
--

INSERT INTO `estado_prestamo` (`id_estado_prestamo`, `descr_estado_prestamo`) VALUES
(1, 'Rechazado'),
(2, 'En espera de aprobación'),
(3, 'Al dia'),
(4, 'En mora'),
(5, 'Paz y salvo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_usu`
--

CREATE TABLE `estado_usu` (
  `id_estado_usuario` int(2) NOT NULL,
  `descripcion_estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado_usu`
--

INSERT INTO `estado_usu` (`id_estado_usuario`, `descripcion_estado`) VALUES
(1, 'Activo'),
(5, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_prestamo`
--

CREATE TABLE `linea_prestamo` (
  `id_linea_prestamo` int(2) NOT NULL,
  `descr_linea_prestamo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `linea_prestamo`
--

INSERT INTO `linea_prestamo` (`id_linea_prestamo`, `descr_linea_prestamo`) VALUES
(1, 'Educativo'),
(2, 'Hipotecario'),
(3, 'Vacaciones'),
(4, 'Libre inversión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad_prestamo`
--

CREATE TABLE `modalidad_prestamo` (
  `id_modalidad_prestamo` int(2) NOT NULL,
  `descr_modalidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modalidad_prestamo`
--

INSERT INTO `modalidad_prestamo` (`id_modalidad_prestamo`, `descr_modalidad`) VALUES
(1, 'Mes vencido'),
(2, 'Mes Anticipado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id_prestamo` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `prestamo_cantidad` float NOT NULL,
  `prestamo_valor_total` float NOT NULL,
  `prestamo_valor_pagado` float NOT NULL,
  `id_estado_prestamo` int(2) NOT NULL,
  `observaciones_prestamo` text NOT NULL,
  `id_usuario` varchar(15) NOT NULL,
  `id_asociado_solicitante` int(11) NOT NULL,
  `id_linea_prestamo` int(2) NOT NULL,
  `tasa_interes` int(11) NOT NULL,
  `id_modalidad_prestamo` int(2) NOT NULL,
  `id_empresa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id_prestamo`, `fecha_inicio`, `fecha_final`, `prestamo_cantidad`, `prestamo_valor_total`, `prestamo_valor_pagado`, `id_estado_prestamo`, `observaciones_prestamo`, `id_usuario`, `id_asociado_solicitante`, `id_linea_prestamo`, `tasa_interes`, `id_modalidad_prestamo`, `id_empresa`) VALUES
('12345', '2023-10-31', '2024-01-31', 100000000, 100000000, 100000000, 2, 'Solicito amablemente el dinero para la compra de una casa.', '0001', 12, 2, 12, 1, '01'),
('23', '2023-07-04', '2024-08-15', 2000000, 2000000, 2000000, 3, 'Prestamo para invertir y pagar deudas.', '28989', 12, 4, 8, 2, '01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_asociados_socios`
--

CREATE TABLE `tipo_asociados_socios` (
  `id_tipo_usuario` int(2) NOT NULL,
  `descr_asociado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_asociados_socios`
--

INSERT INTO `tipo_asociados_socios` (`id_tipo_usuario`, `descr_asociado`) VALUES
(6, 'Socio'),
(8, 'Asociado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `id_tipo_doc` int(2) NOT NULL,
  `descri_tipo_doc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`id_tipo_doc`, `descri_tipo_doc`) VALUES
(1, 'Tarjeta identidad'),
(2, 'Cedula ciudadania'),
(3, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` varchar(15) NOT NULL,
  `identidad_usuario` int(11) NOT NULL,
  `id_tipo_doc` int(2) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `apellido_usuario` varchar(30) NOT NULL,
  `telef_usuario` int(11) NOT NULL,
  `direcc_usuario` varchar(20) NOT NULL,
  `correo_usuario` varchar(30) NOT NULL,
  `usuario_sistema` varchar(20) NOT NULL,
  `password_usuario` text NOT NULL,
  `id_estado_usuario` int(2) NOT NULL,
  `id_tipo_usuario` int(2) NOT NULL,
  `imagenk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `identidad_usuario`, `id_tipo_doc`, `nombre_usuario`, `apellido_usuario`, `telef_usuario`, `direcc_usuario`, `correo_usuario`, `usuario_sistema`, `password_usuario`, `id_estado_usuario`, `id_tipo_usuario`, `imagenk`) VALUES
('0001', 1003494545, 1, 'Helmut', 'Romero', 32154545, 'calle 12-45', 'helmutr@gmail.com', 'helmut080', '$2y$15$ZxPhjxSOfI5pbf4rG13OEO8i/HG6rMn5X5ZDhBLwsVBPKeC7B3Mcm', 5, 8, '250px-Intel_4004.jpg'),
('10000', 1003494602, 1, 'Helmut Romero', 'Romero', 315749598, 'cara12#54', 'helmut@gmail.com', 'helmutpro', '$2y$15$pzKhne20F7SGWyd/ITyOsuTWjO85nd4yz7/yRVHBVeiv26sq8U32u', 1, 6, 'descarga.jpg'),
('231', 1213215, 1, 'Helmut', 'Romero', 312454212, 'calle 12#54', 'helmut2@gmail.com', 'helmut20e', '$2y$15$kUZaGTXw8xTVVKA6OSwnCe1OQoSt6ah9ETWdHBoa53Ez6icOcJqVW', 1, 6, 'descarga.jpg'),
('2323', 1213215, 1, 'Helmut', 'Romero', 312454212, 'calle 12#54', 'helmut3@gmail.com', 'helmut20er', '$2y$15$IGO9FbPnRYPDGfM0EGjzKOgTtTkewrlyHx.Z8wfCFhNSzqgifCFom', 1, 6, 'images (1).jpg'),
('2378', 1213215, 1, 'Helmut', 'Romero', 312454212, 'calle 12#54', 'helmut4@gmail.com', 'helmut20er2', '$2y$15$FoA5dt28mHbQzRuvx/h.2ulcE5ZCwPV7f1yWQIpbHOqFUz.5Pfw7i', 1, 6, 'images.jpg'),
('238798', 1213215, 1, 'Helmut', 'Romero', 312454212, 'calle 12#54', 'helmut5@gmail.com', 'helmut20er5', '$2y$15$N5xoTrJezVdR5pJEeUxHx.hpajaiTIFnTWiGu4uewt9YgUt6ol/8a', 1, 6, 'images (1).jpg'),
('2398', 1213215, 1, 'Helmut', 'Romero', 312454212, 'calle 12#54', 'helmut6@gmail.com', 'helmut20er6', '$2y$15$T.ntq/VPrVT5sMe1mxLsJeBTkRHK.52kk1mZWhHqpMU.V6mwI6eU6', 1, 6, 'descarga (1).jpg'),
('28', 1213215, 1, 'Helmut', 'Romero', 312454212, 'calle 12#54', 'helmut7@gmail.com', 'helmut20er7', '$2y$15$fqV/PKb9.ZiZTFaeGFKOTuMmEXEQFRboz0D7Xpwo/C8F/ZfiVSGrO', 1, 6, 'descarga (2).jpg'),
('289798', 1213215, 1, 'Helmut', 'Romero', 312454212, 'calle 12#54', 'helmut8@gmail.com', 'helmut20er8', '$2y$15$WO/wnrj/ZDArkQcNK0E8VOjSbz1QM79jkDsFYq7IlNjgYab2eaGbW', 1, 6, 'descarga.jpg'),
('28989', 1213215, 1, 'Helmut', 'Romero', 312454212, 'calle 12#54', 'helmut12@gmail.com', 'helmut20er12', '$2y$15$TZSd15tkbqof/ka9.OEZfugCcMoPP0sWgxalIYOZ/6tEbYMWAETsi', 1, 6, 'images.jpg'),
('456', 1003495, 1, 'felipe2', 'rogelio2', 3157464, 'calle 52 #45-45', 'felipe@gmail.com', 'felipe07pro', '$2y$15$lrMk6GboOAlyD', 1, 6, 'images.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `estado_prestamo`
--
ALTER TABLE `estado_prestamo`
  ADD PRIMARY KEY (`id_estado_prestamo`);

--
-- Indices de la tabla `estado_usu`
--
ALTER TABLE `estado_usu`
  ADD PRIMARY KEY (`id_estado_usuario`);

--
-- Indices de la tabla `linea_prestamo`
--
ALTER TABLE `linea_prestamo`
  ADD PRIMARY KEY (`id_linea_prestamo`);

--
-- Indices de la tabla `modalidad_prestamo`
--
ALTER TABLE `modalidad_prestamo`
  ADD PRIMARY KEY (`id_modalidad_prestamo`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `id_linea_prestamo` (`id_linea_prestamo`),
  ADD KEY `id_modalidad_prestamo` (`id_modalidad_prestamo`),
  ADD KEY `id_estado_prestamo` (`id_estado_prestamo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Indices de la tabla `tipo_asociados_socios`
--
ALTER TABLE `tipo_asociados_socios`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`id_tipo_doc`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_estado_usuario` (`id_estado_usuario`),
  ADD KEY `id_tipo_asociado` (`id_tipo_usuario`),
  ADD KEY `id_tipo_doc` (`id_tipo_doc`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`id_linea_prestamo`) REFERENCES `linea_prestamo` (`id_linea_prestamo`),
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`id_modalidad_prestamo`) REFERENCES `modalidad_prestamo` (`id_modalidad_prestamo`),
  ADD CONSTRAINT `prestamo_ibfk_3` FOREIGN KEY (`id_estado_prestamo`) REFERENCES `estado_prestamo` (`id_estado_prestamo`),
  ADD CONSTRAINT `prestamo_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `prestamo_ibfk_5` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_estado_usuario`) REFERENCES `estado_usu` (`id_estado_usuario`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_asociados_socios` (`id_tipo_usuario`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`id_tipo_doc`) REFERENCES `tipo_doc` (`id_tipo_doc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
