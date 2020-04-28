-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
<<<<<<< HEAD
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 12:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29
=======
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2020 a las 00:02:56
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8
>>>>>>> f5b4e3773fcb374e68405c409b9a0313a0fbfb25

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
(10, 'Juguetes', 1),
(11, 'Stacy Malibu', 10),
(12, 'Fonzo', 10),
(13, 'Otros Juguetes', 10),
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
  `last_updated` date NOT NULL DEFAULT current_timestamp(),
  `aprobado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `mail`, `ip`, `comentario`, `clasificacion`, `producto`, `last_updated`, `aprobado`) VALUES
(3, 'mica@example.com', '::1', 'asdfgfcgvhbjn', 2, 1, '2020-04-27', 1),
(4, 'lagana.mcl@gmail.com', '::1', 'rdyjtdtfg', 5, 1, '2020-04-27', 0),
<<<<<<< HEAD
(5, 'promociones@mailclubcruzverde.', '::1', 'test1', 1, 1, '2020-04-28', 0);
=======
(5, '2@d', '::1', 'sdvsdv', 1, 1, '2020-04-28', 0);
>>>>>>> f5b4e3773fcb374e68405c409b9a0313a0fbfb25

-- --------------------------------------------------------

--
-- Table structure for table `contactos`
--

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(100) COLLATE utf8_bin NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `comentario` varchar(100) COLLATE utf8_bin NOT NULL,
  `motivo` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contactos`
--

INSERT INTO `contactos` (`id_contacto`, `nombre`, `apellido`, `telefono`, `email`, `comentario`, `motivo`) VALUES
(1, 'C&A', 'Training', 323, 'afonseca@devsutd.com', '0', '0'),
(2, 'C&A', 'Training', 222, 'afonseca@devsutd.com', 'fckl', 'N;'),
(3, 'C&A21323e23', 'Trainingdfd', 0, 'afonseca@devsutd.com', 'd', 'a:2:{i:0;s:6:\"VENTAS\";i:1;s:19:\"ATENCION AL CLIENTE\";}'),
(4, 'C&A', 'Training', 21, 'afonseca@devsutd.com', 'fdaf', 'VENTAS'),
(5, 'C&A', 'Training', 3232, 'afonseca@devsutd.com', 'dsa', 'VENTAS,ATENCION AL CLIENTE');

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
  `descripcion` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `precio` float NOT NULL,
  `stock` tinyint(1) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `comentario` tinyint(1) NOT NULL,
  `destacado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `sub_categoria`, `descripcion`, `precio`, `stock`, `puntuacion`, `comentario`, `destacado`) VALUES
(1, 'Acido Sulfurico', 24, NULL, 'Ideal para calmar la sed', 10.5, 1, 0, 0, 0),
(2, 'Aprieta Y Traga', 7, 9, 'Salchichón completo del tío Lardo!', 10.5, 1, 0, 0, 1),
(3, 'Rosquilla', 7, 8, 'La rosca prohibida', 1, 1, 0, 0, 1),
(4, 'Duff', 6, 23, 'Mmmm Cerveza!', 545, 1, 0, 0, 1),
(5, 'Simpson Son', 2, NULL, 'Tonico revitalizante', 35, 1, 0, 0, 1),
(6, 'Gabo', 10, 13, 'Soy un perversito', 45, 1, 0, 0, 0),
(7, 'Colonia', 24, NULL, 'Ideal para regalar', 2, 1, 1, 0, 1),
(8, 'Buzz', 6, 22, 'Refresco de Itchy and Scratchy', 3, 1, 0, 0, 1),
(9, 'Alma', 24, NULL, 'Vale por el alma de Bart Simpsons', 63, 1, 0, 0, 1),
(10, 'Japon', 24, NULL, 'Mr. Sparkle, para lavar los platos', 35, 1, 0, 0, 0),
(11, 'Arroz', 7, 9, 'Arroz con queso', 20, 1, 0, 0, 1),
(12, 'Squishee', 6, 22, 'Mmm malteada!', 25, 1, 0, 0, 1),
(13, 'Test Embarazo', 24, NULL, 'El test mas efectivo, siempre da positivo', 50, 0, 0, 0, 1),
(14, 'Khlav Kalash', 7, 9, 'No pizza solo Khlav Kalash', 5, 1, 0, 0, 0),
(15, 'Jugo Cangrejo', 6, 22, 'De cangrejos?!, Si de cangrejos', 15, 1, 0, 0, 0),
(16, 'Bort', 24, NULL, 'Necesitamos mas matriculas con el nombre de Bort', 15, 1, 0, 0, 0),
(17, 'El Homeromovil', 24, NULL, 'Si, esta moustrocidad cuesta eso', 82000, 1, 0, 0, 1),
(18, 'Cereal', 7, 8, 'Viene con una rueda de metal', 2, 1, 0, 0, 0),
(19, 'Cho Cho', 24, NULL, 'La maquinita tu eres el elegido', 1, 1, 0, 0, 0),
(20, 'Conejo Pepito', 10, 13, 'Incluye la cabeza arrancada por Bart', 5, 1, 0, 0, 1),
(21, 'Escopeta', 24, NULL, 'Incluye el modo callejera', 10, 1, 0, 0, 1),
(22, 'Globo', 24, NULL, 'El profesor Smithers y sus pompotas', 24, 1, 0, 0, 1),
(23, 'Jarabe', 2, NULL, 'Puede caudar alusinaciones', 18, 1, 0, 0, 1),
(24, 'Juego', 10, 13, 'Bonestorm, el juego mas violento', 50, 1, 0, 0, 0),
(25, 'Llamarada Moe', 6, 23, 'El ingrediente secreto es jarabe para la tos', 25, 1, 0, 0, 1),
(26, 'Mano Mono', 24, NULL, 'Mano de los deseos, ideal para la paz mundial', 80, 1, 0, 0, 0),
(27, 'Martillo', 24, NULL, 'Martillo electronico creado por Tomas Edison', 36, 1, 0, 0, 1),
(28, 'Papas', 7, 9, 'Sabrosas papas fritas', 3, 1, 0, 0, 1),
(29, 'Salchicha', 7, 9, 'Se cayo al suelo, pero sera nuestro secreto', 1, 1, 0, 0, 1),
(30, 'Sillon banio', 24, NULL, 'Super comodo para ir al baño', 200, 1, 0, 0, 1),
(31, 'Focusyn', 2, NULL, 'Me siento feliz tomo mi Focusyn', 57, 1, 0, 0, 1),
(32, 'Videogame 2', 10, 13, 'Operacion rescate', 54, 1, 0, 0, 0),
(33, 'Fonzo', 10, 12, 'Dame un abrazo', 150, 1, 0, 0, 1),
(34, 'Disfraz Bartman', 3, 4, 'Salvando la ciudad de Sprinfield', 234, 1, 0, 0, 1),
(35, 'Disfraz Hombre Radioactivo', 3, 4, 'Soy el hombre radioactivo', 263, 1, 0, 0, 0),
(36, 'Disfraz Lisa', 3, 5, 'Premio por no tener ayuda de los padres', 76, 1, 0, 0, 1),
(37, 'Stacy Vaquera', 10, 11, 'Olee!', 70, 1, 0, 0, 1);

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
-- Indexes for table `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contacto`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
<<<<<<< HEAD

--
-- AUTO_INCREMENT for table `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
>>>>>>> f5b4e3773fcb374e68405c409b9a0313a0fbfb25

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
