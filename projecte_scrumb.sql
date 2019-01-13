-- phpMyAdmin SQL Dump
CREATE DATABASE IF NOT EXISTS projecte_scrumb;
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2019 a las 21:13:05
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `Horas` int(2) DEFAULT NULL,
  `Dificultad` varchar(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `IdProyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `especificaciones`
--

INSERT INTO `especificaciones` (`Id`, `Nombre`, `IdSprint`, `Descripción`, `Horas`, `Dificultad`, `IdUsuario`, `IdProyecto`) VALUES
(1, 'Espec1', 1, NULL, 20, 'Dificil', 1, 2),
(2, 'Espec2', 2, NULL, 20, 'Dificil', 2, 1),
(3, 'Espec3', 3, NULL, 20, 'Dificil', 3, 3),
(4, 'Espec4', 1, NULL, 20, 'Dificil', 3, 1),
(5, 'Espec6', 2, NULL, 20, 'Dificil', 1, 3),
(6, 'Espec7', 3, NULL, 20, 'Dificil', 1, 2),
(7, 'Espec8', 1, NULL, 20, 'Dificil', 1, 3),
(8, 'Espec19', 2, NULL, 20, 'Dificil', 1, 1),
(9, 'Espec10', 3, NULL, 20, 'Dificil', 1, 2);

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
  `Estado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Horas_Disponibles` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `sprints`
--

INSERT INTO `sprints` (`Id`, `IdProyecto`, `Inicio_Sprint`, `Final_Sprint`, `Estado`, `Horas_Disponibles`) VALUES
(1, 1, '2018-12-01', '2018-12-09', '', 100),
(2, 1, '2018-12-16', '2018-08-16', '', 100),
(3, 1, '2018-12-01', '2018-12-09', '', 100),
(4, 1, '2018-12-16', '2019-01-01', '', 100),
(5, 1, '2019-01-12', '2019-01-13', '', 100),
(6, 1, '2019-01-14', '2019-01-15', '', 100);

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
(1, 'Ruben', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 2, 0, 0, 'rubengapa97@gmail.com'),
(2, 'Jose', '1f04f125724e9115cf8f65bc1ee77970fe1cd4d0816f7d1349ccbe5064e055d75fd3dab16e96bb4780709c7b651822e3a4383d66f3451468483c5da2b8965c8a', 1, 0, 0, ''),
(3, 'Eric', 'df1425e6ee274c69e813efffc072d542d856b7959fd3dc034a44a382dea4772d06d9664d92cbb0c452f959f102e3e712a7b582745ef0f2642d8903e2466f529c', 3, 0, 0, 'eric.18p@gmail.com'),
(4, 'Jordi', 'ebba071b61b65f4313d5363d6f612164eca6b834f7b2240e4ae4e087951ab0c327120bab89280f12095bf6b2f86e94af4be531a36c6f89e893dd5efe3e5dd063', 1, 0, 0, 'martinezmat.j@gmail.com');

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FOREIGN` FOREIGN KEY (`Tipo`) REFERENCES `tipo_usuario` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
