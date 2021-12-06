-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2021 a las 19:13:17
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alroma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler_bicis`
--

CREATE TABLE `alquiler_bicis` (
  `codigo_reserva` int(11) NOT NULL,
  `id_bici` int(11) NOT NULL,
  `nombre_arrendatario` varchar(50) NOT NULL,
  `tipo_bici` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `cantidad_alquilada` int(11) NOT NULL,
  `Total_importe` int(11) NOT NULL,
  `reserva_activa` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alquiler_bicis`
--

INSERT INTO `alquiler_bicis` (`codigo_reserva`, `id_bici`, `nombre_arrendatario`, `tipo_bici`, `fecha_inicio`, `fecha_fin`, `cantidad_alquilada`, `Total_importe`, `reserva_activa`) VALUES
(78, 3, 'Pepe', 'Carretera', '2021-11-30', '2021-12-02', 1, 20, 0),
(112, 3, 'asadsd', 'Carretera', '2021-11-30', '2021-12-02', 2, 20, 0),
(113, 3, 'asadsd', 'Carretera', '2021-11-30', '2021-12-02', 3, 20, 0),
(114, 4, 'asadsd', 'Carretera', '2021-11-29', '2021-12-03', 1, 20, 0),
(115, 3, 'asadsd', 'Carretera', '2021-11-30', '2021-12-02', 1, 20, 0),
(116, 3, 'asd', 'Carretera', '2021-12-30', '2021-12-07', 2, 460, 0),
(117, 4, 'agdret', 'Carretera', '2021-12-30', '2021-12-09', 2, 420, 1),
(118, 4, 'agdret', 'Carretera', '2021-12-30', '2021-12-09', 2, 420, 1),
(119, 5, 'gwegrwe', 'MTB', '2021-11-30', '2021-12-03', 1, 30, 0),
(120, 3, 'test 22', 'Carretera', '2021-11-30', '2021-12-01', 2, 20, 0),
(121, 3, 'asdasd', 'Carretera', '2021-11-30', '2021-12-01', 2, 20, 0),
(122, 3, 'test33', 'Carretera', '2021-11-30', '2021-12-01', 2, 20, 0),
(123, 3, 'test44', 'Carretera', '2021-12-10', '2021-12-14', 2, 80, 1),
(124, 3, 'test55', 'Carretera', '2021-12-02', '2021-12-06', 2, 80, 1),
(125, 3, 'test66', 'Carretera', '2021-11-30', '2021-12-05', 2, 100, 0),
(126, 3, '4', 'Carretera', '2021-12-03', '2021-12-05', 2, 40, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bicis_alquiler`
--

CREATE TABLE `bicis_alquiler` (
  `imagen` varchar(100) NOT NULL,
  `cod` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `stock` int(5) NOT NULL,
  `descripcion` text NOT NULL,
  `PVP` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bicis_alquiler`
--

INSERT INTO `bicis_alquiler` (`imagen`, `cod`, `nombre`, `stock`, `descripcion`, `PVP`) VALUES
('cannondaleTrailSl3.png', 2, 'Cannondale Trail SL3', 100, 'MTB. Suspensión delantera Rocksox Siver, con bloqueo en el manillar. Frenos de disco hidraúlicos, shimano deore. Peso:12,95kg', '1.299'),
('specialized.png', 3, 'BICICLETA SPECIALIZED TARMAC SL6 COMP', 90, 'Horquilla FACT carbon, 12x100mm thru-axle, flat-mount disc. Frenos Shimano Ultegra R8070, hydraulic disc. Ruedas DT Swiss R470 rim, 20mm internal width, tubeless ready Cambio Shimano Ultegra R8000, Shadow Design, 11-speed Cadena Shimano Ultegra, 11-speed.', '3.678,00'),
('cannondale-trail-2.png', 4, 'Cannondale Trail SL2', 100, 'MTB. Suspensión delantera Rocksox Siver, con bloqueo en el manillar. Frenos de disco hidraúlicos, shimano deore. Peso:12,95kg', '1.100'),
('megamo-pulse-elite.png', 5, 'MEGAMO PULSE ELITE 03 (21)', 100, 'Cuadro de carbono ultra ligero con cableado totalmente interno. Transmisión Ultegra Di2. Ruedas Mavic Cosmic SLR 45', '4.899,00'),
('specialized-diverge-sport-carbon.png\r\n', 6, 'SPECIALIZED DIVERGE SPORT CARBON', 100, 'Cuadro: Carbono Specialized Diverge FACT 8r, suspensión Future Shock, pedalier roscado, guiado interno, eje pasante de 12x142 mm, disco de montaje plano\r\nHorquilla: Future Shock 1.5 w / Smooth Boot, carbono FACT, eje pasante de 12x100 mm, montaje', '3.800,01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_cliente` int(20) NOT NULL,
  `fecha_factura` date NOT NULL,
  `articulo` varchar(50) NOT NULL,
  `cantidad` varchar(11) NOT NULL,
  `PVP` decimal(5,2) UNSIGNED NOT NULL,
  `Total` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id_cliente`, `fecha_factura`, `articulo`, `cantidad`, `PVP`, `Total`) VALUES
(1, '2021-11-10', 'Rodamiento rueda trasera', '1', '0.80', '0.96'),
(2, '2021-11-17', 'eje pedalier', '1', '3.00', '3.63'),
(2, '2021-11-18', 'rodamiento trasero', '1', '0.50', '0.60'),
(1, '2021-11-20', 'eje pedalier', '1', '3.00', '0.60');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_clientes`
--

CREATE TABLE `login_clientes` (
  `id_cliente` int(11) NOT NULL,
  `apenom_cliente` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL DEFAULT 'NULL',
  `email` varchar(50) NOT NULL DEFAULT 'NULL',
  `usuario_cliente` varchar(50) NOT NULL,
  `pass_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login_clientes`
--

INSERT INTO `login_clientes` (`id_cliente`, `apenom_cliente`, `direccion`, `email`, `usuario_cliente`, `pass_cliente`) VALUES
(1, 'Alberto Rodríguez Morales', 'Castillo Viejo', 'llenerense@hotmail.com', 'dwes', 'abc123.'),
(2, 'Pepe', 'Av. Martín Palomino, 86', 'arodrig122wsuez@royalcomunicacion.com', 'pepe', 'pepe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_trabajadores`
--

CREATE TABLE `login_trabajadores` (
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `id_trabajador` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login_trabajadores`
--

INSERT INTO `login_trabajadores` (`nombre`, `apellidos`, `user`, `pass`, `id_trabajador`) VALUES
('alberto', 'rodriguez morales', 'llenerense', 'alroma', 1),
('Sergio', 'calatraba Rodríguez', 'sCalRo', 'sCalRo', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `imagen` varchar(100) NOT NULL,
  `cod` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `PVP` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`imagen`, `cod`, `nombre`, `stock`, `descripcion`, `PVP`) VALUES
('cannondaleTrailSl3.png', 2, 'Cannondale Trail SL3', 3, 'MTB. Suspensión delantera Rocksox Siver, con bloqueo en el manillar. Frenos de disco hidraúlicos, shimano deore. Peso:12,95kg', '1.299'),
('specialized.png', 3, 'BICICLETA SPECIALIZED TARMAC SL6 COMP', 5, 'Horquilla FACT carbon, 12x100mm thru-axle, flat-mount disc. Frenos Shimano Ultegra R8070, hydraulic disc. Ruedas DT Swiss R470 rim, 20mm internal width, tubeless ready Cambio Shimano Ultegra R8000, Shadow Design, 11-speed Cadena Shimano Ultegra, 11-speed.', '3.678,00'),
('cannondale-trail-2.png', 4, 'Cannondale Trail SL2', 1, 'MTB. Suspensión delantera Rocksox Siver, con bloqueo en el manillar. Frenos de disco hidraúlicos, shimano deore. Peso:12,95kg', '1.100'),
('specialized-diverge-sport-carbon.png', 5, 'MEGAMO PULSE ELITE 03 (21)', 2, 'Cuadro de carbono ultra ligero con cableado totalmente interno. Transmisión Ultegra Di2. Ruedas Mavic Cosmic SLR 45', '4.899,00'),
('specialized-diverge-sport-carbon.png\r\n', 6, 'SPECIALIZED DIVERGE SPORT CARBON', 4, 'Cuadro: Carbono Specialized Diverge FACT 8r, suspensión Future Shock, pedalier roscado, guiado interno, eje pasante de 12x142 mm, disco de montaje plano\r\nHorquilla: Future Shock 1.5 w / Smooth Boot, carbono FACT, eje pasante de 12x100 mm, montaje', '3.800,01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler_bicis`
--
ALTER TABLE `alquiler_bicis`
  ADD PRIMARY KEY (`codigo_reserva`);

--
-- Indices de la tabla `bicis_alquiler`
--
ALTER TABLE `bicis_alquiler`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `login_clientes`
--
ALTER TABLE `login_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `login_trabajadores`
--
ALTER TABLE `login_trabajadores`
  ADD PRIMARY KEY (`id_trabajador`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquiler_bicis`
--
ALTER TABLE `alquiler_bicis`
  MODIFY `codigo_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `bicis_alquiler`
--
ALTER TABLE `bicis_alquiler`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `login_clientes`
--
ALTER TABLE `login_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `login_trabajadores`
--
ALTER TABLE `login_trabajadores`
  MODIFY `id_trabajador` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
