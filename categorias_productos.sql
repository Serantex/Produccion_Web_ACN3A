-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2020 a las 02:02:18
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `categorias_productos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8mb4_bin NOT NULL,
  `id_padre` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `categorias`
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
-- Estructura de tabla para la tabla `comentarios`
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
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `mail`, `ip`, `comentario`, `clasificacion`, `producto`, `aprobado`) VALUES
(1, 'test@mail.com', '000.000.001', 'muy buen producto', 5, 1, 1),
(2, 'test2@mail.com', '000.000.002', 'este producto es muy malo', 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `perfil` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permisos` int(11) NOT NULL,
  `permiso` varchar(50) COLLATE utf8_bin NOT NULL,
  `codigo` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_perfil`
--

CREATE TABLE `permisos_perfil` (
  `id_relpp` int(11) NOT NULL,
  `id_permisos` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
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
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `sub_categoria`, `descripcion`, `precio`, `stock`, `puntuacion`, `comentario`, `destacado`) VALUES
(1, 'Acido Sulfurico', 24, NULL, 'Ideal para calmar la sed', 10.5, 1, 0, 0, 1),
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
(18, 'Cereal', 1, 7, 'Viene con una rueda de metal', 2, 3, 0, 0, 0),
(19, 'Cho Cho', 24, NULL, 'La maquinita tu eres el elegido', 1, 4, 0, 0, 0),
(20, 'Conejo Pepito', 10, 13, 'Incluye la cabeza arrancada por Bart', 5, 1, 0, 0, 1),
(21, 'Escopeta', 24, NULL, 'Incluye el modo callejera', 10, 1, 0, 0, 1),
(22, 'Globo', 5, NULL, 'El profesor Smithers y sus pompotas', 24, 1, 0, 0, 1),
(23, 'Jarabe', 2, NULL, 'Puede caudar alusinaciones', 18, 1, 0, 0, 1),
(24, 'Juego', 10, 13, 'Bonestorm, el juego mas violento', 50, 1, 0, 0, 0),
(25, 'Llamarada Moe', 6, 23, 'El ingrediente secreto es jarabe para la tos', 25, 1, 0, 0, 1),
(26, 'Mano Mono', 24, NULL, 'Mano de los deseos, ideal para la paz mundial', 80, 1, 0, 0, 1),
(27, 'Martillo', 24, NULL, 'Martillo electronico creado por Tomas Edison', 36, 1, 0, 0, 1),
(28, 'Papas', 7, 9, 'Sabrosas papas fritas', 3, 1, 0, 0, 1),
(29, 'Salchicha', 7, 9, 'Se cayo al suelo, pero sera nuestro secreto', 1, 1, 0, 0, 1),
(30, 'Sillon baño', 24, NULL, 'Super comodo para ir al baño', 200, 1, 0, 0, 1),
(31, 'Focusyn', 2, NULL, 'Me siento feliz tomo mi Focusyn', 57, 2, 0, 0, 1),
(32, 'Videogame 2', 10, 13, 'Operacion rescate', 54, 4, 0, 0, 0),
(33, 'Fonzo', 10, 12, 'Dame un abrazo', 150, 12, 0, 0, 1),
(34, 'Disfraz Bartman', 3, 4, 'Salvando la ciudad de Sprinfield', 234, 2, 0, 0, 1),
(35, 'Disfraz Hombre Radioactivo', 3, 4, 'Soy el hombre radioactivo', 263, 2, 0, 0, 0),
(36, 'Disfraz Lisa', 3, 5, 'Premio por no tener ayuda de los padres', 76, 2, 0, 0, 1),
(37, 'Stacy Vaquera', 10, 11, 'Olee!', 70, 2, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
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
-- Estructura de tabla para la tabla `usuario_perfil`
--

CREATE TABLE `usuario_perfil` (
  `id_rel` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permisos`);

--
-- Indices de la tabla `permisos_perfil`
--
ALTER TABLE `permisos_perfil`
  ADD PRIMARY KEY (`id_relpp`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  ADD PRIMARY KEY (`id_rel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
