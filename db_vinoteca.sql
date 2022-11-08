-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2022 a las 20:29:47
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
-- Base de datos: `db_vinoteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_Marca` int(11) NOT NULL,
  `Marca` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_Marca`, `Marca`) VALUES
(52, 'Santa Julia'),
(53, 'Dada'),
(54, 'Finca de las moras'),
(56, 'Casa Boher Cabernet Franc ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `id_Marca` int(11) NOT NULL,
  `Variedad` varchar(140) NOT NULL,
  `Descripcion` varchar(400) NOT NULL,
  `Precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `id_Marca`, `Variedad`, `Descripcion`, `Precio`) VALUES
(192, 52, 'Tinto', 'Cosecha: Manual en cajas de plástico o bines. Vinificación: Las uvas fueron descobajadas y molidas, luego se realizó una maceración prefermentativa fría para seguir con una vinificación clásica en tinto, con siembra de levaduras seleccionadas y fermentación entre 25-27º C. Maceración de 15 días sobre los orujos, con remontajes y delestage periódicos, descube y fermentación maloláctica completa.', 1234),
(193, 53, 'Tinto', 'Se puede agregar una tarjeta dedicatoria y presentación de regalo. Envíos a CABA y GBA con nuestra propia flota, siguiendo todas las normas de seguridad sanitaria. Aceptamos Mercadopago, tarjetas de crédito y transferencia bancaria.', 1234),
(194, 53, 'Blanco', 'Se puede agregar una tarjeta dedicatoria y presentación de regalo. Envíos a CABA y GBA con nuestra propia flota, siguiendo todas las normas de seguridad sanitaria. Aceptamos Mercadopago, tarjetas de crédito y transferencia bancaria.', 12345),
(195, 54, 'Blanco', 'Se puede agregar una tarjeta dedicatoria y presentación de regalo. Envíos a CABA y GBA con nuestra propia flota, siguiendo todas las normas de seguridad sanitaria. Aceptamos Mercadopago, tarjetas de crédito y transferencia bancaria.', 12345),
(196, 56, 'Tinto', 'Un blend de un rojo intenso con aromas a frutos rojos maduros y especias. Posee taninos maduros que dan una sensación de redondez y una amplitud y final perdurables.', 2233),
(197, 52, 'Blanco', 'Un blend de un rojo intenso con aromas a frutos rojos maduros y especias. Posee taninos maduros que dan una sensación de redondez y una amplitud y final perdurables.', 12345),
(198, 53, 'Blanco', 'Color amarillo claro con tonos verdosos, brillante. De gran expresión y tipicidad varietal, intenso, complejo. Se destacan las notas cítricas, como el pomelo, duraznos blancos con un toque mineral. En boca es equilibrado, amplio, fresco y de largo final.', 1454),
(199, 56, 'Tinto', 'De Color rojo profundo con matices en el mismo tono.Con un Aroma a Violetas, ciruelas negras, frutos silvestres negros y hojas de tabaco, y de sabor es Complejo. Con entrada y evolución en boca suave, de gran elegancia y con un final Largo, persistente y muy complejo.', 12345),
(200, 52, 'Blanco', 'Un blend de un rojo intenso con aromas a frutos rojos maduros y especias. Posee taninos maduros que dan una sensación de redondez y una amplitud y final perdurables.', 1234);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`) VALUES
(2, 'vinoteca@mail.com', '$2y$10$NudFKdq5FegLk.EkrgRFzOYXefkX0utkdADrLBQ0Bb707U0lKDh9.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_Marca`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Marca` (`id_Marca`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_Marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_Marca`) REFERENCES `marca` (`id_Marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
