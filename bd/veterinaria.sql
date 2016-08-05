-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-12-2014 a las 18:20:01
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta`
--

CREATE TABLE IF NOT EXISTS `boleta` (
  `nro_boleta` char(5) NOT NULL,
  `fecha_emicion` date DEFAULT NULL,
  `total` decimal(19,2) DEFAULT NULL,
  `id_veterinario` char(8) NOT NULL,
  `id_propie` varchar(4) NOT NULL,
  PRIMARY KEY (`nro_boleta`),
  KEY `R_9` (`id_veterinario`),
  KEY `R_10` (`id_propie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boleta`
--

INSERT INTO `boleta` (`nro_boleta`, `fecha_emicion`, `total`, `id_veterinario`, `id_propie`) VALUES
('B0001', '2014-10-02', '15.00', '45153340', 'P001'),
('B0002', '2014-10-02', '15.45', '45153340', 'P006'),
('B0003', '2014-10-02', '17.45', '45153340', 'P007'),
('B0004', '2014-10-03', '50.00', '45153340', 'P002'),
('B0005', '2014-10-04', '30.90', '45153340', 'P007'),
('B0006', '2014-10-03', '17.45', '45153340', 'P007'),
('B0007', '2014-10-04', '30.90', '45153340', 'P004');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE IF NOT EXISTS `consulta` (
  `cod_consulta` varchar(6) NOT NULL,
  `fecha_consul` date DEFAULT NULL,
  `diagnostico` varchar(40) DEFAULT NULL,
  `tratamiento` varchar(40) DEFAULT NULL,
  `fecha_prox_consul` date DEFAULT NULL,
  `cod_tipoconsul` varchar(5) NOT NULL,
  `codmascota` varchar(8) NOT NULL,
  `id_veterinario` char(8) NOT NULL,
  PRIMARY KEY (`cod_consulta`),
  KEY `R_3` (`cod_tipoconsul`),
  KEY `R_7` (`codmascota`),
  KEY `R_8` (`id_veterinario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`cod_consulta`, `fecha_consul`, `diagnostico`, `tratamiento`, `fecha_prox_consul`, `cod_tipoconsul`, `codmascota`, `id_veterinario`) VALUES
('C00001', '2014-10-02', 'paracito interno', NULL, '2014-10-13', 'T0004', 'M0002', '45153340'),
('C00002', '2014-10-02', 'fractura leve', 'vendaje', '2014-10-21', 'T0001', 'M0003', '45153340'),
('C00003', '2014-10-02', 'intoxicacion', 'labado gastrico', '2014-10-12', 'T0002', 'M0001', '45153340'),
('C00004', '2014-10-03', 'enfermedad al ojo', 'gotas cada mañana', '2014-10-30', 'T0003', 'M0005', '78965230'),
('C00005', '2014-10-03', 'fractura leve', 'vendaje', '2014-10-30', 'T0001', 'M0003', '98256314');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_boleta`
--

CREATE TABLE IF NOT EXISTS `detalle_boleta` (
  `cantidad` int(11) DEFAULT NULL,
  `sub_total` decimal(19,2) DEFAULT NULL,
  `cod_medica` varchar(10) NOT NULL,
  `nro_boleta` char(5) NOT NULL,
  PRIMARY KEY (`cod_medica`,`nro_boleta`),
  KEY `R_12` (`nro_boleta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_boleta`
--

INSERT INTO `detalle_boleta` (`cantidad`, `sub_total`, `cod_medica`, `nro_boleta`) VALUES
(5, '15.00', 'P0001', 'B0001'),
(10, '50.00', 'P0002', 'B0004'),
(6, '15.00', 'P0006', 'B0002'),
(8, '12.00', 'P0007', 'B0003'),
(10, '25.00', 'P0007', 'B0005'),
(12, '30.00', 'P0007', 'B0006'),
(12, '30.00', 'P0007', 'B0007');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE IF NOT EXISTS `mascota` (
  `codmascota` varchar(8) NOT NULL,
  `nombremasco` varchar(50) DEFAULT NULL,
  `generomasco` char(1) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `fecha_naci` date DEFAULT NULL,
  `tamanio` decimal(19,2) DEFAULT NULL,
  `peso` decimal(19,2) DEFAULT NULL,
  `edad` varchar(30) DEFAULT NULL,
  `observaciones` varchar(40) DEFAULT NULL,
  `cod_tipomascota` int(11) NOT NULL,
  `id_propie` varchar(4) NOT NULL,
  PRIMARY KEY (`codmascota`),
  KEY `R_1` (`cod_tipomascota`),
  KEY `R_2` (`id_propie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`codmascota`, `nombremasco`, `generomasco`, `color`, `fecha_naci`, `tamanio`, `peso`, `edad`, `observaciones`, `cod_tipomascota`, `id_propie`) VALUES
