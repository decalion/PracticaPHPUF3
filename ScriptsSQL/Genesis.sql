/**
 * 
 *
 * @author Ismael
 */

CREATE DATABASE genesis;

USE genesis;


CREATE TABLE servidor (
    ip VARCHAR(18) PRIMARY KEY,
    nameserver VARCHAR(25) NOT NULL
)  ENGINE=InnoDB;


CREATE TABLE admin (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    nuser VARCHAR(25) NOT NULL,
    npass VARCHAR(10),
    ip VARCHAR(18) NOT NULL,
    FOREIGN KEY (ip)
        REFERENCES servidor (ip)
)ENGINE=InnoDB;

INSERT INTO Servidor VALUES("127.0.0.1","localhost");
INSERT INTO Servidor VALUES("258.34.12.34","pepito.server.com");
INSERT INTO Servidor VALUES("370.78.22.56","cristian.server.es");

INSERT INTO Admin VALUES(NULL,"ismael","ismael","127.0.0.1");
INSERT INTO Admin VALUES(NULL,"ivan","ivan","127.0.0.1");
