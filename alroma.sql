-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2021 a las 19:45:47
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `id_bici` int(11) NOT NULL,
  `tipo_bici` varchar(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `Total_importe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id_cliente` int(11) NOT NULL,
  `fecha_factura` date NOT NULL,
  `cod_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `PVP` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_clientes`
--

CREATE TABLE `login_clientes` (
  `apenom_cliente` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL DEFAULT 'NULL',
  `email` varchar(50) NOT NULL DEFAULT 'NULL',
  `usuario_cliente` varchar(50) NOT NULL,
  `pass_cliente` varchar(50) NOT NULL,
  `id_cliente` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login_clientes`
--

INSERT INTO `login_clientes` (`apenom_cliente`, `direccion`, `email`, `usuario_cliente`, `pass_cliente`, `id_cliente`) VALUES
('Alberto Rodríguez Morales', 'Castillo Viejo', 'llenerense@hotmail.com', 'dwes', 'abc123.', 91),
('Alberto Rodríguez Morales', 'Castillo Viejo', 'arodriguez@royalcomunicacion.com', 'Alberto', 'abc123.', 104),
('Alberto Rodríguez Morales', 'Castillo Viejo', 'llenerense11@hotmail.com', 'assdad', 'abc123.', 160),
('Alberto Rodríguez Morales', 'Castillo Viejo', 'pepeGrillo@gmail.com', 'dwes555', 'abc123.', 161),
('Alberto Rodríguez Morales', 'Castillo Viejo', 'llenerenswwe@hotmail.com', 'dwes21', 'abc123.', 162),
('Alberto Rodríguez Morales', 'Castillo Viejo', 'pepeGrillo87@gmail.com', 'llll', '', 163),
('Alberto Rodríguez Morales', 'Castillo Viejo', 'llenerensssse@hotmail.com', 'Albertossss', 'ssdss', 164),
('Naturgarden', 'Av. Martín Palomino, 86', 'arodrig122wsuez@royalcomunicacion.com', 'Naturgarden', 'asasasasas', 165);

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
('test royal', 'royal', 'Naturgarden', 'royal', 0),
('alberto', 'rodriguez morales', 'llenerense', 'alroma', 1),
('Sergio', 'calatraba Rodríguez', 'sCalRo', 'sCalRo', 3),
('Sergio', 'calatraba Rodríguez', 'sCalRo', 'sCalRo', 4),
('asdsaad', 'asddsa', 'adasa', 'asdsad', 5),
('wewewe', 'dddd', 'xzzzzz', 's', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `imagen` varchar(100) NOT NULL,
  `cod` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `descripcion` text NOT NULL,
  `PVP` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`imagen`, `cod`, `nombre`, `descripcion`, `PVP`) VALUES
('cannondaleTrailSl3.png', 2, 'Cannondale Trail SL3', 'MTB. Suspensión delantera Rocksox Siver, con bloqueo en el manillar. Frenos de disco hidraúlicos, shimano deore. Peso:12,95kg', '1.299'),
('specialized.png', 3, 'BICICLETA SPECIALIZED TARMAC SL6 COMP', 'Horquilla FACT carbon, 12x100mm thru-axle, flat-mount disc. Frenos Shimano Ultegra R8070, hydraulic disc. Ruedas DT Swiss R470 rim, 20mm internal width, tubeless ready Cambio Shimano Ultegra R8000, Shadow Design, 11-speed Cadena Shimano Ultegra, 11-speed.', '3.678,00'),
('cannondale-trail-2.png', 4, 'Cannondale Trail SL2', 'MTB. Suspensión delantera Rocksox Siver, con bloqueo en el manillar. Frenos de disco hidraúlicos, shimano deore. Peso:12,95kg', '1.100'),
('megamo-pulse-elite.png', 5, 'MEGAMO PULSE ELITE 03 (21)', 'Cuadro de carbono ultra ligero con cableado totalmente interno. Transmisión Ultegra Di2. Ruedas Mavic Cosmic SLR 45', '4.899,00'),
('specialized-diverge-sport-carbon.png\r\n', 6, 'SPECIALIZED DIVERGE SPORT CARBON', 'Cuadro: Carbono Specialized Diverge FACT 8r, suspensión Future Shock, pedalier roscado, guiado interno, eje pasante de 12x142 mm, disco de montaje plano\r\nHorquilla: Future Shock 1.5 w / Smooth Boot, carbono FACT, eje pasante de 12x100 mm, montaje', '3.800,01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id_cliente`);

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
-- AUTO_INCREMENT de la tabla `login_clientes`
--
ALTER TABLE `login_clientes`
  MODIFY `id_cliente` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
