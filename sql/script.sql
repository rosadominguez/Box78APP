-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 02-12-2019 a las 10:26:41
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `box`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `idEjercicio` int(11) NOT NULL,
  `nomEjercicio` varchar(50) NOT NULL,
  `desEjercicio` varchar(400) NOT NULL,
  `demEjercicio` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`idEjercicio`, `nomEjercicio`, `desEjercicio`, `demEjercicio`) VALUES
(1, 'Back Squat', 'Sentadilla trasera con barra apoyada en los hombros detrás de la cabeza.', '<iframe width=\"400\" height=\"300\" src=\"https://www.youtube.com/embed/QmZAiBqPvZw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(2, 'Bench Press', 'Tumbado bocarriba sobre el banco, subir y bajar la barra desde el pecho.', '<iframe width=\"400\" height=\"300\" src=\"https://www.youtube.com/embed/SCVCLChPQFY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(3, 'Clean & Jerk', 'Cargar la barra con sentadilla profunda,incorporarte con ella en los hombros y subirla mediante impulso.', '<iframe width=\"400\" height=\"300\" src=\"https://www.youtube.com/embed/Ruu0F2oWwfU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(4, 'Dead Lift', 'Consiste en el levantamiento de la barra desde el suelo hasta la cintura.', '<iframe width=\"400\" height=\"300\" src=\"https://www.youtube.com/embed/op9kVnSso6Q\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(5, 'Front Squat', 'Sentadilla trasera con barra apoyada en los hombros delante de la cabeza.', '<iframe width=\"400\" height=\"300\" src=\"https://www.youtube.com/embed/uYumuL_G_V0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(6, 'Overhead squat', 'Subir la barra por encima de la cabeza y manteniendola en esa posición realizar una sentadilla profunda.', '<iframe width=\"400\" height=\"300\" src=\"https://www.youtube.com/embed/pn8mqlG0nkE\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(7, 'Power Clean', 'Realizar una cargada con la barra desde el suelo a los hombros sin sentadilla.', '<iframe width=\"400\" height=\"300\" src=\"https://www.youtube.com/embed/KwYJTpQ_x5A\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(8, 'Power Snatch', 'Consiste en el levantamiento de la barra desde el suelo hasta por encima de la cabeza.', '<iframe width=\"400\" height=\"300\" src=\"https://www.youtube.com/embed/TL8SMp7RdXQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `idHorario` int(11) NOT NULL,
  `diaSemana` enum('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado') NOT NULL,
  `hora` enum('9:00','10:00','11:00','12:00','13:00','17:00','18:00','19:00','20:00','21:00') NOT NULL,
  `monitor` enum('Rosa','Nane','Cheri','Mafe','Monitor') NOT NULL,
  `tipClase` enum('OpenWod','Wod','Tecnica','Yoga','Niños','Hiit') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHorario`, `diaSemana`, `hora`, `monitor`, `tipClase`) VALUES
(1, 'Lunes', '9:00', 'Rosa', 'Wod'),
(2, 'Lunes', '10:00', 'Rosa', 'Wod'),
(3, 'Lunes', '11:00', 'Rosa', 'Tecnica'),
(4, 'Lunes', '12:00', 'Rosa', 'Wod'),
(5, 'Lunes', '13:00', 'Rosa', 'Wod'),
(6, 'Lunes', '17:00', 'Monitor', 'OpenWod'),
(7, 'Lunes', '18:00', 'Cheri', 'Niños'),
(8, 'Lunes', '19:00', 'Cheri', 'Wod'),
(9, 'Lunes', '20:00', 'Cheri', 'Wod'),
(10, 'Lunes', '21:00', 'Cheri', 'Wod'),
(11, 'Martes', '9:00', 'Rosa', 'Wod'),
(12, 'Martes', '10:00', 'Rosa', 'Wod'),
(13, 'Martes', '11:00', 'Rosa', 'Wod'),
(14, 'Martes', '12:00', 'Rosa', 'Wod'),
(15, 'Martes', '13:00', 'Rosa', 'Wod'),
(16, 'Martes', '17:00', 'Monitor', 'OpenWod'),
(17, 'Martes', '18:00', 'Nane', 'Wod'),
(18, 'Martes', '19:00', 'Nane', 'Tecnica'),
(19, 'Martes', '20:00', 'Cheri', 'Wod'),
(20, 'Martes', '21:00', 'Cheri', 'Wod'),
(21, 'Miercoles', '9:00', 'Rosa', 'Wod'),
(22, 'Miercoles', '10:00', 'Rosa', 'Wod'),
(23, 'Miercoles', '11:00', 'Mafe', 'Yoga'),
(24, 'Miercoles', '12:00', 'Rosa', 'Wod'),
(25, 'Miercoles', '13:00', 'Rosa', 'Wod'),
(26, 'Miercoles', '17:00', 'Monitor', 'OpenWod'),
(27, 'Miercoles', '18:00', 'Cheri', 'Wod'),
(28, 'Miercoles', '19:00', 'Cheri', 'Wod'),
(29, 'Miercoles', '20:00', 'Cheri', 'Wod'),
(30, 'Miercoles', '21:00', 'Cheri', 'Wod'),
(31, 'Jueves', '9:00', 'Rosa', 'Wod'),
(32, 'Jueves', '10:00', 'Rosa', 'Wod'),
(33, 'Jueves', '11:00', 'Rosa', 'Wod'),
(34, 'Jueves', '12:00', 'Mafe', 'Yoga'),
(35, 'Jueves', '13:00', 'Rosa', 'Wod'),
(36, 'Jueves', '17:00', 'Monitor', 'OpenWod'),
(37, 'Jueves', '18:00', 'Nane', 'Wod'),
(38, 'Jueves', '19:00', 'Nane', 'Wod'),
(39, 'Jueves', '20:00', 'Nane', 'Hiit'),
(40, 'Jueves', '21:00', 'Nane', 'Wod'),
(41, 'Viernes', '9:00', 'Rosa', 'Wod'),
(42, 'Viernes', '10:00', 'Rosa', 'Wod'),
(43, 'Viernes', '11:00', 'Mafe', 'Yoga'),
(44, 'Viernes', '12:00', 'Rosa', 'Wod'),
(45, 'Viernes', '13:00', 'Rosa', 'Wod'),
(46, 'Viernes', '17:00', 'Monitor', 'OpenWod'),
(47, 'Viernes', '18:00', 'Nane', 'Niños'),
(48, 'Viernes', '19:00', 'Nane', 'Wod'),
(49, 'Viernes', '20:00', 'Nane', 'Tecnica'),
(50, 'Viernes', '21:00', 'Nane', 'Wod'),
(51, 'Sabado', '10:00', 'Monitor', 'OpenWod'),
(52, 'Sabado', '11:00', 'Monitor', 'OpenWod'),
(53, 'Sabado', '12:00', 'Monitor', 'OpenWod');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idPago` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `mes` enum('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre') NOT NULL,
  `anio` enum('2019','2020','2021','2022','2023') NOT NULL,
  `tarifa` enum('5 sesiones','9 sesiones','13 sesiones','1 sesion','yoga','ninio') NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`idPago`, `idUsuario`, `mes`, `anio`, `tarifa`, `fecha`) VALUES
