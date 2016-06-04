-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2016 at 03:16 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `landicorp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(250) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `cat_descripcion` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `cat_ruta_amigable` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `cat_imagen` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `cat_icono` varchar(45) CHARACTER SET utf8 NOT NULL,
  `cat_color` varchar(7) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `cat_codigos` text CHARACTER SET utf8 NOT NULL,
  `cat_css` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat_clase` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat_meta` text COLLATE utf8_spanish_ci NOT NULL,
  `cat_theme` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat_id_padre` int(11) NOT NULL DEFAULT '0',
  `cat_id_plantilla` int(11) NOT NULL DEFAULT '0',
  `cat_orden` int(11) NOT NULL DEFAULT '0',
  `cat_tipo` char(1) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `cat_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat_destino` varchar(20) COLLATE utf8_spanish_ci NOT NULL DEFAULT '_self',
  `cat_favicon` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat_analitica` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat_ruta_sitio` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat_activar` char(1) CHARACTER SET utf8 NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=17 ;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`cat_id`, `cat_nombre`, `cat_descripcion`, `cat_ruta_amigable`, `cat_imagen`, `cat_icono`, `cat_color`, `cat_codigos`, `cat_css`, `cat_clase`, `cat_meta`, `cat_theme`, `cat_id_padre`, `cat_id_plantilla`, `cat_orden`, `cat_tipo`, `cat_url`, `cat_destino`, `cat_favicon`, `cat_analitica`, `cat_ruta_sitio`, `cat_activar`) VALUES
(1, 'raiz', '', 'raiz', '', '', '', '', '', '', '', '', 0, 1, 1, '0', '', '', '', '', '', '1'),
(2, 'Landicorp', '', 'landicorp', '', '', '', '', '', '', '', 'sitios/landicorp/css/landicorp.theme.css', 0, 1, 1, '2', '', '', 'sitios/landicorp/images/favicon.ico', '', '', '1'),
(3, 'Mainter', '', 'mainter', '', '', '', '', '', '', '', 'sitios/mainter/css/mainter.theme.css', 0, 1, 2, '2', '', '', '', '', '', '1'),
(4, 'Utilar', '', 'utilar', '', '', '', '', '', '', '', 'sitios/utilar/css/utilar.theme.css', 0, 1, 1, '2', '', '', 'sitios/utilar/images/favicon.ico', '', '', '1'),
(5, 'Quiénes Somos', '', 'conozca-landicorp', '', '', '', '', '', '', '', 'sitios/landicorp/css/landicorp.theme.css', 2, 1, 1, '0', '', '', '', '', '', '1'),
(6, 'Empresas del Grupo', '', '', '', '', '', '', '', '', '', '', 2, 1, 2, '0', '', '', '', '', '', '1'),
(7, 'Contáctenos', '', 'contacto-landicorp', '', '', '', '', '', '', '', 'sitios/landicorp/css/landicorp.theme.css', 2, 1, 3, '0', '', '', '', '', '', '1'),
(8, 'Mainter', '', '', '', '', '', '', '', '', '', '', 6, 0, 1, '0', 'http://mainter.com.bo', '_blank', '', '', '', '1'),
(9, 'Utilar', '', '', '', '', '', '', '', '', '', '', 6, 0, 2, '0', 'http://utilar.com.bo', '_blank', '', '', '', '1'),
(10, 'Semexa', '', '', '', '', '', '', '', '', '', '', 6, 0, 3, '0', 'http://semexa.com.bo', '_blank', '', '', '', '1'),
(11, 'Rodaria', '', '', '', '', '', '', '', '', '', '', 6, 1, 4, '0', 'http://rodaria.com.bo', '_blank', '', '', '', '1'),
(12, 'Carrera Motors', '', '', '', '', '', '', '', '', '', '', 6, 0, 5, '0', 'http://fiat.com.bo', '_blank', '', '', '', '1'),
(13, 'Gran Alimento', '', '', '', '', '', '', '', '', '', '', 6, 0, 7, '0', 'http://granalimento.com', '_blank', '', '', '', '1'),
(14, 'Quienes Somos', '', 'conozca-utilar', '', '', '', '', '', '', '', 'sitios/utilar/css/utilar.theme.css', 4, 1, 1, '0', '', '_self', '', '', '', '1'),
(15, 'Nuestros Productos', '', 'productos-utilar', '', '', '', '', '', '', '', 'sitios/utilar/css/utilar.theme.css', 4, 1, 1, '0', '', '_self', '', '', '', '1'),
(16, 'Contactenos', '', 'contacto-utilar', '', '', '', '', '', '', '', 'sitios/utilar/css/utilar.theme.css', 4, 1, 1, '0', '', '_self', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `conf_nombre_sitio` varchar(255) CHARACTER SET utf8 NOT NULL,
  `conf_imagen` varchar(255) CHARACTER SET utf8 NOT NULL,
  `conf_script_head` text CHARACTER SET utf8 NOT NULL,
  `conf_script_footer` text CHARACTER SET utf8 NOT NULL,
  `conf_ruta_analitica` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`conf_nombre_sitio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `configuracion`
