-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for dcs
CREATE DATABASE IF NOT EXISTS `dcs` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dcs`;


-- Dumping structure for table dcs.adminformularios
DROP TABLE IF EXISTS `adminformularios`;
CREATE TABLE IF NOT EXISTS `adminformularios` (
  `form_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_formulario` varchar(255) DEFAULT NULL COMMENT '1 empresa, 2 usuario 3 vehiculos 0 otra',
  `form_campo` varchar(255) DEFAULT NULL,
  `form_nombre` varchar(255) DEFAULT NULL,
  `form_valor` int(2) DEFAULT '0' COMMENT '0 activo 1 inactivo 2 eliminado',
  `form_accion` int(2) DEFAULT '0' COMMENT '0 activo 1 inactivo 2 eliminado',
  `form_nombreForm` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.adminformularios: ~2 rows (approximately)
/*!40000 ALTER TABLE `adminformularios` DISABLE KEYS */;
INSERT INTO `adminformularios` (`form_id`, `form_formulario`, `form_campo`, `form_nombre`, `form_valor`, `form_accion`, `form_nombreForm`) VALUES
	(4, '0', 'OTRO', 'OTRO', 0, 0, 'OTRO'),
	(5, '1', ' Tipo de Empresa', 'pública', 1, 0, 'Empresa');
/*!40000 ALTER TABLE `adminformularios` ENABLE KEYS */;


-- Dumping structure for table dcs.aseguradoras
DROP TABLE IF EXISTS `aseguradoras`;
CREATE TABLE IF NOT EXISTS `aseguradoras` (
  `aseguradora_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono_fijo` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`aseguradora_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.aseguradoras: ~6 rows (approximately)
/*!40000 ALTER TABLE `aseguradoras` DISABLE KEYS */;
INSERT INTO `aseguradoras` (`aseguradora_id`, `nombre`, `tipo`, `estado`, `fecha_creacion`, `direccion`, `telefono_fijo`, `celular`, `email`, `activo`) VALUES
	(1, 'ya quedi ', 'EPS/IPS', 'Inactivo', NULL, 'sd', '44', '34', 'f@jj.com', 'N'),
	(2, NULL, 'Prepagada', NULL, NULL, 'CALL', '765432', '', '', 'N'),
	(3, NULL, 'Prepagada', NULL, NULL, 'da', '234', '234', '', 'N'),
	(4, '123', 'Red de ambulancias', 'Activo', NULL, '123', '123', '123', '', 'N'),
	(5, 'Medplus', 'Prepagada', 'Activo', NULL, 'calle 76 36 - 67', '67657689', '', 'ff@h.com', 'N'),
	(6, 'emermedica', 'Red de ambulancias', 'Activo', NULL, 'calle 03 A #45-67', '89078689', '320876789', 'servicioalcliente@emermedica.com.co', 'S');
/*!40000 ALTER TABLE `aseguradoras` ENABLE KEYS */;


-- Dumping structure for table dcs.cargo
DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_nombre` varchar(100) NOT NULL,
  `car_jefe` int(11) DEFAULT NULL,
  `car_porcentajearl` float(10,0) NOT NULL,
  `activo` varchar(50) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.cargo: ~2 rows (approximately)
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` (`car_id`, `car_nombre`, `car_jefe`, `car_porcentajearl`, `activo`) VALUES
	(40, 'visepresidencia', 0, 15, 'S'),
	(41, 'gerencia', 40, 10, 'S');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;


