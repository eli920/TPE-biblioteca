-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2024 a las 21:02:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tpe-biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` int(11) NOT NULL,
  `Nombre y Apellido` varchar(45) NOT NULL,
  `Nacionalidad` varchar(45) NOT NULL,
  `Biografía` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `Nombre y Apellido`, `Nacionalidad`, `Biografía`) VALUES
(1, 'Guillermo Martínez', 'Argentina', 'Guillermo Martínez (1962-) es un destacado escritor y matemático argentino, conocido por sus novelas y ensayos que combinan elementos de la matemática y el misterio. Nació en Bahía Blanca y estudió matemáticas en la Universidad Nacional del Sur. Su novela más conocida, \"Los crímenes de Oxford\" (2003), explora el vínculo entre el crimen y las matemáticas, y ha sido adaptada al cine. Martínez ha recibido varios premios literarios por su trabajo y es reconocido por su habilidad para entrelazar la precisión matemática con la narrativa literaria.'),
(2, 'Julio Verne', 'Francés', 'Julio Verne (1828-1905) fue un célebre novelista francés, pionero en el género de la ciencia ficción. Nacido en Nantes, Verne es conocido por sus imaginativas novelas de aventuras y exploraciones, como \"Veinte mil leguas de viaje submarino\" y \"La vuelta al mundo en ochenta días\". Su obra, que combina la ciencia y la tecnología con tramas emocionantes, ha influido profundamente en la literatura de aventuras y la ciencia ficción, estableciendo a Verne como uno de los grandes visionarios de su época.\r\n\r\n\r\n\r\n'),
(3, 'Alfonsina Storni', 'Argentina', 'Alfonsina Storni (1892-1938) fue una influyente poeta y escritora argentina, nacida en Sala Capriasca, Suiza. Se mudó a Argentina en su infancia y se convirtió en una figura central de la literatura latinoamericana. Reconocida por su aguda crítica social y su enfoque en temas feministas, Storni dejó un legado duradero con su poesía, ensayos y obras de teatro, marcando un importante precedente para las escritoras de su tiempo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `Título` varchar(45) NOT NULL,
  `Género` varchar(45) NOT NULL,
  `Editorial` varchar(45) NOT NULL,
  `Año_publicación` int(4) NOT NULL,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `Título`, `Género`, `Editorial`, `Año_publicación`, `id_autor`) VALUES
(1, 'Crímenes Imperceptibles', 'Suspenso y novela policíaca', 'Grupo Editorial Planeta', 2003, 1),
(2, 'La muerte lenta de Luciana B', 'Suspenso', 'Grupo Editorial Planeta', 2007, 1),
(3, 'La Última vez', 'Ficción Moderna Y Contemporánea.', 'Grupo Editorial Planeta', 2022, 1),
(4, 'La isla misteriosa', 'Novela, ciencia ficción', 'Pierre-Jules Hetzel', 1974, 2),
(6, 'Veinte mil leguas de viaje submarino ', 'Novela, ciencia ficción', 'Pierre-Jules Hetzel', 1869, 2),
(7, 'La vuelta al mundo en ochenta días', 'Novela, ciencia ficción', 'Pierre-Jules Hetzel', 1872, 2),
(8, 'La inquietud del Rosal', 'Poesía', 'Losada', 1916, 3),
(9, 'Mundo de siete pozos', 'Poesía', 'Losada', 1934, 3),
(11, 'Mariposa', 'Poesía', 'Losada', 1927, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_autor` (`id_autor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `libro_ibfk_1` FOREIGN KEY (`id_autor`) REFERENCES `autor` (`id_autor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