('M0001', 'Arnol', 'M', 'Marron', '2013-07-03', '45.00', '14.50', '1 anio', 'requiere tratamiento', 101, 'P001'),
('M0002', 'Minina', 'E', 'negro', '2012-12-15', '0.00', '2.50', '2 anios', 'gordito y limpio', 100, 'P008'),
('M0003', 'Fiera', 'E', 'blanco', '2014-01-15', '4.00', '3.00', '10 meses', 'de color blanco', 100, 'P001'),
('M0004', 'Brandol', 'M', 'Marron oscuro', '2010-05-15', '4.00', '12.00', '4 anios', 'Perro jugueton', 100, 'P001'),
('M0005', 'Escubidu', 'M', 'negro', '2014-04-15', '1.00', '3.00', '8 meses', 'asco', 100, 'P001'),
('M0006', 'donald', 'M', 'marron', '2013-12-10', '1.00', '4.00', 'i aÃ±o', 'bueno', 108, 'P005');

--
-- Disparadores `mascota`
--
DROP TRIGGER IF EXISTS `tr_delete_mascota`;
DELIMITER //
CREATE TRIGGER `tr_delete_mascota` BEFORE DELETE ON `mascota`
 FOR EACH ROW begin
insert into seguridad_mascota values (old.codmascota, old.nombremasco, old.generomasco, old.color, old.fecha_naci, old.tamanio, old.peso, old.edad, old.observaciones, old.cod_tipomascota, old.id_propie, curdate(), current_time(),'Eliminado');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_insert_mascota`;
DELIMITER //
CREATE TRIGGER `tr_insert_mascota` BEFORE INSERT ON `mascota`
 FOR EACH ROW begin
insert into seguridad_mascota values (new.codmascota, new.nombremasco, new.generomasco, new.color, new.fecha_naci, new.tamanio, new.peso, new.edad, new.observaciones, new.cod_tipomascota, new.id_propie, curdate(), current_time(),'Agregado');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_update_mascota`;
DELIMITER //
CREATE TRIGGER `tr_update_mascota` BEFORE UPDATE ON `mascota`
 FOR EACH ROW begin
insert into seguridad_mascota values (new.codmascota, new.nombremasco, new.generomasco, new.color, new.fecha_naci, new.tamanio, new.peso, new.edad, new.observaciones, new.cod_tipomascota, new.id_propie, curdate(), current_time(),'Modificado');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota_medicamento`
--

CREATE TABLE IF NOT EXISTS `mascota_medicamento` (
  `codmascota` varchar(8) NOT NULL,
  `cod_medica` varchar(10) NOT NULL,
  `cantidad_utilizada` varchar(40) DEFAULT NULL,
  `costo` decimal(19,2) DEFAULT NULL,
  PRIMARY KEY (`codmascota`,`cod_medica`),
  KEY `R_6` (`cod_medica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mascota_medicamento`
--

INSERT INTO `mascota_medicamento` (`codmascota`, `cod_medica`, `cantidad_utilizada`, `costo`) VALUES
('M0001', 'P0001', NULL, '13.00'),
('M0002', 'P0002', '5 ml', '5.50'),
('M0003', 'P0007', NULL, '4.60'),
('M0004', 'P0006', NULL, '4.20'),
('M0005', 'P0004', '3ml', '0.80');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE IF NOT EXISTS `medicamento` (
  `cod_medica` varchar(10) NOT NULL,
  `nombre_medica` varchar(30) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `precio_uni` decimal(19,2) DEFAULT NULL,
  `dosis_normal` varchar(40) DEFAULT NULL,
  `dosis_maximo` varchar(40) DEFAULT NULL,
  `detalle` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`cod_medica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`cod_medica`, `nombre_medica`, `fecha_vencimiento`, `stok`, `precio_uni`, `dosis_normal`, `dosis_maximo`, `detalle`) VALUES