-- Dumping structure for table dcs.ciiu
DROP TABLE IF EXISTS `ciiu`;
CREATE TABLE IF NOT EXISTS `ciiu` (
  `ciiu_id` int(11) NOT NULL AUTO_INCREMENT,
  `ciiu_grupo` varchar(255) DEFAULT NULL,
  `ciiu_clase` varchar(255) DEFAULT NULL,
  `ciiu_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ciiu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=609 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.ciiu: ~608 rows (approximately)
/*!40000 ALTER TABLE `ciiu` DISABLE KEYS */;
INSERT INTO `ciiu` (`ciiu_id`, `ciiu_grupo`, `ciiu_clase`, `ciiu_description`) VALUES
	(1, '11', '', 'Cultivos agrícolas transitorios '),
	(2, '', '111', 'Cultivo de cereales (excepto arroz), legumbres y semillas oleaginosas '),
	(3, '', '112', 'Cultivo de arroz '),
	(4, '', '113', 'Cultivo de hortalizas, raíces y tubérculos '),
	(5, '', '114', 'Cultivo de tabaco '),
	(6, '', '115', 'Cultivo de plantas textiles '),
	(7, '', '119', 'Otros cultivos transitorios n.c.p.'),
	(8, '12', '', 'Cultivos agrícolas permanentes '),
	(9, '', '121', 'Cultivo de frutas tropicales y subtropicales'),
	(10, '', '122', 'Cultivo de plátano y banano'),
	(11, '', '123', 'Cultivo de café'),
	(12, '', '124', 'Cultivo de caña de azúcar'),
	(13, '', '125', 'Cultivo de flor de corte'),
	(14, '', '126', 'Cultivo de palma para aceite (palma africana) y otros frutos oleaginosos'),
	(15, '', '127', 'Cultivo de plantas con las que se preparan bebidas'),
	(16, '', '128', 'Cultivo de especias y de plantas aromáticas y medicinales '),
	(17, '', '129', 'Otros cultivos permanentes n.c.p.'),
	(18, '13', '130', 'Propagación de plantas (actividades de los viveros, excepto viveros forestales) '),
	(19, '14', '', 'Ganadería '),
	(20, '', '141', 'Cría de ganado bovino y bufalino'),
	(21, '', '142', 'Cría de caballos y otros equinos '),
	(22, '', '143', 'Cría de ovejas y cabras '),
	(23, '', '144', 'Cría de ganado porcino'),
	(24, '', '145', 'Cría de aves de corral'),
	(25, '', '149', 'Cría de otros animales n.c.p.'),
	(26, '15', '150', 'Explotación mixta (agrícola y pecuaria) '),
	(27, '16', '', 'Actividades de apoyo a la agricultura y la ganadería, y actividades posteriores a la cosecha '),
	(28, '', '161', 'Actividades de apoyo a la agricultura '),
	(29, '', '162', 'Actividades de apoyo a la ganadería'),
	(30, '', '163', 'Actividades posteriores a la cosecha '),
	(31, '', '164', 'Tratamiento de semillas para propagación '),
	(32, '17', '170', 'Caza ordinaria y mediante trampas y actividades de servicios conexas '),
	(33, '', '', 'Silvicultura y extracción de madera'),
	(34, '21', '210', 'Silvicultura y otras actividades forestales'),
	(35, '22', '220', 'Extracción de madera '),
	(36, '23', '230', 'Recolección de productos forestales diferentes a la madera'),
	(37, '24', '240', 'Servicios de apoyo a la silvicultura '),
	(38, '', '', 'Pesca y acuicultura'),
	(39, '31', '', 'Pesca '),
	(40, '', '311', 'Pesca marítima '),
	(41, '', '312', 'Pesca de agua dulce '),
	(42, '32', '', 'Acuicultura '),
	(43, '', '321', 'Acuicultura marítima '),
	(44, '', '322', 'Acuicultura de agua dulce'),
	(45, '51', '510', 'Extracción de hulla (carbón de piedra)'),
	(46, '52', '520', 'Extracción de carbón lignito'),
	(47, '61', '610', 'Extracción de petróleo crudo'),
	(48, '62', '620', 'Extracción de gas natural'),
	(49, '71', '710', 'Extracción de minerales de hierro'),
	(50, '72', '', 'Extracción de minerales metalíferos no ferrosos'),
	(51, '', '721', 'Extracción de minerales de uranio y de torio'),
	(52, '', '722', 'Extracción de oro y otros metales preciosos'),
	(53, '', '723', 'Extracción de minerales de níquel'),
	(54, '', '729', 'Extracción de otros minerales metalíferos no ferrosos n.c.p.'),
	(55, '81', '', 'Extracción de piedra, arena, arcillas, cal, yeso, caolín, bentonitas y similares'),
	(56, '', '811', 'Extracción de piedra, arena, arcillas comunes, yeso y anhidrita'),
	(57, '', '812', 'Extracción de arcillas de uso industrial, caliza, caolín y bentonitas'),
	(58, '82', '820', 'Extracción de esmeraldas, piedras preciosas y semipreciosas'),
	(59, '89', '', 'Extracción de otros minerales no metálicos n.c.p.'),
	(60, '', '891', 'Extracción de minerales para la fabricación de abonos y productos químicos'),
	(61, '', '892', 'Extracción de halita (sal)'),
	(62, '', '899', 'Extracción de otros minerales no metálicos n.c.p.'),
	(63, '91', '910', 'Actividades de apoyo para la extracción de petróleo y de gas natural'),
	(64, '99', '990', 'Actividades de apoyo para otras actividades de explotación de minas y canteras'),
	(65, '101', '', 'Procesamiento y conservación de carne, pescado, crustáceos y moluscos '),
	(66, '', '1011', 'Procesamiento y conservación de carne y productos cárnicos'),
	(67, '', '1012', 'Procesamiento y conservación de pescados, crustáceos y moluscos'),
	(68, '102', '1020', 'Procesamiento y conservación de frutas, legumbres, hortalizas y tubérculos'),
	(69, '103', '1030', 'Elaboración de aceites y grasas de origen vegetal y animal'),
	(70, '104', '1040', 'Elaboración de productos lácteos'),
	(71, '105', '', 'Elaboración de productos de molinería, almidones y productos derivados del almidón'),
	(72, '', '1051', 'Elaboración de productos de molinería'),
	(73, '', '1052', 'Elaboración de almidones y productos derivados del almidón'),
	(74, '106', '', 'Elaboración de productos de café'),
	(75, '', '1061', 'Trilla de café'),
	(76, '', '1062', 'Descafeinado, tostión y molienda del café'),
	(77, '', '1063', 'Otros derivados del café'),
	(78, '107', '', 'Elaboración de azúcar y panela'),
	(79, '', '1071', 'Elaboración y refinación de azúcar'),
	(80, '', '1072', 'Elaboración de panela'),
	(81, '108', '', 'Elaboración de otros productos alimenticios'),
	(82, '', '1081', 'Elaboración de productos de panadería'),
	(83, '', '1082', 'Elaboración de cacao, chocolate y productos de confitería'),
	(84, '', '1083', 'Elaboración de macarrones, fideos, alcuzcuz y productos farináceos similares'),
	(85, '', '1084', 'Elaboración de comidas y platos preparados'),
	(86, '', '1089', 'Elaboración de otros productos alimenticios n.c.p.'),
	(87, '109', '1090', 'Elaboración de alimentos preparados para animales'),
	(88, '110', '', 'Elaboración de bebidas'),
	(89, '', '1101', 'Destilación, rectificación y mezcla de bebidas alcohólicas'),
	(90, '', '1102', 'Elaboración de bebidas fermentadas no destiladas'),
	(91, '', '1103', 'Producción de malta, elaboración de cervezas y otras bebidas malteadas'),
	(92, '', '1104', 'Elaboración de bebidas no alcohólicas, producción de aguas minerales y de otras aguas embotelladas'),
	(93, '120', '1200', 'Elaboración de productos de tabaco'),
	(94, '131', '', 'Preparación, hilatura, tejeduría y acabado de productos textiles'),
	(95, '', '1311', 'Preparación e hilatura de fibras textiles'),
	(96, '', '1312', 'Tejeduría de productos textiles'),
	(97, '', '1313', 'Acabado de productos textiles'),
	(98, '139', '', 'Fabricación de otros productos textiles'),
	(99, '', '1391', 'Fabricación de tejidos de punto y ganchillo'),
	(100, '', '1392', 'Confección de artículos con materiales textiles, excepto prendas de vestir'),
	(101, '', '1393', 'Fabricación de tapetes y alfombras para pisos'),
	(102, '', '1394', 'Fabricación de cuerdas, cordeles, cables, bramantes y redes'),
	(103, '', '1399', 'Fabricación de otros artículos textiles n.c.p.'),
	(104, '141', '1410', 'Confección de prendas de vestir, excepto prendas de piel'),
	(105, '142', '1420', 'Fabricación de artículos de piel'),
	(106, '143', '1430', 'Fabricación de artículos de punto y ganchillo'),
	(107, '151', '', 'Curtido y recurtido de cueros; fabricación de artículos de viaje, bolsos de mano y artículos similares, y fabricación de artículos de talabartería y guarnicionería, adobo y teñido de pieles'),
	(108, '', '1511', 'Curtido y recurtido de cueros; recurtido y teñido de pieles'),
	(109, '', '1512', 'Fabricación de artículos de viaje, bolsos de mano y artículos similares elaborados en cuero, y fabricación de artículos de talabartería y guarnicionería'),
	(110, '', '1513', 'Fabricación de artículos de viaje, bolsos de mano y artículos similares; artículos de talabartería y guarnicionería elaborados en otros materiales'),
	(111, '152', '', 'Fabricación de calzado'),
	(112, '', '1521', 'Fabricación de calzado de cuero y piel, con cualquier tipo de suela'),
	(113, '', '1522', 'Fabricación de otros tipos de calzado, excepto calzado de cuero y piel'),
	(114, '', '1523', 'Fabricación de partes del calzado'),
	(115, '161', '1610', 'Aserrado, acepillado e impregnación de la madera'),
	(116, '162', '1620', 'Fabricación de hojas de madera para enchapado; fabricación de tableros contrachapados, tableros laminados, tableros de partículas y otros tableros y paneles'),
	(117, '163', '1630', 'Fabricación de partes y piezas de madera, de carpintería y ebanistería para la construcción'),
	(118, '164', '1640', 'Fabricación de recipientes de madera'),
	(119, '169', '1690', 'Fabricación de otros productos de madera; fabricación de artículos de corcho, cestería y espartería'),
	(120, '170', '', 'Fabricación de papel, cartón y productos de papel y cartón'),
	(121, '', '1701', 'Fabricación de pulpas (pastas) celulósicas; papel y cartón'),
	(122, '', '1702', 'Fabricación de papel y cartón ondulado (corrugado); fabricación de envases, empaques y de embalajes de papel y cartón.'),
	(123, '', '1709', 'Fabricación de otros artículos de papel y cartón'),
	(124, '181', '', 'Actividades de impresión y actividades de servicios relacionados con la impresión'),
	(125, '', '1811', 'Actividades de impresión'),
	(126, '', '1812', 'Actividades de servicios relacionados con la impresión'),
	(127, '182', '1820', 'Producción de copias a partir de grabaciones originales '),
	(128, '191', '1910', 'Fabricación de productos de hornos de coque'),
	(129, '192', '', 'Fabricación de productos de la refinación del petróleo'),
	(130, '', '1921', 'Fabricación de productos de la refinación del petróleo'),
	(131, '', '1922', 'Actividad de mezcla de combustibles'),
	(132, '201', '', 'Fabricación de sustancias químicas básicas, abonos y compuestos inorgánicos nitrogenados, plásticos y caucho sintético en formas primarias'),
	(133, '', '2011', 'Fabricación de sustancias y productos químicos básicos'),
	(134, '', '2012', 'Fabricación de abonos y compuestos inorgánicos nitrogenados'),
	(135, '', '2013', 'Fabricación de plásticos en formas primarias'),
	(136, '', '2014', 'Fabricación de caucho sintético en formas primarias'),
	(137, '202', '', 'Fabricación de otros productos químicos'),
	(138, '', '2021', 'Fabricación de plaguicidas y otros productos químicos de uso agropecuario'),
	(139, '', '2022', 'Fabricación de pinturas, barnices y revestimientos similares, tintas para impresión y masillas'),
	(140, '', '2023', 'Fabricación de jabones y detergentes, preparados para limpiar y pulir; perfumes y preparados de tocador'),
	(141, '', '2029', 'Fabricación de otros productos químicos n.c.p.'),
	(142, '203', '2030', 'Fabricación de fibras sintéticas y artificiales'),
	(143, '210', '2100', 'Fabricación de productos farmacéuticos, sustancias químicas medicinales y productos botánicos de uso farmacéutico'),
	(144, '221', '', 'Fabricación de productos de caucho'),
	(145, '', '2211', 'Fabricación de llantas y neumáticos de caucho'),
	(146, '', '2212', 'Reencauche de llantas usadas'),
	(147, '', '2219', 'Fabricación de formas básicas de caucho y otros productos de caucho n.c.p.'),
	(148, '222', '', 'Fabricación de productos de plástico'),
	(149, '', '2221', 'Fabricación de formas básicas de plástico'),
	(150, '', '2229', 'Fabricación de artículos de plástico n.c.p.'),
	(151, '231', '2310', 'Fabricación de vidrio y productos de vidrio'),
	(152, '239', '', 'Fabricación de productos minerales no metálicos n.c.p.'),
	(153, '', '2391', 'Fabricación de productos refractarios'),
	(154, '', '2392', 'Fabricación de materiales de arcilla para la construcción'),
	(155, '', '2393', 'Fabricación de otros productos de cerámica y porcelana'),
	(156, '', '2394', 'Fabricación de cemento, cal y yeso'),
	(157, '', '2395', 'Fabricación de artículos de hormigón, cemento y yeso'),
	(158, '', '2396', 'Corte, tallado y acabado de la piedra'),
	(159, '', '2399', 'Fabricación de otros productos minerales no metálicos n.c.p.'),
	(160, '241', '2410', 'Industrias básicas de hierro y de acero'),
	(161, '242', '', 'Industrias básicas de metales preciosos y de metales no ferrosos'),
	(162, '', '2421', 'Industrias básicas de metales preciosos'),
	(163, '', '2429', 'Industrias básicas de otros metales no ferrosos'),
	(164, '243', '', 'Fundición de metales'),
	(165, '', '2431', 'Fundición de hierro y de acero'),
	(166, '', '2432', 'Fundición de metales no ferrosos '),
	(167, '251', '', 'Fabricación de productos metálicos para uso estructural, tanques, depósitos y generadores de vapor'),
	(168, '', '2511', 'Fabricación de productos metálicos para uso estructural'),
	(169, '', '2512', 'Fabricación de tanques, depósitos y recipientes de metal, excepto los utilizados para el envase o transporte de mercancías'),
	(170, '', '2513', 'Fabricación de generadores de vapor, excepto calderas de agua caliente para calefacción central'),
	(171, '252', '2520', 'Fabricación de armas y municiones'),
	(172, '259', '', 'Fabricación de otros productos elaborados de metal y actividades de servicios relacionadas con el trabajo de metales'),
	(173, '', '2591', 'Forja, prensado, estampado y laminado de metal; pulvimetalurgia'),
	(174, '', '2592', 'Tratamiento y revestimiento de metales; mecanizado'),
	(175, '', '2593', 'Fabricación de artículos de cuchillería, herramientas de mano y artículos de ferretería'),
	(176, '', '2599', 'Fabricación de otros productos elaborados de metal n.c.p.'),
	(177, '261', '2610', 'Fabricación de componentes y tableros electrónicos'),
	(178, '262', '2620', 'Fabricación de computadoras y de equipo periférico'),
	(179, '263', '2630', 'Fabricación de equipos de comunicación'),
	(180, '264', '2640', 'Fabricación de aparatos electrónicos de consumo'),
	(181, '265', '', 'Fabricación de equipo de medición, prueba, navegación y control; fabricación de relojes'),
	(182, '', '2651', 'Fabricación de equipo de medición, prueba, navegación y control'),
	(183, '', '2652', 'Fabricación de relojes'),
	(184, '266', '2660', 'Fabricación de equipo de irradiación y equipo electrónico de uso médico y terapéutico'),
	(185, '267', '2670', 'Fabricación de instrumentos ópticos y equipo fotográfico'),
	(186, '268', '2680', 'Fabricación de medios magnéticos y ópticos para almacenamiento de datos'),
	(187, '271', '', 'Fabricación de motores, generadores y transformadores eléctricos y de aparatos de distribución y control de la energía eléctrica'),
	(188, '', '2711', 'Fabricación de motores, generadores y transformadores eléctricos'),
	(189, '', '2712', 'Fabricación de aparatos de distribución y control de la energía eléctrica'),
	(190, '272', '2720', 'Fabricación de pilas, baterías y acumuladores eléctricos'),
	(191, '273', '', 'Fabricación de hilos y cables aislados y sus dispositivos'),
	(192, '', '2731', 'Fabricación de hilos y cables eléctricos y de fibra óptica'),
	(193, '', '2732', 'Fabricación de dispositivos de cableado'),
	(194, '274', '2740', 'Fabricación de equipos eléctricos de iluminación'),
	(195, '275', '2750', 'Fabricación de aparatos de uso doméstico'),
	(196, '279', '2790', 'Fabricación de otros tipos de equipo eléctrico n.c.p.'),
	(197, '281', '', 'Fabricación de maquinaria y equipo de uso general'),
	(198, '', '2811', 'Fabricación de motores, turbinas, y partes para motores de combustión interna'),
	(199, '', '2812', 'Fabricación de equipos de potencia hidráulica y neumática'),
	(200, '', '2813', 'Fabricación de otras bombas, compresores, grifos y válvulas'),
	(201, '', '2814', 'Fabricación de cojinetes, engranajes, trenes de engranajes y piezas de transmisión'),
	(202, '', '2815', 'Fabricación de hornos, hogares y quemadores industriales'),
	(203, '', '2816', 'Fabricación de equipo de elevación y manipulación'),
	(204, '', '2817', 'Fabricación de maquinaria y equipo de oficina (excepto computadoras y equipo periférico)'),
	(205, '', '2818', 'Fabricación de herramientas manuales con motor'),
	(206, '', '2819', 'Fabricación de otros tipos de maquinaria y equipo de uso general n.c.p.'),
	(207, '282', '', 'Fabricación de maquinaria y equipo de uso especial'),
	(208, '', '2821', 'Fabricación de maquinaria agropecuaria y forestal'),
	(209, '', '2822', 'Fabricación de máquinas formadoras de metal y de máquinas herramienta'),
	(210, '', '2823', 'Fabricación de maquinaria para la metalurgia'),
	(211, '', '2824', 'Fabricación de maquinaria para explotación de minas y canteras y para obras de construcción'),
	(212, '', '2825', 'Fabricación de maquinaria para la elaboración de alimentos, bebidas y tabaco'),
	(213, '', '2826', 'Fabricación de maquinaria para la elaboración de productos textiles, prendas de vestir y cueros'),
	(214, '', '2829', 'Fabricación de otros tipos de maquinaria y equipo de uso especial n.c.p.'),
	(215, '291', '2910', 'Fabricación de vehículos automotores y sus motores'),
	(216, '292', '2920', 'Fabricación de carrocerías para vehículos automotores; fabricación de remolques y semirremolques '),
	(217, '293', '2930', 'Fabricación de partes, piezas (autopartes) y accesorios (lujos) para vehículos automotores'),
	(218, '301', '', 'Construcción de barcos y otras embarcaciones'),
	(219, '', '3011', 'Construcción de barcos y de estructuras flotantes'),
	(220, '', '3012', 'Construcción de embarcaciones de recreo y deporte'),
	(221, '302', '3020', 'Fabricación de locomotoras y de material rodante para ferrocarriles'),
	(222, '303', '3030', 'Fabricación de aeronaves, naves espaciales y de maquinaria conexa'),
	(223, '304', '3040', 'Fabricación de vehículos militares de combate'),
	(224, '309', '', 'Fabricación de otros tipos de equipo de transporte n.c.p.'),
	(225, '', '3091', 'Fabricación de motocicletas'),
	(226, '', '3092', 'Fabricación de bicicletas y de sillas de ruedas para personas con discapacidad'),
	(227, '', '3099', 'Fabricación de otros tipos de equipo de transporte n.c.p.'),
	(228, '311', '3110', 'Fabricación de muebles '),
	(229, '312', '3120', 'Fabricación de colchones y somieres'),
	(230, '321', '3210', 'Fabricación de joyas, bisutería y artículos conexos'),
	(231, '322', '3220', 'Fabricación de instrumentos musicales'),
	(232, '323', '3230', 'Fabricación de artículos y equipo para la práctica del deporte'),
	(233, '324', '3240', 'Fabricación de juegos, juguetes y rompecabezas'),
	(234, '325', '3250', 'Fabricación de instrumentos, aparatos y materiales médicos y odontológicos (incluido mobiliario)'),
	(235, '329', '3290', 'Otras industrias manufactureras n.c.p.'),
	(236, '331', '', 'Mantenimiento y reparación especializado de productos elaborados en metal y de maquinaria y equipo'),
	(237, '', '3311', 'Mantenimiento y reparación especializado de productos elaborados en metal'),
	(238, '', '3312', 'Mantenimiento y reparación especializado de maquinaria y equipo'),
	(239, '', '3313', 'Mantenimiento y reparación especializado de equipo electrónico y óptico'),
	(240, '', '3314', 'Mantenimiento y reparación especializado de equipo eléctrico'),
	(241, '', '3315', 'Mantenimiento y reparación especializado de equipo de transporte, excepto los vehículos automotores, motocicletas y bicicletas'),
	(242, '', '3319', 'Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.'),
	(243, '332', '3320', 'Instalación especializada de maquinaria y equipo industrial '),
	(244, '351', '', 'Generación, transmisión, distribución y comercialización de energía eléctrica'),
	(245, '', '3511', 'Generación de energía eléctrica'),
	(246, '', '3512', 'Transmisión de energía eléctrica'),
	(247, '', '3513', 'Distribución de energía eléctrica'),
	(248, '', '3514', 'Comercialización de energía eléctrica'),
	(249, '352', '3520', 'Producción de gas; distribución de combustibles gaseosos por tuberías'),
	(250, '353', '3530', 'Suministro de vapor y aire acondicionado'),
	(251, '360', '3600', 'Captación, tratamiento y distribución de agua'),
	(252, '370', '3700', 'Evacuación y tratamiento de aguas residuales'),
	(253, '381', '', 'Recolección de desechos'),
	(254, '', '3811', 'Recolección de desechos no peligrosos'),
	(255, '', '3812', 'Recolección de desechos peligrosos'),
	(256, '382', '', 'Tratamiento y disposición de desechos'),
	(257, '', '3821', 'Tratamiento y disposición de desechos no peligrosos'),
	(258, '', '3822', 'Tratamiento y disposición de desechos peligrosos'),
	(259, '383', '3830', 'Recuperación de materiales'),
	(260, '390', '3900', 'Actividades de saneamiento ambiental y otros servicios de gestión de desechos'),
	(261, '411', '', 'Construcción de edificios'),
	(262, '', '4111', 'Construcción de edificios residenciales'),
	(263, '', '4112', 'Construcción de edificios no residenciales'),
	(264, '421', '4210', 'Construcción de carreteras y vías de ferrocarril'),
	(265, '422', '4220', 'Construcción de proyectos de servicio público'),
	(266, '429', '4290', 'Construcción de otras obras de ingeniería civil'),
	(267, '431', '', 'Demolición y preparación del terreno'),
	(268, '', '4311', 'Demolición'),
	(269, '', '4312', 'Preparación del terreno'),
	(270, '432', '', 'Instalaciones eléctricas, de fontanería y otras instalaciones especializadas'),
	(271, '', '4321', 'Instalaciones eléctricas'),
	(272, '', '4322', 'Instalaciones de fontanería, calefacción y aire acondicionado'),
	(273, '', '4329', 'Otras instalaciones especializadas'),
	(274, '433', '4330', 'Terminación y acabado de edificios y obras de ingeniería civil'),
	(275, '439', '4390', 'Otras actividades especializadas para la construcción de edificios y obras de ingeniería civil'),
	(276, '451', '', 'Comercio de vehículos automotores'),
	(277, '', '4511', 'Comercio de vehículos automotores nuevos'),
	(278, '', '4512', 'Comercio de vehículos automotores usados'),
	(279, '452', '4520', 'Mantenimiento y reparación de vehículos automotores'),
	(280, '453', '4530', 'Comercio de partes, piezas (autopartes) y accesorios (lujos) para vehículos automotores'),
	(281, '454', '', 'Comercio, mantenimiento y reparación de motocicletas y de sus partes, piezas y accesorios'),
	(282, '', '4541', 'Comercio de motocicletas y de sus partes, piezas y accesorios'),
	(283, '', '4542', 'Mantenimiento y reparación de motocicletas y de sus partes y piezas'),
	(284, '461', '4610', 'Comercio al por mayor a cambio de una retribución o por contrata'),
	(285, '462', '4620', 'Comercio al por mayor de materias primas agropecuarias; animales vivos'),
	(286, '463', '', 'Comercio al por mayor de alimentos, bebidas y tabaco'),
	(287, '', '4631', 'Comercio al por mayor de productos alimenticios'),
	(288, '', '4632', 'Comercio al por mayor de bebidas y tabaco'),
	(289, '464', '', 'Comercio al por mayor de artículos y enseres domésticos (incluidas prendas de vestir)'),
	(290, '', '4641', 'Comercio al por mayor de productos textiles, productos confeccionados para uso doméstico'),
	(291, '', '4642', 'Comercio al por mayor de prendas de vestir'),
	(292, '', '4643', 'Comercio al por mayor de calzado'),
	(293, '', '4644', 'Comercio al por mayor de aparatos y equipo de uso doméstico'),
	(294, '', '4645', 'Comercio al por mayor de productos farmacéuticos, medicinales, cosméticos y de tocador'),
	(295, '', '4649', 'Comercio al por mayor de otros utensilios domésticos n.c.p.'),
	(296, '465', '', 'Comercio al por mayor de maquinaria y equipo '),
	(297, '', '4651', 'Comercio al por mayor de computadores, equipo periférico y programas de informática'),
	(298, '', '4652', 'Comercio al por mayor de equipo, partes y piezas electrónicos y de telecomunicaciones'),
	(299, '', '4653', 'Comercio al por mayor de maquinaria y equipo agropecuarios'),
	(300, '', '4659', 'Comercio al por mayor de otros tipos de maquinaria y equipo n.c.p.'),
	(301, '466', '', 'Comercio al por mayor especializado de otros productos'),
	(302, '', '4661', 'Comercio al por mayor de combustibles sólidos, líquidos, gaseosos y productos conexos'),
	(303, '', '4662', 'Comercio al por mayor de metales y productos metalíferos'),
	(304, '', '4663', 'Comercio al por mayor de materiales de construcción, artículos de ferretería, pinturas, productos de vidrio, equipo y materiales de fontanería y calefacción'),
	(305, '', '4664', 'Comercio al por mayor de productos químicos básicos, cauchos y plásticos en formas primarias y productos químicos de uso agropecuario'),
	(306, '', '4665', 'Comercio al por mayor de desperdicios, desechos y chatarra'),
	(307, '', '4669', 'Comercio al por mayor de otros productos n.c.p.'),
	(308, '469', '4690', 'Comercio al por mayor no especializado'),
	(309, '471', '', 'Comercio al por menor en establecimientos no especializados'),
	(310, '', '4711', 'Comercio al por menor en establecimientos no especializados con surtido compuesto principalmente por alimentos, bebidas o tabaco'),
	(311, '', '4719', 'Comercio al por menor en establecimientos no especializados, con surtido compuesto principalmente por productos diferentes de alimentos (víveres en general), bebidas y tabaco'),
	(312, '472', '', 'Comercio al por menor de alimentos (víveres en general), bebidas y tabaco, en establecimientos especializados'),
	(313, '', '4721', 'Comercio al por menor de productos agrícolas para el consumo en establecimientos especializados'),
	(314, '', '4722', 'Comercio al por menor de leche, productos lácteos y huevos, en establecimientos especializados'),
	(315, '', '4723', 'Comercio al por menor de carnes (incluye aves de corral), productos cárnicos, pescados y productos de mar, en establecimientos especializados'),
	(316, '', '4724', 'Comercio al por menor de bebidas y productos del tabaco, en establecimientos especializados'),
	(317, '', '4729', 'Comercio al por menor de otros productos alimenticios n.c.p., en establecimientos especializados'),
	(318, '473', '', 'Comercio al por menor de combustible, lubricantes, aditivos y productos de limpieza para automotores, en establecimientos especializados'),
	(319, '', '4731', 'Comercio al por menor de combustible para automotores'),
	(320, '', '4732', 'Comercio al por menor de lubricantes (aceites, grasas), aditivos y productos de limpieza para vehículos automotores'),
	(321, '474', '', 'Comercio al por menor de equipos de informática y de comunicaciones, en establecimientos especializados'),
	(322, '', '4741', 'Comercio al por menor de computadores, equipos periféricos, programas de informática y equipos de telecomunicaciones en establecimientos especializados'),
	(323, '', '4742', 'Comercio al por menor de equipos y aparatos de sonido y de video, en establecimientos especializados'),
	(324, '475', '', 'Comercio al por menor de otros enseres domésticos en establecimientos especializados'),
	(325, '', '4751', 'Comercio al por menor de productos textiles en establecimientos especializados'),
	(326, '', '4752', 'Comercio al por menor de artículos de ferretería, pinturas y productos de vidrio en establecimientos especializados'),
	(327, '', '4753', 'Comercio al por menor de tapices, alfombras y cubrimientos para paredes y pisos en establecimientos especializados'),
	(328, '', '4754', 'Comercio al por menor de electrodomésticos y gasodomésticos de uso doméstico, muebles y equipos de iluminación'),
	(329, '', '4755', 'Comercio al por menor de artículos y utensilios de uso doméstico'),
	(330, '', '4759', 'Comercio al por menor de otros artículos domésticos en establecimientos especializados'),
	(331, '476', '', 'Comercio al por menor de artículos culturales y de entretenimiento, en establecimientos especializados'),
	(332, '', '4761', 'Comercio al por menor de libros, periódicos, materiales y artículos de papelería y escritorio, en establecimientos especializados'),
	(333, '', '4762', 'Comercio al por menor de artículos deportivos, en establecimientos especializados '),
	(334, '', '4769', 'Comercio al por menor de otros artículos culturales y de entretenimiento n.c.p. en establecimientos especializados'),
	(335, '477', '', 'Comercio al por menor de otros productos en establecimientos especializados'),
	(336, '', '4771', 'Comercio al por menor de prendas de vestir y sus accesorios (incluye artículos de piel) en establecimientos especializados'),
	(337, '', '4772', 'Comercio al por menor de todo tipo de calzado y artículos de cuero y sucedáneos del cuero en establecimientos especializados.'),
	(338, '', '4773', 'Comercio al por menor de productos farmacéuticos y medicinales, cosméticos y artículos de tocador en establecimientos especializados'),
	(339, '', '4774', 'Comercio al por menor de otros productos nuevos en establecimientos especializados'),
	(340, '', '4775', 'Comercio al por menor de artículos de segunda mano'),
	(341, '478', '', 'Comercio al por menor en puestos de venta móviles'),
	(342, '', '4781', 'Comercio al por menor de alimentos, bebidas y tabaco, en puestos de venta móviles'),
	(343, '', '4782', 'Comercio al por menor de productos textiles, prendas de vestir y calzado, en puestos de venta móviles'),
	(344, '', '4789', 'Comercio al por menor de otros productos en puestos de venta móviles'),
	(345, '479', '', 'Comercio al por menor no realizado en establecimientos, puestos de venta o mercados'),
	(346, '', '4791', 'Comercio al por menor realizado a través de Internet'),
	(347, '', '4792', 'Comercio al por menor realizado a través de casas de venta o por correo'),
	(348, '', '4799', 'Otros tipos de comercio al por menor no realizado en establecimientos, puestos de venta o mercados.'),
	(349, '491', '', 'Transporte férreo'),
	(350, '', '4911', 'Transporte férreo de pasajeros'),
	(351, '', '4912', 'Transporte férreo de carga '),
	(352, '492', '', 'Transporte terrestre público automotor'),
	(353, '', '4921', 'Transporte de pasajeros'),
	(354, '', '4922', 'Transporte mixto'),
	(355, '', '4923', 'Transporte de carga por carretera'),
	(356, '493', '4930', 'Transporte por tuberías'),
	(357, '501', '', 'Transporte marítimo y de cabotaje'),
	(358, '', '5011', 'Transporte de pasajeros marítimo y de cabotaje '),
	(359, '', '5012', 'Transporte de carga marítimo y de cabotaje '),
	(360, '502', '', 'Transporte fluvial'),
	(361, '', '5021', 'Transporte fluvial de pasajeros'),
	(362, '', '5022', 'Transporte fluvial de carga'),
	(363, '511', '', 'Transporte aéreo de pasajeros '),
	(364, '', '5111', 'Transporte aéreo nacional de pasajeros '),
	(365, '', '5112', 'Transporte aéreo internacional de pasajeros '),
	(366, '512', '', 'Transporte aéreo de carga '),
	(367, '', '5121', 'Transporte aéreo nacional de carga '),
	(368, '', '5122', 'Transporte aéreo internacional de carga '),
	(369, '521', '5210', 'Almacenamiento y depósito'),
	(370, '522', '', 'Actividades de las estaciones, vías y servicios complementarios para el transporte'),
	(371, '', '5221', 'Actividades de estaciones, vías y servicios complementarios para el transporte terrestre'),
	(372, '', '5222', 'Actividades de puertos y servicios complementarios para el transporte acuático'),
	(373, '', '5223', 'Actividades de aeropuertos, servicios de navegación aérea y demás actividades conexas al transporte aéreo'),
	(374, '', '5224', 'Manipulación de carga'),
	(375, '', '5229', 'Otras actividades complementarias al transporte'),
	(376, '531', '5310', 'Actividades postales nacionales'),
	(377, '532', '5320', 'Actividades de mensajería'),
	(378, '551', '', 'Actividades de alojamiento de estancias cortas'),
	(379, '', '5511', 'Alojamiento en hoteles '),
	(380, '', '5512', 'Alojamiento en apartahoteles'),
	(381, '', '5513', 'Alojamiento en centros vacacionales '),
	(382, '', '5514', 'Alojamiento rural'),
	(383, '', '5519', 'Otros tipos de alojamientos para visitantes'),
	(384, '552', '5520', 'Actividades de zonas de camping y parques para vehículos recreacionales'),
	(385, '553', '5530', 'Servicio por horas '),
	(386, '559', '5590', 'Otros tipos de alojamiento n.c.p.'),
	(387, '561', '', 'Actividades de restaurantes, cafeterías y servicio móvil de comidas'),
	(388, '', '5611', 'Expendio a la mesa de comidas preparadas'),
	(389, '', '5612', 'Expendio por autoservicio de comidas preparadas'),
	(390, '', '5613', 'Expendio de comidas preparadas en cafeterías'),
	(391, '', '5619', 'Otros tipos de expendio de comidas preparadas n.c.p.'),
	(392, '562', '', 'Actividades de catering para eventos y otros servicios de comidas'),
	(393, '', '5621', 'Catering para eventos'),
	(394, '', '5629', 'Actividades de otros servicios de comidas'),
	(395, '563', '5630', 'Expendio de bebidas alcohólicas para el consumo dentro del establecimiento'),
	(396, '581', '', 'Edición de libros, publicaciones periódicas y otras actividades de edición'),
	(397, '', '5811', 'Edición de libros'),
	(398, '', '5812', 'Edición de directorios y listas de correo'),
	(399, '', '5813', 'Edición de periódicos, revistas y otras publicaciones periódicas'),
	(400, '', '5819', 'Otros trabajos de edición'),
	(401, '582', '5820', 'Edición de programas de informática (software)'),
	(402, '591', '', 'Actividades de producción de películas cinematográficas, video y producción de programas, anuncios y comerciales de televisión'),
	(403, '', '5911', 'Actividades de producción de películas cinematográficas, videos, programas, anuncios y comerciales de televisión'),
	(404, '', '5912', 'Actividades de posproducción de películas cinematográficas, videos, programas, anuncios y comerciales de televisión'),
	(405, '', '5913', 'Actividades de distribución de películas cinematográficas, videos, programas, anuncios y comerciales de televisión'),
	(406, '', '5914', 'Actividades de exhibición de películas cinematográficas y videos'),
	(407, '592', '5920', 'Actividades de grabación de sonido y edición de musica'),
	(408, '601', '6010', 'Actividades de programación y transmisión en el servicio de radiodifusión sonora'),
	(409, '602', '6020', 'Actividades de programación y transmisión de televisión'),
	(410, '611', '6110', 'Actividades de telecomunicaciones alámbricas'),
	(411, '612', '6120', 'Actividades de telecomunicaciones inalámbricas'),
	(412, '613', '6130', 'Actividades de telecomunicación satelital'),
	(413, '619', '6190', 'Otras actividades de telecomunicaciones'),
	(414, '620', '', 'Desarrollo de sistemas informáticos (planificación, análisis, diseño, programación, pruebas), consultoría informática y actividades relacionadas'),
	(415, '', '6201', 'Actividades de desarrollo de sistemas informáticos (planificación, análisis, diseño, programación, pruebas)'),
	(416, '', '6202', 'Actividades de consultoría informática y actividades de administración de instalaciones informáticas'),
	(417, '', '6209', 'Otras actividades de tecnologías de información y actividades de servicios informáticos'),
	(418, '631', '', 'Procesamiento de datos, alojamiento (hosting) y actividades relacionadas; portales web'),
	(419, '', '6311', 'Procesamiento de datos, alojamiento (hosting) y actividades relacionadas'),
	(420, '', '6312', 'Portales web'),
	(421, '639', '', 'Otras actividades de servicio de información'),
	(422, '', '6391', 'Actividades de agencias de noticias'),
	(423, '', '6399', 'Otras actividades de servicio de información n.c.p.'),
	(424, '641', '', 'Intermediación monetaria'),
	(425, '', '6411', 'Banco Central'),
	(426, '', '6412', 'Bancos comerciales'),
	(427, '642', '', 'Otros tipos de intermediación monetaria'),
	(428, '', '6421', 'Actividades de las corporaciones financieras'),
	(429, '', '6422', 'Actividades de las compañías de financiamiento'),
	(430, '', '6423', 'Banca de segundo piso'),
	(431, '', '6424', 'Actividades de las cooperativas financieras'),
	(432, '643', '', 'Fideicomisos, fondos (incluye fondos de cesantías) y entidades financieras similares'),
	(433, '', '6431', 'Fideicomisos, fondos y entidades financieras similares'),
	(434, '', '6432', 'Fondos de cesantías'),
	(435, '649', '', 'Otras actividades de servicio financiero, excepto las de seguros y pensiones'),
	(436, '', '6491', 'Leasing financiero (arrendamiento financiero)'),
	(437, '', '6492', 'Actividades financieras de fondos de empleados y otras formas asociativas del sector solidario'),
	(438, '', '6493', 'Actividades de compra de cartera o factoring'),
	(439, '', '6494', 'Otras actividades de distribución de fondos'),
	(440, '', '6495', 'Instituciones especiales oficiales'),
	(441, '', '6499', 'Otras actividades de servicio financiero, excepto las de seguros y pensiones n.c.p.'),
	(442, '', '6511', 'Seguros generales '),
	(443, '', '6512', 'Seguros de vida'),
	(444, '', '6513', 'Reaseguros'),
	(445, '', '6514', 'Capitalización'),
	(446, '652', '', 'Servicios de seguros sociales de salud y riesgos profesionales'),
	(447, '', '6521', 'Servicios de seguros sociales de salud'),
	(448, '', '6522', 'Servicios de seguros sociales de riesgos profesionales'),
	(449, '653', '', 'Servicios de seguros sociales de pensiones'),
	(450, '', '6531', 'Régimen de prima media con prestación definida (RPM)'),
	(451, '', '6532', 'Régimen de ahorro individual (RAI)'),
	(452, '661', '', 'Actividades auxiliares de las actividades de servicios financieros, excepto las de seguros y pensiones'),
	(453, '', '6611', 'Administración de mercados financieros'),
	(454, '', '6612', 'Corretaje de valores y de contratos de productos básicos'),
	(455, '', '6613', 'Otras actividades relacionadas con el mercado de valores'),
	(456, '', '6614', 'Actividades de las casas de cambio'),
	(457, '', '6615', 'Actividades de los profesionales de compra y venta de divisas'),
	(458, '', '6619', 'Otras actividades auxiliares de las actividades de servicios financieros n.c.p.'),
	(459, '662', '', 'Actividades de servicios auxiliares de los servicios de seguros y pensiones'),
	(460, '', '6621', 'Actividades de agentes y corredores de seguros'),
	(461, '', '6629', 'Evaluación de riesgos y daños, y otras actividades de servicios auxiliares'),
	(462, '663', '6630', 'Actividades de administración de fondos'),
	(463, '681', '6810', 'Actividades inmobiliarias realizadas con bienes propios o arrendados'),
	(464, '682', '6820', 'Actividades inmobiliarias realizadas a cambio de una retribución o por contrata '),
	(465, '691', '6910', 'Actividades jurídicas'),
	(466, '692', '6920', 'Actividades de contabilidad, teneduría de libros, auditoría financiera y asesoría tributaria'),
	(467, '701', '7010', 'Actividades de administración empresarial'),
	(468, '702', '7020', 'Actividades de consultaría de gestión'),
	(469, '711', '7110', 'Actividades de arquitectura e ingeniería y otras actividades conexas de consultoría técnica'),
	(470, '712', '7120', 'Ensayos y análisis técnicos'),
	(471, '721', '7210', 'Investigaciones y desarrollo experimental en el campo de las ciencias naturales y la ingeniería '),
	(472, '722', '7220', 'Investigaciones y desarrollo experimental en el campo de las ciencias sociales y las humanidades'),
	(473, '731', '7310', 'Publicidad'),
	(474, '732', '7320', 'Estudios de mercado y realización de encuestas de opinión pública'),
	(475, '741', '7410', 'Actividades especializadas de diseño '),
	(476, '742', '7420', 'Actividades de fotografía'),
	(477, '749', '7490', 'Otras actividades profesionales, científicas y técnicas n.c.p.'),
	(478, '', '', 'Actividades veterinarias'),
	(479, '750', '7500', 'Actividades veterinarias'),
	(480, '771', '7710', 'Alquiler y arrendamiento de vehículos automotores'),
	(481, '772', '', 'Alquiler y arrendamiento de efectos personales y enseres domésticos'),
	(482, '', '7721', 'Alquiler y arrendamiento de equipo recreativo y deportivo'),
	(483, '', '7722', 'Alquiler de videos y discos '),
	(484, '', '7729', 'Alquiler y arrendamiento de otros efectos personales y enseres domésticos n.c.p.'),
	(485, '773', '7730', 'Alquiler y arrendamiento de otros tipos de maquinaria, equipo y bienes tangibles n.c.p.'),
	(486, '774', '7740', 'Arrendamiento de propiedad intelectual y productos similares, excepto obras protegidas por derechos de autor'),
	(487, '781', '7810', 'Actividades de agencias de empleo'),
	(488, '782', '7820', 'Actividades de agencias de empleo temporal'),
	(489, '783', '7830', 'Otras actividades de suministro de recurso humano'),
	(490, '791', '', 'Actividades de las agencias de viajes y operadores turísticos'),
	(491, '', '7911', 'Actividades de las agencias de viaje'),
	(492, '', '7912', 'Actividades de operadores turísticos'),
	(493, '799', '7990', 'Otros servicios de reserva y actividades relacionadas'),
	(494, '801', '8010', 'Actividades de seguridad privada'),
	(495, '802', '8020', 'Actividades de servicios de sistemas de seguridad'),
	(496, '803', '8030', 'Actividades de detectives e investigadores privados'),
	(497, '811', '8110', 'Actividades combinadas de apoyo a instalaciones'),
	(498, '812', '', 'Actividades de limpieza'),
	(499, '', '8121', 'Limpieza general interior de edificios'),
	(500, '', '8129', 'Otras actividades de limpieza de edificios e instalaciones industriales'),
	(501, '813', '8130', 'Actividades de paisajismo y servicios de mantenimiento conexos'),
	(502, '821', '', 'Actividades administrativas y de apoyo de oficina'),
	(503, '', '8211', 'Actividades combinadas de servicios administrativos de oficina'),
	(504, '', '8219', 'Fotocopiado, preparación de documentos y otras actividades especializadas de apoyo a oficina'),
	(505, '822', '8220', 'Actividades de centros de llamadas (Call center)'),
	(506, '823', '8230', 'Organización de convenciones y eventos comerciales'),
	(507, '829', '', 'Actividades de servicios de apoyo a las empresas n.c.p.'),
	(508, '', '8291', 'Actividades de agencias de cobranza y oficinas de calificación crediticia'),
	(509, '', '8292', 'Actividades de envase y empaque'),
	(510, '', '8299', 'Otras actividades de servicio de apoyo a las empresas n.c.p.'),
	(511, '841', '', 'Administración del Estado y aplicación de la política económica y social de la comunidad'),
	(512, '', '8411', 'Actividades legislativas de la administración pública'),
	(513, '', '8412', 'Actividades ejecutivas de la administración pública'),
	(514, '', '8413', 'Regulación de las actividades de organismos que prestan servicios de salud, educativos, culturales y otros servicios sociales, excepto servicios de seguridad social '),
	(515, '', '8414', 'Actividades reguladoras y facilitadoras de la actividad económica'),
	(516, '', '8415', 'Actividades de los otros órganos de control'),
	(517, '842', '', 'Prestación de servicios a la comunidad en general'),
	(518, '', '8421', 'Relaciones exteriores '),
	(519, '', '8422', 'Actividades de defensa'),
	(520, '', '8423', 'Orden público y actividades de seguridad'),
	(521, '', '8424', 'Administración de justicia'),
	(522, '843', '8430', 'Actividades de planes de seguridad social de afiliación obligatoria'),
	(523, '851', '', 'Educación de la primera infancia, preescolar y básica primaria'),
	(524, '', '8511', 'Educación de la primera infancia'),
	(525, '', '8512', 'Educación preescolar'),
	(526, '', '8513', 'Educación básica primaria'),
	(527, '852', '', 'Educación secundaria y de formación laboral'),
	(528, '', '8521', 'Educación básica secundaria '),
	(529, '', '8522', 'Educación media académica'),
	(530, '', '8523', 'Educación media técnica y de formación laboral'),
	(531, '853', '8530', 'Establecimientos que combinan diferentes niveles de educación '),
	(532, '854', '', 'Educación superior'),
	(533, '', '8541', 'Educación técnica profesional'),
	(534, '', '8542', 'Educación tecnológica'),
	(535, '', '8543', 'Educación de instituciones universitarias o de escuelas tecnológicas'),
	(536, '', '8544', 'Educación de universidades'),
	(537, '855', '', 'Otros tipos de educación'),
	(538, '', '8551', 'Formación académica no formal '),
	(539, '', '8552', 'Enseñanza deportiva y recreativa'),
	(540, '', '8553', 'Enseñanza cultural'),
	(541, '', '8559', 'Otros tipos de educación n.c.p.'),
	(542, '856', '8560', 'Actividades de apoyo a la educación'),
	(543, '', '', 'Actividades de atención de la salud humana'),
	(544, '861', '8610', 'Actividades de hospitales y clínicas, con internación'),
	(545, '862', '', 'Actividades de práctica médica y odontológica, sin internación '),
	(546, '', '8621', 'Actividades de la práctica médica, sin internación'),
	(547, '', '8622', 'Actividades de la práctica odontológica'),
	(548, '869', '', 'Otras actividades de atención relacionadas con la salud humana'),
	(549, '', '8691', 'Actividades de apoyo diagnóstico'),
	(550, '', '8692', 'Actividades de apoyo terapéutico'),
	(551, '', '8699', 'Otras actividades de atención de la salud humana'),
	(552, '871', '8710', 'Actividades de atención residencial medicalizada de tipo general'),
	(553, '872', '8720', 'Actividades de atención residencial, para el cuidado de pacientes con retardo mental, enfermedad mental y consumo de sustancias psicoactivas'),
	(554, '873', '8730', 'Actividades de atención en instituciones para el cuidado de personas mayores y/o discapacitadas'),
	(555, '879', '8790', 'Otras actividades de atención en instituciones con alojamiento'),
	(556, '881', '8810', 'Actividades de asistencia social sin alojamiento para personas mayores y discapacitadas'),
	(557, '889', '8890', 'Otras actividades de asistencia social sin alojamiento'),
	(558, '900', '', 'Actividades creativas, artísticas y de entretenimiento '),
	(559, '', '9001', 'Creación literaria'),
	(560, '', '9002', 'Creación musical'),
	(561, '', '9003', 'Creación teatral'),
	(562, '', '9004', 'Creación audiovisual'),
	(563, '', '9005', 'Artes plásticas y visuales'),
	(564, '', '9006', 'Actividades teatrales'),
	(565, '', '9007', 'Actividades de espectáculos musicales en vivo'),
	(566, '', '9008', 'Otras actividades de espectáculos en vivo'),
	(567, '910', '', 'Actividades de bibliotecas, archivos, museos y otras actividades culturales'),
	(568, '', '9101', 'Actividades de bibliotecas y archivos'),
	(569, '', '9102', 'Actividades y funcionamiento de museos, conservación de edificios y sitios históricos'),
	(570, '', '9103', 'Actividades de jardines botánicos, zoológicos y reservas naturales'),
	(571, '920', '9200', 'Actividades de juegos de azar y apuestas'),
	(572, '931', '', 'Actividades deportivas'),
	(573, '', '9311', 'Gestión de instalaciones deportivas'),
	(574, '', '9312', 'Actividades de clubes deportivos'),
	(575, '', '9319', 'Otras actividades deportivas'),
	(576, '932', '', 'Otras actividades recreativas y de esparcimiento'),
	(577, '', '9321', 'Actividades de parques de atracciones y parques temáticos'),
	(578, '', '9329', 'Otras actividades recreativas y de esparcimiento n.c.p.'),
	(579, '941', '', 'Actividades de asociaciones empresariales y de empleadores, '),
	(580, '', '', 'y asociaciones profesionales '),
	(581, '', '9411', 'Actividades de asociaciones empresariales y de empleadores'),
	(582, '', '9412', 'Actividades de asociaciones profesionales'),
	(583, '942', '9420', 'Actividades de sindicatos de empleados'),
	(584, '949', '', 'Actividades de otras asociaciones'),
	(585, '', '9491', 'Actividades de asociaciones religiosas'),
	(586, '', '9492', 'Actividades de asociaciones políticas'),
	(587, '', '9499', 'Actividades de otras asociaciones n.c.p.'),
	(588, '951', '', 'Mantenimiento y reparación de computadores y equipo de comunicaciones'),
	(589, '', '9511', 'Mantenimiento y reparación de computadores y de equipo periférico'),
	(590, '', '9512', 'Mantenimiento y reparación de equipos de comunicación'),
	(591, '952', '', 'Mantenimiento y reparación de efectos personales y enseres domésticos'),
	(592, '', '9521', 'Mantenimiento y reparación de aparatos electrónicos de consumo'),
	(593, '', '9522', 'Mantenimiento y reparación de aparatos y equipos domésticos y de jardinería '),
	(594, '', '9524', 'Reparación de muebles y accesorios para el hogar'),
	(595, '', '9529', 'Mantenimiento y reparación de otros efectos personales y enseres domésticos'),
	(596, '960', '', 'Otras actividades de servicios personales'),
	(597, '', '9601', 'Lavado y limpieza, incluso la limpieza en seco, de productos textiles y de piel'),
	(598, '', '9602', 'Peluquería y otros tratamientos de belleza'),
	(599, '', '9603', 'Pompas fúnebres y actividades relacionadas'),
	(600, '', '9609', 'Otras actividades de servicios personales n.c.p.'),
	(601, '970', '9700', 'Actividades de los hogares individuales como empleadores de personal doméstico'),
	(602, '981', '9810', 'Actividades no diferenciadas de los hogares individuales como productores de bienes para uso propio'),
	(603, '982', '9820', 'Actividades no diferenciadas de los hogares individuales como productores de servicios para uso propio'),
	(604, '990', '9900', 'Actividades de organizaciones y entidades extraterritoriales'),
	(605, '', '0010   ', 'Asalariados'),
	(606, '', '0081   ', 'Personas naturales sin actividad económica'),
	(607, '', '0082   ', 'Personas naturales subsidiadas por terceros'),
	(608, '', '0090   ', 'Rentistas de capital, solo para personas naturales');
/*!40000 ALTER TABLE `ciiu` ENABLE KEYS */;


-- Dumping structure for table dcs.ciudad
DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE IF NOT EXISTS `ciudad` (
  `ciu_id` int(11) NOT NULL AUTO_INCREMENT,
  `ciu_nombre` varchar(255) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`ciu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.ciudad: ~6 rows (approximately)
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` (`ciu_id`, `ciu_nombre`, `activo`) VALUES
	(43, 'Bogota D.C.', 'S'),
	(44, 'Cali', 'S'),
	(45, 'Medellin', 'S'),
	(46, 'Barranquilla', 'S'),
	(47, 'Bucaramanga', 'S'),
	(48, 'medellin', 'S');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;


-- Dumping structure for table dcs.clientes
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_tipo_cliente` int(11) DEFAULT NULL,
  `creado_por` int(11) DEFAULT NULL,
  `fecha_inicio_contrato` date DEFAULT NULL,
  `fecha_fin_contrato` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `email` text,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.clientes: ~12 rows (approximately)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id_cliente`, `nombre`, `fecha_creacion`, `id_tipo_cliente`, `creado_por`, `fecha_inicio_contrato`, `fecha_fin_contrato`, `estado`, `email`, `activo`) VALUES
	(1, 'sadf', NULL, 0, NULL, '2015-01-12', '2015-01-12', 'Activo', '', NULL),
	(2, 'dd', NULL, 0, NULL, '2015-01-12', '2015-01-12', 'Activo', '', 'S'),
	(3, 'asd', NULL, 3, NULL, '0000-00-00', '0000-00-00', 'Activo', '', 'S'),
	(4, 'nelson', NULL, 3, NULL, '0000-00-00', '0000-00-00', 'Inactivo', '', 'S'),
	(5, 'nelson', NULL, 3, NULL, '0000-00-00', '0000-00-00', 'Activo', '', 'S'),
	(6, 'nelson', NULL, 0, NULL, '0000-00-00', '0000-00-00', 'Activo', '', 'S'),
	(7, 'nelson', NULL, 0, NULL, '0000-00-00', '0000-00-00', 'Activo', '', 'S'),
	(8, 'nelson', NULL, 0, NULL, '0000-00-00', '0000-00-00', 'Activo', '', 'S'),
	(9, 'nelson', NULL, 0, NULL, '0000-00-00', '0000-00-00', '', '', 'S'),
	(10, 'nelson', NULL, 0, NULL, '0000-00-00', '0000-00-00', '', '', 'S'),
	(11, 'nelson', NULL, 0, NULL, '0000-00-00', '0000-00-00', 'Inactivo', '', 'S'),
	(12, 'Hospital san Ignacio', NULL, 7, NULL, '2015-09-01', '2015-12-31', 'Activo', '', 'S');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;


-- Dumping structure for table dcs.contacto
DROP TABLE IF EXISTS `contacto`;
CREATE TABLE IF NOT EXISTS `contacto` (
  `contacto_id` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono_fijo` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `parentesco` varchar(255) DEFAULT NULL,
  `llaves` varchar(255) DEFAULT NULL,
  `cuidador` varchar(255) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`contacto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.contacto: ~6 rows (approximately)
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
INSERT INTO `contacto` (`contacto_id`, `documento`, `nombre`, `Estado`, `fecha_creacion`, `direccion`, `telefono_fijo`, `celular`, `email`, `parentesco`, `llaves`, `cuidador`, `activo`) VALUES
	(1, '234', '345', NULL, NULL, '345', '345', '345', '345', '345', NULL, NULL, 'S'),
	(2, '1234567890', 'NELSON', NULL, NULL, 'CL 60', '123', '30023', '123@hh.com', 'NELSON', 'SI', 'SI', 'S'),
	(3, '213', '123', 'Inactivo', NULL, '123', '123', '312', '123', '123', '', 'SI', 'S'),
	(4, '11', '213', 'Inactivo', NULL, '123', '123', '123', '123', '123', '', '', 'S'),
	(5, '52865386', 'gina paola', 'Activo', NULL, 'Calle 127  20-45 Bogotá', '6786779', '320787897', 'jj@hotmail.com', 'hija', 'SI', '', 'S'),
	(6, '90675678', 'María ballen', 'Activo', NULL, 'calle 97 # 45-68', '897867896', '320878678', 'monicayrod@hotmail.com', 'hija', 'SI', '', 'S');
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;


-- Dumping structure for table dcs.dimension
DROP TABLE IF EXISTS `dimension`;
CREATE TABLE IF NOT EXISTS `dimension` (
  `dim_id` int(11) NOT NULL AUTO_INCREMENT,
  `dim_codigo` varchar(10) NOT NULL,
  `dim_descripcion` varchar(1000) NOT NULL,
  PRIMARY KEY (`dim_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.dimension: ~1 rows (approximately)
/*!40000 ALTER TABLE `dimension` DISABLE KEYS */;
INSERT INTO `dimension` (`dim_id`, `dim_codigo`, `dim_descripcion`) VALUES
	(9, '234', 'prueba');
/*!40000 ALTER TABLE `dimension` ENABLE KEYS */;


-- Dumping structure for table dcs.dimension2
DROP TABLE IF EXISTS `dimension2`;
CREATE TABLE IF NOT EXISTS `dimension2` (
  `dim_id` int(11) NOT NULL AUTO_INCREMENT,
  `dim_codigo` varchar(10) NOT NULL,
  `dim_descripcion` varchar(1000) NOT NULL,
  PRIMARY KEY (`dim_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.dimension2: ~6 rows (approximately)
/*!40000 ALTER TABLE `dimension2` DISABLE KEYS */;
INSERT INTO `dimension2` (`dim_id`, `dim_codigo`, `dim_descripcion`) VALUES
	(1, '', ''),
	(2, '', ''),
	(3, '213', 'fv'),
	(4, '213', 'fv'),
	(5, '213', 'fvddd'),
	(6, 'gfdfg', 'ergt');
/*!40000 ALTER TABLE `dimension2` ENABLE KEYS */;


-- Dumping structure for table dcs.empleado
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `Emp_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Emp_Cedula` varchar(100) NOT NULL,
  `Emp_Nombre` varchar(100) NOT NULL,
  `Emp_Apellidos` varchar(100) NOT NULL,
  `sex_Id` int(11) NOT NULL,
  `Emp_FechaNacimiento` date NOT NULL,
  `Emp_Estatura` int(11) DEFAULT NULL,
  `Emp_Peso` int(11) DEFAULT NULL,
  `Emp_Telefono` int(11) NOT NULL,
  `Emp_Direccion` varchar(100) NOT NULL,
  `Emp_Contacto` varchar(100) DEFAULT NULL,
  `Emp_TelefonoContacto` int(11) DEFAULT NULL,
  `Emp_Email` varchar(100) NOT NULL,
  `EstCiv_id` int(11) DEFAULT NULL,
  `TipCon_Id` int(11) DEFAULT NULL,
  `Emp_FechaInicioContrato` date DEFAULT NULL,
  `Emp_FechaFinContrato` date DEFAULT NULL,
  `Emp_PlanObligatorioSalud` bit(1) NOT NULL,
  `Emp_FechaAfiliacionArl` date NOT NULL,
  `TipAse_Id` int(11) DEFAULT NULL,
  `Ase_Id` int(11) DEFAULT NULL,
  `Dim_id` int(11) DEFAULT NULL,
  `Dim_IdDos` int(11) DEFAULT NULL,
  `Car_id` int(11) NOT NULL,
  `Emp_codigo` varchar(10) DEFAULT NULL,
  `TipDoc_id` int(11) DEFAULT NULL,
  `Est_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Emp_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.empleado: ~5 rows (approximately)
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` (`Emp_Id`, `Emp_Cedula`, `Emp_Nombre`, `Emp_Apellidos`, `sex_Id`, `Emp_FechaNacimiento`, `Emp_Estatura`, `Emp_Peso`, `Emp_Telefono`, `Emp_Direccion`, `Emp_Contacto`, `Emp_TelefonoContacto`, `Emp_Email`, `EstCiv_id`, `TipCon_Id`, `Emp_FechaInicioContrato`, `Emp_FechaFinContrato`, `Emp_PlanObligatorioSalud`, `Emp_FechaAfiliacionArl`, `TipAse_Id`, `Ase_Id`, `Dim_id`, `Dim_IdDos`, `Car_id`, `Emp_codigo`, `TipDoc_id`, `Est_id`) VALUES
	(1, '123456', 'xyz', '', 0, '0000-00-00', 0, 0, 0, '', '', 0, '', 0, 1, '0000-00-00', '0000-00-00', b'0', '0000-00-00', 0, 0, 0, 0, 0, NULL, NULL, NULL),
	(2, '213456', 'gerson javier', 'Barbosa Romero', 1, '0000-00-00', 34, 50, 1234567, 'calle 60 60 60', 'gerson', 1234567, 'javierbr12@hotmail.com', 0, 1, '0000-00-00', '0000-00-00', b'1', '0000-00-00', 0, 0, 9, 3, 40, '', NULL, NULL),
	(3, '213456', 'gerson javier', 'Barbosa Romero', 1, '0000-00-00', 34, 50, 1234567, 'calle 60 60 60', 'gerson', 1234567, 'javierbr12@hotmail.com', 0, 1, '0000-00-00', '0000-00-00', b'1', '0000-00-00', 0, 0, 9, 3, 40, '', NULL, NULL),
	(4, '213456', 'gerson javier', 'Barbosa Romero', 1, '0000-00-00', 34, 50, 1234567, 'calle 60 60 60', 'gerson', 1234567, 'javierbr12@hotmail.com', 0, 1, '0000-00-00', '0000-00-00', b'1', '0000-00-00', 0, 0, 9, 3, 40, '', NULL, NULL),
	(5, '123123', '<script>alert(\'hola\')</script>', 'asdfadsf', 1, '0000-00-00', 0, 0, 234234, 'asdf', '', 0, 'adfadsf', 0, 1, '0000-00-00', '0000-00-00', b'1', '0000-00-00', 0, 0, 0, 0, 41, '', NULL, NULL);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;


-- Dumping structure for table dcs.empresa
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_razonSocial` varchar(100) DEFAULT NULL,
  `emp_nit` varchar(15) DEFAULT NULL,
  `emp_direccion` varchar(100) DEFAULT NULL,
  `ciu_id` int(11) DEFAULT NULL,
  `tam_id` varchar(11) DEFAULT NULL,
  `numEmp_id` int(11) DEFAULT NULL,
  `actEco_id` int(11) DEFAULT NULL,
  `Dim_id` int(11) DEFAULT NULL,
  `Dimdos_id` int(11) DEFAULT NULL,
  `emp_representante` varchar(100) DEFAULT NULL,
  `emp_logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.empresa: ~1 rows (approximately)
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` (`emp_id`, `emp_razonSocial`, `emp_nit`, `emp_direccion`, `ciu_id`, `tam_id`, `numEmp_id`, `actEco_id`, `Dim_id`, `Dimdos_id`, `emp_representante`, `emp_logo`) VALUES
	(2, 'nygsoft s.a.s', '1234567', 'calle 60', 0, 'MI', 3, 12, 9, 4, 'xyz', NULL);
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;


-- Dumping structure for table dcs.equipos
DROP TABLE IF EXISTS `equipos`;
CREATE TABLE IF NOT EXISTS `equipos` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `serial` varchar(100) DEFAULT NULL,
  `fabricante` varchar(255) DEFAULT NULL,
  `fecha_fabricacion` datetime DEFAULT NULL,
  `tipo_equipo_cod` int(11) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `responsable` varchar(255) DEFAULT NULL,
  `observaciones` text,
  `activo` varchar(1) DEFAULT 'S',
  `fecha_ultima_calibracion` datetime DEFAULT NULL,
  `empresa_certificadora` text,
  `adjuntar_certificado` varchar(255) DEFAULT NULL,
  `examen_cod` int(11) DEFAULT NULL,
  `variable_codigo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.equipos: ~12 rows (approximately)
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
INSERT INTO `equipos` (`id_equipo`, `descripcion`, `fecha_creacion`, `estado`, `ubicacion`, `serial`, `fabricante`, `fecha_fabricacion`, `tipo_equipo_cod`, `imagen`, `responsable`, `observaciones`, `activo`, `fecha_ultima_calibracion`, `empresa_certificadora`, `adjuntar_certificado`, `examen_cod`, `variable_codigo`) VALUES
	(1, '123', NULL, 'DISPONIBLE', '123', '123', '', '0000-00-00 00:00:00', 1, '', 'nelson', '', 'N', '0000-00-00 00:00:00', '', '', 4, 3),
	(2, 'sdf', NULL, 'Activo', 'sdfs', '324', '', '0000-00-00 00:00:00', 3, 'escudo-1.jpg', '', '', 'N', '0000-00-00 00:00:00', '', '', 0, 0),
	(3, 'nelson', NULL, 'DISPONIBLE', 'hhhh', '777', '6666', '2015-09-14 00:00:00', 3, '', '', '', 'N', '0000-00-00 00:00:00', '', '', 4, 3),
	(4, 'medidor de signos vitales 2', NULL, 'DISPONIBLE', 'almacen', '7798098089', '', '2015-09-23 00:00:00', 7, 'DCD.png', '', '', 'S', '0000-00-00 00:00:00', '', '', 7, 3),
	(5, 'df', NULL, 'DISPONIBLE', 'dfs', '23', '', '0000-00-00 00:00:00', 1, '0.jpg', '', '', 'N', '0000-00-00 00:00:00', '', 'escudo-1.jpg', 4, 0),
	(6, 'Tensiometro', NULL, 'DISPONIBLE', 'almacén', '3633920272', 'CISCO', '2015-05-01 00:00:00', 8, 'tensiometro.jpg', '', 'dlfkhdkgdkgfnbfjblkhfkjblfdlbfbfdlnldmn', 'S', '2015-01-01 00:00:00', '', '', 7, 4),
	(7, NULL, NULL, 'DISPONIBLE', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'S', NULL, NULL, '', NULL, NULL),
	(8, '123', NULL, 'DISPONIBLE', '123', '123', '123', '2015-09-16 00:00:00', 7, '', '123', '123', 'S', '0000-00-00 00:00:00', '', '', 8, NULL),
	(9, '2344', NULL, 'DISPONIBLE', '243', '234', '234', '0000-00-00 00:00:00', 7, '', '', '', 'S', '0000-00-00 00:00:00', '', '', 8, NULL),
	(10, '123', NULL, 'DISPONIBLE', '123', '123', '123', '2015-09-01 00:00:00', 8, NULL, '', '', 'S', '0000-00-00 00:00:00', '', NULL, 8, NULL),
	(11, '123', NULL, 'DISPONIBLE', '123', '123', '123', '2015-09-01 00:00:00', 8, NULL, '', '', 'S', '0000-00-00 00:00:00', '', NULL, 8, NULL),
	(12, '123', NULL, 'DISPONIBLE', '123', '123', '123', '2015-09-01 00:00:00', 8, NULL, '', '', 'S', '0000-00-00 00:00:00', '', NULL, 8, NULL);
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;


-- Dumping structure for table dcs.equipo_examen_variable
DROP TABLE IF EXISTS `equipo_examen_variable`;
CREATE TABLE IF NOT EXISTS `equipo_examen_variable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `examen_cod` int(11) DEFAULT '0',
  `variable_codigo` int(11) DEFAULT '0',
  `id_equipo` int(11) DEFAULT '0',
  `estado` varchar(100) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.equipo_examen_variable: ~12 rows (approximately)
/*!40000 ALTER TABLE `equipo_examen_variable` DISABLE KEYS */;
INSERT INTO `equipo_examen_variable` (`id`, `examen_cod`, `variable_codigo`, `id_equipo`, `estado`) VALUES
	(1, 7, 3, 11, 'EN TRANSITO'),
	(2, 7, 4, 11, 'ASIGNADO'),
	(3, 7, 5, 11, 'DISPONIBLE'),
	(4, 8, 3, 11, 'EN TRANSITO'),
	(5, 8, 6, 11, 'MANTENIMIENTO'),
	(6, 8, 3, 11, 'EN OPERACIÓN'),
	(7, 7, 3, 12, 'EN TRANSITO'),
	(8, 7, 4, 12, 'ASIGNADO'),
	(9, 7, 5, 12, 'DISPONIBLE'),
	(10, 8, 3, 12, 'EN TRANSITO'),
	(11, 8, 6, 12, 'MANTENIMIENTO'),
	(12, 8, 3, 12, 'EN OPERACIÓN');
/*!40000 ALTER TABLE `equipo_examen_variable` ENABLE KEYS */;


-- Dumping structure for table dcs.estados
DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `est_id` int(11) NOT NULL DEFAULT '0',
  `est_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`est_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.estados: ~3 rows (approximately)
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` (`est_id`, `est_nombre`) VALUES
	(1, 'Activo'),
	(2, 'Inactivo'),
	(3, 'Eliminado');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;


-- Dumping structure for table dcs.estado_civil
DROP TABLE IF EXISTS `estado_civil`;
CREATE TABLE IF NOT EXISTS `estado_civil` (
  `EstCiv_id` int(11) NOT NULL AUTO_INCREMENT,
  `EstCiv_Estado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`EstCiv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.estado_civil: ~0 rows (approximately)
/*!40000 ALTER TABLE `estado_civil` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado_civil` ENABLE KEYS */;


-- Dumping structure for table dcs.examenes
DROP TABLE IF EXISTS `examenes`;
CREATE TABLE IF NOT EXISTS `examenes` (
  `examen_cod` int(11) NOT NULL AUTO_INCREMENT,
  `examen_nombre` varchar(255) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `examen_fecha_creacion` timestamp NULL DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`examen_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.examenes: ~8 rows (approximately)
/*!40000 ALTER TABLE `examenes` DISABLE KEYS */;
INSERT INTO `examenes` (`examen_cod`, `examen_nombre`, `estado`, `examen_fecha_creacion`, `activo`) VALUES
	(1, 'prueba1', NULL, NULL, NULL),
	(2, 'prueba1', NULL, NULL, NULL),
	(3, 'prueba', NULL, NULL, NULL),
	(4, 'prueba', 'Inactivo', NULL, 'N'),
	(5, 'prueba2', NULL, NULL, 'N'),
	(6, 'ya :)dd', NULL, NULL, 'N'),
	(7, 'Tensión arterial', 'Activo', NULL, 'S'),
	(8, 'Espirometría', 'Activo', NULL, 'S');
/*!40000 ALTER TABLE `examenes` ENABLE KEYS */;


-- Dumping structure for table dcs.genero
DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `gen_genero` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`gen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.genero: ~2 rows (approximately)
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` (`gen_id`, `gen_genero`) VALUES
	(1, 'Masculino'),
	(2, 'Femenino');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;


-- Dumping structure for table dcs.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.groups: ~2 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `nombre`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'members', 'General User');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table dcs.hospitales
DROP TABLE IF EXISTS `hospitales`;
CREATE TABLE IF NOT EXISTS `hospitales` (
  `codigo_hospital` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono_fijo` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`codigo_hospital`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.hospitales: ~5 rows (approximately)
/*!40000 ALTER TABLE `hospitales` DISABLE KEYS */;
INSERT INTO `hospitales` (`codigo_hospital`, `nombre`, `estado`, `fecha_creacion`, `direccion`, `telefono_fijo`, `celular`, `email`, `activo`) VALUES
	(1, 'sdf', NULL, NULL, 'sdf', '234', '324', 'dsf', 'N'),
	(2, 'NELSON BARBOSA', 'Activo', NULL, 'CL 60 B 18 D 36 SUR', '4', '345435', 'ff@hh', 'N'),
	(3, 'dsf', 'Inactivo', NULL, '234', '234', '234', '', 'N'),
	(4, 'Hospital San Rafael', 'Activo', NULL, 'calle 116 # 89-56 ', '78767898', '320876899', 'gg@hotmail.com', 'S'),
	(5, 'Hospital San Ignacio', 'Activo', NULL, 'calle 76 36 - 67', '3445678', '', 'atencionalusuario@gmail.com', 'S');
/*!40000 ALTER TABLE `hospitales` ENABLE KEYS */;


-- Dumping structure for table dcs.ingreso
DROP TABLE IF EXISTS `ingreso`;
CREATE TABLE IF NOT EXISTS `ingreso` (
  `ing_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_id` int(11) NOT NULL,
  `ing_fechaIngreso` datetime NOT NULL,
  PRIMARY KEY (`ing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.ingreso: ~89 rows (approximately)
/*!40000 ALTER TABLE `ingreso` DISABLE KEYS */;
INSERT INTO `ingreso` (`ing_id`, `usu_id`, `ing_fechaIngreso`) VALUES
	(1, 1, '2015-08-23 08:24:56'),
	(2, 1, '2015-08-23 08:25:59'),
	(3, 1, '2015-08-23 08:26:09'),
	(4, 1, '2015-08-23 08:26:55'),
	(5, 1, '2015-08-23 08:32:15'),
	(6, 1, '2015-08-23 18:12:20'),
	(7, 1, '2015-08-23 18:26:53'),
	(8, 1, '2015-08-23 20:33:35'),
	(9, 1, '2015-08-25 05:34:50'),
	(10, 1, '2015-08-25 20:10:45'),
	(11, 1, '2015-08-25 20:19:24'),
	(12, 1, '2015-08-25 20:28:17'),
	(13, 1, '2015-08-25 21:31:45'),
	(14, 1, '2015-08-25 21:51:27'),
	(15, 1, '2015-08-25 22:09:32'),
	(16, 1, '2015-08-25 22:22:31'),
	(17, 1, '2015-08-25 22:43:32'),
	(18, 1, '2015-08-25 22:50:13'),
	(19, 1, '2015-08-25 23:45:54'),
	(20, 1, '2015-08-26 00:07:16'),
	(21, 1, '2015-08-26 02:56:11'),
	(22, 1, '2015-08-28 00:44:26'),
	(23, 1, '2015-08-28 03:21:15'),
	(24, 1, '2015-08-30 00:52:05'),
	(25, 1, '2015-08-30 18:20:49'),
	(26, 1, '2015-09-01 02:34:52'),
	(27, 1, '2015-09-03 05:33:23'),
	(28, 1, '2015-09-03 13:44:27'),
	(29, 1, '2015-09-03 14:13:29'),
	(30, 1, '2015-09-03 14:24:58'),
	(31, 6, '2015-09-03 14:26:21'),
	(32, 6, '2015-09-03 16:11:34'),
	(33, 1, '2015-09-03 16:11:52'),
	(34, 1, '2015-09-03 16:14:43'),
	(35, 6, '2015-09-03 16:17:21'),
	(36, 1, '2015-09-03 16:18:57'),
	(37, 6, '2015-09-03 16:28:11'),
	(38, 1, '2015-09-03 16:28:27'),
	(39, 6, '2015-09-03 16:29:10'),
	(40, 6, '2015-09-03 17:00:07'),
	(41, 6, '2015-09-03 17:00:35'),
	(42, 6, '2015-09-03 17:02:03'),
	(43, 6, '2015-09-03 17:33:08'),
	(44, 1, '2015-09-03 17:33:18'),
	(45, 6, '2015-09-03 17:36:57'),
	(46, 1, '2015-09-03 18:28:27'),
	(47, 6, '2015-09-03 18:32:37'),
	(48, 6, '2015-09-03 21:41:14'),
	(49, 6, '2015-09-04 01:24:17'),
	(50, 6, '2015-09-04 01:33:16'),
	(51, 6, '2015-09-04 15:36:14'),
	(52, 6, '2015-09-04 17:04:36'),
	(53, 1, '2015-09-04 17:18:50'),
	(54, 6, '2015-09-04 17:48:48'),
	(55, 1, '2015-09-04 17:49:48'),
	(56, 6, '2015-09-04 17:52:06'),
	(57, 6, '2015-09-04 17:53:03'),
	(58, 1, '2015-09-04 17:53:33'),
	(59, 6, '2015-09-04 17:55:00'),
	(60, 6, '2015-09-04 18:48:44'),
	(61, 1, '2015-09-04 19:17:26'),
	(62, 6, '2015-09-04 19:17:50'),
	(63, 1, '2015-09-04 19:18:04'),
	(64, 6, '2015-09-04 19:21:28'),
	(65, 6, '2015-09-07 16:55:54'),
	(66, 6, '2015-09-07 18:40:36'),
	(67, 1, '2015-09-07 19:09:47'),
	(68, 6, '2015-09-07 19:10:10'),
	(69, 6, '2015-09-07 19:12:31'),
	(70, 6, '2015-09-07 19:21:47'),
	(71, 6, '2015-09-07 19:51:47'),
	(72, 6, '2015-09-07 20:01:31'),
	(73, 1, '2015-09-07 20:05:58'),
	(74, 6, '2015-09-07 20:13:02'),
	(75, 6, '2015-09-08 02:23:45'),
	(76, 6, '2015-09-08 02:45:31'),
	(77, 6, '2015-09-08 02:50:01'),
	(78, 6, '2015-09-08 03:36:59'),
	(79, 6, '2015-09-08 03:41:25'),
	(80, 6, '2015-09-09 20:32:03'),
	(81, 6, '2015-09-09 20:42:49'),
	(82, 6, '2015-09-09 21:18:29'),
	(83, 6, '2015-09-09 21:36:20'),
	(84, 1, '2015-09-09 21:54:52'),
	(85, 1, '2015-09-09 21:59:27'),
	(86, 1, '2015-09-09 22:22:31'),
	(87, 1, '2015-09-09 22:39:52'),
	(88, 1, '2015-09-09 22:39:52'),
	(89, 1, '2015-09-09 23:24:22');
/*!40000 ALTER TABLE `ingreso` ENABLE KEYS */;


-- Dumping structure for table dcs.inicio
DROP TABLE IF EXISTS `inicio`;
CREATE TABLE IF NOT EXISTS `inicio` (
  `ini_id` int(11) NOT NULL AUTO_INCREMENT,
  `ini_politicas` longblob,
  `ini_p_inicio` longblob,
  PRIMARY KEY (`ini_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.inicio: ~1 rows (approximately)
/*!40000 ALTER TABLE `inicio` DISABLE KEYS */;
INSERT INTO `inicio` (`ini_id`, `ini_politicas`, `ini_p_inicio`) VALUES
	(1, _binary 0x50656E6469656E7465, _binary 0x50656E6469656E7465);
/*!40000 ALTER TABLE `inicio` ENABLE KEYS */;


-- Dumping structure for table dcs.login_attempts
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.login_attempts: ~0 rows (approximately)
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;


-- Dumping structure for table dcs.medicos
DROP TABLE IF EXISTS `medicos`;
CREATE TABLE IF NOT EXISTS `medicos` (
  `medico_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `matricula_profesional` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono_fijo` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`medico_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.medicos: ~7 rows (approximately)
/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` (`medico_codigo`, `nombre`, `fecha_creacion`, `Estado`, `matricula_profesional`, `direccion`, `telefono_fijo`, `celular`, `email`, `activo`) VALUES
	(1, 'NELSON', NULL, NULL, '123', '123', '123', '123', '123@cc.com', 'N'),
	(2, 'ne', NULL, NULL, '121d', '123', '123', '123', '123@hh.com', 'N'),
	(3, 'fdg', NULL, 'Activo', '324', 'dfg', '34', '', '', 'N'),
	(4, '123', NULL, 'Activo', '123', '123', '1123', '', '', 'N'),
	(5, 'nelson', NULL, 'Activo', '1233123123', 'ddd', '234', '', '', 'N'),
	(6, 'Juan Pablo angel', NULL, 'Activo', '172873333443KJL', 'calle 97 # 45-68', '89789090', '', '', 'S'),
	(7, 'Alexander Camargo', NULL, 'Activo', '172873333443KJL', 'calle 76 36 - 67', '98732937983', '', '', 'S');
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;


-- Dumping structure for table dcs.modulo
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE IF NOT EXISTS `modulo` (
  `menu_id` int(5) NOT NULL AUTO_INCREMENT,
  `menu_idpadre` int(5) NOT NULL,
  `menu_nombrepadre` varchar(50) NOT NULL,
  `menu_idhijo` int(5) NOT NULL,
  `menu_controlador` varchar(100) DEFAULT NULL,
  `menu_accion` varchar(100) DEFAULT NULL,
  `menu_estado` int(1) DEFAULT '1' COMMENT 'se le coloca un estado 1 porque esta activo',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.modulo: ~61 rows (approximately)
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` (`menu_id`, `menu_idpadre`, `menu_nombrepadre`, `menu_idhijo`, `menu_controlador`, `menu_accion`, `menu_estado`) VALUES
	(61, 0, 'MENUS', 61, '', '', 1),
	(64, 61, 'MENU', 0, 'presentacion', 'creacionmenu', 1),
	(65, 61, 'ROLES', 0, 'presentacion', 'roles', 1),
	(66, 61, 'ROL USUARIO', 66, 'presentacion', 'usuario', 1),
	(71, 0, 'REPORTES', 71, NULL, NULL, 1),
	(72, 71, 'CREACIÓN DE REPORTES', 0, 'reportes', 'creacionreporte', 1),
	(73, 71, 'VISUALIZACION DE REPORTES', 0, 'reportes', 'informacionreporte', 1),
	(74, 0, 'ORGANIZACIÓN', 74, NULL, NULL, 1),
	(80, 74, 'EMPLEADOS', 0, 'administrativo', 'creacionempleados', 1),
	(81, 74, 'LISTA EMPLEADOS', 0, 'administrativo', 'listadoempleados', 1),
	(82, 74, 'CARGOS', 0, 'administrativo', 'cargos', 1),
	(83, 74, 'USUARIOS', 0, 'administrativo', 'creacionusuarios', 1),
	(84, 74, 'LISTA USUARIOS', 0, 'administrativo', 'listadousuarios', 1),
	(85, 74, 'DIMENSION 1', 0, 'administrativo', 'dimension', 1),
	(86, 74, 'DIMENSIÓN 2', 0, 'administrativo', 'dimension', 1),
	(87, 74, 'INFORMES', 0, NULL, NULL, 1),
	(88, 0, 'PROYECTO', 88, NULL, NULL, 1),
	(89, 0, 'ConfiguraciÓn', 89, '', '', 1),
	(90, 0, 'DCS', 0, '', '', 1),
	(91, 89, 'Hospitales', 91, NULL, NULL, 1),
	(92, 89, 'Contactos', 92, 'Contacto', 'index', 1),
	(93, 89, 'Aseguradoras', 93, NULL, NULL, 1),
	(94, 89, 'Medicos', 94, NULL, NULL, 1),
	(95, 89, 'Variables', 95, NULL, NULL, 1),
	(96, 89, 'ExÁmenes', 96, '', '', 1),
	(97, 89, 'Tipo de Equipos', 97, NULL, NULL, 1),
	(98, 89, 'Equipos', 98, NULL, NULL, 1),
	(99, 89, 'Tipo de Clientes', 99, NULL, NULL, 1),
	(100, 89, 'Clientes', 100, NULL, NULL, 1),
	(101, 91, 'Nuevo', 0, 'Hospitales', 'Index', 1),
	(102, 91, 'Listado', 0, 'Hospitales', 'consult_hospitales', 1),
	(103, 92, 'Nuevo', 0, 'Contacto', 'index', 1),
	(104, 92, 'Listado', 0, 'Contacto', 'consult_contacto', 1),
	(105, 93, 'Nuevo', 0, 'Aseguradoras', 'index', 1),
	(106, 93, 'Listado', 0, 'Aseguradoras', 'consult_aseguradoras', 1),
	(107, 94, 'Nuevo', 0, 'Medicos', 'index', 1),
	(108, 94, 'Listado', 0, 'Medicos', 'consult_medicos', 1),
	(109, 95, 'Nuevo', 0, 'Variables', 'index', 1),
	(110, 95, 'Listado', 0, 'Variables', 'consult_variables', 1),
	(111, 96, 'Nuevo', 0, 'Examenes', 'index', 1),
	(112, 96, 'Listado', 0, 'Examenes', 'consult_examenes', 1),
	(113, 97, 'Nuevo', 0, 'Tipo_equipo', 'index', 1),
	(114, 97, 'Listado', 0, 'Tipo_equipo', 'consult_tipo_equipo', 1),
	(115, 99, 'Nuevo', 0, 'Tipo_cliente', 'index', 1),
	(116, 99, 'Listado', 0, 'Tipo_cliente', 'consult_tipo_cliente', 1),
	(117, 100, 'Nuevo', 0, 'Clientes', 'index', 1),
	(118, 100, 'Listado', 0, 'Clientes', 'consult_clientes', 1),
	(119, 89, 'Tipo de alarmas', 119, NULL, NULL, 1),
	(120, 89, 'Niveles de alarma', 120, NULL, NULL, 1),
	(121, 89, 'Protocolos', 121, NULL, NULL, 1),
	(122, 119, 'Nuevo', 0, 'Tipo_alarma', 'index', 1),
	(123, 119, 'Listado', 0, 'Tipo_alarma', 'consult_tipo_alarma', 1),
	(124, 120, 'Nuevo', 0, 'Niveles_alarma', 'index', 1),
	(125, 120, 'Listado', 0, 'Niveles_alarma', 'consult_niveles_alarma', 1),
	(126, 121, 'Nuevo', 0, 'Protocolos', 'index', 1),
	(127, 121, 'Listado', 0, 'Protocolos', 'consult_protocolos', 1),
	(128, 98, 'Nuevo', 0, 'Equipos', 'index', 1),
	(129, 98, 'Listado', 0, 'Equipos', 'consult_equipos', 1),
	(130, 89, 'Pacientes', 130, NULL, NULL, 1),
	(131, 130, 'Nuevo', 0, 'Pacientes', 'index', 1),
	(132, 130, 'Listado', 0, 'Pacientes', 'consult_pacientes', 1);
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;


-- Dumping structure for table dcs.niveles_alarma
DROP TABLE IF EXISTS `niveles_alarma`;
CREATE TABLE IF NOT EXISTS `niveles_alarma` (
  `id_niveles_alarma` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `fecha_creacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `examen_cod` int(11) DEFAULT NULL,
  `analisis_resultado` varchar(50) DEFAULT NULL,
  `n_repeticiones_minimas` varchar(100) DEFAULT NULL,
  `n_repeticiones_maximas` varchar(100) DEFAULT NULL,
  `tiempo` varchar(100) DEFAULT NULL,
  `frecuencia` varchar(50) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `id_protocolo` int(11) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`id_niveles_alarma`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.niveles_alarma: ~5 rows (approximately)
/*!40000 ALTER TABLE `niveles_alarma` DISABLE KEYS */;
INSERT INTO `niveles_alarma` (`id_niveles_alarma`, `descripcion`, `fecha_creacion`, `examen_cod`, `analisis_resultado`, `n_repeticiones_minimas`, `n_repeticiones_maximas`, `tiempo`, `frecuencia`, `color`, `id_protocolo`, `activo`) VALUES
	(1, 'nelson niveles alarma', '2015-09-07 19:59:01', 4, 'asd', '213', '213', '213', 'Día', '1112', 1, 'N'),
	(2, 'Nivel 1 tensión arterial alta', '2015-09-07 19:59:07', 7, '', '2', '4', '2', 'Semana', 'amarillo', 3, 'N'),
	(3, 'ss', '2015-09-07 19:58:53', 4, 'Baja', '22', '33', '22', 'Semana', '33', 1, 'N'),
	(4, 'Nivel 2 tensión arterial alta', NULL, 7, 'Alta', '3', '5', '7', 'Semana', 'naranja', 3, 'S'),
	(5, 'Nivel 1 tensión arterial alta', '2015-09-07 20:03:21', 7, 'Alta', '2', '3', '1', 'Semana', 'amarillo', 4, 'S');
/*!40000 ALTER TABLE `niveles_alarma` ENABLE KEYS */;


-- Dumping structure for table dcs.numero_empleados
DROP TABLE IF EXISTS `numero_empleados`;
CREATE TABLE IF NOT EXISTS `numero_empleados` (
  `numEmp_id` int(11) NOT NULL AUTO_INCREMENT,
  `numEmp_descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`numEmp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.numero_empleados: ~4 rows (approximately)
/*!40000 ALTER TABLE `numero_empleados` DISABLE KEYS */;
INSERT INTO `numero_empleados` (`numEmp_id`, `numEmp_descripcion`) VALUES
	(1, 'Hasta 10 trabajadores'),
	(2, 'De 11 a 50 trabajadores'),
	(3, 'De 51 a 200 trabajadores'),
	(4, 'De 201 o más trabajadores');
/*!40000 ALTER TABLE `numero_empleados` ENABLE KEYS */;


-- Dumping structure for table dcs.pacientes
DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id_paciente` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_paciente` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `fecha_afiliacion` date DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `barrio` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `estatura` varchar(255) DEFAULT NULL,
  `peso` varchar(255) DEFAULT NULL,
  `telefono_fijo` varchar(255) DEFAULT NULL,
  `celular` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fecha_inicio_contrato` date DEFAULT NULL,
  `fecha_fin_contrato` date DEFAULT NULL,
  `tipo_cliente` int(11) DEFAULT NULL,
  `cliente` int(11) DEFAULT NULL,
  `medico` int(11) DEFAULT NULL,
  `observaciones` text,
  `activo` varchar(1) DEFAULT 'S',
  `examen_cod` int(11) DEFAULT NULL,
  `hl7tag` varchar(255) DEFAULT NULL,
  `variable_codigo` int(11) DEFAULT NULL,
  `valor_frecuencia` varchar(255) DEFAULT NULL,
  `frecuencia` varchar(255) DEFAULT NULL,
  `valor_minimo` varchar(255) DEFAULT NULL,
  `valor_maximo` varchar(255) DEFAULT NULL,
  `observaciones_programas` text,
  `contacto_id` int(11) DEFAULT NULL,
  `tipo_equipo_cod` int(11) DEFAULT NULL,
  `descripcion` int(11) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `prioridad` varchar(255) DEFAULT NULL,
  `codigo_hospital` int(11) DEFAULT NULL,
  `tipo` varchar(55) DEFAULT NULL,
  `aseguradora_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.pacientes: ~6 rows (approximately)
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` (`id_paciente`, `cedula_paciente`, `nombres`, `apellidos`, `fecha_afiliacion`, `foto`, `direccion`, `barrio`, `ciudad`, `fecha_nacimiento`, `estatura`, `peso`, `telefono_fijo`, `celular`, `email`, `fecha_inicio_contrato`, `fecha_fin_contrato`, `tipo_cliente`, `cliente`, `medico`, `observaciones`, `activo`, `examen_cod`, `hl7tag`, `variable_codigo`, `valor_frecuencia`, `frecuencia`, `valor_minimo`, `valor_maximo`, `observaciones_programas`, `contacto_id`, `tipo_equipo_cod`, `descripcion`, `estado`, `prioridad`, `codigo_hospital`, `tipo`, `aseguradora_id`) VALUES
	(1, '123', '123', '123', '0000-00-00', '', '123', '123', '123', '2012-01-11', '12', '12', '234', '', '', '2015-01-12', '2015-01-12', 3, 2, 0, '', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, '20617881', 'Ana maría', 'Beltrán', '2015-08-01', 'abuelita.jpg', 'calle 76 36 - 67', 'Cedritos', 'bogota', '1975-06-01', '1.65', '60', '56789654', '', '', '2006-09-01', '2016-09-30', 8, 12, 7, 'xbvnb', 'S', 8, 'VEF1', 4, 'Día', '1', '20', '30', 'afdgfdjhjjklhjlññkñ', 6, 8, 6, 'Activo', '1', 5, 'prepagada', 6),
	(3, '234', '234', '234234', '2015-09-23', '', '123', '123', '123', '0000-00-00', '123', '22', '123', '123', '', '2015-09-02', '2015-09-02', 6, 4, 7, '123', 'S', 8, '22', NULL, NULL, NULL, NULL, NULL, '22', 6, 7, 9, 'Activo', '3', 4, '2', 6),
	(4, '234', '234', '234234', '2015-09-23', NULL, '123', '123', '123', '0000-00-00', '123', '22', '123', '123', '', '2015-09-02', '2015-09-02', 6, 4, 7, '123', 'S', 8, '22', NULL, NULL, NULL, NULL, NULL, '22', 6, 7, 9, 'Activo', '3', 4, '2', 6),
	(5, '234', '234', '234234', '2015-09-23', NULL, '123', '123', '123', '0000-00-00', '123', '22', '123', '123', '', '2015-09-02', '2015-09-02', 6, 4, 7, '123', 'S', 8, '22', NULL, NULL, NULL, NULL, NULL, '22', 6, 7, 9, 'Activo', '3', 4, '2', 6),
	(6, '234', '234', '234234', '2015-09-23', NULL, '123', '123', '123', '0000-00-00', '123', '22', '123', '123', '', '2015-09-02', '2015-09-02', 6, 4, 7, '123', 'S', 8, '22', NULL, NULL, NULL, NULL, NULL, '22', 6, 7, 9, 'Activo', '3', 4, '2', 6);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;


-- Dumping structure for table dcs.paciente_contacto
DROP TABLE IF EXISTS `paciente_contacto`;
CREATE TABLE IF NOT EXISTS `paciente_contacto` (
  `id_paciente_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `contacto_id` int(11) NOT NULL DEFAULT '0',
  `id_paciente` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_paciente_contacto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.paciente_contacto: ~0 rows (approximately)
/*!40000 ALTER TABLE `paciente_contacto` DISABLE KEYS */;
/*!40000 ALTER TABLE `paciente_contacto` ENABLE KEYS */;


-- Dumping structure for table dcs.paciente_examen_variable
DROP TABLE IF EXISTS `paciente_examen_variable`;
CREATE TABLE IF NOT EXISTS `paciente_examen_variable` (
  `id_paciente_examen_variable` int(11) NOT NULL AUTO_INCREMENT,
  `examen_cod` int(11) NOT NULL DEFAULT '0',
  `variable_codigo` int(11) NOT NULL DEFAULT '0',
  `valor_frecuencia` varchar(50) NOT NULL DEFAULT '0',
  `id_paciente` int(11) NOT NULL DEFAULT '0',
  `frecuencia` varchar(50) NOT NULL DEFAULT '0',
  `valor_minimo` varchar(50) NOT NULL DEFAULT '0',
  `valor_maximo` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_paciente_examen_variable`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.paciente_examen_variable: ~14 rows (approximately)
/*!40000 ALTER TABLE `paciente_examen_variable` DISABLE KEYS */;
INSERT INTO `paciente_examen_variable` (`id_paciente_examen_variable`, `examen_cod`, `variable_codigo`, `valor_frecuencia`, `id_paciente`, `frecuencia`, `valor_minimo`, `valor_maximo`) VALUES
	(1, 7, 3, 'Hora', 4, '11', '22', '33'),
	(2, 7, 4, 'Semana', 4, '22', '33', '11'),
	(3, 8, 4, 'Semana', 4, '33', '11', '22'),
	(4, 8, 5, 'Mes', 4, '11', '33', '22'),
	(5, 8, 6, 'Semana', 4, '33', '22', '11'),
	(6, 7, 3, 'Hora', 5, '11', '22', '33'),
	(7, 7, 4, 'Semana', 5, '22', '33', '11'),
	(8, 8, 4, 'Semana', 5, '33', '11', '22'),
	(9, 8, 5, 'Mes', 5, '11', '33', '22'),
	(10, 8, 6, 'Semana', 5, '33', '22', '11'),
	(16, 7, 3, 'S', 6, 'Hora', '22', '33'),
	(17, 8, 4, 'e', 6, 'Semana', '11', '22'),
	(18, 8, 5, 'm', 6, 'Mes', '33', '22'),
	(19, 8, 6, 'a', 6, 'Semana', '22', '11');
/*!40000 ALTER TABLE `paciente_examen_variable` ENABLE KEYS */;


-- Dumping structure for table dcs.pais
DROP TABLE IF EXISTS `pais`;
CREATE TABLE IF NOT EXISTS `pais` (
  `pai_id` int(11) NOT NULL AUTO_INCREMENT,
  `pai_nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.pais: ~13 rows (approximately)
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` (`pai_id`, `pai_nombre`) VALUES
	(1, 'Colombia'),
	(2, 'Venezuela'),
	(3, 'Brazil'),
	(4, 'CHILE'),
	(5, 'dos'),
	(6, NULL),
	(7, 'dos'),
	(8, NULL),
	(9, 'tres'),
	(10, 'gerson'),
	(11, 'papa'),
	(12, 'papamama'),
	(13, 'PEpe');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;


-- Dumping structure for table dcs.permisos
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1190 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.permisos: ~2 rows (approximately)
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` (`per_id`, `usu_id`, `menu_id`, `rol_id`) VALUES
	(1123, 1, 61, 51),
	(1189, 6, NULL, 62);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;


-- Dumping structure for table dcs.permisos_rol
DROP TABLE IF EXISTS `permisos_rol`;
CREATE TABLE IF NOT EXISTS `permisos_rol` (
  `perRol_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`perRol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1025 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.permisos_rol: ~150 rows (approximately)
/*!40000 ALTER TABLE `permisos_rol` DISABLE KEYS */;
INSERT INTO `permisos_rol` (`perRol_id`, `menu_id`, `rol_id`) VALUES
	(19, 1, 37),
	(20, 14, 37),
	(21, 15, 37),
	(22, 1, 38),
	(23, 14, 38),
	(24, 15, 38),
	(25, 2, 38),
	(26, 5, 38),
	(27, 6, 38),
	(28, 7, 38),
	(29, 1, 39),
	(30, 14, 39),
	(31, 9, 40),
	(32, 11, 40),
	(33, 12, 40),
	(34, 13, 40),
	(35, 38, 41),
	(36, 52, 41),
	(37, 53, 41),
	(38, 57, 41),
	(39, 38, 42),
	(40, 52, 42),
	(43, 58, 42),
	(44, 38, 43),
	(45, 52, 43),
	(46, 53, 43),
	(47, 57, 43),
	(48, 58, 43),
	(49, 9, 44),
	(50, 38, 44),
	(79, 9, 49),
	(80, 40, 49),
	(81, 41, 49),
	(82, 42, 49),
	(103, 43, 49),
	(105, 67, 49),
	(451, 38, 45),
	(452, 52, 45),
	(453, 53, 45),
	(454, 57, 45),
	(455, 58, 45),
	(456, 59, 45),
	(457, 60, 45),
	(458, 62, 45),
	(459, 63, 45),
	(460, 68, 45),
	(461, 69, 45),
	(462, 39, 45),
	(463, 44, 45),
	(464, 45, 45),
	(465, 46, 45),
	(466, 47, 45),
	(467, 48, 45),
	(468, 49, 45),
	(469, 50, 45),
	(470, 51, 45),
	(471, 67, 45),
	(472, 76, 45),
	(473, 40, 45),
	(474, 41, 45),
	(475, 42, 45),
	(476, 43, 45),
	(477, 61, 45),
	(478, 64, 45),
	(479, 65, 45),
	(480, 66, 45),
	(481, 71, 45),
	(482, 72, 45),
	(483, 73, 45),
	(605, 74, 56),
	(606, 80, 56),
	(607, 81, 56),
	(608, 82, 56),
	(609, 83, 56),
	(610, 84, 56),
	(611, 85, 56),
	(612, 86, 56),
	(613, 87, 56),
	(614, 61, 51),
	(615, 64, 51),
	(616, 65, 51),
	(617, 66, 51),
	(618, 71, 51),
	(619, 72, 51),
	(620, 73, 51),
	(621, 74, 51),
	(622, 80, 51),
	(623, 81, 51),
	(624, 82, 51),
	(625, 83, 51),
	(626, 84, 51),
	(627, 85, 51),
	(628, 86, 51),
	(629, 87, 51),
	(630, 75, 51),
	(631, 76, 51),
	(632, 77, 51),
	(633, 78, 51),
	(634, 79, 51),
	(834, 61, 60),
	(975, 61, 62),
	(976, 64, 62),
	(977, 65, 62),
	(978, 66, 62),
	(979, 74, 62),
	(980, 83, 62),
	(981, 84, 62),
	(982, 89, 62),
	(983, 91, 62),
	(984, 101, 62),
	(985, 102, 62),
	(986, 92, 62),
	(987, 103, 62),
	(988, 104, 62),
	(989, 93, 62),
	(990, 105, 62),
	(991, 106, 62),
	(992, 94, 62),
	(993, 107, 62),
	(994, 108, 62),
	(995, 95, 62),
	(996, 109, 62),
	(997, 110, 62),
	(998, 96, 62),
	(999, 111, 62),
	(1000, 112, 62),
	(1001, 97, 62),
	(1002, 113, 62),
	(1003, 114, 62),
	(1004, 98, 62),
	(1005, 128, 62),
	(1006, 129, 62),
	(1007, 99, 62),
	(1008, 115, 62),
	(1009, 116, 62),
	(1010, 100, 62),
	(1011, 117, 62),
	(1012, 118, 62),
	(1013, 119, 62),
	(1014, 122, 62),
	(1015, 123, 62),
	(1016, 120, 62),
	(1017, 124, 62),
	(1018, 125, 62),
	(1019, 121, 62),
	(1020, 126, 62),
	(1021, 127, 62),
	(1022, 130, 62),
	(1023, 131, 62),
	(1024, 132, 62);
/*!40000 ALTER TABLE `permisos_rol` ENABLE KEYS */;


-- Dumping structure for table dcs.planes
DROP TABLE IF EXISTS `planes`;
CREATE TABLE IF NOT EXISTS `planes` (
  `pla_id` int(11) NOT NULL AUTO_INCREMENT,
  `est_id` int(11) DEFAULT NULL,
  `pla_nombre` varchar(255) DEFAULT NULL,
  `pla_descripcion` text,
  `pla_fechaInicio` date DEFAULT NULL,
  `pla_fechaFin` date DEFAULT NULL,
  `pla_avanceProgramado` varchar(100) DEFAULT NULL,
  `pla_presupuesto` varchar(100) DEFAULT NULL,
  `pla_avanceReal` varchar(100) DEFAULT NULL,
  `pla_costoReal` varchar(100) DEFAULT NULL,
  `pla_eficiencia` varchar(100) DEFAULT NULL,
  `pla_norma` varchar(100) DEFAULT NULL,
  `pla_responsable` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pla_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.planes: ~4 rows (approximately)
/*!40000 ALTER TABLE `planes` DISABLE KEYS */;
INSERT INTO `planes` (`pla_id`, `est_id`, `pla_nombre`, `pla_descripcion`, `pla_fechaInicio`, `pla_fechaFin`, `pla_avanceProgramado`, `pla_presupuesto`, `pla_avanceReal`, `pla_costoReal`, `pla_eficiencia`, `pla_norma`, `pla_responsable`) VALUES
	(1, 0, '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', ''),
	(2, 0, 'gerson', '', '0000-00-00', '0000-00-00', 'xyz', '123456', 'xyz', '12345', '', '', 'gersonjbr'),
	(3, 0, 'gerson', '', '0000-00-00', '0000-00-00', 'xyz', '123456', 'xyz', '12345', '', '', 'gersonjbr'),
	(4, 0, 'gerson', '', '0000-00-00', '0000-00-00', 'xyz', '123456', 'xyz', '12345', '', '', 'gersonjbr');
/*!40000 ALTER TABLE `planes` ENABLE KEYS */;


-- Dumping structure for table dcs.politicas
DROP TABLE IF EXISTS `politicas`;
CREATE TABLE IF NOT EXISTS `politicas` (
  `pol_id` int(11) NOT NULL AUTO_INCREMENT,
  `pol_politica` blob,
  `emp_id` int(10) NOT NULL,
  PRIMARY KEY (`pol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.politicas: ~2 rows (approximately)
/*!40000 ALTER TABLE `politicas` DISABLE KEYS */;
INSERT INTO `politicas` (`pol_id`, `pol_politica`, `emp_id`) VALUES
	(1, _binary 0x50656E6469656E746573, 1),
	(2, _binary 0x50656E6469656E746573, 134);
/*!40000 ALTER TABLE `politicas` ENABLE KEYS */;


-- Dumping structure for table dcs.protocolos
DROP TABLE IF EXISTS `protocolos`;
CREATE TABLE IF NOT EXISTS `protocolos` (
  `id_protocolo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `version` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `descripcion` text,
  `enviar_sms` varchar(50) DEFAULT NULL,
  `enviar_email` varchar(50) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`id_protocolo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.protocolos: ~4 rows (approximately)
/*!40000 ALTER TABLE `protocolos` DISABLE KEYS */;
INSERT INTO `protocolos` (`id_protocolo`, `nombre`, `fecha_creacion`, `version`, `estado`, `descripcion`, `enviar_sms`, `enviar_email`, `activo`) VALUES
	(1, 'nelson', '2015-09-07 20:00:17', 'njjj', 'Activo', 'sdf', 'NO', 'SI', 'N'),
	(2, 'nelson', '2015-09-07 20:00:20', 'ii', 'Inactivo', 'iikjsdk ahsjkdakshdkahsd', 'SI', 'NO', 'N'),
	(3, 'Nivel 2 tensión arterial alta', NULL, '1.0', 'Activo', 'dhjhsfskjdbnxbv,mxz,nm\r\nojvlxvnc,mbnc,mbmb,mb\r\nxkkvx.,bv.,cnb.c,bCb\r\n.vmxvlsfmvclvlxmvclvcb\r\nxvjkjv-xv_c b-c.b-.cnbcnb.\r\n cvlknccvm{dkvcmm kcbv\r\ncxllcldkkjvñdlv,d]{}', 'SI', 'SI', 'S'),
	(4, 'Nivel 1 Tensión arterial alta ', NULL, '1.0', 'Activo', '1. Llamar al paciente\r\n2. si el paciente tiene la tensión arterial superior a ... se debe...', 'NO', 'SI', 'S');
/*!40000 ALTER TABLE `protocolos` ENABLE KEYS */;


-- Dumping structure for table dcs.prueba
DROP TABLE IF EXISTS `prueba`;
CREATE TABLE IF NOT EXISTS `prueba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` varchar(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id`,`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.prueba: ~11 rows (approximately)
/*!40000 ALTER TABLE `prueba` DISABLE KEYS */;
INSERT INTO `prueba` (`id`, `nombre`, `fecha`, `activo`) VALUES
	(16, NULL, NULL, 'S'),
	(17, NULL, NULL, 'S'),
	(18, 'enviopdfproveedor.php', NULL, 'S'),
	(19, 'Doc1.docx', NULL, 'S'),
	(20, 'Doc1.docx', NULL, 'S'),
	(21, 'Doc1.docx', NULL, 'S'),
	(22, 'Especificaciones funcionalesI(v4.0)-1.pdf', NULL, 'S'),
	(23, 'escudo-1.jpg', NULL, 'S'),
	(24, '0.jpg', NULL, 'S'),
	(25, 'dfgdfg', NULL, 'S'),
	(26, 'dskfjsdlfj', '2015-08-31 10:55:32', 'S');
/*!40000 ALTER TABLE `prueba` ENABLE KEYS */;


-- Dumping structure for table dcs.reporte
DROP TABLE IF EXISTS `reporte`;
CREATE TABLE IF NOT EXISTS `reporte` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_idpadre` int(10) DEFAULT NULL,
  `rep_nombrepadre` varchar(100) DEFAULT NULL,
  `rep_idhijo` int(10) DEFAULT NULL,
  `rep_estado` int(10) DEFAULT '1',
  `rep_query` varchar(5000) DEFAULT NULL,
  `rep_host` varchar(255) DEFAULT NULL,
  `rep_user` varchar(255) DEFAULT NULL,
  `rep_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.reporte: ~12 rows (approximately)
/*!40000 ALTER TABLE `reporte` DISABLE KEYS */;
INSERT INTO `reporte` (`rep_id`, `rep_idpadre`, `rep_nombrepadre`, `rep_idhijo`, `rep_estado`, `rep_query`, `rep_host`, `rep_user`, `rep_password`) VALUES
	(3, 0, 'COMPRAS', 3, NULL, '<query> select * from user</query> \r\n<date> \r\n<creacion>creac</creacion> \r\n<terminacion>term</terminacion> \r\n</date>\r\n<calculate>\r\n<id>udusuario</id>\r\n<active>activacion</active>\r\n</calculate>', 'R1', 'R1', 'R1'),
	(4, 0, 'VENTAS', NULL, 1, NULL, NULL, NULL, NULL),
	(5, 0, 'GERENCIA', NULL, 1, NULL, NULL, NULL, NULL),
	(6, 0, 'SISTEMAS', NULL, 1, NULL, NULL, NULL, NULL),
	(7, 3, 'PROVEEDORES', 7, 1, NULL, NULL, NULL, NULL),
	(8, 3, 'PRECIOS', NULL, 1, NULL, NULL, NULL, NULL),
	(9, 7, 'NOMBRES', NULL, 1, NULL, NULL, NULL, NULL),
	(10, 7, 'PRODUCTOS', NULL, 1, NULL, NULL, NULL, NULL),
	(11, 7, 'R1', NULL, 1, NULL, NULL, NULL, NULL),
	(12, 7, 'R2', NULL, 1, NULL, NULL, NULL, NULL),
	(13, 7, 'R3', NULL, 1, NULL, NULL, NULL, NULL),
	(14, 7, 'R3', NULL, 1, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `reporte` ENABLE KEYS */;


-- Dumping structure for table dcs.reportes
DROP TABLE IF EXISTS `reportes`;
CREATE TABLE IF NOT EXISTS `reportes` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_nombre` varchar(100) NOT NULL,
  `rep_estado` int(10) NOT NULL DEFAULT '1',
  `rep_query` varchar(5000) DEFAULT NULL,
  `rep_host` varchar(255) DEFAULT NULL,
  `rep_user` varchar(255) DEFAULT NULL,
  `rep_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.reportes: ~13 rows (approximately)
/*!40000 ALTER TABLE `reportes` DISABLE KEYS */;
INSERT INTO `reportes` (`rep_id`, `rep_nombre`, `rep_estado`, `rep_query`, `rep_host`, `rep_user`, `rep_password`) VALUES
	(1, 'gerson', 1, '<xml>\r\n</xml>', 'gerson', 'gerson', 'gerson'),
	(2, 'Anderson4', 1, NULL, NULL, NULL, NULL),
	(3, 'gdf', 1, 'sfsdf', 'sfds', 'sdfs', 'sdfsd'),
	(4, 'ANderson6', 1, NULL, NULL, NULL, NULL),
	(5, 'Anderson7', 1, NULL, NULL, NULL, NULL),
	(6, 'HolaMundo', 1, NULL, NULL, NULL, NULL),
	(7, 'HolaMundo2', 1, NULL, NULL, NULL, NULL),
	(8, '11111111', 1, NULL, NULL, NULL, NULL),
	(9, 'Gerson', 1, NULL, NULL, NULL, NULL),
	(10, 'SI ^^', 1, NULL, NULL, NULL, NULL),
	(11, 'Otro Coso', 1, NULL, NULL, NULL, NULL),
	(12, '^^', 1, NULL, NULL, NULL, NULL),
	(13, '', 1, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `reportes` ENABLE KEYS */;


-- Dumping structure for table dcs.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(255) DEFAULT NULL,
  `rol_estado` int(5) DEFAULT '1',
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.roles: ~6 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`rol_id`, `rol_nombre`, `rol_estado`) VALUES
	(45, 'ADMINISTRADOR', 1),
	(49, 'USUARIO', 1),
	(51, 'ADMIN', 1),
	(56, 'BASC', 1),
	(60, 'co', 1),
	(62, 'dds', 1);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;


-- Dumping structure for table dcs.session
DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `SESSION_ID` int(10) NOT NULL AUTO_INCREMENT,
  `USUARIO_ID` int(10) DEFAULT NULL,
  `SESSION_IP` varchar(20) DEFAULT NULL,
  `SESSION_ACTIVA` int(20) DEFAULT NULL,
  PRIMARY KEY (`SESSION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.session: ~0 rows (approximately)
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
/*!40000 ALTER TABLE `session` ENABLE KEYS */;


-- Dumping structure for table dcs.sexo
DROP TABLE IF EXISTS `sexo`;
CREATE TABLE IF NOT EXISTS `sexo` (
  `Sex_id` int(11) NOT NULL AUTO_INCREMENT,
  `Sex_Sexo` varchar(100) NOT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`Sex_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.sexo: ~2 rows (approximately)
/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
INSERT INTO `sexo` (`Sex_id`, `Sex_Sexo`, `activo`) VALUES
	(1, 'Masculino', 'S'),
	(2, 'Femenino', 'S');
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;


-- Dumping structure for table dcs.tamano_empresa
DROP TABLE IF EXISTS `tamano_empresa`;
CREATE TABLE IF NOT EXISTS `tamano_empresa` (
  `TamEmp_tamano` varchar(3) DEFAULT NULL,
  `TamEmp_descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.tamano_empresa: ~4 rows (approximately)
/*!40000 ALTER TABLE `tamano_empresa` DISABLE KEYS */;
INSERT INTO `tamano_empresa` (`TamEmp_tamano`, `TamEmp_descripcion`) VALUES
	('MI', 'Microempresa'),
	('PE', 'Pequeña empresa'),
	('ME', 'Mediana empresa'),
	('GR', 'Gran empresa');
/*!40000 ALTER TABLE `tamano_empresa` ENABLE KEYS */;


-- Dumping structure for table dcs.tipo_alarma
DROP TABLE IF EXISTS `tipo_alarma`;
CREATE TABLE IF NOT EXISTS `tipo_alarma` (
  `id_tipo_alarma` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `fecha_creacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `examen` text,
  `analisis_resultados` varchar(50) DEFAULT NULL,
  `id_niveles_alarma` int(11) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`id_tipo_alarma`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.tipo_alarma: ~2 rows (approximately)
/*!40000 ALTER TABLE `tipo_alarma` DISABLE KEYS */;
INSERT INTO `tipo_alarma` (`id_tipo_alarma`, `descripcion`, `fecha_creacion`, `examen`, `analisis_resultados`, `id_niveles_alarma`, `activo`) VALUES
	(1, 'dd', NULL, '4', 'Baja', 1, 'S'),
	(2, 'Tensión arterial alta', NULL, '7', 'Alta', 1, 'S');
/*!40000 ALTER TABLE `tipo_alarma` ENABLE KEYS */;


-- Dumping structure for table dcs.tipo_aseguradora
DROP TABLE IF EXISTS `tipo_aseguradora`;
CREATE TABLE IF NOT EXISTS `tipo_aseguradora` (
  `TipAse_Id` int(11) NOT NULL DEFAULT '0',
  `TipAse_Nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TipAse_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.tipo_aseguradora: ~0 rows (approximately)
/*!40000 ALTER TABLE `tipo_aseguradora` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_aseguradora` ENABLE KEYS */;


-- Dumping structure for table dcs.tipo_cliente
DROP TABLE IF EXISTS `tipo_cliente`;
CREATE TABLE IF NOT EXISTS `tipo_cliente` (
  `id_tipo_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `fecha_creacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `creado_por` int(11) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`id_tipo_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.tipo_cliente: ~8 rows (approximately)
/*!40000 ALTER TABLE `tipo_cliente` DISABLE KEYS */;
INSERT INTO `tipo_cliente` (`id_tipo_cliente`, `descripcion`, `fecha_creacion`, `creado_por`, `activo`) VALUES
	(1, 'ya', NULL, NULL, NULL),
	(2, 'ya', NULL, NULL, NULL),
	(3, 'sada', '2015-09-07 19:54:32', NULL, 'N'),
	(4, 'esto es mio', '2015-09-07 19:54:35', NULL, 'N'),
	(5, 'hospitales', '2015-09-07 19:54:37', NULL, 'N'),
	(6, 'Hospitales', NULL, NULL, 'S'),
	(7, 'Hospitales', '2015-09-07 19:54:40', NULL, 'N'),
	(8, 'Particular', NULL, NULL, 'S');
/*!40000 ALTER TABLE `tipo_cliente` ENABLE KEYS */;


-- Dumping structure for table dcs.tipo_contrato
DROP TABLE IF EXISTS `tipo_contrato`;
CREATE TABLE IF NOT EXISTS `tipo_contrato` (
  `TipCon_Id` int(11) NOT NULL AUTO_INCREMENT,
  `TipCon_Descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TipCon_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.tipo_contrato: ~1 rows (approximately)
/*!40000 ALTER TABLE `tipo_contrato` DISABLE KEYS */;
INSERT INTO `tipo_contrato` (`TipCon_Id`, `TipCon_Descripcion`) VALUES
	(1, 'prueba');
/*!40000 ALTER TABLE `tipo_contrato` ENABLE KEYS */;


-- Dumping structure for table dcs.tipo_documento
DROP TABLE IF EXISTS `tipo_documento`;
CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `tipDoc_tipo` varchar(4) NOT NULL DEFAULT '',
  `tipDoc_Descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tipDoc_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.tipo_documento: ~3 rows (approximately)
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT INTO `tipo_documento` (`tipDoc_tipo`, `tipDoc_Descripcion`) VALUES
	('CC', 'CEDULA DE CIUDADANIA'),
	('CE', 'CEDULA EXTRANJERIA'),
	('TI', 'TARJETA IDENTIDAD');
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;


-- Dumping structure for table dcs.tipo_equipo
DROP TABLE IF EXISTS `tipo_equipo`;
CREATE TABLE IF NOT EXISTS `tipo_equipo` (
  `tipo_equipo_cod` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(255) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`tipo_equipo_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.tipo_equipo: ~8 rows (approximately)
/*!40000 ALTER TABLE `tipo_equipo` DISABLE KEYS */;
INSERT INTO `tipo_equipo` (`tipo_equipo_cod`, `referencia`, `estado`, `fecha_creacion`, `activo`) VALUES
	(1, 'nelson', 'Inactivo', '0000-00-00 00:00:00', 'N'),
	(2, 'ya quedo', 'Activo', '0000-00-00 00:00:00', 'N'),
	(3, 'eded', 'Activo', NULL, 'N'),
	(4, 'dddd', 'Activo', NULL, 'N'),
	(5, 'refedddd', 'Activo', NULL, 'N'),
	(6, 'rrrddddddd', 'Activo', NULL, 'N'),
	(7, 'Medidor de signos vitales', 'Activo', NULL, 'S'),
	(8, 'Tensiometros', 'Activo', NULL, 'S');
/*!40000 ALTER TABLE `tipo_equipo` ENABLE KEYS */;


-- Dumping structure for table dcs.tipo_inputs
DROP TABLE IF EXISTS `tipo_inputs`;
CREATE TABLE IF NOT EXISTS `tipo_inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table dcs.tipo_inputs: ~12 rows (approximately)
/*!40000 ALTER TABLE `tipo_inputs` DISABLE KEYS */;
INSERT INTO `tipo_inputs` (`id`, `name`, `description`) VALUES
	(1, 'text', NULL),
	(2, 'password', NULL),
	(3, 'checkbox', NULL),
	(4, 'radio', NULL),
	(5, 'submit', NULL),
	(6, 'reset', NULL),
	(7, 'file', NULL),
	(8, 'hidden', NULL),
	(9, 'image', NULL),
	(10, 'button ', NULL),
	(11, 'email', NULL),
	(12, 'select', NULL);
/*!40000 ALTER TABLE `tipo_inputs` ENABLE KEYS */;


-- Dumping structure for table dcs.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_contrasena` varchar(1000) DEFAULT NULL,
  `est_id` int(5) DEFAULT '1',
  `usu_politicas` int(1) DEFAULT '0',
  `usu_cedula` varchar(15) DEFAULT NULL,
  `usu_nombre` varchar(100) DEFAULT NULL,
  `usu_apellido` varchar(100) DEFAULT NULL,
  `usu_usuario` varchar(100) DEFAULT NULL,
  `usu_email` varchar(100) DEFAULT NULL,
  `sex_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `usu_fechaActualizacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `usu_fechaCreacion` datetime DEFAULT NULL,
  `Ing_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.user: ~10 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`usu_id`, `usu_contrasena`, `est_id`, `usu_politicas`, `usu_cedula`, `usu_nombre`, `usu_apellido`, `usu_usuario`, `usu_email`, `sex_id`, `car_id`, `emp_id`, `usu_fechaActualizacion`, `usu_fechaCreacion`, `Ing_id`, `rol_id`, `activo`) VALUES
	(1, '12345', 1, 1, '12345', 'gerson', 'barbosa', 'admin@admin.com', 'admin@admin.com', NULL, NULL, NULL, '2015-09-03 09:16:00', NULL, NULL, 51, 'S'),
	(2, '12345', 1, 1, '6789', 'javier', 'romero', NULL, NULL, NULL, NULL, NULL, '2015-09-07 20:22:09', NULL, NULL, 0, 'N'),
	(3, '12345', 1, 1, '34567', 'barbosa', 'castillo', NULL, NULL, NULL, NULL, NULL, '2015-09-07 20:22:12', NULL, NULL, 0, 'N'),
	(5, '12345', 0, 0, '123456789', 'gerson javier', 'barbosa romero', 'javierbr12@hotmail.com', 'javierbr12@hotmail.com', 1, 40, 0, '2015-09-03 06:43:52', NULL, NULL, NULL, 'S'),
	(6, '12345', 1, 1, '123456789', 'dcs', 'dcs', 'dcs@dcs.com', 'dcs@dcs.com', 1, 40, 0, '2015-09-04 10:49:06', '2015-08-23 08:13:46', NULL, 62, 'S'),
	(43, '1234567890', 1, 0, '100000', 'nelson22', 'bb', 'giovanny751@hotmail.com', 'giovanny751@hotmail.com', NULL, NULL, NULL, '2015-09-03 18:57:51', '2015-09-04 01:57:51', NULL, NULL, 'S'),
	(44, '123123123123', 1, 0, '123', '333', '', '123', 'sad', NULL, NULL, NULL, '2015-09-07 20:22:16', '2015-09-04 02:11:07', NULL, NULL, 'N'),
	(45, '123456788', 1, 0, '546765678', 'German', 'rodriguez', 'Grodriguez', 'g@hotmail.com', NULL, NULL, NULL, '2015-09-04 08:48:58', '2015-09-04 15:48:58', NULL, NULL, 'S'),
	(46, 'daniel123', 1, 0, '79648473', 'Daniel', 'Ortiz', 'DOrtiz', 'daniel@hotmail.com', NULL, NULL, NULL, NULL, '2015-09-08 02:29:09', NULL, NULL, 'S'),
	(47, '12345678', 1, 1, '76987879', 'gina', 'beltran', 'gbeltran', '', NULL, NULL, NULL, '2015-09-07 19:47:32', '2015-09-08 02:46:41', NULL, NULL, 'S');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


-- Dumping structure for table dcs.usermodule
DROP TABLE IF EXISTS `usermodule`;
CREATE TABLE IF NOT EXISTS `usermodule` (
  `user_id` int(10) DEFAULT NULL,
  `modulo_menuid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.usermodule: ~3 rows (approximately)
/*!40000 ALTER TABLE `usermodule` DISABLE KEYS */;
INSERT INTO `usermodule` (`user_id`, `modulo_menuid`) VALUES
	(1, 24),
	(1, 54),
	(1, 1);
/*!40000 ALTER TABLE `usermodule` ENABLE KEYS */;


-- Dumping structure for table dcs.user_copy
DROP TABLE IF EXISTS `user_copy`;
CREATE TABLE IF NOT EXISTS `user_copy` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_contrasena` varchar(1000) DEFAULT NULL,
  `est_id` int(5) DEFAULT '1',
  `usu_politicas` int(1) DEFAULT '0',
  `usu_cedula` varchar(15) DEFAULT NULL,
  `usu_nombre` varchar(100) DEFAULT NULL,
  `usu_apellido` varchar(100) DEFAULT NULL,
  `usu_usuario` varchar(100) DEFAULT NULL,
  `usu_email` varchar(100) DEFAULT NULL,
  `sex_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `usu_fechaActualizacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `usu_fechaCreacion` datetime DEFAULT NULL,
  `Ing_id` int(11) DEFAULT NULL,
  `usu_cambiocontrasena` bit(1) DEFAULT b'0',
  `rol_id` int(11) DEFAULT NULL COMMENT 'Rol por defecto',
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.user_copy: ~8 rows (approximately)
/*!40000 ALTER TABLE `user_copy` DISABLE KEYS */;
INSERT INTO `user_copy` (`usu_id`, `usu_contrasena`, `est_id`, `usu_politicas`, `usu_cedula`, `usu_nombre`, `usu_apellido`, `usu_usuario`, `usu_email`, `sex_id`, `car_id`, `emp_id`, `usu_fechaActualizacion`, `usu_fechaCreacion`, `Ing_id`, `usu_cambiocontrasena`, `rol_id`) VALUES
	(1, '12345', 1, 1, '12345', 'gersonjbr12', 'apellidoprueba', 'admin', 'javierbr12@hotmail.com', 1, 40, 0, '2015-09-02 21:38:46', '2015-08-27 03:01:02', NULL, b'0', 51),
	(2, '12345', 1, 1, '6789', 'javier', 'romero', NULL, NULL, 1, 40, NULL, '2015-08-26 19:38:19', NULL, NULL, b'0', NULL),
	(3, '12345', 1, 1, '34567', 'barbosa', 'castillo', NULL, NULL, NULL, 40, NULL, '2015-08-26 19:35:16', NULL, NULL, b'0', NULL),
	(5, '12345', 0, 0, '123456789', 'gerson javier', 'barbosa romero', 'gerson', 'javierbr12@hotmail.com', 1, 40, 0, NULL, NULL, NULL, b'0', NULL),
	(6, '12345', 0, 0, '123456789', 'gerson javier', 'barbosa romero', 'gerson', 'javierbr12@hotmail.com', 1, 40, 0, NULL, '2015-08-23 08:13:46', NULL, b'0', NULL),
	(9, '12345', 1, 0, '888888888888888', 'nelson', 'giovanny', 'nbarbosa', 'giovanny751@misena.edu.co', 1, 40, 3, '2015-08-30 20:34:55', '2015-08-31 03:34:55', NULL, b'1', NULL),
	(10, '12345', 1, 0, '10337005556', 'nelson', 'giovanny', 'nbarbosa', 'giovanny751@misena.edu.co', 1, 40, 4, NULL, '2015-08-31 03:10:59', NULL, b'1', NULL),
	(11, '12345', 1, 1, '12345678', 'coco', 'guanabana', 'basc', 'coco@coco.com', 1, 40, 2, '2015-09-02 14:43:40', '2015-08-31 05:41:00', NULL, b'1', 56);
/*!40000 ALTER TABLE `user_copy` ENABLE KEYS */;


-- Dumping structure for table dcs.user_copy1
DROP TABLE IF EXISTS `user_copy1`;
CREATE TABLE IF NOT EXISTS `user_copy1` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_contrasena` varchar(1000) DEFAULT NULL,
  `est_id` int(5) DEFAULT '1',
  `usu_politicas` int(1) DEFAULT '0',
  `usu_cedula` varchar(15) DEFAULT NULL,
  `usu_nombre` varchar(100) DEFAULT NULL,
  `usu_apellido` varchar(100) DEFAULT NULL,
  `usu_usuario` varchar(100) DEFAULT NULL,
  `usu_email` varchar(100) DEFAULT NULL,
  `sex_id` int(11) DEFAULT NULL,
  `car_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `usu_fechaActualizacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `usu_fechaCreacion` datetime DEFAULT NULL,
  `Ing_id` int(11) DEFAULT NULL,
  `usu_cambiocontrasena` bit(1) DEFAULT b'0',
  `rol_id` int(11) DEFAULT NULL COMMENT 'Rol por defecto',
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.user_copy1: ~8 rows (approximately)
/*!40000 ALTER TABLE `user_copy1` DISABLE KEYS */;
INSERT INTO `user_copy1` (`usu_id`, `usu_contrasena`, `est_id`, `usu_politicas`, `usu_cedula`, `usu_nombre`, `usu_apellido`, `usu_usuario`, `usu_email`, `sex_id`, `car_id`, `emp_id`, `usu_fechaActualizacion`, `usu_fechaCreacion`, `Ing_id`, `usu_cambiocontrasena`, `rol_id`) VALUES
	(1, '12345', 1, 1, '12345', 'gersonjbr12', 'apellidoprueba', 'admin', 'javierbr12@hotmail.com', 1, 40, 0, '2015-09-02 21:38:46', '2015-08-27 03:01:02', NULL, b'0', 51),
	(2, '12345', 1, 1, '6789', 'javier', 'romero', NULL, NULL, 1, 40, NULL, '2015-08-26 19:38:19', NULL, NULL, b'0', NULL),
	(3, '12345', 1, 1, '34567', 'barbosa', 'castillo', NULL, NULL, NULL, 40, NULL, '2015-08-26 19:35:16', NULL, NULL, b'0', NULL),
	(5, '12345', 0, 0, '123456789', 'gerson javier', 'barbosa romero', 'gerson', 'javierbr12@hotmail.com', 1, 40, 0, NULL, NULL, NULL, b'0', NULL),
	(6, '12345', 0, 0, '123456789', 'gerson javier', 'barbosa romero', 'gerson', 'javierbr12@hotmail.com', 1, 40, 0, NULL, '2015-08-23 08:13:46', NULL, b'0', NULL),
	(9, '12345', 1, 0, '888888888888888', 'nelson', 'giovanny', 'nbarbosa', 'giovanny751@misena.edu.co', 1, 40, 3, '2015-08-30 20:34:55', '2015-08-31 03:34:55', NULL, b'1', NULL),
	(10, '12345', 1, 0, '10337005556', 'nelson', 'giovanny', 'nbarbosa', 'giovanny751@misena.edu.co', 1, 40, 4, NULL, '2015-08-31 03:10:59', NULL, b'1', NULL),
	(11, '12345', 1, 1, '12345678', 'coco', 'guanabana', 'basc', 'coco@coco.com', 1, 40, 2, '2015-09-02 14:43:40', '2015-08-31 05:41:00', NULL, b'1', 56);
/*!40000 ALTER TABLE `user_copy1` ENABLE KEYS */;


-- Dumping structure for table dcs.variables
DROP TABLE IF EXISTS `variables`;
CREATE TABLE IF NOT EXISTS `variables` (
  `variable_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `hl7tag` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `examen_cod` int(11) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`variable_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table dcs.variables: ~6 rows (approximately)
/*!40000 ALTER TABLE `variables` DISABLE KEYS */;
INSERT INTO `variables` (`variable_codigo`, `hl7tag`, `descripcion`, `fecha_creacion`, `examen_cod`, `activo`) VALUES
	(1, NULL, 'rffff', NULL, 5, NULL),
	(2, NULL, 'ddd', NULL, 4, 'S'),
	(3, 'sss', 'ee', NULL, 4, 'S'),
	(4, 'VEF1', 'VEF1', NULL, 8, 'S'),
	(5, 'CVF', 'CVF', NULL, 8, 'S'),
	(6, 'VS', 'valor sistolico', NULL, 7, 'S');
/*!40000 ALTER TABLE `variables` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
