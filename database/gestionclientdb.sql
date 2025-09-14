DROP DATABASE gestionclientdb ;

CREATE DATABASE gestionclientdb CHARACTER SET utf8; ;
USE gestionclientdb ;
ALTER DATABASE gestionclientdb CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS membre(
idmembre INT NOT NULL AUTO_INCREMENT,
pseudo VARCHAR(100) NOT NULL,
email VARCHAR(220) NOT NULL,
motdepasse TEXT NOT NULL,
dateinscription TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
CONSTRAINT pk_membre PRIMARY KEY(idmembre))
ENGINE = INNODB;

SHOW TABLES ;

CREATE TABLE IF NOT EXISTS clientt(
idclient INT NOT NULL AUTO_INCREMENT,
idclientmembre INT NOT NULL,
nomclient VARCHAR(100) NOT NULL,
prenomclient VARCHAR(50) NULL,
villeclient VARCHAR(100) NULL,
quartierclient VARCHAR(100) NULL,
telephoneclient VARCHAR(50) NULL,
commentaireclient TEXT NULL,
lienphotoclient TEXT NULL,
dateajoutclient TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
CONSTRAINT pk_clientt PRIMARY KEY(idclient),
CONSTRAINT fk_client_membre FOREIGN KEY(idclientmembre) REFERENCES membre(idmembre))
ENGINE = INNODB ;


/* Inclusion des caractères avec accents dans la table client*/

ALTER TABLE clientt CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

