-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2017 a las 01:10:17
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `feria_de_la_construccion`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `crearUsuario` (IN `id` VARCHAR(60), IN `rol` VARCHAR(60), IN `docu` CHAR(15), IN `nom` VARCHAR(60), IN `ape` VARCHAR(60), IN `cel` CHAR(15), IN `gen` CHAR(20), IN `cumple` INT(2), IN `cargo` CHAR(40), IN `ins` CHAR(80), IN `token` VARCHAR(60), IN `email` VARCHAR(60), IN `pass` VARCHAR(255), IN `est` VARCHAR(30))  BEGIN
	INSERT INTO user VALUES(id,rol,docu,nom,ape,cel,gen,cumple,cargo,ins);
    INSERT INTO access VALUES(token,id,email,pass,est);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `readEmail` (IN `mail` VARCHAR(60) CHARSET utf8)  BEGIN
	SELECT * FROM user INNER JOIN access ON(user.use_code=access.use_code) WHERE use_mail = mail;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `access`
--

CREATE TABLE `access` (
  `acc_token` varchar(60) NOT NULL,
  `use_code` varchar(60) NOT NULL,
  `use_mail` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `acc_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `access`
--

INSERT INTO `access` (`acc_token`, `use_code`, `use_mail`, `password`, `acc_status`) VALUES
('Hpt7AMXiy936A6uR9JxpeGR8d0HPch', 'yxKgMb7eTFMZCndIaapZfiQR7Ir0rH', 'admin@feriadelaconstruccion.co', '$2y$10$g3iQ30xkxmYbt84pHA1Zs.elXYr1LkzWc27gLdiqF.eDi35rLuDqe', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calification`
--

CREATE TABLE `calification` (
  `cal_code` varchar(30) NOT NULL,
  `use_code` varchar(60) NOT NULL,
  `cal_conf` varchar(60) NOT NULL,
  `cal_stand` varchar(60) NOT NULL,
  `cal_comment` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conference`
--

CREATE TABLE `conference` (
  `con_code` varchar(60) NOT NULL,
  `day_code` varchar(60) NOT NULL,
  `con_name` char(50) NOT NULL,
  `use_code` varchar(60) DEFAULT NULL,
  `con_startime` time NOT NULL,
  `con_finishtime` time NOT NULL,
  `con_share` int(11) NOT NULL,
  `con_creationdate` date NOT NULL,
  `con_creationtime` time NOT NULL,
  `con_description` longtext NOT NULL,
  `con_status` varchar(20) NOT NULL,
  `con_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `conferencias`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `conferencias` (
`codigo` varchar(60)
,`dia` varchar(60)
,`expositor` varchar(121)
,`nombre` char(50)
,`inicio` varchar(5)
,`final` varchar(5)
,`cupo` int(11)
,`fecha_creacion` date
,`hora_creacion` time
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `day`
--

CREATE TABLE `day` (
  `day_code` varchar(60) NOT NULL,
  `eve_code` varchar(60) NOT NULL,
  `day_current` varchar(10) DEFAULT NULL,
  `day_date` date DEFAULT NULL,
  `day_startime` time DEFAULT NULL,
  `day_finishtime` time DEFAULT NULL,
  `day_descrip` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event`
--

CREATE TABLE `event` (
  `eve_code` varchar(60) NOT NULL,
  `eve_name` char(50) NOT NULL,
  `eve_startdate` date NOT NULL,
  `eve_finishdate` date NOT NULL,
  `eve_numday` int(11) DEFAULT NULL,
  `eve_creationdate` date NOT NULL,
  `eve_creationtime` time NOT NULL,
  `use_code` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file_conference`
--

CREATE TABLE `file_conference` (
  `fic_code` varchar(60) NOT NULL,
  `con_code` varchar(60) DEFAULT NULL,
  `fic_name` varchar(60) DEFAULT NULL,
  `fic_file` varchar(120) DEFAULT NULL,
  `fic_description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file_stand`
--

CREATE TABLE `file_stand` (
  `fis_code` varchar(60) NOT NULL,
  `sta_code` varchar(60) NOT NULL,
  `fis_nom` char(50) NOT NULL,
  `fis_file` varchar(120) NOT NULL,
  `fis_descripcion` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ing_eve`
--

CREATE TABLE `ing_eve` (
  `use_day_code` varchar(60) NOT NULL,
  `day_code` varchar(60) NOT NULL,
  `use_code` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pavilion`
--

CREATE TABLE `pavilion` (
  `pav_code` varchar(60) NOT NULL,
  `day_code` varchar(60) NOT NULL,
  `pav_name` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `rol_code` varchar(60) NOT NULL,
  `rol_name` char(50) NOT NULL,
  `rol_desc` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`rol_code`, `rol_name`, `rol_desc`) VALUES
('ASEV4G5GVCG5A7O38DKS8W2EDDE42A', 'Conferencista', 'Pude adjuntar archivos a las conferencias'),
('E3HDKX3684UTA7DMHFOAA34HAK39PM', 'Expositor', 'Este rol puede gestionar la subida de memorias(archivos) e ingresar las personas que visitaron su stand'),
('F34L2P7GPT9RHI37S306OFVI16TI47', 'Administrativo', 'Este rol gestiona todo el aplicativo'),
('OS7CX80C7QQBLGJV41MB3YY4ZA234O', 'Visitante', 'usuario corriente usa la aplicacion mas no gestiona esta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sal_eve`
--

CREATE TABLE `sal_eve` (
  `use_day_code` varchar(60) NOT NULL,
  `day_code` varchar(60) NOT NULL,
  `use_code` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stand`
--

CREATE TABLE `stand` (
  `sta_code` varchar(60) NOT NULL,
  `pav_code` varchar(60) NOT NULL,
  `use_code` varchar(60) NOT NULL,
  `sta_name` char(50) NOT NULL,
  `sta_web` varchar(60) DEFAULT NULL,
  `sta_mail` varchar(30) NOT NULL,
  `sta_numcontact` char(16) NOT NULL,
  `sta_descrip` longtext,
  `sta_creationdate` date NOT NULL,
  `sta_creationtime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `stands`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `stands` (
`codigo` varchar(60)
,`pabellon` varchar(60)
,`nombre` char(50)
,`expositor` varchar(121)
,`web` varchar(60)
,`email` varchar(30)
,`contacto` char(16)
,`descripcion` varchar(140)
,`desc_original` longtext
,`fecha_creacion` date
,`hora_creacion` time
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `use_code` varchar(60) NOT NULL,
  `rol_code` varchar(60) NOT NULL,
  `use_docu` char(15) NOT NULL,
  `use_firstname` varchar(60) NOT NULL,
  `use_lastname` varchar(60) NOT NULL,
  `use_cellphone` char(15) DEFAULT NULL,
  `use_gender` char(20) NOT NULL,
  `use_birthdate` int(2) DEFAULT NULL,
  `use_profession` char(40) NOT NULL,
  `use_institution` char(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`use_code`, `rol_code`, `use_docu`, `use_firstname`, `use_lastname`, `use_cellphone`, `use_gender`, `use_birthdate`, `use_profession`, `use_institution`) VALUES
('yxKgMb7eTFMZCndIaapZfiQR7Ir0rH', 'F34L2P7GPT9RHI37S306OFVI16TI47', '000000', 'Admin', 'Feria', '0000000', 'MASCULINO', 30, 'Otro', 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `use_conference`
--

CREATE TABLE `use_conference` (
  `use_con_code` varchar(30) NOT NULL,
  `use_code` varchar(60) DEFAULT NULL,
  `con_code` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `use_stand`
--

CREATE TABLE `use_stand` (
  `use_sta_code` varchar(30) NOT NULL,
  `use_code` varchar(60) NOT NULL,
  `sta_code` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura para la vista `conferencias`
--
DROP TABLE IF EXISTS `conferencias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mfappco`@`localhost` SQL SECURITY DEFINER VIEW `conferencias`  AS  select `conference`.`con_code` AS `codigo`,`conference`.`day_code` AS `dia`,concat(`user`.`use_firstname`,' ',`user`.`use_lastname`) AS `expositor`,`conference`.`con_name` AS `nombre`,date_format(`conference`.`con_startime`,'%h:%i') AS `inicio`,date_format(`conference`.`con_finishtime`,'%h:%i') AS `final`,`conference`.`con_share` AS `cupo`,`conference`.`con_creationdate` AS `fecha_creacion`,`conference`.`con_creationtime` AS `hora_creacion` from (`conference` join `user` on((`conference`.`use_code` = `user`.`use_code`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `stands`
--
DROP TABLE IF EXISTS `stands`;

CREATE ALGORITHM=UNDEFINED DEFINER=`mfappco`@`localhost` SQL SECURITY DEFINER VIEW `stands`  AS  select `stand`.`sta_code` AS `codigo`,`stand`.`pav_code` AS `pabellon`,`stand`.`sta_name` AS `nombre`,concat(`user`.`use_firstname`,' ',`user`.`use_lastname`) AS `expositor`,`stand`.`sta_web` AS `web`,lcase(`stand`.`sta_mail`) AS `email`,`stand`.`sta_numcontact` AS `contacto`,substr(`stand`.`sta_descrip`,1,140) AS `descripcion`,`stand`.`sta_descrip` AS `desc_original`,`stand`.`sta_creationdate` AS `fecha_creacion`,`stand`.`sta_creationtime` AS `hora_creacion` from (`stand` join `user` on((`user`.`use_code` = `stand`.`use_code`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`acc_token`),
  ADD UNIQUE KEY `use_mail` (`use_mail`),
  ADD KEY `fk_security` (`use_code`);

--
-- Indices de la tabla `calification`
--
ALTER TABLE `calification`
  ADD PRIMARY KEY (`cal_code`),
  ADD KEY `use_code` (`use_code`);

--
-- Indices de la tabla `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`con_code`),
  ADD KEY `fk_day_cod` (`day_code`),
  ADD KEY `fk_usuconf` (`use_code`);

--
-- Indices de la tabla `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`day_code`),
  ADD KEY `fk_eve_token` (`eve_code`);

--
-- Indices de la tabla `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eve_code`),
  ADD KEY `eve_creationuser` (`use_code`);

--
-- Indices de la tabla `file_conference`
--
ALTER TABLE `file_conference`
  ADD PRIMARY KEY (`fic_code`),
  ADD KEY `fk_file_conference` (`con_code`);

--
-- Indices de la tabla `file_stand`
--
ALTER TABLE `file_stand`
  ADD PRIMARY KEY (`fis_code`),
  ADD KEY `fk_filsta` (`sta_code`);

--
-- Indices de la tabla `ing_eve`
--
ALTER TABLE `ing_eve`
  ADD PRIMARY KEY (`use_day_code`),
  ADD KEY `day_code` (`day_code`),
  ADD KEY `use_code` (`use_code`);

--
-- Indices de la tabla `pavilion`
--
ALTER TABLE `pavilion`
  ADD PRIMARY KEY (`pav_code`),
  ADD KEY `fk_day_cod_pavilion` (`day_code`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`rol_code`);

--
-- Indices de la tabla `sal_eve`
--
ALTER TABLE `sal_eve`
  ADD PRIMARY KEY (`use_day_code`),
  ADD KEY `fk_ususal` (`use_code`),
  ADD KEY `fk_daysal` (`day_code`);

--
-- Indices de la tabla `stand`
--
ALTER TABLE `stand`
  ADD PRIMARY KEY (`sta_code`),
  ADD KEY `fk_pavilion` (`pav_code`),
  ADD KEY `use_code` (`use_code`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`use_code`),
  ADD UNIQUE KEY `use_docu` (`use_docu`),
  ADD KEY `fk_id_rol_user` (`rol_code`);

--
-- Indices de la tabla `use_conference`
--
ALTER TABLE `use_conference`
  ADD PRIMARY KEY (`use_con_code`),
  ADD KEY `use_code` (`use_code`),
  ADD KEY `con_code` (`con_code`);

--
-- Indices de la tabla `use_stand`
--
ALTER TABLE `use_stand`
  ADD PRIMARY KEY (`use_sta_code`),
  ADD KEY `use_code` (`use_code`),
  ADD KEY `sta_code` (`sta_code`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `access`
--
ALTER TABLE `access`
  ADD CONSTRAINT `fk_security` FOREIGN KEY (`use_code`) REFERENCES `user` (`use_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `fk_day_cod` FOREIGN KEY (`day_code`) REFERENCES `day` (`day_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuconf` FOREIGN KEY (`use_code`) REFERENCES `user` (`use_code`);

--
-- Filtros para la tabla `day`
--
ALTER TABLE `day`
  ADD CONSTRAINT `fk_eve_token` FOREIGN KEY (`eve_code`) REFERENCES `event` (`eve_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`use_code`) REFERENCES `user` (`use_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `file_conference`
--
ALTER TABLE `file_conference`
  ADD CONSTRAINT `fk_file_conference` FOREIGN KEY (`con_code`) REFERENCES `conference` (`con_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `file_stand`
--
ALTER TABLE `file_stand`
  ADD CONSTRAINT `fk_filsta` FOREIGN KEY (`sta_code`) REFERENCES `stand` (`sta_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ing_eve`
--
ALTER TABLE `ing_eve`
  ADD CONSTRAINT `ing_eve_ibfk_1` FOREIGN KEY (`day_code`) REFERENCES `day` (`day_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ing_eve_ibfk_2` FOREIGN KEY (`use_code`) REFERENCES `user` (`use_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pavilion`
--
ALTER TABLE `pavilion`
  ADD CONSTRAINT `fk_day_cod_pavilion` FOREIGN KEY (`day_code`) REFERENCES `day` (`day_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `sal_eve`
--
ALTER TABLE `sal_eve`
  ADD CONSTRAINT `fk_daysal` FOREIGN KEY (`day_code`) REFERENCES `day` (`day_code`),
  ADD CONSTRAINT `fk_ususal` FOREIGN KEY (`use_code`) REFERENCES `user` (`use_code`);

--
-- Filtros para la tabla `stand`
--
ALTER TABLE `stand`
  ADD CONSTRAINT `fk_pavilion` FOREIGN KEY (`pav_code`) REFERENCES `pavilion` (`pav_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stand_ibfk_1` FOREIGN KEY (`use_code`) REFERENCES `user` (`use_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_id_rol_user` FOREIGN KEY (`rol_code`) REFERENCES `role` (`rol_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `use_conference`
--
ALTER TABLE `use_conference`
  ADD CONSTRAINT `use_conference_ibfk_1` FOREIGN KEY (`use_code`) REFERENCES `user` (`use_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `use_conference_ibfk_2` FOREIGN KEY (`con_code`) REFERENCES `conference` (`con_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `use_stand`
--
ALTER TABLE `use_stand`
  ADD CONSTRAINT `use_stand_ibfk_1` FOREIGN KEY (`use_code`) REFERENCES `user` (`use_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `use_stand_ibfk_2` FOREIGN KEY (`sta_code`) REFERENCES `stand` (`sta_code`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
