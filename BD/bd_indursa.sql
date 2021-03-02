-- --------------------------------------------------------
-- Host:                         192.168.1.72
-- Versión del servidor:         10.5.8-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para bd_inbursa
CREATE DATABASE IF NOT EXISTS `bd_inbursa` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bd_inbursa`;

-- Volcando estructura para tabla bd_inbursa.tbl_alta_caso
CREATE TABLE IF NOT EXISTS `tbl_alta_caso` (
  `tac_cod_alta` int(11) NOT NULL AUTO_INCREMENT,
  `tac_fecha_alta` date DEFAULT curdate(),
  `tac_fecha_origen` date DEFAULT curdate(),
  `tac_fecha_limite` date DEFAULT curdate(),
  `tac_correo_origen` text DEFAULT NULL,
  `tac_area` text DEFAULT NULL,
  `tac_analista` int(11) DEFAULT NULL,
  `tac_asunto` text DEFAULT NULL,
  `tac_descripcion` text DEFAULT NULL,
  `tac_evidencia` text DEFAULT NULL,
  `tac_status` int(11) DEFAULT NULL,
  `tac_asigna_caso` text DEFAULT NULL,
  `tac_notificacion_usuario` int(11) DEFAULT 0,
  `tac_actualizar_notificacion` date DEFAULT curdate(),
  PRIMARY KEY (`tac_cod_alta`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_inbursa.tbl_alta_caso: ~10 rows (aproximadamente)
DELETE FROM `tbl_alta_caso`;
/*!40000 ALTER TABLE `tbl_alta_caso` DISABLE KEYS */;
INSERT INTO `tbl_alta_caso` (`tac_cod_alta`, `tac_fecha_alta`, `tac_fecha_origen`, `tac_fecha_limite`, `tac_correo_origen`, `tac_area`, `tac_analista`, `tac_asunto`, `tac_descripcion`, `tac_evidencia`, `tac_status`, `tac_asigna_caso`, `tac_notificacion_usuario`, `tac_actualizar_notificacion`) VALUES
	(25, '2021-01-09', '2020-08-10', '2020-08-20', 'DANIELA_SEGUROS@INBURSA.COM', 'DIRECCION GENERAL DE PROYECTOS', 1, 'ENTREGA DE MATERIAL PARA FINANZAS', 'EL MATERIAL INDICADO Y ENTREGADO EL 10 DE AGOSTO 2020, SE PRESENTA UN RETRASO DE DOS DÍAS, ASÍ QUE NO HABRÁ  PRORROGA DE ENTREGA DEL MATERIAL', 'vistas/img/usuarios/usuario_defecto.png', NULL, NULL, 0, '2021-01-09'),
	(26, '2021-01-09', '2020-08-31', '2020-08-31', 'actualizar', 'actualizar', 2, 'actualizar', 'actualizar', 'vistas/img/usuarios/usuario_defecto.png', NULL, NULL, 0, '2021-01-09'),
	(27, '2021-01-09', '2020-08-04', '2020-08-06', 'LOLA@INBURSA.COM', 'AUDITORIA INFORMATICA', 2, 'FRAUDE POR IDENTIDAD DIGITAL Y SUPLANTACIÓN', 'SE REQUIERE UNA INVESTIGACIÓN EN LA SIGUIENTE CUENTA 444423 A NOMBRE DE CARLOS ALBERTO MEJIA RAMOS, TITULAR Y DUEÑO DE LA EMPRESA APICSA, SU CUENTA HA SIDO CANCELADA DE MOMENTO. SU ATENCION DEBE DE ATENDERSE DE INMEDIATO', 'vistas/img/usuarios/usuario_defecto.png', NULL, NULL, 0, '2021-01-09'),
	(28, '2021-01-09', '2020-08-18', '2020-08-21', 'JAZZMIN_LOURDES@INBURSA.COM', 'GERENCIA DE INVESTIGACION I', 1, 'ALTA DE NUEVOS USUARIOS BECARIOS', 'SE NECESITA ACTIVAR PERMISOS PARA EL USO DE INTERNET, YA QUE SE UTILIZARAN PARA REDES SOCIALES, Y REALMENTE ES DE CARÁCTER SUPER URGENTE. QUEDO AL PENDIENTE.', 'vistas/img/usuarios/usuario_defecto.png', NULL, NULL, 0, '2021-01-09'),
	(29, '2021-01-09', '2020-08-10', '2020-08-20', 'FERNANDO_CARMONA@INBURSA.COM', 'PREVENCIÓN DE FRAUDES Y COMERCIO', 1, 'PAPELERÍA Y CENTRO DE UTILES ', 'SE DESCRIBE LAS ESPECIFICACIONES DEL MATERIAL DE APOYO  PARA SU CORRECTA ENTREGA, CON LA TENACIDAD DE ARQUITECTURA CON  LOS NUEVOS USUARIOS', 'vistas/img/usuarios/usuario_defecto.png', NULL, NULL, 0, '2021-01-09'),
	(30, '2021-01-09', '2020-08-20', '2020-08-27', 'LILIAM_ITZEL@INBURSA.COM', 'SOPORTE Y AMNTENIMIENTO', 1, 'AUDITORIA EN EL ÁREA DE SISTEMAS', 'SE REQUIERE DE UN AUDITOR PARA REALIZAR EL ANALISTA Y LA SUPERVICION DE LOS EQUIPOS DE TODOS LOS USUARIOS DE LA OFICINA MATRIZ', 'vistas/img/usuarios/usuario_defecto.png', NULL, NULL, 0, '2021-01-09'),
	(31, '2021-01-09', '2020-08-20', '2020-08-29', 'VICTOR_ANTONIO@INBURSA.COM', 'GERENCIA DE INVESTIGACIONES II', 2, 'CONTRATOS MODIFICADOS', 'SE DETECTO QUE LOS CONTRATOS NO. 222334, NO. 3334345, PRESENTA ALTERACIONES EN LA CUENTA PRINCIPAL DEL CLIENTE 3445322, CON UN ESTADO DE CUENTA ALTERADO POR UNA TERCERA PERSONA', 'vistas/img/usuarios/usuario_defecto.png', NULL, NULL, 1, '2021-01-09'),
	(32, '2021-01-09', '2020-08-26', '2020-09-02', 'ISABEL@IMSS.COM.MX', 'CAPACITACION EN EL AREA DE BIG DATA', 1, 'REQUIERO DE EGRESADOS ', 'SE EXTIENDE Y SE FIRMA UNA CONVOCATORIA PARA CAPACITAR A  14 JÓVENES INTERESADOS Y APASIONADOS CON LA TECNOLOGÍA DE LA INFORMACIÓN SI QUE SI.', 'vistas/img/usuarios/usuario_defecto.png', NULL, NULL, 0, '2021-01-09'),
	(33, '2021-01-09', '2020-08-20', '2020-08-26', 'MAMA_LOL@INBURSA.COM', 'DESARROLLO WEB Y COMPETITIVO', 1, 'SE NECESITA DE DOS DESARROLLADORES EN  PHP', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAA AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKKKKKKKKKKKKKKKDJWDFHWJBEKJFBDFWFJBSDJF', 'vistas/img/usuarios/usuario_defecto.png', NULL, NULL, 0, '2021-01-09'),
	(34, '2021-01-09', '2020-08-26', '2020-09-02', 'ISABEL2@IMSS.COM.MX', 'IMMS DESARROLLO', 1, 'INSTITUTO MEXICANO', 'INSTITUTO MEXICANO DEL SEGURO SOCIAL JEJEE', 'vistas/img/usuarios/usuario_defecto.png', NULL, NULL, 0, '2021-01-09'),
	(35, '2021-01-09', '2020-12-30', '2021-01-07', 'PRUEBA.DOMINIO@IMSS.COM.MX', 'PRUEBA.DOMINIO', 2, 'PRUEBA.DOMINIO', 'PRUEBA.DOMINIO', 'vistas/img/usuarios/usuario_defecto.png', NULL, 'TORIBIO CRUZ MARTINEZ', 0, '2021-01-09'),
	(36, '2021-01-09', '2021-01-07', '2021-01-20', 'IMSS.PRUEBA@IMSS.COM.MX', 'IMSS.PRUEBA', 1, 'IMSS.PRUEBA', 'IMSS.PRUEBA', 'vistas/img/usuarios/usuario_defecto.png', NULL, 'AXEL CHARREZ MEJIA', 0, '2021-01-09');
/*!40000 ALTER TABLE `tbl_alta_caso` ENABLE KEYS */;

-- Volcando estructura para tabla bd_inbursa.tbl_analistas
CREATE TABLE IF NOT EXISTS `tbl_analistas` (
  `ta_cod_analista` int(11) NOT NULL AUTO_INCREMENT,
  `ta_nombre_completo` text DEFAULT NULL,
  `ta_puesto` text DEFAULT NULL,
  `ta_gerencia` text DEFAULT NULL,
  `ta_numero_registro` int(11) DEFAULT NULL,
  `ta_correo` text DEFAULT NULL,
  PRIMARY KEY (`ta_cod_analista`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_inbursa.tbl_analistas: ~4 rows (aproximadamente)
DELETE FROM `tbl_analistas`;
/*!40000 ALTER TABLE `tbl_analistas` DISABLE KEYS */;
INSERT INTO `tbl_analistas` (`ta_cod_analista`, `ta_nombre_completo`, `ta_puesto`, `ta_gerencia`, `ta_numero_registro`, `ta_correo`) VALUES
	(1, 'CARLOS ALBERTO MEJIA RAMOS', 'ANALISTA DE INVESTIGACIONES', 'GERENCIA DE INVESTIGACION I', 1164482, 'CARLOS.MEJIA@INBURSA.COM'),
	(2, 'LILIAM CRUZ MARTINEZ', 'JEFE DE INVESTIGACIONES', 'GERENCIA DE INVESTIGACION I', 234567, 'LILIAM.ITZEL@INBURSA.COM'),
	(3, 'AXEL CHARREZ MEJIA', 'GERENTE', 'GERENCIA DE INVESTIGACION II', 666666, 'AXEL.CHARREZ@INBURSA.COM'),
	(4, 'TORIBIO CRUZ MARTINEZ', 'GERENTE', 'GERENCIA DE INVESTIGACION I', 5555555, 'TORIBIO.CRUZ@INBURSA.COM');
/*!40000 ALTER TABLE `tbl_analistas` ENABLE KEYS */;

-- Volcando estructura para tabla bd_inbursa.tbl_cuentas_usuarios
CREATE TABLE IF NOT EXISTS `tbl_cuentas_usuarios` (
  `tcu_cod_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `tcu_cod_analista` int(11) NOT NULL,
  `tcu_nombre_cuenta` text NOT NULL,
  `tcu_pass_cuenta` text NOT NULL DEFAULT '0',
  `tcu_nivel_cuenta` int(11) NOT NULL DEFAULT 0,
  `tcu_status_cuenta` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`tcu_cod_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_inbursa.tbl_cuentas_usuarios: ~4 rows (aproximadamente)
DELETE FROM `tbl_cuentas_usuarios`;
/*!40000 ALTER TABLE `tbl_cuentas_usuarios` DISABLE KEYS */;
INSERT INTO `tbl_cuentas_usuarios` (`tcu_cod_cuenta`, `tcu_cod_analista`, `tcu_nombre_cuenta`, `tcu_pass_cuenta`, `tcu_nivel_cuenta`, `tcu_status_cuenta`) VALUES
	(1, 1, 'CARLOS', '12345', 1, 1),
	(2, 2, 'LILY', '12345', 1, 1),
	(3, 3, 'AXEL', '12345', 3, 1),
	(4, 4, 'TORI', '12345', 3, 1);
/*!40000 ALTER TABLE `tbl_cuentas_usuarios` ENABLE KEYS */;

-- Volcando estructura para tabla bd_inbursa.tbl_paginas
CREATE TABLE IF NOT EXISTS `tbl_paginas` (
  `tp_cod_pagina` int(11) NOT NULL AUTO_INCREMENT,
  `tp_ruta_pagina` text DEFAULT NULL,
  `tp_descripcion_pagina` text DEFAULT NULL,
  `tp_permiso` text DEFAULT NULL,
  PRIMARY KEY (`tp_cod_pagina`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_inbursa.tbl_paginas: ~7 rows (aproximadamente)
DELETE FROM `tbl_paginas`;
/*!40000 ALTER TABLE `tbl_paginas` DISABLE KEYS */;
INSERT INTO `tbl_paginas` (`tp_cod_pagina`, `tp_ruta_pagina`, `tp_descripcion_pagina`, `tp_permiso`) VALUES
	(1, 'caso', 'Caso de Investigacion', 'Caso'),
	(2, 'salir', 'Salida del sistema', 'Salir'),
	(3, 'seguridad', ' Seguridad Informatica', 'Seguridad'),
	(4, 'login', 'Iniciar sesion', 'Login'),
	(5, 'escritorio', 'Pagina principal', 'Escritorio'),
	(6, 'modulos', 'Modulos del sistema', 'Modulos'),
	(8, 'consultaCaso', 'Consulta caso de Investigacion', 'Consulta Caso');
/*!40000 ALTER TABLE `tbl_paginas` ENABLE KEYS */;

-- Volcando estructura para tabla bd_inbursa.tbl_sigai
CREATE TABLE IF NOT EXISTS `tbl_sigai` (
  `ts_cod_sigai` int(11) NOT NULL AUTO_INCREMENT,
  `ts_dominio` text NOT NULL,
  `ts_titulo` text DEFAULT NULL,
  `ts_descripcion` text DEFAULT NULL,
  `ts_portada` text DEFAULT NULL,
  `ts_email` text DEFAULT NULL,
  `ts_logo` text DEFAULT NULL,
  `ts_icono` text DEFAULT NULL,
  `ts_redes_sociales` text DEFAULT NULL,
  `ts_sobre_mi` text DEFAULT NULL,
  `ts_sobre_mi_completo` text DEFAULT NULL,
  `ts_imagen_notificacion` text DEFAULT NULL,
  `ts_fecha` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ts_cod_sigai`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla bd_inbursa.tbl_sigai: ~0 rows (aproximadamente)
