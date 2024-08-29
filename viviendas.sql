-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2023 a las 06:16:29
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `viviendas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `administrador` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `administrador`, `password`) VALUES
(1, 'ricardo_garcia', 'Abcd123'),
(2, 'luis_cepeda', 'Abcd123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(1000) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `Mensaje` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_viviendas`
--

CREATE TABLE `datos_viviendas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(1000) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `tipo` varchar(1000) NOT NULL,
  `num_habitaciones` int(11) NOT NULL,
  `num_banos` int(11) NOT NULL,
  `ciudad` varchar(1000) NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  `precio` float NOT NULL,
  `venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `datos_viviendas`
--

INSERT INTO `datos_viviendas` (`id`, `nombre`, `descripcion`, `tipo`, `num_habitaciones`, `num_banos`, `ciudad`, `latitud`, `longitud`, `precio`, `venta`) VALUES
(14, 'Departamento en Akumal Para estrenar', 'Departamento en Akumal con dos recámaras y dos baños  sala comedor, cocina y balcón para disfrutar de las mejores vistas de estas magníficas áreas donde los residentes pueden tener acceso a las atracciones de los complejos turísticos de Grand Sirenis y el club campestre de Tulum, que cuentan con la mejor clubs de playas, restaurantes, centros holísticos, campos de golf de clase mundial, todo esto dentro de un enorme complejo rodeado de playas de arena blanca, vigilado por guardias de seguridad y ubicado cerca del pueblo mágico de Tulum y Playa del Carmen, tenemos un plan Disponible de financiamiento sin intereses, proporcionado por los desarrolladores con el 50% de enganche.', 'Departamento', 2, 2, 'Akumal', 20.4203, -87.3019, 3348000, 1),
(16, 'Casa nueva en Cancún a bajo precio', 'Sin duda alguna esta es la mejor opción para adquirir Casa  de dos plantas con de tres recámaras y tres baños por $1,990,000 viene con una excelente cocina con cubiertas de granito equipada con estufa campana horno  sala y comedor, una recámara en la planta baja, patio trasero privado, área de lavado, calentador eléctrico de agua Estacionamiento para dos autos, casa club con una gran alberca equipada, asadores, área de juegos para niños seguridad las 24/7, El residencial se encuentra convenientemente ubicado a poca distancia de la zona hotelera y sus playas paradisiacas, y muy  cerca de supermercados, tiendas restaurantes, bares transporte público para mayor información por favor envíenos un mensaje WhatsApp al  9984596417', 'Casa', 3, 3, 'Cancún', 21.0819, -86.8494, 1990000, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id` int(11) NOT NULL,
  `vivienda_id` int(11) NOT NULL,
  `imagen` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `vivienda_id`, `imagen`) VALUES
(60, 14, 'imagenes/Departamento en Akumal Para estrenar_1.jpg'),
(61, 14, 'imagenes/Departamento en Akumal Para estrenar_2.jpg'),
(62, 14, 'imagenes/Departamento en Akumal Para estrenar_3.jpg'),
(63, 14, 'imagenes/Departamento en Akumal Para estrenar_4.jpg'),
(64, 14, 'imagenes/Departamento en Akumal Para estrenar_5.jpg'),
(65, 14, 'imagenes/Departamento en Akumal Para estrenar_6.jpg'),
(66, 14, 'imagenes/Departamento en Akumal Para estrenar_7.jpg'),
(67, 14, 'imagenes/Departamento en Akumal Para estrenar_8.jpg'),
(68, 14, 'imagenes/Departamento en Akumal Para estrenar_9.jpg'),
(69, 14, 'imagenes/Departamento en Akumal Para estrenar_10.jpg'),
(84, 16, 'imagenes/Casa nueva en Cancún a bajo precio_1.jpg'),
(85, 16, 'imagenes/Casa nueva en Cancún a bajo precio_2.jpg'),
(86, 16, 'imagenes/Casa nueva en Cancún a bajo precio_3.jpg'),
(87, 16, 'imagenes/Casa nueva en Cancún a bajo precio_4.jpg'),
(88, 16, 'imagenes/Casa nueva en Cancún a bajo precio_5.jpg'),
(89, 16, 'imagenes/Casa nueva en Cancún a bajo precio_6.jpg'),
(90, 16, 'imagenes/Casa nueva en Cancún a bajo precio_7.jpg'),
(91, 16, 'imagenes/Casa nueva en Cancún a bajo precio_8.jpg'),
(92, 16, 'imagenes/Casa nueva en Cancún a bajo precio_9.jpg'),
(93, 16, 'imagenes/Casa nueva en Cancún a bajo precio_10.jpg'),
(94, 16, 'imagenes/Casa nueva en Cancún a bajo precio_11.jpg'),
(95, 16, 'imagenes/Casa nueva en Cancún a bajo precio_12.jpg'),
(96, 16, 'imagenes/Casa nueva en Cancún a bajo precio_13.jpg'),
(97, 16, 'imagenes/Casa nueva en Cancún a bajo precio_14.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `datos_viviendas`
--
ALTER TABLE `datos_viviendas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vivienda_id` (`vivienda_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_viviendas`
--
ALTER TABLE `datos_viviendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`vivienda_id`) REFERENCES `datos_viviendas` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
