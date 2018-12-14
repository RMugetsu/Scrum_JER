-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-12-2018 a las 18:09:43
-- Versión del servidor: 5.7.24-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `projecte_scrumb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificaciones`
--

CREATE TABLE `especificaciones` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `IdSprint` int(11) DEFAULT NULL,
  `Descripción` varchar(500) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Horas` int(2) NOT NULL,
  `Dificultad` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdProyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `especificaciones`
--

INSERT INTO `especificaciones` (`Id`, `Nombre`, `IdSprint`, `Descripción`, `Horas`, `Dificultad`, `IdUsuario`, `IdProyecto`) VALUES
(1, 'Proyecto1', NULL, NULL, 20, 'Dificil', 1, 2),
(2, 'Proyecto2', NULL, NULL, 20, 'Dificil', 2, 1),
(3, 'Proyecto3', NULL, NULL, 20, 'Dificil', 3, 3),
(4, 'Proyecto4', NULL, NULL, 20, 'Dificil', 3, 1),
(5, 'Proyecto5', NULL, NULL, 20, 'Dificil', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `IdProyecto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`Id`, `Nombre`, `IdProyecto`) VALUES
(1, 'ALFA', NULL),
(2, 'BETA', NULL),
(3, 'TANGO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `NumSprint` int(11) NOT NULL,
  `PO_Id` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `SM_Id` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Descripcion` varchar(300) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`Id`, `Nombre`, `NumSprint`, `PO_Id`, `SM_Id`, `Descripcion`) VALUES
(1, 'projecto eric', 5, '1', '2', ''),
(2, 'projecto ruben', 5, '1', '2', ''),
(3, 'projecto jose', 5, '1', '2', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sprints`
--

CREATE TABLE `sprints` (
  `Id` int(11) NOT NULL,
  `IdProyecto` int(11) NOT NULL,
  `Inicio_Sprint` date NOT NULL,
  `Final_Sprint` date NOT NULL,
  `Estado` varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `Id` int(11) NOT NULL,
  `Tipo` varchar(40) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`Id`, `Tipo`) VALUES
(1, 'SCRUM MASTER'),
(2, 'PROJECT OWNER'),
(3, 'DEVELOPER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Password` varchar(512) COLLATE latin1_spanish_ci NOT NULL,
  `Tipo` int(11) NOT NULL,
  `IdGrupo` int(11) NOT NULL,
  `IdEspecifiacion` int(11) NOT NULL,
  `Email` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Nombre`, `Password`, `Tipo`, `IdGrupo`, `IdEspecifiacion`, `Email`) VALUES
(1, 'Ruben', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 2, 0, 0, ''),
(2, 'Jose', '1f04f125724e9115cf8f65bc1ee77970fe1cd4d0816f7d1349ccbe5064e055d75fd3dab16e96bb4780709c7b651822e3a4383d66f3451468483c5da2b8965c8a', 1, 0, 0, ''),
(3, 'Eric', 'df1425e6ee274c69e813efffc072d542d856b7959fd3dc034a44a382dea4772d06d9664d92cbb0c452f959f102e3e712a7b582745ef0f2642d8903e2466f529c', 3, 0, 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `sprints`
--
ALTER TABLE `sprints`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FOREIGN` (`Tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `sprints`
--
ALTER TABLE `sprints`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FOREIGN` FOREIGN KEY (`Tipo`) REFERENCES `tipo_usuario` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