--

INSERT INTO `configuracion` (`conf_nombre_sitio`, `conf_imagen`, `conf_script_head`, `conf_script_footer`, `conf_ruta_analitica`) VALUES
('Landicorp', 'sitios/landicorp/images/logo-landicorp-200x60.png', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contenedor`
--

CREATE TABLE IF NOT EXISTS `contenedor` (
  `cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cont_clase` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cont_css` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cont_codigos` text CHARACTER SET utf8 NOT NULL,
  `cont_activar` int(11) NOT NULL,
  `cont_id_padre` int(11) NOT NULL,
  `cont_orden` int(11) NOT NULL,
  PRIMARY KEY (`cont_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contenedor`
--

INSERT INTO `contenedor` (`cont_id`, `cont_nombre`, `cont_clase`, `cont_css`, `cont_codigos`, `cont_activar`, `cont_id_padre`, `cont_orden`) VALUES
(1, 'diagrama_general', '', '', '', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contenedor_plantilla`
--

CREATE TABLE IF NOT EXISTS `contenedor_plantilla` (
  `contenedor_cont_id` int(11) NOT NULL,
  `plantilla_pla_id` int(11) NOT NULL,
  PRIMARY KEY (`contenedor_cont_id`,`plantilla_pla_id`),
  KEY `fk_contenedor_has_plantilla_plantilla1_idx` (`plantilla_pla_id`) USING BTREE,
  KEY `fk_contenedor_has_plantilla_contenedor1_idx` (`contenedor_cont_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `contenedor_plantilla`
--

INSERT INTO `contenedor_plantilla` (`contenedor_cont_id`, `plantilla_pla_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
  `cuenta_id` int(11) NOT NULL AUTO_INCREMENT,
  `cuenta_tipo` int(11) NOT NULL,
  PRIMARY KEY (`cuenta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `grupo_id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_nombre` varchar(45) CHARACTER SET utf8 NOT NULL,
  `grupo_funciones` varchar(255) CHARACTER SET utf8 NOT NULL,
  `grupo_permisos` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mod_descripcion` text CHARACTER SET utf8 NOT NULL,
  `mod_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `mod_icono` varchar(255) CHARACTER SET utf8 NOT NULL,
  `mod_tipo` int(11) NOT NULL COMMENT '0 - simple\n1 - compuesto\n2 - ',
  `mod_activar` int(11) NOT NULL COMMENT '0 - no publicado\n1 - publicado\n',
  PRIMARY KEY (`mod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=9 ;

--
-- Dumping data for table `modulos`
--

INSERT INTO `modulos` (`mod_id`, `mod_nombre`, `mod_descripcion`, `mod_url`, `mod_icono`, `mod_tipo`, `mod_activar`) VALUES
(1, 'Sistemas', '', 'modulos/sistemas/sistemas.adm.php', 'icn-system', 2, 1),
(2, 'Modulos', '', 'modulos/modulos/modulos.adm.php', 'icn-box color-text-verde-a', 2, 1),
(3, 'Atajos', '', 'modulos/modulos/atajos.adm.php', 'icn-shortcut color-text-naranja', 2, 1),
(4, 'Usuarios', '', 'modulos/usuarios/usuarios.adm.php', 'icn-user color-text-azul-a', 2, 1),
(5, 'Categorias', '', 'modulos/categorias/categorias.adm.php', 'icn-category color-text-violeta-a', 2, 1),
(6, 'Configuración Site', '', '#', 'icn-conf color-text-rojo', 2, 1),
(7, 'Enlaces', '', 'modulos/enlaces/enlaces.adm.php', 'icn-link color-text-magenta', 0, 1),
(8, 'Contenidos', '', 'modulos/contenidos/contenidos.adm.php', 'icn-content color-text-azul-c', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `planes`
--

CREATE TABLE IF NOT EXISTS `planes` (
  `plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `plan_descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `plan_estado` int(11) NOT NULL COMMENT '0 no activo\n1 activo\n',
  `plan_nivel` varchar(45) CHARACTER SET ucs2 NOT NULL,
  PRIMARY KEY (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plantilla`
--

CREATE TABLE IF NOT EXISTS `plantilla` (
  `pla_id` int(11) NOT NULL,
  `pla_nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pla_ruta_amigable` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pla_icono` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pla_imagen` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pla_meta` text CHARACTER SET utf8 NOT NULL,
  `pla_css` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pla_clase` varchar(45) CHARACTER SET utf8 NOT NULL,
  `pla_codigos` text CHARACTER SET utf8 NOT NULL,
  `pla_tipo` int(11) NOT NULL DEFAULT '0',
  `pla_movil` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pla_onload` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`pla_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `plantilla`
--

INSERT INTO `plantilla` (`pla_id`, `pla_nombre`, `pla_ruta_amigable`, `pla_icono`, `pla_imagen`, `pla_meta`, `pla_css`, `pla_clase`, `pla_codigos`, `pla_tipo`, `pla_movil`, `pla_onload`) VALUES
(1, 'plantilla_1', 'p=1', 'sitios/landicorp/images/favicon.icon', '', '', '', '', '', 0, '', 'page_precarga();'),
(2, 'plantilla_2', 'p=2', '', '', '', '', '', '', 0, '', ''),
(3, 'plantilla_3', 'p=3', '', '', '', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `publicacion`
--

CREATE TABLE IF NOT EXISTS `publicacion` (
  `pub_id` int(11) NOT NULL AUTO_INCREMENT,
  `pub_nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pub_descripcion` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pub_imagen` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pub_titulo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pub_tipo` int(11) NOT NULL DEFAULT '0',
  `pub_archivo` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pub_css` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pub_clase` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pub_id_item` int(11) NOT NULL DEFAULT '0',
  `pub_numero` int(11) NOT NULL DEFAULT '0',
  `pub_id_cat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=6 ;

--
-- Dumping data for table `publicacion`
--

INSERT INTO `publicacion` (`pub_id`, `pub_nombre`, `pub_descripcion`, `pub_imagen`, `pub_titulo`, `pub_tipo`, `pub_archivo`, `pub_css`, `pub_clase`, `pub_id_item`, `pub_numero`, `pub_id_cat`) VALUES
(1, 'ruta_raiz', '', '', '', 0, 'modulos/nav/ruta-raiz.pub.php', '', '', 0, 0, 0),
(2, 'portada_landicorp', '', '', '', 0, 'sitios/landicorp/modulos/portada.pub.php', '', '', 0, 0, 0),
(3, 'conozca_landicorp', '', '', '', 0, 'sitios/landicorp/modulos/conozca.pub.php', '', '', 0, 0, 0),
(4, 'contacto_landicor', '', '', '', 0, 'sitios/landicorp/modulos/contacto.pub.php', '', '', 0, 0, 0),
(5, 'portada_utilar', '', '', '', 0, 'sitios/utilar/modulos/portada.pub.php', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `publicacion_rel`
--

CREATE TABLE IF NOT EXISTS `publicacion_rel` (
  `pubrel_id` int(11) NOT NULL AUTO_INCREMENT,
  `pubrel_cat_id` int(11) NOT NULL,
  `pubrel_pla_id` int(11) NOT NULL,
  `pubrel_cont_id` int(11) NOT NULL,
  `pubrel_pub_id` int(11) NOT NULL,
  `pubrel_activar` int(11) NOT NULL DEFAULT '0',
  `pubrel_orden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pubrel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=6 ;

--
-- Dumping data for table `publicacion_rel`
--

INSERT INTO `publicacion_rel` (`pubrel_id`, `pubrel_cat_id`, `pubrel_pla_id`, `pubrel_cont_id`, `pubrel_pub_id`, `pubrel_activar`, `pubrel_orden`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 2, 1, 1),
(3, 5, 1, 1, 3, 1, 1),
(4, 7, 1, 1, 4, 1, 1),
(5, 4, 1, 1, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(45) CHARACTER SET utf8 NOT NULL,
  `rol_funciones` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rol_id_padre` int(11) NOT NULL,
  `rol_grupo` int(11) NOT NULL,
  `rol_permisos` varchar(45) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_nombre`, `rol_funciones`, `rol_id_padre`, `rol_grupo`, `rol_permisos`) VALUES
(1, 'Administrador', 'todo poderoso', 0, 1, ''),
(2, 'Diseñador web', '', 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `sistemas`
--

CREATE TABLE IF NOT EXISTS `sistemas` (
  `sis_id` int(11) NOT NULL AUTO_INCREMENT,
  `sis_nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sis_descripcion` text CHARACTER SET utf8 NOT NULL,
  `sis_icono` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sis_tipo` int(11) NOT NULL COMMENT '0 - Multiproposito\n1 - CMS\n2 - CRM\n3 - ERP\n4 - RRHH\n5 - ADM\n7 - PROYECTOS\n8 - FiNANZAS\n9 - GERENCIA\n10 - TIC',
  `sis_activar` int(11) NOT NULL,
  `sis_orden` int(11) NOT NULL,
  PRIMARY KEY (`sis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sistemas`
--

INSERT INTO `sistemas` (`sis_id`, `sis_nombre`, `sis_descripcion`, `sis_icono`, `sis_tipo`, `sis_activar`, `sis_orden`) VALUES
(1, 'Web', '', 'icn-code color-text-amarillo-b', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sistemas_modulos`
--

CREATE TABLE IF NOT EXISTS `sistemas_modulos` (
  `sistemas_sis_id` int(11) NOT NULL,
  `modulos_mod_id` int(11) NOT NULL,
  PRIMARY KEY (`sistemas_sis_id`,`modulos_mod_id`),
  KEY `fk_sistemas_has_modulos_modulos1_idx` (`modulos_mod_id`) USING BTREE,
  KEY `fk_sistemas_has_modulos_sistemas1_idx` (`sistemas_sis_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sistemas_modulos`
--

INSERT INTO `sistemas_modulos` (`sistemas_sis_id`, `modulos_mod_id`) VALUES
(1, 7),
(1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sitios`
--

CREATE TABLE IF NOT EXISTS `sitios` (
  `sitio_id` int(11) NOT NULL AUTO_INCREMENT,
  `cuenta_usu_id` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cuenta_tipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`sitio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_nombre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usu_apellidos` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usu_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usu_password` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `usu_estado` int(11) NOT NULL,
  `usu_imagen` varchar(255) CHARACTER SET utf8 NOT NULL,
  `usu_padre` int(11) NOT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=3 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nombre`, `usu_apellidos`, `usu_email`, `usu_password`, `usu_estado`, `usu_imagen`, `usu_padre`) VALUES
(1, 'Hermany', 'Terrazas', 'hterrazas@wappcom.com', 'NDg2Mg==', 1, '', 0),
(2, 'Jose Nicolas', 'Landivar', 'design@landicorp.com', 'NDg2Mg==', 1, 'images/user/nicolas.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_grupos`
--

CREATE TABLE IF NOT EXISTS `usuarios_grupos` (
  `usuarios_usu_id` int(11) NOT NULL,
  `grupos_grupo_id` int(11) NOT NULL,
  PRIMARY KEY (`usuarios_usu_id`,`grupos_grupo_id`),
  KEY `fk_usuarios_has_usuarios_grupos_usuarios_grupos1_idx` (`grupos_grupo_id`) USING BTREE,
  KEY `fk_usuarios_has_usuarios_grupos_usuarios1_idx` (`usuarios_usu_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_roles`
--

CREATE TABLE IF NOT EXISTS `usuarios_roles` (
  `usuarios_usu_id` int(11) NOT NULL,
  `roles_rol_id` int(11) NOT NULL,
  PRIMARY KEY (`usuarios_usu_id`,`roles_rol_id`),
  KEY `fk_usuarios_has_roles_roles1_idx` (`roles_rol_id`) USING BTREE,
  KEY `fk_usuarios_has_roles_usuarios1_idx` (`usuarios_usu_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `usuarios_roles`
--

INSERT INTO `usuarios_roles` (`usuarios_usu_id`, `roles_rol_id`) VALUES
(1, 1),
(2, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contenedor_plantilla`
--
ALTER TABLE `contenedor_plantilla`
  ADD CONSTRAINT `fk_contenedor_plantilla_contenedor1` FOREIGN KEY (`contenedor_cont_id`) REFERENCES `contenedor` (`cont_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contenedor_plantilla_plantilla1` FOREIGN KEY (`plantilla_pla_id`) REFERENCES `plantilla` (`pla_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sistemas_modulos`
--
ALTER TABLE `sistemas_modulos`
  ADD CONSTRAINT `fk_sistemas_modulos_modulos1` FOREIGN KEY (`modulos_mod_id`) REFERENCES `modulos` (`mod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sistemas_modulos_sistemas1` FOREIGN KEY (`sistemas_sis_id`) REFERENCES `sistemas` (`sis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios_grupos`
--
ALTER TABLE `usuarios_grupos`
  ADD CONSTRAINT `fk_usuarios_grupos_grupos` FOREIGN KEY (`grupos_grupo_id`) REFERENCES `grupos` (`grupo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_grupos_usuarios` FOREIGN KEY (`usuarios_usu_id`) REFERENCES `usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
  ADD CONSTRAINT `fk_usuarios_roles_roles` FOREIGN KEY (`roles_rol_id`) REFERENCES `roles` (`rol_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_roles_usuarios` FOREIGN KEY (`usuarios_usu_id`) REFERENCES `usuarios` (`usu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
