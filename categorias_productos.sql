-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2020 a las 01:06:21
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(4, 'Superheroes', 3, 0),
(5, 'Personajes', 3, 1),
(6, 'Bebidas', 1, 1),
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
(3, 'mica@example.com', '::1', 'asdfgfcgvhbjn', 2, 1, '2020-04-27', 1),
(4, 'lagana.mcl@gmail.com', '::1', 'rdyjtdtfg', 5, 1, '2020-04-27', 1),
(5, '2@d', '::1', 'sdvsdv', 1, 1, '2020-04-28', 1),
(6, '2@d', '::1', 'muy cara pero deliciosa ', 5, 4, '2020-04-29', 1),
(7, 'lautaro.serantes@davinci.edu.a', '::1', 'hola', 5, 1, '2020-04-29', 1),
(8, 'lautaro.serantes@davinci.edu.a', '::1', 'dasdasd', 2, 1, '2020-04-29', 1),
(9, 'lautaro.serantes@davinci.edu.a', '::1', 'fdasf', 2, 2, '2020-04-29', 1),
(10, 'lautaro.serantes@davinci.edu.a', '::1', 'afsaf', 2, 2, '2020-04-29', 1),
(11, 'a@gir.com', '::1', 'afasf', 4, 2, '2020-04-29', 1),
(16, 'lautaroserantes@hotmail.com', '::1', 'dasdasd', 3, 1, '2020-06-20', 0);

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
  `nombre` varchar(100) COLLATE utf8_bin NOT NULL,
  `id_padre` int(11) NOT NULL DEFAULT 1,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre`, `id_padre`, `estado`) VALUES
(1, 'Todas las Marcas', 0, 1),
(2, 'FunnyToys', 1, 1),
(3, 'DuffSico', 1, 1),
(4, 'mrSparkle', 1, 1),
(5, 'Mapel', 1, 1),
(6, 'Tonicos666', 1, 1),
(7, 'Krusty', 1, 1);

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
  `Marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `categoria`, `sub_categoria`, `descripcion`, `precio`, `stock`, `puntuacion`, `comentario`, `destacado`, `Marca`) VALUES
(1, 'Acido Sulfurico', 24, NULL, 'Ideal para calmar la sed', 10.5, 1, 0, 0, 0, 1),
(2, 'Aprieta Y Traga', 7, 9, 'Salchichón completo del tío Lardo!', 10.5, 1, 0, 0, 1, 1),
(3, 'Rosquilla', 7, 8, 'La rosca prohibida', 1, 1, 0, 0, 1, 2),
(4, 'Duff', 6, 23, 'Mmmm Cerveza!', 545, 1, 0, 0, 1, 3),
(5, 'Simpson Son', 2, NULL, 'Tonico revitalizante', 35, 1, 0, 0, 1, 2),
(6, 'Gabo', 10, 13, 'Soy un perversito', 45, 1, 0, 0, 0, 4),
(7, 'Colonia', 24, NULL, 'Ideal para regalar', 2, 1, 1, 0, 1, 3),
(8, 'Buzz', 6, 22, 'Refresco de Itchy and Scratchy', 3, 1, 0, 0, 1, 6),
(9, 'Alma', 24, NULL, 'Vale por el alma de Bart Simpsons', 63, 1, 0, 0, 1, 5),
(10, 'Japon', 24, NULL, 'Mr. Sparkle, para lavar los platos', 35, 1, 0, 0, 0, 6),
(11, 'Arroz', 7, 9, 'Arroz con queso', 20, 1, 0, 0, 1, 5),
(12, 'Squishee', 6, 22, 'Mmm malteada!', 25, 1, 0, 0, 1, 3),
(13, 'Test Embarazo', 24, NULL, 'El test mas efectivo, siempre da positivo', 50, 0, 0, 0, 1, 4),
(14, 'Khlav Kalash', 7, 9, 'No pizza solo Khlav Kalash', 5, 1, 0, 0, 0, 1),
(15, 'Jugo Cangrejo', 6, 22, 'De cangrejos?!, Si de cangrejos', 15, 1, 0, 0, 0, 1),
(16, 'Bort', 24, NULL, 'Necesitamos mas matriculas con el nombre de Bort', 15, 1, 0, 0, 0, 2),
(17, 'El Homeromovil', 24, NULL, 'Si, esta moustrocidad cuesta eso', 82000, 1, 0, 0, 1, 4),
(18, 'Cereal', 7, 8, 'Viene con una rueda de metal', 2, 1, 0, 0, 0, 3),
(19, 'Cho Cho', 24, NULL, 'La maquinita tu eres el elegido', 1, 1, 0, 0, 0, 3),
(20, 'Conejo Pepito', 10, 13, 'Incluye la cabeza arrancada por Bart', 0, 1, 0, 0, 1, 5),
(21, 'Escopeta', 24, NULL, 'Incluye el modo callejera', 10, 1, 0, 0, 1, 6),
(22, 'Globo', 24, NULL, 'El profesor Smithers y sus pompotas', 24, 1, 0, 0, 1, 1),
(23, 'Jarabe', 2, NULL, 'Puede caudar alusinaciones', 18, 1, 0, 0, 1, 2),
(24, 'Juego', 10, 13, 'Bonestorm, el juego mas violento', 50, 1, 0, 0, 0, 3),
(25, 'Llamarada Moe', 6, 23, 'El ingrediente secreto es jarabe para la tos', 25, 1, 0, 0, 1, 4),
(26, 'Mano Mono', 24, NULL, 'Mano de los deseos, ideal para la paz mundial', 80, 1, 0, 0, 0, 0),
(27, 'Martillo', 24, NULL, 'Martillo electronico creado por Tomas Edison', 36, 1, 0, 0, 1, 0),
(28, 'Papas', 7, 9, 'Sabrosas papas fritas', 3, 1, 0, 0, 1, 0),
(29, 'Salchicha', 7, 9, 'Se cayo al suelo, pero sera nuestro secreto', 1, 1, 0, 0, 1, 0),
(30, 'Sillon banio', 24, NULL, 'Super comodo para ir al baño', 200, 1, 0, 0, 1, 0),
(31, 'Focusyn', 2, NULL, 'Me siento feliz tomo mi Focusyn', 57, 1, 0, 0, 1, 0),
(32, 'Videogame 2', 10, 13, 'Operacion rescate', 54, 1, 0, 0, 0, 0),
(33, 'Fonzo', 10, 12, 'Dame un abrazo', 150, 1, 0, 0, 1, 0),
(34, 'Disfraz Bartman', 3, 4, 'Salvando la ciudad de Sprinfield', 234, 1, 0, 0, 1, 0),
(35, 'Disfraz Hombre Radioactivo', 3, 4, 'Soy el hombre radioactivo', 263, 1, 0, 0, 0, 0),
(36, 'Disfraz Lisa', 3, 5, 'Premio por no tener ayuda de los padres', 76, 1, 0, 0, 1, 0),
(37, 'Stacy Vaquera', 10, 11, 'Olee!', 70, 1, 0, 0, 1, 0);

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
  `permisos` varchar(11) COLLATE utf8_bin NOT NULL DEFAULT 'none',
  `estado` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `clave`, `permisos`, `estado`) VALUES
(1, 'MicaL', 'Micaela', 'Lagana', '123', 'none', 1),
(2, 'pepeA', 'pepe', 'argento', '123', 'none', 1),
(3, 'aaaa', 'bbbb', 'cccc', '123', 'none', 1),
(4, 'nombre', 'apellido', 'user', 'clave', 'none', 1);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
