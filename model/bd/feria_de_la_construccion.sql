-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2017 a las 23:49:20
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
('AhdrCA9qGY3j3d4QFXude900ygNzQI', 'e7eYlQoe3dMg1LMX0em5OFIiBAqoZL', 'jprestrepo94@misena.edu.co', '$2y$10$2c3ypvzWtANZA6senOt0G.2Lu11mjnmVjF6WXrgnaJbheMJTqGFqa', 'Activo'),
('GVyiJ2zx31r5cBxoi2FtX0eMeJ0fHX', 'lkBJOYtJoasBqmExMACfLgs1fnMtzo', 'prueba@gmail.com', '$2y$10$eRs1LUyVgC5LEP5cBEA/V.yieKp3T1s3HuAdISgS7OyzibVM1Hq1.', 'Activo'),
('kcJHu22fZS8C6b60HVx69zy9f6JSnX', 'myMSKDrQbL2yJ9kV0vJs6638BADnCe', 'pablofe@ss.com', '$2y$10$mdn.EDpTKtvAEfKKtkjlquAOsAAHEl9KmlFra2sBFSsmF5To4eFgm', 'Activo'),
('kMel52s87Ng6ZELtyLVYFYGGVCaumv', 'fC2L4RuZbJgfu5GXKHL6ql3ezCee2q', 'decardona34@misena.edu.co', '$2y$10$FkeGKspB.3MtKfo5GZ6qPOikickWyCqddSJIm62qV9jSeOG68nPka', 'Activo'),
('MPgBsem4VXMzBVcHefCMUQKpyBTfE3', 'pMgDEXrA8C6RC8YpBaXqXX2F8ieZoe', 'labecerra01@yimail.com', '$2y$10$0uSiqAzv7ezEWtmoOI8cpuIfJuq93hqMuZ4YMymA7k7mnxwgCqAoy', 'Activo'),
('NPJ87zNhdK4k4ncdVcyTsAFJnrHSYN', 'nJibTg88m6Gf4yIQ1jTmFnrVbkT5lM', 'pacho@gmail.com', '$2y$10$C1U7oN5IGB6yRyfpS5dhme.sJ8y4h5t55v38lZpexVBiJKqKD8gu.', 'Activo'),
('O3jsvk9HykYuxjSVH7oCEmcbjI7sfO', 'GXS49Dqy6VveAerhPTpykzefN9ZqpQ', 'pablito@yimail.com', '$2y$10$L61AEGZGOPwTIOxKFoRnp.rjIICI8jWwWq9cfo9Q3Ez8dA5edt2ma', 'Activo'),
('Xi7dfnelOs8L9fiE8xEDdt5F43pT71', '7x2KzCS91ffIDLhN4icJs8qJbmBrmR', 'jpmunoz344@misena.edu.co', '$2y$10$3tCPL2pc3lcVzSq7FSXume68r1bfMqkWHmrdITf.yWDKA1IPBUeBS', 'Activo'),
('yo5dD2xPu9hIvdp7xfvKSGHPotx6q8', 'sPEB1XJR6BelN2V1JVdkZvXg9yqiie', 'pablofrg98@gmail.com', '$2y$10$r3QIxdfErP8dIfHgQG.rBe4NbXlYkR9yQSfKG63FaXGLwfKSxxPZG', 'Activo');

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
  `con_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `conference`
--

INSERT INTO `conference` (`con_code`, `day_code`, `con_name`, `use_code`, `con_startime`, `con_finishtime`, `con_share`, `con_creationdate`, `con_creationtime`, `con_description`, `con_status`) VALUES
('g9IYpe', 'JcZCjr3ZJPRSpXqMrl2ezd4Slhm2s9', 'Como ser hombre', 'pMgDEXrA8C6RC8YpBaXqXX2F8ieZoe', '06:08:00', '21:08:00', 200, '2017-08-24', '11:05:37', 'hoh', 'Activo'),
('vQxL4g', 'JcZCjr3ZJPRSpXqMrl2ezd4Slhm2s9', 'dddd', 'pMgDEXrA8C6RC8YpBaXqXX2F8ieZoe', '02:00:00', '01:00:00', 2, '2017-08-16', '11:08:43', 'dd', 'Activo');

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

--
-- Volcado de datos para la tabla `day`
--

INSERT INTO `day` (`day_code`, `eve_code`, `day_current`, `day_date`, `day_startime`, `day_finishtime`, `day_descrip`) VALUES
('0JHQntenZE4B8yUuvkFQu1a3oT9xY8', 'RexBS32OgSB3mNTD5UNNjlTAZ1qT4N', 'DIA1', '2017-08-16', '13:00:00', '17:00:00', 'Introduccion '),
('JcZCjr3ZJPRSpXqMrl2ezd4Slhm2s9', 'RexBS32OgSB3mNTD5UNNjlTAZ1qT4N', 'DIA2', '2017-08-17', '13:00:00', '15:00:00', 'Dia de conferencias'),
('jlCeAOpSmqEOm6NdEE78KfXbrtK0Go', 'RexBS32OgSB3mNTD5UNNjlTAZ1qT4N', 'DIA3', '2017-08-18', '13:00:00', '20:00:00', 'clausula');

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

--
-- Volcado de datos para la tabla `event`
--

INSERT INTO `event` (`eve_code`, `eve_name`, `eve_startdate`, `eve_finishdate`, `eve_numday`, `eve_creationdate`, `eve_creationtime`, `use_code`) VALUES
('RexBS32OgSB3mNTD5UNNjlTAZ1qT4N', 'feria de la construccion', '2017-08-16', '2017-08-18', 3, '2017-08-16', '08:08:09', 'e7eYlQoe3dMg1LMX0em5OFIiBAqoZL');

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

--
-- Volcado de datos para la tabla `pavilion`
--

INSERT INTO `pavilion` (`pav_code`, `day_code`, `pav_name`) VALUES
('PEq2N1dnfikg4A707qqZu0zbjeet5h', 'JcZCjr3ZJPRSpXqMrl2ezd4Slhm2s9', 'Pav1');

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

--
-- Volcado de datos para la tabla `stand`
--

INSERT INTO `stand` (`sta_code`, `pav_code`, `use_code`, `sta_name`, `sta_web`, `sta_mail`, `sta_numcontact`, `sta_descrip`, `sta_creationdate`, `sta_creationtime`) VALUES
('6sOqaA', 'PEq2N1dnfikg4A707qqZu0zbjeet5h', 'lkBJOYtJoasBqmExMACfLgs1fnMtzo', 'Pirrata', 'Pirrata.com', 'pirrata@gmail.com', '0394820293', 'dsfksdklfxcvsdfsdfsds', '2017-08-24', '11:26:47');

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
('7x2KzCS91ffIDLhN4icJs8qJbmBrmR', 'F34L2P7GPT9RHI37S306OFVI16TI47', '0987654321', 'Juan mf', 'mfff', '9002313', 'MASCULINO', 19, 'Aprendiz', 'SENA'),
('e7eYlQoe3dMg1LMX0em5OFIiBAqoZL', 'F34L2P7GPT9RHI37S306OFVI16TI47', '1036679990', 'Juan Pablo', 'Restrepo Garcia', '5881275', 'MASCULINO', 19, 'Instructor', 'SENA'),
('fC2L4RuZbJgfu5GXKHL6ql3ezCee2q', 'F34L2P7GPT9RHI37S306OFVI16TI47', '1017265677', 'Harry', 'Nepotter', '5219322', 'MASCULINO', 18, 'Administrativo', 'Sena'),
('GXS49Dqy6VveAerhPTpykzefN9ZqpQ', 'E3HDKX3684UTA7DMHFOAA34HAK39PM', '10394339229', 'Juan Pablo', 'Restrepo Garcia', '12345423', 'MASCULINO', 12, 'Instructor', 'SENA'),
('lkBJOYtJoasBqmExMACfLgs1fnMtzo', 'E3HDKX3684UTA7DMHFOAA34HAK39PM', '255114555', 'Prueba Expo', 'lll', '5552455', 'MASCULINO', 13, 'Instructor', 'SSSENA'),
('myMSKDrQbL2yJ9kV0vJs6638BADnCe', 'OS7CX80C7QQBLGJV41MB3YY4ZA234O', '555555555', 'User', 'Current', '5514400', 'MASCULINO', 55, 'Aprendiz', 'AA'),
('nJibTg88m6Gf4yIQ1jTmFnrVbkT5lM', 'ASEV4G5GVCG5A7O38DKS8W2EDDE42A', '09993940', 'Don', 'pacho', '29', 'MASCULINO', 19, 'Aprendiz', 'S'),
('pMgDEXrA8C6RC8YpBaXqXX2F8ieZoe', 'ASEV4G5GVCG5A7O38DKS8W2EDDE42A', '10293473729', 'Labecerra', 'Alias', '63394995', 'MASCULINO', 69, 'Instructor', 'UDE'),
('sPEB1XJR6BelN2V1JVdkZvXg9yqiie', 'F34L2P7GPT9RHI37S306OFVI16TI47', '10366799909', 'Admon', 'admonn', '55', 'MASCULINO', 55, 'Aprendiz', 'SENA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `use_conference`
--

CREATE TABLE `use_conference` (
  `use_con_code` varchar(30) NOT NULL,
  `use_code` varchar(60) DEFAULT NULL,
  `con_code` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `use_conference`
--

INSERT INTO `use_conference` (`use_con_code`, `use_code`, `con_code`) VALUES
('', 'myMSKDrQbL2yJ9kV0vJs6638BADnCe', 'vQxL4g'),
('dfsfdfgdfg', 'e7eYlQoe3dMg1LMX0em5OFIiBAqoZL', 'vQxL4g'),
('xP2h0H', 'fC2L4RuZbJgfu5GXKHL6ql3ezCee2q', 'g9IYpe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `use_stand`
--

CREATE TABLE `use_stand` (
  `use_sta_code` varchar(30) NOT NULL,
  `use_code` varchar(60) NOT NULL,
  `sta_code` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `use_stand`
--

INSERT INTO `use_stand` (`use_sta_code`, `use_code`, `sta_code`) VALUES
('tbDpA7', 'myMSKDrQbL2yJ9kV0vJs6638BADnCe', '6sOqaA');

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
  ADD CONSTRAINT `fk_file_conference` FOREIGN KEY (`con_code`) REFERENCES `conference` (`con_code`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
