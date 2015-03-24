DROP DATABASE exemple;
CREATE DATABASE exemple;
USE exemple;
CREATE TABLE `poblacions` (
  `codiPostal` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `nomPoblacio` varchar(75) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codiPostal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
CREATE TABLE `usuaris` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cognom` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `edat` tinyint(3) unsigned NOT NULL,
  `dataAlta` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
INSERT INTO poblacions (codiPostal,nomPoblacio) VALUES('08226','TERRASSA');
INSERT INTO usuaris (id,nom,cognom,edat,dataAlta) VALUES('3','Mar?a','Espinar','11','2007-08-19');
INSERT INTO usuaris (id,nom,cognom,edat,dataAlta) VALUES('4','Llu?s','Espinar','9','2007-06-11');
INSERT INTO usuaris (id,nom,cognom,edat,dataAlta) VALUES('5','Anna','Alonso','13','2006-03-03');
INSERT INTO usuaris (id,nom,cognom,edat,dataAlta) VALUES('6','Joan','Alonso','10','2006-03-03');
