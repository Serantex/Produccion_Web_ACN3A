-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2020 a las 21:49:14
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

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
  `id_padre` int(11) NOT NULL DEFAULT 0,
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `id_padre`, `estado`) VALUES
(1, 'Todos los Productos', 0, 1),
(2, 'Farmacos', 1, 1),
(3, 'Disfraces', 1, 1),
(4, 'Superheroes', 3, 1),
(5, 'Personajes', 3, 1),
(6, 'Bebidas', 1, 0),
(7, 'Alimentos', 1, 1),
(8, 'Dulces', 7, 1),
(9, 'Salados', 7, 1),
(10, 'Juguetes', 1, 1),
(11, 'Stacy Malibu', 10, 1),
(12, 'Fonzo', 10, 1),
(13, 'Otros Juguetes', 10, 1),
(21, 'Otros Disfraces', 3, 1),
(22, 'Sin Alcohol', 6, 1),
(23, 'Con Alcohol', 6, 1),
(24, 'Otros Productos', 1, 1);

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
  `last_updated` date NOT NULL DEFAULT current_timestamp(),
  `aprobado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `mail`, `ip`, `comentario`, `clasificacion`, `producto`, `last_updated`, `aprobado`) VALUES
(3, 'mica@example.com', '::1', 'asdfgfcgvhbjn', 2, 1, '2020-04-27', 0),
(4, 'lagana.mcl@gmail.com', '::1', 'rdyjtdtfg', 5, 1, '2020-04-27', 0),
(5, '2@d', '::1', 'sdvsdv', 1, 1, '2020-04-28', 1),
(6, '2@d', '::1', 'muy cara pero deliciosa ', 5, 4, '2020-04-29', 1),
(7, 'lautaro.serantes@davinci.edu.a', '::1', 'hola', 5, 1, '2020-04-29', 1),
(8, 'lautaro.serantes@davinci.edu.a', '::1', 'dasdasd', 2, 1, '2020-04-29', 1),
(9, 'lautaro.serantes@davinci.edu.a', '::1', 'fdasf', 2, 2, '2020-04-29', 1),
(10, 'lautaro.serantes@davinci.edu.a', '::1', 'afsaf', 2, 2, '2020-04-29', 1),
(11, 'a@gir.com', '::1', 'afasf', 4, 2, '2020-04-29', 1),
(16, 'lautaroserantes@hotmail.com', '::1', 'dasdasd', 3, 1, '2020-06-20', 1),
(22, 'lautaro.serantes@davinci.edu.a', '::1', '1', 1, 1, '2020-07-10', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `telefono` int(255) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `comentario` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `motivo` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `apellido`, `telefono`, `email`, `comentario`, `motivo`) VALUES
(1, 'Lautaro', 'Serantes', 1162852633, 'nicorrpp@outlook.com', 'asdsad', 'RRHH,VENTAS,ATENCION AL CLIENTE'),
(2, 'Lautaro', 'Serantes', 1162852633, 'lautaro.serantes@davinci.edu.ar', 'fafa', 'RRHH,VENTAS,ATENCION AL CLIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(250) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `id_padre` int(11) NOT NULL DEFAULT 1,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre`, `id_padre`, `estado`) VALUES
(1, 'Todas las Marcas', 0, 1),
(2, 'FunnyToys ', 1, 1),
(3, 'DuffSico', 1, 1),
(4, 'mrSparkle', 1, 1),
(5, 'Mapel', 1, 1),
(6, 'Tonicos666', 1, 1),
(7, 'Krusty', 1, 1),
(8, 'AlterBalta', 1, 1),
(9, 'Gracias', 1, 1),
(10, 'Pepsico', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `nombre`) VALUES
(17, 'Modificado'),
(19, 'prueba2'),
(20, 'dasd'),
(21, 'sadad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_permiso`
--

CREATE TABLE `perfil_permiso` (
  `pp_id` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil_permiso`
--

INSERT INTO `perfil_permiso` (`pp_id`, `id_perfil`, `id_permiso`) VALUES
(48, 19, 1),
(49, 19, 2),
(50, 20, 2),
(51, 20, 4),
(52, 21, 1),
(53, 21, 2),
(54, 21, 3),
(55, 21, 4),
(78, 17, 1),
(79, 17, 2),
(80, 17, 3),
(81, 17, 4),
(82, 17, 5),
(83, 17, 6),
(84, 17, 7),
(85, 17, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `codigo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `nombre`, `codigo`) VALUES
(1, 'Agregar usuarios', 'add.user'),
(2, 'Modificar usuarios', 'mod.user'),
(3, 'Borrar usuarios', 'del.user'),
(4, 'Productos', 'amb.prod'),
(5, 'Categorias', 'amb.cat'),
(6, 'Marcas', 'amb.mar'),
(7, 'Comentarios', 'com'),
(8, 'Perfiles', 'perf');

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
  `destacado` tinyint(1) NOT NULL,
  `marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `sub_categoria`, `descripcion`, `precio`, `stock`, `puntuacion`, `comentario`, `destacado`, `marca`) VALUES
(1, 'Acido Sulfurico', 24, 2, 'Ideal para calmar la sed', 10, 1, 0, 0, 1, 7),
(2, 'Aprieta Y Traga', 7, 9, 'Salchichón completo del tío Lardo!', 10.5, 1, 0, 0, 1, 1),
(3, 'Rosquilla', 7, 8, 'La rosca prohibida', 1, 1, 0, 0, 1, 2),
(4, 'Duff', 6, 23, 'Mmmm Cerveza!', 545, 1, 0, 0, 1, 3),
(5, 'Simpson Son', 2, 1, 'Tonico revitalizante', 35, 1, 0, 0, 1, 2),
(6, 'Gabo', 10, 13, 'Soy un perversito', 45, 1, 0, 0, 0, 4),
(7, 'Colonia', 24, 1, 'Ideal para regalar', 2, 1, 1, 0, 1, 3),
(8, 'Buzz', 6, 22, 'Refresco de Itchy and Scratchy', 3, 1, 0, 0, 1, 6),
(9, 'Alma', 24, 1, 'Vale por el alma de Bart Simpsons', 63, 1, 0, 0, 1, 5),
(10, 'Japon', 24, 1, 'Mr. Sparkle, para lavar los platos', 35, 1, 0, 0, 0, 6),
(11, 'Arroz', 7, 9, 'Arroz con queso', 20, 1, 0, 0, 1, 5),
(12, 'Squishee', 6, 22, 'Mmm malteada!', 25, 1, 0, 0, 1, 3),
(13, 'Test Embarazo', 24, 1, 'El test mas efectivo, siempre da positivo', 50, 1, 0, 0, 1, 4),
(14, 'Khlav Kalash', 7, 9, 'No pizza solo Khlav Kalash', 5, 1, 0, 0, 0, 1),
(15, 'Jugo Cangrejo', 6, 22, 'De cangrejos?!, Si de cangrejos', 15, 1, 0, 0, 0, 1),
(16, 'Bort', 24, 1, 'Necesitamos mas matriculas con el nombre de Bort', 15, 1, 0, 0, 0, 2),
(17, 'El Homeromovil', 24, 1, 'Si, esta moustrocidad cuesta eso', 82000, 1, 0, 0, 1, 4),
(18, 'Cereal', 7, 8, 'Viene con una rueda de metal', 2, 1, 0, 0, 0, 3),
(19, 'Cho Cho', 24, 1, 'La maquinita tu eres el elegido', 1, 1, 0, 0, 0, 3),
(20, 'Conejo Pepito', 10, 13, 'Incluye la cabeza arrancada por Bart', 0, 1, 0, 0, 1, 5),
(21, 'Escopeta', 24, 1, 'Incluye el modo callejera', 10, 1, 0, 0, 1, 6),
(22, 'Globo', 24, 1, 'El profesor Smithers y sus pompotas', 24, 1, 0, 0, 1, 1),
(23, 'Jarabe', 2, 1, 'Puede caudar alusinaciones', 18, 1, 0, 0, 1, 2),
(24, 'Juego', 10, 13, 'Bonestorm, el juego mas violento', 50, 0, 0, 0, 0, 3),
(25, 'Llamarada Moe', 6, 23, 'El ingrediente secreto es jarabe para la tos', 25, 1, 0, 0, 1, 4),
(26, 'Mano Mono', 24, 1, 'Mano de los deseos, ideal para la paz mundial', 80, 1, 0, 0, 0, 1),
(27, 'Martillo', 24, 1, 'Martillo electronico creado por Tomas Edison', 36, 1, 0, 0, 1, 1),
(28, 'Papas', 7, 9, 'Sabrosas papas fritas', 3, 1, 0, 0, 1, 1),
(29, 'Salchicha', 7, 9, 'Se cayo al suelo, pero sera nuestro secreto', 1, 1, 0, 0, 1, 1),
(30, 'Sillon banio', 24, 1, 'Super comodo para ir al baño', 200, 1, 0, 0, 1, 1),
(31, 'Focusyn', 2, 1, 'Me siento feliz tomo mi Focusyn', 57, 1, 0, 0, 1, 1),
(32, 'Videogame 2', 10, 13, 'Operacion rescate', 54, 1, 0, 0, 0, 1),
(33, 'Fonzo', 10, 12, 'Dame un abrazo', 150, 1, 0, 0, 1, 1),
(34, 'Disfraz Bartman', 3, 4, 'Salvando la ciudad de Sprinfield', 234, 1, 0, 0, 1, 1),
(35, 'Disfraz Hombre Radioactivo', 3, 4, 'Soy el hombre radioactivo', 263, 1, 0, 0, 0, 1),
(36, 'Disfraz Lisa', 3, 5, 'Premio por no tener ayuda de los padres', 76, 1, 0, 0, 1, 1),
(37, 'Stacy Vaquera', 10, 11, 'Olee!', 70, 1, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `clave` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `salt` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `clave`, `salt`, `estado`) VALUES
(9, 'Lautaro', 'Serantes', 'prueba', 'f6fb178ecec3390c630ee92f2b5f873b', '5f03526b61c7b', 1),
(10, 'a', 'a', 'a', 'a415974635b33257fe285b5b02084538', '5f0561b44a1f0', 0),
(11, 'b', 'b', 'b', '6d238566c89c09218419c81e6b164107', '5f056962b44cd', 1),
(13, 'admin', 'admin', 'admin', '6eee1b8176b395f113fb8e9be0d48259', '5f057b445673e', 1),
(15, 'aaa', 'aaaa', 'admin1', '10ac905c0b8e8e45eb7ed20987b52921', '5f0977e143749', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_perfil`
--

CREATE TABLE `usuario_perfil` (
  `up_id` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_perfil`
--

INSERT INTO `usuario_perfil` (`up_id`, `id_perfil`, `id_usuario`) VALUES
(20, 17, 13),
(21, 17, 14);

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
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `perfil_permiso`
--
ALTER TABLE `perfil_permiso`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

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
  ADD PRIMARY KEY (`up_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `perfil_permiso`
--
ALTER TABLE `perfil_permiso`
  MODIFY `pp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario_perfil`
--
ALTER TABLE `usuario_perfil`
  MODIFY `up_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