('P0001', 'Acepromacina', '2017-10-14', 78, '3.00', NULL, NULL, 'se utiliza como sedante'),
('P0002', 'acetaminofeno', '2018-02-14', 50, '5.00', '2 ml', NULL, 'es usado en perros para aliviar el dolor y reducir'),
('P0003', 'acetato de megestrol', '2018-02-11', 40, '6.00', 'uso normal', NULL, 'se usa para posponer el estro y aliviar el falso e'),
('P0004', 'Acetazolamida', '2018-05-11', 14, '4.00', 'si', NULL, 'se usa para calmar los dolores de ojo en perros'),
('P0005', 'Ampicilina', '2017-10-20', 12, '1.00', NULL, NULL, 'Es eficaz frente a una serie de infecciones causad'),
('P0006', 'Besilato de Amlodipino', '2018-05-11', 45, '2.50', NULL, NULL, 'disminui la presión arterial en perros con enferme'),
('P0007', 'Carprofeno', '2018-05-11', 10, '2.50', NULL, NULL, 'Sirve para aliviar el dolor y la inflamación en pe'),
('P0008', 'Cloruro de betanecol', '2018-05-11', 40, '15.00', '2 ml al dia', NULL, 'Se utiliza cuando los animales no pueden orinar'),
('P0009', 'Sintomisetina', '2018-05-11', 40, '12.00', '2 ml al dia', NULL, 'Antibiotico para caninos y felinos'),
('P0010', 'Scalibor', '2017-10-14', 40, '12.00', 'uso normal', NULL, 'antiparacitario uso externo'),
('P0011', 'Horse Power 1kg', '2017-10-14', 15, '120.00', 'uso normal', '3 g', 'se usa  para el crecimiento y nutriente en los caballos'),
('P0012', 'Darbazin pasta 4 gr', '2018-02-11', 14, '110.00', 'uso normal', '1', 'Antiparacitario oral, ayuda al control y tratamiento de los paracitos'),
('P0013', 'Bursol 50 ml', '2018-02-11', 10, '140.00', '1', '2', 'Se usa en tratamietos anti inflamatorios musculares y articulares en c');

--
-- Disparadores `medicamento`
--
DROP TRIGGER IF EXISTS `tr_delete_medicamento`;
DELIMITER //
CREATE TRIGGER `tr_delete_medicamento` BEFORE DELETE ON `medicamento`
 FOR EACH ROW begin
insert into seguridadmedi values (old.cod_medica, old.nombre_medica, old.fecha_vencimiento, old.stok, old.precio_uni, old.dosis_normal, old.dosis_maximo, old.detalle, curdate(), current_time(),'Eliminado');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_insert_medicamento`;
DELIMITER //
CREATE TRIGGER `tr_insert_medicamento` BEFORE INSERT ON `medicamento`
 FOR EACH ROW begin
insert into seguridadmedi values (new.cod_medica, new.nombre_medica, new.fecha_vencimiento, new.stok, new.precio_uni, new.dosis_normal, new.dosis_maximo, new.detalle, curdate(), current_time(),'Insertado');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_update_medicamento`;
DELIMITER //
CREATE TRIGGER `tr_update_medicamento` BEFORE UPDATE ON `medicamento`
 FOR EACH ROW begin