DELETE FROM `tbl_sigai`;
/*!40000 ALTER TABLE `tbl_sigai` DISABLE KEYS */;
INSERT INTO `tbl_sigai` (`ts_cod_sigai`, `ts_dominio`, `ts_titulo`, `ts_descripcion`, `ts_portada`, `ts_email`, `ts_logo`, `ts_icono`, `ts_redes_sociales`, `ts_sobre_mi`, `ts_sobre_mi_completo`, `ts_imagen_notificacion`, `ts_fecha`) VALUES
	(1, 'http://192.168.1.72/', 'SIGAI', 'SISTEMA INTEGRAL DE GESTION Y ADMINISTRACION DE INFORMACION', 'pendiente', 'carlos.ablues@gmail.com', 'vistas/img/logotipo-negativo.png', 'public/images/caso-icono.png', '[{"red": "facebook","url": "https://www.facebook.com/","icono": "fab fa-facebook-f"}, {"red": "instagram","url": "https://www.instagram.com/","icono": "fab fa-instagram"}, {"red": "twitter","url": "https://www.twitter.com/","icono": "fab fa-twitter"}, {"red": "youtube","url": "https://www.youtube.com/","icono": "fab fa-youtube"}, {"red": "snapchat","url": "https://www.snapchat.com/","icono": "fab fa-snapchat-ghost"}]', '<div class="sobreMi"><h4>Sobre Mi</h4><img src="vistas/img/sobreMi.jpg" alt="Lorem ipsum dolor sit amet" class="img-fluid my-1"><p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum odio, eos architecto atque numquam alias laboriosam minima beatae consectetur.</p></div>', '<div class="sobreMi"><h4>Sobre Mi</h4><img src="vistas/img/sobreMi.jpg" alt="Lorem ipsum dolor sit amet" class="img-fluid my-1"><p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum odio, eos architecto atque numquam alias laboriosam minima beatae consectetur.</p></div>', 'public/images/notificacion.png', '2020-08-06 12:11:10');
/*!40000 ALTER TABLE `tbl_sigai` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
