-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2021 a las 00:10:30
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_impresoras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresoras`
--

CREATE TABLE `impresoras` (
  `id_impresora` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `descripcion` tinytext NOT NULL,
  `id_metodo_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `impresoras`
--

INSERT INTO `impresoras` (`id_impresora`, `modelo`, `marca`, `descripcion`, `id_metodo_fk`) VALUES
(1, 'M650', 'HP', 'Multifunción, monocromática, escanea, panel visor, etc.', 1),
(2, 'HT500', 'Metadatos', 'Impresora laser experimental', 5),
(3, 'LX300', 'Epson', 'Solo imprime en blanco y negro.', 3),
(4, 'FX890', 'Epson', 'Blanco y Negro. Velocidad de hasta 680 cps a 12 cp', 3),
(5, 'Ender-3', 'Creality', 'Impresora FDM', 5),
(6, 'Magna', 'Hellbot', 'Impresora FDM', 5),
(7, 'TX200', 'Epson', 'Impresión a color. Contiene 4 cartuchos. Escanear.', 2),
(8, 'P-HAS-180', 'Hasar', 'Impresora Termica Hasar Has 180 Usb Rs232 Tickets Comandera', 4),
(9, 'Prusai3', 'PrusaResearch', 'Impresora FDM', 5),
(10, 'Ender-5', 'Creality', 'Impresora FDM', 5),
(11, 'Alpha 2r', 'TSC', 'Impresora térmica portátil de Tickets.', 7),
(12, '6800', 'Kodak', 'Térmica fotográfica', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos`
--

CREATE TABLE `metodos` (
  `id_metodo` int(11) NOT NULL,
  `metodo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `metodos`
--

INSERT INTO `metodos` (`id_metodo`, `metodo`) VALUES
(1, 'Laser'),
(2, 'Tinta'),
(3, 'Matriz de punto'),
(4, 'Térmica'),
(5, '3D'),
(6, 'Experimental'),
(7, 'Térmica portátil'),
(8, 'Térmica Color');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(32, 'jose@', '$2y$10$ct3bGnZAvX6zJ0ay89gmdeQxlkHGQ8.JhXl2M4WSNnw'),
(35, 'seba@', '$2y$10$VZ/0K2v9W6ZnrVbmktc8.O0mSS52WeaixDSsdh7gfwjMR.7.Hdkvm'),
(37, 'jose@4', '$2y$10$7Yv6yeRvBhKB2idH1DqnY.EPZWIOeRTfIRUB6klt5YqUQtbZSAquS'),
(38, 'sacoa@', '$2y$10$Az4FSwsDEaSPDtnzM58PkuCsXaK0oC.YrCYpIg2DGLm1jpvYPJLD6'),
(39, 'admin@', '$2y$10$GGrdylSlxAJN/PZiClwfbeWHx/LpAcE3iogDF2HdLDrYOqQ49O62W');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `impresoras`
--
ALTER TABLE `impresoras`
  ADD PRIMARY KEY (`id_impresora`),
  ADD KEY `id_modelo_fk` (`id_metodo_fk`);

--
-- Indices de la tabla `metodos`
--
ALTER TABLE `metodos`
  ADD PRIMARY KEY (`id_metodo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `impresoras`
--
ALTER TABLE `impresoras`
  MODIFY `id_impresora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `metodos`
--
ALTER TABLE `metodos`
  MODIFY `id_metodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `impresoras`
--
ALTER TABLE `impresoras`
  ADD CONSTRAINT `impresoras_ibfk_1` FOREIGN KEY (`id_metodo_fk`) REFERENCES `metodos` (`id_metodo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
