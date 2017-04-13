-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2017 at 03:09 AM
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
  `Contrasena` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Empleados`
--

INSERT INTO `Empleados` (`Nomina`, `Nombre`, `Domicilio`, `Colonia`, `Ciudad`, `Telefono`, `Celular`, `Email`, `No_IMSS`, `RFC`, `CURP`, `Puesto`, `Fecha_Nacimiento`, `Fecha_Inicio`, `Salario_Hora`, `Salario_NOF`, `ISR`, `IMSS`, `Subsidio`, `Infonavit`, `Activo`, `Usuario`, `Contrasena`) VALUES
('S001', 'Edgar Jorge Serna Cavazos', 'James Cook 2937, Cumbres', 'Cumbres', 'Monterrey', '14255092', '8119104923', 'eserna_sisa@prodigy.net.mx', 0, 0, '', 'Admin', '1956-08-01', '0000-00-00', 0, 0, 0, 0, 0, 0, 'Si', 'eserna', 'fDoL6goWA+VkUklv/ioJ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Empleados`
--
ALTER TABLE `Empleados`
  ADD PRIMARY KEY (`Nomina`),
  ADD UNIQUE KEY `Nomina` (`Nomina`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
