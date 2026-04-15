-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-03-2026 a las 17:44:20
-- Versión del servidor: 11.8.3-MariaDB-log
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u259434644_sulb2026`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afip`
--

CREATE TABLE `afip` (
  `nro_laboratorio` int(5) NOT NULL DEFAULT 0,
  `nro_afip` varchar(20) NOT NULL DEFAULT '',
  `sit_iva` varchar(25) NOT NULL DEFAULT '',
  `requisitos_afip` varchar(10) NOT NULL DEFAULT '',
  `retension_afip` varchar(10) NOT NULL DEFAULT '',
  `categoria_afip` varchar(10) NOT NULL DEFAULT '',
  `descuento_mega` decimal(6,2) NOT NULL DEFAULT 5.00,
  `dssd` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ansal`
--

CREATE TABLE `ansal` (
  `nro_laboratorio` int(5) NOT NULL DEFAULT 0,
  `nro_ansal` varchar(10) NOT NULL DEFAULT '',
  `vencimiento_ansal` varchar(10) NOT NULL DEFAULT '',
  `requisitos_ansal` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antibioticos`
--

CREATE TABLE `antibioticos` (
  `antibiotico` varchar(100) NOT NULL,
  `cod_antibiotico` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arancel`
--

CREATE TABLE `arancel` (
  `nro_os` int(10) NOT NULL DEFAULT 0,
  `modalidad` char(2) NOT NULL DEFAULT '',
  `ug` decimal(10,3) NOT NULL DEFAULT 0.000,
  `uh` decimal(10,3) NOT NULL DEFAULT 0.000,
  `modalidad_especiales` char(2) NOT NULL DEFAULT '',
  `ug_especiales` decimal(10,3) NOT NULL DEFAULT 0.000,
  `uh_especiales` decimal(10,3) NOT NULL DEFAULT 0.000,
  `modalidad_alta` char(2) NOT NULL DEFAULT '',
  `ug_alta` decimal(10,3) NOT NULL DEFAULT 0.000,
  `uh_alta` decimal(10,3) NOT NULL DEFAULT 0.000,
  `nomenclador` char(3) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arancel_migrado`
--

CREATE TABLE `arancel_migrado` (
  `nro_os` int(10) NOT NULL DEFAULT 0,
  `modalidad` char(2) NOT NULL DEFAULT '',
  `ug` decimal(10,3) NOT NULL DEFAULT 0.000,
  `uh` decimal(10,3) NOT NULL DEFAULT 0.000,
  `modalidad_especiales` char(2) NOT NULL DEFAULT '',
  `ug_especiales` decimal(10,3) NOT NULL DEFAULT 0.000,
  `uh_especiales` decimal(10,3) NOT NULL DEFAULT 0.000,
  `modalidad_alta` char(2) NOT NULL DEFAULT '',
  `ug_alta` decimal(10,3) NOT NULL DEFAULT 0.000,
  `uh_alta` decimal(10,3) NOT NULL DEFAULT 0.000,
  `nomenclador` char(3) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(10) UNSIGNED NOT NULL,
  `archivo_binario` blob NOT NULL,
  `archivo_nombre` varchar(255) NOT NULL DEFAULT '',
  `archivo_peso` varchar(15) NOT NULL DEFAULT '',
  `archivo_tipo` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_practicas_rechazadas`
--

CREATE TABLE `a_practicas_rechazadas` (
  `nro_os` int(8) NOT NULL DEFAULT 0,
  `cod_practica` int(8) NOT NULL DEFAULT 0,
  `motivo` varchar(180) NOT NULL DEFAULT '',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `tipo` char(1) NOT NULL DEFAULT '',
  `plan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitacion`
--

CREATE TABLE `capitacion` (
  `nro_os` int(10) NOT NULL DEFAULT 0,
  `prorrateo` varchar(10) NOT NULL DEFAULT '',
  `cuota` varchar(10) NOT NULL DEFAULT '',
  `porcentaje` varchar(10) NOT NULL DEFAULT '',
  `porcentaje_cuota` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE `casos` (
  `cod_caso` int(10) NOT NULL,
  `practica1` int(10) NOT NULL,
  `nombre1` varchar(50) NOT NULL,
  `practica2` int(10) NOT NULL,
  `nombre2` varchar(50) NOT NULL,
  `cod_operacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cod_categoria` int(3) NOT NULL DEFAULT 0,
  `categoria` varchar(30) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenios`
--

CREATE TABLE `convenios` (
  `nro_os` int(10) NOT NULL,
  `inicio` varchar(10) NOT NULL DEFAULT '',
  `fin` varchar(10) NOT NULL DEFAULT '',
  `tipo` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_practica`
--

CREATE TABLE `convenio_practica` (
  `cod_practica` int(6) NOT NULL DEFAULT 0,
  `nro_os` varchar(6) NOT NULL DEFAULT '0',
  `cod_equivalencia` varchar(6) NOT NULL DEFAULT '',
  `categoria` int(2) NOT NULL DEFAULT 0,
  `honorarios` decimal(6,2) NOT NULL DEFAULT 0.00,
  `gastos` decimal(6,2) NOT NULL DEFAULT 0.00,
  `valor` decimal(6,2) NOT NULL DEFAULT 0.00,
  `practica` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT '',
  `metodo` text NOT NULL,
  `referencia` text NOT NULL,
  `prioridad` int(1) NOT NULL DEFAULT 0,
  `salto` int(1) NOT NULL DEFAULT 0,
  `referencia1` text NOT NULL,
  `referencia2` text NOT NULL,
  `referencia3` text NOT NULL,
  `unidad` varchar(10) NOT NULL,
  `nueva` int(1) NOT NULL,
  `por` int(2) NOT NULL,
  `tipo_det` varchar(20) NOT NULL,
  `deriva` int(1) NOT NULL,
  `lab_derivacion` int(2) NOT NULL,
  `clase` int(1) NOT NULL,
  `decimal` int(1) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_practica2012`
--

CREATE TABLE `convenio_practica2012` (
  `cod_practica` int(4) NOT NULL DEFAULT 0,
  `nro_os` varchar(6) NOT NULL DEFAULT '0',
  `cod_equivalencia` varchar(6) NOT NULL DEFAULT '',
  `categoria` int(2) NOT NULL DEFAULT 0,
  `honorarios` decimal(6,2) NOT NULL DEFAULT 0.00,
  `gastos` decimal(6,2) NOT NULL DEFAULT 0.00,
  `toma` varchar(4) NOT NULL DEFAULT '',
  `urgencia` varchar(4) NOT NULL DEFAULT '',
  `material_descartable` varchar(4) NOT NULL DEFAULT '',
  `valor` decimal(6,2) NOT NULL DEFAULT 0.00,
  `autorizada` varchar(4) NOT NULL DEFAULT '',
  `practica` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_practica_2016`
--

CREATE TABLE `convenio_practica_2016` (
  `cod_practica` int(6) NOT NULL DEFAULT 0,
  `nro_os` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `cod_equivalencia` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `categoria` int(2) NOT NULL DEFAULT 0,
  `honorarios` decimal(6,2) NOT NULL DEFAULT 0.00,
  `gastos` decimal(6,2) NOT NULL DEFAULT 0.00,
  `valor` decimal(6,2) NOT NULL DEFAULT 0.00,
  `practica` varchar(50) NOT NULL DEFAULT '',
  `metodo` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `referencia` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `prioridad` int(1) NOT NULL DEFAULT 0,
  `salto` int(1) NOT NULL DEFAULT 0,
  `referencia1` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `referencia2` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `referencia3` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `unidad` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nueva` int(1) NOT NULL,
  `por` int(2) NOT NULL,
  `tipo_det` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deriva` int(1) NOT NULL,
  `lab_derivacion` int(2) NOT NULL,
  `clase` int(1) NOT NULL,
  `decimal` int(1) NOT NULL,
  `usuario` int(10) NOT NULL,
  `cod_operacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_practica_abm`
--

CREATE TABLE `convenio_practica_abm` (
  `cod_practica` int(4) NOT NULL DEFAULT 0,
  `nro_os` varchar(6) NOT NULL DEFAULT '0',
  `cod_equivalencia` varchar(6) NOT NULL DEFAULT '',
  `categoria` int(2) NOT NULL DEFAULT 0,
  `honorarios` decimal(6,2) NOT NULL DEFAULT 0.00,
  `gastos` decimal(6,2) NOT NULL DEFAULT 0.00,
  `toma` varchar(4) NOT NULL DEFAULT '',
  `urgencia` varchar(4) NOT NULL DEFAULT '',
  `material_descartable` varchar(4) NOT NULL DEFAULT '',
  `valor` decimal(6,2) NOT NULL DEFAULT 0.00,
  `autorizada` varchar(4) NOT NULL DEFAULT '',
  `practica` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_practica_complejo`
--

CREATE TABLE `convenio_practica_complejo` (
  `cod_practica` int(6) NOT NULL DEFAULT 0,
  `renglon1` varchar(100) NOT NULL,
  `renglon1_2` varchar(100) NOT NULL,
  `renglon1_3` varchar(100) NOT NULL,
  `renglon1_4` varchar(60) NOT NULL,
  `renglon2` varchar(100) NOT NULL,
  `renglon2_2` varchar(100) NOT NULL,
  `renglon2_3` varchar(100) NOT NULL,
  `renglon2_4` varchar(60) NOT NULL,
  `renglon3` varchar(100) NOT NULL,
  `renglon3_2` varchar(100) NOT NULL,
  `renglon3_3` varchar(100) NOT NULL,
  `renglon3_4` varchar(60) NOT NULL,
  `renglon4` varchar(100) NOT NULL,
  `renglon4_2` varchar(100) NOT NULL,
  `renglon4_3` varchar(100) NOT NULL,
  `renglon4_4` varchar(60) NOT NULL,
  `renglon5` varchar(100) NOT NULL,
  `renglon5_2` varchar(100) NOT NULL,
  `renglon5_3` varchar(100) NOT NULL,
  `renglon5_4` varchar(60) NOT NULL,
  `renglon6` varchar(100) NOT NULL,
  `renglon6_2` varchar(100) NOT NULL,
  `renglon6_3` varchar(100) NOT NULL,
  `renglon6_4` varchar(60) NOT NULL,
  `renglon7` varchar(100) NOT NULL,
  `renglon7_2` varchar(100) NOT NULL,
  `renglon7_3` varchar(100) NOT NULL,
  `renglon7_4` varchar(60) NOT NULL,
  `renglon8` varchar(100) NOT NULL,
  `renglon8_2` varchar(100) NOT NULL,
  `renglon8_3` varchar(100) NOT NULL,
  `renglon8_4` varchar(60) NOT NULL,
  `renglon9` varchar(100) NOT NULL,
  `renglon9_2` varchar(100) NOT NULL,
  `renglon9_3` varchar(100) NOT NULL,
  `renglon9_4` varchar(60) NOT NULL,
  `renglon10` varchar(100) NOT NULL,
  `renglon10_2` varchar(100) NOT NULL,
  `renglon10_3` varchar(100) NOT NULL,
  `renglon10_4` varchar(60) NOT NULL,
  `renglon11` varchar(100) NOT NULL,
  `renglon11_2` varchar(100) NOT NULL,
  `renglon11_3` varchar(100) NOT NULL,
  `renglon11_4` varchar(60) NOT NULL,
  `renglon12` varchar(100) NOT NULL,
  `renglon12_2` varchar(100) NOT NULL,
  `renglon12_3` varchar(100) NOT NULL,
  `renglon12_4` varchar(60) NOT NULL,
  `renglon13` varchar(100) NOT NULL,
  `renglon13_2` varchar(100) NOT NULL,
  `renglon13_3` varchar(100) NOT NULL,
  `renglon13_4` varchar(60) NOT NULL,
  `renglon14` varchar(100) NOT NULL,
  `renglon14_2` varchar(100) NOT NULL,
  `renglon14_3` varchar(100) NOT NULL,
  `renglon14_4` varchar(60) NOT NULL,
  `renglon15` varchar(100) NOT NULL,
  `renglon15_2` varchar(100) NOT NULL,
  `renglon15_3` varchar(100) NOT NULL,
  `renglon15_4` varchar(60) NOT NULL,
  `renglon16` varchar(100) NOT NULL,
  `renglon16_2` varchar(100) NOT NULL,
  `renglon16_3` varchar(100) NOT NULL,
  `renglon16_4` varchar(60) NOT NULL,
  `renglon17` int(11) NOT NULL,
  `renglon17_2` int(11) NOT NULL,
  `renglon17_3` int(11) NOT NULL,
  `renglon17_4` varchar(1) NOT NULL,
  `renglon18` varchar(100) NOT NULL,
  `renglon18_2` varchar(25) NOT NULL,
  `renglon18_3` varchar(25) NOT NULL,
  `renglon18_4` varchar(1) NOT NULL,
  `renglon19` varchar(100) NOT NULL,
  `renglon19_2` varchar(25) NOT NULL,
  `renglon19_3` varchar(25) NOT NULL,
  `renglon19_4` varchar(1) NOT NULL,
  `renglon20` varchar(100) NOT NULL,
  `renglon20_2` varchar(25) NOT NULL,
  `renglon20_3` varchar(25) NOT NULL,
  `renglon20_4` varchar(1) NOT NULL,
  `renglon21` varchar(100) NOT NULL,
  `renglon21_2` varchar(25) NOT NULL,
  `renglon21_3` varchar(25) NOT NULL,
  `renglon21_4` varchar(1) NOT NULL,
  `renglon22` varchar(100) NOT NULL,
  `renglon22_2` varchar(25) NOT NULL,
  `renglon22_3` varchar(25) NOT NULL,
  `renglon22_4` varchar(1) NOT NULL,
  `renglon23` varchar(100) NOT NULL,
  `renglon23_2` varchar(25) NOT NULL,
  `renglon23_3` varchar(25) NOT NULL,
  `renglon23_4` varchar(1) NOT NULL,
  `renglon24` varchar(100) NOT NULL,
  `renglon24_2` varchar(25) NOT NULL,
  `renglon24_3` varchar(25) NOT NULL,
  `renglon24_4` varchar(1) NOT NULL,
  `renglon25` varchar(100) NOT NULL,
  `renglon25_2` varchar(25) NOT NULL,
  `renglon25_3` varchar(25) NOT NULL,
  `renglon25_4` varchar(1) NOT NULL,
  `renglon26` varchar(100) NOT NULL,
  `renglon26_2` varchar(25) NOT NULL,
  `renglon26_3` varchar(25) NOT NULL,
  `renglon26_4` varchar(1) NOT NULL,
  `renglon27` varchar(100) NOT NULL,
  `renglon27_2` varchar(25) NOT NULL,
  `renglon27_3` varchar(25) NOT NULL,
  `renglon27_4` varchar(1) NOT NULL,
  `renglon28` varchar(100) NOT NULL,
  `renglon28_2` varchar(25) NOT NULL,
  `renglon28_3` varchar(25) NOT NULL,
  `renglon28_4` varchar(1) NOT NULL,
  `renglon29` varchar(100) NOT NULL,
  `renglon29_2` varchar(25) NOT NULL,
  `renglon29_3` varchar(25) NOT NULL,
  `renglon29_4` varchar(1) NOT NULL,
  `renglon30` varchar(100) NOT NULL,
  `renglon30_2` varchar(25) NOT NULL,
  `renglon30_3` varchar(25) NOT NULL,
  `renglon30_4` varchar(1) NOT NULL,
  `visible_1` int(1) NOT NULL,
  `mostrar_1` int(1) NOT NULL,
  `cantidad_renglones` int(30) NOT NULL,
  `renglon_tipo_letra_1` varchar(1) NOT NULL,
  `renglon_tipo_letra_2` varchar(1) NOT NULL,
  `renglon_tipo_letra_3` varchar(1) NOT NULL,
  `renglon_tipo_letra_4` varchar(1) NOT NULL,
  `renglon_tipo_letra_5` varchar(1) NOT NULL,
  `renglon_tipo_letra_6` varchar(1) NOT NULL,
  `renglon_tipo_letra_7` varchar(1) NOT NULL,
  `renglon_tipo_letra_8` varchar(1) NOT NULL,
  `renglon_tipo_letra_9` varchar(1) NOT NULL,
  `renglon_tipo_letra_10` varchar(1) NOT NULL,
  `renglon_tipo_letra_11` varchar(1) NOT NULL,
  `renglon_tipo_letra_12` varchar(1) NOT NULL,
  `renglon_tipo_letra_13` varchar(1) NOT NULL,
  `renglon_tipo_letra_14` varchar(1) NOT NULL,
  `renglon_tipo_letra_15` varchar(1) NOT NULL,
  `renglon_tipo_letra_16` varchar(1) NOT NULL,
  `cod_operacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_practica_complejo-no`
--

CREATE TABLE `convenio_practica_complejo-no` (
  `cod_practica` int(6) NOT NULL DEFAULT 0,
  `renglon1` varchar(100) NOT NULL,
  `renglon1_2` varchar(25) NOT NULL,
  `renglon1_3` varchar(25) NOT NULL,
  `renglon1_4` varchar(1) NOT NULL,
  `renglon2` varchar(100) NOT NULL,
  `renglon2_2` varchar(25) NOT NULL,
  `renglon2_3` varchar(25) NOT NULL,
  `renglon2_4` varchar(1) NOT NULL,
  `renglon3` varchar(100) NOT NULL,
  `renglon3_2` varchar(25) NOT NULL,
  `renglon3_3` varchar(25) NOT NULL,
  `renglon3_4` varchar(1) NOT NULL,
  `renglon4` varchar(100) NOT NULL,
  `renglon4_2` varchar(25) NOT NULL,
  `renglon4_3` varchar(25) NOT NULL,
  `renglon4_4` varchar(1) NOT NULL,
  `renglon5` varchar(100) NOT NULL,
  `renglon5_2` varchar(25) NOT NULL,
  `renglon5_3` varchar(25) NOT NULL,
  `renglon5_4` varchar(1) NOT NULL,
  `renglon6` varchar(100) NOT NULL,
  `renglon6_2` varchar(25) NOT NULL,
  `renglon6_3` varchar(25) NOT NULL,
  `renglon6_4` varchar(1) NOT NULL,
  `renglon7` varchar(100) NOT NULL,
  `renglon7_2` varchar(25) NOT NULL,
  `renglon7_3` varchar(25) NOT NULL,
  `renglon7_4` varchar(1) NOT NULL,
  `renglon8` varchar(100) NOT NULL,
  `renglon8_2` varchar(25) NOT NULL,
  `renglon8_3` varchar(25) NOT NULL,
  `renglon8_4` varchar(1) NOT NULL,
  `renglon9` varchar(100) NOT NULL,
  `renglon9_2` varchar(25) NOT NULL,
  `renglon9_3` varchar(25) NOT NULL,
  `renglon9_4` varchar(1) NOT NULL,
  `renglon10` varchar(100) NOT NULL,
  `renglon10_2` varchar(25) NOT NULL,
  `renglon10_3` varchar(25) NOT NULL,
  `renglon10_4` varchar(1) NOT NULL,
  `renglon11` varchar(100) NOT NULL,
  `renglon11_2` varchar(25) NOT NULL,
  `renglon11_3` varchar(25) NOT NULL,
  `renglon11_4` varchar(1) NOT NULL,
  `renglon12` varchar(100) NOT NULL,
  `renglon12_2` varchar(25) NOT NULL,
  `renglon12_3` varchar(25) NOT NULL,
  `renglon12_4` varchar(1) NOT NULL,
  `renglon13` varchar(100) NOT NULL,
  `renglon13_2` varchar(25) NOT NULL,
  `renglon13_3` varchar(25) NOT NULL,
  `renglon13_4` varchar(1) NOT NULL,
  `renglon14` varchar(100) NOT NULL,
  `renglon14_2` varchar(25) NOT NULL,
  `renglon14_3` varchar(25) NOT NULL,
  `renglon14_4` varchar(1) NOT NULL,
  `renglon15` varchar(100) NOT NULL,
  `renglon15_2` varchar(25) NOT NULL,
  `renglon15_3` varchar(25) NOT NULL,
  `renglon15_4` varchar(1) NOT NULL,
  `renglon16` varchar(100) NOT NULL,
  `renglon16_2` varchar(25) NOT NULL,
  `renglon16_3` varchar(25) NOT NULL,
  `renglon16_4` varchar(1) NOT NULL,
  `renglon17` varchar(100) NOT NULL,
  `renglon17_2` varchar(25) NOT NULL,
  `renglon17_3` varchar(25) NOT NULL,
  `renglon17_4` varchar(1) NOT NULL,
  `renglon18` varchar(100) NOT NULL,
  `renglon18_2` varchar(25) NOT NULL,
  `renglon18_3` varchar(25) NOT NULL,
  `renglon18_4` varchar(1) NOT NULL,
  `renglon19` varchar(100) NOT NULL,
  `renglon19_2` varchar(25) NOT NULL,
  `renglon19_3` varchar(25) NOT NULL,
  `renglon19_4` varchar(1) NOT NULL,
  `renglon20` varchar(100) NOT NULL,
  `renglon20_2` varchar(25) NOT NULL,
  `renglon20_3` varchar(25) NOT NULL,
  `renglon20_4` varchar(1) NOT NULL,
  `renglon21` varchar(100) NOT NULL,
  `renglon21_2` varchar(25) NOT NULL,
  `renglon21_3` varchar(25) NOT NULL,
  `renglon21_4` varchar(1) NOT NULL,
  `renglon22` varchar(100) NOT NULL,
  `renglon22_2` varchar(25) NOT NULL,
  `renglon22_3` varchar(25) NOT NULL,
  `renglon22_4` varchar(1) NOT NULL,
  `renglon23` varchar(100) NOT NULL,
  `renglon23_2` varchar(25) NOT NULL,
  `renglon23_3` varchar(25) NOT NULL,
  `renglon23_4` varchar(1) NOT NULL,
  `renglon24` varchar(100) NOT NULL,
  `renglon24_2` varchar(25) NOT NULL,
  `renglon24_3` varchar(25) NOT NULL,
  `renglon24_4` varchar(1) NOT NULL,
  `renglon25` varchar(100) NOT NULL,
  `renglon25_2` varchar(25) NOT NULL,
  `renglon25_3` varchar(25) NOT NULL,
  `renglon25_4` varchar(1) NOT NULL,
  `renglon26` varchar(100) NOT NULL,
  `renglon26_2` varchar(25) NOT NULL,
  `renglon26_3` varchar(25) NOT NULL,
  `renglon26_4` varchar(1) NOT NULL,
  `renglon27` varchar(100) NOT NULL,
  `renglon27_2` varchar(25) NOT NULL,
  `renglon27_3` varchar(25) NOT NULL,
  `renglon27_4` varchar(1) NOT NULL,
  `renglon28` varchar(100) NOT NULL,
  `renglon28_2` varchar(25) NOT NULL,
  `renglon28_3` varchar(25) NOT NULL,
  `renglon28_4` varchar(1) NOT NULL,
  `renglon29` varchar(100) NOT NULL,
  `renglon29_2` varchar(25) NOT NULL,
  `renglon29_3` varchar(25) NOT NULL,
  `renglon29_4` varchar(1) NOT NULL,
  `renglon30` varchar(100) NOT NULL,
  `renglon30_2` varchar(25) NOT NULL,
  `renglon30_3` varchar(25) NOT NULL,
  `renglon30_4` varchar(1) NOT NULL,
  `visible_1` int(1) NOT NULL,
  `mostrar_1` int(1) NOT NULL,
  `cantidad_renglones` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_practica_complejo_ant`
--

CREATE TABLE `convenio_practica_complejo_ant` (
  `cod_practica` int(6) NOT NULL DEFAULT 0,
  `renglon1` varchar(100) NOT NULL,
  `renglon1_2` varchar(25) NOT NULL,
  `renglon1_3` varchar(25) NOT NULL,
  `renglon1_4` varchar(1) NOT NULL,
  `renglon2` varchar(100) NOT NULL,
  `renglon2_2` varchar(25) NOT NULL,
  `renglon2_3` varchar(25) NOT NULL,
  `renglon2_4` varchar(1) NOT NULL,
  `renglon3` varchar(100) NOT NULL,
  `renglon3_2` varchar(25) NOT NULL,
  `renglon3_3` varchar(25) NOT NULL,
  `renglon3_4` varchar(1) NOT NULL,
  `renglon4` varchar(100) NOT NULL,
  `renglon4_2` varchar(25) NOT NULL,
  `renglon4_3` varchar(25) NOT NULL,
  `renglon4_4` varchar(1) NOT NULL,
  `renglon5` varchar(100) NOT NULL,
  `renglon5_2` varchar(25) NOT NULL,
  `renglon5_3` varchar(25) NOT NULL,
  `renglon5_4` varchar(1) NOT NULL,
  `renglon6` varchar(100) NOT NULL,
  `renglon6_2` varchar(25) NOT NULL,
  `renglon6_3` varchar(25) NOT NULL,
  `renglon6_4` varchar(1) NOT NULL,
  `renglon7` varchar(100) NOT NULL,
  `renglon7_2` varchar(25) NOT NULL,
  `renglon7_3` varchar(25) NOT NULL,
  `renglon7_4` varchar(1) NOT NULL,
  `renglon8` varchar(100) NOT NULL,
  `renglon8_2` varchar(25) NOT NULL,
  `renglon8_3` varchar(25) NOT NULL,
  `renglon8_4` varchar(1) NOT NULL,
  `renglon9` varchar(100) NOT NULL,
  `renglon9_2` varchar(25) NOT NULL,
  `renglon9_3` varchar(25) NOT NULL,
  `renglon9_4` varchar(1) NOT NULL,
  `renglon10` varchar(100) NOT NULL,
  `renglon10_2` varchar(25) NOT NULL,
  `renglon10_3` varchar(25) NOT NULL,
  `renglon10_4` varchar(1) NOT NULL,
  `renglon11` varchar(100) NOT NULL,
  `renglon11_2` varchar(25) NOT NULL,
  `renglon11_3` varchar(25) NOT NULL,
  `renglon11_4` varchar(1) NOT NULL,
  `renglon12` varchar(100) NOT NULL,
  `renglon12_2` varchar(25) NOT NULL,
  `renglon12_3` varchar(25) NOT NULL,
  `renglon12_4` varchar(1) NOT NULL,
  `renglon13` varchar(100) NOT NULL,
  `renglon13_2` varchar(25) NOT NULL,
  `renglon13_3` varchar(25) NOT NULL,
  `renglon13_4` varchar(1) NOT NULL,
  `renglon14` varchar(100) NOT NULL,
  `renglon14_2` varchar(25) NOT NULL,
  `renglon14_3` varchar(25) NOT NULL,
  `renglon14_4` varchar(1) NOT NULL,
  `renglon15` varchar(100) NOT NULL,
  `renglon15_2` varchar(25) NOT NULL,
  `renglon15_3` varchar(25) NOT NULL,
  `renglon15_4` varchar(1) NOT NULL,
  `renglon16` varchar(100) NOT NULL,
  `renglon16_2` varchar(25) NOT NULL,
  `renglon16_3` varchar(25) NOT NULL,
  `renglon16_4` varchar(1) NOT NULL,
  `renglon17` varchar(100) NOT NULL,
  `renglon17_2` varchar(25) NOT NULL,
  `renglon17_3` varchar(25) NOT NULL,
  `renglon17_4` varchar(1) NOT NULL,
  `renglon18` varchar(100) NOT NULL,
  `renglon18_2` varchar(25) NOT NULL,
  `renglon18_3` varchar(25) NOT NULL,
  `renglon18_4` varchar(1) NOT NULL,
  `renglon19` varchar(100) NOT NULL,
  `renglon19_2` varchar(25) NOT NULL,
  `renglon19_3` varchar(25) NOT NULL,
  `renglon19_4` varchar(1) NOT NULL,
  `renglon20` varchar(100) NOT NULL,
  `renglon20_2` varchar(25) NOT NULL,
  `renglon20_3` varchar(25) NOT NULL,
  `renglon20_4` varchar(1) NOT NULL,
  `renglon21` varchar(100) NOT NULL,
  `renglon21_2` varchar(25) NOT NULL,
  `renglon21_3` varchar(25) NOT NULL,
  `renglon21_4` varchar(1) NOT NULL,
  `renglon22` varchar(100) NOT NULL,
  `renglon22_2` varchar(25) NOT NULL,
  `renglon22_3` varchar(25) NOT NULL,
  `renglon22_4` varchar(1) NOT NULL,
  `renglon23` varchar(100) NOT NULL,
  `renglon23_2` varchar(25) NOT NULL,
  `renglon23_3` varchar(25) NOT NULL,
  `renglon23_4` varchar(1) NOT NULL,
  `renglon24` varchar(100) NOT NULL,
  `renglon24_2` varchar(25) NOT NULL,
  `renglon24_3` varchar(25) NOT NULL,
  `renglon24_4` varchar(1) NOT NULL,
  `renglon25` varchar(100) NOT NULL,
  `renglon25_2` varchar(25) NOT NULL,
  `renglon25_3` varchar(25) NOT NULL,
  `renglon25_4` varchar(1) NOT NULL,
  `renglon26` varchar(100) NOT NULL,
  `renglon26_2` varchar(25) NOT NULL,
  `renglon26_3` varchar(25) NOT NULL,
  `renglon26_4` varchar(1) NOT NULL,
  `renglon27` varchar(100) NOT NULL,
  `renglon27_2` varchar(25) NOT NULL,
  `renglon27_3` varchar(25) NOT NULL,
  `renglon27_4` varchar(1) NOT NULL,
  `renglon28` varchar(100) NOT NULL,
  `renglon28_2` varchar(25) NOT NULL,
  `renglon28_3` varchar(25) NOT NULL,
  `renglon28_4` varchar(1) NOT NULL,
  `renglon29` varchar(100) NOT NULL,
  `renglon29_2` varchar(25) NOT NULL,
  `renglon29_3` varchar(25) NOT NULL,
  `renglon29_4` varchar(1) NOT NULL,
  `renglon30` varchar(100) NOT NULL,
  `renglon30_2` varchar(25) NOT NULL,
  `renglon30_3` varchar(25) NOT NULL,
  `renglon30_4` varchar(1) NOT NULL,
  `visible_1` int(1) NOT NULL,
  `mostrar_1` int(1) NOT NULL,
  `cantidad_renglones` int(3) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_practica_factura`
--

CREATE TABLE `convenio_practica_factura` (
  `cod_practica` int(6) NOT NULL DEFAULT 0,
  `nro_os` varchar(6) NOT NULL DEFAULT '0',
  `cod_equivalencia` varchar(6) NOT NULL DEFAULT '',
  `categoria` int(2) NOT NULL DEFAULT 0,
  `honorarios` decimal(6,2) NOT NULL DEFAULT 0.00,
  `gastos` decimal(6,2) NOT NULL DEFAULT 0.00,
  `valor` decimal(6,2) NOT NULL DEFAULT 0.00,
  `practica` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_practica_modulo`
--

CREATE TABLE `convenio_practica_modulo` (
  `cod_practica` int(6) NOT NULL DEFAULT 0,
  `modulo1` int(6) NOT NULL,
  `modulo2` int(6) NOT NULL,
  `modulo3` int(6) NOT NULL,
  `modulo4` int(6) NOT NULL,
  `modulo5` int(6) NOT NULL,
  `modulo6` int(6) NOT NULL,
  `modulo7` int(6) NOT NULL,
  `modulo8` int(6) NOT NULL,
  `modulo9` int(6) NOT NULL,
  `modulo10` int(6) NOT NULL,
  `modulo11` int(6) NOT NULL,
  `modulo12` int(6) NOT NULL,
  `modulo13` int(6) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_referencia`
--

CREATE TABLE `convenio_referencia` (
  `cod_practica` int(6) NOT NULL DEFAULT 0,
  `cod_operacion` int(10) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `desde` decimal(10,2) NOT NULL,
  `hasta` decimal(10,2) NOT NULL,
  `unidades` varchar(10) NOT NULL,
  `columna1` varchar(30) NOT NULL,
  `columna2` varchar(20) NOT NULL,
  `anio_d` int(10) NOT NULL,
  `anio_h` int(10) NOT NULL,
  `nro_ref` int(6) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_referencia_ant`
--

CREATE TABLE `convenio_referencia_ant` (
  `cod_practica` int(6) NOT NULL DEFAULT 0,
  `cod_operacion` int(10) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `desde` decimal(10,2) NOT NULL,
  `hasta` decimal(10,2) NOT NULL,
  `unidades` varchar(10) NOT NULL,
  `columna1` varchar(30) NOT NULL,
  `columna2` varchar(20) NOT NULL,
  `anio_d` int(10) NOT NULL,
  `anio_h` int(10) NOT NULL,
  `nro_ref` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio_referencia_backup`
--

CREATE TABLE `convenio_referencia_backup` (
  `cod_practica` int(6) NOT NULL DEFAULT 0,
  `cod_operacion` int(10) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `desde` decimal(10,2) NOT NULL,
  `hasta` decimal(10,2) NOT NULL,
  `unidades` varchar(10) NOT NULL,
  `columna1` varchar(30) NOT NULL,
  `columna2` varchar(20) NOT NULL,
  `anio_d` int(10) NOT NULL,
  `anio_h` int(10) NOT NULL,
  `nro_ref` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_caratula`
--

CREATE TABLE `datos_caratula` (
  `caratula` varchar(1) NOT NULL DEFAULT '',
  `matricula` varchar(6) NOT NULL DEFAULT '',
  `direccion` varchar(50) NOT NULL DEFAULT '',
  `telefono` varchar(20) NOT NULL DEFAULT '',
  `localidad` varchar(20) NOT NULL DEFAULT '',
  `mail` varchar(50) NOT NULL DEFAULT '',
  `id` int(5) NOT NULL,
  `renglon1` varchar(100) NOT NULL,
  `renglon3` varchar(100) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_estudio`
--

CREATE TABLE `datos_estudio` (
  `matricula` varchar(10) NOT NULL DEFAULT '',
  `fecha_egresado` varchar(10) NOT NULL DEFAULT '',
  `universidad` varchar(35) NOT NULL DEFAULT '',
  `titulo` varchar(35) NOT NULL DEFAULT '',
  `fecha_abm` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_laboratorio`
--

CREATE TABLE `datos_laboratorio` (
  `nro_laboratorio` int(5) NOT NULL DEFAULT 0,
  `matricula` int(5) NOT NULL DEFAULT 0,
  `nombre_laboratorio` varchar(40) NOT NULL DEFAULT '',
  `tipo_sociedad` varchar(10) NOT NULL DEFAULT '',
  `cantidad` varchar(10) NOT NULL DEFAULT '',
  `categoria_lab` char(3) NOT NULL DEFAULT '',
  `fecha_habilitacion` varchar(10) NOT NULL DEFAULT '',
  `fecha_inicio` varchar(10) NOT NULL DEFAULT '',
  `fecha_vencimiento` varchar(10) NOT NULL DEFAULT '',
  `integrantes` varchar(10) NOT NULL DEFAULT '',
  `especialidad` varchar(10) NOT NULL DEFAULT '',
  `orientacion` varchar(10) NOT NULL DEFAULT '',
  `departamento` varchar(10) NOT NULL DEFAULT '',
  `domicilio` varchar(50) NOT NULL DEFAULT '',
  `nro_domicilio` varchar(10) NOT NULL DEFAULT '',
  `referencia` varchar(10) NOT NULL DEFAULT '',
  `localidad` varchar(25) NOT NULL DEFAULT '',
  `cod_postal` varchar(10) NOT NULL DEFAULT '',
  `telefono` int(25) NOT NULL DEFAULT 0,
  `celular` varchar(10) NOT NULL DEFAULT '',
  `fax` varchar(10) NOT NULL DEFAULT '',
  `email` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_orden`
--

CREATE TABLE `datos_orden` (
  `orden` varchar(2) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_os`
--

CREATE TABLE `datos_os` (
  `nro_os` int(10) NOT NULL DEFAULT 0,
  `domicilio_n` varchar(30) NOT NULL DEFAULT '',
  `localidad_n` varchar(25) NOT NULL DEFAULT '',
  `cod_area_n` varchar(7) NOT NULL DEFAULT '',
  `telefono_n` int(10) NOT NULL DEFAULT 0,
  `telefax_n` int(10) NOT NULL DEFAULT 0,
  `denominacion` varchar(40) NOT NULL DEFAULT '',
  `sigla` varchar(20) NOT NULL DEFAULT '',
  `cod_postal_n` int(10) NOT NULL DEFAULT 0,
  `email_n` varchar(50) NOT NULL DEFAULT '',
  `cuit` varchar(15) NOT NULL DEFAULT '',
  `nro_prestador` varchar(10) NOT NULL DEFAULT '',
  `contacto` varchar(10) NOT NULL DEFAULT '',
  `nivel` varchar(10) NOT NULL DEFAULT '',
  `cargo` varchar(10) NOT NULL DEFAULT '',
  `domi_facturacion` varchar(30) NOT NULL DEFAULT '',
  `domicilio_l` varchar(30) NOT NULL DEFAULT '',
  `cod_area_l` int(7) NOT NULL DEFAULT 0,
  `telefono_l` int(10) NOT NULL DEFAULT 0,
  `telefax_l` int(10) NOT NULL DEFAULT 0,
  `localidad_l` varchar(25) NOT NULL DEFAULT '',
  `cod_postal_l` int(10) NOT NULL DEFAULT 0,
  `email_l` varchar(50) NOT NULL DEFAULT '',
  `inscripcion` varchar(10) NOT NULL DEFAULT '',
  `activa` int(1) NOT NULL,
  `ws` int(1) NOT NULL,
  `nro_os_facturar` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_os1`
--

CREATE TABLE `datos_os1` (
  `nro_os` int(10) NOT NULL DEFAULT 0,
  `domicilio_n` varchar(30) NOT NULL DEFAULT '',
  `localidad_n` varchar(25) NOT NULL DEFAULT '',
  `cod_area_n` varchar(7) NOT NULL DEFAULT '',
  `telefono_n` int(10) NOT NULL DEFAULT 0,
  `telefax_n` int(10) NOT NULL DEFAULT 0,
  `denominacion` varchar(40) NOT NULL DEFAULT '',
  `sigla` varchar(20) NOT NULL DEFAULT '',
  `cod_postal_n` int(10) NOT NULL DEFAULT 0,
  `email_n` varchar(50) NOT NULL DEFAULT '',
  `cuit` varchar(15) NOT NULL DEFAULT '',
  `nro_prestador` varchar(10) NOT NULL DEFAULT '',
  `contacto` varchar(10) NOT NULL DEFAULT '',
  `nivel` varchar(10) NOT NULL DEFAULT '',
  `cargo` varchar(10) NOT NULL DEFAULT '',
  `domi_facturacion` varchar(30) NOT NULL DEFAULT '',
  `domicilio_l` varchar(30) NOT NULL DEFAULT '',
  `cod_area_l` int(7) NOT NULL DEFAULT 0,
  `telefono_l` int(10) NOT NULL DEFAULT 0,
  `telefax_l` int(10) NOT NULL DEFAULT 0,
  `localidad_l` varchar(25) NOT NULL DEFAULT '',
  `cod_postal_l` int(10) NOT NULL DEFAULT 0,
  `email_l` varchar(50) NOT NULL DEFAULT '',
  `inscripcion` varchar(10) NOT NULL DEFAULT '',
  `activa` int(1) NOT NULL,
  `ws` int(1) NOT NULL,
  `nro_os_facturar` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_osde`
--

CREATE TABLE `datos_osde` (
  `cod_operacion` int(2) NOT NULL,
  `id` int(3) NOT NULL,
  `prestador` varchar(30) NOT NULL,
  `cuit` varchar(20) NOT NULL,
  `sucursal` varchar(3) NOT NULL,
  `cuenta_abm` int(6) NOT NULL,
  `sucursal_swiss` varchar(4) NOT NULL,
  `matricula_swiss` int(10) NOT NULL,
  `cuit_swiss` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_os_abm`
--

CREATE TABLE `datos_os_abm` (
  `nro_os` int(10) NOT NULL DEFAULT 0,
  `domicilio_n` varchar(30) NOT NULL DEFAULT '',
  `localidad_n` varchar(25) NOT NULL DEFAULT '',
  `cod_area_n` varchar(7) NOT NULL DEFAULT '',
  `telefono_n` int(10) NOT NULL DEFAULT 0,
  `telefax_n` int(10) NOT NULL DEFAULT 0,
  `denominacion` varchar(40) NOT NULL DEFAULT '',
  `sigla` varchar(20) NOT NULL DEFAULT '',
  `cod_postal_n` int(10) NOT NULL DEFAULT 0,
  `email_n` varchar(50) NOT NULL DEFAULT '',
  `cuit` varchar(15) NOT NULL DEFAULT '',
  `nro_prestador` varchar(10) NOT NULL DEFAULT '',
  `contacto` varchar(10) NOT NULL DEFAULT '',
  `nivel` varchar(10) NOT NULL DEFAULT '',
  `cargo` varchar(10) NOT NULL DEFAULT '',
  `domi_facturacion` varchar(30) NOT NULL DEFAULT '',
  `domicilio_l` varchar(30) NOT NULL DEFAULT '',
  `cod_area_l` int(7) NOT NULL DEFAULT 0,
  `telefono_l` int(10) NOT NULL DEFAULT 0,
  `telefax_l` int(10) NOT NULL DEFAULT 0,
  `localidad_l` varchar(25) NOT NULL DEFAULT '',
  `cod_postal_l` int(10) NOT NULL DEFAULT 0,
  `email_l` varchar(50) NOT NULL DEFAULT '',
  `inscripcion` varchar(10) NOT NULL DEFAULT '',
  `activa` int(1) NOT NULL,
  `ws` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_os_ant`
--

CREATE TABLE `datos_os_ant` (
  `nro_os` int(10) NOT NULL DEFAULT 0,
  `denominacion` varchar(40) NOT NULL DEFAULT '',
  `sigla` varchar(20) NOT NULL DEFAULT '',
  `domicilio_n` varchar(30) NOT NULL DEFAULT '',
  `cod_area_n` varchar(7) NOT NULL DEFAULT '',
  `telefono_n` int(10) NOT NULL DEFAULT 0,
  `telefax_n` int(10) NOT NULL DEFAULT 0,
  `localidad_n` varchar(25) NOT NULL DEFAULT '',
  `cod_postal_n` int(10) NOT NULL DEFAULT 0,
  `email_n` varchar(50) NOT NULL DEFAULT '',
  `domicilio_l` varchar(30) NOT NULL DEFAULT '',
  `cod_area_l` varchar(7) NOT NULL DEFAULT '',
  `telefono_l` int(10) NOT NULL DEFAULT 0,
  `telefax_l` int(10) NOT NULL DEFAULT 0,
  `localidad_l` varchar(25) NOT NULL DEFAULT '',
  `cod_postal_l` int(10) NOT NULL DEFAULT 0,
  `email_l` varchar(50) NOT NULL DEFAULT '',
  `inscripcion` varchar(10) NOT NULL DEFAULT '',
  `cuit` varchar(15) NOT NULL DEFAULT '',
  `nro_prestador` varchar(10) NOT NULL DEFAULT '',
  `contacto` varchar(10) NOT NULL DEFAULT '',
  `nivel` varchar(10) NOT NULL DEFAULT '',
  `cargo` varchar(10) NOT NULL DEFAULT '',
  `domi_facturacion` varchar(30) NOT NULL DEFAULT '',
  `webservice` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `matricula` int(5) NOT NULL DEFAULT 0,
  `apellido` varchar(30) NOT NULL DEFAULT '',
  `nombre` varchar(30) NOT NULL DEFAULT '',
  `apellido_materno` varchar(15) NOT NULL DEFAULT '',
  `fecha_nac` date NOT NULL DEFAULT '0000-00-00',
  `estado_civil` varchar(20) NOT NULL DEFAULT '',
  `sexo` varchar(9) NOT NULL DEFAULT '',
  `tipo_doc` varchar(5) NOT NULL DEFAULT '',
  `documento` varchar(20) NOT NULL DEFAULT '',
  `telefono` varchar(10) NOT NULL DEFAULT '',
  `celular` varchar(11) NOT NULL DEFAULT '',
  `fax` varchar(11) NOT NULL DEFAULT '',
  `e_mail` varchar(30) NOT NULL DEFAULT '',
  `domicilio` varchar(40) NOT NULL DEFAULT '',
  `nro_domicilio` varchar(5) NOT NULL DEFAULT '',
  `referencia` varchar(40) NOT NULL DEFAULT '',
  `localidad` varchar(30) NOT NULL DEFAULT '',
  `departamento` varchar(30) NOT NULL DEFAULT '',
  `cod_postal` varchar(8) NOT NULL DEFAULT '',
  `nom_esposa` varchar(30) NOT NULL DEFAULT '',
  `estado` varchar(20) NOT NULL DEFAULT '',
  `fecha_estado` date NOT NULL DEFAULT '0000-00-00',
  `cuenta_descontar_cuota` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_principales`
--

CREATE TABLE `datos_principales` (
  `nombre_laboratorio` varchar(50) NOT NULL DEFAULT '',
  `matricula` varchar(6) NOT NULL DEFAULT '',
  `direccion` varchar(50) NOT NULL DEFAULT '',
  `telefono` varchar(20) NOT NULL DEFAULT '',
  `localidad` varchar(20) NOT NULL DEFAULT '',
  `mail` varchar(50) NOT NULL DEFAULT '',
  `cuit` varchar(15) NOT NULL,
  `ingresos_brutos` varchar(20) NOT NULL,
  `comercio` int(10) NOT NULL,
  `inicio_actividad` date NOT NULL,
  `id` int(5) NOT NULL,
  `renglon1` varchar(100) NOT NULL,
  `renglon3` varchar(100) NOT NULL,
  `terminal` varchar(4) NOT NULL,
  `renglon1_b` varchar(80) NOT NULL,
  `renglon2_b` varchar(80) NOT NULL,
  `renglon3_b` varchar(80) NOT NULL,
  `domicilio_b` varchar(80) NOT NULL,
  `localidad_b` varchar(80) NOT NULL,
  `telefono_b` varchar(80) NOT NULL,
  `mail_b` varchar(80) NOT NULL,
  `renglon1_c` varchar(80) NOT NULL,
  `renglon2_c` varchar(80) NOT NULL,
  `renglon3_c` varchar(80) NOT NULL,
  `domicilio_c` varchar(80) NOT NULL,
  `localidad_c` varchar(80) NOT NULL,
  `telefono_c` varchar(80) NOT NULL,
  `mail_c` varchar(100) NOT NULL,
  `renglon1_d` varchar(80) NOT NULL,
  `renglon2_d` varchar(80) NOT NULL,
  `renglon3_d` varchar(80) NOT NULL,
  `domicilio_d` varchar(80) NOT NULL,
  `localidad_d` varchar(80) NOT NULL,
  `telefono_d` varchar(80) NOT NULL,
  `mail_d` varchar(80) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_profesional`
--

CREATE TABLE `datos_profesional` (
  `matricula` int(5) NOT NULL DEFAULT 0,
  `publico_cargo` varchar(10) NOT NULL DEFAULT '',
  `cargo` varchar(25) NOT NULL DEFAULT '',
  `establecimiento` varchar(35) NOT NULL DEFAULT '',
  `fecha_nombramiento` varchar(10) NOT NULL DEFAULT '',
  `telefono` varchar(10) NOT NULL DEFAULT '',
  `docente` varchar(25) NOT NULL DEFAULT '',
  `fecha_inicio` varchar(10) NOT NULL DEFAULT '',
  `nivel` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `valor` decimal(10,2) NOT NULL DEFAULT 0.00,
  `periodo` int(4) NOT NULL DEFAULT 0,
  `ano` varchar(4) NOT NULL DEFAULT '',
  `nro_factura` int(10) NOT NULL DEFAULT 0,
  `confirmada` char(2) NOT NULL DEFAULT '',
  `cod_operacion` int(5) NOT NULL,
  `marca` varchar(10) NOT NULL DEFAULT '',
  `lote` varchar(20) NOT NULL DEFAULT '',
  `operador` varchar(4) NOT NULL DEFAULT '',
  `categoria` int(1) NOT NULL DEFAULT 0,
  `coseguro` decimal(6,2) NOT NULL DEFAULT 0.00,
  `tipo_fact` char(1) NOT NULL DEFAULT '',
  `prioridad` int(1) NOT NULL DEFAULT 0,
  `imprimir` int(1) NOT NULL,
  `deriva` int(1) NOT NULL,
  `cod_mega` varchar(12) NOT NULL,
  `nro_lab` int(2) NOT NULL,
  `fecha` date NOT NULL,
  `clase` int(1) NOT NULL,
  `enter` int(1) NOT NULL,
  `nro_ref` int(1) NOT NULL,
  `orden` int(11) NOT NULL,
  `facturar` int(1) NOT NULL,
  `completo` int(1) NOT NULL,
  `cod_autorizacion` int(12) NOT NULL,
  `PracticaObs` varchar(20) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_aglutininas`
--

CREATE TABLE `detalle_aglutininas` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `salino` int(6) NOT NULL,
  `albuminoso` int(6) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_antibiograma`
--

CREATE TABLE `detalle_antibiograma` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `sensible1` varchar(30) NOT NULL,
  `sensible2` varchar(30) NOT NULL,
  `sensible3` varchar(30) NOT NULL,
  `sensible4` varchar(30) NOT NULL,
  `sensible5` varchar(30) NOT NULL,
  `sensible6` varchar(30) NOT NULL,
  `sensible7` varchar(30) NOT NULL,
  `med_sensible1` varchar(30) NOT NULL,
  `med_sensible2` varchar(30) NOT NULL,
  `med_sensible3` varchar(30) NOT NULL,
  `med_sensible4` varchar(30) NOT NULL,
  `med_sensible5` varchar(30) NOT NULL,
  `med_sensible6` varchar(30) NOT NULL,
  `med_sensible7` varchar(30) NOT NULL,
  `resistente1` varchar(30) NOT NULL,
  `resistente2` varchar(30) NOT NULL,
  `resistente3` varchar(30) NOT NULL,
  `resistente4` varchar(30) NOT NULL,
  `resistente5` varchar(30) NOT NULL,
  `resistente6` varchar(30) NOT NULL,
  `resistente7` varchar(30) NOT NULL,
  `observaciones` varchar(120) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_antibiograma_ant`
--

CREATE TABLE `detalle_antibiograma_ant` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `s1` varchar(60) NOT NULL,
  `s2` varchar(60) NOT NULL,
  `s3` varchar(60) NOT NULL,
  `s4` varchar(60) NOT NULL,
  `s5` varchar(60) NOT NULL,
  `r1` varchar(60) NOT NULL,
  `r2` varchar(60) NOT NULL,
  `r3` varchar(60) NOT NULL,
  `r4` varchar(60) NOT NULL,
  `r5` varchar(60) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_antigeno`
--

CREATE TABLE `detalle_antigeno` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `enzima` decimal(10,2) NOT NULL,
  `elisa` decimal(10,2) NOT NULL,
  `razon_porcentual` decimal(10,2) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_bacteriologico`
--

CREATE TABLE `detalle_bacteriologico` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `muestra` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `aspecto` varchar(30) NOT NULL,
  `obs_micro` varchar(120) NOT NULL,
  `nicolle` varchar(120) NOT NULL,
  `cultivo` varchar(120) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_bilirrubina`
--

CREATE TABLE `detalle_bilirrubina` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `total` decimal(6,2) NOT NULL,
  `directa` decimal(6,2) NOT NULL,
  `indirecta` decimal(6,2) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_calcio`
--

CREATE TABLE `detalle_calcio` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `diuresis` int(6) NOT NULL,
  `valor_hallado` int(6) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_clearence`
--

CREATE TABLE `detalle_clearence` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `creatinemia` decimal(10,2) NOT NULL,
  `creatinuria` decimal(10,2) NOT NULL,
  `diuresis` decimal(10,2) NOT NULL,
  `sup_corporal` decimal(10,2) NOT NULL,
  `clearence` int(6) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `volumen` decimal(10,2) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_coagulograma`
--

CREATE TABLE `detalle_coagulograma` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `min` int(3) NOT NULL,
  `seg` int(3) NOT NULL,
  `porcentaje` decimal(10,2) NOT NULL,
  `ttpk_seg` int(3) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `sangria` int(10) NOT NULL,
  `plaquetas` int(10) NOT NULL,
  `seg_coa` int(6) NOT NULL,
  `seg_san` int(6) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_complejos`
--

CREATE TABLE `detalle_complejos` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `valor1` varchar(80) NOT NULL DEFAULT '0.00',
  `valor2` varchar(80) NOT NULL,
  `valor3` varchar(80) NOT NULL,
  `valor4` varchar(80) NOT NULL,
  `valor5` varchar(80) NOT NULL,
  `valor6` varchar(80) NOT NULL,
  `valor7` varchar(80) NOT NULL,
  `valor8` varchar(80) NOT NULL,
  `valor9` varchar(80) NOT NULL,
  `valor10` varchar(80) NOT NULL,
  `valor11` varchar(80) NOT NULL,
  `valor12` varchar(80) NOT NULL,
  `valor13` varchar(80) NOT NULL,
  `valor14` varchar(80) NOT NULL,
  `valor15` varchar(80) NOT NULL,
  `valor16` varchar(80) NOT NULL,
  `valor17` varchar(100) NOT NULL,
  `valor18` varchar(80) NOT NULL,
  `valor19` varchar(80) NOT NULL,
  `valor20` varchar(80) NOT NULL,
  `valor21` varchar(80) NOT NULL,
  `valor22` varchar(80) NOT NULL,
  `valor23` varchar(80) NOT NULL,
  `valor24` varchar(80) NOT NULL,
  `valor25` varchar(80) NOT NULL,
  `valor26` varchar(80) NOT NULL,
  `valor27` varchar(80) NOT NULL,
  `valor28` varchar(80) NOT NULL,
  `valor29` varchar(80) NOT NULL,
  `valor30` varchar(80) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_coombs`
--

CREATE TABLE `detalle_coombs` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `salino` varchar(20) NOT NULL,
  `albuminoso` varchar(20) NOT NULL,
  `coombs` varchar(20) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_coprocultivo`
--

CREATE TABLE `detalle_coprocultivo` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `celulas_epiteliales` varchar(80) NOT NULL,
  `leucocitos` varchar(80) NOT NULL,
  `piocitos` varchar(80) NOT NULL,
  `hematies` varchar(80) NOT NULL,
  `mucus` varchar(80) NOT NULL,
  `mucus1` varchar(80) NOT NULL,
  `mucus2` varchar(80) NOT NULL,
  `nicolle` varchar(80) NOT NULL,
  `nicolle1` varchar(80) NOT NULL,
  `nicolle2` varchar(80) NOT NULL,
  `cultivo` varchar(80) NOT NULL,
  `cultivo1` varchar(80) NOT NULL,
  `cultivo2` varchar(80) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_curva`
--

CREATE TABLE `detalle_curva` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `basal` int(6) NOT NULL,
  `a30` int(6) NOT NULL,
  `a60` int(6) NOT NULL,
  `a120` int(6) NOT NULL,
  `a180` int(6) NOT NULL,
  `basal_mg` int(6) NOT NULL,
  `a30mg` int(6) NOT NULL,
  `a60mg` int(6) NOT NULL,
  `a120mg` int(6) NOT NULL,
  `a180mg` int(6) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_espermo`
--

CREATE TABLE `detalle_espermo` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `abstinencia` varchar(50) NOT NULL,
  `recoleccion` varchar(50) NOT NULL,
  `eyaculacion` decimal(10,2) NOT NULL,
  `ambiente` varchar(3) NOT NULL,
  `volumen` decimal(10,2) NOT NULL,
  `licuacion` decimal(10,2) NOT NULL,
  `aspecto` varchar(50) NOT NULL,
  `viscocidad` varchar(50) NOT NULL,
  `coloracion` varchar(50) NOT NULL,
  `ph` decimal(10,1) NOT NULL,
  `mm3` varchar(50) NOT NULL,
  `ml` varchar(50) NOT NULL,
  `desplazamiento_rapido` varchar(10) NOT NULL,
  `desplazamiento_lento` varchar(10) NOT NULL,
  `no_progresiva` varchar(10) NOT NULL,
  `inmoviles` varchar(10) NOT NULL,
  `inmoviles_vivos` varchar(10) NOT NULL,
  `inmoviles_muertos` varchar(10) NOT NULL,
  `otros_elementos` text NOT NULL,
  `normales` varchar(10) NOT NULL,
  `anormales` varchar(10) NOT NULL,
  `fructuosa` varchar(10) NOT NULL,
  `citrico` varchar(10) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_espermograma`
--

CREATE TABLE `detalle_espermograma` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `color` varchar(80) NOT NULL,
  `grumos` varchar(80) NOT NULL,
  `viscocidad` varchar(80) NOT NULL,
  `volumen` decimal(10,2) NOT NULL,
  `ph` decimal(10,2) NOT NULL,
  `espermatozoides` varchar(80) NOT NULL,
  `celulas` varchar(80) NOT NULL,
  `leucocitos` varchar(80) NOT NULL,
  `piocitos` varchar(80) NOT NULL,
  `hematies` varchar(80) NOT NULL,
  `nro_espermatozoides` int(15) NOT NULL,
  `grado_a` int(10) NOT NULL,
  `grado_b` int(10) NOT NULL,
  `grado_c` int(10) NOT NULL,
  `grado_d` int(10) NOT NULL,
  `normales` int(10) NOT NULL,
  `anomalias_cabeza` int(10) NOT NULL,
  `anomalias_segmentado` int(10) NOT NULL,
  `anomalias_cola` int(10) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_espermo_otro1`
--

CREATE TABLE `detalle_espermo_otro1` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `volumen` decimal(10,1) NOT NULL,
  `aspecto` varchar(30) NOT NULL,
  `viscocidad` varchar(30) NOT NULL,
  `reaccion` varchar(30) NOT NULL,
  `ph` decimal(10,1) NOT NULL,
  `licuacion` varchar(30) NOT NULL,
  `directo` varchar(30) NOT NULL,
  `citomorfologico` varchar(30) NOT NULL,
  `espermios_ml` int(12) NOT NULL,
  `espermios_vol_eyaculado` int(12) NOT NULL,
  `espermios_ovales` decimal(10,1) NOT NULL,
  `megaloespermas` decimal(10,1) NOT NULL,
  `piriformes` decimal(10,1) NOT NULL,
  `microespermas` decimal(10,1) NOT NULL,
  `celulas_duplicadas` decimal(10,1) NOT NULL,
  `amorfo` decimal(10,1) NOT NULL,
  `leucocitos` varchar(30) NOT NULL,
  `piocitos` varchar(30) NOT NULL,
  `celulas_planas` varchar(30) NOT NULL,
  `conglomerado_espermios` varchar(30) NOT NULL,
  `motilidad` int(8) NOT NULL,
  `formas_moviles` int(8) NOT NULL,
  `formas_inmoviles` int(8) NOT NULL,
  `tipo_movilidad` varchar(30) NOT NULL,
  `desplazamiento_rapido` int(8) NOT NULL,
  `desplazamiento_lento` int(8) NOT NULL,
  `desplazamiento_muy_lento` int(8) NOT NULL,
  `eosina_negativa` int(8) NOT NULL,
  `eosina_positiva` int(8) NOT NULL,
  `metileno` varchar(30) NOT NULL,
  `fructosa` decimal(10,1) NOT NULL,
  `citrico` decimal(10,1) NOT NULL,
  `ascorbico` decimal(10,1) NOT NULL,
  `ascorbicos_analogos` decimal(10,1) NOT NULL,
  `analogos` decimal(10,1) NOT NULL,
  `real` decimal(10,1) NOT NULL,
  `fosfatasa` decimal(10,1) NOT NULL,
  `glicerilfosforilcolina` decimal(10,1) NOT NULL,
  `otros_elementos` varchar(30) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_exudado`
--

CREATE TABLE `detalle_exudado` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `muestra` varchar(120) NOT NULL,
  `coloracion` varchar(120) NOT NULL,
  `cultivo` varchar(120) NOT NULL,
  `cultivo1` varchar(100) NOT NULL,
  `cultivo2` varchar(100) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_fecal`
--

CREATE TABLE `detalle_fecal` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `macroscopico` varchar(120) NOT NULL DEFAULT '',
  `metodo_macro` varchar(120) NOT NULL DEFAULT '',
  `microscopico` varchar(120) NOT NULL DEFAULT '',
  `metodo_micro` varchar(120) NOT NULL DEFAULT '',
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_fecal_373`
--

CREATE TABLE `detalle_fecal_373` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `consistencia` varchar(50) NOT NULL,
  `forma` varchar(50) NOT NULL,
  `externo` varchar(50) NOT NULL,
  `interno` varchar(50) NOT NULL,
  `mucus` varchar(50) NOT NULL,
  `mucoides` varchar(50) NOT NULL,
  `mucomembranas` varchar(50) NOT NULL,
  `pus` varchar(50) NOT NULL,
  `sangre` varchar(50) NOT NULL,
  `conjuntivo` varchar(50) NOT NULL,
  `carne` varchar(50) NOT NULL,
  `feculentos` varchar(50) NOT NULL,
  `grasos` varchar(50) NOT NULL,
  `otros` varchar(50) NOT NULL,
  `bien_digeridas` varchar(50) NOT NULL,
  `mal_digeridas` varchar(50) NOT NULL,
  `acumulos` varchar(50) NOT NULL,
  `libre` varchar(50) NOT NULL,
  `grasas` varchar(50) NOT NULL,
  `acidos` varchar(50) NOT NULL,
  `jabones` varchar(50) NOT NULL,
  `almidon_incluido` varchar(50) NOT NULL,
  `almidon_amorfo` varchar(50) NOT NULL,
  `almidon_crudo` varchar(50) NOT NULL,
  `celulosa_digestible` varchar(50) NOT NULL,
  `celulosa_indigestible` varchar(50) NOT NULL,
  `cristales` varchar(50) NOT NULL,
  `moco` varchar(50) NOT NULL,
  `pus_int` varchar(50) NOT NULL,
  `sangre_int` varchar(50) NOT NULL,
  `reaccion` varchar(50) NOT NULL,
  `bilirubina` varchar(50) NOT NULL,
  `estercobilina` varchar(50) NOT NULL,
  `acidos_organicos` decimal(10,2) NOT NULL,
  `amoniaco` decimal(10,2) NOT NULL,
  `mucina` varchar(50) NOT NULL,
  `proteinas` varchar(50) NOT NULL,
  `albumosas` varchar(50) NOT NULL,
  `peptonas` varchar(50) NOT NULL,
  `flora` varchar(50) NOT NULL,
  `criterio` varchar(50) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_fosforo`
--

CREATE TABLE `detalle_fosforo` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `diuresis` int(6) NOT NULL,
  `valor_hallado` int(6) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_hemo`
--

CREATE TABLE `detalle_hemo` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `hematies` decimal(10,2) NOT NULL DEFAULT 0.00,
  `hemoglobina` decimal(10,2) NOT NULL DEFAULT 0.00,
  `hematocrito` decimal(10,2) NOT NULL DEFAULT 0.00,
  `reticulocitos` decimal(10,2) NOT NULL DEFAULT 0.00,
  `plaquetas` decimal(10,2) NOT NULL DEFAULT 0.00,
  `mcv` decimal(10,2) NOT NULL DEFAULT 0.00,
  `mch` decimal(10,2) NOT NULL DEFAULT 0.00,
  `mchc` decimal(10,2) NOT NULL DEFAULT 0.00,
  `leucocitos` decimal(10,2) NOT NULL DEFAULT 0.00,
  `neutro_cayado` decimal(10,2) NOT NULL DEFAULT 0.00,
  `neutro_segmentado` decimal(10,2) NOT NULL DEFAULT 0.00,
  `eosinofilos` decimal(10,2) NOT NULL DEFAULT 0.00,
  `basofilos` decimal(10,2) NOT NULL DEFAULT 0.00,
  `linfocitos` decimal(10,2) NOT NULL DEFAULT 0.00,
  `monocitos` decimal(10,2) NOT NULL DEFAULT 0.00,
  `carac_plaquetas` varchar(120) NOT NULL DEFAULT '0',
  `carac_leucocitos` varchar(120) NOT NULL DEFAULT '0',
  `carac_hematies` varchar(120) NOT NULL DEFAULT '0',
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `cod_operacion` int(10) NOT NULL,
  `formula` varchar(2) NOT NULL,
  `carac_hematies2` varchar(120) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_hemoglobina`
--

CREATE TABLE `detalle_hemoglobina` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `albumina` decimal(10,2) NOT NULL DEFAULT 0.00,
  `alfa_1` decimal(10,2) NOT NULL DEFAULT 0.00,
  `alfa_2` decimal(10,2) NOT NULL DEFAULT 0.00,
  `beta` decimal(10,2) NOT NULL DEFAULT 0.00,
  `gamma` decimal(10,2) NOT NULL DEFAULT 0.00,
  `relacion_ag` decimal(10,2) NOT NULL DEFAULT 0.00,
  `proteinas_totales` decimal(10,2) NOT NULL DEFAULT 0.00,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_hepatograma`
--

CREATE TABLE `detalle_hepatograma` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `aspartato` int(10) NOT NULL,
  `alanina` int(10) NOT NULL,
  `fosfatasa` int(10) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `directa` decimal(10,2) NOT NULL,
  `indirecta` decimal(10,2) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_iono`
--

CREATE TABLE `detalle_iono` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `natremia` int(6) NOT NULL,
  `kalemia` decimal(6,1) NOT NULL,
  `cloremia` int(6) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_iono_urinario`
--

CREATE TABLE `detalle_iono_urinario` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `resultado` int(6) NOT NULL,
  `sodio` int(6) NOT NULL,
  `potasio` int(6) NOT NULL,
  `cloro` int(6) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_lipidograma`
--

CREATE TABLE `detalle_lipidograma` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `suero` int(6) NOT NULL,
  `quilomicrones` int(6) NOT NULL,
  `beta` int(6) NOT NULL,
  `prebeta` int(6) NOT NULL,
  `alfa` int(5) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_magnesio`
--

CREATE TABLE `detalle_magnesio` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `diuresis` int(6) NOT NULL,
  `valor_hallado` int(6) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_modulo`
--

CREATE TABLE `detalle_modulo` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `modulo1` text NOT NULL,
  `modulo2` varchar(25) NOT NULL,
  `modulo3` varchar(25) NOT NULL,
  `modulo4` varchar(25) NOT NULL,
  `modulo5` varchar(25) NOT NULL,
  `modulo6` varchar(25) NOT NULL,
  `modulo7` varchar(25) NOT NULL,
  `modulo8` varchar(25) NOT NULL,
  `modulo9` varchar(25) NOT NULL,
  `modulo10` varchar(25) NOT NULL,
  `modulo11` varchar(25) NOT NULL,
  `modulo12` varchar(25) NOT NULL,
  `modulo13` varchar(25) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orina`
--

CREATE TABLE `detalle_orina` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `densidad` varchar(10) NOT NULL DEFAULT '0',
  `color` varchar(25) NOT NULL DEFAULT '',
  `aspecto` varchar(25) NOT NULL DEFAULT '',
  `sedimento` varchar(25) NOT NULL DEFAULT '',
  `reaccion` varchar(25) NOT NULL DEFAULT '',
  `proteinas` varchar(25) NOT NULL DEFAULT '',
  `glucosa` varchar(25) NOT NULL DEFAULT '',
  `biliares` varchar(25) NOT NULL DEFAULT '',
  `cetonicos` varchar(25) NOT NULL DEFAULT '',
  `hemoglobina` varchar(25) NOT NULL DEFAULT '',
  `epiteliales` varchar(25) NOT NULL DEFAULT '',
  `leucocito` varchar(25) NOT NULL DEFAULT '',
  `piocitos` varchar(25) NOT NULL DEFAULT '',
  `hematies` varchar(25) NOT NULL DEFAULT '',
  `cilindros` varchar(80) NOT NULL DEFAULT '',
  `mucus` varchar(25) NOT NULL DEFAULT '',
  `uratos` varchar(45) NOT NULL DEFAULT '',
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `nitritos` varchar(25) NOT NULL,
  `otros` varchar(120) NOT NULL,
  `ph` decimal(10,1) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_parasitologico`
--

CREATE TABLE `detalle_parasitologico` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `metodo_macro` varchar(100) NOT NULL,
  `resultado_macro` varchar(100) NOT NULL,
  `metodo_micro` varchar(100) NOT NULL,
  `resultado_micro` varchar(100) NOT NULL,
  `resultado_micro1` varchar(100) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_presupuesto`
--

CREATE TABLE `detalle_presupuesto` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_practica` int(4) DEFAULT 0,
  `practica` varchar(28) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `cod_operacion` int(2) UNSIGNED ZEROFILL NOT NULL,
  `operador` int(3) NOT NULL DEFAULT 0,
  `nro_laboratorio` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `honorarios` decimal(10,2) NOT NULL,
  `categoria` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_proteinas_fraccionadas`
--

CREATE TABLE `detalle_proteinas_fraccionadas` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `protidemia` int(6) NOT NULL,
  `globulinas` int(6) NOT NULL,
  `albumina` int(6) NOT NULL,
  `relacion_ag` int(6) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_proteino`
--

CREATE TABLE `detalle_proteino` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `albumina` decimal(10,2) NOT NULL,
  `alfa1` decimal(10,2) NOT NULL,
  `alfa2` decimal(10,2) NOT NULL,
  `beta` decimal(10,2) NOT NULL,
  `gamma` decimal(10,2) NOT NULL,
  `proteinas_totales` decimal(10,2) NOT NULL,
  `relacion_ag` decimal(10,2) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `globulina` decimal(10,2) NOT NULL,
  `uni_albumina` int(1) NOT NULL,
  `uni_globulina` int(1) NOT NULL,
  `uni_alfa1` int(1) NOT NULL,
  `uni_alfa2` int(1) NOT NULL,
  `uni_beta` int(1) NOT NULL,
  `uni_gamma` int(1) NOT NULL,
  `uni_relacion` int(1) NOT NULL,
  `uni_totales` int(1) NOT NULL,
  `observaciones1` varchar(100) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_proteinura`
--

CREATE TABLE `detalle_proteinura` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `diuresis` decimal(10,2) NOT NULL,
  `valor_hallado` decimal(10,2) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_rast`
--

CREATE TABLE `detalle_rast` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `clase_1` varchar(30) NOT NULL,
  `clase_2` varchar(30) NOT NULL,
  `clase_3` varchar(30) NOT NULL,
  `clase_4` varchar(60) NOT NULL,
  `nivel_1` varchar(10) NOT NULL,
  `nivel_2` varchar(10) NOT NULL,
  `nivel_3` varchar(10) NOT NULL,
  `nivel_4` varchar(10) NOT NULL,
  `rast1` varchar(30) NOT NULL,
  `rast2` varchar(30) NOT NULL,
  `rast3` varchar(30) NOT NULL,
  `rast4` varchar(30) NOT NULL,
  `resultado1` varchar(10) NOT NULL,
  `resultado2` varchar(10) NOT NULL,
  `resultado3` varchar(10) NOT NULL,
  `resultado4` varchar(10) NOT NULL,
  `observaciones` varchar(120) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_referencia`
--

CREATE TABLE `detalle_referencia` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `valor` varchar(70) NOT NULL DEFAULT '0.00',
  `referencia` text NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `referencia1` text NOT NULL,
  `referencia2` text NOT NULL,
  `referencia3` text NOT NULL,
  `cod_operacion` int(20) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_practica` int(4) DEFAULT 0,
  `practica` varchar(28) NOT NULL DEFAULT '',
  `cod_operacion` int(2) UNSIGNED ZEROFILL NOT NULL,
  `operador` int(3) NOT NULL DEFAULT 0,
  `nro_laboratorio` varchar(6) NOT NULL DEFAULT '',
  `honorarios` decimal(10,2) NOT NULL,
  `categoria` int(1) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp_nuevo`
--

CREATE TABLE `detalle_temp_nuevo` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_laboratorio` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `valor` decimal(10,2) NOT NULL DEFAULT 0.00,
  `periodo` int(4) NOT NULL DEFAULT 0,
  `ano` varchar(4) NOT NULL DEFAULT '',
  `nro_factura` int(10) NOT NULL DEFAULT 0,
  `confirmada` char(2) NOT NULL DEFAULT '',
  `cod_operacion` int(5) NOT NULL,
  `marca` varchar(10) NOT NULL DEFAULT '',
  `lote` varchar(20) NOT NULL DEFAULT '',
  `operador` varchar(4) NOT NULL DEFAULT '',
  `categoria` int(1) NOT NULL DEFAULT 0,
  `coseguro` decimal(6,2) NOT NULL DEFAULT 0.00,
  `tipo_fact` char(1) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_uretral`
--

CREATE TABLE `detalle_uretral` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `muestra` varchar(120) NOT NULL,
  `coloracion` varchar(120) NOT NULL,
  `cultivo` varchar(120) NOT NULL,
  `cultivo1` varchar(100) NOT NULL,
  `cultivo2` varchar(100) NOT NULL,
  `nota` varchar(120) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_uricosuria`
--

CREATE TABLE `detalle_uricosuria` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `diuresis` decimal(10,2) NOT NULL,
  `valor_hallado` decimal(10,2) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_urocultivo`
--

CREATE TABLE `detalle_urocultivo` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `muestra` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `aspecto` varchar(30) NOT NULL,
  `sedimento` varchar(60) NOT NULL,
  `reaccion` varchar(60) NOT NULL,
  `en_fresco` varchar(120) NOT NULL,
  `gramm` varchar(120) NOT NULL,
  `cultivo` varchar(120) NOT NULL,
  `recuento` int(10) NOT NULL,
  `sensible1` varchar(30) NOT NULL,
  `sensible2` varchar(30) NOT NULL,
  `sensible3` varchar(30) NOT NULL,
  `sensible4` varchar(30) NOT NULL,
  `sensible5` varchar(30) NOT NULL,
  `sensible6` varchar(30) NOT NULL,
  `sensible7` varchar(30) NOT NULL,
  `med_sensible1` varchar(30) NOT NULL,
  `med_sensible2` varchar(30) NOT NULL,
  `med_sensible3` varchar(30) NOT NULL,
  `med_sensible4` varchar(30) NOT NULL,
  `med_sensible5` varchar(30) NOT NULL,
  `med_sensible6` varchar(30) NOT NULL,
  `med_sensible7` varchar(30) NOT NULL,
  `resistente1` varchar(30) NOT NULL,
  `resistente2` varchar(30) NOT NULL,
  `resistente3` varchar(30) NOT NULL,
  `resistente4` varchar(30) NOT NULL,
  `resistente5` varchar(30) NOT NULL,
  `resistente6` varchar(30) NOT NULL,
  `resistente7` varchar(30) NOT NULL,
  `observaciones` varchar(120) NOT NULL,
  `en_fresco1` varchar(100) NOT NULL,
  `potencia` int(1) NOT NULL,
  `giemsa` varchar(80) NOT NULL,
  `nielsen` varchar(80) NOT NULL,
  `fontana` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_urocultivo_torrecilla`
--

CREATE TABLE `detalle_urocultivo_torrecilla` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `muestra` varchar(30) NOT NULL,
  `color` varchar(30) NOT NULL,
  `aspecto` varchar(30) NOT NULL,
  `sedimento` varchar(60) NOT NULL,
  `reaccion` varchar(60) NOT NULL,
  `en_fresco` varchar(120) NOT NULL,
  `gramm` varchar(120) NOT NULL,
  `cultivo` varchar(120) NOT NULL,
  `recuento` int(10) NOT NULL,
  `sensible1` varchar(30) NOT NULL,
  `sensible2` varchar(30) NOT NULL,
  `sensible3` varchar(30) NOT NULL,
  `sensible4` varchar(30) NOT NULL,
  `sensible5` varchar(30) NOT NULL,
  `sensible6` varchar(30) NOT NULL,
  `sensible7` varchar(30) NOT NULL,
  `med_sensible1` varchar(30) NOT NULL,
  `med_sensible2` varchar(30) NOT NULL,
  `med_sensible3` varchar(30) NOT NULL,
  `med_sensible4` varchar(30) NOT NULL,
  `med_sensible5` varchar(30) NOT NULL,
  `med_sensible6` varchar(30) NOT NULL,
  `med_sensible7` varchar(30) NOT NULL,
  `resistente1` varchar(30) NOT NULL,
  `resistente2` varchar(30) NOT NULL,
  `resistente3` varchar(30) NOT NULL,
  `resistente4` varchar(30) NOT NULL,
  `resistente5` varchar(30) NOT NULL,
  `resistente6` varchar(30) NOT NULL,
  `resistente7` varchar(30) NOT NULL,
  `observaciones` varchar(120) NOT NULL,
  `en_fresco1` varchar(100) NOT NULL,
  `potencia` int(1) NOT NULL,
  `giemsa` varchar(80) NOT NULL,
  `nielsen` varchar(80) NOT NULL,
  `fontana` varchar(80) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_vaginal`
--

CREATE TABLE `detalle_vaginal` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `muestra` varchar(120) NOT NULL,
  `celulas_epiteliales` varchar(120) NOT NULL,
  `leucocitos` varchar(120) NOT NULL,
  `piocitos` varchar(120) NOT NULL,
  `elementos_hongos` varchar(120) NOT NULL,
  `trichomonas_vaginalis` varchar(120) NOT NULL,
  `test_aminas` varchar(120) NOT NULL DEFAULT '',
  `coloracion` varchar(120) NOT NULL,
  `cultivo` varchar(120) NOT NULL,
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_widal`
--

CREATE TABLE `detalle_widal` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_orden` varchar(20) NOT NULL DEFAULT '0',
  `nro_practica` int(10) DEFAULT 0,
  `flagelares` varchar(20) NOT NULL,
  `somatico` varchar(20) NOT NULL,
  `paratyphi_a` varchar(20) NOT NULL,
  `paratyphi_b` varchar(20) NOT NULL,
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deta_modulo`
--

CREATE TABLE `deta_modulo` (
  `cod_modulo` int(10) NOT NULL DEFAULT 0,
  `cod_practica` int(10) NOT NULL DEFAULT 0,
  `a` varchar(10) NOT NULL DEFAULT '',
  `b` varchar(10) NOT NULL DEFAULT '',
  `c` varchar(10) NOT NULL DEFAULT '',
  `cod_operacion` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deta_planillas`
--

CREATE TABLE `deta_planillas` (
  `cod_modulo` int(10) NOT NULL DEFAULT 0,
  `cod_practica` int(10) NOT NULL DEFAULT 0,
  `a` varchar(10) NOT NULL DEFAULT '',
  `b` varchar(10) NOT NULL DEFAULT '',
  `c` varchar(10) NOT NULL DEFAULT '',
  `cod_operacion` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deta_planillas_ver`
--

CREATE TABLE `deta_planillas_ver` (
  `cod_modulo` int(10) NOT NULL DEFAULT 0,
  `cod_practica` int(10) NOT NULL DEFAULT 0,
  `nombre_columna` varchar(6) NOT NULL DEFAULT '',
  `cod_operacion` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(10) NOT NULL,
  `apellido` varchar(30) NOT NULL DEFAULT '',
  `nombre` varchar(30) NOT NULL DEFAULT '',
  `direccion` varchar(50) NOT NULL DEFAULT '',
  `telefono` varchar(25) NOT NULL DEFAULT '',
  `celular` varchar(25) NOT NULL DEFAULT '',
  `email` varchar(35) NOT NULL DEFAULT '',
  `interno` varchar(4) NOT NULL DEFAULT '',
  `sector` varchar(20) NOT NULL DEFAULT '',
  `puesto` varchar(35) NOT NULL DEFAULT '',
  `mes` char(2) NOT NULL DEFAULT '',
  `anio` varchar(4) NOT NULL DEFAULT '',
  `empleado` int(1) NOT NULL DEFAULT 0,
  `fecha_nac` date NOT NULL DEFAULT '0000-00-00',
  `sexo` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `cod_especialidad` int(10) NOT NULL,
  `especialidad` varchar(40) NOT NULL DEFAULT '',
  `descripcion` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_capita`
--

CREATE TABLE `es_capita` (
  `nro_os` int(4) NOT NULL DEFAULT 0,
  `es_capita` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `nro_factura` int(10) NOT NULL DEFAULT 0,
  `tipo_fact` char(1) NOT NULL DEFAULT '',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `periodo` char(2) NOT NULL DEFAULT '',
  `anio` varchar(4) NOT NULL DEFAULT '',
  `nro_os` varchar(10) NOT NULL DEFAULT '',
  `cant_ordenes` int(10) NOT NULL DEFAULT 0,
  `cant_bioquimicos` int(10) NOT NULL DEFAULT 0,
  `iva` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(15,2) NOT NULL DEFAULT 0.00,
  `estado` varchar(20) NOT NULL DEFAULT '',
  `lote` varchar(25) NOT NULL DEFAULT '',
  `marca` varchar(15) NOT NULL DEFAULT '',
  `leyenda` varchar(25) NOT NULL DEFAULT '',
  `fecha_pago_fact` varchar(10) NOT NULL DEFAULT '',
  `pagados` decimal(7,2) NOT NULL DEFAULT 0.00,
  `saldo` decimal(7,2) NOT NULL DEFAULT 0.00,
  `tipo_operacion` int(1) NOT NULL DEFAULT 0,
  `fecha_liquidacion` date NOT NULL,
  `nro_liquidacion` int(4) NOT NULL,
  `mes_liquidacion` int(2) NOT NULL,
  `anio_liquidacion` int(4) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `neto_gravado` decimal(10,2) NOT NULL,
  `exento` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturante`
--

CREATE TABLE `facturante` (
  `nro_laboratorio` int(5) NOT NULL DEFAULT 0,
  `facturante` varchar(5) NOT NULL DEFAULT '',
  `banco` varchar(25) NOT NULL DEFAULT '',
  `cuenta` varchar(15) NOT NULL DEFAULT '',
  `tipo_cuenta` char(2) NOT NULL DEFAULT '',
  `nro_cuenta` varchar(20) NOT NULL DEFAULT '0',
  `gastos_adm` decimal(3,2) NOT NULL DEFAULT 8.00,
  `sucursal` varchar(6) NOT NULL DEFAULT '',
  `cbu` varchar(22) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_mega`
--

CREATE TABLE `facturas_mega` (
  `tipo_fact` char(1) NOT NULL DEFAULT '',
  `nro_factura` int(6) NOT NULL DEFAULT 0,
  `fecha_factura` date NOT NULL DEFAULT '0000-00-00',
  `cuenta` int(6) NOT NULL DEFAULT 0,
  `condicion_iva` int(1) NOT NULL DEFAULT 0,
  `exento` decimal(10,2) NOT NULL DEFAULT 0.00,
  `neto_gravado` decimal(10,2) NOT NULL DEFAULT 0.00,
  `importe_iva` decimal(10,2) NOT NULL DEFAULT 0.00,
  `importe_descuentos` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_original` decimal(10,2) NOT NULL DEFAULT 0.00,
  `saldo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fecha_ultimo_pago` date NOT NULL DEFAULT '0000-00-00',
  `pago_caja` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pago_liquidacion` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fecha_liquidacion` date NOT NULL DEFAULT '0000-00-00',
  `nro_liquidacion` int(2) NOT NULL DEFAULT 0,
  `mes_liquidacion` char(2) NOT NULL DEFAULT '',
  `anio_liquidacion` char(2) NOT NULL DEFAULT '',
  `tipo_cuenta` int(1) NOT NULL DEFAULT 0,
  `cod_operacion` int(2) NOT NULL DEFAULT 1,
  `facturado` int(1) NOT NULL DEFAULT 0,
  `periodo` char(2) NOT NULL DEFAULT '',
  `anio` char(2) NOT NULL DEFAULT '',
  `cant_muestras` int(5) NOT NULL DEFAULT 0,
  `precio_tubo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `descuento_precio` decimal(10,2) NOT NULL DEFAULT 0.00,
  `bruto` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_provee`
--

CREATE TABLE `facturas_provee` (
  `cuenta` int(4) NOT NULL DEFAULT 0,
  `tipo_cuenta` varchar(10) NOT NULL DEFAULT '0',
  `tipo_fact` char(1) NOT NULL DEFAULT '',
  `comprobante` int(10) NOT NULL DEFAULT 0,
  `fecha_emision` date NOT NULL DEFAULT '0000-00-00',
  `importe_original` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fecha_pago` date NOT NULL DEFAULT '0000-00-00',
  `saldo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `vencimiento` date NOT NULL DEFAULT '0000-00-00',
  `cuotas` int(2) NOT NULL DEFAULT 0,
  `cuotas_pagadas` int(2) NOT NULL DEFAULT 0,
  `cod_movimiento` varchar(12) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_actualizacion_mega`
--

CREATE TABLE `fecha_actualizacion_mega` (
  `fecha_actualizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `nro_os` int(10) NOT NULL DEFAULT 0,
  `vencimiento` varchar(10) NOT NULL DEFAULT '',
  `antiguedad` varchar(10) NOT NULL DEFAULT '',
  `interes` varchar(10) NOT NULL DEFAULT '',
  `plan` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id_foto` varchar(15) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `des` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grabadas_temp`
--

CREATE TABLE `grabadas_temp` (
  `cod_grabacion` int(25) NOT NULL DEFAULT 0,
  `periodo` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 00,
  `ano` varchar(8) NOT NULL DEFAULT '',
  `nro_os` varchar(6) NOT NULL DEFAULT '',
  `sigla` varchar(25) NOT NULL DEFAULT '',
  `nro_laboratorio` int(6) NOT NULL DEFAULT 0,
  `nombre_laboratorio` varchar(25) NOT NULL DEFAULT '',
  `matricula` varchar(6) NOT NULL DEFAULT '',
  `nro_afiliado` varchar(14) NOT NULL DEFAULT '0',
  `nombre_afiliado` varchar(25) NOT NULL DEFAULT '',
  `nro_orden` varchar(12) NOT NULL DEFAULT '000000000000',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `medico` varchar(25) NOT NULL DEFAULT '',
  `nombre_medico` varchar(25) NOT NULL DEFAULT '',
  `coseguro` varchar(10) NOT NULL DEFAULT '',
  `autorizacion` int(10) NOT NULL DEFAULT 0,
  `fecha_fac` date NOT NULL DEFAULT '0000-00-00',
  `nro_fac` varchar(10) NOT NULL DEFAULT '',
  `confirmada` int(2) NOT NULL DEFAULT 0,
  `marca` varchar(10) NOT NULL DEFAULT '',
  `lote` varchar(40) NOT NULL DEFAULT '',
  `operador` varchar(4) NOT NULL DEFAULT '',
  `nombre_operador` varchar(10) NOT NULL DEFAULT '',
  `fecha_realizacion` date NOT NULL DEFAULT '0000-00-00',
  `diagnostico` varchar(120) NOT NULL DEFAULT '',
  `motivo` varchar(120) NOT NULL DEFAULT '',
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `modulo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incremento`
--

CREATE TABLE `incremento` (
  `nro_os` int(10) NOT NULL DEFAULT 0,
  `material_descartable` varchar(10) NOT NULL DEFAULT '',
  `acto_bioquimico` varchar(10) NOT NULL DEFAULT '',
  `toma_muestra` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informatico`
--

CREATE TABLE `informatico` (
  `nro_laboratorio` int(5) NOT NULL DEFAULT 0,
  `equipamiento` varchar(10) NOT NULL DEFAULT '',
  `equipo` varchar(50) NOT NULL DEFAULT '',
  `conexion` varchar(20) NOT NULL DEFAULT '',
  `sistematizacion` varchar(30) NOT NULL DEFAULT '',
  `capacitacion` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `caratula` varchar(2) NOT NULL,
  `hoja` varchar(2) NOT NULL,
  `firma` varchar(2) NOT NULL,
  `modelo` varchar(1) NOT NULL,
  `id` int(5) NOT NULL,
  `cod_operacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ing_bruto`
--

CREATE TABLE `ing_bruto` (
  `nro_laboratorio` int(5) NOT NULL DEFAULT 0,
  `nro_ib` varchar(10) NOT NULL DEFAULT '',
  `tasa_ib` decimal(5,2) NOT NULL DEFAULT 0.00,
  `requisitos_ib` varchar(5) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorios`
--

CREATE TABLE `laboratorios` (
  `nro_laboratorio` varchar(5) NOT NULL DEFAULT '',
  `nombre` varchar(25) NOT NULL DEFAULT '',
  `domicilio` varchar(50) NOT NULL DEFAULT '',
  `localidad` varchar(20) NOT NULL DEFAULT '',
  `telefono` varchar(20) NOT NULL DEFAULT '',
  `ansal` varchar(15) NOT NULL DEFAULT '',
  `cuit` varchar(15) NOT NULL DEFAULT '',
  `ib` varchar(15) NOT NULL DEFAULT '',
  `sit_iva` varchar(15) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lab_realizacion`
--

CREATE TABLE `lab_realizacion` (
  `nro_lab` int(3) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion_web`
--

CREATE TABLE `liquidacion_web` (
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_laboratorio` int(5) NOT NULL DEFAULT 0,
  `nro_factura` varchar(10) NOT NULL DEFAULT '',
  `nro_liquidacion` char(2) NOT NULL DEFAULT '',
  `periodo` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 00,
  `anio` varchar(4) NOT NULL DEFAULT '',
  `operacion` int(15) NOT NULL DEFAULT 0,
  `importe` decimal(14,2) NOT NULL DEFAULT 0.00,
  `tipo_pago` varchar(20) NOT NULL DEFAULT '',
  `motivo` varchar(50) NOT NULL DEFAULT '',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `porcentaje` varchar(10) NOT NULL DEFAULT '',
  `bruto` decimal(14,2) NOT NULL DEFAULT 0.00,
  `acumulado_mensual` decimal(14,2) NOT NULL DEFAULT 0.00,
  `fecha_movimiento` date NOT NULL DEFAULT '0000-00-00',
  `saldo_deuda` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cod_renglon` int(12) NOT NULL,
  `nombre_os` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidados`
--

CREATE TABLE `liquidados` (
  `matricula` int(15) DEFAULT 0,
  `fecha` varchar(12) NOT NULL DEFAULT '',
  `nro_os` varchar(10) NOT NULL DEFAULT '',
  `nro_factura` varchar(10) NOT NULL DEFAULT '',
  `cantidad` varchar(10) NOT NULL DEFAULT '',
  `importe` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquido_producto`
--

CREATE TABLE `liquido_producto` (
  `tipo_fact` char(1) NOT NULL DEFAULT '',
  `nro_factura` int(6) NOT NULL DEFAULT 0,
  `fecha_factura` date NOT NULL DEFAULT '0000-00-00',
  `cuenta` int(6) NOT NULL DEFAULT 0,
  `condicion_iva` int(1) NOT NULL DEFAULT 0,
  `exento` decimal(10,2) NOT NULL DEFAULT 0.00,
  `neto_gravado` decimal(10,2) NOT NULL DEFAULT 0.00,
  `importe_iva` decimal(10,2) NOT NULL DEFAULT 0.00,
  `importe_descuentos` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_original` decimal(10,2) NOT NULL DEFAULT 0.00,
  `saldo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fecha_ultimo_pago` date NOT NULL DEFAULT '0000-00-00',
  `pago_caja` decimal(10,2) NOT NULL DEFAULT 0.00,
  `pago_liquidacion` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fecha_liquidacion` date NOT NULL DEFAULT '0000-00-00',
  `nro_liquidacion` int(2) NOT NULL DEFAULT 0,
  `mes_liquidacion` char(2) NOT NULL DEFAULT '',
  `anio_liquidacion` char(2) NOT NULL DEFAULT '',
  `tipo_cuenta` int(1) NOT NULL DEFAULT 0,
  `cod_operacion` int(2) NOT NULL DEFAULT 1,
  `facturado` int(1) NOT NULL DEFAULT 0,
  `gastos_adm` decimal(10,2) NOT NULL,
  `afip` decimal(10,2) NOT NULL,
  `atm` decimal(10,2) NOT NULL DEFAULT 0.00,
  `debitos` decimal(10,2) NOT NULL DEFAULT 0.00,
  `creditos` decimal(10,2) NOT NULL DEFAULT 0.00,
  `bruto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `afectada` int(10) NOT NULL DEFAULT 0,
  `cuota` int(1) NOT NULL DEFAULT 0,
  `boca_expendio` varchar(4) NOT NULL DEFAULT '',
  `cae` varchar(20) NOT NULL DEFAULT '',
  `vencimiento_cae` varchar(15) NOT NULL DEFAULT '',
  `tipo_emision` varchar(10) NOT NULL DEFAULT '',
  `reproceso` varchar(20) NOT NULL DEFAULT '',
  `errores` varchar(20) NOT NULL DEFAULT '',
  `resultado` varchar(60) NOT NULL DEFAULT '',
  `codigo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidades`
--

CREATE TABLE `localidades` (
  `localidad` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `departamento` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `cod_postal` int(6) NOT NULL,
  `cod_operacion` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `lote` varchar(80) NOT NULL,
  `cod_lote` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `cod_material` int(10) NOT NULL,
  `material` varchar(40) NOT NULL DEFAULT '',
  `descripcion` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo`
--

CREATE TABLE `metodo` (
  `cod_metodo` int(10) NOT NULL DEFAULT 0,
  `metodo` varchar(40) NOT NULL DEFAULT '',
  `descripcion` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos`
--

CREATE TABLE `metodos` (
  `cod_metodo` int(5) NOT NULL,
  `metodo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modificacion_practicas`
--

CREATE TABLE `modificacion_practicas` (
  `cod_practica` int(4) NOT NULL DEFAULT 0,
  `nro_os` varchar(6) NOT NULL DEFAULT '0',
  `cod_equivalencia` varchar(6) NOT NULL DEFAULT '',
  `categoria` int(2) NOT NULL DEFAULT 0,
  `honorarios` decimal(6,2) NOT NULL DEFAULT 0.00,
  `gastos` decimal(6,2) NOT NULL DEFAULT 0.00,
  `toma` varchar(4) NOT NULL DEFAULT '',
  `urgencia` varchar(4) NOT NULL DEFAULT '',
  `material_descartable` varchar(4) NOT NULL DEFAULT '',
  `valor` decimal(6,2) NOT NULL DEFAULT 0.00,
  `autorizada` varchar(4) NOT NULL DEFAULT '',
  `practica` varchar(50) NOT NULL DEFAULT '',
  `fecha_cambio` date NOT NULL DEFAULT '0000-00-00',
  `hora_cambio` text NOT NULL,
  `operador` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `cod_modulo` int(10) NOT NULL DEFAULT 0,
  `nombre_modulo` varchar(60) NOT NULL DEFAULT '',
  `categoria` varchar(40) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muestra`
--

CREATE TABLE `muestra` (
  `cod_muestra` int(10) NOT NULL,
  `muestra` varchar(40) NOT NULL DEFAULT '',
  `descripcion` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operadores_activos`
--

CREATE TABLE `operadores_activos` (
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `op_facturacion`
--

CREATE TABLE `op_facturacion` (
  `nro_os` int(10) NOT NULL DEFAULT 0,
  `detalle` varchar(10) NOT NULL DEFAULT '',
  `post_factura` varchar(30) NOT NULL DEFAULT '',
  `separacion` varchar(10) NOT NULL DEFAULT '',
  `coseguro` varchar(10) NOT NULL DEFAULT '',
  `valor_porcentaje` varchar(10) NOT NULL DEFAULT '',
  `coseguro_esp` char(3) NOT NULL DEFAULT '',
  `valor_porc_esp` char(3) NOT NULL DEFAULT '',
  `coseguro_comp` char(3) NOT NULL DEFAULT '',
  `valor_porc_comp` char(3) NOT NULL DEFAULT '',
  `gastos` varchar(10) NOT NULL DEFAULT '',
  `honorarios` varchar(10) NOT NULL DEFAULT '',
  `operacion` varchar(10) NOT NULL DEFAULT '',
  `porcentaje_total` decimal(3,2) NOT NULL DEFAULT 0.00,
  `operacion_orden` varchar(6) NOT NULL DEFAULT '',
  `denominacion_ajuste` varchar(25) NOT NULL DEFAULT '',
  `iva` decimal(5,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `op_grabacion`
--

CREATE TABLE `op_grabacion` (
  `nro_os` int(10) NOT NULL DEFAULT 0,
  `requiere_automatico` char(2) NOT NULL DEFAULT 'NO',
  `requiere_autorizacion` char(2) NOT NULL DEFAULT 'NO',
  `requiere_coseguro` char(2) NOT NULL DEFAULT 'NO',
  `cos_en_orden` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `op_practicas`
--

CREATE TABLE `op_practicas` (
  `nro_os` int(10) DEFAULT 0,
  `efector` varchar(10) NOT NULL DEFAULT '',
  `prescriptor` varchar(30) NOT NULL DEFAULT '',
  `afiliado` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `cod_grabacion` int(25) NOT NULL,
  `periodo` int(4) NOT NULL DEFAULT 0,
  `ano` varchar(8) NOT NULL DEFAULT '',
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `nro_paciente` int(6) NOT NULL DEFAULT 0,
  `matricula` varchar(6) NOT NULL DEFAULT '',
  `nro_afiliado` text NOT NULL,
  `nro_orden` varchar(40) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `medico` varchar(25) NOT NULL DEFAULT '0',
  `coseguro` varchar(10) NOT NULL DEFAULT '',
  `autorizacion` int(10) NOT NULL DEFAULT 0,
  `fecha_fac` date NOT NULL DEFAULT '0000-00-00',
  `nro_fac` varchar(10) NOT NULL DEFAULT '',
  `confirmada` int(2) NOT NULL DEFAULT 0,
  `marca` varchar(10) NOT NULL DEFAULT '',
  `lote` varchar(20) NOT NULL DEFAULT '',
  `operador` varchar(4) NOT NULL DEFAULT '',
  `suma_coseguro` decimal(6,2) NOT NULL DEFAULT 0.00,
  `tipo_fact` char(1) NOT NULL DEFAULT '',
  `cod_diag` varchar(4) NOT NULL DEFAULT '',
  `cod_grabacion1` int(10) NOT NULL DEFAULT 0,
  `fecha_grabacion` date NOT NULL DEFAULT '0000-00-00',
  `iva` decimal(10,2) NOT NULL DEFAULT 0.00,
  `neto_gravado` decimal(10,2) NOT NULL DEFAULT 0.00,
  `exento` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_orden` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fecha_realizacion` date NOT NULL DEFAULT '0000-00-00',
  `diagnostico` varchar(120) NOT NULL DEFAULT '',
  `motivo` varchar(120) NOT NULL DEFAULT '',
  `observaciones` varchar(120) NOT NULL DEFAULT '',
  `modulo` int(4) NOT NULL,
  `nombre_medico` varchar(25) NOT NULL,
  `autorizacion_ws` int(15) NOT NULL,
  `fecha_osde` varchar(8) NOT NULL,
  `hora_osde` varchar(8) NOT NULL,
  `cuit_osde` varchar(20) NOT NULL,
  `mensaje_osde` text NOT NULL,
  `aut_mail` int(20) NOT NULL,
  `usuario` int(10) NOT NULL,
  `validada` int(1) NOT NULL,
  `validada_por` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci DELAY_KEY_WRITE=1 PACK_KEYS=0 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_expel`
--

CREATE TABLE `ordenes_expel` (
  `cuit` varchar(20) NOT NULL,
  `paciente` varchar(100) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `modulo` int(3) NOT NULL,
  `sexo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_mail`
--

CREATE TABLE `ordenes_mail` (
  `cod_grabacion` int(11) NOT NULL,
  `enviado` enum('si','no') NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orientacion`
--

CREATE TABLE `orientacion` (
  `cod_especialidad` int(10) NOT NULL DEFAULT 0,
  `cod_orientacion` int(10) NOT NULL DEFAULT 0,
  `orientacion` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_afiliado` varchar(20) NOT NULL DEFAULT '0',
  `nombre` varchar(30) NOT NULL DEFAULT '',
  `tipo_doc` char(7) NOT NULL DEFAULT '',
  `nro_documento` int(8) NOT NULL DEFAULT 0,
  `nro_os` varchar(12) NOT NULL DEFAULT '',
  `domicilio` varchar(40) NOT NULL DEFAULT '',
  `localidad` varchar(25) NOT NULL DEFAULT '',
  `telefono` varchar(12) NOT NULL DEFAULT '',
  `celular` varchar(12) NOT NULL DEFAULT '',
  `sexo` varchar(20) NOT NULL DEFAULT '',
  `fecha_nacimiento` date NOT NULL DEFAULT '0000-00-00',
  `apellido` varchar(30) NOT NULL,
  `tipo_afiliado` int(1) NOT NULL,
  `coseguro` varchar(10) NOT NULL,
  `plan` varchar(20) NOT NULL,
  `activo` varchar(80) NOT NULL,
  `ultima_fecha` date NOT NULL,
  `nro_llegada` int(5) NOT NULL,
  `track` text NOT NULL,
  `ultima_01a` varchar(20) NOT NULL,
  `cuit_verificacion` varchar(20) NOT NULL,
  `usuario` int(10) NOT NULL,
  `nro_paciente_abm` int(20) NOT NULL,
  `tipo_af` varchar(1) NOT NULL,
  `cod_seg` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_ant`
--

CREATE TABLE `pacientes_ant` (
  `nro_paciente` int(8) NOT NULL DEFAULT 0,
  `nro_afiliado` varchar(20) NOT NULL DEFAULT '0',
  `nombre` varchar(30) NOT NULL DEFAULT '',
  `tipo_doc` char(7) NOT NULL DEFAULT '',
  `nro_documento` int(8) NOT NULL DEFAULT 0,
  `nro_os` varchar(20) NOT NULL DEFAULT '',
  `domicilio` varchar(40) NOT NULL DEFAULT '',
  `localidad` varchar(25) NOT NULL DEFAULT '',
  `telefono` varchar(12) NOT NULL DEFAULT '',
  `celular` varchar(12) NOT NULL DEFAULT '',
  `sexo` varchar(20) NOT NULL DEFAULT '',
  `fecha_nacimiento` date NOT NULL DEFAULT '0000-00-00',
  `apellido` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes_mail`
--

CREATE TABLE `pacientes_mail` (
  `nro_paciente` int(11) NOT NULL,
  `nro_afiliado` varchar(100) NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padron`
--

CREATE TABLE `padron` (
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `direccion` varchar(50) NOT NULL DEFAULT '',
  `localidad` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pami_ordenes`
--

CREATE TABLE `pami_ordenes` (
  `codbioq` varchar(6) NOT NULL DEFAULT '0',
  `nroautored` varchar(8) NOT NULL DEFAULT '0',
  `nroafi` varchar(14) NOT NULL DEFAULT '0',
  `codpres` varchar(4) NOT NULL DEFAULT '0',
  `cantidad` char(2) NOT NULL DEFAULT '0',
  `matpresc` varchar(6) NOT NULL DEFAULT '',
  `fecpresc` varchar(8) NOT NULL DEFAULT '',
  `fecrea` varchar(8) NOT NULL DEFAULT '',
  `fecauto` varchar(8) NOT NULL DEFAULT '',
  `codseg` varchar(8) NOT NULL DEFAULT '0',
  `cod_diag` varchar(4) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos_cerrados`
--

CREATE TABLE `periodos_cerrados` (
  `cod_periodo` int(10) NOT NULL DEFAULT 0,
  `periodo` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 00,
  `anio` int(2) UNSIGNED ZEROFILL NOT NULL DEFAULT 00,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `cerrado` char(2) NOT NULL DEFAULT '',
  `validado` char(2) NOT NULL DEFAULT '',
  `lote` varchar(20) NOT NULL DEFAULT '',
  `facturado` char(2) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes_os`
--

CREATE TABLE `planes_os` (
  `nro_os` int(4) NOT NULL DEFAULT 0,
  `cod_operacion` int(10) NOT NULL DEFAULT 0,
  `nro_plan` int(10) NOT NULL DEFAULT 0,
  `nombre_plan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `reducido_plan` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `coseguro` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `comunes` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `especiales` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `alta` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `pmo` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `texto` varchar(180) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planillas`
--

CREATE TABLE `planillas` (
  `cod_modulo` int(10) NOT NULL DEFAULT 0,
  `nombre_modulo` varchar(60) NOT NULL DEFAULT '',
  `categoria` varchar(40) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prac`
--

CREATE TABLE `prac` (
  `cod_practica` int(6) NOT NULL DEFAULT 0,
  `nro_os` int(6) NOT NULL DEFAULT 0,
  `cod_equivalencia` varchar(6) NOT NULL DEFAULT '',
  `categoria` varchar(20) NOT NULL DEFAULT '',
  `honorarios` decimal(4,2) NOT NULL DEFAULT 0.00,
  `gastos` decimal(4,2) NOT NULL DEFAULT 0.00,
  `toma` varchar(4) NOT NULL DEFAULT '',
  `urgencia` varchar(4) NOT NULL DEFAULT '',
  `material_descartable` varchar(4) NOT NULL DEFAULT '',
  `valor` decimal(4,2) NOT NULL DEFAULT 0.00,
  `autorizada` varchar(4) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica`
--

CREATE TABLE `practica` (
  `cod_practica` int(11) NOT NULL DEFAULT 0,
  `practica` varchar(50) NOT NULL DEFAULT '',
  `sinonimia` varchar(50) NOT NULL DEFAULT '',
  `descripcion` varchar(40) NOT NULL DEFAULT '',
  `especialidad` varchar(40) NOT NULL DEFAULT '',
  `metodo` varchar(40) NOT NULL DEFAULT '',
  `muestra` varchar(40) NOT NULL DEFAULT '',
  `material` varchar(40) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_derivaciones`
--

CREATE TABLE `precio_derivaciones` (
  `cod_practica` varchar(5) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) NOT NULL DEFAULT '',
  `laboratorio_realizacion` int(2) NOT NULL DEFAULT 0,
  `precio` decimal(6,2) NOT NULL DEFAULT 0.00,
  `cod_operacion` int(11) NOT NULL,
  `metodo` varchar(6) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_derivaciones_abm`
--

CREATE TABLE `precio_derivaciones_abm` (
  `cod_practica` varchar(5) NOT NULL DEFAULT '0',
  `descripcion` varchar(50) NOT NULL DEFAULT '',
  `laboratorio_realizacion` int(2) NOT NULL DEFAULT 0,
  `precio` decimal(6,2) NOT NULL DEFAULT 0.00,
  `cod_operacion` int(11) NOT NULL,
  `metodo` varchar(6) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prescriptor`
--

CREATE TABLE `prescriptor` (
  `matricula` int(5) NOT NULL DEFAULT 0,
  `nro_os` int(8) NOT NULL DEFAULT 0,
  `nombre` varchar(30) NOT NULL DEFAULT '',
  `cod_especialidad` varchar(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rast`
--

CREATE TABLE `rast` (
  `rast` varchar(100) NOT NULL,
  `cod_rast` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamos`
--

CREATE TABLE `reclamos` (
  `nro_hoja` int(10) NOT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `hora` time NOT NULL DEFAULT '00:00:00',
  `sector` varchar(10) NOT NULL DEFAULT '',
  `personal` varchar(40) NOT NULL DEFAULT '',
  `motivo` varchar(60) NOT NULL DEFAULT '',
  `motivo1` varchar(120) NOT NULL DEFAULT '',
  `motivo2` varchar(120) NOT NULL DEFAULT '',
  `motivo3` varchar(120) NOT NULL DEFAULT '',
  `solucion1` varchar(120) NOT NULL DEFAULT '',
  `solucion2` varchar(120) NOT NULL DEFAULT '',
  `solucion3` varchar(120) NOT NULL DEFAULT '',
  `estado` int(2) NOT NULL DEFAULT 0,
  `fecha_correcion` date NOT NULL DEFAULT '0000-00-00',
  `hora_correccion` time NOT NULL DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisitos_os`
--

CREATE TABLE `requisitos_os` (
  `nro_os` int(10) NOT NULL DEFAULT 0,
  `denominacion` varchar(40) NOT NULL DEFAULT '',
  `sigla` varchar(20) NOT NULL DEFAULT '',
  `requisitos` text NOT NULL,
  `version` varchar(10) NOT NULL DEFAULT '',
  `suspendido` char(2) NOT NULL DEFAULT '',
  `vigencia` date NOT NULL,
  `comunes` varchar(10) NOT NULL,
  `especiales` varchar(10) NOT NULL,
  `alta` varchar(10) NOT NULL,
  `antibiograma` varchar(1) NOT NULL,
  `diagnostico` varchar(1) NOT NULL,
  `planes` varchar(180) NOT NULL,
  `info_planes` varchar(180) NOT NULL,
  `planes_rechazados` varchar(180) NOT NULL,
  `motivo_rechazo` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sulb`
--

CREATE TABLE `sulb` (
  `cuit` varchar(20) NOT NULL,
  `nombre_laboratorio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_conversion`
--

CREATE TABLE `tabla_conversion` (
  `nbu` int(6) NOT NULL,
  `mega` varchar(10) NOT NULL,
  `manlab` varchar(10) NOT NULL,
  `cod_operacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_osde`
--

CREATE TABLE `tabla_osde` (
  `cod_osde` int(6) NOT NULL DEFAULT 0,
  `nro_laboratorio` int(7) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tango`
--

CREATE TABLE `tango` (
  `n1` int(10) NOT NULL,
  `n2` varchar(50) NOT NULL,
  `n3` varchar(15) NOT NULL,
  `n4` varchar(15) NOT NULL,
  `n5` varchar(15) NOT NULL,
  `n6` int(11) NOT NULL,
  `n7` varchar(11) NOT NULL,
  `n8` varchar(20) NOT NULL,
  `n9` int(11) NOT NULL,
  `n10` varchar(15) NOT NULL,
  `n11` varchar(15) NOT NULL,
  `n12` varchar(11) NOT NULL,
  `n13` varchar(50) NOT NULL,
  `n14` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temp_mes`
--

CREATE TABLE `temp_mes` (
  `mes_actual` char(3) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pagos`
--

CREATE TABLE `tipo_pagos` (
  `nro_laboratorio` int(6) NOT NULL DEFAULT 0,
  `cuit_depositar` varchar(15) NOT NULL DEFAULT '',
  `opcion` int(1) NOT NULL DEFAULT 0,
  `cuenta_depositar` int(12) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `token_afip`
--

CREATE TABLE `token_afip` (
  `empresa` varchar(20) NOT NULL,
  `token` varchar(200) NOT NULL,
  `expiracion` varchar(30) NOT NULL,
  `sign` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `hora` varchar(10) NOT NULL DEFAULT '',
  `trabajo` varchar(80) NOT NULL DEFAULT '',
  `para` varchar(25) NOT NULL DEFAULT '',
  `duracion` decimal(4,2) NOT NULL DEFAULT 0.00,
  `cod_operacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `cod_unidad` int(3) NOT NULL,
  `unidad` varchar(10) NOT NULL,
  `nombre_unidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `type` varchar(30) NOT NULL DEFAULT '',
  `size` int(11) NOT NULL DEFAULT 0,
  `content` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` varchar(10) NOT NULL DEFAULT '',
  `usuario` varchar(20) NOT NULL DEFAULT '',
  `contrasena` int(20) NOT NULL DEFAULT 0,
  `rol` varchar(20) NOT NULL DEFAULT '',
  `programa` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `validadores`
--

CREATE TABLE `validadores` (
  `cod_validador` int(2) NOT NULL,
  `nombre_validador` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `validas`
--

CREATE TABLE `validas` (
  `cod_operacion` int(10) NOT NULL,
  `nro_os` int(5) NOT NULL DEFAULT 0,
  `nombre_os` varchar(25) NOT NULL DEFAULT '',
  `nro_laboratorio` int(5) NOT NULL DEFAULT 0,
  `nombre_laboratorio` varchar(25) NOT NULL DEFAULT '',
  `nro_planilla` int(10) NOT NULL DEFAULT 0,
  `operador_recep` int(3) NOT NULL DEFAULT 0,
  `nombre_operador_recep` varchar(20) NOT NULL DEFAULT '',
  `cant_recep` int(10) NOT NULL DEFAULT 0,
  `cant_grab` int(10) NOT NULL DEFAULT 0,
  `cant_dif` int(10) NOT NULL DEFAULT 0,
  `operador_grab` char(3) NOT NULL DEFAULT '',
  `nombre_operador_grab` varchar(20) NOT NULL DEFAULT '',
  `lote` varchar(25) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_encabezado`
--

CREATE TABLE `ventas_encabezado` (
  `tipo_fact` char(1) NOT NULL DEFAULT '',
  `nro_factura` int(20) NOT NULL DEFAULT 0,
  `cod_operacion` varchar(10) NOT NULL DEFAULT '0',
  `tipo` int(2) NOT NULL DEFAULT 0,
  `nro_cliente` int(10) NOT NULL DEFAULT 0,
  `nro_cuenta` int(10) NOT NULL DEFAULT 0,
  `plan` char(3) NOT NULL DEFAULT '',
  `operador` varchar(15) NOT NULL DEFAULT '',
  `denominacion` varchar(40) NOT NULL DEFAULT '',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `bruto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `descuento` decimal(10,2) NOT NULL DEFAULT 0.00,
  `neto_gravado` decimal(10,2) NOT NULL DEFAULT 0.00,
  `iva` decimal(10,2) NOT NULL DEFAULT 0.00,
  `retencion` decimal(10,2) NOT NULL DEFAULT 0.00,
  `neto` decimal(10,2) NOT NULL DEFAULT 0.00,
  `forma_pago` varchar(10) NOT NULL DEFAULT '',
  `periodo` char(2) NOT NULL DEFAULT '07',
  `anio` char(2) NOT NULL DEFAULT '08',
  `tipo_iva` int(2) NOT NULL DEFAULT 0,
  `cheque` decimal(10,2) NOT NULL DEFAULT 0.00,
  `contado` decimal(10,2) NOT NULL DEFAULT 0.00,
  `afectacion` int(6) NOT NULL DEFAULT 0,
  `boca_expendio` varchar(4) NOT NULL DEFAULT '',
  `cae` varchar(20) NOT NULL DEFAULT '',
  `vencimiento_cae` varchar(15) NOT NULL DEFAULT '',
  `tipo_emision` varchar(10) NOT NULL DEFAULT '',
  `reproceso` varchar(20) NOT NULL DEFAULT '',
  `errores` varchar(20) NOT NULL DEFAULT '',
  `resultado` varchar(60) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afip`
--
ALTER TABLE `afip`
  ADD UNIQUE KEY `nro_laboratorio_2` (`nro_laboratorio`),
  ADD KEY `nro_bioquimico` (`nro_laboratorio`),
  ADD KEY `nro_laboratorio` (`nro_laboratorio`);

--
-- Indices de la tabla `ansal`
--
ALTER TABLE `ansal`
  ADD UNIQUE KEY `nro_bioquimico` (`nro_laboratorio`),
  ADD UNIQUE KEY `nro_laboratorio_2` (`nro_laboratorio`),
  ADD KEY `nro_laboratorio` (`nro_laboratorio`);

--
-- Indices de la tabla `antibioticos`
--
ALTER TABLE `antibioticos`
  ADD KEY `cod_antibiotico` (`cod_antibiotico`);

--
-- Indices de la tabla `arancel`
--
ALTER TABLE `arancel`
  ADD PRIMARY KEY (`nro_os`),
  ADD KEY `nro_os` (`nro_os`);

--
-- Indices de la tabla `arancel_migrado`
--
ALTER TABLE `arancel_migrado`
  ADD PRIMARY KEY (`nro_os`),
  ADD KEY `nro_os` (`nro_os`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `capitacion`
--
ALTER TABLE `capitacion`
  ADD UNIQUE KEY `nro_os` (`nro_os`);

--
-- Indices de la tabla `casos`
--
ALTER TABLE `casos`
  ADD KEY `cod_operacion` (`cod_operacion`);

--
-- Indices de la tabla `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`nro_os`),
  ADD UNIQUE KEY `nro_os` (`nro_os`);

--
-- Indices de la tabla `convenio_practica`
--
ALTER TABLE `convenio_practica`
  ADD KEY `cod_practica` (`cod_practica`);

--
-- Indices de la tabla `convenio_practica2012`
--
ALTER TABLE `convenio_practica2012`
  ADD KEY `cod_practica` (`cod_practica`);

--
-- Indices de la tabla `convenio_practica_2016`
--
ALTER TABLE `convenio_practica_2016`
  ADD PRIMARY KEY (`cod_operacion`),
  ADD KEY `cod_practica` (`cod_practica`);

--
-- Indices de la tabla `convenio_practica_abm`
--
ALTER TABLE `convenio_practica_abm`
  ADD KEY `cod_practica` (`cod_practica`);

--
-- Indices de la tabla `convenio_practica_complejo`
--
ALTER TABLE `convenio_practica_complejo`
  ADD PRIMARY KEY (`cod_operacion`),
  ADD KEY `cod_practica` (`cod_practica`);

--
-- Indices de la tabla `convenio_practica_complejo-no`
--
ALTER TABLE `convenio_practica_complejo-no`
  ADD KEY `cod_practica` (`cod_practica`);

--
-- Indices de la tabla `convenio_practica_complejo_ant`
--
ALTER TABLE `convenio_practica_complejo_ant`
  ADD KEY `cod_practica` (`cod_practica`);

--
-- Indices de la tabla `convenio_practica_factura`
--
ALTER TABLE `convenio_practica_factura`
  ADD KEY `cod_practica` (`cod_practica`);

--
-- Indices de la tabla `convenio_practica_modulo`
--
ALTER TABLE `convenio_practica_modulo`
  ADD KEY `cod_practica` (`cod_practica`);

--
-- Indices de la tabla `convenio_referencia`
--
ALTER TABLE `convenio_referencia`
  ADD UNIQUE KEY `cod_operacion_3` (`cod_operacion`),
  ADD KEY `cod_practica` (`cod_practica`),
  ADD KEY `cod_operacion` (`cod_operacion`),
  ADD KEY `cod_operacion_2` (`cod_operacion`);

--
-- Indices de la tabla `convenio_referencia_ant`
--
ALTER TABLE `convenio_referencia_ant`
  ADD KEY `cod_practica` (`cod_practica`),
  ADD KEY `cod_operacion` (`cod_operacion`);

--
-- Indices de la tabla `convenio_referencia_backup`
--
ALTER TABLE `convenio_referencia_backup`
  ADD KEY `cod_practica` (`cod_practica`),
  ADD KEY `cod_operacion` (`cod_operacion`);

--
-- Indices de la tabla `datos_estudio`
--
ALTER TABLE `datos_estudio`
  ADD UNIQUE KEY `matricula_2` (`matricula`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `datos_laboratorio`
--
ALTER TABLE `datos_laboratorio`
  ADD UNIQUE KEY `nro_laboratorio` (`nro_laboratorio`),
  ADD UNIQUE KEY `nro_laboratorio_4` (`nro_laboratorio`),
  ADD KEY `nro_laboratorio_2` (`nro_laboratorio`),
  ADD KEY `nro_laboratorio_3` (`nro_laboratorio`);

--
-- Indices de la tabla `datos_os`
--
ALTER TABLE `datos_os`
  ADD UNIQUE KEY `nro_os` (`nro_os`);

--
-- Indices de la tabla `datos_os1`
--
ALTER TABLE `datos_os1`
  ADD UNIQUE KEY `nro_os` (`nro_os`);

--
-- Indices de la tabla `datos_osde`
--
ALTER TABLE `datos_osde`
  ADD UNIQUE KEY `cod_operacion_2` (`cod_operacion`),
  ADD KEY `cod_operacion` (`cod_operacion`);

--
-- Indices de la tabla `datos_os_abm`
--
ALTER TABLE `datos_os_abm`
  ADD UNIQUE KEY `nro_os` (`nro_os`);

--
-- Indices de la tabla `datos_os_ant`
--
ALTER TABLE `datos_os_ant`
  ADD PRIMARY KEY (`nro_os`),
  ADD UNIQUE KEY `nro_os` (`nro_os`),
  ADD UNIQUE KEY `nro_os_3` (`nro_os`),
  ADD KEY `nro_os_2` (`nro_os`),
  ADD KEY `sigla` (`sigla`);

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD UNIQUE KEY `matricula_3` (`matricula`),
  ADD KEY `matricula_2` (`matricula`),
  ADD KEY `apellido` (`apellido`);

--
-- Indices de la tabla `datos_profesional`
--
ALTER TABLE `datos_profesional`
  ADD UNIQUE KEY `matricula_2` (`matricula`),
  ADD KEY `nro_bioquimico` (`matricula`),
  ADD KEY `matricula` (`matricula`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD UNIQUE KEY `cod_operacion` (`cod_operacion`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_aglutininas`
--
ALTER TABLE `detalle_aglutininas`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_antibiograma`
--
ALTER TABLE `detalle_antibiograma`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_antibiograma_ant`
--
ALTER TABLE `detalle_antibiograma_ant`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_antigeno`
--
ALTER TABLE `detalle_antigeno`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_bacteriologico`
--
ALTER TABLE `detalle_bacteriologico`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_bilirrubina`
--
ALTER TABLE `detalle_bilirrubina`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_calcio`
--
ALTER TABLE `detalle_calcio`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_clearence`
--
ALTER TABLE `detalle_clearence`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_coagulograma`
--
ALTER TABLE `detalle_coagulograma`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_coprocultivo`
--
ALTER TABLE `detalle_coprocultivo`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_curva`
--
ALTER TABLE `detalle_curva`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_exudado`
--
ALTER TABLE `detalle_exudado`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_fecal`
--
ALTER TABLE `detalle_fecal`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_fecal_373`
--
ALTER TABLE `detalle_fecal_373`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_fosforo`
--
ALTER TABLE `detalle_fosforo`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_hemo`
--
ALTER TABLE `detalle_hemo`
  ADD UNIQUE KEY `cod_operacion` (`cod_operacion`);

--
-- Indices de la tabla `detalle_hepatograma`
--
ALTER TABLE `detalle_hepatograma`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_iono`
--
ALTER TABLE `detalle_iono`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_iono_urinario`
--
ALTER TABLE `detalle_iono_urinario`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_lipidograma`
--
ALTER TABLE `detalle_lipidograma`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_magnesio`
--
ALTER TABLE `detalle_magnesio`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_modulo`
--
ALTER TABLE `detalle_modulo`
  ADD KEY `cod_practica` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_orina`
--
ALTER TABLE `detalle_orina`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_parasitologico`
--
ALTER TABLE `detalle_parasitologico`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_presupuesto`
--
ALTER TABLE `detalle_presupuesto`
  ADD PRIMARY KEY (`cod_operacion`);

--
-- Indices de la tabla `detalle_proteinas_fraccionadas`
--
ALTER TABLE `detalle_proteinas_fraccionadas`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_proteino`
--
ALTER TABLE `detalle_proteino`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_proteinura`
--
ALTER TABLE `detalle_proteinura`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_rast`
--
ALTER TABLE `detalle_rast`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_referencia`
--
ALTER TABLE `detalle_referencia`
  ADD UNIQUE KEY `cod_operacion` (`cod_operacion`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`cod_operacion`);

--
-- Indices de la tabla `detalle_temp_nuevo`
--
ALTER TABLE `detalle_temp_nuevo`
  ADD UNIQUE KEY `cod_operacion` (`cod_operacion`),
  ADD KEY `nro_laboratorio` (`nro_laboratorio`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `marca` (`marca`),
  ADD KEY `periodo` (`periodo`),
  ADD KEY `cod_operacion_2` (`cod_operacion`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_uretral`
--
ALTER TABLE `detalle_uretral`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_uricosuria`
--
ALTER TABLE `detalle_uricosuria`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_urocultivo`
--
ALTER TABLE `detalle_urocultivo`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_urocultivo_torrecilla`
--
ALTER TABLE `detalle_urocultivo_torrecilla`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `detalle_vaginal`
--
ALTER TABLE `detalle_vaginal`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_paciente`),
  ADD KEY `nro_orden` (`nro_orden`),
  ADD KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `deta_modulo`
--
ALTER TABLE `deta_modulo`
  ADD UNIQUE KEY `cod_operacion` (`cod_operacion`);

--
-- Indices de la tabla `deta_planillas`
--
ALTER TABLE `deta_planillas`
  ADD UNIQUE KEY `cod_operacion` (`cod_operacion`);

--
-- Indices de la tabla `deta_planillas_ver`
--
ALTER TABLE `deta_planillas_ver`
  ADD UNIQUE KEY `cod_operacion` (`cod_operacion`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`cod_especialidad`),
  ADD UNIQUE KEY `cod_especialidad` (`cod_especialidad`),
  ADD UNIQUE KEY `especialidad` (`especialidad`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD UNIQUE KEY `nro_factura` (`nro_factura`),
  ADD UNIQUE KEY `nro_factura_2` (`nro_factura`);

--
-- Indices de la tabla `facturante`
--
ALTER TABLE `facturante`
  ADD UNIQUE KEY `nro_laboratorio_2` (`nro_laboratorio`),
  ADD KEY `nro_bioquimico` (`nro_laboratorio`),
  ADD KEY `nro_laboratorio` (`nro_laboratorio`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD UNIQUE KEY `nro_os` (`nro_os`),
  ADD UNIQUE KEY `nro_os_2` (`nro_os`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indices de la tabla `grabadas_temp`
--
ALTER TABLE `grabadas_temp`
  ADD UNIQUE KEY `cod_grabacion` (`cod_grabacion`),
  ADD KEY `nro_laboratorio` (`nro_laboratorio`),
  ADD KEY `autorizacion` (`autorizacion`);

--
-- Indices de la tabla `incremento`
--
ALTER TABLE `incremento`
  ADD UNIQUE KEY `nro_os` (`nro_os`),
  ADD UNIQUE KEY `nro_os_2` (`nro_os`);

--
-- Indices de la tabla `informatico`
--
ALTER TABLE `informatico`
  ADD UNIQUE KEY `nro_laboratorio` (`nro_laboratorio`),
  ADD KEY `nro_bioquimico` (`nro_laboratorio`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`cod_operacion`);

--
-- Indices de la tabla `ing_bruto`
--
ALTER TABLE `ing_bruto`
  ADD UNIQUE KEY `nro_laboratorio_2` (`nro_laboratorio`),
  ADD KEY `nro_bioquimico` (`nro_laboratorio`),
  ADD KEY `nro_laboratorio` (`nro_laboratorio`);

--
-- Indices de la tabla `laboratorios`
--
ALTER TABLE `laboratorios`
  ADD UNIQUE KEY `nro_laboratorio` (`nro_laboratorio`),
  ADD UNIQUE KEY `nro_laboratorio_2` (`nro_laboratorio`);

--
-- Indices de la tabla `liquidacion_web`
--
ALTER TABLE `liquidacion_web`
  ADD UNIQUE KEY `cod_renglon` (`cod_renglon`),
  ADD KEY `nro_laboratorio` (`nro_laboratorio`),
  ADD KEY `nro_os` (`nro_os`),
  ADD KEY `nro_factura` (`nro_factura`);

--
-- Indices de la tabla `localidades`
--
ALTER TABLE `localidades`
  ADD KEY `cod_operacion` (`cod_operacion`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`cod_lote`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`cod_material`),
  ADD UNIQUE KEY `cod_material` (`cod_material`),
  ADD UNIQUE KEY `material` (`material`);

--
-- Indices de la tabla `metodo`
--
ALTER TABLE `metodo`
  ADD PRIMARY KEY (`cod_metodo`),
  ADD UNIQUE KEY `cod_metodo` (`cod_metodo`),
  ADD UNIQUE KEY `metodo` (`metodo`);

--
-- Indices de la tabla `metodos`
--
ALTER TABLE `metodos`
  ADD PRIMARY KEY (`cod_metodo`);

--
-- Indices de la tabla `muestra`
--
ALTER TABLE `muestra`
  ADD PRIMARY KEY (`cod_muestra`),
  ADD UNIQUE KEY `cod_muestra` (`cod_muestra`),
  ADD UNIQUE KEY `muestra` (`muestra`);

--
-- Indices de la tabla `op_grabacion`
--
ALTER TABLE `op_grabacion`
  ADD UNIQUE KEY `nro_os` (`nro_os`);

--
-- Indices de la tabla `op_practicas`
--
ALTER TABLE `op_practicas`
  ADD UNIQUE KEY `nro_os` (`nro_os`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`cod_grabacion`),
  ADD KEY `autorizacion` (`autorizacion`),
  ADD KEY `nro_orden` (`nro_orden`);

--
-- Indices de la tabla `ordenes_mail`
--
ALTER TABLE `ordenes_mail`
  ADD UNIQUE KEY `cod_grabacion` (`cod_grabacion`);

--
-- Indices de la tabla `orientacion`
--
ALTER TABLE `orientacion`
  ADD PRIMARY KEY (`cod_especialidad`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`nro_paciente`),
  ADD UNIQUE KEY `nro_paciente` (`nro_paciente`);

--
-- Indices de la tabla `pacientes_ant`
--
ALTER TABLE `pacientes_ant`
  ADD PRIMARY KEY (`nro_paciente`),
  ADD UNIQUE KEY `nro_paciente` (`nro_paciente`);

--
-- Indices de la tabla `pacientes_mail`
--
ALTER TABLE `pacientes_mail`
  ADD PRIMARY KEY (`nro_paciente`),
  ADD UNIQUE KEY `nro_paciente` (`nro_paciente`);

--
-- Indices de la tabla `prac`
--
ALTER TABLE `prac`
  ADD KEY `cod_practica` (`cod_practica`),
  ADD KEY `nro_os` (`nro_os`);

--
-- Indices de la tabla `practica`
--
ALTER TABLE `practica`
  ADD UNIQUE KEY `cod_practica` (`cod_practica`),
  ADD KEY `cod_practica_2` (`cod_practica`),
  ADD KEY `practica` (`practica`);

--
-- Indices de la tabla `precio_derivaciones`
--
ALTER TABLE `precio_derivaciones`
  ADD UNIQUE KEY `cod_operacion` (`cod_operacion`),
  ADD KEY `cod_practica` (`cod_practica`),
  ADD KEY `laboratorio_realizacion` (`laboratorio_realizacion`);

--
-- Indices de la tabla `precio_derivaciones_abm`
--
ALTER TABLE `precio_derivaciones_abm`
  ADD UNIQUE KEY `cod_operacion` (`cod_operacion`),
  ADD KEY `cod_practica` (`cod_practica`),
  ADD KEY `laboratorio_realizacion` (`laboratorio_realizacion`);

--
-- Indices de la tabla `rast`
--
ALTER TABLE `rast`
  ADD KEY `cod_antibiotico` (`cod_rast`);

--
-- Indices de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  ADD UNIQUE KEY `nro_hoja` (`nro_hoja`);

--
-- Indices de la tabla `requisitos_os`
--
ALTER TABLE `requisitos_os`
  ADD UNIQUE KEY `nro_os` (`nro_os`);

--
-- Indices de la tabla `tabla_conversion`
--
ALTER TABLE `tabla_conversion`
  ADD UNIQUE KEY `cod_operacion` (`cod_operacion`);

--
-- Indices de la tabla `tipo_pagos`
--
ALTER TABLE `tipo_pagos`
  ADD UNIQUE KEY `nro_laboratorio` (`nro_laboratorio`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD UNIQUE KEY `cod_operacion` (`cod_operacion`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
  ADD KEY `cod_unidad` (`cod_unidad`);

--
-- Indices de la tabla `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `validas`
--
ALTER TABLE `validas`
  ADD UNIQUE KEY `cod_operacion` (`cod_operacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `antibioticos`
--
ALTER TABLE `antibioticos`
  MODIFY `cod_antibiotico` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos`
--
ALTER TABLE `casos`
  MODIFY `cod_operacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `convenios`
--
ALTER TABLE `convenios`
  MODIFY `nro_os` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `convenio_practica_2016`
--
ALTER TABLE `convenio_practica_2016`
  MODIFY `cod_operacion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `convenio_practica_complejo`
--
ALTER TABLE `convenio_practica_complejo`
  MODIFY `cod_operacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `convenio_referencia`
--
ALTER TABLE `convenio_referencia`
  MODIFY `cod_operacion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `convenio_referencia_ant`
--
ALTER TABLE `convenio_referencia_ant`
  MODIFY `cod_operacion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `convenio_referencia_backup`
--
ALTER TABLE `convenio_referencia_backup`
  MODIFY `cod_operacion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_osde`
--
ALTER TABLE `datos_osde`
  MODIFY `cod_operacion` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `cod_operacion` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_hemo`
--
ALTER TABLE `detalle_hemo`
  MODIFY `cod_operacion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_presupuesto`
--
ALTER TABLE `detalle_presupuesto`
  MODIFY `cod_operacion` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_referencia`
--
ALTER TABLE `detalle_referencia`
  MODIFY `cod_operacion` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `cod_operacion` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_temp_nuevo`
--
ALTER TABLE `detalle_temp_nuevo`
  MODIFY `cod_operacion` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `deta_modulo`
--
ALTER TABLE `deta_modulo`
  MODIFY `cod_operacion` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `deta_planillas`
--
ALTER TABLE `deta_planillas`
  MODIFY `cod_operacion` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `deta_planillas_ver`
--
ALTER TABLE `deta_planillas_ver`
  MODIFY `cod_operacion` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `cod_especialidad` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `cod_operacion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `liquidacion_web`
--
ALTER TABLE `liquidacion_web`
  MODIFY `cod_renglon` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidades`
--
ALTER TABLE `localidades`
  MODIFY `cod_operacion` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `cod_lote` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `cod_material` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodos`
--
ALTER TABLE `metodos`
  MODIFY `cod_metodo` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `muestra`
--
ALTER TABLE `muestra`
  MODIFY `cod_muestra` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `cod_grabacion` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `precio_derivaciones`
--
ALTER TABLE `precio_derivaciones`
  MODIFY `cod_operacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `precio_derivaciones_abm`
--
ALTER TABLE `precio_derivaciones_abm`
  MODIFY `cod_operacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rast`
--
ALTER TABLE `rast`
  MODIFY `cod_rast` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  MODIFY `nro_hoja` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabla_conversion`
--
ALTER TABLE `tabla_conversion`
  MODIFY `cod_operacion` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `cod_operacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `cod_unidad` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `validas`
--
ALTER TABLE `validas`
  MODIFY `cod_operacion` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
