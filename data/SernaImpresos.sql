-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 19, 2017 at 03:50 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SernaImpresos`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comentarios`
--

CREATE TABLE `Comentarios` (
  `id_Comentario` int(11) NOT NULL,
  `Nomina` varchar(20) NOT NULL,
  `Comentario` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Comentarios`
--

INSERT INTO `Comentarios` (`id_Comentario`, `Nomina`, `Comentario`) VALUES
(7, 'Admin', 'test'),
(8, 'Admin', 'Test test');

-- --------------------------------------------------------

--
-- Table structure for table `Empleados`
--

CREATE TABLE `Empleados` (
  `Nomina` varchar(20) NOT NULL,
  `Nombre` text,
  `Domicilio` text,
  `Colonia` text,
  `Ciudad` text,
  `Telefono` varchar(20) DEFAULT NULL,
  `Celular` varchar(20) DEFAULT NULL,
  `Email` text,
  `No_IMSS` bigint(20) DEFAULT NULL,
  `RFC` bigint(20) DEFAULT NULL,
  `CURP` text,
  `Puesto` varchar(20) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Fecha_Inicio` date DEFAULT NULL,
  `Salario_Hora` double DEFAULT NULL,
  `Salario_NOF` double DEFAULT NULL,
  `ISR` double DEFAULT NULL,
  `IMSS` double DEFAULT NULL,
  `Subsidio` double DEFAULT NULL,
  `Infonavit` double DEFAULT NULL,
  `Activo` varchar(20) DEFAULT NULL,
  `Usuario` varchar(20) DEFAULT NULL,
  `Contrasena` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Empleados`
--

INSERT INTO `Empleados` (`Nomina`, `Nombre`, `Domicilio`, `Colonia`, `Ciudad`, `Telefono`, `Celular`, `Email`, `No_IMSS`, `RFC`, `CURP`, `Puesto`, `Fecha_Nacimiento`, `Fecha_Inicio`, `Salario_Hora`, `Salario_NOF`, `ISR`, `IMSS`, `Subsidio`, `Infonavit`, `Activo`, `Usuario`, `Contrasena`) VALUES
('A111', 'Julian', '', '', '', '', '', '', 0, 0, '', 'Admin', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 'Si', 'july', '$2y$12$G6hOissZV7r8Fvh8krB5MO3/Z1RXN62cxmRlgkcWOZak1pBZXuNme'),
('S001', 'Edgar Jorge Serna Cavazos', 'James Cook 2937, Cumbres', 'Cumbres', 'Monterrey', '14255092', '8119104923', 'eserna_sisa@prodigy.net.mx', 0, 0, '', 'Admin', '1956-08-01', '0000-00-00', 0, 0, 0, 0, 0, 0, 'Si', 'eserna', 'fDoL6goWA+VkUklv/ioJ'),
('S1029', 'ega', '', '', '', '', '', '', 0, 0, '', 'Admin', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 'Si', 'ega', '$2y$12$UOF9rLfdrYMepVK/K1eE9.PYHPsQj884yoGTPag0mKHPV38PxyPnO'),
('S4567', 'Jorge', '', '', '', '', '', '', 0, 0, '', 'admin', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 'Si', 'jorge', '$2y$12$Qxllpfcz.cDaaBX9bzNQHul2Dj7KSPa/RPN9merdF0oBASYSMcmBq');

-- --------------------------------------------------------

--
-- Table structure for table `Mantenimiento`
--

CREATE TABLE `Mantenimiento` (
  `id_Mantenimiento` int(11) NOT NULL,
  `Maquina` text NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Mantenimiento`
--

INSERT INTO `Mantenimiento` (`id_Mantenimiento`, `Maquina`, `Fecha`) VALUES
(1, 'Maquina test 123', '2017-04-18'),
(2, 'July es gay', '2017-05-20'),
(3, 'gkhjgjkgh', '2017-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `Orden_Compra`
--

CREATE TABLE `Orden_Compra` (
  `id_OCompra` bigint(20) NOT NULL,
  `id_OTrabajo` double NOT NULL,
  `Nomina` varchar(20) NOT NULL,
  `id_Proveedor` bigint(20) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `Cantidad` bigint(20) DEFAULT NULL,
  `Unidad_Medida` text,
  `Descripcion` longtext,
  `Precio_Unitario` double DEFAULT NULL,
  `Total` double DEFAULT NULL,
  `Aprobada` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Orden_Trabajo`
--

CREATE TABLE `Orden_Trabajo` (
  `id_OTrabajo` double NOT NULL,
  `Nomina` varchar(20) DEFAULT NULL,
  `Responsable` text,
  `Descripcion` longtext,
  `Aprovada` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Proveedores`
--

CREATE TABLE `Proveedores` (
  `id_Proveedor` bigint(20) NOT NULL,
  `Nombre` text,
  `RFC` text,
  `Domicilio` text,
  `Telefono` bigint(20) DEFAULT NULL,
  `Vendedor` text,
  `Fax` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Trabaja`
--

CREATE TABLE `Trabaja` (
  `id_Trabaja` int(11) NOT NULL,
  `Nomina` varchar(20) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora_Entrada` time NOT NULL,
  `Hora_Salida` time NOT NULL,
  `Asistencia` varchar(10) NOT NULL,
  `Retraso` varchar(10) NOT NULL,
  `Horas_Trabajadas` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comentarios`
--
ALTER TABLE `Comentarios`
  ADD PRIMARY KEY (`id_Comentario`),
  ADD KEY `comentarios_ibfk_1` (`Nomina`);

--
-- Indexes for table `Empleados`
--
ALTER TABLE `Empleados`
  ADD PRIMARY KEY (`Nomina`),
  ADD UNIQUE KEY `Nomina` (`Nomina`);

--
-- Indexes for table `Mantenimiento`
--
ALTER TABLE `Mantenimiento`
  ADD PRIMARY KEY (`id_Mantenimiento`);

--
-- Indexes for table `Orden_Compra`
--
ALTER TABLE `Orden_Compra`
  ADD PRIMARY KEY (`id_OCompra`),
  ADD UNIQUE KEY `id_OCompra` (`id_OCompra`),
  ADD KEY `id_OTrabajo` (`id_OTrabajo`),
  ADD KEY `id_Proveedor` (`id_Proveedor`),
  ADD KEY `Nomina` (`Nomina`);

--
-- Indexes for table `Orden_Trabajo`
--
ALTER TABLE `Orden_Trabajo`
  ADD PRIMARY KEY (`id_OTrabajo`),
  ADD UNIQUE KEY `id_OTrabajo` (`id_OTrabajo`),
  ADD KEY `Nomina` (`Nomina`);

--
-- Indexes for table `Proveedores`
--
ALTER TABLE `Proveedores`
  ADD PRIMARY KEY (`id_Proveedor`);

--
-- Indexes for table `Trabaja`
--
ALTER TABLE `Trabaja`
  ADD PRIMARY KEY (`id_Trabaja`),
  ADD KEY `Nomina` (`Nomina`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comentarios`
--
ALTER TABLE `Comentarios`
  MODIFY `id_Comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Mantenimiento`
--
ALTER TABLE `Mantenimiento`
  MODIFY `id_Mantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `Orden_Compra`
--
ALTER TABLE `Orden_Compra`
  MODIFY `id_OCompra` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Orden_Trabajo`
--
ALTER TABLE `Orden_Trabajo`
  MODIFY `id_OTrabajo` double NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Proveedores`
--
ALTER TABLE `Proveedores`
  MODIFY `id_Proveedor` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Trabaja`
--
ALTER TABLE `Trabaja`
  MODIFY `id_Trabaja` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Orden_Compra`
--
ALTER TABLE `Orden_Compra`
  ADD CONSTRAINT `orden_compra_ibfk_1` FOREIGN KEY (`id_OTrabajo`) REFERENCES `Orden_Trabajo` (`id_OTrabajo`),
  ADD CONSTRAINT `orden_compra_ibfk_2` FOREIGN KEY (`id_Proveedor`) REFERENCES `Proveedores` (`id_Proveedor`),
  ADD CONSTRAINT `orden_compra_ibfk_3` FOREIGN KEY (`Nomina`) REFERENCES `Empleados` (`Nomina`);

--
-- Constraints for table `Orden_Trabajo`
--
ALTER TABLE `Orden_Trabajo`
  ADD CONSTRAINT `orden_trabajo_ibfk_1` FOREIGN KEY (`Nomina`) REFERENCES `Empleados` (`Nomina`);

--
-- Constraints for table `Trabaja`
--
ALTER TABLE `Trabaja`
  ADD CONSTRAINT `trabaja_ibfk_1` FOREIGN KEY (`Nomina`) REFERENCES `Empleados` (`Nomina`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
