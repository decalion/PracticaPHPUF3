DROP DATABASE genesis;
CREATE DATABASE genesis;
USE genesis;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nuser` varchar(25) NOT NULL,
  `npass` varchar(10) DEFAULT NULL,
  `ip` varchar(18) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ip` (`ip`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`ip`) REFERENCES `servidor` (`ip`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
CREATE TABLE `servidor` (
  `ip` varchar(18) NOT NULL,
  `nameserver` varchar(25) NOT NULL,
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
