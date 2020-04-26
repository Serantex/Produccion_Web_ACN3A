-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 11:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `categorias_productos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `id_padre` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `id_padre`) VALUES
(1, 'Todos los Productos', 0),
(2, 'Farmacos', 1),
(3, 'Disfraces', 1),
(4, 'Superheroes', 3),
(5, 'Personajes', 3),
(6, 'Bebidas', 1),
(7, 'Alimentos', 1),
(8, 'Dulces', 7),
(9, 'Salados', 7),
(10, 'Muniecos', 1),
(11, 'Stacy Malibu', 10),
(12, 'Fonzo', 10),
(13, 'Otros Muniecos', 10),
(21, 'Otros Disfraces', 3),
(22, 'Sin alcohol', 6),
(23, 'Con alcohol', 6),
(24, 'Otros Productos', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `mail` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `ip` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `comentario` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `clasificacion` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `aprobado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `mail`, `ip`, `comentario`, `clasificacion`, `producto`, `aprobado`) VALUES
(1, 'test@mail.com', '000.000.001', 'muy buen producto', 5, 1, 1),
(2, 'test2@mail.com', '000.000.002', 'este producto es muy malo', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `perfil` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `permisos`
--

CREATE TABLE `permisos` (
  `id_permisos` int(11) NOT NULL,
  `permiso` varchar(50) COLLATE utf8_bin NOT NULL,
  `codigo` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `permisos_perfil`
--

CREATE TABLE `permisos_perfil` (
  `id_relpp` int(11) NOT NULL,
  `id_permisos` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `categoria` int(11) NOT NULL,
  `sub_categoria` int(11) DEFAULT NULL,
  `precio` float NOT NULL,
  `stock` tinyint(1) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `comentario` tinyint(1) NOT NULL,
  `destacado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `sub_categoria`, `precio`, `stock`, `puntuacion`, `comentario`, `destacado`) VALUES
(1, 'Acido Sulfurico', 24, NULL, 10.5, 1, 0, 0, 1),
(2, 'Aprieta Y Traga', 7, 9, 10.5, 1, 0, 0, 1),
(3, 'Rosquilla', 7, 8, 1, 1, 0, 0, 1),
(4, 'Duff', 6, 23, 545, 1, 0, 0, 1),
(5, 'Simpson Son', 2, NULL, 35, 1, 0, 0, 1),
(6, 'Gabo', 10, 13, 45, 1, 0, 0, 0),
(7, 'Colonia', 24, NULL, 2, 1, 1, 0, 1),
(8, 'Buzz', 6, 22, 3, 1, 0, 0, 1),
(9, 'Alma', 24, NULL, 63, 1, 0, 0, 1),
(10, 'Japon', 24, NULL, 35, 1, 0, 0, 0),
(11, 'Arroz', 7, 9, 20, 1, 0, 0, 1),
(12, 'Squishee', 6, 22, 25, 1, 0, 0, 1),
(13, 'Test Embarazo', 24, NULL, 50, 0, 0, 0, 1),
(14, 'Khlav Kalash', 7, 9, 5, 1, 0, 0, 0),
(15, 'Jugo Cangrejo', 6, 22, 15, 1, 0, 0, 0),
(16, 'Bort', 24, NULL, 15, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(50) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(50) COLLATE utf8_bin NOT NULL,
  `clave` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `usuario_perfil`
--

CREATE TABLE `usuario_perfil` (
  `id_rel` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indexes for table `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permisos`);

--
-- Indexes for table `permisos_perfil`
--
ALTER TABLE `permisos_perfil`
  ADD PRIMARY KEY (`id_relpp`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  ADD PRIMARY KEY (`id_rel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
