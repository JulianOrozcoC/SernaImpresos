-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 20, 2017 at 10:58 AM
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
  `Contrasena` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Empleados`
--

INSERT INTO `Empleados` (`Nomina`, `Nombre`, `Domicilio`, `Colonia`, `Ciudad`, `Telefono`, `Celular`, `Email`, `No_IMSS`, `RFC`, `CURP`, `Puesto`, `Fecha_Nacimiento`, `Fecha_Inicio`, `Salario_Hora`, `Salario_NOF`, `ISR`, `IMSS`, `Subsidio`, `Infonavit`, `Activo`, `Usuario`, `Contrasena`) VALUES
('A0101', 'Ana', '', '', '', '', '', '', 0, 0, '', 'Admin', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 'Si', 'ana', 'vQNtoQ9KcEZ1Mu/ahW4buUEordiI3qYCarI2K8Gw9yQ='),
('A1111', 'Edgar', '', '', '', '', '', '', 0, 0, '', 'Admin', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 'Si', 'ega', 'hYarNpNOsfBeGNH3ftT3zmt3k418rhLZE9ssIQx3aZ0='),
('S001', 'Edgar Jorge Serna Cavazos', 'James Cook 2937, Cumbres', 'Cumbres', 'Monterrey', '14255092', '8119104923', 'eserna_sisa@prodigy.net.mx', 0, 0, '', 'Admin', '1956-08-01', '0000-00-00', 0, 0, 0, 0, 0, 0, 'Si', 'eserna', 'fDoL6goWA+VkUklv/ioJ'),
('S1010', 'Alfredo', '', '', '', '', '', '', 0, 0, '', 'Admin', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 'Si', 'alfredo', '$2y$12$iMmj0W4F.tWcAPNscb6u8u99Yg9szHdFo78knJGZsWkDqWCQSg1zC'),
('S10299', 'July', '', '', '', '', '', '', 0, 0, '', 'Admin', '0000-00-00', '0000-00-00', 100, 0, 0, 0, 0, 0, 'Si', 'julyy', '5vG1UyTOq3xXnuh1Uj8G2YBNfSyeahAt1ncSfligJrA=');

-- --------------------------------------------------------

--
-- Table structure for table `Facturas`
--

CREATE TABLE `Facturas` (
  `id_Facturas` int(11) NOT NULL,
  `Factura` text NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Facturas`
--

INSERT INTO `Facturas` (`id_Facturas`, `Factura`, `Fecha`) VALUES
(1, 'Factura 123', '2017-04-19');

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
(3, 'gkhjgjkgh', '2017-04-13'),
(4, 'asdfg', '2017-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `Orden_Compra`
--

CREATE TABLE `Orden_Compra` (
  `id_OCompra` bigint(20) NOT NULL,
  `Nomina` varchar(20) NOT NULL,
  `Proveedor` text NOT NULL,
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
  `id_OCompra` bigint(11) NOT NULL,
  `Nomina` varchar(20) DEFAULT NULL,
  `Responsable` text,
  `Descripcion` longtext,
  `Aprobada` text
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

--
-- Dumping data for table `Proveedores`
--

INSERT INTO `Proveedores` (`id_Proveedor`, `Nombre`, `RFC`, `Domicilio`, `Telefono`, `Vendedor`, `Fax`) VALUES
(1, 'Julian Orozco', 'JOC1993', 'Cumbres', 83006858, 'Tablon', '81737212');

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
  `Horas_Trabajadas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Trabaja`
--

INSERT INTO `Trabaja` (`id_Trabaja`, `Nomina`, `Fecha`, `Hora_Entrada`, `Hora_Salida`, `Asistencia`, `Retraso`, `Horas_Trabajadas`) VALUES
(6, 'A0101', '2017-04-19', '08:00:00', '16:00:00', 'Si', 'No', 8),
(7, 'A0101', '2017-04-20', '09:00:00', '15:00:00', 'Si', 'No', 6),
(8, 'A0101', '2017-04-16', '08:30:00', '16:30:00', 'Si', 'No', 8);

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
-- Indexes for table `Facturas`
--
ALTER TABLE `Facturas`
  ADD PRIMARY KEY (`id_Facturas`);

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
  ADD KEY `Nomina` (`Nomina`);

--
-- Indexes for table `Orden_Trabajo`
--
ALTER TABLE `Orden_Trabajo`
  ADD PRIMARY KEY (`id_OTrabajo`),
  ADD UNIQUE KEY `id_OTrabajo` (`id_OTrabajo`),
  ADD KEY `Nomina` (`Nomina`),
  ADD KEY `id_OCompra` (`id_OCompra`);

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
-- AUTO_INCREMENT for table `Facturas`
--
ALTER TABLE `Facturas`
  MODIFY `id_Facturas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Mantenimiento`
--
ALTER TABLE `Mantenimiento`
  MODIFY `id_Mantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Orden_Compra`
--
ALTER TABLE `Orden_Compra`
  MODIFY `id_OCompra` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Orden_Trabajo`
--
ALTER TABLE `Orden_Trabajo`
  MODIFY `id_OTrabajo` double NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Proveedores`
--
ALTER TABLE `Proveedores`
  MODIFY `id_Proveedor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Trabaja`
--
ALTER TABLE `Trabaja`
  MODIFY `id_Trabaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Orden_Compra`
--
ALTER TABLE `Orden_Compra`
  ADD CONSTRAINT `orden_compra_ibfk_3` FOREIGN KEY (`Nomina`) REFERENCES `Empleados` (`Nomina`);

--
-- Constraints for table `Orden_Trabajo`
--
ALTER TABLE `Orden_Trabajo`
  ADD CONSTRAINT `orden_trabajo_ibfk_1` FOREIGN KEY (`Nomina`) REFERENCES `Empleados` (`Nomina`),
  ADD CONSTRAINT `orden_trabajo_ibfk_2` FOREIGN KEY (`id_OCompra`) REFERENCES `Orden_Compra` (`id_OCompra`);

--
-- Constraints for table `Trabaja`
--
ALTER TABLE `Trabaja`
  ADD CONSTRAINT `trabaja_ibfk_1` FOREIGN KEY (`Nomina`) REFERENCES `Empleados` (`Nomina`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