insert into seguridadmedi values (new.cod_medica, new.nombre_medica, new.fecha_vencimiento, new.stok, new.precio_uni, new.dosis_normal, new.dosis_maximo, new.detalle, curdate(), current_time(),'Modificado');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE IF NOT EXISTS `propietario` (
  `id_propie` varchar(4) NOT NULL,
  `nombrepropie` varchar(50) DEFAULT NULL,
  `apellidospropie` varchar(50) DEFAULT NULL,
  `direccionpropie` varchar(50) DEFAULT NULL,
  `dni_propie` char(8) DEFAULT NULL,
  `genero_propie` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_propie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id_propie`, `nombrepropie`, `apellidospropie`, `direccionpropie`, `dni_propie`, `genero_propie`) VALUES
('P001', 'Carla', 'Gusman Campos', 'Av. los sauces', '58963214', 'F'),
('P002', 'Luisa', 'Cardenas Ccocca', 'Av. Paseo la republica', '21547803', 'F'),
('P003', 'Daniel', 'Mondalgo Inca', 'pacucha', '12457896', 'M'),
('P004', 'Fredi', 'Caseres Gomes', 'Av. campo fe', '45789632', 'M'),
('P005', 'Mateo', 'Chaves Duran', 'San Jeronimo', '45213695', 'M'),
('P006', 'Flor Maria', 'Tejada Huamn', 'pacucha', '78451023', 'F'),
('P007', 'Nayza', 'Paloino Gusman', 'Andarapa', '45879632', 'F'),
('P008', 'Delia', 'Human Quispe', 'pacucha', '10236512', 'F');

--
-- Disparadores `propietario`
--
DROP TRIGGER IF EXISTS `tr_delete_propietario`;
DELIMITER //
CREATE TRIGGER `tr_delete_propietario` BEFORE DELETE ON `propietario`
 FOR EACH ROW begin
insert into seguridadpro values (old.id_propie, old.nombrepropie, old.apellidospropie, old.direccionpropie, old.dni_propie, old.genero_propie, curdate(), current_time(),'Eliminado');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_insert_propietario`;
DELIMITER //
CREATE TRIGGER `tr_insert_propietario` BEFORE INSERT ON `propietario`
 FOR EACH ROW begin
insert into seguridadpro values (new.id_propie, new.nombrepropie, new.apellidospropie, new.direccionpropie, new.dni_propie, new.genero_propie, curdate(), current_time(),'Incertado');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_update_propietario`;
DELIMITER //
CREATE TRIGGER `tr_update_propietario` BEFORE UPDATE ON `propietario`
 FOR EACH ROW begin
insert into seguridadpro values (new.id_propie, new.nombrepropie, new.apellidospropie, new.direccionpropie, new.dni_propie, new.genero_propie, curdate(), current_time(),'Modificado');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridadcons`
--

CREATE TABLE IF NOT EXISTS `seguridadcons` (
  `codtipoc` varchar(5) NOT NULL,
  `nomtipoc` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguridadcons`
--

INSERT INTO `seguridadcons` (`codtipoc`, `nomtipoc`, `fecha`, `hora`, `estado`) VALUES
('T0005', 'gdgege', '2014-12-10', '10:42:00', 'Insertado'),
('T0005', 'gdgegeer', '2014-12-10', '10:42:09', 'Modificado'),
('T0005', 'gdgegeer', '2014-12-10', '10:42:11', 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridadmedi`
--

CREATE TABLE IF NOT EXISTS `seguridadmedi` (
  `codme` varchar(10) NOT NULL,
  `nomme` varchar(30) NOT NULL,
  `fechave` date NOT NULL,
  `stoks` int(11) NOT NULL,
  `preuni` decimal(10,0) NOT NULL,
  `dosnor` varchar(40) NOT NULL,
  `dosmax` varchar(40) NOT NULL,
  `detalle` varchar(70) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguridadmedi`
--

INSERT INTO `seguridadmedi` (`codme`, `nomme`, `fechave`, `stoks`, `preuni`, `dosnor`, `dosmax`, `detalle`, `fecha`, `hora`, `estado`) VALUES
('der', '', '0000-00-00', 0, '0', '45', 'ret43', 'dfregfd', '2014-12-10', '09:55:24', 'Insertado'),
('der', 'der', '0000-00-00', 0, '0', '45', 'ret43', 'dfregfd', '2014-12-10', '09:55:57', 'Modificado'),
('der', 'der', '0000-00-00', 0, '0', '45', 'ret43', 'dfregfd', '2014-12-10', '09:56:01', 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridadpro`
--

CREATE TABLE IF NOT EXISTS `seguridadpro` (
  `idpro` varchar(4) NOT NULL,
  `nompro` varchar(50) NOT NULL,
  `apepro` varchar(50) NOT NULL,
  `dirpro` varchar(50) NOT NULL,
  `dnipro` char(8) NOT NULL,
  `gempro` char(1) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguridadpro`
--

INSERT INTO `seguridadpro` (`idpro`, `nompro`, `apepro`, `dirpro`, `dnipro`, `gempro`, `fecha`, `hora`, `estado`) VALUES
('dfed', 'er4', '', '', '', 'F', '2014-12-10', '09:32:19', 'Incertado'),
('dfed', 'er4', 'gfr', 're', '1245', 'F', '2014-12-10', '09:34:23', 'Modificado'),
('dfed', 'er4', 'gfr', 're', '1245', 'F', '2014-12-10', '09:34:26', 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridadtmas`
--

CREATE TABLE IF NOT EXISTS `seguridadtmas` (
  `codtipom` int(11) NOT NULL,
  `nomtpom` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguridadtmas`
--

INSERT INTO `seguridadtmas` (`codtipom`, `nomtpom`, `fecha`, `hora`, `estado`) VALUES
(110, 'peses', '2014-12-10', '10:29:25', 'Insertado'),
(110, 'peses', '2014-12-10', '10:29:27', 'Eliminado'),
(109, 'Conejo', '2014-12-10', '10:31:38', 'Modificado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridadusu`
--

CREATE TABLE IF NOT EXISTS `seguridadusu` (
  `idusu` char(5) NOT NULL,
  `numusu` varchar(20) NOT NULL,
  `apeusu` varchar(20) NOT NULL,
  `dirusu` varchar(30) NOT NULL,
  `telusu` varchar(9) NOT NULL,
  `tipusu` varchar(10) NOT NULL,
  `claves` varchar(10) NOT NULL,
  `usuarios` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguridadusu`
--

INSERT INTO `seguridadusu` (`idusu`, `numusu`, `apeusu`, `dirusu`, `telusu`, `tipusu`, `claves`, `usuarios`, `fecha`, `hora`, `estado`) VALUES
('U0002', 'Juan', 'Mendez Junco', 'Pacucha', '78965426', 'Gerente', '321', 'juan', '2014-12-10', '11:10:49', 'Insertado'),
('U0002', 'Juan', 'Mendez Junco', 'Pacucha', '78965426', 'Gerente', '321', 'juanm', '2014-12-10', '11:11:09', 'Modificado'),
('U0003', 'dfsd', 'fwe', '', '', 'Vendedor', '', '', '2014-12-10', '11:12:14', 'Insertado'),
('U0003', 'dfsd', 'fwe', '', '', 'Vendedor', '', '', '2014-12-10', '11:12:16', 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridadve`
--

CREATE TABLE IF NOT EXISTS `seguridadve` (
  `idveteri` char(8) NOT NULL,
  `nomveteri` varchar(50) NOT NULL,
  `apeveteri` varchar(50) NOT NULL,
  `dirveteri` varchar(50) NOT NULL,
  `telveteri` varchar(9) NOT NULL,
  `genveteri` char(1) NOT NULL,
  `corveteri` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguridadve`
--

INSERT INTO `seguridadve` (`idveteri`, `nomveteri`, `apeveteri`, `dirveteri`, `telveteri`, `genveteri`, `corveteri`, `fecha`, `hora`, `estado`) VALUES
('54789654', '', '', '', '', 'F', '', '2014-12-10', '10:14:21', 'Insertado'),
('54789654', '', '', '', '', 'F', 'fwser', '2014-12-10', '10:14:29', 'Modificado'),
('54789654', '', '', '', '', 'F', 'fwser', '2014-12-10', '10:14:31', 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguridad_mascota`
--

CREATE TABLE IF NOT EXISTS `seguridad_mascota` (
  `codmascota_s` varchar(8) NOT NULL,
  `nombremascota_s` varchar(50) DEFAULT NULL,
  `generomascota_s` char(1) DEFAULT NULL,
  `color_s` varchar(20) DEFAULT NULL,
  `fecha_naci` date DEFAULT NULL,
  `tamanio_s` decimal(19,2) DEFAULT NULL,
  `peso_s` decimal(19,2) DEFAULT NULL,
  `edad_s` varchar(30) DEFAULT NULL,
  `observaciones_s` varchar(40) DEFAULT NULL,
  `cod_tipomascota_s` int(11) NOT NULL,
  `id_propie_s` varchar(4) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `elimihar` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguridad_mascota`
--

INSERT INTO `seguridad_mascota` (`codmascota_s`, `nombremascota_s`, `generomascota_s`, `color_s`, `fecha_naci`, `tamanio_s`, `peso_s`, `edad_s`, `observaciones_s`, `cod_tipomascota_s`, `id_propie_s`, `fecha`, `hora`, `elimihar`) VALUES
('M0005', 'Escubidu', 'M', 'negro', '2014-04-15', '1.00', '3.00', '8 meses', 'asco', 100, 'P001', '2014-12-09', '23:16:10', 'Modificado'),
('M0006', 'donald', 'M', 'marron', '2013-12-10', '0.00', '0.00', 'i aÃ±o', 'bueno', 108, 'P007', '2014-12-10', '07:44:50', 'Agregado'),
('M0006', 'donald', 'M', 'marron', '2013-12-10', '1.00', '4.00', 'i aÃ±o', 'bueno', 100, 'P001', '2014-12-10', '09:07:38', 'Modificado'),
('M0006', 'donald', 'M', 'marron', '2013-12-10', '1.00', '4.00', 'i aÃ±o', 'bueno', 108, 'P001', '2014-12-10', '09:07:54', 'Modificado'),
('M0006', 'donald', 'M', 'marron', '2013-12-10', '1.00', '4.00', 'i aÃ±o', 'bueno', 108, 'P005', '2014-12-10', '09:08:18', 'Modificado'),
('sdew', 'ewr', '', '', '2014-12-10', '0.00', '0.00', '', '', 100, 'P001', '2014-12-10', '09:15:12', 'Agregado'),
('sdew', 'ewr', '', '', '2014-12-10', '0.00', '0.00', '', '', 100, 'P001', '2014-12-10', '09:19:11', 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_consulta`
--

CREATE TABLE IF NOT EXISTS `tipo_consulta` (
  `cod_tipoconsul` varchar(5) NOT NULL,
  `nom_tipoconsul` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cod_tipoconsul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_consulta`
--

INSERT INTO `tipo_consulta` (`cod_tipoconsul`, `nom_tipoconsul`) VALUES
('T0001', 'Fractura de pierna'),
('T0002', 'intoxicacion'),
('T0003', 'Enfermedad al ojos'),
('T0004', 'Parasito intestinales');

--
-- Disparadores `tipo_consulta`
--
DROP TRIGGER IF EXISTS `tr_delete_tipo_consulta`;
DELIMITER //
CREATE TRIGGER `tr_delete_tipo_consulta` BEFORE DELETE ON `tipo_consulta`
 FOR EACH ROW begin
insert into seguridadcons values (old.cod_tipoconsul, old.nom_tipoconsul, curdate(), current_time(),'Eliminado');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_insert_tipo_consulta`;
DELIMITER //
CREATE TRIGGER `tr_insert_tipo_consulta` BEFORE INSERT ON `tipo_consulta`
 FOR EACH ROW begin
insert into seguridadcons values (new.cod_tipoconsul, new.nom_tipoconsul, curdate(), current_time(),'Insertado');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_update_tipo_consulta`;
DELIMITER //
CREATE TRIGGER `tr_update_tipo_consulta` BEFORE UPDATE ON `tipo_consulta`
 FOR EACH ROW begin
insert into seguridadcons values (new.cod_tipoconsul, new.nom_tipoconsul, curdate(), current_time(),'Modificado');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mascota`
--

CREATE TABLE IF NOT EXISTS `tipo_mascota` (
  `cod_tipomascota` int(11) NOT NULL,
  `nom_tipomascota` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cod_tipomascota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_mascota`
--

INSERT INTO `tipo_mascota` (`cod_tipomascota`, `nom_tipomascota`) VALUES
(100, 'Gato'),
(101, 'Perro'),
(102, 'Ave'),
(103, 'Reptil'),
(104, 'Caballo'),
(105, 'Vaca'),
(106, 'Cerdo'),
(107, 'Oveja'),
(108, 'Pato'),
(109, 'Conejo');

--
-- Disparadores `tipo_mascota`
--
DROP TRIGGER IF EXISTS `tr_delete_tipo_mascota`;
DELIMITER //
CREATE TRIGGER `tr_delete_tipo_mascota` BEFORE DELETE ON `tipo_mascota`
 FOR EACH ROW begin
insert into seguridadtmas values (old.cod_tipomascota, old.nom_tipomascota, curdate(), current_time(),'Eliminado');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_insert_tipo_mascota`;
DELIMITER //
CREATE TRIGGER `tr_insert_tipo_mascota` BEFORE INSERT ON `tipo_mascota`
 FOR EACH ROW begin
insert into seguridadtmas values (new.cod_tipomascota, new.nom_tipomascota, curdate(), current_time(),'Insertado');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_update_tipo_mascota`;
DELIMITER //
CREATE TRIGGER `tr_update_tipo_mascota` BEFORE UPDATE ON `tipo_mascota`
 FOR EACH ROW begin
insert into seguridadtmas values (new.cod_tipomascota, new.nom_tipomascota, curdate(), current_time(),'Modificado');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idusuario` char(5) NOT NULL,
  `nom_usu` varchar(20) NOT NULL,
  `ape_usu` varchar(20) NOT NULL,
  `dir_usu` varchar(30) NOT NULL,
  `tel_usu` varchar(9) NOT NULL,
  `tipousu` varchar(10) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nom_usu`, `ape_usu`, `dir_usu`, `tel_usu`, `tipousu`, `clave`, `usuario`) VALUES
('U0001', 'Miguel', 'Carrasco L', 'Av. los sauces', '254789634', 'gerente', '123', 'miguel'),
('U0002', 'Juan', 'Mendez Junco', 'Pacucha', '78965426', 'Gerente', '321', 'juanm');

--
-- Disparadores `usuarios`
--
DROP TRIGGER IF EXISTS `tr_delete_usuarios`;
DELIMITER //
CREATE TRIGGER `tr_delete_usuarios` BEFORE DELETE ON `usuarios`
 FOR EACH ROW begin
insert into seguridadusu values (old.idusuario, old.nom_usu, old.ape_usu, old.dir_usu, old.tel_usu, old.tipousu, old.clave, old.usuario, curdate(), current_time(),'Eliminado');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_insert_usuarios`;
DELIMITER //
CREATE TRIGGER `tr_insert_usuarios` BEFORE INSERT ON `usuarios`
 FOR EACH ROW begin
insert into seguridadusu values (new.idusuario, new.nom_usu, new.ape_usu, new.dir_usu, new.tel_usu, new.tipousu, new.clave, new.usuario, curdate(), current_time(),'Insertado');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_update_usuarios`;
DELIMITER //
CREATE TRIGGER `tr_update_usuarios` BEFORE UPDATE ON `usuarios`
 FOR EACH ROW begin
insert into seguridadusu values (new.idusuario, new.nom_usu, new.ape_usu, new.dir_usu, new.tel_usu, new.tipousu, new.clave, new.usuario, curdate(), current_time(),'Modificado');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veterinario`
--

CREATE TABLE IF NOT EXISTS `veterinario` (
  `id_veterinario` char(8) NOT NULL,
  `nom_veterinario` varchar(50) DEFAULT NULL,
  `apes_veterinario` varchar(50) DEFAULT NULL,
  `dir_veterinario` varchar(50) DEFAULT NULL,
  `tel_veterinario` varchar(9) DEFAULT NULL,
  `genero_veterinario` char(1) DEFAULT NULL,
  `correo_veterinario` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_veterinario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `veterinario`
--

INSERT INTO `veterinario` (`id_veterinario`, `nom_veterinario`, `apes_veterinario`, `dir_veterinario`, `tel_veterinario`, `genero_veterinario`, `correo_veterinario`) VALUES
('45153340', 'Luis Angel', 'Peralta Zamanes', 'Andahuaylas', '789445685', 'M', 'luisperaza@gmail.com'),
('78965230', 'Adriana', 'Garcia Perez', 'Andahuaylas', '478449764', 'F', 'adrianagpcli@gmail.com'),
('98256314', 'Fernanda', 'Caseres Ramiras', 'Andahuaylas', '589663245', 'F', 'fernandito@gmail.com');

--
-- Disparadores `veterinario`
--
DROP TRIGGER IF EXISTS `tr_delete_veterinario`;
DELIMITER //
CREATE TRIGGER `tr_delete_veterinario` BEFORE DELETE ON `veterinario`
 FOR EACH ROW begin
insert into seguridadve values (old.id_veterinario, old.nom_veterinario, old.apes_veterinario, old.dir_veterinario, old.tel_veterinario, old.genero_veterinario, old.correo_veterinario, curdate(), current_time(),'Eliminado');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_insert_veterinario`;
DELIMITER //
CREATE TRIGGER `tr_insert_veterinario` BEFORE INSERT ON `veterinario`
 FOR EACH ROW begin
insert into seguridadve values (new.id_veterinario, new.nom_veterinario, new.apes_veterinario, new.dir_veterinario, new.tel_veterinario, new.genero_veterinario, new.correo_veterinario, curdate(), current_time(),'Insertado');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `tr_update_veterinario`;
DELIMITER //
CREATE TRIGGER `tr_update_veterinario` BEFORE UPDATE ON `veterinario`
 FOR EACH ROW begin
insert into seguridadve values (new.id_veterinario, new.nom_veterinario, new.apes_veterinario, new.dir_veterinario, new.tel_veterinario, new.genero_veterinario, new.correo_veterinario, curdate(), current_time(),'Modificado');
end
//
DELIMITER ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD CONSTRAINT `boleta_ibfk_1` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id_veterinario`),
  ADD CONSTRAINT `boleta_ibfk_2` FOREIGN KEY (`id_propie`) REFERENCES `propietario` (`id_propie`);

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`cod_tipoconsul`) REFERENCES `tipo_consulta` (`cod_tipoconsul`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`codmascota`) REFERENCES `mascota` (`codmascota`),
  ADD CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`id_veterinario`) REFERENCES `veterinario` (`id_veterinario`);

--
-- Filtros para la tabla `detalle_boleta`
--
ALTER TABLE `detalle_boleta`
  ADD CONSTRAINT `detalle_boleta_ibfk_1` FOREIGN KEY (`cod_medica`) REFERENCES `medicamento` (`cod_medica`),
  ADD CONSTRAINT `detalle_boleta_ibfk_2` FOREIGN KEY (`nro_boleta`) REFERENCES `boleta` (`nro_boleta`);

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`cod_tipomascota`) REFERENCES `tipo_mascota` (`cod_tipomascota`),
  ADD CONSTRAINT `mascota_ibfk_2` FOREIGN KEY (`id_propie`) REFERENCES `propietario` (`id_propie`);

--
-- Filtros para la tabla `mascota_medicamento`
--
ALTER TABLE `mascota_medicamento`
  ADD CONSTRAINT `mascota_medicamento_ibfk_1` FOREIGN KEY (`codmascota`) REFERENCES `mascota` (`codmascota`),
  ADD CONSTRAINT `mascota_medicamento_ibfk_2` FOREIGN KEY (`cod_medica`) REFERENCES `medicamento` (`cod_medica`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
