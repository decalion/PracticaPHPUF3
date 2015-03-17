DROP DATABASE practica3;
CREATE DATABASE practica3;
USE practica3;
CREATE TABLE `denuncias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `radar` int(11) DEFAULT NULL,
  `limite_velocidad` int(11) DEFAULT NULL,
  `fecha` varchar(12) DEFAULT NULL,
  `matricula` varchar(8) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `velocidad_vheiculo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
INSERT INTO ('id','radar','limite_velocidad','fecha','matricula','marca','model','velocidad_vheiculo') VALUES('1','1','100','19/02/2015','ABCD4356','PEUGOT','206','120');
INSERT INTO ('id','radar','limite_velocidad','fecha','matricula','marca','model','velocidad_vheiculo') VALUES('2','2','120','20/08/1987','EERR7444','CITROEN','clio','200');
INSERT INTO ('id','radar','limite_velocidad','fecha','matricula','marca','model','velocidad_vheiculo') VALUES('3','2','120','06/02/2015','ABCD4356','PEUGOT','206','220');
