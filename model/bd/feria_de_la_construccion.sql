-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2017 a las 04:50:22
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

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
('D6r4PAD34fyIeEUj2YkGFNkuEg9KEJ', 'RJxXqEsxEyZ983qBBdicbZsl20gdEs', 'pablo@gmail.com', '$2y$10$QBVr9hPDIS8c2DKmVY0dou.Z6s9F.lHylGVpAt6rp4ALxi40UTN9S', 'Activo'),
('dCXGjQBYcoPOgDNiEDAqPFbVXkzPz5', 'Xy3IRO3b9sg94TVvCVuGo0zimJQR5K', 'jprestrepo94@misena.edu.co', '$2y$10$2AqauzhZ3UrcJhNXuYOKKe26jam.G7aO/18cKwUbMVYsDShxVKYBy', 'Activo'),
('tFTVjQC7n54sl189qeapDzSVhH0reC', 'TdeA0peToJ49SmZIe8Crss83Iosziv', 'pablofrg98@gmail.com', '$2y$10$pdTIFGKxUvjyHr963dSlBOYqxVb8R4qomXGuN0aq2kz6Uss/jmIuy', 'Inactivo'),
('yFkznF4FDVDSKpfHUCvrgZbpGpAUCf', 'x1ddHU2zXHeMUoRZxfEZPELvQrDh0V', 'pablito98@gmail.com', '$2y$10$MiyfpldLDqW0dSY6LnOunejBxE9W2xiZ7fi1NUWLXlncQsO/uvYcG', 'Activo'),
('ZI8AOa2miLexADZPKAhie3X7PevoqJ', '8f3n6u03Uk637Gyz6vE5edK9MQIaXV', 'paa@s.com', '$2y$10$RhMDzq6s6Y7/LsgTgJnplea8z.w.44RoCIUhZJIWia85ogc8M4vD2', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth`
--

CREATE TABLE `auth` (
  `per_code` varchar(60) NOT NULL,
  `rol_code` varchar(60) NOT NULL,
  `status` char(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conference`
--

CREATE TABLE `conference` (
  `con_code` varchar(60) NOT NULL,
  `day_code` varchar(60) NOT NULL,
  `con_name` char(50) NOT NULL,
  `con_exhibitor` varchar(60) NOT NULL,
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

INSERT INTO `conference` (`con_code`, `day_code`, `con_name`, `con_exhibitor`, `con_startime`, `con_finishtime`, `con_share`, `con_creationdate`, `con_creationtime`, `con_description`, `con_status`) VALUES
('FcV2EIaHtLf2tH6eeT9bjT7t0vSkIl', 'JN6qM7MARjnsdPO8esRQ1Gm0KFZN3y', 'Conferencia2', 'Guille', '23:59:00', '18:00:00', 30, '2017-08-11', '12:46:44', 'Prueba1', 'Activo');

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
('3BMxQk1iMt1cfR0OsNBeesscJvBLpq', 'bVBnSVj3NlBSQD5LDSceeb2cQ2Uq3z', NULL, NULL, NULL, NULL, NULL),
('DejZ8euEekgFjYJfc5s9ebBydcIczC', 'fd1eLBqLK13n2orOYgJemAuoCNPvyS', NULL, NULL, NULL, NULL, NULL),
('eCdpeQpMdgARx1tu6nbu05zvNqURTP', '9RKe1Fp4D70QhJVcEAgmJ2LN7aptsg', 'DIA1', '2017-08-16', '01:05:00', '01:00:00', 'ss'),
('jjui40j2FgkyenpOg3ThZrBXUlUgbY', 'fd1eLBqLK13n2orOYgJemAuoCNPvyS', NULL, NULL, NULL, NULL, NULL),
('JN6qM7MARjnsdPO8esRQ1Gm0KFZN3y', '9RKe1Fp4D70QhJVcEAgmJ2LN7aptsg', 'DIA2', '2017-08-31', '01:00:00', '03:00:00', 'j'),
('joD9AdXjluYv22polGRQaTzdVES3Dj', '9RKe1Fp4D70QhJVcEAgmJ2LN7aptsg', NULL, NULL, NULL, NULL, NULL),
('LKQeaLghCvepUZH2nMmMOtLNaxRuDo', '9RKe1Fp4D70QhJVcEAgmJ2LN7aptsg', NULL, NULL, NULL, NULL, NULL),
('LOIcaBVesdsMvn1le7oBHZn2KArdyh', '9RKe1Fp4D70QhJVcEAgmJ2LN7aptsg', NULL, NULL, NULL, NULL, NULL),
('MKa7H5PJPmHhnbeyUeP0oQoTpTlkEp', '9RKe1Fp4D70QhJVcEAgmJ2LN7aptsg', 'DIA6', '2017-08-17', '01:00:00', '04:00:00', 'l'),
('nydLZDEBsiMnkH9AP7xCSteUdjsKIT', '9RKe1Fp4D70QhJVcEAgmJ2LN7aptsg', NULL, NULL, NULL, NULL, NULL),
('rXJMzON6F11lR0hBAxs4UADL0XtS1e', 'bVBnSVj3NlBSQD5LDSceeb2cQ2Uq3z', NULL, NULL, NULL, NULL, NULL),
('uB8xpFMlAOH1m8erZQPktk6DROtR27', '9RKe1Fp4D70QhJVcEAgmJ2LN7aptsg', NULL, NULL, NULL, NULL, NULL),
('XKriu6ffxTttaeb8gHznzhaBMM8g9P', 'bVBnSVj3NlBSQD5LDSceeb2cQ2Uq3z', NULL, NULL, NULL, NULL, NULL),
('xnvij5LR21cd1v8hTxboPB3kC6rRuB', '9RKe1Fp4D70QhJVcEAgmJ2LN7aptsg', NULL, NULL, NULL, NULL, NULL);

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
('9RKe1Fp4D70QhJVcEAgmJ2LN7aptsg', 'df', '2017-08-18', '2017-08-26', 9, '2017-08-10', '10:08:52', 'Xy3IRO3b9sg94TVvCVuGo0zimJQR5K'),
('bVBnSVj3NlBSQD5LDSceeb2cQ2Uq3z', 'w', '2017-08-24', '2017-08-26', 3, '2017-08-10', '10:08:04', 'Xy3IRO3b9sg94TVvCVuGo0zimJQR5K'),
('fd1eLBqLK13n2orOYgJemAuoCNPvyS', 's', '2017-08-04', '2017-08-05', 2, '2017-08-14', '02:08:51', 'Xy3IRO3b9sg94TVvCVuGo0zimJQR5K');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file`
--

CREATE TABLE `file` (
  `fil_code` varchar(60) NOT NULL,
  `con_code` varchar(60) NOT NULL,
  `fil_file` varchar(50) NOT NULL,
  `fil_creationdate` date NOT NULL,
  `fil_creationhour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `history`
--

CREATE TABLE `history` (
  `his_code` varchar(60) NOT NULL,
  `mod_code` varchar(60) NOT NULL,
  `user` varchar(30) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `module`
--

CREATE TABLE `module` (
  `mod_code` varchar(60) NOT NULL,
  `mod_name` char(50) NOT NULL
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
('rrbeRjxH3iSNQkQfBTthbXpCSZKrzX', 'eCdpeQpMdgARx1tu6nbu05zvNqURTP', 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission`
--

CREATE TABLE `permission` (
  `per_code` varchar(60) NOT NULL,
  `per_name` char(50) NOT NULL,
  `mod_code` varchar(60) NOT NULL
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
('E3HDKX3684UTA7DMHFOAA34HAK39PM', 'Expositor', 'Este rol puede gestionar la subida de memorias(archivos) e ingresar las personas que visitaron su stand'),
('F34L2P7GPT9RHI37S306OFVI16TI47', 'Administrativo', 'Este rol gestiona todo el aplicativo'),
('OS7CX80C7QQBLGJV41MB3YY4ZA234O', 'Visitante', 'usuario corriente usa la aplicacion mas no gestiona esta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stand`
--

CREATE TABLE `stand` (
  `sta_code` varchar(60) NOT NULL,
  `pav_code` varchar(60) NOT NULL,
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
('8f3n6u03Uk637Gyz6vE5edK9MQIaXV', 'F34L2P7GPT9RHI37S306OFVI16TI47', '999', 'mf', 'lol', '2222', 'MASCULINO', 12, 'Aprendiz', 's'),
('RJxXqEsxEyZ983qBBdicbZsl20gdEs', 'OS7CX80C7QQBLGJV41MB3YY4ZA234O', '09988399483', 'JuanPAPITO', 'Respeto', '112', 'MASCULINO', 18, 'Aprendiz', 'SESENA'),
('TdeA0peToJ49SmZIe8Crss83Iosziv', 'F34L2P7GPT9RHI37S306OFVI16TI47', '1036679990', 'Juan Pablo', 'Restrepo Garcia', '5881275', 'MASCULINO', 19, 'Aprendiz', 'CENA'),
('x1ddHU2zXHeMUoRZxfEZPELvQrDh0V', 'OS7CX80C7QQBLGJV41MB3YY4ZA234O', '1036679991', 'Juan', 'Restrepo', '6134527', 'MASCULINO', 18, 'Instructor', 'SENA'),
('Xy3IRO3b9sg94TVvCVuGo0zimJQR5K', 'F34L2P7GPT9RHI37S306OFVI16TI47', '98062003049', 'Juan Pablo ', 'Restrepo Garcia', '5881275', 'MASCULINO', 19, 'Aprendiz', 'SENA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `use_conference`
--

CREATE TABLE `use_conference` (
  `use_code` varchar(60) NOT NULL,
  `con_code` varchar(60) NOT NULL,
  `usc_startime` time NOT NULL,
  `usc_finishtime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `use_day`
--

CREATE TABLE `use_day` (
  `use_code` varchar(60) NOT NULL,
  `day_code` varchar(60) NOT NULL,
  `usd_startime` time NOT NULL,
  `usd_finishtime` time NOT NULL,
  `usd_qualification` int(11) DEFAULT NULL,
  `usd_opinion` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `use_stand`
--

CREATE TABLE `use_stand` (
  `use_code` varchar(60) NOT NULL,
  `sta_code` varchar(60) NOT NULL,
  `sta_startime` time NOT NULL,
  `sta_finishtime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indices de la tabla `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`per_code`,`rol_code`),
  ADD KEY `fk_id_rol` (`rol_code`);

--
-- Indices de la tabla `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`con_code`),
  ADD KEY `fk_day_cod` (`day_code`);

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
-- Indices de la tabla `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`fil_code`),
  ADD KEY `fk_conf_token_file` (`con_code`);

--
-- Indices de la tabla `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`his_code`),
  ADD KEY `fk_mod_cod_history` (`mod_code`);

--
-- Indices de la tabla `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`mod_code`);

--
-- Indices de la tabla `pavilion`
--
ALTER TABLE `pavilion`
  ADD PRIMARY KEY (`pav_code`),
  ADD KEY `fk_day_cod_pavilion` (`day_code`);

--
-- Indices de la tabla `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`per_code`),
  ADD KEY `fk_mod_cod` (`mod_code`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`rol_code`);

--
-- Indices de la tabla `stand`
--
ALTER TABLE `stand`
  ADD PRIMARY KEY (`sta_code`),
  ADD KEY `fk_pavilion` (`pav_code`);

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
  ADD PRIMARY KEY (`use_code`,`con_code`),
  ADD KEY `fk_conf_token` (`con_code`);

--
-- Indices de la tabla `use_day`
--
ALTER TABLE `use_day`
  ADD PRIMARY KEY (`use_code`,`day_code`),
  ADD KEY `fk_day_cod_user` (`day_code`);

--
-- Indices de la tabla `use_stand`
--
ALTER TABLE `use_stand`
  ADD PRIMARY KEY (`use_code`,`sta_code`),
  ADD KEY `fk_stand_cod` (`sta_code`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `access`
--
ALTER TABLE `access`
  ADD CONSTRAINT `fk_security` FOREIGN KEY (`use_code`) REFERENCES `user` (`use_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `fk_id_rol` FOREIGN KEY (`rol_code`) REFERENCES `role` (`rol_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_perm_cod` FOREIGN KEY (`per_code`) REFERENCES `permission` (`per_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `fk_day_cod` FOREIGN KEY (`day_code`) REFERENCES `day` (`day_code`) ON UPDATE CASCADE;

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
-- Filtros para la tabla `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `fk_conf_token_file` FOREIGN KEY (`con_code`) REFERENCES `conference` (`con_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `fk_mod_cod_history` FOREIGN KEY (`mod_code`) REFERENCES `module` (`mod_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pavilion`
--
ALTER TABLE `pavilion`
  ADD CONSTRAINT `fk_day_cod_pavilion` FOREIGN KEY (`day_code`) REFERENCES `day` (`day_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `permission`
--
ALTER TABLE `permission`
  ADD CONSTRAINT `fk_mod_cod` FOREIGN KEY (`mod_code`) REFERENCES `module` (`mod_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `stand`
--
ALTER TABLE `stand`
  ADD CONSTRAINT `fk_pavilion` FOREIGN KEY (`pav_code`) REFERENCES `pavilion` (`pav_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_id_rol_user` FOREIGN KEY (`rol_code`) REFERENCES `role` (`rol_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `use_conference`
--
ALTER TABLE `use_conference`
  ADD CONSTRAINT `fk_conf_token` FOREIGN KEY (`con_code`) REFERENCES `conference` (`con_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_token_day1` FOREIGN KEY (`use_code`) REFERENCES `user` (`use_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `use_day`
--
ALTER TABLE `use_day`
  ADD CONSTRAINT `fk_day_cod_user` FOREIGN KEY (`day_code`) REFERENCES `day` (`day_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_token_day` FOREIGN KEY (`use_code`) REFERENCES `user` (`use_code`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `use_stand`
--
ALTER TABLE `use_stand`
  ADD CONSTRAINT `fk_stand_cod` FOREIGN KEY (`sta_code`) REFERENCES `stand` (`sta_code`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_token` FOREIGN KEY (`use_code`) REFERENCES `user` (`use_code`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
