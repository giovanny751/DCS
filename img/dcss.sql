/*
Navicat MySQL Data Transfer

Source Server         : Nygsoft_red
Source Server Version : 50536
Source Host           : 192.186.204.164:3306
Source Database       : dcss

Target Server Type    : MYSQL
Target Server Version : 50536
File Encoding         : 65001

Date: 2015-09-24 12:41:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `adminformularios`
-- ----------------------------
DROP TABLE IF EXISTS `adminformularios`;
CREATE TABLE `adminformularios` (
  `form_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_formulario` varchar(255) DEFAULT NULL COMMENT '1 empresa, 2 usuario 3 vehiculos 0 otra',
  `form_campo` varchar(255) DEFAULT NULL,
  `form_nombre` varchar(255) DEFAULT NULL,
  `form_valor` int(2) DEFAULT '0' COMMENT '0 activo 1 inactivo 2 eliminado',
  `form_accion` int(2) DEFAULT '0' COMMENT '0 activo 1 inactivo 2 eliminado',
  `form_nombreForm` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of adminformularios
-- ----------------------------
INSERT INTO `adminformularios` VALUES ('4', '0', 'OTRO', 'OTRO', '0', '0', 'OTRO');
INSERT INTO `adminformularios` VALUES ('5', '1', ' Tipo de Empresa', 'pública', '1', '0', 'Empresa');

-- ----------------------------
-- Table structure for `alarmas_generadas`
-- ----------------------------
DROP TABLE IF EXISTS `alarmas_generadas`;
CREATE TABLE `alarmas_generadas` (
  `id_alarmas_generadas` int(11) NOT NULL AUTO_INCREMENT,
  `id_niveles_alarma` int(11) DEFAULT NULL,
  `descripcion` text,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_lectura_equipo` int(11) DEFAULT NULL,
  `analisis_resultado` text,
  `estado_id` varchar(200) DEFAULT 'Sin atender',
  `lectura_id` int(11) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  `id_tipo_alarma` int(11) DEFAULT NULL,
  `examen_cod` int(11) DEFAULT NULL,
  `fecha_atencion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_alarmas_generadas`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of alarmas_generadas
-- ----------------------------
INSERT INTO `alarmas_generadas` VALUES ('15', null, 'yyyysdfsdfsdfsdf', '2015-09-20 18:04:39', '14', 'Baja', null, null, 'S', '15', '8', '2015-09-21 02:59:24');
INSERT INTO `alarmas_generadas` VALUES ('16', null, 'yyyy', '2015-09-20 18:04:40', '15', 'Baja', null, null, 'S', '15', '8', null);
INSERT INTO `alarmas_generadas` VALUES ('17', null, 'hola', '2015-09-20 18:04:41', '16', 'Baja', null, null, 'S', '15', '8', '2015-09-21 03:00:25');
INSERT INTO `alarmas_generadas` VALUES ('18', null, 'yyyy', '2015-09-20 18:04:42', '17', 'Baja', null, null, 'S', '15', '8', null);
INSERT INTO `alarmas_generadas` VALUES ('19', null, 'yyyy', '2015-09-20 18:39:17', '18', 'Alta', null, null, 'S', null, '8', null);
INSERT INTO `alarmas_generadas` VALUES ('20', null, 'yyy', '2015-09-21 21:46:43', '19', 'Alta', 'Sin atender', null, 'S', null, '8', null);

-- ----------------------------
-- Table structure for `aseguradora_paciente`
-- ----------------------------
DROP TABLE IF EXISTS `aseguradora_paciente`;
CREATE TABLE `aseguradora_paciente` (
  `asePac_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) DEFAULT NULL,
  `aseguradora_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`asePac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aseguradora_paciente
-- ----------------------------
INSERT INTO `aseguradora_paciente` VALUES ('1', '2', '5');
INSERT INTO `aseguradora_paciente` VALUES ('3', '8', '6');
INSERT INTO `aseguradora_paciente` VALUES ('8', '11', '7');

-- ----------------------------
-- Table structure for `aseguradoras`
-- ----------------------------
DROP TABLE IF EXISTS `aseguradoras`;
CREATE TABLE `aseguradoras` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of aseguradoras
-- ----------------------------
INSERT INTO `aseguradoras` VALUES ('1', 'ya quedi ', 'EPS/IPS', 'Inactivo', null, 'sd', '44', '34', 'f@jj.com', 'N');
INSERT INTO `aseguradoras` VALUES ('2', null, 'Prepagada', null, null, 'CALL', '765432', '', '', 'N');
INSERT INTO `aseguradoras` VALUES ('3', null, 'Prepagada', null, null, 'da', '234', '234', '', 'N');
INSERT INTO `aseguradoras` VALUES ('4', '123', 'Red de ambulancias', 'Activo', null, '123', '123', '123', '', 'N');
INSERT INTO `aseguradoras` VALUES ('5', 'Medplus', 'Prepagada', 'Activo', null, 'calle 76 36 - 67', '67657689', '', 'ff@h.com', 'N');
INSERT INTO `aseguradoras` VALUES ('6', 'emermedica', 'Red de ambulancias', 'Activo', null, 'calle 03 A #45-67', '89078689', '320876789', 'servicioalcliente@emermedica.com.co', 'S');
INSERT INTO `aseguradoras` VALUES ('7', 'medplus', 'Prepagada', 'Activo', null, 'Calle 127  20-45 Bogotá', '78292202', '320876789', 'ff@h.com', 'S');

-- ----------------------------
-- Table structure for `cargo`
-- ----------------------------
DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_nombre` varchar(100) NOT NULL,
  `car_jefe` int(11) DEFAULT NULL,
  `car_porcentajearl` float(10,0) NOT NULL,
  `activo` varchar(50) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cargo
-- ----------------------------
INSERT INTO `cargo` VALUES ('40', 'visepresidencia', '0', '15', 'S');
INSERT INTO `cargo` VALUES ('41', 'gerencia', '40', '10', 'S');

-- ----------------------------
-- Table structure for `ciiu`
-- ----------------------------
DROP TABLE IF EXISTS `ciiu`;
CREATE TABLE `ciiu` (
  `ciiu_id` int(11) NOT NULL AUTO_INCREMENT,
  `ciiu_grupo` varchar(255) DEFAULT NULL,
  `ciiu_clase` varchar(255) DEFAULT NULL,
  `ciiu_description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ciiu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=609 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ciiu
-- ----------------------------
INSERT INTO `ciiu` VALUES ('1', '11', '', 'Cultivos agrícolas transitorios ');
INSERT INTO `ciiu` VALUES ('2', '', '111', 'Cultivo de cereales (excepto arroz), legumbres y semillas oleaginosas ');
INSERT INTO `ciiu` VALUES ('3', '', '112', 'Cultivo de arroz ');
INSERT INTO `ciiu` VALUES ('4', '', '113', 'Cultivo de hortalizas, raíces y tubérculos ');
INSERT INTO `ciiu` VALUES ('5', '', '114', 'Cultivo de tabaco ');
INSERT INTO `ciiu` VALUES ('6', '', '115', 'Cultivo de plantas textiles ');
INSERT INTO `ciiu` VALUES ('7', '', '119', 'Otros cultivos transitorios n.c.p.');
INSERT INTO `ciiu` VALUES ('8', '12', '', 'Cultivos agrícolas permanentes ');
INSERT INTO `ciiu` VALUES ('9', '', '121', 'Cultivo de frutas tropicales y subtropicales');
INSERT INTO `ciiu` VALUES ('10', '', '122', 'Cultivo de plátano y banano');
INSERT INTO `ciiu` VALUES ('11', '', '123', 'Cultivo de café');
INSERT INTO `ciiu` VALUES ('12', '', '124', 'Cultivo de caña de azúcar');
INSERT INTO `ciiu` VALUES ('13', '', '125', 'Cultivo de flor de corte');
INSERT INTO `ciiu` VALUES ('14', '', '126', 'Cultivo de palma para aceite (palma africana) y otros frutos oleaginosos');
INSERT INTO `ciiu` VALUES ('15', '', '127', 'Cultivo de plantas con las que se preparan bebidas');
INSERT INTO `ciiu` VALUES ('16', '', '128', 'Cultivo de especias y de plantas aromáticas y medicinales ');
INSERT INTO `ciiu` VALUES ('17', '', '129', 'Otros cultivos permanentes n.c.p.');
INSERT INTO `ciiu` VALUES ('18', '13', '130', 'Propagación de plantas (actividades de los viveros, excepto viveros forestales) ');
INSERT INTO `ciiu` VALUES ('19', '14', '', 'Ganadería ');
INSERT INTO `ciiu` VALUES ('20', '', '141', 'Cría de ganado bovino y bufalino');
INSERT INTO `ciiu` VALUES ('21', '', '142', 'Cría de caballos y otros equinos ');
INSERT INTO `ciiu` VALUES ('22', '', '143', 'Cría de ovejas y cabras ');
INSERT INTO `ciiu` VALUES ('23', '', '144', 'Cría de ganado porcino');
INSERT INTO `ciiu` VALUES ('24', '', '145', 'Cría de aves de corral');
INSERT INTO `ciiu` VALUES ('25', '', '149', 'Cría de otros animales n.c.p.');
INSERT INTO `ciiu` VALUES ('26', '15', '150', 'Explotación mixta (agrícola y pecuaria) ');
INSERT INTO `ciiu` VALUES ('27', '16', '', 'Actividades de apoyo a la agricultura y la ganadería, y actividades posteriores a la cosecha ');
INSERT INTO `ciiu` VALUES ('28', '', '161', 'Actividades de apoyo a la agricultura ');
INSERT INTO `ciiu` VALUES ('29', '', '162', 'Actividades de apoyo a la ganadería');
INSERT INTO `ciiu` VALUES ('30', '', '163', 'Actividades posteriores a la cosecha ');
INSERT INTO `ciiu` VALUES ('31', '', '164', 'Tratamiento de semillas para propagación ');
INSERT INTO `ciiu` VALUES ('32', '17', '170', 'Caza ordinaria y mediante trampas y actividades de servicios conexas ');
INSERT INTO `ciiu` VALUES ('33', '', '', 'Silvicultura y extracción de madera');
INSERT INTO `ciiu` VALUES ('34', '21', '210', 'Silvicultura y otras actividades forestales');
INSERT INTO `ciiu` VALUES ('35', '22', '220', 'Extracción de madera ');
INSERT INTO `ciiu` VALUES ('36', '23', '230', 'Recolección de productos forestales diferentes a la madera');
INSERT INTO `ciiu` VALUES ('37', '24', '240', 'Servicios de apoyo a la silvicultura ');
INSERT INTO `ciiu` VALUES ('38', '', '', 'Pesca y acuicultura');
INSERT INTO `ciiu` VALUES ('39', '31', '', 'Pesca ');
INSERT INTO `ciiu` VALUES ('40', '', '311', 'Pesca marítima ');
INSERT INTO `ciiu` VALUES ('41', '', '312', 'Pesca de agua dulce ');
INSERT INTO `ciiu` VALUES ('42', '32', '', 'Acuicultura ');
INSERT INTO `ciiu` VALUES ('43', '', '321', 'Acuicultura marítima ');
INSERT INTO `ciiu` VALUES ('44', '', '322', 'Acuicultura de agua dulce');
INSERT INTO `ciiu` VALUES ('45', '51', '510', 'Extracción de hulla (carbón de piedra)');
INSERT INTO `ciiu` VALUES ('46', '52', '520', 'Extracción de carbón lignito');
INSERT INTO `ciiu` VALUES ('47', '61', '610', 'Extracción de petróleo crudo');
INSERT INTO `ciiu` VALUES ('48', '62', '620', 'Extracción de gas natural');
INSERT INTO `ciiu` VALUES ('49', '71', '710', 'Extracción de minerales de hierro');
INSERT INTO `ciiu` VALUES ('50', '72', '', 'Extracción de minerales metalíferos no ferrosos');
INSERT INTO `ciiu` VALUES ('51', '', '721', 'Extracción de minerales de uranio y de torio');
INSERT INTO `ciiu` VALUES ('52', '', '722', 'Extracción de oro y otros metales preciosos');
INSERT INTO `ciiu` VALUES ('53', '', '723', 'Extracción de minerales de níquel');
INSERT INTO `ciiu` VALUES ('54', '', '729', 'Extracción de otros minerales metalíferos no ferrosos n.c.p.');
INSERT INTO `ciiu` VALUES ('55', '81', '', 'Extracción de piedra, arena, arcillas, cal, yeso, caolín, bentonitas y similares');
INSERT INTO `ciiu` VALUES ('56', '', '811', 'Extracción de piedra, arena, arcillas comunes, yeso y anhidrita');
INSERT INTO `ciiu` VALUES ('57', '', '812', 'Extracción de arcillas de uso industrial, caliza, caolín y bentonitas');
INSERT INTO `ciiu` VALUES ('58', '82', '820', 'Extracción de esmeraldas, piedras preciosas y semipreciosas');
INSERT INTO `ciiu` VALUES ('59', '89', '', 'Extracción de otros minerales no metálicos n.c.p.');
INSERT INTO `ciiu` VALUES ('60', '', '891', 'Extracción de minerales para la fabricación de abonos y productos químicos');
INSERT INTO `ciiu` VALUES ('61', '', '892', 'Extracción de halita (sal)');
INSERT INTO `ciiu` VALUES ('62', '', '899', 'Extracción de otros minerales no metálicos n.c.p.');
INSERT INTO `ciiu` VALUES ('63', '91', '910', 'Actividades de apoyo para la extracción de petróleo y de gas natural');
INSERT INTO `ciiu` VALUES ('64', '99', '990', 'Actividades de apoyo para otras actividades de explotación de minas y canteras');
INSERT INTO `ciiu` VALUES ('65', '101', '', 'Procesamiento y conservación de carne, pescado, crustáceos y moluscos ');
INSERT INTO `ciiu` VALUES ('66', '', '1011', 'Procesamiento y conservación de carne y productos cárnicos');
INSERT INTO `ciiu` VALUES ('67', '', '1012', 'Procesamiento y conservación de pescados, crustáceos y moluscos');
INSERT INTO `ciiu` VALUES ('68', '102', '1020', 'Procesamiento y conservación de frutas, legumbres, hortalizas y tubérculos');
INSERT INTO `ciiu` VALUES ('69', '103', '1030', 'Elaboración de aceites y grasas de origen vegetal y animal');
INSERT INTO `ciiu` VALUES ('70', '104', '1040', 'Elaboración de productos lácteos');
INSERT INTO `ciiu` VALUES ('71', '105', '', 'Elaboración de productos de molinería, almidones y productos derivados del almidón');
INSERT INTO `ciiu` VALUES ('72', '', '1051', 'Elaboración de productos de molinería');
INSERT INTO `ciiu` VALUES ('73', '', '1052', 'Elaboración de almidones y productos derivados del almidón');
INSERT INTO `ciiu` VALUES ('74', '106', '', 'Elaboración de productos de café');
INSERT INTO `ciiu` VALUES ('75', '', '1061', 'Trilla de café');
INSERT INTO `ciiu` VALUES ('76', '', '1062', 'Descafeinado, tostión y molienda del café');
INSERT INTO `ciiu` VALUES ('77', '', '1063', 'Otros derivados del café');
INSERT INTO `ciiu` VALUES ('78', '107', '', 'Elaboración de azúcar y panela');
INSERT INTO `ciiu` VALUES ('79', '', '1071', 'Elaboración y refinación de azúcar');
INSERT INTO `ciiu` VALUES ('80', '', '1072', 'Elaboración de panela');
INSERT INTO `ciiu` VALUES ('81', '108', '', 'Elaboración de otros productos alimenticios');
INSERT INTO `ciiu` VALUES ('82', '', '1081', 'Elaboración de productos de panadería');
INSERT INTO `ciiu` VALUES ('83', '', '1082', 'Elaboración de cacao, chocolate y productos de confitería');
INSERT INTO `ciiu` VALUES ('84', '', '1083', 'Elaboración de macarrones, fideos, alcuzcuz y productos farináceos similares');
INSERT INTO `ciiu` VALUES ('85', '', '1084', 'Elaboración de comidas y platos preparados');
INSERT INTO `ciiu` VALUES ('86', '', '1089', 'Elaboración de otros productos alimenticios n.c.p.');
INSERT INTO `ciiu` VALUES ('87', '109', '1090', 'Elaboración de alimentos preparados para animales');
INSERT INTO `ciiu` VALUES ('88', '110', '', 'Elaboración de bebidas');
INSERT INTO `ciiu` VALUES ('89', '', '1101', 'Destilación, rectificación y mezcla de bebidas alcohólicas');
INSERT INTO `ciiu` VALUES ('90', '', '1102', 'Elaboración de bebidas fermentadas no destiladas');
INSERT INTO `ciiu` VALUES ('91', '', '1103', 'Producción de malta, elaboración de cervezas y otras bebidas malteadas');
INSERT INTO `ciiu` VALUES ('92', '', '1104', 'Elaboración de bebidas no alcohólicas, producción de aguas minerales y de otras aguas embotelladas');
INSERT INTO `ciiu` VALUES ('93', '120', '1200', 'Elaboración de productos de tabaco');
INSERT INTO `ciiu` VALUES ('94', '131', '', 'Preparación, hilatura, tejeduría y acabado de productos textiles');
INSERT INTO `ciiu` VALUES ('95', '', '1311', 'Preparación e hilatura de fibras textiles');
INSERT INTO `ciiu` VALUES ('96', '', '1312', 'Tejeduría de productos textiles');
INSERT INTO `ciiu` VALUES ('97', '', '1313', 'Acabado de productos textiles');
INSERT INTO `ciiu` VALUES ('98', '139', '', 'Fabricación de otros productos textiles');
INSERT INTO `ciiu` VALUES ('99', '', '1391', 'Fabricación de tejidos de punto y ganchillo');
INSERT INTO `ciiu` VALUES ('100', '', '1392', 'Confección de artículos con materiales textiles, excepto prendas de vestir');
INSERT INTO `ciiu` VALUES ('101', '', '1393', 'Fabricación de tapetes y alfombras para pisos');
INSERT INTO `ciiu` VALUES ('102', '', '1394', 'Fabricación de cuerdas, cordeles, cables, bramantes y redes');
INSERT INTO `ciiu` VALUES ('103', '', '1399', 'Fabricación de otros artículos textiles n.c.p.');
INSERT INTO `ciiu` VALUES ('104', '141', '1410', 'Confección de prendas de vestir, excepto prendas de piel');
INSERT INTO `ciiu` VALUES ('105', '142', '1420', 'Fabricación de artículos de piel');
INSERT INTO `ciiu` VALUES ('106', '143', '1430', 'Fabricación de artículos de punto y ganchillo');
INSERT INTO `ciiu` VALUES ('107', '151', '', 'Curtido y recurtido de cueros; fabricación de artículos de viaje, bolsos de mano y artículos similares, y fabricación de artículos de talabartería y guarnicionería, adobo y teñido de pieles');
INSERT INTO `ciiu` VALUES ('108', '', '1511', 'Curtido y recurtido de cueros; recurtido y teñido de pieles');
INSERT INTO `ciiu` VALUES ('109', '', '1512', 'Fabricación de artículos de viaje, bolsos de mano y artículos similares elaborados en cuero, y fabricación de artículos de talabartería y guarnicionería');
INSERT INTO `ciiu` VALUES ('110', '', '1513', 'Fabricación de artículos de viaje, bolsos de mano y artículos similares; artículos de talabartería y guarnicionería elaborados en otros materiales');
INSERT INTO `ciiu` VALUES ('111', '152', '', 'Fabricación de calzado');
INSERT INTO `ciiu` VALUES ('112', '', '1521', 'Fabricación de calzado de cuero y piel, con cualquier tipo de suela');
INSERT INTO `ciiu` VALUES ('113', '', '1522', 'Fabricación de otros tipos de calzado, excepto calzado de cuero y piel');
INSERT INTO `ciiu` VALUES ('114', '', '1523', 'Fabricación de partes del calzado');
INSERT INTO `ciiu` VALUES ('115', '161', '1610', 'Aserrado, acepillado e impregnación de la madera');
INSERT INTO `ciiu` VALUES ('116', '162', '1620', 'Fabricación de hojas de madera para enchapado; fabricación de tableros contrachapados, tableros laminados, tableros de partículas y otros tableros y paneles');
INSERT INTO `ciiu` VALUES ('117', '163', '1630', 'Fabricación de partes y piezas de madera, de carpintería y ebanistería para la construcción');
INSERT INTO `ciiu` VALUES ('118', '164', '1640', 'Fabricación de recipientes de madera');
INSERT INTO `ciiu` VALUES ('119', '169', '1690', 'Fabricación de otros productos de madera; fabricación de artículos de corcho, cestería y espartería');
INSERT INTO `ciiu` VALUES ('120', '170', '', 'Fabricación de papel, cartón y productos de papel y cartón');
INSERT INTO `ciiu` VALUES ('121', '', '1701', 'Fabricación de pulpas (pastas) celulósicas; papel y cartón');
INSERT INTO `ciiu` VALUES ('122', '', '1702', 'Fabricación de papel y cartón ondulado (corrugado); fabricación de envases, empaques y de embalajes de papel y cartón.');
INSERT INTO `ciiu` VALUES ('123', '', '1709', 'Fabricación de otros artículos de papel y cartón');
INSERT INTO `ciiu` VALUES ('124', '181', '', 'Actividades de impresión y actividades de servicios relacionados con la impresión');
INSERT INTO `ciiu` VALUES ('125', '', '1811', 'Actividades de impresión');
INSERT INTO `ciiu` VALUES ('126', '', '1812', 'Actividades de servicios relacionados con la impresión');
INSERT INTO `ciiu` VALUES ('127', '182', '1820', 'Producción de copias a partir de grabaciones originales ');
INSERT INTO `ciiu` VALUES ('128', '191', '1910', 'Fabricación de productos de hornos de coque');
INSERT INTO `ciiu` VALUES ('129', '192', '', 'Fabricación de productos de la refinación del petróleo');
INSERT INTO `ciiu` VALUES ('130', '', '1921', 'Fabricación de productos de la refinación del petróleo');
INSERT INTO `ciiu` VALUES ('131', '', '1922', 'Actividad de mezcla de combustibles');
INSERT INTO `ciiu` VALUES ('132', '201', '', 'Fabricación de sustancias químicas básicas, abonos y compuestos inorgánicos nitrogenados, plásticos y caucho sintético en formas primarias');
INSERT INTO `ciiu` VALUES ('133', '', '2011', 'Fabricación de sustancias y productos químicos básicos');
INSERT INTO `ciiu` VALUES ('134', '', '2012', 'Fabricación de abonos y compuestos inorgánicos nitrogenados');
INSERT INTO `ciiu` VALUES ('135', '', '2013', 'Fabricación de plásticos en formas primarias');
INSERT INTO `ciiu` VALUES ('136', '', '2014', 'Fabricación de caucho sintético en formas primarias');
INSERT INTO `ciiu` VALUES ('137', '202', '', 'Fabricación de otros productos químicos');
INSERT INTO `ciiu` VALUES ('138', '', '2021', 'Fabricación de plaguicidas y otros productos químicos de uso agropecuario');
INSERT INTO `ciiu` VALUES ('139', '', '2022', 'Fabricación de pinturas, barnices y revestimientos similares, tintas para impresión y masillas');
INSERT INTO `ciiu` VALUES ('140', '', '2023', 'Fabricación de jabones y detergentes, preparados para limpiar y pulir; perfumes y preparados de tocador');
INSERT INTO `ciiu` VALUES ('141', '', '2029', 'Fabricación de otros productos químicos n.c.p.');
INSERT INTO `ciiu` VALUES ('142', '203', '2030', 'Fabricación de fibras sintéticas y artificiales');
INSERT INTO `ciiu` VALUES ('143', '210', '2100', 'Fabricación de productos farmacéuticos, sustancias químicas medicinales y productos botánicos de uso farmacéutico');
INSERT INTO `ciiu` VALUES ('144', '221', '', 'Fabricación de productos de caucho');
INSERT INTO `ciiu` VALUES ('145', '', '2211', 'Fabricación de llantas y neumáticos de caucho');
INSERT INTO `ciiu` VALUES ('146', '', '2212', 'Reencauche de llantas usadas');
INSERT INTO `ciiu` VALUES ('147', '', '2219', 'Fabricación de formas básicas de caucho y otros productos de caucho n.c.p.');
INSERT INTO `ciiu` VALUES ('148', '222', '', 'Fabricación de productos de plástico');
INSERT INTO `ciiu` VALUES ('149', '', '2221', 'Fabricación de formas básicas de plástico');
INSERT INTO `ciiu` VALUES ('150', '', '2229', 'Fabricación de artículos de plástico n.c.p.');
INSERT INTO `ciiu` VALUES ('151', '231', '2310', 'Fabricación de vidrio y productos de vidrio');
INSERT INTO `ciiu` VALUES ('152', '239', '', 'Fabricación de productos minerales no metálicos n.c.p.');
INSERT INTO `ciiu` VALUES ('153', '', '2391', 'Fabricación de productos refractarios');
INSERT INTO `ciiu` VALUES ('154', '', '2392', 'Fabricación de materiales de arcilla para la construcción');
INSERT INTO `ciiu` VALUES ('155', '', '2393', 'Fabricación de otros productos de cerámica y porcelana');
INSERT INTO `ciiu` VALUES ('156', '', '2394', 'Fabricación de cemento, cal y yeso');
INSERT INTO `ciiu` VALUES ('157', '', '2395', 'Fabricación de artículos de hormigón, cemento y yeso');
INSERT INTO `ciiu` VALUES ('158', '', '2396', 'Corte, tallado y acabado de la piedra');
INSERT INTO `ciiu` VALUES ('159', '', '2399', 'Fabricación de otros productos minerales no metálicos n.c.p.');
INSERT INTO `ciiu` VALUES ('160', '241', '2410', 'Industrias básicas de hierro y de acero');
INSERT INTO `ciiu` VALUES ('161', '242', '', 'Industrias básicas de metales preciosos y de metales no ferrosos');
INSERT INTO `ciiu` VALUES ('162', '', '2421', 'Industrias básicas de metales preciosos');
INSERT INTO `ciiu` VALUES ('163', '', '2429', 'Industrias básicas de otros metales no ferrosos');
INSERT INTO `ciiu` VALUES ('164', '243', '', 'Fundición de metales');
INSERT INTO `ciiu` VALUES ('165', '', '2431', 'Fundición de hierro y de acero');
INSERT INTO `ciiu` VALUES ('166', '', '2432', 'Fundición de metales no ferrosos ');
INSERT INTO `ciiu` VALUES ('167', '251', '', 'Fabricación de productos metálicos para uso estructural, tanques, depósitos y generadores de vapor');
INSERT INTO `ciiu` VALUES ('168', '', '2511', 'Fabricación de productos metálicos para uso estructural');
INSERT INTO `ciiu` VALUES ('169', '', '2512', 'Fabricación de tanques, depósitos y recipientes de metal, excepto los utilizados para el envase o transporte de mercancías');
INSERT INTO `ciiu` VALUES ('170', '', '2513', 'Fabricación de generadores de vapor, excepto calderas de agua caliente para calefacción central');
INSERT INTO `ciiu` VALUES ('171', '252', '2520', 'Fabricación de armas y municiones');
INSERT INTO `ciiu` VALUES ('172', '259', '', 'Fabricación de otros productos elaborados de metal y actividades de servicios relacionadas con el trabajo de metales');
INSERT INTO `ciiu` VALUES ('173', '', '2591', 'Forja, prensado, estampado y laminado de metal; pulvimetalurgia');
INSERT INTO `ciiu` VALUES ('174', '', '2592', 'Tratamiento y revestimiento de metales; mecanizado');
INSERT INTO `ciiu` VALUES ('175', '', '2593', 'Fabricación de artículos de cuchillería, herramientas de mano y artículos de ferretería');
INSERT INTO `ciiu` VALUES ('176', '', '2599', 'Fabricación de otros productos elaborados de metal n.c.p.');
INSERT INTO `ciiu` VALUES ('177', '261', '2610', 'Fabricación de componentes y tableros electrónicos');
INSERT INTO `ciiu` VALUES ('178', '262', '2620', 'Fabricación de computadoras y de equipo periférico');
INSERT INTO `ciiu` VALUES ('179', '263', '2630', 'Fabricación de equipos de comunicación');
INSERT INTO `ciiu` VALUES ('180', '264', '2640', 'Fabricación de aparatos electrónicos de consumo');
INSERT INTO `ciiu` VALUES ('181', '265', '', 'Fabricación de equipo de medición, prueba, navegación y control; fabricación de relojes');
INSERT INTO `ciiu` VALUES ('182', '', '2651', 'Fabricación de equipo de medición, prueba, navegación y control');
INSERT INTO `ciiu` VALUES ('183', '', '2652', 'Fabricación de relojes');
INSERT INTO `ciiu` VALUES ('184', '266', '2660', 'Fabricación de equipo de irradiación y equipo electrónico de uso médico y terapéutico');
INSERT INTO `ciiu` VALUES ('185', '267', '2670', 'Fabricación de instrumentos ópticos y equipo fotográfico');
INSERT INTO `ciiu` VALUES ('186', '268', '2680', 'Fabricación de medios magnéticos y ópticos para almacenamiento de datos');
INSERT INTO `ciiu` VALUES ('187', '271', '', 'Fabricación de motores, generadores y transformadores eléctricos y de aparatos de distribución y control de la energía eléctrica');
INSERT INTO `ciiu` VALUES ('188', '', '2711', 'Fabricación de motores, generadores y transformadores eléctricos');
INSERT INTO `ciiu` VALUES ('189', '', '2712', 'Fabricación de aparatos de distribución y control de la energía eléctrica');
INSERT INTO `ciiu` VALUES ('190', '272', '2720', 'Fabricación de pilas, baterías y acumuladores eléctricos');
INSERT INTO `ciiu` VALUES ('191', '273', '', 'Fabricación de hilos y cables aislados y sus dispositivos');
INSERT INTO `ciiu` VALUES ('192', '', '2731', 'Fabricación de hilos y cables eléctricos y de fibra óptica');
INSERT INTO `ciiu` VALUES ('193', '', '2732', 'Fabricación de dispositivos de cableado');
INSERT INTO `ciiu` VALUES ('194', '274', '2740', 'Fabricación de equipos eléctricos de iluminación');
INSERT INTO `ciiu` VALUES ('195', '275', '2750', 'Fabricación de aparatos de uso doméstico');
INSERT INTO `ciiu` VALUES ('196', '279', '2790', 'Fabricación de otros tipos de equipo eléctrico n.c.p.');
INSERT INTO `ciiu` VALUES ('197', '281', '', 'Fabricación de maquinaria y equipo de uso general');
INSERT INTO `ciiu` VALUES ('198', '', '2811', 'Fabricación de motores, turbinas, y partes para motores de combustión interna');
INSERT INTO `ciiu` VALUES ('199', '', '2812', 'Fabricación de equipos de potencia hidráulica y neumática');
INSERT INTO `ciiu` VALUES ('200', '', '2813', 'Fabricación de otras bombas, compresores, grifos y válvulas');
INSERT INTO `ciiu` VALUES ('201', '', '2814', 'Fabricación de cojinetes, engranajes, trenes de engranajes y piezas de transmisión');
INSERT INTO `ciiu` VALUES ('202', '', '2815', 'Fabricación de hornos, hogares y quemadores industriales');
INSERT INTO `ciiu` VALUES ('203', '', '2816', 'Fabricación de equipo de elevación y manipulación');
INSERT INTO `ciiu` VALUES ('204', '', '2817', 'Fabricación de maquinaria y equipo de oficina (excepto computadoras y equipo periférico)');
INSERT INTO `ciiu` VALUES ('205', '', '2818', 'Fabricación de herramientas manuales con motor');
INSERT INTO `ciiu` VALUES ('206', '', '2819', 'Fabricación de otros tipos de maquinaria y equipo de uso general n.c.p.');
INSERT INTO `ciiu` VALUES ('207', '282', '', 'Fabricación de maquinaria y equipo de uso especial');
INSERT INTO `ciiu` VALUES ('208', '', '2821', 'Fabricación de maquinaria agropecuaria y forestal');
INSERT INTO `ciiu` VALUES ('209', '', '2822', 'Fabricación de máquinas formadoras de metal y de máquinas herramienta');
INSERT INTO `ciiu` VALUES ('210', '', '2823', 'Fabricación de maquinaria para la metalurgia');
INSERT INTO `ciiu` VALUES ('211', '', '2824', 'Fabricación de maquinaria para explotación de minas y canteras y para obras de construcción');
INSERT INTO `ciiu` VALUES ('212', '', '2825', 'Fabricación de maquinaria para la elaboración de alimentos, bebidas y tabaco');
INSERT INTO `ciiu` VALUES ('213', '', '2826', 'Fabricación de maquinaria para la elaboración de productos textiles, prendas de vestir y cueros');
INSERT INTO `ciiu` VALUES ('214', '', '2829', 'Fabricación de otros tipos de maquinaria y equipo de uso especial n.c.p.');
INSERT INTO `ciiu` VALUES ('215', '291', '2910', 'Fabricación de vehículos automotores y sus motores');
INSERT INTO `ciiu` VALUES ('216', '292', '2920', 'Fabricación de carrocerías para vehículos automotores; fabricación de remolques y semirremolques ');
INSERT INTO `ciiu` VALUES ('217', '293', '2930', 'Fabricación de partes, piezas (autopartes) y accesorios (lujos) para vehículos automotores');
INSERT INTO `ciiu` VALUES ('218', '301', '', 'Construcción de barcos y otras embarcaciones');
INSERT INTO `ciiu` VALUES ('219', '', '3011', 'Construcción de barcos y de estructuras flotantes');
INSERT INTO `ciiu` VALUES ('220', '', '3012', 'Construcción de embarcaciones de recreo y deporte');
INSERT INTO `ciiu` VALUES ('221', '302', '3020', 'Fabricación de locomotoras y de material rodante para ferrocarriles');
INSERT INTO `ciiu` VALUES ('222', '303', '3030', 'Fabricación de aeronaves, naves espaciales y de maquinaria conexa');
INSERT INTO `ciiu` VALUES ('223', '304', '3040', 'Fabricación de vehículos militares de combate');
INSERT INTO `ciiu` VALUES ('224', '309', '', 'Fabricación de otros tipos de equipo de transporte n.c.p.');
INSERT INTO `ciiu` VALUES ('225', '', '3091', 'Fabricación de motocicletas');
INSERT INTO `ciiu` VALUES ('226', '', '3092', 'Fabricación de bicicletas y de sillas de ruedas para personas con discapacidad');
INSERT INTO `ciiu` VALUES ('227', '', '3099', 'Fabricación de otros tipos de equipo de transporte n.c.p.');
INSERT INTO `ciiu` VALUES ('228', '311', '3110', 'Fabricación de muebles ');
INSERT INTO `ciiu` VALUES ('229', '312', '3120', 'Fabricación de colchones y somieres');
INSERT INTO `ciiu` VALUES ('230', '321', '3210', 'Fabricación de joyas, bisutería y artículos conexos');
INSERT INTO `ciiu` VALUES ('231', '322', '3220', 'Fabricación de instrumentos musicales');
INSERT INTO `ciiu` VALUES ('232', '323', '3230', 'Fabricación de artículos y equipo para la práctica del deporte');
INSERT INTO `ciiu` VALUES ('233', '324', '3240', 'Fabricación de juegos, juguetes y rompecabezas');
INSERT INTO `ciiu` VALUES ('234', '325', '3250', 'Fabricación de instrumentos, aparatos y materiales médicos y odontológicos (incluido mobiliario)');
INSERT INTO `ciiu` VALUES ('235', '329', '3290', 'Otras industrias manufactureras n.c.p.');
INSERT INTO `ciiu` VALUES ('236', '331', '', 'Mantenimiento y reparación especializado de productos elaborados en metal y de maquinaria y equipo');
INSERT INTO `ciiu` VALUES ('237', '', '3311', 'Mantenimiento y reparación especializado de productos elaborados en metal');
INSERT INTO `ciiu` VALUES ('238', '', '3312', 'Mantenimiento y reparación especializado de maquinaria y equipo');
INSERT INTO `ciiu` VALUES ('239', '', '3313', 'Mantenimiento y reparación especializado de equipo electrónico y óptico');
INSERT INTO `ciiu` VALUES ('240', '', '3314', 'Mantenimiento y reparación especializado de equipo eléctrico');
INSERT INTO `ciiu` VALUES ('241', '', '3315', 'Mantenimiento y reparación especializado de equipo de transporte, excepto los vehículos automotores, motocicletas y bicicletas');
INSERT INTO `ciiu` VALUES ('242', '', '3319', 'Mantenimiento y reparación de otros tipos de equipos y sus componentes n.c.p.');
INSERT INTO `ciiu` VALUES ('243', '332', '3320', 'Instalación especializada de maquinaria y equipo industrial ');
INSERT INTO `ciiu` VALUES ('244', '351', '', 'Generación, transmisión, distribución y comercialización de energía eléctrica');
INSERT INTO `ciiu` VALUES ('245', '', '3511', 'Generación de energía eléctrica');
INSERT INTO `ciiu` VALUES ('246', '', '3512', 'Transmisión de energía eléctrica');
INSERT INTO `ciiu` VALUES ('247', '', '3513', 'Distribución de energía eléctrica');
INSERT INTO `ciiu` VALUES ('248', '', '3514', 'Comercialización de energía eléctrica');
INSERT INTO `ciiu` VALUES ('249', '352', '3520', 'Producción de gas; distribución de combustibles gaseosos por tuberías');
INSERT INTO `ciiu` VALUES ('250', '353', '3530', 'Suministro de vapor y aire acondicionado');
INSERT INTO `ciiu` VALUES ('251', '360', '3600', 'Captación, tratamiento y distribución de agua');
INSERT INTO `ciiu` VALUES ('252', '370', '3700', 'Evacuación y tratamiento de aguas residuales');
INSERT INTO `ciiu` VALUES ('253', '381', '', 'Recolección de desechos');
INSERT INTO `ciiu` VALUES ('254', '', '3811', 'Recolección de desechos no peligrosos');
INSERT INTO `ciiu` VALUES ('255', '', '3812', 'Recolección de desechos peligrosos');
INSERT INTO `ciiu` VALUES ('256', '382', '', 'Tratamiento y disposición de desechos');
INSERT INTO `ciiu` VALUES ('257', '', '3821', 'Tratamiento y disposición de desechos no peligrosos');
INSERT INTO `ciiu` VALUES ('258', '', '3822', 'Tratamiento y disposición de desechos peligrosos');
INSERT INTO `ciiu` VALUES ('259', '383', '3830', 'Recuperación de materiales');
INSERT INTO `ciiu` VALUES ('260', '390', '3900', 'Actividades de saneamiento ambiental y otros servicios de gestión de desechos');
INSERT INTO `ciiu` VALUES ('261', '411', '', 'Construcción de edificios');
INSERT INTO `ciiu` VALUES ('262', '', '4111', 'Construcción de edificios residenciales');
INSERT INTO `ciiu` VALUES ('263', '', '4112', 'Construcción de edificios no residenciales');
INSERT INTO `ciiu` VALUES ('264', '421', '4210', 'Construcción de carreteras y vías de ferrocarril');
INSERT INTO `ciiu` VALUES ('265', '422', '4220', 'Construcción de proyectos de servicio público');
INSERT INTO `ciiu` VALUES ('266', '429', '4290', 'Construcción de otras obras de ingeniería civil');
INSERT INTO `ciiu` VALUES ('267', '431', '', 'Demolición y preparación del terreno');
INSERT INTO `ciiu` VALUES ('268', '', '4311', 'Demolición');
INSERT INTO `ciiu` VALUES ('269', '', '4312', 'Preparación del terreno');
INSERT INTO `ciiu` VALUES ('270', '432', '', 'Instalaciones eléctricas, de fontanería y otras instalaciones especializadas');
INSERT INTO `ciiu` VALUES ('271', '', '4321', 'Instalaciones eléctricas');
INSERT INTO `ciiu` VALUES ('272', '', '4322', 'Instalaciones de fontanería, calefacción y aire acondicionado');
INSERT INTO `ciiu` VALUES ('273', '', '4329', 'Otras instalaciones especializadas');
INSERT INTO `ciiu` VALUES ('274', '433', '4330', 'Terminación y acabado de edificios y obras de ingeniería civil');
INSERT INTO `ciiu` VALUES ('275', '439', '4390', 'Otras actividades especializadas para la construcción de edificios y obras de ingeniería civil');
INSERT INTO `ciiu` VALUES ('276', '451', '', 'Comercio de vehículos automotores');
INSERT INTO `ciiu` VALUES ('277', '', '4511', 'Comercio de vehículos automotores nuevos');
INSERT INTO `ciiu` VALUES ('278', '', '4512', 'Comercio de vehículos automotores usados');
INSERT INTO `ciiu` VALUES ('279', '452', '4520', 'Mantenimiento y reparación de vehículos automotores');
INSERT INTO `ciiu` VALUES ('280', '453', '4530', 'Comercio de partes, piezas (autopartes) y accesorios (lujos) para vehículos automotores');
INSERT INTO `ciiu` VALUES ('281', '454', '', 'Comercio, mantenimiento y reparación de motocicletas y de sus partes, piezas y accesorios');
INSERT INTO `ciiu` VALUES ('282', '', '4541', 'Comercio de motocicletas y de sus partes, piezas y accesorios');
INSERT INTO `ciiu` VALUES ('283', '', '4542', 'Mantenimiento y reparación de motocicletas y de sus partes y piezas');
INSERT INTO `ciiu` VALUES ('284', '461', '4610', 'Comercio al por mayor a cambio de una retribución o por contrata');
INSERT INTO `ciiu` VALUES ('285', '462', '4620', 'Comercio al por mayor de materias primas agropecuarias; animales vivos');
INSERT INTO `ciiu` VALUES ('286', '463', '', 'Comercio al por mayor de alimentos, bebidas y tabaco');
INSERT INTO `ciiu` VALUES ('287', '', '4631', 'Comercio al por mayor de productos alimenticios');
INSERT INTO `ciiu` VALUES ('288', '', '4632', 'Comercio al por mayor de bebidas y tabaco');
INSERT INTO `ciiu` VALUES ('289', '464', '', 'Comercio al por mayor de artículos y enseres domésticos (incluidas prendas de vestir)');
INSERT INTO `ciiu` VALUES ('290', '', '4641', 'Comercio al por mayor de productos textiles, productos confeccionados para uso doméstico');
INSERT INTO `ciiu` VALUES ('291', '', '4642', 'Comercio al por mayor de prendas de vestir');
INSERT INTO `ciiu` VALUES ('292', '', '4643', 'Comercio al por mayor de calzado');
INSERT INTO `ciiu` VALUES ('293', '', '4644', 'Comercio al por mayor de aparatos y equipo de uso doméstico');
INSERT INTO `ciiu` VALUES ('294', '', '4645', 'Comercio al por mayor de productos farmacéuticos, medicinales, cosméticos y de tocador');
INSERT INTO `ciiu` VALUES ('295', '', '4649', 'Comercio al por mayor de otros utensilios domésticos n.c.p.');
INSERT INTO `ciiu` VALUES ('296', '465', '', 'Comercio al por mayor de maquinaria y equipo ');
INSERT INTO `ciiu` VALUES ('297', '', '4651', 'Comercio al por mayor de computadores, equipo periférico y programas de informática');
INSERT INTO `ciiu` VALUES ('298', '', '4652', 'Comercio al por mayor de equipo, partes y piezas electrónicos y de telecomunicaciones');
INSERT INTO `ciiu` VALUES ('299', '', '4653', 'Comercio al por mayor de maquinaria y equipo agropecuarios');
INSERT INTO `ciiu` VALUES ('300', '', '4659', 'Comercio al por mayor de otros tipos de maquinaria y equipo n.c.p.');
INSERT INTO `ciiu` VALUES ('301', '466', '', 'Comercio al por mayor especializado de otros productos');
INSERT INTO `ciiu` VALUES ('302', '', '4661', 'Comercio al por mayor de combustibles sólidos, líquidos, gaseosos y productos conexos');
INSERT INTO `ciiu` VALUES ('303', '', '4662', 'Comercio al por mayor de metales y productos metalíferos');
INSERT INTO `ciiu` VALUES ('304', '', '4663', 'Comercio al por mayor de materiales de construcción, artículos de ferretería, pinturas, productos de vidrio, equipo y materiales de fontanería y calefacción');
INSERT INTO `ciiu` VALUES ('305', '', '4664', 'Comercio al por mayor de productos químicos básicos, cauchos y plásticos en formas primarias y productos químicos de uso agropecuario');
INSERT INTO `ciiu` VALUES ('306', '', '4665', 'Comercio al por mayor de desperdicios, desechos y chatarra');
INSERT INTO `ciiu` VALUES ('307', '', '4669', 'Comercio al por mayor de otros productos n.c.p.');
INSERT INTO `ciiu` VALUES ('308', '469', '4690', 'Comercio al por mayor no especializado');
INSERT INTO `ciiu` VALUES ('309', '471', '', 'Comercio al por menor en establecimientos no especializados');
INSERT INTO `ciiu` VALUES ('310', '', '4711', 'Comercio al por menor en establecimientos no especializados con surtido compuesto principalmente por alimentos, bebidas o tabaco');
INSERT INTO `ciiu` VALUES ('311', '', '4719', 'Comercio al por menor en establecimientos no especializados, con surtido compuesto principalmente por productos diferentes de alimentos (víveres en general), bebidas y tabaco');
INSERT INTO `ciiu` VALUES ('312', '472', '', 'Comercio al por menor de alimentos (víveres en general), bebidas y tabaco, en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('313', '', '4721', 'Comercio al por menor de productos agrícolas para el consumo en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('314', '', '4722', 'Comercio al por menor de leche, productos lácteos y huevos, en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('315', '', '4723', 'Comercio al por menor de carnes (incluye aves de corral), productos cárnicos, pescados y productos de mar, en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('316', '', '4724', 'Comercio al por menor de bebidas y productos del tabaco, en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('317', '', '4729', 'Comercio al por menor de otros productos alimenticios n.c.p., en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('318', '473', '', 'Comercio al por menor de combustible, lubricantes, aditivos y productos de limpieza para automotores, en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('319', '', '4731', 'Comercio al por menor de combustible para automotores');
INSERT INTO `ciiu` VALUES ('320', '', '4732', 'Comercio al por menor de lubricantes (aceites, grasas), aditivos y productos de limpieza para vehículos automotores');
INSERT INTO `ciiu` VALUES ('321', '474', '', 'Comercio al por menor de equipos de informática y de comunicaciones, en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('322', '', '4741', 'Comercio al por menor de computadores, equipos periféricos, programas de informática y equipos de telecomunicaciones en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('323', '', '4742', 'Comercio al por menor de equipos y aparatos de sonido y de video, en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('324', '475', '', 'Comercio al por menor de otros enseres domésticos en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('325', '', '4751', 'Comercio al por menor de productos textiles en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('326', '', '4752', 'Comercio al por menor de artículos de ferretería, pinturas y productos de vidrio en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('327', '', '4753', 'Comercio al por menor de tapices, alfombras y cubrimientos para paredes y pisos en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('328', '', '4754', 'Comercio al por menor de electrodomésticos y gasodomésticos de uso doméstico, muebles y equipos de iluminación');
INSERT INTO `ciiu` VALUES ('329', '', '4755', 'Comercio al por menor de artículos y utensilios de uso doméstico');
INSERT INTO `ciiu` VALUES ('330', '', '4759', 'Comercio al por menor de otros artículos domésticos en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('331', '476', '', 'Comercio al por menor de artículos culturales y de entretenimiento, en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('332', '', '4761', 'Comercio al por menor de libros, periódicos, materiales y artículos de papelería y escritorio, en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('333', '', '4762', 'Comercio al por menor de artículos deportivos, en establecimientos especializados ');
INSERT INTO `ciiu` VALUES ('334', '', '4769', 'Comercio al por menor de otros artículos culturales y de entretenimiento n.c.p. en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('335', '477', '', 'Comercio al por menor de otros productos en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('336', '', '4771', 'Comercio al por menor de prendas de vestir y sus accesorios (incluye artículos de piel) en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('337', '', '4772', 'Comercio al por menor de todo tipo de calzado y artículos de cuero y sucedáneos del cuero en establecimientos especializados.');
INSERT INTO `ciiu` VALUES ('338', '', '4773', 'Comercio al por menor de productos farmacéuticos y medicinales, cosméticos y artículos de tocador en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('339', '', '4774', 'Comercio al por menor de otros productos nuevos en establecimientos especializados');
INSERT INTO `ciiu` VALUES ('340', '', '4775', 'Comercio al por menor de artículos de segunda mano');
INSERT INTO `ciiu` VALUES ('341', '478', '', 'Comercio al por menor en puestos de venta móviles');
INSERT INTO `ciiu` VALUES ('342', '', '4781', 'Comercio al por menor de alimentos, bebidas y tabaco, en puestos de venta móviles');
INSERT INTO `ciiu` VALUES ('343', '', '4782', 'Comercio al por menor de productos textiles, prendas de vestir y calzado, en puestos de venta móviles');
INSERT INTO `ciiu` VALUES ('344', '', '4789', 'Comercio al por menor de otros productos en puestos de venta móviles');
INSERT INTO `ciiu` VALUES ('345', '479', '', 'Comercio al por menor no realizado en establecimientos, puestos de venta o mercados');
INSERT INTO `ciiu` VALUES ('346', '', '4791', 'Comercio al por menor realizado a través de Internet');
INSERT INTO `ciiu` VALUES ('347', '', '4792', 'Comercio al por menor realizado a través de casas de venta o por correo');
INSERT INTO `ciiu` VALUES ('348', '', '4799', 'Otros tipos de comercio al por menor no realizado en establecimientos, puestos de venta o mercados.');
INSERT INTO `ciiu` VALUES ('349', '491', '', 'Transporte férreo');
INSERT INTO `ciiu` VALUES ('350', '', '4911', 'Transporte férreo de pasajeros');
INSERT INTO `ciiu` VALUES ('351', '', '4912', 'Transporte férreo de carga ');
INSERT INTO `ciiu` VALUES ('352', '492', '', 'Transporte terrestre público automotor');
INSERT INTO `ciiu` VALUES ('353', '', '4921', 'Transporte de pasajeros');
INSERT INTO `ciiu` VALUES ('354', '', '4922', 'Transporte mixto');
INSERT INTO `ciiu` VALUES ('355', '', '4923', 'Transporte de carga por carretera');
INSERT INTO `ciiu` VALUES ('356', '493', '4930', 'Transporte por tuberías');
INSERT INTO `ciiu` VALUES ('357', '501', '', 'Transporte marítimo y de cabotaje');
INSERT INTO `ciiu` VALUES ('358', '', '5011', 'Transporte de pasajeros marítimo y de cabotaje ');
INSERT INTO `ciiu` VALUES ('359', '', '5012', 'Transporte de carga marítimo y de cabotaje ');
INSERT INTO `ciiu` VALUES ('360', '502', '', 'Transporte fluvial');
INSERT INTO `ciiu` VALUES ('361', '', '5021', 'Transporte fluvial de pasajeros');
INSERT INTO `ciiu` VALUES ('362', '', '5022', 'Transporte fluvial de carga');
INSERT INTO `ciiu` VALUES ('363', '511', '', 'Transporte aéreo de pasajeros ');
INSERT INTO `ciiu` VALUES ('364', '', '5111', 'Transporte aéreo nacional de pasajeros ');
INSERT INTO `ciiu` VALUES ('365', '', '5112', 'Transporte aéreo internacional de pasajeros ');
INSERT INTO `ciiu` VALUES ('366', '512', '', 'Transporte aéreo de carga ');
INSERT INTO `ciiu` VALUES ('367', '', '5121', 'Transporte aéreo nacional de carga ');
INSERT INTO `ciiu` VALUES ('368', '', '5122', 'Transporte aéreo internacional de carga ');
INSERT INTO `ciiu` VALUES ('369', '521', '5210', 'Almacenamiento y depósito');
INSERT INTO `ciiu` VALUES ('370', '522', '', 'Actividades de las estaciones, vías y servicios complementarios para el transporte');
INSERT INTO `ciiu` VALUES ('371', '', '5221', 'Actividades de estaciones, vías y servicios complementarios para el transporte terrestre');
INSERT INTO `ciiu` VALUES ('372', '', '5222', 'Actividades de puertos y servicios complementarios para el transporte acuático');
INSERT INTO `ciiu` VALUES ('373', '', '5223', 'Actividades de aeropuertos, servicios de navegación aérea y demás actividades conexas al transporte aéreo');
INSERT INTO `ciiu` VALUES ('374', '', '5224', 'Manipulación de carga');
INSERT INTO `ciiu` VALUES ('375', '', '5229', 'Otras actividades complementarias al transporte');
INSERT INTO `ciiu` VALUES ('376', '531', '5310', 'Actividades postales nacionales');
INSERT INTO `ciiu` VALUES ('377', '532', '5320', 'Actividades de mensajería');
INSERT INTO `ciiu` VALUES ('378', '551', '', 'Actividades de alojamiento de estancias cortas');
INSERT INTO `ciiu` VALUES ('379', '', '5511', 'Alojamiento en hoteles ');
INSERT INTO `ciiu` VALUES ('380', '', '5512', 'Alojamiento en apartahoteles');
INSERT INTO `ciiu` VALUES ('381', '', '5513', 'Alojamiento en centros vacacionales ');
INSERT INTO `ciiu` VALUES ('382', '', '5514', 'Alojamiento rural');
INSERT INTO `ciiu` VALUES ('383', '', '5519', 'Otros tipos de alojamientos para visitantes');
INSERT INTO `ciiu` VALUES ('384', '552', '5520', 'Actividades de zonas de camping y parques para vehículos recreacionales');
INSERT INTO `ciiu` VALUES ('385', '553', '5530', 'Servicio por horas ');
INSERT INTO `ciiu` VALUES ('386', '559', '5590', 'Otros tipos de alojamiento n.c.p.');
INSERT INTO `ciiu` VALUES ('387', '561', '', 'Actividades de restaurantes, cafeterías y servicio móvil de comidas');
INSERT INTO `ciiu` VALUES ('388', '', '5611', 'Expendio a la mesa de comidas preparadas');
INSERT INTO `ciiu` VALUES ('389', '', '5612', 'Expendio por autoservicio de comidas preparadas');
INSERT INTO `ciiu` VALUES ('390', '', '5613', 'Expendio de comidas preparadas en cafeterías');
INSERT INTO `ciiu` VALUES ('391', '', '5619', 'Otros tipos de expendio de comidas preparadas n.c.p.');
INSERT INTO `ciiu` VALUES ('392', '562', '', 'Actividades de catering para eventos y otros servicios de comidas');
INSERT INTO `ciiu` VALUES ('393', '', '5621', 'Catering para eventos');
INSERT INTO `ciiu` VALUES ('394', '', '5629', 'Actividades de otros servicios de comidas');
INSERT INTO `ciiu` VALUES ('395', '563', '5630', 'Expendio de bebidas alcohólicas para el consumo dentro del establecimiento');
INSERT INTO `ciiu` VALUES ('396', '581', '', 'Edición de libros, publicaciones periódicas y otras actividades de edición');
INSERT INTO `ciiu` VALUES ('397', '', '5811', 'Edición de libros');
INSERT INTO `ciiu` VALUES ('398', '', '5812', 'Edición de directorios y listas de correo');
INSERT INTO `ciiu` VALUES ('399', '', '5813', 'Edición de periódicos, revistas y otras publicaciones periódicas');
INSERT INTO `ciiu` VALUES ('400', '', '5819', 'Otros trabajos de edición');
INSERT INTO `ciiu` VALUES ('401', '582', '5820', 'Edición de programas de informática (software)');
INSERT INTO `ciiu` VALUES ('402', '591', '', 'Actividades de producción de películas cinematográficas, video y producción de programas, anuncios y comerciales de televisión');
INSERT INTO `ciiu` VALUES ('403', '', '5911', 'Actividades de producción de películas cinematográficas, videos, programas, anuncios y comerciales de televisión');
INSERT INTO `ciiu` VALUES ('404', '', '5912', 'Actividades de posproducción de películas cinematográficas, videos, programas, anuncios y comerciales de televisión');
INSERT INTO `ciiu` VALUES ('405', '', '5913', 'Actividades de distribución de películas cinematográficas, videos, programas, anuncios y comerciales de televisión');
INSERT INTO `ciiu` VALUES ('406', '', '5914', 'Actividades de exhibición de películas cinematográficas y videos');
INSERT INTO `ciiu` VALUES ('407', '592', '5920', 'Actividades de grabación de sonido y edición de musica');
INSERT INTO `ciiu` VALUES ('408', '601', '6010', 'Actividades de programación y transmisión en el servicio de radiodifusión sonora');
INSERT INTO `ciiu` VALUES ('409', '602', '6020', 'Actividades de programación y transmisión de televisión');
INSERT INTO `ciiu` VALUES ('410', '611', '6110', 'Actividades de telecomunicaciones alámbricas');
INSERT INTO `ciiu` VALUES ('411', '612', '6120', 'Actividades de telecomunicaciones inalámbricas');
INSERT INTO `ciiu` VALUES ('412', '613', '6130', 'Actividades de telecomunicación satelital');
INSERT INTO `ciiu` VALUES ('413', '619', '6190', 'Otras actividades de telecomunicaciones');
INSERT INTO `ciiu` VALUES ('414', '620', '', 'Desarrollo de sistemas informáticos (planificación, análisis, diseño, programación, pruebas), consultoría informática y actividades relacionadas');
INSERT INTO `ciiu` VALUES ('415', '', '6201', 'Actividades de desarrollo de sistemas informáticos (planificación, análisis, diseño, programación, pruebas)');
INSERT INTO `ciiu` VALUES ('416', '', '6202', 'Actividades de consultoría informática y actividades de administración de instalaciones informáticas');
INSERT INTO `ciiu` VALUES ('417', '', '6209', 'Otras actividades de tecnologías de información y actividades de servicios informáticos');
INSERT INTO `ciiu` VALUES ('418', '631', '', 'Procesamiento de datos, alojamiento (hosting) y actividades relacionadas; portales web');
INSERT INTO `ciiu` VALUES ('419', '', '6311', 'Procesamiento de datos, alojamiento (hosting) y actividades relacionadas');
INSERT INTO `ciiu` VALUES ('420', '', '6312', 'Portales web');
INSERT INTO `ciiu` VALUES ('421', '639', '', 'Otras actividades de servicio de información');
INSERT INTO `ciiu` VALUES ('422', '', '6391', 'Actividades de agencias de noticias');
INSERT INTO `ciiu` VALUES ('423', '', '6399', 'Otras actividades de servicio de información n.c.p.');
INSERT INTO `ciiu` VALUES ('424', '641', '', 'Intermediación monetaria');
INSERT INTO `ciiu` VALUES ('425', '', '6411', 'Banco Central');
INSERT INTO `ciiu` VALUES ('426', '', '6412', 'Bancos comerciales');
INSERT INTO `ciiu` VALUES ('427', '642', '', 'Otros tipos de intermediación monetaria');
INSERT INTO `ciiu` VALUES ('428', '', '6421', 'Actividades de las corporaciones financieras');
INSERT INTO `ciiu` VALUES ('429', '', '6422', 'Actividades de las compañías de financiamiento');
INSERT INTO `ciiu` VALUES ('430', '', '6423', 'Banca de segundo piso');
INSERT INTO `ciiu` VALUES ('431', '', '6424', 'Actividades de las cooperativas financieras');
INSERT INTO `ciiu` VALUES ('432', '643', '', 'Fideicomisos, fondos (incluye fondos de cesantías) y entidades financieras similares');
INSERT INTO `ciiu` VALUES ('433', '', '6431', 'Fideicomisos, fondos y entidades financieras similares');
INSERT INTO `ciiu` VALUES ('434', '', '6432', 'Fondos de cesantías');
INSERT INTO `ciiu` VALUES ('435', '649', '', 'Otras actividades de servicio financiero, excepto las de seguros y pensiones');
INSERT INTO `ciiu` VALUES ('436', '', '6491', 'Leasing financiero (arrendamiento financiero)');
INSERT INTO `ciiu` VALUES ('437', '', '6492', 'Actividades financieras de fondos de empleados y otras formas asociativas del sector solidario');
INSERT INTO `ciiu` VALUES ('438', '', '6493', 'Actividades de compra de cartera o factoring');
INSERT INTO `ciiu` VALUES ('439', '', '6494', 'Otras actividades de distribución de fondos');
INSERT INTO `ciiu` VALUES ('440', '', '6495', 'Instituciones especiales oficiales');
INSERT INTO `ciiu` VALUES ('441', '', '6499', 'Otras actividades de servicio financiero, excepto las de seguros y pensiones n.c.p.');
INSERT INTO `ciiu` VALUES ('442', '', '6511', 'Seguros generales ');
INSERT INTO `ciiu` VALUES ('443', '', '6512', 'Seguros de vida');
INSERT INTO `ciiu` VALUES ('444', '', '6513', 'Reaseguros');
INSERT INTO `ciiu` VALUES ('445', '', '6514', 'Capitalización');
INSERT INTO `ciiu` VALUES ('446', '652', '', 'Servicios de seguros sociales de salud y riesgos profesionales');
INSERT INTO `ciiu` VALUES ('447', '', '6521', 'Servicios de seguros sociales de salud');
INSERT INTO `ciiu` VALUES ('448', '', '6522', 'Servicios de seguros sociales de riesgos profesionales');
INSERT INTO `ciiu` VALUES ('449', '653', '', 'Servicios de seguros sociales de pensiones');
INSERT INTO `ciiu` VALUES ('450', '', '6531', 'Régimen de prima media con prestación definida (RPM)');
INSERT INTO `ciiu` VALUES ('451', '', '6532', 'Régimen de ahorro individual (RAI)');
INSERT INTO `ciiu` VALUES ('452', '661', '', 'Actividades auxiliares de las actividades de servicios financieros, excepto las de seguros y pensiones');
INSERT INTO `ciiu` VALUES ('453', '', '6611', 'Administración de mercados financieros');
INSERT INTO `ciiu` VALUES ('454', '', '6612', 'Corretaje de valores y de contratos de productos básicos');
INSERT INTO `ciiu` VALUES ('455', '', '6613', 'Otras actividades relacionadas con el mercado de valores');
INSERT INTO `ciiu` VALUES ('456', '', '6614', 'Actividades de las casas de cambio');
INSERT INTO `ciiu` VALUES ('457', '', '6615', 'Actividades de los profesionales de compra y venta de divisas');
INSERT INTO `ciiu` VALUES ('458', '', '6619', 'Otras actividades auxiliares de las actividades de servicios financieros n.c.p.');
INSERT INTO `ciiu` VALUES ('459', '662', '', 'Actividades de servicios auxiliares de los servicios de seguros y pensiones');
INSERT INTO `ciiu` VALUES ('460', '', '6621', 'Actividades de agentes y corredores de seguros');
INSERT INTO `ciiu` VALUES ('461', '', '6629', 'Evaluación de riesgos y daños, y otras actividades de servicios auxiliares');
INSERT INTO `ciiu` VALUES ('462', '663', '6630', 'Actividades de administración de fondos');
INSERT INTO `ciiu` VALUES ('463', '681', '6810', 'Actividades inmobiliarias realizadas con bienes propios o arrendados');
INSERT INTO `ciiu` VALUES ('464', '682', '6820', 'Actividades inmobiliarias realizadas a cambio de una retribución o por contrata ');
INSERT INTO `ciiu` VALUES ('465', '691', '6910', 'Actividades jurídicas');
INSERT INTO `ciiu` VALUES ('466', '692', '6920', 'Actividades de contabilidad, teneduría de libros, auditoría financiera y asesoría tributaria');
INSERT INTO `ciiu` VALUES ('467', '701', '7010', 'Actividades de administración empresarial');
INSERT INTO `ciiu` VALUES ('468', '702', '7020', 'Actividades de consultaría de gestión');
INSERT INTO `ciiu` VALUES ('469', '711', '7110', 'Actividades de arquitectura e ingeniería y otras actividades conexas de consultoría técnica');
INSERT INTO `ciiu` VALUES ('470', '712', '7120', 'Ensayos y análisis técnicos');
INSERT INTO `ciiu` VALUES ('471', '721', '7210', 'Investigaciones y desarrollo experimental en el campo de las ciencias naturales y la ingeniería ');
INSERT INTO `ciiu` VALUES ('472', '722', '7220', 'Investigaciones y desarrollo experimental en el campo de las ciencias sociales y las humanidades');
INSERT INTO `ciiu` VALUES ('473', '731', '7310', 'Publicidad');
INSERT INTO `ciiu` VALUES ('474', '732', '7320', 'Estudios de mercado y realización de encuestas de opinión pública');
INSERT INTO `ciiu` VALUES ('475', '741', '7410', 'Actividades especializadas de diseño ');
INSERT INTO `ciiu` VALUES ('476', '742', '7420', 'Actividades de fotografía');
INSERT INTO `ciiu` VALUES ('477', '749', '7490', 'Otras actividades profesionales, científicas y técnicas n.c.p.');
INSERT INTO `ciiu` VALUES ('478', '', '', 'Actividades veterinarias');
INSERT INTO `ciiu` VALUES ('479', '750', '7500', 'Actividades veterinarias');
INSERT INTO `ciiu` VALUES ('480', '771', '7710', 'Alquiler y arrendamiento de vehículos automotores');
INSERT INTO `ciiu` VALUES ('481', '772', '', 'Alquiler y arrendamiento de efectos personales y enseres domésticos');
INSERT INTO `ciiu` VALUES ('482', '', '7721', 'Alquiler y arrendamiento de equipo recreativo y deportivo');
INSERT INTO `ciiu` VALUES ('483', '', '7722', 'Alquiler de videos y discos ');
INSERT INTO `ciiu` VALUES ('484', '', '7729', 'Alquiler y arrendamiento de otros efectos personales y enseres domésticos n.c.p.');
INSERT INTO `ciiu` VALUES ('485', '773', '7730', 'Alquiler y arrendamiento de otros tipos de maquinaria, equipo y bienes tangibles n.c.p.');
INSERT INTO `ciiu` VALUES ('486', '774', '7740', 'Arrendamiento de propiedad intelectual y productos similares, excepto obras protegidas por derechos de autor');
INSERT INTO `ciiu` VALUES ('487', '781', '7810', 'Actividades de agencias de empleo');
INSERT INTO `ciiu` VALUES ('488', '782', '7820', 'Actividades de agencias de empleo temporal');
INSERT INTO `ciiu` VALUES ('489', '783', '7830', 'Otras actividades de suministro de recurso humano');
INSERT INTO `ciiu` VALUES ('490', '791', '', 'Actividades de las agencias de viajes y operadores turísticos');
INSERT INTO `ciiu` VALUES ('491', '', '7911', 'Actividades de las agencias de viaje');
INSERT INTO `ciiu` VALUES ('492', '', '7912', 'Actividades de operadores turísticos');
INSERT INTO `ciiu` VALUES ('493', '799', '7990', 'Otros servicios de reserva y actividades relacionadas');
INSERT INTO `ciiu` VALUES ('494', '801', '8010', 'Actividades de seguridad privada');
INSERT INTO `ciiu` VALUES ('495', '802', '8020', 'Actividades de servicios de sistemas de seguridad');
INSERT INTO `ciiu` VALUES ('496', '803', '8030', 'Actividades de detectives e investigadores privados');
INSERT INTO `ciiu` VALUES ('497', '811', '8110', 'Actividades combinadas de apoyo a instalaciones');
INSERT INTO `ciiu` VALUES ('498', '812', '', 'Actividades de limpieza');
INSERT INTO `ciiu` VALUES ('499', '', '8121', 'Limpieza general interior de edificios');
INSERT INTO `ciiu` VALUES ('500', '', '8129', 'Otras actividades de limpieza de edificios e instalaciones industriales');
INSERT INTO `ciiu` VALUES ('501', '813', '8130', 'Actividades de paisajismo y servicios de mantenimiento conexos');
INSERT INTO `ciiu` VALUES ('502', '821', '', 'Actividades administrativas y de apoyo de oficina');
INSERT INTO `ciiu` VALUES ('503', '', '8211', 'Actividades combinadas de servicios administrativos de oficina');
INSERT INTO `ciiu` VALUES ('504', '', '8219', 'Fotocopiado, preparación de documentos y otras actividades especializadas de apoyo a oficina');
INSERT INTO `ciiu` VALUES ('505', '822', '8220', 'Actividades de centros de llamadas (Call center)');
INSERT INTO `ciiu` VALUES ('506', '823', '8230', 'Organización de convenciones y eventos comerciales');
INSERT INTO `ciiu` VALUES ('507', '829', '', 'Actividades de servicios de apoyo a las empresas n.c.p.');
INSERT INTO `ciiu` VALUES ('508', '', '8291', 'Actividades de agencias de cobranza y oficinas de calificación crediticia');
INSERT INTO `ciiu` VALUES ('509', '', '8292', 'Actividades de envase y empaque');
INSERT INTO `ciiu` VALUES ('510', '', '8299', 'Otras actividades de servicio de apoyo a las empresas n.c.p.');
INSERT INTO `ciiu` VALUES ('511', '841', '', 'Administración del Estado y aplicación de la política económica y social de la comunidad');
INSERT INTO `ciiu` VALUES ('512', '', '8411', 'Actividades legislativas de la administración pública');
INSERT INTO `ciiu` VALUES ('513', '', '8412', 'Actividades ejecutivas de la administración pública');
INSERT INTO `ciiu` VALUES ('514', '', '8413', 'Regulación de las actividades de organismos que prestan servicios de salud, educativos, culturales y otros servicios sociales, excepto servicios de seguridad social ');
INSERT INTO `ciiu` VALUES ('515', '', '8414', 'Actividades reguladoras y facilitadoras de la actividad económica');
INSERT INTO `ciiu` VALUES ('516', '', '8415', 'Actividades de los otros órganos de control');
INSERT INTO `ciiu` VALUES ('517', '842', '', 'Prestación de servicios a la comunidad en general');
INSERT INTO `ciiu` VALUES ('518', '', '8421', 'Relaciones exteriores ');
INSERT INTO `ciiu` VALUES ('519', '', '8422', 'Actividades de defensa');
INSERT INTO `ciiu` VALUES ('520', '', '8423', 'Orden público y actividades de seguridad');
INSERT INTO `ciiu` VALUES ('521', '', '8424', 'Administración de justicia');
INSERT INTO `ciiu` VALUES ('522', '843', '8430', 'Actividades de planes de seguridad social de afiliación obligatoria');
INSERT INTO `ciiu` VALUES ('523', '851', '', 'Educación de la primera infancia, preescolar y básica primaria');
INSERT INTO `ciiu` VALUES ('524', '', '8511', 'Educación de la primera infancia');
INSERT INTO `ciiu` VALUES ('525', '', '8512', 'Educación preescolar');
INSERT INTO `ciiu` VALUES ('526', '', '8513', 'Educación básica primaria');
INSERT INTO `ciiu` VALUES ('527', '852', '', 'Educación secundaria y de formación laboral');
INSERT INTO `ciiu` VALUES ('528', '', '8521', 'Educación básica secundaria ');
INSERT INTO `ciiu` VALUES ('529', '', '8522', 'Educación media académica');
INSERT INTO `ciiu` VALUES ('530', '', '8523', 'Educación media técnica y de formación laboral');
INSERT INTO `ciiu` VALUES ('531', '853', '8530', 'Establecimientos que combinan diferentes niveles de educación ');
INSERT INTO `ciiu` VALUES ('532', '854', '', 'Educación superior');
INSERT INTO `ciiu` VALUES ('533', '', '8541', 'Educación técnica profesional');
INSERT INTO `ciiu` VALUES ('534', '', '8542', 'Educación tecnológica');
INSERT INTO `ciiu` VALUES ('535', '', '8543', 'Educación de instituciones universitarias o de escuelas tecnológicas');
INSERT INTO `ciiu` VALUES ('536', '', '8544', 'Educación de universidades');
INSERT INTO `ciiu` VALUES ('537', '855', '', 'Otros tipos de educación');
INSERT INTO `ciiu` VALUES ('538', '', '8551', 'Formación académica no formal ');
INSERT INTO `ciiu` VALUES ('539', '', '8552', 'Enseñanza deportiva y recreativa');
INSERT INTO `ciiu` VALUES ('540', '', '8553', 'Enseñanza cultural');
INSERT INTO `ciiu` VALUES ('541', '', '8559', 'Otros tipos de educación n.c.p.');
INSERT INTO `ciiu` VALUES ('542', '856', '8560', 'Actividades de apoyo a la educación');
INSERT INTO `ciiu` VALUES ('543', '', '', 'Actividades de atención de la salud humana');
INSERT INTO `ciiu` VALUES ('544', '861', '8610', 'Actividades de hospitales y clínicas, con internación');
INSERT INTO `ciiu` VALUES ('545', '862', '', 'Actividades de práctica médica y odontológica, sin internación ');
INSERT INTO `ciiu` VALUES ('546', '', '8621', 'Actividades de la práctica médica, sin internación');
INSERT INTO `ciiu` VALUES ('547', '', '8622', 'Actividades de la práctica odontológica');
INSERT INTO `ciiu` VALUES ('548', '869', '', 'Otras actividades de atención relacionadas con la salud humana');
INSERT INTO `ciiu` VALUES ('549', '', '8691', 'Actividades de apoyo diagnóstico');
INSERT INTO `ciiu` VALUES ('550', '', '8692', 'Actividades de apoyo terapéutico');
INSERT INTO `ciiu` VALUES ('551', '', '8699', 'Otras actividades de atención de la salud humana');
INSERT INTO `ciiu` VALUES ('552', '871', '8710', 'Actividades de atención residencial medicalizada de tipo general');
INSERT INTO `ciiu` VALUES ('553', '872', '8720', 'Actividades de atención residencial, para el cuidado de pacientes con retardo mental, enfermedad mental y consumo de sustancias psicoactivas');
INSERT INTO `ciiu` VALUES ('554', '873', '8730', 'Actividades de atención en instituciones para el cuidado de personas mayores y/o discapacitadas');
INSERT INTO `ciiu` VALUES ('555', '879', '8790', 'Otras actividades de atención en instituciones con alojamiento');
INSERT INTO `ciiu` VALUES ('556', '881', '8810', 'Actividades de asistencia social sin alojamiento para personas mayores y discapacitadas');
INSERT INTO `ciiu` VALUES ('557', '889', '8890', 'Otras actividades de asistencia social sin alojamiento');
INSERT INTO `ciiu` VALUES ('558', '900', '', 'Actividades creativas, artísticas y de entretenimiento ');
INSERT INTO `ciiu` VALUES ('559', '', '9001', 'Creación literaria');
INSERT INTO `ciiu` VALUES ('560', '', '9002', 'Creación musical');
INSERT INTO `ciiu` VALUES ('561', '', '9003', 'Creación teatral');
INSERT INTO `ciiu` VALUES ('562', '', '9004', 'Creación audiovisual');
INSERT INTO `ciiu` VALUES ('563', '', '9005', 'Artes plásticas y visuales');
INSERT INTO `ciiu` VALUES ('564', '', '9006', 'Actividades teatrales');
INSERT INTO `ciiu` VALUES ('565', '', '9007', 'Actividades de espectáculos musicales en vivo');
INSERT INTO `ciiu` VALUES ('566', '', '9008', 'Otras actividades de espectáculos en vivo');
INSERT INTO `ciiu` VALUES ('567', '910', '', 'Actividades de bibliotecas, archivos, museos y otras actividades culturales');
INSERT INTO `ciiu` VALUES ('568', '', '9101', 'Actividades de bibliotecas y archivos');
INSERT INTO `ciiu` VALUES ('569', '', '9102', 'Actividades y funcionamiento de museos, conservación de edificios y sitios históricos');
INSERT INTO `ciiu` VALUES ('570', '', '9103', 'Actividades de jardines botánicos, zoológicos y reservas naturales');
INSERT INTO `ciiu` VALUES ('571', '920', '9200', 'Actividades de juegos de azar y apuestas');
INSERT INTO `ciiu` VALUES ('572', '931', '', 'Actividades deportivas');
INSERT INTO `ciiu` VALUES ('573', '', '9311', 'Gestión de instalaciones deportivas');
INSERT INTO `ciiu` VALUES ('574', '', '9312', 'Actividades de clubes deportivos');
INSERT INTO `ciiu` VALUES ('575', '', '9319', 'Otras actividades deportivas');
INSERT INTO `ciiu` VALUES ('576', '932', '', 'Otras actividades recreativas y de esparcimiento');
INSERT INTO `ciiu` VALUES ('577', '', '9321', 'Actividades de parques de atracciones y parques temáticos');
INSERT INTO `ciiu` VALUES ('578', '', '9329', 'Otras actividades recreativas y de esparcimiento n.c.p.');
INSERT INTO `ciiu` VALUES ('579', '941', '', 'Actividades de asociaciones empresariales y de empleadores, ');
INSERT INTO `ciiu` VALUES ('580', '', '', 'y asociaciones profesionales ');
INSERT INTO `ciiu` VALUES ('581', '', '9411', 'Actividades de asociaciones empresariales y de empleadores');
INSERT INTO `ciiu` VALUES ('582', '', '9412', 'Actividades de asociaciones profesionales');
INSERT INTO `ciiu` VALUES ('583', '942', '9420', 'Actividades de sindicatos de empleados');
INSERT INTO `ciiu` VALUES ('584', '949', '', 'Actividades de otras asociaciones');
INSERT INTO `ciiu` VALUES ('585', '', '9491', 'Actividades de asociaciones religiosas');
INSERT INTO `ciiu` VALUES ('586', '', '9492', 'Actividades de asociaciones políticas');
INSERT INTO `ciiu` VALUES ('587', '', '9499', 'Actividades de otras asociaciones n.c.p.');
INSERT INTO `ciiu` VALUES ('588', '951', '', 'Mantenimiento y reparación de computadores y equipo de comunicaciones');
INSERT INTO `ciiu` VALUES ('589', '', '9511', 'Mantenimiento y reparación de computadores y de equipo periférico');
INSERT INTO `ciiu` VALUES ('590', '', '9512', 'Mantenimiento y reparación de equipos de comunicación');
INSERT INTO `ciiu` VALUES ('591', '952', '', 'Mantenimiento y reparación de efectos personales y enseres domésticos');
INSERT INTO `ciiu` VALUES ('592', '', '9521', 'Mantenimiento y reparación de aparatos electrónicos de consumo');
INSERT INTO `ciiu` VALUES ('593', '', '9522', 'Mantenimiento y reparación de aparatos y equipos domésticos y de jardinería ');
INSERT INTO `ciiu` VALUES ('594', '', '9524', 'Reparación de muebles y accesorios para el hogar');
INSERT INTO `ciiu` VALUES ('595', '', '9529', 'Mantenimiento y reparación de otros efectos personales y enseres domésticos');
INSERT INTO `ciiu` VALUES ('596', '960', '', 'Otras actividades de servicios personales');
INSERT INTO `ciiu` VALUES ('597', '', '9601', 'Lavado y limpieza, incluso la limpieza en seco, de productos textiles y de piel');
INSERT INTO `ciiu` VALUES ('598', '', '9602', 'Peluquería y otros tratamientos de belleza');
INSERT INTO `ciiu` VALUES ('599', '', '9603', 'Pompas fúnebres y actividades relacionadas');
INSERT INTO `ciiu` VALUES ('600', '', '9609', 'Otras actividades de servicios personales n.c.p.');
INSERT INTO `ciiu` VALUES ('601', '970', '9700', 'Actividades de los hogares individuales como empleadores de personal doméstico');
INSERT INTO `ciiu` VALUES ('602', '981', '9810', 'Actividades no diferenciadas de los hogares individuales como productores de bienes para uso propio');
INSERT INTO `ciiu` VALUES ('603', '982', '9820', 'Actividades no diferenciadas de los hogares individuales como productores de servicios para uso propio');
INSERT INTO `ciiu` VALUES ('604', '990', '9900', 'Actividades de organizaciones y entidades extraterritoriales');
INSERT INTO `ciiu` VALUES ('605', '', '0010   ', 'Asalariados');
INSERT INTO `ciiu` VALUES ('606', '', '0081   ', 'Personas naturales sin actividad económica');
INSERT INTO `ciiu` VALUES ('607', '', '0082   ', 'Personas naturales subsidiadas por terceros');
INSERT INTO `ciiu` VALUES ('608', '', '0090   ', 'Rentistas de capital, solo para personas naturales');

-- ----------------------------
-- Table structure for `ciudad`
-- ----------------------------
DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE `ciudad` (
  `ciu_id` int(11) NOT NULL AUTO_INCREMENT,
  `ciu_nombre` varchar(255) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`ciu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ciudad
-- ----------------------------
INSERT INTO `ciudad` VALUES ('43', 'Bogota D.C.', 'S');
INSERT INTO `ciudad` VALUES ('44', 'Cali', 'S');
INSERT INTO `ciudad` VALUES ('45', 'Medellin', 'S');
INSERT INTO `ciudad` VALUES ('46', 'Barranquilla', 'S');
INSERT INTO `ciudad` VALUES ('47', 'Bucaramanga', 'S');
INSERT INTO `ciudad` VALUES ('48', 'medellin', 'S');

-- ----------------------------
-- Table structure for `clientes`
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES ('1', 'sadf', null, '0', null, '2015-01-12', '2015-01-12', 'Activo', '', null);
INSERT INTO `clientes` VALUES ('2', 'dd', null, '0', null, '2015-01-12', '2015-01-12', 'Activo', '', 'S');
INSERT INTO `clientes` VALUES ('3', 'asd', null, '3', null, '0000-00-00', '0000-00-00', 'Activo', '', 'S');
INSERT INTO `clientes` VALUES ('4', 'nelson', null, '3', null, '0000-00-00', '0000-00-00', 'Inactivo', '', 'S');
INSERT INTO `clientes` VALUES ('5', 'nelson', null, '3', null, '0000-00-00', '0000-00-00', 'Activo', '', 'S');
INSERT INTO `clientes` VALUES ('6', 'nelson', null, '0', null, '0000-00-00', '0000-00-00', 'Activo', '', 'S');
INSERT INTO `clientes` VALUES ('7', 'nelson', null, '0', null, '0000-00-00', '0000-00-00', 'Activo', '', 'S');
INSERT INTO `clientes` VALUES ('8', 'nelson', null, '0', null, '0000-00-00', '0000-00-00', 'Activo', '', 'S');
INSERT INTO `clientes` VALUES ('9', 'nelson', null, '0', null, '0000-00-00', '0000-00-00', '', '', 'S');
INSERT INTO `clientes` VALUES ('10', 'nelson', null, '0', null, '0000-00-00', '0000-00-00', '', '', 'S');
INSERT INTO `clientes` VALUES ('11', 'nelson', null, '0', null, '0000-00-00', '0000-00-00', 'Inactivo', '', 'S');
INSERT INTO `clientes` VALUES ('12', 'Hospital san Ignacio', null, '7', null, '2015-09-01', '2015-12-31', 'Activo', '', 'S');
INSERT INTO `clientes` VALUES ('13', 'Andres Otalora', null, '8', null, '2015-04-01', '2016-02-04', 'Activo', 'jjjj@hotmail.com', 'S');

-- ----------------------------
-- Table structure for `contacto`
-- ----------------------------
DROP TABLE IF EXISTS `contacto`;
CREATE TABLE `contacto` (
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

-- ----------------------------
-- Records of contacto
-- ----------------------------
INSERT INTO `contacto` VALUES ('1', '234', '345', null, null, '345', '345', '345', '345', '345', null, null, 'S');
INSERT INTO `contacto` VALUES ('2', '1234567890', 'NELSON', null, null, 'CL 60', '123', '30023', '123@hh.com', 'NELSON', 'SI', 'SI', 'S');
INSERT INTO `contacto` VALUES ('3', '213', '123', 'Inactivo', null, '123', '123', '312', '123', '123', '', 'SI', 'S');
INSERT INTO `contacto` VALUES ('4', '11', '213', 'Inactivo', null, '123', '123', '123', '123', '123', '', '', 'S');
INSERT INTO `contacto` VALUES ('5', '52865386', 'gina paola', 'Activo', null, 'Calle 127  20-45 Bogotá', '6786779', '320787897', 'jj@hotmail.com', 'hija', 'SI', '', 'S');
INSERT INTO `contacto` VALUES ('6', '90675678', 'María ballen', 'Activo', null, 'calle 97 # 45-68', '897867896', '320878678', 'monicayrod@hotmail.com', 'hija', 'SI', '', 'S');

-- ----------------------------
-- Table structure for `dimension`
-- ----------------------------
DROP TABLE IF EXISTS `dimension`;
CREATE TABLE `dimension` (
  `dim_id` int(11) NOT NULL AUTO_INCREMENT,
  `dim_codigo` varchar(10) NOT NULL,
  `dim_descripcion` varchar(1000) NOT NULL,
  PRIMARY KEY (`dim_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dimension
-- ----------------------------
INSERT INTO `dimension` VALUES ('9', '234', 'prueba');

-- ----------------------------
-- Table structure for `dimension2`
-- ----------------------------
DROP TABLE IF EXISTS `dimension2`;
CREATE TABLE `dimension2` (
  `dim_id` int(11) NOT NULL AUTO_INCREMENT,
  `dim_codigo` varchar(10) NOT NULL,
  `dim_descripcion` varchar(1000) NOT NULL,
  PRIMARY KEY (`dim_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dimension2
-- ----------------------------
INSERT INTO `dimension2` VALUES ('1', '', '');
INSERT INTO `dimension2` VALUES ('2', '', '');
INSERT INTO `dimension2` VALUES ('3', '213', 'fv');
INSERT INTO `dimension2` VALUES ('4', '213', 'fv');
INSERT INTO `dimension2` VALUES ('5', '213', 'fvddd');
INSERT INTO `dimension2` VALUES ('6', 'gfdfg', 'ergt');

-- ----------------------------
-- Table structure for `empleado`
-- ----------------------------
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
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

-- ----------------------------
-- Records of empleado
-- ----------------------------
INSERT INTO `empleado` VALUES ('1', '123456', 'xyz', '', '0', '0000-00-00', '0', '0', '0', '', '', '0', '', '0', '1', '0000-00-00', '0000-00-00', '', '0000-00-00', '0', '0', '0', '0', '0', null, null, null);
INSERT INTO `empleado` VALUES ('2', '213456', 'gerson javier', 'Barbosa Romero', '1', '0000-00-00', '34', '50', '1234567', 'calle 60 60 60', 'gerson', '1234567', 'javierbr12@hotmail.com', '0', '1', '0000-00-00', '0000-00-00', '', '0000-00-00', '0', '0', '9', '3', '40', '', null, null);
INSERT INTO `empleado` VALUES ('3', '213456', 'gerson javier', 'Barbosa Romero', '1', '0000-00-00', '34', '50', '1234567', 'calle 60 60 60', 'gerson', '1234567', 'javierbr12@hotmail.com', '0', '1', '0000-00-00', '0000-00-00', '', '0000-00-00', '0', '0', '9', '3', '40', '', null, null);
INSERT INTO `empleado` VALUES ('4', '213456', 'gerson javier', 'Barbosa Romero', '1', '0000-00-00', '34', '50', '1234567', 'calle 60 60 60', 'gerson', '1234567', 'javierbr12@hotmail.com', '0', '1', '0000-00-00', '0000-00-00', '', '0000-00-00', '0', '0', '9', '3', '40', '', null, null);
INSERT INTO `empleado` VALUES ('5', '123123', '<script>alert(\'hola\')</script>', 'asdfadsf', '1', '0000-00-00', '0', '0', '234234', 'asdf', '', '0', 'adfadsf', '0', '1', '0000-00-00', '0000-00-00', '', '0000-00-00', '0', '0', '0', '0', '41', '', null, null);

-- ----------------------------
-- Table structure for `empresa`
-- ----------------------------
DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
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

-- ----------------------------
-- Records of empresa
-- ----------------------------
INSERT INTO `empresa` VALUES ('2', 'nygsoft s.a.s', '1234567', 'calle 60', '0', 'MI', '3', '12', '9', '4', 'xyz', null);

-- ----------------------------
-- Table structure for `equipo_examen_variable`
-- ----------------------------
DROP TABLE IF EXISTS `equipo_examen_variable`;
CREATE TABLE `equipo_examen_variable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `examen_cod` int(11) DEFAULT '0',
  `variable_codigo` int(11) DEFAULT '0',
  `id_equipo` int(11) DEFAULT '0',
  `estado` varchar(100) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of equipo_examen_variable
-- ----------------------------
INSERT INTO `equipo_examen_variable` VALUES ('1', '7', '3', '11', 'EN TRANSITO');
INSERT INTO `equipo_examen_variable` VALUES ('2', '7', '4', '11', 'ASIGNADO');
INSERT INTO `equipo_examen_variable` VALUES ('3', '7', '5', '11', 'DISPONIBLE');
INSERT INTO `equipo_examen_variable` VALUES ('4', '8', '3', '11', 'EN TRANSITO');
INSERT INTO `equipo_examen_variable` VALUES ('5', '8', '6', '11', 'MANTENIMIENTO');
INSERT INTO `equipo_examen_variable` VALUES ('6', '8', '3', '11', 'EN OPERACIÓN');
INSERT INTO `equipo_examen_variable` VALUES ('7', '7', '3', '12', 'EN TRANSITO');
INSERT INTO `equipo_examen_variable` VALUES ('8', '7', '4', '12', 'ASIGNADO');
INSERT INTO `equipo_examen_variable` VALUES ('9', '7', '5', '12', 'DISPONIBLE');
INSERT INTO `equipo_examen_variable` VALUES ('10', '8', '3', '12', 'EN TRANSITO');
INSERT INTO `equipo_examen_variable` VALUES ('11', '8', '6', '12', 'MANTENIMIENTO');
INSERT INTO `equipo_examen_variable` VALUES ('12', '8', '3', '12', 'EN OPERACIÓN');
INSERT INTO `equipo_examen_variable` VALUES ('17', '7', '6', '13', 'DISPONIBLE');
INSERT INTO `equipo_examen_variable` VALUES ('18', '7', '6', '14', '0');
INSERT INTO `equipo_examen_variable` VALUES ('19', '8', '4', '14', '0');
INSERT INTO `equipo_examen_variable` VALUES ('20', '7', '6', '14', '0');
INSERT INTO `equipo_examen_variable` VALUES ('21', '7', '6', '15', '0');
INSERT INTO `equipo_examen_variable` VALUES ('22', '8', '4', '15', '0');

-- ----------------------------
-- Table structure for `equipos`
-- ----------------------------
DROP TABLE IF EXISTS `equipos`;
CREATE TABLE `equipos` (
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of equipos
-- ----------------------------
INSERT INTO `equipos` VALUES ('1', '123', null, 'DISPONIBLE', '123', '123', '', '0000-00-00 00:00:00', '1', '', 'nelson', '', 'N', '0000-00-00 00:00:00', '', '', '4', '3');
INSERT INTO `equipos` VALUES ('2', 'sdf', null, 'Activo', 'sdfs', '324', '', '0000-00-00 00:00:00', '3', 'escudo-1.jpg', '', '', 'N', '0000-00-00 00:00:00', '', '', '0', '0');
INSERT INTO `equipos` VALUES ('3', 'nelson', null, 'DISPONIBLE', 'hhhh', '777', '6666', '2015-09-14 00:00:00', '3', '', '', '', 'N', '0000-00-00 00:00:00', '', '', '4', '3');
INSERT INTO `equipos` VALUES ('4', 'medidor de signos vitales 2', null, 'DISPONIBLE', 'almacen', '7798098089', '', '2015-09-23 00:00:00', '7', 'DCD.png', '', '', 'S', '0000-00-00 00:00:00', '', '', '7', '3');
INSERT INTO `equipos` VALUES ('5', 'df', null, 'DISPONIBLE', 'dfs', '23', '', '0000-00-00 00:00:00', '1', '0.jpg', '', '', 'N', '0000-00-00 00:00:00', '', 'escudo-1.jpg', '4', '0');
INSERT INTO `equipos` VALUES ('6', 'Tensiometro', null, 'DISPONIBLE', 'almacén', '3633920272', 'CISCO', '2015-05-01 00:00:00', '8', 'tensiometro.jpg', '', 'dlfkhdkgdkgfnbfjblkhfkjblfdlbfbfdlnldmn', 'S', '2015-01-01 00:00:00', '', '', '7', '4');
INSERT INTO `equipos` VALUES ('7', null, null, 'DISPONIBLE', null, null, null, null, null, '', null, null, 'S', null, null, '', null, null);
INSERT INTO `equipos` VALUES ('8', '123', null, 'DISPONIBLE', '123', '123', '123', '2015-09-16 00:00:00', '7', '', '123', '123', 'S', '0000-00-00 00:00:00', '', '', '8', null);
INSERT INTO `equipos` VALUES ('9', '2344', null, 'DISPONIBLE', '243', '234', '234', '0000-00-00 00:00:00', '7', '', '', '', 'S', '0000-00-00 00:00:00', '', '', '8', null);
INSERT INTO `equipos` VALUES ('10', '123', null, 'DISPONIBLE', '123', '123', '123', '2015-09-01 00:00:00', '8', null, '', '', 'S', '0000-00-00 00:00:00', '', null, '8', null);
INSERT INTO `equipos` VALUES ('11', '123', null, 'DISPONIBLE', '123', '123', '123', '2015-09-01 00:00:00', '8', null, '', '', 'S', '0000-00-00 00:00:00', '', null, '8', null);
INSERT INTO `equipos` VALUES ('12', '123', null, 'DISPONIBLE', '123', '123', '123', '2015-09-01 00:00:00', '8', null, '', '', 'S', '0000-00-00 00:00:00', '', null, '8', null);
INSERT INTO `equipos` VALUES ('13', 'Tensiometro SIEMENS', null, 'DISPONIBLE', 'almacén', '978740988798', 'SIEMENS', '2006-01-18 00:00:00', '8', 'pago_constructora.png', '', 'khjdhkjhfkjvxhz,fnjhxbxmvb,mnv', 'S', '2015-01-06 00:00:00', 'BASC', 'example_001.pdf', '7', null);
INSERT INTO `equipos` VALUES ('14', 'medidor de signos vitales', null, 'DISPONIBLE', 'almacén', '2974398593855', '', '0000-00-00 00:00:00', '7', null, '', '', 'S', '0000-00-00 00:00:00', '', null, '7', null);
INSERT INTO `equipos` VALUES ('15', 'Tensiometro prueba', null, 'DISPONIBLE', 'almacén', '73639292729', 'SIEMENS', '2015-06-02 00:00:00', '8', 'glucometro.jpg', '', '', 'S', '2015-04-14 00:00:00', '', 'DESCRIPCION PROCESOS MESA DE SERVICIO V1.pdf', '8', null);

-- ----------------------------
-- Table structure for `estado_civil`
-- ----------------------------
DROP TABLE IF EXISTS `estado_civil`;
CREATE TABLE `estado_civil` (
  `EstCiv_id` int(11) NOT NULL AUTO_INCREMENT,
  `EstCiv_Estado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`EstCiv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of estado_civil
-- ----------------------------

-- ----------------------------
-- Table structure for `estados`
-- ----------------------------
DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
  `est_id` int(11) NOT NULL DEFAULT '0',
  `est_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`est_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of estados
-- ----------------------------
INSERT INTO `estados` VALUES ('1', 'Activo');
INSERT INTO `estados` VALUES ('2', 'Inactivo');
INSERT INTO `estados` VALUES ('3', 'Eliminado');

-- ----------------------------
-- Table structure for `examenes`
-- ----------------------------
DROP TABLE IF EXISTS `examenes`;
CREATE TABLE `examenes` (
  `examen_cod` int(11) NOT NULL AUTO_INCREMENT,
  `examen_nombre` varchar(255) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `examen_fecha_creacion` timestamp NULL DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`examen_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of examenes
-- ----------------------------
INSERT INTO `examenes` VALUES ('1', 'prueba1', null, null, null);
INSERT INTO `examenes` VALUES ('2', 'prueba1', null, null, null);
INSERT INTO `examenes` VALUES ('3', 'prueba', null, null, null);
INSERT INTO `examenes` VALUES ('4', 'prueba', 'Inactivo', null, 'N');
INSERT INTO `examenes` VALUES ('5', 'prueba2', null, null, 'N');
INSERT INTO `examenes` VALUES ('6', 'ya :)dd', null, null, 'N');
INSERT INTO `examenes` VALUES ('7', 'Tensión arterial', 'Activo', null, 'S');
INSERT INTO `examenes` VALUES ('8', 'Espirometría', 'Activo', null, 'S');

-- ----------------------------
-- Table structure for `genero`
-- ----------------------------
DROP TABLE IF EXISTS `genero`;
CREATE TABLE `genero` (
  `gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `gen_genero` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`gen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of genero
-- ----------------------------
INSERT INTO `genero` VALUES ('1', 'Masculino');
INSERT INTO `genero` VALUES ('2', 'Femenino');

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'admin', 'Administrator');
INSERT INTO `groups` VALUES ('2', 'members', 'General User');

-- ----------------------------
-- Table structure for `hospital_pacientes`
-- ----------------------------
DROP TABLE IF EXISTS `hospital_pacientes`;
CREATE TABLE `hospital_pacientes` (
  `hosPac_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) DEFAULT NULL,
  `codigo_hospital` int(11) DEFAULT NULL,
  PRIMARY KEY (`hosPac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of hospital_pacientes
-- ----------------------------
INSERT INTO `hospital_pacientes` VALUES ('1', '2', '2');
INSERT INTO `hospital_pacientes` VALUES ('2', '2', '4');

-- ----------------------------
-- Table structure for `hospitales`
-- ----------------------------
DROP TABLE IF EXISTS `hospitales`;
CREATE TABLE `hospitales` (
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

-- ----------------------------
-- Records of hospitales
-- ----------------------------
INSERT INTO `hospitales` VALUES ('1', 'sdf', null, null, 'sdf', '234', '324', 'dsf', 'N');
INSERT INTO `hospitales` VALUES ('2', 'NELSON BARBOSA', 'Activo', null, 'CL 60 B 18 D 36 SUR', '4', '345435', 'ff@hh', 'N');
INSERT INTO `hospitales` VALUES ('3', 'dsf', 'Inactivo', null, '234', '234', '234', '', 'N');
INSERT INTO `hospitales` VALUES ('4', 'Hospital San Rafael', 'Activo', null, 'calle 116 # 89-56 ', '78767898', '320876899', 'gg@hotmail.com', 'S');
INSERT INTO `hospitales` VALUES ('5', 'Hospital San Ignacio', 'Activo', null, 'calle 76 36 - 67', '3445678', '', 'atencionalusuario@gmail.com', 'S');

-- ----------------------------
-- Table structure for `ingreso`
-- ----------------------------
DROP TABLE IF EXISTS `ingreso`;
CREATE TABLE `ingreso` (
  `ing_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_id` int(11) NOT NULL,
  `ing_fechaIngreso` datetime NOT NULL,
  PRIMARY KEY (`ing_id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ingreso
-- ----------------------------
INSERT INTO `ingreso` VALUES ('1', '1', '2015-08-23 08:24:56');
INSERT INTO `ingreso` VALUES ('2', '1', '2015-08-23 08:25:59');
INSERT INTO `ingreso` VALUES ('3', '1', '2015-08-23 08:26:09');
INSERT INTO `ingreso` VALUES ('4', '1', '2015-08-23 08:26:55');
INSERT INTO `ingreso` VALUES ('5', '1', '2015-08-23 08:32:15');
INSERT INTO `ingreso` VALUES ('6', '1', '2015-08-23 18:12:20');
INSERT INTO `ingreso` VALUES ('7', '1', '2015-08-23 18:26:53');
INSERT INTO `ingreso` VALUES ('8', '1', '2015-08-23 20:33:35');
INSERT INTO `ingreso` VALUES ('9', '1', '2015-08-25 05:34:50');
INSERT INTO `ingreso` VALUES ('10', '1', '2015-08-25 20:10:45');
INSERT INTO `ingreso` VALUES ('11', '1', '2015-08-25 20:19:24');
INSERT INTO `ingreso` VALUES ('12', '1', '2015-08-25 20:28:17');
INSERT INTO `ingreso` VALUES ('13', '1', '2015-08-25 21:31:45');
INSERT INTO `ingreso` VALUES ('14', '1', '2015-08-25 21:51:27');
INSERT INTO `ingreso` VALUES ('15', '1', '2015-08-25 22:09:32');
INSERT INTO `ingreso` VALUES ('16', '1', '2015-08-25 22:22:31');
INSERT INTO `ingreso` VALUES ('17', '1', '2015-08-25 22:43:32');
INSERT INTO `ingreso` VALUES ('18', '1', '2015-08-25 22:50:13');
INSERT INTO `ingreso` VALUES ('19', '1', '2015-08-25 23:45:54');
INSERT INTO `ingreso` VALUES ('20', '1', '2015-08-26 00:07:16');
INSERT INTO `ingreso` VALUES ('21', '1', '2015-08-26 02:56:11');
INSERT INTO `ingreso` VALUES ('22', '1', '2015-08-28 00:44:26');
INSERT INTO `ingreso` VALUES ('23', '1', '2015-08-28 03:21:15');
INSERT INTO `ingreso` VALUES ('24', '1', '2015-08-30 00:52:05');
INSERT INTO `ingreso` VALUES ('25', '1', '2015-08-30 18:20:49');
INSERT INTO `ingreso` VALUES ('26', '1', '2015-09-01 02:34:52');
INSERT INTO `ingreso` VALUES ('27', '1', '2015-09-03 05:33:23');
INSERT INTO `ingreso` VALUES ('28', '1', '2015-09-03 13:44:27');
INSERT INTO `ingreso` VALUES ('29', '1', '2015-09-03 14:13:29');
INSERT INTO `ingreso` VALUES ('30', '1', '2015-09-03 14:24:58');
INSERT INTO `ingreso` VALUES ('31', '6', '2015-09-03 14:26:21');
INSERT INTO `ingreso` VALUES ('32', '6', '2015-09-03 16:11:34');
INSERT INTO `ingreso` VALUES ('33', '1', '2015-09-03 16:11:52');
INSERT INTO `ingreso` VALUES ('34', '1', '2015-09-03 16:14:43');
INSERT INTO `ingreso` VALUES ('35', '6', '2015-09-03 16:17:21');
INSERT INTO `ingreso` VALUES ('36', '1', '2015-09-03 16:18:57');
INSERT INTO `ingreso` VALUES ('37', '6', '2015-09-03 16:28:11');
INSERT INTO `ingreso` VALUES ('38', '1', '2015-09-03 16:28:27');
INSERT INTO `ingreso` VALUES ('39', '6', '2015-09-03 16:29:10');
INSERT INTO `ingreso` VALUES ('40', '6', '2015-09-03 17:00:07');
INSERT INTO `ingreso` VALUES ('41', '6', '2015-09-03 17:00:35');
INSERT INTO `ingreso` VALUES ('42', '6', '2015-09-03 17:02:03');
INSERT INTO `ingreso` VALUES ('43', '6', '2015-09-03 17:33:08');
INSERT INTO `ingreso` VALUES ('44', '1', '2015-09-03 17:33:18');
INSERT INTO `ingreso` VALUES ('45', '6', '2015-09-03 17:36:57');
INSERT INTO `ingreso` VALUES ('46', '1', '2015-09-03 18:28:27');
INSERT INTO `ingreso` VALUES ('47', '6', '2015-09-03 18:32:37');
INSERT INTO `ingreso` VALUES ('48', '6', '2015-09-03 21:41:14');
INSERT INTO `ingreso` VALUES ('49', '6', '2015-09-04 01:24:17');
INSERT INTO `ingreso` VALUES ('50', '6', '2015-09-04 01:33:16');
INSERT INTO `ingreso` VALUES ('51', '6', '2015-09-04 15:36:14');
INSERT INTO `ingreso` VALUES ('52', '6', '2015-09-04 17:04:36');
INSERT INTO `ingreso` VALUES ('53', '1', '2015-09-04 17:18:50');
INSERT INTO `ingreso` VALUES ('54', '6', '2015-09-04 17:48:48');
INSERT INTO `ingreso` VALUES ('55', '1', '2015-09-04 17:49:48');
INSERT INTO `ingreso` VALUES ('56', '6', '2015-09-04 17:52:06');
INSERT INTO `ingreso` VALUES ('57', '6', '2015-09-04 17:53:03');
INSERT INTO `ingreso` VALUES ('58', '1', '2015-09-04 17:53:33');
INSERT INTO `ingreso` VALUES ('59', '6', '2015-09-04 17:55:00');
INSERT INTO `ingreso` VALUES ('60', '6', '2015-09-04 18:48:44');
INSERT INTO `ingreso` VALUES ('61', '1', '2015-09-04 19:17:26');
INSERT INTO `ingreso` VALUES ('62', '6', '2015-09-04 19:17:50');
INSERT INTO `ingreso` VALUES ('63', '1', '2015-09-04 19:18:04');
INSERT INTO `ingreso` VALUES ('64', '6', '2015-09-04 19:21:28');
INSERT INTO `ingreso` VALUES ('65', '6', '2015-09-07 16:55:54');
INSERT INTO `ingreso` VALUES ('66', '6', '2015-09-07 18:40:36');
INSERT INTO `ingreso` VALUES ('67', '1', '2015-09-07 19:09:47');
INSERT INTO `ingreso` VALUES ('68', '6', '2015-09-07 19:10:10');
INSERT INTO `ingreso` VALUES ('69', '6', '2015-09-07 19:12:31');
INSERT INTO `ingreso` VALUES ('70', '6', '2015-09-07 19:21:47');
INSERT INTO `ingreso` VALUES ('71', '6', '2015-09-07 19:51:47');
INSERT INTO `ingreso` VALUES ('72', '6', '2015-09-07 20:01:31');
INSERT INTO `ingreso` VALUES ('73', '1', '2015-09-07 20:05:58');
INSERT INTO `ingreso` VALUES ('74', '6', '2015-09-07 20:13:02');
INSERT INTO `ingreso` VALUES ('75', '6', '2015-09-08 02:23:45');
INSERT INTO `ingreso` VALUES ('76', '6', '2015-09-08 02:45:31');
INSERT INTO `ingreso` VALUES ('77', '6', '2015-09-08 02:50:01');
INSERT INTO `ingreso` VALUES ('78', '6', '2015-09-08 03:36:59');
INSERT INTO `ingreso` VALUES ('79', '6', '2015-09-08 03:41:25');
INSERT INTO `ingreso` VALUES ('80', '6', '2015-09-09 20:32:03');
INSERT INTO `ingreso` VALUES ('81', '6', '2015-09-09 20:42:49');
INSERT INTO `ingreso` VALUES ('82', '6', '2015-09-09 21:18:29');
INSERT INTO `ingreso` VALUES ('83', '6', '2015-09-09 21:36:20');
INSERT INTO `ingreso` VALUES ('84', '1', '2015-09-09 21:54:52');
INSERT INTO `ingreso` VALUES ('85', '1', '2015-09-09 21:59:27');
INSERT INTO `ingreso` VALUES ('86', '1', '2015-09-09 22:22:31');
INSERT INTO `ingreso` VALUES ('87', '1', '2015-09-09 22:39:52');
INSERT INTO `ingreso` VALUES ('88', '1', '2015-09-09 22:39:52');
INSERT INTO `ingreso` VALUES ('89', '1', '2015-09-09 23:24:22');
INSERT INTO `ingreso` VALUES ('90', '6', '2015-09-10 01:57:23');
INSERT INTO `ingreso` VALUES ('91', '6', '2015-09-10 02:05:20');
INSERT INTO `ingreso` VALUES ('92', '6', '2015-09-10 02:06:40');
INSERT INTO `ingreso` VALUES ('93', '6', '2015-09-10 02:11:45');
INSERT INTO `ingreso` VALUES ('94', '1', '2015-09-10 19:27:32');
INSERT INTO `ingreso` VALUES ('95', '1', '2015-09-10 19:46:20');
INSERT INTO `ingreso` VALUES ('96', '1', '2015-09-10 21:45:19');
INSERT INTO `ingreso` VALUES ('97', '1', '2015-09-10 21:49:33');
INSERT INTO `ingreso` VALUES ('98', '6', '2015-09-11 02:06:28');
INSERT INTO `ingreso` VALUES ('99', '6', '2015-09-11 03:47:00');
INSERT INTO `ingreso` VALUES ('100', '48', '2015-09-11 03:49:10');
INSERT INTO `ingreso` VALUES ('101', '6', '2015-09-11 03:49:32');
INSERT INTO `ingreso` VALUES ('102', '48', '2015-09-11 03:50:36');
INSERT INTO `ingreso` VALUES ('103', '6', '2015-09-11 03:50:46');
INSERT INTO `ingreso` VALUES ('104', '48', '2015-09-11 03:51:52');
INSERT INTO `ingreso` VALUES ('105', '6', '2015-09-11 03:52:02');
INSERT INTO `ingreso` VALUES ('106', '6', '2015-09-11 19:40:20');
INSERT INTO `ingreso` VALUES ('107', '6', '2015-09-15 02:43:35');
INSERT INTO `ingreso` VALUES ('108', '6', '2015-09-15 14:47:14');
INSERT INTO `ingreso` VALUES ('109', '6', '2015-09-16 02:04:00');
INSERT INTO `ingreso` VALUES ('110', '6', '2015-09-16 02:04:00');
INSERT INTO `ingreso` VALUES ('111', '6', '2015-09-16 14:37:54');
INSERT INTO `ingreso` VALUES ('112', '6', '2015-09-16 18:16:30');
INSERT INTO `ingreso` VALUES ('113', '6', '2015-09-16 18:33:35');
INSERT INTO `ingreso` VALUES ('114', '6', '2015-09-17 01:54:14');
INSERT INTO `ingreso` VALUES ('115', '1', '2015-09-17 03:32:36');
INSERT INTO `ingreso` VALUES ('116', '6', '2015-09-17 03:40:21');
INSERT INTO `ingreso` VALUES ('117', '6', '2015-09-17 02:05:25');
INSERT INTO `ingreso` VALUES ('118', '6', '2015-09-17 03:08:22');
INSERT INTO `ingreso` VALUES ('119', '6', '2015-09-17 03:34:02');
INSERT INTO `ingreso` VALUES ('120', '6', '2015-09-17 05:06:33');
INSERT INTO `ingreso` VALUES ('121', '6', '2015-09-17 15:17:24');
INSERT INTO `ingreso` VALUES ('122', '6', '2015-09-17 15:19:40');
INSERT INTO `ingreso` VALUES ('123', '6', '2015-09-17 19:05:24');
INSERT INTO `ingreso` VALUES ('124', '6', '2015-09-18 06:18:51');
INSERT INTO `ingreso` VALUES ('125', '6', '2015-09-18 07:15:39');
INSERT INTO `ingreso` VALUES ('126', '6', '2015-09-18 15:57:56');
INSERT INTO `ingreso` VALUES ('127', '6', '2015-09-18 16:46:08');
INSERT INTO `ingreso` VALUES ('128', '6', '2015-09-18 16:56:09');
INSERT INTO `ingreso` VALUES ('129', '6', '2015-09-18 16:58:20');
INSERT INTO `ingreso` VALUES ('130', '6', '2015-09-18 16:59:53');
INSERT INTO `ingreso` VALUES ('131', '6', '2015-09-18 19:24:37');
INSERT INTO `ingreso` VALUES ('132', '6', '2015-09-18 22:08:45');
INSERT INTO `ingreso` VALUES ('133', '6', '2015-09-19 00:27:16');
INSERT INTO `ingreso` VALUES ('134', '6', '2015-09-19 15:21:43');
INSERT INTO `ingreso` VALUES ('135', '6', '2015-09-20 13:41:22');
INSERT INTO `ingreso` VALUES ('136', '6', '2015-09-21 06:04:45');
INSERT INTO `ingreso` VALUES ('137', '6', '2015-09-21 09:00:13');
INSERT INTO `ingreso` VALUES ('138', '6', '2015-09-22 01:59:59');
INSERT INTO `ingreso` VALUES ('139', '6', '2015-09-22 02:28:09');
INSERT INTO `ingreso` VALUES ('140', '6', '2015-09-22 02:45:46');
INSERT INTO `ingreso` VALUES ('141', '6', '2015-09-22 14:34:34');
INSERT INTO `ingreso` VALUES ('142', '6', '2015-09-23 19:57:42');
INSERT INTO `ingreso` VALUES ('143', '6', '2015-09-24 04:44:24');

-- ----------------------------
-- Table structure for `inicio`
-- ----------------------------
DROP TABLE IF EXISTS `inicio`;
CREATE TABLE `inicio` (
  `ini_id` int(11) NOT NULL AUTO_INCREMENT,
  `ini_politicas` longblob,
  `ini_p_inicio` longblob,
  PRIMARY KEY (`ini_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of inicio
-- ----------------------------
INSERT INTO `inicio` VALUES ('1', 0x50656E6469656E7465, 0x50656E6469656E7465);

-- ----------------------------
-- Table structure for `lectura_equipo`
-- ----------------------------
DROP TABLE IF EXISTS `lectura_equipo`;
CREATE TABLE `lectura_equipo` (
  `id_lectura_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  `variable_codigo` int(11) DEFAULT NULL,
  `lectura_numerica` varchar(255) DEFAULT NULL,
  `lectura_texto` text,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` varchar(1) DEFAULT 'S',
  `serial_equipo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_lectura_equipo`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lectura_equipo
-- ----------------------------
INSERT INTO `lectura_equipo` VALUES ('8', '13', null, '4', '30', 'yyyy', '2015-09-20 16:59:15', 'S', '7798098089');
INSERT INTO `lectura_equipo` VALUES ('9', '13', null, '4', '30', 'yyyy', '2015-09-20 17:49:45', 'S', '7798098089');
INSERT INTO `lectura_equipo` VALUES ('10', '13', null, '4', '3', 'yyyy', '2015-09-20 17:51:30', 'S', '7798098089');
INSERT INTO `lectura_equipo` VALUES ('11', '13', null, '4', '3', 'yyyy', '2015-09-20 17:54:51', 'S', '7798098089');
INSERT INTO `lectura_equipo` VALUES ('12', '13', null, '4', '3', 'yyyy', '2015-09-20 17:55:08', 'S', '7798098089');
INSERT INTO `lectura_equipo` VALUES ('13', '13', null, '4', '3', 'yyyy', '2015-09-20 18:03:54', 'S', '7798098089');
INSERT INTO `lectura_equipo` VALUES ('14', '13', null, '4', '3', 'yyyy', '2015-09-20 18:04:39', 'S', '7798098089');
INSERT INTO `lectura_equipo` VALUES ('15', '13', null, '4', '3', 'yyyy', '2015-09-20 18:04:40', 'S', '7798098089');
INSERT INTO `lectura_equipo` VALUES ('16', '13', null, '4', '3', 'yyyy', '2015-09-20 18:04:41', 'S', '7798098089');
INSERT INTO `lectura_equipo` VALUES ('17', '13', null, '4', '3', 'yyyy', '2015-09-20 18:04:42', 'S', '7798098089');
INSERT INTO `lectura_equipo` VALUES ('18', '13', null, '4', '90', 'yyyy', '2015-09-20 18:39:17', 'S', '7798098089');
INSERT INTO `lectura_equipo` VALUES ('19', '13', null, '4', '90', 'yyy', '2015-09-21 21:46:43', 'S', '7798098089');

-- ----------------------------
-- Table structure for `login_attempts`
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for `medicos`
-- ----------------------------
DROP TABLE IF EXISTS `medicos`;
CREATE TABLE `medicos` (
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

-- ----------------------------
-- Records of medicos
-- ----------------------------
INSERT INTO `medicos` VALUES ('1', 'NELSON', null, null, '123', '123', '123', '123', '123@cc.com', 'N');
INSERT INTO `medicos` VALUES ('2', 'ne', null, null, '121d', '123', '123', '123', '123@hh.com', 'N');
INSERT INTO `medicos` VALUES ('3', 'fdg', null, 'Activo', '324', 'dfg', '34', '', '', 'N');
INSERT INTO `medicos` VALUES ('4', '123', null, 'Activo', '123', '123', '1123', '', '', 'N');
INSERT INTO `medicos` VALUES ('5', 'nelson', null, 'Activo', '1233123123', 'ddd', '234', '', '', 'N');
INSERT INTO `medicos` VALUES ('6', 'Juan Pablo angel', null, 'Activo', '172873333443KJL', 'calle 97 # 45-68', '89789090', '', '', 'S');
INSERT INTO `medicos` VALUES ('7', 'Alexander Camargo', null, 'Activo', '172873333443KJL', 'calle 76 36 - 67', '98732937983', '', '', 'S');

-- ----------------------------
-- Table structure for `modulo`
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo` (
  `menu_id` int(5) NOT NULL AUTO_INCREMENT,
  `menu_idpadre` int(5) NOT NULL,
  `menu_nombrepadre` varchar(50) NOT NULL,
  `menu_idhijo` int(5) NOT NULL,
  `menu_controlador` varchar(100) DEFAULT NULL,
  `menu_accion` varchar(100) DEFAULT NULL,
  `menu_estado` int(1) DEFAULT '1' COMMENT 'se le coloca un estado 1 porque esta activo',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES ('65', '74', 'ROLES', '0', 'presentacion', 'roles', '1');
INSERT INTO `modulo` VALUES ('66', '74', 'ROL USUARIO', '0', 'presentacion', 'usuario', '1');
INSERT INTO `modulo` VALUES ('71', '0', 'REPORTES', '71', null, null, '1');
INSERT INTO `modulo` VALUES ('72', '71', 'CREACIÓN DE REPORTES', '0', 'reportes', 'creacionreporte', '1');
INSERT INTO `modulo` VALUES ('73', '71', 'VISUALIZACION DE REPORTES', '0', 'reportes', 'informacionreporte', '1');
INSERT INTO `modulo` VALUES ('74', '0', 'USUARIOS', '74', null, null, '1');
INSERT INTO `modulo` VALUES ('80', '74', 'EMPLEADOS', '0', 'administrativo', 'creacionempleados', '1');
INSERT INTO `modulo` VALUES ('81', '74', 'LISTA EMPLEADOS', '0', 'administrativo', 'listadoempleados', '1');
INSERT INTO `modulo` VALUES ('82', '74', 'CARGOS', '0', 'administrativo', 'cargos', '1');
INSERT INTO `modulo` VALUES ('83', '74', 'USUARIOS', '0', 'administrativo', 'creacionusuarios', '1');
INSERT INTO `modulo` VALUES ('84', '74', 'LISTA USUARIOS', '0', 'administrativo', 'listadousuarios', '1');
INSERT INTO `modulo` VALUES ('85', '74', 'DIMENSION 1', '0', 'administrativo', 'dimension', '1');
INSERT INTO `modulo` VALUES ('86', '74', 'DIMENSIÓN 2', '0', 'administrativo', 'dimension', '1');
INSERT INTO `modulo` VALUES ('87', '74', 'INFORMES', '0', null, null, '1');
INSERT INTO `modulo` VALUES ('88', '0', 'PROYECTO', '88', null, null, '1');
INSERT INTO `modulo` VALUES ('89', '0', 'ConfiguraciÓn', '89', '', '', '1');
INSERT INTO `modulo` VALUES ('90', '0', 'DCS', '0', '', '', '1');
INSERT INTO `modulo` VALUES ('91', '89', 'Hospitales', '91', null, null, '1');
INSERT INTO `modulo` VALUES ('92', '89', 'Contactos', '92', 'Contacto', 'index', '1');
INSERT INTO `modulo` VALUES ('93', '89', 'Aseguradoras', '93', null, null, '1');
INSERT INTO `modulo` VALUES ('94', '89', 'Medicos', '94', null, null, '1');
INSERT INTO `modulo` VALUES ('95', '89', 'Variables', '95', null, null, '1');
INSERT INTO `modulo` VALUES ('96', '89', 'ExÁmenes', '96', '', '', '1');
INSERT INTO `modulo` VALUES ('97', '89', 'Tipo de Equipos', '97', null, null, '1');
INSERT INTO `modulo` VALUES ('98', '89', 'Equipos', '98', null, null, '1');
INSERT INTO `modulo` VALUES ('99', '89', 'Tipo de Clientes', '99', null, null, '1');
INSERT INTO `modulo` VALUES ('100', '89', 'Clientes', '100', null, null, '1');
INSERT INTO `modulo` VALUES ('101', '91', 'Nuevo', '0', 'Hospitales', 'Index', '1');
INSERT INTO `modulo` VALUES ('102', '91', 'Listado', '0', 'Hospitales', 'consult_hospitales', '1');
INSERT INTO `modulo` VALUES ('103', '92', 'Nuevo', '0', 'Contacto', 'index', '1');
INSERT INTO `modulo` VALUES ('104', '92', 'Listado', '0', 'Contacto', 'consult_contacto', '1');
INSERT INTO `modulo` VALUES ('105', '93', 'Nuevo', '0', 'Aseguradoras', 'index', '1');
INSERT INTO `modulo` VALUES ('106', '93', 'Listado', '0', 'Aseguradoras', 'consult_aseguradoras', '1');
INSERT INTO `modulo` VALUES ('107', '94', 'Nuevo', '0', 'Medicos', 'index', '1');
INSERT INTO `modulo` VALUES ('108', '94', 'Listado', '0', 'Medicos', 'consult_medicos', '1');
INSERT INTO `modulo` VALUES ('109', '95', 'Nuevo', '0', 'Variables', 'index', '1');
INSERT INTO `modulo` VALUES ('110', '95', 'Listado', '0', 'Variables', 'consult_variables', '1');
INSERT INTO `modulo` VALUES ('111', '96', 'Nuevo', '0', 'Examenes', 'index', '1');
INSERT INTO `modulo` VALUES ('112', '96', 'Listado', '0', 'Examenes', 'consult_examenes', '1');
INSERT INTO `modulo` VALUES ('113', '97', 'Nuevo', '0', 'Tipo_equipo', 'index', '1');
INSERT INTO `modulo` VALUES ('114', '97', 'Listado', '0', 'Tipo_equipo', 'consult_tipo_equipo', '1');
INSERT INTO `modulo` VALUES ('115', '99', 'Nuevo', '0', 'Tipo_cliente', 'index', '1');
INSERT INTO `modulo` VALUES ('116', '99', 'Listado', '0', 'Tipo_cliente', 'consult_tipo_cliente', '1');
INSERT INTO `modulo` VALUES ('117', '100', 'Nuevo', '0', 'Clientes', 'index', '1');
INSERT INTO `modulo` VALUES ('118', '100', 'Listado', '0', 'Clientes', 'consult_clientes', '1');
INSERT INTO `modulo` VALUES ('119', '89', 'Tipo de alarmas', '119', null, null, '1');
INSERT INTO `modulo` VALUES ('120', '89', 'Niveles de alarma', '120', null, null, '1');
INSERT INTO `modulo` VALUES ('121', '89', 'Protocolos', '121', null, null, '1');
INSERT INTO `modulo` VALUES ('122', '119', 'Nuevo', '0', 'Tipo_alarma', 'index', '1');
INSERT INTO `modulo` VALUES ('123', '119', 'Listado', '0', 'Tipo_alarma', 'consult_tipo_alarma', '1');
INSERT INTO `modulo` VALUES ('124', '120', 'Nuevo', '0', 'Niveles_alarma', 'index', '1');
INSERT INTO `modulo` VALUES ('125', '120', 'Listado', '0', 'Niveles_alarma', 'consult_niveles_alarma', '1');
INSERT INTO `modulo` VALUES ('126', '121', 'Nuevo', '0', 'Protocolos', 'index', '1');
INSERT INTO `modulo` VALUES ('127', '121', 'Listado', '0', 'Protocolos', 'consult_protocolos', '1');
INSERT INTO `modulo` VALUES ('128', '98', 'Nuevo', '0', 'Equipos', 'index', '1');
INSERT INTO `modulo` VALUES ('129', '98', 'Listado', '0', 'Equipos', 'consult_equipos', '1');
INSERT INTO `modulo` VALUES ('130', '89', 'Pacientes', '130', null, null, '1');
INSERT INTO `modulo` VALUES ('131', '130', 'Nuevo', '0', 'Pacientes', 'index', '1');
INSERT INTO `modulo` VALUES ('132', '130', 'Listado', '0', 'Pacientes', 'consult_pacientes', '1');
INSERT INTO `modulo` VALUES ('134', '89', 'Lectura Equipo', '134', null, null, '1');
INSERT INTO `modulo` VALUES ('135', '134', 'Nuevo', '0', 'Lectura_equipo', 'index', '1');
INSERT INTO `modulo` VALUES ('136', '134', 'Listado', '0', 'Lectura_equipo', 'consult_lectura_equipo', '1');
INSERT INTO `modulo` VALUES ('137', '89', 'Alarmas Generadas', '137', null, null, '1');
INSERT INTO `modulo` VALUES ('138', '137', 'Nuevo', '0', 'Alarmas_generadas', 'index', '1');
INSERT INTO `modulo` VALUES ('139', '137', 'Listado', '0', 'Alarmas_generadas', 'consult_alarmas_generadas', '1');
INSERT INTO `modulo` VALUES ('140', '89', 'Datos Paciente', '0', 'alarmas_generadas', 'datos_pacientes', '1');

-- ----------------------------
-- Table structure for `nivel_tipo_alarma`
-- ----------------------------
DROP TABLE IF EXISTS `nivel_tipo_alarma`;
CREATE TABLE `nivel_tipo_alarma` (
  `nivTipAla_id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_alarma` int(11) DEFAULT NULL,
  `id_niveles_alarma` int(11) DEFAULT NULL,
  PRIMARY KEY (`nivTipAla_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nivel_tipo_alarma
-- ----------------------------
INSERT INTO `nivel_tipo_alarma` VALUES ('4', '11', '5');
INSERT INTO `nivel_tipo_alarma` VALUES ('5', '11', '4');

-- ----------------------------
-- Table structure for `niveles_alarma`
-- ----------------------------
DROP TABLE IF EXISTS `niveles_alarma`;
CREATE TABLE `niveles_alarma` (
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
  `id_tipo_alarma` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_niveles_alarma`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of niveles_alarma
-- ----------------------------
INSERT INTO `niveles_alarma` VALUES ('1', 'nelson niveles alarma', '2015-09-08 02:59:01', '4', 'asd', '213', '213', '213', 'Día', '1112', '1', 'N', null);
INSERT INTO `niveles_alarma` VALUES ('2', 'Nivel 1 tensión arterial alta', '2015-09-08 02:59:07', '7', '', '2', '4', '2', 'Semana', 'amarillo', '3', 'N', null);
INSERT INTO `niveles_alarma` VALUES ('3', 'ss', '2015-09-08 02:58:53', '4', 'Baja', '22', '33', '22', 'Semana', '33', '1', 'N', null);
INSERT INTO `niveles_alarma` VALUES ('4', 'Nivel 2 tensión arterial alta', null, '7', 'Alta', '3', '5', '7', 'Semana', 'naranja', '3', 'S', null);
INSERT INTO `niveles_alarma` VALUES ('5', 'Nivel 1 tensión arterial alta', '2015-09-08 03:03:21', '7', 'Alta', '2', '3', '1', 'Semana', 'amarillo', '4', 'S', null);
INSERT INTO `niveles_alarma` VALUES ('6', 'Nivel bajo Tension arterial baja ', null, '7', 'Baja', '1', '2', '1', 'Semana', 'verde ', '4', 'S', null);
INSERT INTO `niveles_alarma` VALUES ('7', 'Nivel medio tensiónarterial baja', null, '7', 'Baja', '3', '4', '1', 'Semana', 'amarillo', '4', 'S', null);
INSERT INTO `niveles_alarma` VALUES ('8', 'Nivel alto tensión arterial baja', '2015-09-20 15:45:50', '8', 'Baja', '5', '7', '1', 'Semana', 'roja', '3', 'S', '9');

-- ----------------------------
-- Table structure for `numero_empleados`
-- ----------------------------
DROP TABLE IF EXISTS `numero_empleados`;
CREATE TABLE `numero_empleados` (
  `numEmp_id` int(11) NOT NULL AUTO_INCREMENT,
  `numEmp_descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`numEmp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of numero_empleados
-- ----------------------------
INSERT INTO `numero_empleados` VALUES ('1', 'Hasta 10 trabajadores');
INSERT INTO `numero_empleados` VALUES ('2', 'De 11 a 50 trabajadores');
INSERT INTO `numero_empleados` VALUES ('3', 'De 51 a 200 trabajadores');
INSERT INTO `numero_empleados` VALUES ('4', 'De 201 o más trabajadores');

-- ----------------------------
-- Table structure for `paciente_contacto`
-- ----------------------------
DROP TABLE IF EXISTS `paciente_contacto`;
CREATE TABLE `paciente_contacto` (
  `id_paciente_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `contacto_id` int(11) NOT NULL DEFAULT '0',
  `id_paciente` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_paciente_contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of paciente_contacto
-- ----------------------------
INSERT INTO `paciente_contacto` VALUES ('1', '2', '2');
INSERT INTO `paciente_contacto` VALUES ('2', '5', '2');
INSERT INTO `paciente_contacto` VALUES ('4', '2', '7');
INSERT INTO `paciente_contacto` VALUES ('5', '2', '8');
INSERT INTO `paciente_contacto` VALUES ('14', '2', '9');
INSERT INTO `paciente_contacto` VALUES ('19', '6', '11');
INSERT INTO `paciente_contacto` VALUES ('23', '6', '13');

-- ----------------------------
-- Table structure for `paciente_equipo_tipoequipo`
-- ----------------------------
DROP TABLE IF EXISTS `paciente_equipo_tipoequipo`;
CREATE TABLE `paciente_equipo_tipoequipo` (
  `id_paciente_equipo_tipoEquipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_equipo_cod` int(11) NOT NULL DEFAULT '0',
  `id_equipo` int(11) NOT NULL DEFAULT '0',
  `id_paciente` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_paciente_equipo_tipoEquipo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of paciente_equipo_tipoequipo
-- ----------------------------
INSERT INTO `paciente_equipo_tipoequipo` VALUES ('5', '0', '6', '11');
INSERT INTO `paciente_equipo_tipoequipo` VALUES ('10', '0', '4', '13');
INSERT INTO `paciente_equipo_tipoequipo` VALUES ('11', '0', '14', '13');

-- ----------------------------
-- Table structure for `paciente_examen_variable`
-- ----------------------------
DROP TABLE IF EXISTS `paciente_examen_variable`;
CREATE TABLE `paciente_examen_variable` (
  `id_paciente_examen_variable` int(11) NOT NULL AUTO_INCREMENT,
  `examen_cod` int(11) NOT NULL DEFAULT '0',
  `variable_codigo` int(11) NOT NULL DEFAULT '0',
  `valor_frecuencia` varchar(50) NOT NULL DEFAULT '0',
  `id_paciente` int(11) NOT NULL DEFAULT '0',
  `frecuencia` varchar(50) NOT NULL DEFAULT '0',
  `valor_minimo` varchar(50) NOT NULL DEFAULT '0',
  `valor_maximo` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_paciente_examen_variable`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of paciente_examen_variable
-- ----------------------------
INSERT INTO `paciente_examen_variable` VALUES ('1', '7', '3', 'Hora', '4', '11', '22', '33');
INSERT INTO `paciente_examen_variable` VALUES ('2', '7', '4', 'Semana', '4', '22', '33', '11');
INSERT INTO `paciente_examen_variable` VALUES ('3', '8', '4', 'Semana', '4', '33', '11', '22');
INSERT INTO `paciente_examen_variable` VALUES ('4', '8', '5', 'Mes', '4', '11', '33', '22');
INSERT INTO `paciente_examen_variable` VALUES ('5', '8', '6', 'Semana', '4', '33', '22', '11');
INSERT INTO `paciente_examen_variable` VALUES ('6', '7', '3', 'Hora', '5', '11', '22', '33');
INSERT INTO `paciente_examen_variable` VALUES ('7', '7', '4', 'Semana', '5', '22', '33', '11');
INSERT INTO `paciente_examen_variable` VALUES ('8', '8', '4', 'Semana', '5', '33', '11', '22');
INSERT INTO `paciente_examen_variable` VALUES ('9', '8', '5', 'Mes', '5', '11', '33', '22');
INSERT INTO `paciente_examen_variable` VALUES ('10', '8', '6', 'Semana', '5', '33', '22', '11');
INSERT INTO `paciente_examen_variable` VALUES ('16', '7', '3', 'S', '6', 'Hora', '22', '33');
INSERT INTO `paciente_examen_variable` VALUES ('17', '8', '4', 'e', '6', 'Semana', '11', '22');
INSERT INTO `paciente_examen_variable` VALUES ('18', '8', '5', 'm', '6', 'Mes', '33', '22');
INSERT INTO `paciente_examen_variable` VALUES ('19', '8', '6', 'a', '6', 'Semana', '22', '11');
INSERT INTO `paciente_examen_variable` VALUES ('20', '7', '5', 'Mes', '7', '2323', '23', '2');
INSERT INTO `paciente_examen_variable` VALUES ('21', '7', '5', 'Mes', '8', '2323', '23', '2');
INSERT INTO `paciente_examen_variable` VALUES ('30', '7', '3', 'Hora', '9', '234', '23', '234');
INSERT INTO `paciente_examen_variable` VALUES ('31', '7', '3', 'Semana', '9', '234', '234', '234');
INSERT INTO `paciente_examen_variable` VALUES ('32', '8', '4', 'Año', '9', '234', '234', '234');
INSERT INTO `paciente_examen_variable` VALUES ('36', '7', '6', 'Semana', '12', '3', '30', '60');
INSERT INTO `paciente_examen_variable` VALUES ('37', '8', '4', 'Semana', '12', '5', '20', '70');
INSERT INTO `paciente_examen_variable` VALUES ('38', '7', '6', 'Mes', '10', '2323', '23', '30');
INSERT INTO `paciente_examen_variable` VALUES ('45', '7', '6', 'Día', '11', '7', '30', '60');
INSERT INTO `paciente_examen_variable` VALUES ('46', '8', '4', 'Semana', '11', '5', '20', '70');
INSERT INTO `paciente_examen_variable` VALUES ('53', '7', '6', 'Día', '13', '7', '30', '60');
INSERT INTO `paciente_examen_variable` VALUES ('54', '8', '4', 'Semana', '13', '5', '20', '70');

-- ----------------------------
-- Table structure for `paciente_hospitales`
-- ----------------------------
DROP TABLE IF EXISTS `paciente_hospitales`;
CREATE TABLE `paciente_hospitales` (
  `id_paciente_hospitales` int(11) NOT NULL AUTO_INCREMENT,
  `id_paciente` int(11) NOT NULL DEFAULT '0',
  `codigo_hospital` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_paciente_hospitales`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of paciente_hospitales
-- ----------------------------
INSERT INTO `paciente_hospitales` VALUES ('1', '8', '4');
INSERT INTO `paciente_hospitales` VALUES ('10', '9', '4');
INSERT INTO `paciente_hospitales` VALUES ('16', '11', '4');
INSERT INTO `paciente_hospitales` VALUES ('17', '11', '5');

-- ----------------------------
-- Table structure for `pacientes`
-- ----------------------------
DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
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
  `documento` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pacientes
-- ----------------------------
INSERT INTO `pacientes` VALUES ('2', '20617881', 'Ana maría', 'Beltrán', '2015-08-01', 'abuelita.jpg', 'calle 76 36 - 67', 'Cedritos', 'bogota', '1975-06-01', '1.65', '60', '56789654', '', '', '2006-09-01', '2016-09-30', '8', '12', '7', 'xbvnb', 'S', '8', 'VEF1', '4', 'Día', '1', '20', '30', 'afdgfdjhjjklhjlññkñ', '6', '8', '6', 'Activo', '1', '5', 'prepagada', '6', null);
INSERT INTO `pacientes` VALUES ('10', '7878', '786', '876', '2015-09-08', null, '876', '786', '786', '0000-00-00', '87', '678', '687', '678', '', '2015-09-14', '2015-09-09', '6', '2', '7', '686', 'S', '0', null, null, null, null, null, null, 'ghfjgh', null, null, '0', null, null, null, null, null, null);
INSERT INTO `pacientes` VALUES ('11', '52865489', 'Camila', 'Ramirez', '2015-05-01', 'abuelita.jpg', 'Calle 147 #45-68', 'Cedritos', 'Bogota', '2013-08-15', '1.70', '67', '53626282', '3208765687', 'ff@h.com', '2015-01-01', '2017-04-29', '8', '11', '6', 'addkdaldlldlad', 'S', '0', null, null, null, null, null, null, 'sdsffsfsfsf', null, null, '0', null, null, null, null, null, '');
INSERT INTO `pacientes` VALUES ('12', '67133131313', 'pepe', 'jaramillo', '2015-09-15', 'abuelita.jpg', 'calle 76 36 - 67', 'country', 'bogota', '2013-10-01', '1.67', '67', '6725222', '', '', '2015-01-01', '2016-05-31', '8', '13', '7', 'khkjkkñkñkñkk', 'S', '0', null, null, null, null, null, null, 'snnlsasalmdd', null, null, '0', null, null, null, null, null, null);
INSERT INTO `pacientes` VALUES ('13', '5626228220', 'andrea', 'Peralta', '2015-02-04', 'abuelita.jpg', 'calle 76 36 - 67', 'Cedritos', 'bogota', '1997-09-01', '1.78', '87', '6726272', '3208765687', 'gg@hotmail.com', '2007-01-03', '2023-09-01', '8', '13', '7', 'kkljbkvlladjlajdlf', 'S', '0', null, null, null, null, null, null, 'aklkslkkdksnf', null, null, '0', null, null, null, null, null, 'CLAVES.txt');

-- ----------------------------
-- Table structure for `pais`
-- ----------------------------
DROP TABLE IF EXISTS `pais`;
CREATE TABLE `pais` (
  `pai_id` int(11) NOT NULL AUTO_INCREMENT,
  `pai_nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pai_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pais
-- ----------------------------
INSERT INTO `pais` VALUES ('1', 'Colombia');
INSERT INTO `pais` VALUES ('2', 'Venezuela');
INSERT INTO `pais` VALUES ('3', 'Brazil');
INSERT INTO `pais` VALUES ('4', 'CHILE');
INSERT INTO `pais` VALUES ('5', 'dos');
INSERT INTO `pais` VALUES ('6', null);
INSERT INTO `pais` VALUES ('7', 'dos');
INSERT INTO `pais` VALUES ('8', null);
INSERT INTO `pais` VALUES ('9', 'tres');
INSERT INTO `pais` VALUES ('10', 'gerson');
INSERT INTO `pais` VALUES ('11', 'papa');
INSERT INTO `pais` VALUES ('12', 'papamama');
INSERT INTO `pais` VALUES ('13', 'PEpe');

-- ----------------------------
-- Table structure for `permisos`
-- ----------------------------
DROP TABLE IF EXISTS `permisos`;
CREATE TABLE `permisos` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1192 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permisos
-- ----------------------------
INSERT INTO `permisos` VALUES ('1123', '1', '61', '51');
INSERT INTO `permisos` VALUES ('1189', '6', null, '62');
INSERT INTO `permisos` VALUES ('1190', '47', null, '45');
INSERT INTO `permisos` VALUES ('1191', '48', null, '65');

-- ----------------------------
-- Table structure for `permisos_rol`
-- ----------------------------
DROP TABLE IF EXISTS `permisos_rol`;
CREATE TABLE `permisos_rol` (
  `perRol_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`perRol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1168 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permisos_rol
-- ----------------------------
INSERT INTO `permisos_rol` VALUES ('19', '1', '37');
INSERT INTO `permisos_rol` VALUES ('20', '14', '37');
INSERT INTO `permisos_rol` VALUES ('21', '15', '37');
INSERT INTO `permisos_rol` VALUES ('22', '1', '38');
INSERT INTO `permisos_rol` VALUES ('23', '14', '38');
INSERT INTO `permisos_rol` VALUES ('24', '15', '38');
INSERT INTO `permisos_rol` VALUES ('25', '2', '38');
INSERT INTO `permisos_rol` VALUES ('26', '5', '38');
INSERT INTO `permisos_rol` VALUES ('27', '6', '38');
INSERT INTO `permisos_rol` VALUES ('28', '7', '38');
INSERT INTO `permisos_rol` VALUES ('29', '1', '39');
INSERT INTO `permisos_rol` VALUES ('30', '14', '39');
INSERT INTO `permisos_rol` VALUES ('31', '9', '40');
INSERT INTO `permisos_rol` VALUES ('32', '11', '40');
INSERT INTO `permisos_rol` VALUES ('33', '12', '40');
INSERT INTO `permisos_rol` VALUES ('34', '13', '40');
INSERT INTO `permisos_rol` VALUES ('35', '38', '41');
INSERT INTO `permisos_rol` VALUES ('36', '52', '41');
INSERT INTO `permisos_rol` VALUES ('37', '53', '41');
INSERT INTO `permisos_rol` VALUES ('38', '57', '41');
INSERT INTO `permisos_rol` VALUES ('39', '38', '42');
INSERT INTO `permisos_rol` VALUES ('40', '52', '42');
INSERT INTO `permisos_rol` VALUES ('43', '58', '42');
INSERT INTO `permisos_rol` VALUES ('44', '38', '43');
INSERT INTO `permisos_rol` VALUES ('45', '52', '43');
INSERT INTO `permisos_rol` VALUES ('46', '53', '43');
INSERT INTO `permisos_rol` VALUES ('47', '57', '43');
INSERT INTO `permisos_rol` VALUES ('48', '58', '43');
INSERT INTO `permisos_rol` VALUES ('49', '9', '44');
INSERT INTO `permisos_rol` VALUES ('50', '38', '44');
INSERT INTO `permisos_rol` VALUES ('79', '9', '49');
INSERT INTO `permisos_rol` VALUES ('80', '40', '49');
INSERT INTO `permisos_rol` VALUES ('81', '41', '49');
INSERT INTO `permisos_rol` VALUES ('82', '42', '49');
INSERT INTO `permisos_rol` VALUES ('103', '43', '49');
INSERT INTO `permisos_rol` VALUES ('105', '67', '49');
INSERT INTO `permisos_rol` VALUES ('451', '38', '45');
INSERT INTO `permisos_rol` VALUES ('452', '52', '45');
INSERT INTO `permisos_rol` VALUES ('453', '53', '45');
INSERT INTO `permisos_rol` VALUES ('454', '57', '45');
INSERT INTO `permisos_rol` VALUES ('455', '58', '45');
INSERT INTO `permisos_rol` VALUES ('456', '59', '45');
INSERT INTO `permisos_rol` VALUES ('457', '60', '45');
INSERT INTO `permisos_rol` VALUES ('458', '62', '45');
INSERT INTO `permisos_rol` VALUES ('459', '63', '45');
INSERT INTO `permisos_rol` VALUES ('460', '68', '45');
INSERT INTO `permisos_rol` VALUES ('461', '69', '45');
INSERT INTO `permisos_rol` VALUES ('462', '39', '45');
INSERT INTO `permisos_rol` VALUES ('463', '44', '45');
INSERT INTO `permisos_rol` VALUES ('464', '45', '45');
INSERT INTO `permisos_rol` VALUES ('465', '46', '45');
INSERT INTO `permisos_rol` VALUES ('466', '47', '45');
INSERT INTO `permisos_rol` VALUES ('467', '48', '45');
INSERT INTO `permisos_rol` VALUES ('468', '49', '45');
INSERT INTO `permisos_rol` VALUES ('469', '50', '45');
INSERT INTO `permisos_rol` VALUES ('470', '51', '45');
INSERT INTO `permisos_rol` VALUES ('471', '67', '45');
INSERT INTO `permisos_rol` VALUES ('472', '76', '45');
INSERT INTO `permisos_rol` VALUES ('473', '40', '45');
INSERT INTO `permisos_rol` VALUES ('474', '41', '45');
INSERT INTO `permisos_rol` VALUES ('475', '42', '45');
INSERT INTO `permisos_rol` VALUES ('476', '43', '45');
INSERT INTO `permisos_rol` VALUES ('477', '61', '45');
INSERT INTO `permisos_rol` VALUES ('478', '64', '45');
INSERT INTO `permisos_rol` VALUES ('479', '65', '45');
INSERT INTO `permisos_rol` VALUES ('480', '66', '45');
INSERT INTO `permisos_rol` VALUES ('481', '71', '45');
INSERT INTO `permisos_rol` VALUES ('482', '72', '45');
INSERT INTO `permisos_rol` VALUES ('483', '73', '45');
INSERT INTO `permisos_rol` VALUES ('605', '74', '56');
INSERT INTO `permisos_rol` VALUES ('606', '80', '56');
INSERT INTO `permisos_rol` VALUES ('607', '81', '56');
INSERT INTO `permisos_rol` VALUES ('608', '82', '56');
INSERT INTO `permisos_rol` VALUES ('609', '83', '56');
INSERT INTO `permisos_rol` VALUES ('610', '84', '56');
INSERT INTO `permisos_rol` VALUES ('611', '85', '56');
INSERT INTO `permisos_rol` VALUES ('612', '86', '56');
INSERT INTO `permisos_rol` VALUES ('613', '87', '56');
INSERT INTO `permisos_rol` VALUES ('614', '61', '51');
INSERT INTO `permisos_rol` VALUES ('615', '64', '51');
INSERT INTO `permisos_rol` VALUES ('616', '65', '51');
INSERT INTO `permisos_rol` VALUES ('617', '66', '51');
INSERT INTO `permisos_rol` VALUES ('618', '71', '51');
INSERT INTO `permisos_rol` VALUES ('619', '72', '51');
INSERT INTO `permisos_rol` VALUES ('620', '73', '51');
INSERT INTO `permisos_rol` VALUES ('621', '74', '51');
INSERT INTO `permisos_rol` VALUES ('622', '80', '51');
INSERT INTO `permisos_rol` VALUES ('623', '81', '51');
INSERT INTO `permisos_rol` VALUES ('624', '82', '51');
INSERT INTO `permisos_rol` VALUES ('625', '83', '51');
INSERT INTO `permisos_rol` VALUES ('626', '84', '51');
INSERT INTO `permisos_rol` VALUES ('627', '85', '51');
INSERT INTO `permisos_rol` VALUES ('628', '86', '51');
INSERT INTO `permisos_rol` VALUES ('629', '87', '51');
INSERT INTO `permisos_rol` VALUES ('630', '75', '51');
INSERT INTO `permisos_rol` VALUES ('631', '76', '51');
INSERT INTO `permisos_rol` VALUES ('632', '77', '51');
INSERT INTO `permisos_rol` VALUES ('633', '78', '51');
INSERT INTO `permisos_rol` VALUES ('634', '79', '51');
INSERT INTO `permisos_rol` VALUES ('834', '61', '60');
INSERT INTO `permisos_rol` VALUES ('1048', '74', '65');
INSERT INTO `permisos_rol` VALUES ('1049', '89', '65');
INSERT INTO `permisos_rol` VALUES ('1050', '94', '65');
INSERT INTO `permisos_rol` VALUES ('1051', '107', '65');
INSERT INTO `permisos_rol` VALUES ('1052', '108', '65');
INSERT INTO `permisos_rol` VALUES ('1053', '95', '65');
INSERT INTO `permisos_rol` VALUES ('1054', '109', '65');
INSERT INTO `permisos_rol` VALUES ('1055', '110', '65');
INSERT INTO `permisos_rol` VALUES ('1056', '96', '65');
INSERT INTO `permisos_rol` VALUES ('1057', '111', '65');
INSERT INTO `permisos_rol` VALUES ('1058', '112', '65');
INSERT INTO `permisos_rol` VALUES ('1113', '74', '62');
INSERT INTO `permisos_rol` VALUES ('1114', '65', '62');
INSERT INTO `permisos_rol` VALUES ('1115', '66', '62');
INSERT INTO `permisos_rol` VALUES ('1116', '83', '62');
INSERT INTO `permisos_rol` VALUES ('1117', '84', '62');
INSERT INTO `permisos_rol` VALUES ('1118', '89', '62');
INSERT INTO `permisos_rol` VALUES ('1119', '91', '62');
INSERT INTO `permisos_rol` VALUES ('1120', '101', '62');
INSERT INTO `permisos_rol` VALUES ('1121', '102', '62');
INSERT INTO `permisos_rol` VALUES ('1122', '92', '62');
INSERT INTO `permisos_rol` VALUES ('1123', '103', '62');
INSERT INTO `permisos_rol` VALUES ('1124', '104', '62');
INSERT INTO `permisos_rol` VALUES ('1125', '93', '62');
INSERT INTO `permisos_rol` VALUES ('1126', '105', '62');
INSERT INTO `permisos_rol` VALUES ('1127', '106', '62');
INSERT INTO `permisos_rol` VALUES ('1128', '94', '62');
INSERT INTO `permisos_rol` VALUES ('1129', '107', '62');
INSERT INTO `permisos_rol` VALUES ('1130', '108', '62');
INSERT INTO `permisos_rol` VALUES ('1131', '95', '62');
INSERT INTO `permisos_rol` VALUES ('1132', '109', '62');
INSERT INTO `permisos_rol` VALUES ('1133', '110', '62');
INSERT INTO `permisos_rol` VALUES ('1134', '96', '62');
INSERT INTO `permisos_rol` VALUES ('1135', '111', '62');
INSERT INTO `permisos_rol` VALUES ('1136', '112', '62');
INSERT INTO `permisos_rol` VALUES ('1137', '97', '62');
INSERT INTO `permisos_rol` VALUES ('1138', '113', '62');
INSERT INTO `permisos_rol` VALUES ('1139', '114', '62');
INSERT INTO `permisos_rol` VALUES ('1140', '98', '62');
INSERT INTO `permisos_rol` VALUES ('1141', '128', '62');
INSERT INTO `permisos_rol` VALUES ('1142', '129', '62');
INSERT INTO `permisos_rol` VALUES ('1143', '99', '62');
INSERT INTO `permisos_rol` VALUES ('1144', '115', '62');
INSERT INTO `permisos_rol` VALUES ('1145', '116', '62');
INSERT INTO `permisos_rol` VALUES ('1146', '100', '62');
INSERT INTO `permisos_rol` VALUES ('1147', '117', '62');
INSERT INTO `permisos_rol` VALUES ('1148', '118', '62');
INSERT INTO `permisos_rol` VALUES ('1149', '119', '62');
INSERT INTO `permisos_rol` VALUES ('1150', '122', '62');
INSERT INTO `permisos_rol` VALUES ('1151', '123', '62');
INSERT INTO `permisos_rol` VALUES ('1152', '120', '62');
INSERT INTO `permisos_rol` VALUES ('1153', '124', '62');
INSERT INTO `permisos_rol` VALUES ('1154', '125', '62');
INSERT INTO `permisos_rol` VALUES ('1155', '121', '62');
INSERT INTO `permisos_rol` VALUES ('1156', '126', '62');
INSERT INTO `permisos_rol` VALUES ('1157', '127', '62');
INSERT INTO `permisos_rol` VALUES ('1158', '130', '62');
INSERT INTO `permisos_rol` VALUES ('1159', '131', '62');
INSERT INTO `permisos_rol` VALUES ('1160', '132', '62');
INSERT INTO `permisos_rol` VALUES ('1161', '134', '62');
INSERT INTO `permisos_rol` VALUES ('1162', '135', '62');
INSERT INTO `permisos_rol` VALUES ('1163', '136', '62');
INSERT INTO `permisos_rol` VALUES ('1164', '137', '62');
INSERT INTO `permisos_rol` VALUES ('1165', '138', '62');
INSERT INTO `permisos_rol` VALUES ('1166', '139', '62');
INSERT INTO `permisos_rol` VALUES ('1167', '140', '62');

-- ----------------------------
-- Table structure for `planes`
-- ----------------------------
DROP TABLE IF EXISTS `planes`;
CREATE TABLE `planes` (
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

-- ----------------------------
-- Records of planes
-- ----------------------------
INSERT INTO `planes` VALUES ('1', '0', '', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '');
INSERT INTO `planes` VALUES ('2', '0', 'gerson', '', '0000-00-00', '0000-00-00', 'xyz', '123456', 'xyz', '12345', '', '', 'gersonjbr');
INSERT INTO `planes` VALUES ('3', '0', 'gerson', '', '0000-00-00', '0000-00-00', 'xyz', '123456', 'xyz', '12345', '', '', 'gersonjbr');
INSERT INTO `planes` VALUES ('4', '0', 'gerson', '', '0000-00-00', '0000-00-00', 'xyz', '123456', 'xyz', '12345', '', '', 'gersonjbr');

-- ----------------------------
-- Table structure for `politicas`
-- ----------------------------
DROP TABLE IF EXISTS `politicas`;
CREATE TABLE `politicas` (
  `pol_id` int(11) NOT NULL AUTO_INCREMENT,
  `pol_politica` blob,
  `emp_id` int(10) NOT NULL,
  PRIMARY KEY (`pol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of politicas
-- ----------------------------
INSERT INTO `politicas` VALUES ('1', 0x50656E6469656E746573, '1');
INSERT INTO `politicas` VALUES ('2', 0x50656E6469656E746573, '134');

-- ----------------------------
-- Table structure for `protocolos`
-- ----------------------------
DROP TABLE IF EXISTS `protocolos`;
CREATE TABLE `protocolos` (
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

-- ----------------------------
-- Records of protocolos
-- ----------------------------
INSERT INTO `protocolos` VALUES ('1', 'nelson', '2015-09-08 03:00:17', 'njjj', 'Activo', 'sdf', 'NO', 'SI', 'N');
INSERT INTO `protocolos` VALUES ('2', 'nelson', '2015-09-08 03:00:20', 'ii', 'Inactivo', 'iikjsdk ahsjkdakshdkahsd', 'SI', 'NO', 'N');
INSERT INTO `protocolos` VALUES ('3', 'Nivel 2 tensión arterial alta', null, '1.0', 'Activo', 'dhjhsfskjdbnxbv,mxz,nm\r\nojvlxvnc,mbnc,mbmb,mb\r\nxkkvx.,bv.,cnb.c,bCb\r\n.vmxvlsfmvclvlxmvclvcb\r\nxvjkjv-xv_c b-c.b-.cnbcnb.\r\n cvlknccvm{dkvcmm kcbv\r\ncxllcldkkjvñdlv,d]{}', 'SI', 'SI', 'S');
INSERT INTO `protocolos` VALUES ('4', 'Nivel 1 Tensión arterial alta ', null, '1.0', 'Activo', '1. Llamar al paciente\r\n2. si el paciente tiene la tensión arterial superior a ... se debe...', 'NO', 'SI', 'S');

-- ----------------------------
-- Table structure for `prueba`
-- ----------------------------
DROP TABLE IF EXISTS `prueba`;
CREATE TABLE `prueba` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` varchar(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`id`,`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prueba
-- ----------------------------
INSERT INTO `prueba` VALUES ('16', null, null, 'S');
INSERT INTO `prueba` VALUES ('17', null, null, 'S');
INSERT INTO `prueba` VALUES ('18', 'enviopdfproveedor.php', null, 'S');
INSERT INTO `prueba` VALUES ('19', 'Doc1.docx', null, 'S');
INSERT INTO `prueba` VALUES ('20', 'Doc1.docx', null, 'S');
INSERT INTO `prueba` VALUES ('21', 'Doc1.docx', null, 'S');
INSERT INTO `prueba` VALUES ('22', 'Especificaciones funcionalesI(v4.0)-1.pdf', null, 'S');
INSERT INTO `prueba` VALUES ('23', 'escudo-1.jpg', null, 'S');
INSERT INTO `prueba` VALUES ('24', '0.jpg', null, 'S');
INSERT INTO `prueba` VALUES ('25', 'dfgdfg', null, 'S');
INSERT INTO `prueba` VALUES ('26', 'dskfjsdlfj', '2015-08-31 17:55:32', 'S');
INSERT INTO `prueba` VALUES ('27', 'yqaaaa', '2015-09-15 18:49:20', 'S');

-- ----------------------------
-- Table structure for `reporte`
-- ----------------------------
DROP TABLE IF EXISTS `reporte`;
CREATE TABLE `reporte` (
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

-- ----------------------------
-- Records of reporte
-- ----------------------------
INSERT INTO `reporte` VALUES ('3', '0', 'COMPRAS', '3', null, '<query> select * from user</query> \r\n<date> \r\n<creacion>creac</creacion> \r\n<terminacion>term</terminacion> \r\n</date>\r\n<calculate>\r\n<id>udusuario</id>\r\n<active>activacion</active>\r\n</calculate>', 'R1', 'R1', 'R1');
INSERT INTO `reporte` VALUES ('4', '0', 'VENTAS', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('5', '0', 'GERENCIA', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('6', '0', 'SISTEMAS', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('7', '3', 'PROVEEDORES', '7', '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('8', '3', 'PRECIOS', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('9', '7', 'NOMBRES', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('10', '7', 'PRODUCTOS', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('11', '7', 'R1', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('12', '7', 'R2', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('13', '7', 'R3', null, '1', null, null, null, null);
INSERT INTO `reporte` VALUES ('14', '7', 'R3', null, '1', null, null, null, null);

-- ----------------------------
-- Table structure for `reportes`
-- ----------------------------
DROP TABLE IF EXISTS `reportes`;
CREATE TABLE `reportes` (
  `rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `rep_nombre` varchar(100) NOT NULL,
  `rep_estado` int(10) NOT NULL DEFAULT '1',
  `rep_query` varchar(5000) DEFAULT NULL,
  `rep_host` varchar(255) DEFAULT NULL,
  `rep_user` varchar(255) DEFAULT NULL,
  `rep_password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of reportes
-- ----------------------------
INSERT INTO `reportes` VALUES ('1', 'gerson', '1', '<xml>\r\n</xml>', 'gerson', 'gerson', 'gerson');
INSERT INTO `reportes` VALUES ('2', 'Anderson4', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('3', 'gdf', '1', 'sfsdf', 'sfds', 'sdfs', 'sdfsd');
INSERT INTO `reportes` VALUES ('4', 'ANderson6', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('5', 'Anderson7', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('6', 'HolaMundo', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('7', 'HolaMundo2', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('8', '11111111', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('9', 'Gerson', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('10', 'SI ^^', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('11', 'Otro Coso', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('12', '^^', '1', null, null, null, null);
INSERT INTO `reportes` VALUES ('13', '', '1', null, null, null, null);

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(255) DEFAULT NULL,
  `rol_estado` int(5) DEFAULT '1',
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('62', 'DCS', '1');

-- ----------------------------
-- Table structure for `session`
-- ----------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `SESSION_ID` int(10) NOT NULL AUTO_INCREMENT,
  `USUARIO_ID` int(10) DEFAULT NULL,
  `SESSION_IP` varchar(20) DEFAULT NULL,
  `SESSION_ACTIVA` int(20) DEFAULT NULL,
  PRIMARY KEY (`SESSION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of session
-- ----------------------------

-- ----------------------------
-- Table structure for `sexo`
-- ----------------------------
DROP TABLE IF EXISTS `sexo`;
CREATE TABLE `sexo` (
  `Sex_id` int(11) NOT NULL AUTO_INCREMENT,
  `Sex_Sexo` varchar(100) NOT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`Sex_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sexo
-- ----------------------------
INSERT INTO `sexo` VALUES ('1', 'Masculino', 'S');
INSERT INTO `sexo` VALUES ('2', 'Femenino', 'S');
INSERT INTO `sexo` VALUES ('3', 'yqaaaa', 'S');

-- ----------------------------
-- Table structure for `tamano_empresa`
-- ----------------------------
DROP TABLE IF EXISTS `tamano_empresa`;
CREATE TABLE `tamano_empresa` (
  `TamEmp_tamano` varchar(3) DEFAULT NULL,
  `TamEmp_descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tamano_empresa
-- ----------------------------
INSERT INTO `tamano_empresa` VALUES ('MI', 'Microempresa');
INSERT INTO `tamano_empresa` VALUES ('PE', 'Pequeña empresa');
INSERT INTO `tamano_empresa` VALUES ('ME', 'Mediana empresa');
INSERT INTO `tamano_empresa` VALUES ('GR', 'Gran empresa');

-- ----------------------------
-- Table structure for `tipo_alarma`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_alarma`;
CREATE TABLE `tipo_alarma` (
  `id_tipo_alarma` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `fecha_creacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `examen` text,
  `analisis_resultados` varchar(50) DEFAULT NULL,
  `id_niveles_alarma` int(11) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  `variable_codigo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_alarma`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_alarma
-- ----------------------------
INSERT INTO `tipo_alarma` VALUES ('1', 'dd', null, '4', 'Baja', '1', 'S', null);
INSERT INTO `tipo_alarma` VALUES ('2', 'Tensión arterial alta', '2015-09-20 18:25:02', '7', 'Alta', '1', 'S', null);
INSERT INTO `tipo_alarma` VALUES ('12', 'ddd', '2015-09-20 15:26:06', '7', 'Baja', null, 'S', '6');
INSERT INTO `tipo_alarma` VALUES ('13', 'Alarma tensión arterial alta', '2015-09-20 15:25:32', '7', 'Alta', null, 'S', '6');
INSERT INTO `tipo_alarma` VALUES ('14', 'jjjjj', '2015-09-20 15:25:09', '7', 'Baja', null, 'S', '6');
INSERT INTO `tipo_alarma` VALUES ('15', 'alarma Espirometria CVEF1 baja', null, '8', 'Baja', null, 'S', '4');
INSERT INTO `tipo_alarma` VALUES ('16', 'Alarma tensión arterial baja', null, '7', 'Baja', null, 'S', '6');

-- ----------------------------
-- Table structure for `tipo_alarma_nivel`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_alarma_nivel`;
CREATE TABLE `tipo_alarma_nivel` (
  `id_tipo_alarma_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_alarma` int(11) DEFAULT NULL,
  `id_niveles_alarma` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_alarma_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_alarma_nivel
-- ----------------------------
INSERT INTO `tipo_alarma_nivel` VALUES ('7', '14', '6');
INSERT INTO `tipo_alarma_nivel` VALUES ('8', '14', '7');
INSERT INTO `tipo_alarma_nivel` VALUES ('9', '14', '8');
INSERT INTO `tipo_alarma_nivel` VALUES ('10', '13', '5');
INSERT INTO `tipo_alarma_nivel` VALUES ('11', '13', '4');
INSERT INTO `tipo_alarma_nivel` VALUES ('12', '12', '4');

-- ----------------------------
-- Table structure for `tipo_aseguradora`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_aseguradora`;
CREATE TABLE `tipo_aseguradora` (
  `TipAse_Id` int(11) NOT NULL DEFAULT '0',
  `TipAse_Nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TipAse_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_aseguradora
-- ----------------------------

-- ----------------------------
-- Table structure for `tipo_cliente`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_cliente`;
CREATE TABLE `tipo_cliente` (
  `id_tipo_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text,
  `fecha_creacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `creado_por` int(11) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`id_tipo_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_cliente
-- ----------------------------
INSERT INTO `tipo_cliente` VALUES ('1', 'ya', null, null, null);
INSERT INTO `tipo_cliente` VALUES ('2', 'ya', null, null, null);
INSERT INTO `tipo_cliente` VALUES ('3', 'sada', '2015-09-08 02:54:32', null, 'N');
INSERT INTO `tipo_cliente` VALUES ('4', 'esto es mio', '2015-09-08 02:54:35', null, 'N');
INSERT INTO `tipo_cliente` VALUES ('5', 'hospitales', '2015-09-08 02:54:37', null, 'N');
INSERT INTO `tipo_cliente` VALUES ('6', 'Hospitales', null, null, 'S');
INSERT INTO `tipo_cliente` VALUES ('7', 'Hospitales', '2015-09-08 02:54:40', null, 'N');
INSERT INTO `tipo_cliente` VALUES ('8', 'Particular', null, null, 'S');

-- ----------------------------
-- Table structure for `tipo_contrato`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_contrato`;
CREATE TABLE `tipo_contrato` (
  `TipCon_Id` int(11) NOT NULL AUTO_INCREMENT,
  `TipCon_Descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`TipCon_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_contrato
-- ----------------------------
INSERT INTO `tipo_contrato` VALUES ('1', 'prueba');

-- ----------------------------
-- Table structure for `tipo_documento`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_documento`;
CREATE TABLE `tipo_documento` (
  `tipDoc_tipo` varchar(4) NOT NULL DEFAULT '',
  `tipDoc_Descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tipDoc_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_documento
-- ----------------------------
INSERT INTO `tipo_documento` VALUES ('CC', 'CEDULA DE CIUDADANIA');
INSERT INTO `tipo_documento` VALUES ('CE', 'CEDULA EXTRANJERIA');
INSERT INTO `tipo_documento` VALUES ('TI', 'TARJETA IDENTIDAD');

-- ----------------------------
-- Table structure for `tipo_equipo`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_equipo`;
CREATE TABLE `tipo_equipo` (
  `tipo_equipo_cod` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(255) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`tipo_equipo_cod`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tipo_equipo
-- ----------------------------
INSERT INTO `tipo_equipo` VALUES ('1', 'nelson', 'Inactivo', '0000-00-00 00:00:00', 'N');
INSERT INTO `tipo_equipo` VALUES ('2', 'ya quedo', 'Activo', '0000-00-00 00:00:00', 'N');
INSERT INTO `tipo_equipo` VALUES ('3', 'eded', 'Activo', null, 'N');
INSERT INTO `tipo_equipo` VALUES ('4', 'dddd', 'Activo', null, 'N');
INSERT INTO `tipo_equipo` VALUES ('5', 'refedddd', 'Activo', null, 'N');
INSERT INTO `tipo_equipo` VALUES ('6', 'rrrddddddd', 'Activo', null, 'N');
INSERT INTO `tipo_equipo` VALUES ('7', 'Medidor de signos vitales', 'Activo', null, 'S');
INSERT INTO `tipo_equipo` VALUES ('8', 'Tensiometros', 'Activo', null, 'S');

-- ----------------------------
-- Table structure for `tipo_inputs`
-- ----------------------------
DROP TABLE IF EXISTS `tipo_inputs`;
CREATE TABLE `tipo_inputs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `description` text CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of tipo_inputs
-- ----------------------------
INSERT INTO `tipo_inputs` VALUES ('1', 'text', null);
INSERT INTO `tipo_inputs` VALUES ('2', 'password', null);
INSERT INTO `tipo_inputs` VALUES ('3', 'checkbox', null);
INSERT INTO `tipo_inputs` VALUES ('4', 'radio', null);
INSERT INTO `tipo_inputs` VALUES ('5', 'submit', null);
INSERT INTO `tipo_inputs` VALUES ('6', 'reset', null);
INSERT INTO `tipo_inputs` VALUES ('7', 'file', null);
INSERT INTO `tipo_inputs` VALUES ('8', 'hidden', null);
INSERT INTO `tipo_inputs` VALUES ('9', 'image', null);
INSERT INTO `tipo_inputs` VALUES ('10', 'button ', null);
INSERT INTO `tipo_inputs` VALUES ('11', 'email', null);
INSERT INTO `tipo_inputs` VALUES ('12', 'select', null);

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '12345', '1', '1', '12345', 'gerson', 'barbosa', 'admin@admin.com', 'admin@admin.com', null, null, null, '2015-09-03 16:16:00', null, null, '51', 'S');
INSERT INTO `user` VALUES ('2', '12345', '1', '1', '6789', 'javier', 'romero', null, null, null, null, null, '2015-09-08 03:22:09', null, null, '0', 'N');
INSERT INTO `user` VALUES ('3', '12345', '1', '1', '34567', 'barbosa', 'castillo', null, null, null, null, null, '2015-09-08 03:22:12', null, null, '0', 'N');
INSERT INTO `user` VALUES ('5', '12345', '2', '0', '123456789', 'gerson javier', 'barbosa romero', 'javierbr12@hotmail.com', 'javierbr12@hotmail.com', '1', '40', '0', '2015-09-10 19:42:35', null, null, null, 'S');
INSERT INTO `user` VALUES ('6', '12345', '1', '1', '123456789', 'dcs', 'dcs', 'dcs@dcs.com', 'dcs@dcs.com', '1', '40', '0', '2015-09-04 17:49:06', '2015-08-23 08:13:46', null, '62', 'S');
INSERT INTO `user` VALUES ('43', '6898688', '1', '0', '100000', 'nelson22', 'bb', 'giovanny751@hotmail.com', 'giovanny751@hotmail.com', null, null, null, '2015-09-16 22:04:41', '2015-09-04 01:57:51', null, null, 'S');
INSERT INTO `user` VALUES ('44', '123123123123', '1', '0', '123', '333', '', '123', 'sad', null, null, null, '2015-09-08 03:22:16', '2015-09-04 02:11:07', null, null, 'N');
INSERT INTO `user` VALUES ('45', '123456788', '1', '0', '546765678', 'German', 'rodriguez', 'Grodriguez', 'g@hotmail.com', null, null, null, '2015-09-04 15:48:58', '2015-09-04 15:48:58', null, null, 'S');
INSERT INTO `user` VALUES ('46', 'daniel123', '1', '0', '79648473', 'Daniel', 'Ortiz', 'DOrtiz', 'daniel@hotmail.com', null, null, null, null, '2015-09-08 02:29:09', null, null, 'S');
INSERT INTO `user` VALUES ('47', '12345678', '1', '1', '76987879', 'gina', 'beltran', 'gbeltran', '', null, null, null, '2015-09-10 20:09:53', '2015-09-08 02:46:41', null, '0', 'S');
INSERT INTO `user` VALUES ('48', '88888888888', '1', '1', '5289778', 'Sebastian', 'Perez', 'Sperez', '', null, null, null, '2015-09-15 08:02:22', '2015-09-15 15:02:22', null, '65', 'S');

-- ----------------------------
-- Table structure for `user_copy`
-- ----------------------------
DROP TABLE IF EXISTS `user_copy`;
CREATE TABLE `user_copy` (
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

-- ----------------------------
-- Records of user_copy
-- ----------------------------
INSERT INTO `user_copy` VALUES ('1', '12345', '1', '1', '12345', 'gersonjbr12', 'apellidoprueba', 'admin', 'javierbr12@hotmail.com', '1', '40', '0', '2015-09-03 04:38:46', '2015-08-27 03:01:02', null, '', '51');
INSERT INTO `user_copy` VALUES ('2', '12345', '1', '1', '6789', 'javier', 'romero', null, null, '1', '40', null, '2015-08-27 02:38:19', null, null, '', null);
INSERT INTO `user_copy` VALUES ('3', '12345', '1', '1', '34567', 'barbosa', 'castillo', null, null, null, '40', null, '2015-08-27 02:35:16', null, null, '', null);
INSERT INTO `user_copy` VALUES ('5', '12345', '0', '0', '123456789', 'gerson javier', 'barbosa romero', 'gerson', 'javierbr12@hotmail.com', '1', '40', '0', null, null, null, '', null);
INSERT INTO `user_copy` VALUES ('6', '12345', '0', '0', '123456789', 'gerson javier', 'barbosa romero', 'gerson', 'javierbr12@hotmail.com', '1', '40', '0', null, '2015-08-23 08:13:46', null, '', null);
INSERT INTO `user_copy` VALUES ('9', '12345', '1', '0', '888888888888888', 'nelson', 'giovanny', 'nbarbosa', 'giovanny751@misena.edu.co', '1', '40', '3', '2015-08-31 03:34:55', '2015-08-31 03:34:55', null, '', null);
INSERT INTO `user_copy` VALUES ('10', '12345', '1', '0', '10337005556', 'nelson', 'giovanny', 'nbarbosa', 'giovanny751@misena.edu.co', '1', '40', '4', null, '2015-08-31 03:10:59', null, '', null);
INSERT INTO `user_copy` VALUES ('11', '12345', '1', '1', '12345678', 'coco', 'guanabana', 'basc', 'coco@coco.com', '1', '40', '2', '2015-09-02 21:43:40', '2015-08-31 05:41:00', null, '', '56');

-- ----------------------------
-- Table structure for `user_copy1`
-- ----------------------------
DROP TABLE IF EXISTS `user_copy1`;
CREATE TABLE `user_copy1` (
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

-- ----------------------------
-- Records of user_copy1
-- ----------------------------
INSERT INTO `user_copy1` VALUES ('1', '12345', '1', '1', '12345', 'gersonjbr12', 'apellidoprueba', 'admin', 'javierbr12@hotmail.com', '1', '40', '0', '2015-09-03 04:38:46', '2015-08-27 03:01:02', null, '', '51');
INSERT INTO `user_copy1` VALUES ('2', '12345', '1', '1', '6789', 'javier', 'romero', null, null, '1', '40', null, '2015-08-27 02:38:19', null, null, '', null);
INSERT INTO `user_copy1` VALUES ('3', '12345', '1', '1', '34567', 'barbosa', 'castillo', null, null, null, '40', null, '2015-08-27 02:35:16', null, null, '', null);
INSERT INTO `user_copy1` VALUES ('5', '12345', '0', '0', '123456789', 'gerson javier', 'barbosa romero', 'gerson', 'javierbr12@hotmail.com', '1', '40', '0', null, null, null, '', null);
INSERT INTO `user_copy1` VALUES ('6', '12345', '0', '0', '123456789', 'gerson javier', 'barbosa romero', 'gerson', 'javierbr12@hotmail.com', '1', '40', '0', null, '2015-08-23 08:13:46', null, '', null);
INSERT INTO `user_copy1` VALUES ('9', '12345', '1', '0', '888888888888888', 'nelson', 'giovanny', 'nbarbosa', 'giovanny751@misena.edu.co', '1', '40', '3', '2015-08-31 03:34:55', '2015-08-31 03:34:55', null, '', null);
INSERT INTO `user_copy1` VALUES ('10', '12345', '1', '0', '10337005556', 'nelson', 'giovanny', 'nbarbosa', 'giovanny751@misena.edu.co', '1', '40', '4', null, '2015-08-31 03:10:59', null, '', null);
INSERT INTO `user_copy1` VALUES ('11', '12345', '1', '1', '12345678', 'coco', 'guanabana', 'basc', 'coco@coco.com', '1', '40', '2', '2015-09-02 21:43:40', '2015-08-31 05:41:00', null, '', '56');

-- ----------------------------
-- Table structure for `usermodule`
-- ----------------------------
DROP TABLE IF EXISTS `usermodule`;
CREATE TABLE `usermodule` (
  `user_id` int(10) DEFAULT NULL,
  `modulo_menuid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usermodule
-- ----------------------------
INSERT INTO `usermodule` VALUES ('1', '24');
INSERT INTO `usermodule` VALUES ('1', '54');
INSERT INTO `usermodule` VALUES ('1', '1');

-- ----------------------------
-- Table structure for `variables`
-- ----------------------------
DROP TABLE IF EXISTS `variables`;
CREATE TABLE `variables` (
  `variable_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `hl7tag` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `fecha_creacion` timestamp NULL DEFAULT NULL,
  `examen_cod` int(11) DEFAULT NULL,
  `activo` varchar(1) DEFAULT 'S',
  PRIMARY KEY (`variable_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of variables
-- ----------------------------
INSERT INTO `variables` VALUES ('1', null, 'rffff', null, '5', null);
INSERT INTO `variables` VALUES ('2', null, 'ddd', null, '4', 'S');
INSERT INTO `variables` VALUES ('3', 'sss', 'ee', null, '4', 'S');
INSERT INTO `variables` VALUES ('4', 'VEF1', 'VEF1', null, '8', 'S');
INSERT INTO `variables` VALUES ('5', 'CVF', 'CVF', null, '8', 'S');
INSERT INTO `variables` VALUES ('6', 'VS', 'valor sistolico', null, '7', 'S');
DROP TRIGGER IF EXISTS `lectura`;
DELIMITER ;;
CREATE TRIGGER `lectura` AFTER INSERT ON `lectura_equipo` FOR EACH ROW begin
declare min int;
declare max int;
declare id_t_alarma int;
declare  examen_id int  ;

SELECT   valor_maximo into max
FROM paciente_examen_variable 
join paciente_equipo_tipoequipo a on a.id_paciente=paciente_examen_variable .id_paciente
join equipos b on b.id_equipo=a.id_equipo
where 
paciente_examen_variable.variable_codigo=new.variable_codigo 
and paciente_examen_variable .id_paciente=new.id_paciente 
and serial=new.serial_equipo;


SELECT   valor_minimo INTO min
FROM paciente_examen_variable 
join paciente_equipo_tipoequipo a on a.id_paciente=paciente_examen_variable .id_paciente
join equipos b on b.id_equipo=a.id_equipo
where 
paciente_examen_variable.variable_codigo=new.variable_codigo 
and paciente_examen_variable .id_paciente=new.id_paciente 
and serial=new.serial_equipo;

SELECT   paciente_examen_variable.examen_cod  INTO examen_id
FROM paciente_examen_variable 
join paciente_equipo_tipoequipo a on a.id_paciente=paciente_examen_variable .id_paciente
join equipos b on b.id_equipo=a.id_equipo
where 
paciente_examen_variable.variable_codigo=new.variable_codigo 
and paciente_examen_variable .id_paciente=new.id_paciente 
and serial=new.serial_equipo;


if new.lectura_numerica > min and  new.lectura_numerica < max THEN
select id_tipo_alarma into id_t_alarma
from tipo_alarma
where variable_codigo=new.variable_codigo 
and examen=examen_id
and analisis_resultados='Normal';

insert into alarmas_generadas (
id_lectura_equipo,
analisis_resultado,
descripcion,
id_tipo_alarma,
examen_cod
) values (
new.id_lectura_equipo,
'Normal',
new.lectura_texto,
id_t_alarma,
examen_id
);
END IF;



if   new.lectura_numerica > max THEN
select id_tipo_alarma into id_t_alarma
from tipo_alarma
where variable_codigo=new.variable_codigo 
and examen=examen_id
and analisis_resultados='Alta';

insert into alarmas_generadas (
id_lectura_equipo,
analisis_resultado,
descripcion,
id_tipo_alarma,
examen_cod
) values (
new.id_lectura_equipo,
'Alta',
new.lectura_texto,
id_t_alarma,
examen_id
);
END IF;



if new.lectura_numerica < min  THEN
select id_tipo_alarma into id_t_alarma
from tipo_alarma
where variable_codigo=new.variable_codigo 
and examen=examen_id
and analisis_resultados='Baja';

insert into alarmas_generadas (
id_lectura_equipo,
analisis_resultado,
descripcion,
id_tipo_alarma,
examen_cod
) values (
new.id_lectura_equipo,
'Baja',
new.lectura_texto,
id_t_alarma,
examen_id
);
END IF;

end
;;
DELIMITER ;
