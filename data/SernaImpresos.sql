-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2017 at 08:32 AM
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
(8, 'Admin', 'Test test'),
(9, 'Admin', 'Test 123'),
(10, 'Admin', 'ana ');

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
('M1000', 'Martin', '', '', '', '', '', '', 0, 0, '', 'Admin', '0000-00-00', '0000-00-00', 0, 0, 0, 0, 0, 0, 'Si', 'martin', 'iptaZ+EsignCM3omQ6LKwxlJIzfAj6EivCPIyESRrsI='),
('S001', 'Edgar Jorge Serna Cavazos', 'James Cook #2937', 'Cumbres', 'Monterrey', '14255092', '8110194923', 'eserna_sisa@prodigy.net.mx', 0, 0, '', 'Admin', '1956-08-01', '2000-01-01', 0, 0, 0, 0, 0, 0, 'Si', 'eserna', 'cqGvH65NEX9ZBtvcQlu6McWzo21h53jNN5UdbUeEbeU='),
('S002', 'Julian Orozco', '', '', '', '', '', '', 0, 0, '', 'Empleado', '0000-00-00', '0000-00-00', 450, 0, 50, 80, 90, 10, 'Si', 'july', 'bL7PwH7AEFeiz/yCc/oJQ/Hkirz/bhs6Q0Axp+tJFm8='),
('S0101010', 'Ana ', '', '', '', '', '', '', 0, 0, '', 'Admin', '0000-00-00', '0000-00-00', 500, 400, 40, 80, 30, 5, 'Si', 'anas', 'OELPGy3zZOpiWOZLf5rsC8yUILc+oppwU6govT0aLE8=');

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
(1, 'Factura 123', '2017-04-19'),
(2, 'Jesus', '2017-04-27');

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
(1, 'MAquina 123', '2017-04-29');

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

--
-- Dumping data for table `Orden_Compra`
--

INSERT INTO `Orden_Compra` (`id_OCompra`, `Nomina`, `Proveedor`, `Fecha`, `Cantidad`, `Unidad_Medida`, `Descripcion`, `Precio_Unitario`, `Total`, `Aprobada`) VALUES
(1, 'S001', 'ToÃ±o Esquinca', '2017-04-21', 50, '5', 'TEST', 1200, 666, 'Aprobada'),
(2, 'M1000', 'ToÃ±o Esquinca', '2017-04-25', 1, '1', 'asda', 100, 1, 'Aprobada');

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
(2, 'ToÃ±o Esquinca', 'aem1045', 'muchedumbre', 83000001, 'Joaquin Lopez', '5423');

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
(9, 'S002', '2017-04-20', '08:00:00', '16:00:00', 'Si', 'No', 8),
(10, 'S002', '2017-04-21', '10:00:00', '17:00:00', 'Si', 'No', 7),
(11, 'S002', '2017-04-22', '09:00:00', '18:00:00', 'Si', 'No', 9),
(12, 'S002', '2017-04-24', '08:30:00', '16:30:00', 'Si', 'Si', 8),
(13, 'S002', '2017-05-18', '08:00:00', '15:30:00', 'Si', 'No', 7),
(14, 'S0101010', '2017-05-30', '08:30:00', '17:00:00', 'si', 'no', 9);

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
  MODIFY `id_Comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Facturas`
--
ALTER TABLE `Facturas`
  MODIFY `id_Facturas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Mantenimiento`
--
ALTER TABLE `Mantenimiento`
  MODIFY `id_Mantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `Orden_Compra`
--
ALTER TABLE `Orden_Compra`
  MODIFY `id_OCompra` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Orden_Trabajo`
--
ALTER TABLE `Orden_Trabajo`
  MODIFY `id_OTrabajo` double NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Proveedores`
--
ALTER TABLE `Proveedores`
  MODIFY `id_Proveedor` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Trabaja`
--
ALTER TABLE `Trabaja`
  MODIFY `id_Trabaja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
