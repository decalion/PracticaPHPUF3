DROP DATABASE alquiler;
CREATE DATABASE alquiler;
USE alquiler;
CREATE TABLE `cotxe` (
  `numero_bastidor` varchar(17) NOT NULL,
  `matricula` varchar(7) DEFAULT NULL,
  `modelo` varchar(30) DEFAULT NULL,
  `combustible` varchar(30) DEFAULT NULL,
  `ocupants` int(11) DEFAULT NULL,
  `portes` int(11) DEFAULT NULL,
  `preu` double DEFAULT NULL,
  PRIMARY KEY (`numero_bastidor`),
  UNIQUE KEY `matricula` (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `lloguer` (
  `num_lloguer` int(11) NOT NULL AUTO_INCREMENT,
  `id_cotxe` varchar(17) NOT NULL DEFAULT '',
  `id_usuari` varchar(9) NOT NULL DEFAULT '',
  `data_inici` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `preu` double DEFAULT NULL,
  `tornar` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`num_lloguer`,`id_cotxe`,`id_usuari`),
  KEY `id_cotxe` (`id_cotxe`),
  KEY `id_usuari` (`id_usuari`),
  CONSTRAINT `lloguer_ibfk_1` FOREIGN KEY (`id_cotxe`) REFERENCES `cotxe` (`numero_bastidor`),
  CONSTRAINT `lloguer_ibfk_2` FOREIGN KEY (`id_usuari`) REFERENCES `usuario` (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `usuario` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `cognom` varchar(40) DEFAULT NULL,
  `visa` varchar(16) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `any_licencia` date DEFAULT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
INSERT INTO ('numero_bastidor','matricula','modelo','combustible','ocupants','portes','preu') VALUES('','','','','','','');
INSERT INTO ('numero_bastidor','matricula','modelo','combustible','ocupants','portes','preu') VALUES('1234567','','','','','','');
INSERT INTO ('numero_bastidor','matricula','modelo','combustible','ocupants','portes','preu') VALUES('145648','ADLGH1','Renault','Diesel','','','');
INSERT INTO ('numero_bastidor','matricula','modelo','combustible','ocupants','portes','preu') VALUES('2345678','','','','','','');
INSERT INTO ('numero_bastidor','matricula','modelo','combustible','ocupants','portes','preu') VALUES('30452035','ATYU','CASA','GASOLINA','4','','');
INSERT INTO ('numero_bastidor','matricula','modelo','combustible','ocupants','portes','preu') VALUES('3456785','adf1234','','','','','');
INSERT INTO ('numero_bastidor','matricula','modelo','combustible','ocupants','portes','preu') VALUES('98645448','hjt123','Renault','','','','');
INSERT INTO ('numero_bastidor','matricula','modelo','combustible','ocupants','portes','preu') VALUES('986454484','hjt122','Seat','','','','');