(1, 1, 'Octubre', '2019', '13 sesiones', '2019-11-11 23:00:00'),
(2, 3, 'Octubre', '2019', '9 sesiones', '2019-11-12 23:00:00'),
(3, 3, 'Octubre', '2019', '9 sesiones', '2019-11-12 23:00:00'),
(4, 6, 'Noviembre', '2019', '5 sesiones', '2019-11-19 15:37:27'),
(6, 4, 'Julio', '2019', '5 sesiones', '2019-11-19 19:57:52'),
(7, 1, 'Junio', '2019', '5 sesiones', '2019-11-20 09:29:47'),
(8, 4, 'Febrero', '2019', '9 sesiones', '2019-11-21 11:24:01'),
(16, 1, 'Abril', '2019', '5 sesiones', '2019-11-21 11:50:45'),
(17, 4, 'Septiembre', '2019', '5 sesiones', '2019-11-21 11:54:48'),
(18, 2, 'Enero', '2019', '5 sesiones', '2019-11-21 11:57:28'),
(19, 4, 'Junio', '2019', '5 sesiones', '2019-11-21 12:24:42'),
(20, 2, 'Diciembre', '2019', '5 sesiones', '2019-11-26 08:36:26'),
(21, 2, 'Diciembre', '2019', '5 sesiones', '2019-11-26 08:36:26'),
(22, 2, 'Febrero', '2019', '5 sesiones', '2019-11-26 08:39:08'),
(23, 2, 'Febrero', '2019', '5 sesiones', '2019-11-26 08:39:08'),
(24, 2, 'Febrero', '2019', '5 sesiones', '2019-11-26 08:54:57'),
(25, 2, 'Febrero', '2019', '5 sesiones', '2019-11-26 08:54:57'),
(26, 2, 'Febrero', '2019', '5 sesiones', '2019-11-26 09:27:23'),
(27, 2, 'Febrero', '2019', '5 sesiones', '2019-11-26 09:27:23'),
(28, 2, 'Febrero', '2019', '5 sesiones', '2019-11-26 09:27:46'),
(29, 2, 'Febrero', '2019', '5 sesiones', '2019-11-26 09:27:46'),
(30, 2, 'Febrero', '2019', '5 sesiones', '2019-11-26 09:29:35'),
(31, 2, 'Febrero', '2019', '5 sesiones', '2019-11-26 09:29:35'),
(32, 2, 'Febrero', '2019', '5 sesiones', '2019-11-26 09:29:57'),
(33, 2, 'Febrero', '2019', '5 sesiones', '2019-11-26 09:29:57'),
(34, 2, 'Enero', '2019', '5 sesiones', '2019-11-26 09:30:48'),
(35, 2, 'Enero', '2019', '5 sesiones', '2019-11-26 09:30:48'),
(36, 2, 'Enero', '2019', '5 sesiones', '2019-11-26 10:09:02'),
(37, 2, 'Enero', '2019', '5 sesiones', '2019-11-26 10:09:02'),
(38, 2, 'Septiembre', '2019', '13 sesiones', '2019-11-26 12:21:14'),
(39, 2, 'Septiembre', '2019', '13 sesiones', '2019-11-26 12:21:14'),
(40, 1, 'Diciembre', '2019', '9 sesiones', '2019-11-27 10:47:22'),
(41, 1, 'Diciembre', '2019', '9 sesiones', '2019-11-27 10:47:22'),
(42, 1, 'Diciembre', '2019', '5 sesiones', '2019-11-27 20:57:54'),
(43, 1, 'Diciembre', '2019', '5 sesiones', '2019-11-27 20:57:54'),
(44, 8, 'Diciembre', '2019', '13 sesiones', '2019-11-28 13:40:02'),
(45, 8, 'Diciembre', '2019', '13 sesiones', '2019-11-28 13:40:02'),
(46, 2, 'Noviembre', '2019', '13 sesiones', '2019-12-01 11:32:54'),
(47, 2, 'Noviembre', '2019', '13 sesiones', '2019-12-01 11:32:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peso`
--

CREATE TABLE `peso` (
  `idEjercicio` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `peso` int(4) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `peso`
--

INSERT INTO `peso` (`idEjercicio`, `idUsuario`, `peso`, `fecha`) VALUES
(1, 1, 20, '2019-11-01'),
(1, 1, 50, '2019-11-02'),
(1, 1, 20, '2019-11-03'),
(1, 4, 35, '2019-11-29'),
(1, 6, 20, '2019-12-02'),
(2, 1, 20, '2019-11-01'),
(2, 1, 20, '2019-11-04'),
(3, 1, 10, '2019-11-01'),
(3, 1, 15, '2019-11-02'),
(4, 1, 40, '2019-11-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido1` varchar(100) NOT NULL,
  `apellido2` varchar(100) DEFAULT NULL,
  `contrasena` varchar(32) NOT NULL,
  `telefono` int(9) NOT NULL,
  `email` varchar(200) NOT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `admin` bit(1) DEFAULT b'0',
  `apiKey` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido1`, `apellido2`, `contrasena`, `telefono`, `email`, `foto`, `admin`, `apiKey`) VALUES
(1, 'Rosita', 'Domín', 'Barrientos', '81dc9bdb52d04dc20036dbd8313ed055', 666112233, 'rosa@box78.com', 'img/avatares/mi.png', b'1', '80a38f314fe2e5e7f47c967032126fdd'),
(2, 'Rosita', 'Do', 'Ba', '81dc9bdb52d04dc20036dbd8313ed055', 666332211, 'rosa2@box78.com', 'img/avatares/mi.png', b'1', 'eeaea8750e226332ddae0f19995be9c5'),
(3, 'Alberto', 'Cheri', 'Cheri', '81dc9bdb52d04dc20036dbd8313ed055', 666778899, 'cherinox@box78.com', 'img/avatares/mi.png', b'0', NULL),
(5, 'Pepe', 'Marín', 'To', '81dc9bdb52d04dc20036dbd8313ed055', 666123456, 'pepe@box78.com', 'img/avatares/mi.png', b'0', NULL),
(7, 'Raul', 'Tim', 'Jam', '81dc9bdb52d04dc20036dbd8313ed055', 657889900, 'Raul@box78.com', 'img/avatares/mi.png', b'0', NULL),
(8, 'Erika', 'Diaz', 'Romero', '81dc9bdb52d04dc20036dbd8313ed055', 678787898, 'erika@box78.com', NULL, b'0', NULL),
(9, 'Pedro', 'Gomez', 'Martin', '81dc9bdb52d04dc20036dbd8313ed055', 688990077, 'pedro@box78.com', NULL, b'0', NULL),
(12, 'David', 'Argon', 'Picio', '81dc9bdb52d04dc20036dbd8313ed055', 665434321, 'david@box78.com', NULL, b'0', NULL),
(13, 'Evaristo', 'Gomez', 'Anaya', '81dc9bdb52d04dc20036dbd8313ed055', 654557788, 'evaristo@box78.com', NULL, b'0', 'd681c67527eb1f55af313e1a3afac158'),
(14, 'nicolas', 'bau', 'tista', '81dc9bdb52d04dc20036dbd8313ed055', 678909098, 'nicolas@box78.com', NULL, b'0', '5bbf4dc4ab4e8dd6eb4d889d3c00e60e'),
(16, 'Joaquin', 'Ariza', 'Gallego', '81dc9bdb52d04dc20036dbd8313ed055', 654342312, 'joaquin@box78.com', NULL, b'0', NULL),
(17, 'Merche', 'Per', 'Ma', '81dc9bdb52d04dc20036dbd8313ed055', 678998877, 'merche@box78.com', 'img/avatares/mi.png', b'0', 'd59d05a9c0e289f740ca877131f9ff37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wod`
--

CREATE TABLE `wod` (
  `idWod` int(11) NOT NULL,
  `tipoWod` enum('ForTime','AMRAP','EMON','Rondas','') NOT NULL,
  `wod` varchar(3000) NOT NULL,
  `fecWod` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `wod`
--

INSERT INTO `wod` (`idWod`, `tipoWod`, `wod`, `fecWod`) VALUES
(1, 'ForTime', '250 metros run<br> 3 repeticiones backsquat(30kg)<br> 30 sentadillas <br> 5 repeticiones push press<br> 250 metros run', '2019-11-20'),
(2, 'AMRAP', '300 saltos dobles<br> 5 rep backSquats <br> 10 burpees', '2019-11-21'),
(3, 'ForTime', '30 flexiones <br> 20 abdominales', '2019-11-27'),
(4, 'EMON', '7min <br> 20 abdominales <br> 30 sentadillas <br> 10 pull ups', '2019-11-28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`idEjercicio`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`idHorario`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idPago`),
  ADD KEY `fk_pagos_usuario` (`idUsuario`);

--
-- Indices de la tabla `peso`
--
ALTER TABLE `peso`
  ADD PRIMARY KEY (`idEjercicio`,`idUsuario`,`fecha`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `wod`
--
ALTER TABLE `wod`
  ADD PRIMARY KEY (`idWod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `idEjercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `idHorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `wod`
--
ALTER TABLE `wod`
  MODIFY `idWod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peso`
--
ALTER TABLE `peso`
  ADD CONSTRAINT `peso_ibfk_2` FOREIGN KEY (`idEjercicio`) REFERENCES `ejercicios` (`idEjercicio`);
